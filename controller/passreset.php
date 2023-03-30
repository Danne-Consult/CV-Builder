<?php 

function passchange($user,$newpass,$repass){
    include "../manage/_db/dbconf.php";
    $db = new DBconnect;
    $prefix = $db->prefix;


    if($newpass !== $repass){
        header('location:../passreset.php?error=New password does not match the re-typed password');
        exit();
    }else{
        $hashedpw = password_hash($newpass, PASSWORD_DEFAULT);
        $sql2="UPDATE ".$prefix."users SET password='$hashedpw' WHERE usercode='$user'";
        $result2 = $db->conn->query($sql2);

        if(!$result2){
            header('location:../passreset.php?error=There was an error changing your password!');
            
            
        }else{
            header('location:../passreset.php?u='.$user.'&success=Password changed! You will be redirected to the login page shortly');
            
        }
    }
}

if(isset($_POST['passchange'])){

    $newpass = $_POST['newpass'];
    $retypepass = $_POST['retypepass'];
    $user = $_POST['userrec'];

    passchange($user,$newpass,$retypepass);

}else{
    header('location:../profile.php');
}
?>