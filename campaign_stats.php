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


// Get the quests
$query_rsAllQuests = sprintf("SELECT * FROM tbquests WHERE quest_expansion_id = %s ORDER BY quest_order ASC", GetSQLValueString(0, "int"));
$rsAllQuests = mysql_query($query_rsAllQuests, $dbDescent) or die(mysql_error());
$row_rsAllQuests = mysql_fetch_assoc($rsAllQuests);
$totalRows_rsAllQuests = mysql_num_rows($rsAllQuests);

$statsArray = array();
do {

  // Get the quests
  $query_rsEachQuest = sprintf("SELECT * FROM tbquests_progress WHERE progress_quest_id = %s", GetSQLValueString($row_rsAllQuests['quest_id'], "int"));
  $rsEachQuest = mysql_query($query_rsEachQuest, $dbDescent) or die(mysql_error());
  $row_rsEachQuest = mysql_fetch_assoc($rsEachQuest);
  $totalRows_rsEachQuest = mysql_num_rows($rsEachQuest);

  $statsArray[$row_rsAllQuests['quest_id']] = array(
    "quest_name" => $row_rsAllQuests['quest_name'],
    "hero_wins" => 0,
    "overlord_wins" => 0,
  );

  do {
    if ($row_rsEachQuest['progress_quest_winner'] == "Heroes Win"){
      $statsArray[$row_rsAllQuests['quest_id']]['hero_wins'] += 1;
    }
    if ($row_rsEachQuest['progress_quest_winner'] == "Overlord Wins"){
      $statsArray[$row_rsAllQuests['quest_id']]['overlord_wins'] += 1;
    }
    
    
  } while ($row_rsEachQuest = mysql_fetch_assoc($rsEachQuest));

} while ($row_rsAllQuests = mysql_fetch_assoc($rsAllQuests));


?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="content.css">
    <title>Descent 2nd Edition Campaign Tracker</title>
  </head>
  <body>
    <div id="wrapper">
      <div class="quest-stats">
        <?php
          foreach ($statsArray as $sa){

            if (($sa['hero_wins'] + $sa['overlord_wins']) > 0){
              $total = $sa['overlord_wins'] + $sa['hero_wins'];

              if ($sa['overlord_wins'] != 0){
                $OverlordPerc = ($sa['overlord_wins'] / $total) * 100;
                $olText = '<span class="statsbar-text">Overlord: ' . $sa['overlord_wins'] . '</span>';

              } 
              if ($sa['hero_wins'] != 0){
                $HeroPerc = ($sa['hero_wins'] / $total) * 100;
                $hText = '<span class="statsbar-text">Heroes: ' . $sa['hero_wins'] . '</span>';
              } 

              if ($sa['hero_wins'] == 0){
                $HeroPerc = 5;
                $OverlordPerc -= 5;
                $hText = '<span class="statsbar-text">' . $sa['hero_wins'] . '</span>';
              }

              if ($sa['overlord_wins'] == 0){
                $OverlordPerc = 5;
                $HeroPerc -= 5;
                $olText = '<span class="statsbar-text">' . $sa['overlord_wins'] . '</span>';
              }
              
              echo '<h2>' . $sa['quest_name'] . '</h2>';
              echo '<div class="clearfix"><div class="statsbar-left" style="width: ' . $HeroPerc . '%;">' . $hText . '</div>' . '<div class="statsbar-right" style="width: ' . $OverlordPerc . '%;">' . $olText . '</div></div>';
            }
          }
        ?>
      </div>
    </div>
  </body>
</html>

<?php
/*
echo '<pre>';
var_dump($statsArray);
echo '</pre>';
*/

?>