-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2024 at 07:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `extraschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_id`, `admin_name`, `username`, `password`, `is_admin`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'admn1', 'GrandLady', 'admin', '$2y$12$sRm6T/0l6E7RZPHjpfZ1JO7mWcn6utWeYKiWggbLgtD.r4O/xQhoS', 1, 1, 0, '2024-01-22 14:11:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_ledgers`
--

CREATE TABLE `admin_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_ledger_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consolidate_order_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `affected_date` datetime DEFAULT NULL,
  `number` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `particulars` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `narration` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in` decimal(10,2) NOT NULL DEFAULT 0.00,
  `out` decimal(10,2) NOT NULL DEFAULT 0.00,
  `balance` decimal(10,2) DEFAULT NULL,
  `opening_balance` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_ledgers`
--

INSERT INTO `admin_ledgers` (`id`, `admin_ledger_id`, `coordinator_id`, `consolidate_order_id`, `order_id`, `date`, `affected_date`, `number`, `particulars`, `narration`, `in`, `out`, `balance`, `opening_balance`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(4, 'aled4', 'cord4', 'cons1', NULL, '2024-02-13 17:43:06', NULL, NULL, NULL, NULL, '0.00', '8989.00', NULL, 0, 1, 0, '2024-02-13 12:13:06', '2024-02-13 12:13:06'),
(5, 'aled5', 'cord4', 'cons1', NULL, '2024-02-13 17:44:38', NULL, NULL, NULL, NULL, '0.00', '9000.00', NULL, 0, 1, 0, '2024-02-13 12:14:38', '2024-02-13 12:14:38'),
(6, 'aled6', 'cord4', 'cons3', NULL, '2024-02-13 17:46:27', NULL, NULL, NULL, NULL, '0.00', '3790.00', NULL, 0, 1, 0, '2024-02-13 12:16:27', '2024-02-13 12:16:27'),
(7, 'aled7', 'cord4', NULL, NULL, '2024-02-14 15:41:41', NULL, NULL, NULL, NULL, '1500.00', '0.00', NULL, 0, 1, 0, '2024-02-14 10:11:41', '2024-02-14 10:11:41'),
(8, 'aled8', 'cord4', NULL, NULL, '2024-02-14 15:43:13', NULL, NULL, NULL, NULL, '500.00', '0.00', NULL, 0, 1, 0, '2024-02-14 10:13:13', '2024-02-14 10:13:13'),
(9, 'aled9', 'cord2', NULL, NULL, '2024-02-14 15:44:32', NULL, NULL, NULL, NULL, '25000.00', '0.00', NULL, 0, 1, 0, '2024-02-14 10:14:32', '2024-02-14 10:14:32'),
(10, 'aled10', 'cord4', NULL, NULL, '2024-02-14 16:19:40', NULL, NULL, NULL, NULL, '1500.00', '0.00', NULL, 0, 1, 0, '2024-02-14 10:49:40', '2024-02-14 10:49:40'),
(11, 'aled11', 'cord2', NULL, NULL, '2024-02-14 17:43:25', NULL, NULL, NULL, NULL, '2390.00', '0.00', NULL, 0, 1, 0, '2024-02-14 12:13:25', '2024-02-14 12:13:25'),
(12, 'aled12', 'cord4', NULL, NULL, '2024-02-16 12:05:26', NULL, NULL, NULL, NULL, '4500.00', '0.00', NULL, 0, 1, 0, '2024-02-16 06:35:26', '2024-02-16 06:35:26'),
(13, 'aled13', 'cord4', NULL, NULL, '2024-02-20 16:06:20', NULL, NULL, NULL, NULL, '2300.00', '0.00', NULL, 0, 1, 0, '2024-02-20 10:36:20', '2024-02-20 10:36:20'),
(14, 'aled14', 'cord5', NULL, NULL, '2024-02-22 06:11:44', NULL, NULL, NULL, NULL, '8500.00', '0.00', NULL, 0, 1, 0, '2024-02-22 00:41:44', '2024-02-22 00:41:44'),
(15, 'aled15', 'cord2', NULL, NULL, '2024-02-22 06:12:49', NULL, NULL, NULL, NULL, '74.00', '0.00', NULL, 0, 1, 0, '2024-02-22 00:42:49', '2024-02-22 00:42:49'),
(17, 'aled16', 'cord6', NULL, NULL, NULL, '2024-02-24 22:24:54', NULL, NULL, NULL, '-4200.00', '0.00', '-4200.00', 1, 1, 0, '2024-02-24 16:54:54', '2024-02-24 16:54:54'),
(18, 'aled18', 'cord6', NULL, NULL, '2024-02-23 00:00:00', '2024-02-24 23:08:34', NULL, 'receipt', 'here is another particulars', '2500.00', '0.00', '-1700.00', 0, 1, 0, '2024-02-24 17:38:34', '2024-02-24 17:38:34'),
(19, 'aled19', 'cord18', NULL, NULL, NULL, '2024-02-27 20:06:48', NULL, NULL, NULL, '2000.00', '0.00', '2000.00', 1, 1, 0, '2024-02-27 14:36:48', '2024-02-27 14:36:48'),
(20, 'aled20', 'cord18', 'cons6', NULL, NULL, '2024-02-27 21:13:39', NULL, 'bill', NULL, '1500.00', '0.00', NULL, 0, 1, 0, '2024-02-27 15:43:39', '2024-02-27 15:43:39'),
(21, 'aled21', 'cord19', NULL, NULL, NULL, '2024-02-27 21:48:27', NULL, NULL, NULL, '5000.00', '0.00', '5000.00', 1, 1, 0, '2024-02-27 16:18:27', '2024-02-27 16:18:27'),
(22, 'aled22', 'cord19', 'cons7', NULL, NULL, '2024-02-27 21:51:19', NULL, 'bill', NULL, '2900.00', '0.00', '7900.00', 0, 1, 0, '2024-02-27 16:21:19', '2024-02-27 16:21:19'),
(23, 'aled23', 'cord19', NULL, NULL, '2024-02-26 00:00:00', '2024-02-27 21:52:44', NULL, 'receipt', 'here is another particulars', '0.00', '3500.00', '4400.00', 0, 1, 0, '2024-02-27 16:22:44', '2024-02-27 16:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `admin_resources`
--

CREATE TABLE `admin_resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_resource_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_details` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_resources`
--

INSERT INTO `admin_resources` (`id`, `admin_resource_id`, `file_name`, `file_details`, `file_path`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'ares1', 'file one', '1 detais', 'project_uploads/admin_resource/1707991524_deshmukh.jpg', 1, 0, '2024-02-15 10:05:24', '2024-02-15 10:05:24'),
(2, 'ares2', 'file 2', '2 nd', 'project_uploads/admin_resource/1707991534_Abstract 6.png', 1, 0, '2024-02-15 10:05:34', '2024-02-15 10:05:34'),
(3, 'ares3', 'file 3', '3', 'project_uploads/admin_resource/1707991553_Document.docx.pdf', 1, 0, '2024-02-15 10:05:53', '2024-02-15 10:05:53'),
(4, 'ares4', 'anoher one', 'llllllllllllllllllllllllllllllllloooooooooooooooooooooooonnnnnnnnnnnng ttttttttttesssssssssst', 'project_uploads/admin_resource/1707992093_deshmukh.jpg', 1, 0, '2024-02-15 10:14:53', '2024-02-15 10:14:53'),
(5, 'ares5', 'file onppppp', '2 ndhnjnj', 'project_uploads/admin_resource/1708407026_ths is file 3.jpeg', 1, 0, '2024-02-20 05:30:26', '2024-02-20 05:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `assign_examiner_to_users`
--

CREATE TABLE `assign_examiner_to_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_examiner_to_user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examiner_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_examiner_to_users`
--

INSERT INTO `assign_examiner_to_users` (`id`, `assign_examiner_to_user_id`, `user_type`, `user_id`, `examiner_id`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'aexn1', 'coordinator', 'cord2', 'exnr5,exnr1,exnr2,exnr4,exnr2,exnr3', 1, 0, '2024-02-29 05:32:50', '2024-02-29 06:25:11'),
(2, 'aexn2', 'coordinator', 'cord3', 'exnr5,exnr1,exnr4', 1, 0, '2024-02-29 06:24:24', '2024-02-29 06:31:09'),
(3, 'aexn3', 'coordinator', 'cord4', 'exnr5,exnr4,exnr3', 1, 0, '2024-02-29 07:41:55', '2024-02-29 07:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_id`, `state_id`, `city`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'city1', 'stat1', 'kalady', 1, 0, '2024-01-09 06:12:57', '2024-01-09 06:12:57'),
(2, 'city2', 'stat2', 'anddddra', 1, 0, '2024-01-09 06:13:13', '2024-01-09 06:13:13'),
(3, 'city3', 'stat1', 'angamali', 1, 0, '2024-01-09 06:14:32', '2024-01-09 06:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `school_id`, `school_name`, `email`, `mobile`, `address`, `country`, `state`, `city`, `pincode`, `registered`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'schl1', 'Ganapathy Vilasam High School', 'goodwin@gmail.com', '9658955452', 'koovappady', 'cont1', 'stat1', 'city1', 'pcode1', 0, 1, 0, '2024-01-10 01:15:49', '2024-01-10 01:15:49'),
(2, 'schl2', 'MGM HSS', 'mgm@gmail.com', '8987854258', 'kuruppamapady', 'cont1', 'stat1', 'city3', 'pcode2', 1, 1, 0, '2024-01-10 01:20:10', '2024-01-10 01:20:10'),
(3, 'schl3', 'LP school koovappady', 'otherf54@gmail.com', '987458562', 'koovappady', 'cont1', 'stat1', 'city1', 'pcode1', 1, 1, 0, '2024-01-10 01:29:11', '2024-01-10 01:29:11'),
(4, 'schl4', 'okkal sreenarayana hss school', 'okkalsreee@gmail.com', '9856985488', 'okkal po okkal', 'cont1', 'stat1', 'city1', 'pcode1', 1, 1, 0, '2024-01-27 16:01:45', '2024-01-27 16:01:45'),
(5, 'schl5', 'vidyajyothi high school', 'vj@g.v', '8987854258', 'perumbavoor po address herer', 'cont1', 'stat1', 'city1', 'pcode1', 1, 1, 0, '2024-02-16 05:51:39', '2024-02-16 05:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_id`, `class`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'class1', 'class one', 1, 0, '2023-12-29 04:40:35', '2023-12-29 04:40:35'),
(2, 'class2', 'class two', 1, 0, '2023-12-29 04:40:41', '2023-12-29 04:40:41'),
(3, 'class3', 'class three', 1, 0, '2023-12-29 04:40:46', '2023-12-29 04:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `consolidate_orders`
--

CREATE TABLE `consolidate_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consolidate_order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `shipping_address_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `godown_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `executive_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `executed_date` datetime DEFAULT NULL,
  `courier_date` datetime DEFAULT NULL,
  `tracking_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_of_delivery` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `completed` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consolidate_orders`
--

INSERT INTO `consolidate_orders` (`id`, `consolidate_order_id`, `coordinator_id`, `order_id`, `order_date`, `shipping_address_id`, `godown_id`, `executive_name`, `executed_date`, `courier_date`, `tracking_id`, `method_of_delivery`, `remark`, `order_status`, `completed`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'cons1', 'cord4', 'ORD-835cdbc1-479c-4d5a-98c2-4f0f93afae5c', '2024-02-12', 'ship1', 'godn1', 'anil kumar ng', '2024-02-12 17:52:52', '2024-02-12 18:09:07', 'track784585965', 'by car now', 'fchcfh', 'received', 1, 1, 0, '2024-02-12 12:22:24', '2024-02-13 12:14:38'),
(2, 'cons2', 'cord4', 'ORD-e3160b3a-352e-4138-87f8-97901c5b51ec', '2024-02-13', 'ship1', 'godn3', 'adithyan mohan', '2024-02-13 14:21:18', NULL, NULL, NULL, NULL, 'dispatch', 0, 1, 0, '2024-02-13 08:46:54', '2024-02-13 08:51:18'),
(3, 'cons3', 'cord4', 'ORD-fa09967d-69d5-44d8-8081-c029d2e06458', '2024-02-13', 'ship1', 'godn3', 'anil kumar ng', '2024-02-13 17:09:16', '2024-02-13 17:10:15', 'track7845859659999', 'by bus', 'nrew source remark', 'received', 1, 1, 0, '2024-02-13 11:38:38', '2024-02-13 12:16:27'),
(4, 'cons4', 'cord4', 'ORD-454fc51e-e13c-4906-b813-ac3fd689f809', '2024-02-16', 'ship1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', 0, 1, 0, '2024-02-16 06:37:53', '2024-02-16 06:37:53'),
(5, 'cons5', 'cord4', 'ORD-240b1b46-d0b2-4ace-a609-571be077c9f0', '2024-02-22', 'ship1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', 0, 1, 0, '2024-02-22 00:19:44', '2024-02-22 00:19:44'),
(6, 'cons6', 'cord18', 'ORD-65f22371-0d04-4c13-98e9-5665a0cdba06', '2024-02-27', 'ship4', 'godn1', 'anil kumar ng', '2024-02-27 21:12:20', '2024-02-27 21:13:18', 'track7845859659999', 'by car now', 'nrew source remark', 'received', 1, 1, 0, '2024-02-27 15:40:11', '2024-02-27 15:43:38'),
(7, 'cons7', 'cord19', 'ORD-d364b65c-cbca-4514-b76d-138eccc8fb87', '2024-02-27', 'ship5', 'godn1', 'adarsh', '2024-02-27 21:50:30', '2024-02-27 21:51:05', 'track7845859659999', 'by car now', 'nrew source remark', 'received', 1, 1, 0, '2024-02-27 16:19:39', '2024-02-27 16:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `coordinators`
--

CREATE TABLE `coordinators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinator_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_balance` decimal(10,2) DEFAULT NULL,
  `prefix_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coordinators`
--

INSERT INTO `coordinators` (`id`, `coordinator_id`, `coordinator_name`, `username`, `mobile`, `email`, `opening_balance`, `prefix_number`, `password`, `city_id`, `state_id`, `country_id`, `pincode_id`, `address`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'cord1', 'ajay dev', 'ajaydev', '9658955452', 'ajay@gmail.com', NULL, NULL, '$2y$12$hi8zHCF6evfXWbGWvvUMIOQBjfpYQ8TkX4peBgSsPT.pmg4YUgd7m', 'city3', 'stat1', 'cont1', 'pcode2', 'ssssss', 0, 0, '2024-01-04 11:02:42', '2024-01-04 11:02:42'),
(2, 'cord2', 'sajid', 'sajidusername', '987458562', 'sajid@gmail.com', NULL, NULL, '$2y$12$M7csHWeb97bKG.9YfYJmLuJmRRcQ6ANXHDlB.4COpHgVMzCgZ0MPq', 'city1', 'stat1', 'cont1', 'pcode1', 'zzsfsfszfsd', 1, 0, '2024-01-27 14:33:45', '2024-01-27 14:33:45'),
(3, 'cord3', 'adithyan', 'adithyan46', '95460235684', 'adithyan46@gmail.com', NULL, NULL, '$2y$12$OKqhRgwHeN6uRdn2K.F0G.h8rjV7ae1V0qU9iXxx3uzc5z2YsE87S', 'city1', 'stat1', 'cont1', 'pcode2', 'thuravakkath', 1, 0, '2024-01-27 15:10:30', '2024-01-27 15:10:30'),
(4, 'cord4', 'sibin samuvaledited', 'sibin', '965895599986', 'sibin@gmail.com', NULL, NULL, '$2y$12$hi8zHCF6evfXWbGWvvUMIOQBjfpYQ8TkX4peBgSsPT.pmg4YUgd7m', 'city3', 'stat1', 'cont1', 'pcode2', 'sibin house vaolllam is here edired', 1, 0, '2024-01-27 15:30:50', '2024-02-01 07:36:06'),
(5, 'cord5', 'merinn', 'adminm', '9658955452', 'ribin@gmail.com', NULL, NULL, '$2y$12$6Gg2ctBjxGhHewF.6kigcuFumjZ5JSfuno89gHN0Wj2DKDrY35e.2', 'city1', 'stat1', 'cont1', 'pcode2', 'zzsfsfszfsd', 1, 0, '2024-02-20 09:39:25', '2024-02-20 09:39:25'),
(17, 'cord6', 'ajith', 'aj', '987458562', 'adithya@g.v', '-4200.00', 'ajiy', '$2y$12$ZzSDXiLhdhins9uvParG6enMFND5akVxEz96lKR0gfQ9ExBvoJC/e', 'city1', 'stat1', 'cont1', 'pcode1', 'zzsfsfszfsd', 1, 0, '2024-02-24 16:54:54', '2024-02-24 16:54:54'),
(18, 'cord18', 'rajesh kr', 'rj', '8987854258', 'rj@gmail.com', '2000.00', 'rjabc', '$2y$12$LHQWUqihSke.jOZj.6H2ku8lGDKOUD7p94RDaDouxJv3/Cer4LEV2', 'city1', 'stat1', 'cont1', 'pcode1', 'koovappady', 1, 0, '2024-02-27 14:36:48', '2024-02-27 14:36:48'),
(19, 'cord19', 'anju ms', 'ms', '9658955452', 'rk47c4@gmail.com', '5000.00', 'anjums', '$2y$12$M.wTwd9SHN9NR2XeAn4TVued1VBQ0/JasUNBqMESYRKi9aAfi6NKm', 'city1', 'stat1', 'cont1', 'pcode1', 'thuravakkath', 1, 0, '2024-02-27 16:18:27', '2024-02-27 16:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `coordinator_orders`
--

CREATE TABLE `coordinator_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coordinator_order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consolidate_order_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_category_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `processed` int(11) NOT NULL DEFAULT 0,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coordinator_orders`
--

INSERT INTO `coordinator_orders` (`id`, `coordinator_order_id`, `consolidate_order_id`, `coordinator_id`, `order_id`, `material_id`, `product_id`, `material_category_id`, `class_id`, `quantity`, `amount`, `total_amount`, `status`, `processed`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'ordr1', 'cons1', 'cord4', 'ORD-835cdbc1-479c-4d5a-98c2-4f0f93afae5c', 'mate1', 'prod2', 'mcat1', 'class1', 15, '100.00', '1500.00', 1, 1, 0, '2024-02-12 12:22:09', '2024-02-12 12:22:52'),
(2, 'ordr2', 'cons1', 'cord4', 'ORD-835cdbc1-479c-4d5a-98c2-4f0f93afae5c', 'mate2', 'prod2', 'mcat1', 'class2', 20, '200.00', '4000.00', 1, 1, 0, '2024-02-12 12:22:09', '2024-02-12 12:22:52'),
(3, 'ordr3', 'cons1', 'cord4', 'ORD-835cdbc1-479c-4d5a-98c2-4f0f93afae5c', 'mate3', 'prod2', 'mcat1', 'class3', 25, '140.00', '3500.00', 1, 1, 0, '2024-02-12 12:22:09', '2024-02-12 12:22:52'),
(4, 'ordr4', 'cons2', 'cord4', 'ORD-e3160b3a-352e-4138-87f8-97901c5b51ec', 'mate1', 'prod2', 'mcat1', 'class1', 5, '100.00', '500.00', 1, 1, 0, '2024-02-13 08:46:33', '2024-02-13 08:51:18'),
(5, 'ordr5', 'cons2', 'cord4', 'ORD-e3160b3a-352e-4138-87f8-97901c5b51ec', 'mate2', 'prod2', 'mcat1', 'class2', 10, '300.00', '3000.00', 1, 1, 0, '2024-02-13 08:46:33', '2024-02-13 08:51:18'),
(6, 'ordr6', 'cons2', 'cord4', 'ORD-e3160b3a-352e-4138-87f8-97901c5b51ec', 'mate3', 'prod2', 'mcat1', 'class3', 15, '4000.00', '60000.00', 1, 1, 0, '2024-02-13 08:46:33', '2024-02-13 08:51:18'),
(7, 'ordr7', 'cons3', 'cord4', 'ORD-fa09967d-69d5-44d8-8081-c029d2e06458', 'mate1', 'prod2', 'mcat1', 'class1', 7, '120.00', '840.00', 1, 1, 0, '2024-02-13 11:38:23', '2024-02-13 11:39:16'),
(8, 'ordr8', 'cons3', 'cord4', 'ORD-fa09967d-69d5-44d8-8081-c029d2e06458', 'mate2', 'prod2', 'mcat1', 'class2', 8, '200.00', '1600.00', 1, 1, 0, '2024-02-13 11:38:23', '2024-02-13 11:39:16'),
(9, 'ordr9', 'cons3', 'cord4', 'ORD-fa09967d-69d5-44d8-8081-c029d2e06458', 'mate3', 'prod2', 'mcat1', 'class3', 9, '150.00', '1350.00', 1, 1, 0, '2024-02-13 11:38:23', '2024-02-13 11:39:16'),
(10, 'ordr10', 'cons4', 'cord4', 'ORD-454fc51e-e13c-4906-b813-ac3fd689f809', 'mate1', 'prod2', 'mcat1', 'class1', 2, '100.00', '200.00', 1, 1, 0, '2024-02-16 06:37:39', '2024-02-16 06:37:53'),
(11, 'ordr11', 'cons4', 'cord4', 'ORD-454fc51e-e13c-4906-b813-ac3fd689f809', 'mate2', 'prod2', 'mcat1', 'class2', 3, '200.00', '600.00', 1, 1, 0, '2024-02-16 06:37:39', '2024-02-16 06:37:53'),
(12, 'ordr12', 'cons4', 'cord4', 'ORD-454fc51e-e13c-4906-b813-ac3fd689f809', 'mate3', 'prod2', 'mcat1', 'class3', 4, '140.00', '560.00', 1, 1, 0, '2024-02-16 06:37:39', '2024-02-16 06:37:53'),
(13, 'ordr13', NULL, 'cord4', NULL, 'mate1', 'prod2', 'mcat1', 'class1', 20, '100.00', '2000.00', 0, 0, 1, '2024-02-22 00:11:39', '2024-02-22 00:11:42'),
(14, 'ordr14', 'cons5', 'cord4', 'ORD-240b1b46-d0b2-4ace-a609-571be077c9f0', 'mate2', 'prod2', 'mcat1', 'class2', 55, '200.00', '11000.00', 1, 1, 0, '2024-02-22 00:11:39', '2024-02-22 00:19:44'),
(15, 'ordr15', NULL, 'cord4', NULL, 'mate3', 'prod2', 'mcat1', 'class3', 22, '140.00', '3080.00', 0, 0, 1, '2024-02-22 00:11:39', '2024-02-22 00:13:32'),
(16, 'ordr16', NULL, 'cord4', NULL, 'mate1', 'prod2', 'mcat1', 'class1', 78, '100.00', '7800.00', 0, 0, 1, '2024-02-22 00:12:55', '2024-02-22 00:13:31'),
(17, 'ordr17', 'cons6', 'cord18', 'ORD-65f22371-0d04-4c13-98e9-5665a0cdba06', 'mate1', 'prod2', 'mcat1', 'class1', 5, '100.00', '500.00', 1, 1, 0, '2024-02-27 15:38:34', '2024-02-27 15:42:20'),
(18, 'ordr18', 'cons6', 'cord18', 'ORD-65f22371-0d04-4c13-98e9-5665a0cdba06', 'mate2', 'prod2', 'mcat1', 'class2', 5, '200.00', '1000.00', 1, 1, 0, '2024-02-27 15:38:34', '2024-02-27 15:42:20'),
(19, 'ordr19', 'cons7', 'cord19', 'ORD-d364b65c-cbca-4514-b76d-138eccc8fb87', 'mate1', 'prod2', 'mcat1', 'class1', 23, '100.00', '2300.00', 1, 1, 0, '2024-02-27 16:18:55', '2024-02-27 16:20:30'),
(20, 'ordr20', 'cons7', 'cord19', 'ORD-d364b65c-cbca-4514-b76d-138eccc8fb87', 'mate2', 'prod2', 'mcat1', 'class2', 3, '200.00', '600.00', 1, 1, 0, '2024-02-27 16:18:55', '2024-02-27 16:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `coordinator_outstandings`
--

CREATE TABLE `coordinator_outstandings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coordinator_outstanding_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_in` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_out` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_outstanding` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coordinator_outstandings`
--

INSERT INTO `coordinator_outstandings` (`id`, `coordinator_outstanding_id`, `coordinator_id`, `total_in`, `total_out`, `total_outstanding`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'cout1', 'cord4', '39790.00', '10300.00', '29490.00', 1, 0, '2024-02-13 11:40:53', '2024-02-20 10:36:20'),
(2, 'cout2', 'cord2', '0.00', '27464.00', '-27464.00', 1, 0, '2024-02-14 10:14:32', '2024-02-22 00:42:49'),
(3, 'cout3', 'cord5', '0.00', '8500.00', '-8500.00', 1, 0, '2024-02-22 00:41:44', '2024-02-22 00:41:44'),
(5, 'cout4', 'cord6', '-4200.00', '2500.00', '-6700.00', 1, 0, '2024-02-24 16:54:54', '2024-02-24 17:38:34'),
(6, 'cout6', 'cord18', '3500.00', '0.00', '3500.00', 1, 0, '2024-02-27 14:36:48', '2024-02-27 15:43:39'),
(7, 'cout7', 'cord19', '7900.00', '3500.00', '4400.00', 1, 0, '2024-02-27 16:18:27', '2024-02-27 16:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `coordinator_payments`
--

CREATE TABLE `coordinator_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coordinator_payment_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  `particulars` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coordinator_payments`
--

INSERT INTO `coordinator_payments` (`id`, `coordinator_payment_id`, `coordinator_id`, `paid_date`, `particulars`, `paid_amount`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'cpay1', 'cord4', '2024-02-10', 'first payment', '1500', 1, 0, '2024-02-10 08:39:04', '2024-02-14 10:49:40'),
(2, 'cpay2', 'cord4', '2024-02-01', 'edited particulars', '500', 1, 0, '2024-02-10 13:47:21', '2024-02-14 10:13:13'),
(3, 'cpay3', 'cord2', '2024-02-14', 'sajid payment tryinggg', '25000', 1, 0, '2024-02-14 05:52:33', '2024-02-14 10:14:32'),
(4, 'cpay4', 'cord3', '2024-02-17', 'adithya paricularss', '8500', 0, 0, '2024-02-14 09:26:56', '2024-02-14 10:49:51'),
(5, 'cpay5', 'cord2', '2024-02-29', 'neeeeeeeeeeeeeeeeeew', '74', 1, 0, '2024-02-14 09:29:46', '2024-02-22 00:42:49'),
(6, 'cpay6', 'cord2', '2024-02-11', '11 edited', '750', 1, 0, '2024-02-14 09:36:13', '2024-02-14 09:46:16'),
(7, 'cpay7', 'cord2', '2024-02-21', 'sajid payment tryinggg wwwwwwwwwwwwww', '2390', 1, 0, '2024-02-14 12:12:23', '2024-02-14 12:13:25'),
(8, 'cpay8', 'cord4', '2024-02-22', 'here is another particulars', '4500', 1, 0, '2024-02-16 06:33:36', '2024-02-16 06:35:26'),
(9, 'cpay9', 'cord4', '2024-02-20', 'first payment', '2300', 1, 0, '2024-02-20 10:35:32', '2024-02-20 10:36:20'),
(10, 'cpay10', 'cord5', '2024-02-10', 'dff', '8500', 1, 0, '2024-02-22 00:41:29', '2024-02-22 00:41:44'),
(11, 'cpay11', 'cord6', '2024-02-23', 'here is another particulars', '2500', 1, 0, '2024-02-24 16:58:22', '2024-02-24 17:38:34'),
(12, 'cpay12', 'cord19', '2024-02-26', 'here is another particulars', '3500', 1, 0, '2024-02-27 16:22:20', '2024-02-27 16:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `coordinator_stocks`
--

CREATE TABLE `coordinator_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coordinator_stock_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_category_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coordinator_stocks`
--

INSERT INTO `coordinator_stocks` (`id`, `coordinator_stock_id`, `coordinator_id`, `product_id`, `material_category_id`, `class_id`, `material_id`, `stock_quantity`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'cstk1', 'cord4', 'prod2', 'mcat1', 'class1', 'mate1', 89, 1, 0, '2024-02-12 12:40:05', '2024-02-13 12:16:27'),
(2, 'cstk2', 'cord4', 'prod2', 'mcat1', 'class2', 'mate2', 116, 1, 0, '2024-02-12 12:40:05', '2024-02-13 12:16:27'),
(3, 'cstk3', 'cord4', 'prod2', 'mcat1', 'class3', 'mate3', 143, 1, 0, '2024-02-12 12:40:05', '2024-02-13 12:16:27'),
(4, 'cstk4', 'cord18', 'prod2', 'mcat1', 'class1', 'mate1', 5, 1, 0, '2024-02-27 15:43:39', '2024-02-27 15:43:39'),
(5, 'cstk5', 'cord18', 'prod2', 'mcat1', 'class2', 'mate2', 5, 1, 0, '2024-02-27 15:43:39', '2024-02-27 15:43:39'),
(6, 'cstk6', 'cord19', 'prod2', 'mcat1', 'class1', 'mate1', 23, 1, 0, '2024-02-27 16:21:19', '2024-02-27 16:21:19'),
(7, 'cstk7', 'cord19', 'prod2', 'mcat1', 'class2', 'mate2', 3, 1, 0, '2024-02-27 16:21:19', '2024-02-27 16:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_id`, `country`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'cont1', 'India', 1, 0, '2024-01-08 02:24:00', '2024-01-08 02:24:00'),
(2, 'cont2', 'canada', 1, 0, '2024-01-08 02:29:43', '2024-01-08 02:29:43'),
(3, 'cont3', 'uk', 1, 0, '2024-01-08 02:30:59', '2024-01-08 02:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `examiners`
--

CREATE TABLE `examiners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `examiner_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `examiner_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examiners`
--

INSERT INTO `examiners` (`id`, `examiner_id`, `examiner_name`, `mobile`, `email`, `address`, `state_id`, `city_id`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'exnr1', 'james', '8987854258', 'ribin@gmail.com', 'zzsfsfszfsd', 'stat1', 'city1', 1, 0, '2024-02-28 09:32:28', '2024-02-28 09:32:28'),
(2, 'exnr2', 'josh kallanan', '8987854258', 'otherf54@gmail.com', 'zzsfsfszfsd', 'stat2', 'city2', 1, 0, '2024-02-28 09:32:44', '2024-02-28 09:32:44'),
(3, 'exnr3', 'kim wexler', '95460235684', 'ribin@gmail.com', 'rtete', 'stat1', 'city3', 1, 0, '2024-02-28 09:33:05', '2024-02-28 09:33:05'),
(4, 'exnr4', 'lijo kj', '9061400906', 'rk47c4@gmail.com', 'thuravakkath', 'stat1', 'city1', 1, 0, '2024-02-28 09:33:29', '2024-02-28 09:33:29'),
(5, 'exnr5', 'akhil suendran', '95460235684', 'adithya@g.v', 'zzsfsfszfsd', 'stat1', 'city3', 1, 0, '2024-02-28 09:33:53', '2024-02-28 09:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `examiner_meet_links`
--

CREATE TABLE `examiner_meet_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `examiner_meet_link_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examiner_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meet_link` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examiner_meet_links`
--

INSERT INTO `examiner_meet_links` (`id`, `examiner_meet_link_id`, `coordinator_id`, `examiner_id`, `meet_link`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'emet1', 'cord4', 'exnr3', 'https://www.chess.com/game/101405618890', 0, 0, '2024-03-01 07:53:52', '2024-03-01 07:53:52'),
(2, 'emet2', 'cord4', 'exnr5', 'https://www.codeigniter.com/user_guide/database/query_builder.html', 1, 0, '2024-03-01 08:54:03', '2024-03-01 08:54:03');

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
-- Table structure for table `final_exams`
--

CREATE TABLE `final_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `final_exam_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_category_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_exam_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_link` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_start_date_time` datetime DEFAULT NULL,
  `exam_end_date_time` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `final_exams`
--

INSERT INTO `final_exams` (`id`, `final_exam_id`, `product_id`, `material_category_id`, `class_id`, `year_id`, `final_exam_name`, `google_link`, `exam_start_date_time`, `exam_end_date_time`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'fexm1', 'prod4', 'mcat8', 'class1', 'year1', 'finak first exam', 'https://www.goodreads.com/book/show/419083.Killing_Pablo', '2024-01-27 15:58:00', '2024-01-31 15:58:00', 1, 0, '2024-01-20 10:28:16', '2024-01-20 10:28:16'),
(2, 'fexm2', 'prod3', 'mcat7', 'class2', 'year1', 'finak seconf ddkndkcdn exam', 'https://www.amazon.in/Killing-Pablo-Worlds-Greatest-Outlaw-ebook/dp/B008UX3ITE', '2024-01-29 15:58:00', '2024-04-26 15:58:00', 0, 0, '2024-01-20 10:29:31', '2024-01-20 10:29:31'),
(3, 'fexm3', 'prod2', 'mcat4', 'class2', 'year2', 'finak firstFIIIIIIIInal exam', 'https://www.goodreads.com/book/show/419083.Killing_Pablo', '2024-01-20 16:17:00', '2024-01-30 16:17:00', 0, 0, '2024-01-20 10:47:29', '2024-01-20 10:47:29'),
(4, 'fexm4', 'prod2', 'mcat1', 'class2', 'year2', 'mega exam do i say the obvious', 'https://www.google.com/search?q=real+madrid&oq=&gs_lcrp=EgZjaHJvbWUqCQgAEEUYOxjCAzIJCAAQRRg7GMIDMgkIARBFGDsYwgMyCQgCEEUYOxjCAzIJCAMQRRg7GMIDMgkIBBBFGDsYwgMyCQgFEEUYOxjCAzIJCAYQRRg7GMIDMgkIBxBFGDsYwgPSAQk2MjQ0OGowajGoAgiwAgE&sourceid=chrome&ie=UTF-8', '2024-01-30 15:44:00', '2024-02-27 15:44:00', 1, 0, '2024-01-23 10:15:03', '2024-01-23 10:15:03'),
(5, 'fexm5', 'prod4', 'mcat8', 'class1', 'year1', 'fe21FinalEXam', 'https://glpos.com/spellbee/', '2024-02-24 20:25:00', '2024-02-25 20:25:00', 1, 0, '2024-02-21 14:55:24', '2024-02-21 14:55:24'),
(6, 'fexm6', 'prod2', 'mcat1', 'class1', 'year1', 'extraschholfinal exam feb 27', 'https://www.google.com/search?q=jiocinema&oq=&gs_lcrp=EgZjaHJvbWUqCQgCEEUYOxjCAzIJCAAQRRg7GMIDMgkIARBFGDsYwgMyCQgCEEUYOxjCAzIJCAMQRRg7GMIDMgkIBBBFGDsYwgMyCQgFEEUYOxjCAzIJCAYQRRg7GMIDMgkIBxBFGDsYwgPSAQs1MzU5MzEwajBqMagCCLACAQ&sourceid=chrome&ie=UTF-8', '2024-02-28 13:05:00', '2024-02-29 13:05:00', 1, 0, '2024-02-27 07:35:50', '2024-02-27 07:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `godowns`
--

CREATE TABLE `godowns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `godown_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `godown_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `godowns`
--

INSERT INTO `godowns` (`id`, `godown_id`, `godown_name`, `state_id`, `address`, `mobile`, `email`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'godn1', 'abcgodown', 'stat1', 'zzsfsfszfsd', '9658955452', 'abcgodown@gmail.com', 1, 0, '2024-01-17 11:58:12', '2024-01-17 11:58:12'),
(2, 'godn2', 'hello godown', 'stat1', 'rtred', '8987854258', 'hello@gmail.com', 1, 0, '2024-01-17 12:09:05', '2024-01-17 12:09:05'),
(3, 'godn3', 'berger godown', 'stat2', 'zzsfsfszfsdhttt', '9061400906', 'ribin@gmail.com', 1, 0, '2024-01-17 12:11:39', '2024-01-17 12:11:39'),
(4, 'godn4', 'koloo', 'stat1', 'zzsfsfszfsdh', '8987854258', 'ribin@gmail.com', 1, 0, '2024-01-19 11:31:17', '2024-01-19 11:31:17'),
(5, 'godn5', 'tgtg', 'stat1', 'gtgtgtgt', '9658955452', 'rk47c4@gmail.com', 1, 0, '2024-02-20 09:34:56', '2024-02-20 09:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_price` int(11) DEFAULT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_category_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_resource` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `material_id`, `material_name`, `material_price`, `product_id`, `material_category_id`, `class_id`, `material_resource`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'mate1', 'anotherclassonel1Book', 100, 'prod2', 'mcat1', 'class1', NULL, 1, 0, '2024-02-12 09:20:50', '2024-02-12 09:20:50'),
(2, 'mate2', 'anotherClass2Bookl1', 200, 'prod2', 'mcat1', 'class2', NULL, 1, 0, '2024-02-12 09:21:21', '2024-02-12 09:21:21'),
(3, 'mate3', 'anotherMclass3pecil', 140, 'prod2', 'mcat1', 'class3', NULL, 1, 0, '2024-02-12 09:30:35', '2024-02-12 09:30:35'),
(4, 'mate4', 'real', 250, 'prod2', 'mcat4', 'class1', NULL, 1, 0, '2024-02-20 09:30:34', '2024-02-20 09:30:34'),
(5, 'mate5', 'spellbeoneSP1', 4000, 'prod4', 'mcat8', 'class1', 'project_uploads/materials/1708440928_file 2 (1).pdf', 1, 0, '2024-02-20 14:55:28', '2024-02-20 14:55:28'),
(6, 'mate6', 'spellbeClass2Material', 7800, 'prod4', 'mcat8', 'class2', 'project_uploads/materials/1708441236_Document (1).docx', 1, 0, '2024-02-20 15:00:36', '2024-02-20 15:00:36'),
(7, 'mate7', 'spllebclasss3material', 500, 'prod4', 'mcat9', 'class3', NULL, 1, 0, '2024-02-20 15:03:01', '2024-02-20 15:03:01'),
(8, 'mate8', 'booksfr', 7850, 'prod2', 'mcat4', 'class3', NULL, 1, 0, '2024-02-20 15:04:17', '2024-02-20 15:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `material_categories`
--

CREATE TABLE `material_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_category_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_category_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_order` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_categories`
--

INSERT INTO `material_categories` (`id`, `material_category_id`, `material_category_name`, `product_id`, `level`, `level_order`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'mcat1', 'another-l1', 'prod2', 'l1', 1, 1, 0, '2024-01-03 06:09:52', '2024-01-03 06:09:52'),
(2, 'mcat2', 'another-l12', 'prod2', 'l12', 2, 1, 0, '2024-01-03 06:09:52', '2024-01-03 06:09:52'),
(3, 'mcat3', 'another-l13', 'prod2', 'l13', 3, 1, 0, '2024-01-03 06:09:52', '2024-01-03 06:09:52'),
(4, 'mcat4', 'another-fr', 'prod2', 'fr', 4, 1, 0, '2024-01-03 06:09:52', '2024-01-03 06:09:52'),
(5, 'mcat5', 'thirdoe-p', 'prod3', 'p', 1, 1, 0, '2024-01-04 03:18:51', '2024-01-04 03:18:51'),
(6, 'mcat6', 'thirdoe-pp', 'prod3', 'pp', 2, 1, 0, '2024-01-04 03:18:51', '2024-01-04 03:18:51'),
(7, 'mcat7', 'thirdoe-ppp', 'prod3', 'ppp', 3, 1, 0, '2024-01-04 03:18:51', '2024-01-04 03:18:51'),
(8, 'mcat8', 'spellbee-sp1', 'prod4', 'sp1', 1, 1, 0, '2024-01-11 00:07:35', '2024-01-11 00:07:35'),
(9, 'mcat9', 'spellbee-sp2', 'prod4', 'sp2', 2, 1, 0, '2024-01-11 00:07:35', '2024-01-11 00:07:35'),
(10, 'mcat10', 'spellbeeone-p', 'prod5', 'p', 1, 1, 0, '2024-01-22 11:20:33', '2024-01-22 11:20:33'),
(11, 'mcat11', 'spellbeeone-pp', 'prod5', 'pp', 2, 1, 0, '2024-01-22 11:20:33', '2024-01-22 11:20:33'),
(12, 'mcat12', 'spellbeeone-ppp', 'prod5', 'ppp', 3, 1, 0, '2024-01-22 11:20:33', '2024-01-22 11:20:33'),
(13, 'mcat13', 'spellbeeone-pppp', 'prod5', 'pppp', 4, 1, 0, '2024-01-22 11:20:33', '2024-01-22 11:20:33'),
(14, 'mcat14', 'pro6-l11', 'prod6', 'l11', 1, 1, 0, '2024-02-20 09:28:53', '2024-02-20 09:28:53'),
(15, 'mcat15', 'pro6-q', 'prod6', 'q', 2, 1, 0, '2024-02-20 09:28:53', '2024-02-20 09:28:53'),
(16, 'mcat16', 'pro6-w', 'prod6', 'w', 3, 1, 0, '2024-02-20 09:28:53', '2024-02-20 09:28:53'),
(17, 'mcat17', 'pro6-s', 'prod6', 's', 4, 1, 0, '2024-02-20 09:28:53', '2024-02-20 09:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `material_enquiries`
--

CREATE TABLE `material_enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_enquiry_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_category_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_status` int(11) NOT NULL DEFAULT 0,
  `material_availability` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_enquiries`
--

INSERT INTO `material_enquiries` (`id`, `material_enquiry_id`, `school_id`, `student_id`, `product_id`, `material_category_id`, `class_id`, `material_id`, `purchase_status`, `material_availability`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'menq1', 'schl2', 'stud6', 'prod2', 'mcat1', 'class2', 'mate2', 0, 1, 0, 0, '2024-01-24 02:25:03', '2024-01-24 02:43:27'),
(2, 'menq2', 'schl2', 'stud6', 'prod2', 'mcat1', 'class2', 'mate2', 0, 1, 0, 0, '2024-01-24 04:58:06', '2024-01-24 04:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `material_purchases`
--

CREATE TABLE `material_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_purchase_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_category_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_purchases`
--

INSERT INTO `material_purchases` (`id`, `material_purchase_id`, `school_id`, `student_id`, `product_id`, `material_category_id`, `class_id`, `material_id`, `coordinator_id`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'mpur1', 'schl2', 'stud6', 'prod2', 'mcat1', 'class2', 'mate2', 'cord1', 1, 0, '2024-01-25 07:20:05', '2024-01-25 07:20:05'),
(2, 'mpur2', 'schl2', 'stud6', 'prod2', 'mcat1', 'class2', 'mate2', 'cord1', 1, 0, '2024-01-26 06:23:31', '2024-01-26 06:23:31'),
(3, 'mpur3', 'schl2', 'stud6', 'prod2', 'mcat1', 'class2', 'mate2', 'cord1', 1, 0, '2024-01-26 06:23:42', '2024-01-26 06:23:42'),
(4, 'mpur4', 'schl2', 'stud6', 'prod2', 'mcat1', 'class2', 'mate2', 'cord1', 1, 0, '2024-01-26 06:26:27', '2024-01-26 06:26:27'),
(5, 'mpur5', 'schl2', 'stud6', 'prod2', 'mcat1', 'class2', 'mate2', 'cord1', 1, 0, '2024-01-26 06:27:32', '2024-01-26 06:27:32'),
(6, 'mpur6', 'schl2', 'stud6', 'prod2', 'mcat1', 'class2', 'mate2', 'cord1', 1, 0, '2024-01-26 06:56:31', '2024-01-26 06:56:31'),
(7, 'mpur7', 'schl2', 'stud6', 'prod2', 'mcat1', 'class2', 'mate2', 'cord1', 1, 0, '2024-01-26 06:58:05', '2024-01-26 06:58:05'),
(8, 'mpur8', 'schl2', 'stud6', 'prod2', 'mcat1', 'class2', 'mate2', 'cord1', 1, 0, '2024-01-26 06:59:10', '2024-01-26 06:59:10'),
(9, 'mpur9', 'schl2', 'stud6', 'prod2', 'mcat1', 'class2', 'mate2', 'cord1', 1, 0, '2024-01-26 14:49:31', '2024-01-26 14:49:31'),
(11, 'mpur11', 'schl2', 'stud3', 'prod4', 'mcat8', 'class1', 'mate5', 'cord3', 1, 0, '2024-02-21 13:58:04', '2024-02-21 13:58:04'),
(12, 'mpur12', 'schl2', 'stud3', 'prod4', 'mcat8', 'class1', 'mate5', 'cord3', 1, 0, '2024-02-21 14:08:26', '2024-02-21 14:08:26'),
(13, 'mpur13', 'schl2', 'stud3', 'prod4', 'mcat8', 'class1', 'mate5', 'cord3', 1, 0, '2024-02-21 14:14:51', '2024-02-21 14:14:51'),
(14, 'mpur14', 'schl2', 'stud3', 'prod4', 'mcat8', 'class1', 'mate5', 'cord3', 1, 0, '2024-02-21 14:20:26', '2024-02-21 14:20:26'),
(15, 'mpur15', 'schl2', 'stud3', 'prod4', 'mcat8', 'class1', 'mate5', 'cord3', 1, 0, '2024-02-21 14:24:20', '2024-02-21 14:24:20'),
(16, 'mpur16', 'schl2', 'stud3', 'prod4', 'mcat8', 'class1', 'mate5', 'cord3', 1, 0, '2024-02-21 14:25:55', '2024-02-21 14:25:55'),
(17, 'mpur17', 'schl2', 'stud3', 'prod4', 'mcat8', 'class1', 'mate5', 'cord3', 1, 0, '2024-02-21 14:30:20', '2024-02-21 14:30:20'),
(18, 'mpur18', 'schl2', 'stud3', 'prod4', 'mcat8', 'class1', 'mate5', 'cord3', 1, 0, '2024-02-21 14:47:36', '2024-02-21 14:47:36'),
(19, 'mpur19', 'schl4', 'stud14', 'prod2', 'mcat1', 'class1', 'mate1', 'cord4', 1, 0, '2024-02-22 02:16:24', '2024-02-22 02:16:24'),
(20, 'mpur20', 'schl4', 'stud21', 'prod2', 'mcat1', 'class1', 'mate1', 'cord4', 1, 0, '2024-02-26 06:33:35', '2024-02-26 06:33:35'),
(21, 'mpur21', 'schl4', 'stud21', 'prod2', 'mcat1', 'class1', 'mate1', 'cord4', 1, 0, '2024-02-26 07:31:19', '2024-02-26 07:31:19'),
(22, 'mpur22', 'schl4', 'stud21', 'prod2', 'mcat1', 'class1', 'mate1', 'cord4', 1, 0, '2024-02-26 07:32:14', '2024-02-26 07:32:14'),
(23, 'mpur23', 'schl4', 'stud22', 'prod2', 'mcat1', 'class1', 'mate1', 'cord4', 1, 0, '2024-02-26 11:22:08', '2024-02-26 11:22:08');

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_12_14_114100_create_classes_table', 1),
(11, '2023_12_15_101653_create_products_table', 2),
(12, '2023_12_16_055539_add_number_of_levels_to_products', 3),
(13, '2023_12_18_091353_material_category', 4),
(14, '2023_12_18_104823_create_materials_table', 5),
(15, '2023_12_18_112343_add_resources_file', 6),
(16, '2023_12_20_070009_rename_classes', 7),
(17, '2023_12_20_101933_create_coordiators_table', 8),
(18, '2023_12_21_054127_create_classes_table', 8),
(19, '2024_01_01_062618_create_products_table', 9),
(20, '2024_01_03_095314_create_material_categories_table', 10),
(21, '2024_01_03_113640_add_n_o_levels', 11),
(22, '2024_01_04_085335_material_new', 12),
(23, '2024_01_04_105811_create_coordinators_table', 13),
(24, '2024_01_08_055055_create_schools_table', 14),
(25, '2024_01_08_060140_create_school_registrations_table', 15),
(26, '2024_01_08_062653_create_countries_table', 15),
(27, '2024_01_08_064656_create_cities_table', 15),
(28, '2024_01_08_064734_create_states_table', 15),
(29, '2024_01_08_064748_create_pincodes_table', 15),
(30, '2024_01_08_080356_add_additional_fields_to_pincodes_table', 16),
(31, '2024_01_08_090708_add_new_fields_i_n_state_t_b', 17),
(32, '2024_01_08_094208_make_country_id_nullable_in_states_table', 18),
(33, '2024_01_09_102717_add_additional_fields_to_cities_table', 19),
(34, '2024_01_10_064047_change_pincode_datatype_in_schools_table', 20),
(35, '2024_01_10_082145_change_school_registration_table', 21),
(36, '2024_01_11_071512_update_status_default_value_in_school_registrations_table', 22),
(37, '2024_01_11_071917_change_school_registration_tablestatus', 23),
(38, '2024_01_15_051112_create_students_table', 24),
(39, '2024_01_17_163650_create_godowns_table', 25),
(40, '2024_01_17_202437_create_stocks_table', 26),
(41, '2024_01_18_202956_create_material_enquiries_table', 27),
(42, '2024_01_19_125305_create_material_purchases_table', 28),
(43, '2024_01_19_153655_add_purchase_status_to_material_enquiries_table', 29),
(44, '2024_01_20_110902_create_mock_exams_table', 30),
(45, '2024_01_20_113427_create_years_table', 31),
(46, '2024_01_20_120843_update_status_default_value_in_mock_exams_and_years_tables', 32),
(47, '2024_01_20_152631_create_final_exams_table', 33),
(48, '2024_01_22_125730_create_student_current_records_table', 34),
(49, '2024_01_22_164814_add_level_order_to_material_categories_table', 35),
(50, '2024_01_22_193907_create_admins_table', 36),
(51, '2024_01_22_213837_add_isadmin_to_admins_table', 37),
(52, '2024_01_23_160838_add_mockexam_fields_to_student_current_records', 38),
(53, '2024_01_23_164731_create_school_material_enquiries_table', 39),
(54, '2024_01_24_071940_add_coordinator_field_to_school_material_enquiries_table', 40),
(55, '2024_01_24_072703_make_coordinator_id_nullable_in_school_material_enquiries_table', 41),
(56, '2024_01_25_115021_edit_puechase_table', 42),
(57, '2024_01_25_121851_chage_status_to1', 43),
(58, '2024_01_26_111153_create_school_stocks_table', 44),
(59, '2024_01_26_195503_add_new_fields_into_student_record_table', 45),
(60, '2024_01_26_232214_create_results_table', 46),
(61, '2024_01_27_152201_edit_coordinator_table', 47),
(62, '2024_01_27_184530_add_addressto_coordinator', 48),
(63, '2024_01_29_153034_create_coordinator_orders_table', 49),
(64, '2024_01_31_064328_addnewfield_to_order', 50),
(65, '2024_01_31_071145_remove_valid_from_coordinator_orders_table', 51),
(66, '2024_01_31_181353_create_order_shippings_table', 52),
(67, '2024_02_03_115132_add_fields_to_students', 53),
(69, '2024_02_05_105557_create_shipping_addresses_table', 54),
(70, '2024_02_05_120917_modify_pincode_column_type_in_shipping_addresses_table', 55),
(71, '2024_02_05_125625_new_fieldtoshipping', 56),
(72, '2024_02_05_161945_add_new_fieldto_table', 57),
(74, '2024_02_06_065919_create_consolidate_orders_table', 58),
(75, '2024_02_10_132826_create_coordinator_payments_table', 59),
(76, '2024_02_10_140713_change_field_default_value', 60),
(77, '2024_02_10_210410_create_national_coordinators_table', 61),
(78, '2024_02_11_124746_create_coordinator_stocks_table', 62),
(79, '2024_02_12_111012_addew_id_field_to_coordiator_orders_table', 63),
(80, '2024_02_13_120914_create_admin_ledgers_table', 64),
(81, '2024_02_13_122624_create_coordinator_outstandings_table', 65),
(82, '2024_02_15_111855_create_office_contacts_table', 66),
(83, '2024_02_15_142241_create_admin_resources_table', 67),
(84, '2024_02_15_163215_create_school_upload_orders_table', 68),
(85, '2024_02_16_111746_addnew_field_to_school_table', 69),
(86, '2024_02_16_170516_change_field_default', 70),
(87, '2024_02_19_194406_add_new_fields_toadmin_ledger', 71),
(88, '2024_02_20_102958_create_notifications_table', 72),
(89, '2024_02_20_141715_change_school_field_name', 73),
(90, '2024_02_23_143401_create_examiners_table', 74),
(91, '2024_02_23_204917_create_assign_examiner_to_users_table', 75),
(92, '2024_02_24_195902_change_in_coordinator', 76),
(93, '2024_02_24_200832_add_new_field', 77),
(94, '2024_02_25_220214_year_tostudent', 78),
(95, '2024_02_25_220620_add_new_field_to_current_record', 79),
(96, '2024_02_26_164633_add_n_new_fields', 80),
(97, '2024_02_27_155843_create_school_examiners_table', 81),
(98, '2024_03_01_131423_create_examiner_meet_links_table', 82);

-- --------------------------------------------------------

--
-- Table structure for table `mock_exams`
--

CREATE TABLE `mock_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mock_exam_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_category_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mock_exam_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_link` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_start_date_time` datetime DEFAULT NULL,
  `exam_end_date_time` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mock_exams`
--

INSERT INTO `mock_exams` (`id`, `mock_exam_id`, `product_id`, `material_category_id`, `class_id`, `year_id`, `mock_exam_name`, `google_link`, `exam_start_date_time`, `exam_end_date_time`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'mexm1', 'prod2', 'mcat1', 'class2', 'year1', 'first exam', 'http://127.0.0.1:8000/mock-exam', '2024-01-23 14:39:00', '2024-01-26 14:44:00', 1, 1, '2024-01-20 09:10:11', '2024-01-20 09:10:11'),
(2, 'mexm2', 'prod3', 'mcat5', 'class2', 'year2', 'first exam', 'https://chat.openai.com/c/6de4fcad-3639-429f-8458-de4dfcb264a6', '2024-01-25 17:39:00', '2024-01-31 20:49:00', 0, 0, '2024-01-20 09:16:03', '2024-01-20 09:16:03'),
(4, 'mexm3', 'prod4', 'mcat8', 'class1', 'year2', 'firstMOck exam', 'http://127.0.0.1:8000/mock-exam', '2024-02-01 16:17:00', '2024-03-21 16:15:00', 1, 0, '2024-01-20 10:46:09', '2024-01-20 10:46:09'),
(5, 'mexm5', 'prod2', 'mcat1', 'class2', 'year2', 'interschool level exam', 'https://chat.openai.com/c/f1ddb419-9576-404b-8c62-343778f18086', '2024-01-30 11:15:00', '2024-02-27 11:15:00', 1, 0, '2024-01-23 05:45:34', '2024-01-23 05:45:34'),
(6, 'mexm6', 'prod2', 'mcat4', 'class1', 'year1', '20febexam', 'https://www.google.com/', '2024-02-01 15:21:00', '2024-02-29 15:21:00', 1, 0, '2024-02-20 09:51:42', '2024-02-20 09:51:42'),
(7, 'mexm7', 'prod4', 'mcat8', 'class1', 'year1', 'feb21exam', 'https://www.chess.com/', '2024-02-25 18:15:00', '2024-02-29 18:15:00', 1, 1, '2024-02-21 12:45:32', '2024-02-21 12:45:32'),
(8, 'mexm8', 'prod2', 'mcat1', 'class1', 'year1', 'feb22mockexam', 'https://www.google.com/', '2024-02-29 07:55:00', '2024-02-29 11:55:00', 1, 0, '2024-02-22 02:25:56', '2024-02-22 02:25:56'),
(9, 'mexm9', 'prod2', 'mcat1', 'class1', 'year1', 'feb26mondaymockExam', 'http://127.0.0.1:8000/mock-exam', '2024-02-27 11:55:00', '2024-02-29 11:55:00', 1, 0, '2024-02-26 06:25:31', '2024-02-26 06:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `national_coordinators`
--

CREATE TABLE `national_coordinators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `national_coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `national_coordinators`
--

INSERT INTO `national_coordinators` (`id`, `national_coordinator_id`, `coordinator_id`, `state_id`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(4, 'ncrd1', 'cord2', 'stat1', 1, 0, '2024-02-10 17:18:53', '2024-02-10 17:18:53'),
(5, 'ncrd5', 'cord3', 'stat3', 1, 0, '2024-02-10 17:19:05', '2024-02-10 17:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` int(11) NOT NULL DEFAULT 0,
  `coordinator` int(11) NOT NULL DEFAULT 0,
  `student` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification_id`, `product_id`, `level_id`, `class_id`, `title`, `file_path`, `school`, `coordinator`, `student`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'noti1', 'prod2', 'mcat1', 'class1', 'first notification', 'project_uploads/notification/1708612834_1708440928_file 2 (1).pdf', 1, 1, 1, 1, 0, '2024-02-22 14:40:34', '2024-02-22 14:40:34'),
(2, 'noti2', 'prod2', 'mcat2', 'class2', 'pijnhjn', 'project_uploads/notification/1708612980_1706787582_dash_im (2).jpeg', 0, 1, 0, 1, 0, '2024-02-22 14:43:00', '2024-02-22 14:43:00'),
(3, 'noti3', 'prod2', 'mcat3', 'class2', 'family', 'project_uploads/notification/1708613017_1706787582_dash_im (2).jpeg', 1, 1, 1, 1, 0, '2024-02-22 14:43:37', '2024-02-22 14:43:37'),
(4, 'noti4', 'prod4', 'mcat8', 'class1', 'opyyykocheelogvjgvjgvj', 'project_uploads/notification/1708613377_file onppppp.jpeg', 1, 0, 1, 1, 0, '2024-02-22 14:49:37', '2024-02-22 14:49:37'),
(5, 'noti5', 'prod4', 'mcat9', 'class3', 'ilvu', 'project_uploads/notification/1708614364_anoher one.jpeg', 1, 1, 1, 1, 0, '2024-02-22 15:06:04', '2024-02-22 15:06:04'),
(6, 'noti6', 'prod5', 'mcat10', 'class2', 'yoyo', 'project_uploads/notification/1708663589_file onppppp.jpeg', 0, 1, 0, 1, 0, '2024-02-23 04:46:29', '2024-02-23 04:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `office_contacts`
--

CREATE TABLE `office_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `office_contact_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `office_contacts`
--

INSERT INTO `office_contacts` (`id`, `office_contact_id`, `office_name`, `mobile_number`, `email`, `address`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'ocnt1', 'ExtraSchool pvtd editfrdfrf', '9856984125', 'extra@gmial.com', 'mumbi port ,kaljahanai nagarar vallamchira thruponithura', 1, 0, '2024-02-15 08:36:49', '2024-02-20 05:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pincodes`
--

CREATE TABLE `pincodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pincode_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pincodes`
--

INSERT INTO `pincodes` (`id`, `pincode_id`, `pincode`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'pcode1', '683544', 1, 0, '2024-01-08 03:35:33', '2024-01-08 03:35:33'),
(2, 'pcode2', '600254', 1, 0, '2024-01-08 03:35:40', '2024-01-08 03:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classes` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_levels` int(11) DEFAULT NULL,
  `level1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level4` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level5` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level6` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level7` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level8` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level9` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level10` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level11` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level12` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level13` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level14` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level15` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `product_name`, `classes`, `number_of_levels`, `level1`, `level2`, `level3`, `level4`, `level5`, `level6`, `level7`, `level8`, `level9`, `level10`, `level11`, `level12`, `level13`, `level14`, `level15`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(2, 'prod2', 'another', 'class1,class2', 4, 'l1', 'l12', 'l13', 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-01-03 06:09:52', '2024-01-03 06:09:52'),
(3, 'prod3', 'thirdOe', 'class2,class1', 3, 'p', 'pp', 'ppp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-01-04 03:18:51', '2024-01-04 03:18:51'),
(4, 'prod4', 'spellbee', 'class1,class2,class3', 2, 'sp1', 'sp2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-01-11 00:07:35', '2024-01-11 00:07:35'),
(5, 'prod5', 'spellbeeone', 'class1,class2,class3', 4, 'p', 'pp', 'ppp', 'pppp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-01-22 11:20:33', '2024-01-22 11:20:33'),
(6, 'prod6', 'pro6', 'class1,class2', 4, 'l11', 'q', 'w', 's', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-02-20 09:28:53', '2024-02-20 09:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `result_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_category_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_score` int(11) DEFAULT NULL,
  `exam_status` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `result_id`, `student_id`, `school_id`, `coordinator_id`, `product_id`, `material_category_id`, `class_id`, `year_id`, `exam_type`, `exam_id`, `exam_score`, `exam_status`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'rslt1', 'stud6', 'schl2', 'cord1', 'prod2', 'mcat1', 'class2', 'year2', 'mock', 'mexm5', 50, 1, 1, 0, '2024-01-27 06:50:28', '2024-01-27 06:50:28'),
(2, 'rslt2', 'stud6', 'schl2', 'cord1', 'prod2', 'mcat1', 'class2', 'year2', 'final', 'fexm4', 2, 0, 1, 0, '2024-01-27 07:57:33', '2024-01-27 07:57:33'),
(3, 'rslt3', 'stud6', 'schl2', 'cord1', 'prod2', 'mcat1', 'class2', 'year2', 'final', 'fexm4', 0, 2, 1, 0, '2024-01-27 07:58:42', '2024-01-27 07:58:42'),
(4, 'rslt4', 'stud6', 'schl2', 'cord1', 'prod2', 'mcat1', 'class2', 'year2', 'final', 'fexm4', 85, 1, 1, 0, '2024-01-27 08:00:07', '2024-01-27 08:00:07'),
(5, 'rslt5', 'stud6', 'schl2', 'cord1', 'prod2', 'mcat4', 'class2', 'year2', 'final', 'fexm3', 90, 1, 1, 0, '2024-01-27 08:01:57', '2024-01-27 08:01:57'),
(6, 'rslt6', 'stud6', 'schl2', 'cord1', 'prod2', 'mcat4', 'class2', 'year2', 'final', 'fexm3', 56, 1, 1, 0, '2024-01-29 09:25:27', '2024-01-29 09:25:27'),
(7, 'rslt7', 'stud6', 'schl2', 'cord1', 'prod2', 'mcat4', 'class2', 'year2', 'final', 'fexm3', 56, 0, 1, 0, '2024-01-29 09:25:45', '2024-01-29 09:25:45'),
(8, 'rslt8', 'stud6', 'schl2', 'cord1', 'prod2', 'mcat4', 'class2', 'year2', 'final', 'fexm3', 56, 2, 1, 0, '2024-01-29 09:25:46', '2024-01-29 09:25:46'),
(9, 'rslt9', 'stud6', 'schl2', 'cord1', 'prod2', 'mcat4', 'class2', 'year2', 'final', 'fexm3', 4, 1, 1, 0, '2024-01-29 10:52:12', '2024-01-29 10:52:12'),
(10, 'rslt10', 'stud14', 'schl4', 'cord1', 'prod2', 'mcat1', 'class1', 'year1', 'mock', 'mexm8', 50, 1, 1, 0, '2024-02-22 02:34:17', '2024-02-22 02:34:17'),
(11, 'rslt11', 'stud3', 'schl2', 'cord4', 'prod4', 'mcat8', 'class1', 'year2', 'mock', 'mexm3', 69, 1, 1, 0, '2024-02-22 06:32:44', '2024-02-22 06:32:44'),
(12, 'rslt12', 'stud22', 'schl4', 'cord4', 'prod2', 'mcat1', 'class1', 'year1', 'mock', 'mexm8', 69, 1, 1, 0, '2024-02-27 06:51:33', '2024-02-27 06:51:33'),
(13, 'rslt13', 'stud22', 'schl4', 'cord4', 'prod2', 'mcat1', 'class1', 'year1', 'final', 'fexm6', 5, 1, 0, 0, '2024-02-27 09:00:35', '2024-02-27 09:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_id`, `school_name`, `email`, `mobile`, `address`, `country`, `state`, `city`, `pincode`, `registered`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'schl1', 'Ganapathy Vilasam High School', 'goodwin@gmail.com', '9658955452', 'koovappady', 'cont1', 'stat1', 'city1', 'pcode1', 0, 1, 0, '2024-01-09 19:45:49', '2024-01-09 19:45:49'),
(2, 'schl2', 'MGM HSS', 'mgm@gmail.com', '8987854258', 'kuruppamapady', 'cont1', 'stat1', 'city3', 'pcode2', 1, 1, 0, '2024-01-09 19:50:10', '2024-01-09 19:50:10'),
(3, 'schl3', 'LP school koovappady', 'otherf54@gmail.com', '987458562', 'koovappady', 'cont1', 'stat1', 'city1', 'pcode1', 1, 1, 0, '2024-01-09 19:59:11', '2024-01-09 19:59:11'),
(4, 'schl4', 'okkal sreenarayana hss school', 'okkalsreee@gmail.com', '9856985488', 'okkal po okkal', 'cont1', 'stat1', 'city1', 'pcode1', 1, 1, 0, '2024-01-27 10:31:45', '2024-01-27 10:31:45'),
(5, 'schl5', 'vidyajyothi high school', 'vj@g.v', '8987854258', 'perumbavoor po address herer', 'cont1', 'stat1', 'city1', 'pcode1', 1, 1, 0, '2024-02-16 00:21:39', '2024-02-16 00:29:41'),
(6, 'schl6', 'bv schol', 'rooopu007.54@gmail.com', '987458562', 'zzsfsfszfsd', 'cont1', 'stat1', 'city1', 'pcode1', 1, 1, 0, '2024-02-20 09:40:49', '2024-02-20 09:42:13'),
(7, 'schl7', 'iringol hss', 'otherf54@gmail.com', '987458562', 'aluva', 'cont1', 'stat1', 'city3', 'pcode1', 1, 1, 0, '2024-02-20 17:57:19', '2024-02-20 18:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `school_examiners`
--

CREATE TABLE `school_examiners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_examiner_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examiner_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_examiners`
--

INSERT INTO `school_examiners` (`id`, `school_examiner_id`, `coordinator_id`, `examiner_id`, `school_id`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'senr1', 'cord2', 'exnr5', 'schl5,schl1,schl4', 1, 0, '2024-02-29 07:40:51', '2024-03-01 07:06:54'),
(6, 'senr2', 'cord4', 'exnr5', 'schl1', 1, 0, '2024-03-01 07:12:24', '2024-03-01 07:12:24'),
(7, 'senr7', 'cord4', 'exnr3', 'schl4', 1, 0, '2024-03-01 07:12:32', '2024-03-01 07:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `school_material_enquiries`
--

CREATE TABLE `school_material_enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_material_enquiry_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_category_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_availability` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_material_enquiries`
--

INSERT INTO `school_material_enquiries` (`id`, `school_material_enquiry_id`, `school_id`, `coordinator_id`, `product_id`, `material_category_id`, `class_id`, `material_id`, `material_availability`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(7, 'senq7', 'schl2', 'cord1', 'prod2', 'mcat1', 'class2', 'mate2', 1, 0, 0, '2024-01-24 02:45:07', '2024-01-24 02:45:17'),
(8, 'senq8', 'schl2', 'cord1', 'prod2', 'mcat1', 'class2', 'mate2', 1, 0, 0, '2024-01-26 06:58:06', '2024-02-22 00:05:20'),
(9, 'senq9', 'schl2', 'cord1', 'prod2', 'mcat1', 'class2', 'mate2', 1, 0, 0, '2024-01-26 06:59:10', '2024-02-22 00:04:51'),
(11, 'senq11', 'schl2', 'cord3', 'prod4', 'mcat8', 'class1', 'mate5', 0, 1, 0, '2024-02-21 13:58:04', '2024-02-21 13:58:04'),
(12, 'senq12', 'schl2', 'cord3', 'prod4', 'mcat8', 'class1', 'mate5', 0, 1, 0, '2024-02-21 14:08:26', '2024-02-21 14:08:26'),
(13, 'senq13', 'schl2', 'cord3', 'prod4', 'mcat8', 'class1', 'mate5', 0, 1, 0, '2024-02-21 14:14:51', '2024-02-21 14:14:51'),
(14, 'senq14', 'schl2', 'cord3', 'prod4', 'mcat8', 'class1', 'mate5', 0, 1, 0, '2024-02-21 14:20:26', '2024-02-21 14:20:26'),
(15, 'senq15', 'schl2', 'cord3', 'prod4', 'mcat8', 'class1', 'mate5', 0, 1, 0, '2024-02-21 14:24:20', '2024-02-21 14:24:20'),
(16, 'senq16', 'schl2', 'cord3', 'prod4', 'mcat8', 'class1', 'mate5', 0, 1, 0, '2024-02-21 14:25:55', '2024-02-21 14:25:55'),
(17, 'senq17', 'schl2', 'cord3', 'prod4', 'mcat8', 'class1', 'mate5', 0, 1, 0, '2024-02-21 14:30:20', '2024-02-21 14:30:20'),
(18, 'senq18', 'schl2', 'cord3', 'prod4', 'mcat8', 'class1', 'mate5', 0, 1, 0, '2024-02-21 14:47:36', '2024-02-21 14:47:36'),
(19, 'senq19', 'schl4', 'cord4', 'prod2', 'mcat1', 'class1', 'mate1', 0, 1, 0, '2024-02-22 02:16:24', '2024-02-22 02:16:24'),
(20, 'senq20', 'schl4', 'cord4', 'prod2', 'mcat1', 'class1', 'mate1', 0, 1, 0, '2024-02-26 06:33:35', '2024-02-26 06:33:35'),
(21, 'senq21', 'schl4', 'cord4', 'prod2', 'mcat1', 'class1', 'mate1', 0, 1, 0, '2024-02-26 07:31:19', '2024-02-26 07:31:19'),
(22, 'senq22', 'schl4', 'cord4', 'prod2', 'mcat1', 'class1', 'mate1', 0, 1, 0, '2024-02-26 07:32:14', '2024-02-26 07:32:14'),
(23, 'senq23', 'schl4', 'cord4', 'prod2', 'mcat1', 'class1', 'mate1', 0, 1, 0, '2024-02-26 11:22:08', '2024-02-26 11:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `school_registrations`
--

CREATE TABLE `school_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_registration_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_principal_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_file` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 2,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_registrations`
--

INSERT INTO `school_registrations` (`id`, `school_registration_id`, `coordinator_id`, `school_id`, `product_id`, `class_id`, `school_principal_name`, `username`, `password`, `school_file`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(2, 'sreg2', 'cord3', 'schl2', 'prod3', 'class1', 'rajjev', 'admin6', '111111', 'project_uploads/school/1705403434_deshmukh.jpg', 0, 0, '2024-01-16 11:10:34', '2024-02-16 12:16:14'),
(4, 'sreg4', 'cord4', 'schl4', 'prod4', 'class1', 'Narayanan PK', 'okkal', '$2y$12$nuzbZkK.Bn7gOqf84GeP7eBbAcqCdG.jejo/AvaKdT129gIagw6ke', NULL, 1, 0, '2024-01-27 16:05:49', '2024-01-27 16:05:49'),
(6, 'sreg6', 'cord4', 'schl3', 'prod2,prod3,prod4', 'class1,class3,class2', 'madvanan', 'mavab', '$2y$12$X2Y3r7XMlEyk8R3FXPswlOwUSYZdnfor8vpPy0qkAdv9lz/GU.ZaC', 'project_uploads/school/1706787582_dash_im.jpeg', 2, 0, '2024-02-01 11:39:42', '2024-02-01 11:39:42'),
(7, 'sreg7', 'cord4', 'schl1', 'prod2', 'class3', 'ppppp', 'admin', '$2y$12$qR.6ZUqaRGD/IGwtlalP7ux5owhDXPR6aKpEW4GMzgUcezqwewVr6', 'project_uploads/school/1706789302_batman_why_so_serious_4k_8k-HD.jpg', 1, 0, '2024-02-01 12:08:23', '2024-02-16 12:18:31'),
(9, 'sreg8', 'cord2', 'schl5', 'prod2', 'class1,class2', 'sanjjeeev', 'vjschool', '$2y$12$YGFE9aId6CV8/nq4g3mrpOtAfUW3F2.MfD1Y/XN6sIl2bwlEco.8G', 'project_uploads/school/1708063181_ths is file 3.jpeg', 1, 0, '2024-02-16 05:59:41', '2024-02-16 12:17:52'),
(10, 'sreg10', 'cord5', 'schl6', 'prod2,prod4', 'class1,class3', 'ppppp', 'admin', '$2y$12$lmrNLxM/F23bJtz6s3GfNO5X37pVIQwEZ9beBOLWzRyPHxTUcQr0G', NULL, 1, 0, '2024-02-20 09:42:13', '2024-02-21 23:11:03'),
(12, 'sreg11', 'cord3', 'schl7', 'prod2', 'class1', 'mohan', 'adminadi', '$2y$12$TTHwka5si0QDpcc4qTFTk.BnOSwtoLwxbhvOT6lQyj/T4ZN7jtzla', 'project_uploads/school/1708452209_ths is file 3.jpeg', 0, 0, '2024-02-20 18:03:30', '2024-02-21 23:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `school_stocks`
--

CREATE TABLE `school_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_stock_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_category_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_stocks`
--

INSERT INTO `school_stocks` (`id`, `school_stock_id`, `school_id`, `product_id`, `material_category_id`, `class_id`, `material_id`, `stock_quantity`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'sstk1', 'schl2', 'prod4', 'mcat8', 'class1', 'mate1', 50, 1, 0, '2024-01-26 05:45:55', '2024-01-26 05:45:55'),
(2, 'sstk2', 'schl2', 'prod2', 'mcat1', 'class2', 'mate2', 9, 1, 0, '2024-01-26 05:45:55', '2024-01-26 14:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `school_upload_orders`
--

CREATE TABLE `school_upload_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_upload_order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_details` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_upload_orders`
--

INSERT INTO `school_upload_orders` (`id`, `school_upload_order_id`, `school_id`, `file_name`, `file_details`, `file_path`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'suld1', 'schl4', 'school order1', '1 detais', 'project_uploads/school_upload_orders/1707999169_file 2.png', 1, 0, '2024-02-15 12:12:49', '2024-02-15 12:12:49'),
(2, 'suld2', 'schl4', 'file 2', '3', 'project_uploads/school_upload_orders/1707999234_Document.docx.pdf', 1, 0, '2024-02-15 12:13:54', '2024-02-15 12:13:54'),
(3, 'suld3', 'schl4', 'ths is file 3', 'details detials details', 'project_uploads/school_upload_orders/1708062094_dash_im.jpeg', 1, 0, '2024-02-16 05:41:35', '2024-02-16 05:41:35'),
(4, 'suld4', 'schl5', 'this is vj school', 'details of vj school file', 'project_uploads/school_upload_orders/1708063333_deshmukh.jpg', 1, 0, '2024-02-16 06:02:13', '2024-02-16 06:02:13'),
(5, 'suld5', 'schl4', 'here  is file 4', 'file 4 detaisl', 'project_uploads/school_upload_orders/1708258233_deshmukh.jpg', 1, 0, '2024-02-18 12:10:33', '2024-02-18 12:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_address_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinator_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `shipping_address_id`, `coordinator_id`, `name`, `address`, `landmark`, `city_id`, `state_id`, `country_id`, `pincode_id`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'ship1', 'cord4', 'default', 'default address', 'church', 'city1', 'stat1', 'cont1', 'pcode1', 1, 0, '2024-02-05 07:33:46', '2024-02-05 07:33:46'),
(2, 'ship2', 'cord4', 'address 2', 'another address to', 'school', 'city2', 'stat2', 'cont1', 'pcode2', 1, 0, '2024-02-05 07:34:15', '2024-02-05 07:34:15'),
(3, 'ship3', 'cord2', 'ship1', 'zzsfsfszfsd', 'palllli', 'city1', 'stat1', 'cont1', 'pcode1', 1, 0, '2024-02-07 09:57:57', '2024-02-07 09:57:57'),
(4, 'ship4', 'cord18', 'default', '100 1noreve lie to debai', 'abcd', 'city1', 'stat1', 'cont1', 'pcode1', 1, 0, '2024-02-27 15:39:51', '2024-02-27 15:39:51'),
(5, 'ship5', 'cord19', 'default', 'abc address', 'church', 'city1', 'stat1', 'cont1', 'pcode1', 1, 0, '2024-02-27 16:19:28', '2024-02-27 16:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_id`, `country_id`, `state`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'stat1', 'cont1', 'kerala', 1, 0, '2024-01-08 04:16:27', '2024-01-08 04:16:27'),
(2, 'stat2', 'cont1', 'Andra pradesh', 1, 0, '2024-01-08 04:17:51', '2024-01-08 04:17:51'),
(3, 'stat3', 'cont3', 'liverpool', 1, 0, '2024-01-09 04:53:00', '2024-01-09 04:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `godown_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_category_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `source` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `stock_id`, `godown_id`, `product_id`, `material_category_id`, `class_id`, `material_id`, `stock_quantity`, `source`, `remark`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'stoc1', 'godn1', 'prod2', 'mcat1', 'class1', 'mate1', 45, 'marchent', 'here is the remarkkkkjkhkkiio', 1, 0, '2024-02-12 11:37:12', '2024-02-27 16:21:19'),
(2, 'stoc2', 'godn1', 'prod2', 'mcat1', 'class2', 'mate2', 32, 'zddzz', 'here is the remarkkkkjkh', 1, 0, '2024-02-12 11:37:38', '2024-02-27 16:21:19'),
(3, 'stoc3', 'godn1', 'prod2', 'mcat1', 'class3', 'mate3', 25, 'lopoiu', 'here is the remark', 1, 0, '2024-02-12 11:38:01', '2024-02-13 12:14:38'),
(4, 'stoc4', 'godn5', 'prod2', 'mcat1', 'class1', 'mate1', 100, 'marchent', 'here is the remarkkkkjkhkkiio', 1, 0, '2024-02-20 09:36:02', '2024-02-20 09:36:49'),
(5, 'stoc5', 'godn1', 'prod2', 'mcat1', 'class1', 'mate1', 12, 'new source', 'wwww', 1, 0, '2024-02-20 15:48:19', '2024-02-20 15:48:19'),
(6, 'stoc6', 'godn1', 'prod2', 'mcat1', 'class1', 'mate1', 50, 'yetagain', 'hurry', 1, 0, '2024-02-20 16:55:32', '2024-02-20 16:55:32'),
(7, 'stoc7', 'godn1', 'prod2', 'mcat1', 'class2', 'mate2', 60, 'xdfgvsxdgv', 'xdsgvsxgsx', 1, 0, '2024-02-20 16:56:17', '2024-02-20 16:56:17'),
(8, 'stoc8', 'godn5', 'prod2', 'mcat1', 'class1', 'mate1', 20, 'fdg', 'xdgxdg', 1, 0, '2024-02-20 16:57:06', '2024-02-20 16:57:06'),
(9, 'stoc9', 'godn5', 'prod4', 'mcat8', 'class1', 'mate5', 54, 'zddzzd', 'grgr', 1, 0, '2024-02-20 16:58:16', '2024-02-20 16:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_category_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_mobile` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_occupation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `school_id`, `product_id`, `material_category_id`, `class_id`, `student_name`, `student_username`, `mobile`, `email`, `address`, `parent_name`, `parent_email`, `parent_mobile`, `parent_occupation`, `year_id`, `password`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'stud1', 'schl1', 'prod4', 'mcat8', 'class1', 'Roopesh Krishnan', 'rk47c4', '9061400906', 'rk47c4@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$eAapabEiW5nEOnPNbEVweOI2a13h2DK8V0ZpCEuNawF3mpKN64P3m', 1, 0, '2024-01-15 02:00:23', '2024-01-15 02:00:23'),
(2, 'stud2', 'schl2', 'prod3', 'mcat5', 'class2', 'Staison salmen', 'stais05', '987458562', 'staison@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$eAapabEiW5nEOnPNbEVweOI2a13h2DK8V0ZpCEuNawF3mpKN64P3m', 1, 0, '2024-01-15 07:45:45', '2024-01-15 07:45:45'),
(5, 'stud3', 'schl2', 'prod4', 'mcat8', 'class1', 'ribin davis', 'ribin', '987458568', 'ribin@gmail.com', 'thuravakkath', 'ribin devasy', 'ribindev@gmil.com', '8985425698', 'great', NULL, '$2y$12$eAapabEiW5nEOnPNbEVweOI2a13h2DK8V0ZpCEuNawF3mpKN64P3m', 1, 0, '2024-01-22 09:25:22', '2024-02-21 11:44:50'),
(6, 'stud6', 'schl2', 'prod2', 'mcat1', 'class2', 'agarsha merin', 'agarsha', '987458562', 'merin@gmail.com', 'angamaly', 'merin father', 'meringftaher@gmail.com', '9785458988', 'greatAgain', NULL, '$2y$12$eAapabEiW5nEOnPNbEVweOI2a13h2DK8V0ZpCEuNawF3mpKN64P3m', 1, 0, '2024-01-22 09:27:41', '2024-02-03 09:03:37'),
(7, 'stud7', 'schl4', 'prod4', 'mcat8', 'class3', 'ribin davis', 'ribin', '9658955452', 'ribin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$eAapabEiW5nEOnPNbEVweOI2a13h2DK8V0ZpCEuNawF3mpKN64P3m', 1, 0, '2024-01-28 07:19:19', '2024-01-28 07:19:19'),
(8, 'stud8', 'schl1', 'prod2', 'mcat1', 'class1', 'janesh james', 'jj', '8585858585', 'jj@gmail.com', 'kalday chengal', 'jj father', 'jjf@gmail.com', '7656789046', 'great', NULL, '$2y$12$K4aUNsWHiIPfBdxuJOZYp.HtuzeusTD1iXKTzQmcSZ7Q/pzilKiKG', 1, 0, '2024-02-02 09:45:22', '2024-02-03 09:02:07'),
(9, 'stud9', 'schl4', 'prod5', 'mcat10', 'class1', 'anoop vk', 'vk', '9658955452', 'vk@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$T.M5MpkNHHIA8ccwqCHFYum9qzDHAx7gJh0l2I8PlCEUdHcJmm2L.', 1, 0, '2024-02-03 10:18:56', '2024-02-03 10:18:56'),
(10, 'stud10', 'schl6', 'prod2', 'mcat1', 'class1', 'ribin davis', 'ooo', '987458562', 'rk47c4@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$o0GVpYg4V2XglSruJZXtmOulLAfNN/6SqM63aG3msYJDDT7Ppx8uG', 1, 0, '2024-02-20 09:43:39', '2024-02-20 09:43:39'),
(11, 'stud11', 'schl4', 'prod2', 'mcat1', 'class2', 'leo george', 'leo', '8987854258', 'otherf54@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$6R2vdtBZarxHZylOvwdeJ.598BuX.XeevWZuJZn7PktnUUdHdQclm', 1, 0, '2024-02-20 18:36:21', '2024-02-20 18:36:21'),
(12, 'stud12', 'schl4', 'prod6', 'mcat14', 'class1', 'lia george', 'lia', '8987854258', 'otherf54@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$Dt/ui6xZQSqa39U7BUBhP.NVMQHgGRaqxqMx3oQ/xgZDIZEsl4E8K', 1, 0, '2024-02-21 11:32:00', '2024-02-21 11:32:00'),
(13, 'stud13', 'schl4', 'prod5', 'mcat10', 'class3', 'nishal', 'nishal', '9061400906', 'rk47c4@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$mdN4xApjnM4xtfYpWI/MkeZ.7GjXVchVhXj/qYMKKcVaZ.Ag9FsAS', 1, 0, '2024-02-21 11:34:37', '2024-02-21 11:34:37'),
(14, 'stud14', 'schl4', 'prod2', 'mcat1', 'class1', 'aniyankuttan', 'aniyan', '8987854258', 'rk47c4@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$Edkc6RKiJ7Rpza9fbzPUZuZlxv7.MDQFnkfdqkX16dKXkuKE2gjLq', 1, 0, '2024-02-21 11:42:16', '2024-02-21 11:42:16'),
(15, 'stud15', 'schl3', 'prod2', 'mcat1', 'class2', 'Aryan john', 'aryan', '8987854258', 'rk47c4@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$izttL0LYVrbhpT07ofRNeO82EuRJ5/B/Jcvh4/X4GYdUUDQ3W3Y/q', 1, 0, '2024-02-21 17:10:30', '2024-02-21 17:10:30'),
(16, 'stud16', 'schl4', 'prod2', 'mcat1', 'class1', 'oooooo', 'ooo', '9658955452', 'otherf54@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$s8s56ONVMWDrX8GEW5aRheKYg4HBlzA.aXEldVwRtVGDhuE0y/Zp2', 1, 0, '2024-02-22 06:49:37', '2024-02-22 06:49:37'),
(17, 'stud17', 'schl2', 'prod4', 'mcat8', 'class1', 'arun kmar vk', 'arun', '9658955452', 'otherf54@gmail.com', NULL, NULL, NULL, NULL, NULL, 'year1', '$2y$12$xjwodCjrSLtWo.ErCVsjmuPYecekRNRCFR8.CJ1suacwX0nT4JMYu', 1, 0, '2024-02-25 16:39:22', '2024-02-25 16:39:22'),
(18, 'stud18', 'schl3', 'prod3', 'mcat5', 'class1', 'babita', 'bab', '9061400906', 'rk47c4@gmail.com', NULL, NULL, NULL, NULL, NULL, 'year2', '$2y$12$kkhsYlRkKzhmpEXplaT5iOw0jSqqP9yDIbQbc5MKucZARblZh33VS', 1, 0, '2024-02-25 16:44:02', '2024-02-25 16:44:02'),
(19, 'stud19', 'schl1', 'prod5', 'mcat10', 'class2', 'sreekumar', 'sree', '9061400906', 'rooopu007.54@gmail.com', NULL, NULL, NULL, NULL, NULL, 'year8', '$2y$12$TCflI29u7DGXuyTXRAkzAODstEWJuITP.fpo9twYJE8rKM9av.WJy', 1, 0, '2024-02-25 16:47:23', '2024-02-25 16:47:23'),
(20, 'stud20', 'schl4', 'prod6', 'mcat14', 'class2', 'nandhu', 'nandu', '9061400906', 'rk47c4@gmail.com', NULL, NULL, NULL, NULL, NULL, 'year11', '$2y$12$0k/2AL7OaEAWKu5SRrRr0ux11MEGJmGgAAS4HQ5gCj3KK1xsYGRyq', 1, 0, '2024-02-25 16:52:39', '2024-02-25 16:52:39'),
(21, 'stud21', 'schl4', 'prod2', 'mcat1', 'class1', 'krishnaprasad', 'kp', '8987854258', 'kp@gmail.com', NULL, NULL, NULL, NULL, NULL, 'year1', '$2y$12$hnUP4cj6loSvNbPxGoveWu4LdYgs0o7tZ9DhWfDvHTdFESAh1ZTOS', 1, 0, '2024-02-26 06:21:08', '2024-02-26 06:21:08'),
(22, 'stud22', 'schl4', 'prod2', 'mcat1', 'class1', 'Roopesh Krishnan', 'rk', '9061400906', 'rk47c4@gmail.com', NULL, NULL, NULL, NULL, NULL, 'year1', '$2y$12$IlT8Qpte2C7dU4lCTSB3s.FSYCEidnEPsasbFQuApaOzORKyKrj6m', 1, 0, '2024-02-26 11:08:42', '2024-02-26 11:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `student_current_records`
--

CREATE TABLE `student_current_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_current_record_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_category_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_level_material_purchase_status` int(11) DEFAULT NULL,
  `type_of_exam` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `mock_exam_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_exam_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_level_mockexam_attended_status` tinyint(1) NOT NULL DEFAULT 0,
  `current_level_mockexam_result_status` tinyint(1) NOT NULL DEFAULT 0,
  `current_level_exam_attended_status` int(11) NOT NULL DEFAULT 0,
  `current_level_exam_result_status` int(11) NOT NULL DEFAULT 0,
  `final_status` int(11) NOT NULL DEFAULT 0,
  `win_or_lose` int(11) NOT NULL DEFAULT 2,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_current_records`
--

INSERT INTO `student_current_records` (`id`, `student_current_record_id`, `student_id`, `product_id`, `material_category_id`, `class_id`, `year_id`, `current_level_material_purchase_status`, `type_of_exam`, `mock_exam_id`, `final_exam_id`, `current_level_mockexam_attended_status`, `current_level_mockexam_result_status`, `current_level_exam_attended_status`, `current_level_exam_result_status`, `final_status`, `win_or_lose`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(14, 'stcr14', 'stud18', 'prod3', 'mcat5', 'class1', 'year2', 0, 'none', NULL, NULL, 0, 0, 0, 0, 0, 2, 1, 0, '2024-02-25 16:44:02', '2024-02-25 16:44:02'),
(15, 'stcr15', 'stud19', 'prod5', 'mcat10', 'class2', 'year8', 0, 'none', NULL, NULL, 0, 0, 0, 0, 0, 2, 1, 0, '2024-02-25 16:47:23', '2024-02-25 16:47:23'),
(16, 'stcr16', 'stud20', 'prod6', 'mcat14', 'class2', 'year11', 0, 'none', NULL, NULL, 0, 0, 0, 0, 0, 2, 1, 0, '2024-02-25 16:52:39', '2024-02-25 16:52:39'),
(18, 'stcr18', 'stud22', 'prod2', 'mcat1', 'class1', 'year1', 1, 'final', 'mexm8', 'fexm6', 1, 1, 1, 0, 1, 0, 1, 0, '2024-02-26 11:08:42', '2024-02-27 09:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year_id`, `year`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'year1', '2020-2021', 1, 0, '2024-01-20 06:34:13', '2024-01-20 06:34:13'),
(2, 'year2', '2021-2022', 1, 0, '2024-01-20 06:41:42', '2024-01-20 06:41:42'),
(3, 'year3', '2000-2001', 1, 0, '2024-02-17 07:42:30', '2024-02-17 07:42:30'),
(4, 'year4', '2001-2002', 1, 0, '2024-02-17 07:42:40', '2024-02-17 07:42:40'),
(5, 'year5', '2002-2003', 1, 0, '2024-02-17 07:42:49', '2024-02-17 07:42:49'),
(6, 'year6', '2003-2004', 1, 0, '2024-02-17 07:42:56', '2024-02-17 07:42:56'),
(7, 'year7', '2004-2005', 1, 0, '2024-02-17 07:43:02', '2024-02-17 07:43:02'),
(8, 'year8', '2005-2006', 1, 0, '2024-02-17 07:43:10', '2024-02-17 07:43:10'),
(9, 'year9', '2006-2007', 1, 0, '2024-02-17 07:43:17', '2024-02-17 07:43:17'),
(10, 'year10', '2007-2008', 1, 0, '2024-02-17 07:43:24', '2024-02-17 07:43:24'),
(11, 'year11', '2008-2009', 1, 0, '2024-02-17 07:43:32', '2024-02-17 07:43:32'),
(12, 'year12', '2009-2010', 1, 0, '2024-02-17 07:43:41', '2024-02-17 07:43:41'),
(13, 'year13', '2010-2011', 1, 0, '2024-02-17 07:43:54', '2024-02-17 07:43:54'),
(14, 'year14', '2011-2012', 1, 0, '2024-02-17 07:44:04', '2024-02-17 07:44:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_admin_id_unique` (`admin_id`);

--
-- Indexes for table `admin_ledgers`
--
ALTER TABLE `admin_ledgers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_ledgers_admin_ledger_id_unique` (`admin_ledger_id`);

--
-- Indexes for table `admin_resources`
--
ALTER TABLE `admin_resources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_resources_admin_resource_id_unique` (`admin_resource_id`);

--
-- Indexes for table `assign_examiner_to_users`
--
ALTER TABLE `assign_examiner_to_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `assign_examiner_to_users_assign_examiner_to_user_id_unique` (`assign_examiner_to_user_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_city_id_unique` (`city_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schools_school_id_unique` (`school_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classes_class_id_unique` (`class_id`);

--
-- Indexes for table `consolidate_orders`
--
ALTER TABLE `consolidate_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `consolidate_orders_consolidate_order_id_unique` (`consolidate_order_id`);

--
-- Indexes for table `coordinators`
--
ALTER TABLE `coordinators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coordinators_coordinator_id_unique` (`coordinator_id`);

--
-- Indexes for table `coordinator_orders`
--
ALTER TABLE `coordinator_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coordinator_orders_coordinator_order_id_unique` (`coordinator_order_id`);

--
-- Indexes for table `coordinator_outstandings`
--
ALTER TABLE `coordinator_outstandings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coordinator_outstandings_coordinator_outstanding_id_unique` (`coordinator_outstanding_id`);

--
-- Indexes for table `coordinator_payments`
--
ALTER TABLE `coordinator_payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coordinator_payments_coordinator_payment_id_unique` (`coordinator_payment_id`);

--
-- Indexes for table `coordinator_stocks`
--
ALTER TABLE `coordinator_stocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coordinator_stocks_coordinator_stock_id_unique` (`coordinator_stock_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_country_id_unique` (`country_id`);

--
-- Indexes for table `examiners`
--
ALTER TABLE `examiners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `examiners_examiner_id_unique` (`examiner_id`);

--
-- Indexes for table `examiner_meet_links`
--
ALTER TABLE `examiner_meet_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `examiner_meet_links_examiner_meet_link_id_unique` (`examiner_meet_link_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `final_exams`
--
ALTER TABLE `final_exams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `final_exams_final_exam_id_unique` (`final_exam_id`);

--
-- Indexes for table `godowns`
--
ALTER TABLE `godowns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `godowns_godown_id_unique` (`godown_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materials_material_id_unique` (`material_id`);

--
-- Indexes for table `material_categories`
--
ALTER TABLE `material_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `material_categories_material_category_id_unique` (`material_category_id`);

--
-- Indexes for table `material_enquiries`
--
ALTER TABLE `material_enquiries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `material_enquiries_material_enquiry_id_unique` (`material_enquiry_id`);

--
-- Indexes for table `material_purchases`
--
ALTER TABLE `material_purchases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `material_purchases_material_purchase_id_unique` (`material_purchase_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mock_exams`
--
ALTER TABLE `mock_exams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mock_exams_mock_exam_id_unique` (`mock_exam_id`);

--
-- Indexes for table `national_coordinators`
--
ALTER TABLE `national_coordinators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `national_coordinators_national_coordinator_id_unique` (`national_coordinator_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notifications_notification_id_unique` (`notification_id`);

--
-- Indexes for table `office_contacts`
--
ALTER TABLE `office_contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `office_contacts_office_contact_id_unique` (`office_contact_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pincodes`
--
ALTER TABLE `pincodes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pincodes_pincode_id_unique` (`pincode_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_id_unique` (`product_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `results_result_id_unique` (`result_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schools_school_id_unique` (`school_id`);

--
-- Indexes for table `school_examiners`
--
ALTER TABLE `school_examiners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_examiners_school_examiner_id_unique` (`school_examiner_id`);

--
-- Indexes for table `school_material_enquiries`
--
ALTER TABLE `school_material_enquiries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_material_enquiries_school_material_enquiry_id_unique` (`school_material_enquiry_id`);

--
-- Indexes for table `school_registrations`
--
ALTER TABLE `school_registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_registrations_school_registration_id_unique` (`school_registration_id`);

--
-- Indexes for table `school_stocks`
--
ALTER TABLE `school_stocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_stocks_school_stock_id_unique` (`school_stock_id`);

--
-- Indexes for table `school_upload_orders`
--
ALTER TABLE `school_upload_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_upload_orders_school_upload_order_id_unique` (`school_upload_order_id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shipping_addresses_shipping_address_id_unique` (`shipping_address_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `states_state_id_unique` (`state_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stocks_stock_id_unique` (`stock_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`);

--
-- Indexes for table `student_current_records`
--
ALTER TABLE `student_current_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_current_records_student_current_record_id_unique` (`student_current_record_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `years_year_id_unique` (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_ledgers`
--
ALTER TABLE `admin_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admin_resources`
--
ALTER TABLE `admin_resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assign_examiner_to_users`
--
ALTER TABLE `assign_examiner_to_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `consolidate_orders`
--
ALTER TABLE `consolidate_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coordinators`
--
ALTER TABLE `coordinators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `coordinator_orders`
--
ALTER TABLE `coordinator_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `coordinator_outstandings`
--
ALTER TABLE `coordinator_outstandings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coordinator_payments`
--
ALTER TABLE `coordinator_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coordinator_stocks`
--
ALTER TABLE `coordinator_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `examiners`
--
ALTER TABLE `examiners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `examiner_meet_links`
--
ALTER TABLE `examiner_meet_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_exams`
--
ALTER TABLE `final_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `godowns`
--
ALTER TABLE `godowns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `material_categories`
--
ALTER TABLE `material_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `material_enquiries`
--
ALTER TABLE `material_enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `material_purchases`
--
ALTER TABLE `material_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `mock_exams`
--
ALTER TABLE `mock_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `national_coordinators`
--
ALTER TABLE `national_coordinators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `office_contacts`
--
ALTER TABLE `office_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pincodes`
--
ALTER TABLE `pincodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `school_examiners`
--
ALTER TABLE `school_examiners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `school_material_enquiries`
--
ALTER TABLE `school_material_enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `school_registrations`
--
ALTER TABLE `school_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `school_stocks`
--
ALTER TABLE `school_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school_upload_orders`
--
ALTER TABLE `school_upload_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student_current_records`
--
ALTER TABLE `student_current_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
