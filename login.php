<?php
 //login.php
  //Nos conectamos a la base de datos
  include("tools/mysqli_call.php");
  include ("tools/user.php");
  include ("session.inc");

  //Realizamos la consulta a la base de datos y controlamos que nos devuelva
  //algun resultado
  if (isset ($_POST['user']) && isset ($_POST['pass']) && ($mysqli instanceof mysqli)){
  $user = new user($mysqli);
  //Creamos variables locales con el contenido de las devueltas por el form
    $username = $_POST['user'];
    $password = $_POST['pass'];
	$result = false;
  $result = $user->check_password($username,$password);
  if($result == true) {
    $_SESSION['user'] = $username; /*Declaramos una variable de sesión donde
                                 guardaremos el nombre del usuario
                                 para control*/
    header("location: main.php");  /* Nos vamos a la sección "privada"
                                        de nuestra página*/
  } else {
      header("location: index.php");
     }
    }
    else {
        header("location: index.php");
    }
?>
