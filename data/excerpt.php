<?php

class Excerpt {
	
	function excerptWithOutTags($value, $length)
	{
		$desc = explode(' ',strip_tags($value));
		//for($i=0;$i<$length;$i++)
		//	$ret .= $desc[$i]." ";
		$ret = implode(' ', array_slice($desc, 0, $length));
		if($ret=="")
			return;
		return $ret."..";
	}
	
	function excerptWithSomeTags($value, $length, $tags="<p><br><a>")
	{
		$desc = explode(' ',strip_tags($value,$tags));
		//for($i=0;$i<$length;$i++)
			//$ret .= $desc[$i]." ";
		$ret = implode(' ', array_slice($desc, 0, $length));
		return $ret."..";
	}

}

?>