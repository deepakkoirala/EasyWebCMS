<?php
/*
	include ("../fckeditor/fckeditor.php");
	$sBasePath="../fckeditor/";
	
	$oFCKeditor = new FCKeditor('shortcontents');
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $groupRow['shortcontents'];
	$oFCKeditor->Height		= "205";
	$oFCKeditor->ToolbarSet	= "Weblink";	
	$oFCKeditor->Create(); 
	
	$oFCKeditor = new FCKeditor('contents');
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $groupRow['contents'];
	$oFCKeditor->Height		= "300";
	$oFCKeditor->ToolbarSet	= "Weblink";	
	$oFCKeditor->Create(); 	
	*/
?>
<br>
Enter your Short Description
<textarea name="shortcontents"><?php if(isset($groupRow['shortcontents'])) echo $groupRow['shortcontents']; ?></textarea>
<br>
Enter your Full Body Description
<textarea name="contents"><?php if(isset($groupRow['contents'])) echo $groupRow['contents']; ?></textarea>
