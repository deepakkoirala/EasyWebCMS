<?php
if(!isset($_GET['page'])){
 $page = 1;
}
else {
 $page = $_GET['page'];
}

class Pager
{
 var $pagename;
 var $pageTitle;

 function findStart($page, $limit)
 {	 
  if ((!isset($page)) || ($page == "1"))
  {
   $start = 0;
   $page = 1;
  }
  else
  { 
   $start = ($page-1) * $limit;
  }
  return $start;
 } //function findStart ends

 function findPages($count, $limit)
 {
  $pages = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1;
  return $pages;
 } //function findPages ends

 function pageList($curpage, $pages)
 {
  $page_list  = "";

  if (($curpage != 1) && ($curpage)){
   $page_list .= "<a href=".$this->pagename."page=1 title=First Page class=paging>First</a>";
  }
  	
  if (($curpage-1) > 0){
   $page_list .= "&nbsp;<a href=".$this->pagename."page=".($curpage-1)." title=Previous Page class=paging>Prev</a>&nbsp;";
  }
  	
  for ($i=1; $i<=$pages; $i++){
   if ($i == $curpage){
    $page_list .= "<b>".$i."</b>";
   }
   else {
    $page_list .= "<a href=".$this->pagename."page=".$i." title=Page ".$i." class=paging>".$i."</a>";
   }
   $page_list .= " ";
  }
  if (($curpage+1) <= $pages){
   $page_list .= "<a href=".$this->pagename."page=".($curpage+1)." title=Next Page class=paging>Next</a>";
  }
  	
  if (($curpage != $pages) && ($pages != 0)){
   $page_list .= " <a href=".$this->pagename."page=".$pages." title=Last Page class=paging>Last</a>";
  }
  $page_list .= "\n";
  return $page_list;
 } //function pageList ends
}
//paging ends

//------for listing orders of this customer
//$db=new Dbconn();

$sqlord=$sql;
$rsord = mysql_query($sqlord);
if($rsord)
{
 $cntorder=mysql_num_rows($rsord);
}
$p = new Pager();
$p->pagename = $pagename;
$p->pageTitle = $pageTitle;

if (!isset($limit))
	$limit = 10;	// no of records to be displayed in each page

$count=$cntorder;
$MaxPage=$cntorder;
$pages = $p->findPages($count, $limit);

$start = $p -> findStart($page, $limit);

/*if ((!isset($page)) || ($page == "1"))
{
 $result = mysql_query($sql." LIMIT ".$start.", ".$limit);
}
else
{
*/
$sql.=" LIMIT ".$start.", ".$limit;
$result = mysql_query($sql);
//}

$pagelist = $p->pageList($page, $pages);
?>