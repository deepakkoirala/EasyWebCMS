<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" class="heading"><?php echo PAGE_TITLE; ?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" height="5"></td>
  </tr>
  <tr class="lightbg">
    <td width="211" height="30" class="hdr">&nbsp;&nbsp;Welcome&nbsp;to&nbsp;Administrator&nbsp;Console&nbsp;</td>
    <td height="30" align="right" style="padding-right:5px;"><?php if(isset($_SESSION['sessLastLogin'])){ 
	  echo '<span class="tab_search_Over">Last visited :&nbsp;&nbsp;</span>';
	  $arrDate = explode(' ',$_SESSION['sessLastLogin']); 
	  $arrDate1 = explode('-',$arrDate[0]);
	  $arrDate2 = explode(':',$arrDate[1]);
	  echo date("M j,Y g:ia",mktime($arrDate2[0],$arrDate2[1],$arrDate2[2],$arrDate1[1],$arrDate1[2],$arrDate1[0]));
	  }
  ?>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center" height="5"></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="top" class="lightbg"><table width="100%"  border="0" align="right" cellpadding="5" cellspacing="0">
        <tr>
          <td width="31%"><div align="left">
              <?php if(isset($_SESSION['sessUsername'])){ echo '<span class="tab_search_Over">Welcome: </span><strong>'.$_SESSION['sessUsername']; } ?>
              </strong></div></td>
          <td width="69%" align="right" style="color:#FF0000;">&nbsp;
            <?php if(isset($_GET['msg'])){ ?>
            <span class="succ_msg">&nbsp;&nbsp;<?php echo $_GET['msg']; ?>&nbsp;</span>
            <?php } ?></td>
        </tr>
      </table></td>
  </tr>
</table>
