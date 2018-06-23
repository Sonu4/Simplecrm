<?php 
	require_once 'config.php';

	$id=$_POST['id'];

	$sql="SELECT `id_b`, `blog_name`, `blog_body`, `img_one`, `img_two`, `img_three`, `img_four`, `id`, `access` FROM `blogs` WHERE id='$id'";

	$result=mysqli_query($con,$sql);

	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$resArr[]=$row;
	}

	echo json_encode($resArr);

	mysqli_close($con);

	exit();
 ?>