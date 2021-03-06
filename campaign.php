<?php

$currentPage = $_SERVER["PHP_SELF"];


// FIX ME: Check if these db queries shouldn't be rewritten to something more simple
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsCampaignList = "SELECT cam_id, cam_name, expansion, cam_logo, cam_icon FROM tbcampaign WHERE cam_type = 'full' OR cam_type = 'mini' ORDER BY cam_type ASC";
$rsCampaignList = mysql_query($query_rsCampaignList, $dbDescent) or die(mysql_error());
$row_rsCampaignList = mysql_fetch_assoc($rsCampaignList);
$totalRows_rsCampaignList = mysql_num_rows($rsCampaignList);

$maxRows_rsSelectGroup = 10;
$pageNum_rsSelectGroup = 0;
if (isset($_GET['pageNum_rsSelectGroup'])) {
  $pageNum_rsSelectGroup = $_GET['pageNum_rsSelectGroup'];
}
$startRow_rsSelectGroup = $pageNum_rsSelectGroup * $maxRows_rsSelectGroup;

$query_rsSelectGroup = "SELECT grp_id, grp_name, grp_creation, grp_state_country, grp_city FROM tbgroup ORDER BY grp_name ASC";
$query_limit_rsSelectGroup = sprintf("%s LIMIT %d, %d", $query_rsSelectGroup, $startRow_rsSelectGroup, $maxRows_rsSelectGroup);
$rsSelectGroup = mysql_query($query_limit_rsSelectGroup, $dbDescent) or die(mysql_error());
$row_rsSelectGroup = mysql_fetch_assoc($rsSelectGroup);

if (isset($_GET['totalRows_rsSelectGroup'])) {
  $totalRows_rsSelectGroup = $_GET['totalRows_rsSelectGroup'];
} else {
  $all_rsSelectGroup = mysql_query($query_rsSelectGroup);
  $totalRows_rsSelectGroup = mysql_num_rows($all_rsSelectGroup);
}
$totalPages_rsSelectGroup = ceil($totalRows_rsSelectGroup/$maxRows_rsSelectGroup)-1;

$colname_rsPlayerAccess = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsPlayerAccess = $_SESSION['MM_Username'];
}

$query_rsPlayerAccess = sprintf("SELECT player_handle FROM tbplayerlist WHERE player_handle = %s", GetSQLValueString($colname_rsPlayerAccess, "text"));
$rsPlayerAccess = mysql_query($query_rsPlayerAccess, $dbDescent) or die(mysql_error());
$row_rsPlayerAccess = mysql_fetch_assoc($rsPlayerAccess);
$totalRows_rsPlayerAccess = mysql_num_rows($rsPlayerAccess);

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
$queryString_rsSelectGroup = sprintf("&totalRows_rsSelectGroup=%d%s", $totalRows_rsSelectGroup, $queryString_rsSelectGroup);

$query_rsGamesStats = sprintf("SELECT * FROM tbgames");
$rsGamesStats = mysql_query($query_rsGamesStats, $dbDescent) or die(mysql_error());
$row_rsGamesStats = mysql_fetch_assoc($rsGamesStats);
$totalRows_rsGamesStats = mysql_num_rows($rsGamesStats);

$query_rsCharStats = sprintf("SELECT * FROM tbcharacters");
$rsCharStats = mysql_query($query_rsCharStats, $dbDescent) or die(mysql_error());
$row_rsCharStats = mysql_fetch_assoc($rsCharStats);
$totalRows_rsCharStats = mysql_num_rows($rsCharStats);

$OverlordTotal = 0;
$HeroesTotal = 0;

do{
  if($row_rsCharStats['char_hero'] == 0){
    $OverlordTotal += 1;
  } else {
    $HeroesTotal += 1;
  }
} while ($row_rsCharStats = mysql_fetch_assoc($rsCharStats));


$OverlordQuests = 0;
$HeroesQuests = 0;
$undecidedQuests = 0;

$query_rsQuestStats = sprintf("SELECT * FROM tbquests_progress");
$rsQuestStats = mysql_query($query_rsQuestStats, $dbDescent) or die(mysql_error());
$row_rsQuestStats = mysql_fetch_assoc($rsQuestStats);
$totalRows_rsQuestStats = mysql_num_rows($rsQuestStats);

do{
  if($row_rsQuestStats['progress_quest_winner'] == "Overlord Wins"){
    $OverlordQuests += 1;
  } else if($row_rsQuestStats['progress_quest_winner'] == "Heroes Win"){
    $HeroesQuests += 1;
  } else {
    $undecidedQuests += 1;
  }
} while ($row_rsQuestStats = mysql_fetch_assoc($rsQuestStats));

$OverlordQuestsPerc = ($OverlordQuests /($totalRows_rsQuestStats - $undecidedQuests)) * 100;
$HeroesQuestsPerc = ($HeroesQuests / ($totalRows_rsQuestStats - $undecidedQuests)) * 100;

?>

<div class="clearfix">
  <div id="" class="half-block">
  <h2 class="center">Campaigns</h2>
    <?php do { 
      $short = $row_rsCampaignList['cam_name'];
      $short = strtolower($short);
      $short = str_replace(" ","_",$short);
      $short = preg_replace("/[^A-Za-z0-9_]/","",$short);
      ?>
      <a href="campaignmap.php?urlCamID=<?php echo $row_rsCampaignList['cam_id']; ?>"><img src="img/campaigns/logos/<?php echo $short; ?>.jpg" /></a>
    <?php } while ($row_rsCampaignList = mysql_fetch_assoc($rsCampaignList)); ?>
  </div>

  <div id="gaming-groups" class="half-block">
    <div class="inner">
      <h2 class="center">Stats</h2>
      <?php 
        echo '<b>' . $totalRows_rsSelectGroup . '</b> gaming groups, playing <b>' . $totalRows_rsGamesStats . '</b> games.<br />'; 
        echo '<b>' . $HeroesTotal . '</b> Heroes vs. <b>' . $OverlordTotal . '</b> Overlords.<br />';
        echo '<b>' . ($totalRows_rsQuestStats - $undecidedQuests) . '</b> quests';
        echo '<div><div class="statsbar-left" style="width: ' . $HeroesQuestsPerc . '%;">' . '<span class="statsbar-text">Heroes: ' . $HeroesQuests . '</span></div>' . '<div class="statsbar-right" style="width: ' . $OverlordQuestsPerc . '%;">' . '<span class="statsbar-text">Overlord: ' . $OverlordQuests . '</span></div></div>';
      ?>
      <h2 class="center">Gaming Groups</h2>
      <p class="center">Search For a Gaming Group</p>
      <?php do { ?>
      <div>
        <div class="half-block"><a href="gaminggroupcampaign.php?urlGgrp=<?php echo $row_rsSelectGroup['grp_id']; ?>"><?php echo $row_rsSelectGroup['grp_name']; ?></a></div>
        <div class="half-block"><?php echo $row_rsSelectGroup['grp_city'] . ", " . $row_rsSelectGroup['grp_state_country']; ?></div>
      </div>
      <?php } while ($row_rsSelectGroup = mysql_fetch_assoc($rsSelectGroup)); ?>
    </div>
  </div>
</div>

<table>
  <tr>
    <td>
        
      <table width="400" border="0" cellspacing="0" cellpadding="15">

            <table border="0">
              <tr>
                <td><?php if ($pageNum_rsSelectGroup > 0) { // Show if not first page ?>
                    <a href="<?php printf("%s?pageNum_rsSelectGroup=%d%s", $currentPage, 0, $queryString_rsSelectGroup); ?>">First</a>
                    <?php } // Show if not first page ?></td>
                <td><?php if ($pageNum_rsSelectGroup > 0) { // Show if not first page ?>
                    <a href="<?php printf("%s?pageNum_rsSelectGroup=%d%s", $currentPage, max(0, $pageNum_rsSelectGroup - 1), $queryString_rsSelectGroup); ?>">Previous</a>
                    <?php } // Show if not first page ?></td>
                <td><?php if ($pageNum_rsSelectGroup < $totalPages_rsSelectGroup) { // Show if not last page ?>
                    <a href="<?php printf("%s?pageNum_rsSelectGroup=%d%s", $currentPage, min($totalPages_rsSelectGroup, $pageNum_rsSelectGroup + 1), $queryString_rsSelectGroup); ?>">Next</a>
                    <?php } // Show if not last page ?></td>
                <td><?php if ($pageNum_rsSelectGroup < $totalPages_rsSelectGroup) { // Show if not last page ?>
                    <a href="<?php printf("%s?pageNum_rsSelectGroup=%d%s", $currentPage, $totalPages_rsSelectGroup, $queryString_rsSelectGroup); ?>">Last</a>
                    <?php } // Show if not last page ?></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<?php
mysql_free_result($rsCampaignList);

mysql_free_result($rsSelectGroup);

mysql_free_result($rsPlayerAccess);
?>
