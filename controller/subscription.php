<?php
    session_start();
    include "../manage/_db/dbconf.php";
    if(!isset($_SESSION['userid'])){session_destroy(); header('location:../login.php?error=You must login to subscribe'); }
    
    $userid= $_SESSION['userid'];
    date_default_timezone_set("Africa/Nairobi");
    $prestype = $_GET['t'];
    $presweeks = $_GET['w'];
    $prescost = $_GET['cost'];

     function generateRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

    $randstring = generateRandomString(6);
    
    function createinvoice($userid, $pestype, $presperiod, $invoiceid, $prescost){
        $db = new DBconnect;
        $prefix = $db->prefix;
        $currdatetime = date("y-m-d h:i:s");

        $sql1="INSERT INTO ".$prefix."invoices (userid, tplcost, invoiceno, invoicedate,period, paystatus, paytype) VALUES('$userid','$prescost','$invoiceid','$currdatetime','$presperiod','0', '$pestype')";
        $db->conn->query($sql1);

        $sql2 = "SELECT * FROM ".$prefix."invoices WHERE id = LAST_INSERT_ID()";
        $result2 = $db->conn->query($sql2);
        $rws2 = $result2->fetch_array();
        $invoiceid = $rws2['invoiceno'];
        header('location:../invoice.php?invoiceid='.$invoiceid);
       
    }

    createinvoice($userid,$prestype, $presweeks, $randstring, $prescost);


