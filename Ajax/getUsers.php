<?php
		ini_set('display_errors','on');

		$conn=mysqli_connect('localhost','root','root','crud_tutorial');

		$query='select * from users';

		$result=mysqli_query($conn,$query);

		$rows = array();
		while ($row = $result->fetch_assoc()) {
			   $rows[] = $row;
		}

		echo json_encode($rows);

		mysqli_close($conn);
?>