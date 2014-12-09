<?php

//select the database
mysql_select_db($database_dbDescent, $dbDescent);

$query_rsHeroes = sprintf("SELECT * FROM tbheroes WHERE hero_name != %s", GetSQLValueString("Overlord", "text"));
$rsHeroes = mysql_query($query_rsHeroes, $dbDescent) or die(mysql_error());
$row_rsHeroes = mysql_fetch_assoc($rsHeroes);
$totalRows_rsHeroes = mysql_num_rows($rsHeroes);

$heroImages = array();
$heroOptions = array();

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


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$heroes_set = 0;
if ((isset($_POST['select_hero1'])) || (isset($_POST['select_hero2'])) || (isset($_POST['select_hero3'])) || (isset($_POST['select_hero4']))){
  $heroes_set = 1;
}

$totalHeroes = 0;

if (isset($_POST['select_hero1']) && $_POST['select_hero1'] != 0){
  $hero_id1 = $_POST['select_hero1'];
  $totalHeroes += 1;
} else {
	 $hero_id1 = 9999; // random number that will never be found in the db
}

if (isset($_POST['select_hero2']) && $_POST['select_hero2'] != 0){
  $hero_id2 = $_POST['select_hero2'];
  $totalHeroes += 1;
} else {
	 $hero_id2 = 9999; // random number that will never be found in the db
}

if (isset($_POST['select_hero3']) && $_POST['select_hero3'] != 0){
  $hero_id3 = $_POST['select_hero3'];
  $totalHeroes += 1;
} else {
	 $hero_id3 = 9999; // random number that will never be found in the db
}

if (isset($_POST['select_hero4']) && $_POST['select_hero4'] != 0){
  $hero_id4 = $_POST['select_hero4'];
  $totalHeroes += 1;
} else {
	 $hero_id4 = 9999; // random number that will never be found in the db
}

$query_rsSetHeroes = sprintf("SELECT * FROM tbheroes WHERE hero_id = %s OR hero_id = %s OR hero_id = %s OR hero_id = %s", 
											GetSQLValueString($hero_id1, "int"), 
											GetSQLValueString($hero_id2, "int"),
											GetSQLValueString($hero_id3, "int"),
											GetSQLValueString($hero_id4, "int"));
$rsSetHeroes = mysql_query($query_rsSetHeroes, $dbDescent) or die(mysql_error());
$row_rsSetHeroes = mysql_fetch_assoc($rsSetHeroes);
$totalRows_rsSetHeroes = mysql_num_rows($rsSetHeroes);

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



$query_rsClasses = sprintf("SELECT * FROM tbclasses");
$rsClasses = mysql_query($query_rsClasses, $dbDescent) or die(mysql_error());
$row_rsClasses = mysql_fetch_assoc($rsClasses);
$totalRows_rsClasses = mysql_num_rows($rsClasses);

$classesWarrior = array();
$classesMage = array();
$classesScout = array();
$classesHealer = array();
do{
  
  if ($row_rsClasses['class_archetype'] == "Warrior"){
    $classesWarrior[] = '<option value="' . $row_rsClasses['class_id'] . '">' . $row_rsClasses['class_name'] . '</option>';
  } else if ($row_rsClasses['class_archetype'] == "Mage"){
    $classesMage[] = '<option value="' . $row_rsClasses['class_id'] . '">' . $row_rsClasses['class_name'] . '</option>';
  } else if ($row_rsClasses['class_archetype'] == "Scout"){
    $classesScout[] = '<option value="' . $row_rsClasses['class_id'] . '">' . $row_rsClasses['class_name'] . '</option>';
  } else if ($row_rsClasses['class_archetype'] == "Healer"){
    $classesHealer[] = '<option value="' . $row_rsClasses['class_id'] . '">' . $row_rsClasses['class_name'] . '</option>';
  } 

} while ($row_rsClasses = mysql_fetch_assoc($rsClasses));


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
        <?php if ($heroes_set == 0 || ($heroes_set == 1 && $totalHeroes < 2)){ ?>
        <?php if ($heroes_set == 1 && $totalHeroes < 2){ echo "Select at least 2 heroes"; } ?>
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

          <input name="buttonSaveHeroes" type="submit" id="buttonSaveHeroes" value="Save Heroes" />
        </form>
      <?php } else if($heroes_set == 1 && $totalHeroes >= 2){ ?>
        <form action="<?php echo $editFormAction; ?>" method="post" name="save-heroes-form" id="save-heroes-form">

        	<?php foreach ($selectedHeroes as $xsh){ ?>
        	<div class="hero-select" class="clearfix">
        		<img src="../img/heroes/<?php echo $xsh['img'] ?>" />
        		<?php if (in_array($xsh['id'], $isWarrior)){ ?>
        			<select id="class_hero1">
              	<?php foreach ($classesWarrior as $cw) { echo $cw; } ?>
            	</select>
            <?php } else if (in_array($xsh['id'], $isMage)){ ?>
            	<select id="class_hero1">
              	<?php foreach ($classesMage as $cm) { echo $cm; } ?>
            	</select>
            <?php } else if (in_array($xsh['id'], $isScout)){ ?>
            	<select id="class_hero1">
              	<?php foreach ($classesScout as $cs) { echo $cs; } ?>
            	</select>
            <?php } else if (in_array($xsh['id'], $isHealer)){ ?>
            	<select id="class_hero1">
              	<?php foreach ($classesHealer as $ch) { echo $ch; } ?>
            	</select>
            <?php } ?>
        		
        	</div>
        	<?php } ?>

          <input name="buttonSaveClasses" type="submit" id="buttonSaveClasses" value="Save Classes" />

        </form>
        <?php } ?>
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