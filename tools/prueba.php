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
printf("<h1> Test and Configuration</h1>");
echo "</br>";
printf("Host information: %s\n", $mysqli->host_info);
echo "</br>";

$obj1 = new user($mysqli);

$obj1->test_create($user, $password);
$obj1->test_check($user, $password);
$obj1->test_delete($user);
?>

</body>
</html>
