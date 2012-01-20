<?php
class user{
	public $_link ;
	
	public function __construct (mysqli $link) {
		#$this->$link = $link ;
		$this->_link = $link;
	}

 public function top_user($username){
$result = c_mysqli_call($this->_link, "top10_excercises_user", "'$username'");
return $result;
}
 
 public function bottom_user($username){
$result = c_mysqli_call($this->_link, "bottom10_excercises_user", "'$username'");
return $result;
}
 
  public function bottom_team(){
$result = c_mysqli_call($this->_link, "bottom10_excercises_team", "");
return $result;
}
  
    public function top_team(){
$result = c_mysqli_call($this->_link, "top10_excercises_team", "");
return $result;
}
	
	  public function login_user($username){
$result = c_mysqli_call($this->_link, "dates_login_user", "'$username'");
return $result;
}
 
}
?>