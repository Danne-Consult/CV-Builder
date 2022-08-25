<?php
	session_start();
    if(isset($_SESSION['userid'])){
		header('location:../home.php');
	}else{
        if(isset($_POST['loginx'])){
            $username = $_POST['username'];
            $password = $_POST['passx'];

            login($username,$password);
        }else{
            header('location:../login.php?error=Fill in this form.');
        }
    }

    function login($user,$pass){
        
        include "../manage/_db/dbconf.php";
        $db = new DBconnect;
        $prefix = $db->prefix;

        $sql = "SELECT * FROM ".$prefix."users WHERE email='$user'";

        $result = $db->conn->query($sql);
        $trws = mysqli_num_rows($result);
        $rws = $result->fetch_array();
        $passhash = $rws['password'];

        if($trws==1){
            if(password_verify($pass,$passhash)){
                $_SESSION['user']= $rws['id'];
                $_SESSION['userid']= $rws['usercode'];
                $_SESSION['fname'] = $rws['fname'];
                $_SESSION['lname'] = $rws['lname'];
                $_SESSION['lastlogintime'] = time();
                date_default_timezone_set("Africa/Nairobi");
			    $currdatetime= date("y-m-d h:i:s");
                
                if(!$_SESSION['userid'] == ""){
                    $sqlx= "UPDATE ".$prefix."users SET lastlogin='$currdatetime' WHERE email='$user'";
                    $db->conn->query($sqlx);
                    header("location:../home.php");  	  
                }else{
                    header("location: ../login.php?error=Unable to login");
                    exit();
                }
            }else{
                header('location:../login.php?error=Invalid password');
                exit();
            }
        }else{
            header("location: ../login.php?error=No record found");
            exit();
        }
        
    }

  
	
?>
