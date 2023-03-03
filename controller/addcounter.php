<?php
    session_start();
    $userrec = $_SESSION['userid'];
    include_once "../manage/_db/dbconf.php";

    $db = new DBconnect;
    $prefix = $db->prefix;

    $tpltype = $_GET['tpltype'];
    $tplid = $_GET['tplid'];

    $sql1= "SELECT * FROM ".$prefix."user_subscription a LEFT JOIN ".$prefix."user b ON a.userid = b.id WHERE b.userid='$userrec' ORDER BY a.id DESC LIMIT 1";
    $result1 = $db->conn->query($sql1);
    $rws1 = $result1->fetch_array();
    $cvdown = $rws1['cvsdown'];
    $letterdown = $rws1['letterdown'];

    if($tpltype == "resume"){
        $countcv = $cvdown++;
        $sql2 = "UPDATE ".$prefix."user_subscription SET cvsdown = '$countcv'";
        $db->conn->query($sql2);
    }

    if($tpltype == "coverletter"){
        $countcover = $letterdown++;
        $sql3 = "UPDATE ".$prefix."user_subscription SET letterdown = '$countcover'";
        $db->conn->query($sql3);
    }

?>