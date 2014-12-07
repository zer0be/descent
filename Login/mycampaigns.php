<?php

$colname_rsPlayerList = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsPlayerList = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPlayerList = sprintf("SELECT player_username FROM tbplayerlist WHERE player_username = %s", GetSQLValueString($colname_rsPlayerList, "text"));
$rsPlayerList = mysql_query($query_rsPlayerList, $dbDescent) or die(mysql_error());
$row_rsPlayerList = mysql_fetch_assoc($rsPlayerList);
$totalRows_rsPlayerList = mysql_num_rows($rsPlayerList);

$maxRows_rsGETcampaignList = 10;
$pageNum_rsGETcampaignList = 0;
if (isset($_GET['pageNum_rsGETcampaignList'])) {
  $pageNum_rsGETcampaignList = $_GET['pageNum_rsGETcampaignList'];
}
$startRow_rsGETcampaignList = $pageNum_rsGETcampaignList * $maxRows_rsGETcampaignList;

$colname_rsGETcampaignList = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsGETcampaignList = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGETcampaignList = sprintf("SELECT * FROM tbgames WHERE game_dm = %s ORDER BY game_timestamp DESC", GetSQLValueString($colname_rsGETcampaignList, "text"));
$query_limit_rsGETcampaignList = sprintf("%s LIMIT %d, %d", $query_rsGETcampaignList, $startRow_rsGETcampaignList, $maxRows_rsGETcampaignList);
$rsGETcampaignList = mysql_query($query_limit_rsGETcampaignList, $dbDescent) or die(mysql_error());
$row_rsGETcampaignList = mysql_fetch_assoc($rsGETcampaignList);

if (isset($_GET['totalRows_rsGETcampaignList'])) {
  $totalRows_rsGETcampaignList = $_GET['totalRows_rsGETcampaignList'];
} else {
  $all_rsGETcampaignList = mysql_query($query_rsGETcampaignList);
  $totalRows_rsGETcampaignList = mysql_num_rows($all_rsGETcampaignList);
}
$totalPages_rsGETcampaignList = ceil($totalRows_rsGETcampaignList/$maxRows_rsGETcampaignList)-1;

$bust_rsGETbust1 = "-1";
if (isset($row_rsGETcampaignList['ggrp_char1'])) {
  $bust_rsGETbust1 = $row_rsGETcampaignList['ggrp_char1'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGETbust1 = sprintf("SELECT hero_img FROM tbheroes WHERE hero_name = %s", GetSQLValueString($bust_rsGETbust1, "text"));
$rsGETbust1 = mysql_query($query_rsGETbust1, $dbDescent) or die(mysql_error());
$row_rsGETbust1 = mysql_fetch_assoc($rsGETbust1);
$totalRows_rsGETbust1 = mysql_num_rows($rsGETbust1);

$colname_rsGroupPlayers = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsGroupPlayers = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGroupPlayers = sprintf("SELECT player_handle FROM tbplayerlist WHERE created_by = %s", GetSQLValueString($colname_rsGroupPlayers, "text"));
$rsGroupPlayers = mysql_query($query_rsGroupPlayers, $dbDescent) or die(mysql_error());
$row_rsGroupPlayers = mysql_fetch_assoc($rsGroupPlayers);
$totalRows_rsGroupPlayers = mysql_num_rows($rsGroupPlayers);

$colname_rsGroupNames = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsGroupNames = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsGroupNames = sprintf("SELECT grp_name FROM tbgroup WHERE grp_startedby = %s", GetSQLValueString($colname_rsGroupNames, "text"));
$rsGroupNames = mysql_query($query_rsGroupNames, $dbDescent) or die(mysql_error());
$row_rsGroupNames = mysql_fetch_assoc($rsGroupNames);
$totalRows_rsGroupNames = mysql_num_rows($rsGroupNames);
?>


<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="400" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800" align=" align="center"" valign="top" class="background"center> <p><a href="../index.html" target="_top"><img src="../images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>
    <br>
    <a href="<?php echo $logoutAction ?>"><span class="normal">Logout</span></a><span class="normal">, <?php echo $row_rsPlayerList['player_username']; ?></span></p>
      <p>
      <table width="700" border="0" cellspacing="0" cellpadding="15">
        <tr>
          <td width="350" align="center" valign="top" class="header">
          
          <table width="250" border="0" cellpadding="0" cellspacing="0" class="purpleTable">
            <tr>
              <td nowrap="nowrap"> <p><a href="newplayer.php">+ 1. Add New Players to your Group</a></p>
          
          <p><a href="newgroup.php">+ 2. Create a New Gaming Group</a></p>
          
            <p><a href="newcampaign.php">+ Create New Campaign for your Group</a></p>
            <p><a href="changepw.php">+ Update Password</a></p></td>
            </tr>
          </table>
         </td>
          <td align="center" valign="top" class="header">
            Groups:<br><br>
            <table align="center" cellpadding="4" cellspacing="5" class="purpleTable">
              <?php do { ?>
                <tr>
                  <td class="normal">
				  <?php echo $row_rsGroupNames['grp_name']; ?></td>
                </tr>
                <?php } while ($row_rsGroupNames = mysql_fetch_assoc($rsGroupNames)); ?>
          </table></td>
          <td rowspan="2" align="center" valign="top" class="header">Players:<br><br>
          
            <table align="center" cellpadding="4" cellspacing="5" class="goldTable">
              <?php do { ?>
                <tr>
                  <td class="normal"><?php echo $row_rsGroupPlayers['player_handle']; ?></td>
                </tr>
                <?php } while ($row_rsGroupPlayers = mysql_fetch_assoc($rsGroupPlayers)); ?>
          </table></td>
        </tr>
        <tr>
          <td colspan="2" align="center" valign="top" class="header"><table cellpadding="5" cellspacing="0">
        <?php do { ?>
          <tr>
            <td rowspan="2" bgcolor="#333333" class="pageTitle"><a href="../campaign_overview.php?urlGamingID=<?php echo $row_rsGETcampaignList['ggrp_id']; ?>">+</a></td>
            <td colspan="2" bgcolor="#333333"><span class="header"><?php echo $row_rsGETcampaignList['ggrp_name']; ?></span></td>
            <td colspan="2" bgcolor="#333333"><span class="header"><?php echo $row_rsGETcampaignList['ggrp_campaign']; ?></span></td>
            <td bgcolor="#333333"><span class="normal"><?php echo $row_rsGETcampaignList['ggrp_timestamp']; ?></span></td>
          </tr>
          <tr>
            <td nowrap="nowrap" bgcolor="#9900CC"><span class="normal">Player Mage: <?php echo $row_rsGETcampaignList['ggrp_player1']; ?></span>
            <br>
            <span class="normal"><?php echo $row_rsGETcampaignList['ggrp_char1']; ?></span>
            <br>
            <span class="normal"><?php echo $row_rsGETcampaignList['ggrp_mage1']; ?></span>
           </td>
            <td nowrap="nowrap" bgcolor="#333333"><span class="normal">Player Warrior: <?php echo $row_rsGETcampaignList['ggrp_player2']; ?></span>
            <br>
            <span class="normal"><?php echo $row_rsGETcampaignList['ggrp_char2']; ?></span>
            <br><span class="normal"><?php echo $row_rsGETcampaignList['ggrp_warrior2']; ?></span></td>
            <td nowrap="nowrap" bgcolor="#9900CC"><span class="normal">Player Scout: <?php echo $row_rsGETcampaignList['ggrp_player3']; ?></span>
            <br><span class="normal"><?php echo $row_rsGETcampaignList['ggrp_char3']; ?></span>
            <br><span class="normal"><?php echo $row_rsGETcampaignList['ggrp_scout3']; ?></span></td>
            <td nowrap="nowrap" bgcolor="#333333"><span class="normal">Player Healer: <?php echo $row_rsGETcampaignList['ggrp_player4']; ?></span>
            <br><span class="normal"><?php echo $row_rsGETcampaignList['ggrp_char4']; ?></span>
            <br><span class="normal"><?php echo $row_rsGETcampaignList['ggrp_healer4']; ?></span></td>
            <td nowrap="nowrap" bgcolor="#9900CC"><span class="normal">Player Overord: <?php echo $row_rsGETcampaignList['ggrp_playerOL']; ?></span>
            <br><span class="normal"><?php echo $row_rsGETcampaignList['ggrp_overlord']; ?></span></td>
          </tr>
          <tr>
            <td colspan="6" bgcolor="#333333">&nbsp;</td>
          </tr>
          <?php } while ($row_rsGETcampaignList = mysql_fetch_assoc($rsGETcampaignList)); ?>
      </table></td>
        </tr>
      </table>
      </p>   
     </td>
</tr>
</table>




<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($rsPlayerList);

mysql_free_result($rsGETcampaignList);

mysql_free_result($rsGETbust1);

mysql_free_result($rsGroupPlayers);

mysql_free_result($rsGroupNames);
?>
