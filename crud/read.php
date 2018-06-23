<?php
require_once('config.php');

		$id=$_GET['id'];

		$sql="select * from customers where id='$id'";
		$Result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($Result);

		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reading....</title>
	<meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>


	<div class="container">
		<div class="row">
				<h3>Result Set</h3>
		</div>
		<div class="row">
		<table class="table table-striped">
			<th>Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<tr>
				<td><?php echo $row['name'] ?></td>
				<td><?php echo $row['email'] ?></td>
				<td><?php echo $row['mobile'] ?></td>
			</tr>
			<tr>
				<td><?php echo '<td>'."<img src='images/".$row['image']."' style=width:200px;style=height:200px; style=align:start;>".'</td>';?></td>
			</tr>
		</table>
	</div>
	
	</div>

	<?php mysqli_close($con);?>
</body>
</html>