
<?php

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

echo '<pre>';
var_dump($row_rsGetCampaigns);
echo '</pre>';
echo '<pre>';
var_dump($row_rsGroupDetails);
echo '</pre>';
echo '<pre>';
var_dump($row_rsPlayerAccess);
echo '</pre>';

?>


<div>

</div>

<table cellpadding="5" cellspacing="5" class="blackTable">
  <?php do { ?>
  <tr>
    <td colspan="5" align="center" class="header"><span class="pageTitle"><a href="campaigndetail.php?urlGamingID=<?php echo $row_rsGetCampaigns['ggrp_id']; ?>">+</a></span><a href="campaign_overview.php?urlGamingID=<?php echo $row_rsGetCampaigns['ggrp_id']; ?>"> <?php echo $row_rsGetCampaigns['ggrp_campaign']; ?></a> <span class="normal"><?php echo $row_rsGetCampaigns['ggrp_timestamp']; ?></span></td>
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
    <?php } while ($row_rsGetCampaigns = mysql_fetch_assoc($rsGetCampaigns)); ?>
</table>