-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 09:42 AM
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
-- Database: `prixmavix_data`
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
-- Table structure for table `avetmiss_code`
--

CREATE TABLE `avetmiss_code` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_code` varchar(255) NOT NULL,
  `state_course_code` varchar(255) NOT NULL,
  `reporting_state` varchar(255) NOT NULL,
  `nominal_hours` varchar(255) NOT NULL,
  `recognition_identifier` varchar(255) NOT NULL,
  `qualification_category` varchar(255) NOT NULL,
  `anzscod_id` varchar(255) DEFAULT NULL,
  `vet_flag` varchar(255) NOT NULL,
  `field_of_education` varchar(255) DEFAULT NULL,
  `associated_course_identifier` varchar(255) NOT NULL,
  `status` enum('A','D') NOT NULL,
  `is_deleted` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `avetmiss_code`
--

INSERT INTO `avetmiss_code` (`id`, `course_id`, `course_code`, `state_course_code`, `reporting_state`, `nominal_hours`, `recognition_identifier`, `qualification_category`, `anzscod_id`, `vet_flag`, `field_of_education`, `associated_course_identifier`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'fdsf', 'fdsf', '1', '10', '4', '1', 'ASOPDd', '1', NULL, 'fds', 'A', NULL, '2024-07-09 01:47:44', '2024-07-09 01:47:44');

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
-- Table structure for table `certificate_emails`
--

CREATE TABLE `certificate_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `certificate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `city_town`
--

CREATE TABLE `city_town` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `ragion_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_deleted` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_town`
--

INSERT INTO `city_town` (`id`, `city_name`, `state`, `ragion_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'surat', 'ACT', 1, '0', '2024-07-02 05:53:10', '2024-07-02 05:53:10');

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
-- Table structure for table `compnies_documents`
--

CREATE TABLE `compnies_documents` (
  `id` int(11) NOT NULL,
  `document_name` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `upload_by` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compnies_documents`
--

INSERT INTO `compnies_documents` (`id`, `document_name`, `file_name`, `upload_by`, `type`, `created_at`, `updated_at`) VALUES
(3, 'nivana', 'document1717182755_educational_new.sql', NULL, NULL, '2024-05-31 13:42:35', '2024-05-31 13:42:35'),
(4, 'jiop', 'document/1717182784_educational_new.sql', NULL, NULL, '2024-05-31 13:43:04', '2024-05-31 13:43:04'),
(5, 'nivana', 'document/1717235467_educational_new.sql', NULL, 'info', '2024-06-01 04:21:07', '2024-06-01 04:21:07'),
(6, 'nuio', 'document/1717235648_educational_new (1).sql', NULL, 'email', '2024-06-01 04:24:08', '2024-06-01 04:24:08'),
(8, 'das', 'document/1717235803_Rectangle 77.png', NULL, 'email', '2024-06-01 04:26:43', '2024-06-01 04:26:43'),
(9, 'niara', 'document/1720520577_6716f478-f616-4f5d-928d-e76b15387dc4.xml', NULL, 'info', '2024-07-09 04:52:57', '2024-07-09 04:52:57'),
(10, 'das', 'document/1720520591_download_image.jpg', NULL, 'info', '2024-07-09 04:53:11', '2024-07-09 04:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `default_course_cost` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `delivery_method` varchar(255) DEFAULT NULL,
  `follow_up_enquiry` varchar(255) NOT NULL,
  `required_no_of_unit` varchar(255) NOT NULL,
  `core_unit` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `reporting_this_course` varchar(255) NOT NULL,
  `tga_package` varchar(255) NOT NULL,
  `status` enum('A','D') NOT NULL,
  `is_deleted` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `name`, `course_category_id`, `default_course_cost`, `description`, `comments`, `delivery_method`, `follow_up_enquiry`, `required_no_of_unit`, `core_unit`, `color`, `reporting_this_course`, `tga_package`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'fdsf', 'dasd', 7, '100', 'hui', 'huji', 'Self Paced,Public Sessions-Multiple Sessions,Private Sessions-Multiple Sessions', '2', '12', '50', '#000000', '1', '1', 'A', NULL, '2024-07-02 03:36:26', '2024-07-09 01:48:05'),
(2, 'BS90678', 'Hardware', 4, '0', 'dasd', 'dasdasd', 'Self Paced,Public Sessions-Single Session,Private Sessions-Single Session', '46', '12', '50', '#264369', '1', '1', 'A', NULL, '2024-07-09 01:29:06', '2024-07-09 01:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `course_assessor`
--

CREATE TABLE `course_assessor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_assessor`
--

INSERT INTO `course_assessor` (`id`, `course_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('A','D') NOT NULL,
  `is_deleted` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `name`, `description`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'kuldip', 'kuldip', 'A', '0', '2024-07-02 03:28:36', '2024-07-02 03:28:36'),
(2, 'hardware', 'hardware', 'A', '0', '2024-07-09 00:46:16', '2024-07-09 00:46:16'),
(3, 'Software', 'Software', 'A', '1', '2024-07-09 00:51:45', '2024-07-09 01:25:14'),
(4, 'dasdas', 'asdfrt', 'D', '0', '2024-07-09 00:59:03', '2024-07-09 01:25:05'),
(5, 'dasdas', 'asdfrt', 'A', '0', '2024-07-09 01:09:42', '2024-07-09 01:09:42'),
(6, 'kuldip', 'fds', 'D', '1', '2024-07-09 01:22:24', '2024-07-09 01:25:22'),
(7, 'dasdas12', 'dsadasdasdas', 'D', '0', '2024-07-09 01:22:42', '2024-07-09 01:22:42'),
(8, 'dasd', 'dasd', 'A', NULL, '2024-07-10 02:33:00', '2024-07-10 02:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `course_documents`
--

CREATE TABLE `course_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `document_name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_documents`
--

INSERT INTO `course_documents` (`id`, `course_id`, `document_name`, `file_name`, `path`, `created_at`, `updated_at`) VALUES
(1, NULL, 'WhatsApp Image 2024-07-06 at 19.00.14_5417e811.jpg', 'WhatsApp Image 2024-07-06 at 19.00.14_5417e811.jpg', 'http://127.0.0.1:8000/course_document/1720627305_WhatsApp Image 2024-07-06 at 19.00.14_5417e811.jpg', '2024-07-10 10:31:45', '2024-07-10 10:31:45'),
(3, NULL, '1720603128_1717235467_educational_new.sql', '1720603128_1717235467_educational_new.sql', 'http://127.0.0.1:8000/course_document/1720673782_1720603128_1717235467_educational_new.sql', '2024-07-10 23:26:22', '2024-07-10 23:26:22'),
(4, NULL, 'u763801428_kalyanifeb (1).sql', 'u763801428_kalyanifeb (1).sql', 'http://127.0.0.1:8000/course_document/1720673817_u763801428_kalyanifeb (1).sql', '2024-07-10 23:26:57', '2024-07-10 23:26:57'),
(5, 1, '1720675907_127_0_0_1 (1).sql', '127_0_0_1 (1).sql', 'http://127.0.0.1:8000/course_document/1720675907_127_0_0_1 (1).sql', '2024-07-11 00:01:47', '2024-07-11 00:01:47'),
(6, 1, '1720676771_1717235467_educational_new.sql', '1717235467_educational_new.sql', 'http://127.0.0.1:8000/course_document/1720676771_1717235467_educational_new.sql', '2024-07-11 00:16:11', '2024-07-11 00:16:11'),
(7, 1, '1720676777_1717235467_educational_new.sql', '1717235467_educational_new.sql', 'http://127.0.0.1:8000/course_document/1720676777_1717235467_educational_new.sql', '2024-07-11 00:16:17', '2024-07-11 00:16:17'),
(8, 1, '1720676808_1717235467_educational_new.sql', '1717235467_educational_new.sql', 'http://127.0.0.1:8000/course_document/1720676808_1717235467_educational_new.sql', '2024-07-11 00:16:48', '2024-07-11 00:16:48'),
(9, 1, '1720676826_6716f478-f616-4f5d-928d-e76b15387dc4.xml', '6716f478-f616-4f5d-928d-e76b15387dc4.xml', 'http://127.0.0.1:8000/course_document/1720676826_6716f478-f616-4f5d-928d-e76b15387dc4.xml', '2024-07-11 00:17:06', '2024-07-11 00:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `course_emails`
--

CREATE TABLE `course_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `certificate_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_emails`
--

INSERT INTO `course_emails` (`id`, `course_id`, `certificate_id`, `subject`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'hfghfghfgh', 'gvfdgdfg', '2024-07-11 02:03:27', '2024-07-11 02:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `course_email_contents`
--

CREATE TABLE `course_email_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `select_document` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_email_contents`
--

INSERT INTO `course_email_contents` (`id`, `course_id`, `subject`, `body`, `select_document`, `created_at`, `updated_at`) VALUES
(1, 1, 'test1', 'gsgsdfgsdfg', '[\"6\"]', '2024-07-10 04:27:16', '2024-07-10 05:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `course_event_notes`
--

CREATE TABLE `course_event_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` varchar(255) DEFAULT NULL,
  `note_category` varchar(255) DEFAULT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_event_notes`
--

INSERT INTO `course_event_notes` (`id`, `event_id`, `note_category`, `note`, `created_at`, `updated_at`) VALUES
(1, '4', NULL, 'fdsfsdf', '2024-07-09 00:18:19', '2024-07-09 00:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `course_teacher`
--

CREATE TABLE `course_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_teacher`
--

INSERT INTO `course_teacher` (`id`, `course_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `c_q_rreports`
--

CREATE TABLE `c_q_rreports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state` bigint(20) UNSIGNED DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `soa` varchar(255) DEFAULT NULL,
  `deletedcertificates` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `generated_by` varchar(255) DEFAULT NULL,
  `cqr_xml` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `c_q_rreports`
--

INSERT INTO `c_q_rreports` (`id`, `state`, `from`, `to`, `soa`, `deletedcertificates`, `qualification`, `generated_by`, `cqr_xml`, `created_at`, `updated_at`) VALUES
(13, 1, '2024-05-27', '2024-06-03', 'soa', 'deletedcertificates', 'qualification', 'admin', 'report/CQR_20240603180454.zip', '2024-06-03 12:34:54', '2024-06-03 12:34:54'),
(14, 5, '2024-05-01', '2024-06-03', 'soa', 'deletedcertificates', 'qualification', 'admin', 'report/CQR_20240603181444.zip', '2024-06-03 12:44:44', '2024-06-03 12:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `default_sessions`
--

CREATE TABLE `default_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dftCity` bigint(20) UNSIGNED DEFAULT NULL,
  `dftTrainer` bigint(20) UNSIGNED DEFAULT NULL,
  `dftstarthour` varchar(255) DEFAULT NULL,
  `dftstartmin` varchar(255) DEFAULT NULL,
  `dftstartampm` varchar(255) DEFAULT NULL,
  `dftendhour` varchar(255) DEFAULT NULL,
  `dftendmin` varchar(255) DEFAULT NULL,
  `dftendampm` varchar(255) DEFAULT NULL,
  `dftAssessor` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `default_sessions`
--

INSERT INTO `default_sessions` (`id`, `course_id`, `dftCity`, `dftTrainer`, `dftstarthour`, `dftstartmin`, `dftstartampm`, `dftendhour`, `dftendmin`, `dftendampm`, `dftAssessor`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, '01', '00', 'am', '01', '00', 'am', 1, '2024-07-02 05:55:11', '2024-07-10 08:08:43'),
(4, 1, 1, 1, '01', '00', 'am', '01', '00', 'am', 1, '2024-07-10 08:39:56', '2024-07-10 08:41:23'),
(5, 1, 1, 1, '01', '00', 'am', '04', '00', 'am', 1, '2024-07-10 09:12:54', '2024-07-10 09:12:54'),
(6, 1, 1, 1, '01', '00', 'pm', '01', '00', 'am', 1, '2024-07-10 09:13:09', '2024-07-10 09:28:37');

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
-- Table structure for table `document_enrolments`
--

CREATE TABLE `document_enrolments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_course_stores`
--

CREATE TABLE `email_course_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `com_chk` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_course_stores`
--

INSERT INTO `email_course_stores` (`id`, `course_id`, `subject`, `note`, `com_chk`, `created_at`, `updated_at`) VALUES
(26, 1, 'trainer reservation', 'fadsfadsfasdfadsfasdfadsf', '[\"6\",\"8\"]', '2024-07-11 00:32:08', '2024-07-11 00:38:47');

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
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `reference_id` int(10) UNSIGNED DEFAULT NULL,
  `source_id` int(10) UNSIGNED DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `follow_up_date` date DEFAULT NULL,
  `assigned` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_students` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 Closed, 1 Pending, 2 Progress, 3 Resolved',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `exclusion_inclusion_reports`
--

CREATE TABLE `exclusion_inclusion_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `info_pak_specific_documents`
--

CREATE TABLE `info_pak_specific_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `documentname` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_pak_specific_documents`
--

INSERT INTO `info_pak_specific_documents` (`id`, `documentname`, `filename`, `path`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'sql', '1720603865_1717235467_educational_new.sql', 'infopakdocument/1720603865_1717235467_educational_new.sql', NULL, '2024-07-10 04:01:05', '2024-07-10 04:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `direction` varchar(255) NOT NULL,
  `default` varchar(255) NOT NULL,
  `status` enum('A','D') NOT NULL,
  `is_deleted` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_06_06_055010_create_schedules_table', 2),
(4, '2024_06_21_090233_create_n_a_t_files_table', 3),
(5, '2024_06_25_042601_create_exclusion_inclusion_reports_table', 4),
(6, '2024_07_02_074913_create_language_table', 5),
(7, '2024_07_01_085521_create_course_categories', 6),
(8, '2024_07_02_053424_create_courses_table', 6),
(9, '2024_07_02_095056_create_avetmiss_code', 7),
(10, '2024_06_26_091959_create_modules_table', 8),
(16, '2024_06_28_094311_create_region_table', 9),
(17, '2024_06_28_095923_create_city_town_table', 9),
(18, '2024_06_28_145519_create_teachers_table', 10),
(23, '2024_07_04_114709_create_course_documents_table', 13),
(24, '2024_07_04_125507_create_email_course_stores_table', 14),
(25, '2024_07_08_095606_create_course_event_notes_table', 15),
(26, '2024_07_09_105232_create_info_pak_specific_documents_table', 16),
(27, '2024_07_10_094911_create_course_email_contents_table', 17),
(28, '2024_07_10_154049_create_course_teacher_table', 18),
(29, '2024_07_10_155656_create_course_teacher_table', 19),
(30, '2024_07_11_055550_create_document_enrolments_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `course_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'hgh', '2024-07-02 04:43:26', '2024-07-10 05:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `n_a_t_files`
--

CREATE TABLE `n_a_t_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_from` varchar(255) NOT NULL,
  `date_to` varchar(255) NOT NULL,
  `nat_file` varchar(255) NOT NULL,
  `no_out_come` varchar(255) NOT NULL,
  `generated_by` varchar(255) NOT NULL,
  `exclusion` varchar(255) NOT NULL,
  `inclusions` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `reporting_state` varchar(255) NOT NULL,
  `start_enrolments` varchar(255) NOT NULL,
  `forstate` varchar(255) NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `is_deleted` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `code`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'hilad', NULL, '0', '2024-07-02 05:52:51', '2024-07-02 05:52:51');

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
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `create_time` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `month` varchar(255) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `corse_id` varchar(255) NOT NULL,
  `qouta` varchar(255) NOT NULL,
  `status` enum('A','D') NOT NULL,
  `is_completed` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `create_time`, `start_date`, `end_date`, `month`, `city_name`, `corse_id`, `qouta`, `status`, `is_completed`, `created_at`, `updated_at`) VALUES
(1, '20-05-2023', '2024-06-04', '2024-06-10', 'dfgdfg', 'sgfsgdfg', 'sgsfdg', 'gsdfgfsdg', 'A', 'gsdfg', NULL, NULL);

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
-- Table structure for table `state_c_q_rreports`
--

CREATE TABLE `state_c_q_rreports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state` bigint(20) UNSIGNED DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `generated_by` date DEFAULT NULL,
  `soa` varchar(255) DEFAULT NULL,
  `deletedcertificates` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `relation` int(11) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `emergency_contact_no` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `first_guardian_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `profile_image_path` varchar(255) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `is_deleted` enum('0','1') DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `middle_name`, `last_name`, `gender`, `relation`, `contact_no`, `emergency_contact_no`, `nationality`, `first_guardian_name`, `date_of_birth`, `address`, `profile_image`, `profile_image_path`, `modified_by_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'sdfg1', 'df2', '233', 1, NULL, '123', '123', 'asdfg', '22', NULL, 'address', 'profile_image1698138522.jpg', 'profile_image/profile_image1698138522.jpg', 46, '0', '2023-09-18 15:49:27', '2024-01-15 20:15:32'),
(2, 'Ashish', 'Kumar', 'Saraf', 1, NULL, '1234567890', '1234567890', 'Indian', NULL, '1990-01-01', '05-b, Trade Corner, Saki Naka, Andheri (west)', 'profile_image1705337987.png', 'profile_image/profile_image1705337987.png', 46, '0', '2024-01-15 20:54:23', '2024-01-15 21:59:47'),
(3, 'Ashish', 'Kumar', 'Saraf', 1, NULL, 'abcdfghji', 'abcdfghji', 'Indian', NULL, '1990-01-01', '05-b, Trade Corner, Saki Naka, Andheri (west)', NULL, NULL, 46, '0', '2024-01-15 22:08:31', '2024-01-16 16:37:35');

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
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birth` varchar(255) DEFAULT NULL,
  `commenceDate` varchar(255) DEFAULT NULL,
  `email1` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `email3` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `suburb` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone1` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `days` varchar(255) DEFAULT NULL,
  `additionalId` varchar(255) DEFAULT NULL,
  `created_by_id` varchar(255) DEFAULT NULL,
  `is_deleted` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `birth`, `commenceDate`, `email1`, `email2`, `email3`, `address1`, `address2`, `suburb`, `state`, `postcode`, `country`, `phone1`, `phone2`, `days`, `additionalId`, `created_by_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'bjk', 'jkjn', '2024-06-30', '2024-07-02', 'kdomdiya@gmail.com', 'kdomdiya@gmail.com', 'kdomdiya@gmail.com', 'njknjkjnk', 'jnkjn', 'surat', 'Gujarat', '235689', 'India', '05623895623', '05623895623', 'kdomdiya@gmail.com', '1', '46', '0', '2024-07-02 05:54:46', '2024-07-02 05:54:46');

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
  `is_default` varchar(255) DEFAULT NULL,
  `g_CompanyRegStatus` varchar(255) DEFAULT NULL,
  `trailing_text` varchar(255) DEFAULT NULL,
  `isCloudAssessEnabled` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `requireAVETMISS` varchar(255) DEFAULT NULL,
  `associated_course` varchar(255) DEFAULT NULL,
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

INSERT INTO `templates` (`id`, `newCertificateName`, `administrative`, `companyId`, `size`, `orientation`, `leading_text`, `signing_authority`, `secound_signing`, `email`, `enableSCORM`, `enableVSN`, `firstname`, `is_default`, `g_CompanyRegStatus`, `trailing_text`, `isCloudAssessEnabled`, `lastname`, `requireAVETMISS`, `associated_course`, `image`, `studentEportfolioEnabled`, `timezone`, `userId`, `updated_at`, `created_at`) VALUES
(2, 'dasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-31', '2024-05-27'),
(3, 'dasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-31', '2024-05-27'),
(4, 'dasd', NULL, NULL, 'A3', 'portrait', 'reer', '{\"signing_authority_name\":\"rerer\",\"signing_authority_title\":\"rer\"}', '{\"secound_signing_name\":\"rererdsadasdasd\",\"secound_signing_title\":\"errerdsadasd\"}', NULL, NULL, NULL, NULL, '0', NULL, 'ererer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-31', '2024-05-27'),
(6, 'dasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-31', '2024-05-31'),
(7, 'dasd', NULL, NULL, 'A3', 'portrait', 'hello', '{\"signing_authority_name\":\"najira\",\"signing_authority_title\":\"javika\"}', '{\"secound_signing_name\":\"namila\",\"secound_signing_title\":\"kapila\"}', NULL, NULL, NULL, NULL, '0', NULL, 'calling', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-31', '2024-05-31'),
(8, 'dasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-31', '2024-05-31');

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
(1, 5, 'ddasd', '2024/05/29/Rectangle 3_11-04-25.png', '72dpi', NULL, '2024-05-29 05:34:25', '2024-05-29 05:34:25'),
(2, 7, NULL, '2024/05/31/Rectangle 77_12-43-48.png', '72dpi', NULL, '2024-05-31 07:13:49', '2024-05-31 07:13:49'),
(3, 7, NULL, '2024/05/31/Rectangle 77_12-52-56.png', '72dpi', NULL, '2024-05-31 07:22:56', '2024-05-31 07:22:56'),
(4, 7, NULL, '2024/05/31/Rectangle 77_13-12-29.png', '72dpi', NULL, '2024-05-31 07:42:29', '2024-05-31 07:42:29'),
(5, 7, 'xxzxzxczxcc', '2024/05/31/Rectangle 77_13-14-03.png', '72dpi', NULL, '2024-05-31 07:44:03', '2024-05-31 07:44:03'),
(6, 2, 'dsadasd', '2024/05/31/image 26 (1)_13-15-32.png', '72dpi', NULL, '2024-05-31 07:45:32', '2024-05-31 07:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `unit_of_competency`
--

CREATE TABLE `unit_of_competency` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `recognition_identifier` varchar(255) DEFAULT NULL,
  `qualification_category` varchar(255) DEFAULT NULL,
  `field_of_education` varchar(255) DEFAULT NULL,
  `nominal_hours` varchar(255) NOT NULL,
  `vet` varchar(255) NOT NULL,
  `competency_flag` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` enum('A','D') NOT NULL,
  `is_deleted` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_of_competency`
--

INSERT INTO `unit_of_competency` (`id`, `course_id`, `code`, `name`, `recognition_identifier`, `qualification_category`, `field_of_education`, `nominal_hours`, `vet`, `competency_flag`, `type`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'IND', 'dasd', NULL, NULL, 'jio', '30', '1', '0', 'elective', 'A', '0', '2024-07-09 02:15:57', '2024-07-09 02:15:57'),
(2, 1, 'IND', 'kuldip', NULL, NULL, 'jio', '30', '1', '0', 'core', 'A', '0', '2024-07-09 02:16:32', '2024-07-09 02:18:26'),
(3, 1, 'IND', 'dasd', NULL, NULL, NULL, '30', '1', '0', 'core', 'A', '0', '2024-07-09 02:17:17', '2024-07-09 02:17:17'),
(4, 1, 'test1', 'test1', NULL, NULL, 'tewst`', '7', '1', '0', 'core', 'A', '0', '2024-07-09 02:18:00', '2024-07-09 02:18:54');

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
(2, 3, 'admin', NULL, NULL, 'admin@gmail.com', '1', 'Prismavix', '$2y$10$gYgFyWAWRfoPpYcjPKV0OeBAixjmw7Isz2bBYj1ZhQtCezk0rHcQS', '7c5e3f90-aff1-4a26-8e7d-0d7877e6367f', 'activated', NULL, NULL, 'profile_image1698137869.jpg', 'profile_image/profile_image1698137869.jpg', '0', '2023-08-27 16:55:11', '2024-01-16 17:04:13'),
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
-- Indexes for table `avetmiss_code`
--
ALTER TABLE `avetmiss_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avetmiss_code_course_id_foreign` (`course_id`);

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
-- Indexes for table `certificate_emails`
--
ALTER TABLE `certificate_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_town`
--
ALTER TABLE `city_town`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_town_ragion_id_foreign` (`ragion_id`);

--
-- Indexes for table `class_rooms`
--
ALTER TABLE `class_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compnies_documents`
--
ALTER TABLE `compnies_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_course_category_id_foreign` (`course_category_id`);

--
-- Indexes for table `course_assessor`
--
ALTER TABLE `course_assessor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_assessor_course_id_foreign` (`course_id`),
  ADD KEY `course_assessor_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_documents`
--
ALTER TABLE `course_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_documents_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_emails`
--
ALTER TABLE `course_emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_emails_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_email_contents`
--
ALTER TABLE `course_email_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_email_contents_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_event_notes`
--
ALTER TABLE `course_event_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_teacher`
--
ALTER TABLE `course_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_teacher_course_id_foreign` (`course_id`),
  ADD KEY `course_teacher_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `c_q_rreports`
--
ALTER TABLE `c_q_rreports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_sessions`
--
ALTER TABLE `default_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `default_sessions_course_id_foreign` (`course_id`),
  ADD KEY `default_sessions_dftcity_foreign` (`dftCity`);

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
-- Indexes for table `document_enrolments`
--
ALTER TABLE `document_enrolments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_enrolments_course_id_foreign` (`course_id`);

--
-- Indexes for table `email_course_stores`
--
ALTER TABLE `email_course_stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_course_stores_course_id_foreign` (`course_id`);

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
-- Indexes for table `exclusion_inclusion_reports`
--
ALTER TABLE `exclusion_inclusion_reports`
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
-- Indexes for table `info_pak_specific_documents`
--
ALTER TABLE `info_pak_specific_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
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
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modules_course_id_foreign` (`course_id`);

--
-- Indexes for table `n_a_t_files`
--
ALTER TABLE `n_a_t_files`
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
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
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
-- Indexes for table `state_c_q_rreports`
--
ALTER TABLE `state_c_q_rreports`
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
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
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
-- Indexes for table `unit_of_competency`
--
ALTER TABLE `unit_of_competency`
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
-- AUTO_INCREMENT for table `avetmiss_code`
--
ALTER TABLE `avetmiss_code`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `certificate_emails`
--
ALTER TABLE `certificate_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city_town`
--
ALTER TABLE `city_town`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_rooms`
--
ALTER TABLE `class_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compnies_documents`
--
ALTER TABLE `compnies_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_assessor`
--
ALTER TABLE `course_assessor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_documents`
--
ALTER TABLE `course_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_emails`
--
ALTER TABLE `course_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_email_contents`
--
ALTER TABLE `course_email_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_event_notes`
--
ALTER TABLE `course_event_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_teacher`
--
ALTER TABLE `course_teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `c_q_rreports`
--
ALTER TABLE `c_q_rreports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `default_sessions`
--
ALTER TABLE `default_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `document_enrolments`
--
ALTER TABLE `document_enrolments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_course_stores`
--
ALTER TABLE `email_course_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
-- AUTO_INCREMENT for table `exclusion_inclusion_reports`
--
ALTER TABLE `exclusion_inclusion_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `info_pak_specific_documents`
--
ALTER TABLE `info_pak_specific_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `n_a_t_files`
--
ALTER TABLE `n_a_t_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `state_c_q_rreports`
--
ALTER TABLE `state_c_q_rreports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `templates_background`
--
ALTER TABLE `templates_background`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unit_of_competency`
--
ALTER TABLE `unit_of_competency`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avetmiss_code`
--
ALTER TABLE `avetmiss_code`
  ADD CONSTRAINT `avetmiss_code_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `city_town`
--
ALTER TABLE `city_town`
  ADD CONSTRAINT `city_town_ragion_id_foreign` FOREIGN KEY (`ragion_id`) REFERENCES `region` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_course_category_id_foreign` FOREIGN KEY (`course_category_id`) REFERENCES `course_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_assessor`
--
ALTER TABLE `course_assessor`
  ADD CONSTRAINT `course_assessor_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_assessor_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_documents`
--
ALTER TABLE `course_documents`
  ADD CONSTRAINT `course_documents_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_emails`
--
ALTER TABLE `course_emails`
  ADD CONSTRAINT `course_emails_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_email_contents`
--
ALTER TABLE `course_email_contents`
  ADD CONSTRAINT `course_email_contents_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_teacher`
--
ALTER TABLE `course_teacher`
  ADD CONSTRAINT `course_teacher_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `default_sessions`
--
ALTER TABLE `default_sessions`
  ADD CONSTRAINT `default_sessions_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `document_enrolments`
--
ALTER TABLE `document_enrolments`
  ADD CONSTRAINT `document_enrolments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `email_course_stores`
--
ALTER TABLE `email_course_stores`
  ADD CONSTRAINT `email_course_stores_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
