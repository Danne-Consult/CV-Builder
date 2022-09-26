<?php 
date_default_timezone_set("Africa/Nairobi");
header("Content-Type:application/json");

$content = file_get_contents('php://input');

$res = json_decode($content);

$resultcode = $res->Body->stkCallback->ResultCode;
$checkoutrequestID = $res->Body->stkCallback->CheckoutRequestID;
$transamount = $res->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$transid = $res->Body->stkCallback->CallbackMetadata->Item[1]->Value;
//$balance = $res->Body->stkCallback->CallbackMetadata->Item[2]->Value;
$transtime = $res->Body->stkCallback->CallbackMetadata->Item[3]->Value;
$phoneno = $res->Body->stkCallback->CallbackMetadata->Item[4]->Value;

$today = date("l jS F Y h:i:s A");

$rec = $today.' - '. $resultcode.', '.$checkoutrequestID.', '.$transid.', '.$transamount.', '.$transtime.', '.$phoneno.' \n';

file_put_contents('transaction_log', $rec, FILE_APPEND);
file_put_contents('log', $content, FILE_APPEND);

include "../manage/_db/dbconf.php";
$db = new DBconnect;
$prefix = $db->prefix;

$sqlmpesa="INSERT INTO ".$prefix."mpesatrans (mpesareceipt, date, phone, amount, requestid) VALUES('$transid','$transtime','$phoneno','$transamount', '$checkoutrequestID')" ;
$db->conn->query($sqlmpesa);

$sqlrequest="SELECT * FROM ".$prefix."invoices WHERE requestid='$checkoutrequestID'";
$rrequest = $db->conn->query($sqlrequest);
$rtrows = mysqli_num_rows($rrequest);
$rrws = $rrequest->fetch_array();

$invoiceno = $rrws['invoiceno'];

if($rrws!==0){
    
    $sql2 = "UPDATE ".$prefix."invoices SET paystatus='Paid', paybalance='0' WHERE requestid='$checkoutrequestID'";
    $db->conn->query($sql2);

    header("location:../invoice.php?invoiceid=".$invoiceno."&success=Payment was successful");

        
}else{
    header("location:../invoice.php?error=There was no matching invoice found. Please contact the Administrator");
}

?>
