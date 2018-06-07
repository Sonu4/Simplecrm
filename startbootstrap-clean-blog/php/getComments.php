<?php 

	require_once 'config.php';

	$id=$_POST['id'];
	$sql="SELECT `id`, `comment`, `blog_id` FROM `comments` WHERE blog_id='$id'";
	$result=mysqli_query($con,$sql);
	while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$resArr[]=$row;
	}

	echo json_encode($resArr);
	mysqli_close($con);
	exit();

 ?>