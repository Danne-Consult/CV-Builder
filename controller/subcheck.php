<?php
     function checkbasicpro($temptype, $tplid){

        include_once "../manage/_db/dbconf.php"; 
        $db = new DBconnect;
        $prefix = $db->prefix;
        $userid = $_SESSION['userid'];
        $currdate = date("Y-m-d h:i:s");

        $sql1 = "SELECT * FROM ".$prefix."users a LEFT JOIN ".$prefix."user_subscription b ON a.id=b.userid WHERE a.usercode = '$userid' ORDER BY b.id DESC LIMIT 1";
        $result1 = $db->conn->query($sql1);
        $trws = mysqli_num_rows($result1);
        $rws = $result1->fetch_array();

        $basicpro="";

        if($temptype=="resume"){
            $sql2 = "SELECT probasic FROM ".$prefix."resume_templates WHERE id='$tplid'" ;
            $result2 = $db->conn->query($sql2);
            $rws2 = $result2->fetch_array();
            $basicpro=$rws2['probasic'];
        }

        if($temptype=="coverletter"){
            $sql2 = "SELECT probasic FROM ".$prefix."coverletter_templates WHERE id='$tplid'" ;
            $result2 = $db->conn->query($sql2);
            $rws2 = $result2->fetch_array();
            $basicpro=$rws2['probasic'];
        }

        $downloadlimit = $rws['limit'];
        $cvdown = $rws['cvsdown'];
        $coverdown = $rws['letterdown'];
        $expirydate = new DateTime($rws['expirydate']);
        $currdate = new DateTime($currdate);

        if($rws['subtype'] == $basicpro){
 
            if($expirydate > $currdate){

                if($temptype =="resume"){
                    if($cvdown >= $downloadlimit){
                        //proceed to download the cv
                        header("location:cv?cvtpl=".$tplid."&error=You have reached your CV download limit!&ren=1");
                        exit;
                    }else{
                        header("location:cv?d=1&cvtpl=".$tplid);
                        exit;
                    }
                }
                if($temptype =="coverletter"){
                    if($coverdown >= $downloadlimit){
                        //proceed to download the cv
                        header("location:coverletter?clt=".$tplid."&error=You have reached your Coverletter download limit!&ren=1");
                        exit;
                    }else{
                        header("location:coverletter?d=1&clt=".$tplid);
                        exit;
                    }
                }

                
            }else{
                header("location:coverletter?clt=".$tplid."&error=Your Subscription has expired!&ren=1");
                exit;
            }
        }else{
            header("location:coverletter?clt=".$tplid."&error=You need to upgrade your subscription to download!");
            exit;
        }
    }

?>