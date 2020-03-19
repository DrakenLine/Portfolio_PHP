-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 19 mars 2020 à 11:03
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `portfolio_user`
--

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

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `DESCRIPTION`
--
ALTER TABLE `DESCRIPTION`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `DESCRIPTION`
--
ALTER TABLE `DESCRIPTION`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
