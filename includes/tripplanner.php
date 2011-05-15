<?php include("includes/breadcrumb.php"); ?>

<div style="clear:both"></div>
<div class="welcome">
  <div class="wel_head">
    <div class="testi_txt">Trip Planner</div>
  </div>
  <div class="wel_bdy">
    <div class="wel_bdy_txt">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="top"><table width="100%" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="591"  height="10" align="left" valign="top"><?php
										if(isset($mode))
										{
										ob_start();
										
										
										?>
              <?php
										$message=ob_get_contents();
										ob_clean();
										ob_flush();
										$from = $_POST['email'];
										$to = "info@mountainworldtreks.com";
										$subject ="Comments on the site";
										$body = $message;
										
										$headers = "From: $from \r\n";
										$headers.= "Content-Type: text/html; charset=ISO-8859-1 ";
										$headers .= "MIME-Version: 1.0 "; 
										
										if(mail($to, $subject, $body, $headers))
												$mes = "You are selected for the project. ";
										else
												$mes = "Some problem occured in sending, please try again later";
										
										echo $msg;
										}
										?></td>
          </tr>
          <tr>
            <td height="10" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td valign="top"><!--formstart -->
                    
                    <form action="captcha/contact_process.php" method="post" name="form1" id="form1" onsubmit="return checkForm(this)">
                      <?php
					        if(isset($mode))
					        {
					        ?>
                      <table width="100%" align="center">
                        <tr>
                          <td align="left" valign="middle" class="form_text">&nbsp;</td>
                          <td align="left" valign="middle" class="form_text"> Your comments has been sent</td>
                        </tr>
                        <tr>
                          <td align="left" valign="middle" class="form_text">&nbsp;</td>
                          <td align="left" valign="middle" class="form_text">&nbsp;</td>
                        </tr>
                      </table>
                      <?php
						}
						else
						{									
						?>
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
                              <tr>
                                <td align="left" valign="middle" class="form_text" style="padding-left:10px;">&nbsp;</td>
                                <td align="left" valign="middle" class="form_text" style="padding-left:10px;" width="30%">Name: *</td>
                                <td align="left"><input name="nam" type="text" size="25" class="email_box" id="nam" /></td>
                              </tr>
                              <tr>
                                <td align="left" valign="middle" class="form_text" style="padding-left:10px;">&nbsp;</td>
                                <td align="left" valign="middle" class="form_text" style="padding-left:10px;">Address: *</td>
                                <td align="left"><input name="add" type="text" size="25" class="email_box" id="add" /></td>
                              </tr>
                              <tr>
                                <td align="left" valign="middle" class="form_text" style="padding-left:10px;">&nbsp;</td>
                                <td align="left" valign="middle" class="form_text" style="padding-left:10px;">Phone Number: * </td>
                                <td align="left"><input name="phone" type="text" size="25" class="email_box" id="phone" /></td>
                              </tr>
                              <tr>
                                <td align="left" valign="middle" class="form_text" style="padding-left:10px;">&nbsp;</td>
                                <td align="left" valign="middle" class="form_text" style="padding-left:10px;">Email: *</td>
                                <td align="left"><input name="email" type="text" size="25" class="email_box" id="email" /></td>
                              </tr>
                              <tr>
                                <td align="left" valign="middle" class="form_text" style="padding-left:10px;">&nbsp;</td>
                                <td align="left" valign="top" class="form_text" style="padding-left:10px;">Comments &amp; Suggestions: </td>
                                <td align="left"><textarea name="com" class="email_box_1" id="com" rows="4"></textarea></td>
                              </tr>
                              <tr align="left" valign="top">
                                <td colspan="3" class="menu_text"><table width="100%" border="0" cellspacing="2" cellpadding="2" style="padding-right:35px;">
                                    <tr>
                                      <td align="left" valign="middle" class="form_text" style="padding-left:10px;">&nbsp;</td>
                                      <td align="left" valign="top" class="form_text" style="padding-left:10px;" width="30%">&nbsp;</td>
                                      <td align="left" valign="top" class="formtext" ><span class="form_text">Please enter the code shown below</span></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td align="left" valign="top"><input name="code_check" size="12" type="text" class="email_box" /></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td align="left" valign="top"><img src="captcha/verimages/image-verify.php" alt="" /></td>
                                    </tr>
                                  </table></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" class="menu_text">&nbsp;</td>
                                <td align="left" valign="top" class="menu_text">&nbsp;</td>
                                <td align="left"><input name="mode" type="hidden" />
                                  <input name="Submit" type="submit" class="submit_box" value="Submit" />
                                  <input name="Submit2" type="reset" class="submit_box" value="Reset" /></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      <?php
					  }
					?>
                    </form>
                    
                    <!--startend --></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
  </table>
    </div>    
  </div>
</div>