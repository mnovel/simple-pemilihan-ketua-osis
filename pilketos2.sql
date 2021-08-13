-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2021 at 03:23 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pilketos2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login` int(1) DEFAULT 0,
  `ip` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `login`, `ip`, `location`) VALUES
(1, 'admin', 'admin', 'B4ngs4d0', 0, '0', 'null'),
(21, 'admin', 'admin2', 'admin2', 0, '0', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `visi` varchar(1000) NOT NULL,
  `misi` varchar(10000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `name`, `visi`, `misi`, `image`, `no`) VALUES
(55, 'muhammad novel', 'sadsaasd', 'sadasd', '1628344843.jpg', 1),
(72, 'asd', 'asdsadsa', 'asds', '1628381322.jpg', 2),
(73, 'wte', 'asd', 'asdas', '1628588193.jpg', 3),
(74, 'asd', 'asdfds', 'sdfdsfds', '1628588243.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `class`) VALUES
(23, '10 mipa 4', '10'),
(24, '10 mipa 5', '10'),
(27, '11 ips 1', '11'),
(28, '11 ips 2', '11'),
(30, '11 mipa 1', '11'),
(31, '11 mipa 2', '11'),
(32, '11 mipa 3', '11'),
(33, '11 mipa 4', '11'),
(34, '11 mipa 5', '11'),
(35, '12 mipa 1', '12'),
(36, '12 mipa 2', '12'),
(37, '12 ips 1', '12'),
(38, '12 mipa 3', '12'),
(39, '12 mipa 4', '12'),
(40, '12 ips 2', '12'),
(41, '12 mipa 5', '12'),
(49, 'guru', 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `ip` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `username`, `type`, `ip`, `location`, `time`) VALUES
(1, 'admin', 'admin', 0, 'null', 1627770807),
(2, 'admin', 'admin', 0, 'null', 1627770892),
(3, 'admin', 'admin', 0, 'null', 1627770899),
(4, 'admin', 'admin', 0, 'null', 1627771023),
(5, 'admin', 'admin', 0, 'null', 1627771053),
(6, 'admin', 'admin', 0, 'null', 1627771897),
(7, 'admin', 'admin', 0, 'null', 1627771924),
(8, 'admin', 'admin', 0, 'null', 1627771925),
(9, 'admin', 'admin', 0, 'null', 1627771937),
(10, 'admin', 'admin', 0, 'null', 1627771945),
(11, 'admin', 'admin', 0, 'null', 1627773915),
(12, 'admin', 'admin', 0, 'null', 1627773919),
(13, 'admin', 'admin', 0, 'null', 1627773921),
(14, 'admin', 'admin', 0, 'null', 1627773942),
(15, 'admin', 'admin', 0, 'null', 1627773961),
(16, 'admin', 'admin', 0, 'null', 1627775402),
(17, 'admin', 'admin', 0, 'null', 1627776314),
(18, 'admin', 'admin', 0, 'null', 1627776333),
(19, 'admin', 'admin', 0, 'null', 1627789105),
(20, 'admin', 'admin', 0, 'null', 1627807052),
(21, 'admin', 'admin', 0, 'null', 1627807055),
(22, 'admin', 'admin', 0, 'null', 1627834315),
(23, 'admin', 'admin', 0, 'null', 1627834618),
(24, 'admin', 'admin', 0, 'null', 1627834624),
(25, 'admin', 'admin', 0, 'null', 1627836446),
(26, 'admin', 'admin', 0, 'null', 1627837038),
(27, 'admin', 'admin', 0, 'null', 1627862296),
(28, 'admin', 'admin', 0, 'null', 1627862349),
(29, 'admin', 'admin', 0, 'null', 1627862366),
(30, 'admin', 'admin', 0, 'null', 1627862437),
(31, 'admin', 'admin', 0, 'null', 1627862452),
(32, 'admin', 'admin', 0, 'null', 1627881180),
(33, 'admin', 'admin', 0, 'null', 1627881768),
(34, 'admin', 'admin', 0, 'null', 1627881786),
(35, 'admin', 'admin', 0, 'null', 1627881827),
(36, 'admin', 'admin', 0, 'null', 1627881835),
(37, 'admin', 'admin', 0, 'null', 1627881862),
(38, 'admin', 'admin', 0, 'null', 1627882802),
(39, 'admin', 'admin', 0, 'null', 1627912005),
(40, 'admin', 'admin', 0, 'null', 1627912018),
(41, 'admin', 'admin', 0, 'null', 1627912055),
(42, 'admin', 'admin', 0, 'null', 1627912063),
(43, 'admin', 'admin', 0, 'null', 1627912100),
(44, 'admin2', 'admin', 0, 'null', 1627912122),
(45, 'admin', 'admin', 110137, 'null', 1627912250),
(46, 'admin2', 'admin', 110137, 'null', 1627912517),
(47, 'admin', 'admin', 110137, 'null', 1627912681),
(48, 'admin', 'admin', 0, 'null', 1627970351),
(49, 'admin', 'admin', 0, 'null', 1627970363),
(50, 'admin', 'admin', 0, 'null', 1627970469),
(51, 'admin', 'admin', 0, 'null', 1627970701),
(52, 'admin', 'admin', 0, 'null', 1627970857),
(53, 'admin', 'admin', 0, 'null', 1627970869),
(54, 'admin', 'admin', 0, 'null', 1627970879),
(55, 'moderator', 'admin', 0, 'null', 1627976734),
(56, 'moderator', 'admin', 0, 'null', 1627976802),
(57, 'moderator', 'admin', 0, 'null', 1627976865),
(58, 'moderator', 'admin', 0, 'null', 1627976914),
(59, 'moderator', 'admin', 0, 'null', 1627976924),
(60, 'moderator', 'admin', 0, 'null', 1627977332),
(61, 'admin', 'admin', 0, 'null', 1627977397),
(62, 'admin', 'admin', 0, 'null', 1627977425),
(63, 'moderator', 'admin', 0, 'null', 1627977442),
(64, 'moderator', 'admin', 0, 'null', 1627977550),
(65, 'moderator', 'admin', 0, 'null', 1627977863),
(66, 'moderator', 'admin', 0, 'null', 1627978569),
(67, 'moderator', 'admin', 0, 'null', 1627978642),
(68, 'moderator', 'admin', 0, 'null', 1627978649),
(69, 'moderator', 'admin', 0, 'null', 1627978663),
(70, 'moderator', 'admin', 0, 'null', 1627978710),
(71, 'admin', 'admin', 0, 'null', 1627982316),
(72, 'admin', 'admin', 0, 'null', 1627982320),
(73, 'admin', 'admin', 0, 'null', 1627982324),
(74, 'admin', 'admin', 0, 'null', 1627982360),
(75, 'moderator', 'admin', 0, 'null', 1627983856),
(76, 'admin', 'admin', 0, 'null', 1627984205),
(77, 'moderator', 'admin', 0, 'null', 1627984393),
(78, 'admin', 'admin', 0, 'null', 1627985185),
(79, 'moderator', 'admin', 0, 'null', 1627985417),
(80, 'moderator', 'admin', 0, 'null', 1628005821),
(81, 'moderator', 'admin', 0, 'null', 1628007233),
(82, 'moderator', 'admin', 0, 'null', 1628007450),
(83, 'moderator', 'admin', 0, 'null', 1628007512),
(84, '1111111111', 'admin', 0, 'null', 1628009949),
(85, '1111111111', 'admin', 0, 'null', 1628009962),
(86, '1111111111', 'admin', 0, 'null', 1628010011),
(87, '1111111111', 'admin', 0, 'null', 1628010079),
(88, '1111111111', 'admin', 0, 'null', 1628010130),
(89, '1111111111', 'admin', 0, 'null', 1628010158),
(90, '1111111111', 'admin', 0, 'null', 1628010387),
(91, '1111111111', 'admin', 0, 'null', 1628010397),
(92, '1111111111', 'admin', 0, 'null', 1628010401),
(93, '1111111111', 'admin', 0, 'null', 1628010488),
(94, '1111111111', 'admin', 0, 'null', 1628010491),
(95, 'admin', 'admin', 0, 'null', 1628012277),
(96, '1111111111', 'admin', 0, 'null', 1628012384),
(97, 'admin', 'admin', 0, 'null', 1628013533),
(98, '1111111111', 'admin', 0, 'null', 1628014879),
(99, 'admin', 'admin', 0, 'null', 1628014954),
(100, '1111111111', 'admin', 0, 'null', 1628014976),
(101, '1111111111', 'admin', 0, 'null', 1628023321),
(102, 'admin', 'admin', 0, 'null', 1628024832),
(103, '1111111111', 'admin', 0, 'null', 1628025277),
(104, 'admin', 'admin', 0, 'null', 1628025370),
(105, 'moderator', 'admin', 0, 'null', 1628026154),
(106, 'admin', 'admin', 0, 'null', 1628026435),
(107, 'moderator', 'admin', 0, 'null', 1628080745),
(108, '1111111111', 'admin', 0, 'null', 1628155479),
(109, '1111111111', 'admin', 0, 'null', 1628164004),
(110, '1111111111', 'admin', 0, 'null', 1628166502),
(111, '1111111111', 'admin', 0, 'null', 1628166565),
(112, '1111111111', 'admin', 0, 'null', 1628166715),
(113, '1111111111', 'admin', 192168, 'null', 1628166738),
(114, '1111111111', 'admin', 0, 'null', 1628166825),
(115, '1111111111', 'admin', 192168, 'null', 1628166830),
(116, '1111111111', 'admin', 0, 'null', 1628167157),
(117, '1111111111', 'admin', 0, 'null', 1628167233),
(118, '1111111111', 'admin', 0, 'null', 1628167236),
(119, '1111111111', 'admin', 0, 'null', 1628167263),
(120, '1111111111', 'admin', 0, 'null', 1628167281),
(121, '1111111111', 'admin', 0, 'null', 1628167285),
(122, '1111111111', 'admin', 0, 'null', 1628167504),
(123, '1111111111', 'admin', 0, 'null', 1628167660),
(124, '1111111111', 'admin', 0, 'null', 1628167693),
(125, '1111111111', 'admin', 0, 'null', 1628167697),
(126, '1111111111', 'admin', 0, 'null', 1628167972),
(127, 'admin', 'admin', 0, 'null', 1628168192),
(128, 'admin2', 'admin', 0, 'null', 1628168647),
(129, 'admin', 'admin', 110137, 'null', 1628168795),
(130, 'moderator2', 'admin', 0, 'null', 1628168859),
(131, 'admin2', 'admin', 0, 'null', 1628169342),
(132, 'admin2', 'admin', 0, 'null', 1628169612),
(133, 'admin', 'admin', 110137, 'null', 1628170373),
(134, 'moderator', 'admin', 110137, 'null', 1628170465),
(135, '1111111111', 'admin', 110137, 'null', 1628170557),
(136, 'admin', 'admin', 110137, 'null', 1628170946),
(137, 'admin', 'admin', 110137, 'null', 1628170968),
(138, 'admin', 'admin', 110137, 'null', 1628171004),
(139, 'admin', 'admin', 110137, 'null', 1628171048),
(140, '1111111111', 'admin', 110137, 'null', 1628171142),
(141, '1111111111', 'admin', 110137, 'null', 1628171232),
(142, 'admin2', 'admin', 0, 'null', 1628171432),
(143, '1111111111', 'admin', 192168, 'null', 1628173533),
(144, 'admin', 'admin', 192168, 'null', 1628173572),
(145, 'admin2', 'admin', 0, 'null', 1628202545),
(146, 'admin', 'admin', 0, 'null', 1628256158),
(147, 'admin2', 'admin', 0, 'null', 1628256183),
(148, 'admin2', 'admin', 0, 'null', 1628301297),
(149, '1111111111', 'admin', 0, 'null', 1628301318),
(150, '1111111111', 'admin', 0, 'null', 1628301383),
(151, '1111111111', 'admin', 0, 'null', 1628301412),
(152, '1111111111', 'admin', 0, 'null', 1628301582),
(153, 'admin2', 'admin', 0, 'null', 1628301817),
(154, '1111111111', 'admin', 0, 'null', 1628340582),
(155, 'admin2', 'admin', 0, 'null', 1628340591),
(156, 'admin', 'admin', 0, 'null', 1628346667),
(157, 'admin', 'admin', 0, 'null', 1628348289),
(158, 'admin', 'admin', 0, 'null', 1628348317),
(159, 'moderator', 'admin', 0, 'null', 1628348342),
(160, 'moderator2', 'admin', 0, 'null', 1628348466),
(161, 'moderator2', 'admin', 0, 'null', 1628349360),
(162, 'moderator', 'admin', 0, 'null', 1628349367),
(163, 'moderator', 'admin', 0, 'null', 1628349373),
(164, 'admin', 'admin', 0, 'null', 1628349389),
(165, 'admin', 'admin', 0, 'null', 1628349405),
(166, 'admin', 'admin', 0, 'null', 1628349631),
(167, '1111111111', 'admin', 0, 'null', 1628349649),
(168, '1111111111', 'admin', 0, 'null', 1628349656),
(169, 'admin', 'admin', 0, 'null', 1628349674),
(170, '1111111111', 'admin', 0, 'null', 1628349709),
(171, 'admin', 'admin', 0, 'null', 1628349769),
(172, '1111111111', 'admin', 0, 'null', 1628350318),
(173, '1111111111', 'admin', 0, 'null', 1628350531),
(174, '1111111111', 'admin', 0, 'null', 1628350596),
(175, '1111111111', 'admin', 0, 'null', 1628350608),
(176, '1111111111', 'admin', 0, 'null', 1628350685),
(177, '1111111111', 'admin', 0, 'null', 1628350735),
(178, 'admin', 'admin', 0, 'null', 1628350749),
(179, 'admin', 'admin', 0, 'null', 1628350755),
(180, 'admin', 'admin', 0, 'null', 1628350768),
(181, '1111111111', 'admin', 0, 'null', 1628350797),
(182, 'admin', 'admin', 0, 'null', 1628350805),
(183, '1111111111', 'admin', 0, 'null', 1628350829),
(184, '1111111111', 'admin', 0, 'null', 1628350833),
(185, '1111111111', 'admin', 0, 'null', 1628350838),
(186, '1111111111', 'admin', 0, 'null', 1628350897),
(187, '1111111111', 'admin', 0, 'null', 1628351121),
(188, '1111111111', 'admin', 0, 'null', 1628351139),
(189, '1111111111', 'admin', 0, 'null', 1628351142),
(190, '1111111111', 'admin', 0, 'null', 1628351145),
(191, '1111111111', 'admin', 0, 'null', 1628351146),
(192, '1111111111', 'admin', 0, 'null', 1628351155),
(193, '1111111111', 'admin', 0, 'null', 1628351207),
(194, 'admin', 'admin', 0, 'null', 1628351378),
(195, 'admin', 'admin', 192168, 'null', 1628351434),
(196, 'admin', 'admin', 192168, 'null', 1628351457),
(197, '1111111111', 'admin', 0, 'null', 1628352777),
(198, '1111111111', 'admin', 0, 'null', 1628352782),
(199, '1111111111', 'admin', 0, 'null', 1628352839),
(200, '1111111111', 'admin', 0, 'null', 1628352844),
(201, '1111111111', 'admin', 0, 'null', 1628353079),
(202, '1111111111', 'admin', 0, 'null', 1628353098),
(203, '1111111111', 'admin', 0, 'null', 1628353103),
(204, '1111111111', 'admin', 0, 'null', 1628353125),
(205, '1111111111', 'admin', 0, 'null', 1628353160),
(206, '1111111111', 'admin', 0, 'null', 1628353171),
(207, '1111111111', 'admin', 0, 'null', 1628353183),
(208, '1111111111', 'admin', 0, 'null', 1628353225),
(209, '1111111111', 'admin', 0, 'null', 1628353250),
(210, '1111111111', 'admin', 0, 'null', 1628353253),
(211, '1111111111', 'admin', 0, 'null', 1628353302),
(212, '1111111111', 'admin', 0, 'null', 1628353370),
(213, '1111111111', 'admin', 0, 'null', 1628353431),
(214, '1111111111', 'admin', 0, 'null', 1628353435),
(215, '1111111111', 'admin', 0, 'null', 1628353574),
(216, '1111111111', 'admin', 0, 'null', 1628353597),
(217, '1111111111', 'admin', 0, 'null', 1628353642),
(218, '1111111111', 'admin', 0, 'null', 1628353645),
(219, '1111111111', 'admin', 0, 'null', 1628353657),
(220, '1111111111', 'admin', 0, 'null', 1628353731),
(221, '1111111111', 'admin', 0, 'null', 1628353768),
(222, '1111111111', 'admin', 0, 'null', 1628353776),
(223, '1111111111', 'admin', 0, 'null', 1628353822),
(224, '1111111111', 'admin', 0, 'null', 1628353902),
(225, '1111111111', 'admin', 0, 'null', 1628353909),
(226, '1111111111', 'admin', 0, 'null', 1628353973),
(227, '1111111111', 'admin', 0, 'null', 1628353996),
(228, '1111111111', 'admin', 0, 'null', 1628354013),
(229, '1111111111', 'admin', 0, 'null', 1628354013),
(230, '1111111111', 'admin', 0, 'null', 1628354210),
(231, '1111111111', 'admin', 0, 'null', 1628354219),
(232, '1111111111', 'admin', 0, 'null', 1628354220),
(233, '1111111111', 'admin', 0, 'null', 1628354278),
(234, '1111111111', 'admin', 0, 'null', 1628354290),
(235, 'admin', 'admin', 0, 'null', 1628354786),
(236, 'admin', 'admin', 0, 'null', 1628354792),
(237, 'admin', 'admin', 0, 'null', 1628354803),
(238, 'moderator', 'admin', 0, 'null', 1628354991),
(239, 'admin', 'admin', 0, 'null', 1628374507),
(240, 'admin', 'admin', 0, 'null', 1628380436),
(241, 'admin', 'admin', 0, 'null', 1628380504),
(242, 'moderator', 'admin', 0, 'null', 1628383498),
(243, 'moderator', 'admin', 0, 'null', 1628383505),
(244, 'moderator', 'admin', 0, 'null', 1628383557),
(245, 'moderator', 'admin', 0, 'null', 1628383575),
(246, 'admin', 'admin', 0, 'null', 1628384746),
(247, '1111111111', 'admin', 0, 'null', 1628384771),
(248, '1111111111', 'admin', 0, 'null', 1628384775),
(249, '1111111111', 'admin', 0, 'null', 1628384790),
(250, '1111111111', 'admin', 0, 'null', 1628384973),
(251, '1111111111', 'admin', 0, 'null', 1628387613),
(252, '1111111111', 'admin', 0, 'null', 1628387801),
(253, '1111111111', 'admin', 0, 'null', 1628388090),
(254, '1111111111', 'admin', 0, 'null', 1628388196),
(255, '1111111111', 'admin', 0, 'null', 1628388208),
(256, '1111111111', 'admin', 0, 'null', 1628388234),
(257, '1111111111', 'admin', 0, 'null', 1628388249),
(258, 'admin', 'admin', 0, 'null', 1628388494),
(259, '1111111111', 'admin', 0, 'null', 1628388883),
(260, '1111111111', 'admin', 0, 'null', 1628388970),
(261, 'admin', 'admin', 0, 'null', 1628388993),
(262, 'moderator', 'admin', 0, 'null', 1628389697),
(263, 'admin', 'admin', 0, 'null', 1628389815),
(264, '1111111111', 'admin', 0, 'null', 1628390975),
(265, '1111111111', 'admin', 0, 'null', 1628391677),
(266, '1111111111', 'admin', 0, 'null', 1628391742),
(267, 'admin', 'admin', 0, 'null', 1628408497),
(268, '1111111111', 'admin', 0, 'null', 1628408774),
(269, 'admin', 'admin', 0, 'null', 1628410572),
(270, 'admin2', 'admin', 110137, 'null', 1628411670),
(271, 'admin2', 'admin', 110137, 'null', 1628411727),
(272, 'admin', 'admin', 110137, 'null', 1628412879),
(273, 'moderator', 'admin', 110137, 'null', 1628413064),
(274, 'admin2', 'admin', 110137, 'null', 1628413329),
(275, 'moderator', 'admin', 0, 'null', 1628413467),
(276, 'admin', 'admin', 0, 'null', 1628437300),
(277, 'admin', 'admin', 0, 'null', 1628438228),
(278, 'admin', 'admin', 0, 'null', 1628438407),
(279, 'admin', 'admin', 0, 'null', 1628438638),
(280, 'moderator', 'admin', 0, 'null', 1628451172),
(281, 'admin', 'admin', 0, 'null', 1628453995),
(282, 'admin', 'admin', 0, 'null', 1628513624),
(283, 'admin', 'admin', 0, 'null', 1628588157),
(284, '1111111111', 'admin', 0, 'null', 1628599972),
(285, '1111111113', 'admin', 0, 'null', 1628600042),
(286, 'admin', 'admin', 0, 'null', 1628600511),
(287, '1111111114', 'admin', 0, 'null', 1628604346),
(288, '1111111114', 'admin', 0, 'null', 1628604452),
(289, '1111111114', 'admin', 0, 'null', 1628604504),
(290, '1111111114', 'admin', 0, 'null', 1628604517),
(291, 'moderator', 'admin', 0, 'null', 1628604608),
(292, 'moderator', 'admin', 0, 'null', 1628614639),
(293, 'moderator', 'admin', 0, 'null', 1628616057),
(294, 'admin', 'admin', 0, 'null', 1628616943),
(295, 'moderator2', 'admin', 192168, 'null', 1628616991),
(296, 'moderator', 'admin', 0, 'null', 1628617054),
(297, 'moderator2', 'admin', 192168, 'null', 1628617812),
(298, 'moderator', 'admin', 192168, 'null', 1628618164),
(299, 'moderator', 'admin', 192168, 'null', 1628618861),
(300, 'moderator2', 'admin', 192168, 'null', 1628624505),
(301, 'moderator', 'admin', 0, 'null', 1628642190);

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login` int(11) NOT NULL DEFAULT 0,
  `ip` varchar(255) NOT NULL DEFAULT '0',
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`id`, `name`, `username`, `password`, `login`, `ip`, `location`) VALUES
(11, 'moderator', 'moderator', 'B4ngs4d0', 0, '0', 'null'),
(19, 'moderator2', 'moderator2', 'moderator2', 1, '192.168.100.9', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `server`
--

CREATE TABLE `server` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `server`
--

INSERT INTO `server` (`id`, `status`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(0, 'description', 'Aplikasi Pemilihan Ketua Osis SMA Negeri 1 Pasuruan Masa Bakti 2021/2022'),
(1, 'title', 'PILKETOS SMA NEGERI 1 PASURUAN'),
(2, 'icon', '1628014387.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` int(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `login` int(11) NOT NULL DEFAULT 0,
  `ip` varchar(255) NOT NULL DEFAULT '0',
  `location` varchar(255) DEFAULT NULL,
  `absent` int(2) NOT NULL,
  `status_vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `class`, `login`, `ip`, `location`, `absent`, `status_vote`) VALUES
(47, '1111111111', 1111111111, '07-08-2021', '10 mipa 4', 0, '0', 'null', 1, 0),
(48, '1111111112', 1111111112, '07-08-2021', '10 mipa 5', 0, '0', NULL, 1, 0),
(49, '1111111113', 1111111113, '07-08-2021', '10 mipa 4', 0, '0', 'null', 0, 0),
(50, 'asdsa', 1111111114, '07-08-2021', '10 mipa 5', 0, '0', 'null', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `class` int(2) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `candidate` int(1) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `username`, `class`, `class_name`, `candidate`, `time`) VALUES
(31, 0, 0, '11 ips 1', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no` (`no`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `server`
--
ALTER TABLE `server`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `moderator`
--
ALTER TABLE `moderator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `server`
--
ALTER TABLE `server`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
