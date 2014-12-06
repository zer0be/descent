<?php

//variables for the map
$_SESSION['campaignlog'] = $row_rsGroupCampaign['game_camp_id'];


if (isset($_SESSION['campaignlog'])) {
  $colname_rsSelectedLog = $_SESSION['campaignlog'];
}
//get campaign info
$query_rsSelectedLog = sprintf("SELECT * FROM tbcampaign WHERE cam_name = %s", GetSQLValueString($colname_rsSelectedLog, "text"));
$rsSelectedLog = mysql_query($query_rsSelectedLog, $dbDescent) or die(mysql_error());
$row_rsSelectedLog = mysql_fetch_assoc($rsSelectedLog);
$totalRows_rsSelectedLog = mysql_num_rows($rsSelectedLog);


$query_rsLog = sprintf("SELECT DATE_FORMAT(progress_timestamp,'%%b %%d %%Y') AS date, progress_quest_name,  progress_quest_name_win, progress_enc1_winner, progress_id FROM tbquests_progress WHERE progress_game_id = %s ORDER BY progress_timestamp DESC", GetSQLValueString($gameID, "int"));
$rsLog = mysql_query($query_rsLog, $dbDescent) or die(mysql_error());
$row_rsLog = mysql_fetch_assoc($rsLog);
$totalRows_rsLog = mysql_num_rows($rsLog);


$query_rsSumGoldLoot = sprintf("SELECT SUM(shop_gold + shop_goldsold) AS goldshop FROM tbitems_aquired WHERE shop_groupid = %s", GetSQLValueString($gameID, "int"));
$rsSumGoldLoot = mysql_query($query_rsSumGoldLoot, $dbDescent) or die(mysql_error());
$row_rsSumGoldLoot = mysql_fetch_assoc($rsSumGoldLoot);
$totalRows_rsSumGoldLoot = mysql_num_rows($rsSumGoldLoot);


if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsGetXPtotalPlayer1 = $_GET['urlGamingID'];
}

if (isset($row_rsGroupCampaign['ggrp_char1'])) {
  $group_rsGetXPtotalPlayer1 = ($row_rsGroupCampaign['ggrp_char1']);
}

$query_rsGetXPtotalPlayer1 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE tbitems_aquired.shop_player = %s AND tbitems_aquired.shop_groupid = %s AND shop_xp > 0", GetSQLValueString($group_rsGetXPtotalPlayer1, "text"),GetSQLValueString($dungeongroup_rsGetXPtotalPlayer1, "int"));
$rsGetXPtotalPlayer1 = mysql_query($query_rsGetXPtotalPlayer1, $dbDescent) or die(mysql_error());
$row_rsGetXPtotalPlayer1 = mysql_fetch_assoc($rsGetXPtotalPlayer1);
$totalRows_rsGetXPtotalPlayer1 = mysql_num_rows($rsGetXPtotalPlayer1);


if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsGetXPtotalPlayer2 = $_GET['urlGamingID'];
}

if (isset($row_rsGroupCampaign['ggrp_char2'])) {
  $group_rsGetXPtotalPlayer2 = $row_rsGroupCampaign['ggrp_char2'];
}

$query_rsGetXPtotalPlayer2 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE tbitems_aquired.shop_player = %s AND tbitems_aquired.shop_groupid = %s AND shop_xp > 0 ", GetSQLValueString($group_rsGetXPtotalPlayer2, "text"),GetSQLValueString($dungeongroup_rsGetXPtotalPlayer2, "int"));
$rsGetXPtotalPlayer2 = mysql_query($query_rsGetXPtotalPlayer2, $dbDescent) or die(mysql_error());
$row_rsGetXPtotalPlayer2 = mysql_fetch_assoc($rsGetXPtotalPlayer2);
$totalRows_rsGetXPtotalPlayer2 = mysql_num_rows($rsGetXPtotalPlayer2);


if (isset($row_rsGroupCampaign['ggrp_char3'])) {
  $group_rsGetXPtotalPlayer3 = $row_rsGroupCampaign['ggrp_char3'];
}

if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsGetXPtotalPlayer3 = $_GET['urlGamingID'];
}

$query_rsGetXPtotalPlayer3 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE tbitems_aquired.shop_player = %s AND tbitems_aquired.shop_groupid = %s AND shop_xp > 0 ", GetSQLValueString($group_rsGetXPtotalPlayer3, "text"),GetSQLValueString($dungeongroup_rsGetXPtotalPlayer3, "int"));
$rsGetXPtotalPlayer3 = mysql_query($query_rsGetXPtotalPlayer3, $dbDescent) or die(mysql_error());
$row_rsGetXPtotalPlayer3 = mysql_fetch_assoc($rsGetXPtotalPlayer3);
$totalRows_rsGetXPtotalPlayer3 = mysql_num_rows($rsGetXPtotalPlayer3);


if (isset($row_rsGroupCampaign['ggrp_char4'])) {
  $group_rsGetXPtotalPlayer4 = $row_rsGroupCampaign['ggrp_char4'];
}

if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsGetXPtotalPlayer4 = $_GET['urlGamingID'];
}

$query_rsGetXPtotalPlayer4 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE tbitems_aquired.shop_player = %s AND tbitems_aquired.shop_groupid = %s AND shop_xp > 0 ", GetSQLValueString($group_rsGetXPtotalPlayer4, "text"),GetSQLValueString($dungeongroup_rsGetXPtotalPlayer4, "int"));
$rsGetXPtotalPlayer4 = mysql_query($query_rsGetXPtotalPlayer4, $dbDescent) or die(mysql_error());
$row_rsGetXPtotalPlayer4 = mysql_fetch_assoc($rsGetXPtotalPlayer4);
$totalRows_rsGetXPtotalPlayer4 = mysql_num_rows($rsGetXPtotalPlayer4);


if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsGetXPtotalOverlord = $_GET['urlGamingID'];
}

$query_rsGetXPtotalOverlord = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_player='Overlord' AND shop_groupid = %s AND shop_xp > 0 ", GetSQLValueString($dungeongroup_rsGetXPtotalOverlord, "int"));
$rsGetXPtotalOverlord = mysql_query($query_rsGetXPtotalOverlord, $dbDescent) or die(mysql_error());
$row_rsGetXPtotalOverlord = mysql_fetch_assoc($rsGetXPtotalOverlord);
$totalRows_rsGetXPtotalOverlord = mysql_num_rows($rsGetXPtotalOverlord);


if (isset($_GET['urlGamingID'])) {
  $gaminggroup_rsGetXPremainingOverlord = $_GET['urlGamingID'];
}

$query_rsGetXPremainingOverlord = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_player = 'Overlord' AND shop_groupid = %s AND shop_xp IS NOT NULL ORDER BY shop_xp ASC", GetSQLValueString($gaminggroup_rsGetXPremainingOverlord, "int"));
$rsGetXPremainingOverlord = mysql_query($query_rsGetXPremainingOverlord, $dbDescent) or die(mysql_error());
$row_rsGetXPremainingOverlord = mysql_fetch_assoc($rsGetXPremainingOverlord);
$totalRows_rsGetXPremainingOverlord = mysql_num_rows($rsGetXPremainingOverlord);


if (isset($row_rsGroupCampaign['ggrp_char1'])) {
  $player_rsGetXPremainingPlayer1 = $row_rsGroupCampaign['ggrp_char1'];
}

if (isset($_GET['urlGamingID'])) {
  $gaminggroup_rsGetXPremainingPlayer1 = $_GET['urlGamingID'];
}

$query_rsGetXPremainingPlayer1 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s ", GetSQLValueString($player_rsGetXPremainingPlayer1, "text"),GetSQLValueString($gaminggroup_rsGetXPremainingPlayer1, "int"));
$rsGetXPremainingPlayer1 = mysql_query($query_rsGetXPremainingPlayer1, $dbDescent) or die(mysql_error());
$row_rsGetXPremainingPlayer1 = mysql_fetch_assoc($rsGetXPremainingPlayer1);
$totalRows_rsGetXPremainingPlayer1 = mysql_num_rows($rsGetXPremainingPlayer1);


if (isset($row_rsGroupCampaign['ggrp_char2'])) {
  $player_rsGetXPremainingPlayer2 = $row_rsGroupCampaign['ggrp_char2'];
}

if (isset($_GET['urlGamingID'])) {
  $gaminggroup_rsGetXPremainingPlayer2 = $_GET['urlGamingID'];
}

$query_rsGetXPremainingPlayer2 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s ", GetSQLValueString($player_rsGetXPremainingPlayer2, "text"),GetSQLValueString($gaminggroup_rsGetXPremainingPlayer2, "int"));
$rsGetXPremainingPlayer2 = mysql_query($query_rsGetXPremainingPlayer2, $dbDescent) or die(mysql_error());
$row_rsGetXPremainingPlayer2 = mysql_fetch_assoc($rsGetXPremainingPlayer2);
$totalRows_rsGetXPremainingPlayer2 = mysql_num_rows($rsGetXPremainingPlayer2);


if (isset($row_rsGroupCampaign['ggrp_char3'])) {
  $player_rsGetXPremainingPlayer3 = $row_rsGroupCampaign['ggrp_char3'];
}

if (isset($_GET['urlGamingID'])) {
  $gaminggroup_rsGetXPremainingPlayer3 = $_GET['urlGamingID'];
}

$query_rsGetXPremainingPlayer3 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s ", GetSQLValueString($player_rsGetXPremainingPlayer3, "text"),GetSQLValueString($gaminggroup_rsGetXPremainingPlayer3, "int"));
$rsGetXPremainingPlayer3 = mysql_query($query_rsGetXPremainingPlayer3, $dbDescent) or die(mysql_error());
$row_rsGetXPremainingPlayer3 = mysql_fetch_assoc($rsGetXPremainingPlayer3);
$totalRows_rsGetXPremainingPlayer3 = mysql_num_rows($rsGetXPremainingPlayer3);


if (isset($row_rsGroupCampaign['ggrp_char4'])) {
  $player_rsGetXPremainingPlayer4 = $row_rsGroupCampaign['ggrp_char4'];
}

if (isset($_GET['urlGamingID'])) {
  $gaminggroup_rsGetXPremainingPlayer4 = $_GET['urlGamingID'];
}

$query_rsGetXPremainingPlayer4 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s ", GetSQLValueString($player_rsGetXPremainingPlayer4, "text"),GetSQLValueString($gaminggroup_rsGetXPremainingPlayer4, "int"));
$rsGetXPremainingPlayer4 = mysql_query($query_rsGetXPremainingPlayer4, $dbDescent) or die(mysql_error());
$row_rsGetXPremainingPlayer4 = mysql_fetch_assoc($rsGetXPremainingPlayer4);
$totalRows_rsGetXPremainingPlayer4 = mysql_num_rows($rsGetXPremainingPlayer4);


if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetSkillsOverlord = $_GET['urlGamingID'];
}

$query_rsGetSkillsOverlord = sprintf("SELECT spendxp_skill_name, shop_xp FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = 'Overlord' AND spendxp_skill_name IS NOT NULL AND shop_xp < 0", GetSQLValueString($gaming_rsGetSkillsOverlord, "int"));
$rsGetSkillsOverlord = mysql_query($query_rsGetSkillsOverlord, $dbDescent) or die(mysql_error());
$row_rsGetSkillsOverlord = mysql_fetch_assoc($rsGetSkillsOverlord);
$totalRows_rsGetSkillsOverlord = mysql_num_rows($rsGetSkillsOverlord);


if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetSkillsPlayer1 = $_GET['urlGamingID'];
}

if (isset($row_rsGroupCampaign['ggrp_char1'])) {
  $player_rsGetSkillsPlayer1 = $row_rsGroupCampaign['ggrp_char1'];
}

$query_rsGetSkillsPlayer1 = sprintf("SELECT spendxp_skill_name, shop_xp FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = %s AND spendxp_skill_name IS NOT NULL ORDER BY shop_xp ASC", GetSQLValueString($gaming_rsGetSkillsPlayer1, "int"),GetSQLValueString($player_rsGetSkillsPlayer1, "text"));
$rsGetSkillsPlayer1 = mysql_query($query_rsGetSkillsPlayer1, $dbDescent) or die(mysql_error());
$row_rsGetSkillsPlayer1 = mysql_fetch_assoc($rsGetSkillsPlayer1);
$totalRows_rsGetSkillsPlayer1 = mysql_num_rows($rsGetSkillsPlayer1);


if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetSkillsPlayer2 = $_GET['urlGamingID'];
}

if (isset($row_rsGroupCampaign['ggrp_char2'])) {
  $player_rsGetSkillsPlayer2 = $row_rsGroupCampaign['ggrp_char2'];
}

$query_rsGetSkillsPlayer2 = sprintf("SELECT spendxp_skill_name, shop_xp FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = %s AND spendxp_skill_name IS NOT NULL   ORDER BY shop_xp ASC", GetSQLValueString($gaming_rsGetSkillsPlayer2, "int"),GetSQLValueString($player_rsGetSkillsPlayer2, "text"));
$rsGetSkillsPlayer2 = mysql_query($query_rsGetSkillsPlayer2, $dbDescent) or die(mysql_error());
$row_rsGetSkillsPlayer2 = mysql_fetch_assoc($rsGetSkillsPlayer2);
$totalRows_rsGetSkillsPlayer2 = mysql_num_rows($rsGetSkillsPlayer2);


if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetSkillsPlayer3 = $_GET['urlGamingID'];
}

if (isset($row_rsGroupCampaign['ggrp_char3'])) {
  $player_rsGetSkillsPlayer3 = $row_rsGroupCampaign['ggrp_char3'];
}

$query_rsGetSkillsPlayer3 = sprintf("SELECT spendxp_skill_name, shop_xp FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = %s AND spendxp_skill_name IS NOT NULL   ORDER BY shop_xp ASC", GetSQLValueString($gaming_rsGetSkillsPlayer3, "int"),GetSQLValueString($player_rsGetSkillsPlayer3, "text"));
$rsGetSkillsPlayer3 = mysql_query($query_rsGetSkillsPlayer3, $dbDescent) or die(mysql_error());
$row_rsGetSkillsPlayer3 = mysql_fetch_assoc($rsGetSkillsPlayer3);
$totalRows_rsGetSkillsPlayer3 = mysql_num_rows($rsGetSkillsPlayer3);


if (isset($row_rsGroupCampaign['ggrp_char4'])) {
  $player_rsGetSkillsPlayer4 = $row_rsGroupCampaign['ggrp_char4'];
}

if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetSkillsPlayer4 = $_GET['urlGamingID'];
}

$query_rsGetSkillsPlayer4 = sprintf("SELECT spendxp_skill_name, shop_xp FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = %s AND spendxp_skill_name IS NOT NULL  ORDER BY shop_xp ASC ", GetSQLValueString($gaming_rsGetSkillsPlayer4, "int"),GetSQLValueString($player_rsGetSkillsPlayer4, "text"));
$rsGetSkillsPlayer4 = mysql_query($query_rsGetSkillsPlayer4, $dbDescent) or die(mysql_error());
$row_rsGetSkillsPlayer4 = mysql_fetch_assoc($rsGetSkillsPlayer4);
$totalRows_rsGetSkillsPlayer4 = mysql_num_rows($rsGetSkillsPlayer4);


if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetItemsOverlord = $_GET['urlGamingID'];
}

$query_rsGetItemsOverlord = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_groupid = %s  AND shop_player = 'Overlord'  AND shop_equipped = 'yes' AND shop_market_bought IS NOT NULL ORDER BY shop_id DESC ", GetSQLValueString($gaming_rsGetItemsOverlord, "int"));
$rsGetItemsOverlord = mysql_query($query_rsGetItemsOverlord, $dbDescent) or die(mysql_error());
$row_rsGetItemsOverlord = mysql_fetch_assoc($rsGetItemsOverlord);
$totalRows_rsGetItemsOverlord = mysql_num_rows($rsGetItemsOverlord);


if (isset($row_rsGroupCampaign['ggrp_char1'])) {
  $player_rsGetItemsPlayer1 = $row_rsGroupCampaign['ggrp_char1'];
}

if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetItemsPlayer1 = $_GET['urlGamingID'];
}

$query_rsGetItemsPlayer1 = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_groupid = %s  AND shop_player = %s AND shop_equipped = 'yes' AND shop_market_bought IS NOT NULL  ORDER BY shop_id DESC ", GetSQLValueString($gaming_rsGetItemsPlayer1, "int"),GetSQLValueString($player_rsGetItemsPlayer1, "text"));
$rsGetItemsPlayer1 = mysql_query($query_rsGetItemsPlayer1, $dbDescent) or die(mysql_error());
$row_rsGetItemsPlayer1 = mysql_fetch_assoc($rsGetItemsPlayer1);
$totalRows_rsGetItemsPlayer1 = mysql_num_rows($rsGetItemsPlayer1);


if (isset($row_rsGroupCampaign['ggrp_char2'])) {
  $player_rsGetItemsPlayer2 = $row_rsGroupCampaign['ggrp_char2'];
}

if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetItemsPlayer2 = $_GET['urlGamingID'];
}

$query_rsGetItemsPlayer2 = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_groupid = %s  AND shop_player = %s AND shop_equipped = 'yes' AND shop_market_bought IS NOT NULL  ORDER BY shop_id DESC ", GetSQLValueString($gaming_rsGetItemsPlayer2, "int"),GetSQLValueString($player_rsGetItemsPlayer2, "text"));
$rsGetItemsPlayer2 = mysql_query($query_rsGetItemsPlayer2, $dbDescent) or die(mysql_error());
$row_rsGetItemsPlayer2 = mysql_fetch_assoc($rsGetItemsPlayer2);
$totalRows_rsGetItemsPlayer2 = mysql_num_rows($rsGetItemsPlayer2);


if (isset($row_rsGroupCampaign['ggrp_char3'])) {
  $player_rsGetItemsPlayer3 = $row_rsGroupCampaign['ggrp_char3'];
}

if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetItemsPlayer3 = $_GET['urlGamingID'];
}

$query_rsGetItemsPlayer3 = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_groupid = %s  AND shop_player = %s AND shop_equipped = 'yes' AND shop_market_bought IS NOT NULL  ORDER BY shop_id DESC ", GetSQLValueString($gaming_rsGetItemsPlayer3, "int"),GetSQLValueString($player_rsGetItemsPlayer3, "text"));
$rsGetItemsPlayer3 = mysql_query($query_rsGetItemsPlayer3, $dbDescent) or die(mysql_error());
$row_rsGetItemsPlayer3 = mysql_fetch_assoc($rsGetItemsPlayer3);
$totalRows_rsGetItemsPlayer3 = mysql_num_rows($rsGetItemsPlayer3);


if (isset($row_rsGroupCampaign['ggrp_char4'])) {
  $player_rsGetItemsPlayer4 = $row_rsGroupCampaign['ggrp_char4'];
}

if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetItemsPlayer4 = $_GET['urlGamingID'];
}

$query_rsGetItemsPlayer4 = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_groupid = %s  AND shop_player = %s AND shop_equipped = 'yes' AND shop_market_bought IS NOT NULL  ORDER BY shop_id DESC ", GetSQLValueString($gaming_rsGetItemsPlayer4, "int"),GetSQLValueString($player_rsGetItemsPlayer4, "text"));
$rsGetItemsPlayer4 = mysql_query($query_rsGetItemsPlayer4, $dbDescent) or die(mysql_error());
$row_rsGetItemsPlayer4 = mysql_fetch_assoc($rsGetItemsPlayer4);
$totalRows_rsGetItemsPlayer4 = mysql_num_rows($rsGetItemsPlayer4);


if (isset($_SESSION['MM_Username'])) {
  $colname_rsPLayerAccess = $_SESSION['MM_Username'];
}

$query_rsPLayerAccess = sprintf("SELECT player_handle FROM tbplayerlist WHERE player_handle = %s", GetSQLValueString($colname_rsPLayerAccess, "text"));
$rsPLayerAccess = mysql_query($query_rsPLayerAccess, $dbDescent) or die(mysql_error());
$row_rsPLayerAccess = mysql_fetch_assoc($rsPLayerAccess);
$totalRows_rsPLayerAccess = mysql_num_rows($rsPLayerAccess);


?>

<table width="600" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800" align=" align="center"" valign="top" class="background"> <p><a href="index.html" target="_top"><img src="images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>
    </p>
      <p><?php echo $row_rsGroupCampaign['ggrp_name']; ?><img src="images/logos/<?php echo $row_rsSelectedLog['cam_logo']; ?>" /></p> 
      
      <table width="500" border="0" cellpadding="0" cellspacing="10" class="blackTable" id="tableOverlord">
  <tr>
    <td align="left" class="header"><img src="images/campaign/heroes/bust/<?php echo $row_rsGetOverlord['hero_img']; ?>" alt="overlord" width="100" /><span class="normal"> <?php echo $row_rsGetXPremainingOverlord['SUM(shop_xp)']; ?>/</span><span class="header"><?php echo $row_rsGetXPtotalOverlord['SUM(shop_xp)']; ?></span><span class="normal">XP</span></td>
    <td rowspan="3" align="center" valign="top">
        <p><span class="header">Trained Skills</span>    </p>      
        
        <table cellpadding="1" cellspacing="0">
          <?php do { ?>
        <tr>
          <td align="right" nowrap="nowrap"><span class="normal"><?php echo $row_rsGetSkillsOverlord['spendxp_skill_name']; ?></span></td>
          <td><span class="normal"><?php echo $row_rsGetSkillsOverlord['shop_xp']; ?></span></td>
        </tr>
        <?php } while ($row_rsGetSkillsOverlord = mysql_fetch_assoc($rsGetSkillsOverlord)); ?>
  </table></td>
    <td rowspan="3" align="center" valign="top" class="header"><p>Items</p>
      
      <table cellpadding="1" cellspacing="0">
        <?php do { ?>
          <tr>
            <td align="right" class="normal"><?php echo $row_rsGetItemsOverlord['shop_market_bought']; ?></td>
          </tr>
          <?php } while ($row_rsGetItemsOverlord = mysql_fetch_assoc($rsGetItemsOverlord)); ?>
      </table></td>
  </tr>
  <tr>
    <td align="left" class="header"><?php echo $row_rsGroupCampaign['ggrp_overlord']; ?></td>
    </tr>
  <tr>
    <td align="left" class="normal"><?php echo $row_rsGroupCampaign['ggrp_playerOL']; ?></td>
    </tr>
</table>

<table width="500" border="0" cellpadding="0" cellspacing="10" class="blackTable" id="tablePlayer1">
  <tr>
    <td align="right" class="header"><span class="normal"><?php echo $row_rsGetXPremainingPlayer1['SUM(shop_xp)']; ?>/</span><span class="header"><?php echo $row_rsGetXPtotalPlayer1['SUM(shop_xp)']; ?></span><span class="normal">XP </span> <img src="images/campaign/heroes/bust/<?php echo $row_rsPortrait1['hero_img']; ?>" width="100" border="0" /></td>
    <td rowspan="3" align="center" valign="top"><p><span class="header"><?php echo $row_rsGroupCampaign['ggrp_mage1']; ?>
      <br>Trained Skills</span>
      </p>
      
      <table cellpadding="1" cellspacing="0">
        <?php do { ?>
        <tr class="normal">
          <td align="right" nowrap="nowrap"><?php echo $row_rsGetSkillsPlayer1['spendxp_skill_name']; ?></td>
          <td><?php echo $row_rsGetSkillsPlayer1['shop_xp']; ?></td>
        </tr>
        <?php } while ($row_rsGetSkillsPlayer1 = mysql_fetch_assoc($rsGetSkillsPlayer1)); ?>
  </table></td>
    <td rowspan="3" align="center" valign="top"><p class="header">Items</p>
      
      <table cellpadding="1" cellspacing="0">
        <?php do { ?>
          <tr>
            <td align="right" class="normal"><?php echo $row_rsGetItemsPlayer1['shop_market_bought']; ?></td>
          </tr>
          <?php } while ($row_rsGetItemsPlayer1 = mysql_fetch_assoc($rsGetItemsPlayer1)); ?>
    </table></td>
  </tr>
  <tr>
    <td align="right" class="header"><?php echo $row_rsGroupCampaign['ggrp_char1']; ?></td>
  </tr>
  <tr>
    <td align="right" class="normal"><?php echo $row_rsGroupCampaign['ggrp_player1']; ?></td>
    </tr>
</table>

      <table width="500" border="0" cellpadding="0" cellspacing="10" class="blackTable" id="tablePlayer2">
  <tr>
    <td align="left" class="header"><img src="images/campaign/heroes/bust/<?php echo $row_rsPortrait2['hero_img']; ?>" width="100" />
      <span class="normal"><?php echo $row_rsGetXPremainingPlayer2['SUM(shop_xp)']; ?>/</span><span class="header"><?php echo $row_rsGetXPtotalPlayer2['SUM(shop_xp)']; ?></span><span class="normal">XP</span></td>
    <td rowspan="3" align="center" valign="top"><p class="header"><?php echo $row_rsGroupCampaign['ggrp_warrior2']; ?>
      <br>Trained Skills</p>
      
      <table cellpadding="1" cellspacing="0">
        <?php do { ?>
          <tr class="normal">
            <td align="right" nowrap="nowrap"><?php echo $row_rsGetSkillsPlayer2['spendxp_skill_name']; ?></td>
            <td><?php echo $row_rsGetSkillsPlayer2['shop_xp']; ?></td>
          </tr>
          <?php } while ($row_rsGetSkillsPlayer2 = mysql_fetch_assoc($rsGetSkillsPlayer2)); ?>
    </table></td>
    <td rowspan="3" align="center" valign="top"><p class="header">Items</p>
      
      <table cellpadding="1" cellspacing="0">
        <?php do { ?>
          <tr>
            <td align="right" class="normal"><?php echo $row_rsGetItemsPlayer2['shop_market_bought']; ?></td>
          </tr>
          <?php } while ($row_rsGetItemsPlayer2 = mysql_fetch_assoc($rsGetItemsPlayer2)); ?>
    </table></td>
  </tr>
  <tr>
    <td align="left" class="header"><?php echo $row_rsGroupCampaign['ggrp_char2']; ?></td>
  </tr>
  <tr>
    <td align="left" class="normal"><?php echo $row_rsGroupCampaign['ggrp_player2']; ?></td>
    </tr>
</table>

<table width="500" border="0" cellpadding="0" cellspacing="10" class="blackTable" id="tablePlayer3">
  <tr>
    <td align="right" class="header"><span class="normal"><?php echo $row_rsGetXPremainingPlayer3['SUM(shop_xp)']; ?>/</span><span class="header"><?php echo $row_rsGetXPtotalPlayer3['SUM(shop_xp)']; ?></span><span class="normal">XP </span>
      <img src="images/campaign/heroes/bust/<?php echo $row_rsPortrait3['hero_img']; ?>" width="100" border="0" /></td>
    <td rowspan="3" align="center" valign="top"><p class="header"><?php echo $row_rsGroupCampaign['ggrp_scout3']; ?>
      <br>
      Trained Skills</p>
      
      <table cellpadding="1" cellspacing="0">
        <?php do { ?>
          <tr class="normal">
            <td align="right" nowrap="nowrap"><?php echo $row_rsGetSkillsPlayer3['spendxp_skill_name']; ?></td>
            <td><?php echo $row_rsGetSkillsPlayer3['shop_xp']; ?></td>
          </tr>
          <?php } while ($row_rsGetSkillsPlayer3 = mysql_fetch_assoc($rsGetSkillsPlayer3)); ?>
    </table></td>
    <td rowspan="3" align="center" valign="top"><p class="header">Items</p>
      
      <table cellpadding="1" cellspacing="0">
        <?php do { ?>
          <tr>
            <td align="right" class="normal"><?php echo $row_rsGetItemsPlayer3['shop_market_bought']; ?></td>
          </tr>
          <?php } while ($row_rsGetItemsPlayer3 = mysql_fetch_assoc($rsGetItemsPlayer3)); ?>
    </table></td>
  </tr>
  <tr>
    <td align="right" class="header"><?php echo $row_rsGroupCampaign['ggrp_char3']; ?></td>
    </tr>
  <tr>
    <td align="right" class="normal"><?php echo $row_rsGroupCampaign['ggrp_player3']; ?></td>
    </tr>
</table>

<table width="500" border="0" cellpadding="0" cellspacing="10" class="blackTable" id="tablePlayer4">
  <tr>
    <td align="left" class="header"><img src="images/campaign/heroes/bust/<?php echo $row_rsPortrait4['hero_img']; ?>" width="100" /><span class="normal"> <?php echo $row_rsGetXPremainingPlayer4['SUM(shop_xp)']; ?>/</span><span class="header"><?php echo $row_rsGetXPtotalPlayer3['SUM(shop_xp)']; ?></span><span class="normal">XP</span></td>
    <td rowspan="3" align="center" valign="top"><p class="header"><?php echo $row_rsGroupCampaign['ggrp_healer4']; ?>
      <br>Trained Skills</p>
      
      <table cellpadding="1" cellspacing="0">
        <?php do { ?>
          <tr class="normal">
            <td align="right" nowrap="nowrap"><?php echo $row_rsGetSkillsPlayer4['spendxp_skill_name']; ?></td>
            <td><?php echo $row_rsGetSkillsPlayer4['shop_xp']; ?></td>
          </tr>
          <?php } while ($row_rsGetSkillsPlayer4 = mysql_fetch_assoc($rsGetSkillsPlayer4)); ?>
    </table></td>
    <td rowspan="3" align="center" valign="top"><p class="header">Items</p>
      
      <span class="normal">
      <table cellpadding="1" cellspacing="0">
        <?php do { ?>
          <tr>
            <td align="right" class="normal"><?php echo $row_rsGetItemsPlayer4['shop_market_bought']; ?></td>
            </tr>
          <?php } while ($row_rsGetItemsPlayer4 = mysql_fetch_assoc($rsGetItemsPlayer4)); ?>
      </table>
      </span></td>
  </tr>
  <tr>
    <td align="left" class="header"><?php echo $row_rsGroupCampaign['ggrp_char4']; ?></td>
    </tr>
  <tr>
    <td align="left" class="normal"><?php echo $row_rsGroupCampaign['ggrp_player4']; ?></td>
    </tr>
</table>

<table width="100" border="0" cellpadding="0" cellspacing="0" class="goldcoin">
  <tr>
    <td width="100" height="100" align="center" valign="middle"><span class="pageTitleBlack"><?php echo $row_rsSumGoldLoot['goldshop']; ?></span></td>
  </tr>
</table>
            
      <table cellpadding="5" cellspacing="5" class="purpleTable">
        <tr>
          <td colspan="2" align="center"><span class="normal">Date</span></td>
          <td align="center" class="normal">Dungeon</td>
          <td align="center" class="normal">Winner of Dungeon</td>
        </tr>
        <?php do { ?>
          <tr>
            <td colspan="2" align="center" class="header"><span class="header"><?php echo $row_rsLog['date']; ?></span></td>
            <td align="center"><span class="header"><?php echo $row_rsLog['progress_quest_name']; ?></span></td>
            <td align="center"><span class="header"><?php echo $row_rsLog['progress_quest_name_win']; ?></span></td>
          </tr>
          <tr>
            <td align="center" class="header">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td colspan="2" align="center"><a href="dungeondetail.php?urlGamingID=<?php echo $row_rsGroupCampaign['ggrp_id']; ?>&amp;urlDungeonID=<?php echo $row_rsLog['progress_quest_name']; ?>" class="normal">View Details About the Dungeon Here</a></td>
          </tr>
          <?php } while ($row_rsLog = mysql_fetch_assoc($rsLog)); ?>
      </table>



<table width="400" border="0" cellspacing="0" cellpadding="15">
        <tr>
          <td align="center" class="header">
            
           <img src="images/campaign/log/<?php echo $row_rsSelectedLog['cam_log']; ?>" width="450" />
            <br>
            
          </td>
        </tr>
      </table>



<p class="normal"><a href="campaign.php" target="_self"><img src="images/buttons/campaign2ndlogo.png" alt="Choose another Campaign" width="300" height="55" border="0" /></a> 
        <br>
<a href="index.html" target="_top">Home</a> | <a href="firstedition.html" target="_top">1st Ed.</a> | <a href="secondedition.php" target="_top">2nd Ed.</a> | <a href="campaign.php">Campaign</a></p>
      
    <p class="footer"><a href="http://sciscoedesigns.com" target="_blank"><em>hosted by sciscoeDesigns</em></a></p></td>
</tr>
</table>