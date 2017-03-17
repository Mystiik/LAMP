-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 17 Mars 2017 à 00:14
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ece_energy`
--

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `location_x` float NOT NULL,
  `location_y` float NOT NULL,
  `stock` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sites`
--

INSERT INTO `sites` (`id`, `name`, `type`, `location_x`, `location_y`, `stock`) VALUES
(1, 'Gravelines', 'producteur', 51.013, 2.13573, 18000),
(2, 'Paluel', 'producteur', 49.8581, 0.630346, 20800),
(3, 'Penly', 'producteur', 49.976, 1.20805, 10400),
(4, 'Chooz', 'producteur', 49.976, 1.20805, 11600),
(5, 'Flamanville', 'producteur', 49.5374, -1.88521, 16000),
(6, 'Cattenom', 'producteur', 49.4158, 6.21608, 20800),
(7, 'Brennilis', 'producteur', 48.3519, -3.87538, 16000),
(8, 'Nogent', 'producteur', 48.5144, 3.52208, 10400),
(9, 'Fessenheim', 'producteur', 47.9031, 7.56089, 7200),
(10, 'Dampierre', 'producteur', 47.7325, 2.51558, 14400),
(11, 'St-Laurent', 'producteur', 47.7201, 1.57801, 7200),
(12, 'Belleville', 'producteur', 47.5088, 2.87352, 10400),
(13, 'Chinon', 'producteur', 47.2286, 0.166104, 7600),
(14, 'Bugey', 'producteur', 45.8014, 5.26398, 14400),
(15, 'Le Blayais', 'producteur', 45.2574, -0.692838, 14400),
(16, 'St-Alban', 'producteur', 45.4052, 4.75312, 10400),
(17, 'Cruas', 'producteur', 44.6325, 4.74885, 14400),
(18, 'Tricastin', 'producteur', 44.4854, 4.46134, 14400),
(19, 'Golfech', 'producteur', 44.1075, 0.838167, 10400),
(20, 'Cathédrale de Bourges', 'consommateur', 47.082, 2.39582, 10400),
(21, 'École Le Bourg', 'consommateur', 47.1064, 2.35619, 14400),
(22, 'Résidence André Maginot', 'consommateur', 47.3057, 2.26891, 16000),
(23, 'Château de Gien', 'consommateur', 47.6805, 2.61583, 11600),
(24, 'Cinéma REX', 'consommateur', 50.1068, 1.8317, 14400),
(25, 'Claeys Jean', 'consommateur', 50.0798, 1.99161, 7600);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
