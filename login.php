<?php
 //login.php
  //Nos conectamos a la base de datos
  include("tools/base.php");
  include ("tools/hashit.php");
  include ("session.inc");

  //Realizamos la consulta a la base de datos y controlamos que nos devuelva
  //algun resultado
  if (isset ($_POST['user']) && isset ($_POST['pass']) ){
  //Creamos variables locales con el contenido de las devueltas por el form
    $user = $_POST['user'];
    $pass = $_POST['pass'];
	$result = false;
  $result = check_password($user,$pass);
  if($result == true) {
    $_SESSION['user'] = $user; /*Declaramos una variable de sesión donde
                                 guardaremos el nombre del usuario
                                 para control*/
    header("location: main.php");  /* Nos vamos a la sección "privada"
                                        de nuestra página*/
  } else {
      header("location: signin.php");
     }
    }
    else {
        header("location: signin.php");
    }
?>
