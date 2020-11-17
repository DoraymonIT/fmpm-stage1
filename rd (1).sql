-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 nov. 2020 à 11:25
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
-- Base de données : `rd`
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
(6, '2020-12-16', '15:43:56', 'Amphi 1', 2),
(7, '2020-12-02', '16:44:26', 'Amphi 6', 1),
(8, '2020-12-02', '14:00:00', 'Amphi 4', 2),
(9, '2020-11-06', '19:40:00', 'Amphi 7', 1),
(10, '2020-11-03', '09:00:00', 'Amphi 7', 1);

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
(3, '2020-03-09', 3, 'ksjdhnckjzxhncjvxznc ', 'kjnzscxnzkjcn', 'kjnzscxnzkjcn', '23', 'okjasfksadjc', 'kzxcj csdzknvc sdkczm', 'JDSF,SDIJFVJ,djfkds,sdfjfja ,dsfkk', 5, 2, 1, 8, 6, 'R32656', 8, 0, NULL);

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
-- AUTO_INCREMENT pour la table `creneau`
--
ALTER TABLE `creneau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `prof`
--
ALTER TABLE `prof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `soutenance`
--
ALTER TABLE `soutenance`
  MODIFY `soutenance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
