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
-- Table structure for table `discplines_mapping_master`
--

CREATE TABLE `discplines_mapping_master` (
  `id` int(11) NOT NULL,
  `rc_name` varchar(200) DEFAULT NULL,
  `rc_id` int(11) DEFAULT NULL,
  `ncoe_name` varchar(200) DEFAULT NULL,
  `ncoe_id` int(11) DEFAULT NULL,
  `discipline` varchar(200) DEFAULT NULL,
  `discipline_id` int(11) DEFAULT NULL,
  `discipline_type` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discplines_mapping_master`
--

INSERT INTO `discplines_mapping_master` (`id`, `rc_name`, `rc_id`, `ncoe_name`, `ncoe_id`, `discipline`, `discipline_id`, `discipline_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'RC Mumbai', 2520, 'NCOE Aurangabad', 3021, 'Weightlifting', 3, 1, 1, '2023-01-21 07:34:58', NULL),
(2, 'RC Mumbai', 2520, 'NCOE Aurangabad', 3021, 'Boxing', 13, 1, 1, '2023-01-21 07:34:58', NULL),
(3, 'RC Mumbai', 2520, 'NCOE Aurangabad', 3021, 'Gymnastics', 11, 1, 1, '2023-01-21 07:34:58', NULL),
(4, 'RC Mumbai', 2520, 'NCOE Aurangabad', 3021, 'Archery', 1, 1, 1, '2023-01-21 07:34:58', NULL),
(5, 'RC Mumbai', 2520, 'NCOE Aurangabad', 3021, 'Fencing', 21, 1, 1, '2023-01-21 07:34:58', NULL),
(6, 'RC Mumbai', 2520, 'NCOE Aurangabad', 3021, 'Hockey', 10, 2, 1, '2023-01-21 07:34:58', NULL),
(7, 'RC Bangalore', 2514, 'NCOE Bengaluru', 3020, 'Weightlifting', 3, 1, 1, '2023-01-21 07:34:58', NULL),
(8, 'RC Bangalore', 2514, 'NCOE Bengaluru', 3020, 'Taekwondo', 33, 1, 1, '2023-01-21 07:34:58', NULL),
(9, 'RC Bangalore', 2514, 'NCOE Bengaluru', 3020, 'Athletics', 16, 1, 1, '2023-01-21 07:34:58', NULL),
(10, 'RC Bangalore', 2514, 'NCOE Bengaluru', 3020, 'Hockey', 10, 2, 1, '2023-01-21 07:34:58', NULL),
(11, 'RC Bhopal', 2515, 'NCOE Bhopal', 3019, 'Boxing', 13, 1, 1, '2023-01-21 07:34:58', NULL),
(12, 'RC Bhopal', 2515, 'NCOE Bhopal', 3019, 'Kayaking and Canoeing', 35, 1, 1, '2023-01-21 07:34:58', NULL),
(13, 'RC Bhopal', 2515, 'NCOE Bhopal', 3019, 'Wushu', 32, 1, 1, '2023-01-21 07:34:58', NULL),
(14, 'RC Bhopal', 2515, 'NCOE Bhopal', 3019, 'Athletics', 16, 1, 1, '2023-01-21 07:34:58', NULL),
(15, 'RC Bhopal', 2515, 'NCOE Bhopal', 3019, 'Hockey', 10, 2, 1, '2023-01-21 07:34:58', NULL),
(16, 'RC Bhopal', 2515, 'NCOE Bhopal', 3019, 'Judo', 9, 1, 1, '2023-01-21 07:34:58', NULL),
(18, 'RC Chandigarh', 2516, 'NCOE DHARAMSHALA', 3001, 'Volleyball', 4, 2, 1, '2023-01-21 07:34:58', NULL),
(19, 'RC Chandigarh', 2516, 'NCOE DHARAMSHALA', 3001, 'Kabaddi', 8, 2, 1, '2023-01-21 07:34:58', NULL),
(20, 'RC Chandigarh', 2516, 'NCOE DHARAMSHALA', 3001, 'Athletics', 16, 1, 1, '2023-01-21 07:34:58', NULL),
(21, 'Stadia, Delhi', 5924, 'NCOE Dr. Karni Singh Shooting Range', 3017, 'Para - Shooting', 68, 1, 1, '2023-01-21 07:34:58', NULL),
(22, 'Stadia, Delhi', 5924, 'NCOE Dr. Karni Singh Shooting Range', 3017, 'Shooting', 6, 1, 1, '2023-01-21 07:34:58', NULL),
(23, 'Stadia, Delhi', 5924, 'NCOE Dr. SPM Swimming Pool Complex', 3016, 'Swimming', 5, 1, 1, '2023-01-21 07:34:58', NULL),
(24, 'RC Gandhinagar', 2522, 'NCOE Gandhinagar', 3015, 'Para - Fencing', 70, 1, 1, '2023-01-21 07:34:58', NULL),
(25, 'RC Gandhinagar', 2522, 'NCOE Gandhinagar', 3015, 'Kho-Kho', 7, 2, 1, '2023-01-21 07:34:58', NULL),
(26, 'RC Gandhinagar', 2522, 'NCOE Gandhinagar', 3015, 'Para - Swimming', 28, 1, 1, '2023-01-21 07:34:58', NULL),
(27, 'RC Gandhinagar', 2522, 'NCOE Gandhinagar', 3015, 'Para - Table Tennis', 69, 1, 1, '2023-01-21 07:34:58', NULL),
(28, 'RC Gandhinagar', 2522, 'NCOE Gandhinagar', 3015, 'Kabaddi', 8, 2, 1, '2023-01-21 07:34:58', NULL),
(29, 'RC Gandhinagar', 2522, 'NCOE Gandhinagar', 3015, 'Para - Athletics', 27, 1, 1, '2023-01-21 07:34:58', NULL),
(30, 'RC Gandhinagar', 2522, 'NCOE Gandhinagar', 3015, 'Para - Powerlifting', 29, 1, 1, '2023-01-21 07:34:58', NULL),
(31, 'RC Gandhinagar', 2522, 'NCOE Gandhinagar', 3015, 'Handball', 34, 1, 1, '2023-01-21 07:34:58', NULL),
(32, 'RC Guwahati', 2517, 'NCOE Guwahati', 3014, 'Cycling', 19, 1, 1, '2023-01-21 07:34:58', NULL),
(33, 'RC Guwahati', 2517, 'NCOE Guwahati', 3014, 'Football', 12, 2, 1, '2023-01-21 07:34:58', NULL),
(34, 'RC Guwahati', 2517, 'NCOE Guwahati', 3014, 'Taekwondo', 33, 1, 1, '2023-01-21 07:34:58', NULL),
(35, 'RC Guwahati', 2517, 'NCOE Guwahati', 3014, 'Athletics', 16, 1, 1, '2023-01-21 07:34:58', NULL),
(36, 'RC Guwahati', 2517, 'NCOE Guwahati', 3014, 'Archery', 1, 1, 1, '2023-01-21 07:34:59', NULL),
(37, 'RC Guwahati', 2517, 'NCOE Guwahati', 3014, 'Fencing', 21, 1, 1, '2023-01-21 07:34:59', NULL),
(38, 'RC Guwahati', 2517, 'NCOE Guwahati', 3014, 'Boxing', 13, 1, 1, '2023-01-21 07:34:59', NULL),
(39, 'RC Chandigarh', 2516, 'NCOE Hamirpur', 11859, 'Athletics', 16, 1, 1, '2023-01-21 07:34:59', NULL),
(40, 'RC Chandigarh', 2516, 'NCOE Hamirpur', 11859, 'Wrestling', 2, 1, 1, '2023-01-21 07:34:59', NULL),
(41, 'RC Chandigarh', 2516, 'NCOE Hamirpur', 11859, 'Hockey', 10, 2, 1, '2023-01-21 07:34:59', NULL),
(42, 'RC Chandigarh', 2516, 'NCOE Hamirpur', 11859, 'Badminton', 15, 1, 1, '2023-01-21 07:34:59', NULL),
(43, 'RC Chandigarh', 2516, 'NCOE Hamirpur', 11859, 'Judo', 9, 1, 1, '2023-01-21 07:34:59', NULL),
(44, 'RC Chandigarh', 2516, 'NCOE Hamirpur', 11859, 'Boxing', 13, 1, 1, '2023-01-21 07:34:59', NULL),
(45, 'Stadia, Delhi', 5924, 'NCOE I G Stadium', 3013, 'Gymnastics', 11, 1, 1, '2023-01-21 07:34:59', NULL),
(46, 'Stadia, Delhi', 5924, 'NCOE I G Stadium', 3013, 'Boxing', 13, 1, 1, '2023-01-21 07:34:59', NULL),
(47, 'Stadia, Delhi', 5924, 'NCOE I G Stadium', 3013, 'Cycling', 19, 1, 1, '2023-01-21 07:34:59', NULL),
(48, 'RC Imphal', 2523, 'NCOE Imphal', 3012, 'Hockey', 10, 2, 1, '2023-01-21 07:34:59', NULL),
(49, 'RC Imphal', 2523, 'NCOE Imphal', 3012, 'Archery', 1, 1, 1, '2023-01-21 07:34:59', NULL),
(50, 'RC Imphal', 2523, 'NCOE Imphal', 3012, 'Judo', 9, 1, 1, '2023-01-21 07:34:59', NULL),
(51, 'RC Imphal', 2523, 'NCOE Imphal', 3012, 'Weightlifting', 3, 1, 1, '2023-01-21 07:34:59', NULL),
(52, 'RC Imphal', 2523, 'NCOE Imphal', 3012, 'Football', 12, 2, 1, '2023-01-21 07:34:59', NULL),
(53, 'RC Imphal', 2523, 'NCOE Imphal', 3012, 'Wushu', 32, 1, 1, '2023-01-21 07:34:59', NULL),
(54, 'RC Imphal', 2523, 'NCOE Imphal', 3012, 'Cycling', 19, 1, 1, '2023-01-21 07:34:59', NULL),
(55, 'RC Imphal', 2523, 'NCOE Imphal', 3012, 'Fencing', 21, 1, 1, '2023-01-21 07:34:59', NULL),
(56, 'RC Imphal', 2523, 'NCOE Imphal', 3012, 'Athletics', 16, 1, 1, '2023-01-21 07:34:59', NULL),
(57, 'Stadia, Delhi', 5924, 'NCOE J N Stadium', 3011, 'Athletics', 16, 1, 1, '2023-01-21 07:34:59', NULL),
(58, 'RC Kolkata', 2518, 'NCOE JAGATPUR', 3000, 'Kayaking and Canoeing', 35, 1, 1, '2023-01-21 07:34:59', NULL),
(59, 'RC Kolkata', 2518, 'NCOE JAGATPUR', 3000, 'Rowing', 20, 1, 1, '2023-01-21 07:34:59', NULL),
(60, 'RC Kolkata', 2518, 'NCOE Kolkata', 3010, 'Table Tennis', 18, 1, 1, '2023-01-21 07:34:59', NULL),
(61, 'RC Kolkata', 2518, 'NCOE Kolkata', 3010, 'Athletics', 16, 1, 1, '2023-01-21 07:34:59', NULL),
(62, 'RC Kolkata', 2518, 'NCOE Kolkata', 3010, 'Hockey', 10, 2, 1, '2023-01-21 07:34:59', NULL),
(63, 'RC Kolkata', 2518, 'NCOE Kolkata', 3010, 'Archery', 1, 1, 1, '2023-01-21 07:34:59', NULL),
(64, 'RC Kolkata', 2518, 'NCOE Kolkata', 3010, 'Gymnastics', 11, 1, 1, '2023-01-21 07:34:59', NULL),
(65, 'RC Lucknow', 2519, 'NCOE Lucknow', 3009, 'Hockey', 10, 2, 1, '2023-01-21 07:34:59', NULL),
(66, 'RC Lucknow', 2519, 'NCOE Lucknow', 3009, 'Taekwondo', 33, 1, 1, '2023-01-21 07:34:59', NULL),
(67, 'RC Lucknow', 2519, 'NCOE Lucknow', 3009, 'Weightlifting', 3, 1, 1, '2023-01-21 07:34:59', NULL),
(68, 'RC Lucknow', 2519, 'NCOE Lucknow', 3009, 'Athletics', 16, 1, 1, '2023-01-21 07:34:59', NULL),
(69, 'RC Lucknow', 2519, 'NCOE Lucknow', 3009, 'Wrestling', 2, 1, 1, '2023-01-21 07:34:59', NULL),
(70, 'Stadia, Delhi', 5924, 'NCOE MDC National Stadium', 3008, 'Hockey', 10, 2, 1, '2023-01-21 07:34:59', NULL),
(71, 'RC Mumbai', 2520, 'NCOE Mumbai', 3007, 'Kabaddi', 8, 2, 1, '2023-01-21 07:34:59', NULL),
(72, 'RC Mumbai', 2520, 'NCOE Mumbai', 3007, 'Hockey', 10, 2, 1, '2023-01-21 07:34:59', NULL),
(73, 'RC Mumbai', 2520, 'NCOE Mumbai', 3007, 'Wrestling', 2, 1, 1, '2023-01-21 07:34:59', NULL),
(74, 'RC Sonepat', 2521, 'NCOE National Boxing Academy (KI), Rohtak', 3006, 'Boxing', 13, 1, 1, '2023-01-21 07:34:59', NULL),
(75, 'RC Trivandrum', 2513, 'NCOE National Water Sports Academy (KI), Alleppey', 3005, 'Kayaking and Canoeing', 35, 1, 1, '2023-01-21 07:34:59', NULL),
(76, 'RC Trivandrum', 2513, 'NCOE National Water Sports Academy (KI), Alleppey', 3005, 'Rowing', 20, 1, 1, '2023-01-21 07:34:59', NULL),
(77, 'RC Patiala', 2524, 'NCOE Patiala', 2999, 'Judo', 9, 1, 1, '2023-01-21 07:34:59', NULL),
(78, 'RC Patiala', 2524, 'NCOE Patiala', 2999, 'Cycling', 19, 1, 1, '2023-01-21 07:34:59', NULL),
(79, 'RC Patiala', 2524, 'NCOE Patiala', 2999, 'Athletics', 16, 1, 1, '2023-01-21 07:34:59', NULL),
(80, 'RC Patiala', 2524, 'NCOE Patiala', 2999, 'Hockey', 10, 2, 1, '2023-01-21 07:34:59', NULL),
(81, 'RC Patiala', 2524, 'NCOE Patiala', 2999, 'Fencing', 21, 1, 1, '2023-01-21 07:34:59', NULL),
(82, 'RC Patiala', 2524, 'NCOE Patiala', 2999, 'Weightlifting', 3, 1, 1, '2023-01-21 07:34:59', NULL),
(83, 'RC Guwahati', 2517, 'NCOE Sangey Lhaden Sports Academy (SLSA) Itanagar', 3004, 'Boxing', 13, 1, 1, '2023-01-21 07:34:59', NULL),
(84, 'RC Guwahati', 2517, 'NCOE Sangey Lhaden Sports Academy (SLSA) Itanagar', 3004, 'Weightlifting', 3, 1, 1, '2023-01-21 07:34:59', NULL),
(85, 'RC Guwahati', 2517, 'NCOE Sangey Lhaden Sports Academy (SLSA) Itanagar', 3004, 'Wushu', 32, 1, 1, '2023-01-21 07:34:59', NULL),
(86, 'RC Sonepat', 2521, 'NCOE Sonepat', 3003, 'Archery', 1, 1, 1, '2023-01-21 07:34:59', NULL),
(87, 'RC Sonepat', 2521, 'NCOE Sonepat', 3003, 'Hockey', 10, 2, 1, '2023-01-21 07:34:59', NULL),
(88, 'RC Sonepat', 2521, 'NCOE Sonepat', 3003, 'Athletics', 16, 1, 1, '2023-01-21 07:34:59', NULL),
(89, 'RC Sonepat', 2521, 'NCOE Sonepat', 3003, 'Wrestling', 2, 1, 1, '2023-01-21 07:34:59', NULL),
(90, 'RC Sonepat', 2521, 'NCOE Sonepat', 3003, 'Kabaddi', 8, 2, 1, '2023-01-21 07:34:59', NULL),
(91, 'RC Trivandrum', 2513, 'NCOE THIRUVANANTHAPURAM', 3002, 'Taekwondo', 33, 1, 1, '2023-01-21 07:34:59', NULL),
(92, 'RC Trivandrum', 2513, 'NCOE THIRUVANANTHAPURAM', 3002, 'Athletics', 16, 1, 1, '2023-01-21 07:34:59', NULL),
(93, 'RC Trivandrum', 2513, 'NCOE THIRUVANANTHAPURAM', 3002, 'Cycling', 19, 1, 1, '2023-01-21 07:34:59', NULL),
(94, 'RC Trivandrum', 2513, 'NCOE THIRUVANANTHAPURAM', 3002, 'Football', 12, 2, 1, '2023-01-21 07:34:59', NULL),
(95, 'RC Trivandrum', 2513, 'NCOE THIRUVANANTHAPURAM', 3002, 'Swimming', 5, 1, 1, '2023-01-21 07:34:59', NULL),
(96, 'RC Trivandrum', 2513, 'NCOE THIRUVANANTHAPURAM', 3002, 'Volleyball', 4, 2, 1, '2023-01-21 07:34:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discplines_mapping_master`
--
ALTER TABLE `discplines_mapping_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discplines_mapping_master`
--
ALTER TABLE `discplines_mapping_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
