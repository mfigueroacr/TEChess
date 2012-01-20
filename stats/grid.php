<?

//include charts.php in your script
include "./graph/charts.php";

$chart [ 'chart_data' ] = array ( array ( "6546",         "1985", "1986", "1987", "1988" ),
                                  array ( "josue A",     5,     10,     30,     63  ),
                                  array ( "murillo B",   100,     20,     65,     55  ),
                                  array ( "retana C",    56,     21,      5,     90  )
                                );


//send the new chart data to the charts.swf flash file
SendChartData ( $chart );
?>