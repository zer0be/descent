<?php require_once('Connections/dbDescent.php'); ?>
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
	
  $logoutGoTo = "campaign.php";
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

$currentPage = $_SERVER["PHP_SELF"];

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsCampaignList = "SELECT cam_id, cam_name, expansion, cam_logo, cam_icon FROM tbCampaign ORDER BY cam_id ASC";
$rsCampaignList = mysql_query($query_rsCampaignList, $dbDescent) or die(mysql_error());
$row_rsCampaignList = mysql_fetch_assoc($rsCampaignList);
$totalRows_rsCampaignList = mysql_num_rows($rsCampaignList);

$maxRows_rsSelectGroup = 10;
$pageNum_rsSelectGroup = 0;
if (isset($_GET['pageNum_rsSelectGroup'])) {
  $pageNum_rsSelectGroup = $_GET['pageNum_rsSelectGroup'];
}
$startRow_rsSelectGroup = $pageNum_rsSelectGroup * $maxRows_rsSelectGroup;

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsSelectGroup = "SELECT grp_name, grp_creation, grp_state_country, grp_city FROM tbGroup ORDER BY grp_name ASC";
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
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPlayerAccess = sprintf("SELECT player_handle FROM tbPlayerList WHERE player_handle = %s", GetSQLValueString($colname_rsPlayerAccess, "text"));
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

  
<title>Descent Mobile Campaign Tracker</title>

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
<link href="cssDescentMobile.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<table width="425" border="1" align="center" cellpadding="0" cellspacing="0" class="background">
  <tr>
    <td width="800 align=" align="center"" valign="top"center> <p><a href="index.html" target="_top"><img src="images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>
        
        
        <table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span class="normal"> <a href="Login/login.php">Login,</a> <a href="Login/mycampaigns.php"> <?php echo $row_rsPlayerAccess['player_handle']; ?> My Campaigns</a></span></td>
    <td align="right" class="normal"><a href="<?php echo $logoutAction ?>">Logout</a></td>
  </tr>
</table>
        
        
        
<table width="400" border="0" cellspacing="0" cellpadding="15">
        <tr>
          <td align="center" class="header">Browse Campaigns
         &nbsp;
          <table cellpadding="5" cellspacing="5">
            <?php do { ?>
                <tr>
                  <td align="right" class="header"><a href="campaignmap.php?urlCamID=<?php echo $row_rsCampaignList['cam_id']; ?>" target="_self"><img src="images/logos/<?php echo $row_rsCampaignList['cam_logo']; ?>" height="35" border="0" /></a>
                  <br>
				  <?php echo $row_rsCampaignList['expansion']; ?></td>
                  
                  <td align="left" class="normal"><img src="images/logos/<?php echo $row_rsCampaignList['cam_icon']; ?>" width="25" /></td>
                </tr>
                <?php } while ($row_rsCampaignList = mysql_fetch_assoc($rsCampaignList)); ?>
          </table>

<p class="header">Search For a Gaming Group</p>
<table cellpadding="5" cellspacing="5" class="purpleTable">
  <tr>
    <td align="center">Gaming Group Name</td>
    <td align="center">State / Country</td>
    <td align="center">City</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><a href="gaminggroupcampaign.php?urlGgrp=<?php echo $row_rsSelectGroup['grp_name']; ?>"><?php echo $row_rsSelectGroup['grp_name']; ?></a></td>
      <td><?php echo $row_rsSelectGroup['grp_state_country']; ?></td>
      <td><?php echo $row_rsSelectGroup['grp_city']; ?></td>
    </tr>
    <?php } while ($row_rsSelectGroup = mysql_fetch_assoc($rsSelectGroup)); ?>
</table>
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

          <p class="normal">&nbsp;</p></td>
        </tr>
      </table>
      
      <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" class="normal"><br />
          Insert Stats based on the all the Campaigns<br />
          Stats: <br />
-most played character<br />
-Most play dungeons,<br />
-When wins more OL vs Players<br />
-On which map does the OL win vs Players
          
          
          </td>
        </tr>
      </table>
      
<p class="normal"><a href="index.html" target="_top">Home</a> | <a href="firstedition.html" target="_top">1st Ed.</a> | <a href="secondedition.php" target="_top">2nd Ed.</a> | <a href="campaign.php">Campaign</a></p>
      
      <p class="footer"><a href="http://sciscoedesigns.com" target="_blank"><em>hosted by sciscoeDesigns</em></a></p></td>
</tr>
</table>




<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($rsCampaignList);

mysql_free_result($rsSelectGroup);

mysql_free_result($rsPlayerAccess);
?>
