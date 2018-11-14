-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 14 nov. 2018 à 16:36
-- Version du serveur :  5.7.21
-- Version de PHP :  7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'contact@3wa.com', '$2y$13$8J.oauxqjIxaQ5t.VlYTTu/W3NWlSc6xIN/jesReiht4HbrGoLe3m'),
(2, 'vanessa.fayard@gmail.com', '$2y$13$n9Dv4FI9fMJY.YqAWzYMfeiCkIMs7OAMLImRCSU6JutZ6arqmhK7y');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'POO'),
(2, 'Application Web'),
(3, 'Web Design'),
(4, 'Back-end'),
(5, 'Front-end');

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id`, `name`, `activity`, `city`, `address`, `description`) VALUES
(1, 'DEKRA', 'Diagnostic Immobilier', 'Annecy', 74, NULL),
(2, 'Société Lorraine Habitat', 'Bailleur social', 'Nancy', 54, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180731125156'),
('20180731131749'),
('20180803152115'),
('20180803153137'),
('20180803154727'),
('20180803155523'),
('20180803160233'),
('20180921093655'),
('20180928083251'),
('20180928085324'),
('20180928091138'),
('20180929091837'),
('20180929120917'),
('20180929135610'),
('20181009150033'),
('20181019132535');

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `skill_id` int(11) DEFAULT NULL,
  `url2` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2FB3D0EE12469DE2` (`category_id`),
  KEY `IDX_2FB3D0EE5585C142` (`skill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `project`
--

INSERT INTO `project` (`id`, `name`, `caption`, `description`, `url`, `image`, `created_at`, `category_id`, `skill_id`, `url2`) VALUES
(1, 'Slider d\'images', 'slider_image_preview.png', 'Création d\'un slider d\'image avec boutons de navigation et SetInterval.\r\n\r\nLangage(s) utilisé(s) : Javascript, JQuery', 'slider-image', 'slider_image.png', '2018-06-01', 5, 6, NULL),
(2, 'Site e-commerce', 'eboutique_the_preview.png', 'Projet d\'intégration au sein de la 3W Academy :\r\n- Création d\'un site e-commerce (boutique de thé) de 4 pages\r\n\r\nLangage(s) utilisé(s) : HTML, CSS, Javascript', NULL, 'eboutique_the.png', '2018-06-01', 3, 2, NULL),
(3, 'Ardoise magique', 'ardoise_magique_preview.png', 'Création d\'une application web type ardoise magique, afin d\'appréhender la programmation orienté objet (POO).\r\n\r\nLangage(s) utilisé(s) : Javascript', 'ardoise-magique', 'ardoise_magique.png', '2018-06-01', 1, 3, NULL),
(5, 'Painter', 'slider_image_preview.png', 'Exercice pour appréhender la POO en PHP :\r\n- construction de classes PHP pour différentes formes à afficher en svg\r\n\r\nLangage(s) utilisé(s) : HTML, CSS, PHP', 'painter', 'eboutique_the.png', '2018-07-01', 1, 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `resume`
--

DROP TABLE IF EXISTS `resume`;
CREATE TABLE IF NOT EXISTS `resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(130) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_section` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_60C1D0A0166D1F9C` (`project_id`),
  KEY `IDX_60C1D0A0979B1AD6` (`company_id`),
  KEY `IDX_60C1D0A0C32A47EE` (`school_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `resume`
--

INSERT INTO `resume` (`id`, `name`, `period`, `description`, `value_section`, `project_id`, `company_id`, `school_id`) VALUES
(1, 'Obtention DUT Génie Civil', '2009-2010', ' ', 2, NULL, NULL, 1),
(2, 'Obtention licence professionnelle - Maintenance et réhabilitation bâtiment', '2011', ' ', 2, NULL, NULL, 2),
(3, 'Formation développement web', '2018', 'Titre RNCP niveau 3 (équivalence bac+2)\r\n5 technologies : HTML, CSS, Javascript, PHP, MySQL\r\nRéalisation de projets en front-end et back-end', 2, 2, NULL, 3),
(4, 'Technicienne diagnostiqueuse amiante et plomb', '2011-2015', ' ', 1, NULL, 1, NULL),
(5, 'Chargée sécurité bâtiment', '2015-2017', 'Mise en place de procédures réglementaires amiante-plomb-accessibilité\r\nVeille réglementaire\r\nCréations et réponses appels d\'offres', 1, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `school`
--

DROP TABLE IF EXISTS `school`;
CREATE TABLE IF NOT EXISTS `school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school`
--

INSERT INTO `school` (`id`, `name`, `city`, `address`) VALUES
(1, 'IUT1 Université Grenoble Alpes', 'Grenoble', 38),
(2, 'Université de Lorraine', 'Nancy', 54),
(3, '3WAcademy Grenoble', 'Grenoble', 38);

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

DROP TABLE IF EXISTS `skill`;
CREATE TABLE IF NOT EXISTS `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `skill`
--

INSERT INTO `skill` (`id`, `name`, `description`, `image`) VALUES
(1, 'HTML 5', 'HyperText Markup Language\r\n\r\nLangage de balisage utilisé pour la création de pages web', 'html5.png'),
(2, 'CSS3', 'Cascading Style Sheets\r\n\r\nLangage utilisé pour mettre en forme les fichiers HTML ou XML.', 'css3.png'),
(3, 'Javascript - ECMAScript 6', 'ECMAScript\r\n\r\nLangage de programmation de scripts principalement employé dans les pages web interactives, et sur les serveurs.', 'javascript.png'),
(4, 'PHP 7', 'Hypertext Preprocessor\r\n\r\nLangage de programmation libre4, principalement utilisé pour produire des pages Web dynamiques via un serveur HTTP.', 'php.png'),
(5, 'MySQL', 'Structured Query Language\r\n\r\nSystème de gestion de bases de données relationnelles (SGBDR).', 'my_sql.png'),
(6, 'JQuery', 'Javascript framework\r\n\r\nBibliothèque JavaScript libre et multiplateforme créée pour faciliter l\'écriture de scripts côté client dans le code HTML des pages web.', 'jquery.png'),
(7, 'Bootstrap', 'Front-end framework\r\n\r\nCollection d\'outils utiles à la création du design de sites et d\'applications web.', 'bootstrap.png'),
(8, 'Responsive design', 'Responsive Web design\r\n\r\nSite web adaptatif, consultable sur différents supports (mobile, tablette, ordinateur).', 'responsive_web_design.png'),
(9, 'SEO - Accessibilité', 'Search Engine Marketing\r\n\r\nBonnes pratiques pour faciliter le référencement du site web, et sa lisibilité pour tous publics.', 'seo.jpg'),
(10, 'Symfony 4', 'PHP framework\r\n\r\nEnsemble de composants PHP ainsi qu\'un framework MVC libre écrit en PHP.', 'symfony.png');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_2FB3D0EE12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_2FB3D0EE5585C142` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`);

--
-- Contraintes pour la table `resume`
--
ALTER TABLE `resume`
  ADD CONSTRAINT `FK_60C1D0A0166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `FK_60C1D0A0979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `FK_60C1D0A0C32A47EE` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
