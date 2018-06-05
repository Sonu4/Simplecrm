<?php 
	
	require_once 'config.php';
	$comment=$_POST['comment'];
	$id_b=$_POST['id_b'];
	$sql="insert into comments(comment,blog_id) values('$comment','$id_b')";
	if (mysqli_query($con, $sql) > 0) {
		$success['success']='comment saved';
	}else {
		$success['success']='comment failed';
	}
	echo json_encode($success);
	exit();
 ?>