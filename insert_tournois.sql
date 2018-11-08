-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 08 nov. 2018 à 15:51
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.11

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
-- Structure de la table `footregion_footregion_tournois`
--

CREATE TABLE `footregion_footregion_tournois` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `footregion_footregion_tournois`
--

INSERT INTO `footregion_footregion_tournois` (`id`, `nom`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'Champion', 'champion', 1, '2018-11-06 15:35:47', 35, '0000-00-00 00:00:00', 0, 0),
(3, 'Intercommunal d\'Iser', 'intercommunal-d-iser', 1, '2018-11-08 14:09:10', 35, '0000-00-00 00:00:00', 0, 0),
(4, 'Challenge Bouilhaguet', 'challenge-bouilhaguet', 1, '2018-11-08 14:11:29', 35, '0000-00-00 00:00:00', 0, 0),
(5, 'Tournoi paques', 'tournoi-paques', 1, '2018-11-08 14:11:39', 35, '0000-00-00 00:00:00', 0, 0),
(6, 'Tournoi Futsal de l\'AFAF', 'tournois-de-foot-foot-en-salle-tournoi-futsal-de-l-afaf', 1, '2018-11-08 14:11:54', 35, '2018-11-08 14:12:23', 35, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `footregion_footregion_tournois`
--
ALTER TABLE `footregion_footregion_tournois`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `footregion_footregion_tournois`
--
ALTER TABLE `footregion_footregion_tournois`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
