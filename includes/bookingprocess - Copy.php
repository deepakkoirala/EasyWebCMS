<?php
if(isset($_POST['btnBooking']))
{
	extract($_POST);
	
	if(!empty($FullName) && !empty($email) && !empty($country))
	{
		$subject = "Booking details on mountainworldtreks.com";
		$msg = '
				<div>
					<label> <span style="padding-right:90px;"><strong>Package Title</strong></span>' . $Package . '</label>
					<br/>
					<div>
						<label> <span style="padding-right:108px;"><strong>Full Name</strong></span> '. $FullName . '</label>
					</div>
					<div>
					  <label> <span style="padding-right:140px;"><strong>Email</strong></span> ' . $email .'</label>
					</div>
					<div id="rowElem">
					  <label> <span style="padding-right:128px;"><strong>Country</strong></span>' . $country .'</label>
					</div>
					<div>
					  <label> <span style="padding-right:83px;"><strong>Phone Number</strong></span>' . $Phone .'</label>
					</div>
					<div>
					  <label> <span style="padding-right:54px;"><strong>Number of Persons</strong></span>' . $number_of_person .'</label>
					</div>
					<div>
					  <label> <span style="padding-right:36px;"><strong>Need Airport Pickup?</strong></span>' . $airport_pickup .'</label>
					</div>
					<div>
					  <label> <span style="padding-right:42px;"><strong>Want to book Hotel?</strong></span>' . $book_hotel .'</label>
					</div>
					<div>
					  <label> <span style="padding-right:31px;"><strong>Coming with Children?</strong></span>' . $with_children .'</label>
					</div>
					<div><span id="sprytextfield3">
					  <label> <span style="padding-right:16px;"><strong>Correspondence Address</strong></span>' . $Address. '</label>
					  </span></div>
					<div><span id="sprytextarea1">
					  <label> <span style="padding-right:81px;"><strong>Extra Message</strong></span><br>' . nl2br($Details) .'</label>
					  </span></div>
			  </div>
		';
		include("includes/sendemail.php");
		sendEmail("info@mountainworldtreks.com", $subject, $msg, $email);
		
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