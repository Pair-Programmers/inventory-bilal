-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2022 at 01:07 PM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waynoybn_inventory-bilal`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `as_off_date` date DEFAULT NULL,
  `opening_balance` int(11) NOT NULL DEFAULT 0,
  `balance` int(11) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `account_title`, `type`, `account_number`, `bank_name`, `as_off_date`, `opening_balance`, `balance`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Cash Counter', NULL, 'Cash', NULL, NULL, '2022-04-26', 0, -50000, 1, '2022-04-26 22:12:17', '2022-06-25 15:43:59'),
(2, 'Bank Account', NULL, 'Bank', NULL, NULL, '2022-04-26', 0, 0, 1, '2022-04-26 22:12:17', '2022-04-26 22:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile_image_icon.png',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `role`, `status`, `profile_image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hamza Saqib', 'mianhamza7262@gmail.com', '03239991999', 'Super Admin', 'Active', 'profile_image_icon.jpg', '$2y$10$ZleRTs9tAtiQc1BfPVx2.eoJL3FH/0qiOk3MAbKRR4M3EjjK7hE/O', NULL, '2022-04-26 22:12:17', '2022-04-26 22:12:17'),
(2, 'Bilal', 'bilalsardar41@gmail.com', '03xxxxxxxx', 'Super Admin', 'Active', 'profile_image_icon.jpg', '$2y$10$PyzMsclu8FUCgUpNh8jy1Og3AhoOdLopcFuVm9rSSBh3ldKLCDLEC', NULL, '2022-04-26 22:12:17', '2022-04-26 22:12:17'),
(3, 'Hamza Shafique', 'azubair210000@gmail.com', '03xxxxxxxx', 'Super Admin', 'Active', 'profile_image_icon.jpg', '$2y$10$/1iccShxaF7.NOSLMKpTNeyUf.oXRAg2sUnHFUutIDZ5nw.jnLL2C', NULL, '2022-04-26 22:12:17', '2022-04-26 22:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile_image_icon.png',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `balance` int(11) NOT NULL DEFAULT 0,
  `opening_balance` int(11) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `email`, `profile_image`, `type`, `status`, `balance`, `opening_balance`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Cash Customer', NULL, NULL, NULL, 'profile_image_icon.png', 'Cash', 'Active', 0, 0, 1, '2022-04-26 22:12:17', '2022-04-26 22:12:17'),
(2, 'Arslan', NULL, NULL, NULL, 'profile_image_icon.png', 'Credit', 'Active', 28000, 0, 2, '2022-06-25 15:39:42', '2022-06-25 16:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `isActive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile_image_icon.png',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '[]',
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `expense_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `no_of_items` int(11) NOT NULL,
  `no_of_products` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cash_recieved` int(11) NOT NULL DEFAULT 0,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pre_balance` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `amount`, `no_of_items`, `no_of_products`, `issue_date`, `discount`, `reference_no`, `description`, `type`, `group`, `cash_recieved`, `customer_id`, `vendor_id`, `created_by`, `created_at`, `updated_at`, `pre_balance`) VALUES
(1, 30000, 10, 1, '2022-05-11', 0, NULL, NULL, 'Purchase', 'Cash', 0, NULL, 5, 2, '2022-05-10 23:01:47', '2022-05-10 23:01:47', 0),
(3, 77165, 5, 1, '2022-05-26', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-05-26 13:55:28', '2022-05-26 13:55:28', 0),
(4, 14868, 1, 1, '2022-05-26', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-05-26 13:55:48', '2022-05-26 13:55:48', 0),
(6, 16104, 24, 2, '2022-05-26', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-05-26 14:03:50', '2022-05-26 14:03:50', 0),
(8, 6980, 1, 1, '2022-05-26', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-05-26 14:10:44', '2022-05-26 14:10:44', 0),
(9, 2, 2, 1, '2022-05-26', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 3, 2, '2022-05-26 14:11:04', '2022-05-26 14:11:04', 0),
(12, 25000, 5, 1, '2022-06-25', 0, NULL, NULL, 'Sale', 'Credit', 0, 2, NULL, 2, '2022-06-25 16:36:54', '2022-06-25 16:36:54', 0),
(13, 3000, 3, 1, '2022-06-25', 0, NULL, NULL, 'Sale', 'Credit', 0, 2, NULL, 2, '2022-06-25 16:52:36', '2022-06-25 16:52:36', 25000),
(21, 5000, 5, 1, '2022-07-18', 0, NULL, NULL, 'Purchase', 'Credit', 2000, NULL, 9, 2, '2022-07-18 10:01:17', '2022-07-18 10:01:17', 0),
(22, 5000, 5, 1, '2022-07-20', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 10, 2, '2022-07-20 11:59:16', '2022-07-20 11:59:16', 0),
(23, 5000, 5, 1, '2022-08-08', 0, NULL, NULL, 'Purchase', 'Credit', 2000, NULL, 10, 2, '2022-08-08 14:43:36', '2022-08-08 14:43:36', 0),
(24, 244464, 88, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 13:20:09', '2022-08-30 13:20:09', 0),
(25, 69335, 49, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 13:28:29', '2022-08-30 13:28:29', 244464),
(26, 221760, 99, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 13:32:30', '2022-08-30 13:32:30', 313799),
(27, 306508, 74, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 13:36:02', '2022-08-30 13:36:02', 535559),
(28, 94500, 100, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 13:40:59', '2022-08-30 13:40:59', 842067),
(29, 25740, 10, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 13:48:11', '2022-08-30 13:48:11', 936567),
(30, 9450, 10, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 14:07:27', '2022-08-30 14:07:27', 962307),
(31, 2682, 2, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 14:16:43', '2022-08-30 14:16:43', 971757),
(32, 1872, 2, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 14:19:07', '2022-08-30 14:19:07', 974439),
(33, 20000, 4, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 11, 2, '2022-08-30 14:26:30', '2022-08-30 14:26:30', 0),
(34, 16000, 4, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 11, 2, '2022-08-30 14:27:41', '2022-08-30 14:27:41', 20000),
(35, 21913, 17, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 16:27:57', '2022-08-30 16:27:57', 976311),
(36, 1800, 4, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 16:28:21', '2022-08-30 16:28:21', 998224),
(37, 7004, 17, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 16:31:27', '2022-08-30 16:31:27', 1000024),
(38, 26082, 27, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 16:32:21', '2022-08-30 16:32:21', 1007028),
(39, 19600, 40, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 16:39:38', '2022-08-30 16:39:38', 1033110),
(40, 7500, 10, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 3, 2, '2022-08-30 16:44:28', '2022-08-30 16:44:28', 0),
(41, 9231, 13, 2, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 16:53:08', '2022-08-30 16:53:08', 1052710),
(42, 4000, 10, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-08-30 16:59:03', '2022-08-30 16:59:03', 1061941),
(43, 10500, 14, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 3, 2, '2022-08-30 17:15:42', '2022-08-30 17:15:42', 7500),
(44, 3675, 7, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 3, 2, '2022-08-30 17:19:32', '2022-08-30 17:19:32', 18000),
(45, 6000, 8, 1, '2022-08-30', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 11, 2, '2022-08-30 17:22:35', '2022-08-30 17:22:35', 36000),
(46, 200, 1, 1, '2022-09-06', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-09-06 16:11:43', '2022-09-06 16:11:43', 1065941),
(47, 0, 15, 3, '2022-09-06', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-09-06 16:28:07', '2022-09-06 16:28:07', 1066141),
(48, 0, 8, 2, '2022-09-06', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 3, 2, '2022-09-06 16:30:55', '2022-09-06 16:30:55', 21675),
(49, 0, 3, 2, '2022-09-06', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-09-06 16:33:01', '2022-09-06 16:33:01', 1066141),
(51, 0, 4, 2, '2022-09-06', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-09-06 16:52:22', '2022-09-06 16:52:22', 1071481),
(52, 0, 1, 1, '2022-09-06', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 3, 2, '2022-09-06 16:53:50', '2022-09-06 16:53:50', 21675),
(53, 0, 2, 1, '2022-09-06', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-09-06 17:05:59', '2022-09-06 17:05:59', 1071481),
(54, 0, 4, 1, '2022-09-06', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 3, 2, '2022-09-06 17:07:31', '2022-09-06 17:07:31', 21675),
(55, 3700, 2, 1, '2022-09-06', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 4, 2, '2022-09-06 17:15:56', '2022-09-06 17:15:56', 1071481),
(56, 0, 4, 1, '2022-09-06', 0, NULL, NULL, 'Purchase', 'Credit', 0, NULL, 3, 2, '2022-09-06 17:16:47', '2022-09-06 17:16:47', 21675);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sale_quantity` int(11) NOT NULL,
  `purchase_price` int(11) DEFAULT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `total_ammount` int(11) NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `product_id`, `sale_quantity`, `purchase_price`, `sale_price`, `total_ammount`, `invoice_id`, `vendor_id`, `created_at`, `updated_at`) VALUES
(1, 3, 10, 3000, NULL, 30000, 1, NULL, '2022-05-10 23:01:47', '2022-05-10 23:01:47'),
(3, 270, 5, 15433, NULL, 77165, 3, NULL, '2022-05-26 13:55:28', '2022-05-26 13:55:28'),
(4, 270, 1, 14868, NULL, 14868, 4, NULL, '2022-05-26 13:55:48', '2022-05-26 13:55:48'),
(7, 62, 12, 700, NULL, 8400, 6, NULL, '2022-05-26 14:03:50', '2022-05-26 14:03:50'),
(8, 62, 12, 642, NULL, 7704, 6, NULL, '2022-05-26 14:03:50', '2022-05-26 14:03:50'),
(11, 34, 1, 6980, NULL, 6980, 8, NULL, '2022-05-26 14:10:44', '2022-05-26 14:10:44'),
(12, 34, 2, 1, NULL, 2, 9, NULL, '2022-05-26 14:11:04', '2022-05-26 14:11:04'),
(15, 271, 5, 0, 5000, 25000, 12, 6, '2022-06-25 16:36:54', '2022-06-25 16:36:54'),
(16, 272, 3, 0, 1000, 3000, 13, 5, '2022-06-25 16:52:36', '2022-06-25 16:52:36'),
(24, 271, 5, 1000, NULL, 5000, 21, NULL, '2022-07-18 10:01:17', '2022-07-18 10:01:17'),
(25, 271, 5, 1000, NULL, 5000, 22, NULL, '2022-07-20 11:59:16', '2022-07-20 11:59:16'),
(26, 272, 5, 1000, NULL, 5000, 23, NULL, '2022-08-08 14:43:36', '2022-08-08 14:43:36'),
(27, 116, 88, 2778, NULL, 244464, 24, NULL, '2022-08-30 13:20:09', '2022-08-30 13:20:09'),
(28, 111, 49, 1415, NULL, 69335, 25, NULL, '2022-08-30 13:28:29', '2022-08-30 13:28:29'),
(29, 118, 99, 2240, NULL, 221760, 26, NULL, '2022-08-30 13:32:30', '2022-08-30 13:32:30'),
(30, 110, 74, 4142, NULL, 306508, 27, NULL, '2022-08-30 13:36:02', '2022-08-30 13:36:02'),
(31, 119, 100, 945, NULL, 94500, 28, NULL, '2022-08-30 13:40:59', '2022-08-30 13:40:59'),
(32, 120, 10, 2574, NULL, 25740, 29, NULL, '2022-08-30 13:48:11', '2022-08-30 13:48:11'),
(33, 119, 10, 945, NULL, 9450, 30, NULL, '2022-08-30 14:07:27', '2022-08-30 14:07:27'),
(34, 273, 2, 1341, NULL, 2682, 31, NULL, '2022-08-30 14:16:43', '2022-08-30 14:16:43'),
(35, 274, 2, 936, NULL, 1872, 32, NULL, '2022-08-30 14:19:07', '2022-08-30 14:19:07'),
(36, 46, 4, 5000, NULL, 20000, 33, NULL, '2022-08-30 14:26:30', '2022-08-30 14:26:30'),
(37, 275, 4, 4000, NULL, 16000, 34, NULL, '2022-08-30 14:27:41', '2022-08-30 14:27:41'),
(38, 234, 17, 1289, NULL, 21913, 35, NULL, '2022-08-30 16:27:57', '2022-08-30 16:27:57'),
(39, 276, 4, 450, NULL, 1800, 36, NULL, '2022-08-30 16:28:21', '2022-08-30 16:28:21'),
(40, 277, 17, 412, NULL, 7004, 37, NULL, '2022-08-30 16:31:27', '2022-08-30 16:31:27'),
(41, 235, 27, 966, NULL, 26082, 38, NULL, '2022-08-30 16:32:22', '2022-08-30 16:32:22'),
(42, 278, 40, 490, NULL, 19600, 39, NULL, '2022-08-30 16:39:38', '2022-08-30 16:39:38'),
(43, 223, 10, 750, NULL, 7500, 40, NULL, '2022-08-30 16:44:28', '2022-08-30 16:44:28'),
(44, 228, 10, 750, NULL, 7500, 41, NULL, '2022-08-30 16:53:08', '2022-08-30 16:53:08'),
(45, 228, 3, 577, NULL, 1731, 41, NULL, '2022-08-30 16:53:08', '2022-08-30 16:53:08'),
(46, 231, 10, 400, NULL, 4000, 42, NULL, '2022-08-30 16:59:03', '2022-08-30 16:59:03'),
(47, 227, 14, 750, NULL, 10500, 43, NULL, '2022-08-30 17:15:42', '2022-08-30 17:15:42'),
(48, 229, 7, 525, NULL, 3675, 44, NULL, '2022-08-30 17:19:32', '2022-08-30 17:19:32'),
(49, 279, 8, 750, NULL, 6000, 45, NULL, '2022-08-30 17:22:35', '2022-08-30 17:22:35'),
(50, 187, 1, 200, NULL, 200, 46, NULL, '2022-09-06 16:11:43', '2022-09-06 16:11:43'),
(51, 204, 5, NULL, NULL, 0, 47, NULL, '2022-09-06 16:28:07', '2022-09-06 16:28:07'),
(52, 280, 4, 478, NULL, 1912, 47, NULL, '2022-09-06 16:28:07', '2022-09-06 16:28:07'),
(53, 204, 6, 681, NULL, 4086, 47, NULL, '2022-09-06 16:28:07', '2022-09-06 16:28:07'),
(54, 203, 4, NULL, NULL, 0, 48, NULL, '2022-09-06 16:30:55', '2022-09-06 16:30:55'),
(55, 202, 4, NULL, NULL, 0, 48, NULL, '2022-09-06 16:30:55', '2022-09-06 16:30:55'),
(56, 83, 1, NULL, NULL, 0, 49, NULL, '2022-09-06 16:33:01', '2022-09-06 16:33:01'),
(57, 83, 2, 4204, NULL, 8408, 49, NULL, '2022-09-06 16:33:01', '2022-09-06 16:33:01'),
(59, 178, 1, NULL, NULL, 0, 51, NULL, '2022-09-06 16:52:22', '2022-09-06 16:52:22'),
(60, 282, 3, 3693, NULL, 11079, 51, NULL, '2022-09-06 16:52:22', '2022-09-06 16:52:22'),
(61, 83, 1, NULL, NULL, 0, 52, NULL, '2022-09-06 16:53:50', '2022-09-06 16:53:50'),
(62, 283, 2, NULL, NULL, 0, 53, NULL, '2022-09-06 17:05:59', '2022-09-06 17:05:59'),
(63, 284, 4, NULL, NULL, 0, 54, NULL, '2022-09-06 17:07:31', '2022-09-06 17:07:31'),
(64, 100, 2, 1850, NULL, 3700, 55, NULL, '2022-09-06 17:15:56', '2022-09-06 17:15:56'),
(65, 103, 4, NULL, NULL, 0, 56, NULL, '2022-09-06 17:16:47', '2022-09-06 17:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_18_162813_create_admins_table', 1),
(6, '2021_10_18_163700_create_customers_table', 1),
(7, '2021_10_18_163719_create_vendors_table', 1),
(8, '2021_10_18_163734_create_product_categories_table', 1),
(9, '2021_10_18_163735_create_product_sub_categories_table', 1),
(10, '2021_10_18_163747_create_products_table', 1),
(11, '2021_10_18_163925_create_accounts_table', 1),
(12, '2021_10_18_163926_create_invoices_table', 1),
(13, '2021_10_18_163950_create_expense_categories_table', 1),
(14, '2021_10_18_163952_create_expenses_table', 1),
(15, '2021_10_19_163938_create_payments_table', 1),
(16, '2021_10_25_145838_create_invoice_details_table', 1),
(17, '2021_12_19_171512_create_employees_table', 1),
(18, '2021_12_19_171946_make_foreign_key_constraint_payments_employees', 1),
(19, '2022_03_05_153051_create_attributes_of_product', 1),
(20, '2022_03_21_221520_create_atribute_kg_of_product', 1),
(21, '2022_03_22_210519_create_atribute_balance_invoice', 1),
(22, '2022_04_09_080002_add_coloumn_vendor_and_custom_id_in_payments', 1),
(23, '2022_04_26_170420_create_product_models_table', 1),
(24, '2022_04_26_171743_add_coloumn_model_id_in_products', 1),
(25, '2022_05_02_100236_add_coloumn_code_in_products', 2),
(26, '2022_06_18_092731_add_coloumn_vendor_id_in_invoice_details', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `expense_id` bigint(20) UNSIGNED DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `amount`, `payment_date`, `group`, `type`, `note`, `customer_id`, `vendor_id`, `invoice_id`, `expense_id`, `employee_id`, `account_id`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 20000, '2022-06-25', 'Out', 'Vendor Payment', NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '2022-06-25 15:57:34', '2022-06-25 15:57:34'),
(5, 20000, '2022-06-26', 'Out', 'Vendor Payment', NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '2022-06-26 20:55:55', '2022-06-26 20:55:55'),
(6, 30000, '2022-06-26', 'Out', 'Vendor Payment', NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '2022-06-26 20:58:15', '2022-06-26 20:58:15'),
(7, 20000, '2022-07-03', 'Out', 'Vendor Payment', NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '2022-07-03 22:08:37', '2022-07-03 22:08:37'),
(15, 2000, '2022-07-18', 'Out', 'Purchase', 'Paid in Credit Invoice # 21', NULL, 9, 21, NULL, NULL, 1, 2, '2022-07-18 10:01:17', '2022-07-18 10:01:17'),
(16, 3000, '2022-07-18', 'Out', 'Vendor Payment', 'Invoice # 0021', NULL, 9, 21, NULL, NULL, 1, 2, '2022-07-18 10:03:25', '2022-07-18 10:03:25'),
(17, 3000, '2022-07-20', 'Out', 'Vendor Payment', 'Invoice # 0022', NULL, 10, 22, NULL, NULL, 1, 2, '2022-07-20 12:00:08', '2022-07-20 12:00:08'),
(18, 2000, '2022-07-25', 'Out', 'Vendor Payment', 'Invoice # 0022', NULL, 10, 22, NULL, NULL, 1, 2, '2022-07-25 12:21:09', '2022-07-25 12:21:09'),
(19, 2000, '2022-08-08', 'Out', 'Purchase', 'Paid in Credit Invoice # 23', NULL, 10, 23, NULL, NULL, 1, 2, '2022-08-08 14:43:36', '2022-08-08 14:43:36'),
(20, 3000, '2022-08-08', 'Out', 'Vendor Payment', 'Invoice # 0023', NULL, 10, 23, NULL, NULL, 1, 2, '2022-08-08 14:45:29', '2022-08-08 14:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `opening_qty` int(11) NOT NULL DEFAULT 0,
  `available_qty` int(11) NOT NULL DEFAULT 0,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `product_subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meter` decimal(8,2) DEFAULT NULL,
  `ghaz` decimal(8,2) DEFAULT NULL,
  `kg` decimal(8,2) DEFAULT NULL,
  `product_model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `cost_price`, `sale_price`, `opening_qty`, `available_qty`, `unit`, `images`, `colors`, `description`, `brand`, `product_category_id`, `product_subcategory_id`, `created_by`, `created_at`, `updated_at`, `meter`, `ghaz`, `kg`, `product_model_id`) VALUES
(10, 'KJ100-1003001A-W1', 'Head Gasket', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouChai', 6, NULL, 2, '2022-05-24 02:14:31', '2022-05-24 02:14:31', NULL, NULL, NULL, 5),
(11, '08205983AS', 'Rear Wheel Seal', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:15:17', '2022-05-24 02:15:17', NULL, NULL, NULL, 6),
(12, '01256', 'Rear Wheel Seal', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:16:07', '2022-05-24 02:16:07', NULL, NULL, NULL, 5),
(13, '00454', 'Rear Seal Wheel Brown Old Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:17:16', '2022-05-24 02:17:16', NULL, NULL, NULL, 5),
(14, '01307', 'Differential Oil Seal', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:17:46', '2022-05-24 02:17:46', NULL, NULL, NULL, 5),
(15, '00871', 'Front Hub Oil Seal New Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:18:25', '2022-05-24 02:18:25', NULL, NULL, NULL, 5),
(16, '00616', 'Differential Oil Seal', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:18:55', '2022-05-24 02:18:55', NULL, NULL, NULL, 5),
(17, '00455', 'Rear Wheel Seal Green', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:19:38', '2022-05-24 02:19:38', NULL, NULL, NULL, 5),
(18, '00702', 'Front Hub Oil Seal GD', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:20:04', '2022-05-24 03:07:48', NULL, NULL, NULL, 5),
(19, '04651', 'Seal New Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:20:34', '2022-05-24 02:20:34', NULL, NULL, NULL, 5),
(20, '00001', 'Front Wheel Seal Old Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:21:06', '2022-05-24 02:21:06', NULL, NULL, NULL, 5),
(21, '00655', 'Oil Retainer Ring', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:21:32', '2022-05-24 02:21:32', NULL, NULL, NULL, 5),
(22, '00087', 'Front Brake Seal', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:21:56', '2022-05-24 02:21:56', NULL, NULL, NULL, 5),
(23, '-', 'Chilum Seal', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:22:15', '2022-05-24 02:22:15', NULL, NULL, NULL, 5),
(24, '605-2', 'Charging Generator Cutout', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 9, NULL, 2, '2022-05-24 02:22:44', '2022-05-24 02:22:44', NULL, NULL, NULL, 5),
(25, '8RL3023C', 'AC Generator Cutout', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 9, NULL, 2, '2022-05-24 02:23:13', '2022-05-24 02:23:13', NULL, NULL, NULL, 5),
(26, '.', 'Engine Main Seal with Plate', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouChai', 6, NULL, 2, '2022-05-24 02:25:12', '2022-05-24 02:25:12', NULL, NULL, NULL, 5),
(27, 'MS100-1600440', 'Engine Main Seal without Plate', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouChai', 6, NULL, 2, '2022-05-24 02:25:44', '2022-05-24 02:25:44', NULL, NULL, NULL, 5),
(28, '1003-00395', 'Head Gasket', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:26:15', '2022-05-24 02:26:15', NULL, NULL, NULL, 6),
(29, 'YC209-C082105PR', 'Timing Seal', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:26:43', '2022-05-24 02:26:43', NULL, NULL, NULL, 5),
(30, '2320-1025', 'Connecting Rod', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:27:20', '2022-05-24 02:27:20', NULL, NULL, NULL, 5),
(31, 'YC47-B425', 'Dipstick Cover', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouChai', 6, NULL, 2, '2022-05-24 02:27:50', '2022-05-24 02:27:50', NULL, NULL, NULL, 5),
(32, 'KXQ31-1104-050', 'High Pressure Pipe', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouChai', 6, NULL, 2, '2022-05-24 02:28:19', '2022-05-24 02:28:19', NULL, NULL, NULL, 5),
(33, 'M3000-1005008A', 'Thrust Plate', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:28:46', '2022-05-24 02:28:46', NULL, NULL, NULL, 5),
(34, 'M3000-1005006A', 'Main Bearing Shell', 0, 0, 0, 3, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:29:10', '2022-05-26 14:11:04', NULL, NULL, NULL, 5),
(35, 'MS100-3823241A', 'Injector Harness Wire', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:38:28', '2022-05-24 02:38:28', NULL, NULL, NULL, 5),
(36, ',', 'Solenoid Valve', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:38:57', '2022-05-24 02:38:57', NULL, NULL, NULL, 5),
(37, '1013-00220', 'Stainer', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:39:30', '2022-05-24 02:39:30', NULL, NULL, NULL, 5),
(38, 'KJ100-1003002C', 'Cylinder Head Bolt', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:39:56', '2022-05-24 02:39:56', NULL, NULL, NULL, 5),
(39, '2403-00451', 'Pinion Seal', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:40:22', '2022-05-24 02:40:22', NULL, NULL, NULL, 5),
(40, 'MS100-3823242', 'Injector Harness Wire Cover', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:40:47', '2022-05-24 02:40:47', NULL, NULL, NULL, 5),
(41, 'L4700-38231G0', 'Oil Pressure Sensor', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:41:13', '2022-05-24 02:41:13', NULL, NULL, NULL, 5),
(42, 'L4700-111-61-A38', 'Measure Valve', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:42:56', '2022-05-24 02:42:56', NULL, NULL, NULL, 5),
(43, 'M3000-1002120-P', 'Camshaft Bush', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:43:22', '2022-05-24 02:43:22', NULL, NULL, NULL, 5),
(44, '1004-00944', 'Piston YT Old Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:43:47', '2022-05-24 02:43:47', NULL, NULL, NULL, 5),
(45, 'M3000-1004004', 'Piston Pin YT Old Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:44:12', '2022-05-24 02:44:12', NULL, NULL, NULL, 5),
(46, '2919-00049', 'Torque Rod Bush - Big', 0, 0, 0, 4, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 02:44:58', '2022-08-30 14:26:30', NULL, NULL, NULL, 5),
(47, '\'', 'King Pin', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:45:24', '2022-05-24 02:45:24', NULL, NULL, NULL, 5),
(48, 'M1000-1002132', 'Liner Rubber Ring YC', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:46:16', '2022-05-24 02:46:16', NULL, NULL, NULL, 5),
(49, ';', 'Condenser Fan', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:46:49', '2022-05-24 02:46:49', NULL, NULL, NULL, 6),
(50, '8114-00010', 'Blower Motor', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:47:15', '2022-05-24 02:47:15', NULL, NULL, NULL, 5),
(51, '067N7169', 'Expansion Valve', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:47:42', '2022-05-24 02:47:42', NULL, NULL, NULL, 5),
(52, 'JXCP-007-A21', 'Blower Motor Denso', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:48:25', '2022-05-24 02:48:25', NULL, NULL, NULL, 5),
(53, 'DK238B-DJ1', 'Fuse', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:48:46', '2022-05-24 02:48:46', NULL, NULL, NULL, 5),
(54, '1609-00004', 'Clutch Servo Repair Kit', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:49:15', '2022-05-24 02:49:15', NULL, NULL, NULL, 5),
(55, 'ARUIM16', 'Lifty Pump', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:49:43', '2022-05-24 02:49:43', NULL, NULL, NULL, 6),
(56, ']', 'AC Tank Receiver', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:50:04', '2022-05-24 02:50:04', NULL, NULL, NULL, 5),
(57, '[', 'AC Dryer Filter - Local', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:50:26', '2022-05-24 02:50:26', NULL, NULL, NULL, 5),
(58, '=', 'Air Compressor Kit - Without RIng', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:50:57', '2022-05-24 02:50:57', NULL, NULL, NULL, 5),
(59, '8109-00002', 'AC Dryer Filter', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 02:51:28', '2022-05-24 02:51:28', NULL, NULL, NULL, 5),
(60, 'KJ100-1004007A-H', 'Big End', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:51:54', '2022-05-24 02:51:54', NULL, NULL, NULL, 5),
(61, 'M6600-1003103', 'Exhaust Valve', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:52:24', '2022-08-30 17:27:16', NULL, NULL, NULL, 5),
(62, 'M6600-1003111', 'Intake Valve', 0, 0, 0, 24, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:52:46', '2022-05-26 14:03:50', NULL, NULL, NULL, 5),
(63, '_', 'Turbo Garret', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:53:27', '2022-05-24 02:53:27', NULL, NULL, NULL, 5),
(64, '5940-13468', 'Gas Spring', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:53:52', '2022-05-24 02:53:52', NULL, NULL, NULL, 5),
(65, '5940-13464', 'Gas Spring', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:54:15', '2022-05-24 02:54:15', NULL, NULL, NULL, 5),
(66, '5940-13466', 'Gas Spring', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:54:44', '2022-05-24 02:54:44', NULL, NULL, NULL, 5),
(67, '5940-13472', 'Gas Spring', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:55:44', '2022-05-24 02:55:44', NULL, NULL, NULL, 5),
(68, '5940-13462', 'Gas Spring', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:56:09', '2022-05-24 02:56:09', NULL, NULL, NULL, 5),
(69, '5940-00143', 'Gas Spring', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:56:43', '2022-05-24 02:56:43', NULL, NULL, NULL, 5),
(70, '2915-00341', 'Rear Shock Absorber A+', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:57:24', '2022-05-24 02:57:24', NULL, NULL, NULL, 5),
(71, '2901-00382', 'Front Shock Absorber A+', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:57:54', '2022-05-24 02:57:54', NULL, NULL, NULL, 5),
(72, '1303-02670', 'Hose Pipe', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:58:21', '2022-05-24 02:58:21', NULL, NULL, NULL, 5),
(73, '1303-01282', 'Hose Pipe', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:58:48', '2022-05-24 02:58:48', NULL, NULL, NULL, 5),
(74, '1303-00682', 'Hose Pipe', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:59:15', '2022-05-24 02:59:15', NULL, NULL, NULL, 5),
(75, '1109-01-00018', 'Hose Pipe', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 02:59:41', '2022-05-24 02:59:41', NULL, NULL, NULL, 5),
(76, '1109-03854', 'Hose Pipe', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:00:08', '2022-05-24 03:00:08', NULL, NULL, NULL, 5),
(77, '1303-01278', 'Hose Pipe', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:00:47', '2022-05-24 03:00:47', NULL, NULL, NULL, 5),
(78, '1303-04314', 'Hose Pipe', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:01:12', '2022-05-24 03:01:12', NULL, NULL, NULL, 5),
(79, '1303-00078', 'Hose Pipe', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:01:38', '2022-05-24 03:01:38', NULL, NULL, NULL, 5),
(80, '1761-00307', 'Clutch Release Pipe', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:02:04', '2022-05-24 03:02:04', NULL, NULL, NULL, 5),
(81, 'KN27000', 'Level Valve SMT', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:02:29', '2022-05-24 03:02:29', NULL, NULL, NULL, 5),
(82, '3774-0001', 'Indicator Assembly', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:02:54', '2022-05-24 03:02:54', NULL, NULL, NULL, 5),
(83, '2214-00100', 'Shaft Cross', 0, 0, 0, 4, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:04:47', '2022-09-06 16:53:50', NULL, NULL, NULL, 5),
(84, '000298', 'Clutch Bearing QJ', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:05:22', '2022-05-24 03:05:22', NULL, NULL, NULL, 5),
(85, '3151000157', 'Clutch Bearing GD', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:05:49', '2022-05-24 03:05:49', NULL, NULL, NULL, 5),
(86, '3151-000928', 'Clutch Bearing ZF New Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:06:36', '2022-05-24 03:06:36', NULL, NULL, NULL, 5),
(87, '7518E', 'Wheel Bearing', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:20:39', '2022-05-24 03:20:39', NULL, NULL, NULL, 8),
(88, '7311E', 'Wheel Bearing', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:21:08', '2022-05-24 03:21:08', NULL, NULL, NULL, 8),
(89, '7313E', 'Wheel Bearing', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:21:42', '2022-05-24 03:21:42', NULL, NULL, NULL, 8),
(90, '32219', 'Wheel Bearing', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:22:13', '2022-05-24 03:22:13', NULL, NULL, NULL, 8),
(91, '2099A', 'Wheel Bearing', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:22:38', '2022-05-24 03:22:38', NULL, NULL, NULL, 8),
(92, '++', 'Brake Pad Textar', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:23:03', '2022-05-24 03:23:03', NULL, NULL, NULL, 5),
(93, '355-01192', 'Brake Pad Old Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:23:32', '2022-05-24 03:23:32', NULL, NULL, NULL, 5),
(94, '3501-01548', 'Brake Pad Rear', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:24:06', '2022-05-24 03:24:06', NULL, NULL, NULL, 6),
(95, '+++', 'Hose Pipe Stallion', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'Stallion', 6, NULL, 2, '2022-05-24 03:25:05', '2022-05-24 03:25:05', NULL, NULL, NULL, 5),
(96, '3514-10-00003', 'Electronic Foot Brake Valve', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:25:32', '2022-05-24 03:25:32', NULL, NULL, NULL, 8),
(97, '3514-00059', 'Foot Brake Valve Old Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 03:26:10', '2022-05-24 03:26:10', NULL, NULL, NULL, 5),
(98, '3527-00042', 'Relay Valve', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:26:34', '2022-05-24 03:26:34', NULL, NULL, NULL, 5),
(99, '1105-00435', 'Lifty Pump Old Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:27:05', '2022-05-24 03:27:05', NULL, NULL, NULL, 5),
(100, '1608-00130', 'Clutch Master Cylinder', 0, 0, 0, 2, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:27:31', '2022-09-06 17:15:56', NULL, NULL, NULL, 5),
(101, '1608-00082', 'Clutch Master Cylinder', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:28:02', '2022-05-24 03:28:02', NULL, NULL, NULL, 5),
(102, '612035541', 'Level Valve New Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'Wabco', 6, NULL, 2, '2022-05-24 03:28:36', '2022-05-24 03:28:36', NULL, NULL, NULL, 5),
(103, '9347144030', 'Four Circuit Relay Valve', 0, 0, 0, 4, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:29:01', '2022-09-06 17:16:47', NULL, NULL, NULL, 5),
(104, '3529-00019', 'Air Dryer Assembly', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:29:27', '2022-05-24 03:29:27', NULL, NULL, NULL, 5),
(105, '1604-00868', 'Clutch Servo Old Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:29:55', '2022-05-24 03:29:55', NULL, NULL, NULL, 5),
(106, '057875301370', 'Clutch Servo', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'Wabco', 6, NULL, 2, '2022-05-24 03:30:21', '2022-05-24 03:30:21', NULL, NULL, NULL, 5),
(107, '3552-00753', 'Rear Brake Leather', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 9, NULL, 2, '2022-05-24 03:30:51', '2022-05-24 03:30:51', NULL, NULL, NULL, 5),
(108, '578-FR', 'Front Brake Leather', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'Stallion', 6, NULL, 2, '2022-05-24 03:31:28', '2022-05-24 03:31:28', NULL, NULL, NULL, 5),
(109, 'G5800-1105240C-4-S', 'Water Separator Filter', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouChai', 6, NULL, 2, '2022-05-24 03:32:05', '2022-05-24 03:32:05', NULL, NULL, NULL, 5),
(110, '1117-00248', 'Fuel Filter', 0, 0, 0, 74, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:32:51', '2022-08-30 13:36:02', NULL, NULL, NULL, 6),
(111, '1012-00171', 'Oil Filter', 0, 0, 0, 49, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:33:17', '2022-08-30 13:28:29', NULL, NULL, NULL, 5),
(112, '0F171', 'Oil Filter', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'Stallion', 6, NULL, 2, '2022-05-24 03:33:43', '2022-05-24 03:33:43', NULL, NULL, NULL, 5),
(113, 'STFF140', 'Fuel Filter', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'Stallion', 6, NULL, 2, '2022-05-24 03:34:12', '2022-05-24 03:34:12', NULL, NULL, NULL, 5),
(114, 'STFF240', 'Water Separator Filter', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'Stallion', 6, NULL, 2, '2022-05-24 03:35:04', '2022-05-24 03:35:04', NULL, NULL, NULL, 5),
(115, '1012-00096', 'Oil Filter', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:35:30', '2022-05-24 03:35:30', NULL, NULL, NULL, 7),
(116, '1105-00159', 'Water Separator Filter YT', 0, 0, 0, 88, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:36:08', '2022-08-30 13:20:09', NULL, NULL, NULL, 5),
(117, '1105-00425', 'Fuel Filter', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:36:40', '2022-05-24 03:36:40', NULL, NULL, NULL, 6),
(118, '1105-00096', 'Fuel Filter Old Model', 0, 0, 0, 99, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:37:11', '2022-08-30 13:32:30', NULL, NULL, NULL, 5),
(119, '1012-00519', 'Oil Filter', 0, 0, 0, 110, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:37:35', '2022-08-30 14:07:27', NULL, NULL, NULL, 6),
(120, '1105-00492', 'Fuel Filter', 0, 0, 0, 10, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:39:10', '2022-08-30 13:48:11', NULL, NULL, NULL, 6),
(121, '1001-07156', 'Engine Front Foundation', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:56:04', '2022-05-24 03:56:04', NULL, NULL, NULL, 5),
(122, '(', 'Air Dryer Filter', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'Wabco', 6, NULL, 2, '2022-05-24 03:56:30', '2022-05-24 03:56:30', NULL, NULL, NULL, 5),
(123, ')', 'Air Dryer Filter', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'Soral', 6, NULL, 2, '2022-05-24 03:57:04', '2022-05-24 03:57:04', NULL, NULL, NULL, 5),
(124, '1607-00265', 'Clutch Pipe', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:57:25', '2022-05-24 03:57:25', NULL, NULL, NULL, 5),
(125, 'HZ/HY723B', 'Brake Adjuster Rear L+R', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:57:54', '2022-05-24 03:57:54', NULL, NULL, NULL, 5),
(126, 'HZ723B', 'Brake Adjuster Rear', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'Stallion', 6, NULL, 2, '2022-05-24 03:58:20', '2022-05-24 03:58:20', NULL, NULL, NULL, 5),
(127, 'HY723B', 'Brake Adjuster Rear', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'Stallion', 6, NULL, 2, '2022-05-24 03:59:00', '2022-05-24 03:59:00', NULL, NULL, NULL, 5),
(128, '))', 'Steering Tank', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:59:29', '2022-05-24 03:59:29', NULL, NULL, NULL, 8),
(129, '8114-00142', 'Condensor Fan', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 03:59:59', '2022-05-24 03:59:59', NULL, NULL, NULL, 5),
(130, '1108-00659', 'Accelerator Paddle', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:00:26', '2022-05-24 04:00:26', NULL, NULL, NULL, 5),
(131, '((', 'Retardor Box QJ', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:00:53', '2022-05-24 04:00:53', NULL, NULL, NULL, 5),
(132, '(((', 'Retardor Box', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:01:23', '2022-05-24 04:01:23', NULL, NULL, NULL, 7),
(133, ')))', 'Retardor Coil ZF', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:01:53', '2022-05-24 04:01:53', NULL, NULL, NULL, 5),
(134, '++++', 'Retardor Coil QJ', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:02:14', '2022-05-24 04:02:14', NULL, NULL, NULL, 5),
(135, 'F-803750.02', 'Rear Wheel Bearing New Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:02:46', '2022-05-24 04:02:46', NULL, NULL, NULL, 5),
(136, '**', 'Clutch Plate', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouChai', 6, NULL, 2, '2022-05-24 04:03:10', '2022-05-24 04:03:10', NULL, NULL, NULL, 5),
(137, '430-10-50.8', 'Clutch Plate', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 9, NULL, 2, '2022-05-24 04:03:42', '2022-05-24 04:03:42', NULL, NULL, NULL, 5),
(138, '1601-01104', 'Clutch Plate', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 04:04:10', '2022-05-24 04:04:10', NULL, NULL, NULL, 5),
(139, '8114-00189', 'AC Clutch Coil Assembly', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:04:37', '2022-05-24 04:04:37', NULL, NULL, NULL, 5),
(140, '1000-02565', 'Crank Shaft Main Pully', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:05:16', '2022-05-24 04:05:16', NULL, NULL, NULL, 5),
(141, '2981-00213', 'U-Bolt', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:05:36', '2022-05-24 04:05:36', NULL, NULL, NULL, 5),
(142, '!', 'Belt 10/35', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'Stallion', 6, NULL, 2, '2022-05-24 04:06:06', '2022-05-24 04:06:06', NULL, NULL, NULL, 5),
(143, '10PK1391-1025-00290', 'Belt', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:06:37', '2022-05-24 04:06:37', NULL, NULL, NULL, 5),
(144, '10PK1500-9405-01719', 'Belt', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:07:03', '2022-05-24 04:07:03', NULL, NULL, NULL, 5),
(145, '1145LA-9405-00253', 'Belt', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:07:29', '2022-05-24 04:07:29', NULL, NULL, NULL, 5),
(146, '10PK1500', 'Belt', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'Stallion', 6, NULL, 2, '2022-05-24 04:08:07', '2022-05-24 04:08:07', NULL, NULL, NULL, 5),
(147, '!!', 'Belt 10/35', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 04:08:46', '2022-05-24 04:08:46', NULL, NULL, NULL, 5),
(148, '9405-00942', 'Belt 19/90', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:09:16', '2022-05-24 04:09:16', NULL, NULL, NULL, 6),
(149, '9405-00940', 'Belt 22/20', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:09:40', '2022-05-24 04:09:40', NULL, NULL, NULL, 5),
(150, '@', 'Main Fuse Box Orange', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:10:16', '2022-05-24 04:10:16', NULL, NULL, NULL, 8),
(151, '!!!', 'Chamber Joint', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:10:37', '2022-05-24 04:10:37', NULL, NULL, NULL, 6),
(152, '1703-01984', 'Gear Cable ZF', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:11:06', '2022-05-24 04:11:06', NULL, NULL, NULL, 5),
(153, '1703-01983', 'Gear Cable ZF', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:11:29', '2022-05-24 04:11:29', NULL, NULL, NULL, 5),
(154, '!!!!', 'Gear Cable Red', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:11:56', '2022-05-24 04:11:56', NULL, NULL, NULL, 5),
(155, '!!!!!', 'Gear Cable Black', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:12:17', '2022-05-24 04:12:17', NULL, NULL, NULL, 5),
(156, '!!!!!!', 'Skylight', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 04:12:52', '2022-05-24 04:12:52', NULL, NULL, NULL, 5),
(157, '1109-03726', 'Air Filter', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 9, NULL, 2, '2022-05-24 04:13:20', '2022-05-24 04:13:20', NULL, NULL, NULL, 5),
(158, '1109-06897', 'Air Filter', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:13:48', '2022-05-24 04:13:48', NULL, NULL, NULL, 6),
(159, '#', 'Rear Brake Leather', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 9, NULL, 2, '2022-05-24 04:14:17', '2022-05-24 04:14:17', NULL, NULL, NULL, 7),
(160, '111-00439', 'Fuel Pump', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 04:14:45', '2022-05-24 04:14:45', NULL, NULL, NULL, 5),
(161, 'MK100-1002106A', 'Liner Set', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouChai', 6, NULL, 2, '2022-05-24 04:15:26', '2022-05-24 04:15:26', NULL, NULL, NULL, 5),
(162, '3519-00666', 'Brake Chamber Rear Right', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:15:51', '2022-05-24 04:15:51', NULL, NULL, NULL, 5),
(163, '3519-00665', 'Brake Chamber Rear Left', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:16:18', '2022-05-24 04:16:18', NULL, NULL, NULL, 5),
(164, 'M60QA-1307100A', 'Water Pump', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouChai', 6, NULL, 2, '2022-05-24 04:16:44', '2022-05-24 04:16:44', NULL, NULL, NULL, 5),
(165, '3501-00114', 'Front Break Disc R', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:17:14', '2022-05-24 04:17:14', NULL, NULL, NULL, 5),
(166, '2919-00349', 'Torque Rod Assembly', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:17:38', '2022-05-24 04:17:38', NULL, NULL, NULL, 5),
(167, 'M60QA-3509-100A', 'Air Compressor', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouChai', 6, NULL, 2, '2022-05-24 04:18:09', '2022-05-24 04:18:09', NULL, NULL, NULL, 5),
(168, 'YK3043UW-2N', 'Air Filter', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouChai', 6, NULL, 2, '2022-05-24 04:18:34', '2022-05-24 04:18:34', NULL, NULL, NULL, 5),
(169, '1601-01103', 'Pressure Plate', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:18:55', '2022-05-24 04:18:55', NULL, NULL, NULL, 5),
(170, '1000-00508', 'Oil Cooler Cover', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 04:19:22', '2022-05-24 04:19:22', NULL, NULL, NULL, 5),
(171, '$', 'Rear Brake Disc R', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:19:42', '2022-05-24 04:19:42', NULL, NULL, NULL, 5),
(172, '3404-00174', 'Steering Assembly', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:20:04', '2022-05-24 04:20:04', NULL, NULL, NULL, 5),
(173, '2931-00754', 'Air Spring', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 9, NULL, 2, '2022-05-24 04:20:30', '2022-05-24 04:20:30', NULL, NULL, NULL, 5),
(174, 'GO100-1002401', 'Belt Tensioner', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 9, NULL, 2, '2022-05-24 04:20:59', '2022-05-24 04:20:59', NULL, NULL, NULL, 5),
(175, '%', 'Fuse Box', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:22:03', '2022-05-24 04:22:03', NULL, NULL, NULL, 5),
(176, '$$', 'Fuse Box Black FT', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:22:28', '2022-05-24 04:22:28', NULL, NULL, NULL, 5),
(177, '35012-01538', 'Brake Pad', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:22:59', '2022-05-24 04:22:59', NULL, NULL, NULL, 7),
(178, '2201-01828', 'Shaft Cross New Model', 0, 0, 0, 1, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 04:23:32', '2022-09-06 16:52:22', NULL, NULL, NULL, 5),
(179, '3412-00245', 'Tie Rod End', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:23:55', '2022-05-24 04:23:55', NULL, NULL, NULL, 5),
(180, '3412-00243', 'Tie Rod End Small', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:24:20', '2022-05-24 04:24:20', NULL, NULL, NULL, 5),
(181, '1297304402', 'Syncro Ring QJ', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:24:46', '2022-05-24 04:24:46', NULL, NULL, NULL, 5),
(182, '^', 'Injector Bosch Refurbished', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:25:07', '2022-05-24 04:25:07', NULL, NULL, NULL, 5),
(183, '9401-05841', 'Wheel Bearing', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:25:27', '2022-05-24 04:25:27', NULL, NULL, NULL, 5),
(184, '9401-05805', 'Wheel Bearing', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:26:00', '2022-05-24 04:26:00', NULL, NULL, NULL, 5),
(185, '&', 'Boot Lock Black Small', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 04:26:24', '2022-05-24 04:26:24', NULL, NULL, NULL, 5),
(186, '*&', 'ABS Sensor', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 04:26:50', '2022-05-24 04:26:50', NULL, NULL, NULL, 5),
(187, '3104-00918', 'Hub Nut', 0, 0, 0, 1, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 04:27:16', '2022-09-06 16:11:43', NULL, NULL, NULL, 5),
(188, '3408-00497', 'Steering Filter', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 04:27:46', '2022-05-24 04:27:46', NULL, NULL, NULL, 5),
(189, '$%', 'Tie Clump', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:28:09', '2022-05-24 04:28:09', NULL, NULL, NULL, 5),
(190, '5940-10482', 'Boot Lock Big New Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:28:53', '2022-05-24 04:28:53', NULL, NULL, NULL, 5),
(191, '5940-01812', 'Boot Lock Big Old Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:29:18', '2022-05-24 04:29:18', NULL, NULL, NULL, 5),
(192, '#@', 'Boot Lock Big Old Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 9, NULL, 2, '2022-05-24 04:29:46', '2022-05-24 04:29:46', NULL, NULL, NULL, 5),
(193, '!@', 'Passenger Door Lock', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:30:07', '2022-05-24 04:30:07', NULL, NULL, NULL, 5),
(194, '1312302057', 'Sliding Sleeve QJ', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:30:40', '2022-05-24 04:30:40', NULL, NULL, NULL, 5),
(195, '115303014', 'Gear 48T', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:31:03', '2022-05-24 04:31:03', NULL, NULL, NULL, 5),
(196, '#@@', 'Gear 59T QJ', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:31:36', '2022-05-24 04:31:36', NULL, NULL, NULL, 5),
(197, '!@#', 'Clump ZT', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:31:54', '2022-05-24 04:31:54', NULL, NULL, NULL, 5),
(198, '__', 'Plunger+ Springs QJ', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:32:16', '2022-05-24 04:32:16', NULL, NULL, NULL, 5),
(199, '+++++', 'Pusher QJ', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 04:32:39', '2022-05-24 04:32:39', NULL, NULL, NULL, 5),
(200, '3524-00886', 'Retarder Switch', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'TALMA', 6, NULL, 2, '2022-05-24 04:33:06', '2022-05-24 04:33:06', NULL, NULL, NULL, 5),
(201, '3103-01072', 'Wheel Nut Cover', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:45:19', '2022-05-24 23:45:19', NULL, NULL, NULL, 5),
(202, '3001-00109', 'Kingpin Bush Old Model', 0, 0, 0, 4, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:45:54', '2022-09-06 16:30:55', NULL, NULL, NULL, 5),
(203, '3001-00108', 'Kingpin Bush Old Model', 0, 0, 0, 4, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:46:25', '2022-09-06 16:30:55', NULL, NULL, NULL, 5),
(204, '3001-01399', 'Kingpin Bush New Model', 0, 0, 0, 11, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:46:57', '2022-09-06 16:28:07', NULL, NULL, NULL, 5),
(205, 'AA', 'Emergency Door Lock', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 23:47:25', '2022-05-24 23:47:25', NULL, NULL, NULL, 5),
(206, 'AB', 'Indicator Small', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:47:51', '2022-05-24 23:47:51', NULL, NULL, NULL, 5),
(207, 'BB', 'Rod Bed Lamp', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 23:48:19', '2022-05-24 23:48:19', NULL, NULL, NULL, 5),
(208, 'ABC', 'Fan Sensor', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 9, NULL, 2, '2022-05-24 23:48:45', '2022-05-24 23:48:45', NULL, NULL, NULL, 5),
(209, '3611-00101', 'Butterfly Sensor', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:49:22', '2022-05-24 23:49:22', NULL, NULL, NULL, 5),
(210, '1766-00520', 'Reverse Switch', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:49:48', '2022-05-24 23:49:48', NULL, NULL, NULL, 5),
(211, '3825-00009', 'Water Level Sensor', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:50:14', '2022-05-24 23:50:14', NULL, NULL, NULL, 5),
(212, 'CC', 'AC Blower Small', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:50:38', '2022-05-24 23:50:38', NULL, NULL, NULL, 5),
(213, 'D', 'Clutch Cover Lock', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:51:02', '2022-05-24 23:51:02', NULL, NULL, NULL, 5),
(214, '32314/YA', 'Wheel Bearing ZXY', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:51:27', '2022-05-24 23:51:27', NULL, NULL, NULL, 5),
(215, '30313/YA', 'Wheel Bearing ZXY', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:51:53', '2022-05-24 23:51:53', NULL, NULL, NULL, 5),
(216, '30311', 'Wheel Bearing ZXY', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:52:19', '2022-05-24 23:52:19', NULL, NULL, NULL, 5),
(217, '32210', 'Wheel Bearing ZXY', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:52:51', '2022-05-24 23:52:51', NULL, NULL, NULL, 5),
(218, '6306-2RS', 'Wheel Bearing ZXY', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:53:20', '2022-05-24 23:53:20', NULL, NULL, NULL, 5),
(219, '6206', 'Wheel Bearing ZXY', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:53:45', '2022-05-24 23:53:45', NULL, NULL, NULL, 5),
(220, '9405-01302', 'Belt Tensioner', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 23:54:09', '2022-05-24 23:54:09', NULL, NULL, NULL, 5),
(221, '9405-01300', 'Belt Tensioner', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-24 23:54:40', '2022-05-24 23:54:40', NULL, NULL, NULL, 5),
(222, 'E', 'AC Panel', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:55:18', '2022-05-24 23:55:18', NULL, NULL, NULL, 8),
(223, '3103-00395', 'Rear Wheel Nut Silver New Model', 0, 0, 0, 10, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:55:47', '2022-08-30 16:44:28', NULL, NULL, NULL, 5),
(224, 'F', 'Front Wheel Nut Black New Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:57:20', '2022-05-24 23:57:20', NULL, NULL, NULL, 5),
(225, 'G', 'Front Wheel Nut Black Old Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:58:23', '2022-05-24 23:58:23', NULL, NULL, NULL, 5),
(226, 'H', 'U-Bolt Nut', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:58:43', '2022-05-24 23:58:43', NULL, NULL, NULL, 5),
(227, 'I', 'Front Wheel Nut Silver New Model', 0, 0, 0, 14, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:59:15', '2022-08-30 17:15:42', NULL, NULL, NULL, 5),
(228, '3114-00210', 'Front Wheel Bolt Black', 0, 0, 0, 13, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-24 23:59:46', '2022-08-30 16:53:08', NULL, NULL, NULL, 6),
(229, 'K', 'Front Wheel Bolt Old Model', 0, 0, 0, 7, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:00:21', '2022-08-30 17:19:32', NULL, NULL, NULL, 5),
(230, '3104-00558', 'Rear Wheel Bolt Old Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:00:51', '2022-05-25 00:00:51', NULL, NULL, NULL, 5),
(231, '3104-00750', 'Rear Wheel Bolt New Model', 0, 0, 0, 10, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:01:31', '2022-08-30 16:59:03', NULL, NULL, NULL, 5),
(232, 'L', 'Rocker Switch', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-25 00:47:37', '2022-05-25 00:47:37', NULL, NULL, NULL, 5),
(233, '5940-07445', 'Boot Lock Black Small', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:48:07', '2022-05-25 00:48:07', NULL, NULL, NULL, 5),
(234, '2935-00215', 'Jumper Rod Bush Big', 0, 0, 0, 17, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:49:15', '2022-08-30 16:27:57', NULL, NULL, NULL, 5),
(235, '2935-00239', 'Jumper Rod Bush Small', 0, 0, 0, 27, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:50:17', '2022-08-30 16:32:22', NULL, NULL, NULL, 5),
(236, 'M', 'Commutator Big', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:51:08', '2022-05-25 00:51:08', NULL, NULL, NULL, 5),
(237, 'MM', 'Commutator Small', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:51:29', '2022-05-25 00:51:29', NULL, NULL, NULL, 5),
(238, 'N', 'Carbon Bush Big', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:51:52', '2022-05-25 00:51:52', NULL, NULL, NULL, 5),
(239, 'O', 'Carbon Bush Small', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:52:15', '2022-05-25 00:52:15', NULL, NULL, NULL, 5),
(240, 'P', 'Filter Set', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:52:40', '2022-05-25 00:52:40', NULL, NULL, NULL, 6),
(241, '3631-00039', 'Retarder Stick', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:53:07', '2022-05-25 00:53:07', NULL, NULL, NULL, 5),
(242, '3552-00852', 'Wheel Spring Rear', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:53:43', '2022-05-25 00:53:43', NULL, NULL, NULL, 5),
(243, 'Q', 'Front Logo', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-25 00:54:17', '2022-05-25 00:54:17', NULL, NULL, NULL, 5),
(244, '3101-00493', 'Inner Wheel Nosel', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:54:46', '2022-05-25 00:54:46', NULL, NULL, NULL, 5),
(245, 'Z', 'Ignition Switch', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:55:11', '2022-05-25 00:55:11', NULL, NULL, NULL, 8),
(246, 'ZZ', 'Rear Brake Chamber', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:55:37', '2022-05-25 00:55:37', NULL, NULL, NULL, 8),
(247, 'X', 'Door Rod Assembly Local', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:56:04', '2022-05-25 00:56:04', NULL, NULL, NULL, 5),
(248, 'Y', 'Gear Rod Assembly QJ', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:56:34', '2022-05-25 00:56:34', NULL, NULL, NULL, 5),
(249, '1703-00955', 'Gear Cable Endy QJ', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:57:09', '2022-05-25 00:57:09', NULL, NULL, NULL, 5),
(250, '1703-02210', 'Gear Rod Endy QJ', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:57:35', '2022-05-25 00:57:35', NULL, NULL, NULL, 5),
(251, '1703-02211', 'Gear Rod Endy QJ', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:58:05', '2022-05-25 00:58:05', NULL, NULL, NULL, 5),
(252, 'R', 'Rear Engine Foundation', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 00:58:34', '2022-05-25 00:58:34', NULL, NULL, NULL, 5),
(253, 'WW', 'Wiper Blade Old Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 9, NULL, 2, '2022-05-25 00:59:25', '2022-05-25 00:59:25', NULL, NULL, NULL, 5),
(254, 'WWW', 'Wiper Blade Old Model', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 01:00:00', '2022-05-25 01:00:00', NULL, NULL, NULL, 5),
(255, '5205-01104', 'Wiper Arm Left', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 01:00:30', '2022-05-25 01:00:30', NULL, NULL, NULL, 5),
(256, '5205-01105', 'Wiper Arm Right', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 01:00:59', '2022-05-25 01:00:59', NULL, NULL, NULL, 5),
(257, '5205-00635', 'Wiper Blade', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 01:01:27', '2022-05-25 01:01:27', NULL, NULL, NULL, 6),
(258, '5205-01322', 'Wiper Arm Right', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 01:02:01', '2022-05-25 01:02:01', NULL, NULL, NULL, 6),
(259, '5205-01321', 'Wiper Arm Left', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 01:02:34', '2022-05-25 01:02:34', NULL, NULL, NULL, 5),
(260, 'WT', 'Wooden Trim', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, 'YouTong', 6, NULL, 2, '2022-05-25 01:03:02', '2022-05-25 01:03:02', NULL, NULL, NULL, 5),
(261, 'FLR', 'Front Light Right', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-05-25 01:03:33', '2022-05-25 01:03:33', NULL, NULL, NULL, 6),
(273, '1133-00010', 'Water Separator Filter', 0, 0, 2, 4, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-08-30 14:16:08', '2022-08-30 14:16:43', NULL, NULL, NULL, 7),
(274, '1133-00017', 'Fuel Filter', 0, 0, 0, 2, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-08-30 14:18:26', '2022-08-30 14:19:08', NULL, NULL, NULL, 7),
(275, '2919-00054', 'Torque Rod Bush - Small', 0, 0, 0, 4, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-08-30 14:27:10', '2022-08-30 14:27:41', NULL, NULL, NULL, 5),
(276, '2935-00215H', 'Jumper Rod Bush - Big', 0, 0, 0, 4, NULL, '[null]', NULL, NULL, NULL, 9, NULL, 2, '2022-08-30 16:27:02', '2022-08-30 16:28:21', NULL, NULL, NULL, 5),
(277, '2935-00239H', 'Jumper Rod Bush - Small', 0, 0, 0, 17, NULL, '[null]', NULL, NULL, NULL, 9, NULL, 2, '2022-08-30 16:30:31', '2022-08-30 16:31:27', NULL, NULL, NULL, 5),
(278, '3103-00395H', 'Rear Wheel Nut Silver New Model', 0, 0, 0, 40, NULL, '[null]', NULL, NULL, NULL, 9, NULL, 2, '2022-08-30 16:35:09', '2022-08-30 16:39:38', NULL, NULL, NULL, 5),
(279, 'rear wheel nut black new model', 'Rear Wheel Nut Black New Model', 0, 0, 0, 8, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-08-30 17:21:12', '2022-08-30 17:22:35', NULL, NULL, NULL, 5),
(280, '3001-01399H', 'Kingpin Bush New Model', 0, 0, 0, 4, NULL, '[null]', NULL, NULL, NULL, 9, NULL, 2, '2022-09-06 16:21:09', '2022-09-06 16:28:07', NULL, NULL, NULL, 5),
(281, '2214-00100H', 'Cross Shaft', 0, 0, 0, 0, NULL, '[null]', NULL, NULL, NULL, 9, NULL, 2, '2022-09-06 16:33:49', '2022-09-06 16:44:02', NULL, NULL, NULL, 5),
(282, '2201-01828h', 'Cross Shaft New Model', 0, 0, 0, 3, NULL, '[null]', NULL, NULL, NULL, 9, NULL, 2, '2022-09-06 16:50:57', '2022-09-06 16:52:22', NULL, NULL, NULL, 5),
(283, '3001-01434', 'Kingpin New Model', 0, 0, 0, 2, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-09-06 17:05:35', '2022-09-06 17:05:59', NULL, NULL, NULL, 5),
(284, '--', 'Front Torque Rod Bush', 0, 0, 0, 4, NULL, '[null]', NULL, NULL, NULL, 6, NULL, 2, '2022-09-06 17:07:12', '2022-09-06 17:07:31', NULL, NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(6, 'Geniune', 1, '2022-05-17 15:38:04', '2022-05-17 15:38:04'),
(8, 'Replacement', 1, '2022-05-17 15:38:15', '2022-05-17 15:38:15'),
(9, 'Copy', 1, '2022-05-17 15:38:28', '2022-05-17 15:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `product_models`
--

CREATE TABLE `product_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_models`
--

INSERT INTO `product_models` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(5, 'Single Glass 6122', 2, '2022-05-17 15:39:16', '2022-05-17 15:39:16'),
(6, 'Double Glass 6127', 2, '2022-05-17 15:39:31', '2022-05-17 15:39:31'),
(7, 'Mini Youtong 6858', 2, '2022-05-17 15:39:49', '2022-05-17 15:39:49'),
(8, 'ZongTong', 2, '2022-05-24 03:09:03', '2022-05-24 03:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_categories`
--

CREATE TABLE `product_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile_image_icon.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile_image_icon.png',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `balance` int(11) NOT NULL DEFAULT 0,
  `opening_balance` int(11) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `phone`, `address`, `email`, `profile_image`, `type`, `status`, `balance`, `opening_balance`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 'NAT Autos', NULL, NULL, NULL, 'profile_image_icon.png', 'Credit', 'Active', 21675, 0, 2, '2022-05-09 13:39:15', '2022-08-30 17:19:32'),
(4, 'Sardar & Sons', NULL, NULL, NULL, 'profile_image_icon.png', 'Credit', 'Active', 1075181, 0, 2, '2022-05-09 13:39:26', '2022-09-06 17:15:56'),
(5, 'Arslan', NULL, NULL, 'abc@xyz.com', 'profile_image_icon.png', 'Credit', 'Active', -10000, 0, 2, '2022-05-10 22:59:45', '2022-07-03 22:39:23'),
(6, 'Qasim', NULL, NULL, NULL, 'profile_image_icon.png', 'Credit', 'Active', 60000, 0, 2, '2022-06-25 15:48:39', '2022-07-03 22:08:37'),
(9, 'Ali', NULL, NULL, NULL, 'profile_image_icon.png', 'Credit', 'Active', 0, 0, 2, '2022-07-18 10:00:22', '2022-07-18 10:03:25'),
(10, 'Ahmed', NULL, NULL, NULL, 'profile_image_icon.png', 'Credit', 'Active', 0, 0, 2, '2022-07-20 11:57:59', '2022-08-08 14:45:29'),
(11, 'Jamal Corporation', NULL, NULL, NULL, 'profile_image_icon.png', 'Credit', 'Active', 42000, 0, 2, '2022-08-30 14:25:43', '2022-08-30 17:22:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_created_by_foreign` (`created_by`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_created_by_foreign` (`created_by`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_created_by_foreign` (`created_by`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_account_id_foreign` (`account_id`),
  ADD KEY `expenses_expense_category_id_foreign` (`expense_category_id`),
  ADD KEY `expenses_created_by_foreign` (`created_by`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_categories_created_by_foreign` (`created_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_customer_id_foreign` (`customer_id`),
  ADD KEY `invoices_vendor_id_foreign` (`vendor_id`),
  ADD KEY `invoices_created_by_foreign` (`created_by`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_details_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoice_details_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_invoice_id_foreign` (`invoice_id`),
  ADD KEY `payments_expense_id_foreign` (`expense_id`),
  ADD KEY `payments_account_id_foreign` (`account_id`),
  ADD KEY `payments_created_by_foreign` (`created_by`),
  ADD KEY `payments_employee_id_foreign` (`employee_id`),
  ADD KEY `payments_customer_id_foreign` (`customer_id`),
  ADD KEY `payments_vendor_id_foreign` (`vendor_id`);

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
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`),
  ADD KEY `products_product_subcategory_id_foreign` (`product_subcategory_id`),
  ADD KEY `products_created_by_foreign` (`created_by`),
  ADD KEY `products_product_model_id_foreign` (`product_model_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_created_by_foreign` (`created_by`);

--
-- Indexes for table `product_models`
--
ALTER TABLE `product_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_models_created_by_foreign` (`created_by`);

--
-- Indexes for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sub_categories_product_category_id_foreign` (`product_category_id`),
  ADD KEY `product_sub_categories_created_by_foreign` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendors_created_by_foreign` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_models`
--
ALTER TABLE `product_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `expenses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `expenses_expense_category_id_foreign` FOREIGN KEY (`expense_category_id`) REFERENCES `expense_categories` (`id`);

--
-- Constraints for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD CONSTRAINT `expense_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `invoices_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `invoices_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_details_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `payments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `payments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `payments_expense_id_foreign` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`),
  ADD CONSTRAINT `payments_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `products_product_model_id_foreign` FOREIGN KEY (`product_model_id`) REFERENCES `product_models` (`id`),
  ADD CONSTRAINT `products_product_subcategory_id_foreign` FOREIGN KEY (`product_subcategory_id`) REFERENCES `product_sub_categories` (`id`);

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `product_models`
--
ALTER TABLE `product_models`
  ADD CONSTRAINT `product_models_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  ADD CONSTRAINT `product_sub_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `product_sub_categories_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`);

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
