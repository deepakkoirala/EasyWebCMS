<?php 
$keyword = strtolower($_REQUEST['txt_search']); 
$keyword = cleanQuery($keyword);
if(!($keyword)){
	header("location:index.php");
}
?>
<div class="wel_head">
<h1>Search Result</h1></div>
<div id="contentsPage" style="margin-top:10px;">
  <div class="search1">
    <?php
	$pagename = "index.php?title=search&txt_search=$keyword&";
	//$pagename = "search?title=search&txt_search=$keyword&";
	$sql = "
	SELECT name as title, urlname as urltitles, contents as details FROM groups WHERE (`name` LIKE '%$keyword%' or contents LIKE '%$keyword%') AND type != 'Page Contents' UNION
	SELECT title as title, urltitle as urltitles, description as details FROM listings WHERE `title` LIKE '%$keyword%' OR description LIKE '%$keyword%'";

	$limit = 10;
	include("includes/paging.php");
	
	if($count > 0)
	{
		while($row = $conn -> fetchArray($result))
		{
		?>

    <div class="search_title">
      <?php
		
		echo '<a href='.$row['urltitles'].".html".'>';
		
		echo "<span style='font-weight:bold'>".$row['title']."</span>"."<br />";
		echo "<div style='color:#666;'>";
		//echo substr($row['details'], 0, 200);
		echo $excerpt->excerptWithOutTags($row['details'], 100);
		echo "</div>";
		
		echo '</a>';
		?>
    </div><br/>
  
  <?php
		}
		?>
  <div align="center">
    <?php include("includes/paging_show.php"); ?>
  </div>

  <?php
	}
	else
		echo "No result found!!!";
	?>

</div>
</div>