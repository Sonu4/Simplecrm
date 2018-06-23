<?php 
		require_once 'config.php';

		$sql="SELECT `id_b`, `blog_name`, `blog_body`, `img_one`, `img_two`, `img_three`, `img_four`, `id`, `access` FROM `blogs` WHERE access=1";

		$result=mysqli_query($con,$sql);

		
		while ( $row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$success[]=$row;
		}

		echo json_encode($success);

		exit();

 ?>