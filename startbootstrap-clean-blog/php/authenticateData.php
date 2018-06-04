<?php
ini_set('display_errors','on');
	require_once 'config.php';

	$email=$_POST['email'];
	$password = $_POST['password'];

	
	$pass=md5($password);

	$sql="SELECT id,type_of_user,email,password FROM `profile` where email='$email' and password='$pass'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
	

	if($row['email']==$email && $row['password']==$pass) {
		$success['success']='success';
		$success['id']=$row['id'];
		$success['type_of_user']=$row['type_of_user'];

			
	}else {
		$success['success']='failure';
			
	}

	echo json_encode($success);
	mysqli_close($con);
	exit();
?>	