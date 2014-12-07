<?php
	include 'heroes_test.php';
	include 'campaign_test.php';

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



?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="content.css">
		<title>Descent 2nd Edition Campaign Tracker</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
		$(document).ready(function(){
		  $(".quest-button").click(function(){
		    $("#start-quest-form").toggle();
		    $("#start-rumor-form").hide();
		  });

		  $(".rumor-button").click(function(){
		    $("#start-rumor-form").toggle();
		    $("#start-quest-form").hide();
		  });

		  $(".quest-details-button").click(function(){
		    $("#quest-details-form").toggle();
		  });
		});
		</script>
	</head>
	<body>
		<!-- include the campaign date -->
		<?php include 'campaign_data.php'; ?>

		<div id="wrapper">
			<?php if (!(isset($_GET['urlCharID']))) { // normal page or detail page? ?> 

				<div id="heroes" class="clearfix">
					<?php 
						// loop through heroes
						$ih = 0;
						foreach ($players as $h){
							if (!($players[$ih]['name'] == "Overlord")){
					?>
								<a href="campaign_overview.php?urlGamingID=<?php echo $gameID; ?>&urlCharID=<?php echo $players[$ih]['id']; ?>">
									<div class="hero" style="background: url('img/heroes/<?php print $players[$ih]['img']; ?>');">
										<div class="name"><?php print $players[$ih]['name']; ?></div>
										<div class="class"><?php print $players[$ih]['class']; ?></div>
										<div class="player"><?php print $players[$ih]['player']; ?></div>
										<div class="xp"><?php print $players[$ih]['xp']; ?><span class="xp-label">XP</span></div>
									</div> <!-- close hero -->
								</a> 
					<?php
							}
						$ih++;
						} //close foreach
					?>
				</div> <!-- close heroes -->

			<div class="gold">
				<div class="gold-amount"><?php print $gold; ?></div>
				<div class="gold-label">GOLD</div>
			</div> <!-- close gold -->




			<div id="campaign">

				<?php 
					// make an array with completed quests for options
					$questsCompleted = array();
					foreach ($campaign['quests'] as $qos){
						$questsCompleted[] = $qos['quest_id'];
					}
				?>

				<div class="buttons clearfix">
					<div class="center button quest-button"><p class="title">Start New Quest</p></div>
					<div class="center button rumor-button"><p class="title">Start New Rumor</p></div>
				</div>

				<form action="<?php echo $editFormAction; ?>" method="post" name="start-quest-form" id="start-quest-form">
					<select name="progress_quest_id">
            <option value="">Quest</option>
            <?php do { ?>
							
            	<!-- filter out completed quests -->
            	<?php if(!(in_array($row_rsAvQuestList['quest_id'], $questsCompleted))){ ?>
             	<option value="<?php echo $row_rsAvQuestList['quest_id']?>"><?php echo $row_rsAvQuestList['quest_name']?></option>
             	<?php } ?>




            <?php } while ($row_rsAvQuestList = mysql_fetch_assoc($rsAvQuestList));
									
						$rows = mysql_num_rows($rsAvQuestList);
						if($rows > 0) {
						  mysql_data_seek($rsAvQuestList, 0);
							$row_rsAvQuestList = mysql_fetch_assoc($rsAvQuestList);
						}
						?>
          </select>
          <input type="submit" value="Select" />

          <input type="hidden" name="progress_timestamp" value="" />
          <input type="hidden" name="progress_game_id" value="<?php echo $gameID; ?>" />
          <input type="hidden" name="MM_insert" value="start-quest-form" />
        </form>
        
        
				<form action="<?php echo $editFormAction; ?>" method="post" name="start-rumor-form" id="start-rumor-form">
					<select name="progress_quest_id">
            <option value="">Rumor</option>
            <?php do { ?>
             	<option value="<?php echo $row_rsAvRumorList['quest_id']?>"><?php echo $row_rsAvRumorList['quest_name']?></option>
            <?php } while ($row_rsAvRumorList = mysql_fetch_assoc($rsAvRumorList));
									
						$rows = mysql_num_rows($rsAvRumorList);
						if($rows > 0) {
						  mysql_data_seek($rsAvRumorList, 0);
							$row_rsAvRumorList = mysql_fetch_assoc($rsAvRumorList);
						}
						?>
          </select>
          <input type="submit" value="Select" />

          <input type="hidden" name="progress_timestamp" value="" />
          <input type="hidden" name="progress_game_id" value="<?php echo $gameID; ?>" />
          <input type="hidden" name="MM_insert" value="start-rumor-form" />
        </form>

				<?php 
					// loop through quests
					
					foreach ($campaign['quests'] as $qs){
				?>
				<div class="campaign-phase clearfix">
					<div class="phase-column travel">
						<?php if ($qs['travel_set'] == 0){ ?>
							<div class="center subbutton"><p class="title">Add Travel Steps</p></div>
						<?php } else { ?>

							<?php 
								// loop through travel steps
								$its = 0;
								foreach ($qs['travel'] as $ts){
								?>
									<div class="travel-step" style="background: url('img/<?php print $ts['type']; ?>.png') no-repeat 10px center;">
										<div class="travel-event"><?php print $ts['event']; ?></div><div class="travel-outcome"><?php print $ts['outcome']; ?></div>
									</div>
								<?php
								$its++;
								} //close travel foreach
							?>

						<?php } ?>
					</div>

					<div class="phase-column quest" style="background: url('img/quests/<?php print $qs['img']; ?>') no-repeat center;">
						<?php if ($qs['winner'] == NULL){ ?>

							<div class="quest-name"><?php print $qs['name']; ?></div>
							<div class="center subbutton quest-details-button"><p class="title">Add Details</p></div>
							<form action="<?php echo $editFormAction; ?>" method="post" name="quest-details-form" id="quest-details-form">
								<div>Quest Winner</div>
								<select name="progress_quest_winner">
			            <option value="Heroes Win">Heroes Win</option>
									<option value="Overlord Wins">Overlord Wins</option>
			          </select>

			          <div>Encounter 1 Winner</div>
			          <select name="progress_enc1_winner">
			          	<option value="No Winner">No Winner</option>
			            <option value="Heroes Win">Heroes Win</option>
									<option value="Overlord Wins">Overlord Wins</option>
			          </select>

			          <div>Relic Recipiant</div>
			          <?php if($qs['reward_is_relic'] == 1){ ?>
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


			          <div><input type="submit" value="Save" /></div>

			          <input type="hidden" name="progress_quest_id" value="<?php echo $qs['quest_id']; ?>" />
			          <input type="hidden" name="progress_game_id" value="<?php echo $gameID; ?>" />
			          <input type="hidden" name="progress_id" value="<?php echo $qs['id']; ?>" />
			          <input type="hidden" name="progress_relic_id" value="<?php echo $qs['relic_id']; ?>" />
			          <input type="hidden" name="MM_insert" value="quest-details-form" />
			        </form>




						<?php } else { ?>

							<div class="quest-name"><?php print $qs['name']; ?></div>
							<div class="quest-winner"><?php print $qs['winner']; ?></div>
							<div class="quest-reward"><span class="label">Reward</span><br /><?php print $qs['reward']; ?></div>

						<?php } ?>
					</div>

					
				
					<div class="phase-column spend-xp">
						<div class="column-title center">Skills</div>
						<?php if ($qs['spendxp_set'] == 0){ ?>
							<div class="center subbutton"><p class="title">Add Items</p></div>
						<?php } else { ?>

							<?php 
								// loop through skills per hero
								$isx = 0;
								foreach ($qs['spendxp'] as $xsk){
							?>
										<div class="item clearfix">
											<div class="hero-mini items" style="background: url('img/heroes/mini_<?php print $xsk['hero_img']; ?>') center;"></div>
											<div class="items item-name"><?php print $xsk['name']; ?></div>
											<div class="items item-xp"><?php print $xsk['xpcost']; ?><span class="xp-label">XP</span></div>
										</div>
							<?php
									$isx++;
								} //close foreach
							?>

						<?php } ?>
					</div>

					<div class="phase-column buy-items">
						<div class="column-title center">Items</div>
						<?php if ($qs['items_set'] == 0){ ?>
							<div class="center subbutton"><p class="title">Add Items</p></div>
						<?php } else { ?>

							<?php 
								// loop through items that are items
								$iit = 0;
								foreach ($qs['items'] as $xit){
									if($xit['type'] == "Item"){
							?>
										<div class="item clearfix">
											<div class="hero-mini items" style="background: url('img/heroes/mini_<?php print $xit['hero_img']; ?>') center;"></div>
											<div class="items item-name"><?php print $xit['name']; ?></div>
											<div class="items item-xp"><?php print $xit['price']; ?></div>
										</div>
							<?php
									}
									$iit++;
								} //close foreach
								$irt = 0;
								foreach ($qs['items'] as $xit){
									if($xit['type'] == "Relic"){
							?>
									<div class="relics">
										<?php if($irt == 0){ ?><div class="column-title center">Relics</div><?php }; ?>
										<div class="relic clearfix">
											<div class="hero-mini items" style="background: url('img/heroes/mini_<?php print $xit['hero_img']; ?>') center;"></div>
											<div class="items item-name"><?php print $xit['name']; ?></div>
											<div class="items item-xp"><?php print $xit['price']; ?></div>
										</div>
									</div>
							<?php
									}
									$irt++;
								} //close foreach
							?>

						<?php } ?>
					</div>


				</div>
				<?php	
					} //close quests foreach
				?>
			</div> <!-- close campaign -->




			<?php
			} else {
				?>
				<div id="heroes-detail" class="clearfix">
				<?php 
					// loop through heroes
					$ih = 0;
					foreach ($players as $h){
						if (($players[$ih]['id'] == $charID)){
				?>
							
								<div class="hero" style="background: url('img/heroes/<?php print $players[$ih]['img']; ?>');">
									<div class="name"><?php print $players[$ih]['name']; ?></div>
									<div class="class"><?php print $players[$ih]['class']; ?></div>
									<div class="player"><?php print $players[$ih]['player']; ?></div>
									<div class="xp"><?php print $players[$ih]['xp']; ?><span class="xp-label">XP</span></div>
								</div> <!-- close hero -->

								<?php foreach ($players[$ih]['skills'] as $sk){ ?>
								<div class="skills">
									<div class="name"><?php print $sk['name']; ?></div>
									<div class="xp"><?php print $sk['xp']; ?><span class="xp-label">XP</span></div>
								</div> <!-- close skills -->

				<?php
								}
						}
					$ih++;
					} //close foreach
				?>
			</div> <!-- close heroes -->
			<?php
			}
			/*
			echo '<pre>';
			print_r($campaign);
		  echo '</pre>';
		  */
		 	
		  ?>
		</div> <!-- close wrapper -->

	</body>
</html>