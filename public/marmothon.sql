-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 20 Janvier 2015 à 09:53
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `zf2tutorial`
--
CREATE DATABASE IF NOT EXISTS `marmothon` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `marmothon`;

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
`id` int(11) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `album`
--

INSERT INTO `album` (`id`, `artist`, `title`) VALUES
(1, 'The  Military  Wives', 'In  My  Dreams'),
(2, 'Adele', '21'),
(4, 'Lana  Del  Rey', 'Born  To  Die'),
(5, 'Gotye', 'Making  Mirrors'),
(6, 'yyyy', 'ttt');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE IF NOT EXISTS `recette` (
`idRecette` int(11) NOT NULL,
  `aliments` varchar(100) NOT NULL,
  `titre` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `recette`
--

INSERT INTO `recette` (`idRecette`, `aliments`, `titre`) VALUES
(1, 'Tomate, carottes, courgettes', 'Potage'),
(2, 'Thon, Haricot', 'Thonricot'),
(4, 'pate, viande', 'Pasta a la bolognese'),
(5, 'pasta, fromage', 'pasta a la carbonara'),
(7, 'munster, oignons', 'pizza');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(11) NOT NULL,
  `usr_name` text NOT NULL,
  `usr_password` text NOT NULL,
  `usr_email` text NOT NULL,
  `usrl_id` int(11) NOT NULL,
  `lng_id` int(11) NOT NULL,
  `usr_active` text NOT NULL,
  `usr_question` text NOT NULL,
  `usr_answer` text NOT NULL,
  `usr_picture` text NOT NULL,
  `usr_password_salt` text NOT NULL,
  `usr_registration_date` date NOT NULL,
  `usr_registration_token` text NOT NULL,
  `usr_email_confirmed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `album`
--
ALTER TABLE `album`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
 ADD PRIMARY KEY (`idRecette`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `album`
--
ALTER TABLE `album`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
MODIFY `idRecette` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
