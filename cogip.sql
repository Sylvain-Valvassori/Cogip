-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 déc. 2021 à 15:25
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cogip`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `societyName` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `lastName`, `firstName`, `phone`, `email`, `societyName`) VALUES
(1, 'Gregory', 'Peter', '555-4567', 'peter.gregory@raviga.com', 'Raviga'),
(2, 'Schrute', 'Dwight', '555-9859', 'dwight.schrute@ddmfl.com', 'Dunder Mifflin'),
(3, 'Howe', 'Cameron', '555-7896', 'cam.howe@mutiny.net ', 'Mutiny'),
(4, 'Belson', 'Gavin', '555-4213', 'gavin@hooli.com', 'Hooli'),
(5, 'Yang', 'Jian', '555-4567', 'jian.yang@phoque.off', 'Phoque Off'),
(6, 'Gilfoyle', 'Betram', '555-0987', 'gilfoyle@piedpiper.com', 'Pied Piper');

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `society_id` int(2) NOT NULL,
  `numbers` varchar(50) NOT NULL,
  `dates` date NOT NULL,
  `societyName` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `invoices`
--

INSERT INTO `invoices` (`id`, `society_id`, `numbers`, `dates`, `societyName`, `type`) VALUES
(1, 3, 'F20190404-004', '2019-04-04', 'Jouets Jean-Michel', 'provider'),
(2, 2, 'F20190404-003', '2019-04-04', 'Dunder Mifflin', 'client'),
(3, 6, 'F20190404-002', '2019-04-04', 'Pierre Cailloux  ', 'provider'),
(4, 9, 'F20190404-001', '2019-04-04', 'Pied Pipper', 'client'),
(5, 1, 'F20190403-654', '2019-04-03', 'Raviga ', 'client'),
(6, 3, 'F20180404-004', '2018-04-04', 'Jouets Jean-Michel', 'provider'),
(7, 2, 'F20180414-003', '2018-04-14', 'Dunder Mifflin', 'client'),
(8, 6, 'F20180408-002', '2018-04-08', 'Pierre Cailloux  ', 'provider'),
(9, 9, 'F20180407-001', '2018-04-07', 'Pied Pipper', 'client'),
(10, 1, 'F20180403-654', '2018-04-03', 'Raviga ', 'client'),
(11, 3, 'F20190404-004', '2019-04-04', 'Jouets Jean-Michel', 'provider'),
(12, 2, 'F20170404-003', '2017-04-04', 'Dunder Mifflin', 'client'),
(13, 6, 'F20170524-002', '2017-05-24', 'Pierre Cailloux  ', 'provider'),
(14, 9, 'F20170404-001', '2017-04-04', 'Pied Pipper', 'client'),
(15, 1, 'F20170403-654', '2017-04-03', 'Raviga ', 'client'),
(21, 10, 'sfsdf', '2021-12-04', 'hello bob', 'provider');

-- --------------------------------------------------------

--
-- Structure de la table `societies`
--

DROP TABLE IF EXISTS `societies`;
CREATE TABLE IF NOT EXISTS `societies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `country` varchar(40) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `societies`
--

INSERT INTO `societies` (`id`, `name`, `vat`, `country`, `type`) VALUES
(1, 'Raviga ', 'US456 654 342', 'United States ', 'client'),
(2, 'Dunder Mifflin ', 'US678 765 765 ', 'United States', 'client'),
(3, 'Jouets Jean-Michel', 'FR 677 544 000', ' France', 'client'),
(4, 'Bob Vance Refrig', 'US456 654 687', 'United States ', 'client'),
(5, 'Belgalol', 'BE0876 654 665', 'Belgique  ', 'provider'),
(6, 'Pierre Cailloux ', 'FR 678 908 654 ', 'France ', 'provider'),
(7, 'Proximdr ', 'BE0876 985 665', ' Belgique ', 'provider'),
(8, 'ElectricPower', 'IT 256 852 542', 'Italie', 'provider');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
