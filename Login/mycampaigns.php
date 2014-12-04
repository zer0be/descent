<?php require_once('../Connections/dbDescent.php'); ?>
<?php require_once('../Connections/dbDescent.php'); ?>
<?php require_once('../Connections/dbDescent.php'); ?>
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
	
  $logoutGoTo = "../index.html";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
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

$colname_rsPlayerList = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsPlayerList = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPlayerList = sprintf("SELECT player_username FROM tbplayerlist WHERE player_username = %s", GetSQLValueString($colname_rsPlayerList, "text"));
$rsPlayerList = mysql_query($query_rsPlayerList, $dbDescent) or die(mysql_error());
$row_rsPlayerList = mysql_fetch_assoc($rsPlayerList);
$totalRows_rsPlayerList = mysql_num_rows($rsPlayerList);

$maxRows_rsGETcampaignList = 10;
$pageNum_rsGETcampaignList = 0;
if (isset($_GET['pageNum_rsGETcampaignList'])) {
  $pageNum_rsGETcampaignList = $_GET['pageNum_rsGETcampaignList'];
}
$startRow_rsGETcampaignList = $pageNum_rsGETcampaignList * $maxRows_rsGETcampaignList;

$colname_rsGETcampaignList = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsGETcampaignList = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGETcampaignList = sprintf("SELECT * FROM tbgaminggroup WHERE ggrp_dm = %s ORDER BY ggrp_timestamp DESC", GetSQLValueString($colname_rsGETcampaignList, "text"));
$query_limit_rsGETcampaignList = sprintf("%s LIMIT %d, %d", $query_rsGETcampaignList, $startRow_rsGETcampaignList, $maxRows_rsGETcampaignList);
$rsGETcampaignList = mysql_query($query_limit_rsGETcampaignList, $dbDescent) or die(mysql_error());
$row_rsGETcampaignList = mysql_fetch_assoc($rsGETcampaignList);

if (isset($_GET['totalRows_rsGETcampaignList'])) {
  $totalRows_rsGETcampaignList = $_GET['totalRows_rsGETcampaignList'];
} else {
  $all_rsGETcampaignList = mysql_query($query_rsGETcampaignList);
  $totalRows_rsGETcampaignList = mysql_num_rows($all_rsGETcampaignList);
}
$totalPages_rsGETcampaignList = ceil($totalRows_rsGETcampaignList/$maxRows_rsGETcampaignList)-1;

$bust_rsGETbust1 = "-1";
if (isset($row_rsGETcampaignList['ggrp_char1'])) {
  $bust_rsGETbust1 = $row_rsGETcampaignList['ggrp_char1'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGETbust1 = sprintf("SELECT hero_img FROM tbheroes WHERE hero_name = %s", GetSQLValueString($bust_rsGETbust1, "text"));
$rsGETbust1 = mysql_query($query_rsGETbust1, $dbDescent) or die(mysql_error());
$row_rsGETbust1 = mysql_fetch_assoc($rsGETbust1);
$totalRows_rsGETbust1 = mysql_num_rows($rsGETbust1);

$colname_rsGroupPlayers = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsGroupPlayers = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGroupPlayers = sprintf("SELECT player_handle FROM tbplayerlist WHERE created_by = %s", GetSQLValueString($colname_rsGroupPlayers, "text"));
$rsGroupPlayers = mysql_query($query_rsGroupPlayers, $dbDescent) or die(mysql_error());
$row_rsGroupPlayers = mysql_fetch_assoc($rsGroupPlayers);
$totalRows_rsGroupPlayers = mysql_num_rows($rsGroupPlayers);

$colname_rsGroupNames = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsGroupNames = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGroupNames = sprintf("SELECT grp_name FROM tbgroup WHERE grp_startedby = %s", GetSQLValueString($colname_rsGroupNames, "text"));
$rsGroupNames = mysql_query($query_rsGroupNames, $dbDescent) or die(mysql_error());
$row_rsGroupNames = mysql_fetch_assoc($rsGroupNames);
$totalRows_rsGroupNames = mysql_num_rows($rsGroupNames);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV="REFRESH" />
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META NAME="description" CONTENT="Descent Mobile Quick Guides is a Reference guide to the table top stagety game Descent Journeys in the Dark, Descent Road to Legend and Descent Sea of Blood">
<META NAME="keywords" CONTENT="Descent Journeys in the dark, Road to Legend, Sea of Blood, SoB, RtL, JitD, Descent" />

<link rel="shortcut icon" href=".././favicon.ico" >
<link rel="shortcut icon" href="../descentIcon.gif" type="image/gif" />
<link rel="icon" href="../descentIcon.gif" type="image/gif" /> 
<link rel="apple-touch-icon" href="../apple-touch-icon.png"/>

  
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
<table width="400" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800" align=" align="center"" valign="top" class="background"center> <p><a href="../index.html" target="_top"><img src="../images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>
    <br>
    <a href="<?php echo $logoutAction ?>"><span class="normal">Logout</span></a><span class="normal">, <?php echo $row_rsPlayerList['player_username']; ?></span></p>
      <p>
      <table width="700" border="0" cellspacing="0" cellpadding="15">
        <tr>
          <td width="350" align="center" valign="top" class="header">
          
          <table width="250" border="0" cellpadding="0" cellspacing="0" class="purpleTable">
            <tr>
              <td nowrap="nowrap"> <p><a href="newplayer.php">+ 1. Add New Players to your Group</a></p>
          
          <p><a href="newgroup.php">+ 2. Create a New Gaming Group</a></p>
          
            <p><a href="newcampaign.php">+ Create New Campaign for your Group</a></p>
            <p><a href="changepw.php">+ Update Password</a></p></td>
            </tr>
          </table>
         </td>
          <td align="center" valign="top" class="header">
            Groups:<br><br>
            <table align="center" cellpadding="4" cellspacing="5" class="purpleTable">
              <?php do { ?>
                <tr>
                  <td class="normal">
				  <?php echo $row_rsGroupNames['grp_name']; ?></td>
                </tr>
                <?php } while ($row_rsGroupNames = mysql_fetch_assoc($rsGroupNames)); ?>
          </table></td>
          <td rowspan="2" align="center" valign="top" class="header">Players:<br><br>
          
            <table align="center" cellpadding="4" cellspacing="5" class="goldTable">
              <?php do { ?>
                <tr>
                  <td class="normal"><?php echo $row_rsGroupPlayers['player_handle']; ?></td>
                </tr>
                <?php } while ($row_rsGroupPlayers = mysql_fetch_assoc($rsGroupPlayers)); ?>
          </table></td>
        </tr>
        <tr>
          <td colspan="2" align="center" valign="top" class="header"><table cellpadding="5" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php do { ?>
          <tr>
            <td rowspan="2" bgcolor="#333333" class="pageTitle"><a href="../campaign_overview.php?urlGamingID=<?php echo $row_rsGETcampaignList['ggrp_id']; ?>">+</a></td>
            <td colspan="2" bgcolor="#333333"><span class="header"><?php echo $row_rsGETcampaignList['ggrp_name']; ?></span></td>
            <td colspan="2" bgcolor="#333333"><span class="header"><?php echo $row_rsGETcampaignList['ggrp_campaign']; ?></span></td>
            <td bgcolor="#333333"><span class="normal"><?php echo $row_rsGETcampaignList['ggrp_timestamp']; ?></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap" bgcolor="#9900CC"><span class="normal">Player Mage: <?php echo $row_rsGETcampaignList['ggrp_player1']; ?></span>
            <br>
            <span class="normal"><?php echo $row_rsGETcampaignList['ggrp_char1']; ?></span>
            <br>
            <span class="normal"><?php echo $row_rsGETcampaignList['ggrp_mage1']; ?></span>
           </td>
            <td nowrap="nowrap" bgcolor="#333333"><span class="normal">Player Warrior: <?php echo $row_rsGETcampaignList['ggrp_player2']; ?></span>
            <br>
            <span class="normal"><?php echo $row_rsGETcampaignList['ggrp_char2']; ?></span>
            <br><span class="normal"><?php echo $row_rsGETcampaignList['ggrp_warrior2']; ?></span></td>
            <td nowrap="nowrap" bgcolor="#9900CC"><span class="normal">Player Scout: <?php echo $row_rsGETcampaignList['ggrp_player3']; ?></span>
            <br><span class="normal"><?php echo $row_rsGETcampaignList['ggrp_char3']; ?></span>
            <br><span class="normal"><?php echo $row_rsGETcampaignList['ggrp_scout3']; ?></span></td>
            <td nowrap="nowrap" bgcolor="#333333"><span class="normal">Player Healer: <?php echo $row_rsGETcampaignList['ggrp_player4']; ?></span>
            <br><span class="normal"><?php echo $row_rsGETcampaignList['ggrp_char4']; ?></span>
            <br><span class="normal"><?php echo $row_rsGETcampaignList['ggrp_healer4']; ?></span></td>
            <td nowrap="nowrap" bgcolor="#9900CC"><span class="normal">Player Overord: <?php echo $row_rsGETcampaignList['ggrp_playerOL']; ?></span>
            <br><span class="normal"><?php echo $row_rsGETcampaignList['ggrp_overlord']; ?></span></td>
          </tr>
          <tr>
            <td colspan="6" bgcolor="#333333">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <?php } while ($row_rsGETcampaignList = mysql_fetch_assoc($rsGETcampaignList)); ?>
      </table></td>
        </tr>
      </table>
      </p>
      
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="600" border="0" cellpadding="3" cellspacing="3" class="blackTable">
        <tr>
          <td class="header">NEWS</td>
          <td valign="top" class="normal">&nbsp;</td>
        </tr>
        <tr>
          <td width="300" class="normal"><p>Updates:
          </p>
            <p>12-02-14:<br>
            - Started a full redesign of creating a new Game, special thanks to dllrt<br>
            - Seperated the create campaign into, 4 seperate steps.  choosecampaign, choosegroup, chooseheroes and startinggear.
          </p>
            <p>11-27-14:<br>
          - Added a News Section on the mycampaign page, listing recent updates and upcoming changes.<br>
          - Reformated the mycampaign page slightly.<br>
          - Renaming and adding descriptions to the mycampaigndetail and dungeondetailpage.<br>
          - Reorder the skill list by xp cost in the citydetail page.
        </p>
          <p>11-26-14: 
          <br>
          - Fixed Add Players to Group.
          <br>
          - Added a new Field for adding notes after a completed Quest.<br>
          - Added a few additional descriptions in the public view of the dungeondetail.php</p></td>
          <td valign="top" class="normal">To Do List<br>
          <p>- Add a delete feature for incorrect entries.
         <br>
                  - Add more distintive buttons and replace + with icons.<br>
         - Modify how the username is used for logging in.<br>
         - Change the XP tracking.  Currently XP must be entered for each hero seperately.  Change it so that XP is only needed to be entered once each dungeon.<br>
         - Create a short cut to public view from Edit Mode.
          </p></td>
        </tr>
      </table>
      
      <p class="normal"><a href="../index.html" target="_top">Home</a> | <a href="../firstedition.html" target="_top">1st Ed.</a> | <a href="../secondedition.php" target="_top">2nd Ed.</a> | <a href="../campaign.php">Campaign</a></p>
      
     </td>
</tr>
</table>




<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($rsPlayerList);

mysql_free_result($rsGETcampaignList);

mysql_free_result($rsGETbust1);

mysql_free_result($rsGroupPlayers);

mysql_free_result($rsGroupNames);
?>
