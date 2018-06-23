<?php 
	require_once('config.php');

	$id=$_GET['id'];

	$sql_q="SELECT * FROM `customers` WHERE id='$id'";
	$result=mysqli_query($con,$sql_q);
	$row=mysqli_fetch_array($result);

	if (isset($_POST['Submit'])=='Submit') {
		$name=$_POST['name'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];

		$sql="UPDATE `customers` SET `name`='$name',`email`='$email',`mobile`='$mobile' WHERE id='$id'";

		$rr=mysqli_query($con,$sql);
		if ($rr>0) {
			echo "<div class='container'><h1>Success</h1></div>";
		}else{
			echo "<div class='container'><h1>Failure</h1></div>";
		}
	}

		
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update....</title>
	<meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<h1>This is your Detail</h1>
	</div>
	<div>
	<table class="table table-striped table-bordered">
		<th>Name</th>
		<th>email</th>
		<th>moble</th>
		<tr>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['email'];?></td>
			<td><?php echo $row['mobile'];?></td>
		</tr>
		<form method="POST">
		<tr>
			<td><input type="text" name="name" value="<?php echo $row['name'];?>" 
			pattern="^[a-zA-Z][a-zA-Z0-9]{1,20}$"></td>
			<td><input type="email" name="email" value="<?php echo $row['email'];?>"></td>
			<td><input type="text" name="mobile" value="<?php echo $row['mobile'];?>" 
			pattern="[0-9]{10}"></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="Submit" id="Submit" class="btn">&nbsp;&nbsp;
				<a href="index.php" class="btn">Back</a>&nbsp;&nbsp;
				<a href="update.php" class="btn">Refresh</a>
			</td>
		</tr>
		</form>

		<!--<h1><?php echo $id;?></h1>-->
	</table>
	</div>
</div>
	
</div>
</body>
</html>