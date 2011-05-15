

 <div class="testi_txt"><?php echo $pageTitle; ?> <?php include("includes/breadcrumb.php"); ?></div>
<div id="detail_content"> 
 
<?php  
	$file_with_location = CMS_FILES_DIR .$pageContents; 
?> 
	<p style="float:left;">
    	
    	<a href="<?php echo $file_with_location; ?>" target="_blank" style="text-decoration:underline; font-weight:bold;" class="hh">
        	
      Click Here To Download</a>&nbsp;&nbsp;&nbsp;&nbsp;<img src="right.gif" height="11" width="8" />
    </p>
    <p  style="float:left; margin-left:25px;">&nbsp;<?php echo $pageTitle; ?></p><div class="clear"></div>


</div>