<?php
	session_start();

	$hostname="localhost";
	$username="root";
	$password="";
	$dbname="duka_db";

	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	

?>