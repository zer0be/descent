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
	
  $logoutGoTo = "gaminggroupcampaign.php";
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

$colname_rsGetCampaigns = "-1";
if (isset($_GET['urlGgrp'])) {
  $colname_rsGetCampaigns = $_GET['urlGgrp'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetCampaigns = sprintf("SELECT * FROM tbGamingGroup WHERE ggrp_name = %s ORDER BY ggrp_timestamp DESC", GetSQLValueString($colname_rsGetCampaigns, "text"));
$rsGetCampaigns = mysql_query($query_rsGetCampaigns, $dbDescent) or die(mysql_error());
$row_rsGetCampaigns = mysql_fetch_assoc($rsGetCampaigns);
$totalRows_rsGetCampaigns = mysql_num_rows($rsGetCampaigns);

$colname_rsGroupDetails = "-1";
if (isset($_GET['urlGgrp'])) {
  $colname_rsGroupDetails = $_GET['urlGgrp'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGroupDetails = sprintf("SELECT grp_name, grp_creation, grp_startedby, grp_state_country, grp_city FROM tbGroup WHERE grp_name = %s", GetSQLValueString($colname_rsGroupDetails, "text"));
$rsGroupDetails = mysql_query($query_rsGroupDetails, $dbDescent) or die(mysql_error());
$row_rsGroupDetails = mysql_fetch_assoc($rsGroupDetails);
$totalRows_rsGroupDetails = mysql_num_rows($rsGroupDetails);

$colname_rsPlayerAccess = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsPlayerAccess = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPlayerAccess = sprintf("SELECT player_handle FROM tbPlayerList WHERE player_handle = %s", GetSQLValueString($colname_rsPlayerAccess, "text"));
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
<link href="cssDescentMobile.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<table width="450" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800 align=" align="center"" valign="top" class="background"center> <p><a href="index.html" target="_top"><img src="images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>
       </p>
        
       <table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" class="normal"> <a href="Login/login.php"><span class="normal"> Login</span></a>
      <a href="Login/mycampaigns.php"><?php echo $row_rsPlayerAccess['player_handle']; ?>, My Campaigns </span></a></td>
    <td align="right"> <span class="normal"><a href="<?php echo $logoutAction ?>">Log out</a></td>
    </tr>
</table>
  
     
      
      <table width="400" border="0" cellspacing="0" cellpadding="15">
        <tr>
          <td align="center" class="header">Browse <strong><em><?php echo $row_rsGetCampaigns['ggrp_name']; ?></em></strong> Campaigns
          <br>
          <span class="normal"><?php echo $row_rsGroupDetails['grp_city']; ?>, <?php echo $row_rsGroupDetails['grp_state_country']; ?></span>
<p class="header">&nbsp;</p>
<table cellpadding="5" cellspacing="5" class="blackTable">
  <?php do { ?>
  <tr>
    <td colspan="5" align="center" class="header"><span class="pageTitle"><a href="campaigndetail.php?urlGamingID=<?php echo $row_rsGetCampaigns['ggrp_id']; ?>">+</a></span><a href="campaigndetail.php?urlGamingID=<?php echo $row_rsGetCampaigns['ggrp_id']; ?>"> <?php echo $row_rsGetCampaigns['ggrp_campaign']; ?></a> <span class="normal"><?php echo $row_rsGetCampaigns['ggrp_timestamp']; ?></span></td>
    </tr>
    
  <tr>
    <td align="center" class="normal"><?php echo $row_rsGetCampaigns['ggrp_player1']; ?></td>
    <td align="center" class="normal"><?php echo $row_rsGetCampaigns['ggrp_player2']; ?></td>
    <td align="center" class="normal"><?php echo $row_rsGetCampaigns['ggrp_player3']; ?></td>
    <td align="center" class="normal"><?php echo $row_rsGetCampaigns['ggrp_player4']; ?></td>
    <td align="center" class="normal"><?php echo $row_rsGetCampaigns['ggrp_playerOL']; ?></td>
    </tr>
  
    <tr>
      <td align="center" class="normal"><?php echo $row_rsGetCampaigns['ggrp_char1']; ?></td>
      <td align="center" class="normal"><?php echo $row_rsGetCampaigns['ggrp_char2']; ?></td>
      <td align="center" class="normal"><?php echo $row_rsGetCampaigns['ggrp_char3']; ?></td>
      <td align="center" class="normal"><?php echo $row_rsGetCampaigns['ggrp_char4']; ?></td>
      <td align="center" class="normal"><?php echo $row_rsGetCampaigns['ggrp_overlord']; ?></td>
      </tr>
    <tr>
      <td colspan="5" align="center" class="purpleTable">&nbsp;</td>
      </tr>
    <?php } while ($row_rsGetCampaigns = mysql_fetch_assoc($rsGetCampaigns)); ?>
</table>

</td>
        </tr>
      </table>
      <a href="campaign.php" target="_self"><img src="images/logos/campaign2ndlogo.png" alt="Choose another Campaign" width="300" height="55" border="0" /></a>
      <p class="normal"><a href="index.html" target="_top">Home</a>  | <a href="campaign.php">Campaign</a></p>
      
      </td>
</tr>
</table>




<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($rsGetCampaigns);

mysql_free_result($rsGroupDetails);

mysql_free_result($rsPlayerAccess);
?>
