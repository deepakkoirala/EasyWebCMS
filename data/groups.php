<?php
class Groups
{
	function save_three($name, $urlname,  $type, $parentId, $linkType, $shortcontents, $contents,  $weight, $hide, $pageTitle, $pageKeyword)
	{
		global $conn;
		
		$sql = "INSERT INTO groups 
							SET name = '" . cleanQuery($name) ."',
							urlname = '" . cleanQuery($urlname) ."',
							type='". cleanQuery($type) ."',
							parentId='" . cleanQuery($parentId) ."',
							linkType = '". cleanQuery($linkType) ."',
							shortcontents = '" . cleanQuery($shortcontents) ."',
							contents='" . cleanQuery($contents) ."',						
							weight = '". cleanQuery($weight) ."',
							hide = '". cleanQuery($hide) ."',
							pageTitle = '". cleanQuery($pageTitle) ."',
							pageKeyword = '". cleanQuery($pageKeyword) ."',
							onDate = NOW()";
		
		$conn->exec($sql);
		
		return $conn->insertId();
	}
	
	function save($name, $urlname, $type, $parentId, $linkType, $shortcontents, $contents, $weight, $hide, $pageTitle, $pageKeyword,$metaDescription)
	{
		global $conn;
		
		$sql = "INSERT INTO groups 
							SET name = '" . cleanQuery($name) ."',
							urlname = '" . cleanQuery($urlname) ."',
							type='". cleanQuery($type) ."',
							parentId='" . cleanQuery($parentId) ."',
							linkType = '". cleanQuery($linkType) ."',
							shortcontents = '" . cleanQuery($shortcontents) ."',
							contents='" . cleanQuery($contents) ."',
							weight = '". cleanQuery($weight) ."',
							hide = '". cleanQuery($hide) ."',
							pageTitle = '". cleanQuery($pageTitle) ."',
							pageKeyword = '". cleanQuery($pageKeyword) ."',
							metaDescription = '".cleanQuery($metaDescription)."',
							onDate = NOW()";
		
		$conn->exec($sql);
		
		return $conn->insertId();
	}
	
	function update_three($id, $name, $urlname, $parentId, $shortcontents, $contents,  $weight, $hide, $pageTitle, $pageKeyword,$metaDescription)
	{
		global $conn;
		
		$sql = "UPDATE groups
						SET
							name = '" . cleanQuery($name) ."',
							urlname = '" . cleanQuery($urlname) ."',
							parentId='". cleanQuery($parentId) ."',
							shortcontents = '" . cleanQuery($shortcontents) ."',
							contents = '" . cleanQuery($contents) . "',						
							weight = '" . cleanQuery($weight) ."',
							hide = '". cleanQuery($hide) ."',
							pageTitle = '". cleanQuery($pageTitle) ."',
							pageKeyword = '". cleanQuery($pageKeyword) ."',
							metaDescription = '".cleanQuery($metaDescription)."'
						WHERE
							id = '$id'";
		
		$conn->exec($sql);
	}
	
		function update($id, $name, $urlname, $parentId, $shortcontents, $contents,  $weight, $hide, $pageTitle, $pageKeyword,$metaDescription)
	{
		global $conn;
		
		$sql = "UPDATE groups
						SET
							name = '" . cleanQuery($name) ."',
							urlname = '" . cleanQuery($urlname) ."',
							days = '" . cleanQuery($days) ."',
							parentId='". cleanQuery($parentId) ."',
							shortcontents = '" . cleanQuery($shortcontents) ."',
							contents = '" . cleanQuery($contents) . "',
							weight = '" . cleanQuery($weight) ."',
							hide = '". cleanQuery($hide) ."',
							pageTitle = '". cleanQuery($pageTitle) ."',
							pageKeyword = '". cleanQuery($pageKeyword) ."',
							metaDescription = '".cleanQuery($metaDescription)."'
						WHERE
							id = '$id'";
		
		$conn->exec($sql);
	}
	
	function updateExt($id, $ext)
	{
		global $conn;
		
		$sql = "UPDATE groups SET ext = '" . cleanQuery($ext) ."' WHERE id = '" . cleanQuery($id) ."'";
		
		$conn->exec($sql);
	}

	function delete($id)
	{  
		global $conn;
		global $galleries;
		global $listings;
		global $videos;
		
		$result = $this->getById($id);
		$row = $conn->fetchArray($result);
		$file = "../" . CMS_GROUPS_DIR . $row['id'] . "." . $row['ext'];
		if (file_exists($file) && !empty($row['ext']))
		{
		 unlink($file);
		}
		
		if ($row['linkType'] == "File")
		{
			$file = "../" . CMS_FILES_DIR . $row['contents'];
			
			if (file_exists($file) && !empty($row['contents']))
			 unlink($file);
		}
		else if ($row['linkType'] == "Contents Page")
		{
			$gResult = $galleries->getByGroupId($id);
			while ($gRow = $conn->fetchArray($gResult))
			{
				$galleries->delete($gRow['id']);
			}
		}
		else if ($row['linkType'] == "List")
		{
			$lResult = $listings->getByGroupId($id);
			while ($lRow = $conn->fetchArray($lResult))
			{
				$listings->delete($lRow['id']);
			}
		}
		else if ($row['linkType'] == "Gallery")
		{
			$gResult = $galleries->getByGroupId($id);
			while ($gRow = $conn->fetchArray($gResult))
			{
				$galleries->delete($gRow['id']);
			}
		}
		else if ($row['linkType'] == "Video Gallery")
		{
			$gResult = $videos->getByGroupId($id);
			while ($gRow = $conn->fetchArray($gResult))
			{
				$videos->delete($gRow['id']);
			}
		}
		
		$sql = "DELETE FROM groups WHERE id = '" . cleanQuery($id) ."'";
		$conn->exec($sql);
	}
	
	function getAll()
	{
		global $conn;
		
		$sql = "SElECT * FROM groups";
		$result = $conn->exec($sql);
		
		return $result;
	}

	function getById($id)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE id = '" . cleanQuery($id) ."'";
		$result = $conn->exec($sql);
		
		return $result;
	}
	function getWhatById($what,$id)
	{
		global $conn;
		
		$sql = "SELECT $what FROM groups WHERE id = '" . cleanQuery($id) ."'";
		$result = $conn->exec($sql);
		$row = $conn->fetchArray($result);
		return $row[$what];
	}	
	
	function getByIdWithLimit($id,$limit)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE id = '" . cleanQuery($id) ."' LIMIT $limit";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getByTypeInitial($type, $initial)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE type = '$type' AND name LIKE '$initial%' ORDER BY weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getByParentId($parentId)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE parentId = '" . cleanQuery($parentId) ."' ORDER BY weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getVisibleByParentId($parentId)
	{
		global $conn;
		
		$sql = "SELECT * FROM groups WHERE parentId = '$parentId' AND hide = 'no' ORDER BY weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getVisibleByParentIdWithLimit($parentId, $limit)
	{
		global $conn;
		
		$sql = "SELECT * FROM groups WHERE parentId = '$parentId' AND hide = 'no' ORDER BY weight LIMIT $limit";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getByParentIdWithLimit($parentId, $limit)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE parentId = '" . cleanQuery($parentId) ."' AND hide = 'no' ORDER BY weight ASC, id DESC LIMIT $limit";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getByTypeParentId($type, $parentId)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE parentId = '" . cleanQuery($parentId) ."' AND `type` = '$type' AND hide= 'no' ORDER BY weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	function getByTypeParentWithId($type, $parentId)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE parentId = '" . cleanQuery($parentId) ."' AND `type` = '$type' ORDER BY weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getVisibleByTypeParentId($type, $parentId)
	{
		global $conn;
		
		$sql = "SELECT * FROM groups WHERE parentId = '$parentId' AND `type` = '$type' AND hide = 'no' ORDER BY weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getByTypeParentIdWithLimit($type, $parentId, $limit)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE parentId = '" . cleanQuery($parentId) ."' AND `type` = '$type' ORDER BY weight LIMIT $limit";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	
	function getByParentIdPrivilege($parentId, $userGroupId)
	{
		global $conn;
		
		$sql = "SElECT DISTINCT g.* FROM groups g, access a WHERE g.parentId = '$parentId' 
								AND g.id = a.groupId
								AND a.userGroupId = '$userGroupId'
								ORDER BY g.weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getByTypeParentIdPrivilege($type, $parentId, $userGroupId)
	{
		global $conn;
		
		$sql = "SElECT DISTINCT g.* FROM groups g, access a WHERE g.parentId = '$parentId' AND g.type = '$type' 
								AND g.id = a.groupId
								AND a.userGroupId = '$userGroupId'
								ORDER BY g.weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getByType($type)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE type = '$type' ORDER BY weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getNameById($id)
	{
		global $conn;
		
		$sql = "SElECT name FROM groups WHERE id = '$id'";
		$result = $conn->exec($sql);
		$row = $conn->fetchArray($result);
		return $row['name'];
	}
	function getUrlById($id)
	{
		global $conn;
		
		$sql = "SElECT urlname FROM groups WHERE id = '$id'";
		$result = $conn->exec($sql);
		$row = $conn->fetchArray($result);
		return $row['urlname'];
	}	

	function comboRecursion($parentId, $selectedId, $times)
	{
		global $conn;
		if (is_numeric($parentId))
			$sql = "SELECT * FROM groups WHERE parentId = '$parentId' ORDER BY weight";
		else
			$sql = "SELECT * FROM groups WHERE parentId = '0' AND type = '$parentId' ORDER BY weight";
			
		$result = $conn->exec($sql);
		
		while ($row = $conn->fetchArray($result))
		{
			$spaces = $this->spaces($times);
			if ($row['linkType'] != "Normal Group")
			{
				echo "<optgroup label='". $row['name'] ."'";
			}
			else
			{
				echo "<option value='".$row['id']."'";
				if ($row['id'] == $selectedId)
					echo " selected ";
			}
			echo ">";
			echo $spaces . $row['name'];
			if ($row['linkType'] != "Normal Group")
				echo "</optgroup>";
			else
				echo "</option>";
			$this->comboRecursion((int) $row['id'], $selectedId, ++$times);
			
			--$times;
		}
	}
	
	function spaces($times)
	{
		$spaces = "";
		for ($i=0; $i<$times;$i++)
			$spaces .= "--";
			
		return $spaces;
	}
	
	
	function writeBreadCrumb($id)
	{
		$list = array();
		$this->getBreadCrumb($id, $list);

		if(count($list) > 1)
			echo '<div id="breadcrumb">';
		
		for ($i=count($list)-1; $i>0; $i--)
		{
			echo $list[$i];
			echo "&nbsp;";
			echo "&raquo";
			echo "&nbsp;";
		}
		if(count($list) > 1)
			echo '</div>';
	}
	
	function getBreadCrumb($id, &$list)
	{
		global $conn;
		
		$result = $this->getById($id);
		
		while ($row = $conn->fetchArray($result))
		{
			//array_push($list, "<a class='breadcrumb' href=index.php?linkId=".$row['id'].">" . $row['name'] . "</a>");
			array_push($list, "<a class='breadcrumb' href='{$row['urlname']}.html'>" . $row['name'] . "</a>");
			$this->getBreadCrumb($row['parentId'], $list);
		}
	}
	function isDeletable($id)
	{
		global $conn;
		global $listings;
		
		$result = $this->getByParentId($id);
		if ($conn->numRows($result) > 0)  //has a child group
			return false;
		
		
		$lResult = $listings->getByGroupId($id);  //has listings
		if ($conn->numRows($lResult) > 0)
			return false;
		
		return true;
	}
	
	function getLastWeight($type, $parentId)
	{
		global $conn;
		
		$sql = "SElECT weight FROM groups WHERE `type` = '$type' AND parentId = '$parentId' ORDER BY weight DESC";
		$result = $conn->exec($sql);
		$numRows = $conn -> numRows($result);
		if($numRows > 0)
		{
			$row = $conn->fetchArray($result);
			return $row['weight'] + 5;
		}
		else
			return 5;
	}
	
	function getMainParent($id)
	{
		global $conn;
		global $mainParentId;
		
		$sql = "SElECT id, parentId FROM groups WHERE id = '$id'";
		$result = $conn->exec($sql);
		$row = $conn->fetchArray($result);

		if($row['parentId'] > 0)
			$this -> getMainParent($row['parentId']);
		else
		{
			$mainParentId = $id;
			return;
		}
	}
	
	function getByURLName($urlname)
	{
		global $conn;
		$sql = "SElECT * FROM groups WHERE urlname = '".cleanQuery($urlname)."'";
		$result = $conn->exec($sql);
		$numRows = $conn -> numRows($result);
		if($numRows > 0)
		{
			$row = $conn->fetchArray($result);
			return $row;
		}
		return false;
	}
	
	function isUnique($id, $urlname)
	{
		global $conn;
		
		$sql = "SELECT COUNT(id) cnt FROM groups WHERE urlname = '$urlname' AND id <> $id";

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
		
		$sql = "SElECT pageTitle FROM groups WHERE id = '". cleanQuery($id) ."'";
		$result = $conn->exec($sql);
		$row = $conn -> fetchArray($result);
		return $row['pageTitle'];
	}
	
	function getPageKeyword($id)
	{
		global $conn;
		
		$sql = "SElECT pageKeyword FROM groups WHERE id = '". cleanQuery($id) ."'";
		$result = $conn->exec($sql);
		$row = $conn -> fetchArray($result);
		return $row['pageKeyword'];
	}
	
	function getByPopular($id, $limit)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE parentId = '$id' ORDER BY visits DESC LIMIT $limit ";
		$result = $conn->exec($sql);
		return $result;
	}
	
	function getParentId($id){
		global $conn;
		$sql = "SELECT parentId FROM groups where id = '$id'";
		$result = $conn -> exec($sql);
		$row = $conn -> fetchArray($result);
		return $row['parentId'];
	}
 	function updateVisit($id){
		global $conn;
		$result = $this -> getById($id);
		$r1 = $conn -> fetchArray($result);
		$prev_visit = $r1['visits'];
		$new_visit = $prev_visit+1;
		$sql = "UPDATE groups set visits = $new_visit where id = $id limit 1";
		$upd = $conn->exec($sql);
	
	}
	function getName($id){
		
			global $conn;
			$sql="SELECT name from groups where id='". cleanQuery($id) ."'";
			$result=$conn->exec($sql);
			$row=$conn->fetchArray($result);
			return $name=$row["name"];
		}
		function getMetaDescription($id){
		
			global $conn;
			$sql="SELECT metaDescription from groups where id='". cleanQuery($id) ."'";
			$result=$conn->exec($sql);
			$row=$conn->fetchArray($result);
			return $row["metaDescription"];
		}
		
		function getShortContentsById($id)
		{
			global $conn;
			$sql="SELECT shortcontents from groups where id='". cleanQuery($id) ."'";
			$result=$conn->exec($sql);
			$row=$conn->fetchArray($result);
			return $row["shortcontents"];
			
		}
		
		function getLinkById($id)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE id = '$id'";
		$result = $conn->exec($sql);
		$row = $conn->fetchArray($result);
		$url = $row['urlname'].PAGE_EXTENSION;
		if($row['linkType']=="Link")
			$url = $row['contents'];
		return $url;
	}	
	
}
?>
