<?php 
    session_start();

    if(isset($_POST['cvtpl']) || isset($_POST['saveresume'])){
        date_default_timezone_set("Africa/Nairobi");
        include "../manage/_db/dbconf.php";
        $db = new DBconnect;
        $prefix = $db->prefix;
        $userid=$_SESSION['userid'];
        $currdate= date("y-m-d h:i:s"); 

        $cvtpl = $db->escape_string($_POST["cvtpl"]);
        //$fullnames = $db->escape_string($_POST["fname"]);
        $jtitle = $db->escape_string($_POST["jtitle"]);
        //$email = $db->escape_string($_POST["email"]);
        $dob = $db->escape_string($_POST["dob"]);
        $gender = $db->escape_string($_POST["gender"]);
        $nationality = $db->escape_string($_POST["nationality"]);
        $mobile = $db->escape_string($_POST["mobileno"]);
        $address = $db->escape_string($_POST["address"]);
        $postalcode = $db->escape_string($_POST["postalcode"]);
        $languages = $db->escape_string($_POST["languages"]);
        $aboutme = $db->escape_string($_POST["aboutme"]);
        $educationlevel = $_POST["educationlevel"];
        $institution = $_POST["institution"];
        $comyearfrom = $_POST["comyearfrom"];
        $comyearto = $_POST["comyearto"];
        $schoolcomment = $_POST["schoolcomment"];
        $company = $_POST["company"];
        $occupation = $_POST["occupation"];
        $workyearfrom = $_POST["workyearfrom"];
        $workyearto = $_POST["workyearto"];
        $workcomment = $_POST["workcomment"];
        $achievements = $db->escape_string($_POST["achievements"]);
        $skill = $_POST["skill"];
        $capacity = $_POST["capacity"];
        $facebook = $db->escape_string($_POST["facebook"]);
        $twitter = $db->escape_string($_POST["twitter"]);
        $linkedin = $db->escape_string($_POST["linkedin"]);
        $interests = $db->escape_string($_POST["interests"]);
        $refname = $_POST["refname"];
        $orgcom = $_POST["orgcom"];
        $reftitle = $_POST["reftitle"];
        $refemail = $_POST["refemail"];
        $reftel = $_POST["reftel"];
        
        $numinstitute = count($institution);
        $numwork = count($company);
        $numskills = count($skill);
        $refnum = count($refname);
        
        $instcontext = "";
        $workcontext = "";
        $skillcontext = "";
        $refs="";
        
        for($i=0;$i<$numinstitute;$i++){
            if($institution[$i]!=""){
                $edulevel = $educationlevel[$i];  
                $inst = $institution[$i];
                $comyearfr = $comyearfrom[$i];
                $comto = $comyearto[$i];
                $schoolcom = $schoolcomment[$i];
            }
            $instcontext .=  "||/~". $edulevel ."/~" . $inst ."/~". $comyearfr ."-". $comto ."/~". $schoolcom; 
        }
    
        for($x=0;$x<$numwork;$x++){
            if($company[$x]!=""){
            $companys = $company[$x];
            $occupations = $occupation[$x];
            $workyfr = $workyearfrom[$x];
            $workyto = $workyearto[$x];
            $workcom = $workcomment[$x];
            }
            $workcontext .=  "||/~". $companys ."/~" . $occupations ."/~" . $workyfr ."~". $workyto ."/~". $workcom; 
        }

        for($y=0;$y<$numskills;$y++){
            if($skill[$y]!=""){
            $skills = $skill[$y];
            $range = $capacity[$y];
            }
            $skillcontext .=  "||/~". $skills ."/~" . $range; 
        }

        for($z=0;$z<$refnum;$z++){
            if($refname[$z]!=""){
            $refnames = $refname[$z];
            $orgcoms = $orgcom[$z];
            $reftitles = $reftitle[$z];
            $refemails = $refemail[$z];
            $reftels = $reftel[$z];
            }
            $refs .=  "||/~". $refnames ."/~" . $reftitles ."/~" . $orgcoms  ."/~" . $refemails ."/~" . $reftels; 
        }

        $checksql="SELECT * FROM ".$prefix."user_resume WHERE userid='$userid'";
        $checkres=$db->conn->query($checksql);
        $checknum = mysqli_num_rows($checkres);
        if($checknum == 1){
            
            $sqlup = "UPDATE ".$prefix."user_resume SET jobtitle='$jtitle', dob='$dob', gender='$gender', phone='$mobile', nationality='$nationality', address='$address', postalcode='$postalcode', languages='$languages', interests='$interests', brief='$aboutme', education='$instcontext', work='$workcontext', achievements='$achievements', skills='$skillcontext', referees='$refs', facebook='$facebook', twitter='$twitter', linkedin='$linkedin', editedon='$currdate', cvtemp='$cvtpl' WHERE userid='$userid'";

            $regup = $db->conn->query($sqlup);
            
            if($regup){  
                header("location:../cv.php?cvtpl=".$cvtpl."&success=Resume updated!");
            }else{  
                header("location:../cv.php?cvtpl=".$cvtpl."&error=There was an error updating your resume. Please try again later!");
            }
            

        }else{

            $sql = "INSERT INTO ".$prefix."user_resume (userid, jobtitle, dob, gender, phone, nationality, address, postalcode, languages, interests, brief, education, work, achievements, skills, referees, facebook, twitter, linkedin, createdon, cvtemp) VALUES ('$userid','$jtitle','$dob','$gender','$mobile','$nationality','$address','$postalcode','$languages','$interests','$aboutme','$instcontext','$workcontext','$achievements','$skillcontext','$refs','$facebook','$twitter','$linkedin','$currdate','$cvtpl')";
            $register = $db->conn->query($sql);
            
            if($register){  
                header("location:../cv.php?cvtpl=".$cvtpl."&success=Resume created"); 
            }else{  
                header("location:../cv.php?cvtpl=".$cvtpl."&error=There was an error creating your resume. Please try again later!");
            }
        }
    }
?>