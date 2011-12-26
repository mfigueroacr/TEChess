<?php
define('SALT_LENGTH', 15);
function HashMe($phrase, &$salt = null)
{
$key = '!@#$%^&*()_+=-{}][;";/?<>.,';
    if ($salt == '')
    {
        $salt = substr(hash('sha512',uniqid(rand(), true).$key.microtime()), 0, SALT_LENGTH);
    }
    else
    {
        $salt = substr($salt, 0, SALT_LENGTH);
    }
    return hash('sha512',$salt . $key .  $phrase);
}


function create_user($username, $password, $name, $last_name){
$exist = false;
$username = $username;
$password = $password;
$salt = '';
$hashed_password = HashMe($password, $salt);
$sqlquery = "INSERT INTO  `users` (`id_user`, `nombre`, `apellidos`, `username`, `password`, `salt`, `date`) VALUES  (NULL, '$name', '$last_name' ,'$username' , '$hashed_password' ,'$salt', '2011-06-17');";
$result = mysql_query ($sqlquery);
$num_rows = mysql_num_rows($result);
    if ($num_rows == 1) {
        $exist = true;
    }
return $exist;
}

function delete_user($username, $password){
$success = false;
$username = $username;
$password = $password;
$available = check_password($username,$password);
$sqlquery = "DELETE FROM  `users`  WHERE `username`='" .$username . "';";
if ($available == true){
	
	$result = mysql_query ($sqlquery);
	$num_rows = mysql_affected_rows($result);
    if ($num_rows != -1) {
        $success = true;
    }
}
return $success;
}


function update_password($username, $password){
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

function check_password ($username, $password){
$check_it = false;
$username = $username;
$password = $password;
$sqlquery = "SELECT * FROM `users`  WHERE `username`=" . $username ." LIMIT 1";
$result = mysql_query ($sqlquery);
while($row = mysql_fetch_array( $result )) {
$salt = $row['salt'];
$hashed_password = HashMe($password, $salt);
$password = $row['password'];
}
if ($password == $hashed_password){
$check_it = true;
}
return $check_it . $sqlquery ;
}


?>
