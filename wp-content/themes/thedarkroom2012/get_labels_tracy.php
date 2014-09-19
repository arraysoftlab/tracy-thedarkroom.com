<?php

 //function to return nice url's for our pdf's 
 function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}
//Set up our POST variables
$name = strip_tags($_POST['name']);
$address1 = strip_tags($_POST['address1']);
$address2 = strip_tags($_POST['address2']);
$zipcode = strip_tags(str_replace(' ', '',$_POST['zipcode']));
$CustomerCity = strip_tags($_POST['CustomerCity']);
$CustomerState = strip_tags($_POST['CustomerState']);


//Store your XML Request in a variable
    $input_xml = urlencode('<ExternalReturnLabelRequest> 
                            <CustomerName>'.$name .'</CustomerName> 
                            <CustomerAddress1>'.$address1.'</CustomerAddress1> 
                            <CustomerAddress2>'.$address2.'</CustomerAddress2> 
                            <CustomerCity>'.$CustomerCity.'</CustomerCity>
                            <CustomerState>'.$CustomerState.'</CustomerState> 
                            <CustomerZipCode>'.$zipcode.'</CustomerZipCode> 
                            <MerchantAccountID>6</MerchantAccountID> 
                            <MID>901346074</MID>
                            <LabelFormat>NOI</LabelFormat>
                            <LabelDefinition>Zebra-4X6</LabelDefinition> 
                            <ServiceTypeCode>020</ServiceTypeCode> 
                            <AddressOverrideNotification>false</AddressOverrideNotification> 
                            <CallCenterOrSelfService>Customer</CallCenterOrSelfService> 
                            <AddressValidation>false</AddressValidation>
                            </ExternalReturnLabelRequest>');

//start Curl tried file_get_contents but to no avail..
$curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL,"https://returns.usps.com/Services/ExternalCreateReturnLabel.svc/ExternalCreateReturnLabel?externalReturnLabelRequest=".$input_xml);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
$query = curl_exec($curl_handle);
curl_close($curl_handle);

//decode the response this will fail if nothing returned 
$pdfdecode = base64_decode($query);

if($pdfdecode != false){

    $urlfriendlyname = seoUrl($name);
    $myFile = "labels/labelfor".$urlfriendlyname.$zipcode.".pdf";
    $fh = fopen($myFile, 'w') or die("can't open file");
    fwrite($fh, $pdfdecode);
    fclose($fh);
    
    
    header("Location: http://thedarkroom.com/wp-content/themes/thedarkroom2012/".$myFile); 
    exit();
}else{
    header("Location: http://thedarkroom.com/label/?labelerror=".$query); 
    exit();
}