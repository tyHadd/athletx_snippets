<?php
//CUSTOMER EMAIL
$customeremail="bhammond@athletx.com";

//ADMIN EMAILS
$notify[0]="rhaddaway@athletx.com";
$notify[1]="elittrell@athletx.com";
$notify[2]="director@athletx.com";
$notify[3]="tdavidson@athletx.com";
$notify[4]="jruby@athletx.com";

//FORMAT EMAIL
$emailoutput="";
$emailoutput.="This is a sample email.<br><br>";

//SEND EMAIL TO CUSTOMER
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($curl, CURLOPT_URL, "https://api.smtp2go.com/v3/email/send");
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array(
  "api_key" => "api-9C662E963EAA11E984DCF23C91C88F4E",
  "to" => array(
    0 => "$customeremail"
  ),
  "sender" => "Do Not Reply <donotreply@athletxpayments.com>",
  "subject" => "Sample Subject Line",
  "html_body" => "$emailoutput"
)));
$result = curl_exec($curl);
sleep(1);

//SEND SEPERATE EMAIL TO ADMIN
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($curl, CURLOPT_URL, "https://api.smtp2go.com/v3/email/send");
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array(
  "api_key" => "api-9C662E963EAA11E984DCF23C91C88F4E",
  "to" => $notify,
  "sender" => "Do Not Reply <donotreply@athletxpayments.com>",
  "subject" => "Sample Subject Line",
  "html_body" => "$emailoutput"
)));
$result = curl_exec($curl);
sleep(1);
?>