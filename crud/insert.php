<?php
	include_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inserting .....</title>
	<meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<p><h1>Insert Data</h1></p>
		</div>
		<?php 
			if (isset($_POST['Submit'])&&!empty($_POST['name'])&&!empty($_POST['email'])&&!empty($_POST['mobile'])) {
					$name=mysqli_real_escape_string($con,$_POST['name']);
					//$name=$_POST['name'];
					$email=$_POST['email'];
					$mobile=$_POST['mobile'];

					$allowTypes=array('png');

					$image=$_FILES['image']['name'];
					$target="images/".basename($image);

					$targetFilePath = $target . $image;
					$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

				   if(in_array($fileType, $allowTypes)){


					 $sql="Insert into customers(name,email,mobile,image)
						  values('$name','$email','$mobile','$image')"; 

						

					
					$result=mysqli_query($con,$sql);

					if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
						echo "<h5>Image Uploaded Succesfully</h5>";
					}else{
						echo "<h5>Image upload Failed</h5>";
					}

				}
				else{
					echo "Only png images are allowed";
				}



					mysqli_close($con);					  
			}


		?>

				
		


		<form method="POST" class="form-horizontal form" enctype="multipart/form-data">
			<div class="row">
				<input type="text" name="name" id="name" class="input" placeholder="Enter yor name"
				value="<?php echo $name;?>"><br /><br />
			</div>
			<div class="row">
				<input type="email" name="email" id="email" class="input" placeholder="Enter yor Email" value="<?php echo $email;?>">><br /><br />
			</div>	
			<div class="row">
				<input type="text" name="mobile" id="mobile" class="input" placeholder="Enter yor Mobile No." value="<?php echo $mobile;?>">
				pattern="[0-9]{10}"><br /><br />
			</div>
			<div>
				<input type="submit" name="Submit" class="btn">
				<a href="index.php" class="btn"> Back</a>&nbsp;&nbsp;
				<input type="file" name="image">&nbsp;
			</div>
		</form>
	</div>
</body>
</html>