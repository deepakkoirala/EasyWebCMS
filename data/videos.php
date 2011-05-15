<?php
class Videos
{
	function save($groupId, $title, $url)
 	{
  	global $conn;
 
  	$sql = "INSERT INTO videos
						SET
							groupId = '". cleanQuery($groupId) ."',
							title = '". cleanQuery($title) ."',
							url ='" . cleanQuery($url) ."',
							onDate = NOW()";
  	$conn->exec($sql);
  
  	return $conn->insertId();
	}
 
 	function update($id, $title, $url)
 	{
  	global $conn;
  
  	$sql = "UPDATE videos SET title = '" . cleanQuery($title) . "', url = '" . cleanQuery($url) . "' WHERE id = '" . cleanQuery($id) ."'";
  	$conn->exec($sql);
 	}
 
 	function delete($id)
 	{  
  	global $conn;

		$sql = "DELETE FROM videos WHERE id = '$id'";
		$conn->exec($sql);
	}
 
 	function getById($id)
 	{
  	global $conn;
  
  	$sql = "SELECT * FROM videos WHERE id = '$id'";
  	return $conn->exec($sql);
 	}
 
 	function getByGroupId($groupId)
 	{
  	global $conn;
  
  	$sql = "SELECT * FROM videos WHERE groupId = '$groupId'";
  	return $conn->exec($sql);
 	}
 
 	function getByGroupIdWithLimit($groupId, $limit)
 	{
		global $conn;
  
  	$sql = "SELECT * FROM videos WHERE groupId = '$groupId' ORDER BY id DESC limit $limit";
  	return $conn->exec($sql);
 	}

 	function getLatest($howmany)
 	{
 		global $conn;
	
		$sql = "SELECT * FROM videos ORDER BY id DESC LIMIT $howmany";
		return $conn->exec($sql);
 	}
	
	function getByArrayWithLimit($arr, $limit)
 	{
 		global $conn;
	
		$sql = "SELECT * FROM videos WHERE groupId in ($arr) ORDER BY id DESC LIMIT $limit";
		return $conn->exec($sql);
 	}
	
	function getLatestByGroupIdVideoLink($groupId)
 	{
 		global $conn;
	
		$sql = "SELECT * FROM videos WHERE groupId = '$groupId' ORDER BY id DESC";
		$ayo = $conn->fetchArray($conn->exec($sql));
  		return end(explode("?v=",$ayo['url']));
 	}
}
?>
