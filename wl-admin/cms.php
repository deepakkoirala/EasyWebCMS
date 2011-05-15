<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

$showSaveForm = false;
$showListing = false;

if (isset($_GET['id']))
{
	$groupResult = $groups->getById($_GET['id']);
	$groupRow = $conn->fetchArray($groupResult);

	$selectedGroupType = $groupRow['type'];

	$showSaveForm = true;
	$showListing = true;
}
if (isset($_GET['groupType']))
{
	$selectedGroupType = $_GET['groupType'];
	$showSaveForm = true;
	$showListing = true;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<title><?php echo ADMIN_TITLE; ?> :: <?php echo PAGE_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<script language="javascript" src="../js/cms.js"></script>
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
                      <td valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                          <tr>
                            <td class="heading2">
                              <div style="float: right;">
                                <?php
																$addLink = "cms.php";
																$formLink = "manage_cms.php";
																
																if (isset($_GET['groupType']))
																{
																 $addLink .= "?groupType=" . $_GET['groupType'];
																 $formLink .= "?groupType=" . $_GET['groupType'];
																}
																if (isset($_GET['parentId']))
																{
																 $addLink .= "&parentId=" . $_GET['parentId'];
																 $formLink .= "&parentId=" . $_GET['parentId'];
																}
																if(isset($_GET['page']))
																{
																	$addLink .= "&page=" . $_GET['page'];
																 	$formLink .= "&page=" . $_GET['page'];
																} 
																?>
                                <a href="<?php echo $addLink ?>" class="headLink"> Add New </a> </div>
																&nbsp;Manage Contents</td>
                          </tr>
                          <tr>
                            <td><?php
															if (isset($_GET['msg']))
															{
															 //echo $msg;
															}
															?>
                              <form action="cms.php" method="get">
                                <table border="0" width="100%" cellpadding="2" cellspacing="0">
                                  <tr>
                                    <td width="90"><strong>Type : </strong></td>
                                    <td><select name="groupType" onchange="changeType(this);" class="list1">
                                        <option value="select">Select Type</option>
                                        <?php
																				foreach($groupTypesArray as $grp)
																				{
																				 ?>
                                        <option value="<?php echo $grp ?>"
																				<?php
																				if ($showSaveForm && $grp == $selectedGroupType)
																				{
																					echo "selected ";
																				}
																				?>><?php echo $grp ?></option>
                                        <?php
																				}
																				?>
                                    </select></td>
                                  </tr>
                                </table>
                              </form></td>
                          </tr>
                          <?php
													if ($showSaveForm)
													{
													 ?>
                          <tr>
                            <td><form action="<?php echo $formLink; ?>" method="post" enctype="multipart/form-data">
                                <?php
																if (isset($_GET['id']))
																{
																?>
                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                <?php
																}
																?>
                                <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                  <?php
																	if (isset($_GET['id']))
																	{
																	?>
                                  <tr>
                                    <td><strong>Created On : </strong></td>
                                    <td>
																		<?php
																		$arr = explode("-", $groupRow['onDate']);
																		echo date("M d, Y", mktime(0, 0, 0, $arr[1], $arr[2], $arr[0]));
																		?>																		</td>
                                  </tr>
                                  <?php
																	}
																	?>
                                  <tr>
                                    <td width="90"><strong>Name : </strong></td>
                                    <td><input type="text" name="name" value="<?php echo $groupRow['name']; ?>" class="text" onchange="copySame('urlname', this.value);"></td>
                                  </tr>
																	<tr>
                                    <td><strong>Alias Name :</strong> </td>
                                    <td><input type="text" name="urlname" id="urlname" value="<?php echo $groupRow['urlname']; ?>" class="text" onchange="copySame('urlname', this.value);"></td>
                                  </tr>
                                  
                                    <td><strong>Content Type : </strong></td>
                                    <td id="contType"><?php
																			if (!isset($_GET['id']))
																			{
																			?>
                                      <select name="linkType" onchange="changeLinkType(this);" class="list1">
                                        <option value="select">Select</option>
                                        <?php
																				foreach ($linkTypesArray as $lta)
																				{
																				 ?>
                                        <option value="<?php echo $lta; ?>"
 																				<?php
																				if ($lta == $groupRow['linkType']) { echo "selected"; }
																				?>> <?php echo $lta; ?> </option>
                                        <?php
																				}
																				?>
                                      </select>
                                      <?php
																			}
																			else
																			{
																				echo $groupRow['linkType'];
																			?>
                                      <input type="hidden" name="linkType" value="<?php echo $groupRow['linkType'] ?>" />
                                      <?php
																			}
																			?>                                    </td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td>
																			<div id="contentsLabel">
																			<?php
																			if ($groupRow['linkType'] == "File")
																			 echo $groupRow['contents'];
																			if ($groupRow['linkType'] == "Link")
																			 echo "Page name / URL";
																			?>
																			</div>
                                      <?php
																			$directLink = "";
																			if ($groupRow['linkType'] == "Link")
																			 $directLink = $groupRow['contents'];
																			?>
                                      <input type="text" name="directLink" value="<?php echo $directLink ?>"
																			<?php if ($groupRow['linkType'] != "Link")
																			{ echo "disabled=\"disabled\""; echo "style=\"display:none;\""; }
																			?>
																			id = "directLink" class="text">
                                      <input type="file" name="uploadFile"
																			<?php
																			if ($groupRow['linkType'] != "File")
																			{
																				echo "disabled=\"disabled\" ";
																				echo "style=\"display:none;\"";
																			}
																			?>
																			id="uploadFile" class="file">
                                      <div id="fckEditor" class="groupBox"
																				<?php
																				if ($groupRow['linkType'] != "Contents Page")
																				{
																					echo "style=\"display:none;\"";
																				}
																				?>
																				>
                                        <?php
																				
																				if (isset($_GET['id']) && $groupRow['linkType'] == "Contents Page"){
																					
																					if(in_array(isset($_GET['parentId']),$innerIds)){
																					include("ajaxContentsPanel_three.php");	
																					}else{
																					include("ajaxContentsPanel.php");
																					}
																					//include("ajaxGalleryPanel.php");
																					
																				}                                
																				?>
                                      </div>
                                      <?php
																			$galleryTitle = "";
																			if ($groupRow['linkType'] == "Gallery")
																			 $galleryTitle = $groupRow['contents'];
																			?>																			
                                      <div id="galleryDiv" class="groupBox"
																				<?php
																				if ($groupRow['linkType'] != "Gallery")
																				{
																					echo "style=\"display:none;\"";
																				}
																				?>
																				>
                                        <?php
																				if (isset($_GET['id']) && $groupRow['linkType'] == "Gallery")
																				{
																					include("ajaxGalleryPanel.php");
																				}
																				?>
                                      </div>
                                      <div id="listDiv" class="groupBox"
																				<?php
																				if ($groupRow['linkType'] != "List")
																				{
																					echo "style=\"display:none;\"";
																				}
																				?>>
                                        <?php
																				if (isset($_GET['id']) && $groupRow['linkType'] == "List")
																				{
																					include("ajaxListingPanel.php");
																				}
																				?>
                                      </div>
                                      <div id="normalGroupDiv" class="groupBox"
																				<?php
																				if ($groupRow['linkType'] != "Normal Group")
																				{
																					echo "style=\"display:none;\"";
																				}
																				?>
																				>
                                        <?php
																				if (isset($_GET['id']) && $groupRow['linkType'] == "Normal Group")
																				{
																					include("ajaxNormalGroup.php");
																				}                                
																				?>
                                      </div>
																			<?php
																			$videoGalleryTitle = "";
																			if ($groupRow['linkType'] == "Video Gallery")
																			 $videoGalleryTitle = $groupRow['contents'];
																			?>																			
                                      <div id="videoGalleryDiv" class="groupBox"
																				<?php
																				if ($groupRow['linkType'] != "Video Gallery")
																				{
																					echo "style=\"display:none;\"";
																				}
																				?>
																				>
                                        <?php
																				if (isset($_GET['id']) && $groupRow['linkType'] == "Video Gallery")
																				{
																					include("ajaxVideoGalleryPanel.php");
																				}
																				?>
                                      </div>
																			</td>
                                  </tr>
                                  <tr>
                                    <td><strong>Parent : </strong></td>
                                    <td><select name="parentId" id="parentIds" class="list1">
                                        <option value="0">Select Parent</option>
                                        <?php
																				$makeThisSelected = $_GET['parentId'];
																				if (isset($groupRow['parentId']))
																				 $makeThisSelected = $groupRow['parentId'];
																				$groups->comboRecursion($selectedGroupType, $makeThisSelected, 0);
																				?>
                                      </select></td>
                                  </tr>
                                  <tr>
                                    <td><strong>Weight : </strong></td>
                                    <?php
																		if (!isset($groupRow['weight']))
																		{
																			if(!empty($_GET['parentId']))
																				$parentId = $_GET['parentId'];
																			else
																				$parentId = 0;
																			$groupRow['weight'] = $groups -> getLastWeight($_GET['groupType'], $parentId);
																			// $groupRow['weight'] = 50;
																		} ?>
                                    <td><input type="text" value="<?php echo $groupRow['weight'] ?>" name="weight" class="text" style="width:25px;"></td>
                                  </tr>
                                  <?php if(!empty($groupRow['ext']) && file_exists("../". CMS_GROUPS_DIR .$groupRow['id'].".".$groupRow['ext'])){ ?>
                                  <tr>
                                    <td align="left"><strong>Existing Image : </strong></td>
                                    <td><img src="../<?php echo CMS_GROUPS_DIR . $groupRow['id']. "." . $groupRow['ext']; ?>" width="100" border="0" /> [<a href="manage_cms.php?id=<?php echo $_GET['id']; ?>&parentId=<?php echo $_GET['parentId']; ?>&groupType=<?php echo $_GET['groupType']; ?>&deleteImage<?php if(isset($_GET['page'])) echo '&page='. $_GET['page']; ?>">Delete</a>]</td>
                                  </tr>
                                  <?php } ?>
                                  <tr>
                                    <td><div id="ImageLabel"
																				<?php /*if($groupRow['linkType'] != "Normal Group" && $groupRow['linkType'] != "Contents Page"){ 
																					echo 'style="display: none;"';
																				}*/
																				?>
																				><strong> Image : </strong></div></td>
                                    <td><div id="grpImage"
																				<?php /*if($groupRow['linkType'] != "Normal Group" && $groupRow['linkType'] != "Contents Page"){
																				echo 'style="display: none;"';
																				}*/
																				?>
																				>
                                        <input type="file" name="groupImage">
                                      </div></td>
                                  </tr>
                                  <tr>
                                    <td><strong>Hide in Front : </strong></td>
                                    <td>
																			<input type="radio" name="hide" value="yes" <?php if($groupRow['hide'] == 'yes') echo "checked"; ?> class="chk"> Yes
																			<input type="radio" name="hide" value="no"  <?php if($groupRow['hide'] == 'no' || !isset($groupRow['hide'])) echo "checked"; ?> class="chk"> No																		</td>
                                  </tr>
																	<tr>
																		<td colspan="2">
																		<div id="pageDetails"
																		<?php if (!isset($_GET['id']) || $groupRow['linkType'] == "Link" || $groupRow['linkType'] == "File")
																			echo ' style="display:none;"';
																		?>>
																		<table width="100%" border="0" cellspacing="0" cellpadding="1">
																			<tr>
																				<td colspan="2"><strong style="text-decoration:underline;" class="heading1">Meta Informations</strong></td>
																			</tr>
																			<tr>
																				<td width="90"><strong>Page Title : </strong></td>
																				<td><input type="text" name="pageTitle" value="<?php echo $groupRow['pageTitle']; ?>" class="text"></td>
																			</tr>
																			<tr>
																				<td><strong>Page Keyword  : </strong></td>
																				<td><input type="text" name="pageKeyword" value="<?php echo $groupRow['pageKeyword']; ?>" class="text"></td>
																			</tr>
                                                                            <tr>
																				<td><strong>Meta Description : </strong></td>
																				<td><input type="text" name="metaDescription" value="<?php echo $groupRow['metaDescription']; ?>" class="text"></td>
																			</tr>
																		</table>
																		</div>																		</td>
																	</tr>
                                  <tr>
                                    <td></td>
                                    <td><input type="submit" value="Save" name="save" class="button" id="button"></td>
                                  </tr>
                                </table>
                              </form></td>
                          </tr>
                          <?php
													}
													if ($showListing)
													{
													 ?>
                          <?php
													}
													?>
                        </table></td>
                    </tr>
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
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td valign="top"><?php
											$pagename = "cms.php";
											$withEdit = true;
											$withDelete = true;
											$withOpen = true;
											//selectedGroupType will be used inside groupListing.php
											$parentId = 0;
											if (isset($_GET['parentId']))
											$parentId = $_GET['parentId'];
											include("grouplisting.php");
											?>
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
<script type="text/ecmascript" src="../js/jquery.js"></script>
<script src="../ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../ckeditor/ckfinder/ckfinder.js"></script>

<script type="text/javascript">	
	<?php if(isset($_GET['id'])){?>
	<?php if($groupRow['linkType'] == "Contents Page" || $groupRow['linkType'] == "Normal Group"){ ?>
	CKEDITOR.replace( 'shortcontents' );
	CKEDITOR.replace( 'contents' );
	<?php }
	 else if($groupRow['linkType'] == "Link"){ ?>
	CKEDITOR.replace( 'shortcontents' );
	<?php }  
	
	else if($groupRow['linkType'] == "List"){ ?>
	CKEDITOR.replace( 'listDescription' );	
	<?php } ?>
	<?php } ?>
	//CKFinder.setupCKEditor( null, '../ckeditor/ckfinder/' ) ;
</script>
</body>
</html>
