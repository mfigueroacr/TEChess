<?php
/*
 * /tools/category.php
 * Clase que contiene los métodos que permiten 
 * acceder a la base de datos.
 */

	//include ("../../tools/mysqli_call.php");
class category{
	public $_link ;
	
	public function __construct (mysqli $link) {
		#$this->$link = $link ;
		$this->_link = $link;
	}
	
public function create_level($name, $description){
	// $html = "";
$result = c_mysqli_call($this->_link, "Create_Level", "'$name','$description'");
return $result;
}
}
?>