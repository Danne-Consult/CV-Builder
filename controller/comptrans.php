<?php
    session_start();

    if(isset($_GET['invoiceid'])){
        $userid = $_SESSION['userid'];
        $invoiceno = $_GET['invoiceid'];
        $tel = $_GET['t'];
        include "../manage/_db/dbconf.php";
        $db = new DBconnect;
        $prefix = $db->prefix;
        $sql = "SELECT * FROM ".$prefix."invoices WHERE tel='$t'";
        $result = $db->conn->query($sql);
        $trws = mysqli_num_rows($result);
        $rws = $result->fetch_array();
        if($trws!==0){
            if($rws['paystatus']=="paid"){
                header("location:../invoice.php?invoiceid=".$invoiceno."&success=Transaction was successful&tpltype=". $rws['tpltype']);
            }else{
                header("location:../invoice.php?invoiceid=".$invoiceno."&error=Transaction is incomplete, please click complete transaction again&c=1");
            }
        }

    }
?>