<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

function saveImages($xid, $files, $captionList,$imageLink)
{
 global $galleries;
 for ($i=0; $i<count($files['image']['name']); $i++)
 {
  if(isset($files['image']['tmp_name'][$i]) && $files['image']['size'][$i] <= (1024*1024))
  {
   $ft = $files['image']['type'][$i];
   if($ft == "image/jpeg" || $ft == "image/jpg" || $ft == "image/pjpeg")
   {
    $ext = "jpg";
   }
   else if ($ft == "image/gif")
    $ext = "gif";
   else if ($ft == "image/png" || $ft == "image/x-png")
    $ext = "png";

   if ($ext == "jpg" || $ext == "gif" || $ext == "png")
   {
       $photoId = $galleries->save($xid, $captionList[$i], $ext,$imageLink[$i]);
  
       copy($files['image']['tmp_name'][$i], "../" . CMS_IMAGES_DIR . $photoId . "." . $ext);
   }
  }
 }
}

function saveListingImage($photoId)
{
	global $_FILES;
	
	if (isset($_FILES['listImage']['name']))
   	{
   	  if($_FILES['listImage']['size'] <= (1024*1024))
	  {
	   $ft = $_FILES['listImage']['type'];
	   if($ft == "image/jpeg" || $ft == "image/jpg" || $ft == "image/pjpeg")
	   {
	    $ext = "jpg";
	   }
	   else if ($ft == "image/gif")
	    $ext = "gif";
	   else if ($ft == "image/png" || $ft == "image/x-png")
	    $ext = "png";
	
	   if ($ext == "jpg" || $ext == "gif" || $ext == "png")
	   {	  
	   	 copy($_FILES['listImage']['tmp_name'], "../" . CMS_LISTINGS_DIR. $photoId . "." . $ext);
	   	 return $ext;
	   }
	  }
  }
  return "";
}

function saveListFiles($listingId, $files, $captionList)
{
 global $listings;
 global $listingFiles;
 
  for ($i=0; $i<count($files['listFile']['name']); $i++)
 {
 	 if ($files['listFile']['size'][$i] > 0)
	 {
		$ext = pathinfo($files['listFile']['name'][$i], PATHINFO_EXTENSION);
		global $filesNotAllowed;
		if(!in_array($ext,$filesNotAllowed))
		{
			$listingFiles->save($listingId, $captionList[$i], $files['listFile']['name'][$i]);
			copy($files['listFile']['tmp_name'][$i], "../" . CMS_LISTING_FILES_DIR . $files['listFile']['name'][$i]);
		}
	 }
 }
}

function saveGroupImage($groupId)
{
	global $_FILES;
	
	if (isset($_FILES['groupImage']['name']))
  {
    if($_FILES['groupImage']['size'] <= (1024*1024))
	  {
	   $ft = $_FILES['groupImage']['type'];
	   if($ft == "image/jpeg" || $ft == "image/jpg" || $ft == "image/pjpeg")
	   {
	    $ext = "jpg";
	   }
	   else if ($ft == "image/gif")
	    $ext = "gif";
	   else if ($ft == "image/png" || $ft == "image/x-png")
	    $ext = "png";

	   if ($ext == "jpg" || $ext == "gif" || $ext == "png")
	   {	  
	   	 copy($_FILES['groupImage']['tmp_name'], "../" . CMS_GROUPS_DIR. $groupId . "." . $ext);
	   	 return $ext;
	   }
		}
	}
  return "";
}

if (isset($_POST['save']))
{
 $contents = "";
 $shortcontents = "";
 
 if ($_POST['linkType'] == "Link")
  $contents = $_POST['directLink'];
 else if ($_POST['linkType'] == "File")
{
	$ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
	global $filesNotAllowed;
	if(in_array($ext,$filesNotAllowed))
	{
		$contents = "";
	}
	else
	{
		$contents = $_FILES['uploadFile']['name'];
	}

}
 if ($_POST['linkType'] == "Contents Page")
 {
 	$shortcontents = $_POST['shortcontents'];
  $contents = $_POST['contents'];
 }
 if ($_POST['linkType'] == "Normal Group")
 {
 	$shortcontents = $_POST['shortcontents'];
  $contents = $_POST['contents'];
 }
  
 if (isset($_POST['id']))
 {
  //edit contents
   
  if ($_POST['linkType'] == "File")
  {
    if (isset($_FILES['uploadFile']['name']))
    {
			$groupResult = $groups->getById($_POST['id']);
		$groupRow = $conn->fetchArray($groupResult);
		$oldFilename = $groupRow['contents'];
		
		//check files not allowed.
		
		$ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
		
		global $filesNotAllowed;
		
		if(in_array($ext,$filesNotAllowed))
		{
				$contents = $oldFilename;
		}
		else
		{
				if(!empty($_FILES['uploadFile']['name']))
				{				
					if (file_exists("../" . CMS_FILES_DIR . $oldFilename))
					 unlink("../" . CMS_FILES_DIR . $oldFilename);
				
					copy($_FILES['uploadFile']['tmp_name'], "../" . CMS_FILES_DIR . $_FILES['uploadFile']['name']);
				}
				else
				{
					$contents = $oldFilename;
				}
			
		}
	}
  }
  else if ($_POST['linkType'] == "Gallery")
  {
   //saveImages($_POST['id'], $_FILES, $_POST['imageCaption']);
  }
  else if ($_POST['linkType'] == "List")
  {
	 if($listings -> isUnique($_POST['listId'], $_POST['listUrlTitle']) && !empty($_POST['listUrlTitle']))
	 { 
   if (isset($_POST['listId']))
   {
   	$listings->update($_POST['listId'], $_POST['listTitle'], $_POST['listUrlTitle'], $_POST['listDescription'], $_POST['listMain'], $_POST['listPageTitle'], $_POST['listPageKeyword'],$_POST['listMetaDescription']);
		$ext = saveListingImage($_POST['listId']);
		if (!empty($ext))
   		$listings->updateExt($_POST['listId'], $ext);
		
		saveListFiles($_POST['listId'], $_FILES, $_POST['listCaption']);
   }
   else
   {
   	if (!empty($_POST['listTitle']))
   	{
   		$newListId = $listings->save($_POST['id'], $_POST['listTitle'], $_POST['listUrlTitle'], $_POST['listDescription'], $_POST['listMain'], $_POST['listPageTitle'], $_POST['listPageKeyword'],$_POST['listMetaDescription']);
			$ext = saveListingImage($newListId);
			if (!empty($ext))
   			$listings->updateExt($newListId, $ext);
			
			saveListFiles($newListId, $_FILES, $_POST['listCaption']);
   	}
   }
	 }
	 else
	 {
		 $err = "Alias Name already exists. Please provide unique Alias Name";
	 }
  }
	else if ($_POST['linkType'] == "Video Gallery")
  {
		for ($i=0; $i<count($_POST['videoUrl']); $i++)
		{
			if(!empty($_POST['videoTitle'][$i]))
			{
				$videos -> save($_POST['id'], $_POST['videoTitle'][$i], $_POST['videoUrl'][$i]);
			}
		}
		
		for ($i=0; $i < count($_POST['oldVideoIds']); $i++)
		{
		 	$videos -> update($_POST['oldVideoIds'][$i], $_POST['oldTitles'][$i], $_POST['oldUrls'][$i]);
		}
  }	
	
  if($groups -> isUnique($_POST['id'], $_POST['urlname']) && !empty($_POST['urlname']))
	{

  $groups->update($_POST['id'], $_POST['name'], $_POST['urlname'], $_POST['parentId'], $shortcontents, $contents, $_POST['weight'], $_POST['hide'], $_POST['pageTitle'], $_POST['pageKeyword'],$_POST['metaDescription']);
	
	$ext = saveGroupImage($_POST['id']);
	if (!empty($ext))
  	$groups->updateExt($_POST['id'], $ext);

  saveImages($_POST['id'], $_FILES, $_POST['imageCaption'],$_POST['imageLink']);
  
  for ($i=0; $i < count($_POST['oldCaptionIds']); $i++)
  {
   $galleries->update($_POST['oldCaptionIds'][$i], $_POST['oldCaptions'][$i],$_POST['oldImageLink'][$i]);
  }
	
	$showId = false;
	
	if($_POST['linkType'] == "List" || $_POST['linkType'] == "Gallery" || $_POST['linkType'] == "Video Gallery")
		$showId = true;
	
	$url = 	"cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'];
	if($showId)
		$url .= "&id=". $_POST['id'];
	if(isset($_GET['page']))
		$url .= "&page=".$_GET['page'];

	header ("Location: " . $url ."&msg=Successfully updated!");
	exit();
 }
 }
////////////////
// ADD NEW //// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 else //add new code goes here...
 {
 	if(!empty($_POST['name']) && $_POST['linkType'] != "select" && $groups -> isUnique(0, $_POST['urlname']) && !empty($_POST['urlname']))
	{
		$newId = $groups->save($_POST['name'], $_POST['urlname'], $_GET['groupType'], $_POST['parentId'], $_POST['linkType'], $shortcontents, $contents, $_POST['weight'], $_POST['hide'], $_POST['pageTitle'], $_POST['pageKeyword'],$_POST['metaDescription']);
		$groups->updateExt($newId, saveGroupImage($newId));
		saveImages($newId, $_FILES, $_POST['imageCaption']);
			
		if ($_POST['linkType'] == "File")
		{
			if (isset($_FILES['uploadFile']['name']))
			{
			
				$ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
				global $filesNotAllowed;
				if(in_array($ext,$filesNotAllowed))
				{
					//$_FILES['uploadFile']['name'] = "";
				}
				else
				{
					copy($_FILES['uploadFile']['tmp_name'], "../" . CMS_FILES_DIR . $_FILES['uploadFile']['name']);
				}
			}
		}
		else if ($_POST['linkType'] == "Gallery")
		{
		 //made public
		 //saveImages($newId, $_FILES, $_POST['imageCaption']);
		}
		else if ($_POST['linkType'] == "List")
		{
			if (!empty($_POST['listTitle']) && $listings -> isUnique(0, $_POST['listUrlTitle']) && !empty($_POST['listUrlTitle']))
			{
				$newListId = $listings->save($newId, $_POST['listTitle'], $_POST['listUrlTitle'], $_POST['listDescription'], $_POST['listMain'], $_POST['listPageTitle'], $_POST['listPageKeyword'],$_POST['listMetaDescription']);
				$ext = saveListingImage($newListId);
				if (!empty($ext))
					$listings->updateExt($newListId, $ext);
				
				saveListFiles($newListId, $_FILES, $_POST['listCaption']);
			}
		}
		else if ($_POST['linkType'] == "Video Gallery")
		{
			for ($i=0; $i<count($_POST['videoUrl']); $i++)
			{
				if(!empty($_POST['videoTitle'][$i]))
				{
					$videos -> save($newId, $_POST['videoTitle'][$i], $_POST['videoUrl'][$i]);
				}
			}			
		}
		
		$msg = "Successfully saved!";
	}
	else
		$msg = "Please supply required fields!";
 }
 
 
 if ($_POST['linkType'] == "List")
 {
 	if (isset($_POST['id']))
 		$id = $_POST['id'];
 	else
 		$id = $newId;
	
	$url = "cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'];
	if($id > 0)
		$url .= "&id=$id";

 	header ("Location: ". $url ."&msg=" . $msg);
	exit();
 }
 else if ($_POST['linkType'] == "Gallery")
 {
 	if (isset($_POST['id']))
 		$id = $_POST['id'];
 	else
 		$id = $newId;
 	
	if($id > 0)
 	header ("Location: cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&id=$id&msg=" . $msg);
	else
	header ("Location: cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 }
 elseif($_POST['linkType'] == "Vidoe Gallery")
 {
 		if (isset($_POST['id']))
			$id = $_POST['id'];
		else
			$id = $newId;
		
		if($id > 0)
		header ("Location: cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&id=$id&msg=" . $msg);
		else
		header ("Location: cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 }
 else
 {
 	header ("Location: cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 }
 exit();
}
else if (isset($_GET['id']) && isset($_GET['delete']))
{
 //this will delete the group and all its belongings (image, files, etc)
 $groups->delete($_GET['id']);

 $msg = "Successfully deleted!";
 header ("Location: cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 exit();
}
else if (isset($_GET['imageId']) && isset($_GET['deleteImage']))
{
 $galleries->delete($_GET['imageId']);
 $msg = "Image deleted!";
 header ("Location: cms.php?id=". $_GET['id'] ."&groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 exit();
}
else if (isset($_GET['deleteListId']))
{
 $listings->delete($_GET['deleteListId']);
 $msg = "Listing deleted!";
 header ("Location: cms.php?id=". $_GET['id'] ."&groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 exit();
}
else if (isset($_GET['fileId']) && isset($_GET['deleteFile']))
{
 $listingFiles->delete($_GET['fileId']);
 $msg = "File deleted!";
 
 $url = "cms.php?id=". $_GET['id'] ."&parentId=". $_GET['parentId'] ."&groupType=". $_GET['groupType']."&listId=" . $_GET['listId'];
	if(isset($_GET['page']))
		$url .= "&page=".$_GET['page'];
		
 header ("Location: ". $url . "&msg=" . $msg);
 exit();
}
elseif(isset($_GET['listId']) && isset($_GET['deleteImage']))
{
	$result = $listings -> getById($_GET['listId']);
	$row = $conn -> fetchArray($result);
	
	$listings -> updateExt($row['id'], "");
	@unlink("../". CMS_LISTINGS_DIR . $row['id'] . "." . $row['ext']);
	
	$msg = "Image deleted!";
	
	$url = "cms.php?id=". $_GET['id'] ."&parentId=". $_GET['parentId'] ."&groupType=". $_GET['groupType'] ."&listId=". $_GET['listId'];
	if(isset($_GET['page']))
		$url .= "&page=".$_GET['page'];

 	header ("Location: ". $url ."&msg=" . $msg);
	exit();
}
elseif(isset($_GET['id']) && isset($_GET['deleteImage']))
{
	$result = $groups -> getById($_GET['id']);
	$row = $conn -> fetchArray($result);
	
	$groups->updateExt($row['id'], "");
	@unlink("../". CMS_GROUPS_DIR . $row['id'] . "." . $row['ext']);
	
	$msg = "Image deleted!";
	
	$url = "cms.php?id=". $_GET['id'] ."&parentId=". $_GET['parentId'] ."&groupType=". $_GET['groupType'];
	if(isset($_GET['page']))
		$url .= "&page=".$_GET['page'];
	
 	header ("Location: ". $url ."&msg=" . $msg);
	exit();
}
else if (isset($_GET['videoId']) && isset($_GET['deleteVideo']))
{
 $videos -> delete($_GET['videoId']);
 $msg = "Video deleted!";
 header ("Location: cms.php?id=". $_GET['id'] ."&groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 exit();
}
?>
