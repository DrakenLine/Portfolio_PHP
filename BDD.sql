-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 19 mars 2020 à 19:10
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `portfolio_user`
--
CREATE DATABASE IF NOT EXISTS `portfolio_user` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `portfolio_user`;

-- --------------------------------------------------------

--
-- Structure de la table `DESCRIPTION`
--

CREATE TABLE `DESCRIPTION` (
  `id` int(11) NOT NULL,
  `pres` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `DESCRIPTION`
--

INSERT INTO `DESCRIPTION` (`id`, `pres`) VALUES
(1, 'Ceci est la présentation de notre portfolio. Nous sommes ravis de vous accueillir dans notre humble demeure. Ici, vous y trouverez une agréable salle à manger agrémenter par de superbes mets et des musiques composées par le maitre de maison. De plus, une salle de jeux et mise à votre disposition pour pouvoir vous délecter des vos coronavacances. Nous serions ravis que vous puissiez partager votre séjour à nos côté et lâche poce bleu bg.');

-- --------------------------------------------------------

--
-- Structure de la table `USERS`
--

CREATE TABLE `USERS` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `USERS`
--

INSERT INTO `USERS` (`id`, `pseudo`, `mail`, `password`) VALUES
(6, 'admin', 'd@gmail.com', '$2y$10$9QCfGSlweYhlzlyqVgt9uuVkajuOaVpw76x85xgThktEEaYCM4PCO');

-- --------------------------------------------------------

--
-- Structure de la table `WORKS`
--

CREATE TABLE `WORKS` (
  `id` int(11) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `WORKS`
--

INSERT INTO `WORKS` (`id`, `titre`, `description`) VALUES
(1, 'Maxime c\'est le meilleur', 'Il m\'a aidée, il m\'a sauvée, je suis sauvée.'),
(6, 'Baptou', 'Baptou'),
(7, 'Baptou&Ninoune', 'Test98765678');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `DESCRIPTION`
--
ALTER TABLE `DESCRIPTION`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `WORKS`
--
ALTER TABLE `WORKS`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `DESCRIPTION`
--
ALTER TABLE `DESCRIPTION`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `WORKS`
--
ALTER TABLE `WORKS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
