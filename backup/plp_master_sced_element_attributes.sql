-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 12:26 PM
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
-- Table structure for table `plp_master_sced_element_attributes`
--

CREATE TABLE `plp_master_sced_element_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `element_attribute_id` int(11) NOT NULL,
  `format` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `definition` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plp_master_sced_element_attributes`
--

INSERT INTO `plp_master_sced_element_attributes` (`id`, `field_type`, `element_attribute_id`, `format`, `description`, `definition`, `code`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'element', 1, 'import', 'test1', 'test defi', '1', 1, 1, '2020-05-29 07:33:28', '2020-05-29 07:33:28'),
(2, 'element', 1, 'import', 'test2', 'testg deffft', '2', 1, 1, '2020-05-29 07:33:28', '2020-05-29 07:33:28'),
(3, 'element', 1, 'import', 'test3', 'tyyuf dfg', '6', 1, 1, '2020-05-29 07:33:28', '2020-05-29 07:33:28'),
(4, 'element', 1, 'import', 'test4', 'fd ff', '7', 1, 1, '2020-05-29 07:33:28', '2020-05-29 07:33:28'),
(5, 'element', 1, 'import', 'tesfd', 'df', '8', 1, 1, '2020-05-29 07:33:28', '2020-05-29 07:33:28'),
(6, 'element', 2, 'import', 'test11', 'test defi', '11', 1, 1, '2020-05-29 09:17:45', '2020-05-29 09:17:45'),
(7, 'element', 2, 'import', 'test21', 'testg deffft', '12', 1, 1, '2020-05-29 09:17:45', '2020-05-29 09:17:45'),
(8, 'element', 2, 'import', 'test31', 'tyyuf dfg', '16', 1, 1, '2020-05-29 09:17:45', '2020-05-29 09:17:45'),
(9, 'element', 2, 'import', 'test41', 'fd ff', '15', 1, 1, '2020-05-29 09:17:45', '2020-05-29 09:17:45'),
(10, 'element', 2, 'import', 'tesfd1', 'df', '18', 1, 1, '2020-05-29 09:17:45', '2020-05-29 09:17:45'),
(11, 'attribute', 1, 'import', 'Advanced Placement', '', 'AdvancedPlacement', 1, 1, '2020-05-29 09:49:18', '2020-05-29 09:49:18'),
(12, 'attribute', 1, 'import', 'Apprenticeship Credit', '', 'ApprenticeshipCredit', 1, 1, '2020-05-29 09:49:18', '2020-05-29 09:49:18'),
(13, 'attribute', 1, 'import', 'Career and Technical Education', '', 'CTE', 1, 1, '2020-05-29 09:49:18', '2020-05-29 09:49:18'),
(14, 'attribute', 1, 'import', 'Dual credit', '', 'DualCredit', 1, 1, '2020-05-29 09:49:18', '2020-05-29 09:49:18'),
(15, 'attribute', 1, 'import', 'International Baccalaureate', '', 'InternationalBaccalaureate', 1, 1, '2020-05-29 09:49:18', '2020-05-29 09:49:18'),
(16, 'attribute', 1, 'import', 'Other', '', 'Other', 1, 1, '2020-05-29 09:49:18', '2020-05-29 09:49:18'),
(17, 'attribute', 1, 'import', 'Qualified Admission', '', 'QualifiedAdmission', 1, 1, '2020-05-29 09:49:18', '2020-05-29 09:49:18'),
(18, 'attribute', 1, 'import', 'Science, Technology, Engineering and Mathematics', '', 'STEM', 1, 1, '2020-05-29 09:49:18', '2020-05-29 09:49:18'),
(19, 'attribute', 1, 'import', 'Simultaneous CTE and Academic Credit', '', 'CTEAndAcademic', 1, 1, '2020-05-29 09:49:18', '2020-05-29 09:49:18'),
(20, 'attribute', 1, 'import', 'State Scholarship', '', 'StateScholarship', 1, 1, '2020-05-29 09:49:18', '2020-05-29 09:49:18'),
(21, 'attribute', 2, 'manual', 'Applicable in GPA', '', 'Applicable', 1, 1, '2020-05-29 10:10:46', '2020-05-29 10:10:46'),
(22, 'attribute', 4, 'manual', 'Yes', '', 'yes', 1, 1, '2020-05-29 10:26:42', '2020-05-29 10:26:42'),
(23, 'attribute', 4, 'manual', 'No', '', 'no', 1, 1, '2020-05-29 10:26:55', '2020-05-29 10:26:55'),
(24, 'attribute', 5, 'manual', 'Afar', '', 'aar', 1, 1, '2020-05-29 10:27:23', '2020-05-29 10:27:23'),
(25, 'attribute', 5, 'manual', 'Abkhazian', '', 'abk', 1, 1, '2020-05-29 10:27:38', '2020-05-29 10:27:38'),
(26, 'attribute', 5, 'manual', 'Achinese', '', 'ace', 1, 1, '2020-05-29 10:28:00', '2020-05-29 10:28:00'),
(27, 'attribute', 6, 'manual', 'Local Education Agency (LEA) curriculum framework', '', 'LEA', 1, 1, '2020-05-29 10:28:30', '2020-05-29 10:28:30'),
(28, 'attribute', 6, 'manual', 'National curriculum standard', '', 'NationalStandard', 1, 1, '2020-05-29 10:28:48', '2020-05-29 10:28:48'),
(29, 'attribute', 6, 'manual', 'Private, religious curriculum', '', 'PrivateOrReligious', 1, 1, '2020-05-29 10:29:08', '2020-05-29 10:29:08'),
(30, 'attribute', 7, 'manual', 'Yes', '', 'yes', 1, 1, '2020-05-29 10:29:36', '2020-05-29 10:29:36'),
(31, 'attribute', 7, 'manual', 'No', '', 'no', 1, 1, '2020-05-29 10:29:49', '2020-05-29 10:29:49'),
(32, 'attribute', 9, 'manual', 'LEA only', '', 'LEAOnly', 1, 1, '2020-05-29 10:30:27', '2020-05-29 10:30:27'),
(33, 'attribute', 9, 'manual', 'SEA only', '', 'SEAOnly', 1, 1, '2020-05-29 10:30:44', '2020-05-29 10:30:44'),
(34, 'attribute', 9, 'manual', 'LEA and SEA', '', 'Both', 1, 1, '2020-05-29 10:30:58', '2020-05-29 10:30:58'),
(35, 'attribute', 9, 'manual', 'Neither LEA or SEA', '', 'Neither', 1, 1, '2020-05-29 10:31:19', '2020-05-29 10:31:19'),
(36, 'attribute', 10, 'manual', 'Infant/toddler', '', 'IT', 1, 1, '2020-05-29 10:31:45', '2020-05-29 10:31:45'),
(37, 'attribute', 10, 'manual', 'Preschool', '', 'PR', 1, 1, '2020-05-29 10:32:03', '2020-05-29 10:32:03'),
(38, 'attribute', 11, 'manual', 'Broadcast', 'Course is taught via live or taped broadcast over open air, closed circuit, or cable television systems.', 'Broadcast', 1, 1, '2020-05-29 10:33:19', '2020-05-29 10:33:19'),
(39, 'attribute', 11, 'manual', 'Correspondence', 'Course is taught via hard or electronic copy or other media (CD, DVD, video cassette) and student works at own pace usually without an instructor present, but generally under supervision of LEA. Includes “packet” programs.', 'Correspondence', 1, 1, '2020-05-29 10:34:05', '2020-05-29 10:34:05'),
(40, 'attribute', 11, 'manual', 'Early College', 'Course is taught by institution of higher education, but does NOT qualify as concurrent enrollment.', 'EarlyCollege', 1, 1, '2020-05-29 10:34:30', '2020-05-29 10:34:30'),
(41, 'attribute', 12, 'manual', 'Yes', '', 'yes', 1, 1, '2020-05-29 10:35:04', '2020-05-29 10:35:04'),
(42, 'attribute', 12, 'manual', 'No', '', 'no', 1, 1, '2020-05-29 10:35:14', '2020-05-29 10:35:14'),
(43, 'attribute', 15, 'manual', 'Agriculture, Food & Natural Resources', 'Agriculture, Food & Natural Resources is specified as the career cluster that defines the industry or occupational focus for a career pathways program, plan of study, or course.', '01', 1, 1, '2020-05-29 10:35:49', '2020-05-29 10:35:49'),
(44, 'attribute', 15, 'manual', 'Architecture & Construction', 'Architecture & Construction is specified as the career cluster that defines the industry or occupational focus for a career pathways program, plan of study, or course.', '02', 1, 1, '2020-05-29 10:36:08', '2020-05-29 10:36:08'),
(45, 'attribute', 15, 'manual', 'Arts, A/V Technology & Communications', 'Arts, A/V Technology & Communications is specified as the career cluster that defines the industry or occupational focus for a career pathways program, plan of study, or course.', '03', 1, 1, '2020-05-29 10:36:28', '2020-05-29 10:36:28'),
(46, 'attribute', 13, 'manual', 'Yes', '', 'yes', 1, 1, '2020-05-29 10:36:50', '2020-05-29 10:36:50'),
(47, 'attribute', 13, 'manual', 'No', '', 'no', 1, 1, '2020-05-29 10:37:02', '2020-05-29 10:37:02'),
(48, 'attribute', 14, 'manual', 'Apprenticeship', '', 'Apprenticeship', 1, 1, '2020-05-29 10:37:26', '2020-05-29 10:37:26'),
(49, 'attribute', 14, 'manual', 'Clinical work experience', '', 'ClinicalWork', 1, 1, '2020-05-29 10:37:40', '2020-05-29 10:37:40'),
(50, 'attribute', 14, 'manual', 'Cooperative education', '', 'CooperativeEducation', 1, 1, '2020-05-29 10:37:58', '2020-05-29 10:37:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plp_master_sced_element_attributes`
--
ALTER TABLE `plp_master_sced_element_attributes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plp_master_sced_element_attributes`
--
ALTER TABLE `plp_master_sced_element_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
