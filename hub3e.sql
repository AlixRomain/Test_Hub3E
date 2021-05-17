-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 17 mai 2021 à 11:21
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
-- Base de données :  `hub3e`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210510074055', '2021-05-10 09:41:12', 103);

-- --------------------------------------------------------

--
-- Structure de la table `tools`
--

DROP TABLE IF EXISTS `tools`;
CREATE TABLE IF NOT EXISTS `tools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relation_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EAFADE773256915B` (`relation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tools`
--

INSERT INTO `tools` (`id`, `relation_id`, `name`, `description`) VALUES
(57, 58, 'Xperia-V45', 'Super léger et pratique'),
(58, 59, 'Bile-phone_85', 'Super léger et pratique et chere'),
(59, 60, 'Bile-phone de la muerta', 'Super léger et pratique'),
(60, 61, 'Amazing-Phone', 'Super léger et pratique'),
(61, 62, 'Sony delata', 'Super léger et pratique'),
(62, 63, 'Vineo 8', 'Super léger et pratique'),
(63, 64, 'Bile mo II', 'Super léger et pratique'),
(64, 65, 'Bile mo IIN', 'Super léger et pratique'),
(65, 66, 'Bile mo Kil', 'Super léger et pratique'),
(66, 67, 'Bile mo lino', 'Super léger et pratique'),
(67, 68, 'Bile mo Malada', 'Super léger et pratique'),
(68, 69, 'Bile momo', 'Super léger et pratique'),
(69, 70, 'Bile mo IIV', 'Super léger et pratique'),
(70, 71, 'Bile mo zayana', 'Super léger et pratique'),
(71, 72, 'Bile darK', 'Super léger et pratique'),
(72, 73, 'Bile mo Premium', 'Super léger et pratique'),
(73, 74, 'Bile mo Silver', 'Super léger et pratique'),
(74, 75, 'Bile mo Punk', 'Super léger et pratique'),
(75, 76, 'Bile mo I^-^I', 'Super léger et pratique'),
(76, 77, 'Bile mo de ouf', 'Super léger et pratique');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `username`) VALUES
(58, 'lebrun.olivie@orange.fr', '[\"ROLE_USER\"]', '$2y$13$PxcNN62yeIR/Z3eq/CTvcuLr2ujWtCD/DxIAuoX10BMMF2DZy48sC', 'vincent.leduc'),
(59, 'daniel.carlier@orange.fr', '[\"ROLE_USER\"]', '$2y$13$ZqeIs27Ixk2WZCe3ErPnnebo4j4na2jMtfj6I0yoYUpKH.ks8XM7e', 'mallet.alexandre'),
(60, 'christine.peltier@chevallier.fr', '[\"ROLE_USER\"]', '$2y$13$FjKfeCtroTMub9vbhM27/Of3UQeM2Hw3qvWVk0w8jF3fQDm91zcPi', 'boulanger.adrien'),
(61, 'boulanger.lorraine@laposte.net', '[\"ROLE_USER\"]', '$2y$13$BjuVcjZR8CA7Jfoj8h8aNOa1okRlGw4Crgp7hsZmiItZL3uzpxUby', 'denis.nathalie'),
(62, 'chauvin.lucie@hotmail.fr', '[\"ROLE_USER\"]', '$2y$13$UdOkV4A1VzxIq5DqhtU0xeG2hwWAwR/jSLYsIRaN4.vdn7rdVqLg.', 'theophile32'),
(63, 'imace@free.fr', '[\"ROLE_USER\"]', '$2y$13$E4VyhGRw/93NM0l/JC8YouP68H8z6XrxRzNXaLd4rDkOwa1/93sNW', 'alexandre.rene'),
(64, 'shebert@petit.com', '[\"ROLE_USER\"]', '$2y$13$G0bXukb73s6O37tdL/opSevbGtuR9ekHteBQ19DZecMxB4DqiJJo6', 'jacques.pottier'),
(65, 'xavier.millet@bazin.fr', '[\"ROLE_USER\"]', '$2y$13$elsPh8eYwnf1ppU1EH4PFulnAvuzX.iW5/Z3tCUtiOtH2BjYOrXKm', 'marguerite.denis'),
(66, 'martins.marguerite@gmail.com', '[\"ROLE_USER\"]', '$2y$13$1ICdnNKWK5mw0kmZoLMrt.57qjwgcDHUBH36jkPFSa0ihIlrzcOpO', 'delattre.victoire'),
(67, 'ghamel@morel.com', '[\"ROLE_USER\"]', '$2y$13$/c63XGemtfhWY74/J.IDFOehqHbpBPwhWTROPl1N9WApwgiDoP6Na', 'georges.oceane'),
(68, 'olivie.guichard@wanadoo.fr', '[\"ROLE_USER\"]', '$2y$13$untBGRC6NbfMnoyKdQbWpOGe1y7zb26KhU6a6V3r0nUlPYkaTCdjy', 'hugues20'),
(69, 'gilbert.camille@yahoo.fr', '[\"ROLE_USER\"]', '$2y$13$Jae7hnPl8fz439znb4cnW.tC77yQ4AKtsg2lagPRKifuJe616o2mm', 'juliette.bertrand'),
(70, 'guy.bernier@collin.com', '[\"ROLE_USER\"]', '$2y$13$QZ7cC0otweiFtmlLKx7YOu5NutoeCPTav.Epi6guJ.9Eo40xWKyCC', 'raymond93'),
(71, 'philippine.roussel@godard.fr', '[\"ROLE_USER\"]', '$2y$13$uchS0yY918710x6fNDI1y.nxNzW0lp4jkfK1iKt2whmqJFVigFPjK', 'susanne.vallet'),
(72, 'jeannine.gomez@noos.fr', '[\"ROLE_USER\"]', '$2y$13$pEUMUjpXaJvVtA1s5w9vc.RKxyU9QyN327yaF/56/oGqulx2bC7Aq', 'dominique.breton'),
(73, 'christelle.nguyen@orange.fr', '[\"ROLE_USER\"]', '$2y$13$jEZ9qLOa5RYYfTrDcL1STe/tR3WPTJMq1hMB71ZJWnieONW8tTS72', 'robert.philippe'),
(74, 'mathilde17@noos.fr', '[\"ROLE_USER\"]', '$2y$13$NLJpgdC32FvLl.ER/FEd8eAr/tfNJiv5wHHrfjA5Y0IWytcDySiRS', 'louise.dijoux'),
(75, 'luc.robin@antoine.com', '[\"ROLE_USER\"]', '$2y$13$5aXmcm0HRfCkFUGW./zzZeN/6d7x0gx9J5oLA/EzGqt3vkkxa0y16', 'wmendes'),
(76, 'nath.bouvier@perrin.com', '[\"ROLE_USER\"]', '$2y$13$V2Cwz8WnvQMQ85ZybrKQ8O23EXUJrtI8hDLO9jQa3h/F/Mm7YQKG.', 'badam'),
(77, 'jparis@dbmail.com', '[\"ROLE_USER\"]', '$2y$13$tiDPGLVrA09sUjjnVecwhen.bHljziTtHM6iQVtPc4.OMjpbA0nPS', 'margaud57'),
(78, 'user@user.fr', '[\"ROLE_USER\"]', '$2y$13$KPpsqJqLel2Z430BgyYDX.wttd60/1sbfiQA/aLbaKCBW1Pc5vAYu', 'user'),
(79, 'admin@admin.fr', '[\"ROLE_ADMIN\",\"ROLE_USER\"]', '$2y$13$pSYRvdvRY.CPMDl/NwGNHOADR.uFdre.bDkQF1kqCSiIO.9k6piHW', 'admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tools`
--
ALTER TABLE `tools`
  ADD CONSTRAINT `FK_EAFADE773256915B` FOREIGN KEY (`relation_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
