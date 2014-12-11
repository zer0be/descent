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

$query_rsGroups = sprintf("SELECT * FROM tbgroup WHERE grp_startedby = %s ORDER BY grp_name ASC ", GetSQLValueString($username, "text"));
$rsGroups = mysql_query($query_rsGroups, $dbDescent) or die(mysql_error());
$row_rsGroups = mysql_fetch_assoc($rsGroups);
$totalRows_rsGroups = mysql_num_rows($rsGroups);

$selectOptions = array();
$checboxOptions = array();
$groupOptions = array();

do {

  if($row_rsCampaigns['cam_type'] == "full" || $row_rsCampaigns['cam_type'] == "mini"){
    $selectOptions[] = '<option value="' . $row_rsCampaigns['cam_id'] . '">' . $row_rsCampaigns['cam_name'] . '</option>';
  }

  $checboxOptions[] = '<input type="checkbox" name="option1" value="' . $row_rsCampaigns['cam_id'] . '"> ' . $row_rsCampaigns['cam_name'] . '<br />';

} while ($row_rsCampaigns = mysql_fetch_assoc($rsCampaigns));

do {

  $groupOptions[] = '<option value="' . $row_rsGroups['grp_id'] . '"> ' . $row_rsGroups['grp_name'] . '<br />';

} while ($row_rsGroups = mysql_fetch_assoc($rsGroups));

// POST
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "new_game-form")) {

  $insertSQL = sprintf("INSERT INTO tbgames (game_grp_id, game_dm, game_camp_id) VALUES (%s, %s, %s)",
                          GetSQLValueString($_POST['group_id'], "int"),
                          GetSQLValueString($username, "text"),
                          GetSQLValueString($_POST['campaign_id'], "int"));


  $Result = mysql_query($insertSQL, $dbDescent) or die(mysql_error());
  $ResultID = mysql_insert_id();

  $query_rsIntroduction = sprintf("SELECT * FROM tbquests WHERE quest_act = %s AND quest_expansion_id = %s",
                          GetSQLValueString("Introduction", "text"),
                          GetSQLValueString($_POST['campaign_id'], "int"));
  $rsIntroduction = mysql_query($query_rsIntroduction, $dbDescent) or die(mysql_error());
  $row_rsIntroduction = mysql_fetch_assoc($rsIntroduction);
  $totalRows_rsIntroduction = mysql_num_rows($rsIntroduction);

  $insertSQL2 = sprintf("INSERT INTO tbquests_progress (progress_game_id, progress_quest_id) VALUES (%s, %s)",
                          GetSQLValueString($ResultID, "int"),
                          GetSQLValueString($row_rsIntroduction['quest_id'], "int"));


  $Result2 = mysql_query($insertSQL2, $dbDescent) or die(mysql_error());

  $insertGoTo = "create.php?urlGamingID=" . $ResultID ."&urlGrpID=" . $_POST['group_id'];
    header(sprintf("Location: %s", $insertGoTo));
}
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../content.css">
  </head>
<body>

  <form action="create.php" method="post" name="start-quest-form" id="new_game-form">
    <div>Select Main Campaign</div>
    <select name="campaign_id">

      <?php foreach($selectOptions as $so) {
        echo $so;
      } ?>

    </select>
    <div>Select Expansions</div>

    <?php foreach($checboxOptions as $co) {
      echo $co;
    } ?>

    <select name="group_id">

      <?php foreach($groupOptions as $go) {
        echo $go;
      } ?>

    </select>

    <input type="submit" value="Select" />
    <input type="hidden" name="MM_insert" value="new_game-form" />
    
    
    

  </form>

</body>
</html>
