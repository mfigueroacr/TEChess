<?php   
include ("../../session.inc");
include ("../../tools/user.php");
	check_login($mysqli, "Administrador");
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
	 <link type="text/css" href="../../CSS/site.css" rel="stylesheet" />
	  <link type="text/css" href="../../CSS/menu.css" rel="stylesheet" />
    
    <!-- Javascript -->
      <script type="text/javascript" src="../../Javascript/jquery.js"></script>
      <script type="text/javascript" src="../../Javascript/menu.js"></script>
      <script type="text/javascript" src="../../Javascript/site.js"></script>
</head>
<body>
<?php
 		$obj = new general($mysqli);
 		echo $obj->login_header("../../");
 		$obj->menu("../../");
		
?>
	<div id="contenido">
	<header >
        <hgroup >
            <h1 align="center">TeChess ver lista de usuarios</h1> 
            <br />
        </hgroup>
    </header>
    <center>
    <section>
    	<table border="1">
			<tr>
			<th>Nombre       </th>
			<th>Apellido     </th>
			<th>Nombre de Usuario    </th>
			<th>Tipo de Usuario    </th>
			<th>Fecha y hora de registro</th>
			<?php 
	    		$user = new user($mysqli);
				$result = $user-> view_users();
				if ($result){
					foreach ($result as $_key) {
						echo "</tr> <tr>";
						echo "<td>" . $_key['name']. "<td>" . $_key['lastname'] . 
							"<td>" .$_key['username'] . "<td>" . $_key['profile'] .
							"<td>" .$_key['date']; 				
						echo "</tr>";
					}
				}
    		?>
		</table>
	</section>
	</center>    
	</div>
	<?php
		$obj = new general($mysqli);
		echo $obj->footer("../../");
	?>
</body>
</html>