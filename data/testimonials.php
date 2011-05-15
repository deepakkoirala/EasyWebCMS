<?php
class Testimonials 
{
	function insertTests($name,$address,$comments, $filename)
	{
		global $conn;
		$sql="INSERT INTO testimonials SET Name = '". cleanQuery($name) ."', address = '". cleanQuery($address) ."', Comments = '". cleanQuery($comments) ."', filename = '". cleanQuery($filename) ."', nDate = NOW()";

		$result=$conn -> exec($sql);
		return $conn ->insertId();
	}
	
	function getById($test_id)
	{
		global $conn;
		$sql = "SELECT * FROM testimonials WHERE test_id = '$test_id'";
		//echo $sql;
		$result = $conn->exec($sql);
		if($result){
			return $conn -> fetchArray($result);
		}//end if
		else{
			return false;
		}//end else
	}//end function
	
	function getWithLimit($limit)
	{
		global $conn;
		$sql = "SELECT * FROM testimonials ORDER BY test_id DESC LIMIT $limit";
		$result = $conn->exec($sql);
		return $result;
	}
	
	function getAllTestsInfo()		
	{
		global $conn;
		$sql = "SELECT * FROM testimonials ORDER BY test_id DESC, nDate DESC";
		//echo $sql;
		$result = $conn->exec($sql);
		return $result;
	}//end function
	
	function getAllactiveTestsInfo()		
	{
		global $conn;
		$sql = "SELECT * FROM testimonials WHERE status=1 ORDER BY test_id DESC, nDate DESC";
		//echo $sql;
		$result = $conn->exec($sql);
		return $result;
	}//end function		
	
	function getactiveTestsInfoLimit($howmany)		
	{
		global $conn;
		$sql = "SELECT * FROM testimonials WHERE status=1 ORDER BY test_id DESC, nDate DESC LIMIT 0,$howmany";
		//echo $sql;
		$result = $conn->exec($sql);
		return $result;
	}//end function	
	
	function checkAllactiveTestsCount()		
	{
		global $conn;
		$sql = "SELECT * FROM testimonials WHERE status=1 ORDER BY nDate DESC";
		//echo $sql;
		$result = $conn->exec($sql);
		if($result){
			return $conn -> numRows($result);
		}//end if
		else{
			return false;
		}//end else
	}//end function
	
	function updateTestsStat($ref)
	{
		global $conn;
		
		$row = $this ->getById($ref);
		if($row['status']==1)
			$stat = 0;
		else
			$stat = 1;
		$sql="UPDATE testimonials SET `status` = '$stat' WHERE test_id='$ref'";
		//echo $sql;exit;
		$result = $conn->exec($sql);
		return $conn -> affRows();
	}//end function
	
	function deleteTestsByID($test_id)
	{
		global $conn;
		$del = "DELETE FROM testimonials WHERE test_id='$test_id'";
		$dres = mysql_query($del) or die(mysql_error());
		if($dres)
		return true;//end if 
		else return false;//end else
	}//end function
	
	function Activate($id)
	{
		global $conn;
		$del = "UPDATE testimonials SET `status` = 1 WHERE test_id='$id'";
		$dres = mysql_query($del) or die(mysql_error());
		return $conn -> affRows();
	}
	
	function RemoveActivate($id)
	{
		global $conn;
		$del = "UPDATE testimonials SET `status` = 0 WHERE test_id = '$id'";
		$dres = mysql_query($del) or die(mysql_error());
		return $conn -> affRows();
	}
	
	function getLatest($howmany)
	{
		global $conn;
		$sql = "SELECT * FROM testimonials WHERE `status` = 1 ORDER BY test_id DESC LIMIT $howmany";
		//echo $sql;
		$result = $conn->exec($sql);
		return $result;
	}
	
}
?>