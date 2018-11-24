-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 22 Novembre 2018 à 16:36
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Structure de la table `footregion_footregion_arbitres`
--

CREATE TABLE `footregion_footregion_arbitres` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `footregion_footregion_arbitres`
--

INSERT INTO `footregion_footregion_arbitres` (`id`, `email`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'phochon@footregion.fr', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(3, 'adrien_saumon@footregion.fr', '', 1, '0000-00-00 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(4, 'alain_footix@footregion.fr', '', 1, '0000-00-00 00:00:00', 45, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `footregion_footregion_categories`
--

CREATE TABLE `footregion_footregion_categories` (
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
-- Contenu de la table `footregion_footregion_categories`
--

INSERT INTO `footregion_footregion_categories` (`id`, `nom`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'U10-U11', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(3, 'U12-U13', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(4, 'U14-U15', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(5, 'U16-U17', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(6, 'U18-U19', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(7, 'Seniors', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(8, 'Vétérans', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(9, 'Vétérans +45', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0);

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
-- Contenu de la table `footregion_footregion_clubs`
--

INSERT INTO `footregion_footregion_clubs` (`id`, `sigle`, `nom`, `adr_rue`, `adr_ville`, `adr_cp`, `directeurs_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', '', '', '', 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'UFBSJA', 'Union Football Belleville Saint Jean d Ardières', '', '', '', 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(13, 'FCA', 'FC Annecy', '24 Rue du Commandant Guilbaud', 'Annecy', '74000', 12, 'fc-annecy', 1, '2018-11-08 13:17:24', 35, '2018-11-08 13:30:58', 35, 0),
(14, 'FSR', 'Fréjus-Saint-Raphaël', '10 Avenue Simone Veil ', 'Saint-Raphaël', '83600', 13, 'frejus-saint-raphael', 1, '2018-11-08 13:19:02', 35, '2018-11-08 13:31:07', 35, 0),
(15, 'HFC', 'Hyères FC', '24 Rue Charles de Gaulle', 'Hyères', '83400', 11, 'hyeres-fc', 1, '2018-11-08 13:20:07', 35, '2018-11-08 13:31:15', 35, 0),
(16, 'CAP', 'CA Pontarlier', '54 Rue Marpaud', 'Pontarlier', '25300', 10, 'ca-pontarlier', 1, '2018-11-08 13:21:11', 35, '2018-11-08 13:31:23', 35, 0),
(17, 'TFC', 'Trélissac', '13 Avenue Jean Jaurès', 'Trélissac', '24750', 9, 'trelissac', 1, '2018-11-08 13:22:43', 35, '2018-11-08 13:31:30', 35, 0);

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
-- Contenu de la table `footregion_footregion_directeurs`
--

INSERT INTO `footregion_footregion_directeurs` (`id`, `email`, `date_affectation`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '0000-00-00', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'hboss@footregion.fr', '2018-11-15', '', 1, '2018-10-24 00:00:00', 45, '2018-11-06 14:02:30', 35, 0),
(14, 'vadendavignon@footregion.fr', '2016-11-24', '', 1, '2018-11-08 13:26:37', 35, '2018-11-08 13:26:56', 35, 0),
(15, 'mauricebarrientos@footregion.fr', '2017-07-18', '', 1, '2018-11-08 13:28:13', 35, '0000-00-00 00:00:00', 0, 0),
(16, 'guyparenteau@footregion.fr', '2015-04-22', '', 1, '2018-11-08 13:29:03', 35, '2018-11-08 13:29:19', 35, 0),
(17, 'aleronayot@footregion.fr', '2014-12-16', '', 1, '2018-11-08 13:29:56', 35, '0000-00-00 00:00:00', 0, 0),
(18, 'artuscaron@footregion.fr', '2018-05-16', '', 1, '2018-11-08 13:30:33', 35, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `footregion_footregion_discussions`
--

CREATE TABLE `footregion_footregion_discussions` (
  `id` int(11) NOT NULL,
  `theme` varchar(50) NOT NULL,
  `utilisateurs_id` int(11) NOT NULL DEFAULT '1',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `footregion_footregion_discussions`
--

INSERT INTO `footregion_footregion_discussions` (`id`, `theme`, `utilisateurs_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'Covoiturage samedi 27/10 équipe UFBSJA-Seniors-1', 8, '', 1, '2018-10-26 00:00:00', 42, '0000-00-00 00:00:00', 0, 0),
(3, 'La meilleure celle la', 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(4, 'Les bests', 3, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(5, 'La team qui tue', 4, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(6, 'Nature Rouge', 5, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(7, 'Gazelle Plage', 6, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(8, 'Pour Tous Alpha', 7, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(9, 'Renard Gamma', 8, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(10, 'Tonnerre Avenue', 9, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(11, 'Royale En Boite', 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(12, 'Attaque Infernale', 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(13, 'Pro Bronze', 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(14, 'Atelier Rouge', 3, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(15, 'Laboratoire Extasy', 4, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `footregion_footregion_entraineurs`
--

CREATE TABLE `footregion_footregion_entraineurs` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `num_licence` varchar(255) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `footregion_footregion_entraineurs`
--

INSERT INTO `footregion_footregion_entraineurs` (`id`, `email`, `num_licence`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'inote@footregion.fr', '', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(3, 'sfrais@footregion.fr', '', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(7, 'entraineur1@gmail.com', '0 123 456 789', '', 1, '2018-11-06 13:19:44', 35, '0000-00-00 00:00:00', 0, 0),
(8, 'asieye@footregion.fr', '6 666 666 666', '', 1, '2018-11-08 13:03:35', 35, '0000-00-00 00:00:00', 0, 0),
(9, 'aforson@footregion.fr', '5 486 877 154', '', 1, '2018-11-08 13:11:13', 35, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `footregion_footregion_equipes`
--

CREATE TABLE `footregion_footregion_equipes` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `clubs_id` int(11) NOT NULL DEFAULT '1',
  `categories_id` int(11) NOT NULL DEFAULT '1',
  `entraineurs_id` int(11) NOT NULL DEFAULT '1',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `footregion_footregion_equipes`
--

INSERT INTO `footregion_footregion_equipes` (`id`, `nom`, `clubs_id`, `categories_id`, `entraineurs_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', 1, 1, 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'UFBSJA-Seniors-1', 2, 7, 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(3, 'UFBSJA-Véterans-1', 2, 8, 2, 'ufbsja-veterans-2', 1, '2018-11-06 13:23:28', 35, '2018-11-06 13:24:55', 35, 0),
(7, 'FCA-U16-U17-2', 8, 5, 6, 'fca-u16-u17-2', 1, '2018-11-08 14:05:34', 35, '0000-00-00 00:00:00', 0, 0),
(8, 'FSR-Séniors-1', 9, 7, 5, 'fsr-seniors-1', 1, '2018-11-08 14:06:31', 35, '0000-00-00 00:00:00', 0, 0),
(9, 'HFC-Vétérans+45-2', 10, 9, 4, 'hfc-veterans-45-2', 1, '2018-11-08 14:06:58', 35, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `footregion_footregion_joueurs`
--

CREATE TABLE `footregion_footregion_joueurs` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `poste` varchar(50) NOT NULL,
  `num_licence` varchar(50) NOT NULL,
  `date_naiss` date NOT NULL DEFAULT '0000-00-00',
  `equipes_id` int(11) NOT NULL DEFAULT '1',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `footregion_footregion_joueurs`
--

INSERT INTO `footregion_footregion_joueurs` (`id`, `email`, `poste`, `num_licence`, `date_naiss`, `equipes_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', '', '2000-10-24', 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'jmarque@footregion.fr', '', '', '2000-10-21', 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(3, 'tbut@footregion.fr', '', '', '2000-10-07', 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(5, 'adurand@footregion.fr', '', '', '0000-00-00', 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(6, 'mdupond@footregion.fr', '', '', '0000-00-00', 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(7, 'pnalty@footregion.fr', '', '', '0000-00-00', 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(11, 'vjunior@gmail.com', '', '', '2000-07-12', 5, '', 1, '2018-11-05 09:23:41', 35, '0000-00-00 00:00:00', 0, 0),
(12, 'brahim.chebak@gmail.com', 'G', '1 234 567 890', '2011-11-22', 2, '', 1, '2018-11-06 13:14:32', 35, '0000-00-00 00:00:00', 0, 0),
(13, 'masensio@footregion.fr', 'ATT', '9 999 999 999', '1991-11-06', 3, '', 1, '2018-11-06 15:55:01', 35, '2018-11-06 15:56:50', 35, 0);

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
-- Contenu de la table `footregion_footregion_matchs`
--

INSERT INTO `footregion_footregion_matchs` (`id`, `date_heure`, `score_domicile`, `score_invite`, `nom`, `adr_rue`, `adr_ville`, `adr_cp`, `coord_gps`, `equipes_invite_id`, `equipes_domicile_id`, `entraineurs_invite_id`, `entraineurs_initiateur_id`, `tournois_id`, `statuts_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '2018-10-24 00:00:00', 0, 0, '-', '', '', '', '', 1, 1, 1, 1, 1, 1, '', 1, '2018-10-24 00:00:00', 0, '0000-00-00 00:00:00', 45, 0),
(2, '2018-10-26 13:00:00', 0, 0, 'Match test 1', '', '', '', '', 1, 1, 1, 1, 1, 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(3, '2018-11-14 00:00:00', 0, 0, 'Senior 1', '5 rue du loup', 'Marseille', '04530', 'E78964,N4544', 5, 2, 5, 2, 5, 2, 'junior-1', 1, '2018-11-08 15:16:12', 35, '2018-11-08 15:16:20', 35, 0),
(4, '2018-11-17 00:00:00', 0, 0, 'Vétérans Edition', '107 avenue Bernard', 'Lyon', '76520', 'E456*9,S485', 6, 3, 6, 2, 2, 5, 'veterans-edition', 1, '2018-11-08 15:18:01', 35, '2018-11-08 15:18:11', 35, 0),
(5, '2018-11-01 00:00:00', 4, 2, 'Amical U16/17', '7 impasse du clos', 'Épône', '78680', 'N15971,S4318', 4, 4, 4, 4, 4, 3, 'amical-u16-17', 1, '2018-11-08 15:19:46', 35, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `footregion_footregion_matchs_arbitres`
--

CREATE TABLE `footregion_footregion_matchs_arbitres` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `matchs_id` int(11) NOT NULL DEFAULT '1',
  `arbitres_id` int(11) NOT NULL DEFAULT '1',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `footregion_footregion_matchs_arbitres`
--

INSERT INTO `footregion_footregion_matchs_arbitres` (`id`, `role`, `matchs_id`, `arbitres_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', 1, 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'Central', 2, 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(3, 'Central', 2, 4, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(4, 'Central', 2, 5, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(5, 'Central', 2, 3, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(6, 'Central', 2, 6, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `footregion_footregion_messages`
--

CREATE TABLE `footregion_footregion_messages` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `discussions_id` int(11) NOT NULL DEFAULT '1',
  `utilisateurs_id` int(11) NOT NULL DEFAULT '1',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `footregion_footregion_messages`
--

INSERT INTO `footregion_footregion_messages` (`id`, `libelle`, `discussions_id`, `utilisateurs_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', 1, 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'Bonjour, pour ceux que cela intéresse, j ai 3 places dans ma voiture pour aller au match de samedi 27/10.', 2, 8, '', 1, '2018-10-26 11:21:00', 42, '0000-00-00 00:00:00', 0, 0),
(3, 'Etre jeune, Avoir du fun, Tester ballon', 3, 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(4, 'Pour vous, Foot est inépuisable', 3, 5, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(5, 'massacre n a pas de prix', 3, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(6, 'ferme ta gueule. Qui peut le battre ? ', 4, 7, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(7, 'Avec tournoi tout est clair', 5, 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(8, 'Peut-on envisager un repas sans match ?', 5, 6, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(9, 'ronaldo n est pas né de la dernière pluie ', 5, 4, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(10, 'C est tous les jours la fête avec messi ', 5, 8, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(11, '2 secondes ça c est fort de fruits', 6, 5, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(12, 'L entraineur is magic !', 6, 4, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(13, 'Pogba crie tout haut ce que vous pensez tout bas', 6, 3, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(14, 'Vien au match demain tu l aimes ou tu le quittes', 7, 6, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(15, 'Dribbles. It s a bit strong !', 8, 5, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(16, 'Arbre ça change l école', 8, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(17, 'Une envie, un délice, un ronaldinho', 8, 5, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(18, 'Avant la roberto carlos, deux guerres mondiales. Après la roberto carlos, zéro.', 8, 9, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(19, 'Le futur choisit crespo - Prenez votre futur en main', 9, 8, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(20, 'Inzaghi est le seul moyen d être heureux', 9, 7, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(21, 'papa et vos idées ont du génie', 10, 3, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(22, 'Si c est Pelé j y vais aussi', 10, 5, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(23, 'maradonna est plus bon que le chocolat ! ', 10, 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(24, 'Elle a quelque chose en plus, et si c était okocha ?', 11, 5, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(25, 'podolski wa-wa-wa-Hamdoulah ça va ! ', 11, 4, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(26, 'Rien n est trop bon pour Anelka', 11, 6, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(27, 'Vidic president !', 11, 7, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(28, 'Zidane et ça repart', 11, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(29, 'Gullit pèse lourd sur le web', 11, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(30, 'Peut-on envisager un repas sans Cruyff ?', 12, 8, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(31, 'Schevchenko, ça déchire', 12, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(32, 'Ferdinand a un coeur gros comme ça', 13, 9, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(33, 'Zico c est Halla Halla !', 13, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(34, 'Platini est ce que le monde attendait ', 13, 9, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(35, 'Hagi, c est beau la vie pour les grands et les petits', 14, 10, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(36, 'You make Rui Costa real', 14, 5, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(37, 'Oh mon Dieu ! c est Alex de souza !', 14, 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(38, 'Mon eau minceur c est Maldini', 15, 5, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(39, 'Zlatan. Opportunity. Quality. Achievement.', 15, 1, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(40, 'Modric ne s use jamais', 15, 3, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(41, 'Yachine, ça fait mal, ça fait mal', 15, 6, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `footregion_footregion_signalements`
--

CREATE TABLE `footregion_footregion_signalements` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `arbitres_id` int(11) NOT NULL DEFAULT '1',
  `entraineurs_id` int(11) NOT NULL DEFAULT '1',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `footregion_footregion_signalements`
--

INSERT INTO `footregion_footregion_signalements` (`id`, `libelle`, `arbitres_id`, `entraineurs_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', 1, 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'Hors-jeu', 3, 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(3, 'Corner', 5, 3, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(4, 'Avertissement', 6, 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(5, 'Penalty', 4, 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(6, 'Expulsion', 4, 2, '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `footregion_footregion_statuts`
--

CREATE TABLE `footregion_footregion_statuts` (
  `id` int(11) NOT NULL,
  `statut` varchar(50) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `footregion_footregion_statuts`
--

INSERT INTO `footregion_footregion_statuts` (`id`, `statut`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, '1 - Proposé', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(3, '2 - Accepté', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(4, '3 - Refusé', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(5, '4 - Reporté', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(6, '5 - En cours', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(7, '6 - Terminé', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0);

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
-- Contenu de la table `footregion_footregion_tournois`
--

INSERT INTO `footregion_footregion_tournois` (`id`, `nom`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'Champion', 'champion', 1, '2018-11-06 15:35:47', 35, '0000-00-00 00:00:00', 0, 0),
(3, 'Intercommunal d Iser', 'intercommunal-d-iser', 1, '2018-11-08 14:09:10', 35, '0000-00-00 00:00:00', 0, 0),
(4, 'Challenge Bouilhaguet', 'challenge-bouilhaguet', 1, '2018-11-08 14:11:29', 35, '0000-00-00 00:00:00', 0, 0),
(5, 'Tournoi paques', 'tournoi-paques', 1, '2018-11-08 14:11:39', 35, '0000-00-00 00:00:00', 0, 0),
(6, 'Tournoi Futsal de l AFAF', 'tournois-de-foot-foot-en-salle-tournoi-futsal-de-l-afaf', 1, '2018-11-08 14:11:54', 35, '2018-11-08 14:12:23', 35, 0);

-- --------------------------------------------------------

--
-- Structure de la table `footregion_footregion_utilisateurs`
--

CREATE TABLE `footregion_footregion_utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `footregion_footregion_utilisateurs`
--

INSERT INTO `footregion_footregion_utilisateurs` (`id`, `nom`, `prenom`, `mobile`, `email`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(2, 'DUPOND', 'Marcel', '0645124578', 'mdupond@footregion.fr', 'dupond-marcel', 1, '0000-00-00 00:00:00', 45, '2018-10-24 15:03:26', 35, 0),
(3, 'DURAND', 'Alphonse', '0689845762', 'adurand@footregion.fr', 'durand-alphonse', 1, '0000-00-00 00:00:00', 45, '2018-10-24 15:01:33', 35, 0),
(4, 'NALTY', 'Pierre', '0678125689', 'pnalty@footregion.fr', 'nalty-pierre', 1, '0000-00-00 00:00:00', 45, '2018-10-24 15:04:59', 35, 0),
(5, 'BOSS', 'Hugo', '0604030201', 'hboss@footregion.fr', 'boss', 1, '2018-10-24 14:35:59', 45, '0000-00-00 00:00:00', 0, 0),
(6, 'NOTE', 'Ivan', '', 'inote@footregion.fr', 'note', 1, '2018-10-24 14:49:00', 45, '0000-00-00 00:00:00', 0, 0),
(7, 'FRAIS', 'Sami', '', 'sfrais@footregion.fr', 'frais', 1, '2018-10-24 14:49:32', 45, '0000-00-00 00:00:00', 0, 0),
(8, 'MARQUE', 'Jean', '', 'jmarque@footregion.fr', 'marque', 1, '2018-10-24 14:50:02', 45, '2018-10-24 14:58:41', 35, 0),
(9, 'BUT', 'Théo', '', 'tbut@footregion.fr', 'but', 1, '2018-10-24 14:50:31', 45, '0000-00-00 00:00:00', 0, 0),
(10, 'HOCHON', 'Paul', '', 'phochon@footregion.fr', 'hochon', 1, '2018-10-24 14:51:04', 45, '2018-10-24 14:53:15', 35, 0),
(21, 'PARENTEAU', 'Guy', '0444897789', 'guyparenteau@footregion.fr', 'parenteau', 1, '2018-11-08 13:57:08', 35, '2018-11-08 14:01:13', 35, 0),
(22, 'DAVIGNON', 'Vaden', '0164974410', 'vadendavignon@footregion.fr', 'davignon', 1, '2018-11-08 13:57:55', 35, '2018-11-08 14:00:36', 35, 0),
(23, 'BARRIENTOS', 'Maurice', '0563550978', 'mauricebarrientos@footregion.fr', 'barrientos', 1, '2018-11-08 14:00:25', 35, '0000-00-00 00:00:00', 0, 0),
(24, 'AYOT', 'Aleron', '0105573281', 'aleronayot@footregion.fr', 'ayot', 1, '2018-11-08 14:02:51', 35, '2018-11-08 14:03:20', 35, 0),
(25, 'CARON', 'Artus', '0247002196', 'artuscaron@footregion.fr', 'caron', 1, '2018-11-08 14:04:42', 35, '0000-00-00 00:00:00', 0, 0),
(26, 'JOSHUA', 'Barker', '0463446310', 'JoshuaBarker@footregion.fr', 'joshua', 1, '2018-11-08 14:02:51', 35, '2018-11-08 14:03:20', 35, 0),
(27, 'CHRISTOPHER', 'Morton', '0240835925', 'ChristopherMorton@footregion.fr', 'christopher', 1, '2018-11-08 14:02:51', 35, '2018-11-08 14:03:20', 35, 0),
(28, 'JASON', 'Mitchell', '0423670188', 'JasonMitchell@footregion.fr', 'jason', 1, '2018-11-08 14:02:51', 35, '2018-11-08 14:03:20', 35, 0),
(29, 'DANIEL', 'Davison', '0540209485', 'DanielDavison@footregion.fr', 'daniel', 1, '2018-11-08 14:02:51', 35, '2018-11-08 14:03:20', 35, 0),
(30, 'JOHN', 'Castro', '0188308420', 'JohnCastro@footregion.fr', 'john', 1, '2018-11-08 14:02:51', 35, '2018-11-08 14:03:20', 35, 0),
(31, 'DAVID', 'Parsons', '0599683950', 'DavidParsons@footregion.fr', 'david', 1, '2018-11-08 14:02:51', 35, '2018-11-08 14:03:20', 35, 0),
(32, 'ROBERT', 'Higgins', '0421599364', 'RobertHiggins@footregion.fr', 'robert', 1, '2018-11-08 14:02:51', 35, '2018-11-08 14:03:20', 35, 0),
(33, 'JOSEPH', 'Frost', '0413941270', 'JosephFrost@footregion.fr', 'joseph', 1, '2018-11-08 14:02:51', 35, '2018-11-08 14:03:20', 35, 0),
(34, 'MICHAEL', 'Matthews', '0413991270', 'MichaelMatthews@footregion.fr', 'michael', 1, '2018-11-08 14:02:51', 35, '2018-11-08 14:03:20', 35, 0),
(35, 'MATTHEW', 'Houston', '0413941270', 'MatthewHouston@footregion.fr', 'matthew', 1, '2018-11-08 14:02:51', 35, '2018-11-08 14:03:20', 35, 0),
(36, 'JAMES', 'Mohamed', '0419752827', 'JamesMohamed@footregion.fr', 'james', 1, '2018-11-08 14:02:51', 35, '2018-11-08 14:03:20', 35, 0),
(37, 'ANDREW', 'Jackson', '0165237099', 'AndrewJackson@footregion.fr', 'andrew', 1, '2018-11-08 14:02:51', 35, '2018-11-08 14:03:20', 35, 0),
(38, 'Entraineur', 'Un', '0658897541', 'entraineur1@gmail.com', 'entraineur', 1, '2018-11-08 15:41:58', 35, '0000-00-00 00:00:00', 0, 0),
(39, 'Sieye', 'Armand', '0698787451', 'asieye@footregion.fr', 'sieye', 1, '2018-11-08 15:42:32', 35, '0000-00-00 00:00:00', 0, 0),
(40, 'Forson', 'Allan', '0780987456', 'aforson@footregion.fr', 'forson', 1, '2018-11-08 15:43:01', 35, '0000-00-00 00:00:00', 0, 0),
(41, 'Junior', 'Vinicius', '0589745621', 'vjunior@gmail.com', 'junior', 1, '2018-11-08 16:03:35', 35, '0000-00-00 00:00:00', 0, 0),
(42, 'Chebak', 'Brahim', '0789845414', 'brahim.chebak@gmail.com', 'chebak', 1, '2018-11-08 16:04:50', 35, '0000-00-00 00:00:00', 0, 0),
(43, 'Asensio', 'Marco', '0898452874', 'masensio@footregion.fr', 'asensio', 1, '2018-11-08 16:06:27', 35, '0000-00-00 00:00:00', 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `footregion_footregion_arbitres`
--
ALTER TABLE `footregion_footregion_arbitres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_footregion_footregion_arbitres_email` (`email`) USING BTREE;

--
-- Index pour la table `footregion_footregion_categories`
--
ALTER TABLE `footregion_footregion_categories`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `footregion_footregion_discussions`
--
ALTER TABLE `footregion_footregion_discussions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_footregion_footregion_discussions_utilisateurs_id` (`utilisateurs_id`);

--
-- Index pour la table `footregion_footregion_entraineurs`
--
ALTER TABLE `footregion_footregion_entraineurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_footregion_footregion_entraineurs_email` (`email`) USING BTREE;

--
-- Index pour la table `footregion_footregion_equipes`
--
ALTER TABLE `footregion_footregion_equipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_footregion_footregion_equipes_categories_id` (`categories_id`),
  ADD KEY `fk_footregion_footregion_equipes_entraineurs_id` (`entraineurs_id`),
  ADD KEY `fk_footregion_footregion_equipes_clubs_id` (`clubs_id`);

--
-- Index pour la table `footregion_footregion_joueurs`
--
ALTER TABLE `footregion_footregion_joueurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_footregion_footregion_joueurs_email` (`email`) USING BTREE,
  ADD KEY `fk_footregion_footregion_joueurs_equipes_id` (`equipes_id`);

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
-- Index pour la table `footregion_footregion_matchs_arbitres`
--
ALTER TABLE `footregion_footregion_matchs_arbitres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_footregion_footregion_matchs_arbitres_matchs_id` (`matchs_id`),
  ADD KEY `fk_footregion_footregion_matchs_arbitres_arbitres_id` (`arbitres_id`);

--
-- Index pour la table `footregion_footregion_messages`
--
ALTER TABLE `footregion_footregion_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_footregion_footregion_messages_discussions_id` (`discussions_id`),
  ADD KEY `fk_footregion_footregion_messages_utilisateurs_id` (`utilisateurs_id`);

--
-- Index pour la table `footregion_footregion_signalements`
--
ALTER TABLE `footregion_footregion_signalements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_footregion_footregion_signalements_arbitres_id` (`arbitres_id`),
  ADD KEY `fk_footregion_footregion_signalements_entraineurs_id` (`entraineurs_id`);

--
-- Index pour la table `footregion_footregion_statuts`
--
ALTER TABLE `footregion_footregion_statuts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `footregion_footregion_tournois`
--
ALTER TABLE `footregion_footregion_tournois`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `footregion_footregion_utilisateurs`
--
ALTER TABLE `footregion_footregion_utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_footregion_footregion_utilisateurs_email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `footregion_footregion_arbitres`
--
ALTER TABLE `footregion_footregion_arbitres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `footregion_footregion_categories`
--
ALTER TABLE `footregion_footregion_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `footregion_footregion_clubs`
--
ALTER TABLE `footregion_footregion_clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `footregion_footregion_directeurs`
--
ALTER TABLE `footregion_footregion_directeurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `footregion_footregion_discussions`
--
ALTER TABLE `footregion_footregion_discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `footregion_footregion_entraineurs`
--
ALTER TABLE `footregion_footregion_entraineurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `footregion_footregion_equipes`
--
ALTER TABLE `footregion_footregion_equipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `footregion_footregion_joueurs`
--
ALTER TABLE `footregion_footregion_joueurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `footregion_footregion_matchs`
--
ALTER TABLE `footregion_footregion_matchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `footregion_footregion_matchs_arbitres`
--
ALTER TABLE `footregion_footregion_matchs_arbitres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `footregion_footregion_messages`
--
ALTER TABLE `footregion_footregion_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `footregion_footregion_signalements`
--
ALTER TABLE `footregion_footregion_signalements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `footregion_footregion_statuts`
--
ALTER TABLE `footregion_footregion_statuts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `footregion_footregion_tournois`
--
ALTER TABLE `footregion_footregion_tournois`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `footregion_footregion_utilisateurs`
--
ALTER TABLE `footregion_footregion_utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
