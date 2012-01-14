<?php

include ("./session.inc");
   include ("./tools/user.php");
check_login($mysqli);

if (isset ($_POST('password'))){
	$newpass = $_POST('password');
	$username = $_SESSION['user'];
	$user = new user($mysqli);
	$return = false;
	$return = $user->update_password($username, $newpass);
	if ($return){
		// se cambio bien
	}
	else{
		//sonamos con el cambio
	}
}
else {
	//no puede dejar todo esto en blanco
}
?>