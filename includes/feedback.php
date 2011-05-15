<script language="javascript">
function validateform(fm){
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
	if(fm.txtcomment.value == ""){
		alert("Please type your Comment.");
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
elseif(isset($_REQUEST['msg']))
	$msg = $_REQUEST['msg'];
		
?>


<?php include("includes/breadcrumb.php"); ?>
<div style="clear:both"></div>
<?php // include("innerleft.php");



 ?>
<div class="rbox">
<style type="text/css">
	.text{
		width:200px;
	}
	td{padding:5px;}
</style>
<div id="contentsPage"> 
  <div class="wel_head"><h1>Feedback Online</h1></div>
  <div style="margin-top:20px;">
  <form name="frmFeedback" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit="return validateform(this);" id="feedback">
  <table width="100%" border="0" cellspacing="0" cellpadding="5">

	<?php if(!empty($msg)){ ?>
    <tr>
      <td colspan="2" class="err" style="color:#F00;"><?php echo $msg; ?></td>
    </tr>
    <?php }else{ ?>
    <tr>
    	<td colspan="2">
        <h4> Please provide your Feedback by filling the forms below </h4>
        </td>
    </tr>    
    <?php } ?>
    <tr>
      <td width="20%">Name <span class="red">*</span></td>
      <td><input type="text" name="txtname" class="text" value="<?php echo $txtname; ?>" /></td>
    </tr>
    <tr>
      <td class="npText">Email <span class="red">*</span></td>
      <td><input type="text" name="txtemail" class="text" value="<?php echo $txtemail; ?>" /></td>
    </tr>
    <tr>
      <td>Phone</td>
      <td><input name="txtphone" type="text" class="text" id="txtphone" value="<?php echo $txtphone; ?>" /></td>
    </tr>
    <tr>
      <td valign="top" class="npText">Feedback Information <span class="red">*</span></td>
      <td><textarea name="txtcomment" cols="75" rows="5"><?php echo $txtcomment; ?></textarea></td>
    </tr>
    <tr>
      <td class="npText">Security Code <span class="red">*</span></td>
      <td><img src="includes/captcha.php?width=110&height=40&characters=6" id="captchaimage" />&nbsp; [<a href="javascript: void(0);" onclick="document.getElementById('captchaimage').src = 'includes/captcha.php?width=110&height=40&characters=6&' + Math.random(); return false;">Reload Image</a>]</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input id="security_code" name="security_code" type="text" maxlength="6" class="securitycode text" style="width:50px;" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="btnFeedback" type="submit" value="Send" class="btn" style="text-align:center;background:#060;color:#FFF;" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><span class="red">[ Fields marked with * are compulsory fields ]</span></td>
    </tr>
  </table>
</form>

  </div>
</div>
</div>