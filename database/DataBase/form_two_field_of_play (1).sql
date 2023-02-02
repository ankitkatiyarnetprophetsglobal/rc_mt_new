-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2023 at 05:59 AM
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
-- Database: `rc_mt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_two_field_of_play`
--

CREATE TABLE `form_two_field_of_play` (
  `id` int(11) NOT NULL,
  `form_id` tinyint(4) DEFAULT NULL,
  `discline_play_field` varchar(111) DEFAULT NULL,
  `no_fop_play_field` varchar(111) DEFAULT NULL,
  `fop_play_field` varchar(111) DEFAULT NULL,
  `fop_surface_play_field` varchar(111) DEFAULT NULL,
  `rating_play_field` varchar(111) DEFAULT NULL,
  `remark_play_field` varchar(111) DEFAULT NULL,
  `created_at` timestamp(4) NOT NULL DEFAULT current_timestamp(4),
  `updated_at` timestamp(4) NOT NULL DEFAULT current_timestamp(4)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_two_field_of_play`
--
ALTER TABLE `form_two_field_of_play`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_two_field_of_play`
--
ALTER TABLE `form_two_field_of_play`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
