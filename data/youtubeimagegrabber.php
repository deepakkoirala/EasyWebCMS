<?php 
function getYouTubeImage($url, $size)
{
	if($url == ""){ return; }
	$size = ($size == "") ? "big" : $size;

	$results = explode("?v=", $url);

	$vid = ( $results == "" ) ? $url : $results[1];
	if($size == "small"){ return "http://i1.ytimg.com/vi/". $vid ."/default.jpg"; }
	else { return "http://i1.ytimg.com/vi/". $vid ."/hqdefault.jpg"; }
}
/*
<!--
<script type="text/javascript">
function getScreen( url, size )
{
	if(url === null){ return ""; }
	size = (size === null) ? "big" : size;
	var vid;
	var results;
	results = url.match("[\\?&]v=([^&#]*)");
	vid = ( results === null ) ? url : results[1];
	if(size == "small"){ return "http://img.youtube.com/vi/"+vid+"/2.jpg";  }
	else {    return "http://img.youtube.com/vi/"+vid+"/0.jpg";  }
}

imgUrl_big   = getScreen("uVLQhRiEXZs");
imgUrl_small = getScreen("uVLQhRiEXZs", 'small');
document.getElementById('utimg').src = imgUrl_small;
</script>
-->
*/
?>