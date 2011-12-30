<?php
   include("../../tools/base.php");
   include ("../../tools/hashit.php");
   include ("../../session.inc");
         
   if (isset ($_POST['btn_accept']) || isset ($_POST['btn_delete']) ){
	   if ($_POST['btn_accept']){
	   		new_user();
	   }
	   else if ($_POST['btn_delete']) {
	   		echo "Usuario eliminado";
	   }
   }
   
   
	function new_user(){
		$user = new user($mysqli);
	//Realizamos la consulta a la base de datos y controlamos que nos devuelva
    //algun resultado
    if (isset ($_POST['txt_name']) && isset ($_POST['txt_lastname']) && isset($_POST['txt_username']) && isset($_POST['txt_password']) ){
	    //Creamos variables locales con el contenido de las devueltas por el form
	    $name = $_POST['txt_name'];
		$lastname = $_POST['txt_lastname'];
	    $username = $_POST['txt_username'];
	    $password = $_POST['txt_password'];
		$result = false;
		$result =  $user->create_user($name, $lastname, $username, $password, 'jugador');
		  if($result == true) {
		  	header('Location: /');
		  }
		  else {
		  	header('Location: index.php');
		  }
	  } 
	  else{
		  	header('Location: index.php');
  	  }
	}
	
	function leoprint(){
		 if (isset ($_POST['txt_name']) && isset ($_POST['txt_lastname']) && isset($_POST['txt_username']) && isset($_POST['txt_password']) ){
			$name = $_POST['txt_name'];			
			$lastname = $_POST['txt_lastname'];
		    $username = $_POST['txt_username'];
		    $password = $_POST['txt_password'];
			echo "leoprint";
			echo $name;
			echo $lastname;
			echo $username;
			echo $password;
		 }
	}
	
	
?>