-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Lun 30 Janvier 2017 à 12:08
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `intranet_v1.1`
--

-- --------------------------------------------------------

--
-- Structure de la table `animations`
--

CREATE TABLE `animations` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `animations`
--

INSERT INTO `animations` (`id`, `type`, `nom`) VALUES
(1, 'effect', 'bounce'),
(2, 'effect', 'flash'),
(3, 'effect', 'pulse'),
(4, 'effect', 'rubberBand'),
(5, 'effect', 'shake'),
(6, 'effect', 'headShake'),
(7, 'effect', 'swing'),
(8, 'effect', 'tada'),
(9, 'effect', 'wobble'),
(10, 'effect', 'jello'),
(11, 'in', 'bounceIn'),
(12, 'in', 'bounceInDown'),
(13, 'in', 'bounceInLeft'),
(14, 'in', 'bounceInRight'),
(15, 'in', 'bounceInUp'),
(16, 'out', 'bounceOut'),
(17, 'out', 'bounceOutDown'),
(18, 'out', 'bounceOutLeft'),
(19, 'out', 'bounceOutRight'),
(20, 'out', 'bounceOutUp'),
(21, 'in', 'fadeIn'),
(22, 'in', 'fadeInDown'),
(23, 'in', 'fadeInDownBig'),
(24, 'in', 'fadeInLeft'),
(25, 'in', 'fadeInLeftBig'),
(26, 'in', 'fadeInRight'),
(27, 'in', 'fadeInRightBig'),
(28, 'in', 'fadeInUp'),
(29, 'in', 'fadeInUpBig'),
(30, 'out', 'fadeOut'),
(31, 'out', 'fadeOutDown'),
(32, 'out', 'fadeOutDownBig'),
(33, 'out', 'fadeOutLeft'),
(34, 'out', 'fadeOutLeftBig'),
(35, 'out', 'fadeOutRight'),
(36, 'out', 'fadeOutRightBig'),
(37, 'out', 'fadeOutUp'),
(38, 'out', 'fadeOutUpBig'),
(39, 'in', 'flipInX'),
(40, 'in', 'flipInY'),
(41, 'out', 'flipOutX'),
(42, 'out', 'flipOutY'),
(43, 'in', 'lightSpeedIn'),
(44, 'out', 'lightSpeedOut'),
(45, 'in', 'rotateIn'),
(46, 'in', 'rotateInDownLeft'),
(47, 'in', 'rotateInDownRight'),
(48, 'in', 'rotateInUpLeft'),
(49, 'in', 'rotateInUpRight'),
(50, 'out', 'rotateOut'),
(51, 'out', 'rotateOutDownLeft'),
(52, 'out', 'rotateOutDownRight'),
(53, 'out', 'rotateOutUpLeft'),
(54, 'out', 'rotateOutUpRight'),
(55, 'effect', 'hinge'),
(56, 'in', 'rollIn'),
(57, 'out', 'rollOut'),
(58, 'in', 'zoomIn'),
(59, 'in', 'zoomInDown'),
(60, 'in', 'zoomInLeft'),
(61, 'in', 'zoomInRight'),
(62, 'in', 'zoomInUp'),
(63, 'out', 'zoomOut'),
(64, 'out', 'zoomOutDown'),
(65, 'out', 'zoomOutLeft'),
(66, 'out', 'zoomOutRight'),
(67, 'out', 'zoomOutUp'),
(68, 'in', 'slideInDown'),
(69, 'in', 'slideInLeft'),
(70, 'in', 'slideInRight'),
(71, 'in', 'slideInUp'),
(72, 'out', 'slideOutDown'),
(73, 'out', 'slideOutLeft'),
(74, 'out', 'slideOutRight'),
(75, 'out', 'slideOutUp');

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `value` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`id`, `name`, `value`) VALUES
(1, 'version', '1.0'),
(2, 'ville_meteo', 'Toulouse');

-- --------------------------------------------------------

--
-- Structure de la table `config_tv`
--

CREATE TABLE `config_tv` (
  `item_type` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `tps_affichage` int(20) NOT NULL,
  `moduleGauche` varchar(50) NOT NULL,
  `moduleCentre` varchar(50) NOT NULL,
  `moduleDroite` varchar(50) NOT NULL,
  `animationIn` varchar(30) NOT NULL,
  `animationOut` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `config_tv`
--

INSERT INTO `config_tv` (`item_type`, `description`, `logo`, `tps_affichage`, `moduleGauche`, `moduleCentre`, `moduleDroite`, `animationIn`, `animationOut`) VALUES
('bde', 'Page d''affichage des news du BDE', 'logo_ynovcampus_couleur1.png', 5000, 'logo', '', '', '', ''),
('news', 'Page d''affichage des news', 'logo_ynovcampus_couleur1.png', 5000, 'logo', 'date', 'heure', 'fadeInRightBig', 'fadeOutLeftBig'),
('photos', 'Page de l''album photo', 'logo_ynovcampus_couleur1.png', 5000, 'logo', 'date', 'heure', '', ''),
('infos', 'Page d''affichage infos / météo ...', '', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `formation` varchar(15) DEFAULT NULL,
  `Promo` varchar(6) DEFAULT NULL,
  `Nom` varchar(19) DEFAULT NULL,
  `Prénom` varchar(23) DEFAULT NULL,
  `anniversaire` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etudiants`
--

INSERT INTO `etudiants` (`formation`, `Promo`, `Nom`, `Prénom`, `anniversaire`) VALUES
('Lim''Art ', 'B3 Lim', 'AGUILA', 'Déborah', '04/11/1996'),
('Ingesup ', 'M2', 'AL JAOUHARI', 'Imane', '23/08/1991'),
('Ingésup Bourse', 'B2', 'ALARCON', 'Loïc', '02/11/1991'),
('Ingesup ', 'M2', 'AMOROSO', 'Cloé', '05/06/1994'),
('Ingesup ', 'M2', 'ANTUNES', 'Florian', '26/05/1994'),
('Ingesup ', 'B2', 'BEJAUD', 'Sacha', '06/09/1996'),
('Ingesup ', 'B2', 'BELLARIVA', 'Bastien', '13/04/1996'),
('Ingesup ', 'B2', 'BONAL', 'Arthur', '14/01/1997'),
('Lim''Art ', 'B2 Lim', 'BOULOGNE', 'Adrien', '24/04/1992'),
('Ingesup ', 'B2', 'BOURDIN', 'Alexia', '05/01/1997'),
('Ingesup ', 'M2', 'BRAMONTE', 'Kenny', '15/09/1992'),
('Lim''Art ', 'B2 Lim', 'BRESILLON', 'Bastien', '15/03/1996'),
('Ingesup Bourse', 'B1Ing', 'BRUCKER', 'Brice', '18/11/1995'),
('Ingesup ', 'M2', 'BRUNET', 'Thomas', '27/05/1993'),
('Ingesup ', 'B3', 'CAILLARD', 'Alexandre', '12/03/1992'),
('Ingesup ', 'M1', 'CAMBARAT ', 'Julien', '21/11/1994'),
('Ingesup ', 'M1', 'CAMINADE', 'Adrien', '19/05/1995'),
('Lim''Art ', 'B2 Lim', 'CARIOU', 'Maureen', '13/11/1997'),
('Ingesup ', 'M1', 'CASSIGNOL', 'Pierre', '22/01/1995'),
('Lim''Art ', 'B3 Lim', 'CECILIE', 'Goran', '19/01/1994'),
('Ingesup ', 'M2', 'CHAMATI', 'ALexandre', '11/04/1992'),
('Ingesup ', 'B2', 'CHAN', 'Eric', '13/01/1997'),
('Ingesup ', 'M1', 'COLLARD', 'Pierre', '06/03/1995'),
('Ingesup ', 'M1', 'COUGET', 'Pierrick', '01/02/1995'),
('Ingesup ', 'M2', 'CUPILLARD', 'Gabriel', '03/04/1992'),
('Ingesup Bourse', 'B2', 'DANG', 'Pascal', '15/02/1992'),
('Ingesup ', 'B2', 'DANIEL', 'Arthur', '12/01/1994'),
('Ingesup ', 'M1', 'DARIUS', 'AXEL', '14/04/1995'),
('Lim''Art ', 'B2 Lim', 'DEBORD', 'Marion', '03/01/1992'),
('Ingesup ', 'M2', 'DEBRIS', 'Pierre-Henri', '03/02/1994'),
('Ingesup ', 'M1', 'DECOMIS', 'Colin', '02/02/1992'),
('Ingesup ', 'B3', 'DELGLAT', 'Kévin', '23/07/1995'),
('Ingesup ', 'M2', 'DELON', 'Hermine', '14/08/1992'),
('Ingesup ', 'M1', 'DELRUE', 'François', '18/02/1993'),
('Ingesup ', 'M1', 'DENEUX', 'Benjamin', '14/10/1995'),
('Ingesup ', 'B2', 'DEQUEKER', 'Richard', '07/02/1991'),
('Ingesup ', 'M1', 'DERAIN', 'Paul', '14/12/1995'),
('Ingesup ', 'B3', 'DEUMIER', 'Stephan', '28/05/1994'),
('Ingesup ', 'B2', 'DUFOUR ', 'Victor', '05/02/1995'),
('Ingesup Bourse', 'B2', 'DUMONT', 'Eric', '04/12/1991'),
('Ingesup ', 'M2', 'DUPIRE', 'Joffrey', '13/01/1993'),
('Ingesup ', 'M2', 'FAHMI', 'Mehdi', '13/04/1990'),
('Ingesup ', 'B2', 'FEHRENBACH', 'Félix', '06/09/1996'),
('Ingesup ', 'B2', 'FERRAND', 'Pierre-Alexandre', '16/12/1995'),
('Lim''Art ', 'B2 Lim', 'FIORENTINI', 'William', '21/08/1997'),
('Ingesup ', 'M1', 'FLEURY', 'Clément', '12/04/1991'),
('Ingesup ', 'M2', 'GASTON', 'Aurélien', '02/04/1993'),
('Lim''Art ', 'B3 Lim', 'GAUZE', 'Alexandra', '08/02/1992'),
('Ingesup ', 'B2', 'GEORGE', 'Kévin', '06/07/1990'),
('Lim''Art ', 'B3 Lim', 'GIMENEZ', 'Thibault', '22/03/1995'),
('Ingesup ', 'M1', 'GIORGIUTTI', 'Mathieu', '12/06/1991'),
('Ingesup ', 'M2', 'GIRARDET', 'Julien', '07/09/1992'),
('Ingesup ', 'M2', 'GLEIZES ', 'Axel', '22/05/1992'),
('Lim''Art ', 'B2 Lim', 'GOBEL', 'Lisa', '21/11/1996'),
('Ingesup ', 'B2', 'GUERIN', 'Maxime', '28/10/1995'),
('Ingesup ', 'B2', 'HERVIEU', 'Damien', '17/12/1997'),
('Ingesup ', 'M2', 'HUET', 'Benjamin', '28/10/1992'),
('Lim''Art ', 'B2 Lim', 'HUISSOUD', 'Clément', '19/03/1990'),
('Ingesup ', 'B3', 'HUO YUNG KAI ', 'Kévin', '11/12/1992'),
('Ingesup ', 'M1', 'HUON', 'Loïc', '28/09/1994'),
('Ingesup ', 'M2', 'JALLAN', 'Rémy', '05/12/1994'),
('Ingesup ', 'B2', 'JOUANJAN', 'Eliott', '06/05/1994'),
('Lim''Art ', 'B3 Lim', 'JUBIN', 'Cyrille', '12/09/1995'),
('Ingesup ', 'M1', 'JURADO', 'Benoît', '09/10/1994'),
('Ingesup ', 'M1', 'KADEH', 'Ahmed', '13/10/1995'),
('Ingesup ', 'B3', 'LABLANCHE', 'Valentin', '15/06/1996'),
('Ingesup ', 'M1', 'LAURENS', 'Robin', '24/01/1992'),
('Ingesup ', 'B3', 'LAURENT', 'Médéric', '23/04/1993'),
('Ingesup ', 'M2', 'LAVAYRE', 'Robin', '14/07/1992'),
('Ingesup Bourse', 'B2', 'LEMMOUCHI', 'Selim', '28/06/1993'),
('Ingesup ', 'M1', 'LEPAPE', 'Alexandre', '02/08/1993'),
('Ingesup ', 'B3', 'LEVER', 'Erwan', '07/02/1997'),
('Ingesup ', 'M1', 'LEYGUE', 'Damien', '03/04/1990'),
('Ingesup ', 'B2', 'LITAMPHA', 'Jordan', '14/02/1996'),
('Ingesup Bourse', 'B2', 'LOGE', 'Florian', '02/05/1996'),
('Ingesup Bourse', 'B2', 'LOISEAU ', 'Thomas', '17/06/1991'),
('Lim''Art ', 'B2 Lim', 'LONÉTÉ', 'Yvana', '04/09/1996'),
('Ingesup ', 'B3', 'LOZES', 'Clara', '24/05/1994'),
('Ingesup ', 'B3', 'LOZES', 'François', '24/05/1994'),
('Ingesup ', 'M1', 'MALFRAY', 'Pili', '26/04/1995'),
('Lim''Art ', 'B2 Lim', 'MARCELIN-GABRIEL', ' Cheyenne', '30/08/1994'),
('Ingesup ', 'M2', 'MARTINS', 'Noël', '23/12/1989'),
('Ingesup ', 'M2', 'MARTY', 'Alexandre', '15/12/1992'),
('Ingesup Bourse', 'B2', 'MAURE', 'Damien', '23/01/1995'),
('Ingesup ', 'M1', 'MEKKID', 'Amine', '08/02/1995'),
('Ingesup ', 'B3', 'MINETTO', 'Jordan', '18/07/1994'),
('Lim''Art ', 'B3 Lim', 'MONGE', 'David', '16/04/1994'),
('Ingesup ', 'M1', 'MONTES', 'Cyril', '01/10/1995'),
('Ingesup ', 'M1', 'MURAT', 'Olivier', '03/11/1992'),
('Ingesup ', 'B2', 'NAUDY', 'Guillaume', '22/10/1995'),
('Ingesup ', 'B2', 'OUSSET', 'Pierre', '13/12/1996'),
('Ingesup ', 'M1', 'PASQUALON', 'Stéphanie', '21/05/1987'),
('Ingesup ', 'M1', 'PATTYN', 'Nicolas', '05/05/1995'),
('Lim''Art ', 'B3 Lim', 'PAUTOT', 'Camille', '01/12/1995'),
('Ingesup ', 'B3', 'PELLE', 'Benjamin', '19/06/1992'),
('Ingesup ', 'B3', 'PEREZ', 'Maxime', '25/12/1995'),
('Ingesup ', 'M1', 'PEREZ', 'Benjamin', '26/04/1991'),
('Ingesup ', 'M1', 'PERRIER', 'Thomas', '23/02/1994'),
('Lim''Art ', 'B3 Lim', 'PETITOT', 'Laurrie', '22/06/1991'),
('Ingesup ', 'M1', 'PINTO', 'Christophe', '16/08/1993'),
('Ingesup Bourse', 'B2', 'PLASSEAU', 'Gylian', '26/04/1994'),
('Ingesup Bourse', 'B2', 'PLOTEAU', 'Corentin', '30/07/1993'),
('Ingesup ', 'M1', 'POGACEAN', 'George Andrei', '07/02/1987'),
('Ingesup ', 'B2', 'PENDARIES', 'Florian', '20/04/1995'),
('Ingesup ', 'B2', 'POIROT', 'Gabriel', '26/11/1995'),
('Ingesup ', 'M2', 'PONSET', 'Johann', '15/09/1994'),
('Ingesup ', 'B3', 'PORTE', 'Antoine', '16/12/1996'),
('Ingesup ', 'M1', 'POULET', 'Maxime', '25/05/1993'),
('Ingesup ', 'B3', 'PRUDENT', 'Guilian', '28/03/1996'),
('Ingesup ', 'M1', 'RAHIER', 'Romain', '13/05/1995'),
('Ingesup ', 'B3', 'REY', 'Alexis', '21/10/1996'),
('Ingesup ', 'M2', 'REY', 'Paul', '06/10/1994'),
('Ingesup ', 'B3', 'ROUSSANGE', 'Alexandre', '11/06/1996'),
('Ingesup ', 'B2', 'POLATO', 'Jérôme', '24/12/1994'),
('Ingesup ', 'M2', 'RUBINI', 'Quentin', '10/01/1994'),
('Lim''Art ', 'B2 Lim', 'SAINTVOIRIN', 'Léa', '14/06/1996'),
('Ingesup ', 'M2', 'SAISSI', 'Lucas', '08/11/1991'),
('Ingesup ', 'M1', 'SAN JOSE', 'Quentin', '10/07/1995'),
('Ingesup ', 'M2', 'SANTOS CABRITA', 'Alexandre', '19/10/1989'),
('Ingesup ', 'B3', 'SAULNERON', 'Rémi', '21/02/1994'),
('Ingesup ', 'M1', 'SEVERAC', 'Thibaut', '14/03/1994'),
('Ingesup ', 'M2', 'SICARD', 'Isabelle', '10/12/1993'),
('Ingesup ', 'M2', 'SŒUR', 'Rota', '25/04/1990'),
('Ingesup ', 'M2', 'SOTER', 'Thomas', '10/08/1994'),
('Ingesup ', 'B3', 'STEFANESCU', 'Valentin', '17/03/1995'),
('Ingesup ', 'B3', 'THIBAUDAT', 'Victor', '18/06/1995'),
('Ingesup ', 'M2', 'THOMELET', 'Jimmy', '15/10/1993'),
('Ingesup Bourse', 'B2', 'VAISSIERE', 'Nicolas', '01/09/1993'),
('Lim''Art ', 'B2 Lim', 'VEAUTE', 'Eloïse', '03/02/1996'),
('Ingesup ', 'B1Ing', 'VARNIER', 'Tony', '13/12/1997'),
('Lim''Art ', 'B2 Lim', 'VENITUS', 'Léonella-Rose hélène', '09/10/1995'),
('Ingesup ', 'B3', 'VIGNES', 'Julien', '05/07/1995'),
('Ingesup ', 'M1', 'VOIROL', 'Adrien', '09/07/1995'),
('Ingesup ', 'B2', 'ZAGULA', 'Léa', '23/06/1997'),
('Ingesup ', 'M2', 'RAYNIER ', 'Kévin', '29/03/1993'),
('Ingesup ', 'M2', 'MIMART', 'Arnaud', '16/10/1993'),
('Ingesup ', 'M2', 'MABROUK', 'Ons', '27/01/1994'),
('Ingesup', 'B1Ing', 'DI CRESCENZO', 'Alain', '23/07/1998'),
('Ingesup', 'B1Ing', 'CORNEAU', 'Fabio', '12/08/1999'),
('Ingesup', 'B3', 'GALIBERT', 'Thomas', '20/07/1996'),
('Ingesup', 'B1Ing', 'BERTAUD', 'Céline', '24/12/1998'),
('Lim''Art ', 'MANAA', 'BERGES', 'Jean-Baptiste', '09/03/1998'),
('Ingesup', 'B1Ing', 'PICCININI', 'Thomas', '13/02/1998'),
('Ingesup', 'B3', 'BODEYO', 'Clovis', '03/04/1995'),
('Ingesup', 'B1Ing', 'TAURAND', 'Florian', '04/11/1997'),
('Ingesup', 'B1Ing', 'LE LAY', 'Logan', '10/01/1997'),
('Ingesup', 'B1Ing', 'HORTALA', 'Justine', '21/05/1998'),
('Lim''Art ', 'MANAA', 'BERINGUIER', 'Elsa', '23/06/1998'),
('Lim''Art ', 'MANAA', 'BERTHET', 'Marc', '03/04/1995'),
('Lim''Art ', 'MANAA', 'BOURG', 'Fanny', '18/07/1997'),
('Ingesup Bourse', 'B1Ing', 'LE BIHAN', 'Thomas', '10/09/1996'),
('Ingesup', 'B1Ing', 'FOURNIER', 'Julien', '12/08/1995'),
('Ingesup', 'B1Ing', 'GASTON ', 'Antoine', '01/10/1996'),
('Lim''Art ', 'MANAA', 'BUSCAIL', 'Thomas', '29/03/1998'),
('Ingesup Bourse', 'B1Ing', 'BEDAT', 'Joritz', '06/11/1997'),
('Ingesup', 'M1', 'AIT EL BACHA', 'Jawad', '18/03/1992'),
('Lim''Art ', 'B3 Lim', 'CAMPI', 'Marie', '05/03/1996'),
('Lim''Art ', 'MANAA', 'CHATEAU', 'Céline', '11/11/1996'),
('Ingesup', 'B1Ing', 'BRUN', 'Killian', '17/06/1997'),
('Ingesup', 'B1Ing', 'GACHE', 'Jules', '07/07/1998'),
('Ingesup', 'B1Ing', 'FERRAND', 'Félix', '17/05/1999'),
('Lim''Art ', 'MANAA', 'CHRIQUI', 'Antoine', '18/07/1994'),
('Lim''Art ', 'MANAA', 'CREACH', 'Viviane', '24/03/1997'),
('Ingesup', 'B3', 'BERNOU', 'Florian', '01/05/1996'),
('Ingesup', 'M1', 'BOUTRAND', 'Emeric', '21/04/1993'),
('Lim''Art ', 'MANAA', 'DENIZOT', 'Baptiste', '03/07/1997'),
('Lim''Art ', 'MANAA', 'DUCOMMUN', 'Thomas', '12/12/1996'),
('Lim''Art ', 'MANAA', 'EUGONE', 'Grégory', '03/09/1997'),
('Lim''Art ', 'MANAA', 'FAUCHER', 'Benajmin', '01/05/1990'),
('Ingesup', 'B1Ing', 'BANGOURA', 'Sékou', '12/03/1996'),
('Ingesup', 'B3', 'FAYE', 'Cheikh', '06/03/1996'),
('Lim''Art ', 'MANAA', 'FAURÉ', 'Aurore', '13/03/1998'),
('Ingesup', 'M1', 'DURAND', 'Sébastien', '19/06/1988'),
('Lim''Art ', 'MANAA', 'FRANCOISE', 'Zoe', '17/09/1998'),
('Lim''Art ', 'MANAA', 'GARCIA', 'Fanny', '28/12/1998'),
('Ingesup', 'M1', 'BAGOUET', 'Alexandre', '06/10/1989'),
('Ingesup', 'B3', 'MOGLIA', 'Thomas', '13/09/1995'),
('Ingesup Bourse', 'B1Ing', 'GENISSEL', 'Benjamin', '27/12/1996'),
('ESSCA', 'B3', 'MANGA', 'Moubarak', '18/09/1996'),
('Lim''Art ', 'MANAA', 'GUINARD', 'Gabin', '17/12/1997'),
('Ingesup', 'B3', 'BUET', 'Florian', '10/05/1996'),
('Ingesup', 'B1Ing', 'EDOUARD', 'Anthony', '20/03/1997'),
('ESSCA', 'B3', 'MASRAR', 'Aymane', '04/09/1995'),
('Lim''Art ', 'MANAA', 'LE MINH TRIET', 'Lila', '28/11/1994'),
('Lim''Art ', 'MANAA', 'LOGA', 'Louis', '07/10/1996'),
('Ingesup', 'B1Ing', 'CHAMPRIGAUD', 'Maëva', '05/07/1996'),
('Ingesup', 'M1', 'BERNIOLLES', 'Maxime', '28/03/1991'),
('Lim''Art ', 'MANAA', 'LOUBIERES', 'Dorian', '22/04/1996'),
('Lim''Art ', 'MANAA', 'MAILLOT', 'Maore', '29/08/1998'),
('Ingesup', 'M1', 'AMIRALI', 'Mohamed-Islem', '21/08/1990'),
('Lim''Art ', 'MANAA', 'MARTIN', 'Claire', '06/06/1989'),
('Lim''Art ', 'MANAA', 'MORTILLARO', 'Pierre', '14/07/1996'),
('Lim''Art ', 'MANAA', 'MUSSART', 'Annalycia', '30/05/1998'),
('Lim''Art ', 'MANAA', 'NOH', 'Daekyum', '15/03/1991'),
('Ingesup', 'B3', 'DAUTRICOURT', 'Jonathan', '09/06/1988'),
('Ingesup', 'B1Ing', 'FENOUL', 'Alexandre', '24/02/1999'),
('Lim''Art ', 'B3 Lim', 'ESTEBAN', 'Margaux', '26/04/1995'),
('Lim''Art ', 'MANAA', 'NUNES', 'Quentin', '10/01/1998'),
('ESSCA', 'B3', 'SANCHEZ', 'Nicolas', '25/10/1995'),
('Ingesup', 'B1Ing', 'MAILLARD', ' Constance', '28/10/1995'),
('Ingesup', 'B3', 'TAMIAZZO', 'Frédéric', '04/10/1995'),
('Lim''Art ', 'MANAA', 'RADOLA', 'Olivier', '18/09/1996'),
('Lim''Art ', 'B2 Lim', 'KIRCHER', 'Lucie', '26/06/1997'),
('Lim''Art ', 'MANAA', 'SEGOND', 'Adrien', '27/08/1996'),
('Ingesup', 'B1Ing', 'MARTINEZ', 'Mathieu', '05/01/1995'),
('Lim''Art ', 'MANAA', 'TAGAA', 'Maliha', '20/08/1998'),
('Ingesup', 'B3', 'GABRIEL', 'Thomas', '01/09/1995'),
('Ingesup', 'M2', 'LAMBERT', 'David', '11/07/1990'),
('Lim''Art ', 'MANAA', 'TENET', 'Benoït', '03/11/1998'),
('Ingesup', 'M2', 'DOURLENS', 'Thomas', '25/09/1992'),
('Ingesup', 'B3', 'REGLAT', 'Anicet', '14/07/1993'),
('ESSCA', 'B3', 'DUPIN', 'Charline', '26/09/1996'),
('Ingesup', 'M2', 'EVRARD', 'Quentin', '22/10/1993'),
('Ingesup', 'B1Ing', 'GRÉTOUCE', 'Thomas', '03/07/1995'),
('Ingesup', 'B1Ing', 'PAPPALLARDO', 'Antoine', '25/06/1996'),
('Ingesup', 'M1', 'SCHMITT', 'Hadrien', '27/11/1988'),
('Ingesup', 'M1', 'PRADEL', 'Florent', '05/01/1991'),
('Lim''Art ', 'MANAA', 'THALAMY', 'Alexandre', '30/05/1996'),
('Lim''Art ', 'MANAA', 'THOMAS', 'Lucas', '09/11/1998'),
('Ingesup', 'M1', 'FONTAS', 'Julien', '12/01/1990'),
('Ingesup', 'M1', 'LIGAS', 'Maxime', '19/08/1994'),
('Ingesup', 'B1Ing', 'ROSE', 'Timon', '13/08/1995'),
('Ingesup', 'B1Ing', 'FAYE', 'Pape', '02/08/1996'),
('Lim''Art ', 'MANAA', 'TREACY', 'Maureen', '30/03/1996'),
('Ingesup', 'M1', 'GAUDIN', 'Alexis', '02/10/1994'),
('Ingesup', 'M1', 'BONNAFOUS', 'Mathieu', '27/10/1995'),
('Ingesup', 'B3', 'MARTIN', 'Pierre-Yves', '24/08/1992'),
('Lim''Art ', 'MANAA', 'VARGAS', 'Arno', '04/04/1997'),
('ESSCA', 'B3', 'SAINT MARTIN TILLET', 'Sophie', '23/10/1993'),
('Ingesup', 'M2', 'MELKA', 'Anthony', '25/01/1992'),
('Lim''Art ', 'MANAA', 'VERDIER', 'Clara', '03/10/1997'),
('Ingesup', 'B3', 'MARANSIN', 'Laurent', '25/09/1996'),
('Ingesup', 'B3', 'MICHEAU', 'Cédric', '09/10/1992'),
('Ingesup', 'B1Ing', 'MOKRI', 'Rayane', '17/12/1995'),
('Lim''Art ', 'MANAA', 'VERNHES', 'Margaux', '26/10/1989'),
('Ingesup', 'B3', 'TAUZIN', 'Dominique', '27/10/1992'),
('Ingesup', 'B1Ing', 'BARATGIN', 'Léo ', '07/09/1997'),
('Ingesup', 'B1Ing', 'BISTI', 'Nicolas', '09/12/1994'),
('Lim''Art ', 'MANAA', 'ZANETTE', 'Marion', '04/12/1998'),
('Ingesup', 'M2', 'LACARRERE', 'Nicolas', '05/04/1990'),
('Ingesup', 'B3', 'QUENTIN ', 'Alexandre', '28/08/1995'),
('Lim''Art ', 'MANAA', 'BARON', 'Killian', '14/09/1997'),
('Ingesup', 'B2', 'OZOUAKI', 'Albert', '11/09/1994'),
('Ingesup', 'B2', 'COULIBALY', 'Makan', '06/02/1994'),
('Lim''Art ', 'MANAA', 'MARCHIORO', 'Camille', '02/08/1995'),
('Lim''Art ', 'MANAA', 'CAVALIER', 'Pablo', '29/06/1997'),
('Ingesup ', 'B1', 'DEMIR', 'Aurélie', '19/10/1994'),
('Ingesup ', 'B3', 'HILD', 'Franck', '18/09/1992'),
('Ingesup ', 'M1', 'BARSE', 'Thomas', '04/11/1988'),
('Ingesup ', 'M2', 'POYER', 'Florian', '16/06/1993'),
('Ingesup ', 'M2', 'DUYCK', 'Thibaud', '18/06/1992'),
('Ingesup ', 'B3', 'ANDRE', 'Jérôme', '06/08/1993'),
('Ingesup', 'B3', 'DESCARGUES', 'Vincent', '06/02/1994'),
('Ingesup', 'B1', 'PERON', 'Nicolas', '08/06/1996'),
('Ingesup', 'B3', 'PITAVAL', 'Dylan', '18/07/1996'),
('Ingesup', 'B1', 'FROMONT', 'Nathan', '09/08/1994'),
('Ingesup', 'B3', 'MANTES', 'Julien', '18/06/01995'),
('Ingesup ', 'B2', 'GRECO', 'Xavier', '05/09/96'),
('Lim''Art ', 'MANAA', 'CAZEAUX', 'Clarisse', '25/12/1997'),
('ESSCA', 'B3', 'SALL', 'Mouhamadou', '04/01/1996'),
('Ingesup ', 'M1', 'LARAVINE', 'Thibaut', '09/09/94'),
('Ingesup ', 'M2', 'EXPERT', 'Adrien', '28/08/90'),
('Ingesup ', 'M2', 'CORDANI', 'Anthony', '17/02/93'),
('ESSCA', 'B3', 'D''ALMEIDA', 'Ludiviane', '10/08/1994'),
('Ingesup', 'B3', 'DELAVELLE', 'Arnaud', '18/05/1995');

-- --------------------------------------------------------

--
-- Structure de la table `intervenants`
--

CREATE TABLE `intervenants` (
  `nom` varchar(14) DEFAULT NULL,
  `prenom` varchar(16) DEFAULT NULL,
  `anniversaire` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `intervenants`
--

INSERT INTO `intervenants` (`nom`, `prenom`, `anniversaire`) VALUES
('AOUDJA ', 'Thierry ', '25/05/1960'),
('BERNARD', 'Antoine', '17/01/1991'),
('BOUSSOT ', 'Estelle', '27/06/1985'),
('DONAIRE', 'Sylvie', '28/08/1960'),
('LAFAGE ', 'Fabien', '12/10/1979'),
('LEROY ', 'Emilie', '09/08/1983'),
('PETIT', 'JEAN-hugues', '04/02/1959'),
('ROALDES', 'R', '27/01/1973'),
('TREUFFET', 'Yann', '16/05/1978'),
('TUFFERY  ', 'Michel', '13/06/1948'),
('ROUX', 'Fabienne', '06/01/1969'),
('GRABIE', 'Alexis', '02/01/1969'),
('MEUNIER LACAY ', 'Jean- Maxime', '30/11/1984'),
('VIDAL', ' Jean-Phillipe', '17/12/1991'),
('MAILLIET ', 'François-Hugues', '31/03/1964'),
('PENNEMAN', 'Philippe', '23/03/1966'),
(' RENUN ', 'Charlotte', '14/06/1975'),
('ACHI ', 'Nassim', '03/07/1983'),
('BOUREBABA', 'Reda', ''),
('CAPO', 'Jéremy', '28/01/1987'),
('PERRIN', 'Cédric', '01/10/1975'),
('MADSEN', 'Sarah', '05/10/1969'),
('DE MONTGLOFIER', 'Francois Xavier', '27/08/1953'),
('FORSTER', 'Sian', '07/07/1986'),
('ZAYOUNA ', 'Thomas', '20/09/1984'),
('PIAU', 'Rémy', '14/10/1985'),
('VENZ', 'Kelly', '08/05/1981'),
('DUHAILLIER', 'Caroline', '03/03/1973'),
('ROUSSEL ', 'Matthieu', '05/02/1964'),
('LI', 'Zhe', '19/03/1985'),
('FRANCOIS ', 'Cyrille', '16/10/1972'),
('PONCE', 'Laurence', '06/06/1971'),
('PROCHILO', 'Elvire', '03/08/1971'),
('GRIVEL', 'Marie-Françoise', '20/05/1965'),
('D''ANDRIA', 'Jean-Marc', '03/03/1971'),
('OLLAGNIER', 'Ludovic', '13/08/1986'),
('LE PEZENNEC', 'Brigitte', ''),
('BARRALON', 'Alice', '05/11/1979'),
('DOAN ', 'Irene', '10/01/1978'),
('DURANTIN', 'Stéphanie', '13/11/1973'),
('BUSOLIN', 'Mathieu', '11/09/1991');

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `lien` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `modules`
--

INSERT INTO `modules` (`id`, `nom`, `lien`) VALUES
(1, 'logo', '_logo.php'),
(2, 'date', '_date.php'),
(3, 'heure', '_heure.php'),
(4, 'meteo', '_meteo.php');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `titre` varchar(300) NOT NULL,
  `afficher_titre` tinyint(1) DEFAULT NULL,
  `auteur` varchar(100) NOT NULL,
  `image` varchar(300) NOT NULL,
  `texte` text NOT NULL,
  `date` date NOT NULL,
  `text_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `news_bde`
--

CREATE TABLE `news_bde` (
  `id` int(11) NOT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `titre` varchar(300) NOT NULL,
  `afficher_titre` tinyint(1) DEFAULT NULL,
  `auteur` varchar(100) NOT NULL,
  `image` varchar(300) NOT NULL,
  `texte` text NOT NULL,
  `date` date NOT NULL,
  `text_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `createur` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `url` text NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `saint`
--

CREATE TABLE `saint` (
  `Jour` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `Fete` varchar(255) NOT NULL DEFAULT '',
  `Lever` time NOT NULL DEFAULT '00:00:00',
  `Coucher` time NOT NULL DEFAULT '00:00:00',
  `JourMois` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `saint`
--

INSERT INTO `saint` (`Jour`, `Fete`, `Lever`, `Coucher`, `JourMois`) VALUES
(1, 'St Maria, Télémaque', '08:44:00', '17:04:00', '01/01'),
(2, 'St Basile', '08:44:00', '17:05:00', '02/01'),
(3, 'Ste Geneviève', '08:43:00', '17:06:00', '03/01'),
(4, 'St Odilon', '08:43:00', '17:07:00', '04/01'),
(5, 'St Edouard', '08:43:00', '17:08:00', '05/01'),
(6, 'St Mélaine', '08:43:00', '17:09:00', '06/01'),
(7, 'St Raymond', '08:43:00', '17:10:00', '07/01'),
(8, 'St Lucien', '08:42:00', '17:12:00', '08/01'),
(9, 'Ste Alix', '08:42:00', '17:13:00', '09/01'),
(10, 'St Guillaume', '08:41:00', '17:14:00', '10/01'),
(11, 'St Paulin', '08:41:00', '17:15:00', '11/01'),
(12, 'Ste Tatiana', '08:40:00', '17:17:00', '12/01'),
(13, 'Ste Yvette', '08:40:00', '17:18:00', '13/01'),
(14, 'Ste Nina', '08:39:00', '17:20:00', '14/01'),
(15, 'St Rémi', '08:38:00', '17:21:00', '15/01'),
(16, 'St Marcel', '08:38:00', '17:22:00', '16/01'),
(17, 'Ste Roseline', '08:37:00', '17:24:00', '17/01'),
(18, 'Ste Prisca', '08:36:00', '17:25:00', '18/01'),
(19, 'St Marius', '08:35:00', '17:27:00', '19/01'),
(20, 'St Sébastien', '08:34:00', '17:28:00', '20/01'),
(21, 'Ste Agnès', '08:33:00', '17:30:00', '21/01'),
(22, 'St Vincent', '08:33:00', '17:31:00', '22/01'),
(23, 'St Barnard', '08:31:00', '17:33:00', '23/01'),
(24, 'St Fr. de Sales', '08:30:00', '17:35:00', '24/01'),
(25, 'Conv. de St Paul', '08:29:00', '17:36:00', '25/01'),
(26, 'Ste Paule', '08:28:00', '17:38:00', '26/01'),
(27, 'Ste Angèle', '08:27:00', '17:39:00', '27/01'),
(28, 'St Thomas d''Aquin', '08:26:00', '17:41:00', '28/01'),
(29, 'St Gildas', '08:25:00', '17:43:00', '29/01'),
(30, 'Ste Martine', '08:23:00', '17:44:00', '30/01'),
(31, 'Ste Marcelle', '08:22:00', '17:46:00', '31/01'),
(32, 'Ste Ella', '08:21:00', '17:47:00', '01/02'),
(33, 'Présentation', '08:19:00', '17:49:00', '02/02'),
(34, 'St Blaise', '08:18:00', '17:51:00', '03/02'),
(35, 'Ste Véronique', '08:16:00', '17:52:00', '04/02'),
(36, 'Ste Agathe', '08:15:00', '17:54:00', '05/02'),
(37, 'St Gaston', '08:13:00', '17:56:00', '06/02'),
(38, 'Ste Eugénie', '08:12:00', '17:57:00', '07/02'),
(39, 'Ste Jaqueline', '08:10:00', '17:59:00', '08/02'),
(40, 'Ste Apolline', '08:09:00', '18:01:00', '09/02'),
(41, 'St Arnaud', '08:07:00', '18:02:00', '10/02'),
(42, 'ND de Lourdes', '08:06:00', '18:04:00', '11/02'),
(43, 'St Félix', '08:04:00', '18:06:00', '12/02'),
(44, 'Ste Béatrice', '08:02:00', '18:07:00', '13/02'),
(45, 'St Valentin', '08:00:00', '18:09:00', '14/02'),
(46, 'St Claude', '07:59:00', '18:11:00', '15/02'),
(47, 'Ste Julienne', '07:57:00', '18:12:00', '16/02'),
(48, 'St Alexis', '07:55:00', '18:14:00', '17/02'),
(49, 'Ste Bernadette', '07:53:00', '18:15:00', '18/02'),
(50, 'St Gabin', '07:52:00', '18:17:00', '19/02'),
(51, 'Ste Aimée', '07:50:00', '18:19:00', '20/02'),
(52, 'St Pierre-Damien', '07:48:00', '18:20:00', '21/02'),
(53, 'Ste Isabelle', '07:46:00', '18:22:00', '22/02'),
(54, 'St Lazare', '07:44:00', '18:24:00', '23/02'),
(55, 'St Modeste', '07:42:00', '18:25:00', '24/02'),
(56, 'St Roméo', '07:40:00', '18:27:00', '25/02'),
(57, 'St Nestor', '07:39:00', '18:28:00', '26/02'),
(58, 'Ste Honorine', '07:37:00', '18:30:00', '27/02'),
(59, 'St Romain', '07:35:00', '18:32:00', '28/02'),
(60, 'St Aubin', '07:33:00', '18:33:00', '01/03'),
(61, 'St Ch. Le Bon', '07:31:00', '18:35:00', '02/03'),
(62, 'St Gwenolé', '07:29:00', '18:36:00', '03/03'),
(63, 'St Casimir', '07:27:00', '18:38:00', '04/03'),
(64, 'Ste Olive', '07:25:00', '18:39:00', '05/03'),
(65, 'Ste Colette', '07:23:00', '18:41:00', '06/03'),
(66, 'Ste Félicité', '07:21:00', '18:43:00', '07/03'),
(67, 'St Jean De Dieu', '07:19:00', '18:44:00', '08/03'),
(68, 'Ste Françoise', '07:17:00', '18:46:00', '09/03'),
(69, 'St Vivien', '07:15:00', '18:47:00', '10/03'),
(70, 'Ste Rosine', '07:12:00', '18:49:00', '11/03'),
(71, 'Ste Justine', '07:10:00', '18:50:00', '12/03'),
(72, 'St Rodrigue', '07:08:00', '18:52:00', '13/03'),
(73, 'Ste Mathilde', '07:06:00', '18:53:00', '14/03'),
(74, 'Ste Louise', '07:04:00', '18:55:00', '15/03'),
(75, 'Ste Bénédicte', '07:02:00', '18:56:00', '16/03'),
(76, 'St Patrick', '07:00:00', '18:58:00', '17/03'),
(77, 'St Cyrille', '06:58:00', '19:00:00', '18/03'),
(78, 'St Joseph', '06:56:00', '19:01:00', '19/03'),
(79, 'PRINTEMPS', '06:54:00', '19:03:00', '20/03'),
(80, 'Ste Clémence', '06:52:00', '19:04:00', '21/03'),
(81, 'Ste Léa', '06:49:00', '19:06:00', '22/03'),
(82, 'St Victorien', '06:47:00', '19:07:00', '23/03'),
(83, 'Ste Cath. De Suède', '06:45:00', '19:09:00', '24/03'),
(84, 'St Humbert', '06:43:00', '19:10:00', '25/03'),
(85, 'Ste Larissa', '06:41:00', '19:12:00', '26/03'),
(86, 'St Habib', '06:39:00', '19:13:00', '27/03'),
(87, 'St Gontran', '06:37:00', '19:15:00', '28/03'),
(88, 'Ste Gwladys', '06:35:00', '19:16:00', '29/03'),
(89, 'St Amédée', '06:33:00', '19:18:00', '30/03'),
(90, 'St Benjamin', '07:31:00', '20:19:00', '31/03'),
(91, 'St Hugues', '07:28:00', '20:21:00', '01/04'),
(92, 'Ste Sandrine', '07:26:00', '20:22:00', '02/04'),
(93, 'St Richard', '07:24:00', '20:24:00', '03/04'),
(94, 'St Isidore', '07:22:00', '20:25:00', '04/04'),
(95, 'Ste Irène', '07:20:00', '20:27:00', '05/04'),
(96, 'St Marcellin', '07:18:00', '20:28:00', '06/04'),
(97, 'St J.B. de la Sal', '07:16:00', '20:30:00', '07/04'),
(98, 'Ste Julie', '07:14:00', '20:31:00', '08/04'),
(99, 'St Gautier', '07:12:00', '20:33:00', '09/04'),
(100, 'St Fulbert', '07:10:00', '20:34:00', '10/04'),
(101, 'St Stanislas', '07:08:00', '20:36:00', '11/04'),
(102, 'St Jules', '07:06:00', '20:37:00', '12/04'),
(103, 'Ste Ida', '07:04:00', '20:38:00', '13/04'),
(104, 'St Maxime', '07:02:00', '20:40:00', '14/04'),
(105, 'St Paterne', '07:00:00', '20:41:00', '15/04'),
(106, 'St Benoît-Joseph', '06:58:00', '20:43:00', '16/04'),
(107, 'St Anicet', '06:56:00', '20:44:00', '17/04'),
(108, 'St Parfait', '06:54:00', '20:46:00', '18/04'),
(109, 'Ste Emma', '06:52:00', '20:47:00', '19/04'),
(110, 'Ste Odette', '06:50:00', '20:49:00', '20/04'),
(111, 'St Anselme', '06:48:00', '20:50:00', '21/04'),
(112, 'St Alexandre', '06:46:00', '20:52:00', '22/04'),
(113, 'St Georges', '06:45:00', '20:53:00', '23/04'),
(114, 'St fidèle', '06:43:00', '20:55:00', '24/04'),
(115, 'St Marc', '06:41:00', '20:56:00', '25/04'),
(116, 'Ste Alida', '06:39:00', '20:58:00', '26/04'),
(117, 'Ste Zita', '06:37:00', '20:59:00', '27/04'),
(118, 'Ste Valérie', '06:35:00', '21:01:00', '28/04'),
(119, 'Ste Cath. de Sien', '06:34:00', '21:02:00', '29/04'),
(120, 'St Robert', '06:32:00', '21:04:00', '30/04'),
(121, 'FETE DU TRAVAIL', '06:30:00', '21:05:00', '01/05'),
(122, 'St Boris', '06:29:00', '21:07:00', '02/05'),
(123, 'St Philippe/Jacques', '06:27:00', '21:08:00', '03/05'),
(124, 'St Sylvain', '06:25:00', '21:10:00', '04/05'),
(125, 'Ste Judith', '06:24:00', '21:11:00', '05/05'),
(126, 'Ste Prudence', '06:22:00', '21:12:00', '06/05'),
(127, 'Ste Gisèle', '06:20:00', '21:14:00', '07/05'),
(128, 'VICTOIRE 1945', '06:19:00', '21:15:00', '08/05'),
(129, 'St Pacôme', '06:17:00', '21:17:00', '09/05'),
(130, 'Ste Solange', '06:16:00', '21:18:00', '10/05'),
(131, 'Ste Estelle', '06:14:00', '21:19:00', '11/05'),
(132, 'St Achille', '06:13:00', '21:21:00', '12/05'),
(133, 'Ste Rolande', '06:12:00', '21:22:00', '13/05'),
(134, 'St Matthias', '06:10:00', '21:24:00', '14/05'),
(135, 'Ste Denise', '06:09:00', '21:25:00', '15/05'),
(136, 'St Honoré', '06:08:00', '21:26:00', '16/05'),
(137, 'St Pascal', '06:06:00', '21:28:00', '17/05'),
(138, 'St Eric', '06:05:00', '21:29:00', '18/05'),
(139, 'St Yves', '06:04:00', '21:30:00', '19/05'),
(140, 'St Bernardin', '06:03:00', '21:31:00', '20/05'),
(141, 'St Constantin', '06:01:00', '21:33:00', '21/05'),
(142, 'St Emile', '06:00:00', '21:34:00', '22/05'),
(143, 'St Didier', '05:59:00', '21:35:00', '23/05'),
(144, 'St Donatien', '05:58:00', '21:36:00', '24/05'),
(145, 'Ste Sophie', '05:57:00', '21:37:00', '25/05'),
(146, 'St Bérenger', '05:56:00', '21:39:00', '26/05'),
(147, 'St Augustin', '05:55:00', '21:40:00', '27/05'),
(148, 'St Germain', '05:54:00', '21:41:00', '28/05'),
(149, 'St Aymard', '05:54:00', '21:42:00', '29/05'),
(150, 'St Ferdinand', '05:53:00', '21:43:00', '30/05'),
(151, 'VISITATION', '05:52:00', '21:44:00', '31/05'),
(152, 'St Justin', '05:51:00', '21:45:00', '01/06'),
(153, 'Ste Blandine', '05:51:00', '21:46:00', '02/06'),
(154, 'St Kévin', '05:50:00', '21:47:00', '03/06'),
(155, 'Ste Clotilde', '05:49:00', '21:48:00', '04/06'),
(156, 'St Igor', '05:49:00', '21:49:00', '05/06'),
(157, 'St Norbert', '05:48:00', '21:49:00', '06/06'),
(158, 'St Gilbert', '05:48:00', '21:50:00', '07/06'),
(159, 'St Médard', '05:48:00', '21:51:00', '08/06'),
(160, 'Ste Diane', '05:47:00', '21:52:00', '09/06'),
(161, 'St Landry', '05:47:00', '21:52:00', '10/06'),
(162, 'St Barnabé', '05:47:00', '21:53:00', '11/06'),
(163, 'St Guy', '05:46:00', '21:54:00', '12/06'),
(164, 'St Ant. de Padoue', '05:46:00', '21:54:00', '13/06'),
(165, 'St Elisée', '05:46:00', '21:55:00', '14/06'),
(166, 'Ste Germaine', '05:46:00', '21:55:00', '15/06'),
(167, 'St JF Régis', '05:46:00', '21:56:00', '16/06'),
(168, 'St Hervé', '05:46:00', '21:56:00', '17/06'),
(169, 'St Léonce', '05:46:00', '21:57:00', '18/06'),
(170, 'St Romuald', '05:46:00', '21:57:00', '19/06'),
(171, 'St Silvère', '05:46:00', '21:57:00', '20/06'),
(172, 'ETE', '05:46:00', '21:57:00', '21/06'),
(173, 'St Alban', '05:47:00', '21:57:00', '22/06'),
(174, 'Ste Audrey', '05:47:00', '21:58:00', '23/06'),
(175, 'St J.Batiste', '05:47:00', '21:58:00', '24/06'),
(176, 'St Prosper', '05:48:00', '21:58:00', '25/06'),
(177, 'St Anthelme', '05:48:00', '21:58:00', '26/06'),
(178, 'St Fernand', '05:48:00', '21:58:00', '27/06'),
(179, 'St Irénée', '05:49:00', '21:58:00', '28/06'),
(180, 'St Pierre/Paul', '05:49:00', '21:57:00', '29/06'),
(181, 'St Martial', '05:50:00', '21:57:00', '30/06'),
(182, 'St Thierry', '05:51:00', '21:57:00', '01/07'),
(183, 'St Martinien', '05:51:00', '21:57:00', '02/07'),
(184, 'St Thomas', '05:52:00', '21:56:00', '03/07'),
(185, 'St Florent', '05:53:00', '21:56:00', '04/07'),
(186, 'St Antoine', '05:53:00', '21:56:00', '05/07'),
(187, 'Ste Mariette', '05:54:00', '21:55:00', '06/07'),
(188, 'St Raoul', '05:55:00', '21:55:00', '07/07'),
(189, 'St Thibaut', '05:56:00', '21:54:00', '08/07'),
(190, 'Ste Amandine', '05:57:00', '21:54:00', '09/07'),
(191, 'St Ulrich', '05:57:00', '21:53:00', '10/07'),
(192, 'St Benoît', '05:58:00', '21:52:00', '11/07'),
(193, 'St Olivier', '05:59:00', '21:52:00', '12/07'),
(194, 'St Henri/Joël', '06:00:00', '21:51:00', '13/07'),
(195, 'FETE NATIONALE', '06:01:00', '21:50:00', '14/07'),
(196, 'St Donald', '06:02:00', '21:49:00', '15/07'),
(197, 'ND du Mt Carmel', '06:03:00', '21:48:00', '16/07'),
(198, 'Ste Charlotte', '06:05:00', '21:47:00', '17/07'),
(199, 'St Frédéric', '06:06:00', '21:46:00', '18/07'),
(200, 'St Arsène', '06:07:00', '21:45:00', '19/07'),
(201, 'Ste Marina', '06:08:00', '21:44:00', '20/07'),
(202, 'St Victor', '06:09:00', '21:43:00', '21/07'),
(203, 'Ste Marie-Madeleine', '06:10:00', '21:42:00', '22/07'),
(204, 'Ste Brigitte', '06:12:00', '21:41:00', '23/07'),
(205, 'Ste Christine', '06:13:00', '21:40:00', '24/07'),
(206, 'St Jacques', '06:14:00', '21:39:00', '25/07'),
(207, 'St Anne/Joachim', '06:15:00', '21:37:00', '26/07'),
(208, 'Ste Nathalie', '06:16:00', '21:36:00', '27/07'),
(209, 'St Samson', '06:18:00', '21:35:00', '28/07'),
(210, 'Ste Marthe', '06:19:00', '21:33:00', '29/07'),
(211, 'Ste Juliette', '06:20:00', '21:32:00', '30/07'),
(212, 'St Ignace de L.', '06:22:00', '21:30:00', '31/07'),
(213, 'St Alphonse', '06:23:00', '21:29:00', '01/08'),
(214, 'St Julien Eymard', '06:24:00', '21:28:00', '02/08'),
(215, 'Ste Lydie', '06:26:00', '21:26:00', '03/08'),
(216, 'St JM Vianney', '06:27:00', '21:24:00', '04/08'),
(217, 'St Abel', '06:28:00', '21:23:00', '05/08'),
(218, 'TRANSFIGURATION', '06:30:00', '21:21:00', '06/08'),
(219, 'St Gaétan', '06:31:00', '21:20:00', '07/08'),
(220, 'St Dominique', '06:33:00', '21:18:00', '08/08'),
(221, 'St Amour', '06:34:00', '21:16:00', '09/08'),
(222, 'St Laurent', '06:35:00', '21:15:00', '10/08'),
(223, 'Ste Claire', '06:37:00', '21:13:00', '11/08'),
(224, 'Ste Clarisse', '06:38:00', '21:11:00', '12/08'),
(225, 'St Hippolyte', '06:40:00', '21:10:00', '13/08'),
(226, 'St Evrard', '06:41:00', '21:08:00', '14/08'),
(227, 'ASSOMPTION', '06:42:00', '21:06:00', '15/08'),
(228, 'St Armel', '06:44:00', '21:04:00', '16/08'),
(229, 'Ste Hyacinthe', '06:45:00', '21:02:00', '17/08'),
(230, 'Ste Hélène', '06:47:00', '21:00:00', '18/08'),
(231, 'St Jean Eudes', '06:48:00', '20:59:00', '19/08'),
(232, 'St Bernard', '06:49:00', '20:57:00', '20/08'),
(233, 'St Christophe', '06:51:00', '20:55:00', '21/08'),
(234, 'St Fabrice', '06:52:00', '20:53:00', '22/08'),
(235, 'Ste Rose de L.', '06:54:00', '20:51:00', '23/08'),
(236, 'St Barthélemy', '06:55:00', '20:49:00', '24/08'),
(237, 'St Louis', '06:57:00', '20:47:00', '25/08'),
(238, 'Ste Natacha', '06:58:00', '20:45:00', '26/08'),
(239, 'Ste Monique', '06:59:00', '20:43:00', '27/08'),
(240, 'St Augustin', '07:01:00', '20:41:00', '28/08'),
(241, 'Ste Sabine', '07:02:00', '20:39:00', '29/08'),
(242, 'St Fiacre', '07:04:00', '20:37:00', '30/08'),
(243, 'St Aristide', '07:05:00', '20:35:00', '31/08'),
(244, 'St Gilles', '07:06:00', '20:33:00', '01/09'),
(245, 'Ste Ingrid', '07:08:00', '20:31:00', '02/09'),
(246, 'St Grégoire', '07:09:00', '20:29:00', '03/09'),
(247, 'Ste Rosalie', '07:11:00', '20:27:00', '04/09'),
(248, 'Ste Raïssa', '07:12:00', '20:25:00', '05/09'),
(249, 'St Bertrand', '07:14:00', '20:23:00', '06/09'),
(250, 'Ste Reine', '07:15:00', '20:21:00', '07/09'),
(251, 'NATIVITE DE ND', '07:16:00', '20:18:00', '08/09'),
(252, 'St Alain', '07:18:00', '20:16:00', '09/09'),
(253, 'Ste Inès', '07:19:00', '20:14:00', '10/09'),
(254, 'St Adelphe', '07:21:00', '20:12:00', '11/09'),
(255, 'St Apollinaire', '07:22:00', '20:10:00', '12/09'),
(256, 'St Aimé', '07:23:00', '20:08:00', '13/09'),
(257, 'LA Ste CROIX', '07:25:00', '20:06:00', '14/09'),
(258, 'St Roland', '07:26:00', '20:04:00', '15/09'),
(259, 'Ste Edith', '07:28:00', '20:02:00', '16/09'),
(260, 'St Renaud', '07:29:00', '19:59:00', '17/09'),
(261, 'Ste Nadège', '07:31:00', '19:57:00', '18/09'),
(262, 'Ste Emilie', '07:32:00', '19:55:00', '19/09'),
(263, 'St Davy', '07:33:00', '19:53:00', '20/09'),
(264, 'St Matthieu', '07:35:00', '19:51:00', '21/09'),
(265, 'St Maurice', '07:36:00', '19:49:00', '22/09'),
(266, 'AUTOMNE', '07:38:00', '19:47:00', '23/09'),
(267, 'Ste Thècle', '07:39:00', '19:44:00', '24/09'),
(268, 'St Hermann', '07:41:00', '19:42:00', '25/09'),
(269, 'St Côme/Damien', '07:42:00', '19:40:00', '26/09'),
(270, 'St Vincent de Pau', '07:43:00', '19:38:00', '27/09'),
(271, 'St Venceslas', '07:45:00', '19:36:00', '28/09'),
(272, 'St Michel/Gabriel', '07:46:00', '19:34:00', '29/09'),
(273, 'St Jérôme', '07:48:00', '19:32:00', '30/09'),
(274, 'Ste Th. de l''E. J', '07:49:00', '19:30:00', '01/10'),
(275, 'St Léger', '07:51:00', '19:28:00', '02/10'),
(276, 'St Gérard', '07:52:00', '19:25:00', '03/10'),
(277, 'St Fr. d''Assise', '07:54:00', '19:23:00', '04/10'),
(278, 'Ste Fleur', '07:55:00', '19:21:00', '05/10'),
(279, 'St Bruno', '07:57:00', '19:19:00', '06/10'),
(280, 'St Serge', '07:58:00', '19:17:00', '07/10'),
(281, 'Ste Pélagie', '08:00:00', '19:15:00', '08/10'),
(282, 'St Denis', '08:01:00', '19:13:00', '09/10'),
(283, 'St Ghislain', '08:03:00', '19:11:00', '10/10'),
(284, 'St Firmin', '08:04:00', '19:09:00', '11/10'),
(285, 'St Wilfrid', '08:06:00', '19:07:00', '12/10'),
(286, 'St Géraud', '08:07:00', '19:05:00', '13/10'),
(287, 'St Juste', '08:09:00', '19:03:00', '14/10'),
(288, 'Ste Th. d''Avila', '08:10:00', '19:01:00', '15/10'),
(289, 'Ste Edwige', '08:12:00', '18:59:00', '16/10'),
(290, 'St Baudouin', '08:13:00', '18:57:00', '17/10'),
(291, 'St Luc', '08:15:00', '18:55:00', '18/10'),
(292, 'St René', '08:16:00', '18:53:00', '19/10'),
(293, 'Ste Adeline', '08:18:00', '18:51:00', '20/10'),
(294, 'Ste Céline', '08:19:00', '18:50:00', '21/10'),
(295, 'Ste Elodie', '08:21:00', '18:48:00', '22/10'),
(296, 'St J. de Capistan', '08:22:00', '18:46:00', '23/10'),
(297, 'St Florentin', '08:24:00', '18:44:00', '24/10'),
(298, 'St Crespin', '08:26:00', '18:42:00', '25/10'),
(299, 'St Dimitri', '08:27:00', '18:40:00', '26/10'),
(300, 'Ste Emeline', '07:29:00', '17:39:00', '27/10'),
(301, 'St Simon/Jude', '07:30:00', '17:37:00', '28/10'),
(302, 'St Narcisse', '07:32:00', '17:35:00', '29/10'),
(303, 'Ste Bienvenue', '07:33:00', '17:34:00', '30/10'),
(304, 'St Quentin', '07:35:00', '17:32:00', '31/10'),
(305, 'TOUSSAINT', '07:37:00', '17:30:00', '01/11'),
(306, 'JOUR DES DEFUNTS', '07:38:00', '17:29:00', '02/11'),
(307, 'St Hubert', '07:40:00', '17:27:00', '03/11'),
(308, 'St Charles', '07:41:00', '17:25:00', '04/11'),
(309, 'Ste Sylvie', '07:43:00', '17:24:00', '05/11'),
(310, 'Ste Bertille', '07:45:00', '17:22:00', '06/11'),
(311, 'Ste Carine', '07:46:00', '17:21:00', '07/11'),
(312, 'St Geoffroy', '07:48:00', '17:19:00', '08/11'),
(313, 'St Théodore', '07:49:00', '17:18:00', '09/11'),
(314, 'St Léon', '07:51:00', '17:17:00', '10/11'),
(315, 'ARMISTICE 1918', '07:52:00', '17:15:00', '11/11'),
(316, 'St Christian', '07:54:00', '17:14:00', '12/11'),
(317, 'St Brice', '07:56:00', '17:13:00', '13/11'),
(318, 'St Sidoine', '07:57:00', '17:11:00', '14/11'),
(319, 'St Albert', '07:59:00', '17:10:00', '15/11'),
(320, 'Ste Marguerite', '08:00:00', '17:09:00', '16/11'),
(321, 'Ste Elisabeth', '08:02:00', '17:08:00', '17/11'),
(322, 'Ste Aude', '08:03:00', '17:07:00', '18/11'),
(323, 'St Tanguy', '08:05:00', '17:06:00', '19/11'),
(324, 'St Edmond', '08:06:00', '17:05:00', '20/11'),
(325, 'Prés. Marie', '08:08:00', '17:04:00', '21/11'),
(326, 'Ste Cécile', '08:09:00', '17:03:00', '22/11'),
(327, 'St Clément', '08:11:00', '17:02:00', '23/11'),
(328, 'Christ Roi', '08:12:00', '17:01:00', '24/11'),
(329, 'Ste Catherine', '08:14:00', '17:00:00', '25/11'),
(330, 'Ste Delphine', '08:15:00', '16:59:00', '26/11'),
(331, 'St Séverin', '08:16:00', '16:59:00', '27/11'),
(332, 'St J. de la March', '08:18:00', '16:58:00', '28/11'),
(333, 'St Saturnin', '08:19:00', '16:57:00', '29/11'),
(334, 'St André', '08:21:00', '16:57:00', '30/11'),
(335, 'Ste Florence', '08:22:00', '16:56:00', '01/12'),
(336, 'Ste Viviane', '08:23:00', '16:56:00', '02/12'),
(337, 'St François Xavier', '08:24:00', '16:55:00', '03/12'),
(338, 'Ste Barbara', '08:26:00', '16:55:00', '04/12'),
(339, 'St Gérald', '08:27:00', '16:54:00', '05/12'),
(340, 'St Nicolas', '08:28:00', '16:54:00', '06/12'),
(341, 'St Ambroise', '08:29:00', '16:54:00', '07/12'),
(342, 'Ste Elfried', '08:30:00', '16:54:00', '08/12'),
(343, 'Imm. Conception', '08:31:00', '16:53:00', '09/12'),
(344, 'St Romaric', '08:32:00', '16:53:00', '10/12'),
(345, 'St Daniel', '08:33:00', '16:53:00', '11/12'),
(346, 'Ste JF de Chantal', '08:34:00', '16:53:00', '12/12'),
(347, 'Ste Lucie', '08:35:00', '16:53:00', '13/12'),
(348, 'Ste Odile', '08:36:00', '16:53:00', '14/12'),
(349, 'Ste Ninon', '08:37:00', '16:54:00', '15/12'),
(350, 'Ste Alice', '08:38:00', '16:54:00', '16/12'),
(351, 'St Gaël', '08:38:00', '16:54:00', '17/12'),
(352, 'St Gatien', '08:39:00', '16:54:00', '18/12'),
(353, 'St Urbain', '08:40:00', '16:55:00', '19/12'),
(354, 'St Théophile', '08:40:00', '16:55:00', '20/12'),
(355, 'St P. Canisius', '08:41:00', '16:56:00', '21/12'),
(356, 'HIVER', '08:41:00', '16:56:00', '22/12'),
(357, 'St Armand', '08:42:00', '16:57:00', '23/12'),
(358, 'Ste Adèle', '08:42:00', '16:57:00', '24/12'),
(359, 'NOEL', '08:42:00', '16:58:00', '25/12'),
(360, 'St Etienne', '08:43:00', '16:59:00', '26/12'),
(361, 'St Jean l''Evangeliste', '08:43:00', '16:59:00', '27/12'),
(362, 'St Innocents', '08:43:00', '17:00:00', '28/12'),
(363, 'Ste Famille', '08:43:00', '17:01:00', '29/12'),
(364, 'St Roger', '08:44:00', '17:02:00', '30/12'),
(365, 'St Sylvestre', '08:44:00', '17:03:00', '31/12'),
(366, 'St Auguste, Augusta', '07:34:00', '18:33:00', '29/02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'root', '30d69d863dde81562ce277fbc0a3cf18'),
(2, 'jonathan', '78842815248300fa6ae79f7776a5080a'),
(3, 'admin', 'e098947e8d9b3e657c1c21808d1201ab'),
(4, 'bde', 'e016e1eeef801863e5af277e32ab99ae');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `animations`
--
ALTER TABLE `animations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Index pour la table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `config_tv`
--
ALTER TABLE `config_tv`
  ADD PRIMARY KEY (`item_type`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news_bde`
--
ALTER TABLE `news_bde`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `saint`
--
ALTER TABLE `saint`
  ADD PRIMARY KEY (`Jour`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `animations`
--
ALTER TABLE `animations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT pour la table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `news_bde`
--
ALTER TABLE `news_bde`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;