
<?php require_once('Connections/dbDescent.php'); ?>
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

$maxRows_rsSelectedCampaign = 20;
$pageNum_rsSelectedCampaign = 0;
if (isset($_GET['pageNum_rsSelectedCampaign'])) {
  $pageNum_rsSelectedCampaign = $_GET['pageNum_rsSelectedCampaign'];
}
$startRow_rsSelectedCampaign = $pageNum_rsSelectedCampaign * $maxRows_rsSelectedCampaign;

$colname_rsSelectedCampaign = "-1";
if (isset($_GET['urlCamID'])) {
  $colname_rsSelectedCampaign = $_GET['urlCamID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsSelectedCampaign = sprintf("SELECT * FROM tbcampaign WHERE cam_id = %s", GetSQLValueString($colname_rsSelectedCampaign, "int"));
$query_limit_rsSelectedCampaign = sprintf("%s LIMIT %d, %d", $query_rsSelectedCampaign, $startRow_rsSelectedCampaign, $maxRows_rsSelectedCampaign);
$rsSelectedCampaign = mysql_query($query_limit_rsSelectedCampaign, $dbDescent) or die(mysql_error());
$row_rsSelectedCampaign = mysql_fetch_assoc($rsSelectedCampaign);

if (isset($_GET['totalRows_rsSelectedCampaign'])) {
  $totalRows_rsSelectedCampaign = $_GET['totalRows_rsSelectedCampaign'];
} else {
  $all_rsSelectedCampaign = mysql_query($query_rsSelectedCampaign);
  $totalRows_rsSelectedCampaign = mysql_num_rows($all_rsSelectedCampaign);
}
$totalPages_rsSelectedCampaign = ceil($totalRows_rsSelectedCampaign/$maxRows_rsSelectedCampaign)-1;

//campaign name ID to Name
$_SESSION['campaign_name'] = $row_rsSelectedCampaign['cam_name'];


$maxRows_rsSelectGamingGroup = 15;
$pageNum_rsSelectGamingGroup = 0;
if (isset($_GET['pageNum_rsSelectGamingGroup'])) {
  $pageNum_rsSelectGamingGroup = $_GET['pageNum_rsSelectGamingGroup'];
}
$startRow_rsSelectGamingGroup = $pageNum_rsSelectGamingGroup * $maxRows_rsSelectGamingGroup;

$colname_rsSelectGamingGroup = "-1";
if (isset($_SESSION['campaign_name'])) {
  $colname_rsSelectGamingGroup = $_SESSION['campaign_name'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsSelectGamingGroup = sprintf("SELECT ggrp_name, DATE_FORMAT(ggrp_timestamp, '%%d %%b %%Y') AS date, ggrp_id FROM tbgaminggroup WHERE ggrp_campaign = %s ORDER BY ggrp_timestamp DESC", GetSQLValueString($colname_rsSelectGamingGroup, "text"));
$query_limit_rsSelectGamingGroup = sprintf("%s LIMIT %d, %d", $query_rsSelectGamingGroup, $startRow_rsSelectGamingGroup, $maxRows_rsSelectGamingGroup);
$rsSelectGamingGroup = mysql_query($query_limit_rsSelectGamingGroup, $dbDescent) or die(mysql_error());
$row_rsSelectGamingGroup = mysql_fetch_assoc($rsSelectGamingGroup);

if (isset($_GET['totalRows_rsSelectGamingGroup'])) {
  $totalRows_rsSelectGamingGroup = $_GET['totalRows_rsSelectGamingGroup'];
} else {
  $all_rsSelectGamingGroup = mysql_query($query_rsSelectGamingGroup);
  $totalRows_rsSelectGamingGroup = mysql_num_rows($all_rsSelectGamingGroup);
}
$totalPages_rsSelectGamingGroup = ceil($totalRows_rsSelectGamingGroup/$maxRows_rsSelectGamingGroup)-1;
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
<link rel="shortcut icon" href=".\favicon.ico" >
<link rel="shortcut icon" href="descentIcon.gif" type="image/gif" />
<link rel="icon" href="descentIcon.gif" type="image/gif" /> 
<link rel="apple-touch-icon" href="apple-touch-icon.png"/>
<!--End Short cut Icon-->
  
<title>Descent Mobile Quick Guides</title>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript">

</script>
<script src="SpryAssets/SpryTooltip.js" type="text/javascript"></script>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
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
	background-image: url(images/wallpaper.jpg);
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

<link href="SpryAssets/SpryTooltip.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<table width="625" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800 align=" align="center"" valign="top" class="background"center> <p><a href="index.html" target="_top"><img src="images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a></p>
      
<table width="600" border="0" cellspacing="0" cellpadding="15">
        <tr>
          <td align="center">
              
           <img src="images/campaign/maps/<?php echo $row_rsSelectedCampaign['cam_map']; ?>" width="600" />
            <p><span class="normal">
		  <img src="images/logos/<?php echo $row_rsSelectedCampaign['cam_logo']; ?>" />
		  <br><?php echo $row_rsSelectedCampaign['expansion']; ?></span><br>
          </td>
        </tr>
      </table>

<table cellpadding="0" cellspacing="5">
  <tr>
    <td align="center"><span class="normal">Group Name</span></td>
    <td align="center" class="normal">Game Started</td>
  </tr>
  <?php do { ?>
    <tr class="header">
      <td align="center"><span class="normal"><a href="campaigndetail.php?urlGamingID=<?php echo $row_rsSelectGamingGroup['ggrp_id']; ?>"><?php echo $row_rsSelectGamingGroup['ggrp_name']; ?></a></span></td>
      <td align="center"><span class="normal"><?php echo $row_rsSelectGamingGroup['date']; ?></span></td>
    </tr>
    <?php } while ($row_rsSelectGamingGroup = mysql_fetch_assoc($rsSelectGamingGroup)); ?>
</table>
<p class="normal"><a href="campaign.php" target="_self"><img src="images/logos/campaign2ndlogo.png" alt="Choose another Campaign" width="300" height="55" border="0" />
        </a>
  <br>
<a href="index.html">Home</a> | <a href="firstedition.html" target="_top">1st Ed.</a> | <a href="secondedition.php" target="_top">2nd Ed.</a> | <a href="campaign.php">Campaign</a></p>
      
    <p class="footer"><a href="http://sciscoedesigns.com" target="_blank"><em>hosted by sciscoeDesigns</em></a></p></td>
</tr>
</table>




<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($rsSelectedCampaign);

mysql_free_result($rsSelectGamingGroup);
?>
