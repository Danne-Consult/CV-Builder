<?php
include_once "_db/dbconf.php";

class Userinfo extends DBconnect{

    public function checkuser($username, $pass){

        date_default_timezone_set("Africa/Nairobi");
        
        $prefix = $this->prefix;
        $sql = "SELECT * FROM ".$prefix."manage_users WHERE username = '$username'";
        $result = $this->conn->query($sql);
        $trws = mysqli_num_rows($result);
        $rws = $result->fetch_array();
        $passhash = $rws['password'];

        if($trws==1){
            if(password_verify($pass,$passhash)){
                $_SESSION['admin']= $rws['id'];
                $_SESSION['lastlogintime'] = time();
			    $currdatetime= date("y-m-d h:i:s");

                if(!$_SESSION['admin'] == ""){
                    $sqlx= "UPDATE ".$prefix."manage_users SET lastlogin='$currdatetime' WHERE username='$username'";
                    $this->conn->query($sqlx);
                    header("location:index.php");
                }else{
                    $error = "Something went wrong!";
                    return $error;
                }
            }else{
                $error = "Wrong username or password";
                return $error;
            }
        }else{
            $error = "No record found";
            return $error;
        }
        
    }
}