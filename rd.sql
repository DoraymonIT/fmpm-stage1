-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 fév. 2021 à 12:53
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET FOREIGN_KEY_CHECKS=0;
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
-- Structure de la table `commite`
--

CREATE TABLE `commite` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `num` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commite`
--

INSERT INTO `commite` (`id`, `nom`, `prenom`, `email`, `num`) VALUES
(1, 'commite', 'test', 'commite@gmail.com', 123456);

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

CREATE TABLE `creneau` (
  `id` int(11) NOT NULL,
  `jour` date NOT NULL,
  `heure` time NOT NULL,
  `lieu` varchar(40) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `date_reservation` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `creneau`
--

INSERT INTO `creneau` (`id`, `jour`, `heure`, `lieu`, `etat`, `date_reservation`) VALUES
(1, '2020-11-14', '09:00:00', 'Amphi 1', 1, NULL),
(2, '2020-11-14', '11:00:00', 'Amphi 2', 1, NULL),
(323, '2020-12-24', '09:00:00', 'Amphi 1', 1, NULL),
(324, '2020-12-24', '11:00:00', 'Amphi 1', 1, NULL),
(325, '2020-12-24', '15:00:00', 'Amphi 1', 1, NULL),
(326, '2020-12-24', '09:00:00', 'Salle des Theses', 1, NULL),
(327, '2020-12-24', '11:00:00', 'Salle des Theses', 1, NULL),
(328, '2020-12-24', '15:00:00', 'Salle des Theses', 1, NULL),
(329, '2020-12-25', '09:00:00', 'Amphi 1', 1, NULL),
(330, '2020-12-25', '11:00:00', 'Amphi 1', 1, NULL),
(331, '2020-12-25', '15:00:00', 'Amphi 1', 1, NULL),
(332, '2020-12-25', '09:00:00', 'Salle des Theses', 1, NULL),
(333, '2020-12-25', '11:00:00', 'Salle des Theses', 1, NULL),
(334, '2020-12-25', '15:00:00', 'Salle des Theses', 1, NULL),
(335, '2020-12-28', '09:00:00', 'Amphi 1', 1, NULL),
(336, '2020-12-28', '11:00:00', 'Amphi 1', 1, NULL),
(337, '2020-12-28', '15:00:00', 'Amphi 1', 1, NULL),
(338, '2020-12-28', '09:00:00', 'Salle des Theses', 1, NULL),
(339, '2020-12-28', '11:00:00', 'Salle des Theses', 1, NULL),
(340, '2020-12-28', '15:00:00', 'Salle des Theses', 1, NULL),
(341, '2020-12-29', '09:00:00', 'Amphi 1', 1, NULL),
(342, '2020-12-29', '11:00:00', 'Amphi 1', 1, NULL),
(343, '2020-12-29', '15:00:00', 'Amphi 1', 1, NULL),
(344, '2020-12-29', '09:00:00', 'Salle des Theses', 1, NULL),
(345, '2020-12-29', '11:00:00', 'Salle des Theses', 1, NULL),
(346, '2020-12-29', '15:00:00', 'Salle des Theses', 1, NULL),
(347, '2020-12-30', '09:00:00', 'Amphi 1', 1, NULL),
(348, '2020-12-30', '11:00:00', 'Amphi 1', 1, NULL),
(349, '2020-12-30', '15:00:00', 'Amphi 1', 1, NULL),
(350, '2020-12-30', '09:00:00', 'Salle des Theses', 1, NULL),
(351, '2020-12-30', '11:00:00', 'Salle des Theses', 1, NULL),
(352, '2020-12-30', '15:00:00', 'Salle des Theses', 1, NULL),
(353, '2020-12-31', '09:00:00', 'Amphi 1', 1, NULL),
(354, '2020-12-31', '11:00:00', 'Amphi 1', 1, NULL),
(355, '2020-12-31', '15:00:00', 'Amphi 1', 2, NULL),
(356, '2020-12-31', '09:00:00', 'Salle des Theses', 1, NULL),
(357, '2020-12-31', '11:00:00', 'Salle des Theses', 1, NULL),
(358, '2020-12-31', '15:00:00', 'Salle des Theses', 1, NULL),
(359, '2021-01-01', '09:00:00', 'Amphi 1', 1, NULL),
(360, '2021-01-01', '11:00:00', 'Amphi 1', 1, NULL),
(361, '2021-01-01', '15:00:00', 'Amphi 1', 1, NULL),
(362, '2021-01-01', '09:00:00', 'Salle des Theses', 1, NULL),
(363, '2021-01-01', '11:00:00', 'Salle des Theses', 1, NULL),
(364, '2021-01-01', '15:00:00', 'Salle des Theses', 1, NULL),
(365, '2021-01-04', '09:00:00', 'Amphi 1', 1, NULL),
(366, '2021-01-04', '11:00:00', 'Amphi 1', 1, NULL),
(367, '2021-01-04', '15:00:00', 'Amphi 1', 1, NULL),
(368, '2021-01-04', '09:00:00', 'Salle des Theses', 1, NULL),
(369, '2021-01-04', '11:00:00', 'Salle des Theses', 1, NULL),
(370, '2021-01-04', '15:00:00', 'Salle des Theses', 1, NULL),
(371, '2021-01-05', '09:00:00', 'Amphi 1', 1, NULL),
(372, '2021-01-05', '11:00:00', 'Amphi 1', 1, NULL),
(373, '2021-01-05', '15:00:00', 'Amphi 1', 1, NULL),
(374, '2021-01-05', '09:00:00', 'Salle des Theses', 1, NULL),
(375, '2021-01-05', '11:00:00', 'Salle des Theses', 1, NULL),
(376, '2021-01-05', '15:00:00', 'Salle des Theses', 1, NULL),
(377, '2021-01-06', '09:00:00', 'Amphi 1', 1, NULL),
(378, '2021-01-06', '11:00:00', 'Amphi 1', 1, NULL),
(379, '2021-01-06', '15:00:00', 'Amphi 1', 1, NULL),
(380, '2021-01-06', '09:00:00', 'Salle des Theses', 1, NULL),
(381, '2021-01-06', '11:00:00', 'Salle des Theses', 1, NULL),
(382, '2021-01-06', '15:00:00', 'Salle des Theses', 1, NULL),
(383, '2021-01-07', '09:00:00', 'Amphi 1', 1, NULL),
(384, '2021-01-07', '11:00:00', 'Amphi 1', 1, NULL),
(385, '2021-01-07', '15:00:00', 'Amphi 1', 1, NULL),
(386, '2021-01-07', '09:00:00', 'Salle des Theses', 1, NULL),
(387, '2021-01-07', '11:00:00', 'Salle des Theses', 1, NULL),
(388, '2021-01-07', '15:00:00', 'Salle des Theses', 1, NULL),
(389, '2021-01-08', '09:00:00', 'Amphi 1', 1, NULL),
(390, '2021-01-08', '11:00:00', 'Amphi 1', 1, NULL),
(391, '2021-01-08', '15:00:00', 'Amphi 1', 1, NULL),
(392, '2021-01-08', '09:00:00', 'Salle des Theses', 1, NULL),
(393, '2021-01-08', '11:00:00', 'Salle des Theses', 1, NULL),
(394, '2021-01-08', '15:00:00', 'Salle des Theses', 1, NULL),
(395, '2021-01-11', '09:00:00', 'Amphi 1', 1, NULL),
(396, '2021-01-11', '11:00:00', 'Amphi 1', 1, NULL),
(397, '2021-01-11', '15:00:00', 'Amphi 1', 1, NULL),
(398, '2021-01-11', '09:00:00', 'Salle des Theses', 1, NULL),
(399, '2021-01-11', '11:00:00', 'Salle des Theses', 1, NULL),
(400, '2021-01-11', '15:00:00', 'Salle des Theses', 1, NULL),
(401, '2021-01-06', '09:00:00', 'Amphi 1', 1, NULL),
(402, '2021-01-06', '11:00:00', 'Amphi 1', 1, NULL),
(403, '2021-01-06', '15:00:00', 'Amphi 1', 1, NULL),
(404, '2021-01-06', '09:00:00', 'Salle des Theses', 1, NULL),
(405, '2021-01-06', '11:00:00', 'Salle des Theses', 1, NULL),
(406, '2021-01-06', '15:00:00', 'Salle des Theses', 1, NULL),
(407, '2021-01-07', '09:00:00', 'Amphi 1', 1, NULL),
(408, '2021-01-07', '11:00:00', 'Amphi 1', 1, NULL),
(409, '2021-01-07', '15:00:00', 'Amphi 1', 1, NULL),
(410, '2021-01-07', '09:00:00', 'Salle des Theses', 1, NULL),
(411, '2021-01-07', '11:00:00', 'Salle des Theses', 1, NULL),
(412, '2021-01-07', '15:00:00', 'Salle des Theses', 1, NULL),
(413, '2021-01-08', '09:00:00', 'Amphi 1', 1, NULL),
(414, '2021-01-08', '11:00:00', 'Amphi 1', 1, NULL),
(415, '2021-01-08', '15:00:00', 'Amphi 1', 1, NULL),
(416, '2021-01-08', '09:00:00', 'Salle des Theses', 1, NULL),
(417, '2021-01-08', '11:00:00', 'Salle des Theses', 1, NULL),
(418, '2021-01-08', '15:00:00', 'Salle des Theses', 1, NULL),
(419, '2021-01-11', '09:00:00', 'Amphi 1', 1, NULL),
(420, '2021-01-11', '11:00:00', 'Amphi 1', 1, NULL),
(421, '2021-01-11', '15:00:00', 'Amphi 1', 1, NULL),
(422, '2021-01-11', '09:00:00', 'Salle des Theses', 1, NULL),
(423, '2021-01-11', '11:00:00', 'Salle des Theses', 1, NULL),
(424, '2021-01-11', '15:00:00', 'Salle des Theses', 1, NULL),
(425, '2021-01-12', '09:00:00', 'Amphi 1', 1, NULL),
(426, '2021-01-12', '11:00:00', 'Amphi 1', 1, NULL),
(427, '2021-01-12', '15:00:00', 'Amphi 1', 1, NULL),
(428, '2021-01-12', '09:00:00', 'Salle des Theses', 1, NULL),
(429, '2021-01-12', '11:00:00', 'Salle des Theses', 1, NULL),
(430, '2021-01-12', '15:00:00', 'Salle des Theses', 1, NULL),
(431, '2021-01-13', '09:00:00', 'Amphi 1', 1, NULL),
(432, '2021-01-13', '11:00:00', 'Amphi 1', 1, NULL),
(433, '2021-01-13', '15:00:00', 'Amphi 1', 1, NULL),
(434, '2021-01-13', '09:00:00', 'Salle des Theses', 1, NULL),
(435, '2021-01-13', '11:00:00', 'Salle des Theses', 1, NULL),
(436, '2021-01-13', '15:00:00', 'Salle des Theses', 1, NULL),
(437, '2021-01-14', '09:00:00', 'Amphi 1', 1, NULL),
(438, '2021-01-14', '11:00:00', 'Amphi 1', 1, NULL),
(439, '2021-01-14', '15:00:00', 'Amphi 1', 1, NULL),
(440, '2021-01-14', '09:00:00', 'Salle des Theses', 1, NULL),
(441, '2021-01-14', '11:00:00', 'Salle des Theses', 1, NULL),
(442, '2021-01-14', '15:00:00', 'Salle des Theses', 1, NULL),
(443, '2021-01-15', '09:00:00', 'Amphi 1', 1, NULL),
(444, '2021-01-15', '11:00:00', 'Amphi 1', 1, NULL),
(445, '2021-01-15', '15:00:00', 'Amphi 1', 1, NULL),
(446, '2021-01-15', '09:00:00', 'Salle des Theses', 1, NULL),
(447, '2021-01-15', '11:00:00', 'Salle des Theses', 1, NULL),
(448, '2021-01-15', '15:00:00', 'Salle des Theses', 1, NULL),
(449, '2021-01-18', '09:00:00', 'Amphi 1', 1, NULL),
(450, '2021-01-18', '11:00:00', 'Amphi 1', 1, NULL),
(451, '2021-01-18', '15:00:00', 'Amphi 1', 1, NULL),
(452, '2021-01-18', '09:00:00', 'Salle des Theses', 1, NULL),
(453, '2021-01-18', '11:00:00', 'Salle des Theses', 1, NULL),
(454, '2021-01-18', '15:00:00', 'Salle des Theses', 1, NULL),
(455, '2021-01-19', '09:00:00', 'Amphi 1', 2, '2020-12-19 00:56:31'),
(456, '2021-01-19', '11:00:00', 'Amphi 1', 1, NULL),
(457, '2021-01-19', '15:00:00', 'Amphi 1', 1, NULL),
(458, '2021-01-19', '09:00:00', 'Salle des Theses', 1, NULL),
(459, '2021-01-19', '11:00:00', 'Salle des Theses', 1, NULL),
(460, '2021-01-19', '15:00:00', 'Salle des Theses', 1, NULL),
(461, '2021-01-20', '09:00:00', 'Amphi 1', 1, NULL),
(462, '2021-01-20', '11:00:00', 'Amphi 1', 1, NULL),
(463, '2021-01-20', '15:00:00', 'Amphi 1', 1, NULL),
(464, '2021-01-20', '09:00:00', 'Salle des Theses', 1, NULL),
(465, '2021-01-20', '11:00:00', 'Salle des Theses', 1, NULL),
(466, '2021-01-20', '15:00:00', 'Salle des Theses', 1, NULL),
(467, '2021-01-21', '09:00:00', 'Amphi 1', 1, NULL),
(468, '2021-01-21', '11:00:00', 'Amphi 1', 1, NULL),
(469, '2021-01-21', '15:00:00', 'Amphi 1', 1, NULL),
(470, '2021-01-21', '09:00:00', 'Salle des Theses', 1, NULL),
(471, '2021-01-21', '11:00:00', 'Salle des Theses', 1, NULL),
(472, '2021-01-21', '15:00:00', 'Salle des Theses', 1, NULL),
(473, '2021-01-22', '09:00:00', 'Amphi 1', 1, NULL),
(474, '2021-01-22', '11:00:00', 'Amphi 1', 1, NULL),
(475, '2021-01-22', '15:00:00', 'Amphi 1', 1, NULL),
(476, '2021-01-22', '09:00:00', 'Salle des Theses', 1, NULL),
(477, '2021-01-22', '11:00:00', 'Salle des Theses', 1, NULL),
(478, '2021-01-22', '15:00:00', 'Salle des Theses', 1, NULL),
(479, '2021-01-25', '09:00:00', 'Amphi 1', 1, NULL),
(480, '2021-01-25', '11:00:00', 'Amphi 1', 1, NULL),
(481, '2021-01-25', '15:00:00', 'Amphi 1', 1, NULL),
(482, '2021-01-25', '09:00:00', 'Salle des Theses', 1, NULL),
(483, '2021-01-25', '11:00:00', 'Salle des Theses', 1, NULL),
(484, '2021-01-25', '15:00:00', 'Salle des Theses', 1, NULL),
(485, '2021-01-26', '09:00:00', 'Amphi 1', 1, NULL),
(486, '2021-01-26', '11:00:00', 'Amphi 1', 1, NULL),
(487, '2021-01-26', '15:00:00', 'Amphi 1', 1, NULL),
(488, '2021-01-26', '09:00:00', 'Salle des Theses', 1, NULL),
(489, '2021-01-26', '11:00:00', 'Salle des Theses', 1, NULL),
(490, '2021-01-26', '15:00:00', 'Salle des Theses', 1, NULL),
(491, '2021-01-27', '09:00:00', 'Amphi 1', 1, NULL),
(492, '2021-01-27', '11:00:00', 'Amphi 1', 1, NULL),
(493, '2021-01-27', '15:00:00', 'Amphi 1', 1, NULL),
(494, '2021-01-27', '09:00:00', 'Salle des Theses', 1, NULL),
(495, '2021-01-27', '11:00:00', 'Salle des Theses', 1, NULL),
(496, '2021-01-27', '15:00:00', 'Salle des Theses', 1, NULL),
(497, '2021-01-28', '09:00:00', 'Amphi 1', 1, NULL),
(498, '2021-01-28', '11:00:00', 'Amphi 1', 1, NULL),
(499, '2021-01-28', '15:00:00', 'Amphi 1', 1, NULL),
(500, '2021-01-28', '09:00:00', 'Salle des Theses', 1, NULL),
(501, '2021-01-28', '11:00:00', 'Salle des Theses', 1, NULL),
(502, '2021-01-28', '15:00:00', 'Salle des Theses', 1, NULL),
(503, '2021-01-29', '09:00:00', 'Amphi 1', 1, NULL),
(504, '2021-01-29', '11:00:00', 'Amphi 1', 1, NULL),
(505, '2021-01-29', '15:00:00', 'Amphi 1', 1, NULL),
(506, '2021-01-29', '09:00:00', 'Salle des Theses', 1, NULL),
(507, '2021-01-29', '11:00:00', 'Salle des Theses', 1, NULL),
(508, '2021-01-29', '15:00:00', 'Salle des Theses', 1, NULL),
(509, '2021-02-01', '09:00:00', 'Amphi 1', 1, NULL),
(510, '2021-02-01', '11:00:00', 'Amphi 1', 1, NULL),
(511, '2021-02-01', '15:00:00', 'Amphi 1', 1, NULL),
(512, '2021-02-01', '09:00:00', 'Salle des Theses', 1, NULL),
(513, '2021-02-01', '11:00:00', 'Salle des Theses', 1, NULL),
(514, '2021-02-01', '15:00:00', 'Salle des Theses', 1, NULL),
(515, '2021-02-02', '09:00:00', 'Amphi 1', 1, NULL),
(516, '2021-02-02', '11:00:00', 'Amphi 1', 1, NULL),
(517, '2021-02-02', '15:00:00', 'Amphi 1', 1, NULL),
(518, '2021-02-02', '09:00:00', 'Salle des Theses', 1, NULL),
(519, '2021-02-02', '11:00:00', 'Salle des Theses', 1, NULL),
(520, '2021-02-02', '15:00:00', 'Salle des Theses', 1, NULL),
(521, '2021-02-03', '09:00:00', 'Amphi 1', 1, NULL),
(522, '2021-02-03', '11:00:00', 'Amphi 1', 1, NULL),
(523, '2021-02-03', '15:00:00', 'Amphi 1', 1, NULL),
(524, '2021-02-03', '09:00:00', 'Salle des Theses', 1, NULL),
(525, '2021-02-03', '11:00:00', 'Salle des Theses', 1, NULL),
(526, '2021-02-03', '15:00:00', 'Salle des Theses', 1, NULL),
(527, '2021-02-04', '09:00:00', 'Amphi 1', 1, NULL),
(528, '2021-02-04', '11:00:00', 'Amphi 1', 1, NULL),
(529, '2021-02-04', '15:00:00', 'Amphi 1', 1, NULL),
(530, '2021-02-04', '09:00:00', 'Salle des Theses', 1, NULL),
(531, '2021-02-04', '11:00:00', 'Salle des Theses', 1, NULL),
(532, '2021-02-04', '15:00:00', 'Salle des Theses', 1, NULL),
(533, '2021-02-05', '09:00:00', 'Amphi 1', 1, NULL),
(534, '2021-02-05', '11:00:00', 'Amphi 1', 1, NULL),
(535, '2021-02-05', '15:00:00', 'Amphi 1', 1, NULL),
(536, '2021-02-05', '09:00:00', 'Salle des Theses', 1, NULL),
(537, '2021-02-05', '11:00:00', 'Salle des Theses', 1, NULL),
(538, '2021-02-05', '15:00:00', 'Salle des Theses', 1, NULL),
(539, '2021-02-08', '09:00:00', 'Amphi 1', 1, NULL),
(540, '2021-02-08', '11:00:00', 'Amphi 1', 1, NULL),
(541, '2021-02-08', '15:00:00', 'Amphi 1', 1, NULL),
(542, '2021-02-08', '09:00:00', 'Salle des Theses', 1, NULL),
(543, '2021-02-08', '11:00:00', 'Salle des Theses', 1, NULL),
(544, '2021-02-08', '15:00:00', 'Salle des Theses', 1, NULL),
(545, '2021-02-09', '09:00:00', 'Amphi 1', 1, NULL),
(546, '2021-02-09', '11:00:00', 'Amphi 1', 1, NULL),
(547, '2021-02-09', '15:00:00', 'Amphi 1', 1, NULL),
(548, '2021-02-09', '09:00:00', 'Salle des Theses', 1, NULL),
(549, '2021-02-09', '11:00:00', 'Salle des Theses', 1, NULL),
(550, '2021-02-09', '15:00:00', 'Salle des Theses', 1, NULL),
(551, '2021-02-10', '09:00:00', 'Amphi 1', 1, NULL),
(552, '2021-02-10', '11:00:00', 'Amphi 1', 1, NULL),
(553, '2021-02-10', '15:00:00', 'Amphi 1', 1, NULL),
(554, '2021-02-10', '09:00:00', 'Salle des Theses', 1, NULL),
(555, '2021-02-10', '11:00:00', 'Salle des Theses', 1, NULL),
(556, '2021-02-10', '15:00:00', 'Salle des Theses', 1, NULL),
(557, '2021-02-11', '09:00:00', 'Amphi 1', 1, NULL),
(558, '2021-02-11', '11:00:00', 'Amphi 1', 1, NULL),
(559, '2021-02-11', '15:00:00', 'Amphi 1', 1, NULL),
(560, '2021-02-11', '09:00:00', 'Salle des Theses', 1, NULL),
(561, '2021-02-11', '11:00:00', 'Salle des Theses', 1, NULL),
(562, '2021-02-11', '15:00:00', 'Salle des Theses', 1, NULL),
(563, '2021-02-12', '09:00:00', 'Amphi 1', 1, NULL),
(564, '2021-02-12', '11:00:00', 'Amphi 1', 1, NULL),
(565, '2021-02-12', '15:00:00', 'Amphi 1', 1, NULL),
(566, '2021-02-12', '09:00:00', 'Salle des Theses', 1, NULL),
(567, '2021-02-12', '11:00:00', 'Salle des Theses', 1, NULL),
(568, '2021-02-12', '15:00:00', 'Salle des Theses', 1, NULL),
(569, '2021-02-15', '09:00:00', 'Amphi 1', 1, NULL),
(570, '2021-02-15', '11:00:00', 'Amphi 1', 1, NULL),
(571, '2021-02-15', '15:00:00', 'Amphi 1', 1, NULL),
(572, '2021-02-15', '09:00:00', 'Salle des Theses', 1, NULL),
(573, '2021-02-15', '11:00:00', 'Salle des Theses', 1, NULL),
(574, '2021-02-15', '15:00:00', 'Salle des Theses', 1, NULL),
(575, '2021-02-16', '09:00:00', 'Amphi 1', 1, NULL),
(576, '2021-02-16', '11:00:00', 'Amphi 1', 1, NULL),
(577, '2021-02-16', '15:00:00', 'Amphi 1', 1, NULL),
(578, '2021-02-16', '09:00:00', 'Salle des Theses', 1, NULL),
(579, '2021-02-16', '11:00:00', 'Salle des Theses', 1, NULL),
(580, '2021-02-16', '15:00:00', 'Salle des Theses', 1, NULL),
(581, '2021-02-17', '09:00:00', 'Amphi 1', 1, NULL),
(582, '2021-02-17', '11:00:00', 'Amphi 1', 1, NULL),
(583, '2021-02-17', '15:00:00', 'Amphi 1', 1, NULL),
(584, '2021-02-17', '09:00:00', 'Salle des Theses', 1, NULL),
(585, '2021-02-17', '11:00:00', 'Salle des Theses', 1, NULL),
(586, '2021-02-17', '15:00:00', 'Salle des Theses', 1, NULL),
(587, '2021-02-18', '09:00:00', 'Amphi 1', 1, NULL),
(588, '2021-02-18', '11:00:00', 'Amphi 1', 3, NULL),
(589, '2021-02-18', '15:00:00', 'Amphi 1', 3, NULL),
(590, '2021-02-18', '09:00:00', 'Salle des Theses', 1, NULL),
(591, '2021-02-18', '11:00:00', 'Salle des Theses', 1, NULL),
(592, '2021-02-18', '15:00:00', 'Salle des Theses', 1, NULL),
(593, '2021-02-19', '09:00:00', 'Amphi 1', 1, NULL),
(594, '2021-02-19', '11:00:00', 'Amphi 1', 1, NULL),
(595, '2021-02-19', '15:00:00', 'Amphi 1', 1, NULL),
(596, '2021-02-19', '09:00:00', 'Salle des Theses', 1, NULL),
(597, '2021-02-19', '11:00:00', 'Salle des Theses', 1, NULL),
(598, '2021-02-19', '15:00:00', 'Salle des Theses', 1, NULL),
(599, '2021-02-22', '09:00:00', 'Amphi 1', 1, NULL),
(600, '2021-02-22', '11:00:00', 'Amphi 1', 1, NULL),
(601, '2021-02-22', '15:00:00', 'Amphi 1', 1, NULL),
(602, '2021-02-22', '09:00:00', 'Salle des Theses', 1, NULL),
(603, '2021-02-22', '11:00:00', 'Salle des Theses', 1, NULL),
(604, '2021-02-22', '15:00:00', 'Salle des Theses', 1, NULL),
(605, '2021-02-23', '09:00:00', 'Amphi 1', 1, NULL),
(606, '2021-02-23', '11:00:00', 'Amphi 1', 1, NULL),
(607, '2021-02-23', '15:00:00', 'Amphi 1', 1, NULL),
(608, '2021-02-23', '09:00:00', 'Salle des Theses', 1, NULL),
(609, '2021-02-23', '11:00:00', 'Salle des Theses', 1, NULL),
(610, '2021-02-23', '15:00:00', 'Salle des Theses', 1, NULL),
(611, '2021-02-24', '09:00:00', 'Amphi 1', 1, NULL),
(612, '2021-02-24', '11:00:00', 'Amphi 1', 1, NULL),
(613, '2021-02-24', '15:00:00', 'Amphi 1', 1, NULL),
(614, '2021-02-24', '09:00:00', 'Salle des Theses', 1, NULL),
(615, '2021-02-24', '11:00:00', 'Salle des Theses', 1, NULL),
(616, '2021-02-24', '15:00:00', 'Salle des Theses', 1, NULL),
(617, '2021-02-25', '09:00:00', 'Amphi 1', 1, NULL),
(618, '2021-02-25', '11:00:00', 'Amphi 1', 1, NULL),
(619, '2021-02-25', '15:00:00', 'Amphi 1', 1, NULL),
(620, '2021-02-25', '09:00:00', 'Salle des Theses', 1, NULL),
(621, '2021-02-25', '11:00:00', 'Salle des Theses', 1, NULL),
(622, '2021-02-25', '15:00:00', 'Salle des Theses', 1, NULL),
(623, '2021-02-26', '09:00:00', 'Amphi 1', 1, NULL),
(624, '2021-02-26', '11:00:00', 'Amphi 1', 1, NULL),
(625, '2021-02-26', '15:00:00', 'Amphi 1', 1, NULL),
(626, '2021-02-26', '09:00:00', 'Salle des Theses', 1, NULL),
(627, '2021-02-26', '11:00:00', 'Salle des Theses', 1, NULL),
(628, '2021-02-26', '15:00:00', 'Salle des Theses', 1, NULL),
(629, '2021-03-01', '09:00:00', 'Amphi 1', 1, NULL),
(630, '2021-03-01', '11:00:00', 'Amphi 1', 1, NULL),
(631, '2021-03-01', '15:00:00', 'Amphi 1', 1, NULL),
(632, '2021-03-01', '09:00:00', 'Salle des Theses', 1, NULL),
(633, '2021-03-01', '11:00:00', 'Salle des Theses', 1, NULL),
(634, '2021-03-01', '15:00:00', 'Salle des Theses', 1, NULL),
(635, '2021-03-02', '09:00:00', 'Amphi 1', 1, NULL),
(636, '2021-03-02', '11:00:00', 'Amphi 1', 1, NULL),
(637, '2021-03-02', '15:00:00', 'Amphi 1', 1, NULL),
(638, '2021-03-02', '09:00:00', 'Salle des Theses', 1, NULL),
(639, '2021-03-02', '11:00:00', 'Salle des Theses', 1, NULL),
(640, '2021-03-02', '15:00:00', 'Salle des Theses', 1, NULL),
(641, '2021-03-03', '09:00:00', 'Amphi 1', 1, NULL),
(642, '2021-03-03', '11:00:00', 'Amphi 1', 1, NULL),
(643, '2021-03-03', '15:00:00', 'Amphi 1', 1, NULL),
(644, '2021-03-03', '09:00:00', 'Salle des Theses', 1, NULL),
(645, '2021-03-03', '11:00:00', 'Salle des Theses', 1, NULL),
(646, '2021-03-03', '15:00:00', 'Salle des Theses', 1, NULL),
(647, '2021-03-04', '09:00:00', 'Amphi 1', 1, NULL),
(648, '2021-03-04', '11:00:00', 'Amphi 1', 1, NULL),
(649, '2021-03-04', '15:00:00', 'Amphi 1', 1, NULL),
(650, '2021-03-04', '09:00:00', 'Salle des Theses', 1, NULL),
(651, '2021-03-04', '11:00:00', 'Salle des Theses', 1, NULL),
(652, '2021-03-04', '15:00:00', 'Salle des Theses', 1, NULL),
(653, '2021-03-05', '09:00:00', 'Amphi 1', 1, NULL),
(654, '2021-03-05', '11:00:00', 'Amphi 1', 1, NULL),
(655, '2021-03-05', '15:00:00', 'Amphi 1', 1, NULL),
(656, '2021-03-05', '09:00:00', 'Salle des Theses', 1, NULL),
(657, '2021-03-05', '11:00:00', 'Salle des Theses', 1, NULL),
(658, '2021-03-05', '15:00:00', 'Salle des Theses', 1, NULL),
(659, '2021-03-08', '09:00:00', 'Amphi 1', 1, NULL),
(660, '2021-03-08', '11:00:00', 'Amphi 1', 1, NULL),
(661, '2021-03-08', '15:00:00', 'Amphi 1', 1, NULL),
(662, '2021-03-08', '09:00:00', 'Salle des Theses', 1, NULL),
(663, '2021-03-08', '11:00:00', 'Salle des Theses', 1, NULL),
(664, '2021-03-08', '15:00:00', 'Salle des Theses', 1, NULL),
(665, '2021-03-09', '09:00:00', 'Amphi 1', 1, NULL),
(666, '2021-03-09', '11:00:00', 'Amphi 1', 1, NULL),
(667, '2021-03-09', '15:00:00', 'Amphi 1', 1, NULL),
(668, '2021-03-09', '09:00:00', 'Salle des Theses', 1, NULL),
(669, '2021-03-09', '11:00:00', 'Salle des Theses', 1, NULL),
(670, '2021-03-09', '15:00:00', 'Salle des Theses', 1, NULL);

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
('G1111', 'test', 'etudiant', 'etudiant@gmail.com', 101010),
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
  `creneau` int(11) DEFAULT NULL,
  `etat` tinyint(4) NOT NULL,
  `motif` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `soutenance`
--

INSERT INTO `soutenance` (`soutenance_id`, `date_depot_sujet`, `directeur`, `intitule_these`, `nature_these`, `materiel_d_etude_et_echantillioannage`, `duree_d_etude`, `lieu_d_etude`, `objectif_d_etude`, `mots_cles`, `president`, `jury1`, `jury2`, `jury3`, `jury4`, `etudiant`, `creneau`, `etat`, `motif`) VALUES
(21, '2020-07-09', 2, 'sddsda', 'adadada', 'sdasdasdasd', 'adasdasdasda', 'marrakech', 'ssds', 'asdasdadasdasdas', 1, 3, 4, 5, 8, 'R32656', 325, 7, NULL),
(22, '2020-04-13', 2, 'aaa', 'ssss', 'dddd', 'fffff', 'wwww', 'qqqqq', 'eeeee', 1, 7, 4, 5, 3, 'G145625311', 367, 9, NULL);

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
-- Index pour la table `commite`
--
ALTER TABLE `commite`
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
-- AUTO_INCREMENT pour la table `commite`
--
ALTER TABLE `commite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `creneau`
--
ALTER TABLE `creneau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=671;

--
-- AUTO_INCREMENT pour la table `prof`
--
ALTER TABLE `prof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `soutenance`
--
ALTER TABLE `soutenance`
  MODIFY `soutenance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
