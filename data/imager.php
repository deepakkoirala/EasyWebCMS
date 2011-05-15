<?php
error_reporting(0);
$upfile = $_GET['file'];
if (!file_exists($upfile))
	$upfile = "no-image.jpg";
//$ext = substr($upfile, strlen($upfile)-3);
$size = getimagesize($upfile);
$type = $size['mime'];	

if ($type == "image/jpg" || $type == "image/jpeg" || $type == "image/pjpeg") 
 Header("Content-type: image/jpeg");
else if ($type == "image/gif")
 Header("Content-type: image/gif");
else if ($type == "image/png" || $type == "image/x-png")
 Header("Content-type: image/png");


$max_width = $_GET['mw']; if(!$_GET['mw']) { $max_width = $size[0]; }
$max_height = $_GET['mh']; if(!$_GET['mh']) { $max_height = $size[1]; }
	
$width = $size[0];
$height = $size[1];

if(isset($_GET['acc']))
{
	$x_ratio = $max_width / $width;
	$y_ratio = $max_height / $height;
	
	$x = $y = 0;
	
	if($x_ratio > $y_ratio)
	{
		$tn_width = $x_ratio * $width;
		$tn_height = $x_ratio * $height;	
		
		$y_diff = $tn_height - $max_height;
		
		$y = $y_diff / 2;
	}
	else
	{
		$tn_width = $y_ratio * $width;
		$tn_height = $y_ratio * $height;
		
		$x_diff = $tn_width - $max_width;
		
		$x = $x_diff / 2;
	}
	
	$x = floor($x);
	$y = floor($y);
	$tn_width = floor($tn_width);
	$tn_height = floor($tn_height);
	/*
	echo "<pre>";
	echo $tn_width . "------" . $tn_height . "------" . $x;
	echo "</pre>";*/
	
	ini_set('memory_limit', '32M');
	if ($type == "image/jpg" || $type == "image/jpeg" || $type == "image/pjpeg") 
	 $src = imagecreatefromjpeg($upfile);
	else if ($type == "image/gif")
	 $src = imagecreatefromgif($upfile);
	else if ($type == "image/png" || $type == "image/x-png")
	 $src = imagecreatefrompng($upfile); 
	 
	$dst = imagecreatetruecolor($max_width, $max_height);
	
	imagecopyresampled($dst, $src, -$x, -$y, 0, 0, $tn_width, $tn_height, $width, $height);
}
elseif(isset($_GET['fix']))
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
	
	if ($type == "image/jpg" || $type == "image/jpeg" || $type == "image/pjpeg") 
	 $src = imagecreatefromjpeg($upfile);
	else if ($type == "image/gif")
	 $src = imagecreatefromgif($upfile);
	else if ($type == "image/png" || $type == "image/x-png")
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
	if ($type == "image/jpg" || $type == "image/jpeg" || $type == "image/pjpeg") 
	 $src = imagecreatefromjpeg($upfile);
	else if ($type == "image/gif")
	 $src = imagecreatefromgif($upfile);
	else if ($type == "image/png" || $type == "image/x-png")
	 $src = imagecreatefrompng($upfile); 
	 
	$dst = imagecreatetruecolor($tn_width, $tn_height);
	
	imagecopyresampled($dst, $src, 0, 0, 0, 0, $tn_width, $tn_height, $width, $height);
}

if ($type == "image/jpg" || $type == "image/jpeg" || $type == "image/pjpeg") 
 imagejpeg($dst, null, 100);
else if ($type == "image/gif")
 imagegif($dst, null, 100);
else if ($type == "image/png" || $type == "image/x-png")
	imagepng($dst);

imagedestroy($src);
imagedestroy($dst);


?>