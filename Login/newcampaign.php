<?php
  //-----------------------//
  //remove me after include//
  //-----------------------//

  //include the db
  require_once('../Connections/dbDescent.php'); 

  //initialize the session
  if (!isset($_SESSION)) {
    session_start();
  }

  //include functions
  include '../includes/function_logout.php';
  include '../includes/function_getSQLValueString.php';



?>
<?php

mysql_select_db($database_dbDescent, $dbDescent);
/*
$query_rsCreateGroup = "SELECT * FROM tbgaminggroup";
$rsCreateGroup = mysql_query($query_rsCreateGroup, $dbDescent) or die(mysql_error());
$row_rsCreateGroup = mysql_fetch_assoc($rsCreateGroup);
$totalRows_rsCreateGroup = mysql_num_rows($rsCreateGroup);
*/

$query_rsCampaigns = "SELECT * FROM tbcampaign ORDER BY cam_type ASC";
$rsCampaigns = mysql_query($query_rsCampaigns, $dbDescent) or die(mysql_error());
$row_rsCampaigns = mysql_fetch_assoc($rsCampaigns);
$totalRows_rsCampaigns = mysql_num_rows($rsCampaigns);

$colname_rsPlayerAccess = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsPlayerAccess = $_SESSION['MM_Username'];
}

$query_rsPlayerAccess = sprintf("SELECT player_username FROM tbplayerlist WHERE player_handle = %s", GetSQLValueString($colname_rsPlayerAccess, "text"));
$rsPlayerAccess = mysql_query($query_rsPlayerAccess, $dbDescent) or die(mysql_error());
$row_rsPlayerAccess = mysql_fetch_assoc($rsPlayerAccess);
$totalRows_rsPlayerAccess = mysql_num_rows($rsPlayerAccess);


$selectOptions = array();
$checboxOptions = array();

do {

  if($row_rsCampaigns['cam_type'] == "full" || $row_rsCampaigns['cam_type'] == "mini"){
    $selectOptions[] = '<option value="' . $row_rsCampaigns['cam_id'] . '">' . $row_rsCampaigns['cam_name'] . '</option>';
  }

  $checboxOptions[] = '<input type="checkbox" name="option1" value="' . $row_rsCampaigns['cam_id'] . '"> ' . $row_rsCampaigns['cam_name'] . '<br />';

} while ($row_rsCampaigns = mysql_fetch_assoc($rsCampaigns));


?>


<body>

  <form action="<?php echo $editFormAction; ?>" method="post" name="start-quest-form" id="new_campaign-form">
    <div>Select Main Campaign</div>
    <select name="progress_quest_id">

      <?php foreach($selectOptions as $so) {
        echo $so;
      } ?>

    </select>
    <div>Select Expansions</div>

    <?php foreach($checboxOptions as $co) {
      echo $co;
    } ?>

    <input type="submit" value="Select" />

    <input type="hidden" name="progress_timestamp" value="" />
    <input type="hidden" name="MM_insert" value="new_campaign-form" />
    
    
    

  </form>













      <table width="385" border="0" cellpadding="15" cellspacing="0" class="purpleTable">
        <tr>
          <td align="center" class="header">
            <table border="0" cellpadding="0" cellspacing="5">
              <?php do { ?>
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


</body>
</html>
<?php
mysql_free_result($rsCreateGroup);

mysql_free_result($rsCamList);

mysql_free_result($rsPlayerAccess);
?>
