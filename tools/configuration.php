<?php

class configuration{
 	public $_link ;
	
	public function __construct (mysqli $link) {
		#$this->$link = $link ;
		$this->_link = $link;
	}
	
	public function header(){
			printf("<h1> Pruebas y Configuraci&oacute;n</h1>");
		printf("Informaci&oacute;n del host: %s\n", $this->_link->host_info);
		echo "</br>";
	}
	
	public function init_db(){
		printf("<h1> Configuraci&oacute;n</h1>");
		
		print "Cargando informaci&oacute m&iacute;nima en la Base de Datos... ";
		$result = c_mysqli_call($this->_link, "Init", "");
		
		if ($result == true) {
		    print " Cargado\n";
		}
		if ($result == false){ 
			print " fallo\n";
		}
		echo "</br>";
		
		return $result;
	}
	
	public function test_db(){
		$user = "player";
		$password = "qwerty";
		printf("<h1> Prueba</h1>");
		$obj1 = new user($this->_link);
		$obj1->test_create($user, $password);
		$obj1->test_check($user, $password);
		$obj1->test_delete($user);
	}
	
}
?>