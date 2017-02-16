-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 30 Janvier 2017 à 09:44
-- Version du serveur :  5.6.33
-- Version de PHP :  5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `iban` varchar(34) DEFAULT NULL,
  `bic` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `iban`, `bic`) VALUES
(1, '896487694873658954509', 'CMD788'),
(2, '896487694873658004509', '2'),
(3, '896487994873658954509', 'CMG788'),
(5, '556487694873658994509', 'CMF788');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `ref` varchar(8) NOT NULL,
  `date_expedition` datetime DEFAULT NULL,
  `date_cmd` datetime NOT NULL,
  `client_id` int(11) NOT NULL,
  `statut_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `ref`, `date_expedition`, `date_cmd`, `client_id`, `statut_id`) VALUES
(8, 'C001', '2016-10-14 00:00:00', '2016-10-12 00:00:00', 1, 2),
(9, 'C002', '2016-12-15 00:00:00', '2016-12-10 00:00:00', 1, 2),
(10, 'C003', '2016-12-17 00:00:00', '2016-12-14 00:00:00', 2, 3),
(11, 'C004', NULL, '2017-01-15 00:00:00', 2, 1),
(12, 'C005', NULL, '2017-01-01 00:00:00', 3, 1),
(13, 'C006', '2016-11-17 00:00:00', '2016-11-15 00:00:00', 2, 5),
(14, 'C007', '2016-10-05 00:00:00', '2016-10-04 00:00:00', 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

DROP TABLE IF EXISTS `commande_produit`;
CREATE TABLE `commande_produit` (
  `com_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande_produit`
--

INSERT INTO `commande_produit` (`com_id`, `prd_id`, `quantite`) VALUES
(9, 1, 2),
(11, 1, 9),
(12, 1, 5),
(8, 2, 8),
(11, 2, 3),
(14, 2, 9),
(8, 3, 10),
(11, 3, 23),
(9, 4, 6),
(11, 4, 16),
(8, 5, 18),
(11, 5, 27),
(10, 6, 40),
(11, 6, 12),
(13, 6, 13),
(14, 6, 37);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `civilite` varchar(8) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `code_postal` int(5) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id`, `civilite`, `nom`, `prenom`, `date_naissance`, `adresse`, `code_postal`, `ville`) VALUES
(1, 'Monsieur', 'GAUCH', 'Yoann', '1987-02-02', '24 rue de la barillerie', 72000, 'LE MANS'),
(2, 'Madame', 'BOISSEE', 'Mégane', '1993-02-02', '24 rue du paradis', 72000, 'LE MANS'),
(3, 'Monsieur', 'HAMELIN', 'Paul', '1994-02-02', '16 rue des tilleuls', 44000, 'NANTES'),
(5, 'Monsieur', 'GAUCHARD', 'Jérémy', '1989-04-04', '10 rue Francklin Roosvelt', 53000, 'LAVAL'),
(18, 'Madame', 'TOUFFET', 'Alexia', '0000-00-00', '24 rue de la barillerie', 72000, 'LE MANS');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `ref` varchar(8) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `description` text,
  `prix_unitaire` int(11) NOT NULL,
  `quantite_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `ref`, `libelle`, `description`, `prix_unitaire`, `quantite_stock`) VALUES
(1, 'P001', 'crème anti-cernes LOREAL', NULL, 45, 34),
(2, 'P002', 'crème anti-ride AVENE', NULL, 25, 45),
(3, 'P003', 'crème hemoroides AVENE', NULL, 60, 22),
(4, 'P004', 'crème bouton herpes LOREAL', NULL, 80, 70),
(5, 'P005', 'tube laxatif 200ml AVENE', NULL, 20, 34),
(6, 'P006', 'crème anti-micoses LOREAL', NULL, 45, 12),
(7, 'P007', 'Mascara', NULL, 34, 23);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE `statut` (
  `id` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`id`, `libelle`) VALUES
(1, 'en préparation'),
(2, 'expédiée'),
(3, 'annulée'),
(4, 'retournée'),
(5, 'remboursée');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `login`, `password`) VALUES
(1, 'gauchard', 'yoann', 'yoann72', 'passyoann'),
(2, 'hamelin', 'paul', 'paul72', 'passpaul'),
(3, 'durand', 'pierre', 'pierre72', 'passpierre');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

DROP TABLE IF EXISTS `visiteur`;
CREATE TABLE `visiteur` (
  `id` int(11) NOT NULL,
  `nb_visites` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `nb_visites`) VALUES
(1, 34),
(2, 200),
(3, 2),
(5, 65);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_id_client` (`client_id`) USING BTREE,
  ADD KEY `index_id_statut` (`statut_id`) USING BTREE;

--
-- Index pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`prd_id`,`com_id`),
  ADD KEY `index_id_commande` (`com_id`) USING BTREE,
  ADD KEY `index_id_produit` (`prd_id`) USING BTREE;

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `visiteur`
--
ALTER TABLE `visiteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_personne_client` FOREIGN KEY (`id`) REFERENCES `personne` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_id_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_statut` FOREIGN KEY (`statut_id`) REFERENCES `statut` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `fk_id_commande` FOREIGN KEY (`com_id`) REFERENCES `commande` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_produit` FOREIGN KEY (`prd_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD CONSTRAINT `fk_personne_visiteur` FOREIGN KEY (`id`) REFERENCES `personne` (`id`) ON DELETE CASCADE;
