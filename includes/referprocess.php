<?php
if(isset($_POST['btnRefer']))
{
	extract($_POST);
	
	if(!empty($FullName) && !empty($email) && !empty($FFullName) && !empty($Femail))
	{
		$subject = "Request from ". $FullName;
		$msg = '
				<div style="width:80%; margin:0 auto;">
				Dear '. $FFullName .',<br><br>
				I found <a href="http://www.mountainworldtreks.com" target="_blank">www.mountainworldtreks.com</a> to be very useful and helping for me. I think the link  will also be helpful for you. So please visit the following link the the details.<br><br>
				
				<a href="http://www.mountainworldtreks.com/'. $title .'.html" target="_blank">www.mountainworldtreks.com/'. $title . '.html</a><br><br>
				
				Thank you<br>' .
				$FullName
				. '</div>
		';
		
		include("includes/sendemail.php");
		sendEmail($Femail, $subject, $msg, $email);

		$_SESSION['refermsg'] = "Email sent to your friend";
		header("Location: ". $_GET['title'] . ".html");
		exit();
	}	
	else
		$feedbackmsg = "Please enter all required fields";
}
?>