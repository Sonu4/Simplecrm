<!DOCTYPE html>
<html>
<head>
	<title>Index File</title>
	<meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
				<h3>PHP Crud Grid</h3>
			</div>
			<p>
				<a href="inser_2.php" class="btn btn-success">Create</a>
			</p>
			<div class="row">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Picture</th>
							<th>Name</th>
							<th>Email Address</th>
							<th>Mobile No</th>
							<th colspan="1">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
							require_once('config.php');

							$sql="SELECT * FROM customers";
							$result=mysqli_query($con,$sql);

							if (mysqli_num_rows($result)>0) {
								while ($row=mysqli_fetch_array($result)) {
									echo '<tr>';
									echo '<td>'."<img src='images/".$row['image']."' style=width:84px;style=height:84px; class='img-circle'>".'</td>';
									echo '<td>'.$row['name'].'</td>';
									echo '<td>'.$row['email'].'</td>';
									echo '<td>'.$row['mobile'].'</td>';
									echo '<td width=250>';
									echo '<a  class="btn btn-success" href="read.php?id='.$row['id'].'">Read</a>';
									echo ' ';
									echo '<a  class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
									echo ' ';
									echo '<a  class="btn btn-success" href="delete.php?id='.$row['id'].'">Delete</a>';
									echo '</tr>';
								}
							}

							mysqli_close($con);
						?>

					</tbody>
				</table>
		</div>
	</div>
</body>
</html>