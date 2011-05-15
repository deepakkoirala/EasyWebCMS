<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
        
<?php include("includes/breadcrumb.php"); ?>
<div style="clear:both"></div>
<div class="welcome">
<?php include("innerleft.php"); ?>
<div class="rbox">
<div id="contentsPage"> 
  <div class="intro_header" style="padding-left:0;"><div class="wel_head"><h1><?php echo $pageTitle; ?></h1></div></div>
  <div>
  <?php
	$i = 0;
	$pagename = "index.php?linkId=$linkId&";
	
	$sql = "SELECT * FROM videos WHERE groupId = $linkId ORDER BY id DESC";
	
	$newsql = $sql;
	
	$limit = PAGING_LIMIT;
	
	include("includes/pagination.php");
	$return = Pagination($sql, "");
	
	
	$arr = explode(" -- ", $return);
	
	$start = $arr[0];
	$pagelist = $arr[1];
	
	$newsql .= " LIMIT $start, $limit";
	
	$result = mysql_query($newsql);
	
	while($row = $conn -> fetchArray($result))
	{
		$i++;
	?>
  <div class="gall-main" style="float:left; margin-bottom:5px; <?php if($i%5!=0) echo ' margin-right:5px;'; ?>"> 
    <!-- gall main starts --> 
  
    <div class="gallery" style="position:relative;"><img src="<?php echo getYouTubeImage($row['url'], "big"); ?>" width="220" height="150" alt="<?php echo $row['title']; ?>" title="<?php echo $row['title']; ?>" border="0"><a href="<?php echo $row['url']; ?>" rel="prettyPhoto" title="<?php echo $row[title]; ?>"><img style="position:absolute; top:30%; left:27%; width:90px; height:70px; opacity:0.8;" src='images/play.png'/></a></div>
    <div style="clear:both;"></div>
  </div>
  <?php
	}
	?>
  <div style="clear:both;"></div>
  <?php echo $pagelist; ?>

  </div>
</div>
</div>
</div>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function($){
				$(document).ready(function($){
  $('[rel*="prettyPhoto"]').prettyPhoto();
});
			});
</script>
<div class="clear"></div>