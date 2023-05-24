<?php

//Preventing SQL injection attacks.

//INSERT INTO statements:
$stmt = $mysqli->prepare("INSERT INTO article (title,content,published_at) VALUES ('?,?,?)");
$stmt->bind_param("sss", $title, $content, $published_at);
	   $stmt->execute();
	   if($stmt->affected_rows != 1){
	      return "An error occurred. Please try again";
	   }else{
	      return "success";			
	   }

//SELECT * FROM statements:

// Incoming data from a login form.
$username = "Sandro";
$password = 1234;
 
$stmt = $mysqli->prepare("SELECT username, password FROM users WHERE username = ? and password = ?");
$stmt->bind_param("si", $username, $password);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

//UPDATING THE DATA:
$username = "Bob";
	$password = 9999;
	 
	$stmt = $mysqli->prepare("UPDATE users SET password = ? WHERE username = ?");
	$stmt->bind_param("is", $password, $username);
	$stmt->execute();


//DATABASE CONNECTION:
$mysqli = new mysqli('localhost', 'username', 'password', 'database_name');
	if($mysqli->connect_errno != 0){
	   echo $mysqli->connect_error;
	   exit();
	}



    
//For a string data type we use the letter "s".
//For an integer data type we use the letter "i".
//For a double (float) data type we use the letter "d".
//For a blob data type we use the letter "b".


?>

