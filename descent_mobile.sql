-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 15 dec 2014 om 01:32
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
  `cam_id` int(1) NOT NULL,
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
(10, 'Belthir Lieutenant Pack', 'lieutenant', NULL, NULL, NULL, '2nd', NULL, NULL),
(11, 'Eliza Farrow Lieutenant Pack', 'lieutenant', NULL, NULL, NULL, '2nd', NULL, NULL),
(12, 'Alric Farrow Lieutenant Pack', 'lieutenant', NULL, NULL, NULL, '2nd', NULL, NULL),
(13, 'Merick Farrow Lieutenant Pack', 'lieutenant', NULL, NULL, NULL, '2nd', NULL, NULL),
(14, 'Baron Zachareth Lieutenant Pack', 'lieutenant', NULL, NULL, NULL, '2nd', NULL, NULL),
(15, 'Splig Lieutenant Pack', 'lieutenant', NULL, NULL, NULL, '2nd', NULL, NULL),
(16, 'Valyndra Lieutenant Pack', 'lieutenant', NULL, NULL, NULL, '2nd', NULL, NULL),
(17, 'Ariad Lieutenant Pack', 'lieutenant', NULL, NULL, NULL, '2nd', NULL, NULL),
(18, 'Queen Ariad Lieutenant Pack', 'lieutenant', NULL, NULL, NULL, '2nd', NULL, NULL),
(19, 'Raythen Lieutenant Pack', 'lieutenant', NULL, NULL, NULL, '2nd', NULL, NULL),
(20, 'Serena Lieutenant Pack', 'lieutenant', NULL, NULL, NULL, '2nd', NULL, NULL),
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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

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
(68, 20, 50, 'dllrt', 0, 'Cursed By Power', 0),
(69, 20, 50, 'Frauke', 2, 'Berserker', 0),
(70, 20, 50, 'Tim', 6, 'Thief', 0),
(71, 20, 50, 'Maaike', 30, 'Runemaster', 0),
(72, 20, 52, 'dllrt', 0, 'Hybrid Loyalty', 1),
(73, 20, 52, 'Maaike', 2, 'Berserker', 1),
(74, 20, 52, 'Tim', 6, 'Wildlander', 1),
(75, 20, 53, 'dllrt', 0, 'NULL', 1),
(76, 20, 53, 'Frauke', 1, 'Berserker', 6),
(77, 20, 53, 'Maaike', 4, 'Necromancer', 0),
(78, 20, 53, 'Tim', 5, 'Wildlander', 6),
(79, 20, 56, 'dllrt', 0, 'Cursed By Power', 2),
(80, 20, 56, 'Frauke', 2, 'Berserker', 0),
(81, 20, 56, 'Tim', 6, 'Thief', 0),
(82, 20, 56, 'Maaike', 30, 'Runemaster', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

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
(16, 'Prophet', 'Healer', 38, 39, 51, 3),
(21, 'Hybrid Loyalty', 'Overlord', NULL, NULL, 201, 10),
(22, 'Endless Thirst', 'Overlord', NULL, NULL, 211, 11),
(23, 'The Fallen Elite', 'Overlord', NULL, NULL, 221, 12),
(24, 'Cursed By Power', 'Overlord', NULL, NULL, 231, 13),
(25, 'Seeds of Betrayal', 'Overlord', NULL, NULL, 241, 14),
(26, 'Goblin Uprising', 'Overlord', NULL, NULL, 251, 15),
(27, 'Dragon''s Greed', 'Overlord', NULL, NULL, 261, 16),
(28, 'Dark Illusions', 'Overlord', NULL, NULL, 271, 17),
(29, 'Tangled Web', 'Overlord', NULL, NULL, 281, 18),
(30, 'Skulduggery', 'Overlord', NULL, NULL, 291, 19);

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
  `game_gold` int(11) NOT NULL DEFAULT '0',
  `game_expansions` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbgames`
--

INSERT INTO `tbgames` (`game_id`, `game_grp_id`, `game_timestamp`, `game_dm`, `game_camp_id`, `game_gold`, `game_expansions`) VALUES
(14, 7, '2014-10-03 09:06:52', 'Tundrra', 0, 0, ''),
(38, 17, '2014-11-27 06:46:16', 'dllrt', 0, 200, ''),
(50, 17, '2014-12-13 23:31:22', 'dllrt', 0, 350, ''),
(52, 17, '2014-12-14 14:13:08', 'dllrt', 2, 125, '0,2,1,10,11,12,13,14,15'),
(53, 17, '2014-12-14 16:30:25', 'dllrt', 0, 0, '0,0,0,1'),
(54, 17, '2014-12-15 00:22:23', 'dllrt', 0, 0, '0,0,1'),
(55, 17, '2014-12-15 00:23:39', 'dllrt', 0, 0, '0,0,1,7'),
(56, 17, '2014-12-15 00:24:51', 'dllrt', 0, 0, '0,0,1,7,10,11,12,13,14,15,16');

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
  `item_type` varchar(10) NOT NULL,
  `market_act` int(1) DEFAULT NULL,
  `item_act` varchar(8) NOT NULL,
  `item_default_price` int(4) DEFAULT NULL,
  `item_sell_price` int(3) DEFAULT NULL,
  `item_starting` tinyint(1) NOT NULL,
  `owner` varchar(15) DEFAULT NULL,
  `market_img` varchar(36) DEFAULT NULL,
  `item_exp_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbitems`
--

INSERT INTO `tbitems` (`item_id`, `item_name`, `item_type`, `market_act`, `item_act`, `item_default_price`, `item_sell_price`, `item_starting`, `owner`, `market_img`, `item_exp_id`) VALUES
(1, 'Belt of Alchemy', 'other', 1, 'Act 1', 100, 50, 0, 'hero', 'beltofalchemy.jpg', 3),
(2, 'Belt of Waterwalking', 'other', 1, 'Act 1', 50, 25, 0, 'hero', 'beltofwaterwalking.jpg', 3),
(3, 'Deflecting Shield', '1h', 1, 'Act 1', 50, 25, 0, 'hero', 'deflectingshield.jpg', 3),
(4, 'Dire Flail', '2h', 1, 'Act 1', 150, 75, 0, 'hero', 'direflail.jpg', 3),
(15, 'Reaper''s Scythe', '2h', 0, 'Start', 0, 25, 1, 'Necromancer', 'reapersscythenecromancer.jpg', 0),
(19, 'Yew Shortbow', '2h', 0, 'Start', 0, 25, 1, 'Wildlander', 'yewshortbowwildlander.jpg', 0),
(20, 'Wooden Shield', '1h', 0, 'Start', 0, 25, 1, 'Disciple', 'woodenshielddisciple.jpg', 0),
(21, 'Iron Mace', '1h', 0, 'Start', 0, 25, 1, 'Disciple', 'ironmacedisciple.jpg', 0),
(22, 'Iron Longsword', '1h', 0, 'Start', 0, 25, 1, 'Knight', 'ironlongswordknight.jpg', 0),
(23, 'Wooden Shield', '1h', 0, 'Start', 0, 25, 1, 'Knight', 'woodenshieldknight.jpg', 0),
(24, 'Worn Greatsword', '2h', 0, 'Start', 0, 25, 1, 'Champion', 'worngreatswordchampion.jpg', 1),
(25, 'Horn of Courage', 'other', 0, 'Start', 0, 25, 1, 'Champion', 'hornofcouragechampion.jpg', 1),
(26, 'Hunting Spear', '1h', 0, 'Start', 0, 25, 1, 'Beastmaster', 'huntingspearbeastmaster.jpg', 2),
(27, 'Skinning Knife', '1h', 0, 'Start', 0, 25, 1, 'Beastmaster', 'skinningknifebeastmaster.jpg', 2),
(28, 'Leather Whip', '1h', 0, 'Start', 0, 25, 1, 'Treasure Hunter', 'leatherwhiptreasurehunter.jpg', 2),
(29, 'The Dead Man''s Compass', 'other', 0, 'Start', 0, 25, 1, 'Treasure Hunter', 'thedeadmanscompasstreasurehunter.jpg', 2),
(30, 'Throwing Knives', '1h', 0, 'Start', 0, 25, 1, 'Thief', 'throwingknivesthief.jpg', 0),
(31, 'Lucky Charm', 'other', 0, 'Start', 0, 25, 1, 'Thief', 'luckycharmthief.jpg', 0),
(32, 'Hunting Knife', '1h', 0, 'Start', 0, 25, 1, 'Stalker', 'huntingknifestalker.jpg', 3),
(33, 'Arcane Bolt', '2h', 0, 'Start', 0, 25, 1, 'Runemaster', 'arcaneboltrunemaster.jpg', 0),
(34, 'Staff of the Grave', '2h', 0, 'Start', 0, 25, 1, 'Hexer', 'staffofthegravehexer.jpg', 2),
(35, 'Statis Rune', '2h', 0, 'Start', 0, 25, 1, 'Geomancer', 'stasisrunegeomancer.jpg', 1),
(36, 'Oakstaff', '2h', 0, 'Start', 0, 25, 1, 'Spiritspeaker', 'oakstaffspiritspeaker.jpg', 0),
(37, 'Smoking Vials', '1h', 0, 'Start', 0, 25, 1, 'Apothecary', 'smokingvialsapothecary.jpg', 2),
(38, 'Iron Flail', '1h', 0, 'Start', 0, 25, 1, 'Prophet', 'ironflailprophet.jpg', 0),
(39, 'Sage''s Tome', 'other', 0, 'Start', 0, 25, 1, 'Prophet', 'sagestomeprophet.jpg', 0),
(40, 'Chipped Greataxe', '2h', 0, 'Start', 0, 25, 1, 'Berserker', 'chippedgreataxeberserker.jpg', 0),
(68, 'Guardian Axe', '2h', 5, '', 175, 75, 0, 'hero', 'guardianaxe.jpg', 3),
(69, 'Lifedrain Scepeter', '1h', 5, '', 100, 50, 0, 'hero', 'lifedrainscepter.jpg', 3),
(70, 'Mapstone', 'other', 5, '', 50, 25, 0, 'hero', 'mapstone.jpg', 3),
(71, 'Trident', '1h', 5, '', 125, 50, 0, 'hero', 'trident.jpg', 3),
(72, 'Thief''s Vest', 'armor', 5, '', 100, 50, 0, 'hero', 'theifsvest.jpg', 2),
(73, 'Teleportation Rune', '2h', 5, '', 125, 50, 0, 'hero', 'teleportationrune.jpg', 2),
(74, 'Shield of Light', '1h', 5, '', 75, 25, 0, 'hero', 'shieldoflight.jpg', 2),
(75, 'Serpent Dagger', '1h', 5, '', 125, 50, 0, 'hero', 'serpentdagger.jpg', 2),
(76, 'Rune Plate', 'armor', 5, '', 175, 75, 0, 'hero', 'runeplate.jpg', 2),
(77, 'Poisoned Blowgun', '1h', 5, '', 100, 50, 0, 'hero', 'poisonedblowgun.jpg', 2),
(78, 'Mace of Aver', '2h', 5, '', 150, 75, 0, 'hero', 'maceofaver.jpg', 2),
(79, 'Jinn''s Lamp', 'other', 5, '', 100, 50, 0, 'hero', 'jinnslamp.jpg', 2),
(80, 'Elven Boots', 'other', 5, '', 50, 25, 0, 'hero', 'elvenboots.jpg', 2),
(81, 'Bow of Bone', '2h', 5, '', 125, 50, 0, 'hero', 'bowofbone.jpg', 2),
(82, 'Bearded Axe', '2h', 5, '', 175, 75, 0, 'hero', 'beardedaxe.jpg', 2),
(83, 'Flash Powder', 'other', 5, '', 100, 50, 0, 'hero', 'flashpowder.jpg', 1),
(84, 'Magic Staff', '2h', 1, 'Act 1', 150, 75, 0, 'hero', 'magicstaff.jpg', 0),
(85, 'Leather Armor', 'armor', 1, 'Act 1', 75, 25, 0, 'hero', 'leatherarmor.jpg', 0),
(86, 'Scorpion Helm', 'other', 1, 'Act 1', 75, 25, 0, 'hero', 'scorpionhelm.jpg', 0),
(87, 'Iron Shield', '1h', 1, 'Act 1', 50, 25, 0, 'hero', 'ironshield.jpg', 0),
(88, 'Lucky Charm', 'other', 1, 'Act 1', 100, 50, 0, 'hero', 'luckycharm.jpg', 0),
(89, 'Magma Blast', '2h', 1, 'Act 1', 150, 75, 0, 'hero', 'magmablast.jpg', 1),
(90, 'Handbow', 'other', 1, 'Act 1', 150, 75, 0, 'hero', 'handbow.jpg', 1),
(91, 'Halberd', '2h', 1, 'Act 1', 125, 50, 0, 'hero', 'halberd.jpg', 1),
(92, 'Sunburst', '2h', 1, 'Act 1', 125, 50, 0, 'hero', 'sunburst.jpg', 0),
(93, 'Steel Broadsword', '1h', 1, 'Act 1', 100, 50, 0, 'hero', 'steelbroadsword.jpg', 0),
(94, 'Sling', '1h', 1, 'Act 1', 75, 25, 0, 'hero', 'sling.jpg', 0),
(96, 'Ring of Power', 'other', 1, 'Act 1', 150, 75, 0, 'hero', 'ringofpower.jpg', 0),
(97, 'Mana Weave', 'other', 1, 'Act 1', 125, 50, 0, 'hero', 'manaweave.jpg', 0),
(99, 'Light Hammer', '1h', 1, 'Act 1', 75, 25, 0, 'hero', 'lighthammer.jpg', 0),
(101, 'Iron Spear', '1h', 1, 'Act 1', 75, 25, 0, 'hero', 'ironspear.jpg', 0),
(103, 'Iron Battleaxe', '2h', 1, 'Act 1', 100, 50, 0, 'hero', 'ironbattleaxe.jpg', 0),
(104, 'Immolation', '2h', 1, 'Act 1', 150, 75, 0, 'hero', 'immolation.jpg', 0),
(105, 'Heavy Cloak', 'armor', 1, 'Act 1', 75, 25, 0, 'hero', 'heavycloak.jpg', 0),
(106, 'Elm Greatbow', '2h', 1, 'Act 1', 100, 50, 0, 'hero', 'elmgreatbow.jpg', 0),
(107, 'Crossbow', '1h', 1, 'Act 1', 175, 75, 0, 'hero', 'crossbow.jpg', 0),
(108, 'Chainmail', 'armor', 1, 'Act 1', 150, 75, 0, 'hero', 'chainmail.jpg', 0),
(109, 'Belt of Strength', 'other', 2, 'Act 2', 125, 50, 0, 'hero', 'beltofstrength.jpg', 3),
(110, 'Blasting Rune', '2h', 2, 'Act 2', 200, 100, 0, 'hero', 'blastingrune.jpg', 3),
(111, 'Boomerang', '1h', 2, 'Act 2', 200, 100, 0, 'hero', 'boomerang.jpg', 3),
(112, 'Glaive', '2h', 2, 'Act 2', 175, 75, 0, 'hero', 'glaive.jpg', 3),
(113, 'Stone Armor', 'armor', 2, 'Act 2', 225, 100, 0, 'hero', 'stonearmor.jpg', 3),
(114, 'Staff of the Wild', '2h', 2, 'Act 2', 175, 75, 0, 'hero', 'staffofthewild.jpg', 2),
(115, 'Shroud of Dusk', 'other', 2, 'Act 2', 150, 75, 0, 'hero', 'shroudofdusk.jpg', 2),
(116, 'Rune of Misery', '2h', 2, 'Act 2', 250, 125, 0, 'hero', 'runeofmisery.jpg', 2),
(117, 'Rage Blade', '1h', 2, 'Act 2', 200, 100, 0, 'hero', 'rageblade.jpg', 2),
(118, 'Obsidian Scalemail', 'armor', 2, 'Act 2', 275, 125, 0, 'hero', 'obsidianscalemail.jpg', 2),
(119, 'Obsidian Greataxe', '2h', 2, 'Act 2', 225, 100, 0, 'hero', 'obsidiangreataxe.jpg', 2),
(120, 'Iron Claws', '1h', 2, 'Act 2', 175, 75, 0, 'hero', 'ironclaws.jpg', 2),
(121, 'Cloak of Deception', 'armor', 2, 'Act 2', 200, 100, 0, 'hero', 'cloakofdeception.jpg', 2),
(122, 'Bow of the Eclipse', '2h', 2, 'Act 2', 250, 125, 0, 'hero', 'bowoftheeclipse.jpg', 2),
(123, 'Black Iron Helm', 'other', 2, 'Act 2', 150, 75, 0, 'hero', 'blackironhelm.jpg', 2),
(124, 'Staff of Kellos', '2h', 2, 'Act 2', 175, 75, 0, 'hero', 'staffofkellos.jpg', 1),
(125, 'Inscribed Robes', 'armor', 2, 'Act 2', 225, 100, 0, 'hero', 'inscribedrobes.jpg', 1),
(126, 'Merciful Boots', 'other', 2, 'Act 2', 100, 50, 0, 'hero', 'mercifulboots.jpg', 1),
(127, 'Bow of the Sky', '2h', 2, 'Act 2', 225, 100, 0, 'hero', 'bowofthesky.jpg', 1),
(128, 'Scalemail', 'armor', 2, 'Act 2', 225, 100, 0, 'hero', 'scalemail.jpg', 1),
(129, 'Tival Crystal', 'other', 2, 'Act 2', 175, 75, 0, 'hero', 'tivalcrystal.jpg', 0),
(130, 'Steel Greatsword', '2h', 2, 'Act 2', 200, 100, 0, 'hero', 'steelgreatsword.jpg', 0),
(131, 'Platemail', 'armor', 2, 'Act 2', 250, 125, 0, 'hero', 'platemail.jpg', 0),
(132, 'Mace of Kellos', '1h', 2, 'Act 2', 175, 125, 0, 'hero', 'maceofkellos.jpg', 0),
(133, 'Lightning Strike', '2h', 2, 'Act 2', 200, 100, 0, 'hero', 'lightningstrike.jpg', 0),
(134, 'Lataria Longbow', '2h', 2, 'Act 2', 200, 100, 0, 'hero', 'latarilongbow.jpg', 0),
(135, 'Iron-Bound Ring', 'other', 2, 'Act 2', 150, 75, 0, 'hero', 'ironboundring.jpg', 0),
(136, 'Ice Storm', '2h', 2, 'Act 2', 150, 75, 0, 'hero', 'icestorm.jpg', 0),
(137, 'Heavy Steel Shield', '1h', 2, 'Act 2', 100, 50, 0, 'hero', 'heavysteelshield.jpg', 0),
(138, 'Grinding Axe', '2h', 2, 'Act 2', 175, 75, 0, 'hero', 'grindingaxe.jpg', 0),
(139, 'Elven Cloak', 'armor', 2, 'Act 2', 225, 100, 0, 'hero', 'elvencloak.jpg', 0),
(140, 'Dwarven Firebomb', '1h', 2, 'Act 2', 175, 75, 0, 'hero', 'dwarvenfirebomb.jpg', 0),
(141, 'Dragontooth Hammer', '1h', 2, 'Act 2', 250, 125, 0, 'hero', 'dragontoothhammer.jpg', 0),
(142, 'Demonhide Leather', 'armor', 2, 'Act 2', 200, 100, 0, 'hero', 'demonhideleather.jpg', 0),
(143, 'Black Widow''s Web', '1h', 0, 'Start', 0, 25, 1, 'Stalker', NULL, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbitems_aquired`
--

CREATE TABLE IF NOT EXISTS `tbitems_aquired` (
`shop_id` int(3) NOT NULL,
  `aq_item_id` int(3) DEFAULT NULL,
  `aq_relic_id` int(3) DEFAULT NULL,
  `aq_char_id` int(3) NOT NULL,
  `aq_item_price_ovrd` int(4) DEFAULT NULL,
  `aq_item_sold` tinyint(1) NOT NULL,
  `aq_progress_id` int(11) DEFAULT NULL,
  `shop_notes` varchar(10) DEFAULT NULL,
  `aq_game_id` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=347 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbitems_aquired`
--

INSERT INTO `tbitems_aquired` (`shop_id`, `aq_item_id`, `aq_relic_id`, `aq_char_id`, `aq_item_price_ovrd`, `aq_item_sold`, `aq_progress_id`, `shop_notes`, `aq_game_id`) VALUES
(56, 40, NULL, 2, 0, 0, 1, '', 14),
(57, 19, NULL, 3, 0, 0, 1, '', 14),
(58, 21, NULL, 4, 0, 0, 1, '', 14),
(59, 20, NULL, 4, 0, 0, 1, '', 14),
(60, 33, NULL, 1, 0, 0, 1, '', 14),
(63, 85, NULL, 1, -75, 0, 13, '', 14),
(64, 86, NULL, 3, -75, 0, 13, '', 14),
(67, 87, NULL, 2, -50, 0, 13, '', 14),
(68, 88, NULL, 4, -100, 0, 13, '', 14),
(69, 84, NULL, 1, 175, 0, 16, '', 14),
(73, NULL, 4, 5, 0, 0, 16, '', 14),
(134, 105, NULL, 4, -75, 0, 16, '', 14),
(135, 85, NULL, 3, -75, 0, 16, '', 14),
(140, NULL, 2, 1, 0, 0, 22, '', 14),
(243, 103, NULL, 2, -100, 0, 22, '', 14),
(270, 76, NULL, 7, 0, 0, 35, '', 38),
(271, 82, NULL, 7, -175, 0, 35, '', 38),
(278, NULL, 3, 6, NULL, 0, 43, NULL, 38),
(279, NULL, 2, 7, NULL, 0, 56, NULL, 38),
(318, 40, NULL, 69, NULL, 0, NULL, NULL, 50),
(319, 30, NULL, 70, NULL, 0, NULL, NULL, 50),
(320, 31, NULL, 70, NULL, 0, NULL, NULL, 50),
(321, 33, NULL, 71, NULL, 0, NULL, NULL, 50),
(322, NULL, 3, 70, NULL, 0, 83, NULL, 50),
(323, NULL, 4, 68, NULL, 0, 86, NULL, 50),
(324, NULL, 5, 68, NULL, 0, 87, NULL, 50),
(325, 40, NULL, 73, NULL, 0, NULL, NULL, 52),
(326, 19, NULL, 74, NULL, 0, NULL, NULL, 52),
(327, 40, NULL, 76, NULL, 0, NULL, NULL, 53),
(328, 15, NULL, 77, NULL, 0, NULL, NULL, 53),
(329, 19, NULL, 78, NULL, 0, NULL, NULL, 53),
(330, NULL, 3, 78, NULL, 0, 92, NULL, 53),
(331, NULL, 4, 75, NULL, 0, 94, NULL, 53),
(332, NULL, 5, 75, NULL, 0, 95, NULL, 53),
(336, 93, NULL, 76, NULL, 0, 95, NULL, 53),
(337, 89, NULL, 77, NULL, 0, 95, NULL, 53),
(338, 90, NULL, 78, NULL, 0, 95, NULL, 53),
(339, 40, NULL, 80, NULL, 0, NULL, NULL, 56),
(340, 30, NULL, 81, NULL, 0, NULL, NULL, 56),
(341, 31, NULL, 81, NULL, 0, NULL, NULL, 56),
(342, 33, NULL, 82, NULL, 0, NULL, NULL, 56),
(343, 103, NULL, 80, NULL, 0, 98, NULL, 56),
(344, NULL, 3, 81, NULL, 0, 99, NULL, 56),
(345, 85, NULL, 82, NULL, 0, 99, NULL, 56),
(346, 105, NULL, 81, NULL, 0, 99, NULL, 56);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbitems_relics`
--

CREATE TABLE IF NOT EXISTS `tbitems_relics` (
`relic_id` int(3) NOT NULL,
  `relic_h_name` varchar(24) NOT NULL,
  `relic_ol_name` varchar(24) NOT NULL,
  `relic_type` varchar(8) NOT NULL,
  `relic_exp_id` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbitems_relics`
--

INSERT INTO `tbitems_relics` (`relic_id`, `relic_h_name`, `relic_ol_name`, `relic_type`, `relic_exp_id`) VALUES
(1, 'Dawnblade', 'Duskblade', '1h', 0),
(2, 'Fortuna''s Dice', 'Bones of Woe', 'other', 0),
(3, 'Shield of the Dark God', 'Shield of Zorek''s Favor', '1h', 0),
(4, 'Staff of Light', 'Staff of Shadows', '2h', 0),
(5, 'The Shadow Rune', 'The Shadow Rune', '2h', 0),
(6, 'Trueshot', 'Scorpion''s Kiss', '2h', 0),
(7, 'Valyndra''s Bane', 'Her Majesty''s Malice', '2h', 1),
(8, 'Aurium Mail', 'Valyndra''s Gift', 'armor', 1),
(9, 'Gauntlets of Power', 'Gauntlets of Spite', 'other', 2),
(10, 'Living Heart', 'Fallen Heart', 'other', 2),
(11, 'Sun Stone', 'Sun''s Fury', 'other', 2),
(12, 'Immunity Elixir', 'Curative Vial', 'other', 3),
(13, 'Mending Talisman', 'Omen of Blight', 'other', 3),
(14, 'Workman''s Ring', 'Taskmaster''s Ring', 'other', 3);

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
  `quest_next_h_id` int(3) DEFAULT NULL,
  `quest_next_ol_id` int(3) DEFAULT NULL,
  `quest_rew_ol_xp` int(3) DEFAULT NULL,
  `quest_rew_h_xp` int(3) NOT NULL,
  `quest_rew_h_gold` int(3) DEFAULT NULL,
  `quest_rew_relic_id` int(3) DEFAULT NULL,
  `quest_rew_special` tinyint(1) NOT NULL DEFAULT '0',
  `quest_travel` varchar(64) DEFAULT NULL,
  `quest_order` int(1) DEFAULT NULL,
  `quest_expansion_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbquests`
--

INSERT INTO `tbquests` (`quest_id`, `quest_name`, `quest_type`, `quest_act`, `quest_next_h_id`, `quest_next_ol_id`, `quest_rew_ol_xp`, `quest_rew_h_xp`, `quest_rew_h_gold`, `quest_rew_relic_id`, `quest_rew_special`, `quest_travel`, `quest_order`, `quest_expansion_id`) VALUES
(0, 'First Blood', 'Quest', 'Introduction', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 2, 0),
(1, 'A Fat Goblin', 'Quest', 'Act 1', 2, 3, 1, 0, 25, NULL, 0, 'road,road,plains', 3, 0),
(2, 'The Monster''s Hoard', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, 6, 0, 'road,water,mountains,plains,forest,mountains', 6, 0),
(3, 'The Frozen Spire', 'Quest', 'Act 2', NULL, NULL, 2, 1, 0, NULL, 0, 'road,water,mountains,plains,forest,mountains', 6, 0),
(4, 'Castle Daerion', 'Quest', 'Act 1', 5, 6, 1, 0, 25, NULL, 0, 'road,road', 3, 0),
(5, 'The Dawnblade', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, 1, 1, 'road,road,forest', 6, 0),
(6, 'The Desecrated Tomb', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, 1, 1, 'road,road,forest', 6, 0),
(7, 'The Cardinal''s Plight', 'Quest', 'Act 1', 8, 9, 0, 0, 0, 4, 0, 'road,water,plains,mountains', 3, 0),
(8, 'Enduring the Elements', 'Quest', 'Act 2', NULL, NULL, 1, 0, 25, NULL, 1, 'road,water,plains,water', 6, 0),
(9, 'The Ritual of Shadows', 'Quest', 'Act 2', NULL, NULL, 1, 0, 25, NULL, 1, 'road,water,plains,road', 6, 0),
(10, 'The Masquerade Ball', 'Quest', 'Act 1', 11, 12, 0, 0, 0, 2, 0, 'road,road,plains', 3, 0),
(11, 'Blood of Heroes', 'Quest', 'Act 2', NULL, NULL, 2, 1, 0, NULL, 0, 'road,water,plains,road', 6, 0),
(12, 'The Twin Idols', 'Quest', 'Act 2', NULL, NULL, 2, 1, 0, NULL, 0, 'road,water,plains,road,forest,mountains', 6, 0),
(13, 'Death on the Wing', 'Quest', 'Act 1', 14, 15, 0, 0, 0, 3, 0, 'road,road,water', 3, 0),
(14, 'The Wyrm Turns', 'Quest', 'Act 2', NULL, NULL, 2, 1, 0, NULL, 0, 'road,water,plains,mountains,plains,mountains', 6, 0),
(15, 'The Wyrm Rises', 'Quest', 'Act 2', NULL, NULL, 1, 0, 25, NULL, 0, 'road,water,plains,mountains,plains,mountains', 6, 0),
(16, 'The Shadow Vault', 'Quest', 'Interlude', 999, NULL, 0, 0, 0, 5, 0, 'road,road,plains,forest', 4, 0),
(17, 'The Overlord Revealed', 'Quest', 'Interlude', NULL, 999, 0, 0, 0, 5, 0, 'road,road,plains,forest', 5, 0),
(18, 'Gryvorn Unleashed', 'Quest', 'Finale', 999, NULL, 0, 0, 0, NULL, 0, 'road,water,mountains,plains', 7, 0),
(19, 'The Man Who Would Be King', 'Quest', 'Finale', NULL, 999, 0, 0, 0, NULL, 0, 'road,water,mountains,plains', 8, 0),
(20, 'Gold Digger', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, 'road,road,road', 3, 1),
(21, 'Rude Awakening', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, 'plains,plains,forest,road', 3, 1),
(22, 'What''s yours is Mine', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, 'plains,forest,mountains,mountains', 3, 1),
(23, 'At the Forge', 'Quest', 'Finale 1', NULL, NULL, 0, 0, 0, NULL, 0, 'forest,forest,mountains,mountains', 7, 1),
(24, 'Armored to the Teeth', 'Quest', 'Finale 2', NULL, NULL, 0, 0, 0, NULL, 0, 'plains,forest,mountains,road', 8, 1),
(25, 'Ruinous Whispers', 'Quest', 'Introduction', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 2, 2),
(26, 'Gathering Foretold', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, 'water,road,forest', 3, 2),
(27, 'Honor Among Thieves', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, 'road,plains,forest', 3, 2),
(28, 'Reclamation', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, 'road,forest,mountains', 3, 2),
(29, 'Through the Mist', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, 'water,road,forest,forest', 3, 2),
(30, 'Barrow of Barris', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, 'road,forest,plains', 3, 2),
(31, 'Secrets in Stone', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, 'road,forest,plains,mountains', 3, 2),
(32, 'Fury of the Tempest', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, 'road,water,mountains', 3, 2),
(33, 'Back from the Dead', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, 'road,water,forest', 3, 2),
(34, 'Pilgrimage', 'Quest', 'Interlude', NULL, NULL, 0, 0, 0, NULL, 0, 'road,forest,plains', 4, 2),
(35, 'Fortune and Glory', 'Quest', 'Interlude', NULL, NULL, 0, 0, 0, NULL, 0, 'road,forest,plains', 4, 2),
(36, 'Heart of the Wilds', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, 'road,forest,plains,mountains', 5, 2),
(37, 'Let the Truth be Buried', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, 'road,forest,plains,mountains', 5, 2),
(38, 'Fountain of Insight', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, 'road,plains,mountains', 5, 2),
(39, 'Web of Power', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, 'road,forest,plains,mountains', 5, 2),
(40, 'Fire and Brimstone', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, 'road,forest,plains,mountains', 5, 2),
(41, 'Tipping the Scales', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, 'road,forest,plains,mountains', 5, 2),
(42, 'Endless Night', 'Quest', 'Finale', NULL, NULL, 0, 0, 0, NULL, 0, 'road,forest,plains,mountains', 6, 2),
(43, 'A Glimmer of Hope', 'Quest', 'Finale', NULL, NULL, 0, 0, 0, NULL, 0, 'road,forest,plains,mountains', 6, 2),
(44, 'Ghost Town', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 2, 3),
(45, 'Food for Worms', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 2, 3),
(46, 'Three Heads, One Mind', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 2, 3),
(47, 'Source of Sickness', 'Quest', 'Finale 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 3, 3),
(48, 'Spreading Affliction', 'Quest', 'Finale 2', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 4, 3),
(49, 'A Demostration', 'Quest', 'Introduction', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 2, 4),
(50, 'Civil War', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 3, 4),
(51, 'Without Mercy', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 3, 4),
(52, 'Local Politics', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 3, 4),
(53, 'Prey', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 3, 4),
(54, 'Price of Power', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 3, 4),
(55, 'The Incident', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 3, 4),
(56, 'Rat-Thing King', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 3, 4),
(57, 'Respected Citizen', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 3, 4),
(58, 'The True Enemy', 'Quest', 'Interlude 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 4, 4),
(59, 'Traitors Among Us', 'Quest', 'Interlude 2', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 5, 4),
(60, 'Overdue Demise', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 6, 4),
(61, 'Into the Dark', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 6, 4),
(62, 'Nightmares', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 6, 4),
(63, 'Arise My Friends', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 6, 4),
(64, 'Wide Spread Panic', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 6, 4),
(65, 'Lost', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 6, 4),
(66, 'The Black Realm', 'Quest', 'Finale 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 7, 4),
(67, 'The City Falls', 'Quest', 'Finale 2', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 8, 4),
(68, 'Spread Your Wings', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 2, 5),
(69, 'Finders and Keepers', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 2, 5),
(70, 'My House, My Rules', 'Quest', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 2, 5),
(71, 'Where the Heart Is', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 3, 5),
(72, 'Wrong Man for the Job', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 3, 5),
(73, 'Beneath the Manor', 'Quest', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 3, 5),
(74, 'Crusade of the Forgotten', 'Rumor', 'Act 1', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 1, 6),
(75, 'Shadow Watch', 'Rumor', 'Act 2', NULL, NULL, 0, 0, 0, NULL, 0, NULL, 2, 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbquests_progress`
--

CREATE TABLE IF NOT EXISTS `tbquests_progress` (
`progress_id` int(11) NOT NULL,
  `progress_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `progress_game_id` int(2) DEFAULT NULL,
  `progress_quest_id` int(3) DEFAULT NULL,
  `progress_quest_type` varchar(20) NOT NULL DEFAULT 'Quest',
  `progress_quest_winner` varchar(13) DEFAULT NULL,
  `progress_enc1_winner` varchar(13) DEFAULT NULL,
  `progress_relic_char` int(11) DEFAULT NULL,
  `progress_set_travel` tinyint(1) NOT NULL,
  `progress_set_spendxp` tinyint(1) NOT NULL,
  `progress_set_items` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbquests_progress`
--

INSERT INTO `tbquests_progress` (`progress_id`, `progress_timestamp`, `progress_game_id`, `progress_quest_id`, `progress_quest_type`, `progress_quest_winner`, `progress_enc1_winner`, `progress_relic_char`, `progress_set_travel`, `progress_set_spendxp`, `progress_set_items`) VALUES
(1, '0000-00-00 00:00:00', 14, 0, 'Quest', 'Overlord Wins', '', NULL, 1, 1, 1),
(13, '0000-00-00 00:00:00', 14, 4, 'Quest', 'Overlord Wins', 'Heroes Win', NULL, 1, 1, 1),
(16, '0000-00-00 00:00:00', 14, 7, 'Quest', 'Overlord Wins', 'Heroes Win', NULL, 1, 1, 1),
(22, '0000-00-00 00:00:00', 14, 10, 'Quest', 'Heroes Win', 'Heroes Win', NULL, 1, 1, 1),
(34, '0000-00-00 00:00:00', 38, 0, 'Quest', 'Heroes Win', 'Heroes Win', NULL, 1, 1, 1),
(35, '0000-00-00 00:00:00', 38, 7, 'Quest', 'Heroes Win', 'No Winner', NULL, 1, 1, 1),
(43, '2014-12-08 19:58:15', 38, 13, 'Quest', 'Heroes Win', 'No Winner', 6, 0, 0, 0),
(54, '2014-12-08 23:34:08', 38, 1, 'Quest', 'Heroes Win', 'No Winner', NULL, 0, 0, 0),
(55, '2014-12-08 23:34:49', 38, 4, 'Quest', 'Overlord Wins', 'No Winner', NULL, 0, 0, 0),
(56, '2014-12-08 23:35:29', 38, 10, 'Quest', 'Heroes Win', 'No Winner', 7, 0, 0, 0),
(82, '2014-12-13 23:31:22', 50, 0, 'Quest', 'Heroes Win', 'No Winner', NULL, 0, 0, 0),
(83, '2014-12-13 23:33:33', 50, 13, 'Quest', 'Heroes Win', 'Overlord Wins', 70, 1, 0, 0),
(85, '2014-12-13 23:38:10', 50, 4, 'Quest', 'Overlord Wins', 'No Winner', NULL, 1, 1, 0),
(86, '2014-12-14 00:29:17', 50, 7, 'Quest', 'Overlord Wins', 'Overlord Wins', 68, 1, 1, 0),
(87, '2014-12-14 13:00:51', 50, 17, 'Quest', 'Heroes Win', 'No Winner', 68, 1, 1, 0),
(88, '2014-12-14 14:12:11', 51, 25, 'Quest', NULL, NULL, NULL, 0, 0, 0),
(89, '2014-12-14 14:13:08', 52, 25, 'Quest', 'Heroes Win', 'No Winner', NULL, 0, 0, 0),
(90, '2014-12-14 14:43:18', 52, 27, 'Quest', NULL, NULL, NULL, 1, 0, 0),
(91, '2014-12-14 16:30:26', 53, 0, 'Quest', 'Heroes Win', 'No Winner', NULL, 0, 1, 0),
(92, '2014-12-14 16:37:40', 53, 13, 'Quest', 'Heroes Win', 'No Winner', 78, 1, 1, 0),
(93, '2014-12-14 16:43:27', 53, 4, 'Quest', 'Heroes Win', 'No Winner', NULL, 1, 1, 0),
(94, '2014-12-14 16:43:42', 53, 7, 'Quest', 'Overlord Wins', 'No Winner', 75, 1, 1, 0),
(95, '2014-12-14 16:48:02', 53, 16, 'Quest', 'Overlord Wins', 'Heroes Win', 75, 1, 1, 1),
(96, '2014-12-15 00:22:23', 54, 0, 'Quest', NULL, NULL, NULL, 0, 0, 0),
(97, '2014-12-15 00:23:39', 55, 0, 'Quest', NULL, NULL, NULL, 0, 0, 0),
(98, '2014-12-15 00:24:51', 56, 0, 'Quest', 'Heroes Win', 'No Winner', NULL, 0, 1, 1),
(99, '2014-12-15 00:27:21', 56, 13, 'Quest', 'Heroes Win', 'Overlord Wins', 81, 1, 1, 1);

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
  `skill_class` varchar(24) DEFAULT NULL,
  `skill_plot` tinyint(1) NOT NULL,
  `skill_cost` int(2) DEFAULT NULL,
  `skill_card` varchar(28) DEFAULT NULL,
  `skill_expansion` varchar(17) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=311 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbskills`
--

INSERT INTO `tbskills` (`skill_id`, `skill_name`, `skill_type`, `skill_class`, `skill_plot`, `skill_cost`, `skill_card`, `skill_expansion`) VALUES
(1, 'Accurate', 'Scout', 'Wildlander', 0, 1, 'accurate.jpg', '0'),
(2, 'Nimble', 'Scout', 'Wildlander', 0, 0, 'nimble.jpg', '0'),
(10, 'Brute', 'Warrior', 'Berserker', 0, 1, 'brute.jpg', '0'),
(11, 'Raise Dead', 'Mage', 'Necromancer', 0, 0, 'raisedeadnecromancer.jpg', '0'),
(13, 'Runic Knowledge', 'Mage', 'Runemaster', 0, 0, 'runicknowledgerunemaster.jpg', '0'),
(14, 'Prayer of Healing', 'Healer', 'Disciple', 0, 0, 'prayerofhealing.jpg', '0'),
(15, 'Armor of Faith', 'Healer', 'Disciple', 0, 1, 'armoffaith.jpg', '0'),
(16, 'Blessed Strike', 'Healer', 'Disciple', 0, 1, 'blessedstrike.jpg', '0'),
(17, 'Cleansing Touch', 'Healer', 'Disciple', 0, 1, 'cleansingtouch.jpg', '0'),
(18, 'Divine Fury', 'Healer', 'Disciple', 0, 2, 'divinefury.jpg', '0'),
(19, 'Prayer of Peace', 'Healer', 'Disciple', 0, 2, 'prayerofpeace.jpg', '0'),
(20, 'Time of Need', 'Healer', 'Disciple', 0, 2, 'timeofneed.jpg', '0'),
(21, 'Holy Power', 'Healer', 'Disciple', 0, 3, 'holypower.jpg', '0'),
(22, 'Radiant Light', 'Healer', 'Disciple', 0, 3, 'radiantlight.jpg', '0'),
(25, 'Danger Sense', 'Scout', 'Wildlander', 0, 1, 'dangersense.jpg', '0'),
(26, 'Eagle Eyes', 'Scout', 'Wildlander', 0, 1, 'eagleeyes.jpg', '0'),
(27, 'Bow Mastery', 'Scout', 'Wildlander', 0, 2, 'bowmastery.jpg', '0'),
(28, 'First Strike', 'Scout', 'Wildlander', 0, 2, 'firststrike.jpg', '0'),
(29, 'Fleet of Foot', 'Scout', 'Wildlander', 0, 2, 'fleetoffoot.jpg', '0'),
(30, 'Black Arrow', 'Scout', 'Wildlander', 0, 3, 'blackarrow.jpg', '0'),
(31, 'Running Shot', 'Scout', 'Wildlander', 0, 3, 'runningshot.jpg', '0'),
(32, 'Counter Attack', 'Warrior', 'Berserker', 0, 1, 'counterattack.jpg', '0'),
(33, 'Rage', 'Warrior', 'Berserker', 0, 0, 'rage.jpg', '0'),
(35, 'Cripple', 'Warrior', 'Berserker', 0, 1, 'cripple.jpg', '0'),
(36, 'Charge', 'Warrior', 'Berserker', 0, 2, 'charge.jpg', '0'),
(37, 'Weapon Mastery', 'Warrior', 'Berserker', 0, 2, 'weaponmastery.jpg', '0'),
(38, 'Whirlwind', 'Warrior', 'Berserker', 0, 2, 'whirlwind.jpg', '0'),
(39, 'Death Rage', 'Warrior', 'Berserker', 0, 3, 'deathrage.jpg', '0'),
(40, 'Execute', 'Warrior', 'Berserker', 0, 3, 'excute.jpg', '0'),
(43, 'Corpse Blast', 'Mage', 'Necromancer', 0, 1, 'corpseblast.jpg', '0'),
(44, 'Fury of Undeath', 'Mage', 'Necromancer', 0, 1, 'furyofundeath.jpg', '0'),
(45, 'Deathly Haste', 'Mage', 'Necromancer', 0, 1, 'deathlyhaste.jpg', '0'),
(46, 'Dark Pact', 'Mage', 'Necromancer', 0, 2, 'darkpact.jpg', '0'),
(47, 'Vampiric Blood', 'Mage', 'Necromancer', 0, 2, 'vampiricblood.jpg', '0'),
(48, 'Undead Might', 'Mage', 'Necromancer', 0, 2, 'undeadmight.jpg', '0'),
(49, 'Army of Death', 'Mage', 'Necromancer', 0, 3, 'armyofdeath.jpg', '0'),
(50, 'Dying Command', 'Mage', 'Necromancer', 0, 3, 'dyingcommand.jpg', '0'),
(51, 'Soothing Insight', 'Healer', 'Prophet', 0, 0, 'soothinginsight.jpg', '0'),
(52, 'Battle Vision', 'Healer', 'Prophet', 0, 1, 'battlevision.jpg', '0'),
(53, 'Forewarning', 'Healer', 'Prophet', 0, 1, 'forewarning.jpg', '0'),
(54, 'Grim Fate', 'Healer', 'Prophet', 0, 1, 'grimfate.jpg', '0'),
(55, 'All-Seeing', 'Healer', 'Prophet', 0, 2, 'allseeing.jpg', '0'),
(56, 'Lifeline', 'Healer', 'Prophet', 0, 2, 'lifeline.jpg', '0'),
(57, 'Victory Foretold', 'Healer', 'Prophet', 0, 2, 'victoryforetold.jpg', '0'),
(58, 'Focused Insights', 'Healer', 'Prophet', 0, 3, 'focusedinsights.jpg', '0'),
(59, 'Omniscience', 'Healer', 'Prophet', 0, 3, 'omniscience.jpg', '0'),
(60, 'Brew Elixir', 'Healer', 'Apothecary', 0, 0, 'brewelixir.jpg', '2'),
(61, 'Concoction', 'Healer', 'Apothecary', 0, 1, 'concoction.jpg', '2'),
(62, 'Herbal Lore', 'Healer', 'Apothecary', 0, 1, 'herballore.jpg', '2'),
(63, 'Inky Substance', 'Healer', 'Apothecary', 0, 1, 'inkysubstance.jpg', '2'),
(64, 'Bottled Courage', 'Healer', 'Apothecary', 0, 2, 'bottledcourage.jpg', '2'),
(65, 'Protective Tonic', 'Healer', 'Apothecary', 0, 2, 'protectivetonic.jpg', '2'),
(66, 'Secret Formula', 'Healer', 'Apothecary', 0, 2, 'secretformula.jpg', '2'),
(67, 'Hidden Stash', 'Healer', 'Apothecary', 0, 3, 'hiddenstash.jpg', '2'),
(68, 'Potent Remedies', 'Healer', 'Apothecary', 0, 3, 'potentremedies.jpg', '2'),
(69, 'Stoneskin', 'Healer', 'Spiritspeaker', 0, 0, 'stoneskin.jpg', '0'),
(70, 'Drain Spirit', 'Healer', 'Spiritspeaker', 0, 1, 'drainspirit.jpg', '0'),
(71, 'Healing Rain', 'Healer', 'Spiritspeaker', 0, 1, 'healingrain.jpg', '0'),
(72, 'Shared Pain', 'Healer', 'Spiritspeaker', 0, 1, 'sharedpain.jpg', '0'),
(73, 'Cloud of Mist', 'Healer', 'Spiritspeaker', 0, 2, 'cloudofmist.jpg', '0'),
(74, 'Nature''s Bounty', 'Healer', 'Spiritspeaker', 0, 2, 'naturesbounty.jpg', '0'),
(75, 'Tempest', 'Healer', 'Spiritspeaker', 0, 2, 'tempest.jpg', '0'),
(76, 'Ancestor Spirits', 'Healer', 'Spiritspeaker', 0, 3, 'ancestorspirits.jpg', '0'),
(77, 'Vigor', 'Healer', 'Spiritspeaker', 0, 3, 'vigor.jpg', '0'),
(79, 'Terracall', 'Mage', 'Geomancer', 0, 0, 'terracall.jpg', '1'),
(80, 'Earthen Anguish', 'Mage', 'Geomancer', 0, 1, 'earthenanguish.jpg', '1'),
(81, 'Quaking Word', 'Mage', 'Geomancer', 0, 1, 'quakingword.jpg', '1'),
(82, 'Stone Tonuge', 'Mage', 'Geomancer', 0, 1, 'stonetongue.jpg', '1'),
(83, 'Ley Line', 'Mage', 'Geomancer', 0, 2, 'leyline.jpg', '1'),
(84, 'Molten Fury', 'Mage', 'Geomancer', 0, 2, 'moltenfury.jpg', '1'),
(85, 'Ways of Stone', 'Mage', 'Geomancer', 0, 2, 'waysofstone.jpg', '1'),
(86, 'Gravity Spike', 'Mage', 'Geomancer', 0, 3, 'gavityspike.jpg', '1'),
(87, 'Cataclysm', 'Mage', 'Geomancer', 0, 3, 'cataclysm.jpg', '1'),
(88, 'Enfeebling Hex', 'Mage', 'Hexer', 0, 0, 'enfeeblinghex.jpg', '2'),
(89, 'Affliction', 'Mage', 'Hexer', 0, 1, 'affliction.jpg', '2'),
(90, 'Plague Spasm', 'Mage', 'Hexer', 0, 1, 'plaguespasm.jpg', '2'),
(91, 'Viral Hex', 'Mage', 'Hexer', 0, 1, 'viralhex.jpg', '2'),
(92, 'Crippling Curse', 'Mage', 'Hexer', 0, 2, 'cripplingcurse.jpg', '2'),
(93, 'Fel Command', 'Mage', 'Hexer', 0, 2, 'felcommand.jpg', '2'),
(94, 'Internal Rot', 'Mage', 'Hexer', 0, 2, 'internalrot.jpg', '2'),
(95, 'Accursed Arms', 'Mage', 'Hexer', 0, 3, 'accursedarms.jpg', '2'),
(96, 'Plague Cloud', 'Mage', 'Hexer', 0, 3, 'plaguecloud.jpg', '2'),
(98, 'Exploding Rune', 'Mage', 'Runemaster', 0, 1, 'explodingrune.jpg', '0'),
(99, 'Ghost Armor', 'Mage', 'Runemaster', 0, 1, 'ghostarmor.jpg', '0'),
(100, 'Inscribe Rune', 'Mage', 'Runemaster', 0, 1, 'inscriberune.jpg', '0'),
(101, 'Iron Will', 'Mage', 'Runemaster', 0, 2, 'ironwill.jpg', '0'),
(102, 'Rune Mastery', 'Mage', 'Runemaster', 0, 2, 'runemastery.jpg', '0'),
(103, 'Runic Sorcery', 'Mage', 'Runemaster', 0, 2, 'runesorcery.jpg', '0'),
(104, 'Break the Rune', 'Mage', 'Runemaster', 0, 3, 'breaktherune.jpg', '0'),
(105, 'Quick Casting', 'Mage', 'Runemaster', 0, 3, 'quickcasting.jpg', '0'),
(106, 'Exploit', 'Scout', 'Stalker', 0, 1, 'exploit.jpg', '3'),
(107, 'Hunter''s Mark', 'Scout', 'Stalker', 0, 1, 'huntersmark.jpg', '3'),
(108, 'Makeshift Trap', 'Scout', 'Stalker', 0, 1, 'makeshifttrap.jpg', '3'),
(109, 'Easy Prey', 'Scout', 'Stalker', 0, 2, 'easyprey.jpg', '3'),
(110, 'Lay of the Land', 'Scout', 'Stalker', 0, 2, 'layoftheland.jpg', '3'),
(111, 'Poison Barbs', 'Scout', 'Stalker', 0, 2, 'poisonbarbs.jpg', '3'),
(112, 'Ambush', 'Scout', 'Stalker', 0, 3, 'ambush.jpg', '3'),
(113, 'Upper Hand', 'Scout', 'Stalker', 0, 3, 'upperhand.jpg', '3'),
(115, 'Set Trap', 'Scout', 'Stalker', 0, 0, 'settrap.jpg', '3'),
(116, 'Greedy', 'Scout', 'Thief', 0, 0, 'greedy.jpg', '0'),
(117, 'Appraisal', 'Scout', 'Thief', 0, 1, 'appraisal.jpg', '0'),
(118, 'Dirty Tricks', 'Scout', 'Thief', 0, 1, 'dirtytricks.jpg', '0'),
(119, 'Sneaky', 'Scout', 'Thief', 0, 1, 'sneaky.jpg', '0'),
(120, 'Caltrops', 'Scout', 'Thief', 0, 2, 'caltrops.jpg', '0'),
(121, 'Tumble', 'Scout', 'Thief', 0, 2, 'tumble.jpg', '0'),
(122, 'Unseen', 'Scout', 'Thief', 0, 2, 'unseen.jpg', '0'),
(123, 'Bushwhack', 'Scout', 'Thief', 0, 3, 'bushwhack.jpg', '0'),
(124, 'Luck', 'Scout', 'Thief', 0, 3, 'lurk.jpg', '0'),
(125, 'Delver', 'Scout', 'Treasure Hunter', 0, 0, 'delver.jpg', '2'),
(126, 'Dungeoneer', 'Scout', 'Treasure Hunter', 0, 1, 'dungeoneer.jpg', '2'),
(127, 'Gold Rush', 'Scout', 'Treasure Hunter', 0, 1, 'goldrush.jpg', '2'),
(128, 'Survey', 'Scout', 'Treasure Hunter', 0, 1, 'survey.jpg', '2'),
(129, 'Guard the Spoils', 'Scout', 'Treasure Hunter', 0, 2, 'guardthespoils.jpg', '2'),
(130, 'Lure of Fortune', 'Scout', 'Treasure Hunter', 0, 2, 'lureoffortune.jpg', '2'),
(131, 'Sleight of Hand', 'Scout', 'Treasure Hunter', 0, 2, 'sleightofhand.jpg', '2'),
(132, 'Finder''s Keepers', 'Scout', 'Treasure Hunter', 0, 3, 'finderskeepers.jpg', '2'),
(133, 'Trail of Riches', 'Scout', 'Treasure Hunter', 0, 3, 'trailofriches.jpg', '2'),
(135, 'Bound by the Hunt', 'Warrior', 'Beastmaster', 0, 0, 'boundbythehunt.jpg', '2'),
(136, 'Bestial Rage', 'Warrior', 'Beastmaster', 0, 1, 'bestialrage.jpg', '2'),
(137, 'Stalker', 'Warrior', 'Beastmaster', 0, 1, 'stalker.jpg', '2'),
(138, 'Survivalist', 'Warrior', 'Beastmaster', 0, 1, 'survivalist.jpg', '2'),
(139, 'Feral Frenzy', 'Warrior', 'Beastmaster', 0, 2, 'feralfrenzy.jpg', '2'),
(140, 'Savagery', 'Warrior', 'Beastmaster', 0, 2, 'savagery.jpg', '2'),
(141, 'Shadow Hunter', 'Warrior', 'Beastmaster', 0, 2, 'shadowhunter.jpg', '2'),
(142, 'Changing Skins', 'Warrior', 'Beastmaster', 0, 3, 'changingskins.jpg', '2'),
(143, 'Predator', 'Warrior', 'Beastmaster', 0, 3, 'predator.jpg', '2'),
(144, 'Valor of Heroes', 'Warrior', 'Champion', 0, 0, 'valorofheroes.jpg', '1'),
(145, 'A Living Legend', 'Warrior', 'Champion', 0, 1, 'alivinglegend.jpg', '1'),
(146, 'Glory of Battle', 'Warrior', 'Champion', 0, 1, 'gloryofbattle.jpg', '1'),
(147, 'Inspiring Presence', 'Warrior', 'Champion', 0, 1, 'inspiringpresence.jpg', '1'),
(148, 'Motivating Charge', 'Warrior', 'Champion', 0, 2, 'motivatingcharge.jpg', '1'),
(149, 'No Mercy', 'Warrior', 'Champion', 0, 2, 'nomercy.jpg', '1'),
(150, 'Stoic Resolve', 'Warrior', 'Champion', 0, 2, 'stoicresolve.jpg', '1'),
(151, 'For the Cause', 'Warrior', 'Champion', 0, 3, 'forthecause.jpg', '1'),
(152, 'Valorous Strike', 'Warrior', 'Champion', 0, 3, 'valorousstrike.jpg', '1'),
(153, 'Oath of Honor', 'Warrior', 'Knight', 0, 0, 'oathofhonor.jpg', '0'),
(154, 'Advance', 'Warrior', 'Knight', 0, 1, 'advance.jpg', '0'),
(155, 'Challenge', 'Warrior', 'Knight', 0, 1, 'challenge.jpg', '0'),
(156, 'Defend', 'Warrior', 'Knight', 0, 1, 'defend.jpg', '0'),
(157, 'Defense Training', 'Warrior', 'Knight', 0, 2, 'defensetraining.jpg', '0'),
(158, 'Guard', 'Warrior', 'Knight', 0, 2, 'guard.jpg', '0'),
(159, 'Shield Slam', 'Warrior', 'Knight', 0, 2, 'shieldslam.jpg', '0'),
(160, 'Inspiration', 'Warrior', 'Knight', 0, 3, 'inspiration.jpg', '0'),
(161, 'Stalwart', 'Warrior', 'Knight', 0, 3, 'stalwart.jpg', '0'),
(162, 'Bloodlust', 'Overlord', 'Warlord', 0, 2, 'bloodlust.jpg', '0'),
(163, 'Bloodrage', 'Overlord', 'Warlord', 0, 1, 'bloodrage.jpg', '0'),
(164, 'Outbreak', 'Overlord', 'Infector', 0, 2, 'outbreak.jpg', '3'),
(165, 'Virulent Infection', 'Overlord', 'Infector', 0, 1, 'virulentinfection.jpg', '3'),
(166, 'Adaptive Contagion', 'Overlord', 'Infector', 0, 1, 'adaptivecontagion.jpg', '3'),
(167, 'Airborne', 'Overlord', 'Infector', 0, 1, 'airborne.jpg', '3'),
(168, 'Contamnated', 'Overlord', 'Infector', 0, 1, 'contaminated.jpg', '3'),
(169, 'Dark Host', 'Overlord', 'Infector', 0, 3, 'darkhost.jpg', '3'),
(170, 'Tainted Blow', 'Overlord', 'Infector', 0, 2, 'taintedblow.jpg', '3'),
(171, 'Diabolic Power', 'Overlord', 'Magus', 0, 3, 'diabolicpower.jpg', '0'),
(172, 'Rise Again', 'Overlord', 'Magus', 0, 2, 'riseagain.jpg', '0'),
(173, 'Unholy Ritual', 'Overlord', 'Magus', 0, 1, 'unholyritual.jpg', '0'),
(174, 'Word of Despair', 'Overlord', 'Magus', 0, 2, 'wordofdespair.jpg', '0'),
(175, 'Word of Pain', 'Overlord', 'Magus', 0, 1, 'wordofpain.jpg', '0'),
(176, 'Toxic Reprisal', 'Overlord', 'Overlord Reward', 0, 0, 'toxicreprisal.jpg', '3'),
(177, 'Secrets of Flesh', 'Overlord', 'Overlord Reward', 0, 0, 'secretsofflesh.jpg', '3'),
(178, 'Offertory Affliction', 'Overlord', 'Overlord Reward', 0, 0, 'offertoryaffliction.jpg', '3'),
(179, 'Trading Pains', 'Overlord', 'Punisher', 0, 1, 'tradingpains.jpg', '1'),
(180, 'Blood Bargaining', 'Overlord', 'Punisher', 0, 3, 'bloodbargaining.jpg', '1'),
(181, 'Exploit Weakness', 'Overlord', 'Punisher', 0, 2, 'exploitweakness.jpg', '1'),
(182, 'No Rest for the Wicked', 'Overlord', 'Punisher', 0, 1, 'norestforthewicked.jpg', '1'),
(183, 'Price of Prevention', 'Overlord', 'Punisher', 0, 2, 'priceofprevention.jpg', '1'),
(184, 'Splig''s Revenge', 'Overlord', 'Quest Reward', 0, 0, 'spligsrevenge.jpg', '2'),
(185, 'Twin Souls', 'Overlord', 'Quest Reward', 0, 0, 'twinsouls.jpg', '2'),
(186, 'The Wyrm Queen''s Favor', 'Overlord', 'Rumor Reward', 0, 0, 'thewyrmqueensfavor.jpg', '1'),
(187, 'Explosive Runes', 'Overlord', 'Saboteur', 0, 1, 'explosiverunes.jpg', '0'),
(188, 'Uthuk Demon Trap', 'Overlord', 'Saboteur', 0, 3, 'uthukdemontrap.jpg', '0'),
(189, 'Web Trap', 'Overlord', 'Saboteur', 0, 1, 'webtrap.jpg', '0'),
(190, 'Wicked Laughter', 'Overlord', 'Saboteur', 0, 2, 'wickedlaughter.jpg', '0'),
(191, 'Curse of the Monkey God', 'Overlord', 'Saboteur', 0, 2, 'curseofthemonkeygod.jpg', '0'),
(192, 'Dark Remedy', 'Overlord', 'Universal', 0, 1, 'darkremedy.jpg', '2'),
(193, 'Dark Resilience', 'Overlord', 'Universal', 0, 1, 'darkreslience.jpg', '0'),
(194, 'Plan Ahead', 'Overlord', 'Universal', 0, 1, 'planahead.jpg', '0'),
(195, 'Schemes', 'Overlord', 'Universal', 0, 1, 'schemes.jpg', '0'),
(197, 'Dark Fortitude', 'Overlord', 'Warlord', 0, 1, 'darkfortitude.jpg', '0'),
(198, 'Expert Blow', 'Overlord', 'Warlord', 0, 2, 'expertblow.jpg', '0'),
(199, 'Reinforce', 'Overlord', 'Warlord', 0, 3, 'reinforce.jpg', '0'),
(201, 'Dual Training', 'Overlord', 'Hybrid Loyalty', 1, 0, NULL, '10'),
(202, 'Fight With Honor', 'Overlord', 'Hybrid Loyalty', 1, 2, NULL, '10'),
(203, 'Cut a Deal', 'Overlord', 'Hybrid Loyalty', 1, 2, NULL, '10'),
(204, 'Show of Force', 'Overlord', 'Hybrid Loyalty', 1, 2, NULL, '10'),
(205, 'Make Our Own Luck', 'Overlord', 'Hybrid Loyalty', 1, 2, NULL, '10'),
(206, 'End It!', 'Overlord', 'Hybrid Loyalty', 1, 2, NULL, '10'),
(207, 'Bribery', 'Overlord', 'Hybrid Loyalty', 1, 2, NULL, '10'),
(208, 'Resourceful', 'Overlord', 'Hybrid Loyalty', 1, 3, NULL, '10'),
(209, 'Hazard Pay', 'Overlord', 'Hybrid Loyalty', 1, 4, NULL, '10'),
(210, 'Summon Belthir', 'Overlord', 'Hybrid Loyalty', 1, 3, NULL, '10'),
(211, 'Bloodline', 'Overlord', 'Endless Thirst', 1, 0, NULL, '11'),
(212, 'Bad Dreams', 'Overlord', 'Endless Thirst', 1, 1, NULL, '11'),
(213, 'Night''s Embrace', 'Overlord', 'Endless Thirst', 1, 1, NULL, '11'),
(214, 'Fangs in the Dark', 'Overlord', 'Endless Thirst', 1, 2, NULL, '11'),
(215, 'The Power of Blood', 'Overlord', 'Endless Thirst', 1, 2, NULL, '11'),
(216, 'Nighttime Hunt', 'Overlord', 'Endless Thirst', 1, 3, NULL, '11'),
(217, 'Scent of Blood', 'Overlord', 'Endless Thirst', 1, 3, NULL, '11'),
(218, 'The Taste of Suffering', 'Overlord', 'Endless Thirst', 1, 3, NULL, '11'),
(219, 'The Lady''s Care', 'Overlord', 'Endless Thirst', 1, 3, NULL, '11'),
(220, 'Summon Eliza', 'Overlord', 'Endless Thirst', 1, 3, NULL, '11'),
(221, 'Armor of Darkness', 'Overlord', 'The Fallen Elite', 1, 0, NULL, '12'),
(222, 'Trial of Knighthood', 'Overlord', 'The Fallen Elite', 1, 2, NULL, '12'),
(223, 'Veteran Council', 'Overlord', 'The Fallen Elite', 1, 2, NULL, '12'),
(224, 'Fight in Formation', 'Overlord', 'The Fallen Elite', 1, 2, NULL, '12'),
(225, 'Unkillable', 'Overlord', 'The Fallen Elite', 1, 3, NULL, '12'),
(226, 'Knight Training', 'Overlord', 'The Fallen Elite', 1, 3, NULL, '12'),
(227, 'Dark Champions', 'Overlord', 'The Fallen Elite', 1, 2, NULL, '12'),
(228, 'Vengeful Resolve', 'Overlord', 'The Fallen Elite', 1, 3, NULL, '12'),
(229, 'Refuse to Die', 'Overlord', 'The Fallen Elite', 1, 4, NULL, '12'),
(230, 'Summon Alric', 'Overlord', 'The Fallen Elite', 1, 3, NULL, '12'),
(231, 'Dark Pact', 'Overlord', 'Cursed By Power', 1, 0, NULL, '13'),
(232, 'Greater Power', 'Overlord', 'Cursed By Power', 1, 2, NULL, '13'),
(233, 'The Dark Mark', 'Overlord', 'Cursed By Power', 1, 2, NULL, '13'),
(234, 'The Grasping Grave', 'Overlord', 'Cursed By Power', 1, 2, NULL, '13'),
(235, 'Masques', 'Overlord', 'Cursed By Power', 1, 2, NULL, '13'),
(236, 'Mystic Might', 'Overlord', 'Cursed By Power', 1, 3, NULL, '13'),
(237, 'Thaumaturgy', 'Overlord', 'Cursed By Power', 1, 3, NULL, '13'),
(238, 'Bolt From the Blue', 'Overlord', 'Cursed By Power', 1, 3, NULL, '13'),
(239, 'Cabal', 'Overlord', 'Cursed By Power', 1, 4, NULL, '13'),
(240, 'Summon Merick', 'Overlord', 'Cursed By Power', 1, 3, NULL, '13'),
(241, 'Sole Purpose', 'Overlord', 'Seeds of Betrayal', 1, 0, NULL, '14'),
(242, 'Scrying and Plotting', 'Overlord', 'Seeds of Betrayal', 1, 1, NULL, '14'),
(243, 'Rush of Power', 'Overlord', 'Seeds of Betrayal', 1, 2, NULL, '14'),
(244, 'Two-Pronged Gambit', 'Overlord', 'Seeds of Betrayal', 1, 2, NULL, '14'),
(245, 'Nefarius Power', 'Overlord', 'Seeds of Betrayal', 1, 2, NULL, '14'),
(246, 'Always Prepared', 'Overlord', 'Seeds of Betrayal', 1, 2, NULL, '14'),
(247, 'False Friends', 'Overlord', 'Seeds of Betrayal', 1, 3, NULL, '14'),
(248, 'Trouble on the Road', 'Overlord', 'Seeds of Betrayal', 1, 3, NULL, '14'),
(249, 'Meticulous Planning', 'Overlord', 'Seeds of Betrayal', 1, 4, NULL, '14'),
(250, 'Summon Zachareth', 'Overlord', 'Seeds of Betrayal', 1, 3, NULL, '14'),
(251, 'Spirited Retreat', 'Overlord', 'Goblin Uprising', 1, 0, NULL, '15'),
(252, 'Feral Instincts', 'Overlord', 'Goblin Uprising', 1, 1, NULL, '15'),
(253, 'Overfed', 'Overlord', 'Goblin Uprising', 1, 2, NULL, '15'),
(254, 'Meat Shield', 'Overlord', 'Goblin Uprising', 1, 2, NULL, '15'),
(255, 'Emergency Rations', 'Overlord', 'Goblin Uprising', 1, 2, NULL, '15'),
(256, 'Dive into Cover', 'Overlord', 'Goblin Uprising', 1, 3, NULL, '15'),
(257, 'Goblin Ambush', 'Overlord', 'Goblin Uprising', 1, 3, NULL, '15'),
(258, 'Raided Armory', 'Overlord', 'Goblin Uprising', 1, 4, NULL, '15'),
(259, 'Scavenge', 'Overlord', 'Goblin Uprising', 1, 4, NULL, '15'),
(260, 'Summon Splig', 'Overlord', 'Goblin Uprising', 1, 3, NULL, '15'),
(261, 'Mine All Mine', 'Overlord', 'Dragon''s Greed', 1, 0, NULL, '16'),
(262, 'Terrifying Presence', 'Overlord', 'Dragon''s Greed', 1, 2, NULL, '16'),
(263, 'Iron-Hard Scales', 'Overlord', 'Dragon''s Greed', 1, 2, NULL, '16'),
(264, 'Jealous Rage', 'Overlord', 'Dragon''s Greed', 1, 3, NULL, '16'),
(265, 'Massive Bulk', 'Overlord', 'Dragon''s Greed', 1, 3, NULL, '16'),
(266, 'Punish the Weak', 'Overlord', 'Dragon''s Greed', 1, 3, NULL, '16'),
(267, 'Aurium Plating', 'Overlord', 'Dragon''s Greed', 1, 3, NULL, '16'),
(268, 'Valyndra''s Shadow', 'Overlord', 'Dragon''s Greed', 1, 4, NULL, '16'),
(269, 'Guardians of the Hoard', 'Overlord', 'Dragon''s Greed', 1, 4, NULL, '16'),
(270, 'Summon Valyndra', 'Overlord', 'Dragon''s Greed', 1, 3, NULL, '16'),
(271, 'Misdirection', 'Overlord', 'Dark Illusions', 1, 0, NULL, '17'),
(272, 'Tainted Blood', 'Overlord', 'Dark Illusions', 1, 1, NULL, '17'),
(273, 'Intricate Schemes', 'Overlord', 'Dark Illusions', 1, 1, NULL, '17'),
(274, 'Malediction', 'Overlord', 'Dark Illusions', 1, 2, NULL, '17'),
(275, 'Mirage', 'Overlord', 'Dark Illusions', 1, 2, NULL, '17'),
(276, 'Enthrall', 'Overlord', 'Dark Illusions', 1, 2, NULL, '17'),
(277, 'Phantasm', 'Overlord', 'Dark Illusions', 1, 3, NULL, '17'),
(278, 'Darkness Falls', 'Overlord', 'Dark Illusions', 1, 3, NULL, '17'),
(279, 'The Ritual Continues', 'Overlord', 'Dark Illusions', 1, 4, NULL, '17'),
(280, 'Summon Ariad', 'Overlord', 'Dark Illusions', 1, 3, NULL, '17'),
(281, 'Natural Camouflage', 'Overlord', 'Tangled Web', 1, 0, NULL, '18'),
(282, 'Feral Instincts', 'Overlord', 'Tangled Web', 1, 1, NULL, '18'),
(283, 'Web of Deception', 'Overlord', 'Tangled Web', 1, 2, NULL, '18'),
(284, 'Entangling Weave', 'Overlord', 'Tangled Web', 1, 2, NULL, '18'),
(285, 'Unsafe Passage', 'Overlord', 'Tangled Web', 1, 2, NULL, '18'),
(286, 'Hidden Predator', 'Overlord', 'Tangled Web', 1, 2, NULL, '18'),
(287, 'Embrace Darkness', 'Overlord', 'Tangled Web', 1, 2, NULL, '18'),
(288, 'Solitary Prey', 'Overlord', 'Tangled Web', 1, 3, NULL, '18'),
(289, 'Salvage Exploitation', 'Overlord', 'Tangled Web', 1, 4, NULL, '18'),
(290, 'Summon Queen Ariad', 'Overlord', 'Tangled Web', 1, 3, NULL, '18'),
(291, 'Petty Theft', 'Overlord', 'Skulduggery', 1, 0, NULL, '19'),
(292, 'Concealment', 'Overlord', 'Skulduggery', 1, 2, NULL, '19'),
(293, 'Slippery', 'Overlord', 'Skulduggery', 1, 2, NULL, '19'),
(294, 'Distraction', 'Overlord', 'Skulduggery', 1, 2, NULL, '19'),
(295, 'Foiled Again', 'Overlord', 'Skulduggery', 1, 2, NULL, '19'),
(296, 'Covetous', 'Overlord', 'Skulduggery', 1, 2, NULL, '19'),
(297, 'Guarded Treasure', 'Overlord', 'Skulduggery', 1, 3, NULL, '19'),
(298, 'Cursed Treasure', 'Overlord', 'Skulduggery', 1, 3, NULL, '19'),
(299, 'Bait and Switch', 'Overlord', 'Skulduggery', 1, 3, NULL, '19'),
(300, 'Summon Raythen', 'Overlord', 'Skulduggery', 1, 3, NULL, '19'),
(301, 'Brethren', 'Overlord', 'Silent Protector', 1, 0, NULL, '20'),
(302, 'Diplomatic', 'Overlord', 'Silent Protector', 1, 1, NULL, '20'),
(303, 'Curative Spirit', 'Overlord', 'Silent Protector', 1, 2, NULL, '20'),
(304, 'Traveler''s Rest', 'Overlord', 'Silent Protector', 1, 3, NULL, '20'),
(305, 'Pity the Weak', 'Overlord', 'Silent Protector', 1, 2, NULL, '20'),
(306, 'Pacify', 'Overlord', 'Silent Protector', 1, 2, NULL, '20'),
(307, 'Shared Burdens', 'Overlord', 'Silent Protector', 1, 3, NULL, '20'),
(308, 'Power in Mourning', 'Overlord', 'Silent Protector', 1, 3, NULL, '20'),
(309, 'Oath of Silence', 'Overlord', 'Silent Protector', 1, 3, NULL, '20'),
(310, 'Summon Serena', 'Overlord', 'Silent Protector', 1, 3, NULL, '20');

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
) ENGINE=InnoDB AUTO_INCREMENT=331 DEFAULT CHARSET=utf8;

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
(298, 50, 68, 231, NULL, NULL),
(299, 50, 69, 33, NULL, NULL),
(300, 50, 70, 116, NULL, NULL),
(301, 50, 71, 13, NULL, NULL),
(302, 50, 69, 10, 86, NULL),
(303, 50, 70, 118, 86, NULL),
(304, 50, 70, 122, 86, NULL),
(305, 50, 71, 103, 86, NULL),
(306, 50, 69, 39, 85, NULL),
(307, 50, 71, 99, 85, NULL),
(308, 50, 69, 32, 87, NULL),
(309, 50, 70, 119, 87, NULL),
(310, 52, 72, 201, NULL, NULL),
(311, 52, 73, 33, NULL, NULL),
(312, 52, 74, 2, NULL, NULL),
(313, 53, 76, 33, NULL, NULL),
(314, 53, 77, 11, NULL, NULL),
(315, 53, 78, 2, NULL, NULL),
(316, 53, 77, 45, 91, NULL),
(317, 53, 78, 1, 91, NULL),
(318, 53, 77, 43, 92, NULL),
(319, 53, 78, 25, 92, NULL),
(320, 53, 77, 46, 94, NULL),
(321, 53, 77, 47, 93, NULL),
(322, 53, 77, 49, 95, NULL),
(323, 53, 77, 49, 95, NULL),
(324, 56, 79, 231, NULL, NULL),
(325, 56, 80, 33, NULL, NULL),
(326, 56, 81, 116, NULL, NULL),
(327, 56, 82, 13, NULL, NULL),
(328, 56, 80, 36, 99, NULL),
(329, 56, 81, 122, 99, NULL),
(330, 56, 82, 102, 99, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbtravel`
--

CREATE TABLE IF NOT EXISTS `tbtravel` (
`travel_id` int(11) NOT NULL,
  `travel_type` varchar(24) NOT NULL,
  `travel_name` varchar(64) NOT NULL,
  `travel_card` int(4) NOT NULL,
  `travel_event` text NOT NULL,
  `travel_result` text NOT NULL,
  `travel_special` varchar(8) DEFAULT NULL,
  `travel_exp_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbtravel`
--

INSERT INTO `tbtravel` (`travel_id`, `travel_type`, `travel_name`, `travel_card`, `travel_event`, `travel_result`, `travel_special`, `travel_exp_id`) VALUES
(0, 'all', 'No Event', 0, 'No Event', 'No Event', NULL, 0),
(1, 'plains', 'Moss-covered Standing Stones', 1, 'You come across a collection of mosscovered standing stones.', 'Each hero tests Willpower and suffers 1 fatigue if he fails. If all heroes pass, each hero draws 1 Search Card.', NULL, 0),
(2, 'forest', 'Dense Thicket', 1, 'You hear weeping at the center of a dense thicket.', 'If you choose to investigate, each hero suffers 1 Damage and the overlord discards 1 random Overlord card.', NULL, 0),
(3, 'mountains', 'Unforgiving Slopes', 1, 'You''re caught on the unforgiving slopes during a fierce storm.', 'Each hero suffers 1 Damage and 1 Fatigue.', NULL, 0),
(4, 'road', 'Traveling Merchant', 2, 'You come across a traveling merchant.', 'Each hero tests Knowledge and draws 1 Search card if he passes.', NULL, 0),
(5, 'plains', 'Band of Refugees', 2, 'You come across a band of refugees.', 'If you stop and help them, the overlord draws 1 Overlord card. if you refuse them, each hero suffers 1 Damage', NULL, 0),
(6, 'forest', 'Lost', 2, 'You become lost.', 'Hero players choose one hero to test Willpower. If he fails, each hero suffers 1 Fatigue.', NULL, 0),
(7, 'plains', 'Smoke Smudging the Horizon', 3, 'You see smoke smudging the horizon in the distance.', 'The overlord draws 1 Overlord card.', NULL, 0),
(8, 'forest', 'Peaceful Glade', 3, 'Unexpectedly, you find a beautiful and peaceful glade in the woods.', 'Each hero recovers all Damage and Fatigue.', NULL, 0),
(9, 'mountains', 'An Ettin Appears', 3, 'An ettin appears from the mountains and attacks the heroes!', 'Each hero tests Might and suffers 1 Damage if he fails. If all heroes fail, each hero suffers 1 additional Damage.', NULL, 0),
(10, 'plains', 'Lawless Brigands', 4, 'Lawless brigands accost you.', 'Hero players choose one hero to test Might to scare them off. If he fails, each hero suffers 1 Damage in the battle.', NULL, 0),
(11, 'forest', 'Webs Hang Everywhere!', 4, 'Webs hang everywhere!', 'Each hero tests Awareness. Each hero who fails is ambushed by a spider and is Poisoned. If all heroes fail, each hero suffers 1 Damage.', NULL, 0),
(12, 'water', 'Something Glimmers', 4, 'Something glimmers at the bottom of the pool!', 'Hero players choose one hero to test Awareness to dive in after it. If he passes, draw 1 Search card.', NULL, 0),
(13, 'forest', 'Latari Elves', 5, 'A band of Latari Elves is beset by minions of the overlord.', 'Heroes may choose to leap to their defense, and each suffer 1 Damage. If they do not, the overlord draws 2 Overlord cards.', NULL, 0),
(14, 'mountains', 'A Dwarf of Dunwarr', 5, 'A dwarf of Dunwarr is burying his brother. He warns you of dangers ahead.', 'Do not draw a Travel Event card for the next travel icon you stop at this phase.', NULL, 0),
(15, 'water', 'Fat Bloated Corpses', 5, 'Fat, bloated corpses float in the water. As you approach, they moan and rise!', 'Each hero tests Willpower. Each hero who fails is overcome by zombies and is Diseased.', NULL, 0),
(16, 'road', 'Hidden Path', 6, 'You find a hidden path and make excellent time!', 'Do not draw a Travel event card for the next travel icon you stop at this phase.', NULL, 0),
(17, 'mountain', 'Minions Emerge!', 6, 'The overlord''s minions emerge!', 'The overlord chooses 1 attribute. Each hero must test the chose attribute. Each hero that fails suffers 1 Damage and 1 Fatigue.', NULL, 0),
(18, 'forest', 'The overlord''s minions emerge!', 6, 'The overlord''s minions emerge!', 'The overlord chooses 1 attribute. Each hero must test the chose attribute. Each hero that fails suffers 1 Damage and 1 Fatigue.', NULL, 0),
(19, 'road', 'Traveling Sage', 7, 'A traveling sage gives you access to his library.', 'Hero players choose one hero to test Knowledge. If he passes, he may look at the overlord''s hand of cards and choose 1 to discard.', NULL, 0),
(20, 'forest', 'Spiders!', 7, 'Spiders! Gods be good, spiders!', 'The hero with the lowest Awareness (overlord''s choice in the case of a tie) is Poisoned.', NULL, 0),
(21, 'water', 'Pestilential Miasma', 7, 'A pestilential miasma seems to rise from the water.', 'The hero with the lowest Might (overlord''s choice in the case of a tie) is Diseased.', NULL, 0),
(22, 'plains', 'Burning Farm', 8, 'You find a farm already burning and stop to give the farmers a proper burial.', 'The overlord draws 1 Overlord card.', NULL, 0),
(23, 'mountain', 'Mysterious Cave', 8, 'A mysterious cave mouth looms ahead.', 'If the heroes choose to enter, draw 1 search card and the overlord draws 1 Overlord card.', NULL, 0),
(24, 'water', 'Mysterious Robed Figure', 8, 'A mysterious robed figure offers you a ride on his pole-bardge.', 'If the heroes choose to ride, each hero recovers all Fatigue, but the overlord draws 1 Overlord card.', NULL, 0),
(25, 'road', 'The Overlord''s Spies', 9, 'The overlord''s spies are everywhere.', 'Each hero tests Knowledge. The overlord draws 1 Overlord card for each hero that fails.', NULL, 0),
(26, 'mountain', 'Landslide!', 9, 'Landslide!', 'Each hero tests Might. Each hero that fails suffers 2 Fatigue.', NULL, 0),
(27, 'water', 'Last Night''s Rain', 9, 'After last night''s rain, the rivers are running high and fast.', 'Each hero tests Knowledge. Each hero that fails suffers 2 Fatigue.', NULL, 0),
(28, 'plains', 'Tree with Golden Apples', 10, 'You pause briefly in an orchard, which you discover has a tree with golden apples.', 'Hero players choose one hero to test Willpower. If he passes, draw 1 Search Card.', NULL, 0),
(29, 'mountains', 'Arrows fly', 10, 'Arrows fly from behind the boulders ahead!', 'Each hero tests Awareness and suffers 1 Damage if he fails. If all heroes fail, each hero suffers 1 additional Damage', NULL, 0),
(30, 'water', 'Tentacles', 10, 'Tentacles burst from the water and attempt to pull the heroes in!', 'Each hero tests Might and suffers 1 fatigue if he fails. If all heroes fail, each hero suffers 1 Damage.', NULL, 0),
(32, 'road', 'Wrong turn', 11, 'You think you took a wrong turn...', 'Each hero tests Knowledge and suffers 1 Fatigue if he fails. If all heroes pass, do not draw an event for the next path you travel on this phase.', NULL, 1),
(33, 'water', 'A Ferryman', 11, 'You begin to tire after the long journey. A ferryman sympathizes and offers you a ride.', 'You must spend 25 gold or each hero suffers 1 Fatigue.', 'gold', 1),
(34, 'plains', 'Winged Minions', 11, 'Winged minions of the overlord descend to assault you from above.', 'One hero tests Awareness. if he fails, each hero suffers 1 Damage and 1 Fatigue.', NULL, 1),
(35, 'all', 'Mysterious Herald', 12, 'As you make your way towards your destination, you are approached by a mysterious herald.\r\n"Tread carefully, heroes," the cloaked strangers says. "There are minions of evil everywhere! A terrible plot is afoot, just nearby, and it must be stopped! Come!"', 'The heroes may force the overlord to immediately play a Rumor card featuring a quest of the current act.\r\nif the heroes choose not to do this, or if the overlord does not have any Rumor cards in his hand featuring a valid quest, treat this Travel Event cards as "No Event."\r\nAfter resolving this event, retun this card to the game box.', NULL, 1),
(36, 'plains', 'The Enemy''s Scouts', 13, 'You encounter the enemy''s scouts.', 'The hero with the highest Awareness may suffer 1 fatigue to look at 1 random card from the overlord''s hand, or suffer 2 Damage to force the overlord to discard 1 random card.', NULL, 1),
(37, 'forest', 'An Old Crone', 13, 'You encounter an old crone who whispers a curse before disappearing back into the mists.', 'Each hero must test Willpower. Each hero who fails succumbs to her spell and is Burning.', NULL, 1),
(38, 'mountain', 'Mysterious Jester', 13, 'A mysterious jester appears and presents an irresistible offer...', 'One hero tests each of his attributes (Willpower, Knowledge, Awareness, and Might). If he passes all tests, draw 1 card from the current Act''s Shop Item deck.', 'item', 1),
(39, 'water', 'Invigorated', 14, 'You feel invigorated.', 'The heroes choose a warrior and place this card in his play area. He may discard this card at the start of his turn. He does not suffer Fatigue to use skills this turn.', NULL, 2),
(40, 'plains', 'Wandering Mystic', 14, 'A wandering mystic blesses you.', 'The heroes choose a healer and place this card in his play area. He may discard this card when reviving a hero. The reviced hero recovers all Damage.', NULL, 2),
(41, 'forest', 'Heavy Fog', 14, 'You feel a heavy fog surround you. Suddenly you feel strangely tired.', 'Each hero tests Knowledge. Each hero who fails must place a hero token on his Hero sheet. That hero''s Speed is 2 during his first turn.', NULL, 2),
(42, 'road', 'Discarded Scroll', 15, 'You come across a discarded scroll.', 'The heroes choose a mage and place this card in his play area. He may discard this card after rolling defense dice to add a number of Shields to his results equal to his Knowledge.', NULL, 2),
(43, 'plains', 'Traveling Healer', 15, 'A traveling healer offers you a mysterious method of healing.', 'The heroes choose 1 hero to suffer 2 Damage. Another hero of their choice recovers all Damage and discards all of his Condition cards.', NULL, 2),
(44, 'forest', 'Bandits Occupy This Forest', 15, 'Bandits occupy this dark forest.', 'Each hero tests either Willpower or Knowledge. Each hero that fails suffers 1 Damage and 1 Fatigue. If all heroes pass they may choose one heroto draw and keep 1 Shop Item card.', 'item', 2),
(45, 'plains', 'Ambush', 16, 'You sense an ambush.', 'The overlord may choose up to 3 different heroes to suffer 1 Damage each. At the start of the quest, he must choose 1 monster to suffer the same amount of Damage', NULL, 2),
(46, 'forest', 'Lost Merchant', 16, 'A lost merchant asks for directions.', 'Each hero tests Knowledge. For each hero that passes, the heroes gain 25 gold. If all heroes pass, they may instead choose 1 hero to draw and keep 1 Shop Item card', 'golditem', 2),
(47, 'mountains', 'Wonder at the Riches', 16, 'As you hike up the mountain path, you wonder at the riches that await.', 'The overlord may look at the top 3 cards of the search deck and return them to the top of the deck in any order he chooses.', NULL, 2),
(48, 'mountains', 'Mountain Path', 17, 'You find the mountain path to be painfully exhausting.', 'The overlord chooses 1 hero to test Might. If he fails, place a hero token on his Hero sheet. He has -1 Speed until he performs a rest action.', NULL, 2),
(49, 'forest', 'Golden Key', 17, 'A strange man offers you a golden key.', 'The heroes choose a scout and place this card in his play area. He may discard this card this card during the shoping phase to draw 3 additional Shop Item cards.', 'item', 2),
(50, 'road', 'A Lost Messenger', 17, 'A lost messenger is selling secrets.', 'The heroes may choose to spend 25 gold to look at the overlord''s hand of Overlord cards. They may force him to discard 1 card and draw a replacement.', 'gold', 2),
(51, 'forest', 'A Wild Beast', 18, 'A wild beast ambushes your party and you drop your weapons. You must resort to your bare hands.', 'The overlord chooses one hero to test Might. If he fails, that hero suffers Damage equal to his Might.', NULL, 2),
(52, 'mountains', 'A Chest Sealed with a Rune', 18, 'You find a chest sealed with a rune.', 'Each hero tests Knowledge. if at least 2 heroes pass, the heroes may search the Search deck for 1 Health Potion, take it, and then shuffle the Search Deck.', NULL, 2),
(53, 'water', 'A Woman by the Edge', 18, 'A woman is sitting by the edge of the water whispering incoherently. As you get closer, her words begin to fill you with dread.', 'Each hero tests Knowledge. Each hero who fails is Cursed.', NULL, 2),
(54, 'plains', 'A Cloaked Traveller', 19, 'A cloaked traveller offers a warning.', 'Reveal the top card of the Overlord deck. The heroes may each suffer 1 Damage to place the card on the bottom of the deck. Otherwise, place the card on top of the deck.', NULL, 2),
(55, 'mountains', 'Rocky Ground', 19, 'As you hike your way up the mountain trail, the rocky ground gives way beneath your feet.', 'Each hero tests Might. Each hero who fails is Stunned. If all heroes fail, each hero suffers 1 Damage.', NULL, 2),
(56, 'water', 'Dark Fog', 19, 'A dark fog has settled over the water.', 'If the overlord has a number of Overlord cards equal to or less than the number of heroes, he draws 1 Overlord card', NULL, 2),
(57, 'road', 'A Tall Tree', 20, 'A tall tree offers a scouting vantage.', 'Hero players choose 1 hero to suffer 1 Fatigue and test Awareness. If he passes, he may look at the top 3 cards of of the Overlord deck and return them in any order he chooses.', NULL, 2),
(58, 'mountains', 'Catching a Spy', 20, 'Catching a spy does not prove easy.', 'The overlord may choose to reveal his hand of Overlord cards. If he does, each hero suffers 2 Fatigue.', NULL, 2),
(59, 'water', 'The Water Appears Dark', 20, 'The water appears dark and smells rather foul.', 'The overlord chooses 1 hero that does not have a Condition card to test an attribute of the overlord''s choice. if he fails, he is Cursed.', NULL, 2),
(60, 'plains', 'Barren Field', 21, 'As you cross through a barren field with no sign of life, your party is assailed by unseen dark energy.', 'Each hero tests Willpower. Each hero who fails is Cursed.', NULL, 2),
(61, 'mountains', 'Evil Minions', 21, 'Evil minions gain strength.', 'Place this card in the overlord''s play area. The overlord may discard this card when activating a monster. That monster gains 2 movement points.', NULL, 2),
(62, 'water', 'Haggling with a Merchant', 21, 'Haggling with a traveling merchant causes unfortunate delay.', 'The heroes may choose 1 hero to draw and keep 1 Shop Item card. If they do, the overlord draws 2 Overlord cards.', 'item', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbtravel_aquired`
--

CREATE TABLE IF NOT EXISTS `tbtravel_aquired` (
`travel_aq_id` int(11) NOT NULL,
  `travel_aq_event_id` int(4) NOT NULL,
  `travel_aq_progress_id` int(4) NOT NULL,
  `travel_aq_game_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbtravel_aquired`
--

INSERT INTO `tbtravel_aquired` (`travel_aq_id`, `travel_aq_event_id`, `travel_aq_progress_id`, `travel_aq_game_id`) VALUES
(27, 32, 83, 50),
(28, 16, 83, 50),
(29, 0, 83, 50),
(30, 16, 85, 50),
(31, 0, 85, 50),
(32, 4, 86, 50),
(33, 15, 86, 50),
(34, 5, 86, 50),
(35, 3, 86, 50),
(36, 4, 87, 50),
(37, 16, 87, 50),
(38, 7, 87, 50),
(39, 0, 87, 50),
(40, 4, 90, 52),
(41, 60, 90, 52),
(42, 8, 90, 52),
(43, 16, 92, 53),
(44, 0, 92, 53),
(45, 15, 92, 53),
(46, 16, 93, 53),
(47, 0, 93, 53),
(48, 25, 94, 53),
(49, 21, 94, 53),
(50, 7, 94, 53),
(51, 9, 94, 53),
(52, 16, 95, 53),
(53, 0, 95, 53),
(54, 1, 95, 53),
(55, 2, 95, 53),
(56, 16, 99, 56),
(57, 0, 99, 56),
(58, 15, 99, 56);

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
-- Indexen voor tabel `tbtravel`
--
ALTER TABLE `tbtravel`
 ADD PRIMARY KEY (`travel_id`);

--
-- Indexen voor tabel `tbtravel_aquired`
--
ALTER TABLE `tbtravel_aquired`
 ADD PRIMARY KEY (`travel_aq_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tbcharacters`
--
ALTER TABLE `tbcharacters`
MODIFY `char_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT voor een tabel `tbclasses`
--
ALTER TABLE `tbclasses`
MODIFY `class_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT voor een tabel `tbgames`
--
ALTER TABLE `tbgames`
MODIFY `game_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT voor een tabel `tbgroup`
--
ALTER TABLE `tbgroup`
MODIFY `grp_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT voor een tabel `tbitems_aquired`
--
ALTER TABLE `tbitems_aquired`
MODIFY `shop_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=347;
--
-- AUTO_INCREMENT voor een tabel `tbitems_relics`
--
ALTER TABLE `tbitems_relics`
MODIFY `relic_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT voor een tabel `tbquests_progress`
--
ALTER TABLE `tbquests_progress`
MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT voor een tabel `tbsearch`
--
ALTER TABLE `tbsearch`
MODIFY `search_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `tbskills`
--
ALTER TABLE `tbskills`
MODIFY `skill_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=311;
--
-- AUTO_INCREMENT voor een tabel `tbskills_aquired`
--
ALTER TABLE `tbskills_aquired`
MODIFY `spendxp_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=331;
--
-- AUTO_INCREMENT voor een tabel `tbtravel`
--
ALTER TABLE `tbtravel`
MODIFY `travel_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT voor een tabel `tbtravel_aquired`
--
ALTER TABLE `tbtravel_aquired`
MODIFY `travel_aq_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
