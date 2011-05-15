<?php
$row = $hotels -> getByURLName($title);
?>
<div class="welcome">
  <div class="wel_head">
    <div class="testi_txt">Details of Hotel</div>
  </div>
  <div class="wel_bdy">
    <div class="wel_bdy_txt">
      <div style="font-weight:bold; padding-top:10px; font-size:14px;"><?php echo $row['title']; ?></div>
      <table width="100%" cellpadding="4" cellspacing="0" border="1" bordercolor="#CCCCCC" style="font-size:12px;">
        <tr>
          <td style="color:#0c4901;">Category</td>
          <td style="color:#0c4901;">Special Rate</td>
          <td style="color:#0c4901;">SGL Room Rate</td>
          <td style="color:#0c4901;">DBL Room Rate</td>
          <td style="color:#0c4901;">Remarks</td>
        </tr>
        <tr>
          <td><?php echo $row['category']; ?></td>
          <td><a href="mailto:<?php echo SITE_EMAIL; ?>">On request</a></td>
          <td><?php echo $row['singleRoomRent']; ?></td>
          <td><?php echo $row['doubleRoomRent']; ?></td>
          <td><a href="hotelbooking/<?php echo $row['urltitle']; ?>.html">Book this hotel</a></td>
        </tr>	
      </table>	
      <br />
      <?php echo $row['details']; ?>
      <br /><br />
      <div align="center"><input type="button" name="btnBook" value="Book this Hotel" style="border:0; cursor:pointer;" onclick="location.href='hotelbooking/<?php echo $row['urltitle']; ?>.html';" /></div>
      </div>
    </div>
  </div>
</div>
