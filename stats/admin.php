<?php   
	include ("../session.inc");
//include ("./grid.php");
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
		<h1>Secci&oacute;n de Estad&iacute;sticas para administrador</h1>
		<br />
		<center>
		<h2>Elija el tipo de reporte a realizar.</h2>
		<form action="stat.php" method="post">
		<BR />
		<select name="select" align="center" onchange="toggleMe(this.value)" >
			<option value="top_user">10 Mejores tiempos por usuario</option>
			<option value="bottom_user">10 Peores tiempos por usuario</option>
			<option value="top_team">10 Mejores tiempos por equipo</option>
			<option value="bottom_team">10 Peores tiempos por equipo</option>
			<option value="login_user">Fechas de acceso por usuario</option>
		</select>
			
		<br /><br />
		<div id="user">
		<label id="lbl_info">Ingrese el nombre de usuario</label>
		<br />
		<input type="text" name="txt_username" value="" />
		</div> 
		<br /><br />
		<input type="submit" name="btn_buscar" value="Buscar" /> 
		</form>
		<br />
		
		<?php 
		if (isset ($_GET['result'])){
			 if($_GET['result'] == 'miss_data') {
				 echo "<center><h3>Datos incompletos</h3></center>";
			 }
			 if($_GET['result'] == 'error') {
				 echo "<center><h3>Se ha producido un error, por favor intentelo de nuevo</h3></center>";
			 }
		}
		?>
		
		</center>
	</div>
	<?php
		$obj = new general($mysqli);
		echo $obj->footer("../");
	?>
    
</body>
</html>
