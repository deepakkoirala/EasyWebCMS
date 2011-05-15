<div class="welcome">
  <div class="wel_head">
    <h1>
	<?php include("includes/breadcrumb.php"); ?><?php echo $pageTitle; ?> 
    </h1>
    <div style="clear:both"></div>
  </div>
  <div class="wel_bdy">
 
    <div class="wel_bdy_txt">
    <p>
      <?php
			$pagename = "index.php?linkId=". $linkId ."&";
			include("includes/pagination.php");
	if($_GET['grab'] == 'spring'){
			echo Pagination($pageContents_spring, "content");
	}else{
			echo Pagination($pageContents, "content");
	}
	?>
    </p>
    </div>
    
    
   

  </div>
  <?php if($_GET['linkId']==2229){ include("includes/contact-form.php"); } ?>
</div>
