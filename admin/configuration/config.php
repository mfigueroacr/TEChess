<?php
include ('../../tools/base.php');

function config_db(){
	   if (isset ($_POST['txt_codigo'])){
		   	if ($_POST['txt_codigo'] == CODE){
					header('Location:./setup.php?result=ok');
			  } 
			  else{
					header('Location:./setup.php?result=error');
		  	  }
	}
}

if (isset ($_POST['config_db'])) config_db();
?>