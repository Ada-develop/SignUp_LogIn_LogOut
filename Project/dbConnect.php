<?php
//Configuration:

$host = "localhost";
$user = "root";
$password = "";
$database = "udemy";

// Connection : 
$link = mysqli_connect($host, $user, $password, $database);

//Warnings ignore:
error_reporting(0);

// If connection failed message: 



if(!link){
   die("Connection failed : ".mysqli_connect_error());
}else{
    echo "Connected successfully";
}




?>

