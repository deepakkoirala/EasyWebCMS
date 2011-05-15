<?php

class menu{

	function dropDown($parent_id_obj)
	{
		global $groups, $conn;
		$url = basename($_SERVER["REQUEST_URI"]);
		echo "<ul>";
		$x = 0;
			while($result = $conn->fetchObject($parent_id_obj))
			{ 
				$link = $this->link_type($result);
				$x++;
				if(($link == $url) || (count($_GET)==0 && $x==1 && $result->parentId == 0 )) $active = " class=active"; else $active= "";
				if($this->is_group($result->id))
				{
					echo "<li class='parent'><a$active href='$link'>".$result->name."</a>";
					$pass = $groups->getVisibleByParentId($result->id);
					$this->dropDown($pass);
				}
				else
				{
					echo "<li><a$active href='$link'>".$result->name."</a>";
				}
				
					echo "</li>";
					
					
			}
			echo "</ul>";
		
		 
		}

		function is_group($parent_id)
		{
			global $groups,$conn;
			$query = $groups->getVisibleByParentId($parent_id);
			$res = $conn->numRows($query);
			return $res;
		}
	
		function link_type($zm)
		{
			$linkType = $zm->linkType;
			switch($linkType)
			{	
				case "File":
				$link= CMS_FILES_DIR.$zm->contents;
				break;				
			
				case "Link":
				$link = $zm->contents;
				break;
		
				default:
				$link = $zm->urlname.".html";
				break;
						
			}

				return $link;
		}
}

?>