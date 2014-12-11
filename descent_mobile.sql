-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 12 dec 2014 om 00:11
-- Serverversie: 5.6.21
-- PHP-versie: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `descent_mobile`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbcampaign`
--

CREATE TABLE IF NOT EXISTS `tbcampaign` (
  `cam_id` int(1) NOT NULL DEFAULT '0',
  `cam_name` varchar(32) DEFAULT NULL,
  `cam_type` varchar(20) NOT NULL,
  `cam_map` varchar(24) DEFAULT NULL,
  `cam_log` varchar(24) DEFAULT NULL,
  `expansion` varchar(21) DEFAULT NULL,
  `edition` varchar(3) DEFAULT NULL,
  `cam_logo` varchar(25) DEFAULT NULL,
  `cam_icon` varchar(26) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbcampaign`
--

INSERT INTO `tbcampaign` (`cam_id`, `cam_name`, `cam_type`, `cam_map`, `cam_log`, `expansion`, `edition`, `cam_logo`, `cam_icon`) VALUES
(0, 'The Shadow Rune', 'full', 'shadowRuneMap.jpg', 'shadowrune.jpg', 'Base Game 2nd Edition', '2nd', 'shadowRuneLogo.png', 'placeholder.png'),
(1, 'Lair of the Wyrm', 'mini', 'LotWmap.jpg', 'LotWlog.jpg', 'Lair of the Wyrm', '2nd', 'LairOfTheWyrmLogo.png', 'Lair-of-the-Wyrm-icon.png'),
(2, 'Labyrinth of Ruin', 'full', 'labyrinthOfRuinMap.jpg', 'LabyrinthOfRuinLog.jpg', 'Labyrinth of Ruin', '2nd', 'LabyrinthofRuneLogo.png', 'Labyrinth-of-Ruin-icon.png'),
(3, 'The Trollfens', 'mini', 'trollfensMap.jpg', 'trollfensLog.jpg', 'The Trollfens', '2nd', 'TheTrollfensLogo.png', 'The-Trollfens-icon.png'),
(4, 'Shadow of Nerekhall', 'full', 'shadowOfNerekhallMap.jpg', 'shadowOfNerekhallLog.jpg', 'Shadow of Nerekhall', '2nd', 'ShadowofNerekhallLogo.png', 'shadowsOfNerekhallicon.png'),
(5, 'Manor of Ravens', 'mini', 'manorOfRavensMap.jpg', 'manorOfRavensLog.jpg', 'Manor of Ravens', '2nd', 'manorOfRavensLogo.png', 'manorOfRavensIcon.png'),
(6, 'Crusade of the Forgotten', 'monster', NULL, NULL, NULL, '2nd', NULL, NULL),
(7, 'Oath of the Outcast', 'monster', NULL, NULL, NULL, '2nd', NULL, NULL),
(8, 'Crown of Destiny', 'monster', NULL, NULL, NULL, '2nd', NULL, NULL),
(9, 'Guardians of Deephall', 'monster', NULL, NULL, NULL, '2nd', NULL, NULL),
(99, 'Conversion Kit', 'monster', NULL, NULL, NULL, '1st', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbcharacters`
--

CREATE TABLE IF NOT EXISTS `tbcharacters` (
`char_id` int(3) NOT NULL,
  `char_ggrp_id` int(3) DEFAULT NULL,
  `char_game_id` int(3) DEFAULT NULL,
  `char_player` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `char_hero` int(3) DEFAULT NULL,
  `char_class` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `char_xp` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbcharacters`
--

INSERT INTO `tbcharacters` (`char_id`, `char_ggrp_id`, `char_game_id`, `char_player`, `char_hero`, `char_class`, `char_xp`) VALUES
(1, 7, 14, 'Tundrra', 3, 'Runemaster', 0),
(2, 7, 14, 'Nimm', 101, 'Berserker', 0),
(3, 7, 14, 'Gloki', 103, 'Wildlander', 0),
(4, 7, 14, 'Djarum', 102, 'Disciple', 0),
(5, 7, 14, 'Shared Overlord Role', 0, '', 0),
(6, 17, 38, 'dllrt', 0, 'Dragon''s Greed', 5),
(7, 17, 38, 'Maaike', 30, 'Runemaster', 4),
(8, 17, 38, 'Tim', 6, 'Thief', 4),
(9, 17, 38, 'Frauke', 2, 'Berserker', 4),
(11, 17, 39, 'Maaike', 10, 'Runemaster', 0),
(12, 17, 39, 'Frauke', 1, 'Berserker', 0),
(13, 17, 39, 'Tim', 5, 'Thief', 0),
(14, 17, 39, 'dllrt', 0, 'Dragon''s Greed', 0),
(56, 20, 47, 'Frauke', 2, 'Berserker', 0),
(57, 20, 47, 'dllrt', 4, 'Necromancer', 0),
(58, 20, 47, 'Maaike', 6, 'Wildlander', 0),
(59, 20, 47, 'Tim', 8, 'Spiritspeaker', 0),
(60, 20, 48, 'dllrt', 1, 'Berserker', 3),
(61, 20, 48, 'Frauke', 4, 'Necromancer', 3),
(62, 20, 48, 'Maaike', 5, 'Wildlander', 3),
(63, 20, 48, 'Tim', 15, 'Spiritspeaker', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbclasses`
--

CREATE TABLE IF NOT EXISTS `tbclasses` (
`class_id` int(3) NOT NULL,
  `class_name` varchar(24) NOT NULL,
  `class_archetype` varchar(20) NOT NULL,
  `class_item_id1` int(3) DEFAULT NULL,
  `class_item_id2` int(3) DEFAULT NULL,
  `class_skill_id` int(11) NOT NULL,
  `class_exp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbclasses`
--

INSERT INTO `tbclasses` (`class_id`, `class_name`, `class_archetype`, `class_item_id1`, `class_item_id2`, `class_skill_id`, `class_exp_id`) VALUES
(1, 'Berserker', 'Warrior', 40, NULL, 33, 0),
(2, 'Knight', 'Warrior', 22, 23, 153, 0),
(3, 'Necromancer', 'Mage', 15, NULL, 11, 0),
(4, 'Runemaster', 'Mage', 33, NULL, 13, 0),
(5, 'Wildlander', 'Scout', 19, NULL, 2, 0),
(6, 'Thief', 'Scout', 30, 31, 116, 0),
(7, 'Spiritspeaker', 'Healer', 36, NULL, 69, 0),
(8, 'Disciple', 'Healer', 20, 21, 14, 0),
(9, 'Champion', 'Warrior', 24, 25, 144, 1),
(10, 'Geomancer', 'Mage', 35, NULL, 79, 1),
(11, 'Beastmaster', 'Warrior', 26, 27, 135, 2),
(12, 'Hexer', 'Mage', 34, NULL, 88, 2),
(13, 'Treasure Hunter', 'Scout', 28, 29, 125, 2),
(14, 'Apothecary', 'Healer', 37, NULL, 60, 2),
(15, 'Stalker', 'Scout', 32, NULL, 115, 3),
(16, 'Prophet', 'Healer', 38, 39, 51, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbgames`
--

CREATE TABLE IF NOT EXISTS `tbgames` (
`game_id` int(3) NOT NULL,
  `game_grp_id` int(3) DEFAULT NULL,
  `game_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `game_dm` varchar(9) DEFAULT NULL,
  `game_camp_id` int(3) DEFAULT NULL,
  `game_gold` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbgames`
--

INSERT INTO `tbgames` (`game_id`, `game_grp_id`, `game_timestamp`, `game_dm`, `game_camp_id`, `game_gold`) VALUES
(14, 7, '2014-10-03 09:06:52', 'Tundrra', 0, 0),
(38, 17, '2014-11-27 06:46:16', 'dllrt', 0, 200),
(39, 17, '2014-12-03 07:47:05', 'dllrt', 2, 0),
(47, 17, '2014-12-11 17:26:47', 'dllrt', 4, 0),
(48, 17, '2014-12-11 17:28:38', 'dllrt', 0, 250);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbgroup`
--

CREATE TABLE IF NOT EXISTS `tbgroup` (
`grp_id` int(2) NOT NULL,
  `grp_name` varchar(23) DEFAULT NULL,
  `grp_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grp_startedby` varchar(9) DEFAULT NULL,
  `grp_state_country` varchar(7) DEFAULT NULL,
  `grp_city` varchar(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbgroup`
--

INSERT INTO `tbgroup` (`grp_id`, `grp_name`, `grp_creation`, `grp_startedby`, `grp_state_country`, `grp_city`) VALUES
(7, 'NORdelving', '2014-10-01 17:26:50', 'Tundrra', 'Indiana', 'Bloomington'),
(17, 'Mancave', '2014-11-27 06:43:39', 'dllrt', 'Belgium', 'Gent'),
(23, 'testing', '2014-12-07 00:41:20', 'dllrt', 'testing', 'testing');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbheroes`
--

CREATE TABLE IF NOT EXISTS `tbheroes` (
  `hero_id` int(2) NOT NULL DEFAULT '0',
  `hero_name` varchar(20) DEFAULT NULL,
  `hero_type` varchar(8) DEFAULT NULL,
  `hero_expansion` varchar(7) DEFAULT NULL,
  `hero_card` varchar(22) DEFAULT NULL,
  `hero_img` varchar(26) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbheroes`
--

INSERT INTO `tbheroes` (`hero_id`, `hero_name`, `hero_type`, `hero_expansion`, `hero_card`, `hero_img`) VALUES
(0, 'Overlord', 'Overlord', '0', 'overlord.jpg', 'overlord.jpg'),
(1, 'Syndrael', 'Warrior', '0', 'syndrael.jpg', 'syndrael.jpg'),
(2, 'Grisban the Thirsty', 'Warrior', '0', 'grisbanthethirsty.jpg', 'grisban_the_thirsty.jpg'),
(3, 'Leoric of the Book', 'Mage', '0', 'leoricofthebook.jpg', 'leoric_of_the_book.jpg'),
(4, 'Widow Tarha', 'Mage', '0', 'widowtarha.jpg', 'widow_tarha.jpg'),
(5, 'Jain Fairwood', 'Scout', '0', 'jainfairwood.jpg', 'jain_fairwood.jpg'),
(6, 'Tomble Burrowell', 'Scout', '0', 'tombleburrowell.jpg', 'tomble_burrowell.jpg'),
(7, 'Ashrian', 'Healer', '0', 'ashrian.jpg', 'ashrian.jpg'),
(8, 'Avric Albright', 'Healer', '0', 'avricalbright.jpg', 'avric_albright.jpg'),
(9, 'Reynhart The Worthy', 'Warrior', '1', 'reynhart.jpg', 'reynhart_the_worthy.jpg'),
(10, 'High Mage Quellen', 'Mage', '1', 'quellen.jpg', 'high_mage_quellen.jpg'),
(11, 'Pathfinder Durik', 'Scout', '2', 'durik.jpg', 'durikbust.jpg'),
(12, 'Dezra the Vile', 'Mage', '2', 'dezera.jpg', 'dezrabust.jpg'),
(13, 'Logan Lashley', 'Scout', '2', 'logan.jpg', 'loganbust.jpg'),
(14, 'Raythen', 'Scout', '2', 'raythen.jpg', 'raythenbust.jpg'),
(15, 'Ulma Grimstone', 'Healer', '2', 'ulma.jpg', 'ulma_grimstone.jpg'),
(16, 'Serena', 'Healer', '2', 'serena.jpg', 'serenabust.jpg'),
(17, 'Roganna the Shade', 'Scout', '3', 'rogannatheshade.jpg', 'rogannatheshadebust.jpg'),
(18, 'Augur Grisom', 'Healer', '3', 'grisom.jpg', 'grisombust.jpg'),
(19, 'Orkell the Swift', 'Warrior', '4', 'orkell.jpg', 'orkellbust.jpg'),
(20, 'Ravaella Lightfoot', 'Mage', '4', 'ravaella.jpg', 'ravaellabust.jpg'),
(21, 'Tinashi the Wanderer', 'Scout', '4', 'tinashithewanderer.jpg', 'tinashithewandererbust.jpg'),
(22, 'Rendiel', 'Healer', '4', 'rendiel.jpg', 'rendielbust.jpg'),
(23, 'Alys Raine', 'Warrior', '5', 'alys.jpg', 'alysbust.jpg'),
(24, 'Thaiden Mistpeak', 'Scout', '5', 'thaiden.jpg', 'thaidenbust.jpg'),
(25, 'Tahlia', 'Warrior', '6', 'tahlia.jpg', 'tahliabust.jpg'),
(26, 'Astarra', 'Mage', '6', 'astarra.jpg', 'astarrabust.jpg'),
(27, 'Tetherys', 'Scout', '6', 'tetherys.jpg', 'tetherysbust.jpg'),
(28, 'Andira Runehand', 'Healer', '6', 'andirarunehand.jpg', 'andirarunehandbust.jpg'),
(29, 'Trenloe the Strong', 'Warrior', '7', 'trenloethestrong.jpg', 'trenloethestrongbust.jpg'),
(30, 'Shiver', 'Mage', '7', 'shiver.jpg', 'shiver.jpg'),
(31, 'Laurel of Bloodwood', 'Scout', '7', 'laurelofbloodwood.jpg', 'laurelofbloodwoodbust.jpg'),
(32, 'Elder Mok', 'Healer', '7', 'eldermok.jpg', 'elder_mok.jpg'),
(33, 'Corbin', 'Warrior', '8', 'corbin.jpg', 'corbinbust.jpg'),
(34, 'Jaes the Exile', 'Mage', '8', 'jaestheexile.jpg', 'jaestheexilebust.jpg'),
(35, 'Lindel', 'Scout', '8', 'lindel.jpg', 'lindelbust.jpg'),
(36, 'Brother Gherinn', 'Healer', '8', 'brothergherinn.jpg', 'brothergherinnbust.jpg'),
(37, 'Lord Hawthorne', 'Warrior', '9', 'lordhawthorne.jpg', 'lordhawthornebust.jpg'),
(38, 'Mordrog', 'Warrior', '9', 'mordrog.jpg', 'mordrogbust.jpg'),
(39, 'Silhouette', 'Scout', '9', 'silhouette.jpg', 'silhouettebust.jpg'),
(40, 'Sahla', 'Healer', '9', 'sahla.jpg', 'sahlabust.jpg'),
(101, 'Laughin Buldar', 'Warrior', '99', 'laughinbuldar.jpg', 'laughin_buldar.jpg'),
(102, 'Elder Mok', 'Healer', '99', 'eldermok.jpg', 'eldermokbust.jpg'),
(103, 'Tobin Farslayer', 'Scout', '99', 'tobinfarslayer.jpg', 'tobin_farslayer.jpg'),
(104, 'One Fist', 'Warrior', '99', 'onefist.jpg', 'onefistbust.jpg'),
(105, 'Arvel Worldwalker', 'Scout', '99', 'arvelworldwalker.jpg', 'arvelworldwalkerbust.jpg'),
(106, 'Krutzbeck', 'Warrior', '99', 'krutzbeck.jpg', 'krutzbeckbust.jpg'),
(107, 'Varikas the Dead', 'Warrior', '99', 'varikasthedead.jpg', 'varikasthedeadbust.jpg'),
(108, 'Karnon', 'Warrior', '99', 'karnon.jpg', 'karnonbust.jpg'),
(109, 'Nanok of the Blade', 'Warrior', '99', 'nanokoftheblade.jpg', 'nanokofthebladebust.jpg'),
(110, 'Steelhorns', 'Warrior', '99', 'steelhorns.jpg', 'steelhornsbust.jpg'),
(111, 'Eliam', 'Warrior', '99', 'eliam.jpg', 'eliambust.jpg'),
(112, 'Nara the Fang', 'Warrior', '99', 'narathefang.jpg', 'narathefangbust.jpg'),
(113, 'Sir Valadir', 'Warrior', '99', 'sirvaladir.jpg', 'sirvaladirbust.jpg'),
(114, 'Hugo the Glorious', 'Warrior', '99', 'hugotheglorious.jpg', 'hugothegloriousbust.jpg'),
(115, 'Vyrah the Falconer', 'Scout', '99', 'vyrahthefalconer.jpg', 'vyrahthefalconerbust.jpg'),
(116, 'Ispher', 'Healer', '99', 'ispher.jpg', 'ispherbust.jpg'),
(117, 'Red Scorpion', 'Scout', '99', 'redscorpion.jpg', 'redscorpionbust.jpg'),
(118, 'Aurim', 'Healer', '99', 'aurim.jpg', 'aurimbust.jpg'),
(119, 'Zyla', 'Mage', '99', 'zyla.jpg', 'zylabust.jpg'),
(120, 'Truthseer Kel', 'Mage', '99', 'truthseerkel.jpg', 'truthseerkelbust.jpg'),
(121, 'Master Thorn', 'Mage', '99', 'masterthorn.jpg', 'masterthornbust.jpg'),
(122, 'Lyssa', 'Mage', '99', 'lyssa.jpg', 'lyssabust.jpg'),
(123, 'Landrec the Wise', 'Mage', '99', 'landrecthewise.jpg', 'landrecthewisebust.jpg'),
(124, 'Mad Carthos', 'Mage', '99', 'madcarthos.jpg', 'madcarthosbust.jpg'),
(125, 'Okaluk and Rakash', 'Healer', '99', 'okalukandrakash.jpg', 'okalukandrakashbust.jpg'),
(126, 'Jonas the Kind', 'Healer', '99', 'jonasthekind.jpg', 'jonasthekindbust.jpg'),
(127, 'Kirga', 'Scout', '99', 'kirga.jpg', 'kirgabust.jpg'),
(128, 'Grey Ker', 'Scout', '99', 'greyker.jpg', 'greykerbust.jpg'),
(129, 'Bogran the Shadow', 'Scout', '99', 'bograntheshadow.jpg', 'bograntheshadowbust.jpg'),
(130, 'Challara', 'Mage', '99', 'challara.jpg', 'challarabust.jpg'),
(131, 'Ronan of the Wild', 'Scout', '99', 'ronanofthewild.jpg', 'ronanofthewildbust.jpg'),
(132, 'Brother Glyr', 'Healer', '99', 'brotherglyr.jpg', 'brotherglyrbust.jpg'),
(133, 'Tatianna', 'Scout', '99', 'tatianna', 'tatiannabust.jpg'),
(134, 'Tahlia', 'Warrior', '99', 'tahlia.jpg', 'tahliabust.jpg'),
(135, 'Astarra', 'Mage', '99', 'astarra.jpg', 'astarrabust.jpg'),
(136, 'Tetherys', 'Scout', '99', 'tetherys.jpg', 'tetherysbust.jpg'),
(137, 'Andira Runehand', 'Healer', '99', 'andirarunehand.jpg', 'andirarunehandbust.jpg'),
(138, 'Trenloe the Strong', 'Warrior', '99', 'trenloethestrong.jpg', 'trenloethestrongbust.jpg'),
(139, 'Shiver', 'Mage', '99', 'shiver.jpg', 'shiver.jpg'),
(140, 'Laurel of Bloodwood', 'Scout', '99', 'laurelofbloodwood.jpg', 'laurelofbloodwoodbust.jpg'),
(141, 'Corbin', 'Warrior', '99', 'corbin.jpg', 'corbinbust.jpg'),
(142, 'Jaes the Exile', 'Mage', '99', 'jaestheexile.jpg', 'jaestheexilebust.jpg'),
(143, 'Lindel', 'Scout', '99', 'lindel.jpg', 'lindelbust.jpg'),
(144, 'Brother Gherinn', 'Healer', '99', 'brothergherinn.jpg', 'brothergherinnbust.jpg'),
(145, 'Lord Hawthorne', 'Warrior', '99', 'lordhawthorne.jpg', 'lordhawthornebust.jpg'),
(146, 'Mordrog', 'Warrior', '99', 'mordrog.jpg', 'mordrogbust.jpg'),
(147, 'Silhouette', 'Scout', '99', 'silhouette.jpg', 'silhouettebust.jpg'),
(148, 'Sahla', 'Healer', '99', 'sahla.jpg', 'sahlabust.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbitems`
--

CREATE TABLE IF NOT EXISTS `tbitems` (
  `item_id` int(3) NOT NULL DEFAULT '0',
  `item_name` varchar(38) DEFAULT NULL,
  `market_act` int(1) DEFAULT NULL,
  `item_default_price` int(4) DEFAULT NULL,
  `market_sellprice` int(3) DEFAULT NULL,
  `item_starting` tinyint(1) NOT NULL,
  `owner` varchar(15) DEFAULT NULL,
  `market_img` varchar(36) DEFAULT NULL,
  `item_exp_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbitems`
--

INSERT INTO `tbitems` (`item_id`, `item_name`, `market_act`, `item_default_price`, `market_sellprice`, `item_starting`, `owner`, `market_img`, `item_exp_id`) VALUES
(1, 'Belt of Alchemy', 1, 100, 50, 0, 'hero', 'beltofalchemy.jpg', 3),
(2, 'Belt of Waterwalking', 1, 50, 25, 0, 'hero', 'beltofwaterwalking.jpg', 3),
(3, 'Deflecting Shield', 1, 50, 25, 0, 'hero', 'deflectingshield.jpg', 3),
(4, 'Dire Flail', 1, 150, 75, 0, 'hero', 'direflail.jpg', 3),
(15, 'Reaper''s Scythe', 0, 0, 25, 1, 'Necromancer', 'reapersscythenecromancer.jpg', 0),
(19, 'Yew Shortbow', 0, 0, 25, 1, 'Wildlander', 'yewshortbowwildlander.jpg', 0),
(20, 'Wooden Shield', 0, 0, 25, 1, 'Disciple', 'woodenshielddisciple.jpg', 0),
(21, 'Iron Mace', 0, 0, 25, 1, 'Disciple', 'ironmacedisciple.jpg', 0),
(22, 'Iron Longsword', 0, 0, 25, 1, 'Knight', 'ironlongswordknight.jpg', 0),
(23, 'Wooden Shield', 0, 0, 25, 1, 'Knight', 'woodenshieldknight.jpg', 0),
(24, 'Worn Greatsword', 0, 0, 25, 1, 'Champion', 'worngreatswordchampion.jpg', 1),
(25, 'Horn of Courage', 0, 0, 25, 1, 'Champion', 'hornofcouragechampion.jpg', 1),
(26, 'Hunting Spear', 0, 0, 25, 1, 'Beastmaster', 'huntingspearbeastmaster.jpg', 2),
(27, 'Skinning Knife', 0, 0, 25, 1, 'Beastmaster', 'skinningknifebeastmaster.jpg', 2),
(28, 'Leather Whip', 0, 0, 25, 1, 'Treasure Hunter', 'leatherwhiptreasurehunter.jpg', 2),
(29, 'The Dead Man''s Compass', 0, 0, 25, 1, 'Treasure Hunter', 'thedeadmanscompasstreasurehunter.jpg', 2),
(30, 'Throwing Knives', 0, 0, 25, 1, 'Thief', 'throwingknivesthief.jpg', 0),
(31, 'Lucky Charm', 0, 0, 25, 1, 'Thief', 'luckycharmthief.jpg', 0),
(32, 'Hunting Knife', 0, 0, 25, 1, 'Stalker', 'huntingknifestalker.jpg', 3),
(33, 'Arcane Bolt', 0, 0, 25, 1, 'Runemaster', 'arcaneboltrunemaster.jpg', 0),
(34, 'Staff of the Grave', 0, 0, 25, 1, 'Hexer', 'staffofthegravehexer.jpg', 2),
(35, 'Statis Rune', 0, 0, 25, 1, 'Geomancer', 'stasisrunegeomancer.jpg', 1),
(36, 'Oakstaff', 0, 0, 25, 1, 'Spiritspeaker', 'oakstaffspiritspeaker.jpg', 0),
(37, 'Smoking Vials', 0, 0, 25, 1, 'Apothecary', 'smokingvialsapothecary.jpg', 2),
(38, 'Iron Flail', 0, 0, 25, 1, 'Prophet', 'ironflailprophet.jpg', 0),
(39, 'Sage''s Tome', 0, 0, 25, 1, 'Prophet', 'sagestomeprophet.jpg', 0),
(40, 'Chipped Greataxe', 0, 0, 25, 1, 'Berserker', 'chippedgreataxeberserker.jpg', 0),
(68, 'Guardian Axe', 5, 175, 75, 0, 'hero', 'guardianaxe.jpg', 3),
(69, 'Lifedrain Scepeter', 5, 100, 50, 0, 'hero', 'lifedrainscepter.jpg', 3),
(70, 'Mapstone', 5, 50, 25, 0, 'hero', 'mapstone.jpg', 3),
(71, 'Trident', 5, 125, 50, 0, 'hero', 'trident.jpg', 3),
(72, 'Thief''s Vest', 5, 100, 50, 0, 'hero', 'theifsvest.jpg', 2),
(73, 'Teleportation Rune', 5, 125, 50, 0, 'hero', 'teleportationrune.jpg', 2),
(74, 'Shield of Light', 5, 75, 25, 0, 'hero', 'shieldoflight.jpg', 2),
(75, 'Serpent Dagger', 5, 125, 50, 0, 'hero', 'serpentdagger.jpg', 2),
(76, 'Rune Plate', 5, 175, 75, 0, 'hero', 'runeplate.jpg', 2),
(77, 'Poisoned Blowgun', 5, 100, 50, 0, 'hero', 'poisonedblowgun.jpg', 2),
(78, 'Mace of Aver', 5, 150, 75, 0, 'hero', 'maceofaver.jpg', 2),
(79, 'Jinn''s Lamp', 5, 100, 50, 0, 'hero', 'jinnslamp.jpg', 2),
(80, 'Elven Boots', 5, 50, 25, 0, 'hero', 'elvenboots.jpg', 2),
(81, 'Bow of Bone', 5, 125, 50, 0, 'hero', 'bowofbone.jpg', 2),
(82, 'Bearded Axe', 5, 175, 75, 0, 'hero', 'beardedaxe.jpg', 2),
(83, 'Flash Powder', 5, 100, 50, 0, 'hero', 'flashpowder.jpg', 1),
(84, 'Magic Staff', 1, 150, 75, 0, 'hero', 'magicstaff.jpg', 0),
(85, 'Leather Armor', 1, 75, 25, 0, 'hero', 'leatherarmor.jpg', 0),
(86, 'Scorpion Helm', 1, 75, 25, 0, 'hero', 'scorpionhelm.jpg', 0),
(87, 'Iron Shield', 1, 50, 25, 0, 'hero', 'ironshield.jpg', 0),
(88, 'Lucky Charm', 1, 100, 50, 0, 'hero', 'luckycharm.jpg', 0),
(89, 'Magma Blast', 1, 150, 75, 0, 'hero', 'magmablast.jpg', 1),
(90, 'Handbow', 1, 150, 75, 0, 'hero', 'handbow.jpg', 1),
(91, 'Halberd', 1, 125, 50, 0, 'hero', 'halberd.jpg', 1),
(92, 'Sunburst', 1, 125, 50, 0, 'hero', 'sunburst.jpg', 0),
(93, 'Steel Broadsword', 1, 100, 50, 0, 'hero', 'steelbroadsword.jpg', 0),
(94, 'Sling', 1, 75, 25, 0, 'hero', 'sling.jpg', 0),
(96, 'Ring of Power', 1, 150, 75, 0, 'hero', 'ringofpower.jpg', 0),
(97, 'Mana Weave', 1, 125, 50, 0, 'hero', 'manaweave.jpg', 0),
(99, 'Light Hammer', 1, 75, 25, 0, 'hero', 'lighthammer.jpg', 0),
(101, 'Iron Spear', 1, 75, 25, 0, 'hero', 'ironspear.jpg', 0),
(103, 'Iron Battleaxe', 1, 100, 50, 0, 'hero', 'ironbattleaxe.jpg', 0),
(104, 'Immolation', 1, 150, 75, 0, 'hero', 'immolation.jpg', 0),
(105, 'Heavy Cloak', 1, 75, 25, 0, 'hero', 'heavycloak.jpg', 0),
(106, 'Elm Greatbow', 1, 100, 50, 0, 'hero', 'elmgreatbow.jpg', 0),
(107, 'Crossbow', 1, 175, 75, 0, 'hero', 'crossbow.jpg', 0),
(108, 'Chainmail', 1, 150, 75, 0, 'hero', 'chainmail.jpg', 0),
(109, 'Belt of Strength', 2, 125, 50, 0, 'hero', 'beltofstrength.jpg', 3),
(110, 'Blasting Rune', 2, 200, 100, 0, 'hero', 'blastingrune.jpg', 3),
(111, 'Boomerang', 2, 200, 100, 0, 'hero', 'boomerang.jpg', 3),
(112, 'Glaive', 2, 175, 75, 0, 'hero', 'glaive.jpg', 3),
(113, 'Stone Armor', 2, 225, 100, 0, 'hero', 'stonearmor.jpg', 3),
(114, 'Staff of the Wild', 2, 175, 75, 0, 'hero', 'staffofthewild.jpg', 2),
(115, 'Shroud of Dusk', 2, 150, 75, 0, 'hero', 'shroudofdusk.jpg', 2),
(116, 'Rune of Misery', 2, 250, 125, 0, 'hero', 'runeofmisery.jpg', 2),
(117, 'Rage Blade', 2, 200, 100, 0, 'hero', 'rageblade.jpg', 2),
(118, 'Obsidian Scalemail', 2, 275, 125, 0, 'hero', 'obsidianscalemail.jpg', 2),
(119, 'Obsidian Greataxe', 2, 225, 100, 0, 'hero', 'obsidiangreataxe.jpg', 2),
(120, 'Iron Claws', 2, 175, 75, 0, 'hero', 'ironclaws.jpg', 2),
(121, 'Cloak of Deception', 2, 200, 100, 0, 'hero', 'cloakofdeception.jpg', 2),
(122, 'Bow of the Eclipse', 2, 250, 125, 0, 'hero', 'bowoftheeclipse.jpg', 2),
(123, 'Black Iron Helm', 2, 150, 75, 0, 'hero', 'blackironhelm.jpg', 2),
(124, 'Staff of Kellos', 2, 175, 75, 0, 'hero', 'staffofkellos.jpg', 1),
(125, 'Inscribed Robes', 2, 225, 100, 0, 'hero', 'inscribedrobes.jpg', 1),
(126, 'Merciful Boots', 2, 100, 50, 0, 'hero', 'mercifulboots.jpg', 1),
(127, 'Bow of the Sky', 2, 225, 100, 0, 'hero', 'bowofthesky.jpg', 1),
(128, 'Scalemail', 2, 225, 100, 0, 'hero', 'scalemail.jpg', 1),
(129, 'Tival Crystal', 2, 175, 75, 0, 'hero', 'tivalcrystal.jpg', 0),
(130, 'Steel Greatsword', 2, 200, 100, 0, 'hero', 'steelgreatsword.jpg', 0),
(131, 'Platemail', 2, 250, 125, 0, 'hero', 'platemail.jpg', 0),
(132, 'Mace of Kellos', 2, 175, 125, 0, 'hero', 'maceofkellos.jpg', 0),
(133, 'Lightning Strike', 2, 200, 100, 0, 'hero', 'lightningstrike.jpg', 0),
(134, 'Lataria Longbow', 2, 200, 100, 0, 'hero', 'latarilongbow.jpg', 0),
(135, 'Iron-Bound Ring', 2, 150, 75, 0, 'hero', 'ironboundring.jpg', 0),
(136, 'Ice Storm', 2, 150, 75, 0, 'hero', 'icestorm.jpg', 0),
(137, 'Heavy Steel Shield', 2, 100, 50, 0, 'hero', 'heavysteelshield.jpg', 0),
(138, 'Grinding Axe', 2, 175, 75, 0, 'hero', 'grindingaxe.jpg', 0),
(139, 'Elven Cloak', 2, 225, 100, 0, 'hero', 'elvencloak.jpg', 0),
(140, 'Dwarven Firebomb', 2, 175, 75, 0, 'hero', 'dwarvenfirebomb.jpg', 0),
(141, 'Dragontooth Hammer', 2, 250, 125, 0, 'hero', 'dragontoothhammer.jpg', 0),
(142, 'Demonhide Leather', 2, 200, 100, 0, 'hero', 'demonhideleather.jpg', 0),
(143, 'Black Widow''s Web', 0, 0, 25, 1, 'Stalker', NULL, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbitems_aquired`
--

CREATE TABLE IF NOT EXISTS `tbitems_aquired` (
`shop_id` int(3) NOT NULL,
  `aq_item_id` int(3) DEFAULT NULL,
  `aq_relic_id` int(3) DEFAULT NULL,
  `aq_char_id` int(3) NOT NULL,
  `shop_gold` int(4) DEFAULT NULL,
  `shop_market_sold` varchar(23) DEFAULT NULL,
  `shop_goldsold` int(2) DEFAULT NULL,
  `shop_equipped` varchar(3) DEFAULT NULL,
  `aq_progress_id` int(11) DEFAULT NULL,
  `shop_notes` varchar(10) DEFAULT NULL,
  `aq_game_id` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=310 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbitems_aquired`
--

INSERT INTO `tbitems_aquired` (`shop_id`, `aq_item_id`, `aq_relic_id`, `aq_char_id`, `shop_gold`, `shop_market_sold`, `shop_goldsold`, `shop_equipped`, `aq_progress_id`, `shop_notes`, `aq_game_id`) VALUES
(56, 40, NULL, 2, 0, '', 0, 'yes', 1, '', 14),
(57, 19, NULL, 3, 0, '', 0, 'yes', 1, '', 14),
(58, 21, NULL, 4, 0, '', 0, 'yes', 1, '', 14),
(59, 20, NULL, 4, 0, '', 0, 'yes', 1, '', 14),
(60, 33, NULL, 1, 0, '', 0, 'yes', 1, '', 14),
(63, 85, NULL, 1, -75, '', 0, 'yes', 13, '', 14),
(64, 86, NULL, 3, -75, '', 0, 'yes', 13, '', 14),
(67, 87, NULL, 2, -50, '', 0, 'yes', 13, '', 14),
(68, 88, NULL, 4, -100, '', 0, 'yes', 13, '', 14),
(69, 84, NULL, 1, 175, 'Magic Staff', 0, 'no', 16, '', 14),
(73, NULL, 4, 5, 0, '', 0, 'yes', 16, '', 14),
(134, 105, NULL, 4, -75, '', 0, 'yes', 16, '', 14),
(135, 85, NULL, 3, -75, '', 0, 'yes', 16, '', 14),
(140, NULL, 2, 1, 0, '', 0, 'yes', 22, '', 14),
(243, 103, NULL, 2, -100, '', 0, 'yes', 22, '', 14),
(270, 76, NULL, 7, 0, '', 0, 'yes', 35, '', 38),
(271, 82, NULL, 7, -175, '', 0, 'yes', 35, '', 38),
(278, NULL, 3, 6, NULL, NULL, NULL, NULL, 43, NULL, 38),
(279, NULL, 2, 7, NULL, NULL, NULL, NULL, 56, NULL, 38),
(294, 22, NULL, 51, NULL, NULL, NULL, NULL, NULL, NULL, 40),
(295, 23, NULL, 51, NULL, NULL, NULL, NULL, NULL, NULL, 40),
(296, 15, NULL, 52, NULL, NULL, NULL, NULL, NULL, NULL, 40),
(297, 40, NULL, 53, NULL, NULL, NULL, NULL, NULL, NULL, 42),
(298, 15, NULL, 54, NULL, NULL, NULL, NULL, NULL, NULL, 42),
(299, 19, NULL, 55, NULL, NULL, NULL, NULL, NULL, NULL, 42),
(300, 40, NULL, 56, NULL, NULL, NULL, NULL, NULL, NULL, 47),
(301, 15, NULL, 57, NULL, NULL, NULL, NULL, NULL, NULL, 47),
(302, 19, NULL, 58, NULL, NULL, NULL, NULL, NULL, NULL, 47),
(303, 36, NULL, 59, NULL, NULL, NULL, NULL, NULL, NULL, 47),
(304, 40, NULL, 60, NULL, NULL, NULL, NULL, NULL, NULL, 48),
(305, 15, NULL, 61, NULL, NULL, NULL, NULL, NULL, NULL, 48),
(306, 19, NULL, 62, NULL, NULL, NULL, NULL, NULL, NULL, 48),
(307, 36, NULL, 63, NULL, NULL, NULL, NULL, NULL, NULL, 48),
(309, NULL, 2, 61, NULL, NULL, NULL, NULL, 61, NULL, 48);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbitems_relics`
--

CREATE TABLE IF NOT EXISTS `tbitems_relics` (
`relic_id` int(3) NOT NULL,
  `relic_h_name` varchar(24) NOT NULL,
  `relic_ol_name` varchar(24) NOT NULL,
  `relic_exp_id` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbitems_relics`
--

INSERT INTO `tbitems_relics` (`relic_id`, `relic_h_name`, `relic_ol_name`, `relic_exp_id`) VALUES
(1, 'Dawnblade', 'Duskblade', 0),
(2, 'Fortuna''s Dice', 'Bones of Woe', 0),
(3, 'Shield of the Dark God', 'Shield of Zorek''s Favor', 0),
(4, 'Staff of Light', 'Staff of Shadows', 0),
(5, 'The Shadow Rune', 'The Shadow Rune', 0),
(6, 'Trueshot', 'Scorpion''s Kiss', 0),
(7, 'Valyndra''s Bane', 'Her Majesty''s Malice', 1),
(8, 'Aurium Mail', 'Valyndra''s Gift', 1),
(9, 'Gauntlets of Power', 'Gauntlets of Spite', 2),
(10, 'Living Heart', 'Fallen Heart', 2),
(11, 'Sun Stone', 'Sun''s Fury', 2),
(12, 'Immunity Elixir', 'Curative Vial', 3),
(13, 'Mending Talisman', 'Omen of Blight', 3),
(14, 'Workman''s Ring', 'Taskmaster''s Ring', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbplayerlist`
--

CREATE TABLE IF NOT EXISTS `tbplayerlist` (
  `player_id` int(2) NOT NULL DEFAULT '0',
  `player_username` varchar(14) DEFAULT NULL,
  `player_handle` varchar(19) DEFAULT NULL,
  `player_password` varchar(14) DEFAULT NULL,
  `player_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbplayerlist`
--

INSERT INTO `tbplayerlist` (`player_id`, `player_username`, `player_handle`, `player_password`, `player_timestamp`, `created_by`) VALUES
(0, '', 'Shared/Rotated Role', '', '2014-10-01 17:22:50', 'ALL'),
(1, 'Tundrra', 'Tundrra', 'testDescent123', '2014-11-25 18:50:04', 'Tundrra'),
(2, '', 'Nimm', '', '2014-09-10 09:51:53', 'Tundrra'),
(3, '', 'Gloki', '', '2014-09-10 09:51:53', 'Tundrra'),
(4, '', 'Djarum', '', '2014-09-10 09:51:53', 'Tundrra'),
(5, '', 'Aaron', '', '2014-09-10 09:51:53', 'Tundrra'),
(6, '', 'Lazyone', '', '2014-09-10 09:52:20', 'Tundrra'),
(7, 'Alcyone', 'Alcyone', 'booger', '2014-11-25 18:59:14', 'Alcyone'),
(13, '', 'Testplayer', 'Descent', '2014-11-12 14:45:04', 'Testplayer'),
(14, '', 'Talolan', '', '2014-11-12 14:54:53', ''),
(15, '', 'Lasarian', '', '2014-11-12 14:57:33', ''),
(16, '', 'Bammer', '', '2014-11-12 14:57:47', ''),
(17, '', 'Kermit', '', '2014-11-12 14:59:06', ''),
(18, '', 'Phelaia', '', '2014-11-12 14:59:16', ''),
(19, '', 'Santhus', '', '2014-11-12 14:59:29', ''),
(20, 'Eagletsi', 'Eagletsi', 'descent2014', '2014-11-19 17:06:07', 'Eagletsi'),
(21, 'Lawpsided', 'Lawpsided', 'DescentJoseph', '2014-11-25 18:53:00', 'Lawpsided'),
(22, '', 'Rachael', '', '2014-11-26 14:54:38', 'Lawpsided'),
(23, '', 'Joseph', '', '2014-11-26 14:54:46', 'Lawpsided'),
(24, '', 'James', '', '2014-11-26 14:54:51', 'Lawpsided'),
(25, '', 'Raymond', '', '2014-11-26 14:54:56', 'Lawpsided'),
(26, '', 'John', '', '2014-11-26 14:55:01', 'Lawpsided'),
(27, '', 'Tyler', '', '2014-11-26 14:55:08', 'Lawpsided'),
(28, '', 'roxanne', '', '2014-11-26 15:03:23', 'Alcyone'),
(29, '', 'jon', '', '2014-11-26 15:03:59', 'Alcyone'),
(30, '', 'simon', '', '2014-11-26 15:06:05', 'Alcyone'),
(32, '', 'tundrra', '', '2014-11-26 20:42:26', 'Alcyone'),
(33, 'michaelsciscoe', 'michaelsciscoe', 'descent2014', '2014-11-27 06:07:47', 'michaelsciscoe'),
(34, 'dllrt', 'dllrt', 'descent2014', '2014-11-27 06:07:47', 'dllrt'),
(35, '', 'tundrra', '', '2014-11-27 06:08:29', 'michaelsciscoe'),
(36, '', 'alcyone', '', '2014-11-27 06:08:39', 'michaelsciscoe'),
(37, '', 'Tim', '', '2014-11-27 06:44:14', 'dllrt'),
(38, '', 'Maaike', '', '2014-11-27 06:44:22', 'dllrt'),
(39, '', 'Frauke', '', '2014-11-27 06:44:28', 'dllrt'),
(40, '', 'Talolan', '', '2014-11-27 07:17:03', 'Alcyone'),
(41, '', 'Lasarian ', '', '2014-11-27 07:17:14', 'Alcyone'),
(42, '', 'steven', '', '2014-12-02 07:33:53', 'Alcyone'),
(43, '', 'Riveni', '', '2014-12-02 07:39:54', 'Alcyone'),
(44, '', 'Bammer', '', '2014-12-02 13:32:18', 'Alcyone');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbquests`
--

CREATE TABLE IF NOT EXISTS `tbquests` (
  `quest_id` int(2) NOT NULL DEFAULT '0',
  `quest_name` varchar(26) DEFAULT NULL,
  `quest_type` varchar(7) DEFAULT NULL,
  `quest_act` varchar(12) DEFAULT NULL,
  `quest_rew_ol_xp` int(3) DEFAULT NULL,
  `quest_rew_h_xp` int(3) NOT NULL,
  `quest_rew_h_gold` int(3) DEFAULT NULL,
  `quest_rew_relic_id` int(3) DEFAULT NULL,
  `quest_rew_special` tinyint(1) NOT NULL DEFAULT '0',
  `quest_order` int(1) DEFAULT NULL,
  `quest_expansion_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbquests`
--

INSERT INTO `tbquests` (`quest_id`, `quest_name`, `quest_type`, `quest_act`, `quest_rew_ol_xp`, `quest_rew_h_xp`, `quest_rew_h_gold`, `quest_rew_relic_id`, `quest_rew_special`, `quest_order`, `quest_expansion_id`) VALUES
(0, 'First Blood', 'Quest', 'Introduction', 0, 0, 0, NULL, 0, 2, 0),
(1, 'A Fat Goblin', 'Quest', 'Act 1', 1, 0, 25, NULL, 0, 3, 0),
(2, 'The Monster''s Hoard', 'Quest', 'Act 2', 0, 0, 0, 6, 0, 6, 0),
(3, 'The Frozen Spire', 'Quest', 'Act 2', 2, 1, 0, NULL, 0, 6, 0),
(4, 'Castle Daerion', 'Quest', 'Act 1', 1, 0, 25, NULL, 0, 3, 0),
(5, 'The Dawnblade', 'Quest', 'Act 2', 0, 0, 0, 1, 1, 6, 0),
(6, 'The Desecrated Tomb', 'Quest', 'Act 2', 0, 0, 0, 1, 1, 6, 0),
(7, 'The Cardinal''s Plight', 'Quest', 'Act 1', 0, 0, 0, 4, 0, 3, 0),
(8, 'Enduring the Elements', 'Quest', 'Act 2', 1, 0, 25, NULL, 1, 6, 0),
(9, 'The Ritual of Shadows', 'Quest', 'Act 2', 1, 0, 25, NULL, 1, 6, 0),
(10, 'The Masquerade Ball', 'Quest', 'Act 1', 0, 0, 0, 2, 0, 3, 0),
(11, 'Blood of Heroes', 'Quest', 'Act 2', 2, 1, 0, NULL, 0, 6, 0),
(12, 'The Twin Idols', 'Quest', 'Act 2', 2, 1, 0, NULL, 0, 6, 0),
(13, 'Death on the Wing', 'Quest', 'Act 1', 0, 0, 0, 3, 0, 3, 0),
(14, 'The Wyrm Turns', 'Quest', 'Act 2', 2, 1, 0, NULL, 0, 6, 0),
(15, 'The Wyrm Rises', 'Quest', 'Act 2', 1, 0, 25, NULL, 0, 6, 0),
(16, 'The Shadow Vault', 'Quest', 'Interlude 1', 0, 0, 0, 5, 0, 4, 0),
(17, 'The Overlord Revealed', 'Quest', 'Interlude 2', 0, 0, 0, 5, 0, 5, 0),
(18, 'Gryvorn Unleashed', 'Quest', 'Finale 1', 0, 0, 0, NULL, 0, 7, 0),
(19, 'The Man Who Would Be King', 'Quest', 'Finale 2', 0, 0, 0, NULL, 0, 8, 0),
(20, 'Gold Digger', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 1),
(21, 'Rude Awakening', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 1),
(22, 'What''s yours is Mine', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 1),
(23, 'At the Forge', 'Quest', 'Finale 1', 0, 0, 0, NULL, 0, 7, 1),
(24, 'Armored to the Teeth', 'Quest', 'Finale 2', 0, 0, 0, NULL, 0, 8, 1),
(25, 'Ruinous Whispers', 'Quest', 'Introduction', 0, 0, 0, NULL, 0, 2, 2),
(26, 'Gathering Foretold', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 2),
(27, 'Honor Among Thieves', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 2),
(28, 'Reclamation', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 2),
(29, 'Through the Mist', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 2),
(30, 'Barrow of Barris', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 2),
(31, 'Secrets in Stone', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 2),
(32, 'Fury of the Tempest', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 2),
(33, 'Back from the Dead', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 2),
(34, 'Pilgrimage', 'Quest', 'Interlude', 0, 0, 0, NULL, 0, 4, 2),
(35, 'Fortune and Glory', 'Quest', 'Interlude', 0, 0, 0, NULL, 0, 4, 2),
(36, 'Heart of the Wilds', 'Quest', 'Act 2', 0, 0, 0, NULL, 0, 5, 2),
(37, 'Let the Truth be Buried', 'Quest', 'Act 2', 0, 0, 0, NULL, 0, 5, 2),
(38, 'Fountain of Insight', 'Quest', 'Act 2', 0, 0, 0, NULL, 0, 5, 2),
(39, 'Web of Power', 'Quest', 'Act 2', 0, 0, 0, NULL, 0, 5, 2),
(40, 'Fire and Brimstone', 'Quest', 'Act 2', 0, 0, 0, NULL, 0, 5, 2),
(41, 'Tripping the Scales', 'Quest', 'Act 2', 0, 0, 0, NULL, 0, 5, 2),
(42, 'Endless Night', 'Quest', 'Finale', 0, 0, 0, NULL, 0, 6, 2),
(43, 'A Glimmer of Hope', 'Quest', 'Finale', 0, 0, 0, NULL, 0, 6, 2),
(44, 'Ghost Town', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 2, 3),
(45, 'Food for Worms', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 2, 3),
(46, 'Three Heads, One Mind', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 2, 3),
(47, 'Source of Sickness', 'Quest', 'Finale 1', 0, 0, 0, NULL, 0, 3, 3),
(48, 'Spreading Affliction', 'Quest', 'Finale 2', 0, 0, 0, NULL, 0, 4, 3),
(49, 'A Demostration', 'Quest', 'Introduction', 0, 0, 0, NULL, 0, 2, 4),
(50, 'Civil War', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 4),
(51, 'Without Mercy', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 4),
(52, 'Local Politics', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 4),
(53, 'Prey', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 4),
(54, 'Price of Power', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 4),
(55, 'The Incident', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 4),
(56, 'Rat-Thing King', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 4),
(57, 'Respected Citizen', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 3, 4),
(58, 'The True Enemy', 'Quest', 'Interlude 1', 0, 0, 0, NULL, 0, 4, 4),
(59, 'Traitors Among Us', 'Quest', 'Interlude 2', 0, 0, 0, NULL, 0, 5, 4),
(60, 'Overdue Demise', 'Quest', 'Act 2', 0, 0, 0, NULL, 0, 6, 4),
(61, 'Into the Dark', 'Quest', 'Act 2', 0, 0, 0, NULL, 0, 6, 4),
(62, 'Nightmares', 'Quest', 'Act 2', 0, 0, 0, NULL, 0, 6, 4),
(63, 'Arise My Friends', 'Quest', 'Act 2', 0, 0, 0, NULL, 0, 6, 4),
(64, 'Wide Spread Panic', 'Quest', 'Act 2', 0, 0, 0, NULL, 0, 6, 4),
(65, 'Lost', 'Quest', 'Act 2', 0, 0, 0, NULL, 0, 6, 4),
(66, 'The Black Realm', 'Quest', 'Finale 1', 0, 0, 0, NULL, 0, 7, 4),
(67, 'The City Falls', 'Quest', 'Finale 2', 0, 0, 0, NULL, 0, 8, 4),
(68, 'Spread Your Wings', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 2, 5),
(69, 'Finders and Keepers', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 2, 5),
(70, 'My House, My Rules', 'Quest', 'Act 1', 0, 0, 0, NULL, 0, 2, 5),
(71, 'Where the Heart Is', 'Quest', 'Act 2', 0, 0, 0, NULL, 0, 3, 5),
(72, 'Wrong Man for the Job', 'Quest', 'Act 2', 0, 0, 0, NULL, 0, 3, 5),
(73, 'Beneath the Manor', 'Quest', 'Act 2', 0, 0, 0, NULL, 0, 3, 5),
(74, 'Crusade of the Forgotten', 'Rumor', 'Act 1', 0, 0, 0, NULL, 0, 1, 6),
(75, 'Shadow Watch', 'Rumor', 'Act 2', 0, 0, 0, NULL, 0, 2, 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbquests_progress`
--

CREATE TABLE IF NOT EXISTS `tbquests_progress` (
`progress_id` int(11) NOT NULL,
  `progress_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `progress_game_id` int(2) DEFAULT NULL,
  `progress_quest_id` int(3) DEFAULT NULL,
  `progress_quest_winner` varchar(13) DEFAULT NULL,
  `progress_enc1_winner` varchar(13) DEFAULT NULL,
  `progress_relic_char` int(11) DEFAULT NULL,
  `progress_set_travel` tinyint(1) NOT NULL,
  `progress_set_spendxp` tinyint(1) NOT NULL,
  `progress_set_items` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbquests_progress`
--

INSERT INTO `tbquests_progress` (`progress_id`, `progress_timestamp`, `progress_game_id`, `progress_quest_id`, `progress_quest_winner`, `progress_enc1_winner`, `progress_relic_char`, `progress_set_travel`, `progress_set_spendxp`, `progress_set_items`) VALUES
(1, '0000-00-00 00:00:00', 14, 0, 'Overlord Wins', '', NULL, 1, 1, 1),
(13, '0000-00-00 00:00:00', 14, 4, 'Overlord Wins', 'Heroes Win', NULL, 1, 1, 1),
(16, '0000-00-00 00:00:00', 14, 7, 'Overlord Wins', 'Heroes Win', NULL, 1, 1, 1),
(22, '0000-00-00 00:00:00', 14, 10, 'Heroes Win', 'Heroes Win', NULL, 1, 1, 1),
(34, '0000-00-00 00:00:00', 38, 0, 'Heroes Win', 'Heroes Win', NULL, 1, 1, 1),
(35, '0000-00-00 00:00:00', 38, 7, 'Heroes Win', 'No Winner', NULL, 1, 1, 1),
(43, '2014-12-08 19:58:15', 38, 13, 'Heroes Win', 'No Winner', 6, 0, 0, 0),
(54, '2014-12-08 23:34:08', 38, 1, 'Heroes Win', 'No Winner', NULL, 0, 0, 0),
(55, '2014-12-08 23:34:49', 38, 4, 'Overlord Wins', 'No Winner', NULL, 0, 0, 0),
(56, '2014-12-08 23:35:29', 38, 10, 'Heroes Win', 'No Winner', 7, 0, 0, 0),
(57, '2014-12-11 17:26:47', 47, 49, NULL, NULL, NULL, 0, 0, 0),
(59, '2014-12-11 21:57:55', 48, 4, NULL, NULL, NULL, 0, 0, 0),
(60, '2014-12-11 21:58:34', 48, 0, 'Heroes Win', 'No Winner', NULL, 0, 0, 0),
(61, '2014-12-11 22:56:03', 48, 10, 'Heroes Win', 'Heroes Win', 61, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbsearch`
--

CREATE TABLE IF NOT EXISTS `tbsearch` (
`search_id` int(11) NOT NULL,
  `search_name` varchar(32) NOT NULL,
  `search_description` text NOT NULL,
  `search_value` int(11) NOT NULL,
  `search_amount` int(11) NOT NULL DEFAULT '1',
  `search_special` tinyint(1) NOT NULL,
  `search_found` int(11) NOT NULL,
  `search_exp_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbsearch`
--

INSERT INTO `tbsearch` (`search_id`, `search_name`, `search_description`, `search_value`, `search_amount`, `search_special`, `search_found`, `search_exp_id`) VALUES
(1, 'Power Potion', 'Flip this card over to reroll some or all of your dice after performing an attack', 50, 1, 0, 0, 0),
(2, 'Health Potion', 'Flip this card over to choose your hero or an adjacent hero. The hero recovers all damage.', 25, 3, 0, 0, 0),
(3, 'Stamina Potion', '', 25, 3, 0, 0, 0),
(4, 'Fire Flask', '', 50, 1, 0, 0, 0),
(5, 'Curse Doll', '', 50, 1, 0, 0, 0),
(6, 'Treasure Chest', '', 0, 1, 1, 0, 0),
(7, 'Nothing', '', 0, 1, 0, 0, 0),
(8, 'Warding Talisman', '', 50, 1, 0, 0, 0),
(9, 'Secret Passage', '', 0, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbskills`
--

CREATE TABLE IF NOT EXISTS `tbskills` (
`skill_id` int(3) NOT NULL,
  `skill_name` varchar(28) DEFAULT NULL,
  `skill_type` varchar(8) DEFAULT NULL,
  `skill_class` varchar(15) DEFAULT NULL,
  `skill_cost` int(2) DEFAULT NULL,
  `skill_card` varchar(28) DEFAULT NULL,
  `skill_expansion` varchar(17) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbskills`
--

INSERT INTO `tbskills` (`skill_id`, `skill_name`, `skill_type`, `skill_class`, `skill_cost`, `skill_card`, `skill_expansion`) VALUES
(1, 'Accurate', 'Scout', 'Wildlander', 1, 'accurate.jpg', '0'),
(2, 'Nimble', 'Scout', 'Wildlander', 0, 'nimble.jpg', '0'),
(10, 'Brute', 'Warrior', 'Berserker', 1, 'brute.jpg', '0'),
(11, 'Raise Dead', 'Mage', 'Necromancer', 0, 'raisedeadnecromancer.jpg', '0'),
(13, 'Runic Knowledge', 'Mage', 'Runemaster', 0, 'runicknowledgerunemaster.jpg', '0'),
(14, 'Prayer of Healing', 'Healer', 'Disciple', 0, 'prayerofhealing.jpg', '0'),
(15, 'Armor of Faith', 'Healer', 'Disciple', 1, 'armoffaith.jpg', '0'),
(16, 'Blessed Strike', 'Healer', 'Disciple', 1, 'blessedstrike.jpg', '0'),
(17, 'Cleansing Touch', 'Healer', 'Disciple', 1, 'cleansingtouch.jpg', '0'),
(18, 'Divine Fury', 'Healer', 'Disciple', 2, 'divinefury.jpg', '0'),
(19, 'Prayer of Peace', 'Healer', 'Disciple', 2, 'prayerofpeace.jpg', '0'),
(20, 'Time of Need', 'Healer', 'Disciple', 2, 'timeofneed.jpg', '0'),
(21, 'Holy Power', 'Healer', 'Disciple', 3, 'holypower.jpg', '0'),
(22, 'Radiant Light', 'Healer', 'Disciple', 3, 'radiantlight.jpg', '0'),
(25, 'Danger Sense', 'Scout', 'Wildlander', 1, 'dangersense.jpg', '0'),
(26, 'Eagle Eyes', 'Scout', 'Wildlander', 1, 'eagleeyes.jpg', '0'),
(27, 'Bow Mastery', 'Scout', 'Wildlander', 2, 'bowmastery.jpg', '0'),
(28, 'First Strike', 'Scout', 'Wildlander', 2, 'firststrike.jpg', '0'),
(29, 'Fleet of Foot', 'Scout', 'Wildlander', 2, 'fleetoffoot.jpg', '0'),
(30, 'Black Arrow', 'Scout', 'Wildlander', 3, 'blackarrow.jpg', '0'),
(31, 'Running Shot', 'Scout', 'Wildlander', 3, 'runningshot.jpg', '0'),
(32, 'Counter Attack', 'Warrior', 'Berserker', 1, 'counterattack.jpg', '0'),
(33, 'Rage', 'Warrior', 'Berserker', 0, 'rage.jpg', '0'),
(35, 'Cripple', 'Warrior', 'Berserker', 1, 'cripple.jpg', '0'),
(36, 'Charge', 'Warrior', 'Berserker', 2, 'charge.jpg', '0'),
(37, 'Weapon Mastery', 'Warrior', 'Berserker', 2, 'weaponmastery.jpg', '0'),
(38, 'Whirlwind', 'Warrior', 'Berserker', 2, 'whirlwind.jpg', '0'),
(39, 'Death Rage', 'Warrior', 'Berserker', 3, 'deathrage.jpg', '0'),
(40, 'Execute', 'Warrior', 'Berserker', 3, 'excute.jpg', '0'),
(43, 'Corpse Blast', 'Mage', 'Necromancer', 1, 'corpseblast.jpg', '0'),
(44, 'Fury of Undeath', 'Mage', 'Necromancer', 1, 'furyofundeath.jpg', '0'),
(45, 'Deathly Haste', 'Mage', 'Necromancer', 1, 'deathlyhaste.jpg', '0'),
(46, 'Dark Pact', 'Mage', 'Necromancer', 2, 'darkpact.jpg', '0'),
(47, 'Vampiric Blood', 'Mage', 'Necromancer', 2, 'vampiricblood.jpg', '0'),
(48, 'Undead Might', 'Mage', 'Necromancer', 2, 'undeadmight.jpg', '0'),
(49, 'Army of Death', 'Mage', 'Necromancer', 3, 'armyofdeath.jpg', '0'),
(50, 'Dying Command', 'Mage', 'Necromancer', 3, 'dyingcommand.jpg', '0'),
(51, 'Soothing Insight', 'Healer', 'Prophet', 0, 'soothinginsight.jpg', '0'),
(52, 'Battle Vision', 'Healer', 'Prophet', 1, 'battlevision.jpg', '0'),
(53, 'Forewarning', 'Healer', 'Prophet', 1, 'forewarning.jpg', '0'),
(54, 'Grim Fate', 'Healer', 'Prophet', 1, 'grimfate.jpg', '0'),
(55, 'All-Seeing', 'Healer', 'Prophet', 2, 'allseeing.jpg', '0'),
(56, 'Lifeline', 'Healer', 'Prophet', 2, 'lifeline.jpg', '0'),
(57, 'Victory Foretold', 'Healer', 'Prophet', 2, 'victoryforetold.jpg', '0'),
(58, 'Focused Insights', 'Healer', 'Prophet', 3, 'focusedinsights.jpg', '0'),
(59, 'Omniscience', 'Healer', 'Prophet', 3, 'omniscience.jpg', '0'),
(60, 'Brew Elixir', 'Healer', 'Apothecary', 0, 'brewelixir.jpg', '2'),
(61, 'Concoction', 'Healer', 'Apothecary', 1, 'concoction.jpg', '2'),
(62, 'Herbal Lore', 'Healer', 'Apothecary', 1, 'herballore.jpg', '2'),
(63, 'Inky Substance', 'Healer', 'Apothecary', 1, 'inkysubstance.jpg', '2'),
(64, 'Bottled Courage', 'Healer', 'Apothecary', 2, 'bottledcourage.jpg', '2'),
(65, 'Protective Tonic', 'Healer', 'Apothecary', 2, 'protectivetonic.jpg', '2'),
(66, 'Secret Formula', 'Healer', 'Apothecary', 2, 'secretformula.jpg', '2'),
(67, 'Hidden Stash', 'Healer', 'Apothecary', 3, 'hiddenstash.jpg', '2'),
(68, 'Potent Remedies', 'Healer', 'Apothecary', 3, 'potentremedies.jpg', '2'),
(69, 'Stoneskin', 'Healer', 'Spiritspeaker', 0, 'stoneskin.jpg', '0'),
(70, 'Drain Spirit', 'Healer', 'Spiritspeaker', 1, 'drainspirit.jpg', '0'),
(71, 'Healing Rain', 'Healer', 'Spiritspeaker', 1, 'healingrain.jpg', '0'),
(72, 'Shared Pain', 'Healer', 'Spiritspeaker', 1, 'sharedpain.jpg', '0'),
(73, 'Cloud of Mist', 'Healer', 'Spiritspeaker', 2, 'cloudofmist.jpg', '0'),
(74, 'Nature''s Bounty', 'Healer', 'Spiritspeaker', 2, 'naturesbounty.jpg', '0'),
(75, 'Tempest', 'Healer', 'Spiritspeaker', 2, 'tempest.jpg', '0'),
(76, 'Ancestor Spirits', 'Healer', 'Spiritspeaker', 3, 'ancestorspirits.jpg', '0'),
(77, 'Vigor', 'Healer', 'Spiritspeaker', 3, 'vigor.jpg', '0'),
(79, 'Terracall', 'Mage', 'Geomancer', 0, 'terracall.jpg', '1'),
(80, 'Earthen Anguish', 'Mage', 'Geomancer', 1, 'earthenanguish.jpg', '1'),
(81, 'Quaking Word', 'Mage', 'Geomancer', 1, 'quakingword.jpg', '1'),
(82, 'Stone Tonuge', 'Mage', 'Geomancer', 1, 'stonetongue.jpg', '1'),
(83, 'Ley Line', 'Mage', 'Geomancer', 2, 'leyline.jpg', '1'),
(84, 'Molten Fury', 'Mage', 'Geomancer', 2, 'moltenfury.jpg', '1'),
(85, 'Ways of Stone', 'Mage', 'Geomancer', 2, 'waysofstone.jpg', '1'),
(86, 'Gravity Spike', 'Mage', 'Geomancer', 3, 'gavityspike.jpg', '1'),
(87, 'Cataclysm', 'Mage', 'Geomancer', 3, 'cataclysm.jpg', '1'),
(88, 'Enfeebling Hex', 'Mage', 'Hexer', 0, 'enfeeblinghex.jpg', '2'),
(89, 'Affliction', 'Mage', 'Hexer', 1, 'affliction.jpg', '2'),
(90, 'Plague Spasm', 'Mage', 'Hexer', 1, 'plaguespasm.jpg', '2'),
(91, 'Viral Hex', 'Mage', 'Hexer', 1, 'viralhex.jpg', '2'),
(92, 'Crippling Curse', 'Mage', 'Hexer', 2, 'cripplingcurse.jpg', '2'),
(93, 'Fel Command', 'Mage', 'Hexer', 2, 'felcommand.jpg', '2'),
(94, 'Internal Rot', 'Mage', 'Hexer', 2, 'internalrot.jpg', '2'),
(95, 'Accursed Arms', 'Mage', 'Hexer', 3, 'accursedarms.jpg', '2'),
(96, 'Plague Cloud', 'Mage', 'Hexer', 3, 'plaguecloud.jpg', '2'),
(98, 'Exploding Rune', 'Mage', 'Runemaster', 1, 'explodingrune.jpg', '0'),
(99, 'Ghost Armor', 'Mage', 'Runemaster', 1, 'ghostarmor.jpg', '0'),
(100, 'Inscribe Rune', 'Mage', 'Runemaster', 1, 'inscriberune.jpg', '0'),
(101, 'Iron Will', 'Mage', 'Runemaster', 2, 'ironwill.jpg', '0'),
(102, 'Rune Mastery', 'Mage', 'Runemaster', 2, 'runemastery.jpg', '0'),
(103, 'Runic Sorcery', 'Mage', 'Runemaster', 2, 'runesorcery.jpg', '0'),
(104, 'Break the Rune', 'Mage', 'Runemaster', 3, 'breaktherune.jpg', '0'),
(105, 'Quick Casting', 'Mage', 'Runemaster', 3, 'quickcasting.jpg', '0'),
(106, 'Exploit', 'Scout', 'Stalker', 1, 'exploit.jpg', '3'),
(107, 'Hunter''s Mark', 'Scout', 'Stalker', 1, 'huntersmark.jpg', '3'),
(108, 'Makeshift Trap', 'Scout', 'Stalker', 1, 'makeshifttrap.jpg', '3'),
(109, 'Easy Prey', 'Scout', 'Stalker', 2, 'easyprey.jpg', '3'),
(110, 'Lay of the Land', 'Scout', 'Stalker', 2, 'layoftheland.jpg', '3'),
(111, 'Poison Barbs', 'Scout', 'Stalker', 2, 'poisonbarbs.jpg', '3'),
(112, 'Ambush', 'Scout', 'Stalker', 3, 'ambush.jpg', '3'),
(113, 'Upper Hand', 'Scout', 'Stalker', 3, 'upperhand.jpg', '3'),
(115, 'Set Trap', 'Scout', 'Stalker', 0, 'settrap.jpg', '3'),
(116, 'Greedy', 'Scout', 'Thief', 0, 'greedy.jpg', '0'),
(117, 'Appraisal', 'Scout', 'Thief', 1, 'appraisal.jpg', '0'),
(118, 'Dirty Tricks', 'Scout', 'Thief', 1, 'dirtytricks.jpg', '0'),
(119, 'Sneaky', 'Scout', 'Thief', 1, 'sneaky.jpg', '0'),
(120, 'Caltrops', 'Scout', 'Thief', 2, 'caltrops.jpg', '0'),
(121, 'Tumble', 'Scout', 'Thief', 2, 'tumble.jpg', '0'),
(122, 'Unseen', 'Scout', 'Thief', 2, 'unseen.jpg', '0'),
(123, 'Bushwhack', 'Scout', 'Thief', 3, 'bushwhack.jpg', '0'),
(124, 'Luck', 'Scout', 'Thief', 3, 'lurk.jpg', '0'),
(125, 'Delver', 'Scout', 'Treasure Hunter', 0, 'delver.jpg', '2'),
(126, 'Dungeoneer', 'Scout', 'Treasure Hunter', 1, 'dungeoneer.jpg', '2'),
(127, 'Gold Rush', 'Scout', 'Treasure Hunter', 1, 'goldrush.jpg', '2'),
(128, 'Survey', 'Scout', 'Treasure Hunter', 1, 'survey.jpg', '2'),
(129, 'Guard the Spoils', 'Scout', 'Treasure Hunter', 2, 'guardthespoils.jpg', '2'),
(130, 'Lure of Fortune', 'Scout', 'Treasure Hunter', 2, 'lureoffortune.jpg', '2'),
(131, 'Sleight of Hand', 'Scout', 'Treasure Hunter', 2, 'sleightofhand.jpg', '2'),
(132, 'Finder''s Keepers', 'Scout', 'Treasure Hunter', 3, 'finderskeepers.jpg', '2'),
(133, 'Trail of Riches', 'Scout', 'Treasure Hunter', 3, 'trailofriches.jpg', '2'),
(135, 'Bound by the Hunt', 'Warrior', 'Beastmaster', 0, 'boundbythehunt.jpg', '2'),
(136, 'Bestial Rage', 'Warrior', 'Beastmaster', 1, 'bestialrage.jpg', '2'),
(137, 'Stalker', 'Warrior', 'Beastmaster', 1, 'stalker.jpg', '2'),
(138, 'Survivalist', 'Warrior', 'Beastmaster', 1, 'survivalist.jpg', '2'),
(139, 'Feral Frenzy', 'Warrior', 'Beastmaster', 2, 'feralfrenzy.jpg', '2'),
(140, 'Savagery', 'Warrior', 'Beastmaster', 2, 'savagery.jpg', '2'),
(141, 'Shadow Hunter', 'Warrior', 'Beastmaster', 2, 'shadowhunter.jpg', '2'),
(142, 'Changing Skins', 'Warrior', 'Beastmaster', 3, 'changingskins.jpg', '2'),
(143, 'Predator', 'Warrior', 'Beastmaster', 3, 'predator.jpg', '2'),
(144, 'Valor of Heroes', 'Warrior', 'Champion', 0, 'valorofheroes.jpg', '1'),
(145, 'A Living Legend', 'Warrior', 'Champion', 1, 'alivinglegend.jpg', '1'),
(146, 'Glory of Battle', 'Warrior', 'Champion', 1, 'gloryofbattle.jpg', '1'),
(147, 'Inspiring Presence', 'Warrior', 'Champion', 1, 'inspiringpresence.jpg', '1'),
(148, 'Motivating Charge', 'Warrior', 'Champion', 2, 'motivatingcharge.jpg', '1'),
(149, 'No Mercy', 'Warrior', 'Champion', 2, 'nomercy.jpg', '1'),
(150, 'Stoic Resolve', 'Warrior', 'Champion', 2, 'stoicresolve.jpg', '1'),
(151, 'For the Cause', 'Warrior', 'Champion', 3, 'forthecause.jpg', '1'),
(152, 'Valorous Strike', 'Warrior', 'Champion', 3, 'valorousstrike.jpg', '1'),
(153, 'Oath of Honor', 'Warrior', 'Knight', 0, 'oathofhonor.jpg', '0'),
(154, 'Advance', 'Warrior', 'Knight', 1, 'advance.jpg', '0'),
(155, 'Challenge', 'Warrior', 'Knight', 1, 'challenge.jpg', '0'),
(156, 'Defend', 'Warrior', 'Knight', 1, 'defend.jpg', '0'),
(157, 'Defense Training', 'Warrior', 'Knight', 2, 'defensetraining.jpg', '0'),
(158, 'Guard', 'Warrior', 'Knight', 2, 'guard.jpg', '0'),
(159, 'Shield Slam', 'Warrior', 'Knight', 2, 'shieldslam.jpg', '0'),
(160, 'Inspiration', 'Warrior', 'Knight', 3, 'inspiration.jpg', '0'),
(161, 'Stalwart', 'Warrior', 'Knight', 3, 'stalwart.jpg', '0'),
(162, 'Bloodlust', 'Overlord', 'Warlord', 2, 'bloodlust.jpg', '0'),
(163, 'Bloodrage', 'Overlord', 'Warlord', 1, 'bloodrage.jpg', '0'),
(164, 'Outbreak', 'Overlord', 'Infector', 2, 'outbreak.jpg', '3'),
(165, 'Virulent Infection', 'Overlord', 'Infector', 1, 'virulentinfection.jpg', '3'),
(166, 'Adaptive Contagion', 'Overlord', 'Infector', 1, 'adaptivecontagion.jpg', '3'),
(167, 'Airborne', 'Overlord', 'Infector', 1, 'airborne.jpg', '3'),
(168, 'Contamnated', 'Overlord', 'Infector', 1, 'contaminated.jpg', '3'),
(169, 'Dark Host', 'Overlord', 'Infector', 3, 'darkhost.jpg', '3'),
(170, 'Tainted Blow', 'Overlord', 'Infector', 2, 'taintedblow.jpg', '3'),
(171, 'Diabolic Power', 'Overlord', 'Magus', 3, 'diabolicpower.jpg', '0'),
(172, 'Rise Again', 'Overlord', 'Magus', 2, 'riseagain.jpg', '0'),
(173, 'Unholy Ritual', 'Overlord', 'Magus', 1, 'unholyritual.jpg', '0'),
(174, 'Word of Despair', 'Overlord', 'Magus', 2, 'wordofdespair.jpg', '0'),
(175, 'Word of Pain', 'Overlord', 'Magus', 1, 'wordofpain.jpg', '0'),
(176, 'Toxic Reprisal', 'Overlord', 'Overlord Reward', 0, 'toxicreprisal.jpg', '3'),
(177, 'Secrets of Flesh', 'Overlord', 'Overlord Reward', 0, 'secretsofflesh.jpg', '3'),
(178, 'Offertory Affliction', 'Overlord', 'Overlord Reward', 0, 'offertoryaffliction.jpg', '3'),
(179, 'Trading Pains', 'Overlord', 'Punisher', 1, 'tradingpains.jpg', '1'),
(180, 'Blood Bargaining', 'Overlord', 'Punisher', 3, 'bloodbargaining.jpg', '1'),
(181, 'Exploit Weakness', 'Overlord', 'Punisher', 2, 'exploitweakness.jpg', '1'),
(182, 'No Rest for the Wicked', 'Overlord', 'Punisher', 1, 'norestforthewicked.jpg', '1'),
(183, 'Price of Prevention', 'Overlord', 'Punisher', 2, 'priceofprevention.jpg', '1'),
(184, 'Splig''s Revenge', 'Overlord', 'Quest Reward', 0, 'spligsrevenge.jpg', '2'),
(185, 'Twin Souls', 'Overlord', 'Quest Reward', 0, 'twinsouls.jpg', '2'),
(186, 'The Wyrm Queen''s Favor', 'Overlord', 'Rumor Reward', 0, 'thewyrmqueensfavor.jpg', '1'),
(187, 'Explosive Runes', 'Overlord', 'Saboteur', 1, 'explosiverunes.jpg', '0'),
(188, 'Uthuk Demon Trap', 'Overlord', 'Saboteur', 3, 'uthukdemontrap.jpg', '0'),
(189, 'Web Trap', 'Overlord', 'Saboteur', 1, 'webtrap.jpg', '0'),
(190, 'Wicked Laughter', 'Overlord', 'Saboteur', 2, 'wickedlaughter.jpg', '0'),
(191, 'Curse of the Monkey God', 'Overlord', 'Saboteur', 2, 'curseofthemonkeygod.jpg', '0'),
(192, 'Dark Remedy', 'Overlord', 'Universal', 1, 'darkremedy.jpg', '2'),
(193, 'Dark Resilience', 'Overlord', 'Universal', 1, 'darkreslience.jpg', '0'),
(194, 'Plan Ahead', 'Overlord', 'Universal', 1, 'planahead.jpg', '0'),
(195, 'Schemes', 'Overlord', 'Universal', 1, 'schemes.jpg', '0'),
(197, 'Dark Fortitude', 'Overlord', 'Warlord', 1, 'darkfortitude.jpg', '0'),
(198, 'Expert Blow', 'Overlord', 'Warlord', 2, 'expertblow.jpg', '0'),
(199, 'Reinforce', 'Overlord', 'Warlord', 3, 'reinforce.jpg', '0');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbskills_aquired`
--

CREATE TABLE IF NOT EXISTS `tbskills_aquired` (
`spendxp_id` int(3) NOT NULL,
  `spendxp_game_id` int(2) DEFAULT NULL,
  `spendxp_char_id` int(3) DEFAULT NULL,
  `spendxp_skill_id` int(3) DEFAULT NULL,
  `spendxp_progress_id` int(3) DEFAULT NULL,
  `shop_notes` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=294 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbskills_aquired`
--

INSERT INTO `tbskills_aquired` (`spendxp_id`, `spendxp_game_id`, `spendxp_char_id`, `spendxp_skill_id`, `spendxp_progress_id`, `shop_notes`) VALUES
(15, 14, 4, 15, 0, ''),
(16, 14, 4, 14, 0, ''),
(18, 14, 3, 1, 0, ''),
(19, 14, 3, 2, 0, ''),
(23, 14, 2, 33, 0, ''),
(24, 14, 2, 10, 0, ''),
(30, 14, 5, 39, 0, ''),
(61, 14, 1, 13, 0, ''),
(62, 14, 1, 98, 0, ''),
(65, 14, 3, 26, 13, ''),
(66, 14, 2, 32, 13, ''),
(97, 14, 5, 39, 13, ''),
(132, 14, 1, 101, 0, ''),
(133, 14, 4, 18, 0, ''),
(136, 14, 5, 187, 16, ''),
(137, 14, 5, 189, 16, ''),
(242, 14, 2, 38, 22, ''),
(244, 14, 3, 27, 22, ''),
(269, 38, 7, 98, 34, ''),
(270, 38, 7, 99, 34, NULL),
(283, 42, 53, 33, NULL, NULL),
(284, 42, 54, 11, NULL, NULL),
(285, 42, 55, 2, NULL, NULL),
(286, 47, 56, 33, NULL, NULL),
(287, 47, 57, 11, NULL, NULL),
(288, 47, 58, 2, NULL, NULL),
(289, 47, 59, 69, NULL, NULL),
(290, 48, 60, 33, NULL, NULL),
(291, 48, 61, 11, NULL, NULL),
(292, 48, 62, 2, NULL, NULL),
(293, 48, 63, 69, NULL, NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tbcampaign`
--
ALTER TABLE `tbcampaign`
 ADD PRIMARY KEY (`cam_id`);

--
-- Indexen voor tabel `tbcharacters`
--
ALTER TABLE `tbcharacters`
 ADD PRIMARY KEY (`char_id`);

--
-- Indexen voor tabel `tbclasses`
--
ALTER TABLE `tbclasses`
 ADD PRIMARY KEY (`class_id`);

--
-- Indexen voor tabel `tbgames`
--
ALTER TABLE `tbgames`
 ADD PRIMARY KEY (`game_id`);

--
-- Indexen voor tabel `tbgroup`
--
ALTER TABLE `tbgroup`
 ADD PRIMARY KEY (`grp_id`);

--
-- Indexen voor tabel `tbheroes`
--
ALTER TABLE `tbheroes`
 ADD PRIMARY KEY (`hero_id`);

--
-- Indexen voor tabel `tbitems`
--
ALTER TABLE `tbitems`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexen voor tabel `tbitems_aquired`
--
ALTER TABLE `tbitems_aquired`
 ADD PRIMARY KEY (`shop_id`);

--
-- Indexen voor tabel `tbitems_relics`
--
ALTER TABLE `tbitems_relics`
 ADD PRIMARY KEY (`relic_id`);

--
-- Indexen voor tabel `tbplayerlist`
--
ALTER TABLE `tbplayerlist`
 ADD PRIMARY KEY (`player_id`);

--
-- Indexen voor tabel `tbquests`
--
ALTER TABLE `tbquests`
 ADD PRIMARY KEY (`quest_id`);

--
-- Indexen voor tabel `tbquests_progress`
--
ALTER TABLE `tbquests_progress`
 ADD PRIMARY KEY (`progress_id`);

--
-- Indexen voor tabel `tbsearch`
--
ALTER TABLE `tbsearch`
 ADD PRIMARY KEY (`search_id`);

--
-- Indexen voor tabel `tbskills`
--
ALTER TABLE `tbskills`
 ADD PRIMARY KEY (`skill_id`);

--
-- Indexen voor tabel `tbskills_aquired`
--
ALTER TABLE `tbskills_aquired`
 ADD PRIMARY KEY (`spendxp_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tbcharacters`
--
ALTER TABLE `tbcharacters`
MODIFY `char_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT voor een tabel `tbclasses`
--
ALTER TABLE `tbclasses`
MODIFY `class_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT voor een tabel `tbgames`
--
ALTER TABLE `tbgames`
MODIFY `game_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT voor een tabel `tbgroup`
--
ALTER TABLE `tbgroup`
MODIFY `grp_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT voor een tabel `tbitems_aquired`
--
ALTER TABLE `tbitems_aquired`
MODIFY `shop_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=310;
--
-- AUTO_INCREMENT voor een tabel `tbitems_relics`
--
ALTER TABLE `tbitems_relics`
MODIFY `relic_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT voor een tabel `tbquests_progress`
--
ALTER TABLE `tbquests_progress`
MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT voor een tabel `tbsearch`
--
ALTER TABLE `tbsearch`
MODIFY `search_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `tbskills`
--
ALTER TABLE `tbskills`
MODIFY `skill_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=200;
--
-- AUTO_INCREMENT voor een tabel `tbskills_aquired`
--
ALTER TABLE `tbskills_aquired`
MODIFY `spendxp_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=294;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
