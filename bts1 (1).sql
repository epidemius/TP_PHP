-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 21 mai 2021 à 13:59
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bts1`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidat2`
--

DROP TABLE IF EXISTS `candidat2`;
CREATE TABLE IF NOT EXISTS `candidat2` (
  `idCand` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `Prenom` varchar(15) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `courriel` varchar(50) NOT NULL,
  `idSpec` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`idCand`),
  KEY `idSpec` (`idSpec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `candidat2`
--

INSERT INTO `candidat2` (`idCand`, `nom`, `Prenom`, `Adresse`, `courriel`, `idSpec`, `password`) VALUES
(21, 'El Madbouhiii', 'Léa', '4 rue de la Pologne et du maroc', 'lea@gmail.com', 6, 'lea'),
(23, 'Rouault', 'Lucienne', '2 rue de la savoie', 'lucienne@gmail.com', 1, 'lulu'),
(1010, 'RIVAY', 'Claude', '24 rue de Montreuil 75020', 'no_adr1@info.sup', 1, 'r.claude'),
(1020, 'DUBOIS', 'Clément', '10 Bd. Voltaire 75011', 'no_adr2@info.sup', 2, 'd.clement'),
(1030, 'LAVERDURE', 'Patrick', '74 rue Daumesnil 75008', 'no_adr3@info.sup', 3, 'l.patrick'),
(1155, 'RATTIER', 'Claude', '44 rue de Montreuil 75020', 'no_adr10@info.sup', 1, 'ra.claude'),
(1212, 'Edme', 'Liza', '12 rue de Montreuil 75020', 'no_adr13@info.sup', 1, 'e.liza'),
(1941, 'Hazem', 'Karim', '13 Av. Gl De Gaule 94000', 'no_adr15@info.sup', 4, 'h.karim'),
(2109, 'LEE', 'Yan Fu', '113 Av. Gl De Gaule 92000', 'no_adr14@info.sup', 5, 'l.yanfu'),
(3325, 'Tripon', 'Arnaud', '51 rue de Montreuil 75020', 'no_adr12@info.sup', 6, 't.arnaud'),
(5000, 'VERIN', 'Eric', '10-Bis rue Saint Maur 75012', 'no_adr4@info.sup', 3, 'v.eric'),
(5500, 'LEROY', 'Axelle', '22 Av. Gl De Gaule 77000', 'no_adr5@info.sup', 1, 'l.axelle'),
(6500, 'FISCHER', 'Vincent', '15 rue de la Pierre levée 75011', 'no_adr6@info.sup', 5, 'f.vincent'),
(7070, 'CORNU', 'Isabelle', '76 rue de Montreuil 75020', 'no_adr7@info.sup', 6, 'c.isabelle'),
(7090, 'CORNU', 'Isabelle', '1 Av. de la République 75011', 'no_adr9@info.sup', 5, 'co.isablle'),
(7150, 'BORIS', 'Jean', '25 Av. Parmentier 75011', 'no_adr8@info.sup', 2, 'b.jean'),
(9801, 'GRANDVALLET', 'Lucas', '33 rue du Maroc 75020', 'no_adr11@info.sup', 3, 'g.lucas');

-- --------------------------------------------------------

--
-- Structure de la table `epreuve`
--

DROP TABLE IF EXISTS `epreuve`;
CREATE TABLE IF NOT EXISTS `epreuve` (
  `idEpr` int(11) NOT NULL,
  `designation` varchar(25) NOT NULL,
  `Coef` int(11) NOT NULL,
  `Note_eliminat` int(11) NOT NULL,
  PRIMARY KEY (`idEpr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `epreuve`
--

INSERT INTO `epreuve` (`idEpr`, `designation`, `Coef`, `Note_eliminat`) VALUES
(1, 'Informatique', 5, 3),
(2, 'Français', 3, 2),
(3, 'Anglais', 2, 2),
(4, 'Culture Générale', 2, 2),
(5, 'Physique', 3, 3),
(6, 'Mathématique', 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `exercice2`
--

DROP TABLE IF EXISTS `exercice2`;
CREATE TABLE IF NOT EXISTS `exercice2` (
  `Ville` varchar(50) NOT NULL,
  `CP` int(7) NOT NULL,
  `Chef-lieu` int(1) NOT NULL,
  `Chomage` float NOT NULL,
  PRIMARY KEY (`Ville`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

DROP TABLE IF EXISTS `resultat`;
CREATE TABLE IF NOT EXISTS `resultat` (
  `idCand` int(11) NOT NULL,
  `idEpr` int(11) NOT NULL,
  `note` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idCand`,`idEpr`),
  KEY `idCand` (`idCand`),
  KEY `idEpr` (`idEpr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `resultat`
--

INSERT INTO `resultat` (`idCand`, `idEpr`, `note`) VALUES
(21, 2, '16.00'),
(21, 3, '15.00'),
(21, 4, '19.00'),
(21, 5, '15.00'),
(1010, 1, '9.00'),
(1010, 2, '11.50'),
(1010, 3, '14.00'),
(1010, 4, '7.00'),
(1010, 6, '13.00'),
(1020, 1, '12.50'),
(1020, 2, '15.50'),
(1020, 3, '8.00'),
(1020, 4, '5.00'),
(1020, 6, '14.00'),
(1030, 1, '17.00'),
(1030, 2, '15.50'),
(1030, 3, '11.00'),
(1030, 4, '7.50'),
(1030, 6, '9.00'),
(1155, 1, '16.50'),
(1155, 2, '12.00'),
(1155, 3, '12.00'),
(1155, 4, '13.50'),
(1155, 6, '15.25'),
(1212, 1, '3.00'),
(1212, 2, '11.50'),
(1212, 3, '10.00'),
(1212, 4, '11.00'),
(1212, 5, '10.00'),
(1941, 1, '5.50'),
(1941, 2, '7.50'),
(1941, 3, '3.00'),
(1941, 4, '2.50'),
(1941, 5, '4.50'),
(2109, 1, '13.50'),
(2109, 2, '14.50'),
(2109, 3, '11.00'),
(2109, 4, '13.00'),
(2109, 5, '15.50'),
(3325, 1, '2.50'),
(3325, 2, '5.50'),
(3325, 3, '4.00'),
(3325, 4, '3.00'),
(3325, 6, '5.00'),
(5000, 1, '8.50'),
(5000, 2, '15.50'),
(5000, 3, '8.00'),
(5000, 4, '5.00'),
(5000, 6, '14.00'),
(5500, 1, '3.00'),
(5500, 2, '9.00'),
(5500, 3, '8.00'),
(5500, 4, '5.00'),
(5500, 6, '7.00'),
(6500, 1, '0.00'),
(6500, 2, '3.50'),
(6500, 3, '9.00'),
(6500, 4, '4.50'),
(6500, 5, '3.00'),
(7070, 1, '15.50'),
(7070, 2, '14.50'),
(7070, 3, '13.00'),
(7070, 4, '12.00'),
(7070, 5, '18.00'),
(7090, 1, '0.50'),
(7090, 2, '0.00'),
(7090, 3, '0.00'),
(7090, 4, '0.00'),
(7090, 6, '10.00'),
(7150, 1, '9.50'),
(7150, 2, '10.50'),
(7150, 3, '11.00'),
(7150, 4, '9.00'),
(7150, 5, '11.00'),
(9801, 1, '7.50'),
(9801, 2, '13.50'),
(9801, 3, '11.00'),
(9801, 4, '13.00'),
(9801, 6, '10.00');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `idSpec` int(11) NOT NULL,
  `Libelle` varchar(30) NOT NULL,
  PRIMARY KEY (`idSpec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`idSpec`, `Libelle`) VALUES
(1, 'DEV APP'),
(2, 'ING RESEAUX'),
(3, 'INTEG BDD'),
(4, 'ADD SYS'),
(5, 'ADM SYS'),
(6, 'Chef de projets');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `login`, `password`) VALUES
(1, 'admin', 'BTS1IR');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidat2`
--
ALTER TABLE `candidat2`
  ADD CONSTRAINT `candidat2_ibfk_1` FOREIGN KEY (`idSpec`) REFERENCES `specialite` (`idSpec`);

--
-- Contraintes pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD CONSTRAINT `resultat_ibfk_1` FOREIGN KEY (`idCand`) REFERENCES `candidat2` (`idCand`),
  ADD CONSTRAINT `resultat_ibfk_2` FOREIGN KEY (`idEpr`) REFERENCES `epreuve` (`idEpr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
