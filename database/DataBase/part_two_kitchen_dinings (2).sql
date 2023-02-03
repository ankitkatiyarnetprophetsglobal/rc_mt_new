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
-- Table structure for table `part_two_kitchen_dinings`
--

CREATE TABLE `part_two_kitchen_dinings` (
  `id` int(11) NOT NULL,
  `form_id` int(11) DEFAULT NULL,
  `kitchen_dinings_dining_hall_ac_count` varchar(50) DEFAULT NULL,
  `kitchen_dinings_dining_hall_area_male` varchar(50) DEFAULT NULL,
  `kitchen_dinings_dining_hall_area_female` varchar(50) DEFAULT NULL,
  `kitchen_dinings_dining_hall_rating` varchar(50) DEFAULT NULL,
  `kitchen_dinings_dining_hall_nonac_ac_count` varchar(50) DEFAULT NULL,
  `kitchen_dinings_dining_hall_nonac_area_male` varchar(50) DEFAULT NULL,
  `kitchen_dinings_dining_hall_nonac_area_female` varchar(50) DEFAULT NULL,
  `kitchen_dinings_dining_hall_nonac_rating` varchar(50) DEFAULT NULL,
  `kitchen_dinings_dining_hall_remarks` varchar(50) DEFAULT NULL,
  `kitchen_kitchen_hall_ac_count` varchar(50) DEFAULT NULL,
  `kitchen_kitchen_dining_hall_area_male` varchar(50) DEFAULT NULL,
  `kitchen_kitchen_dining_hall_area_female` varchar(50) DEFAULT NULL,
  `kitchen_kitchen_dining_hall_rating` varchar(50) DEFAULT NULL,
  `kitchen_kitchen_dining_hall_nonac_ac_count` varchar(50) DEFAULT NULL,
  `kitchen_kitchen_dining_hall_nonac_area_male` varchar(50) DEFAULT NULL,
  `kitchen_kitchen_dining_hall_nonac_area_female` varchar(50) DEFAULT NULL,
  `kitchen_kitchen_dining_hall_nonac_rating` varchar(50) DEFAULT NULL,
  `kitchen_kitchen_dining_hall_remarks` varchar(50) DEFAULT NULL,
  `kitchen_store_room_hall_ac_count` varchar(50) DEFAULT NULL,
  `kitchen_store_room_dining_hall_area_male` varchar(50) DEFAULT NULL,
  `kitchen_store_room_dining_hall_area_female` varchar(50) DEFAULT NULL,
  `kitchen_store_room_dining_hall_rating` varchar(50) DEFAULT NULL,
  `kitchen_store_room_dining_hall_nonac_ac_count` varchar(50) DEFAULT NULL,
  `kitchen_store_room_dining_hall_nonac_area_male` varchar(50) DEFAULT NULL,
  `kitchen_store_room_dining_hall_nonac_area_female` varchar(50) DEFAULT NULL,
  `kitchen_store_room_dining_hall_nonac_rating` varchar(50) DEFAULT NULL,
  `kitchen_store_room_dining_hall_remarks` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_for` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `part_two_kitchen_dinings`
--

INSERT INTO `part_two_kitchen_dinings` (`id`, `form_id`, `kitchen_dinings_dining_hall_ac_count`, `kitchen_dinings_dining_hall_area_male`, `kitchen_dinings_dining_hall_area_female`, `kitchen_dinings_dining_hall_rating`, `kitchen_dinings_dining_hall_nonac_ac_count`, `kitchen_dinings_dining_hall_nonac_area_male`, `kitchen_dinings_dining_hall_nonac_area_female`, `kitchen_dinings_dining_hall_nonac_rating`, `kitchen_dinings_dining_hall_remarks`, `kitchen_kitchen_hall_ac_count`, `kitchen_kitchen_dining_hall_area_male`, `kitchen_kitchen_dining_hall_area_female`, `kitchen_kitchen_dining_hall_rating`, `kitchen_kitchen_dining_hall_nonac_ac_count`, `kitchen_kitchen_dining_hall_nonac_area_male`, `kitchen_kitchen_dining_hall_nonac_area_female`, `kitchen_kitchen_dining_hall_nonac_rating`, `kitchen_kitchen_dining_hall_remarks`, `kitchen_store_room_hall_ac_count`, `kitchen_store_room_dining_hall_area_male`, `kitchen_store_room_dining_hall_area_female`, `kitchen_store_room_dining_hall_rating`, `kitchen_store_room_dining_hall_nonac_ac_count`, `kitchen_store_room_dining_hall_nonac_area_male`, `kitchen_store_room_dining_hall_nonac_area_female`, `kitchen_store_room_dining_hall_nonac_rating`, `kitchen_store_room_dining_hall_remarks`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_for`) VALUES
(6, 2522, '11', NULL, NULL, 'Open this select menu', NULL, NULL, NULL, 'Open this select menu', NULL, NULL, NULL, NULL, 'Open this select menu', NULL, NULL, NULL, 'Open this select menu', NULL, NULL, NULL, NULL, 'Open this select menu', NULL, NULL, NULL, 'Open this select menu', NULL, 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `part_two_kitchen_dinings`
--
ALTER TABLE `part_two_kitchen_dinings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `part_two_kitchen_dinings`
--
ALTER TABLE `part_two_kitchen_dinings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
