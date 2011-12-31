<?php   
include ("../../session.inc");
include ("../../tools/mysqli_call.php");
include ("../../tools/general.php");
check_login();
?>
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
    	<input type="hidden" name="delete_user"/>
    	Ingrese el nombre de usuario a eliminar 
    	<input type="text" name="txt_name" value="" />
    	<br /><br />
		<input type="submit" name="btn_delete" value="Eliminar" />
		</form>
	</section>
	 
	</center>    
</body>
</html>