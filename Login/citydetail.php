
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
//initialize the session
if (!isset($_SESSION)) {
  session_start();
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "fromXPGOLD")) {
  $insertSQL = sprintf("INSERT INTO tbitems_aquired (shop_id, shop_player, shop_xp, shop_gold, shop_market_bought, shop_relics, shop_latestdungeon, shop_groupid) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['shop_id'], "int"),
                       GetSQLValueString($_POST['shop_player'], "text"),
                       GetSQLValueString($_POST['shop_xp'], "int"),
                       GetSQLValueString($_POST['shop_gold'], "int"),
                       GetSQLValueString($_POST['shop_relicName'], "text"),
                       GetSQLValueString($_POST['shop_relics'], "text"),
                       GetSQLValueString($_POST['shop_latestdungeon'], "text"),
                       GetSQLValueString($_POST['shop_groupid'], "int"));

  mysql_select_db($database_dbDescent, $dbDescent);
  $Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tbitems_aquired (shop_id, shop_player, shop_market_bought, shop_equipped, shop_latestdungeon, shop_groupid) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['shop_id'], "int"),
                       GetSQLValueString($_POST['shop_player'], "text"),
                       GetSQLValueString($_POST['shop_market_bought'], "text"),
                       GetSQLValueString($_POST['shop_equipped'], "text"),
                       GetSQLValueString($_POST['shop_latestdungeon'], "text"),
                       GetSQLValueString($_POST['shop_groupid'], "int"));

  mysql_select_db($database_dbDescent, $dbDescent);
  $Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());
}

$colname_rsGetGroup = "-1";
if (isset($_GET['urlGamingID'])) {
  $colname_rsGetGroup = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetGroup = sprintf("SELECT * FROM tbgaminggroup WHERE ggrp_id = %s", GetSQLValueString($colname_rsGetGroup, "int"));
$rsGetGroup = mysql_query($query_rsGetGroup, $dbDescent) or die(mysql_error());
$row_rsGetGroup = mysql_fetch_assoc($rsGetGroup);
$totalRows_rsGetGroup = mysql_num_rows($rsGetGroup);

$playername_rsCurrentCityDetails = "-1";
if (isset($_GET['urlHeroID'])) {
  $playername_rsCurrentCityDetails = $_GET['urlHeroID'];
}
$groupnumber_rsCurrentCityDetails = "-1";
if (isset($_GET['urlGamingID'])) {
  $groupnumber_rsCurrentCityDetails = $_GET['urlGamingID'];
}
$dungeonname_rsCurrentCityDetails = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsCurrentCityDetails = $_GET['urlDungeonID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsCurrentCityDetails = sprintf("SELECT * FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s AND shop_latestdungeon = %s", GetSQLValueString($playername_rsCurrentCityDetails, "text"),GetSQLValueString($groupnumber_rsCurrentCityDetails, "int"),GetSQLValueString($dungeonname_rsCurrentCityDetails, "text"));
$rsCurrentCityDetails = mysql_query($query_rsCurrentCityDetails, $dbDescent) or die(mysql_error());
$row_rsCurrentCityDetails = mysql_fetch_assoc($rsCurrentCityDetails);
$totalRows_rsCurrentCityDetails = mysql_num_rows($rsCurrentCityDetails);

$colname_rsSkillList = "-1";
if (isset($_GET['urlClassID'])) {
  $colname_rsSkillList = $_GET['urlClassID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsSkillList = sprintf("SELECT skill_name, skill_cost FROM tbskills WHERE skill_class = %s ORDER BY skill_cost DESC", GetSQLValueString($colname_rsSkillList, "text"));
$rsSkillList = mysql_query($query_rsSkillList, $dbDescent) or die(mysql_error());
$row_rsSkillList = mysql_fetch_assoc($rsSkillList);
$totalRows_rsSkillList = mysql_num_rows($rsSkillList);

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsMarketList = "SELECT market_item_name FROM tbitems WHERE shop_relic = 'no' AND owner = 'hero' ORDER BY market_item_name ASC";
$rsMarketList = mysql_query($query_rsMarketList, $dbDescent) or die(mysql_error());
$row_rsMarketList = mysql_fetch_assoc($rsMarketList);
$totalRows_rsMarketList = mysql_num_rows($rsMarketList);

$playername_rsGetxpGold = "-1";
if (isset($_GET['urlHeroID'])) {
  $playername_rsGetxpGold = $_GET['urlHeroID'];
}
$groupnumber_rsGetxpGold = "-1";
if (isset($_GET['urlGamingID'])) {
  $groupnumber_rsGetxpGold = $_GET['urlGamingID'];
}
$dungeonname_rsGetxpGold = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsGetxpGold = $_GET['urlDungeonID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetxpGold = sprintf("SELECT shop_xp, shop_gold FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s AND shop_latestdungeon = %s AND (shop_xp != 0 OR shop_gold != 0)", GetSQLValueString($playername_rsGetxpGold, "text"),GetSQLValueString($groupnumber_rsGetxpGold, "int"),GetSQLValueString($dungeonname_rsGetxpGold, "text"));
$rsGetxpGold = mysql_query($query_rsGetxpGold, $dbDescent) or die(mysql_error());
$row_rsGetxpGold = mysql_fetch_assoc($rsGetxpGold);
$totalRows_rsGetxpGold = mysql_num_rows($rsGetxpGold);

$playername_rsFoundRelics = "-1";
if (isset($_GET['urlHeroID'])) {
  $playername_rsFoundRelics = $_GET['urlHeroID'];
}
$groupnumber_rsFoundRelics = "-1";
if (isset($_GET['urlGamingID'])) {
  $groupnumber_rsFoundRelics = $_GET['urlGamingID'];
}
$dungeonname_rsFoundRelics = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsFoundRelics = $_GET['urlDungeonID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsFoundRelics = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s AND shop_latestdungeon = %s AND shop_relics = 'yes'", GetSQLValueString($playername_rsFoundRelics, "text"),GetSQLValueString($groupnumber_rsFoundRelics, "int"),GetSQLValueString($dungeonname_rsFoundRelics, "text"));
$rsFoundRelics = mysql_query($query_rsFoundRelics, $dbDescent) or die(mysql_error());
$row_rsFoundRelics = mysql_fetch_assoc($rsFoundRelics);
$totalRows_rsFoundRelics = mysql_num_rows($rsFoundRelics);

$playername_rsShopMarket = "-1";
if (isset($_GET['urlHeroID'])) {
  $playername_rsShopMarket = $_GET['urlHeroID'];
}
$groupnumber_rsShopMarket = "-1";
if (isset($_GET['urlGamingID'])) {
  $groupnumber_rsShopMarket = $_GET['urlGamingID'];
}
$dungeonname_rsShopMarket = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsShopMarket = $_GET['urlDungeonID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsShopMarket = sprintf("SELECT shop_market_bought, shop_gold FROM tbitems_aquired WHERE shop_gold < 0 AND shop_equipped = 'yes' AND shop_relics IS NULL AND shop_player = %s AND shop_groupid = %s AND shop_latestdungeon = %s AND shop_market_bought IS NOT NULL", GetSQLValueString($playername_rsShopMarket, "text"),GetSQLValueString($groupnumber_rsShopMarket, "int"),GetSQLValueString($dungeonname_rsShopMarket, "text"));
$rsShopMarket = mysql_query($query_rsShopMarket, $dbDescent) or die(mysql_error());
$row_rsShopMarket = mysql_fetch_assoc($rsShopMarket);
$totalRows_rsShopMarket = mysql_num_rows($rsShopMarket);

$dungeonname_rsLearnSkill = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsLearnSkill = $_GET['urlDungeonID'];
}
$groupnumber_rsLearnSkill = "-1";
if (isset($_GET['urlGamingID'])) {
  $groupnumber_rsLearnSkill = $_GET['urlGamingID'];
}
$playername_rsLearnSkill = "-1";
if (isset($_GET['urlHeroID'])) {
  $playername_rsLearnSkill = $_GET['urlHeroID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsLearnSkill = sprintf("SELECT shop_skills FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s AND shop_latestdungeon = %s AND shop_skills IS NOT NULL", GetSQLValueString($playername_rsLearnSkill, "text"),GetSQLValueString($groupnumber_rsLearnSkill, "int"),GetSQLValueString($dungeonname_rsLearnSkill, "text"));
$rsLearnSkill = mysql_query($query_rsLearnSkill, $dbDescent) or die(mysql_error());
$row_rsLearnSkill = mysql_fetch_assoc($rsLearnSkill);
$totalRows_rsLearnSkill = mysql_num_rows($rsLearnSkill);

$groupnumber_rsSolditems = "-1";
if (isset($_GET['urlGamingID'])) {
  $groupnumber_rsSolditems = $_GET['urlGamingID'];
}
$dungeonname_rsSolditems = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsSolditems = $_GET['urlDungeonID'];
}
$playername_rsSolditems = "-1";
if (isset($_GET['urlHeroID'])) {
  $playername_rsSolditems = $_GET['urlHeroID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsSolditems = sprintf("SELECT shop_market_sold, shop_goldsold FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s AND shop_latestdungeon = %s AND shop_market_sold IS NOT NULL", GetSQLValueString($playername_rsSolditems, "text"),GetSQLValueString($groupnumber_rsSolditems, "int"),GetSQLValueString($dungeonname_rsSolditems, "text"));
$rsSolditems = mysql_query($query_rsSolditems, $dbDescent) or die(mysql_error());
$row_rsSolditems = mysql_fetch_assoc($rsSolditems);
$totalRows_rsSolditems = mysql_num_rows($rsSolditems);

$colname_rsSellableItems = "-1";
if (isset($_GET['urlGamingID'])) {
  $colname_rsSellableItems = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsSellableItems = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_groupid = %s AND shop_market_bought IS NOT NULL ORDER BY shop_market_bought ASC", GetSQLValueString($colname_rsSellableItems, "int"));
$rsSellableItems = mysql_query($query_rsSellableItems, $dbDescent) or die(mysql_error());
$row_rsSellableItems = mysql_fetch_assoc($rsSellableItems);
$totalRows_rsSellableItems = mysql_num_rows($rsSellableItems);

$colname_rsGetHero = "-1";
if (isset($_GET['urlHeroID'])) {
  $colname_rsGetHero = $_GET['urlHeroID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetHero = sprintf("SELECT * FROM tbheroes WHERE hero_name = %s", GetSQLValueString($colname_rsGetHero, "text"));
$rsGetHero = mysql_query($query_rsGetHero, $dbDescent) or die(mysql_error());
$row_rsGetHero = mysql_fetch_assoc($rsGetHero);
$totalRows_rsGetHero = mysql_num_rows($rsGetHero);

$colname_rsPlayerAccess = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsPlayerAccess = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPlayerAccess = sprintf("SELECT player_handle FROM tbplayerlist WHERE player_handle = %s", GetSQLValueString($colname_rsPlayerAccess, "text"));
$rsPlayerAccess = mysql_query($query_rsPlayerAccess, $dbDescent) or die(mysql_error());
$row_rsPlayerAccess = mysql_fetch_assoc($rsPlayerAccess);
$totalRows_rsPlayerAccess = mysql_num_rows($rsPlayerAccess);

$colname_rsItems2sell = "-1";
if (isset($_GET['urlHeroID'])) {
  $colname_rsItems2sell = $_GET['urlHeroID'];
}
$currentgroup_rsItems2sell = "-1";
if (isset($_GET['urlGamingID'])) {
  $currentgroup_rsItems2sell = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsItems2sell = sprintf("SELECT shop_market_bought, shop_id FROM tbitems_aquired WHERE shop_player = %s AND shop_equipped = 'yes' AND shop_groupid = %s AND shop_market_bought IS NOT NULL AND shop_relics IS NULL ORDER BY shop_market_bought ASC", GetSQLValueString($colname_rsItems2sell, "text"),GetSQLValueString($currentgroup_rsItems2sell, "int"));
$rsItems2sell = mysql_query($query_rsItems2sell, $dbDescent) or die(mysql_error());
$row_rsItems2sell = mysql_fetch_assoc($rsItems2sell);
$totalRows_rsItems2sell = mysql_num_rows($rsItems2sell);

$colname_rsGetXPtotal = "-1";
if (isset($_GET['urlHeroID'])) {
  $colname_rsGetXPtotal = $_GET['urlHeroID'];
}
$dungeongroup_rsGetXPtotal = "-1";
if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsGetXPtotal = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetXPtotal = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s AND shop_xp > 0", GetSQLValueString($colname_rsGetXPtotal, "text"),GetSQLValueString($dungeongroup_rsGetXPtotal, "int"));
$rsGetXPtotal = mysql_query($query_rsGetXPtotal, $dbDescent) or die(mysql_error());
$row_rsGetXPtotal = mysql_fetch_assoc($rsGetXPtotal);
$totalRows_rsGetXPtotal = mysql_num_rows($rsGetXPtotal);

$colname_rsGetXPremaining = "-1";
if (isset($_GET['urlHeroID'])) {
  $colname_rsGetXPremaining = $_GET['urlHeroID'];
}
$dungeongroup_rsGetXPremaining = "-1";
if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsGetXPremaining = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetXPremaining = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s", GetSQLValueString($colname_rsGetXPremaining, "text"),GetSQLValueString($dungeongroup_rsGetXPremaining, "int"));
$rsGetXPremaining = mysql_query($query_rsGetXPremaining, $dbDescent) or die(mysql_error());
$row_rsGetXPremaining = mysql_fetch_assoc($rsGetXPremaining);
$totalRows_rsGetXPremaining = mysql_num_rows($rsGetXPremaining);

$colname_rsGetSkillsLearned = "-1";
if (isset($_GET['urlHeroID'])) {
  $colname_rsGetSkillsLearned = $_GET['urlHeroID'];
}
$dungeongroup_rsGetSkillsLearned = "-1";
if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsGetSkillsLearned = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetSkillsLearned = sprintf("SELECT shop_skills FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s AND shop_skills IS NOT NULL", GetSQLValueString($colname_rsGetSkillsLearned, "text"),GetSQLValueString($dungeongroup_rsGetSkillsLearned, "int"));
$rsGetSkillsLearned = mysql_query($query_rsGetSkillsLearned, $dbDescent) or die(mysql_error());
$row_rsGetSkillsLearned = mysql_fetch_assoc($rsGetSkillsLearned);
$totalRows_rsGetSkillsLearned = mysql_num_rows($rsGetSkillsLearned);

$colname_rsGetItemsEquipped = "-1";
if (isset($_GET['urlHeroID'])) {
  $colname_rsGetItemsEquipped = $_GET['urlHeroID'];
}
$dungeongroup_rsGetItemsEquipped = "-1";
if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsGetItemsEquipped = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetItemsEquipped = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s AND shop_equipped != 'no' AND shop_market_bought IS NOT NULL", GetSQLValueString($colname_rsGetItemsEquipped, "text"),GetSQLValueString($dungeongroup_rsGetItemsEquipped, "int"));
$rsGetItemsEquipped = mysql_query($query_rsGetItemsEquipped, $dbDescent) or die(mysql_error());
$row_rsGetItemsEquipped = mysql_fetch_assoc($rsGetItemsEquipped);
$totalRows_rsGetItemsEquipped = mysql_num_rows($rsGetItemsEquipped);

$dungeongroup_rsGetGroupGold = "-1";
if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsGetGroupGold = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetGroupGold = sprintf("SELECT SUM(shop_gold + shop_goldsold) AS groupgold FROM tbitems_aquired WHERE shop_groupid = %s", GetSQLValueString($dungeongroup_rsGetGroupGold, "int"));
$rsGetGroupGold = mysql_query($query_rsGetGroupGold, $dbDescent) or die(mysql_error());
$row_rsGetGroupGold = mysql_fetch_assoc($rsGetGroupGold);
$totalRows_rsGetGroupGold = mysql_num_rows($rsGetGroupGold);

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsMarketRelicList = "SELECT market_item_name FROM tbitems WHERE owner = 'hero' AND shop_relic = 'yes' AND market_item_name IS NOT NULL";
$rsMarketRelicList = mysql_query($query_rsMarketRelicList, $dbDescent) or die(mysql_error());
$row_rsMarketRelicList = mysql_fetch_assoc($rsMarketRelicList);
$totalRows_rsMarketRelicList = mysql_num_rows($rsMarketRelicList);

$heroclass_rsMarketClassList = "-1";
if (isset($_GET['urlClassID'])) {
  $heroclass_rsMarketClassList = $_GET['urlClassID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsMarketClassList = sprintf("SELECT market_item_name FROM tbitems WHERE shop_relic = 'no' AND owner = %s ORDER BY market_item_name ASC", GetSQLValueString($heroclass_rsMarketClassList, "text"));
$rsMarketClassList = mysql_query($query_rsMarketClassList, $dbDescent) or die(mysql_error());
$row_rsMarketClassList = mysql_fetch_assoc($rsMarketClassList);
$totalRows_rsMarketClassList = mysql_num_rows($rsMarketClassList);

$playername_rsFoundItem = "-1";
if (isset($_GET['urlHeroID'])) {
  $playername_rsFoundItem = $_GET['urlHeroID'];
}
$groupnumber_rsFoundItem = "-1";
if (isset($_GET['urlGamingID'])) {
  $groupnumber_rsFoundItem = $_GET['urlGamingID'];
}
$dungeonname_rsFoundItem = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsFoundItem = $_GET['urlDungeonID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsFoundItem = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_gold = 0 AND shop_equipped = 'yes' AND shop_relics IS NULL AND shop_player = %s AND shop_groupid = %s AND shop_latestdungeon = %s AND shop_market_bought IS NOT NULL", GetSQLValueString($playername_rsFoundItem, "text"),GetSQLValueString($groupnumber_rsFoundItem, "int"),GetSQLValueString($dungeonname_rsFoundItem, "text"));
$rsFoundItem = mysql_query($query_rsFoundItem, $dbDescent) or die(mysql_error());
$row_rsFoundItem = mysql_fetch_assoc($rsFoundItem);
$totalRows_rsFoundItem = mysql_num_rows($rsFoundItem);

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
$queryString_rsSelectGroup = sprintf("&totalRows_rsSelectGroup=%d%s", $totalRows_rsSelectGroup, $queryString_rsSelectGroup);
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

  
<title>Descent Mobile Campaign Tracker</title>

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
<script src="../SpryAssets/SpryAccordion.js" type="text/javascript"></script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<table width="425" border="1" align="center" cellpadding="0" cellspacing="0" class="background">
  <tr>
    <td width="800 align=" align="center"" valign="top"center> <p><a href="../index.html" target="_top"><img src="../images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>
       
       <table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="normal"><a href="login.php"><span class="normal"> Login</span></a>, <a href="mycampaigns.php"><?php echo $row_rsPlayerAccess['player_handle']; ?> My Campaigns</a></td>
    <td align="right" class="normal"><a href="<?php echo $logoutAction ?>">Log out</a></td>
  </tr>
</table>

       
      
      <table width="300" border="0" cellpadding="0" cellspacing="10" class="blackTable">
        <tr>
          <td rowspan="2" align="center" valign="top"><span class="normal"><img src="../images/campaign/heroes/bust/<?php echo $row_rsGetHero['hero_img']; ?>" width="100" /></span><br>
              <span class="header"><?php echo $_GET['urlClassID']; ?><BR>
          </span></td>
          <td colspan="3" align="center" bgcolor="#9900CC"><span class="header"><?php echo $row_rsCurrentCityDetails['shop_player']; ?></span> <span class="normal"> <?php echo $row_rsGetXPremaining['SUM(shop_xp)']; ?></span><span class="header">/<?php echo $row_rsGetXPtotal['SUM(shop_xp)']; ?></span><span class="normal">XP</span>          </td>
        </tr>
        <tr>
          <td><span class="header"><span class="normal">Group Gold:</span><?php echo $row_rsGetGroupGold['groupgold']; ?></span></td>
          <td align="center" valign="top" nowrap="nowrap">
          <table cellpadding="0" cellspacing="0">
              <tr>
                <td align="center"><span class="header">Current Skills</span></td>
              </tr>
              <?php do { ?>
                <tr>
                  <td align="center" nowrap="nowrap"><span class="normal"><?php echo $row_rsGetSkillsLearned['shop_skills']; ?></span></td>
                </tr>
                <?php } while ($row_rsGetSkillsLearned = mysql_fetch_assoc($rsGetSkillsLearned)); ?>
          </table>
          </td>
          <td valign="top" nowrap="nowrap">
          <table cellpadding="0" cellspacing="0">
              <tr>
                <td align="center"><span class="header">Items Being Carried</span></td>
              </tr>
              <?php do { ?>
                <tr>
                  <td align="center" nowrap="nowrap"><span class="normal"><?php echo $row_rsGetItemsEquipped['shop_market_bought']; ?></span></td>
                </tr>
                <?php } while ($row_rsGetItemsEquipped = mysql_fetch_assoc($rsGetItemsEquipped)); ?>
          </table></td>
        </tr>
      </table>
      
        
      
      
      
      <p class="pageTitle"><?php echo $row_rsCurrentCityDetails['shop_latestdungeon']; ?>
      </p>
      <table width="400" border="0" cellpadding="5" cellspacing="0" class="goldTable">
        <tr>
          <td><table cellpadding="5" cellspacing="5" class="purpleTable">
  <?php do { ?>
    <tr>
      <td align="center" nowrap="nowrap" class="normal">XP: <?php echo $row_rsGetxpGold['shop_xp']; ?></td>
      <td align="center" nowrap="nowrap" class="normal">Gold: <?php echo $row_rsGetxpGold['shop_gold']; ?></td>
    </tr>
    <?php } while ($row_rsGetxpGold = mysql_fetch_assoc($rsGetxpGold)); ?>
</table>
<br>
<span class="normal">Relics Retrieved from <?php echo $row_rsCurrentCityDetails['shop_latestdungeon']; ?></span>
          <table cellpadding="5" cellspacing="5" class="purpleTable">
            <?php do { ?>
              <tr>
                <td align="center" class="normal"><?php echo $row_rsFoundRelics['shop_market_bought']; ?></td>
              </tr>
              <?php } while ($row_rsFoundRelics = mysql_fetch_assoc($rsFoundRelics)); ?>
</table>
</td>
          <td><form action="<?php echo $editFormAction; ?>" method="post" name="fromXPGOLD" id="fromXPGOLD">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td class="normal">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="normal">XP:</td>
      <td class="normal">
        <input type="text" name="shop_xp" value="" size="5" />
      </td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="normal">Gold Looted:</td>
      <td class="normal">
        <input type="text" name="shop_gold" value="0" size="5" />
        </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td class="normal">
        <select name="shop_relicName" id="shop_relicName">
          <option value="" >Looted Relic</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsMarketRelicList['market_item_name']?>"><?php echo $row_rsMarketRelicList['market_item_name']?></option>
          <?php
} while ($row_rsMarketRelicList = mysql_fetch_assoc($rsMarketRelicList));
  $rows = mysql_num_rows($rsMarketRelicList);
  if($rows > 0) {
      mysql_data_seek($rsMarketRelicList, 0);
	  $row_rsMarketRelicList = mysql_fetch_assoc($rsMarketRelicList);
  }
?>
          </select>
        </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td class="normal">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td class="normal">
        <input type="submit" value="Insert record" />
      </td>
    </tr>
  </table>
  <span class="normal">
  <input type="hidden" name="shop_id" value="" size="32" />
  <input type="hidden" name="shop_relics" value="yes" size="32" />
  </span>
  <input type="hidden" name="shop_player" value="<?php echo $_GET['urlHeroID']; ?>" />
  <input type="hidden" name="shop_latestdungeon" value="<?php echo $_GET['urlDungeonID']; ?>" />
  <input type="hidden" name="shop_groupid" value="<?php echo $_GET['urlGamingID']; ?>" />
  <input type="hidden" name="MM_insert" value="fromXPGOLD" />
</form></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table width="400" border="0" cellpadding="5" cellspacing="0" class="redTable">
        <tr>
          <td>     <span class="normal">Trained Skills</span>
<table cellpadding="5" cellspacing="5" class="purpleTable">
  <?php do { ?>
    <tr>
      <td align="center" class="normal"><?php echo $row_rsLearnSkill['shop_skills']; ?></td>
    </tr>
    <?php } while ($row_rsLearnSkill = mysql_fetch_assoc($rsLearnSkill)); ?>
</table>
</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table width="400" border="0" cellpadding="5" cellspacing="0" class="blackTable">
        <tr>
          <td align="center" class="normal">Found in <?php echo $row_rsCurrentCityDetails['shop_latestdungeon']; ?>
          <br>
          <table cellpadding="0" cellspacing="5" class="purpleTable">
            <?php do { ?>
              <tr>
                <td align="center"><span class="normal"><?php echo $row_rsFoundItem['shop_market_bought']; ?></span></td>
              </tr>
              <?php } while ($row_rsFoundItem = mysql_fetch_assoc($rsFoundItem)); ?>
          </table></td>
          <td>&nbsp;
            <form action="<?php echo $editFormAction; ?>" method="post" name="formLootItem" id="formLootItem">
              <table align="center">
                <tr valign="baseline">
                  <td align="right" nowrap="nowrap" class="normal">Found Item:</td>
                  <td><select name="shop_market_bought">
                    <option value="" >Search Loot</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_rsMarketList['market_item_name']?>"><?php echo $row_rsMarketList['market_item_name']?></option>
                    <?php
} while ($row_rsMarketList = mysql_fetch_assoc($rsMarketList));
  $rows = mysql_num_rows($rsMarketList);
  if($rows > 0) {
      mysql_data_seek($rsMarketList, 0);
	  $row_rsMarketList = mysql_fetch_assoc($rsMarketList);
  }
?>
                  </select></td>
                </tr>
                <tr valign="baseline">
                  <td colspan="2" align="center" nowrap="nowrap"><input type="submit" value="Insert Looted Item" /></td>
                </tr>
              </table>
              <input type="hidden" name="shop_id" value="" />
              <input type="hidden" name="shop_player" value="<?php echo $_GET['urlHeroID']; ?>" />
              <input type="hidden" name="shop_equipped" value="yes" />
              <input type="hidden" name="shop_latestdungeon" value="<?php echo $_GET['urlDungeonID']; ?>" />
              <input type="hidden" name="shop_groupid" value="<?php echo $_GET['urlGamingID']; ?>" />
              <input type="hidden" name="MM_insert" value="form1" />
            </form>
          <p>&nbsp;</p></td>
        </tr>
      </table>
      <table width="400" border="0" cellpadding="5" cellspacing="0" class="blackTable">
        <tr>
          <td align="center"><span class="normal">Bought from Market</span>
          <table cellpadding="5" cellspacing="5" class="purpleTable">
  <?php do { ?>
    <tr>
      <td align="center" class="normal"><?php echo $row_rsShopMarket['shop_market_bought']; ?></td>
      <td align="center" class="normal"><?php echo $row_rsShopMarket['shop_gold']; ?></td>
    </tr>
    <?php } while ($row_rsShopMarket = mysql_fetch_assoc($rsShopMarket)); ?>
</table></td>
          <td> <span class="normal"><br>
Sold to City Merchant
          </span>
          <table cellpadding="5" cellspacing="5" class="purpleTable">
  <?php do { ?>
    <tr>
      <td align="center" class="normal"><?php echo $row_rsSolditems['shop_market_sold']; ?></td>
      <td align="center" class="normal"><?php echo $row_rsSolditems['shop_goldsold']; ?></td>
    </tr>
    <?php } while ($row_rsSolditems = mysql_fetch_assoc($rsSolditems)); ?>
</table>
</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p class="header">&nbsp;</p>
<div id="AccordionMarket" class="Accordion" tabindex="0">
  <div class="AccordionPanel">
    <div class="AccordionPanelTab">Buy a Item from Market</div>
    <div class="AccordionPanelContent">
      <table cellpadding="5" cellspacing="5" class="purpleTable">
        <?php do { ?>
        <tr class="normal">
          <td><strong><a href="buyitem.php?urlItemID=<?php echo $row_rsMarketList['market_item_name']; ?>&amp;urlGamingID=<?php echo $_GET['urlGamingID']; ?>&amp;urlHeroID=<?php echo $_GET['urlHeroID']; ?>&amp;urlDungeonID=<?php echo $_GET['urlDungeonID']; ?>" class="headerTable">$ buy</a></strong></td>
          <td class="headerTable"><?php echo $row_rsMarketList['market_item_name']; ?></td>
        </tr>
        <?php } while ($row_rsMarketList = mysql_fetch_assoc($rsMarketList)); ?>
      </table>
    </div>
  </div>
<div class="AccordionPanel">
  <div class="AccordionPanelTab">Sell a Item</div>
    <div class="AccordionPanelContent">
      <table cellpadding="5" cellspacing="5" class="purpleTable">
        <?php do { ?>
        <tr class="headerTable">
          <td align="center" class="header"><strong><a href="sellitem.php?urlDungeonID=<?php echo $_GET['urlDungeonID']; ?>&amp;urlGamingID=<?php echo $_GET['urlGamingID']; ?>&amp;urlHeroID=<?php echo $_GET['urlHeroID']; ?>&amp;urlItemID=<?php echo $row_rsItems2sell['shop_id']; ?>" class="headerTable">$ sell</a></strong></td>
          <td align="center"><span class="headerTable"><?php echo $row_rsItems2sell['shop_market_bought']; ?></span></td>
        </tr>
        <?php } while ($row_rsItems2sell = mysql_fetch_assoc($rsItems2sell)); ?>
      </table>
    </div>
</div>
<div class="AccordionPanel">
  <div class="AccordionPanelTab">Learn Skills</div>
    <div class="AccordionPanelContent">
      <table cellpadding="5" cellspacing="5" class="purpleTable">
        <tr>
          <td>&nbsp;</td>
          <td><?php echo $_GET['urlClassID']; ?> Skill</td>
          <td>Xp Cost</td>
        </tr>
        <?php do { ?>
        <tr class="headerTable">
          <td><strong><a href="buySkill.php?urlGamingID=<?php echo $_GET['urlGamingID']; ?>&amp;urlClassID=<?php echo $_GET['urlClassID']; ?>&amp;urlHeroID=<?php echo $_GET['urlHeroID']; ?>&amp;urlSkillID=<?php echo $row_rsSkillList['skill_name']; ?>&amp;urlDungeonID=<?php echo $row_rsCurrentCityDetails['shop_latestdungeon']; ?>">learn</a></strong></td>
          <td><?php echo $row_rsSkillList['skill_name']; ?></td>
          <td><?php echo $row_rsSkillList['skill_cost']; ?></td>
        </tr>
        <?php } while ($row_rsSkillList = mysql_fetch_assoc($rsSkillList)); ?>
      </table>
    </div>
</div>
  <div class="AccordionPanel">
    <div class="AccordionPanelTab">Starting Equipment</div>
    <div class="AccordionPanelContent">
      
      <table cellpadding="5" cellspacing="5" class="purpleTable">
        <tr>
          <td colspan="2" align="center">&nbsp;</td>
          </tr>
        <?php do { ?>
          <tr class="headerTable">
            <td><a href="buyitem.php?urlItemID=<?php echo $row_rsMarketClassList['market_item_name']; ?>&amp;urlGamingID=<?php echo $_GET['urlGamingID']; ?>&amp;urlHeroID=<?php echo $_GET['urlHeroID']; ?>&amp;urlDungeonID=<?php echo $_GET['urlDungeonID']; ?>">equip</a></td>
            <td><?php echo $row_rsMarketClassList['market_item_name']; ?></td>
          </tr>
          <?php } while ($row_rsMarketClassList = mysql_fetch_assoc($rsMarketClassList)); ?>
    </table>
    </div>
  </div>
</div>


<p><a href="mydungeondetail.php?urlGamingID=<?php echo $_GET['urlGamingID']; ?>&amp;urlDungeonID=<?php echo $_GET['urlDungeonID']; ?>" class="header">Return to Dungeon Details</a></p>
      <p class="normal"><a href="../index.html" target="_top">Home</a> | <a href="../firstedition.html" target="_top">1st Ed.</a> | <a href="../secondedition.php" target="_top">2nd Ed.</a> | <a href="../campaign.php">Campaign</a></p>
      
      <p class="footer"><a href="http://sciscoedesigns.com" target="_blank"><em>hosted by sciscoeDesigns</em></a></p></td>
</tr>
</table>




<p>&nbsp;</p>
<script type="text/javascript">
var Accordion1 = new Spry.Widget.Accordion("AccordionMarket",{enableAnimation: false, useFixedPanelHeights: false, defaultPanel: -1 });
</script>
</body>
</html>
<?php
mysql_free_result($rsGetGroup);

mysql_free_result($rsGetItemsEquipped);

mysql_free_result($rsGetGroupGold);

mysql_free_result($rsMarketRelicList);

mysql_free_result($rsMarketClassList);

mysql_free_result($rsFoundItem);

mysql_free_result($rsGetGroup);

mysql_free_result($rsCurrentCityDetails);

mysql_free_result($rsSkillList);

mysql_free_result($rsMarketList);

mysql_free_result($rsGetxpGold);

mysql_free_result($rsFoundRelics);

mysql_free_result($rsShopMarket);

mysql_free_result($rsLearnSkill);

mysql_free_result($rsSolditems);

mysql_free_result($rsSellableItems);

mysql_free_result($rsGetHero);

mysql_free_result($rsPlayerAccess);

mysql_free_result($rsItems2sell);

mysql_free_result($rsGetXPtotal);

mysql_free_result($rsGetXPremaining);

mysql_free_result($rsGetSkillsLearned);
?>
