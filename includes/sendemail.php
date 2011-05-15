<?php
function sendEmail($to, $subject, $msg , $from = "")
{
	$headers  = "";
	$headers .= "MIME-Version: 1.0 \r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
	$headers .= "X-Priority: 1\r\n";
	if(!empty($from))
	$headers .= "From: ". $from;
	
	if(@mail($to, $subject, $msg, $headers))
		return true;
	else
		return false;
}
?>