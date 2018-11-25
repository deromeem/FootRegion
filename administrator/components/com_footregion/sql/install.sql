--
-- Base de données :  `footregion`
--

-- --------------------------------------------------------

--
-- Structure de la table `#__footregion_arbitres`
--

CREATE TABLE `#__footregion_arbitres` (
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
-- Déchargement des données de la table `#__footregion_arbitres`
--

INSERT INTO `#__footregion_arbitres` (`id`, `email`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'phochon@footregion.fr', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__footregion_categories`
--

CREATE TABLE `#__footregion_categories` (
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
-- Déchargement des données de la table `#__footregion_categories`
--

INSERT INTO `#__footregion_categories` (`id`, `nom`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
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
-- Structure de la table `#__footregion_clubs`
--

CREATE TABLE `#__footregion_clubs` (
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
-- Déchargement des données de la table `#__footregion_clubs`
--

INSERT INTO `#__footregion_clubs` (`id`, `sigle`, `nom`, `adr_rue`, `adr_ville`, `adr_cp`, `directeurs_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', '', '', '', 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'UFBSJA', 'Union Football Belleville Saint Jean d\'Ardières', '', '', '', 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__footregion_directeurs`
--

CREATE TABLE `#__footregion_directeurs` (
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
-- Déchargement des données de la table `#__footregion_directeurs`
--

INSERT INTO `#__footregion_directeurs` (`id`, `email`, `date_affectation`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '0000-00-00', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'hboss@footregion.fr', '0000-00-00', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__footregion_discussions`
--

CREATE TABLE `#__footregion_discussions` (
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
-- Déchargement des données de la table `#__footregion_discussions`
--

INSERT INTO `#__footregion_discussions` (`id`, `theme`, `utilisateurs_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'Covoiturage samedi 27/10 équipe UFBSJA-Seniors-1', 8, '', 1, '2018-10-26 00:00:00', 42, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__footregion_entraineurs`
--

CREATE TABLE `#__footregion_entraineurs` (
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
-- Déchargement des données de la table `#__footregion_entraineurs`
--

INSERT INTO `#__footregion_entraineurs` (`id`, `email`, `num_licence`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'inote@footregion.fr', '', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(3, 'sfrais@footregion.fr', '', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__footregion_equipes`
--

CREATE TABLE `#__footregion_equipes` (
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
-- Déchargement des données de la table `#__footregion_equipes`
--

INSERT INTO `#__footregion_equipes` (`id`, `nom`, `clubs_id`, `categories_id`, `entraineurs_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', 1, 1, 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'UFBSJA-Seniors-1', 2, 7, 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__footregion_joueurs`
--

CREATE TABLE `#__footregion_joueurs` (
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
-- Déchargement des données de la table `#__footregion_joueurs`
--

INSERT INTO `#__footregion_joueurs` (`id`, `email`, `poste`, `num_licence`, `date_naiss`, `equipes_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', '', '2000-10-24', 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'jmarque@footregion.fr', '', '', '2000-10-21', 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(3, 'tbut@footregion.fr', '', '', '2000-10-07', 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(5, 'adurand@footregion.fr', '', '', '2000-05-12', 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(6, 'mdupond@footregion.fr', '', '', '2000-04-25', 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(7, 'pnalty@footregion.fr', '', '', '2000-02-04', 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__footregion_matchs`
--

CREATE TABLE `#__footregion_matchs` (
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
-- Déchargement des données de la table `#__footregion_matchs`
--

INSERT INTO `#__footregion_matchs` (`id`, `date_heure`, `score_domicile`, `score_invite`, `nom`, `adr_rue`, `adr_ville`, `adr_cp`, `coord_gps`, `equipes_invite_id`, `equipes_domicile_id`, `entraineurs_invite_id`, `entraineurs_initiateur_id`, `tournois_id`, `statuts_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '2018-10-24 00:00:00', 0, 0, '-', '', '', '', '', 1, 1, 1, 1, 1, 1, '', 1, '2018-10-24 00:00:00', 0, '0000-00-00 00:00:00', 45, 0),
(2, '2018-10-26 13:00:00', 0, 0, 'Match test 1', '', '', '', '', 1, 1, 1, 1, 1, 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__footregion_matchs_arbitres`
--

CREATE TABLE `#__footregion_matchs_arbitres` (
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
-- Déchargement des données de la table `#__footregion_matchs_arbitres`
--

INSERT INTO `#__footregion_matchs_arbitres` (`id`, `role`, `matchs_id`, `arbitres_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', 1, 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'Central', 2, 2, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__footregion_messages`
--

CREATE TABLE `#__footregion_messages` (
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
-- Déchargement des données de la table `#__footregion_messages`
--

INSERT INTO `#__footregion_messages` (`id`, `libelle`, `discussions_id`, `utilisateurs_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', 1, 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, 'Bonjour, pour ceux que cela intéresse, j\'ai 3 places dans ma voiture pour aller au match de samedi 27/10.', 2, 8, '', 1, '2018-10-26 11:21:00', 42, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__footregion_signalements`
--

CREATE TABLE `#__footregion_signalements` (
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
-- Déchargement des données de la table `#__footregion_signalements`
--

INSERT INTO `#__footregion_signalements` (`id`, `libelle`, `arbitres_id`, `entraineurs_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', 1, 1, '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__footregion_statuts`
--

CREATE TABLE `#__footregion_statuts` (
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
-- Déchargement des données de la table `#__footregion_statuts`
--

INSERT INTO `#__footregion_statuts` (`id`, `statut`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(2, '1 - Proposé', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(3, '2 - Accepté', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(4, '3 - Refusé', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(5, '4 - Reporté', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(6, '5 - En cours', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0),
(7, '6 - Terminé', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__footregion_tournois`
--

CREATE TABLE `#__footregion_tournois` (
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
-- Déchargement des données de la table `#__footregion_tournois`
--

INSERT INTO `#__footregion_tournois` (`id`, `nom`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', 1, '2018-10-24 00:00:00', 45, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `#__footregion_utilisateurs`
--

CREATE TABLE `#__footregion_utilisateurs` (
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
-- Déchargement des données de la table `#__footregion_utilisateurs`
--

INSERT INTO `#__footregion_utilisateurs` (`id`, `nom`, `prenom`, `mobile`, `email`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(1, '-', '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(2, 'DUPOND', 'Marcel', '0645124578', 'mdupond@footregion.fr', 'dupond-marcel', 1, '0000-00-00 00:00:00', 45, '2018-10-24 15:03:26', 35, 0),
(3, 'DURAND', 'Alphonse', '0689845762', 'adurand@footregion.fr', 'durand-alphonse', 1, '0000-00-00 00:00:00', 45, '2018-10-24 15:01:33', 35, 0),
(4, 'NALTY', 'Pierre', '0678125689', 'pnalty@footregion.fr', 'nalty-pierre', 1, '0000-00-00 00:00:00', 45, '2018-10-24 15:04:59', 35, 0),
(5, 'BOSS', 'Hugo', '0604030201', 'hboss@footregion.fr', 'boss', 1, '2018-10-24 14:35:59', 45, '0000-00-00 00:00:00', 0, 0),
(6, 'NOTE', 'Ivan', '', 'inote@footregion.fr', 'note', 1, '2018-10-24 14:49:00', 45, '0000-00-00 00:00:00', 0, 0),
(7, 'FRAIS', 'Sami', '', 'sfrais@footregion.fr', 'frais', 1, '2018-10-24 14:49:32', 45, '0000-00-00 00:00:00', 0, 0),
(8, 'MARQUE', 'Jean', '', 'jmarque@footregion.fr', 'marque', 1, '2018-10-24 14:50:02', 45, '2018-10-24 14:58:41', 35, 0),
(9, 'BUT', 'Théo', '', 'tbut@footregion.fr', 'but', 1, '2018-10-24 14:50:31', 45, '0000-00-00 00:00:00', 0, 0),
(10, 'HOCHON', 'Paul', '', 'phochon@footregion.fr', 'hochon', 1, '2018-10-24 14:51:04', 45, '2018-10-24 14:53:15', 35, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `#__footregion_arbitres`
--
ALTER TABLE `#__footregion_arbitres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_#__footregion_arbitres_email` (`email`) USING BTREE;

--
-- Index pour la table `#__footregion_categories`
--
ALTER TABLE `#__footregion_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `#__footregion_clubs`
--
ALTER TABLE `#__footregion_clubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_#__footregion_clubs_directeurs_id` (`directeurs_id`);

--
-- Index pour la table `#__footregion_directeurs`
--
ALTER TABLE `#__footregion_directeurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_#__footregion_directeurs_email` (`email`) USING BTREE;

--
-- Index pour la table `#__footregion_discussions`
--
ALTER TABLE `#__footregion_discussions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_#__footregion_discussions_utilisateurs_id` (`utilisateurs_id`);

--
-- Index pour la table `#__footregion_entraineurs`
--
ALTER TABLE `#__footregion_entraineurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_#__footregion_entraineurs_email` (`email`) USING BTREE;

--
-- Index pour la table `#__footregion_equipes`
--
ALTER TABLE `#__footregion_equipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_#__footregion_equipes_categories_id` (`categories_id`),
  ADD KEY `fk_#__footregion_equipes_entraineurs_id` (`entraineurs_id`),
  ADD KEY `fk_#__footregion_equipes_clubs_id` (`clubs_id`);

--
-- Index pour la table `#__footregion_joueurs`
--
ALTER TABLE `#__footregion_joueurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_#__footregion_joueurs_email` (`email`) USING BTREE,
  ADD KEY `fk_#__footregion_joueurs_equipes_id` (`equipes_id`);

--
-- Index pour la table `#__footregion_matchs`
--
ALTER TABLE `#__footregion_matchs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_#__footregion_matchs_entraineurs_initiateur_id` (`entraineurs_initiateur_id`),
  ADD KEY `fk_#__footregion_matchs_entraineurs_invite_id` (`entraineurs_invite_id`),
  ADD KEY `fk_#__footregion_matchs_equipes_domicile_id` (`equipes_domicile_id`),
  ADD KEY `fk_#__footregion_matchs_equipes_invite_id` (`equipes_invite_id`),
  ADD KEY `fk_#__footregion_matchs_statuts_id` (`statuts_id`),
  ADD KEY `fk_#__footregion_matchs_tournois_id` (`tournois_id`);

--
-- Index pour la table `#__footregion_matchs_arbitres`
--
ALTER TABLE `#__footregion_matchs_arbitres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_#__footregion_matchs_arbitres_matchs_id` (`matchs_id`),
  ADD KEY `fk_#__footregion_matchs_arbitres_arbitres_id` (`arbitres_id`);

--
-- Index pour la table `#__footregion_messages`
--
ALTER TABLE `#__footregion_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_#__footregion_messages_discussions_id` (`discussions_id`),
  ADD KEY `fk_#__footregion_messages_utilisateurs_id` (`utilisateurs_id`);

--
-- Index pour la table `#__footregion_signalements`
--
ALTER TABLE `#__footregion_signalements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_#__footregion_signalements_arbitres_id` (`arbitres_id`),
  ADD KEY `fk_#__footregion_signalements_entraineurs_id` (`entraineurs_id`);

--
-- Index pour la table `#__footregion_statuts`
--
ALTER TABLE `#__footregion_statuts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `#__footregion_tournois`
--
ALTER TABLE `#__footregion_tournois`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `#__footregion_utilisateurs`
--
ALTER TABLE `#__footregion_utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_#__footregion_utilisateurs_email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `#__footregion_arbitres`
--
ALTER TABLE `#__footregion_arbitres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `#__footregion_categories`
--
ALTER TABLE `#__footregion_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `#__footregion_clubs`
--
ALTER TABLE `#__footregion_clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `#__footregion_directeurs`
--
ALTER TABLE `#__footregion_directeurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `#__footregion_discussions`
--
ALTER TABLE `#__footregion_discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `#__footregion_entraineurs`
--
ALTER TABLE `#__footregion_entraineurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `#__footregion_equipes`
--
ALTER TABLE `#__footregion_equipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `#__footregion_joueurs`
--
ALTER TABLE `#__footregion_joueurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `#__footregion_matchs`
--
ALTER TABLE `#__footregion_matchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `#__footregion_matchs_arbitres`
--
ALTER TABLE `#__footregion_matchs_arbitres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `#__footregion_messages`
--
ALTER TABLE `#__footregion_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `#__footregion_signalements`
--
ALTER TABLE `#__footregion_signalements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `#__footregion_statuts`
--
ALTER TABLE `#__footregion_statuts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `#__footregion_tournois`
--
ALTER TABLE `#__footregion_tournois`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `#__footregion_utilisateurs`
--
ALTER TABLE `#__footregion_utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `#__footregion_clubs`
--
ALTER TABLE `#__footregion_clubs`
  ADD CONSTRAINT `fk_#__footregion_clubs_directeurs_id` FOREIGN KEY (`directeurs_id`) REFERENCES `#__footregion_directeurs` (`id`);

--
-- Contraintes pour la table `#__footregion_discussions`
--
ALTER TABLE `#__footregion_discussions`
  ADD CONSTRAINT `fk_#__footregion_discussions_utilisateurs_id` FOREIGN KEY (`utilisateurs_id`) REFERENCES `#__footregion_utilisateurs` (`id`);

--
-- Contraintes pour la table `#__footregion_equipes`
--
ALTER TABLE `#__footregion_equipes`
  ADD CONSTRAINT `fk_#__footregion_equipes_categories_id` FOREIGN KEY (`categories_id`) REFERENCES `#__footregion_categories` (`id`),
  ADD CONSTRAINT `fk_#__footregion_equipes_clubs_id` FOREIGN KEY (`clubs_id`) REFERENCES `#__footregion_clubs` (`id`),
  ADD CONSTRAINT `fk_#__footregion_equipes_entraineurs_id` FOREIGN KEY (`entraineurs_id`) REFERENCES `#__footregion_entraineurs` (`id`);

--
-- Contraintes pour la table `#__footregion_joueurs`
--
ALTER TABLE `#__footregion_joueurs`
  ADD CONSTRAINT `fk_#__footregion_joueurs_equipes_id` FOREIGN KEY (`equipes_id`) REFERENCES `#__footregion_equipes` (`id`);

--
-- Contraintes pour la table `#__footregion_matchs`
--
ALTER TABLE `#__footregion_matchs`
  ADD CONSTRAINT `fk_#__footregion_matchs_entraineurs_initiateur_id` FOREIGN KEY (`entraineurs_initiateur_id`) REFERENCES `#__footregion_entraineurs` (`id`),
  ADD CONSTRAINT `fk_#__footregion_matchs_entraineurs_invite_id` FOREIGN KEY (`entraineurs_invite_id`) REFERENCES `#__footregion_entraineurs` (`id`),
  ADD CONSTRAINT `fk_#__footregion_matchs_equipes_domicile_id` FOREIGN KEY (`equipes_domicile_id`) REFERENCES `#__footregion_equipes` (`id`),
  ADD CONSTRAINT `fk_#__footregion_matchs_equipes_invite_id` FOREIGN KEY (`equipes_invite_id`) REFERENCES `#__footregion_equipes` (`id`),
  ADD CONSTRAINT `fk_#__footregion_matchs_statuts_id` FOREIGN KEY (`statuts_id`) REFERENCES `#__footregion_statuts` (`id`),
  ADD CONSTRAINT `fk_#__footregion_matchs_tournois_id` FOREIGN KEY (`tournois_id`) REFERENCES `#__footregion_tournois` (`id`);

--
-- Contraintes pour la table `#__footregion_matchs_arbitres`
--
ALTER TABLE `#__footregion_matchs_arbitres`
  ADD CONSTRAINT `fk_#__footregion_matchs_arbitres_arbitres_id` FOREIGN KEY (`arbitres_id`) REFERENCES `#__footregion_arbitres` (`id`),
  ADD CONSTRAINT `fk_#__footregion_matchs_arbitres_matchs_id` FOREIGN KEY (`matchs_id`) REFERENCES `#__footregion_matchs` (`id`);

--
-- Contraintes pour la table `#__footregion_messages`
--
ALTER TABLE `#__footregion_messages`
  ADD CONSTRAINT `fk_#__footregion_messages_discussions_id` FOREIGN KEY (`discussions_id`) REFERENCES `#__footregion_discussions` (`id`),
  ADD CONSTRAINT `fk_#__footregion_messages_utilisateurs_id` FOREIGN KEY (`utilisateurs_id`) REFERENCES `#__footregion_utilisateurs` (`id`);

--
-- Contraintes pour la table `#__footregion_signalements`
--
ALTER TABLE `#__footregion_signalements`
  ADD CONSTRAINT `fk_#__footregion_signalements_arbitres_id` FOREIGN KEY (`arbitres_id`) REFERENCES `#__footregion_arbitres` (`id`),
  ADD CONSTRAINT `fk_#__footregion_signalements_entraineurs_id	` FOREIGN KEY (`entraineurs_id`) REFERENCES `#__footregion_entraineurs` (`id`);
COMMIT;
