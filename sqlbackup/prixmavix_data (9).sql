-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 03:28 PM
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
(2, '1523', 'csdc', '31', '0', '907', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '[null,null,null,null,null,null,null,null,null,null,null]', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\"]', '[\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\"]', '[\"ACE\",null,null,null,null,null,null,null,null,null]', '2024-05-24', '2024-05-24'),
(3, '0', '12345', '25', '0', '907', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '[\"cdsf  fdsf\",null,null,null,null,null,null,null,null,null,null]', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\"]', '[\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\",\"20\"]', '[\"P\",\"IRL\",\"LV3\",null,null,null,null,null,null,null]', '2024-07-15', '2024-07-15');

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
(1, 'surat', 'ACT', 1, '0', '2024-07-02 05:53:10', '2024-07-02 05:53:10'),
(2, 'fdsf', 'ACT', 1, '0', '2024-07-11 02:14:12', '2024-07-11 02:14:12');

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
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_settings`
--

INSERT INTO `company_settings` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Course Setting', '{\"_token\":\"P057Y34XHFnc8XmPkGmYfPWtPBP3xgj2MPoDWPhh\",\"_method\":\"POST\",\"sel_rename\":\"Self Paced\",\"sel_init\":\"SP\",\"pub\":\"1\",\"pub_rename\":\"Public Sessions\",\"pub_init\":\"PUB\",\"pub_single\":\"on\",\"pub_multiple\":\"on\",\"pri\":\"on\",\"pri_rename\":\"Private Sessions\",\"pri_init\":\"PRI\",\"pri_single\":\"on\",\"pri_multiple\":\"on\",\"pub2_rename\":null,\"pub2_init\":null,\"pub3_rename\":null,\"pub3_init\":null,\"pub4\":\"on\",\"pub4_rename\":\"kuldip\",\"pub4_init\":null,\"pub4_single\":\"on\",\"pub4_multiple\":\"on\",\"pub5_rename\":null,\"pub5_init\":null,\"pub6_rename\":null,\"pub6_init\":null,\"eventStatusDefault\":\"All\",\"emailSettingsOption\":\"No\",\"emailAddress\":null,\"setattendanceListOption\":\"0\",\"showInfoPakChk\":\"1\"}', '2024-07-17 01:35:37', '2024-07-17 02:03:00'),
(3, 'Student Setting', '{\"_token\":\"P057Y34XHFnc8XmPkGmYfPWtPBP3xgj2MPoDWPhh\",\"_method\":\"post\",\"custom_field1\":\"hui la\",\"custom_field2\":\"gsdfgsdg\",\"custom_field3\":\"sfdgsdfg\",\"custom_field4\":\"dfgsdfg\",\"custom_field5\":\"gsfdgs\",\"custom_field6\":\"gsdf\",\"NationalID\":\"0\",\"number\":null,\"leadingtext\":null,\"trailingtext\":null,\"DOBSettingsOption\":\"0\",\"sendConfirmationEmailOption\":\"0\",\"enableVSN\":\"1\",\"enableApplyAll\":\"1\",\"allowMultipleEnrol\":\"0\"}', '2024-07-17 04:17:38', '2024-07-17 04:31:00');

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
(6, 'nagar nigam', 'document/1721027019_Attestation-for-marriage-Certificate.jpg', NULL, 'email', '2024-06-01 04:24:08', '2024-07-15 01:33:51'),
(9, 'niara', 'document/1720520577_6716f478-f616-4f5d-928d-e76b15387dc4.xml', NULL, 'info', '2024-07-09 04:52:57', '2024-07-09 04:52:57'),
(10, 'das', 'document/1720520591_download_image.jpg', NULL, 'info', '2024-07-09 04:53:11', '2024-07-09 04:53:11'),
(11, 'czxczxcc', 'document/1721023264_Attestation-for-marriage-Certificate.jpg', NULL, 'info', '2024-07-15 00:31:04', '2024-07-15 00:31:04'),
(12, 'gfdgdfg', 'document/1721027201_Attestation-for-marriage-Certificate.jpg', NULL, 'info', '2024-07-15 01:36:41', '2024-07-15 01:36:41'),
(13, 'kuldip', 'document/1721027217_Attestation-for-marriage-Certificate.jpg', NULL, 'email', '2024-07-15 01:36:57', '2024-07-15 01:36:57');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `self_paced_sessions` varchar(255) DEFAULT NULL,
  `public_sessions` varchar(255) DEFAULT NULL,
  `private_sessions` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `name`, `course_category_id`, `default_course_cost`, `description`, `comments`, `delivery_method`, `follow_up_enquiry`, `required_no_of_unit`, `core_unit`, `color`, `reporting_this_course`, `tga_package`, `status`, `is_deleted`, `created_at`, `updated_at`, `self_paced_sessions`, `public_sessions`, `private_sessions`) VALUES
(1, 'hardwares', 'hardwares', 7, '100', 'hui', 'huji', 'Self Paced,Public Sessions-Multiple Sessions,Private Sessions-Single Session', '64', '12', '50', '#000000', '1', '1', 'A', NULL, '2024-07-02 03:36:26', '2024-07-14 05:33:40', '1', 'Multiple Sessions', 'Single Session'),
(2, 'BS90678', 'Hardwaresdrt', 7, '0', 'dasd', 'dasdasd', 'Self Paced,Public Sessions-Single Session,Private Sessions-Single Session', '64', '12', '50', '#264369', '1', '1', 'A', NULL, '2024-07-09 01:29:06', '2024-07-14 02:47:38', '1', 'Single Session', 'Single Session');

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
(14, 5, '2024-05-01', '2024-06-03', 'soa', 'deletedcertificates', 'qualification', 'admin', 'report/CQR_20240603181444.zip', '2024-06-03 12:44:44', '2024-06-03 12:44:44'),
(15, 3, '2024-07-01', '2024-07-01', 'soa', 'deletedcertificates', 'qualification', 'rakesh', 'report/CQR_20240715115414.zip', '2024-07-15 06:24:14', '2024-07-15 06:24:14'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, ' ', 'report/CQR_20240717060310.zip', '2024-07-17 00:33:10', '2024-07-17 00:33:10'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, ' ', 'report/CQR_20240717060340.zip', '2024-07-17 00:33:40', '2024-07-17 00:33:40');

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
-- Table structure for table `enrolments`
--

CREATE TABLE `enrolments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `receivedBy` varchar(255) DEFAULT NULL,
  `paymentStatus` varchar(255) DEFAULT NULL,
  `discountAmount` varchar(255) DEFAULT NULL,
  `isTrainee` varchar(255) DEFAULT NULL,
  `isReported` varchar(255) DEFAULT NULL,
  `RTOStudentId` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrolments`
--

INSERT INTO `enrolments` (`id`, `course_id`, `student_id`, `event_id`, `receivedBy`, `paymentStatus`, `discountAmount`, `isTrainee`, `isReported`, `RTOStudentId`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 54, 'Email', 'PAID', '100', 'on', 'on', '10001', '2024-07-16 04:21:58', '2024-07-16 04:21:58'),
(2, 1, 2, 54, 'Email', 'PAID', '100', 'on', 'on', '10001', '2024-07-16 23:07:18', '2024-07-16 23:07:18'),
(3, 1, 2, 59, 'Email', 'PAID', '100', 'on', 'on', NULL, '2024-07-16 23:21:27', '2024-07-16 23:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `enrolment_add_notes`
--

CREATE TABLE `enrolment_add_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  `note_category` bigint(20) UNSIGNED DEFAULT NULL,
  `template` text NOT NULL,
  `note` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrolment_add_notes`
--

INSERT INTO `enrolment_add_notes` (`id`, `student_id`, `course_id`, `note_category`, `template`, `note`, `attachment`, `upload`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 2, '1', 2, 'Open this select Template', 'afdsfdsf', 'Enrolment_Notes_kuldip_domadiya.pdf', 'notes/Enrolment_1721220027_Enrolment_Notes_kuldip_domadiya.pdf', NULL, '2024-07-17 07:10:27', '2024-07-17 07:10:27'),
(2, 2, '1', 2, 'Open this select Template', 'dsadsf', 'Enrolment_Notes_kuldip_domadiya.pdf', 'notes/Enrolment_1721220224_Enrolment_Notes_kuldip_domadiya.pdf', NULL, '2024-07-17 07:13:44', '2024-07-17 07:13:44'),
(3, 2, '1', 2, 'Open this select Template', 'fasdfasdf', 'Enrolment_Notes_kuldip_domadiya.pdf', 'notes/Enrolment_1721220569_Enrolment_Notes_kuldip_domadiya.pdf', ' rakesh makwana', '2024-07-17 07:19:29', '2024-07-17 07:19:29');

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
(59, '2', '1', '1', 'hibaja', '1', NULL, 'January', '2024', '1', '0', '2', '0', 'efewrfet', NULL, 'YNN', 'I', '1', NULL, '0', '2024-07-14 07:52:47', '2024-07-14 07:52:47'),
(60, '2', '1', '1', 'hibaja', '1', NULL, 'January', '2024', '1', '0', '2', '0', 'efewrfet', NULL, 'YNN', 'I', '1', NULL, '1', '2024-07-14 07:53:12', '2024-07-15 08:58:49');

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
-- Table structure for table `issue_certificates`
--

CREATE TABLE `issue_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `learner_s_m_s_notes`
--

CREATE TABLE `learner_s_m_s_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_id` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learner_s_m_s_notes`
--

INSERT INTO `learner_s_m_s_notes` (`id`, `course_id`, `event_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, '54', 'dsdfsdfsdf', '2024-07-15 09:37:24', '2024-07-15 09:37:24'),
(2, 1, '54', 'dsdfsdfsdf', '2024-07-15 09:39:00', '2024-07-15 09:39:00'),
(3, 1, '54', 'fdsfafasdfasf', '2024-07-15 09:39:16', '2024-07-15 09:39:16');

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
(30, '2024_07_11_055550_create_document_enrolments_table', 20),
(31, '2024_07_10_094911_create_course_email_contents_table', 12),
(33, '2024_07_14_063501_create_sessions_table', 21),
(35, '2024_07_15_145530_create_learner_s_m_s_notes_table', 22),
(36, '2024_07_15_154219_create_issue_certificates_table', 23),
(37, '2024_07_16_143224_create_password_resets_table', 24),
(38, '2024_07_17_055818_create_company_settings_table', 25),
(39, '2024_07_17_090200_create_student_note_categories_table', 26);

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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
(10, 'Ashadeep', '112 sai ram dham nagar', 'kdomdiya@gmail.com', NULL, '05623895623', 'logo_1721186938.jpg', 'logo/logo_1721186938.jpg', '123456', 46, NULL, '0', '2024-07-16 21:58:58', '2024-07-16 21:58:58');

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
(12, 3, NULL, NULL, NULL, NULL, NULL, '0', '2023-12-26 14:06:09', '2023-12-26 14:06:09'),
(13, 4, 'miharja', 'jayal', 'admin', 'kdomdiya@gmail.com', '7894562356', '0', '2024-07-16 09:56:05', '2024-07-16 09:56:05'),
(14, 4, NULL, NULL, NULL, NULL, NULL, '0', '2024-07-16 09:56:05', '2024-07-16 09:56:05'),
(15, 4, NULL, NULL, NULL, NULL, NULL, '0', '2024-07-16 09:56:05', '2024-07-16 09:56:05'),
(16, 5, 'bjk', 'jkjn', NULL, 'kdomdiya@gmail.com', '05623895623', '0', '2024-07-16 10:58:00', '2024-07-16 10:58:00'),
(17, 5, 'bjk', 'jkjn', NULL, NULL, NULL, '0', '2024-07-16 10:58:00', '2024-07-16 10:58:00'),
(18, 5, NULL, NULL, NULL, NULL, NULL, '0', '2024-07-16 10:58:00', '2024-07-16 10:58:00'),
(19, 6, 'bjk', 'jkjn', NULL, 'kdomdiya@gmail.com', '05623895623', '0', '2024-07-16 11:07:43', '2024-07-16 11:07:43'),
(20, 6, NULL, NULL, NULL, NULL, NULL, '0', '2024-07-16 11:07:43', '2024-07-16 11:07:43'),
(21, 6, NULL, NULL, NULL, NULL, NULL, '0', '2024-07-16 11:07:43', '2024-07-16 11:07:43'),
(22, 7, 'bjk', 'jkjn', NULL, 'kdomdiya@gmail.com', '05623895623', '0', '2024-07-16 11:17:32', '2024-07-16 11:17:32'),
(23, 7, 'bjk', 'jkjn', NULL, NULL, NULL, '0', '2024-07-16 11:17:32', '2024-07-16 11:17:32'),
(24, 7, NULL, NULL, NULL, NULL, NULL, '0', '2024-07-16 11:17:32', '2024-07-16 11:17:32'),
(25, 9, NULL, NULL, NULL, NULL, NULL, '0', '2024-07-16 21:58:32', '2024-07-16 21:58:32'),
(26, 9, NULL, NULL, NULL, NULL, NULL, '0', '2024-07-16 21:58:32', '2024-07-16 21:58:32'),
(27, 9, NULL, NULL, NULL, NULL, NULL, '0', '2024-07-16 21:58:32', '2024-07-16 21:58:32'),
(28, 10, NULL, NULL, NULL, NULL, NULL, '0', '2024-07-16 21:58:59', '2024-07-16 21:58:59'),
(29, 10, NULL, NULL, NULL, NULL, NULL, '0', '2024-07-16 21:58:59', '2024-07-16 21:58:59'),
(30, 10, NULL, NULL, NULL, NULL, NULL, '0', '2024-07-16 21:58:59', '2024-07-16 21:58:59');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `assessor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `rooms` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `dftstarthour` varchar(255) DEFAULT NULL,
  `dftstartmin` varchar(255) DEFAULT NULL,
  `dftstartampm` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `dftendhour` varchar(255) DEFAULT NULL,
  `dftendmin` varchar(255) DEFAULT NULL,
  `dftendampm` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `title`, `course_id`, `teacher_id`, `assessor_id`, `event_id`, `location`, `rooms`, `start_date`, `dftstarthour`, `dftstartmin`, `dftstartampm`, `end_date`, `dftendhour`, `dftendmin`, `dftendampm`, `created_at`, `updated_at`) VALUES
(11, 'hello', 2, 1, 1, 57, '0', NULL, '2024-07-5', '02', '00', 'am', '2024-07-12', '02', '00', 'am', '2024-07-14 06:11:30', '2024-07-14 06:11:30'),
(12, NULL, 1, 1, 1, 58, NULL, NULL, '2024-07-10', '01', '00', 'am', '2024-07-11', '01', '00', 'am', '2024-07-14 07:52:30', '2024-07-14 07:52:30'),
(13, NULL, 1, 1, 1, 58, NULL, NULL, '2024-07-13', '01', '00', 'am', '2024-07-14', '01', '00', 'am', '2024-07-14 07:52:30', '2024-07-14 07:52:30'),
(14, NULL, 1, 1, 1, 59, NULL, NULL, '2024-07-10', '01', '00', 'am', '2024-07-11', '01', '00', 'am', '2024-07-14 07:52:47', '2024-07-14 07:52:47'),
(15, NULL, 1, 1, 1, 59, NULL, NULL, '2024-07-13', '01', '00', 'am', '2024-07-14', '01', '00', 'am', '2024-07-14 07:52:47', '2024-07-14 07:52:47'),
(16, NULL, 1, 1, 1, 60, NULL, NULL, '2024-07-10', '01', '00', 'am', '2024-07-11', '01', '00', 'am', '2024-07-14 07:53:12', '2024-07-14 07:53:12'),
(17, NULL, 1, 1, 1, 60, NULL, NULL, '2024-07-13', '01', '00', 'am', '2024-07-14', '01', '00', 'am', '2024-07-14 07:53:12', '2024-07-14 07:53:12');

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
  `title` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `birth` varchar(255) DEFAULT NULL,
  `clientCompany` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `relation` int(11) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `uniqueStudentIdentifier` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `contactNumber` varchar(255) DEFAULT NULL,
  `businessNumber` varchar(255) DEFAULT NULL,
  `facsimileNumber` varchar(255) DEFAULT NULL,
  `emergency_contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `studentEmail2` varchar(255) DEFAULT NULL,
  `studentEmail3` varchar(255) DEFAULT NULL,
  `buildingName_postal` varchar(255) DEFAULT NULL,
  `unitDetails_postal` varchar(255) DEFAULT NULL,
  `streetNumber_postal` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `first_guardian_name` varchar(255) DEFAULT NULL,
  `streetName_postal` varchar(255) DEFAULT NULL,
  `deliveryBox_postal` varchar(255) DEFAULT NULL,
  `suburb_postal` varchar(255) DEFAULT NULL,
  `postalCode_postal` varchar(255) DEFAULT NULL,
  `country_postal` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `profile_image_path` varchar(255) DEFAULT NULL,
  `modified_by_id` int(11) DEFAULT NULL,
  `is_deleted` enum('0','1') DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `buildingName` varchar(255) DEFAULT NULL,
  `streetNumber` varchar(255) DEFAULT NULL,
  `streetName` varchar(255) DEFAULT NULL,
  `suburb` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `title`, `first_name`, `middle_name`, `last_name`, `gender`, `birth`, `clientCompany`, `role`, `relation`, `contact_no`, `address1`, `address2`, `uniqueStudentIdentifier`, `postcode`, `contactNumber`, `businessNumber`, `facsimileNumber`, `emergency_contact_no`, `email`, `studentEmail2`, `studentEmail3`, `buildingName_postal`, `unitDetails_postal`, `streetNumber_postal`, `nationality`, `first_guardian_name`, `streetName_postal`, `deliveryBox_postal`, `suburb_postal`, `postalCode_postal`, `country_postal`, `date_of_birth`, `address`, `profile_image`, `profile_image_path`, `modified_by_id`, `is_deleted`, `created_at`, `updated_at`, `buildingName`, `streetNumber`, `streetName`, `suburb`) VALUES
(1, NULL, 'sdfg1', 'df2', '233', NULL, NULL, NULL, '', NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL, 'asdfg', '22', NULL, NULL, NULL, NULL, NULL, NULL, 'address', 'profile_image1698138522.jpg', 'profile_image/profile_image1698138522.jpg', 46, '0', '2023-09-18 15:49:27', '2024-01-15 20:15:32', NULL, NULL, NULL, NULL),
(2, NULL, 'Ashish', 'Kumar', 'Saraf', NULL, NULL, NULL, '', NULL, '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, 'Indian', NULL, NULL, NULL, NULL, NULL, NULL, '1990-01-01', '05-b, Trade Corner, Saki Naka, Andheri (west)', 'profile_image1705337987.png', 'profile_image/profile_image1705337987.png', 46, '0', '2024-01-15 20:54:23', '2024-01-15 21:59:47', NULL, NULL, NULL, NULL),
(3, NULL, 'Ashish', 'Kumar', 'Saraf', NULL, NULL, NULL, '', NULL, 'abcdfghji', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abcdfghji', NULL, NULL, NULL, NULL, NULL, NULL, 'Indian', NULL, NULL, NULL, NULL, NULL, NULL, '1990-01-01', '05-b, Trade Corner, Saki Naka, Andheri (west)', NULL, NULL, 46, '0', '2024-01-15 22:08:31', '2024-01-16 16:37:35', NULL, NULL, NULL, NULL),
(4, 'Mr', 'bjk', 'fsdf', 'jkjn', 1, '2024-07-16', 'cdsf  fdsf', 'dsd', NULL, NULL, 'njknjkjnk', 'jnkjn', 'czxczxczxc', '2356', '05623895623', 'cdsf  fdsf', 'fed up', NULL, 'kdomdiya@gmail.com', 'kdomdiya@gmail.com', 'kdomdiya@gmail.com', '235689', '235689', 'asdasdasd', 'India', NULL, 'jnkjn', '235689', 'Gujarat', '2356', 'India', NULL, NULL, NULL, NULL, NULL, '0', '2024-07-16 05:23:36', '2024-07-16 05:23:36', '12 srty', 'asdasdasd', 'jnkjn', 'surat');

-- --------------------------------------------------------

--
-- Table structure for table `student_note_categories`
--

CREATE TABLE `student_note_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_note_categories`
--

INSERT INTO `student_note_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'kuldipsfsdf', '2024-07-17 03:55:31', '2024-07-17 04:10:56');

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
  `text_body` varchar(255) DEFAULT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `newCertificateName`, `administrative`, `companyId`, `size`, `orientation`, `leading_text`, `signing_authority`, `secound_signing`, `email`, `enableSCORM`, `enableVSN`, `firstname`, `is_default`, `g_CompanyRegStatus`, `trailing_text`, `isCloudAssessEnabled`, `lastname`, `requireAVETMISS`, `associated_course`, `image`, `studentEportfolioEnabled`, `timezone`, `userId`, `text_body`, `course_id`, `updated_at`, `created_at`) VALUES
(2, 'kuldip', NULL, NULL, 'A4', 'portrait', 'vcxvcxv', '{\"signing_authority_name\":\"xcvxc\",\"signing_authority_title\":\"vxcvxcv\"}', '{\"secound_signing_name\":\"xcv\",\"secound_signing_title\":\"xcvxcv\"}', NULL, NULL, NULL, NULL, '1', NULL, 'xcvxcv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdf', NULL, '2024-07-15', '2024-05-27'),
(3, 'dasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-15', '2024-05-27'),
(4, 'dasd', NULL, NULL, 'A3', 'portrait', 'reer', '{\"signing_authority_name\":\"rerer\",\"signing_authority_title\":\"rer\"}', '{\"secound_signing_name\":\"rererdsadasdasd\",\"secound_signing_title\":\"errerdsadasd\"}', NULL, NULL, NULL, NULL, '0', NULL, 'ererer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-15', '2024-05-27'),
(6, 'dasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-15', '2024-05-31'),
(7, 'dasd', NULL, NULL, 'A3', 'portrait', 'hello', '{\"signing_authority_name\":\"najira\",\"signing_authority_title\":\"javika\"}', '{\"secound_signing_name\":\"namila\",\"secound_signing_title\":\"kapila\"}', NULL, NULL, NULL, NULL, '0', NULL, 'calling', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-15', '2024-05-31'),
(8, 'dasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-15', '2024-05-31'),
(10, 'dasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-15', '2024-07-15'),
(11, 'dasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-15', '2024-07-15'),
(12, 'dasd', NULL, NULL, 'A4', 'portrait', 'vcxvcxv', '{\"signing_authority_name\":\"xcvxc\",\"signing_authority_title\":\"vxcvxcv\"}', '{\"secound_signing_name\":\"xcv\",\"secound_signing_title\":\"xcvxcv\"}', NULL, NULL, NULL, NULL, '1', NULL, 'xcvxcv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-15', '2024-07-15');

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
  `selected_template` varchar(255) DEFAULT NULL,
  `select` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates_background`
--

INSERT INTO `templates_background` (`id`, `templates_id`, `name`, `image`, `dpi`, `selected_template`, `select`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 5, 'ddasd', '2024/05/29/Rectangle 3_11-04-25.png', '72dpi', NULL, NULL, NULL, '2024-05-29 05:34:25', '2024-05-29 05:34:25'),
(2, 7, NULL, '2024/05/31/Rectangle 77_12-43-48.png', '72dpi', NULL, NULL, NULL, '2024-05-31 07:13:49', '2024-07-15 03:24:25'),
(3, 7, NULL, '2024/05/31/Rectangle 77_12-52-56.png', '72dpi', NULL, NULL, NULL, '2024-05-31 07:22:56', '2024-05-31 07:22:56'),
(4, 7, NULL, '2024/05/31/Rectangle 77_13-12-29.png', '72dpi', NULL, NULL, NULL, '2024-05-31 07:42:29', '2024-05-31 07:42:29'),
(5, 7, 'xxzxzxczxcc', '2024/05/31/Rectangle 77_13-14-03.png', '72dpi', NULL, NULL, NULL, '2024-05-31 07:44:03', '2024-05-31 07:44:03'),
(6, 2, 'hello 1', '2024/05/31/image 26 (1)_13-15-32.png', '72dpi', NULL, NULL, NULL, '2024-05-31 07:45:32', '2024-07-15 03:56:08'),
(7, 6, 'xxzxzxczxcc', NULL, '72dpi', NULL, NULL, NULL, '2024-07-15 00:14:14', '2024-07-15 00:14:14'),
(8, 6, 'vcvcxv', '2024/07/15/Attestation-for-marriage-Certificate_05-46-12.jpg', '72dpi', NULL, NULL, NULL, '2024-07-15 00:16:12', '2024-07-15 00:16:12'),
(9, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-15 00:17:29', '2024-07-15 00:17:29'),
(10, 6, 'fdsfdsaf', NULL, '72dpi', NULL, NULL, NULL, '2024-07-15 00:17:51', '2024-07-15 00:17:51'),
(11, 6, 'dfsgdfgsg', '2024/07/15/Attestation-for-marriage-Certificate_05-49-33.jpg', '72dpi', NULL, NULL, NULL, '2024-07-15 00:19:33', '2024-07-15 00:19:33'),
(12, 2, 'vcvcxv', '2024/07/15/Attestation-for-marriage-Certificate_05-55-03.jpg', '72dpi', NULL, NULL, NULL, '2024-07-15 00:25:03', '2024-07-15 03:29:20'),
(13, 2, 'vcvcxv', '2024/07/15/Attestation-for-marriage-Certificate_05-55-24.jpg', '72dpi', NULL, '1', NULL, '2024-07-15 00:25:24', '2024-07-15 03:29:20'),
(14, 13, 'gfdsgfdg', '2024/07/15/Attestation-for-marriage-Certificate_07-27-40.jpg', '72dpi', NULL, NULL, NULL, '2024-07-15 01:57:40', '2024-07-15 01:57:40');

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
  `username` varchar(255) DEFAULT NULL,
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
(46, 2, ' rakesh', 'makwana', NULL, 'makwanarakesh256@gmail.com', '1', 'rakesh256', '$2y$10$rckuKW58DgYtxAkMD4DDeeZn.BPY.5Vs1u8cQSktq6Rq/PaS7zTQ.', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2023-10-20 13:03:00', '2023-10-20 18:40:19'),
(78, 2, 'kdomdiya@gmail.com', 'dasd', NULL, 'kdomdiya@gmail.com', '1', 'admin@weloxpharma.com', '$2y$10$uxmANT/UCMlKqxL/l/wpNORn0v8EfYPvTXU477H7txasyTC9BbtV2', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2024-07-16 09:45:50', '2024-07-16 22:23:17');

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
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
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
-- Indexes for table `enrolments`
--
ALTER TABLE `enrolments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrolments_course_id_foreign` (`course_id`);

--
-- Indexes for table `enrolment_add_notes`
--
ALTER TABLE `enrolment_add_notes`
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
-- Indexes for table `issue_certificates`
--
ALTER TABLE `issue_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learner_s_m_s_notes`
--
ALTER TABLE `learner_s_m_s_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learner_s_m_s_notes_course_id_foreign` (`course_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_course_id_foreign` (`course_id`),
  ADD KEY `sessions_teacher_id_foreign` (`teacher_id`),
  ADD KEY `sessions_assessor_id_foreign` (`assessor_id`);

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
-- Indexes for table `student_note_categories`
--
ALTER TABLE `student_note_categories`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_rooms`
--
ALTER TABLE `class_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `compnies_documents`
--
ALTER TABLE `compnies_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- AUTO_INCREMENT for table `enrolments`
--
ALTER TABLE `enrolments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enrolment_add_notes`
--
ALTER TABLE `enrolment_add_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
-- AUTO_INCREMENT for table `issue_certificates`
--
ALTER TABLE `issue_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learner_s_m_s_notes`
--
ALTER TABLE `learner_s_m_s_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `school_contact_person`
--
ALTER TABLE `school_contact_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_note_categories`
--
ALTER TABLE `student_note_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `templates_background`
--
ALTER TABLE `templates_background`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `unit_of_competency`
--
ALTER TABLE `unit_of_competency`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

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
-- Constraints for table `enrolments`
--
ALTER TABLE `enrolments`
  ADD CONSTRAINT `enrolments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learner_s_m_s_notes`
--
ALTER TABLE `learner_s_m_s_notes`
  ADD CONSTRAINT `learner_s_m_s_notes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_assessor_id_foreign` FOREIGN KEY (`assessor_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sessions_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sessions_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
