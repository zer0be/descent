<?php 

//-----------------------//
//remove me after include//
//-----------------------//

//include the db
require_once('Connections/dbDescent.php'); 

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

//include functions
include 'includes/function_logout.php';
include 'includes/function_getSQLValueString.php';

?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="content.css">
    <title>Descent 2nd Edition Campaign Tracker</title>
    <META NAME="description" CONTENT="Descent Mobile is a quick reference campaing tracker for the table top stagety game Descent Journeys in the Dark, 2nd edition">
    <META NAME="keywords" CONTENT="Descent Journeys in the dark, Road to Legend, Sea of Blood, SoB, RtL, JitD, Descent, descent 2nd, descentinthedark.com, descentinthedark, fantasy flight games, fantasyflightgames, second edition, campaign track, campaign, table top gaming, gaming, shadow rune" />
  </head>
  <body>

<?php

// get the group id from the url
if (isset($_GET['urlGgrp'])) {
  $colname_rsGetCampaigns = $_GET['urlGgrp'];
}

// Get the campaign details from the tbgames table.
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetCampaigns = sprintf("SELECT * FROM tbgames INNER JOIN tbcampaign ON tbgames.game_camp_id = tbcampaign.cam_id INNER JOIN tbgroup ON tbgames.game_grp_id = tbgroup.grp_id WHERE game_grp_id = %s  ORDER BY game_timestamp DESC", GetSQLValueString($colname_rsGetCampaigns, "int"));
$rsGetCampaigns = mysql_query($query_rsGetCampaigns, $dbDescent) or die(mysql_error());
$row_rsGetCampaigns = mysql_fetch_assoc($rsGetCampaigns);
$totalRows_rsGetCampaigns = mysql_num_rows($rsGetCampaigns);

?>
  <div id="wrapper" class="campaigns-overview">
    <div class="center">
      <h1 class="gaming-group"><?php echo $row_rsGetCampaigns['grp_name'] . " Campaigns";?></h1>
      <div class="subtitle"><?php echo $row_rsGetCampaigns['grp_city'] . ", " . $row_rsGetCampaigns['grp_state_country'];?></div>
    </div>
  <div id="campaigns-overview" class="clearfix">
<?php


do {
  ?>
  <a href="campaign_overview.php?urlGamingID=<?php echo $row_rsGetCampaigns['game_id']; ?>">
  <div class="campaigns-overview-campaign">
    <h2><?php echo $row_rsGetCampaigns['cam_name'];?></h2>
    <div class="timestamp"><?php echo $row_rsGetCampaigns['game_timestamp'];?></div>
  <?php

  // Select the players (heroes and overlord)
  $query_rsCharData = sprintf("SELECT * FROM tbcharacters INNER JOIN tbheroes ON tbcharacters.char_hero = tbheroes.hero_id WHERE char_game_id = %s", GetSQLValueString($row_rsGetCampaigns['game_id'], "int"));
  $rsCharData = mysql_query($query_rsCharData, $dbDescent) or die(mysql_error());
  $row_rsCharData = mysql_fetch_assoc($rsCharData);
  $totalRows_rsCharData = mysql_num_rows($rsCharData);

  $campaign_players = array();
  $ip = 0;

  do {

    $campaign_players[$ip] = array(
      "player" => $row_rsCharData['char_player'],
      "name" => $row_rsCharData['hero_name'],
      "img" => $row_rsCharData['hero_img'],
      "class" => $row_rsCharData['char_class'],
      "xp" => 0,
    );

  $ip++;

  } while ($row_rsCharData = mysql_fetch_assoc($rsCharData));

  ?>
    <div id="heroes">

        <?php 
          // loop through heroes
          $ih = 0;
          foreach ($campaign_players as $h){
        ?>
                <div class="hero" style="background: url('img/heroes/<?php print $campaign_players[$ih]['img'];?> ') center; background-size: cover;">
                  <div class="name"><?php print $campaign_players[$ih]['name']; ?></div>
                  <div class="class"><?php print $campaign_players[$ih]['class']; ?></div>
                  <div class="player"><?php print $campaign_players[$ih]['player']; ?></div>
                </div> <!-- close hero -->
              
        <?php
          $ih++;
          } //close foreach
        ?>
        
      </div> <!-- close heroes-campaign -->
  <?php

  //var_dump($row_rsGetCampaigns);

  ?>
  </div>
  </a> 
  <?php

} while ($row_rsGetCampaigns = mysql_fetch_assoc($rsGetCampaigns));

?>
  </div>
<?php




// FIX: Do we need this here?

if (isset($_SESSION['MM_Username'])) {
  $colname_rsPlayerAccess = $_SESSION['MM_Username'];
}

$query_rsPlayerAccess = sprintf("SELECT player_handle FROM tbplayerlist WHERE player_handle = %s", GetSQLValueString($colname_rsPlayerAccess, "text"));
$rsPlayerAccess = mysql_query($query_rsPlayerAccess, $dbDescent) or die(mysql_error());
$row_rsPlayerAccess = mysql_fetch_assoc($rsPlayerAccess);
$totalRows_rsPlayerAccess = mysql_num_rows($rsPlayerAccess);

$currentPage = $_SERVER["PHP_SELF"];

$queryString_rsSelectGroup = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsSelectGroup") == false && 
        stristr($param, "totalRows_rsSelectGroup") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsSelectGroup = "&" . htmlentities(implode("&", $newParams));
  }
}
/*$queryString_rsSelectGroup = sprintf("&totalRows_rsSelectGroup=%d%s", $totalRows_rsSelectGroup, $queryString_rsSelectGroup);*/

?>



<table width="450" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" class="normal"> <a href="Login/login.php"><span class="normal"> Login</span></a>
      <a href="Login/mycampaigns.php"><?php echo $row_rsPlayerAccess['player_handle']; ?>, My Campaigns </span></a></td>
    <td align="right"> <span class="normal"><a href="<?php echo $logoutAction ?>">Log out</a></td>
    </tr>
</table>
  
</div>
</body>
</html>


<?php
mysql_free_result($rsGetCampaigns);

//mysql_free_result($rsGroupDetails);

mysql_free_result($rsPlayerAccess);
?>
