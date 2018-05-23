
<?php

	require_once('config.php');

	


	if (isset($_POST['name'])) {
		$name=mysqli_real_escape_string($con,$_POST['name']);
	}

	if (isset($_POST['lastName'])) {
		$lastName=$_POST['lastName'];
	}

	if (isset($_POST['email'])) {
		$email=$_POST['email'];
	}

	if (isset($_POST['gender'])) {
		$gender=$_POST['gender'];
	}


	$sql="INSERT INTO info(name,last_name,email,gender) VALUES('$name','$lastName','$email','$gender')";

	$result=mysqli_query($con,$sql);

	if ($result > 0) {
		echo "Success";
	}else{
		echo "Failure";
	}


	mysqli_close();_GET

?>