-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 30 avr. 2025 à 12:09
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `database_apsgvas`
--

-- --------------------------------------------------------

--
-- Structure de la table `approvisionnement`
--

CREATE TABLE `approvisionnement` (
  `ID_APPROV` int(11) NOT NULL,
  `Code_Article` varchar(255) NOT NULL,
  `Libelle_Article` varchar(255) NOT NULL,
  `Prix_Achat` varchar(255) NOT NULL,
  `Quantite_Acht` varchar(255) NOT NULL,
  `Montant_Achat` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `ID_ARTICLE` int(11) NOT NULL COMMENT 'IDENTIFIEANT',
  `Code_Article` varchar(255) NOT NULL,
  `Libelle_Article` varchar(255) NOT NULL,
  `Prix_Vente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `ID_CLIENT` int(10) NOT NULL COMMENT 'IDENTIFIEANT',
  `NOM` varchar(255) NOT NULL,
  `PRENOM` varchar(255) NOT NULL,
  `CONTACTE` varchar(20) NOT NULL,
  `MAIL` varchar(255) NOT NULL,
  `ADRESSE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `detaille`
--

CREATE TABLE `detaille` (
  `ID_DETAILLE` int(11) NOT NULL,
  `Code_Article` varchar(255) NOT NULL,
  `Libelle_Article` varchar(255) NOT NULL,
  `Quantite_Total_Achat` varchar(255) NOT NULL,
  `Quantite_Total_Vente` varchar(255) NOT NULL,
  `Quantite_en_Stock` varchar(255) NOT NULL,
  `Statut` varchar(255) NOT NULL,
  `Prix_Vente` varchar(255) NOT NULL,
  `MontantVente` varchar(255) NOT NULL,
  `COÛT GLOBAL Achat` varchar(255) NOT NULL,
  `VALEUR GLOBALE` varchar(255) NOT NULL,
  `Bénéfice` varchar(225) NOT NULL,
  `PROFIT GLOBAL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `detaille`
--

INSERT INTO `detaille` (`ID_DETAILLE`, `Code_Article`, `Libelle_Article`, `Quantite_Total_Achat`, `Quantite_Total_Vente`, `Quantite_en_Stock`, `Statut`, `Prix_Vente`, `MontantVente`, `COÛT GLOBAL Achat`, `VALEUR GLOBALE`, `Bénéfice`, `PROFIT GLOBAL`) VALUES
(1, 'HP001PC\r\n', 'ORDINATEUR PORTABLE HP GRISE\r\n\r\n', '51\r\n', '13\r\n', '38\r\n', 'Vente possible\r\n', '450000\r\n', '5850000\r\n', '28343533305\r\n', '22950000\r\n', '3250000\r\n', '28320583305\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `ID_FACTURE` varchar(255) NOT NULL,
  `ID_ARTICLE` varchar(255) NOT NULL,
  `DATE_FACTURE` varchar(255) NOT NULL,
  `ID_CLIENT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `ID_FOURNISSEUR` int(10) NOT NULL COMMENT 'IDENTIFIEANT',
  `NOM` varchar(255) DEFAULT NULL,
  `PRENOM` varchar(255) DEFAULT NULL,
  `CONTACT` varchar(255) DEFAULT NULL,
  `MAIL` varchar(255) DEFAULT NULL,
  `ADRESSE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `ID_LOGIN` int(11) NOT NULL COMMENT 'IDENTIFIEANT',
  `ID_UTILISATEUR` varchar(255) NOT NULL,
  `MAIL` varchar(255) NOT NULL,
  `CONTACTE` varchar(255) NOT NULL,
  `USER_NAME` varchar(255) NOT NULL,
  `MOT_DE_PASSE` varchar(255) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `DATE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_UTILISATEUR` int(11) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  `PRENOM` varchar(255) NOT NULL,
  `SEXE` varchar(255) NOT NULL,
  `DATE_NAISSE` varchar(255) NOT NULL,
  `ADRESSE` varchar(255) NOT NULL,
  `CONTACT_TEL` varchar(255) NOT NULL,
  `MAIL` varchar(255) NOT NULL,
  `FONCTION` varchar(255) NOT NULL,
  `NOM_UTILISATEUR` varchar(255) NOT NULL,
  `MOT_DE_PASSE` varchar(255) NOT NULL,
  `DATE_AJOUT` varchar(255) NOT NULL,
  `CODE_SERVICE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `ID_ARTICLE` int(11) NOT NULL,
  `Code_Article` varchar(255) NOT NULL,
  `Libelle_Article` varchar(255) NOT NULL,
  `Prix_Vente` varchar(255) NOT NULL,
  `Quantite_Vente` varchar(255) NOT NULL,
  `Montant_Vente` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Facture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  ADD PRIMARY KEY (`ID_APPROV`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID_ARTICLE`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_CLIENT`);

--
-- Index pour la table `detaille`
--
ALTER TABLE `detaille`
  ADD PRIMARY KEY (`ID_DETAILLE`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`ID_FACTURE`),
  ADD UNIQUE KEY `ID_ARTICLE` (`ID_ARTICLE`),
  ADD UNIQUE KEY `ID_CLIENT` (`ID_CLIENT`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`ID_FOURNISSEUR`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID_LOGIN`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_UTILISATEUR`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`ID_ARTICLE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  MODIFY `ID_APPROV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `ID_ARTICLE` int(11) NOT NULL AUTO_INCREMENT COMMENT 'IDENTIFIEANT';

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `ID_CLIENT` int(10) NOT NULL AUTO_INCREMENT COMMENT 'IDENTIFIEANT';

--
-- AUTO_INCREMENT pour la table `detaille`
--
ALTER TABLE `detaille`
  MODIFY `ID_DETAILLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `ID_FOURNISSEUR` int(10) NOT NULL AUTO_INCREMENT COMMENT 'IDENTIFIEANT';

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `ID_LOGIN` int(11) NOT NULL AUTO_INCREMENT COMMENT 'IDENTIFIEANT';

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_UTILISATEUR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `ID_ARTICLE` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
mysql