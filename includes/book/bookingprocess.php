<?php
if(isset($_POST['btnBooking']))
{
	extract($_POST);

	if(!empty($txt_fname) && !empty($txt_email) && !empty($txt_lname))
	{
		$subject = "Booking details on mountainworldtreks.com";
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
								<td colspan="5" align="left"><strong>Trip Details</strong></td>
							</tr>
							<tr>
								<td align="right">Trip Package Name</td>
								<td colspan="4" align="left"> ' . $txt_tpname .'</td>
							</tr>
							<tr>
								<td align="right">Numbers in Party</td>
								<td colspan="4" align="left">' . $sel_adult .' Above 18 years ' . $sel_children .' Below 18 years</td>
							</tr>
							<tr>
								<td align="right">Arrival Date</td>
								<td colspan="4" align="left">' . $txt_adate .'</td>
							</tr>
							<tr>
								<td align="right">Flight Name/ Number</td>
								<td colspan="4" align="left">' . $txt_flight .'</td>
							</tr>
							<tr>
								<td align="right">Airport Pickup</td>
								<td colspan="4" align="left">' . $rbtn_pickup .'</td>
							</tr>
							<tr>
								<td align="right">Departure Date</td>
								<td colspan="4" align="left">' . $txt_ddate .'</td>
							</tr>
							<tr>
								<td align="right" valign="top">How did you find us?</td>
								<td colspan="4" align="left">' . $btn_findus .'</td>
							</tr>
							<tr>
								<td align="right" valign="top">Comments</td>
								<td colspan="4" align="left">' . nl2br($txta_comments) .'</td>
							</tr>
						</tbody>
					</table>
		';
		include("includes/sendemail.php");
		sendEmail("info@activeeveresttreks.com", $subject, $msg, $email);
		
		$url = "booking";
		if(isset($_GET['title']))
			$ulr .= "/".$_GET['title'];
		$url .= ".html";
		$_SESSION['bookmsg'] = "Booking details submitted successfully. We will be in touch with you as soon as possible";
		header("Location: $url");
		exit();
	}	
	else
		$feedbackmsg = "Please enter all required fields";
}
?>