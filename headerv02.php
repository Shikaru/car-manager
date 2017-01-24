<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
	<link rel="stylesheet" type="text/css" href="/mystyle.css"> 
	<style type="text/css">
		* {
				margin:0px;
				padding:0px;
			}
		.nav {
			//background-color:red;
		}
				
		.nav ul {	
			list-style:none;
			}
			
		ul.nav {	
			text-align:center;
		}
			
		.nav li ul{
			display:none;
			position:absolute;
			top:78px;
			//left:0px;
	
		}
		
		.nav li:hover ul{
			display:block;
			//align:center;
		}
		.nav li{
			border-style: solid;
			border-width: 0.1px;
			border-color:#9198A7;
			background-color:#565D6B;
			padding:5px;
			width:100px;
		}
		.nav > li{
			display:inline-block;
			padding:5px;
			//height:80px;
			margin:50px;

		}
		li > a{
			//margin-top: 50px;
			//top:0px;
			//left:0;
			//right:0;
			//bottom:0;
			//margin: auto;
		}
		
		html, body, a {
			height: 100%;
		}
		a:link, a:visited, a:hover, a:active{
			display: flex;
			align-items: center;
			justify-content: center;
			text-decoration: none;
		}


		
		
	</style>
	</head>
	<body>

	<div id="header">
		<ul class="nav">
			<li><a id="bHome" href="index.php">Home</a></li>
			<li><a href="#">Registros</a>
				<ul>
					<li><a href="Vehicles/addVehicle.php">Vehiculos</a></li>
					<li><a href="./CarDrivers">Choferes</a></li>
				</ul>
			</li>
			<li><a href="<?php echo $_SERVER['HTTP_REFERER'];?>">Regresar</a></li>
		</ul>
	</div><!--header-->


<?php

?>

	</body>
</html>
