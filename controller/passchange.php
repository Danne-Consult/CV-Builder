<?php 
session_start();

function passchange($user,$oldpass,$newpass,$repass){
    include "../manage/_db/dbconf.php";
    $db = new DBconnect;
    $prefix = $db->prefix;

    $sql="SELECT password FROM ".$prefix."users WHERE usercode='$user'";
    $result = $db->conn->query($sql);
    $rws=$result->fetch_array();
    $passhash = $rws['password'];

    if($newpass !== $repass){
        header('location:../profile.php?error=New password does not match the re-typed password');
        exit();
    }
    
    if(password_verify($newpass,$passhash)){
        header('location:../profile.php?error=New password cannot match the old password');
        exit();
    }

    if(password_verify($oldpass,$passhash)){
        $hashedpw = password_hash($newpass, PASSWORD_DEFAULT);
        $sql2="UPDATE ".$prefix."users SET password='$hashedpw' WHERE usercode='$user'";
        $result2 = $db->conn->query($sql2);

        if(!$result2){
            header('location:../profile.php?error=There was an error changing your password!');
            exit();
        }else{
            header('location:../profile.php?success=Password changed!');
            exit();
        }
    }


}

if(isset($_POST['passchange'])){
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $retypepass = $_POST['retypepass'];
    $user = $_POST['userrec'];

    passchange($user,$oldpass,$newpass,$retypepass);
}else{
    header('location:../profile.php');
}
?>