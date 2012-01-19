<?
//class grid{

function graph(){ 

// Add values to the graph
$graphValues=array(0,80,23,11,190,245,50,80,111,240,55);
// Define .PNG image
header("Content-type: image/png");
$imgWidth=250;
$imgHeight=250;
// Create image and define colors
$image=imagecreate($imgWidth, $imgHeight);
$colorWhite=imagecolorallocate($image, 255, 255, 255);
$colorbarrasFondo=imagecolorallocate($image, 178, 110,  27);
$colorBarra=imagecolorallocate($image,   0,  66, 255);
$colorSombra=imagecolorallocate($image,   0,  50, 191);
// Create border around image
imageline($image, 0, 0, 0, 250, $colorbarrasFondo);
imageline($image, 0, 0, 250, 0, $colorbarrasFondo);
imageline($image, 249, 0, 249, 249, $colorbarrasFondo);
imageline($image, 0, 249, 249, 249, $colorbarrasFondo);
// Create grid
for ($i=1; $i<11; $i++){
imageline($image, $i*25, 0, $i*25, 255, $colorbarrasFondo);
imageline($image, 0, $i*25, 255, $i*25, $colorbarrasFondo);
}
// Create bar charts
for ($i=0; $i<10; $i++){
imagefilledrectangle($image, $i*25, (250-$graphValues[$i]), ($i+1)*25, 250, $colorSombra);
imagefilledrectangle($image, ($i*25)+1, (250-$graphValues[$i])+1, (($i+1)*25)-5, 248, $colorBarra);
}
// Output graph and clear image from memory
//imagepng($image);
//imagedestroy($image);
return $image;
}

//echo graph();
//}
?>