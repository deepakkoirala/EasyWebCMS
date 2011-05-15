<?php

if(isset($_POST['btnBooking']))
{
	$courseMsg=$_POST['course'];
	$courseInn=array();
	foreach($courseMsg as $k=>$v)
	{
		array_push($courseInn, $v);	
	}
	$conn=	implode(", ", $courseInn);
	
	
	
	
	
	
		$educationMsg=$_POST['education'];
$educations=array();
foreach($educationMsg as $k=>$v)
{
		array_push($educations, $v);
}
$eduSel = implode(", ", $educations);



	extract($_POST);
	
	if(!empty($FullName) && !empty($email)  && !empty($address) && !empty($Phone) && !empty($txt_captcha) && $txt_captcha == $_SESSION['security_code'])
	{
		$subject = "Booking details on ". WEBSITE;
		$msg = '
					
	
          <div>
            <label> <span style="padding-right:100px;">Full Name :</span>' . $FullName .'</label>
          </div>
          
          <div>
            <label> <span style="padding-right:98px;">Country :</span>' . $Country .'</label>
          </div>
          <div>
            <label> <span style="padding-right:77px;">Contact Email :</span>' . $email . '</label>
          </div>
          <div>
            <label> <span style="padding-right:73px;">Contact Phone :</span>' . $Phone .'</label>
          </div>
		   <div>
            <label> <span style="padding-right:73px;">Contact Address :</span>' . $address .'</label>
          </div>
           <div>
            <label> <span style="padding-right:73px;">Qualification:</span>' .$eduSel .'</label>
          </div>
		    <div>
            <label> <span style="padding-right:73px;">Education Details :</span>' .$conn .'</label>
          </div>
		   <div>
          
          </div>
         
		';
		
		include("includes/sendemail.php");
		sendEmail(SITE_EMAIL, $subject, $msg, $email);
			$url = "online";
		if(isset($_GET['title']))
			$url .= "/".$_GET['title'];
		$url .= ".html";
		header("Location:booking.html");
		$_SESSION['bookmsg'] = "Online Assesment details submitted successfully. We will be in touch with you as soon as possible";
		//header("Location: $url");
		//exit();
	}	
	else
	if($txt_captcha != $_SESSION['security_code']){
		$_SERVER['bookmsg'] = "Wrong security code!";
	}else{
		$_SESSION['bookmsg'] = "Please enter all required fields";
	}
}
?>