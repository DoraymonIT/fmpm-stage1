-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 15 nov. 2020 à 11:45
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rdvduthese`
--

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
(1, '2020-11-14', '09:00:00', 'Amphi 1', 1),
(2, '2020-11-14', '11:00:00', 'Amphi 2', 1),
(3, '2020-11-29', '09:00:00', 'Amphi 1', 1),
(4, '2020-11-17', '11:00:00', 'Amphi 2', 1),
(5, '2020-12-15', '17:02:54', 'Amphi 2', 1),
(6, '2020-12-16', '15:43:56', 'Amphi 1', 1),
(7, '2020-12-02', '16:44:26', 'Amphi 6', 1),
(8, '2020-12-02', '14:00:00', 'Amphi 4', 1);

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
('G145625311', 'aitdaoud', 'elhoussein', 'aitdaoudelhoussein@gmail.com', 1234567),
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
(2, 'Edrissi', 'Khadija', '98673517', 'Orthophonie', 'edrissi.khadeja@gmail.com');

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
  `duree_d_etude` time NOT NULL,
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
(1, '2020-03-03', 1, 'these1', 'nature', 'materqil', '04:38:28', 'lieu', 'objectif', 'ff,mm,cc', 2, 1, 1, 2, NULL, 'G145625311', 6, 1, NULL);

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
-- AUTO_INCREMENT pour la table `creneau`
--
ALTER TABLE `creneau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `prof`
--
ALTER TABLE `prof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `soutenance`
--
ALTER TABLE `soutenance`
  MODIFY `soutenance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
