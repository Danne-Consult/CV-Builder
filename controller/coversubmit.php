<?php 
session_start();
if(isset($_POST['covertpl']) || isset($_POST["submitcov"])){

    date_default_timezone_set("Africa/Nairobi");
    include "../manage/_db/dbconf.php";

    $db = new DBconnect;
    $prefix = $db->prefix;

    $userid=$_SESSION['userid'];
    $currdate= date("y-m-d h:i:s"); 
    $fname= $db->escape_string($_POST['fname']); 
    $occupation= $db->escape_string($_POST['occupation']); 
    $email= $db->escape_string($_POST['email']); 
    $tel= $db->escape_string($_POST['tel']); 
    $address= $db->escape_string($_POST['address']); 
    $postalcode= $db->escape_string($_POST['postalcode']); 
    $city= $db->escape_string($_POST['city']); 
    $country= $db->escape_string($_POST['country']); 
    $website= $db->escape_string($_POST['website']); 
    $facebook= $db->escape_string($_POST['facebook']); 
    $twitter= $db->escape_string($_POST['twitter']); 
    $linkedin= $db->escape_string($_POST['linkedin']); 
    $letterdate= $_POST['letterdate']; 
    $recipient= $db->escape_string($_POST['recipient']);  
    $company= $db->escape_string($_POST['company']);            
    $comaddress= $db->escape_string($_POST['companyaddress']);   
    $comcity= $db->escape_string($_POST['companycity']);   
    $comcountry= $db->escape_string($_POST['companycountry']);
    $ref= $db->escape_string($_POST['ref']);
    $coverbody= $db->escape_string($_POST['coverbody']);
    $covertpl= $db->escape_string($_POST['covertpl']);

    $sqlx="SELECT * FROM ".$prefix."user_coverletter WHERE userid='$userid'";
    $resultx = $db->conn->query($sqlx);
    $trwsx = mysqli_num_rows($resultx);

    if($trwsx==1){
        $sqly="UPDATE ".$prefix."user_coverletter SET fullnames='$fname', occupation='$occupation', email='$email', tel='$tel', address='$address', postalcode='$postalcode', city='$city', country='$country', website='$website', facebook='$facebook', twitter='$twitter', linkedin='$linkedin', letterdate='$letterdate', recipient='$recipient', company='$company', comaddress='$comaddress', comcity='$comcity', comcountry='$comcountry', reference='$ref', coverletter='$coverbody', createdon='$currdate', covertemp='$covertpl' WHERE userid='$userid'";

        if(!$db->conn->query($sqly)){
            header("location:../coverletter.php?clt=".$covertpl."&error=Sorry! your cover letter could not be Updated. Please try again later");
        }else{
            header("location:../coverletter.php?clt=".$covertpl."&success=Cover letter updated!");
        }

    }else{

        $sqlz="INSERT INTO ".$prefix."user_coverletter (userid, fullnames, occupation, email, tel, address, postalcode, city, country, website, facebook, twitter, linkedin, letterdate, recipient, company, comaddress, comcity, comcountry, reference, coverletter, createdon, covertemp, status) VALUES('$userid','$fname','$occupation','$email','$tel','$address','$postalcode','$city','$country','$website','$facebook','$twitter','$linkedin','$letterdate','$recipient','$company','$comaddress','$comcity','$comcountry','$ref','$coverbody','$currdate','$covertpl','1')";

        if(!$db->conn->query($sqlz)){
            header("location:../coverletter.php?clt=".$covertpl."&error=Sorry! your cover letter could not be saved. Please try again later");
        }else{
            header("location:../coverletter.php?clt=".$covertpl."&success=Cover letter saved!");
        }
    }
}
?>