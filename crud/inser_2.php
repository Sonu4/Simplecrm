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
					// define variables and set to empty values
					$name = $email = $mobile="";
					$nameErr = $emailErr = $mobileErr="";

				
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						  if (empty($_POST["name"])) {
						    $nameErr = "Name is required";
						    echo $nameErr;
						  } else {
						    $name = test_input($_POST["name"]);
						    // check if name only contains letters and whitespace
						    if (!preg_match("/^[a-zA-Z ']*$/",$name)) {
						      $nameErr = "Only letters and white space allowed"; 
						       echo $nameErr;
						    }
						  }

						  	echo $name;

						  if (empty($_POST["email"])) {
						    $emailErr = "Email is required";
								echo $emailErr;
						  } else {
						    $email = test_input($_POST["email"]);
						    // check if e-mail address is well-formed
						    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						      $emailErr = "Invalid email format";
						      	echo $emailErr;					
						    }
						  }

						  	echo $email;

						  if (empty($_POST["mobile"])) {
						    $mobileErr = "mobile is required";
								echo $mobileErr;
						  } else {
						    $mobile = test_input($_POST["mobile"]);
						  }

						  echo $mobile;



						  if (!$nameErr&&!$emailErr&&!$mobileErr) {
						  	
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

					}


					function test_input($data) {
					  $data = trim($data);
					  $data = stripslashes($data);
					  $data = htmlspecialchars($data);
					  return $data;
					}



					?>
			
		<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="form-horizontal form" enctype="multipart/form-data" >

			<div class="row">
				<input type="text" name="name" id="name" class="input" placeholder="Enter yor name"
				value="<?php echo $name;?>"><br /><br />
			</div>
			<div class="row">
				<input type="text" name="email" id="email" class="input" placeholder="Enter yor Email" value="<?php echo $email;?>"><br /><br />
			</div>	
			<div class="row">
				<input type="text" name="mobile" id="mobile" class="input" placeholder="Enter yor Mobile No."  value="<?php echo $mobile;?>"
				><br /><br />
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