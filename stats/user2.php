<?php   
include ("../session.inc");
check_login($mysqli);
include ("../tools/stats.php");
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
<?php
		if ($_SESSION['re'] == "tm"){
			echo "<h1>Resultado de los 10 Mejores Tiempos para " . $_SESSION['user'] . "</h1>"; }
		else if ($_SESSION['re'] == "bm"){
			echo "<h1>Resultado de los 10 Peores Tiempos para " . $_SESSION['user'] . "</h1>"; }
?>
<br />
<center>
	<section>
    	<table border="1">
			<tr>
<?php
if ($_SESSION['re'] == "tm"){
	    		$stats = new stats($mysqli);
	    		$username = $_SESSION['user'];
				$result = $stats-> top_user($username);
				echo "<th>Nombre Ejercicio  </th>
			<th>Tiempo     </th>";
				if ($result){
					foreach ($result as $_key) {
						echo "</tr> <tr>";
						echo "<td>" . $_key['name']. "<td>" . $_key['time']; 				
						echo "</tr>";
					}
				}
}
if ($_SESSION['re'] == "bm"){
	    		$stats = new stats($mysqli);
	    		$username = $_SESSION['user'];
				$result = $stats-> bottom_user($username);
				echo "<th>Nombre Ejercicio  </th>
			<th>Tiempo     </th>";
				if ($result){
					foreach ($result as $_key) {
						echo "</tr> <tr>";
						echo "<td>" . $_key['name']. "<td>" . $_key['time']; 				
						echo "</tr>";
					}
				}
}
	//include charts.php to access the InsertChart function
	/*
	include "./graph/charts.php";
	echo InsertChart ( "./graph/charts.swf", "./graph/charts_library", "stat.php", 400, 250 );
	 */
?>
	</table>
	</section>
</center>
</div>

	<?php
		$obj = new general($mysqli);
		echo $obj->footer("../");
	?>
    
</body>
</html>