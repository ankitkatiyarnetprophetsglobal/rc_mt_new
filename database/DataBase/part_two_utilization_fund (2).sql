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
-- Table structure for table `part_two_utilization_fund`
--

CREATE TABLE `part_two_utilization_fund` (
  `id` int(11) NOT NULL,
  `form_id` int(20) NOT NULL,
  `utilization_boardings_2018_19_received` int(11) DEFAULT NULL,
  `utilization_boardings_2018_19_utilized` int(11) DEFAULT NULL,
  `utilization_boardings_2019_20_received` int(11) DEFAULT NULL,
  `utilization_boardings_2019_20_utilized` int(11) DEFAULT NULL,
  `utilization_boardings_2020_21_received` int(11) DEFAULT NULL,
  `utilization_boardings_2020_21_utilized` int(11) DEFAULT NULL,
  `utilization_boardings_2021_22_received` int(11) DEFAULT NULL,
  `utilization_boardings_2021_22_utilized` int(11) DEFAULT NULL,
  `utilization_boardings_2022_23_received` int(11) DEFAULT NULL,
  `utilization_boardings_2022_23_utilized` int(11) DEFAULT NULL,
  `utilization_sports_kit_2018_19_received` int(11) DEFAULT NULL,
  `utilization_sports_kit_2018_19_utilized` int(11) DEFAULT NULL,
  `utilization_sports_kit_2019_20_received` int(11) DEFAULT NULL,
  `utilization_sports_kit_2019_20_utilized` int(11) DEFAULT NULL,
  `utilization_sports_kit_2020_21_received` int(11) DEFAULT NULL,
  `utilization_sports_kit_2020_21_utilized` int(11) DEFAULT NULL,
  `utilization_sports_kit_2021_22_received` int(11) DEFAULT NULL,
  `utilization_sports_kit_2021_22_utilized` int(11) DEFAULT NULL,
  `utilization_sports_kit_2022_23_received` int(11) DEFAULT NULL,
  `utilization_sports_kit_2022_23_utilized` int(11) DEFAULT NULL,
  `utilization_education_expenditure_2018_19_received` int(11) DEFAULT NULL,
  `utilization_education_expenditure_2018_19_utilized` int(11) DEFAULT NULL,
  `utilization_education_expenditure_2019_20_received` int(11) DEFAULT NULL,
  `utilization_education_expenditure_2019_20_utilized` int(11) DEFAULT NULL,
  `utilization_education_expenditure_2021_22_received` int(11) DEFAULT NULL,
  `utilization_education_expenditure_2021_22_utilized` int(11) DEFAULT NULL,
  `utilization_education_expenditure_2022_23_received` int(11) DEFAULT NULL,
  `utilization_education_expenditure_2022_23_utilized` int(11) DEFAULT NULL,
  `utilization_competition_exposure_2018_19_received` int(11) DEFAULT NULL,
  `utilization_competition_exposure_2018_19_utilized` int(11) DEFAULT NULL,
  `utilization_competition_exposure_2019_20_received` int(11) DEFAULT NULL,
  `utilization_competition_exposure_2019_20_utilized` int(11) DEFAULT NULL,
  `utilization_competition_exposure_2020_21_received` int(11) DEFAULT NULL,
  `utilization_competition_exposure_2020_21_utilized` int(11) DEFAULT NULL,
  `utilization_competition_exposure_2021_22_received` int(11) DEFAULT NULL,
  `utilization_competition_exposure_2021_22_utilized` int(11) DEFAULT NULL,
  `utilization_competition_exposure_2022_23_received` int(11) DEFAULT NULL,
  `utilization_competition_exposure_2022_23_utilized` int(11) DEFAULT NULL,
  `utilization_medical_misc_2018_19_received` int(11) DEFAULT NULL,
  `utilization_medical_misc_2018_19_utilized` int(11) DEFAULT NULL,
  `utilization_medical_misc_2019_20_received` int(11) DEFAULT NULL,
  `utilization_medical_misc_2019_20_utilized` int(11) DEFAULT NULL,
  `utilization_medical_misc_2020_21_received` int(11) DEFAULT NULL,
  `utilization_medical_misc_2020_21_utilized` int(11) DEFAULT NULL,
  `utilization_medical_misc_2021_22_received` int(11) DEFAULT NULL,
  `utilization_medical_misc_2021_22_utilized` int(11) DEFAULT NULL,
  `utilization_medical_misc_2022_23_received` int(11) DEFAULT NULL,
  `utilization_medical_misc_2022_23_utilized` int(11) DEFAULT NULL,
  `utilization_maintenance_cost_ncoes_2018_19_received` int(11) DEFAULT NULL,
  `utilization_maintenance_cost_ncoes_2018_19_utilized` int(11) DEFAULT NULL,
  `utilization_maintenance_cost_ncoes_2019_20_received` int(11) DEFAULT NULL,
  `utilization_maintenance_cost_ncoes_2019_20_utilized` int(11) DEFAULT NULL,
  `utilization_maintenance_cost_ncoes_2020_21_received` int(11) DEFAULT NULL,
  `utilization_maintenance_cost_ncoes_2020_21_utilized` int(11) DEFAULT NULL,
  `utilization_maintenance_cost_ncoes_2021_22_received` int(11) DEFAULT NULL,
  `utilization_maintenance_cost_ncoes_2021_22_utilized` int(11) DEFAULT NULL,
  `utilization_maintenance_cost_ncoes_2022_23_received` int(11) DEFAULT NULL,
  `utilization_maintenance_cost_ncoes_2022_23_utilized` int(11) DEFAULT NULL,
  `utilization_sports_equipment_consumable_2018_19_received` int(11) DEFAULT NULL,
  `utilization_sports_equipment_consumable_2018_19_utilized` int(11) DEFAULT NULL,
  `utilization_sports_equipment_consumable_2019_20_received` int(11) DEFAULT NULL,
  `utilization_sports_equipment_consumable_2019_20_utilized` varchar(20) DEFAULT NULL,
  `utilization_sports_equipment_consumable_2020_21_received` int(11) DEFAULT NULL,
  `utilization_sports_equipment_consumable_2020_21_utilized` int(11) DEFAULT NULL,
  `utilization_sports_equipment_consumable_2021_22_received` varchar(20) DEFAULT NULL,
  `utilization_sports_equipment_consumable_2021_22_utilized` int(11) DEFAULT NULL,
  `utilization_sports_equipment_consumable_2022_23_received` int(11) DEFAULT NULL,
  `utilization_sports_equipment_consumable_2022_23_utilized` int(11) DEFAULT NULL,
  `utilization_sports_equipment_non_consumable_2018_19_received` int(11) DEFAULT NULL,
  `utilization_sports_equipment_non_consumable_2018_19_utilized` int(11) DEFAULT NULL,
  `utilization_sports_equipment_non_consumable_2019_20_received` int(11) DEFAULT NULL,
  `utilization_sports_equipment_non_consumable_2019_20_utilized` int(11) DEFAULT NULL,
  `utilization_sports_equipment_non_consumable_2021_22_received` int(11) DEFAULT NULL,
  `utilization_sports_equipment_non_consumable_2021_22_utilized` int(11) DEFAULT NULL,
  `utilization_sports_equipment_non_consumable_2022_23_received` int(11) DEFAULT NULL,
  `utilization_sports_equipment_non_consumable_2022_23_utilized` int(11) DEFAULT NULL,
  `utilization_sports_science_consumable_2018_19_received` int(11) DEFAULT NULL,
  `utilization_sports_science_consumable_2018_19_utilized` int(11) DEFAULT NULL,
  `utilization_sports_science_consumable_2019_20_received` int(11) DEFAULT NULL,
  `utilization_sports_science_consumable_2019_20_utilized` int(11) DEFAULT NULL,
  `utilization_sports_science_consumable_2020_21_received` int(11) DEFAULT NULL,
  `utilization_sports_science_consumable_2020_21_utilized` int(11) DEFAULT NULL,
  `utilization_sports_science_consumable_2021_22_received` int(11) DEFAULT NULL,
  `utilization_sports_science_consumable_2021_22_utilized` int(11) DEFAULT NULL,
  `utilization_sports_science_consumable_2022_23_received` int(11) DEFAULT NULL,
  `utilization_sports_science_consumable_2022_23_utilized` int(11) DEFAULT NULL,
  `utilization_sports_science_non_consumable_2018_19_received` int(11) DEFAULT NULL,
  `utilization_sports_science_non_consumable_2018_19_utilized` int(11) DEFAULT NULL,
  `utilization_sports_science_non_consumable_2019_20_received` int(11) DEFAULT NULL,
  `utilization_sports_science_non_consumable_2019_20_utilized` int(11) DEFAULT NULL,
  `utilization_sports_equipment_non_consumable_2020_21_received` int(11) DEFAULT NULL,
  `utilization_sports_equipment_non_consumable_2020_21_utilized` int(11) DEFAULT NULL,
  `utilization_sports_science_non_consumable_2021_22_received` int(11) DEFAULT NULL,
  `utilization_sports_science_non_consumable_2021_22_utilized` int(11) DEFAULT NULL,
  `utilization_sports_science_non_consumable_2022_23_received` int(11) DEFAULT NULL,
  `utilization_sports_science_non_consumable_2022_23_utilized` int(11) DEFAULT NULL,
  `utilization_education_expenditure_2020_21_utilized` varchar(20) DEFAULT NULL,
  `utilization_education_expenditure_2020_21_received` varchar(20) DEFAULT NULL,
  `utilization_sports_science_non_consumable_2020_21_utilized` varchar(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_for` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `part_two_utilization_fund`
--

INSERT INTO `part_two_utilization_fund` (`id`, `form_id`, `utilization_boardings_2018_19_received`, `utilization_boardings_2018_19_utilized`, `utilization_boardings_2019_20_received`, `utilization_boardings_2019_20_utilized`, `utilization_boardings_2020_21_received`, `utilization_boardings_2020_21_utilized`, `utilization_boardings_2021_22_received`, `utilization_boardings_2021_22_utilized`, `utilization_boardings_2022_23_received`, `utilization_boardings_2022_23_utilized`, `utilization_sports_kit_2018_19_received`, `utilization_sports_kit_2018_19_utilized`, `utilization_sports_kit_2019_20_received`, `utilization_sports_kit_2019_20_utilized`, `utilization_sports_kit_2020_21_received`, `utilization_sports_kit_2020_21_utilized`, `utilization_sports_kit_2021_22_received`, `utilization_sports_kit_2021_22_utilized`, `utilization_sports_kit_2022_23_received`, `utilization_sports_kit_2022_23_utilized`, `utilization_education_expenditure_2018_19_received`, `utilization_education_expenditure_2018_19_utilized`, `utilization_education_expenditure_2019_20_received`, `utilization_education_expenditure_2019_20_utilized`, `utilization_education_expenditure_2021_22_received`, `utilization_education_expenditure_2021_22_utilized`, `utilization_education_expenditure_2022_23_received`, `utilization_education_expenditure_2022_23_utilized`, `utilization_competition_exposure_2018_19_received`, `utilization_competition_exposure_2018_19_utilized`, `utilization_competition_exposure_2019_20_received`, `utilization_competition_exposure_2019_20_utilized`, `utilization_competition_exposure_2020_21_received`, `utilization_competition_exposure_2020_21_utilized`, `utilization_competition_exposure_2021_22_received`, `utilization_competition_exposure_2021_22_utilized`, `utilization_competition_exposure_2022_23_received`, `utilization_competition_exposure_2022_23_utilized`, `utilization_medical_misc_2018_19_received`, `utilization_medical_misc_2018_19_utilized`, `utilization_medical_misc_2019_20_received`, `utilization_medical_misc_2019_20_utilized`, `utilization_medical_misc_2020_21_received`, `utilization_medical_misc_2020_21_utilized`, `utilization_medical_misc_2021_22_received`, `utilization_medical_misc_2021_22_utilized`, `utilization_medical_misc_2022_23_received`, `utilization_medical_misc_2022_23_utilized`, `utilization_maintenance_cost_ncoes_2018_19_received`, `utilization_maintenance_cost_ncoes_2018_19_utilized`, `utilization_maintenance_cost_ncoes_2019_20_received`, `utilization_maintenance_cost_ncoes_2019_20_utilized`, `utilization_maintenance_cost_ncoes_2020_21_received`, `utilization_maintenance_cost_ncoes_2020_21_utilized`, `utilization_maintenance_cost_ncoes_2021_22_received`, `utilization_maintenance_cost_ncoes_2021_22_utilized`, `utilization_maintenance_cost_ncoes_2022_23_received`, `utilization_maintenance_cost_ncoes_2022_23_utilized`, `utilization_sports_equipment_consumable_2018_19_received`, `utilization_sports_equipment_consumable_2018_19_utilized`, `utilization_sports_equipment_consumable_2019_20_received`, `utilization_sports_equipment_consumable_2019_20_utilized`, `utilization_sports_equipment_consumable_2020_21_received`, `utilization_sports_equipment_consumable_2020_21_utilized`, `utilization_sports_equipment_consumable_2021_22_received`, `utilization_sports_equipment_consumable_2021_22_utilized`, `utilization_sports_equipment_consumable_2022_23_received`, `utilization_sports_equipment_consumable_2022_23_utilized`, `utilization_sports_equipment_non_consumable_2018_19_received`, `utilization_sports_equipment_non_consumable_2018_19_utilized`, `utilization_sports_equipment_non_consumable_2019_20_received`, `utilization_sports_equipment_non_consumable_2019_20_utilized`, `utilization_sports_equipment_non_consumable_2021_22_received`, `utilization_sports_equipment_non_consumable_2021_22_utilized`, `utilization_sports_equipment_non_consumable_2022_23_received`, `utilization_sports_equipment_non_consumable_2022_23_utilized`, `utilization_sports_science_consumable_2018_19_received`, `utilization_sports_science_consumable_2018_19_utilized`, `utilization_sports_science_consumable_2019_20_received`, `utilization_sports_science_consumable_2019_20_utilized`, `utilization_sports_science_consumable_2020_21_received`, `utilization_sports_science_consumable_2020_21_utilized`, `utilization_sports_science_consumable_2021_22_received`, `utilization_sports_science_consumable_2021_22_utilized`, `utilization_sports_science_consumable_2022_23_received`, `utilization_sports_science_consumable_2022_23_utilized`, `utilization_sports_science_non_consumable_2018_19_received`, `utilization_sports_science_non_consumable_2018_19_utilized`, `utilization_sports_science_non_consumable_2019_20_received`, `utilization_sports_science_non_consumable_2019_20_utilized`, `utilization_sports_equipment_non_consumable_2020_21_received`, `utilization_sports_equipment_non_consumable_2020_21_utilized`, `utilization_sports_science_non_consumable_2021_22_received`, `utilization_sports_science_non_consumable_2021_22_utilized`, `utilization_sports_science_non_consumable_2022_23_received`, `utilization_sports_science_non_consumable_2022_23_utilized`, `utilization_education_expenditure_2020_21_utilized`, `utilization_education_expenditure_2020_21_received`, `utilization_sports_science_non_consumable_2020_21_utilized`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_for`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 2522, 234, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 234, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 333, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-01-24 17:40:16', '2023-01-24 17:42:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `part_two_utilization_fund`
--
ALTER TABLE `part_two_utilization_fund`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `part_two_utilization_fund`
--
ALTER TABLE `part_two_utilization_fund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
