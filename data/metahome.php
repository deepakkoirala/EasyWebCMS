<?php
class metaHome{
	
	function update($id =1, $pageTitle, $metaKeyWords, $metaDescription){
		global $conn;
		$sql = "UPDATE metahome SET
				pageTitle = '".cleanQuery($pageTitle)."',
				pageKeyword = '".cleanQuery($metaKeyWords)."', 
				metaDescription = '".cleanQuery($metaDescription)."'
				WHERE
				id = '$id'";
				
				//".cleanQuery($metaKeywords)."
		
		$conn -> exec($sql);
	}
	function save($id,$pageTitle, $metaKeyWords, $metaDescription){
		global $conn;
		$query="INSERT INTO metahome 
						SET 
						id='".cleanQuery("1")."',
						pageTitle = '".cleanQuery($pageTitle)."',
				pageKeyword = '".cleanQuery($metaKeyWords)."', 
				metaDescription = '".cleanQuery($metaDescription)."'
				";
				
		$conn->exec($query);

	}
	function getById($id=1){
		global $conn;
		$sql = "SELECT * FROM metahome where id= '".cleanQuery($id)."'";
		$result  = $conn -> exec($sql);
		return $result;
	}
}
?>