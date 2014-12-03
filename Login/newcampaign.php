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

$MM_restrictGoTo = "../index.html";
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

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsCreateGroup = "SELECT * FROM tbGamingGroup";
$rsCreateGroup = mysql_query($query_rsCreateGroup, $dbDescent) or die(mysql_error());
$row_rsCreateGroup = mysql_fetch_assoc($rsCreateGroup);
$totalRows_rsCreateGroup = mysql_num_rows($rsCreateGroup);

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsCamList = "SELECT cam_name, expansion, cam_logo, cam_icon FROM tbCampaign ORDER BY cam_name ASC";
$rsCamList = mysql_query($query_rsCamList, $dbDescent) or die(mysql_error());
$row_rsCamList = mysql_fetch_assoc($rsCamList);
$totalRows_rsCamList = mysql_num_rows($rsCamList);

$colname_rsPlayerAccess = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsPlayerAccess = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPlayerAccess = sprintf("SELECT player_username FROM tbPlayerList WHERE player_handle = %s", GetSQLValueString($colname_rsPlayerAccess, "text"));
$rsPlayerAccess = mysql_query($query_rsPlayerAccess, $dbDescent) or die(mysql_error());
$row_rsPlayerAccess = mysql_fetch_assoc($rsPlayerAccess);
$totalRows_rsPlayerAccess = mysql_num_rows($rsPlayerAccess);
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
<table width="450" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800 align=" align="center"" valign="top" class="background"center> <p class="normal"><a href="../index.html" target="_top"><img src="../images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>
    <br><table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="mycampaigns.php" class="normal"><?php echo $row_rsPlayerAccess['player_username']; ?> My Campaigns</a></td>
    <td align="right"> <a href="<?php echo $logoutAction ?>"><span class="normal">Logout</span></a></td>
  </tr>
</table>

  
      <p class="header">&nbsp;</p>
      <table width="385" border="0" cellpadding="15" cellspacing="0" class="purpleTable">
        <tr>
          <td align="center" class="header"><p><span class="pageTitle">Choose A Campaign</span>&nbsp;</p>
            <table border="0" cellpadding="0" cellspacing="5">
              <?php do { ?>
                <tr>
                    <td width="30">&nbsp;</td>
                    <td width="50">&nbsp;</td>
                    <td width="48">&nbsp;</td>
                    <td width="40">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="3"><a href="choosegroup.php?urlCampaignID=<?php echo $row_rsCamList['cam_name']; ?>"><?php echo $row_rsCamList['expansion']; ?><br>
                  <img src="../images/logos/<?php echo $row_rsCamList['cam_logo']; ?>" height="30" /></a></td>
                  <td><a href="choosegroup.php?urlCampaignID=<?php echo $row_rsCamList['cam_name']; ?>"><img src="../images/logos/<?php echo $row_rsCamList['cam_icon']; ?>" height="30" /></a></td>
                </tr>
                <?php } while ($row_rsCamList = mysql_fetch_assoc($rsCamList)); ?>
            </table></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p><a href="mycampaigns.php" class="header">**EXIT TO MYCAMPAIGNS**</a></p>
      <p class="normal"><a href="../index.html" target="_top">Home</a>| <a href="../campaign.php">Campaign</a></p>
      
    </td>
</tr>
</table>




<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($rsCreateGroup);

mysql_free_result($rsCamList);

mysql_free_result($rsPlayerAccess);
?>
