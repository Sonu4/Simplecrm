<?php
	require_once('config.php');

	$country=$_POST['country'];
	$state=$_POST['state'];

	$sql="SELECT DISTINCT city FROM glob WHERE state='$state' and country='$country' or state='' and country='$country'";
	$result=mysqli_query($con,$sql);
	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$resultArr[]=$row;
	}

	echo json_encode($resultArr);

?>