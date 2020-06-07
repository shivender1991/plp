-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 12:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personalize`
--

-- --------------------------------------------------------

--
-- Table structure for table `plp_master_elements`
--

CREATE TABLE `plp_master_elements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `input_type_label` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `input_type_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `input_type_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plp_master_elements`
--

INSERT INTO `plp_master_elements` (`id`, `name`, `input_type`, `input_type_label`, `input_type_name`, `input_type_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Subject Area', 'drop-down', 'Subject Area', 'subject_area', NULL, 1, NULL, NULL),
(2, 'Course Level', 'drop-down', 'Course Level', 'course_level', NULL, 1, NULL, NULL),
(3, 'Carnegie Unit Credit', 'text', 'Carnegie Unit Credit', 'carnegie_unit_credit', NULL, 1, NULL, NULL),
(4, 'Grade Span', 'drop-down', 'Grade Span', 'grade_span', NULL, 1, NULL, NULL),
(5, 'Sequence of Course', 'drop-down', 'Sequence of Course', 'sequence_of_course', NULL, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plp_master_elements`
--
ALTER TABLE `plp_master_elements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plp_master_elements`
--
ALTER TABLE `plp_master_elements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
