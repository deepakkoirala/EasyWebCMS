<div class="newsid2">
  <div class="right_most_box" style="width:690px">
    <div class="left_box"> </div>
    <div class="main_box">
      <h1 class="news_tab">Polls</h1>
    </div>
    <div class="right_box"> </div>
  </div>
</div>
<div class="entertainmentid9 bdrbtm" style="width:668px; color:#000000">
  <?php
	$i = 0;
	$pagename = "index.php?action=poll&";
	$sql = "SELECT * FROM polls ORDER BY id DESC";
	$newsql = $sql;
	
	$limit = 10;
	
	include("includes/pagination.php");
	$return = Pagination($sql, "");
	
	
	$arr = explode(" -- ", $return);
	
	$start = $arr[0];
	$pagelist = $arr[1];
	
	$newsql .= " LIMIT $start, $limit";
	
	$result = $conn -> exec($newsql);
	$counter = 0;
	while($row = $conn -> fetchArray($result))
	{ 
	$i = 0;
	?>
  <div style="float:left;">
    <div style="float:left; width:auto; font-weight:bold; font-size:13px"><?php echo $start + ++$counter; ?>.&nbsp;<?php echo $row['topic']; ?></div>
    <div style="clear:both;"></div>
    <?php
	$resOption = $polls -> getOptionsByPollId($row['id']);	
	while($rowOption = $conn -> fetchArray($resOption))
	{
		$vote = $polls -> getVote($row['id'], $rowOption['totalVote']);
		?>
    <div style="float:left; text-align:left; width:300px;">- <?php echo $rowOption['option']; ?></div>
    <div style="float:left"> <?php echo $vote; ?></div>
    <div style="clear:both"></div>
    <?php
  $i++;
	} 
	?>
  </div>
  <?php
}
?>
  <div style="clear:both;"></div>
  <?php echo $pagelist; ?> </div>
