
<!DOCTYPE html >
<html>
	
<head>
	
	<meta charset="utf-8" />
	<title>TeChess Nuevo Usuario</title>
    <link href="css/html5reset.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
<!--    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/css.css" rel="stylesheet" type="text/css" /> -->

</head>
<body>
	<header >
        <hgroup >
            <h1 align="center">TeChess ingresar un nuevo usuario</h1> 
        </hgroup>

    </header>
    <center>
    <section>
    	<form action="user.php" method="post">
    	
    	<article >
    	Ingrese el nombre  
    	<input type="text" name="txt_name" value=" " />
    	<br /><br />
    	Ingrese el apellido 
    	<input type="text" name="txt_lastname" value=" " />
    	<br /><br />
    	Ingrese el nombre de usuario 
    	<input type="text" name="txt_username" value=" " />
    	<br /><br />
    	Ingrese la contraseña 
    	<input type="text" name="txt_password" value=" " />
    	
    	</article>
	  	
		<br /><br />		
		Seleccione el tipo de usuario:		
		<br /><br />
		
		<select name="select" align="center">
			<option>Administrador</option>
			<option>Jugador</option>
		</select>
		
		<br /> <br />
		
		</fieldset>
		<input type="submit" name="btn_accept" value="Aceptar" />
	
	</form>
	</section>
	 
</center>    
</body>
</html>
