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
-- Table structure for table `part_two_achieve_accommods`
--

CREATE TABLE `part_two_achieve_accommods` (
  `id` int(11) NOT NULL,
  `form_id` varchar(50) DEFAULT NULL,
  `accommods_part_two_rooms_male_ac` varchar(50) DEFAULT NULL,
  `accommods_part_two_rooms_male_ac_rating` varchar(50) DEFAULT NULL,
  `accommods_part_two_rooms_male_nonac` varchar(50) DEFAULT NULL,
  `accommods_part_two_rooms_male_nonacrating` varchar(50) DEFAULT NULL,
  `accommods_part_two_rooms_female_ac` varchar(50) DEFAULT NULL,
  `accommods_part_two_rooms_female_ac_rating` varchar(50) DEFAULT NULL,
  `accommods_part_two_rooms_female_nonac` varchar(50) DEFAULT NULL,
  `accommods_part_two_rooms_female_nonacrating` varchar(50) NOT NULL,
  `accommods_part_two_rooms_remark` varchar(50) DEFAULT NULL,
  `accommods_part_two_accomodation_capacity_male_ac` varchar(50) DEFAULT NULL,
  `accommods_part_two_accomodation_capacity_male_ac_rating` varchar(50) DEFAULT NULL,
  `accommods_part_two_accomodation_capacity_male_nonac` varchar(50) DEFAULT NULL,
  `accommods_part_two_accomodation_capacity_male_nonacrating` varchar(50) DEFAULT NULL,
  `accommods_part_two_accomodation_capacity_female_ac` varchar(50) DEFAULT NULL,
  `accommods_part_two_accomodation_capacity_female_ac_rating` varchar(50) DEFAULT NULL,
  `accommods_part_two_accomodation_capacity_female_nonac` varchar(50) DEFAULT NULL,
  `accommods_part_two_accomodation_capacityrooms_female_nonacrating` varchar(50) DEFAULT NULL,
  `accommods_part_two_accomodation_capacity_remark` varchar(50) DEFAULT NULL,
  `accommods_part_two_dormitory_male_ac` varchar(50) DEFAULT NULL,
  `accommods_part_two_dormitory_male_ac_rating` varchar(50) DEFAULT NULL,
  `accommods_part_two_dormitory_male_nonac` varchar(50) DEFAULT NULL,
  `accommods_part_two_dormitory_male_nonacrating` varchar(50) DEFAULT NULL,
  `accommods_part_two_dormitory_female_ac` varchar(50) DEFAULT NULL,
  `accommods_part_two_dormitory_female_ac_rating` varchar(50) DEFAULT NULL,
  `accommods_part_two_dormitory_female_nonac` varchar(50) DEFAULT NULL,
  `accommods_part_two_dormitory_female_nonacrating` varchar(50) DEFAULT NULL,
  `accommods_part_two_dormitory_remark` varchar(50) DEFAULT NULL,
  `accommods_part_two_capacity_dormitory_male_ac` varchar(50) DEFAULT NULL,
  `accommods_part_two_capacity_dormitory_male_ac_rating` varchar(50) DEFAULT NULL,
  `accommods_part_two_capacity_dormitory_male_nonac` varchar(50) DEFAULT NULL,
  `accommods_part_two_capacity_dormitory_male_nonacrating` varchar(50) DEFAULT NULL,
  `accommods_part_two_capacity_dormitory_female_ac` varchar(50) DEFAULT NULL,
  `accommods_part_two_capacity_dormitory_female_ac_rating` varchar(50) DEFAULT NULL,
  `accommods_part_two_capacity_dormitory_female_nonac` varchar(50) DEFAULT NULL,
  `accommods_part_two_capacity_dormitory_female_nonacrating` varchar(50) DEFAULT NULL,
  `accommods_part_two_capacity_dormitory_remark` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_attached_male_ac` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_attached_male_ac_rating` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_attached_male_nonac` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_attached_male_nonacrating` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_attached_female_ac` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_attached_female_ac_rating` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_attached_female_nonac` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_attached_female_nonacrating` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_attached_remark` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_non_attached_male_ac` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_non_attached_male_ac_rating` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_non_attached_male_nonac` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_non_attached_male_nonacrating` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_non_attached_female_ac` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_non_attached_female_ac_rating` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_non_attached_female_nonac` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_non_attached_female_nonacrating` varchar(50) DEFAULT NULL,
  `accommods_part_two_toilet_non_attached_remark` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_for` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `part_two_achieve_accommods`
--

INSERT INTO `part_two_achieve_accommods` (`id`, `form_id`, `accommods_part_two_rooms_male_ac`, `accommods_part_two_rooms_male_ac_rating`, `accommods_part_two_rooms_male_nonac`, `accommods_part_two_rooms_male_nonacrating`, `accommods_part_two_rooms_female_ac`, `accommods_part_two_rooms_female_ac_rating`, `accommods_part_two_rooms_female_nonac`, `accommods_part_two_rooms_female_nonacrating`, `accommods_part_two_rooms_remark`, `accommods_part_two_accomodation_capacity_male_ac`, `accommods_part_two_accomodation_capacity_male_ac_rating`, `accommods_part_two_accomodation_capacity_male_nonac`, `accommods_part_two_accomodation_capacity_male_nonacrating`, `accommods_part_two_accomodation_capacity_female_ac`, `accommods_part_two_accomodation_capacity_female_ac_rating`, `accommods_part_two_accomodation_capacity_female_nonac`, `accommods_part_two_accomodation_capacityrooms_female_nonacrating`, `accommods_part_two_accomodation_capacity_remark`, `accommods_part_two_dormitory_male_ac`, `accommods_part_two_dormitory_male_ac_rating`, `accommods_part_two_dormitory_male_nonac`, `accommods_part_two_dormitory_male_nonacrating`, `accommods_part_two_dormitory_female_ac`, `accommods_part_two_dormitory_female_ac_rating`, `accommods_part_two_dormitory_female_nonac`, `accommods_part_two_dormitory_female_nonacrating`, `accommods_part_two_dormitory_remark`, `accommods_part_two_capacity_dormitory_male_ac`, `accommods_part_two_capacity_dormitory_male_ac_rating`, `accommods_part_two_capacity_dormitory_male_nonac`, `accommods_part_two_capacity_dormitory_male_nonacrating`, `accommods_part_two_capacity_dormitory_female_ac`, `accommods_part_two_capacity_dormitory_female_ac_rating`, `accommods_part_two_capacity_dormitory_female_nonac`, `accommods_part_two_capacity_dormitory_female_nonacrating`, `accommods_part_two_capacity_dormitory_remark`, `accommods_part_two_toilet_attached_male_ac`, `accommods_part_two_toilet_attached_male_ac_rating`, `accommods_part_two_toilet_attached_male_nonac`, `accommods_part_two_toilet_attached_male_nonacrating`, `accommods_part_two_toilet_attached_female_ac`, `accommods_part_two_toilet_attached_female_ac_rating`, `accommods_part_two_toilet_attached_female_nonac`, `accommods_part_two_toilet_attached_female_nonacrating`, `accommods_part_two_toilet_attached_remark`, `accommods_part_two_toilet_non_attached_male_ac`, `accommods_part_two_toilet_non_attached_male_ac_rating`, `accommods_part_two_toilet_non_attached_male_nonac`, `accommods_part_two_toilet_non_attached_male_nonacrating`, `accommods_part_two_toilet_non_attached_female_ac`, `accommods_part_two_toilet_non_attached_female_ac_rating`, `accommods_part_two_toilet_non_attached_female_nonac`, `accommods_part_two_toilet_non_attached_female_nonacrating`, `accommods_part_two_toilet_non_attached_remark`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_for`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, '2522', '222222', 'Open this select menu', NULL, 'Open this select menu', NULL, 'Open this select menu', NULL, 'Open this select menu', NULL, NULL, 'Open this select menu', NULL, 'Open this select menu', NULL, 'Open this select menu', NULL, 'Open this select menu', NULL, '0', NULL, NULL, 'Open this select menu', NULL, 'Open this select menu', NULL, 'Open this select menu', NULL, NULL, 'Open this select menu', NULL, 'Open this select menu', NULL, 'Open this select menu', NULL, 'Open this select menu', NULL, NULL, 'Open this select menu', NULL, 'Open this select menu', NULL, 'Open this select menu', NULL, 'Open this select menu', NULL, NULL, 'Open this select menu', NULL, 'Open this select menu', NULL, 'Open this select menu', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-01-24 05:57:36', '2023-01-24 12:12:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `part_two_achieve_accommods`
--
ALTER TABLE `part_two_achieve_accommods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `part_two_achieve_accommods`
--
ALTER TABLE `part_two_achieve_accommods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
