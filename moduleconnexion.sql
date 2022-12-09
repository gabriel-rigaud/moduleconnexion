-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 09 déc. 2022 à 12:26
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moduleconnexion`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$KcUGBtCkqUGt7iGgZZgOheLjTrcCV34sd16uCeU1pyyMdd/PoEBXG'),
(2, 'cc', 'cc', 'cc', '$2y$10$f2.flWfEZOXfF5eNMbXsYORI9lgwVumRg5DwJWCAnE7rgpts/pggK'),
(6, 'vsi', 'toi', 'oijazos', '$2y$10$RTIucpwEdTTSvWRn.CJhF.deSM.oxfAyQ6Cnogz/5msJHd8iJzYGm'),
(3, 'prk', 'prk', 'prk', '$2y$10$sRM7U.UbpXoyH2qxTtLSfeJARS0oOyDYI0grHM3nFnc.PQLZiEDdC'),
(4, 'a', 'a', 'a', '$2y$10$DrXasiPtOh8kQsQNAau7Z.fo.1cYqME55Wwz0Do.9ezSeC7mpGphm'),
(5, 'p', 'p', 'p', '$2y$10$JFZN0vGv/iMj4faFTjo/cO/uoCcd3hPRyoSbb6Ohkhtd4Aj7nWFb6'),
(37, 'n', 'n', 'n', '$2y$10$tJj9mRUOqG6WJsAfEY.GzeH.ZJqKdPLzFRiqIhNaReyeh15UIZ4iO'),
(38, 'f', 'f', 'f', '$2y$10$fNhVzRIvw/ywmNp9R8QtJehnqtRcfKb7aam7oe8bNYaqBy65pyYcq');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
