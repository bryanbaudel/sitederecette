-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 04 fév. 2024 à 10:53
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `devoirrecette`
--
CREATE DATABASE IF NOT EXISTS `devoirrecette` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `devoirrecette`;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id_Ingredients` int NOT NULL,
  `Nom_Ingredients` varchar(45) DEFAULT NULL,
  `Apport_Calorique` int DEFAULT NULL,
  `Prix` int NOT NULL,
  PRIMARY KEY (`id_Ingredients`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id_Ingredients`, `Nom_Ingredients`, `Apport_Calorique`, `Prix`) VALUES
(1, 'Pâtes ', 300, 550),
(2, 'Crème fraîche', 150, 300),
(3, 'Sel', NULL, 200),
(4, 'Fromage', 120, 335),
(5, 'Lardons', 200, 395),
(6, 'Semoule', 180, 260),
(7, 'Menthe', 5, 200),
(8, 'Raisins secs', 90, 250),
(9, 'Tomates', 30, 50),
(10, 'Oignon', 20, 45),
(11, 'Jus de citron', 10, 180),
(12, 'Huile d\'olive', 120, 780),
(13, 'Poivre', NULL, 200),
(14, 'Viande haché ', 250, 500),
(15, 'Ail', 10, 20),
(16, 'Carottes', 25, 25),
(17, 'Pulpe de tomate', 30, 145),
(18, 'Pomme de terre', 150, 600),
(19, 'Pâte à pizza', 300, 550),
(20, 'Fromage de chèvre', 150, 440),
(21, 'Miel', 64, 575),
(22, 'Oignon rouge', 20, 45);

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
CREATE TABLE IF NOT EXISTS `recettes` (
  `id_Recettes` int NOT NULL AUTO_INCREMENT,
  `Titre` varchar(45) DEFAULT NULL,
  `Instructions` varchar(2500) DEFAULT NULL,
  `Total_Calorique` int DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `Prix` int NOT NULL,
  PRIMARY KEY (`id_Recettes`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id_Recettes`, `Titre`, `Instructions`, `Total_Calorique`, `slug`, `Prix`) VALUES
(1, 'Pâtes Carbonara ', 'Faites bouillir une grande casserole d\'eau salée. Cuire les pâtes (100 g) selon les instructions sur l\'emballage jusqu\'à ce qu\'elles soient al dente.\r\n\r\nPendant que les pâtes cuisent, faites revenir les lardons (50 g) dans une poêle à feu moyen jusqu\'à ce qu\'elle soit croustillante. Ajouter la crème fraiche (60 ml).\r\nÉgoutter les pâtes et ajouter-les à la poêle avec les lardons et crème fraiche. Remuer pour bien enrober les pâtes.\r\n\r\nRemuer rapidement pour que la crème s\'incorpore aux pâtes sans coaguler.\r\n\r\nServer immédiatement avec du poivre noir supplémentaire et du fromage râpé si désiré.', 770, 'pates-carbonara', 0),
(2, 'Taboulé', 'Cuire la semoule de blé (50 g) selon les instructions sur l\'emballage. Généralement, il suffit de verser de l\'eau chaude sur la semoule, de couvrir et de laisser reposer jusqu\'à ce qu\'elle absorbe l\'eau.\r\n\r\nDans un grand saladier, mélanger les tomates (200 g) et la menthe hachés (15).\r\n\r\nAjouter la semoule cuite dans le saladier avec les légumes.\r\n\r\nAssaisonner avec du jus de citron (30 ml), de l\'huile d\'olive (30 ml), des raisins secs (15 g), oignons (100 g), du sel et du poivre selon votre goût. Bien mélanger.\r\n\r\nLaisser le taboulé reposer au réfrigérateur pendant au moins 30 minutes pour permettre aux saveurs de se mélanger.\r\n\r\nAvant de servir, ajuster l\'assaisonnement si nécessaire. Vous pouvez également garnir de quartiers de citron ou de feuilles de menthe.', 455, 'taboule', 0),
(3, 'Hachis parmentier', 'Éplucher et couper les pommes de terre en morceaux (150 g). Les faire cuire dans de l\'eau bouillante salée jusqu\'à ce qu\'elles soient tendres.\r\n\r\nAjouter la viande hachée (100 g) et faire cuire jusqu\'à ce qu\'elle soit bien dorée. Assaisonner avec du sel, du poivre et de l\'ail (3 g) émincé.\r\n\r\nPréparer la purée de pommes de terre (150 g) : Égoutter les pommes de terre cuites, les écraser, puis ajouter le lait (50 ml), le beurre, du sel. Bien mélanger jusqu\'à obtenir une purée lisse.\r\n\r\nPréchauffer le four à 180°C.\r\n\r\nDans un plat allant au four, déposer la viande hachée au fond comme couche de base.\r\n\r\nÉtaler uniformément la purée de pommes de terre sur la viande ainsi que la pulpe de tomate.\r\n\r\nSaupoudrer le fromage râpé sur le dessus.\r\n\r\nEnfourner le plat au four pendant environ 20-25 minutes, ou jusqu\'à ce que le dessus soit doré.\r\n\r\nServir chaud et déguster.', 465, 'hachis-parmentier', 0),
(4, 'Pizza chèvre miel', 'Préchauffer votre four selon les instructions de la pâte à pizza.\r\n\r\nÉtaler la pâte à pizza (150 g) sur une plaque de cuisson.\r\n\r\nVerser la crème fraiche (15 ml)\r\nRépartissez uniformément le fromage de chèvre (50 g) émietté sur la pâte.\r\n\r\nDisposer les tranches d\'oignon rouge (20 g) sur le fromage de chèvre.\r\n\r\nArroser la pizza avec le miel (15 ml), en veillant à bien répartir sur toute la surface.\r\n\r\nAssaisonner avec du sel et du poivre selon votre goût.\r\n\r\nEnfourner la pizza selon les instructions de la pâte, jusqu\'à ce qu\'elle soit dorée et croustillante.\r\n\r\nUne fois la pizza cuite, sortez-la du four et arroser légèrement la pizza d\'huile d\'olive.', 740, 'pizza-chevre-miel', 0),
(5, 'Pâtes bolognaise', 'Faire bouillir une grande casserole d\'eau salée. Ajouter les pâtes (100 g) et cuire selon les instructions sur l\'emballage jusqu\'à ce qu\'elles soient al dente.\r\n\r\nPendant que les pâtes cuisent, chauffer une poêle avec de l\'huile d\'olive à feu moyen.\r\n\r\nAjouter l\'oignon (50 g) haché à la poêle et faire revenir jusqu\'à ce qu\'il soit doré.\r\n\r\nAjouter l\'ail (3 g) émincé à l\'oignon et faire sauter pendant environ 1 minute jusqu\'à ce qu\'il soit parfumé.\r\n\r\nAjouter la viande hachée (100 g) à la poêle et faire cuire jusqu\'à ce qu\'elle soit bien dorée. Assaisonner avec du sel, du poivre.\r\n\r\nVerser la pulpe de tomate (120 ml) dans la poêle et laisser mijoter à feu doux pendant environ 15-20 minutes, en remuant de temps en temps.\r\n\r\nGoûter et ajuster l\'assaisonnement si nécessaire.\r\n\r\nÉgoutter les pâtes cuites et les mélanger avec la sauce.\r\n', 755, 'pates-bolognaise', 0);

-- --------------------------------------------------------

--
-- Structure de la table `recettes_has_ingredients`
--

DROP TABLE IF EXISTS `recettes_has_ingredients`;
CREATE TABLE IF NOT EXISTS `recettes_has_ingredients` (
  `Recettes_id_Recettes` int NOT NULL,
  `Ingredients_id_Ingredients` int NOT NULL,
  PRIMARY KEY (`Recettes_id_Recettes`,`Ingredients_id_Ingredients`),
  KEY `fk_Recettes_has_Ingredients_Ingredients1_idx` (`Ingredients_id_Ingredients`),
  KEY `fk_Recettes_has_Ingredients_Recettes_idx` (`Recettes_id_Recettes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `recettes_has_ingredients`
--

INSERT INTO `recettes_has_ingredients` (`Recettes_id_Recettes`, `Ingredients_id_Ingredients`) VALUES
(1, 1),
(5, 1),
(1, 2),
(4, 2),
(1, 3),
(3, 3),
(4, 3),
(5, 3),
(1, 4),
(1, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(5, 10),
(2, 11),
(2, 12),
(4, 12),
(5, 12),
(2, 13),
(3, 13),
(4, 13),
(5, 13),
(3, 14),
(5, 14),
(3, 15),
(5, 15),
(3, 16),
(5, 16),
(3, 17),
(5, 17),
(3, 18),
(4, 19),
(4, 20),
(4, 21),
(4, 22);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_Utilisateurs` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(45) DEFAULT NULL,
  `Prenom` varchar(45) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Mot_de_passe` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_Utilisateurs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `recettes_has_ingredients`
--
ALTER TABLE `recettes_has_ingredients`
  ADD CONSTRAINT `fk_Recettes_has_Ingredients_Ingredients1` FOREIGN KEY (`Ingredients_id_Ingredients`) REFERENCES `ingredients` (`id_Ingredients`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
