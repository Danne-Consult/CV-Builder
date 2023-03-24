<?php
    if(isset($_GET['recid']) && $_GET['recid']!==""){
        include "../manage/_db/dbconf.php";
        $db = new DBconnect;
        $prefix = $db->prefix;
        $recid = $_GET['recid'];
        $swords = "SELECT * FROM ".$prefix."coverletter_formats WHERE id='$recid '";
        $resultx = $db->conn->query($swords);
        $rwlist = $resultx->fetch_array();
        echo $rwlist['samplewords'];
    }

?>