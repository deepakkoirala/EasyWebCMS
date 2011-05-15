<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

if(isset($_POST['btnSubmit']))
{
 $errMsg = "";
 $opsw = trim($_POST['old_psw']);
 $npsw = trim($_POST['new_psw']);
 $cnpsw = trim($_POST['conf_new_psw']);

 if(empty($opsw))
 {
  $errMsg .= "<li>Please, supply your old password</li>";
 }
 elseif(isset($_SESSION['sessUsername']))
 {
  if(!$users -> validatePassword($_SESSION['sessUserId'],$opsw))
  {
   $errMsg .= "<li>Please, supply your valid old password</li>";
  }
 }
 if(empty($npsw))
 {
  $errMsg .= "<li>Please, supply your new password</li>";
 }
 if(empty($cnpsw))
 {
  $errMsg .= "<li>Please, confirm your new password</li>";
 }
 if($npsw != $cnpsw)
 {
  $errMsg .= "<li>Please, supply matching confirm password</li>";
 }
 if(isset($_SESSION['sessUsername']))
 {
  if(empty($errMsg))
  {
   $chPsw = $users -> updatePassword($_SESSION['sessUserId'],$npsw);
   if($chPsw)
   {
    header("Location: changepswd.php?msg=Password updated successfully");
		exit();
   }
  }
 }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ADMIN_TITLE; ?> :: <?php echo PAGE_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("leftnav.php"); ?></td>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="heading2">&nbsp;Change Password</td>
                          </tr>
                          <tr>
                            <td align="center"><form name="form1" method="post" action="">
                                <table border="0" width="100%" cellpadding="2" cellspacing="0" class="tahomabold11">
                                  <?php if(!empty($errMsg)){ ?>
                                  <tr align="left">
                                    <td colspan="2" class="err_msg"><?php echo $errMsg; ?></td>
                                  </tr>
                                  <?php } ?>
                                  <tr>
                                    <td width="36%" align="left" valign="top"><div align="right">Enter Old Password :</div></td>
                                    <td width="64%" valign="top"><div align="left">
                                        <input name="old_psw" type="password" class="text">
                                      </div></td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="top"><div align="right">Enter New Password :</div></td>
                                    <td valign="top"><div align="left">
                                        <input name="new_psw" type="password" class="text">
                                      </div></td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="top"><div align="right">Confirm New Password :</div></td>
                                    <td valign="top"><div align="left">
                                        <input name="conf_new_psw" type="password" class="text">
                                      </div></td>
                                  </tr>
                                  <tr>
                                    <td valign="top">&nbsp;</td>
                                    <td valign="top" align="left"><div align="left">
                                        <input name="btnSubmit" type="submit" class="button" value="Change">
                                      </div></td>
                                  </tr>
                                </table>
                              </form></td>
                          </tr>
                          <tr>
                            <td align="center">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
