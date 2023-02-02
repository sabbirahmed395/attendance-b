-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 03, 2023 at 03:12 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `example_app`
--

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`program_id`, `course_code`, `course_title`, `credit_hours`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'PGDIT-101', 'Introduction to IT & Programming', 3.0, 1, NULL, NULL, '2023-01-03 21:05:46', NULL, NULL),
(6, 'PGDIT-102', 'Operating System Concepts ', 3.0, 1, NULL, NULL, '2023-01-03 21:05:46', NULL, NULL),
(6, 'PGDIT-103 ', 'Data Structures and Algorithms ', 3.0, 1, NULL, NULL, '2023-01-03 21:08:03', NULL, NULL),
(6, 'PGDIT-104 ', 'Database Management System ', 3.0, 1, NULL, NULL, '2023-01-03 21:08:04', NULL, NULL),
(6, 'PGDIT-201', 'System Analysis and Design ', 3.0, 1, NULL, NULL, '2023-01-03 21:09:20', NULL, NULL),
(6, 'PGDIT-202', 'Object Oriented Programming', 3.0, 1, NULL, NULL, '2023-01-03 21:09:20', NULL, NULL),
(6, 'PGDIT-203', 'Data Communication & Computer Networking ', 3.0, 1, NULL, NULL, '2023-01-03 21:09:59', NULL, NULL),
(6, 'PGDIT-214', 'E-Commerce ', 3.0, 1, NULL, NULL, '2023-01-03 21:09:59', NULL, NULL),
(6, 'PGDIT-301 ', 'Web Programming ', 3.0, 1, NULL, NULL, '2023-01-03 21:10:35', NULL, NULL),
(6, 'PGDIT-315', 'Network Security', 3.0, 1, NULL, NULL, '2023-01-03 21:10:35', NULL, NULL),
(6, 'PGDIT-300', 'Project Work', 6.0, 1, NULL, NULL, '2023-01-03 21:11:14', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
