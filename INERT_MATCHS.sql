-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 08 nov. 2018 à 16:20
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
-- Structure de la table `footregion_footregion_matchs`
--

CREATE TABLE `footregion_footregion_matchs` (
  `id` int(11) NOT NULL,
  `date_heure` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `score_domicile` int(11) NOT NULL DEFAULT '0',
  `score_invite` int(11) NOT NULL DEFAULT '0',
  `nom` varchar(50) NOT NULL,
  `adr_rue` varchar(50) NOT NULL,
  `adr_ville` varchar(50) NOT NULL,
  `adr_cp` varchar(10) NOT NULL,
  `coord_gps` varchar(50) NOT NULL,
  `equipes_invite_id` int(11) NOT NULL DEFAULT '1',
  `equipes_domicile_id` int(11) NOT NULL DEFAULT '1',
  `entraineurs_invite_id` int(11) NOT NULL DEFAULT '1',
  `entraineurs_initiateur_id` int(11) NOT NULL DEFAULT '1',
  `tournois_id` int(11) NOT NULL DEFAULT '1',
  `statuts_id` int(11) NOT NULL DEFAULT '1',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `footregion_footregion_matchs`
--

INSERT INTO `footregion_footregion_matchs` (`id`, `date_heure`, `score_domicile`, `score_invite`, `nom`, `adr_rue`, `adr_ville`, `adr_cp`, `coord_gps`, `equipes_invite_id`, `equipes_domicile_id`, `entraineurs_invite_id`, `entraineurs_initiateur_id`, `tournois_id`, `statuts_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '2018-10-24 00:00:00', 0, 0, '-', '', '', '', '', 1, 1, 1, 1, 1, 1, '', 1, '2018-10-24 00:00:00', 0, '0000-00-00 00:00:00', 45, 0),
(2, '2018-10-26 00:00:00', 0, 0, 'Match test 1', '', '', '', '', 1, 1, 1, 1, 1, 1, 'match-test-1', 1, '2018-10-24 00:00:00', 45, '2018-11-08 14:18:58', 35, 0),
(3, '2018-11-14 00:00:00', 0, 0, 'Senior 1', '5 rue du loup', 'Marseille', '04530', 'E78964,N4544', 5, 2, 5, 2, 5, 2, 'junior-1', 1, '2018-11-08 15:16:12', 35, '2018-11-08 15:16:20', 35, 0),
(4, '2018-11-17 00:00:00', 0, 0, 'Vétérans Edition', '107 avenue Bernard', 'Lyon', '76520', 'E456*9,S485', 6, 3, 6, 2, 2, 5, 'veterans-edition', 1, '2018-11-08 15:18:01', 35, '2018-11-08 15:18:11', 35, 0),
(5, '2018-11-01 00:00:00', 4, 2, 'Amical U16/17', '7 impasse du clos', 'Épône', '78680', 'N15971,S4318', 4, 4, 4, 4, 4, 3, 'amical-u16-17', 1, '2018-11-08 15:19:46', 35, '0000-00-00 00:00:00', 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `footregion_footregion_matchs`
--
ALTER TABLE `footregion_footregion_matchs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_footregion_footregion_matchs_entraineurs_initiateur_id` (`entraineurs_initiateur_id`),
  ADD KEY `fk_footregion_footregion_matchs_entraineurs_invite_id` (`entraineurs_invite_id`),
  ADD KEY `fk_footregion_footregion_matchs_equipes_domicile_id` (`equipes_domicile_id`),
  ADD KEY `fk_footregion_footregion_matchs_equipes_invite_id` (`equipes_invite_id`),
  ADD KEY `fk_footregion_footregion_matchs_statuts_id` (`statuts_id`),
  ADD KEY `fk_footregion_footregion_matchs_tournois_id` (`tournois_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `footregion_footregion_matchs`
--
ALTER TABLE `footregion_footregion_matchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `footregion_footregion_matchs`
--
ALTER TABLE `footregion_footregion_matchs`
  ADD CONSTRAINT `fk_footregion_footregion_matchs_entraineurs_initiateur_id` FOREIGN KEY (`entraineurs_initiateur_id`) REFERENCES `footregion_footregion_entraineurs` (`id`),
  ADD CONSTRAINT `fk_footregion_footregion_matchs_entraineurs_invite_id` FOREIGN KEY (`entraineurs_invite_id`) REFERENCES `footregion_footregion_entraineurs` (`id`),
  ADD CONSTRAINT `fk_footregion_footregion_matchs_equipes_domicile_id` FOREIGN KEY (`equipes_domicile_id`) REFERENCES `footregion_footregion_equipes` (`id`),
  ADD CONSTRAINT `fk_footregion_footregion_matchs_equipes_invite_id` FOREIGN KEY (`equipes_invite_id`) REFERENCES `footregion_footregion_equipes` (`id`),
  ADD CONSTRAINT `fk_footregion_footregion_matchs_statuts_id` FOREIGN KEY (`statuts_id`) REFERENCES `footregion_footregion_statuts` (`id`),
  ADD CONSTRAINT `fk_footregion_footregion_matchs_tournois_id` FOREIGN KEY (`tournois_id`) REFERENCES `footregion_footregion_tournois` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
