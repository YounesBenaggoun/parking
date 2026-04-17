-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 17 avr. 2026 à 13:49
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parking_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

DROP TABLE IF EXISTS `abonnement`;
CREATE TABLE IF NOT EXISTS `abonnement` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_parking` int NOT NULL,
  `spot_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `owner`
--

DROP TABLE IF EXISTS `owner`;
CREATE TABLE IF NOT EXISTS `owner` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parking`
--

DROP TABLE IF EXISTS `parking`;
CREATE TABLE IF NOT EXISTS `parking` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` decimal(10,7) NOT NULL,
  `lng` decimal(10,7) NOT NULL,
  `spot` int NOT NULL DEFAULT '1',
  `id_owner` int NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parking`
--

INSERT INTO `parking` (`id`, `name`, `address`, `lat`, `lng`, `spot`, `id_owner`, `price`) VALUES
(1, 'Chatelet', '6 place Lucie Aubrac, 92220 Bagneux', 48.8591349, 2.3475296, 5, 1, 1.5),
(2, 'Bagneux', 'Chatelet 75001', 48.8216870, 2.3169486, 1, 2, 1.9),
(5, 'Rambouillet', '82 Rue Raymond Patenotre', 48.8216870, 2.2666000, 10, 2, 1.99),
(7, 'Bagneux', '80 Place Lucie Aubrac', 48.8021687, 2.3169486, 100, 8, 2),
(8, 'Boulongne-Billancourt', '33 Rue Nationale 92100, Boulongne Billancourt', 48.8264908, 2.2424666, 10, 8, 2.5),
(9, 'Monteruil', '27  Rue Progres', 48.8249080, 2.2666000, 15, 8, 2.99);

-- --------------------------------------------------------

--
-- Structure de la table `phpunit_table`
--

DROP TABLE IF EXISTS `phpunit_table`;
CREATE TABLE IF NOT EXISTS `phpunit_table` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `phpunit_table`
--

INSERT INTO `phpunit_table` (`id`, `user`, `age`) VALUES
(1, 'MyPHPUnit', 0),
(2, 'MyPHPUnit', 0),
(3, 'MyPHPUnit', 0),
(4, 'MyPHPUnit', 0);

-- --------------------------------------------------------

--
-- Structure de la table `prix`
--

DROP TABLE IF EXISTS `prix`;
CREATE TABLE IF NOT EXISTS `prix` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_parking` int NOT NULL,
  `id_owner` int NOT NULL,
  `prix` float NOT NULL,
  `period` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `prix`
--

INSERT INTO `prix` (`id`, `id_parking`, `id_owner`, `prix`, `period`) VALUES
(1, 1, 2, 15.5, 15);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_parking` int NOT NULL,
  `start_reservation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_reservation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_user`, `id_parking`, `start_reservation`, `end_reservation`, `price`) VALUES
(16, 21, 1, '2026-04-17 11:34:00', '2026-04-17 12:19:00', 4.5);

-- --------------------------------------------------------

--
-- Structure de la table `stationnement`
--

DROP TABLE IF EXISTS `stationnement`;
CREATE TABLE IF NOT EXISTS `stationnement` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_parking` int NOT NULL,
  `start_park` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_park` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `lastname`, `firstname`) VALUES
(20, 'user2@gmail.com', '$2y$10$EBgeJBa9HX1ldnbgrijDk.pRUMORVUVBsupwBxBLXAEg0jy06Xfqu', 'b', 'a'),
(21, 'user@gmail.com', '$2y$10$Clyo2daMQbo1AJjmySIyf.nFLcB7PbzPFBSicwoDrDdrNkLObO8R6', 'Ben', 'Younes');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
