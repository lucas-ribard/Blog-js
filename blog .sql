-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 16 mars 2023 à 12:21
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `content`) VALUES
(1, 'test', '?', 'test'),
(2, 'test2', '?', 'test2'),
(3, 'test3', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `postid` varchar(255) NOT NULL,
  `publishedat` datetime NOT NULL,
  `createdat` datetime NOT NULL,
  `content` text NOT NULL,
  `updateat` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `createdat` datetime NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `publishedat` datetime NOT NULL,
  `updatedat` datetime NOT NULL,
  `content` text NOT NULL,
  `categoryid` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `userid`, `title`, `slug`, `createdat`, `published`, `publishedat`, `updatedat`, `content`, `categoryid`) VALUES
(33, 'admin', 'kcjn', '?', '2023-03-13 11:42:03', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'jdjzbj', 'test2'),
(32, 'admin', 'test', '?', '2023-03-13 10:45:34', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'this is a test', 'Select a category'),
(31, 'admin', 'test', '?', '2023-03-13 10:45:27', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'this is a test', 'Select a category'),
(30, 'admin', 'test', '?', '2023-03-13 10:43:59', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'this is a test', 'Select a category'),
(29, 'admin', 'test', '?', '2023-03-13 10:43:48', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'this is a test', '');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `roles`) VALUES
(1, 'admin'),
(2, 'moderator'),
(3, 'subscriber');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `login`, `email`, `password`, `role`) VALUES
(1, 'erwan', 'erwan', 'erwan', 'erwan@gmail.com', '$2y$10$g77thnxsC4KxLEei.GjJqutG9DjHAkyeh6C//qYVxcCB.8D90bHG2', 'subscriber'),
(2, 'skxqskjc', 'skcnkjc', 'jcsjkbj', 'dsdsd@gmail.com', '$2y$10$6H3VhKIDAjQUdCfdkGOnE.fbEUl8KNQTdq8mUQNLFZqtnxB32FOvS', 'subscriber'),
(4, 'admin', 'admin', 'admin', 'khouloud@gmail.com', '$2y$10$.UYzdY7bt5rrF8QFAxPvsO1B6RN1LFLd/z2iGX3LZ2fT3kZ2V/7Ay', 'admin'),
(5, 'aaa', 'aaa', 'aaa', 'aaaaaaaaaa@gmail.com', '$2y$10$BneB83AGDafEgyuQfKYBY.VshpOkaAhvhoyPvrsZ63HJyZ1zzoDCC', 'subscriber'),
(6, 'aaaaaaa', 'aaaaaa', 'aaaaaaaaa', 'aaaaaaaaaa@gmail.com', '$2y$10$FxAiiKxsQz2p1Eo/6zDiQ.sOm2WnSx/SFVyrzVxDKvvFpi1FTqPhu', 'subscriber');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
