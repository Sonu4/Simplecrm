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
	  	
	  	<form>
		  <div class="form-group">
		    <label>Name</label>
		    <input type="text" class="form-control" id="name" placeholder="Name Of Bookstore">
		  </div>
		  <div class="form-group">
		    <label >Book Title</label>
		    <input type="text" class="form-control" id="bookTitle" placeholder="Name of Book">
		  </div>
		  <div class="form-group">
		    <label >Book Auther</label>
		    <input type="text" class="form-control" id="bookAuther" placeholder="Name of Auther">
		  </div>
		 <div class="form-group">
		    <label >Publishing Date</label>
		    <input type="date" class="form-control" id="publishingDate" >
		  </div>
		
		  <button type="submit" class="btn btn-default" id="btnSubmit">Submit</button>
		<br />
		<br />
		<div class="alert alert-success" role="alert" id="alert">...</div>
		</form>
		
	  </div>
	  <div class="col-md-4"></div>
	</div>
</body>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#btnSubmit').on('click',function(){

					//alert('click');
					if ($('#name').val()==""||$('#bookTitle').val()==""||$('#bookAuther').val()=="") {
						alert('Fill All the Data');
					}else{

						var url="http://localhost/shubham/API/createBooks.php";
						var data={
							name:$('#name').val(),
							bookTitle:$('#bookTitle').val(),
							bookAuther:$('#bookAuther').val(),
							publishingDate:$('#publishingDate').val()
						};


						$.post(url,data,function(success,status,xhr){
							alert(html(success));
							alert(html(status));
							alert(html(xhr));
						});
					}
	
			});
			
		});
	</script>

</html>