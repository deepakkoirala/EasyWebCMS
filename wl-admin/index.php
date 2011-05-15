<?php 
include("init.php");

if(!isset($_SESSION['sessUserId'])){		//User authentication
	header("Location: login.php");
	exit();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<title><?php echo ADMIN_TITLE; ?> :: <?php echo PAGE_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="<?php echo ADMIN_PAGE_WIDTH; ?>"  border="0" align="center" cellpadding="0" cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?>
    </td>
  </tr>
  <tr>
    <td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top" align="left"><?php include("leftnav.php"); ?></td>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" align="center"><span class="hdr">Welcome to Administrative Console of <span class="welcome_body_text"><?php echo PAGE_TITLE; ?></span><br>
      You are Logged in as <span class="welcome_body_text"><?php echo $_SESSION['sessUsername']; ?></span> </span><br>
      <br>
      <br>
      <br></td>
  </tr>
  <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
