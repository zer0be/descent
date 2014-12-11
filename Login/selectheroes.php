<?php

if (isset($_GET['urlGrpName'])) { 
  $grpName = $_GET['urlGrpName'];
} 

if (isset($_GET['urlGamingID'])) { 
  $gameID = $_GET['urlGamingID'];
} 

//select the database
mysql_select_db($database_dbDescent, $dbDescent);

// select the heroes from the db
$query_rsHeroes = sprintf("SELECT * FROM tbheroes WHERE hero_name != %s", GetSQLValueString("Overlord", "text"));
$rsHeroes = mysql_query($query_rsHeroes, $dbDescent) or die(mysql_error());
$row_rsHeroes = mysql_fetch_assoc($rsHeroes);
$totalRows_rsHeroes = mysql_num_rows($rsHeroes);

// create an array for the hero images, and the options for the hero select menu
$heroImages = array();
$heroOptions = array();

// create an array for each archetype where we save the hero id.
$isWarrior = array();
$isMage = array();
$isScout = array();
$isHealer = array();
do{
  $short = $row_rsHeroes['hero_name'];
  $short = strtolower($short);
  $short = str_replace(" ","-",$short);
  $short = preg_replace("/[^A-Za-z0-9_]/","",$short);

  $heroImages[] = "../img/heroes/" . $row_rsHeroes['hero_img'];
  $heroOptions[] = '<option value="' . $row_rsHeroes['hero_id'] . '" id="' . $short . '">' . $row_rsHeroes['hero_name'] . '</option>';

  // Put the hero id into the array for its archetype
  if ($row_rsHeroes['hero_type'] == "Warrior"){
    $isWarrior[] = $row_rsHeroes['hero_id'];
  } else if ($row_rsHeroes['hero_type'] == "Mage"){
    $isMage[] = $row_rsHeroes['hero_id'];
  } else if ($row_rsHeroes['hero_type'] == "Scout"){
    $isScout[] = $row_rsHeroes['hero_id'];
  } else if ($row_rsHeroes['hero_type'] == "Healer"){
    $isHealer[] = $row_rsHeroes['hero_id'];
  }

} while ($row_rsHeroes = mysql_fetch_assoc($rsHeroes));

// Have the heroes been set?
$heroes_set = 0;
if ((isset($_POST['select_hero1'])) || (isset($_POST['select_hero2'])) || (isset($_POST['select_hero3'])) || (isset($_POST['select_hero4']))){
  $heroes_set = 1;
}

// check how many heroes there are, and save them to an array
$totalHeroes = 0;
$listHeroes = array();

if (isset($_POST['select_hero1']) && $_POST['select_hero1'] != 0){
  $hero_id1 = $_POST['select_hero1'];
  $totalHeroes += 1;
  $listHeroes[] = $_POST['select_hero1'];
} else {
	 $hero_id1 = 9999; // random number that will never be found in the db
}

if (isset($_POST['select_hero2']) && $_POST['select_hero2'] != 0){
  $hero_id2 = $_POST['select_hero2'];
  $totalHeroes += 1;
  $listHeroes[] = $_POST['select_hero2'];
} else {
	 $hero_id2 = 9999; // random number that will never be found in the db
}

if (isset($_POST['select_hero3']) && $_POST['select_hero3'] != 0){
  $hero_id3 = $_POST['select_hero3'];
  $totalHeroes += 1;
  $listHeroes[] = $_POST['select_hero3'];
} else {
	 $hero_id3 = 9999; // random number that will never be found in the db
}

if (isset($_POST['select_hero4']) && $_POST['select_hero4'] != 0){
  $hero_id4 = $_POST['select_hero4'];
  $totalHeroes += 1;
  $listHeroes[] = $_POST['select_hero4'];
} else {
	 $hero_id4 = 9999; // random number that will never be found in the db
}


  // check if all heroes are unique
  // here we get a count of the unique values in an array, compared to a count of the same array with all it's values

  $Unique = 1;
  if (count(array_unique($listHeroes)) !== count($listHeroes)) {
    $Unique = 0;
  } else {

    $query_rsSetHeroes = sprintf("SELECT * FROM tbheroes WHERE hero_id = %s OR hero_id = %s OR hero_id = %s OR hero_id = %s", 
    											GetSQLValueString($hero_id1, "int"), 
    											GetSQLValueString($hero_id2, "int"),
    											GetSQLValueString($hero_id3, "int"),
    											GetSQLValueString($hero_id4, "int"));
    $rsSetHeroes = mysql_query($query_rsSetHeroes, $dbDescent) or die(mysql_error());
    $row_rsSetHeroes = mysql_fetch_assoc($rsSetHeroes);
    $totalRows_rsSetHeroes = mysql_num_rows($rsSetHeroes);

    //create an array with data of the selected heroes
    $selectedHeroes = array();
    $sh = 0;
    do{
    $selectedHeroes[$sh] = array(
        "id" => $row_rsSetHeroes['hero_id'],
        "img" => $row_rsSetHeroes['hero_img'],
        "name" => $row_rsSetHeroes['hero_name'],
      );

    $sh++;
    } while ($row_rsSetHeroes = mysql_fetch_assoc($rsSetHeroes));

  }



//-------------------------------------//
//-- CHOOSE CLASSES & PLAYERS STUFF -- //
//-------------------------------------//

//get the players
$query_rsGroupMembers = sprintf("SELECT player_handle FROM tbplayerlist WHERE created_by = %s OR created_by = 'ALL' ORDER BY player_handle ASC", GetSQLValueString($username, "text"));
$rsGroupMembers = mysql_query($query_rsGroupMembers, $dbDescent) or die(mysql_error());
$row_rsGroupMembers = mysql_fetch_assoc($rsGroupMembers);
$totalRows_rsGroupMembers = mysql_num_rows($rsGroupMembers);

// create an array of options for the players dropdown
$playerOptions = array();
do{
  $playerOptions[] = '<option value="' . $row_rsGroupMembers['player_handle'] . '">' . $row_rsGroupMembers['player_handle'] . '</option>';
} while ($row_rsGroupMembers = mysql_fetch_assoc($rsGroupMembers));


// get the classes and its starting items/skills
$query_rsClasses = sprintf("SELECT * FROM tbclasses");
$rsClasses = mysql_query($query_rsClasses, $dbDescent) or die(mysql_error());
$row_rsClasses = mysql_fetch_assoc($rsClasses);
$totalRows_rsClasses = mysql_num_rows($rsClasses);

// Create arrays for the classes that belong to each archetype
$classesWarrior = array();
$classesMage = array();
$classesScout = array();
$classesHealer = array();
do{
  // FIX ME: Make value an id $row_rsClasses['class_id'] instead of the name (change in database)
  if ($row_rsClasses['class_archetype'] == "Warrior"){
    $classesWarrior[] = '<option value="' . $row_rsClasses['class_name'] . '">' . $row_rsClasses['class_name'] . '</option>';
  } else if ($row_rsClasses['class_archetype'] == "Mage"){
    $classesMage[] = '<option value="' . $row_rsClasses['class_name'] . '">' . $row_rsClasses['class_name'] . '</option>';
  } else if ($row_rsClasses['class_archetype'] == "Scout"){
    $classesScout[] = '<option value="' . $row_rsClasses['class_name'] . '">' . $row_rsClasses['class_name'] . '</option>';
  } else if ($row_rsClasses['class_archetype'] == "Healer"){
    $classesHealer[] = '<option value="' . $row_rsClasses['class_name'] . '">' . $row_rsClasses['class_name'] . '</option>';
  } 

} while ($row_rsClasses = mysql_fetch_assoc($rsClasses));


$classes_set = 0;
$UniqueS = 0;
$UniqueP = 0;
// if any of the heroId's are set, that means that the classes and players have been set
if ((isset($_POST['heroId1'])) || (isset($_POST['heroId2'])) || (isset($_POST['heroId3'])) || (isset($_POST['heroId4']))){
  $classes_set = 1;
}

// POST
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "save-heroes-form")) {
  $saveHeroes = array();
    // add hero 1 data to an array
    $saveHeroes[0] = array(
      "id" => $_POST['heroId1'],
      "class" => $_POST['class1'],
      "player" => $_POST['player1'],
    );
    // add hero 2 data to an array
    $saveHeroes[1] = array(
      "id" => $_POST['heroId2'],
      "class" => $_POST['class2'],
      "player" => $_POST['player2'],
    );
    // add hero 3 data to an array, if there is a third hero
    if (isset($_POST['heroId3'])){
      $saveHeroes[2] = array(   
        "id" => $_POST['heroId3'],
        "class" => $_POST['class3'],
        "player" => $_POST['player3'],  
      );
    }
    // add hero 4 data to an array, if there is a fourth hero
    if (isset($_POST['heroId4'])){
      $saveHeroes[3] = array(
        "id" => $_POST['heroId4'],
        "class" => $_POST['class4'],
        "player" => $_POST['player4'],
      );
    }


  // Create an array with all data so we can check if Classes & Players are unique
  $listHeroes = array();
  $listClasses = array();
  $listPlayers = array();
  if (isset($_POST['heroId1'])){
    $listHeroes[] = $_POST['heroId1'];
    $listClasses[] = $_POST['class1'];
    $listPlayers[] = $_POST['player1'];
  } 
  if (isset($_POST['heroId2'])){
    $listHeroes[] = $_POST['heroId2'];
    $listClasses[] = $_POST['class2'];
    $listPlayers[] = $_POST['player2'];
  } 
  if (isset($_POST['heroId3'])){
    $listHeroes[] = $_POST['heroId3'];
    $listClasses[] = $_POST['class3'];
    $listPlayers[] = $_POST['player3'];
  } 
  if (isset($_POST['heroId4'])){
    $listHeroes[] = $_POST['heroId4'];
    $listClasses[] = $_POST['class4'];
    $listPlayers[] = $_POST['player4'];
  } 

  // here we get a count of the unique values in an array, compared to a count of the same array with all it's values
  $UniqueS = 1;
  if (count(array_unique($listClasses)) !== count($listClasses)) {
    $UniqueS = 0;
  }
  $UniqueP = 1;
  if (count(array_unique($listPlayers)) !== count($listPlayers)) {
    $UniqueP = 0;
  }




  // if Classes or Player aren't duplicates, we can save POST to the database
  if($UniqueS == 1 && $UniqueP == 1){
    
      foreach ($saveHeroes as $xshdb){
        // Save Character
        $insertSQL = sprintf("INSERT INTO tbcharacters (char_ggrp_id, char_game_id, char_player, char_hero, char_class) VALUES (%s, %s, %s, %s, %s)",
                                GetSQLValueString(20, "int"),
                                GetSQLValueString(40, "int"),
                                GetSQLValueString($xshdb['player'], "text"),
                                GetSQLValueString($xshdb['id'], "int"),
                                GetSQLValueString($xshdb['class'], "text"));

        $Result1 = mysql_query($insertSQL, $dbDescent) or die(mysql_error());
        $Result1ID = mysql_insert_id();

        $query_rsStarting = sprintf("SELECT * FROM tbclasses WHERE class_name = %s", GetSQLValueString($xshdb['class'], "text"));
        $rsStarting = mysql_query($query_rsStarting, $dbDescent) or die(mysql_error());
        $row_rsStarting = mysql_fetch_assoc($rsStarting);
        $totalRows_rsStarting = mysql_num_rows($rsStarting);

        // Save Starting item 1
        if ($row_rsStarting['class_item_id1'] != NULL) {
          $insertSQL2 = sprintf("INSERT INTO tbitems_aquired (aq_item_id, aq_char_id, aq_game_id) VALUES (%s, %s, %s)",
                                GetSQLValueString($row_rsStarting['class_item_id1'], "int"),
                                GetSQLValueString($Result1ID, "int"),
                                GetSQLValueString(40, "int"));

          $Result2 = mysql_query($insertSQL2, $dbDescent) or die(mysql_error());
        }

        // Save Starting item 2
        if ($row_rsStarting['class_item_id2'] != NULL) {
          $insertSQL2 = sprintf("INSERT INTO tbitems_aquired (aq_item_id, aq_char_id, aq_game_id) VALUES (%s, %s, %s)",
                                GetSQLValueString($row_rsStarting['class_item_id2'], "int"),
                                GetSQLValueString($Result1ID, "int"),
                                GetSQLValueString(40, "int"));

          $Result2 = mysql_query($insertSQL2, $dbDescent) or die(mysql_error());
        }

        // Save Starting Skill
        if ($row_rsStarting['class_skill_id'] != NULL) {
          $insertSQL3 = sprintf("INSERT INTO tbskills_aquired (spendxp_skill_id, spendxp_char_id, spendxp_game_id) VALUES (%s, %s, %s)",
                                GetSQLValueString($row_rsStarting['class_skill_id'], "int"),
                                GetSQLValueString($Result1ID, "int"),
                                GetSQLValueString(40, "int"));

          $Result3 = mysql_query($insertSQL3, $dbDescent) or die(mysql_error());
        }
      }

    //$insertGoTo = "campaign_overview.php?urlGamingID=" . $gameID;
    $insertGoTo = "../campaign_overview.php?urlGamingID=" . '40';
    header(sprintf("Location: %s", $insertGoTo));
  } else {
    $heroes_set = 1;
    $selectedHeroes = array();
    foreach ($listHeroes as $xlh){
      $query_rsSetHeroes = sprintf("SELECT * FROM tbheroes WHERE hero_id = %s", GetSQLValueString($xlh, "int"));
      $rsSetHeroes = mysql_query($query_rsSetHeroes, $dbDescent) or die(mysql_error());
      $row_rsSetHeroes = mysql_fetch_assoc($rsSetHeroes);
      $totalRows_rsSetHeroes = mysql_num_rows($rsSetHeroes);

      //create an array with data of the selected heroes  
      $selectedHeroes[] = array(
          "id" => $row_rsSetHeroes['hero_id'],
          "img" => $row_rsSetHeroes['hero_img'],
          "name" => $row_rsSetHeroes['hero_name'],
      );
      $totalHeroes += 1;
    }
  }
}



?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../content.css">
    <title>Descent 2nd Edition Campaign Tracker</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      var pictureList = [ 
        "../img/heroes/nohero.jpg",
        <?php foreach ($heroImages as $hi) { echo '"' . $hi . '", '; } ?>
      ];

      $('#hero1').change(function () {
          var val = parseInt($('#hero1').val());
          $('#heroimg1').attr("src",pictureList[val]);                
      });
      $('#hero2').change(function () {
          var val = parseInt($('#hero2').val());
          $('#heroimg2').attr("src",pictureList[val]);
      });
      $('#hero3').change(function () {
          var val = parseInt($('#hero3').val());
          $('#heroimg3').attr("src",pictureList[val]);

      });
      $('#hero4').change(function () {
          var val = parseInt($('#hero4').val());
          $('#heroimg4').attr("src",pictureList[val]);
      });
    });
    </script>
  </head>
  <body>
      <div class="clearfix">
        <?php if (($heroes_set == 0 || ($heroes_set == 1 && $totalHeroes < 2) || $Unique == 0) && $classes_set == 0){ ?>
        <form action="create.php" method="post" name="set-heroes-form" id="set-heroes-form">

          <div class="hero-select" class="clearfix">
            <img id="heroimg1" src="../img/heroes/nohero.jpg" />
            <select id="hero1" name="select_hero1">
              <option value="0" id="overlord">No Hero</option>
              <?php foreach ($heroOptions as $ho) { echo $ho; } ?>
            </select>
          </div>

          <div class="hero-select" class="clearfix">
            <img id="heroimg2" src="../img/heroes/nohero.jpg" />
            <select id="hero2" name="select_hero2">
              <option value="0" id="overlord">No Hero</option>
              <?php foreach ($heroOptions as $ho) { echo $ho; } ?>
            </select>
          </div>
        
          <div class="hero-select" class="clearfix">
            <img id="heroimg3" src="../img/heroes/nohero.jpg" />
            <select id="hero3" name="select_hero3">
              <option value="0" id="overlord">No Hero</option>
              <?php foreach ($heroOptions as $ho) { echo $ho; } ?>
            </select>
          </div>
                  
          <div class="hero-select" class="clearfix">
            <img id="heroimg4" src="../img/heroes/nohero.jpg" />
            <select id="hero4" name="select_hero4">
              <option value="0" id="overlord">No Hero</option>
              <?php foreach ($heroOptions as $ho) { echo $ho; } ?>
            </select>
          </div>
          <input name="buttonSaveHeroes" type="submit" id="buttonSaveHeroes" value="Select Heroes" />
          <input type="hidden" name="MM_insert" value="set-heroes-form" />
        </form>
      <?php } else if(($heroes_set == 1 && $totalHeroes >= 2 && $Unique == 1) || ($classes_set == 1 && $UniqueS == 0) || ($classes_set == 1 && $UniqueP == 0)){ ?>
        <form action="create.php" method="post" name="save-heroes-form" id="save-heroes-form">
          <?php $ip = 1; ?>
        	<?php foreach ($selectedHeroes as $xsh){ ?>
        	<div class="hero-select" class="clearfix">
        		<img src="../img/heroes/<?php echo $xsh['img'] ?>" />
        		<?php if (in_array($xsh['id'], $isWarrior)){ ?>
        			<select id="class_hero1" name="class<?php echo $ip; ?>">
              	<?php foreach ($classesWarrior as $cw) { echo $cw; } ?>
            	</select>
            <?php } else if (in_array($xsh['id'], $isMage)){ ?>
            	<select id="class_hero1" name="class<?php echo $ip; ?>">
              	<?php foreach ($classesMage as $cm) { echo $cm; } ?>
            	</select>
            <?php } else if (in_array($xsh['id'], $isScout)){ ?>
            	<select id="class_hero1" name="class<?php echo $ip; ?>">
              	<?php foreach ($classesScout as $cs) { echo $cs; } ?>
            	</select>
            <?php } else if (in_array($xsh['id'], $isHealer)){ ?>
            	<select id="class_hero1" name="class<?php echo $ip; ?>">
              	<?php foreach ($classesHealer as $ch) { echo $ch; } ?>
            	</select>
            <?php } ?>
            <input type="hidden" name="heroId<?php echo $ip; ?>" value="<?php echo $xsh['id']; ?>" />
            <select id="class_hero1" name="player<?php echo $ip; ?>" value="player<?php echo $ip; ?>">
                <?php foreach ($playerOptions as $po) { echo $po; } ?>
            </select>
        		
        	</div>
        	<?php $ip++; } ?>
          
          <input name="buttonSaveClasses" type="submit" id="buttonSaveClasses" value="Save Heroes" />
          <input type="hidden" name="MM_insert" value="save-heroes-form" />

        </form>
        <?php } ?>
        <?php if ($heroes_set == 1 && $totalHeroes < 2){ echo '<div class="error">Select at least 2 heroes.</div>'; } ?>
        <?php if ($heroes_set == 1 && $Unique == 0){ echo '<div class="error">Selection contained duplicate heroes.</div>'; } ?>
        <?php if($classes_set == 1 && $UniqueS == 0){ echo '<div class="error">Selection contained duplicate classes.</div>'; } ?>
        <?php if($classes_set == 1 && $UniqueP == 0){ echo '<div class="error">Selection contained duplicate players.</div>'; } ?>
      </div>

      


  </body>
</html>

<!-- <input type='checkbox' name='heroes[]' value='valuable' id="<?php print $short; ?>" class="herocheck"/><label for="<?php print $short; ?>" style="background: url('../img/heroes/<?php print $row_rsHeroes['hero_img']; ?>');"></label>  -->

<!--
<div id="heroselect" class="clearfix">
        <?php
          do{
        
          $short = $row_rsHeroes['hero_name'];
          $short = strtolower($short);
          $short = str_replace(" ","_",$short);
          $short = preg_replace("/[^A-Za-z0-9_]/","",$short);

        ?>
          <div class="select-hero">
            <div class="select-hero-image" style="background: url('../img/heroes/<?php print $row_rsHeroes['hero_img']; ?>'); background-size: cover;"><div class="hero-name"><?php print $row_rsHeroes['hero_name']; ?></div></div>
            <div><input type='checkbox' name='heroes[]' value='valuable' id="<?php print $short; ?>" class="herocheck"/></div>
          </div>  
        <?php } while ($row_rsHeroes = mysql_fetch_assoc($rsHeroes)); ?>
      </div>

-->