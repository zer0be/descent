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
					// loop through quests
					
					foreach ($campaign['quests'] as $qs){
				?>
				<div class="campaign-phase clearfix">
					<div class="phase-column travel">
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
					</div>

				
					<div class="phase-column quest" style="background: url('img/quests/<?php print $qs['img']; ?>') no-repeat center;">
						<div class="quest-name"><?php print $qs['name']; ?></div>
						<div class="quest-winner"><?php print $qs['winner']; ?></div>
						<div class="quest-reward"><span class="label">Reward</span><br /><?php print $qs['reward']; ?></div>
					</div>
				
					<div class="phase-column spend-xp">
						<div class="column-title center">Skills</div>
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
					</div>

					<div class="phase-column spend-xp">
						<div class="column-title center">Items</div>
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
					</div>


				</div>
				<?php	
					} //close quests foreach
				?>
			</div> <!-- close campaign -->





			<!-- old -->
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