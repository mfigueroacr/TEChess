<?php
    include ("tools/mysqli_call.php");
    include ("tools/general.php");
    ini_set('session.use_cookies', 1);
    ini_set('session.use_only_cookies', 1);
    session_start();

function check_login($mysqli, $root="") {
    if (!isset ($_SESSION['user']) || !$_SESSION['user']) {
    /* Si la cookie no esta definida se redirige a la pagina login */
    header('Location: ./');
	}
	if (isset ($_SESSION['user'])){
		if ($root == ""){
		}
		else{
			$user = $_SESSION['user'];
			echo $user ;
			$obj = new general($mysqli);
			$obj->check_permission($user, $root);			
		   	}
	}
}

function login_header(){
	$user;
		 if (!isset ($_SESSION['user']) || !$_SESSION['user'])
		 echo "<a href='#' onclick='login()'>Ingresar</a></span>";
     	 else{
     	 	$user = $_SESSION['user'];
		 	echo "<a href='logout.php'>Logout       logged as '$user' </a></span>";
		 }
}

?>
