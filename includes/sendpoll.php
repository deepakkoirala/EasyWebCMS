<? 
include("../data/conn.php"); 
include("../data/polls.php"); 

$conn = new Dbconn();
$polls = new Polls();
 
$id = $_GET['pid'];
$optionId = $_GET['oid'];

$result = $polls -> getOptionsByPollId($id);
$counter = 0; 

while($row = $conn -> fetchArray($result)) 
{ 
	if ($row['id'] == $optionId)
	{ 
		$polls -> updateVote($id, $optionId); 
		++$counter;
	}
}


if($counter > 0)
{ 
	echo "Vote Submitted" ; 
}
else 
{ 
	echo "Submission Error"; 
} 
?>