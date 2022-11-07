<?php
session_start();

if (!isset($_SESSION['userid'])){
    session_destroy();
    //header('location:login.php?error=Please login first!');
    header("Location:login.php?error=Please login first!&location=" . urlencode($_SERVER['REQUEST_URI']));
}

?>