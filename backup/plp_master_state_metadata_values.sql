-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 04:32 PM
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
-- Table structure for table `plp_master_state_metadata_values`
--

CREATE TABLE `plp_master_state_metadata_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_id` int(11) NOT NULL,
  `metadata_values` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plp_master_state_metadata_values`
--

INSERT INTO `plp_master_state_metadata_values` (`id`, `header_id`, `metadata_values`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 7, 'B', 1, 2, 2, '2020-06-02 10:00:35', '2020-06-02 10:00:35'),
(2, 7, 'C', 1, 2, 2, '2020-06-02 10:01:33', '2020-06-02 10:01:33'),
(4, 8, 'G', 1, 2, 2, '2020-06-02 11:01:58', '2020-06-02 11:01:58'),
(6, 6, 'Test1', 1, 2, 2, '2020-06-02 11:36:47', '2020-06-02 11:36:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plp_master_state_metadata_values`
--
ALTER TABLE `plp_master_state_metadata_values`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plp_master_state_metadata_values`
--
ALTER TABLE `plp_master_state_metadata_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
