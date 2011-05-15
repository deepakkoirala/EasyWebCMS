<?php
class Hotels
{
	function saveOrUpdate($id = 0, $cityId, $title, $urltitle, $category, $singleRoomRent, $doubleRoomRent, $details, $weight)
	{
		global $conn;
		
		$cityId = cleanQuery($cityId);
		$title = cleanQuery($title);
		$urltitle = cleanQuery($urltitle);
		$category = cleanQuery($category);
		$singleRoomRent = cleanQuery($singleRoomRent);
		$doubleRoomRent = cleanQuery($doubleRoomRent);
		$details = cleanQuery($details);
		
		if($id > 0)
			$sql = "UPDATE hotels SET cityId = '$cityId', title = '$title', urltitle = '$urltitle', category = '$category', singleRoomRent = '$singleRoomRent', doubleRoomRent = '$doubleRoomRent', details = '$details', weight = '$weight' WHERE id = '$id'";
		else
			$sql = "INSERT INTO hotels SET cityId = '$cityId', title = '$title', urltitle = '$urltitle', category = '$category', singleRoomRent = '$singleRoomRent', doubleRoomRent = '$doubleRoomRent', details = '$details', weight = '$weight', onDate = NOW()";

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
		
		$sql = "SELECT * FROM hotels WHERE id = '$id'";
		$result = $conn -> exec($sql);
		$row = $conn -> fetchArray($result);
		
		return $row;
	}
	
	function delete($id)
	{
		global $conn;
		
		$id = cleanQuery($id);
		
		$sql = "DELETE FROM hotels WHERE id = '$id'";
		$result = $conn -> exec($sql);
		
		return $conn -> affRows();
	}
	
	function getAll()
	{
		global $conn;
		
		$sql = "SELECT * FROM hotels ORDER BY title ASC";
		$result = $conn -> exec($sql);
		return $result;
	}
	
	function getByCity($cityId)
	{
		global $conn;
		
		$sql = "SELECT * FROM hotels WHERE cityId = '$cityId' ORDER BY title ASC";
		$result = $conn -> exec($sql);
		return $result;
	}
	
	function getByURLName($urltitle)
	{
		global $conn;
		
		$sql = "SElECT * FROM hotels WHERE urltitle = '$urltitle'";
		$result = $conn->exec($sql);
		$numRows = $conn -> numRows($result);
		if($numRows > 0)
		{
			$row = $conn->fetchArray($result);
			return $row;
		}
		return false;
	}
	
	function isUnique($id, $urltitle)
	{
		global $conn;
		
		$sql = "SELECT COUNT(id) cnt FROM hotels WHERE urltitle = '$urltitle' AND id <> $id";

		$result = $conn->exec($sql);
		$row = $conn -> fetchArray($result);
		if($row['cnt'] > 0)
		{
			return false;
		}
		return true;
	}
}
?>