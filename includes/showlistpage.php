<script type="text/javascript" src="js/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="highslide.css" />

<?php include("includes/breadcrumb.php"); ?>

<div style="clear:both"></div>
<div class="welcome">
  <div class="wel_head">
    <h1><?php echo $pageTitle; ?></h1>
  </div>
  <div class="wel_bdy">
    <div class="wel_bdy_txt">
			<?php
      $pagename = "index.php?linkId=". $linkId ."&";
      
      $sql = "SELECT * FROM listings WHERE groupId = '$linkId' ORDER BY id DESC";
      
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
          <div style="float: left; width: 100px; padding:5px;"  class="highslide-gallery"> 
          <a href="<?php echo  CMS_LISTINGS_DIR . $listRow['id'].".". $listRow['ext'];?>"  class="highslide" onClick="return hs.expand(this)"> 
          <img src="data/imager.php?file=../<?php  echo  CMS_LISTINGS_DIR . $listRow['id'] ?>.<?php  echo  $listRow['ext'] ?>&mw=100&mh=100" border="0"  /> 
          </a> 
          </div>
          <?php  } ?>
          <div>
          <?php  $dateArr = explode("-", $listRow['onDate']);	?>
          <div>
            <div class="listDate">
              <?php // echo 'Date :'. date('d M Y', mktime(0,0,0, $dateArr[1], $dateArr[2], $dateArr[0])); ?>
            </div>
            <h2 class="listTitle"><a href="<?php  echo  $listRow['urltitle']; ?>.html"><?php  echo  $listRow['title']; ?></a></h2>        
           
            <?php
              $arr = explode(" ", strip_tags($listRow['description']));
              for($i=0;$i<=50;$i++)
                echo $arr[$i] . " ";
              ?>
           
          </div>
        </div>
        <div class="morei mores">
        	<a href="<?php  echo  $listRow['urltitle']; ?>.html" class="search2" style="color:#FFFFFF;padding-left:20px;width:100px;border-radius:10px;">
            Read More &raquo;</a>
        </div>
        </p>
        <div style="clear:both"> </div>
        <?php  
      }
      echo $pagelist;
      ?>
    </div>
  </div>
</div>

<script type="text/javascript">
hs.graphicsDir = 'graphics/';
hs.align = 'center';
hs.transitions = ['expand', 'crossfade'];
hs.outlineType = 'rounded-white';
hs.fadeInOut = true;
//hs.dimmingOpacity = 0.75;

// Add the controlbar
hs.addSlideshow({
//slideshowGroup: 'group1',
interval: 5000,
repeat: false,
useControls: true,
fixedControls: 'fit',
overlayOptions: {
opacity: 0.75,
position: 'bottom center',
hideOnMouseOut: true
}
});
</script>