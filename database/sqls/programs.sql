-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 03, 2023 at 02:57 PM
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
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`name`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
('Bachelor of Science (B.Sc.)', 1, NULL, NULL, '2023-01-03 20:54:05', NULL, NULL),
('Master of Science (M.Sc.)', 1, NULL, NULL, '2023-01-03 20:54:05', NULL, NULL),
('Master of Philosophy (M.Phill.)', 1, NULL, NULL, '2023-01-03 20:55:12', NULL, NULL),
('Doctor of Philosophy (Ph.D.)', 1, NULL, NULL, '2023-01-03 20:55:12', NULL, NULL),
('Professional Masters in IT (PMIT)', 1, NULL, NULL, '2023-01-03 20:55:51', NULL, NULL),
('Post Graduate Diploma in IT (PGDIT)', 1, NULL, NULL, '2023-01-03 20:55:51', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
