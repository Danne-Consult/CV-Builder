<?php
	session_start();
    date_default_timezone_set("Africa/Nairobi");

    include "../manage/_db/dbconf.php";

    function signup($firstname, $lastname, $email, $pass, $passretype, $ran){
        
        $currentdate= date("y-m-d h:i:s"); 
        $db = new DBconnect;
        $prefix = $db->prefix;
        $sqlecmail = "SELECT email FROM ".$prefix."users WHERE email='$email'";
        $resultemail = $db->conn->query($sqlecmail);
        $emailrws = mysqli_num_rows($resultemail);

        
        if($pass!==$passretype){
            header('location:../signup.php?error=Password Missmatch');
            exit();
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('location:../signup.php?error=invalid Email');
            exit();
        }

        if($emailrws==1){
            header('location:../signup.php?error=That email is already in use.');
            exit();
        }

        $hashedpw = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO ".$prefix."users (usercode, fname, lname, email, password, createdon, status) VALUES('$ran','$firstname','$lastname','$email','$hashedpw','$currentdate','1')";
        $result = $db->conn->query($sql);

        if(!$result){
            header('location:../signup.php?error=Something went wrong. Please try again later.');
            exit();
        }

        $sql1 = "SELECT * FROM ".$prefix."users WHERE email='$email'";
        $result1 = $db->conn->query($sql1);
        $trws = mysqli_num_rows($result1);
        $rws = $result1->fetch_array();

        if($trws==1){   
            $_SESSION['user']= $rws['id'];
            $_SESSION['userid']= $rws['usercode'];
            $_SESSION['fname'] = $rws['fname'];
            $_SESSION['lname'] = $rws['lname'];
            $_SESSION['lastlogintime'] = time();

            if(isset($_SESSION['userid'])){
                header("location:../home.php");
            }else{
                header("location:../signup.php?error=unable to login");
                exit();
            }
        }else{
            header('location:../signup.php?error=Sorry! We Could not register you at the moment. Please try later.');
            exit();
        }        
    }
    function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
    

    if(isset($_POST['signupx'])){

        $randstr = generateRandomString();
        $fname = addslashes($_POST['fname']);
        $lname = addslashes($_POST['lname']);
        $useremail = addslashes($_POST['useremail']);
        $pass = addslashes($_POST['passx']);
        $repass = addslashes($_POST['repassx']);

        signup($fname,$lname, $useremail, $pass, $repass, $randstr);

    }else{
        header('location:../signup.php?error=Signup first');
    }
	
?>
