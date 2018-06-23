<?php 
require_once 'config.php';
ini_set('display_errors','on');
	if ($_FILES["file"]["name"]!= '') {
		
		$id=$_POST['id'];

		global $flag;
		$sql="select id,name,email from profile where id='$id'";
		$row=mysqli_fetch_array(mysqli_query($con,$sql), MYSQLI_ASSOC);

		$name=$row['id']."_".$_FILES['file']['name'];

		$location="upload/profile/".$name;

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $location)){
			
			$sql_2="update profile set profile_img='$name' where id='$id'";
			$result=mysqli_query($con,$sql_2);

			if ($result>0) {
				$success['success']='success';
				echo json_encode($success);
			}
		}else{
			$success['success']='failure';
			echo json_encode($success);
		}

		mysqli_close($con);
		exit();

	}


?>