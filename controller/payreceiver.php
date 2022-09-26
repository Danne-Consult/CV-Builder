<?php 
session_start();
date_default_timezone_set("Africa/Nairobi");
header("Content-Type:application/json");

$content = file_get_contents('php://input');
$res = json_decode($content);


$resultcode = $res->Body->stkCallback->ResultCode;
$checkoutrequestID = $res->Body->stkCallback->CheckoutRequestID;
$transamount = $res->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$transid = $res->Body->stkCallback->CallbackMetadata->Item[1]->Value;
$balance = $res->Body->stkCallback->CallbackMetadata->Item[2]->Value;
$transtime = $res->Body->stkCallback->CallbackMetadata->Item[3]->Value;
$phoneno = $res->Body->stkCallback->CallbackMetadata->Item[4]->Value;

$today = date("l jS F Y h:i:s A");

$rec = $today.' - '. $resultcode.' '.$checkoutrequestID.' '.$transamount.' '.$balance.' '.$transtime.' '.$phoneno.'\n';

file_put_contents('transaction_log', $res, FILE_APPEND);
file_put_contents('log', $content, FILE_APPEND);

include "../manage/_db/dbconf.php";
$db = new DBconnect;
$prefix = $db->prefix;
$userid= $_SESSION['userid'];

$sql1 = "SELECT * FROM ".$prefix."invoices WHERE tel = '$phoneno'";
$result1 = $db->conn->query($sql1);
$trws1 = mysqli_num_rows($result1);
$rws1 = $result1->fetch_array();

function diff($val1,$val2){
   $diffval =  $val - $val2;
    return $diffval;
}

if($trws1!==0){

    
    if($balance !==""){
        $sql3 = "UPDATE ".$prefix."invoices SET mpesacode='$transid', mpesadate='$transtime', mpesaamount='$transamount', paybalance='$balance' WHERE invoiceno = '$invoiceno'";
        $db->conn->query($sql3);
        header("location:../invoice.php?invoiceid=".$invoiceno."&error=Payment was less than the invoiced amount by Kes. ".$balance);

    }else{
        $sql2 = "UPDATE ".$prefix."invoices SET mpesacode='$transid', mpesadate='$transtime', mpesaamount='$transamount',tel='$transtel', paystatus='Paid', paybalance='0' WHERE invoiceno = '$invoiceno'";
        $db->conn->query($sql2);

    header("location:../invoice.php?invoiceid=".$invoiceno."&success=Payment was successful");
    }
        
}else{
    header("location:../invoice.php?error=There was no matching invoice found. Please contact the Administrator");
}

?>
