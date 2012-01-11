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
      <script type="text/javascript" src="Javascript/vanadium.js"></script>
</head>
<body>
	<a>.</a>
	<?php
		$obj = new general($mysqli);
		echo $obj->header();
	?>
	<div id="contenido">
		<center>
		<h1>TeChess Training Suite</h1>
		<p>comentario temporal: El user es admin y el password es 1234</p>
		<form id="login" action="login.php" method="POST">
			<label>Nombre de Usuario:</label><input class=":required" type="text" id="user" name="user" />
			<br />
			<br />
			<label>Contraseña:</label><input class=":required" type="password"  id="pass" name="pass"/>
			<br />
			<br />
			<input  type="submit" name="button" id="button" value="Enviar" />
			<input  type="submit" name="Submit" value="Cancelar" onclick="location.href='login.php'"/></td>
		</form>
		</center>
	<?php			
			if (isset ($_GET['result'])){
			
			 if($_GET['result'] == 'failed') {
				 echo "<center><h3>Error en usuario o contrase&ntilde;a</h3></center>";
			 }
		}
		?>

	</div>
<?php
$obj = new general($mysqli);
echo $obj->footer();
?>

</body>
</html>
