<?php
if(isset($_GET['tplid']) && isset($_GET['temptype']) ){

    session_start();
    include "../manage/_db/dbconf.php";
    $db = new DBconnect;
    $prefix = $db->prefix;
    $userid= $_SESSION['userid'];
    $tplid = $_GET['tplid'];
    $tpltype = $_GET['temptype'];
    date_default_timezone_set("Africa/Nairobi");
	$currdatetime = date("y-m-d h:i:s");

    $sql1="SELECT * FROM ".$prefix."invoices a LEFT JOIN ".$prefix."mpesatrans b ON a.requestid=b.requestid WHERE a. userid='$userid' AND a.templateid='$tplid'";
    $result1 = $db->conn->query($sql1);
    $trws1 = mysqli_num_rows($result1);
    $rws1 = $result1->fetch_array();

    function generateRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

    function updatedbtemplate($userid, $id, $type){
        $db = new DBconnect;
        $prefix = $db->prefix;
        if($type=="coverletter"){
            $sqlup="UPDATE ".$prefix."user_coverletter SET covertemp='$id' WHERE userid='$userid'";
            $db->conn->query($sqlup);
        }
        if($type=="resume"){
            $sqlup="UPDATE ".$prefix."user_resume SET cvtemp='$id' WHERE userid='$userid'";
            $db->conn->query($sqlup);
        }
    }

    function createinvoice($userid, $tpltype, $tplid){
        $db = new DBconnect;
        $prefix = $db->prefix;
        $currdatetime = date("y-m-d h:i:s");

        $tempcost ="";

        if($tpltype=="resume"){
            $sql2="SELECT * FROM ".$prefix."resume_templates WHERE id='$tplid'";
            $result2 = $db->conn->query($sql2);
            $rws2 = $result2->fetch_array();

            $tempcost = $rws2['tempcost'];
        }

        if($tpltype=="coverletter"){
            $sql4="SELECT * FROM ".$prefix."coverletter_templates WHERE id='$tplid'";
            $result4 = $db->conn->query($sql4);
            $rws4 = $result4->fetch_array();

            $tempcost = $rws4['tempcost']; 
        }


        $invoiceno = generateRandomString(6);
        
        $sql3="INSERT INTO ".$prefix."invoices (userid, templateid, tpltype, tplcost, invoiceno, invoicedate, paystatus, paytype) VALUES('$userid','$tplid','$tpltype','$tempcost','$invoiceno','$currdatetime','0', 'One time')";
        $db->conn->query($sql3);

        $sql5 = "SELECT * FROM ".$prefix."invoices WHERE id = LAST_INSERT_ID()";
        $result5 = $db->conn->query($sql5);
        $rws5 = $result5->fetch_array();
        $invoiceid = $rws5['invoiceno'];
        header('location:../invoice.php?invoiceid='.$invoiceid);
    }


    updatedbtemplate($userid, $tplid, $tpltype);

    if($trws1>0){

        $sql6 = "SELECT * FROM ".$prefix."invoices WHERE userid='$userid' AND templateid='$tplid'";
        $result6 = $db->conn->query($sql6);
        $rws6 = $result6->fetch_array();
        $invoiceid = $rws6['invoiceno'];
       
        if($rws1['tplcost']==0){            
            //if template is free
            if($tpltype=="resume"){
                header('location:../cv.php?fid='.$invoiceid.'&cvtpl='.$tplid.'&d=1');
            }
            if($tpltype=="coverletter"){
                header('location:../coverletter.php?fid='.$invoiceid.'&cvtpl='.$tplid.'&d=1');
            }
            
        }
        if($rws1['tplcost']>0){
            //if template is not free
            if($rws1['paystatus']=="Paid"){
                //check if template is paid, allow to download if days is < 10
                
                $mpesadate = new DateTime($rws1['date']);
                $currdatetime = new DateTime($currdatetime);
                
                $difference = $currdatetime->diff($mpesadate);

                if($difference<=10){

                    if($tpltype=="resume"){
                        header('location:../cv.php?fid='.$invoiceid.'&cvtpl='.$tplid.'&d=1');
                    }
                    if($tpltype=="coverletter"){
                        header('location:../coverletter.php?fid='.$invoiceid.'&cvtpl='.$tplid.'&d=1');
                    }

                }else{
                    createinvoice($userid, $tpltype, $tplid);     
                }
            }else{
               header('location:../invoice.php?invoiceid='.$invoiceid);      
            }
        }
    }else{
        createinvoice($userid, $tpltype, $tplid);
    }
}
?>