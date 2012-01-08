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
 		echo $obj->close_header();
 		$obj->menu();
		
?>
	<div id="contenido">
		<header >
        	<hgroup >
            	<h1 align="center">TeChess ingresar un nuevo usuario</h1> 
        	</hgroup>
    	</header>
    	<center>
    		<section>
    		<form action="user.php" method="post">
	    		<input type="hidden" name="new_user">
	    			<article >
				    	Ingrese el nombre  
				    	<input type="text" name="txt_name" value="" />
				    	<br /><br />
				    	Ingrese el apellido 
				    	<input type="text" name="txt_lastname" value="" />
				    	<br /><br />
				    	Ingrese el nombre de usuario 
				    	<input type="text" name="txt_username" value="" />
				    	<br /><br />
				    	Ingrese la contraseña 
				    	<input type="password" name="txt_password" value="" />			    	
	    			</article>
				<br /><br />		
				Seleccione el tipo de usuario:		
				<br /><br />		
				<select name="select" align="center">
				<?php
					$obj = new general ($mysqli);
					$obj->list_profiles();
				?>			
				</select>
				<br /> <br />	
				</fieldset>
				<input type="submit" name="btn_accept" value="Aceptar" /> 
			</form>
			</section>	 
		</center> 
	</div>
	<?php
		$obj = new general($mysqli);
		echo $obj->footer();
	?>
</body>
</html>