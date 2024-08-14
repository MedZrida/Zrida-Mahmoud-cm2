-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 14 août 2024 à 02:34
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `book`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idCategory` int(3) NOT NULL,
  `nameCategory` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idCategory`, `nameCategory`) VALUES
(1, 'T-Shirt'),
(2, 'Vestes');

-- --------------------------------------------------------

--
-- Structure de la table `command`
--

CREATE TABLE `command` (
  `idCommand` int(3) NOT NULL,
  `idUserCommand` int(3) DEFAULT NULL,
  `amountCommand` int(3) NOT NULL,
  `dateCommand` datetime NOT NULL,
  `stateCommand` varchar(280) NOT NULL DEFAULT 'En cours de traitement'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `command`
--

INSERT INTO `command` (`idCommand`, `idUserCommand`, `amountCommand`, `dateCommand`, `stateCommand`) VALUES
(15, 18, 20, '2024-08-06 20:10:28', 'En cours de traitement'),
(16, 18, 50, '2024-08-06 21:56:19', 'En cours de traitement'),
(17, 18, 200, '2024-08-07 16:39:13', 'En cours de traitement'),
(18, 18, 20, '2024-08-07 16:39:28', 'En cours de traitement'),
(19, 20, 20, '2024-08-07 18:39:30', 'En cours de traitement');

-- --------------------------------------------------------

--
-- Structure de la table `detailscommand`
--

CREATE TABLE `detailscommand` (
  `idDetailsCommand` int(3) NOT NULL,
  `idCommandDetailsCommand` int(3) DEFAULT NULL,
  `idProductDetailsCommand` int(3) DEFAULT NULL,
  `quantityDetailsCommand` int(3) NOT NULL,
  `priceDetailsCommand` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `detailscommand`
--

INSERT INTO `detailscommand` (`idDetailsCommand`, `idCommandDetailsCommand`, `idProductDetailsCommand`, `quantityDetailsCommand`, `priceDetailsCommand`) VALUES
(14, 15, 17, 1, 20),
(15, 16, 17, 1, 20),
(16, 16, 17, 1, 20),
(17, 16, 18, 1, 10),
(18, 17, 20, 1, 20),
(19, 17, 19, 1, 10),
(20, 17, 24, 1, 70),
(21, 17, 24, 1, 70),
(22, 17, 21, 1, 30),
(23, 18, 20, 1, 20),
(24, 19, 20, 1, 20);

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `idMember` int(3) NOT NULL,
  `pseudoMember` varchar(20) NOT NULL,
  `passwordMember` varchar(300) NOT NULL,
  `nameMember` varchar(20) NOT NULL,
  `firstnameMember` varchar(20) NOT NULL,
  `emailMember` varchar(50) NOT NULL,
  `cityMember` varchar(20) NOT NULL,
  `postalCodeMember` varchar(5) NOT NULL,
  `adressMember` varchar(50) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`idMember`, `pseudoMember`, `passwordMember`, `nameMember`, `firstnameMember`, `emailMember`, `cityMember`, `postalCodeMember`, `adressMember`, `isAdmin`) VALUES
(18, 'zri1', 'a3dbf21b0fbd0d597df37d2d149198b0fad10dd1', 'mm', 'pp', 'zri1@gmail.com', 'Montréal', '12300', '5284 AV. Jeanne-d\'Arc', 1),
(20, 'user3', '95c946bf622ef93b0a211cd0fd028dfdfcf7e39e', 'userrrr', 'userrrr', 'user3@gmail.com', 'user3v', '30000', 'user3A', 0);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `idProduct` int(3) NOT NULL,
  `nameProduct` varchar(100) NOT NULL,
  `descriptionProduct` text NOT NULL,
  `imageProduct` varchar(250) NOT NULL,
  `priceProduct` int(3) NOT NULL,
  `stockProduct` int(3) NOT NULL,
  `idCategoryProduct` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`idProduct`, `nameProduct`, `descriptionProduct`, `imageProduct`, `priceProduct`, `stockProduct`, `idCategoryProduct`) VALUES
(19, 'Produit1', 'p1', 'produit1.jpg', 10, 10, 1),
(20, 'Produit2', 'p2', 'produit2.jpg', 20, 20, 1),
(21, 'Produit3', 'p3', 'produit3.jpg', 30, 30, 1),
(22, 'Produit5', 'p5', 'produit5.jpg', 40, 40, 2),
(23, 'Produit6', 'p6', 'produit6.jpg', 60, 60, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Index pour la table `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`idCommand`),
  ADD KEY `idUserCommand` (`idUserCommand`);

--
-- Index pour la table `detailscommand`
--
ALTER TABLE `detailscommand`
  ADD PRIMARY KEY (`idDetailsCommand`),
  ADD KEY `idProductDetailsCommand` (`idProductDetailsCommand`),
  ADD KEY `idCommandDetailsCommand` (`idCommandDetailsCommand`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idMember`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `idCategoryProduct` (`idCategoryProduct`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `command`
--
ALTER TABLE `command`
  MODIFY `idCommand` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `detailscommand`
--
ALTER TABLE `detailscommand`
  MODIFY `idDetailsCommand` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `idMember` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
