<?php
if(isset($_POST['tripplan']))
{
	if($_SESSION['security_code'] == $_POST['captchacode'] && !empty($_SESSION['security_code']))
	{
		extract($_POST);
		
		$msg = '<table border="0" cellpadding="3" cellspacing="0" width="80%">';
		$msg .= '
						<tr>
							<td width="35%">Destination</td>
							<td>:</td>
							<td>' . $destination .'</td>
						</tr>
						<tr>
							<td>Arrival</td>
							<td>:</td>
							<td>' . $arrivaldate .'</td>
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
							<td>' . $noofpeople .'</td>
						</tr>
						<tr>
							<td colspan="3">Requirements &amp; Travel Plan</td>
						</tr>
						<tr>
							<td colspan="3">' . nl2br($description) .'</td>
						</tr>
						<tr>
							<td>Name </td>
							<td>:</td>
							<td>' . $fullname .'</td>
						</tr>
						<tr>
							<td>Email </td>
							<td>:</td>
							<td>' . $email .'</td>
						</tr>
						<tr>
							<td>Country </td>
							<td>:</td>
							<td>' . trim($country).'</td>
						</tr>
						<tr>
							<td>Phone </td>
							<td>:</td>
							<td>' . $phone .'</td>
						</tr>
					';
		$msg .= '</table>';
		
		include("includes/sendemail.php");
		$subject = "New Travel Plan on mountainworldtreks.com";
		sendEmail("info@mountainworldtreks.com", $subject, $msg, $email);
		$_SESSION['planmsg'] = "Travel Plan details sent successfully";
	
		header("Location: " . $urltitle . ".html");
		exit();
	}
	else
		$_SESSION['planmsg'] = "Please enter correct verication code";
}
?>