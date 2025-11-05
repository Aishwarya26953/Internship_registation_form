-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 05, 2025 at 05:15 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `interns`
--

DROP TABLE IF EXISTS `interns`;
CREATE TABLE IF NOT EXISTS `interns` (
  `id` int NOT NULL AUTO_INCREMENT,
  `internship_code` varchar(50) DEFAULT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `year_of_study` varchar(20) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `degree_course` varchar(100) DEFAULT NULL,
  `college` varchar(200) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `address` text,
  `contact` varchar(20) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `search_domain` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `resume_path` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `preferred_time` time DEFAULT NULL,
  `submission_datetime` datetime DEFAULT NULL,
  `start_month` varchar(10) DEFAULT NULL,
  `preferred_week` varchar(20) DEFAULT NULL,
  `idcard_color` varchar(20) DEFAULT NULL,
  `internship_mode` varchar(50) DEFAULT NULL,
  `areas_of_interest` varchar(255) DEFAULT NULL,
  `skill_level` int DEFAULT NULL,
  `why_intern` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `interns`
--

INSERT INTO `interns` (`id`, `internship_code`, `full_name`, `password`, `email`, `gender`, `year_of_study`, `branch`, `degree_course`, `college`, `duration`, `address`, `contact`, `linkedin`, `search_domain`, `image_path`, `resume_path`, `dob`, `preferred_time`, `submission_datetime`, `start_month`, `preferred_week`, `idcard_color`, `internship_mode`, `areas_of_interest`, `skill_level`, `why_intern`, `created_at`) VALUES
(5, 'INTN2025', 'aishwarya', '123456789', 'ai@gmail.com', 'Female', '4th', 'CSE', 'B.Tech', 'sksvmacet', '3 Months', 'kottur', '0123455578', 'https://www.linkedin.com/in/aishwarya-m-a-0b00292a3', 'app development', 'uploads/images/1762318990_lord.avif', 'uploads/resumes/1762318990_Module 2 dbms.pdf', '2004-11-26', '00:00:00', '0000-00-00 00:00:00', '2025-08', '', '#000000', 'Offline', 'AI/ML', 5, 'job', '2025-11-05 05:03:10'),
(4, 'INTN2025', 'ai', 'aiojn', 'atu@gmail.com', 'Female', '3rd', 'CSE', 'B.Tech', '123', '3 Months', 'qwerf', '1234555789', 'https://www.linkedin.com/in/aishwarya-m-a-0b00292a3', 'app development', 'uploads/images/1762318439_lord.jpg', 'uploads/resumes/1762318439_M. A. Aishwarya.pdf', '2004-11-26', '10:25:00', '2025-11-05 10:23:00', '2025-08', '2025-W47', '#b52626', 'Offline', 'Web Development', 7, 'job', '2025-11-05 04:53:59'),
(8, 'INTN2025', 'kavya laxmi', '123456', 'kavyalaxmi@gmail.com', 'Female', '3rd', 'CSE', 'B.Tech', 'SKSVMACET', '', '', '8821860455', 'https://www.linkedin.com/in/aishwarya-m-a-0b00292a3', 'app development', 'uploads/images/1762360627_WhatsApp Image 2024-09-20 at 22.15.15_84845dff.jpg', 'uploads/resumes/1762360627_dms.pdf', '0000-00-00', '00:00:00', '0000-00-00 00:00:00', '', '', '#000000', '', '', 5, '', '2025-11-05 16:37:07'),
(9, 'INTN2025', 'kavya', '123456789', 'kavya@gmail.com', 'Female', '4th', 'ECE', 'M.Tech', 'JSS collage', '3 Months', 'tondur', '9535948252', 'https://www.linkedin.com/in/kavya-angadi-94a783303', 'web development', 'uploads/images/1762361100_wp2100352.webp', 'uploads/resumes/1762361282_dms.pdf', '2005-03-04', '00:14:00', '2025-11-05 22:14:00', '2025-08', '2025-W48', '#2896cc', 'Offline', 'AI/ML', 9, 'to develop skills', '2025-11-05 16:45:00'),
(10, 'INTN2025', 'kavya', '123456', 'kavya@gmail.com', 'Female', '2nd', 'CSE', 'B.Tech', 'JSS collage', '', '', '9535948252', 'https://www.linkedin.com/in/kavya-angadi-94a783303', 'web development', 'uploads/images/1762361258_wp2100352.webp', 'uploads/resumes/1762361902_CMS Mini project-2-1.pdf', '2005-03-04', '00:00:00', '0000-00-00 00:00:00', '2025-08', '', '#000000', '', '', 5, '', '2025-11-05 16:47:38'),
(11, 'INTN2025', 'M A Aishwarya', '1234', 'mmaaishwarya@gmail.com', 'Female', '2nd', 'CSE', 'B.Tech', 'SKSVMACET', '2 Months', 'lakshmeshwar', '0886705956', 'https://www.linkedin.com/in/kavya-angadi-94a783303', 'web development', 'uploads/images/1762362552_5324143.webp', 'uploads/resumes/1762362552_Module 2 dbms.pdf', '2005-03-04', '22:41:00', '2025-11-05 22:41:00', '2025-08', '2025-W49', '#000000', 'Offline', 'AI/ML', 9, '', '2025-11-05 17:09:12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
