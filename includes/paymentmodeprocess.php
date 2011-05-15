<?php
if(isset($_POST['btnPayment'])){
if($_SESSION['security_code'] == $_POST['captcha'] && !empty($_SESSION['security_code']))
	{
	extract($_POST);
	
		
		$msg = '<table border="0" cellpadding="3" cellspacing="0" width="80%">';
		$msg .= '
						<tr>
							<td width="35%">Date</td>
							<td>:</td>
							<td>' . $date .'</td>
						</tr>
						<tr>
							<td>Currency</td>
							<td>:</td>
							<td>' . $currency .'</td>
						</tr>
						<tr>
							<td>To M/S</td>
							<td>:</td>
							<td>' . $receiver .'</td>
						</tr>
						<tr>
							<td>Merchant ID No.</td>
							<td>:</td>
							<td>' . $receiver .'</td>
						</tr>
						<tr>
							<td>Payment Method</td>
							<td>:</td>
							<td>' . $method .'</td>
						</tr>
						<tr>
						<td colspan="4">
						Owner\'s Description:
						</td>
						</tr>
						<tr>
							<td colspan="3">Card Holder Name</td>
						</tr>
						<tr>
							<td colspan="3">' . $holder_name.'</td>
						</tr>
						<tr>
							<td>Card Number </td>
							<td>:</td>
							<td>' . $card_no .'</td>
						</tr>
						<tr>
							<td>Card Expiry Date </td>
							<td>:</td>
							<td>' . $card_expiry .'</td>
						</tr>
						<tr>
							<td>Subject </td>
							<td>:</td>
							<td>' . $subject .'</td>
						</tr>
						<tr>
							<td>Amount in Words </td>
							<td>:</td>
							<td>' . $amount_words .'</td>
						</tr>
						<tr>
							<td>PP/ ID No. </td>
							<td>:</td>
							<td>' . $pp_id .'</td>
						</tr>
						<tr>
							<td>Date of Birth (Card Holder\'s) </td>
							<td>:</td>
							<td>' . $dob .'</td>
						</tr>
						<tr>
							<td>Statement Address </td>
							<td>:</td>
							<td>' . $statement_address .'</td>
						</tr>
						<tr>
							<td>Mobile No. </td>
							<td>:</td>
							<td>' . $mobile_no .'</td>
						</tr>
						<tr>
							<td>Phone No.</td>
							<td>:</td>
							<td>' . $phone_no .'</td>
						</tr>
						<tr>
							<td>Email Address</td>
							<td>:</td>
							<td>' . $email .'</td>
						</tr>
					';
		$msg .= '</table>';
		
		include("includes/sendemail.php");
		$subject = "Payment Method provided on ".WEB_ADDRESS;
		sendEmail(SITE_EMAIL, $subject, $msg, $email);
		$_SESSION['planmsg'] = "Your details has been submitted successfully";
		header("Location: index.php");
		exit();
	
	
}else{
	$form_msg = "Invalid Code";
}
}
?>