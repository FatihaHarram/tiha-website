-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 02 Septembre 2015 à 20:26
-- Version du serveur :  5.5.34
-- Version de PHP :  5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `websitehf`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(1000) COLLATE utf8_bin NOT NULL,
  `adress` varchar(1000) COLLATE utf8_bin NOT NULL,
  `phone` varchar(500) COLLATE utf8_bin NOT NULL,
  `email` varchar(500) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(2000) COLLATE utf8_bin NOT NULL,
  `dateinscription` date NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `client` tinyint(4) NOT NULL,
  `token` varchar(32) COLLATE utf8_bin NOT NULL COMMENT ' clé de vérification pour l''activation du compte',
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=73 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `name`, `firstname`, `adress`, `phone`, `email`, `mdp`, `dateinscription`, `admin`, `client`, `token`, `active`) VALUES
(1, 'leaticia', 'casta', 'rue des frippiers, 25 - 1000 Bruxelles', '0478/25.32.10', 'l.casta@hotmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2015-07-07', 0, 1, '', NULL),
(2, 'chantal', 'goya', 'rue des canons, 10- 3000 Namur', '0477/44.77.44', 'chantal.goya@mail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2015-07-07', 0, 1, '', NULL),
(3, 'Dupont', 'RenÃ©', 'rue des loups 5 1050 ixelles', '0485/26.32.58', 'dr@mail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2015-07-07', 0, 1, '', NULL),
(5, 'Nimo', 'Gero', 'rue de thÃ©atre 5 - 5000 NAmur', '0477/77.77.22', '', 'd41d8cd98f00b204e9800998ecf8427e', '2015-07-09', 0, 1, '', NULL),
(16, 'jackson', 'janet', 'bd lady lady 10, 54892 los angeles', '454666516516', '', 'd41d8cd98f00b204e9800998ecf8427e', '2015-07-09', 0, 1, '', NULL),
(25, 'Boncire', 'geraldine', 'rue des bleu 10 - 1200 bruxelles', '0489/25.36.21', '', '4a4efe2ba5e80ed550a9cf8f92260918', '2015-07-09', 0, 1, '', NULL),
(41, 'lilianne', 'lilou', 'fkhqmkfhsqmfhq', '0125356', '', 'a8beae6f257a518f8aa3cbe02843da63', '2015-07-14', 0, 1, '', NULL),
(55, 'Fourbe', 'Caroline', 'rue des alliÃ©es 337 - 1190 forest', '0484/65 63 02', 'f.harram@gmail.com', 'wW3QoKDR', '2015-08-14', 0, 1, '', 1),
(71, 'Garcia', 'JosÃ©', 'Mechelsesteenweg, 10 - 1800 Vilvoorde', '02/890.32.25', 'garcia@mail.com', 'bd9c0dd8620f6a49ebd7f2176552d141', '2015-08-24', 0, 1, '', 1),
(72, 'El Bouri', 'Ines', 'Strombeeksesteenweg, 13/5 - 1800 Vilvoorde', '0477894205', 'ines@mail.com', 'e559744627cceb9d06579d548b57bc01', '2015-09-01', 0, 1, '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_pseudo` varchar(200) COLLATE utf8_bin NOT NULL,
  `user_mail` varchar(200) COLLATE utf8_bin NOT NULL,
  `comment` varchar(4000) COLLATE utf8_bin NOT NULL,
  `datecomments` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=80 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `user_pseudo`, `user_mail`, `comment`, `datecomments`) VALUES
(1, 36, 'fatiha', 'fatiha@mail.com', 'test pour les commentaires test pour les commentaires test pour les commentaires test pour les commentaires test pour les commentaires test pour les commentaires test pour les commentaires test pour les commentaires test pour les commentaires', '2015-04-08 00:00:00'),
(3, 35, 'bibi', 'bibi@mail.com', 'Bonjour,\r\nMadame Harram Ã  Ã©ffÃ©ctuÃ©e diffÃ©rents travaux graphiques pour notre sociÃ©tÃ©. Notamment des affiches, flyers et cartes de visite.\r\nElle est actuellement chargÃ©e de crÃ©er notre site internet complet. Le suivi du projet se fait par ma personne, je suis ravie du rÃ©sultat. J''ai hÃ¢te que le site soit mis en ligne.\r\n\r\nSon travail est prÃ©cis, soignÃ© et professionnel! C''est une personne de confiance, et sÃ©rieuse.\r\nJe vous la conseil vivement.\r\n\r\nBernadette\r\nAlias Bibi!', '2015-04-09 00:00:00'),
(4, 36, 'fatiha', 'fatiha@mail.com', 'J''adoooooooore les fleurs!! J''adoooooooore les fleurs!! J''adoooooooore les fleurs!! vJ''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!J''adoooooooore les fleurs!!', '2015-04-09 00:00:00'),
(6, 34, 'dieudo', 'dieudo@mail.com', 'je m''appelle DieudonnÃ© et Fatiha est super! hihihi hahaha hihihi hahaha\r\nElle a du talent, de l''inspiration...\r\nElle est proffessionnelle!\r\n\r\nJe vous la recommande vivement.\r\n\r\nDido', '2015-04-09 00:00:00'),
(7, 38, 'lila', 'lila@hotmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fermentum metus ac libero tincidunt volutpat. Aliquam quis dignissim libero, et dignissim odio. In et diam nibh. Nulla quis nibh rutrum, molestie lorem vel, pretium massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam a tristique risus. Suspendisse eget diam ipsum. Aenean eu ornare eros. In hac habitasse platea dictumst. Pellentesque rutrum ultrices ante, ut convallis justo placerat at.\r\n\r\nDonec lorem odio, luctus ut eleifend nec, pulvinar et magna. Vivamus convallis faucibus pharetra. Proin aliquet dui sapien, id gravida elit varius congue. Sed laoreet eleifend quam eget rutrum. In non pulvinar nisi. Quisque luctus ligula sed orci ornare lacinia. Vestibulum laoreet odio eget finibus pretium. Vivamus consequat sodales dolor consectetur rutrum. Vivamus id facilisis nunc. Integer finibus pulvinar mauris ornare cursus. Vestibulum ultrices nisl id nunc porttitor rhoncus. Nunc semper elementum ullamcorper.', '2015-04-09 00:00:00'),
(8, 39, 'imrane', 'imrane@gmail.com', 'J''aime ma maman c''est la meilleure et la plus belle!\r\nJe t''aime, un peu, beaucoup, Ã  la folie, passionnÃ©ment, pas du tout, TOUT TOUT fort!!!', '2015-04-09 00:00:00'),
(10, 41, 'Nadia de Bruxelles', 'nadiabengharda@hotmail.com', 'Coucou super ton site fais de mÃªme pour moi ;-)', '2015-04-10 00:00:00'),
(11, 41, 'Nadia de Bruxelles', 'nadiabengharda@hotmail.com', 'coucou :-)', '2015-04-10 00:00:00'),
(12, 42, 'paulo', 'paul@gmail.com', 'Bonjour je m''apelle Paulo.\r\nJe voulais juste laisser un commentaire :o)', '2015-04-14 00:00:00'),
(13, 43, 'didier', 'didier@hotmail.com', 'Je m''appelle Didier et je fais un test', '2015-04-14 00:00:00'),
(14, 43, 'didier', 'didier@hotmail.com', 'je fais un test', '2015-04-14 00:00:00'),
(15, 43, 'didier', 'didier@hotmail.com', 'encore un test avec l;heure cette foi ci! enfin j''espÃ¨re!!!', '2015-04-14 00:00:00'),
(16, 43, 'didier', 'didier@hotmail.com', 'hello', '2015-04-14 00:00:00'),
(17, 44, 'lilou', 'lilou@mail.com', 'c''est lilou', '2015-04-14 00:00:00'),
(37, 39, 'imrane', 'imrane@gmail.com', 'Nous sommes le 21/04/2015 et je laisse un commentaire!', '2015-04-21 00:00:00'),
(38, 39, 'imrane', 'imrane@gmail.com', 'nous sommes toujours le 21/04 mais il est 1h37 cette fois', '2015-04-21 00:00:00'),
(39, 36, 'fatiha', 'fatiha@mail.com', 'test', '2015-04-21 00:00:00'),
(40, 45, 'youn', 'youn@gmail.com', 'Je m''appel Youn et je laisse un message.', '2015-05-20 00:00:00'),
(41, 36, 'fatiha', 'fatiha@mail.com', 'Bonjour,&lt;/br&gt;\r\nJe voudrais dire que Fatiha est un excellent Ã©lÃ©ment et qu''il ne faudrait pas laisser passer quelqu''un d''aussi exceptionnel qu''elle.&lt;/br&gt;\r\n&lt;/br&gt;\r\nJe vous la conseille vivement!', '2015-06-09 00:00:00'),
(42, 48, 'oufti', 'oufto@oufti.com', 'Bonjour je m''apelle oufti et je suis oufti!!', '2015-06-15 14:46:00'),
(43, 48, 'oufti', 'oufto@oufti.com', 'encore un test?', '2015-06-15 15:01:04'),
(44, 48, 'oufti', 'oufto@oufti.com', 'BLA BLA BLA', '2015-06-15 16:42:13'),
(45, 48, 'oufti', 'oufto@oufti.com', 'hello!<br />\r\nJe m''appelle Yummi.<br />\r\nJe fais un test de retour Ã  la ligne<br />\r\nalors<br />\r\nvoyons<br />\r\nvoir!', '2015-06-15 22:03:55'),
(46, 48, 'oufti', 'oufto@oufti.com', 'Bonjour,<br />\r\nJ''aimerais savoir ce qui se passe s''il n''y a pas de commande en cours.<br />\r\nPouvez-vous me donner l''Ã©volution du travail en cours?<br />\r\nDe maniÃ¨re chÃ©matique, cela m''aiderais vraiment dans le planning de mes diffÃ©rents projets.<br />\r\n<br />\r\nMerci d''avance,<br />\r\nYummi', '2015-06-15 22:07:57'),
(47, 49, 'yummi', 'Yummi@mail.com', 'Hello i''m Yummi<br />\r\ni want to check my order? <br />\r\nthank you!!!', '2015-06-16 11:49:33'),
(48, 52, 'mmmm', 'f.harram@hotmail.com', 'Hello i''m MMMM<br />\r\ni want to say that''s it''s very cool to work with TIHA.<br />\r\nThis is THE professional person that you must know.<br />\r\ni recommend you tiha very wel...', '2015-07-06 18:49:58'),
(49, 60, '1234', 'f.harram@hotmail.com', 'ras le bol!!!!!!!', '2015-07-07 10:15:25'),
(50, 77, 'tiha', 'f.harram@hotmail.com', 'Hello i''m Tiha<br />\r\nI''m the administrator of the website.<br />\r\nI just want to say... THANK YOU!!<br />\r\n<br />\r\nTiha', '2015-07-07 23:43:48'),
(51, 3, 'nadia', 'nadia@mail.com', 'Bonjour,<br />\r\nJe m''appelle Nadia...', '2015-07-14 15:55:13'),
(52, 44, '', 'f.harram@hotmail.com', 'Bonjour,<br />\r\nCeci est un commentaire du client.<br />\r\nJe m''appelle Nadine Amouc et je suis cliente.<br />\r\nMais je pense que mon nom ne s''affichera pas!', '2015-07-20 16:15:51'),
(53, 44, '', 'f.harram@hotmail.com', 'je m''apelle nadine<br />\r\net je laisse un commentaire', '2015-07-20 16:19:43'),
(54, 44, '', 'f.harram@hotmail.com', 'heu', '2015-07-20 16:29:57'),
(55, 44, '', 'f.harram@hotmail.com', 'lalala', '2015-07-20 16:32:19'),
(56, 44, 'nadine', 'f.harram@hotmail.com', '???', '2015-07-20 19:33:01'),
(57, 38, '', 'lila@hotmail.com', '??lila??', '2015-07-20 19:34:04'),
(58, 38, 'lila', 'lila@hotmail.com', 'oula', '2015-07-20 19:43:59'),
(59, 0, 'nadine', '', '', '0000-00-00 00:00:00'),
(60, 44, 'nadine', 'f.harram@hotmail.com', 'hum', '2015-07-20 19:46:01'),
(61, 38, 'lila', 'lila@hotmail.com', 'jldjggfugf', '2015-07-20 22:07:37'),
(62, 44, 'nadine', 'f.harram@hotmail.com', 'jkijhyf', '2015-07-20 22:08:36'),
(63, 78, 'Nana', 'nananouar@hotmail.com', 'Bonjour,<br />\r\n<br />\r\nje suis fiÃ¨re de ma petite soeur.', '2015-07-21 17:37:10'),
(64, 78, 'Nana', 'nananouar@hotmail.com', 'Hello!', '2015-07-22 23:02:45'),
(65, 79, 'josiane', 'josi@josi.be', 'bonjour c''est josiane!', '2015-07-22 23:55:30'),
(66, 82, 'ihssan', 'ihssan2212@hotmail.com', 'coucou!courage poulette ;-)', '2015-07-25 19:39:12'),
(67, 77, 'tiha', 'f.harram@hotmail.com', 'Je m''appel Fatiha,<br />\r\nJe suis l''administrateur de ce site web!', '2015-07-26 17:11:51'),
(68, 44, 'lilou', 'lilou@mail.com', 'je m''appelle lilou.', '2015-08-05 00:30:44'),
(69, 85, 'nani', 'naima@gmail.com', 'kbqddvjbqdfjbvqj: :kqfnvl=', '2015-08-13 11:56:30'),
(70, 87, 'boubou', 'fatiha@mail.com', 'dvbdfuvfqd=vk', '2015-08-13 16:28:33'),
(71, 88, 'julius', 'rome@romain.com', 'AVE JULIUS!', '2015-08-14 01:29:21'),
(72, 89, 'yous', 'yousra@gmail.com', 'coucou c yousra', '2015-08-19 19:11:29'),
(73, 4, 'Fatiha', 'f.harram@hotmail.com', 'Je laisse un commentaire', '2015-08-19 23:50:18'),
(74, 77, 'tiha', 'f.harram@hotmail.com', 'Je laisse un commantaire!', '2015-08-22 00:42:11'),
(75, 77, 'tiha', 'f.harram@hotmail.com', 'Je laisse un commentaire!', '2015-08-31 07:29:57'),
(76, 77, 'tiha', 'f.harram@hotmail.com', 'la la lalalalal', '2015-08-31 07:31:09'),
(77, 72, 'Ines', 'ines@mail.com', 'Je laisse un commentaire maintenant.', '2015-09-02 14:19:04'),
(78, 72, 'Ines', 'ines@mail.com', 'Je laisse un commentaire maintenant.', '2015-09-02 14:26:43'),
(79, 85, 'nani', 'naima@gmail.com', 'je suis nani', '2015-09-02 15:55:00');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `name_client` varchar(255) COLLATE utf8_bin NOT NULL,
  `orderType` varchar(255) COLLATE utf8_bin NOT NULL,
  `orderDescr` varchar(255) COLLATE utf8_bin NOT NULL,
  `orderLevel` varchar(255) COLLATE utf8_bin NOT NULL,
  `briefingValue` varchar(50) COLLATE utf8_bin NOT NULL,
  `envoiChValue` varchar(50) COLLATE utf8_bin NOT NULL,
  `okChValue` varchar(50) COLLATE utf8_bin NOT NULL,
  `designValue` varchar(50) COLLATE utf8_bin NOT NULL,
  `prodValue` varchar(50) COLLATE utf8_bin NOT NULL,
  `livraisonValue` varchar(50) COLLATE utf8_bin NOT NULL,
  `facturValue` varchar(50) COLLATE utf8_bin NOT NULL,
  `facturationData` varchar(255) COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=28 ;

--
-- Contenu de la table `orders`
--

INSERT INTO `orders` (`id`, `id_client`, `name_client`, `orderType`, `orderDescr`, `orderLevel`, `briefingValue`, `envoiChValue`, `okChValue`, `designValue`, `prodValue`, `livraisonValue`, `facturValue`, `facturationData`, `date`) VALUES
(2, 1, 'Leaticia Casta', 'strategie', 'Refonte globale de son image de marque', 'RÃ©alisation du design/visuel', '100', '100', '100', '25', '0', '0', '0', '', '2015-08-10 14:47:02'),
(8, 63, 'chantal goya', 'print', 'affichage spectacle', 'Briefing', '100', '26', '0', '0', '0', '0', '0', '', '2015-08-14 03:34:28'),
(23, 4, 'Harram Fatiha', 'all', 'Campagne complÃ¨te pour son image de marque', 'Envoi du cahier des charges', '100', '50', '0', '0', '0', '0', '0', '', '2015-08-16 14:46:02'),
(25, 7, 'Fourbe Caroline', 'web', 'direction stratÃ©gique', 'RÃ©alisation du design/visuel', '100', '100', '100', '25', '0', '0', '0', '', '2015-08-16 15:13:15'),
(26, 54, 'El Bouri Ines', 'print', 'CrÃ©ation et impression de faire-part de mariage.', 'Briefing', '100', '100', '100', '100', '30', '1', '0', 'img/facture501.pdf', '2015-08-22 01:28:42'),
(27, 72, 'El Bouri Ines', 'design', 'Mise en forme et mise en page de son livre de naissance ainsi qu''une rÃ©flexion pour un design appropriÃ© de son livre de famille.', 'Acceptation du cahier des charges', '100', '100', '20', '0', '0', '0', '0', '', '2015-09-01 11:54:48');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `pseudo` varchar(200) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(200) COLLATE utf8_bin NOT NULL,
  `dateinscription` date NOT NULL,
  `admin` tinyint(2) NOT NULL,
  `client` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=93 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `pseudo`, `mdp`, `dateinscription`, `admin`, `client`) VALUES
(1, 'f.harram@gmail.com', 'fifi', '2430242dc52b9fec', '2015-03-24', 0, 0),
(2, 'h.fatiha@mail.com', 'hary', '1b1464a2413c5dfb', '2015-03-24', 0, 0),
(3, 'nadia@mail.com', 'nadia', 'a2e8cea3392da09d', '2015-03-24', 0, 0),
(4, 'boubou@mail.com', 'boubou', 'be352ac0e6b130e2', '2015-03-24', 0, 0),
(24, 'ines@mail.com', 'ines', 'e559744627cceb9d', '2015-03-26', 0, 0),
(25, 'hankar@mail.be', 'hankar', 'd38ff96c4581bd83', '2015-03-26', 0, 0),
(26, 'hankar@mail.be', 'hankar', 'd38ff96c4581bd83', '2015-03-26', 0, 0),
(27, 'ines@mail.com', 'ines', 'e559744627cceb9d', '2015-03-26', 0, 0),
(28, 'ines@mail.com', 'ines', 'e559744627cceb9d', '2015-03-26', 0, 0),
(29, 'blabla@mail.com', 'blabla', 'df5ea29924d39c3b', '2015-03-26', 0, 0),
(30, 'blabla@mail.com', 'blabla', 'df5ea29924d39c3b', '2015-03-26', 0, 0),
(31, 'ines@mail.com', 'ines', 'e559744627cceb9d', '2015-03-26', 0, 0),
(32, 'm.harram@mail.com', 'mous', '5cf8d152b0d18e40', '2015-03-31', 0, 0),
(33, 'cal@mail.com', 'cal', '912b498a2f2f5913', '2015-04-02', 0, 0),
(35, 'bibi@mail.com', 'bibi', '8115153332991997460b9f236e0da71a', '2015-04-07', 0, 0),
(36, 'fatiha@mail.com', 'fatiha', 'bb44a3f3a09296023448d67ba273ae98', '2015-04-07', 1, 0),
(37, 'dieudo@mail.com', 'dieudo', '6dc9bb97a6a947d5d61b323f6cd11911', '2015-04-09', 0, 0),
(38, 'lila@hotmail.com', 'lila', 'fda6ef9f6ba8382c875468cd70d33ecf', '2015-04-09', 0, 0),
(39, 'imrane@gmail.com', 'imrane', '133369612750d3c253c28a98907f043d', '2015-04-09', 0, 0),
(40, 'melbouri@hotmail.com', 'mel', '0ef174fc614c8d61e2d63329ef7f46c0', '2015-04-09', 0, 0),
(41, 'nadiabengharda@hotmail.com', 'Nadia de Bruxelles', '4bd19cec8a60860ea98a9645dcc122e3', '2015-04-10', 0, 0),
(42, 'paul@gmail.com', 'paulo', 'dd41cb18c930753cbecf993f828603dc', '2015-04-14', 0, 0),
(43, 'didier@hotmail.com', 'didier', 'a16b0ae55a23dcd02698c76d400445e3', '2015-04-14', 0, 0),
(44, 'lilou@mail.com', 'lilou', '301733ca8ff8afda93d92b48675f3c95', '2015-04-14', 0, 0),
(45, 'youn@gmail.com', 'youn', '81175106af6aac05aef996f1573eb1fd', '2015-05-20', 0, 0),
(46, 'boule@mail.com', 'boule', '83eb7dd11fbdb5a83264c8e048570c90', '2015-05-20', 0, 0),
(48, 'oufto@oufti.com', 'oufti', '67141df0017bfca176720ca0c397dae3', '2015-06-15', 0, 0),
(49, 'Yummi@mail.com', 'yummi', 'f66c96e555fc6ae5bd130d6122786b57', '2015-06-16', 0, 0),
(50, 'you@mail.com', 'youyou', 'efa2a7d961f0f7292131682325d1255e', '2015-06-16', 0, 0),
(77, 'f.harram@hotmail.com', 'tiha', 'be47531f81a7fe3fd9d43cbecb6f1dae', '2015-07-07', 1, 0),
(78, 'nananouar@hotmail.com', 'Nana', '72fb5f8156adf1b638fc9bd1fa6cdbcf', '2015-07-21', 0, 0),
(79, 'josi@josi.be', 'josiane', '0ccd5f7785589eb5515ec6c26f58761d', '2015-07-22', 0, 0),
(80, 'josi@josi.be', 'josiane', '0ccd5f7785589eb5515ec6c26f58761d', '2015-07-22', 0, 0),
(81, 'josi@josi.be', 'josiane', '0ccd5f7785589eb5515ec6c26f58761d', '2015-07-22', 0, 0),
(82, 'ihssan2212@hotmail.com', 'ihssan', '1b15c661d09232172820bb371e46f913', '2015-07-25', 0, 0),
(83, 'f.harram@hotmail.com', 'fat01', 'fc21d547ca18a0baedbdac2db6cf8bc6', '2015-07-26', 0, 0),
(84, 'nath@gmail.com', 'nath', '320c8d45fe4ee818e1d185954c2c251d', '2015-08-05', 0, 0),
(85, 'naima@gmail.com', 'nani', '02ea2ae2a237c042285e093e6972eaa9', '2015-08-13', 0, 0),
(86, 'naima@gmail.com', 'nani', '02ea2ae2a237c042285e093e6972eaa9', '2015-08-13', 0, 0),
(87, 'fatiha@mail.com', 'boubou', '987491d5f2d393335ade4bafee3e6937', '2015-08-13', 0, 0),
(88, 'rome@romain.com', 'julius', '30e6d8432ce54710f9c09f305e7b9829', '2015-08-14', 0, 0),
(89, 'yousra@gmail.com', 'yous', '7f662d0e9e1447f77f8f7a57f7fb5aea', '2015-08-19', 0, 0),
(90, 'lou@mail.com', 'loubna', '9340180326d40b4cfd150906254234f0', '2015-09-02', 0, 0),
(91, 'icil@mail.com', 'icil', '6b975332931678dcdf2ba2e125354802', '2015-09-02', 0, 0),
(92, 'roland@gmail.com', 'roland', 'ee21d5f27a8401788147f6f6184ddb11', '2015-09-02', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
