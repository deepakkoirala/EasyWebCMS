<?php
class Cities
{
	function saveOrUpdate($id = 0, $title, $weight)
	{
		global $conn;
		
		$title = cleanQuery($title);
		
		if($id > 0)
			$sql = "UPDATE cities SET title = '$title', weight = '$weight' WHERE id = '$id'";
		else
			$sql = "INSERT INTO cities SET title = '$title', weight = '$weight'";
		//echo $sql;
		$result = $conn -> exec($sql);
		
		if($id > 0)
			return $conn -> affRows();
		else
			return $conn -> insertId();			
	}
		
	function getById($id)
	{
		global $conn;
		
		$id = cleanQuery($id);
		
		$sql = "SELECT * FROM cities WHERE id = '$id'";
		$result = $conn -> exec($sql);
		$row = $conn -> fetchArray($result);
		
		return $row;
	}
	
	function delete($id)
	{
		global $conn;
		
		$id = cleanQuery($id);
		
		$sql = "DELETE FROM cities WHERE id = '$id'";
		$result = $conn -> exec($sql);
		
		return $conn -> affRows();
	}
	
	function getAll()
	{
		global $conn;
		
		$sql = "SELECT * FROM cities ORDER BY title ASC";
		$result = $conn -> exec($sql);
		return $result;
	}
	
	function isDeletable($id)
	{
		global $conn;
		
		$sql = "SELECT COUNT(*) cnt FROM hotels WHERE cityId = '$id'";
		$result = $conn -> exec($sql);
		$row = $conn -> fetchArray($result);
		if($row['cnt'] > 0)
			return false;
		return true;
	}
	
	function getCity($id)
	{
		global $conn;
		
		$sql = "SELECT title FROM cities WHERE id = '$id'";
		$result = $conn -> exec($sql);
		$row = $conn -> fetchArray($result);
		return $row['title'];
	}
}
?>