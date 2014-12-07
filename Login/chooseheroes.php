<?php require_once('../Connections/dbDescent.php'); ?>
<?php require_once('../Connections/dbDescent.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formSelectHeroes")) {
  $insertSQL = sprintf("INSERT INTO tbgaminggroup (ggrp_id, ggrp_name, ggrp_timestamp, ggrp_dm, ggrp_player1, ggrp_char1, ggrp_mage1, ggrp_player2, ggrp_char2, ggrp_warrior2, ggrp_player3, ggrp_char3, ggrp_scout3, ggrp_player4, ggrp_char4, ggrp_healer4, ggrp_playerOL, ggrp_overlord, ggrp_campaign) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ggrp_id'], "int"),
                       GetSQLValueString($_POST['ggrp_name'], "text"),
                       GetSQLValueString($_POST['ggrp_timestamp'], "date"),
                       GetSQLValueString($_POST['ggrp_dm'], "text"),
                       GetSQLValueString($_POST['ggrp_player1'], "text"),
                       GetSQLValueString($_POST['ggrp_char1'], "text"),
                       GetSQLValueString($_POST['ggrp_mage1'], "text"),
                       GetSQLValueString($_POST['ggrp_player2'], "text"),
                       GetSQLValueString($_POST['ggrp_char2'], "text"),
                       GetSQLValueString($_POST['ggrp_warrior2'], "text"),
                       GetSQLValueString($_POST['ggrp_player3'], "text"),
                       GetSQLValueString($_POST['ggrp_char3'], "text"),
                       GetSQLValueString($_POST['ggrp_scout3'], "text"),
                       GetSQLValueString($_POST['ggrp_player4'], "text"),
                       GetSQLValueString($_POST['ggrp_char4'], "text"),
                       GetSQLValueString($_POST['ggrp_healer4'], "text"),
                       GetSQLValueString($_POST['ggrp_playerOL'], "text"),
                       GetSQLValueString($_POST['ggrp_overlord'], "text"),
                       GetSQLValueString($_POST['ggrp_campaign'], "text"));

  mysql_select_db($database_dbDescent, $dbDescent);
  $Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());

  $insertGoTo = "startinggear.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$campaignlogo_rsCamList = "-1";
if (isset($_GET['urlCampaignID'])) {
  $campaignlogo_rsCamList = $_GET['urlCampaignID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsCamList = sprintf("SELECT cam_logo, cam_name FROM tbcampaign WHERE cam_name = %s", GetSQLValueString($campaignlogo_rsCamList, "text"));
$rsCamList = mysql_query($query_rsCamList, $dbDescent) or die(mysql_error());
$row_rsCamList = mysql_fetch_assoc($rsCamList);
$totalRows_rsCamList = mysql_num_rows($rsCamList);

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
$query_rsPlayerAccess = sprintf("SELECT player_username FROM tbplayerlist WHERE player_username = %s", GetSQLValueString($colname_rsPlayerAccess, "text"));
$rsPlayerAccess = mysql_query($query_rsPlayerAccess, $dbDescent) or die(mysql_error());
$row_rsPlayerAccess = mysql_fetch_assoc($rsPlayerAccess);
$totalRows_rsPlayerAccess = mysql_num_rows($rsPlayerAccess);

$colname_rsGroupMembers = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsGroupMembers = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGroupMembers = sprintf("SELECT player_handle FROM tbplayerlist WHERE created_by = %s OR created_by = 'ALL' ORDER BY player_handle ASC", GetSQLValueString($colname_rsGroupMembers, "text"));
$rsGroupMembers = mysql_query($query_rsGroupMembers, $dbDescent) or die(mysql_error());
$row_rsGroupMembers = mysql_fetch_assoc($rsGroupMembers);
$totalRows_rsGroupMembers = mysql_num_rows($rsGroupMembers);
?>


<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<table width="500" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800" align=" align="center"" valign="top" class="background"center> <p class="normal"><a href="../index.html" target="_top"><img src="../images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>
    <br><table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="mycampaigns.php" class="normal"><?php echo $row_rsPlayerAccess['player_username']; ?> My Campaigns</a></td>
    <td align="right"> <a href="<?php echo $logoutAction ?>"><span class="normal">Logout</span></a></td>
  </tr>
</table>

  
      <p class="header"><img src="../images/logos/<?php echo $row_rsCamList['cam_logo']; ?>" height="40" />
      <br>
      <span class="pageTitle"><?php echo $_GET['urlGroupName']; ?></span></p>
      <table width="385" border="0" cellpadding="15" cellspacing="0" class="purpleTable">
        <tr>
          <td align="center" class="header">&nbsp;
            <form action="<?php echo $editFormAction; ?>" method="post" name="formSelectHeroes" id="formSelectHeroes">
              <table width="600" border="0" align="center" cellpadding="5" cellspacing="5">
                <tr class="header">
                  <td align="center"><span class="header">Mage</span><br>
                  <img src="../images/campaign/icons/classSymbolMage.png" width="100" height="96" alt="Mage" /></td>
                  <td align="center"><span class="header">Warrior</span><br />
                  <img src="../images/campaign/icons/classSymbolWarrior.png" width="100" height="96" alt="Warrior" /></td>
                  <td align="center" class="header">Scout<br>
                  <img src="../images/campaign/icons/classSymbolScout.png" alt="Scout" width="100" height="96" /></td>
                  <td align="center"><span class="header">Healer</span><br>
                  <img src="../images/campaign/icons/classSymbolHealer.png" width="100" height="96" alt="Healer" /></td>
                </tr>
                <tr>
                  <td><select name="ggrp_player1">
                    <option value="No Player" >Choose Player</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_rsGroupMembers['player_handle']?>"><?php echo $row_rsGroupMembers['player_handle']?></option>
                    <?php
} while ($row_rsGroupMembers = mysql_fetch_assoc($rsGroupMembers));
  $rows = mysql_num_rows($rsGroupMembers);
  if($rows > 0) {
      mysql_data_seek($rsGroupMembers, 0);
	  $row_rsGroupMembers = mysql_fetch_assoc($rsGroupMembers);
  }
?>
                  </select></td>
                  <td><select name="ggrp_player2">
                    <option value="No Player" >Choose Player</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_rsGroupMembers['player_handle']?>"><?php echo $row_rsGroupMembers['player_handle']?></option>
                    <?php
} while ($row_rsGroupMembers = mysql_fetch_assoc($rsGroupMembers));
  $rows = mysql_num_rows($rsGroupMembers);
  if($rows > 0) {
      mysql_data_seek($rsGroupMembers, 0);
	  $row_rsGroupMembers = mysql_fetch_assoc($rsGroupMembers);
  }
?>
                  </select></td>
                  <td><select name="ggrp_player3">
                    <option value="No Player" >Choose Player</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_rsGroupMembers['player_handle']?>"><?php echo $row_rsGroupMembers['player_handle']?></option>
                    <?php
} while ($row_rsGroupMembers = mysql_fetch_assoc($rsGroupMembers));
  $rows = mysql_num_rows($rsGroupMembers);
  if($rows > 0) {
      mysql_data_seek($rsGroupMembers, 0);
	  $row_rsGroupMembers = mysql_fetch_assoc($rsGroupMembers);
  }
?>
                  </select></td>
                  <td><select name="ggrp_player4">
                    <option value="No Player" >Choose Player</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_rsGroupMembers['player_handle']?>"><?php echo $row_rsGroupMembers['player_handle']?></option>
                    <?php
} while ($row_rsGroupMembers = mysql_fetch_assoc($rsGroupMembers));
  $rows = mysql_num_rows($rsGroupMembers);
  if($rows > 0) {
      mysql_data_seek($rsGroupMembers, 0);
	  $row_rsGroupMembers = mysql_fetch_assoc($rsGroupMembers);
  }
?>
                  </select></td>
                </tr>
                <tr>
                  <td><select name="ggrp_char1">
                    <option value="No Mage" >Choose Hero</option>
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
                  <td><select name="ggrp_char2">
                    <option value="No Warrior" >Choose Hero</option>
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
                  <td><select name="ggrp_char3">
                    <option value="No Scout" >Choose Hero</option>
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
                  <td><select name="ggrp_char4">
                    <option value="No Healer" >Choose Healer</option>
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
                </tr>
                <tr>
                  <td><select name="ggrp_mage1">
                    <option value="No Class" >Choose Class</option>
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
                  <td><select name="ggrp_warrior2">
                    <option value="No Class" >Choose Class</option>
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
                  <td><select name="ggrp_scout3">
                    <option value="No Class" >Choose Class</option>
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
                  <td><select name="ggrp_healer4">
                    <option value="No Class" >Choose Class</option>
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
              </table>
              <p>&nbsp;</p>
              <table align="center">
                <tr valign="baseline">
                  <td colspan="2" align="center" nowrap="nowrap">Overlord<br>
                  <img src="../images/campaign/heroes/bust/overlordbust.jpg" width="100" height="125" alt="Overlord" /></td>
                </tr>
                <tr valign="baseline">
                  <td colspan="2" align="right" nowrap="nowrap">
                    <select name="ggrp_playerOL">
                      <option value="Overlord" >Choose Overlord Player</option>
                      <?php
do {  
?>
                      <option value="<?php echo $row_rsGroupMembers['player_handle']?>"><?php echo $row_rsGroupMembers['player_handle']?></option>
                      <?php
} while ($row_rsGroupMembers = mysql_fetch_assoc($rsGroupMembers));
  $rows = mysql_num_rows($rsGroupMembers);
  if($rows > 0) {
      mysql_data_seek($rsGroupMembers, 0);
	  $row_rsGroupMembers = mysql_fetch_assoc($rsGroupMembers);
  }
?>
                  </select></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap="nowrap" align="right">&nbsp;</td>
                  <td align="center"><p>&nbsp;
                    </p>
                    <p>
                      <input type="submit" class="pageTitleBlack" value="Confirm Group" />
                  </p></td>
                </tr>
              </table>
              <input type="hidden" name="ggrp_id" value="" />
              <input type="hidden" name="ggrp_name" value="<?php echo $_GET['urlGroupName']; ?>" />
               <input type="hidden" name="ggrp_overlord" value="Overlord" />
              <input type="hidden" name="ggrp_timestamp" value="" />
              <input type="hidden" name="ggrp_dm" value="<?php echo $row_rsPlayerAccess['player_username']; ?>" />
              <input type="hidden" name="ggrp_campaign" value="<?php echo $_GET['urlCampaignID']; ?>" />
              <input type="hidden" name="MM_insert" value="formSelectHeroes" />
            </form>
          <p>&nbsp;</p></td>
        </tr>
      </table>
      <p class="normal"><a href="newplayer.php">+ ADD NEW PLAYER</a></p>
      <p class="header">**EXIT TO MYCAMPAIGNS**</p>
      <p class="normal"><a href="../index.html" target="_top">Home</a> | <a href="../firstedition.html" target="_top">1st Ed.</a> | <a href="../secondedition.php" target="_top">2nd Ed.</a> | <a href="../campaign.php">Campaign</a></p>
      
      <p class="footer"><a href="http://sciscoedesigns.com" target="_blank"><em>hosted by sciscoeDesigns</em></a></p></td>
</tr>
</table>




<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($rsCamList);

mysql_free_result($rsGetMage);

mysql_free_result($rsGetMageClass);

mysql_free_result($rsGetWarriorClass);

mysql_free_result($rsGetScoutClass);

mysql_free_result($rsGetHealerClass);

mysql_free_result($rsGetWarrior);

mysql_free_result($rsGetScout);

mysql_free_result($rsGetHealer);

mysql_free_result($rsPlayerAccess);

mysql_free_result($rsGroupMembers);
?>
