<?php
class user{
	public $_link ;
	
	public function __construct (mysqli $link) {
		#$this->$link = $link ;
		$this->_link = $link;
	}
public function create_user( $name, $last_name, $username, $password, $email, $profile){
$result = c_mysqli_call($this->_link, "Create_User", "'$name', '$last_name' ,'$username' , '$password', '$email' ,'$profile'");
$completed = false;
foreach($result as $_row) {   	
    	    $completed = $_row['created'];
			}

return $completed;
}

public function delete_user($username){
		
$result = c_mysqli_call($this->_link, "Delete_User", "'$username'");
$completed = false;
foreach($result as $_row) {   	
    	    $completed = $_row['deleted'];
			}

return $completed;
}

public function modify_user( $name, $last_name, $username, $email, $profile){
$result = c_mysqli_call($this->_link, "Update_User", "'$name', '$last_name' ,'$username', '$email', '$profile' ");
$completed = false;
foreach($result as $_row) {   	
   // 	    $completed = $_row['created'];
			}

return $completed;
}

public function view_users(){
$result = c_mysqli_call($this->_link, "Get_Users", "");
		/*if($result) {
		    foreach($result as $_row) {
    	    	echo $_row['name'] . $_row['lastname'] .$_row['username'];
			}
		}*/
return $result;
}


public function search_user($username){
$result = c_mysqli_call($this->_link, "Users_Search", "'$username'");
		/*if($result) {
		    foreach($result as $_row) {
    	    	echo $_row['name'] . $_row['lastname'] .$_row['username'];
			}
		}*/
return $result;
}

public function check_password ($username, $password){
$result = c_mysqli_call($this->_link, "Check_Password", "'$username' , '$password'");
	return $result;
}

public function update_password($username, $password){
$result = c_mysqli_call($this->_link, "Update_Password", "'$username' , '$password'");
	return $result;
}

public function test_create ($user, $password){
print "Creating user... ";
$creacion = $this->create_user ($user,'lastname', $user, $password, "email","jugador");
if ($creacion == true) {
    print " created\n";
}
else{
	 print " failed\n";
}
echo "</br>";
}

public function test_check($user, $password)
{
print "Checking login ... ";
$chk_pass = false;
$chk_pass = $this->check_password($user, $password);
if ($chk_pass == true) {
    echo "checked";
    }
if ($chk_pass == false) {
echo "failed";
}
echo "</br>";	
}

public function test_delete($user)
{
print "Deleting user... ";
$eliminacion = false;
$eliminacion = $this->delete_user($user);
if ($eliminacion == true) {
    print " Deleted\n";
}
if ($eliminacion == false){ 
	print " failed\n";
}
echo "</br>";	
}
}
?>