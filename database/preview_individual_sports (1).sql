-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 01:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rc_mt_db_server_04012023`
--

-- --------------------------------------------------------

--
-- Table structure for table `preview_individual_sports`
--

CREATE TABLE `preview_individual_sports` (
  `id` int(11) NOT NULL,
  `team_type` enum('ind','team','common') DEFAULT NULL,
  `discipline_id` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `form_type` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `created_for` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `m_2018_19` int(11) DEFAULT 0,
  `f_2018_19` int(11) DEFAULT 0,
  `m_2019_20` int(11) DEFAULT 0,
  `f_2019_20` int(11) DEFAULT 0,
  `m_2020_21` int(11) DEFAULT 0,
  `f_2020_21` bigint(20) DEFAULT 0,
  `m_2021_22` bigint(20) DEFAULT 0,
  `f_2021_22` bigint(20) DEFAULT 0,
  `m_2022_23` bigint(20) DEFAULT 0,
  `f_2022_23` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `preview_individual_sports`
--
ALTER TABLE `preview_individual_sports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `preview_individual_sports`
--
ALTER TABLE `preview_individual_sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
