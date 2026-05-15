-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 15, 2026 at 11:56 AM
-- Server version: 8.4.7
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int DEFAULT NULL,
  `status` enum('Present','Absent') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=453 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `status`) VALUES
(1, 1, 'Present'),
(2, 2, 'Present'),
(3, 3, 'Present'),
(4, 4, 'Present'),
(5, 5, 'Present'),
(6, 6, 'Present'),
(7, 7, 'Present'),
(8, 8, 'Present'),
(9, 9, 'Present'),
(10, 10, 'Present'),
(11, 11, 'Present'),
(12, 12, 'Present'),
(13, 13, NULL),
(14, 14, 'Present'),
(15, 15, 'Present'),
(16, 16, 'Present'),
(250, 17, 'Present'),
(18, 18, 'Present'),
(19, 19, 'Present'),
(20, 20, 'Present'),
(383, 21, 'Present'),
(413, 22, 'Absent'),
(23, 23, 'Present'),
(423, 24, 'Absent'),
(25, 1, 'Present'),
(26, 2, 'Present'),
(27, 3, 'Present'),
(28, 4, 'Absent'),
(29, 5, 'Present'),
(30, 6, 'Present'),
(31, 7, 'Present'),
(32, 8, 'Absent'),
(33, 9, 'Present'),
(34, 10, 'Present'),
(35, 11, 'Present'),
(36, 12, 'Absent'),
(37, 13, NULL),
(38, 14, 'Present'),
(39, 15, 'Present'),
(40, 16, 'Absent'),
(249, 17, 'Present'),
(42, 18, 'Present'),
(43, 19, 'Present'),
(44, 20, 'Absent'),
(382, 21, 'Present'),
(412, 22, 'Absent'),
(47, 23, 'Present'),
(422, 24, 'Absent'),
(49, 1, 'Present'),
(50, 2, 'Present'),
(51, 3, 'Absent'),
(52, 4, 'Present'),
(53, 5, 'Present'),
(54, 6, 'Absent'),
(55, 7, 'Present'),
(56, 8, 'Present'),
(57, 9, 'Absent'),
(58, 10, 'Present'),
(59, 11, 'Present'),
(60, 12, 'Absent'),
(61, 13, NULL),
(62, 14, 'Present'),
(63, 15, 'Absent'),
(64, 16, 'Present'),
(248, 17, 'Present'),
(66, 18, 'Absent'),
(67, 19, 'Present'),
(68, 20, 'Present'),
(381, 21, 'Present'),
(411, 22, 'Absent'),
(71, 23, 'Present'),
(421, 24, 'Absent'),
(73, 1, 'Present'),
(74, 2, 'Present'),
(75, 3, 'Present'),
(76, 4, 'Present'),
(77, 5, 'Present'),
(78, 6, 'Present'),
(79, 7, 'Present'),
(80, 8, 'Present'),
(81, 9, 'Present'),
(82, 10, 'Present'),
(83, 11, 'Present'),
(84, 12, 'Present'),
(85, 13, NULL),
(86, 14, 'Present'),
(87, 15, 'Present'),
(88, 16, 'Present'),
(247, 17, 'Present'),
(90, 18, 'Present'),
(91, 19, 'Present'),
(92, 20, 'Present'),
(380, 21, 'Present'),
(410, 22, 'Absent'),
(95, 23, 'Present'),
(420, 24, 'Absent'),
(97, 1, 'Present'),
(98, 2, 'Present'),
(99, 3, 'Present'),
(100, 4, 'Present'),
(101, 5, 'Absent'),
(102, 6, 'Present'),
(103, 7, 'Present'),
(104, 8, 'Present'),
(105, 9, 'Present'),
(106, 10, 'Absent'),
(107, 11, 'Present'),
(108, 12, 'Present'),
(109, 13, NULL),
(110, 14, 'Present'),
(111, 15, 'Absent'),
(112, 16, 'Present'),
(246, 17, 'Present'),
(114, 18, 'Present'),
(115, 19, 'Present'),
(116, 20, 'Absent'),
(379, 21, 'Present'),
(409, 22, 'Absent'),
(119, 23, 'Present'),
(419, 24, 'Absent'),
(121, 1, 'Present'),
(122, 2, 'Present'),
(123, 3, 'Present'),
(124, 4, 'Present'),
(125, 5, 'Present'),
(126, 6, 'Present'),
(127, 7, 'Present'),
(128, 8, 'Present'),
(129, 9, 'Present'),
(130, 10, 'Present'),
(131, 11, 'Present'),
(132, 12, 'Present'),
(133, 13, NULL),
(134, 14, 'Present'),
(135, 15, 'Present'),
(136, 16, 'Present'),
(245, 17, 'Present'),
(138, 18, 'Present'),
(139, 19, 'Present'),
(140, 20, 'Present'),
(378, 21, 'Present'),
(408, 22, 'Absent'),
(143, 23, 'Present'),
(418, 24, 'Present'),
(145, 1, 'Present'),
(146, 2, 'Absent'),
(147, 3, 'Present'),
(148, 4, 'Absent'),
(149, 5, 'Present'),
(150, 6, 'Absent'),
(151, 7, 'Present'),
(152, 8, 'Absent'),
(153, 9, 'Present'),
(154, 10, 'Absent'),
(155, 11, 'Present'),
(156, 12, 'Absent'),
(157, 13, NULL),
(158, 14, 'Absent'),
(159, 15, 'Present'),
(160, 16, 'Absent'),
(244, 17, 'Present'),
(162, 18, 'Absent'),
(163, 19, 'Present'),
(164, 20, 'Absent'),
(377, 21, 'Present'),
(407, 22, 'Absent'),
(167, 23, 'Present'),
(417, 24, 'Present'),
(169, 1, 'Present'),
(170, 2, 'Present'),
(171, 3, 'Present'),
(172, 4, 'Present'),
(173, 5, 'Present'),
(174, 6, 'Present'),
(175, 7, 'Present'),
(176, 8, 'Present'),
(177, 9, 'Present'),
(178, 10, 'Present'),
(179, 11, 'Present'),
(180, 12, 'Present'),
(181, 13, NULL),
(182, 14, 'Present'),
(183, 15, 'Present'),
(184, 16, 'Present'),
(243, 17, 'Present'),
(186, 18, 'Present'),
(187, 19, 'Present'),
(188, 20, 'Present'),
(376, 21, 'Present'),
(406, 22, 'Absent'),
(191, 23, 'Present'),
(416, 24, 'Present'),
(193, 1, 'Present'),
(194, 2, 'Present'),
(195, 3, 'Present'),
(196, 4, 'Present'),
(197, 5, 'Present'),
(198, 6, 'Absent'),
(199, 7, 'Present'),
(200, 8, 'Present'),
(201, 9, 'Present'),
(202, 10, 'Present'),
(203, 11, 'Present'),
(204, 12, 'Absent'),
(205, 13, NULL),
(206, 14, 'Present'),
(207, 15, 'Present'),
(208, 16, 'Present'),
(242, 17, 'Present'),
(210, 18, 'Absent'),
(211, 19, 'Present'),
(212, 20, 'Present'),
(375, 21, 'Present'),
(405, 22, 'Absent'),
(215, 23, 'Present'),
(415, 24, 'Present'),
(217, 1, 'Present'),
(218, 2, 'Present'),
(219, 3, 'Present'),
(220, 4, 'Present'),
(221, 5, 'Present'),
(222, 6, 'Present'),
(223, 7, 'Absent'),
(224, 8, 'Present'),
(225, 9, 'Present'),
(226, 10, 'Present'),
(227, 11, 'Present'),
(228, 12, 'Present'),
(229, 13, NULL),
(230, 14, 'Absent'),
(231, 15, 'Present'),
(232, 16, 'Present'),
(241, 17, 'Present'),
(234, 18, 'Present'),
(235, 19, 'Present'),
(236, 20, 'Present'),
(374, 21, 'Present'),
(404, 22, 'Present'),
(239, 23, 'Present'),
(414, 24, 'Present'),
(251, 17, 'Absent'),
(252, 36, 'Present'),
(253, 35, 'Present'),
(254, 34, 'Present'),
(255, 33, 'Present'),
(256, 32, 'Present'),
(257, 31, 'Present'),
(258, 30, 'Present'),
(259, 29, 'Present'),
(260, 28, 'Present'),
(261, 27, 'Present'),
(262, 26, 'Present'),
(452, 25, 'Absent'),
(264, 36, 'Present'),
(265, 35, 'Present'),
(266, 34, 'Present'),
(267, 33, 'Present'),
(268, 32, 'Present'),
(269, 31, 'Present'),
(270, 30, 'Present'),
(271, 29, 'Present'),
(272, 28, 'Present'),
(273, 27, 'Present'),
(274, 26, 'Present'),
(451, 25, 'Absent'),
(276, 36, 'Present'),
(277, 35, 'Present'),
(278, 34, 'Present'),
(279, 33, 'Present'),
(280, 32, 'Present'),
(281, 31, 'Present'),
(282, 30, 'Present'),
(283, 29, 'Present'),
(284, 28, 'Present'),
(285, 27, 'Present'),
(286, 26, 'Present'),
(450, 25, 'Absent'),
(288, 36, 'Present'),
(289, 35, 'Present'),
(290, 34, 'Present'),
(291, 33, 'Present'),
(292, 32, 'Present'),
(293, 31, 'Present'),
(294, 30, 'Present'),
(295, 29, 'Present'),
(296, 28, 'Present'),
(297, 27, 'Present'),
(298, 26, 'Present'),
(449, 25, 'Absent'),
(300, 36, 'Present'),
(301, 35, 'Present'),
(302, 34, 'Present'),
(303, 33, 'Present'),
(304, 32, 'Present'),
(305, 31, 'Present'),
(306, 30, 'Present'),
(307, 29, 'Present'),
(308, 28, 'Present'),
(309, 27, 'Present'),
(310, 26, 'Present'),
(448, 25, 'Absent'),
(312, 36, 'Present'),
(313, 35, 'Present'),
(314, 34, 'Present'),
(315, 33, 'Present'),
(316, 32, 'Present'),
(317, 31, 'Present'),
(318, 30, 'Present'),
(319, 29, 'Present'),
(320, 28, 'Present'),
(321, 27, 'Present'),
(322, 26, 'Present'),
(447, 25, 'Absent'),
(324, 36, 'Present'),
(325, 35, 'Present'),
(326, 34, 'Present'),
(327, 33, 'Present'),
(328, 32, 'Present'),
(329, 31, 'Present'),
(330, 30, 'Present'),
(331, 29, 'Present'),
(332, 28, 'Present'),
(333, 27, 'Present'),
(334, 26, 'Present'),
(446, 25, 'Absent'),
(336, 36, 'Present'),
(337, 35, 'Present'),
(338, 34, 'Present'),
(339, 33, 'Present'),
(340, 32, 'Present'),
(341, 31, 'Present'),
(342, 30, 'Present'),
(343, 29, 'Present'),
(344, 28, 'Present'),
(345, 27, 'Present'),
(346, 26, 'Present'),
(445, 25, 'Absent'),
(348, 36, 'Absent'),
(349, 35, 'Present'),
(350, 34, 'Present'),
(351, 33, 'Absent'),
(352, 32, 'Present'),
(353, 31, 'Present'),
(354, 30, 'Absent'),
(355, 29, 'Present'),
(356, 28, 'Present'),
(357, 27, 'Absent'),
(358, 26, 'Present'),
(444, 25, 'Absent'),
(360, 36, 'Absent'),
(361, 35, 'Present'),
(362, 34, 'Absent'),
(363, 33, 'Absent'),
(364, 32, 'Absent'),
(365, 31, 'Present'),
(366, 30, 'Absent'),
(367, 29, 'Present'),
(368, 28, 'Absent'),
(369, 27, 'Absent'),
(370, 26, 'Absent'),
(443, 25, 'Present'),
(372, 13, NULL),
(373, 40, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_records`
--

DROP TABLE IF EXISTS `attendance_records`;
CREATE TABLE IF NOT EXISTS `attendance_records` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `faculty_id` int NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('Present','Absent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `status`) VALUES
(1, 'BCA', 1),
(2, 'BBA', 1),
(3, 'B.Com', 1),
(4, 'BSc', 1),
(5, 'BA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE IF NOT EXISTS `exams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `total_marks` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_name`, `exam_date`, `total_marks`) VALUES
(1, 'First IA', '2026-01-05', 25),
(2, 'Second IA', '2026-02-05', 25),
(3, 'Mid Term', '2026-03-05', 50);

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

DROP TABLE IF EXISTS `login_logs`;
CREATE TABLE IF NOT EXISTS `login_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `login_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `exam_id` int DEFAULT NULL,
  `marks_obtained` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_student_subject_exam` (`student_id`,`subject_id`,`exam_id`)
) ENGINE=MyISAM AUTO_INCREMENT=547 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `subject_id`, `exam_id`, `marks_obtained`) VALUES
(1, 4, 1, 1, 11),
(2, 4, 1, 2, 12),
(3, 4, 1, 3, 21),
(4, 3, 1, 1, 21),
(5, 3, 1, 2, 22),
(6, 3, 1, 3, 41),
(7, 2, 1, 1, 16),
(8, 2, 1, 2, 17),
(9, 2, 1, 3, 31),
(10, 1, 1, 1, 19),
(11, 1, 1, 2, 20),
(12, 1, 1, 3, 37),
(13, 4, 2, 1, 12),
(14, 4, 2, 2, 13),
(15, 4, 2, 3, 22),
(16, 3, 2, 1, 22),
(17, 3, 2, 2, 23),
(18, 3, 2, 3, 42),
(19, 2, 2, 1, 17),
(20, 2, 2, 2, 18),
(21, 2, 2, 3, 32),
(22, 1, 2, 1, 20),
(23, 1, 2, 2, 21),
(24, 1, 2, 3, 38),
(25, 4, 3, 1, 13),
(26, 4, 3, 2, 14),
(27, 4, 3, 3, 23),
(28, 3, 3, 1, 23),
(29, 3, 3, 2, 24),
(30, 3, 3, 3, 43),
(31, 2, 3, 1, 18),
(32, 2, 3, 2, 19),
(33, 2, 3, 3, 33),
(34, 1, 3, 1, 21),
(35, 1, 3, 2, 22),
(36, 1, 3, 3, 39),
(37, 4, 4, 1, 14),
(38, 4, 4, 2, 15),
(39, 4, 4, 3, 24),
(40, 3, 4, 1, 24),
(41, 3, 4, 2, 25),
(42, 3, 4, 3, 44),
(43, 2, 4, 1, 19),
(44, 2, 4, 2, 20),
(45, 2, 4, 3, 34),
(46, 1, 4, 1, 22),
(47, 1, 4, 2, 23),
(48, 1, 4, 3, 40),
(49, 4, 5, 1, 15),
(50, 4, 5, 2, 16),
(51, 4, 5, 3, 25),
(52, 3, 5, 1, 20),
(53, 3, 5, 2, 21),
(54, 3, 5, 3, 45),
(55, 2, 5, 1, 20),
(56, 2, 5, 2, 21),
(57, 2, 5, 3, 35),
(58, 1, 5, 1, 23),
(59, 1, 5, 2, 24),
(60, 1, 5, 3, 41),
(61, 8, 6, 1, 16),
(62, 8, 6, 2, 17),
(63, 8, 6, 3, 26),
(64, 7, 6, 1, 21),
(65, 7, 6, 2, 22),
(66, 7, 6, 3, 46),
(67, 6, 6, 1, 21),
(68, 6, 6, 2, 22),
(69, 6, 6, 3, 36),
(70, 5, 6, 1, 18),
(71, 5, 6, 2, 19),
(72, 5, 6, 3, 42),
(73, 8, 7, 1, 17),
(74, 8, 7, 2, 18),
(75, 8, 7, 3, 27),
(76, 7, 7, 1, 22),
(77, 7, 7, 2, 23),
(78, 7, 7, 3, 47),
(79, 6, 7, 1, 15),
(80, 6, 7, 2, 16),
(81, 6, 7, 3, 37),
(82, 5, 7, 1, 19),
(83, 5, 7, 2, 20),
(84, 5, 7, 3, 43),
(85, 8, 8, 1, 10),
(86, 8, 8, 2, 11),
(87, 8, 8, 3, 28),
(88, 7, 8, 1, 23),
(89, 7, 8, 2, 24),
(90, 7, 8, 3, 40),
(91, 6, 8, 1, 16),
(92, 6, 8, 2, 17),
(93, 6, 8, 3, 38),
(94, 5, 8, 1, 20),
(95, 5, 8, 2, 21),
(96, 5, 8, 3, 44),
(97, 8, 9, 1, 11),
(98, 8, 9, 2, 12),
(99, 8, 9, 3, 29),
(100, 7, 9, 1, 24),
(101, 7, 9, 2, 25),
(102, 7, 9, 3, 41),
(103, 6, 9, 1, 17),
(104, 6, 9, 2, 18),
(105, 6, 9, 3, 39),
(106, 5, 9, 1, 21),
(107, 5, 9, 2, 22),
(108, 5, 9, 3, 45),
(109, 8, 10, 1, 12),
(110, 8, 10, 2, 13),
(111, 8, 10, 3, 30),
(112, 7, 10, 1, 20),
(113, 7, 10, 2, 21),
(114, 7, 10, 3, 42),
(115, 6, 10, 1, 18),
(116, 6, 10, 2, 19),
(117, 6, 10, 3, 40),
(118, 5, 10, 1, 22),
(119, 5, 10, 2, 23),
(120, 5, 10, 3, 36),
(121, 12, 11, 1, 13),
(122, 12, 11, 2, 14),
(123, 12, 11, 3, 31),
(124, 11, 11, 1, 21),
(125, 11, 11, 2, 22),
(126, 11, 11, 3, 43),
(127, 10, 11, 1, 19),
(128, 10, 11, 2, 20),
(129, 10, 11, 3, 41),
(130, 9, 11, 1, 23),
(131, 9, 11, 2, 24),
(132, 9, 11, 3, 37),
(133, 12, 12, 1, 14),
(134, 12, 12, 2, 15),
(135, 12, 12, 3, 20),
(136, 11, 12, 1, 22),
(137, 11, 12, 2, 23),
(138, 11, 12, 3, 44),
(139, 10, 12, 1, 20),
(140, 10, 12, 2, 21),
(141, 10, 12, 3, 30),
(142, 9, 12, 1, 18),
(143, 9, 12, 2, 19),
(144, 9, 12, 3, 38),
(145, 12, 13, 1, 15),
(146, 12, 13, 2, 16),
(147, 12, 13, 3, 21),
(148, 11, 13, 1, 23),
(149, 11, 13, 2, 24),
(150, 11, 13, 3, 45),
(151, 10, 13, 1, 21),
(152, 10, 13, 2, 22),
(153, 10, 13, 3, 31),
(154, 9, 13, 1, 19),
(155, 9, 13, 2, 20),
(156, 9, 13, 3, 39),
(157, 12, 14, 1, 16),
(158, 12, 14, 2, 17),
(159, 12, 14, 3, 22),
(160, 11, 14, 1, 24),
(161, 11, 14, 2, 25),
(162, 11, 14, 3, 46),
(163, 10, 14, 1, 15),
(164, 10, 14, 2, 16),
(165, 10, 14, 3, 32),
(166, 9, 14, 1, 20),
(167, 9, 14, 2, 21),
(168, 9, 14, 3, 40),
(169, 12, 15, 1, 17),
(170, 12, 15, 2, 18),
(171, 12, 15, 3, 23),
(172, 11, 15, 1, 20),
(173, 11, 15, 2, 21),
(174, 11, 15, 3, 47),
(175, 10, 15, 1, 16),
(176, 10, 15, 2, 17),
(177, 10, 15, 3, 33),
(178, 9, 15, 1, 21),
(179, 9, 15, 2, 22),
(180, 9, 15, 3, 41),
(181, 16, 16, 1, 10),
(182, 16, 16, 2, 11),
(183, 16, 16, 3, 24),
(184, 15, 16, 1, 21),
(185, 15, 16, 2, 22),
(186, 15, 16, 3, 40),
(187, 14, 16, 1, 17),
(188, 14, 16, 2, 18),
(189, 14, 16, 3, 34),
(190, 13, 16, 1, 22),
(191, 13, 16, 2, 23),
(192, 13, 16, 3, 42),
(193, 16, 17, 1, 11),
(194, 16, 17, 2, 12),
(195, 16, 17, 3, 25),
(196, 15, 17, 1, 22),
(197, 15, 17, 2, 23),
(198, 15, 17, 3, 41),
(199, 14, 17, 1, 18),
(200, 14, 17, 2, 19),
(201, 14, 17, 3, 35),
(202, 13, 17, 1, 23),
(203, 13, 17, 2, 24),
(204, 13, 17, 3, 43),
(205, 16, 18, 1, 12),
(206, 16, 18, 2, 13),
(207, 16, 18, 3, 26),
(208, 15, 18, 1, 23),
(209, 15, 18, 2, 24),
(210, 15, 18, 3, 42),
(211, 14, 18, 1, 19),
(212, 14, 18, 2, 20),
(213, 14, 18, 3, 36),
(214, 13, 18, 1, 18),
(215, 13, 18, 2, 19),
(216, 13, 18, 3, 44),
(217, 16, 19, 1, 13),
(218, 16, 19, 2, 14),
(219, 16, 19, 3, 27),
(220, 15, 19, 1, 24),
(221, 15, 19, 2, 25),
(222, 15, 19, 3, 43),
(223, 14, 19, 1, 20),
(224, 14, 19, 2, 21),
(225, 14, 19, 3, 37),
(226, 13, 19, 1, 19),
(227, 13, 19, 2, 20),
(228, 13, 19, 3, 45),
(229, 16, 20, 1, 14),
(230, 16, 20, 2, 15),
(231, 16, 20, 3, 28),
(232, 15, 20, 1, 20),
(233, 15, 20, 2, 21),
(234, 15, 20, 3, 44),
(235, 14, 20, 1, 21),
(236, 14, 20, 2, 22),
(237, 14, 20, 3, 38),
(238, 13, 20, 1, 20),
(239, 13, 20, 2, 21),
(240, 13, 20, 3, 36),
(241, 20, 21, 1, 15),
(242, 20, 21, 2, 16),
(243, 20, 21, 3, 29),
(244, 19, 21, 1, 21),
(245, 19, 21, 2, 22),
(246, 19, 21, 3, 45),
(247, 18, 21, 1, 15),
(248, 18, 21, 2, 16),
(249, 18, 21, 3, 39),
(250, 17, 21, 1, 21),
(251, 17, 21, 2, 22),
(252, 17, 21, 3, 37),
(253, 20, 22, 1, 16),
(254, 20, 22, 2, 17),
(255, 20, 22, 3, 30),
(256, 19, 22, 1, 22),
(257, 19, 22, 2, 23),
(258, 19, 22, 3, 46),
(259, 18, 22, 1, 16),
(260, 18, 22, 2, 17),
(261, 18, 22, 3, 40),
(262, 17, 22, 1, 22),
(263, 17, 22, 2, 23),
(264, 17, 22, 3, 38),
(265, 20, 23, 1, 17),
(266, 20, 23, 2, 18),
(267, 20, 23, 3, 31),
(268, 19, 23, 1, 23),
(269, 19, 23, 2, 24),
(270, 19, 23, 3, 47),
(271, 18, 23, 1, 17),
(272, 18, 23, 2, 18),
(273, 18, 23, 3, 41),
(274, 17, 23, 1, 23),
(275, 17, 23, 2, 15),
(276, 17, 23, 3, 39),
(277, 20, 24, 1, 10),
(278, 20, 24, 2, 11),
(279, 20, 24, 3, 20),
(280, 19, 24, 1, 24),
(281, 19, 24, 2, 25),
(282, 19, 24, 3, 40),
(283, 18, 24, 1, 18),
(284, 18, 24, 2, 19),
(285, 18, 24, 3, 30),
(286, 17, 24, 1, 18),
(287, 17, 24, 2, 20),
(288, 17, 24, 3, 40),
(289, 20, 25, 1, 11),
(290, 20, 25, 2, 12),
(291, 20, 25, 3, 21),
(292, 19, 25, 1, 20),
(293, 19, 25, 2, 21),
(294, 19, 25, 3, 41),
(295, 18, 25, 1, 2),
(296, 18, 25, 2, 0),
(297, 18, 25, 3, 12),
(298, 17, 25, 1, 19),
(299, 17, 25, 2, 20),
(300, 17, 25, 3, 41),
(301, 24, 26, 1, 13),
(302, 24, 26, 2, 12),
(303, 24, 26, 3, 25),
(304, 23, 26, 1, 1),
(305, 23, 26, 2, 3),
(306, 23, 26, 3, 11),
(307, 22, 26, 1, 25),
(308, 22, 26, 2, 25),
(309, 22, 26, 3, 50),
(310, 21, 26, 1, 25),
(311, 21, 26, 2, 25),
(312, 21, 26, 3, 50),
(313, 24, 27, 1, 12),
(314, 24, 27, 2, 13),
(315, 24, 27, 3, 25),
(316, 23, 27, 1, 4),
(317, 23, 27, 2, 0),
(318, 23, 27, 3, 5),
(319, 22, 27, 1, 25),
(320, 22, 27, 2, 25),
(321, 22, 27, 3, 50),
(322, 21, 27, 1, 25),
(323, 21, 27, 2, 25),
(324, 21, 27, 3, 50),
(325, 24, 28, 1, 13),
(326, 24, 28, 2, 12),
(327, 24, 28, 3, 25),
(328, 23, 28, 1, 3),
(329, 23, 28, 2, 1),
(330, 23, 28, 3, 8),
(331, 22, 28, 1, 25),
(332, 22, 28, 2, 25),
(333, 22, 28, 3, 50),
(334, 21, 28, 1, 25),
(335, 21, 28, 2, 25),
(336, 21, 28, 3, 50),
(337, 24, 29, 1, 13),
(338, 24, 29, 2, 12),
(339, 24, 29, 3, 25),
(340, 23, 29, 1, 5),
(341, 23, 29, 2, 2),
(342, 23, 29, 3, 6),
(343, 22, 29, 1, 25),
(344, 22, 29, 2, 25),
(345, 22, 29, 3, 45),
(346, 21, 29, 1, 25),
(347, 21, 29, 2, 25),
(348, 21, 29, 3, 50),
(349, 24, 30, 1, 12),
(350, 24, 30, 2, 13),
(351, 24, 30, 3, 25),
(352, 23, 30, 1, 0),
(353, 23, 30, 2, 4),
(354, 23, 30, 3, 4),
(355, 22, 30, 1, 25),
(356, 22, 30, 2, 25),
(357, 22, 30, 3, 50),
(358, 21, 30, 1, 25),
(359, 21, 30, 2, 25),
(360, 21, 30, 3, 50),
(361, 26, 31, 1, 23),
(362, 26, 31, 2, 21),
(363, 26, 31, 3, 37),
(364, 25, 31, 1, 0),
(365, 25, 31, 2, 14),
(366, 25, 31, 3, 17),
(367, 26, 32, 1, 23),
(368, 26, 32, 2, 21),
(369, 26, 32, 3, 37),
(370, 25, 32, 1, 0),
(371, 25, 32, 2, 0),
(372, 25, 32, 3, 5),
(373, 26, 33, 1, 23),
(374, 26, 33, 2, 21),
(375, 26, 33, 3, 37),
(376, 25, 33, 1, 5),
(377, 25, 33, 2, 0),
(378, 25, 33, 3, 4),
(379, 26, 34, 1, 23),
(380, 26, 34, 2, 21),
(381, 26, 34, 3, 37),
(382, 25, 34, 1, 6),
(383, 25, 34, 2, 15),
(384, 25, 34, 3, 3),
(385, 26, 35, 1, 23),
(386, 26, 35, 2, 21),
(387, 26, 35, 3, 37),
(388, 25, 35, 1, 7),
(389, 25, 35, 2, 0),
(390, 25, 35, 3, 12),
(391, 28, 36, 1, 18),
(392, 28, 36, 2, 23),
(393, 28, 36, 3, 39),
(394, 27, 36, 1, 24),
(395, 27, 36, 2, 22),
(396, 27, 36, 3, 38),
(397, 28, 37, 1, 18),
(398, 28, 37, 2, 23),
(399, 28, 37, 3, 39),
(400, 27, 37, 1, 24),
(401, 27, 37, 2, 22),
(402, 27, 37, 3, 38),
(403, 28, 38, 1, 18),
(404, 28, 38, 2, 23),
(405, 28, 38, 3, 39),
(406, 27, 38, 1, 24),
(407, 27, 38, 2, 22),
(408, 27, 38, 3, 38),
(409, 28, 39, 1, 18),
(410, 28, 39, 2, 23),
(411, 28, 39, 3, 39),
(412, 27, 39, 1, 24),
(413, 27, 39, 2, 22),
(414, 27, 39, 3, 38),
(415, 28, 40, 1, 18),
(416, 28, 40, 2, 23),
(417, 28, 40, 3, 39),
(418, 27, 40, 1, 24),
(419, 27, 40, 2, 22),
(420, 27, 40, 3, 38),
(421, 30, 41, 1, 20),
(422, 30, 41, 2, 19),
(423, 30, 41, 3, 41),
(424, 29, 41, 1, 19),
(425, 29, 41, 2, 24),
(426, 29, 41, 3, 40),
(427, 30, 42, 1, 20),
(428, 30, 42, 2, 19),
(429, 30, 42, 3, 41),
(430, 29, 42, 1, 19),
(431, 29, 42, 2, 24),
(432, 29, 42, 3, 40),
(433, 30, 43, 1, 20),
(434, 30, 43, 2, 19),
(435, 30, 43, 3, 41),
(436, 29, 43, 1, 19),
(437, 29, 43, 2, 24),
(438, 29, 43, 3, 40),
(439, 30, 44, 1, 20),
(440, 30, 44, 2, 19),
(441, 30, 44, 3, 41),
(442, 29, 44, 1, 19),
(443, 29, 44, 2, 24),
(444, 29, 44, 3, 40),
(445, 30, 45, 1, 20),
(446, 30, 45, 2, 19),
(447, 30, 45, 3, 41),
(448, 29, 45, 1, 19),
(449, 29, 45, 2, 24),
(450, 29, 45, 3, 40),
(451, 32, 46, 1, 22),
(452, 32, 46, 2, 21),
(453, 32, 46, 3, 43),
(454, 31, 46, 1, 21),
(455, 31, 46, 2, 20),
(456, 31, 46, 3, 42),
(457, 32, 47, 1, 22),
(458, 32, 47, 2, 21),
(459, 32, 47, 3, 43),
(460, 31, 47, 1, 21),
(461, 31, 47, 2, 20),
(462, 31, 47, 3, 42),
(463, 32, 48, 1, 22),
(464, 32, 48, 2, 21),
(465, 32, 48, 3, 43),
(466, 31, 48, 1, 21),
(467, 31, 48, 2, 20),
(468, 31, 48, 3, 42),
(469, 32, 49, 1, 22),
(470, 32, 49, 2, 21),
(471, 32, 49, 3, 43),
(472, 31, 49, 1, 21),
(473, 31, 49, 2, 20),
(474, 31, 49, 3, 42),
(475, 32, 50, 1, 22),
(476, 32, 50, 2, 21),
(477, 32, 50, 3, 43),
(478, 31, 50, 1, 21),
(479, 31, 50, 2, 20),
(480, 31, 50, 3, 42),
(481, 34, 51, 1, 24),
(482, 34, 51, 2, 23),
(483, 34, 51, 3, 45),
(484, 33, 51, 1, 23),
(485, 33, 51, 2, 22),
(486, 33, 51, 3, 44),
(487, 34, 52, 1, 24),
(488, 34, 52, 2, 23),
(489, 34, 52, 3, 45),
(490, 33, 52, 1, 23),
(491, 33, 52, 2, 22),
(492, 33, 52, 3, 44),
(493, 34, 53, 1, 24),
(494, 34, 53, 2, 23),
(495, 34, 53, 3, 45),
(496, 33, 53, 1, 23),
(497, 33, 53, 2, 22),
(498, 33, 53, 3, 44),
(499, 34, 54, 1, 24),
(500, 34, 54, 2, 23),
(501, 34, 54, 3, 45),
(502, 33, 54, 1, 23),
(503, 33, 54, 2, 22),
(504, 33, 54, 3, 44),
(505, 34, 55, 1, 24),
(506, 34, 55, 2, 23),
(507, 34, 55, 3, 45),
(508, 33, 55, 1, 23),
(509, 33, 55, 2, 22),
(510, 33, 55, 3, 44),
(511, 36, 56, 1, 19),
(512, 36, 56, 2, 19),
(513, 36, 56, 3, 35),
(514, 35, 56, 1, 18),
(515, 35, 56, 2, 24),
(516, 35, 56, 3, 46),
(517, 36, 57, 1, 19),
(518, 36, 57, 2, 19),
(519, 36, 57, 3, 35),
(520, 35, 57, 1, 18),
(521, 35, 57, 2, 24),
(522, 35, 57, 3, 46),
(523, 36, 58, 1, 19),
(524, 36, 58, 2, 19),
(525, 36, 58, 3, 35),
(526, 35, 58, 1, 18),
(527, 35, 58, 2, 24),
(528, 35, 58, 3, 46),
(529, 36, 59, 1, 19),
(530, 36, 59, 2, 19),
(531, 36, 59, 3, 35),
(532, 35, 59, 1, 18),
(533, 35, 59, 2, 24),
(534, 35, 59, 3, 46),
(535, 36, 60, 1, 19),
(536, 36, 60, 2, 19),
(537, 36, 60, 3, 35),
(538, 35, 60, 1, 18),
(539, 35, 60, 2, 24),
(540, 35, 60, 3, 46),
(541, 13, 1, 1, 22),
(542, 13, 1, 2, 22),
(543, 13, 1, 3, 42),
(544, 40, 1, 1, 22),
(545, 40, 1, 2, 15),
(546, 40, 1, 3, 40);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default-user.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `department`, `avatar_url`) VALUES
(20, 23, 'Faculty', 'User', '9876543000', 'BCA', NULL),
(27, 95, 'admin', 'mirja', '8095091813', 'Administration', NULL),
(31, 265, 'john', 'mirja', '8095091813', 'BCA', NULL),
(32, 266, 'moin', 'bentur', '9987654567', 'BCA', NULL),
(33, 267, 'moin', 'bentru', '8904343657', 'BCA', NULL),
(34, 268, 'moin', 'bentru', '8904343657', 'BBA', NULL),
(35, 269, 'jhgfds', 'mngfy', '8095091813', 'BCA', NULL),
(36, 270, 'bentru', 'moin', '8904343657', 'BCA', NULL),
(38, 272, 'saqlain', 'mithagar', '8660782187', 'BCA', NULL),
(39, 273, 'sam', 'mirja', '8095091813', 'BCA', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `description`, `created_at`) VALUES
(1, 'Admin', 'Full system access', '2026-03-10 03:17:49'),
(2, 'Faculty', 'Academic and student management', '2026-03-10 03:17:49'),
(3, 'Student', 'View grades and attendance', '2026-03-10 03:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section_name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `status`) VALUES
(1, 'A', 1),
(2, 'B', 1),
(3, 'C', 1),
(4, 'D', 1),
(5, 'E', 1),
(6, 'F', 1);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

DROP TABLE IF EXISTS `semesters`;
CREATE TABLE IF NOT EXISTS `semesters` (
  `id` int NOT NULL AUTO_INCREMENT,
  `semester_number` int NOT NULL,
  `semester_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester_number`, `semester_name`, `status`) VALUES
(1, 1, '1st Semester', 1),
(2, 2, '2nd Semester', 1),
(3, 3, '3rd Semester', 1),
(4, 4, '4th Semester', 1),
(5, 5, '5th Semester', 1),
(6, 6, '6th Semester', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `candidate_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  `semester_id` int DEFAULT NULL,
  `section_id` int DEFAULT NULL,
  `student_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academic_year` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `candidate_name`, `course_id`, `semester_id`, `section_id`, `student_id`, `department`, `semester`, `section`, `academic_year`, `parent_phone`) VALUES
(1, 'Arman Shaikh', 1, 1, 1, 'BCA1A001', 'BCA', '1st Semester', 'A', '2025-26', '9876543101'),
(2, 'Neha Patil', 1, 1, 1, 'BCA1A002', 'BCA', '1st Semester', 'A', '2025-26', '9876543102'),
(3, 'Imran Khan', 1, 1, 1, 'BCA1A003', 'BCA', '1st Semester', 'A', '2025-26', '9876543103'),
(4, 'Pooja Desai', 1, 1, 1, 'BCA1A004', 'BCA', '1st Semester', 'A', '2025-26', '9876543104'),
(5, 'Sameer Nadaf', 1, 2, 2, 'BCA2B001', 'BCA', '2nd Semester', 'B', '2025-26', '9876543201'),
(6, 'Aisha Shaikh', 1, 2, 2, 'BCA2B002', 'BCA', '2nd Semester', 'B', '2025-26', '9876543202'),
(7, 'Kiran Gowda', 1, 2, 2, 'BCA2B003', 'BCA', '2nd Semester', 'B', '2025-26', '9876543203'),
(8, 'Sneha Kulkarni', 1, 2, 2, 'BCA2B004', 'BCA', '2nd Semester', 'B', '2025-26', '9876543204'),
(9, 'Noman Ali', 1, 3, 3, 'BCA3C001', 'BCA', '3rd Semester', 'C', '2025-26', '9876543301'),
(10, 'Sana Khan', 1, 3, 3, 'BCA3C002', 'BCA', '3rd Semester', 'C', '2025-26', '9876543302'),
(11, 'Vikas Naik', 1, 3, 3, 'BCA3C003', 'BCA', '3rd Semester', 'C', '2025-26', '9876543303'),
(12, 'Riya Sharma', 1, 3, 3, 'BCA3C004', 'BCA', '3rd Semester', 'C', '2025-26', '9876543304'),
(13, 'Aditya Joshi', 1, 4, 4, 'BCA4D001', 'BCA', '4th Semester', 'D', '2025-26', '9876543401'),
(14, 'Hina Shaikh', 1, 4, 4, 'BCA4D002', 'BCA', '4th Semester', 'D', '2025-26', '9876543402'),
(15, 'Manoj Patil', 1, 4, 4, 'BCA4D003', 'BCA', '4th Semester', 'D', '2025-26', '9876543403'),
(16, 'Fatima Khan', 1, 4, 4, 'BCA4D004', 'BCA', '4th Semester', 'D', '2025-26', '9876543404'),
(17, 'Saad Mirja', 1, 5, 5, 'BCA5E001', 'BCA', '5th Semester', 'E', '2025-26', '9876543501'),
(18, 'Ali Khan', 1, 5, 5, 'BCA5E002', 'BCA', '5th Semester', 'E', '2025-26', '9876543502'),
(19, 'Sara Sheikh', 1, 5, 5, 'BCA5E003', 'BCA', '5th Semester', 'E', '2025-26', '9876543503'),
(20, 'Ayesha Khan', 1, 5, 5, 'BCA5E004', 'BCA', '5th Semester', 'E', '2025-26', '9876543504'),
(21, 'Mehul Jain', 1, 6, 6, 'BCA6F001', 'BCA', '6th Semester', 'F', '2025-26', '9876543601'),
(22, 'Nida Shaikh', 1, 6, 6, 'BCA6F002', 'BCA', '6th Semester', 'F', '2025-26', '9876543602'),
(23, 'Pratik Rao', 1, 6, 6, 'BCA6F003', 'BCA', '6th Semester', 'F', '2025-26', '9876543603'),
(24, 'Shreya Hegde', 1, 6, 6, 'BCA6F004', 'BCA', '6th Semester', 'F', '2025-26', '9876543604'),
(25, 'Priya Verma', 1, 6, 6, 'BCA6F005', 'BCA', '6th semester', 'F', '2025-26', '3456787655'),
(26, 'Prazwal', 2, 1, 1, 'BBA251002', 'BBA', 'Semester 1', 'A', '2025-26', NULL),
(27, 'Rajesh Kumar', 2, 2, 2, 'BBA252001', 'BBA', 'Semester 2', 'B', '2025-26', NULL),
(28, 'Divya Patel', 2, 2, 2, 'BBA252002', 'BBA', 'Semester 2', 'B', '2025-26', NULL),
(29, 'Singh', 2, 3, 3, 'BBA253001', 'BBA', 'Semester 3', 'C', '2025-26', NULL),
(30, 'Gupta', 2, 3, 3, 'BBA253002', 'BBA', 'Semester 3', 'C', '2025-26', NULL),
(31, 'Rohit Joshi', 2, 4, 4, 'BBA254001', 'BBA', 'Semester 4', 'D', '2025-26', NULL),
(32, 'Ananya Desai', 2, 4, 4, 'BBA254002', 'BBA', 'Semester 4', 'D', '2025-26', NULL),
(33, 'Vikram Reddy', 2, 5, 5, 'BBA255001', 'BBA', 'Semester 5', 'E', '2025-26', NULL),
(34, 'Nair', 2, 5, 5, 'BBA255002', 'BBA', 'Semester 5', 'E', '2025-26', NULL),
(35, 'Siddharth Iyer', 2, 6, 6, 'BBA256001', 'BBA', 'Semester 6', 'F', '2025-26', NULL),
(36, 'Isha Malhotra', 2, 6, 6, 'BBA256002', 'BBA', 'Semester 6', 'F', '2025-26', NULL),
(37, 'jhgfds mngfy', 1, 1, 1, 'STU2365', 'BCA', '1st semester', 'A', '2026-2027', '8095091813'),
(38, 'bentru moin', 1, 1, 1, 'STU1364', 'BCA', '1st semester', 'A', '2026-2027', '8904343657'),
(39, 'saqlain mithagar', 1, 1, 1, 'STU1541', 'BCA', '3', 'C', '2025', '8660782187'),
(40, 'sam mirja', 1, 1, 1, 'STU3314', 'BCA', '6', 'F', '2025', '8095091813');

-- --------------------------------------------------------

--
-- Table structure for table `student_teacher_notes`
--

DROP TABLE IF EXISTS `student_teacher_notes`;
CREATE TABLE IF NOT EXISTS `student_teacher_notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `faculty_user_id` int NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_teacher_notes`
--

INSERT INTO `student_teacher_notes` (`id`, `student_id`, `faculty_user_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 17, 23, 'congratulation saad mirja for wonderful result.........\r\nfor the nxt time be focused on each subject that will led u to the neareast rank of top 5', '2026-05-01 02:53:09', '2026-05-05 07:18:49'),
(2, 1, 23, 'hi', '2026-05-06 11:19:46', '2026-05-06 11:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_id` int DEFAULT NULL,
  `semester_id` int DEFAULT NULL,
  `subject_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `course_id`, `semester_id`, `subject_name`) VALUES
(1, 1, 1, 'Fundamentals of Computer Applications'),
(2, 1, 1, 'Digital Logic'),
(3, 1, 1, 'Mathematics I'),
(4, 1, 1, 'Communication Skills'),
(5, 1, 1, 'Office Automation Tools'),
(6, 1, 2, 'C Programming'),
(7, 1, 2, 'Discrete Mathematics'),
(8, 1, 2, 'Computer Organization'),
(9, 1, 2, 'Environmental Studies'),
(10, 1, 2, 'Data Communication Basics'),
(11, 1, 3, 'Data Structures'),
(12, 1, 3, 'Database Management System'),
(13, 1, 3, 'Operating System'),
(14, 1, 3, 'Object Oriented Programming'),
(15, 1, 3, 'Web Technology I'),
(16, 1, 4, 'Java Programming'),
(17, 1, 4, 'Computer Networks'),
(18, 1, 4, 'Software Engineering'),
(19, 1, 4, 'Web Technology II'),
(20, 1, 4, 'Numerical Methods'),
(21, 1, 5, 'PHP and MySQL'),
(22, 1, 5, 'Python Programming'),
(23, 1, 5, 'Mobile Application Development'),
(24, 1, 5, 'Cloud Computing'),
(25, 1, 5, 'Cyber Security'),
(26, 1, 6, 'Artificial Intelligence'),
(27, 1, 6, 'Machine Learning'),
(28, 1, 6, 'Project Work'),
(29, 1, 6, 'Software Testing'),
(30, 1, 6, 'Entrepreneurship Development'),
(31, 2, 1, 'Principles of Management'),
(32, 2, 1, 'Financial Accounting'),
(33, 2, 1, 'Business Economics'),
(34, 2, 1, 'Business Communication'),
(35, 2, 1, 'Computer Applications in Business'),
(36, 2, 2, 'Organizational Behaviour'),
(37, 2, 2, 'Business Mathematics'),
(38, 2, 2, 'Cost Accounting'),
(39, 2, 2, 'Environmental Studies'),
(40, 2, 2, 'Business Statistics'),
(41, 2, 3, 'Marketing Management'),
(42, 2, 3, 'Human Resource Management'),
(43, 2, 3, 'Corporate Accounting'),
(44, 2, 3, 'Business Law'),
(45, 2, 3, 'Entrepreneurship Development'),
(46, 2, 4, 'Financial Management'),
(47, 2, 4, 'Production and Operations Management'),
(48, 2, 4, 'Research Methodology'),
(49, 2, 4, 'Company Law'),
(50, 2, 4, 'Indian Financial System'),
(51, 2, 5, 'Strategic Management'),
(52, 2, 5, 'Income Tax Law and Practice'),
(53, 2, 5, 'Consumer Behaviour'),
(54, 2, 5, 'Management Accounting'),
(55, 2, 5, 'International Business'),
(56, 2, 6, 'Business Policy'),
(57, 2, 6, 'Project Management'),
(58, 2, 6, 'Banking and Insurance'),
(59, 2, 6, 'E-Commerce'),
(60, 2, 6, 'Project Work / Internship');

-- --------------------------------------------------------

--
-- Table structure for table `subject_attendance`
--

DROP TABLE IF EXISTS `subject_attendance`;
CREATE TABLE IF NOT EXISTS `subject_attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `total_classes` int DEFAULT '0',
  `present_classes` int DEFAULT '0',
  `absent_classes` int DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_attendance`
--

INSERT INTO `subject_attendance` (`id`, `student_id`, `subject_id`, `total_classes`, `present_classes`, `absent_classes`, `updated_at`) VALUES
(1, 21, 26, 25, 24, 1, '2026-05-15 04:59:09'),
(2, 22, 26, 25, 9, 16, '2026-05-15 04:59:09'),
(3, 23, 26, 25, 22, 3, '2026-05-15 04:59:09'),
(4, 25, 26, 25, 12, 13, '2026-05-15 04:59:09'),
(5, 24, 26, 25, 13, 12, '2026-05-15 04:29:10'),
(6, 18, 25, 25, 17, 8, '2026-05-15 04:40:22'),
(7, 20, 25, 25, 18, 7, '2026-05-15 04:40:22'),
(8, 17, 25, 25, 22, 3, '2026-05-15 04:40:22'),
(9, 19, 25, 25, 23, 2, '2026-05-15 04:40:22'),
(10, 9, 11, 25, 18, 7, '2026-05-15 05:10:10'),
(11, 12, 11, 24, 22, 2, '2026-05-15 05:10:10'),
(12, 10, 11, 25, 12, 13, '2026-05-15 05:10:10'),
(13, 11, 11, 25, 21, 4, '2026-05-15 05:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `student_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','suspended') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uuid` (`uuid`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `email`, `password_hash`, `role_id`, `student_id`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
(23, '8dae85d6449711f18cc1c01803c3d025', 'faculty@gmail.com', '$2y$12$V9GtBHcQ5IIvE3vXMm/x6OEgM3to2cByQym1zpcXXazSWs10L8wm2', 2, NULL, 'active', '2026-05-14 20:27:22', '2026-04-30 13:21:53', '2026-05-14 14:57:22'),
(95, 'd80e7f01542914bf', 'admin@gmail.com', '$2y$10$5d.eSNblOXhudeJWU0qaueoDt3GYiMNn/G2PynFMHC7V3lcSa9Zgu', 1, NULL, 'active', '2026-05-14 15:01:45', '2026-05-12 10:05:09', '2026-05-14 09:31:45'),
(199, '09afbf97-4e75-11f1-bcfd-c01803c3d025', 'arman@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA1A001', 'active', '2026-05-14 14:37:41', '2026-05-13 02:40:00', '2026-05-14 09:07:41'),
(200, '09afcad6-4e75-11f1-bcfd-c01803c3d025', 'neha@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA1A002', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(201, '09afcc74-4e75-11f1-bcfd-c01803c3d025', 'imran@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA1A003', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(202, '09afcd65-4e75-11f1-bcfd-c01803c3d025', 'pooja@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA1A004', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(203, '09afce59-4e75-11f1-bcfd-c01803c3d025', 'sameer@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA2B001', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(204, '09afcf3c-4e75-11f1-bcfd-c01803c3d025', 'aisha@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA2B002', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(205, '09afd161-4e75-11f1-bcfd-c01803c3d025', 'kiran@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA2B003', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(206, '09afd29d-4e75-11f1-bcfd-c01803c3d025', 'sneha@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA2B004', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(207, '09afd386-4e75-11f1-bcfd-c01803c3d025', 'noman@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA3C001', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(208, '09afd481-4e75-11f1-bcfd-c01803c3d025', 'sana@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA3C002', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(209, '09afd581-4e75-11f1-bcfd-c01803c3d025', 'vikas@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA3C003', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(210, '09afd69c-4e75-11f1-bcfd-c01803c3d025', 'riya@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA3C004', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(211, '09afd770-4e75-11f1-bcfd-c01803c3d025', 'aditya@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA4D001', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(212, '09afd843-4e75-11f1-bcfd-c01803c3d025', 'hina@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA4D002', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(213, '09afd91d-4e75-11f1-bcfd-c01803c3d025', 'manoj@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA4D003', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(214, '09afd9ed-4e75-11f1-bcfd-c01803c3d025', 'fatima@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA4D004', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(215, '09afdabe-4e75-11f1-bcfd-c01803c3d025', 'saad@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA5E001', 'active', '2026-05-14 15:02:03', '2026-05-13 02:40:00', '2026-05-14 09:32:03'),
(216, '09afdb96-4e75-11f1-bcfd-c01803c3d025', 'ali@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA5E002', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(217, '09afdc6d-4e75-11f1-bcfd-c01803c3d025', 'sara@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA5E003', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(218, '09afddea-4e75-11f1-bcfd-c01803c3d025', 'ayesha@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA5E004', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(219, '09afdebe-4e75-11f1-bcfd-c01803c3d025', 'mehul@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA6F001', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(220, '09afdf9b-4e75-11f1-bcfd-c01803c3d025', 'nida@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA6F002', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(221, '09afe079-4e75-11f1-bcfd-c01803c3d025', 'pratik@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA6F003', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(222, '09afe14f-4e75-11f1-bcfd-c01803c3d025', 'shreya@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA6F004', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(223, '09afe225-4e75-11f1-bcfd-c01803c3d025', 'priya@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BCA6F005', 'active', '2026-05-14 14:46:42', '2026-05-13 02:40:00', '2026-05-14 09:16:42'),
(224, '09afe2fc-4e75-11f1-bcfd-c01803c3d025', 'prazwal@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BBA251002', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(225, '09afe3cc-4e75-11f1-bcfd-c01803c3d025', 'rajesh@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BBA252001', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(226, '09afe49f-4e75-11f1-bcfd-c01803c3d025', 'divya@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BBA252002', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(227, '09afe5ae-4e75-11f1-bcfd-c01803c3d025', 'singh@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BBA253001', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(228, '09afe68a-4e75-11f1-bcfd-c01803c3d025', 'gupta@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BBA253002', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(229, '09afe75a-4e75-11f1-bcfd-c01803c3d025', 'rohit@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BBA254001', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(230, '09afe82f-4e75-11f1-bcfd-c01803c3d025', 'ananya@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BBA254002', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(231, '09afe90a-4e75-11f1-bcfd-c01803c3d025', 'vikram@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BBA255001', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(232, '09afe9f2-4e75-11f1-bcfd-c01803c3d025', 'nair@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BBA255002', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(233, '09afead5-4e75-11f1-bcfd-c01803c3d025', 'siddharth@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BBA256001', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(234, '09afebb5-4e75-11f1-bcfd-c01803c3d025', 'isha@gmail.com', '$2y$10$keXp/6wzS2J1jkXpPReqFuwB.w78clKHuyNvdy3v2rlMa06LlrjKK', 3, 'BBA256002', 'active', NULL, '2026-05-13 02:40:00', '2026-05-13 02:59:34'),
(265, '48c3ca03196a468d', 'john@gmail.com', '$2y$10$QneXy2ppmWAlLOaRY.BsDus.L7kCijE7x/QUGmsb9lCTcUG9n2I1q', 3, NULL, 'active', NULL, '2026-05-13 05:49:02', '2026-05-13 05:49:02'),
(266, 'b47d4faec516e6d7', 'moin@gmail.com', '$2y$10$KvU5avFArwf0rcAx3NQJseUz2RCe.un40pMhSETuL0Ax279Csj.6K', 3, NULL, 'active', NULL, '2026-05-13 07:24:38', '2026-05-13 07:24:38'),
(267, '006552e762ce07aa', 'moinraza74@gmail.com', '$2y$10$.U3b4W4JQAhWTnRaejn2OON07t47jZnsa6xLJYe49GesDuAr9O7rm', 3, NULL, 'active', NULL, '2026-05-13 07:44:54', '2026-05-13 07:44:54'),
(268, '56e73052dc0af20b', 'sayedmoinraza74@gmail.com', '$2y$10$w6ivFCMQONSyVEINgjnPhO3YbFoQpKGp8Uq3KD57EYYVXG/sCmtDq', 3, NULL, 'active', NULL, '2026-05-13 07:52:01', '2026-05-13 07:52:01'),
(269, '20922695ccf2fa3a', 'jhgfds@gmail.com', '$2y$10$kiuYGCx1.xYep6iZgrN/COoSljj98jVyPykmZ2wo66gICOfdsbIG2', 3, NULL, 'active', NULL, '2026-05-13 08:00:56', '2026-05-13 08:00:56'),
(270, '7e420eed603c01e0', 'sayedmoin358@gmail.com', '$2y$10$gABI38oL/SrwGKgkSxhwAeQ1axsmuex.sDALromZ4w1P9xEledFS.', 3, NULL, 'active', NULL, '2026-05-13 08:02:04', '2026-05-13 08:02:04'),
(272, '88fdba69b4a88ea0', 'saqlainahmedmithaigar@gmail.com', '$2y$10$.grAAhouOFbqY8/hNfK/wOqdxfNcZHdsGCWqYiWe/J1c6ASIJKrqm', 3, NULL, 'active', NULL, '2026-05-13 08:35:16', '2026-05-13 08:35:16'),
(273, '2597266e52d53ada', 'sammirja83@gmail.com', '$2y$10$9K/gB8V4OLOIThkBxt0b2uaGzbv9TyO0LcUfOTDs3ovUp8CvtZJtC', 3, 'STU3314', 'active', '2026-05-13 14:44:54', '2026-05-13 08:43:59', '2026-05-13 09:14:54');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD CONSTRAINT `login_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
