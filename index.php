<?php 

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
		<META NAME="description" CONTENT="Descent Mobile is a quick reference campaing tracker for the table top stagety game Descent Journeys in the Dark, 2nd edition">
		<META NAME="keywords" CONTENT="Descent Journeys in the dark, Road to Legend, Sea of Blood, SoB, RtL, JitD, Descent, descent 2nd, descentinthedark.com, descentinthedark, fantasy flight games, fantasyflightgames, second edition, campaign track, campaign, table top gaming, gaming, shadow rune" />
	</head>
	<body>
		<!-- <div id="toolbar"></div> -->
		<a href='index.php'><div id="header"></div></a>
		<div id="wrapper">
		<?php 

		include 'campaign.php';
		include 'includes/login.php';
		?>
	</div>
	</body>
</html>