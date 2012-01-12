<?php
/*
 * /Categories/Category.php
 * La clase dentro de la carpeta de categorías que se
 * encarga de manejar todas las rutinas.
 */

	include ("../../session.inc");
	include ("../../tools/category.php");
	
	check_login($mysqli, "Administrador");
	
	function new_cat($mysqli){
			$cat = new category($mysqli);
		//Realizamos la consulta a la base de datos y controlamos que nos devuelva
	    //algun resultado
	    if (isset ($_POST['txt_name']) && isset ($_POST['txt_description']) ){
		    //Creamos variables locales con el contenido de las devueltas por el form
		    $name = $_POST['txt_name'];
			$description = $_POST['txt_description'];
			$result = false;
			$result =  $cat->create_level($name, $description);
			
			  if($result == true) {
			  	header('Location: ./index.php');
			  }
			  else {
			  	header('Location: index.php');
			  }
		  } 
		  else{
			  	header('Location: index.php');
	  	  }
		}
	
	function modify_cat($mysqli){
		$cat = new category($mysqli);
		//Realizamos la consulta a la base de datos y controlamos que nos devuelva
	    //algun resultado
	    if (isset ($_POST['txt_CategoryModify']) ){
		    //Creamos variables locales con el contenido de las devueltas por el form
		    $name = $_POST['txt_CategoryModify'];
			$category = $_POST['select'];
			$result = false;
			$result =  $cat->modify_level($name, $category);
			
			  if($result == true) {
			  	header('Location: ./modify.php?result="ok"');
			  }
			  else {
			  	header('Location: ./modify.php?result="failed"');
			  }
		  } 
		  else{
			  	header('Location: ./modify.php?result="miss_data"');
	  	  }
		}
	

if (isset ($_POST['new_cat'])) new_cat($mysqli);
if (isset ($_POST['cat_modify'])) modify_cat($mysqli);
?>