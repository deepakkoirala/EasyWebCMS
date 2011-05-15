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
		$err = "<li>Please enter Hotel name</li>";
	if(empty($urltitle))
		$err = "<li>Please enter Alias Name</li>";

	if(empty($err))
	{
		if($hotels -> isUnique($id, $urltitle))
		{
			$hotels -> saveOrUpdate($id, $cityId, $title, $urltitle, $category, $singleRoomRent, $doubleRoomRent, $details, $weight);
			if($id > 0)
				$msg = "Hotel details changed successfully";
			else
				$msg = "Hotel details added successfully";
			
			header("Location: hotels.php?msg=$msg");
			exit();
		}
		else
			$err = "<li>Alias Name must be unique</li>";		
	}
}
elseif(isset($_GET['action']) && $_GET['action'] == "edit")
{
	$row = $hotels -> getById($id);
	
	$cityId = $row['cityId'];
	$title = $row['title'];	
	$urltitle = $row['urltitle']; 
	$category = $row['category'];
	$singleRoomRent = $row['singleRoomRent'];
	$doubleRoomRent = $row['doubleRoomRent'];
	$details = $row['details'];
	$weight = $row['weight'];
}
elseif (isset($_GET['delete']))
{
	$hotels->delete($_GET['delete']);
	header("Location: hotels.php?msg=Hotel details deleted successfully");
	exit();
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
                    <td class="heading2">Manage Hotels </td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
											<?php if(!empty($err)){ ?>
											<tr>
                        <td colspan="2" class="err_msg"><?php echo $err; ?></td>
											</tr>
											<?php } ?>
                      <tr>
                        <td align="right" width="15%"><strong>City : </strong></td>
												<td align="left">
												<select name="cityId" class="list1">
												<?php 
												$result = $cities -> getAll();
												while($row = $conn -> fetchArray($result))
												{
												?>
													<option value="<?php echo $row['id']; ?>"<?php if($cityId == $row['id']) echo " selected"; ?>><?php echo $row['title']; ?></option>
												<?php
												}
												?>
												</select>												</td>
                      </tr>
											<tr>
											  <td align="right"><strong>Hotel : </strong></td>
											  <td align="left"><input type="text" name="title" value="<?php echo $title; ?>" class="text" onchange="copySame('aliasname', this.value);" /></td>
											  </tr>
											<tr>
											  <td align="right"><strong>Alias Name :</strong> </td>
											  <td align="left"><input type="text" name="urltitle" value="<?php echo $urltitle; ?>" id="aliasname" class="text" onchange="copySame('aliasname', this.value);" /></td>
											  </tr>
											<tr>
											  <td align="right"><strong>Category : </strong></td>
											  <td align="left">
												<select name="category" class="list1">
													<?php foreach($stars as $val){ ?>
													<option value="<?php echo $val; ?>"<?php if($val == $category) echo " selected"; ?>><?php echo $val; ?></option>											
													<?php } ?>
												</select>												</td>
											</tr>
											<tr>
											  <td align="right"><strong>Room Rent : </strong></td>
											  <td align="left">
												Single <input type="text" name="singleRoomRent" class="text" style="width:100px;" value="<?php echo $singleRoomRent; ?>" />&nbsp;
												Double <input type="text" name="doubleRoomRent" class="text" style="width:100px;" value="<?php echo $doubleRoomRent; ?>" />												</td>
										  </tr>
											<tr>
											  <td align="right"><strong>Details :</strong> </td>
											  <td align="left">
												<?php
												include ("../fckeditor/fckeditor.php");
												$sBasePath="../fckeditor/";
												
												$oFCKeditor = new FCKeditor('details');
												$oFCKeditor->BasePath	= $sBasePath ;
												$oFCKeditor->Value		= $details;
												$oFCKeditor->Height		= "205";
												$oFCKeditor->ToolbarSet	= "Rupens";	
												$oFCKeditor->Create();
												?>												</td>
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
												<input type="button" name="btnCancel" value="Cancel" class="button" onclick="location.href='hotels.php';" />
												<?php } else { ?>
												<input type="submit" name="btnSave" value="Save Details" class="button" />
												<?php } ?>												</td>
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
                      <td class="heading2">List of Hotels </td>
                    </tr>
                    <tr>
                      <td><table width="100%"  border="0" cellpadding="4" cellspacing="0">
                          <tr bgcolor="#F1F1F1">
                            <td width="1">&nbsp;</td>
                            <td><strong>SN</strong></td>
                            <td><strong>Name</strong></td>
                            <td><strong>City</strong></td>
                            <td><strong>Category</strong></td>
                            <td><strong>Weight</strong></td>
                            <td width="85"><strong>Action</strong></td>
                          </tr>
													<?php
													$counter = 0;
													$pagename = "cities.php?";
													$sql = "SELECT * FROM hotels ORDER BY weight ASC";
													$limit = 30;
													include("../data/paging.php");
													
													while ($row = $conn->fetchArray($result))
													{
													?>
                          <tr <?php if($counter%2 != 0) echo 'bgcolor="#F7F7F7"'; else echo 'bgcolor="#FFFFFF"'; ?>>
                            <td valign="top">&nbsp;</td>
                            <td valign="top"><?= ($start + ++$counter); ?></td>
                            <td valign="top"><?= $row['title'] ?></td>
                            <td valign="top"><?php echo $cities -> getCity($row['cityId']); ?></td>
                            <td valign="top"><?php echo $row['category']; ?></td>
                            <td valign="top"><?php echo $row['weight']; ?></td>
                            <td valign="top">
                            [<a href="hotels.php?action=edit&id=<?php echo $row['id']; ?>&view">Edit</a>]
														[<a href="#" onClick="javascript: if(confirm('This will permanently delete Hotel details from database. Continue?')){ document.location='hotels.php?delete=<?php echo $row['id']; ?>'; }">Delete</a>]
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