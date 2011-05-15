<div class="queryText">
<?php
	if(isset($_POST['submit']))
	{$name=$_POST['name'];$email=$_POST['email'];$addr=$_POST['address'];$tele=$_POST['telephone'];$con=$_POST['con'];$count=$_POST['country'];$msg=$_POST['msg'];$to="sagarrimal.com.np";$subject="Trip!";		
		if( !empty($name) || !empty($email) || !empty($addr) || !empty($tele) || !empty($msg)){
			if(empty($name)){$error="Plese Type Your Name";}
			else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)){$error="plese Type your valid email.";}
			else if(empty($addr)){$error="Plese Type Your Full Address.";}
			else if(empty($tele) || !is_numeric($tele)){$error="Plese Type Your contact Number.";}
			else if($con=='0'){$error="Plese Select Mobile Or Telephone Number.";}
			else if($count=='NULL'){$error="Plese Select Country";}	
			else if(empty($msg) || strlen($msg)<4){$error="Plese Type your Message";}
			else if($_SESSION['security_code']!=$_POST['captcha_code']){$error="Invalid Captcha Code.";}else{$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html; charset=utf-8" . "\r\n";
// More headers
$headers .= 'From: <'.$email.'>' . "\r\n";
$headers .= 'Cc:sagarrimal@gmail.com' . "\r\n";
$msgs="
	<strong>Name:</strong> $fname <br />
	<strong>Email:</strong> : $email<br />
	<strong>Address:</strong> : $addr <br />
	<strong>$con</strong> : $tele <br />
	<strong>Country:</strong> : $country <br />
	<strong>Message:</strong> : $msg <br />
";

	if(mail($to,$subject,$msgs,$headers)){$success=true;	}}}
	else{$error="All Fields Are Required!";}
	}
?>
<?php if($error){
	?>
<div class="err" style="background:#F8F8F7; padding-top:5px; font-weight:bold; color:#000; text-align:center;"><span style="color:#FF0000">ERROR:</span> <?php echo $error; ?></div><div class="clear"></div>
<?php
}
?>
<?php
if(!empty($error) || !isset($_POST['submit']))
{ 
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

<table width="250" border="0" cellspacing="5">

  <tr>
    <td width="91"><strong>Name</strong></td>
    <td width="8"><strong>:</strong></td>
    <td width="136"><input type="text" name="name" value="<?php echo $name; ?>" /></td>
  </tr>
  <tr>
    <td><strong>Email</strong></td>
    <td><strong>:</strong></td>
    <td><input type="text" name="email" value="<?php echo $email; ?>" /></td>
  </tr>
 <tr>
    <td><strong>Address</strong></td>
    <td><strong>:</strong></td>
    <td><input type="text" name="addr" value="<?php echo $addr; ?>" /></td>
  </tr>
  <tr>
    <td><strong>Telephone</strong></td>
    <td><strong>:</strong></td>
    <td><input type="text" name="telephone" size="10" value="<?php echo $tele; ?>" />
    <select name="con">
    	<option value="0" selected="selected">-- SELECT --</option>
        <option value="Mobile">Mobile</option>
        <option value="Telephone">Telephone</option>
    </select></td>
  </tr>
  <tr>
    <td><strong>Country</strong></td>
    <td><strong>:</strong></td>
    <td>
    	 <select name="country"  style="width:150px;">
    <option selected="selected" style="width:150px;" value="NULL">-- Select Country --</option>
      <option value="American-Samoa">American-Samoa</option>
                      <option value="Andorra">Andorra</option>
                      <option value="Antigua-Barbuda">Antigua-Barbuda</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Armenia">Armenia</option>
                      <option value="Aruba">Aruba</option>
                      <option value="Austria">Austria</option>
                      <option value="Australia">Australia</option>
                      <option value="Azerbaijan">Azerbaijan</option>
                      <option value="Bahamas">Bahamas</option>
                      <option value="Bangladesh">Bangladesh</option>
                      <option value="Barbados">Barbados</option>
                      <option value="Belarus">Belarus</option>
                      <option value="Belgium">Belgium</option>
                      <option value="Belize">Belize</option>
                      <option value="Benin">Benin</option>
                      <option value="Bermuda">Bermuda</option>
                      <option value="Bhutan">Bhutan</option>
                      <option value="Bolivia">Bolivia</option>
                      <option value="Bosnia-Herzegovina">Bosnia-Herzegovina</option>
                      <option value="Botswana">Botswana</option>
                      <option value="Bouvet-Island">Bouvet-Island</option>
                      <option value="Brazil">Brazil</option>
                      <option value="British-Indian-Ocean-Territory">British-Indian-Ocean-Territory</option>
                      <option value="Bulgaria">Bulgaria</option>
                      <option value="Cambodia">Cambodia</option>
                      <option value="Cameroon">Cameroon</option>
                      <option value="Canada">Canada</option>
                      <option value="Cape-Verde">Cape-Verde</option>
                      <option value="Cayman-Islands">Cayman-Islands</option>
                      <option value="Central-African-Republic">Central-African-Republic</option>
                      <option value="Chad">Chad</option>
                      <option value="Chile">Chile</option>
                      <option value="China">China</option>
                      <option value="Christmas-Island">Christmas-Island</option>
                      <option value="Cocos-(Keeling)-Islands">Cocos-(Keeling)-Islands</option>
                      <option value="Colombia">Colombia</option>
                      <option value="Comoros">Comoros</option>
                      <option value="Congo">Congo</option>
                      <option value="Cook-Islands">Cook-Islands</option>
                      <option value="Costa-Rica">Costa-Rica</option>
                      <option value="Cote-D'Ivoire-(Ivory-Coast)">Cote-D'Ivoire-(Ivory-Coast)</option>
                      <option value="Croatia-(Hrvatska)">Croatia-(Hrvatska)</option>
                      <option value="Cuba">Cuba</option>
                      <option value="Cyprus">Cyprus</option>
                      <option value="Czech-Republic">Czech-Republic</option>
                      <option value="Denmark">Denmark</option>
                      <option value="Dominica">Dominica</option>
                      <option value="Dominican-Republic">Dominican-Republic</option>
                      <option value="East-Timor">East-Timor</option>
                      <option value="Ecuador">Ecuador</option>
                      <option value="Egypt">Egypt</option>
                      <option value="El-Salvador">El-Salvador</option>
                      <option value="Equatorial-Guinea">Equatorial-Guinea</option>
                      <option value="Eritrea">Eritrea</option>
                      <option value="Estonia">Estonia</option>
                      <option value="Ethiopia">Ethiopia</option>
                      <option value="Falkland-Islands-(Malvinas)">Falkland-Islands-(Malvinas)</option>
                      <option value="Faroe-Islands">Faroe-Islands</option>
                      <option value="Fiji">Fiji</option>
                      <option value="Finland">Finland</option>
                      <option value="France">France</option>
                      <option value="French-Guiana">French-Guiana</option>
                      <option value="French-Polynesia">French-Polynesia</option>
                      <option value="French-Southern-Territories">French-Southern-Territories</option>
                      <option value="Gabon">Gabon</option>
                      <option value="Gabsi">Gabsi (former Gabasi)</option>
                      <option value="Gambia">Gambia</option>
                      <option value="Georgia">Georgia</option>
                      <option value="Germany">Germany</option>
                      <option value="Ghana">Ghana</option>
                      <option value="Gibraltar">Gibraltar</option>
                      <option value="Greece">Greece</option>
                      <option value="Greenland">Greenland</option>
                      <option value="Grenada">Grenada</option>
                      <option value="Guadeloupe">Guadeloupe</option>
                      <option value="Guam">Guam</option>
                      <option value="Guatemala">Guatemala</option>
                      <option value="Guinea">Guinea</option>
                      <option value="Guinea-Bissau">Guinea-Bissau</option>
                      <option value="Guyana">Guyana</option>
                      <option value="Haiti">Haiti</option>
                      <option value="Heard-and-McDonald-Islands">Heard-and-McDonald-Islands</option>
                      <option value="Honduras">Honduras</option>
                      <option value="Hong-Kong">Hong-Kong</option>
                      <option value="Hungary">Hungary</option>
                      <option value="Iceland">Iceland</option>
                      <option value="India">India</option>
                      <option value="Indonesia">Indonesia</option>
                      <option value="Ireland">Ireland</option>
                      <option value="Israel">Israel</option>
                      <option value="Italy">Italy</option>
                      <option value="Jamaica">Jamaica</option>
                      <option value="Japan">Japan</option>
                      <option value="Jordan">Jordan</option>
                      <option value="Kazakhstan">Kazakhstan</option>
                      <option value="Kenya">Kenya</option>
                      <option value="Kiribati">Kiribati</option>
                      <option value="Korea-(North)">Korea-(North)</option>
                      <option value="Korea-(South)">Korea-(South)</option>
                      <option value="Kyrgyzstan">Kyrgyzstan</option>
                      <option value="Laos">Laos</option>
                      <option value="Latvia">Latvia</option>
                      <option value="Lesotho">Lesotho</option>
                      <option value="Liberia">Liberia</option>
                      <option value="Liechtenstein">Liechtenstein</option>
                      <option value="Lithuania">Lithuania</option>
                      <option value="Luxembourg">Luxembourg</option>
                      <option value="Macau">Macau</option>
                      <option value="Macedonia">Macedonia</option>
                      <option value="Madagascar">Madagascar</option>
                      <option value="Malawi">Malawi</option>
                      <option value="Malaysia">Malaysia</option>
                      <option value="Maldives">Maldives</option>
                      <option value="Mali">Mali</option>
                      <option value="Malta">Malta</option>
                      <option value="Marshall-Islands">Marshall-Islands</option>
                      <option value="Martinique">Martinique</option>
                      <option value="Mauritania">Mauritania</option>
                      <option value="Mauritius">Mauritius</option>
                      <option value="Mayotte">Mayotte</option>
                      <option value="Mexico">Mexico</option>
                      <option value="Micronesia">Micronesia</option>
                      <option value="Moldova">Moldova</option>
                      <option value="Monaco">Monaco</option>
                      <option value="Montserrat">Montserrat</option>
                      <option value="Morocco">Morocco</option>
                      <option value="Mozambique">Mozambique</option>
                      <option value="Myanmar">Myanmar</option>
                      <option value="Namibia">Namibia</option>
                      <option value="Nauru">Nauru</option>
                      <option value="Nepal">Nepal</option>
                      <option value="Netherlands">Netherlands</option>
                      <option value="Netherlands-Antilles">Netherlands-Antilles</option>
                      <option value="Neutral-Zone">Neutral-Zone</option>
                      <option value="New-Caledonia">New-Caledonia</option>
                      <option value="New-Zealand-(Aotearoa)">New-Zealand-(Aotearoa)</option>
                      <option value="Nicaragua">Nicaragua</option>
                      <option value="Niger">Niger</option>
                      <option value="Nigeria">Nigeria</option>
                      <option value="Niue">Niue</option>
                      <option value="Norfolk-Island">Norfolk-Island</option>
                      <option value="Northern-Mariana-Islands">Northern-Mariana-Islands</option>
                      <option value="Norway">Norway</option>
                      <option value="Palau">Palau</option>
                      <option value="Panama">Panama</option>
                      <option value="Papua-New-Guinea">Papua-New-Guinea</option>
                      <option value="Paraguay">Paraguay</option>
                      <option value="Peru">Peru</option>
                      <option value="Philippines">Philippines</option>
                      <option value="Pitcairn">Pitcairn</option>
                      <option value="Poland">Poland</option>
                      <option value="Portugal">Portugal</option>
                      <option value="Puerto-Rico">Puerto-Rico</option>
                      <option value="Reunion">Reunion</option>
                      <option value="Romania">Romania</option>
                      <option value="Russian-Federation">Russian-Federation</option>
                      <option value="Saint-Kitts-and-Nevis">Saint-Kitts-and-Nevis</option>
                      <option value="Saint-Lucia">Saint-Lucia</option>
                      <option value="Saint-Vincent-and-the-Grenadines">Saint-Vincent-and-the-Grenadines</option>
                      <option value="Samoa">Samoa</option>
                      <option value="San-Marino">San-Marino</option>
                      <option value="Sao-Tome-and-Principe">Sao-Tome-and-Principe</option>
                      <option value="Scazals-Island">Scazals (Faxim Honda) Island</option>
                      <option value="Seychelles">Seychelles</option>
                      <option value="Sierra-Leone">Sierra-Leone</option>
                      <option value="Singapore">Singapore</option>
                      <option value="Solomon-Islands">Solomon-Islands</option>
                      <option value="South-Africa">South-Africa</option>
                      <option value="Slovak-Republic">Slovak-Republic</option>
                      <option value="Slovenia">Slovenia</option>
                      <option value="Spain">Spain</option>
                      <option value="Sri-Lanka">Sri-Lanka</option>
                      <option value="St.-Helena">St.-Helena</option>
                      <option value="St.-Pierre-and-Miquelon">St.-Pierre-and-Miquelon</option>
                      <option value="Suriname">Suriname</option>
                      <option value="Svalbard-and-Jan-Mayen-Islands">Svalbard-and-Jan-Mayen-Islands</option>
                      <option value="Swaziland">Swaziland</option>
                      <option value="Sweden">Sweden</option>
                      <option value="Switzerland">Switzerland</option>
                      <option value="Taiwan">Taiwan</option>
                      <option value="Thailand">Thailand</option>
                      <option value="Togo">Togo</option>
                      <option value="Trinidad-and-Tobago">Trinidad-and-Tobago</option>
                      <option value="Tokelau">Tokelau</option>
                      <option value="Tonga">Tonga</option>
                      <option value="Turkey">Turkey</option>
                      <option value="Turkmenistan">Turkmenistan</option>
                      <option value="Turks-and-Caicos-Islands">Turks-and-Caicos-Islands</option>
                      <option value="Tuvalu">Tuvalu</option>
                      <option value="Uganda">United States</option>
                      <option value="Uganda">Uganda</option>
                      <option value="Ukraine">Ukraine</option>
                      <option value="United-Kingdom">United-Kingdom</option>
                      <option value="United-States">United-States</option>
                      <option value="Uruguay">Uruguay</option>
                      <option value="US-Minor-Outlying-Islands">US-Minor-Outlying-Islands</option>
                      <option value="Uzbekistan">Uzbekistan</option>
                      <option value="Vatican-City-State-(Holy-See)">Vatican-City-State-(Holy-See)</option>
                      <option value="Vanuatu">Vanuatu</option>
                      <option value="Venezuela">Venezuela</option>
                      <option value="Viet-Nam">Viet-Nam</option>
                      <option value="Virgin-Islands-(British)">Virgin-Islands-(British)</option>
                      <option value="Virgin-Islands-(U.S.)">Virgin-Islands-(U.S.)</option>
                      <option value="Wallis-and-Futuna-Islands">Wallis-and-Futuna-Islands</option>
                      <option value="Yugoslavia">Yugoslavia</option>
                      <option value="Zaire">Zaire</option>
                      <option value="Zambia">Zambia</option>
                      <option value="Zimbabwe">Zimbabwe</option>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Message</strong></td>
    <td><strong>:</strong></td>
    <td><textarea name="msg" cols="24" rows="3" ><?php echo $msg; ?></textarea></td>
  </tr>
   <tr>
    <td><strong><a href="javascript: void(0);" onclick="document.getElementById('captchaimage').src = 'verimages/captcha.php?width=90&height=25&characters=6&' + Math.random(); return false;" class="captchaReload" style="color:#F00; font-weight:bold; ">Refresh</a></strong></td>
    <td><strong>:</strong></td>
    <td><img src="verimages/captcha.php?width=90&height=25&characters=6" id="captchaimage" style="float:left;" onmousedown="return false" /> &nbsp; <input type="text" name="captcha_code" size="8" maxlength="6" style="background:#FFFFFF; height:20px; width:50px;  float:left; margin-left:5px;" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td></td>
    <td><input type="submit" name="submit" value="SEND" style="background:#294B76; padding:5px; font-weight:bold; color:#FFFFFF; border:none; margin-left:35px;" /></td>
  </tr>
</table>
</form>
<?php
}else{echo "Thank You"." ".$name."";}
?>
</div><div class="clear"></div>