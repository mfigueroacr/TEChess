<?php
    ini_set('session.use_cookies', 1);
    ini_set('session.use_only_cookies', 1);
    session_start();

function check_login($root) {
    if (!isset ($_SESSION['user']) || !$_SESSION['user']) {
    /* Si la cookie no esta definida se redirige a la pagina login */
    header('Location: signin.php');
	}
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

?>
