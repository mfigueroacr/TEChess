<?php
function create_user( $name, $last_name, $username, $password, $profile){
$sqlquery = "CALL Create_User('$name', '$last_name' ,'$username' , '$password' ,'$profile');";
$result = mysql_query ($sqlquery);
return $result;
}

function delete_user($username){
$sqlquery = "CALL Delete_User('$username');";
$result = mysql_query ($sqlquery);
print "deleting user....";
return $result;
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
	$sqlquery = "CALL check_password('$username', '$password');";
	$result = mysql_query ($sqlquery);
	return mysql_result($result,0);
}
?>