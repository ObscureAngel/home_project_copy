-- Base de données :  `home`
--
DROP DATABASE `home`;
CREATE DATABASE IF NOT EXISTS `home` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `home`;

-- --------------------------------------------------------

--
-- Structure de la table `hom_log_app`
--

-- DROP TABLE IF EXISTS `hom_log_app`;
CREATE TABLE IF NOT EXISTS `hom_log_app` (
  `log_id` 		int NOT NULL auto_increment ,
  `log_date`	datetime not null ,
  `user_id` 	varchar(15) NOT NULL ,
  `pageName` 	varchar(15) NOT NULL ,
  `operation` 	varchar(10) NOT NULL ,
  CONSTRAINT PK_HOM_LOG_APP PRIMARY KEY (`log_id`,`user_id`,`pageName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_log_bdd`
--

-- DROP TABLE IF EXISTS `hom_log_bdd`;
CREATE TABLE IF NOT EXISTS `hom_log_bdd` (
  `log_id` 		int NOT NULL auto_increment ,
  `user_bdd` 	varchar(10) NOT NULL ,
  `user_id` 	varchar(15) NOT NULL ,
  `operation` 	varchar(10) NOT NULL ,
  `tableName` 	varchar(15) NOT NULL ,
  `columnName` 	varchar(15) NOT NULL ,
  CONSTRAINT PK_HOM_LOG_BDD PRIMARY KEY (`log_id`,`user_bdd`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_med_be_cat`
--

-- DROP TABLE IF EXISTS `hom_med_be_cat`;
CREATE TABLE IF NOT EXISTS `hom_med_be_cat` (
  `code_category` 	int(11) NOT NULL,
  `season_id` 		int(11) NOT NULL,
  `res_id` 			int(11) NOT NULL,
  CONSTRAINT PK_HOM_MED_BE_CAT PRIMARY KEY (`code_category`,`season_id`,`res_id`),
  KEY `FK_hom_med_be_cat_res_id` (`res_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_med_category`
--

-- DROP TABLE IF EXISTS `hom_med_category`;
CREATE TABLE IF NOT EXISTS `hom_med_category` (
  `code_category` int(11) NOT NULL,
  `label_category` varchar(25) NOT NULL,
  PRIMARY KEY (`code_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_med_continent`
--

-- DROP TABLE IF EXISTS `hom_med_continent`;
CREATE TABLE IF NOT EXISTS `hom_med_continent` (
  `code_continent` varchar(3) NOT NULL,
  `label_continent` varchar(32) NOT NULL,
  PRIMARY KEY (`code_continent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_med_country`
--

-- DROP TABLE IF EXISTS `hom_med_country`;
CREATE TABLE IF NOT EXISTS `hom_med_country` (
  `code_country` varchar(3) NOT NULL,
  `label_country` varchar(50) NOT NULL,
  `code_continent` varchar(3) NOT NULL,
  PRIMARY KEY (`code_country`),
  KEY `FK_hom_med_country_code_continent` (`code_continent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_med_from`
--

-- DROP TABLE IF EXISTS `hom_med_from`;
CREATE TABLE IF NOT EXISTS `hom_med_from` (
  `res_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `code_country` varchar(3) NOT NULL,
  PRIMARY KEY (`res_id`,`code_country`),
  KEY `FK_hom_med_from_code_country` (`code_country`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_med_have`
--

-- DROP TABLE IF EXISTS `hom_med_have`;
CREATE TABLE IF NOT EXISTS `hom_med_have` (
  `res_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `code_people` int(11) NOT NULL,
  `code_role` int(11) NOT NULL,
  PRIMARY KEY (`res_id`,`season_id`,`code_people`,`code_role`),
  KEY `FK_hom_med_have_code_people` (`code_people`),
  KEY `FK_hom_med_have_code_role` (`code_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_med_language`
--

-- DROP TABLE IF EXISTS `hom_med_language`;
CREATE TABLE IF NOT EXISTS `hom_med_language` (
  `code_language` int(11) NOT NULL,
  `label_language` varchar(25) NOT NULL,
  PRIMARY KEY (`code_language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_med_listen`
--

-- DROP TABLE IF EXISTS `hom_med_listen`;
CREATE TABLE IF NOT EXISTS `hom_med_listen` (
  `res_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `code_language` int(11) NOT NULL,
  PRIMARY KEY (`res_id`,`season_id`,`code_language`),
  KEY `FK_hom_med_listen_code_language` (`code_language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_med_people`
--

-- DROP TABLE IF EXISTS `hom_med_people`;
CREATE TABLE IF NOT EXISTS `hom_med_people` (
  `code_people` int(11) NOT NULL,
  `name_people` varchar(25) NOT NULL,
  `firstname_people` varchar(25) DEFAULT NULL,
  `code_country` varchar(3) NOT NULL,
  PRIMARY KEY (`code_people`),
  KEY `FK_hom_med_people_code_country` (`code_country`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_med_quality`
--

-- DROP TABLE IF EXISTS `hom_med_quality`;
CREATE TABLE IF NOT EXISTS `hom_med_quality` (
  `code_quality` int(11) NOT NULL,
  `label_quality` varchar(25) NOT NULL,
  PRIMARY KEY (`code_quality`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_med_read`
--

-- DROP TABLE IF EXISTS `hom_med_read`;
CREATE TABLE IF NOT EXISTS `hom_med_read` (
  `res_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `code_language` int(11) NOT NULL,
  PRIMARY KEY (`res_id`,`season_id`,`code_language`),
  KEY `FK_hom_med_read_code_language` (`code_language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_med_resource`
--

-- DROP TABLE IF EXISTS `hom_med_resource`;
CREATE TABLE IF NOT EXISTS `hom_med_resource` (
  `res_id`		int(11) NOT NULL auto_increment,
  `title`		varchar(60) NOT NULL,
  `disabled`	boolean NOT NULL DEFAULT '0',
  `duration` 	int(11) DEFAULT NULL,
  `res_type` 	varchar(2) DEFAULT NULL,
  `season`		int(11) DEFAULT NULL,
  `on_air`	 	date DEFAULT NULL,
  `format` 		varchar(5) DEFAULT NULL,
  PRIMARY KEY (`res_id`),
  KEY `FK_hom_med_resource_res_type` (`res_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_med_role`
--

-- DROP TABLE IF EXISTS `hom_med_role`;
CREATE TABLE IF NOT EXISTS `hom_med_role` (
  `code_role` int(11) NOT NULL,
  `label_role` varchar(25) NOT NULL,
  PRIMARY KEY (`code_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_med_type`
--

-- DROP TABLE IF EXISTS `hom_med_type`;
CREATE TABLE IF NOT EXISTS `hom_med_type` (
  `res_type` varchar(2) NOT NULL,
  `label_type` varchar(25) NOT NULL,
  PRIMARY KEY (`res_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_med_watch`
--

-- DROP TABLE IF EXISTS `hom_med_watch`;
CREATE TABLE IF NOT EXISTS `hom_med_watch` (
  `res_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `code_quality` int(11) NOT NULL,
  PRIMARY KEY (`res_id`,`season_id`,`code_quality`),
  KEY `FK_hom_med_watch_code_quality` (`code_quality`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hom_usr_subscribe`
--

-- DROP TABLE IF EXISTS `hom_usr_subscribe`;
CREATE TABLE IF NOT EXISTS `hom_usr_subscribe` (
  `username` varchar(25) NOT NULL,
  `psswrd` varchar(32) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `hom_med_be_cat`
--
ALTER TABLE `hom_med_be_cat`
  ADD CONSTRAINT `FK_hom_med_be_cat_code_category` FOREIGN KEY (`code_category`) REFERENCES `hom_med_category` (`code_category`),
  ADD CONSTRAINT `FK_hom_med_be_cat_res_id` FOREIGN KEY (`res_id`) REFERENCES `hom_med_resource` (`res_id`);

--
-- Contraintes pour la table `hom_med_country`
--
ALTER TABLE `hom_med_country`
  ADD CONSTRAINT `FK_hom_med_country_code_continent` FOREIGN KEY (`code_continent`) REFERENCES `hom_med_continent` (`code_continent`);

--
-- Contraintes pour la table `hom_med_from`
--
ALTER TABLE `hom_med_from`
  ADD CONSTRAINT `FK_hom_med_from_code_country` FOREIGN KEY (`code_country`) REFERENCES `hom_med_country` (`code_country`),
  ADD CONSTRAINT `FK_hom_med_from_res_id` FOREIGN KEY (`res_id`) REFERENCES `hom_med_resource` (`res_id`);

--
-- Contraintes pour la table `hom_med_have`
--
ALTER TABLE `hom_med_have`
  ADD CONSTRAINT `FK_hom_med_have_code_people` FOREIGN KEY (`code_people`) REFERENCES `hom_med_people` (`code_people`),
  ADD CONSTRAINT `FK_hom_med_have_code_role` FOREIGN KEY (`code_role`) REFERENCES `hom_med_role` (`code_role`),
  ADD CONSTRAINT `FK_hom_med_have_res_id` FOREIGN KEY (`res_id`) REFERENCES `hom_med_resource` (`res_id`);

--
-- Contraintes pour la table `hom_med_listen`
--
ALTER TABLE `hom_med_listen`
  ADD CONSTRAINT `FK_hom_med_listen_code_language` FOREIGN KEY (`code_language`) REFERENCES `hom_med_language` (`code_language`),
  ADD CONSTRAINT `FK_hom_med_listen_res_id` FOREIGN KEY (`res_id`) REFERENCES `hom_med_resource` (`res_id`);

--
-- Contraintes pour la table `hom_med_people`
--
ALTER TABLE `hom_med_people`
  ADD CONSTRAINT `FK_hom_med_people_code_country` FOREIGN KEY (`code_country`) REFERENCES `hom_med_country` (`code_country`);

--
-- Contraintes pour la table `hom_med_read`
--
ALTER TABLE `hom_med_read`
  ADD CONSTRAINT `FK_hom_med_read_code_language` FOREIGN KEY (`code_language`) REFERENCES `hom_med_language` (`code_language`),
  ADD CONSTRAINT `FK_hom_med_read_res_id` FOREIGN KEY (`res_id`) REFERENCES `hom_med_resource` (`res_id`);

--
-- Contraintes pour la table `hom_med_resource`
--
ALTER TABLE `hom_med_resource`
  ADD CONSTRAINT `FK_hom_med_resource_res_type` FOREIGN KEY (`res_type`) REFERENCES `hom_med_type` (`res_type`);

--
-- Contraintes pour la table `hom_med_watch`
--
ALTER TABLE `hom_med_watch`
  ADD CONSTRAINT `FK_hom_med_watch_code_quality` FOREIGN KEY (`code_quality`) REFERENCES `hom_med_quality` (`code_quality`),
  ADD CONSTRAINT `FK_hom_med_watch_res_id` FOREIGN KEY (`res_id`) REFERENCES `hom_med_resource` (`res_id`);


-- --------------------------------------------------------

--
-- Contenu de la table `hom_med_continent`
--

INSERT INTO `hom_med_continent` (`code_continent`, `label_continent`) VALUES
('EUR', 'EUROPE'),
('AFR', 'AFRIQUE'),
('ASI', 'ASIE'),
('OCE', 'OCEANIE'),
('AME', 'AMERIQUE'),
('DIV', 'AUTRE'),
('M-O', 'MOYEN-ORIENT');

-- --------------------------------------------------------

--
-- Contenu de la table `hom_med_category`
--

INSERT INTO `hom_med_category` (`code_category`, `label_category`) VALUES
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
-- Contenu de la table `hom_med_country`
--

INSERT INTO `hom_med_country` (`code_country`, `code_continent`, `label_country`) VALUES
('AFG', 'M-O', 'AFGHANISTAN'),
('ZAF', 'AFR', 'AFRIQUE DU SUD'),
('ALB', 'EUR', 'ALBANIE'),
('DZA', 'AFR', 'ALGERIE'),
('DEU', 'EUR', 'ALLEMAGNE'),
('AND', 'EUR', 'ANDORRE'),
('AGO', 'AFR', 'ANGOLA'),
('AIA', 'DIV', 'ANGUILLA'),
('ATA', 'DIV', 'ANTARTIQUE'),
('ATG', 'DIV', 'ANTIGUA ET BARBUDA'),
('ANT', 'DIV', 'ANTILLES NEERLANDAISES'),
('SAU', 'M-O', 'ARABIE SAOUDITE'),
('ARG', 'AME', 'ARGENTINE'),
('ARM', 'DIV', 'ARMENIE'),
('ABW', 'DIV', 'ARUBA'),
('AUS', 'OCE', 'AUSTRALIE'),
('AUT', 'EUR', 'AUTRICHE'),
('AZE', 'DIV', 'AZERBAIDJAN'),
('BHS', 'DIV', 'BAHAMAS'),
('BHR', 'ASI', 'BAHREIN'),
('BGD', 'ASI', 'BANGLADESH'),
('BRB', 'DIV', 'BARBADE'),
('BEL', 'EUR', 'BELGIQUE'),
('BLZ', 'DIV', 'BELIZE'),
('BMU', 'DIV', 'BERMUDES'),
('BTN', 'DIV', 'BHOUTANT'),
('BOL', 'AME', 'BOLIVIE'),
('BIH', 'EUR', 'BOSNIE ET HERZEGOVINE'),
('BWA', 'AFR', 'BOTSWANA'),
('BVT', 'DIV', 'BOUVET ISLAND'),
('BRN', 'ASI', 'BRUNEI'),
('BRA', 'AME', 'BRESIL'),
('BGR', 'EUR', 'BULGARIE'),
('BFA', 'AFR', 'BURKINA FASO'),
('BDI', 'AFR', 'BURUNDI'),
('BLR', 'EUR', 'BIELORUSSIE'),
('BEN', 'AFR', 'BENIN'),
('KHM', 'ASI', 'CAMBODGE'),
('CMR', 'AFR', 'CAMEROUN'),
('CAN', 'AME', 'CANADA'),
('CPV', 'DIV', 'CAP VERT'),
('CHL', 'AME', 'CHILI'),
('CHN', 'ASI', 'CHINE'),
('CYP', 'EUR', 'CHYPRE'),
('VAT', 'EUR', 'VATICAN'),
('COL', 'AME', 'COLOMBIE'),
('COM', 'EUR', 'COMORES'),
('COG', 'AFR', 'REPUBLIQUE DU CONGO'),
('COD', 'AFR', 'REP DEM DU CONGO'),
('PRK', 'ASI', 'COREE DU NORD'),
('KOR', 'ASI', 'COREE DU SUD'),
('CRI', 'AME', 'COSTA RICA'),
('HRV', 'EUR', 'CROATIE'),
('CUB', 'AME', 'CUBA'),
('CUW', 'DIV', 'CURACAO'),
('CIV', 'AFR', 'COTE D''IVOIRE'),
('DNK', 'EUR', 'DANEMARK'),
('DJI', 'AFR', 'DJIBOUTI'),
('DMA', 'DIV', 'DOMINIQUE'),
('EGY', 'AFR', 'EGYPTE'),
('ARE', 'M-O', 'EMIRATS ARABES UNIS'),
('ECU', 'AME', 'EQUATEUR'),
('ERI', 'AFR', 'ERYTHREE'),
('ESP', 'EUR', 'ESPAGNE'),
('EST', 'EUR', 'ESTONIE'),
('USA', 'AME', 'ETATS-UNIS'),
('ETH', 'AFR', 'ETHIOPIE'),
('FJI', 'ASI', 'FIDJI'),
('FIN', 'EUR', 'FINLANDE'),
('FRA', 'EUR', 'FRANCE'),
('GAB', 'AME', 'GABON'),
('GMB', 'AFR', 'GAMBIE'),
('PSE', 'M-O', 'GAZA'),
('GHA', 'DIV', 'GHANA'),
('GIB', 'EUR', 'GIBRALTAR'),
('GRD', 'DIV', 'GRENADE'),
('GRL', 'DIV', 'GREOENLAND'),
('GRC', 'EUR', 'GRECE'),
('GLP', 'AME', 'GUADELOUPE'),
('GUM', 'DIV', 'GUAM'),
('GTM', 'DIV', 'GUATEMALA'),
('GIN', 'AFR', 'GUINEE'),
('GNB', 'AFR', 'GUINEE BISSAU'),
('GNQ', 'AFR', 'GUINEE EQUATORIALE'),
('GUY', 'AME', 'GUYANE'),
('GUF', 'AME', 'GUYANE FRANCAISE'),
('GEO', 'DIV', 'GEORGIE'),
('SGS', 'DIV', 'GEORGIE DU SUD'),
('HTI', 'AME', 'HAITI'),
('HND', 'DIV', 'HONDURAS'),
('HKG', 'ASI', 'HONG-KONG'),
('HUN', 'EUR', 'HONGRIE'),
('IMN', 'DIV', 'ILE DE MAN'),
('CYM', 'DIV', 'ILES CAIMAN'),
('CXR', 'DIV', 'ILES CHRISTMAS'),
('CCK', 'DIV', 'ILES COCOS'),
('COK', 'DIV', 'ILES COOK'),
('FRO', 'DIV', 'ILES FEROE'),
('GGY', 'DIV', 'ILES GUERNESEY'),
('HMD', 'DIV', 'ILES HERDET MCDONALD'),
('FLK', 'DIV', 'ILES MALOUINES'),
('MNP', 'DIV', 'ILES MARIANNES DU NORD'),
('MHL', 'DIV', 'ILES MARSHALL'),
('MUS', 'DIV', 'ILES MAURICE'),
('NFK', 'DIV', 'ILES NORFOLK'),
('SLB', 'DIV', 'ILES SALOMON'),
('TCA', 'DIV', 'ILES TURQUES ET CAIQUE'),
('VIR', 'DIV', 'ILES VIERGES DES USA'),
('VGB', 'DIV', 'ILES VIERGES DU GB'),
('IND', 'ASI', 'INDE'),
('IDN', 'ASI', 'INDONESIE'),
('IRN', 'ASI', 'IRAN'),
('IRQ', 'ASI', 'IRAQ'),
('IRL', 'EUR', 'IRLANDE'),
('ISL', 'EUR', 'ISLANDE'),
('ISR', 'ASI', 'ISRAEL'),
('ITA', 'EUR', 'ITALIE'),
('JAM', 'AFR', 'JAMAIQUE'),
('JPN', 'ASI', 'JAPON'),
('JEY', 'EUR', 'JERSEY'),
('JOR', 'ASI', 'JORDANIE'),
('KAZ', 'ASI', 'KAZAKHSTAN'),
('KEN', 'AFR', 'KENYA'),
('KGZ', 'ASI', 'KIRGHISTAN'),
('KIR', 'DIV', 'KIRIBATI'),
('XKO', 'DIV', 'KOSOVO'),
('KWT', 'M-O', 'KOWEIT'),
('LAO', 'AFR', 'LAOS'),
('LSO', 'AFR', 'LESOTHO'),
('LVA', 'EUR', 'LETTONIE'),
('LBN', 'AFR', 'LIBAN'),
('LBY', 'AFR', 'LIBYE'),
('LBR', 'AFR', 'LIBERIA'),
('LIE', 'EUR', 'LIECHTENSTEIN'),
('LTU', 'EUR', 'LITUANIE'),
('LUX', 'EUR', 'LUXEMBOURG'),
('MAC', 'ASI', 'MACAO'),
('MKD', 'EUR', 'MACEDOINE'),
('MDG', 'AFR', 'MADAGASCAR'),
('MYS', 'ASI', 'MALAISIE'),
('MWI', 'ASI', 'MALAWI'),
('MDV', 'EUR', 'MALDIVES'),
('MLI', 'AFR', 'MALI'),
('MLT', 'EUR', 'MALTE'),
('MAR', 'AFR', 'MAROC'),
('MTQ', 'AME', 'MARTINIQUE'),
('MRT', 'AFR', 'MAURITANIE'),
('MYT', 'AFR', 'MAYOTTE'),
('MEX', 'AME', 'MEXIQUE'),
('FSM', 'OCE', 'MICRONESIE'),
('MDA', 'EUR', 'MOLDAVIE'),
('MCO', 'EUR', 'MONACO'),
('MNG', 'ASI', 'MONGOLIE'),
('MSR', 'DIV', 'MONTSERRAT'),
('MNE', 'DIV', 'MONTENEGRO'),
('MOZ', 'AFR', 'MOZAMBIQUE'),
('MMR', 'ASI', 'BIRMANIE'),
('NAM', 'AFR', 'NAMIBIE'),
('NRU', 'DIV', 'NAURU'),
('NIC', 'AME', 'NICARAGUA'),
('NER', 'AFR', 'NIGER'),
('NGA', 'AFR', 'NIGERIA'),
('NIU', 'DIV', 'NIUE'),
('NOR', 'EUR', 'NORVEGE'),
('NCL', 'OCE', 'NOUVELLE CALEDONIE'),
('NZL', 'OCE', 'NOUVELLE ZELANDE'),
('NPL', 'ASI', 'NEPAL'),
('OMN', 'DIV', 'OMAN'),
('UGA', 'AFR', 'OUGANDA'),
('UZB', 'ASI', 'OUZBEKISTAN'),
('PAK', 'ASI', 'PAKISTAN'),
('PLW', 'DIV', 'PALAU'),
('PAN', 'AME', 'PANAMA'),
('PNG', 'ASI', 'PAPOUASIE NOUVELLE GUINEE'),
('PRY', 'AME', 'PARAGUAY'),
('NLD', 'EUR', 'PAYS-BAS'),
('PHL', 'OCE', 'PHILIPPINES'),
('PCN', 'DIV', 'PITCAIRN'),
('POL', 'EUR', 'POLOGNE'),
('PYF', 'OCE', 'POLYNESIE FRANCAISE'),
('PRI', 'AME', 'PORTO RICO'),
('PRT', 'EUR', 'PORTUGAL'),
('PER', 'AME', 'PEROU'),
('QAT', 'M-O', 'QATAR'),
('ROU', 'EUR', 'ROUMANIE'),
('GBR', 'EUR', 'ROYAUME UNI'),
('RUS', 'EUR', 'RUSSIE'),
('RWA', 'AFR', 'RWANDA'),
('CAF', 'AFR', 'REPUBLIQUE CENTRAFRICAINE'),
('DOM', 'AFR', 'REPUBLIQUE DOMINICAINE'),
('CZE', 'EUR', 'REPUBLIQUE TCHEQUE'),
('REU', 'AFR', 'REUNION'),
('ESH', 'AFR', 'SAHARA OCCIDENTAL'),
('BLM', 'DIV', 'SAINT BARTHELEMY'),
('SHN', 'DIV', 'SAINT HELENE');

-- --------------------------------------------------------

--
-- Contenu de la table `hom_usr_subscribe`
--

INSERT INTO `hom_usr_subscribe` (`username`, `psswrd`) VALUES
('admin', 'admin'),
('test', 'test');

-- --------------------------------------------------------

--
-- Contenu de la table `hom_med_quality`
--

INSERT INTO `hom_med_quality` (`code_quality`, `label_quality`) VALUES
(10, '720P h264'),
(20, '1080P h264'),
(21, '1080P h265'),
(22, '1080P HDLight'),
(12, '720P HDLight'),
(11, '720P h265'),
(0, 'DVD');

-- --------------------------------------------------------

--
-- Contenu de la table `hom_med_language`
--

INSERT INTO `hom_med_language` (`code_language`, `label_language`) VALUES
(10, 'Français'),
(11, 'Anglais'),
(12, 'Allemand'),
(13, 'Espagnol'),
(14, 'Portugais'),
(15, 'Italien'),
(16, 'Russe'),
(20, 'Japonais'),
(21, 'Chinois'),
(22, 'Koréen'),
(30, 'Hebreu');

-- --------------------------------------------------------

--
-- Contenu de la table `hom_med_type`
--

INSERT INTO `hom_med_type` (`res_type`, `label_type`) VALUES
('MU', 'Musique'),
('LI', 'Livre'),
('JE', 'Jeu video'),
('SA', 'Serie animee'),
('SN', 'Serie normale'),
('FN', 'Film normal'),
('FA', 'Film animation');

-- --------------------------------------------------------
--
-- Contenu de la table `hom_med_film_serie`
--

INSERT INTO `hom_med_resource` (`res_type`, `title`, `duration`, `season`) VALUES
('FA', 'Dragons 2', 101, 0),
('FA', 'Frozen', 102, 0),
('FA', 'Puss in Boots', 90, 0),
('FA', 'Rebelle', 94, 0),
('FA', 'L Age de glace 4', 87, 0),
('FA', 'Paddington', 95, 0),
('FA', 'Astérix et le Domaine des Dieux', 85, 0),
('FA', 'La Grande Aventure Lego', 100, 0),
('FA', 'Le Voyage de Chihiro', 124, 0),
('FA', 'Dragons', 97, 0),
('FN', '50 Nuances de Grey', 125, 0),
('FN', 'Avatar (extended)', 178, 0),
('FN', 'Battleship', 131, 0),
('FN', 'Die hard 4', 123, 0),
('FN', 'Edge of Tomorrow', 113, 0),
('FN', 'En plein tempète', 124, 0),
('FN', 'Fiston', 88, 0),
('FN', 'Imitation game', 113, 0),
('FN', 'Intouchables', 112, 0),
('FN', 'Johnny English', 87, 0),
('FN', 'Johnny English 2 – Le retour', 97, 0),
('FN', 'L odyssée de Pi', 126, 0),
('FN', 'La nuit au Musée 3 - Le secret du pharaon', 97, 0),
('FN', 'La Planète des singes – L affrontement', 130, 0),
('FN', 'Les Profs 1', 84, 0),
('FN', 'Lucy', 89, 0),
('FN', 'Papa ou maman', 84, 0),
('FN', 'Q', 102, 0),
('FN', 'Retour vers le futur 1', 116, 0),
('FN', 'Retour vers le futur 2', 108, 0),
('FN', 'Retour vers le futur 3', 118, 0),
('FN', 'Taxi 1', 104, 0),
('FN', 'Taxi 2', 84, 0),
('FN', 'Taxi 3', 83, 0),
('FN', 'Transformers 4 - Age of extinction', 165, 0),
('FN', 'X-Men – Days of Future Past', 131, 0),
('FN', 'Hunger Games 1', 142, 0),
('FN', 'Hunger Games 2 – L embrasement', 146, 0),
('FN', 'Hunger Games 3 – La révolte partie 1', 123, 0),
('FN', 'Divergente 1', 139, 0),
('FN', 'Divergente 2', 118, 0),
('FN', 'Le Labyrinthe', 113, 0),
('FN', 'Le Labyrinthe – La terre brulée', 131, 0),
('FN', 'Pacific Rim', 131, 0),
('FN', 'La voleuse de livre', 131, 0),
('FN', 'Le Hobbit – La Bataille des Cinq Armées', 144, 0),
('FN', 'Avenger – L ère d Ultron', 141, 0),
('FN', 'Captain America 2 The Winter Soldier', 135, 0),
('FN', 'Bienvenue chez les chtis', 106, 0),
('FN', 'The Mask', 101, 0),
('FN', 'Le Monde de Narnia 1', 144, 0),
('FN', 'Le Monde de Narnia 2', 149, 0),
('FN', 'Le Monde de Narnia 3', 112, 0),
('SA', 'Accel World', 25, 1),
('SA', 'Amagi Brillant Park', 25, 1),
('SA', 'Baka to Test to Shoukanjuu', 25, 1),
('SA', 'Boku wa Tomodachi ga Suku nai', 25, 2),
('SA', 'DanMachi', 25, 1),
('SA', 'Fate Kaleid Liner Prisma Illya', 25, 3),
('SA', 'Fate Zero', 25, 1),
('SA', 'Haiyore! Nyaruko-san', 25, 1),
('SA', 'Hentai Ouji to Warawanai Neko', 25, 1),
('SA', 'Non non biyori', 25, 1),
('SA', 'God only knows', 25, 1),
('SA', 'Seto no Hanayome', 25, 1),
('SA', 'Shugo Chara !', 25, 1),
('SA', 'Sora no Otoshimono', 25, 2),
('SA', 'Sword Art Online', 25, 2),
('SA', 'Tokyo Ghoul', 25, 2),
('SA', 'Valkyrie Drive Mermaid', 25, 1),
('SA', 'Wakfu', 25, 3),
('SA', 'Dragons', 25, 3),
('SA', 'Mayo Chiki!', 25, 1),
('SA', 'Asobi ni Iku yo !', 25, 1),
('SA', 'Kiss X Sis', 25, 1),
('SA', 'Yosuga no Sora', 25, 1),
('SA', 'Fate Stay Night', 25, 1),
('SA', 'Shomin Sample', 25, 1),
('SA', 'Infinite Stratos', 25, 2),
('SA', 'Kämpfer', 25, 1),
('SA', 'SteinsGate', 25, 1);