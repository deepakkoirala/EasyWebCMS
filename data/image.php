<?php
header ("Content-type: image/png");
$string = "your text";
// try changing this as well
$font = "candarab.ttf";
/*$width = imagefontwidth($font) * strlen($string) ;
$height = imagefontheight($font) ;

$x = imagesx($im) - $width ;
$y = imagesy($im) - $height;
$backgroundColor = imagecolorallocate ($im, 255, 255, 255);
*/
$im = imagecreatefromjpeg("advance-glacier1.jpg");

$textColor = imagecolorallocate ($im, 255, 255, 0);
imagettftext($im,20,0,40,200,$textColor,$font,$string);
imagepng($im);
?>
<?php
/*


// Set the content-type
header('Content-Type: image/png');

$src = imagecreatefromjpeg('advance-glacier1.jpg');

// Create the image
$im = imagecreatetruecolor(787, 30);

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 29, $white);

// The text to draw
$text = 'Testing...';
// Replace path by your own font path
$font = 'candarab.ttf';

// Add some shadow to the text

imagecopy($im, $src, 0, 0, 20, 13, 80, 40);
// Add the text
imagettftext($im, 20, 0, 10, 20, $black, $font, $text);

// Using imagepng() results in clearer text compared with imagejpeg()
imagejpeg($im);
imagedestroy($im);*/



?> 

