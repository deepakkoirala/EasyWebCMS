<?php
class ListingFiles
{
 function save($listingId, $caption, $filename)
 {
  global $conn;
  
  $sql = "INSERT INTO listingfiles
					SET
						listingId = '" . cleanQuery($listingId) . "',
						caption = '" . cleanQuery($caption) ."',
						filename='" . cleanQuery($filename) ."',
						onDate = NOW()";
  $conn->exec($sql);
  
  return $conn->insertId();
 }
 
 function delete($id)
 {  
  global $conn;
  
  $result = $this->getById($id);
  $row = $conn->fetchArray($result);
	//echo $row['filename'] . "--";
  $file = "../" . CMS_LISTING_FILES_DIR . $row['filename'];
  if (file_exists($file))
  {
   unlink($file);
  }
  
	$sql = "DELETE FROM listingfiles WHERE id = '$id'";
  $conn->exec($sql);
 } 
 
 function getById($id)
 {
  global $conn;
  
  $sql = "SELECT * FROM listingfiles WHERE id = '$id'";
  return $conn->exec($sql);
 }
 
 function getByListingId($listingId)
 {
  global $conn;
  
  $sql = "SELECT * FROM listingfiles WHERE listingId = '$listingId' ORDER BY id DESC";
  return $conn->exec($sql);
 }
 
 function getTotalAttachmentsByListingId($listingId)
 {
  global $conn;
  
  $sql = "SELECT count(*) as total FROM listingfiles WHERE listingId = '$listingId'";
  $result = $conn->exec($sql);
	$row = $conn->fetchArray($result);
	
	return $row['total'];
 }
}
?>