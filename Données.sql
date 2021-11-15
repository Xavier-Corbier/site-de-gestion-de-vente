-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 05 jan. 2020 à 05:01
-- Version du serveur :  5.5.47-0+deb8u1
-- Version de PHP :  7.2.22-1+0~20190902.26+debian8~1.gbpd64eb7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `corbierx`
--

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `id` int(11) NOT NULL,
  `valeur` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Categorie`
--

INSERT INTO `Categorie` (`id`, `valeur`) VALUES
(14, 'Boissons'),
(15, 'Fruits'),
(16, 'Légume'),
(17, 'Graines'),
(18, 'Viandes'),
(20, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Client`
--

INSERT INTO `Client` (`idClient`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
  `idCommande` int(11) NOT NULL,
  `idFournisseur` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prixCommande` varchar(32) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Commande`
--

INSERT INTO `Commande` (`idCommande`, `idFournisseur`, `idProduit`, `quantite`, `prixCommande`, `date`) VALUES
(27, 5, 16, 4, '54', '2019-01-01'),
(29, 6, 17, 9, '0', '2019-11-20');

-- --------------------------------------------------------

--
-- Structure de la table `CommandeClient`
--

CREATE TABLE `CommandeClient` (
  `idCommandeClient` int(11) NOT NULL,
  `etatCommande` int(2) NOT NULL,
  `idClient` int(5) NOT NULL,
  `dateCommande` date NOT NULL,
  `dateLivraison` date NOT NULL,
  `prixTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `CommandeClient`
--

INSERT INTO `CommandeClient` (`idCommandeClient`, `etatCommande`, `idClient`, `dateCommande`, `dateLivraison`, `prixTotal`) VALUES
(44, 2, 2, '2019-12-24', '2019-01-01', 99),
(46, 3, 1, '2019-12-27', '2020-01-03', 1.5),
(47, 2, 2, '2019-12-28', '2019-12-12', 39.6),
(68, 2, 7, '2019-12-31', '2019-12-31', 12),
(71, 2, 7, '2019-12-31', '2019-12-31', 6),
(72, 2, 7, '2019-12-31', '2019-12-31', 6),
(73, 2, 7, '2019-12-31', '2019-12-31', 10.5),
(74, 2, 7, '2020-01-01', '2020-01-01', 9),
(75, 2, 7, '2020-01-01', '2020-01-01', 9),
(76, 2, 7, '2020-01-01', '2020-01-01', 92.7),
(77, 2, 7, '2020-01-01', '2020-01-01', 7.5),
(78, 2, 7, '2020-01-01', '2020-01-01', 9),
(79, 2, 7, '2020-01-01', '2020-01-01', 13.5),
(80, 2, 7, '2020-01-01', '2020-01-01', 6),
(81, 2, 7, '2020-01-01', '2020-01-01', 1.5),
(82, 2, 7, '2020-01-01', '2020-01-01', 1.5),
(83, 2, 7, '2020-01-01', '2020-01-01', 9.9),
(84, 2, 7, '2020-01-01', '2020-01-01', 9.9),
(86, 2, 7, '2020-01-01', '2020-01-01', 9.9),
(87, 2, 7, '2020-01-01', '2020-01-01', 11.1),
(88, 2, 2, '2020-01-01', '2020-01-01', 89.1),
(89, 3, 2, '2020-01-02', '2020-01-01', 9.9),
(90, 2, 2, '2020-01-02', '2021-12-01', 9.9),
(91, 1, 2, '2020-01-02', '2020-01-01', 9.9),
(92, 2, 2, '2020-01-02', '2020-01-01', 9.9),
(93, 3, 2, '2020-01-02', '2020-01-01', 9.9),
(94, 1, 2, '2020-01-02', '2020-01-01', 8.91),
(95, 2, 7, '2020-01-02', '2020-01-02', 9.9),
(96, 2, 7, '2020-01-02', '2020-01-02', 9.9),
(97, 2, 7, '2020-01-02', '2020-01-02', 9.9),
(98, 2, 7, '2020-01-02', '2020-01-02', 9.9),
(99, 2, 7, '2020-01-02', '2020-01-02', 8.91),
(100, 2, 2, '2020-01-03', '2020-01-01', 703.89),
(101, 2, 7, '2020-01-03', '2020-01-03', 4.5),
(102, 2, 7, '2020-01-03', '2020-01-03', 11.1),
(103, 0, 2, '2020-01-03', '2020-02-01', 3.6),
(104, 0, 2, '2020-01-03', '2020-01-01', 3.6),
(105, 0, 2, '2020-01-03', '2021-01-01', 3.6),
(106, 0, 2, '2020-01-03', '2020-01-01', 3.6),
(107, 0, 2, '2020-01-03', '2020-01-01', 3.6),
(108, 0, 2, '2020-01-03', '2021-01-01', 3.6),
(109, 0, 2, '2020-01-03', '2020-01-01', 3.6),
(110, 0, 2, '2020-01-03', '2020-01-01', 2.4),
(111, 0, 2, '2020-01-03', '2020-01-01', 2.4),
(112, 1, 2, '2020-01-03', '2021-01-01', 0.6),
(113, 2, 7, '2020-01-04', '2020-01-04', 4095);

-- --------------------------------------------------------

--
-- Structure de la table `Fournisseur`
--

CREATE TABLE `Fournisseur` (
  `idFournisseur` int(11) NOT NULL,
  `nomFournisseur` varchar(32) NOT NULL,
  `telephoneFournisseur` int(10) NOT NULL,
  `adresseFournisseur` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Fournisseur`
--

INSERT INTO `Fournisseur` (`idFournisseur`, `nomFournisseur`, `telephoneFournisseur`, `adresseFournisseur`) VALUES
(5, 'Jude Orange', 466557788, '10 avenue de l\'eau'),
(6, 'Judevian Deuh', 65759512, '4564f avenue Occiatanie'),
(7, 'Cocah Coula', 705789675, '898 avenue de la rue '),
(9, 'Gilbert', 666666, 'En france');

--
-- Déclencheurs `Fournisseur`
--
DELIMITER $$
CREATE TRIGGER `trg_fourn` AFTER DELETE ON `Fournisseur` FOR EACH ROW UPDATE Produit SET idFournisseur=NULL WHERE idFournisseur=OLD.idFournisseur
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `ListeProduitsCommande`
--

CREATE TABLE `ListeProduitsCommande` (
  `idCommandeClient` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ListeProduitsCommande`
--

INSERT INTO `ListeProduitsCommande` (`idCommandeClient`, `idProduit`, `quantite`) VALUES
(44, 17, 10),
(46, 16, 1),
(47, 17, 4),
(68, 16, 8),
(71, 16, 4),
(72, 16, 4),
(73, 16, 7),
(74, 16, 6),
(75, 16, 6),
(76, 16, 9),
(76, 17, 8),
(77, 16, 5),
(78, 16, 6),
(79, 16, 9),
(80, 16, 4),
(81, 16, 1),
(82, 16, 1),
(84, 17, 1),
(86, 17, 1),
(87, 17, 1),
(87, 18, 1),
(88, 17, 9),
(89, 17, 1),
(90, 17, 1),
(91, 17, 1),
(92, 17, 1),
(93, 17, 1),
(94, 17, 1),
(95, 17, 1),
(96, 17, 1),
(97, 17, 1),
(98, 17, 1),
(99, 17, 1),
(100, 17, 79),
(101, 16, 3),
(102, 16, 5),
(102, 18, 6),
(103, 35, 1),
(104, 35, 1),
(105, 35, 1),
(106, 35, 1),
(107, 35, 1),
(108, 35, 1),
(109, 35, 1),
(110, 38, 1),
(111, 38, 1),
(112, 18, 1),
(113, 16, 77),
(113, 19, 379);

-- --------------------------------------------------------

--
-- Structure de la table `Produit`
--

CREATE TABLE `Produit` (
  `idProduit` int(10) NOT NULL,
  `nomProduit` varchar(32) NOT NULL,
  `idFournisseur` int(11) DEFAULT NULL,
  `quantite` int(5) NOT NULL,
  `categorieProduit` int(11) NOT NULL,
  `descriptionProduit` varchar(64) NOT NULL,
  `prixProduit` varchar(32) NOT NULL,
  `promotion` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Produit`
--

INSERT INTO `Produit` (`idProduit`, `nomProduit`, `idFournisseur`, `quantite`, `categorieProduit`, `descriptionProduit`, `prixProduit`, `promotion`) VALUES
(16, 'Orange', 5, 5395, 15, 'Orange super bonne', '1.50', '0'),
(17, 'Jarret de boeuf', 6, 999999998, 18, 'Super tendre', '9.90', '0.1'),
(18, 'Pomme', 5, 99406, 15, 'Bonne pomme', '1.20', '0.5'),
(19, 'Faux-Fillet de Boeuf', 6, 141149, 18, 'Super tendre', '10.50', '0'),
(30, 'Chips', NULL, 1, 17, 'Super chips', '1', '0'),
(33, 'Fraise', 5, 11, 15, 'fraise', '1', '0'),
(35, 'Gingembre', 7, 94, 16, 'Gingembre chinois', '4.5', '0.2'),
(38, 'Poireaux', 5, 120, 16, 'Super tendre', '3', '0.2');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `login` varchar(32) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `mdp` varchar(64) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(32) NOT NULL,
  `nonce` varchar(32) NOT NULL,
  `idClient` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`login`, `nom`, `prenom`, `mdp`, `admin`, `email`, `nonce`, `idClient`) VALUES
('test', 'test', 'test', 'e2c9c8096b08046f1386f723d3f3794641742f212a3d0a111990f225026daec6', 0, 'jilaloui@yopmail.com', '', 1),
('demo', 'demo', 'demo', '3bf9d0c02913940d065eb6116f9e13939691bc799b250ee03641ce112d0b0ead', 1, 'jilaloui@yopmail.com', '', 2),
('caisse', 'caisse', 'caisse', '201b60adcc19fa76bdd6e3482436d3a51e572849430cca6dffc3946020360bf3', 0, 'sansmail@yopmail.com', '', 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`idCommande`);

--
-- Index pour la table `CommandeClient`
--
ALTER TABLE `CommandeClient`
  ADD PRIMARY KEY (`idCommandeClient`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `Fournisseur`
--
ALTER TABLE `Fournisseur`
  ADD PRIMARY KEY (`idFournisseur`);

--
-- Index pour la table `ListeProduitsCommande`
--
ALTER TABLE `ListeProduitsCommande`
  ADD PRIMARY KEY (`idCommandeClient`,`idProduit`);

--
-- Index pour la table `Produit`
--
ALTER TABLE `Produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `idFournisseur` (`idFournisseur`),
  ADD KEY `etr_categorie` (`categorieProduit`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `idClient` (`idClient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `Client`
--
ALTER TABLE `Client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `CommandeClient`
--
ALTER TABLE `CommandeClient`
  MODIFY `idCommandeClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT pour la table `Fournisseur`
--
ALTER TABLE `Fournisseur`
  MODIFY `idFournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `Produit`
--
ALTER TABLE `Produit`
  MODIFY `idProduit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `idClient` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `CommandeClient`
--
ALTER TABLE `CommandeClient`
  ADD CONSTRAINT `etr_iCli` FOREIGN KEY (`idClient`) REFERENCES `Utilisateur` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ListeProduitsCommande`
--
ALTER TABLE `ListeProduitsCommande`
  ADD CONSTRAINT `etr_idClient` FOREIGN KEY (`idCommandeClient`) REFERENCES `CommandeClient` (`idCommandeClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Produit`
--
ALTER TABLE `Produit`
  ADD CONSTRAINT `etr_categorie` FOREIGN KEY (`categorieProduit`) REFERENCES `Categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
