<?php
#require ("settings.php");

class user{
	public $_link ;
	
	public function __construct (mysqli $link) {
		#$this->$link = $link;
		$this->_link = $link;
	}
public function create_user( $name, $last_name, $username, $password, $profile){

$sqlquery = "CALL Create_User('$name', '$last_name' ,'$username' , '$password' ,'$profile');";
if (!($result = $this->_link->query ($sqlquery)))
 echo "CALL failed: (" . $mysqli_errno . ") " . $mysqli->error;
return $result;
}

public function delete_user($username){	
$username = $username;
$sqlquery = "CALL Delete_User('$username');";
if (!($result = $this->_link->query($sqlquery)))
 echo "CALL failed: (" . $mysqli_errno . ") " . $this->_link->error;
return $result;
}


public function update_password($username, $password){
$success = false;
$username = $username;
$password = $password;
$salt = '';
$hashed_password = HashMe($password, $salt);
$sqlquery = "UPDATE `users` SET password='$hashed_password', salt='$salt' WHERE username='$username'";
$result = mysql_query ($sqlquery);
$num_rows = mysql_affected_rows($result);
    if ($num_rows != -1) {
        $success = true;
    }
return $success;
}

public function check_password ($username, $password){

	$username = $username;
	$password = $password;
	$sqlquery = "CALL check_password('$username', '$password');";
if (!($result = $this->_link->query ($sqlquery)))
 echo "CALL failed: (" . $mysqli_errno . ") " . $this->_link->error;
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

public function test_check($user, $password)
{
print "revisando login ... ";
$chk_pass = false;
$chk_pass = $this->check_password($user, $password);
if ($chk_pass == true) {
    echo "probado";
    }
if ($chk_pass == false) {
echo "fallo";
}
echo "</br>";	
}

public function test_delete($user)
{
print "Eliminaci&oacute;n de usuario... ";
$eliminacion = false;
$eliminacion = $this->delete_user($user);
if ($eliminacion == true) {
    print " eliminado\n";
}
if ($eliminacion == false){ 
	print " fallo\n";
}
echo "</br>";	
}
}
?>