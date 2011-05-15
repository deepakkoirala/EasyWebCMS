<script type="text/javascript" src="js/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="highslide.css" />

<?php
$listResult = $listings->getById($_GET['listId']);
$listRow = $conn->fetchArray($listResult);

$pageResult = $groups->getById($listRow['groupId']);
$pageRow = $conn->fetchArray($pageResult);
$pageTitle = $pageRow['name'];

$linkId = $listRow['groupId'];
?>




<div style="clear:both"></div>
<div class="welcome">
  <div class="wel_head">
    <h1>
	<?php echo $listRow["title"]; ?>  <?php include("includes/breadcrumb.php"); ?>
    </h1>
  </div>
  <div class="wel_bdy">
    <div class="wel_bdy_txt">
    <div class="newDes">
      <div style="margin-bottom:5px; margin-top:5px;">
    <!-- for navigation -->
    <?php
		if(isset($_GET['latest']))
		{
			$ntype = "latest";
			$navNextResult = $listings->getConditionalNextResult($_GET['listId'], "News Category", $ntype);			
		}
		elseif(isset($_GET['featured']))
		{
			$ntype = "featured";
			$navNextResult = $listings->getConditionalNextResult($_GET['listId'], "News Category", $ntype);
		}
		else
		{
			$ntype = "";
			$navNextResult = $listings->getNextResult($_GET['listId']);
		}
		$navNextRow = $conn->fetchArray($navNextResult);
		
		if(isset($_GET['latest']))
			$navPreviousResult = $listings->getConditionalPreviousResult($_GET['listId'], "News Category", $ntype);			
		elseif(isset($_GET['featured']))
			$navPreviousResult = $listings->getConditionalPreviousResult($_GET['listId'], "News Category", $ntype);
		else
			$navPreviousResult = $listings->getPreviousResult($_GET['listId']);

		$navPreviousRow = $conn->fetchArray($navPreviousResult);
	?>
    <div style="float: left;" > <a href="<?php echo $navPreviousRow['urltitle']; ?>.html" class="paging">&laquo; Previous</a> </div>
    <div style="float: right;"> <a href="<?php echo $navNextRow['urltitle']; ?>.html" class="paging">Next &raquo;</a> </div>
    <div style="clear:both"></div>
  </div>
      <div class="listRow">
        <h3>
          <?php
          $dateArr = explode("-", $listRow['onDate']);
         // echo date('M d, Y', mktime(0,0,0, $dateArr[1], $dateArr[2], $dateArr[0]));		
        ?>
        </h3>

        <?php if(file_exists(CMS_LISTINGS_DIR . $listRow['id'].".".$listRow['ext'])){?>
        
        <div class="highslide-gallery" align="center" style="text-align:center; padding-top:10px;">
        <a href="<?= CMS_LISTINGS_DIR . $listRow['id'] ?>.<?= $listRow['ext'] ?>"  class="highslide" onClick="return hs.expand(this)"> 
        
        <img src="data/imager.php?file=../<?= CMS_LISTINGS_DIR . $listRow['id'] ?>.<?= $listRow['ext'] ?>&mw=300&mh=200" border="0" class="hoverImage" />
        
        </a>
          <div style="clear:both"></div>
        </div>
        <?php }?>
        <div style="padding:5px; text-align:justify; line-height:20px;">
          <?php echo $listRow['description']; ?>
        </div>
      </div>
      <?php
      $lfResult = $listingFiles->getByListingId($_GET['listId']);
      $numRows = $conn->numRows($lfResult);
      if($numRows > 0)
      {
      ?>
      <br />
      <div><u>Attachments#</u></div>
      <?php
      if ($numRows == 0)
      {
        echo "<div class='attach'>No files</div>";
      }
      else
      {
      ?>
      <div class="attach">
        <table width="100%">
          <?php
          }
          while ($lfRow = $conn->fetchArray($lfResult))
          {
          $file = CMS_LISTING_FILES_DIR . $lfRow['filename'];
          ?>
          <tr>
            <td><?php echo $lfRow['filename'] . " (" . round((filesize($file)/1024),0) ." KB)"; ?></td>
            <td><?php echo $lfRow['caption']; ?></td>
            <td><a href="<?php echo CMS_LISTING_FILES_DIR . $lfRow['filename']; ?>">Download</a></td>
          </tr>
          <?php
          }
          
          if ($conn->numRows($lfResult) > 0)
          {
          ?>
        </table>
      </div>
      <?php
      }
      }
      ?>
    </div>    
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