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
-- Table structure for table `plp_master_attributes`
--

CREATE TABLE `plp_master_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `input_type_label` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `input_type_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `input_type_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plp_master_attributes`
--

INSERT INTO `plp_master_attributes` (`id`, `name`, `input_type`, `input_type_label`, `input_type_name`, `input_type_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Additional Credit Type', 'drop-down', 'Additional Credit Type', 'additional_credit_type', NULL, 1, NULL, NULL),
(2, 'Course GPA Applicability', 'drop-down', 'Course GPA Applicability', 'course_gpa_applicablity', NULL, 1, NULL, NULL),
(3, 'Course Funding Program', 'drop-down', 'Course Funding Program', 'course_funding_program', NULL, 1, NULL, NULL),
(4, 'High School Course Requirement', 'drop-down', 'High School Course Requirement', 'high_school_course_requirement', NULL, 1, NULL, NULL),
(5, 'Instruction Language', 'drop-down', 'Instruction Language', 'instruction_language', NULL, 1, NULL, NULL),
(6, 'Curriculum Framework Type', 'drop-down', 'Curriculum Framework Type', 'curriculum_framework_type', NULL, 1, NULL, NULL),
(7, 'Course Aligned with Standards', 'drop-down', 'Course Aligned with Standards', 'course_aligned_with_standards', NULL, 1, NULL, NULL),
(8, 'Course Certification Description', 'drop-down', 'Course Certification Description', 'course_certification_description', NULL, 1, NULL, NULL),
(9, 'K12 End of Course Requirement', 'drop-down', 'K12 End of Course Requirement', 'k12_end_of_course_requirement', NULL, 1, NULL, NULL),
(10, 'Course Applicable Education Level', 'drop-down', 'Course Applicable Education Level', 'course_applicable_education_level', NULL, 1, NULL, NULL),
(11, 'Course Section Instructional Delivery Mode', 'drop-down', 'Course Section Instructional Delivery Mode', 'course_section_instructional_delivery_mode', NULL, 1, NULL, NULL),
(12, 'NCAA Eligibility', 'drop-down', 'NCAA Eligibility', 'ncaa_eligibility', NULL, 1, NULL, NULL),
(13, 'Family and Consumer Sciences Course Indicator', 'drop-down', 'Family and Consumer Sciences Course Indicator', 'family_and_consumer_sciences_course_indicator', NULL, 1, NULL, NULL),
(14, 'Work-based Learning Opportunity Type', 'drop-down', 'Work-based Learning Opportunity Type', 'work_based_learning_opportunity_type', NULL, 1, NULL, NULL),
(15, 'Career Cluster', 'drop-down', 'Career Cluster', 'career_cluster', NULL, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plp_master_attributes`
--
ALTER TABLE `plp_master_attributes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plp_master_attributes`
--
ALTER TABLE `plp_master_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
