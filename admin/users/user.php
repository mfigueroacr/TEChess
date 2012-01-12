<?php
   include ("../../session.inc");
   include ("../../tools/user.php");
check_login($mysqli, "Administrador");

	function new_user($mysqli){
		$user = new user($mysqli);
	//Realizamos la consulta a la base de datos y controlamos que nos devuelva
    //algun resultado
    if (isset ($_POST['txt_name']) && isset ($_POST['txt_lastname']) && isset($_POST['txt_username']) && isset($_POST['password']) ){
	    //Creamos variables locales con el contenido de las devueltas por el form
	    $name = $_POST['txt_name'];
		$lastname = $_POST['txt_lastname'];
	    $username = $_POST['txt_username'];
	    $password = $_POST['password'];
		$email = $_POST['txt_email'];
		$seleccion = $_POST['select'];
		$result = false;
		$result =  $user->create_user($name, $lastname, $username, $password, $email, $seleccion);
		
		  if($result == true) {
			header('Location:./new.php?result=ok');
		  }
		  else {
			header('Location:./new.php?result=exitence_user');
		  }
	  } 
	  else{
			header('Location:./new.php?result=miss_data');
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
			header('Location:./delete.php?result=ok');
		  }
		  else {
			header('Location:./delete.php?result=exitence_user');
		  }
	  } 
	  else{
			header('Location:./delete.php?result=miss_data');
  	  }
	}
		
	function search_user($mysqli){
		$user = new user($mysqli);
		if (isset ($_POST['txt_SearchUsername'])){
			$username = $_POST['txt_SearchUsername'];
			$result = false;
			$result = $user->search_user($username);
		}
		return $result;
	}
	
	function check_user($mysqli){
		$user = new user($mysqli);
		if (isset ($_POST['txt_SearchUsername'])){
			$username = $_POST['txt_SearchUsername'];
			$result = false;
			$result = $user->search_user($username);
			if ($result){
				foreach($result as $_row) {
					header('Location:./modify.php?usuario='. $_row['username']);
				}
			}
			else {
				header('Location:./search.php?data=nothing');
			}
		}
	}
	
	function modify_user($mysqli){
		$user = new user($mysqli);
		if (isset ($_POST['txt_nameModify']) && isset($_POST['txt_lastnameModify']) &&
			isset ($_POST['txt_usernameModify'])){
				$name = $_POST['txt_nameModify'];
				$lastname = $_POST['txt_lastnameModify'];
	    		$username = $_POST['txt_usernameModify'];
				$result = false;
				$result =  $user->modify_user($name, $lastname, $username);
				
				if($result == true) {
					header('Location:./view.php?result=ok');
		  		}
		  		else {
					header('Location:./view.php?result=exitence_user');
		  		}
	  } 
	  else{
			header('Location:./view.php?result=miss_data');
  	  }
	}

	function view_users(){
		$user = new user($mysqli);
		$result = $user->view_users();
		
		return $result;
	} 
		
	
		
//	print_r ($_POST);
if (isset ($_POST['new_user'])) new_user($mysqli);
if (isset ($_POST['delete_user'])) delete_user($mysqli);
if (isset ($_POST['search_user'])) check_user($mysqli);
if (isset ($_POST['modify_user'])) modify_user($mysqli);	
?>