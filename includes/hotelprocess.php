<?php
if(isset($_POST['btnHotelBooking']))
{
	if($_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code']))
	{
		extract($_POST);
	
		$msg = '<table border="0" width="80%" cellpadding="2" cellspacing="2" align="center">';
		$msg .= '
						<tr>
							<td colspan="2"><strong>Customer Information : </strong></td>
						</tr>
						<tr>
							<td>Name : </td>
							<td>'. $fullname . '</td>
						</tr>
						<tr>
							<td>Email : </td>
							<td>' . $email . '</td>
						</tr>
						<tr>
							<td>Phone : </td>
							<td>' . $phone . '</td>
						</tr>
						<tr>
							<td valign="top">Address : </td>
							<td>'. nl2br($address) . '</td>
						</tr>
						<tr>
							<td>Nationality : </td>
							<td>' . $nationality . '</td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2"><strong>Reservation Information : </strong></td>
						</tr>
						<tr>
							<td>Check in Date : </td>
							<td>' . $checkindate . '</td>
						</tr>
						<tr>
							<td>Check out Date : </td>
							<td>' . $checkoutdate .'</td>
						</tr>
						<tr>
							<td>Room Type and No : </td>
							<td>' . $roomtype .' - ' . $no .'</td>
						</tr>
						<tr>
							<td>Occupancy :</td>
							<td>' . $occupancy .'</td>
						</tr>
						<tr>
							<td>Extra Bed : </td>
							<td>' . $extrabed .'</td>
						</tr>
						<tr>
							<td>Special Requirements : </td>
							<td>' . nl2br($requirements) .'</td>
						</tr>
						<tr>
							<td>How will you be paying for your room?</td>
							<td>' . $pay .'</td>
						</tr>
						<tr>
							<td colspan="2"><strong>Flight Information :</strong> </td>
						</tr>
						<tr>
							<td>Airline : </td>
							<td>' . $airline .'</td>
						</tr>
						<tr>
							<td colspan="2"><strong>Arrival Flight :</strong> </td>
						</tr>
						<tr>
							<td>Flight No : </td>
							<td>' . $flightno .'</td>
						</tr>
						<tr>
							<td>Time : </td>
							<td>' . $time .'</td>
						</tr>
						<tr>
							<td>Do you need Airport pickup? </td>
							<td>'. $pickup .'</td>
						</tr>
						<tr>
							<td>Do you need drop to airport?</td>
							<td>' . $drop .'</td>
						</tr>
						<tr>
							<td colspan="2"><strong>Departure Flight :</strong></td>
						</tr>
						<tr>
							<td>Flight No : </td>
							<td>' . $dflightno .'</td>
						</tr>
						<tr>
							<td>Time : </td>
							<td>' . $dtime .'</td>
						</tr>
						<tr>
							<td>Additional Message [if any] : </td>
							<td>' . $message . '</td>
						</tr>
						';
		$msg .= '</table>';
		
		include("includes/sendemail.php");
		$subject = "Hotel booking details on mountainworldtreks.com";
		sendEmail("info@mountainworldtreks.com", $subject, $msg, $email);
		$_SESSION['bookingmsg'] = "Booking details sent successfully";
	
		header("Location: " . $urltitle . ".html");
		exit();
	}
	else
		$_SESSION['bookingmsg'] = "Please enter correct verication code";
}
?>