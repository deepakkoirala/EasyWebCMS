<?php
class Adds
{
	function saveOrUpdate($id = 0, $title, $filename, $url, $adcode, $indexing, $type, $position)
	{
		global $conn;
		
		$title = cleanQuery($title);		
		$filename = cleanQuery($filename);
		$url = cleanQuery($url);
		$adcode = cleanQuery($adcode);
		$indexing = cleanQuery($indexing);
		$type = cleanQuery($type);
		$position = cleanQuery($position);
		
		if($id > 0)
			$sql = "UPDATE adds SET title = '$title', filename = '$filename', url = '$url', adcode = '$adcode', indexing = '$indexing', `type` = '$type', `position` = '$position' WHERE id = '$id'";
		else
			$sql = "INSERT INTO adds SET title = '$title', filename = '$filename', url = '$url', adcode = '$adcode', indexing = '$indexing', `type` = '$type', `position` = '$position', onDate = NOW()";
		//echo $sql;
		$result = $conn -> exec($sql);
		
		if($id > 0)
			return $conn -> affRows();
		else
			return $conn -> insertId();			
	}
	
	function getByPosition($position)
	{
		global $conn;
		
		$position = cleanQuery($position);
		
		$sql = "SELECT * FROM adds WHERE `position` = '$position' ORDER BY indexing ASC";
		$result = $conn -> exec($sql);
		
		return $result;
	}
	
	function getByPositionWithLimit($position, $limit)
	{
		global $conn;
		
		$position = cleanQuery($position);
		$limit = cleanQuery($limit);
		
		$sql = "SELECT * FROM adds WHERE `position` = '$position' ORDER BY indexing ASC LIMIT $limit";
		$result = $conn -> exec($sql);
		
		return $result;
	}
	
	function getById($id)
	{
		global $conn;
		
		$id = cleanQuery($id);
		
		$sql = "SELECT * FROM adds WHERE id = '$id'";
		$result = $conn -> exec($sql);
		$row = $conn -> fetchArray($result);
		
		return $row;
	}
	
	function delete($id)
	{
		global $conn;
		
		$id = cleanQuery($id);
		
		$row = $this -> getById($id);
		@unlink("../". CMS_ADDS_DIR . $row['filename']);
		
		$sql = "DELETE FROM adds WHERE id = '$id'";
		$result = $conn -> exec($sql);
		
		return $conn -> affRows();
	}
	
	function updateIndexing($id, $indexing)
	{
		global $conn;
		
		$id = cleanQuery($id);
		$indexing = cleanQuery($indexing);
		
		$sql = "UPDATE adds SET indexing = '$indexing' WHERE id = '$id'";
		$result = $conn -> exec($sql);

		return $conn -> affRows();
	}
}
?>