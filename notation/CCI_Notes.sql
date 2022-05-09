-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 13 avr. 2022 à 09:35
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `CCI_Notes`
--

-- --------------------------------------------------------

--
-- Structure de la table `sdn_classe`
--

CREATE TABLE `sdn_classe` (
  `id` int(11) NOT NULL,
  `nom` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sdn_classe`
--

INSERT INTO `sdn_classe` (`id`, `nom`) VALUES
(1, 'B1'),
(2, 'B2'),
(3, 'B3'),
(4, 'M1'),
(5, 'M2'),
(6, 'TS'),
(7, 'TL'),
(8, 'TES');

-- --------------------------------------------------------

--
-- Structure de la table `sdn_etudiants`
--

CREATE TABLE `sdn_etudiants` (
  `id` int(11) NOT NULL,
  `nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `idClasse` int(11) NOT NULL,
  `mdp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sdn_etudiants`
--

INSERT INTO `sdn_etudiants` (`id`, `nom`, `prenom`, `idClasse`, `mdp`, `mail`) VALUES
(2, 'Rivoire', 'Diitri', 3, '$2y$10$Sq5Jtz1R56A7c6v4LnRAx.Hq.36RnhxrW1tpR2UEAE6KRnpl7avbi', 'dimitri@rivoire.com'),
(3, 'Lalisse', 'Julie', 3, '$2y$10$.zmSRbzRs5blFcZqXmH6v.PxUrz6my3BpNNjzAAvty06wIWBE4KHW', 'julie@test.com'),
(4, 'Pécresse', 'Valérie', 8, '$2y$10$5DG1AqfDPSofCAPFUZyA/uk5AJH6vHezYHMoDkdUDD2n/WzrvbbdK', 'aumone@jaiplusdethune.fr'),
(5, 'Lassalle', 'Jeannot', 8, '$2y$10$hodgSSG8GhMHXPLm4d8YuOeRofyk4GUTCH61/CZHLq6odtbByQOEC', 'jeannot@lapin.com');

-- --------------------------------------------------------

--
-- Structure de la table `sdn_matieres`
--

CREATE TABLE `sdn_matieres` (
  `id` int(11) NOT NULL,
  `nom` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sdn_matieres`
--

INSERT INTO `sdn_matieres` (`id`, `nom`) VALUES
(1, 'Français'),
(2, 'Chimie'),
(3, 'Physique'),
(4, 'Mathématiques'),
(5, 'Anglais'),
(6, 'EPS'),
(7, 'SVT'),
(8, 'Espagnol'),
(9, 'Allemand'),
(10, 'Histoire Géographie'),
(11, 'Techno'),
(12, 'Musique'),
(13, 'Arts Plastiques'),
(14, 'Philosophie'),
(15, 'Economie'),
(16, 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `sdn_notes`
--

CREATE TABLE `sdn_notes` (
  `id` int(11) NOT NULL,
  `idEtudiant` int(11) NOT NULL,
  `idMatiere` int(11) NOT NULL,
  `note` decimal(4,2) NOT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sdn_notes`
--

INSERT INTO `sdn_notes` (`id`, `idEtudiant`, `idMatiere`, `note`, `commentaire`) VALUES
(1, 2, 2, '2.00', NULL),
(2, 3, 2, '19.00', NULL),
(3, 4, 6, '4.00', NULL),
(4, 4, 6, '4.00', NULL),
(5, 5, 6, '12.25', NULL),
(6, 2, 7, '6.50', NULL),
(7, 3, 7, '19.00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sdn_profs`
--

CREATE TABLE `sdn_profs` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idClasse` int(11) NOT NULL,
  `idMatiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sdn_profs`
--

INSERT INTO `sdn_profs` (`id`, `idUser`, `idClasse`, `idMatiere`) VALUES
(1, 3, 3, 2),
(2, 3, 8, 6),
(3, 3, 8, 16),
(4, 3, 2, 12),
(5, 3, 3, 7);

-- --------------------------------------------------------

--
-- Structure de la table `sdn_users`
--

CREATE TABLE `sdn_users` (
  `id` int(11) NOT NULL,
  `nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` int(11) NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sdn_users`
--

INSERT INTO `sdn_users` (`id`, `nom`, `prenom`, `mdp`, `niveau`, `mail`) VALUES
(1, 'Lateta', 'Toto', '$2y$10$xnyGDfXPKo9J4SOxaA9WFOEwHH0kvpq0qlKIQWKjFxZpX3LW8jy8C', 0, 'olivier@colnem.net'),
(3, 'Rivoire', 'Dimitri', '$2y$10$TwCP4CYhEbz45AOlQBFUr.1CtFRhCts6GbMntRCtcNOmp355EyHs.', 1, 'test@test.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sdn_classe`
--
ALTER TABLE `sdn_classe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sdn_etudiants`
--
ALTER TABLE `sdn_etudiants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sdn_matieres`
--
ALTER TABLE `sdn_matieres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sdn_notes`
--
ALTER TABLE `sdn_notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sdn_profs`
--
ALTER TABLE `sdn_profs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sdn_users`
--
ALTER TABLE `sdn_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sdn_classe`
--
ALTER TABLE `sdn_classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `sdn_etudiants`
--
ALTER TABLE `sdn_etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `sdn_matieres`
--
ALTER TABLE `sdn_matieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `sdn_notes`
--
ALTER TABLE `sdn_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `sdn_profs`
--
ALTER TABLE `sdn_profs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `sdn_users`
--
ALTER TABLE `sdn_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
