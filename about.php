<?php
include ('session.inc');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>index</title>
		<meta name="description" content="" />
		<meta name="author" content="Kelvin" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />

	<!-- CSS -->
	 <link type="text/css" href="CSS/site.css" rel="stylesheet" />
	  <link type="text/css" href="CSS/menu.css" rel="stylesheet" />
    
    <!-- Javascript -->
      <script type="text/javascript" src="Javascript/jquery.js"></script>
      <script type="text/javascript" src="Javascript/menu.js"></script>
      <script type="text/javascript" src="Javascript/site.js"></script>
</head>
<body>
<?php
$obj = new general($mysqli);
echo $obj->login_header();
$obj->menu();
?>

<div id="contenido">
	<h1>Acerca de TeChess</h1>
<div id="texto">
	
	<br />
	El TeChess es un sistema de entrenamiento de ajedrez desarrollado por <a href="http://cr.linkedin.com/in/mfigueroacr" target="_blank">Manuel Figueroa Montero</a>, 
	<a href="http://cr.linkedin.com/in/kelvincr" target="_blank">Kelvin Jiménez Morales</a> y 
	<a href="http://cr.linkedin.com/in/leoneljmr" target="_blank">Leonel J. Murillo Retana</a> , todos 
	estudiantes de Ingeniería en Computación del <a href="http://www.tec.cr" target="_blank">Instituto Tecnológico de Costa Rica</a>, para la Unidad de Deportes de la Escuela de Cultura y Deportes como parte
	del curso de Proyecto de Software supervisado por la profesora Yarima Sandoval.
	<br />
		 
	</div>
</div>

<?php
$obj = new general($mysqli);
echo $obj->footer();
?>

</body>
</html>