<?php 
ini_set("display_errors","on");
	require_once 'config.php';

	$sql="SELECT blogs.id_b,blogs.blog_name,blogs.blog_body,blogs.id,profile.name,profile.email FROM blogs 
		  INNER JOIN profile ON profile.id=blogs.id WHERE blogs.access=0 LIMIT 30";

	$result=mysqli_query($con,$sql);
	

	while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$arr[]=$row;
	}

	 echo json_encode($arr);
	 exit();

?>