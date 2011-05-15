<div class="welcome">
	  <div class="wel_head">
    <h1><?php include("includes/breadcrumb.php"); ?><?php echo $pageTitle; ?></h1>
    </div><div class="clear"></div>
	<div class="cntnt">
	<?php
  $pagename = "index.php?linkId=". $linkId ."&";
  include("includes/pagination.php");
  
	//$pageContents = trim($pageContents, "&nbsp;");
	//$pageContents = trim($pageContents, "<br />");
	
  Pagination($pageContents, "content");
  
  if(!empty($pageContents))
  {
  ?>
    <br /><br />
  <?php
  }
  ?>
	<p>
	<ul id="subgroups">
    <?php
    //receive parentId from the caller page
    $subResult = $groups->getVisibleByParentId($linkId);
	$x=0;
    while ($subRow = $conn->fetchArray($subResult))
    {
		$x++;
     ?>
	  <li>	
          <a href="<?php echo $subRow['urlname'];?>.html"> 
            <?php echo ucwords($subRow['name']);?> 
          </a>
	  </li>
     <?php
	}//while		 
	 ?>
	</ul>
  </p>
	</div>	
</div>
