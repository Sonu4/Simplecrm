<?php 
	require_once 'config.php';

	$id=$_POST['id'];

	$sql="DELETE FROM `blogs` WHERE id_b='$id'";

	$result=mysqli_query($con,$sql);
	if ($result>0) {
		$success['success']='success';
	}else {
		$success['success']='failure';
	}

	echo json_encode($success);
	mysqli_close($con);
	exit();
 ?>