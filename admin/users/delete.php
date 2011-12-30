<!DOCTYPE html >
<html>
	
<head>
	
	<meta charset="utf-8" />

	<title>TeChess Eliminar Usuario</title>

    <link href="css/html5reset.css" rel="stylesheet" />

    <link href="css/style.css" rel="stylesheet" />

<!--    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <link href="css/css.css" rel="stylesheet" type="text/css" /> -->

</head>
<body>
	
	<header >

        <hgroup >

            <h1 align="center">TeChess eliminar un usuario</h1> 

        </hgroup>

    </header>
    
    <center>
    <section>
    	<form action="user.php" method="post">
    	
    	<article >
    	Ingrese el nombre de usuario a eliminar 
    	<input type="text" id="txt_name" value="" />
    	<br /><br />
    	<input type="submit" id="btn_search" value="Buscar" />
    	
    	    	
    	<br /><br />
    	Nombre:
    	<label id="lbl_name" style=" font-weight: bold"> leo</label>
    	<br /><br />
    	Apellido:
    	<label id="lbl_lastname" style=" font-weight: bold"> murillo</label>
    	<br /><br />
    	Nombre de Usuario: 
    	<label id="lbl_username" style=" font-weight: bold"> leoneljmr</label>
    	<br /><br />
    	
    	</article>

		<input type="submit" name="btn_delete" value="Eliminar" />
	
		</form>
	</section>
	 
	</center>    
</body>
</html>