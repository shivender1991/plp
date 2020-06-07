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
-- Table structure for table `plp_master_sced_elements`
--

CREATE TABLE `plp_master_sced_elements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `element_id` int(11) NOT NULL,
  `format` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `definition` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plp_master_sced_elements`
--

INSERT INTO `plp_master_sced_elements` (`id`, `field_type`, `element_id`, `format`, `description`, `definition`, `code`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'element', 1, 'import', 'test1', 'test defi', 1, 1, 1, '2020-05-29 07:28:01', '2020-05-29 07:28:01'),
(2, 'element', 1, 'import', 'test2', 'testg deffft', 2, 1, 1, '2020-05-29 07:28:01', '2020-05-29 07:28:01'),
(3, 'element', 1, 'import', 'test3', 'tyyuf dfg', 6, 1, 1, '2020-05-29 07:28:01', '2020-05-29 07:28:01'),
(4, 'element', 1, 'import', 'test4', 'fd ff', 7, 1, 1, '2020-05-29 07:28:01', '2020-05-29 07:28:01'),
(5, 'element', 1, 'import', 'tesfd', 'df', 8, 1, 1, '2020-05-29 07:28:01', '2020-05-29 07:28:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plp_master_sced_elements`
--
ALTER TABLE `plp_master_sced_elements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plp_master_sced_elements`
--
ALTER TABLE `plp_master_sced_elements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
