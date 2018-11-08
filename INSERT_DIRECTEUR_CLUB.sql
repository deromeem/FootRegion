-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 08 nov. 2018 à 14:35
-- Version du serveur :  10.1.25-MariaDB
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `footregion`
--

-- --------------------------------------------------------

--
-- Structure de la table `footregion_footregion_clubs`
--

CREATE TABLE `footregion_footregion_clubs` (
  `id` int(11) NOT NULL,
  `sigle` varchar(50) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adr_rue` varchar(50) NOT NULL,
  `adr_ville` varchar(50) NOT NULL,
  `adr_cp` varchar(10) NOT NULL,
  `directeurs_id` int(11) NOT NULL DEFAULT '1',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `footregion_footregion_clubs`
--

INSERT INTO `footregion_footregion_clubs` (`id`, `sigle`, `nom`, `adr_rue`, `adr_ville`, `adr_cp`, `directeurs_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', '', '', '', 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'UFBSJA', 'Union Football Belleville Saint Jean d\'Ardières', '', '', '', 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(8, 'FCA', 'FC Annecy', '24 Rue du Commandant Guilbaud', 'Annecy', '74000', 12, 'fc-annecy', 1, '2018-11-08 13:17:24', 35, '2018-11-08 13:30:58', 35, 0),
(9, 'FSR', 'Fréjus-Saint-Raphaël', '10 Avenue Simone Veil ', 'Saint-Raphaël', '83600', 13, 'frejus-saint-raphael', 1, '2018-11-08 13:19:02', 35, '2018-11-08 13:31:07', 35, 0),
(10, 'HFC', 'Hyères FC', '24 Rue Charles de Gaulle', 'Hyères', '83400', 11, 'hyeres-fc', 1, '2018-11-08 13:20:07', 35, '2018-11-08 13:31:15', 35, 0),
(11, 'CAP', 'CA Pontarlier', '54 Rue Marpaud', 'Pontarlier', '25300', 10, 'ca-pontarlier', 1, '2018-11-08 13:21:11', 35, '2018-11-08 13:31:23', 35, 0),
(12, 'TFC', 'Trélissac', '13 Avenue Jean Jaurès', 'Trélissac', '24750', 9, 'trelissac', 1, '2018-11-08 13:22:43', 35, '2018-11-08 13:31:30', 35, 0);

-- --------------------------------------------------------

--
-- Structure de la table `footregion_footregion_directeurs`
--

CREATE TABLE `footregion_footregion_directeurs` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_affectation` date NOT NULL DEFAULT '0000-00-00',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `footregion_footregion_directeurs`
--

INSERT INTO `footregion_footregion_directeurs` (`id`, `email`, `date_affectation`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '0000-00-00', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'hboss@footregion.fr', '2018-11-15', '', 1, '2018-10-24 00:00:00', 45, '2018-11-06 14:02:30', 35, 0),
(9, 'vadendavignon@footregion.fr', '2016-11-24', '', 1, '2018-11-08 13:26:37', 35, '2018-11-08 13:26:56', 35, 0),
(10, 'mauricebarrientos@footregion.fr', '2017-07-18', '', 1, '2018-11-08 13:28:13', 35, '0000-00-00 00:00:00', 0, 0),
(11, 'guyparenteau@footregion.fr', '2015-04-22', '', 1, '2018-11-08 13:29:03', 35, '2018-11-08 13:29:19', 35, 0),
(12, 'aleronayot@footregion.fr', '2014-12-16', '', 1, '2018-11-08 13:29:56', 35, '0000-00-00 00:00:00', 0, 0),
(13, 'artuscaron@footregion.fr', '2018-05-16', '', 1, '2018-11-08 13:30:33', 35, '0000-00-00 00:00:00', 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `footregion_footregion_clubs`
--
ALTER TABLE `footregion_footregion_clubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_footregion_footregion_clubs_directeurs_id` (`directeurs_id`);

--
-- Index pour la table `footregion_footregion_directeurs`
--
ALTER TABLE `footregion_footregion_directeurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_footregion_footregion_directeurs_email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `footregion_footregion_clubs`
--
ALTER TABLE `footregion_footregion_clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `footregion_footregion_directeurs`
--
ALTER TABLE `footregion_footregion_directeurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
