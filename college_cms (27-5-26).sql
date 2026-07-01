-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2026 at 06:58 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `subject_id`, `exam_id`, `marks_obtained`) VALUES
(12, 22, 26, 3, 48),
(11, 22, 26, 2, 20),
(10, 22, 26, 1, 23),
(9, 41, 26, 3, 45),
(8, 41, 26, 2, 18),
(7, 41, 26, 1, 22),
(13, 23, 26, 1, 5),
(14, 23, 26, 2, 15),
(15, 23, 26, 3, 30),
(16, 41, 28, 1, 23),
(17, 41, 28, 2, 12),
(18, 41, 28, 3, 49);

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `department`, `avatar_url`) VALUES
(20, 23, 'Faculty', 'User', '9876543000', 'BCA', NULL),
(27, 95, 'admin', 'mirja', '8095091813', 'Administration', NULL),
(38, 272, 'saqlain', 'mithagar', '8660782187', 'BCA', NULL),
(39, 273, 'sam', 'mirja', '8095091813', 'BCA', NULL),
(40, 274, 'hajra', 'mundargi', '8095091813', 'BCA', NULL);

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
  `student_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academic_year` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `candidate_name`, `course_id`, `semester_id`, `section_id`, `student_id`, `department`, `semester`, `section`, `academic_year`, `parent_phone`) VALUES
(21, 'Mehul Jain', 1, 6, 6, 'BCA6F001', 'BCA', '6th Semester', 'F', '2025-26', '9876543601'),
(22, 'Nida Shaikh', 1, 6, 6, 'BCA6F002', 'BCA', '6th Semester', 'F', '2025-26', '9876543602'),
(23, 'Pratik Rao', 1, 6, 6, 'BCA6F003', 'BCA', '6th Semester', 'F', '2025-26', '9876543603'),
(24, 'Shreya Hegde', 1, 6, 6, 'BCA6F004', 'BCA', '6th Semester', 'F', '2025-26', '9876543604'),
(39, 'saqlain mithagar', 1, 6, 6, 'STU1541', 'BCA', '6', 'F', '2025', '8660782187'),
(40, 'sam mirja', 1, 1, 1, 'STU3314', 'BCA', '6', 'F', '2025', '8095091813'),
(41, 'hajra mundargi', 1, 6, 6, 'STU1942', 'BCA', '6', 'F', '2025', '8095091813');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `present_days` int DEFAULT '0',
  `absent_days` int DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_attendance`
--

INSERT INTO `subject_attendance` (`id`, `student_id`, `subject_id`, `total_classes`, `present_days`, `absent_days`, `updated_at`) VALUES
(2, 41, 26, 25, 19, 5, '2026-05-15 23:27:41'),
(3, 22, 26, 25, 5, 19, '2026-05-15 23:28:42'),
(4, 23, 26, 25, 20, 5, '2026-05-15 23:30:18'),
(5, 41, 28, 25, 21, 3, '2026-05-15 23:33:43');

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
  `student_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','suspended') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uuid` (`uuid`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=275 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `email`, `password_hash`, `role_id`, `student_id`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
(23, '8dae85d6449711f18cc1c01803c3d025', 'faculty@gmail.com', '$2y$10$KeO9djhUDn/aRpu3R/7oBeydxdwkUGCuv.ueidGpV7dcO3Q18dawq', 2, NULL, 'active', '2026-05-19 14:20:48', '2026-04-30 13:21:53', '2026-05-19 08:50:48'),
(95, 'd80e7f01542914bf', 'admin@gmail.com', '$2y$10$KeO9djhUDn/aRpu3R/7oBeydxdwkUGCuv.ueidGpV7dcO3Q18dawq', 1, NULL, 'active', '2026-05-22 19:25:17', '2026-05-12 10:05:09', '2026-05-22 13:55:17'),
(219, '09afdebe-4e75-11f1-bcfd-c01803c3d025', 'mehul@gmail.com', '$2y$10$KeO9djhUDn/aRpu3R/7oBeydxdwkUGCuv.ueidGpV7dcO3Q18dawq', 3, 'BCA6F001', 'active', NULL, '2026-05-13 02:40:00', '2026-05-15 21:31:51'),
(220, '09afdf9b-4e75-11f1-bcfd-c01803c3d025', 'nida@gmail.com', '$2y$10$KeO9djhUDn/aRpu3R/7oBeydxdwkUGCuv.ueidGpV7dcO3Q18dawq', 3, 'BCA6F002', 'active', NULL, '2026-05-13 02:40:00', '2026-05-15 21:31:51'),
(221, '09afe079-4e75-11f1-bcfd-c01803c3d025', 'pratik@gmail.com', '$2y$10$KeO9djhUDn/aRpu3R/7oBeydxdwkUGCuv.ueidGpV7dcO3Q18dawq', 3, 'BCA6F003', 'active', NULL, '2026-05-13 02:40:00', '2026-05-15 21:31:51'),
(222, '09afe14f-4e75-11f1-bcfd-c01803c3d025', 'shreya@gmail.com', '$2y$10$KeO9djhUDn/aRpu3R/7oBeydxdwkUGCuv.ueidGpV7dcO3Q18dawq', 3, 'BCA6F004', 'active', NULL, '2026-05-13 02:40:00', '2026-05-15 21:31:51'),
(272, '88fdba69b4a88ea0', 'saqlainahmedmithaigar@gmail.com', '$2y$10$KeO9djhUDn/aRpu3R/7oBeydxdwkUGCuv.ueidGpV7dcO3Q18dawq', 3, NULL, 'active', NULL, '2026-05-13 08:35:16', '2026-05-15 21:31:51'),
(273, '2597266e52d53ada', 'sammirja83@gmail.com', '$2y$10$KeO9djhUDn/aRpu3R/7oBeydxdwkUGCuv.ueidGpV7dcO3Q18dawq', 3, 'STU3314', 'active', '2026-05-16 03:06:40', '2026-05-13 08:43:59', '2026-05-15 21:36:40'),
(274, '08bbda3dc893d3a8', 'hajra@gmail.com', '$2y$10$Y8Yb6ZQtIVDxrHOg3GqEnuBz.2PAk23/4LR1YPw1rfNyfcDZDcUeO', 3, 'STU1942', 'active', '2026-05-22 19:27:15', '2026-05-15 21:41:38', '2026-05-22 13:57:15');

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
