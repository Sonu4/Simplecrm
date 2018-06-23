<?php 
		require_once 'config.php';

		$id=$_POST['id'];

		$sql="update blogs set access=1 where id_b='$id'";

		$result=mysqli_query($con,$sql);

		if ($result > 0) {
			$success['success']='Approved';
		}else {
			$success['success']='Failed';
		}

		echo json_encode($success);

		exit();
		
 ?>