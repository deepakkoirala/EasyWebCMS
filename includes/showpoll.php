<?php
include("../data/conn.php");
include("../data/polls.php");
include("../data/sqlinjection.php");
include("../data/constants.php");

$conn = new Dbconn();
$polls = new Polls();

$id = $_GET['id'];
?>
<div class="options" style="float:left;">
	<?php
  $i = 0;
  $result = $polls -> getOptionsByPollId($id);
  while($row = $conn -> fetchArray($result))
  { 
    $vote = $polls -> getVote($id, $row['totalVote']);
    /*$vt = "";
    for($i=0; $i<strlen($vote); $i++)
    {
      if($vote[$i] == ".")
        $vt .= ".";
      else
        $vt .= $arrNepaliNumbers[$vote[$i]];
    }
    $vt .= '%';*/
    ?>
   <div style="float:left; width:80%"> <?php echo $row['option']; ?></div>  <div style="width:10%; float:left;"><?php echo $vote; ?></div>
  <?php
    $i++;
  }
  ?>
  <div class="CB"></div>
  <input type="button" name="btnBack" value="Back" onClick="goBack();" class="btn">  
  <input type="button" name="btnMore" onclick="location.href='index.php?action=poll';" value="More" class="btn">
</div>