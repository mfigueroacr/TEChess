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
		<link href="CSS/site.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="Javascript/site.js"></script>
	</head>
	<body>
		<div>
			<?php 
			include ("session.inc");
			login_header();			   
			?>
			<header>
				<h1>TeChess Training Suite</h1>
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
					&copy; Copyright  by 
				</p>
			</footer>
		</div>
		
		<div id="login">
     <div>
     	<a href="#" onclick="login()"/>cerrar</a>
	<h1>TeChess Training Suite</h1>
<p>comentario temporal: El user es admin y el password es 1234</p>
        <form  action="login.php" method="POST">
        <fieldset > <legend> Ingreso </legend>
<label>Nombre de Usuario:</label><input type="text" id="user" name="user" />
<br />
<br />

<label>Contraseña:</label><input type="password"  id="pass" name="pass"/>
<br />
</fieldset>

<br />

<input type="submit" name="button" id="button" value="Enviar" />

</td>

    </form>
     </div>
	</div>

		
	</body>
</html>