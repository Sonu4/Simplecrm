
<?php 
		require_once 'config.php';
		$id=$_POST['id'];
		$sql="select name,email,type_of_user from profile where id='$id'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result, MYSQLI_ASSOC);// fetches all data as an array.
		if ($row) {
			$success['name']=$row['name'];
			$success['email']=$row['email'];
			$success['type_of_user']=$row['type_of_user'];	
		}else {
			$success['success']='failure';
		}

		echo json_encode($success);
		mysqli_close($con);
		exit();

 ?>