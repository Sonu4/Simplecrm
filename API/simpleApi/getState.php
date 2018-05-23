<?php
	
	require_once('config.php');

	$country=$_POST['country'];

	$sql="SELECT DISTINCT state FROM glob WHERE country='$country'";
	$result=mysqli_query($con,$sql);
	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$resultArr[]=$row;
	}

	echo json_encode($resultArr);
?>