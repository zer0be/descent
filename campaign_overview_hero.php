<?php

  $detailCharID = $_GET['urlCharID'];
  
  // Get the items
  $query_rsDetailItems = sprintf("SELECT * FROM tbitems_aquired INNER JOIN tbitems ON aq_item_id = item_id WHERE aq_char_id = %s AND aq_item_sold = %s", GetSQLValueString($detailCharID, "int"), GetSQLValueString(0, "int"));
  $rsDetailItems = mysql_query($query_rsDetailItems, $dbDescent) or die(mysql_error());
  $row_rsDetailItems = mysql_fetch_assoc($rsDetailItems);
  $totalRows_rsDetailItems = mysql_num_rows($rsDetailItems);

  // Get the relics
  $query_rsDetailRelics = sprintf("SELECT * FROM tbitems_aquired INNER JOIN tbitems_relics ON aq_relic_id = relic_id WHERE aq_char_id = %s", GetSQLValueString($detailCharID, "int"));
  $rsDetailRelics = mysql_query($query_rsDetailRelics, $dbDescent) or die(mysql_error());
  $row_rsDetailRelics = mysql_fetch_assoc($rsDetailRelics);
  $totalRows_rsDetailRelics = mysql_num_rows($rsDetailRelics);


  // Get the skills
  $query_rsDetailSkills = sprintf("SELECT * FROM tbskills_aquired INNER JOIN tbskills ON spendxp_skill_id = skill_id WHERE spendxp_char_id = %s", GetSQLValueString($detailCharID, "int"));
  $rsDetailSkills = mysql_query($query_rsDetailSkills, $dbDescent) or die(mysql_error());
  $row_rsDetailSkills = mysql_fetch_assoc($rsDetailSkills);
  $totalRows_rsDetailSkills = mysql_num_rows($rsDetailSkills);

?>

<div id="heroes-detail" class="clearfix">
        <?php 
          // loop through heroes
          $ih = 0;
          foreach ($players as $h){
            if (($players[$ih]['id'] == $detailCharID)){
        ?>
                <div class="hero" style="background: url('img/heroes/<?php print $players[$ih]['img']; ?>');">
                  <div class="name"><?php print $players[$ih]['name']; ?></div>
                  <div class="class"><?php print $players[$ih]['class']; ?></div>
                  <div class="player"><?php print $players[$ih]['player']; ?></div>
                  <div class="xp"><?php print $players[$ih]['xp']; ?><span class="xp-label">XP</span></div>
                </div> <!-- close hero -->

                <div class="detail-items phase-column">
                  <?php do { ?>
                    <div class="item clearfix">      
                      <div class="hero-mini items" style="background: url('img/<?php print $row_rsDetailItems['item_type']; ?>.jpg') center;"></div>  
                      <div class="items item-name"><?php print $row_rsDetailItems['item_name']; ?></div>
                      <?php if ($row_rsDetailItems['item_default_price'] == 0){ ?>
                        <div class="items item-xp">FREE</div>
                      <?php } else { ?>
                        <div class="items item-xp cost"><?php print $row_rsDetailItems['item_default_price']; ?><span class="xp-label">G</span></div>
                      <?php } ?>
                    </div>
                  <?php } while ($row_rsDetailItems = mysql_fetch_assoc($rsDetailItems)); ?>

                  <?php do { ?>
                    <?php if (isset($row_rsDetailRelics['relic_h_name'])){ ?>
                      <div class="item clearfix">      
                        <div class="hero-mini items" style="background: url('img/<?php print $row_rsDetailRelics['relic_type']; ?>.jpg') center;"></div>  
                        <div class="items item-name"><?php print $row_rsDetailRelics['relic_h_name']; ?></div> <!-- FIX ME: Overlord relics and stuff -->
                        <div class="items item-xp cost">Relic</div>
                      </div>
                    <?php } ?>
                  <?php } while ($row_rsDetailRelics = mysql_fetch_assoc($rsDetailRelics)); ?>
                </div> <!-- close items -->

                <div class="detail-skills phase-column">
                <?php do { ?>
                  <div class="item clearfix">   
                    <div class="items item-name"><?php print $row_rsDetailSkills['skill_name']; ?></div>
                    <?php if ($row_rsDetailSkills['skill_cost'] == 0){ ?>
                      <div class="items item-xp">FREE</div>
                    <?php } else { ?>
                      <div class="items item-xp"><?php echo $row_rsDetailSkills['skill_cost']; ?><span class="xp-label">XP</span></div>
                    <?php } ?>
                  </div>
                <?php } while ($row_rsDetailSkills = mysql_fetch_assoc($rsDetailSkills)); ?>
                </div> <!-- close skills -->

                <!--
                <div class="skills">
                  <div class="name"><?php print $row_rsDetailItems['item_name']; ?></div>
                  <div class="xp"><span class="xp-label">XP</span></div>
                </div>  
                -->


        <?php
                }
          $ih++;
          } //close foreach
        ?>
      </div> <!-- close heroes -->