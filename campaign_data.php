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

$selExpansions = $row_rsGroupCampaign['game_expansions'];

//var_dump($row_rsGroupCampaign);

// ------------- //
// -- PLAYERS -- //
// ------------- //

// Select the players (heroes and overlord)
$query_rsCharData = sprintf("SELECT * FROM tbcharacters INNER JOIN tbheroes ON tbcharacters.char_hero = tbheroes.hero_id WHERE char_game_id = %s", GetSQLValueString($gameID, "int"));
$rsCharData = mysql_query($query_rsCharData, $dbDescent) or die(mysql_error());
$row_rsCharData = mysql_fetch_assoc($rsCharData);
$totalRows_rsCharData = mysql_num_rows($rsCharData);

// Get the skills
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
    "xp" => $row_rsCharData['char_xp'],
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
    "gold" => $row_rsGroupCampaign['game_gold'],
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



// Set some variables
$iq = 0;
$questsAct1 = 0;
$questsAct2 = 0;
$interludeDone = 0;
$wonForInterlude = 0;
$wonForFinale = 0;
$currentAct = "Act 1";
$canChoose = array();
$cantChoose = array();
$olquests = array();

// Create the campaign data array
do {
  $qreward = 0;
  $qrewardH = 0; 
  $qrewardOL = 0; 
  //select correct reward
  
  
  // set the type of reward so we can save it correctly later  
  $rewardTypeH = "";
  if($row_rsQuestData['quest_rew_h_gold'] != 0){
    $rewardTypeH = "gold";
    $qrewardH = $row_rsQuestData['quest_rew_h_gold'];
  } else if($row_rsQuestData['quest_rew_h_xp'] != 0){
    $rewardTypeH = "hxp";
    $qrewardH = $row_rsQuestData['quest_rew_h_xp'];
  } else if ($row_rsQuestData['quest_rew_relic_id'] != NULL){
    $rewardTypeH = "relic";
    $qrewardH = $row_rsQuestData['relic_h_name'];
  } else {
    $rewardTypeH = "none";
  }

  $rewardTypeOL = "";
  if($row_rsQuestData['quest_rew_ol_xp'] != 0){
    $rewardTypeOL = "olxp";
    $qrewardOL = $row_rsQuestData['quest_rew_ol_xp'];
  } else if ($row_rsQuestData['quest_rew_relic_id'] != NULL){
    $rewardTypeOL = "relic";  
    $qrewardOL = $row_rsQuestData['relic_ol_name'];
  } else {
    $rewardTypeOL = "none";
  }

  // did the heroes win? - FIX ME: Make 'The Heroes' be a bool instead of text - Also all this setting of rewards needs to be simpler?
  if ($row_rsQuestData['progress_quest_winner'] == "Heroes Win"){
    //var_dump($row_rsQuestData);
    // gold or item?
    if($row_rsQuestData['quest_rew_h_gold'] != 0){
      $qreward = $row_rsQuestData['quest_rew_h_gold'];
    } else if($row_rsQuestData['quest_rew_h_xp'] != 0){
      $qreward = $row_rsQuestData['quest_rew_h_xp'];
    } else {
      $qreward = $row_rsQuestData['relic_h_name'];
    }

  } else {
    // xp or item?
    if($row_rsQuestData['quest_rew_ol_xp'] != 0){
      $qreward = $row_rsQuestData['quest_rew_ol_xp'];   
    } else {
      $qreward = $row_rsQuestData['relic_ol_name'];
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
    "rewardH" => $qrewardH,
    "rewardOL" => $qrewardOL,
    "reward_type_h" => $rewardTypeH,
    "reward_type_ol" => $rewardTypeOL,
    "relic_id" => $row_rsQuestData['relic_id'],
    "travel_set" => $row_rsQuestData['progress_set_travel'],
    "travel_steps" => $row_rsQuestData['quest_travel'],
    "travel" => array(),
    "spendxp_set" => $row_rsQuestData['progress_set_spendxp'],
    "spendxp" => array(),
    "items_set" => $row_rsQuestData['progress_set_items'],
    "items" => array(),

  );


  // FIX ME: Move this part to a seperate file so we can import the correct 'flow' for each campaign (this one only works for Shadow Rune for example)
  // keep track of where we are in the campaign
  if ($row_rsQuestData['quest_act'] == "Act 1" && $row_rsQuestData['progress_quest_type'] == "Quest"){
    $questsAct1 += 1;
  } else if ($row_rsQuestData['quest_act'] == "Interlude" && $row_rsQuestData['progress_quest_type'] == "Quest"){
    $interludeDone = 1; 
  } else if ($row_rsQuestData['quest_act'] == "Act 2" && $row_rsQuestData['progress_quest_type'] == "Quest"){
    $questsAct2 += 1; 
  }

  // filter out act II quests that can/can't be selected because heroes won
  if ($row_rsQuestData['progress_quest_winner'] == "Heroes Win" && $row_rsQuestData['quest_next_h_id'] != NULL){
    $canChoose[] = $row_rsQuestData['quest_next_h_id'];
    $cantChoose[] = $row_rsQuestData['quest_next_ol_id'];
  }

  if ($row_rsQuestData['progress_quest_winner'] == "Heroes Win" && $row_rsQuestData['quest_act'] == "Act 1"){
    $wonForInterlude += 1;
  }

  if ($row_rsQuestData['progress_quest_winner'] == "Heroes Win" && $row_rsQuestData['quest_act'] == "Act 2"){
    $wonForFinale += 1;
  }

  // Get the Travel Steps

  $query_rsQuestTravelData = sprintf("SELECT * 
    FROM tbtravel_aquired 
    INNER JOIN tbtravel ON tbtravel_aquired.travel_aq_event_id = tbtravel.travel_id 
    WHERE travel_aq_progress_id = %s", GetSQLValueString($row_rsQuestData['progress_id'], "int"));
  $rsQuestTravelData = mysql_query($query_rsQuestTravelData, $dbDescent) or die(mysql_error());
  $row_rsQuestTravelData = mysql_fetch_assoc($rsQuestTravelData);
  $totalRows_rsQuestTravelData = mysql_num_rows($rsQuestTravelData);

  $questTravelSteps = explode(',', $row_rsQuestData['quest_travel']);
  $qts = 0;
  do {

    $campaign['quests'][$iq]['travel'][] = array(
          "type" => $questTravelSteps[$qts],
          "event" => $row_rsQuestTravelData['travel_event'],
          "outcome" => $row_rsQuestTravelData['travel_result'],
          "goldlost" => 0,
          "item-gained" => ""
      );
    $qts++;

  } while ($row_rsQuestTravelData = mysql_fetch_assoc($rsQuestTravelData));

 
  

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

  // Get the items
  $query_rsQuestItemsData = sprintf("SELECT * 
    FROM tbitems_aquired 
    LEFT JOIN tbitems ON tbitems_aquired.aq_item_id = tbitems.item_id
    LEFT JOIN tbitems_relics ON tbitems_aquired.aq_relic_id = tbitems_relics.relic_id 
    INNER JOIN tbcharacters ON tbitems_aquired.aq_char_id = tbcharacters.char_id 
    INNER JOIN tbheroes ON tbcharacters.char_hero = tbheroes.hero_id 
    WHERE aq_progress_id = %s OR aq_sold_progress_id = %s ORDER BY aq_char_id ASC", GetSQLValueString($row_rsQuestData['progress_id'], "int"), GetSQLValueString($row_rsQuestData['progress_id'], "int"));
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
      "price" => '<span class="item-bought">-' . $row_rsQuestItemsData['item_default_price'] . '</span>',
    );

    if ($row_rsQuestItemsData['aq_item_sold'] == 1){
      $campaign['quests'][$iq]['items'][$ips] = array(
        "hero_img" => $row_rsQuestItemsData['hero_img'],
        "type" => $itemType,
        "name" => $itemName,
        "price" => '<span class="item-sold">+' . $row_rsQuestItemsData['item_sell_price'] . '</span>',
      );
    }



    $ips++;

  } while ($row_rsQuestItemsData = mysql_fetch_assoc($rsQuestItemsData));

  

$iq++;

} while ($row_rsQuestData = mysql_fetch_assoc($rsQuestData));


if ($questsAct1 == 3 && $interludeDone == 0){
  $currentAct = "Interlude";
} else if ($questsAct1 == 3 && $interludeDone == 1 && $questsAct2 < 3){
  $currentAct = "Act 2";
} else if ($questsAct2 == 3){
  $currentAct = "Finale";
}

// Available Quests

$query_rsAvQuestList = sprintf("SELECT * FROM tbquests WHERE quest_expansion_id = %s ORDER BY quest_order ASC", GetSQLValueString($row_rsGroupCampaign['game_camp_id'], "int"));
$rsAvQuestList = mysql_query($query_rsAvQuestList, $dbDescent) or die(mysql_error());
$row_rsAvQuestList = mysql_fetch_assoc($rsAvQuestList);
$totalRows_rsAvQuestList = mysql_num_rows($rsAvQuestList);

// make an array with completed quests for options
  $questsCompleted = array();
  foreach ($campaign['quests'] as $qos){
    $questsCompleted[] = $qos['quest_id'];
  }

$questOptions = array();
do {
  $olquests[] = $row_rsAvQuestList['quest_next_ol_id'];
            
  // filter out completed quests
  if(!(in_array($row_rsAvQuestList['quest_id'], $questsCompleted))){ 
    if ($currentAct == "Act 1"){
      if($row_rsAvQuestList['quest_act'] == "Act 1"){
        $questOptions[] = '<option value="' . $row_rsAvQuestList['quest_id'] . '">' . $row_rsAvQuestList['quest_name'] . '</option>';
      }
    } else if ($currentAct == "Act 2"){
      if(in_array($row_rsAvQuestList['quest_id'], $canChoose) || (in_array($row_rsAvQuestList['quest_id'], $olquests) && (!(in_array($row_rsAvQuestList['quest_id'],$cantChoose))))){
        $questOptions[] = '<option value="' . $row_rsAvQuestList['quest_id'] . '">' . $row_rsAvQuestList['quest_name'] . '</option>';
      }
    } else if ($currentAct == "Interlude"){
      if($row_rsAvQuestList['quest_act'] == "Interlude"){
        if ($wonForInterlude >= 2 && $row_rsAvQuestList['quest_next_h_id'] == 999){
          $questOptions[] = '<option value="' . $row_rsAvQuestList['quest_id'] . '">' . $row_rsAvQuestList['quest_name'] . '</option>';
        } else if ($wonForInterlude < 2 && $row_rsAvQuestList['quest_next_ol_id'] == 999){
          $questOptions[] = '<option value="' . $row_rsAvQuestList['quest_id'] . '">' . $row_rsAvQuestList['quest_name'] . '</option>';
        }
      }
    } else if ($currentAct == "Finale"){
      if($row_rsAvQuestList['quest_act'] == "Finale"){
        if ($wonForFinale >= 2 && $row_rsAvQuestList['quest_next_h_id'] == 999){
          $questOptions[] = '<option value="' . $row_rsAvQuestList['quest_id'] . '">' . $row_rsAvQuestList['quest_name'] . '</option>';
        } else if ($wonForFinale < 2 && $row_rsAvQuestList['quest_next_ol_id'] == 999){
          $questOptions[] = '<option value="' . $row_rsAvQuestList['quest_id'] . '">' . $row_rsAvQuestList['quest_name'] . '</option>';
        }
      }
    }
  } 

} while ($row_rsAvQuestList = mysql_fetch_assoc($rsAvQuestList));

// Available Rumors

$query_rsAvRumorList = sprintf("SELECT * FROM tbquests LEFT JOIN tbcampaign ON quest_expansion_id = cam_id WHERE quest_expansion_id != %s AND quest_act = %s AND cam_type = %s ORDER BY quest_order ASC", GetSQLValueString($row_rsGroupCampaign['game_camp_id'], "int"), GetSQLValueString($currentAct, "text"), GetSQLValueString("mini", "text"));
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

/*
echo '<pre>';
var_dump ($campaign);
echo '</pre>';
*/

?>
