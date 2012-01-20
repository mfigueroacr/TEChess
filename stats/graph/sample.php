<?php
//include charts.php in your script
include "charts.php";

//change the chart to a bar chart
//$chart [ 'chart_type' ] = "bar";

$chart [ 'chart_data' ] = array ( array ( "",         "2001", "2002", "2003", "2004" ),
                                  array ( "leo A",     5,     10,     30,     63  ),
                                  array ( "murillo B",   100,     20,     65,     55  ),
                                  array ( "retana C",    56,     21,      5,     90  )
                                );


//send the new chart data to the charts.swf flash file
SendChartData ( $chart );
?>

