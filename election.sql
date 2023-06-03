-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 04 juin 2021 à 01:58
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `election`
--

-- --------------------------------------------------------

--
-- Structure de la table `electeur`
--

DROP TABLE IF EXISTS `electeur`;
CREATE TABLE IF NOT EXISTS `electeur` (
  `idElecteur` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `motPasse` varchar(20) NOT NULL,
  `age` int NOT NULL,
  `dateIscription` date NOT NULL,
  `idPartiElu` int DEFAULT NULL,
  `idGouvernorat` int NOT NULL,
  `dateDerniereElection` date DEFAULT NULL,
  PRIMARY KEY (`idElecteur`),
  KEY `idGouvernorat` (`idGouvernorat`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `electeur`
--

INSERT INTO `electeur` (`idElecteur`, `pseudo`, `motPasse`, `age`, `dateIscription`, `idPartiElu`, `idGouvernorat`, `dateDerniereElection`) VALUES
(1, 'mahmoud', '123', 28, '2021-05-04', NULL, 2, NULL),
(2, 'khalil', '3711', 20, '2021-05-31', 5, 1, '2021-06-04'),
(3, 'foulen', '15f', 26, '2021-06-01', 3, 7, '2021-06-02'),
(6, 'aziz', '12345', 21, '2021-06-03', NULL, 1, NULL),
(12, 'foulen', '1515', 19, '2021-06-04', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `gouvernorat`
--

DROP TABLE IF EXISTS `gouvernorat`;
CREATE TABLE IF NOT EXISTS `gouvernorat` (
  `idGouvernorat` int NOT NULL AUTO_INCREMENT,
  `nomGouvernorat` varchar(50) NOT NULL,
  `nombreSieges` int NOT NULL,
  PRIMARY KEY (`idGouvernorat`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gouvernorat`
--

INSERT INTO `gouvernorat` (`idGouvernorat`, `nomGouvernorat`, `nombreSieges`) VALUES
(1, 'Tunis', 15),
(2, 'Ariana', 12),
(3, 'Manouba', 10),
(4, 'Ben Arous', 9),
(5, 'Nabeul', 7),
(6, 'Sousse', 13),
(7, 'Monastir', 8),
(8, 'Mahdia', 8),
(9, 'Sfax', 14),
(10, 'Gabes', 10),
(11, 'Mednine', 9),
(12, 'Tataouine', 7),
(13, 'Gafsa', 7),
(14, 'Tozeur', 8),
(15, 'Kebili', 8),
(16, 'Kairouane', 6),
(17, 'Tela', 10),
(18, 'Siliana', 9),
(19, 'Kef', 7),
(20, 'Jendouba', 7),
(21, 'Beja', 8),
(22, 'Kasserine', 8),
(23, 'Bizerte', 6),
(24, 'Zaghouan', 10);

-- --------------------------------------------------------

--
-- Structure de la table `partipolitique`
--

DROP TABLE IF EXISTS `partipolitique`;
CREATE TABLE IF NOT EXISTS `partipolitique` (
  `idParti` int NOT NULL AUTO_INCREMENT,
  `nomParti` varchar(20) NOT NULL,
  PRIMARY KEY (`idParti`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `partipolitique`
--

INSERT INTO `partipolitique` (`idParti`, `nomParti`) VALUES
(1, 'Annahdha'),
(2, 'Ettaillar'),
(3, 'PDL'),
(4, 'Front Populaire'),
(5, 'Ajjomhouri'),
(6, 'PDM'),
(7, 'Afek Tunis');

-- --------------------------------------------------------

--
-- Structure de la table `voix`
--

DROP TABLE IF EXISTS `voix`;
CREATE TABLE IF NOT EXISTS `voix` (
  `idVoix` int NOT NULL AUTO_INCREMENT,
  `idGouvernorat` int NOT NULL,
  `idParti` int NOT NULL,
  `nombreVoix` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`idVoix`),
  KEY `idGouvernorat` (`idGouvernorat`),
  KEY `idParti` (`idParti`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=337 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `voix`
--

INSERT INTO `voix` (`idVoix`, `idGouvernorat`, `idParti`, `nombreVoix`) VALUES
(1, 1, 1, 2271),
(2, 1, 2, 1579),
(3, 1, 3, 3032),
(4, 1, 4, 7843),
(5, 1, 5, 3266),
(6, 1, 6, 3152),
(7, 1, 7, 1718),
(8, 2, 1, 1486),
(9, 2, 2, 5931),
(10, 2, 3, 5139),
(11, 2, 4, 2008),
(12, 2, 5, 2781),
(13, 2, 6, 5497),
(14, 2, 7, 4764),
(15, 3, 1, 2608),
(16, 3, 2, 6306),
(17, 3, 3, 4162),
(18, 3, 4, 7618),
(19, 3, 5, 9564),
(20, 3, 6, 7833),
(21, 3, 7, 4206),
(22, 4, 1, 7449),
(23, 4, 2, 5311),
(24, 4, 3, 5598),
(29, 5, 1, 7839),
(30, 5, 2, 1748),
(31, 5, 3, 8490),
(32, 5, 4, 6779),
(33, 5, 5, 6609),
(34, 5, 6, 6368),
(35, 5, 7, 7018),
(36, 6, 1, 1965),
(37, 6, 2, 3532),
(38, 6, 3, 1114),
(39, 6, 4, 4410),
(40, 6, 5, 628),
(41, 6, 6, 8551),
(42, 6, 7, 788),
(43, 7, 1, 7003),
(44, 7, 2, 8275),
(45, 7, 3, 9614),
(46, 7, 4, 5675),
(47, 7, 5, 6702),
(48, 7, 6, 8610),
(49, 7, 7, 2319),
(50, 8, 1, 8380),
(51, 8, 2, 1466),
(52, 8, 3, 7853),
(53, 8, 4, 3673),
(54, 8, 5, 1413),
(55, 8, 6, 2629),
(56, 8, 7, 7238),
(57, 9, 1, 954),
(58, 9, 2, 2424),
(59, 9, 3, 4201),
(60, 9, 4, 7815),
(61, 9, 5, 9617),
(62, 9, 6, 3161),
(63, 9, 7, 1859),
(64, 10, 1, 9859),
(65, 10, 2, 790),
(66, 10, 3, 6907),
(67, 10, 4, 5310),
(68, 10, 5, 1343),
(69, 10, 6, 3310),
(70, 10, 7, 3007),
(71, 11, 1, 4013),
(72, 11, 2, 2850),
(73, 11, 3, 7960),
(74, 11, 4, 1362),
(75, 11, 5, 637),
(76, 11, 6, 9369),
(77, 11, 7, 6748),
(78, 12, 1, 9717),
(79, 12, 2, 2170),
(80, 12, 3, 2376),
(81, 12, 4, 3885),
(82, 12, 5, 4523),
(83, 12, 6, 1367),
(84, 12, 7, 4947),
(85, 13, 1, 4536),
(86, 13, 2, 2289),
(87, 13, 3, 7682),
(88, 13, 4, 8142),
(89, 13, 5, 8306),
(90, 13, 6, 5762),
(91, 13, 7, 4257),
(92, 14, 1, 2216),
(93, 14, 2, 1131),
(94, 14, 3, 3365),
(95, 14, 4, 7022),
(96, 14, 5, 6777),
(97, 14, 6, 3212),
(98, 14, 7, 2488),
(99, 15, 1, 5743),
(100, 15, 2, 7306),
(101, 15, 3, 8610),
(102, 15, 4, 828),
(103, 15, 5, 4932),
(104, 15, 6, 9879),
(105, 15, 7, 3103),
(106, 16, 1, 9813),
(107, 16, 2, 1315),
(108, 16, 3, 8041),
(109, 16, 4, 5981),
(110, 16, 5, 1635),
(111, 16, 6, 2705),
(112, 16, 7, 5849),
(113, 17, 1, 3960),
(114, 17, 2, 3200),
(115, 17, 3, 5470),
(116, 17, 4, 4567),
(117, 17, 5, 5626),
(118, 17, 6, 5081),
(119, 17, 7, 3025),
(120, 18, 1, 7795),
(121, 18, 2, 1597),
(122, 18, 3, 8464),
(123, 18, 4, 2275),
(124, 18, 5, 1521),
(125, 18, 6, 3663),
(126, 18, 7, 3962),
(127, 19, 1, 2586),
(128, 19, 2, 6477),
(129, 19, 3, 9333),
(130, 19, 4, 4028),
(131, 19, 5, 7537),
(132, 19, 6, 6526),
(133, 19, 7, 9558),
(134, 20, 1, 7259),
(135, 20, 2, 5545),
(136, 20, 3, 6995),
(137, 20, 4, 9723),
(138, 20, 5, 8815),
(139, 20, 6, 1900),
(140, 20, 7, 8754),
(141, 21, 1, 6721),
(142, 21, 2, 9772),
(143, 21, 3, 4200),
(144, 21, 4, 7959),
(145, 21, 5, 8137),
(146, 21, 6, 5490),
(147, 21, 7, 4138),
(148, 22, 1, 5741),
(149, 22, 2, 5029),
(150, 22, 3, 6335),
(151, 22, 4, 7545),
(152, 22, 5, 2030),
(153, 22, 6, 6234),
(154, 22, 7, 3819),
(155, 23, 1, 2449),
(156, 23, 2, 3946),
(157, 23, 3, 2114),
(158, 23, 4, 7955),
(159, 23, 5, 1493),
(160, 23, 6, 7256),
(161, 23, 7, 6616),
(162, 24, 1, 6382),
(163, 24, 2, 5967),
(164, 24, 3, 5772),
(165, 24, 4, 2720),
(166, 24, 5, 4456),
(167, 24, 6, 5943),
(168, 24, 7, 4390),
(28, 4, 7, 4001),
(27, 4, 6, 1958),
(26, 4, 5, 3659),
(25, 4, 4, 2758);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
