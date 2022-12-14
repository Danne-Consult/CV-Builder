<?php 

header("Content-Type:application/json");
date_default_timezone_set("Africa/Nairobi");

/*Call function with these configurations*/
$consumer_key = '3c3QceNnq2bXIm3vy466MdAxnAbR6cQP';
$consumer_secret = 'DObr8G3ZuWjeAB6A';
$Business_Code = '174379';
$Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$Type_of_Transaction = 'CustomerPayBillOnline';
$Token_URL = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$OnlinePayment = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$CallBackURL = 'https://danneconsult.com/client/cv-builder/controller/payreceiver.php';
$Time_Stamp = date("Ymdhis");
$password = base64_encode($Business_Code . $Passkey . $Time_Stamp);

/*End  configurations*/


    if(isset($_POST["submitcode"])){
        if (!isset($_POST["mpesacode"])) {
            header("location: ../invoice.php?error=Please re-enter your Mpesa Code");
            exit();
        }

        $mpesacode = $_POST["mpesacode"];
        
        
    }
    if(isset($_POST["submitnumber"])){

        if (!isset($_POST["phonenumer"])) {
            header("location: ../invoice.php?error=Please re-enter your number");
            exit();
        }
        
        $phonenumber = $_POST["phonenumer"];
        $itemamount = $_POST["amountx"];
        $invoiceno = $_POST['invoicenox'];
        $tpltype = $_POST['tpltype'];


        $curl_Tranfer = curl_init();
        curl_setopt($curl_Tranfer, CURLOPT_URL, $Token_URL);
        $credentials = base64_encode($consumer_key . ':' . $consumer_secret);
        curl_setopt($curl_Tranfer, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
        curl_setopt($curl_Tranfer, CURLOPT_HEADER, false);
        curl_setopt($curl_Tranfer, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_Tranfer, CURLOPT_SSL_VERIFYPEER, false);
        $curl_Tranfer_response = curl_exec($curl_Tranfer);

        $token = json_decode($curl_Tranfer_response)->access_token;

        $curl_Tranfer2 = curl_init();
        curl_setopt($curl_Tranfer2, CURLOPT_URL, $OnlinePayment);
        curl_setopt($curl_Tranfer2, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token));

        $curl_Tranfer2_post_data = [
            'BusinessShortCode' => $Business_Code,
            'Password' => $password,
            'Timestamp' =>$Time_Stamp,
            'TransactionType' =>$Type_of_Transaction,
            'Amount' => $itemamount,
            'PartyA' => $phonenumber,
            'PartyB' => $Business_Code,
            'PhoneNumber' => $phonenumber,
            'CallBackURL' => $CallBackURL,
            'AccountReference' => $invoiceno,
            'TransactionDesc' => $tpltype
        ];

        $data2_string = json_encode($curl_Tranfer2_post_data);

        curl_setopt($curl_Tranfer2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_Tranfer2, CURLOPT_POST, true);
        curl_setopt($curl_Tranfer2, CURLOPT_POSTFIELDS, $data2_string);
        curl_setopt($curl_Tranfer2, CURLOPT_HEADER, false);
        curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYHOST, 0);
        $curl_Tranfer2_response = json_decode(curl_exec($curl_Tranfer2));

        $result = $curl_Tranfer2_response->ResponseCode; 
        $requestid = $curl_Tranfer2_response->CheckoutRequestID;
        
        if($result === "0"){

            include "../manage/_db/dbconf.php";
            $db = new DBconnect;
            $prefix = $db->prefix;

            $sql = "UPDATE ".$prefix."invoices SET requestid='$requestid' WHERE invoiceno = '$invoiceno'";
            $db->conn->query($sql);

           header("location:../invoice.php?invoiceid=".$invoiceno."&r=".$requestid."&c=1");
        }else{
           header("location:../invoice.php?invoiceid=".$invoiceno."&error=there was an error with the transaction, please try again.");
       }

    }

?>