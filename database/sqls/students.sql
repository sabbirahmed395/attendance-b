-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 04, 2023 at 03:42 PM
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
-- Dumping data for table `students`
--

INSERT INTO `students` (`batch_id`, `student_id`, `title`, `first_name`, `middle_name`, `last_name`, `description`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '22101', NULL, 'MD.', 'Al', 'Amin', NULL, 1, NULL, NULL, '2023-01-04 21:30:02', NULL, NULL),
(1, '22103', NULL, 'Md.', 'Jashim', 'Sharker', NULL, 1, NULL, NULL, '2023-01-04 21:30:02', NULL, NULL),
(1, '22104', NULL, 'Abu', 'Zafar', 'Obaidullah', NULL, 1, NULL, NULL, '2023-01-04 21:31:55', NULL, NULL),
(1, '22106', NULL, 'Md.', 'Mamunur', 'Rashid', NULL, 1, NULL, NULL, '2023-01-04 21:31:55', NULL, NULL),
(1, '22107', NULL, 'Omar', NULL, 'Siddek', NULL, 1, NULL, NULL, '2023-01-04 21:33:06', NULL, NULL),
(1, '22108', NULL, 'Md.', 'Habibur', 'Rahaman', NULL, 1, NULL, NULL, '2023-01-04 21:33:27', NULL, NULL),
(1, '22109', NULL, 'Md.', 'Sabbir', 'Shikder', NULL, 1, NULL, NULL, '2023-01-04 21:33:27', NULL, NULL),
(1, '22110', NULL, 'Sabbir', NULL, 'Ahmed', NULL, 1, NULL, NULL, '2023-01-04 21:34:26', NULL, NULL),
(1, '22111', NULL, 'Md', 'Zakir', 'Hossain', NULL, 1, NULL, NULL, '2023-01-04 21:34:26', NULL, NULL),
(1, '22112', NULL, 'Md', 'Mehedi', 'Hasan', NULL, 1, NULL, NULL, '2023-01-04 21:35:18', NULL, NULL),
(1, '22113', NULL, 'Mohammad', 'Omar', 'Faruk', NULL, 1, NULL, NULL, '2023-01-04 21:35:18', NULL, NULL),
(1, '22114', NULL, 'Camellia', NULL, 'Nasreen', NULL, 1, NULL, NULL, '2023-01-04 21:37:20', NULL, NULL),
(1, '22117', NULL, 'Md.', 'Aminul', 'Islam', NULL, 1, NULL, NULL, '2023-01-04 21:37:20', NULL, NULL),
(1, '22118', NULL, 'Md.', 'Hafizur', 'Rahman', NULL, 1, NULL, NULL, '2023-01-04 21:38:29', NULL, NULL),
(1, '22119', NULL, 'Safiul', NULL, 'Alam', NULL, 1, NULL, NULL, '2023-01-04 21:38:29', NULL, NULL),
(1, '22121', NULL, 'Fahim', NULL, 'Morshed', NULL, 1, NULL, NULL, '2023-01-04 21:39:24', NULL, NULL),
(1, '22122', NULL, 'Md.', 'Rahat', 'Hossain', NULL, 1, NULL, NULL, '2023-01-04 21:39:24', NULL, NULL),
(1, '22123', NULL, 'Md', 'Zulfiker', 'Ali', NULL, 1, NULL, NULL, '2023-01-04 21:40:11', NULL, NULL),
(1, '22124', NULL, 'Md', 'Masum', 'Ahmmed', NULL, 1, NULL, NULL, '2023-01-04 21:40:11', NULL, NULL),
(1, '22126', NULL, 'Ibnul', 'Quayum', 'Imran', NULL, 1, NULL, NULL, '2023-01-04 21:41:00', NULL, NULL),
(1, '22128', NULL, 'Md.', NULL, 'Mamun', NULL, 1, NULL, NULL, '2023-01-04 21:41:00', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
