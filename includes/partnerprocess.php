<?php
if(isset($_POST['btnAgent']))
{
	extract($_POST);

	if(!empty($txt_fname) && !empty($txt_email) && !empty($txt_lname) && $_SESSION['security_code'] == $txt_captcha && !empty($txt_captcha))
	{
		$subject = "Inquery for Agent on mountainworldtreks.com";
		$msg = '
				<div>
					<table width="100%" border="0" cellspacing="4" cellpadding="0">
						<tbody>
							<tr>
								<td colspan="5" align="left"><strong>Personal Details</strong></td>
							</tr>
							<tr>
								<td align="right">Full Name</td>
								<td width="79%" colspan="4" align="left">' . $seTitle . " " . $txt_fname . " " . $txt_lname .'</td>
							</tr>
							<tr>
								<td align="right" valign="top">Mailing Address</td>
								<td colspan="4" align="left">' . nl2br($txta_address) .'</td>
							</tr>
							<tr>
								<td align="right">Phone</td>
								<td colspan="4" align="left">' . $txt_phone .'</td>
							</tr>
							<tr>
								<td align="right">Fax</td>
								<td colspan="4" align="left">' . $txt_fax .'</td>
							</tr>
							<tr>
								<td align="right">Email</td>
								<td colspan="4" align="left">' . $txt_email .'</td>
							</tr>
							<tr>
								<td align="right">City</td>
								<td colspan="4" align="left">' . $txt_city.'</td>
							</tr>
							<tr>
								<td align="right">Country</td>
								<td colspan="4" align="left">'. $sel_country .'</td>
							</tr>
							<tr>
								<td align="right" valign="top">Comments</td>
								<td colspan="4" align="left">' . nl2br($txta_comments) .'</td>
							</tr>
						</tbody>
					</table>
		';
		
		include("includes/sendemail.php");
		sendEmail("info@mountainworldtreks.com", $subject, $msg, $email);
		
		$_SESSION['agentmsg'] = "Inquiry posted successfully. We will be in touch with you as soon as possible";		
	}	
	else
		$feedbackmsg = "Please enter all required fields";
}
?>