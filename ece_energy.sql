-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 17 Mars 2017 à 11:43
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

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
-- Structure de la table `paths`
--

CREATE TABLE `paths` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `starting_site_id` int(11) NOT NULL,
  `ending_site_id` int(11) NOT NULL,
  `max_capacity` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `paths`
--

INSERT INTO `paths` (`id`, `name`, `starting_site_id`, `ending_site_id`, `max_capacity`) VALUES
(1, 'Link 1', 1, 2, 400),
(2, 'Link 2', 1, 3, 225);

-- --------------------------------------------------------

--
-- Structure de la table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `value` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `records`
--

INSERT INTO `records` (`id`, `site_id`, `date`, `value`) VALUES
(1, 1, '2015-03-13 00:00:00', 70),
(2, 1, '2015-03-13 12:00:00', -30);

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
(1, 'Gravelines', 'producteur', 51.013, 2.13573, 4500),
(2, 'Paluel', 'producteur', 49.8581, 0.630346, 5200),
(3, 'Penly', 'producteur', 49.976, 1.20805, 2600),
(4, 'Chooz', 'producteur', 49.976, 1.20805, 2900),
(5, 'Flamanville', 'producteur', 49.5374, -1.88521, 4000),
(6, 'Cattenom', 'producteur', 49.4158, 6.21608, 5200),
(7, 'Brennilis', 'producteur', 48.3519, -3.87538, 4000),
(8, 'Nogent', 'producteur', 48.5144, 3.52208, 2600),
(9, 'Fessenheim', 'producteur', 47.9031, 7.56089, 1800),
(10, 'Dampierre', 'producteur', 47.7325, 2.51558, 3600),
(11, 'St-Laurent', 'producteur', 47.7201, 1.57801, 1800),
(12, 'Belleville', 'producteur', 47.5088, 2.87352, 2600),
(13, 'Chinon', 'producteur', 47.2286, 0.166104, 1900),
(14, 'Bugey', 'producteur', 45.8014, 5.26398, 3600),
(15, 'Le Blayais', 'producteur', 45.2574, -0.692838, 3600),
(16, 'St-Alban', 'producteur', 45.4052, 4.75312, 2600),
(17, 'Cruas', 'producteur', 44.6325, 4.74885, 3600),
(18, 'Tricastin', 'producteur', 44.4854, 4.46134, 3600),
(19, 'Golfech', 'producteur', 44.1075, 0.838167, 2600),
(20, 'Sisi', 'Cousin', 1, 2, 10),
(21, 'Sisi', 'Cousin', 1, 2, 10),
(22, 'bite', 'producteur', 1.68656, 5.2586, 6545),
(23, 'bite', 'producteur', 1.68656, 5.2586, 6545),
(24, 'bite', 'producteur', 1.68656, 5.2586, 6545),
(25, 'bite', 'producteur', 1.68656, 5.2586, 6545),
(26, 'bite', 'producteur', 1.68656, 5.2586, 6545),
(27, 'bite', 'producteur', 1.68656, 5.2586, 0),
(28, 'alala', 'producteur', 1.68656, 5.2586, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `passwd`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `paths`
--
ALTER TABLE `paths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paths_id_idx` (`starting_site_id`),
  ADD KEY `paths_id1_idx` (`ending_site_id`);

--
-- Index pour la table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `records_id1_idx` (`site_id`);

--
-- Index pour la table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `paths`
--
ALTER TABLE `paths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
