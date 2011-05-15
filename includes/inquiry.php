<script language="javascript">
function validateformss(fm){
	
	if(fm.txtname.value == ""){
		alert("Please type your Name.");
		fm.txtname.focus();
		return false;
	}	
	var goodEmail = fm.txtemail.value.match(/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\..{2,3}))$)\b/gi);		
	if(fm.txtemail.value == ""){
		alert("Please type your E-mail.");
		fm.txtemail.focus();
		return false;
	}
	if (!goodEmail) {
		alert("The Email address you entered is invalid please try again!")
		fm.txtemail.focus()
		return (false);
	}			
	
	if(fm.txtphone.value == ""){
		alert("Please type your Phone No.");
		fm.txtphone.focus();
		return false;
	}
	
	if(fm.txtcomment.value == ""){
		alert("Please type your Inquiry.");
		fm.txtcomment.focus();
		return false;
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
    <div class="testi_txt">Enquiry Form</div>
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
      <form name="frmFeedback" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" onSubmit="return validateformss(this);" id="feedback">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="enquiry_table">
  <tr>
      <td colspan="2">Please fill up the form given below as complete as possible and hit on submit button.</td>
    </tr>
    <?php if(!empty($msg)){ ?>
    <tr>
      <td colspan="2" class="err"><?php echo $msg; ?></td>
    </tr>
    <?php unset($_SESSION['feedbackmsg']);} ?>
   
    
    <tr>
      <td width="30%">Name <span class="red">*</span> <br /><span class="inquiry_sub">Add your name</span></td>
      <td><input type="text" name="txtname" class="text" value="<?php echo $_POST['txtname']; ?>"  size="25"/></td>
    </tr>
    <tr>
      <td class="npText">Email <span class="red">*</span> <br /><span class="inquiry_sub">Add a valid address</span></td>
      <td><input type="text" name="txtemail" class="text" value="<?php echo $_POST['txtemail']; ?>" size="25" /></td>
    </tr>
    <tr>
      <td class="npText">Telephone <span class="red">*</span> <br /><span class="inquiry_sub">Number only</span></td>
      <td><input type="text" name="txtphone" class="text" value="<?php echo $_POST['txtphone']; ?>"  size="25"/></td>
    </tr>
    
    <tr>
      <td>Country <br /><span class="inquiry_sub">Add your country</span></td>
      <td><input type="text" name="txtcountry" class="text" value="<?php echo $_POST['txtcountry']; ?>"  size="25"/></td>
    </tr>
    <tr>
      <td valign="top" class="npText">Inquiry <span class="red">*</span> <br /><span class="inquiry_sub">Write your inquiries</span></td>
      <td><textarea name="txtcomment" cols="" rows=""><?php echo $_POST['txtcomment']; ?></textarea></td>
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
      <td><input name="btnFeedback" type="submit" value="Submit" class="btn" /></td>
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
