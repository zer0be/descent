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
$colname_rsGroupCampaign = "-1";
if (isset($_GET['urlGamingID'])) {
  $colname_rsGroupCampaign = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGroupCampaign = sprintf("SELECT * FROM tbgaminggroup WHERE ggrp_id = %s", GetSQLValueString($colname_rsGroupCampaign, "int"));
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
$query_rsLog = sprintf("SELECT DATE_FORMAT(quest_timestamp,'%%b %%d %%Y') AS date, quest_name,  quest_name_win, quest_encount_1, quest_id FROM tbquests WHERE quest_game_id = %s ORDER BY quest_timestamp DESC", GetSQLValueString($colname_rsLog, "int"));
$rsLog = mysql_query($query_rsLog, $dbDescent) or die(mysql_error());
$row_rsLog = mysql_fetch_assoc($rsLog);
$totalRows_rsLog = mysql_num_rows($rsLog);

$colname_rsGetOverlord = "-1";
if (isset($_SESSION['overlord'])) {
  $colname_rsGetOverlord = $_SESSION['overlord'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetOverlord = sprintf("SELECT hero_name, hero_img FROM tbheroes WHERE hero_name = %s", GetSQLValueString($colname_rsGetOverlord, "text"));
$rsGetOverlord = mysql_query($query_rsGetOverlord, $dbDescent) or die(mysql_error());
$row_rsGetOverlord = mysql_fetch_assoc($rsGetOverlord);
$totalRows_rsGetOverlord = mysql_num_rows($rsGetOverlord);

$colname_rsSumGoldLoot = "-1";
if (isset($_GET['urlGamingID'])) {
  $colname_rsSumGoldLoot = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsSumGoldLoot = sprintf("SELECT SUM(shop_gold + shop_goldsold) AS goldshop FROM tbitems_aquired WHERE shop_groupid = %s", GetSQLValueString($colname_rsSumGoldLoot, "int"));
$rsSumGoldLoot = mysql_query($query_rsSumGoldLoot, $dbDescent) or die(mysql_error());
$row_rsSumGoldLoot = mysql_fetch_assoc($rsSumGoldLoot);
$totalRows_rsSumGoldLoot = mysql_num_rows($rsSumGoldLoot);

$dungeongroup_rsGetXPtotalPlayer1 = "-1";
if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsGetXPtotalPlayer1 = $_GET['urlGamingID'];
}
$group_rsGetXPtotalPlayer1 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char1'])) {
  $group_rsGetXPtotalPlayer1 = ($row_rsGroupCampaign['ggrp_char1']);
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetXPtotalPlayer1 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE tbitems_aquired.shop_player = %s AND tbitems_aquired.shop_groupid = %s AND shop_xp > 0", GetSQLValueString($group_rsGetXPtotalPlayer1, "text"),GetSQLValueString($dungeongroup_rsGetXPtotalPlayer1, "int"));
$rsGetXPtotalPlayer1 = mysql_query($query_rsGetXPtotalPlayer1, $dbDescent) or die(mysql_error());
$row_rsGetXPtotalPlayer1 = mysql_fetch_assoc($rsGetXPtotalPlayer1);
$totalRows_rsGetXPtotalPlayer1 = mysql_num_rows($rsGetXPtotalPlayer1);

$dungeongroup_rsGetXPtotalPlayer2 = "-1";
if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsGetXPtotalPlayer2 = $_GET['urlGamingID'];
}
$group_rsGetXPtotalPlayer2 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char2'])) {
  $group_rsGetXPtotalPlayer2 = $row_rsGroupCampaign['ggrp_char2'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetXPtotalPlayer2 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE tbitems_aquired.shop_player = %s AND tbitems_aquired.shop_groupid = %s AND shop_xp > 0 ", GetSQLValueString($group_rsGetXPtotalPlayer2, "text"),GetSQLValueString($dungeongroup_rsGetXPtotalPlayer2, "int"));
$rsGetXPtotalPlayer2 = mysql_query($query_rsGetXPtotalPlayer2, $dbDescent) or die(mysql_error());
$row_rsGetXPtotalPlayer2 = mysql_fetch_assoc($rsGetXPtotalPlayer2);
$totalRows_rsGetXPtotalPlayer2 = mysql_num_rows($rsGetXPtotalPlayer2);

$group_rsGetXPtotalPlayer3 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char3'])) {
  $group_rsGetXPtotalPlayer3 = $row_rsGroupCampaign['ggrp_char3'];
}
$dungeongroup_rsGetXPtotalPlayer3 = "-1";
if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsGetXPtotalPlayer3 = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetXPtotalPlayer3 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE tbitems_aquired.shop_player = %s AND tbitems_aquired.shop_groupid = %s AND shop_xp > 0 ", GetSQLValueString($group_rsGetXPtotalPlayer3, "text"),GetSQLValueString($dungeongroup_rsGetXPtotalPlayer3, "int"));
$rsGetXPtotalPlayer3 = mysql_query($query_rsGetXPtotalPlayer3, $dbDescent) or die(mysql_error());
$row_rsGetXPtotalPlayer3 = mysql_fetch_assoc($rsGetXPtotalPlayer3);
$totalRows_rsGetXPtotalPlayer3 = mysql_num_rows($rsGetXPtotalPlayer3);

$group_rsGetXPtotalPlayer4 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char4'])) {
  $group_rsGetXPtotalPlayer4 = $row_rsGroupCampaign['ggrp_char4'];
}
$dungeongroup_rsGetXPtotalPlayer4 = "-1";
if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsGetXPtotalPlayer4 = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetXPtotalPlayer4 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE tbitems_aquired.shop_player = %s AND tbitems_aquired.shop_groupid = %s AND shop_xp > 0 ", GetSQLValueString($group_rsGetXPtotalPlayer4, "text"),GetSQLValueString($dungeongroup_rsGetXPtotalPlayer4, "int"));
$rsGetXPtotalPlayer4 = mysql_query($query_rsGetXPtotalPlayer4, $dbDescent) or die(mysql_error());
$row_rsGetXPtotalPlayer4 = mysql_fetch_assoc($rsGetXPtotalPlayer4);
$totalRows_rsGetXPtotalPlayer4 = mysql_num_rows($rsGetXPtotalPlayer4);

$dungeongroup_rsGetXPtotalOverlord = "-1";
if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsGetXPtotalOverlord = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetXPtotalOverlord = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_player='Overlord' AND shop_groupid = %s AND shop_xp > 0 ", GetSQLValueString($dungeongroup_rsGetXPtotalOverlord, "int"));
$rsGetXPtotalOverlord = mysql_query($query_rsGetXPtotalOverlord, $dbDescent) or die(mysql_error());
$row_rsGetXPtotalOverlord = mysql_fetch_assoc($rsGetXPtotalOverlord);
$totalRows_rsGetXPtotalOverlord = mysql_num_rows($rsGetXPtotalOverlord);

$gaminggroup_rsGetXPremainingOverlord = "-1";
if (isset($_GET['urlGamingID'])) {
  $gaminggroup_rsGetXPremainingOverlord = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetXPremainingOverlord = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_player = 'Overlord' AND shop_groupid = %s AND shop_xp IS NOT NULL ORDER BY shop_xp ASC", GetSQLValueString($gaminggroup_rsGetXPremainingOverlord, "int"));
$rsGetXPremainingOverlord = mysql_query($query_rsGetXPremainingOverlord, $dbDescent) or die(mysql_error());
$row_rsGetXPremainingOverlord = mysql_fetch_assoc($rsGetXPremainingOverlord);
$totalRows_rsGetXPremainingOverlord = mysql_num_rows($rsGetXPremainingOverlord);

$player_rsGetXPremainingPlayer1 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char1'])) {
  $player_rsGetXPremainingPlayer1 = $row_rsGroupCampaign['ggrp_char1'];
}
$gaminggroup_rsGetXPremainingPlayer1 = "-1";
if (isset($_GET['urlGamingID'])) {
  $gaminggroup_rsGetXPremainingPlayer1 = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetXPremainingPlayer1 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s ", GetSQLValueString($player_rsGetXPremainingPlayer1, "text"),GetSQLValueString($gaminggroup_rsGetXPremainingPlayer1, "int"));
$rsGetXPremainingPlayer1 = mysql_query($query_rsGetXPremainingPlayer1, $dbDescent) or die(mysql_error());
$row_rsGetXPremainingPlayer1 = mysql_fetch_assoc($rsGetXPremainingPlayer1);
$totalRows_rsGetXPremainingPlayer1 = mysql_num_rows($rsGetXPremainingPlayer1);

$player_rsGetXPremainingPlayer2 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char2'])) {
  $player_rsGetXPremainingPlayer2 = $row_rsGroupCampaign['ggrp_char2'];
}
$gaminggroup_rsGetXPremainingPlayer2 = "-1";
if (isset($_GET['urlGamingID'])) {
  $gaminggroup_rsGetXPremainingPlayer2 = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetXPremainingPlayer2 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s ", GetSQLValueString($player_rsGetXPremainingPlayer2, "text"),GetSQLValueString($gaminggroup_rsGetXPremainingPlayer2, "int"));
$rsGetXPremainingPlayer2 = mysql_query($query_rsGetXPremainingPlayer2, $dbDescent) or die(mysql_error());
$row_rsGetXPremainingPlayer2 = mysql_fetch_assoc($rsGetXPremainingPlayer2);
$totalRows_rsGetXPremainingPlayer2 = mysql_num_rows($rsGetXPremainingPlayer2);

$player_rsGetXPremainingPlayer3 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char3'])) {
  $player_rsGetXPremainingPlayer3 = $row_rsGroupCampaign['ggrp_char3'];
}
$gaminggroup_rsGetXPremainingPlayer3 = "-1";
if (isset($_GET['urlGamingID'])) {
  $gaminggroup_rsGetXPremainingPlayer3 = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetXPremainingPlayer3 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s ", GetSQLValueString($player_rsGetXPremainingPlayer3, "text"),GetSQLValueString($gaminggroup_rsGetXPremainingPlayer3, "int"));
$rsGetXPremainingPlayer3 = mysql_query($query_rsGetXPremainingPlayer3, $dbDescent) or die(mysql_error());
$row_rsGetXPremainingPlayer3 = mysql_fetch_assoc($rsGetXPremainingPlayer3);
$totalRows_rsGetXPremainingPlayer3 = mysql_num_rows($rsGetXPremainingPlayer3);

$player_rsGetXPremainingPlayer4 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char4'])) {
  $player_rsGetXPremainingPlayer4 = $row_rsGroupCampaign['ggrp_char4'];
}
$gaminggroup_rsGetXPremainingPlayer4 = "-1";
if (isset($_GET['urlGamingID'])) {
  $gaminggroup_rsGetXPremainingPlayer4 = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetXPremainingPlayer4 = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s ", GetSQLValueString($player_rsGetXPremainingPlayer4, "text"),GetSQLValueString($gaminggroup_rsGetXPremainingPlayer4, "int"));
$rsGetXPremainingPlayer4 = mysql_query($query_rsGetXPremainingPlayer4, $dbDescent) or die(mysql_error());
$row_rsGetXPremainingPlayer4 = mysql_fetch_assoc($rsGetXPremainingPlayer4);
$totalRows_rsGetXPremainingPlayer4 = mysql_num_rows($rsGetXPremainingPlayer4);

$gaming_rsGetSkillsOverlord = "-1";
if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetSkillsOverlord = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetSkillsOverlord = sprintf("SELECT spendxp_skill_name, shop_xp FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = 'Overlord' AND spendxp_skill_name IS NOT NULL AND shop_xp < 0", GetSQLValueString($gaming_rsGetSkillsOverlord, "int"));
$rsGetSkillsOverlord = mysql_query($query_rsGetSkillsOverlord, $dbDescent) or die(mysql_error());
$row_rsGetSkillsOverlord = mysql_fetch_assoc($rsGetSkillsOverlord);
$totalRows_rsGetSkillsOverlord = mysql_num_rows($rsGetSkillsOverlord);

$gaming_rsGetSkillsPlayer1 = "-1";
if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetSkillsPlayer1 = $_GET['urlGamingID'];
}
$player_rsGetSkillsPlayer1 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char1'])) {
  $player_rsGetSkillsPlayer1 = $row_rsGroupCampaign['ggrp_char1'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetSkillsPlayer1 = sprintf("SELECT spendxp_skill_name, shop_xp FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = %s AND spendxp_skill_name IS NOT NULL ORDER BY shop_xp ASC", GetSQLValueString($gaming_rsGetSkillsPlayer1, "int"),GetSQLValueString($player_rsGetSkillsPlayer1, "text"));
$rsGetSkillsPlayer1 = mysql_query($query_rsGetSkillsPlayer1, $dbDescent) or die(mysql_error());
$row_rsGetSkillsPlayer1 = mysql_fetch_assoc($rsGetSkillsPlayer1);
$totalRows_rsGetSkillsPlayer1 = mysql_num_rows($rsGetSkillsPlayer1);

$gaming_rsGetSkillsPlayer2 = "-1";
if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetSkillsPlayer2 = $_GET['urlGamingID'];
}
$player_rsGetSkillsPlayer2 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char2'])) {
  $player_rsGetSkillsPlayer2 = $row_rsGroupCampaign['ggrp_char2'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetSkillsPlayer2 = sprintf("SELECT spendxp_skill_name, shop_xp FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = %s AND spendxp_skill_name IS NOT NULL   ORDER BY shop_xp ASC", GetSQLValueString($gaming_rsGetSkillsPlayer2, "int"),GetSQLValueString($player_rsGetSkillsPlayer2, "text"));
$rsGetSkillsPlayer2 = mysql_query($query_rsGetSkillsPlayer2, $dbDescent) or die(mysql_error());
$row_rsGetSkillsPlayer2 = mysql_fetch_assoc($rsGetSkillsPlayer2);
$totalRows_rsGetSkillsPlayer2 = mysql_num_rows($rsGetSkillsPlayer2);

$gaming_rsGetSkillsPlayer3 = "-1";
if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetSkillsPlayer3 = $_GET['urlGamingID'];
}
$player_rsGetSkillsPlayer3 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char3'])) {
  $player_rsGetSkillsPlayer3 = $row_rsGroupCampaign['ggrp_char3'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetSkillsPlayer3 = sprintf("SELECT spendxp_skill_name, shop_xp FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = %s AND spendxp_skill_name IS NOT NULL   ORDER BY shop_xp ASC", GetSQLValueString($gaming_rsGetSkillsPlayer3, "int"),GetSQLValueString($player_rsGetSkillsPlayer3, "text"));
$rsGetSkillsPlayer3 = mysql_query($query_rsGetSkillsPlayer3, $dbDescent) or die(mysql_error());
$row_rsGetSkillsPlayer3 = mysql_fetch_assoc($rsGetSkillsPlayer3);
$totalRows_rsGetSkillsPlayer3 = mysql_num_rows($rsGetSkillsPlayer3);

$player_rsGetSkillsPlayer4 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char4'])) {
  $player_rsGetSkillsPlayer4 = $row_rsGroupCampaign['ggrp_char4'];
}
$gaming_rsGetSkillsPlayer4 = "-1";
if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetSkillsPlayer4 = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetSkillsPlayer4 = sprintf("SELECT spendxp_skill_name, shop_xp FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = %s AND spendxp_skill_name IS NOT NULL  ORDER BY shop_xp ASC ", GetSQLValueString($gaming_rsGetSkillsPlayer4, "int"),GetSQLValueString($player_rsGetSkillsPlayer4, "text"));
$rsGetSkillsPlayer4 = mysql_query($query_rsGetSkillsPlayer4, $dbDescent) or die(mysql_error());
$row_rsGetSkillsPlayer4 = mysql_fetch_assoc($rsGetSkillsPlayer4);
$totalRows_rsGetSkillsPlayer4 = mysql_num_rows($rsGetSkillsPlayer4);

$gaming_rsGetItemsOverlord = "-1";
if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetItemsOverlord = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetItemsOverlord = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_groupid = %s  AND shop_player = 'Overlord'  AND shop_equipped = 'yes' AND shop_market_bought IS NOT NULL ORDER BY shop_id DESC ", GetSQLValueString($gaming_rsGetItemsOverlord, "int"));
$rsGetItemsOverlord = mysql_query($query_rsGetItemsOverlord, $dbDescent) or die(mysql_error());
$row_rsGetItemsOverlord = mysql_fetch_assoc($rsGetItemsOverlord);
$totalRows_rsGetItemsOverlord = mysql_num_rows($rsGetItemsOverlord);

$player_rsGetItemsPlayer1 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char1'])) {
  $player_rsGetItemsPlayer1 = $row_rsGroupCampaign['ggrp_char1'];
}
$gaming_rsGetItemsPlayer1 = "-1";
if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetItemsPlayer1 = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetItemsPlayer1 = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_groupid = %s  AND shop_player = %s AND shop_equipped = 'yes' AND shop_market_bought IS NOT NULL  ORDER BY shop_id DESC ", GetSQLValueString($gaming_rsGetItemsPlayer1, "int"),GetSQLValueString($player_rsGetItemsPlayer1, "text"));
$rsGetItemsPlayer1 = mysql_query($query_rsGetItemsPlayer1, $dbDescent) or die(mysql_error());
$row_rsGetItemsPlayer1 = mysql_fetch_assoc($rsGetItemsPlayer1);
$totalRows_rsGetItemsPlayer1 = mysql_num_rows($rsGetItemsPlayer1);

$player_rsGetItemsPlayer2 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char2'])) {
  $player_rsGetItemsPlayer2 = $row_rsGroupCampaign['ggrp_char2'];
}
$gaming_rsGetItemsPlayer2 = "-1";
if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetItemsPlayer2 = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetItemsPlayer2 = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_groupid = %s  AND shop_player = %s AND shop_equipped = 'yes' AND shop_market_bought IS NOT NULL  ORDER BY shop_id DESC ", GetSQLValueString($gaming_rsGetItemsPlayer2, "int"),GetSQLValueString($player_rsGetItemsPlayer2, "text"));
$rsGetItemsPlayer2 = mysql_query($query_rsGetItemsPlayer2, $dbDescent) or die(mysql_error());
$row_rsGetItemsPlayer2 = mysql_fetch_assoc($rsGetItemsPlayer2);
$totalRows_rsGetItemsPlayer2 = mysql_num_rows($rsGetItemsPlayer2);

$player_rsGetItemsPlayer3 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char3'])) {
  $player_rsGetItemsPlayer3 = $row_rsGroupCampaign['ggrp_char3'];
}
$gaming_rsGetItemsPlayer3 = "-1";
if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetItemsPlayer3 = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetItemsPlayer3 = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_groupid = %s  AND shop_player = %s AND shop_equipped = 'yes' AND shop_market_bought IS NOT NULL  ORDER BY shop_id DESC ", GetSQLValueString($gaming_rsGetItemsPlayer3, "int"),GetSQLValueString($player_rsGetItemsPlayer3, "text"));
$rsGetItemsPlayer3 = mysql_query($query_rsGetItemsPlayer3, $dbDescent) or die(mysql_error());
$row_rsGetItemsPlayer3 = mysql_fetch_assoc($rsGetItemsPlayer3);
$totalRows_rsGetItemsPlayer3 = mysql_num_rows($rsGetItemsPlayer3);

$player_rsGetItemsPlayer4 = "-1";
if (isset($row_rsGroupCampaign['ggrp_char4'])) {
  $player_rsGetItemsPlayer4 = $row_rsGroupCampaign['ggrp_char4'];
}
$gaming_rsGetItemsPlayer4 = "-1";
if (isset($_GET['urlGamingID'])) {
  $gaming_rsGetItemsPlayer4 = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetItemsPlayer4 = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_groupid = %s  AND shop_player = %s AND shop_equipped = 'yes' AND shop_market_bought IS NOT NULL  ORDER BY shop_id DESC ", GetSQLValueString($gaming_rsGetItemsPlayer4, "int"),GetSQLValueString($player_rsGetItemsPlayer4, "text"));
$rsGetItemsPlayer4 = mysql_query($query_rsGetItemsPlayer4, $dbDescent) or die(mysql_error());
$row_rsGetItemsPlayer4 = mysql_fetch_assoc($rsGetItemsPlayer4);
$totalRows_rsGetItemsPlayer4 = mysql_num_rows($rsGetItemsPlayer4);

$colname_rsPLayerAccess = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsPLayerAccess = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPLayerAccess = sprintf("SELECT player_handle FROM tbplayerlist WHERE player_handle = %s", GetSQLValueString($colname_rsPLayerAccess, "text"));
$rsPLayerAccess = mysql_query($query_rsPLayerAccess, $dbDescent) or die(mysql_error());
$row_rsPLayerAccess = mysql_fetch_assoc($rsPLayerAccess);
$totalRows_rsPLayerAccess = mysql_num_rows($rsPLayerAccess);
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
    <br> <table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span class="normal"> <a href="login.php">Login,</a> <a href="mycampaigns.php"><?php echo $row_rsPLayerAccess['player_handle']; ?> My Campaigns</a></span></td>
    <td align="right" class="normal"> <a href="<?php echo $logoutAction ?>">Log out</a></td>
  </tr>
</table>

    </p>
      <p class="pageTitle">Edit Mode</p>
      <p><span class="pageTitle"><?php echo $row_rsGroupCampaign['ggrp_name']; ?></span> <BR>
        <img src="../images/logos/<?php echo $row_rsSelectedLog['cam_logo']; ?>" />
        
        
        
      </p>
      
      <table width="500" border="0" cellpadding="0" cellspacing="10" class="blackTable" id="tableOverlord">
  <tr>
    <td width="110" rowspan="2" align="left" class="header"><img src="../images/campaign/heroes/bust/<?php echo $row_rsGetOverlord['hero_img']; ?>" alt="overlord" width="100" />
    <br><span class="header"><?php echo $row_rsGroupCampaign['ggrp_overlord']; ?></span></td>
    <td colspan="2" align="left" valign="top">
      <span class="normal"> <?php echo $row_rsGetXPremainingOverlord['SUM(shop_xp)']; ?>/</span><span class="header"><?php echo $row_rsGetXPtotalOverlord['SUM(shop_xp)']; ?></span><span class="normal">XP</span>
      <span class="header">Overlord <?php echo $row_rsGroupCampaign['ggrp_playerOL']; ?></span></td>
    </tr>
  <tr>
    <td align="center" valign="top" class="normal">Trained Skills      
      
      <table border="0" cellpadding="0" cellspacing="4" class="goldSQTable">
        <?php do { ?>
          <tr>
            <td align="right" nowrap="nowrap"><span class="normal"><?php echo $row_rsGetSkillsOverlord['spendxp_skill_name']; ?></span></td>
            <td align="right"><span class="normal"><?php echo $row_rsGetSkillsOverlord['shop_xp']; ?></span></td>
            </tr>
          <?php } while ($row_rsGetSkillsOverlord = mysql_fetch_assoc($rsGetSkillsOverlord)); ?>
      </table></td>
    <td align="center" valign="top" class="normal">Items
      
      <table border="0" cellpadding="0" cellspacing="4" class="goldSQTable">
        <?php do { ?>
          <tr>
            <td align="right" class="normal"><?php echo $row_rsGetItemsOverlord['shop_market_bought']; ?></td>
            </tr>
          <?php } while ($row_rsGetItemsOverlord = mysql_fetch_assoc($rsGetItemsOverlord)); ?>
        </table></td>
  </tr>
      </table>

<table width="500" border="0" cellpadding="0" cellspacing="10" class="blackTable" id="tablePlayer1">
    <tr>
      <td width="110" rowspan="2" align="left" class="header"><img src="../images/campaign/heroes/bust/<?php echo $row_rsPortrait1['hero_img']; ?>" width="100" border="0" />
        <br>
        <span class="header"><?php echo $row_rsGroupCampaign['ggrp_char1']; ?></span></td>
      <td colspan="2" align="left" valign="top" class="header">
        <span class="normal"><?php echo $row_rsGetXPremainingPlayer1['SUM(shop_xp)']; ?></span>/<?php echo $row_rsGetXPtotalPlayer1['SUM(shop_xp)']; ?><span class="normal">XP </span> <span class="header"><?php echo $row_rsGroupCampaign['ggrp_mage1']; ?>
        <?php echo $row_rsGroupCampaign['ggrp_player1']; ?></td>
    </tr>
    <tr>
      <td align="center" valign="top" class="normal">Trained Skills
        
        <table border="0" cellpadding="0" cellspacing="4" class="goldSQTable">
          <?php do { ?>
            <tr class="normal">
              <td align="right" nowrap="nowrap"><?php echo $row_rsGetSkillsPlayer1['spendxp_skill_name']; ?></td>
              <td align="right"><?php echo $row_rsGetSkillsPlayer1['shop_xp']; ?></td>
              </tr>
            <?php } while ($row_rsGetSkillsPlayer1 = mysql_fetch_assoc($rsGetSkillsPlayer1)); ?>
          </table></td>
      <td align="center" valign="top" class="normal">Items
        
        <table border="0" cellpadding="0" cellspacing="4" class="goldSQTable">
          <?php do { ?>
            <tr>
              <td align="right" class="normal"><?php echo $row_rsGetItemsPlayer1['shop_market_bought']; ?></td>
              </tr>
            <?php } while ($row_rsGetItemsPlayer1 = mysql_fetch_assoc($rsGetItemsPlayer1)); ?>
          </table></td>
    </tr>
</table>
<table width="500" border="0" cellpadding="0" cellspacing="10" class="blackTable" id="tablePlayer2">
  <tr>
    <td width="110" rowspan="2" align="left" class="header"><img src="../images/campaign/heroes/bust/<?php echo $row_rsPortrait2['hero_img']; ?>" width="100" />   <br>
    <span class="header"><?php echo $row_rsGroupCampaign['ggrp_char2']; ?></span></td>
    <td colspan="2" align="left" valign="top" class="header">
      <span class="normal"><?php echo $row_rsGetXPremainingPlayer2['SUM(shop_xp)']; ?>/</span><span class="header"><?php echo $row_rsGetXPtotalPlayer2['SUM(shop_xp)']; ?></span><span class="normal">XP</span>
      
      <?php echo $row_rsGroupCampaign['ggrp_warrior2']; ?>
      <span class="header"><?php echo $row_rsGroupCampaign['ggrp_player2']; ?></span></td>
  </tr>
  <tr>
    <td align="center" valign="top" class="normal"> Trained Skills
      
      <table cellpadding="1" cellspacing="4" class="goldSQTable">
        <?php do { ?>
          <tr class="normal">
            <td align="right" nowrap="nowrap"><?php echo $row_rsGetSkillsPlayer2['spendxp_skill_name']; ?></td>
            <td align="right"><?php echo $row_rsGetSkillsPlayer2['shop_xp']; ?></td>
            </tr>
          <?php } while ($row_rsGetSkillsPlayer2 = mysql_fetch_assoc($rsGetSkillsPlayer2)); ?>
      </table></td>
    <td align="center" valign="top" class="normal">Items
      
      <table cellpadding="1" cellspacing="4" class="goldSQTable">
        <?php do { ?>
          <tr>
            <td align="right" class="normal"><?php echo $row_rsGetItemsPlayer2['shop_market_bought']; ?></td>
            </tr>
          <?php } while ($row_rsGetItemsPlayer2 = mysql_fetch_assoc($rsGetItemsPlayer2)); ?>
        </table></td>
  </tr>
    </table>

<table width="500" border="0" cellpadding="0" cellspacing="10" class="blackTable" id="tablePlayer3">
  <tr>
    <td width="110" rowspan="2" align="left" class="header"><span class="header"><img src="../images/campaign/heroes/bust/<?php echo $row_rsPortrait3['hero_img']; ?>" width="100" border="0" /></span><br>
    <span class="header"><?php echo $row_rsGroupCampaign['ggrp_char3']; ?></span></td>
    <td colspan="2" align="left" valign="top" class="header">
      <span class="normal"><?php echo $row_rsGetXPremainingPlayer3['SUM(shop_xp)']; ?>/</span><span class="header"><?php echo $row_rsGetXPtotalPlayer3['SUM(shop_xp)']; ?></span><span class="normal">XP </span>
      
      <?php echo $row_rsGroupCampaign['ggrp_scout3']; ?>
      <span class="header"> <?php echo $row_rsGroupCampaign['ggrp_player3']; ?></span><br>
      </td>
  </tr>
  <tr>
    <td align="center" valign="top" class="normal">Trained Skills
      
      <table cellpadding="1" cellspacing="4" class="goldSQTable">
        <?php do { ?>
          <tr class="normal">
            <td align="right" nowrap="nowrap"><?php echo $row_rsGetSkillsPlayer3['spendxp_skill_name']; ?></td>
            <td align="right"><?php echo $row_rsGetSkillsPlayer3['shop_xp']; ?></td>
            </tr>
          <?php } while ($row_rsGetSkillsPlayer3 = mysql_fetch_assoc($rsGetSkillsPlayer3)); ?>
      </table></td>
    <td align="center" valign="top" class="normal">Items
      
      <table cellpadding="1" cellspacing="4" class="goldSQTable">
        <?php do { ?>
          <tr>
            <td align="right" class="normal"><?php echo $row_rsGetItemsPlayer3['shop_market_bought']; ?></td>
            </tr>
          <?php } while ($row_rsGetItemsPlayer3 = mysql_fetch_assoc($rsGetItemsPlayer3)); ?>
        </table></td>
  </tr>
</table>

<table width="500" border="0" cellpadding="0" cellspacing="10" class="blackTable" id="tablePlayer4">
  <tr>
    <td width="110" rowspan="2" align="left" class="header"><span class="header"><img src="../images/campaign/heroes/bust/<?php echo $row_rsPortrait4['hero_img']; ?>" width="100" /></span>
    <br><span class="header"><?php echo $row_rsGroupCampaign['ggrp_char4']; ?></span></td>
    <td colspan="2" align="left" valign="top">
      
      <span class="normal"> <?php echo $row_rsGetXPremainingPlayer4['SUM(shop_xp)']; ?>/</span><span class="header"><?php echo $row_rsGetXPtotalPlayer3['SUM(shop_xp)']; ?></span><span class="normal">XP</span>
      
      
      <span class="header"><?php echo $row_rsGroupCampaign['ggrp_healer4']; ?></span> 
        <span class="header"><?php echo $row_rsGroupCampaign['ggrp_player4']; ?></span></td>
    </tr>
  <tr>
    <td align="center" valign="top">
      <span class="normal">Trained Skills   
      </span>
      
      <table cellpadding="1" cellspacing="4" class="goldSQTable">
        <?php do { ?>
          <tr class="normal">
            <td align="right" nowrap="nowrap"><?php echo $row_rsGetSkillsPlayer4['spendxp_skill_name']; ?></td>
            <td align="right"><?php echo $row_rsGetSkillsPlayer4['shop_xp']; ?></td>
            </tr>
          <?php } while ($row_rsGetSkillsPlayer4 = mysql_fetch_assoc($rsGetSkillsPlayer4)); ?>
    </table></td>
    <td align="center" valign="top"><span class="normal">Items</span>
      
      
      <table cellpadding="1" cellspacing="4" class="goldSQTable">
        <?php do { ?>
          <tr>
            <td align="right" class="normal"><?php echo $row_rsGetItemsPlayer4['shop_market_bought']; ?></td>
            </tr>
          <?php } while ($row_rsGetItemsPlayer4 = mysql_fetch_assoc($rsGetItemsPlayer4)); ?>
        </table></td>
  </tr>
</table>


<table width="100" border="0" cellpadding="0" cellspacing="0" class="goldcoin">


  <tr>
    <td height="100" align="center" valign="middle" class="pageTitleBlack"><?php echo $row_rsSumGoldLoot['goldshop']; ?></td>
  </tr>
</table>
<p class="normal"><a href="dungeondetails.php?urlGamingID=<?php echo $row_rsGroupCampaign['ggrp_id']; ?>" class="pageTitle">+ Add Completed dungeon or Starting Gear </a></p>
      
      <table cellpadding="5" cellspacing="5" class="purpleTable">
        <tr>
          <td colspan="2" align="center"><span class="normal">Date</span></td>
          <td align="center" class="normal">Dungeon</td>
          <td align="center" class="normal">Winner of Dungeon</td>
        </tr>
        <?php do { ?>
          <tr>
            <td colspan="2" align="center" class="header"><span class="header"><?php echo $row_rsLog['date']; ?></span></td>
            <td align="center"><span class="header"><?php echo $row_rsLog['quest_name']; ?></span></td>
            <td align="center"><span class="header"><?php echo $row_rsLog['quest_name_win']; ?></span></td>
          </tr>
          <tr>
            <td align="center" class="header">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center"><a href="mydungeondetail.php?urlGamingID=<?php echo $row_rsGroupCampaign['ggrp_id']; ?>&amp;urlDungeonID=<?php echo $row_rsLog['quest_name']; ?>" class="normal">+ Add Details Here</a></td>
            <td align="center">&nbsp;</td>
          </tr>
          <?php } while ($row_rsLog = mysql_fetch_assoc($rsLog)); ?>
      </table>



<table width="400" border="0" cellspacing="0" cellpadding="15">
        <tr>
          <td align="center" class="header">
            
           <img src="../images/campaign/log/<?php echo $row_rsSelectedLog['cam_log']; ?>" width="450" />
            <br>
            
          </td>
        </tr>
      </table>



<p class="normal"><a href="../campaign.php" target="_self"><img src="../images/buttons/campaign2ndlogo.png" alt="Choose another Campaign" width="300" height="55" border="0" /></a> 
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
?>
