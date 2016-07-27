-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2016 at 09:14 PM
-- Server version: 5.5.42
-- PHP Version: 5.5.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `itn_quote_gen`
--

-- --------------------------------------------------------

--
-- Table structure for table `air_lcl_city_zone_table`
--

CREATE TABLE `air_lcl_city_zone_table` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zone` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `air_lcl_city_zone_table`
--

INSERT INTO `air_lcl_city_zone_table` (`id`, `city`, `zone`) VALUES
(1, 'Acton', 4),
(2, 'Alliston', 4),
(3, 'Amhertsburg', 7),
(4, 'Ancaster', 4),
(5, 'Angus', 4),
(6, 'Aurora', 3),
(7, 'Arthur', 5),
(8, 'Aylmer', 5),
(9, 'Ayr', 4),
(10, 'Brampton', 1),
(11, 'Barrie', 4),
(12, 'Beamsville', 4),
(13, 'Beaverton', 6),
(14, 'Beeton', 4),
(15, 'Belleville', 6),
(16, 'Binbrook', 4),
(17, 'Blenheim', 7),
(18, 'Bobcaygeon', 7),
(19, 'Bolton', 3),
(20, 'Bowmanville', 5),
(21, 'Bradford', 4),
(22, 'Brantford', 4),
(23, 'Breslau', 4),
(24, 'Burlington', 3),
(25, 'Caledonia', 4),
(26, 'Cambridge', 4),
(27, 'Campbellford', 6),
(28, 'Campbellville', 3),
(29, 'Chatham', 7),
(30, 'Chepstow', 7),
(31, 'Clarksburg', 6),
(32, 'Cobourg', 6),
(33, 'Colborne', 6),
(34, 'Collingwood', 6),
(35, 'Concord', 1),
(36, 'Cookstown', 4),
(37, 'Dorchester', 5),
(38, 'Dresden', 7),
(39, 'Dundas', 4),
(40, 'Dunnville', 6),
(41, 'Elgin Mills', 3),
(42, 'Elmira', 4),
(43, 'Embro', 5),
(44, 'Erin', 4),
(45, 'Essex', 7),
(46, 'Etobicoke', 1),
(47, 'Exeter', 7),
(48, 'Fergus', 5),
(49, 'Fort Erie', 5),
(50, 'Georgetown', 3),
(51, 'Goderich', 7),
(52, 'Gormley', 3),
(53, 'Grand Valley', 5),
(54, 'Gravenhurst', 7),
(55, 'Grimsby', 4),
(56, 'Guelph', 4),
(57, 'Hagersville', 4),
(58, 'Halton Hills', 4),
(59, 'Hanover', 5),
(60, 'Hamilton', 4),
(61, 'Hensall', 6),
(62, 'Ingersol', 5),
(63, 'Inwood', 7),
(64, 'Jarvis', 5),
(65, 'Jordan', 5),
(66, 'Keswick', 4),
(67, 'King City', 3),
(68, 'Kingston', 7),
(69, 'Kingsville', 7),
(70, 'Kitchener', 4),
(71, 'Kleinburg', 2),
(72, 'Leamington', 7),
(73, 'Lindsay', 6),
(74, 'Listowel', 7),
(75, 'London', 5),
(76, 'Markham', 2),
(77, 'Midland', 6),
(78, 'Milton', 3),
(79, 'Mississauga', 1),
(80, 'Mitchell', 5),
(81, 'Mount Brydges', 6),
(82, 'Mount Forest', 5),
(83, 'Napanee', 7),
(84, 'North York', 1),
(85, 'New Dundee', 5),
(86, 'New Hamburg', 5),
(87, 'Newcastle', 5),
(88, 'Newmarket', 4),
(89, 'Niagara', 5),
(90, 'Oakville', 3),
(91, 'Orangeville', 4),
(92, 'Orillia', 6),
(93, 'Oshawa', 4),
(94, 'Owen Sound', 6),
(95, 'Paris', 4),
(96, 'Peterborough', 6),
(97, 'Plattsville', 5),
(98, 'Port Colborne', 5),
(99, 'Port Hope', 5),
(100, 'Port Perry', 5),
(101, 'Putnam', 5),
(102, 'Queensville', 4),
(103, 'Richmond Hill', 3),
(104, 'Ridgeway', 5),
(105, 'Rexdale', 1),
(106, 'Sarnia', 7),
(107, 'Scarborough', 2),
(108, 'Schomberg', 4),
(109, 'Simcoe', 5),
(110, 'Smithville', 5),
(111, 'St. Catherines', 5),
(112, 'ST. Clements', 4),
(113, 'St. David''s', 5),
(114, 'St. George', 4),
(115, 'St. Jacob''s', 4),
(116, 'St. Mary''s', 6),
(117, 'St. Thomas', 6),
(118, 'Stoney Creek', 4),
(119, 'Stoufville', 4),
(120, 'Stratford', 5),
(121, 'Strathroy', 6),
(122, 'Tecumseh', 7),
(123, 'Thamesford', 5),
(124, 'Thornbury', 6),
(125, 'Thornhill', 3),
(126, 'Thornton', 4),
(127, 'Thorold', 5),
(128, 'Toronto', 1),
(129, 'Tilbury', 7),
(130, 'Tillsonburg', 5),
(131, 'Trenton', 7),
(132, 'Uxbridge', 4),
(133, 'Vaughan', 1),
(134, 'Vineland Station', 5),
(135, 'Wainfleet', 5),
(136, 'Walkerton', 6),
(137, 'Warsaw', 7),
(138, 'Waterford', 5),
(139, 'Waterloo', 4),
(140, 'Welland', 5),
(141, 'Wellesley', 5),
(142, 'Wheatley', 7),
(143, 'Whitby', 4),
(144, 'Windsor', 7),
(145, 'Woodbridge', 2),
(146, 'Woodstock', 5),
(147, 'Arnprior', 0),
(148, 'Bancroft', 0),
(149, 'Blind River', 0),
(150, 'Bracebridge', 0),
(151, 'Brockville', 0),
(152, 'Burks Falls', 0),
(153, 'Chapleau', 0),
(154, 'Cochrane', 0),
(155, 'Copper Cliff', 0),
(156, 'Cornwall', 0),
(157, 'Earlton', 0),
(158, 'Espanola', 0),
(159, 'Fenelon Falls', 0),
(160, 'Fort Frances', 0),
(161, 'Haliburton', 0),
(162, 'Hearst', 0),
(163, 'Huntsville', 0),
(164, 'Iroquois Falls', 0),
(165, 'Kapuskasing', 0),
(166, 'Kenora', 0),
(167, 'Kirkland Lake', 0),
(168, 'Marathon', 0),
(169, 'Nepean', 0),
(170, 'New Liskeard', 0),
(171, 'Nipigon', 0),
(172, 'North Bay', 0),
(173, 'Ottawa', 0),
(174, 'Parry Sound', 0),
(175, 'Pembroke', 0),
(176, 'Perth', 0),
(177, 'Prescott', 0),
(178, 'Refrew', 0),
(179, 'Sault Ste Marie', 0),
(180, 'Sioux Lookout', 0),
(181, 'Smith Falls', 0),
(182, 'Sudbury', 0),
(183, 'Thunder Bay', 0),
(184, 'Timmins', 0),
(185, 'Windchester', 0);

-- --------------------------------------------------------

--
-- Table structure for table `air_lcl_minimum_rate_table`
--

CREATE TABLE `air_lcl_minimum_rate_table` (
  `id` int(11) NOT NULL,
  `zone_number` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `air_lcl_minimum_rate_table`
--

INSERT INTO `air_lcl_minimum_rate_table` (`id`, `zone_number`, `rate`) VALUES
(1, 1, 33),
(2, 2, 37),
(3, 3, 45),
(4, 4, 75),
(5, 5, 81),
(6, 6, 92),
(7, 7, 105);

-- --------------------------------------------------------

--
-- Table structure for table `air_lcl_rate_zone_1`
--

CREATE TABLE `air_lcl_rate_zone_1` (
  `id` int(11) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `air_lcl_rate_zone_1`
--

INSERT INTO `air_lcl_rate_zone_1` (`id`, `min`, `max`, `rate`) VALUES
(1, 51, 100, 0.46),
(2, 101, 255, 0.25),
(3, 256, 454, 0.22),
(4, 455, 899, 0.15),
(5, 900, 1399, 0.1),
(6, 1400, 2299, 0.09),
(7, 2300, 2800, 0.06);

-- --------------------------------------------------------

--
-- Table structure for table `air_lcl_rate_zone_2`
--

CREATE TABLE `air_lcl_rate_zone_2` (
  `id` int(11) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `air_lcl_rate_zone_2`
--

INSERT INTO `air_lcl_rate_zone_2` (`id`, `min`, `max`, `rate`) VALUES
(1, 51, 100, 0.55),
(2, 101, 255, 0.28),
(3, 256, 454, 0.24),
(4, 455, 899, 0.18),
(5, 900, 1399, 0.12),
(6, 1400, 2299, 0.1),
(7, 2300, 2800, 0.07);

-- --------------------------------------------------------

--
-- Table structure for table `air_lcl_rate_zone_3`
--

CREATE TABLE `air_lcl_rate_zone_3` (
  `id` int(11) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `air_lcl_rate_zone_3`
--

INSERT INTO `air_lcl_rate_zone_3` (`id`, `min`, `max`, `rate`) VALUES
(1, 51, 100, 0.66),
(2, 101, 255, 0.37),
(3, 256, 454, 0.38),
(4, 455, 899, 0.31),
(5, 900, 1399, 0.2),
(6, 1400, 2299, 0.15),
(7, 2300, 2800, 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `air_lcl_rate_zone_4`
--

CREATE TABLE `air_lcl_rate_zone_4` (
  `id` int(11) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `air_lcl_rate_zone_4`
--

INSERT INTO `air_lcl_rate_zone_4` (`id`, `min`, `max`, `rate`) VALUES
(1, 136, 454, 0.23),
(2, 455, 907, 0.2),
(3, 908, 2267, 0.18),
(4, 2268, 4535, 0.15);

-- --------------------------------------------------------

--
-- Table structure for table `air_lcl_rate_zone_5`
--

CREATE TABLE `air_lcl_rate_zone_5` (
  `id` int(11) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `air_lcl_rate_zone_5`
--

INSERT INTO `air_lcl_rate_zone_5` (`id`, `min`, `max`, `rate`) VALUES
(1, 136, 454, 0.29),
(2, 455, 907, 0.26),
(3, 908, 2267, 0.21),
(4, 2268, 4535, 0.16);

-- --------------------------------------------------------

--
-- Table structure for table `air_lcl_rate_zone_6`
--

CREATE TABLE `air_lcl_rate_zone_6` (
  `id` int(11) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `air_lcl_rate_zone_6`
--

INSERT INTO `air_lcl_rate_zone_6` (`id`, `min`, `max`, `rate`) VALUES
(1, 136, 454, 0.34),
(2, 455, 907, 0.28),
(3, 908, 2267, 0.23),
(4, 2268, 4535, 0.19);

-- --------------------------------------------------------

--
-- Table structure for table `air_lcl_rate_zone_7`
--

CREATE TABLE `air_lcl_rate_zone_7` (
  `id` int(11) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `air_lcl_rate_zone_7`
--

INSERT INTO `air_lcl_rate_zone_7` (`id`, `min`, `max`, `rate`) VALUES
(1, 136, 454, 0.4),
(2, 455, 907, 0.31),
(3, 908, 2267, 0.27),
(4, 2268, 4535, 0.23);

-- --------------------------------------------------------

--
-- Table structure for table `fcl_price_table`
--

CREATE TABLE `fcl_price_table` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` char(2) NOT NULL DEFAULT 'ON',
  `country` varchar(255) NOT NULL DEFAULT 'Canada',
  `net` int(11) DEFAULT NULL,
  `zone` int(11) DEFAULT NULL,
  `margin` int(11) DEFAULT NULL,
  `sold` int(11) DEFAULT NULL,
  `per` varchar(255) DEFAULT 'Container'
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fcl_price_table`
--

INSERT INTO `fcl_price_table` (`id`, `city`, `province`, `country`, `net`, `zone`, `margin`, `sold`, `per`) VALUES
(1, 'Acton', 'ON', 'Canada', 450, 0, 40, 490, 'One container'),
(2, 'Agincourt', 'ON', 'Canada', 370, 2, 30, 402, 'One container'),
(3, 'Ajax', 'ON', 'Canada', 440, 0, 40, 480, 'One container'),
(4, 'Alliston', 'ON', 'Canada', 450, 0, 40, 490, 'One container'),
(5, 'Ancaster', 'ON', 'Canada', 480, 0, 40, 520, 'One container'),
(6, 'Angus', 'ON', 'Canada', 545, 0, 45, 590, 'One container'),
(7, 'Aurora', 'ON', 'Canada', 425, 3, 30, 458, 'One container'),
(8, 'Aylmer', 'ON', 'Canada', 750, 0, 70, 820, 'One container'),
(9, 'Ayr', 'ON', 'Canada', 535, 0, 50, 585, 'One container'),
(10, 'Bancroft', 'ON', 'Canada', 970, 0, 90, 1060, 'One container'),
(11, 'Barrie', 'ON', 'Canada', 510, 0, 45, 555, 'One container'),
(12, 'Beamsville', 'ON', 'Canada', 535, 0, 45, 580, 'One container'),
(13, 'Beaverton', 'ON', 'Canada', 640, 0, 55, 695, 'One container'),
(14, 'Beeton', 'ON', 'Canada', 370, 0, 35, 405, 'One container'),
(15, 'Belleville', 'ON', 'Canada', 800, 0, 65, 865, 'One container'),
(16, 'Blind River', 'ON', 'Canada', 1680, 0, 155, 1835, 'One container'),
(17, 'Binbrook', 'ON', 'Canada', 525, 0, 50, 575, 'One container'),
(18, 'Blenheim', 'ON', 'Canada', 1015, 0, 95, 1110, 'One container'),
(19, 'Bobcaygeon', 'ON', 'Canada', 750, 0, 70, 820, 'One container'),
(20, 'Bolton', 'ON', 'Canada', 415, 0, 35, 450, 'One container'),
(21, 'Bowmanville', 'ON', 'Canada', 545, 0, 50, 595, 'One container'),
(22, 'Bracebridge', 'ON', 'Canada', 725, 0, 70, 795, 'One container'),
(23, 'Bradford', 'ON', 'Canada', 430, 0, 40, 470, 'One container'),
(24, 'Brampton', 'ON', 'Canada', 330, 1, 30, 361, 'One container'),
(25, 'Brantford', 'ON', 'Canada', 530, 0, 50, 580, 'One container'),
(26, 'Breslau', 'ON', 'Canada', 550, 0, 50, 600, 'One container'),
(27, 'Burks Falls', 'ON', 'Canada', 935, 0, 90, 1025, 'One container'),
(28, 'Burlington', 'ON', 'Canada', 425, 3, 30, 458, 'One container'),
(29, 'Caledonia', 'ON', 'Canada', 555, 0, 50, 605, 'One container'),
(30, 'Cambridge', 'ON', 'Canada', 510, 0, 50, 560, 'One container'),
(31, 'Campbellford', 'ON', 'Canada', 780, 0, 70, 850, 'One container'),
(32, 'Campbellville', 'ON', 'Canada', 415, 0, 40, 455, 'One container'),
(33, 'Chapleau', 'ON', 'Canada', 2375, 0, 230, 2605, 'One container'),
(34, 'Chatham', 'ON', 'Canada', 1000, 0, 95, 1095, 'One container'),
(35, 'Chepstow', 'ON', 'Canada', 665, 0, 65, 730, 'One container'),
(36, 'Clarksburg', 'ON', 'Canada', 595, 0, 55, 650, 'One container'),
(37, 'Cobourg', 'ON', 'Canada', 620, 0, 60, 680, 'One container'),
(38, 'Cochrane', 'ON', 'Canada', 2145, 0, 200, 2345, 'One container'),
(39, 'Colborne', 'ON', 'Canada', 680, 0, 55, 735, 'One container'),
(40, 'Collingwood', 'ON', 'Canada', 555, 0, 55, 610, 'One container'),
(41, 'Concord', 'ON', 'Canada', 330, 1, 30, 361, 'One container'),
(42, 'Cookstown', 'ON', 'Canada', 480, 0, 45, 525, 'One container'),
(43, 'Copper Cliff', 'ON', 'Canada', 1295, 0, 125, 1420, 'One container'),
(44, 'Don Mills', 'ON', 'Canada', 370, 2, 30, 402, 'One container'),
(45, 'Dorchester', 'ON', 'Canada', 685, 0, 65, 750, 'One container'),
(46, 'Downsview', 'ON', 'Canada', 330, 1, 30, 361, 'One container'),
(47, 'Dresden', 'ON', 'Canada', 1025, 0, 95, 1120, 'One container'),
(48, 'Dryden', 'ON', 'Canada', 4820, 0, 250, 5070, 'One container'),
(49, 'Dundas', 'ON', 'Canada', 490, 0, 40, 530, 'One container'),
(50, 'Dunnville', 'ON', 'Canada', 590, 0, 55, 645, 'One container'),
(51, 'Earlton', 'ON', 'Canada', 1640, 0, 160, 1800, 'One container'),
(52, 'Elgin Mills', 'ON', 'Canada', 420, 0, 40, 460, 'One container'),
(53, 'Elliot Lake', 'ON', 'Canada', 1675, 0, 160, 1835, 'One container'),
(54, 'Elmira', 'ON', 'Canada', 545, 0, 50, 595, 'One container'),
(55, 'Erin', 'ON', 'Canada', 425, 0, 40, 465, 'Two container'),
(56, 'Espanola', 'ON', 'Canada', 1470, 0, 140, 1610, 'One container'),
(57, 'Etobicoke', 'ON', 'Canada', 330, 1, 30, 361, 'One container'),
(58, 'Exeter', 'ON', 'Canada', 765, 0, 75, 840, 'One container'),
(59, 'Fenelon Falls', 'ON', 'Canada', 725, 0, 70, 795, 'One container'),
(60, 'Fergus', 'ON', 'Canada', 535, 0, 50, 585, 'One container'),
(61, 'Fort Erie', 'ON', 'Canada', 690, 0, 60, 750, 'One container'),
(62, 'Fort Frances', 'ON', 'Canada', 4825, 0, 250, 5075, 'One container'),
(63, 'Georgetown', 'ON', 'Canada', 415, 0, 40, 455, 'One container'),
(64, 'Geraldton', 'ON', 'Canada', 3645, 0, 250, 3895, 'One container'),
(65, 'Goderich', 'ON', 'Canada', 805, 0, 75, 880, 'One container'),
(66, 'Gormley', 'ON', 'Canada', 415, 0, 35, 450, 'One container'),
(67, 'Grand Valley', 'ON', 'Canada', 470, 0, 45, 515, 'One container'),
(68, 'Gravenhurst', 'ON', 'Canada', 670, 0, 65, 735, 'One container'),
(69, 'Guelph', 'ON', 'Canada', 515, 0, 45, 560, 'One container'),
(70, 'Grimsby', 'ON', 'Canada', 530, 0, 50, 580, 'One container'),
(71, 'Hagersville', 'ON', 'Canada', 560, 0, 50, 610, 'One container'),
(72, 'Haliburton', 'ON', 'Canada', 910, 0, 85, 995, 'One container'),
(73, 'Halton Hills', 'ON', 'Canada', 450, 0, 40, 490, 'One container'),
(74, 'Hamilton', 'ON', 'Canada', 450, 0, 40, 490, 'One container'),
(75, 'Hensall', 'ON', 'Canada', 765, 0, 75, 840, 'One container'),
(76, 'Hearst', 'ON', 'Canada', 2780, 0, 275, 3055, 'One container'),
(77, 'Huntsville', 'ON', 'Canada', 810, 0, 75, 885, 'One container'),
(78, 'Ignase', 'ON', 'Canada', 4535, 0, 470, 5005, 'One container'),
(79, 'Ingersol', 'ON', 'Canada', 635, 0, 55, 690, 'One container'),
(80, 'Inwood', 'ON', 'Canada', 925, 0, 95, 1020, 'One container'),
(81, 'Iroquois Falls', 'ON', 'Canada', 2030, 0, 265, 2295, 'One container'),
(82, 'Jarvis', 'ON', 'Canada', 590, 0, 55, 645, 'One container'),
(83, 'Jordan', 'ON', 'Canada', 550, 0, 45, 595, 'One container'),
(84, 'Kapuskasing', 'ON', 'Canada', 2460, 0, 265, 2725, 'One container'),
(85, 'Kenora', 'ON', 'Canada', 5395, 0, 550, 5945, 'One container'),
(86, 'Keswick', 'ON', 'Canada', 495, 0, 40, 535, 'One container'),
(87, 'King City', 'ON', 'Canada', 415, 0, 35, 450, 'One container'),
(88, 'Kingston', 'ON', 'Canada', 995, 0, 85, 1080, 'One container'),
(89, 'Kirkland Lake', 'ON', 'Canada', 1800, 0, 195, 1995, 'One container'),
(90, 'Kitchener', 'ON', 'Canada', 535, 0, 45, 580, 'One container'),
(91, 'Kingsville', 'ON', 'Canada', 1180, 0, 95, 1275, 'One container'),
(92, 'Kleinburg', 'ON', 'Canada', 330, 0, 35, 365, 'One container'),
(93, 'Leamington', 'ON', 'Canada', 1165, 0, 95, 1260, 'One container'),
(94, 'Lindsay', 'ON', 'Canada', 655, 0, 55, 710, 'One container'),
(95, 'Listowel', 'ON', 'Canada', 640, 0, 55, 695, 'One container'),
(96, 'Lincoln', 'ON', 'Canada', 555, 0, 45, 600, 'One container'),
(97, 'London', 'ON', 'Canada', 745, 0, 65, 810, 'One container'),
(98, 'Maple', 'ON', 'Canada', 370, 2, 30, 402, 'One container'),
(99, 'Marathon', 'ON', 'Canada', 3135, 0, 345, 3480, 'One container'),
(100, 'Mattawa', 'ON', 'Canada', 1265, 0, 115, 1380, 'One container'),
(101, 'Midland', 'ON', 'Canada', 620, 0, 45, 665, 'One container'),
(102, 'Milverton', 'ON', 'Canada', 720, 0, 65, 785, 'One container'),
(103, 'Mitchell', 'ON', 'Canada', 675, 0, 65, 740, 'One container'),
(104, 'Markham', 'ON', 'Canada', 370, 2, 30, 402, 'One container'),
(105, 'Milton', 'ON', 'Canada', 425, 3, 30, 458, 'One container'),
(106, 'Mississauga', 'ON', 'Canada', 330, 1, 30, 361, 'One container'),
(107, 'Mount Brydges', 'ON', 'Canada', 790, 0, 75, 865, 'One container'),
(108, 'Mount Forest', 'ON', 'Canada', 570, 0, 45, 615, 'One container'),
(109, 'Napanee', 'ON', 'Canada', 900, 0, 75, 975, 'One container'),
(110, 'New Hamburg', 'ON', 'Canada', 550, 0, 55, 605, 'One container'),
(111, 'New Liskeard', 'ON', 'Canada', 1570, 0, 165, 1735, 'One container'),
(112, 'Newmarket', 'ON', 'Canada', 430, 0, 40, 470, 'One container'),
(113, 'Niagara', 'ON', 'Canada', 615, 0, 55, 670, 'One container'),
(114, 'Nipigon', 'ON', 'Canada', 3625, 0, 375, 4000, 'One container'),
(115, 'North Bay', 'ON', 'Canada', 1155, 0, 105, 1260, 'One container'),
(116, 'Orangeville', 'ON', 'Canada', 450, 0, 40, 490, 'One container'),
(117, 'Orillia', 'ON', 'Canada', 580, 0, 45, 625, 'One container'),
(118, 'Oshawa', 'ON', 'Canada', 495, 0, 40, 535, 'One container'),
(119, 'Owen Sound', 'ON', 'Canada', 665, 0, 65, 730, 'One container'),
(120, 'Oakville', 'ON', 'Canada', 370, 2, 30, 402, 'One container'),
(121, 'Paris', 'ON', 'Canada', 545, 0, 45, 590, 'One container'),
(122, 'Parry Sound', 'ON', 'Canada', 835, 0, 75, 910, 'One container'),
(123, 'Peterborough', 'ON', 'Canada', 665, 0, 55, 720, 'One container'),
(124, 'Pickering', 'ON', 'Canada', 425, 3, 30, 458, 'One container'),
(125, 'Pickle Lake', 'ON', 'Canada', 790, 0, 545, 1335, 'One container'),
(126, 'Picton', 'ON', 'Canada', 910, 0, 75, 985, 'One container'),
(127, 'Plattsville', 'ON', 'Canada', 535, 0, 55, 590, 'One container'),
(128, 'Putnam', 'ON', 'Canada', 675, 0, 55, 730, 'One container'),
(129, 'Port Colborne', 'ON', 'Canada', 660, 0, 55, 715, 'One container'),
(130, 'Port Elgin', 'ON', 'Canada', 785, 0, 85, 870, 'One container'),
(131, 'Port Hope', 'ON', 'Canada', 585, 0, 45, 630, 'One container'),
(132, 'Port Perry', 'ON', 'Canada', 555, 0, 40, 595, 'One container'),
(133, 'Prescott', 'ON', 'Canada', 0, 0, 115, 115, 'One container'),
(134, 'Queensville', 'ON', 'Canada', 455, 0, 40, 495, 'One container'),
(135, 'Red Lake', 'ON', 'Canada', 5410, 0, 545, 5955, 'One container'),
(136, 'Rexdale', 'ON', 'Canada', 330, 1, 30, 361, 'One container'),
(137, 'Richmond Hill', 'ON', 'Canada', 370, 2, 30, 402, 'One container'),
(138, 'Ridgeway', 'ON', 'Canada', 675, 0, 55, 730, 'One container'),
(139, 'Sarnia', 'ON', 'Canada', 1000, 0, 85, 1085, 'One container'),
(140, 'Sault Ste Marie', 'ON', 'Canada', 2060, 0, 210, 2270, 'One container'),
(141, 'Schomberg', 'ON', 'Canada', 450, 0, 40, 490, 'One container'),
(142, 'Simcoe', 'ON', 'Canada', 635, 0, 55, 690, 'One container'),
(143, 'Sioux Lookout', 'ON', 'Canada', 4930, 0, 545, 5475, 'One container'),
(144, 'St. Catherines', 'ON', 'Canada', 570, 0, 55, 625, 'One container'),
(145, 'St. David''s', 'ON', 'Canada', 595, 0, 55, 650, 'One container'),
(146, 'St. George', 'ON', 'Canada', 560, 0, 55, 615, 'One container'),
(147, 'St. Jacob''s', 'ON', 'Canada', 535, 0, 45, 580, 'One container'),
(148, 'St. Mary''s', 'ON', 'Canada', 675, 0, 65, 740, 'One container'),
(149, 'St. Thomas', 'ON', 'Canada', 775, 0, 75, 850, 'One container'),
(150, 'Stoney Creek', 'ON', 'Canada', 490, 0, 40, 530, 'One container'),
(151, 'Stoufville', 'ON', 'Canada', 430, 0, 40, 470, 'One container'),
(152, 'ST. Clements', 'ON', 'Canada', 530, 0, 45, 575, 'One container'),
(153, 'Stratford', 'ON', 'Canada', 630, 0, 55, 685, 'One container'),
(154, 'Strathroy', 'ON', 'Canada', 845, 0, 75, 920, 'One container'),
(155, 'Sudbury', 'ON', 'Canada', 1030, 0, 105, 1135, 'One container'),
(156, 'Scarborough', 'ON', 'Canada', 370, 2, 30, 402, 'One container'),
(157, 'Strugeron Falls', 'ON', 'Canada', 1250, 0, 155, 1405, 'One container'),
(158, 'Tecumseh', 'ON', 'Canada', 1180, 0, 105, 1285, 'One container'),
(159, 'Thamesford', 'ON', 'Canada', 650, 0, 55, 705, 'One container'),
(160, 'Thornhill', 'ON', 'Canada', 370, 2, 30, 402, 'One container'),
(161, 'Thornton', 'ON', 'Canada', 490, 0, 40, 530, 'One container'),
(162, 'Thedford', 'ON', 'Canada', 940, 0, 75, 1015, 'One container'),
(163, 'Thorold', 'ON', 'Canada', 595, 0, 45, 640, 'One container'),
(164, 'Thunder Bay', 'ON', 'Canada', 3925, 0, 445, 4370, 'One container'),
(165, 'Tilbury', 'ON', 'Canada', 1080, 0, 95, 1175, 'One container'),
(166, 'Tillsonburg', 'ON', 'Canada', 685, 0, 65, 750, 'One container'),
(167, 'Timmins', 'ON', 'Canada', 2085, 0, 225, 2310, 'One container'),
(168, 'Toronto', 'ON', 'Canada', 330, 1, 30, 361, 'One container'),
(169, 'Trenton', 'ON', 'Canada', 755, 0, 65, 820, 'One container'),
(170, 'Unionville', 'ON', 'Canada', 370, 2, 30, 402, 'One container'),
(171, 'Uxbridge', 'ON', 'Canada', 530, 0, 40, 570, 'One container'),
(172, 'Vaughan', 'ON', 'Canada', 330, 1, 30, 361, 'One container'),
(173, 'Vineland Station', 'ON', 'Canada', 540, 0, 55, 595, 'One container'),
(174, 'Walenstein', 'ON', 'Canada', 555, 0, 55, 610, 'One container'),
(175, 'Walkerton', 'ON', 'Canada', 725, 0, 75, 800, 'One container'),
(176, 'Waterford', 'ON', 'Canada', 615, 0, 45, 660, 'One container'),
(177, 'Warsaw', 'ON', 'Canada', 660, 0, 55, 715, 'One container'),
(178, 'Waterloo', 'ON', 'Canada', 550, 0, 45, 595, 'One container'),
(179, 'Welland', 'ON', 'Canada', 625, 0, 55, 680, 'One container'),
(180, 'West Hill', 'ON', 'Canada', 370, 2, 30, 402, 'One container'),
(181, 'Weston', 'ON', 'Canada', 330, 1, 30, 361, 'One container'),
(182, 'Wheatley', 'ON', 'Canada', 1100, 0, 105, 1205, 'One container'),
(183, 'Whitby', 'ON', 'Canada', 470, 0, 40, 510, 'One container'),
(184, 'Willowdale', 'ON', 'Canada', 330, 1, 30, 361, 'One container'),
(185, 'Windsor', 'ON', 'Canada', 1205, 0, 110, 1315, 'One container'),
(186, 'Woodbridge', 'ON', 'Canada', 330, 1, 30, 361, 'One container'),
(187, 'Woodstock', 'ON', 'Canada', 615, 0, 55, 670, 'One container'),
(188, 'Wingham', 'ON', 'Canada', 755, 0, 65, 820, 'One container'),
(189, 'Wellesley', 'ON', 'Canada', 570, 0, 45, 615, 'One container'),
(190, 'Walenstein', 'ON', 'Canada', 555, 0, 45, 600, 'One container'),
(191, 'York', 'ON', 'Canada', 330, 1, 30, 361, 'One container'),
(192, 'Zurich', 'ON', 'Canada', 790, 0, 85, 875, 'One container');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_surcharge_table`
--

CREATE TABLE `fuel_surcharge_table` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `surcharge` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuel_surcharge_table`
--

INSERT INTO `fuel_surcharge_table` (`id`, `type`, `surcharge`) VALUES
(1, 'FCL', 0.21),
(2, 'FTL', 0.16);

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `company` varchar(255) DEFAULT NULL,
  `agent_name` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1040 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `date`, `company`, `agent_name`, `destination`) VALUES
(1029, '2016-07-20 20:41:58', 'Ankit Designs', 'John Smith', 'Mississauga, ON'),
(1030, '2016-07-20 20:44:05', 'Ankit Designs', 'John Smith', 'Mississauga, ON'),
(1031, '2016-07-21 16:48:36', 'Ankit Designs', 'John Smith', 'Mississauga, ON'),
(1032, '2016-07-21 17:55:09', 'Ankit Designs', 'Jack Smith', 'Acton, ON'),
(1033, '2016-07-21 18:04:15', 'Ankit Designs', 'Jack Smith', 'Acton, ON'),
(1034, '2016-07-21 23:56:08', 'asdf', 'asdf', 'Alliston, ON'),
(1035, '2016-07-21 23:57:36', 'asdf', 'asdf', 'Alliston, ON'),
(1036, '2016-07-21 23:58:06', 'asdf', 'asdf', 'Alliston, ON'),
(1037, '2016-07-21 23:58:39', 'asdf', 'asdf', 'Alliston, ON'),
(1038, '2016-07-22 00:03:45', 'asdf', 'asdf', 'Alliston, ON'),
(1039, '2016-07-22 00:04:06', 'asdf', 'asdf', 'Alliston, ON');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `air_lcl_city_zone_table`
--
ALTER TABLE `air_lcl_city_zone_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `air_lcl_minimum_rate_table`
--
ALTER TABLE `air_lcl_minimum_rate_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `air_lcl_rate_zone_1`
--
ALTER TABLE `air_lcl_rate_zone_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `air_lcl_rate_zone_2`
--
ALTER TABLE `air_lcl_rate_zone_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `air_lcl_rate_zone_3`
--
ALTER TABLE `air_lcl_rate_zone_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `air_lcl_rate_zone_4`
--
ALTER TABLE `air_lcl_rate_zone_4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `air_lcl_rate_zone_5`
--
ALTER TABLE `air_lcl_rate_zone_5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `air_lcl_rate_zone_6`
--
ALTER TABLE `air_lcl_rate_zone_6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `air_lcl_rate_zone_7`
--
ALTER TABLE `air_lcl_rate_zone_7`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fcl_price_table`
--
ALTER TABLE `fcl_price_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_surcharge_table`
--
ALTER TABLE `fuel_surcharge_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `air_lcl_city_zone_table`
--
ALTER TABLE `air_lcl_city_zone_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=186;
--
-- AUTO_INCREMENT for table `air_lcl_minimum_rate_table`
--
ALTER TABLE `air_lcl_minimum_rate_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `air_lcl_rate_zone_1`
--
ALTER TABLE `air_lcl_rate_zone_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `air_lcl_rate_zone_2`
--
ALTER TABLE `air_lcl_rate_zone_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `air_lcl_rate_zone_3`
--
ALTER TABLE `air_lcl_rate_zone_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `air_lcl_rate_zone_4`
--
ALTER TABLE `air_lcl_rate_zone_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `air_lcl_rate_zone_5`
--
ALTER TABLE `air_lcl_rate_zone_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `air_lcl_rate_zone_6`
--
ALTER TABLE `air_lcl_rate_zone_6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `air_lcl_rate_zone_7`
--
ALTER TABLE `air_lcl_rate_zone_7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fcl_price_table`
--
ALTER TABLE `fcl_price_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT for table `fuel_surcharge_table`
--
ALTER TABLE `fuel_surcharge_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1040;