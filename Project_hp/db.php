<?php 
$server = 'localhost';
$username = "root";
$password = "";
$db = 'hospital_management';
session_start();

$connection = new mysqli($server, $username, $password, $db);

if($connection->connect_error)
{
    echo "Error found";die();
} 
else{
    //echo "db connected successfully.<br><br><br><br>";
}

?>