<?php
	require_once('config.php');

	if (isset($_GET['id'])) {
		$id=$_GET['id'];
	}

	$sql="DELETE FROM info WHERE id='$id'";

	if(mysqli_query($con,$sql) > 0) {
		echo "Success";
	}else{
		echo "Failure";
	}

	mysqli_close($con);
?>