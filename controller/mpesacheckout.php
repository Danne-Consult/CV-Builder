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

        $ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer NSXodaeu5EPqsAdTPxo04gfo0BzF',
            'Content-Type: application/json'
        ]);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, [
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
            'TransactionDesc' => $tpltype
        ]);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response     = curl_exec($ch);
        curl_close($ch);

       // echo $response;
        echo json_encode($response, JSON_PRETTY_PRINT);

    }

?>