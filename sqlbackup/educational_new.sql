-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 05:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educational_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_class`
--

CREATE TABLE `academic_class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `academic_session_id` int(11) DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `academic_class`
--

INSERT INTO `academic_class` (`id`, `name`, `academic_session_id`, `created_by_id`, `modified_by_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '1qq', NULL, 1, NULL, '0', '2023-10-03 14:08:57', '2023-10-03 14:08:57'),
(2, 'â€™', NULL, 46, 46, '0', '2024-01-25 19:22:40', '2024-01-25 19:24:02'),
(3, '\"d%Wz=!gpj95&!ekZtSDP\",\"1nO6WGEWAtBPBb2w!0TQ\",\"eY@q2XOpRNaa#3ZoB+SH\",\"%rcdDYHNpNcTK!KtGC&w\",\"sBbfD0g7=YatzVC*jU7p\"', NULL, 46, NULL, '0', '2024-01-25 19:30:25', '2024-01-25 19:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `academic_sessions`
--

CREATE TABLE `academic_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `options` text DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_sessions`
--

INSERT INTO `academic_sessions` (`id`, `name`, `start_date`, `end_date`, `is_default`, `description`, `options`, `created_by_id`, `modified_by_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '2023-2024', '2023-06-01', '2024-05-01', 1, '2023-2024', '{\"transfer_certificate_format\":null,\"exam_report_analysis\":0,\"exam_report_analysis_student_token\":null,\"exam_report_analysis_staff_token\":null}', NULL, NULL, '0', '2023-08-27 22:49:24', '2023-08-27 22:59:06'),
(2, '2024-202512222', '2024-06-01', '2025-05-01', 0, '2024-2025', '{\"transfer_certificate_format\":\"cbse2021\",\"exam_report_analysis\":0,\"exam_report_analysis_student_token\":null,\"exam_report_analysis_staff_token\":null}', NULL, 2, '0', '2023-08-27 22:58:24', '2023-09-19 05:39:19'),
(3, 'sas', '2023-06-01', '2023-06-01', 0, '2023-06-01', NULL, NULL, NULL, '1', '2023-09-19 05:19:10', '2023-09-19 05:35:19'),
(4, 'sas', '2023-06-01', '2023-06-01', 0, '2023-06-01', NULL, NULL, NULL, '0', '2023-09-19 05:20:22', '2023-09-19 05:20:22'),
(5, 'sas', '2023-06-01', '2023-06-01', 0, '2023-06-01', NULL, NULL, NULL, '1', '2023-09-19 05:21:40', '2023-09-19 05:21:53'),
(6, '23233s', '2023-06-01', '2023-06-01', 0, 'sdf', NULL, NULL, 11, '0', '2023-09-19 06:20:03', '2023-09-19 06:27:40'),
(7, 'a1', '2023-06-01', '2023-06-01', 0, 'sdf', NULL, NULL, 46, '1', '2023-09-19 06:24:08', '2024-01-16 17:43:25'),
(8, '1qq', '2023-06-02', '2023-06-01', 0, 'sdfqwere', NULL, NULL, 46, '0', '2023-09-23 05:23:51', '2024-01-16 17:43:11'),
(9, 'q', '2023-06-01', '2023-06-01', 0, 'qwer', NULL, NULL, 11, '1', '2023-09-23 05:29:28', '2023-09-23 05:29:45'),
(10, '1234', '2024-06-02', '2024-06-02', 0, 'ZCZXC', NULL, NULL, 46, '1', '2024-01-25 19:17:27', '2024-01-25 19:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `attendance_type_id` int(11) NOT NULL,
  `employee_category_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `date_of_attendance` date NOT NULL,
  `remarks` text DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_type`
--

CREATE TABLE `attendance_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=>Default,1=>active,2=>inactive',
  `description` longtext DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>Default,1=>Deleted',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `avetmisses`
--

CREATE TABLE `avetmisses` (
  `id` int(11) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `companyIdentifier` varchar(255) DEFAULT NULL,
  `companyType` varchar(255) DEFAULT NULL,
  `isManagingAgent` varchar(255) DEFAULT NULL,
  `authorityIdentifier` varchar(255) DEFAULT NULL,
  `authorityName` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `suburb` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pcode` varchar(255) DEFAULT NULL,
  `tcontactf` varchar(255) DEFAULT NULL,
  `temail` varchar(255) DEFAULT NULL,
  `tphone` varchar(255) DEFAULT NULL,
  `tfax` varchar(255) DEFAULT NULL,
  `statecompanyIdentifier` varchar(255) NOT NULL,
  `chkRptState` varchar(255) NOT NULL,
  `fundingSourceDescription` varchar(255) NOT NULL,
  `fundingSourceState` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avetmisses`
--

INSERT INTO `avetmisses` (`id`, `contact`, `companyIdentifier`, `companyType`, `isManagingAgent`, `authorityIdentifier`, `authorityName`, `address1`, `address2`, `suburb`, `state`, `pcode`, `tcontactf`, `temail`, `tphone`, `tfax`, `statecompanyIdentifier`, `chkRptState`, `fundingSourceDescription`, `fundingSourceState`, `created_at`, `updated_at`) VALUES
(1, '1523', 'csdc', '31', '0', '907', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '[null,null,null,null,null,null,null,null,null,null,null]', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\"]', '[\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\"]', '[\"ACE\",null,null,null,null,null,null,null,null,null]', '2024-05-24', '2024-05-24'),
(2, '1523', 'csdc', '31', '0', '907', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '[null,null,null,null,null,null,null,null,null,null,null]', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\"]', '[\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\"]', '[\"ACE\",null,null,null,null,null,null,null,null,null]', '2024-05-24', '2024-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>default,1=>deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch_program`
--

CREATE TABLE `batch_program` (
  `id` int(11) NOT NULL,
  `batch_id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tamplate_name` varchar(255) DEFAULT NULL,
  `leading_text` varchar(255) DEFAULT NULL,
  `orientation` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `trailing_text` varchar(255) NOT NULL,
  `signing_authority` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `code`) VALUES
(1, 'New', 'new'),
(2, 'sudny', 'Sudny'),
(3, 'Sydney', 'sydney'),
(4, 'Test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `class_rooms`
--

CREATE TABLE `class_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>default,1=>deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `course_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `default_course_cost` varchar(255) DEFAULT NULL,
  `follow_up_enquiry` bigint(20) UNSIGNED DEFAULT NULL,
  `delivery_method` varchar(255) DEFAULT NULL,
  `required_no_of_unit` varchar(255) DEFAULT NULL,
  `core_unit` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `reporting_this_course` varchar(255) DEFAULT NULL,
  `tga_package` varchar(255) DEFAULT NULL,
  `language_id` varchar(255) DEFAULT NULL,
  `course_enquiry_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `faculty` varchar(255) DEFAULT NULL,
  `semesters` varchar(255) DEFAULT NULL,
  `credits` varchar(255) DEFAULT NULL,
  `courses` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `session_option` varchar(255) DEFAULT NULL,
  `core_units` varchar(255) DEFAULT NULL,
  `total_units` varchar(255) DEFAULT NULL,
  `fee` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `attach` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `is_deleted` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `code`, `course_category_id`, `default_course_cost`, `follow_up_enquiry`, `delivery_method`, `required_no_of_unit`, `core_unit`, `color`, `reporting_this_course`, `tga_package`, `language_id`, `course_enquiry_id`, `title`, `slug`, `faculty`, `semesters`, `credits`, `courses`, `duration`, `session_option`, `core_units`, `total_units`, `fee`, `description`, `comments`, `attach`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'fdsf', 'fsdf', 1, 'ffsdf', 2, 'Self Paced', 'fsdf', 'fdsf', '#7ab2fa', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fsdf', 'fsdf', NULL, '1', '1', '2024-05-03 04:29:36', '2024-05-04 00:27:12'),
(2, 'dsd', 'dsd', 1, 'sdsd', NULL, 'Self Paced,Public Sessions-Single Session,Private Sessions-Single Session', 'dadsdsd', 'dsdsd', '#7ab2fa', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dsd', 'dsd', NULL, '1', NULL, '2024-05-03 04:55:07', '2024-05-04 05:40:46'),
(3, 'dasd', 'fsdf', 1, 'dasd', 2, 'Self Paced,Public Sessions-Multiple Sessions,Private Sessions-Single Session', 'dasd', 'dasd', '#7ab2fa', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adsd', 'adsd', NULL, '1', NULL, '2024-05-03 04:59:35', '2024-05-04 05:41:33'),
(4, 'sdsad', 'dasda', 1, 'dsad', 2, 'Self Paced,Public Sessions-Single Session,Private Sessions-Single Session', '12', '50', '#7ab2fa', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dasd', 'dasd', NULL, NULL, NULL, '2024-05-03 06:00:09', '2024-05-03 06:00:09'),
(5, 'asd', 'adsd', 1, 'dsad', 2, 'Self Paced,Public Sessions-Single Session', '12', '1', '#7ab2fa', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dasd', 'dasd', NULL, NULL, NULL, '2024-05-03 06:00:56', '2024-05-03 06:00:56'),
(6, 'gdfg', 'vgfdg', 1, 'gdf', 2, 'Self Paced,Public Sessions-Single Session', '1', '12', '#7ab2fa', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gdfg', 'gdfg', NULL, NULL, NULL, '2024-05-03 06:03:52', '2024-05-03 06:03:52'),
(7, 'SAS', 'sas', 1, 'SAs', 2, 'Self Paced,Public Sessions-Single Session', '1', '12', '#7ab2fa', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'saS', 'Sas', NULL, NULL, NULL, '2024-05-03 06:04:46', '2024-05-03 06:04:46'),
(8, 'dasd', 'dasd', 1, 'adsd', 2, 'Self Paced,Public Sessions-Single Session,Private Sessions-Single Session', '1', '50', '#7ab2fa', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asd', 'asdasdas', NULL, NULL, NULL, '2024-05-03 06:08:32', '2024-05-03 06:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=>inactive, 1=>active',
  `description` text DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>default,1=>delete',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `name`, `status`, `description`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Software', '1', 'software related courses', '0', '2024-01-16 05:17:29', '2024-01-16 05:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `description`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'd1', 'descc', '0', '2023-10-31 00:00:40', '2023-10-31 00:00:40'),
(2, 'd2', 'desc', '0', '2023-10-31 00:00:49', '2023-10-31 00:00:49'),
(3, 'd3', 'desc', '0', '2023-10-31 00:00:57', '2023-10-31 00:00:57'),
(4, 'd4', 'desc', '0', '2023-10-31 00:01:05', '2023-10-31 00:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `designation_name` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation_name`, `department_id`, `description`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Designation 1', 1, 'desc', 0, '2023-10-31 00:01:28', '2023-10-31 00:01:28'),
(2, 'Designation 2', 2, 'desc', 0, '2023-10-31 00:01:39', '2023-10-31 00:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` tinyint(2) DEFAULT 1,
  `birthdate` date DEFAULT NULL,
  `contact_number` bigint(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_photo` text DEFAULT NULL,
  `employee_code` varchar(255) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `work_shift` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1=>full-time,2=>part-time',
  `salary` int(11) DEFAULT NULL,
  `employee_status` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_deleted` enum('0','1') DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_category`
--

CREATE TABLE `employee_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `employee_designation_id` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_category`
--

INSERT INTO `employee_category` (`id`, `name`, `description`, `employee_designation_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'test 1', 'desc', 1, 0, '2023-10-31 00:02:01', '2023-10-31 00:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `course_type` varchar(255) NOT NULL,
  `reporting_state` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `trainers` varchar(255) DEFAULT NULL,
  `assessors` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `course_quota` varchar(255) DEFAULT NULL,
  `course_cost` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `resources` varchar(255) DEFAULT NULL,
  `selects_units` varchar(255) DEFAULT NULL,
  `delevery_mode` varchar(255) DEFAULT NULL,
  `predominant_delivery_mode` varchar(255) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  `archive` varchar(255) DEFAULT NULL,
  `is_deleted` enum('0','1','','') DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `course_type`, `reporting_state`, `course_name`, `group`, `trainers`, `assessors`, `month`, `year`, `course_quota`, `course_cost`, `city`, `location`, `resources`, `selects_units`, `delevery_mode`, `predominant_delivery_mode`, `status`, `archive`, `is_deleted`, `created_at`, `updated_at`) VALUES
(4, '1', '2', '3', 'fsedf', NULL, NULL, 'April', '2024', '1', '0', '1', '0', NULL, NULL, 'YNN', 'I', NULL, '1', '0', '2024-05-05 00:32:03', '2024-05-05 05:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `marks` bigint(100) DEFAULT NULL,
  `contribution` varchar(255) DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT '0' COMMENT '0=>default, 1=>active, 2=>inactive',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>default,1=>deleted',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortcode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>default,1=>deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `grade` varchar(191) DEFAULT NULL,
  `point` decimal(10,2) DEFAULT NULL,
  `min_marks` decimal(10,2) DEFAULT NULL,
  `max_marks` decimal(10,2) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1=>active,0=>inactive',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>default, 1=deleted',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_allocation`
--

CREATE TABLE `leave_allocation` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `leave_allotted` int(11) DEFAULT NULL,
  `leave_type_id` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_allocation_detail`
--

CREATE TABLE `leave_allocation_detail` (
  `id` int(11) NOT NULL,
  `emp_leave_allocation_id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `alloted_leave` int(11) NOT NULL,
  `used_leave` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_request`
--

CREATE TABLE `leave_request` (
  `id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` text DEFAULT NULL,
  `description` text NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `leave_document` varchar(255) DEFAULT NULL,
  `requester_user_id` int(11) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_request_detail`
--

CREATE TABLE `leave_request_detail` (
  `id` int(11) NOT NULL,
  `employee_leave_request_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `designation_id` int(11) NOT NULL,
  `status` enum('0','1','2','3','4') NOT NULL DEFAULT '0' COMMENT '0=>Default,1=>Approve,2=>Reject, 4=>cancelled',
  `approver_user_id` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `is_deleted` enum('0','1') DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `is_active` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=>Default,1=>active,2=>inactive',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `faculty_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortcode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>default,1=>deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_class_room`
--

CREATE TABLE `program_class_room` (
  `id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `class_room_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_semester`
--

CREATE TABLE `program_semester` (
  `id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_semester_sections`
--

CREATE TABLE `program_semester_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_session`
--

CREATE TABLE `program_session` (
  `id` int(11) NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_subject`
--

CREATE TABLE `program_subject` (
  `id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `is_default` enum('0','1') NOT NULL DEFAULT '0',
  `created_by_id` int(11) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `is_deleted` enum('0','1') DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `is_default`, `created_by_id`, `modified_by_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'super admin', '1', NULL, NULL, '0', '2023-08-27 16:55:10', '2023-08-27 16:55:10'),
(2, 'admin', '1', NULL, NULL, '0', '2023-08-27 16:55:10', '2023-08-27 16:55:10'),
(3, 'manager', '1', NULL, NULL, '0', '2023-08-27 16:55:10', '2023-08-27 16:55:10'),
(4, 'principal', '1', NULL, NULL, '0', '2023-08-27 16:55:10', '2023-08-27 16:55:10'),
(5, 'staff', '1', NULL, 2, '1', '2023-08-27 16:55:10', '2023-09-26 22:07:06'),
(6, 'librarian', '1', NULL, NULL, '0', '2023-08-27 16:55:10', '2023-08-27 16:55:10'),
(7, 'accountant', '1', NULL, NULL, '0', '2023-08-27 16:55:10', '2023-08-27 16:55:10'),
(8, 'student', '1', NULL, NULL, '0', '2023-08-27 16:55:10', '2023-08-27 16:55:10'),
(9, 'parent', '1', NULL, NULL, '0', '2023-08-27 16:55:10', '2023-08-27 16:55:10'),
(10, 'test role11', '0', 2, 2, '1', '2023-09-26 20:40:48', '2023-09-26 22:07:32'),
(11, 'test role 2', '0', 2, 2, '1', '2023-09-29 21:51:15', '2023-10-03 13:52:04'),
(12, 'test1', '0', 2, NULL, '0', '2023-10-22 17:37:35', '2023-10-22 17:37:35'),
(13, 'Crew', '0', 47, NULL, '0', '2023-10-23 18:07:38', '2023-10-23 18:07:38'),
(14, 'rakesh', '0', 46, 46, '1', '2023-12-06 19:53:09', '2023-12-06 19:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name`, `address`, `email`, `password`, `phone_no`, `logo`, `logo_path`, `note`, `created_by_id`, `modified_by_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'TEST SCHOOL', 'test address', 'manishamali64@gmail.com', NULL, '1234567890', 'logo_1702906613.png', 'logo/logo_1702906613.png', 'test note', 2, NULL, '0', '2023-12-18 18:36:53', '2023-12-18 18:36:53'),
(3, 'rakesh', 'surat', 'makwanarakesh923@gmail.com', '$2y$10$rckuKW58DgYtxAkMD4DDeeZn.BPY.5Vs1u8cQSktq6Rq/PaS7zTQ.', '9874563210', NULL, NULL, NULL, 46, NULL, '0', '2023-12-26 14:06:09', '2023-12-26 19:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `school_contact_person`
--

CREATE TABLE `school_contact_person` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `school_contact_person`
--

INSERT INTO `school_contact_person` (`id`, `school_id`, `first_name`, `last_name`, `position`, `email`, `phone_no`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, '0', '2023-12-18 18:26:15', '2023-12-18 18:26:15'),
(2, 1, NULL, NULL, NULL, NULL, NULL, '0', '2023-12-18 18:26:15', '2023-12-18 18:26:15'),
(3, 1, NULL, NULL, NULL, NULL, NULL, '0', '2023-12-18 18:26:15', '2023-12-18 18:26:15'),
(4, 1, NULL, NULL, NULL, NULL, NULL, '0', '2023-12-18 18:36:53', '2023-12-18 18:36:53'),
(5, 1, NULL, NULL, NULL, NULL, NULL, '0', '2023-12-18 18:36:53', '2023-12-18 18:36:53'),
(6, 1, NULL, NULL, NULL, NULL, NULL, '0', '2023-12-18 18:36:53', '2023-12-18 18:36:53'),
(7, 2, NULL, NULL, NULL, NULL, NULL, '0', '2023-12-26 13:51:17', '2023-12-26 13:51:17'),
(8, 2, NULL, NULL, NULL, NULL, NULL, '0', '2023-12-26 13:51:17', '2023-12-26 13:51:17'),
(9, 2, NULL, NULL, NULL, NULL, NULL, '0', '2023-12-26 13:51:17', '2023-12-26 13:51:17'),
(10, 3, NULL, NULL, NULL, NULL, NULL, '0', '2023-12-26 14:06:09', '2023-12-26 14:06:09'),
(11, 3, NULL, NULL, NULL, NULL, NULL, '0', '2023-12-26 14:06:09', '2023-12-26 14:06:09'),
(12, 3, NULL, NULL, NULL, NULL, NULL, '0', '2023-12-26 14:06:09', '2023-12-26 14:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>default,1=>deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>default,1=>deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `current` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=>notcurrent,1=>current',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=>inactive,1=>active',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>default,1=>deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `code`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Australian Capital Territory', 'australian_capital_erritory', 0, '2024-05-04 13:21:08', NULL),
(2, 'Fee for Service', 'fee_for_service', 0, '2024-05-04 13:22:01', NULL),
(3, 'New South Wales', 'new_south_wales', 0, '2024-05-04 13:23:14', NULL),
(4, 'Northern Territory', 'northern_territory', 0, '2024-05-04 13:23:14', NULL),
(5, 'Other (Overseas)', 'Other_(overseas)', 0, '2024-05-04 13:23:46', NULL),
(6, 'Other Australian Territories or Dependencies', 'Other_austrian', 0, '2024-05-04 13:24:21', NULL),
(7, 'Queensland', 'queensland', 0, '2024-05-04 13:24:57', NULL),
(8, 'South Australia', 'south_australia', 0, '2024-05-04 13:24:57', NULL),
(9, 'TasmaniaTasmania', 'tasmania', 0, '2024-05-04 13:25:47', NULL),
(10, 'Victoria', 'victoria', 0, '2024-05-04 13:25:47', NULL),
(11, 'Western Australia', 'western_australia', 0, '2024-05-04 13:26:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `buildingName` varchar(25) DEFAULT NULL,
  `buildingName_postal` varchar(25) DEFAULT NULL,
  `businessNumber` varchar(25) DEFAULT NULL,
  `certificateName` varchar(25) DEFAULT NULL,
  `companyName` varchar(25) DEFAULT NULL,
  `priorEdAchievement` varchar(25) DEFAULT NULL,
  `contactNumber` bigint(20) DEFAULT NULL,
  `colStatusSurveyResponse` varchar(25) DEFAULT NULL,
  `colStatusSurvey` varchar(25) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `country_postal` varchar(25) DEFAULT NULL,
  `birthCountry` varchar(25) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `preferred_contact` text DEFAULT NULL,
  `isMainEnglish` varchar(25) DEFAULT NULL,
  `studentEmail` varchar(25) DEFAULT NULL,
  `studentEmail2` varchar(25) DEFAULT NULL,
  `studentEmail3` varchar(25) DEFAULT NULL,
  `employeeNumber` varchar(25) DEFAULT NULL,
  `Employer_Info_Consent` varchar(25) DEFAULT NULL,
  `labourStatus` varchar(25) DEFAULT NULL,
  `entryDate` date DEFAULT NULL,
  `facsimileNumber` varchar(25) DEFAULT NULL,
  `firstName` varchar(25) DEFAULT NULL,
  `unitDetails` varchar(25) DEFAULT NULL,
  `unitDetails_postal` varchar(25) DEFAULT NULL,
  `gender` varchar(25) DEFAULT NULL,
  `isDisabled` varchar(25) DEFAULT NULL,
  `highestLevelCompleted` varchar(25) DEFAULT NULL,
  `homeNumber` bigint(25) DEFAULT NULL,
  `indigenousStatus` varchar(25) DEFAULT NULL,
  `isContact` bigint(20) DEFAULT NULL,
  `isLearner` varchar(25) DEFAULT NULL,
  `lastName` varchar(25) DEFAULT NULL,
  `middleName` varchar(25) DEFAULT NULL,
  `RTOStudentId` varchar(25) DEFAULT NULL,
  `isInternational` varchar(25) DEFAULT NULL,
  `postCode` varchar(25) DEFAULT NULL,
  `postalCode_postal` varchar(25) DEFAULT NULL,
  `deliveryBox_postal` varchar(25) DEFAULT NULL,
  `preferredName` varchar(25) DEFAULT NULL,
  `role` varchar(25) DEFAULT NULL,
  `state` varchar(25) DEFAULT NULL,
  `state_postal` varchar(25) DEFAULT NULL,
  `colStatus` varchar(25) DEFAULT NULL,
  `stillAtSchool` varchar(25) DEFAULT NULL,
  `addressLine2` varchar(25) DEFAULT NULL,
  `streetName_postal` varchar(25) DEFAULT NULL,
  `addressLine1` varchar(25) DEFAULT NULL,
  `streetNumber_postal` varchar(25) DEFAULT NULL,
  `suburb` varchar(25) DEFAULT NULL,
  `suburb_postal` varchar(25) DEFAULT NULL,
  `surveyStat` varchar(25) DEFAULT NULL,
  `title` varchar(25) DEFAULT NULL,
  `uniqueStudentIdentifier` varchar(25) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `nameType` text DEFAULT NULL,
  `vsn` varchar(25) DEFAULT NULL,
  `fax` text DEFAULT NULL,
  `yearSchoolCompleted` varchar(25) DEFAULT NULL,
  `nationalID` varchar(55) DEFAULT NULL,
  `streetNumber` varchar(55) DEFAULT NULL,
  `is_deleted` enum('1','0') DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `buildingName`, `buildingName_postal`, `businessNumber`, `certificateName`, `companyName`, `priorEdAchievement`, `contactNumber`, `colStatusSurveyResponse`, `colStatusSurvey`, `country`, `country_postal`, `birthCountry`, `dob`, `preferred_contact`, `isMainEnglish`, `studentEmail`, `studentEmail2`, `studentEmail3`, `employeeNumber`, `Employer_Info_Consent`, `labourStatus`, `entryDate`, `facsimileNumber`, `firstName`, `unitDetails`, `unitDetails_postal`, `gender`, `isDisabled`, `highestLevelCompleted`, `homeNumber`, `indigenousStatus`, `isContact`, `isLearner`, `lastName`, `middleName`, `RTOStudentId`, `isInternational`, `postCode`, `postalCode_postal`, `deliveryBox_postal`, `preferredName`, `role`, `state`, `state_postal`, `colStatus`, `stillAtSchool`, `addressLine2`, `streetName_postal`, `addressLine1`, `streetNumber_postal`, `suburb`, `suburb_postal`, `surveyStat`, `title`, `uniqueStudentIdentifier`, `image`, `nameType`, `vsn`, `fax`, `yearSchoolCompleted`, `nationalID`, `streetNumber`, `is_deleted`, `updated_at`, `created_at`) VALUES
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ui@mail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kuldip', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'domadiya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-05-13 06:08:26', '2024-05-10 22:10:48'),
(13, NULL, NULL, NULL, 'dipak sharma', NULL, NULL, NULL, 'A', NULL, 'xx', NULL, NULL, NULL, NULL, NULL, 'dipak@mail.com', NULL, NULL, NULL, NULL, NULL, '2024-05-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1', 'sharma', NULL, NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', 'A', NULL, '2024/05/11/download_image (5)_14-19-54.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2024-05-15 23:30:03', '2024-05-11 08:33:20'),
(14, NULL, NULL, NULL, 'dipak sharma', NULL, NULL, NULL, 'A', NULL, 'Polynesia (excludes Hawaii), nec', NULL, NULL, NULL, 'email:fdsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kuldip', NULL, NULL, 'M', NULL, 'M', NULL, NULL, 1, '1', 'domadiya', NULL, NULL, 'Y', NULL, NULL, NULL, 'email:fdsf', NULL, 'Tasmania', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, '1', NULL, NULL, NULL, '4545454545', NULL, '0', '2024-05-16 07:08:08', '2024-05-13 06:08:04'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mobile:sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fsdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2024-05-22 07:08:46', '2024-05-22 07:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `credit_hour` int(11) DEFAULT NULL,
  `subject_type` tinyint(4) DEFAULT NULL COMMENT '0 Optional & 1 Compulsory',
  `class_type` tinyint(4) DEFAULT NULL COMMENT '1 Theory, 2 Practical & 3 Both',
  `total_marks` decimal(5,2) DEFAULT NULL,
  `passing_marks` decimal(5,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by_id` int(11) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `title`, `code`, `credit_hour`, `subject_type`, `class_type`, `total_marks`, `passing_marks`, `description`, `status`, `created_by_id`, `modified_by_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'subject 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 49, NULL, '0', '2023-10-25 12:56:46', '2023-10-25 12:56:46'),
(2, 'Subject', 'C-123', 5, 1, 1, NULL, NULL, NULL, 1, NULL, NULL, '0', '2024-01-25 19:37:08', '2024-01-25 19:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `first_name`, `last_name`, `created_by_id`, `modified_by_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'teacher1', 'a', 49, 49, '0', '2023-10-25 12:57:09', '2023-10-25 12:57:17'),
(2, 'teacher 2', 'a', 49, NULL, '0', '2023-12-10 18:48:34', '2023-12-10 18:48:34'),
(3, 'teacher 3', 'sdf', 49, NULL, '0', '2023-12-10 18:50:11', '2023-12-10 18:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher_subject`
--

INSERT INTO `teacher_subject` (`id`, `teacher_id`, `subject_id`, `created_by_id`, `modified_by_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 49, NULL, '1', '2023-10-25 12:57:09', '2023-10-25 12:59:53'),
(2, 1, 1, 49, NULL, '0', '2023-10-25 13:00:09', '2023-10-25 13:00:09'),
(3, 2, 1, 49, NULL, '0', '2023-12-10 18:48:34', '2023-12-10 18:48:34'),
(4, 3, 1, 49, NULL, '0', '2023-12-10 18:50:11', '2023-12-10 18:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(11) NOT NULL,
  `newCertificateName` varchar(255) DEFAULT NULL,
  `administrative` varchar(255) DEFAULT NULL,
  `companyId` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `orientation` varchar(255) DEFAULT NULL,
  `leading_text` varchar(255) DEFAULT NULL,
  `signing_authority` text DEFAULT NULL,
  `secound_signing` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `enableSCORM` varchar(255) DEFAULT NULL,
  `enableVSN` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `g_CompanyRegStatus` varchar(255) DEFAULT NULL,
  `trailing_text` varchar(255) DEFAULT NULL,
  `isCloudAssessEnabled` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `requireAVETMISS` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `studentEportfolioEnabled` varchar(255) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `newCertificateName`, `administrative`, `companyId`, `size`, `orientation`, `leading_text`, `signing_authority`, `secound_signing`, `email`, `enableSCORM`, `enableVSN`, `firstname`, `g_CompanyRegStatus`, `trailing_text`, `isCloudAssessEnabled`, `lastname`, `requireAVETMISS`, `image`, `studentEportfolioEnabled`, `timezone`, `userId`, `updated_at`, `created_at`) VALUES
(1, 'dasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27', '2024-05-27'),
(2, 'dasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27', '2024-05-27'),
(3, 'dasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27', '2024-05-27'),
(4, 'dasd', NULL, NULL, 'A3', 'portrait', 'reer', '{\"signing_authority_name\":\"rerer\",\"signing_authority_title\":\"rer\"}', '{\"secound_signing_name\":\"rererdsadasdasd\",\"secound_signing_title\":\"errerdsadasd\"}', NULL, NULL, NULL, NULL, NULL, 'ererer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-27', '2024-05-27'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, '{\"signing_authority_name\":null,\"signing_authority_title\":null}', '{\"secound_signing_name\":null,\"secound_signing_title\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024/05/29/Rectangle 3_09-58-57.png', NULL, NULL, NULL, '2024-05-29', '2024-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `templates_background`
--

CREATE TABLE `templates_background` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `templates_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `dpi` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates_background`
--

INSERT INTO `templates_background` (`id`, `templates_id`, `name`, `image`, `dpi`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 5, 'ddasd', '2024/05/29/Rectangle 3_11-04-25.png', '72dpi', NULL, '2024-05-29 05:34:25', '2024-05-29 05:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `gender` enum('1','2') DEFAULT '1',
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `activation_token` varchar(64) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `options` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `profile_image_path` varchar(255) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `middle_name`, `email`, `gender`, `username`, `password`, `activation_token`, `status`, `remember_token`, `options`, `profile_image`, `profile_image_path`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 3, 'admin', NULL, NULL, 'admin@gmail.com', '1', 'Prismavix', '$2y$12$Avrs/7z61YR2DIgyf0Ok7OvMzix8j0pKWTjR8hsOUMIYaRStq/3.y', '7c5e3f90-aff1-4a26-8e7d-0d7877e6367f', 'activated', NULL, NULL, 'profile_image1698137869.jpg', 'profile_image/profile_image1698137869.jpg', '0', '2023-08-27 16:55:11', '2024-01-16 17:04:13'),
(46, 2, 'rakesh', 'makwana', NULL, 'makwanarakesh256@gmail.com', '1', 'rakesh256', '$2y$10$rckuKW58DgYtxAkMD4DDeeZn.BPY.5Vs1u8cQSktq6Rq/PaS7zTQ.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2023-10-20 13:03:00', '2023-10-20 18:40:19'),
(47, 1, 'raazi', 'baloch', NULL, 'raazibaloch512@gmail.com', '2', 'raazi', '$2y$10$HACcSlvNL8xUsrTqgcdkP.ywClFm4yzedojJAt/lRHe6rnHSM5zSC', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2023-10-20 13:05:42', '2023-10-20 18:53:22'),
(50, 1, 'anu123', 'sd', NULL, 'suhania1@yopmail.com', '1', 'suhania1@yopmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2023-10-23 09:16:04', '2023-10-23 09:16:04'),
(51, 1, 'asd', 'sd', NULL, '1ashwwwwi@yopmail.com', '1', '1manishasdsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2023-10-23 09:19:19', '2023-10-23 09:19:19'),
(52, 1, 'nn', 'asdf', NULL, 'manishamali64@gmail.com', '1', 'manishamali64', '$2y$10$gYgFyWAWRfoPpYcjPKV0OeBAixjmw7Isz2bBYj1ZhQtCezk0rHcQS', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2023-10-23 09:59:18', '2023-10-23 09:59:18'),
(53, 1, 'Johane', 'Morrison', NULL, 'raazikhan512@gmail.com', '1', 'johaneM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-10-23 15:54:48', '2023-10-23 16:47:33'),
(54, 1, 'Johane', 'Morrison', NULL, 'kfarwa620@gmail.com', '1', 'johane2214', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2023-10-23 15:56:01', '2023-10-23 15:56:01'),
(55, 1, 'Harry', 'Potter', NULL, 'ttru@gmail.com', '1', 'Harry993', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-10-23 16:41:42', '2023-10-23 16:48:51'),
(56, 1, 'Sunaina', 'Nehal', NULL, 'hello@gmail.com', '1', 'sunaina445', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-10-23 16:44:56', '2023-10-23 16:50:38'),
(57, 1, 'John', 'Jim', NULL, '%@gmail.com', '1', 'johnjim002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-10-23 16:52:20', '2024-01-16 17:11:30'),
(58, 1, 'Tina', 'Datta', NULL, '89012@gmail.com', '2', 'tina7734', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2023-10-23 17:06:47', '2023-10-23 17:06:47'),
(59, 1, 'Alex', 'Jones', NULL, 'ALEX889056@gmail.com', '1', 'alex0043', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2023-10-23 17:23:52', '2023-10-23 17:23:52'),
(60, 1, 'Robert', 'Brown', NULL, 'zarnish77890@gmail.com', '1', 'robert990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2023-10-23 17:31:35', '2023-10-23 17:31:35'),
(61, 1, 'Jessica', 'Rode', NULL, 'LaibA889045@gmail.com', '1', 'jessica0021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2023-10-23 17:43:00', '2023-10-23 17:43:00'),
(64, 1, 'Rakesh', 'makwana', NULL, 'makwanarakesh923@gmail.com', '1', 'rakeshrk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2023-12-13 11:34:15', '2023-12-13 11:34:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_class`
--
ALTER TABLE `academic_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_sessions`
--
ALTER TABLE `academic_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_type`
--
ALTER TABLE `attendance_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avetmisses`
--
ALTER TABLE `avetmisses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_program`
--
ALTER TABLE `batch_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_rooms`
--
ALTER TABLE `class_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_category`
--
ALTER TABLE `employee_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_allocation`
--
ALTER TABLE `leave_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_allocation_detail`
--
ALTER TABLE `leave_allocation_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_request_detail`
--
ALTER TABLE `leave_request_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_class_room`
--
ALTER TABLE `program_class_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_semester`
--
ALTER TABLE `program_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_semester_sections`
--
ALTER TABLE `program_semester_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_session`
--
ALTER TABLE `program_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_subject`
--
ALTER TABLE `program_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_contact_person`
--
ALTER TABLE `school_contact_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates_background`
--
ALTER TABLE `templates_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_class`
--
ALTER TABLE `academic_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `academic_sessions`
--
ALTER TABLE `academic_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_type`
--
ALTER TABLE `attendance_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `avetmisses`
--
ALTER TABLE `avetmisses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch_program`
--
ALTER TABLE `batch_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class_rooms`
--
ALTER TABLE `class_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_category`
--
ALTER TABLE `employee_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_allocation`
--
ALTER TABLE `leave_allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_allocation_detail`
--
ALTER TABLE `leave_allocation_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_request`
--
ALTER TABLE `leave_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_request_detail`
--
ALTER TABLE `leave_request_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_class_room`
--
ALTER TABLE `program_class_room`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_semester`
--
ALTER TABLE `program_semester`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_semester_sections`
--
ALTER TABLE `program_semester_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_session`
--
ALTER TABLE `program_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_subject`
--
ALTER TABLE `program_subject`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_contact_person`
--
ALTER TABLE `school_contact_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `templates_background`
--
ALTER TABLE `templates_background`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
