<div class="welcome">
  <div class="welcome_header">Our Clients</div>
  <div class="welcome_content">
  <?php 
	$pagename = "index.php?linkId=". $linkId ."&";
	
	$sql = "SELECT * FROM listings WHERE groupId = '". CLIENTS_ID ."' ORDER BY id DESC";
	
	$newsql = $sql;

	$limit = LISTING_LIMIT;
	
	include("includes/pagination.php");
	$return = Pagination($sql, "");
	
	$arr = explode(" -- ", $return);
	
	$start = $arr[0];
	$pagelist = $arr[1];
	
	$newsql .= " LIMIT $start, $limit";
	
	$result = mysql_query($newsql);
	
	while ($row = $conn->fetchArray($result))
	{
		$word = 100;
		?>
		<div class="clients_mid_img" style="width:100%; border-bottom: 1px dashed #888784; padding-bottom:5px;">
		<?php if(file_exists(CMS_LISTINGS_DIR . $row['id'] . "." . $row['ext'])){ ?>
		<img src="<?php echo CMS_LISTINGS_DIR . $row['id'] . "." . $row['ext']; ?>" width="100" alt="<?php echo $row['title']; ?>" align="left" style="margin-right:5px;"/>
		<?php } else $word = 200; ?>
		<?php echo substr(strip_tags($row['description']), 0, $word); ?>
		</div>
		<?php
		$counter++;
	} 
	?>
	<div style="clear:both"></div>
	<?php
	echo $pagelist;
	?>
  </div>
</div>
