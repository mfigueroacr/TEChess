<?php
include("user.php");
?>
<!DOCTYPE html >
<html>
	
<head>
	
	<meta charset="utf-8" />

	<title>TeChess Modificar Usuario</title>

    <link href="css/html5reset.css" rel="stylesheet" />

    <link href="css/style.css" rel="stylesheet" />

<!--    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <link href="css/css.css" rel="stylesheet" type="text/css" /> -->

</head>
<body>
	
	<header >

        <hgroup >

            <h1 align="center">TeChess modificar un usuario</h1> 

        </hgroup>

    </header>
    
    <center>
    <section>
    	<form action="user.php" method="post">
    	
    	<article >
    	Ingrese el nombre de usuario a modificar 
    	<input type="text" id="txt_SearchUsername" value="" />
    	<br /><br />
    	<input type="submit" id="btn_search" value="Buscar" />
    	
    	    	
    	<br /><br />
    	Nombre:
    	<input type="text" id="txt_name" value="Leonel" />
    	<br /><br />
    	Apellido:
    	<input type="text" id="txt_lastname" value="Murillo" />
    	<br /><br />
    	Nombre de Usuario: 
    	<input type="text" id="txt_username" value="leoneljmr" />
    	<br /><br />
    	
    	</article>

		<input type="submit" id="btn_delete" value="Eliminar" />
	
		</form>
	</section>
	 
	</center>    
</body>
</html>