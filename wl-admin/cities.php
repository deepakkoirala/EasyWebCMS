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

$weight = 10;

if(isset($_POST['btnSave']) || isset($_POST['btnChange']))
{
	extract($_POST);
	
	if(empty($title))
		$err = "<li>Please enter City name</li>";
	
	if(empty($err))
	{
		$cities -> saveOrUpdate($id, $title, $weight);
		if($id > 0)
			$msg = "City details changed successfully";
		else
			$msg = "City details added successfully";
		
		header("Location: cities.php?msg=$msg");
		exit();
	}
}
elseif(isset($_GET['action']) && $_GET['action'] == "edit")
{
	$row = $cities -> getById($id);
	$title = $row['title'];
	$weight = $row['weight'];
}
elseif (isset($_GET['delete']))
{
	if($cities -> isDeletable($_GET['delete'])){
	$cities->delete($_GET['delete']);
	header("Location: cities.php?msg=City details deleted successfully");
	}
	else
		header("Location: cities.php?msg=City details cannot be deleted");
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ADMIN_TITLE; ?></title>
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
              <td bgcolor="#FFFFFF">
							<form name="frmCity" method="post" action="">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="heading2">Manage Cities </td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="1">
											<?php if(!empty($err)){ ?>
											<tr>
                        <td colspan="2" class="err_msg"><?php echo $err; ?></td>
											</tr>
											<?php } ?>
                      <tr>
                        <td align="right" width="30%"><strong>City</strong> :</td>
												<td align="left"><input type="text" name="title" value="<?php echo $title; ?>" class="text" /></td>
                      </tr>
											<tr>
                        <td align="right"><strong>Weight</strong> :</td>
												<td align="left"><input type="text" name="weight" value="<?php echo $weight; ?>" class="text" style="width:50px;" /></td>
                      </tr>
                      <tr>
                        <td align="right">&nbsp;</td>
                        <td align="left">
												<?php if(isset($_GET['action']) && $_GET['action'] == "edit"){ ?>
												<input type="hidden" name="id" value="<?php echo $id; ?>" />
												<input type="submit" name="btnChange" value="Change Details" class="button" />												
												<?php } else { ?>
												<input type="submit" name="btnSave" value="Save Details" class="button" />
												<?php } ?>
												</td>
                      </tr>
                    </table></td>
                  </tr>
              </table>
							</form>
							</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="5"></td>
        </tr>
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="heading2">List of Cities </td>
                    </tr>
                    <tr>
                      <td><table width="100%"  border="0" cellpadding="4" cellspacing="0">
                          <tr bgcolor="#F1F1F1">
                            <td width="1">&nbsp;</td>
                            <td><strong>SN</strong></td>
                            <td><strong>Name</strong></td>
                            <td><strong>Weight</strong></td>
                            <td width="85"><strong>Action</strong></td>
                          </tr>
													<?php
													$counter = 0;
													$pagename = "cities.php?";
													$sql = "SELECT * FROM cities ORDER BY weight ASC";
													$limit = 30;
													include("../data/paging.php");
													
													while ($row = $conn->fetchArray($result))
													{
													?>
                          <tr <?php if($counter%2 != 0) echo 'bgcolor="#F7F7F7"'; else echo 'bgcolor="#FFFFFF"'; ?>>
                            <td valign="top">&nbsp;</td>
                            <td valign="top"><?= ($start + ++$counter); ?></td>
                            <td valign="top"><?= $row['title'] ?></td>
                            <td valign="top"><?php echo $row['weight']; ?></td>
                            <td valign="top">
                            [<a href="cities.php?action=edit&id=<?php echo $row['id']; ?>&view">Edit</a>]
														<?php if($cities -> isDeletable($row['id'])){ ?>														
														[<a href="#" onClick="javascript: if(confirm('This will permanently delete City details from database. Continue?')){ document.location='cities.php?delete=<?php echo $row['id']; ?>'; }">Delete</a>]
														<?php } ?>
														</td>
                          </tr>
                          <?
													}
													?>
                        </table>
                        <?php include("../data/paging_show.php"); ?>
											</td>
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