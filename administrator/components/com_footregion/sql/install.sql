--
-- Structure de la table `#__footregion_utilisateurs`
--
CREATE TABLE IF NOT EXISTS `#__footregion_utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `date_naiss` datetime NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `hits` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `#__footregion_utilisateurs`
--
INSERT INTO `#__footregion_utilisateurs` (`id`, `nom`, `prenom`, `email`, `mobile`, `published`) VALUES
(1, '-', '', '', '', 0),
(2, 'DUPOND', 'Marcel', 'mdupond@gmail.com', '0645124578', 1),
(3, 'DURAND', 'Annie', 'adurand@gmail.com', '0689845762', 1),
(4, 'MARTIN', 'Pierre', 'pmartin@gmail.com', '0678125689', 1);
