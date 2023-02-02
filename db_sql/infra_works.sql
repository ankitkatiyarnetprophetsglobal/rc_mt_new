-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 01:27 PM
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
-- Table structure for table `infra_works`
--

CREATE TABLE `infra_works` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `infra_id` bigint(20) NOT NULL,
  `discription` text DEFAULT NULL,
  `date_of_issue` date NOT NULL,
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
  `month` varchar(255) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `infra_works`
--
ALTER TABLE `infra_works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `infra_works`
--
ALTER TABLE `infra_works`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
