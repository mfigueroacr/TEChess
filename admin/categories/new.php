<?php   
/*
 * /Categories/new.php
 * Formulario donde se permite agregar una nueva
 * categoría al sistema. 
 */

	include ("../../session.inc");
	include ("../../tools/category.php");
	include ("../../tools/mysqli_call.php");
	include ("../../tools/general.php");
?>
<!DOCTYPE html >
<html>
	
<head>
	
	<meta charset="utf-8" />
	<title>TeChess Nueva Categoría</title>
    <link href="css/html5reset.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
<!--    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/css.css" rel="stylesheet" type="text/css" /> -->

</head>
<body>
	<header >
        <hgroup >
            <h1 align="center">TeChess ingresar una nueva categoría</h1> 
        </hgroup>

    </header>
    <center>
    <section>
    	<form action="category.php" method="post">
    	<input type="hidden" name="new_cat">
    	<article >
    	Ingrese el nombre de la categoría
    	<input type="text" name="txt_name" value="" />
    	<br /><br />
    	Ingrese una breve descripción
    	<input type="text" name="txt_description" value="" />
    	
    	</article>
    	<br /> <br />
		<input type="submit" name="btn_accept" value="Aceptar" />
	
	</form>
	</section>
	 
</center>    
</body>
</html>
