<?php

	$servername = 'localhost';
	$usern = 'root';
	$password = '';
	$dbase = 'quiz';

	$con = mysqli_connect($servername, $usern, $password, $dbase);

	if ($con -> connect_error) {
		die("Error in DB connection: ".$con->connect_errno." : ".$con->connect_error);    
	}
?>