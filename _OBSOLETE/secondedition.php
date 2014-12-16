<?php require_once('Connections/dbDescent.php'); ?>
<?php require_once('Connections/dbDescent.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_dbDescent, $dbDescent);
$query_rsTerrain = "SELECT terrian_name, terrian_description, terrian_image FROM terrain ORDER BY terrian_name ASC";
$rsTerrain = mysql_query($query_rsTerrain, $dbDescent) or die(mysql_error());
$row_rsTerrain = mysql_fetch_assoc($rsTerrain);
$totalRows_rsTerrain = mysql_num_rows($rsTerrain);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV="REFRESH" />
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META NAME="description" CONTENT="Descent Mobile Quick Guides is a Reference guide to the table top stagety game Descent Journeys in the Dark, Descent Road to Legend and Descent Sea of Blood">
<META NAME="keywords" CONTENT="Descent Journeys in the dark, Road to Legend, Sea of Blood, SoB, RtL, JitD, Descent" />

<link rel="shortcut icon" href=".\favicon.ico" >
<link rel="shortcut icon" href="descentIcon.gif" type="image/gif" />
<link rel="icon" href="descentIcon.gif" type="image/gif" /> 
<link rel="apple-touch-icon" href="apple-touch-icon.png"/>

  
<title>Descent Mobile Quick Guides</title>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript">

</script>
<script src="SpryAssets/SpryTooltip.js" type="text/javascript"></script>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.normal {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 10px;
	color: #FFF;
}
body,td,th {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 10px;
}
.headerTable {
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #000;
	font-size: 10px;
	font-weight: bold;
}
.background {
	background-image: url(images/wallpaper.jpg);
	background-repeat: repeat-y;
	background-position: 0px 0px;
	background-color: #000;
}
.footer {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 9px;
	color: #FFF;
}
.header {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 14px;
	font-style: normal;
	font-weight: bold;
	color: #FFF;
}
a:link {
	color: #FFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFF;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
-->
</style>
<style type="text/css">
<!--
body {
	background-color: #000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>

<link href="SpryAssets/SpryTooltip.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<table width="425" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="425" align="center" valign="top" class="background"> <p><a href="index.html" target="_top"><img src="images/descentLogo.png" width="360" height="106" hspace="0" vspace="0" border="0" align="top" /></a></p>
      <strong><em>      </em></strong>
      <table width="375" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" class="normal">Descent: Journeys in the Dark 2nd Edition, is the base core game, this quick reference guide is to speed up looking throught the rule book, still a work in progress........</td>
        </tr>
      </table>
      <p><strong><em>updated 9/02/2014</em></strong></p>
      <p class="header"><em><strong><a href="secondedition.php">Game Setup</a></strong></em> | Campaign | Hero/Overlord Turns | <em><strong>Combat</strong></em> </p>
      <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center"><div id="apt1vanilla" class="Accordion" tabindex="0">
            <div class="AccordionPanel">
              <div class="AccordionPanelTab" id="apt2GameSetup">Game Set Up</div>
              <div class="AccordionPanelContent" id="apc3HeroSetup">
                <p>
                <table width="350" border="0" cellspacing="0" cellpadding="15">
                            <tr>
                              <td><p><strong>General Setup</strong><br />
                                Before playing, set up the game as follows:</p>
                                <ol>
                                  <li><em><strong>Choose Quest:
                                  Descent: Journeys in the Dark Second Edition</strong></em> includes 16 unique quests (along with 4 campaign-specific quests) with specific setup instructions and objectives for both the heroes and the overlord. When choosing which quest to play, refer to the Quest Guide. For a player's first game, we suggest choosing "First Blood," an introductory quest.                                    </li>
                                  <br /><li><em><strong>Assemble Map:</strong></em> Players refer to the chosen quest's "Encounter 1" diagram in the Quest Guide to assemble the map. Place any doors used in the quest as indicated in the Quest Guide.                                  </li>
                                  <br /><li><em><strong>Choose Player Roles:</strong></em> Players decide who will take on the role of the overlord. It is recommended that the most experienced player take on this role. All other players take on the roles of the heroes. If all players do not agree, then this decision is made randomly (such as by rolling a die).
                                    <br />
                                    <br /></li>
                                  <li><em><strong>Prepare Tokens:</strong></em> Sort all damage, fatigue, hero, and condition tokens into piles by type. Place each pile of tokens within easy reach of all players.
                                    <br /><br />
                                    </li>
                                  <li><em><strong>Assemble Search Deck and Condition Cards:</strong></em> Take all the Search cards and shuffle them together. Place the Search deck facedown within easy reach of the hero players. Place the Condition cards in separate piles based on their type, within easy reach of all players.</li>
                              </ol></td>
                      </tr>
                          </table>
</p>
               
              </div>
            </div>
            <div class="AccordionPanel">
              <div class="AccordionPanelTab">Hero Setup</div>
              <div class="AccordionPanelContent">
               <table width="350" border="0" cellspacing="0" cellpadding="15">
                            <tr>
                              <td>
                              <strong>Hero Setup</strong> <br />
                              After completing General Setup, the hero players continue setup as follows. The overlord player then performs Overlord Setup (see "<a href="#overlordsetup" target="_self" style="color: #CC0000">Overlord Setup</a>").
1.
Take Activation Cards and Hero Tokens:
Each hero player chooses
one Activation card and takes the hero tokens of the corresponding
color.
2.
Choose Heroes:
All hero players must agree on which player controls
which hero. Each hero player chooses one Hero sheet and takes the
corresponding hero figure. In a two-player game, the lone hero player
controls two different heroes (see "Two-player Game" on page 18).
3.
Choose Classes:
Each hero player chooses one Class deck matching
his chosen hero's archetype icon (printed on his Hero sheet; see
"Hero Archetypes" on page 4). Each archetype has different
classes available; there are two such classes available for each archetype
in the game, each one defining which skills are available to a hero of
that class. Any Class deck belonging to a class not chosen is returned
to the game box.
When a player chooses a class for his hero, he takes the deck of cards
for that class (see "Class Card Anatomy" on page 8). This Class
deck includes the starting equipment for the hero, as well as all of
the skills associated with that class. A player may not select a hero
class that does not match the archetype icon shown on the hero's
Hero sheet. Furthermore, a player may not select a class that has been
chosen by another player.
4.
Choose Skills:
Every hero begins the game with the basic skill (the
skill card with no experience icon) and starting equipment from his
Class deck.
When playing the basic game, all other skills are returned to the game
box. These skills are only used if playing a campaign or using the Epic
Play variant (see "Campaign Rules" and "Epic Play" on page 19).
5.
Place Heroes:
Each player places his hero figure on the map in the
area indicated by the quest rules for hero setup. This is typically on an
entrance tile.</td>
                            </tr>
                          </table>
               
               
                             </div>
            </div>
            <div class="AccordionPanel">
              <div class="AccordionPanelTab"><a name="overlordsetup">Overlord Setup</a></div>
              <div class="AccordionPanelContent">
                <table width="350" border="0" cellspacing="0" cellpadding="15">
  <tr>
    <td>
      <p><strong>Overlord Setup</strong><br /> The overlord player performs the following steps after hero players
        perform Hero Setup (see "Hero Setup").        </p>
      <ol>
        <li> <em><strong>Choose Monsters:</strong></em> The Quest Guide lists the monster group options
          available to the overlord for the chosen quest. He takes the Act I
          Monster cards and figures for the chosen monster groups and places
          them in front of him. See "Monsters" on page 2 of the Quest Guide
          for more rules on choosing monsters.
          Many quests also feature a specific lieutenant that the overlord uses
          during the quest. The overlord player takes the appropriate Act I
          Lieutenant card and token and places them in front of him.          </li>
        <br />
        <li>
          <em><strong>Perform Quest Setup:</strong></em> The overlord refers to the "Setup" section of
          the chosen quest and follows the instructions listed. This includes
          placing monster figures, objective tokens, search tokens, and villager
          tokens as indicated on the quest map.</li>
        <br />
        <li> 
          <em><strong>Create Overlord Deck:</strong></em> The overlord player shuffles the 15 basic
          Overlord cards to create his Overlord deck.
          When playing the basic game, all other Overlord cards are returned
          to the game box. These cards are only used if playing a campaign or if
          using the Epic Play variant (see "Campaign Rules" and "Epic Play" on
          page 19).</li>
          <br />
        <li> <em><strong>Draw Overlord Cards:</strong></em> The overlord player draws a number of
          Overlord cards
          equal to the number of heroes
          into his hand (see
          "Overlord Cards" on page 16).
          After players have finished Hero Setup and Overlord Setup, they are
          ready to begin playing the game.</li>
      </ol></td>
  </tr>
</table>
              </div>
            </div>
            <div class="AccordionPanel">
              <div class="AccordionPanelTab">Town</div>
              <div class="AccordionPanelContent">
                
                buying from the store and skills
              </div>
            </div>
            <div class="AccordionPanel">
              <div class="AccordionPanelTab">Equipment</div>
              <div class="AccordionPanelContent">
                <div id="equipment" class="Accordion2" tabindex="0">
                  <div class="AccordionPanel">
                    <div class="AccordionPanelTab2">Hero Equipment Limits</div>
                    <div class="AccordionPanelContent">
                      <table width="350" border="0" cellspacing="0" cellpadding="15">
  <tr>
    <td>
    EQUIPMENT LIMITS<br />
These equip icons represent certain equipping restrictions:
H
and
S
a
r
M
or
o
t
H
er
•
Heroes have two hands. The combination of items they equip cannot
have more than two hand icons in total.
•
A hero can equip only 1 Armor item.
•
A hero can equip up to 2 Other items.
Cards that do not contain at least one of these icons can be equipped
without restriction. These cards remain faceup near the Hero sheet and
can be used as specified on the card.
</td>
  </tr>
</table>

                    </div>
                  </div>
                  <div class="AccordionPanel">
                    <div class="AccordionPanelTab2">Cursed Items</div>
                    <div class="AccordionPanelContent">
                      <table width="350" border="0" align="center" cellpadding="5" cellspacing="0">
                        <col width="38" />
                        <tr>
                          <td width="350">* Any    time a hero equips a cursed item, he receives one curse token.</td>
                        </tr>
                        <tr>
                          <td>* If the hero is killed, he    must immediately either discard or re-equip any cursed items he had equipped    when he died.</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="AccordionPanel">
                    <div class="AccordionPanelTab2">Dark Relics</div>
                    <div class="AccordionPanelContent">
                      <table width="350" border="0" align="center" cellpadding="5" cellspacing="0">
                        <col width="38" />
                        <tr>
                          <td width="350">OL spends    treachery to swap at least one copy of the “Dark Relic” overlord card into    his deck.</td>
                        </tr>
                        <tr>
                          <td>OL substitutes any dark relic    of his choice from the deck of dark relics for one of the treasure cards the    heroes were about to receive.</td>
                        </tr>
                        <tr>
                          <td>The hero who receives a dark    relic must immediately equip it, un-equipping other items to do so if    necessary.</td>
                        </tr>
                        <tr>
                          <td>The hero cannot unequip or    drop the dark relic.</td>
                        </tr>
                        <tr>
                          <td>The only way to get rid of a    dark relic normally is to die, at which point any dark relics the hero is    carrying are discarded.</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="AccordionPanel">
                    <div class="AccordionPanelTab2">Potions</div>
                    <div class="AccordionPanelContent">
                      <table width="350" border="0" align="center" cellpadding="5" cellspacing="0">
                        <col width="38" />
                        <col width="32" />
                        <tr>
                          <td colspan="2">* Each    hero may only drink 1 equiped potion (of any type) each turn. (FaQ)</td>
                          </tr>
                        <tr>
                          <td colspan="2">* All potions are returned to    the Market when the effects of that potion end.  (FaQ)</td>
                          </tr>
                        <tr>
                          <td colspan="2">* When a hero picks up a    potion, he may immediately equip it for free if he doesn’t already have 3    equipped potions.</td>
                          </tr>
                        <tr>
                          <td width="26"></td>
                          <td width="304">* He may place the potion in his pack if it isn’t already    carrying 3 unequipped items.</td>
                        </tr>
                      </table>
                      <div id="potion" class="Accordion3" tabindex="0">
                        <div class="AccordionPanel">
                          <div class="AccordionPanelTab3">Healing Potion</div>
                          <div class="AccordionPanelContent">
                            <table width="325" border="0" align="center" cellpadding="5" cellspacing="0">
                              <tr>
                                <td width="325">* A hero    who drinks a healing potion recovers three wounds (not to exceed his maximum    wounds).</td>
                              </tr>
                            </table>
                          </div>
                        </div>
                        <div class="AccordionPanel">
                          <div class="AccordionPanelTab3">Invisibility Potion (ToI)</div>
                          <div class="AccordionPanelContent">
                            <table width="325" border="0" align="center" cellpadding="5" cellspacing="0">
                              <col width="32" />
                              <col width="39" />
                              <tr>
                                <td colspan="2">* When a hero drinks an invisibility potion, his player    places the potion marker on top of his hero’s picture on his hero sheet.</td>
                              </tr>
                              <tr>
                                <td colspan="2">*    While the invisibility potion marker remains on the hero, that hero gains the    Stealth ability</td>
                              </tr>
                              <tr>
                                <td colspan="2">*    At the start of his turn, that hero must roll a power die.</td>
                              </tr>
                              <tr>
                                <td width="29"></td>
                                <td width="276">If    the result is a surge, the invisibility potion wears off, and the    invisibility potion marker is removed from the hero sheet. </td>
                              </tr>
                              <tr>
                                <td></td>
                                <td>All other die results have no effect.</td>
                              </tr>
                              <tr>
                                <td colspan="2">*    A hero cannot have more than one type of potion active at a time. </td>
                              </tr>
                              <tr>
                                <td></td>
                                <td>A hero who drinks a new potion while an old potion marker    remains on his hero sheet must remove the previously placed marker, which is    then replaced by the new one.</td>
                              </tr>
                            </table>
                          </div>
                        </div>
                        <div class="AccordionPanel">
                          <div class="AccordionPanelTab3">Invulnerability Potion (AoD)</div>
                          <div class="AccordionPanelContent">
                            <table width="325" border="0" align="center" cellpadding="5" cellspacing="0">
                              <col width="32" />
                              <col width="39" />
                              <tr>
                                <td colspan="2">* A hero who drinks an invulnerability potion places the    potion marker on top of his hero’s picture on his hero sheet.</td>
                              </tr>
                              <tr>
                                <td colspan="2">*    Any time the hero is struck by an enemy attack, he may discard the    invulnerability potion from his hero sheet portrait after the attack roll is    made to gain +10 Armor against that attack.</td>
                              </tr>
                              <tr>
                                <td colspan="2">*    This effect is canceled if the hero drinks another potion before using    it. </td>
                              </tr>
                              <tr>
                                <td width="26"></td>
                                <td width="279">* Otherwise, the potion remains in effect until the hero    discards the token or dies.</td>
                              </tr>
                            </table>
                          </div>
                        </div>
                        <div class="AccordionPanel">
                          <div class="AccordionPanelTab3">Power Potions (WoD)</div>
                          <div class="AccordionPanelContent">
                            <table width="325" border="0" align="center" cellpadding="5" cellspacing="0">
                              <col width="32" />
                              <tr>
                                <td width="325">*    A hero who drinks a power potion rolls all 5 power dice on his next             attack. </td>
                              </tr>
                              <tr>
                                <td>* The attack does not have to    be made on the same turn that the potion is drunk, but the effect is canceled    if the hero is killed or drinks another potion before making<br />
                                  an attack.</td>
                              </tr>
                            </table>
                          </div>
                        </div>
                        <div class="AccordionPanel">
                          <div class="AccordionPanelTab3">Vitality Potion</div>
                          <div class="AccordionPanelContent">
                            <table width="325" border="0" align="center" cellpadding="5" cellspacing="0">
                              <tr>
                                <td width="325">*    Restores Hero's fatigue to its maximum value, just as if he had used a rest    order.</td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                      <p>&nbsp;</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<div class="AccordionPanel">
  <div class="AccordionPanelTab">OverLord Cards</div>
              <div class="AccordionPanelContent">
                
                Overlord Cards
Overlord cards represent the different powers of
the overlord and provide an element of surprise to
the heroes. The Overlord deck consists of 15 basic
Overlord cards. If players use the Epic Play or
campaign rules, the overlord player may modify
his deck with upgraded cards (see "Spending
Experience Points: Overlord" on page 20).
At the beginning of his turn, the overlord player
draws one Overlord card. He adds this card to his
hand, which is kept hidden from the hero players. There is no cost to play
an Overlord card and no limit to how many cards the overlord player can
play during his turn.
Each card specifies when it may be played. Two Overlord cards with the
same name cannot be played on the same target in response to the same
triggering condition. After resolving the effects of an Overlord card, place
it faceup in the discard pile.
Example: During his turn, the overlord player decides to activate his zombie
monster group. After moving one of his zombie figures, he plays "Frenzy"
on that figure, which reads "Play this card on a monster during your turn."
The overlord player cannot play an additional "Frenzy" on that particular
zombie during his turn. However, he may play another "Frenzy" card on a
different zombie during his turn.
In certain quests, the overlord player may discard Overlord cards to
trigger special abilities. Refer to the text in the Quest Guide for any
special abilities related to the quest.
The overlord player has no hand limit for Overlord cards. When the
overlord player draws the last card from his deck, he simply shuffles the
discard pile to create a new deck.
              </div>
          </div>
<div class="AccordionPanel">
  <div class="AccordionPanelTab">Familiars & Companions</div>
              <div class="AccordionPanelContent">
                <table width="350" border="0" cellspacing="0" cellpadding="15">
  <tr>
    <td>database of familiars and companions</td>
  </tr>
</table>
              </div>
          </div>
            <!-- Obstacles and Props -->
            
            <div class="AccordionPanel">
              <div class="AccordionPanelTab">Obstacles & Props</div>
              <div class="AccordionPanelContent">
                <table cellpadding="5" cellspacing="5" id="tbObstacles">
                  <?php do { ?><tr>
                    <td align="left" bgcolor="#999999" class="headerTable"><?php echo $row_rsTerrain['terrian_name']; ?></td>
                    </tr>
                  
                    <tr>
                      <td><img src="images/props/<?php echo $row_rsTerrain['terrian_image']; ?>" height="100" align="left" /><?php echo $row_rsTerrain['terrian_description']; ?></td>
                    </tr>
                    <?php } while ($row_rsTerrain = mysql_fetch_assoc($rsTerrain)); ?>
                </table>
            </div>
            </div>
            <!-- Obstacles and Props END-->
            
            
            
            </div></td>
        </tr>
      </table>
      
<p class="normal"><a href="index.html" target="_top">Home</a> | <a href="vanilla.html" target="_top">Vanilla</a> | <a href="rtl.html" target="_top">RtL</a> | SoB</p>
      
      <p class="footer"><a href="http://sciscoedesigns.com" target="_blank"><em>hosted by sciscoeDesigns</em></a></p></td>
</tr>
</table>




<p>&nbsp;</p>

<script type="text/javascript">
<!--
var Accordion1 = new Spry.Widget.Accordion("apt1vanilla",{enableAnimation: false, useFixedPanelHeights: false, defaultPanel: -1 });

var Accordion7 = new Spry.Widget.Accordion("equipment",{enableAnimation: false, useFixedPanelHeights: false, defaultPanel: -1 });

//-->
</script>
</body>
</html>
<?php
mysql_free_result($rsTerrain);
?>
