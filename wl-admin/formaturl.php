<?php
$value = $_GET['value'];
$value = str_replace("!", "", $value);
$value = str_replace("@", "", $value);
$value = str_replace("#", "", $value);
$value = str_replace("$", "", $value);
$value = str_replace("%", "", $value);
$value = str_replace("^", "", $value);
$value = str_replace("&", "", $value);
$value = str_replace("*", "", $value);
$value = str_replace("(", "", $value);
$value = str_replace(")", "", $value);
$value = str_replace("_", "", $value);
$value = str_replace("{", "", $value);
$value = str_replace("}", "", $value);
$value = str_replace("[", "", $value);
$value = str_replace("]", "", $value);
$value = str_replace(":", "", $value);
$value = str_replace(";", "", $value);
$value = str_replace("'", "", $value);
$value = str_replace("\"", "", $value);
$value = str_replace("'", "", $value);
$value = str_replace("<", "", $value);
$value = str_replace(",", "", $value);
$value = str_replace(">", "", $value);
$value = str_replace(".", "", $value);
$value = str_replace("?", "", $value);
$value = str_replace("/", "", $value);
$value = str_replace("\\", "", $value);
$value = str_replace("'", "", $value);
$value = str_replace("|", "", $value);
$value = str_replace("  ", " ", $value);

$value = trim($value);
$value = str_replace(" ", "-", $value);
$value = strtolower($value);
//echo $value;

include "../data/conn.php";
$conn = new Dbconn;
$url = mysql_real_escape_string($value);
$query = mysql_query("select urlname as url from groups where urlname='$url' union select urltitle as url from listings where urltitle='$url'");
if($conn->numRows($query) > 0)
	echo $value."-".rand(10,100);
else
	echo $value; 
?>