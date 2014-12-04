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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formInsertGroupInfo")) {
  $insertSQL = sprintf("INSERT INTO tbgaminggroup (ggrp_id, ggrp_name, ggrp_timestamp, ggrp_dm, ggrp_player1, ggrp_char1, ggrp_mage1, ggrp_player2, ggrp_char2, ggrp_warrior2, ggrp_player3, ggrp_char3, ggrp_scout3, ggrp_player4, ggrp_char4, ggrp_healer4, ggrp_playerOL, ggrp_overlord, ggrp_campaign) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ggrp_id'], "int"),
                       GetSQLValueString($_POST['chooseGroup'], "text"),
                       GetSQLValueString($_POST['ggrp_timestamp'], "date"),
                       GetSQLValueString($_POST['ggrp_dm'], "text"),
                       GetSQLValueString($_POST['ggrp_player1'], "text"),
                       GetSQLValueString($_POST['ggrp_char1'], "text"),
                       GetSQLValueString($_POST['mageSelection'], "text"),
                       GetSQLValueString($_POST['ggrp_player2'], "text"),
                       GetSQLValueString($_POST['ggrp_char2'], "text"),
                       GetSQLValueString($_POST['warriorSelection'], "text"),
                       GetSQLValueString($_POST['ggrp_player3'], "text"),
                       GetSQLValueString($_POST['ggrp_char3'], "text"),
                       GetSQLValueString($_POST['scoutSelection'], "text"),
                       GetSQLValueString($_POST['ggrp_player4'], "text"),
                       GetSQLValueString($_POST['ggrp_char4'], "text"),
                       GetSQLValueString($_POST['healerSelection'], "text"),
                       GetSQLValueString($_POST['ggrp_playerOL'], "text"),
                       GetSQLValueString($_POST['ggrp_overlord'], "text"),
                       GetSQLValueString($_POST['ggrp_campaign'], "text"));

  mysql_select_db($database_dbDescent, $dbDescent);
  $Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());

  $insertGoTo = "mycampaigns.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}



mysql_select_db($database_dbDescent, $dbDescent);
$query_rsCreateGroup = "SELECT * FROM tbgaminggroup";
$rsCreateGroup = mysql_query($query_rsCreateGroup, $dbDescent) or die(mysql_error());
$row_rsCreateGroup = mysql_fetch_assoc($rsCreateGroup);
$totalRows_rsCreateGroup = mysql_num_rows($rsCreateGroup);

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsCamList = "SELECT cam_id, cam_name FROM tbcampaign ORDER BY cam_name ASC";
$rsCamList = mysql_query($query_rsCamList, $dbDescent) or die(mysql_error());
$row_rsCamList = mysql_fetch_assoc($rsCamList);
$totalRows_rsCamList = mysql_num_rows($rsCamList);

$colname_rsGetGroups = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsGetGroups = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetGroups = sprintf("SELECT grp_id, grp_name, grp_startedby FROM tbgroup WHERE grp_startedby = %s", GetSQLValueString($colname_rsGetGroups, "text"));
$rsGetGroups = mysql_query($query_rsGetGroups, $dbDescent) or die(mysql_error());
$row_rsGetGroups = mysql_fetch_assoc($rsGetGroups);
$totalRows_rsGetGroups = mysql_num_rows($rsGetGroups);

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetMage = "SELECT hero_name FROM tbheroes WHERE hero_type = 'Mage' ";
$rsGetMage = mysql_query($query_rsGetMage, $dbDescent) or die(mysql_error());
$row_rsGetMage = mysql_fetch_assoc($rsGetMage);
$totalRows_rsGetMage = mysql_num_rows($rsGetMage);

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetMageClass = "SELECT skill_class FROM tbskills WHERE skill_type = 'Mage' GROUP BY skill_class";
$rsGetMageClass = mysql_query($query_rsGetMageClass, $dbDescent) or die(mysql_error());
$row_rsGetMageClass = mysql_fetch_assoc($rsGetMageClass);
$totalRows_rsGetMageClass = mysql_num_rows($rsGetMageClass);

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetWarriorClass = "SELECT skill_class FROM tbskills WHERE skill_type = 'Warrior' GROUP BY skill_class";
$rsGetWarriorClass = mysql_query($query_rsGetWarriorClass, $dbDescent) or die(mysql_error());
$row_rsGetWarriorClass = mysql_fetch_assoc($rsGetWarriorClass);
$totalRows_rsGetWarriorClass = mysql_num_rows($rsGetWarriorClass);

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetScoutClass = "SELECT skill_class FROM tbskills WHERE skill_type = 'Scout' GROUP BY skill_class";
$rsGetScoutClass = mysql_query($query_rsGetScoutClass, $dbDescent) or die(mysql_error());
$row_rsGetScoutClass = mysql_fetch_assoc($rsGetScoutClass);
$totalRows_rsGetScoutClass = mysql_num_rows($rsGetScoutClass);

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetHealerClass = "SELECT skill_class FROM tbskills WHERE skill_type = 'Healer' GROUP BY skill_class";
$rsGetHealerClass = mysql_query($query_rsGetHealerClass, $dbDescent) or die(mysql_error());
$row_rsGetHealerClass = mysql_fetch_assoc($rsGetHealerClass);
$totalRows_rsGetHealerClass = mysql_num_rows($rsGetHealerClass);

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetWarrior = "SELECT hero_name FROM tbheroes WHERE hero_type = 'Warrior' ";
$rsGetWarrior = mysql_query($query_rsGetWarrior, $dbDescent) or die(mysql_error());
$row_rsGetWarrior = mysql_fetch_assoc($rsGetWarrior);
$totalRows_rsGetWarrior = mysql_num_rows($rsGetWarrior);

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetScout = "SELECT hero_name FROM tbheroes WHERE hero_type = 'Scout' ";
$rsGetScout = mysql_query($query_rsGetScout, $dbDescent) or die(mysql_error());
$row_rsGetScout = mysql_fetch_assoc($rsGetScout);
$totalRows_rsGetScout = mysql_num_rows($rsGetScout);

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetHealer = "SELECT hero_name FROM tbheroes WHERE hero_type = 'Healer' ";
$rsGetHealer = mysql_query($query_rsGetHealer, $dbDescent) or die(mysql_error());
$row_rsGetHealer = mysql_fetch_assoc($rsGetHealer);
$totalRows_rsGetHealer = mysql_num_rows($rsGetHealer);

$colname_rsPlayerAccess = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsPlayerAccess = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPlayerAccess = sprintf("SELECT player_username FROM tbplayerlist WHERE player_handle = %s", GetSQLValueString($colname_rsPlayerAccess, "text"));
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
<table width="500" border="1" align="center" cellpadding="0" cellspacing="0">
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
          <td align="center" class="header">
            <form action="<?php echo $editFormAction; ?>" method="post" name="formInsertGroupInfo" id="formInsertGroupInfo">
              <table align="center">
                
                <tr valign="baseline">
                  <td colspan="3" align="center" nowrap="nowrap">Group Created by: <span class="header"><?php echo $row_rsPlayerAccess['player_username']; ?></span></td>
                </tr>
                <tr valign="baseline">
                  <td colspan="3" align="center" nowrap="nowrap"><p>Select your Gaming Group's Name:
                  
                  
                      <label for="chooseGroup"></label>
                      <select name="chooseGroup" id="chooseGroup">
                        <option value="">Choose Group</option>
                        <?php
do {  
?>
                        <option value="<?php echo $row_rsGetGroups['grp_name']?>"><?php echo $row_rsGetGroups['grp_name']?></option>
                        <?php
} while ($row_rsGetGroups = mysql_fetch_assoc($rsGetGroups));
  $rows = mysql_num_rows($rsGetGroups);
  if($rows > 0) {
      mysql_data_seek($rsGetGroups, 0);
	  $row_rsGetGroups = mysql_fetch_assoc($rsGetGroups);
  }
?>
                      </select>
                  </p>
                    <p><select name="ggrp_campaign">
                    <option value="" >Choose Campaign</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_rsCamList['cam_name']?>"><?php echo $row_rsCamList['cam_name']?></option>
                    <?php
} while ($row_rsCamList = mysql_fetch_assoc($rsCamList));
  $rows = mysql_num_rows($rsCamList);
  if($rows > 0) {
      mysql_data_seek($rsCamList, 0);
	  $row_rsCamList = mysql_fetch_assoc($rsCamList);
  }
?>
                  </select></p>
                  <p>&nbsp; </p></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap="nowrap" align="right">
                    <p>
                      
                      <select name="ggrp_player1">
                        <option value="No Player" >Choose Player</option>
                        <?php
do {  
?>
                        <option value="<?php echo $row_rsPlayerList['player_handle']?>"><?php echo $row_rsPlayerList['player_handle']?></option>
                        <?php
} while ($row_rsPlayerList = mysql_fetch_assoc($rsPlayerList));
  $rows = mysql_num_rows($rsPlayerList);
  if($rows > 0) {
      mysql_data_seek($rsPlayerList, 0);
	  $row_rsPlayerList = mysql_fetch_assoc($rsPlayerList);
  }
?>
                      </select>
                  </p></td>
                  <td align="right">
                    <select name="ggrp_char1">
                      <option value="No Mage" >Hero Mage</option>
                      <?php
do {  
?>
<option value="<?php echo $row_rsGetMage['hero_name']?>"><?php echo $row_rsGetMage['hero_name']?></option>
                      <?php
} while ($row_rsGetMage = mysql_fetch_assoc($rsGetMage));
  $rows = mysql_num_rows($rsGetMage);
  if($rows > 0) {
      mysql_data_seek($rsGetMage, 0);
	  $row_rsGetMage = mysql_fetch_assoc($rsGetMage);
  }
?>
                    </select></td>
                  <td align="right"><label for="mageSelection"></label>
                    <select name="mageSelection" id="mageSelection">
                      <option value="No Mage">Mage Class</option>
                      <?php
do {  
?>
<option value="<?php echo $row_rsGetMageClass['skill_class']?>"><?php echo $row_rsGetMageClass['skill_class']?></option>
                      <?php
} while ($row_rsGetMageClass = mysql_fetch_assoc($rsGetMageClass));
  $rows = mysql_num_rows($rsGetMageClass);
  if($rows > 0) {
      mysql_data_seek($rsGetMageClass, 0);
	  $row_rsGetMageClass = mysql_fetch_assoc($rsGetMageClass);
  }
?>
                    </select></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap="nowrap" align="right"> 
                    <select name="ggrp_player2">
                      <option value="No Player" >Choose Player</option>
                      <?php
do {  
?>
                      <option value="<?php echo $row_rsPlayerList['player_handle']?>"><?php echo $row_rsPlayerList['player_handle']?></option>
                      <?php
} while ($row_rsPlayerList = mysql_fetch_assoc($rsPlayerList));
  $rows = mysql_num_rows($rsPlayerList);
  if($rows > 0) {
      mysql_data_seek($rsPlayerList, 0);
	  $row_rsPlayerList = mysql_fetch_assoc($rsPlayerList);
  }
?>
                    </select>
                  </td>
                  <td align="right"><select name="ggrp_char2">
                    <option value="No Warrior" >Hero Warrior</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_rsGetWarrior['hero_name']?>"><?php echo $row_rsGetWarrior['hero_name']?></option>
                    <?php
} while ($row_rsGetWarrior = mysql_fetch_assoc($rsGetWarrior));
  $rows = mysql_num_rows($rsGetWarrior);
  if($rows > 0) {
      mysql_data_seek($rsGetWarrior, 0);
	  $row_rsGetWarrior = mysql_fetch_assoc($rsGetWarrior);
  }
?>
                  </select></td>
                  <td align="right"><label for="warriorSelection"></label>
                    <select name="warriorSelection" id="warriorSelection">
                      <option value="No Warrior">Warrior Class</option>
                      <?php
do {  
?>
                      <option value="<?php echo $row_rsGetWarriorClass['skill_class']?>"><?php echo $row_rsGetWarriorClass['skill_class']?></option>
                      <?php
} while ($row_rsGetWarriorClass = mysql_fetch_assoc($rsGetWarriorClass));
  $rows = mysql_num_rows($rsGetWarriorClass);
  if($rows > 0) {
      mysql_data_seek($rsGetWarriorClass, 0);
	  $row_rsGetWarriorClass = mysql_fetch_assoc($rsGetWarriorClass);
  }
?>
                    </select></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap="nowrap" align="right"><select name="ggrp_player3">
                    <option value="No Player" >Choose Player</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_rsPlayerList['player_handle']?>"><?php echo $row_rsPlayerList['player_handle']?></option>
                    <?php
} while ($row_rsPlayerList = mysql_fetch_assoc($rsPlayerList));
  $rows = mysql_num_rows($rsPlayerList);
  if($rows > 0) {
      mysql_data_seek($rsPlayerList, 0);
	  $row_rsPlayerList = mysql_fetch_assoc($rsPlayerList);
  }
?>
                    </select>
                  </td>
                  <td align="right"><select name="ggrp_char3">
                    <option value="No Scout" >Hero Scout</option>
                    <?php
do {  
?>
<option value="<?php echo $row_rsGetScout['hero_name']?>"><?php echo $row_rsGetScout['hero_name']?></option>
                    <?php
} while ($row_rsGetScout = mysql_fetch_assoc($rsGetScout));
  $rows = mysql_num_rows($rsGetScout);
  if($rows > 0) {
      mysql_data_seek($rsGetScout, 0);
	  $row_rsGetScout = mysql_fetch_assoc($rsGetScout);
  }
?>
                  </select></td>
                  <td align="right"><label for="scoutSelection"></label>
                    <select name="scoutSelection" id="scoutSelection">
                      <option value="No Scout">Scout Class</option>
                      <?php
do {  
?>
<option value="<?php echo $row_rsGetScoutClass['skill_class']?>"><?php echo $row_rsGetScoutClass['skill_class']?></option>
                      <?php
} while ($row_rsGetScoutClass = mysql_fetch_assoc($rsGetScoutClass));
  $rows = mysql_num_rows($rsGetScoutClass);
  if($rows > 0) {
      mysql_data_seek($rsGetScoutClass, 0);
	  $row_rsGetScoutClass = mysql_fetch_assoc($rsGetScoutClass);
  }
?>
                  </select></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap="nowrap" align="right"><select name="ggrp_player4">
                    <option value="No Player" >Choose Player</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_rsPlayerList['player_handle']?>"><?php echo $row_rsPlayerList['player_handle']?></option>
                    <?php
} while ($row_rsPlayerList = mysql_fetch_assoc($rsPlayerList));
  $rows = mysql_num_rows($rsPlayerList);
  if($rows > 0) {
      mysql_data_seek($rsPlayerList, 0);
	  $row_rsPlayerList = mysql_fetch_assoc($rsPlayerList);
  }
?>
                    </select>
                 </td>
                  <td align="right"><select name="ggrp_char4">
                    <option value="No Healer" >Hero Healer</option>
                    <?php
do {  
?>
<option value="<?php echo $row_rsGetHealer['hero_name']?>"><?php echo $row_rsGetHealer['hero_name']?></option>
                    <?php
} while ($row_rsGetHealer = mysql_fetch_assoc($rsGetHealer));
  $rows = mysql_num_rows($rsGetHealer);
  if($rows > 0) {
      mysql_data_seek($rsGetHealer, 0);
	  $row_rsGetHealer = mysql_fetch_assoc($rsGetHealer);
  }
?>
                  </select></td>
                  <td align="right"><label for="healerSelection"></label>
                    <select name="healerSelection" id="healerSelection">
                      <option value="No Healer">Healer Class</option>
                      <?php
do {  
?>
<option value="<?php echo $row_rsGetHealerClass['skill_class']?>"><?php echo $row_rsGetHealerClass['skill_class']?></option>
                      <?php
} while ($row_rsGetHealerClass = mysql_fetch_assoc($rsGetHealerClass));
  $rows = mysql_num_rows($rsGetHealerClass);
  if($rows > 0) {
      mysql_data_seek($rsGetHealerClass, 0);
	  $row_rsGetHealerClass = mysql_fetch_assoc($rsGetHealerClass);
  }
?>
                  </select></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap="nowrap" align="right" valign="top"><select name="ggrp_playerOL">
                      <option value="" >Choose Overlord</option>
                      <?php
do {  
?>
                      <option value="<?php echo $row_rsPlayerList['player_handle']?>"><?php echo $row_rsPlayerList['player_handle']?></option>
                      <?php
} while ($row_rsPlayerList = mysql_fetch_assoc($rsPlayerList));
  $rows = mysql_num_rows($rsPlayerList);
  if($rows > 0) {
      mysql_data_seek($rsPlayerList, 0);
	  $row_rsPlayerList = mysql_fetch_assoc($rsPlayerList);
  }
?>
                  </select></td>
                  <td align="right"><text name="ggrp_overlord" cols="50" rows="5">
                  <span class="header">Overlord</span>                    </textarea></td>
                  <td align="right">&nbsp;</td>
                </tr>
                <tr valign="baseline">
                  <td colspan="3" align="center" nowrap="nowrap">
                  <br>
                  </td>
                </tr>
                <tr valign="baseline">
                  <td colspan="3" align="center" nowrap="nowrap"><p>&nbsp;
                    </p>
                    <p>
                      <input type="submit" value="Create New Campaign" />
                  </p></td>
                </tr>
              </table>
              <input type="hidden" name="ggrp_dm" value="<?php echo $row_rsPlayerAccess['player_username']; ?>"/>
              <input type="hidden" name="ggrp_overlord" value="Overlord" />
              <input type="hidden" name="ggrp_id" value=""  />
              <input type="hidden" name="ggrp_timestamp" value="" />
              <input type="hidden" name="MM_insert" value="formInsertGroupInfo" />
            </form>
            
          </td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p class="normal"><a href="../index.html" target="_top">Home</a> | <a href="../firstedition.html" target="_top">1st Ed.</a> | <a href="../secondedition.php" target="_top">2nd Ed.</a> | <a href="../campaign.php">Campaign</a></p>
      
      <p class="footer"><a href="http://sciscoedesigns.com" target="_blank"><em>hosted by sciscoeDesigns</em></a></p></td>
</tr>
</table>




<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($rsCreateGroup);

mysql_free_result($rsCamList);

mysql_free_result($rsGetGroups);

mysql_free_result($rsGetMage);

mysql_free_result($rsGetMageClass);

mysql_free_result($rsGetWarriorClass);

mysql_free_result($rsGetScoutClass);

mysql_free_result($rsGetHealerClass);

mysql_free_result($rsGetWarrior);

mysql_free_result($rsGetScout);

mysql_free_result($rsGetHealer);

mysql_free_result($rsPlayerAccess);
?>
