<!DOCTYPE html>
<html>
<head>
	<title>CRUD | Bootstrap</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet"  href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
		<div class=" container-fluid header">
			<div class="page-header">
			<h1>This Is CRUD Operation</h1> <small>With jQuery</small>
		</div>	
		</div>

		<div class="container">
			  		<ol class="breadcrumb margin-5">
					 <li>Welcome to CRUD</li>
					</ol>


					<div class="row">
					  <div class="col-md-4"></div>
					  <div class="col-md-4">
					  	
					  	<form>
							  <div class="form-group">
							    <label">Name</label>
							    <input type="text" class="form-control" id="txtName" >
							  </div>
							  <div class="form-group">
							    <label">Last Name</label>
							    <input type="text" class="form-control" id="txtLastName">
							  </div>
							  <div class="form-group">
							    <label">Email</label>
							    <input type="text" class="form-control" id="txtEmail">
							  </div>
							  <div class="form-group">
							    <label">Gender</label>
							    <select class="form-control" id="txtSelect">
							    	<option>Male</option>
							    	<option>Female</option>
							    	<option>Other</option>
							    </select>
							  </div>
					 
							  <button type="submit" class="btn btn-default" id="btnSubmit">Submit</button>
							
						</form> 
					  </div>
					  <div class="col-md-4"></div>
					</div>

					
			</div>
		</div>

		<div class="container margin-top">
		<div class="alert alert-warning alert-dismissible margin-5" role="alert" id="alert" style="padding:10px;"></div>
			<div class="panel panel-default">
							  <div class="panel-heading" style="background:#00ffff;">
							    <h3 class="panel-title">Your Information</h3>
							  </div>
							  <div class="panel-body" style="padding:0;">

							    <table class="table table-bordered table-hover" style="margin:0;">
							    	<thead>
							    		<tr>

							    			<th>Name</th>
							    			<th>Last Name</th>
							    			<th>Email</th>
							    			<th>Gender</th>
							    			<th>Action</th>
							    		</tr>
							    	</thead>
							    	<tbody id="tblinfo" >

							    	</tbody>
							    </table>


							  </div>
			</div>
		</div>
		<footer class="foot">
			<label>This is &copy; 2018</label>
		</footer>
</body>

<script type="text/javascript">
	
		$(document).ready(function(){

		processdata();
				$('#btnSubmit').on('click',function(){

					var data={
						name:$('#txtName').val(),
						lastName:$('#txtLastName').val(),
						email:$('#txtEmail').val(),
						gender:$('#txtSelect').val()
					};

					var url="http://localhost/shubham/CrudWithAjax/phpDoc/insertData.php";
					$.post(url,data,function(data){
						$('#alert').text(data);
					});

					
				});

	
			function processdata(){
				var url2="http://localhost/shubham/CrudWithAjax/phpDoc/getData.php";
				$.getJSON(url2).done(function(data,status,xhr){
					//sendData(data);
					$(data).each(function(i){
						$('#tblinfo').append('<tr><td>'+data[i].name+'</td><td>'+data[i].last_name+'</td><td>'+data[i].gender+'</td><td>'+data[i].email+'</td><td><button class="btn btn-success" id="btnDelete" name="'+data[i].id+'">Delete</button>&nbsp;&nbsp&nbsp;&nbsp<button class="btn btn-success" id="btnUpdate" name="'+data[i].id+'">Update</button></td></tr>');
						});

				});
					

			
		/*	function sendData(data){
				
				$(data).each(function(i){
	
						$('#tblinfo').append('<tr><td>'+data[i].name+'</td><td>'+data[i].last_name+'</td><td>'+data[i].gender+'</td><td>'+data[i].email+'</td><td><button class="btn btn-success" id="btnDelete" name="'+data[i].id+'">Delete</button>&nbsp;&nbsp&nbsp;&nbsp<button class="btn btn-success" name="'+data[i].id+'">Update</button></td></tr>'
							);
						});

			}	
		*/	

		
	}

});

</script>
</html>