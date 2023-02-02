-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 10:02 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rc_mt_db_server_29122022`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `name`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'CPWD', 1, 1, '2022-11-10 12:07:25', NULL),
(2, 'WAPCOS', 1, 1, '2022-11-10 12:07:33', NULL),
(3, 'NBCC', 1, 1, '2022-11-10 12:08:18', NULL),
(4, 'OTHERS', 1, 1, '2022-11-10 12:08:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `financemanages`
--

CREATE TABLE `financemanages` (
  `id` bigint(20) NOT NULL,
  `project_center_id` bigint(20) DEFAULT NULL,
  `finance_id` bigint(20) DEFAULT NULL,
  `template_id` bigint(20) NOT NULL,
  `rc_id` bigint(20) DEFAULT NULL,
  `budget_code` bigint(20) DEFAULT NULL,
  `be_re` double DEFAULT NULL,
  `opening_balance` double DEFAULT NULL,
  `fund_received` double DEFAULT NULL,
  `total_funds` double DEFAULT NULL,
  `expenditure_incurred` double DEFAULT NULL,
  `commited_liabilities` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_for` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `financemanages`
--

INSERT INTO `financemanages` (`id`, `project_center_id`, `finance_id`, `template_id`, `rc_id`, `budget_code`, `be_re`, `opening_balance`, `fund_received`, `total_funds`, `expenditure_incurred`, `commited_liabilities`, `balance`, `remark`, `created_for`, `updated_by`, `deleted_by`, `status`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2517, 12, 1, NULL, 29, 0, 0, 0, 0, 0, 0, 0, NULL, 2517, 2517, NULL, 1, 2517, '2022-11-24 06:32:54', '2022-11-24 06:33:36', NULL),
(2, 2517, 13, 1, NULL, 36, 1.45, 0, 2.02, 2.02, 1.17, 0, 0.85, NULL, 2517, 2517, NULL, 1, 2517, '2022-11-24 06:33:36', '2022-11-24 06:34:01', NULL),
(3, 2517, 14, 1, NULL, 37, 1.3, 0, 0.64, 0.64, 0.32, 0, 0.32, NULL, 2517, 2517, NULL, 1, 2517, '2022-11-24 06:34:01', '2022-11-25 05:27:46', NULL),
(4, 2517, 15, 1, NULL, 26, 21.43, 0.02, 11.5, 11.52, 11.4, 0, 0.12, NULL, 2517, 2517, NULL, 1, 2517, '2022-11-25 05:27:46', '2022-11-25 05:28:15', NULL),
(5, 2517, 19, 1, NULL, 35, 11.9, 0.02, 5.3, 5.32, 5.22, 0, 0.1, NULL, 2517, 2517, NULL, 1, 2517, '2022-11-25 05:28:15', '2022-11-25 05:28:54', NULL),
(6, 2517, 18, 1, NULL, 42, 15.94, 0.1, 4.95, 5.05, 4.95, 0, 0.1, NULL, 2517, 2517, NULL, 1, 2517, '2022-11-25 05:28:54', '2022-11-25 05:29:30', NULL),
(7, 2517, 16, 1, NULL, 40, 24.03, 0.82, 1.5, 2.32, 0.64, 0, 1.68, NULL, 2517, 2517, NULL, 1, 2517, '2022-11-25 05:29:30', '2022-11-25 05:29:58', NULL),
(8, 2517, 17, 1, NULL, 38, 0.11, 0, 0.02, 0.02, 0.02, 0, 0, NULL, 2517, NULL, NULL, 1, 2517, '2022-11-25 05:29:58', '2022-11-25 05:29:58', NULL),
(9, 3012, 20, 1, NULL, 26, 0, 0.01, 8.39, 8.4, 9.15, 0.39, -1.14, NULL, 3012, NULL, NULL, 1, 2523, '2022-11-28 00:28:52', '2022-11-28 00:28:52', NULL),
(10, 3012, 2, 1, NULL, 35, 0, 0.13, 4.35, 4.48, 2.4, 0, 2.08, NULL, 3012, NULL, NULL, 1, 2523, '2022-11-28 00:28:52', '2022-11-28 00:28:52', NULL),
(11, 3012, 4, 1, NULL, 36, 0, 0.07, 2.15, 2.22, 0.52, 0, 1.7, NULL, 3012, NULL, NULL, 1, 2523, '2022-11-28 00:28:52', '2022-11-28 00:28:52', NULL),
(12, 3012, 5, 1, NULL, 37, 0, 0.04, 1.18, 1.22, 1.79, 0, -0.57, NULL, 3012, NULL, NULL, 1, 2523, '2022-11-28 00:28:52', '2022-11-28 00:28:52', NULL),
(13, 3012, 9, 1, NULL, 42, 0, 0.05, 4.19, 4.24, 4.56, 0, -0.32, NULL, 3012, NULL, NULL, 1, 2523, '2022-11-28 00:28:52', '2022-11-28 00:28:52', NULL),
(14, 3012, 10, 1, NULL, 40, 0, 0.04, 0, 0.04, 0, 0, 0.04, NULL, 3012, NULL, NULL, 1, 2523, '2022-11-28 00:28:52', '2022-11-28 00:28:52', NULL),
(15, 3012, 11, 1, NULL, 38, 0, 0, 0, 0, 0.12, 0, -0.12, NULL, 3012, NULL, NULL, 1, 2523, '2022-11-28 00:28:52', '2022-11-28 00:28:52', NULL),
(16, 3019, 29, 1, NULL, 26, 21.4, 0, 12.41, 12.41, 12.41, 2.3, -2.3, 'required for monthly salary and pension for and benefits of Sh. Nemai Bose, retd. Ath. Coach,  MACP arrears, allowances etc', 3019, 2515, NULL, 1, 2515, '2022-11-29 00:04:21', '2022-11-29 00:27:01', NULL),
(17, 3019, 30, 1, NULL, 51, 4.92, 0, 3.28, 3.28, 2.58, 0.3, 0.4, NULL, 3019, 2515, NULL, 1, 2515, '2022-11-29 00:09:24', '2022-11-29 00:11:04', NULL),
(18, 3019, 31, 1, NULL, 35, 3.09, 0, 1.92, 1.92, 1.92, 0.5, -0.5, 'Fund required for regular maintenance', 3019, 2515, NULL, 1, 2515, '2022-11-29 00:09:24', '2022-11-29 00:27:01', NULL),
(19, 3019, 32, 1, NULL, 35, 0.4, 0, 0.14, 0.14, 0.09, 0.05, 0, 'Fund required for purchase of furniture, fixtures, office equip. etc', 3019, 2515, NULL, 1, 2515, '2022-11-29 00:09:24', '2022-11-29 00:27:01', NULL),
(20, 3019, 33, 1, NULL, 68, 1.27, 0, 0.6, 0.6, 0.01, 0, 0.59, NULL, 3019, 2515, NULL, 1, 2515, '2022-11-29 00:11:05', '2022-11-29 00:11:51', NULL),
(21, 3019, 34, 1, NULL, 40, 1.24, 0.27, 0.8, 1.07, 0.38, 0.04, 0.65, NULL, 3019, 2515, NULL, 1, 2515, '2022-11-29 00:11:05', '2022-11-29 00:11:51', NULL),
(22, 3019, 35, 1, NULL, 40, 0.09, 0, 0.05, 0.05, 0.04, 0, 0.01, NULL, 3019, 2515, NULL, 1, 2515, '2022-11-29 00:11:51', '2022-11-29 00:12:45', NULL),
(23, 3019, 36, 1, NULL, 40, 0.09, 0, 0.02, 0.02, 0.02, 0, 0, NULL, 3019, 2515, NULL, 1, 2515, '2022-11-29 00:12:45', '2022-11-29 00:15:33', NULL),
(24, 3020, 21, 1, NULL, 26, 55.92, 3.78, 33.68, 37.46, 36.42, 1.04, 0, NULL, 3020, 2514, NULL, 1, 2514, '2022-11-29 00:14:33', '2022-11-29 00:15:24', NULL),
(25, 3019, 37, 1, NULL, 40, 0.08, 0, 0.08, 0.08, 0.02, 0, 0.06, NULL, 3019, 2515, NULL, 1, 2515, '2022-11-29 00:15:33', '2022-11-29 00:27:01', NULL),
(26, 3019, 38, 1, NULL, 41, 0.93, 0, 1.4, 1.4, 0.09, 0, 1.31, 'Fund received for Rs.47.13lakh', 3019, 2515, NULL, 1, 2515, '2022-11-29 00:15:33', '2022-11-29 00:27:01', NULL),
(27, 3020, 22, 1, NULL, 35, 8.96, 1.41, 5.62, 7.03, 4.75, 0.38, 1.9, NULL, 3020, 2514, NULL, 1, 2514, '2022-11-29 00:16:11', '2022-11-29 00:16:50', NULL),
(28, 3020, 23, 1, NULL, 29, 2.1, 0.2, 1.16, 1.36, 0.46, 0.7, 0.2, NULL, 3020, 2514, NULL, 1, 2514, '2022-11-29 00:16:50', '2022-11-29 00:17:30', NULL),
(29, 3020, 24, 1, NULL, 36, 1.69, 0, 2.56, 2.56, 0.28, 1.12, 1.16, NULL, 3020, 2514, NULL, 1, 2514, '2022-11-29 00:17:31', '2022-11-29 00:18:26', NULL),
(30, 3020, 25, 1, NULL, 37, 1.65, 0, 0.44, 0.44, 0.27, 0.31, -0.14, NULL, 3020, 2514, NULL, 1, 2514, '2022-11-29 00:18:26', '2022-11-29 00:19:53', NULL),
(31, 3020, 26, 1, NULL, 42, 7.81, 0, 4.62, 4.62, 4.48, 0.17, -0.03, NULL, 3020, 2514, NULL, 1, 2514, '2022-11-29 00:19:53', '2022-11-29 00:20:02', NULL),
(32, 3020, 27, 1, NULL, 40, 1, 2.05, 0, 2.05, 1.13, 1.23, -0.31, NULL, 3020, 2514, NULL, 1, 2514, '2022-11-29 00:21:46', '2022-11-29 00:22:24', NULL),
(33, 3020, 28, 1, NULL, 38, 0, 0, 0, 0, 0, 0, 0, NULL, 3020, NULL, NULL, 1, 2514, '2022-11-29 00:22:24', '2022-11-29 00:22:24', NULL),
(34, 3020, 28, 1, NULL, 38, 0, 0, 0, 0, 0, 0, 0, NULL, 3020, NULL, NULL, 1, 2514, '2022-11-29 00:22:24', '2022-11-29 00:22:24', NULL),
(35, 3009, 39, 1, NULL, 26, 21.63, -0.74, 14.89, 14.15, 13.29, 0.35, 0.51, NULL, 3009, NULL, NULL, 1, 2519, '2022-11-29 01:22:15', '2022-11-29 01:22:15', NULL),
(36, 3009, 40, 1, NULL, 35, 3.74, 3.19, 4.13, 7.32, 4.18, 0.35, 2.79, 'Balance availabe with STC\'s (Kashipur, Bareilly & Raebareli). The said funds received in year 20-21 for focused STC\'s', 3009, NULL, NULL, 1, 2519, '2022-11-29 01:22:15', '2022-11-29 01:22:15', NULL),
(37, 3009, 41, 1, NULL, 29, 0, 0, 0, 0, 0, 0, 0, NULL, 3009, NULL, NULL, 1, 2519, '2022-11-29 01:22:15', '2022-11-29 01:22:15', NULL),
(38, 3009, 42, 1, NULL, 36, 0.91, -0.14, 1.18, 1.04, 0.315, 0.24, 0.49, NULL, 3009, NULL, NULL, 1, 2519, '2022-11-29 01:22:15', '2022-11-29 01:22:15', NULL),
(39, 3009, 43, 1, NULL, 37, 0.28, -0.22, 0.14, -0.08, 0.008, 0, -0.09, NULL, 3009, NULL, NULL, 1, 2519, '2022-11-29 01:22:15', '2022-11-29 01:22:15', NULL),
(40, 3009, 44, 1, NULL, 42, 1.28, 0.62, 4.83, 5.45, 3.5, 0.23, 1.72, NULL, 3009, NULL, NULL, 1, 2519, '2022-11-29 01:22:15', '2022-11-29 01:22:15', NULL),
(41, 3009, 45, 1, NULL, 40, 1.05, 1.21, 0.51, 1.72, 0.88, 0, 0.84, NULL, 3009, NULL, NULL, 1, 2519, '2022-11-29 01:22:15', '2022-11-29 01:22:15', NULL),
(42, 3009, 46, 1, NULL, 38, 0, 0, 0, 0, 0, 0, 0, NULL, 3009, NULL, NULL, 1, 2519, '2022-11-29 01:22:15', '2022-11-29 01:22:15', NULL),
(43, 3017, 48, 1, NULL, 37, 37.01, NULL, NULL, NULL, 127914, NULL, NULL, NULL, 3017, NULL, NULL, 1, 5924, '2022-11-30 02:55:18', '2022-11-30 02:55:18', NULL),
(44, 3003, 51, 1, NULL, 26, 32.05, 0.42, 19.98, 20.4, 18.38, 1.3, 0.72, NULL, 3003, 2521, NULL, 1, 2521, '2022-12-01 03:29:06', '2022-12-01 05:01:46', NULL),
(45, 2520, 52, 1, NULL, 26, 0, 1.8599, 9.7998, 11.66, 11.5492, 0, 0.11, NULL, 2520, NULL, 2520, 1, 2520, '2022-12-01 04:27:23', '2022-12-01 04:27:32', '2022-12-01 04:27:32'),
(46, 2520, 52, 1, NULL, 26, 0, 1.8599, 9.7998, 11.66, 11.5492, 0, 0.11, NULL, 2520, 2520, NULL, 1, 2520, '2022-12-01 04:33:45', '2022-12-01 04:34:15', NULL),
(47, 2520, 53, 1, NULL, 35, 0, 0.9486, 4.619, 5.57, 4.0735, 0.5562, 0.94, NULL, 2520, 2520, NULL, 1, 2520, '2022-12-01 04:34:15', '2022-12-01 04:37:57', NULL),
(48, 2520, 54, 1, NULL, 29, 0, 0.0817, 0.23, 0.31, 0, 0.0714, 0.24, NULL, 2520, NULL, NULL, 1, 2520, '2022-12-01 04:37:57', '2022-12-01 04:37:57', NULL),
(49, 2520, 55, 1, NULL, 36, 0, -0.4275, 2.47, 2.04, 0.2509, 0.06, 1.73, NULL, 2520, NULL, NULL, 1, 2520, '2022-12-01 04:37:57', '2022-12-01 04:37:57', NULL),
(50, 2520, 56, 1, NULL, 37, 0, 0.0763, 0.53, 0.61, 0.2313, 0.2477, 0.13, NULL, 2520, NULL, NULL, 1, 2520, '2022-12-01 04:37:57', '2022-12-01 04:37:57', NULL),
(51, 2520, 57, 1, NULL, 42, 0, 0.0973, 4.0634, 4.16, 3.5821, 0.66, -0.08, NULL, 2520, NULL, NULL, 1, 2520, '2022-12-01 04:37:57', '2022-12-01 04:37:57', NULL),
(52, 2520, 58, 1, NULL, 40, 0, 0.46, 0.3056, 0.77, 0.3458, 0.233, 0.19, NULL, 2520, NULL, NULL, 1, 2520, '2022-12-01 04:37:57', '2022-12-01 04:37:57', NULL),
(53, 2520, 59, 1, NULL, 38, 0, 0.1086, 0, 0.11, 0.1084, 0.06, -0.06, NULL, 2520, NULL, NULL, 1, 2520, '2022-12-01 04:37:57', '2022-12-01 04:37:57', NULL),
(54, 3003, 60, 1, NULL, 35, 7.95, 0.7, 5.17, 5.87, 2.9, 2.05, 0.92, NULL, 3003, NULL, NULL, 1, 2521, '2022-12-01 05:01:46', '2022-12-01 05:01:46', NULL),
(55, 3003, 61, 1, NULL, 29, 0, 0.07, 0, 0.07, 0.07, 0, 0, NULL, 3003, NULL, NULL, 1, 2521, '2022-12-01 05:01:46', '2022-12-01 05:01:46', NULL),
(56, 3003, 62, 1, NULL, 36, 1, 0.73, 2.34, 3.07, 0.44, 2.08, 0.55, NULL, 3003, NULL, NULL, 1, 2521, '2022-12-01 05:01:46', '2022-12-01 05:01:46', NULL),
(57, 3003, 63, 1, NULL, 37, 0.07, 0.66, 0.44, 1.1, 0.4, 0.6, 0.1, NULL, 3003, NULL, NULL, 1, 2521, '2022-12-01 05:01:46', '2022-12-01 05:01:46', NULL),
(58, 3003, 64, 1, NULL, 42, 6.98, 8.64, 8.61, 17.25, 9.94, 2, 5.31, '4.40 with STCs AND Rohtak', 3003, NULL, NULL, 1, 2521, '2022-12-01 05:01:46', '2022-12-01 05:01:46', NULL),
(59, 3003, 65, 1, NULL, 40, 0, 0.26, 0.33, 0.59, 0.33, 0.26, 0, NULL, 3003, NULL, NULL, 1, 2521, '2022-12-01 05:01:46', '2022-12-01 05:01:46', NULL),
(60, 3003, 66, 1, NULL, 38, 0, 0, 0, 0, 0, 0, 0, NULL, 3003, NULL, NULL, 1, 2521, '2022-12-01 05:01:46', '2022-12-01 05:01:46', NULL),
(61, 2999, 68, 1, NULL, 35, 0, 0.23, 28.76, 28.99, 5.08, 0, 23.91, NULL, 2999, 2524, NULL, 1, 2524, '2022-12-01 08:38:08', '2022-12-01 08:39:36', NULL),
(62, 2999, 69, 1, NULL, 29, 0, 0.79, 4.15, 4.94, 1.92, 0, 3.02, NULL, 2999, 2524, NULL, 1, 2524, '2022-12-01 08:39:36', '2022-12-01 08:41:13', NULL),
(63, 2999, 69, 1, NULL, 29, 0, 0.79, 4.15, 4.94, 1.92, 0, 3.02, NULL, 2999, 2524, NULL, 1, 2524, '2022-12-01 08:40:29', '2022-12-01 08:41:13', NULL),
(64, 2999, 70, 1, NULL, 36, 0, 0.3, 0.5, 0.8, 0.3, 0, 0.5, NULL, 2999, 2524, NULL, 1, 2524, '2022-12-01 08:40:29', '2022-12-01 08:41:13', NULL),
(65, 2999, 71, 1, NULL, 37, 0, 0.07, 0.13, 0.2, 0.09, 0, 0.11, NULL, 2999, 2524, NULL, 1, 2524, '2022-12-01 08:41:14', '2022-12-01 08:42:11', NULL),
(66, 2999, 72, 1, NULL, 42, 0, 1, 4.92, 5.92, 4.78, 0, 1.14, 'STC & NCOE', 2999, 2524, NULL, 1, 2524, '2022-12-01 08:42:11', '2022-12-01 08:42:48', NULL),
(67, 2999, 73, 1, NULL, 40, 0, 0, 0, 0, 29, 0, -29, NULL, 2999, 2524, NULL, 1, 2524, '2022-12-01 08:42:48', '2022-12-01 08:43:27', NULL),
(68, 2999, 74, 1, NULL, 38, 0, 1.03, 4.77, 5.8, 2.94, 0, 2.86, 'Inc. TA/DA & Other Expenses', 2999, NULL, NULL, 1, 2524, '2022-12-01 08:43:27', '2022-12-01 08:43:27', NULL),
(69, 3009, 39, 8, 2519, 26, 100, 100, 1, 101, 1, 1, 99, 'testing', 3009, NULL, NULL, 1, 2519, '2022-12-28 08:08:49', '2022-12-28 08:08:49', NULL),
(70, 3009, 39, 9, 2519, 26, 100, 100, 1, 101, 1, 1, 99, 'testing', 3009, NULL, NULL, 1, 2519, '2022-12-28 08:09:06', '2022-12-28 08:09:06', NULL),
(71, 3015, 79, 6, 2522, 500, 500, 200, 1000, 1200, 11, 11, 1178, '5000', 3015, NULL, NULL, 1, 2522, '2022-12-29 04:18:33', '2022-12-29 04:18:33', NULL),
(72, 3009, 39, 6, NULL, 26, 100, 110, 100, 210, 1, 10, 199, 'testing', 3009, NULL, NULL, 1, 2519, '2022-12-29 04:19:50', '2022-12-29 04:19:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `finances`
--

CREATE TABLE `finances` (
  `id` bigint(20) NOT NULL,
  `project_center_id` bigint(20) DEFAULT NULL,
  `scheme_name` varchar(255) DEFAULT NULL,
  `budget_cost` double DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_for` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finances`
--

INSERT INTO `finances` (`id`, `project_center_id`, `scheme_name`, `budget_cost`, `created_by`, `created_for`, `updated_by`, `deleted_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3012, 'Salaries', 26, 2517, 2517, NULL, 2517, 1, '2022-11-22 03:12:29', '2022-11-24 12:06:28', '2022-11-24 06:36:28'),
(2, 3012, 'Maintenance', 35, 2523, 2523, NULL, NULL, 1, '2022-11-22 03:16:17', '2022-11-22 08:46:17', NULL),
(3, 3012, 'AcademicProgrammes', 29, 2523, 2523, NULL, NULL, 1, '2022-11-22 03:16:18', '2022-11-22 08:46:18', NULL),
(4, 3012, 'SportsEquipments', 36, 2523, 2523, NULL, NULL, 1, '2022-11-22 03:17:26', '2022-11-22 08:47:26', NULL),
(5, 3012, 'ScientificEquipments', 37, 2523, 2523, NULL, NULL, 1, '2022-11-22 03:18:30', '2022-11-22 08:48:30', NULL),
(6, 3014, 'Block grant', 75.01, 2517, 2517, NULL, 2517, 1, '2022-11-22 23:18:29', '2022-11-23 05:19:27', '2022-11-22 23:49:27'),
(7, 3004, 'hdfhd', 346, 2517, 2517, NULL, 2517, 1, '2022-11-22 23:36:28', '2022-11-23 05:11:21', '2022-11-22 23:41:21'),
(8, 3004, 'finance', 45, 2517, 2517, NULL, 2517, 1, '2022-11-22 23:48:30', '2022-11-23 05:19:29', '2022-11-22 23:49:29'),
(9, 3012, 'Operational Schemes', 42, 2523, 2523, NULL, NULL, 1, '2022-11-23 23:59:46', '2022-11-24 05:29:46', NULL),
(10, 3012, 'Capital and infra works', 40, 2523, 2523, NULL, NULL, 1, '2022-11-23 23:59:47', '2022-11-24 05:29:47', NULL),
(11, 3012, 'Administrative Expns', 38, 2523, 2523, NULL, NULL, 1, '2022-11-23 23:59:47', '2022-11-24 05:29:47', NULL),
(12, 2517, 'Academic Programmes', 29, 2517, 2517, NULL, NULL, 1, '2022-11-24 06:18:53', '2022-11-24 11:48:53', NULL),
(13, 2517, 'Sports Equipments', 36, 2517, 2517, NULL, NULL, 1, '2022-11-24 06:19:50', '2022-11-24 11:49:50', NULL),
(14, 2517, 'Scientific Equipments', 37, 2517, 2517, 2517, NULL, 1, '2022-11-24 06:20:11', '2022-11-24 11:52:37', NULL),
(15, 2517, 'Salaries', 26, 2517, 2517, 2517, NULL, 1, '2022-11-24 06:36:58', '2022-11-25 10:55:47', NULL),
(16, 2517, 'Capital/Infra works', 40, 2517, 2517, NULL, NULL, 1, '2022-11-25 05:24:29', '2022-11-25 10:54:29', NULL),
(17, 2517, 'Administrative EXP (H.O)', 38, 2517, 2517, NULL, NULL, 1, '2022-11-25 05:24:57', '2022-11-25 10:54:57', NULL),
(18, 2517, 'operational', 42, 2517, 2517, NULL, NULL, 1, '2022-11-25 05:26:09', '2022-11-25 10:56:09', NULL),
(19, 2517, 'Maintainence', 35, 2517, 2517, NULL, NULL, 1, '2022-11-25 05:26:32', '2022-11-25 10:56:32', NULL),
(20, 3012, 'salaries', 26, 2523, 2523, NULL, NULL, 1, '2022-11-28 00:23:29', '2022-11-28 05:53:29', NULL),
(21, 3020, 'Salaries', 26, 2514, 2514, NULL, NULL, 1, '2022-11-28 04:27:13', '2022-11-28 09:57:13', NULL),
(22, 3020, 'Maintenance', 35, 2514, 2514, NULL, NULL, 1, '2022-11-28 04:27:25', '2022-11-28 09:57:25', NULL),
(23, 3020, 'Academic Programmes', 29, 2514, 2514, NULL, NULL, 1, '2022-11-28 04:27:40', '2022-11-28 09:57:40', NULL),
(24, 3020, 'Sports Equipment', 36, 2514, 2514, NULL, NULL, 1, '2022-11-28 04:31:58', '2022-11-28 10:01:58', NULL),
(25, 3020, 'Scientific Equipment', 37, 2514, 2514, NULL, NULL, 1, '2022-11-28 04:32:19', '2022-11-28 10:02:19', NULL),
(26, 3020, 'Operational Schemes', 42, 2514, 2514, NULL, NULL, 1, '2022-11-28 04:32:33', '2022-11-28 10:02:33', NULL),
(27, 3020, 'Capital/Infra Works', 40, 2514, 2514, NULL, NULL, 1, '2022-11-28 04:32:48', '2022-11-28 10:02:48', NULL),
(28, 3020, 'Administrative Exp (H.O)', 38, 2514, 2514, NULL, NULL, 1, '2022-11-28 04:33:07', '2022-11-28 10:03:07', NULL),
(29, 3019, 'Salaries /Pension/Benefits/misc', 26, 2515, 2515, NULL, NULL, 1, '2022-11-28 23:59:57', '2022-11-29 05:29:57', NULL),
(30, 3019, 'Players Cost : NCOE Boarding/Lodging/KITs/Insurance etc.', 51, 2515, 2515, NULL, NULL, 1, '2022-11-29 00:00:22', '2022-11-29 05:30:22', NULL),
(31, 3019, 'Maintenance of NCOE/RO', 35, 2515, 2515, NULL, NULL, 1, '2022-11-29 00:00:48', '2022-11-29 05:30:48', NULL),
(32, 3019, 'CAPITAL ASSETS', 35, 2515, 2515, NULL, NULL, 1, '2022-11-29 00:01:29', '2022-11-29 05:31:29', NULL),
(33, 3019, 'Sports Equipments-Non Consumable', 68, 2515, 2515, NULL, NULL, 1, '2022-11-29 00:01:53', '2022-11-29 05:31:53', NULL),
(34, 3019, 'Sports Consumables', 40, 2515, 2515, NULL, NULL, 1, '2022-11-29 00:02:15', '2022-11-29 05:32:15', NULL),
(35, 3019, 'Scientific Equipments-Non Consumbale', 40, 2515, 2515, NULL, NULL, 1, '2022-11-29 00:03:20', '2022-11-29 05:33:20', NULL),
(36, 3019, 'Scientific Equipments- Consumbale', 40, 2515, 2515, NULL, NULL, 1, '2022-11-29 00:03:21', '2022-11-29 05:33:21', NULL),
(37, 3019, 'Sports Science Centre and medicine', 40, 2515, 2515, NULL, NULL, 1, '2022-11-29 00:03:21', '2022-11-29 05:33:21', NULL),
(38, 3019, 'Creation of Capital Assets (Infrastructure/Equipments)', 41, 2515, 2515, NULL, NULL, 1, '2022-11-29 00:03:21', '2022-11-29 05:33:21', NULL),
(39, 3009, 'SALARIES', 26, 2519, 2519, NULL, NULL, 1, '2022-11-29 00:23:13', '2022-11-29 05:53:13', NULL),
(40, 3009, 'MAINTENANCE', 35, 2519, 2519, NULL, NULL, 1, '2022-11-29 00:23:13', '2022-11-29 05:53:13', NULL),
(41, 3009, 'ACADEMIC PROGRAMMES', 29, 2519, 2519, NULL, NULL, 1, '2022-11-29 00:23:13', '2022-11-29 05:53:13', NULL),
(42, 3009, 'SPORTS EQUIPMENTS', 36, 2519, 2519, NULL, NULL, 1, '2022-11-29 00:23:13', '2022-11-29 05:53:13', NULL),
(43, 3009, 'SCIENTIFIC EQUIPMENT', 37, 2519, 2519, NULL, NULL, 1, '2022-11-29 00:23:14', '2022-11-29 05:53:14', NULL),
(44, 3009, 'OPERATIONAL SCHEMES', 42, 2519, 2519, NULL, NULL, 1, '2022-11-29 00:23:14', '2022-11-29 05:53:14', NULL),
(45, 3009, 'CAPITAL/INFRA WORKS', 40, 2519, 2519, NULL, NULL, 1, '2022-11-29 00:23:14', '2022-11-29 05:53:14', NULL),
(46, 3009, 'ADMINISTRATIVE EXP( H.O)', 38, 2519, 2519, NULL, NULL, 1, '2022-11-29 00:23:14', '2022-11-29 05:53:14', NULL),
(47, 3017, 'NATIONAL CENTER OF EXCELLENCE  OPERATIONAL SCHEME', 37.01, 5924, 5924, 5924, NULL, 1, '2022-11-30 01:32:01', '2022-11-30 10:28:11', NULL),
(48, 3017, 'KITCHEN  OPERATIONAL SCHEME (NCOE)', 37.01, 5924, 5924, 5924, NULL, 1, '2022-11-30 02:46:24', '2022-11-30 08:16:37', NULL),
(49, 3017, 'Maintenance Expenditure', 35.01, 5924, 5924, NULL, NULL, 1, '2022-11-30 02:54:07', '2022-11-30 08:24:07', NULL),
(50, 3017, 'OPERATIONAL SCHEME', 37.01, 5924, 5924, NULL, NULL, 1, '2022-11-30 04:59:25', '2022-11-30 10:29:25', NULL),
(51, 3003, 'SALARIES', 26, 2521, 2521, NULL, NULL, 1, '2022-12-01 03:27:41', '2022-12-01 08:57:41', NULL),
(52, 2520, 'SALARIES', 26, 2520, 2520, NULL, NULL, 1, '2022-12-01 04:14:12', '2022-12-01 09:44:12', NULL),
(53, 2520, 'MAINTENANCE', 35, 2520, 2520, NULL, NULL, 1, '2022-12-01 04:16:34', '2022-12-01 09:46:34', NULL),
(54, 2520, 'ACADEMIC PROGRAMMES', 29, 2520, 2520, NULL, NULL, 1, '2022-12-01 04:17:04', '2022-12-01 09:47:04', NULL),
(55, 2520, 'SPORTS EQUIPMENTS', 36, 2520, 2520, NULL, NULL, 1, '2022-12-01 04:17:21', '2022-12-01 09:47:21', NULL),
(56, 2520, 'SCIENTIFIC EQUIPMENT', 37, 2520, 2520, NULL, NULL, 1, '2022-12-01 04:17:37', '2022-12-01 09:47:37', NULL),
(57, 2520, 'OPERATIONAL SCHEMES', 42, 2520, 2520, NULL, NULL, 1, '2022-12-01 04:22:10', '2022-12-01 09:52:10', NULL),
(58, 2520, 'CAPITAL / IFNRA WORKS', 40, 2520, 2520, NULL, NULL, 1, '2022-12-01 04:22:24', '2022-12-01 09:52:24', NULL),
(59, 2520, 'ADMINISTRATIVE EXP (H.O)', 38, 2520, 2520, NULL, NULL, 1, '2022-12-01 04:22:45', '2022-12-01 09:52:45', NULL),
(60, 3003, 'MAINTENANCE', 35, 2521, 2521, NULL, NULL, 1, '2022-12-01 04:36:08', '2022-12-01 10:06:08', NULL),
(61, 3003, 'ACADEMIC PROGRAMMES', 29, 2521, 2521, NULL, NULL, 1, '2022-12-01 04:36:08', '2022-12-01 10:06:08', NULL),
(62, 3003, 'SPORTS EQUIPMENTS', 36, 2521, 2521, NULL, NULL, 1, '2022-12-01 04:36:08', '2022-12-01 10:06:08', NULL),
(63, 3003, 'SCIENTIFIC EQUIPMENT', 37, 2521, 2521, NULL, NULL, 1, '2022-12-01 04:36:08', '2022-12-01 10:06:08', NULL),
(64, 3003, 'OPERATIONAL SCHEMES', 42, 2521, 2521, NULL, NULL, 1, '2022-12-01 04:36:08', '2022-12-01 10:06:08', NULL),
(65, 3003, 'CAPITAL/INFRA WORKS', 40, 2521, 2521, NULL, NULL, 1, '2022-12-01 04:36:08', '2022-12-01 10:06:08', NULL),
(66, 3003, 'ADMINISTRATIVE EXP( H.O)', 38, 2521, 2521, NULL, NULL, 1, '2022-12-01 04:36:08', '2022-12-01 10:06:08', NULL),
(67, 2524, 'SALARIES', 26, 2524, 2524, NULL, NULL, 1, '2022-12-01 06:06:52', '2022-12-01 11:36:52', NULL),
(68, 2999, 'MAINTENANCE', 35, 2524, 2524, NULL, NULL, 1, '2022-12-01 06:07:08', '2022-12-01 11:37:08', NULL),
(69, 2999, 'ACADEMIC PROGRAMMES', 29, 2524, 2524, NULL, NULL, 1, '2022-12-01 06:07:29', '2022-12-01 11:37:29', NULL),
(70, 2999, 'SPORTS EQUIPMENTS', 36, 2524, 2524, NULL, NULL, 1, '2022-12-01 06:07:55', '2022-12-01 11:37:55', NULL),
(71, 2999, 'SCIENTIFIC EQUIPMENT', 37, 2524, 2524, NULL, NULL, 1, '2022-12-01 06:08:17', '2022-12-01 11:38:17', NULL),
(72, 2999, 'OPERATIONAL SCHEMES', 42, 2524, 2524, NULL, NULL, 1, '2022-12-01 06:08:34', '2022-12-01 11:38:34', NULL),
(73, 2999, 'CAPITAL/INFRA WORKS', 40, 2524, 2524, NULL, NULL, 1, '2022-12-01 06:09:03', '2022-12-01 11:39:03', NULL),
(74, 2999, 'ADMINISTRATIVE EXP (H.O)', 38, 2524, 2524, NULL, NULL, 1, '2022-12-01 06:09:14', '2022-12-01 11:39:14', NULL),
(75, 3013, 'NCOE- Operationa Scheme', 37.01, 5924, 5924, NULL, NULL, 1, '2022-12-02 00:19:59', '2022-12-02 05:49:59', NULL),
(76, 3013, 'Kitchen Operational Scheme(NCOE)', 37.01, 5924, 5924, NULL, NULL, 1, '2022-12-02 00:20:53', '2022-12-02 05:50:53', NULL),
(77, 3013, 'Operational Scheme', 37.01, 5924, 5924, NULL, NULL, 1, '2022-12-02 00:21:27', '2022-12-02 05:51:27', NULL),
(78, 3013, 'Maintenance Scheme', 35.0106, 5924, 5924, NULL, NULL, 1, '2022-12-02 00:22:56', '2022-12-02 05:52:56', NULL),
(79, 3015, 'F1', 500, 2522, 3015, NULL, NULL, 1, '2022-12-29 04:16:27', '2022-12-29 09:46:27', NULL),
(80, 3015, 'F2', 50, 2522, 3015, NULL, NULL, 1, '2022-12-29 04:16:27', '2022-12-29 09:46:27', NULL),
(81, 3015, 'F3', 300, 2522, 3015, NULL, NULL, 1, '2022-12-29 04:17:39', '2022-12-29 09:47:39', NULL),
(82, 3015, 'F4', 400, 2522, 3015, NULL, NULL, 1, '2022-12-29 04:17:52', '2022-12-29 09:47:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `infrastructures`
--

CREATE TABLE `infrastructures` (
  `id` bigint(11) NOT NULL,
  `project_center_id` int(11) DEFAULT NULL,
  `project_title` text NOT NULL,
  `cost` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `agency_id` bigint(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_for` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `infrastructures`
--

INSERT INTO `infrastructures` (`id`, `project_center_id`, `project_title`, `cost`, `date`, `agency_id`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`, `created_for`) VALUES
(1, 3020, 'MP Indoor Hall', 88700000, '2017-07-03', 2, 1, 2514, 2514, NULL, '2022-11-23 01:43:49', '2022-12-05 06:28:57', NULL, NULL),
(2, 3020, 'Sewage Treatment Plant', 19300000, '2021-01-15', 4, 1, 2514, 2514, NULL, '2022-11-23 01:44:39', '2022-12-01 02:45:10', NULL, NULL),
(3, 3012, 'construction of  Internal Cycling Track at SAI, NERC, Imphal', NULL, NULL, 4, 0, 2523, 2523, NULL, '2022-11-23 23:53:33', '2022-12-01 03:11:22', NULL, NULL),
(4, 3012, 'Water Treatment Plant & Distribution system at SAI, NERC, Imphal', NULL, NULL, 4, 0, 2523, 2523, NULL, '2022-11-23 23:57:08', '2022-12-01 03:11:44', NULL, NULL),
(5, 3012, 'Steam Bathroom with necessary equipments at SAI, NERC, Imphal', NULL, NULL, 4, 1, 2523, NULL, NULL, '2022-11-23 23:57:08', '2022-11-23 23:57:08', NULL, NULL),
(6, 3012, 'Steam Bathroom with necessary equipments at SAI, NERC, Imphal', NULL, NULL, 1, 1, 2523, NULL, NULL, '2022-11-23 23:57:08', '2022-11-23 23:57:08', NULL, NULL),
(7, 3012, '300 bedded hostel at SAI NERC', 29.01, '2020-02-01', 2, 1, 2523, 2523, NULL, '2022-11-24 00:05:18', '2022-12-01 03:24:04', NULL, NULL),
(8, 3012, 'C/O Synthetic Athletic track at STC Dimapur', 6.27, '2019-02-13', 2, 1, 2523, 2523, NULL, '2022-11-24 00:09:48', '2022-12-01 03:24:52', NULL, NULL),
(9, 3012, 'Up-gradation of 100 bedded hostel at SAI, NCOE Imphal', 0.51, '2021-06-19', 4, 1, 2523, 2523, NULL, '2022-11-24 00:09:48', '2022-12-01 03:27:23', NULL, NULL),
(10, 3012, 'Upgradef Kitchen for SAI, NCOE, Imphal', 0.36, '2021-10-30', 4, 1, 2523, 2523, NULL, '2022-11-24 00:09:48', '2022-12-01 03:27:07', NULL, NULL),
(11, 3012, 'C/o Store room/approach road at premises of old MP hall at SAI, NCOE Imphal', 0.65, '2021-04-29', 4, 1, 2523, 2523, NULL, '2022-11-24 00:09:48', '2022-12-01 03:28:43', NULL, NULL),
(12, 3012, 'Up-gradation of Archery Ground at NCOE Imphal', 0.81, NULL, 4, 1, 2523, NULL, NULL, '2022-11-24 00:09:48', '2022-11-24 00:09:48', NULL, NULL),
(13, 3012, 'store room cum wash room behind existing pavilion of Archery Ground at SAI, NERC, Imphal', 0.32, NULL, 4, 1, 2523, NULL, NULL, '2022-11-24 00:14:41', '2022-11-24 00:14:41', NULL, NULL),
(14, 3012, 'Repairing of staff quarter & Old office building at SAI ,NCOE Imphal', 0.63, NULL, 4, 1, 2523, NULL, NULL, '2022-11-24 00:15:12', '2022-11-24 00:15:12', NULL, NULL),
(15, 3012, 'Synthetic Athletic track at STC Dimapur', 6.27, NULL, 4, 1, 2523, NULL, NULL, '2022-11-24 00:37:29', '2022-11-24 00:37:29', NULL, NULL),
(16, 3012, 'Upgradation of 100 bedded hostel at SAI NCOE Imphal', 0.51, NULL, 4, 1, 2523, NULL, NULL, '2022-11-24 00:37:29', '2022-11-24 00:37:29', NULL, NULL),
(17, 3012, 'Extension of Kitchen for SAI, NCOE, Imphal', 0.36, NULL, 4, 1, 2523, NULL, NULL, '2022-11-24 00:37:29', '2022-11-24 00:37:29', NULL, NULL),
(18, 3012, 'Construction of Store room/approach road at premises of old MP hall at SAI, NCOE Imphal', 0.65, NULL, 4, 1, 2523, NULL, NULL, '2022-11-24 00:37:29', '2022-11-24 00:37:29', NULL, NULL),
(19, 3012, 'Up-gradation of Archery Ground at NCOE Imphal', 0.81, NULL, 4, 1, 2523, NULL, NULL, '2022-11-24 00:37:29', '2022-11-24 00:37:29', NULL, NULL),
(20, 3012, 'store room cum wash room behind existing pavilion of Archery Ground at SAI, NERC, Imphal', 0.32, NULL, 4, 1, 2523, NULL, NULL, '2022-11-24 00:37:29', '2022-11-24 00:37:29', NULL, NULL),
(21, 3012, 'Repairing of staff quarter & Old office building at SAI ,NCOE Impha', 0.63, NULL, 4, 1, 2523, NULL, NULL, '2022-11-24 00:37:29', '2022-11-24 00:37:29', NULL, NULL),
(22, 2828, 'Laying of syn. ath track at STC tinsukia', 8.07, '2018-02-26', 4, 1, 2517, NULL, NULL, '2022-11-24 06:28:03', '2022-11-24 06:28:03', NULL, NULL),
(23, 3004, 'C/o 120 bedded hostel cum integrated sports training centre', 26.72, '2022-02-24', 4, 1, 2517, NULL, NULL, '2022-11-24 06:28:57', '2022-11-24 06:28:57', NULL, NULL),
(24, 3014, 'Construction of two Nos. Stores for Fencing, Boxing and Taekwondo Dicipline at MP Indoor Hall', 0.37, '2022-06-01', 1, 1, 2517, NULL, NULL, '2022-11-25 06:14:49', '2022-11-25 06:14:49', NULL, NULL),
(25, 2868, 'Repairing of Electrical Installations', 0.4455678, '2022-03-31', 1, 1, 2518, NULL, NULL, '2022-11-27 04:25:37', '2022-11-27 04:25:37', NULL, NULL),
(26, 2868, 'Major and Minor repair work of Girls & Boys Hostel at SAI STC Padma, Hazaribagh (Jharkhand)', 0.5841716, '2022-03-31', 1, 1, 2518, NULL, NULL, '2022-11-27 04:26:30', '2022-11-27 04:26:30', NULL, NULL),
(27, 3000, 'Construction of Boat House and Kitchen Store at SAI NCOE Jagatpur, Cuttack (Orissa)', 0.98596, '2022-03-31', 1, 1, 2518, NULL, NULL, '2022-11-27 04:27:00', '2022-11-27 04:27:00', NULL, NULL),
(28, 3000, 'Repair and Renovation of hostel buildings at SAI NCOE Jagatpur', 0.296615, '2022-01-20', 1, 1, 2518, NULL, NULL, '2022-11-27 04:27:29', '2022-11-27 04:27:29', NULL, NULL),
(29, 2833, 'Repair and renovation of Boys Hostel Building at STC Sundergarh', 0.74689, '2022-04-06', 1, 1, 2518, NULL, NULL, '2022-11-27 04:27:57', '2022-11-27 04:27:57', NULL, NULL),
(30, 2833, 'Repair ans Renovation of Girls Hostel Building at STC Sundergarh', 0.66488, '2022-04-06', 1, 1, 2518, NULL, NULL, '2022-11-27 04:28:16', '2022-11-27 04:28:16', NULL, NULL),
(31, 2833, 'Construction of Gas Bank, Cycle Shed, Electrical Installations at STC Sundergarh', 0.36509, '2022-02-04', 1, 1, 2518, NULL, NULL, '2022-11-27 04:28:35', '2022-11-27 04:28:35', NULL, NULL),
(32, 2518, 'Repair and Renovation of Existing of Athletic Store Room', 0.3523529, '2022-06-23', 1, 1, 2518, NULL, NULL, '2022-11-27 04:28:57', '2022-11-27 04:28:57', NULL, NULL),
(33, 2518, 'Repair of Existing Electrical Substation', 0.341849, '2022-06-23', 1, 1, 2518, NULL, NULL, '2022-11-27 04:29:16', '2022-11-27 04:29:16', NULL, NULL),
(34, 2868, 'Laying of Synthetic Hockey turf, Hazaribagh', 8.31, '2021-02-16', 2, 1, 2518, NULL, NULL, '2022-11-27 04:32:54', '2022-11-27 04:32:54', NULL, NULL),
(35, 2518, 'Construction of 300 Bedded Hostel', 28.57, '2019-08-14', 2, 1, 2518, NULL, NULL, '2022-11-27 04:34:22', '2022-11-27 04:34:22', NULL, NULL),
(36, 2518, '200 bed dining hall floor repair', 0.2146, '2022-08-01', 1, 1, 2518, NULL, NULL, '2022-11-27 04:41:35', '2022-11-27 04:41:35', NULL, NULL),
(37, 2518, 'Polycarbonate Sheet works in Sports Science Centre', 0.022146, '2022-11-10', 1, 1, 2518, NULL, NULL, '2022-11-27 04:42:34', '2022-11-27 04:42:34', NULL, NULL),
(38, 2518, 'AMC of swimming pool', 0.5323, '2022-04-06', 1, 1, 2518, NULL, NULL, '2022-11-28 23:48:13', '2022-11-28 23:48:13', NULL, NULL),
(39, 3009, 'C/o 200 KLD STP', 1.249, '2021-09-13', 4, 1, 2519, NULL, NULL, '2022-11-29 00:14:52', '2022-11-29 00:14:52', NULL, NULL),
(40, 3009, 'Expansion of first floor medical science block', 0.774, '2021-06-02', 4, 1, 2519, NULL, NULL, '2022-11-29 00:20:32', '2022-11-29 00:20:32', NULL, NULL),
(41, 3009, 'Renovation & p/f of ACs work in girls and boys hostel', 1, '2021-10-16', 4, 1, 2519, NULL, NULL, '2022-11-29 00:20:32', '2022-11-29 00:20:32', NULL, NULL),
(42, 3009, 'Laying of Bitumen on road with storm water drain repair works', 1.498, '2021-06-29', 4, 1, 2519, NULL, NULL, '2022-11-29 00:20:32', '2022-11-29 00:20:32', NULL, NULL),
(43, 3009, 'White wash work in Internal Admin Building', 0.033, '2022-03-28', 1, 1, 2519, NULL, NULL, '2022-11-29 00:20:33', '2022-11-29 00:20:33', NULL, NULL),
(44, 3009, 'Construction of parking near admin building', 0.1088, '2022-04-12', 1, 1, 2519, NULL, NULL, '2022-11-29 00:20:33', '2022-11-29 00:20:33', NULL, NULL),
(45, 3009, 'White wash of Overhead Tank including minor Repair, replacement of UGR pumps & Repair / fitting of Supply line', 0.11, '2022-04-20', 1, 1, 2519, NULL, NULL, '2022-11-29 00:20:33', '2022-11-29 00:20:33', NULL, NULL),
(46, 3009, 'Strengthening and resurfacing of various roads', 0.44, '2022-04-29', 1, 1, 2519, NULL, NULL, '2022-11-29 00:20:33', '2022-11-29 00:20:33', NULL, NULL),
(47, 3009, 'Seepage treatment and Painting of Elite hostel , Dining hall, Office at Swimming pool & Meter Room near Main Gate', 0.25, '2022-08-25', 1, 1, 2519, NULL, NULL, '2022-11-29 00:20:33', '2022-11-29 00:20:33', NULL, NULL),
(48, 3019, 'Construction of  300 bedded Hostel (Triple occupancy) at SAI Bhopal', 26.82, '2019-07-15', 2, 1, 2515, 2515, NULL, '2022-11-29 03:57:41', '2022-11-29 04:07:21', NULL, NULL),
(49, 3019, 'Up-gradation and renovation of Hostel-1 at STC Bhopal', 3, '2020-01-21', 3, 1, 2515, 2515, NULL, '2022-11-29 04:00:53', '2022-11-30 03:26:23', NULL, NULL),
(50, 3019, 'Repair and maintenance to adm. Bulding , MP hall , hostel 3 & 4 mess', 0.93, '2022-07-18', 1, 1, 2515, NULL, NULL, '2022-11-29 04:02:14', '2022-11-29 04:02:14', NULL, NULL),
(51, 3019, 'Redevelopment of Electrical work (External)', 1.92, '2022-07-19', 1, 1, 2515, NULL, NULL, '2022-11-29 04:03:19', '2022-11-29 04:03:19', NULL, NULL),
(52, 3019, 'Construction of 300 Bedded Hostel at SAI NCoE Bhopal', 30.64, '2022-04-06', 1, 1, 2515, NULL, NULL, '2022-11-29 04:06:07', '2022-11-29 04:06:07', NULL, NULL),
(53, 3017, '300 BEDDED HOSTEL', 29.3, '2021-02-16', 3, 1, 5924, 5924, NULL, '2022-11-30 02:30:02', '2022-11-30 02:36:50', NULL, NULL),
(54, 3019, 'Speical Repair of Various Electrical Works like cable Panel, Light Fitting etc at SAI CRC Bhopal', 1.92, '2022-07-19', 1, 1, 2515, NULL, NULL, '2022-11-30 02:31:46', '2022-11-30 02:31:46', NULL, NULL),
(55, 3019, 'Re-carpeting of Road Work', 1.51, '2022-01-24', 1, 1, 2515, NULL, NULL, '2022-11-30 04:13:26', '2022-11-30 04:13:26', NULL, NULL),
(56, 3003, 'Construction of 300 bed Hostel', 26.65, '2019-04-01', 2, 1, 2521, 2521, NULL, '2022-12-01 03:26:01', '2022-12-01 04:31:35', NULL, NULL),
(57, 3003, 'Flood lights and sprinkler system for archery Ground with natural turf at SAI NCOE Sonepat.', 1.5, '2022-03-31', 1, 1, 2521, NULL, NULL, '2022-12-01 04:27:07', '2022-12-01 04:27:07', NULL, NULL),
(58, 3003, 'Up gradation of Boxing shed into Kabaddi indoor hall at SAI NCOE Sonepat', 0.97, '2022-05-05', 1, 1, 2521, NULL, NULL, '2022-12-01 04:27:07', '2022-12-01 04:27:07', NULL, NULL),
(59, 3003, 'Re-carpeting Roads at SAI NCOE Sonepat', 0.92, '2022-05-05', 1, 1, 2521, NULL, NULL, '2022-12-01 04:27:07', '2022-12-01 04:27:07', NULL, NULL),
(60, 3003, 'Special Repair of Staff quarters(type V-1,TypeIV-2,Type III-12, type II-12,Type I-8) at SAI NCOE Sonepat', 2.36, '2022-06-08', 1, 1, 2521, NULL, NULL, '2022-12-01 04:27:07', '2022-12-01 04:27:07', NULL, NULL),
(61, 3003, 'Construction of 180 KLD STP with allied works at SAI NCOE Sonepat.', 1.75, '2022-07-20', 1, 1, 2521, NULL, NULL, '2022-12-01 04:27:07', '2022-12-01 04:27:07', NULL, NULL),
(62, 3003, 'Establishment of High Performance Centre at SAI NCoE Sonepat', 72, '2022-04-08', 1, 1, 2521, NULL, NULL, '2022-12-01 04:27:07', '2022-12-01 04:27:07', NULL, NULL),
(63, 3003, 'Earth Filling in archery ground upto road level', 0.62, '2022-04-28', 1, 1, 2521, NULL, NULL, '2022-12-01 04:27:07', '2022-12-01 04:27:07', NULL, NULL),
(64, 2999, 'Construction of 150 Bedded Hostel at NS NIS Patiala', 12.88, '2017-11-01', 2, 1, 2524, 2524, NULL, '2022-12-01 05:46:07', '2022-12-01 07:50:30', NULL, NULL),
(65, 2999, 'Construction of 300 Bedded Hostel at NS NIS Patiala', 26.77, '2020-01-12', 2, 1, 2524, 2524, NULL, '2022-12-01 05:46:50', '2022-12-20 00:31:09', NULL, NULL),
(66, 2999, 'Renovation and Up gradation of Milkha Singh Hostel for Men', 3.6, '2021-07-30', 3, 1, 2524, 2524, NULL, '2022-12-01 05:47:39', '2022-12-20 00:31:03', NULL, NULL),
(67, 2999, 'Renovation and Up gradation of Dayan Chand Hostel for Men', 2.31, '2021-07-31', 3, 1, 2524, 2524, NULL, '2022-12-01 05:48:19', '2022-12-20 00:31:06', NULL, NULL),
(68, 2999, 'Renovation and Up gradation of PT Usha Hostel for Women', 2.78, '2021-08-06', 3, 1, 2524, 2524, NULL, '2022-12-01 05:49:26', '2022-12-20 00:41:11', NULL, NULL),
(69, 2999, 'Renovation of Foreign Coaches Flats', 0.98, '2021-08-04', 3, 1, 2524, 2524, NULL, '2022-12-01 05:50:26', '2022-12-20 00:45:42', NULL, NULL),
(70, 2999, 'Construction of Central Kitchen and Dining Hall', 7.51, '2021-12-04', 3, 1, 2524, 2524, NULL, '2022-12-01 05:51:05', '2022-12-20 00:41:14', NULL, NULL),
(71, 2999, 'Modification and Renovation of Existing Weightlifting Hall', 1.29, '2021-06-11', 3, 1, 2524, 2524, NULL, '2022-12-01 05:51:56', '2022-12-20 00:30:58', NULL, NULL),
(72, 2999, 'Renovation of NIS Guest House', 1.73, '2021-06-11', 3, 1, 2524, 2524, NULL, '2022-12-01 05:52:40', '2022-12-20 00:45:56', NULL, NULL),
(73, 2999, 'Renovation and Up-gradation of Gymnasium Hall ; Civil                             and Public Health works regarding', 0.9834, '2021-08-28', 3, 1, 2524, 2524, NULL, '2022-12-01 05:53:26', '2022-12-20 00:41:03', NULL, NULL),
(74, 2999, 'Setting up of Recovery / Rehab Arena in the change rooms of swimming                    pool complex', 0.36, '2021-08-28', 3, 1, 2524, 2524, NULL, '2022-12-01 05:54:20', '2022-12-20 00:46:03', NULL, NULL),
(75, 2999, 'Providing and installation of Electrical work including Air                Conditioning', 0.7468, '1970-01-01', 3, 1, 2524, 2524, NULL, '2022-12-01 05:55:42', '2022-12-20 00:46:07', NULL, NULL),
(76, 2999, 'Up-gradation of Class Rooms including Audio Visual Room', 0.8, '2021-12-02', 2, 1, 2524, 2524, NULL, '2022-12-01 05:56:25', '2022-12-20 00:41:20', NULL, NULL),
(77, 2999, 'Up-gradation of Auditorium in Gymnasium Complex', 0.84, '2021-10-20', 2, 1, 2524, 2524, NULL, '2022-12-01 05:56:59', '2022-12-20 00:46:18', NULL, NULL),
(78, 2999, 'Premix Carpeting of existing internal roads of SAI NIS Campus', 0.97, '1970-01-01', 2, 1, 2524, 2524, NULL, '2022-12-01 05:57:28', '2022-12-20 00:40:54', NULL, NULL),
(79, 2999, 'Up-gradation of Silver jubilee Hostel for Men', 2.49, '2021-10-22', 2, 1, 2524, 2524, NULL, '2022-12-01 05:57:57', '2022-12-20 00:46:29', NULL, NULL),
(80, 2999, 'Establishing of National Centre of Sports Coaching including Strength Conditioning Hall', 30.33, '2021-06-09', 2, 1, 2524, 2524, NULL, '2022-12-01 05:59:10', '2022-12-20 00:46:40', NULL, NULL),
(81, 3020, 'Upgradation of Kitchen and Dining Hall in NCOE Hostel', 23000000, '2021-01-15', 4, 1, 2514, 2514, NULL, '2022-12-01 06:22:18', '2022-12-03 00:20:01', NULL, NULL),
(82, 3020, '300 Bed Hostel for Men', 267700000, '2019-08-14', 2, 1, 2514, 2514, NULL, '2022-12-01 06:22:57', '2022-12-03 00:22:25', NULL, NULL),
(83, 3020, 'Relaying of Cinder Athletic  Track into Synthetic Track', 138600000, '2021-01-15', 4, 1, 2514, 2514, NULL, '2022-12-01 06:23:40', '2022-12-03 00:23:08', NULL, NULL),
(84, 3020, '330 Bed Hostel for Women', 294600000, '2021-01-15', 4, 1, 2514, 2514, NULL, '2022-12-01 06:24:14', '2022-12-03 00:23:55', NULL, NULL),
(85, 3020, 'Construction of Storage Shed & Renovation of Toilet Block at SAI, NSSC Bengaluru', 600000, '2022-04-07', 1, 1, 2514, 2514, NULL, '2022-12-01 06:24:58', '2022-12-03 00:24:52', NULL, NULL),
(86, 3020, 'Upgradation of Sports Science Centre at SAI NSSC Bengaluru', 8100000, '2022-03-25', 1, 1, 2514, 2514, NULL, '2022-12-01 06:26:38', '2022-12-03 00:25:25', NULL, NULL),
(87, 3020, 'Upgradation of Sports Medicine Centre at SAI NSSC Bengaluru', 12300000, '2022-06-02', 1, 1, 2514, 2514, NULL, '2022-12-01 06:27:21', '2022-12-03 00:25:52', NULL, NULL),
(88, 3020, 'Upgradation of 36 rooms and 6 toilet blocks in NCOE Hostel', 16800000, '2021-01-15', 4, 1, 2514, 2514, NULL, '2022-12-01 06:28:57', '2022-12-03 00:26:35', NULL, NULL),
(89, 3021, 'CONSTRUCTION OF 300 BEDDED HOSTEL AT NCOE AURANGABAD', 26.77, '1970-01-01', 2, 1, 2520, 2520, NULL, '2022-12-01 07:06:21', '2022-12-01 07:17:50', NULL, NULL),
(90, 3021, 'CONSTRUCTION OF FENCING HALL AT NCOE AURANGABAD', 2, NULL, 4, 1, 2520, NULL, NULL, '2022-12-01 07:07:02', '2022-12-01 07:07:02', NULL, NULL),
(91, 3021, 'WATER PROOFING AND PAINTING WORKS AT BOYS HOSTEL, GIRLS HOSTEL, ELITE HOSTEL AND BOXING HALL', 0.75, NULL, 1, 1, 2520, NULL, NULL, '2022-12-01 07:07:45', '2022-12-01 07:07:45', NULL, NULL),
(92, 3021, 'AUGUMENTATION OF ELECTRIC SUPPLY BY LT CABLES AND FEEDER PILLARS', 1.51, NULL, 1, 1, 2520, NULL, NULL, '2022-12-01 07:08:21', '2022-12-01 07:08:21', NULL, NULL),
(93, 3007, 'CONSTRUCTION OF MULTIPURPOSE HALL AT KANDIVALI', 8, NULL, 2, 1, 2520, NULL, NULL, '2022-12-01 07:08:55', '2022-12-01 07:08:55', NULL, NULL),
(94, 3007, 'REPLACEMENT OF INTER LOCK TILES WITH ALLIED WORKS AT ADMIN BLOCK AND BOYS MESS', 0.3, NULL, 1, 1, 2520, NULL, NULL, '2022-12-01 07:09:41', '2022-12-01 07:09:41', NULL, NULL),
(95, 3007, 'DEVELOPMENT OF OPEN CONDITIONING AREA WITH ALLIED CIVIL WORKS', 0.17, NULL, 1, 1, 2520, NULL, NULL, '2022-12-01 07:10:50', '2022-12-01 07:10:50', NULL, NULL),
(96, 3007, 'REPLACEMENT OF GI/PPGI SHEET WORK AT  GIRLS HOSTEL AND ALLIED CIVIL WORKS', 0.16, '2022-07-22', 1, 1, 2520, 2520, NULL, '2022-12-01 07:11:53', '2022-12-01 07:14:03', NULL, NULL),
(97, 3007, 'ANNUAL REPAIRS AND MAINTEINANCE OF BUILDINGS (AR & MO)', 0.18, '2022-07-23', 1, 1, 2520, 2520, NULL, '2022-12-01 07:12:41', '2022-12-01 07:14:16', NULL, NULL),
(98, 3021, 'CONSTRUCTION OF TOILETS AT STRENGTH AND CONDITIONING HALL', 0.15, '2022-09-03', 1, 1, 2520, NULL, NULL, '2022-12-01 07:13:30', '2022-12-01 07:13:30', NULL, NULL),
(99, 2520, 'CONSTRUCTION OF 300 BEDDED HOSTEL AT ASI PUNE', 26.77, NULL, 2, 1, 2520, NULL, NULL, '2022-12-01 07:14:48', '2022-12-01 07:14:48', NULL, NULL),
(100, 2520, 'CONSTRUCTION OF BOUNDARY WALL AT DDU RC NAGPUR', 11.98, NULL, 4, 1, 2520, NULL, NULL, '2022-12-01 07:15:20', '2022-12-01 07:15:20', NULL, NULL),
(101, 2520, 'CONSTRUCTION OF MP HALL DDU RC NAGPUR', NULL, NULL, 1, 1, 2520, NULL, NULL, '2022-12-01 07:15:48', '2022-12-01 07:15:48', NULL, NULL),
(102, 2520, 'CONSTRUCTION OF 150 BEDDED HOSTEL AT DDU RC NAGPUR', NULL, NULL, 1, 1, 2520, NULL, NULL, '2022-12-01 07:16:22', '2022-12-01 07:16:22', NULL, NULL),
(103, 3013, 'Construction of 300 bedded Hostel at IGSC', 29.48, '2021-01-15', 3, 1, 5924, NULL, NULL, '2022-12-02 00:25:41', '2022-12-02 00:25:41', NULL, NULL),
(104, 3013, 'Construction of Sewage Treatment Plant at IGSC', 2, '2020-11-10', 3, 1, 5924, 5924, NULL, '2022-12-02 00:25:41', '2022-12-02 00:29:38', NULL, NULL),
(105, 3015, 'Test1', 21, '2022-12-05', 1, 1, 2522, NULL, 2522, '2022-12-05 00:18:16', '2022-12-05 06:29:37', '2022-12-05 00:29:29', NULL),
(106, 3015, 'test2', 20, '2022-12-08', 2, 1, 2522, NULL, 2522, '2022-12-05 00:18:44', '2022-12-05 06:29:34', '2022-12-05 00:29:29', NULL),
(107, 3015, 'test3', 55, '2022-12-10', 1, 1, 2522, NULL, 2522, '2022-12-05 00:18:44', '2022-12-05 06:29:31', '2022-12-05 00:29:29', NULL),
(108, 3015, 'Setting up SAPC:   Construction of 400 bedded hostel', 31, '2021-03-11', 1, 1, 2522, 2522, NULL, '2022-12-05 00:59:55', '2022-12-09 00:19:09', NULL, NULL),
(109, 3015, 'Up gradation of Existing Boys hostel', 2.28, '2020-10-19', 1, 1, 2522, 2522, NULL, '2022-12-05 01:00:20', '2022-12-09 00:22:47', NULL, NULL),
(110, 3015, 'Providing and Construction of Substation Equipment', 2.93, '2022-03-03', 1, 1, 2522, 2522, NULL, '2022-12-05 01:00:20', '2022-12-09 00:23:40', NULL, NULL),
(111, 2999, 'Special repairs of Boxing Hall', 0.83, '2022-11-18', 1, 1, 2524, 2524, NULL, '2022-12-20 00:30:00', '2022-12-20 00:31:20', NULL, NULL),
(112, 2999, 'Repair of roads and foot paths (Civil Part)', 0.882, '1970-01-01', 1, 1, 2524, 2524, NULL, '2022-12-20 00:30:46', '2022-12-20 00:31:15', NULL, NULL),
(113, 3015, 'testing team', 300, '2022-12-01', 1, 1, 2522, NULL, NULL, '2022-12-28 07:34:03', '2022-12-28 07:34:03', NULL, 3015),
(114, 3015, 'teating team 1', 400, '2022-12-01', 1, 1, 2522, NULL, NULL, '2022-12-28 07:36:44', '2022-12-28 07:36:44', NULL, 3015),
(115, 3009, 't1', 100, '2022-12-01', 1, 1, 2519, NULL, NULL, '2022-12-28 07:49:26', '2022-12-28 07:49:26', NULL, 3009),
(116, 3009, 't2', 500, '2022-12-01', 1, 1, 2519, NULL, NULL, '2022-12-28 08:41:46', '2022-12-28 08:41:46', NULL, 3009),
(117, 3009, 't3', 300, '2022-12-01', 2, 1, 2519, NULL, NULL, '2022-12-28 08:43:07', '2022-12-28 08:43:07', NULL, 3009),
(118, 3009, 't4', 600, '2022-12-01', 1, 1, 2519, NULL, NULL, '2022-12-28 22:53:32', '2022-12-28 22:53:32', NULL, 3009),
(119, 3009, 't5', 500, '2022-12-01', 1, 1, 2519, NULL, NULL, '2022-12-28 22:54:27', '2022-12-28 22:54:27', NULL, 3009),
(120, 3009, 't6', 600, '2022-12-01', 1, 1, 2519, NULL, NULL, '2022-12-29 00:31:51', '2022-12-29 00:31:51', NULL, 3009),
(121, 3009, 't7', 700, '2022-12-01', 1, 1, 2519, NULL, NULL, '2022-12-29 01:36:31', '2022-12-29 01:36:31', NULL, 3009),
(122, 3009, 't8', 800, '2022-12-01', 1, 1, 2519, NULL, NULL, '2022-12-29 01:36:46', '2022-12-29 01:36:46', NULL, 3009),
(123, 3015, 'P1', 100, '2022-12-01', 1, 1, 2522, NULL, NULL, '2022-12-29 01:54:32', '2022-12-29 01:54:32', NULL, 3015),
(124, 3015, 'p2', 200, '2022-12-01', 1, 1, 2522, NULL, NULL, '2022-12-29 01:54:33', '2022-12-29 01:54:33', NULL, 3015);

-- --------------------------------------------------------

--
-- Table structure for table `infra_works`
--

CREATE TABLE `infra_works` (
  `id` bigint(20) NOT NULL,
  `project_center_id` bigint(20) DEFAULT NULL,
  `rc_id` bigint(20) DEFAULT NULL,
  `template_id` bigint(20) NOT NULL,
  `infra_id` bigint(20) NOT NULL,
  `discription` text DEFAULT NULL,
  `date_of_issue` date DEFAULT NULL,
  `date_of_receipt` date DEFAULT NULL,
  `date_of_tech_bid` date DEFAULT NULL,
  `date_of_financial_bid` date DEFAULT NULL,
  `date_of_work_award` date DEFAULT NULL,
  `tender_cost` double DEFAULT NULL,
  `remarks_1` text DEFAULT NULL,
  `work_start_date` date DEFAULT NULL,
  `cpdc_date` date DEFAULT NULL,
  `epd_25` date DEFAULT NULL,
  `epd_50` date DEFAULT NULL,
  `epd_75` date DEFAULT NULL,
  `progress_percentage` double DEFAULT NULL,
  `current_pdc` varchar(255) DEFAULT NULL,
  `remarks_2` text DEFAULT NULL,
  `fund_release` double DEFAULT NULL,
  `utilised_fund_percentage` double DEFAULT NULL,
  `uc_status` tinyint(4) DEFAULT NULL COMMENT '0-pending,1-submitted',
  `form_type` tinyint(4) DEFAULT NULL,
  `form_status` tinyint(4) DEFAULT 0,
  `award_status` tinyint(4) NOT NULL DEFAULT 0,
  `physical_status` tinyint(4) NOT NULL DEFAULT 0,
  `finance_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_for` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `infra_works`
--

INSERT INTO `infra_works` (`id`, `project_center_id`, `rc_id`, `template_id`, `infra_id`, `discription`, `date_of_issue`, `date_of_receipt`, `date_of_tech_bid`, `date_of_financial_bid`, `date_of_work_award`, `tender_cost`, `remarks_1`, `work_start_date`, `cpdc_date`, `epd_25`, `epd_50`, `epd_75`, `progress_percentage`, `current_pdc`, `remarks_2`, `fund_release`, `utilised_fund_percentage`, `uc_status`, `form_type`, `form_status`, `award_status`, `physical_status`, `finance_status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`, `created_for`) VALUES
(1, 2828, NULL, 1, 22, 'test', '2018-08-01', '2018-08-28', '2018-09-10', '2018-09-24', '2018-12-31', 8.07, 'Work was going on', '2019-01-01', '2023-01-31', '2021-08-31', '2021-11-30', '2022-11-30', 72, '7', 'project is ongoing', 7, 100, 1, 3, 1, 1, 1, 1, 2517, 2517, NULL, '2022-11-24 06:40:41', '2022-11-28 01:28:42', NULL, NULL),
(2, 3004, NULL, 1, 23, 'test', '2021-11-02', '2021-12-03', '2021-12-05', '2021-12-16', '2022-02-24', 26.72, 'Work is going on', '2022-06-01', '2022-12-16', '2022-08-01', '2022-10-10', '2022-10-31', 98, '2.67', 'Project is ongoing', 2.63, 100, 0, 3, 1, 1, 1, 1, 2517, 2517, NULL, '2022-11-24 06:55:13', '2022-11-28 01:28:42', NULL, NULL),
(3, 3014, NULL, 1, 24, 'test', '2022-04-01', '2022-04-16', '2022-04-24', '2022-05-02', '2022-05-16', 0.37, 'Project is going on', '2022-06-01', '2022-12-16', '2022-07-31', '2022-09-30', '2022-10-31', 98, '0.11', NULL, 0.11, 100, 0, 3, 1, 1, 1, 1, 2517, 2517, NULL, '2022-11-25 07:16:21', '2022-11-28 01:28:42', NULL, NULL),
(4, 3000, NULL, 1, 28, 'test', '2022-02-08', '2022-03-07', '2022-03-08', '2022-03-09', '2022-03-23', 0.0089, 'Works completed however re painting to be done by CPWD Cuttack', '2022-03-24', '2022-09-23', '2022-05-11', '2022-07-10', '2022-08-25', 100, '0', 'Works completed however some issue with Painting. Letter has been written to CPWD Cuttack', 0.097882, 33, 0, 3, 1, 1, 1, 1, 2518, 2518, NULL, '2022-11-27 04:36:53', '2022-11-28 23:50:58', NULL, NULL),
(5, 2868, NULL, 1, 25, 'test', '2022-06-01', '2022-07-01', '2022-07-04', '2022-07-05', '2022-08-31', 0.294376, NULL, '2022-10-15', '2023-03-15', '2022-11-16', '2022-12-15', '2023-01-18', 40, '0', 'Works in Progress', 0.04455678, 10, 0, 3, 1, 1, 1, 1, 2518, 2518, NULL, '2022-11-27 04:44:30', '2022-11-28 23:50:58', NULL, NULL),
(6, 2868, NULL, 1, 26, 'test', '2022-04-06', '2022-05-05', '2022-05-16', '2022-05-17', '2022-05-24', 0.2406, NULL, '2022-07-27', '2023-01-26', '2022-10-02', '2022-11-29', '2023-01-19', 50, '0', 'Works in Progress', 0.05841716, 10, 0, 3, 1, 1, 1, 1, 2518, 2518, NULL, '2022-11-27 04:47:27', '2022-11-28 23:50:58', NULL, NULL),
(7, 2868, NULL, 1, 34, 'test', '2021-03-17', '2021-04-17', '2021-04-19', '2021-04-20', '2021-04-23', 7.12, 'Tendered cost without GST', '2021-05-19', '2021-12-18', '2021-08-31', '2021-10-31', '2021-11-28', 64, '0', 'New PDC not yet informed by WAPCOS. Letter has already been written', 1.83, 22, 1, 3, 1, 1, 1, 1, 2518, 2518, NULL, '2022-11-27 10:15:47', '2022-11-28 23:50:58', NULL, NULL),
(8, 2518, NULL, 1, 32, 'test', '2022-06-30', '2022-07-30', '2022-08-01', '2022-08-02', '2022-08-03', 0.35, 'tendered cost not yet informed by CPWD. Letter has been written', '2022-10-05', '2023-04-04', '2022-11-30', '2023-01-31', '2023-02-01', 40, '0', 'Works in Progress. Tendering cost not yet informed by CPWD Kolkata', 0.03523, 10, 0, 3, 1, 1, 1, 1, 2518, 2518, NULL, '2022-11-27 10:17:41', '2022-11-28 23:50:58', NULL, NULL),
(9, 2518, NULL, 1, 33, 'test', '2022-06-29', '2022-07-29', '2022-08-03', '2022-08-05', '2022-08-08', 0.34, 'tendered cost not yet informed by CPWD. Letter has been written', '2022-09-28', '2023-03-27', '2022-11-22', '2022-12-30', '2023-02-26', 57, '0', 'Works in Progress. Tendering cost not yet informed by CPWD Kolkata', 0.214, 67, 0, 3, 1, 1, 1, 1, 2518, 2518, NULL, '2022-11-27 10:18:34', '2022-11-28 23:50:58', NULL, NULL),
(10, 2518, NULL, 1, 35, 'test', '2019-11-01', '2019-12-02', '2019-12-11', '2020-01-09', '2020-01-30', 24.5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2518, 2518, 2518, '2022-11-27 10:21:54', '2022-11-27 10:23:10', '2022-11-27 15:53:10', NULL),
(11, 2518, NULL, 1, 35, 'test', '2019-08-18', '2019-09-18', '2019-10-20', '2019-10-25', '2020-02-10', 24.5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2518, 2518, 2518, '2022-11-27 10:24:52', '2022-11-27 10:27:59', '2022-11-27 15:57:59', NULL),
(12, 2518, NULL, 1, 35, 'test', '2019-10-20', '2019-11-21', '2020-01-01', '2020-02-05', '2020-02-10', 24.5, NULL, '2020-02-12', '2023-03-30', '2021-04-21', '2021-09-30', '2022-11-07', 44, '0', 'Works delayed due to COVID and  local body approval issues.', 8.3, 29, 0, 3, 1, 1, 1, 1, 2518, 2518, NULL, '2022-11-28 01:29:54', '2022-11-28 23:50:58', NULL, NULL),
(13, 2518, NULL, 1, 36, 'test', '2022-08-10', '2022-09-10', '2022-10-15', '2022-10-16', '2022-10-17', 0.2146, 'tendered cost not yet informed by CPWD. Letter has been written', '2022-10-26', '2023-04-25', '2022-12-01', '2023-01-31', '2023-02-27', 60, '0', 'Works in Progress. Tendering cost not yet informed by CPWD Kolkata', 0.121, 56, 0, 3, 1, 1, 1, 1, 2518, 2518, NULL, '2022-11-28 01:30:50', '2022-11-28 23:50:58', NULL, NULL),
(14, 3020, NULL, 1, 1, 'test', '2022-11-14', '2022-11-15', '2022-11-16', '2022-11-17', '2022-11-18', 0.333, 'texting', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2514, 2514, 2514, '2022-11-28 03:38:17', '2022-11-28 03:38:40', '2022-11-28 09:08:40', NULL),
(15, 2518, NULL, 1, 37, 'test', '2022-11-15', '2022-12-15', '2022-12-16', '2022-12-17', '2022-12-18', 0.022146, 'In tendering process by CPWD', '2022-12-21', '2023-03-21', '2023-01-11', '2023-02-08', '2023-02-28', 0, '0', 'Tendering in process', 0.022146, 100, 0, 3, 1, 1, 1, 1, 2518, 2518, NULL, '2022-11-28 05:12:45', '2022-11-28 23:50:59', NULL, NULL),
(16, 2833, NULL, 1, 29, 'test', '2022-04-10', '2022-05-10', '2022-05-15', '2022-05-16', '2022-06-28', 1.3852339, 'Combined tendering done by CPWD for all works in Sundargarh', '2022-07-06', '2023-01-06', '2022-08-17', '2022-10-26', '2022-12-14', 50, '0', 'Works in Progress and combined tendering done by CPWD for sundargarh', 0.074689, 10, 0, 3, 1, 1, 1, 1, 2518, 2518, NULL, '2022-11-28 05:15:56', '2022-11-28 23:50:59', NULL, NULL),
(17, 2833, NULL, 1, 30, 'test', '2022-04-10', '2022-05-10', '2022-05-15', '2022-05-16', '2022-06-28', 1.3852339, 'Combined tendering done by CPWD for all works in Sundargarh', '2022-07-06', '2023-01-06', '2022-08-17', '2022-10-26', '2022-12-14', 50, '0', 'Works in Progress and combined tendering done by CPWD for sundargarh', 0.066488, 10, 0, 3, 1, 1, 1, 1, 2518, 2518, NULL, '2022-11-28 05:16:31', '2022-11-28 23:50:59', NULL, NULL),
(18, 2833, NULL, 1, 31, 'test', '2022-04-10', '2022-05-10', '2022-05-15', '2022-05-16', '2022-06-28', 1.3852339, 'Combined tendering done by CPWD for all works in Sundargarh', '2022-07-06', '2023-01-06', '2022-08-17', '2022-10-26', '2022-12-14', 50, '0', 'Works in Progress and combined tendering done by CPWD for sundargarh', 0.12, 33, 0, 3, 1, 1, 1, 1, 2518, 2518, NULL, '2022-11-28 05:17:28', '2022-11-28 23:50:59', NULL, NULL),
(19, 2518, NULL, 1, 38, 'test', '2022-04-07', '2022-04-27', '2022-04-28', '2022-05-02', '2022-05-03', 0.5323, 'Tendered cost not yet informed by CPWD. Letter has already been written', '2022-05-04', '2023-05-03', '2022-07-05', '2022-10-05', '2022-12-31', 50, '0', 'AMC', 0.183, 35, 0, 3, 1, 1, 1, 1, 2518, 2518, NULL, '2022-11-28 23:49:20', '2022-11-28 23:50:59', NULL, NULL),
(20, 3009, NULL, 1, 43, 'test', '2022-02-18', '2022-02-26', '2022-02-26', '2022-02-26', '2022-02-26', 0.023, 'Work Completed', '2022-03-28', '2022-04-27', NULL, NULL, NULL, 100, '27-04-2022', 'Work completed. Payment released up to tender cost . Final statement awaited from CPWD.', 0.033, 100, 1, 3, 1, 1, 1, 1, 2519, 2519, NULL, '2022-11-29 05:50:29', '2022-12-28 07:56:04', NULL, 3009),
(21, 3009, NULL, 1, 44, 'test', '2022-03-23', '2022-04-01', '2022-04-01', '2022-04-01', '2022-04-01', 0.1034, 'Work Completed', '2022-04-12', '2022-06-11', NULL, NULL, NULL, 100, '11-06-2022', 'Work completed. Payment released up to tender cost . Final statement awaited from CPWD.', 0.1088, 100, 1, 3, 1, 1, 1, 1, 2519, 2519, NULL, '2022-11-29 05:55:23', '2022-12-28 07:56:04', NULL, 3009),
(22, 3009, NULL, 1, 45, 'test', '2022-04-02', '2022-04-11', '2022-04-11', '2022-04-11', '2022-04-11', 0.1056, 'Work Completed', '2022-04-24', '2022-06-20', NULL, NULL, NULL, 100, '20-06-2022', 'Work completed. Payment released up to tender cost . Final statement awaited from CPWD.', 0.11, 100, 1, 3, 1, 1, 1, 1, 2519, 2519, NULL, '2022-11-29 06:04:02', '2022-12-28 07:56:04', NULL, 3009),
(23, 3009, NULL, 1, 46, 'test', '2022-04-08', '2022-04-18', '2022-04-18', '2022-04-18', '2022-04-18', 0.04362, 'Work Complete', '2022-04-29', '2022-07-28', NULL, NULL, NULL, 100, '28-07-2022', 'Work completed. Final statement awaited from CPWD.', 0.17, 39, 1, 3, 1, 1, 1, 1, 2519, 2519, NULL, '2022-11-29 06:05:36', '2022-12-28 07:56:04', NULL, 3009),
(24, 3009, NULL, 1, 47, 'test', '2022-08-02', '2022-08-10', '2022-08-10', '2022-08-10', '2022-08-10', 0.2589, 'Work started on dt.25.08.22, in progress', '2022-08-25', '2022-12-24', '2022-09-30', NULL, NULL, 30, '24-12-2022', 'Work started on dt.25.08.22, in progress', 0.0673, NULL, 0, 3, 0, 1, 1, 1, 2519, 2519, NULL, '2022-11-29 06:06:52', '2022-12-28 07:56:04', NULL, 3009),
(25, 3017, NULL, 1, 53, 'test', '2021-03-05', '2021-03-25', '2021-03-26', '2021-06-23', '2021-06-29', 19.16, 'All work done by NBCC on behalf of SAI', '2021-07-09', '2022-10-08', '2021-12-15', '2022-04-12', '2022-10-08', 76, '31-12-2022', 'Work is delayed due to NGT restrictions in 2021 & 2022.', 16.69, 87, 1, 3, 1, 1, 1, 1, 5924, 5924, NULL, '2022-11-30 02:48:23', '2022-11-30 03:08:36', NULL, NULL),
(26, 3019, NULL, 1, 48, 'test', '2019-07-26', '2019-08-19', '2019-08-19', '2019-08-19', '2019-10-03', 19.6, '1.Work is under process. (Physical process 75%) 2. Likely date of completion is 30/12/2022                                                   3. 2.70 cr sanction issued on 29.11.2022.  4.fund release till date is 18.44 cr.', '2020-01-01', '2022-12-31', NULL, NULL, NULL, 75, '31-12-2022', '(currenty work in progress)                      (Activity wise workers detail and daily progress :-                                                                                         Block 1- GF slab complete. Block 2- GF slab, FF slab, SF slab, Terrace slab complete. Block 3- GF, FF & SF slab completed. Block 4- GF,1st, 2nd, & terrace floor slab complete. Block 5- GF,1st, 2nd and Terrace floor slab complete Block 6-  Gf, 1st, 2nd & Terrace floor slab completed. AAC BLOCK WORK & Plaster work COMPLETE IN GF, FF, SF,TF of All blocks.  Tiles work completed in GF, FF,SF,TF of block no. 02 , 03 & 04 & GF,FF & SF in block no. 05 . Total 84 nos. Labourers and 3 nos. Technical staff working at site.)', 18.44, 95.01, 0, 3, 1, 1, 1, 1, 2515, 2515, NULL, '2022-11-30 02:54:34', '2022-11-30 04:30:46', NULL, NULL),
(27, 3019, NULL, 1, 49, 'test', '2020-07-07', '2020-08-01', '2020-08-01', '2020-08-01', '2020-09-01', 1.98, '1. Work started at 9/2/2021.                                                2. UC received of 1.14 along with 12 C format and form 65 on 03.01.22.                                                              3. 10% deviation approval letter reveiced on   25/10/2022.                                                                                4. fund release till date is 1.58 cr', '2022-02-05', '2022-12-31', NULL, NULL, NULL, 95, '31-12.2022', '1.UC received of 1.14 along with 12 C format and form 65 on 03.01.22.              2.  10% deviation approval letter reveiced on   25/10/2022.', 1.14, 72.47, 1, 3, 1, 1, 1, 1, 2515, 2515, NULL, '2022-11-30 03:30:17', '2022-11-30 04:30:46', NULL, NULL),
(28, 3019, NULL, 1, 50, 'test', '2022-10-10', '2022-10-18', '2022-10-18', '2022-10-19', '2022-11-02', 0.49, '1. A/A & E/S on 18/7/2022.                                                                   2.Release of initial deposit of 10% of A/A & E/S amount i.e 9,30,500/-.  On 18/08/2022                                        3.Tender awared on 29/10/2022 by CPWD and work started.', '2022-11-05', '2023-01-03', NULL, NULL, NULL, 3, '03.01.2023', '1. A/A & E/S on 18/7/2022.                                                                   2.Release of initial deposit of 10% of A/A & E/S amount i.e 9,30,500/-.  On 18/08/2022                                        3.Work awared on 29/10/2022 by CPWD and work will started.                             4.Scrapping work is under progress in big MP hall for painting.', 0.09, 10, 0, 3, 1, 1, 1, 1, 2515, 2515, NULL, '2022-11-30 03:55:29', '2022-11-30 04:30:46', NULL, NULL),
(29, 3019, NULL, 1, 55, 'test', '2022-04-23', '2022-04-30', '2022-04-30', '2022-04-30', '2022-05-02', 1.38, '1. Completed.                                                                                         2. Mail sent to Director infra for fund of 87,62,510/- on 02/08/2022    (55.71 lakh release on 8.09.2022)                                                                                      3. Fund release till date is 1.19 cr   4. 31.91 lakh fund requiremnet from CPWD on 29.11.2022', '2022-05-02', '2022-07-17', NULL, NULL, NULL, 100, '17.07.2022', '1.Physically 100% work has been completed.                                              2. Mail sent to Director infra for fund of 87,62,510/- on 02/08/2022.                     3.  55.71 release on 8.09.2022', 1.19, 78.8, 1, 3, 1, 1, 1, 1, 2515, 2515, NULL, '2022-11-30 04:23:04', '2022-11-30 04:30:46', NULL, NULL),
(30, 2999, NULL, 1, 64, 'test', '2017-11-01', '2018-10-30', '1970-01-01', '1970-01-01', '2017-11-01', 12.88, 'WTP Installation completed testing will commence soon.', '2017-11-02', '2018-10-30', '2021-08-31', NULL, NULL, 99, '31-08-2021', 'WTP Installation completed testing will commence soon.', 12.88, 99, 0, 3, 1, 1, 1, 1, 2524, 2524, NULL, '2022-12-01 07:53:20', '2022-12-01 08:31:27', NULL, NULL),
(31, 2999, NULL, 1, 65, 'test', '2020-01-12', '2021-07-31', '1970-01-01', '1970-01-01', '2020-01-12', 26.77, 'Procurement of transformer pending.', '2020-01-13', '2021-07-31', '2022-05-15', '2022-05-15', '2022-05-15', 99, '15.05.2022', 'Procurement of transformer pending.', 26.77, 99, 0, 3, 1, 1, 1, 1, 2524, 2524, NULL, '2022-12-01 07:54:23', '2022-12-01 08:31:59', NULL, NULL),
(32, 2999, NULL, 1, 66, 'test', '2021-07-30', '2022-08-31', '1970-01-01', '1970-01-01', '2021-07-30', 3.6, 'Tile dismantling work is in progress in second block', '2021-07-31', '2022-08-31', NULL, NULL, NULL, 45, '31-10-2022', 'Tile dismantling work is in progress in second block', 3.6, 45, 0, 3, 1, 1, 1, 1, 2524, 2524, NULL, '2022-12-01 07:55:25', '2022-12-01 08:32:29', NULL, NULL),
(33, 2999, NULL, 1, 67, 'test', '2021-07-31', '2022-06-10', '1970-01-01', '1970-01-01', '2021-07-31', 2.31, 'Carpentry work is in progress Painting work is in progress', '2021-07-31', '2022-06-10', NULL, NULL, NULL, 96, '20-10-2022', 'Carpentry work is in progress Painting work is in progress', 2.31, 96, 0, 3, 1, 1, 1, 1, 2524, 2524, NULL, '2022-12-01 07:57:06', '2022-12-01 08:32:52', NULL, NULL),
(34, 2999, NULL, 1, 68, 'test', '2022-06-10', '1970-01-01', '1970-01-01', '1970-01-01', '2021-08-06', 2.78, 'Sample room not yet prepared', '2021-08-07', '2022-06-10', NULL, NULL, NULL, 98, '31-10-2022', 'Sample room not yet prepared.', 2.78, 98, 0, 3, 1, 1, 1, 1, 2524, 2524, NULL, '2022-12-01 07:58:14', '2022-12-01 08:33:25', NULL, NULL),
(35, 2999, NULL, 1, 69, 'test', '2021-08-04', '2022-06-10', '1970-01-01', '1970-01-01', '2021-08-04', 0.98, 'Dismantling work is in progrss in second block', '2021-08-05', '2022-06-10', NULL, NULL, NULL, 42, '31-10-2022', 'Dismantling work is in progrss in second block', 0.98, 42, 0, 3, 1, 1, 1, 1, 2524, 2524, NULL, '2022-12-01 08:00:01', '2022-12-01 08:33:46', NULL, NULL),
(36, 2999, NULL, 1, 70, 'test', '2021-12-04', '2022-06-10', '1970-01-01', '1970-01-01', '2021-12-04', 7.51, 'Form work and reinforcement work for first floor roof slab completed. Brick work is in progress', '2021-12-05', '2022-06-10', NULL, NULL, NULL, 37, '30-11-2022', 'Form work and reinforcement work for first floor roof slab completed. Brick work is in progress.', 7.51, 37, 0, 3, 1, 1, 1, 1, 2524, 2524, NULL, '2022-12-01 08:01:13', '2022-12-01 08:34:32', NULL, NULL),
(37, 2999, NULL, 1, 71, 'test', '2021-06-11', '2022-06-10', '1970-01-01', '1970-01-01', '2021-06-11', 1.29, 'PMG meeting held on dated 23.09.2022 agency is instructed to rectify the RCC Floor', '2021-06-12', '2022-06-10', NULL, NULL, NULL, 55, '31-10-2022', 'PMG meeting held on dated 23.09.2022 agency is instructed to rectify the RCC Floor', 1.29, 55, 0, 3, 1, 1, 1, 1, 2524, 2524, NULL, '2022-12-01 08:02:18', '2022-12-01 08:34:58', NULL, NULL),
(38, 2999, NULL, 1, 72, 'test', '2021-06-11', '2022-06-10', '1970-01-01', '1970-01-01', '2021-06-11', 1.73, 'Dismantling work is in progrss in room no. 06 External Putty work is in progress. Brick coba completed.', '2021-06-12', '2022-06-10', NULL, NULL, NULL, 44, '31-10-2022', 'Dismantling work is in progrss in room no. 06 External Putty work is in progress. Brick coba completed.', 1.73, 44, 0, 3, 1, 1, 1, 1, 2524, 2524, NULL, '2022-12-01 08:04:59', '2022-12-01 08:35:18', NULL, NULL),
(39, 2999, NULL, 1, 73, 'test', '2021-08-28', '2022-06-10', '1970-01-01', '1970-01-01', '2021-08-28', 0.9834, 'Putty work is in progress', '2021-08-29', '2022-06-10', NULL, NULL, NULL, 3, '30-09-2022', 'Putty work is in progress', 0.9834, 3, 0, 3, 1, 1, 1, 1, 2524, 2524, NULL, '2022-12-01 08:04:59', '2022-12-01 08:35:51', NULL, NULL),
(40, 2999, NULL, 1, 74, 'test', '2021-08-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 2524, 2524, NULL, '2022-12-01 08:05:37', '2022-12-01 08:11:13', NULL, NULL),
(41, 2999, NULL, 1, 76, 'test', '2021-12-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 2524, 2524, NULL, '2022-12-01 08:09:36', '2022-12-01 08:11:13', NULL, NULL),
(42, 2999, NULL, 1, 77, 'test', '2021-10-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 2524, 2524, NULL, '2022-12-01 08:09:57', '2022-12-01 08:11:13', NULL, NULL),
(43, 2999, NULL, 1, 79, 'test', '2021-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 2524, 2524, NULL, '2022-12-01 08:10:46', '2022-12-01 08:11:13', NULL, NULL),
(44, 2999, NULL, 1, 80, 'test', '2021-06-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, 2524, 2524, NULL, '2022-12-01 08:11:13', '2022-12-01 08:11:13', NULL, NULL),
(45, 3020, NULL, 1, 1, 'test', '2018-08-27', '2018-09-13', '2018-09-17', '2018-11-19', '2018-12-13', 70185862, NULL, '2019-01-31', '2022-09-30', '2019-12-31', '2021-12-31', '2022-09-30', 86, '30-09-2022', 'Structural Glazing Toilet Partitions', NULL, NULL, NULL, 2, 0, 1, 1, 0, 2514, 2514, NULL, '2022-12-03 00:29:36', '2022-12-03 02:25:33', NULL, NULL),
(46, 3020, NULL, 1, 2, 'test', '2020-11-02', '2020-11-16', '2020-11-17', '2020-12-04', '2020-12-18', 17323933, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2514, 2514, NULL, '2022-12-03 00:35:29', '2022-12-03 02:20:24', NULL, NULL),
(47, 3020, NULL, 1, 81, 'test', '2020-10-31', '2020-11-14', '2020-11-16', '2020-12-09', '2020-12-11', 18833667, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2514, 2514, NULL, '2022-12-03 01:42:48', '2022-12-03 02:20:24', NULL, NULL),
(48, 3020, NULL, 1, 82, 'test', '2019-08-06', '2019-09-03', '2019-09-03', '2019-12-09', '2020-01-09', 247120000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2514, 2514, NULL, '2022-12-03 01:49:45', '2022-12-03 02:20:24', NULL, NULL),
(49, 3020, NULL, 1, 83, 'test', '2021-02-11', '2021-03-02', '2021-03-04', '2021-03-24', '2021-04-27', 126978216, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2514, 2514, NULL, '2022-12-03 01:51:24', '2022-12-03 02:20:24', NULL, NULL),
(50, 3020, NULL, 1, 84, 'test', '2021-07-12', '2021-07-24', '2021-07-27', '2021-08-07', '2021-08-09', 220138430, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2514, 2514, NULL, '2022-12-03 01:53:12', '2022-12-03 02:20:24', NULL, NULL),
(51, 3020, NULL, 1, 86, 'test', '2022-07-19', '2022-07-27', '2022-07-27', '2022-08-04', '2022-08-05', 5500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2514, 2514, NULL, '2022-12-03 01:58:47', '2022-12-03 02:20:24', NULL, NULL),
(52, 3020, NULL, 1, 87, 'test', '2022-07-19', '2022-07-27', '2022-07-27', '2022-08-04', '2022-08-05', 8500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2514, 2514, NULL, '2022-12-03 01:59:43', '2022-12-03 02:20:24', NULL, NULL),
(53, 3020, NULL, 1, 85, 'test', '2022-04-27', '2022-05-04', '2022-05-04', '2022-05-04', '2022-05-17', 4316201, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2514, 2514, NULL, '2022-12-03 02:07:57', '2022-12-03 02:20:24', NULL, NULL),
(54, 3020, NULL, 4, 1, 'test', '2018-08-27', '2018-09-17', '2018-09-17', '2018-11-19', '2018-12-13', 78885862, NULL, '2019-01-31', '2022-09-30', '2019-12-31', '2021-12-31', '2022-09-30', 86, '30-09-2022', 'Structural Glazing Work', NULL, NULL, NULL, 2, 0, 1, 1, 0, 2514, 2514, NULL, '2022-12-03 02:36:46', '2022-12-03 02:38:52', NULL, NULL),
(55, 3015, NULL, 6, 105, 'test', '2022-12-06', '2022-12-07', '2022-12-08', '2022-12-09', '2022-12-10', 12, 'Remarks', '2022-12-11', '2022-12-22', '2022-12-12', '2022-12-15', '2022-12-19', 100, '25', 'Testing', 15, 25, 1, 3, 1, 1, 1, 1, 2522, 2522, 2522, '2022-12-05 00:26:33', '2022-12-05 00:29:29', '2022-12-05 05:59:29', NULL),
(56, 3015, NULL, 6, 106, 'test', '2022-12-09', '2022-12-10', '2022-12-12', '2022-12-14', '2022-12-15', 12, 'Testing', '2022-12-16', '2022-12-27', '2022-12-17', '2022-12-19', '2022-12-23', 50, '25', 'Testing2', 78, 15, 1, 3, 1, 1, 1, 1, 2522, 2522, 2522, '2022-12-05 00:26:33', '2022-12-05 00:29:29', '2022-12-05 05:59:29', NULL),
(57, 3015, NULL, 6, 108, 'test', '2022-12-08', '2022-12-09', '2022-12-10', '2022-12-15', '2022-12-21', 25, 'Test', '2022-12-22', '2022-12-30', '2022-12-23', '2022-12-24', '2022-12-25', 100, '25', 'Test', NULL, NULL, NULL, 2, 0, 1, 1, 0, 2522, 2522, NULL, '2022-12-05 01:01:36', '2022-12-28 07:39:57', NULL, 3015),
(58, 3015, NULL, 6, 109, 'test', '2022-12-06', '2022-12-22', '2022-12-23', '2022-12-24', '2022-12-25', 88, 'Test2', '2022-12-26', '2022-12-30', '2022-12-28', NULL, NULL, 25, '35', 'Test', NULL, NULL, NULL, 2, 0, 1, 1, 0, 2522, 2522, NULL, '2022-12-05 01:01:36', '2022-12-28 07:39:57', NULL, 3015),
(59, 3020, NULL, 6, 1, 'test', '2022-12-01', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', 88700000, 'Testing', '2022-12-06', '2022-12-07', '2022-12-07', NULL, NULL, 30, '10-05-2022', 'Testing 2', NULL, NULL, NULL, 2, 0, 1, 1, 0, 2514, 2514, NULL, '2022-12-05 01:09:52', '2022-12-05 01:26:24', NULL, NULL),
(60, 3015, 2522, 6, 113, 'test', '2022-12-02', '2022-12-04', '2022-12-05', '2022-12-06', '2022-12-07', 600, 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2522, 2522, 2522, '2022-12-28 07:34:35', '2022-12-28 07:37:21', '2022-12-28 13:07:21', 3015),
(61, 3015, 2522, 9, 113, 'test', '2022-12-02', '2022-12-04', '2022-12-05', '2022-12-06', '2022-12-07', 600, 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2522, NULL, NULL, '2022-12-28 07:35:57', '2022-12-28 07:38:26', '2022-12-28 13:08:26', 3015),
(62, 3015, 2522, 6, 114, 'test', '2022-12-02', '2022-12-05', '2022-12-06', '2022-12-07', '2022-12-08', 600, 'testting 2', '2022-12-09', '2022-12-31', '2022-12-11', '2022-12-12', '2022-12-13', 100, '500', 'testing', 400, 400, 1, 3, 1, 1, 1, 1, 2522, 2522, NULL, '2022-12-28 07:37:21', '2022-12-28 07:40:20', NULL, 3015),
(63, 3015, 2522, 9, 113, 'test', '2022-12-02', '2022-12-04', '2022-12-05', '2022-12-06', '2022-12-07', 600, 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2522, NULL, NULL, '2022-12-28 07:38:26', '2022-12-28 07:40:43', '2022-12-28 13:10:43', 3015),
(64, 3015, 2522, 9, 114, 'test', '2022-12-02', '2022-12-05', '2022-12-06', '2022-12-07', '2022-12-08', 600, 'testting 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2522, NULL, 2522, '2022-12-28 07:38:26', '2022-12-28 07:40:43', '2022-12-28 13:10:43', 3015),
(65, 3015, 2522, 9, 113, 'test', '2022-12-02', '2022-12-04', '2022-12-05', '2022-12-06', '2022-12-07', 600, 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2522, NULL, 2522, '2022-12-28 07:40:43', '2022-12-28 07:40:43', '2022-12-01 14:21:44', 3015),
(66, 3015, 2522, 9, 114, 'test', '2022-12-02', '2022-12-05', '2022-12-06', '2022-12-07', '2022-12-08', 600, 'testting 2', '2022-12-09', '2022-12-31', '2022-12-11', '2022-12-12', '2022-12-13', 100, '500', 'testing', 400, 400, 1, 3, 1, 1, 1, 1, 2522, NULL, NULL, '2022-12-28 07:40:43', '2022-12-28 07:40:43', NULL, 3015),
(67, 3009, 2519, 1, 115, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 300, 'testing', '2022-12-07', '2022-12-31', '2022-12-08', '2022-12-15', NULL, 100, '100', 'tetsting 21', 30000, 10, NULL, 3, 0, 1, 1, 1, 2519, 2519, NULL, '2022-12-28 07:50:07', '2022-12-28 07:56:04', NULL, 3009),
(68, 3009, 2519, 6, 115, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 200, 'testing', '2022-12-07', '2022-12-31', '2022-12-31', NULL, NULL, 100, 'testing', '100', 4000, 50, NULL, 3, 0, 1, 1, 1, 2519, 2519, NULL, '2022-12-28 07:57:45', '2022-12-28 07:58:28', NULL, 3009),
(69, 3009, 2519, 8, 115, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 600, 'testing', '2022-12-07', '2022-12-31', '2022-12-08', NULL, NULL, 100, 'testing', 'testing', 100, 600, 0, 2, 1, 1, 1, 1, 2519, 2519, NULL, '2022-12-28 08:01:23', '2022-12-29 01:40:33', NULL, 3009),
(70, 3009, 2519, 9, 115, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 600, 'testing', '2022-12-07', '2022-12-31', '2022-12-08', NULL, NULL, 100, 'testing', 'testing', 100, 600, NULL, 3, 0, 1, 1, 1, 2519, NULL, NULL, '2022-12-28 08:02:05', '2022-12-28 08:02:05', NULL, 3009),
(71, 3009, 2519, 8, 117, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 9000, 'testing', '2022-12-07', '2022-12-31', '2022-12-31', NULL, NULL, 100, '100', 'testing', 600, 900, 0, 2, 1, 1, 1, 1, 2519, 2519, NULL, '2022-12-28 08:43:53', '2022-12-29 01:40:33', NULL, 3009),
(72, 3009, 2519, 8, 116, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 600, 'testing', '2022-12-01', '2022-12-31', '2022-12-02', NULL, NULL, 100, 'testing', 'testing', 600, 600, 0, 2, 1, 1, 1, 1, 2519, 2519, NULL, '2022-12-28 22:47:41', '2022-12-29 01:40:33', NULL, 3009),
(73, 3009, 2519, 8, 118, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 600, 'testing', '2022-12-07', '2022-12-08', '2022-12-08', NULL, NULL, 100, '100', 'testing', 4000, 8000, 0, 2, 1, 1, 1, 1, 2519, 2519, NULL, '2022-12-28 22:58:14', '2022-12-29 01:40:33', NULL, 3009),
(74, 3009, 2519, 8, 119, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 6000, 'testing', '2022-12-07', '2022-12-08', '2022-12-08', NULL, NULL, 100, '10-12-2022', 'testing', 4000, 40000, 1, 2, 1, 1, 1, 1, 2519, 2519, NULL, '2022-12-29 00:20:53', '2022-12-29 01:40:33', NULL, 3009),
(75, 3009, 2519, 8, 39, 'test', '2022-12-01', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', 8000, 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2519, 2519, NULL, '2022-12-29 00:27:53', '2022-12-29 01:39:21', NULL, 3009),
(76, 3009, 2519, 8, 120, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 900, 'teting', '2022-12-07', '2022-12-31', '2022-12-08', '2022-12-09', '2022-12-10', 100, '15-12-2022', 'testing', 1000, 11000, 1, 2, 1, 1, 1, 1, 2519, 2519, NULL, '2022-12-29 00:54:36', '2022-12-29 01:40:33', NULL, 3009),
(77, 3009, 2519, 8, 121, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 7000, 'testing', '2022-12-07', '2022-12-08', '2022-12-08', NULL, NULL, 100, '16-12-2022', 'testing 7', 7000, 70000, 1, 2, 1, 1, 1, 1, 2519, 2519, NULL, '2022-12-29 01:37:25', '2022-12-29 01:40:33', NULL, 3009),
(78, 3009, 2519, 8, 122, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 8000, 'testing', '2022-12-07', '2022-12-31', '2022-12-09', '2022-12-15', NULL, 100, '17-12-2022', 'testing 8', 8000, 8000, 1, 2, 1, 1, 1, 1, 2519, 2519, NULL, '2022-12-29 01:39:21', '2022-12-29 01:40:33', NULL, 3009),
(79, 3015, 2522, 8, 123, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 100, 'ttttt', '2022-12-07', '2022-12-31', '2022-12-08', '2022-12-09', '2022-12-10', 100, '100', 'tttttt', 1000, 6000, 1, 2, 1, 1, 1, 1, 2522, 2522, 2522, '2022-12-29 01:56:52', '2022-12-29 01:58:44', '2022-12-01 14:21:44', 3015),
(80, 3015, 2522, 8, 124, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 600, 'testing', '2022-12-07', '2022-12-31', '2022-12-08', '2022-12-09', NULL, 1000, '12-12-2022', 'WWWWW', 50000, 5000, 0, 2, 1, 1, 1, 1, 2522, 2522, NULL, '2022-12-29 01:57:57', '2022-12-29 01:58:44', NULL, 3015),
(81, 3015, 2522, 10, 113, 'test', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', '2022-12-07', 900, '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2522, 2522, 3015, '2022-12-30 02:39:58', '2022-12-30 02:56:59', '2022-12-30 08:26:59', 3015),
(82, 3015, 2522, 10, 113, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 95, 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 2522, 2522, 2522, '2022-12-30 02:57:23', '2022-12-30 02:57:23', '2022-12-30 08:27:23', 3015),
(83, 3015, 2522, 11, 113, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 6000, 'testing', '2022-12-07', '2022-12-31', '2022-12-08', NULL, NULL, 100, '888', 'testing', NULL, NULL, NULL, 2, 0, 1, 1, 0, 2522, 2522, NULL, '2022-12-30 03:12:25', '2022-12-30 04:14:30', NULL, 3015),
(84, 3015, 2522, 11, 123, 'test', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 100, 'testing', '2022-12-07', '2022-12-08', '2022-12-08', NULL, NULL, 100, '22-12-2022', 'testing', 89, 89, 1, 2, 1, 1, 1, 1, 2522, 2522, NULL, '2022-12-30 04:11:54', '2022-12-30 04:14:30', NULL, 3015);

-- --------------------------------------------------------

--
-- Table structure for table `miscellaneousmanages`
--

CREATE TABLE `miscellaneousmanages` (
  `id` int(11) NOT NULL,
  `project_center_id` bigint(20) DEFAULT NULL,
  `rc_id` bigint(20) DEFAULT NULL,
  `detail_cwp_slp` bigint(20) DEFAULT NULL,
  `template_id` bigint(20) NOT NULL,
  `court` varchar(255) DEFAULT NULL,
  `court_case` varchar(255) DEFAULT NULL,
  `parties` varchar(255) DEFAULT NULL,
  `case_ststus` varchar(255) DEFAULT NULL,
  `name_counsel` varchar(255) DEFAULT NULL,
  `last_date_hearing` date DEFAULT NULL,
  `last_hearing_status` varchar(255) DEFAULT NULL,
  `present_status` varchar(255) DEFAULT NULL,
  `next_day_hearing` varchar(255) DEFAULT NULL,
  `next_day_hearing_option_date` date DEFAULT NULL,
  `next_day_hearing_option_text` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_for` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `miscellaneousmanages`
--

INSERT INTO `miscellaneousmanages` (`id`, `project_center_id`, `rc_id`, `detail_cwp_slp`, `template_id`, `court`, `court_case`, `parties`, `case_ststus`, `name_counsel`, `last_date_hearing`, `last_hearing_status`, `present_status`, `next_day_hearing`, `next_day_hearing_option_date`, `next_day_hearing_option_text`, `remarks`, `user_id`, `created_for`, `created_by`, `updated_by`, `deleted_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2517, NULL, 2, 1, 'CAT, Guwahati Bench', 'Reinstatement', 'Anjan Borthakur –vs-M/O YOUTH AFFAIRS &AMP; SPORTS & OTHERS', 'PENDING', 'Ranjit Kumar Dev Choudhury', '2021-05-12', 'Adjourned with directions', 'PENDING', 'text', NULL, NULL, 'Court did not sit due to COVID restrictions.', 2517, NULL, 2517, 2517, NULL, 1, '2022-11-25 06:36:05', '2022-11-25 06:37:29', NULL),
(2, 2517, NULL, 3, 1, 'Hon’ble Gauhati High Court', 'Other service matters with respect to State Govt Employees', 'Pradip Das –vs- The UOI & 5 Ors.', 'PENDING', 'Ranjit Kumar Dev Choudhury', '2022-07-29', 'Motion', 'Monthly Monitoring_October_RC Guwahati 100% 11 J5  Affidavit filed by SAI To enable screen reader support, press Ctrl+Alt+Z To learn about keyboard shortcuts, press Ctrl+slash      		 Affidavit filed by SAI Turn on screen reader support', 'text', NULL, NULL, 'Petitioner sought two week time for reply against affidavit file by SAI', 2517, NULL, 2517, 2517, NULL, 1, '2022-11-25 06:37:29', '2022-11-25 06:38:19', NULL),
(3, 2517, NULL, 4, 1, 'Civil Court (Civil Judge No.1 Kamrup (M) at Guwahati, Assam.', '7 Rule2    Service', 'Sports Authority of India, Regional Centre Guwahati –vs-Anjan Borthakur', 'PENDING', 'Ranjit Kumar Dev Choudhury', '2021-02-19', 'Steps before Preliminary Hearing', 'PENDING', 'text', NULL, NULL, 'Case was transferred from Court of Civi Judge No.1 to Munsiff Court but with the stay of the Notification by the Hon\'ble High Court issued by the Hon\'ble Court of District & Sessions Judge, Kamrup(M) at', 2517, NULL, 2517, 2517, NULL, 1, '2022-11-25 06:42:07', '2022-11-25 06:42:43', NULL),
(4, 2517, NULL, 5, 1, 'Hon’ble    Gauhati High Court', 'Non-Service    Writ Petition', 'Arman Ali –vs- The State of Assam, Department of Sports and Youth Welfare & Ors. R 3 - SAI', 'PENDING', 'Ranjit Kumar Dev Choudhury', '2019-12-12', 'Admission', 'PENDING', 'text', NULL, NULL, 'Affidavit In Opposition filed from Respondent No.3 (Sports Authority of India).', 2517, NULL, 2517, 2517, NULL, 1, '2022-11-25 06:42:07', '2022-11-25 06:42:25', NULL),
(5, 2517, NULL, 6, 1, 'Hon’ble Gauhati High Court', 'Non-Service    Writ Petition', 'Ms.Akanshya P. Gogoi D/o. Shi Indranil Gogoi (being minor) duly represented by her mother – Mrs. Babita P. Gogoi & Ors. –vs- All Assam Taekwondo Association (AATA) (One Body) represented by Shri Dilip Dauka, General Secretary & Ors.)', 'PENDING', 'Ranjit Kumar Dev Choudhury', '2018-04-09', 'Orders', 'PENDING', 'text', NULL, NULL, 'Affidavit-In-Opposition filed from Respondent No .1(All Assam Taekwondo Association AATA & 5 Ors.', 2517, NULL, 2517, 2517, NULL, 1, '2022-11-25 06:44:38', '2022-11-25 06:46:37', NULL),
(6, 2517, NULL, 7, 1, 'Hon’ble Gauhati High Court', 'Non Payment of Contractual Bill by Sports Authority of Assam during 12th South Asian Games,2016', 'Md. Mokshed Ali Vs Union of India and 7Others', 'Pending', 'Ms. Aruradha Gayan', '2022-09-02', 'Hon\'ble Court has passed order dated 18/05/2022 to obtain immediate instructions regarding time by which the amounts involved can be released by UOI for onwar payment', 'Pending: order dated 18/5/2022 forwarded to H.O for instruction & pending for filing affidavit on behalf of SAI.', 'text', NULL, NULL, 'CGC appeared on 28.7.2022 & Affidavit in opposition to be submitted.', 2517, NULL, 2517, 2517, NULL, 1, '2022-11-25 06:46:37', '2022-11-25 06:47:20', NULL),
(7, 2517, NULL, 8, 1, 'Hon’ble Gauhati High Court', 'Non Payment of Contractual Bill by Sports Authority of Assam during 12th South Asian Games,2016', 'Mr .Bhupen Daimary Vs Union of India and 7Others', 'Pending', 'Ms. Aruradha Gayan', '2022-09-02', 'Hon\'ble Court has passed order dated 18/05/2022 to obtain immediate instructions regarding time by which the amounts involved can be released by UOI for onwar payment', 'Pending: order dated 18/5/2022 forwarded to H.O for instruction & pending for filing affidavit on behalf of SAI.', 'text', NULL, 'will be fixed after reopening of the court; i.e. after 18.10.2022', 'CGC appeared on 28.7.2022 & Affidavit in opposition to be submitted.', 2517, NULL, 2517, NULL, NULL, 1, '2022-11-25 06:47:20', '2022-11-25 06:47:20', NULL),
(8, 2518, NULL, 9, 1, 'CAT Calcutta', 'DACP Scheme', 'Dr. Laila Das & ors VS UOI & SAI', 'Adjourned with directions', 'D. N. Roy, Advocate', '2022-11-07', 'Adjourned with directions', 'pending', 'date', NULL, NULL, 'pending', 2518, NULL, 2518, 2518, NULL, 1, '2022-11-27 23:35:26', '2022-11-28 06:50:22', NULL),
(9, 2518, NULL, 11, 1, 'High Court, Patna', 'Regularization', 'UOI & Ors. –v/s- Manish Ch. Roy', 'Judgment reserved', 'Rajesh Kumar Verma, Advocate', '2019-11-20', 'Judgment reserved', 'pending', 'date', NULL, NULL, 'pending', 2518, NULL, 2518, 2518, NULL, 1, '2022-11-27 23:35:26', '2022-11-28 06:50:22', NULL),
(10, 2518, NULL, 12, 1, 'Calcutta High Court', 'Mediclaim', 'Dinanath Patra Vs UOI &  SAI', 'Adjourned with directions', 'D. N. Ray, Advocate', '2017-04-03', 'Adjourned with directions', 'pending', 'text', NULL, NULL, 'pending', 2518, NULL, 2518, 2518, NULL, 1, '2022-11-27 23:35:26', '2022-11-27 23:53:37', NULL),
(11, 2518, NULL, 13, 1, 'CAT  Kolkata  Bench', 'Resignation on lien', 'Anup Shaw –v/s- UOI & Ors.', 'Adjourned with directions', 'D. N. Roy, Advocate', '2022-09-01', 'Adjourned with directions', 'pending', 'date', NULL, NULL, 'pending', 2518, NULL, 2518, 2518, NULL, 1, '2022-11-27 23:35:26', '2022-11-27 23:53:37', NULL),
(12, 2518, NULL, 14, 1, 'CAT Kolkata Bench', 'Transfer', 'Dr. Subrata Mallick Vs UOI & SAI', 'List this matter as and when moved.', 'D. N. Roy, Advocate', '2017-04-24', 'Adjourned with directions', 'pending', 'text', NULL, NULL, 'pending', 2518, NULL, 2518, 2518, NULL, 1, '2022-11-27 23:35:26', '2022-11-27 23:53:37', NULL),
(13, 2518, NULL, 15, 1, 'CAT Cuttack Bench', 'Regularization', 'Atanu Ghosh & Ors. –v/s- UOI & Ors', 'Adjourned with directions', 'Sri Lalitendu Mishra', '2022-09-21', 'Adjourned with directions', 'pending', 'date', NULL, NULL, 'pending', 2518, NULL, 2518, 2518, NULL, 1, '2022-11-27 23:35:26', '2022-11-27 23:53:37', NULL),
(14, 2518, NULL, 16, 1, 'CAT Calcutta Bench', 'Suspension', 'Smt. R. Shanmugavalli Vs. UOI & SAI', 'Adjourned with directions', 'D. N. Roy, Advocate', '2022-09-15', 'Adjourned with directions', 'pending', 'date', NULL, NULL, 'pending', 2518, NULL, 2518, 2518, NULL, 1, '2022-11-27 23:35:26', '2022-11-27 23:53:37', NULL),
(15, 2518, NULL, 17, 1, 'CAT  Kolkata Bench', 'Reimbursement', 'DILIP KUMAR SINHA Vs SAI', 'For finial disposal', 'D. N. Roy, Advocate', '2022-09-20', 'Adjourned with directions', 'pending', 'date', NULL, NULL, 'pending', 2518, NULL, 2518, 2518, NULL, 1, '2022-11-27 23:35:26', '2022-11-27 23:53:37', NULL),
(16, 2518, NULL, 18, 1, 'CAT Cuttack Bench', 'termination service', 'D. AJAY RAO Vs. UOI & SAI', 'Adjourned with directions', 'Lalitendu Mishra, Advocate', '2022-06-01', 'Adjourned with directions', 'pending', 'text', NULL, NULL, 'pending', 2518, NULL, 2518, 2518, NULL, 1, '2022-11-27 23:35:26', '2022-11-27 23:53:37', NULL),
(17, 2518, NULL, 19, 1, 'High Court of Orissa', 'Regularization', 'Ashok Ghosh	VS  UOI & SAI', 'Adjourned with directions', 'P.K.Parhi, ASGI', '2022-07-19', 'Adjourned with directions', 'pending', 'text', NULL, NULL, 'pending', 2518, NULL, 2518, 2518, NULL, 1, '2022-11-27 23:35:26', '2022-11-27 23:53:37', NULL),
(18, 3009, NULL, 20, 1, 'CAT Allahabad', 'Restoration of Service', 'Ajit Singh v/s UOI & Others', 'Comments for supplementary reply have been sent to the SAI advocate at Allahabad. The counter affidavit has been filed', 'Rajeshwar Rao', '2022-10-12', 'The next date of hearing of the case was fixed.', 'On going', 'date', '2022-12-05', NULL, 'Awaited', 2519, NULL, 2519, NULL, NULL, 1, '2022-11-29 01:50:45', '2022-11-29 01:50:45', NULL),
(19, 3009, NULL, 21, 1, 'Assistant labour commissioner Bareilly', 'Bareilly claiming wages and January 2018 as security guards employed on outsourced basis through M/s Lion Security Service Lucknow', 'Arun Yadav and Vishnu Yadav V/s STC Bareilly', 'The Centre Incharge, STC Bareilly informed that  the hearing on 18.10.2022. After the change of advocate to Sh. Sumit Saxena. The transfer of documents rom the previous to the new advocate is being ensured by the Bareilly centre.', 'Sumit Saxena', '2022-10-18', 'The next date of hearing of the case was fixed.', 'On going', 'date', '2022-12-28', NULL, 'awaited', 2519, NULL, 2519, NULL, NULL, 1, '2022-11-29 01:50:45', '2022-11-29 01:50:45', NULL),
(20, 3009, NULL, 22, 1, 'Court of Civil Judge (J.D), North Lucknow', 'We have filed the case of suit for Recovery of Money', 'Sports Authority of India Vs M/s Om Needeshiya Group', 'The case was last listed on 28.10.2022.', 'Mr. Murtaza Hasnain Khan', '2022-10-28', 'Our replication has been filed and on record and the case is listed for framing of issues', 'On going', 'date', '2022-12-16', NULL, 'awaited', 2519, NULL, 2519, NULL, NULL, 1, '2022-11-29 01:50:45', '2022-11-29 01:50:45', NULL),
(21, 3009, NULL, 23, 1, 'HIGH COURT (LUCKNOW) UTTAR PRADESH', 'The petitioner is claiming the amount for participation of Handball championship held in Saudi Arabia January 2022.', 'Mohit  Yadav Vs Union of India (Parties): Ministry of youth affairs and sports SAI, Delhi Handball federation of India  UP handball association', 'The defendants  have gone in SLP for the said case.', 'UOI- ASG SAI Lucknow- Mr. Murtaza Hasnain Khan', '2022-01-13', 'Hearing on SLP', 'On going', 'date', '2022-12-02', NULL, 'Undated  in Allahabad HC Lucknow Bench Hearing on SLP:', 2519, NULL, 2519, NULL, NULL, 1, '2022-11-29 01:50:45', '2022-11-29 01:50:45', NULL),
(22, 3009, NULL, 24, 1, 'HIGH COURT (LUCKNOW) UTTAR PRADESH', 'The petitioner is claiming the amount for participation of Handball championship held in Saudi Arabia January 2022.', 'Sheetal Kumari Vs Union of India(Parties): Ministry of youth affairs and sports SAI, Delhi Handball federation of India  UP handball association', 'The case has been transferred from Delhi to lucknow office for further handling.', 'UOI- ASG SAI Lucknow- Mr. Murtaza Hasnain Khan', '2022-04-11', 'An order was passed on the 04.03.2022  the compliance of which was made. A counter affidavit has to be filed along with a recall of order application on the next date sent by HO', 'on going', 'text', NULL, 'UNDATED', 'awaited', 2519, NULL, 2519, NULL, NULL, 1, '2022-11-29 01:50:45', '2022-11-29 01:50:45', NULL),
(23, 3009, NULL, 25, 1, 'TRIBUNALS (LUCKNOW) CENTRAL ADMINISTRATIVE TRIBUNAL', 'SERVICE MATTERS POST RETIREMENT MEDICAL BENEFITS', '1. Mohammad Raza 2. DEPARTMENT OF SPORTS', 'A counter is to be filed within  4 weeks.', 'Standing counsel; Prayagmati Gupta', '2022-10-10', 'In the last hearing the defendant that is department of sports and SAI is asked to file a written statement.', 'on going', 'date', '2022-12-14', NULL, 'awaited', 2519, NULL, 2519, NULL, NULL, 1, '2022-11-29 01:50:45', '2022-11-29 01:50:45', NULL),
(24, 3009, NULL, 26, 1, 'HIGH COURT (LUCKNOW) UTTAR PRADESH', 'The petitioner is seeking from the IOA to open the portal for document accreditation of the players so that they may participate in the national games.', 'Handball association India', 'Summons were issued to Sai and IOA.', 'ASGI', '2022-10-21', 'A visit was paid to the ASGI for including SAI HO’s comments being incorporated in the reply. The suit was not listed on the said date and a further date was provided', 'On going', 'text', NULL, 'The tentative date was 03.11.2022. However it is currently not listed.', 'awaited', 2519, NULL, 2519, NULL, NULL, 1, '2022-11-29 01:50:45', '2022-11-29 01:50:45', NULL),
(25, 2514, NULL, 27, 1, 'HIGH COURT, KARNATAKA', 'GRANT OF RS 5400 GRADE PAY UNDER ACP/MACP SCHEME', 'RD SAI AND OTHERS Vs SULTAN RAZIA AND OTHERS', 'Case in argument stage, several IA\'s filed and heard. Respodent advocate not present. matter adjourned', 'J. Hudson Samuel & Partners', '2022-03-31', 'argument stage', 'case in argument stage', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-29 04:36:19', '2022-11-29 23:59:07', NULL),
(26, 2514, NULL, 28, 1, 'HIGH COURT OF KARNATAKA', 'GRANT OF BACK WAGES', 'SAI Vs MR RAJA, MTS', 'W.P has been filed against the the Order of CAT in O.A No. 170/218/2021 filed by Mr. Raja', 'Prakash Shetty', '2022-02-09', 'Admitted in the Court', 'NA', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-29 04:36:19', '2022-11-29 23:59:07', NULL),
(27, 2514, NULL, 29, 1, 'HIGH COURT, KARNATAKA', 'Approached court for reduction of punishments', 'K.V.Nancharaiah Vs UOI & OTHERS', 'case handed over to new advocate Shri B.C.Prabhakar Sr.Advocate with a request to appear before the court and to seek sufficient time for filing reply. Vetted reply sent to advocate for filing .', 'B C Prabakar', '2021-10-27', 'Adjourned for compliance', 'Respondent was penalized with compulsory retirement after a duly conducted inquiry(sexual harassment), he has challenged the validity of the inquiry. Currently HC is serving notice to Resp. 02, not completed even after several attempts', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-29 04:36:19', '2022-11-29 23:59:07', NULL),
(28, 2514, NULL, 30, 1, 'HIGH COURT, KARNATAKA', 'Reducing of Punishment', 'SAI and Others Vs K V Nancharaiah', 'Writ petition filed on 16/1/2020 Matter handed over to Shri. B.C Prabhakar, new advocate . matter heard on 17/11/2020 and got stay for the operation of contempt petition. Next date of hearing is 16/2/2021. Matter connected with WP 1580', 'B C Prabakar', '2021-08-19', 'Time granted to take steps in respect of Resp No 02, Padmaja Bala again', 'matter was further adjourned', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-29 23:59:07', '2022-11-30 00:07:29', NULL),
(29, 2514, NULL, 32, 1, 'HIGH COURT, KARNATAKA', 'Grant of Grade-1 driver', 'Director SAI NSSC Vs P RAVI', 'The court has granted stay for the operation of CAT, Bangalore Bench Order, Matter is not listed since 25/09/2021 where order issued to the petitioner advocated was recalled', 'S Prakash Shetty', '2021-09-25', 'arguement stage', 'Arguments', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 00:07:29', '2022-11-30 00:08:07', NULL),
(30, 2514, NULL, 33, 1, 'CAT, BENGALURU', 'Requested for nursing allowance and arrears of pay', 'V Karuna Devi Vs DG SAI & OTHERS', 'Matter ready for hearing', 'S Prakash Shetty', '2022-11-03', 'argument stage', 'Arguments', 'date', '2022-11-17', NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 00:11:30', '2022-11-30 00:11:53', NULL),
(31, 2514, NULL, 34, 1, 'HIGH COURT, ANDHRA PRADESH', 'not allowing to participate in National Competitions', 'MIRIYALA NAVYA Vs UOI and Others', 'case in admission stage as of 20/04/2020, pending since then', 'Ogirala Ramesh', '2022-04-20', 'NA', 'NA', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 00:14:56', '2022-11-30 00:16:47', NULL),
(32, 2514, NULL, 35, 1, 'HIGH COURT, TELANGANA', 'Dispute between sailing association, regarding derecognition of Yachting Association of lndia', 'Telangana Sailing Association, E BABU NAIDU Vs UOI and Other', 'Pending , not listed since last date is of hearing', 'Ogirala Ramesh', '2020-03-10', 'NA', 'NA', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 00:16:47', '2022-11-30 00:18:41', NULL),
(33, 2514, NULL, 36, 1, 'HIGH COURT, TELANGANA', 'Dispute between federations', 'UPENDRANATH CHALLU Vs UOI and Others', 'Pending , not listed since last date is of hearing', 'Ogirala Ramesh', '2020-06-25', 'NA', 'Pending not listed', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 00:18:41', '2022-11-30 00:20:36', NULL),
(34, 2514, NULL, 37, 1, 'CAT, BENGALURU', 'SERVICE MATTER REGULARIZATION', 'Suma Patlumane Vs UOI & others', 'Pending routine hearing', 'Prakash Shetty', '2022-09-26', 'NA', 'Hearing', 'date', '2022-11-25', NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 00:20:36', '2022-11-30 00:22:25', NULL),
(35, 2514, NULL, 38, 1, 'HIGH COURT, TELENGANA', 'DISPUTE BETWEEN FEDERATION SAI MADE AS A PARTY', 'National Access Class Association of India, N C BABU Vs UOI SECRETARY SAI AND OTHERS', 'Pending on HC site , filed on 16/04/2013 listed on  28/12/2021', 'Ogirala Ramesh', '2022-01-14', 'NA', 'NA', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 00:22:25', '2022-11-30 00:26:20', NULL),
(36, 2514, NULL, 39, 1, 'HIGH COURT, TELENGANA', 'DISPUTE BETWEEN FEDERATIONS SAI HAS BEEN ONE PARTY', 'TAEKWONDO ASSOCIATION Vs UOI SAI HO IOA AND OTHERS', 'Pending on HC site ,  not listed', 'Ogirala Ramesh', '2022-01-20', 'NA', 'NA', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 00:24:04', '2022-11-30 00:26:20', NULL),
(37, 2514, NULL, 40, 1, 'HIGH COURT, KARNATAKA', 'MODIFICATION IN SELECTION CRITERIA SAI MADE PARTY', 'ULLAS N V AND OTHERS Vs ASSOCIATION OF UNIVERSITIES AND SAI', 'SAI has no role to play ,data not found on High court website . Copy petition not recieved', 'J. Hudson Samuel & Partners', '2022-02-25', 'NA', 'NA', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 00:32:30', '2022-11-30 00:40:30', NULL),
(38, 2514, NULL, 41, 1, 'HIGH COURT, TELENGANA', 'DISPUTE BETWEEN ASSOCIATION WITH REGAD TO ELECTION', 'TELENGANA CYCLING ASSOCIATION, DURGA PRASAD DIXIT Vs UOI DG SAI AND OTHERS', 'Pending on HC site , Not listed', 'Ogirala Ramesh', '2018-04-18', 'NA', 'NA', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 00:32:30', '2022-11-30 00:40:30', NULL),
(39, 2514, NULL, 43, 1, 'CAT, BENGALURU', 'Challenging the recruitment of Capt. E Bhaskaran, on contarct for the post of Head of Faculty in Kabaddi', 'DR G R SRIDHAR KUMAR Vs SPORTS AUTHORITY OF INDIA', 'Matter was heard on 23rd Dec 21 and was further posted for filing of rejoinder', 'S Prakash Shetty', '2022-11-10', 'Rejoinder filed by opposite party', 'reply not filed for rejoinder', 'date', '2022-11-21', NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 01:32:32', '2022-11-30 01:34:33', NULL),
(40, 2514, NULL, 44, 1, 'HIGH COURT, KARNATAKA', 'Challenging the order of CAT in OA 332/2020, Wherein Orders were Passed by CAT in favour of the applicant & directions are given to conduct the inquiry denovo and release all the retiremnet benefits within 30 days', 'DG SAI & Ors Vs MS Murali', 'Matter is being argued by both the advocates', 'S Prakash Shetty', '2022-07-05', 'Matter was adjourned', 'arguments', NULL, NULL, NULL, 'to produce records before the court regarding initiating of disciplinary proceedings.', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 01:34:33', '2022-11-30 01:36:12', NULL),
(41, 2514, NULL, 45, 1, 'HIGH COURT, KARNATAKA', 'Irregulariteis in conduct of 13th National Kalaripayattu championship', 'Arya Shajiju & Others Vs Indian Kalarippayattu Federation & Others', 'Listed for first hearing on 28/9/2021', 'SAI H.O.', '2021-09-28', 'not listed', 'NA', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 01:36:12', '2022-11-30 01:37:43', NULL),
(42, 2514, NULL, 46, 1, 'HIGH COURT, ANDHRA PRADESH, AMARAVATI', 'Kabaddi Federation of India is not allowing the national players to participate in championship', 'Kornana Jhansi & Others Vs UOI & Others', 'Notice received beyond date', 'Ogirala Ramesh', '2022-04-06', 'adjourned', 'NA', NULL, NULL, NULL, 'as directed by H.O. local counsel has been informed to appear before the court to obtain copy of writ petition', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 01:37:43', '2022-11-30 01:39:19', NULL),
(43, 2514, NULL, 47, 1, 'HIGH COURT, TELANGANA', 'Dispute between Federation', 'Kaparavena Anjaneyulu Vs DG, SAI & Others', 'Listed for first hearing on 28/9/2021', 'Ogirala Ramesh', '2022-06-27', 'adjourned', 'to issue notice to Respondents', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 01:39:19', '2022-11-30 01:40:40', NULL),
(44, 2514, NULL, 48, 1, 'HIGH COURT, ANDHRA PRADESH, AMARAVATI', 'Conduct of elections', 'AP Football Association Vs UOI & Others', 'there shall be interim stay of election to AP Football Association', 'Ogirala Ramesh', '2022-06-20', 'adjourned', 'for admission', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 01:40:40', '2022-11-30 01:41:03', NULL),
(45, 2514, NULL, 49, 1, 'HIGH COURT, ANDHRA PRADESH, AMARAVATI', 'not allowing to participate in National Competitions', 'Karampudu Gayatri & 11 others Vs UOI and others', '---', 'Ogirala Ramesh', '2022-06-28', 'adjourned', 'for filing comments', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 01:43:17', '2022-11-30 01:45:03', NULL),
(46, 2514, NULL, 50, 1, 'CAT, BENGALURU', 'Relieving from duties', 'Karampudu Gayatri & 11 others Vs UOI and others', 'OA filed to grant Stay for the operation of relieving order dated 19/5/2022', 'S Prakash Shetty', '2022-09-29', 'issue of notices', 'to appear before the court', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 01:45:03', '2022-11-30 02:00:08', NULL),
(47, 2514, NULL, 59, 1, 'HIGH COURT, KARNATAKA', 'RELIEVING FROM DUTIES', 'SUMA PATLUMANE Vs UOI & OTHERS', 'writ petition filed to grant Stay for the operation of relieving order dated 19/5/2022', 'S PRAKASH SHETTY', '2022-06-17', 'Court has given direction to submit the annexures', 'TO SUBMIT ANNEXURE', NULL, NULL, NULL, 'filed internal application to continue in service, draft parawise reply prepared to IA and sent to Head Office for vetting', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 02:00:08', '2022-11-30 02:01:52', NULL),
(48, 2514, NULL, 51, 1, 'CAT, BENGALURU', 'REGULARIZATION OF SERVICES', 'Komala, Jayamma and Rajendran', 'Contempt petition has been filed for non0compliance of CAT order', 'S Prakash Shetty', '2022-08-09', 'Court has given one week time to submit the objection', 'TO SUBMIT OBJECTION', 'date', '2022-11-16', NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 02:01:52', '2022-11-30 02:03:44', NULL),
(49, 2514, NULL, 52, 1, 'HIGH COURT, KARNATAKA', 'Dispute between federations', 'Karnataka Kalaripayattu Association', 'Same soceity registration', 'NA', '2022-02-02', 'NA', 'NA', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, 2514, NULL, 1, '2022-11-30 02:03:44', '2022-11-30 02:04:11', NULL),
(50, 2514, NULL, 52, 1, 'HIGH COURT, KARNATAKA', 'Dispute between federations', 'Karnataka Kalaripayattu Association', 'Same soceity registration', 'NA', '2022-02-02', 'NA', 'NA', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, NULL, 2514, 1, '2022-11-30 02:03:49', '2022-11-30 02:04:41', '2022-11-30 02:04:41'),
(51, 2514, NULL, 52, 1, 'HIGH COURT, KARNATAKA', 'Dispute between federations', 'Karnataka Kalaripayattu Association', 'Same soceity registration', 'NA', '2022-02-02', 'NA', 'NA', NULL, NULL, NULL, 'NA', 2514, NULL, 2514, NULL, 2514, 1, '2022-11-30 02:03:49', '2022-11-30 02:04:53', '2022-11-30 02:04:53'),
(52, 3017, NULL, 60, 1, 'BEFORE THE COURT OF CENTRAL GOVERNMENT   INDUSTRIAL TRIBUNAL CUM LABOUR COURT-II,   ROOM NO. 208, 2ND FLOOR, ROUSE AVENEUE DISTRICTS   COURTS COMPLEX, I.T.O', 'SARVESH SECURITY SERVICES (P) LTD  CLAIMANT VS SPORTS  AUTHORITY OF INDIA RESPONDENT', 'M/s Sarvesh Security Pvt. Ltd vs SAI', 'PENDING', 'SH. O.P. GUPTA, DISTT & SESSION JUDGE (RETD). SOLE ARBITRATOR', '2022-11-18', '20.12.2022', 'PENDING', 'date', '2022-12-20', NULL, 'Cross examination RW 1 Completed', 5924, NULL, 5924, 5924, NULL, 1, '2022-11-30 03:04:30', '2022-11-30 06:42:24', NULL),
(53, 3012, NULL, 1, 1, 'Manipur High court', 'Petitioner asking for regular appointment in SAI', 'Elangbam Ranitombi Devi vs Union of India and 5 others', 'adjourned till next hearing', 'Boboy Potsangbam', '2022-10-18', 'adjourned', 'adjourned till next hearing', 'text', NULL, 'not notified by the counsel', 'adjourned', 2523, NULL, 2523, NULL, NULL, 1, '2022-12-01 03:01:10', '2022-12-01 03:01:10', NULL),
(54, 3019, NULL, 31, 1, 'CATE BEMCH JBP', 'SEXUAL HARASSMENT', 'NEMAI BOSE VS UNION OF INDIA', 'HEARING', 'ADVOCATE JAMES ANTHONY', '2022-11-09', 'ADJOURNED WITH DIRECTION', 'HEARING', 'date', '2023-03-22', NULL, 'HEARING', 2515, NULL, 2515, 2515, NULL, 1, '2022-12-01 05:59:50', '2022-12-01 06:09:06', NULL),
(55, 3019, NULL, 53, 1, 'CAT BENCH JBP', 'POST OF EXECUTIVE DIRECTOR /TRANSFER', 'Roque Dias VS UNION OF INDIA', 'HEARING', 'ADVOCATE S.P SINGH', '2022-09-09', 'ADJOURNED WITH DIRECTION', 'HEARING', 'date', NULL, NULL, 'HEARING', 2515, NULL, 2515, 2515, NULL, 1, '2022-12-01 05:59:50', '2022-12-01 06:09:06', NULL),
(56, 3019, NULL, 54, 1, 'M.P HIGH COURT', 'WITHOUT ISSUING NIT INSTALLATION HOCKY TURF GROUND NO-01, SAI BHOPAL', 'M/S PURPLE SEAS SORTS & TECHNOLOGY VS SAI & OTHERS', 'PENDING- NOT REACHED', 'ADVOCATE S.K KASHYAP', '2020-04-15', 'MOTION HEARING', 'PENDING- NOT REACHED', 'text', NULL, 'PENDING', 'PENDING- NOT REACHED', 2515, NULL, 2515, 2515, NULL, 1, '2022-12-01 05:59:50', '2022-12-01 06:09:06', NULL),
(57, 3019, NULL, 55, 1, 'M.P HIGH COURT', 'SELECTED ETAM FO M.P FENCING FOR 17TH SUB JR. NATIONAL CHAMPIONSHIP', 'M/S MP AMATEUR FENCING ASSOCIATION VS STATE OF M.P', 'PENDING-IA WITHDRWAN (8776/2019)', 'ADVOCATE S.K KASHYAP', '2020-06-26', 'MOTION HEARING', 'PENDING', 'text', NULL, 'PENDING', 'PENDING', 2515, NULL, 2515, 2515, NULL, 1, '2022-12-01 05:59:50', '2022-12-01 06:09:06', NULL),
(58, 3019, NULL, 56, 1, 'M.P HIGH COURT', 'TERMINATION OF MESS TENDER OF STC JABALPUR', 'KUDESHWAR CATERS VS SH K.C TRIPATHI', 'PENDING', 'ADVOCATE GOPI CHOURASIA', '2020-04-03', 'ADJOURNED DUE TO ABSENCE OF THE COUNCIL FOR PETITIONER', 'PENDING', 'text', NULL, 'NOT LISTED', 'PENDING', 2515, NULL, 2515, 2515, NULL, 1, '2022-12-01 05:59:50', '2022-12-01 06:09:06', NULL),
(59, 3019, NULL, 57, 1, 'COURT OF CIVIL JUDGE (S.D) BHIVANI', 'APPLIED FOR THE SUCCESSION CERTIFICATE IN THE COURT', 'DINESH SINGH & OTHERS VS CRC, BHOPAL', 'PENDING', 'ADVOCATE RAJESH ARYA', '2022-10-17', '(PWF) PLAINTIFF WRITTEN STATEMENT', '(RWS) RESPONDANT WRITTEN STATEMENT', 'date', NULL, NULL, '(RWS) RESPONDANT WRITTEN STATEMEN', 2515, NULL, 2515, 2515, NULL, 1, '2022-12-01 05:59:50', '2022-12-01 06:09:06', NULL),
(60, 3019, NULL, 58, 1, 'SESSION COURT', 'APPLIED FOR THE DECLARATION CERTIFICATE FOR HIS DATE OF BIRTH', 'RAHUL YADAV VS IN CHARGE REGIONAL DIRECTOR SAI CRC BHOPAL AND GENERAL PUBLIC', 'PENDING', 'ADVOCATE DEVENDRA  SINGH BHAGEL', '2022-11-21', 'MOTION HEARING', 'MOTION HEARING', 'text', NULL, '05-12-2022', 'MOTION HEARING', 2515, NULL, 2515, 2515, NULL, 1, '2022-12-01 05:59:50', '2022-12-01 06:09:07', NULL),
(61, 2520, NULL, 61, 1, 'CIVIL COURT (MUMBAI)', '\"LAND MATTERS   DEFENCE PURPOSE\"', '\"Mr. Hussain Mehbood Sayed Vs Sports Authority of India   and others\"', '\"Notice of Motion    is Disposed off on 11/03/2021 now proceeding of case will be carried on\"', 'Hon\'ble Judge Sh. Mane', '2022-09-07', '\"Notice of Motion    is Disposed off on 11/03/2021 now proceeding of case will be carried on\"', 'On Going', 'date', '2023-02-13', NULL, 'ON GOING', 2520, NULL, 2520, 2520, NULL, 1, '2022-12-01 06:03:48', '2022-12-01 06:04:51', NULL),
(62, 2520, NULL, 62, 1, 'CIVIL COURT (NAGPUR)', '\"LAND MATTERS   DEFENCE PURPOSE\"', 'Sh. Chandrakant Nilkhanthrao Nakhale Vs State Maharashtra through collector', 'NA', 'Hon\'ble Judge Sh. P.P. Naigaonkar', '2022-08-12', 'NA', 'ON GOING', 'date', '2022-12-12', NULL, 'ON GOING', 2520, NULL, 2520, NULL, NULL, 1, '2022-12-01 06:04:51', '2022-12-01 06:04:51', NULL),
(63, 2999, NULL, 63, 1, 'Civil Judge, Sr.Division,Patiala', 'Land Case', 'UOI V/S Ahleya Khalsa', 'Transfered to High Court', 'SK Kaushal', '2020-09-02', 'Sine die', 'High Court', 'text', NULL, 'As per turn', 'Case will be decided after decision from H.C. Chandigarh', 2524, NULL, 2524, 2524, NULL, 1, '2022-12-01 08:47:18', '2022-12-01 08:49:02', NULL),
(64, 2999, NULL, 65, 1, 'High Court, Chandigarh RSA No.1770 of 1987', 'Land case RSA No.1770 of 1987', 'SAI v/s Niranjan Das', 'High Court', 'Vishal Aggarwal', '2021-09-24', 'Argument', 'Argument', 'date', '2022-12-07', NULL, 'Case fixed for final arguments', 2524, NULL, 2524, 2524, NULL, 1, '2022-12-01 08:49:02', '2022-12-01 08:54:36', NULL),
(65, 2999, NULL, 67, 1, 'High Court, Chandigarh', 'Service Matter of 2013', 'Varinder Prasad v/s SAI', 'High Court', 'Vishal Aggarwal', '2021-04-02', 'Argument', 'Argument', 'date', '2022-07-21', NULL, 'Case fixed for final arguments', 2524, NULL, 2524, 2524, NULL, 1, '2022-12-01 08:54:36', '2022-12-01 08:56:10', NULL),
(66, 2999, NULL, 69, 1, 'High Court, Chandigarh', 'Land Case', 'Banarasi Dass v/s UOI', 'High Court', 'Vishal Aggarwal', '2020-12-08', 'Argument', 'Argument', 'text', NULL, 'As per turn', 'Case Admitted and will be taken as per turn', 2524, NULL, 2524, 2524, NULL, 1, '2022-12-01 08:54:36', '2022-12-01 08:56:10', NULL),
(67, 2999, NULL, 70, 1, 'High Court Chandigarh', 'Service matter CWP No. 20575 of 2008', 'Jagjt Singh v/s SAI', 'High Court', 'Vishal aggrawal', '2021-10-04', 'Argument', 'Argument', 'text', NULL, '08.02.2023', 'Case fixed for final arguments', 2524, NULL, 2524, 2524, NULL, 1, '2022-12-01 08:56:10', '2022-12-01 08:57:23', NULL),
(68, 2999, NULL, 72, 1, 'High Court Chandigarh', 'Service Matter OA No. 445', 'SAI v/s Baljinder Singh', 'High Court', 'Vishal Aggarwal', '2020-12-21', 'Argument', 'Argument', 'text', NULL, '14.10.2022', 'Case fixed for final arguments', 2524, NULL, 2524, 2524, NULL, 1, '2022-12-01 08:57:23', '2022-12-01 08:58:56', NULL),
(69, 2999, NULL, 73, 1, 'Asstt.Labour Commissioner, Patiala', 'Claim case service matter', 'Balwinder Kumar v/s SAI', 'High Court', 'Vishal Aggarwal', '2019-10-08', 'Sine Die', 'Sine Die', 'text', NULL, 'Sine Die', 'Sine Die', 2524, NULL, 2524, 2524, NULL, 1, '2022-12-01 08:58:56', '2022-12-01 09:00:17', NULL),
(70, 2999, NULL, 74, 1, 'High Court Chandigarh No.1399/2017', 'L.P.A Service Matter', 'SAI v/s Balwinder Kumar', 'High Court', 'Vishal Aggarwal', '2018-08-11', 'Arguments', 'Arguments', 'text', NULL, 'As per turn', 'Case will be decided after decision from H.C.Chandigarh', 2524, NULL, 2524, 2524, NULL, 1, '2022-12-01 09:00:17', '2022-12-01 09:02:19', NULL),
(71, 2999, NULL, 78, 1, 'CAT,Chandigarh', 'Service Matter', 'Maninder Kaur v/s SAI', 'CAT', 'Vishal Agarwal', '2021-09-24', 'Arguments', 'Arguments', 'text', NULL, '07.12.2022', 'Case fixed for final arguments', 2524, NULL, 2524, 2524, NULL, 1, '2022-12-01 09:02:19', '2022-12-01 09:04:23', NULL),
(72, 2999, NULL, 79, 1, 'High Court, Chandigarh', 'High Court, Chandigarh', 'Kanwar  Devinder Singh v/s SAI', 'High COurt', 'VIshal Aggarwal', '2022-05-27', 'Arguments', 'Arguments', 'text', NULL, '18.07.2022', 'ase fixed for final arguments', 2524, NULL, 2524, 2524, NULL, 1, '2022-12-01 09:04:24', '2022-12-01 09:05:36', NULL),
(73, 2999, NULL, 83, 1, 'High Court, Chandigarh', 'Service Matter', 'Rajbir Singh  v/ s SAI', 'High COurt', 'Vishal aggarwal', '2021-10-11', 'Reply', 'Reply', 'text', NULL, '20.09.2022', 'Reply', 2524, NULL, 2524, 2524, NULL, 1, '2022-12-01 09:05:36', '2022-12-01 09:06:57', NULL),
(74, 2999, NULL, 85, 1, 'CAT Chandigarh', 'Service Matter', 'Ms. Babita V/s NS NIS Patiala', 'CAT', 'Vishal aggarwal', '2022-05-02', 'Reply', 'Reply', 'text', NULL, '10.01.2022', 'Reply', 2524, NULL, 2524, NULL, NULL, 1, '2022-12-01 09:06:58', '2022-12-01 09:06:58', NULL),
(75, 3003, NULL, 87, 1, 'CAT, Chandigarh', 'Challenge the process of outsourcing', 'Krishan Chander and others Vs Sports Authority of India', 'Hearing', 'P.C. Goyal', '2022-10-31', 'For Argument', 'Hearing', 'date', '2022-12-07', NULL, 'NA', 2521, NULL, 2521, 2521, NULL, 1, '2022-12-02 02:19:51', '2022-12-02 02:20:09', NULL),
(76, 3003, NULL, 88, 1, 'CAT, Chandigarh', 'Regularization of service', 'Rajinder Kumar Vs Sports Authority of India', 'Hearing', 'P.C. Goyal', '2022-10-28', 'Argument', 'Hearing', 'date', NULL, NULL, 'NA', 2521, NULL, 2521, 2521, NULL, 1, '2022-12-02 02:19:51', '2022-12-02 02:20:09', NULL),
(77, 3003, NULL, 89, 1, 'CAT, Chandigarh', 'Regularization of service  and equal pay for equal work in terms of judgement of Honourable Supreme Court Of India', 'Sunil Kumar Vs UOI and others', 'Hearing', 'P.C. Goyal', '2022-10-28', 'Argument', 'Hearing', 'date', NULL, NULL, 'NA', 2521, NULL, 2521, 2521, NULL, 1, '2022-12-02 02:19:51', '2022-12-02 02:20:09', NULL),
(78, 3003, NULL, 90, 1, 'CGIT Chandigarh', 'Allegation of termination', 'Rakesh Yadav VS Gov. of India and Sports Authority of India', 'Hearing', 'P.C. Goyal', '2022-08-29', 'Affidavit filed in court and adjourned for cross examination', 'Hearing', 'text', NULL, 'Reply Still Awaited', 'NA', 2521, NULL, 2521, 2521, NULL, 1, '2022-12-02 02:19:52', '2022-12-02 02:20:09', NULL),
(79, 3003, NULL, 91, 1, 'CAT, Chandigarh', 'Regularization of service', 'Rakesh kumar vs Sports authority of India and others', 'Hearing', 'P.C. Goyal', '2022-11-01', 'Argument', 'Hearing', 'date', NULL, NULL, 'NA', 2521, NULL, 2521, 2521, NULL, 1, '2022-12-02 02:19:52', '2022-12-02 02:20:09', NULL),
(80, 3003, NULL, 92, 1, 'CAT, Chandigarh', 'Promotion from the date his junior promoted', 'Shamsher singh vs SAI UOI and others', 'Hearing', 'P.C. Goyal', '2022-09-23', 'Argument', 'Hearing', 'date', NULL, NULL, 'NA', 2521, NULL, 2521, 2521, NULL, 1, '2022-12-02 02:19:52', '2022-12-02 02:20:09', NULL),
(81, 3003, NULL, 93, 1, 'High Court Chandigarh', 'Appeal against order of CAT', 'Govt. of India and Sports authority of India Vs Devender Kumar Sharma, Workman, Daily wages', 'Hearing', 'P.C. Goyal', '2022-03-28', 'Notice to respondents and reply', 'Hearing', 'date', NULL, NULL, 'NA', 2521, NULL, 2521, 2521, NULL, 1, '2022-12-02 02:19:52', '2022-12-02 02:20:09', NULL),
(82, 3003, NULL, 94, 1, 'CAT, Chandigarh', 'Grant of MACP', 'Anita Sharma vs SAI', 'Hearing', 'P.C. Goyal', '2022-10-21', 'Argument', 'Hearing', 'date', NULL, NULL, 'NA', 2521, NULL, 2521, 2521, NULL, 1, '2022-12-02 02:19:52', '2022-12-02 02:20:09', NULL),
(83, 3003, NULL, 95, 1, 'CAT, Chandigarh', 'For MACP benefits', 'Krishan Chander and others Vs Sports Authority of India', 'Hearing', 'P.C. Goyal', '2022-10-10', 'To file rejoinder to written statement', 'Hearing', 'date', NULL, NULL, 'NA', 2521, NULL, 2521, 2521, NULL, 1, '2022-12-02 02:19:52', '2022-12-02 02:20:09', NULL),
(84, 3003, NULL, 96, 1, 'CAT, Chandigarh', 'Regularisation of Service', 'Krishna Devi Vs UOI and SAI', 'Hearing', 'P.C. Goyal', '2022-10-18', 'For filling Written statement', 'Hearing', 'date', NULL, NULL, 'NA', 2521, NULL, 2521, 2521, NULL, 1, '2022-12-02 02:19:52', '2022-12-02 02:20:09', NULL),
(85, 3003, NULL, 97, 1, 'CAT, Chandigarh', 'Challenge the process of outsourcing', 'Rajesh Kumar vs SAI', 'Hearing', 'P.C. Goyal', '2022-10-17', 'Argument', 'Hearing', 'date', '2022-12-05', NULL, 'NA', 2521, NULL, 2521, 2521, NULL, 1, '2022-12-02 02:19:52', '2022-12-02 02:20:09', NULL),
(86, 3009, 2519, 20, 8, 'CAT Allahabad', 'Restoration of Service', 'Ajit Singh v/s UOI & Others', 'testing', 'Rajeshwar Rao', '2022-12-01', 'testing', 'tesing', NULL, NULL, NULL, 'asfasdf', 2519, 3009, 2519, NULL, NULL, 1, '2022-12-28 08:23:12', '2022-12-28 08:23:12', NULL),
(87, 3009, 2519, 20, 9, 'CAT Allahabad', 'Restoration of Service', 'Ajit Singh v/s UOI & Others', 'testing', 'Rajeshwar Rao', '2022-12-01', 'testing', 'tesing', NULL, NULL, NULL, 'asfasdf', 2519, 3009, 2519, NULL, NULL, 1, '2022-12-28 08:24:19', '2022-12-28 08:24:19', NULL),
(88, 3000, 2518, 10, 12, 'CAT Cuttack Bench', 'Regularization', 'Sri Prasanta Kr. Das, S/o Ananda Ch. Das. & others Vs  UOI & SAI', 'Open', 'Lalitendu Mishra, Advocate', '2023-01-01', 'Done', 'Yes', 'date', '2023-01-02', NULL, 'done', 2518, 3000, 2518, NULL, NULL, 1, '2023-01-02 03:08:53', '2023-01-02 03:08:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `miscinfraawardtenders`
--

CREATE TABLE `miscinfraawardtenders` (
  `id` bigint(20) NOT NULL,
  `project_center_id` int(11) DEFAULT NULL,
  `rc_id` bigint(20) DEFAULT NULL,
  `infraemployee` varchar(255) NOT NULL,
  `template_id` bigint(20) NOT NULL,
  `infradesignation` varchar(255) DEFAULT NULL,
  `encashment` date DEFAULT NULL,
  `pension` date DEFAULT NULL,
  `gratuity` date DEFAULT NULL,
  `commutation` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_for` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `miscinfraawardtenders`
--

INSERT INTO `miscinfraawardtenders` (`id`, `project_center_id`, `rc_id`, `infraemployee`, `template_id`, `infradesignation`, `encashment`, `pension`, `gratuity`, `commutation`, `remarks`, `user_id`, `created_for`, `created_by`, `updated_by`, `deleted_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3009, NULL, 'Sh. Matwar Singh Negi', 1, 'Sr. Badminton Coach', '2022-11-01', '2022-11-01', '2022-11-01', '2022-11-01', 'IN PROCESS', 2519, NULL, 2519, NULL, NULL, 1, '2022-11-29 01:52:16', '2022-11-29 01:52:16', NULL),
(2, 3012, NULL, 'NIL', 1, 'NIl', '2022-10-31', '2022-10-31', '2022-10-31', '2022-10-31', 'NIl', 2523, NULL, 2523, NULL, NULL, 1, '2022-12-01 03:02:04', '2022-12-01 03:02:04', NULL),
(3, 3019, NULL, 'Sh. L.L Mishra', 1, 'Coach Cricket', '2022-10-31', '2022-10-31', '2022-10-31', '2022-10-31', 'V.R.S', 2515, NULL, 2515, 2515, 2515, 1, '2022-12-01 05:31:21', '2022-12-01 06:19:44', '2022-12-01 06:19:44'),
(4, 3019, NULL, 'Sh. LL Mishra', 1, 'Coach Cricket', '2022-10-31', '2022-11-30', '2022-10-31', '2022-10-31', 'V.R.S', 2515, NULL, 2515, NULL, NULL, 1, '2022-12-01 06:25:13', '2022-12-01 06:25:13', NULL),
(5, 2999, NULL, 'Vijay Bhatia', 1, 'Section Officer', '2022-08-31', '2022-09-01', '2022-08-31', '2022-08-31', 'Retired', 2524, NULL, 2524, 2524, NULL, 1, '2022-12-01 06:53:50', '2022-12-01 06:54:04', NULL),
(6, 3009, 2519, 'sadf', 8, 'fasdfasdf', '2022-12-01', '2022-12-01', '2022-12-01', '2022-12-01', 'asdfasdf', 2519, 3009, 2519, NULL, NULL, 1, '2022-12-28 08:23:31', '2022-12-28 08:23:31', NULL),
(7, 3009, 2519, 'sadf', 9, 'fasdfasdf', '2022-12-01', '2022-12-01', '2022-12-01', '2022-12-01', 'asdfasdf', 2519, 3009, 2519, NULL, NULL, 1, '2022-12-28 08:24:19', '2022-12-28 08:24:19', NULL),
(8, 3015, 2522, 'BBBB', 8, 'BBBB', '2022-12-01', '2022-12-01', '2022-12-01', '2022-12-02', 'BBBBB', 2522, 3015, 2522, NULL, NULL, 1, '2022-12-29 04:02:18', '2022-12-29 04:02:18', NULL),
(9, 3015, 2522, 'BBBB', 9, 'BBBB', '2022-12-01', '2022-12-01', '2022-12-01', '2022-12-02', 'BBBBB', 2522, 3015, 2522, NULL, NULL, 1, '2022-12-29 04:02:36', '2022-12-29 04:02:36', NULL),
(10, 3000, 2518, 'Testign', 12, 'test', '2023-01-02', '2023-01-02', '2023-01-02', '2023-01-02', 'Test', 2518, 3000, 2518, NULL, NULL, 1, '2023-01-02 03:09:33', '2023-01-02 03:09:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `miscretirements`
--

CREATE TABLE `miscretirements` (
  `id` bigint(20) NOT NULL,
  `project_center_id` bigint(20) DEFAULT NULL,
  `rc_id` bigint(20) DEFAULT NULL,
  `retir_name_employee` varchar(255) DEFAULT NULL,
  `template_id` bigint(20) NOT NULL,
  `retir_name_designation` varchar(255) DEFAULT NULL,
  `name_place_posting` varchar(255) DEFAULT NULL,
  `details_date_retirement` date NOT NULL,
  `details_name_group` varchar(255) DEFAULT NULL,
  `leave_encashment` varchar(255) DEFAULT NULL,
  `details_pension` varchar(255) DEFAULT NULL,
  `gratuity` varchar(255) DEFAULT NULL,
  `commutation` varchar(255) DEFAULT NULL,
  `starting_date_pension` date NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_for` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `miscretirements`
--

INSERT INTO `miscretirements` (`id`, `project_center_id`, `rc_id`, `retir_name_employee`, `template_id`, `retir_name_designation`, `name_place_posting`, `details_date_retirement`, `details_name_group`, `leave_encashment`, `details_pension`, `gratuity`, `commutation`, `starting_date_pension`, `remarks`, `user_id`, `created_for`, `created_by`, `updated_by`, `deleted_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3009, NULL, 'Sh. Matwar Singh Negi', 1, 'Sr. Badminton Coach', 'SAI, STC, LBSNAA, Mussoorie', '2022-10-31', '2127573', '1461420', '52950', '2000000', '2127573', '2022-11-01', 'in process', 2519, NULL, 2519, NULL, NULL, 1, '2022-11-29 01:53:44', '2022-11-29 01:53:44', NULL),
(2, 2514, NULL, 'Shri. Sathish. K.A', 1, 'Despatch Rider', 'NSSC Bengaluru', '2022-11-30', '1085541', '739680', '27600', '1220472', '1085541', '2022-12-01', 'Nil', 2514, NULL, 2514, NULL, NULL, 1, '2022-11-29 04:39:13', '2022-11-29 04:39:13', NULL),
(3, 3012, NULL, 'NIL', 1, 'NIL', 'Nil', '2022-10-31', '0', '0', '0', '0', '0', '2022-10-31', 'nil', 2523, NULL, 2523, NULL, NULL, 1, '2022-12-01 03:03:18', '2022-12-01 03:03:18', NULL),
(4, 3019, NULL, 'Sh. L.L Mishra', 1, 'Coach Cricket', 'S.T.C Tikamgarh', '2022-10-31', 'Rs. 19,58,121/-', 'RS. 13,24,193/-', 'Rs.19,320/-', 'Rs. 19,99,620/-', 'Rs. 19,58,121/-', '2022-11-01', 'V.R.S', 2515, NULL, 2515, NULL, NULL, 1, '2022-12-01 06:28:06', '2022-12-01 06:28:06', NULL),
(5, 2999, NULL, 'Vijay Bhatia', 1, 'Section Officer', 'Patiala', '2022-08-31', '12,60,565', '858940', '32050', '1417251', '12,60,565', '2022-09-01', 'Retired', 2524, NULL, 2524, NULL, NULL, 1, '2022-12-01 06:56:05', '2022-12-01 06:56:05', NULL),
(6, 3000, NULL, 'Sh. Ashok Kumar Mishra', 1, 'Chief Gymnastics Coach', 'SAI NSEC Kolkata', '2022-11-30', 'Rs.  24,16,902/-', 'Rs. 16,84,713/-', 'Rs. 61,450/-', 'Rs. 20,00,000/-', 'Rs.  24,16,902/-', '2022-12-01', 'Nil', 2518, NULL, 2518, NULL, 2518, 1, '2022-12-01 23:37:11', '2022-12-01 23:42:20', '2022-12-01 23:42:20'),
(7, 3000, NULL, 'Sh. Tarun Kumar Saha', 1, 'Chief Athletics Coach', 'SAI NSEC Kolkata', '2022-11-30', 'Rs. 19,62,627/-', 'Rs. 13,77,240/-', 'Rs. 49,900/-', 'Rs. 20,00,000/-', 'Rs. 19,62,627/-', '2022-12-01', 'Nil', 2518, NULL, 2518, NULL, 2518, 1, '2022-12-01 23:37:11', '2022-12-01 23:42:31', '2022-12-01 23:42:31'),
(8, 3000, NULL, 'Smt. Ruma Roy', 1, 'Chief Archery Coach', 'STC Bolpur', '2022-11-30', 'Rs. 20,82,587/-', 'Rs. 14,61,420/-', 'Rs. 52,950/-', 'Rs. 20,00,000/-', 'Rs. 20,82,587/-', '2022-12-01', 'Nil', 2518, NULL, 2518, NULL, 2518, 1, '2022-12-01 23:37:11', '2022-12-01 23:42:37', '2022-12-01 23:42:37'),
(9, 3000, NULL, 'Sh. F. E.  Andrew', 1, 'Chief Football Coach', 'STC Car Nicobar', '2022-11-30', 'Rs, 22,10,413/-', 'Rs. 10,26,324/-', 'Rs. 56,200/-', 'Rs. 20,00,000/-', 'Rs, 22,10,413/-', '2022-12-01', 'Nil', 2518, NULL, 2518, NULL, 2518, 1, '2022-12-01 23:37:11', '2022-12-01 23:42:43', '2022-12-01 23:42:43'),
(10, 3000, NULL, 'Dr. Pallab Dasgupta', 1, 'Senior Cricket Coach', 'SAI NSEC Kolkata', '2022-11-30', 'Rs. 18,99,697/-', 'Rs. 13,33,080/-', 'Rs. 48,300/-', 'Rs. 20,00,000/-', 'Rs. 18,99,697/-', '2022-12-01', 'Nil', 2518, NULL, 2518, NULL, 2518, 1, '2022-12-01 23:37:11', '2022-12-01 23:42:49', '2022-12-01 23:42:49'),
(11, 2518, NULL, 'Sh. Ashok Kumar Mishra', 1, 'Chief Gymnastics Coach', 'SAI NSEC Kolkata', '2022-11-30', 'Rs. 24,16,902/-', 'Rs. 16,84,713/-', 'Rs. 61,450/-', 'Rs. 20,00,000/-', 'Rs. 24,16,902/-', '2022-12-01', 'Nil', 2518, NULL, 2518, 2518, NULL, 1, '2022-12-01 23:51:20', '2022-12-01 23:51:28', NULL),
(12, 2518, NULL, 'Sh. Tarun Kumar Saha', 1, 'Chief Athletics Coach', 'SAI NSEC Kolkata', '2022-11-30', 'Rs. 19,62,627/-', 'Rs. 13,77,240/-', 'Rs. 49,900/-', 'Rs. 20,00,000/-', 'Rs. 19,62,627/-', '2022-12-01', 'Nil', 2518, NULL, 2518, 2518, NULL, 1, '2022-12-01 23:51:21', '2022-12-01 23:51:28', NULL),
(13, 2518, NULL, 'Smt. Ruma Roy', 1, 'Chief Archery Coach', 'STC Bolpur', '2022-11-30', 'Rs. 20,82,587/-', 'Rs. 14,61,420/-', 'Rs. 52,950/-', 'Rs. 20,00,000/-', 'Rs. 20,82,587/-', '2022-12-01', 'Nil', 2518, NULL, 2518, 2518, NULL, 1, '2022-12-01 23:51:21', '2022-12-01 23:51:29', NULL),
(14, 2518, NULL, 'Sh. F. E. Andrew', 1, 'Chief Football Coach', 'STC Car Nicobar', '2022-11-30', 'Rs. 22,10,413/-', 'Rs. 10,26,324/-', 'Rs. 56,200/-', 'Rs. 20,00,000/-', 'Rs. 22,10,413/-', '2022-12-01', 'Nil', 2518, NULL, 2518, 2518, NULL, 1, '2022-12-01 23:51:21', '2022-12-01 23:51:29', NULL),
(15, 2518, NULL, 'Dr. Pallab Dasgupta', 1, 'Senior Cricket Coach', 'SAI NSEC Kolkata', '2022-11-30', 'Rs. 18,99,697/-', 'Rs. 13,33,080/-', 'Rs. 48,300/-', 'Rs. 20,00,000/-', 'Rs. 18,99,697/-', '2022-12-01', 'Nil', 2518, NULL, 2518, 2518, NULL, 1, '2022-12-01 23:51:21', '2022-12-01 23:51:29', NULL),
(16, 3009, 2519, 'asdfa', 8, 'sdfasdf', 'asdfasdf', '2022-12-14', '23452345', '34252345', '32452345', '452345', '23452345', '2022-12-06', '23452345', 2519, 3009, 2519, NULL, NULL, 1, '2022-12-28 08:24:02', '2022-12-28 08:24:02', NULL),
(17, 3009, 2519, 'asdfa', 9, 'sdfasdf', 'asdfasdf', '2022-12-14', '23452345', '34252345', '32452345', '452345', '23452345', '2022-12-06', '23452345', 2519, 3009, 2519, NULL, NULL, 1, '2022-12-28 08:24:19', '2022-12-28 08:24:19', NULL),
(18, 3015, 2522, 'AAAAAA', 8, 'AAAAA', 'AAAAAA', '2022-12-01', 'AAAAA', 'AAAAA', 'AAAA', 'AAAAA', 'AAAAA', '2022-12-01', 'testing', 2522, 3015, 2522, NULL, NULL, 1, '2022-12-29 03:44:18', '2022-12-29 03:44:18', NULL),
(19, 3015, 2522, 'AAAAAA', 9, 'AAAAA', 'AAAAAA', '2022-12-01', 'AAAAA', 'AAAAA', 'AAAA', 'AAAAA', 'AAAAA', '2022-12-01', 'testing', 2522, 3015, 2522, NULL, NULL, 1, '2022-12-29 03:44:44', '2022-12-29 04:01:14', '2022-12-29 04:01:14'),
(20, 3015, 2522, 'AAAAAA', 9, 'AAAAA', 'AAAAAA', '2022-12-01', 'AAAAA', 'AAAAA', 'AAAA', 'AAAAA', 'AAAAA', '2022-12-01', 'testing', 2522, 3015, 2522, NULL, NULL, 1, '2022-12-29 04:01:14', '2022-12-29 04:02:36', '2022-12-29 04:02:36'),
(21, 3015, 2522, 'AAAAAA', 9, 'AAAAA', 'AAAAAA', '2022-12-01', 'AAAAA', 'AAAAA', 'AAAA', 'AAAAA', 'AAAAA', '2022-12-01', 'testing', 2522, 3015, 2522, NULL, NULL, 1, '2022-12-29 04:02:36', '2022-12-29 04:02:36', NULL),
(22, 3000, 2518, 'Testing', 12, 'Designation', 'Lucknow', '2023-01-02', '000', '22', '22', '44', '2525', '2023-01-02', 'none', 2518, 3000, 2518, NULL, 2518, 1, '2023-01-02 03:10:14', '2023-01-02 03:15:31', '2023-01-02 03:15:31'),
(23, 3000, 2518, 'ashdah', 12, 'asdas', 'asdasd', '2023-01-02', 'A', '334', '23', '23', '234', '2023-01-02', 'dfsd', 2518, 3000, 2518, NULL, NULL, 1, '2023-01-02 03:18:21', '2023-01-02 03:18:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `misc_master`
--

CREATE TABLE `misc_master` (
  `id` bigint(20) NOT NULL,
  `project_center_id` bigint(20) DEFAULT NULL,
  `detail_cwp_slp` varchar(255) NOT NULL,
  `court_name` varchar(255) DEFAULT NULL,
  `court_case` varchar(255) DEFAULT NULL,
  `parties_name` varchar(255) DEFAULT NULL,
  `counsel_name` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_for` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `misc_master`
--

INSERT INTO `misc_master` (`id`, `project_center_id`, `detail_cwp_slp`, `court_name`, `court_case`, `parties_name`, `counsel_name`, `user_id`, `created_by`, `updated_by`, `created_for`, `deleted_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3012, 'WP - 638', 'Manipur High court', 'Petitioner asking for regular appointment in SAI', 'Elangbam Ranitombi Devi vs Union of India and 5 others', 'Boboy Potsangbam', 2523, 2523, NULL, NULL, NULL, 1, '2022-11-24 00:40:22', '2022-11-24 00:40:22', NULL),
(2, 2517, 'O.A./41/2021', 'CAT, Guwahati Bench', 'Reinstatement', 'Anjan Borthakur –vs-M/O YOUTH AFFAIRS &AMP; SPORTS & OTHERS', 'Ranjit Kumar Dev Choudhury', 2517, 2517, NULL, NULL, NULL, 1, '2022-11-25 06:19:58', '2022-11-25 06:19:58', NULL),
(3, 2517, 'WP (C ) 4999/2020', 'Hon’ble Gauhati High Court', 'Other service matters with respect to State Govt Employees', 'Pradip Das –vs- The UOI & 5 Ors.', 'Ranjit Kumar Dev Choudhury', 2517, 2517, NULL, NULL, NULL, 1, '2022-11-25 06:29:02', '2022-11-25 06:29:02', NULL),
(4, 2517, 'Money Suit No. 08/2016', 'Civil Court (Civil Judge No.1 Kamrup (M) at Guwahati, Assam.', '7 Rule2    Service', 'Sports Authority of India, Regional Centre Guwahati –vs-Anjan Borthakur', 'Ranjit Kumar Dev Choudhury', 2517, 2517, NULL, NULL, NULL, 1, '2022-11-25 06:29:43', '2022-11-25 06:29:43', NULL),
(5, 2517, 'WP(C)5039/2016 &I.A.(C)No.1569 /2016', 'Hon’ble    Gauhati High Court', 'Non-Service    Writ Petition', 'Arman Ali –vs- The State of Assam, Department of Sports and Youth Welfare & Ors. R 3 - SAI', 'Ranjit Kumar Dev Choudhury', 2517, 2517, NULL, NULL, NULL, 1, '2022-11-25 06:30:23', '2022-11-25 06:30:23', NULL),
(6, 2517, 'WP (C ) 5335/2016', 'Hon’ble Gauhati High Court', 'Non-Service    Writ Petition', 'Ms.Akanshya P. Gogoi D/o. Shi Indranil Gogoi (being minor) duly represented by her mother – Mrs. Babita P. Gogoi & Ors. –vs- All Assam Taekwondo Association (AATA) (One Body) represented by Shri Dilip Dauka, General Secretary & Ors.)', 'Ranjit Kumar Dev Choudhury', 2517, 2517, NULL, NULL, NULL, 1, '2022-11-25 06:31:33', '2022-11-25 06:31:33', NULL),
(7, 2517, 'WP( C) no 5625/2021', 'Hon’ble Gauhati High Court', 'Non Payment of Contractual Bill by Sports Authority of Assam during 12th South Asian Games,2016', 'Md. Mokshed Ali Vs Union of India and 7Others', 'Ms. Aruradha Gayan', 2517, 2517, NULL, NULL, NULL, 1, '2022-11-25 06:32:33', '2022-11-25 06:32:33', NULL),
(8, 2517, 'WP ( C) 5624/2021', 'Hon’ble Gauhati High Court', 'Non Payment of Contractual Bill by Sports Authority of Assam during 12th South Asian Games,2016', 'Mr .Bhupen Daimary Vs Union of India and 7Others', 'Ms. Aruradha Gayan', 2517, 2517, NULL, NULL, NULL, 1, '2022-11-25 06:33:07', '2022-11-25 06:33:07', NULL),
(9, 2518, 'OA 1405 of 2018', 'CAT Calcutta', 'DACP Scheme', 'Dr. Laila Das & ors VS UOI & SAI', 'D. N. Roy, Advocate', 2518, 2518, 2518, NULL, NULL, 1, '2022-11-26 03:55:32', '2022-11-27 22:55:25', NULL),
(10, 3000, 'RA/260/90/2019', 'CAT Cuttack Bench', 'Regularization', 'Sri Prasanta Kr. Das, S/o Ananda Ch. Das. & others Vs  UOI & SAI', 'Lalitendu Mishra, Advocate', 2518, 2518, 2518, NULL, NULL, 1, '2022-11-27 22:52:48', '2022-11-27 22:56:31', NULL),
(11, 2518, 'CWJC No.17182 of 2019', 'High Court, Patna', 'Regularization', 'UOI & Ors. –v/s- Manish Ch. Roy', 'Rajesh Kumar Verma, Advocate', 2518, 2518, NULL, NULL, NULL, 1, '2022-11-27 22:54:44', '2022-11-27 22:54:44', NULL),
(12, 2518, 'W.P. No.27656 (W) of 2015', 'Calcutta High Court', 'Mediclaim', 'Dinanath Patra Vs UOI &  SAI', 'D. N. Ray, Advocate', 2518, 2518, NULL, NULL, NULL, 1, '2022-11-27 22:58:14', '2022-11-27 22:58:14', NULL),
(13, 2518, 'O.A. No.350/ 00712/2016', 'CAT  Kolkata  Bench', 'Resignation on lien', 'Anup Shaw –v/s- UOI & Ors.', 'D. N. Roy, Advocate', 2518, 2518, NULL, NULL, NULL, 1, '2022-11-27 23:08:56', '2022-11-27 23:08:56', NULL),
(14, 2518, 'O. A. No. 1617 of 2016', 'CAT Kolkata Bench', 'Transfer', 'Dr. Subrata Mallick Vs UOI & SAI', 'D. N. Roy, Advocate', 2518, 2518, NULL, NULL, NULL, 1, '2022-11-27 23:10:52', '2022-11-27 23:10:52', NULL),
(15, 2518, 'OA No.720/2019', 'CAT Cuttack Bench', 'Regularization', 'Atanu Ghosh & Ors. –v/s- UOI & Ors', 'Sri Lalitendu Mishra', 2518, 2518, NULL, NULL, NULL, 1, '2022-11-27 23:13:05', '2022-11-27 23:13:05', NULL),
(16, 2518, 'OA No.697 of 2021', 'CAT Calcutta Bench', 'Suspension', 'Smt. R. Shanmugavalli Vs. UOI & SAI', 'D. N. Roy, Advocate', 2518, 2518, NULL, NULL, NULL, 1, '2022-11-27 23:14:57', '2022-11-27 23:14:57', NULL),
(17, 2518, 'O.A./1049/2018', 'CAT  Kolkata Bench', 'Reimbursement', 'DILIP KUMAR SINHA Vs SAI', 'D. N. Roy, Advocate', 2518, 2518, NULL, NULL, NULL, 1, '2022-11-27 23:19:08', '2022-11-27 23:19:08', NULL),
(18, 2518, 'O.A./241/2022', 'CAT Cuttack Bench', 'termination service', 'D. AJAY RAO Vs. UOI & SAI', 'Lalitendu Mishra, Advocate', 2518, 2518, NULL, NULL, NULL, 1, '2022-11-27 23:20:23', '2022-11-27 23:20:23', NULL),
(19, 2518, 'W.P.(C) NO.16429 OF 2022', 'High Court of Orissa', 'Regularization', 'Ashok Ghosh	VS  UOI & SAI', 'P.K.Parhi, ASGI', 2518, 2518, NULL, NULL, NULL, 1, '2022-11-27 23:22:53', '2022-11-27 23:22:53', NULL),
(20, 3009, 'OA No. 146/2019 Ajit Singh v/s UOI & Others', 'CAT Allahabad', 'Restoration of Service', 'Ajit Singh v/s UOI & Others', 'Rajeshwar Rao', 2519, 2519, NULL, NULL, NULL, 1, '2022-11-29 00:26:44', '2022-11-29 00:26:44', NULL),
(21, 3009, 'Labour court case no. 81/PWA/2019', 'Assistant labour commissioner Bareilly', 'Bareilly claiming wages and January 2018 as security guards employed on outsourced basis through M/s Lion Security Service Lucknow', 'Arun Yadav and Vishnu Yadav V/s STC Bareilly', 'Sumit Saxena', 2519, 2519, NULL, NULL, NULL, 1, '2022-11-29 00:26:44', '2022-11-29 00:26:44', NULL),
(22, 3009, 'Recovery Suit No: 1886 of 2021', 'Court of Civil Judge (J.D), North Lucknow', 'We have filed the case of suit for Recovery of Money', 'Sports Authority of India Vs M/s Om Needeshiya Group', 'Mr. Murtaza Hasnain Khan', 2519, 2519, NULL, NULL, NULL, 1, '2022-11-29 00:26:45', '2022-11-29 00:26:45', NULL),
(23, 3009, 'YOUTH AFFAIR AND SPORTS( SPORTS AUTHORITY OF INDIA ) 919044-WP100/2022', 'HIGH COURT (LUCKNOW) UTTAR PRADESH', 'The petitioner is claiming the amount for participation of Handball championship held in Saudi Arabia January 2022.', 'Mohit  Yadav Vs Union of India (Parties): Ministry of youth affairs and sports SAI, Delhi Handball federation of India  UP handball association', 'UOI- ASG SAI Lucknow- Mr. Murtaza Hasnain Khan', 2519, 2519, 2519, NULL, NULL, 1, '2022-11-29 00:26:45', '2022-12-01 05:00:44', NULL),
(24, 3009, 'YOUTH AFFAIR AND SPORTS( SPORTS AUTHORITY OF INDIA ) 929906- 990/2022', 'HIGH COURT (LUCKNOW) UTTAR PRADESH', 'The petitioner is claiming the amount for participation of Handball championship held in Saudi Arabia January 2022.', 'Sheetal Kumari Vs Union of India(Parties): Ministry of youth affairs and sports SAI, Delhi Handball federation of India  UP handball association', 'UOI- ASG SAI Lucknow- Mr. Murtaza Hasnain Khan', 2519, 2519, NULL, NULL, NULL, 1, '2022-11-29 00:29:19', '2022-11-29 00:29:19', NULL),
(25, 3009, 'Mohammad Raza Vs DEPARTMENT OF SPORTS', 'TRIBUNALS (LUCKNOW) CENTRAL ADMINISTRATIVE TRIBUNAL', 'SERVICE MATTERS POST RETIREMENT MEDICAL BENEFITS', '1. Mohammad Raza 2. DEPARTMENT OF SPORTS', 'Standing counsel; Prayagmati Gupta', 2519, 2519, NULL, NULL, NULL, 1, '2022-11-29 00:29:19', '2022-11-29 00:29:19', NULL),
(26, 3009, 'Handball association Vs UOI', 'HIGH COURT (LUCKNOW) UTTAR PRADESH', 'The petitioner is seeking from the IOA to open the portal for document accreditation of the players so that they may participate in the national games.', 'Handball association India', 'ASGI', 2519, 2519, 2519, NULL, NULL, 1, '2022-11-29 00:29:20', '2022-12-01 05:00:19', NULL),
(27, 2514, 'WP 1671/2017 IN OA NO 324/2013', 'HIGH COURT, KARNATAKA', 'GRANT OF RS 5400 GRADE PAY UNDER ACP/MACP SCHEME', 'RD SAI AND OTHERS Vs SULTAN RAZIA AND OTHERS', 'J. Hudson Samuel & Partners', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 03:47:37', '2022-11-29 03:47:37', NULL),
(28, 2514, 'W.P 18825/2022', 'HIGH COURT OF KARNATAKA', 'GRANT OF BACK WAGES', 'SAI Vs MR RAJA, MTS', 'Prakash Shetty', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 03:52:54', '2022-11-29 03:52:54', NULL),
(29, 2514, 'W.P.1580 /2021', 'HIGH COURT, KARNATAKA', 'Approached court for reduction of punishments', 'K.V.Nancharaiah Vs UOI & OTHERS', 'B C Prabakar', 2514, 2514, 2514, NULL, NULL, 1, '2022-11-29 03:53:25', '2022-11-29 03:54:15', NULL),
(30, 2514, 'W.P.3798/2020', 'HIGH COURT, KARNATAKA', 'Reducing of Punishment', 'SAI and Others Vs K V Nancharaiah', 'B C Prabakar', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 03:54:08', '2022-11-29 03:54:08', NULL),
(31, 3019, 'OA No. 200/00495/2015', 'CATE BEMCH JBP', 'SEXUAL HARASSMENT', 'NEMAI BOSE VS UNION OF INDIA', 'ADVOCATE JAMES ANTHONY', 2515, 2515, 2515, NULL, NULL, 1, '2022-11-29 03:54:50', '2022-11-29 05:23:31', NULL),
(32, 2514, '42807/2019', 'HIGH COURT, KARNATAKA', 'Grant of Grade-1 driver', 'Director SAI NSSC Vs P RAVI', 'S Prakash Shetty', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 03:54:58', '2022-11-29 03:54:58', NULL),
(33, 2514, 'MA 319/2020 & OA 297/2020', 'CAT, BENGALURU', 'Requested for nursing allowance and arrears of pay', 'V Karuna Devi Vs DG SAI & OTHERS', 'S Prakash Shetty', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 03:55:32', '2022-11-29 03:55:32', NULL),
(34, 2514, '42534/2018', 'HIGH COURT, ANDHRA PRADESH', 'not allowing to participate in National Competitions', 'MIRIYALA NAVYA Vs UOI and Others', 'Ogirala Ramesh', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 03:56:23', '2022-11-29 03:56:23', NULL),
(35, 2514, '16743/2018', 'HIGH COURT, TELANGANA', 'Dispute between sailing association, regarding derecognition of Yachting Association of lndia', 'Telangana Sailing Association, E BABU NAIDU Vs UOI and Other', 'Ogirala Ramesh', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 03:56:58', '2022-11-29 03:56:58', NULL),
(36, 2514, '13552/2019', 'HIGH COURT, TELANGANA', 'Dispute between federations', 'UPENDRANATH CHALLU Vs UOI and Others', 'Ogirala Ramesh', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 03:57:36', '2022-11-29 03:57:36', NULL),
(37, 2514, '1-186-2022', 'CAT, BENGALURU', 'SERVICE MATTER REGULARIZATION', 'Suma Patlumane Vs UOI & others', 'Prakash Shetty', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 03:58:13', '2022-11-29 03:58:13', NULL),
(38, 2514, 'C C NO 1993/2014 WP NO 11648/2013', 'HIGH COURT, TELENGANA', 'DISPUTE BETWEEN FEDERATION SAI MADE AS A PARTY', 'National Access Class Association of India, N C BABU Vs UOI SECRETARY SAI AND OTHERS', 'Ogirala Ramesh', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 03:58:45', '2022-11-29 03:58:45', NULL),
(39, 2514, 'W P NO 35612/2014 1', 'HIGH COURT, TELENGANA', 'DISPUTE BETWEEN FEDERATIONS SAI HAS BEEN ONE PARTY', 'TAEKWONDO ASSOCIATION Vs UOI SAI HO IOA AND OTHERS', 'Ogirala Ramesh', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 03:59:27', '2022-11-29 03:59:27', NULL),
(40, 2514, 'W P C NO 58081/14', 'HIGH COURT, KARNATAKA', 'MODIFICATION IN SELECTION CRITERIA SAI MADE PARTY', 'ULLAS N V AND OTHERS Vs ASSOCIATION OF UNIVERSITIES AND SAI', 'J. Hudson Samuel & Partners', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 04:00:01', '2022-11-29 04:00:01', NULL),
(41, 2514, 'W P NO 13451/2018', 'HIGH COURT, TELENGANA', 'DISPUTE BETWEEN ASSOCIATION WITH REGAD TO ELECTION', 'TELENGANA CYCLING ASSOCIATION, DURGA PRASAD DIXIT Vs UOI DG SAI AND OTHERS', 'Ogirala Ramesh', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 04:00:42', '2022-11-29 04:00:42', NULL),
(42, 2514, 'W P NO 28145/13 AND W P NO 51374/13', 'HIGH COURT, KARNATAKA', 'REGARDING REINSTATEMENT IN SERVICE', 'RD SAI NSSC Vs R SURESH', 'J. Hudson Samuel & Partners', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 04:01:23', '2022-11-29 04:01:23', NULL),
(43, 2514, 'O.A.No. 357/2021', 'CAT, BENGALURU', 'Challenging the recruitment of Capt. E Bhaskaran, on contarct for the post of Head of Faculty in Kabaddi', 'DR G R SRIDHAR KUMAR Vs SPORTS AUTHORITY OF INDIA', 'S Prakash Shetty', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 04:11:56', '2022-11-29 04:11:56', NULL),
(44, 2514, 'WP 22172/2021', 'HIGH COURT, KARNATAKA', 'Challenging the order of CAT in OA 332/2020, Wherein Orders were Passed by CAT in favour of the applicant & directions are given to conduct the inquiry denovo and release all the retiremnet benefits within 30 days', 'DG SAI & Ors Vs MS Murali', 'S Prakash Shetty', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 04:12:31', '2022-11-29 04:12:31', NULL),
(45, 2514, 'WP.No.17012/2021', 'HIGH COURT, KARNATAKA', 'Irregulariteis in conduct of 13th National Kalaripayattu championship', 'Arya Shajiju & Others Vs Indian Kalarippayattu Federation & Others', 'SAI H.O.', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 04:13:12', '2022-11-29 04:13:12', NULL),
(46, 2514, 'WP No.5868/2022', 'HIGH COURT, ANDHRA PRADESH, AMARAVATI', 'Kabaddi Federation of India is not allowing the national players to participate in championship', 'Kornana Jhansi & Others Vs UOI & Others', 'Ogirala Ramesh', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 04:13:48', '2022-11-29 04:13:48', NULL),
(47, 2514, 'WP No.19978/2022', 'HIGH COURT, TELANGANA', 'Dispute between Federation', 'Kaparavena Anjaneyulu Vs DG, SAI & Others', 'Ogirala Ramesh', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 04:14:30', '2022-11-29 04:14:30', NULL),
(48, 2514, 'WP.No.13152/2022', 'HIGH COURT, ANDHRA PRADESH, AMARAVATI', 'Conduct of elections', 'AP Football Association Vs UOI & Others', 'Ogirala Ramesh', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 04:26:28', '2022-11-29 04:26:28', NULL),
(49, 2514, 'WP. No.7103/2022', 'HIGH COURT, ANDHRA PRADESH, AMARAVATI', 'not allowing to participate in National Competitions', 'Karampudu Gayatri & 11 others Vs UOI and others', 'Ogirala Ramesh', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 04:27:04', '2022-11-29 04:27:04', NULL),
(50, 2514, 'OA No.186/2022', 'CAT, BENGALURU', 'Relieving from duties', 'Karampudu Gayatri & 11 others Vs UOI and others', 'S Prakash Shetty', 2514, 2514, 2514, NULL, NULL, 1, '2022-11-29 04:27:40', '2022-11-29 04:29:33', NULL),
(51, 2514, 'C.P. NO. 47,48,49/2022', 'CAT, BENGALURU', 'REGULARIZATION OF SERVICES', 'Komala, Jayamma and Rajendran', 'S Prakash Shetty', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 04:30:08', '2022-11-29 04:30:08', NULL),
(52, 2514, 'W.P No. 19727/2022', 'HIGH COURT, KARNATAKA', 'Dispute between federations', 'Karnataka Kalaripayattu Association', 'NA', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-29 04:30:45', '2022-11-29 04:30:45', NULL),
(53, 3019, 'OA No- 200/00501/2016', 'CAT BENCH JBP', 'POST OF EXECUTIVE DIRECTOR /TRANSFER', 'Roque Dias VS UNION OF INDIA', 'ADVOCATE S.P SINGH', 2515, 2515, 2515, NULL, NULL, 1, '2022-11-29 04:36:20', '2022-11-29 05:24:57', NULL),
(54, 3019, 'WP.324/2016', 'M.P HIGH COURT', 'WITHOUT ISSUING NIT INSTALLATION HOCKY TURF GROUND NO-01, SAI BHOPAL', 'M/S PURPLE SEAS SORTS & TECHNOLOGY VS SAI & OTHERS', 'ADVOCATE S.K KASHYAP', 2515, 2515, 2515, NULL, NULL, 1, '2022-11-29 04:41:32', '2022-11-29 05:25:29', NULL),
(55, 3019, 'WP.555/20216', 'M.P HIGH COURT', 'SELECTED ETAM FO M.P FENCING FOR 17TH SUB JR. NATIONAL CHAMPIONSHIP', 'M/S MP AMATEUR FENCING ASSOCIATION VS STATE OF M.P', 'ADVOCATE S.K KASHYAP', 2515, 2515, 2515, NULL, NULL, 1, '2022-11-29 04:49:59', '2022-11-29 05:25:53', NULL),
(56, 3019, 'CONC. NO-435/2016', 'M.P HIGH COURT', 'TERMINATION OF MESS TENDER OF STC JABALPUR', 'KUDESHWAR CATERS VS SH K.C TRIPATHI', 'ADVOCATE GOPI CHOURASIA', 2515, 2515, NULL, NULL, NULL, 1, '2022-11-29 05:13:59', '2022-11-29 05:13:59', NULL),
(57, 3019, 'SUCC. PETITION/2021', 'COURT OF CIVIL JUDGE (S.D) BHIVANI', 'APPLIED FOR THE SUCCESSION CERTIFICATE IN THE COURT', 'DINESH SINGH & OTHERS VS CRC, BHOPAL', 'ADVOCATE RAJESH ARYA', 2515, 2515, NULL, NULL, NULL, 1, '2022-11-29 05:21:50', '2022-11-29 05:21:50', NULL),
(58, 3019, 'RCSA/266/2022', 'SESSION COURT', 'APPLIED FOR THE DECLARATION CERTIFICATE FOR HIS DATE OF BIRTH', 'RAHUL YADAV VS IN CHARGE REGIONAL DIRECTOR SAI CRC BHOPAL AND GENERAL PUBLIC', 'ADVOCATE DEVENDRA  SINGH BHAGEL', 2515, 2515, 2515, NULL, NULL, 1, '2022-11-29 05:21:50', '2022-11-29 05:27:06', NULL),
(59, 2514, 'W.P.NO.11173/2022', 'HIGH COURT, KARNATAKA', 'RELIEVING FROM DUTIES', 'SUMA PATLUMANE Vs UOI & OTHERS', 'S PRAKASH SHETTY', 2514, 2514, NULL, NULL, NULL, 1, '2022-11-30 01:56:21', '2022-11-30 01:56:21', NULL),
(60, 3017, 'CASE NO. OMP(1)(COMML.)176/2019', 'BEFORE THE COURT OF CENTRAL GOVERNMENT   INDUSTRIAL TRIBUNAL CUM LABOUR COURT-II,   ROOM NO. 208, 2ND FLOOR, ROUSE AVENEUE DISTRICTS   COURTS COMPLEX, I.T.O', 'SARVESH SECURITY SERVICES (P) LTD  CLAIMANT VS SPORTS  AUTHORITY OF INDIA RESPONDENT', 'M/s Sarvesh Security Pvt. Ltd vs SAI', 'SH. O.P. GUPTA, DISTT & SESSION JUDGE (RETD). SOLE ARBITRATOR', 5924, 5924, NULL, NULL, NULL, 1, '2022-11-30 02:50:08', '2022-11-30 02:50:08', NULL),
(61, 2520, 'CIVIL SUIT', 'CIVIL COURT (MUMBAI)', '\"LAND MATTERS   DEFENCE PURPOSE\"', '\"Mr. Hussain Mehbood Sayed Vs Sports Authority of India   and others\"', 'Hon\'ble Judge Sh. Mane', 2520, 2520, 2520, NULL, NULL, 1, '2022-12-01 05:52:27', '2022-12-01 06:02:29', NULL),
(62, 2520, 'R.C.S.', 'CIVIL COURT (NAGPUR)', '\"LAND MATTERS   DEFENCE PURPOSE\"', 'Sh. Chandrakant Nilkhanthrao Nakhale Vs State Maharashtra through collector', 'Hon\'ble Judge Sh. P.P. Naigaonkar', 2520, 2520, 2520, NULL, NULL, 1, '2022-12-01 05:54:56', '2022-12-01 06:02:48', NULL),
(63, 2999, 'Land Case S.No.160-T/2020', 'Civil Judge, Sr.Division,Patiala', 'Land Case', 'UOI V/S Ahleya Khalsa', 'SK Kaushal', 2524, 2524, 2524, NULL, NULL, 1, '2022-12-01 06:29:54', '2022-12-20 00:45:16', NULL),
(64, 2999, 'Land Case 522/2014', 'Distt Courts, Patiala', 'Land Case', 'SAI V/s Banarsi Das', 'S.K Kaushal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:30:41', '2022-12-01 06:30:41', NULL),
(65, 2999, 'RSA No.1770 of 1987', 'High Court, Chandigarh RSA No.1770 of 1987', 'Land case RSA No.1770 of 1987', 'SAI v/s Niranjan Das', 'Vishal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:31:21', '2022-12-01 06:31:21', NULL),
(66, 2999, 'RSA No.3682 of 2012', 'High Court, Chandigarh RSA No.3682 of 2012', 'Land Case', 'vAhley Khalsa v/s UOI', 'Vishal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:32:02', '2022-12-01 06:32:02', NULL),
(67, 2999, 'CWP No.3200 of 2013', 'High Court, Chandigarh', 'Service Matter of 2013', 'Varinder Prasad v/s SAI', 'Vishal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:32:41', '2022-12-01 06:32:41', NULL),
(68, 2999, 'RSA NO.3092 of 2015 (O & M', 'High Court, Chandigarh', 'Land Case', 'Banarasi Dass v/s UOI', 'Vishal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:33:14', '2022-12-01 06:33:14', NULL),
(69, 2999, 'RSA NO.3092 of 2015 (O & M)', 'High Court, Chandigarh', 'Land Case', 'Banarasi Dass v/s UOI', 'Vishal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:35:55', '2022-12-01 06:35:55', NULL),
(70, 2999, 'CWP No.20575 of 2008/26970 2016', 'High Court Chandigarh', 'Service matter CWP No. 20575 of 2008', 'Jagjt Singh v/s SAI', 'Vishal aggrawal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:36:31', '2022-12-01 06:36:31', NULL),
(71, 2999, 'OA No.444 CWP No.15105/2014', 'High Court Chandigarh', 'Service matter OA No. 444 CWP No. 15105/2014', 'SAI v/s Sukhdeep Kang', 'Vishal agarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:37:16', '2022-12-01 06:37:16', NULL),
(72, 2999, 'OA NO. 445', 'High Court Chandigarh', 'Service Matter OA No. 445', 'SAI v/s Baljinder Singh', 'Vishal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:38:03', '2022-12-01 06:38:03', NULL),
(73, 2999, 'Claim  Case Service Matter 2221/2017', 'Asstt.Labour Commissioner, Patiala', 'Claim case service matter', 'Balwinder Kumar v/s SAI', 'Vishal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:40:10', '2022-12-01 06:40:10', NULL),
(74, 2999, 'No.1399/2017', 'High Court Chandigarh No.1399/2017', 'L.P.A Service Matter', 'SAI v/s Balwinder Kumar', 'Vishal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:40:43', '2022-12-01 06:40:43', NULL),
(75, 2999, 'O.A.No.492 of 2019', 'CAT, Chandigarh', 'Service Matter', 'Neha Sharma & Others v/s SAI', 'Vishal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:41:32', '2022-12-01 06:41:32', NULL),
(76, 2999, 'O.A.No.551/2019', 'CAT, Chandigarh', 'Service Matter', 'Kishore Kumar v/s SAI', 'Vishal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:42:23', '2022-12-01 06:42:23', NULL),
(77, 2999, 'O.A.No.60/786 2018', 'CAT, Chandigarh', 'Service Matter', 'Jarnail Singh v/s SAI', 'Vishal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:43:05', '2022-12-01 06:43:05', NULL),
(78, 2999, 'O.A No.582 of 2019', 'CAT,Chandigarh', 'Service Matter', 'Maninder Kaur v/s SAI', 'Vishal Agarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:43:38', '2022-12-01 06:43:38', NULL),
(79, 2999, 'CM No.12343-C of 2019 in RSA-4257-2011', 'High Court, Chandigarh', 'High Court, Chandigarh', 'Kanwar  Devinder Singh v/s SAI', 'VIshal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:44:17', '2022-12-01 06:44:17', NULL),
(80, 2999, 'Land C.A 269/2015', 'Distt. court Patiala', 'Land Case(Appeal', 'Kanwar Devinder Singh v/s SAI', 'S.K Kaushal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:45:15', '2022-12-01 06:45:15', NULL),
(81, 2999, 'CWP No.13809/2020', 'High Court, Chandigarh', 'Admission', 'Devinder Singh v/s SAI', 'Vishal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:46:59', '2022-12-01 06:46:59', NULL),
(82, 2999, 'CWP Service Matter CWP No.24530 of 2018', 'High Court, Chandigarh', 'Service Matter', 'Dr. S.K.Nandi v/s SAI', 'Vishal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:47:38', '2022-12-01 06:47:38', NULL),
(83, 2999, 'CWP No.18181/2020', 'High Court, Chandigarh', 'Service Matter', 'Rajbir Singh  v/ s SAI', 'Vishal aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:48:19', '2022-12-01 06:48:19', NULL),
(84, 2999, 'OA No 320/2022', 'CAT Chandigarh', 'Service Matter', 'Ms. Babita V/s NS NIS Patiala', 'Vishal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:48:55', '2022-12-01 06:48:55', NULL),
(85, 2999, 'CP 23/2022', 'CAT Chandigarh', 'Service Matter', 'Ms. Babita V/s NS NIS Patiala', 'Vishal aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:50:22', '2022-12-01 06:50:22', NULL),
(86, 2999, 'CWP No', 'High Court Chandigarh', 'Counting of Service', 'Ms. Dharam Pal V/s State of Punjab and NIS PAtiala', 'Vishal Aggarwal', 2524, 2524, NULL, NULL, NULL, 1, '2022-12-01 06:50:57', '2022-12-01 06:50:57', NULL),
(87, 3003, '491/2019', 'CAT, Chandigarh', 'Challenge the process of outsourcing', 'Krishan Chander and others Vs Sports Authority of India', 'P.C. Goyal', 2521, 2521, NULL, NULL, NULL, 1, '2022-12-02 01:55:49', '2022-12-02 01:55:49', NULL),
(88, 3003, '310/2019', 'CAT, Chandigarh', 'Regularization of service', 'Rajinder Kumar Vs Sports Authority of India', 'P.C. Goyal', 2521, 2521, NULL, NULL, NULL, 1, '2022-12-02 01:55:50', '2022-12-02 01:55:50', NULL),
(89, 3003, '397/2019', 'CAT, Chandigarh', 'Regularization of service  and equal pay for equal work in terms of judgement of Honourable Supreme Court Of India', 'Sunil Kumar Vs UOI and others', 'P.C. Goyal', 2521, 2521, NULL, NULL, NULL, 1, '2022-12-02 01:55:50', '2022-12-02 01:55:50', NULL),
(90, 3003, 'ID/34/2015', 'CGIT Chandigarh', 'Allegation of termination', 'Rakesh Yadav VS Gov. of India and Sports Authority of India', 'P.C. Goyal', 2521, 2521, NULL, NULL, NULL, 1, '2022-12-02 01:55:50', '2022-12-02 01:55:50', NULL),
(91, 3003, '312/2019', 'CAT, Chandigarh', 'Regularization of service', 'Rakesh kumar vs Sports authority of India and others', 'P.C. Goyal', 2521, 2521, NULL, NULL, NULL, 1, '2022-12-02 01:55:50', '2022-12-02 01:55:50', NULL),
(92, 3003, '315/2018', 'CAT, Chandigarh', 'Promotion from the date his junior promoted', 'Shamsher singh vs SAI UOI and others', 'P.C. Goyal', 2521, 2521, NULL, NULL, NULL, 1, '2022-12-02 01:55:50', '2022-12-02 01:55:50', NULL),
(93, 3003, 'CWP/17887/2020', 'High Court Chandigarh', 'Appeal against order of CAT', 'Govt. of India and Sports authority of India Vs Devender Kumar Sharma, Workman, Daily wages', 'P.C. Goyal', 2521, 2521, NULL, NULL, NULL, 1, '2022-12-02 01:55:50', '2022-12-02 01:55:50', NULL),
(94, 3003, 'OA/709/2020', 'CAT, Chandigarh', 'Grant of MACP', 'Anita Sharma vs SAI', 'P.C. Goyal', 2521, 2521, NULL, NULL, NULL, 1, '2022-12-02 01:55:50', '2022-12-02 01:55:50', NULL),
(95, 3003, 'OA/56/2021', 'CAT, Chandigarh', 'For MACP benefits', 'Krishan Chander and others Vs Sports Authority of India', 'P.C. Goyal', 2521, 2521, NULL, NULL, NULL, 1, '2022-12-02 01:55:50', '2022-12-02 01:55:50', NULL),
(96, 3003, '992/2021', 'CAT, Chandigarh', 'Regularisation of Service', 'Krishna Devi Vs UOI and SAI', 'P.C. Goyal', 2521, 2521, NULL, NULL, NULL, 1, '2022-12-02 01:55:50', '2022-12-02 01:55:50', NULL),
(97, 3003, '552/2019', 'CAT, Chandigarh', 'Challenge the process of outsourcing', 'Rajesh Kumar vs SAI', 'P.C. Goyal', 2521, 2521, NULL, NULL, NULL, 1, '2022-12-02 01:55:50', '2022-12-02 01:55:50', NULL),
(98, 3015, 'AVBC', 'State', 'TEst', 'State', 'State', 2522, 2522, NULL, NULL, NULL, 1, '2022-12-05 00:21:59', '2022-12-05 00:21:59', NULL),
(99, 3015, 'BFhbh', 'sbhjbsd', 'sdjb', 'sdjb', 'sdsd', 2522, 2522, NULL, NULL, NULL, 1, '2022-12-05 00:21:59', '2022-12-05 00:21:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pendingdemandsmanages`
--

CREATE TABLE `pendingdemandsmanages` (
  `id` bigint(20) NOT NULL,
  `project_center_id` bigint(20) DEFAULT NULL,
  `rc_id` int(20) DEFAULT NULL,
  `particulars` varchar(255) DEFAULT NULL,
  `template_id` bigint(20) NOT NULL,
  `last_correspondence_regional` date DEFAULT NULL,
  `concerned_division_personnel` varchar(200) DEFAULT NULL,
  `row_status` varchar(200) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_for` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendingdemandsmanages`
--

INSERT INTO `pendingdemandsmanages` (`id`, `project_center_id`, `rc_id`, `particulars`, `template_id`, `last_correspondence_regional`, `concerned_division_personnel`, `row_status`, `remarks`, `user_id`, `created_for`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 3014, NULL, 'Strength and conditioning Manpower', 1, '2021-10-28', 'HPL', 'pending', '1 Strength and conditioning expert Grade II resigned from NCOE ghy on 5/10/2021, so there is one vacancy for the said post. we would request one S&C grade II to be posted in NCOE Ghy.', 2517, NULL, 2517, 2517, NULL, '2022-11-24 06:37:30', '2022-11-25 05:52:50', NULL, 1),
(2, 3014, NULL, 'Requirement of coaches in various STC and extension centre under SAI RC Guwahati', 1, '2021-11-29', 'Deputy director (personel/coaching division)', 'pending', 'Coaches requirement in STC and extension  centre under SAI  RC Guwahati', 2517, NULL, 2517, 2517, NULL, '2022-11-24 06:43:05', '2022-11-24 06:43:13', NULL, 1),
(3, 3009, NULL, 'Original (new works)/Additional Alteration to Existing Assets /Special Repair to newly purchased or previously abandoned buildings', 1, '2021-11-08', 'INFRA', 'pending', 'List of Sanctioned proposal received from SAI ,HQ, on dt.-26.11.2021. 25 Nos of works approved by DG, SAI, which has been clubbed in to 21 nos.  Till date, total 16 nos. estimates received from CPWD, Remaining 9 nos. estimates yet to received from CPWD', 2519, NULL, 2519, 2519, NULL, '2022-11-29 01:58:23', '2022-11-29 02:20:06', NULL, 1),
(13, 3009, NULL, 'Testing  pending', 1, '2022-11-01', 'INFRA', 'pending', 'It team SAI', 2519, NULL, 2519, NULL, 2519, '2022-11-29 03:27:20', '2022-11-30 06:30:36', '2022-11-30 06:30:36', 1),
(14, 3019, NULL, 'STC/Ext.Centre/Akhada/STC केन्द्रों में प्रशिक्षको की आवश्यकता के सम्बन्ध में', 1, '2022-09-12', 'Dy. Director (Coaching)', 'pending', 'भा.खे.प्रा./क्षे.नि.के.के./ऑप्स/2022-23/696 दिनांक:12.09.2022', 2515, NULL, 2515, NULL, NULL, '2022-11-29 03:44:43', '2022-11-29 03:44:43', NULL, 1),
(15, 3019, NULL, 'Release of fund for the construction work of 300 bedded Hostel at SAI Bhopal', 1, '2022-11-09', 'Director (Infra)', 'pending', '19-07021/2/2021-RC Bhopal-Infra Division/986 dated:09.11.2022', 2515, NULL, 2515, NULL, NULL, '2022-11-29 03:44:43', '2022-11-29 03:44:43', NULL, 1),
(16, 3019, NULL, 'Construction of 300 Hostel at SAI, Bhopal: External Development Works', 1, '2022-11-24', 'Director (Infra)', 'pending', '19-07021/2/2021-RC Bhopal-Infra Division/1079 dated:09.11.2022', 2515, NULL, 2515, NULL, NULL, '2022-11-29 03:44:43', '2022-11-29 03:44:43', NULL, 1),
(17, 3019, NULL, 'Regarding Transfer of athletes in Athletics discipline from NCOE Bhopal to other NCOEs', 1, '2022-11-04', '\"Sh. Satish Kumar S.  Deputy Director (KITD)\"', 'pending', '1058 dated:04.11.2022', 2515, NULL, 2515, NULL, NULL, '2022-11-29 03:44:43', '2022-11-29 03:44:43', NULL, 1),
(18, 3019, NULL, 'Regarding Transfer of Hockey athlete from NCOE Bhopal', 1, '2022-11-24', '\"Sh. Satish Kumar S.  Deputy Director (KITD)\"', 'pending', 'E-6251 19-09002/8/2021-RC Bhopal-NCOE Division/1077 dated 24.11.2022', 2515, NULL, 2515, NULL, NULL, '2022-11-29 03:44:43', '2022-11-29 03:44:43', NULL, 1),
(19, 3019, NULL, 'साईं एन.सी.ओ.ई.भोपाल में पेस्ट कंट्रोल के लिए अतिरिक्त निधि वित्तीय वर्ष 2022-23 के सम्बन्ध में |', 1, '2022-06-20', 'निदेशक (वित्त अनुभाग)', 'pending', '19-16010/1/2022-RC Bhopal-Mess Division/384 दिनांक :20.06.2022', 2515, NULL, 2515, NULL, NULL, '2022-11-29 03:44:43', '2022-11-29 03:44:43', NULL, 1),
(20, 3020, NULL, '\"Release of Fund for Urgent Repair & Maintenance of 10m, 25m & 50 m Shooting Range Complex for Khelo India University Games 2021 at SAI, NSSC, Bangalore   (Estimated Cost = Rs. 13,64,778/- + 4,11,771/- + 7,26,667 = 25,03,216/-\"', 1, '2022-02-11', 'Khelo India', 'pending', 'Nil', 2514, NULL, 2514, 2514, NULL, '2022-11-29 04:42:18', '2022-11-29 04:42:59', NULL, 1),
(23, 3020, NULL, 'dfhgdr', 1, '2022-11-09', 'faf', 'pending', 'fasf', 2514, NULL, 2514, NULL, 2514, '2022-11-29 05:17:23', '2022-11-29 05:17:27', '2022-11-29 05:17:27', 1),
(24, 3020, NULL, '\"Release of Fund for Upgradation of Sports Medicine Centre at SAI, NSSC, Bangalore.   (Estimated Cost = Rs. 1.23 Cr.)\"', 1, '2022-09-19', 'Infra', 'pending', '\"Work in Progress   Request for releasing of 1st Installment of Funds amounting to Rs. 12.32 Lakh forwarded to SAI, H.O., New Delhi vide Letter No. SAI/NSSC/ENGG/UPG/SS&SMC/272/2021-22 dt. 19.09.2022\"', 2514, NULL, 2514, 2514, NULL, '2022-11-29 06:31:28', '2022-11-29 06:32:10', NULL, 1),
(25, 3020, NULL, '\"Release of Fund for Upgradation of Sports Science Centre at SAI, NSSC, Bangalore.   (Estimated Cost = Rs. 0.81 Cr.)\"', 1, '2022-09-21', 'Finance', 'pending', '\"Work in Progress   Request for releasing of 1st Installment of Funds amounting to Rs. 8.13 Lakh forwarded to SAI, H.O., New Delhi vide Letter No. SAI/NSSC/ENGG/UPG/SS&SMC/272/2021-22 dt. 21.09.2022\"', 2514, NULL, 2514, 2514, NULL, '2022-11-29 06:34:03', '2022-11-29 06:34:33', NULL, 1),
(26, 3020, NULL, '\"Release of Fund for Upgradation of Kitchen & Dining Hall   of CoE at SAI, NSSC, Bangalore.   (Estimated Cost = Rs. 2.30 Cr.)\"', 1, '2022-08-10', 'Finance', 'pending', 'UC and Fund Requisition forwarded to SAI, H.O. vide Letter no. SAI/NSSC/ENGG/MAINT/KITCHEN&DH/COE/263/2022-23 dt. 10.08.2022 for an amount of Rs. 53 Lakh.', 2514, NULL, 2514, 2514, NULL, '2022-11-29 06:34:33', '2022-11-29 06:35:01', NULL, 1),
(27, 3020, NULL, '\"Release of Fund for Construction of 300 Bed Hostel at SAI, NSSC, Bangalore.   (Estimated Cost = Rs.26.77 Cr.)\"', 1, '2022-10-06', 'Infra', 'pending', 'UC and Fund Requisition forwarded to SAI, H.O. vide Letter no. No.SAI/NSSC/ENGG/KIS/CON/HOSTEL BLDS-B&G/249/2021-22 dt. 06.10.2022 for an amount of Rs. 1.21 Cr.', 2514, NULL, 2514, 2514, NULL, '2022-11-29 06:35:01', '2022-11-29 06:36:23', NULL, 1),
(28, 3020, NULL, '\"Release of fund for Construction of Approach Road to New Multi Purpose Indoor Hall at SAI, NSSC, Bangalore   (Estimated Cost = Rs.95.13 Lakh)\"', 1, '2022-02-07', 'Finance', 'pending', '\"Request for Releasing of 1st Installment of Fund amounting to Rs. 8 Lakh for awarding AA&ES to CPWD. Email dt. 04.11.2022 received from Director (F), SAI, H.O., New Delhi for taking up the work.  CPWD vide Letter dt. 05.11.2022 has submitted revised estimate amounting to Rs. 95.13 Lakh due to increase in GST & Cost Index\"', 2514, NULL, 2514, 2514, NULL, '2022-11-29 06:36:59', '2022-11-29 07:12:57', NULL, 1),
(29, 3009, NULL, 'Providing and applying white cement based putty etc.', 1, '2021-07-29', 'INFRA', 'pending', 'Letter no 01-11009(04)/3/2021-HO-Infra Div/33, Dated- 17.01.2022 received from HQ, Accordingly the same has been conveyed to CPWD, for nomination of suitable officer for assessment of Executed works by UPRNN Ltd.  As per guideline from SAI, HQ, fresh proposal of Rs. 16.06/- lcs. for above said work is obtained from empanelled agency, already sent to SAI HQ.)As per guideline of  SAI-HQ committee visited the site for evaluation of the executed work . Constituted committee visited site on 17.02.2022 & submitted report on 21.03.2022,same has been forwarded to SAI-HQ. Letter received from SAI-HQ requesting clear recommendation of committee, on that basis recommendation submitted to SAI, HQ, for payment. SAI HQ has requested further clarification which will be provided shortly. SAI HQ has asked for the authenticity of Challans submitted by M/s UPRNNL, in reply M/s UPRNNL has submitted the GST invoices to RC- Lucknow. Same is under onwards submission to SAI HQ.', 2519, NULL, 2519, 2519, NULL, '2022-11-30 06:31:54', '2022-11-30 06:33:11', NULL, 1),
(30, 3012, NULL, '1 Hockey Coach for Ext. Centre, Thenzawl', 1, '2022-06-30', 'Operation Division', 'pending', 'No SAI Coach is deputed at the Centre. This centre has produced many International Players in Hockey.', 2523, NULL, 2523, 2523, NULL, '2022-12-01 03:06:35', '2022-12-01 03:08:32', NULL, 1),
(31, 3012, NULL, '1Teakwondo Coach for Ext. Centre Lunglei, Mizoram', 1, '2022-06-30', 'Operation Division', 'pending', 'No Taekwondo coach is posted at this centre.', 2523, NULL, 2523, NULL, NULL, '2022-12-01 03:08:32', '2022-12-01 03:08:32', NULL, 1),
(32, 3012, NULL, '1 Karate Coach for STC Aizawl', 1, '2022-06-30', 'Operation Division', 'pending', 'No Karate Coach is deputed at the centre', 2523, NULL, 2523, NULL, NULL, '2022-12-01 03:08:32', '2022-12-01 03:08:32', NULL, 1),
(33, 3012, NULL, 'Football - 1 for Sainik School and 1 for STC Dimapur', 1, '2022-06-30', 'Operation Division', 'pending', 'No SAI Coach posted at Sainik School. Only one coach is posted at STC Dimapur', 2523, NULL, 2523, NULL, NULL, '2022-12-01 03:08:32', '2022-12-01 03:08:32', NULL, 1),
(34, 2999, NULL, 'NIL', 1, '2022-10-25', 'NIL', 'pending', 'NIL', 2524, NULL, 2524, NULL, NULL, '2022-12-01 06:57:41', '2022-12-01 06:57:41', NULL, 1),
(35, 2520, NULL, 'Requirement of JC & YP for Khelo India', 1, '2022-08-18', 'KHELO INDIA', 'pending', 'APPROVAL PENDING', 2520, NULL, 2520, 2520, NULL, '2022-12-01 07:22:06', '2022-12-01 07:26:20', NULL, 1),
(36, 3017, NULL, 'N/A', 1, '2022-12-02', 'Infra', 'approved', 'Everything is done', 5924, NULL, 5924, NULL, 5924, '2022-12-01 23:52:01', '2022-12-01 23:52:17', '2022-12-01 23:52:17', 1),
(37, 3013, NULL, 'No Pending', 1, '2022-12-02', 'Infra', 'approved', 'Not anything pending', 5924, NULL, 5924, NULL, NULL, '2022-12-01 23:52:55', '2022-12-01 23:52:55', NULL, 1),
(38, 3009, 2519, '111', 8, '2022-12-01', '1111', 'approved', '11111', 2519, 3009, 2519, NULL, NULL, '2022-12-28 08:24:46', '2022-12-28 08:24:46', NULL, 1),
(39, 2883, 2519, '2222', 8, '2022-12-01', '22222', 'approved', '2222', 2519, 2883, 2519, NULL, NULL, '2022-12-28 08:24:59', '2022-12-28 08:24:59', NULL, 1),
(40, 3009, 2519, '111', 9, '2022-12-01', '1111', 'approved', '11111', 2519, 3009, 2519, NULL, NULL, '2022-12-28 08:25:19', '2022-12-28 08:25:19', NULL, 1),
(41, 2883, 2519, '2222', 9, '2022-12-01', '22222', 'approved', '2222', 2519, 2883, 2519, NULL, NULL, '2022-12-28 08:25:19', '2022-12-28 08:25:19', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `procurement_first_forms`
--

CREATE TABLE `procurement_first_forms` (
  `id` bigint(20) NOT NULL,
  `project_center_id` bigint(20) DEFAULT NULL,
  `template_id` bigint(20) NOT NULL,
  `rc_id` bigint(20) DEFAULT NULL,
  `se_opening_balance` double DEFAULT NULL COMMENT 'Sports Equipment Opening Balance',
  `se_administrative_approval_budget` double DEFAULT NULL COMMENT 'Administrative approval (including budget) of HO received (Rs) – Sports Science',
  `se_fund_transfer` double DEFAULT NULL COMMENT 'FUNDS TRANSFERRED DURING CURRENT FY (RS) - SPORTS SCIENCE',
  `se_total_fund_available` double DEFAULT NULL COMMENT 'Total fund available for Sports Science (1+3)',
  `se_fund_requirement` double DEFAULT NULL COMMENT 'Funds requirement (if any) (4-2)',
  `sse_opening_balance` double DEFAULT NULL,
  `sse_administrative_approval_budget` double DEFAULT NULL,
  `sse_fund_transfer` double DEFAULT NULL,
  `sse_total_fund_available` double DEFAULT NULL,
  `sse_fund_requirement` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_for` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procurement_first_forms`
--

INSERT INTO `procurement_first_forms` (`id`, `project_center_id`, `template_id`, `rc_id`, `se_opening_balance`, `se_administrative_approval_budget`, `se_fund_transfer`, `se_total_fund_available`, `se_fund_requirement`, `sse_opening_balance`, `sse_administrative_approval_budget`, `sse_fund_transfer`, `sse_total_fund_available`, `sse_fund_requirement`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_for`) VALUES
(1, 3014, 1, NULL, 0, 5.06, 1.05, 1.05, -4.01, 0, 2.6, 0.2, 0.2, -2.4, '2022-11-22 23:45:14', '2022-11-22 23:45:14', NULL, 2517, NULL, NULL, NULL),
(2, 2517, 1, NULL, 0, 5.06, 1.05, 1.05, -4.01, 0, 2.6, 0.2, 0.2, -2.4, '2022-11-23 01:06:31', '2022-11-23 01:06:31', NULL, 2517, NULL, NULL, NULL),
(3, 3012, 1, NULL, 700000, 0, 14600000, 15300000, 15300000, 400000, 0, 4900000, 5300000, 5300000, '2022-11-24 00:49:43', '2022-11-24 00:49:43', NULL, 2523, NULL, NULL, NULL),
(4, 3019, 1, NULL, 0.27, 3.66, 1.96, 2.23, -1.4300000000000002, 0, 0.25, 0.07, 0.07, -0.18, '2022-11-28 11:24:16', '2022-11-28 11:24:16', NULL, 2515, NULL, NULL, NULL),
(5, 3009, 1, NULL, 0, 1.04, 0.69, 0.69, -0.3500000000000001, 0, 0.68, 0.34, 0.34, -0.34, '2022-11-29 02:04:24', '2022-11-29 02:04:24', NULL, 2519, NULL, NULL, NULL),
(6, 3020, 1, NULL, 0, 12500000, 24100000, 24100000, 11600000, 0, 16500000, 4400000, 4400000, -12100000, '2022-11-29 13:47:01', '2022-11-29 08:17:01', NULL, 2514, 2514, NULL, NULL),
(7, 2999, 1, NULL, 85.68, 2.5, 24.63, 110.31, 107.81, 0, 64, 0, 0, -64, '2022-12-01 07:45:41', '2022-12-01 07:45:41', NULL, 2524, NULL, NULL, NULL),
(8, 3013, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-12-01 14:52:25', '2022-12-01 09:22:25', NULL, 5924, 5924, NULL, NULL),
(9, 3009, 8, 2519, 111, 10, 0, 111, 101, 1, 1, 10, 11, 10, '2022-12-28 08:13:32', '2022-12-28 08:13:32', NULL, 2519, NULL, NULL, 3009),
(10, 3009, 9, 2519, 111, 10, 0, 111, 101, 1, 1, 10, 11, 10, '2022-12-28 13:50:20', '2022-12-28 08:20:20', '2022-12-28 08:20:20', 2519, NULL, NULL, 3009),
(11, 3009, 9, 2519, 111, 10, 0, 111, 101, 1, 1, 10, 11, 10, '2022-12-28 08:20:20', '2022-12-28 08:20:20', NULL, 2519, NULL, NULL, 3009);

-- --------------------------------------------------------

--
-- Table structure for table `procurement_master`
--

CREATE TABLE `procurement_master` (
  `id` bigint(20) NOT NULL,
  `project_center_id` bigint(20) DEFAULT NULL,
  `title` text NOT NULL,
  `type` enum('equipment','services','','') NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_for` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procurement_master`
--

INSERT INTO `procurement_master` (`id`, `project_center_id`, `title`, `type`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`, `created_for`) VALUES
(1, 2517, 'Athletes Sports Kits', 'equipment', 1, 2517, 2517, NULL, '2022-11-23 07:20:57', '2022-11-23 01:50:57', NULL, 0),
(2, 2517, 'Coaches & Staff sports kits', 'equipment', 1, 2517, 2517, NULL, '2022-11-23 07:21:31', '2022-11-23 01:51:31', NULL, 0),
(3, 2517, 'Boxing consumables equipments', 'equipment', 1, 2517, 2517, NULL, '2022-11-23 07:21:35', '2022-11-23 01:51:35', NULL, 0),
(4, 2517, 'Athlete Running shoes', 'equipment', 1, 2517, 2517, NULL, '2022-11-23 07:21:41', '2022-11-23 01:51:41', NULL, 0),
(5, 2517, 'Boxing sports specific shoes', 'equipment', 1, 2517, 2517, NULL, '2022-11-23 07:21:45', '2022-11-23 01:51:45', NULL, 0),
(6, 2517, 'Taekwondo sports specific shoes', 'equipment', 1, 2517, 2517, NULL, '2022-11-23 07:21:49', '2022-11-23 01:51:49', NULL, 0),
(7, 2517, 'Taekwondo consumable equipments', 'equipment', 1, 2517, 2517, NULL, '2022-11-23 07:21:53', '2022-11-23 01:51:53', NULL, 0),
(8, 2517, 'Cycling consumable equipments', 'equipment', 1, 2517, 2517, NULL, '2022-11-23 07:21:58', '2022-11-23 01:51:58', NULL, 0),
(9, 2517, 'Archery consumable equipments', 'equipment', 1, 2517, 2517, NULL, '2022-11-23 07:22:03', '2022-11-23 01:52:03', NULL, 0),
(10, 2517, 'Fencing sports specific shoes', 'equipment', 1, 2517, 2517, NULL, '2022-11-23 07:22:08', '2022-11-23 01:52:08', NULL, 0),
(11, 2517, 'Football Sports specific shoes', 'equipment', 1, 2517, 2517, NULL, '2022-11-23 07:22:12', '2022-11-23 01:52:12', NULL, 0),
(12, 2517, 'fencing consumable equipments', 'equipment', 1, 2517, 2517, NULL, '2022-11-23 07:22:19', '2022-11-23 01:52:19', NULL, 0),
(13, 2517, 'Weightlifting consumable equipments', 'equipment', 1, 2517, 2517, NULL, '2022-11-25 07:09:41', '2022-11-25 01:39:41', NULL, 0),
(14, 2517, 'Weightlifting sports specific shoes', 'equipment', 1, 2517, 2517, NULL, '2022-11-25 07:09:48', '2022-11-25 01:39:48', NULL, 0),
(15, 3004, 'Athlete sports kits', 'equipment', 1, 2517, NULL, 2517, '2022-11-25 07:05:31', '2022-11-25 01:35:31', '2022-11-25 01:35:31', 0),
(16, 3004, 'Coaches and staffs sports kits', 'equipment', 1, 2517, NULL, 2517, '2022-11-25 07:05:36', '2022-11-25 01:35:36', '2022-11-25 01:35:36', 0),
(17, 2517, 'Wushu consumable equipments', 'equipment', 1, 2517, 2517, NULL, '2022-11-25 07:09:55', '2022-11-25 01:39:55', NULL, 0),
(18, 3004, 'Boxing Consumable equipments', 'equipment', 1, 2517, NULL, 2517, '2022-11-25 07:05:50', '2022-11-25 01:35:50', '2022-11-25 01:35:50', 0),
(19, 3004, 'BOXING SPORTS SHOES', 'equipment', 1, 2517, NULL, 2517, '2022-11-25 07:05:45', '2022-11-25 01:35:45', '2022-11-25 01:35:45', 0),
(20, 3012, 'Procurement of Sports equipment for NCOE', 'equipment', 1, 2523, NULL, NULL, '2022-11-24 00:43:14', '2022-11-24 00:43:14', NULL, 0),
(21, 3012, 'Procurement of sports Science equipment for NCOE', 'equipment', 1, 2523, NULL, NULL, '2022-11-24 00:43:40', '2022-11-24 00:43:40', NULL, 0),
(22, 3012, 'NCOE consumable items', 'equipment', 1, 2523, NULL, NULL, '2022-11-24 00:51:49', '2022-11-24 00:51:49', NULL, 0),
(23, 3012, 'NCOE non consumable items', 'equipment', 1, 2523, NULL, NULL, '2022-11-24 00:52:01', '2022-11-24 00:52:01', NULL, 0),
(24, 3012, 'STC consumable items', 'equipment', 1, 2523, NULL, NULL, '2022-11-24 00:52:22', '2022-11-24 00:52:22', NULL, 0),
(25, 3012, 'STC non consumable items', 'equipment', 1, 2523, NULL, NULL, '2022-11-24 00:52:34', '2022-11-24 00:52:34', NULL, 0),
(26, 3012, 'Sepak takraw equipments', 'equipment', 1, 2523, NULL, NULL, '2022-11-24 00:53:37', '2022-11-24 00:53:37', NULL, 0),
(27, 3012, 'STC sports kit', 'equipment', 1, 2523, NULL, NULL, '2022-11-24 00:53:46', '2022-11-24 00:53:46', NULL, 0),
(28, 2517, 'Gym equipments for STCs', 'equipment', 1, 2517, NULL, NULL, '2022-11-24 06:01:10', '2022-11-24 06:01:10', NULL, 0),
(29, 2517, 'Athletics non consumable equipments for STCs', 'equipment', 1, 2517, NULL, NULL, '2022-11-24 06:01:38', '2022-11-24 06:01:38', NULL, 0),
(30, 2517, 'Taekwondo non consumable equipments for STCs', 'equipment', 1, 2517, NULL, NULL, '2022-11-24 06:01:49', '2022-11-24 06:01:49', NULL, 0),
(31, 2517, 'Boxing non consumable equipments for STCs', 'equipment', 1, 2517, NULL, NULL, '2022-11-24 06:01:57', '2022-11-24 06:01:57', NULL, 0),
(32, 2517, 'Archery non consumable equipments for STCs', 'equipment', 1, 2517, NULL, NULL, '2022-11-24 06:02:05', '2022-11-24 06:02:05', NULL, 0),
(33, 2517, 'Archery PAC non consumable equipments for STCs', 'equipment', 1, 2517, NULL, NULL, '2022-11-24 06:02:23', '2022-11-24 06:02:23', NULL, 0),
(34, 2517, 'Judo non consumable equipments for STCs', 'equipment', 1, 2517, NULL, NULL, '2022-11-24 06:02:38', '2022-11-24 06:02:38', NULL, 0),
(35, 2517, 'Weightlifting non consumable equipments for STCs', 'equipment', 1, 2517, NULL, NULL, '2022-11-24 06:02:50', '2022-11-24 06:02:50', NULL, 0),
(36, 2517, 'Hockey non consumable equipments for STCs', 'equipment', 1, 2517, NULL, NULL, '2022-11-24 06:03:13', '2022-11-24 06:03:13', NULL, 0),
(37, 2517, 'Athletes sports kit for STCs', 'equipment', 1, 2517, NULL, NULL, '2022-11-24 06:03:38', '2022-11-24 06:03:38', NULL, 0),
(38, 2517, 'Coaches and staffs sports kit for STCs', 'equipment', 1, 2517, NULL, NULL, '2022-11-24 06:03:53', '2022-11-24 06:03:53', NULL, 0),
(39, 2517, 'Running shoes ncoe itanagar', 'equipment', 1, 2517, NULL, NULL, '2022-11-25 01:46:51', '2022-11-25 01:46:51', NULL, 0),
(40, 2517, 'Ice making Machine', 'equipment', 1, 2517, NULL, NULL, '2022-11-25 04:00:41', '2022-11-25 04:00:41', NULL, 0),
(41, 2517, 'New athletes sports kits', 'equipment', 1, 2517, NULL, NULL, '2022-11-25 04:32:43', '2022-11-25 04:32:43', NULL, 0),
(42, 3020, 'Hockey Non consumables - Procurement of Projector(Benq)', 'equipment', 1, 2514, 2514, NULL, '2022-11-29 09:33:39', '2022-11-29 04:03:39', NULL, 0),
(43, 3020, 'Hockey Non consumables - Procurement of Sony FDR AX700 Video Analysis Camera (8 Nos)', 'equipment', 1, 2514, 2514, NULL, '2022-11-29 06:12:05', '2022-11-29 00:42:05', NULL, 0),
(44, 3020, 'Hockey Non Consumables - Apple MacBook Air M1 Laptop(10Nos)', 'equipment', 1, 2514, 2514, NULL, '2022-11-29 06:15:03', '2022-11-29 00:45:03', NULL, 0),
(45, 3020, 'Hockey Non Consumables - Ha-Ko Hockey Ball Throwing Machine(7Nos)', 'equipment', 1, 2514, 2514, NULL, '2022-11-29 06:34:53', '2022-11-29 01:04:53', NULL, 0),
(46, 3019, 'Tender for Wushu Consumable Sports Equipment for NCOE Bhopal', 'equipment', 1, 2515, NULL, NULL, '2022-11-29 00:17:59', '2022-11-29 00:17:59', NULL, 0),
(47, 3019, 'Tender for Judo Consumable Sports Equipment for NCOE Bhopal- Retender', 'equipment', 1, 2515, NULL, NULL, '2022-11-29 00:21:06', '2022-11-29 00:21:06', NULL, 0),
(48, 3019, 'Tender Boxing Sports Equipment', 'equipment', 1, 2515, NULL, NULL, '2022-11-29 00:21:32', '2022-11-29 00:21:32', NULL, 0),
(49, 3019, 'Tender for Hockey Consumable Sports Equipment for NCOE Bhopal', 'equipment', 1, 2515, NULL, NULL, '2022-11-29 00:21:46', '2022-11-29 00:21:46', NULL, 0),
(50, 3019, 'Tender for K & C Consumable Sports Equipment for NCOE Bhopal- Retender', 'equipment', 1, 2515, NULL, NULL, '2022-11-29 00:27:34', '2022-11-29 00:27:34', NULL, 0),
(51, 3019, 'Athletics Consumable Sports Equipment for NCOE Bhopal', 'equipment', 1, 2515, NULL, NULL, '2022-11-29 00:27:51', '2022-11-29 00:27:51', NULL, 0),
(52, 3019, 'Tender for Judo Non Consumable Sports Equipment for NCOE Bhopal, NCOE Patiala & NCOE Imphal', 'equipment', 1, 2515, NULL, NULL, '2022-11-29 00:28:28', '2022-11-29 00:28:28', NULL, 0),
(53, 3019, 'Tender for Wushu Non Consumable Sports Equipment for NCOE Bhopal, NCOE Itanagar & NCOE Imphal', 'equipment', 1, 2515, NULL, NULL, '2022-11-29 00:28:42', '2022-11-29 00:28:42', NULL, 0),
(54, 3009, 'Security manpower', 'services', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(55, 3009, 'Installation & Providing of  CCTV cameras', 'services', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(56, 3009, 'Tender for Weightlifting Equipments', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(57, 3009, 'Hockey Shoes 2022-23 (Adidas)', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(58, 3009, 'Taekwondo Shoes (Adidas) 2021-22', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(59, 3009, 'Taekwondo Equipment for STCs (Non-Consumables', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(60, 3009, 'Taekwondo Equipment for STCs (Non-Consumables)', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(61, 3009, 'Wrestling Equipment for STCs (Non-Consumables', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(62, 3009, 'Wrestling Equipment for STCs (Non-Consumables)', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(63, 3009, 'Weightlifting Shoes 2022-23 (NIKE Romaleo)', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(64, 3009, 'Taekwondo Equipment for NCOEs (KPNP)', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(65, 3009, 'Taekwondo Equipment for NCOEs (JC)', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(66, 3009, 'Taekwondo Equipment for NCOEs (Daedo)', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(67, 3009, 'Wrestling Equipment for NCOEs  (Suples)', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(68, 3009, 'Wrestling Equipment for NCOEs  (Dollamur', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(69, 3009, 'Weightlifting Consumable Equipment (for STC Kashipur)', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(70, 3009, 'Taekwondo Consumable Equipment for NCOE Lucknow, STC Kashipur & STC Raebareli', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(71, 3009, 'Weightlifting Shoes  (2022-23) (Nike Romaleo 4)', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(72, 3009, 'Taekwondo Shoes and E-Sensor Socks  (2022-23) KPNP', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(73, 3009, 'Taekwondo Uniform  (2022-23) JC Brand', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(74, 3009, 'Wrestling Shoes (ASICS ELITE IV)', 'equipment', 1, 2519, NULL, NULL, '2022-11-29 00:40:32', '2022-11-29 00:40:32', NULL, 0),
(75, 3020, 'Hockey Non Consumables - OBO Hockey Goalkeeper Kit(29 Nos)', 'equipment', 1, 2514, NULL, NULL, '2022-11-29 01:05:32', '2022-11-29 01:05:32', NULL, 0),
(76, 3020, 'Hockey Non Consumables - Video Analysis software for Hockey Discipline', 'equipment', 1, 2514, NULL, NULL, '2022-11-29 01:06:15', '2022-11-29 01:06:15', NULL, 0),
(77, 3020, 'Hockey Non Consumables - Katchet Board (20 Nos),Mini Goal Post(8 Pairs),Goal Post(3Pairs)', 'equipment', 1, 2514, NULL, NULL, '2022-11-29 01:07:02', '2022-11-29 01:07:02', NULL, 0),
(78, 3020, 'Badminton Non consumables- Stop watch, LED TV, Digital Scoring Board, Shuttle feeding machine, Badminton Court Mat', 'equipment', 1, 2514, NULL, NULL, '2022-11-29 06:58:53', '2022-11-29 06:58:53', NULL, 0),
(79, 3020, 'Hockey Consumables - Kookaburra balls 50 Nos', 'equipment', 1, 2514, NULL, NULL, '2022-11-29 06:58:53', '2022-11-29 06:58:53', NULL, 0),
(80, 3020, 'Hockey Consumables - Fitlight (2 Nos)', 'equipment', 1, 2514, NULL, NULL, '2022-11-29 06:59:27', '2022-11-29 06:59:27', NULL, 0),
(81, 3020, 'Hockey Consumables - Video Analysis Software', 'equipment', 1, 2514, NULL, NULL, '2022-11-29 06:59:45', '2022-11-29 06:59:45', NULL, 0),
(82, 3020, 'Hockey Consumables - Skipping and other misc items', 'equipment', 1, 2514, 2514, NULL, '2022-11-29 13:14:39', '2022-11-29 07:44:39', NULL, 0),
(83, 3020, 'Hockey Consumables - Penalty corner  Defending items', 'equipment', 1, 2514, NULL, NULL, '2022-11-29 07:00:37', '2022-11-29 07:00:37', NULL, 0),
(84, 3020, 'Hockey Consumables - Adidas Adilux shoes (70 Pairs)', 'equipment', 1, 2514, NULL, NULL, '2022-11-29 07:00:59', '2022-11-29 07:00:59', NULL, 0),
(85, 3020, 'Taekwondo Consumables - KPNP Efoot protector', 'equipment', 1, 2514, NULL, NULL, '2022-11-29 07:01:32', '2022-11-29 07:01:32', NULL, 0),
(86, 3020, 'Taekwondo Kit Adidas', 'equipment', 1, 2514, NULL, NULL, '2022-11-29 07:01:56', '2022-11-29 07:01:56', NULL, 0),
(87, 3020, 'Weightlifting Consumable items', 'equipment', 1, 2514, NULL, NULL, '2022-11-29 07:02:26', '2022-11-29 07:02:26', NULL, 0),
(88, 3020, 'Athletics Consumables items', 'equipment', 1, 2514, NULL, NULL, '2022-11-29 07:02:41', '2022-11-29 07:02:41', NULL, 0),
(89, 3020, 'Athletics Consumables- Pole Vault', 'equipment', 1, 2514, NULL, NULL, '2022-11-29 07:03:01', '2022-11-29 07:03:01', NULL, 0),
(90, 3017, 'KITCHEN MANPOER', 'services', 1, 5924, 5924, NULL, '2022-11-30 08:08:45', '2022-11-30 02:38:45', NULL, 0),
(91, 3017, 'SPORTS EPUIPMENT', 'equipment', 1, 5924, NULL, NULL, '2022-11-30 06:33:23', '2022-11-30 06:33:23', NULL, 0),
(92, 3017, 'SHOOTING JACKET AND TROUSER', 'equipment', 1, 5924, NULL, NULL, '2022-11-30 06:37:01', '2022-11-30 06:37:01', NULL, 0),
(93, 3017, 'SHOIOTING SPECIFIC SHOES', 'equipment', 1, 5924, NULL, NULL, '2022-11-30 06:37:22', '2022-11-30 06:37:22', NULL, 0),
(94, 3017, 'SHOOTING GLASSES', 'equipment', 1, 5924, NULL, NULL, '2022-11-30 06:37:37', '2022-11-30 06:37:37', NULL, 0),
(95, 3020, 'Sports Science-Exercisephysiology-Stopwatch-2Nos', 'equipment', 1, 2514, NULL, NULL, '2022-12-01 03:55:22', '2022-12-01 03:55:22', NULL, 0),
(96, 3020, 'Sports Science-Exercise physiology-Marking cones 25 Nos', 'equipment', 1, 2514, NULL, NULL, '2022-12-01 03:55:56', '2022-12-01 03:55:56', NULL, 0),
(97, 3020, 'Sports Science-Exercise physiology-Digital thermometer-2 Nos', 'equipment', 1, 2514, NULL, NULL, '2022-12-01 03:56:27', '2022-12-01 03:56:27', NULL, 0),
(98, 3020, 'Sports Science-Exercise physiology-BMI Machine-1 No', 'equipment', 1, 2514, NULL, NULL, '2022-12-01 03:56:50', '2022-12-01 03:56:50', NULL, 0),
(99, 3020, 'Sports Science-Exercise physiology-Temperature humidity meter-1 No', 'equipment', 1, 2514, NULL, NULL, '2022-12-01 03:58:22', '2022-12-01 03:58:22', NULL, 0),
(100, 3020, 'Sports Science-Exercise physiology-Refrigerator 1No', 'equipment', 1, 2514, NULL, NULL, '2022-12-01 04:00:19', '2022-12-01 04:00:19', NULL, 0),
(101, 3020, 'Sports Science-Exercise physiology-Measuring tape-2 Nos', 'equipment', 1, 2514, NULL, NULL, '2022-12-01 04:00:38', '2022-12-01 04:00:38', NULL, 0),
(102, 3020, 'Sports Science-Biomechanics-Procurement of Video analysis softwarelicense for 4 years', 'equipment', 1, 2514, NULL, NULL, '2022-12-01 04:01:30', '2022-12-01 04:01:30', NULL, 0),
(103, 3020, 'Sports Science-Biomechanics-Carry case and connecting cable for force plate', 'equipment', 1, 2514, NULL, NULL, '2022-12-01 04:01:50', '2022-12-01 04:01:50', NULL, 0),
(104, 3020, 'Sports Science-Biomechanics-UPS 6KVA', 'equipment', 1, 2514, NULL, NULL, '2022-12-01 04:02:01', '2022-12-01 04:02:01', NULL, 0),
(105, 2999, 'Fencing Eqp. (Consumable)', 'equipment', 1, 2524, NULL, NULL, '2022-12-01 06:13:41', '2022-12-01 06:13:41', NULL, 0),
(106, 2999, 'Ice cube Machine', 'equipment', 1, 2524, NULL, NULL, '2022-12-01 06:13:57', '2022-12-01 06:13:57', NULL, 0),
(107, 2999, 'Horticulture / Mess Catering Staff (Unskilled Labour )', 'services', 1, 2524, NULL, NULL, '2022-12-01 06:14:17', '2022-12-01 06:14:17', NULL, 0),
(108, 2999, 'Skilled/Highly skilled  staff only', 'services', 1, 2524, NULL, NULL, '2022-12-01 06:14:29', '2022-12-01 06:14:29', NULL, 0),
(109, 2999, 'Security Manpower contract', 'services', 1, 2524, NULL, NULL, '2022-12-01 06:14:41', '2022-12-01 06:14:41', NULL, 0),
(110, 2999, 'Cleaning Staff', 'services', 1, 2524, 2524, NULL, '2022-12-01 11:45:07', '2022-12-01 06:15:07', NULL, 0),
(111, 2999, 'Hiring of Vehicles', 'services', 1, 2524, NULL, NULL, '2022-12-01 06:15:24', '2022-12-01 06:15:24', NULL, 0),
(112, 2520, 'Hockey', 'equipment', 1, 2520, NULL, NULL, '2022-12-01 07:32:57', '2022-12-01 07:32:57', NULL, 0),
(113, 3013, 'Cycling', 'equipment', 1, 5924, 5924, NULL, '2022-12-01 14:58:50', '2022-12-01 09:28:50', NULL, 0),
(114, 3003, 'Wrestling Mat  Tender for Akharas under SAI NRC Sonepat', 'equipment', 1, 2521, NULL, NULL, '2022-12-06 04:35:26', '2022-12-06 04:35:26', NULL, 0),
(115, 3003, 'Sports Shoes for NCOE Sonepat', 'equipment', 1, 2521, NULL, NULL, '2022-12-06 04:35:26', '2022-12-06 04:35:26', NULL, 0),
(116, 3003, 'Boxing Ring for various STCs', 'equipment', 1, 2521, NULL, NULL, '2022-12-06 04:35:26', '2022-12-06 04:35:26', NULL, 0),
(117, 3003, 'Boxing Equipment or various STCs', 'equipment', 1, 2521, NULL, NULL, '2022-12-06 04:35:26', '2022-12-06 04:35:26', NULL, 0),
(118, 3003, 'Volleyball for STC Kurukshetra', 'equipment', 1, 2521, NULL, NULL, '2022-12-06 04:35:26', '2022-12-06 04:35:26', NULL, 0),
(119, 3003, 'Housekeeping', 'services', 1, 2521, NULL, NULL, '2022-12-06 04:37:05', '2022-12-06 04:37:05', NULL, 0),
(120, 3003, 'Horticulture', 'services', 1, 2521, NULL, NULL, '2022-12-06 04:37:05', '2022-12-06 04:37:05', NULL, 0),
(121, 3003, 'Security', 'services', 1, 2521, NULL, NULL, '2022-12-06 04:37:05', '2022-12-06 04:37:05', NULL, 0),
(122, 3003, 'Manpower', 'services', 1, 2521, NULL, NULL, '2022-12-06 04:37:05', '2022-12-06 04:37:05', NULL, 0),
(123, 3015, 'Consumable equipment for Boxing Equipment for STC Jodhpur and Alwar', 'equipment', 1, 2522, 2522, NULL, '2022-12-09 05:55:06', '2022-12-09 00:25:06', NULL, 0),
(124, 3009, 'testing_procurement', 'equipment', 1, 2519, NULL, NULL, '2022-12-29 02:41:39', '2022-12-29 02:41:39', NULL, 3009);

-- --------------------------------------------------------

--
-- Table structure for table `procurement_second_forms`
--

CREATE TABLE `procurement_second_forms` (
  `id` bigint(20) NOT NULL,
  `project_center_id` bigint(20) DEFAULT NULL,
  `template_id` bigint(20) NOT NULL,
  `rc_id` bigint(20) DEFAULT NULL,
  `se_ncoe_cost` double DEFAULT NULL COMMENT 'in cr',
  `se_stc_cost` double DEFAULT NULL COMMENT 'in cr',
  `se_total_cost` double DEFAULT NULL COMMENT 'in cr',
  `se_amt_recive_from_hq` double DEFAULT NULL COMMENT 'AMOUNT RECEIVED FROM HQ',
  `se_amt_incurred_on_procurement_of_equipment` double DEFAULT NULL COMMENT 'Amount Incurred on Procurement of Equipment (In Rs)',
  `se_procurement_under_process_amt` double DEFAULT NULL COMMENT 'Procurement Under Process (Amount in Rs)',
  `se_utilisation_plan_of_remaining_funds` double DEFAULT NULL COMMENT 'Utilisation Plan of Remaining Funds (In Rs)',
  `se_funds_requirement_from_approved_budget` double DEFAULT NULL COMMENT 'Funds requirement/ Excess Apart From Approved Budget in Column III(In Rs)',
  `se_remarks` text DEFAULT NULL COMMENT 'Sports Equipment',
  `sse_ncoe_cost` double DEFAULT NULL COMMENT 'Sports Science Equipment',
  `sse_stc_cost` double DEFAULT NULL COMMENT 'Sports Science Equipment',
  `sse_total_cost` double DEFAULT NULL COMMENT 'Sports Science Equipment',
  `sse_amt_recive_from_hq` double DEFAULT NULL COMMENT 'Sports Science Equipment',
  `sse_amt_incurred_on_procurement_of_equipment` double DEFAULT NULL COMMENT 'Sports Science Equipment',
  `sse_procurement_under_process_amt` double DEFAULT NULL COMMENT 'Sports Science Equipment',
  `sse_utilisation_plan_of_remaining_funds` double DEFAULT NULL COMMENT 'Sports Science Equipment',
  `sse_funds_requirement_from_approved_budget` double DEFAULT NULL COMMENT 'Sports Science Equipment',
  `sse_remarks` text DEFAULT NULL COMMENT 'Sports Science Equipment',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_for` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procurement_second_forms`
--

INSERT INTO `procurement_second_forms` (`id`, `project_center_id`, `template_id`, `rc_id`, `se_ncoe_cost`, `se_stc_cost`, `se_total_cost`, `se_amt_recive_from_hq`, `se_amt_incurred_on_procurement_of_equipment`, `se_procurement_under_process_amt`, `se_utilisation_plan_of_remaining_funds`, `se_funds_requirement_from_approved_budget`, `se_remarks`, `sse_ncoe_cost`, `sse_stc_cost`, `sse_total_cost`, `sse_amt_recive_from_hq`, `sse_amt_incurred_on_procurement_of_equipment`, `sse_procurement_under_process_amt`, `sse_utilisation_plan_of_remaining_funds`, `sse_funds_requirement_from_approved_budget`, `sse_remarks`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_for`) VALUES
(1, 3014, 1, NULL, 2.03, 3.09, 5.119999999999999, 1.29, 1.86, 0.29, 0, 0, 'Non consumableequipments of worth 2.89 to be procured by lead RD', 1.35, 0.5, 1.85, 0.64, 0.92, 0.93, 0, 0, 'Fund required as per order', '2022-11-22 23:47:11', '2022-11-22 23:47:11', NULL, 2517, NULL, NULL, NULL),
(2, 2517, 1, NULL, 2.03, 3.09, 5.119999999999999, 1.29, 1.86, 0.29, 0, 0, 'Non consumable equipment of worth Rs 2.89 cr to be procured by lead RD', 1.35, 0.5, 1.85, 0.64, 0.92, 0.93, 0, 0, 'Fund required as per order placed', '2022-11-23 01:08:07', '2022-11-23 01:08:07', NULL, 2517, NULL, NULL, NULL),
(3, 3012, 1, NULL, 1.5, 0.75, 2.25, NULL, NULL, 2.25, NULL, NULL, 'Supply order issued', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-24 00:50:58', '2022-11-24 00:50:58', NULL, 2523, NULL, NULL, NULL),
(4, 3019, 1, NULL, 2.51, 1.16, 3.67, 1.96, 0.43, NULL, NULL, NULL, NULL, 0.18, 0.07, 0.25, 0.07, 0.07, NULL, NULL, NULL, NULL, '2022-11-29 06:15:57', '2022-11-29 00:45:57', NULL, 2515, 2515, NULL, NULL),
(5, 3009, 1, NULL, 1.58, 1.95, 3.5300000000000002, 0, 19853000, 0, 0, 0, 'IN PROCESS', 0.26, 0.15, 0.41000000000000003, 0, 138875, 153000, 0, 0, 'in Process', '2022-11-29 02:15:50', '2022-11-29 02:15:50', NULL, 2519, NULL, NULL, NULL),
(6, 3020, 1, NULL, 1.25, 0.46, 1.71, 2.56, 2800000, 23200000, 0, 0, 'NIL', 1.65, 0, 1.65, 0.44, 2700000, 5000000, 0, 0, 'NIL', '2022-11-30 07:51:46', '2022-11-30 02:21:46', NULL, 2514, 2514, NULL, NULL),
(7, 3017, 1, NULL, 9820000, 0, 9820000, 9820000, NULL, NULL, NULL, NULL, '\"1.Rs.2 crore sanctioned  for Procurement of Ammunition and Shooting Specific Consummables. Supply Order placed with NRAI With 19223798/- on  05.08.2022 for a epriod of 06 months aganst Rs.4.00 Crores alloted for 2022-23  2. Shooting jackets with trousers : with esttimated Value of Rs.16,21,850/-( For 28 Rifle Athletes) BID Floated on 27-10-2022 BID Opening on 17-11-2022  3. Procurement of shooting specific shoes and Glasses:(For 40  Pistol AThletes) APPROXIMATE  AMOUNT  Shooting Shoes  12 LAKHS And 24 Lakhs for  Shooting Glasses) Per Athlete :60000/- for Shooting Glasses and 30000/- fo4r Shooting Specific Shoes.  Specification finalized. Estimate finalized. BID template prepared. Bid floating approval to be taken.  \"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-30 05:08:35', '2022-11-30 05:08:35', NULL, 5924, NULL, NULL, NULL),
(8, 2520, 1, NULL, 5141268, 1199000, 6340268, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-01 07:42:54', '2022-12-01 07:42:54', NULL, 2520, NULL, NULL, NULL),
(9, 2999, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, '0', '2022-12-01 07:47:09', '2022-12-01 07:47:09', NULL, 2524, NULL, NULL, NULL),
(10, 3013, 1, NULL, 26500000, 0, 26500000, 0, 0, 7650000, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2022-12-01 14:53:14', '2022-12-01 09:23:14', NULL, 5924, 5924, NULL, NULL),
(11, 3009, 8, 2519, 12, 1212, 133, 212, 121, 212, 121, 2112, '1212', 1212, 121, 1333, 212, 121, 21, 21, 21, '2121', '2022-12-28 08:18:27', '2022-12-28 08:18:27', NULL, 2519, NULL, NULL, 3009),
(12, 3009, 9, 2519, 12, 1212, 133, 212, 121, 212, 121, 2112, '1212', 1212, 121, 1333, 212, 121, 21, 21, 21, '2121', '2022-12-28 08:20:20', '2022-12-28 08:20:20', NULL, 2519, NULL, NULL, 3009),
(13, 3015, 8, 2522, 2212, 12, 2213, 2121, 21, 2121, 21, 21, '121', 212, 121, 333, 212, 12, 121, 2121, 656, '565', '2022-12-29 03:19:45', '2022-12-29 03:19:45', NULL, 2522, NULL, NULL, 3015),
(14, 3015, 9, 2522, 2212, 12, 2213, 2121, 21, 2121, 21, 21, '121', 212, 121, 333, 212, 12, 121, 2121, 656, '565', '2022-12-29 08:51:31', '2022-12-29 03:21:31', '2022-12-29 03:21:31', 2522, NULL, NULL, 3015),
(15, 3015, 9, 2522, 2212, 12, 2213, 2121, 21, 2121, 21, 21, '121', 212, 121, 333, 212, 12, 121, 2121, 656, '565', '2022-12-29 03:21:31', '2022-12-29 03:21:31', NULL, 2522, NULL, NULL, 3015);

-- --------------------------------------------------------

--
-- Table structure for table `procurement_services`
--

CREATE TABLE `procurement_services` (
  `id` bigint(20) NOT NULL,
  `project_center_id` bigint(20) DEFAULT NULL,
  `title` text NOT NULL,
  `expiry_date_of_existing_contract` date NOT NULL,
  `existing_contract_value` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_for` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procurement_services`
--

INSERT INTO `procurement_services` (`id`, `project_center_id`, `title`, `expiry_date_of_existing_contract`, `existing_contract_value`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_by`, `deleted_at`, `created_for`) VALUES
(1, 3010, 'HORTICULTURE MANPOWER', '2024-02-29', 6361070, 1, 2518, NULL, '2022-11-24 05:51:18', '2022-11-24 05:51:18', NULL, NULL, NULL),
(2, 3010, 'Security manpower services', '2023-01-31', 8505071, 1, 2518, NULL, '2022-11-24 06:15:51', '2022-11-24 06:15:51', NULL, NULL, NULL),
(3, 3010, 'Housekeeping Staff', '2024-01-31', 7766759, 1, 2518, NULL, '2022-11-24 06:16:52', '2022-11-24 06:16:52', NULL, NULL, NULL),
(4, 3010, 'Manpower  Outsourcing Services', '2024-01-31', 8879852, 1, 2518, NULL, '2022-11-24 06:18:05', '2022-11-24 06:18:05', NULL, NULL, NULL),
(5, 3010, 'Mess Manpower Outsourcing Services for NCOE Kolkata and NCOE Jagatpur', '2024-01-31', 7139807, 1, 2518, NULL, '2022-11-24 07:02:40', '2022-11-24 07:02:40', NULL, NULL, NULL),
(6, 3012, '7 MTS', '2023-04-10', 2102504, 1, 2523, NULL, '2022-11-28 00:52:41', '2022-11-28 00:52:41', NULL, NULL, NULL),
(7, 3009, 'Installation & Providing of  CCTV cameras', '2022-02-03', 10.5, 1, 2519, NULL, '2022-11-29 00:43:53', '2022-11-29 00:43:53', NULL, NULL, NULL),
(8, 3009, 'Security manpower', '2022-11-20', 115, 1, 2519, NULL, '2022-11-29 00:44:27', '2022-11-29 00:44:27', NULL, NULL, NULL),
(9, 2514, 'Office Staff (DEO\'s, JA\'s, Wardens, Drivers & Electricians)', '2023-07-31', 14867336.33, 1, 2514, 2514, '2022-11-29 07:37:54', '2022-11-29 02:07:54', NULL, NULL, NULL),
(10, 2514, 'Horticulture', '2023-03-31', 4252326.59, 1, 2514, NULL, '2022-11-29 02:07:48', '2022-11-29 02:07:48', NULL, NULL, NULL),
(11, 2514, 'Housekeeping', '2023-03-31', 7874335.44, 1, 2514, NULL, '2022-11-29 02:08:20', '2022-11-29 02:08:20', NULL, NULL, NULL),
(12, 2514, 'Mess', '2023-03-31', 7332807.3, 1, 2514, NULL, '2022-11-29 02:08:44', '2022-11-29 02:08:44', NULL, NULL, NULL),
(13, 3019, 'Mess Services for STC Jabalpur, STC Dhar, STC Raipur & STC Rajnandgaon under SAI CRC Bhopal', '2022-12-31', 2.5, 1, 2515, 2515, '2022-11-29 11:07:35', '2022-11-29 05:37:35', NULL, NULL, NULL),
(14, 3017, 'Security Contract', '2023-03-03', 17010705, 1, 5924, NULL, '2022-11-30 02:36:34', '2022-11-30 02:36:34', NULL, NULL, NULL),
(15, 3017, 'House keeping', '2023-03-04', 7313204, 1, 5924, NULL, '2022-11-30 02:37:23', '2022-11-30 02:37:23', NULL, NULL, NULL),
(16, 3017, 'Horticulture Services', '2023-03-04', 5200000, 1, 5924, NULL, '2022-11-30 02:39:52', '2022-11-30 02:39:52', NULL, NULL, NULL),
(17, 3017, 'CAMC for SIUS Ascor Electronic Scoring Target System (10M, 25M, 50M & Final Range', '2024-11-15', 48668290, 1, 5924, 5924, '2022-11-30 08:46:51', '2022-11-30 03:16:51', NULL, NULL, NULL),
(18, 3017, 'CAMC for Laporte, Trap and Skeet and Score Board installed at Dr. KSSR', '2023-09-30', 9289181, 1, 5924, NULL, '2022-11-30 02:41:45', '2022-11-30 02:41:45', NULL, NULL, NULL),
(19, 3017, 'Manpower (Cook-3 & Helper -3 for Hostel', '2023-03-31', 2038504, 1, 5924, NULL, '2022-11-30 02:42:18', '2022-11-30 02:42:18', NULL, NULL, NULL),
(20, 3017, 'Supply of Fruits and Vegetable', '2023-01-09', 3420480, 1, 5924, NULL, '2022-11-30 02:42:46', '2022-11-30 02:42:46', NULL, NULL, NULL),
(21, 3017, 'Supply of Non Veg Item', '2022-12-09', 4005000, 1, 5924, NULL, '2022-11-30 02:43:17', '2022-11-30 02:43:17', NULL, NULL, NULL),
(22, 2517, 'Lady Warden', '2023-05-31', 779275.11, 1, 2517, NULL, '2022-11-30 05:12:00', '2022-11-30 05:12:00', NULL, NULL, NULL),
(23, 2517, 'Watchman/ Security Guard', '2023-03-01', 13345413.12, 1, 2517, 2517, '2022-11-30 12:45:47', '2022-11-30 07:15:47', NULL, NULL, NULL),
(24, 2517, 'Cleaning Staff/Washer (Mess)', '2023-03-11', 2172587.51, 1, 2517, NULL, '2022-11-30 05:13:03', '2022-11-30 05:13:03', NULL, NULL, NULL),
(25, 2517, 'Safai Karamchari', '2023-02-28', 5336168.76, 1, 2517, 2517, '2022-11-30 12:46:23', '2022-11-30 07:16:23', NULL, NULL, NULL),
(26, 2517, 'HORTICULTURE SERVICE', '2023-01-31', 2495063, 1, 2517, NULL, '2022-11-30 05:13:49', '2022-11-30 05:13:49', NULL, NULL, NULL),
(27, 2517, 'Security Supervisor RC GHY', '2023-09-19', 287988.29, 1, 2517, NULL, '2022-11-30 05:14:21', '2022-11-30 05:14:21', NULL, NULL, NULL),
(28, 2517, 'Manpower admin DEO', '2023-02-28', 327155.27, 1, 2517, 2517, '2022-11-30 12:46:39', '2022-11-30 07:16:39', NULL, NULL, NULL),
(29, 2517, 'Manpower outsource finance accounts', '2023-02-28', 2120344.2, 1, 2517, 2517, '2022-11-30 12:47:08', '2022-11-30 07:17:08', NULL, NULL, NULL),
(30, 2517, 'Cycling Techniciian', '2022-06-30', 1286482, 1, 2517, NULL, '2022-11-30 05:15:41', '2022-11-30 05:15:41', NULL, NULL, NULL),
(31, 3012, '1 Account consultant', '2023-05-03', 735919.2, 1, 2523, NULL, '2022-12-01 02:49:28', '2022-12-01 02:49:28', NULL, NULL, NULL),
(32, 3012, '1 IT Assistant', '2023-08-28', 570484, 1, 2523, NULL, '2022-12-01 02:49:28', '2022-12-01 02:49:28', NULL, NULL, NULL),
(33, 3007, 'Security Service at SAI, RC, Kandivali, Mumbai', '2023-01-04', 8256986, 1, 2520, 2520, '2022-12-01 11:43:06', '2022-12-01 06:13:06', NULL, NULL, NULL),
(34, 2999, 'Horticulture / Mess Catering Staff (Unskilled Labour', '2023-06-30', 16500000, 1, 2524, NULL, '2022-12-01 06:24:15', '2022-12-01 06:24:15', NULL, NULL, NULL),
(35, 2999, 'Skilled/Highly skilled  staff only', '2023-07-31', 18632770, 1, 2524, NULL, '2022-12-01 06:24:51', '2022-12-01 06:24:51', NULL, NULL, NULL),
(36, 2999, 'Security Manpower contract', '2024-01-31', 16150000, 1, 2524, NULL, '2022-12-01 06:25:14', '2022-12-01 06:25:14', NULL, NULL, NULL),
(37, 2999, 'Cleaning Staff', '2023-01-31', 7294000, 1, 2524, NULL, '2022-12-01 06:25:44', '2022-12-01 06:25:44', NULL, NULL, NULL),
(38, 2999, '72,94,000', '2022-10-31', 2500000, 1, 2524, NULL, '2022-12-01 06:26:29', '2022-12-01 06:26:29', NULL, NULL, NULL),
(39, 3007, 'Manpower Service at SAI, RC, Kandivali, Mumbai', '2023-10-05', 4909160.7, 1, 2520, NULL, '2022-12-01 06:52:12', '2022-12-01 06:52:12', NULL, NULL, NULL),
(40, 3007, 'Housekeeping Service at SAI, RC, Kandivali, Mumbai', '2006-09-23', 4608030.34, 1, 2520, NULL, '2022-12-01 06:52:35', '2022-12-01 06:52:35', NULL, NULL, NULL),
(41, 3007, 'Warden Service at SAI, RC, Kandivali, Mumbai', '2006-09-23', 1427583.02, 1, 2520, NULL, '2022-12-01 06:52:57', '2022-12-01 06:52:57', NULL, NULL, NULL),
(42, 3007, 'MTS Service at SAI, RC, Kandivali, Mumbai', '2006-09-23', 2003070.45, 1, 2520, NULL, '2022-12-01 06:53:18', '2022-12-01 06:53:18', NULL, NULL, NULL),
(43, 3013, 'Security', '2023-09-01', 16035764.94, 1, 5924, NULL, '2022-12-01 09:36:46', '2022-12-01 09:36:46', NULL, NULL, NULL),
(44, 3013, 'Housekeeping Services', '2023-09-30', 13736361.4, 1, 5924, NULL, '2022-12-01 09:37:33', '2022-12-01 09:37:33', NULL, NULL, NULL),
(45, 3013, 'Horticulture Services at IGSC', '2023-07-31', 5752593.6, 1, 5924, NULL, '2022-12-01 09:38:42', '2022-12-01 09:38:42', NULL, NULL, NULL),
(46, 3013, 'Mess Manpower', '2023-05-31', 3813978.27, 1, 5924, NULL, '2022-12-01 09:39:32', '2022-12-01 09:39:32', NULL, NULL, NULL),
(47, 3013, 'Admin Manpower', '2023-01-31', 1683905.1, 1, 5924, NULL, '2022-12-01 09:40:10', '2022-12-01 09:40:10', NULL, NULL, NULL),
(48, 3013, 'Fruits & Vegetables', '2022-11-30', 7615382.1, 1, 5924, NULL, '2022-12-01 09:41:38', '2022-12-01 09:41:38', NULL, NULL, NULL),
(49, 3013, 'Non Veg', '2022-11-30', 3075679, 1, 5924, NULL, '2022-12-01 09:42:29', '2022-12-01 09:42:29', NULL, NULL, NULL),
(50, 3013, 'Dry Ration', '2022-12-31', 7641400, 1, 5924, NULL, '2022-12-01 09:43:01', '2022-12-01 09:43:01', NULL, NULL, NULL),
(51, 3013, 'Dairy items', '2022-12-31', 4393200, 1, 5924, NULL, '2022-12-01 09:43:21', '2022-12-01 09:43:21', NULL, NULL, NULL),
(52, 3021, 'Athlete Management System', '2022-11-16', 198000, 1, 2520, NULL, '2022-12-02 02:31:21', '2022-12-02 02:31:21', NULL, NULL, NULL),
(53, 3021, 'procurement of warm up shoes', '2022-08-26', 904650, 1, 2520, NULL, '2022-12-02 02:34:02', '2022-12-02 02:34:02', NULL, NULL, NULL),
(54, 3021, 'Kitchen equipment', '2022-11-04', 96500, 1, 2520, NULL, '2022-12-02 02:36:41', '2022-12-02 02:36:41', NULL, NULL, NULL),
(55, 3003, 'Housekeeping', '2023-08-15', 0, 1, 2521, NULL, '2022-12-06 04:46:04', '2022-12-06 04:46:04', NULL, NULL, NULL),
(56, 3003, 'Horticulture', '2023-06-30', 0, 1, 2521, NULL, '2022-12-06 04:46:04', '2022-12-06 04:46:04', NULL, NULL, NULL),
(57, 3003, 'Security', '2023-02-06', 0, 1, 2521, NULL, '2022-12-06 04:46:04', '2022-12-06 04:46:04', NULL, NULL, NULL),
(58, 3003, 'Manpower', '2022-08-15', 0, 1, 2521, NULL, '2022-12-06 04:46:04', '2022-12-06 04:46:04', NULL, NULL, NULL),
(59, 3009, 'testing_services', '2022-12-31', 2250, 1, 2519, NULL, '2022-12-29 02:42:00', '2022-12-29 02:42:00', NULL, NULL, 3009);

-- --------------------------------------------------------

--
-- Table structure for table `procurement_service_forms`
--

CREATE TABLE `procurement_service_forms` (
  `id` bigint(20) NOT NULL,
  `project_center_id` bigint(20) DEFAULT NULL,
  `template_id` bigint(20) NOT NULL,
  `rc_id` bigint(20) DEFAULT NULL,
  `title_id` bigint(20) NOT NULL,
  `expiry_date_of_existing_contract` date DEFAULT NULL,
  `value_of_existing_contract` double DEFAULT NULL,
  `estimated_value_of_new_tender` double DEFAULT NULL,
  `tender_type` enum('open','limited','pac','') DEFAULT NULL,
  `floating_tender_date` date DEFAULT NULL,
  `opening_tender_date` date DEFAULT NULL,
  `tech_eval_date` date DEFAULT NULL,
  `final_eval_date` date DEFAULT NULL,
  `award_of_work_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_for` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procurement_service_forms`
--

INSERT INTO `procurement_service_forms` (`id`, `project_center_id`, `template_id`, `rc_id`, `title_id`, `expiry_date_of_existing_contract`, `value_of_existing_contract`, `estimated_value_of_new_tender`, `tender_type`, `floating_tender_date`, `opening_tender_date`, `tech_eval_date`, `final_eval_date`, `award_of_work_date`, `remarks`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`, `created_for`) VALUES
(1, 3010, 1, NULL, 1, '2024-02-29', 6361070, 7000000, 'open', '2023-11-29', '2023-12-09', '2023-12-16', '2023-12-23', '2023-12-30', NULL, 1, 2518, 2518, NULL, '2022-11-24 06:51:34', '2022-11-27 23:57:09', NULL, NULL),
(2, 3010, 1, NULL, 2, '2023-01-31', 8505071, 9100000, 'open', '2022-10-31', '2022-11-11', '2022-11-18', '2022-11-25', '2022-12-02', NULL, 1, 2518, 2518, NULL, '2022-11-24 06:59:04', '2022-11-27 23:57:09', NULL, NULL),
(3, 3010, 1, NULL, 3, '2024-01-31', 7766759, 8500000, 'open', '2023-10-31', '2023-12-11', '2023-12-18', '2023-12-25', '2024-01-02', NULL, 1, 2518, 2518, 2518, '2022-11-24 07:00:47', '2022-11-27 23:56:16', '2022-11-27 23:56:16', NULL),
(4, 3010, 1, NULL, 4, '2024-01-31', 8879852, 9500000, 'open', '2023-10-31', '2023-12-11', '2023-12-18', '2023-12-25', '2024-01-02', NULL, 1, 2518, NULL, 2518, '2022-11-24 07:01:37', '2022-11-26 03:43:01', '2022-11-26 03:43:01', NULL),
(5, 3010, 1, NULL, 3, '2024-01-31', 7766759, 8500000, 'open', '2023-10-31', '2023-11-11', '2023-11-18', '2023-11-25', '2023-12-02', NULL, 1, 2518, 2518, NULL, '2022-11-26 03:47:55', '2022-11-27 23:57:09', NULL, NULL),
(6, 3010, 1, NULL, 5, '2024-01-31', 7139807, 9000000, 'open', '2023-10-31', '2023-11-11', '2023-11-18', '2023-11-25', '2023-12-02', NULL, 1, 2518, 2518, NULL, '2022-11-26 03:47:55', '2022-11-27 23:57:09', NULL, NULL),
(7, 3010, 1, NULL, 4, '2024-01-31', 8879852, 950000, 'open', '2023-10-31', '2023-11-11', '2023-11-18', '2023-11-25', '2023-12-02', NULL, 1, 2518, NULL, NULL, '2022-11-27 23:57:09', '2022-11-27 23:57:09', NULL, NULL),
(8, 2514, 1, NULL, 9, '2023-07-31', 14867336.33, NULL, 'open', '2022-06-29', '2022-07-13', '2022-07-15', '2022-07-25', '2022-08-01', 'Nil', 1, 2514, 2514, NULL, '2022-11-29 02:11:35', '2022-11-29 02:23:48', NULL, NULL),
(9, 2514, 1, NULL, 10, '2023-03-31', 4252326.59, NULL, 'open', '2022-02-12', '2022-02-22', '2022-02-24', '2022-03-14', '2022-03-28', 'Nil', 1, 2514, 2514, NULL, '2022-11-29 02:12:55', '2022-11-29 02:23:48', NULL, NULL),
(10, 2514, 1, NULL, 11, '2023-03-31', 7874335.44, NULL, 'open', '2022-02-14', '2022-03-21', '2022-03-22', '2022-03-25', '2022-03-28', 'Nil', 1, 2514, 2514, NULL, '2022-11-29 02:14:38', '2022-11-29 02:23:48', NULL, NULL),
(11, 2514, 1, NULL, 12, '2023-03-31', 7332807.3, NULL, 'open', '2022-02-12', '2022-02-22', '2022-02-24', '2022-03-14', '2022-03-21', 'Nil', 1, 2514, 2514, NULL, '2022-11-29 02:16:38', '2022-11-29 02:23:48', NULL, NULL),
(12, 3019, 1, NULL, 13, '2022-12-31', 2.5, 2.5, 'open', '2022-11-14', '2022-12-06', NULL, NULL, NULL, '1. The previous tender has been cancelled due to code of integrity breach of the service provider 2. The technical bids of re-tender will be opened on 06.12.22', 0, 2515, NULL, NULL, '2022-11-29 05:39:47', '2022-11-29 05:39:47', NULL, NULL),
(13, 3017, 1, NULL, 14, '2023-03-03', 17010705, 1800000, 'open', '2022-01-06', '2022-01-27', '2022-02-15', '2022-02-18', '2022-04-04', NULL, 1, 5924, 5924, NULL, '2022-11-30 03:08:37', '2022-11-30 03:53:49', NULL, NULL),
(14, 3017, 1, NULL, 16, '2023-03-04', 5200000, 5500000, 'open', '2022-01-13', '2022-02-03', '2022-02-22', '2022-02-25', '2022-03-07', NULL, 1, 5924, 5924, NULL, '2022-11-30 03:10:27', '2022-11-30 03:53:49', NULL, NULL),
(15, 3017, 1, NULL, 19, '2023-03-31', 2038504, 2200000, 'open', '2022-02-14', '2022-02-24', '2022-03-22', '2022-03-24', '2022-04-01', NULL, 1, 5924, 5924, NULL, '2022-11-30 03:12:39', '2022-11-30 03:53:49', NULL, NULL),
(16, 3017, 1, NULL, 15, '2023-03-04', 7313204, 7500000, 'open', '2022-03-10', '2022-03-22', '2022-03-25', '2022-03-29', '2022-04-05', NULL, 1, 5924, 5924, NULL, '2022-11-30 03:15:14', '2022-11-30 03:53:50', NULL, NULL),
(17, 3017, 1, NULL, 21, '2022-12-09', 4005000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 5924, NULL, 5924, '2022-11-30 03:53:50', '2022-11-30 03:54:42', '2022-11-30 03:54:42', NULL),
(18, 2517, 1, NULL, 27, '2023-09-19', 287988.29, 287988.29, 'open', '2022-08-24', '2022-09-03', '2022-09-07', '2022-09-09', '2022-09-14', NULL, 1, 2517, 2517, NULL, '2022-11-30 06:17:14', '2022-11-30 07:24:13', NULL, NULL),
(19, 3009, 1, NULL, 7, '2022-02-03', 10.5, 10.5, 'open', '2021-11-23', '2021-12-03', '2021-12-06', '2021-12-17', '2021-12-20', 'Work awarded through GeM to M/s EWIT infotech Pvt Ltd. 1500 mtr additional CAT-6 cable purchased. 44/45 Nos camera functional. After several grant of time, but failed to complete work, agency are called to survey & complete the remaining works but quoted higher rates, not approved, agency Ewit grant mercy grant to completed the work and submitted the affidavit to complete the remaining work within 20 Days', 1, 2519, 2519, NULL, '2022-11-30 06:26:56', '2022-11-30 06:28:48', NULL, NULL),
(20, 3009, 1, NULL, 8, '2022-11-20', 115, 115, 'open', '2022-09-30', '2022-10-20', NULL, NULL, NULL, 'Tender uploaded on GeM', 0, 2519, NULL, NULL, '2022-11-30 06:28:48', '2022-11-30 06:28:48', NULL, NULL),
(21, 2517, 1, NULL, 28, '2022-11-30', 327155.27, 327155.27, 'open', '2021-10-29', '2021-11-08', '2022-11-16', '2022-11-23', '2022-11-24', NULL, 1, 2517, 2517, 2517, '2022-11-30 07:09:48', '2022-11-30 07:21:28', '2022-11-30 07:21:28', NULL),
(22, 2517, 1, NULL, 25, '2023-02-28', 5336168.76, 5336168.76, 'open', '2021-10-27', '2021-11-10', '2021-11-16', '2021-11-24', '2021-11-25', NULL, 1, 2517, 2517, NULL, '2022-11-30 07:11:53', '2022-11-30 07:24:13', NULL, NULL),
(23, 2517, 1, NULL, 29, '2022-11-30', 2120344.2, 2120344.2, 'open', '2021-10-27', '2021-11-10', '2021-11-15', '2021-11-24', '2021-11-25', NULL, 1, 2517, 2517, 2517, '2022-11-30 07:12:50', '2022-11-30 07:21:40', '2022-11-30 07:21:40', NULL),
(24, 2517, 1, NULL, 23, '2022-12-02', 13345413.12, 13345413.12, 'open', '2021-10-27', '2021-11-10', '2021-11-18', '2021-11-24', '2021-11-25', NULL, 1, 2517, NULL, 2517, '2022-11-30 07:14:06', '2022-11-30 07:19:23', '2022-11-30 07:19:23', NULL),
(25, 2517, 1, NULL, 23, '2023-03-01', 13345413.12, 13345413.12, 'open', '2021-10-27', '2021-11-10', '2021-11-18', '2021-11-24', '2021-11-25', NULL, 1, 2517, 2517, NULL, '2022-11-30 07:21:13', '2022-11-30 07:24:13', NULL, NULL),
(26, 2517, 1, NULL, 28, '2023-02-28', 327155.27, 327155.27, 'open', '2021-10-29', '2021-11-08', '2021-11-16', '2021-11-23', '2021-11-24', NULL, 1, 2517, 2517, NULL, '2022-11-30 07:23:08', '2022-11-30 07:24:13', NULL, NULL),
(27, 2517, 1, NULL, 29, '2023-02-28', 2120344.2, 2120344.2, 'open', '2021-10-27', '2021-11-10', '2021-11-15', '2021-11-24', '2021-11-25', NULL, 1, 2517, NULL, NULL, '2022-11-30 07:24:13', '2022-11-30 07:24:13', NULL, NULL),
(28, 3012, 1, NULL, 6, '2023-04-10', 2102504, 2102504.04, 'open', '2022-03-14', '2022-04-09', '2022-04-10', '2022-04-12', '2022-09-12', NULL, 1, 2523, NULL, NULL, '2022-12-01 02:56:31', '2022-12-01 02:56:31', NULL, NULL),
(29, 3012, 1, NULL, 31, '2023-05-03', 735919.2, 735919.2, 'open', '2022-04-07', '2022-05-02', '2022-05-03', '2022-05-04', '2022-05-05', NULL, 1, 2523, NULL, NULL, '2022-12-01 02:56:31', '2022-12-01 02:56:31', NULL, NULL),
(30, 3012, 1, NULL, 32, '2023-08-28', 570484, 604568, 'open', '2022-08-10', '2022-08-11', '2022-08-12', '2022-08-14', '2022-08-15', NULL, 1, 2523, NULL, NULL, '2022-12-01 02:56:31', '2022-12-01 02:56:31', NULL, NULL),
(31, 3007, 1, NULL, 33, '2023-01-04', 8256986, NULL, 'open', NULL, NULL, NULL, NULL, NULL, 'GEM', 0, 2520, 2520, NULL, '2022-12-01 07:00:13', '2022-12-01 07:27:56', NULL, NULL),
(32, 3007, 1, NULL, 39, '2023-10-05', 4909160.7, NULL, 'open', NULL, NULL, NULL, NULL, NULL, 'GEM', 0, 2520, 2520, NULL, '2022-12-01 07:05:26', '2022-12-01 07:27:56', NULL, NULL),
(33, 3007, 1, NULL, 40, '2006-09-23', 4608030.34, NULL, 'open', NULL, NULL, NULL, NULL, NULL, 'GEM', 0, 2520, 2520, NULL, '2022-12-01 07:27:28', '2022-12-01 07:27:56', NULL, NULL),
(34, 3007, 1, NULL, 41, '2006-09-23', 1427583.02, NULL, 'open', NULL, NULL, NULL, NULL, NULL, 'GEM', 0, 2520, 2520, NULL, '2022-12-01 07:27:42', '2022-12-01 07:27:56', NULL, NULL),
(35, 3007, 1, NULL, 42, '2006-09-23', 2003070.45, NULL, 'open', NULL, NULL, NULL, NULL, NULL, 'GEM', 0, 2520, NULL, NULL, '2022-12-01 07:27:56', '2022-12-01 07:27:56', NULL, NULL),
(36, 2999, 1, NULL, 35, '2023-07-31', 18632770, 16500000, 'limited', '1970-01-01', '2022-12-01', '2022-12-01', '2022-12-01', '2022-12-01', 'The fresh contract has been awarded to M/s AMBUSH SECURITY PRIVATE LIMITED for a period of 1 year  starting  from 01.07.2022', 1, 2524, 2524, NULL, '2022-12-01 07:31:47', '2022-12-01 07:41:26', NULL, NULL),
(37, 2999, 1, NULL, 36, '2024-01-31', 16150000, 16150000, 'open', '2021-12-30', '2022-01-10', '2022-01-10', '2022-01-12', '2022-01-14', 'The fresh contract has been awarded to the DGR Sponsored  agency w.e.f 01-2-2022 for  a period of  Two years  as per guidelines of the DGR.', 1, 2524, NULL, NULL, '2022-12-01 07:41:26', '2022-12-01 07:41:26', NULL, NULL),
(38, 2999, 1, NULL, 37, '2023-01-31', 7294000, 7294000, 'open', '2021-10-28', '2021-11-17', '2021-11-30', '2021-12-10', '2021-12-16', 'The fresh  contract has been awarded w.e.f 01-2-2022 for period of One year', 1, 2524, NULL, NULL, '2022-12-01 07:41:26', '2022-12-01 07:41:26', NULL, NULL),
(39, 2999, 1, NULL, 38, '2022-10-31', 2500000, 2500000, 'open', '2022-09-05', '2022-09-20', '2022-09-22', '2022-09-28', '2022-10-04', 'NIL', 1, 2524, NULL, NULL, '2022-12-01 07:41:26', '2022-12-01 07:41:26', NULL, NULL),
(40, 3009, 8, 2519, 8, '2022-11-20', 115, 2222, 'pac', '2022-12-01', '2022-12-08', '2022-12-14', '2022-12-15', '2022-12-18', 'testing', 1, 2519, NULL, NULL, '2022-12-28 08:20:03', '2022-12-28 08:20:03', NULL, 3009),
(41, 3009, 9, 2519, 8, '2022-11-20', 115, 2222, 'pac', '2022-12-01', '2022-12-08', '2022-12-14', '2022-12-15', '2022-12-18', 'testing', 1, 2519, NULL, NULL, '2022-12-28 08:20:20', '2022-12-28 08:20:20', NULL, 3009);

-- --------------------------------------------------------

--
-- Table structure for table `procurement_third_forms`
--

CREATE TABLE `procurement_third_forms` (
  `id` bigint(20) NOT NULL,
  `project_center_id` bigint(20) DEFAULT NULL,
  `template_id` bigint(20) NOT NULL,
  `rc_id` bigint(20) DEFAULT NULL,
  `title_id` bigint(20) NOT NULL,
  `specs_finalized` enum('yes','no','','') DEFAULT NULL,
  `tender_type` enum('open','limited','pac','') DEFAULT NULL,
  `estimated_value` double DEFAULT NULL COMMENT 'in lakh',
  `specs_finalization_date` date DEFAULT NULL,
  `floating_tender_date` date DEFAULT NULL,
  `opening_tender_date` date DEFAULT NULL,
  `tech_eval_date` date DEFAULT NULL,
  `final_eval_date` date DEFAULT NULL,
  `order_placement_date` date DEFAULT NULL,
  `tender_value` double DEFAULT NULL COMMENT 'in lakh',
  `remarks` text DEFAULT NULL,
  `budget_head` double DEFAULT NULL,
  `contract_amount` double DEFAULT NULL COMMENT 'inlakh',
  `issue_of_order_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `installation_date` date DEFAULT NULL,
  `satisfactory_certificate_receipt_date` date DEFAULT NULL,
  `invoice_receipt_date` date DEFAULT NULL,
  `approval_of_payment_date` date DEFAULT NULL,
  `payment_release_date` date DEFAULT NULL,
  `remarks_2` text DEFAULT NULL,
  `form_type` tinyint(4) DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_for` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procurement_third_forms`
--

INSERT INTO `procurement_third_forms` (`id`, `project_center_id`, `template_id`, `rc_id`, `title_id`, `specs_finalized`, `tender_type`, `estimated_value`, `specs_finalization_date`, `floating_tender_date`, `opening_tender_date`, `tech_eval_date`, `final_eval_date`, `order_placement_date`, `tender_value`, `remarks`, `budget_head`, `contract_amount`, `issue_of_order_date`, `delivery_date`, `installation_date`, `satisfactory_certificate_receipt_date`, `invoice_receipt_date`, `approval_of_payment_date`, `payment_release_date`, `remarks_2`, `form_type`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_for`) VALUES
(1, 2517, 1, NULL, 1, 'yes', 'limited', 22.43, '2021-12-14', '2022-06-23', '2022-06-24', '2022-06-27', '2022-06-28', '2022-06-29', 22.43, 'Order placed to TYKA. Partial order received', 36, 2242759.55, '2022-06-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(2, 2517, 1, NULL, 2, 'yes', 'limited', 3.97, '2021-12-14', '2022-07-07', '2022-07-08', '2022-07-09', '2022-07-11', '2022-07-12', 3.97, 'Order placed to TYKA. items not received', 36, 397427.44, '2022-07-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(3, 2517, 1, NULL, 3, 'yes', 'pac', 13, '2022-07-25', '2022-07-27', '2022-08-10', '2022-09-06', '2022-09-14', '2022-09-16', 12.95, 'Items received', 36, 1295896, '2022-09-16', '2022-10-21', '2022-10-26', '2022-10-28', '2022-10-31', '2022-11-02', '2022-11-04', NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(4, 2517, 1, NULL, 4, 'yes', 'limited', 3, '2021-12-14', '2022-07-28', '2022-07-29', '2022-08-05', '2022-08-08', '2022-08-10', 2.76, 'Items received', 36, 484000, '2022-08-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(5, 2517, 1, NULL, 5, 'yes', 'pac', 4.1, '2022-07-05', '2022-08-03', '2022-08-13', '2022-09-15', '2022-09-19', '2022-09-21', 4.4, 'Items not yet received', 36, 403100, '2022-09-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(6, 2517, 1, NULL, 6, 'yes', 'pac', 2.4, '2022-07-05', '2022-08-03', '2022-08-13', '2022-09-12', '2022-09-14', '2022-11-16', 2.43, 'Items received', 36, 240040, '2022-09-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(7, 2517, 1, NULL, 7, 'yes', 'open', 10, '2022-07-12', '2022-08-12', '2022-09-02', '2022-09-13', '2022-09-16', '2022-09-19', 7.2, 'Items received', 36, 722500, '2022-09-19', '2022-10-21', '2022-10-25', '2022-10-27', '2022-10-28', '2022-11-02', '2022-11-04', NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(8, 2517, 1, NULL, 8, 'yes', 'open', 5, '2022-08-05', '2022-08-23', '2022-09-05', '2022-09-15', '2022-09-16', '2022-09-17', 2.95, 'Items received', 36, 295755, '2022-09-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(9, 2517, 1, NULL, 9, 'yes', 'pac', 14, '2022-08-08', '2022-08-25', '2022-09-07', '2022-09-22', '2022-09-27', '2022-09-28', 13.95, 'Items not yet received', 36, 1395945, '2022-09-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(10, 2517, 1, NULL, 10, 'yes', 'pac', 4, '2022-08-26', '2022-09-08', '2022-09-17', '2022-10-03', '2022-10-10', '2022-10-11', 3.6, 'Items not yet received', 36, 360004, '2022-10-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(11, 2517, 1, NULL, 3, 'yes', 'pac', 13, '2022-07-27', '2022-07-29', '2022-08-10', '2022-09-05', '2022-09-15', '2022-09-16', 12.95, 'Items delivered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-24 11:36:15', '2022-11-24 06:06:15', '2022-11-24 06:06:15', 2517, 2517, 2517, NULL),
(12, 3012, 1, NULL, 22, 'yes', 'open', 150, '2022-07-05', '2022-07-08', '2022-07-18', '2022-07-19', '2022-07-21', '2022-07-22', 150, 'order placed', 36, 1500000, '2022-07-22', NULL, NULL, NULL, NULL, NULL, NULL, 'not yet received', 2, 1, '2022-12-01 08:14:36', '2022-12-01 02:44:36', NULL, 2523, 2523, NULL, NULL),
(13, 3012, 1, NULL, 24, 'yes', 'open', 75, '2022-07-05', '2022-07-08', '2022-07-19', '2022-07-20', '2022-07-22', '2022-07-24', 75, 'order placed', 36, 7500000, '2022-07-24', NULL, NULL, NULL, NULL, NULL, NULL, 'not yet received', 2, 1, '2022-12-01 08:14:37', '2022-12-01 02:44:37', NULL, 2523, 2523, NULL, NULL),
(14, 3012, 1, NULL, 27, 'yes', 'open', 30, '2022-07-12', '2022-07-14', '2022-07-21', '2022-07-29', '2022-08-01', '2022-08-03', 30, 'order placed', 36, 3000000, '2022-08-03', NULL, NULL, NULL, NULL, NULL, NULL, 'goods received', 2, 1, '2022-12-01 08:14:37', '2022-12-01 02:44:37', NULL, 2523, 2523, NULL, NULL),
(15, 3012, 1, NULL, 26, 'yes', 'open', 20, '2022-07-14', '2022-07-15', '2022-07-29', '2022-08-01', '2022-08-05', '2022-08-06', 20, 'order places', 36, 2000000, '2022-11-02', NULL, NULL, NULL, NULL, NULL, NULL, 'not received', 2, 1, '2022-12-01 08:14:37', '2022-12-01 02:44:37', NULL, 2523, 2523, NULL, NULL),
(16, 2517, 1, NULL, 11, 'yes', 'limited', 0.9, '2022-08-26', '2022-08-31', '2022-09-05', '2022-09-09', '2022-09-12', '2022-09-14', 0.867, 'Items received', 36, 86658, '2022-09-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(17, 2517, 1, NULL, 12, 'yes', 'pac', 21, '2022-08-05', '2022-08-24', '2022-09-14', '2022-10-19', '2022-10-26', '2022-10-29', 23, 'Items not yet received', 36, 2301493, '2022-10-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(18, 2517, 1, NULL, 28, 'yes', 'open', 50, '2022-06-06', '2022-06-28', '2022-07-19', '2022-07-26', '2022-07-28', '2022-07-29', 50, 'Items received', 37, 4966800, '2022-07-29', '2022-10-03', '2022-10-06', '2022-10-10', '2022-10-11', '2022-10-12', '2022-10-13', NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(19, 2517, 1, NULL, 29, 'yes', 'open', 14, '2022-06-16', '2022-08-05', '2022-08-16', '2022-08-26', '2022-08-30', '2022-08-31', 13.46, 'Items received', 36, 1335300, '2022-08-31', '2022-10-17', '2022-10-19', '2022-10-21', '2022-10-24', '2022-10-25', '2022-10-26', NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(20, 2517, 1, NULL, 30, 'yes', 'open', 28, '2022-06-10', '2022-06-16', '2022-07-07', '2022-07-26', '2022-07-27', '2022-07-28', 27.58, 'Items received', 36, 2668450, '2022-07-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(21, 2517, 1, NULL, 31, 'yes', 'open', 37, '2022-06-10', '2022-06-16', '2022-07-07', '2022-07-20', '2022-07-25', '2022-08-02', 36.25, 'Items received', 36, 3098400, '2022-08-02', '2022-10-17', '2022-10-20', '2022-10-21', '2022-10-24', '2022-10-25', '2022-10-26', NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(22, 2517, 1, NULL, 32, 'yes', 'open', 7, '2022-07-10', '2022-07-25', '2022-08-05', '2022-08-26', '2022-08-30', '2022-08-31', 6.7, 'Items received', 36, 669600, '2022-08-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(23, 2517, 1, NULL, 33, 'yes', 'pac', 16.5, '2022-07-10', '2022-07-15', '2022-07-29', '2022-08-03', '2022-09-12', '2022-09-16', 16.21, 'Items not received', 36, 1621100, '2022-09-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(24, 2517, 1, NULL, 34, 'yes', 'open', 2.8, '2022-07-10', '2022-07-29', '2022-08-08', '2022-08-26', '2022-08-30', '2022-08-31', 2.77, 'Items received', 36, 275576, '2022-08-31', '2022-10-18', '2022-10-21', '2022-10-24', '2022-10-25', '2022-10-28', '2022-10-29', NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(25, 2517, 1, NULL, 35, 'yes', 'open', 2.8, '2022-07-10', '2022-07-29', '2022-08-08', '2022-08-26', '2022-08-30', '2022-08-31', 2.8, 'Items received', 36, 278576, '2022-08-31', '2022-10-18', '2022-10-21', '2022-10-24', '2022-10-25', '2022-10-28', '2022-10-29', NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(26, 2517, 1, NULL, 36, 'yes', 'open', 3, '2022-07-19', '2022-07-27', '2022-08-08', '2022-08-26', '2022-08-30', '2022-08-31', 2.97, 'Items received', 36, 295678, '2022-08-31', '2022-10-18', '2022-10-21', '2022-10-24', '2022-10-25', '2022-10-28', '2022-10-29', NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(27, 2517, 1, NULL, 37, 'yes', 'open', 45, '2022-07-11', '2022-08-12', '2022-08-23', '2022-09-19', '2022-09-27', '2022-09-29', 39.2, 'Items not received', 36, 3923600, '2022-09-29', '2022-10-21', '2022-10-24', '2022-10-27', '2022-10-28', '2022-11-02', '2022-11-04', NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(28, 2517, 1, NULL, 38, 'yes', 'limited', 6, '2022-06-13', '2022-07-05', '2022-07-07', '2022-07-08', '2022-07-11', '2022-07-12', 5.68, 'Items received', 36, 568000, '2022-07-12', '2022-09-19', '2022-09-21', '2022-09-22', '2022-09-23', '2022-09-26', '2022-09-28', NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(29, 3004, 1, NULL, 13, 'yes', 'limited', 1.5, '2022-08-26', '2022-09-12', '2022-09-26', '2022-09-30', '2022-10-07', '2022-10-11', 1.43, 'Items received', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-25 07:09:27', '2022-11-25 01:39:27', '2022-11-25 01:39:27', 2517, NULL, 2517, NULL),
(30, 2517, 1, NULL, 13, 'yes', 'limited', 1.5, '2022-08-26', '2022-09-19', '2022-09-26', '2022-10-03', '2022-10-10', '2022-10-11', 1.43, 'Items received', 36, 143820, '2022-10-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:32', '2022-11-25 04:34:32', NULL, 2517, 2517, NULL, NULL),
(31, 2517, 1, NULL, 14, 'yes', 'pac', 4, '2022-08-26', '2022-09-08', '2022-09-17', '2022-10-03', '2022-10-10', '2022-10-11', 3.6, 'Items not received', 36, 359997, '2022-10-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:33', '2022-11-25 04:34:33', NULL, 2517, 2517, NULL, NULL),
(32, 2517, 1, NULL, 17, 'yes', 'open', 8, '2022-09-12', '2022-09-23', '2022-10-17', '2022-10-28', '2022-11-01', '2022-11-02', 7.6, 'Items not received', 36, 761575, '2022-11-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:33', '2022-11-25 04:34:33', NULL, 2517, 2517, NULL, NULL),
(33, 2517, 1, NULL, 39, 'yes', 'limited', 2.2, '2021-12-14', '2022-07-28', '2022-07-29', '2022-08-05', '2022-08-09', '2022-08-11', 2.08, 'Items received', 36, 208000, '2022-08-11', '2022-10-21', '2022-10-25', '2022-10-28', '2022-11-02', '2022-11-04', NULL, NULL, 2, 1, '2022-11-25 10:04:33', '2022-11-25 04:34:33', NULL, 2517, 2517, NULL, NULL),
(34, 2517, 1, NULL, 40, 'yes', 'open', 3000000, '2022-06-06', '2022-07-27', '2022-08-04', '2022-08-17', '2022-08-29', '2022-08-31', 2997000, 'Items received', 37, 2997000, '2022-08-31', '2022-10-10', '2022-10-13', '2022-10-14', '2022-10-17', '2022-10-18', NULL, NULL, 2, 1, '2022-11-25 10:04:33', '2022-11-25 04:34:33', NULL, 2517, 2517, NULL, NULL),
(35, 2517, 1, NULL, 41, 'yes', 'limited', 3.3, '2022-09-05', '2022-10-03', '2022-10-04', '2022-10-05', '2022-10-06', '2022-10-07', 3.3, NULL, 36, 330121.24, '2022-10-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-25 10:04:33', '2022-11-25 04:34:33', NULL, 2517, 2517, NULL, NULL),
(36, 3012, 1, NULL, 22, 'yes', 'open', 150, '2022-07-05', '2022-07-08', '2022-07-18', '2022-07-19', '2022-07-21', '2022-07-23', 150, 'order placed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-28 06:18:14', '2022-11-28 00:48:14', NULL, 2523, 2523, NULL, NULL),
(37, 3012, 1, NULL, 24, 'yes', 'open', 75, '2022-07-05', '2022-07-08', '2022-07-19', '2022-07-20', '2022-07-22', '2022-07-25', 75, 'order placed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-28 06:18:14', '2022-11-28 00:48:14', NULL, 2523, 2523, NULL, NULL),
(38, 3012, 1, NULL, 27, 'yes', 'open', 20, '2022-07-12', '2022-07-14', '2022-07-21', '2022-07-29', '2022-08-01', '2022-11-02', 20, 'kits distributed to all stc\'s', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-28 06:18:14', '2022-11-28 00:48:14', NULL, 2523, 2523, NULL, NULL),
(39, 3009, 1, NULL, 56, 'yes', 'open', 7.48, '2022-02-10', '2022-02-12', '2022-02-22', '2022-03-24', '2022-03-28', '2022-03-28', 5.29, 'Partial Equipment from M/s. Sports Line and inspection of received item is done. Bill is yet not received from the supplier inspite of reminder.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-29 08:42:29', '2022-11-29 03:12:29', NULL, 2519, 2519, NULL, NULL),
(40, 3009, 1, NULL, 57, 'yes', 'pac', 7.65, '2022-08-05', '2022-08-10', '2022-08-22', '2022-10-06', '2022-10-06', '2022-10-27', 9.23, 'Shoes received on 31.10.2022 and inspection of shoes is under process', 40.501, 99750, '2022-02-10', '2022-03-10', NULL, '2022-07-14', '2022-10-13', '2022-10-20', '2022-10-21', 'Completed', 2, 1, '2022-11-30 11:49:59', '2022-11-30 06:19:59', NULL, 2519, 2519, NULL, NULL),
(41, 3009, 1, NULL, 58, 'yes', 'pac', 0.85, '2022-01-20', '2022-01-25', '2022-02-04', '2022-02-08', '2022-02-08', '2022-02-10', 0.99, 'Item received and inspection completed Payment made on 21.10.2022.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-29 08:51:11', '2022-11-29 03:21:11', NULL, 2519, 2519, NULL, NULL),
(42, 3009, 1, NULL, 59, 'yes', 'limited', 26.15, '2022-05-06', '2022-06-15', '2022-07-07', '2022-07-14', '2022-07-20', '2022-07-22', 26.15, 'M/s. Bimal Electric corporation & M/s. Punjab Sports House have intimated that items will be delivered to STCs by 15th Nov 2022', 68.01, 2615000, '2022-07-22', '2022-09-22', NULL, NULL, NULL, NULL, NULL, 'Supply order issued on 22.07.2022.expected delivery by 10-15 Nov.', 2, 1, '2022-11-30 11:49:59', '2022-11-30 06:19:59', NULL, 2519, 2519, NULL, NULL),
(43, 3009, 1, NULL, 60, 'yes', 'pac', 52.89, '2022-05-06', '2022-06-30', '2022-07-21', '2022-07-29', '2022-07-29', '2022-08-11', 52.89, 'Bidder has intimated via email that the item will be delivered to STCs by 15th Nov 2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-29 08:54:09', '2022-11-29 03:24:09', NULL, 2519, 2519, NULL, NULL),
(44, 3009, 1, NULL, 61, 'yes', 'pac', 59.59, '2022-05-06', '2022-06-30', '2022-07-21', '2022-08-01', '2022-08-01', '2022-08-16', 59.59, 'Bidder has intimated via email that the item will be delivered to STCs in next 03 weeks', 68.01, 5959000, '2022-08-16', '2022-10-16', NULL, NULL, NULL, NULL, NULL, 'Supply order issued on 16.08.2022, expected delivery by 25 Nov.', 2, 1, '2022-11-30 11:49:59', '2022-11-30 06:19:59', NULL, 2519, 2519, NULL, NULL),
(45, 3009, 1, NULL, 62, 'yes', 'limited', 32.87, '2022-05-06', '2022-07-04', '2022-07-14', '2022-08-18', '2022-09-01', '2022-09-05', 32.87, 'Most of the items have already been supplied to STCs and rest equipments will be supplied by next week', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-29 08:54:09', '2022-11-29 03:24:09', NULL, 2519, 2519, NULL, NULL),
(46, 3009, 1, NULL, 63, 'yes', 'pac', 3.2, '2022-08-05', '2022-08-10', '2022-08-22', '2022-09-28', '2022-09-29', '2022-10-27', 3.48, 'Supply order placed on 27.10.2022 with delivery period of 60 days', 40.0501, 5829000, '2022-09-19', '2022-11-19', NULL, NULL, NULL, NULL, NULL, 'Supply order issued on  19.09.2022. Expected Delivery in 6 weeks.', 2, 1, '2022-11-30 11:49:59', '2022-11-30 06:19:59', NULL, 2519, 2519, NULL, NULL),
(47, 3009, 1, NULL, 64, 'yes', 'pac', 25.61, '2022-08-01', '2022-08-02', '2022-08-12', '2022-08-30', '2022-08-30', '2022-09-27', 25.35, 'In Process', 40.0501, 2535000, '2022-09-27', '2022-11-27', NULL, NULL, NULL, NULL, NULL, 'Supply order issued on 27.09.2022.Expected delivery by 20 Nov.', 2, 1, '2022-11-30 11:49:59', '2022-11-30 06:19:59', NULL, 2519, 2519, NULL, NULL),
(48, 3009, 1, NULL, 65, 'yes', 'pac', 5.23, '2022-08-01', '2022-08-05', '2022-08-16', '2022-08-30', '2022-08-30', '2022-09-27', 5.17, 'Bidder has intimated via email that equipt will be delivered by 10th Nov 2022.', 40.0501, 517000, '2022-09-27', '2022-11-27', NULL, NULL, NULL, NULL, NULL, 'Supply order issued on 27.09.2022. expected delivery by 10 Nov.', 2, 1, '2022-11-30 11:49:59', '2022-11-30 06:19:59', NULL, 2519, 2519, NULL, NULL),
(49, 3009, 1, NULL, 66, 'yes', 'pac', 33.83, '2022-08-01', '2022-08-08', '2022-08-18', '2022-08-30', '2022-08-30', '2022-09-30', 32.33, 'Bidder has intimated 144 mats & 4 human dummies are supplied to Trivandrum. Rest of the Eqpt. Have been ordered to Daedo and will be supplied soon to Bangalore & Guwahati.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-29 09:13:16', '2022-11-29 03:43:16', NULL, 2519, 2519, NULL, NULL),
(50, 3009, 1, NULL, 67, 'yes', 'pac', 56.12, '2022-07-29', '2022-08-02', '2022-08-12', '2022-08-16', '2022-08-18', '2022-09-16', 53.89, 'Bidder has intimated that goods have already been dispatched from the OEM and are expected to be delivered within 04 weeks.', 40.0501, 5389000, '2022-06-16', '2022-11-16', NULL, NULL, NULL, NULL, NULL, 'Supply order issued on 16.09.2022. Expected delivery by 25 Nov', 2, 1, '2022-11-30 11:49:59', '2022-11-30 06:19:59', NULL, 2519, 2519, NULL, NULL),
(51, 3009, 1, NULL, 68, 'yes', 'pac', 58.95, '2022-07-29', '2022-08-02', '2022-08-12', '2022-08-16', '2022-08-18', '2022-09-19', 58.29, 'Bidder has intimated that goods have already been dispatched from the OEM and are expected to be delivered within 06 weeks.', 40.0501, 5829000, '2022-09-19', '2022-11-19', NULL, NULL, NULL, NULL, NULL, 'Supply order issued on  19.09.2022. Expected Delivery in 6 weeks.', 2, 1, '2022-11-30 11:49:59', '2022-11-30 06:19:59', NULL, 2519, 2519, NULL, NULL),
(52, 3009, 1, NULL, 69, 'yes', 'limited', 5.8, '2022-08-29', '2022-09-28', '2022-10-08', NULL, NULL, NULL, 5.8, '1st tender was cancelled sinces no bidder was qualified. Fresh Tender again published and opened on 08.10.2022 but on technical evaluation some documents were not available.  shortfall documents have been received and are under evaluation..', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-11-29 09:16:55', '2022-11-29 03:46:55', NULL, 2519, 2519, NULL, NULL),
(53, 3009, 1, NULL, 70, 'yes', 'limited', 28.96, '2022-07-27', '2022-08-05', '2022-08-16', '2022-09-09', '2022-09-20', '2022-10-04', 17.42, 'Order for eqpts amounting Rs.11.25 Lakh is   placed on 04.10.2022. For rest of the equipment re-tender has been done and will be opened on 07.11.2022.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-29 09:17:58', '2022-11-29 03:47:58', NULL, 2519, 2519, NULL, NULL),
(54, 3009, 1, NULL, 71, 'yes', 'pac', 3.48, '2022-08-05', '2022-08-10', '2022-08-22', '2022-09-28', '2022-09-28', '2022-10-27', 3.48, 'Supply order placed on 27.10.2022 with delivery period of 30 days.', 40.0501, 348000, '2022-10-27', '2022-11-26', NULL, NULL, NULL, NULL, NULL, 'Supply order placed on 27.10.2022 with delivery period of 30 days', 2, 1, '2022-11-30 11:49:59', '2022-11-30 06:19:59', NULL, 2519, 2519, NULL, NULL),
(55, 3009, 1, NULL, 72, 'yes', 'pac', 5.23, '2022-09-02', '2022-09-07', '2022-09-16', '2022-09-29', '2022-09-29', '2022-10-27', 5.23, 'Supply order placed on 27.10.2022 with delivery period of 30 days.', 40.0501, 523000, '2022-10-27', '2022-11-26', NULL, NULL, NULL, NULL, NULL, 'Supply order placed on 27.10.2022 with delivery period of 30 days.', 2, 1, '2022-11-30 11:50:00', '2022-11-30 06:20:00', NULL, 2519, 2519, NULL, NULL),
(56, 3009, 1, NULL, 73, 'yes', 'pac', 2.06, '2022-09-02', '2022-09-07', '2022-09-16', '2022-09-29', '2022-09-29', '2022-10-27', 2.06, 'Supply order placed on 27.10.2022 with delivery period of 30 days.', 40.0501, 206000, '2022-10-27', '2022-11-26', NULL, NULL, NULL, NULL, NULL, 'Supply order issued on 27.10.2022 with delivery period of 30 days.', 2, 1, '2022-11-30 11:50:00', '2022-11-30 06:20:00', NULL, 2519, 2519, NULL, NULL),
(57, 3009, 1, NULL, 74, 'yes', 'pac', 2, '2022-10-11', '2022-10-13', '2022-10-22', '2022-11-02', '2022-11-02', '2022-11-12', 2, 'Notice uploaded on SAI Website on 02.11.2022.  Supply order will be placed on 12.11.2022.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-29 03:51:32', '2022-11-29 03:51:32', NULL, 2519, NULL, NULL, NULL),
(58, 3020, 1, NULL, 42, 'yes', 'open', 150000, '2022-11-16', '2022-11-17', '2022-11-18', '2022-11-19', '2022-11-20', '2022-11-22', 150000, 'NIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-29 09:40:45', '2022-11-29 04:10:45', '2022-11-29 04:10:45', 2514, NULL, 2514, NULL),
(59, 3020, 1, NULL, 42, 'yes', 'open', 150000, '2022-11-16', '2022-11-17', '2022-11-18', '2022-11-19', '2022-11-20', '2022-11-22', 150000, 'NIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-29 09:40:45', '2022-11-29 04:10:45', '2022-11-29 04:10:45', 2514, NULL, 2514, NULL),
(60, 3020, 1, NULL, 42, 'yes', 'open', 150000, '2022-11-16', '2022-11-17', '2022-11-18', '2022-11-19', '2022-11-20', '2022-11-22', 150000, 'NIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-29 09:40:35', '2022-11-29 04:10:35', '2022-11-29 04:10:35', 2514, NULL, 2514, NULL),
(61, 3019, 1, NULL, 46, 'yes', 'open', 10.58, '2022-07-29', '2022-08-01', '2022-08-23', '2022-10-10', '2022-10-21', '2022-10-22', 6.45, 'The supply order for 08 items has been placed with cost of Rs.6.45 lakh. 2. The procurement of remaining 03 items is under process (Through LPC with cost of Rs.46,000/-) & order will be placed within a week', 36.01, 645200, '2022-10-22', NULL, NULL, NULL, NULL, NULL, NULL, 'Goods not received yet', 2, 1, '2022-11-29 10:42:44', '2022-11-29 05:12:44', NULL, 2515, 2515, NULL, NULL),
(62, 3019, 1, NULL, 47, 'yes', 'open', 31, '2022-07-29', '2022-10-22', '2022-11-14', '2022-11-30', '2022-12-02', '2022-12-05', NULL, '1. The supply order for two items (Judo terraband & finger plaster ) with cost of Rs.3.17 lakh has been placed. 2. The re-tender for 02 items (IJF Judogi & Judogi for training) with cost of Rs.31.00 lakh has been floated on 22.10.22. Technical evaluation is under process (07 bids received)', 36.01, 317000, '2022-10-26', '2022-11-23', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2022-11-29 10:42:44', '2022-11-29 05:12:44', NULL, 2515, 2515, NULL, NULL),
(63, 3019, 1, NULL, 48, 'yes', 'open', 15.58, '2022-11-11', '2022-11-14', NULL, NULL, NULL, NULL, NULL, '1. Tender has been floated on 22.11.22 2. Supply order has been placed with cost of Rs.1.64 lakh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-11-29 09:56:53', '2022-11-29 04:26:53', NULL, 2515, 2515, NULL, NULL),
(64, 3019, 1, NULL, 49, 'yes', 'open', 20.14, '2022-07-29', '2022-08-01', '2022-08-23', NULL, NULL, NULL, NULL, '1. Clarification has been sought from L1 bidders on rate reasonability since the quoted rate is significantly lower than the estimated cost. Sample of 03 items was also called which has been received and is in the under examination. 2. Supply order has been placed with cost of Rs.3.75 lakh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-11-29 10:00:33', '2022-11-29 04:30:33', NULL, 2515, 2515, NULL, NULL),
(65, 3019, 1, NULL, 50, 'yes', 'open', 5.13, '2022-07-29', '2022-10-11', '2022-11-17', NULL, NULL, NULL, NULL, '1.First tender was cancelled due to the single bidder was technically not eligible in previous tender. 2. Technical Evaluation is under process (03 bids is received)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-11-29 10:01:27', '2022-11-29 04:31:27', NULL, 2515, 2515, NULL, NULL),
(66, 3019, 1, NULL, 51, 'yes', 'open', 3.56, NULL, NULL, NULL, NULL, NULL, NULL, 3.56, 'The demand was only received for sports specific shoes & etc. accordingly, the required items have been procured through LPC (not available on GeM) and goods have been received.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-11-29 10:06:17', '2022-11-29 04:36:17', NULL, 2515, 2515, NULL, NULL),
(67, 3019, 1, NULL, 52, 'yes', 'open', 27.17, '2022-07-29', '2022-08-02', '2022-08-24', '2022-10-07', '2022-11-07', '2022-11-09', 11.07, '1. Order placed for 02 items (Rs.11.07 lakh) Judo mat & judo dummy. 2.The sample of 03 items (Assisted Judo Dummy- Small, Medium & Large) has been asked from the vendor due to price reasonability issues & technical specification. 3. The price negotiation has been called with L1 bidder for Crash Mat 4. Retender is being floated for remaining 03 items due to non participation 5. The procurement of electronic and software items with an estimated cost of Rs.28.10 lakh is pending due to non availbility of software in Indian market. This matter has been taken with IJF and National Fedaration and they have assured that they will provide this software soon.', 36.01, 1107344, '2022-10-27', NULL, NULL, NULL, NULL, NULL, NULL, 'Goods not received yet', 2, 1, '2022-11-29 10:42:44', '2022-11-29 05:12:44', NULL, 2515, 2515, NULL, NULL),
(68, 3019, 1, NULL, 53, 'yes', 'open', 7.3, '2022-08-03', '2022-10-22', '2022-11-17', NULL, NULL, NULL, NULL, '1. The tender has been cancelled due to non eligibility of participating firm & retender for 02 items has been floated on 22.10.22 (03 bids have been received)  2. The 02 items with cost of Rs.32.00 lakh are with the country of origin of the item is China, and on hold', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-11-29 10:10:34', '2022-11-29 04:40:34', NULL, 2515, 2515, NULL, NULL),
(69, 3020, 1, NULL, 42, 'yes', 'pac', 500000, '2022-07-30', '2022-09-25', '2022-09-26', '2022-09-27', '2022-09-28', '2022-09-29', 486000, 'nil', 36.01, 486000, '2022-09-29', '2022-11-10', NULL, NULL, NULL, NULL, NULL, 'Partial delivery completed', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(70, 3020, 1, NULL, 43, 'yes', 'pac', 1000000, '2022-07-30', '2022-08-08', '2022-08-29', '2022-08-30', '2022-09-05', '2022-09-26', 901200, 'nil', 36.01, 901200, '2022-09-26', NULL, NULL, NULL, NULL, NULL, NULL, 'Partial delivery completed', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(71, 3020, 1, NULL, 44, 'yes', 'pac', 1000000, '2022-07-30', '2022-10-05', '2022-10-26', '2022-11-09', '2022-11-21', '2022-11-28', 850000, 'nil', 36.01, 850000, '2022-11-28', NULL, NULL, NULL, NULL, NULL, NULL, 'Item yet to be received', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(72, 3020, 1, NULL, 45, 'yes', 'pac', 2100000, '2022-07-30', '2022-08-03', '2022-08-24', '2022-08-25', '2022-09-12', '2022-09-26', 1865234, 'nil', 36.01, 1865234, '2022-09-26', '2022-11-16', NULL, '2022-11-30', NULL, NULL, NULL, 'Delivery completed', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(73, 3020, 1, NULL, 75, 'yes', 'pac', 7250000, '2022-07-30', '2022-08-03', '2022-08-24', '2022-08-25', '2022-09-07', '2022-09-26', 6583000, 'nil', 36.01, 6583000, '2022-09-26', NULL, NULL, NULL, NULL, NULL, NULL, 'Partial delivery completed', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(74, 3020, 1, NULL, 76, 'yes', 'pac', 1150000, '2022-07-30', '2022-09-17', '2022-10-05', '2022-10-06', '2022-10-07', '2022-10-08', 567674, 'nil', 36.01, 569226, '2022-10-08', '2022-10-10', NULL, NULL, NULL, NULL, NULL, 'Item received', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(75, 3020, 1, NULL, 77, 'yes', 'open', 1142000, '2022-07-29', '2022-07-30', '2022-08-20', '2022-10-10', '2022-10-20', '2022-11-22', 741500, 'nil', 36.01, 741500, '2022-11-22', NULL, NULL, NULL, NULL, NULL, NULL, 'Item yet to be received', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(76, 3020, 1, NULL, 78, 'yes', 'open', 1598000, '2022-06-30', '2022-07-01', '2022-07-22', '2022-07-28', '2022-08-10', '2022-08-26', 1515388, 'nil', 36.01, 1515388, '2022-08-26', NULL, '2022-10-15', NULL, NULL, NULL, NULL, 'Out of 5 items,3 items delivered,Payment to be done for 03 items', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(77, 3020, 1, NULL, 79, 'yes', 'pac', 115000, '2022-08-01', '2022-08-11', '2022-09-08', '2022-09-15', '2022-10-17', '2022-11-01', 114600, 'nil', 36.01, 114600, '2022-11-01', '2022-11-14', NULL, NULL, NULL, NULL, NULL, 'Item received', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(78, 3020, 1, NULL, 80, 'yes', 'pac', 1100000, '2022-07-31', '2022-08-08', '2022-08-29', '2022-09-05', '2022-09-16', '2022-11-01', 946620, 'nil', 37.01, 946620, '2022-11-01', '2022-11-29', NULL, NULL, NULL, NULL, NULL, 'Item received', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(79, 3020, 1, NULL, 81, 'yes', 'pac', 600000, '2022-07-30', '2022-09-17', '2022-10-05', '2022-10-06', '2022-10-07', '2022-10-08', 569226, 'nil', 37.01, 569226, '2022-10-08', '2022-10-10', NULL, NULL, NULL, NULL, NULL, 'Item received', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(80, 3020, 1, NULL, 83, 'yes', 'open', 350000, '2022-07-31', '2022-09-30', '2022-10-03', '2022-10-04', '2022-10-05', '2022-10-06', 350000, 'nil', 37.01, 350000, '2022-10-06', '2022-10-20', NULL, NULL, NULL, NULL, NULL, 'Item received', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(81, 3020, 1, NULL, 84, 'yes', 'pac', 1100000, '2022-07-06', '2022-07-18', '2022-08-08', '2022-08-29', '2022-09-13', '2022-11-03', 903000, 'nil', 37.01, 903000, '2022-11-03', NULL, NULL, NULL, NULL, NULL, NULL, 'Item yet to be received', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(82, 3020, 1, NULL, 85, 'yes', 'pac', 165000, '2022-07-29', '2022-07-30', '2022-08-30', '2022-08-31', '2022-09-23', '2022-11-22', 165000, 'nil', 37.01, 165000, '2022-11-22', NULL, NULL, NULL, NULL, NULL, NULL, 'Item yet to be received', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(83, 3020, 1, NULL, 86, 'yes', 'pac', 715000, '2022-07-29', '2022-07-30', '2022-08-30', '2022-08-31', '2022-09-23', '2022-11-22', 713000, 'nil', 37.01, 713000, '2022-11-22', NULL, NULL, NULL, NULL, NULL, NULL, 'Item yet to be received', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(84, 3020, 1, NULL, 87, 'yes', 'open', 250000, '2022-07-29', '2022-07-30', '2022-09-05', '2022-10-03', '2022-10-12', '2022-11-11', 218500, 'nil', 37.01, 218500, '2022-11-11', NULL, NULL, NULL, NULL, NULL, NULL, 'Item yet to be received', 2, 1, '2022-12-02 06:53:45', '2022-12-02 01:23:45', NULL, 2514, 2514, NULL, NULL),
(85, 3020, 1, NULL, 88, 'yes', 'open', 2351095, '2022-07-27', '2022-07-29', '2022-08-30', '2022-09-16', '2022-10-11', '2022-11-05', 1625000, 'nil', 37.01, 1541404, '2022-11-05', NULL, NULL, NULL, NULL, NULL, NULL, 'Item yet to be received', 2, 1, '2022-12-02 06:53:46', '2022-12-02 01:23:46', NULL, 2514, 2514, NULL, NULL),
(86, 3020, 1, NULL, 89, 'yes', 'open', 250000, '2022-10-03', '2022-10-05', '2022-10-07', '2022-10-10', '2022-10-11', '2022-10-12', 241560, 'nil', 37.01, 241560, '2022-10-12', NULL, NULL, NULL, NULL, NULL, NULL, 'Item received and payment made', 2, 1, '2022-12-02 06:53:46', '2022-12-02 01:23:46', NULL, 2514, 2514, NULL, NULL),
(87, 3017, 1, NULL, 91, 'yes', 'limited', 1621850, '2022-10-26', '2022-10-27', '2022-11-17', '2022-11-24', NULL, NULL, 1621850, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-11-30 12:09:02', '2022-11-30 06:39:02', NULL, 5924, 5924, NULL, NULL),
(88, 3017, 1, NULL, 92, 'yes', 'limited', 1621850, '2022-10-26', '2022-10-27', '2022-11-17', '2022-11-24', NULL, NULL, 1621850, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-11-30 12:10:30', '2022-11-30 06:40:30', NULL, 5924, 5924, NULL, NULL),
(89, 3017, 1, NULL, 93, 'yes', 'limited', 1200000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.Rs.2 crore sanctioned  for Procurement of Ammunition and Shooting Specific Consummables. Supply Order placed with NRAI With 19223798/- on  05.08.2022 for a epriod of 06 months aganst Rs.4.00 Crores alloted for 2022-23  2. Shooting jackets with trousers : with esttimated Value of Rs.16,21,850/-( For 28 Rifle Athletes) BID Floated on 27-10-2022 BID Opening on 17-11-2022  3. Procurement of shooting specific shoes and Glasses:(For 40  Pistol AThletes) APPROXIMATE  AMOUNT  Shooting Shoes  12 LAKHS And 24 Lakhs for  Shooting Glasses) Per Athlete :60000/- for Shooting Glasses and 30000/- fo4r Shooting Specific Shoes.  Specification finalized. Estimate finalized. BID template prepared. Bid floating approval to be taken.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-11-30 06:40:30', '2022-11-30 06:40:30', NULL, 5924, NULL, NULL, NULL),
(90, 3020, 1, NULL, 102, 'yes', 'pac', 840000, '2022-09-01', '2022-09-12', '2022-10-03', '2022-10-10', '2022-11-09', '2022-12-14', 838909, 'NIL', 37.01, 838909, '2022-12-14', '2022-12-15', NULL, NULL, NULL, NULL, NULL, 'Bid finalised order to be placed', 2, 1, '2022-12-02 06:53:46', '2022-12-02 01:23:46', NULL, 2514, 2514, NULL, NULL),
(91, 2999, 1, NULL, 106, 'no', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cancelled Tender', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-12-01 12:59:54', '2022-12-01 07:29:54', NULL, 2524, 2524, NULL, NULL),
(92, 2520, 1, NULL, 112, 'yes', 'open', 1740000, NULL, NULL, NULL, NULL, NULL, NULL, 1345825, 'PROCUREMENT THROUGH GEM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-12-01 13:09:51', '2022-12-01 07:39:51', NULL, 2520, 2520, NULL, NULL),
(93, 3013, 1, NULL, 113, 'yes', 'pac', 76.5, '2022-11-01', '2022-11-09', '2022-11-30', '2022-12-11', '2022-12-16', '2022-12-23', NULL, 'Non-Consumable Items', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-12-01 09:30:28', '2022-12-01 09:30:28', NULL, 5924, NULL, NULL, NULL),
(94, 3009, 8, 2519, 54, 'yes', 'open', 212, '2022-12-01', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 5, 'testing', 12, 12, '2022-12-01', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', '2022-12-07', 'tetsing', 2, 1, '2022-12-29 08:14:57', '2022-12-29 02:44:57', NULL, 2519, 2519, NULL, 3009),
(95, 3009, 9, 2519, 54, 'yes', 'open', 212, '2022-12-01', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 5, 'testing', 12, 12, '2022-12-01', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', '2022-12-07', 'tetsing', 2, 1, '2022-12-28 08:20:20', '2022-12-28 08:20:20', NULL, 2519, 2519, NULL, 3009),
(96, 3009, 8, 2519, 124, 'yes', 'open', 5220, '2022-12-01', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 5221, 'test', 12, 12, '2022-12-01', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', '2022-12-07', 'tet', 2, 1, '2022-12-29 08:14:57', '2022-12-29 02:44:57', NULL, 2519, 2519, NULL, 3009),
(97, 3009, 8, 2519, 124, 'yes', 'open', 2552, '2022-12-01', '2022-12-02', '2022-12-03', '2022-12-04', '2022-12-05', '2022-12-06', 5221, 'test1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-12-29 02:45:41', '2022-12-29 02:45:41', NULL, 2519, NULL, NULL, 3009);

-- --------------------------------------------------------

--
-- Table structure for table `rcacademymappings`
--

CREATE TABLE `rcacademymappings` (
  `id` int(11) NOT NULL,
  `rc_id` int(11) DEFAULT NULL,
  `RC_Name` varchar(255) DEFAULT NULL,
  `academy_id` int(11) DEFAULT NULL,
  `academy_name` varchar(255) DEFAULT NULL,
  `academy_type` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rcacademymappings`
--

INSERT INTO `rcacademymappings` (`id`, `rc_id`, `RC_Name`, `academy_id`, `academy_name`, `academy_type`, `status`, `created_by`, `created_at`, `updated_at`, `updated_by`, `deleted`) VALUES
(1, 2514, 'RD_Bangalore', 3020, 'NCOE Bengaluru', 'NCOE', 1, 2514, '2022-11-24 06:40:06', '2022-11-24 06:40:06', NULL, '2022-11-24 06:40:06'),
(2, 2515, 'RD_Bhopal', 3019, 'NCOE Bhopal', 'NCOE', 1, 2515, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(3, 2516, 'RD_Chandigarh', 3001, 'NCOE DHARAMSHALA', 'NCOE', 1, 2516, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(4, 2516, 'RD_Chandigarh', 11859, 'NCOE Hamirpur', 'NCOE', 1, 2516, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(5, 2522, 'RD_Gandhinagar', 3015, 'NCOE Gandhinagar', 'NCOE', 1, 2522, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(6, 2517, 'RD_Guwahati', 3014, 'NCOE Guwahati', 'NCOE', 1, 2517, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(7, 2517, 'RD_Guwahati', 3004, 'NCOE Sangey Lhaden Sports Academy (SLSA) Itanagar', 'NCOE', 1, 2517, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(8, 2523, 'RD_Imphal', 3012, 'NCOE Imphal', 'NCOE', 1, 2523, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(9, 2518, 'RD_Kolkata', 3000, 'NCOE JAGATPUR', 'NCOE', 1, 2518, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(10, 2518, 'RD_Kolkata', 3010, 'NCOE Kolkata', 'NCOE', 1, 2518, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(11, 2519, 'RD_Lucknow', 3009, 'NCOE Lucknow', 'NCOE', 1, 2519, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(12, 2520, 'RD_Mumbai', 3021, 'NCOE Aurangabad', 'NCOE', 1, 2520, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(13, 2520, 'RD_Mumbai', 3007, 'NCOE Mumbai', 'NCOE', 1, 2520, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(14, 2524, 'RD_Patiala', 2999, 'NCOE Patiala', 'NCOE', 1, 2524, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(15, 2521, 'RD_Sonepat', 3006, 'NCOE National Boxing Academy (KI), Rohtak', 'NCOE', 1, 2521, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(16, 2521, 'RD_Sonepat', 3003, 'NCOE Sonepat', 'NCOE', 1, 2521, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(17, 5924, 'RD_Stadia', 3017, 'NCOE Dr. Karni Singh Shooting Range', 'NCOE', 1, 5924, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(18, 5924, 'RD_Stadia', 3016, 'NCOE Dr. SPM Swimming Pool Complex', 'NCOE', 1, 5924, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(19, 5924, 'RD_Stadia', 3013, 'NCOE I G Stadium', 'NCOE', 1, 5924, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(20, 5924, 'RD_Stadia', 3011, 'NCOE J N Stadium', 'NCOE', 1, 5924, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(21, 5924, 'RD_Stadia', 3008, 'NCOE MDC National Stadium', 'NCOE', 1, 5924, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(22, 2513, 'RD_Trivandrum', 3005, 'NCOE National Water Sports Academy (KI), Alleppey', 'NCOE', 1, 2512, '2022-11-24 06:40:08', '2022-12-01 10:06:35', NULL, '2022-11-24 06:40:08'),
(23, 2513, 'RD_Trivandrum', 3002, 'NCOE THIRUVANANTHAPURAM', 'NCOE', 1, 2513, '2022-11-24 06:40:08', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:08'),
(24, 2514, 'RD_Bangalore', 2854, 'SAI SLKIC Kurnool', 'STC', 1, 2514, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(25, 2514, 'RD_Bangalore', 2884, 'STC Bangalore', 'STC', 1, 2514, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(26, 2514, 'RD_Bangalore', 2874, 'STC Dharwad', 'STC', 1, 2514, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(27, 2514, 'RD_Bangalore', 2871, 'STC Eluru', 'STC', 1, 2514, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(28, 2514, 'RD_Bangalore', 2866, 'STC Hyderabad', 'STC', 1, 2514, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(29, 2514, 'RD_Bangalore', 2850, 'STC Madikeri', 'STC', 1, 2514, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(30, 2514, 'RD_Bangalore', 2824, 'STC_Vishakhapatnam', 'STC', 1, 2514, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(31, 2515, 'RD_Bhopal', 2875, 'STC Dhar', 'STC', 1, 2515, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(32, 2515, 'RD_Bhopal', 2864, 'STC Jabalpur', 'STC', 1, 2515, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(33, 2515, 'RD_Bhopal', 2838, 'STC Raipur', 'STC', 1, 2515, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(34, 2515, 'RD_Bhopal', 2837, 'STC Rajnandgaon ', 'STC', 1, 2515, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(35, 2515, 'RD_Bhopal', 2829, 'STC Tikamgarh', 'STC', 1, 2515, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(36, 2516, 'RD_Chandigarh', 2885, 'STC Badal ', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(37, 2516, 'RD_Chandigarh', 2881, 'STC Bilaspur', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(38, 2516, 'RD_Chandigarh', 2861, 'STC Jammu ', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(39, 2516, 'RD_Chandigarh', 2859, 'STC Kargil', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(40, 2516, 'RD_Chandigarh', 2851, 'STC Ludhiana', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(41, 2516, 'RD_Chandigarh', 2849, 'STC Mastunasahib ', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(42, 2522, 'RD_Gandhinagar', 2887, 'STC Alwar', 'STC', 1, 2522, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(43, 2522, 'RD_Gandhinagar', 2863, 'STC Jaipur', 'STC', 1, 2522, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(44, 2522, 'RD_Gandhinagar', 2860, 'STC Jodhpur', 'STC', 1, 2522, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(45, 2517, 'RD_Guwahati', 2869, 'STC Golaghat ', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(46, 2517, 'RD_Guwahati', 2856, 'STC Kokrajhar ', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(47, 2517, 'RD_Guwahati', 2847, 'STC Naharlagun', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(48, 2517, 'RD_Guwahati', 2846, 'STC Namchi Sikkim', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(49, 2517, 'RD_Guwahati', 2845, 'STC NEHU- Shillong', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(50, 2517, 'RD_Guwahati', 10679, 'STC SOLALGAON', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(51, 2517, 'RD_Guwahati', 2828, 'STC Tinsukia', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(52, 2523, 'RD_Imphal', 2888, 'STC Aizawl', 'STC', 1, 2523, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(53, 2523, 'RD_Imphal', 2872, 'STC Dimapur', 'STC', 1, 2523, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(54, 2523, 'RD_Imphal', 2865, 'STC Imphal', 'STC', 1, 2523, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(55, 2523, 'RD_Imphal', 2827, 'STC Utlou', 'STC', 1, 2523, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(56, 2518, 'RD_Kolkata', 2889, 'STC Agartala', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(57, 2518, 'RD_Kolkata', 2880, 'STC Bolpur', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(58, 2518, 'RD_Kolkata', 2879, 'STC Burdwan', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(59, 2518, 'RD_Kolkata', 2876, 'STC Cuttack ', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(60, 2518, 'RD_Kolkata', 2868, 'STC Hazaribagh', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(61, 2518, 'RD_Kolkata', 2862, 'STC Jalpaiguri', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(62, 2518, 'RD_Kolkata', 2857, 'STC Kishanganj', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(63, 2518, 'RD_Kolkata', 2852, 'STC Lebong ', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(64, 2518, 'RD_Kolkata', 2843, 'STC Patna ', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(65, 2518, 'RD_Kolkata', 2841, 'STC Port Blair', 'STC', 1, 2518, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12'),
(66, 2518, 'RD_Kolkata', 2836, 'STC Ranchi', 'STC', 1, 2518, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12'),
(67, 2518, 'RD_Kolkata', 2833, 'STC Sundargarh', 'STC', 1, 2518, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12'),
(68, 2519, 'RD_Lucknow', 2883, 'STC Bareily', 'STC', 1, 2519, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12'),
(69, 2519, 'RD_Lucknow', 2858, 'STC Kashipur', 'STC', 1, 2519, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12'),
(70, 2519, 'RD_Lucknow', 2839, 'STC Raibareily', 'STC', 1, 2519, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12'),
(71, 2519, 'RD_Lucknow', 2835, 'STC Saifai', 'STC', 1, 2519, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(72, 2519, 'RD_Lucknow', 2826, 'STC Varanasi', 'STC', 1, 2519, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(73, 2520, 'RD_Mumbai', 10683, 'STC Peddem', 'STC', 1, 2520, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(74, 2520, 'RD_Mumbai', 2842, 'STC Ponda', 'STC', 1, 2520, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(75, 2524, 'RD_Patiala', 2998, 'NIS Patiala ', 'STC', 1, 2524, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(76, 2521, 'RD_Sonepat', 2882, 'STC Bawana', 'STC', 1, 2521, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(77, 2521, 'RD_Sonepat', 3085, 'STC Bhiwani', 'STC', 1, 2521, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(78, 2521, 'RD_Sonepat', 2867, 'STC Hisar', 'STC', 1, 2521, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(79, 2521, 'RD_Sonepat', 2853, 'STC Kurukshetra', 'STC', 1, 2521, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(80, 2513, 'RD_Trivandrum', 2886, 'STC Androth   ', 'STC', 1, 2513, '2022-11-24 06:40:13', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:13'),
(81, 2513, 'RD_Trivandrum', 2878, 'STC Calicut ', 'STC', 1, 2513, '2022-11-24 06:40:13', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:13'),
(82, 2513, 'RD_Trivandrum', 2877, 'STC Chennai ', 'STC', 1, 2513, '2022-11-24 06:40:13', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:13'),
(83, 2513, 'RD_Trivandrum', 2855, 'STC Kollam ', 'STC', 1, 2513, '2022-11-24 06:40:13', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:13'),
(84, 2513, 'RD_Trivandrum', 2848, 'STC Mayiladuthurai', 'STC', 1, 2513, '2022-11-24 06:40:13', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:13'),
(85, 2513, 'RD_Trivandrum', 2840, 'STC Puducherry', 'STC', 1, 2513, '2022-11-24 06:40:13', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:13'),
(86, 2513, 'RD_Trivandrum', 2834, 'STC Salem ', 'STC', 1, 2513, '2022-11-24 06:40:14', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:14'),
(87, 2513, 'RD_Trivandrum', 2832, 'STC Thalaserry ', 'STC', 1, 2513, '2022-11-24 06:40:14', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:14'),
(88, 2513, 'RD_Trivandrum', 2830, 'STC Thrissur ', 'STC', 1, 2513, '2022-11-24 06:40:14', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:14'),
(89, 2513, 'RD_Trivandrum', 2825, 'STC Yanam ', 'STC', 1, 2513, '2022-11-24 06:40:14', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:14'),
(90, 2514, 'RC_Bangalore', 2514, 'RC_Bangalore', 'RC', 1, 2514, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14'),
(91, 2515, 'RC_Bhopal', 2515, 'RC_Bhopal', 'RC', 1, 2515, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14'),
(92, 2516, 'RC_Chandigarh', 2516, 'RC_Chandigarh', 'RC', 1, 2516, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14'),
(93, 2522, 'RC_Gandhinagar', 2522, 'RC_Gandhinagar', 'RC', 1, 2522, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14'),
(94, 2517, 'RC_Guwahati', 2517, 'RC_Guwahati', 'RC', 1, 2517, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14'),
(95, 2523, 'RC_Imphal', 2523, 'RC_Imphal', 'RC', 1, 2523, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14'),
(96, 2518, 'RC_Kolkata', 2518, 'RC_Kolkata', 'RC', 1, 2518, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14'),
(97, 2519, 'RC_Lucknow', 2519, 'RC_Lucknow', 'RC', 1, 2519, '2022-11-24 06:40:15', '2022-11-24 06:40:15', NULL, '2022-11-24 06:40:15'),
(98, 2520, 'RC_Mumbai', 2520, 'RC_Mumbai', 'RC', 1, 2520, '2022-11-24 06:40:15', '2022-11-24 06:40:15', NULL, '2022-11-24 06:40:15'),
(99, 2524, 'RC_Patiala', 2524, 'RC_Patiala', 'RC', 1, 2524, '2022-11-24 06:40:15', '2022-11-24 06:40:15', NULL, '2022-11-24 06:40:15'),
(100, 2521, 'RC_Sonepat', 2521, 'RC_Sonepat', 'RC', 1, 2521, '2022-11-24 06:40:15', '2022-11-24 06:40:15', NULL, '2022-11-24 06:40:15'),
(101, 5924, 'RC_Stadia', 5924, 'RC_Stadia', 'RC', 1, 5924, '2022-11-24 06:40:15', '2022-11-24 06:40:15', NULL, '2022-11-24 06:40:15'),
(102, 2513, 'RC_Trivandrum', 2513, 'RC_Trivandrum', 'RC', 1, 2513, '2022-11-24 06:40:15', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:15'),
(103, 2509, 'RD_Test', 1111, 'NCOE Testing 1', 'NCOE', 1, 2509, '2022-12-07 06:57:17', '2022-12-07 06:57:17', NULL, '2022-12-07 06:57:17'),
(104, 2509, 'RD_Test', 1112, 'NCOE Testing 2', 'NCOE', 1, 2509, '2022-12-07 06:57:17', '2022-12-07 06:57:17', NULL, '2022-12-07 06:57:17'),
(105, 2509, 'RD_Test', 1113, 'NCOE Testing 3', 'NCOE', 1, 2509, '2022-12-07 06:57:17', '2022-12-07 06:57:17', NULL, '2022-12-07 06:57:17'),
(106, 2509, 'RD_Test', 1114, 'RC_Testing 1', 'RC', 1, 2509, '2022-12-07 06:57:17', '2022-12-07 06:57:17', NULL, '2022-12-07 06:57:17'),
(107, 2509, 'RD_Test', 1115, 'RC_Testing 2', 'RC', 1, 2509, '2022-12-07 06:57:17', '2022-12-07 06:57:17', NULL, '2022-12-07 06:57:17'),
(108, 2509, 'RD_Test', 1116, 'RC_Testing 1', 'RC', 1, 2509, '2022-12-07 06:57:17', '2022-12-07 06:57:17', NULL, '2022-12-07 06:57:17'),
(109, 2119, 'OPSUser', 2119, 'OPSUser', '2119', 1, 2119, '2022-12-09 06:01:43', '2022-12-09 06:01:43', NULL, '2022-12-09 06:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `rcacademymappings-27-12-2022`
--

CREATE TABLE `rcacademymappings-27-12-2022` (
  `id` int(11) NOT NULL,
  `rc_id` int(11) DEFAULT NULL,
  `RC_Name` varchar(255) DEFAULT NULL,
  `academy_id` int(11) DEFAULT NULL,
  `academy_name` varchar(255) DEFAULT NULL,
  `academy_type` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT current_timestamp(),
  `created_for` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rcacademymappings-27-12-2022`
--

INSERT INTO `rcacademymappings-27-12-2022` (`id`, `rc_id`, `RC_Name`, `academy_id`, `academy_name`, `academy_type`, `status`, `created_by`, `created_at`, `updated_at`, `updated_by`, `deleted`, `created_for`) VALUES
(1, 2514, 'RD_Bangalore', 3020, 'NCOE Bengaluru', 'NCOE', 1, 2514, '2022-11-24 06:40:06', '2022-11-24 06:40:06', NULL, '2022-11-24 06:40:06', NULL),
(2, 2515, 'RD_Bhopal', 3019, 'NCOE Bhopal', 'NCOE', 1, 2515, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07', NULL),
(3, 2516, 'RD_Chandigarh', 3001, 'NCOE DHARAMSHALA', 'NCOE', 1, 2516, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07', NULL),
(4, 2516, 'RD_Chandigarh', 11859, 'NCOE Hamirpur', 'NCOE', 1, 2516, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07', NULL),
(5, 2522, 'RD_Gandhinagar', 3015, 'NCOE Gandhinagar', 'NCOE', 1, 2522, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07', NULL),
(6, 2517, 'RD_Guwahati', 3014, 'NCOE Guwahati', 'NCOE', 1, 2517, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07', NULL),
(7, 2517, 'RD_Guwahati', 3004, 'NCOE Sangey Lhaden Sports Academy (SLSA) Itanagar', 'NCOE', 1, 2517, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07', NULL),
(8, 2523, 'RD_Imphal', 3012, 'NCOE Imphal', 'NCOE', 1, 2523, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07', NULL),
(9, 2518, 'RD_Kolkata', 3000, 'NCOE JAGATPUR', 'NCOE', 1, 2518, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07', NULL),
(10, 2518, 'RD_Kolkata', 3010, 'NCOE Kolkata', 'NCOE', 1, 2518, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07', NULL),
(11, 2519, 'RD_Lucknow', 3009, 'NCOE Lucknow', 'NCOE', 1, 2519, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07', NULL),
(12, 2520, 'RD_Mumbai', 3021, 'NCOE Aurangabad', 'NCOE', 1, 2520, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07', NULL),
(13, 2520, 'RD_Mumbai', 3007, 'NCOE Mumbai', 'NCOE', 1, 2520, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07', NULL),
(14, 2524, 'RD_Patiala', 2999, 'NCOE Patiala', 'NCOE', 1, 2524, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08', NULL),
(15, 2521, 'RD_Sonepat', 3006, 'NCOE National Boxing Academy (KI), Rohtak', 'NCOE', 1, 2521, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08', NULL),
(16, 2521, 'RD_Sonepat', 3003, 'NCOE Sonepat', 'NCOE', 1, 2521, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08', NULL),
(17, 5924, 'RD_Stadia', 3017, 'NCOE Dr. Karni Singh Shooting Range', 'NCOE', 1, 5924, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08', NULL),
(18, 5924, 'RD_Stadia', 3016, 'NCOE Dr. SPM Swimming Pool Complex', 'NCOE', 1, 5924, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08', NULL),
(19, 5924, 'RD_Stadia', 3013, 'NCOE I G Stadium', 'NCOE', 1, 5924, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08', NULL),
(20, 5924, 'RD_Stadia', 3011, 'NCOE J N Stadium', 'NCOE', 1, 5924, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08', NULL),
(21, 5924, 'RD_Stadia', 3008, 'NCOE MDC National Stadium', 'NCOE', 1, 5924, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08', NULL),
(22, 2513, 'RD_Trivandrum', 3005, 'NCOE National Water Sports Academy (KI), Alleppey', 'NCOE', 1, 2512, '2022-11-24 06:40:08', '2022-12-01 10:06:35', NULL, '2022-11-24 06:40:08', NULL),
(23, 2513, 'RD_Trivandrum', 3002, 'NCOE THIRUVANANTHAPURAM', 'NCOE', 1, 2513, '2022-11-24 06:40:08', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:08', NULL),
(24, 2514, 'RD_Bangalore', 2854, 'SAI SLKIC Kurnool', 'STC', 1, 2514, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08', NULL),
(25, 2514, 'RD_Bangalore', 2884, 'STC Bangalore', 'STC', 1, 2514, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08', NULL),
(26, 2514, 'RD_Bangalore', 2874, 'STC Dharwad', 'STC', 1, 2514, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08', NULL),
(27, 2514, 'RD_Bangalore', 2871, 'STC Eluru', 'STC', 1, 2514, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08', NULL),
(28, 2514, 'RD_Bangalore', 2866, 'STC Hyderabad', 'STC', 1, 2514, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08', NULL),
(29, 2514, 'RD_Bangalore', 2850, 'STC Madikeri', 'STC', 1, 2514, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09', NULL),
(30, 2514, 'RD_Bangalore', 2824, 'STC_Vishakhapatnam', 'STC', 1, 2514, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09', NULL),
(31, 2515, 'RD_Bhopal', 2875, 'STC Dhar', 'STC', 1, 2515, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09', NULL),
(32, 2515, 'RD_Bhopal', 2864, 'STC Jabalpur', 'STC', 1, 2515, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09', NULL),
(33, 2515, 'RD_Bhopal', 2838, 'STC Raipur', 'STC', 1, 2515, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09', NULL),
(34, 2515, 'RD_Bhopal', 2837, 'STC Rajnandgaon ', 'STC', 1, 2515, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09', NULL),
(35, 2515, 'RD_Bhopal', 2829, 'STC Tikamgarh', 'STC', 1, 2515, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09', NULL),
(36, 2516, 'RD_Chandigarh', 2885, 'STC Badal ', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09', NULL),
(37, 2516, 'RD_Chandigarh', 2881, 'STC Bilaspur', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09', NULL),
(38, 2516, 'RD_Chandigarh', 2861, 'STC Jammu ', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09', NULL),
(39, 2516, 'RD_Chandigarh', 2859, 'STC Kargil', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09', NULL),
(40, 2516, 'RD_Chandigarh', 2851, 'STC Ludhiana', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09', NULL),
(41, 2516, 'RD_Chandigarh', 2849, 'STC Mastunasahib ', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09', NULL),
(42, 2522, 'RD_Gandhinagar', 2887, 'STC Alwar', 'STC', 1, 2522, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09', NULL),
(43, 2522, 'RD_Gandhinagar', 2863, 'STC Jaipur', 'STC', 1, 2522, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10', NULL),
(44, 2522, 'RD_Gandhinagar', 2860, 'STC Jodhpur', 'STC', 1, 2522, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10', NULL),
(45, 2517, 'RD_Guwahati', 2869, 'STC Golaghat ', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10', NULL),
(46, 2517, 'RD_Guwahati', 2856, 'STC Kokrajhar ', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10', NULL),
(47, 2517, 'RD_Guwahati', 2847, 'STC Naharlagun', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10', NULL),
(48, 2517, 'RD_Guwahati', 2846, 'STC Namchi Sikkim', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10', NULL),
(49, 2517, 'RD_Guwahati', 2845, 'STC NEHU- Shillong', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10', NULL),
(50, 2517, 'RD_Guwahati', 10679, 'STC SOLALGAON', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10', NULL),
(51, 2517, 'RD_Guwahati', 2828, 'STC Tinsukia', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10', NULL),
(52, 2523, 'RD_Imphal', 2888, 'STC Aizawl', 'STC', 1, 2523, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10', NULL),
(53, 2523, 'RD_Imphal', 2872, 'STC Dimapur', 'STC', 1, 2523, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10', NULL),
(54, 2523, 'RD_Imphal', 2865, 'STC Imphal', 'STC', 1, 2523, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10', NULL),
(55, 2523, 'RD_Imphal', 2827, 'STC Utlou', 'STC', 1, 2523, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10', NULL),
(56, 2518, 'RD_Kolkata', 2889, 'STC Agartala', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11', NULL),
(57, 2518, 'RD_Kolkata', 2880, 'STC Bolpur', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11', NULL),
(58, 2518, 'RD_Kolkata', 2879, 'STC Burdwan', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11', NULL),
(59, 2518, 'RD_Kolkata', 2876, 'STC Cuttack ', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11', NULL),
(60, 2518, 'RD_Kolkata', 2868, 'STC Hazaribagh', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11', NULL),
(61, 2518, 'RD_Kolkata', 2862, 'STC Jalpaiguri', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11', NULL),
(62, 2518, 'RD_Kolkata', 2857, 'STC Kishanganj', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11', NULL),
(63, 2518, 'RD_Kolkata', 2852, 'STC Lebong ', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11', NULL),
(64, 2518, 'RD_Kolkata', 2843, 'STC Patna ', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11', NULL),
(65, 2518, 'RD_Kolkata', 2841, 'STC Port Blair', 'STC', 1, 2518, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12', NULL),
(66, 2518, 'RD_Kolkata', 2836, 'STC Ranchi', 'STC', 1, 2518, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12', NULL),
(67, 2518, 'RD_Kolkata', 2833, 'STC Sundargarh', 'STC', 1, 2518, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12', NULL),
(68, 2519, 'RD_Lucknow', 2883, 'STC Bareily', 'STC', 1, 2519, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12', NULL),
(69, 2519, 'RD_Lucknow', 2858, 'STC Kashipur', 'STC', 1, 2519, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12', NULL),
(70, 2519, 'RD_Lucknow', 2839, 'STC Raibareily', 'STC', 1, 2519, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12', NULL),
(71, 2519, 'RD_Lucknow', 2835, 'STC Saifai', 'STC', 1, 2519, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13', NULL),
(72, 2519, 'RD_Lucknow', 2826, 'STC Varanasi', 'STC', 1, 2519, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13', NULL),
(73, 2520, 'RD_Mumbai', 10683, 'STC Peddem', 'STC', 1, 2520, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13', NULL),
(74, 2520, 'RD_Mumbai', 2842, 'STC Ponda', 'STC', 1, 2520, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13', NULL),
(75, 2524, 'RD_Patiala', 2998, 'NIS Patiala ', 'STC', 1, 2524, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13', NULL),
(76, 2521, 'RD_Sonepat', 2882, 'STC Bawana', 'STC', 1, 2521, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13', NULL),
(77, 2521, 'RD_Sonepat', 3085, 'STC Bhiwani', 'STC', 1, 2521, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13', NULL),
(78, 2521, 'RD_Sonepat', 2867, 'STC Hisar', 'STC', 1, 2521, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13', NULL),
(79, 2521, 'RD_Sonepat', 2853, 'STC Kurukshetra', 'STC', 1, 2521, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13', NULL),
(80, 2513, 'RD_Trivandrum', 2886, 'STC Androth   ', 'STC', 1, 2513, '2022-11-24 06:40:13', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:13', NULL),
(81, 2513, 'RD_Trivandrum', 2878, 'STC Calicut ', 'STC', 1, 2513, '2022-11-24 06:40:13', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:13', NULL),
(82, 2513, 'RD_Trivandrum', 2877, 'STC Chennai ', 'STC', 1, 2513, '2022-11-24 06:40:13', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:13', NULL),
(83, 2513, 'RD_Trivandrum', 2855, 'STC Kollam ', 'STC', 1, 2513, '2022-11-24 06:40:13', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:13', NULL),
(84, 2513, 'RD_Trivandrum', 2848, 'STC Mayiladuthurai', 'STC', 1, 2513, '2022-11-24 06:40:13', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:13', NULL),
(85, 2513, 'RD_Trivandrum', 2840, 'STC Puducherry', 'STC', 1, 2513, '2022-11-24 06:40:13', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:13', NULL),
(86, 2513, 'RD_Trivandrum', 2834, 'STC Salem ', 'STC', 1, 2513, '2022-11-24 06:40:14', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:14', NULL),
(87, 2513, 'RD_Trivandrum', 2832, 'STC Thalaserry ', 'STC', 1, 2513, '2022-11-24 06:40:14', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:14', NULL),
(88, 2513, 'RD_Trivandrum', 2830, 'STC Thrissur ', 'STC', 1, 2513, '2022-11-24 06:40:14', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:14', NULL),
(89, 2513, 'RD_Trivandrum', 2825, 'STC Yanam ', 'STC', 1, 2513, '2022-11-24 06:40:14', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:14', NULL),
(90, 2514, 'RC_Bangalore', 2514, 'RC_Bangalore', 'RC', 1, 2514, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14', NULL),
(91, 2515, 'RC_Bhopal', 2515, 'RC_Bhopal', 'RC', 1, 2515, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14', NULL),
(92, 2516, 'RC_Chandigarh', 2516, 'RC_Chandigarh', 'RC', 1, 2516, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14', NULL),
(93, 2522, 'RC_Gandhinagar', 2522, 'RC_Gandhinagar', 'RC', 1, 2522, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14', NULL),
(94, 2517, 'RC_Guwahati', 2517, 'RC_Guwahati', 'RC', 1, 2517, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14', NULL),
(95, 2523, 'RC_Imphal', 2523, 'RC_Imphal', 'RC', 1, 2523, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14', NULL),
(96, 2518, 'RC_Kolkata', 2518, 'RC_Kolkata', 'RC', 1, 2518, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14', NULL),
(97, 2519, 'RC_Lucknow', 2519, 'RC_Lucknow', 'RC', 1, 2519, '2022-11-24 06:40:15', '2022-11-24 06:40:15', NULL, '2022-11-24 06:40:15', NULL),
(98, 2520, 'RC_Mumbai', 2520, 'RC_Mumbai', 'RC', 1, 2520, '2022-11-24 06:40:15', '2022-11-24 06:40:15', NULL, '2022-11-24 06:40:15', NULL),
(99, 2524, 'RC_Patiala', 2524, 'RC_Patiala', 'RC', 1, 2524, '2022-11-24 06:40:15', '2022-11-24 06:40:15', NULL, '2022-11-24 06:40:15', NULL),
(100, 2521, 'RC_Sonepat', 2521, 'RC_Sonepat', 'RC', 1, 2521, '2022-11-24 06:40:15', '2022-11-24 06:40:15', NULL, '2022-11-24 06:40:15', NULL),
(101, 5924, 'RC_Stadia', 5924, 'RC_Stadia', 'RC', 1, 5924, '2022-11-24 06:40:15', '2022-11-24 06:40:15', NULL, '2022-11-24 06:40:15', NULL),
(102, 2513, 'RC_Trivandrum', 2513, 'RC_Trivandrum', 'RC', 1, 2513, '2022-11-24 06:40:15', '2022-12-01 10:08:06', NULL, '2022-11-24 06:40:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rcacademymappings_01122022`
--

CREATE TABLE `rcacademymappings_01122022` (
  `id` int(11) NOT NULL,
  `rc_id` int(11) DEFAULT NULL,
  `RC_Name` varchar(255) DEFAULT NULL,
  `academy_id` int(11) DEFAULT NULL,
  `academy_name` varchar(255) DEFAULT NULL,
  `academy_type` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rcacademymappings_01122022`
--

INSERT INTO `rcacademymappings_01122022` (`id`, `rc_id`, `RC_Name`, `academy_id`, `academy_name`, `academy_type`, `status`, `created_by`, `created_at`, `updated_at`, `updated_by`, `deleted`) VALUES
(1, 2514, 'RD_Bangalore', 3020, 'NCOE Bengaluru', 'NCOE', 1, 2514, '2022-11-24 06:40:06', '2022-11-24 06:40:06', NULL, '2022-11-24 06:40:06'),
(2, 2515, 'RD_Bhopal', 3019, 'NCOE Bhopal', 'NCOE', 1, 2515, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(3, 2516, 'RD_Chandigarh', 3001, 'NCOE DHARAMSHALA', 'NCOE', 1, 2516, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(4, 2516, 'RD_Chandigarh', 11859, 'NCOE Hamirpur', 'NCOE', 1, 2516, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(5, 2522, 'RD_Gandhinagar', 3015, 'NCOE Gandhinagar', 'NCOE', 1, 2522, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(6, 2517, 'RD_Guwahati', 3014, 'NCOE Guwahati', 'NCOE', 1, 2517, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(7, 2517, 'RD_Guwahati', 3004, 'NCOE Sangey Lhaden Sports Academy (SLSA) Itanagar', 'NCOE', 1, 2517, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(8, 2523, 'RD_Imphal', 3012, 'NCOE Imphal', 'NCOE', 1, 2523, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(9, 2518, 'RD_Kolkata', 3000, 'NCOE JAGATPUR', 'NCOE', 1, 2518, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(10, 2518, 'RD_Kolkata', 3010, 'NCOE Kolkata', 'NCOE', 1, 2518, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(11, 2519, 'RD_Lucknow', 3009, 'NCOE Lucknow', 'NCOE', 1, 2519, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(12, 2520, 'RD_Mumbai', 3021, 'NCOE Aurangabad', 'NCOE', 1, 2520, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(13, 2520, 'RD_Mumbai', 3007, 'NCOE Mumbai', 'NCOE', 1, 2520, '2022-11-24 06:40:07', '2022-11-24 06:40:07', NULL, '2022-11-24 06:40:07'),
(14, 2524, 'RD_Patiala', 2999, 'NCOE Patiala', 'NCOE', 1, 2524, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(15, 2521, 'RD_Sonepat', 3006, 'NCOE National Boxing Academy (KI), Rohtak', 'NCOE', 1, 2521, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(16, 2521, 'RD_Sonepat', 3003, 'NCOE Sonepat', 'NCOE', 1, 2521, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(17, 5924, 'RD_Stadia', 3017, 'NCOE Dr. Karni Singh Shooting Range', 'NCOE', 1, 5924, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(18, 5924, 'RD_Stadia', 3016, 'NCOE Dr. SPM Swimming Pool Complex', 'NCOE', 1, 5924, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(19, 5924, 'RD_Stadia', 3013, 'NCOE I G Stadium', 'NCOE', 1, 5924, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(20, 5924, 'RD_Stadia', 3011, 'NCOE J N Stadium', 'NCOE', 1, 5924, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(21, 5924, 'RD_Stadia', 3008, 'NCOE MDC National Stadium', 'NCOE', 1, 5924, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(22, 2512, 'RD_Trivandrum', 3005, 'NCOE National Water Sports Academy (KI), Alleppey', 'NCOE', 1, 2512, '2022-11-24 06:40:08', '2022-12-01 09:23:32', NULL, '2022-11-24 06:40:08'),
(23, 2512, 'RD_Trivandrum', 3002, 'NCOE THIRUVANANTHAPURAM', 'NCOE', 1, 2512, '2022-11-24 06:40:08', '2022-12-01 09:23:49', NULL, '2022-11-24 06:40:08'),
(24, 2514, 'RD_Bangalore', 2854, 'SAI SLKIC Kurnool', 'STC', 1, 2514, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(25, 2514, 'RD_Bangalore', 2884, 'STC Bangalore', 'STC', 1, 2514, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(26, 2514, 'RD_Bangalore', 2874, 'STC Dharwad', 'STC', 1, 2514, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(27, 2514, 'RD_Bangalore', 2871, 'STC Eluru', 'STC', 1, 2514, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(28, 2514, 'RD_Bangalore', 2866, 'STC Hyderabad', 'STC', 1, 2514, '2022-11-24 06:40:08', '2022-11-24 06:40:08', NULL, '2022-11-24 06:40:08'),
(29, 2514, 'RD_Bangalore', 2850, 'STC Madikeri', 'STC', 1, 2514, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(30, 2514, 'RD_Bangalore', 2824, 'STC_Vishakhapatnam', 'STC', 1, 2514, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(31, 2515, 'RD_Bhopal', 2875, 'STC Dhar', 'STC', 1, 2515, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(32, 2515, 'RD_Bhopal', 2864, 'STC Jabalpur', 'STC', 1, 2515, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(33, 2515, 'RD_Bhopal', 2838, 'STC Raipur', 'STC', 1, 2515, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(34, 2515, 'RD_Bhopal', 2837, 'STC Rajnandgaon ', 'STC', 1, 2515, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(35, 2515, 'RD_Bhopal', 2829, 'STC Tikamgarh', 'STC', 1, 2515, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(36, 2516, 'RD_Chandigarh', 2885, 'STC Badal ', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(37, 2516, 'RD_Chandigarh', 2881, 'STC Bilaspur', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(38, 2516, 'RD_Chandigarh', 2861, 'STC Jammu ', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(39, 2516, 'RD_Chandigarh', 2859, 'STC Kargil', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(40, 2516, 'RD_Chandigarh', 2851, 'STC Ludhiana', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(41, 2516, 'RD_Chandigarh', 2849, 'STC Mastunasahib ', 'STC', 1, 2516, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(42, 2522, 'RD_Gandhinagar', 2887, 'STC Alwar', 'STC', 1, 2522, '2022-11-24 06:40:09', '2022-11-24 06:40:09', NULL, '2022-11-24 06:40:09'),
(43, 2522, 'RD_Gandhinagar', 2863, 'STC Jaipur', 'STC', 1, 2522, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(44, 2522, 'RD_Gandhinagar', 2860, 'STC Jodhpur', 'STC', 1, 2522, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(45, 2517, 'RD_Guwahati', 2869, 'STC Golaghat ', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(46, 2517, 'RD_Guwahati', 2856, 'STC Kokrajhar ', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(47, 2517, 'RD_Guwahati', 2847, 'STC Naharlagun', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(48, 2517, 'RD_Guwahati', 2846, 'STC Namchi Sikkim', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(49, 2517, 'RD_Guwahati', 2845, 'STC NEHU- Shillong', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(50, 2517, 'RD_Guwahati', 10679, 'STC SOLALGAON', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(51, 2517, 'RD_Guwahati', 2828, 'STC Tinsukia', 'STC', 1, 2517, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(52, 2523, 'RD_Imphal', 2888, 'STC Aizawl', 'STC', 1, 2523, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(53, 2523, 'RD_Imphal', 2872, 'STC Dimapur', 'STC', 1, 2523, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(54, 2523, 'RD_Imphal', 2865, 'STC Imphal', 'STC', 1, 2523, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(55, 2523, 'RD_Imphal', 2827, 'STC Utlou', 'STC', 1, 2523, '2022-11-24 06:40:10', '2022-11-24 06:40:10', NULL, '2022-11-24 06:40:10'),
(56, 2518, 'RD_Kolkata', 2889, 'STC Agartala', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(57, 2518, 'RD_Kolkata', 2880, 'STC Bolpur', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(58, 2518, 'RD_Kolkata', 2879, 'STC Burdwan', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(59, 2518, 'RD_Kolkata', 2876, 'STC Cuttack ', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(60, 2518, 'RD_Kolkata', 2868, 'STC Hazaribagh', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(61, 2518, 'RD_Kolkata', 2862, 'STC Jalpaiguri', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(62, 2518, 'RD_Kolkata', 2857, 'STC Kishanganj', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(63, 2518, 'RD_Kolkata', 2852, 'STC Lebong ', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(64, 2518, 'RD_Kolkata', 2843, 'STC Patna ', 'STC', 1, 2518, '2022-11-24 06:40:11', '2022-11-24 06:40:11', NULL, '2022-11-24 06:40:11'),
(65, 2518, 'RD_Kolkata', 2841, 'STC Port Blair', 'STC', 1, 2518, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12'),
(66, 2518, 'RD_Kolkata', 2836, 'STC Ranchi', 'STC', 1, 2518, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12'),
(67, 2518, 'RD_Kolkata', 2833, 'STC Sundargarh', 'STC', 1, 2518, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12'),
(68, 2519, 'RD_Lucknow', 2883, 'STC Bareily', 'STC', 1, 2519, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12'),
(69, 2519, 'RD_Lucknow', 2858, 'STC Kashipur', 'STC', 1, 2519, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12'),
(70, 2519, 'RD_Lucknow', 2839, 'STC Raibareily', 'STC', 1, 2519, '2022-11-24 06:40:12', '2022-11-24 06:40:12', NULL, '2022-11-24 06:40:12'),
(71, 2519, 'RD_Lucknow', 2835, 'STC Saifai', 'STC', 1, 2519, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(72, 2519, 'RD_Lucknow', 2826, 'STC Varanasi', 'STC', 1, 2519, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(73, 2520, 'RD_Mumbai', 10683, 'STC Peddem', 'STC', 1, 2520, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(74, 2520, 'RD_Mumbai', 2842, 'STC Ponda', 'STC', 1, 2520, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(75, 2524, 'RD_Patiala', 2998, 'STC Patiala', 'STC', 1, 2524, '2022-11-24 06:40:13', '2022-11-25 05:13:30', NULL, '2022-11-24 06:40:13'),
(76, 2521, 'RD_Sonepat', 2882, 'STC Bawana', 'STC', 1, 2521, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(77, 2521, 'RD_Sonepat', 3085, 'STC Bhiwani', 'STC', 1, 2521, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(78, 2521, 'RD_Sonepat', 2867, 'STC Hisar', 'STC', 1, 2521, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(79, 2521, 'RD_Sonepat', 2853, 'STC Kurukshetra', 'STC', 1, 2521, '2022-11-24 06:40:13', '2022-11-24 06:40:13', NULL, '2022-11-24 06:40:13'),
(80, 2512, 'RD_Trivandrum', 2886, 'STC Androth   ', 'STC', 1, 2512, '2022-11-24 06:40:13', '2022-12-01 09:23:52', NULL, '2022-11-24 06:40:13'),
(81, 2512, 'RD_Trivandrum', 2878, 'STC Calicut ', 'STC', 1, 2512, '2022-11-24 06:40:13', '2022-12-01 09:24:38', NULL, '2022-11-24 06:40:13'),
(82, 2512, 'RD_Trivandrum', 2877, 'STC Chennai ', 'STC', 1, 2512, '2022-11-24 06:40:13', '2022-12-01 09:24:47', NULL, '2022-11-24 06:40:13'),
(83, 2512, 'RD_Trivandrum', 2855, 'STC Kollam ', 'STC', 1, 2512, '2022-11-24 06:40:13', '2022-12-01 09:25:09', NULL, '2022-11-24 06:40:13'),
(84, 2512, 'RD_Trivandrum', 2848, 'STC Mayiladuthurai', 'STC', 1, 2512, '2022-11-24 06:40:13', '2022-12-01 09:25:06', NULL, '2022-11-24 06:40:13'),
(85, 2512, 'RD_Trivandrum', 2840, 'STC Puducherry', 'STC', 1, 2512, '2022-11-24 06:40:13', '2022-12-01 09:25:03', NULL, '2022-11-24 06:40:13'),
(86, 2512, 'RD_Trivandrum', 2834, 'STC Salem ', 'STC', 1, 2512, '2022-11-24 06:40:14', '2022-12-01 09:25:00', NULL, '2022-11-24 06:40:14'),
(87, 2512, 'RD_Trivandrum', 2832, 'STC Thalaserry ', 'STC', 1, 2512, '2022-11-24 06:40:14', '2022-12-01 09:24:56', NULL, '2022-11-24 06:40:14'),
(88, 2512, 'RD_Trivandrum', 2830, 'STC Thrissur ', 'STC', 1, 2512, '2022-11-24 06:40:14', '2022-12-01 09:24:53', NULL, '2022-11-24 06:40:14'),
(89, 2512, 'RD_Trivandrum', 2825, 'STC Yanam ', 'STC', 1, 2512, '2022-11-24 06:40:14', '2022-12-01 09:24:50', NULL, '2022-11-24 06:40:14'),
(90, 2514, 'RC_Bangalore', 2514, 'RC_Bangalore', 'RC', 1, 2514, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14'),
(91, 2515, 'RC_Bhopal', 2515, 'RC_Bhopal', 'RC', 1, 2515, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14'),
(92, 2516, 'RC_Chandigarh', 2516, 'RC_Chandigarh', 'RC', 1, 2516, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14'),
(93, 2522, 'RC_Gandhinagar', 2522, 'RC_Gandhinagar', 'RC', 1, 2522, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14'),
(94, 2517, 'RC_Guwahati', 2517, 'RC_Guwahati', 'RC', 1, 2517, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14'),
(95, 2523, 'RC_Imphal', 2523, 'RC_Imphal', 'RC', 1, 2523, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14'),
(96, 2518, 'RC_Kolkata', 2518, 'RC_Kolkata', 'RC', 1, 2518, '2022-11-24 06:40:14', '2022-11-24 06:40:14', NULL, '2022-11-24 06:40:14'),
(97, 2519, 'RC_Lucknow', 2519, 'RC_Lucknow', 'RC', 1, 2519, '2022-11-24 06:40:15', '2022-11-24 06:40:15', NULL, '2022-11-24 06:40:15'),
(98, 2520, 'RC_Mumbai', 2520, 'RC_Mumbai', 'RC', 1, 2520, '2022-11-24 06:40:15', '2022-11-24 06:40:15', NULL, '2022-11-24 06:40:15'),
(99, 2524, 'RC_Patiala', 2524, 'RC_Patiala', 'RC', 1, 2524, '2022-11-24 06:40:15', '2022-11-24 06:40:15', NULL, '2022-11-24 06:40:15'),
(100, 2521, 'RC_Sonepat', 2521, 'RC_Sonepat', 'RC', 1, 2521, '2022-11-24 06:40:15', '2022-11-24 06:40:15', NULL, '2022-11-24 06:40:15'),
(101, 5924, 'RC_Stadia', 5924, 'RC_Stadia', 'RC', 1, 5924, '2022-11-24 06:40:15', '2022-11-24 06:40:15', NULL, '2022-11-24 06:40:15'),
(102, 2512, 'RC_Trivandrum', 2513, 'RC_Trivandrum', 'RC', 1, 2512, '2022-11-24 06:40:15', '2022-12-01 09:24:42', NULL, '2022-11-24 06:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `rcacademymappings_24-11-2022`
--

CREATE TABLE `rcacademymappings_24-11-2022` (
  `id` int(11) NOT NULL,
  `rc_id` int(11) DEFAULT NULL,
  `academy_id` int(11) DEFAULT NULL,
  `academy_name` varchar(255) DEFAULT NULL,
  `academy_type` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rcacademymappings_24-11-2022`
--

INSERT INTO `rcacademymappings_24-11-2022` (`id`, `rc_id`, `academy_id`, `academy_name`, `academy_type`, `status`, `created_by`, `created_at`, `updated_at`, `updated_by`, `deleted`) VALUES
(1, 2517, 2517, 'NCOE Guwahati', 'NCOE', 1, 2517, '2022-11-17 14:00:13', '2022-11-23 05:41:19', NULL, '2022-11-17 14:00:13'),
(2, 2517, 3004, 'NCOE Sangey Lhaden Sports Academy (SLSA) Itanagar', 'NCOE', 1, 2517, '2022-11-17 14:00:13', '2022-11-17 14:00:13', NULL, '2022-11-17 14:00:13'),
(3, 2514, 3020, 'NCOE Bengaluru', 'NCOE', 1, 2514, '2022-11-17 14:00:13', '2022-11-17 14:00:13', NULL, '2022-11-17 14:00:13'),
(4, 2515, 3019, 'NCOE Bhopal', 'NCOE', 1, 2515, '2022-11-17 14:00:13', '2022-11-17 14:00:13', NULL, '2022-11-17 14:00:13'),
(5, 2516, 3001, 'NCOE DHARAMSHALA', 'NCOE', 1, 2516, '2022-11-17 14:00:13', '2022-11-17 14:00:13', NULL, '2022-11-17 14:00:13'),
(6, 2516, 11859, 'NCOE Hamirpur', 'NCOE', 1, 2516, '2022-11-17 14:00:13', '2022-11-17 14:00:13', NULL, '2022-11-17 14:00:13'),
(7, 2523, 3012, 'NCOE Imphal', 'NCOE', 1, 2523, '2022-11-17 14:00:13', '2022-11-17 14:00:13', NULL, '2022-11-17 14:00:13'),
(8, 2523, 3012, 'NCOE Imphal', 'NCOE', 1, 2523, '2022-11-17 14:00:13', '2022-11-17 14:00:13', NULL, '2022-11-17 14:00:13'),
(9, 2519, 3009, 'NCOE Lucknow', 'NCOE', 1, 2519, '2022-11-17 14:00:13', '2022-11-17 14:00:13', NULL, '2022-11-17 14:00:13'),
(10, 2518, 3000, 'NCOE JAGATPUR', 'NCOE', 1, 2518, '2022-11-17 14:00:13', '2022-11-17 14:00:13', NULL, '2022-11-17 14:00:13'),
(11, 2518, 3010, 'NCOE Kolkata', 'NCOE', 1, 2518, '2022-11-17 14:00:13', '2022-11-17 14:00:13', NULL, '2022-11-17 14:00:13'),
(12, 2520, 3021, 'NCOE Aurangabad', 'NCOE', 1, 2520, '2022-11-17 14:00:14', '2022-11-17 14:00:14', NULL, '2022-11-17 14:00:14'),
(13, 2520, 3007, 'NCOE Mumbai', 'NCOE', 1, 2520, '2022-11-17 14:00:14', '2022-11-17 14:00:14', NULL, '2022-11-17 14:00:14'),
(14, 2521, 3003, 'NCOE Sonepat', 'NCOE', 1, 2521, '2022-11-17 14:00:14', '2022-11-17 14:00:14', NULL, '2022-11-17 14:00:14'),
(15, 2521, 3006, 'NCOE National Boxing Academy (KI), Rohtak', 'NCOE', 1, 2521, '2022-11-17 14:00:14', '2022-11-17 14:00:14', NULL, '2022-11-17 14:00:14'),
(16, 2513, 3005, 'NCOE National Water Sports Academy (KI), Alleppey', 'NCOE', 1, 2513, '2022-11-17 14:00:14', '2022-11-17 14:00:14', NULL, '2022-11-17 14:00:14'),
(17, 2513, 3002, 'NCOE THIRUVANANTHAPURAM', 'NCOE', 1, 2513, '2022-11-17 14:00:14', '2022-11-17 14:00:14', NULL, '2022-11-17 14:00:14'),
(18, 2522, 3015, 'NCOE Gandhinagar', 'NCOE', 1, 2522, '2022-11-17 14:00:14', '2022-11-17 14:00:14', NULL, '2022-11-17 14:00:14'),
(19, 2524, 2999, 'NCOE Patiala', 'NCOE', 1, 2524, '2022-11-17 14:00:14', '2022-11-17 14:00:14', NULL, '2022-11-17 14:00:14'),
(20, 2517, 2869, 'STC Golaghat', 'NCOE', 1, 2517, '2022-11-23 05:39:52', '2022-11-23 05:39:52', NULL, '2022-11-23 05:39:52'),
(21, 2517, 2856, 'STC Kokrajhar', 'NCOE', 1, 2517, '2022-11-23 05:40:22', '2022-11-23 05:40:22', NULL, '2022-11-23 05:40:22'),
(22, 2517, 2847, 'STC Naharlagun', 'NCOE', 1, 2517, '2022-11-23 05:40:32', '2022-11-23 05:40:32', NULL, '2022-11-23 05:40:32'),
(23, 2517, 2846, 'STC Namchi Sikkim', 'NCOE', 1, 2517, '2022-11-23 05:40:41', '2022-11-23 05:40:41', NULL, '2022-11-23 05:40:41'),
(24, 2517, 2845, 'STC NEHU- Shillong', 'NCOE', 1, 2517, '2022-11-23 05:40:51', '2022-11-23 05:40:51', NULL, '2022-11-23 05:40:51'),
(25, 2517, 10679, 'STC SOLALGAON', 'NCOE', 1, 2517, '2022-11-23 05:41:00', '2022-11-23 05:41:00', NULL, '2022-11-23 05:41:00'),
(26, 2517, 2828, 'STC Tinsukia', 'NCOE', 1, 2517, '2022-11-23 05:41:09', '2022-11-23 05:41:09', NULL, '2022-11-23 05:41:09');

-- --------------------------------------------------------

--
-- Table structure for table `rc_details`
--

CREATE TABLE `rc_details` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rc_details`
--

INSERT INTO `rc_details` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'RC MUMBAI', '2022-09-20 07:30:07', NULL),
(2, 'RC GANDHINAGAR', '2022-09-20 07:30:07', NULL),
(3, 'RC BHOPAL', '2022-09-20 07:30:07', NULL),
(4, 'RC DELHI', '2022-09-20 07:30:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 39, 'OPS', '2022-11-07 05:24:04', NULL),
(2, 46, 'RC', '2022-11-07 05:24:00', NULL),
(3, 29, 'NCOE', '2022-12-27 09:28:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `route` varchar(255) DEFAULT NULL,
  `route_parameter` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `route`, `route_parameter`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'INFRASTRUCTURE', 'manage.infrastructure.index', 'infrastructure', 1, 1, NULL, NULL, '2022-10-31 12:07:15', NULL, NULL),
(2, 'FINANCE', 'managefinance.index', 'finance', 1, 1, NULL, NULL, '2022-10-31 07:05:36', NULL, NULL),
(3, 'PROCUREMENT', 'manage.procurement.index', 'procurement', 1, 1, NULL, NULL, '2022-10-31 07:05:45', NULL, NULL),
(4, 'MISCELLANEOUS', 'manage.miscellaneous.index', 'miscellaneous', 1, 1, NULL, NULL, '2022-10-31 07:05:59', NULL, NULL),
(5, 'PENDING DEMANDS', 'pendingdemands.index', 'pendingdemands', 1, 1, NULL, NULL, '2022-10-31 11:44:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `rc_id` text DEFAULT NULL,
  `temp_section_id` text DEFAULT NULL,
  `categories_id` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `name`, `from_date`, `to_date`, `rc_id`, `temp_section_id`, `categories_id`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'October Monitoring Template', '2022-11-20', '2022-12-30', '2522,2523,2517,2518,5924,2513,2514,2515,2516,2519,2520,2521,2524', '1,2,3,4,5', '2', 1, 2119, 2119, NULL, '2022-12-28 13:14:04', '2022-12-28 07:44:04', NULL),
(2, 'uohoip', '2022-11-01', '2022-11-10', '2522,2523,2554,2717,5895,5924,2505,2517,2556,2511,2518,2458,2480,2509,2558,2560,2513,2514,2515,2702,2516,2519,2520,2521,2524', '1,2,3,4,5', '2', 1, 2119, NULL, 2119, '2022-11-30 06:32:11', '2022-11-30 01:02:11', '2022-11-30 01:02:11'),
(3, 'November Monitoring Template', '2022-11-01', '2022-11-10', '2522,2523,2554,2717,5895,5924,2505,2517,2556,2511,2518,2458,2480,2509,2558,2560,2513,2514,2515,2702,2516,2519,2520,2521,2524', '1,2,3,4,5', '1', 1, 2119, NULL, 2119, '2022-11-30 06:58:48', '2022-11-30 01:28:48', '2022-11-30 01:28:48'),
(4, 'November', '2022-12-01', '2022-12-02', '2522,2523,5924,2517,2518,2513,2514,2515,2516,2519,2520,2521,2524', '1,2,3,4,5', '1,2', 1, 2119, 2119, NULL, '2022-12-05 05:00:24', '2022-12-04 23:30:24', NULL),
(5, 'Dec - Test', '2022-12-01', '2022-12-30', '2522,2523,2717', '1,2,3,4,5', '1,2', 1, 2119, 2119, 2119, '2022-12-05 05:40:30', '2022-12-05 00:10:30', '2022-12-05 00:10:30'),
(6, 'Nov-Testing', '2022-12-01', '2022-12-31', '2522,2523,5895,2517,2518,5924,2513,2514,2515,2516,2519,2520,2521,2524', '1,2,3,4,5', '1,2', 1, 2119, 2119, NULL, '2022-12-29 10:55:33', '2022-12-29 05:25:33', NULL),
(7, 'december 2022', '2022-12-01', '2022-12-31', '2522,2523,5895,2517,2518,5924,2513,2514,2515,2516,2519,2520,2521,2524', '1,2,3,4,5', '1,2', 1, 2119, 2119, 2119, '2022-12-28 05:20:49', '2022-12-27 23:50:49', '2022-12-27 23:50:49'),
(8, 'december 2022 part 1', '2022-12-01', '2022-12-31', '2522,2519', '1,2,3,4,5', '1', 1, 2119, 2119, 2119, '2022-12-29 09:33:26', '2022-12-29 04:03:26', '2022-12-29 04:03:26'),
(9, 'Testing DECEMBER 2022', '2022-12-01', '2022-12-31', '2522,2519', '1,2,3,4,5', '1,2', 1, 2119, 2119, 2119, '2022-12-29 09:33:22', '2022-12-29 04:03:22', '2022-12-29 04:03:22'),
(10, 'December  2022', '2022-12-01', '2022-12-31', '2522,2523,5895,2517,2518,5924,2513,2514,2515,2516,2519,2520,2521,2524', '1,2,3,4,5', '1,2', 1, 2119, NULL, NULL, '2022-12-29 05:28:18', '2022-12-29 05:28:18', NULL),
(11, 'december 2022 part 2', '2022-12-01', '2022-12-31', '2522', '1,2,3,4,5', '1,2', 1, 2119, NULL, NULL, '2022-12-30 03:11:48', '2022-12-30 03:11:48', NULL),
(12, 'Testing January', '2023-01-01', '2023-01-31', '2522,2518,2519', '1,2,3,4,5', '1,2', 1, 2119, NULL, NULL, '2023-01-02 03:08:02', '2023-01-02 03:08:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `template_for_rc`
--

CREATE TABLE `template_for_rc` (
  `id` int(11) NOT NULL,
  `template_id` bigint(20) NOT NULL,
  `rc_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `template_for_rc`
--

INSERT INTO `template_for_rc` (`id`, `template_id`, `rc_id`, `created_at`, `updated_at`) VALUES
(13, 2, 2522, '2022-11-30 01:01:51', '2022-11-30 01:01:51'),
(14, 2, 2523, '2022-11-30 01:01:51', '2022-11-30 01:01:51'),
(15, 2, 2554, '2022-11-30 01:01:51', '2022-11-30 01:01:51'),
(16, 2, 2717, '2022-11-30 01:01:51', '2022-11-30 01:01:51'),
(17, 2, 5895, '2022-11-30 01:01:51', '2022-11-30 01:01:51'),
(18, 2, 5924, '2022-11-30 01:01:51', '2022-11-30 01:01:51'),
(19, 2, 2505, '2022-11-30 01:01:51', '2022-11-30 01:01:51'),
(20, 2, 2517, '2022-11-30 01:01:51', '2022-11-30 01:01:51'),
(21, 2, 2556, '2022-11-30 01:01:51', '2022-11-30 01:01:51'),
(22, 2, 2511, '2022-11-30 01:01:51', '2022-11-30 01:01:51'),
(23, 2, 2518, '2022-11-30 01:01:51', '2022-11-30 01:01:51'),
(24, 2, 2458, '2022-11-30 01:01:51', '2022-11-30 01:01:51'),
(25, 2, 2480, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(26, 2, 2509, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(27, 2, 2558, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(28, 2, 2560, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(29, 2, 2513, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(30, 2, 2514, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(31, 2, 2515, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(32, 2, 2702, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(33, 2, 2516, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(34, 2, 2519, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(35, 2, 2520, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(36, 2, 2521, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(37, 2, 2524, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(38, 3, 2522, '2022-11-30 01:01:56', '2022-11-30 01:01:56'),
(39, 3, 2523, '2022-11-30 01:01:56', '2022-11-30 01:01:56'),
(40, 3, 2554, '2022-11-30 01:01:56', '2022-11-30 01:01:56'),
(41, 3, 2717, '2022-11-30 01:01:56', '2022-11-30 01:01:56'),
(42, 3, 5895, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(43, 3, 5924, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(44, 3, 2505, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(45, 3, 2517, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(46, 3, 2556, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(47, 3, 2511, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(48, 3, 2518, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(49, 3, 2458, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(50, 3, 2480, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(51, 3, 2509, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(52, 3, 2558, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(53, 3, 2560, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(54, 3, 2513, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(55, 3, 2514, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(56, 3, 2515, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(57, 3, 2702, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(58, 3, 2516, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(59, 3, 2519, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(60, 3, 2520, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(61, 3, 2521, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(62, 3, 2524, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(219, 4, 2522, '2022-12-04 23:30:24', '2022-12-04 23:30:24'),
(220, 4, 2523, '2022-12-04 23:30:24', '2022-12-04 23:30:24'),
(221, 4, 5924, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(222, 4, 2517, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(223, 4, 2518, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(224, 4, 2513, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(225, 4, 2514, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(226, 4, 2515, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(227, 4, 2516, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(228, 4, 2519, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(229, 4, 2520, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(230, 4, 2521, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(231, 4, 2524, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(237, 5, 2522, '2022-12-05 00:03:20', '2022-12-05 00:03:20'),
(238, 5, 2523, '2022-12-05 00:03:20', '2022-12-05 00:03:20'),
(239, 5, 2717, '2022-12-05 00:03:20', '2022-12-05 00:03:20'),
(246, 7, 2522, '2022-12-27 23:40:34', '2022-12-27 23:40:34'),
(247, 7, 2523, '2022-12-27 23:40:34', '2022-12-27 23:40:34'),
(248, 7, 5895, '2022-12-27 23:40:34', '2022-12-27 23:40:34'),
(249, 7, 2517, '2022-12-27 23:40:34', '2022-12-27 23:40:34'),
(250, 7, 2518, '2022-12-27 23:40:34', '2022-12-27 23:40:34'),
(251, 7, 5924, '2022-12-27 23:40:34', '2022-12-27 23:40:34'),
(252, 7, 2513, '2022-12-27 23:40:34', '2022-12-27 23:40:34'),
(253, 7, 2514, '2022-12-27 23:40:34', '2022-12-27 23:40:34'),
(254, 7, 2515, '2022-12-27 23:40:35', '2022-12-27 23:40:35'),
(255, 7, 2516, '2022-12-27 23:40:35', '2022-12-27 23:40:35'),
(256, 7, 2519, '2022-12-27 23:40:35', '2022-12-27 23:40:35'),
(257, 7, 2520, '2022-12-27 23:40:35', '2022-12-27 23:40:35'),
(258, 7, 2521, '2022-12-27 23:40:35', '2022-12-27 23:40:35'),
(259, 7, 2524, '2022-12-27 23:40:35', '2022-12-27 23:40:35'),
(261, 1, 2522, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(262, 1, 2523, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(263, 1, 2517, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(264, 1, 2518, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(265, 1, 5924, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(266, 1, 2513, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(267, 1, 2514, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(268, 1, 2515, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(269, 1, 2516, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(270, 1, 2519, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(271, 1, 2520, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(272, 1, 2521, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(273, 1, 2524, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(277, 9, 2522, '2022-12-28 07:57:04', '2022-12-28 07:57:04'),
(278, 9, 2519, '2022-12-28 07:57:04', '2022-12-28 07:57:04'),
(280, 8, 2522, '2022-12-29 01:51:03', '2022-12-29 01:51:03'),
(281, 8, 2519, '2022-12-29 01:51:03', '2022-12-29 01:51:03'),
(282, 6, 2522, '2022-12-29 05:25:34', '2022-12-29 05:25:34'),
(283, 6, 2523, '2022-12-29 05:25:34', '2022-12-29 05:25:34'),
(284, 6, 5895, '2022-12-29 05:25:34', '2022-12-29 05:25:34'),
(285, 6, 2517, '2022-12-29 05:25:34', '2022-12-29 05:25:34'),
(286, 6, 2518, '2022-12-29 05:25:34', '2022-12-29 05:25:34'),
(287, 6, 5924, '2022-12-29 05:25:34', '2022-12-29 05:25:34'),
(288, 6, 2513, '2022-12-29 05:25:34', '2022-12-29 05:25:34'),
(289, 6, 2514, '2022-12-29 05:25:34', '2022-12-29 05:25:34'),
(290, 6, 2515, '2022-12-29 05:25:34', '2022-12-29 05:25:34'),
(291, 6, 2516, '2022-12-29 05:25:34', '2022-12-29 05:25:34'),
(292, 6, 2519, '2022-12-29 05:25:35', '2022-12-29 05:25:35'),
(293, 6, 2520, '2022-12-29 05:25:35', '2022-12-29 05:25:35'),
(294, 6, 2521, '2022-12-29 05:25:35', '2022-12-29 05:25:35'),
(295, 6, 2524, '2022-12-29 05:25:35', '2022-12-29 05:25:35'),
(296, 10, 2522, '2022-12-29 05:28:18', '2022-12-29 05:28:18'),
(297, 10, 2523, '2022-12-29 05:28:18', '2022-12-29 05:28:18'),
(298, 10, 5895, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(299, 10, 2517, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(300, 10, 2518, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(301, 10, 5924, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(302, 10, 2513, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(303, 10, 2514, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(304, 10, 2515, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(305, 10, 2516, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(306, 10, 2519, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(307, 10, 2520, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(308, 10, 2521, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(309, 10, 2524, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(310, 11, 2522, '2022-12-30 03:11:48', '2022-12-30 03:11:48'),
(311, 12, 2522, '2023-01-02 03:08:02', '2023-01-02 03:08:02'),
(312, 12, 2518, '2023-01-02 03:08:02', '2023-01-02 03:08:02'),
(313, 12, 2519, '2023-01-02 03:08:02', '2023-01-02 03:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `temp_sections`
--

CREATE TABLE `temp_sections` (
  `id` int(11) NOT NULL,
  `template_id` bigint(20) DEFAULT NULL,
  `section_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_sections`
--

INSERT INTO `temp_sections` (`id`, `template_id`, `section_id`, `created_at`, `updated_at`) VALUES
(6, 2, 1, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(7, 2, 2, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(8, 2, 3, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(9, 2, 4, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(10, 2, 5, '2022-11-30 01:01:52', '2022-11-30 01:01:52'),
(11, 3, 1, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(12, 3, 2, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(13, 3, 3, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(14, 3, 4, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(15, 3, 5, '2022-11-30 01:01:57', '2022-11-30 01:01:57'),
(76, 4, 1, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(77, 4, 2, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(78, 4, 3, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(79, 4, 4, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(80, 4, 5, '2022-12-04 23:30:25', '2022-12-04 23:30:25'),
(91, 5, 1, '2022-12-05 00:03:20', '2022-12-05 00:03:20'),
(92, 5, 2, '2022-12-05 00:03:21', '2022-12-05 00:03:21'),
(93, 5, 3, '2022-12-05 00:03:21', '2022-12-05 00:03:21'),
(94, 5, 4, '2022-12-05 00:03:21', '2022-12-05 00:03:21'),
(95, 5, 5, '2022-12-05 00:03:21', '2022-12-05 00:03:21'),
(121, 7, 1, '2022-12-27 23:40:35', '2022-12-27 23:40:35'),
(122, 7, 2, '2022-12-27 23:40:35', '2022-12-27 23:40:35'),
(123, 7, 3, '2022-12-27 23:40:35', '2022-12-27 23:40:35'),
(124, 7, 4, '2022-12-27 23:40:35', '2022-12-27 23:40:35'),
(125, 7, 5, '2022-12-27 23:40:35', '2022-12-27 23:40:35'),
(131, 1, 1, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(132, 1, 2, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(133, 1, 3, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(134, 1, 4, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(135, 1, 5, '2022-12-28 07:44:05', '2022-12-28 07:44:05'),
(141, 9, 1, '2022-12-28 07:57:04', '2022-12-28 07:57:04'),
(142, 9, 2, '2022-12-28 07:57:04', '2022-12-28 07:57:04'),
(143, 9, 3, '2022-12-28 07:57:04', '2022-12-28 07:57:04'),
(144, 9, 4, '2022-12-28 07:57:04', '2022-12-28 07:57:04'),
(145, 9, 5, '2022-12-28 07:57:04', '2022-12-28 07:57:04'),
(151, 8, 1, '2022-12-29 01:51:04', '2022-12-29 01:51:04'),
(152, 8, 2, '2022-12-29 01:51:04', '2022-12-29 01:51:04'),
(153, 8, 3, '2022-12-29 01:51:04', '2022-12-29 01:51:04'),
(154, 8, 4, '2022-12-29 01:51:04', '2022-12-29 01:51:04'),
(155, 8, 5, '2022-12-29 01:51:04', '2022-12-29 01:51:04'),
(156, 6, 1, '2022-12-29 05:25:35', '2022-12-29 05:25:35'),
(157, 6, 2, '2022-12-29 05:25:35', '2022-12-29 05:25:35'),
(158, 6, 3, '2022-12-29 05:25:35', '2022-12-29 05:25:35'),
(159, 6, 4, '2022-12-29 05:25:35', '2022-12-29 05:25:35'),
(160, 6, 5, '2022-12-29 05:25:35', '2022-12-29 05:25:35'),
(161, 10, 1, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(162, 10, 2, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(163, 10, 3, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(164, 10, 4, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(165, 10, 5, '2022-12-29 05:28:19', '2022-12-29 05:28:19'),
(166, 11, 1, '2022-12-30 03:11:48', '2022-12-30 03:11:48'),
(167, 11, 2, '2022-12-30 03:11:48', '2022-12-30 03:11:48'),
(168, 11, 3, '2022-12-30 03:11:48', '2022-12-30 03:11:48'),
(169, 11, 4, '2022-12-30 03:11:48', '2022-12-30 03:11:48'),
(170, 11, 5, '2022-12-30 03:11:48', '2022-12-30 03:11:48'),
(171, 12, 1, '2023-01-02 03:08:02', '2023-01-02 03:08:02'),
(172, 12, 2, '2023-01-02 03:08:02', '2023-01-02 03:08:02'),
(173, 12, 3, '2023-01-02 03:08:02', '2023-01-02 03:08:02'),
(174, 12, 4, '2023-01-02 03:08:02', '2023-01-02 03:08:02'),
(175, 12, 5, '2023-01-02 03:08:02', '2023-01-02 03:08:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financemanages`
--
ALTER TABLE `financemanages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finances`
--
ALTER TABLE `finances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infrastructures`
--
ALTER TABLE `infrastructures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infra_works`
--
ALTER TABLE `infra_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscellaneousmanages`
--
ALTER TABLE `miscellaneousmanages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscinfraawardtenders`
--
ALTER TABLE `miscinfraawardtenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscretirements`
--
ALTER TABLE `miscretirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misc_master`
--
ALTER TABLE `misc_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendingdemandsmanages`
--
ALTER TABLE `pendingdemandsmanages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procurement_first_forms`
--
ALTER TABLE `procurement_first_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procurement_master`
--
ALTER TABLE `procurement_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procurement_second_forms`
--
ALTER TABLE `procurement_second_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procurement_services`
--
ALTER TABLE `procurement_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procurement_service_forms`
--
ALTER TABLE `procurement_service_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procurement_third_forms`
--
ALTER TABLE `procurement_third_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rcacademymappings`
--
ALTER TABLE `rcacademymappings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rcacademymappings-27-12-2022`
--
ALTER TABLE `rcacademymappings-27-12-2022`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rcacademymappings_01122022`
--
ALTER TABLE `rcacademymappings_01122022`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rcacademymappings_24-11-2022`
--
ALTER TABLE `rcacademymappings_24-11-2022`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rc_details`
--
ALTER TABLE `rc_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_for_rc`
--
ALTER TABLE `template_for_rc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `template_id` (`template_id`);

--
-- Indexes for table `temp_sections`
--
ALTER TABLE `temp_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `template_id` (`template_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `financemanages`
--
ALTER TABLE `financemanages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `finances`
--
ALTER TABLE `finances`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `infrastructures`
--
ALTER TABLE `infrastructures`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `infra_works`
--
ALTER TABLE `infra_works`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `miscellaneousmanages`
--
ALTER TABLE `miscellaneousmanages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `miscinfraawardtenders`
--
ALTER TABLE `miscinfraawardtenders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `miscretirements`
--
ALTER TABLE `miscretirements`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `misc_master`
--
ALTER TABLE `misc_master`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `pendingdemandsmanages`
--
ALTER TABLE `pendingdemandsmanages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `procurement_first_forms`
--
ALTER TABLE `procurement_first_forms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `procurement_master`
--
ALTER TABLE `procurement_master`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `procurement_second_forms`
--
ALTER TABLE `procurement_second_forms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `procurement_services`
--
ALTER TABLE `procurement_services`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `procurement_service_forms`
--
ALTER TABLE `procurement_service_forms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `procurement_third_forms`
--
ALTER TABLE `procurement_third_forms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `rcacademymappings`
--
ALTER TABLE `rcacademymappings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `rcacademymappings-27-12-2022`
--
ALTER TABLE `rcacademymappings-27-12-2022`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `rcacademymappings_01122022`
--
ALTER TABLE `rcacademymappings_01122022`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `rcacademymappings_24-11-2022`
--
ALTER TABLE `rcacademymappings_24-11-2022`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `rc_details`
--
ALTER TABLE `rc_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `template_for_rc`
--
ALTER TABLE `template_for_rc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT for table `temp_sections`
--
ALTER TABLE `temp_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `template_for_rc`
--
ALTER TABLE `template_for_rc`
  ADD CONSTRAINT `template_for_rc_ibfk_1` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `temp_sections`
--
ALTER TABLE `temp_sections`
  ADD CONSTRAINT `temp_sections_ibfk_1` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
