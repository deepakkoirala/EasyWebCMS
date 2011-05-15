<?php
class Galleries
{
 function save($groupId, $caption, $ext,$imageLink)
 {
  global $conn;
 
  $sql = "INSERT INTO galleries
					SET
						groupId = '". cleanQuery($groupId) ."',
						caption = '". cleanQuery($caption) ."',
						ext='" . cleanQuery($ext) ."',
						imageLink='" . cleanQuery($imageLink) ."',
						onDate = NOW()";
  $conn->exec($sql);
  
  return $conn->insertId();
 }
 
 function update($id, $caption,$imageLink)
 {
  global $conn;
  
  $sql = "UPDATE galleries SET caption = '" . cleanQuery($caption) ."' , imageLink = '". cleanQuery($imageLink) ."' WHERE id = '" . cleanQuery($id) ."'";
  $conn->exec($sql);
 }
 
 function delete($id)
 {  
  global $conn;
  
  $result = $this->getById($id);
  $row = $conn->fetchArray($result);
  $file = "../" . CMS_IMAGES_DIR . $id . "." . $row['ext'];
  if (file_exists($file))
  {
   unlink($file);
  }
  
	$sql = "DELETE FROM galleries WHERE id = '" . cleanQuery($id) ."'";
	$conn->exec($sql);
 }
 
 function getById($id)
 {
  global $conn;
  
  $sql = "SELECT * FROM galleries WHERE id = '" . cleanQuery($id) ."'";
  return $conn->exec($sql);
 }
 
 function getByGroupId($groupId)
 {
  global $conn;
  
  $sql = "SELECT * FROM galleries WHERE groupId = '" . cleanQuery($groupId) ."'";
  return $conn->exec($sql);
 }
 
 function getByGroupIdWithLimit($groupId, $limit)
 {
  global $conn;
  
  $sql = "SELECT * FROM galleries WHERE groupId = '" . cleanQuery($groupId) ."' ORDER BY id DESC limit $limit";
  return $conn->exec($sql);
 }

 function getNextResult($id)
 {
  global $conn;
  
  $result = $this->getById($id);
  $row = $conn->fetchArray($result);
  
  $groupId = $row['groupId'];
  
  $sql = "SELECT * FROM galleries WHERE  
  			groupId = '" . cleanQuery($groupId) ."' AND id > '" . cleanQuery($id) ."' LIMIT 1";
  $result = $conn->exec($sql);
  if ($conn->numRows($result) == 0)
  {
   $sql = "SELECT * FROM galleries WHERE groupId = '" . cleanQuery($groupId) ."' LIMIT 1";
   $result = $conn->exec($sql);
   return $result;
  }
  else
  {
   return $result;
  }
 }
 
function getPreviousResult($id)
 {
  global $conn;
  
  $result = $this->getById($id);
  $row = $conn->fetchArray($result);
  
  $groupId = $row['groupId'];
  
  $sql = "SELECT * FROM galleries WHERE  
  			groupId = '" . cleanQuery($groupId) ."' AND id < '" . cleanQuery($id) ."' ORDER BY id DESC LIMIT 1";
  $result = $conn->exec($sql);
  if ($conn->numRows($result) == 0)
  {
   $sql = "SELECT * FROM galleries WHERE groupId = '" . cleanQuery($groupId) ."' ORDER BY id DESC LIMIT 1";
   $result = $conn->exec($sql);
   return $result;
  }
  else
  {
   return $result;
  }
 }
 
 function getLatest($howmany)
 {
 	global $conn;
	
	$sql = "SELECT * FROM galleries ORDER BY id DESC LIMIT $howmany";
	return $conn->exec($sql);
 }
 
 function getGroupNameById($id)
 {
		global $conn;
		
		$sql = "SELECT * FROM galleries WHERE id = '" . cleanQuery($id) ."'";
		$result = $conn -> fetchArray($conn->exec($sql));
		return $result['caption'];
 } 
 function getParentDetailsById($id)
 {
	 global $conn;
		
		$sql = "SELECT groups.* FROM groups, galleries WHERE galleries.id = '". cleanQuery($id) ."' AND galleries.groupId = groups.id";
		$result = $conn -> fetchArray($conn->exec($sql));
		return $result;
 }
}

?>
