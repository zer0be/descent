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

	// include the campaign data 
	include 'campaign_data.php';

?>

<?php

// ------------------ //
// -- Search Cards -- //
// ------------------ //

// Select the search cards
$query_rsSearchData = sprintf("SELECT * FROM tbsearch WHERE search_exp_id IN ($selExpansions) ORDER BY search_name ASC");
$rsSearchData = mysql_query($query_rsSearchData, $dbDescent) or die(mysql_error());
$row_rsSearchData = mysql_fetch_assoc($rsSearchData);
$totalRows_rsSearchData = mysql_num_rows($rsSearchData);

// create array with select options
	$searchCards = array();
	do {

		// convert name to short string, to use as an id for the checkbox so we can target the treasurechest one with jquery
		$short = $row_rsSearchData['search_name'];
	  $short = strtolower($short);
	  $short = str_replace(" ","-",$short);
	  $short = preg_replace("/[^A-Za-z0-9_]/","",$short);
		//$searchCards[] = '<option value="' . $row_rsSearchData['search_id'] . '">' . $row_rsSearchData['search_name'] . ' - ' . $row_rsSearchData['search_value'] . ' Gold</option>';
		for($ia = 0; $ia < $row_rsSearchData['search_amount']; $ia++ ){
			$searchCards[] = '<div class="list-checkbox"><input type="checkbox" id="' . $short . '" name="search_id[]" value="' . $row_rsSearchData['search_value'] . '"><div>' . $row_rsSearchData['search_name'] . '<br /><span class="search-gold">' . $row_rsSearchData['search_value'] . ' Gold</span></div></div>';
		}
	} while ($row_rsSearchData = mysql_fetch_assoc($rsSearchData));


// Select Gold
/*
	$query_rsGold = sprintf("SELECT game_gold FROM tbgames WHERE game_id = %s",GetSQLValueString($gameID, "int"));
	$rsGold = mysql_query($query_rsGold, $dbDescent) or die(mysql_error());
	$row_rsGold = mysql_fetch_assoc($rsGold);
	$totalRows_rsGold = mysql_num_rows($rsGold);
*/

// ------------------- //
// -- Quest Details -- //
// ------------------- //


// Save Quest Details

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

// Update progress table
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "quest-details-form")) {
  $insertSQL = sprintf("UPDATE tbquests_progress SET progress_quest_winner = %s, progress_enc1_winner = %s, progress_relic_char = %s WHERE progress_quest_id = %s AND progress_game_id = %s",
                       GetSQLValueString($_POST['progress_quest_winner'], "text"),
                       GetSQLValueString($_POST['progress_enc1_winner'], "text"),
                       GetSQLValueString($_POST['progress_relic_recipiant'], "int"),
                       GetSQLValueString($_POST['progress_quest_id'], "int"),
                       GetSQLValueString($_POST['progress_game_id'], "int"));

	// Add a new entry to the items_aquired table, so the relic is added to the inventory of the selected player
  if (isset($_POST['progress_relic_recipiant'])){
	  $insertSQL2 = sprintf("INSERT INTO tbitems_aquired (aq_relic_id, aq_progress_id, aq_char_id, aq_game_id) VALUES (%s, %s, %s, %s)",
	                       GetSQLValueString($_POST['progress_relic_id'], "int"),
	                       GetSQLValueString($_GET['PID'], "int"),
	                       GetSQLValueString($_POST['progress_relic_recipiant'], "int"),
	                       GetSQLValueString($_POST['progress_game_id'], "int"));
	}

	// Update the games table with the new gold amount
	$searchGold = 0;
	if(!empty($_POST['search_id'])) {
    foreach($_POST['search_id'] as $check) {
            $searchGold = $searchGold + $check;
    }
  }

  if($_POST['progress_reward_type_h'] == "gold" && $_POST['progress_quest_winner'] == "Heroes Win"){
  	$questGold = ($_POST['progress_rewardH'] * (count($players) - 1));
  }

  $totalGold = $searchGold + $questGold;

  $insertSQL3 = sprintf("UPDATE tbgames SET game_gold = game_gold + %s WHERE game_id = %s",
	                       GetSQLValueString($totalGold, "int"),
	                       GetSQLValueString($gameID, "int"));


	// update characters with xp
	$defaultXP = 1; // FIX ME: Rumours do not reward default XP
	$xpHeroes = $defaultXP;
	$xpOverlord = $defaultXP;
  
  if($_POST['progress_reward_type_h'] == "hxp" && $_POST['progress_quest_winner'] == "Heroes Win"){
  	$xpHeroes = $xpHeroes + $_POST['progress_rewardH'];
  } else if($_POST['progress_reward_type_ol'] == "olxp" && $_POST['progress_quest_winner'] == "Overlord Wins"){
  	$xpOverlord = $xpOverlord + $_POST['progress_rewardOL'];
  }

  $insertSQLH = sprintf("UPDATE tbcharacters SET char_xp = char_xp + %s WHERE char_game_id = %s AND char_hero != %s", 
	                       GetSQLValueString($xpHeroes, "int"),
	                       GetSQLValueString($gameID, "int"),
	                       GetSQLValueString(0, "int")); //0 is the code for the overlord

  $insertSQLOl = sprintf("UPDATE tbcharacters SET char_xp = char_xp + %s WHERE char_game_id = %s AND char_hero = %s",
	                       GetSQLValueString($xpOverlord, "int"),
	                       GetSQLValueString($gameID, "int"),
	                       GetSQLValueString(0, "int"));



  mysql_select_db($database_dbDescent, $dbDescent);
  $Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());

  if (isset($_POST['progress_relic_recipiant'])){
  	$Result2 = mysql_query($insertSQL2, $dbDescent) or die(mysql_error());
  }

  $Result3 = mysql_query($insertSQL3, $dbDescent) or die(mysql_error());

  $ResultH = mysql_query($insertSQLH, $dbDescent) or die(mysql_error());
  $ResultOl = mysql_query($insertSQLOl, $dbDescent) or die(mysql_error());


  $insertGoTo = "campaign_overview.php?urlGamingID=" . $gameID;
  header(sprintf("Location: %s", $insertGoTo));



}

// ------------------- //
// -- Travel Events -- //
// ------------------- //

// Select the travel events
$query_rsTravelData = sprintf("SELECT * FROM tbtravel WHERE travel_exp_id IN ($selExpansions)");
$rsTravelData = mysql_query($query_rsTravelData, $dbDescent) or die(mysql_error());
$row_rsTravelData = mysql_fetch_assoc($rsTravelData);
$totalRows_rsTravelData = mysql_num_rows($rsTravelData);

// create array with select options
$travelRoad = array();
$travelWater = array();
$travelPlains = array();
$travelForest = array();
$travelMountains = array();

$travelSpecial = array();


do {
	if ($row_rsTravelData['travel_type'] == "road"){
		$travelRoad[] = array(
			"option" => '<option name="travel-road" value="' . $row_rsTravelData['travel_id'] . '">' . $row_rsTravelData['travel_name'] . '</option>',
			"special" => $row_rsTravelData['travel_special'],
			);
	} else if ($row_rsTravelData['travel_type'] == "water"){
		$travelWater[] = array(
			"option" => '<option name="travel-water" value="' . $row_rsTravelData['travel_id'] . '">' . $row_rsTravelData['travel_name'] . '</option>',
			"special" => $row_rsTravelData['travel_special'],
			);
	} else if ($row_rsTravelData['travel_type'] == "plains"){
		$travelPlains[] = array(
			"option" => '<option name="travel-plains" value="' . $row_rsTravelData['travel_id'] . '">' . $row_rsTravelData['travel_name'] . '</option>',
			"special" => $row_rsTravelData['travel_special'],
			);
	} else if ($row_rsTravelData['travel_type'] == "forest"){
		$travelForest[] = array(
			"option" => '<option name="travel-forest" value="' . $row_rsTravelData['travel_id'] . '">' . $row_rsTravelData['travel_name'] . '</option>',
			"special" => $row_rsTravelData['travel_special'],
			);
	} else if ($row_rsTravelData['travel_type'] == "mountains"){
		$travelMountains[] = array(
			"option" => '<option name="travel-mountains" value="' . $row_rsTravelData['travel_id'] . '">' . $row_rsTravelData['travel_name'] . '</option>',
			"special" => $row_rsTravelData['travel_special'],
			);

	} else if ($row_rsTravelData['travel_type'] == "all"){
		$travelRoad[] = array(
			"option" => '<option name="travel-road" value="' . $row_rsTravelData['travel_id'] . '">' . $row_rsTravelData['travel_name'] . '</option>',
			"special" => $row_rsTravelData['travel_special'],
			);
		$travelWater[] = array(
			"option" => '<option name="travel-water" value="' . $row_rsTravelData['travel_id'] . '">' . $row_rsTravelData['travel_name'] . '</option>',
			"special" => $row_rsTravelData['travel_special'],
			);
		$travelPlains[] = array(
			"option" => '<option name="travel-plains" value="' . $row_rsTravelData['travel_id'] . '">' . $row_rsTravelData['travel_name'] . '</option>',
			"special" => $row_rsTravelData['travel_special'],
			);
		$travelForest[] = array(
			"option" => '<option name="travel-forest" value="' . $row_rsTravelData['travel_id'] . '">' . $row_rsTravelData['travel_name'] . '</option>',
			"special" => $row_rsTravelData['travel_special'],
			);
		$travelMountains[] = array(
			"option" => '<option name="travel-mountains" value="' . $row_rsTravelData['travel_id'] . '">' . $row_rsTravelData['travel_name'] . '</option>',
			"special" => $row_rsTravelData['travel_special'],
			);
	}

} while ($row_rsTravelData = mysql_fetch_assoc($rsTravelData));

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "travel-details-form")) {
	foreach ($_POST["travel_steps_submit"] as $tss){
		$insertSQL = sprintf("INSERT INTO tbtravel_aquired (travel_aq_event_id, travel_aq_progress_id, travel_aq_game_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($tss, "int"),
                       GetSQLValueString($_GET['PID'], "int"),
                       GetSQLValueString($_GET['urlGamingID'], "int"));

		mysql_select_db($database_dbDescent, $dbDescent);
		$Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());
	}
	$insertSQL2 = sprintf("UPDATE tbquests_progress SET progress_set_travel = 1 WHERE progress_id = %s", 
                       GetSQLValueString($_GET['PID'], "int"));

	mysql_select_db($database_dbDescent, $dbDescent);
	$Result2 = mysql_query($insertSQL2, $dbDescent) or die(mysql_error());

	$insertGoTo = "campaign_overview.php?urlGamingID=" . $gameID;
	header(sprintf("Location: %s", $insertGoTo));
}


// -------------- //
// -- Spend XP -- //
// -------------- //

// loop through heroes
$acquiredSkills = array();
foreach ($players as $sh){
	// Select aquired skills
	$query_rsAqSkills = sprintf("SELECT * FROM tbskills_aquired INNER JOIN tbcharacters ON tbskills_aquired.spendxp_char_id = tbcharacters.char_id WHERE spendxp_game_id = %s AND spendxp_char_id = %s AND char_hero != 0", GetSQLValueString($gameID, "int"), GetSQLValueString($sh['id'], "int"));
	$rsAqSkills = mysql_query($query_rsAqSkills, $dbDescent) or die(mysql_error());
	$row_rsAqSkills = mysql_fetch_assoc($rsAqSkills);
	$totalRows_rsAqSkills = mysql_num_rows($rsAqSkills);

	$acquiredSkills[$sh['id']] = array();
	do { 
		$acquiredSkills[$sh['id']][] = $row_rsAqSkills['spendxp_skill_id'];
	} while ($row_rsAqSkills = mysql_fetch_assoc($rsAqSkills));

} //close foreach



// loop through heroes
$availableSkills = array();
foreach ($players as $sh){
	$query_rsAllSkills = sprintf("SELECT * FROM tbskills WHERE skill_class = %s AND skill_type != 'Overlord'", GetSQLValueString($sh['class'], "text"));
	$rsAllSkills = mysql_query($query_rsAllSkills, $dbDescent) or die(mysql_error());
	$row_rsAllSkills = mysql_fetch_assoc($rsAllSkills);
	$totalRows_rsAllSkills = mysql_num_rows($rsAllSkills);

		$availableSkills[$sh['id']] = array();
	do { 
		if ($row_rsAllSkills['skill_cost'] <= $sh['xp'] && (!(in_array($row_rsAllSkills['skill_id'], $acquiredSkills[$sh['id']])))){
			//$availableSkills[$sh['id']][] = $row_rsAllSkills['skill_id'];
			$availableSkills[$sh['id']][] = '<div class="list-checkbox"><input type="checkbox" name="' . $sh['id'] . '[]" value="' . $row_rsAllSkills['skill_id'] . '"><div>' . $row_rsAllSkills['skill_name'] . '<br /><span class="search-gold">' . $row_rsAllSkills['skill_cost'] . 'XP</span></div></div>';
		}
	} while ($row_rsAllSkills = mysql_fetch_assoc($rsAllSkills));

} //close foreach
$valid = 1;
$totalCostPlayer = array();
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "spendxp-details-form")) {

	foreach ($players as $sh){
		$neededXP = 0;
		if (array_key_exists($sh['id'], $_POST)){
			foreach ($_POST[$sh['id']] as $skp){
				//echo $skp;
				$query_rsSkillCost = sprintf("SELECT skill_cost FROM tbskills WHERE skill_id = %s", GetSQLValueString($skp, "int"));
				$rsSkillCost = mysql_query($query_rsSkillCost, $dbDescent) or die(mysql_error());
				$row_rsSkillCost = mysql_fetch_assoc($rsSkillCost);
				$neededXP += $row_rsSkillCost['skill_cost'];
			}

			$totalCostPlayer[$sh['id']] = $neededXP;

			if($neededXP > $sh['xp']){
				echo '<div class="error">' . $sh['player'] . ' tried to spend ' . $neededXP . 'XP, but ' . $sh['name'] . ' has only ' . $sh['xp'] . 'XP.</div>';
				$valid = 0;
			}
		}

	} //close foreach
	if($valid == 1){
		foreach ($players as $sh){
			$neededXP = 0;
			if (array_key_exists($sh['id'], $_POST)){
				foreach ($_POST[$sh['id']] as $skp){
					$insertSQL = sprintf("INSERT INTO tbskills_aquired (spendxp_game_id, spendxp_char_id, spendxp_skill_id, spendxp_progress_id) VALUES (%s, %s, %s, %s)",
	                      GetSQLValueString($_GET['urlGamingID'], "int"),
	                      GetSQLValueString($sh['id'], "int"),
	                      GetSQLValueString($skp, "int"),
	                      GetSQLValueString($_GET['PID'], "int"));

					mysql_select_db($database_dbDescent, $dbDescent);
					$Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());
				}

				$insertSQL2 = sprintf("UPDATE tbcharacters SET char_xp = char_xp - %s WHERE char_id = %s",
		                      GetSQLValueString($totalCostPlayer[$sh['id']], "int"),
		                      GetSQLValueString($sh['id'], "int"));

				mysql_select_db($database_dbDescent, $dbDescent);
				$Result2 = mysql_query($insertSQL2, $dbDescent) or die(mysql_error());
		
			}
			

		} //close foreach

		$insertSQL3 = sprintf("UPDATE tbquests_progress SET progress_set_spendxp = 1 WHERE progress_id = %s", 
                       GetSQLValueString($_GET['PID'], "int"));
		$Result3 = mysql_query($insertSQL3, $dbDescent) or die(mysql_error());


		$insertGoTo = "campaign_overview.php?urlGamingID=" . $gameID;
		header(sprintf("Location: %s", $insertGoTo));
	}

}

// --------------- //
// -- Buy Items -- //
// --------------- //

if (!(isset($_POST["MM_insert"]))){
	$_SESSION["shopItems"] = array();
	$_SESSION["tempSold"] = array();
}

$validItems = 0;

// Get the gold!
$query_rsTotalGold = sprintf("SELECT game_gold FROM tbgames WHERE game_id = %s", GetSQLValueString($gameID, "int"));
$rsTotalGold = mysql_query($query_rsTotalGold, $dbDescent) or die(mysql_error());
$row_rsTotalGold = mysql_fetch_assoc($rsTotalGold);

$availableGold = $row_rsTotalGold['game_gold'];

// Select all items FIX ME: implement Act filter
$query_rsAllItems = sprintf("SELECT * FROM tbitems WHERE item_exp_id IN ($selExpansions) AND owner = %s", GetSQLValueString("hero", "text"));
$rsAllItems = mysql_query($query_rsAllItems, $dbDescent) or die(mysql_error());
$row_rsAllItems = mysql_fetch_assoc($rsAllItems);

// Select aquired items
$query_rsAqItems = sprintf("SELECT * FROM tbitems_aquired INNER JOIN tbitems ON aq_item_id = item_id WHERE aq_game_id = %s", GetSQLValueString($gameID, "int"));
$rsAqItems = mysql_query($query_rsAqItems, $dbDescent) or die(mysql_error());
$row_rsAqItems = mysql_fetch_assoc($rsAqItems);

$aquiredItems = array();
$aquiredItemsList = array();

do { 
		$aquiredItems[] = $row_rsAqItems['aq_item_id'];
		$aquiredItemsList[] = '<option value="' . $row_rsAqItems['aq_item_id'] . '">' . $row_rsAqItems['item_name'] . ' - ' . $row_rsAqItems['item_sell_price'] . ' Gold</option>';
} while ($row_rsAqItems = mysql_fetch_assoc($rsAqItems));

// create array with select options
$availableItems = array();
do {
	if(!(in_array($row_rsAllItems['item_id'], $aquiredItems))){
		$availableItems[] = '<option value="' . $row_rsAllItems['item_id'] . '">' . $row_rsAllItems['item_name'] . ' - ' . $row_rsAllItems['item_default_price'] . ' Gold</option>';
	}
} while ($row_rsAllItems = mysql_fetch_assoc($rsAllItems));



$selectionPrice = 0;
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "buy-details-form")) {
	$query_rsGetItem = sprintf("SELECT * FROM tbitems WHERE item_id = %s", GetSQLValueString($_POST["bought_item"], "int"));
	$rsGetItem = mysql_query($query_rsGetItem, $dbDescent) or die(mysql_error());
	$row_rsGetItem = mysql_fetch_assoc($rsGetItem);

	$temp = $_SESSION["shopItems"];

	// FIX ME: this could be done in a different way probably (without the foreach player)
	foreach ($players as $pi){
		if ($pi['id'] == $_POST["bought_player"]){
			$temp[] = array(
				"action" => "buy",
				"id" => $_POST["bought_item"],
				"name" => $row_rsGetItem['item_name'],
				"player" => $_POST["bought_player"],
				"hero" => $pi['name'],
				"price" => $row_rsGetItem['item_default_price'],	
				"overrid" => $_POST["bought_override"],
			);
		}
	}
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "sell-details-form")) {
	$query_rsGetItem = sprintf("SELECT * FROM tbitems_aquired 
		INNER JOIN tbitems ON aq_item_id = item_id 
		INNER JOIN tbcharacters ON aq_char_id = char_id 
		INNER JOIN tbheroes ON char_hero = hero_id 
		WHERE aq_item_id = %s AND aq_game_id = %s", GetSQLValueString($_POST["sold_item"], "int"), GetSQLValueString($gameID, "int"));
	$rsGetItem = mysql_query($query_rsGetItem, $dbDescent) or die(mysql_error());
	$row_rsGetItem = mysql_fetch_assoc($rsGetItem);

	$temp = $_SESSION["shopItems"];

	// FIX ME: this could be done in a different way probably (without the foreach player)
	$temp[] = array(
		"action" => "sell",
		"id" => $_POST["sold_item"],
		"name" => $row_rsGetItem['item_name'],
		"player" => $row_rsGetItem['char_id'],
		"hero" => $row_rsGetItem['hero_name'],
		"price" => $row_rsGetItem['item_sell_price'],	
		"override" => NULL,
	);
}

if (isset($_POST["MM_insert"])){
	if ($_POST["MM_insert"] == "item-details-form"){
		$temp = $_SESSION["shopItems"];
	}

	foreach ($temp as $tmp){
		if ($tmp['action'] == "buy"){
			$selectionPrice += $tmp["price"];
		}	else if ($tmp['action'] == "sell"){
			$selectionPrice -= $tmp["price"];
		}
	}

	if ($selectionPrice > $availableGold){
		echo '<div class="error">The selected item costs ' . ($selectionPrice - $availableGold) . ' more gold than is available</div>';
	} else {
		$_SESSION["shopItems"] = $temp;
		$validItems = 1;
	}

}

// Save items to the database
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "item-details-form")) {
	if ($validItems == 1){
		foreach ($_SESSION["shopItems"] as $siv){
			if ($siv["action"] == "buy"){
				$insertSQL = sprintf("INSERT INTO tbitems_aquired (aq_game_id, aq_char_id, aq_item_id, aq_progress_id) VALUES (%s, %s, %s, %s)",
	                      GetSQLValueString($_GET['urlGamingID'], "int"),
	                      GetSQLValueString($siv['player'], "int"),
	                      GetSQLValueString($siv['id'], "int"),
	                      GetSQLValueString($_GET['PID'], "int"));

				mysql_select_db($database_dbDescent, $dbDescent);
				$Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());

			} else if ($siv["action"] == "sell"){
				mysql_select_db($database_dbDescent, $dbDescent);
				$insertSQL2 = sprintf("UPDATE tbitems_aquired SET aq_item_sold = 1, aq_sold_progress_id = %s WHERE aq_game_id = %s AND aq_item_id = %s",
											GetSQLValueString($_GET['PID'], "int"),
											GetSQLValueString($_GET['urlGamingID'], "int"),
                      GetSQLValueString($siv['id'], "int"));
				$Result2 = mysql_query($insertSQL2, $dbDescent) or die(mysql_error());

			}
		}
		mysql_select_db($database_dbDescent, $dbDescent);
		$insertSQL3 = sprintf("UPDATE tbgames SET game_gold = game_gold - %s WHERE game_id = %s",
											GetSQLValueString($selectionPrice, "int"),
											GetSQLValueString($_GET['urlGamingID'], "int"));
		$Result3 = mysql_query($insertSQL3, $dbDescent) or die(mysql_error());

		$insertSQL4 = sprintf("UPDATE tbquests_progress SET progress_set_items = 1 WHERE progress_id = %s", 
                       GetSQLValueString($_GET['PID'], "int"));
		$Result4 = mysql_query($insertSQL4, $dbDescent) or die(mysql_error());

		$insertGoTo = "campaign_overview.php?urlGamingID=" . $gameID;
		header(sprintf("Location: %s", $insertGoTo));
	}
}

/*
echo '<pre>';
var_dump($_SESSION["shopItems"]);
echo '</pre>';
*/

?> 

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="content.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#treasurechest').change(function(){
					if(this.checked)
					  $("#select-item").fadeIn('slow');
					else
						$("#select-item").fadeOut('fast');
			  });
			});
    </script>
	</head>

	<body>
		<div id="wrapper">
			<?php
				foreach ($campaign['quests'] as $qs){	
					if($qs['quest_id'] == $_GET['QID']){
			?>
			<div class="save-left-column" style="background: url('img/quests/<?php print $qs['img']; ?>') no-repeat center;">
				<div class="quest-name"><?php print $qs['name']; ?></div>
			</div>

			<div class="save-right-column">

						<?php if(isset($_GET['part']) && $_GET['part'] == "q") { ?>

							
								<h2>Save Quest Details</h2>
								<form action="<?php echo $editFormAction; ?>" method="post" name="quest-details-form" id="quest-details-form">
									
									<h3>Quest Winner</h3>
									<select name="progress_quest_winner">
										<option value="Heroes Win">Heroes Win</option>
										<option value="Overlord Wins">Overlord Wins</option>
									</select>

									<h3>Encounter 1 Winner</h3>
									<select name="progress_enc1_winner">
									 	<option value="No Winner">No Winner</option>
									  <option value="Heroes Win">Heroes Win</option>
										<option value="Overlord Wins">Overlord Wins</option>
									</select>

									<?php if($qs['reward_type_h'] == "relic"){ ?>
										<h3>Relic Recipiant</h3>
									 	<select name="progress_relic_recipiant">
								      <?php 
												// loop through heroes
												foreach ($players as $h){
											?>
											<option value="<?php print $h['id']; ?>"><?php print $h['name']; ?></option>
											<?php
												} //close foreach
											?>
										</select>
									<?php } ?>

									<div class="clearfix">
										<h3>Select all found Search Cards</h3>
										<!--
										<select multiple="multiple" name="search_id[]">

								      <?php foreach($searchCards as $sc) {
								        echo $sc;
								      } ?>

								    </select>
								 		 -->

								 		<?php foreach($searchCards as $sc) {
								      echo $sc;
								    } ?>
							    </div>

							    <div id="select-item">
							    	<h4>Item found ('Treasure' Search Card)</h4>
								    <select name="search_item">
								    	<option value="empty">None</option>
								      <?php foreach($availableItems as $ai) {
								        echo $ai;
								      } ?>
								    </select>
							    </div>

									<div><input type="submit" value="Save" /></div>
								  <input type="hidden" name="progress_quest_id" value="<?php echo $qs['quest_id']; ?>" />
								  <input type="hidden" name="progress_game_id" value="<?php echo $gameID; ?>" />
								  <input type="hidden" name="progress_relic_id" value="<?php echo $qs['relic_id']; ?>" />
								  <input type="hidden" name="progress_reward" value="<?php echo $qs['reward']; ?>" />
								  <input type="hidden" name="progress_rewardH" value="<?php echo $qs['rewardH']; ?>" />
								  <input type="hidden" name="progress_rewardOL" value="<?php echo $qs['rewardOL']; ?>" />
								  <input type="hidden" name="progress_reward_type_h" value="<?php echo $qs['reward_type_h']; ?>" />
								  <input type="hidden" name="progress_reward_type_ol" value="<?php echo $qs['reward_type_ol']; ?>" />
								  <input type="hidden" name="MM_insert" value="quest-details-form" />
								</form>
							

			<?php
						} else if(isset($_GET['part']) && $_GET['part'] == "xp") {// close if (isset)
						?>
							<form action="<?php echo $editFormAction; ?>" method="post" name="spendxp-details-form" id="spendxp-details-form">
								<?php
								// loop through heroes
								foreach ($players as $h){
									if ($h['name'] != "Overlord"){
										echo '<div class="clearfix">';
										echo '<h2>' . $h['name'] . ' - ' . $h['xp'] . ' XP</h2>';
										foreach ($availableSkills[$h['id']] as $as){
											echo $as;
										}
										echo '</div>';
									}
									
								} //close foreach
								?>
								<div><input type="submit" value="Save" /></div>
								<input type="hidden" name="MM_insert" value="spendxp-details-form" />
							</form>
							<?php


						} else if(isset($_GET['part']) && $_GET['part'] == "it") {// close if (isset)
						?>
							<div class="buy-column odd">
								<form action="<?php echo $editFormAction; ?>" method="post" name="buy-details-form" id="buy-details-form">
									<h2 class="center">Buy Item</h2>
										<select name="bought_item">
											<?php 
												foreach($availableItems as $ai){
													echo $ai;
												}
											?>
										</select>
										<select name="bought_player">
											<?php 
												foreach($players as $pl){
													if ($pl['name'] != "Overlord"){
														echo '<option value="' . $pl['id'] . '">' . $pl['name'] . '</option>';
													}
												}
											?>
										</select>
										<select name="bought_override">
											<option value="NULL">Override Price</div>
											<option value="100">100 Gold</div>
											<option value="125">125 Gold</div>
											<option value="150">150 Gold</div>
											<option value="175">175 Gold</div>
											<option value="200">200 Gold</div>	
										</select>
									<div><input type="submit" value="Add" /></div>
									<input type="hidden" name="MM_insert" value="buy-details-form" />
								</form>
							</div>
							<div class="buy-column even">
								<form action="<?php echo $editFormAction; ?>" method="post" name="sell-details-form" id="sell-details-form">
									<h2 class="center">Sell Item</h2>
										<select name="sold_item">
											<?php 
												foreach($aquiredItemsList as $ail){
													echo $ail;
												}
											?>
										</select>
									<div><input type="submit" value="Add" /></div>
									<input type="hidden" name="MM_insert" value="sell-details-form" />
								</form>
							</div>
							<div class="buy-column odd">
								<form action="<?php echo $editFormAction; ?>" method="post" name="trade-details-form" id="trade-details-form">
									<h2 class="center">Trade Item</h2>
										<select name="traded_item">
											<?php 
												foreach($aquiredItemsList as $ail){
													echo $ail;
												}
											?>
										</select>
										<select name="traded_player">
											<?php 
												foreach($players as $pl){
													if ($pl['name'] != "Overlord"){
														echo '<option value="' . $pl['id'] . '">' . $pl['name'] . '</option>';
													}
												}
											?>
										</select>
									<div><input type="submit" value="Add" /></div>
									<input type="hidden" name="MM_insert" value="trade-details-form" />
								</form>
							</div>
							<?php
							echo '<br />';
							foreach ($_SESSION["shopItems"] as $si){
								if ($si['action'] == "buy"){
									echo '<div>' . $si['hero'] . ' will buy <b>' . $si['name'] . '</b> for ' . $si['price'] . ' gold</div>';
								} else if ($si['action'] == "sell"){
									echo '<div>' . $si['hero'] . ' will sell <b>' . $si['name'] . '</b> for ' . $si['price'] . ' gold</div>';
								}						
							}
							echo '<br />';
							if ($selectionPrice > $availableGold){
								echo '<div class="center">Total: <span style="color: red;">' . ($selectionPrice * -1) . '</span></div>';
							} else {
								echo '<div class="center">Total: ' . ($selectionPrice * -1) . '</div>';
							}
							
							echo '<div class="center">Available: ' . $availableGold . '</div>';
							?>
							<form action="<?php echo $editFormAction; ?>" method="post" name="item-details-form" id="item-details-form">
								<div><input type="submit" value="Save" /></div>
								<input type="hidden" name="MM_insert" value="item-details-form" />
							</form>
							<?php

						} else if(isset($_GET['part']) && $_GET['part'] == "t") {// close if (isset) ?>
							<h2>Save Travel Details</h2>
								<form action="<?php echo $editFormAction; ?>" method="post" name="travel-details-form" id="travel-details-form">
									<?php
										// Travel steps
									  $travelSteps = explode(',', $qs['travel_steps']);
									  $step = 0;
										foreach ($travelSteps as $ts){
											?>
											<div class="travel-step" style="background: url('img/<?php echo $ts ?>.png') no-repeat 10px center">
												<select name="travel_steps_submit[]">
												<?php
												if ($ts == "road"){
													foreach ($travelRoad as $tr){
														echo $tr["option"];
													}
												} else if ($ts == "water"){
													foreach ($travelWater as $tw){
														echo $tw["option"];
													}
												} else if ($ts == "plains"){ 
													foreach ($travelPlains as $tp){
														echo $tp["option"];
													}
												} else if ($ts == "forest"){ 
													foreach ($travelForest as $tf){
														echo $tf["option"];
													}
												} else if ($ts == "mountains"){
													foreach ($travelMountains as $tm){
														echo $tm["option"];
													}
												}
												?>
												</select>
											</div>
											<?php

											$step++;
										}
										
									?>
									<div><input type="submit" value="Save" /></div>
									<input type="hidden" name="MM_insert" value="travel-details-form" />
								</form>
						<?php 
						}
					} // close if (quest_id)
				} // close foreach
			?>
			</div>
			<div class="save-back-column">
				<a class="normal-button" href="campaign_overview.php?urlGamingID=<?php echo $gameID ?>">Back to Overview</a>
			</div>
		</div>
	</body>
</html>


