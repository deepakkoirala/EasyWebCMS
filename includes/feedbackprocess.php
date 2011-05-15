<?php
if(isset($_POST['btnFeedback']))
{
	if($_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code']))
	{
		extract($_POST);
		
		if(!empty($txtname) && !empty($txtemail) && !empty($txtcomment) && !empty($security_code))
		{
		$subject = "Feedback details on ". WEBSITE;
		$msg = '
					
			<div style="font-weight:bold;">Personal Information :</div>
          <div>
            <label> <span style="padding-right:100px;">Name :</span>' . $txtname .'</label>
          </div>
		   <div>
            <label> <span style="padding-right:100px;">Email :</span>' . $txtemail .'</label>
          </div>
		  <div>
            <label> <span style="padding-right:100px;">Phone :</span>' . $txtphone .'</label>
          </div>

		  <div>
            <label> <span style="padding-right:100px;">Comment :</span>' . $txtcomment .'</label>
          </div>
		 
		  
		  ';
		  
		  include("includes/sendemail.php");
		sendEmail(SITE_EMAIL, $subject, $msg, $txtemail);
		
		$feedbackmsg = "Thank you for your feedback. We will contact you at our earliest.";
		$success = TRUE;
		}	
		else
			$feedbackmsg = "Please enter all required fields";
	}
	else
			$feedbackmsg = "Please enter correct security code";
}
?>