
<?php




mysql_select_db($database_dbDescent, $dbDescent);
$query_rsCreateGroup = "SELECT * FROM tbgaminggroup";
$rsCreateGroup = mysql_query($query_rsCreateGroup, $dbDescent) or die(mysql_error());
$row_rsCreateGroup = mysql_fetch_assoc($rsCreateGroup);
$totalRows_rsCreateGroup = mysql_num_rows($rsCreateGroup);

$query_rsCamList = "SELECT cam_name, expansion, cam_logo, cam_icon FROM tbcampaign ORDER BY cam_name ASC";
$rsCamList = mysql_query($query_rsCamList, $dbDescent) or die(mysql_error());
$row_rsCamList = mysql_fetch_assoc($rsCamList);
$totalRows_rsCamList = mysql_num_rows($rsCamList);

$colname_rsPlayerAccess = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsPlayerAccess = $_SESSION['MM_Username'];
}

$query_rsPlayerAccess = sprintf("SELECT player_username FROM tbplayerlist WHERE player_handle = %s", GetSQLValueString($colname_rsPlayerAccess, "text"));
$rsPlayerAccess = mysql_query($query_rsPlayerAccess, $dbDescent) or die(mysql_error());
$row_rsPlayerAccess = mysql_fetch_assoc($rsPlayerAccess);
$totalRows_rsPlayerAccess = mysql_num_rows($rsPlayerAccess);
?>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="450" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800" align=" align="center"" valign="top" class="background"center> <p class="normal"><a href="../index.html" target="_top"><img src="../images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>
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
