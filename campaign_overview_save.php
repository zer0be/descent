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

// Select the search cards
	$query_rsSearchData = sprintf("SELECT * FROM tbsearch ORDER BY search_name ASC");
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



// Select all items FIX ME: implement Act and Expansion filter
	$query_rsAllItems = sprintf("SELECT * FROM tbitems WHERE item_exp_id = %s AND owner = %s", GetSQLValueString(0, "int"),GetSQLValueString("hero", "text"));
	$rsAllItems = mysql_query($query_rsAllItems, $dbDescent) or die(mysql_error());
	$row_rsAllItems = mysql_fetch_assoc($rsAllItems);
	$totalRows_rsAllItems = mysql_num_rows($rsAllItems);

// Select aquired items
	$query_rsAqItems = sprintf("SELECT * FROM tbitems_aquired WHERE aq_game_id = %s", GetSQLValueString($gameID, "int"));
	$rsAqItems = mysql_query($query_rsAqItems, $dbDescent) or die(mysql_error());
	$row_rsAqItems = mysql_fetch_assoc($rsAqItems);
	$totalRows_rsAqItems = mysql_num_rows($rsAqItems);

	$aquiredItems = array();
	do { 
		$aquiredItems[] = $row_rsAqItems['aq_item_id'];
	} while ($row_rsAqItems = mysql_fetch_assoc($rsAqItems));

// create array with select options
	$availableItems = array();
	do {
		if(!(in_array($row_rsAllItems['item_id'], $aquiredItems))){
			$availableItems[] = '<option value="' . $row_rsAllItems['item_id'] . '">' . $row_rsAllItems['item_name'] . '</option>';
		}
	} while ($row_rsAllItems = mysql_fetch_assoc($rsAllItems));

// Select Gold
/*
	$query_rsGold = sprintf("SELECT game_gold FROM tbgames WHERE game_id = %s",GetSQLValueString($gameID, "int"));
	$rsGold = mysql_query($query_rsGold, $dbDescent) or die(mysql_error());
	$row_rsGold = mysql_fetch_assoc($rsGold);
	$totalRows_rsGold = mysql_num_rows($rsGold);
*/


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

						<?php if(isset($_GET['part']) && $_GET['part'] == "q") { ?>

							<div class="save-left-column" style="background: url('img/quests/<?php print $qs['img']; ?>') no-repeat center;">
								<div class="quest-name"><?php print $qs['name']; ?></div>
							</div>

							<div class="save-right-column">
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
												$ish = 0;
												foreach ($players as $h){
											?>
											<option value="<?php print $players[$ish]['id']; ?>"><?php print $players[$ish]['name']; ?></option>
											<?php
												$ish++;
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
							</div>

			<?php
						} else if(isset($_GET['part']) && $_GET['part'] == "xp") {// close if (isset)

						}
					} // close if (quest_id)
				} // close foreach
			?>
		</div>
	</body>
</html>