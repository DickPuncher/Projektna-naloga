-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Gostitelj: localhost
-- Čas nastanka: 17. apr 2018 ob 06.55
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
('aej9bs59lupa7hdq5su5ck3b072dqmsa', '::1', 1523944057, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333934333833363b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('figlc86oedrmcacipmjgmgp9u86fp8jf', '::1', 1523944595, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333934343337323b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('6nilhdrc7ic1l0ko14ni15843l171sta', '::1', 1523945550, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333934353239363b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('c0j2952fiphpa3fn7n07hlav5vku0uiu', '::1', 1523945924, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333934353634303b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('pl2t9vqt9m7d7nfaanu3t3cs2s1gsjc1', '::1', 1523946236, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333934353934373b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('agn6c09bfh8btd7bttc9861oh427u6m8', '::1', 1523946617, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333934363333343b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('2i9latm30shf13j8r86n0opu6vd37o34', '::1', 1523946747, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333934363730333b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('f76cfauqb4ec4kt57lm640l57k8m8jas', '::1', 1523947027, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333934373032343b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('ebqan6tcfdcmh4q066mint9rga8kc8sn', '::1', 1523947687, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333934373339313b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
(1, 'NRS'),
(2, 'NUP');

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
(1, 'PHP', 1),
(2, 'Mysql', 2),
(3, 'Nekki', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Odloži podatke za tabelo `vprasanja`
--

INSERT INTO `vprasanja` (`id_vprasanja`, `vprasanje`, `odgovor`, `st_tock`, `id_predmeta`, `id_sklopa`) VALUES
(2, 'Vpr1', 'Odg1', 4, 1, 3),
(3, 'l dfkgh', 'dkjshfs', 5, 2, 2),
(4, 'Zdravo', 'jst sm jurko', 13, 1, 3),
(5, 'Aloha', 'jaz nisem jaša', 12, 1, 3),
(6, 'srbus', 'jst sm kurac', 3, 1, 3),
(7, 'jaz sem tudi kurac?', 'ja', 1, 1, 3),
(8, 'golob?', 'znak miru', 1, 1, 3);

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
