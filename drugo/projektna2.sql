-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2018 at 10:41 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projektna2`
--
CREATE DATABASE IF NOT EXISTS `projektna2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projektna2`;

-- --------------------------------------------------------

--
-- Table structure for table `admini`
--

CREATE TABLE IF NOT EXISTS `admini` (
  `id_admina` int(11) NOT NULL AUTO_INCREMENT,
  `id_uporabnika` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_admina`),
  KEY `fk_admini_uporabniki_idx` (`id_uporabnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admini`
--

INSERT INTO `admini` (`id_admina`, `id_uporabnika`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('tsjm5b642dhs2rf430i6brtmui7tr2lg', '::1', 1523627065, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333632363737353b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('tn9gqofv1tpra0r5q5k4378c8ldua6gr', '::1', 1523627382, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333632373038343b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('mo4lgq5m9i7eh3gqrin7fc9i45rvainb', '::1', 1523627504, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333632373439333b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('g7hjv4eb9e27kfnaemh6b0bfktp3dipi', '::1', 1523701768, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333730313439393b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('o5eqv126dflpongut4cu278lvnoljfr8', '::1', 1523702057, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333730313832333b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b),
('tkmc6ki7md03bq3plpeujf4qdufc6s7n', '::1', 1523702454, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333730323137353b61646d696e7c623a313b75706f725f696d657c733a343a226a617361223b7072696a61766c6a656e7c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `evidenca`
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
-- Table structure for table `predmeti`
--

CREATE TABLE IF NOT EXISTS `predmeti` (
  `id_predmeta` int(11) NOT NULL AUTO_INCREMENT,
  `ime_predmeta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_predmeta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `predmeti`
--

INSERT INTO `predmeti` (`id_predmeta`, `ime_predmeta`) VALUES
(1, 'NRS'),
(2, 'NUP');

-- --------------------------------------------------------

--
-- Table structure for table `sklopi`
--

CREATE TABLE IF NOT EXISTS `sklopi` (
  `id_sklopa` int(11) NOT NULL AUTO_INCREMENT,
  `ime_sklopa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_sklopa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sklopi`
--

INSERT INTO `sklopi` (`id_sklopa`, `ime_sklopa`) VALUES
(1, 'Prvo ocenjevalno obdobje'),
(2, 'Drugo ocenjevalno obdobje');

-- --------------------------------------------------------

--
-- Table structure for table `uporabniki`
--

CREATE TABLE IF NOT EXISTS `uporabniki` (
  `id_uporabnika` int(11) NOT NULL AUTO_INCREMENT,
  `upor_ime` varchar(45) DEFAULT NULL,
  `geslo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_uporabnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `uporabniki`
--

INSERT INTO `uporabniki` (`id_uporabnika`, `upor_ime`, `geslo`) VALUES
(1, 'jasa', 'b26e78d6d9b7a0f30be9eb5fe22c91c3');

-- --------------------------------------------------------

--
-- Table structure for table `vprasanja`
--

CREATE TABLE IF NOT EXISTS `vprasanja` (
  `id_vprasanja` int(11) NOT NULL AUTO_INCREMENT,
  `vprasanje` varchar(45) DEFAULT NULL,
  `odgovor` varchar(45) DEFAULT NULL,
  `st_tock` int(11) DEFAULT NULL,
  `id_predmeta` int(11) NOT NULL,
  `id_sklopa` int(11) NOT NULL,
  PRIMARY KEY (`id_vprasanja`),
  KEY `fk_vprasanja_predmeti1_idx` (`id_predmeta`),
  KEY `fk_vprasanja_sklopi1_idx` (`id_sklopa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `vprasanja`
--

INSERT INTO `vprasanja` (`id_vprasanja`, `vprasanje`, `odgovor`, `st_tock`, `id_predmeta`, `id_sklopa`) VALUES
(1, '1.	Kaj je informacija? Kaj je podatek? Kaj je', 'Informacija je skupek podatkov ali obogaten p', 5, 1, 1),
(2, 'Kje  vse so lahko shranjeni podatki? Opiši en', 'Podatki so lahko shranjeni v datotekah ali v ', 3, 1, 1),
(3, 'Kateri elementi v širšem pomenu sestavljajo p', 'Podatkovne baze sestavljajo: Podatki (fizični', 4, 1, 1),
(4, 'Kaj so sistemi za upravljanje s podatkovnimi ', 'SUPB je programska oprema, ki uporabnikom omo', 4, 1, 1),
(5, 'Kaj je osnovna naloga procesorja poizvedb? SU', 'Procesor poizvedb: Osnovna naloga je prevzem ', 6, 1, 1),
(6, 'Na katera dva upravitelja se razdeli upravite', '1.	Upravitelj izravnalnika (ravna s prostorom', 5, 1, 1),
(7, 'Naštej vsaj 5 funkcij SUPB-ja in jih opiši.', '1.	Manipuliranje s podatki (omogoča uporabnik', 5, 1, 1),
(8, 'Glede na kaj se razlikujejo SUPB-ji, ki jih r', 'Razlikujejo se po ceni in učinkovitosti. Upoš', 4, 1, 1),
(9, 'Na katera dva tipa delimo podatkovne baze gle', '1.	Centralizirana podatkovna baza: To je urej', 3, 1, 1),
(10, 'Kaj je sistem za upravljanje s porazdeljenimi', 'SUPPB je programska oprema, ki omogoča upravl', 5, 1, 1),
(11, 'Kako delimo porazdeljene podatkovne baze gled', 'Poznamo homogeno PPB in heterogeno PPB. Homog', 4, 1, 1),
(12, 'Kako delimo porazdeljene podatkovne baze gled', 'Brez lokalne avtonomije: vsi dostopi do PPB s', 5, 1, 1),
(13, 'Kako delimo porazdeljene podatkovne baze gled', 'Horizontalno: porazdelimo vrstice tabel. Vert', 3, 1, 1),
(14, 'Kdo je upravitelj podatkovne baze? Naštej vsa', 'To je oseba, ki ima osrednji nadzor nad PB in', 4, 1, 1),
(15, 'Kaj je naloga administratorja baze? V čem se ', 'Pozna celotno shemo PB, po potrebi izvaja spr', 3, 1, 1),
(16, 'Kaj je naloga administratorja podatkov? V čem', 'Odgovoren je za upravljanje s podatkovnimi vi', 3, 1, 1),
(17, 'Kakšne vrste končnih uporabnikov poznaš (2 ti', '1.	Sofisticirani uporabniki: - Ne uporabljajo', 4, 1, 1),
(18, 'Zakaj naivnim uporabnikom pravimo, da so naiv', 'Do PB dostopajo izključno s pomočjo aplikacij', 2, 1, 1),
(19, 'Naštej osnovne gradnike E-R modela? Opiši jih', 'Entiteta, atribut, relacija, ključ. Relacija:', 5, 1, 1),
(20, 'Kaj je SQL? V katero vrsto jezikov sodi? Na k', 'SQL je struktuirani povpraševalni jezik za de', 3, 1, 1),
(21, 'Kateri ukazi sodijo v skupino SQL-DDL ukazov?', 'CREATE (izdelamo npr. tabelo, PB), ALTER (nam', 3, 1, 1),
(22, 'Kateri ukazi sodijo v skupino SQL-DML ukazov?', 'DELETE (brisanje vrstic v tabeli – pogojno al', 3, 1, 1),
(23, 'Opiši ukaz CONCAT. Kdaj ga uporabimo in kaj d', 'Združi podatke iz različnih stolpcev tabele. ', 5, 1, 1),
(24, 'Združi podatke iz različnih stolpcev tabele. ', 'Odreže del besede od določenega znaka naprej', 5, 1, 1),
(25, 'Opiši ukaz INNER JOIN. Kdaj ga uporabimo in k', 'Uporabimo ga, če želimo dobiti samo skupne za', 5, 1, 1),
(26, 'Opiši ukaz LEFT OUTER JOIN. Kdaj ga uporabimo', 'Opiši ukaz LEFT OUTER JOIN. Kdaj ga uporabimo', 1, 1, 1),
(27, 'Opiši ukaz RIGHT OUTER JOIN. Kdaj ga uporabim', 'Opiši ukaz RIGHT OUTER JOIN. Kdaj ga uporabim', 5, 1, 1),
(28, 'Opiši ukaz FULL OUTER JOIN. Kdaj ga uporabimo', 'Uporabimo, ko želimo dobiti vse zapise iz dve', 4, 1, 1),
(29, 'Opiši ukaza ANY in ALL. Kdaj ju uporabimo in ', 'Uporabljamo jih v ugnezdenih SELECT stavkih, ', 3, 1, 1),
(30, 'Katere so osnovne operacije za manipulacijo s', 'UNIJA, PRESEK, RAZLIKA, KARTEZIČNI PRODUKT', 2, 1, 1),
(31, 'Kaj je UNIJA dveh relacij? Kaj je rezultat ta', 'Vrne vse vrstice dveh relacij brez dvojnikov.', 5, 1, 1),
(32, 'Kaj je RAZLIKA dveh relacij? Kaj je rezultat ', 'Vrne vse vrstice relacije1, ki niso v relacij', 2, 1, 1),
(33, 'Kaj je PRESEK dveh relacij? Kaj je rezultat t', 'Vrne vse skupne elemente. 	Primer: 	A={1,3,5}', 3, 1, 1),
(34, 'Kaj je KARTEZIČNI PRODUKT dveh relacij? Kaj j', 'Vrne vse možne kombinacije dveh relacij. 	Pri', 4, 1, 1),
(35, 'Katere so dostopne pravice v SQL standardu? O', 'DML, DDL, REFERENCES, USAGE', 4, 1, 1),
(36, 'Kaj je SQL pogled? Kaj nam omogoča oz. zakaj ', 'Je navidezna tabela, ki prikaže nek selektivn', 3, 1, 1),
(37, 'Kaj so spletni portali? Kaj omogočajo sistemi', 'Spletni portali so vstopna točka za uporabnik', 4, 1, 2),
(38, 'V katere vse faze distribucije je CMS sistem ', '•	Ustvarjanje spletne vsebine •	Urejanje in v', 4, 1, 2),
(39, 'Naštej stopnje življenjskega cikla digitalne ', '. Nastanek 	2. Posodobitev 	3. Objava 	4. Pre', 3, 1, 2),
(40, 'Katere vrste spletnih strani vključuje CMS si', 'Statične ( spletna stran se večino časa ne sp', 2, 1, 2),
(41, 'Kaj je splet? Kaj je spletna stran? Kaj je sp', 'Splet je porazdeljen hipertekstni sistem, ki ', 4, 1, 2),
(42, 'Kaj je intranet? Kaj mora omogočati?', 'Je informacijski sistem podjetja, ki je dosto', 5, 1, 2),
(43, 'Kaj je ekstranet? Kateri so pogoji delovanja ', 'Je povezava intranetov več podjetij z namenom', 1, 1, 2),
(44, 'Kako poteka komunikacija s pristopom AJAX?', 'Omogoča izvedbo ločenih zahtev http in tako p', 5, 1, 2),
(45, 'Na kaj vse mora biti grafično oblikovalec poz', '•	Barvno shemo •	Postavitev elementov •	Navig', 5, 1, 2),
(46, 'Kaj nam pove barvni model? Katere barvne mode', 'Pove, kako posamezne barve predstavimo z njih', 2, 1, 2),
(47, 'Opiši barvni model RGB.', 'Je seštevalni barvni model, pri katerem vsako', 5, 1, 2),
(48, 'Opiši barvni model CMYK.', 'Je kratica za zelenomodra(CYAN), modrordeča(M', 3, 1, 2),
(49, 'Opiši barvni model HSV.', 'Kratica je sestavljena iz barvnega odtenka(HU', 2, 1, 2),
(50, 'Na kaj moramo biti pozorni pri izbiri kombina', 'Kontrast zmanjša obremenitev oči in osredotoč', 4, 1, 2),
(51, 'Na katere vse načine lahko izberemo kombinaci', 'Prava trikotna shema – barve enako oddaljene ', 3, 1, 2),
(52, 'Kaj je tipografija? Kakšna je razlika med ser', 'Tipografija je veda o oblikovanju pisav. 	Nes', 5, 1, 2),
(53, 'Kakšna je razlika med pravo in nepravo kurziv', 'Neprava kurziva – ko se črke nagnejo se ne sp', 5, 1, 2),
(54, 'Kaj je navigacija spletne strani? Kako razdel', 'Navigacija je način, na katerega lahko uporab', 4, 1, 2),
(55, 'Kakšne so pomožne navigacije? Opiši jih.', 'Iskalnik – realiziran kot gradnik za iskanje ', 2, 1, 2),
(56, 'Kaj je HTML jezik? Kaj ponuja?', 'HTML je označevalni hipertekstni jezik za obj', 2, 1, 2),
(57, 'Kaj je PHP jezik, s katero sintakso interpret', 'PHP je skriptni jezik za strežnike, načrtovan', 4, 1, 2),
(58, 'Katere operatorje poznamo v PHP jeziki? Našte', 'prireditveni operatorji aritmetični operatorj', 3, 1, 2),
(59, 'Kaj so preddefinirane spremenljivke? Naštej v', 'So spremenljivke, ki imajo že vnaprej določen', 3, 1, 2),
(60, 'S katerima dvema metodama dostopamo do podatk', 'POST in GET.  Metoda GET se od metode POST ra', 4, 1, 2),
(61, 'Kaj je konstruktor in kaj je destruktor v PHP', 'Konstruktor je metoda razreda v računalniškem', 2, 1, 2),
(62, 'Kaj je program, kaj je algoritem, razlike med', 'Program je, če algoritem izvaja računalnik. A', 5, 1, 2),
(63, 'Kaj je diagram poteka, kateri so gradniki in ', 'Diagram poteka je vizualna predstavitev možni', 5, 1, 2),
(64, 'Kaj je sintaksa in kaj je semantika jezika? K', 'Sintaksa je nabor pravil pisanja programa. Se', 1, 1, 2),
(65, 'Kakšna je razlika med programskim jezikom in ', 'Množica skriptnih jezikov je podmnožica progr', 5, 1, 2),
(66, 'Kaj je deklaracija spremenljivk in kaj je ini', '•	Deklaracija spremenljivk – Je ko določimo n', 5, 1, 2),
(67, 'Katere zanke poznamo v programskih jezikih? K', '•	WHILE, FOR, DO-WHILE. •	WHILE zanka se izva', 3, 1, 2),
(68, 'Opiši razlike in podobnosti med WHILE in DO-W', '•	WHILE zanka najprej preveri pogoj in nato i', 4, 1, 2),
(69, 'Opiši razlike in podobnosti med WHILE in FOR ', '•	Obe zanki se izvajajo dokler ni pogoj izpol', 2, 1, 2),
(70, 'Opiši razlike in podobnosti med FOR  in DO-WH', '•	Obe zanki se izvajajo dokler ni pogoj izpol', 3, 1, 2),
(71, 'Opiši razlike in podobnosti med SWITCH  in IF', '•	Oba stavka primerjata vrednosti •	Pri IF st', 3, 1, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admini`
--
ALTER TABLE `admini`
  ADD CONSTRAINT `fk_admini_uporabniki` FOREIGN KEY (`id_uporabnika`) REFERENCES `uporabniki` (`id_uporabnika`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `evidenca`
--
ALTER TABLE `evidenca`
  ADD CONSTRAINT `fk_evidenca_uporabniki1` FOREIGN KEY (`id_uporabnika`) REFERENCES `uporabniki` (`id_uporabnika`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evidenca_vprasanja1` FOREIGN KEY (`id_vprasanja`) REFERENCES `vprasanja` (`id_vprasanja`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vprasanja`
--
ALTER TABLE `vprasanja`
  ADD CONSTRAINT `fk_vprasanja_predmeti1` FOREIGN KEY (`id_predmeta`) REFERENCES `predmeti` (`id_predmeta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vprasanja_sklopi1` FOREIGN KEY (`id_sklopa`) REFERENCES `sklopi` (`id_sklopa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
