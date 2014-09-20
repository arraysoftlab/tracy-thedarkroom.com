<?php
$tmpDir = "temp";
$now = round(microtime(true) * 1000);
if(!file_exists($tmpDir)) {
    mkdir($tmpDir);
}

//Set up our POST variables
$name = strip_tags($_POST['full_name']);
$address1 = strip_tags($_POST['address1']);
$address2 = strip_tags($_POST['address2']);
$city = strip_tags($_POST['city']);
$state = strip_tags($_POST['state']);
$zipCode = strip_tags(str_replace(' ', '', $_POST['zip']));
$email = strip_tags($_POST['email']);
$phone = strip_tags($_POST['phone']);
$redirectTo = $_POST['redirect_to'];

if(isset($_POST['order_form'])) {
    unset($_POST['order_form']);

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
    $tmpOrderForm = $tmpDir . '/order-form-' . $now;
    imagejpeg($orderForm, $tmpOrderForm);
    imagedestroy($orderForm);

    header('Content-type: image/jpeg');
    header("Content-disposition: attachment; filename=Order Form for $name $address1 $zipCode.jpg");
    readfile($tmpOrderForm);
    unlink($tmpOrderForm);
    exit();
}

if(isset($_POST['shipping_label'])) {
    unset($_POST['shipping_label']);

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
    if(!$data) {
        header("Location: $redirectTo?error=$curl_resp&full_name=$name&address1=$address1&address2=$address2&city=$city&state=$state&zip=$zipCode");
        exit();
    }
    $tmpLabel = $tmpDir . '/label-' . $now;
    $file = fopen($tmpLabel, 'w');
    fwrite($file, $data);
    fclose($file);

    header("Content-Type: application/pdf");
    header("Content-disposition: attachment; filename=Shipping Label for $name $address1 $zipCode.pdf");
    readfile($tmpLabel);
    unlink($tmpLabel);
}