<div id="contentsPage">
	<div class="phot_txt">News</div>
	<div>
	<?php
		$pagename = "index.php?action=news&";
		if(isset($_GET['latest']))
		{
			$pagename .= "latest&";
			$ntype = "latest";
		}
		if(isset($_GET['featured']))
		{
			$pagename .= "featured&";
			$ntype = "featured";
		}
		
		$sql = "SELECT listings.* FROM listings, groups WHERE listings.groupId = groups.id AND groups.type = 'News Category'";
		if(isset($_GET['featured']))
			$sql .= " AND main = 'yes'";
		$sql .= " ORDER BY listings.id DESC";
		
		$newsql = $sql;
	
		$limit = LISTING_LIMIT;
		
		include("includes/pagination.php");
		$return = Pagination($sql, "");
		
		$arr = explode(" -- ", $return);
		
		$start = $arr[0];
		$pagelist = $arr[1];
		
		$newsql .= " LIMIT $start, $limit";
		
		$result = mysql_query($newsql);
		
		while ($listRow = $conn->fetchArray($result))
		{
		?>
    <p>
      <?php  if(file_exists(CMS_LISTINGS_DIR . $listRow['id']."." . $listRow['ext'])){?>
    <div style="float: left; width: 100px; padding:5px;"> <a href="index.php?listId=<?php  echo  $listRow['id'] ?>"> <img src="data/imager.php?file=../<?php  echo  CMS_LISTINGS_DIR . $listRow['id'] ?>.<?php  echo  $listRow['ext'] ?>&mw=100&mh=100" border="0" /> </a> </div>
    <?php  } ?>
    <div>
      <?php  $dateArr = explode("-", $listRow['onDate']);
		?>
      <div>
				<div class="listDate">Date :
          <?php  echo  date('d M Y', mktime(0,0,0, $dateArr[1], $dateArr[2], $dateArr[0])); ?>
        </div>
        <div class="listTitle"><a href="index.php?listId=<?php  echo  $listRow['id']; ?>">
          <?php  echo  $listRow['title']; ?>
          </a></div>
          <?php
					$arr = explode(" ", $listRow['description']);
					for($i=0;$i<=25;$i++)
						echo $arr[$i] . " ";
					?>
      </div>
    </div>
    <div align="right"><a href="index.php?listId=<?php  echo  $listRow['id']; ?>&<?php echo $ntype; ?>">Full Story</a></div>
    </p>
    <div style="clear:both"> </div>
    <?php  
	}
	echo $pagelist;
	?>
	</div>	
</div>