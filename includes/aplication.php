<script language="JavaScript">
function validate1()
{
  
   var a=document.joinnow.fname.value;
if(a=="")
{ 
  alert(" please check your First Name field");
  document.joinnow.fname.focus();
  return false;
  }
  
  var b=document.joinnow.lname.value;
if(b=="")
{ 
  alert(" please check your Last Name field");
  document.joinnow.lname.focus();
  return false;
  }
var c=document.joinnow.day.value;
if(c=="day")
{ 
  alert("please check Day field");
  document.joinnow.day.focus();
  return false;
  }
   var d=document.joinnow.month.value;
if(d=="month")
{ 
  alert(" please check Month field");
  document.joinnow.month.focus();
  return false;
  }
   var d=document.joinnow.year.value;
if(d=="year")
{ 
  alert("Specify the Year your birth");
  document.joinnow.year.focus();
  return false;
  }
  var e=document.joinnow.sex.value;
if(e=="select")
{ 
  alert(" please check your Gender field");
  document.joinnow.sex.focus();
  return false;
  }
  var f=document.joinnow.father.value;
if(f=="")
{ 
  alert(" please check your Father's Name field");
  document.joinnow.father.focus();
  return false;
  }
  var g=document.joinnow.mother.value;
if(g=="")
{ 
  alert(" please check your Mother's Name field");
  document.joinnow.mother.focus();
  return false;
  }
  var h=document.joinnow.religion.value;
if(h=="")
{ 
  alert(" please check your Religion field");
  document.joinnow.religion.focus();
  return false;
  }
    var i=document.joinnow.nationality.value;
if(i=="")
{ 
  alert(" please check your Nationality field");
  document.joinnow.nationality.focus();
  return false;
  }
  
  var j=document.joinnow.passport.value;
if(j=="")
{ 
  alert(" please check your Passport No field");
  document.joinnow.passport.focus();
  return false;
  }
  var k=document.joinnow.address.value;
if(k=="")
{ 
  alert(" please check your Contact Address field");
  document.joinnow.address.focus();
  return false;
  }
   var l=document.joinnow.country.value;
if(l=="country")
{ 
  alert(" please check your Country field");
  document.joinnow.country.focus();
  return false;
  }
 var m=document.joinnow.phone.value;
if(m=="")
{ 
  alert("your text phone is empty");
document.joinnow.phone.focus();
  return false;
  }				
  
myphone=document.joinnow.phone.value;
for(i=0;i<=myphone.length-1;i++)
{
  if(myphone.charAt(i)<"0" || myphone.charAt(i)>"9")
   {
   alert("invalid phone  no");
   document.joinnow.phone.focus();
   return false;
   }
}
/*
  var p=document.joinnow.college.value;
if(p=="")
{ 
  alert(" please check your College field");
  document.joinnow.college.focus();
  return false;
  }
  var q=document.joinnow.profession.value;
if(q=="")
{ 
  alert(" please check your profession field");
  document.joinnow.profession.focus();
  return false;
  }
  
 */
var n=document.joinnow.qemail.value;
if(n=="")
{ 
  alert(" please check your Email field");
  document.joinnow.qemail.focus();
  return false;
  }
  myemail=document.joinnow.qemail.value;

len=myemail.length;

if((myemail.indexOf('@')==0)||((myemail.indexOf('.')!=len-3) && (myemail.indexOf('.')!=len-4)))
{
window.alert("invalid Email Address");
document.joinnow.qemail.focus();
return false;
 }
 var o=document.joinnow.job.value;
if(o=="")
{ 
  alert(" please check your Occupation field");
  document.joinnow.job.focus();
  return false;
  }
/*
  var t=document.joinnow.semail.value;
if(t=="")
{ 
  alert(" please check your email field");
  document.joinnow.semail.focus();
  return false;
  }
  mysemail=document.joinnow.semail.value;

len=mysemail.length;

if((mysemail.indexOf('@')==0)||((mysemail.indexOf('.')!=len-3) &amp;&amp; (mysemail.indexOf('.')!=len-4)))
{
window.alert("invalid sEmail Address");
document.joinnow.semail.focus();
return false;
 }
 */
  var p=document.joinnow.qualification.value;
if(p=="")
{ 
  alert(" please check your Academic Qualification field");
  document.joinnow.qualification.focus();
  return false;
  }
   var q=document.joinnow.experience.value;
if(q=="")
{ 
  alert(" please check your Working Experience field");
  document.joinnow.experience.focus();
  return false;
  }
   var r=document.joinnow.salary.value;
if(r=="")
{ 
  alert(" please check your Expected Salary field");
  document.joinnow.salary.focus();
  return false;
  }
   var s=document.joinnow.information.value;
if(s=="")
{ 
  alert(" please check your Extra Information field");
  document.joinnow.information.focus();
  return false;
  }
   
  return true;
}
function validate2()
{
  
   var a=document.documentform.txt_name.value;
if(a=="")
{ 
  alert("Provide your Name");
  document.documentform.txt_name.focus();
  return false;
  }
   var b=document.documentform.txt_email.value;
if(b=="")
{ 
  alert("Provide your Email");
  document.documentform.txt_email.focus();
  return false;
  }
     var c=document.documentform.txt_phone.value;
if(c=="")
{ 
  alert("Provide your Phone");
  document.documentform.txt_phone.focus();
  return false;
  }
   var d=document.documentform.resume.value;
}



</script>

<?php
session_start(); 
if(isset($_POST['submit_document']))
{
//print_r($_POST);
$name = $_POST['txt_name'];
$email = $_POST['txt_email'];
$phone = $_POST['txt_phone'];
$albumcover	= $_FILES["resume"]["name"];
$albumcover = str_replace(" ", "-",$albumcover);
$covertype	= $_FILES['resume']['type'];
$coversize = $_FILES['resume']['size'];
$tmp_name	= $_FILES['resume']['tmp_name'];
$target = "uploads/biodata/";
$to = SITE_EMAIL;
$subject = "Uploaded from website. Biodata of ".$name;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html; charset=utf-8" . "\r\n";
//$headers .= "<tr><td style='padding-left:10px;'>Content-type:text/html; charset=utf-8" . "\r\n";
$headers .= 'From: <'.$email.'>' . "\r\n";
//$headers .= 'Cc: info@dolphinoverseas.com' . "\r\n";
if(empty($albumcover)){
	echo "Error : Please select your file to upload!";
}
else if(($covertype=='application/vnd.openxmlformats-officedocument.wordprocessingml.document')||($covertype=='application/msword')||($covertype=='application/pdf')){
if(is_file("uploads/biodata/".$albumcover)){
	$albumcover = "1".$albumcover;
}
$target2 = $target.$albumcover;
if(move_uploaded_file($tmp_name, $target2)){
//defining message	
$message = "Hi, I have attached my biodata from your website. <br />";
$message .= "<tr><td style='padding-left:10px;'>Name :</td><td style='padding-left:10px;'>". $name. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Email :</td><td style='padding-left:10px;'>". $email. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Phone :</td><td style='padding-left:10px;'>". $phone. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>File : <a href='http://".WEBSITE."/$target2' target=\"_new\"> Download </a>"; 

if(mail($to,$subject,$message,$headers))
{echo "Your Biodata has been submitted. We will response you shortly.";
$success = TRUE;
}


}
}//check image file
else{
	$error= "Sorry, we just support pdf and word fromatted document.";
}

}


if(isset($_POST['submit_application'])){
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$dob_day = $_POST['day'];
$dob_month = $_POST['month'];
$dob_year = $_POST['year'];
$sex = $_POST['sex'];
$father_name = $_POST['father'];
$mother_name = $_POST['mother'];
$religion = $_POST['religion'];
$nationality = $_POST['nationality'];
$passport_no = $_POST['passport'];
$passport_valid = $_POST['valid'];
$address = $_POST['address'];
$country = $_POST['country'];
$phone = $_POST['phone'];
$email = $_POST['qemail'];
$occupation = $_POST['job'];
$qualification = $_POST['qualification'];
$trainings = $_POST['training'];
$experience = $_POST['experience'];
$language_spoken_hindi = $_POST['hspoken'];
$language_written_hindi = $_POST['hwritten'];
$language_spoken_english = $_POST['espoken'];
$language_written_english = $_POST['ewritten'];
$language_spoken_arabic = $_POST['aspoken'];
$language_written_arabic = $_POST['awritten'];
$salary = $_POST['salary'];
$information = $_POST['information'];
$to = SITE_EMAIL;
$subject = "Online Application Form";
   
   
//$headers = "MIME-Version: 1.0" . "\r\n";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html; charset=utf-8" . "\r\n";
$headers .= 'From: <'.$email.'>' . "\r\n";
//$headers .= "<tr><td style='padding-left:10px;'>Content-type:text/html; charset=utf-8" . "\r\n";

// More headers
//$headers .= 'Cc: info@dolphinoverseas.com' . "\r\n";
$message = "<table cellpadding='5' cellspacing='0'  style=' padding:5px; line-height:26px; font-size:13px;'><tr><td style='padding-left:10px;'>First Name :</td><td style='padding-left:10px;'>". $fname. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Middle Name :</td><td style='padding-left:10px;'>". $mname. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Last Name :</td><td style='padding-left:10px;'>". $lname. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Date of Birth :</td><td style='padding-left:10px;'>". $dob_day ." ". $dob_month. " ".$dob_year. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Gender :</td><td style='padding-left:10px;'>". $sex. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Father's Name :</td><td style='padding-left:10px;'>". $father_name. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Mother's Name :</td><td style='padding-left:10px;'>". $mother_name. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Religion :</td><td style='padding-left:10px;'>". $religion. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Nationality :</td><td style='padding-left:10px;'>". $nationality. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Passport No. :</td><td style='padding-left:10px;'>". $passport_no. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Passport Valid Till :</td><td style='padding-left:10px;'>". $passport_valid. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Contact Address :</td><td style='padding-left:10px;'>". $address. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Country :</td><td style='padding-left:10px;'>". $country. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Phone :</td><td style='padding-left:10px;'>". $phone. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Email :</td><td style='padding-left:10px;'>". $email. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Occupation :</td><td style='padding-left:10px;'>". $occupation. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Academic Qualification :</td><td style='padding-left:10px;'>". $qualification. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Trainings :</td><td style='padding-left:10px;'>". $trainings. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Work Experience :</td><td style='padding-left:10px;'>". $experience. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Hindi Spoken :</td><td style='padding-left:10px;'>". $language_spoken_hindi."</td></tr>";
$message .="<tr><td style='padding-left:10px;'>Hindi Written :</td><td style='padding-left:10px;'>".$language_written_hindi. "</td></tr>" ;
$message .= "<tr><td style='padding-left:10px;'>English Spoken :</td><td style='padding-left:10px;'>". $language_spoken_english. "</td></tr>";
$message .="<tr><td style='padding-left:10px;'> English Written :</td><td style='padding-left:10px;'>".$language_written_english. "</td></tr>" ;
$message .= "<tr><td style='padding-left:10px;'>Arabic Spoken :</td><td style='padding-left:10px;'>". $language_spoken_arabic."</td></tr>";
$message .= "<tr><td style='padding-left:10px;'> Arabic Written :</td><td style='padding-left:10px;'>".$language_written_arabic. "</td></tr>" ;
$message .= "<tr><td style='padding-left:10px;'>Expected Salary :</td><td style='padding-left:10px;'>". $salary. "</td></tr>";
$message .= "<tr><td style='padding-left:10px;'>Extra Information :</td><td style='padding-left:10px;'>". $information. "</td></tr></table>";

$_SESSION['message']=$message;


if(mail($to,$subject,$message,$headers))
{echo "Thank you, <b>".$name."</b> for your enquiry. We will contact you at our earliest <br />";
$valid= TRUE;
?>
<a  style="cursor:pointer; color:#FF0000; font-weight:bold;" onclick="popitup('print.php')"><img src="images/click.gif" height="35" width="100" alt="Click" align="baseline" /></a> to Print Your CV Details .
<?php
}
}


?>
<?php if((!isset($_POST['submit_document'])) || !$success){
?>
<div class="welcome">
  <div class="wel_head">
    <h1>Apply Online</h1>
    </div>
<div class="tabform">Attach your Resume </div>
<div class="error"><?php echo $error; ?>&nbsp;</div>
<style type="text/css">
online{
	border:1px solid #808080;
}
.online td{
	padding:5px;
	font-weight:bold;
	
}
</style>
<form enctype="multipart/form-data" action="" method="post" name="documentform" id="documentform">
<table  width="95%" cellspacing="5" cellpadding="5"  class="online" style="border-collapse:collapse;" >
<tr><td align="right">Name</td><td style='padding-left:10px;'><input name="txt_name" type="text" value="<?php echo $name; ?>" /></tr>
<tr><td align="right">Email Address</td><td style='padding-left:10px;'><input name="txt_email" type="text" value="<?php echo $email; ?>" /></tr>
<tr><td align="right">Phone No.</td><td style='padding-left:10px;'><input name="txt_phone" type="text" value="<?php echo $phone; ?>" /></tr>
<tr><td align="right">Attach Biodata</td><td style='padding-left:10px;'><input name="resume" type="file" id="resume" /><br />
<input type = "submit" name="submit_document" value="Submit!" onclick="return validate2()" />
</td></tr>
</table>
</form>
<?
}?>	
<?php if(!$valid){ ?>	
<div class="tabform"> <?php if(!$_POST) { ?> <br><br>OR<br><br><br> <?php } ?>
Apply Online </div>
<div class="error"><?php echo $error; ?>&nbsp;</div>
            	<form action="" method="post" id="applicationform" name="joinnow">
                      
              <table width="95%" cellspacing="0" cellpadding="2" border="0" class="online" style="border-collapse:collapse;" >
                <!--DWLayoutTable-->
                <tbody> 
                <tr> 
                  <td height="26">&nbsp;</td>
                  <td valign="middle" align="right" class="formtext">First name</td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"><input name="fname" type="text" class="bodysmallgrey" id="fname" value="<?php echo $fname; ?>" maxlength="20"></td>
                </tr>
                <tr> 
                  <td height="26">&nbsp;</td>
                  <td valign="middle" align="right" class="formtext">Middle name</td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3">
                    <input name="mname" type="text" class="bodysmallgrey" id="mname" value="<?php echo $mname; ?>" size="25" maxlength="20">
                    (optional) </td>
                </tr>
                <tr> 
                  <td height="26">&nbsp;</td>
                  <td valign="middle" align="right" class="formtext">Last Name </td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"> <input name="lname" type="text" class="bodysmallgrey" value="<?php echo $lname; ?>" size="25" maxlength="20"> 
                  </td>
                </tr>
                <tr> 
                  <td height="28">&nbsp;</td>
                  <td valign="middle" align="right" class="formtext">Date of Birth </td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"> 
                    <select id="day" class="bodysmallgrey" size="1" name="day">
                      <option selected="" value="day">Day</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                      <option value="06">06</option>
                      <option value="07">07</option>
                      <option value="08">08</option>
                      <option value="09">09</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                      <option value="32">32</option>
                    </select>
                    <select id="month" class="bodysmallgrey" size="1" name="month">
                          <option selected="" value="month">Month</option>
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">April</option>
                          <option value="5">May</option>
                          <option value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                    </select> 
                    <select name="year">
                    <option value="year">Year:</option>
                    <?php
					for($x=date('Y'); $x>=1900; $x--){
						?>
                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                        <?
					}
					?>
                    </select>
                    </td>
                </tr>
                <tr> 
                  <td height="28">&nbsp;</td>
                  <td valign="middle" align="right" class="formtext">Gender </td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3">
                    <select id="sex" class="bodysmallgrey" name="sex">
					<option selected="" value="select">-- select-- </option>
                      <option value="Male">Male </option>
                      <option value="Female">Female</option>
                    </select>
                    </td>
                </tr>
                <tr>
                  <td height="26">&nbsp;</td>
                  <td valign="middle" align="right" class="formtext">Father's Name </td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"><input name="father" type="text" class="bodysmallgrey" id="father" value="<?php echo $father_name; ?>" size="40" maxlength="100"></td>
                </tr>
                <tr> 
                  <td height="26">&nbsp;</td>
                <td valign="middle" align="right" class="formtext"> Mother's Name </td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"><input name="mother" type="text" class="bodysmallgrey" id="mother" value="<?php echo $mother_name; ?>" size="40" maxlength="100"> </td>
                </tr>
                <tr>
                  <td height="26"></td>
                  <td valign="middle" align="right" class="formtext">Religion</td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"><input name="religion" type="text" class="bodysmallgrey" id="religion" value="<?php echo $religion; ?>" size="40" maxlength="100"></td>
                </tr>
                <tr>
                  <td height="26"></td>
                  <td valign="middle" align="right" class="formtext">Nationality</td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"><input name="nationality" type="text" class="bodysmallgrey" id="nationality" value="<?php echo $nationality; ?>" size="40" maxlength="100"></td>
                </tr>
                <tr>
                  <td height="26"></td>
                  <td valign="middle" align="right" class="formtext">Passport No. </td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"><input name="passport" type="text" class="bodysmallgrey" id="passport" value="<?php echo $passport_no; ?>" size="25" maxlength="100"></td>
                </tr>
                <tr>
                  <td height="26"></td>
                  <td valign="middle" align="right" class="formtext"> Passport Validity</td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"><input name="valid" type="text" class="bodysmallgrey" id="valid" value="<?php echo $passport_valid; ?>" size="20" maxlength="50"></td>
                </tr>
                <tr>
                  <td height="52"></td>
                  <td valign="top" align="right" class="formtext">Contact Address </td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"> <textarea id="address" class="bodysmallgrey" rows="2" cols="55" name="address"><?php echo $address; ?></textarea>                  </td>
                </tr>
                <tr>
                  <td height="28"></td>
                  <td valign="middle" align="right" class="formtext">Country</td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"> 
                    <select id="country" class="bodysmallgrey" size="1" name="country">
					 <option selected="selected" value="country">Country</option>
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
                  <td height="26">&nbsp;</td>
                  <td valign="middle" align="right" class="formtext">Phone</td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"> <input name="phone" type="text" class="bodysmallgrey" id="phone" value="<?php echo $phone; ?>" size="25" maxlength="20">                  </td>
                </tr>
                <tr valign="top"> 
                  <td height="26">&nbsp; </td>
                  <td valign="middle" align="right" class="formtext"> Email</td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"><input name="qemail" type="text" class="bodysmallgrey" id="pemail" value="<?php echo $email; ?>"></td>
                </tr>
                <tr valign="top">
                  <td height="26">&nbsp;</td>
                  <td valign="middle" align="right" class="formtext">Occupation </td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"><input name="job" type="text" class="bodysmallgrey" id="job" value="<?php echo $occupation; ?>" size="40" maxlength="40"></td>
                </tr>
                <tr valign="top">
                  <td height="66">&nbsp;</td>
                  <td valign="top" align="right" class="formtext">Academic Qualification</td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"><textarea id="qualification" class="bodysmallgrey" rows="3" cols="55" name="qualification"><?php echo $qualification; ?></textarea></td>
                </tr>
                <tr valign="top">
                  <td height="66">&nbsp;</td>
                  <td valign="middle" align="right" class="formtext">Trainings (if any)</td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"><textarea id="training" class="bodysmallgrey" rows="3" cols="55" name="training"><?php echo $trainings; ?></textarea></td>
                </tr>
                <tr valign="top">
                  <td height="66">&nbsp;</td>
                  <td valign="top" align="right" class="formtext">Working Experience</td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"><textarea id="experience" class="bodysmallgrey" rows="3" cols="55" name="experience"><?php echo $experience; ?></textarea></td>
                </tr>
                <tr valign="top">
                  <td height="25">&nbsp;</td>
                  <td valign="middle" align="right" class="formtext">Language </td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" align="left" class="formtext">Spoken</td>
                <td valign="middle" align="left" class="formtext" colspan="2">Written</td>
                  </tr>
                <tr valign="top">
                  <td height="24">&nbsp;</td>
                  <td valign="middle" align="right" class="formtext">Hindi </td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext"><select id="hspoken" class="bodysmallgrey" size="1" name="hspoken">
                    <option selected="">-- Select--</option>
                <option value="Excellent">Excellent</option>
                <option value="Good">Good</option>
                <option value="Fair">Fair</option>
                <option value="Poor">Poor</option>
              </select> 
                  </td>
                <td valign="middle" class="formtext" colspan="2"><select id="hwritten" class="bodysmallgrey" size="1" name="hwritten">
                  <option selected="">-- Select--</option>
                  <option value="Excellent">Excellent</option>
                  <option value="Good">Good</option>
                  <option value="Fair">Fair</option>
                  <option value="Poor">Poor</option>
                </select></td>
                  </tr>
                <tr valign="top">
                  <td height="24">&nbsp;</td>
                  <td valign="middle" align="right" class="formtext">English </td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext"><select id="espoken" class="bodysmallgrey" size="1" name="espoken">
                    <option selected="">-- Select--</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Good">Good</option>
                    <option value="Fair">Fair</option>
                    <option value="Poor">Poor</option>
                  </select></td>
                <td valign="middle" class="formtext" colspan="2"><select id="ewritten" class="bodysmallgrey" size="1" name="ewritten">
                  <option selected="">-- Select--</option>
                  <option value="Excellent">Excellent</option>
                  <option value="Good">Good</option>
                  <option value="Fair">Fair</option>
                  <option value="Poor">Poor</option>
                </select></td>
                  </tr>
                <tr valign="top">
                  <td height="24">&nbsp;</td>
                  <td valign="middle" align="right" class="formtext">Arabic</td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext"><select id="aspoken" class="bodysmallgrey" size="1" name="aspoken">
                    <option selected="">-- Select--</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Good">Good</option>
                    <option value="Fair">Fair</option>
                    <option value="Poor">Poor</option>
                  </select></td>
                  <td valign="middle" class="formtext" colspan="2"><select id="awritten" class="bodysmallgrey" size="1" name="awritten">
                    <option selected="">-- Select--</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Good">Good</option>
                    <option value="Fair">Fair</option>
                    <option value="Poor">Poor</option>
                  </select></td>
                </tr>
                <tr valign="top">
                  <td height="24">&nbsp;</td>
                  <td valign="middle" align="right" class="formtext">Expected Salary</td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"><input name="salary" type="text" class="bodysmallgrey" id="salary" value="<?php echo $salary; ?>" size="40" maxlength="40"></td>
                  </tr>
                <tr valign="top">
                  <td height="24">&nbsp;</td>
                  <td valign="top" align="right" class="formtext">Extra Information </td>
                  <td style='padding-left:10px;'>&nbsp;</td>
                  <td valign="middle" class="formtext" colspan="3"><textarea class="bodysmallgrey" rows="5" cols="55" name="information"><?php echo $information; ?></textarea></td>
                </tr>
                <tr valign="top">
                
                  <td valign="top" align="right" class="formtext" colspan="5"><input type="submit" value="Apply" onclick="return validate1()" class="bodysmallgrey " name="submit_application" style="border:0; border:1px solid #808080; padding:2px 5px;"></td>
                    <td height="17"></td>
                  </tr>
              </tbody></table>
          </form> <?php } ?>
</div><div class="clear"></div>
   <script language="javascript" type="text/javascript">
<!--
function popitup(url) {
newwindow=window.open(url,'name','height=2000,width=700,resizable,scrollbars' );
if (window.focus) {newwindow.focus()}
return false;
}
// -->
</script>
