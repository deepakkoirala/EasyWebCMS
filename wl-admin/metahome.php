<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

if(isset($_POST['id']))
	$id = $_POST['id'];
elseif(isset($_GET['id']))
	$id = $_GET['id'];


	$homePageTitle=$_POST['homePageTitle'];
	$homeMetaKeywords=$_POST['homeMetaKeywords'];
	$metaDescription=$_POST['metaDescription'];
if(isset($_POST['btn_MetaHome'])){	
	if( empty($homePageTitle) && empty($homeMetaKeywords) && empty($metaDescription)){
		
	$metahome -> save($id, $homePageTitle, $homeMetaKeywords, $metaDescription );
	header("Location: metahome.php?msg=Successfully Saved");

	}
	else
	{
	extract($_POST);
	$metahome -> update(1, $homePageTitle, $homeMetaKeywords, $metaDescription );
	header("Location: metahome.php?msg=Successfully Updated");
	exit();	
	}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ADMIN_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/cms.js"></script>
</head>

<body>
<?php
$metaResult = $metahome -> getById(1);
$metaRow = $conn -> fetchArray($metaResult);
?>
<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("leftnav.php"); ?></td>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top">
    
    <table>
    
    <?php if(!empty($err)){ ?>
											<tr>
                        <td colspan="2" class="err_msg"><?php echo $err; ?></td>
											</tr>
											<?php } ?>
    
    <form action="" method="post" >
    <tr>
    <td>Page Title</td>
    <td><input type="text" name="homePageTitle" class="text" value="<?php echo $metaRow['pageTitle']; ?>"/></td>
    </tr>
    <tr>
    <td>Meta Keywords</td>
    <td><input type="text" name="homeMetaKeywords" class="text" value="<?php echo $metaRow['pageKeyword']; ?>" /></td>
    </tr>
    <tr>
    <td>Meta Description</td>
    <td><textarea name="metaDescription"  class="text"><?php echo $metaRow['metaDescription']; ?></textarea></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="btn_MetaHome" value="Update" /></td>
    </tr>
    </form>
    </table>
    
    </td>
  </tr>
  <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>