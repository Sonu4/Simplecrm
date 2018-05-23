<?php

	$dbName="crud_tutorial";
	$dbHost="localhost";
	$dbUserName="root";
	$dbPassword="root";

	$con=mysqli_connect("$dbHost","$dbUserName","$dbPassword","$dbName");

	if (!$con) {
		die("Connection Failed");	
	}

?>