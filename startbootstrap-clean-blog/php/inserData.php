<?php 
require_once 'config.php';


		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$gender=$_POST['gender'];
		$type_of_user=$_POST['type_of_user'];

		$pass=md5($password);


		$sql = "insert into profile(name,email,password,gender,type_of_user,profile_img) values ('$name','$email','$pass','$gender','$type_of_user','$file')";


		$result=mysqli_query($con,$sql);


		if ($result > 0) {
			$success['success']="success";	
		}else {
			$success['success']="failure";
		}

		echo json_encode($success);
		mysqli_close($con);
		exit();	
 ?>

