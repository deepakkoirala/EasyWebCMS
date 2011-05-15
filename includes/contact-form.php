<?php
session_start();
include("data/validator.php");
?>
<script type="text/ecmascript" src="js/validation.js"></script>

<?php

	if(isset($_POST['contactBtn']))
	{
		$to=SITE_EMAIL;
		$subject="Contact Inquiry !";
		
		if(!empty($_POST['full_name']) || !empty($_POST['phone']) ||!empty($_POST['company_name']) || !empty($_POST['email']) || !empty($_POST['message']))
		{
			$error= $validator->validate_empty($_POST['full_name'],"Full Name");
			$error.= $validator->validate_empty($_POST['phone'],"Phone Number");
			$error.= $validator->validate_digit($_POST['phone'],"Phone Number ");
			$error.=$validator->validate_number($_POST['phone'],"Phone Number");
			$error.= $validator->validate_empty($_POST['company_name'],"Company Name ");
			$error.= $validator->validate_empty($_POST['email'],"Email Address ");
			$error.= $validator->validate_email($_POST['email'],"Email Address ");
			$error.= $validator->validate_empty($_POST['message'],"Message ");
			
			if(strcmp($_SESSION['security_code'],strtolower($_POST['captcha_code']))!=0)
			{
				$error.="<li>Captcha Code Not Valid.</li>";
			}
			else{
			
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html; charset=utf-8" . "\r\n";
				$headers .= 'From: <'.$_POST['email'].'>' . "\r\n";
				$headers .= 'Cc:'.SITE_EMAIL.'' . "\r\n";
				$msg="
								<strong>Name:</strong> ".ucwords(strtolower($_POST['full_name']))." <br />
								<strong>Phone:</strong> : ".$_POST['phone']." <br />
								<strong>Company Name:</strong> : ".$_POST['company_name']." <br />
								<strong>Email:</strong> : ".$_POST['email']." <br />
								<strong>Message:</strong> : ".$_POST['message']." <br />
							";
							//echo $msg;
							echo "<p class='alert bg-success'>Your message has been sent. Thank you.</p>";
							mail($to,$subject,$msg,$headers);
							$success = true;
			}
				
		}else{
				$error="<li>All Fields Are Required !</li>";
			}	
	}
 ?>
 <style type="text/css">
 	#contact_form span{
		
		color:#F00;
		font-weight:bold;
	}
	.contact_li{
		list-style:none;
	}
	.contact_li li{
		background:url(images/bullet.jpg) no-repeat left;
		padding-left:15px;
		line-height:22px;
		text-align:left;
	}
 </style>

<div class="contact_form" style="padding:10px; width:400px;"><?php if($error){ ?> <div style="color:#930; font-weight:bold; font-size:12px;">
	<ul class="contact_li">
    	<?php echo $error; ?>
    </ul>
</div> <?php } ?>
<form method="post" action="" name="form_login" id="form_login" onSubmit="return validate();">
<table cellpadding="5" cellspacing="5" border="0" width="100%" id="contact_form" align="center">
	<tr>
    	<td width="40%">Name :</td><td width="60%"><input type="text" name="full_name" value="<?php echo $_POST['full_name'] ?>" size="20" onFocus="valid_fullname();" onBlur="valid_fullname();"> <br /> <span id="name_msg"></span></td>
    </tr>
    <tr><td>Phone :</td><td><input type="text" name="phone" value="<?php echo $_POST['phone'];  ?>" size="20" onFocus="validate_phone();" onBlur="validate_phone()"><br /><span id="phone_msg"></span></td> </tr>
    <tr><td>Company Name :</td><td><input type="text" name="company_name" value="<?php echo $_POST['company_name'];  ?>" size="20" onFocus="valid_company();" onBlur="valid_company();"><br /><span id="com_msg"></span></td> </tr> 
    <tr><td>Email :</td><td><input type="text" name="email" value="<?php echo $_POST['email'];  ?>" size="20" onBlur="validate_email()" onFocus="validate_email()"> <br /><span id="email_msg"></span></td> </tr>
   
    <tr><td>Message :</td><td><textarea name="message" rows="3" cols="20"><?php echo $_POST['message'];  ?></textarea></td> </tr>
     <tr>
    	<td>Captcha</td><td><img src="includes/captcha.php?width=80&height=25&characters=6" id="captchaimage" />&nbsp;<input type="text" name="captcha_code" max="6" size="6" maxlength="6"></td>
    </tr>
    <tr><td>&nbsp;</td><td><br><input type="submit" name="contactBtn" value="Send" class="btn btn-success"></td> </tr>
</table>
</form>
</div>
<div class="clear"></div>
<script>
$(document).ready(function() {
    $("input[type=text],input[type=email], textarea, submit, select, button").addClass("form-control");
});
</script>