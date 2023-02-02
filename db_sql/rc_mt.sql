-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2022 at 11:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rc_mt`
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
(1, 'SAI 1', 1, 1, '2022-09-05 07:24:10', NULL),
(2, 'SAI 2', 1, 1, '2022-09-05 07:24:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `finance_master`
--

CREATE TABLE `finance_master` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `scheme_name` varchar(255) DEFAULT NULL,
  `budget_code` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finance_master`
--

INSERT INTO `finance_master` (`id`, `user_id`, `scheme_name`, `budget_code`, `created_at`, `updated_at`) VALUES
(1, 1, 's1', 50000, '2022-08-02 09:03:03', '2022-08-03 14:49:30'),
(4, 1, 'asa', 12100, '2022-08-02 10:11:36', '2022-08-02 15:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `financial_management`
--

CREATE TABLE `financial_management` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `name_of_scheme` varchar(255) DEFAULT NULL,
  `budget_code` int(255) DEFAULT NULL,
  `be_re` int(255) DEFAULT NULL,
  `opening_balance` int(255) DEFAULT NULL,
  `fund_received` int(255) DEFAULT NULL,
  `total_funds` int(255) DEFAULT NULL,
  `expenditure_incurred` int(255) DEFAULT NULL,
  `commited_liabilities` int(255) DEFAULT NULL,
  `balance` int(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `financial_management`
--

INSERT INTO `financial_management` (`id`, `user_id`, `name_of_scheme`, `budget_code`, `be_re`, `opening_balance`, `fund_received`, `total_funds`, `expenditure_incurred`, `commited_liabilities`, `balance`, `remark`, `created_at`) VALUES
(7, 1, '1', 50000, 1, 1, 1, NULL, 1, 1, NULL, NULL, '2022-08-22 10:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `infrastructures`
--

CREATE TABLE `infrastructures` (
  `id` bigint(11) NOT NULL,
  `project_title` text NOT NULL,
  `cost` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `agency` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `infrastructures`
--

INSERT INTO `infrastructures` (`id`, `project_title`, `cost`, `date`, `agency`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'p1', 1000, '2022-08-23', 'SAI 1', 1, 1, '2022-08-23 06:22:21', '2022-09-05 06:43:34'),
(2, 'p2', 2000, '2022-08-23', 'SAI 2', 1, 1, '2022-08-23 06:55:39', '2022-09-05 06:43:38'),
(3, 'p3', 3000, '2022-08-24', 'SAI 1', 1, 1, '2022-08-23 11:49:59', '2022-09-05 06:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `infra_work`
--

CREATE TABLE `infra_work` (
  `id` int(10) NOT NULL,
  `rc_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `project_title` text DEFAULT NULL,
  `discription` text DEFAULT NULL,
  `cost` double DEFAULT 0,
  `date_of_aa_es` date DEFAULT NULL,
  `agency` varchar(255) DEFAULT NULL,
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
  `fund_release_till_date` date DEFAULT NULL,
  `percentage_of_funds` double DEFAULT NULL,
  `uc_status_date` varchar(255) DEFAULT NULL,
  `form_type` varchar(255) DEFAULT NULL,
  `form_status` tinyint(4) DEFAULT 0,
  `month` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `infra_work`
--

INSERT INTO `infra_work` (`id`, `rc_id`, `user_id`, `project_title`, `discription`, `cost`, `date_of_aa_es`, `agency`, `date_of_issue`, `date_of_receipt`, `date_of_tech_bid`, `date_of_financial_bid`, `date_of_work_award`, `tender_cost`, `remarks_1`, `work_start_date`, `cpdc_date`, `epd_25`, `epd_50`, `epd_75`, `progress_percentage`, `current_pdc`, `remarks_2`, `fund_release_till_date`, `percentage_of_funds`, `uc_status_date`, `form_type`, `form_status`, `month`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', 'test', 1000, '2022-08-23', 'SAI 1', '2022-08-26', '2022-08-27', '2022-08-28', '2022-08-29', '2022-08-30', 1000, 'hi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0, 'August', '2022-08-24 22:55:38', '2022-08-25 06:02:54'),
(2, 1, 1, '2', 'test', 2000, '2022-08-23', 'SAI 2', '2022-08-26', '2022-08-27', '2022-08-28', '2022-08-29', '2022-08-30', 200, 'hello', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0, 'August', '2022-08-24 22:55:38', '2022-08-25 06:02:54'),
(3, 1, 1, '3', 'test', 3000, '2022-08-24', 'SAI 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0, 'August', '2022-08-24 22:55:38', '2022-08-24 22:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_templates`
--

CREATE TABLE `monitoring_templates` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance_master`
--
ALTER TABLE `finance_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial_management`
--
ALTER TABLE `financial_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infrastructures`
--
ALTER TABLE `infrastructures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infra_work`
--
ALTER TABLE `infra_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoring_templates`
--
ALTER TABLE `monitoring_templates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `finance_master`
--
ALTER TABLE `finance_master`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `financial_management`
--
ALTER TABLE `financial_management`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `infrastructures`
--
ALTER TABLE `infrastructures`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `infra_work`
--
ALTER TABLE `infra_work`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `monitoring_templates`
--
ALTER TABLE `monitoring_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
