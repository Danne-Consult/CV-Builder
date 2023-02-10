<?php 
include "../manage/_db/dbconf.php";
date_default_timezone_set("Africa/Nairobi");
header("Content-Type:application/json");

$content = file_get_contents('php://input');
file_put_contents('log', $content, FILE_APPEND);

$res = json_decode($content);


$paymentmethod = $res->payment_method;
$amount = $res->amount;
$created_date = $res->created_date;
$confirmation_code = $res->confirmation_code;
$status = $res->payment_status_description;
$description = $res->description;
$payment_account = $res->payment_account;


$trackingid = $_GET['OrderTrackingId'];
$invoiceid = $_GET['OrderMerchantReference'];


$db = new DBconnect;
$prefix = $db->prefix;

$sqlcheckinvoice = "SELECT * FROM ".$prefix."invoices WHERE invoiceno='$invoiceid'";
$rrequest = $db->conn->query($sqlcheckinvoice);
$rtrows = mysqli_num_rows($rrequest);

if($rtrows!==0){
    
    $sqlpesapal="UPDATE ".$prefix."pesapalpayments SET payment_method='$paymentmethod', paidon='$created_date', paymentstatus='$status', confirmation_code='$confirmation_code', paymentaccount='$payment_account' WHERE invoice_id='$invoiceid'" ;
    $db->conn->query($sqlpesapal);

    if($status!=="COMPLETED"){
    
        $sqlupdateinvoice  = "UPDATE ".$prefix."invoices SET paystatus='Paid' WHERE invoiceno='$invoiceid'";
        $db->conn->query($sqlupdateinvoice);
        
        header("location:../invoice.php?invoiceid=".$invoiceno."&success=Payment was successful");

    }else{
         header("location:../invoice.php?invoiceid=".$invoiceno."&error=".$description);
    }
    
}else{
     header("location:../invoice.php?error=There was no matching invoice found. Please contact the Administrator");
}

