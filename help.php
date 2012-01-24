<?php
include ('session.inc');
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
	 <link type="text/css" href="CSS/site.css" rel="stylesheet" />
	  <link type="text/css" href="CSS/menu.css" rel="stylesheet" />
    
    <!-- Javascript -->
      <script type="text/javascript" src="Javascript/jquery.js"></script>
      <script type="text/javascript" src="Javascript/menu.js"></script>
      <script type="text/javascript" src="Javascript/site.js"></script>
</head>
<body>
<?php
$obj = new general($mysqli);
echo $obj->login_header();
$obj->menu();
?>
<br />
<div id="contenido">
<div id="texto">
<h1>Ayuda</h1>
<br />
<article>
El presente sistema fue desarrollado y probado bajo los navegadores <a href="http://www.google.es/chrome" target="_blank">Google Chrome </a> y 
<a href="http://www.mozilla.org/es-MX/firefox/new/" target="_blank">Firefox</a>, por lo cual se recomienta 
el uso de estos para un mejor desempeño. 
Además debe tener instalado el software de <a href="http://java.com/es/download/" target="_blank">JAVA</a> para poder utilizar las secciones 

de entrenamiento.
<br /> <br />
Para poder tener acceso a usarlo debe estar registrado como usuario. Si usted tiene algún problema para acceder al sistema puede
escribir a la dirección
<a href="mailto:techess.itcr@gmail.com">techess.itcr@gmail.com</a>
<br /> <br />
<h2>Aviso Legal</h2>
<br /> 
Aviso Legal

Techess está protegido bajo la licencia <a href="http://creativecommons.org/licenses/by-nc-sa/3.0/" target="_blank">Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a>.
<br />
El código del proyecto está respaldado en los repositorios <a href="https://github.com/mfigueroacr/TEChess" target="_blank">github.com</a> y <a href="http://code.google.com/p/techess/" target="_blank">code.google.com</a>.
<br /> 
Para las licencias de <a href="http://jquery.org/license/" target="_blank">jquery.org</a>, <a href="http://apycom.com/" target="_blank">apycom.com</a> 
y <a href="http://www.oracle.com/us/legal/terms/index.html" target="_blank">oracle.com</a>, diríjase a los vínculos respectivos., se reservan los 
derechos a cada uno de los autores.
<br />
© 2012 GitHub Inc. All rights reserved
<br />
Apache and the Apache feather logo are trademarks of The Apache Software Foundation.
<br /> 
Java®  Netbeans®  and MySQL is a registered trademark of Oracle and/or its affiliates.

</article>
</div>
</div>

<?php
$obj = new general($mysqli);
echo $obj->footer();
?>

</body>
</html>