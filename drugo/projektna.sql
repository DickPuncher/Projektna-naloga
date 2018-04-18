-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Gostitelj: localhost
-- Čas nastanka: 18. apr 2018 ob 06.22
-- Različica strežnika: 5.6.13
-- Različica PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Zbirka podatkov: `projektna`
--
CREATE DATABASE IF NOT EXISTS `projektna` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projektna`;

-- --------------------------------------------------------

--
-- Struktura tabele `admini`
--

CREATE TABLE IF NOT EXISTS `admini` (
  `id_admina` int(11) NOT NULL AUTO_INCREMENT,
  `id_uporabnika` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_admina`),
  KEY `fk_admini_uporabniki_idx` (`id_uporabnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Odloži podatke za tabelo `admini`
--

INSERT INTO `admini` (`id_admina`, `id_uporabnika`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('jntqsfcg38tllrgfgrn4o8uqmpd9t2ku', '::1', 1524028074, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343032373939383b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('qupbqilrl8240og9spa6e48gjhr6k92s', '::1', 1524028719, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343032383438373b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('1i0mghaf47l30a5q3adi7emvvteq3eoq', '::1', 1524029270, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343032393132313b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('fl8hf4vu5hgcfda1mqqh4ueb8pbkqs6p', '::1', 1524029703, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343032393434323b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('iiea45qhh418vhvorssfsmqhvgtkc4o5', '::1', 1524030051, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343032393736323b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('9nfrqvou2gpfi1rp7av3022rkugca56u', '::1', 1524031031, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343033313032373b61646d696e7c623a313b69645f75706f727c733a313a2231223b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('rn0afnoufajm1v6pba4gmlqopnqshfol', '::1', 1524032008, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343033313733303b61646d696e7c623a313b69645f75706f727c733a313a2231223b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('tqv0frrn0o99tjkrhjtma2dghcer68uv', '::1', 1524032280, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343033323036363b61646d696e7c623a313b69645f75706f727c733a313a2231223b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('63l6s62p5t39986t895kvve4qouitbun', '::1', 1524032484, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343033323337333b61646d696e7c623a313b69645f75706f727c733a313a2231223b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b);

-- --------------------------------------------------------

--
-- Struktura tabele `evidenca`
--

CREATE TABLE IF NOT EXISTS `evidenca` (
  `id_evidence` int(11) NOT NULL AUTO_INCREMENT,
  `id_uporabnika` int(11) NOT NULL,
  `id_vprasanja` int(11) NOT NULL,
  PRIMARY KEY (`id_evidence`),
  KEY `fk_evidenca_uporabniki1_idx` (`id_uporabnika`),
  KEY `fk_evidenca_vprasanja1_idx` (`id_vprasanja`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=145 ;

--
-- Odloži podatke za tabelo `evidenca`
--

INSERT INTO `evidenca` (`id_evidence`, `id_uporabnika`, `id_vprasanja`) VALUES
(141, 1, 19),
(142, 1, 14),
(143, 1, 20),
(144, 1, 18);

-- --------------------------------------------------------

--
-- Struktura tabele `predmeti`
--

CREATE TABLE IF NOT EXISTS `predmeti` (
  `id_predmeta` int(11) NOT NULL AUTO_INCREMENT,
  `ime_predmeta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_predmeta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Odloži podatke za tabelo `predmeti`
--

INSERT INTO `predmeti` (`id_predmeta`, `ime_predmeta`) VALUES
(1, 'NRS');

-- --------------------------------------------------------

--
-- Struktura tabele `sklopi`
--

CREATE TABLE IF NOT EXISTS `sklopi` (
  `id_sklopa` int(11) NOT NULL AUTO_INCREMENT,
  `ime_sklopa` varchar(45) DEFAULT NULL,
  `id_predmeta` int(11) NOT NULL,
  PRIMARY KEY (`id_sklopa`),
  KEY `fk_sklopi_predmeti1_idx` (`id_predmeta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Odloži podatke za tabelo `sklopi`
--

INSERT INTO `sklopi` (`id_sklopa`, `ime_sklopa`, `id_predmeta`) VALUES
(1, 'PHP', 1);

-- --------------------------------------------------------

--
-- Struktura tabele `uporabniki`
--

CREATE TABLE IF NOT EXISTS `uporabniki` (
  `id_uporabnika` int(11) NOT NULL AUTO_INCREMENT,
  `upor_ime` varchar(45) DEFAULT NULL,
  `geslo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_uporabnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Odloži podatke za tabelo `uporabniki`
--

INSERT INTO `uporabniki` (`id_uporabnika`, `upor_ime`, `geslo`) VALUES
(1, 'jasa', '47bce5c74f589f4867dbd57e9ca9f808');

-- --------------------------------------------------------

--
-- Struktura tabele `vprasanja`
--

CREATE TABLE IF NOT EXISTS `vprasanja` (
  `id_vprasanja` int(11) NOT NULL AUTO_INCREMENT,
  `vprasanje` varchar(255) DEFAULT NULL,
  `odgovor` varchar(255) DEFAULT NULL,
  `st_tock` int(11) DEFAULT NULL,
  `id_predmeta` int(11) NOT NULL,
  `id_sklopa` int(11) NOT NULL,
  PRIMARY KEY (`id_vprasanja`),
  KEY `fk_vprasanja_predmeti1_idx` (`id_predmeta`),
  KEY `fk_vprasanja_sklopi1_idx` (`id_sklopa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Odloži podatke za tabelo `vprasanja`
--

INSERT INTO `vprasanja` (`id_vprasanja`, `vprasanje`, `odgovor`, `st_tock`, `id_predmeta`, `id_sklopa`) VALUES
(9, 'PHP', 'PHPodg', 3, 1, 1),
(11, 'Neki?', 'NEKI!!!', 3, 1, 1),
(12, '3', '3', 3, 1, 1),
(14, '421', '555', 3, 1, 1),
(15, '1234', '4321', 4, 1, 1),
(16, 'lololol', 'LOLOLOL', 3, 1, 1),
(17, 'POGGERS', 'GOGGERS', 3, 1, 1),
(18, 'ME GO SMORC', 'ORC GO FACE', 3, 1, 1),
(19, 'FACE IS PLAAAACE', '3', 3, 1, 1),
(20, 'JURK SAY SMASH', 'SMASH GO FACE', 3, 1, 1),
(21, 'WHAT IS PLACE?', 'FACE IS PLACE!', 3, 1, 1),
(22, 'haHAA', 'HAAhaaa', 3, 1, 1);

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `admini`
--
ALTER TABLE `admini`
  ADD CONSTRAINT `fk_admini_uporabniki` FOREIGN KEY (`id_uporabnika`) REFERENCES `uporabniki` (`id_uporabnika`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omejitve za tabelo `evidenca`
--
ALTER TABLE `evidenca`
  ADD CONSTRAINT `fk_evidenca_uporabniki1` FOREIGN KEY (`id_uporabnika`) REFERENCES `uporabniki` (`id_uporabnika`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evidenca_vprasanja1` FOREIGN KEY (`id_vprasanja`) REFERENCES `vprasanja` (`id_vprasanja`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omejitve za tabelo `sklopi`
--
ALTER TABLE `sklopi`
  ADD CONSTRAINT `fk_sklopi_predmeti1` FOREIGN KEY (`id_predmeta`) REFERENCES `predmeti` (`id_predmeta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omejitve za tabelo `vprasanja`
--
ALTER TABLE `vprasanja`
  ADD CONSTRAINT `fk_vprasanja_predmeti1` FOREIGN KEY (`id_predmeta`) REFERENCES `predmeti` (`id_predmeta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vprasanja_sklopi1` FOREIGN KEY (`id_sklopa`) REFERENCES `sklopi` (`id_sklopa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
