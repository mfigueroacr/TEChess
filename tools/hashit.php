<?php
#require ("settings.php");

class user{
	public $_link ;
	
	public function __construct (mysqli $link) {
		#$this->$link = $link ;
		$this->_link = $link;
	}
public function create_user( $name, $last_name, $username, $password, $profile){

$result = $this->c_mysqli_call($this->_link, "Create_User", "'$name', '$last_name' ,'$username' , '$password' ,'$profile'");
return $result;
}

public function create_level($name, $descripcion){

$result = $this->c_mysqli_call($this->_link, "Create_Level", "'$name', '$descripcion'");
return $result;
}

public function delete_user($username){	
$result = $this->c_mysqli_call($this->_link, "Delete_User", "'$username'");
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
$result = $this->c_mysqli_call($this->_link, "Check_Password", "'$username' , '$password'");
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


public function init()
{
print "Inicializacion de base de datos... ";
	$result = $this->c_mysqli_call($this->_link, "Init", "");
if ($result == true) {
    print " inicilizado\n";
}
if ($result == false){ 
	print " fallo\n";
}
echo "</br>";	
}


/**
 * Calls a Stored Procedure and returns the results as an array of rows.
 * @param mysqli $dbLink An open mysqli object.
 * @param string $procName The name of the procedure to call.
 * @param string $params The parameter string to be used
 * @return array An array of rows returned by the call.
 */

public function c_mysqli_call(mysqli $dbLink, $procName, $params="")
{
    if(!$dbLink) {
        throw new Exception("The MySQLi connection is invalid.");
    }
    else
    {
        // Execute the SQL command.
        // The multy_query method is used here to get the buffered results,
        // so they can be freeded later to avoid the out of sync error.
        $sql = "CALL {$procName}({$params});";
        $sqlSuccess = $dbLink->multi_query($sql);

        if($sqlSuccess)
        {
            if($dbLink->more_results())
            {
                // Get the first buffered result set, the one with our data.
                $result = $dbLink->use_result();
                $output = array();

                // Put the rows into the outpu array
                while($row = $result->fetch_assoc())
                {
                    $output[] = $row;
                }

                // Free the first result set.
                // If you forget this one, you will get the "out of sync" error.
                $result->free();

                // Go through each remaining buffered result and free them as well.
                // This removes all extra result sets returned, clearing the way
                // for the next SQL command.
                while($dbLink->more_results() && $dbLink->next_result())
                {
                    $extraResult = $dbLink->use_result();
                    if($extraResult instanceof mysqli_result){
                        $extraResult->free();
                    }
                }

                return $output;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;//throw new Exception("The call failed: " . $dbLink->error);
        }
    }
}

}
?>