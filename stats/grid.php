<?
include ("../session.inc");
check_login($mysqli,"Administrador");
include "./graph/charts.php";
include ("../tools/stats.php");

if ($_SESSION['re'] == "tt"){
	
	$stats = new stats($mysqli);
	$result = false;
	$result = $stats->top_team();
	if ($result){
		$chart [ 'chart_data' ][ 0 ][ 0 ] = "";
		
		$row = 0; 
		$index = 0;
		foreach($result as $_row) {
    	    
			//http://www.maani.us/charts4/index.php?menu=Tutorial&submenu=Chart_Data
			//$col = $_row['time'];
			//populate the PHP array with the play title
   			$chart [ 'chart_data' ][ 0 ][ $index ] = $_row['name'];

   			//populate the PHP array with the revenue data
   			$chart [ 'chart_data' ][$row ][ $index ] = $_row['time'];
   			$index++;
			$row++;
			}
		
				
	}
	/*
	foreach($result as $_row) {
		echo $_row['name'] . " ";
		
		echo $_row['time'];
		echo "<br />";
	}
	
	*/
	
}

else if ($_SESSION['re'] == "bt"){

$chart [ 'chart_data' ] = array ( array ( "6546",         "1985", "1986", "1987", "1988" ),
                                  array ( "",     5,     10,     30,     63  ),
                                );
}

else {
	$chart [ 'chart_data' ] = array ( array ( "6546",         "1985", "1986", "1987", "1988" ),
                                  array ( "mercedes A",     5,     10,     30,     63  ),
                                  array ( "retana B",   100,     20,     65,     55  ),
                                  array ( "rojas C",    56,     21,      5,     90  )
                                );

}


//send the new chart data to the charts.swf flash file
SendChartData ( $chart );
	 
?>