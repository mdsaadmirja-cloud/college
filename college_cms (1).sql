-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 23, 2026 at 02:14 PM
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
  `status` enum('Present','Absent') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `status`) VALUES
(1, 1, 'Present'),
(2, 1, 'Absent'),
(3, 1, 'Present'),
(4, 1, 'Present'),
(5, 1, 'Absent'),
(6, 2, 'Present'),
(7, 2, 'Present'),
(8, 2, 'Absent'),
(9, 2, 'Present'),
(10, 2, 'Present'),
(11, 3, 'Present'),
(12, 3, 'Present'),
(13, 3, 'Present'),
(14, 3, 'Present'),
(15, 3, 'Absent'),
(16, 4, 'Absent'),
(17, 4, 'Present'),
(18, 4, 'Absent'),
(19, 4, 'Present'),
(20, 4, 'Absent'),
(21, 5, 'Present'),
(22, 5, 'Present'),
(23, 5, 'Present'),
(24, 5, 'Present'),
(25, 5, 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE IF NOT EXISTS `exams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `total_marks` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_name`, `exam_date`, `total_marks`) VALUES
(1, 'Mid Term', '2026-01-10', 100),
(2, 'Final Exam', '2026-03-10', 100);

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

DROP TABLE IF EXISTS `login_logs`;
CREATE TABLE IF NOT EXISTS `login_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `subject_id`, `exam_id`, `marks_obtained`) VALUES
(1, 1, 1, 1, 40),
(2, 1, 2, 1, 35),
(3, 1, 3, 1, 60),
(4, 1, 1, 2, 45),
(5, 1, 2, 2, 30),
(6, 1, 3, 2, 70),
(7, 2, 1, 1, 55),
(8, 2, 2, 1, 60),
(9, 2, 3, 1, 58),
(10, 2, 1, 2, 65),
(11, 2, 2, 2, 62),
(12, 2, 3, 2, 60),
(13, 3, 1, 1, 75),
(14, 3, 2, 1, 80),
(15, 3, 3, 1, 78),
(16, 3, 1, 2, 85),
(17, 3, 2, 2, 82),
(18, 3, 3, 2, 88),
(19, 4, 1, 1, 30),
(20, 4, 2, 1, 25),
(21, 4, 3, 1, 40),
(22, 4, 1, 2, 35),
(23, 4, 2, 2, 20),
(24, 4, 3, 2, 45),
(25, 5, 1, 1, 90),
(26, 5, 2, 1, 92),
(27, 5, 3, 1, 88),
(28, 5, 1, 2, 95),
(29, 5, 2, 2, 93),
(30, 5, 3, 2, 97);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default-user.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `department`, `avatar_url`) VALUES
(14, 17, 'saad', 'mirja', '8095091813', 'Administration', NULL),
(17, 20, 'saad', 'mirja', '8095091813', 'BCA', NULL),
(18, 21, 'sadaf', 'mirja', '8095091813', 'BCA', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `candidate_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `candidate_name`) VALUES
(1, 'Saad Mirja'),
(2, 'Ali Khan'),
(3, 'Sara Sheikh'),
(4, 'John Doe'),
(5, 'Ayesha Khan');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`) VALUES
(1, 'Math'),
(2, 'Science'),
(3, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `status` enum('active','inactive','suspended') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uuid` (`uuid`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `email`, `password_hash`, `role_id`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
(17, 'ccaa42c5cedbfef4', 'admin@college.com', '$2y$10$Ccf1wkrdf6NVOO/2Utqc1OwbpXe8Hen1u9Ny3slERmSAcNFl5qlIe', 1, 'active', '2026-04-17 08:17:03', '2026-04-17 02:18:32', '2026-04-22 01:22:14'),
(20, '9bcbd35ec6f511d5', 'mrsaadmirjanavar@gmail.com', '$2y$10$b./ctiUij637fG2LXDAg/.wR0kXt/IZASvtFrS/tvtUzNNI7PUl8e', 3, 'active', NULL, '2026-04-17 03:24:13', '2026-04-17 03:24:13'),
(21, '53727e74be042cd7', 'rajesabmirjanavar7@gmail.com', '$2y$10$aWD6Zcx.rxuMVjfV5TCCde7pfRqVvvSq1tMnsfZDYB72LlzGfDJIq', 2, 'active', NULL, '2026-04-17 03:31:22', '2026-04-17 03:31:22');

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
