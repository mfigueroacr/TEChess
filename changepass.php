<?php

include ("./session.inc");
include ("./tools/user.php");
check_login($mysqli);

if (isset ($_POST['password'])){

	$newpass = $_POST['password'];
	$username = $_SESSION['user'];
	$user = new user($mysqli);
	$return = false;
	$return = $user->update_password($username, $newpass);
	if ($return){
		header("location: change_password.php?result=true");
	}
	else{
		header("location: change_password.php?result=error");
	}
}
?>