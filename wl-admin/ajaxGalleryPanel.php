<div align="right" style="cursor: pointer;" onclick="addImage();">+ Add Image +</div>
<div id="uploadImageHolder">
  <div style="width:100px; float: left;">Image : </div>
  <div style="float:left;">
    <input type="file" name="image[]" class="file" />
  </div>
  <br style="clear: both;">
  <div style="width:100px; float: left;">Caption : </div>
  <div style="float:left;">
    <input type="text" name="imageCaption[]" class="text" />
  </div>
  <br style="clear: both;">
  <div style="width:100px; float: left;">Link : </div>
  <div style="float:left;">
    <input type="text" name="imageLink[]" class="text" />
  </div>
  <hr style="clear: both;">
</div>
<?php
if (isset($_GET['id']))
{
?>
<div>Existing Images</div>
<div>
  <?php
	$pagename = "cms.php?id=" . $_GET['id'] . "&parentId=" . $_GET['parentId'] . "&groupType=" . urlencode($_GET['groupType']) . "&";		

	$sql = "SELECT * FROM galleries WHERE groupId = '". $_GET['id'] . "'";
	$limit = 12;
	include("../includes/paging.php");
	
	$imagesResult = $result;
	
	//$imagesResult = $galleries->getByGroupId($_GET['id']);
	while ($imageRow = $conn->fetchArray($imagesResult))
	{
	?>
  <div style="float: left; width: 168px; height: auto; border: 1px solid; overflow:hidden;">
    <div align="right">
      <div style="cursor: pointer;" onclick="delete_confirmation('manage_cms.php?id=<?php echo $_GET['id']; ?>&parentId=<?php echo $_GET['parentId']; ?>&groupType=<?php echo $_GET['groupType']; ?>&imageId=<?php echo $imageRow['id']; ?>&deleteImage');">[x]&nbsp;</div>
    </div>
    <div align="center" style="width: 100%; height: 130px;"> <img src="../data/imager.php?file=../<?php echo CMS_IMAGES_DIR . $imageRow['id'] . "." .$imageRow['ext'] ?>&mw=120&mh=120&fix"> </div>
    <div align="center">
      <input type="hidden" name="oldCaptionIds[]" value="<?php echo $imageRow['id'] ?>" />
      <input type="text" name="oldCaptions[]" value="<?php echo $imageRow['caption'] ?>" class="text" style="width:155px;" />
      <input type="text" name="oldImageLink[]" value="<?php echo $imageRow['imageLink'] ?>" class="text" style="width:155px;" />
    </div>
  </div>
  <?php
	}
	include("../includes/paging_show.php");
	?>
</div>
<?php
}
?>
