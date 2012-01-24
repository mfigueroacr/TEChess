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
	<div id="texto">
	<h1>Informaci&oacute;n de contacto</h1>
	<br />
	El TeChess es una herramienta dirigida al equipo de ajedrez del <a href="http://www.tec.cr" target="_blank">Instituto Tecnológico de Costa Rica</a>. En caso de querer contactar
	al administrador del equipo envíe un correo electrónico a la dirección <a href="mailto:techess.itcr@gmail.com">techess.itcr@gmail.com</a>.
	
	Si desea conocer información del equipo de desarrollo dirijase a la seccion <a href="./about.php">Acerca de TeChess</a>.
		 
	</div>
</div>

<?php
$obj = new general($mysqli);
echo $obj->footer();
?>

</body>
</html>