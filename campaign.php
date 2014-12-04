<?php

$currentPage = $_SERVER["PHP_SELF"];

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsCampaignList = "SELECT cam_id, cam_name, expansion, cam_logo, cam_icon FROM tbcampaign ORDER BY cam_id ASC";
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
$query_rsSelectGroup = "SELECT grp_name, grp_creation, grp_state_country, grp_city FROM tbgroup ORDER BY grp_name ASC";
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
$query_rsPlayerAccess = sprintf("SELECT player_handle FROM tbplayerList WHERE player_handle = %s", GetSQLValueString($colname_rsPlayerAccess, "text"));
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

<table>
  <tr>
    <td>
      <a href="index.html" target="_top"><img src="images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>  
      <table width="400" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><a href="Login/login.php">Login,</a> <a href="Login/mycampaigns.php"> <?php echo $row_rsPlayerAccess['player_handle']; ?> My Campaigns</a></td>
          <td align="right" class="normal"><a href="<?php echo $logoutAction ?>">Logout</a></td>
        </tr>
      </table>
      <table width="400" border="0" cellspacing="0" cellpadding="15">
        <tr>
          <td align="center" class="header">Browse Campaigns
            <table cellpadding="5" cellspacing="5">
              <?php do { ?>
                <tr>
                  <td align="right" class="header">
                    <a href="campaignmap.php?urlCamID=<?php echo $row_rsCampaignList['cam_id']; ?>" target="_self"><img src="images/logos/<?php echo $row_rsCampaignList['cam_logo']; ?>" height="35" border="0" /></a>
  				          <?php echo $row_rsCampaignList['expansion']; ?>
                  </td>
                  <td align="left" class="normal">
                    <img src="images/logos/<?php echo $row_rsCampaignList['cam_icon']; ?>" width="25" />
                  </td>
                </tr>
              <?php } while ($row_rsCampaignList = mysql_fetch_assoc($rsCampaignList)); ?>
            </table>

            <p>Search For a Gaming Group</p>
            <table>
              <tr>
                <td>Gaming Group Name</td>
                <td>State / Country</td>
                <td>City</td>
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
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<?php
mysql_free_result($rsCampaignList);

mysql_free_result($rsSelectGroup);

mysql_free_result($rsPlayerAccess);
?>
