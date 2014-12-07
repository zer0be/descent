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
$MM_authorizedUsers = "admin";
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tbquests_progress (progress_id, progress_timestamp, progress_game_id, progress_ggrp_name, progress_quest_name, progress_quest_name_win, progress_enc1_winner) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['progress_id'], "int"),
                       GetSQLValueString($_POST['progress_timestamp'], "date"),
                       GetSQLValueString($_POST['progress_game_id'], "int"),
                       GetSQLValueString($_POST['progress_ggrp_name'], "text"),
                       GetSQLValueString($_POST['progress_quest_name'], "text"),
                       GetSQLValueString($_POST['progress_quest_name_win'], "text"),
                       GetSQLValueString($_POST['progress_enc1_winner'], "text"));

  mysql_select_db($database_dbDescent, $dbDescent);
  $Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());

  $insertGoTo = "mycampaigndetail.php?urlGamingID=" . $row_rsSelectedCampaign['ggrp_id'] . "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_rsPlayerList = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsPlayerList = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPlayerList = sprintf("SELECT player_handle FROM tbplayerlist WHERE player_handle = %s", GetSQLValueString($colname_rsPlayerList, "text"));
$rsPlayerList = mysql_query($query_rsPlayerList, $dbDescent) or die(mysql_error());
$row_rsPlayerList = mysql_fetch_assoc($rsPlayerList);
$totalRows_rsPlayerList = mysql_num_rows($rsPlayerList);

$colname_rsSelectedCampaign = "-1";
if (isset($_GET['urlGamingID'])) {
  $colname_rsSelectedCampaign = $_GET['urlGamingID'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsSelectedCampaign = sprintf("SELECT * FROM tbgaminggroup WHERE ggrp_id = %s", GetSQLValueString($colname_rsSelectedCampaign, "int"));
$rsSelectedCampaign = mysql_query($query_rsSelectedCampaign, $dbDescent) or die(mysql_error());
$row_rsSelectedCampaign = mysql_fetch_assoc($rsSelectedCampaign);
$totalRows_rsSelectedCampaign = mysql_num_rows($rsSelectedCampaign);


//Session Values
$_SESSION['expansion'] = $row_rsSelectedCampaign['ggrp_campaign'];


$colname_rsDungeonList = "-1";
if (isset($row_rsSelectedCampaign['ggrp_campaign'])) {
  $colname_rsDungeonList = $row_rsSelectedCampaign['ggrp_campaign'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsDungeonList = sprintf("SELECT quest_name FROM tbquests WHERE quest_expansion_id = %s ORDER BY quest_order ASC", GetSQLValueString($colname_rsDungeonList, "text"));
$rsDungeonList = mysql_query($query_rsDungeonList, $dbDescent) or die(mysql_error());
$row_rsDungeonList = mysql_fetch_assoc($rsDungeonList);
$totalRows_rsDungeonList = mysql_num_rows($rsDungeonList);
?>


<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<table width="400" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800" align=" align="center"" valign="top" class="background"center> <p><a href="../index.html" target="_top"><img src="../images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>
    <a href="<?php echo $logoutAction ?>"><span class="normal">Logout</span></a><span class="normal">, <?php echo $row_rsPlayerList['player_handle']; ?></span></p>
      
<table width="385" border="0" cellspacing="0" cellpadding="15">
        <tr>
          <td align="center" class="header">
          
          
         <p><?php echo $row_rsSelectedCampaign['ggrp_campaign']; ?>
         <br>
         <?php echo $row_rsSelectedCampaign['ggrp_name']; ?></p>
         
         <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
           <table align="center">
             <tr valign="baseline">
               <td nowrap="nowrap" align="right">&nbsp;</td>
               <td><select name="progress_quest_name">
                 <option value="">Completed Dungeon</option>
                 <?php
do {  
?>
                 <option value="<?php echo $row_rsDungeonList['quest_name']?>"><?php echo $row_rsDungeonList['quest_name']?></option>
                 <?php
} while ($row_rsDungeonList = mysql_fetch_assoc($rsDungeonList));
  $rows = mysql_num_rows($rsDungeonList);
  if($rows > 0) {
      mysql_data_seek($rsDungeonList, 0);
	  $row_rsDungeonList = mysql_fetch_assoc($rsDungeonList);
  }
?>
               </select></td>
             </tr>
             <tr valign="baseline">
               <td nowrap="nowrap" align="right">Winner of the Quest:</td>
               <td><select name="progress_quest_name_win">
<option value="No Winner">none</option>
<option value="Heroes Win">Heroes Win</option>
<option value="Overlord Wins">Overlord Wins</option>
               </select></td>
             </tr>
             <tr valign="baseline">
               <td nowrap="nowrap" align="right">Encounter 1 Victor:</td>
               <td><select name="progress_enc1_winner">
                 <option value="No Winner">none</option>
                 <option value="Heroes Win">Heroes Win</option>
                 <option value="Overlord Wins">Overlord Wins</option>
               </select></td>
             </tr>
             <tr valign="baseline">
               <td colspan="2" align="center" nowrap="nowrap"><input type="submit" value="Complete Dungeon" /></td>
               </tr>
           </table>
           <input type="hidden" name="progress_id" value="" />
           <input type="hidden" name="progress_timestamp" value="" />
           <input type="hidden" name="progress_game_id" value="<?php echo $row_rsSelectedCampaign['ggrp_id']; ?>" />
           <input type="hidden" name="progress_ggrp_name" value="<?php echo $row_rsSelectedCampaign['ggrp_name']; ?>" />
           <input type="hidden" name="MM_insert" value="form1" />
         </form>
         </td>
        </tr>
      </table>
</tr>
</table>




<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($rsPlayerList);

mysql_free_result($rsSelectedCampaign);

mysql_free_result($rsDungeonList);
?>
