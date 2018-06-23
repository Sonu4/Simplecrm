<?php
	
	ini_set('display_errors','on');
	echo "Processing....";

	$conn=mysqli_connect('localhost','root','root','crud_tutorial');

	if (isset($_GET['name'])) {
			echo 'GET : Your Name is '.$_GET['name'];
	}

	if (isset($_POST['name'])) {

			$name=mysqli_real_escape_string($conn,$_POST['name']);
			//echo 'POST : Your Name is '.$_POST['name'];

			$query="INSERT INTO users(name) VALUES('$name')";

			if (mysqli_query($conn,$query)) {
				echo "User Added";
			}else{

				echo "Error".mysqli_error($conn);
			}


	}

	mysqli_close($conn);
	
?>