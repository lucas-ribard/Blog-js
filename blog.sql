-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 27 mars 2023 à 09:54
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
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `title`, `content`) VALUES
(5, 'Design', ''),
(4, 'Actualités', 'news'),
(6, 'LifeStyle', '');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `id_Article` int(255) NOT NULL,
  `id_User` varchar(255) NOT NULL,
  `Commentaire` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_Article`, `id_User`, `Commentaire`, `date`) VALUES
(54, 60, 'Firened', 'Je pourrais pas Venir demain, j\'en ai marre<br><br>xoxo', '2023-03-22 15:14:59'),
(55, 65, 'erwan', 'J\'ai bien aimé la part ou il dropkick le manifestant', '2023-03-24 10:23:21');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `createdat` datetime NOT NULL,
  `content` text NOT NULL,
  `categoryid` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `userid`, `title`, `createdat`, `content`, `categoryid`) VALUES
(65, 'firened', 'Réforme des retraites : enquête ouverte après la diffusion d\'une vidéo d\'un policier frappant un manifestant', '2023-03-22 10:45:04', 'Partagée massivement et vue des millions de fois, une vidéo, semblant montrer un policier donnant un violent coup à un manifestant à Paris a déclenché l\'ouverture d\'une enquête, confiée à l\'IGPN, l\'inspection générale de la police nationale.<br><br>\r\n\r\nLa scène est courte et violente. Sur cette vidéo, diffusée sur Twitter par Thimothée Forget, un étudiant en journalisme, on voit un manifestant tomber à terre et rester au sol après avoir reçu un coup de la part d\'un policier à Paris, lundi 20 mars, dans un contexte de manifestations contre la réforme des retraites.<br><br> \r\n\r\nEnquête ouverte\r\nLa vidéo a énormément circulé, à tel point que ce mardi 21 mars, le préfet de police Laurent Nuñez a indiqué sur BFM que \"toutes les investigations seront menées pour savoir si ce coup était adapté ou pas\". Dans la soirée, nos confrères de la chaîne d\'information en continu rapportent qu\'une enquête a bien été ouverte et a été confiée à l\'IGPN, la police des polices, pour déterminer si ces faits sont \"susceptibles d’être qualifiés de violences commises par personne dépositaire de l’autorité publique\", bien qu\'aucune plainte n\'ait été déposée.\r\n\r\n', 'actualités'),
(66, 'firened', 'Visite de Charles III en France : l\'inquiétude grandit au Royaume-Uni face au climat social tendu dans l\'Hexagone', '2023-03-24 10:24:38', 'Dans un contexte social tendu marqué par l\'opposition à la réforme des retraites, certains s\'interrogent sur la pertinence de la première visite d\'État du roi Charles III en France à partir du lundi 27 mars. Un dîner prévu au château de Versailles pourrait finalement avoir lieu à l\'Élysée. Outre-Manche, l\'inquiétude est de mise.<br>\r\nQue pense Charles III de la situation en France, à trois jours de sa première visite d\'État ? Si la monarchie, fidèle à son habitude, ne laisse rien filtrer, les médias britanniques ne cachent pas leur préoccupation. \"Cette visite n\'est pas bien vue alors que les rues de Paris s\'enflamment depuis la semaine dernière\", a commenté une correspondante de la chaîne Sky News, dans la capitale française. Le climat social en France contraste avec les ors de la galerie des Glaces à Versailles, qui devrait accueillir le roi et 200 convives pour un dîner d\'État lundi. \r\n<br><br>\r\nUn programme qui pourrait changer au dernier moment\r\nLe ministre des Affaires étrangères britannique, qui sera du voyage, dit ne pas s\'inquiéter pour la sécurité et s\'en remet à la France. \"J\'ai une confiance totale dans la capacité des autorités françaises à s\'assurer que le roi sera en sécurité et qu\'il aura un aperçu positif de la France\", a confié James Cleverly. \"Je pense que ce serait désastreux pour l\'image du président Macron si un incident se produisait\", estime de son côté un expert royal. Les détails de cette visite à laquelle Paris et Londres travaillent depuis plusieurs semaines pourraient bien changer jusqu\'à la dernière minute. L\'entourage d\'Emmanuel Macron fait savoir que le programme est toujours en cours d\'élaboration de part et d\'autre de la Manche.', 'Actualités'),
(63, 'admin', 'Après le 49.3, Emmanuel Macron tente de ressouder ses ministres et sa majorité lors d’une réunion à l’Elysée', '2023-03-22 10:39:40', 'Vous pouvez partager un article en cliquant sur les icônes de partage en haut à droite de celui-ci. \r\nLa reproduction totale ou partielle d’un article, sans l’autorisation écrite et préalable du Monde, est strictement interdite. <br>\r\nPour plus d’informations, consultez nos conditions générales de vente. \r\nPour toute demande d’autorisation, contactez syndication@lemonde.fr. \r\nEn tant qu’abonné, vous pouvez offrir jusqu’à cinq articles par mois à l’un de vos proches grâce à la fonctionnalité « Offrir un article ». \r\n<br><br\r\n\r\nLa scène avait un air de déjà-vu. Ce mardi 21 mars, sous les ors de la salle des fêtes du palais de l’Elysée, Emmanuel Macron avait convié, autour d’un apéritif composé de vins et de petits croque-monsieur, les élus de sa majorité, abasourdis, frustrés et parfois en colère. L’adoption sans vote de la réforme des retraites par l’article 49.3 de la Constitution, après des semaines de débats tempétueux, a embrasé le pays et propulsé les élus macronistes au cœur d’une colère sociale. Le chef de l’Etat ne regrette rien.\r\n<br><br>\r\nLire aussi : Article réservé à nos abonnés A l’Assemblée nationale, le gouvernement échappe de justesse à la censure mais se trouve plus isolé que jamais\r\n« Utiliser la Constitution pour faire passer une réforme est toujours une bonne chose si on veut être respectueux de nos institutions », a clamé le président de la République dans une ambiance décrite comme conviviale mais grave. « Si on était allés au vote et qu’on avait perdu, vous ne seriez pas heureux ce soir », a-t-il souligné, assurant avoir voulu « éviter les hurlements de joie de la Nupes [Nouvelle Union populaire écologique et sociale] et du RN [Rassemblement national] ».\r\n\r\n', 'actualités'),
(60, 'firened', 'Encore des Greves à la SNCF', '2023-03-17 18:46:01', 'Les quatre syndicats représentatifs de la SNCF ont appelé « à agir massivement le 23 mars » pour s’opposer à la réforme des retraites, lors de la prochaine journée de mobilisation nationale, tandis que le secrétaire général de la CFDT réclame que soit retirée la réforme des retraites si Emmanuel Macron veut « éteindre le feu » de la colère sociale, attisé par le recours au 49.3 pour faire passer le projet de loi.', 'Actualités'),
(61, 'firened', 'Guerre en Ukraine, en direct : Vladimir Poutine s’est rendu à Marioupol, première visite en zone occupée depuis le début de l’invasion Le président russe a rejoint en hélicoptère la ville du suuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu', '2023-03-19 12:14:57', 'Les autorités ukrainiennes de Marioupol fustigent la visite du « criminel international » Poutine\r\nLes autorités ukrainiennes de Marioupol ont dénoncé dimanche la visite du président Vladimir Poutine de la cité portuaire sous contrôle russe depuis mai 2022.\r\n<br><br>\r\n« Le criminel international Poutine a visité la ville de Marioupol occupée » de nuit « probablement pour ne pas voir à la lumière du jour la ville tuée par sa “libération” », a écrit le conseil municipal sur son compte Telegram. Une référence au mandat d’arrêt international visant le président russe.\r\nMarioupol, un trait d’union stratégique et une victoire symbolique\r\nIls pensaient que quelques jours suffiraient à la faire tomber. Les Russes auront finalement dû batailler près de trois mois pour prendre le contrôle de la ville portuaire ukrainienne de Marioupol, carrefour stratégique situé au bord de la mer d’Azov.\r\n<br><br>\r\nLa reddition des combattants ukrainiens repliés au sein de l’immense complexe sidérurgique Azovstal a finalement permis à Moscou de revendiquer, le 20 mai 2022, le contrôle de la totalité de cette cité détruite à 90 %. Objectif prioritaire de Vladimir Poutine, la chute de Marioupol a constitué une victoire symbolique pour le président russe, après les nombreux revers observés depuis le début de l’invasion russe, le 24 février.', 'Actualités');

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
(4, 'admin', 'admin', 'admin', 'khouloud@gmail.com', '$2y$10$.UYzdY7bt5rrF8QFAxPvsO1B6RN1LFLd/z2iGX3LZ2fT3kZ2V/7Ay', 'admin'),
(7, 'lulu', 'ribrib', 'Firened', 'flemme@fl.em', '$2y$10$0ThDEiKFux.SAHnOi2mDKOPI90jIfmfMxpf1FssCp2NzNIQPgylui', 'moderator');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
