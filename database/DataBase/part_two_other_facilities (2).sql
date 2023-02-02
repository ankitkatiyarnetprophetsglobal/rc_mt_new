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
-- Table structure for table `part_two_other_facilities`
--

CREATE TABLE `part_two_other_facilities` (
  `id` int(11) NOT NULL,
  `form_id` int(11) DEFAULT NULL,
  `facilities_guest_room_ac_count` int(11) DEFAULT NULL,
  `facilities_guest_room_area_male` int(11) DEFAULT NULL,
  `facilities_guest_room_area_female` int(11) DEFAULT NULL,
  `facilities_guest_room_rating` text DEFAULT NULL,
  `facilities_guest_room_nonac_ac_count` int(11) DEFAULT NULL,
  `facilities_guest_room_nonac_area_male` int(11) DEFAULT NULL,
  `facilities_guest_room_nonac_area_female` int(11) DEFAULT NULL,
  `facilities_guest_room_nonac_rating` text DEFAULT NULL,
  `facilities_guest_room_remarks` text DEFAULT NULL,
  `facilities_recreation_hall_ac_count` int(11) DEFAULT NULL,
  `facilities_recreation_hall_area_male` int(11) DEFAULT NULL,
  `facilities_recreation_hall_area_female` int(11) DEFAULT NULL,
  `facilities_recreation_hall_rating` text DEFAULT NULL,
  `facilities_recreation_hall_nonac_ac_count` int(11) DEFAULT NULL,
  `facilities_recreation_hall_nonac_area_male` int(11) DEFAULT NULL,
  `facilities_recreation_hall_nonac_area_female` int(11) DEFAULT NULL,
  `facilities_recreation_hall_nonac_rating` text DEFAULT NULL,
  `facilities_recreation_hall_remarks` int(11) DEFAULT NULL,
  `facilities_store_room_ac_count` int(11) DEFAULT NULL,
  `facilities_store_room_area_male` int(11) DEFAULT NULL,
  `facilities_store_room_area_female` int(11) DEFAULT NULL,
  `facilities_store_room_rating` text DEFAULT NULL,
  `facilities_store_room_nonac_ac_count` int(11) DEFAULT NULL,
  `facilities_store_room_nonac_area_male` int(11) DEFAULT NULL,
  `facilities_store_room_nonac_area_female` int(11) DEFAULT NULL,
  `facilities_store_room_nonac_rating` text DEFAULT NULL,
  `facilities_store_room_remarks` int(11) DEFAULT NULL,
  `facilities_library_ac_count` int(11) DEFAULT NULL,
  `facilities_library_area_male` int(11) DEFAULT NULL,
  `facilities_library_area_female` int(11) DEFAULT NULL,
  `facilities_library_rating` text DEFAULT NULL,
  `facilities_library_nonac_ac_count` int(11) DEFAULT NULL,
  `facilities_library_nonac_area_male` int(11) DEFAULT NULL,
  `facilities_library_nonac_area_female` int(11) DEFAULT NULL,
  `facilities_library_nonac_rating` text DEFAULT NULL,
  `facilities_library_remarks` int(11) DEFAULT NULL,
  `status` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_for` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `part_two_other_facilities`
--

INSERT INTO `part_two_other_facilities` (`id`, `form_id`, `facilities_guest_room_ac_count`, `facilities_guest_room_area_male`, `facilities_guest_room_area_female`, `facilities_guest_room_rating`, `facilities_guest_room_nonac_ac_count`, `facilities_guest_room_nonac_area_male`, `facilities_guest_room_nonac_area_female`, `facilities_guest_room_nonac_rating`, `facilities_guest_room_remarks`, `facilities_recreation_hall_ac_count`, `facilities_recreation_hall_area_male`, `facilities_recreation_hall_area_female`, `facilities_recreation_hall_rating`, `facilities_recreation_hall_nonac_ac_count`, `facilities_recreation_hall_nonac_area_male`, `facilities_recreation_hall_nonac_area_female`, `facilities_recreation_hall_nonac_rating`, `facilities_recreation_hall_remarks`, `facilities_store_room_ac_count`, `facilities_store_room_area_male`, `facilities_store_room_area_female`, `facilities_store_room_rating`, `facilities_store_room_nonac_ac_count`, `facilities_store_room_nonac_area_male`, `facilities_store_room_nonac_area_female`, `facilities_store_room_nonac_rating`, `facilities_store_room_remarks`, `facilities_library_ac_count`, `facilities_library_area_male`, `facilities_library_area_female`, `facilities_library_rating`, `facilities_library_nonac_ac_count`, `facilities_library_nonac_area_male`, `facilities_library_nonac_area_female`, `facilities_library_nonac_rating`, `facilities_library_remarks`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_for`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 2522, NULL, NULL, NULL, 'Open this select menu', NULL, NULL, NULL, 'Open this select menu', NULL, NULL, NULL, NULL, 'Open this select menu', NULL, NULL, NULL, 'Open this select menu', NULL, NULL, NULL, NULL, 'Open this select menu', NULL, NULL, NULL, 'Open this select menu', NULL, NULL, NULL, NULL, 'Open this select menu', NULL, NULL, NULL, 'Open this select menu', NULL, 1, NULL, NULL, NULL, NULL, '2023-01-24 12:10:16', '2023-01-24 12:10:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `part_two_other_facilities`
--
ALTER TABLE `part_two_other_facilities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `part_two_other_facilities`
--
ALTER TABLE `part_two_other_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
