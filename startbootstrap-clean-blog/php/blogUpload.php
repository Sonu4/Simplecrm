<?php 
ini_set("display_errors", "on");
		require_once 'config.php';

if ($_FILES["blog_img_1"]["name"]!= '' && $_FILES["blog_img_2"]["name"]!= '' && $_FILES["blog_img_3"]["name"]!= '' && $_FILES["blog_img_4"]["name"]!= '') {		

		$id=$_POST['id'];
		$blogName=mysqli_escape_string($con, $_POST['blogName']);
		$blog_BD=nl2br($_POST['blogBody']);
		$blogBody=mysqli_escape_string($con, $blog_BD);

		$blog_img_1=$_FILES['blog_img_1']['name'];
		$blog_img_2=$_FILES['blog_img_2']['name'];
		$blog_img_3=$_FILES['blog_img_3']['name'];
		$blog_img_4=$_FILES['blog_img_4']['name'];


	
		// This Creates a new common Path for each image.
	$new_path="upload/".$id.'_BLOG_';

    $test1=move_uploaded_file($_FILES['blog_img_1']['tmp_name'], $new_path.$_FILES['blog_img_1']['name']);
	$test2=move_uploaded_file($_FILES['blog_img_2']['tmp_name'], $new_path.$_FILES['blog_img_2']['name']);
	$test3=move_uploaded_file($_FILES['blog_img_3']['tmp_name'], $new_path.$_FILES['blog_img_3']['name']);
	$test4=move_uploaded_file($_FILES['blog_img_4']['tmp_name'], $new_path.$_FILES['blog_img_4']['name']);
	
	$img_base=$id.'_BLOG_';
	$img1=$img_base.$_FILES['blog_img_1']['name'];
	$img2=$img_base.$_FILES['blog_img_2']['name'];
	$img3=$img_base.$_FILES['blog_img_3']['name'];
	$img4=$img_base.$_FILES['blog_img_4']['name'];

		$sql="insert into blogs(blog_name,blog_body,img_one,img_two,img_three,img_four,id) values('$blogName','$blogBody','$img1','$img2','$img3','$img4','$id')";
		if (mysqli_query($con,$sql)>0) {
			echo json_encode($success['success']='success');
		}
	
	}
	else{
			echo json_encode($success['success']='Failure');

	}

 ?>