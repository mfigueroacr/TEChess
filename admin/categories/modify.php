<?php   
include ("../../session.inc");
include ("../../tools/category.php");
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
        		<br /><br />
            	<h1 align="center">TeChess modificar el nombre de una categor&iacute;a</h1>
            	<br /><br /> 
        	</hgroup>
    	</header>
		<center>
		<section>
		<form action="category.php" method="post">
		Seleccione la categoría a modificar:		
		<br /><br />		
			<select name="select" align="center">
				<?php
				
					$obj = new category ($mysqli);
					$obj->list_categories();
				?>			
			</select>
		<br /> <br />
		Ingrese el nuevo nombre de la categoría:
		<br /> <br />
		<input type="text" name="txt_CategoryModify" value="" />
    	<br /><br />
    	<input type="hidden" name="cat_modify"/>
    	<input type="submit" name="btn_modify" value="Modificar" />
    	
		</form>
		</section>
		</center>
	</div>
	<?php
		$obj = new general($mysqli);
		echo $obj->footer("../../");
	?>
</body>
</html>