
<?php
	
	if (isset($_POST['submit'])=='submit' && isset($_POST['name']) && isset($_POST['bookTitle']) && isset($_POST['bookAuther']))  {

		$name=$_POST['name'];
		$bookTitle=$_POST['bookTitle'];
		$bookAuther=$_POST['bookAuther'];
		$publishingDate=$_POST['publishingDate'];
		
		$entryPoint='CreateBooks';
		
		$formData=array(
						'entryPoint'=>$entryPoint,
						'name' => $name,
						'bookTitle' => $bookTitle, 
						'bookAuther' => $bookAuther,
						'publishingDate' => $publishingDate, 						
						);
		
		$str= http_build_query($formData);
	

		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://localhost/shubham/simplecrm-standard-edition-baseline-demo3/index.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $str);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$output=curl_exec($ch);
		curl_close($ch);
		$o = json_decode($output);

		// print_r(is_array($o) == true);
		// echo $o->id;
		print_r(error_get_last());

		// entryPoint=CreateBooks&name=SSSS&bookTitle=SSSS&bookAuther=SSSS&publishingDate=
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD | SimpleCRM</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet"  href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body class="container">
<div class="page-header">
  <h1>SimpleCRM<small> Bookstore</small></h1>
</div>
	<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-4">
	  	
	  <form method="post" action>
		  <div class="form-group">
		    <label>Name</label>
		    <input type="text" class="form-control" name="name" id="name" placeholder="Name Of Bookstore">
		  </div>
		  <div class="form-group">
		    <label >Book Title</label>
		    <input type="text" class="form-control"  name="bookTitle" id="bookTitle" placeholder="Name of Book">
		  </div>
		  <div class="form-group">
		    <label >Book Auther</label>
		    <input type="text" class="form-control" name="bookAuther" id="bookAuther" placeholder="Name of Auther">
		  </div>
		 <div class="form-group">
		    <label >Publishing Date</label>
		    <input type="date" class="form-control" name="publishingDate" id="publishingDate" >
		  </div>
		  <button type="submit" class="btn btn-default" id="submit" name="submit">Submit</button>
		<br />
		<br />
		<div class="alert alert-success" role="alert" id="alert">
		<?php  
				echo $o->id;
				echo $o->name;
		?>
			
		</div>
			
	</form>
		
	  </div>
	  <div class="col-md-4"></div>
	</div>
</body>
</html> 