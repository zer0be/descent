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

//select the database
mysql_select_db($database_dbDescent, $dbDescent);

//Select heroes based on occurence
$query_rsTopHeroes = sprintf("SELECT hero_name, char_hero,COUNT(*) as count FROM tbcharacters INNER JOIN tbheroes ON char_hero = hero_id GROUP BY char_hero ORDER BY count DESC");
$rsTopHeroes = mysql_query($query_rsTopHeroes, $dbDescent) or die(mysql_error());
$row_rsTopHeroes = mysql_fetch_assoc($rsTopHeroes);
$totalRows_rsTopHeroes = mysql_num_rows($rsTopHeroes);

echo '<h2>Most Selected Heroes</h2>';
do {

  echo $row_rsTopHeroes['hero_name'] . ' - ' . $row_rsTopHeroes['count'] . '<br />';

} while ($row_rsTopHeroes = mysql_fetch_assoc($rsTopHeroes));

?>