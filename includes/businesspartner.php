<script type="text/javascript" src="js/datetimepicker.js"></script>
<script language="javascript">
function validate(fm){
	if(fm.txt_fname.value == ""){
		alert("Please type your Frist Name.");
		fm.txt_fname.focus();
		return false;
	}	
	if(fm.txt_lname.value == ""){
		alert("Please type your Last Name.");
		fm.txt_lname.focus();
		return false;
	}	
	if(fm.txta_address.value == ""){
		alert("Please type your Mailing Address.");
		fm.txta_address.focus();
		return false;
	}	
	var goodEmail = fm.txt_email.value.match(/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\..{2,3}))$)\b/gi);		
	if(fm.txt_email.value == ""){
		alert("Please type your E-mail.");
		fm.txt_email.focus();
		return false;
	}
	if (!goodEmail) {
		alert("The Email address you entered is invalid please try again!")
		fm.txt_email.focus()
		return (false);
	}		
	if(fm.sel_country.value == ""){
		alert("Please select your Country.");
		fm.sel_country.focus();
		return false;
	}
	if(fm.txt_captcha.value == ""){
		alert("Please enter security code.");
		fm.txt_captcha.focus();
		return false;
	}
	else if(fm.txt_captcha.value.length < 6)
	{
		alert("Please enter valid length security code.");
		fm.txt_captcha.focus();
		return false;
	}
}
</script>
<div style="clear:both"></div>
<div class="welcome">
  <div class="wel_head">
    <div class="testi_txt">Agent Inquiry Form</div>
  </div>
  <div class="wel_bdy">
    <div class="wel_bdy_txt">
			<?php
			if(isset($_SESSION['agentmsg']))
			{
				echo "<div class='err'>" . $_SESSION['agentmsg']. "</div>";
			session_unset("agentmsg");
			}
			?>
    	<form name="frmAgent" method="post" action="" onSubmit="return validate(this);">
      <table width="100%" border="0" cellspacing="4" cellpadding="0">
        <tbody>
          <tr>
            <td colspan="5" align="left" class="red">Fields marked with ( * ) are mandatory</td>
          </tr>
          <tr>
            <td colspan="5" align="left"><strong>Personal Details</strong></td>
          </tr>
          <tr>
            <td align="right">Title</td>
            <td width="79%" colspan="4" align="left"><select name="seTitle" id="seTitle">
                <option value="Mr." selected="selected">Mr.</option>
                <option value="Ms.">Ms.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Dr.">Dr.</option>
              </select></td>
          </tr>
          <tr>
            <td align="right" width="21%">First Name <span class="red">*</span></td>
            <td colspan="4" align="left"><input name="txt_fname" id="txt_fname" type="text" tooltiptext="Type in your first name in this box"></td>
          </tr>
          <tr>
            <td align="right" width="21%">Last Name <span class="red">*</span></td>
            <td colspan="4" align="left"><input name="txt_lname" id="txt_lname" type="text" tooltiptext="Type in your last name in this box"></td>
          </tr>
          <tr>
            <td align="right" valign="top">Mailing Address <span class="red">*</span></td>
            <td colspan="4" align="left"><textarea name="txta_address" cols="35" rows="4" id="txta_address" tooltiptext="Type in your full address in this box"></textarea></td>
          </tr>
          <tr>
            <td align="right">Phone</td>
            <td colspan="4" align="left"><input name="txt_phone" id="txt_phone" type="text" tooltiptext="Type in your telephone in this box">
              Eg: (Country Code + City Code + Phone Number)</td>
          </tr>
          <tr>
            <td align="right">Fax</td>
            <td colspan="4" align="left"><input name="txt_fax" id="txt_fax" type="text" tooltiptext="Type in your fax number in this box">
              Eg: (Country Code + City Code + Fax Number)</td>
          </tr>
          <tr>
            <td align="right">Email <span class="red">*</span></td>
            <td colspan="4" align="left"><input name="txt_email" id="txt_email" type="text" tooltiptext="Type in your email address in this box"></td>
          </tr>
          <tr>
            <td align="right">City</td>
            <td colspan="4" align="left"><input name="txt_city" id="txt_city" type="text" tooltiptext="Type in your city name in this box"></td>
          </tr>
          <tr>
            <td align="right">Country <span class="red">*</span></td>
            <td colspan="4" align="left"><select name="sel_country">
                <option value="">--- Select Your Country Name ---</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D" ivoire="">Cote D'Ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="France, Metropolitan">France, Metropolitan</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
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
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana (British)">Guyana (British)</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, North">Korea, North</option>
                <option value="Korea, South">Korea, South</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People" s="" democratic="" republic="">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macau">Macau</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="St. Helena">St. Helena</option>
                <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States of America">United States of America</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City State (Holy See)">Vatican City State (Holy See)</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Yugoslavia">Yugoslavia</option>
                <option value="Zaire">Zaire</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
                <option value="Canary Islands, The">Canary Islands, The</option>
                <option value="Curacao">Curacao</option>
                <option value="Jordan">Jordan</option>
                <option value="Nevis">Nevis</option>
                <option value="Saipan">Saipan</option>
                <option value="Somaliland, Rep of (North Somalia)">North Somalia</option>
                <option value="St. Barthelemy">St. Barthelemy</option>
                <option value="St. Eustatius">St. Eustatius</option>
                <option value="St. Kits">St. Kits</option>
                <option value="St. Lucia">St. Lucia</option>
                <option value="St. Maarten">St. Maarten</option>
                <option value="St. Vincent">St. Vincent</option>
                <option value="Tabiti">Tabiti</option>
                <option value="Bonaire">Bonaire</option>
                <option value="Guernsey">Guernsey</option>
              </select></td>
          </tr>
          <tr>
            <td align="right" valign="top">Comments</td>
            <td colspan="4" align="left"><textarea name="txta_comments" cols="30" rows="6" id="txta_comments" tooltiptext="Type in your comment in this box"></textarea></td>
          </tr>
          <tr>
            <td align="right">Captcha Image <span class="red">*</span></td>
            <td colspan="4"><img src="includes/captcha.php?width=110&height=40&characters=6" id="captchaimage" />
              <input name="txt_captcha" id="txt_captcha" type="text" maxlength="6"></td>
          </tr>
          <tr>
            <td align="right"> </td>
            <td colspan="4"><input name="btnAgent" id="btn_submit" value="Submit" type="submit">
              <input name="input" type="reset" value="reset"></td>
          </tr>
        </tbody>
      </table>
      </form>
    </div>
  </div>
</div>
