<?php
class Songs
{
	function saveOrUpdate($id = 0, $title, $filename, $indexing, $type)
	{
		global $conn;
		
		$title = cleanQuery($title);
		$filename = cleanQuery($filename);
		$indexing = cleanQuery($indexing);
		$type = cleanQuery($type);
		
		if($id > 0)
			$sql = "UPDATE songs SET title = '$title', filename = '$filename', indexing = '$indexing', `type` = '$type' WHERE id = '$id'";
		else
			$sql = "INSERT INTO songs SET title = '$title', filename = '$filename', indexing = '$indexing', `type` = '$type', onDate = NOW()";
		//echo $sql;
		$result = $conn -> exec($sql);
		
		if($id > 0)
			return $conn -> affRows();
		else
			return $conn -> insertId();			
	}
	
	function getByType($type)
	{
		global $conn;
		
		$type = cleanQuery($type);
		
		$sql = "SELECT * FROM songs WHERE `type` = '$type' ORDER BY indexing ASC";
		$result = $conn -> exec($sql);
		
		return $result;
	}
	
	function getByTypeWithLimit($type, $limit)
	{
		global $conn;
		
		$position = cleanQuery($position);
		$limit = cleanQuery($limit);
		
		$sql = "SELECT * FROM songs WHERE `type` = '$type' ORDER BY indexing ASC LIMIT $limit";
		$result = $conn -> exec($sql);
		
		return $result;
	}
	
	function getById($id)
	{
		global $conn;
		
		$id = cleanQuery($id);
		
		$sql = "SELECT * FROM songs WHERE id = '$id'";
		$result = $conn -> exec($sql);
		$row = $conn -> fetchArray($result);
		
		return $row;
	}
	
	function delete($id)
	{
		global $conn;
		
		$id = cleanQuery($id);
		
		$row = $this -> getById($id);
		@unlink("../". CMS_SONGS_DIR . $row['filename']);
		
		$sql = "DELETE FROM songs WHERE id = '$id'";
		$result = $conn -> exec($sql);
		
		return $conn -> affRows();
	}
	
	function updateIndexing($id, $indexing)
	{
		global $conn;
		
		$id = cleanQuery($id);
		$indexing = cleanQuery($indexing);
		
		$sql = "UPDATE songs SET indexing = '$indexing' WHERE id = '$id'";
		$result = $conn -> exec($sql);

		return $conn -> affRows();
	}
}
?>