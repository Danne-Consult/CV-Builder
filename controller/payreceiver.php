<?php 
header("Content-Type:application/json");

$content = file_get_contents('php://input'); //Recieves the response from MPESA as a string

$res = json_decode($content, false); //Converts the response string to an object

print_r($content);

?>