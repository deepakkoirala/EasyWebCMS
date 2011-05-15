
  <div class="infoi">
    <?php
						$result = $groups -> getById(TRAVELLER_ID);
						while($row = $conn -> fetchArray($result))
						{
						?>
    <div class="ntrekinfoi"> 
      <!-- nepal travellers info starts -->
      <div class="act_top">
        <div class="act_top_txt"><a href="<?php echo $row['urlname']; ?>.html"><?php echo $row['name']; ?></a></div>
      </div>
      <div class="SP"></div>
      <div class="act_bdy">
        <div class="nti_inn">
          <ul class="nti">
            <?php
										$result = $groups -> getVisibleByParentIdWithLimit(TRAVELLER_ID, 10);
										while($row = $conn -> fetchArray($result))
										{
											echo '<li>';
											if ($row['linkType'] == "Link")
											{
												echo "<a href='" . $row['contents'] . "' title='". $row['name'] . "'>";
											}
											else if ($row['linkType'] == "File")
											{
												echo "<a href='" . CMS_FILES_DIR . $row['contents'] . "' title='". $row['name'] . "'>";
											} 
											else
											{
												echo "<a href='" . $row['urlname'] . ".html' title='". $row['name'] . "'>";
											}
											
											echo $row['name'] . "</a>";
											echo '</li>';
										}
										?>
          </ul>
        </div>
      </div>
      <div class="SP"></div>
      <div class="nti_ll"></div>
    </div>
    <!-- nepal travellers info ends -->
    <?php } ?>
    <div class="SP"></div>
    <?php
						$result = $groups -> getById(TREKKING_ID);
						while($row = $conn -> fetchArray($result))
						{
						?>
    <div class="ntinfo"> 
      <!-- nepal treks info starts -->
      <div class="act_top">
        <div class="act_top_txt"><a href="<?php echo $row['urlname']; ?>.html"><?php echo $row['name']; ?></a></div>
      </div>
      <div class="SP"></div>
      <div class="act_bdy">
        <div class="nti_inn">
          <ul class="nti">
            <?php
										$result = $groups -> getVisibleByParentIdWithLimit(TREKKING_ID, 10);
										while($row = $conn -> fetchArray($result))
										{
											echo '<li>';
											if ($row['linkType'] == "Link")
											{
												echo "<a href='" . $row['contents'] . "' title='". $row['name'] . "'>";
											}
											else if ($row['linkType'] == "File")
											{
												echo "<a href='" . CMS_FILES_DIR . $row['contents'] . "' title='". $row['name'] . "'>";
											} 
											else
											{
												echo "<a href='" . $row['urlname'] . ".html' title='". $row['name'] . "'>";
											}
											
											echo $row['name'] . "</a>";
											echo '</li>';
										}
										?>
          </ul>
        </div>
      </div>
      <div class="SP"></div>
      <div class="nti_ll"></div>
    </div>
    <!-- nepal treks info ends -->
    <?php } ?>
    <div class="SP"></div>
    <?php
						$result = $groups -> getById(CLIMBING_ID);
						while($row = $conn -> fetchArray($result))
						{
						?>
    <div class="ceinfo"> 
      <!-- climb and expedition info starts -->
      <div class="act_top">
        <div class="act_top_txt"><a href="<?php echo $row['urlname']; ?>.html"><?php echo $row['name']; ?></a></div>
      </div>
      <div class="SP"></div>
      <div class="act_bdy">
        <div class="nti_inn">
          <ul class="nti">
            <?php
										$result = $groups -> getVisibleByParentIdWithLimit(CLIMBING_ID, 5);
										while($row = $conn -> fetchArray($result))
										{
											echo '<li>';
											if ($row['linkType'] == "Link")
											{
												echo "<a href='" . $row['contents'] . "' title='". $row['name'] . "'>";
											}
											else if ($row['linkType'] == "File")
											{
												echo "<a href='" . CMS_FILES_DIR . $row['contents'] . "' title='". $row['name'] . "'>";
											} 
											else
											{
												echo "<a href='" . $row['urlname'] . ".html' title='". $row['name'] . "'>";
											}
											
											echo $row['name'] . "</a>";
											echo '</li>';
										}
										?>
          </ul>
        </div>
      </div>
      <div class="SP"></div>
      <div class="nti_ll"></div>
    </div>
    <!-- climb and expedition info ends -->
    <?php } ?>
  </div>