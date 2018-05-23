<!DOCTYPE html>
<html>
<head>
	<title>Country API</title>
	<script   src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<style>
		body{
			font-size: 17px;
			font-family: arial;
			background: #f4f4f4;
			line-height: 1.5em;
		}
		header{
			background: #333;
			color: #fff;
			padding: 20px;
			text-align: center;
			border-bottom:4px #000 solid;
			margin-bottom: 10px;
		}
		#container{
			width: 90%;
			margin: auto;
			padding: 10px;
		}
	</style>
</head>
<body style="align:center;">
		<header>
			<h1>jQuery Country Api</h1>
		</header>
		<div id="container">
			<div id="result"></div>
		</div>

		<script type="text/javascript">
			$(document).ready(function(){
				var glob=[{
					country:"",
					state:"",
					city:""
				}];



				$.ajax({
					method:'GET',
					url:'https://raw.githubusercontent.com/chitranshu/worlddb/master/countries-flat.json',
					dataType:'json'	
				}).done(function(data){
					alert(data[1].country);
					for(var i=0;i < data.length; i++){
					 $('#result').append('<h5>'+data[i].country+'</h5>').append('<h5>'+data[i].state+'</h5>').append('<h5>'+data[i].city+'</h5>');
						glob.push({
							country:data[i].country,
							state:data[i].state,
							city:data[i].city
						});


					}	
				});

				
				// for(var i=0;i < glob.length; i++){

				// 	 $('#result').append('<h5>'+glob[i].country+'</h5>').append('<h5>'+glob[i].state+'</h5>').append('<h5>'+glob[i].city+'</h5>');
				// 	}

			});
		</script>

		<?php
							echo "<script>";
							echo " alert(glob[0].country)"; 
							echo "</script>";
		 ?>

</body>
</html>