<script language="javascript">
function validateformsss(fm){
	

	if(fm.date.value == ""){
		alert("Please type date.");
		fm.date.focus();
		return false;
	}
	
	if(fm.receiver.value == ""){
		alert("Please type the recievers name.");
		fm.date.focus();
		return false;
	}
	if(fm.merchant.value == ""){
		alert("Please type the Merchant Id No.");
		fm.date.focus();
		return false;
	}
	

	
	if(fm.holder_name.value == ""){
		alert("Please type Card Holder's Name.");
		fm.holder_name.focus();
		return false;
	}
	
	if(fm.card_no.value == ""){
		alert("Please type Card Number.");
		fm.card_no.focus();
		return false;
	}	
	
	
	if(fm.card_expiry.value == ""){
		alert("Please type expiry date of your card.");
		fm.card_expiry.focus();
		return false;
	}	
	
	
	if(fm.subject.value == ""){
		alert("Please type subject");
		fm.subject.focus();
		return false;
	}	
	
	
	if(fm.amount_words.value == ""){
		alert("Please type amount in words.");
		fm.amount_words.focus();
		return false;
	}
		if(fm.pp_id.value == ""){
		alert("Please type PP or ID.");
		fm.pp_id.focus();
		return false;
	}
		if(fm.dob.value == ""){
		alert("Please type your date of birth.");
		fm.dob.focus();
		return false;
	}
		if(fm.statement.value == ""){
		alert("Please type your statement address.");
		fm.statement.focus();
		return false;
	}	
		if(fm.mobile_no.value == ""){
		alert("Please type your mobile no.");
		fm.mobile_no.focus();
		return false;
	}	
		if(fm.phone_no.value == ""){
		alert("Please type your Phone Number.");
		fm.phone_no.focus();
		return false;
	}	
	
	
	
	
	var goodEmail = fm.email.value.match(/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\..{2,3}))$)\b/gi);		
	if(fm.email.value == ""){
		alert("Please type your E-mail.");
		fm.email.focus();
		return false;
	}
	if (!goodEmail) {
		alert("The Email address you entered is invalid please try again!")
		fm.email.focus()
		return (false);
	}			
	
	if(fm.security_code.value == ""){
		alert("Please enter security code.");
		fm.security_code.focus();
		return false;
	}
	else if(fm.security_code.value.length < 6)
	{
		alert("Please enter valid length security code.");
		fm.security_code.focus();
		return false;
	}

}
</script>
<?php
if(!empty($feedbackmsg))
	$msg = $feedbackmsg;
elseif(isset($_SESSION['feedbackmsg']))
	$msg = $_SESSION['feedbackmsg'];
?>


<div style="clear:both"></div>
<div class="welcome">
  <div class="wel_head">
    <div class="testi_txt">Payment Form</div>
  </div>
  <div class="wel_bdy">
  <?php
  if($success){
	  echo $msg;
  }
  ?>
  <?php
  if(!$success){
	
  ?>
    <div class="wel_bdy_txt">
      <form name="frmFeedback" method="post" action="" onSubmit="return validateformsss(this);" id="feedback">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="enquiry_table">
  <tr>
      <td colspan="2" style="font:13px/20px Arial, Helvetica, sans-serif; ">Fill up the form below, print it easily with the information and fax it or email as attachment with copy of credit card (both sides) and the copy of identification (passport). For using this facility you need to disable popup blocking at least for this website:</td>
    </tr>
    <tr>
    <td colspan="2">
      All fields are required : 
    </td>
    </tr>
    <?php if(!empty($msg)){ ?>
    <tr>
      <td colspan="2" class="err"><?php echo $msg; ?></td>
    </tr>
    <?php unset($_SESSION['feedbackmsg']);} ?>
    <tr>
      <td width="30%">Date <span class="red">*</span></td>
      <td><input type="text" name="date" class="text" value="<?php echo $_POST['date']; ?>" /><span class="inquiry_sub"> Date/Month/Year</span></td>
    </tr>
    
    <tr>
      <td width="30%" colspan="2">I would like to pay for the purchase of </td>
      </tr>
      <tr>
      <td>Select Currency <span class="red">*</span></td>
      <td>
      <input type="radio" name="currency" value="NPR" /> रू(NPR) <input type="radio" name="currency" value="NPR" /> $(USD) <input type="radio" name="currency" value="NPR" /> €(Euro) <input type="radio" name="currency" value="NPR" /> £(Pound)</td>
    </tr>
    <tr>
      <td class="npText">To M/S <span class="red">*</span></td>
      <td><input type="text" name="receiver" class="text ramroData" value="<?php echo $_POST['receiver']; ?>" /></td>
    </tr>
    <tr>
      <td class="npText">Merchant Id No. <span class="red">*</span></td>
      <td><input type="text" name="merchant" class="text ramroData" value="<?php echo $_POST['merchant']; ?>" /></td>
    </tr>
    
    <tr>
      <td>By My <span class="red">*</span></td>
      <td><input type="radio" name="method" value="paypal" /> Paypal <input type="radio" name="method" value="Master Card" /> Master Card <input type="radio" name="method" value="Visa Card" /> Visa Card <input type="radio" name="method" value="Travel Cheque" /> Travel Cheque</td>
    </tr>
    <tr>
    <td colspan="2">  <strong>The necessary details for this transaction are as below.</strong></td>
    </tr>
    <tr>
      <td>Card Holder Name <span class="red">*</span> </td>
      <td><input type="text" class="text ramroData" name="holder_name" value="<?php echo $holder_name; ?>"/></td>
    </tr>
    <tr>
      <td>Card No.<span class="red">*</span> </td>
      <td><input type="text" class="text ramroData" name="card_no" value="<?php echo $card_no; ?>"/></td>
    </tr>
    <tr>
      <td>Card Expiry Date <span class="red">*</span> </td>
      <td><input type="text" class="text ramroData" name="card_expiry" value="<?php echo $card_expiry; ?>"/></td>
    </tr>
    <tr>
      <td>Subject <span class="red">*</span> </td>
      <td><input type="text" class="text ramroData" name="subject" value="<?php echo $subject; ?>"/></td>
    </tr>
    <tr>
      <td>Amount in Words <span class="red">*</span> </td>
      <td><input type="text" class="text ramroData" name="amount_words" value="<?php echo $amount_words; ?>"/></td>
    </tr>
    <tr>
      <td>ID No. (P.P or ID) <span class="red">*</span> </td>
      <td><input type="text" class="text ramroData" name="pp_id" value="<?php echo $pp_id; ?>"/></td>
    </tr>
    <tr>
      <td>C/H Date of Birth <span class="red">*</span> </td>
      <td><input type="text" class="text ramroData" name="dob" value="<?php echo $dob; ?>"/></td>
    </tr><tr>
      <td>Statement Address <span class="red">*</span> </td>
      <td><input type="text" class="text ramroData" name="statement_address" value="<?php echo $statement_address; ?>"/></td>
    </tr>
    <tr>
      <td>Contact Number <span class="red">*</span> </td>
      <td> Mobile <input type="text" class="text ramroData" name="mobile_no" value="<?php echo $mobile_no; ?>"/>
       Phone <input type="text" class="text ramroData" name="phone_no" value="<?php echo $phone_no; ?>"/></td>
    </tr>
    <tr>
      <td>Email Address <span class="red">*</span> </td>
      <td><input type="text" class="text ramroData" name="email" value="<?php echo $email; ?>"/></td>
    </tr>
    <tr>
      <td class="npText">Security Code <span class="red">*</span> <br /><span class="inquiry_sub">Insert the code as shown </span></td>
      <td><img src="includes/captcha.php?width=110&height=40&characters=6" id="captchaimage" />&nbsp; [<a href="javascript: void(0);" onclick="document.getElementById('captchaimage').src = 'includes/captcha.php?width=110&height=40&characters=6&' + Math.random(); return false;">Reload Image</a>]</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input id="security_code" name="security_code" type="text" maxlength="6" class="securitycode text" style="width:50px;" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="btnPayment" type="submit" value="Submit" class="btn" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
  </table>
</form>
    </div>
  <?php
  }
  ?>
  </div>
  
</div>
