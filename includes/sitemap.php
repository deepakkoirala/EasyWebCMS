<?php
function createSiteMap($pagename, $groupType, $parentId)
{
	global $groups;
	global $conn;
	
	if ($parentId == 0)
		$groupResult = $groups->getVisibleByTypeParentId($groupType, $parentId);	
	else
		$groupResult = $groups->getVisibleByParentId($parentId);	
		
	if ($conn->numRows($groupResult) > 0)
	{
	 	echo "<ul>";
	}
	
	while($groupRow = $conn->fetchArray($groupResult))
	{		
		echo "<li>";
		if ($groupRow['linkType'] == "Link")
		{
			echo "<a href='" . $groupRow['contents'] . "'>";
		}
		else if ($groupRow['linkType'] == "File")
		{
			echo "<a href='" . CMS_FILES_DIR . $groupRow['contents'] . "'>";
		} 
		else
		{
			echo "<a href='" . $groupRow['urlname'] . ".html'>";
		}
		
		echo $groupRow['name'] . "</a>\n";

		createSiteMap($pagename, $groupType, $groupRow['id']);

		echo "</li>";
	}
	if ($conn->numRows($groupResult) > 0)
		echo "</ul>";
}
?>

<div class="welcome">
  <div class="wel_head" ><h1>Site Map</h1></div>
  <div>
  <?php
		createSiteMap("index.php", "Top Links", 0);
		echo "<br>";
		createSiteMap("index.php", "Header Links", 0);
		echo "<br>";
		createSiteMap("index.php", "Footer Links", 0);
		?>
  </div>
</div>