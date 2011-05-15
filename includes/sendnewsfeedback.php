<?php
session_start();  
include("../data/conn.php");
include("../data/newscomments.php");
include("../data/sqlinjection.php");

$conn = new Dbconn();
$newsfeedbacks = new NewsComments();
if($_SESSION['security_code'] == $_GET['code'] && !empty($_SESSION['security_code']))
{
	$resultTotal = $newsfeedbacks -> save($_GET['newsId'], $_GET['name'], $_GET['email'], $_GET['address'], $_GET['feedback']);
	
	if($resultTotal)
	{ 
		echo "&#2346;&#2381;&#2352;&#2340;&#2367;&#2325;&#2381;&#2352;&#2367;&#2351;&#2366; &#2360;&#2347;&#2354; &#2360;&#2366;&#2341; &#2346;&#2369;&#2327;&#2381;&#2351;&#2379;&#2404;" ; 
	}
	
	else 
	{ 
		echo "&#2309;&#2360;&#2347;&#2354;!!!! &#2347;&#2375;&#2352;&#2367; &#2346;&#2336;&#2366;&#2313;&#2344;&#2360;&#2381;&#2404;"; 
	} 
}
else
{
	echo "&#2340;&#2346;&#2366;&#2312;&#2325;&#2379; &#2325;&#2379;&#2337; &#2350;&#2367;&#2354;&#2375;&#2344; !!!";
}
?>