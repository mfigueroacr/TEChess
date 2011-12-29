<?php
   include("../tools/base.php");
   include ("../tools/hashit.php");
   include ("../session.inc");
   
	function new_user(){
	//Realizamos la consulta a la base de datos y controlamos que nos devuelva
    //algun resultado
    if (isset ($_POST['txt_name']) && isset ($_POST['txt_lastname']) && isset($_POST['txt_username']) && isset($_POST['txt_password']) ){
	    //Creamos variables locales con el contenido de las devueltas por el form
	    $name = $_POST['txt_name'];
		$lastname = $_POST['txt_lastname'];
	    $username = $_POST['txt_username'];
	    $password = $_POST['txt_password'];
		$result = false;
		$result =  create_user($name, $lastname, $username, $password, 'jugador');
		  if($result == true) {
		  }
		  else {
		  }
	  }
	  else{
  	
  	  }
	}
?>