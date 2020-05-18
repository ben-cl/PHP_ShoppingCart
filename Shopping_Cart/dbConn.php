<?php
//session_start();

$conn = new mysqli("localhost","root","","store2");

if($conn->connect_error){
	
	echo "Connection failed: $conn->connect_error";
	exit;
}


?>