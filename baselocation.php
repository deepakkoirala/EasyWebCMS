<?php
if(strpos(__FILE__,"htdocs"))
	$BaseNew = "http://".$_SERVER['HTTP_HOST'].str_replace('\\',"/",(end(explode('htdocs',dirname(__FILE__)))));
elseif(strpos(__FILE__,"public_html"))
	$BaseNew = "http://".$_SERVER['HTTP_HOST'].end(explode('public_html',dirname(__FILE__)));
else
	$BaseNew = "http://".$_SERVER['HTTP_HOST'];
echo "<base href=\"".$BaseNew."/\"/>" ;
?>

