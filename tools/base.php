<?php
require ("settings.php");
		$mysqli = new mysqli(SERVER, USER, PASSWORD, DB);	
/* check connection */ 
		if (mysqli_connect_errno()) {
    	printf("Connect failed: %s\n", mysqli_connect_error());
		//header('Location: errordb.html');
    	exit();
}
//printf("Host information: %s\n", $mysqli->host_info);
?>
