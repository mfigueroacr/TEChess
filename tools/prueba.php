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

$user = "admin";
$password = "1234";
/*
 $salt = '';
print "creaci&oacute;n de usuario administrador ... ";

$creacion = create_user ('admin','super', $user, $password);
if ($creacion == true) {
    print " creado\n";
	echo "</br>";
}
*/
print "revisando login ... ";
$chk_pass = false;
$chk_pass = check_password($user, $password);
if ($chk_pass == true) {
    echo "probado";
    }
else{
echo "fallo";
}
echo "</br>";
?>

</body>
</html>
