<?php
function createMenu($pagename, $groupType, $parentId)
{
	global $groups;
	global $conn;
	
	if ($parentId == 0)
		$groupResult = $groups->getByTypeParentId($groupType, $parentId);	
	else
		$groupResult = $groups->getByParentId($parentId);
		
	if ($conn->numRows($groupResult) > 0)
		echo "<ul style='padding:0 10px 0 20px; margin:0;'>";
	while($groupRow = $conn->fetchArray($groupResult))
	{	
		echo "<li>";
		if (empty($groupRow['directLink']))
		{
			//echo "<a href='$pagename?parentId=" . $groupRow['id'] . "'>";
		}
		else
		{
			//echo "<a href='" . $groupRow['directLink'] . "'>";
		}
		echo $groupRow['name']; // . "</a></li>\n";
		createMenu($pagename, $groupType, $groupRow['id']);
	}
	if ($conn->numRows($groupResult) > 0)
		echo "</ul>";
}

?>
<script>
function showCmsTree()
{
	tree = document.getElementById('cmsTree');
	tree.style.display = 'block';
}
function hideCmsTree()
{
	tree = document.getElementById('cmsTree');
	tree.style.display = 'none';
}
</script>
<div onmouseover="showCmsTree();" onmouseout="hideCmsTree();">&nbsp;<strong>CMS Tree</strong></div>
<div style="display: none; background-color:#153574; color:#FFFFFF; border: 1px solid; position: absolute;" class="lightbg" id="cmsTree">
<?php
createMenu("index.php", $groupType, 0);
?>
</div>