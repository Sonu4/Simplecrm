<!DOCTYPE html>
<html>
<head>
	<title>Javascript Array</title>
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
<body>
		<header>
			<h1>jQuery Country Api</h1>
		</header>
		<div id="container">
			<div id="result"></div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){

				var info=[{
					Country:"India",
					state:"Maharashtra",
					City:"Nagour"
				},
				{
					Country:"XYZ",
					state:"QRU",
					City:"QWER"
				},
				{
					Country:"QQQ",
					state:"WWW",
					City:"EEE"
				},
				{
					Country:"TTT",
					state:"YYY",
					City:"EEEE"
				}
				];

					for(var i=0;i<info.length;i++){
						$('#result').append('<h3>'+info[i].Country+'</h3>');
					}
					
				info.push({
					Country:info[0].Country,
					state:info[1].state,
					City:info[2].city
				});	
						$('#result').append('<h3>'+info[4].Country+'</h3>');
			});
		</script>
</body>
</html>