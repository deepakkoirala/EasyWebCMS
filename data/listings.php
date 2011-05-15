<?php
class Listings
{
 function save($groupId, $title, $urltitle, $description, $main, $pageTitle, $pageKeyword,$listDescription)
 {
  global $conn;
   
  $sql = "INSERT INTO listings
					SET
						groupId = '" . cleanQuery($groupId) ."',
						title = '". cleanQuery($title) ."',
						urltitle = '". cleanQuery($urltitle) ."',
						description='" . cleanQuery($description) ."',
						main ='" . cleanQuery($main) ."',
						pageTitle = '". cleanQuery($pageTitle) ."',
						pageKeyword = '". cleanQuery($pageKeyword) ."',
						listMetaDescription = '".cleanQuery($listDescription)."',
						onDate = NOW()";
  $conn->exec($sql);
  
  return $conn->insertId();
 }
 
 function update($id, $title, $urltitle, $description, $main, $pageTitle, $pageKeyword,$listDescription)
 {
  global $conn;
  
  $sql = "UPDATE listings
					SET
						title = '" . cleanQuery($title) ."',
						urltitle = '". cleanQuery($urltitle) ."',
						description = '" . cleanQuery($description) ."',
						main ='" . cleanQuery($main) ."',
						pageTitle = '". cleanQuery($pageTitle) ."',
						pageKeyword = '". cleanQuery($pageKeyword) ."',
						listMetaDescription = '".cleanQuery($listDescription)."'
					WHERE
						id = '" . cleanQuery($id) ."'";
  $conn->exec($sql);
 }
 
 function updateExt($id, $ext)
 {
  global $conn;
  
  $sql = "UPDATE listings SET ext = '" . cleanQuery($ext) ."' WHERE id = '" . cleanQuery($id) ."'";
  $conn->exec($sql);
 }
 
 function delete($id)
 {  
  global $conn;
	global $listingFiles;
  
  $result = $this->getById($id);
  $row = $conn->fetchArray($result);
  $file = "../" . CMS_LISTINGS_DIR . $id . "." . $row['ext'];
  if (file_exists($file))
  {
   unlink($file);
  }
	
	$lfResult = $listingFiles->getByListingId($id);
	while ($lfRow = $conn->fetchArray($lfResult))
	{
		$listingFiles->delete($lfRow['id']);
	}
  
	$sql = "DELETE FROM listings WHERE id = '$id'";
  $conn->exec($sql);
 }
 
 function getById($id)
 {
  global $conn;
  
  $sql = "SELECT * FROM listings WHERE id = '$id'";
  return $conn->exec($sql);
 }
 
 function getByGroupId($groupId)
 {
  global $conn;
  
  $sql = "SELECT * FROM listings WHERE groupId = '$groupId' ORDER BY id DESC";
  return $conn->exec($sql);
 }

 function getLatestByGroupId($groupId, $howmany)
 {
  global $conn;
  
  $sql = "SELECT * FROM listings WHERE groupId = '$groupId' ORDER BY id DESC LIMIT $howmany";
  return $conn->exec($sql);
 }
 
 function getNextResult($id)
 {
  global $conn;
  
  $result = $this->getById($id);
  $row = $conn->fetchArray($result);
  
  $groupId = $row['groupId'];
  
  $sql = "SELECT * FROM listings WHERE  
  			groupId = '$groupId' AND id > '$id' LIMIT 1";
  $result = $conn->exec($sql);
  if ($conn->numRows($result) == 0)
  {
   $sql = "SELECT * FROM listings WHERE groupId = '$groupId' LIMIT 1";
   $result = $conn->exec($sql);
   return $result;
  }
  else
  {
   return $result;
  }
 }
 
 function getConditionalNextResult($id, $type, $newstype)
 {
  global $conn;
  
  $result = $this->getById($id);
  $row = $conn->fetchArray($result);
  
  $groupId = $row['groupId'];
  
  $sql = "SELECT listings.* FROM listings, groups WHERE  
  			groups.type = '$type' AND groups.id = listings.groupId AND listings.id > '$id'";
	if($newstype == "featured")
		$sql .= " AND listings.main = 'yes'";
	$sql .= " LIMIT 1";

  $result = $conn->exec($sql);
  if ($conn->numRows($result) == 0)
  {
   $sql = "SELECT listings.* FROM listings, groups WHERE groups.type = '$type' AND groups.id = listings.groupId";
	 if($newstype == "featured")
		$sql .= " AND listings.main = 'yes'";
	 $sql .= " LIMIT 1";
	
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
  
  $sql = "SELECT * FROM listings WHERE  
  			groupId = '$groupId' AND id < '$id' ORDER BY id DESC LIMIT 1";
  $result = $conn->exec($sql);
  if ($conn->numRows($result) == 0)
  {
   $sql = "SELECT * FROM listings WHERE groupId = '$groupId' ORDER BY id DESC LIMIT 1";
   $result = $conn->exec($sql);
   return $result;
  }
  else
  {
   return $result;
  }
 }
 
 function getConditionalPreviousResult($id, $type, $newstype)
 {
  global $conn;
  
  $result = $this->getById($id);
  $row = $conn->fetchArray($result);
  
  $groupId = $row['groupId'];
  
  $sql = "SELECT listings.* FROM listings, groups WHERE  
  			groups.type = '$type' AND groups.id = listings.groupId AND listings.id < '$id'";
	if($newstype == "featured")
		$sql .= " AND listings.main = 'yes'";
	$sql .= " ORDER BY id DESC LIMIT 1";

  $result = $conn->exec($sql);
  if ($conn->numRows($result) == 0)
  {
   $sql = "SELECT listings.* FROM listings, groups WHERE groups.type = '$type' AND groups.id = listings.groupId";
	 if($newstype == "featured")
		$sql .= " AND listings.main = 'yes'";
	 $sql .= " ORDER BY id DESC LIMIT 1";
	
   $result = $conn->exec($sql);
   return $result;
  }
  else
  {
   return $result;
  }
 }
 
 function getGroupNameById($id)
 {
  global $conn;
  
  $sql = "SELECT * FROM listings WHERE id = '$id'";
  
  $result = $conn ->fetchArray($conn->exec($sql));
  return $result['title'];
 }
 
 function getMainListingsByGroupIdWithLimit($groupId, $limit)
 {
  global $conn;
  
  $sql = "SELECT * FROM listings WHERE main = 'yes' AND groupId = '$groupId' ORDER BY id DESC LIMIT $limit";
  $result = $conn->exec($sql);
  return $result;
 }
 
 function getMainListingsWithLimit($limit)
 {
  global $conn;
  
  $sql = "SELECT listings.* FROM listings, groups WHERE listings.main = 'yes' AND listings.groupId = groups.id AND groups.type = 'News Category' ORDER BY id DESC LIMIT $limit";
  $result = $conn->exec($sql);
  return $result;
 }
 
 function getLatestWithLimit($limit)
 {
 	global $conn;
  
  $sql = "SELECT listings.* FROM listings, groups WHERE listings.groupId = groups.id AND groups.type = 'News Category' ORDER BY id DESC LIMIT $limit";
  $result = $conn->exec($sql);
  return $result;
 }
 
  function getInArrayWithLimit($str, $limit)
	{
		global $conn;
		
		$sql = "SElECT * FROM listings WHERE groupId IN ($str) ORDER BY id DESC LIMIT $limit";
		$result = $conn->exec($sql);
		return $result;
	}
	
	function getRelated($groupId, $exception)
  {
  global $conn;
  
  $sql = "SELECT * FROM listings WHERE groupId = '$groupId' AND id != '$exception' ORDER BY id DESC";
  return $conn->exec($sql);
  }
	
	function getRelatedWithLimit($groupId, $exception, $limit)
  {
  global $conn;
  
  $sql = "SELECT * FROM listings WHERE groupId = '$groupId' AND id != '$exception' ORDER BY id DESC LIMIT $limit";
  return $conn->exec($sql);
  }
	
	function getByURLName($urltitle)
	{
		global $conn;
		$sql = "SElECT * FROM listings WHERE urltitle = '".cleanQuery($urltitle)."'";
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
		
		$sql = "SELECT COUNT(id) cnt FROM listings WHERE urltitle = '$urltitle' AND id <> '$id'";
		$result = $conn->exec($sql);
		$row = $conn -> fetchArray($result);
		if($row['cnt'] > 0)
		{
			return false;
		}
		return true;
	}
 
 	function getPageTitle($id)
	{
		global $conn;
		
		$sql = "SElECT pageTitle FROM listings WHERE id = '". cleanQuery($id) ."'";
		$result = $conn->exec($sql);
		$row = $conn -> fetchArray($result);
		return $row['pageTitle'];
	}
	
	function getPageKeyword($id)
	{
		global $conn;
		
		$sql = "SElECT pageKeyword FROM listings WHERE id = '". cleanQuery($id) ."'";
		$result = $conn->exec($sql);
		$row = $conn -> fetchArray($result);
		return $row['pageKeyword'];
	}
	function getName($id){
		global $conn;
			$sql="SELECT title FROM listings where id='". cleanQuery($id) ."' ";
			$result=$conn->exec($sql);
			$row=$conn->fetchArray($result);
			return $row["title"];
		}
		function getMetaDescription($id){
		global $conn;
			$sql="SELECT listMetaDescription FROM listings where id='". cleanQuery($id) ."' ";
			$result=$conn->exec($sql);
			$row=$conn->fetchArray($result);
			return $row["listMetaDescription"];
		}


function getWhatByPosition($what,$pos,$id)
 {
  global $conn;
  $pos = $pos-1;
  $sql = "SELECT $what FROM listings WHERE groupId = '$id' order by id desc limit $pos, 1";
    $result = $conn ->fetchArray($conn->exec($sql));
  return $result[$what];
 }
 
 }
?>
