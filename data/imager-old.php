<?php
$upfile = $_GET['file'];
if (!file_exists($upfile))
	$upfile = "../pics/noimage.jpg";
$ext = substr($upfile, strlen($upfile)-3);

if ($ext == "jpg")
 Header("Content-type: image/jpeg");
else if ($ext == "gif")
 Header("Content-type: image/gif");
else if ($ext == "png")
 Header("Content-type: image/png");

$max_width = $_GET['mw'];
$max_height = $_GET['mh'];

$size = getimagesize($upfile); 
$width = $size[0];
$height = $size[1];


if(isset($_GET['text'])){
	$font = "candarab.ttf";
$text = $_GET['text'];


ini_set('memory_limit', '32M');
  	if ($ext == "jpg")
	 $dst = imagecreatefromjpeg($upfile);
	else if ($ext == "gif")
	 $dst = imagecreatefromgif($upfile);
	else if ($ext == "png")
	 $dst = imagecreatefrompng($upfile);
	 
$blue = imagecolorallocate ($dst, 5, 56, 112);	 
$white = imagecolorallocate($dst, 255,255,255);

imagettftext($dst, 15, 0, 40, 210, $white, $font, $text);
imagettftext($dst, 15, 0, 39, 209, $blue, $font, $text);
	 
	
}else if(isset($_GET['fix']))
{
	if($width < $height)
	{
		$ratio = $max_width / $width;
	}
	else
	{
		$ratio = $max_height / $height;
	}
	
	$tn_width = round($ratio * $width);
	$tn_height = round($ratio * $height);
	
	$x = 0;
	$y = 0;
	$diff = 0;
	
	if($tn_width > $max_width)
	{
		$diff1 = $tn_width - $max_width;	
		if($diff1%2 != 0)
		$diff1 = $diff1 - 1;
	
		$x = $diff1 / 2;
	}
	else
	{
		$diff = $tn_height - $max_height;	
		
		if($diff%2 != 0)
			$diff = $diff- 1;
		
		$y = $diff / 2;
	}
	
	ini_set('memory_limit', '32M');
	
	if ($ext == "jpg")
	 $src = imagecreatefromjpeg($upfile);
	else if ($ext == "gif")
	 $src = imagecreatefromgif($upfile);
	else if ($ext == "png")
	 $src = imagecreatefrompng($upfile); 
	
	$dst = imagecreatetruecolor($max_width, $max_height);

	imagecopyresampled($dst, $src, -$x, -$y, 0, 0, $tn_width, $tn_height, $width, $height);
}
else
{
	$x_ratio = $max_width / $width;
	$y_ratio = $max_height / $height;
	
	if( ($width <= $max_width) && ($height <= $max_height) )
	{
		$tn_width = $width;
		$tn_height = $height;
	}
	elseif (($x_ratio * $height) < $max_height)
	{
		$tn_height = ceil($x_ratio * $height);
		$tn_width = $max_width;
	}
	else
	{
		$tn_width = ceil($y_ratio * $width);
		$tn_height = $max_height;
	}
	
	ini_set('memory_limit', '32M');
	if ($ext == "jpg")
	 $src = imagecreatefromjpeg($upfile);
	else if ($ext == "gif")
	 $src = imagecreatefromgif($upfile);
	else if ($ext == "png")
	 $src = imagecreatefrompng($upfile); 
	 
	$dst = imagecreatetruecolor($tn_width, $tn_height);
	
	imagecopyresampled($dst, $src, 0, 0, 0, 0, $tn_width, $tn_height, $width, $height);
}
imagejpeg($dst);
imagedestroy($src);
imagedestroy($dst);
?>