-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 04 Janvier 2017 à 19:21
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `musique`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE `album` (
  `idAlbum` int(11) NOT NULL,
  `nomAlbum` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `artiste` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `parution` date NOT NULL,
  `description` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `couverture` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `album`
--

INSERT INTO `album` (`idAlbum`, `nomAlbum`, `artiste`, `parution`, `description`, `couverture`) VALUES
(1, '24K Magic', 'Bruno Mars', '2016-11-18', '24K Magic est le troisième album studio du chanteur américain Bruno Mars sorti en 2016, publié chez Atlantic Records.. Le premier single extrait de cet album est 24K Magic sorti le 7 octobre 2016.', '/Php/Vues/images/24KMagic.png');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `idAvis` int(11) NOT NULL,
  `note` enum('favorable','indifférent','défavorable') COLLATE utf8_unicode_ci NOT NULL,
  `commentaire` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idTitre` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `avis`
--

INSERT INTO `avis` (`idAvis`, `note`, `commentaire`, `user`, `idTitre`) VALUES
(1, 'favorable', 'Ce titre est intéressant.', 'sabussy', 1),
(2, 'favorable', 'gdfsdq', 'sabussy', 3),
(3, 'favorable', 'zefdv', 'michel', 3);

-- --------------------------------------------------------

--
-- Structure de la table `titre`
--

CREATE TABLE `titre` (
  `idTitre` int(11) NOT NULL,
  `nomTitre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `artiste` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nomAlbum` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `duree` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `titre`
--

INSERT INTO `titre` (`idTitre`, `nomTitre`, `artiste`, `nomAlbum`, `date_debut`, `date_fin`, `duree`) VALUES
(1, '24K Magic', 'Bruno Mars', '24K Magic', '2016-11-18', '2017-02-18', 227),
(2, 'Chunky', 'Bruno Mars', '24K Magic', '2016-11-18', '2017-02-18', 187),
(3, 'Perm', 'Bruno Mars', '24K Magic', '2016-11-18', '2017-02-18', 211);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `pseudo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`pseudo`, `mdp`, `role`) VALUES
('sabussy', 'Sabussy.63', 'admin'),
('michel', 'Michel33', 'user');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`idAlbum`),
  ADD UNIQUE KEY `nomAlbum` (`nomAlbum`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`idAvis`),
  ADD KEY `fk_Titre_id` (`idTitre`),
  ADD KEY `fk_User_pseudo` (`user`);

--
-- Index pour la table `titre`
--
ALTER TABLE `titre`
  ADD PRIMARY KEY (`idTitre`),
  ADD KEY `fk_Album_Nom` (`nomAlbum`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`pseudo`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `album`
--
ALTER TABLE `album`
  MODIFY `idAlbum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `idAvis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `titre`
--
ALTER TABLE `titre`
  MODIFY `idTitre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
