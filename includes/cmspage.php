<?php
$groupResult = $groups->getById($_GET['linkId']);
$groupRow = $conn->fetchArray($groupResult);

$linkId = $_GET['linkId'];//send $parentId to child page
$groupId = $groupRow['groupId'];
$pageTitle = $groupRow['name'];
$pageTitle = ucwords(strtolower($pageTitle));
$pageDate = $groupRow['onDate'];
$pageContents = $groupRow['contents'];
$pageContents_spring = $groupRow['contents_spring'];
$pageType = $groupRow['type'];
$urlname = $groupRow['urlname'];

if ($groupRow['linkType'] == "Normal Group")
{
 $pagename = $_SERVER['PHP_SELF'];
 include ("includes/showsubgroups.php");
}
else if ($groupRow['linkType'] == "Contents Page")
{ 
 include ("includes/showcontentpage.php");
}
else if ($groupRow['linkType'] == "Gallery")
{
 include ("includes/showgallery.php");
}
else if ($groupRow['linkType'] == "Video Gallery")
{
 include ("includes/showvideogallery.php");
}
else if ($groupRow['linkType'] == "List")
{
 include ("includes/showlistpage.php");
}
else if ($groupRow['linkType'] == "File")
{
 include ("includes/showfilepage.php");
}
?>