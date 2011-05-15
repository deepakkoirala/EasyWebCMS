<?php
include("init.php");
?>
<div>
  <?php
	$listResult = $listings->getById($_GET['listId']);
	$listRow = $conn->fetchArray($listResult);								
	
  if (!empty($listRow['id']))
  {
  ?>
  <input type="hidden" name="listId" value="<?php echo $listRow['id']; ?>" />
  <?php
  }
  ?>
  <span>Date : </span> <span>
  <?php
	if (empty($listRow['onDate']))
		echo date('d M Y');
	else
	{
		$dateArr = explode("-", $listRow['onDate']);
		echo date('d M Y', mktime(0,0,0, $dateArr[1], $dateArr[2], $dateArr[0]));
	}
	?>
  </span> <br class="clearboth" />
	<span style="padding-right:23px;">Page Title :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> <span>
  <input type="text" name="listPageTitle" value="<?php echo $listRow['pageTitle']; ?>" class="text" />
  </span> <br class="clearboth" />
	<span style="padding-right:1px;">Page Keyword :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> <span>
  <input type="text" name="listPageKeyword" value="<?php echo $listRow['pageKeyword']; ?>" class="text" />
  </span> <br class="clearboth" />
  <span style="padding-right:1px;">Meta Description: &nbsp; </span> <span>
 <textarea name="listMetaDescription" rows="5" cols="40"><?php echo $listRow['listMetaDescription'] ?></textarea>
  </span> <br class="clearboth" />
  <span style="padding-right:50px;"><strong>Title</strong> : </span> <span>
  <input type="text" name="listTitle" id="listTitle" tabindex="1" value="<?php echo $listRow['title']; ?>" class="text" onchange="copySame('listUrlTitle', this.value);" onchange="copySame('listUrlTitle', this.value);" />
	<br class="clearboth" />
	<span style="padding-right:25px;">Alias Title : </span> <span>
  <input type="text" name="listUrlTitle" id="listUrlTitle" tabindex="2" value="<?php echo $listRow['urltitle']; ?>" class="text" onchange="copySame('listUrlTitle', this.value);" />
  </span> <small>automated field</small><br class="clearboth" />
  <span><strong>Description</strong> : </span> <span>
  <?php
	/*require_once ("../fckeditor/fckeditor.php");
	$sBasePath="../fckeditor/";
	$oFCKeditor = new FCKeditor('listDescription');
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $listRow['description'];
	$oFCKeditor->Height		= "300";
	$oFCKeditor->ToolbarSet	= "Weblink";	
	$oFCKeditor->Create();                                   
	*/
	?>
	<textarea name="listDescription"><?php if(isset($listRow['description'])) echo $listRow['description']; ?></textarea>
  </span> <br class="clearboth" />
	<?php if(isset($_GET['listId']) && file_exists("../" . CMS_LISTINGS_DIR . $listRow['id']. "." . $listRow['ext'])){ ?>
	<span>Existing Image : </span>
	<span><img src="../<?php echo CMS_LISTINGS_DIR . $listRow['id']. "." . $listRow['ext']; ?>" width="75" /> [<a href="manage_cms.php?id=<?php echo $_GET['id']; ?>&parentId=<?php echo $_GET['parentId']; ?>&groupType=<?php echo $_GET['groupType']; ?>&listId=<?php echo $_GET['listId']; ?>&deleteImage<?php if(isset($_GET['page'])) echo '&page='. $_GET['page']; ?>">Delete</a>]</span>
	<br class="clearboth" />
	<?php } ?>
  <span><strong>Image</strong> : </span> <span>
  <input type="file" name="listImage" class="file" />
  </span> <br class="clearboth" />
	<span>Main : </span>&nbsp;&nbsp; <span>
  <select name="listMain" class="list1">
		<option value="no" selected>No</option>
		<option value="yes"<?php if($listRow['main'] == "yes") echo ' selected'; ?>>Yes</option>		
	</select>
  </span>
  <hr style="clear: both;">
  <div align="right" style="cursor: pointer;" onclick="addListFile();">+ Add Attachment +</div>
  <br>
  <style>
	.sno
	{
		float:left; width:50px;
	}
	
	.filename
	{
		float:left; width:200px; 
	}
	
	.size
	{
		float:left; width:100px;
	}
	
	.caption
	{
		float:left; width:280px;
	}
	
	.action
	{
		float:left; 
	}
	
	.strng
	{
		font-weight:bold;
	}
	</style>
  <div>
    <div class="sno strng">S.no</div>
    <div class="filename strng">Filename</div>
    <div class="size strng">Size</div>
    <div class="caption strng">Caption</div>
    <div class="action strng">Action</div>
    <br style="clear: both;">
    <?php
		$counter = 0;
		$lfResult = $listingFiles->getByListingId($_GET['listId']);
		while ($lfRow = $conn->fetchArray($lfResult))
		{
		?>
    <div class="sno"> <?php echo ++$counter;?> </div>
    <div class="filename"> <?php echo $lfRow['filename'];?> </div>
    <div class="size"> <?php echo round(filesize("../" . CMS_LISTING_FILES_DIR . $lfRow['filename'])/1024,0);?> kb</div>
    <div class="caption"> <?php echo $lfRow['caption'];?>&nbsp; </div>
    <div class="action"> <a href="#" onclick="delete_confirmation('manage_cms.php?id=<?php echo $_GET['id']; ?>&parentId=<?php echo $_GET['parentId']; ?>&groupType=<?php echo $_GET['groupType']; ?>&listId=<?php echo $_GET['listId'];?>&fileId=<?php echo $lfRow['id']; ?>&deleteFile<?php if(isset($_GET['page'])) echo '&page='. $_GET['page']; ?>')"> Delete </a> </div>
    <br style="clear: both;">
    <?php
		}
		?>
    <br style="clear: both;">
    <br style="clear: both;">
  </div>
  <div id="uploadFileHolder">
    <div style="width:100px; float: left;">File : </div>
    <div style="float:left;">
      <input type="file" name="listFile[]" class="file" />
    </div>
    <br style="clear: both;">
    <div style="width:100px; float: left;">Caption : </div>
    <div style="float:left;">
      <input type="text" name="listCaption[]" class="text" />
    </div>
    <hr style="clear: both;">
  </div>
</div>
<?php
if (isset($_GET['id']))
{
?>
<div>
  <h2>Listings</h2>
  <hr noshade="noshade" />
</div>
<div> <!-- style="height: 300px; overflow: scroll;" -->
  <table width="100%">
    <tr>
      <td valign="top">S.no</td>
      <td valign="top">Image</td>
      <td valign="top">Title</td>
      <td valign="top">Main</td>
      <td valign="top">Attachments</td>
      <td valign="top">Date</td>
      <td valign="top">Action</td>
    </tr>
    <?php
		$counter = 0;
		$pagename = "cms.php?id=" . $_GET['id'] . "&parentId=" . $_GET['parentId'] . "&groupType=" . urlencode($_GET['groupType']) . "&";		

		$sql = "SELECT * FROM listings WHERE groupId = '". $_GET['id'] . "' ORDER BY id DESC";

		include("../includes/paging.php");
		
		$listResult = $result;
		
		//$listResult = $listings->getByGroupId($_GET['id']);
		while ($listRow = $conn->fetchArray($listResult))
		{
		$counter++;
		?>
    <tr>
      <td valign="top"><?php echo $start + $counter; ?></td>
      <td  valign="top"><?php if(!empty($listRow['id']) && file_exists("../".CMS_LISTINGS_DIR . $listRow['id'].".".$listRow['ext'])){ ?>
        <img src="../data/imager.php?file=../<?php echo CMS_LISTINGS_DIR . $listRow['id'] . "." . $listRow['ext'] ?>&mw=50&mh=50&fix" border="0" />
        <?php } ?>      </td>
      <td valign="top"><?php echo $listRow['title']; ?> </td>
      <td valign="top"><?php echo ucfirst($listRow['main']); ?></td>
      <td valign="top"><?php echo $listingFiles->getTotalAttachmentsByListingId($listRow['id']); ?></td>
      <td valign="top"><?php echo $listRow['onDate']; ?></td>
      <td valign="top"><a href="cms.php?id=<?php echo $_GET['id'] ?>&parentId=<?php echo $_GET['parentId']; ?>&groupType=<?php echo $_GET['groupType']; ?>&listId=<?php echo $listRow['id'] ?><?php if(isset($_GET['page'])) echo '&page='. $_GET['page']; ?>">Edit</a> / <a href="#" onclick="delete_confirmation('manage_cms.php?id=<?php echo $_GET['id'] ?>&parentId=<?php echo $_GET['parentId']; ?>&groupType=<?php echo $_GET['groupType']; ?>&deleteListId=<?php echo $listRow['id'] ?><?php if(isset($_GET['page'])) echo '&page='. $_GET['page']; ?>');">Delete</a> </td>
    </tr>
    <tr>
      <td colspan="7" height="1px" style="border-bottom: 1px solid;"></td>
    </tr>
    <?php
		}
		?>
		<tr>
			<td colspan="7"><?php include("../includes/paging_show.php"); ?></td>
		</tr>
  </table>
</div>
<hr noshade="noshade">
<?php
}
?>
