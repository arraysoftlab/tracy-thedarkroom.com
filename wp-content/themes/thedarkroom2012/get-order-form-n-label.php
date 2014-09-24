<?php
if(empty($_GET) || !isset($_GET['action'])) {
    header('Location: /');
    exit();
}

$tmpDir = "temp";
$now = round(microtime(true) * 1000);
if(!file_exists($tmpDir)) {
    mkdir($tmpDir);
}

//Set up our POST variables
$name = strip_tags($_GET['full_name']);
$address1 = strip_tags($_GET['address1']);
$address2 = strip_tags($_GET['address2']);
$city = strip_tags($_GET['city']);
$state = strip_tags($_GET['state']);
$zipCode = strip_tags(str_replace(' ', '', $_GET['zip']));
$email = strip_tags($_GET['email']);
$phone = strip_tags($_GET['phone']);
$redirectTo = $_GET['redirect_to'];

if($_GET['action'] == 'order-form') {
    unset($_GET['action']);

    /*Watermark Return Address to Offline Order Form*/
    $orderForm = imagecreatefromjpeg("images/film-developing-form.jpg");
    $height = 550;
    $font = 'fonts/arial.ttf';
    imagettftext($orderForm, 50, 0, 2300, $height, imagecolorallocate($orderForm, 0, 0, 0), $font, $name);
    imagettftext($orderForm, 40, 0, 2300, $height+=60, imagecolorallocate($orderForm, 0, 0, 0), $font, $address1);
    if($address2) {
        imagettftext($orderForm, 40, 0, 2300, $height+=60, imagecolorallocate($orderForm, 0, 0, 0), $font, $address2);
    }
    imagettftext($orderForm, 40, 0, 2300, $height+=60, imagecolorallocate($orderForm, 0, 0, 0), $font, "$city, $state $zipCode");
    if($email) {
        imagettftext($orderForm, 40, 0, 2300, $height+=60, imagecolorallocate($orderForm, 0, 0, 0), $font, $email);
    }
    if($phone) {
        imagettftext($orderForm, 40, 0, 2300, $height+=60, imagecolorallocate($orderForm, 0, 0, 0), $font, $phone);
    }
    $tmpOrderForm = "$tmpDir/Order Form for $name $address1 $zipCode $now.jpg";
    imagejpeg($orderForm, $tmpOrderForm);
    imagedestroy($orderForm);

    require("lib/mpdf/mpdf.php");
    $mpdf = new mPDF();
    $html = "<img src='$tmpOrderForm'/>";
    $mpdf->WriteHTML($html);
    $tmpOrderForm = "$tmpDir/Order Form for $name $address1 $zipCode $now.pdf";
    $mpdf->Output($tmpOrderForm, 'F');

    header("Content-Type: application/pdf");
    echo file_get_contents($tmpOrderForm);
    exit();
}

if($_GET['action'] == 'shipping-label') {
    unset($_GET['action']);

    /*USPS API request to get shipping label*/
    $input_xml = urlencode("<ExternalReturnLabelRequest>
                            <CustomerName>$name</CustomerName>
                            <CustomerAddress1>$address1</CustomerAddress1>
                            <CustomerAddress2>$address2</CustomerAddress2>
                            <CustomerCity>$city</CustomerCity>
                            <CustomerState>$state</CustomerState>
                            <CustomerZipCode>$zipCode</CustomerZipCode>
                            <MerchantAccountID>1338</MerchantAccountID>
                            <MID>901346074</MID>
                            <LabelFormat>null</LabelFormat>
                            <LabelDefinition>3X6</LabelDefinition>
                            <ServiceTypeCode>020</ServiceTypeCode>
                            <AddressOverrideNotification>false</AddressOverrideNotification>
                            <CallCenterOrSelfService>Customer</CallCenterOrSelfService>
                            <AddressValidation>false</AddressValidation>
                            </ExternalReturnLabelRequest>");

    $attachmentFileURL = "https://returns.usps.com/Services/ExternalCreateReturnLabel.svc/ExternalCreateReturnLabel?externalReturnLabelRequest=$input_xml";
    $attachmentFile = curl_init();
    curl_setopt($attachmentFile, CURLOPT_URL, $attachmentFileURL);
    curl_setopt($attachmentFile, CURLOPT_HTTPGET, true);
    curl_setopt($attachmentFile, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($attachmentFile, CURLOPT_POSTFIELDS, false);
    curl_setopt($attachmentFile, CURLOPT_RETURNTRANSFER, true);
    $curl_resp = curl_exec($attachmentFile);
    curl_close($attachmentFile);
    $data = base64_decode($curl_resp);
    $xml_resp = new SimpleXMLElement($curl_resp);
    $errors = array();
    if($xml_resp->errors) {
        foreach($xml_resp->errors->ExternalReturnLabelError as $xml_elem) {
            $errors[] = (string)$xml_elem->InternalErrorDescription;
        }
    }
    if(!empty($errors)) {
        $error = "";
        foreach($errors as $err) {
            $error .= "&err[]=$err";
        }
        header("Location: $redirectTo?full_name=$name&address1=$address1&address2=$address2&city=$city&state=$state&zip=$zipCode" . $error);
        exit();
    }
    $tmpLabel = "$tmpDir/Shipping Label for $name $address1 $zipCode $now.pdf";
    $file = fopen($tmpLabel, 'w');
    fwrite($file, $data);
    fclose($file);

    header("Content-Type: application/pdf");
    echo file_get_contents($tmpLabel);
    exit();
}