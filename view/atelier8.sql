-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 02 juin 2024 à 18:06
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `atelier8`
--

-- --------------------------------------------------------

--
-- Structure de la table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `expenses`
--

INSERT INTO `expenses` (`id`, `category`, `amount`, `description`, `date`) VALUES
(15, 'Food', '150.00', 'Groceries for the week', '2024-01-05'),
(16, 'Food', '75.00', 'Dinner at a restaurant', '2024-01-10'),
(17, 'Transportation', '60.00', 'Gas for the car', '2024-01-15'),
(18, 'Transportation', '40.00', 'Monthly bus pass', '2024-01-20'),
(19, 'Entertainment', '30.00', 'Movie tickets', '2024-01-25'),
(20, 'Entertainment', '100.00', 'Concert tickets', '2024-01-30'),
(21, 'Miscellaneous', '50.00', 'New clothing', '2024-02-05'),
(22, 'Miscellaneous', '25.00', 'Birthday gift for a friend', '2024-02-10'),
(23, 'Food', '180.00', 'Groceries for the month', '2024-02-15'),
(24, 'Transportation', '120.00', 'Car maintenance', '2024-02-20'),
(25, 'Entertainment', '150.00', 'Subscription to streaming service', '2024-02-25'),
(26, 'Miscellaneous', '90.00', 'Household items', '2024-02-28'),
(28, 'Food', '23.00', 'water', '2024-06-07');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `emetteur` varchar(100) COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `message`, `emetteur`, `date`) VALUES
(13, 'test', 'me@mydomain.com', '2024-04-25 02:42:02'),
(14, 'uhe', 'me@mydomain.com', '2024-04-25 14:50:09'),
(15, 'efs', 'me@mydomain.com', '2024-04-25 15:40:15'),
(16, 'dww', 'me@mydomain.com', '2024-04-25 15:41:19'),
(17, 'dwf', 'me@mydomain.com', '2024-04-25 15:57:26'),
(18, 'ouit', 'me@mydomain.com', '2024-04-25 16:25:27'),
(19, 'hola', 'mea@mydomain.com', '2024-04-25 16:30:21'),
(20, 'como', 'mea@mydomain.com', '2024-04-25 16:31:02'),
(21, 'c', 'mea@mydomain.com', '2024-04-25 16:31:20'),
(22, 'hhh', 'mea@mydomain.com', '2024-04-25 16:57:10'),
(23, 'hi', 'me@mydomain.com', '2024-05-15 09:41:10'),
(24, 'k', 'me@mydomain.com', '2024-05-21 19:28:56'),
(25, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 15:48:08'),
(26, 'hi', 'bahaeaouanet@gmail.com', '2024-05-31 15:48:19'),
(27, 'hola', 'bahaeaouanet@gmail.com', '2024-05-31 15:48:24'),
(28, 'hola', 'bahaeaouanet@gmail.com', '2024-05-31 15:48:54'),
(29, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 15:49:20'),
(30, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 16:05:08'),
(31, 'ssss', 'bahaeaouanet@gmail.com', '2024-05-31 16:05:12'),
(32, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 16:16:33'),
(33, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 16:21:57'),
(34, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 16:22:02'),
(35, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 16:36:10'),
(36, '', 'bahaeaouanet@gmail.com', '2024-05-31 16:36:12'),
(37, '', 'bahaeaouanet@gmail.com', '2024-05-31 16:36:13'),
(38, '', 'bahaeaouanet@gmail.com', '2024-05-31 16:47:13'),
(39, '', 'bahaeaouanet@gmail.com', '2024-05-31 16:47:14'),
(40, '', 'bahaeaouanet@gmail.com', '2024-05-31 16:47:17'),
(41, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 16:47:19'),
(42, '', 'bahaeaouanet@gmail.com', '2024-05-31 16:47:48'),
(43, '', 'bahaeaouanet@gmail.com', '2024-05-31 16:49:39'),
(44, '', 'bahaeaouanet@gmail.com', '2024-05-31 16:49:42'),
(45, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 16:54:09'),
(46, 'yyyyy', 'bahaeaouanet@gmail.com', '2024-05-31 16:54:12'),
(47, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 16:57:48'),
(48, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 16:58:47'),
(49, '', 'bahaeaouanet@gmail.com', '2024-05-31 16:58:48'),
(50, '', 'bahaeaouanet@gmail.com', '2024-05-31 16:58:48'),
(51, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 17:01:02'),
(52, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 17:01:39'),
(53, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 17:02:21'),
(54, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 17:23:34'),
(55, 'hytytttttttttttttttt', 'bahaeaouanet@gmail.com', '2024-05-31 17:31:30'),
(56, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 17:36:33'),
(57, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 17:39:57'),
(58, 'hello', 'bahaeaouanet@gmail.com', '2024-05-31 17:42:18'),
(59, 'y', 'bahaeaouanet@gmail.com', '2024-05-31 17:42:28'),
(60, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 17:44:14'),
(61, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 17:44:18'),
(62, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 17:48:09'),
(63, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 17:57:49'),
(64, '', 'bahaeaouanet@gmail.com', '2024-05-31 17:57:50'),
(65, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 20:34:40'),
(66, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 20:35:47'),
(67, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 20:38:39'),
(68, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 20:38:42'),
(69, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 20:53:22'),
(70, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 21:08:48'),
(71, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 21:12:49'),
(72, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 21:13:45'),
(73, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 21:13:56'),
(74, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 21:15:39'),
(75, '', 'bahaeaouanet@gmail.com', '2024-05-31 21:50:36'),
(76, '', 'bahaeaouanet@gmail.com', '2024-05-31 21:52:25'),
(77, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 22:17:04'),
(78, 'hy', 'bahaeaouanet@gmail.com', '2024-05-31 22:24:26'),
(79, '*********', 'bahaeaouanet@gmail.com', '2024-05-31 22:24:40'),
(80, 'hy', 'rrr@mailinator.com', '2024-06-01 18:39:58'),
(81, 'hy', 'rrr@mailinator.com', '2024-06-01 19:07:39'),
(82, '', 'rrr@mailinator.com', '2024-06-01 20:05:35'),
(83, 'hy', 'rrr@mailinator.com', '2024-06-02 01:00:50'),
(84, '', 'rrr@mailinator.com', '2024-06-02 01:31:03'),
(85, '', 'rrr@mailinator.com', '2024-06-02 01:31:33'),
(86, 'hy', 'rrr@mailinator.com', '2024-06-02 02:08:23');

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE `rapport` (
  `id` int(18) NOT NULL,
  `user` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `contenu` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `link` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `rapport`
--

INSERT INTO `rapport` (`id`, `user`, `contenu`, `link`) VALUES
(1, '', 'hy', ''),
(2, '', 'hy', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(20) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(20) COLLATE utf8_bin NOT NULL,
  `nom` date NOT NULL,
  `etat` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`email`, `password`, `prenom`, `nom`, `etat`) VALUES
('bahaeaouanet@gmail.com', 'bahae', 'Id dolor dolore omni', '2015-11-26', 'inactif'),
('me@mydomain.com', 'azetr', 'fsbs', '2024-05-02', 'actif'),
('mea@mydomain.com', 'azetr', 'gogo', '0000-00-00', 'actif'),
('rrr@mailinator.com', 'b', 'Officia eius dolorem', '1988-06-07', 'actif');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emetteur` (`emetteur`);

--
-- Index pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT pour la table `rapport`
--
ALTER TABLE `rapport`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`emetteur`) REFERENCES `utilisateur` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
