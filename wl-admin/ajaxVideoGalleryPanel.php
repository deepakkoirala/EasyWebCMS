<div align="right" style="cursor: pointer;" onclick="addVideo();">+ Add Video +</div>
<div id="uploadVideoHolder">
  <div style="width:100px; float: left;">Title : </div>
  <div style="float:left;">
    <input type="text" name="videoTitle[]" class="text" />
  </div>
  <br style="clear: both;">
  <div style="width:100px; float: left;">Link : </div>
  <div style="float:left;">
    <input type="text" name="videoUrl[]" class="text" /> <strong>[eg. http://www.youtube.com/watch?v=sC2nElyx7Ds]</strong>
  </div>
  <hr style="clear: both;">
</div>
<?php
if (isset($_GET['id']))
{
?>
<div>Existing videos</div>
<div>
  <?php
	$pagename = "cms.php?id=" . $_GET['id'] . "&parentId=" . $_GET['parentId'] . "&groupType=" . urlencode($_GET['groupType']) . "&";		

	$sql = "SELECT * FROM videos WHERE groupId = '". $_GET['id'] . "' ORDER BY id DESC";
	$limit = 6;
	include("../includes/paging.php");
	
	$videoResult = $result;
	
	//$videoResult = $videos->getByGroupId($_GET['id']);
	while ($videoRow = $conn->fetchArray($videoResult))
	{
	?>
  <div style="float: left; width: 335px; height: 180px; border: 1px solid; overflow:hidden;">
    <div align="right">
      <div style="cursor: pointer;" onclick="delete_confirmation('manage_cms.php?id=<?php echo $_GET['id']; ?>&parentId=<?php echo $_GET['parentId']; ?>&groupType=<?php echo $_GET['groupType']; ?>&videoId=<?php echo $videoRow['id']; ?>&deleteVideo');">[x]&nbsp;</div>
    </div>
    <div align="center" style="width: 100%; height: 115px;"> <img src="<?php echo getYouTubeImage($videoRow['url'], "small"); ?>"> </div>
    <div align="center">
      <input type="hidden" name="oldVideoIds[]" value="<?php echo $videoRow['id'] ?>" />
			<input type="text" name="oldTitles[]" value="<?php echo $videoRow['title'] ?>" style="width:320px;" />
      <input type="text" name="oldUrls[]" value="<?php echo $videoRow['url'] ?>" class="text" style="width:320px;" />
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