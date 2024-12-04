-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 04 Décembre 2024 à 11:47
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `competences_equipe`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`id`, `nom`) VALUES
(1, 'Python'),
(4, 'Django'),
(5, 'React'),
(6, 'TypeScript'),
(7, 'JavaScript'),
(8, 'Node.js'),
(9, 'PHP'),
(10, 'MySQL'),
(11, 'PostgreSQL'),
(12, 'OSINT'),
(13, 'HTML5'),
(14, 'CSS3');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `formation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `test` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `email`, `date`, `formation`, `photo`, `test`) VALUES
(1, 'ALIZEE BOCHATON', 'abochaton@guardiaschool.fr', '2001-09-11', 'Massachusetts Institute of Technology (MIT)', '../images/equipe/alizee.jpg', 'Alizee Bochaton est une developpeuse web passionnee et rigoureuse, diplomee du celebre Massachusetts Institute of Technology (MIT). Forte de sa formation dans l\'une des institutions les plus prestigieuses au monde, Alizee excelle dans la creation de solutions web modernes et intuitives, adaptees aux besoins des utilisateurs.\r\n\r\nAvec une expertise dans des technologies avancees telles que React, TypeScript, HTML5, et CSS3, elle est capable de concevoir des interfaces utilisateur elegantes et fonctionnelles tout en garantissant une experience fluide et dynamique. Sa maitrise de TypeScript lui permet de developper des applications web robustes et maintenables, tandis que son habilete en CSS3 et HTML5 assure des designs innovants qui respectent les standards les plus eleves du web.\r\n\r\nAlizee est reconnue pour son approche meticuleuse et sa capacite a resoudre des problemes complexes tout en respectant des delais serres. Curieuse et toujours a la pointe des innovations technologiques, elle s\'investit activement dans des projets qui allient creativite et performance.\r\n\r\nGrace a son sens du detail et a son esprit d\'equipe, Alizee contribue de maniere significative au succes des projets quelle entreprend, faisant de elle une collaboratrice cle dans n\'importe quelle equipe de developpement.'),
(2, 'NINON BLONDEAU-SCHWAB', 'nblondeauschwab@guardiaschool.fr', '1789-07-14', 'University of Cambridge', '../images/equipe/ninon.jpg', 'Ninon Blondeau-Schwab est une developpeuse talentueuse, diplomee de la prestigieuse University of Cambridge, ou elle a perfectionne ses competences en developpement web et en gestion de donnees. Sa formation academique, combinee a sa passion pour la technologie, fait de elle une experte capable de mener a bien des projets ambitieux et complexes.\r\n\r\nMaitrisant des technologies cles comme JavaScript, PostgreSQL et CSS3, Ninon se distingue par sa capacite a concevoir des interfaces utilisateur intuitives tout en assurant un backend robuste et optimise. Son expertise en OSINT (Open Source Intelligence) lui permet d\'analyser et de tirer parti des donnees ouvrees pour des solutions strategiques.\r\n\r\nNinon est reconnue pour son esprit creatif et sa rigueur technique. Grace a sa maitrise de CSS3, elle est capable de transformer des idees en designs modernes et elegants, tandis que son expertise en PostgreSQL garantit des bases de donnees performantes et securisees.\r\n\r\nToujours en quete d\'amelioration, Ninon s\'investit activement dans l\'apprentissage continu et la veille technologique. Elle est egalement appreciee pour son esprit collaboratif et sa capacite a transformer les defis en opportunites.'),
(3, 'ADRIEN GAMEZ', 'agamez@guardiaschool.fr', '2031-06-11', 'Harvard University', '../images/equipe/adrien.jpg', 'Adrien Gamez est un developpeur polyvalent et ingenieux, diplome de la prestigieuse Harvard University, ou il a acquis une expertise technique solide et une approche rigoureuse du developpement logiciel.\r\n\r\nSpecialiste de langages tels que PHP et Python, Adrien est egalement experience en OSINT (Open Source Intelligence), ce qui lui confere une perspective unique dans la gestion et l\'analyse de donnees accessibles publiquement. Ses competences le rendent particulierement apte a travailler sur des projets necessitant une approche analytique et une expertise technique pointue.\r\n\r\nAdrien est reconnu pour sa capacite a concevoir des solutions robustes et efficaces tout en s\'adaptant a des contextes varies. Sa maitrise de PHP lui permet de developper des applications web evolutives, tandis que sa connaissance approfondie de Python lui donne un avantage dans les domaines du traitement de donnees et de l\'automatisation.\r\n\r\nToujours curieux et motive, Adrien est passionne par les nouvelles technologies et s\'efforce de rester a la pointe des innovations. Il aime partager son savoir et collaborer avec son equipe pour mener a bien des projets ambitieux et novateurs.'),
(4, 'ELIAS ABOU-HARB', 'eabouharb@guardiaschool.fr', '0001-01-01', 'University of Oxford', '../images/equipe/elias.png', 'Elias Abou-Harb est un developpeur accompli, diplome de la renomme University of Oxford, ou il a perfectionne ses competences en developpement logiciel et en gestion de bases de donnees. Sa formation rigoureuse lui a permis d\'acquerir une solide expertise dans le developpement d\'applications backend et la manipulation de grandes quantites de donnees.\r\n\r\nElias maitrise des outils et langages tels que Python, Django, et MySQL, faisant de lui un specialiste dans la creation de solutions backend puissantes, securisees et performantes. Il excelle dans la conception d\'architectures logicielles efficaces et dans l\'optimisation des bases de donnees relationnelles pour des performances optimales.\r\n\r\nDote d\'un esprit methodique et d\'une grande curiosite intellectuelle, Elias est reconnu pour sa capacite a relever des defis complexes et a livrer des solutions fiables. Il est particulierement passionne par l\'automatisation des processus et le developpement d\'outils qui simplifient le travail des autres.\r\n\r\nElias reste constamment a l\'ecoute des evolutions technologiques pour perfectionner son art et s\'assurer que ses competences restent a la pointe de l\'innovation.'),
(5, 'ANTHONY BROQUARD', 'abroquard@guardiaschool.fr', '1848-04-27', 'Leland Stanford Junior University', '../images/equipe/anthony.png', 'Anthony Broquard est un developpeur passionne et talentueux, diplome de la prestigieuse Leland Stanford Junior University. Grace a sa formation, il a acquis une expertise approfondie dans les technologies modernes et les principes fondamentaux du developpement logiciel.\r\n\r\nAnthony maitrise des frameworks et langages tels que React, Node.js, PHP, et CSS3. Sa polyvalence lui permet de travailler sur des projets varies, qu\'il s\'agisse de concevoir des interfaces utilisateur dynamiques, de developper des applications cote serveur, ou encore de styliser des pages web pour une experience utilisateur optimale.\r\n\r\nReconnu pour son esprit analytique et sa rigueur, Anthony est capable de resoudre des problemes complexes tout en respectant les normes de developpement les plus exigeantes. Il s\'efforce toujours d\'innover et d\'apporter des solutions robustes, performantes et evolutives.\r\n\r\nEn dehors du developpement, il aime se tenir a jour sur les tendances technologiques et partager ses connaissances avec son entourage professionnel.');

-- --------------------------------------------------------

--
-- Structure de la table `membre_competences`
--

CREATE TABLE `membre_competences` (
  `id` int(11) NOT NULL,
  `membre_id` int(11) NOT NULL,
  `competence_id` int(11) NOT NULL,
  `niveau` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre_competences`
--

INSERT INTO `membre_competences` (`id`, `membre_id`, `competence_id`, `niveau`) VALUES
(2, 1, 5, 5),
(3, 1, 6, 4),
(4, 2, 7, 4),
(5, 2, 11, 5),
(6, 3, 9, 4),
(7, 3, 1, 5),
(8, 4, 1, 5),
(9, 4, 4, 4),
(10, 4, 10, 4),
(11, 5, 5, 4),
(12, 5, 8, 4),
(13, 5, 9, 5),
(14, 2, 12, 5),
(15, 3, 12, 4),
(16, 1, 13, 5),
(17, 1, 14, 5),
(18, 2, 14, 3),
(19, 5, 14, 4);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `membre_competences`
--
ALTER TABLE `membre_competences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `membre_competences`
--
ALTER TABLE `membre_competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
