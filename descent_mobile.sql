-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 05 dec 2014 om 00:06
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
  `cam_id` int(1) DEFAULT NULL,
  `cam_name` varchar(19) DEFAULT NULL,
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

INSERT INTO `tbcampaign` (`cam_id`, `cam_name`, `cam_map`, `cam_log`, `expansion`, `edition`, `cam_logo`, `cam_icon`) VALUES
(1, 'The Shadow Rune', 'shadowRuneMap.jpg', 'shadowrune.jpg', 'Base Game 2nd Edition', '2nd', 'shadowRuneLogo.png', 'placeholder.png'),
(2, 'Lair of the Wyrm', 'LotWmap.jpg', 'LotWlog.jpg', 'Lair of the Wyrm', '2nd', 'LairOfTheWyrmLogo.png', 'Lair-of-the-Wyrm-icon.png'),
(3, 'Labyrinth of Ruin', 'labyrinthOfRuinMap.jpg', 'LabyrinthOfRuinLog.jpg', 'Labyrinth of Ruin', '2nd', 'LabyrinthofRuneLogo.png', 'Labyrinth-of-Ruin-icon.png'),
(5, 'Shadow of Nerekhall', 'shadowOfNerekhallMap.jpg', 'shadowOfNerekhallLog.jpg', 'Shadow of Nerekhall', '2nd', 'ShadowofNerekhallLogo.png', 'shadowsOfNerekhallicon.png'),
(4, 'The Trollfens', 'trollfensMap.jpg', 'trollfensLog.jpg', 'The Trollfens', '2nd', 'TheTrollfensLogo.png', 'The-Trollfens-icon.png'),
(6, 'Manor of Ravens', 'manorOfRavensMap.jpg', 'manorOfRavensLog.jpg', 'Manor of Ravens', '2nd', 'manorOfRavensLogo.png', 'manorOfRavensIcon.png');

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
  `char_class` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbcharacters`
--

INSERT INTO `tbcharacters` (`char_id`, `char_ggrp_id`, `char_game_id`, `char_player`, `char_hero`, `char_class`) VALUES
(1, 7, 14, 'Tundrra', 21, 'Runemaster'),
(2, 7, 14, 'Nimm', 19, 'Berserker'),
(3, 7, 14, 'Gloki', 20, 'Wildlander'),
(4, 7, 14, 'Djarum', 26, 'Disciple'),
(5, 7, 14, 'Shared Overlord Role', 17, ''),
(6, 17, 38, 'dllrt', 17, 'Dragon''s Greed'),
(7, 17, 38, 'Maaike', 14, 'Runemaster'),
(8, 17, 38, 'Tim', 45, 'Thief'),
(9, 17, 38, 'Frauke', 60, 'Berserker'),
(11, 17, 39, 'Maaike', 3, 'Runemaster'),
(12, 17, 39, 'Frauke', 59, 'Berserker'),
(13, 17, 39, 'Tim', 46, 'Thief'),
(14, 17, 39, 'dllrt', 17, 'Dragon''s Greed');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbdungeonlist`
--

CREATE TABLE IF NOT EXISTS `tbdungeonlist` (
  `dun_id` int(2) DEFAULT NULL,
  `dun_name` varchar(26) DEFAULT NULL,
  `dun_expansion` varchar(24) DEFAULT NULL,
  `dun_act` varchar(12) DEFAULT NULL,
  `dun_order` int(1) DEFAULT NULL,
  `dun_type` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbdungeonlist`
--

INSERT INTO `tbdungeonlist` (`dun_id`, `dun_name`, `dun_expansion`, `dun_act`, `dun_order`, `dun_type`) VALUES
(1, 'First Blood', 'The Shadow Rune', 'Introduction', 2, 'Quest'),
(2, 'A Fat Goblin', 'The Shadow Rune', 'Act 1', 3, 'Quest'),
(3, 'The Monster''s Hoard', 'The Shadow Rune', 'Act 2', 6, 'Quest'),
(4, 'The Frozen Spire', 'The Shadow Rune', 'Act 2', 6, 'Quest'),
(5, 'Castle Daerion', 'The Shadow Rune', 'Act 1', 3, 'Quest'),
(6, 'The Dawnblade', 'The Shadow Rune', 'Act 2', 6, 'Quest'),
(7, 'The Desecrated Tomb', 'The Shadow Rune', 'Act 2', 6, 'Quest'),
(8, 'The Cardinal''s Plight', 'The Shadow Rune', 'Act 1', 3, 'Quest'),
(9, 'Enduring the Elements', 'The Shadow Rune', 'Act 2', 6, 'Quest'),
(10, 'The Ritual of Shadows', 'The Shadow Rune', 'Act 2', 6, 'Quest'),
(11, 'The Masquerade Ball', 'The Shadow Rune', 'Act 1', 3, 'Quest'),
(12, 'Blood of Heroes', 'The Shadow Rune', 'Act 2', 6, 'Quest'),
(13, 'The Twin Idols', 'The Shadow Rune', 'Act 2', 6, 'Quest'),
(14, 'Death on the Wing', 'The Shadow Rune', 'Act 1', 3, 'Quest'),
(15, 'The Wyrm Turns', 'The Shadow Rune', 'Act 2', 6, 'Quest'),
(16, 'The Wyrm Rises', 'The Shadow Rune', 'Act 2', 6, 'Quest'),
(17, 'The Shadow Vault', 'The Shadow Rune', 'Interlude 1', 4, 'Quest'),
(18, 'The Overlord Revealed', 'The Shadow Rune', 'Interlude 2', 5, 'Quest'),
(19, 'Gryvorn Unleashed', 'The Shadow Rune', 'Finale 1', 7, 'Quest'),
(20, 'The Man Who Would Be King', 'The Shadow Rune', 'Finale 2', 8, 'Quest'),
(21, 'Gold Digger', 'Lair of the Wyrm', 'Act 1', 3, 'Quest'),
(22, 'Rude Awakening', 'Lair of the Wyrm', 'Act 1', 3, 'Quest'),
(23, 'What''s yours is Mine', 'Lair of the Wyrm', 'Act 1', 3, 'Quest'),
(24, 'At the Forge', 'Lair of the Wyrm', 'Finale 1', 7, 'Quest'),
(25, 'Armored to the Teeth', 'Lair of the Wyrm', 'Finale 2', 8, 'Quest'),
(26, '**Skipped Campaign Intro**', 'The Shadow Rune', 'Introduction', 2, 'Pregame'),
(27, '**Starting Gear**', 'The Shadow Rune', 'Starting', 1, 'Pregame'),
(28, '**Skipped Campaign Intro**', 'Labyrinth of Ruin', 'Introduction', 2, 'Pregame'),
(29, '**Starting Gear**', 'Labyrinth of Ruin', 'Starting', 1, 'Pregame'),
(30, 'Crusade of the Forgotten', 'Crusade of the Forgotten', 'Act 1', 1, 'Rumor'),
(31, 'Shadow Watch', 'Crusade of the Forgotten', 'Act 2', 2, 'Rumor'),
(32, 'Ruinous Whispers', 'Labyrinth of Ruin', 'Introduction', 2, 'Quest'),
(33, 'Gathering Foretold', 'Labyrinth of Ruin', 'Act 1', 3, 'Quest'),
(34, 'Honor Among Thieves', 'Labyrinth of Ruin', 'Act 1', 3, 'Quest'),
(35, 'Reclamation', 'Labyrinth of Ruin', 'Act 1', 3, 'Quest'),
(36, 'Through the Mist', 'Labyrinth of Ruin', 'Act 1', 3, 'Quest'),
(37, 'Barrow of Barris', 'Labyrinth of Ruin', 'Act 1', 3, 'Quest'),
(38, 'Secrets in Stone', 'Labyrinth of Ruin', 'Act 1', 3, 'Quest'),
(39, 'Fury of the Tempest', 'Labyrinth of Ruin', 'Act 1', 3, 'Quest'),
(40, 'Back from the Dead', 'Labyrinth of Ruin', 'Act 1', 3, 'Quest'),
(41, 'Pilgrimage', 'Labyrinth of Ruin', 'Interlude', 4, 'Quest'),
(42, 'Fortune and Glory', 'Labyrinth of Ruin', 'Interlude', 4, 'Quest'),
(43, 'Heart of the Wilds', 'Labyrinth of Ruin', 'Act 2', 5, 'Quest'),
(44, 'Let the Truth be Buried', 'Labyrinth of Ruin', 'Act 2', 5, 'Quest'),
(45, 'Fountain of Insight', 'Labyrinth of Ruin', 'Act 2', 5, 'Quest'),
(46, 'Web of Power', 'Labyrinth of Ruin', 'Act 2', 5, 'Quest'),
(47, 'Fire and Brimstone', 'Labyrinth of Ruin', 'Act 2', 5, 'Quest'),
(48, 'Tripping the Scales', 'Labyrinth of Ruin', 'Act 2', 5, 'Quest'),
(49, 'Endless Night', 'Labyrinth of Ruin', 'Finale', 6, 'Quest'),
(50, 'A Glimmer of Hope', 'Labyrinth of Ruin', 'Finale', 6, 'Quest'),
(51, '**Starting Gear**', 'Manor of Ravens', 'Starting', 1, 'Pregame'),
(52, 'Spread Your Wings', 'Manor of Ravens', 'Act 1', 2, 'Quest'),
(53, 'Finders and Keepers', 'Manor of Ravens', 'Act 1', 2, 'Quest'),
(54, 'My House, My Rules', 'Manor of Ravens', 'Act 1', 2, 'Quest'),
(55, 'Where the Heart Is', 'Manor of Ravens', 'Act 2', 3, 'Quest'),
(56, 'Wrong Man for the Job', 'Manor of Ravens', 'Act 2', 3, 'Quest'),
(57, 'Beneath the Manor', 'Manor of Ravens', 'Act 2', 3, 'Quest'),
(58, '**Skipped Campaign Intro**', 'Shadow of Nerekhall', 'Introduction', 2, 'Pregame'),
(59, '**Starting Gear**', 'Shadow of Nerekhall', 'Starting', 1, 'Pregame'),
(60, 'A Demostration', 'Shadow of Nerekhall', 'Introduction', 2, 'Quest'),
(61, 'Civil War', 'Shadow of Nerekhall', 'Act 1', 3, 'Quest'),
(62, 'Without Mercy', 'Shadow of Nerekhall', 'Act 1', 3, 'Quest'),
(63, 'Local Politics', 'Shadow of Nerekhall', 'Act 1', 3, 'Quest'),
(64, 'Prey', 'Shadow of Nerekhall', 'Act 1', 3, 'Quest'),
(65, 'Price of Power', 'Shadow of Nerekhall', 'Act 1', 3, 'Quest'),
(66, 'The Incident', 'Shadow of Nerekhall', 'Act 1', 3, 'Quest'),
(67, 'Rat-Thing King', 'Shadow of Nerekhall', 'Act 1', 3, 'Quest'),
(68, 'Respected Citizen', 'Shadow of Nerekhall', 'Act 1', 3, 'Quest'),
(69, 'The True Enemy', 'Shadow of Nerekhall', 'Interlude 1', 4, 'Quest'),
(70, 'Traitors Among Us', 'Shadow of Nerekhall', 'Interlude 2', 5, 'Quest'),
(71, 'Overdue Demise', 'Shadow of Nerekhall', 'Act 2', 6, 'Quest'),
(72, 'Into the Dark', 'Shadow of Nerekhall', 'Act 2', 6, 'Quest'),
(73, 'Nightmares', 'Shadow of Nerekhall', 'Act 2', 6, 'Quest'),
(74, 'Arise My Friends', 'Shadow of Nerekhall', 'Act 2', 6, 'Quest'),
(75, 'Wide Spread Panic', 'Shadow of Nerekhall', 'Act 2', 6, 'Quest'),
(76, 'Lost', 'Shadow of Nerekhall', 'Act 2', 6, 'Quest'),
(77, 'The Black Realm', 'Shadow of Nerekhall', 'Finale 1', 7, 'Quest'),
(78, 'The City Falls', 'Shadow of Nerekhall', 'Finale 2', 8, 'Quest'),
(79, '**Starting Gear**', 'The Trollfens', 'Starting', 1, 'Pregame'),
(80, 'Ghost Town', 'The Trollfens', 'Act 1', 2, 'Quest'),
(81, 'Food for Worms', 'The Trollfens', 'Act 1', 2, 'Quest'),
(82, 'Three Heads, One Mind', 'The Trollfens', 'Act 1', 2, 'Quest'),
(83, 'Source of Sickness', 'The Trollfens', 'Finale 1', 3, 'Quest'),
(84, 'Spreading Affliction', 'The Trollfens', 'Finale 2', 4, 'Quest'),
(85, '', '', '', 0, ''),
(86, '', '', '', 0, ''),
(87, '', '', '', 0, ''),
(88, '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbgames`
--

CREATE TABLE IF NOT EXISTS `tbgames` (
`game_id` int(3) NOT NULL,
  `game_grp_id` int(3) DEFAULT NULL,
  `game_timestamp` varchar(19) DEFAULT NULL,
  `game_dm` varchar(9) DEFAULT NULL,
  `game_camp_id` int(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbgames`
--

INSERT INTO `tbgames` (`game_id`, `game_grp_id`, `game_timestamp`, `game_dm`, `game_camp_id`) VALUES
(14, 7, '2014-10-03 11:06:52', 'Tundrra', 1),
(25, 8, '2014-10-27 07:24:16', 'Tundrra', 1),
(29, 8, '2014-11-05 13:12:09', 'Tundrra', 1),
(36, 15, '2014-11-26 15:54:27', 'Lawpsided', 1),
(38, 17, '2014-11-27 07:46:16', 'dllrt', 1),
(39, 17, '2014-12-03 08:47:05', 'dllrt', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbgaminggroup`
--

CREATE TABLE IF NOT EXISTS `tbgaminggroup` (
  `ggrp_id` int(2) DEFAULT NULL,
  `ggrp_name` varchar(17) DEFAULT NULL,
  `ggrp_timestamp` varchar(19) DEFAULT NULL,
  `ggrp_dm` varchar(9) DEFAULT NULL,
  `ggrp_player1` varchar(9) DEFAULT NULL,
  `ggrp_char1` varchar(18) DEFAULT NULL,
  `ggrp_mage1` varchar(11) DEFAULT NULL,
  `ggrp_player2` varchar(19) DEFAULT NULL,
  `ggrp_char2` varchar(19) DEFAULT NULL,
  `ggrp_warrior2` varchar(9) DEFAULT NULL,
  `ggrp_player3` varchar(9) DEFAULT NULL,
  `ggrp_char3` varchar(16) DEFAULT NULL,
  `ggrp_scout3` varchar(10) DEFAULT NULL,
  `ggrp_player4` varchar(19) DEFAULT NULL,
  `ggrp_char4` varchar(14) DEFAULT NULL,
  `ggrp_healer4` varchar(13) DEFAULT NULL,
  `ggrp_playerOL` varchar(20) DEFAULT NULL,
  `ggrp_overlord` varchar(8) DEFAULT NULL,
  `ggrp_campaign` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbgaminggroup`
--

INSERT INTO `tbgaminggroup` (`ggrp_id`, `ggrp_name`, `ggrp_timestamp`, `ggrp_dm`, `ggrp_player1`, `ggrp_char1`, `ggrp_mage1`, `ggrp_player2`, `ggrp_char2`, `ggrp_warrior2`, `ggrp_player3`, `ggrp_char3`, `ggrp_scout3`, `ggrp_player4`, `ggrp_char4`, `ggrp_healer4`, `ggrp_playerOL`, `ggrp_overlord`, `ggrp_campaign`) VALUES
(14, 'NORdelving', '2014-10-03 11:06:52', 'Tundrra', 'Tundrra', 'Leoric of the Book', 'Runemaster', 'Nimm', 'Laughin Buldar', 'Berserker', 'Gloki', 'Tobin Farslayer', 'Wildlander', 'Djarum', 'Elder Mok', 'Disciple', 'Shared Overlord Role', 'Overlord', 'The Shadow Rune'),
(29, 'Brothers in Arms', '2014-11-05 13:12:09', 'Tundrra', 'Lazyone', 'Truthseer Kel', 'Necromancer', 'Gloki', 'Trenloe the Strong', 'Knight', 'Aaron', 'Tobin Farslayer', 'Thief', 'Tundrra', 'Aurim', 'Spiritspeaker', 'Shared Overlord Role', 'Overlord', 'The Shadow Rune'),
(25, 'Brothers in Arms', '2014-10-27 07:24:16', 'Tundrra', 'Tundrra', 'Leoric of the Book', 'Runemaster', 'Aaron', 'Alys Raine', 'Berserker', 'Aaron', 'Tobin Farslayer', 'Thief', 'Tundrra', 'Augur Grisom', 'Spiritspeaker', 'Lazyone', 'Overlord', 'The Shadow Rune'),
(36, 'Family Game Night', '2014-11-26 15:54:27', 'Lawpsided', 'No Player', 'No Mage', 'No Mage', 'Shared/Rotated Role', 'Nanok of the Blade', 'Berserker', 'No Player', 'No Scout', 'No Scout', 'Shared/Rotated Role', 'Avric Albright', 'Disciple', 'Lawpsided', 'Overlord', 'The Shadow Rune'),
(38, 'Mancave', '2014-11-27 07:46:16', 'dllrt', 'Maaike', 'Shiver', 'Runemaster', 'Frauke', 'Grisban the Thirsty', 'Berserker', 'Tim', 'Tomble Burrowell', 'Thief', 'No Player', 'No Healer', 'No Healer', 'dllrt', 'Overlord', 'The Shadow Rune'),
(NULL, 'Mancave', NULL, 'dllrt', 'Frauke', 'Leoric of the Book', 'Hexer', 'Maaike', 'Pathfinder Durik', 'Berserker', 'Tim', 'Laurel of Bloodw', 'Thief', 'No Player', 'No Healer', 'No Class', 'dllrt', 'Overlord', 'Labyrinth of Ru');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbgroup`
--

CREATE TABLE IF NOT EXISTS `tbgroup` (
  `grp_id` int(2) DEFAULT NULL,
  `grp_name` varchar(23) DEFAULT NULL,
  `grp_creation` varchar(19) DEFAULT NULL,
  `grp_startedby` varchar(9) DEFAULT NULL,
  `grp_state_country` varchar(7) DEFAULT NULL,
  `grp_city` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbgroup`
--

INSERT INTO `tbgroup` (`grp_id`, `grp_name`, `grp_creation`, `grp_startedby`, `grp_state_country`, `grp_city`) VALUES
(19, 'redesign test group', '2014-12-02 08:47:05', 'Alcyone', 'Indiana', 'Bloomington'),
(15, 'Family Game Night', '2014-11-26 15:53:07', 'Lawpsided', 'AZ', 'Tucson'),
(8, 'Brothers in Arms', '2014-10-23 11:20:28', 'Tundrra', 'Indiana', 'Bloomington'),
(7, 'NORdelving', '2014-10-01 19:26:50', 'Tundrra', 'Indiana', 'Bloomington'),
(17, 'Mancave', '2014-11-27 07:43:39', 'dllrt', 'Belgium', 'Gent'),
(18, 'Test game - delete me -', '2014-11-27 08:18:08', 'Alcyone', 'Indiana', 'Bloomington');

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
(1, 'Reynhart The Worthy', 'Warrior', '', 'reynhart.jpg', 'reynhartbust.jpg'),
(2, 'Logan Lashley', 'Scout', '', 'logan.jpg', 'loganbust.jpg'),
(3, 'High Mage Quellen', 'Mage', '', 'quellen.jpg', 'high_mage_quellen.jpg'),
(4, 'Ulma Grimstone', 'Healer', '', 'ulma.jpg', 'ulma_grimstone.jpg'),
(5, 'Augur Grisom', 'Healer', '', 'grisom.jpg', 'grisombust.jpg'),
(6, 'Dezra the Vile', 'Mage', '', 'dezera.jpg', 'dezrabust.jpg'),
(7, 'Raythen', 'Scout', '', 'raythen.jpg', 'raythenbust.jpg'),
(8, 'Pathfinder Durik', 'Scout', '', 'durik.jpg', 'durikbust.jpg'),
(9, 'Alys Raine', 'Warrior', '', 'alys.jpg', 'alysbust.jpg'),
(10, 'Laurel of Bloodwood', 'Scout', '', 'laurelofbloodwood.jpg', 'laurelofbloodwoodbust.jpg'),
(11, 'Ravaella Lightfoot', 'Mage', '', 'ravaella.jpg', 'ravaellabust.jpg'),
(12, 'Rendiel', 'Healer', '', 'rendiel.jpg', 'rendielbust.jpg'),
(13, 'Serena', 'Healer', '', 'serena.jpg', 'serenabust.jpg'),
(14, 'Shiver', 'Mage', '', 'shiver.jpg', 'shiver.jpg'),
(15, 'Thaiden Mistpeak', 'Scout', '', 'thaiden.jpg', 'thaidenbust.jpg'),
(16, 'Orkell the Swift', 'Warrior', '', 'orkell.jpg', 'orkellbust.jpg'),
(17, 'Overlord', 'Overlord', '', 'overlord.jpg', 'overlord.jpg'),
(18, 'Elder Mok', 'Healer', '', 'eldermok.jpg', 'eldermokbust.jpg'),
(19, 'Laughin Buldar', 'Warrior', '', 'laughinbuldar.jpg', 'laughinbuldarbust.jpg'),
(20, 'Tobin Farslayer', 'Scout', '', 'tobinfarslayer.jpg', 'tobinfarslayerbust.jpg'),
(21, 'Leoric of the Book', 'Mage', 'vanilla', 'leoricofthebook.jpg', 'leoric_of_the_book.jpg'),
(22, 'Avric Albright', 'Healer', 'Vanilla', 'avricalbright.jpg', 'avricalbrightbust.jpg'),
(23, 'Ashrian', 'Healer', 'Vanilla', 'ashrian.jpg', 'ashrianbust.jpg'),
(24, 'Brother Gherinn', 'Healer', 'Vanilla', 'brothergherinn.jpg', 'brothergherinnbust.jpg'),
(25, 'Brother Glyr', 'Healer', 'Vanilla', 'brotherglyr.jpg', 'brotherglyrbust.jpg'),
(26, 'Elder Mok', 'Healer', 'Vanilla', 'eldermok.jpg', 'elder_mok.jpg'),
(27, 'Ispher', 'Healer', 'Vanilla', 'ispher.jpg', 'ispherbust.jpg'),
(28, 'Jonas the Kind', 'Healer', 'Vanilla', 'jonasthekind.jpg', 'jonasthekindbust.jpg'),
(29, 'Okaluk and Rakash', 'Healer', 'Vanilla', 'okalukandrakash.jpg', 'okalukandrakashbust.jpg'),
(30, 'Sahla', 'Healer', 'Vanilla', 'sahla.jpg', 'sahlabust.jpg'),
(31, 'Aurim', 'Healer', 'Vanilla', 'aurim.jpg', 'aurimbust.jpg'),
(32, 'Andira Runehand', 'Healer', 'Vanilla', 'andirarunehand.jpg', 'andirarunehandbust.jpg'),
(33, 'Widow Tarha', 'Mage', 'Vanilla', 'widowtarha.jpg', 'widowtarhabust.jpg'),
(34, 'Challara', 'Mage', 'Vanilla', 'challara.jpg', 'challarabust.jpg'),
(35, 'Jaes the Exile', 'Mage', 'Vanilla', 'jaestheexile.jpg', 'jaestheexilebust.jpg'),
(36, 'Landrec the Wise', 'Mage', 'Vanilla', 'landrecthewise.jpg', 'landrecthewisebust.jpg'),
(37, 'Lyssa', 'Mage', 'Vanilla', 'lyssa.jpg', 'lyssabust.jpg'),
(38, 'Mad Carthos', 'Mage', 'Vanilla', 'madcarthos.jpg', 'madcarthosbust.jpg'),
(39, 'Master Thorn', 'Mage', 'Vanilla', 'masterthorn.jpg', 'masterthornbust.jpg'),
(40, 'Truthseer Kel', 'Mage', 'Vanilla', 'truthseerkel.jpg', 'truthseerkelbust.jpg'),
(41, 'Zyla', 'Mage', 'Vanilla', 'zyla.jpg', 'zylabust.jpg'),
(42, 'Astarra', 'Mage', 'Vanilla', 'astarra.jpg', 'astarrabust.jpg'),
(43, 'Tinashi the Wanderer', 'Scout', 'Vanilla', 'tinashithewanderer.jpg', 'tinashithewandererbust.jpg'),
(44, 'Roganna the Shade', 'Scout', 'Vanilla', 'rogannatheshade.jpg', 'rogannatheshadebust.jpg'),
(45, 'Tomble Burrowell', 'Scout', 'Vanilla', 'tombleburrowell.jpg', 'tombleburrowellbust.jpg'),
(46, 'Jain Fairwood', 'Scout', 'Vanilla', 'jainfairwood.jpg', 'jain_fairwood.jpg'),
(47, 'Bogran the Shadow', 'Scout', 'Vanilla', 'bograntheshadow.jpg', 'bograntheshadowbust.jpg'),
(48, 'Grey Ker', 'Scout', 'Vanilla', 'greyker.jpg', 'greykerbust.jpg'),
(49, 'Kirga', 'Scout', 'Vanilla', 'kirga.jpg', 'kirgabust.jpg'),
(50, 'Lindel', 'Scout', 'Vanilla', 'lindel.jpg', 'lindelbust.jpg'),
(51, 'Red Scorpion', 'Scout', 'Vanilla', 'redscorpion.jpg', 'redscorpionbust.jpg'),
(52, 'Ronin of the Wild', 'Scout', 'Vanilla', 'roninofthewild.jpg', 'roninofthewildbust.jpg'),
(53, 'Silhouette', 'Scout', 'Vanilla', 'silhouette.jpg', 'silhouettebust.jpg'),
(54, 'Tatianna', 'Scout', 'Vanilla', 'tatianna', 'tatiannabust.jpg'),
(55, 'Tetherys', 'Scout', 'Vanilla', 'tetherys.jpg', 'tetherysbust.jpg'),
(56, 'Vyrah the Falconer', 'Scout', 'Vanilla', 'vyrahthefalconer.jpg', 'vyrahthefalconerbust.jpg'),
(57, 'Arvel Worldwalker', 'Scout', 'Vanilla', 'arvelworldwalker.jpg', 'arvelworldwalkerbust.jpg'),
(58, 'Pathfinder Durik', 'Warrior', 'Vanilla', 'pathfinderdurik.jpg', 'pathfinderdurikbust.jpg'),
(59, 'Syndrael', 'Warrior', 'Vanilla', 'syndrael.jpg', 'syndrael.jpg'),
(60, 'Grisban the Thirsty', 'Warrior', 'Vanilla', 'grisbanthethirsty.jpg', 'grisbanthethirstybust.jpg'),
(61, 'Corbin', 'Warrior', 'Vanilla', 'corbin.jpg', 'corbinbust.jpg'),
(62, 'Eliam', 'Warrior', 'Vanilla', 'eliam.jpg', 'eliambust.jpg'),
(63, 'Hugo the Glorious', 'Warrior', 'Vanilla', 'hugotheglorious.jpg', 'hugothegloriousbust.jpg'),
(64, 'Karnon', 'Warrior', 'Vanilla', 'karnon.jpg', 'karnonbust.jpg'),
(65, 'Krutzbeck', 'Warrior', 'Vanilla', 'krutzbeck.jpg', 'krutzbeckbust.jpg'),
(66, 'Lord Hawthorne', 'Warrior', 'Vanilla', 'lordhawthorne.jpg', 'lordhawthornebust.jpg'),
(67, 'Mordrog', 'Warrior', 'Vanilla', 'mordrog.jpg', 'mordrogbust.jpg'),
(68, 'Nanok of the Blade', 'Warrior', 'Vanilla', 'nanokoftheblade.jpg', 'nanokofthebladebust.jpg'),
(69, 'Nara the Fang', 'Warrior', 'Vanilla', 'narathefang.jpg', 'narathefangbust.jpg'),
(70, 'One Fist', 'Warrior', 'Vanilla', 'onefist.jpg', 'onefistbust.jpg'),
(71, 'Sir Valadir', 'Warrior', 'Vanilla', 'sirvaladir.jpg', 'sirvaladirbust.jpg'),
(72, 'Steelhorns', 'Warrior', 'Vanilla', 'steelhorns.jpg', 'steelhornsbust.jpg'),
(73, 'Tahlia', 'Warrior', 'Vanilla', 'tahlia.jpg', 'tahliabust.jpg'),
(74, 'Trenloe the Strong', 'Warrior', 'Vanilla', 'trenloethestrong.jpg', 'trenloethestrongbust.jpg'),
(75, 'Varikas the Dead', 'Warrior', 'Vanilla', 'varikasthedead.jpg', 'varikasthedeadbust.jpg'),
(77, 'No Mage', 'Mage', 'none', 'nomage.jpg', 'nomagebust.jpg'),
(78, 'No Scout', 'Scout', 'none', 'noscout.jpg', 'noscoutbust.jpg'),
(79, 'No Warrior', 'Warrior', 'none', 'nowarrior.jpg', 'nowarriorbust.jpg'),
(80, 'No Healer', 'Healer', 'none', 'nohealer.jpg', 'nohealerbust.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbitems`
--

CREATE TABLE IF NOT EXISTS `tbitems` (
  `market_id` int(3) DEFAULT NULL,
  `market_item_name` varchar(38) DEFAULT NULL,
  `market_act` int(1) DEFAULT NULL,
  `market_price` int(4) DEFAULT NULL,
  `market_sellprice` int(3) DEFAULT NULL,
  `shop_relic` varchar(3) DEFAULT NULL,
  `owner` varchar(15) DEFAULT NULL,
  `market_img` varchar(36) DEFAULT NULL,
  `market_expansion` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbitems`
--

INSERT INTO `tbitems` (`market_id`, `market_item_name`, `market_act`, `market_price`, `market_sellprice`, `shop_relic`, `owner`, `market_img`, `market_expansion`) VALUES
(1, 'Belt of Alchemy', 1, -100, 50, 'no', 'hero', 'beltofalchemy.jpg', 'The Trollfens'),
(2, 'Belt of Waterwalking', 1, -50, 25, 'no', 'hero', 'beltofwaterwalking.jpg', 'The Trollfens'),
(3, 'Deflecting Shield', 1, -50, 25, 'no', 'hero', 'deflectingshield.jpg', 'The Trollfens'),
(4, 'Dire Flail', 1, -150, 75, 'no', 'hero', 'direflail.jpg', 'The Trollfens'),
(5, 'Immunity Elixir (Relic)', 0, 0, 0, 'yes', 'hero', 'immunityelixir.jpg', 'The Trollfens'),
(6, 'Curative Vial (Relic)', 0, 0, 0, 'yes', 'overlord', 'curativevial.jpg', 'The Trollfens'),
(15, 'Reaper''s Scythe (Necromancer)', 0, 0, 25, 'no', 'Necromancer', 'reapersscythenecromancer.jpg', 'vanilla'),
(19, 'Yew Shortbow (Wildlander)', 0, 0, 25, 'no', 'Wildlander', 'yewshortbowwildlander.jpg', 'vanilla'),
(20, 'Wooden Shield (Disciple)', 0, 0, 25, 'no', 'Disciple', 'woodenshielddisciple.jpg', 'vanilla'),
(21, 'Iron Mace (Disciple)', 0, 0, 25, 'no', 'Disciple', 'ironmacedisciple.jpg', 'vanilla'),
(22, 'Iron Longsword (Knight)', 0, 0, 25, 'no', 'Knight', 'ironlongswordknight.jpg', 'vanilla'),
(23, 'Wooden Shield (Knight)', 0, 0, 25, 'no', 'Knight', 'woodenshieldknight.jpg', 'vanilla'),
(24, 'Worn Greatsword (Champion)', 0, 0, 25, 'no', 'Champion', 'worngreatswordchampion.jpg', 'Lair of the Wyrm'),
(25, 'Horn of Courage (Champion)', 0, 0, 25, 'no', 'Champion', 'hornofcouragechampion.jpg', 'Lair of the Wyrm'),
(26, 'Hunting Spear (Bestmaster)', 0, 0, 25, 'no', 'Beastmaster', 'huntingspearbeastmaster.jpg', 'Labyrinth of Ruin'),
(27, 'Skinning Knife (Beastmaster)', 0, 0, 25, 'no', 'Beastmaster', 'skinningknifebeastmaster.jpg', 'Labyrinth of Ruin'),
(28, 'Leather Whip (Treasure Hunter)', 0, 0, 25, 'no', 'Treasure Hunter', 'leatherwhiptreasurehunter.jpg', 'Labyrinth of Ruin'),
(29, 'The Dead Man''s Compass (Treasurehunter', 0, 0, 25, 'no', 'Treasure Hunter', 'thedeadmanscompasstreasurehunter.jpg', 'Labyrinth of Ruin'),
(30, 'Throwing Knives (Thief)', 0, 0, 25, 'no', 'Thief', 'throwingknivesthief.jpg', 'vanilla'),
(31, 'Lucky Charm (Thief)', 0, 0, 25, 'no', 'Thief', 'luckycharmthief.jpg', 'vanilla'),
(32, 'Hunting Knife (Stalker)', 0, 0, 25, 'no', 'Stalker', 'huntingknifestalker.jpg', 'The Trollfens'),
(33, 'Arcane Bolt (Runemaster)', 0, 0, 25, 'no', 'Runemaster', 'arcaneboltrunemaster.jpg', 'vanilla'),
(34, 'Staff of the Grave (Hexer)', 0, 0, 25, 'no', 'Hexer', 'staffofthegravehexer.jpg', 'Labyrinth of Ruin'),
(35, 'Statis Rune (Geomancer)', 0, 0, 25, 'no', 'Geomancer', 'stasisrunegeomancer.jpg', 'Lair of the Wyrm'),
(36, 'Oakstaff (Spiritspeaker)', 0, 0, 25, 'no', 'Spiritspeaker', 'oakstaffspiritspeaker.jpg', 'vanilla'),
(37, 'Smoking Vials (Apothecary)', 0, 0, 25, 'no', 'Apothecary', 'smokingvialsapothecary.jpg', 'Labyrinth of Ruin'),
(38, 'Iron Flail (Prophet)', 0, 0, 25, 'no', 'Prophet', 'ironflailprophet.jpg', 'vanilla'),
(39, 'Sage''s Tome (Prophet)', 0, 0, 25, 'no', 'Prophet', 'sagestomeprophet.jpg', 'vanilla'),
(40, 'Chipped Greataxe (Berserker)', 0, 0, 25, 'no', 'Berserker', 'chippedgreataxeberserker.jpg', 'vanilla'),
(41, 'Mending Talisman (Relic)', 0, 0, 0, 'yes', 'hero', 'mendingtalisman.jpg', 'The Trollfens'),
(42, 'Omen of Blight (Relic)', 0, 0, 0, 'yes', 'overlord', 'omenofblight.jpg', 'The Trollfens'),
(43, 'Workman''s Ring (Relic)', 0, 0, 0, 'yes', 'hero', 'workmansring.jpg', 'The Trollfens'),
(44, 'Taskmaster''s Ring (Relic)', 0, 0, 0, 'yes', 'overlord', 'taskmastersring.jpg', 'The Trollfens'),
(45, 'Gauntlets of Power (Relic)', 0, 0, 0, 'yes', 'hero', 'gauntletsofpower.jpg', 'Labyrinth of Ruin'),
(46, 'Gauntlets of Spite (Relic)', 0, 0, 0, 'yes', 'overlord', 'guantletsofspite.jpg', 'Labyrinth of Ruin'),
(47, 'Living Heart (Relic)', 0, 0, 0, 'yes', 'hero', 'livingheart.jpg', 'Labyrinth of Ruin'),
(48, 'Fallen Heart (Relic)', 0, 0, 0, 'yes', 'overlord', 'fallenheart.jpg', 'Labyrinth of Ruin'),
(49, 'Sun Stone (Relic)', 0, 0, 0, 'yes', 'hero', 'sunstone.jpg', 'Labyrinth of Ruin'),
(50, 'Sun''s Fury (Relic)', 0, 0, 0, 'yes', 'overlord', 'sunsfury.jpg', 'Labyrinth of Ruin'),
(51, 'Valyndra''s Bane (Relic)', 0, 0, 0, 'yes', 'hero', 'valyndrasbane.jpg', 'Lair of the Wyrm'),
(52, 'Her Majesty''s Malice (Relic)', 0, 0, 0, 'yes', 'overlord', 'hermajestysmalice.jpg', 'Lair of the Wyrm'),
(53, 'Aurium Mail (Relic)', 0, 0, 0, 'yes', 'hero', 'auriummail.jpg', 'Lair of the Wyrm'),
(54, 'Valyndra''s Gift (Relic)', 0, 0, 0, 'yes', 'overlord', 'valyndrasgift.jpg', 'Lair of the Wyrm'),
(55, 'Dawnblade (Relic)', 0, 0, 0, 'yes', 'hero', 'dawnblade.jpg', 'vanilla'),
(56, 'Duskblade (Relic)', 0, 0, 0, 'yes', 'overlord', 'duskblade.jpg', 'vanilla'),
(57, 'Fortuna''s Dice (Relic)', 0, 0, 0, 'yes', 'hero', 'fortunasdice.jpg', 'vanilla'),
(58, 'Bones of Woe (Relic)', 0, 0, 0, 'yes', 'overlord', 'bonesofwoe.jpg', 'vanilla'),
(59, 'Shield of the Dark God (Relic)', 0, 0, 0, 'yes', 'hero', 'shieldofthedarkgod.jpg', 'vanilla'),
(60, 'Shield of Zorek''s Favor (Relic)', 0, 0, 0, 'yes', 'overlord', 'shieldofzoreksfavor.jpg', 'vanilla'),
(61, 'Staff of Light (Relic)', 0, 0, 0, 'yes', 'hero', 'staffoflight.jpg', 'vanilla'),
(62, 'Staff of Shadows (Relic)', 0, 0, 0, 'yes', 'overlord', 'staffofshadows.jpg', 'vanilla'),
(63, 'The Shadow Rune (Hero Relic)', 0, 0, 0, 'yes', 'hero', 'theshadowrunehero.jpg', 'vanilla'),
(64, 'The Shadow Rune (overlord Relic)', 0, 0, 0, 'yes', 'overlord', 'theshadowruneoverlord.jpg', 'vanilla'),
(65, 'Trueshot (Relic)', 0, 0, 0, 'yes', 'hero', 'trueshot.jpg', 'vanilla'),
(66, 'Scorpion''s Kiss (Relic)', 0, 0, 0, 'yes', 'overlord', 'scorpionskiss.jpg', 'vanilla'),
(68, 'Guardian Axe', 5, -175, 75, 'no', 'hero', 'guardianaxe.jpg', 'The Trollfens'),
(69, 'Lifedrain Scepeter', 5, -100, 50, 'no', 'hero', 'lifedrainscepter.jpg', 'The Trollfens'),
(70, 'Mapstone', 5, -50, 25, 'no', 'hero', 'mapstone.jpg', 'The Trollfens'),
(71, 'Trident', 5, -125, 50, 'no', 'hero', 'trident.jpg', 'The Trollfens'),
(72, 'Thief''s Vest', 5, -100, 50, 'no', 'hero', 'theifsvest.jpg', 'Labyrinth of Ruin'),
(73, 'Teleportation Rune', 5, -125, 50, 'no', 'hero', 'teleportationrune.jpg', 'Labyrinth of Ruin'),
(74, 'Shield of Light', 5, -75, 25, 'no', 'hero', 'shieldoflight.jpg', 'Labyrinth of Ruin'),
(75, 'Serpent Dagger', 5, -125, 50, 'no', 'hero', 'serpentdagger.jpg', 'Labyrinth of Ruin'),
(76, 'Rune Plate', 5, -175, 75, 'no', 'hero', 'runeplate.jpg', 'Labyrinth of Ruin'),
(77, 'Poisoned Blowgun', 5, -100, 50, 'no', 'hero', 'poisonedblowgun.jpg', 'Labyrinth of Ruin'),
(78, 'Mace of Aver', 5, -150, 75, 'no', 'hero', 'maceofaver.jpg', 'Labyrinth of Ruin'),
(79, 'Jinn''s Lamp', 5, -100, 50, 'no', 'hero', 'jinnslamp.jpg', 'Labyrinth of Ruin'),
(80, 'Elven Boots', 5, -50, 25, 'no', 'hero', 'elvenboots.jpg', 'Labyrinth of Ruin'),
(81, 'Bow of Bone', 5, -125, 50, 'no', 'hero', 'bowofbone.jpg', 'Labyrinth of Ruin'),
(82, 'Bearded Axe', 5, -175, 75, 'no', 'hero', 'beardedaxe.jpg', 'Labyrinth of Ruin'),
(83, 'Flash Powder', 5, -100, 50, 'no', 'hero', 'flashpowder.jpg', 'Lair of the Wyrm'),
(84, 'Magic Staff', 1, -150, 75, 'no', 'hero', 'magicstaff.jpg', 'vanilla'),
(85, 'Leather Armor', 1, -75, 25, 'no', 'hero', 'leatherarmor.jpg', 'vanilla'),
(86, 'Scorpion Helm', 1, -75, 25, 'no', 'hero', 'scorpionhelm.jpg', 'vanilla'),
(87, 'Iron Shield', 1, -50, 25, 'no', 'hero', 'ironshield.jpg', 'vanilla'),
(88, 'Lucky Charm', 1, -100, 50, 'no', 'hero', 'luckycharm.jpg', 'vanilla'),
(89, 'Magma Blast', 1, -150, 75, 'no', 'hero', 'magmablast.jpg', 'Lair of the Wyrm'),
(90, 'Handbow', 1, -150, 75, 'no', 'hero', 'handbow.jpg', 'Lair of the Wyrm'),
(91, 'Halberd', 1, -125, 50, 'no', 'hero', 'halberd.jpg', 'Lair of the Wyrm'),
(92, 'Sunburst', 1, -125, 50, 'no', 'hero', 'sunburst.jpg', 'vanilla'),
(93, 'Steel Broadsword', 1, -100, 50, 'no', 'hero', 'steelbroadsword.jpg', 'vanilla'),
(94, 'Sling', 1, -75, 25, 'no', 'hero', 'sling.jpg', 'vanilla'),
(96, 'Ring of Power', 1, -150, 75, 'no', 'hero', 'ringofpower.jpg', 'vanilla'),
(97, 'Mana Weave', 1, -125, 50, 'no', 'hero', 'manaweave.jpg', 'vanilla'),
(99, 'Light Hammer', 1, -75, 25, 'no', 'hero', 'lighthammer.jpg', 'vanilla'),
(101, 'Iron Spear', 1, -75, 25, 'no', 'hero', 'ironspear.jpg', 'vanilla'),
(103, 'Iron Battleaxe', 1, -100, 50, 'no', 'hero', 'ironbattleaxe.jpg', 'vanilla'),
(104, 'Immolation', 1, -150, 75, 'no', 'hero', 'immolation.jpg', 'vanilla'),
(105, 'Heavy Cloak', 1, -75, 25, 'no', 'hero', 'heavycloak.jpg', 'vanilla'),
(106, 'Elm Greatbow', 1, -100, 50, 'no', 'hero', 'elmgreatbow.jpg', 'vanilla'),
(107, 'Crossbow', 1, -175, 75, 'no', 'hero', 'crossbow.jpg', 'vanilla'),
(108, 'Chainmail', 1, -150, 75, 'no', 'hero', 'chainmail.jpg', 'vanilla'),
(109, 'Belt of Strength', 2, -125, 50, 'no', 'hero', 'beltofstrength.jpg', 'The Trollfens'),
(110, 'Blasting Rune', 2, -200, 100, 'no', 'hero', 'blastingrune.jpg', 'The Trollfens'),
(111, 'Boomerang', 2, -200, 100, 'no', 'hero', 'boomerang.jpg', 'The Trollfens'),
(112, 'Glaive', 2, -175, 75, 'no', 'hero', 'glaive.jpg', 'The Trollfens'),
(113, 'Stone Armor', 2, -225, 100, 'no', 'hero', 'stonearmor.jpg', 'The Trollfens'),
(114, 'Staff of the Wild', 2, -175, 75, 'no', 'hero', 'staffofthewild.jpg', 'Labyrinth of Ruin'),
(115, 'Shroud of Dusk', 2, -150, 75, 'no', 'hero', 'shroudofdusk.jpg', 'Labyrinth of Ruin'),
(116, 'Rune of Misery', 2, -250, 125, 'no', 'hero', 'runeofmisery.jpg', 'Labyrinth of Ruin'),
(117, 'Rage Blade', 2, -200, 100, 'no', 'hero', 'rageblade.jpg', 'Labyrinth of Ruin'),
(118, 'Obsidian Scalemail', 2, -275, 125, 'no', 'hero', 'obsidianscalemail.jpg', 'Labyrinth of Ruin'),
(119, 'Obsidian Greataxe', 2, -225, 100, 'no', 'hero', 'obsidiangreataxe.jpg', 'Labyrinth of Ruin'),
(120, 'Iron Claws', 2, -175, 75, 'no', 'hero', 'ironclaws.jpg', 'Labyrinth of Ruin'),
(121, 'Cloak of Deception', 2, -200, 100, 'no', 'hero', 'cloakofdeception.jpg', 'Labyrinth of Ruin'),
(122, 'Bow of the Eclipse', 2, -250, 125, 'no', 'hero', 'bowoftheeclipse.jpg', 'Labyrinth of Ruin'),
(123, 'Black Iron Helm', 2, -150, 75, 'no', 'hero', 'blackironhelm.jpg', 'Labyrinth of Ruin'),
(124, 'Staff of Kellos', 2, -175, 75, 'no', 'hero', 'staffofkellos.jpg', 'Lair of the Wyrm'),
(125, 'Inscribed Robes', 2, -225, 100, 'no', 'hero', 'inscribedrobes.jpg', 'Lair of the Wyrm'),
(126, 'Merciful Boots', 2, -100, 50, 'no', 'hero', 'mercifulboots.jpg', 'Lair of the Wyrm'),
(127, 'Bow of the Sky', 2, -225, 100, 'no', 'hero', 'bowofthesky.jpg', 'Lair of the Wyrm'),
(128, 'Scalemail', 2, -225, 100, 'no', 'hero', 'scalemail.jpg', 'Lair of the Wyrm'),
(129, 'Tival Crystal', 2, -175, 75, 'no', 'hero', 'tivalcrystal.jpg', 'vanilla'),
(130, 'Steel Greatsword', 2, -200, 100, 'no', 'hero', 'steelgreatsword.jpg', 'vanilla'),
(131, 'Platemail', 2, -250, 125, 'no', 'hero', 'platemail.jpg', 'vanilla'),
(132, 'Mace of Kellos', 2, -175, 125, 'no', 'hero', 'maceofkellos.jpg', 'vanilla'),
(133, 'Lightning Strike', 2, -200, 100, 'no', 'hero', 'lightningstrike.jpg', 'vanilla'),
(134, 'Lataria Longbow', 2, -200, 100, 'no', 'hero', 'latarilongbow.jpg', 'vanilla'),
(135, 'Iron-Bound Ring', 2, -150, 75, 'no', 'hero', 'ironboundring.jpg', 'vanilla'),
(136, 'Ice Storm', 2, -150, 75, 'no', 'hero', 'icestorm.jpg', 'vanilla'),
(137, 'Heavy Steel Shield', 2, -100, 50, 'no', 'hero', 'heavysteelshield.jpg', 'vanilla'),
(138, 'Grinding Axe', 2, -175, 75, 'no', 'hero', 'grindingaxe.jpg', 'vanilla'),
(139, 'Elven Cloak', 2, -225, 100, 'no', 'hero', 'elvencloak.jpg', 'vanilla'),
(140, 'Dwarven Firebomb', 2, -175, 75, 'no', 'hero', 'dwarvenfirebomb.jpg', 'vanilla'),
(141, 'Dragontooth Hammer', 2, -250, 125, 'no', 'hero', 'dragontoothhammer.jpg', 'vanilla'),
(142, 'Demonhide Leather', 2, -200, 100, 'no', 'hero', 'demonhideleather.jpg', 'vanilla');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbitems_aquired`
--

CREATE TABLE IF NOT EXISTS `tbitems_aquired` (
  `shop_id` int(3) DEFAULT NULL,
  `shop_player` varchar(18) DEFAULT NULL,
  `shop_xp` varchar(2) DEFAULT NULL,
  `shop_gold` int(4) DEFAULT NULL,
  `shop_market_bought` varchar(30) DEFAULT NULL,
  `shop_market_sold` varchar(23) DEFAULT NULL,
  `shop_goldsold` int(2) DEFAULT NULL,
  `shop_relics` varchar(3) DEFAULT NULL,
  `shop_equipped` varchar(3) DEFAULT NULL,
  `shop_skills` varchar(28) DEFAULT NULL,
  `shop_latestdungeon` varchar(26) DEFAULT NULL,
  `shop_notes` varchar(10) DEFAULT NULL,
  `shop_groupid` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbitems_aquired`
--

INSERT INTO `tbitems_aquired` (`shop_id`, `shop_player`, `shop_xp`, `shop_gold`, `shop_market_bought`, `shop_market_sold`, `shop_goldsold`, `shop_relics`, `shop_equipped`, `shop_skills`, `shop_latestdungeon`, `shop_notes`, `shop_groupid`) VALUES
(74, 'Leoric of the Book', '', 25, '', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 25),
(5, 'Leoric of the Book', '1', 25, '', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 14),
(6, 'Laughin Buldar', '1', 25, '', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 14),
(7, 'Tobin Farslayer', '1', 25, '', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 14),
(8, 'Elder Mok', '1', 25, '', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 14),
(16, 'Elder Mok', '', 0, '', '', 0, '', 'yes', 'Prayer of Healing', 'Skipped Campaign Intro', '', 14),
(15, 'Elder Mok', '-1', 0, '', '', 0, '', 'yes', 'Armor of Faith', 'Skipped Campaign Intro', '', 14),
(17, 'Elder Mok', '1', 75, '', '', 0, '', 'yes', '', 'Castle Daerion', '', 14),
(18, 'Tobin Farslayer', '-1', 0, '', '', 0, '', 'yes', 'Accurate', 'Skipped Campaign Intro', '', 14),
(19, 'Tobin Farslayer', '', 0, '', '', 0, '', 'yes', 'Nimble', 'Skipped Campaign Intro', '', 14),
(21, 'Tobin Farslayer', '1', 100, '', '', 0, '', 'yes', '', 'Castle Daerion', '', 14),
(23, 'Laughin Buldar', '', 0, '', '', 0, '', 'yes', 'Rage', 'Skipped Campaign Intro', '', 14),
(24, 'Laughin Buldar', '-1', 0, '', '', 0, '', 'yes', 'Brute', 'Skipped Campaign Intro', '', 14),
(25, 'Laughin Buldar', '1', 0, '', '', 0, '', 'yes', '', 'Castle Daerion', '', 14),
(26, 'Leoric of the Book', '1', 0, '', '', 0, '', 'yes', '', 'Castle Daerion', '', 14),
(31, 'Overlord', '', 0, '', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 14),
(236, 'Tobin Farslayer', '', 0, 'Shield of the Dark God (Relic)', '', 0, 'yes', 'yes', '', 'Death on the Wing', '', 29),
(71, 'Laughin Buldar', '1', 0, '', '', 0, '', 'yes', '', 'The Cardinal''s Plight', '', 14),
(73, 'Overlord', '1', 0, 'Staff of Shadows (Relic)', '', 0, 'yes', 'yes', '', 'The Cardinal''s Plight', '', 14),
(30, 'Overlord', '-1', 0, '', '', 0, '', 'yes', 'Blood Rage', 'Skipped Campaign Intro', '', 14),
(32, 'Overlord', '1', 0, '', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 14),
(33, 'Overlord', '', 0, '', '', 0, '', 'yes', '', 'Castle Daerion', '', 14),
(34, 'Overlord', '2', 0, '', '', 0, '', 'yes', '', 'Castle Daerion', '', 14),
(103, 'Tobin Farslayer', '-1', 0, '', '', 0, '', 'yes', 'Appraisal', '', '', 29),
(104, 'Trenloe the Strong', '-1', 0, '', '', 0, '', 'yes', 'Advance', '', '', 29),
(105, 'Aurim', '-1', 0, '', '', 0, '', 'yes', 'Healing Rain', '', '', 29),
(106, 'Truthseer Kel', '-1', 0, '', '', 0, '', 'yes', 'Fury of Undeath', '', '', 29),
(56, 'Laughin Buldar', '', 0, 'Chipped Greataxe (Berserker)', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 14),
(57, 'Tobin Farslayer', '', 0, 'Yew Shortbow (Wildlander)', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 14),
(109, 'Trenloe the Strong', '1', 0, '', '', 0, '', 'yes', '', 'The Masquerade Ball', '', 29),
(107, 'Overlord', '-1', 0, '', '', 0, '', 'yes', 'Word of Pain', '', '', 29),
(108, 'Truthseer Kel', '', -75, 'Heavy Cloak', '', 0, '', 'yes', '', '', '', 29),
(58, 'Elder Mok', '', 0, 'Iron Mace (Disciple)', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 14),
(59, 'Elder Mok', '', 0, 'Wooden Shield (Disciple)', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 14),
(60, 'Leoric of the Book', '', 0, 'Arcane Bolt (Runemaster)', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 14),
(61, 'Leoric of the Book', '', 0, '', '', 0, '', 'yes', 'Runic Knowledge (Runemaster)', 'Skipped Campaign Intro', '', 14),
(62, 'Leoric of the Book', '-1', 0, '', '', 0, '', 'yes', 'Exploding Rune', 'Skipped Campaign Intro', '', 14),
(63, 'Leoric of the Book', '', -75, 'Leather Armor', '', 0, '', 'yes', '', 'Castle Daerion', '', 14),
(64, 'Tobin Farslayer', '', -75, 'Scorpion Helm', '', 0, '', 'yes', '', 'Castle Daerion', '', 14),
(65, 'Tobin Farslayer', '-1', 0, '', '', 0, '', 'yes', 'Eagle Eyes', 'Castle Daerion', '', 14),
(66, 'Laughin Buldar', '-1', 0, '', '', 0, '', 'yes', 'Counter Attack', 'Castle Daerion', '', 14),
(67, 'Laughin Buldar', '', -50, 'Iron Shield', '', 0, '', 'yes', '', 'Castle Daerion', '', 14),
(68, 'Elder Mok', '', -100, 'Lucky Charm', '', 0, '', 'yes', '', 'Castle Daerion', '', 14),
(69, 'Leoric of the Book', '1', 175, 'Magic Staff', 'Magic Staff', 0, '', 'no', '', 'The Cardinal''s Plight', '', 14),
(70, 'Tobin Farslayer', '1', 0, '', '', 0, '', 'yes', '', 'The Cardinal''s Plight', '', 14),
(72, 'Elder Mok', '1', 50, '', '', 0, '', 'yes', '', 'The Cardinal''s Plight', '', 14),
(75, 'Leoric of the Book', '1', 0, '', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 25),
(76, 'Leoric of the Book', '0', 0, '', '', 0, '', 'yes', 'Runic Knowledge (Runemaster)', 'Skipped Campaign Intro', '', 25),
(77, 'Leoric of the Book', '-1', 0, '', '', 0, '', 'yes', 'Exploding Rune', 'Skipped Campaign Intro', '', 25),
(78, 'Augur Grisom', '1', 25, '', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 25),
(79, 'Augur Grisom', '0', 0, '', '', 0, '', 'yes', 'Stoneskin', 'Skipped Campaign Intro', '', 25),
(80, 'Augur Grisom', '-1', 0, '', '', 0, '', 'yes', 'Drain Spirit', 'Skipped Campaign Intro', '', 25),
(81, 'Tobin Farslayer', '1', 25, '', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 25),
(82, 'Tobin Farslayer', '0', 0, '', '', 0, '', 'yes', 'Greedy', 'Skipped Campaign Intro', '', 25),
(83, 'Tobin Farslayer', '-1', 0, '', '', 0, '', 'yes', 'Appraisal', 'Skipped Campaign Intro', '', 25),
(84, 'Alys Raine', '1', 25, '', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 25),
(85, 'Alys Raine', '0', 0, '', '', 0, '', 'yes', 'Rage', 'Skipped Campaign Intro', '', 25),
(86, 'Alys Raine', '-1', 0, '', '', 0, '', 'yes', 'Brute', 'Skipped Campaign Intro', '', 25),
(87, 'Augur Grisom', '1', 75, '', '', 0, '', 'yes', '', 'A Fat Goblin', '', 25),
(88, 'Leoric of the Book', '1', 25, '', '', 0, '', 'yes', '', 'A Fat Goblin', '', 25),
(89, 'Tobin Farslayer', '1', 100, '', '', 0, '', 'yes', '', 'A Fat Goblin', '', 25),
(90, 'Alys Raine', '1', 0, '', '', 0, '', 'yes', '', 'A Fat Goblin', '', 25),
(91, 'Alys Raine', '', -75, 'Leather Armor', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 25),
(92, 'Leoric of the Book', '', 0, 'Arcane Bolt (Runemaster)', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 25),
(93, 'Alys Raine', '', 0, 'Chipped Greataxe (Berserker)', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 25),
(94, 'Tobin Farslayer', '', 0, 'Lucky Charm (Thief)', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 25),
(95, 'Tobin Farslayer', '', 0, 'Throwing Knives (Thief)', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 25),
(96, 'Augur Grisom', '', 0, 'Oakstaff (Spiritspeaker)', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 25),
(97, 'Overlord', '-1', 0, '', '', 0, '', 'yes', 'Blood Rage', 'Castle Daerion', '', 14),
(98, 'Overlord', '-1', 0, '', '', 0, '', 'yes', 'Web Trap', 'Skipped Campaign Intro', '', 25),
(99, 'Overlord', '1', 0, '', '', 0, '', 'yes', '', 'Skipped Campaign Intro', '', 25),
(110, 'Truthseer Kel', '1', 0, '', '', 0, '', 'yes', '', 'The Masquerade Ball', '', 29),
(111, 'Aurim', '1', 50, '', '', 0, '', 'yes', '', 'The Masquerade Ball', '', 29),
(112, 'Tobin Farslayer', '1', 50, '', '', 0, '', 'yes', '', 'The Masquerade Ball', '', 29),
(113, 'Overlord', '1', 0, 'Bones of Woe (Relic)', '', 0, 'yes', 'yes', '', 'The Masquerade Ball', '', 29),
(114, 'Truthseer Kel', '1', 25, '', '', 0, '', 'yes', '', '**Skipped Campaign Intro**', '', 29),
(115, 'Truthseer Kel', '', 0, 'Reaper''s Scythe (Necromancer)', '', 0, '', 'yes', '', '**Skipped Campaign Intro**', '', 29),
(116, 'Truthseer Kel', '0', 0, '', '', 0, '', 'yes', 'Raise Dead (Necromancer)', '', '', 29),
(117, 'Truthseer Kel', '0', 0, '', '', 0, '', 'yes', 'Reanimate (Necromancer)', '', '', 29),
(118, 'Trenloe the Strong', '', 0, 'Wooden Shield (Knight)', '', 0, '', 'yes', '', '', '', 29),
(119, 'Trenloe the Strong', '', 0, 'Iron Longsword (Knight)', 'Iron Longsword (Knight)', 25, '', 'no', '', '', '', 29),
(120, 'Trenloe the Strong', '0', 0, '', '', 0, '', 'yes', 'Oath of Honor', '', '', 29),
(132, 'Leoric of the Book', '-2', 0, '', '', 0, '', 'yes', 'Iron Will', '', '', 14),
(123, 'Tobin Farslayer', '', 0, 'Lucky Charm (Thief)', '', 0, '', 'yes', '', '', '', 29),
(124, 'Tobin Farslayer', '0', 0, '', '', 0, '', 'yes', 'Greedy', '', '', 29),
(125, 'Aurim', '', 0, 'Oakstaff (Spiritspeaker)', '', 0, '', 'yes', '', '', '', 29),
(127, 'Aurim', '0', 0, '', '', 0, '', 'yes', 'Stoneskin', '', '', 29),
(128, 'Trenloe the Strong', '1', 25, '', '', 0, '', 'yes', '', '**Skipped Campaign Intro**', '', 29),
(129, 'Overlord', '1', 0, '', '', 0, '', 'yes', '', '**Skipped Campaign Intro**', '', 29),
(130, 'Tobin Farslayer', '1', 25, '', '', 0, '', 'yes', '', '**Skipped Campaign Intro**', '', 29),
(131, 'Aurim', '1', 25, '', '', 0, '', 'yes', '', '**Skipped Campaign Intro**', '', 29),
(133, 'Elder Mok', '-2', 0, '', '', 0, '', 'yes', 'Divine Fury', '', '', 14),
(134, 'Elder Mok', '', -75, 'Heavy Cloak', '', 0, '', 'yes', '', 'The Cardinal''s Plight', '', 14),
(135, 'Tobin Farslayer', '', -75, 'Leather Armor', '', 0, '', 'yes', '', 'The Cardinal''s Plight', '', 14),
(136, 'Overlord', '-1', 0, '', '', 0, '', 'yes', 'Explosive Runes', 'The Cardinal''s Plight', '', 14),
(137, 'Overlord', '-1', 0, '', '', 0, '', 'yes', 'Web Trap', 'The Cardinal''s Plight', '', 14),
(138, 'Laughin Buldar', '1', 50, '', '', 0, '', 'yes', '', 'The Masquerade Ball', '', 14),
(139, 'Leoric of the Book', '1', 50, '', '', 0, '', 'yes', '', 'The Masquerade Ball', '', 14),
(140, 'Leoric of the Book', '', 0, 'Fortuna''s Dice (Relic)', '', 0, 'yes', 'yes', '', 'The Masquerade Ball', '', 14),
(141, 'Tobin Farslayer', '1', 0, '', '', 0, '', 'yes', '', 'The Masquerade Ball', '', 14),
(142, 'Elder Mok', '1', 100, '', '', 0, '', 'yes', '', 'The Masquerade Ball', '', 14),
(143, 'Overlord', '1', 0, '', '', 0, '', 'yes', '', 'The Masquerade Ball', '', 14),
(144, 'Tobin Farslayer', '', 0, 'Sling', '', 0, '', 'yes', '', 'The Masquerade Ball', '', 29),
(237, 'Aurim', '1', 75, '', '', 0, 'yes', 'yes', '', 'Death on the Wing', '', 29),
(271, 'Shiver', '', -175, 'Bearded Axe', '', 0, '', 'yes', '', 'First Blood', '', 38),
(270, 'Shiver', '', 0, 'Rune Plate', '', 0, '', 'yes', '', 'First Blood', '', 38),
(269, 'Shiver', '-1', 0, '', '', 0, '', 'yes', 'Exploding Rune', 'First Blood', '', 38),
(235, 'Tobin Farslayer', '1', 50, '', '', 0, 'yes', 'yes', '', 'Death on the Wing', '', 29),
(234, 'Overlord', '1', 0, '', '', 0, '', 'yes', '', 'Death on the Wing', '', 29),
(233, 'Trenloe the Strong', '1', 50, '', '', 0, 'yes', 'yes', '', 'Death on the Wing', '', 29),
(268, 'Shiver', '1', 125, '', '', 0, 'yes', 'yes', '', 'First Blood', '', 38),
(267, 'Orkell the Swift', '', -125, 'Belt of Strength', '', 0, '', 'yes', '', 'First Blood', '', 39),
(266, 'Ashrian', '1', 0, '', '', 0, 'yes', 'yes', '', 'First Blood', '', 39),
(228, 'Aurim', '-1', 0, '', '', 0, '', 'yes', 'Drain Spirit', 'The Masquerade Ball', '', 29),
(229, 'Trenloe the Strong', '', -100, 'Steel Broadsword', '', 0, '', 'yes', '', 'The Masquerade Ball', '', 29),
(230, 'Aurim', '', -75, 'Leather Armor', '', 0, '', 'yes', '', 'The Masquerade Ball', '', 29),
(231, 'Tobin Farslayer', '', 0, 'Throwing Knives (Thief)', 'Throwing Knives (Thief)', 25, '', 'no', '', '**Skipped Campaign Intro**', '', 29),
(232, 'Truthseer Kel', '1', 0, '', '', 0, 'yes', 'yes', '', 'Death on the Wing', '', 29),
(265, 'Tobin Farslayer', '1', 25, '', '', 0, 'yes', 'yes', '', 'First Blood', '', 39),
(264, 'Overlord', '1', 0, '', '', 0, '', 'yes', '', 'First Blood', '', 39),
(263, 'Orkell the Swift', '1', 50, '', '', 0, 'yes', 'yes', '', 'First Blood', '', 39),
(262, 'Dezra the Vile', '1', 25, '', '', 0, 'yes', 'yes', '', 'First Blood', '', 39),
(261, 'Ashrian', '0', 0, '', '', 0, '', 'yes', 'Stoneskin', '**Starting Gear**', '', 39),
(260, 'Ashrian', '', 0, 'Oakstaff (Spiritspeaker)', '', 0, '', 'yes', '', '**Starting Gear**', '', 39),
(259, 'Tobin Farslayer', '0', 0, '', '', 0, '', 'yes', 'Black Widow''s Web', '**Starting Gear**', '', 39),
(258, 'Tobin Farslayer', '0', 0, '', '', 0, '', 'yes', 'Set Trap', '**Starting Gear**', '', 39),
(257, 'Tobin Farslayer', '', 0, 'Hunting Knife (Stalker)', '', 0, '', 'yes', '', '**Starting Gear**', '', 39),
(256, 'Orkell the Swift', '0', 0, '', '', 0, '', 'yes', 'Rage', '**Starting Gear**', '', 39),
(242, 'Laughin Buldar', '-2', 0, '', '', 0, '', 'yes', 'Whirlwind', 'The Masquerade Ball', '', 14),
(243, 'Laughin Buldar', '', -100, 'Iron Battleaxe', '', 0, '', 'yes', '', 'The Masquerade Ball', '', 14),
(244, 'Tobin Farslayer', '-2', 0, '', '', 0, '', 'yes', 'Bow Mastery', 'The Masquerade Ball', '', 14),
(255, 'Orkell the Swift', '', 0, 'Chipped Greataxe (Berserker)', '', 0, '', 'yes', '', '**Starting Gear**', '', 39),
(254, 'Dezra the Vile', '0', 0, '', '', 0, '', 'yes', 'Reanimate (Necromancer)', '**Starting Gear**', '', 39),
(253, 'Dezra the Vile', '0', 0, '', '', 0, '', 'yes', 'Raise Dead (Necromancer)', '**Starting Gear**', '', 39),
(252, 'Dezra the Vile', '', 0, 'Reaper''s Scythe (Necromancer)', '', 0, '', 'yes', '', '**Starting Gear**', '', 39);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbplayerlist`
--

CREATE TABLE IF NOT EXISTS `tbplayerlist` (
  `player_id` int(2) DEFAULT NULL,
  `player_username` varchar(14) DEFAULT NULL,
  `player_handle` varchar(19) DEFAULT NULL,
  `player_password` varchar(14) DEFAULT NULL,
  `player_timestamp` varchar(19) DEFAULT NULL,
  `created_by` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbplayerlist`
--

INSERT INTO `tbplayerlist` (`player_id`, `player_username`, `player_handle`, `player_password`, `player_timestamp`, `created_by`) VALUES
(1, 'Tundrra', 'Tundrra', 'testDescent123', '2014-11-25 19:50:04', 'Tundrra'),
(2, '', 'Nimm', '', '2014-09-10 11:51:53', 'Tundrra'),
(3, '', 'Gloki', '', '2014-09-10 11:51:53', 'Tundrra'),
(4, '', 'Djarum', '', '2014-09-10 11:51:53', 'Tundrra'),
(5, '', 'Aaron', '', '2014-09-10 11:51:53', 'Tundrra'),
(6, '', 'Lazyone', '', '2014-09-10 11:52:20', 'Tundrra'),
(7, 'Alcyone', 'Alcyone', 'booger', '2014-11-25 19:59:14', 'Alcyone'),
(13, '', 'Testplayer', 'Descent', '2014-11-12 15:45:04', 'Testplayer'),
(12, '', 'Shared/Rotated Role', '', '2014-10-01 19:22:50', 'ALL'),
(14, '', 'Talolan', '', '2014-11-12 15:54:53', ''),
(15, '', 'Lasarian', '', '2014-11-12 15:57:33', ''),
(16, '', 'Bammer', '', '2014-11-12 15:57:47', ''),
(17, '', 'Kermit', '', '2014-11-12 15:59:06', ''),
(18, '', 'Phelaia', '', '2014-11-12 15:59:16', ''),
(19, '', 'Santhus', '', '2014-11-12 15:59:29', ''),
(20, 'Eagletsi', 'Eagletsi', 'descent2014', '2014-11-19 18:06:07', 'Eagletsi'),
(21, 'Lawpsided', 'Lawpsided', 'DescentJoseph', '2014-11-25 19:53:00', 'Lawpsided'),
(22, '', 'Rachael', '', '2014-11-26 15:54:38', 'Lawpsided'),
(23, '', 'Joseph', '', '2014-11-26 15:54:46', 'Lawpsided'),
(24, '', 'James', '', '2014-11-26 15:54:51', 'Lawpsided'),
(25, '', 'Raymond', '', '2014-11-26 15:54:56', 'Lawpsided'),
(26, '', 'John', '', '2014-11-26 15:55:01', 'Lawpsided'),
(27, '', 'Tyler', '', '2014-11-26 15:55:08', 'Lawpsided'),
(28, '', 'roxanne', '', '2014-11-26 16:03:23', 'Alcyone'),
(29, '', 'jon', '', '2014-11-26 16:03:59', 'Alcyone'),
(30, '', 'simon', '', '2014-11-26 16:06:05', 'Alcyone'),
(32, '', 'tundrra', '', '2014-11-26 21:42:26', 'Alcyone'),
(33, 'michaelsciscoe', 'michaelsciscoe', 'descent2014', '2014-11-27 07:07:47', 'michaelsciscoe'),
(34, 'dllrt', 'dllrt', 'descent2014', '2014-11-27 07:07:47', 'dllrt'),
(35, '', 'tundrra', '', '2014-11-27 07:08:29', 'michaelsciscoe'),
(36, '', 'alcyone', '', '2014-11-27 07:08:39', 'michaelsciscoe'),
(37, '', 'Tim', '', '2014-11-27 07:44:14', 'dllrt'),
(38, '', 'Maaike', '', '2014-11-27 07:44:22', 'dllrt'),
(39, '', 'Frauke', '', '2014-11-27 07:44:28', 'dllrt'),
(40, '', 'Talolan', '', '2014-11-27 08:17:03', 'Alcyone'),
(41, '', 'Lasarian ', '', '2014-11-27 08:17:14', 'Alcyone'),
(42, '', 'steven', '', '2014-12-02 08:33:53', 'Alcyone'),
(43, '', 'Riveni', '', '2014-12-02 08:39:54', 'Alcyone'),
(44, '', 'Bammer', '', '2014-12-02 14:32:18', 'Alcyone');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbquests`
--

CREATE TABLE IF NOT EXISTS `tbquests` (
  `quest_id` int(2) DEFAULT NULL,
  `quest_timestamp` varchar(16) DEFAULT NULL,
  `quest_game_id` int(2) DEFAULT NULL,
  `quest_ggrp_name` varchar(23) DEFAULT NULL,
  `quest_name` varchar(26) DEFAULT NULL,
  `quest_winner` varchar(13) DEFAULT NULL,
  `quest_encount_1` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbquests`
--

INSERT INTO `tbquests` (`quest_id`, `quest_timestamp`, `quest_game_id`, `quest_ggrp_name`, `quest_name`, `quest_winner`, `quest_encount_1`) VALUES
(23, '11/7/2014 17:40', 31, 'Alcyone''s Test Group', 'Ruinous Whispers', 'Heroes Win', 'Overlord Wins'),
(22, '11/6/2014 21:45', 14, 'NORdelving', 'The Masquerade Ball', 'Heroes Win', 'Heroes Win'),
(18, '10/27/2014 7:34', 25, 'Brothers in Arms', 'A Fat Goblin', 'Heroes Win', 'Overlord Wins'),
(17, '10/27/2014 7:25', 25, 'Brothers in Arms', 'Skipped Campaign Intro', 'No Winner', 'No Winner'),
(16, '10/23/2014 21:26', 14, 'NORdelving', 'The Cardinal''s Plight', 'Overlord Wins', 'Heroes Win'),
(20, '11/5/2014 13:12', 29, 'Brothers in Arms', '**Skipped Campaign Intro**', 'No Winner', 'No Winner'),
(13, '10/3/2014 11:10', 14, 'NORdelving', 'Castle Daerion', 'Overlord Wins', 'Heroes Win'),
(21, '11/5/2014 15:29', 29, 'Brothers in Arms', 'The Masquerade Ball', 'Overlord Wins', 'Overlord Wins'),
(12, '10/3/2014 11:10', 14, 'NORdelving', 'Skipped Campaign Intro', 'none', 'none'),
(24, '11/9/2014 14:40', 32, 'Test Creation One', '**Starting Gear**', 'No Winner', 'No Winner'),
(25, '11/12/2014 10:41', 32, 'Test Creation One', 'A Demostration', 'Heroes Win', 'Heroes Win'),
(26, '11/12/2014 10:54', 33, 'Test Creation One', '**Starting Gear**', 'No Winner', 'No Winner'),
(27, '11/12/2014 12:28', 31, 'Alcyone''s Test Group', 'Barrow of Barris', 'Heroes Win', 'Heroes Win'),
(28, '11/12/2014 16:01', 35, 'Example Game', '**Starting Gear**', 'No Winner', 'No Winner'),
(29, '11/12/2014 16:08', 35, 'Example Game', 'First Blood', 'Heroes Win', 'Heroes Win'),
(30, '11/14/2014 10:44', 35, 'Example Game', 'A Fat Goblin', 'Overlord Wins', 'Overlord Wins'),
(31, '11/19/2014 15:40', 29, 'Brothers in Arms', 'Death on the Wing', 'Heroes Win', 'Heroes Win'),
(32, '11/27/2014 7:11', 37, 'Test Creation One', 'Gold Digger', 'Heroes Win', 'Overlord Wins'),
(33, '11/27/2014 8:19', 39, 'Test game - delete me -', '**Starting Gear**', 'No Winner', 'No Winner'),
(34, '11/27/2014 8:25', 39, 'Test game - delete me -', 'First Blood', 'Heroes Win', 'Heroes Win'),
(35, '11/27/2014 11:01', 38, 'Mancave', 'First Blood', 'Heroes Win', 'No Winner');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbskills`
--

CREATE TABLE IF NOT EXISTS `tbskills` (
  `skill_id` int(3) DEFAULT NULL,
  `skill_name` varchar(28) DEFAULT NULL,
  `skill_type` varchar(8) DEFAULT NULL,
  `skill_class` varchar(15) DEFAULT NULL,
  `skill_cost` int(2) DEFAULT NULL,
  `skill_card` varchar(28) DEFAULT NULL,
  `skill_expansion` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbskills`
--

INSERT INTO `tbskills` (`skill_id`, `skill_name`, `skill_type`, `skill_class`, `skill_cost`, `skill_card`, `skill_expansion`) VALUES
(1, 'Accurate', 'Scout', 'Wildlander', -1, 'accurate.jpg', 'vanilla'),
(2, 'Nimble', 'Scout', 'Wildlander', 0, 'nimble.jpg', 'vanilla'),
(10, 'Brute', 'Warrior', 'Berserker', -1, 'brute.jpg', 'vanilla'),
(11, 'Raise Dead (Necromancer)', 'Mage', 'Necromancer', 0, 'raisedeadnecromancer.jpg', 'vanilla'),
(12, 'Reanimate (Necromancer)', 'Mage', 'Necromancer', 0, 'reanimatenecromancer.jpg', 'vanilla'),
(13, 'Runic Knowledge (Runemaster)', 'Mage', 'Runemaster', 0, 'runicknowledgerunemaster.jpg', 'vanilla'),
(14, 'Prayer of Healing', 'Healer', 'Disciple', 0, 'prayerofhealing.jpg', 'vanilla'),
(15, 'Armor of Faith', 'Healer', 'Disciple', -1, 'armoffaith.jpg', 'vanilla'),
(16, 'Blessed Strike', 'Healer', 'Disciple', -1, 'blessedstrike.jpg', 'vanilla'),
(17, 'Cleansing Touch', 'Healer', 'Disciple', -1, 'cleansingtouch.jpg', 'vanilla'),
(18, 'Divine Fury', 'Healer', 'Disciple', -2, 'divinefury.jpg', 'vanilla'),
(19, 'Prayer of Peace', 'Healer', 'Disciple', -2, 'prayerofpeace.jpg', 'vanilla'),
(20, 'Time of Need', 'Healer', 'Disciple', -2, 'timeofneed.jpg', 'vanilla'),
(21, 'Holy Power', 'Healer', 'Disciple', -3, 'holypower.jpg', 'vanilla'),
(22, 'Radiant Light', 'Healer', 'Disciple', -3, 'radiantlight.jpg', 'vanilla'),
(23, 'Nimble', 'Scout', 'Wildlander', 0, 'nimble.jpg', 'vanilla'),
(25, 'Danger Sense', 'Scout', 'Wildlander', -1, 'dangersense.jpg', 'vanilla'),
(26, 'Eagle Eyes', 'Scout', 'Wildlander', -1, 'eagleeyes.jpg', 'vanilla'),
(27, 'Bow Mastery', 'Scout', 'Wildlander', -2, 'bowmastery.jpg', 'vanilla'),
(28, 'First Strike', 'Scout', 'Wildlander', -2, 'firststrike.jpg', 'vanilla'),
(29, 'Fleet of Foot', 'Scout', 'Wildlander', -2, 'fleetoffoot.jpg', 'vanilla'),
(30, 'Black Arrow', 'Scout', 'Wildlander', -3, 'blackarrow.jpg', 'vanilla'),
(31, 'Running Shot', 'Scout', 'Wildlander', -3, 'runningshot.jpg', 'vanilla'),
(32, 'Counter Attack', 'Warrior', 'Berserker', -1, 'counterattack.jpg', 'vanilla'),
(33, 'Rage', 'Warrior', 'Berserker', 0, 'rage.jpg', 'vanilla'),
(35, 'Cripple', 'Warrior', 'Berserker', -1, 'cripple.jpg', 'vanilla'),
(36, 'Charge', 'Warrior', 'Berserker', -2, 'charge.jpg', 'vanilla'),
(37, 'Weapon Mastery', 'Warrior', 'Berserker', -2, 'weaponmastery.jpg', 'vanilla'),
(38, 'Whirlwind', 'Warrior', 'Berserker', -2, 'whirlwind.jpg', 'vanilla'),
(39, 'Death Rage', 'Warrior', 'Berserker', -3, 'deathrage.jpg', 'vanilla'),
(40, 'Execute', 'Warrior', 'Berserker', -3, 'excute.jpg', 'vanilla'),
(43, 'Corpse Blast', 'Mage', 'Necromancer', -1, 'corpseblast.jpg', 'vanilla'),
(44, 'Fury of Undeath', 'Mage', 'Necromancer', -1, 'furyofundeath.jpg', 'vanilla'),
(45, 'Deathly Haste', 'Mage', 'Necromancer', -1, 'deathlyhaste.jpg', 'vanilla'),
(46, 'Dark Pact', 'Mage', 'Necromancer', -2, 'darkpact.jpg', 'vanilla'),
(47, 'Vampiric Blood', 'Mage', 'Necromancer', -2, 'vampiricblood.jpg', 'vanilla'),
(48, 'Undead Might', 'Mage', 'Necromancer', -2, 'undeadmight.jpg', 'vanilla'),
(49, 'Army of Death', 'Mage', 'Necromancer', -3, 'armyofdeath.jpg', 'vanilla'),
(50, 'Dying Command', 'Mage', 'Necromancer', -3, 'dyingcommand.jpg', 'vanilla'),
(51, 'Soothing Insight', 'Healer', 'Prophet', 0, 'soothinginsight.jpg', 'vanilla'),
(52, 'Battle Vision', 'Healer', 'Prophet', -1, 'battlevision.jpg', 'vanilla'),
(53, 'Forewarning', 'Healer', 'Prophet', -1, 'forewarning.jpg', 'vanilla'),
(54, 'Grim Fate', 'Healer', 'Prophet', -1, 'grimfate.jpg', 'vanilla'),
(55, 'All-Seeing', 'Healer', 'Prophet', -2, 'allseeing.jpg', 'vanilla'),
(56, 'Lifeline', 'Healer', 'Prophet', -2, 'lifeline.jpg', 'vanilla'),
(57, 'Victory Foretold', 'Healer', 'Prophet', -2, 'victoryforetold.jpg', 'vanilla'),
(58, 'Focused Insights', 'Healer', 'Prophet', -3, 'focusedinsights.jpg', 'vanilla'),
(59, 'Omniscience', 'Healer', 'Prophet', -3, 'omniscience.jpg', 'vanilla'),
(60, 'Brew Elixir', 'Healer', 'Apothecary', 0, 'brewelixir.jpg', 'Labyrinth of Ruin'),
(61, 'Concoction', 'Healer', 'Apothecary', -1, 'concoction.jpg', 'Labyrinth of Ruin'),
(62, 'Herbal Lore', 'Healer', 'Apothecary', -1, 'herballore.jpg', 'Labyrinth of Ruin'),
(63, 'Inky Substance', 'Healer', 'Apothecary', -1, 'inkysubstance.jpg', 'Labyrinth of Ruin'),
(64, 'Bottled Courage', 'Healer', 'Apothecary', -2, 'bottledcourage.jpg', 'Labyrinth of Ruin'),
(65, 'Protective Tonic', 'Healer', 'Apothecary', -2, 'protectivetonic.jpg', 'Labyrinth of Ruin'),
(66, 'Secret Formula', 'Healer', 'Apothecary', -2, 'secretformula.jpg', 'Labyrinth of Ruin'),
(67, 'Hidden Stash', 'Healer', 'Apothecary', -3, 'hiddenstash.jpg', 'Labyrinth of Ruin'),
(68, 'Potent Remedies', 'Healer', 'Apothecary', -3, 'potentremedies.jpg', 'Labyrinth of Ruin'),
(69, 'Stoneskin', 'Healer', 'Spiritspeaker', 0, 'stoneskin.jpg', 'vanilla'),
(70, 'Drain Spirit', 'Healer', 'Spiritspeaker', -1, 'drainspirit.jpg', 'vanilla'),
(71, 'Healing Rain', 'Healer', 'Spiritspeaker', -1, 'healingrain.jpg', 'vanilla'),
(72, 'Shared Pain', 'Healer', 'Spiritspeaker', -1, 'sharedpain.jpg', 'vanilla'),
(73, 'Cloud of Mist', 'Healer', 'Spiritspeaker', -2, 'cloudofmist.jpg', 'vanilla'),
(74, 'Nature''s Bounty', 'Healer', 'Spiritspeaker', -2, 'naturesbounty.jpg', 'vanilla'),
(75, 'Tempest', 'Healer', 'Spiritspeaker', -2, 'tempest.jpg', 'vanilla'),
(76, 'Ancestor Spirits', 'Healer', 'Spiritspeaker', -3, 'ancestorspirits.jpg', 'vanilla'),
(77, 'Vigor', 'Healer', 'Spiritspeaker', -3, 'vigor.jpg', 'vanilla'),
(78, 'Summoned Stone', 'Mage', 'Geomancer', 0, 'summonedstone.jpg', 'Lair of the Wyrm'),
(79, 'Terracall', 'Mage', 'Geomancer', 0, 'terracall.jpg', 'Lair of the Wyrm'),
(80, 'Earthen Anguish', 'Mage', 'Geomancer', -1, 'earthenanguish.jpg', 'Lair of the Wyrm'),
(81, 'Quaking Word', 'Mage', 'Geomancer', -1, 'quakingword.jpg', 'Lair of the Wyrm'),
(82, 'Stone Tonuge', 'Mage', 'Geomancer', -1, 'stonetongue.jpg', 'Lair of the Wyrm'),
(83, 'Ley Line', 'Mage', 'Geomancer', -2, 'leyline.jpg', 'Lair of the Wyrm'),
(84, 'Molten Fury', 'Mage', 'Geomancer', -2, 'moltenfury.jpg', 'Lair of the Wyrm'),
(85, 'Ways of Stone', 'Mage', 'Geomancer', -2, 'waysofstone.jpg', 'Lair of the Wyrm'),
(86, 'Gravity Spike', 'Mage', 'Geomancer', -3, 'gavityspike.jpg', 'Lair of the Wyrm'),
(87, 'Cataclysm', 'Mage', 'Geomancer', -3, 'cataclysm.jpg', 'Lair of the Wyrm'),
(88, 'Enfeebling Hex', 'Mage', 'Hexer', 0, 'enfeeblinghex.jpg', 'Labyrinth of Ruin'),
(89, 'Affliction', 'Mage', 'Hexer', -1, 'affliction.jpg', 'Labyrinth of Ruin'),
(90, 'Plague Spasm', 'Mage', 'Hexer', -1, 'plaguespasm.jpg', 'Labyrinth of Ruin'),
(91, 'Viral Hex', 'Mage', 'Hexer', -1, 'viralhex.jpg', 'Labyrinth of Ruin'),
(92, 'Crippling Curse', 'Mage', 'Hexer', -2, 'cripplingcurse.jpg', 'Labyrinth of Ruin'),
(93, 'Fel Command', 'Mage', 'Hexer', -2, 'felcommand.jpg', 'Labyrinth of Ruin'),
(94, 'Internal Rot', 'Mage', 'Hexer', -2, 'internalrot.jpg', 'Labyrinth of Ruin'),
(95, 'Accursed Arms', 'Mage', 'Hexer', -3, 'accursedarms.jpg', 'Labyrinth of Ruin'),
(96, 'Plague Cloud', 'Mage', 'Hexer', -3, 'plaguecloud.jpg', 'Labyrinth of Ruin'),
(98, 'Exploding Rune', 'Mage', 'Runemaster', -1, 'explodingrune.jpg', 'vanilla'),
(99, 'Ghost Armor', 'Mage', 'Runemaster', -1, 'ghostarmor.jpg', 'vanilla'),
(100, 'Inscribe Rune', 'Mage', 'Runemaster', -1, 'inscriberune.jpg', 'vanilla'),
(101, 'Iron Will', 'Mage', 'Runemaster', -2, 'ironwill.jpg', 'vanilla'),
(102, 'Rune Mastery', 'Mage', 'Runemaster', -2, 'runemastery.jpg', 'vanilla'),
(103, 'Runic Sorcery', 'Mage', 'Runemaster', -2, 'runesorcery.jpg', 'vanilla'),
(104, 'Break the Rune', 'Mage', 'Runemaster', -3, 'breaktherune.jpg', 'vanilla'),
(105, 'Quick Casting', 'Mage', 'Runemaster', -3, 'quickcasting.jpg', 'vanilla'),
(106, 'Exploit', 'Scout', 'Stalker', -1, 'exploit.jpg', 'The Trollfens'),
(107, 'Hunter''s Mark', 'Scout', 'Stalker', -1, 'huntersmark.jpg', 'The Trollfens'),
(108, 'Makeshift Trap', 'Scout', 'Stalker', -1, 'makeshifttrap.jpg', 'The Trollfens'),
(109, 'Easy Prey', 'Scout', 'Stalker', -2, 'easyprey.jpg', 'The Trollfens'),
(110, 'Lay of the Land', 'Scout', 'Stalker', -2, 'layoftheland.jpg', 'The Trollfens'),
(111, 'Poison Barbs', 'Scout', 'Stalker', -2, 'poisonbarbs.jpg', 'The Trollfens'),
(112, 'Ambush', 'Scout', 'Stalker', -3, 'ambush.jpg', 'The Trollfens'),
(113, 'Upper Hand', 'Scout', 'Stalker', -3, 'upperhand.jpg', 'The Trollfens'),
(114, 'Black Widow''s Web', 'Scout', 'Stalker', 0, 'blackwidowsweb.jpg', 'The Trollfens'),
(115, 'Set Trap', 'Scout', 'Stalker', 0, 'settrap.jpg', 'The Trollfens'),
(116, 'Greedy', 'Scout', 'Thief', 0, 'greedy.jpg', 'vanilla'),
(117, 'Appraisal', 'Scout', 'Thief', -1, 'appraisal.jpg', 'vanilla'),
(118, 'Dirty Tricks', 'Scout', 'Thief', -1, 'dirtytricks.jpg', 'vanilla'),
(119, 'Sneaky', 'Scout', 'Thief', -1, 'sneaky.jpg', 'vanilla'),
(120, 'Caltrops', 'Scout', 'Thief', -2, 'caltrops.jpg', 'vanilla'),
(121, 'Tumble', 'Scout', 'Thief', -2, 'tumble.jpg', 'vanilla'),
(122, 'Unseen', 'Scout', 'Thief', -2, 'unseen.jpg', 'vanilla'),
(123, 'Bushwhack', 'Scout', 'Thief', -3, 'bushwhack.jpg', 'vanilla'),
(124, 'Luck', 'Scout', 'Thief', -3, 'lurk.jpg', 'vanilla'),
(125, 'Delver', 'Scout', 'Treasure Hunter', 0, 'delver.jpg', 'Labyrinth of Ruin'),
(126, 'Dungeoneer', 'Scout', 'Treasure Hunter', -1, 'dungeoneer.jpg', 'Labyrinth of Ruin'),
(127, 'Gold Rush', 'Scout', 'Treasure Hunter', -1, 'goldrush.jpg', 'Labyrinth of Ruin'),
(128, 'Survey', 'Scout', 'Treasure Hunter', -1, 'survey.jpg', 'Labyrinth of Ruin'),
(129, 'Guard the Spoils', 'Scout', 'Treasure Hunter', -2, 'guardthespoils.jpg', 'Labyrinth of Ruin'),
(130, 'Lure of Fortune', 'Scout', 'Treasure Hunter', -2, 'lureoffortune.jpg', 'Labyrinth of Ruin'),
(131, 'Sleight of Hand', 'Scout', 'Treasure Hunter', -2, 'sleightofhand.jpg', 'Labyrinth of Ruin'),
(132, 'Finder''s Keepers', 'Scout', 'Treasure Hunter', -3, 'finderskeepers.jpg', 'Labyrinth of Ruin'),
(133, 'Trail of Riches', 'Scout', 'Treasure Hunter', -3, 'trailofriches.jpg', 'Labyrinth of Ruin'),
(134, 'Wolf', 'Warrior', 'Beastmaster', 0, 'wolfbeastmaster.jpg', 'Labyrinth of Ruin'),
(135, 'Bound by the Hunt', 'Warrior', 'Beastmaster', 0, 'boundbythehunt.jpg', 'Labyrinth of Ruin'),
(136, 'Bestial Rage', 'Warrior', 'Beastmaster', -1, 'bestialrage.jpg', 'Labyrinth of Ruin'),
(137, 'Stalker', 'Warrior', 'Beastmaster', -1, 'stalker.jpg', 'Labyrinth of Ruin'),
(138, 'Survivalist', 'Warrior', 'Beastmaster', -1, 'survivalist.jpg', 'Labyrinth of Ruin'),
(139, 'Feral Frenzy', 'Warrior', 'Beastmaster', -2, 'feralfrenzy.jpg', 'Labyrinth of Ruin'),
(140, 'Savagery', 'Warrior', 'Beastmaster', -2, 'savagery.jpg', 'Labyrinth of Ruin'),
(141, 'Shadow Hunter', 'Warrior', 'Beastmaster', -2, 'shadowhunter.jpg', 'Labyrinth of Ruin'),
(142, 'Changing Skins', 'Warrior', 'Beastmaster', -3, 'changingskins.jpg', 'Labyrinth of Ruin'),
(143, 'Predator', 'Warrior', 'Beastmaster', -3, 'predator.jpg', 'Labyrinth of Ruin'),
(144, 'Valor of Heroes', 'Warrior', 'Champion', 0, 'valorofheroes.jpg', 'Lair of the Wyrm'),
(145, 'A Living Legend', 'Warrior', 'Champion', -1, 'alivinglegend.jpg', 'Lair of the Wyrm'),
(146, 'Glory of Battle', 'Warrior', 'Champion', -1, 'gloryofbattle.jpg', 'Lair of the Wyrm'),
(147, 'Inspiring Presence', 'Warrior', 'Champion', -1, 'inspiringpresence.jpg', 'Lair of the Wyrm'),
(148, 'Motivating Charge', 'Warrior', 'Champion', -2, 'motivatingcharge.jpg', 'Lair of the Wyrm'),
(149, 'No Mercy', 'Warrior', 'Champion', -2, 'nomercy.jpg', 'Lair of the Wyrm'),
(150, 'Stoic Resolve', 'Warrior', 'Champion', -2, 'stoicresolve.jpg', 'Lair of the Wyrm'),
(151, 'For the Cause', 'Warrior', 'Champion', -3, 'forthecause.jpg', 'Lair of the Wyrm'),
(152, 'Valorous Strike', 'Warrior', 'Champion', -3, 'valorousstrike.jpg', 'Lair of the Wyrm'),
(153, 'Oath of Honor', 'Warrior', 'Knight', 0, 'oathofhonor.jpg', 'vanilla'),
(154, 'Advance', 'Warrior', 'Knight', -1, 'advance.jpg', 'vanilla'),
(155, 'Challenge', 'Warrior', 'Knight', -1, 'challenge.jpg', 'vanilla'),
(156, 'Defend', 'Warrior', 'Knight', -1, 'defend.jpg', 'vanilla'),
(157, 'Defense Training', 'Warrior', 'Knight', -2, 'defensetraining.jpg', 'vanilla'),
(158, 'Guard', 'Warrior', 'Knight', -2, 'guard.jpg', 'vanilla'),
(159, 'Shield Slam', 'Warrior', 'Knight', -2, 'shieldslam.jpg', 'vanilla'),
(160, 'Inspiration', 'Warrior', 'Knight', -3, 'inspiration.jpg', 'vanilla'),
(161, 'Stalwart', 'Warrior', 'Knight', -3, 'stalwart.jpg', 'vanilla'),
(162, 'Bloodlust', 'Overlord', 'Warlord', -2, 'bloodlust.jpg', 'vanilla'),
(163, 'Bloodrage', 'Overlord', 'Warlord', -1, 'bloodrage.jpg', 'vanilla'),
(164, 'Outbreak', 'Overlord', 'Infector', -2, 'outbreak.jpg', 'The Trollfens'),
(165, 'Virulent Infection', 'Overlord', 'Infector', -1, 'virulentinfection.jpg', 'The Trollfens'),
(166, 'Adaptive Contagion', 'Overlord', 'Infector', -1, 'adaptivecontagion.jpg', 'The Trollfens'),
(167, 'Airborne', 'Overlord', 'Infector', -1, 'airborne.jpg', 'The Trollfens'),
(168, 'Contamnated', 'Overlord', 'Infector', -1, 'contaminated.jpg', 'The Trollfens'),
(169, 'Dark Host', 'Overlord', 'Infector', -3, 'darkhost.jpg', 'The Trollfens'),
(170, 'Tainted Blow', 'Overlord', 'Infector', -2, 'taintedblow.jpg', 'The Trollfens'),
(171, 'Diabolic Power', 'Overlord', 'Magus', -3, 'diabolicpower.jpg', 'vanilla'),
(172, 'Rise Again', 'Overlord', 'Magus', -2, 'riseagain.jpg', 'vanilla'),
(173, 'Unholy Ritual', 'Overlord', 'Magus', -1, 'unholyritual.jpg', 'vanilla'),
(174, 'Word of Despair', 'Overlord', 'Magus', -2, 'wordofdespair.jpg', 'vanilla'),
(175, 'Word of Pain', 'Overlord', 'Magus', -1, 'wordofpain.jpg', 'vanilla'),
(176, 'Toxic Reprisal', 'Overlord', 'Overlord Reward', 0, 'toxicreprisal.jpg', 'The Trollfens'),
(177, 'Secrets of Flesh', 'Overlord', 'Overlord Reward', 0, 'secretsofflesh.jpg', 'The Trollfens'),
(178, 'Offertory Affliction', 'Overlord', 'Overlord Reward', 0, 'offertoryaffliction.jpg', 'The Trollfens'),
(179, 'Trading Pains', 'Overlord', 'Punisher', -1, 'tradingpains.jpg', 'Lair of the Wyrm'),
(180, 'Blood Bargaining', 'Overlord', 'Punisher', -3, 'bloodbargaining.jpg', 'Lair of the Wyrm'),
(181, 'Exploit Weakness', 'Overlord', 'Punisher', -2, 'exploitweakness.jpg', 'Lair of the Wyrm'),
(182, 'No Rest for the Wicked', 'Overlord', 'Punisher', -1, 'norestforthewicked.jpg', 'Lair of the Wyrm'),
(183, 'Price of Prevention', 'Overlord', 'Punisher', -2, 'priceofprevention.jpg', 'Lair of the Wyrm'),
(184, 'Splig''s Revenge', 'Overlord', 'Quest Reward', 0, 'spligsrevenge.jpg', 'Labyrinth of Ruin'),
(185, 'Twin Souls', 'Overlord', 'Quest Reward', 0, 'twinsouls.jpg', 'Labyrinth of Ruin'),
(186, 'The Wyrm Queen''s Favor', 'Overlord', 'Rumor Reward', 0, 'thewyrmqueensfavor.jpg', 'Lair of the Wyrm'),
(187, 'Explosive Runes', 'Overlord', 'Saboteur', -1, 'explosiverunes.jpg', 'vanilla'),
(188, 'Uthuk Demon Trap', 'Overlord', 'Saboteur', -3, 'uthukdemontrap.jpg', 'vanilla'),
(189, 'Web Trap', 'Overlord', 'Saboteur', -1, 'webtrap.jpg', 'vanilla'),
(190, 'Wicked Laughter', 'Overlord', 'Saboteur', -2, 'wickedlaughter.jpg', 'vanilla'),
(191, 'Curse of the Monkey God', 'Overlord', 'Saboteur', -2, 'curseofthemonkeygod.jpg', 'vanilla'),
(192, 'Dark Remedy', 'Overlord', 'Universal', -1, 'darkremedy.jpg', 'Labyrinth of Ruin'),
(193, 'Dark Resilience', 'Overlord', 'Universal', -1, 'darkreslience.jpg', 'vanilla'),
(194, 'Plan Ahead', 'Overlord', 'Universal', -1, 'planahead.jpg', 'vanilla'),
(195, 'Schemes', 'Overlord', 'Universal', -1, 'schemes.jpg', 'vanilla'),
(197, 'Dark Fortitude', 'Overlord', 'Warlord', -1, 'darkfortitude.jpg', 'vanilla'),
(198, 'Expert Blow', 'Overlord', 'Warlord', -2, 'expertblow.jpg', 'vanilla'),
(199, 'Reinforce', 'Overlord', 'Warlord', -3, 'reinforce.jpg', 'vanilla');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbskills_aquired`
--

CREATE TABLE IF NOT EXISTS `tbskills_aquired` (
`spendxp_id` int(3) NOT NULL,
  `spendxp_game_id` int(2) DEFAULT NULL,
  `spendxp_player` varchar(18) DEFAULT NULL,
  `spendxp_char_id` int(3) DEFAULT NULL,
  `shop_equipped` varchar(3) DEFAULT NULL,
  `spendxp_skill_id` int(3) DEFAULT NULL,
  `spendxp_skill_name` varchar(28) DEFAULT NULL,
  `shop_latestdungeon` varchar(26) DEFAULT NULL,
  `shop_notes` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbskills_aquired`
--

INSERT INTO `tbskills_aquired` (`spendxp_id`, `spendxp_game_id`, `spendxp_player`, `spendxp_char_id`, `shop_equipped`, `spendxp_skill_id`, `spendxp_skill_name`, `shop_latestdungeon`, `shop_notes`) VALUES
(15, 14, 'Elder Mok', 0, 'yes', NULL, 'Armor of Faith', 'Skipped Campaign Intro', ''),
(16, 14, 'Elder Mok', 0, 'yes', NULL, 'Prayer of Healing', 'Skipped Campaign Intro', ''),
(18, 14, 'Tobin Farslayer', 0, 'yes', NULL, 'Accurate', 'Skipped Campaign Intro', ''),
(19, 14, 'Tobin Farslayer', 0, 'yes', NULL, 'Nimble', 'Skipped Campaign Intro', ''),
(23, 14, 'Laughin Buldar', 0, 'yes', NULL, 'Rage', 'Skipped Campaign Intro', ''),
(24, 14, 'Laughin Buldar', 0, 'yes', NULL, 'Brute', 'Skipped Campaign Intro', ''),
(30, 14, 'Overlord', 0, 'yes', NULL, 'Blood Rage', 'Skipped Campaign Intro', ''),
(61, 14, 'Leoric of the Book', 0, 'yes', NULL, 'Runic Knowledge (Runemaster)', 'Skipped Campaign Intro', ''),
(62, 14, 'Leoric of the Book', 0, 'yes', NULL, 'Exploding Rune', 'Skipped Campaign Intro', ''),
(65, 14, 'Tobin Farslayer', 0, 'yes', NULL, 'Eagle Eyes', 'Castle Daerion', ''),
(66, 14, 'Laughin Buldar', 0, 'yes', NULL, 'Counter Attack', 'Castle Daerion', ''),
(76, 25, 'Leoric of the Book', 0, 'yes', NULL, 'Runic Knowledge (Runemaster)', 'Skipped Campaign Intro', ''),
(77, 25, 'Leoric of the Book', 0, 'yes', NULL, 'Exploding Rune', 'Skipped Campaign Intro', ''),
(79, 25, 'Augur Grisom', 0, 'yes', NULL, 'Stoneskin', 'Skipped Campaign Intro', ''),
(80, 25, 'Augur Grisom', 0, 'yes', NULL, 'Drain Spirit', 'Skipped Campaign Intro', ''),
(82, 25, 'Tobin Farslayer', 0, 'yes', NULL, 'Greedy', 'Skipped Campaign Intro', ''),
(83, 25, 'Tobin Farslayer', 0, 'yes', NULL, 'Appraisal', 'Skipped Campaign Intro', ''),
(85, 25, 'Alys Raine', 0, 'yes', NULL, 'Rage', 'Skipped Campaign Intro', ''),
(86, 25, 'Alys Raine', 0, 'yes', NULL, 'Brute', 'Skipped Campaign Intro', ''),
(97, 14, 'Overlord', 0, 'yes', NULL, 'Blood Rage', 'Castle Daerion', ''),
(98, 25, 'Overlord', 0, 'yes', NULL, 'Web Trap', 'Skipped Campaign Intro', ''),
(103, 29, 'Tobin Farslayer', 0, 'yes', NULL, 'Appraisal', '', ''),
(104, 29, 'Trenloe the Strong', 0, 'yes', NULL, 'Advance', '', ''),
(105, 29, 'Aurim', 0, 'yes', NULL, 'Healing Rain', '', ''),
(106, 29, 'Truthseer Kel', 0, 'yes', NULL, 'Fury of Undeath', '', ''),
(107, 29, 'Overlord', 0, 'yes', NULL, 'Word of Pain', '', ''),
(116, 29, 'Truthseer Kel', 0, 'yes', NULL, 'Raise Dead (Necromancer)', '', ''),
(117, 29, 'Truthseer Kel', 0, 'yes', NULL, 'Reanimate (Necromancer)', '', ''),
(120, 29, 'Trenloe the Strong', 0, 'yes', NULL, 'Oath of Honor', '', ''),
(124, 29, 'Tobin Farslayer', 0, 'yes', NULL, 'Greedy', '', ''),
(127, 29, 'Aurim', 0, 'yes', NULL, 'Stoneskin', '', ''),
(132, 14, 'Leoric of the Book', 0, 'yes', NULL, 'Iron Will', '', ''),
(133, 14, 'Elder Mok', 0, 'yes', NULL, 'Divine Fury', '', ''),
(136, 14, 'Overlord', 0, 'yes', NULL, 'Explosive Runes', 'The Cardinal''s Plight', ''),
(137, 14, 'Overlord', 0, 'yes', NULL, 'Web Trap', 'The Cardinal''s Plight', ''),
(228, 29, 'Aurim', 0, 'yes', NULL, 'Drain Spirit', 'The Masquerade Ball', ''),
(242, 14, 'Laughin Buldar', 0, 'yes', NULL, 'Whirlwind', 'The Masquerade Ball', ''),
(244, 14, 'Tobin Farslayer', 0, 'yes', NULL, 'Bow Mastery', 'The Masquerade Ball', ''),
(253, 39, 'Dezra the Vile', 0, 'yes', NULL, 'Raise Dead (Necromancer)', '**Starting Gear**', ''),
(254, 39, 'Dezra the Vile', 0, 'yes', NULL, 'Reanimate (Necromancer)', '**Starting Gear**', ''),
(256, 39, 'Orkell the Swift', 0, 'yes', NULL, 'Rage', '**Starting Gear**', ''),
(258, 39, 'Tobin Farslayer', 0, 'yes', NULL, 'Set Trap', '**Starting Gear**', ''),
(259, 39, 'Tobin Farslayer', 0, 'yes', NULL, 'Black Widow''s Web', '**Starting Gear**', ''),
(261, 39, 'Ashrian', 0, 'yes', NULL, 'Stoneskin', '**Starting Gear**', ''),
(269, 38, 'Shiver', 7, 'yes', 98, 'Exploding Rune', 'First Blood', ''),
(270, 38, 'Shiver', 7, 'yes', 99, 'Ghost Armor', 'First Blood', NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tbcharacters`
--
ALTER TABLE `tbcharacters`
 ADD PRIMARY KEY (`char_id`);

--
-- Indexen voor tabel `tbgames`
--
ALTER TABLE `tbgames`
 ADD PRIMARY KEY (`game_id`);

--
-- Indexen voor tabel `tbheroes`
--
ALTER TABLE `tbheroes`
 ADD PRIMARY KEY (`hero_id`);

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
MODIFY `char_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT voor een tabel `tbgames`
--
ALTER TABLE `tbgames`
MODIFY `game_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT voor een tabel `tbskills_aquired`
--
ALTER TABLE `tbskills_aquired`
MODIFY `spendxp_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=270;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
