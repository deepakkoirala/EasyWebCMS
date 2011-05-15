<?php
class Feedbacks
{
	function save($fullname, $email, $country, $comment)
	{
		global $conn;
		
		$fullname = cleanQuery($fullname);
		$email = cleanQuery($email);
		$country = cleanQuery($country);
		$comment = cleanQuery($comment);
		
				
		$sql = "INSERT INTO feedbacks SET fullname = '$fullname', email = '$email', country='$country', feedback = '$comment', onDate = NOW()";
		$result = $conn->exec($sql);
		
		return $conn->insertId();
	}	
	
	function delete($id)
	{  
		global $conn;
		
		$id = cleanQuery($id);
		
		$sql = "DELETE FROM feedbacks WHERE id = '$id'";
		$conn->exec($sql);
		
		return $conn -> affRows();
	}
	
	function getById($id)
	{
		global $conn;
		
		$id = cleanQuery($id);
		
		$sql = "SElECT * FROM feedbacks WHERE id = '$id'";
		$result = $conn->exec($sql);
		return $conn -> fetchArray($result);
	}
}
?>