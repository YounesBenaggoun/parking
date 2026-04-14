-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 14 avr. 2026 à 07:44
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
  `adress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` decimal(10,7) NOT NULL,
  `lng` decimal(10,7) NOT NULL,
  `spot` int NOT NULL DEFAULT '1',
  `id_owner` int NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parking`
--

INSERT INTO `parking` (`id`, `name`, `adress`, `lat`, `lng`, `spot`, `id_owner`, `price`) VALUES
(1, 'Chatelet', '6 place Lucie Aubrac, 92220 Bagneux', 15.2556000, 5.0000000, 5, 1, 2.15),
(2, 'Bagneux', 'Chatelet 75001', 3.2000000, 3.2000000, 1, 2, 0),
(5, 'Rambouillet', '82 Rue Raymond Patenotre', 52.3659850, 61.0236546, 10, 2, 0),
(7, 'Bagneux', '6 Place Lucie Aubrac', 48.8021687, 2.3169486, 5, 8, 3.99),
(8, 'Boulongne-Billancourt', '33 Rue Nationale 92100, Boulongne Billancourt', 48.8264908, 2.2424666, 10, 8, 1.99),
(9, 'Monteruil', '27  Rue Progres', 20.1525550, 5.2252000, 15, 8, 2.15);

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `lastname`, `firstname`) VALUES
(8, 'user@user.com', '1b2b1c1b9a4f61971e9332ba3772cdd8', 'User', 'Karim'),
(9, 'owner@owner.com', '1b2b1c1b9a4f61971e9332ba3772cdd8', 'Owner', 'Felix');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
