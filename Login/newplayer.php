<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formAddPlayer")) {
  $insertSQL = sprintf("INSERT INTO tbplayerlist (player_id, player_handle, player_timestamp, created_by) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['player_id'], "int"),
                       GetSQLValueString($_POST['player_handle'], "text"),
                       GetSQLValueString($_POST['player_timestamp'], "date"),
                       GetSQLValueString($_POST['created_by'], "text"));

  mysql_select_db($database_dbDescent, $dbDescent);
  $Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());
}

$colname_rsPlayerList = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsPlayerList = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsPlayerList = sprintf("SELECT player_username FROM tbplayerlist WHERE player_username = %s", GetSQLValueString($colname_rsPlayerList, "text"));
$rsPlayerList = mysql_query($query_rsPlayerList, $dbDescent) or die(mysql_error());
$row_rsPlayerList = mysql_fetch_assoc($rsPlayerList);
$totalRows_rsPlayerList = mysql_num_rows($rsPlayerList);

$colname_rsCurrentMembers = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsCurrentMembers = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbDescent, $dbDescent);
$query_rsCurrentMembers = sprintf("SELECT player_handle FROM tbplayerlist WHERE created_by = %s ORDER BY player_handle ASC", GetSQLValueString($colname_rsCurrentMembers, "text"));
$rsCurrentMembers = mysql_query($query_rsCurrentMembers, $dbDescent) or die(mysql_error());
$row_rsCurrentMembers = mysql_fetch_assoc($rsCurrentMembers);
$totalRows_rsCurrentMembers = mysql_num_rows($rsCurrentMembers);
?>


<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<table width="400" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800" align=" align="center"" valign="top" class="background"center> <p><a href="../index.html" target="_top"><img src="../images/campaigntrackerlogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a>
    <br>
    <table width="300" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="mycampaigns.php"><?php echo $row_rsPlayerList['player_username']; ?>, My Campaigns</a></td>
    <td><a href="<?php echo $logoutAction ?>"><span class="normal">Logout</span></a></td>
  </tr>
</table>

 <p class="pageTitle">Create a new player for your group.</p>  
      
<table width="300" border="0" cellpadding="15" cellspacing="0" class="blackTable">
        <tr>
          <td align="center" class="header">
            
            <form action="<?php echo $editFormAction; ?>" method="post" name="formAddPlayer" id="formAddPlayer">
              <table align="center">
                <tr valign="baseline">
                  <td align="left" nowrap="nowrap">Player Name/Handle:<br>
                  <input type="text" name="player_handle" value="" size="32" /></td>
                </tr>
                <tr valign="baseline">
                  <td align="center" nowrap="nowrap"><input type="submit" value="Create Player" /></td>
                </tr>
              </table>
              <input type="hidden" name="player_id" value="" />
              <input type="hidden" name="player_timestamp" value="" />
              <input type="hidden" name="created_by" value="<?php echo $row_rsPlayerList['player_username']; ?>" />
              <input type="hidden" name="MM_insert" value="formAddPlayer" />
            </form>
            
           
            </td>
        </tr>
      </table>
      
      <p class="pageTitle">Current Group Members</p>
      
      <table border="0" align="center" cellpadding="5" cellspacing="5" class="purpleTable">
              <?php do { ?>
                <tr>
                  <td width="200" align="center" class="header"><?php echo $row_rsCurrentMembers['player_handle']; ?></td>
                </tr>
                <?php } while ($row_rsCurrentMembers = mysql_fetch_assoc($rsCurrentMembers)); ?>
      </table>
</tr>
</table>




<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($rsPlayerList);

mysql_free_result($rsCurrentMembers);
?>
