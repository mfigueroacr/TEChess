<?php
include ("../../session.inc");
include ("../../tools/configuration.php");
include ("../../tools/user.php");

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
      <script type="text/javascript" src="../../Javascript/vanadium.js"></script>
</head>
<body>
<?php
 		$obj = new general($mysqli);
 		echo $obj->login_header('../../');
 		$obj->menu('../../');
?>
	<div id="contenido">
		<?php	
		$form = '<header >
        <hgroup > <br /> <br />
            <h1 align="center">TeChess Configuraci&oacute;n</h1> 
            <br />
        </hgroup>
    </header>
    <center>
    <section>
    	<form action="config.php" method="post">
    	Ingrese el C&oacute;digo de Seguridad 
    	<input class=":required" type="password" name="txt_codigo" value="" />
    	<br /><br />
    	<input type="hidden" name="config_db"/>
    	<input type="submit" id="btn_config" value="Configurar" />
    	
		</form>
	</section>
	</center>'; 
	
		if (isset ($_GET['result'])){
			 if($_GET['result'] == 'ok'){
				$db = new configuration($mysqli);
				$result = false;
				echo "<br/><br/>";
				$result = $db->init_db();
			echo "<br/><br/>";
				$db->test_db();
				
			 }
			if($_GET['result'] == 'error') {
					echo "<br/><br/>";
				echo $form;
				 echo "<center><h3>Error en el c&oacute;digo</h3></center>";
			 }
		}
		else {
			echo $form;
		}
	?>   
	</div>
	<?php
		$obj = new general($mysqli);
		echo $obj->footer("../../");
	?>
</body>
</html>