-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 26 oct. 2018 à 15:11
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

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
-- Structure de la vue `footregion_vue_joueurs`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `footregion_vue_joueurs`  AS  select `u`.`id` AS `id`,`u`.`nom` AS `nom`,`u`.`prenom` AS `prenom`,`u`.`email` AS `email`,`j`.`poste` AS `poste`,`j`.`num_licence` AS `licence`,`j`.`date_naiss` AS `date_naiss`,`e`.`nom` AS `equipe` from ((`footregion_footregion_utilisateurs` `u` join `footregion_footregion_joueurs` `j` on((`u`.`email` = `j`.`email`))) join `footregion_footregion_equipes` `e` on((`j`.`equipes_id` = `e`.`id`))) ;

--
-- VIEW  `footregion_vue_joueurs`
-- Données :  Aucun(e)
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
