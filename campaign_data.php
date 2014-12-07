<?php

if (isset($_GET['urlGamingID'])) {
  $gameID = $_GET['urlGamingID'];
}

if (isset($_GET['urlCharID'])) {
  $charID = $_GET['urlCharID'];
}

//select the database
mysql_select_db($database_dbDescent, $dbDescent);

//Select the game based on the url
$query_rsGroupCampaign = sprintf("SELECT * FROM tbgames WHERE game_id = %s", GetSQLValueString($gameID, "int"));
$rsGroupCampaign = mysql_query($query_rsGroupCampaign, $dbDescent) or die(mysql_error());
$row_rsGroupCampaign = mysql_fetch_assoc($rsGroupCampaign);
$totalRows_rsGroupCampaign = mysql_num_rows($rsGroupCampaign);

//var_dump($row_rsGroupCampaign);

// ------------- //
// -- PLAYERS -- //
// ------------- //

// Select the players (heroes and overlord)
$query_rsCharData = sprintf("SELECT * FROM tbcharacters INNER JOIN tbheroes ON tbcharacters.char_hero = tbheroes.hero_id WHERE char_game_id = %s", GetSQLValueString($gameID, "int"));
$rsCharData = mysql_query($query_rsCharData, $dbDescent) or die(mysql_error());
$row_rsCharData = mysql_fetch_assoc($rsCharData);
$totalRows_rsCharData = mysql_num_rows($rsCharData);

// Get the items
$query_rsSkillsData = sprintf("SELECT * 
  FROM tbcharacters 
  INNER JOIN tbskills_aquired ON tbcharacters.char_id = tbskills_aquired.spendxp_char_id 
  INNER JOIN tbskills ON tbskills_aquired.spendxp_skill_id = tbskills.skill_id 
  WHERE char_game_id = %s", GetSQLValueString($gameID, "int"));
$rsSkillsData = mysql_query($query_rsSkillsData, $dbDescent) or die(mysql_error());
$row_rsSkillsData = mysql_fetch_assoc($rsSkillsData);
$totalRows_rsSkillsData = mysql_num_rows($rsSkillsData);


// Create the player data array
$players = array();
$ip = 0;

do {
  $players[$ip] = array(
    "id" => $row_rsCharData['char_id'],
    "player" => $row_rsCharData['char_player'],
    "name" => $row_rsCharData['hero_name'],
    "img" => $row_rsCharData['hero_img'],
    "class" => $row_rsCharData['char_class'],
    "xp" => 0,
    "skills" => array(),
  );

  if ($row_rsSkillsData['spendxp_char_id'] == $row_rsCharData['char_id']){

    $is = 0;
    do {

      $players[$ip]['skills'][$is] = array(
        "name" => $row_rsSkillsData['skill_name'],
        "xp" => $row_rsSkillsData['skill_cost'],
      );

      $is++;

    } while ($row_rsSkillsData = mysql_fetch_assoc($rsSkillsData));

  }

$ip++;

} while ($row_rsCharData = mysql_fetch_assoc($rsCharData));

// -------------- //
// -- CAMPAIGN -- //
// -------------- //
 
$campaign = array(
    "name" => "The Shadow Rune",
    "quests" => array(),
);

// -- DATABASE QUERIES -- //

// Get the quests
$query_rsQuestData = sprintf("SELECT * 
  FROM tbquests_progress 
  INNER JOIN tbquests ON tbquests_progress.progress_quest_id = tbquests.quest_id 
  LEFT JOIN tbitems_relics ON tbquests.quest_rew_relic_id = tbitems_relics.relic_id 
  WHERE progress_game_id = %s ORDER BY progress_id DESC", GetSQLValueString($gameID, "int"));
$rsQuestData = mysql_query($query_rsQuestData, $dbDescent) or die(mysql_error());
$row_rsQuestData = mysql_fetch_assoc($rsQuestData);
$totalRows_rsQuestData = mysql_num_rows($rsQuestData);

// Get the quests
/*
$query_rsQuestData = sprintf("SELECT * 
  FROM tbquests_progress 
  INNER JOIN tbquests ON tbquests_progress.progress_quest_id = tbquests.quest_id 
  LEFT JOIN tbitems_relics ON tbquests.quest_rew_relic_id = tbitems_relics.relic_id 
  WHERE progress_game_id = %s", GetSQLValueString($gameID, "int"));
$rsQuestData = mysql_query($query_rsQuestData, $dbDescent) or die(mysql_error());
$row_rsQuestData = mysql_fetch_assoc($rsQuestData);
$totalRows_rsQuestData = mysql_num_rows($rsQuestData);

*/



// Create the campaign data array
$iq = 0;

do {
  //select correct reward
  
  // did the heroes win? - FIX ME: Make 'The Heroes' be a bool instead of text
  $isRelic = 0;
  if ($row_rsQuestData['progress_quest_winner'] == "Heroes Win"){
    //var_dump($row_rsQuestData);
    // gold or item?
    if($row_rsQuestData['quest_rew_h_gold'] != 0){
      $qreward = $row_rsQuestData['quest_rew_h_gold'];
    } else if($row_rsQuestData['quest_rew_h_xp'] != 0){
      $qreward = $row_rsQuestData['quest_rew_h_xp'] . "<span class='label'>XP</span>";
    } else {
      $qreward = $row_rsQuestData['relic_h_name'];
      $isRelic = 1;
    }
  } else {
    // xp or item?
    if($row_rsQuestData['quest_rew_ol_xp'] != 0){
      $qreward = $row_rsQuestData['quest_rew_ol_xp'] . "<span class='label'>XP</span>";
    } else {
      $qreward = $row_rsQuestData['relic_ol_name'];
      $isRelic = 1;  
    }
  }

  $short = $row_rsQuestData['quest_name'];
  $short = strtolower($short);
  $short = str_replace(" ","_",$short);
  $short = preg_replace("/[^A-Za-z0-9_]/","",$short);

  $campaign['quests'][$iq] = array(
    "id" => $row_rsQuestData['progress_id'],
    "timestamp" => $row_rsQuestData['progress_timestamp'],
    "quest_id" => $row_rsQuestData['quest_id'],
    "name" => $row_rsQuestData['quest_name'],
    "img" => $short . ".jpg",
    "act" => $row_rsQuestData['quest_act'],
    "winner" => $row_rsQuestData['progress_quest_winner'],
    "winner_enc1" => $row_rsQuestData['progress_enc1_winner'],
    "reward" => $qreward,
    "reward_is_relic" => $isRelic,
    "relic_id" => $row_rsQuestData['relic_id'],
    "travel_set" => $row_rsQuestData['progress_set_travel'], 
    "travel" => array(
      array(
          "type" => "Plains",
          "event" => "<div class='v-center'>No Event</div>",
          "outcome" => "",
          "goldlost" => 0,
          "item-gained" => ""
      ),
      array(
          "type" => "Mountains",
          "event" => "A mysterious jester appears and presents an irresistible offer..",
          "outcome" => $heroes[1]['player'] . " passes all attibute tests and draws a 'Crossbow'",
          "goldlost" => 0,
          "item-gained" => "Crossbow"
      ),
    ),
    "spendxp_set" => $row_rsQuestData['progress_set_spendxp'],
    "spendxp" => array(),
    "items_set" => $row_rsQuestData['progress_set_items'],
    "items" => array(),

  );

  // Get the skills
  $query_rsQuestSkillsData = sprintf("SELECT * 
    FROM tbskills_aquired 
    INNER JOIN tbskills ON tbskills_aquired.spendxp_skill_id = tbskills.skill_id 
    INNER JOIN tbcharacters ON tbskills_aquired.spendxp_char_id = tbcharacters.char_id 
    INNER JOIN tbheroes ON tbcharacters.char_hero = tbheroes.hero_id 
    WHERE spendxp_progress_id = %s", GetSQLValueString($row_rsQuestData['progress_id'], "int"));
  $rsQuestSkillsData = mysql_query($query_rsQuestSkillsData, $dbDescent) or die(mysql_error());
  $row_rsQuestSkillsData = mysql_fetch_assoc($rsQuestSkillsData);
  $totalRows_rsQuestSkillsData = mysql_num_rows($rsQuestSkillsData);

  $ips = 0;
   do {

    $campaign['quests'][$iq]['spendxp'][$ips] = array(
      "hero_img" => $row_rsQuestSkillsData['hero_img'],
      "name" => $row_rsQuestSkillsData['skill_name'],
      "xpcost" => $row_rsQuestSkillsData['skill_cost'],
    );

    $ips++;

  } while ($row_rsQuestSkillsData = mysql_fetch_assoc($rsQuestSkillsData));

  // Get the skills
  $query_rsQuestItemsData = sprintf("SELECT * 
    FROM tbitems_aquired 
    LEFT JOIN tbitems ON tbitems_aquired.aq_item_id = tbitems.item_id
    LEFT JOIN tbitems_relics ON tbitems_aquired.aq_relic_id = tbitems_relics.relic_id 
    INNER JOIN tbcharacters ON tbitems_aquired.aq_char_id = tbcharacters.char_id 
    INNER JOIN tbheroes ON tbcharacters.char_hero = tbheroes.hero_id 
    WHERE aq_progress_id = %s", GetSQLValueString($row_rsQuestData['progress_id'], "int"));
  $rsQuestItemsData = mysql_query($query_rsQuestItemsData, $dbDescent) or die(mysql_error());
  $row_rsQuestItemsData = mysql_fetch_assoc($rsQuestItemsData);
  $totalRows_rsQuestItemsData = mysql_num_rows($rsQuestItemsData);

  $ips = 0;
   do {

    if($row_rsQuestItemsData['aq_item_id'] != NULL){
      $itemName = $row_rsQuestItemsData['item_name'];
      $itemType = "Item";
    } else {
      $itemType = "Relic";
      if($row_rsQuestData['progress_quest_winner'] == "Heroes Win"){
        $itemName = $row_rsQuestItemsData['relic_h_name'];

      } else {
        $itemName = $row_rsQuestItemsData['relic_ol_name'];
      }
    }

    $campaign['quests'][$iq]['items'][$ips] = array(
      "hero_img" => $row_rsQuestItemsData['hero_img'],
      "type" => $itemType,
      "name" => $itemName,
      "price" => $row_rsQuestItemsData['item_default_price'],
    );

    $ips++;

  } while ($row_rsQuestItemsData = mysql_fetch_assoc($rsQuestItemsData));

  

$iq++;

} while ($row_rsQuestData = mysql_fetch_assoc($rsQuestData));



// Available Quests

$query_rsAvQuestList = sprintf("SELECT * FROM tbquests WHERE quest_expansion_id = %s ORDER BY quest_order ASC", GetSQLValueString($row_rsGroupCampaign['game_camp_id'], "int"));
$rsAvQuestList = mysql_query($query_rsAvQuestList, $dbDescent) or die(mysql_error());
$row_rsAvQuestList = mysql_fetch_assoc($rsAvQuestList);
$totalRows_rsAvQuestList = mysql_num_rows($rsAvQuestList);

// Available Rumors

$query_rsAvRumorList = sprintf("SELECT * FROM tbquests WHERE quest_expansion_id != %s ORDER BY quest_order ASC", GetSQLValueString($row_rsGroupCampaign['game_camp_id'], "int"));
$rsAvRumorList = mysql_query($query_rsAvRumorList, $dbDescent) or die(mysql_error());
$row_rsAvRumorList = mysql_fetch_assoc($rsAvRumorList);
$totalRows_rsAvRumorList = mysql_num_rows($rsAvRumorList);


// Save Quests

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "start-quest-form")) {
  $insertSQL = sprintf("INSERT INTO tbquests_progress (progress_timestamp, progress_game_id,progress_quest_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['progress_timestamp'], "date"),
                       GetSQLValueString($_POST['progress_game_id'], "int"),
                       GetSQLValueString($_POST['progress_quest_id'], "int"));

  mysql_select_db($database_dbDescent, $dbDescent);
  $Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());

  $insertGoTo = "campaign_overview.php?urlGamingID=" . $row_rsSelectedCampaign['ggrp_id'] . "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}


// Save Quest Details

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "quest-details-form")) {
  $insertSQL = sprintf("UPDATE tbquests_progress SET progress_quest_winner = %s, progress_enc1_winner = %s, progress_relic_char = %s WHERE progress_quest_id = %s AND progress_game_id = %s",
                       GetSQLValueString($_POST['progress_quest_winner'], "text"),
                       GetSQLValueString($_POST['progress_enc1_winner'], "text"),
                       GetSQLValueString($_POST['progress_relic_recipiant'], "int"),
                       GetSQLValueString($_POST['progress_quest_id'], "int"),
                       GetSQLValueString($_POST['progress_game_id'], "int"));

  // FIX ME: Replace shop_group
  $insertSQL2 = sprintf("INSERT INTO tbitems_aquired (aq_relic_id, aq_progress_id, aq_char_id, aq_game_id) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['progress_relic_id'], "int"),
                       GetSQLValueString($_POST['progress_id'], "int"),
                       GetSQLValueString($_POST['progress_relic_recipiant'], "int"),
                       GetSQLValueString($_POST['progress_game_id'], "int"));

  mysql_select_db($database_dbDescent, $dbDescent);
  $Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());
  $Result2 = mysql_query($insertSQL2, $dbDescent) or die(mysql_error());

  $insertGoTo = "campaign_overview.php?urlGamingID=" . $row_rsSelectedCampaign['ggrp_id'] . "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}



/*
mysql_free_result($rsSelectedLog);

mysql_free_result($rsLog);

mysql_free_result($rsGetOverlord);

mysql_free_result($rsSumGoldLoot);

mysql_free_result($rsGetSkillsOverlord);

mysql_free_result($rsGetSkillsPlayer1);

mysql_free_result($rsGetSkillsPlayer2);

mysql_free_result($rsGetSkillsPlayer3);

mysql_free_result($rsGetSkillsPlayer4);

mysql_free_result($rsGetItemsOverlord);

mysql_free_result($rsGetItemsPlayer1);

mysql_free_result($rsGetItemsPlayer2);

mysql_free_result($rsGetItemsPlayer3);

mysql_free_result($rsGetItemsPlayer4);

mysql_free_result($rsPLayerAccess);

mysql_free_result($rsGroupCampaign);

*/
?>
