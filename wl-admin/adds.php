<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

if(isset($_POST['position']))
	$position = $_POST['position'];
elseif(isset($_GET['position']))
	$position = $_GET['position'];
else
	$position = "";

if(isset($_POST['id']))
	$id = $_POST['id'];
elseif(isset($_GET['id']))
	$id = $_GET['id'];
else
	$id = 0;

if(isset($_POST['btnAdd']) || isset($_POST['btnEdit']))
{
	$title = $_POST['title'];
	$add = $_FILES['add']['name'];
	$url = $_POST['url'];
	$adcode = $_POST['adcode'];
	$indexing = $_POST['indexing'];
	$type = $_POST['type'];
	
	if(empty($position))
		$catErr = "<li>Please select add position</li>";

	$row = $adds -> getById($id);
	if(!empty($add))
	{
		if($type == "image")
		{
			$ft = $_FILES['add']['type'];					
			if($ft=="image/jpeg" || $ft=="image/pjpeg" || $ft=="image/jpg" || $ft == "image/png" || $ft == "image/gif")
			{
				if($_FILES['add']['size']<=(1024*1024))
				{
					if(isset($_POST['btnEdit']))
						@unlink("../". CMS_ADDS_DIR. $row['filename']);
														
					$filename = str_replace(" ", "_", $add);
	
					copy($_FILES['add']['tmp_name'], "../" . CMS_ADDS_DIR . $filename);
				}
				else
				{
					$catErr = "<li>Image size exceeds 1MB</li>";
				}
			}
			else
			{						
				$catErr = "<li>Recommended file format is jpeg, gif or png</li>";
			}		
		}
		elseif($type == "flash")
		{
			$filename = str_replace(" ", "_", $add);
			
			if($_POST['btnEdit'])
				@unlink("../".CMS_ADDS_DIR.$row['filename']);
			
			copy($_FILES['add']['tmp_name'], "../". CMS_ADDS_DIR . $filename);
		}
	}
	else
	{
		if(isset($_POST['btnEdit']))
			$filename = $row['filename'];
	}
	
	if(empty($catErr))
	{
		$adds -> saveOrUpdate($id, $title, $filename, $url, $adcode, $indexing, $type, $position);
		
		if(isset($_POST['btnEdit']))
			$msg = "Add details updated successfully";
		else
			$msg = "Add details added successfully";
			
		header("Location: adds.php?position=$position&msg=$msg");
		exit();
	}
}

if($_GET['mode'] == "edit")
{
	$row = $adds -> getById($id);
	$title = $row['title'];
	$filename = $row['filename'];
	$url = $row['url'];
	$adcode = $row['adcode'];
	$indexing = $row['indexing'];	
	$type = $row['type'];
	$position = $row['position'];
}

if($_GET['mode'] == "del")
{
	$row = $adds -> getById($id);
	$adds -> delete($id);
	
	header("Location: adds.php?position=$position&msg=Add details deleted successfully");
	exit();
}

if(isset($_POST['btnIndex']))
{
	for($i=0;$i<count($_POST['id']); $i++)
	{
		$adds -> updateIndexing($_POST['id'][$i],$_POST['indexing'][$i]);
	}
	
	header("Location: adds.php?position=$position&msg=Add details indexed successfully");
	exit();
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo ADMIN_TITLE; ?> :: <?php echo PAGE_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<script src="../Scripts/swfobject_modified.js" type="text/javascript"></script>
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
                <td bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="2">
                    <form action="adds.php" method="post" enctype="multipart/form-data" name="frmAdd" id="frmAdd">
                      <tr>
                        <td class="heading2">&nbsp;Manage Adds</td>
                      </tr>
                      <tr>
                        <td align="left"><table width="100%"  border="0" cellpadding="2" cellspacing="0">
                            <?php if(!empty($catErr)){ ?>
                            <tr>
                              <td colspan="2" align="left" class="err_msg"><?php echo $catErr; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td align="right"><strong>Position :</strong></td>
                              <td align="left">
                              <select name="position" class="list1"<?php if($mode!="edit"){?> onchange="this.form.submit()<?php }?>">
                                  <option value="">Select Position</option>
																	<option value="header" <?php if($position == "header") echo " selected"; ?>>Header [W = 468, H = 60]</option>
                                  <option value="adsensetop" <?php if($position == "adsensetop") echo " selected"; ?>>Adsense Top</option>
																	<option value="search" <?php if($position == "search") echo " selected"; ?>>Adsense Search</option>
                                  <option value="middle"<?php if($position == "middle") echo " selected"; ?>>Middle [W = 270, H = 156]</option>
																	<option value="right"<?php if($position == "right") echo " selected"; ?>>Right [Width = 300]</option>
																	<option value="bottom"<?php if($position == "bottom") echo " selected"; ?>>Bottom [W = 468, H = 60]</option>
                                </select>
                                &nbsp;&nbsp;&nbsp;<a href="adds.php">+Add New Ad+</a></td>
                            </tr>
														<tr>
                              <td align="right"><strong>Title : </strong></td>
                              <td align="left"><input type="text" name="title" value="<?php echo $row['title']; ?>" class="text" /></td>
                            </tr>
                            <?php if(file_exists("../" . CMS_ADDS_DIR . $filename) && !empty($filename)){ ?>
                            <tr> 
                              <td align="right"><strong>Existing File :</strong></td>
                              <td align="left">
                              <?php if($type == "image"){ ?>
                              <img src="../<?php echo CMS_ADDS_DIR . $filename; ?>" width="100" alt="" border="0" />
                              <?php } elseif($type == "flash") {
															$arr = getimagesize("../". CMS_ADDS_DIR. $filename);
															$width = $arr[0];
															$height = $arr[1];
															$nwidth = 100;
															$nheight = ceil($height/$width * 100);
															?>
															<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<?php echo $nwidth; ?>" height="<?php echo $nheight; ?>">
																<param name="movie" value="<?php echo "../". CMS_ADDS_DIR . $filename; ?>" />
																<param name="quality" value="high" />
																<param name="wmode" value="opaque" />
																<param name="swfversion" value="6.0.65.0" />
																<!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
																<param name="expressinstall" value="../Scripts/expressInstall.swf" />
																<!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
																<!--[if !IE]>-->
																<object type="application/x-shockwave-flash" data="<?php echo "../". CMS_ADDS_DIR . $filename; ?>" width="<?php echo $nwidth; ?>" height="<?php echo $nheight; ?>">
																	<!--<![endif]-->
																	<param name="quality" value="high" />
																	<param name="wmode" value="opaque" />
																	<param name="swfversion" value="6.0.65.0" />
																	<param name="expressinstall" value="../Scripts/expressInstall.swf" />
																	<!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
																	<div>
																		<h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
																		<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
																	</div>
																	<!--[if !IE]>-->
																</object>
																<!--<![endif]-->
															</object>                              
                              <?php } ?>
                              </td>
                            </tr>
                            <?php } ?>                           
                            <tr>
                              <td width="24%" align="right"><strong>File :</strong></td>
                              <td width="76%" align="left"><input type="file" name="add" class="file" /></td>
                            </tr>
                            <tr>
                              <td align="right"><strong>URL :</strong></td>
                              <td align="left"><input type="text" name="url" value="<?php echo $url; ?>" class="text" />
                                <strong>[eg. http://www.url.com]</strong></td>
                            </tr>                            
                            <tr>
                              <td align="right"><strong>Adsense Code :</strong></td>
                              <td align="left"><textarea name="adcode" id="adcode" cols="80" rows="5"><?php echo $adcode; ?></textarea></td>
                            </tr>
                            <tr>
                              <td align="right"><strong>Indexing :</strong></td>
                              <td align="left"><input type="text" name="indexing" class="text" style="width:25px;" value="<?php echo $indexing; ?>" /></td>
                            </tr>
                            <tr>
                              <td align="right"><strong> Type :</strong></td>
                              <td align="left">
                              <select name="type" class="list1">
                              	<option value="image">Image</option>
                                <?php /*<option value="flash"<?php if($type == "flash") echo ' selected'; ?>>Flash</option>*/ ?>
                                <option value="script"<?php if($type == "script") echo ' selected'; ?>>Script</option>
                              </select>
                              </td>
                            </tr>
	                          <tr>
                              <td>&nbsp;</td>
                              <td align="left"><?php if($_GET['mode'] == "edit"){ ?>
                                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                <input class="button" type="submit" value="Save Changes" name="btnEdit" />
                                <input class="button" type="button" value="Cancel" name="btnCancel" onclick="javascript:document.location.href='adds.php?position=<?php echo $position; ?>'" />
                                <?php } else { ?>
                                <input class="button" type="submit" value="Save Details" name="btnAdd" />
                                <?php } ?></td>
                            </tr>
                          </table></td>
                      </tr>
                    </form>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="5"></td>
        </tr>
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF">
                  <form name="frmAdd" method="post" action="">
				  <input type="hidden" name="position" value="<?php echo $position; ?>" />
                  <table width="100%"  border="0" cellpadding="3" cellspacing="0">
                    <tr bgcolor="#F4F4F4">
                      <td colspan="5" class="heading2">&nbsp;List of Adds</td>
                    </tr>
                    <tr bgcolor="#F4F4F4">
                      <td width="40"><strong>SN</strong></td>
                      <td><strong>Image</strong></td>
                      <td><strong>Title</strong></td>
                      <td width="80"><strong>Indexing</strong></td>
                      <td width="70"><strong>Action</strong></td>
                    </tr>
                    <?php
										$i = 1;
										$result = $adds -> getByPosition($position);
										while ($row = $conn -> fetchArray($result))
										{
										?>
                    <tr <?php if($i%2 == 0){ ?> bgcolor="#F7F7F7" <?php } ?>>
                      <td valign="top"><input type="hidden" name="id[]" value="<?php echo $row['id']; ?>" /><?php echo $i; ?></td>
                      <td valign="top">
											<?php if(file_exists("../" . CMS_ADDS_DIR . $row['filename']) && !empty($row['filename'])){ ?>
											<img src="../<?php echo CMS_ADDS_DIR . $row['filename']; ?>" width="75" />
											<?php } ?>
											</td>
                      <td valign="top"><?php echo $row['title']; ?></td>
                      <td valign="top"><input type="text" name="indexing[]" value="<?php echo $row['indexing']; ?>" style="width:25px" /></td>
                      <td valign="top">
                      [<a href="adds.php?mode=edit&amp;id=<?php echo $row['id'] ?>">Edit</a>]
                      [<a href="#" onclick="javascript: if(confirm('This will permanently delete Add details from database. Continue?')){ document.location='adds.php?position=<?php echo $row['position']; ?>&mode=del&amp;id=<?php echo $row['id']; ?>'; }">Delete</a>] </td>
                    </tr>
                    <?php
											$i++;
										}
										?>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5" bgcolor="#F7F7F7" align="center"><input type="submit" name="btnIndex" value="Save Indexing" class="button" /></td>
                    </tr>
                  </table>
                  </form>
                </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID2");
</script>
</body>
</html>
