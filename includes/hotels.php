<div class="welcome">
  <div class="wel_head">
    <div class="testi_txt">Hotels</div>
  </div>
  <div class="wel_bdy">
    <div class="wel_bdy_txt">
      <?php
			$result = $cities -> getAll();
			while($row = $conn -> fetchArray($result))
			{		
				$res = $hotels -> getByCity($row['id']);
				$numRows = $conn -> numRows($res);
				if($numRows > 0)
				{
					?>
			<div align="center" style="color:#0c4901; font-weight:bold;">Hotels in <?php echo $row['title']; ?></div>
					<table width="100%" border="1" cellspacing="0" cellpadding="6" bordercolor="#1ba901" style="font-size:12px;">
						<tr>
							<td style="color:#0c4901;"><strong>Name of Hotel</strong></td>
							<td style="color:#0c4901;"><strong>Category</strong></td>
							<td style="color:#0c4901;"><strong>Special Rate</strong></td>
							<td colspan="2" style="color:#0c4901;"><strong>Room Rate</strong></td>
							<td style="color:#0c4901;"><strong>Remarks</strong></td>
						</tr>
						<tr>
							<td colspan="3">&nbsp;</td>
							<td style="color:#0c4901;"><strong>SGL</strong></td>
							<td style="color:#0c4901;"><strong>DBL</strong></td>
							<td>&nbsp;</td>
						</tr>	
					<?php
					while($r = $conn -> fetchArray($res))
					{
					?>
						<tr>
							<td><a href="hoteldetails/<?php echo $r['urltitle']; ?>.html"><?php echo $r['title']; ?></a></td>
							<td><?php echo $r['category']; ?></td>
							<td><a href="mailto:<?php echo SITE_EMAIL; ?>">On request</a></td>
							<td><?php echo $r['singleRoomRent']; ?></td>
							<td><?php echo $r['doubleRoomRent']; ?></td>
							<td><a href="hotelbooking/<?php echo $r['urltitle']; ?>.html">Book this hotel</a></td>
						</tr>			
					<?php
					}		
					?>
					</table>
					<br>
				<?php
				}
			}
			?>
    </div>
  </div>
</div>