 <script type="text/javascript">
		function validateform(fm){
	if(fm.arrival.value == ""){
		alert("Please provide us your arriving date.");
		fm.arrival.focus();
		return false;
	}	
	if(fm.duration.value == ""){
		alert("Please provide us your duration period.");
		fm.duration.focus();
		return false;
	}
	if(fm.tourtype.value == ""){
		alert("Please provide us your Tour Style.");
		fm.tourtype.focus();
		return false;
	}	
	if(fm.people.value == ""){
		alert("Please let us know the number of people.");
		fm.people.focus();
		return false;
	}	
	
	if(fm.requirement.value == ""){
		alert("Please let us know about your requirements.");
		fm.requirement.focus();
		return false;
	}	
	if(fm.name.value == ""){
		alert("Name Field is empty");
		fm.name.focus();
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
		}
	
		</script>
        <form method="post" action="" onsubmit="return validateform(this)">
        <table>
        <tr>
        <td colspan="2">
        <span style="color:red;"><?php echo $form_msg; ?></span>
        </td>
        </tr>
		<tr>
        		<td>Arrival:</td>
                <td><input type="text" name="arrival" value="<?php echo $_POST['arrival']; ?>" /></td>
        </tr>
        <tr>
        		<td>Duration:</td>
                <td><input type="text" name="duration" value = "<?php echo $_POST['duration']; ?>" /></td>
        </tr>
        <tr>
        		<td>Tour Style:</td>
                <td><input type="text" name="tourtype" value="<?php echo $_POST['tourtype']; ?>" /></td>
        </tr>
        <tr>
        		<td>Budget:</td>
                <td><input type="text" name="budget" value="<?php echo $_POST['budget']; ?>" /></td>
        </tr>
        <tr>
        		<td>No. Of PAX:</td>
                <td><input type="text" name="people" value="<?php echo $_POST['people']; ?>" /></td>
        </tr>
        <tr>
        		<td colspan="2">Requirements:</td>
        </tr>
        <tr>
        		<td colspan="2"><textarea name="requirement" style="width:214px;height:50px;" rows="5"><?php echo $_POST['requirement']; ?></textarea></td>
        </tr>
        <tr>
        	<td>Name:</td>
            <td><input type="text" name="name" value="<?php echo $_POST['name'];  ?>" /></td>
        </tr>
        <tr>
        		<td>Email:</td>
                <td><input type="text" name="email" value="<?php echo $_POST['email']; ?>" /></td>
        </tr>
         <tr>
        		<td>Tel:</td>
                <td><input type="text" name="tel" value="<?php echo $_POST['tel']; ?>" /></td>
        </tr>
        <tr>
        		<td><img src="includes/captcha.php?width=80&height=25" onmousedown="return false"/></td>
                <td><input type="text" name="captcha" /></td>
        </tr>
        <tr>
        		<td>&nbsp;</td>
                <td><input type="submit"  value="Submit!" id="submit_button" name="btn_TripPlanner" style="float:right; margin-right:100px;" /></td>
        </tr>

</table>
</form>