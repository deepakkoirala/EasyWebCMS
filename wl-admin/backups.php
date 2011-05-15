<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ADMIN_TITLE; ?></title>
<script language="javascript" src="../js/cms.js"></script>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<script type="text/ecmascript" src="../js/jquery-1.5.2.min.js"></script>
</head>
<body>
<style type="text/css">
.tarrif td{
	padding:5px;
}
.tarrif input[type='text']  {
	
	width:25%;
	outline:0px;
	border:1px solid #C7C7C7;
	padding:5px;
}

select  {
	
	outline:0px;
	border:1px solid #C7C7C7;
	padding:5px;
}

 select option {
	padding:2px;
}


.tarrif input[type='submit']{
	padding:5px 10px;
	font-weight:bold;
	
}

.tarrif textarea{
	outline:0px;
	border:1px solid #C7C7C7;
	padding:5px;
}
#tariff_listing input{
	width:90px;
}
#tariff_listing input[type='text']{
	outline:0px;
	border:1px solid #C7C7C7;
	padding:5px	;
}
</style>
<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("leftnav.php"); ?></td>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
       <tr>
          <td class="bgborder"></td>
        </tr>
        
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="heading2">Manage Backups </td>
                    </tr>
                    <tr>
                      <td><table width="100%"  border="0" cellpadding="4" cellspacing="0" id="tariff_listing">
                          <tr bgcolor="white">
                           
                            <td width="5%"><strong>1</strong></td>
                           
                           
                            <td><strong>Download database Backup</strong><strong></strong></td>
							<td>
							<a target="_blank" href="backups-download.php?download=database">Download</a>
							</td>
							
                          </tr>
						  <tr bgcolor="#F1F1F1">
                           
                            <td width="5%"><strong>2</strong></td>
                           
                           
                            <td><strong>Download whole Website Backup(with database)</strong><strong></strong></td>
							
							<td>
							<a target="_blank" href="backups-download.php?download=website">Download</a>
							</td>
                          </tr>
													
                        </table>
                       
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
<script type="text/ecmascript" src="../js/jquery.js"></script>
<script src="../ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../ckeditor/ckfinder/ckfinder.js"></script>

<script type="text/javascript">	
	
	CKEDITOR.replace( 'description' );
	CKEDITOR.replace( 'itinery' );
	//CKFinder.setupCKEditor( null, '../ckeditor/ckfinder/' ) ;
</script>
</html>