<?php   
	include ("../session.inc");
	check_login($mysqli,"Administrador");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Estadisticas</title>
		<meta name="description" content="" />
		<meta name="author" content="Kelvin" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />

	<!-- CSS -->
	 <link type="text/css" href="../CSS/site.css" rel="stylesheet" />
	  <link type="text/css" href="../CSS/menu.css" rel="stylesheet" />
    
    <!-- Javascript -->
      <script type="text/javascript" src="../Javascript/jquery.js"></script>
      <script type="text/javascript" src="../Javascript/menu.js"></script>
      <script type="text/javascript" src="../Javascript/site.js"></script>
</head>
<body>
<?php
 		$obj = new general($mysqli);
 		echo $obj->login_header('../');
 		$obj->menu("../");
		
?>
	<div id="contenido">
		<h1>Resultado</h1>
		<br />

<center>
	
<?php

	//include charts.php to access the InsertChart function
	include "./graph/charts.php";
	echo InsertChart ( "./graph/charts.swf", "./graph/charts_library", "grid.php", 400, 250 );
?>
	
</center>
	</div>
	
	<?php
		$obj = new general($mysqli);
		echo $obj->footer("../");
	?>
    
</body>
</html>