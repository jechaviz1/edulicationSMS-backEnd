-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 02, 2024 at 10:29 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u763801428_kalyanifeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `image`, `password`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@weloxpharma.com', NULL, '1', '2024/06/04/elon-girl_04-13-44.png', '$2y$10$6puROB6/6tS8fGfsFkEUg.DYHNLYoobbqkd5lhs3/ktLrIaa8y2de', NULL, NULL, '2024-06-03 22:43:44'),
(2, 'User', 'user@weloxpharma.com', NULL, '1', NULL, '$2y$10$MxY23vlt8Gn0FURucxRqO.3eXW2XnVpy6l2ka5Wahb6Akx933b.Vq', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_type` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_descipriton` text DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `item_type`, `name`, `slug`, `image`, `description`, `meta_title`, `meta_descipriton`, `meta_keyword`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'fsdf', 'fsdfs', '2024/06/11/home3-banner6_19-41-39.webp', 'fsdf', 'sdfsdf', NULL, 'sdf', 'A', NULL, '2024-06-04 04:19:47', '2024-06-11 14:11:39'),
(2, 3, 'Recreate this Famous Sabyasachi Look this Karvachauth', 'recreate-this-famous-sabyasachi-look-this-karvachauth', '2024/06/11/eid-rts_19-40-54.webp', 'Who doesn’t love designer looks?\r\n\r\nAll of us definitely do but what if we can help you recreate a designer look at less than quarter the price!\r\n\r\nWouldn’t it be more amazing?\r\n\r\nWell you can do it this Karvachauth with Saroj Fabrics. Sabyasachi as a brand is known for their traditional looks that are clean and subtle. Here we’ll recreate this suit which is perfect for different occasions but will shine bright this Karvachauth.Let us break this outfit for you:\r\n\r\n1)The Kurta: (https://www.sarojfabrics.com/fabrics/plain-fabrics/pure-silk)\r\n\r\nThe kurta can be designed using pure silk fabrics just like in the image. You can enhance it by using different hand work laces at the bottom of it and hence leaving much more space at the top to shine.\r\n\r\n2)The Duppata: (https://www.sarojfabrics.com/fabrics/fabric-types/georgette)\r\n\r\nDuppata is the highlight of this suit and hence it has to be gorgeous. You can make the duppata using georgette fabric as the base and can also get handwork done on it. At Saroj Fabrics we also have dyeable fabrics with hand work details which can be dyed to match your suit. To make this even more easier for you we have a section of ready-to-wear duppatas which are perfect for different suits and lehengas.\r\n\r\n3)Bottom or Churidar: (https://www.sarojfabrics.com/fabrics/fabric-types/brocades-banarasi-silk)\r\n\r\nAs compared to the currently trending pant style bottoms the classic churidar adds a grace to this outfit. It is made using banarasi silk with floral design in golden thread which looks absolutely regal. The best part is it doesn’t have any handwork or work done but is classic on its own.\r\n\r\nThe best part about this suit is that is the right amount of glam yet chic and can be styled at different festivals apart from Karvachauth.\r\n\r\nVisit Saroj Fabrics and get your festive outfits ready now.\r\n\r\n \r\n\r\nSaroj Fabrics is India\'s most famous \"Designer Fabrics\" store, located Pan India in Mumbai (Khar, Borivali), Pune and Jaipur; Shop Online : https://www.sarojfabrics.com\r\n\r\n- Saroj Fabrics (Khar, Mumbai) : Jain Arcade, Shop No.2,4 or Basement, 14th Khar Danda Road, Off. Linking Road, Khar (West), Mumbai 400052. Tel: (022) 26000544 / 26487594 / 26055749 ; Whats app no: +91 9930027490; +91 81089 71305; Directions : https://g.page/SarojFabrics\r\n\r\n- Saroj Fabrics (Borivali, Mumbai) : Shop No. G40-41, Satra Park Building, Shimpoli Road, Borivali (West), Mumbai 400092. Tel: (022) 28996446 / 48; Whats app no: 9930027480, +91 93218 34891; Directions : https://g.page/SarojFabricsMumbai\r\n\r\n-Saroj Fabrics (Pune) : RK One, Dam Road, Off. Moledina Road, Next to Shantai Hotel, Rasta Peth, Camp, Pune 411011. Tel : (020) 26141242 / 43; Whatsapp no : +91 7774881824; Directions : https://g.page/SarojFabricsPune\r\n\r\n- Saroj Fabrics (Jaipur) : Signature Towers, G-3,Opp. Nehru Bal Udyan, Behind Apex Bank, Tonk Road, Lalkothi, Jaipur 302007. Ph: (0141) 2741005 / 06; WhatsApp no. : +91 8306522473; Directions Link: https://g.page/SarojFabricsJaipur\r\n\r\n- Shop Online : www.sarojfabrics.com', 'Recreate this Famous Sabyasachi Look this Karvachauth', NULL, 'Recreate', 'A', NULL, '2024-06-11 13:40:56', '2024-06-11 14:10:54'),
(3, 3, 'Recreate this Famous Sabyasachi Look this Karvachauth', 'recreate-this-famous-sabyasachi-look-this-karvachauth', '2024/06/11/h1-banner-5_19-41-25.png', 'Who doesn’t love designer looks?\r\n\r\nAll of us definitely do but what if we can help you recreate a designer look at less than quarter the price!\r\n\r\nWouldn’t it be more amazing?\r\n\r\nWell you can do it this Karvachauth with Saroj Fabrics. Sabyasachi as a brand is known for their traditional looks that are clean and subtle. Here we’ll recreate this suit which is perfect for different occasions but will shine bright this Karvachauth.Let us break this outfit for you:\r\n\r\n1)The Kurta: (https://www.sarojfabrics.com/fabrics/plain-fabrics/pure-silk)\r\n\r\nThe kurta can be designed using pure silk fabrics just like in the image. You can enhance it by using different hand work laces at the bottom of it and hence leaving much more space at the top to shine.\r\n\r\n2)The Duppata: (https://www.sarojfabrics.com/fabrics/fabric-types/georgette)\r\n\r\nDuppata is the highlight of this suit and hence it has to be gorgeous. You can make the duppata using georgette fabric as the base and can also get handwork done on it. At Saroj Fabrics we also have dyeable fabrics with hand work details which can be dyed to match your suit. To make this even more easier for you we have a section of ready-to-wear duppatas which are perfect for different suits and lehengas.\r\n\r\n3)Bottom or Churidar: (https://www.sarojfabrics.com/fabrics/fabric-types/brocades-banarasi-silk)\r\n\r\nAs compared to the currently trending pant style bottoms the classic churidar adds a grace to this outfit. It is made using banarasi silk with floral design in golden thread which looks absolutely regal. The best part is it doesn’t have any handwork or work done but is classic on its own.\r\n\r\nThe best part about this suit is that is the right amount of glam yet chic and can be styled at different festivals apart from Karvachauth.\r\n\r\nVisit Saroj Fabrics and get your festive outfits ready now.\r\n\r\n \r\n\r\nSaroj Fabrics is India\'s most famous \"Designer Fabrics\" store, located Pan India in Mumbai (Khar, Borivali), Pune and Jaipur; Shop Online : https://www.sarojfabrics.com\r\n\r\n- Saroj Fabrics (Khar, Mumbai) : Jain Arcade, Shop No.2,4 or Basement, 14th Khar Danda Road, Off. Linking Road, Khar (West), Mumbai 400052. Tel: (022) 26000544 / 26487594 / 26055749 ; Whats app no: +91 9930027490; +91 81089 71305; Directions : https://g.page/SarojFabrics\r\n\r\n- Saroj Fabrics (Borivali, Mumbai) : Shop No. G40-41, Satra Park Building, Shimpoli Road, Borivali (West), Mumbai 400092. Tel: (022) 28996446 / 48; Whats app no: 9930027480, +91 93218 34891; Directions : https://g.page/SarojFabricsMumbai\r\n\r\n-Saroj Fabrics (Pune) : RK One, Dam Road, Off. Moledina Road, Next to Shantai Hotel, Rasta Peth, Camp, Pune 411011. Tel : (020) 26141242 / 43; Whatsapp no : +91 7774881824; Directions : https://g.page/SarojFabricsPune\r\n\r\n- Saroj Fabrics (Jaipur) : Signature Towers, G-3,Opp. Nehru Bal Udyan, Behind Apex Bank, Tonk Road, Lalkothi, Jaipur 302007. Ph: (0141) 2741005 / 06; WhatsApp no. : +91 8306522473; Directions Link: https://g.page/SarojFabricsJaipur\r\n\r\n- Shop Online : www.sarojfabrics.com', 'Recreate this Famous Sabyasachi Look this Karvachauth', NULL, 'Famous', 'A', NULL, '2024-06-11 13:41:47', '2024-06-11 14:11:25'),
(4, 2, 'Can you make a saree from any fabric?', 'can-you-make-a-saree-from-any-fabric', '2024/06/11/perfectly-plush-prints_19-41-55.webp', 'Can you make a saree from any fabric?\r\n\r\nSarees have always had a special place in our wardrobes. From drapping our mom’s duppatas into sarees as kids to now having our own the joruney of a saree never ends. It is known as a timeless piece for a reason.\r\n\r\nBut has it ever happened to you that you go to a Fabric store,like a fabric and wish it was a saree?\r\n\r\nWell,we are here to tell you that you can exactly do this!\r\n\r\nSarees are the most versatile Indian outfits one can adorn and they are surely everyone’s cup of tea. We all love different style of sarees and here are some types of fabrics you can make sarees from:\r\n\r\n1) Royal Silk: (https://www.sarojfabrics.com/fabrics/fabric-types/pure-silk) (https://www.sarojfabrics.com/fabrics/fabric-types/moonga-silk)\r\n\r\nSilk sarees have always been everyone’s favorite and go perfectly well for every occasion.Explore our section of silk fabrics and take your best pick with a monotone blouse!\r\n\r\n2) Trendy Organza: (https://www.sarojfabrics.com/fabrics/fabric-types/organza)\r\n\r\nOrganza is the rage this season and we are sure you are going to love it. From florals to zardosi everything looks stunning on the soft organza fabric.\r\n\r\n3) The all time gota patti: (https://www.sarojfabrics.com/catalogsearch/result/?q=gota)\r\n\r\nGota patti work or self work on sarees is a thing that never goes out of trend. Pair it with a contrast blouse,add a border or few latkans and you are good to go.\r\n\r\n4) The soft satin: (https://www.sarojfabrics.com/fabrics/plain-fabrics/satin)\r\n\r\nSatin sarees with ruffles are a classic for parties. You can also make them into ready-to-drape sarees and match them with a crop top to go for a party. Easy to style,wear and carry these fabrics are pretty much available in all colours.\r\n\r\n \r\n\r\nTo get all kinds of fabrics for this festive season you can visit our store or our website and get the latest collection for your outfits.\r\n\r\n \r\n\r\nSaroj Fabrics is India\'s most famous \"Designer Fabrics\" store, located Pan India in Mumbai (Khar, Borivali), Pune and Jaipur; Shop Online : https://www.sarojfabrics.com\r\n\r\n- Saroj Fabrics (Khar, Mumbai) : Jain Arcade, Shop No.2,4 or Basement, 14th Khar Danda Road, Off. Linking Road, Khar (West), Mumbai 400052. Tel: (022) 26000544 / 26487594 / 26055749 ; Whats app no: +91 9930027490; +91 81089 71305; Directions : https://g.page/SarojFabrics\r\n\r\n- Saroj Fabrics (Borivali, Mumbai) : Shop No. G40-41, Satra Park Building, Shimpoli Road, Borivali (West), Mumbai 400092. Tel: (022) 28996446 / 48; Whats app no: 9930027480, +91 93218 34891; Directions : https://g.page/SarojFabricsMumbai\r\n\r\n-Saroj Fabrics (Pune) : RK One, Dam Road, Off. Moledina Road, Next to Shantai Hotel, Rasta Peth, Camp, Pune 411011. Tel : (020) 26141242 / 43; Whatsapp no : +91 7774881824; Directions : https://g.page/SarojFabricsPune\r\n\r\n- Saroj Fabrics (Jaipur) : Signature Towers, G-3,Opp. Nehru Bal Udyan, Behind Apex Bank, Tonk Road, Lalkothi, Jaipur 302007. Ph: (0141) 2741005 / 06; WhatsApp no. : +91 8306522473; Directions Link: https://g.page/SarojFabricsJaipur\r\n\r\n- Shop Online : www.sarojfabrics.com', 'Can you make a saree from any fabric?', NULL, 'Can you make a saree from any fabric?', 'A', NULL, '2024-06-11 13:44:08', '2024-06-11 14:11:55'),
(5, 2, 'saree of handicraft', 'saree-of-handicraft', 'null', 'nice', 'saree of handicraft', NULL, 'saree of handicraft', 'A', NULL, '2024-07-01 10:22:46', '2024-07-01 10:38:10'),
(6, 4, 'Silk seema', 'silk-seema', '2024/07/01/ETW14792A_10-35-42.webp', 'very beautiful saree', 'Seema Saree', NULL, 'Seema Saree', 'A', NULL, '2024-07-01 10:35:42', '2024-07-01 10:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_descipriton` text DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `parent_id`, `name`, `slug`, `description`, `meta_title`, `meta_descipriton`, `meta_keyword`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'fsdf', 'dasd', 'fsdf', 'fsdf', NULL, 'fsdf', 'A', NULL, '2024-06-04 04:19:34', '2024-06-04 04:19:34'),
(2, NULL, 'Fashion', 'fashion', 'Fashion', 'Fashion', NULL, 'Fashion', 'A', NULL, '2024-06-11 13:37:41', '2024-06-11 13:37:41'),
(3, NULL, 'Saree', 'saree', 'Saree', 'Saree', NULL, 'Saree', 'A', NULL, '2024-06-11 13:39:21', '2024-06-11 13:39:21'),
(4, NULL, 'Seema', 'seema', 'very nice saree and weight less looking gorgeous any lady because its color combination fit for dark and light races', 'Seema saree', NULL, 'Saree', 'A', NULL, '2024-07-01 10:19:40', '2024-07-01 10:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `name`, `image`, `slug`, `quantity`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, 'Krisha Priya', '2024/06/11/5002_10-49-47.jpg', 'krisha-priya', '2', '1500', '2024-06-15 04:16:08', '2024-06-18 05:59:27', NULL),
(2, 2, 1, 'Ram Mandir Saree', '2024/06/11/5001_10-24-25.jpg', 'ram-mandir-saree', '4', '2000', '2024-06-15 04:17:37', '2024-06-19 03:55:59', NULL),
(3, 6, 1, 'Laxmi', '2024/06/11/5005_11-02-22.jpg', 'laxmi', '1', '8000', '2024-06-15 04:17:56', '2024-06-18 05:59:27', NULL),
(10, 2, 1, 'Ram Mandir Saree', '2024/06/11/5001_10-24-25.jpg', 'ram-mandir-saree', '1', '2000', '2024-06-18 05:24:24', '2024-06-18 05:59:27', NULL),
(11, 9, 3, 'Bahurani', '2024/06/11/5008_11-16-40.jpg', 'bahurani', '1', '1380', '2024-06-25 07:16:15', '2024-06-25 07:16:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_descipriton` text DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `description`, `meta_title`, `meta_descipriton`, `meta_keyword`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, NULL, 'Saree', 'saree', 'saree', 'saree', NULL, 'saree', 'A', NULL, '2024-06-11 04:44:27', '2024-06-11 04:44:27'),
(4, NULL, 'Lengha', 'lengha', 'Lengha', 'Lengha', NULL, 'Lengha', 'A', NULL, '2024-06-11 05:52:34', '2024-06-11 05:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'India', 'IND', 'A', NULL, '2024-06-17 06:06:26', '2024-06-17 06:11:44'),
(2, 'China', 'CHA', 'A', NULL, '2024-06-17 06:06:38', '2024-06-17 06:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `subject`, `message`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'sadasd', 'asdasdasd@weloxpharma.com', 'asdasd', 'asdasdasdasd', 'A', NULL, '2024-05-28 01:17:27', '2024-05-28 01:25:40'),
(3, 'kuldip', 'kdomdiya@mail.com', 'heaven', 'heaven', 'D', NULL, '2024-06-23 22:31:49', '2024-06-23 22:32:42'),
(4, 'K Paul', 'letsgetuoptimize@gmail.com', 'Re: SEO - Expert', 'Hi team shreekalyanitexfab.com,\r\n\r\nI was looking at your website and realized that despite having a good design; it was not ranking high on any of the Search Engines (Google, Yahoo & Bing) for most of the keywords related to your business.\r\n\r\nWe can place your website on Google\'s 1st page.\r\n\r\n? Top ranking on Google search!\r\n? Improve website clicks and views!\r\n? Increase Your Leads, clients & Revenue!\r\n\r\nI would be pleased to provide you with \"Quotes,\" \"Proposals,\" details of past work, \"Our Packages,\" and \"Offers\"!\r\n\r\nWell wishes,\r\nK Paul\r\n\r\n\r\n\r\n\r\n\r\nIf you don’t want me to contact you again about this, reply with “unsubscribe”', 'A', NULL, '2024-06-24 17:52:36', '2024-06-24 17:52:36'),
(5, 'kuldip', 'kdomdiya@mail.com', 'saree', 'saree', 'D', NULL, '2024-06-25 07:12:56', '2024-06-25 07:28:55'),
(6, 'Kush', 'digitalxplode1@gmail.com', 'Sgvvb O Yq', 'Hey shreekalyanitexfab.com,\r\n\r\nI hope you are doing good!\r\n\r\nI was going through your website on behalf of this email. It has a good design and it looks awesome, but it’s not ranking in top on Google and other major search engines.\r\n\r\nI’m an SEO Expert and I helped over 250 businesses rank on the (1st Page on Google). My charges are very compatible.\r\n\r\nTo enhance your website\'s visibility and ranking, consider implementing strategies such as improving on-site SEO, adding LSI keywords, monitoring technical SEO, aligning content with search intent, reducing bounce time, targeting additional keywords, publishing high-quality content.\r\n\r\nI would be happy to send you \"charges\", “Proposal” Past work Details, \"Our Packages\", and take Complete Responsibility for improving your Presence etc.\r\n\r\nThanks & Regards,\r\nKush S\r\nSr SEO consultant\r\nPh. No: 1 469-663-1569\r\n\r\n\r\n\r\n\r\n\r\n\r\nIf you don’t want me to contact you again about this, reply with “opt-out”', 'A', NULL, '2024-06-28 20:37:11', '2024-06-28 20:37:11'),
(7, 'Lucy Johnson', 'lucyjohnson.web@gmail.com', 'Re: Website Design & development service!', 'Hey,\r\n\r\nI was just browsing your website and I came up with a great plan to re-develop your website using the latest technology to generate additional revenue and beat your opponents.\r\n\r\nI\'m an excellent web developer capable of almost anything you can come up with, and my costs are affordable for nearly everyone.\r\n\r\nI would be happy to send you \"Quotes\", “Proposal” Past work Details, \"Our Packages\", and “Offers”!\r\n\r\nThanks in advance,\r\nLucy (Business Development Executive)\r\n\r\n\r\n\r\nYour Website : shreekalyanitexfab.com', 'A', NULL, '2024-06-29 01:00:39', '2024-06-29 01:00:39'),
(8, 'rajesh kumar', 'itparnera@gmail.com', 'new relation', 'I would like to open a new cloth store in Bharatpur Rajasthan so please let me know about this', 'A', NULL, '2024-06-29 07:21:50', '2024-06-29 07:21:50'),
(9, 'Search Engine Index', 'submissions@searchindex.site', 'Add shreekalyanitexfab.com to Google Search Index!', 'Hello,\r\n\r\nfor your website do be displayed in searches your domain needs to be indexed in the Google Search Index.\r\n\r\nTo add your domain to Google Search Index now, please visit \r\n\r\nhttps://www.domain-submit.info/', 'A', NULL, '2024-06-29 20:29:11', '2024-06-29 20:29:11');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_02_15_174553_create_admins_table', 1),
(5, '2024_05_20_035939_create_categories_table', 1),
(6, '2024_05_21_074541_create_products_table', 1),
(7, '2024_05_22_022630_create_users_table', 1),
(8, '2024_05_22_022819_create_user_roles_table', 1),
(9, '2024_05_22_023039_create_user_permissions_table', 1),
(10, '2024_05_22_024327_crate_order_table', 1),
(11, '2024_05_22_034417_create_blog_categories_table', 1),
(12, '2024_05_22_034513_create_blog_table', 1),
(13, '2024_05_24_185805_create_expenses_table', 1),
(14, '2024_05_27_133703_create_inquiries_table', 1),
(21, '2024_05_28_070240_create_purchases_table', 2),
(22, '2024_05_30_190615_create_purchase_items', 2),
(26, '2024_06_14_054606_create_carts_table', 4),
(36, '2024_06_17_100512_create_countries_table', 6),
(39, '2024_06_17_100706_create_states_table', 7),
(40, '2024_06_17_100724_create_cities_table', 7),
(45, '2024_06_04_040121_create_orders_table', 8),
(46, '2024_06_04_042442_create_order_items_table', 8),
(47, '2024_06_19_061147_create_suscribes_table', 9),
(48, '2024_06_19_113338_create_reviews_table', 10),
(49, '2024_06_20_072827_create_shippment_infos_table', 11),
(63, '2024_06_24_073012_create_roles_table', 12),
(64, '2024_06_24_073032_create_permissions_table', 12),
(65, '2024_06_24_073055_create_role_user_table', 12),
(66, '2024_06_24_073131_create_permission_role_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `country` bigint(20) UNSIGNED DEFAULT NULL,
  `state` bigint(20) UNSIGNED DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `shipping_first_name` varchar(255) DEFAULT NULL,
  `shipping_last_name` varchar(255) DEFAULT NULL,
  `shipping_email` varchar(255) DEFAULT NULL,
  `shipping_phone` varchar(255) DEFAULT NULL,
  `shipping_company` varchar(255) DEFAULT NULL,
  `shipping_address_1` varchar(255) DEFAULT NULL,
  `shipping_address_2` varchar(255) DEFAULT NULL,
  `shipping_country` bigint(20) UNSIGNED DEFAULT NULL,
  `shipping_state` bigint(20) UNSIGNED DEFAULT NULL,
  `shipping_city` varchar(255) DEFAULT NULL,
  `shipping_pincode` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `shipment_mode` varchar(255) DEFAULT NULL,
  `shipment_note` varchar(255) DEFAULT NULL,
  `shipment_status` varchar(255) DEFAULT NULL,
  `season` varchar(255) DEFAULT NULL,
  `payment_terms` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `total_qty` varchar(255) DEFAULT NULL,
  `total_value` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status` enum('Approved','Pending','Canceled') NOT NULL DEFAULT 'Approved',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `company_name`, `address_1`, `address_2`, `country`, `state`, `city`, `pincode`, `shipping_first_name`, `shipping_last_name`, `shipping_email`, `shipping_phone`, `shipping_company`, `shipping_address_1`, `shipping_address_2`, `shipping_country`, `shipping_state`, `shipping_city`, `shipping_pincode`, `title`, `description`, `date`, `shipment_mode`, `shipment_note`, `shipment_status`, `season`, `payment_terms`, `year`, `total_qty`, `total_value`, `payment_mode`, `remark`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(23, 1, 'admin', 'admin', 'kdomdiya@gmail.com', '8956234512', 'Admin', 'vity nagar', '112 maharaja pharm', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'Krisha Priya,Ram Mandir Saree,Laxmi,Ram Mandir Saree,', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '17000', NULL, NULL, 'Pending', NULL, '2024-06-18 07:30:44', '2024-06-20 07:04:51'),
(24, 1, 'admin', 'admin', 'kdomdiya@gmail.com', '8956234512', 'Admin', 'vity nagar', '112 maharaja pharm', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'Krisha Priya,Ram Mandir Saree,Laxmi,Ram Mandir Saree,', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8', '21000', NULL, NULL, 'Approved', NULL, '2024-06-19 04:00:55', '2024-06-20 06:53:24'),
(25, 1, 'admin', 'admin', 'admin@weloxpharma.com', '8956234512', 'Admin', 'vity nagar', '112 maharaja pharm', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'Krisha Priya,Ram Mandir Saree,Laxmi,Ram Mandir Saree,', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8', '21000', NULL, NULL, 'Pending', NULL, '2024-06-23 07:58:43', '2024-06-23 07:58:43'),
(26, 3, 'Hardik', 'Patel', 'Hardik@mail.com', '8956235689', 'dirayu', '12 savilas', '12 savilas', 1, 1, NULL, '456235', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'Bahurani,', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1380', NULL, NULL, 'Approved', NULL, '2024-06-25 07:16:51', '2024-06-25 07:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cost` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `user_id`, `product_id`, `order_id`, `cost`, `qty`, `sub_total`, `info`, `deleted_at`, `created_at`, `updated_at`) VALUES
(51, 1, 3, 23, '1500', '2', '3000', '', NULL, '2024-06-18 07:30:44', '2024-06-18 07:30:44'),
(52, 1, 2, 23, '2000', '2', '4000', '', NULL, '2024-06-18 07:30:44', '2024-06-18 07:30:44'),
(53, 1, 6, 23, '8000', '1', '8000', '', NULL, '2024-06-18 07:30:44', '2024-06-18 07:30:44'),
(54, 1, 2, 23, '2000', '1', '2000', '', NULL, '2024-06-18 07:30:44', '2024-06-18 07:30:44'),
(55, 1, 3, 24, '1500', '2', '3000', '', NULL, '2024-06-19 04:00:55', '2024-06-19 04:00:55'),
(56, 1, 2, 24, '2000', '4', '8000', '', NULL, '2024-06-19 04:00:55', '2024-06-19 04:00:55'),
(57, 1, 6, 24, '8000', '1', '8000', '', NULL, '2024-06-19 04:00:55', '2024-06-19 04:00:55'),
(58, 1, 2, 24, '2000', '1', '2000', '', NULL, '2024-06-19 04:00:55', '2024-06-19 04:00:55'),
(59, 1, 3, 25, '1500', '2', '3000', '', NULL, '2024-06-23 07:58:43', '2024-06-23 07:58:43'),
(60, 1, 2, 25, '2000', '4', '8000', '', NULL, '2024-06-23 07:58:43', '2024-06-23 07:58:43'),
(61, 1, 6, 25, '8000', '1', '8000', '', NULL, '2024-06-23 07:58:43', '2024-06-23 07:58:43'),
(62, 1, 2, 25, '2000', '1', '2000', '', NULL, '2024-06-23 07:58:43', '2024-06-23 07:58:43'),
(63, 3, 9, 26, '1380', '1', '1380', '', NULL, '2024-06-25 07:16:51', '2024-06-25 07:16:51');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'inquiry-list', 'inquiry-list', 'A', '2024-06-24 03:32:30', '2024-06-24 03:32:30'),
(2, 'inquiry-create', 'inquiry-create', 'A', '2024-06-24 03:33:14', '2024-06-24 03:33:14'),
(3, 'inquiry-edit', 'inquiry-edit', 'A', '2024-06-24 03:33:28', '2024-06-24 03:33:28'),
(4, 'inquiry-delete', 'inquiry-delete', 'A', '2024-06-24 03:33:41', '2024-06-24 03:33:41'),
(5, 'category -list', 'category -list', 'A', '2024-06-24 04:50:18', '2024-06-24 04:50:18'),
(6, 'category-create', 'category-create', 'A', '2024-06-24 04:51:01', '2024-06-24 04:51:01'),
(7, 'category -edit', 'category -edit', 'A', '2024-06-24 04:51:18', '2024-06-24 04:51:18'),
(8, 'category -delete', 'category -delete', 'A', '2024-06-24 04:51:35', '2024-06-24 04:51:35'),
(9, 'product-list', 'product-list', 'A', '2024-06-24 04:52:08', '2024-06-24 04:52:08'),
(10, 'product-create', 'product-create', 'A', '2024-06-24 04:53:02', '2024-06-24 04:53:02'),
(11, 'product -edit', 'product -edit', 'A', '2024-06-24 04:53:23', '2024-06-24 04:53:23'),
(12, 'product -delete', 'product -delete', 'A', '2024-06-24 04:53:42', '2024-06-24 04:53:42'),
(13, 'blog-category-list', 'blog-category-list', 'A', '2024-06-24 05:13:56', '2024-06-24 05:13:56'),
(14, 'blog-category-create', 'blog-category-create', 'A', '2024-06-24 05:14:04', '2024-06-24 05:14:04'),
(15, 'blog-category-edit', 'blog-category-edit', 'A', '2024-06-24 05:14:14', '2024-06-24 05:14:14'),
(16, 'blog-category-delete', 'blog-category-delete', 'A', '2024-06-24 05:14:25', '2024-06-24 05:14:25'),
(17, 'blog-list', 'blog-list', 'A', '2024-06-24 05:16:47', '2024-06-24 05:16:47'),
(18, 'blog-create', 'blog-create', 'A', '2024-06-24 05:16:57', '2024-06-24 05:16:57'),
(19, 'blog-edit', 'blog-edit', 'A', '2024-06-24 05:17:07', '2024-06-24 05:17:07'),
(20, 'blog-delete', 'blog-delete', 'A', '2024-06-24 05:17:21', '2024-06-24 05:17:21'),
(21, 'cart-list', 'cart-list', 'A', '2024-06-24 05:17:38', '2024-06-24 05:17:38'),
(22, 'cart-create', 'cart-create', 'A', '2024-06-24 05:17:47', '2024-06-24 05:17:47'),
(23, 'cart-edit', 'cart-edit', 'A', '2024-06-24 05:17:57', '2024-06-24 05:17:57'),
(24, 'cart-delete', 'cart-delete', 'A', '2024-06-24 05:18:06', '2024-06-24 05:18:06'),
(27, 'country-list', 'country-list', 'A', '2024-06-24 05:21:47', '2024-06-24 05:21:47'),
(28, 'country-create', 'country-create', 'A', '2024-06-24 05:22:00', '2024-06-24 05:22:00'),
(29, 'country-edit', 'country-edit', 'A', '2024-06-24 05:22:12', '2024-06-24 05:22:12'),
(30, 'country-delete', 'country-delete', 'A', '2024-06-24 05:22:26', '2024-06-24 05:22:26'),
(31, 'expense-list', 'expense-list', 'A', '2024-06-24 05:22:48', '2024-06-24 05:22:48'),
(32, 'expense-create', 'expense-create', 'A', '2024-06-24 05:23:01', '2024-06-24 05:23:01'),
(33, 'expense-edit', 'expense-edit', 'A', '2024-06-24 05:23:13', '2024-06-24 05:23:13'),
(34, 'expense-delete', 'expense-delete', 'A', '2024-06-24 05:23:26', '2024-06-24 05:23:26'),
(35, 'order-list', 'order-list', 'A', '2024-06-24 05:23:45', '2024-06-24 05:23:45'),
(36, 'order-create', 'order-create', 'A', '2024-06-24 05:24:01', '2024-06-24 05:24:01'),
(37, 'order-edit', 'order-edit', 'A', '2024-06-24 05:24:13', '2024-06-24 05:24:13'),
(38, 'order-delete', 'order-delete', 'A', '2024-06-24 05:24:30', '2024-06-24 05:24:30'),
(39, 'order-item-list', 'order-item-list', 'A', '2024-06-24 05:24:48', '2024-06-24 05:24:48'),
(40, 'order-item-create', 'order-item-create', 'A', '2024-06-24 05:25:04', '2024-06-24 05:25:04'),
(41, 'order-item-edit', 'order-item-edit', 'A', '2024-06-24 05:25:17', '2024-06-24 05:25:17'),
(42, 'order-item-delete', 'order-item-delete', 'A', '2024-06-24 05:25:27', '2024-06-24 05:25:27'),
(44, 'purchase-list', 'purchase-list', 'A', '2024-06-24 05:28:03', '2024-06-24 05:28:03'),
(45, 'purchase-create', 'purchase-create', 'A', '2024-06-24 05:28:13', '2024-06-24 05:28:13'),
(46, 'purchase-edit', 'purchase-edit', 'A', '2024-06-24 05:28:27', '2024-06-24 05:28:27'),
(47, 'purchase-delete', 'purchase-delete', 'A', '2024-06-24 05:28:47', '2024-06-24 05:28:47'),
(48, 'state-list', 'state-list', 'A', '2024-06-24 05:29:00', '2024-06-24 05:29:00'),
(49, 'state-create', 'state-create', 'A', '2024-06-24 05:29:10', '2024-06-24 05:29:10'),
(50, 'state-edit', 'state-edit', 'A', '2024-06-24 05:29:18', '2024-06-24 05:29:18'),
(51, 'state-delete', 'state-delete', 'A', '2024-06-24 05:29:29', '2024-06-24 05:29:29'),
(52, 'suscribe-list', 'suscribe-list', 'A', '2024-06-24 05:30:08', '2024-06-24 05:30:08'),
(53, 'suscribe-create', 'suscribe-create', 'A', '2024-06-24 05:30:21', '2024-06-24 05:30:21'),
(54, 'suscribe-edit', 'suscribe-edit', 'A', '2024-06-24 05:30:32', '2024-06-24 05:30:32'),
(55, 'suscribe-delete', 'suscribe-delete', 'A', '2024-06-24 05:30:46', '2024-06-24 05:30:46'),
(56, 'user-list', 'user-list', 'A', '2024-06-24 05:30:58', '2024-06-24 05:30:58'),
(57, 'user-create', 'user-create', 'A', '2024-06-24 05:31:07', '2024-06-24 05:31:07'),
(58, 'user-edit', 'user-edit', 'A', '2024-06-24 05:31:19', '2024-06-24 05:31:19'),
(59, 'user-delete', 'user-delete', 'A', '2024-06-24 05:31:29', '2024-06-24 05:31:29'),
(60, 'user-permission-list', 'user-permission-list', 'A', '2024-06-24 05:31:48', '2024-06-24 05:31:48'),
(61, 'user-permission-create', 'user-permission-create', 'A', '2024-06-24 05:32:00', '2024-06-24 05:32:00'),
(62, 'user-permission-edit', 'user-permission-edit', 'A', '2024-06-24 05:32:15', '2024-06-24 05:32:15'),
(63, 'user-permission-delete', 'user-permission-delete', 'A', '2024-06-24 05:32:24', '2024-06-24 05:32:24'),
(64, 'user-role-list', 'user-role-list', 'A', '2024-06-24 05:32:36', '2024-06-24 05:32:36'),
(65, 'user-role-create', 'user-role-create', 'A', '2024-06-24 05:32:46', '2024-06-24 05:32:46'),
(66, 'user-role-edit', 'user-role-edit', 'A', '2024-06-24 05:32:58', '2024-06-24 05:32:58'),
(67, 'user-role-delete', 'user-role-delete', 'A', '2024-06-24 05:33:10', '2024-06-24 05:33:10'),
(68, 'Ni2', 'Ni2', 'A', '2024-07-01 11:30:46', '2024-07-01 12:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(9, 5, 3, NULL, NULL),
(17, 6, 3, NULL, NULL),
(18, 7, 3, NULL, NULL),
(19, 8, 3, NULL, NULL),
(20, 9, 3, NULL, NULL),
(21, 10, 3, NULL, NULL),
(22, 11, 3, NULL, NULL),
(23, 12, 3, NULL, NULL),
(24, 13, 3, NULL, NULL),
(25, 14, 3, NULL, NULL),
(26, 15, 3, NULL, NULL),
(27, 16, 3, NULL, NULL),
(28, 17, 3, NULL, NULL),
(29, 18, 3, NULL, NULL),
(30, 19, 3, NULL, NULL),
(31, 20, 3, NULL, NULL),
(32, 56, 3, NULL, NULL),
(33, 57, 3, NULL, NULL),
(34, 58, 3, NULL, NULL),
(35, 59, 3, NULL, NULL),
(36, 64, 3, NULL, NULL),
(37, 65, 3, NULL, NULL),
(38, 66, 3, NULL, NULL),
(39, 67, 3, NULL, NULL),
(40, 60, 3, NULL, NULL),
(41, 61, 3, NULL, NULL),
(42, 62, 3, NULL, NULL),
(43, 63, 3, NULL, NULL),
(44, 31, 3, NULL, NULL),
(45, 32, 3, NULL, NULL),
(46, 33, 3, NULL, NULL),
(47, 34, 3, NULL, NULL),
(48, 1, 3, NULL, NULL),
(49, 2, 3, NULL, NULL),
(50, 3, 3, NULL, NULL),
(51, 4, 3, NULL, NULL),
(52, 44, 3, NULL, NULL),
(53, 45, 3, NULL, NULL),
(54, 46, 3, NULL, NULL),
(55, 47, 3, NULL, NULL),
(56, 35, 3, NULL, NULL),
(57, 36, 3, NULL, NULL),
(58, 37, 3, NULL, NULL),
(59, 38, 3, NULL, NULL),
(60, 27, 3, NULL, NULL),
(61, 28, 3, NULL, NULL),
(62, 29, 3, NULL, NULL),
(63, 30, 3, NULL, NULL),
(64, 48, 3, NULL, NULL),
(65, 49, 3, NULL, NULL),
(66, 50, 3, NULL, NULL),
(67, 51, 3, NULL, NULL),
(69, 53, 3, NULL, NULL),
(70, 54, 3, NULL, NULL),
(71, 55, 3, NULL, NULL),
(72, 5, 1, NULL, NULL),
(73, 6, 1, NULL, NULL),
(74, 7, 1, NULL, NULL),
(75, 8, 1, NULL, NULL),
(76, 9, 1, NULL, NULL),
(77, 10, 1, NULL, NULL),
(78, 11, 1, NULL, NULL),
(79, 12, 1, NULL, NULL),
(80, 13, 1, NULL, NULL),
(81, 14, 1, NULL, NULL),
(82, 15, 1, NULL, NULL),
(83, 16, 1, NULL, NULL),
(84, 17, 1, NULL, NULL),
(85, 18, 1, NULL, NULL),
(86, 19, 1, NULL, NULL),
(87, 20, 1, NULL, NULL),
(88, 56, 1, NULL, NULL),
(89, 57, 1, NULL, NULL),
(90, 58, 1, NULL, NULL),
(91, 59, 1, NULL, NULL),
(92, 64, 1, NULL, NULL),
(93, 65, 1, NULL, NULL),
(94, 66, 1, NULL, NULL),
(95, 67, 1, NULL, NULL),
(96, 60, 1, NULL, NULL),
(97, 61, 1, NULL, NULL),
(98, 62, 1, NULL, NULL),
(99, 63, 1, NULL, NULL),
(100, 31, 1, NULL, NULL),
(101, 32, 1, NULL, NULL),
(102, 33, 1, NULL, NULL),
(103, 34, 1, NULL, NULL),
(105, 3, 1, NULL, NULL),
(106, 4, 1, NULL, NULL),
(107, 44, 1, NULL, NULL),
(108, 45, 1, NULL, NULL),
(109, 46, 1, NULL, NULL),
(110, 47, 1, NULL, NULL),
(111, 35, 1, NULL, NULL),
(112, 36, 1, NULL, NULL),
(113, 37, 1, NULL, NULL),
(114, 38, 1, NULL, NULL),
(115, 27, 1, NULL, NULL),
(116, 28, 1, NULL, NULL),
(117, 29, 1, NULL, NULL),
(118, 30, 1, NULL, NULL),
(119, 48, 1, NULL, NULL),
(120, 49, 1, NULL, NULL),
(121, 50, 1, NULL, NULL),
(122, 51, 1, NULL, NULL),
(124, 53, 1, NULL, NULL),
(125, 54, 1, NULL, NULL),
(126, 55, 1, NULL, NULL),
(127, 52, 1, NULL, NULL),
(128, 1, 1, NULL, NULL),
(129, 2, 1, NULL, NULL),
(131, 8, 4, NULL, NULL),
(132, 12, 4, NULL, NULL),
(133, 15, 4, NULL, NULL),
(134, 19, 4, NULL, NULL),
(135, 33, 4, NULL, NULL),
(136, 3, 4, NULL, NULL),
(137, 46, 4, NULL, NULL),
(138, 37, 4, NULL, NULL),
(139, 29, 4, NULL, NULL),
(140, 50, 4, NULL, NULL),
(141, 54, 4, NULL, NULL);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_type` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `supplier_code` text DEFAULT NULL,
  `item_code` text DEFAULT NULL,
  `hsn_code` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `gallery` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `image_code` text DEFAULT NULL,
  `design_code` text DEFAULT NULL,
  `febric` text DEFAULT NULL,
  `base_color` text DEFAULT NULL,
  `compitation_color` text DEFAULT NULL,
  `material_composition` text DEFAULT NULL,
  `length` text DEFAULT NULL,
  `blouse` text DEFAULT NULL,
  `blouse_color` text DEFAULT NULL,
  `blouse_material` text DEFAULT NULL,
  `blouse_work` text DEFAULT NULL,
  `chuni` text DEFAULT NULL,
  `chuni_color` text DEFAULT NULL,
  `chuni_material` text DEFAULT NULL,
  `chuni_work` text DEFAULT NULL,
  `decdoration` text DEFAULT NULL,
  `extra_work` text DEFAULT NULL,
  `irate` text DEFAULT NULL,
  `rate` text DEFAULT NULL,
  `discount` text DEFAULT NULL,
  `patterns` text DEFAULT NULL,
  `occasion_type` text DEFAULT NULL,
  `washing_instruction` text DEFAULT NULL,
  `item_weight` text DEFAULT NULL,
  `weave_type` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_descipriton` text DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `item_type`, `name`, `slug`, `description`, `price`, `supplier_code`, `item_code`, `hsn_code`, `image`, `gallery`, `video`, `image_code`, `design_code`, `febric`, `base_color`, `compitation_color`, `material_composition`, `length`, `blouse`, `blouse_color`, `blouse_material`, `blouse_work`, `chuni`, `chuni_color`, `chuni_material`, `chuni_work`, `decdoration`, `extra_work`, `irate`, `rate`, `discount`, `patterns`, `occasion_type`, `washing_instruction`, `item_weight`, `weave_type`, `meta_title`, `meta_descipriton`, `meta_keyword`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 3, 'Ram Mandir Saree', 'ram-mandir-saree', 'Ram Mandir', '2000', '10001', '5001', '5704', '2024/06/11/5001_10-24-25.jpg', '[]', 'null', '5001', 'UP DN. 6698', 'UP DN. 6698', 'Red', 'Yellow', 'Weight Less', '5.5', '0.8', 'Red', 'weight less', 'Border + Fency', NULL, NULL, NULL, NULL, 'Border', 'Full Lace', '425', '2000', '50', 'Bandhej', 'Party, Marriage, Mehandi, Haldi	1st Dryclean next Cold wash', '1st Dryclean next Cold wash', '800g', NULL, 'Ram Mandir Saree', NULL, 'Ram Mandir Saree', 'A', NULL, '2024-06-11 04:54:25', '2024-06-11 05:16:03'),
(3, 3, 'Krisha Priya', 'krisha-priya', 'Krisha Priya', '1500', '10002', '5002', NULL, '2024/06/11/5002_10-49-47.jpg', '[]', 'null', '5002', '6106 F', 'Renial', 'Yellow', 'Red', NULL, '5.5', '0.8', 'Red', NULL, 'Border + Fency', NULL, NULL, NULL, NULL, 'Border', 'Full Lace', '350', '1500', '50', 'Bandhej', 'Party, Marriage, Mehandi, Haldi', 'Cold hand wash', '900g', 'Machine work', 'Krisha Priya', NULL, 'Krisha Priya', 'A', NULL, '2024-06-11 05:19:47', '2024-06-11 05:19:47'),
(4, 3, 'Rani', 'rani', 'Rani', '2000', '10003', '5003', NULL, '2024/06/11/5003_10-53-45.jpg', '[]', 'null', '5003', '6697 A', 'Renial', 'red', 'Yellow', 'Weight Less', '5.5', '0.8', 'Red', 'weight less', 'Border + Fency', NULL, NULL, NULL, NULL, 'Border', 'Full Lace', '450', '2000', '60', 'Bandhej box', 'Party, Marriage, Mehandi, Haldi', 'Cold hand wash', '967g', 'Machine work', 'Rani', NULL, 'Rani', 'A', NULL, '2024-06-11 05:23:45', '2024-06-11 05:23:45'),
(5, 3, 'Sakhi', 'sakhi', 'Sakhi', '2400', '10003', '5004', NULL, '2024/06/11/5004_10-58-18.jpg', '[]', 'null', '5004', '6106 B', 'Renial', 'DarkGreen', 'Light Green + Red', 'Weight Less', '5.5', '0.8', 'Green', 'weight less', 'Border + Fency', NULL, NULL, NULL, NULL, 'Thin Border', 'Full Lace', '375', '2400', '66', 'Bandhej Big Box', 'Party, Mehandi, Haldi,Daily Use', 'Normal Wash', '880g', 'Machine work', 'Sakhi', NULL, 'Sakhi', 'A', NULL, '2024-06-11 05:28:18', '2024-06-11 05:28:18'),
(6, 4, 'Laxmi', 'laxmi', 'Laxmi', '8000', '10005', '5005', '62042990', '2024/06/11/5005_11-02-22.jpg', '[]', 'null', '5005', '11000 Velvet', '11000 Velvet', 'Mahroon', NULL, 'Glitter Work with Genkin Dimond, Copper Jari Work', '1.1', '1', 'Mahroon', 'Heavy work, full Designed', 'Border + Fency', '2.2', 'Mehroon', 'Net', 'Lece With design', 'Border', 'Full Lace', '2500', '8000', '30', 'Jwellry Design', 'Party, Marriage, Mehandi', 'Dry Clean Only', '6750g', 'Machine + Hand Work', 'Laxmi', NULL, 'Laxmi', 'A', NULL, '2024-06-11 05:32:22', '2024-06-11 05:53:01'),
(7, 4, 'Rani Raja', 'rani-raja', 'Rani Raja', '6000', '10005', '5006', '62042990', '2024/06/11/5006_11-06-45.jpg', '[]', 'null', '5006', '1730 D', '1730 D', 'Mahroon', NULL, 'Glitter Work with Genkin Dimond, Copper Jari Work', '1.1', '1', 'Mahroon', 'Heavy work, full Designed', 'Border + Fency', '3', 'Mehroon + Golden', 'Net', 'Lece With design', 'Border', 'Full Lace', '1730', '6000', '50', 'Cassels and Jwellry', 'Party, Marriage, Mehandi', 'Dry Clean Only', '5700g', 'Machine + Hand Work', 'Rani Raja', NULL, 'Rani Raja', 'A', NULL, '2024-06-11 05:36:45', '2024-06-11 05:53:11'),
(8, 4, 'Gulabo', 'gulabo', 'Gulabo', '6000', '10005', '5007', '62042990', '2024/06/11/5007_11-11-49.jpg', '[]', 'null', '5007', 'GulabJamun 1830', 'GulabJamun 1830', 'Mahroon', NULL, 'Glitter Work with Genkin Dimond, Copper Jari Work', '1.1', '1', 'Mahroon', 'Heavy work, full Designed', 'Border + Fency', '4', 'Mehroon + Golden', 'Net', 'Lece With design', 'Border', 'Full Lace', '1830', '6000', '50', 'Cassels and Jwellry', 'Party, Marriage, Mehandi', 'Dry Clean Only', '5650g', 'Machine + Hand Work', 'Gulabo', NULL, 'Gulabo', 'A', NULL, '2024-06-11 05:41:49', '2024-06-11 05:53:21'),
(9, 4, 'Bahurani', 'bahurani', 'Bahurani', '1380', '10005', '5008', '62042990', '2024/06/11/5008_11-16-40.jpg', '[]', 'null', '5008', 'Bahu-1380', 'Bahu-1380', 'Red Mahroon', NULL, 'Glitter Work with Genkin Dimond, Copper Jari Work', '1.1', '1', 'Mahroon', 'Heavy work, full Designed', 'Border + Fency', '2.2', 'Mehroon', 'Net', 'Lece With design', 'Border', 'Full Lace', '1380', '5000', '50', 'Jwellry', 'Party, Marriage, Mehandi', 'Dry Clean Only', '3650g', 'Machine', 'Bahurani', NULL, 'Bahurani', 'A', NULL, '2024-06-11 05:46:40', '2024-06-11 05:53:43'),
(10, 3, 'Seema', 'seema', 'Party wear saree, weight less and dry wash', '720', '5001', 'c-1250', '5704', '2024/07/01/IMG_20230702_172245_07-48-46.jpg', '[\"2024\\/07\\/01\\/ETW14772A_07-48-46.webp\",\"2024\\/07\\/01\\/ETW14795A_07-48-46.webp\",\"2024\\/07\\/01\\/ETW14792A_07-48-46.webp\",\"2024\\/07\\/01\\/saree_07-48-46.webp\"]', 'null', '9', 'D4474', 'wetless', 'blue red peach skyblue', 'golden', 'silk', '6.3', 'with blouse', 'blue red peach skyblue', 'silk mix', 'silk design', NULL, NULL, NULL, NULL, 'party wear', NULL, '2000', '3000', '20%', 'full fill with design', 'mehandi, shadi, engagement, birthday', 'dry clean', '330g', 'sattan', 'Seema saree', NULL, 'Saree', 'A', NULL, '2024-07-01 07:48:46', '2024-07-01 07:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `vendor_address` varchar(255) DEFAULT NULL,
  `vendor_phone` varchar(255) DEFAULT NULL,
  `vendor_email` varchar(255) DEFAULT NULL,
  `item_count` varchar(255) DEFAULT NULL,
  `sub_totals` varchar(255) DEFAULT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `date`, `due_date`, `vendor_name`, `vendor_address`, `vendor_phone`, `vendor_email`, `item_count`, `sub_totals`, `tax`, `total`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2024-05-31', '2024-05-31', 'kuldip', '112 vijay nagar', '8956231245', 'malika@mail.com', NULL, '24.00', '0', '24.00', NULL, '2024-05-31 00:20:48', '2024-05-31 00:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `purchase_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cost` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `info` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rating` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, '4', 'hello,', '2024-06-19 06:12:28', '2024-06-19 06:12:28', NULL),
(2, 1, 3, '5', 'hello', '2024-06-19 06:28:23', '2024-06-19 06:28:23', NULL),
(3, 1, 3, '4', 'good product this', '2024-06-19 06:57:22', '2024-06-19 06:57:22', NULL),
(4, 1, 3, '2', 'good product', '2024-06-19 06:57:37', '2024-06-19 06:57:37', NULL),
(5, 3, 2, '4', 'this saree is good', '2024-06-25 07:47:40', '2024-06-25 07:47:40', NULL),
(6, 3, 2, '3', 'this lap', '2024-06-25 07:48:00', '2024-06-25 07:48:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'A', '2024-06-24 03:37:56', '2024-06-24 03:37:56'),
(3, 'manager', 'A', '2024-06-24 03:51:46', '2024-06-24 03:51:46'),
(4, 'Data Uploader', 'A', '2024-07-01 11:27:34', '2024-07-01 11:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 1, 1, NULL, NULL),
(3, 1, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippment_infos`
--

CREATE TABLE `shippment_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippment_infos`
--

INSERT INTO `shippment_infos` (`id`, `order_id`, `description`, `location`, `time`, `date`, `created_at`, `updated_at`) VALUES
(1, 24, 'hello', 'shiya ganj', '2062024', 'hello', '2024-06-20 02:14:49', '2024-06-20 02:14:49'),
(2, 24, 'hello', 'shiya ganj', '20 6 2024', 'hello', '2024-06-20 02:15:16', '2024-06-20 02:15:16'),
(3, 24, 'hello', 'shiya ganj', '20 June 2024', 'hello', '2024-06-20 02:16:43', '2024-06-20 02:16:43'),
(4, 24, 'hello', 'shiya ganj', '20 June 2024', 'hello', '2024-06-20 02:17:21', '2024-06-20 02:17:21'),
(5, 24, 'hello', 'hii', '7:56 AM', '20 June 2024', '2024-06-20 02:26:02', '2024-06-20 02:26:02'),
(6, 24, 'hello', 'shiya ganj', '12:16 PM', '20 June 2024', '2024-06-20 06:46:52', '2024-06-20 06:46:52'),
(7, 24, 'suere', 'surat', '1:24 PM', '20 June 2024', '2024-06-20 07:54:09', '2024-06-20 07:54:09'),
(8, 24, 'suere', 'surat', '1:24 PM', '20 June 2024', '2024-06-20 07:54:31', '2024-06-20 07:54:31'),
(9, 26, '122, surat godown c', 'surat', '7:31 AM', '25 June 2024', '2024-06-25 07:31:47', '2024-06-25 07:31:47'),
(10, 26, '112 godown packaging', 'surat', '7:33 AM', '25 June 2024', '2024-06-25 07:33:04', '2024-06-25 07:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `code`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gujarat', 'GJ', 'A', NULL, '2024-06-18 00:12:38', '2024-06-18 00:15:52'),
(2, 1, 'Delhi', 'DL', 'A', NULL, '2024-06-18 00:13:21', '2024-06-18 00:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `suscribes`
--

CREATE TABLE `suscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suscribes`
--

INSERT INTO `suscribes` (`id`, `email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kdomdiya@gmail.com', 'A', '2024-06-19 01:17:09', '2024-06-19 01:17:09', NULL),
(2, 'kdomdiya@gmail.com', 'D', '2024-06-19 01:18:25', '2024-06-19 01:18:25', NULL),
(3, 'kdomdiya@gmail.com', 'A', '2024-06-19 01:18:45', '2024-06-19 01:18:45', NULL),
(4, 'kdomdiya@gmail.com', 'A', '2024-06-19 01:19:35', '2024-06-19 01:19:35', NULL),
(5, 'kdomdiya@gmail.com', 'A', '2024-06-19 02:35:57', '2024-06-19 02:35:57', NULL),
(6, 'kdomdiya@gmail.com', 'A', '2024-06-19 02:40:21', '2024-06-19 02:40:21', NULL),
(7, 'kdomdiya@gmail.com', 'A', '2024-06-19 02:47:40', '2024-06-19 02:47:40', NULL),
(8, 'kdomdiya@gmail.com', 'A', '2024-06-19 02:53:23', '2024-06-19 02:53:23', NULL),
(9, 'kdomdiya@gmail.com', 'A', '2024-06-19 02:56:39', '2024-06-19 02:56:39', NULL),
(10, 'kdomdiya@gmail.com', 'A', '2024-06-19 02:57:11', '2024-06-19 02:57:11', NULL),
(11, 'kdomdiya@gmail.com', 'A', '2024-06-19 04:00:05', '2024-06-19 04:00:05', NULL),
(12, 'kdomdiya@gmail.com', 'A', '2024-06-25 07:15:01', '2024-06-25 07:15:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bank_details` varchar(255) DEFAULT NULL,
  `gst` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `aadhar` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `addaress_1` varchar(255) DEFAULT NULL,
  `addaress_2` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `email_stamp` varchar(255) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `mobile`, `email`, `bank_details`, `gst`, `pan`, `aadhar`, `state`, `city`, `addaress_1`, `addaress_2`, `company_name`, `pincode`, `password`, `role`, `price`, `image`, `status`, `email_stamp`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '8956234512', 'admin@weloxpharma.com', NULL, NULL, NULL, NULL, 'gujarat', 'surat', 'vity nagar', '112 maharaja pharm', 'Admin', NULL, '$2y$10$q74tmvUl0.P6az/gB6Ypi./bF.9sVC6ZxHnKgQ3RgaiR0UexyC8PC', '1', '5', '2024/06/15/cart-2_07-03-40.webp', 'A', '', NULL, NULL, '2024-06-24 04:32:08'),
(2, 'kuldip', 'domadiya', '5623895623', 'kuldip@mail.com', 'icici', 'uiopklkl', 'asdasdasd', '123456789012', 'Gujarat', 'surat', '112, sarita vihar nagar', 'vita nagar', 'Siya Textile', '235689', '$2y$10$GGoGU//AL7p0GXht/FLIAOf.aMZZi5OzkvpCTucOJE5NCRFZ.cIhe', '1', '5', '2024/06/15/cart-2_07-03-40.webp', 'A', NULL, NULL, '2024-06-15 01:33:40', '2024-06-15 03:50:01'),
(3, 'Hardik', 'Patel', '8956235689', 'Hardik@mail.com', 'Axis', '012ADVF12454521HNi0', '120CVOPD12H', NULL, 'Gujarat', 'Surat', '12 savilas', '12 savilas', 'dirayu', '456235', '$2y$10$zujnLVEBa2BhUd/Zo/pLOuzgysThPF6hFF4/J./38cvHog/.B.i6m', '1', '5', NULL, 'A', NULL, NULL, '2024-06-24 00:45:44', '2024-06-24 05:48:03'),
(10, 'Rajesh', 'Verma', '8287127695', 'rajver.1111@gmail.com', 'SBI', 'No', 'No', '8xxxx3378182', 'MP', 'Gwalior', NULL, NULL, NULL, '474012', '$2y$10$yHEq.ylK1k1MjL.z0JB07e3l04SiXSRJLciQb7JCuETZSJYK2FV8W', '1', '100000', '2024/06/30/raj1_07-27-37.jpg', 'A', NULL, NULL, '2024-06-30 07:27:37', '2024-06-30 07:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `name`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'create', 'create', 'A', NULL, '2024-06-15 01:30:27', '2024-06-15 01:30:27'),
(2, 'order purchase', 'purchase', 'A', NULL, '2024-06-15 01:30:42', '2024-06-15 01:30:42'),
(3, 'Edit', 'edit', 'A', NULL, '2024-06-15 01:30:57', '2024-06-15 01:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `permissions` varchar(255) DEFAULT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `permissions`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Buyer', '[\"2\"]', 'A', NULL, '2024-06-15 01:31:14', '2024-06-15 01:31:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_item_type_foreign` (`item_type`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_country_foreign` (`country`),
  ADD KEY `orders_state_foreign` (`state`),
  ADD KEY `orders_shipping_country_foreign` (`shipping_country`),
  ADD KEY `orders_shipping_state_foreign` (`shipping_state`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_user_id_foreign` (`user_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_item_type_foreign` (`item_type`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_items_category_id_foreign` (`category_id`),
  ADD KEY `purchase_items_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `shippment_infos`
--
ALTER TABLE `shippment_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippment_infos_order_id_foreign` (`order_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `suscribes`
--
ALTER TABLE `suscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shippment_infos`
--
ALTER TABLE `shippment_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suscribes`
--
ALTER TABLE `suscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_item_type_foreign` FOREIGN KEY (`item_type`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD CONSTRAINT `blog_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_shipping_country_foreign` FOREIGN KEY (`shipping_country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_shipping_state_foreign` FOREIGN KEY (`shipping_state`) REFERENCES `states` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_item_type_foreign` FOREIGN KEY (`item_type`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD CONSTRAINT `purchase_items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_items_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippment_infos`
--
ALTER TABLE `shippment_infos`
  ADD CONSTRAINT `shippment_infos_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
