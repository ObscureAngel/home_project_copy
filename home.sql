-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 08 Mai 2017 à 16:22
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `home`
--

-- --------------------------------------------------------

--
-- Structure de la table `mov_audio`
--

DROP TABLE IF EXISTS `mov_audio`;
CREATE TABLE IF NOT EXISTS `mov_audio` (
  `code_audio` int(11) NOT NULL,
  `design_audio` char(30) NOT NULL,
  PRIMARY KEY (`code_audio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mov_audio`
--

INSERT INTO `mov_audio` (`code_audio`, `design_audio`) VALUES
(10, 'Français'),
(11, 'Anglais'),
(20, 'Japonais'),
(30, 'Hebreu');

-- --------------------------------------------------------

--
-- Structure de la table `mov_film_serie`
--

DROP TABLE IF EXISTS `mov_film_serie`;
CREATE TABLE IF NOT EXISTS `mov_film_serie` (
  `ref_type` char(2) NOT NULL,
  `ref_video` int(11) NOT NULL,
  `titre` char(60) NOT NULL,
  `duree_en_min` int(11) NOT NULL,
  PRIMARY KEY (`ref_type`,`ref_video`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mov_film_serie`
--

INSERT INTO `mov_film_serie` (`ref_type`, `ref_video`, `titre`, `duree_en_min`) VALUES
('FA', 1, 'Dragons 2', 2, 90, 90, 22, 101),
('FA', 2, 'Frozen', 13, 10, 90, 20, 102),
('FA', 3, 'Puss in Boots', 2, 10, 90, 10, 90),
('FA', 4, 'Rebelle', 6, NULL, 10, 10, 94),
('FA', 5, 'L Age de glace 4', 3, 10, 10, 10, 87),
('FA', 6, 'Paddington', 3, 10, 10, 10, 95),
('FA', 7, 'Astérix et le Domaine des Dieux', 3, NULL, 10, 10, 85),
('FA', 8, 'La Grande Aventure Lego', 2, NULL, 10, 10, 100),
('FA', 9, 'Le Voyage de Chihiro', 6, 10, 10, 10, 124),
('FA', 10, 'Dragons', 2, 90, 90, 22, 97),
('FN', 1, '50 Nuances de Grey', 97, 10, 10, 10, 125),
('FN', 2, 'Avatar (extended)', 9, 90, 10, 21, 178),
('FN', 3, 'Battleship', 9, 10, 10, 10, 131),
('FN', 7, 'Die hard 4', 1, NULL, 10, 10, 123),
('FN', 8, 'Edge of Tomorrow', 7, NULL, 10, 0, 113),
('FN', 9, 'En plein tempète', 10, NULL, 10, 0, 124),
('FN', 10, 'Fiston', 3, NULL, 10, 10, 88),
('FN', 11, 'Imitation game', 7, 10, 10, 10, 113),
('FN', 12, 'Intouchables', 4, NULL, 10, 10, 112),
('FN', 13, 'Johnny English', 3, 10, 10, 20, 87),
('FN', 14, 'Johnny English 2 – Le retour', 3, 90, 10, 10, 97),
('FN', 15, 'L odyssée de Pi', 2, 10, 10, 20, 126),
('FN', 16, 'La nuit au Musée 3 - Le secret du pharaon', 6, 10, 10, 10, 97),
('FN', 17, 'La Planète des singes – L affrontement', 9, 10, 10, 10, 130),
('FN', 19, 'Les Profs 1', 3, NULL, 10, 0, 84),
('FN', 20, 'Lucy', 9, 10, 10, 10, 89),
('FN', 21, 'Papa ou maman', 3, NULL, 10, 10, 84),
('FN', 22, 'Q', 97, NULL, 10, 0, 102),
('FN', 23, 'Retour vers le futur 1', 9, 10, 90, 10, 116),
('FN', 24, 'Retour vers le futur 2', 9, 10, 90, 10, 108),
('FN', 25, 'Retour vers le futur 3', 9, 10, 90, 10, 118),
('FN', 26, 'Taxi 1', 3, NULL, 10, 0, 104),
('FN', 27, 'Taxi 2', 3, NULL, 10, 0, 84),
('FN', 28, 'Taxi 3', 3, NULL, 10, 0, 83),
('FN', 29, 'Transformers 4 - Age of extinction', 9, NULL, 10, 10, 165),
('FN', 30, 'X-Men – Days of Future Past', 9, 10, 10, 10, 131),
('FN', 31, 'Hunger Games 1', 7, 10, 10, NULL, 142),
('FN', 32, 'Hunger Games 2 – L embrasement', 7, 90, 90, 21, 146),
('FN', 33, 'Hunger Games 3 – La révolte partie 1', 7, 10, 90, 21, 123),
('FN', 35, 'Divergente 1', NULL, 90, 90, 20, 139),
('FN', 36, 'Divergente 2', NULL, 90, 90, 20, 118),
('FN', 37, 'Le Labyrinthe', 2, 10, 10, 10, 113),
('FN', 38, 'Le Labyrinthe – La terre brulée', 2, NULL, 10, 20, 131),
('FN', 40, 'Pacific Rim', 9, 90, 90, NULL, 131),
('FN', 41, 'La voleuse de livre', 16, 90, 90, 10, 131),
('FN', 42, 'Underworld 1', NULL, 90, 90, 20, 133),
('FN', 44, 'Underworld 3 Ryse of the Lycans', NULL, 90, 90, 21, 92),
('FN', 45, 'Le Hobbit – La Bataille des Cinq Armées', 7, 90, 90, 21, 144),
('FN', 46, 'Avenger – L ère d Ultron', 9, 90, 90, 21, 141),
('FN', 47, 'Captain America 2 The Winter Soldier', 1, 10, 90, 21, 135),
('FN', 48, 'Bienvenue chez les chtis', 3, NULL, 10, 21, 106),
('FN', 51, 'The Mask', 3, NULL, 10, 22, 101),
('FN', 52, 'Le Monde de Narnia 1', 6, 10, 90, 20, 144),
('FN', 53, 'Le Monde de Narnia 2', 6, 10, 90, 20, 149),
('FN', 54, 'Le Monde de Narnia 3', 6, 10, 90, 20, 112),
('SA', 1, 'Accel World', 5, 10, 20, 10, 25),
('SA', 2, 'Amagi Brillant Park', 13, 10, 20, NULL, 25),
('SA', 3, 'Ane Koi', 99, 10, 20, NULL, 25),
('SA', 4, 'Baka to Test to Shoukanjuu', NULL, 10, 20, NULL, 25),
('SA', 5, 'Bishoujo Hyouryuuki', 99, 10, 20, NULL, 25),
('SA', 6, 'Boku wa Tomodachi ga Suku nai', 98, 10, 20, NULL, 25),
('SA', 7, 'DanMachi', 2, 10, 20, 10, 25),
('SA', 8, 'Fate Kaleid Liner Prisma Illya', 98, 10, 20, NULL, 25),
('SA', 9, 'Fate Zero', 13, 10, 20, NULL, 25),
('SA', 10, 'Haiyore! Nyaruko-san', 13, 10, 20, NULL, 25),
('SA', 11, 'Hentai Ouji to Warawanai Neko', 98, 10, 20, 20, 25),
('SA', 12, 'Imouto Paradise !', 99, 10, 20, NULL, 25),
('SA', 13, 'JK to Inkou Kyoushi 4', 99, 10, 20, NULL, 25),
('SA', 14, 'Love 2 Quad', 99, 10, 20, NULL, 25),
('SA', 15, 'Non non biyori', 96, 10, 20, 10, 25),
('SA', 16, 'God only knows', 13, 10, 20, 10, 25),
('SA', 17, 'Seto no Hanayome', 14, 10, 20, 10, 25),
('SA', 18, 'Shugo Chara !', 13, 10, 20, 10, 25),
('SA', 19, 'Sora no Otoshimono', 1, 10, 20, NULL, 25),
('SA', 20, 'Sword Art Online', 5, 10, 20, NULL, 25),
('SA', 21, 'Tokyo Ghoul', 12, 10, 20, NULL, 25),
('SA', 22, 'Valkyrie Drive Mermaid', 98, 10, 20, 10, 25),
('SA', 23, 'Wakfu', 2, NULL, 10, NULL, 25),
('SA', 24, 'Dragons', 2, NULL, 10, 0, 25),
('SA', 25, 'Mayo Chiki!', 98, 10, 20, 20, 25),
('SA', 26, 'Asobi ni Iku yo !', 98, 10, 20, 20, 25),
('SA', 27, 'Kiss X Sis', 98, 10, 20, 10, 25),
('SA', 28, 'Yosuga no Sora', 98, 10, 20, 20, 25),
('SA', 29, 'Fate Stay Night', 13, 10, 20, 10, 25),
('SA', 30, 'Shomin Sample', 98, 10, 20, 10, 25),
('SA', 31, 'Infinite Stratos', 98, 10, 20, NULL, 25),
('SA', 32, 'Kämpfer', 98, 10, 20, 0, 25),
('SA', 33, 'SteinsGate', NULL, 10, 20, 20, 25);

-- --------------------------------------------------------

--
-- Structure de la table `mov_genre`
--

DROP TABLE IF EXISTS `mov_genre`;
CREATE TABLE IF NOT EXISTS `mov_genre` (
  `code_genre` int(11) NOT NULL,
  `libelle_genre` char(20) NOT NULL,
  PRIMARY KEY (`code_genre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mov_genre`
--

INSERT INTO `mov_genre` (`code_genre`, `libelle_genre`) VALUES
(1, 'Action'),
(2, 'Aventure'),
(3, 'Comedie'),
(4, 'Drame'),
(6, 'Fantastique'),
(7, 'Guerre'),
(8, 'Policier'),
(9, 'Science-Fiction'),
(10, 'Suspens'),
(11, 'Epouvante'),
(12, 'Horreur'),
(13, 'Magie'),
(14, 'Mermaid'),
(5, 'Jeu Video'),
(15, 'Documentaire'),
(16, 'Histoire'),
(17, 'Cartoon'),
(18, 'Contes'),
(96, 'Lolicon'),
(97, 'Erotique'),
(98, 'Ecchi'),
(99, 'Hentai');

-- --------------------------------------------------------

--
-- Structure de la table `mov_pays`
--

DROP TABLE IF EXISTS `mov_pays`;
CREATE TABLE IF NOT EXISTS `mov_pays` (
  `code_pays` varchar(3) NOT NULL,
  `libelle_pays` varchar(50) NOT NULL,
  `code_continent` varchar(3) NOT NULL,
  PRIMARY KEY (`code_pays`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mov_pays`
--

INSERT INTO `mov_pays` (`code_pays`, `libelle_pays`, `code_continent`) VALUES
('AFG', 'AFGHANISTAN', ''),
('ZAF', 'AFRIQUE DU SUD', ''),
('ALB', 'ALBANIE', ''),
('DZA', 'ALGERIE', ''),
('DEU', 'ALLEMAGNE', ''),
('AND', 'ANDORRE', ''),
('AGO', 'ANGOLA', ''),
('AIA', 'ANGUILLA', ''),
('ATA', 'ANTARTIQUE', ''),
('ATG', 'ANTIGUA ET BARBUDA', ''),
('ANT', 'ANTILLES NEERLANDAISES', ''),
('SAU', 'ARABIE SAOUDITE', ''),
('ARG', 'ARGENTINE', ''),
('ARM', 'ARMENIE', ''),
('ABW', 'ARUBA', ''),
('AUS', 'AUSTRALIE', ''),
('AUT', 'AUTRICHE', ''),
('AZE', 'AZERBAIDJAN', ''),
('BHS', 'BAHAMAS', ''),
('BHR', 'BAHREIN', ''),
('BGD', 'BANGLADESH', ''),
('BRB', 'BARBADE', ''),
('BEL', 'BELGIQUE', ''),
('BLZ', 'BELIZE', ''),
('BMU', 'BERMUDES', ''),
('BTN', 'BHOUTANT', ''),
('BOL', 'BOLIVIE', ''),
('BIH', 'BOSNIE ET HERZEGOVINE', ''),
('BWA', 'BOTSWANA', ''),
('BVT', 'BOUVET ISLAND', ''),
('BRN', 'BRUNEI', ''),
('BRA', 'BRESIL', ''),
('BGR', 'BULGARIE', ''),
('BFA', 'BURKINA FASO', ''),
('BDI', 'BURUNDI', ''),
('BLR', 'BIELORUSSIE', ''),
('BEN', 'BENIN', ''),
('KHM', 'CAMBODGE', ''),
('CMR', 'CAMEROUN', ''),
('CAN', 'CANADA', ''),
('CPV', 'CAP VERT', ''),
('CHL', 'CHILI', ''),
('CHN', 'CHINE', ''),
('CYP', 'CHYPRE', ''),
('VAT', 'VATICAN', ''),
('COL', 'COLOMBIE', ''),
('COM', 'COMORES', ''),
('COG', 'REPUBLIQUE DU CONGO', ''),
('COD', 'REP DEM DU CONGO', ''),
('PRK', 'COREE DU NORD', ''),
('KOR', 'COREE DU SUD', ''),
('CRI', 'COSTA RICA', ''),
('HRV', 'CROATIE', ''),
('CUB', 'CUBA', ''),
('CUW', 'CURACAO', ''),
('CIV', 'COTE D''IVOIRE', ''),
('DNK', 'DANEMARK', ''),
('DJI', 'DJIBOUTI', ''),
('DMA', 'DOMINIQUE', ''),
('EGY', 'EGYPTE', ''),
('ARE', 'EMIRATS ARABES UNIS', ''),
('ECU', 'EQUATEUR', ''),
('ERI', 'ERYTHREE', ''),
('ESP', 'ESPAGNE', ''),
('EST', 'ESTONE', ''),
('USA', 'ETATS-UNIS', ''),
('ETH', 'ETHIOPIE', ''),
('FJI', 'FIDJI', ''),
('FIN', 'FINLANDE', ''),
('FRA', 'FRANCE', ''),
('GAB', 'GABON', ''),
('GMB', 'GAMBIE', ''),
('PSE', 'GAZA', ''),
('GHA', 'GHANA', ''),
('GIB', 'GIBRALTAR', ''),
('GRD', 'GRENADE', ''),
('GRL', 'GREOENLAND', ''),
('GRC', 'GRECE', ''),
('GLP', 'GUADELOUPE', ''),
('GUM', 'GUAM', ''),
('GTM', 'GUATEMALA', ''),
('GIN', 'GUINEE', ''),
('GNB', 'GUINEE BISSAU', ''),
('GNQ', 'GUINEE EQUATORIALE', ''),
('GUY', 'GUYANE', ''),
('GUF', 'GUYANE FRANCAISE', ''),
('GEO', 'GEORGIE', ''),
('SGS', 'GEORGIE DU SUD', ''),
('HTI', 'HAITI', ''),
('HND', 'HONDURAS', ''),
('HKG', 'HONG-KONG', ''),
('HUN', 'HONGRIE', ''),
('IMN', 'ILE DE MAN', ''),
('CYM', 'ILES CAIMAN', ''),
('CXR', 'ILES CHRISTMAS', ''),
('CCK', 'ILES COCOS', ''),
('COK', 'ILES COOK', ''),
('FRO', 'ILES FEROE', ''),
('GGY', 'ILES GUERNESEY', ''),
('HMD', 'ILES HERDET MCDONALD', ''),
('FLK', 'ILES MALOUINES'),
('MNP', 'ILES MARIANNES DU NORD'),
('MHL', 'ILES MARSHALL'),
('MUS', 'ILES MAURICE'),
('NFK', 'ILES NORFOLK'),
('SLB', 'ILES SALOMON'),
('TCA', 'ILES TURQUES ET CAIQUE'),
('VIR', 'ILES VIERGES DES USA'),
('VGB', 'ILES VIERGES DU GB'),
('IND', 'INDE'),
('IDN', 'INDONESIE'),
('IRN', 'IRAN'),
('IRQ', 'IRAQ'),
('IRL', 'IRLANDE'),
('ISL', 'ISLANDE'),
('ISR', 'ISRAEL'),
('ITA', 'ITALIE'),
('JAM', 'JAMAIQUE'),
('JPN', 'JAPON'),
('JEY', 'JERSEY'),
('JOR', 'JORDANIE'),
('KAZ', 'KAZAKHSTAN'),
('KEN', 'KENYA'),
('KGZ', 'KIRGHISTAN'),
('KIR', 'KIRIBATI'),
('XKO', 'KOSOVO'),
('KWT', 'KOWEIT'),
('LAO', 'LAOS'),
('LSO', 'LESOTHO'),
('LVA', 'LETTONIE'),
('LBN', 'LIBAN'),
('LBY', 'LIBYE'),
('LBR', 'LIBERIA'),
('LIE', 'LIECHTENSTEIN'),
('LTU', 'LITUANIE'),
('LUX', 'LUXEMBOURG'),
('MAC', 'MACAO'),
('MKD', 'MACEDOINE'),
('MDG', 'MADAGASCAR'),
('MYS', 'MALAISIE'),
('MWI', 'MALAWI'),
('MDV', 'MALDIVES'),
('MLI', 'MALI'),
('MLT', 'MALTE'),
('MAR', 'MAROC'),
('MTQ', 'MARTINIQUE'),
('MRT', 'MAURITANIE'),
('MYT', 'MAYOTTE'),
('MEX', 'MEXIQUE'),
('FSM', 'MICRONESIE'),
('MDA', 'MOLDAVIE'),
('MCO', 'MONACO'),
('MNG', 'MONGOLIE'),
('MSR', 'MONTSERRAT'),
('MNE', 'MONTENEGRO'),
('MOZ', 'MOZAMBIQUE'),
('MMR', 'BIRMANIE'),
('NAM', 'NAMIBIE'),
('NRU', 'NAURU'),
('NIC', 'NICARAGUA'),
('NER', 'NIGER'),
('NGA', 'NIGERIA'),
('NIU', 'NIUE'),
('NOR', 'NORVEGE'),
('NCL', 'NOUVELLE CALEDONIE'),
('NZL', 'NOUVELLE ZELANDE'),
('NPL', 'NEPAL'),
('OMN', 'OMAN'),
('UGA', 'OUGANDA'),
('UZB', 'OUZBEKISTAN'),
('PAK', 'PAKISTAN'),
('PLW', 'PALAU'),
('PAN', 'PANAMA'),
('PNG', 'PAPOUASIE NOUVELLE GUINEE'),
('PRY', 'PARAGUAY'),
('NLD', 'PAYS-BAS'),
('PHL', 'PHILIPPINES'),
('PCN', 'PITCAIRN'),
('POL', 'POLOGNE'),
('PYF', 'POLYNESIE FRANCAISE'),
('PRI', 'PORTO RICO'),
('PRT', 'PORTUGAL'),
('PER', 'PEROU'),
('QAT', 'QATAR'),
('ROU', 'ROUMANIE'),
('GBR', 'ROYAUME UNI'),
('RUS', 'RUSSIE'),
('RWA', 'RWANDA'),
('CAF', 'REPUBLIQUE CENTRAFRICAINE'),
('DOM', 'REPUBLIQUE DOMINICAINE'),
('CZE', 'REPUBLIQUE TCHEQUE'),
('REU', 'REUNION'),
('ESH', 'SAHARA OCCIDENTAL'),
('BLM', 'SAINT BARTHELEMY'),
('SHN', 'SAINT HELENE');

-- --------------------------------------------------------

--
-- Structure de la table `mov_continent`
--

DROP TABLE IF EXISTS `mov_continent`;
CREATE TABLE IF NOT EXISTS `mov_continent` (
  `code_continent` varchar(3) NOT NULL,
  `libelle_continent` varchar(32) NOT NULL,
  PRIMARY KEY (`code_continent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mov_pays`
--

INSERT INTO `mov_continent` (`code_continent`, `libelle_continent`) VALUES
('EUR', 'EUROPE'),
('AFR', 'AFRIQUE'),
('ASI', 'ASIE'),
('OCE', 'OCEANIE'),
('AME', 'AMERIQUE');

-- --------------------------------------------------------

--
-- Structure de la table `mov_pers_film`
--

DROP TABLE IF EXISTS `mov_pers_film`;
CREATE TABLE IF NOT EXISTS `mov_pers_film` (
  `ref_pers` varchar(8) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `nationalite` varchar(32) NOT NULL,
  PRIMARY KEY (`ref_pers`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mov_pers_inscrit`
--

DROP TABLE IF EXISTS `mov_pers_inscrit`;
CREATE TABLE IF NOT EXISTS `mov_pers_inscrit` (
  `username` char(32) NOT NULL,
  `psswrd` char(16) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mov_pers_inscrit`
--

INSERT INTO `mov_pers_inscrit` (`username`, `psswrd`) VALUES
('admin', 'admin'),
('test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `mov_quality`
--

DROP TABLE IF EXISTS `mov_quality`;
CREATE TABLE IF NOT EXISTS `mov_quality` (
  `code_quality` int(11) NOT NULL,
  `design_qual` char(20) NOT NULL,
  PRIMARY KEY (`code_quality`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mov_quality`
--

INSERT INTO `mov_quality` (`code_quality`, `design_qual`) VALUES
(10, '720P x264'),
(20, '1080P x264'),
(21, '1080P x265'),
(22, '1080P HDLight'),
(12, '720P HDLight'),
(11, '720P x265'),
(0, 'DVD');

-- --------------------------------------------------------

--
-- Structure de la table `mov_subtitle`
--

DROP TABLE IF EXISTS `mov_subtitle`;
CREATE TABLE IF NOT EXISTS `mov_subtitle` (
  `code_subtitle` int(11) NOT NULL,
  `design_sub` char(30) NOT NULL,
  PRIMARY KEY (`code_subtitle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mov_subtitle`
--

INSERT INTO `mov_subtitle` (`code_subtitle`, `design_sub`) VALUES
(10, 'Français'),
(11, 'Anglais'),
(20, 'Japonais'),
(30, 'Hebreu'),
(90, 'Francais/Anglais');

-- --------------------------------------------------------

--
-- Structure de la table `mov_type_vid`
--

DROP TABLE IF EXISTS `mov_type_vid`;
CREATE TABLE IF NOT EXISTS `mov_type_vid` (
  `ref_type` char(2) NOT NULL,
  `libelle_type` char(20) DEFAULT NULL,
  PRIMARY KEY (`ref_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mov_type_vid`
--

INSERT INTO `mov_type_vid` (`ref_type`, `libelle_type`) VALUES
('SA', 'Serie animee'),
('SN', 'Serie normale'),
('FN', 'Film normal'),
('FA', 'Film animation');

-- --------------------------------------------------------

--
-- Structure de la table `mov_privs_subscribe`
--

DROP TABLE IF EXISTS `mov_privs_subscribe`;
CREATE TABLE IF NOT EXISTS `mov_privs_subscribe` (
  `code_priv` int(11) NOT NULL,
  `label_priv` char(20) DEFAULT NULL,
  PRIMARY KEY (`code_priv`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mov_privs_subscribe`
--

INSERT INTO `mov_privs_subscribe` (`code_priv`, `label_priv`) VALUES 
(01, 'Administrator'),
(02, 'Moderator'),
(03, 'User');

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
