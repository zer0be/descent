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

$currentPage = $_SERVER["PHP_SELF"];

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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formOLspoils")) {
  $insertSQL = sprintf("INSERT INTO tbitems_aquired (shop_id, shop_player, shop_xp, shop_market_bought, shop_latestdungeon, shop_groupid) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['shop_id'], "int"),
                       GetSQLValueString($_POST['shop_player'], "text"),
                       GetSQLValueString($_POST['shop_xp'], "int"),
                       GetSQLValueString($_POST['shop_relics'], "text"),
                       GetSQLValueString($_POST['shop_latestdungeon'], "text"),
                       GetSQLValueString($_POST['shop_groupid'], "int"));

  mysql_select_db($database_dbDescent, $dbDescent);
  $Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());
}

$playerAccess_rsPlayerList = "-1";
if (isset($_SESSION['MM_Username'])) {
  $playerAccess_rsPlayerList = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPlayerList = sprintf("SELECT player_handle FROM tbplayerlist WHERE player_handle = %s", GetSQLValueString($playerAccess_rsPlayerList, "text"));
$rsPlayerList = mysql_query($query_rsPlayerList, $dbDescent) or die(mysql_error());
$row_rsPlayerList = mysql_fetch_assoc($rsPlayerList);

$colname_rsCurrentSkills = "-1";
if (isset($_GET['urlGamingID'])) {
  $colname_rsCurrentSkills = $_GET['urlGamingID'];
}
$dungeonname_rsCurrentSkills = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsCurrentSkills = $_GET['urlDungeonID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsCurrentSkills = sprintf("SELECT spendxp_skill_name FROM tbitems_aquired WHERE shop_player = 'overlord' AND shop_groupid = %s AND shop_latestdungeon = %s AND spendxp_skill_name IS NOT NULL", GetSQLValueString($colname_rsCurrentSkills, "int"),GetSQLValueString($dungeonname_rsCurrentSkills, "text"));
$rsCurrentSkills = mysql_query($query_rsCurrentSkills, $dbDescent) or die(mysql_error());
$row_rsCurrentSkills = mysql_fetch_assoc($rsCurrentSkills);
$totalRows_rsCurrentSkills = mysql_num_rows($rsCurrentSkills);

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetRelic = "SELECT market_item_name FROM tbitems WHERE shop_relic = 'yes' AND owner = 'overlord' ORDER BY market_item_name ASC";
$rsGetRelic = mysql_query($query_rsGetRelic, $dbDescent) or die(mysql_error());
$row_rsGetRelic = mysql_fetch_assoc($rsGetRelic);
$totalRows_rsGetRelic = mysql_num_rows($rsGetRelic);

$colname_rsGetXP = "-1";
if (isset($_GET['urlGamingID'])) {
  $colname_rsGetXP = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetXP = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = 'overlord' AND shop_xp > 0 ", GetSQLValueString($colname_rsGetXP, "int"));
$rsGetXP = mysql_query($query_rsGetXP, $dbDescent) or die(mysql_error());
$row_rsGetXP = mysql_fetch_assoc($rsGetXP);
$totalRows_rsGetXP = mysql_num_rows($rsGetXP);

$colname_rsGetRelicTotalWon = "-1";
if (isset($_GET['urlGamingID'])) {
  $colname_rsGetRelicTotalWon = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetRelicTotalWon = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = 'Overlord' AND shop_market_bought IS NOT NULL ", GetSQLValueString($colname_rsGetRelicTotalWon, "int"));
$rsGetRelicTotalWon = mysql_query($query_rsGetRelicTotalWon, $dbDescent) or die(mysql_error());
$row_rsGetRelicTotalWon = mysql_fetch_assoc($rsGetRelicTotalWon);
$totalRows_rsGetRelicTotalWon = mysql_num_rows($rsGetRelicTotalWon);

$colname_rsGetSkillsTotalEquipped = "-1";
if (isset($_GET['urlGamingID'])) {
  $colname_rsGetSkillsTotalEquipped = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetSkillsTotalEquipped = sprintf("SELECT spendxp_skill_name FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = 'Overlord' AND spendxp_skill_name IS NOT NULL", GetSQLValueString($colname_rsGetSkillsTotalEquipped, "int"));
$rsGetSkillsTotalEquipped = mysql_query($query_rsGetSkillsTotalEquipped, $dbDescent) or die(mysql_error());
$row_rsGetSkillsTotalEquipped = mysql_fetch_assoc($rsGetSkillsTotalEquipped);
$totalRows_rsGetSkillsTotalEquipped = mysql_num_rows($rsGetSkillsTotalEquipped);

$dungeongroup_rsXPremaining = "-1";
if (isset($_GET['urlGamingID'])) {
  $dungeongroup_rsXPremaining = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsXPremaining = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_player = 'Overlord' AND shop_groupid = %s", GetSQLValueString($dungeongroup_rsXPremaining, "int"));
$rsXPremaining = mysql_query($query_rsXPremaining, $dbDescent) or die(mysql_error());
$row_rsXPremaining = mysql_fetch_assoc($rsXPremaining);
$totalRows_rsXPremaining = mysql_num_rows($rsXPremaining);

$dungeonname_rsRelicCurrentDungeon = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsRelicCurrentDungeon = $_GET['urlDungeonID'];
}
$colname_rsRelicCurrentDungeon = "-1";
if (isset($_GET['urlGamingID'])) {
  $colname_rsRelicCurrentDungeon = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsRelicCurrentDungeon = sprintf("SELECT shop_market_bought FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = 'Overlord' AND shop_market_bought IS NOT NULL AND shop_latestdungeon = %s", GetSQLValueString($colname_rsRelicCurrentDungeon, "int"),GetSQLValueString($dungeonname_rsRelicCurrentDungeon, "text"));
$rsRelicCurrentDungeon = mysql_query($query_rsRelicCurrentDungeon, $dbDescent) or die(mysql_error());
$row_rsRelicCurrentDungeon = mysql_fetch_assoc($rsRelicCurrentDungeon);
$totalRows_rsRelicCurrentDungeon = mysql_num_rows($rsRelicCurrentDungeon);

$colname_rsXPcurrentDungeon = "-1";
if (isset($_GET['urlGamingID'])) {
  $colname_rsXPcurrentDungeon = $_GET['urlGamingID'];
}
$dungeonname_rsXPcurrentDungeon = "-1";
if (isset($_GET['urlDungeonID'])) {
  $dungeonname_rsXPcurrentDungeon = $_GET['urlDungeonID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsXPcurrentDungeon = sprintf("SELECT SUM(shop_xp) FROM tbitems_aquired WHERE shop_groupid = %s AND shop_player = 'overlord' AND shop_latestdungeon = %s", GetSQLValueString($colname_rsXPcurrentDungeon, "int"),GetSQLValueString($dungeonname_rsXPcurrentDungeon, "text"));
$rsXPcurrentDungeon = mysql_query($query_rsXPcurrentDungeon, $dbDescent) or die(mysql_error());
$row_rsXPcurrentDungeon = mysql_fetch_assoc($rsXPcurrentDungeon);
$totalRows_rsXPcurrentDungeon = mysql_num_rows($rsXPcurrentDungeon);

$colname_rsPlayerAccess = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsPlayerAccess = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPlayerAccess = sprintf("SELECT player_handle FROM tbplayerlist WHERE player_handle = %s", GetSQLValueString($colname_rsPlayerAccess, "text"));
$rsPlayerAccess = mysql_query($query_rsPlayerAccess, $dbDescent) or die(mysql_error());
$row_rsPlayerAccess = mysql_fetch_assoc($rsPlayerAccess);
$totalRows_rsPlayerAccess = mysql_num_rows($rsPlayerAccess);

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsAllSkills = "SELECT skill_name, skill_cost FROM tbskills WHERE skill_type = 'Overlord' ORDER BY skill_name ASC";
$rsAllSkills = mysql_query($query_rsAllSkills, $dbDescent) or die(mysql_error());
$row_rsAllSkills = mysql_fetch_assoc($rsAllSkills);
$totalRows_rsAllSkills = mysql_num_rows($rsAllSkills);

$queryString_rsOLskill = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsOLskill") == false && 
        stristr($param, "totalRows_rsOLskill") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsOLskill = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsOLskill = sprintf("&totalRows_rsOLskill=%d%s", $totalRows_rsOLskill, $queryString_rsOLskill);
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
    <td width="800 align=" align="center"" valign="top" class="background"center> <p><a href="../index.html" target="_top"><img src="../images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>
    
    <table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span class="normal"><a href="mycampaigns.php"><?php echo $row_rsPlayerAccess['player_handle']; ?>, My Campaigns </a></span></td>
    <td align="right"><a href="<?php echo $logoutAction ?>">Log out</a></td>
  </tr>
</table>

   </p>
      <p class="normal">&nbsp;</p>
      <table width="300" border="0" cellpadding="5" cellspacing="0" class="purpleTable">
        <tr>
          <td rowspan="3" class="header"><img src="../images/campaign/heroes/bust/overlordbust.jpg" width="100" height="125" /></td>
          <td nowrap="nowrap" class="header"><span class="normal"><?php echo $row_rsXPremaining['SUM(shop_xp)']; ?>/</span><?php echo $row_rsGetXP['SUM(shop_xp)']; ?> XP</td>
          <td rowspan="4" align="center" valign="top"><table cellpadding="0" cellspacing="5">
              <tr>
                <td align="center" class="header">Learned Overlord Skills</td>
              </tr>
              <?php do { ?>
                <tr>
                  <td align="center" nowrap="nowrap" class="normal"><?php echo $row_rsGetSkillsTotalEquipped['spendxp_skill_name']; ?></td>
                </tr>
                <?php } while ($row_rsGetSkillsTotalEquipped = mysql_fetch_assoc($rsGetSkillsTotalEquipped)); ?>
          </table></td>
          <td rowspan="4" align="center" valign="top">
            <table cellpadding="0" cellspacing="5">
              <tr>
                <td align="center" class="header">Equipped Relics</td>
              </tr>
              <?php do { ?>
                <tr>
                  <td align="center" nowrap="nowrap" class="normal"><?php echo $row_rsGetRelicTotalWon['shop_market_bought']; ?></td>
                </tr>
                <?php } while ($row_rsGetRelicTotalWon = mysql_fetch_assoc($rsGetRelicTotalWon)); ?>
            </table></td>
        </tr>
        <tr>
          <td class="header">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="header"><?php echo $_GET['urlHeroID']; ?></span></td>
          <td>&nbsp;</td>
        </tr>
      </table>
<p class="normal">&nbsp;</p>
      <table width="400" border="0" cellpadding="0" cellspacing="0" class="blackTable">
        <tr>
          <td colspan="2"> <p class="header">New Skills learned after completing <?php echo $_GET['urlDungeonID']; ?></p>
          </td>
        </tr>
        <tr>
          <td align="center"><table cellpadding="5" cellspacing="5" class="purpleTable">
            <?php do { ?>
              <tr>
                <td align="center"><span class="normal">XP: <?php echo $row_rsXPcurrentDungeon['SUM(shop_xp)']; ?></span></td>
              </tr>
              <?php } while ($row_rsGetXP = mysql_fetch_assoc($rsGetXP)); ?>
          </table>
          
          <table cellpadding="0" cellspacing="5" class="purpleTable">
            <tr>
              <td class="normal">Relics Retrieved from <?php echo $_GET['urlDungeonID']; ?></td>
            </tr>
            <?php do { ?>
              <tr>
                <td align="center" class="normal"><?php echo $row_rsRelicCurrentDungeon['shop_market_bought']; ?></td>
              </tr>
              <?php } while ($row_rsRelicCurrentDungeon = mysql_fetch_assoc($rsRelicCurrentDungeon)); ?>
          </table></td>
          <td align="center"><table cellpadding="5" cellspacing="5" class="purpleTable">
            <?php do { ?>
              <tr>
                <td align="center"><span class="normal"><?php echo $row_rsCurrentSkills['spendxp_skill_name']; ?></span></td>
              </tr>
              <?php } while ($row_rsCurrentSkills = mysql_fetch_assoc($rsCurrentSkills)); ?>
          </table></td>
        </tr>
      </table>
     
      

      
      <form action="<?php echo $editFormAction; ?>" method="post" name="formOLspoils" id="formOLspoils">
        <table align="center">
          <tr valign="baseline">
            <td align="right" nowrap="nowrap" class="header">XP:</td>
            <td><input type="text" name="shop_xp" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right"></td>
            <td><select name="shop_relics">
              <option value="" >Found Relics</option>
              <?php
do {  
?>
              <option value="<?php echo $row_rsGetRelic['market_item_name']?>"><?php echo $row_rsGetRelic['market_item_name']?></option>
              <?php
} while ($row_rsGetRelic = mysql_fetch_assoc($rsGetRelic));
  $rows = mysql_num_rows($rsGetRelic);
  if($rows > 0) {
      mysql_data_seek($rsGetRelic, 0);
	  $row_rsGetRelic = mysql_fetch_assoc($rsGetRelic);
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
        <input type="hidden" name="shop_latestdungeon" value="<?php echo $_GET['urlDungeonID']; ?>" />
        <input type="hidden" name="shop_groupid" value="<?php echo $_GET['urlGamingID']; ?>" />
        <input type="hidden" name="MM_insert" value="formOLspoils" />
      </form>
      <br>
      <br>
      

      <div id="accOverLord" class="Accordion" tabindex="0">
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Learn Overlord Skill</div>
          <div class="AccordionPanelContent">
            <table cellpadding="0" cellspacing="5" class="purpleTable">
              <tr>
                <td>&nbsp;</td>
                <td>skill_name</td>
                <td>skill_cost</td>
              </tr>
              <?php do { ?>
                <tr>
                  <td><a href="buySkill.php?urlSkillID=<?php echo $row_rsAllSkills['skill_name']; ?>&amp;urlGamingID=<?php echo $_GET['urlGamingID']; ?>&amp;urlHeroID=<?php echo $_GET['urlHeroID']; ?>&amp;urlDungeonID=<?php echo $_GET['urlDungeonID']; ?>&amp;urlClassID=<?php echo $_GET['urlClassID']; ?>">+</a></td>
                  <td><?php echo $row_rsAllSkills['skill_name']; ?></td>
                  <td><?php echo $row_rsAllSkills['skill_cost']; ?></td>
                </tr>
                <?php } while ($row_rsAllSkills = mysql_fetch_assoc($rsAllSkills)); ?>
            </table>
          </div>
        </div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">comingsoon</div>
          <div class="AccordionPanelContent">Content 2</div>
        </div>
      </div>
      <p class="pageTitle">&nbsp;</p>
      <p class="pageTitle"><a href="mydungeondetail.php?urlDungeonID=<?php echo $_GET['urlDungeonID']; ?>&amp;urlGamingID=<?php echo $_GET['urlGamingID']; ?>">Back to Dungeon Details</a></p>
      <p class="normal"><a href="../index.html" target="_top">Home</a> | <a href="../firstedition.html" target="_top">1st Ed.</a> | <a href="../secondedition.php" target="_top">2nd Ed.</a> | <a href="../campaign.php">Campaign</a></p>
      
    <p class="footer"><a href="http://sciscoedesigns.com" target="_blank"><em>hosted by sciscoeDesigns</em></a></p></td>
</tr>
</table>




<p>&nbsp;</p>
<script type="text/javascript">
var Accordion1 = new Spry.Widget.Accordion("accOverLord",{enableAnimation: false, useFixedPanelHeights: false, defaultPanel: -1 });


</script>
</body>
</html>
<?php
mysql_free_result($rsPlayerList);

mysql_free_result($rsCurrentSkills);

mysql_free_result($rsGetRelic);

mysql_free_result($rsGetXP);

mysql_free_result($rsGetRelicTotalWon);

mysql_free_result($rsGetSkillsTotalEquipped);

mysql_free_result($rsXPremaining);

mysql_free_result($rsRelicCurrentDungeon);

mysql_free_result($rsXPcurrentDungeon);

mysql_free_result($rsPlayerAccess);

mysql_free_result($rsAllSkills);
?>
