-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 23 avr. 2024 à 15:14
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
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `ID_FORUM` int(11) NOT NULL,
  `NAME` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`ID_FORUM`, `NAME`) VALUES
(1, 'Politique'),
(2, 'Economie'),
(3, 'Culture'),
(4, 'Sport'),
(5, 'Loisirs'),
(6, 'Société');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `ID_MESSAGE` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_POST` int(11) NOT NULL,
  `CONTENT` text NOT NULL,
  `CREATEDAT` datetime NOT NULL,
  `UPDATEDAT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`ID_MESSAGE`, `ID_USER`, `ID_POST`, `CONTENT`, `CREATEDAT`, `UPDATEDAT`) VALUES
(1, 1, 2, 'Augmentons les salaires, et les prix...ainsi producteurs et salariés seront contents !', '2024-04-09 22:46:58', '2024-04-09 22:46:59'),
(2, 2, 2, 'Mais vraiment ils ne savent tellement plus quoi inventer, un énième plan de relance de je ne sais quoi... Que maintenant ils et elles veulent supprimer des droits, celui du droit de grève est constitutionnelle... Donc comment vont ils s y prendre ? Est ce qu ils vont encore se réunir à Versailles ?', '2024-04-09 22:47:17', '2024-04-09 22:47:17'),
(3, 3, 3, 'C’est incroyable ce que Renard a insufflé à cette équipe : la gagne ! Dommage qu’il parte…', '2024-04-09 22:48:50', '2024-04-09 22:48:51');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `ID_POST` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_FORUM` int(11) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `CREATEDAT` datetime NOT NULL,
  `UPDATEDAT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`ID_POST`, `ID_USER`, `ID_FORUM`, `TITLE`, `DESCRIPTION`, `CREATEDAT`, `UPDATEDAT`) VALUES
(1, 1, 3, 'Six détails exceptionnels repérés à l’exposition \"Metal, Diabolus in musica\" à la Philharmonie de Paris', 'Que l\'on soit familier ou pas de la musique metal, l\'exposition que lui consacre pour la première fois la Philharmonie de Paris est riche d\'enseignements. Nous l\'avons parcourue en compagnie d\'un de ses deux co-curateurs, le docteur en histoire de l\'art Milan Garcin. Ses éclairages sont passionnants.', '2024-03-09 22:46:29', '2024-03-09 22:46:29'),
(2, 4, 1, 'Le Sénat limite le droit de grève dans le secteur des transports sur certaines périodes', 'Le texte octroie au gouvernement un quota de 30 jours par an durant lesquels les \"personnels des services publics de transports\", excepté le secteur aérien, seraient privés de ce droit.', '2024-04-09 22:46:29', '2024-04-09 22:46:30'),
(3, 4, 4, 'Qualifications de l\'Euro 2025 : les Bleues signent un succès de prestige en Suède et s\'envolent en tête de leur poule', 'Quatre jours après sa victoire contre l\'Irlande, l\'équipe de France a enchaîné face aux vice-championnes olympiques (1-0), mardi à Göteborg.', '2024-04-09 22:46:29', '2024-04-09 22:46:30'),
(10, 3, 5, 'ezaeazeazeaze', 'ezaeazeazeazeazeazeazeaeazeaze', '2024-04-23 14:33:59', '2024-04-23 14:33:59'),
(11, 3, 6, 'yuiyiyutiyutityu', 'iuytiyutiyutiyutiyut', '2024-04-23 14:36:59', '2024-04-23 14:36:59'),
(12, 3, 2, 'Z500SE', 'Tous les regards sont tournés vers vous lorsque vous pilotez la toute nouvelle Z500. Avec son carénage distinctif et son puissant moteur de 451 cm3, ce roadster au style agressif est destiné à ceux qui n\'ont pas peur d\'être remarqués.', '2024-04-23 14:56:43', '2024-04-23 14:56:43'),
(13, 3, 1, 'Z900', 'L\'esprit Z trouve sa dernière expression dans le style Sugomi de la Z900. La puissance maximale, la maniabilité intuitive et l\'antipatinage redéfinissent l\'expérience du roadster. Les feux LED et l\'écran TFT apportent la technologie la plus moderne. Repoussez les limites et dominez votre moto.', '2024-04-23 14:59:27', '2024-04-23 14:59:27'),
(14, 3, 6, 'NinjaH2R', 'Repousser les limites de l\'ingénierie et des performances, c\'est l\'une des rares motos qui méritent vraiment d\'être qualifiées d\'icônes instantanées. Créée sans compromis et bénéficiant de la force collective de Kawasaki Heavy Industries, la Ninja H2R exige le respect et attire les pilotes les plus compétents et les plus engagés. La H2R présente les caractéristiques suivantes : Suspension arrière Ohlins, levier de vitesse rapide haut et bas, dispositifs aérodynamiques, gestion des virages et affichage de l\'angle d\'inclinaison. Ninja H2R, participez à l\'histoire. Ce véhicule n\'est pas fabriqué pour être utilisé sur la voie publique.', '2024-04-23 15:02:51', '2024-04-23 15:02:51');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `FIRSTNAME` varchar(255) DEFAULT NULL,
  `LASTNAME` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `ROLE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_USER`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `PASSWORD`, `ROLE`) VALUES
(1, 'Fred', 'STAMP', 'fred.stam@email.com', '$2y$13$qc5zkK1.XqgZbJim2xEqOey.NajSaKdt/wZH5QI64cgutX6F/6JDW', 'ROLE_USER'),
(2, 'Alice', 'BORDER', 'alice.border@email.com', '$2y$13$qc5zkK1.XqgZbJim2xEqOey.NajSaKdt/wZH5QI64cgutX6F/6JDW', 'ROLE_USER'),
(3, 'John', 'KAPLAN', 'john.kaplan@email.com', '$2y$13$qc5zkK1.XqgZbJim2xEqOey.NajSaKdt/wZH5QI64cgutX6F/6JDW', 'ROLE_ADMIN'),
(4, 'Vera', 'EDITE', 'vera.edite@email.com', '$2y$13$qc5zkK1.XqgZbJim2xEqOey.NajSaKdt/wZH5QI64cgutX6F/6JDW', 'ROLE_USER'),
(5, 'visoth', 'youksim', 'viz@vizz.com', '$2y$10$qEY8Hou0BoTSmR4zyYNi/.DKQJl9k2gbrbA90H5SXw4nAbNz5HzZa', 'ROLE_USER');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`ID_FORUM`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID_MESSAGE`),
  ADD KEY `FK_MESSAGE_PUBLISH_POST` (`ID_POST`),
  ADD KEY `FK_MESSAGE_WRITE_USER` (`ID_USER`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID_POST`),
  ADD KEY `FK_POST_BELONG_TO_FORUM` (`ID_FORUM`),
  ADD KEY `FK_POST_START_USER` (`ID_USER`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `ID_FORUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `ID_MESSAGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `ID_POST` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_MESSAGE_PUBLISH_POST` FOREIGN KEY (`ID_POST`) REFERENCES `post` (`ID_POST`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_MESSAGE_WRITE_USER` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_POST_BELONG_TO_FORUM` FOREIGN KEY (`ID_FORUM`) REFERENCES `forum` (`ID_FORUM`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_POST_START_USER` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
