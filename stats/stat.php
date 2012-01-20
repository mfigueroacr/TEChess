<?php
 	include ("../session.inc");
   	include ("../tools/stats.php");
	check_login($mysqli, "Administrador");

if (isset ($_POST['top_team'])) top_team($mysqli);
if (isset ($_POST['top_user'])) top_user($mysqli);
if (isset ($_POST['bottom_team'])) bottom_team($mysqli);
if (isset ($_POST['bottom_user'])) bottom_user($mysqli);
if (isset ($_POST['login_user'])) login_user($mysqli);


function top_team($mysqli){
		$user = new stats($mysqli);
		if (isset ($_POST['txt_nameModify']) && isset($_POST['txt_lastnameModify'])){
				$name = $_POST['txt_nameModify'];
				$lastname = $_POST['txt_lastnameModify'];
	    		$username = $_POST['usuario'];
				$email = $_POST['txt_emailModify'];
				$profile = $_POST['select'];
				$result = false;
				$result =  $user->modify_user($name, $lastname, $username, $email, $profile);
				
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

function top_user($mysqli){
		$user = new stats($mysqli);
		if (isset ($_POST['txt_nameModify']) && isset($_POST['txt_lastnameModify'])){
				$name = $_POST['txt_nameModify'];
				$lastname = $_POST['txt_lastnameModify'];
	    		$username = $_POST['usuario'];
				$email = $_POST['txt_emailModify'];
				$profile = $_POST['select'];
				$result = false;
				$result =  $user->modify_user($name, $lastname, $username, $email, $profile);
				
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


function bottom_team($mysqli){
		$user = new stats($mysqli);
		if (isset ($_POST['txt_nameModify']) && isset($_POST['txt_lastnameModify'])){
				$name = $_POST['txt_nameModify'];
				$lastname = $_POST['txt_lastnameModify'];
	    		$username = $_POST['usuario'];
				$email = $_POST['txt_emailModify'];
				$profile = $_POST['select'];
				$result = false;
				$result =  $user->modify_user($name, $lastname, $username, $email, $profile);
				
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


function bottom_user($mysqli){
		$user = new stats($mysqli);
		if (isset ($_POST['txt_nameModify']) && isset($_POST['txt_lastnameModify'])){
				$name = $_POST['txt_nameModify'];
				$lastname = $_POST['txt_lastnameModify'];
	    		$username = $_POST['usuario'];
				$email = $_POST['txt_emailModify'];
				$profile = $_POST['select'];
				$result = false;
				$result =  $user->modify_user($name, $lastname, $username, $email, $profile);
				
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

function login_user($mysqli){
		$user = new stats($mysqli);
		if (isset ($_POST['txt_nameModify']) && isset($_POST['txt_lastnameModify'])){
				$name = $_POST['txt_nameModify'];
				$lastname = $_POST['txt_lastnameModify'];
	    		$username = $_POST['usuario'];
				$email = $_POST['txt_emailModify'];
				$profile = $_POST['select'];
				$result = false;
				$result =  $user->modify_user($name, $lastname, $username, $email, $profile);
				
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
?>