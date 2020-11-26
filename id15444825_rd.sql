-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 26 nov. 2020 à 12:53
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id15444825_rd`
--

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `num` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`id`, `nom`, `prenom`, `email`, `num`) VALUES
(1, 'Tatani', 'Saida', 'tatani.saida@gmail.com', '2468'),
(2, 'Zarouali', 'Said', 'zarouali.said@gmail.com', '13579');

-- --------------------------------------------------------

--
-- Structure de la table `comite`
--

CREATE TABLE `comite` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `num` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comite`
--

INSERT INTO `comite` (`id`, `nom`, `prenom`, `email`, `num`) VALUES
(1, 'Bouchta', 'Hayat', 'hayat.bouchta@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

CREATE TABLE `creneau` (
  `id` int(11) NOT NULL,
  `jour` date NOT NULL,
  `heure` time NOT NULL,
  `lieu` varchar(40) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `creneau`
--

INSERT INTO `creneau` (`id`, `jour`, `heure`, `lieu`, `etat`) VALUES
(2, '2020-11-14', '11:00:00', 'Amphi 2', 1),
(3, '2020-11-29', '09:00:00', 'Amphi 1', 1),
(5, '2020-12-15', '17:02:54', 'Amphi 2', 1),
(6, '2020-12-16', '15:43:56', 'Amphi 1', 1),
(7, '2020-12-02', '16:44:26', 'Amphi 6', 1),
(8, '2020-12-02', '14:00:00', 'Amphi 4', 1),
(10, '2020-11-03', '09:00:00', 'Amphi 7', 1),
(11, '2020-12-11', '10:00:00', 'Amphi 8', 1),
(12, '2020-08-28', '17:00:00', 'Amphi 2', 1),
(13, '2020-02-12', '13:00:00', 'Amphi 1', 1),
(14, '2020-06-12', '11:00:00', 'Amphi 6', 1),
(15, '2020-04-29', '12:00:00', 'Amphi 4', 1),
(16, '2020-01-08', '12:00:00', 'Amphi 9', 1),
(17, '2020-07-13', '12:00:00', 'Amphi 5', 1),
(18, '2020-10-12', '10:00:00', 'Amphi 2', 1),
(19, '2020-12-19', '16:00:00', 'Amphi 4', 1),
(20, '2020-05-17', '14:00:00', 'Amphi 7', 1),
(21, '2020-02-03', '10:00:00', 'Amphi 7', 1),
(22, '2020-02-29', '16:00:00', 'Amphi 7', 1),
(23, '2020-02-24', '10:00:00', 'Amphi 9', 1),
(24, '2020-01-25', '13:00:00', 'Amphi 2', 1),
(25, '2020-03-04', '13:00:00', 'Amphi 6', 1),
(26, '2020-09-20', '14:00:00', 'Amphi 6', 1),
(27, '2020-10-09', '17:00:00', 'Amphi 4', 1),
(28, '2020-09-25', '08:00:00', 'Amphi 7', 1),
(29, '2020-06-09', '12:00:00', 'Amphi 1', 1),
(30, '2020-11-16', '09:00:00', 'Amphi 4', 1),
(31, '2020-08-10', '15:00:00', 'Amphi 6', 1),
(32, '2020-08-21', '10:00:00', 'Amphi 6', 1),
(33, '2020-05-21', '12:00:00', 'Amphi 3', 1),
(34, '2020-11-09', '18:00:00', 'Amphi 5', 1),
(35, '2020-11-24', '13:00:00', 'Amphi 1', 1),
(36, '2020-09-25', '09:00:00', 'Amphi 4', 1),
(37, '2020-04-10', '10:00:00', 'Amphi 2', 1),
(38, '2020-08-23', '14:00:00', 'Amphi 1', 1),
(39, '2020-06-21', '15:00:00', 'Amphi 8', 1),
(40, '2020-01-12', '17:00:00', 'Amphi 9', 1),
(41, '2020-11-13', '09:00:00', 'Amphi 9', 1),
(42, '2020-02-18', '15:00:00', 'Amphi 4', 1),
(43, '2020-07-05', '17:00:00', 'Amphi 5', 1),
(44, '2020-05-10', '16:00:00', 'Amphi 4', 1),
(45, '2020-01-21', '09:00:00', 'Amphi 4', 1),
(46, '2020-09-20', '16:00:00', 'Amphi 2', 1),
(47, '2020-05-04', '09:00:00', 'Amphi 5', 1),
(48, '2020-11-12', '12:00:00', 'Amphi 5', 1),
(49, '2020-11-25', '15:00:00', 'Amphi 9', 1),
(50, '2020-09-03', '18:00:00', 'Amphi 10', 1),
(51, '2020-01-26', '11:00:00', 'Amphi 3', 1),
(52, '2020-11-08', '09:00:00', 'Amphi 9', 1),
(53, '2020-12-24', '09:00:00', 'Amphi 9', 1),
(54, '2020-05-05', '17:00:00', 'Amphi 9', 1),
(55, '2020-12-01', '09:00:00', 'Amphi 9', 1),
(56, '2020-07-24', '08:00:00', 'Amphi 7', 1),
(57, '2020-03-09', '18:00:00', 'Amphi 2', 1),
(58, '2020-02-04', '16:00:00', 'Amphi 5', 1),
(59, '2020-08-04', '13:00:00', 'Amphi 2', 1),
(60, '2020-10-15', '08:00:00', 'Amphi 3', 1),
(61, '2020-03-26', '14:00:00', 'Amphi 9', 1),
(62, '2020-07-15', '13:00:00', 'Amphi 4', 1),
(63, '2020-07-05', '17:00:00', 'Amphi 2', 1),
(64, '2020-04-25', '16:00:00', 'Amphi 3', 1),
(65, '2020-06-26', '11:00:00', 'Amphi 4', 1),
(66, '2020-10-19', '14:00:00', 'Amphi 4', 1),
(67, '2020-08-16', '16:00:00', 'Amphi 4', 1),
(68, '2020-11-14', '09:00:00', 'Amphi 8', 1),
(69, '2020-07-27', '13:00:00', 'Amphi 7', 1),
(70, '2020-03-29', '13:00:00', 'Amphi 2', 1),
(71, '2020-08-23', '09:00:00', 'Amphi 7', 1),
(72, '2020-03-27', '18:00:00', 'Amphi 9', 1),
(73, '2020-02-17', '08:00:00', 'Amphi 9', 1),
(74, '2020-02-11', '12:00:00', 'Amphi 5', 1),
(76, '2020-11-15', '09:00:00', 'Amphi 1', 1),
(77, '2020-08-27', '13:00:00', 'Amphi 1', 1),
(78, '2020-04-17', '12:00:00', 'Amphi 7', 1),
(79, '2020-08-25', '09:00:00', 'Amphi 6', 1),
(80, '2020-06-24', '14:00:00', 'Amphi 8', 1),
(81, '2020-03-09', '08:00:00', 'Amphi 1', 1),
(82, '2020-08-18', '15:00:00', 'Amphi 9', 1),
(83, '2020-04-06', '18:00:00', 'Amphi 3', 1),
(84, '2020-08-17', '13:00:00', 'Amphi 3', 1),
(85, '2020-07-11', '15:00:00', 'Amphi 10', 1),
(86, '2020-04-07', '09:00:00', 'Amphi 5', 1),
(87, '2020-01-23', '10:00:00', 'Amphi 6', 1),
(88, '2020-06-01', '10:00:00', 'Amphi 6', 1),
(89, '2020-12-14', '15:00:00', 'Amphi 6', 1),
(90, '2020-02-25', '14:00:00', 'Amphi 4', 1),
(91, '2020-09-27', '12:00:00', 'Amphi 10', 1),
(92, '2020-12-22', '18:00:00', 'Amphi 9', 1),
(93, '2020-10-17', '12:00:00', 'Amphi 4', 1),
(94, '2020-05-06', '10:00:00', 'Amphi 1', 1),
(95, '2020-10-19', '17:00:00', 'Amphi 10', 1),
(96, '2020-12-26', '14:00:00', 'Amphi 3', 1),
(97, '2020-09-02', '13:00:00', 'Amphi 2', 1),
(98, '2020-08-11', '09:00:00', 'Amphi 3', 1),
(99, '2020-02-23', '13:00:00', 'Amphi 7', 1),
(100, '2020-08-12', '13:00:00', 'Amphi 10', 1),
(101, '2020-03-25', '16:00:00', 'Amphi 10', 1),
(102, '2020-03-23', '14:00:00', 'Amphi 1', 1),
(103, '2020-05-28', '14:00:00', 'Amphi 3', 1),
(104, '2020-05-19', '18:00:00', 'Amphi 8', 1),
(105, '2020-05-01', '09:00:00', 'Amphi 3', 1),
(106, '2020-12-09', '10:00:00', 'Amphi 9', 2),
(107, '2020-07-21', '08:00:00', 'Amphi 2', 1),
(108, '2020-07-20', '13:00:00', 'Amphi 3', 1),
(109, '2020-03-20', '14:00:00', 'Amphi 8', 1),
(110, '2020-04-17', '09:00:00', 'Amphi 10', 1),
(111, '2020-12-11', '10:00:00', 'Amphi 9', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `CNE` varchar(15) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_apoge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`CNE`, `nom`, `prenom`, `email`, `no_apoge`) VALUES
('R32656', 'test', 'example', 'email@gmail.com', 554666);

-- --------------------------------------------------------

--
-- Structure de la table `prof`
--

CREATE TABLE `prof` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `noProf` varchar(40) NOT NULL,
  `spec` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prof`
--

INSERT INTO `prof` (`id`, `nom`, `prenom`, `noProf`, `spec`, `email`) VALUES
(1, 'Jalal', 'Hamid', '32456710', 'Pediatrie', 'jalal.hamid@gmail.com'),
(2, 'Edrissi', 'Khadija', '98673517', 'Orthophonie', 'edrissi.khadeja@gmail.com'),
(3, 'Bendrimou', 'Hassan', '87493019', 'Pediatrie', 'hassan.bendrimou@gmail.com'),
(4, 'Elyazadi', 'Radia', '63249789', 'Specialite2', 'alyazadi.radia@gmail.com'),
(5, 'Warfali', 'khalid', '65780912', 'Specialite3', 'warfali.khalid@gmail.com'),
(6, 'Tity', 'Hafsa', '65123465', 'Specialite5', 'tity.hafsa@gmail.com'),
(7, 'Life', 'Simo', '76894356', 'Specialite7', 'life.simo@gmail.com'),
(8, 'Raghib', 'Amine', '67009900', 'Specialite8', 'raghib.amine@gnail.com');

-- --------------------------------------------------------

--
-- Structure de la table `soutenance`
--

CREATE TABLE `soutenance` (
  `soutenance_id` int(11) NOT NULL,
  `date_depot_sujet` date NOT NULL,
  `directeur` int(11) NOT NULL,
  `intitule_these` varchar(126) NOT NULL,
  `nature_these` varchar(126) NOT NULL,
  `materiel_d_etude_et_echantillioannage` varchar(255) NOT NULL,
  `duree_d_etude` varchar(100) NOT NULL,
  `lieu_d_etude` varchar(255) NOT NULL,
  `objectif_d_etude` varchar(1024) NOT NULL,
  `mots_cles` varchar(1024) NOT NULL,
  `president` int(11) NOT NULL,
  `jury1` int(11) NOT NULL,
  `jury2` int(11) NOT NULL,
  `jury3` int(11) NOT NULL,
  `jury4` int(11) DEFAULT NULL,
  `etudiant` varchar(15) NOT NULL,
  `creneau` int(11) NOT NULL,
  `etat` tinyint(4) NOT NULL,
  `motif` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `soutenance`
--

INSERT INTO `soutenance` (`soutenance_id`, `date_depot_sujet`, `directeur`, `intitule_these`, `nature_these`, `materiel_d_etude_et_echantillioannage`, `duree_d_etude`, `lieu_d_etude`, `objectif_d_etude`, `mots_cles`, `president`, `jury1`, `jury2`, `jury3`, `jury4`, `etudiant`, `creneau`, `etat`, `motif`) VALUES
(7, '2020-06-11', 2, 'dfgdfgdf', 'gdfgdfg', 'gdfgdfgdf', 'gdfgdfgdf', 'dgfgdf', 'gdfgdfgdfdf', 'gdfgfd', 1, 3, 4, 5, 6, 'R32656', 106, 1, 'dfds');

-- --------------------------------------------------------

--
-- Structure de la table `these`
--

CREATE TABLE `these` (
  `id` int(11) NOT NULL,
  `intitule` varchar(40) NOT NULL,
  `id_directeur_these` int(100) NOT NULL,
  `nature_etude` varchar(100) NOT NULL,
  `materiel_etude_echan` varchar(100) NOT NULL,
  `duree_etude` varchar(100) NOT NULL,
  `lieu_etude` varchar(100) NOT NULL,
  `objectifes_etude` text NOT NULL,
  `mots_cles` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `these`
--

INSERT INTO `these` (`id`, `intitule`, `id_directeur_these`, `nature_etude`, `materiel_etude_echan`, `duree_etude`, `lieu_etude`, `objectifes_etude`, `mots_cles`) VALUES
(1, 'These 1', 2, 'nkldsnfksndknsdz', 'ansmdknasdklncklsndacksdzn', 'aksdjkasd', 'kasndknaskdns', 'kasnfkansdfknaskfnaksfnaksnf', 'lakdksa,asdojas,asofj,aoskjf,asofj');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comite`
--
ALTER TABLE `comite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `creneau`
--
ALTER TABLE `creneau`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`CNE`),
  ADD UNIQUE KEY `CNE` (`CNE`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `soutenance`
--
ALTER TABLE `soutenance`
  ADD PRIMARY KEY (`soutenance_id`),
  ADD KEY `directeur` (`directeur`),
  ADD KEY `president` (`president`),
  ADD KEY `jury1` (`jury1`),
  ADD KEY `jury2` (`jury2`),
  ADD KEY `jury3` (`jury3`),
  ADD KEY `jury4` (`jury4`),
  ADD KEY `etudiant` (`etudiant`),
  ADD KEY `creneau` (`creneau`);

--
-- Index pour la table `these`
--
ALTER TABLE `these`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prof_these` (`id_directeur_these`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `comite`
--
ALTER TABLE `comite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `creneau`
--
ALTER TABLE `creneau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT pour la table `prof`
--
ALTER TABLE `prof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `soutenance`
--
ALTER TABLE `soutenance`
  MODIFY `soutenance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `these`
--
ALTER TABLE `these`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `soutenance`
--
ALTER TABLE `soutenance`
  ADD CONSTRAINT `soutenance_ibfk_1` FOREIGN KEY (`directeur`) REFERENCES `prof` (`id`),
  ADD CONSTRAINT `soutenance_ibfk_2` FOREIGN KEY (`president`) REFERENCES `prof` (`id`),
  ADD CONSTRAINT `soutenance_ibfk_3` FOREIGN KEY (`jury1`) REFERENCES `prof` (`id`),
  ADD CONSTRAINT `soutenance_ibfk_4` FOREIGN KEY (`jury2`) REFERENCES `prof` (`id`),
  ADD CONSTRAINT `soutenance_ibfk_5` FOREIGN KEY (`jury3`) REFERENCES `prof` (`id`),
  ADD CONSTRAINT `soutenance_ibfk_6` FOREIGN KEY (`jury4`) REFERENCES `prof` (`id`),
  ADD CONSTRAINT `soutenance_ibfk_7` FOREIGN KEY (`etudiant`) REFERENCES `etudiant` (`CNE`),
  ADD CONSTRAINT `soutenance_ibfk_8` FOREIGN KEY (`creneau`) REFERENCES `creneau` (`id`);

--
-- Contraintes pour la table `these`
--
ALTER TABLE `these`
  ADD CONSTRAINT `id_prof_these` FOREIGN KEY (`id_directeur_these`) REFERENCES `prof` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
