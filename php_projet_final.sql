-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mer. 10 déc. 2025 à 20:57
-- Version du serveur : 8.0.44
-- Version de PHP : 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php_projet_final`
--

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `title` varchar(120) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`) VALUES
(1, 'test mon titre', 'test-mon-titre', 'test blabla12'),
(9, 'test mon titre', 'test-mon-titre-1', 'Test pour voir si la méthode quand il y a 2 slugs marche'),
(11, 'Mon site génial', 'mon-site-génial', 'YOYOYO TEST'),
(12, 'Articles', 'articles', 'Les supers articles !!!'),
(13, 'Le panier', 'le-panier', 'Payer €€€€€€€');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_verified` tinyint NOT NULL,
  `verification_token` varchar(255) NOT NULL,
  `role` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `is_verified`, `verification_token`, `role`) VALUES
(1, 'test@test.fr', '$2y$10$S74hGjRLSc1sianRI9A4M.YooBOr9OgJVTZeeAQQjjdXFFnYG7eDy', 0, '0', 'USER'),
(2, 'test@testttt.fr', '$2y$10$S74hGjRLSc1sianRI9A4M.YooBOr9OgJVTZeeAQQjjdXFFnYG7eDy', 0, '0', 'USER'),
(4, 'leopluche@hotmail.fr', '$2y$10$rzlm0KQGQU9L0cWpnZL.zudIii9ByiAzmNb2G21BeNaG5aly7Wc4.', 1, 'af68d4e5a0377cf7cad353f6336d5abf514e029a632c1aa774034d5fb7fccd90', 'ADMIN'),
(5, 'leoplumail72@gmail.com', '$2y$10$mjGX5Nsavok8LEEiWyNPN.kd/rwwl3RPWwfH31sKu90ctkEdiQJKG', 1, '0', 'USER');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
