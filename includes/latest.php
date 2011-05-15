<div id="left_news">
  <div class="title_news blue">News Updates</div>
  <div class="cntnt">
    <?php
		$pagename = "index.php?linkId=". $linkId ."&";
	
		$sql = "SELECT * FROM listings, groups WHERE listings.groupId = groups.id AND groups.type = 'News Category' ORDER BY listings.id DESC";
		
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
        <div class="listTitle"><a href="index.php?listId=<?php  echo  $listRow['id']; ?>">
          <?php  echo  $listRow['title']; ?>
          </a></div>
        <div class="listDate">Date :
          <?php  echo  date('d M Y', mktime(0,0,0, $dateArr[1], $dateArr[2], $dateArr[0])); ?>
        </div>

          <?php
					$arr = explode(" ", $listRow['description']);
					for($i=0;$i<=25;$i++)
						echo $arr[$i] . " ";
					?>
      </div>
    </div>
    <div align="right"><a href="index.php?listId=<?php  echo  $listRow['id']; ?>">&#40;&#2357;&#2367;&#2340;&#2371;&#2340;&#32;&#2360;&#2350;&#2366;&#2330;&#2366;&#2352;&#41;</a></div>
    </p>
    <div style="clear:both"> </div>
    <?php  
	}
	echo $pagelist;
	?>
  </div>
  <div style="clear:both;"></div>
</div>
