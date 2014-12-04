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
		<?php include 'campaign_data.php'; ?>
		<div id="wrapper">

			<div id="heroes" class="clearfix">
				<?php 
					// loop through heroes
					$ih = 0;
					foreach ($players as $h){
						if (!($players[$ih]['name'] == "Overlord")){
				?>
							<a href="#">
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
					// loop through campaign phases
					foreach ($campaign['phases'] as $cp){
				?>
					<div class="campaign-phase clearfix">

						<div class="phase-column travel">
							<?php 
								// loop through travel steps
								foreach ($cp['travel'] as $ts){
							?>
								<div class="travel-step" style="background: url('img/<?php print $ts['type']; ?>.png') no-repeat 10px center;">
									<div class="travel-event"><?php print $ts['event']; ?></div><div class="travel-outcome"><?php print $ts['outcome']; ?></div>
								</div>
							<?php
								} //close foreach
							?>

						</div>

						<div class="phase-column quest" style="background: url('img/quests/<?php print $cp['quest']['img']; ?>') no-repeat center;">
							<div class="quest-name"><?php print $cp['quest']['name']; ?></div>
							<div class="quest-winner"><?php print $cp['quest']['winner']; ?></div>
							<div class="quest-reward"><span class="label">Reward</span><br /><?php print $cp['quest']['reward']; ?></div>
						</div>

						<div class="phase-column spend-xp">
							<?php 
								// loop through skills per hero
								$ih = 0;
								foreach ($cp['spendxp']['heroes'] as $xph){
							?>
								<div class="spendxp-heroes">
									<?php 
									foreach ($xph as $it){
									?>
										<div class="item clearfix"><div class="hero-mini items" style="background: url('img/heroes/mini_<?php print $heroes[$ih]['img']; ?>') center;"></div><div class="items item-name"><?php print $it['itemname']; ?></div><div class="items item-xp"><?php print $it['xpcost']; ?><span class="xp-label">XP</span></div></div>
									<?php
										} //close foreach
									?>
								</div>
							<?php
								$ih++;
								} //close foreach
							?>
						</div>

						<div class="phase-column shopping">

						</div>

					</div> <!-- close campaign-phase -->
				<?php
					} //close foreach
				?>
			</div><!-- close campaign -->
			<?php
			/*
			echo '<pre>';
			print_r($campaign);
		  echo '</pre>';
		  */
		 	
		  ?>
		</div> <!-- close wrapper -->

	</body>
</html>