<?php
//email
$customeremail="bhammond@athletx.com"; 
//array for who gets bcc
$notify[0]="support@athletx.com";
$notify[1]="rhaddaway@athletx.com";
$notify[2]="jruby@athletx.com";
$notify[3]="tfitch@athletx.com";
//format the email
$emailoutput="";
$emailoutput.="Body content example<br><br>";
//send email through smtp2go
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
  "bcc" => $notify,
  "sender" => "Do Not Reply <donotreply@athletxpayments.com>",
  "subject" => "Sample Description",
  "html_body" => "$emailoutput"
)));
$result = curl_exec($curl);
?>
