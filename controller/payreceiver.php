<?php 
session_start();
date_default_timezone_set("Africa/Nairobi");
header("Content-Type:application/json");

$content = file_get_contents('php://input');
$res = json_decode($content);


$transid = $res->TransID;
$transamount = $res->TransAmount;
$transtime = $res->TransTime;
$transtel = $res->BillRefNumber;
$transname = $res->FirstName.' '.$res->MiddleName.' '.$res->LastName;
$invoiceno = $res->InvoiceNumber;
$accbal = $res->OrgAccountBalance;

$today = date("l jS F Y h:i:s A");

$rec = $today.' - '. $transid.' '.$transamount.' '.$transtime.' '.$transtel.' '.$transname.' '.$invoiceno."\n";

file_put_contents('transaction_log', $rec, FILE_APPEND);

include "../manage/_db/dbconf.php";
$db = new DBconnect;
$prefix = $db->prefix;
$userid= $_SESSION['userid'];

$sql1 = "SELECT * FROM ".$prefix."invoices WHERE invoiceno = '$invoiceno'";
$result1 = $db->conn->query($sql1);
$trws1 = mysqli_num_rows($result1);
$rws1 = $result1->fetch_array();

function diff($val1,$val2){
   $diffval =  $val - $val2;
    return $diffval;
}

if($trws1!==0){
    $tplcost = $rws1['tplcost'];
    $paybalance = $rws1['paybalance'];

    $currentcost = $tplcost - $paybalance;

    if($currentcost == $transamount){
        $sql2 = "UPDATE ".$prefix."invoices SET mpesacode='$transid', mpesadate='$transtime', mpesaamount='$transamount',mpesaby='$transname',tel='$transtel', paystatus='Paid', paybalance='0' WHERE invoiceno = '$invoiceno'";
        $db->conn->query($sql2);

        header("location:../invoice.php?invoiceid=".$invoiceno."&success=Payment was successful");
    }
    else{
        $diff = diff($tplcost,$transamount);
        $sql3 = "UPDATE ".$prefix."invoices SET mpesacode='$transid', mpesadate='$transtime', mpesaamount='$transamount',mpesaby='$transname',tel='$transtel', paybalance='$diff' WHERE invoiceno = '$invoiceno'";
        $db->conn->query($sql3);

        header("location:../invoice.php?invoiceid=".$invoiceno."&error=Payment was less than the invoiced amount by Kes. ".$diff);

    }
}else{
    header("location:../invoice.php?error=There was no matching invoice found. Please contact the Administrator");
}

?>
