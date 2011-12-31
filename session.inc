<?php
    ini_set('session.use_cookies', 1);
    ini_set('session.use_only_cookies', 1);
    session_start();

function check_login($root="") {
    if (!isset ($_SESSION['user']) || !$_SESSION['user']) {
    /* Si la cookie no esta definida se redirige a la pagina login */
    echo "not logged";
    //header('Location: signin.php');
	}
	else echo "logged";
/*	if (isset ($_SESSION['user'])){
		if ($root == ""){
		}
		else{
			$user = $_SESSION['user'];
		    $sqlquery = "CALL check_permission('$user', '$root');";
		    $result = mysql_query ($sqlquery);
		    if (mysql_result($result,0)== false){
		    	header('Location: /');
		   	}
		}
	}
	*/
}

function login_header(){
		 if (!isset ($_SESSION['user']) || !$_SESSION['user'])
		 echo "<a href='#' onclick='login()'>Ingresar</a></span>";
     	 else
		 	echo "<a href='logout.php'>Logout</a></span>";
}

?>
