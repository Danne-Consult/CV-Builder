<?php
    include "../manage/_db/dbconf.php";
    session_start();
    if (!isset($_SESSION['userid'])){
    session_destroy();
    header("Location:../login.php?error=Please login first!&location=" . urlencode($_SERVER['REQUEST_URI']));
    }

    date_default_timezone_set("Africa/Nairobi");
    

    $db = new DBconnect;
    $prefix = $db->prefix;
    
    $sql = "SELECT * FROM ".$prefix."marchant_keys WHERE marchant_name = 'pesapal'";
    $result = $db->conn->query($sql);
    $rws = $result->fetch_array();
    
    $useremail  = $_POST['email'];
    $sql2 = "SELECT * FROM ".$prefix."users WHERE email = '$useremail'";
    $result2 = $db->conn->query($sql2);
    $rws2 = $result2->fetch_array();
    
    $consumer_key = 'qkio1BGGYAXTu2JOfm7XSXNruoZsrqEW'; //$rws['securitykey'];
    $consumer_secret = 'osGQ364R49cXKeOYSpaOnT++rHs=';//$rws['securitysecret'];
    
    $first_name = $rws2['fname'];
    $last_name = $rws2['lname'];
    $email = $rws2['email'];
    
    $invoiceid  = $_POST['invoicenox'];
    $amount  = number_format($_POST['amountx'], 2);
    $tpltype  = $_POST['tpltype'];
    $period  = $_POST['period'];
    $paytype  = $_POST['paytype'];
    $type = "MARCHANT";
    $phonenumber = "";

    if(!isset($tpltype)){
        $desc = ucfirst($tpltype)." Template";
    }else{
        $desc = ucfirst($paytype)." Plan";
    }



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://cybqa.pesapal.com/pesapalv3/api/Auth/RequestToken',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "consumer_key": "'.$consumer_key.'",
  "consumer_secret": "'.$consumer_secret.'"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Accept: application/json'
  ),
));

$response = curl_exec($curl);
$token = json_decode($response)->token;


$curl3 = curl_init();

curl_setopt_array($curl3, array(
  CURLOPT_URL => 'https://cybqa.pesapal.com/pesapalv3/api/Transactions/SubmitOrderRequest',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "id": "'.$invoiceid.'",
    "currency": "KES",
    "amount": 2,
    "description": "'.$desc.'",
    "callback_url": "https://realtimecvs.opentalentafrica.com/controller/pesapalipn.php",
    "notification_id": "89c89ce5-f413-4147-a070-df09d23a4cb6",
    "billing_address": {
        "email_address": "'.$email.'",
        "phone_number": null,
        "country_code": "",
        "first_name": "'.$fname.'",
        "middle_name": "",
        "last_name": "'.$lname.'",
        "line_1": "",
        "line_2": "",
        "city": "",
        "state": "",
        "postal_code": null,
        "zip_code": null
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization:Bearer '.$token
  ),
));

$response2 = curl_exec($curl3);

curl_close($curl3);

if(json_decode($response2)->error==null){
    $trackingid = json_decode($response2)->order_tracking_id;
    $invoiceref = json_decode($response2)->merchant_reference;
    $redirecturl = json_decode($response2)->redirect_url;
    $currdatetime = date("y-m-d h:i:s"); 
    
    $sql = "INSERT INTO ".$prefix."pesapalpayments (invoice_id, tracking_id, datecreated) VALUES('$invoiceref','$trackingid','$currdatetime')";
    $db->conn->query($sql);
    
    header("location:". $redirecturl);
}
