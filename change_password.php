<?php   
	include ("session.inc");
	include ("./tools/user.php");
	check_login($mysqli);
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
		<meta name="author" content="TEChess" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />

	<!-- CSS -->
	 <link type="text/css" href="./CSS/site.css" rel="stylesheet" />
	  <link type="text/css" href="./CSS/menu.css" rel="stylesheet" />
    
    <!-- Javascript -->
      <script type="text/javascript" src="./Javascript/jquery.js"></script>
      <script type="text/javascript" src="./Javascript/menu.js"></script>
      <script type="text/javascript" src="./Javascript/site.js"></script>
      <script type="text/javascript" src="./Javascript/vanadium.js"></script>
</head>
<body>
<?php
 		$obj = new general($mysqli);
 		echo $obj->login_header("./");
		//$obj->out("./");
 		$obj->menu("./");
?>

<br/><br/>

	<div id="contenido">
	<header >
        <hgroup >
            <h1 align="center">TeChess Cambiar Contraseña</h1> 
            <br />
        </hgroup>
    </header>
    <center>
    <section>
    	<form action="changepass.php" method="post">
    	<article >
    		Ingrese la contraseña nueva 
			<input id="pass" class=":required" type="password" name="password" value="" />			    	
			<br /><br />
			Repita la contraseña 
			<input class=":same_as;pass" type="password" name="txt_password_f" value="" />
			<br /><br />
		</article>
		</fieldset>
			<input type="submit" name="btn_accept" value="Aceptar" /> 
		</form>
	</section>
	</center>    
	</div>
	<?php
		$obj = new general($mysqli);
		echo $obj->footer("./");
	?>
</body>
</html>