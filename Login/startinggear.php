<?php require_once('../Connections/dbDescent.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../campaign.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tbitems_aquired (shop_id, shop_player, shop_latestdungeon, shop_notes, shop_groupid) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['shop_id'], "int"),
                       GetSQLValueString($_POST['shop_player'], "text"),
                       GetSQLValueString($_POST['shop_latestdungeon'], "text"),
                       GetSQLValueString($_POST['shop_notes'], "text"),
                       GetSQLValueString($_POST['shop_groupid'], "int"));

  mysql_select_db($database_dbDescent, $dbDescent);
  $Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());
}
$colname_rsGroupCampaign = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsGroupCampaign = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGroupCampaign = sprintf("SELECT * FROM tbgaminggroup WHERE ggrp_dm = %s ORDER BY ggrp_id DESC LIMIT 1", GetSQLValueString($colname_rsGroupCampaign, "text"));
$rsGroupCampaign = mysql_query($query_rsGroupCampaign, $dbDescent) or die(mysql_error());
$row_rsGroupCampaign = mysql_fetch_assoc($rsGroupCampaign);
$totalRows_rsGroupCampaign = mysql_num_rows($rsGroupCampaign);

//varibles for the map
$_SESSION['campaignlog'] = $row_rsGroupCampaign['ggrp_campaign'];
//varibles for the portraits
$_SESSION['player1'] = $row_rsGroupCampaign['ggrp_char1'];
$_SESSION['player2'] = $row_rsGroupCampaign['ggrp_char2'];
$_SESSION['player3'] = $row_rsGroupCampaign['ggrp_char3'];
$_SESSION['player4'] = $row_rsGroupCampaign['ggrp_char4'];
$_SESSION['overlord'] = $row_rsGroupCampaign['ggrp_overlord'];

$colname_rsSelectedLog = "-1";
if (isset($_SESSION['campaignlog'])) {
  $colname_rsSelectedLog = $_SESSION['campaignlog'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsSelectedLog = sprintf("SELECT * FROM tbcampaign WHERE cam_name = %s", GetSQLValueString($colname_rsSelectedLog, "text"));
$rsSelectedLog = mysql_query($query_rsSelectedLog, $dbDescent) or die(mysql_error());
$row_rsSelectedLog = mysql_fetch_assoc($rsSelectedLog);
$totalRows_rsSelectedLog = mysql_num_rows($rsSelectedLog);

$colname_rsPortrait1 = "-1";
if (isset($_SESSION['player1'])) {
  $colname_rsPortrait1 = $_SESSION['player1'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPortrait1 = sprintf("SELECT hero_name, hero_img FROM tbheroes WHERE hero_name = %s", GetSQLValueString($colname_rsPortrait1, "text"));
$rsPortrait1 = mysql_query($query_rsPortrait1, $dbDescent) or die(mysql_error());
$row_rsPortrait1 = mysql_fetch_assoc($rsPortrait1);
$totalRows_rsPortrait1 = mysql_num_rows($rsPortrait1);

$colname_rsPortrait2 = "-1";
if (isset($_SESSION['player2'])) {
  $colname_rsPortrait2 = $_SESSION['player2'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPortrait2 = sprintf("SELECT hero_name, hero_img FROM tbheroes WHERE hero_name = %s", GetSQLValueString($colname_rsPortrait2, "text"));
$rsPortrait2 = mysql_query($query_rsPortrait2, $dbDescent) or die(mysql_error());
$row_rsPortrait2 = mysql_fetch_assoc($rsPortrait2);
$totalRows_rsPortrait2 = mysql_num_rows($rsPortrait2);

$colname_rsPortrait3 = "-1";
if (isset($_SESSION['player3'])) {
  $colname_rsPortrait3 = $_SESSION['player3'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPortrait3 = sprintf("SELECT hero_name, hero_img FROM tbheroes WHERE hero_name = %s", GetSQLValueString($colname_rsPortrait3, "text"));
$rsPortrait3 = mysql_query($query_rsPortrait3, $dbDescent) or die(mysql_error());
$row_rsPortrait3 = mysql_fetch_assoc($rsPortrait3);
$totalRows_rsPortrait3 = mysql_num_rows($rsPortrait3);

$colname_rsPortrait4 = "-1";
if (isset($_SESSION['player4'])) {
  $colname_rsPortrait4 = $_SESSION['player4'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPortrait4 = sprintf("SELECT hero_name, hero_img FROM tbheroes WHERE hero_name = %s", GetSQLValueString($colname_rsPortrait4, "text"));
$rsPortrait4 = mysql_query($query_rsPortrait4, $dbDescent) or die(mysql_error());
$row_rsPortrait4 = mysql_fetch_assoc($rsPortrait4);
$totalRows_rsPortrait4 = mysql_num_rows($rsPortrait4);

$colname_rsLog = "-1";
if (isset($_GET['urlGamingID'])) {
  $colname_rsLog = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsLog = sprintf("SELECT DATE_FORMAT(quest_timestamp,'%%b %%d %%Y') AS date, quest_name, quest_name_win, quest_encount_1 FROM tbquests WHERE quest_game_id = %s ORDER BY quest_timestamp ASC", GetSQLValueString($colname_rsLog, "int"));
$rsLog = mysql_query($query_rsLog, $dbDescent) or die(mysql_error());
$row_rsLog = mysql_fetch_assoc($rsLog);
$totalRows_rsLog = mysql_num_rows($rsLog);

$dungeonname_rsCurrentEquipment = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsCurrentEquipment = $_GET['urlDungeonID'];
}
$gamingsession_rsCurrentEquipment = "-1";
if (isset($_GET['urlGamingID'])) {
  $gamingsession_rsCurrentEquipment = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsCurrentEquipment = sprintf("SELECT shop_player, shop_xp, shop_gold FROM tbitems_aquired WHERE shop_latestdungeon = %s AND shop_groupid = %s AND (shop_gold !=0 OR shop_xp !=0)", GetSQLValueString($dungeonname_rsCurrentEquipment, "text"),GetSQLValueString($gamingsession_rsCurrentEquipment, "int"));
$rsCurrentEquipment = mysql_query($query_rsCurrentEquipment, $dbDescent) or die(mysql_error());
$row_rsCurrentEquipment = mysql_fetch_assoc($rsCurrentEquipment);
$totalRows_rsCurrentEquipment = mysql_num_rows($rsCurrentEquipment);

$dungeonname_rsSoldItems = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsSoldItems = $_GET['urlDungeonID'];
}
$gamingsession_rsSoldItems = "-1";
if (isset($_GET['urlGamingID'])) {
  $gamingsession_rsSoldItems = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsSoldItems = sprintf("SELECT shop_market_sold FROM tbitems_aquired WHERE shop_latestdungeon = %s AND shop_groupid = %s AND shop_market_sold IS NOT NULL", GetSQLValueString($dungeonname_rsSoldItems, "text"),GetSQLValueString($gamingsession_rsSoldItems, "int"));
$rsSoldItems = mysql_query($query_rsSoldItems, $dbDescent) or die(mysql_error());
$row_rsSoldItems = mysql_fetch_assoc($rsSoldItems);
$totalRows_rsSoldItems = mysql_num_rows($rsSoldItems);

$dungeonname_rsBoughtItems = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsBoughtItems = $_GET['urlDungeonID'];
}
$groupnumber_rsBoughtItems = "-1";
if (isset($_GET['urlGamingID'])) {
  $groupnumber_rsBoughtItems = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsBoughtItems = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_gold < 0 AND shop_relics IS NULL AND shop_groupid = %s AND shop_latestdungeon = %s AND shop_market_bought IS NOT NULL", GetSQLValueString($groupnumber_rsBoughtItems, "int"),GetSQLValueString($dungeonname_rsBoughtItems, "text"));
$rsBoughtItems = mysql_query($query_rsBoughtItems, $dbDescent) or die(mysql_error());
$row_rsBoughtItems = mysql_fetch_assoc($rsBoughtItems);
$totalRows_rsBoughtItems = mysql_num_rows($rsBoughtItems);

$gamingsession_rsFoundRelics = "-1";
if (isset($_GET['urlGamingID'])) {
  $gamingsession_rsFoundRelics = $_GET['urlGamingID'];
}
$dungeonname_rsFoundRelics = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsFoundRelics = $_GET['urlDungeonID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsFoundRelics = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_latestdungeon = %s AND shop_groupid = %s AND shop_relics='yes'", GetSQLValueString($dungeonname_rsFoundRelics, "text"),GetSQLValueString($gamingsession_rsFoundRelics, "int"));
$rsFoundRelics = mysql_query($query_rsFoundRelics, $dbDescent) or die(mysql_error());
$row_rsFoundRelics = mysql_fetch_assoc($rsFoundRelics);
$totalRows_rsFoundRelics = mysql_num_rows($rsFoundRelics);

$dungeonname_rsSkillsLearned = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsSkillsLearned = $_GET['urlDungeonID'];
}
$gamingsession_rsSkillsLearned = "-1";
if (isset($_GET['urlGamingID'])) {
  $gamingsession_rsSkillsLearned = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsSkillsLearned = sprintf("SELECT shop_skills FROM tbitems_aquired WHERE shop_latestdungeon = %s AND shop_groupid = %s AND shop_skills IS NOT NULL AND shop_player != 'overlord'", GetSQLValueString($dungeonname_rsSkillsLearned, "text"),GetSQLValueString($gamingsession_rsSkillsLearned, "int"));
$rsSkillsLearned = mysql_query($query_rsSkillsLearned, $dbDescent) or die(mysql_error());
$row_rsSkillsLearned = mysql_fetch_assoc($rsSkillsLearned);
$totalRows_rsSkillsLearned = mysql_num_rows($rsSkillsLearned);

$colname_rsOverlordPort = "-1";
if (isset($_SESSION['overlord'])) {
  $colname_rsOverlordPort = $_SESSION['overlord'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsOverlordPort = sprintf("SELECT hero_name, hero_img FROM tbheroes WHERE hero_name = %s", GetSQLValueString($colname_rsOverlordPort, "text"));
$rsOverlordPort = mysql_query($query_rsOverlordPort, $dbDescent) or die(mysql_error());
$row_rsOverlordPort = mysql_fetch_assoc($rsOverlordPort);
$totalRows_rsOverlordPort = mysql_num_rows($rsOverlordPort);

$colname_rsOLskills = "-1";
if (isset($_GET['urlGamingID'])) {
  $colname_rsOLskills = $_GET['urlGamingID'];
}
$dungeonname_rsOLskills = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsOLskills = $_GET['urlDungeonID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsOLskills = sprintf("SELECT shop_skills FROM tbitems_aquired WHERE shop_groupid = %s AND shop_latestdungeon = %s AND shop_player = 'overlord' AND shop_skills IS NOT NULL", GetSQLValueString($colname_rsOLskills, "int"),GetSQLValueString($dungeonname_rsOLskills, "text"));
$rsOLskills = mysql_query($query_rsOLskills, $dbDescent) or die(mysql_error());
$row_rsOLskills = mysql_fetch_assoc($rsOLskills);
$totalRows_rsOLskills = mysql_num_rows($rsOLskills);

$colname_rsPlayerAccess = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsPlayerAccess = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPlayerAccess = sprintf("SELECT player_handle FROM tbplayerlist WHERE player_handle = %s", GetSQLValueString($colname_rsPlayerAccess, "text"));
$rsPlayerAccess = mysql_query($query_rsPlayerAccess, $dbDescent) or die(mysql_error());
$row_rsPlayerAccess = mysql_fetch_assoc($rsPlayerAccess);
$totalRows_rsPlayerAccess = mysql_num_rows($rsPlayerAccess);

$groupnumber_rsFoundItems = "-1";
if (isset($_GET['urlGamingID'])) {
  $groupnumber_rsFoundItems = $_GET['urlGamingID'];
}
$dungeonname_rsFoundItems = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsFoundItems = $_GET['urlDungeonID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsFoundItems = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_gold = 0 AND shop_equipped = 'yes' AND shop_relics IS NULL AND shop_groupid = %s AND shop_latestdungeon = %s AND shop_market_bought IS NOT NULL", GetSQLValueString($groupnumber_rsFoundItems, "int"),GetSQLValueString($dungeonname_rsFoundItems, "text"));
$rsFoundItems = mysql_query($query_rsFoundItems, $dbDescent) or die(mysql_error());
$row_rsFoundItems = mysql_fetch_assoc($rsFoundItems);
$totalRows_rsFoundItems = mysql_num_rows($rsFoundItems);

$colname_rsGetNotes = "-1";
if (isset($_GET['urlGamingID'])) {
  $colname_rsGetNotes = $_GET['urlGamingID'];
}
$dungeon_rsGetNotes = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeon_rsGetNotes = $_GET['urlDungeonID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetNotes = sprintf("SELECT shop_notes FROM tbitems_aquired WHERE shop_groupid = %s AND shop_latestdungeon = %s AND shop_notes IS NOT NULL", GetSQLValueString($colname_rsGetNotes, "int"),GetSQLValueString($dungeon_rsGetNotes, "text"));
$rsGetNotes = mysql_query($query_rsGetNotes, $dbDescent) or die(mysql_error());
$row_rsGetNotes = mysql_fetch_assoc($rsGetNotes);
$totalRows_rsGetNotes = mysql_num_rows($rsGetNotes);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV="REFRESH" />
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META NAME="description" CONTENT="Descent Mobile is a quick reference campaing tracker for the table top stagety game Descent Journeys in the Dark, 2nd edition">
<META NAME="keywords" CONTENT="Descent Journeys in the dark, Road to Legend, Sea of Blood, SoB, RtL, JitD, Descent, descent 2nd, descentinthedark.com, descentinthedark, fantasy flight games, fantasyflightgames, second edition, campaign track, campaign, table top gaming, gaming, shadow rune" />
<!--Moible Viewport-->
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
<meta name="apple-mobile-web-app-capable" content="yes" />
<!--End Mobile viewport-->

<!--shortcut icon-->
<link rel="shortcut icon" href=".././favicon.ico" >
<link rel="shortcut icon" href="../descentIcon.gif" type="image/gif" />
<link rel="icon" href="../descentIcon.gif" type="image/gif" /> 
<link rel="apple-touch-icon" href="../apple-touch-icon.png"/>
<!--End Short cut Icon-->

  
<title>Descent Mobile Quick Guides</title>
<script src="../SpryAssets/SpryAccordion.js" type="text/javascript">

</script>
<script src="../SpryAssets/SpryTooltip.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.normal {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 10px;
	color: #FFF;
}
body,td,th {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 10px;
}
.headerTable {
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #000;
	font-size: 10px;
	font-weight: bold;
}
.background {
	background-image: url(../images/wallpaper.jpg);
	background-repeat: repeat-y;
	background-position: 0px 0px;
	background-color: #000;
}
.footer {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 9px;
	color: #FFF;
}
.header {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 14px;
	font-style: normal;
	font-weight: bold;
	color: #FFF;
}
a:link {
	color: #FFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFF;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
-->
</style>
<style type="text/css">
<!--
body {
	background-color: #000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>

<link href="../SpryAssets/SpryTooltip.css" rel="stylesheet" type="text/css" />
<link href="../cssDescentMobile.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<table width="600" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800 align=" align="center"" valign="top" class="background"center> <p><a href="../index.html" target="_top"><img src="../images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>
    
    
    
    <table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span class="normal"><a href="login.php">login</a>, <a href="mycampaigns.php"><?php echo $row_rsPlayerAccess['player_handle']; ?> My Campaigns</a></span></td>
    <td align="right" class="normal"><a href="<?php echo $logoutAction ?>">Log out</a></td>
  </tr>
</table>

    
         
      <p class="pageTitle">Edit Mode</p>
      <table width="600" border="0" cellspacing="0" cellpadding="15">
        <tr>
          <td align="center" class="header"><p><?php echo $row_rsGroupCampaign['ggrp_name']; ?> <br>
            <?php echo $row_rsSelectedLog['cam_name']; ?> 
            <br><?php echo $_GET['urlDungeonID']; ?>
            </p>
            
          </td>
        </tr>
      </table>
      <p class="normal">&nbsp;</p>
      <table width="600" border="0" cellspacing="0" cellpadding="15">
        <tr>
          <td align="center" class="header">&nbsp;</td>
          <td align="center" class="header">&nbsp;</td>
          <td align="center" class="header">&nbsp;</td>
          <td align="center" class="header">&nbsp;</td>
        </tr>
        <tr>
          <td align="center" class="header">
		  <?php echo $row_rsGroupCampaign['ggrp_char1']; ?>
          <br>
          <a href="citydetail.php?urlGamingID=<?php echo $_GET['urlGamingID']; ?>&amp;urlHeroID=<?php echo $row_rsGroupCampaign['ggrp_char1']; ?>&amp;urlDungeonID=<?php echo $_GET['urlDungeonID']; ?>&amp;urlClassID=<?php echo $row_rsGroupCampaign['ggrp_mage1']; ?>"><img src="../images/campaign/heroes/bust/<?php echo $row_rsPortrait1['hero_img']; ?>" width="100" /></a>
		  <br>
		  <br>
		  <?php echo $row_rsGroupCampaign['ggrp_player1']; ?>
          </td>
          <td align="center" class="header">
            <?php echo $row_rsGroupCampaign['ggrp_char2']; ?><a href="citydetail.php?urlGamingID=<?php echo $_GET['urlGamingID']; ?>&amp;urlHeroID=<?php echo $row_rsGroupCampaign['ggrp_char2']; ?>&amp;urlDungeonID=<?php echo $_GET['urlDungeonID']; ?>&amp;urlClassID=<?php echo $row_rsGroupCampaign['ggrp_warrior2']; ?>"><img src="../images/campaign/heroes/bust/<?php echo $row_rsPortrait2['hero_img']; ?>" width="100" /></a>
            <br>
            <br>
          <?php echo $row_rsGroupCampaign['ggrp_player2']; ?></td>
          <td align="center" class="header">
            <?php echo $row_rsGroupCampaign['ggrp_char3']; ?>
            <a href="citydetail.php?urlGamingID=<?php echo $_GET['urlGamingID']; ?>&amp;urlHeroID=<?php echo $row_rsGroupCampaign['ggrp_char3']; ?>&amp;urlDungeonID=<?php echo $_GET['urlDungeonID']; ?>&amp;urlClassID=<?php echo $row_rsGroupCampaign['ggrp_scout3']; ?>"><img src="../images/campaign/heroes/bust/<?php echo $row_rsPortrait3['hero_img']; ?>" width="100" /></a>
            <br>
            <br>
          <?php echo $row_rsGroupCampaign['ggrp_player3']; ?></td>
          <td align="center" class="header">
		  <?php echo $row_rsGroupCampaign['ggrp_char4']; ?><a href="citydetail.php?urlGamingID=<?php echo $_GET['urlGamingID']; ?>&amp;urlHeroID=<?php echo $row_rsGroupCampaign['ggrp_char4']; ?>&amp;urlDungeonID=<?php echo $_GET['urlDungeonID']; ?>&amp;urlClassID=<?php echo $row_rsGroupCampaign['ggrp_healer4']; ?>"><img src="../images/campaign/heroes/bust/<?php echo $row_rsPortrait4['hero_img']; ?>" width="100" /></a>
		  <br>
		  <br>
		  <?php echo $row_rsGroupCampaign['ggrp_player4']; ?></td>
        </tr>
        <tr>
          <td align="center" class="header"><p>starting skills</p>
          <p>starting equipment</p></td>
          <td align="center" class="header"><p>starting skills</p>
          <p>starting equipment</p></td>
          <td align="center" class="header"><p>starting skills</p>
          <p>starting equipment</p></td>
          <td align="center" class="header"><p>starting skills</p>
          <p>starting equipment</p></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table width="100" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><span class="header"><?php echo $row_rsGroupCampaign['ggrp_playerOL']; ?> <a href="overlord.php?urlGamingID=<?php echo $row_rsGroupCampaign['ggrp_id']; ?>&amp;urlDungeonID=<?php echo $_GET['urlDungeonID']; ?>&amp;urlHeroID=<?php echo $row_rsGroupCampaign['ggrp_overlord']; ?>&amp;urlClassID=<?php echo $row_rsGroupCampaign['ggrp_overlord']; ?>"><img src="../images/campaign/heroes/bust/<?php echo $row_rsOverlordPort['hero_img']; ?>" width="100" /></a> <?php echo $row_rsGroupCampaign['ggrp_overlord']; ?></span></td>
        </tr>
        <tr>
          <td><p class="header">starting skills</p>
          <p class="header">starting equipment</p></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <br>
      <p class="normal">&nbsp;</p>
<p class="normal"><a href="mycampaigndetail.php?urlGamingID=<?php echo $row_rsGroupCampaign['ggrp_id']; ?>" class="pageTitle">return to current group campaign </a></p>
<p class="normal">&nbsp;</p>

      <p class="normal">
        <a href="../campaign.php" target="_self"><img src="../images/buttons/campaign2ndlogo.png" alt="Choose another Campaign" width="300" height="55" border="0" /></a> 
        <br>
<a href="../index.html" target="_top">Home</a> | <a href="../firstedition.html" target="_top">1st Ed.</a> | <a href="../secondedition.php" target="_top">2nd Ed.</a> | <a href="../campaign.php">Campaign</a></p>
      
    <p class="footer"><a href="http://sciscoedesigns.com" target="_blank"><em>hosted by sciscoeDesigns</em></a></p></td>
</tr>
</table>




<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($rsSelectedLog);

mysql_free_result($rsPortrait1);

mysql_free_result($rsPortrait2);

mysql_free_result($rsPortrait3);

mysql_free_result($rsPortrait4);

mysql_free_result($rsLog);

mysql_free_result($rsCurrentEquipment);

mysql_free_result($rsSoldItems);

mysql_free_result($rsBoughtItems);

mysql_free_result($rsFoundRelics);

mysql_free_result($rsSkillsLearned);

mysql_free_result($rsOverlordPort);

mysql_free_result($rsOLskills);

mysql_free_result($rsPlayerAccess);

mysql_free_result($rsFoundItems);

mysql_free_result($rsGetNotes);

mysql_free_result($rsGroupCampaign);
?>
