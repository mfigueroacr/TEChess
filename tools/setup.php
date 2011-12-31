<?php
include ("user.php");
include ("mysqli_call.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pruebas y configuraciones</title>
</head>

<body>
<?php
function init(mysqli $mysqli)
{
print "Loading minimum data into DB... ";
	$result = c_mysqli_call($mysqli, "Init", "");
if ($result == true) {
    print " Loaded\n";
}
if ($result == false){ 
	print " failed\n";
}
echo "</br>";	
}

$user = "player";
$password = "qwerty";

printf("<h1> Test and Configuration</h1>");
printf("Host information: %s\n", $mysqli->host_info);
echo "</br>";
printf("<h1> Configuration</h1>");
init($mysqli);
printf("<h1> Test</h1>");
$obj1 = new user($mysqli);
$obj1->test_create($user, $password);
$obj1->test_check($user, $password);
$obj1->test_delete($user);
?>

</body>
</html>
