<?php 
	require_once('config.php');

	    $id=$_GET['id'];

		$sql="delete from customers where id='$id'";
		$result=mysqli_query($con,$sql);

		

?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
	<meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body class="container">
		
<h1><?php echo $_POST['id'];?></h1>

<h1><?php if($result){echo "Success";}else{echo "Failure";}?></h1>

	<?php
		mysqli_close($con);
	?>
<a href="index.php" class="btn">Back</a>
</body>
</html>