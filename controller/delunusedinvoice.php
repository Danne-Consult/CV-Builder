<?php
    include "../manage/_db/dbconf.php";
    $db = new DBconnect;
    $prefix = $db->prefix;

    $sql1 = "SELECT * FROM ".$prefix."invoices WHERE paystatus = '0'";
    $db->conn->query($sql1);