<?php
   include ("../../session.inc");
   include ("../../tools/user.php");
check_login($mysqli, "Administrador");

	function new_user($mysqli){
		$user = new user($mysqli);
	//Realizamos la consulta a la base de datos y controlamos que nos devuelva
    //algun resultado
    if (isset ($_POST['txt_name']) && isset ($_POST['txt_lastname']) && isset($_POST['txt_username']) && isset($_POST['txt_password']) ){
	    //Creamos variables locales con el contenido de las devueltas por el form
	    $name = $_POST['txt_name'];
		$lastname = $_POST['txt_lastname'];
	    $username = $_POST['txt_username'];
	    $password = $_POST['txt_password'];
		$seleccion = $_POST['select'];
		$result = false;
		$result =  $user->create_user($name, $lastname, $username, $password, $seleccion);
		
		  if($result == true) {
		  	echo "creado";//header('Location: ../index.php');
		  }
		  else {
		  	echo "no creado";//header('Location: index.php');
		  }
	  } 
	  else{
		  	echo "faltaron datos";//header('Location: index.php');
  	  }
	}
	
	function leoprint(){
		 if (isset ($_POST['txt_name']) && isset ($_POST['txt_lastname']) && isset($_POST['txt_username']) && isset($_POST['txt_password']) ){
			$name = $_POST['txt_name'];			
			$lastname = $_POST['txt_lastname'];
		    $username = $_POST['txt_username'];
		    $password = $_POST['txt_password'];
			$seleccion = $_POST['select'];
			echo "leoprint";
			echo $name;
			echo $lastname;
			echo $username;
			echo $password;
			echo $seleccion;
		 }
	}
	
	function delete_user($mysqli){
		$user = new user($mysqli);
		if (isset ($_POST['txt_name'])){
		$username = $_POST['txt_name'];
		$result = false;
		$result =  $user->delete_user($username);
		echo $username;
		  if($result == true) {
		  	header('Location: ../index.php');
		  }
		  else {
		  	header('Location: delete.php');
		  }
	  } 
	  else{
		  	header('Location: delete.php');
  	  }
	}	
	print_r ($_POST);
if (isset ($_POST['new_user'])) new_user($mysqli);
//if (isset ($_POST['new_user'])) leoprint();
if (isset ($_POST['delete_user'])) delete_user($mysqli);
	
?>