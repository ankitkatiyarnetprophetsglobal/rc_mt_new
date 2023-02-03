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
-- Table structure for table `form_two_main`
--

CREATE TABLE `form_two_main` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `cat_radio` varchar(111) NOT NULL,
  `area_land` varchar(111) NOT NULL,
  `area_heactor` varchar(111) NOT NULL,
  `created_at` timestamp(4) NOT NULL DEFAULT current_timestamp(4),
  `updated_at` timestamp(4) NOT NULL DEFAULT current_timestamp(4)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_two_main`
--

INSERT INTO `form_two_main` (`id`, `user_id`, `cat_radio`, `area_land`, `area_heactor`, `created_at`, `updated_at`) VALUES
(2, '2522', 'Yes', 'Hectare', '888', '2023-01-24 05:57:36.0000', '2023-01-24 11:56:17.0000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_two_main`
--
ALTER TABLE `form_two_main`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_two_main`
--
ALTER TABLE `form_two_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
