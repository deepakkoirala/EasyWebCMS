<script language="javascript">
function validateform(fm){
	if(fm.FullName.value == ""){
		alert("Please type your Name.");
		fm.FullName.focus();
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
	if(fm.FFullName.value == ""){
		alert("Please type your Friend's Name.");
		fm.FFullName.focus();
		return false;
	}	
	var goodEmail = fm.Femail.value.match(/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\..{2,3}))$)\b/gi);		
	if(fm.Femail.value == ""){
		alert("Please type your Friend's E-mail.");
		fm.Femail.focus();
		return false;
	}
	if (!goodEmail) {
		alert("The Email address you entered is invalid please try again!")
		fm.Femail.focus()
		return (false);
	}	
}
</script>
<div style="clear:both"></div>
<?php include("innerleft.php"); ?>
<div class="rbox">
<div id="contentsPage"> 
  <div class="intro_header" style="padding-left:0;">Tell a friend about Package</div>
  <div>
  <?php
  if(isset($_GET['id']))
  {
  $id = $_GET['id'];
  $result = $groups -> getById($id);
  $row = $conn -> fetchArray($result);
  }
  ?>
  <?php
  if(isset($_SESSION['refermsg']))
  {
  	echo "<div class='err'>" . $_SESSION['refermsg']. "</div>";
	session_unset("refermsg");
  }
  ?>
  <form name="contactform" id="contactform" method="post" action="refer/<?php echo $row['urlname']; ?>.html" onsubmit="return validateform(this);">
  <br/>
  <div>
    <div>
      <label> <span style="padding-right:100px;">Your Name</span> 
        <input type="text" name="FullName" size="25" />
      </label>
    </div>
    <div>
      <label> <span style="padding-right:101px;">Your Email</span> 
        <input type="text" name="email" size="25"/>
      </label>
    </div>
    <!--select list begins -->
    <div>
      <label> <span style="padding-right:82px;">Friend's Name</span>
        <input type="text" name="FFullName" size="25" />
      </label>
    </div>
    <!-- select list ends -->
    <div>
      <label> <span style="padding-right:83px;">Friend's Email</span></label>
      <input type="text" name="Femail" size="25"/>
      </div>
    <div style="padding-left:167px;">
      <input type="submit" value="&nbsp;Send&nbsp;" name="btnRefer" size="25" style="border:0 cursor:pointer;"/>
    </div>
  </div>
</form>
  </div>
</div>
</div>





