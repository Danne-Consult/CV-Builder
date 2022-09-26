<?php
    session_start();

    if(isset($_GET['invoiceid'])){
        $userid = $_SESSION['userid'];
        $invoiceno = $_GET['invoiceid'];
        $requestid = $_GET['r'];
        
        include "../manage/_db/dbconf.php";
        $db = new DBconnect;
        $prefix = $db->prefix;

        $sql = "SELECT * FROM ".$prefix."invoices WHERE invoiceno='$invoiceno' AND requestid='$requestid'";
        $result = $db->conn->query($sql);
        $trws = mysqli_num_rows($result);
        $rws = $result->fetch_array();

        $balance = $rws['paybalance'];
        $tpl=$rws['tpltype'];
        echo $trws;
        if($trws==1){
            if($rws['paystatus']=="Paid"){
                header("location:../invoice.php?invoiceid=".$invoiceno."&success=Transaction was successful&tpltype=".$tpl);
            }
        }else{
            header("location:../invoice.php?invoiceid=".$invoiceno."error=There was an error retrieving the invoice");
        }

    }
?>