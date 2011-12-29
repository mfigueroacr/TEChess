<?php
include ("hashit.php");
include ("base.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pruebas y configuraciones</title>
</head>

<body>
<?php
$user = "player";
$password = "qwerty";

$mysqli = new mysqli(SERVER, USER, PASSWORD, DB);	

/* check connection */ 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
	header('Location: errordb.html');
    exit();
}
printf("Host information: %s\n", $mysqli->host_info);


class nuevo{
	public $_link;
	
	public function __construct (mysqli $link) {
		#$this->_link = new mysqli();
		$this->_link = $link;
	}
public function create_user( $name, $last_name, $username, $password, $profile){

$sqlquery = "CALL Create_User('$name', '$last_name' ,'$username' , '$password' ,'$profile');";
if (!($result = $this->_link->query ($sqlquery)))
 echo "CALL failed: (" . $mysqli_errno . ") " . $mysqli->error;
return $result;
}

public function test_create ($user, $password){
print "creaci&oacute;n de usuario... ";
$creacion = $this->create_user ($user,'lastname', $user, $password,"jugador");
if ($creacion == true) {
    print " creado\n";

}
else{
	 print " fallo\n";
}
echo "</br>";
}
}

//$obj1 = new nuevo($mysqli);

$obj1 = new user($mysqli);

$obj1->test_create($user, $password);
$obj1->test_check($user, $password);
$obj1->test_delete($user);
?>

</body>
</html>
