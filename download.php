<?php 

if(isset($_GET['rec'])){
 if($_GET['rec']!==""){

    session_start();
    $rec = $_GET['rec'];
    include "manage/_db/dbconf.php";

    if($rec == "coverletter"){
        $db = new DBconnect;
        $prefix = $db->prefix;
        $user=$_SESSION['userid'];
        $sqlx="SELECT * FROM ".$prefix."user_coverletter a LEFT JOIN ".$prefix."coverletter_templates b ON a.covertemp = b.id WHERE userid='$user'";
        $resultx= $db->conn->query($sqlx);
        $rwsx = $resultx->fetch_array();

        if($rwsx['temptype']=="free"){
            
        }
        if($rwsx['temptype']=="paid"){
            
        }


    }
    if($rec == "resume"){
        
    }

 }else{
    header("location:javascript://history.go(-1)");
 }

}else{
    header("location:javascript://history.go(-1)");
}


function invoiceuser($usercode, $tempid, $tempcost){

}
function downloaddoc($doccode){

}

?>