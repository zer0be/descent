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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formBuyItem")) {
  $insertSQL = sprintf("INSERT INTO tbitems_aquired (shop_id, shop_player, shop_gold, shop_market_bought, shop_equipped, shop_latestdungeon, shop_groupid) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['shop_id'], "int"),
                       GetSQLValueString($_POST['shop_player'], "text"),
                       GetSQLValueString($_POST['shop_gold'], "int"),
                       GetSQLValueString($_POST['shop_market_bought'], "text"),
                       GetSQLValueString($_POST['shop_equipped'], "text"),
                       GetSQLValueString($_POST['shop_latestdungeon'], "text"),
                       GetSQLValueString($_POST['shop_groupid'], "int"));

  mysql_select_db($database_dbDescent, $dbDescent);
  $Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());

  $insertGoTo = "mydungeondetail.php?urlDungeonID=" . $_GET['urlDungeonID'] . "&urlGamingID=" . $_GET['urlGamingID'] . "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPlayerList = "SELECT player_id, player_handle, player_password FROM tbplayerlist";
$rsPlayerList = mysql_query($query_rsPlayerList, $dbDescent) or die(mysql_error());
$row_rsPlayerList = mysql_fetch_assoc($rsPlayerList);
$adminplayer_rsPlayerList = "-1";
if (isset($_SESSION['MM_Username'])) {
  $adminplayer_rsPlayerList = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPlayerList = sprintf("SELECT player_handle FROM tbplayerlist WHERE player_handle = %s", GetSQLValueString($adminplayer_rsPlayerList, "text"));
$rsPlayerList = mysql_query($query_rsPlayerList, $dbDescent) or die(mysql_error());
$row_rsPlayerList = mysql_fetch_assoc($rsPlayerList);
$totalRows_rsPlayerList = mysql_num_rows($rsPlayerList);

$colname_rsGetItem = "-1";
if (isset($_GET['urlItemID'])) {
  $colname_rsGetItem = $_GET['urlItemID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetItem = sprintf("SELECT * FROM tbitems WHERE market_item_name = %s", GetSQLValueString($colname_rsGetItem, "text"));
$rsGetItem = mysql_query($query_rsGetItem, $dbDescent) or die(mysql_error());
$row_rsGetItem = mysql_fetch_assoc($rsGetItem);
$totalRows_rsGetItem = mysql_num_rows($rsGetItem);

$colname_rsUpdateItem = "-1";
if (isset($_GET['urlItemID'])) {
  $colname_rsUpdateItem = $_GET['urlItemID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsUpdateItem = sprintf("SELECT * FROM tbitems_aquired WHERE shop_market_bought = %s", GetSQLValueString($colname_rsUpdateItem, "text"));
$rsUpdateItem = mysql_query($query_rsUpdateItem, $dbDescent) or die(mysql_error());
$row_rsUpdateItem = mysql_fetch_assoc($rsUpdateItem);
$totalRows_rsUpdateItem = mysql_num_rows($rsUpdateItem);
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
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<table width="500" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800 align=" align="center"" valign="top" class="background"center> <p><a href="../index.html" target="_top"><img src="../images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>
        <br>
        <span class="normal">Greetings <?php echo $row_rsPlayerList['player_handle']; ?>, <a href="<?php echo $logoutAction ?>">Logout</a>
    </span></p>
      
      <p class="header">Buying <?php echo $row_rsGetItem['market_item_name']; ?></p>
      
      <form action="<?php echo $editFormAction; ?>" method="post" name="formBuyItem" id="formBuyItem">
        <table align="center">
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Buy for:</td>
            <td><select name="shop_gold">
              <?php
do {  
?>
              <option value="<?php echo $row_rsGetItem['market_price']?>"><?php echo $row_rsGetItem['market_price']?></option>
              <?php
} while ($row_rsGetItem = mysql_fetch_assoc($rsGetItem));
  $rows = mysql_num_rows($rsGetItem);
  if($rows > 0) {
      mysql_data_seek($rsGetItem, 0);
	  $row_rsGetItem = mysql_fetch_assoc($rsGetItem);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><input type="submit" value="Insert record" /></td>
          </tr>
        </table>
        <input type="hidden" name="shop_id" value="" />
        <input type="hidden" name="shop_player" value="<?php echo $_GET['urlHeroID']; ?>" />
        <input type="hidden" name="shop_market_bought" value="<?php echo $row_rsGetItem['market_item_name']; ?>" />
        <input type="hidden" name="shop_equipped" value="yes" />
        <input type="hidden" name="shop_latestdungeon" value="<?php echo $_GET['urlDungeonID']; ?>" />
        <input type="hidden" name="shop_groupid" value="<?php echo $_GET['urlGamingID']; ?>" />
        <input type="hidden" name="MM_insert" value="formBuyItem" />
      </form>
      
      <p><img src="../images/campaign/market/<?php echo $row_rsGetItem['market_img']; ?>" width="200" /></p>

<p class="header"><a href="citydetail.php?urlGamingID=<?php echo $_GET['urlGamingID']; ?>&amp;urlDungeonID=<?php echo $_GET['urlDungeonID']; ?>&amp;urlHeroID=<?php echo $_GET['urlHeroID']; ?>">CANCEL DONT BUY</a></p>
      <p class="normal"><a href="../index.html" target="_top">Home</a> | <a href="../firstedition.html" target="_top">1st Ed.</a> | <a href="../secondedition.php" target="_top">2nd Ed.</a> | <a href="../campaign.php">Campaign</a></p>
      
      <p class="footer"><a href="http://sciscoedesigns.com" target="_blank"><em>hosted by sciscoeDesigns</em></a></p></td>
</tr>
</table>




<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($rsPlayerList);

mysql_free_result($rsUpdateItem);

mysql_free_result($rsPlayerList);

mysql_free_result($rsGetItem);

mysql_free_result($rsUpdateItem);
?>
