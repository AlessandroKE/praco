<?php
$host ="Localhost";
$user ="root";
$password = "";
$db_name ="cms";

function dbConnect($host,$user,$password,$db_name){
	$mysqli = new mysqli($host,$user,$password,$db_name);
	if($mysqli->connect_errno != 0){
	   echo $mysqli->connect_error;
	   exit();
	}
	return $mysqli;
}



