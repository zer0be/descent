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
$query_rsSkillsData = sprintf("SELECT * FROM tbcharacters INNER JOIN tbskills_aquired ON tbcharacters.char_id = tbskills_aquired.spendxp_char_id INNER JOIN tbskills ON tbskills_aquired.spendxp_skill_id = tbskills.skill_id WHERE char_game_id = %s", GetSQLValueString($gameID, "int"));
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


// ------------ //
// -- QUESTS -- //
// ------------ //






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
