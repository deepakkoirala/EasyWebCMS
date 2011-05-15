<script language="javascript">
function validateform(fm){
	if(fm.fullname.value == ""){
		alert("Please type your Name.");
		fm.fullname.focus();
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
	if(fm.phone.value == ""){
		alert("Please type your Phone.");
		fm.phone.focus();
		return false;
	}
	if(fm.address.value == ""){
		alert("Please type your Address.");
		fm.address.focus();
		return false;
	}
	if(fm.nationality.value == ""){
		alert("Please type your Nationality.");
		fm.nationality.focus();
		return false;
	}
	if(fm.checkindate.value == ""){
		alert("Please enter Check in Date.");
		fm.checkindate.focus();
		return false;
	}
	if(fm.checkoutdate.value == ""){
		alert("Please enter Check out Date.");
		fm.checkoutdate.focus();
		return false;
	}
	if(fm.no.value == ""){
		alert("Please enter No.");
		fm.no.focus();
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

<link type="text/css" href="css/jquery-ui-1.8.13.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript">
	$(function(){

		// Datepicker
		$('#checkindate').datepicker({
			inline: true
		});
		
		$('#checkoutdate').datepicker({
			inline: true
		});
		
	});
</script>

<div class="welcome">
  <div class="wel_head">
    <div class="testi_txt">Hotel Reservation Form</div>
  </div>
  <div class="wel_bdy">
    <div class="wel_bdy_txt">
      <?php $row = $hotels -> getByURLName($title); ?>
      <form name="frmHotelBooking" method="post" action="" onsubmit="return validateform(this);">
				<input type="hidden" name="urltitle" value="<?php echo $title; ?>" />
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<?php if(isset($_SESSION['bookingmsg'])){ ?>
					<tr>
						<td colspan="2" class="red"><?php echo $_SESSION['bookingmsg']; ?></td>
					</tr>					
					<?php session_unset("bookingmsg"); } ?>
          <tr>
            <td colspan="2"><strong>Customer Information : </strong></td>
          </tr>
          <tr>
            <td>Name<span class="red">*</span> : </td>
            <td><input type="text" name="fullname" value="<?php echo $fullname; ?>" /></td>
          </tr>
          <tr>
            <td>Email<span class="red">*</span> : </td>
            <td><input type="text" name="email" value="<?php echo $email; ?>" /></td>
          </tr>
          <tr>
            <td>Phone<span class="red">*</span> : </td>
            <td><input type="text" name="phone" value="<?php echo $phone; ?>" /></td>
          </tr>
          <tr>
            <td>Address<span class="red">*</span> : </td>
            <td><textarea name="address" rows="5" cols="50"><?php echo $address; ?></textarea></td>
          </tr>
          <tr>
            <td>Nationality<span class="red">*</span> : </td>
            <td><input type="text" name="nationality" value="<?php echo $nationality; ?>" /></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><strong>Reservation Information : </strong></td>
          </tr>
          <tr>
            <td>Check in Date<span class="red">*</span> : </td>
            <td><input type="text" name="checkindate" id="checkindate" value="<?php echo $checkindate; ?>" readonly="" /></td>
          </tr>
          <tr>
            <td>Check out Date<span class="red">*</span> : </td>
            <td><input type="text" name="checkoutdate" id="checkoutdate" value="<?php echo $checkoutdate; ?>" readonly="" /></td>
          </tr>
          <tr>
            <td>Room Type and No<span class="red">*</span> : </td>
            <td><select name="roomtype">
                <option value="Delux">Delux</option>
                <option value="Super Delux"<?php if($roomtype == "Super Delux") echo ' selected'; ?>>Super Delux</option>
                <option value="Family Suite"<?php if($roomtype == "Family Suite") echo " selected"; ?>>Family Suite</option>
              </select>
              <input type="text" name="no" value="<?php echo $no; ?>" />            </td>
          </tr>
          <tr>
            <td>Occupancy :</td>
            <td><input type="text" name="occupancy" value="<?php echo $occupancy; ?>" /></td>
          </tr>
          <tr>
            <td>Extra Bed : </td>
            <td><input type="text" name="extrabed" value="<?php echo $extrabed; ?>" /></td>
          </tr>
          <tr>
            <td>Special Requirements : </td>
            <td><textarea name="requirements" rows="5" cols="50"><?php echo $requirements; ?></textarea></td>
          </tr>
          <tr>
            <td>How will you be paying for your room?</td>
            <td><input type="text" name="pay" value="<?php echo $pay; ?>" /></td>
          </tr>
          <tr>
            <td colspan="2"><strong>Flight Information :</strong> </td>
          </tr>
          <tr>
            <td>Airline : </td>
            <td><input type="text" name="airline" value="<?php echo $airline; ?>" /></td>
          </tr>
          <tr>
            <td colspan="2"><strong>Arrival Flight :</strong> </td>
          </tr>
          <tr>
            <td>Flight No : </td>
            <td><input type="text" name="flightno" value="<?php echo $flightno; ?>" /></td>
          </tr>
          <tr>
            <td>Time : </td>
            <td><input type="text" name="time" value="<?php echo $time; ?>" /></td>
          </tr>
          <tr>
            <td>Do you need Airport pickup? </td>
            <td>
						<select name="pickup">
							<option value="No">No</option>
							<option value="Yes"<?php if($pickup == "Yes") echo " selected"; ?>>Yes</option>
						</select>						</td>
          </tr>
          <tr>
            <td>Do you need drop to airport?</td>
            <td>
						<select name="drop">
							<option value="No">No</option>
							<option value="Yes"<?php if($drop == "Yes") echo " selected"; ?>>Yes</option>
						</select>						</td>
          </tr>
          <tr>
            <td colspan="2"><strong>Departure Flight :</strong> </td>
          </tr>
          <tr>
            <td>Flight No : </td>
            <td><input type="text" name="dflightno" value="<?php echo $dflightno; ?>" /></td>
          </tr>
          <tr>
            <td>Time : </td>
            <td><input type="text" name="dtime" value="<?php echo $dtime; ?>" /></td>
          </tr>
          <tr>
            <td>Additional Message [if any] : </td>
            <td><textarea name="message" rows="5" cols="50"><?php echo $message; ?></textarea></td>
          </tr>
          <tr>
            <td colspan="2"><strong>Word Verification<span class="red">*</span> :</strong> Type the characters you see in the picture below. </td>
          </tr>
          <tr>
            <td colspan="2"><img src="includes/captcha.php?width=110&height=40&characters=6" id="captchaimage" /></td>
          </tr>
          <tr>
            <td colspan="2">If you can't read the characters, <a href="javascript: void(0);" onclick="document.getElementById('captchaimage').src = 'includes/captcha.php?width=110&height=40&characters=6&' + Math.random(); return false;">click here</a> </td>
          </tr>
          <tr>
            <td colspan="2"><input id="security_code" name="security_code" type="text" maxlength="6" class="securitycode text" style="width:50px;" /></td>
          </tr>
          <tr>
            <td colspan="2">Letters are not case sensitive </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><input type="submit" name="btnHotelBooking" value="Submit" style="border:0; cursor:pointer;" />
              <input type="reset" name="btnClear" value="Clear" style="border:0; cursor:pointer;" />            </td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
