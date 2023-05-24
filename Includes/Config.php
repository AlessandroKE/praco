<?php
$host ="Localhost";
$user ="root";
$password = "";
$db_name ="cms";

function dbConnect($host,$user,$password,$db_name){
	$conn = mysqli_connect($host,$user,$password,$db_name);
	if($conn->connect_errno != 0){
	   echo $conn->connect_error;
	   exit();
	}
	return $conn;
}



