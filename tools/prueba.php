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

print "creaci&oacute;n de usuario... ";

$creacion = create_user ($user,'lastname', $user, $password,"jugador");
if ($creacion == true) {
    print " creado\n";

}
else{
	 print " fallo\n";
}
echo "</br>";

print "revisando login ... ";
$chk_pass = false;
$chk_pass = check_password($user, $password);
if ($chk_pass == true) {
    echo "probado";
    }
if ($chk_pass == false) {
echo "fallo";
}
echo "</br>";

print "Eliminaci&oacute;n de usuario... ";
$eliminacion = false;
$eliminacion = delete_user($user);
if ($eliminacion == true) {
    print " eliminado\n";
}
if ($eliminacion == false){ 
	print " fallo\n";
}
echo "</br>";
?>

</body>
</html>
