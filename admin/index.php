<<<<<<< HEAD:admin/index.php
<?php
include ("session.inc");
check_login("administrador");
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
	</head>
	<body>
		<div>
			<header>
				<h1>index</h1>
			</header>
			<nav>
				<p>
					<a href="/">Home</a>
				</p>
				<p>
					<a href="/contact">Contact</a>
				</p>
			</nav>
			<div></div>
			<footer>
				<p>
					&copy; Copyright  by Kelvin
				</p>
			</footer>
		</div>
	</body>
=======
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
    	<form action="new_user.php" method="post">
    	
    	<article >
    	Ingrese el nombre  
    	<input type="text" id="txt_name" value="" />
    	<br /><br />
    	Ingrese el apellido 
    	<input type="text" id="txt_lastname" value="" />
    	<br /><br />
    	Ingrese el nombre de usuario 
    	<input type="text" id="txt_username" value="" />
    	<br /><br />
    	Ingrese la contraseña 
    	<input type="text" id="txt_password" value="" />
    	
    	</article>
	  	
		
		<br /><br />		
		Seleccione el tipo de usuario:		
		<br /><br />
		
		<select name="select" align="center">
			<option>Alpha</option>
			<option>Beta</option>
			<option>Delta</option>
		</select>
		
		<br /> <br />
		
		</fieldset>
		<input type="submit" id="btn_accept" value="Aceptar" />
	
	</form>
 	<label id="leo"> dfa</label>
	</section>
	 
</center>    
</body>
>>>>>>> 29d573fea101582bc3f50d53f35e435e672423ad:admin/index.html
</html>
