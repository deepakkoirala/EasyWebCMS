<?php
$i = 0;
if($limit > 0)
	$result = $adds -> getByPositionWithLimit($addposition, $limit);
else
	$result = $adds -> getByPosition($addposition);

if($addposition == "header" || $addposition == "bottom")
	$nw = 468;
elseif($addposition == "adsensetop")
	$nw = 700;
elseif($addposition == "middle")
	$nw = 270;	
elseif($addposition == "right")
	$nw = 300;	
	
$numRows = $conn -> numRows($result);	
while($row = $conn -> fetchArray($result))
{
	$i++;
 	$addfilename = CMS_ADDS_DIR . $row['filename'];
	//if($row['type'] == "flash")
	{
		$arr = getimagesize($path.$addfilename);
		$width = $arr[0];
		$height = $arr[1];
	}
	
	if($addposition == "header")
		$nh = 60;
	elseif($addposition == "adsensetop")
		$nh = 21;
	elseif($addposition == "middle")
		$nh = 156;		
	
	else
		$nh = floor($height * $width/$nw);
	
	if($row['type'] == "image")
	{
		if(!empty($row['url']))
			echo '<a href="'. $row['url'] . '" target="_blank">';
		?>
	  <img src="<?php echo $path . $addfilename; ?>" border="0" alt="<?php echo $row['title']; ?>" width="<?php echo $nw; ?>" height="<?php echo $nh; ?>"<?php if($addposition == "bottom"){ ?> style="padding:0px 12px 0px 12px" class="imgborder"<?php } ?>>
    <?php
		if(!empty($row['url']))
    	echo '</a>';
	}
	elseif($row['type'] == "flash")
	{		
		?>
    <div class="flash">
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
      <param name="movie" value="<?php echo $path . CMS_ADDS_DIR . $row['filename']; ?>" />
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="6.0.65.0" />
      <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
      <!--[if !IE]>-->
      <object type="application/x-shockwave-flash" data="<?php echo $path . CMS_ADDS_DIR . $row['filename']; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
        <!--<![endif]-->
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
        <div>
          <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
        </div>
        <!--[if !IE]>-->
      </object>
      <!--<![endif]-->
    </object>    
    </div>
    <?php
	}	
	elseif($row['type'] == "script")
	{
		?>
		<div class="script">
    	<?php echo $row['adcode']; ?>
		</div>
    <?php
	}
}
?>