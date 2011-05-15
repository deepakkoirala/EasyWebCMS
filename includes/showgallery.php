<script type="text/javascript" src="js/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="highslide.css" />
<div style="clear:both"></div>

<div class="welcome">
  <div class="wel_head">
<h1><?php include("includes/breadcrumb.php"); ?> <?php echo $pageTitle; ?></h1>

    <div style="clear:both"></div>
  </div>
 <div class="wel_bdy">
<?php

$gla=$galleries->getByGroupId($linkId);

$total=$conn->numRows($gla);
$i=0;
while ($galleryRow = $conn->fetchArray($gla))
{
++$i;
?>
<div class="highslide-gallery">

<div style="width:220px; height:170px; float:left; padding-top:5px;margin-right:5px;<?php if($i%4==1){ ?> padding-left:5px; <?php } ?>">
<a href="<?php echo CMS_IMAGES_DIR.$galleryRow["id"].".".$galleryRow["ext"]; ?>" class="highslide" onClick="return hs.expand(this)">
<img src="data/imager.php?file=../<?php echo CMS_IMAGES_DIR.$galleryRow["id"].".".$galleryRow["ext"]; ?>&mw=220&mh=170&fix" alt="<?php echo $zm["caption"] ?>"
title="Click to enlarge" height="170" width="220" border="0" style="z-index:10000 !important"/>
</a><div class="highslide-caption">
<?php echo $galleryRow["caption"]; ?>
</div> </div><?php if($i%4==0 || $i==$total){ echo "<div class=\"clear\"></div><br/>"; } ?>
<?php

?>

</div>
<?php if($i%4 ==0){ ?>
<div style="clear:both;"></div>
<?php } ?>
<?php
}
?>
<div style="clear:both"></div>
<?php echo $pagelist; ?>
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