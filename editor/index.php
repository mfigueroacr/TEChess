<?php   
include ("../session.inc");
include ("../tools/category.php");
	check_login($mysqli,"Administrador");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Index Entrenamiento</title>
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
			<?php 
		 	if (get_user()){
		 		echo 
		 		'<applet code="Editor.class"
					name="Some name goes here"
					archive="../tools/TEChess.jar"
					width="1210" height="510">
					Su explorador no soporta java.
				</applet>';
 			}
		?>
	</div>
	<?php
		$obj = new general($mysqli);
		echo $obj->footer("../");
	?>
    
</body>
</html>
