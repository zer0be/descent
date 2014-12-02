<?php
	$campaign = array(
		"name" => "The Shadow Rune",
		"phases" => array(
			array(
				"travel" => array(
					array(
					"type" => "Plains",
					"event" => "<div class='v-center'>No Event</div>",
					"outcome" => "",
					"goldlost" => 0,
					"item-gained" => ""
					),
					array(
					"type" => "Mountains",
					"event" => "A mysterious jester appears and presents an irresistible offer..",
					"outcome" => $heroes[1]['player'] . " passes all attibute tests and draws a 'Crossbow'",
					"goldlost" => 0,
					"item-gained" => "Crossbow"
					),
					array(
					"type" => "Water",
					"event" => "You tire after the long journey. A ferryman sympathizes and offers you a ride",
					"outcome" => "Heroes choose to spend 25 gold to ride the ferry.",
					"goldlost" => 25,
					"item-gained" => ""
					),
				),
				"quest" => array(
					"name" => "A Fat Goblin",
					"img" => "a_fat_goblin.jpg",
					"winner" => "Heroes Win!",
					"reward" => "Fortuna's Dice",
					"xp-all" => 1,
				),
				"spendxp" => array(
					"heroes" => array(
												array( 
													array(
													"itemname" => "Inky Substance", 
													"xpcost" => 1,
													),
													array(
													"itemname" => "Bottled Courage", 
													"xpcost" => 2,
													),
												),
												array( 
													array(
													"itemname" => "Iron Will", 
													"xpcost" => 2,
													),
												),
												array( 
												),
												array( 
													array(
													"itemname" => "Sneaky", 
													"xpcost" => 1,
													),
												),
					),
					"overlord" => "x",
				),
				"shopping" => array(
					"type" => "John Lennon",
					"event" => "High Mage Quellen",
					"effect" => "img/heroes/high_mage_quellen.jpg",
				)
			)
		)
	);

/*
	echo '<pre>';
	print_r($campaign);
  echo '</pre>';
*/
?>