<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

if (isset($_GET['delete']))
{
	$feedbacks->delete($_GET['delete']);
	header("Location: feedbacks.php?msg=Feedback details deleted successfully");
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ADMIN_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css"></head>
<body>
<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("leftnav.php"); ?></td>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
    	 <?php
			 if(isset($_GET['view'])){
				 $row = $feedbacks -> getById($_GET['id']);
			 ?>
       <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
            <tr>
              <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="heading2">Feedback Details</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td><strong>Name</strong> :</td>
												<td><?=$row['fullname']?></td>
                      </tr>
											<tr>
											  <td><strong>Email :</strong></td>
											  <td><?php echo $row['email']; ?></td>
											  </tr>
                      <tr>
                        <td valign="top"><strong>Country :</strong></td>
                        <td valign="top"><?php echo $row['country']; ?></td>
                      </tr>
                      <tr>
                        <td width="10%" valign="top"><strong>Feedback : </strong></td>
                        <td valign="top"><?php echo nl2br($row['feedback']); ?></td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="5"></td>
        </tr>
        <?php } ?>
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="heading2">Feedbacks</td>
                    </tr>
                    <tr>
                      <td><table width="100%"  border="0" cellpadding="4" cellspacing="0">
                          <tr bgcolor="#F1F1F1">
                            <td width="1">&nbsp;</td>
                            <td><strong>SN</strong></td>
                            <td><strong>Name</strong></td>
                            <td><strong>Email</strong></td>
                            <td><strong>Country</strong></td>
                            <td width="85"><strong>Action</strong></td>
                          </tr>
													<?php
													$counter = 0;
													$pagename = "feedbacks.php?";
													$sql = "SELECT * FROM feedbacks ORDER BY id DESC";
													$limit = 20;
													include("../data/paging.php");
													
													while ($row = $conn->fetchArray($result))
													{
													?>
                          <tr <?php if($counter%2 != 0) echo 'bgcolor="#F7F7F7"'; else echo 'bgcolor="#FFFFFF"'; ?>>
                            <td valign="top">&nbsp;</td>
                            <td valign="top"><?= ($start + ++$counter); ?></td>
                            <td valign="top"><?= $row['fullname'] ?></td>
                            <td valign="top"><?php echo $row['email']; ?></td>
                            <td valign="top"><?php echo $row['country']; ?></td>
                            <td valign="top">
                            [<a href="feedbacks.php?id=<?php echo $row['id']; ?>&view">Deatils</a>]
														[<a href="#" onClick="javascript: if(confirm('This will permanently delete Feedback details from database. Continue?')){ document.location='feedbacks.php?delete=<?php echo $row['id']; ?>'; }">Delete</a>]
														</td>
                          </tr>
                          <?
													}
													?>
                        </table>
                        <?php include("../data/paging_show.php"); ?>
												</td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>