<?php
$galleryResult = $galleries->getById($_GET['galleryId']);
$galleryRow = $conn->fetchArray($galleryResult);

$pageResult = $groups->getById($galleryRow['groupId']);
$pageRow = $conn->fetchArray($pageResult);
$pageTitle = $pageRow['name'];

$linkId = $galleryRow['groupId'];
?>

<?php include("includes/breadcrumb.php"); ?>
<div style="clear:both"></div>
<?php //include("innerleft.php"); ?>
<div class="rbox">
<div id="contentsPage"> 
  <div class="intro_header" style="padding-left:0;"><?php echo $pageTitle; ?></div>
            <div class="listTItle">
        
        <!-- AddThis Button BEGIN -->
<script type="text/javascript">var switchTo5x=false;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "653250dd-5c81-4874-a8ff-c3372990d295", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>


<span class='st_sharethis_large' displayText='ShareThis'></span>
<span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_linkedin_large' displayText='LinkedIn'></span>
<span class='st_pinterest_large' displayText='Pinterest'></span>
<span class='st_email_large' displayText='Email'></span>
<!-- AddThis Button END -->
        
        </div>  
  <div id="cmsGallery">
	<?php
  $navNextResult = $galleries->getNextResult($_GET['galleryId']);
  $navNextRow = $conn->fetchArray($navNextResult);
  
  $navPreviousResult = $galleries->getPreviousResult($_GET['galleryId']);
  $navPreviousRow = $conn->fetchArray($navPreviousResult);
  ?>
    <div style="float:left;"> <a href="gallery/<?= $navPreviousRow['id']; ?>.html" class="paging">&laquo; Previous</a> </div>
    <div style="float:right;"> <a href="gallery/<?= $navNextRow['id']; ?>.html" class="paging">Next &raquo;</a> </div>
    <div style="clear:both; padding-bottom:10px;"></div>
    <div align="center"><img src="data/imager.php?file=../<?= CMS_IMAGES_DIR . $galleryRow['id'] ?>.<?= $galleryRow['ext'] ?>&mw=450&mh=450" border="0" /><br />
      <p style="text-align:center;"><?php echo $galleryRow['caption']; ?></p>
    </div>
	</div>
</div>
</div>