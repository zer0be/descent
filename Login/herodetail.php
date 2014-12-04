<?php require_once('../Connections/dbDescent.php'); ?>
<?php require_once('../Connections/dbDescent.php'); ?>
<?php require_once('../Connections/dbDescent.php'); ?>
<?php require_once('../Connections/dbDescent.php'); ?>
<?php require_once('../Connections/dbDescent.php'); ?>
<?php require_once('../Connections/dbDescent.php'); ?>
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

$colname_rsGetGamingGroup = "-1";
if (isset($_GET['urlGamingID'])) {
  $colname_rsGetGamingGroup = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetGamingGroup = sprintf("SELECT * FROM tbgaminggroup WHERE ggrp_id = %s", GetSQLValueString($colname_rsGetGamingGroup, "int"));
$rsGetGamingGroup = mysql_query($query_rsGetGamingGroup, $dbDescent) or die(mysql_error());
$row_rsGetGamingGroup = mysql_fetch_assoc($rsGetGamingGroup);
$totalRows_rsGetGamingGroup = mysql_num_rows($rsGetGamingGroup);

$playername_rsGetSkills = "-1";
if (isset($_GET['urlHeroID'])) {
  $playername_rsGetSkills = $_GET['urlHeroID'];
}
$gamesession_rsGetSkills = "-1";
if (isset($_GET['urlGamingID'])) {
  $gamesession_rsGetSkills = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetSkills = sprintf("SELECT spendxp_skill_name FROM tbitems_aquired WHERE shop_player = %s AND shop_groupid = %s AND spendxp_skill_name IS NOT NULL", GetSQLValueString($playername_rsGetSkills, "text"),GetSQLValueString($gamesession_rsGetSkills, "int"));
$rsGetSkills = mysql_query($query_rsGetSkills, $dbDescent) or die(mysql_error());
$row_rsGetSkills = mysql_fetch_assoc($rsGetSkills);
$totalRows_rsGetSkills = mysql_num_rows($rsGetSkills);

$gamesession_rsGetGear = "-1";
if (isset($_GET['urlGamingID'])) {
  $gamesession_rsGetGear = $_GET['urlGamingID'];
}
$playername_rsGetGear = "-1";
if (isset($_GET['urlHeroID'])) {
  $playername_rsGetGear = $_GET['urlHeroID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetGear = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = %s AND shop_equipped = 'yes' AND shop_market_bought IS NOT NULL", GetSQLValueString($gamesession_rsGetGear, "int"),GetSQLValueString($playername_rsGetGear, "text"));
$rsGetGear = mysql_query($query_rsGetGear, $dbDescent) or die(mysql_error());
$row_rsGetGear = mysql_fetch_assoc($rsGetGear);
$totalRows_rsGetGear = mysql_num_rows($rsGetGear);

$colname_rsGetHero = "-1";
if (isset($_GET['urlHeroID'])) {
  $colname_rsGetHero = $_GET['urlHeroID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetHero = sprintf("SELECT * FROM tbheroes WHERE hero_name = %s", GetSQLValueString($colname_rsGetHero, "text"));
$rsGetHero = mysql_query($query_rsGetHero, $dbDescent) or die(mysql_error());
$row_rsGetHero = mysql_fetch_assoc($rsGetHero);
$totalRows_rsGetHero = mysql_num_rows($rsGetHero);

//campaign name ID to Name
$_SESSION['campaign_name'] = $row_rsSelectedCampaign['cam_name'];
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
    <td width="800 align=" align="center"" valign="top" class="background"center> <p><a href="../index.html" target="_top"><img src="../images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a></p>
      <p>&nbsp;</p>
      
      <table width="500" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td rowspan="3"><span class="pageTitle"><img src="../images/campaign/heroes/bust/<?php echo $row_rsGetHero['hero_img']; ?>" /></span></td>
          <td><span class="pageTitle"><?php echo $_GET['urlPlayerID']; ?> aka &quot;<?php echo $row_rsGetHero['hero_name']; ?>&quot;</span></td>
        </tr>
        <tr>
          <td><span class="normal"><?php echo $row_rsGetGamingGroup['ggrp_campaign']; ?></span></td>
        </tr>
        <tr>
          <td><span class="normal"><?php echo $row_rsGetGamingGroup['ggrp_name']; ?></span></td>
        </tr>
      </table>
      <br>
      <table width="500" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td align="center">
    <span class="normal">Items Currently You Are Carrying</span>
    <table cellpadding="5" cellspacing="5" class="purpleTable">
        <?php do { ?>
          <tr>
            <td align="center"><span class="normal"><?php echo $row_rsGetGear['shop_market_bought']; ?></span></td>
          </tr>
          <?php } while ($row_rsGetGear = mysql_fetch_assoc($rsGetGear)); ?>
      </table>
      </td>
    <td align="center">
    <span class="normal">Skills Currently Trained
    </span>
<table cellpadding="5" cellspacing="5" class="purpleTable">
  <?php do { ?>
          <tr>
            <td align="center" class="normal"><?php echo $row_rsGetSkills['spendxp_skill_name']; ?></td>
          </tr>
          <?php } while ($row_rsGetSkills = mysql_fetch_assoc($rsGetSkills)); ?>
    </table>
      </td>
  </tr>
</table>

      

<p class="pageTitle"><img src="images/campaign/heroes/<?php echo $row_rsGetHero['hero_card']; ?>" width="400" /></p>
      <p class="pageTitle"><a href="mycampaigndetail.php?urlGamingID=<?php echo $_GET['urlGamingID']; ?>">Return to Campaign</a></p>
      <p class="normal"><a href="../campaign.php" target="_self"><img src="../images/logos/campaign2ndlogo.png" alt="Choose another Campaign" width="300" height="55" border="0" />
        </a>
  <br>
<a href="../index.html">Home</a> | <a href="../firstedition.html" target="_top">1st Ed.</a> | <a href="../secondedition.php" target="_top">2nd Ed.</a> | <a href="../campaign.php">Campaign</a></p>
      
    <p class="footer"><a href="http://sciscoedesigns.com" target="_blank"><em>hosted by sciscoeDesigns</em></a></p></td>
</tr>
</table>




<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($rsGetGamingGroup);

mysql_free_result($rsGetSkills);

mysql_free_result($rsGetGear);

mysql_free_result($rsGetHero);
?>
