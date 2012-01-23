<?php
 	include ("../session.inc");
   	include ("../tools/stats.php");
	check_login($mysqli);
	//include "graph/charts.php";

if (isset ($_POST['select'])){
	$seleccion = $_POST['select'];
	
	if ($seleccion == "10 Mejores tiempos por usuario"){ top_user($mysqli);}
	if ($seleccion == "10 Peores tiempos por usuario"){ bottom_user($mysqli);}
	if ($seleccion == "10 Peores tiempos por equipo"){ bottom_team($mysqli);}
	if ($seleccion == "10 Mejores tiempos por equipo"){ top_team($mysqli);}
	if ($seleccion == "Fechas de acceso por usuario"){ login_user($mysqli);}
	if ($seleccion == "10 Mejores tiempos"){ top_me($mysqli);}
	if ($seleccion == "10 Peores tiempos"){ bottom_me($mysqli);}

}
else { echo "not set";}

/* Falta montar el arreglo y probarlo. OJO que el gráfico agarra las cosas de 
 * sample.php que es dnd está la funcion que escribe el gráfico. Hay que ver cómo se jala
 * eso
 */
function top_team($mysqli){
		$stats = new stats($mysqli);
		$result = false;
		$result = $stats->top_team();
				
		if($result == true) {
			$_SESSION['re'] = "tt";
			header('Location:./admin2.php');
		}
		else {
			header('Location:./admin.php?result=error');
		}
	}
function top_user($mysqli){
		$stats = new stats($mysqli);
		if (isset ($_POST['txt_username'])){
				$username = $_POST['txt_username'];
				$result = false;
				$result = $stats->top_user($username);
				
				if($result == true) {
					$_SESSION['re'] = "tu";
					header('Location:./admin2.php?username=' . $username);
		  		}
		  		else {
					header('Location:./admin.php?result=error');
		  		}
	  }
	  else{
			header('Location:./admin.php?result=miss_data');
  	  }
	}	
function top_me($mysqli){
		$stats = new stats($mysqli);
		
		$username = $_SESSION['user'];
		$result = false;
		$result = $stats->top_user($username);
			
		if($result == true) {
			$_SESSION['re'] = "tm";
			header('Location:./user2.php');
		}
		else {
			header('Location:./user.php?result=error');
		}
	}

function bottom_team($mysqli){
		$stats = new stats($mysqli);
		$result = false;
		$result =  $stats->bottom_team();
				
		if($result == true) {
			$_SESSION['re'] = "bt";
			header('Location:./admin2.php');
		}
		else {
			header('Location:./view.php?result=error');
		}
	}
function bottom_user($mysqli){
		$stats = new stats($mysqli);
		if (isset ($_POST['txt_username'])){
			$username = $_POST['txt_username'];
			$result = false;
			$result = $stats->bottom_user($username);
			
			if($result == true) {
				$_SESSION['re'] = "bu";
				header('Location:./admin2.php?username='. $username);
		  	}
		  	else {
				header('Location:./admin.php?result=error');
		  	}
	  }
	  else{
			header('Location:./admin.php?result=miss_data');
  	  }
}
function bottom_me($mysqli){
		$stats = new stats($mysqli);
		$username = $_SESSION['user'];
		$result = false;
		$result = $stats->bottom_user($username);
				
		if($result == true) {
			$_SESSION['re'] = "bm";
			header('Location:./user2.php');
		}
		else {
			header('Location:./user.php?result=error');
		}
}

function login_user($mysqli){
		$stats = new stats($mysqli);
		if (isset ($_POST['txt_username'])){
			$username = $_POST['txt_username'];
			$result = false;
			$result = $stats->login_user($username);
				
			if($result == true) {
				$_SESSION['re'] = "lu";
				header('Location:./admin2.php?username=' . $username);
		  	}
		  	else {
				header('Location:./admin.php?result=error');
		  	}
	  	}
	  	else{
			header('Location:./admin.php?result=miss_data');
  		}
	}

/*if($result) {
		    foreach($result as $_row) {
    	    	echo $_row['name'] . $_row['lastname'] .$_row['username'];
			}
		}*/

//change the chart to a bar chart
//$chart [ 'chart_type' ] = "bar";
/*
$chart [ 'chart_data' ] = array ( array ( "6546",         "1985", "1986", "1987", "1988" ),
                                  array ( "leonel A",     5,     10,     30,     63  ),
                                  array ( "murillo B",   100,     20,     65,     55  ),
                                  array ( "retana C",    56,     21,      5,     90  )
                                );


//send the new chart data to the charts.swf flash file
SendChartData ( $chart );

*/
?>