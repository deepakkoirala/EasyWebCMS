<?php
if(isset($_POST['btn_TripPlanner'])){
if($_SESSION['security_code'] == $_POST['captcha'] && !empty($_SESSION['security_code']))
	{
	extract($_POST);
	
		
		$msg = '<table border="0" cellpadding="3" cellspacing="0" width="80%">';
		$msg .= '
						<tr>
							<td width="35%">Arrival</td>
							<td>:</td>
							<td>' . $arrival .'</td>
						</tr>
						<tr>
							<td>Duration</td>
							<td>:</td>
							<td>' . $duration .'</td>
						</tr>
						<tr>
							<td>Tour Style </td>
							<td>:</td>
							<td>' . $tourtype .'</td>
						</tr>
						<tr>
							<td>Budget</td>
							<td>:</td>
							<td>' . $budget .'</td>
						</tr>
						<tr>
							<td>No. of People </td>
							<td>:</td>
							<td>' . $people .'</td>
						</tr>
						<tr>
							<td colspan="3">Requirements &amp; Travel Plan</td>
						</tr>
						<tr>
							<td colspan="3">' . nl2br($requirement) .'</td>
						</tr>
						<tr>
							<td>Name </td>
							<td>:</td>
							<td>' . $name .'</td>
						</tr>
						<tr>
							<td>Email </td>
							<td>:</td>
							<td>' . $email .'</td>
						</tr>
						<tr>
							<td>Phone </td>
							<td>:</td>
							<td>' . $phone .'</td>
						</tr>
					';
		$msg .= '</table>';
		
		include("includes/sendemail.php");
		$subject = "New Travel Plan on ".WEB_ADDRESS;
		sendEmail(SITE_EMAIL, $subject, $msg, $email);
		$_SESSION['planmsg'] = "Travel Plan details sent successfully";
		header("Location: index.php");
		exit();
	
	
}else{
	$form_msg = "Invalid Code";
}
}
?>