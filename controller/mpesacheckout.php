<?php 

header("Content-Type:application/json");

/*Call function with these configurations*/
$consumer_key = '3c3QceNnq2bXIm3vy466MdAxnAbR6cQP';
$consumer_secret = 'DObr8G3ZuWjeAB6A';
$Business_Code = '174379';
$Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$Type_of_Transaction = 'CustomerPayBillOnline';
$Token_URL = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$OnlinePayment = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$CallBackURL = 'https://daneconsult.com/client/cv-builder/controller/payreceiver.php';
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
            'PhoneNumber' => $phone_number,
            'CallBackURL' => $CallBackURL,
            'AccountReference' => $invoiceno,
            'TransactionDesc' => $tpltype,
        ];

        $data2_string = json_encode($curl_Tranfer2_post_data);

        curl_setopt($curl_Tranfer2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_Tranfer2, CURLOPT_POST, true);
        curl_setopt($curl_Tranfer2, CURLOPT_POSTFIELDS, $data2_string);
        curl_setopt($curl_Tranfer2, CURLOPT_HEADER, false);
        curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYHOST, 0);
        $curl_Tranfer2_response = json_decode(curl_exec($curl_Tranfer2));

        echo json_encode($curl_Tranfer2_response, JSON_PRETTY_PRINT);
    }

?>