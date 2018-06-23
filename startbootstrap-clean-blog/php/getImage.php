<?php 
		require_once 'config.php';
		$id=$_POST['id'];
		$sql="select profile_img from profile where id='$id'";
		$row=mysqli_fetch_array(mysqli_query($con,$sql), MYSQLI_ASSOC);

		//$success['success']=$row['profile_img'];
		echo json_encode($row['profile_img']);

		mysqli_close($con);
		exit();
 ?>