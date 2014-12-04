<?php 

//-----------------------//
//remove me after include//
//-----------------------//

//include the db
require_once('Connections/dbDescent.php'); 

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

//include functions
include 'includes/function_logout.php';
include 'includes/function_getSQLValueString.php';

?>

<?php

$colname_rsGetCampaigns = "-1";
if (isset($_GET['urlGgrp'])) {
  $colname_rsGetCampaigns = $_GET['urlGgrp'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGetCampaigns = sprintf("SELECT * FROM tbgaminggroup WHERE ggrp_name = %s ORDER BY ggrp_timestamp DESC", GetSQLValueString($colname_rsGetCampaigns, "text"));
$rsGetCampaigns = mysql_query($query_rsGetCampaigns, $dbDescent) or die(mysql_error());
$row_rsGetCampaigns = mysql_fetch_assoc($rsGetCampaigns);
$totalRows_rsGetCampaigns = mysql_num_rows($rsGetCampaigns);

$colname_rsGroupDetails = "-1";
if (isset($_GET['urlGgrp'])) {
  $colname_rsGroupDetails = $_GET['urlGgrp'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGroupDetails = sprintf("SELECT grp_name, grp_creation, grp_startedby, grp_state_country, grp_city FROM tbgroup WHERE grp_name = %s", GetSQLValueString($colname_rsGroupDetails, "text"));
$rsGroupDetails = mysql_query($query_rsGroupDetails, $dbDescent) or die(mysql_error());
$row_rsGroupDetails = mysql_fetch_assoc($rsGroupDetails);
$totalRows_rsGroupDetails = mysql_num_rows($rsGroupDetails);

$colname_rsPlayerAccess = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsPlayerAccess = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPlayerAccess = sprintf("SELECT player_handle FROM tbplayerlist WHERE player_handle = %s", GetSQLValueString($colname_rsPlayerAccess, "text"));
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

<table width="450" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800" align=" align="center"" valign="top" class="background"> <p><a href="index.html" target="_top"><img src="images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>
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


<?php
mysql_free_result($rsGetCampaigns);

mysql_free_result($rsGroupDetails);

mysql_free_result($rsPlayerAccess);
?>
