<?php

	require_once('config.php');

	$sql="SELECT * FROM info";
		$result=mysqli_query($con,$sql);
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		   $resultArr[]=$row;
		}
	
	echo json_encode($resultArr);	
?>