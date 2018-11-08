INSERT INTO `footregion_footregion_entraineurs` (`id`, `email`, `num_licence`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(4, 'entraineur1@gmail.com', '0 123 456 789', '', 1, '2018-11-06 13:19:44', 35, '0000-00-00 00:00:00', 0, 0),
(5, 'asieye@footregion.fr', '6 666 666 666', '', 1, '2018-11-08 13:03:35', 35, '0000-00-00 00:00:00', 0, 0),
(6, 'aforson@footregion.fr', '5 486 877 154', '', 1, '2018-11-08 13:11:13', 35, '0000-00-00 00:00:00', 0, 0);


INSERT INTO `footregion_footregion_equipes` (`id`, `nom`, `clubs_id`, `categories_id`, `entraineurs_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(3, 'UFBSJA-Véterans-1', 2, 8, 2, 'ufbsja-veterans-2', 1, '2018-11-06 13:23:28', 35, '2018-11-06 13:24:55', 35, 0),
(4, 'FCA-U16-U17-2', 8, 5, 6, 'fca-u16-u17-2', 1, '2018-11-08 14:05:34', 35, '0000-00-00 00:00:00', 0, 0),
(5, 'FSR-Séniors-1', 9, 7, 5, 'fsr-seniors-1', 1, '2018-11-08 14:06:31', 35, '0000-00-00 00:00:00', 0, 0),
(6, 'HFC-Vétérans+45-2', 10, 9, 4, 'hfc-veterans-45-2', 1, '2018-11-08 14:06:58', 35, '0000-00-00 00:00:00', 0, 0);

INSERT INTO `footregion_footregion_joueurs` (`id`, `email`, `poste`, `num_licence`, `date_naiss`, `equipes_id`, `alias`, `published`, `created`, `created_by`, `modified`, `modified_by`, `hits`) VALUES
(8, 'vjunior@gmail.com', '', '', '2000-07-12', 1, '', 1, '2018-11-05 09:23:41', 35, '0000-00-00 00:00:00', 0, 0),
(9, 'brahim.chebak@gmail.com', 'G', '1 234 567 890', '2011-11-22', 2, '', 1, '2018-11-06 13:14:32', 35, '0000-00-00 00:00:00', 0, 0),
(10, 'masensio@footregion.fr', 'ATT', '9 999 999 999', '1991-11-06', 3, '', 1, '2018-11-06 15:55:01', 35, '2018-11-06 15:56:50', 35, 0);
