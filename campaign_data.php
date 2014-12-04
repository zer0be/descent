<?php

if (isset($_GET['urlGamingID'])) {
  $gameID = $_GET['urlGamingID'];
}

//select the database
mysql_select_db($database_dbDescent, $dbDescent);

//Select the game based on the url
$query_rsGroupCampaign = sprintf("SELECT * FROM tbgames WHERE game_id = %s", GetSQLValueString($gameID, "int"));
$rsGroupCampaign = mysql_query($query_rsGroupCampaign, $dbDescent) or die(mysql_error());
$row_rsGroupCampaign = mysql_fetch_assoc($rsGroupCampaign);
$totalRows_rsGroupCampaign = mysql_num_rows($rsGroupCampaign);

var_dump($row_rsGroupCampaign);

// ------------- //
// -- PLAYERS -- //
// ------------- //

// Select the players (heroes and overlord)
$query_rsCharData = sprintf("SELECT * FROM tbcharacters INNER JOIN tbheroes ON tbcharacters.char_hero = tbheroes.hero_id WHERE char_game_id = %s", GetSQLValueString($gameID, "int"));
$rsCharData = mysql_query($query_rsCharData, $dbDescent) or die(mysql_error());
$row_rsCharData = mysql_fetch_assoc($rsCharData);
$totalRows_rsCharData = mysql_num_rows($rsCharData);

$players = array();
$ip = 0;

do {

  $players[$ip] = array(
    "player" => $row_rsCharData['char_player'],
    "name" => $row_rsCharData['hero_name'],
    "img" => $row_rsCharData['hero_img'],
    "class" => $row_rsCharData['char_class'],
    "xp" => 0,
  );

$ip++;

} while ($row_rsCharData = mysql_fetch_assoc($rsCharData));


// ------------ //
// ------------ //
// ------------ //




/*
mysql_free_result($rsSelectedLog);

mysql_free_result($rsPortrait1);

mysql_free_result($rsPortrait2);

mysql_free_result($rsPortrait3);

mysql_free_result($rsPortrait4);

mysql_free_result($rsLog);

mysql_free_result($rsGetOverlord);

mysql_free_result($rsSumGoldLoot);

mysql_free_result($rsGetXPtotalPlayer1);

mysql_free_result($rsGetXPtotalPlayer2);

mysql_free_result($rsGetXPtotalPlayer3);

mysql_free_result($rsGetXPtotalPlayer4);

mysql_free_result($rsGetXPtotalOverlord);

mysql_free_result($rsGetXPremainingOverlord);

mysql_free_result($rsGetXPremainingPlayer1);

mysql_free_result($rsGetXPremainingPlayer2);

mysql_free_result($rsGetXPremainingPlayer3);

mysql_free_result($rsGetXPremainingPlayer4);

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
