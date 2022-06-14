-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 14, 2022 at 01:14 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epermit`
--

-- --------------------------------------------------------

--
-- Table structure for table `aepermit`
--

DROP TABLE IF EXISTS `aepermit`;
CREATE TABLE IF NOT EXISTS `aepermit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amc_id` int(11) NOT NULL,
  `veh_no` varchar(15) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `invoice` varchar(55) NOT NULL,
  `ad1` varchar(255) NOT NULL,
  `ad2` varchar(255) NOT NULL,
  `com_name` varchar(55) NOT NULL,
  `value` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `dis_id` int(11) NOT NULL,
  `mdl_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aepermit`
--

INSERT INTO `aepermit` (`id`, `amc_id`, `veh_no`, `phone`, `name`, `invoice`, `ad1`, `ad2`, `com_name`, `value`, `qte`, `state_id`, `dis_id`, `mdl_id`, `t_id`, `created`) VALUES
(2, 2, 'fd32h3212', '4337237678', 'kedia', 'h4l7852', 'ad1', 'ad2', 'Eel', 160000, 40, 2, 536, 3, 39, '2022-05-19 09:53:15'),
(3, 8, 'fd32h3212', '1231111111', 'kedia', 'h4l7852', 'ddd', 'ad1', 'corn', 160000, 40, 2, 537, 12, 55, '2022-05-19 11:24:44'),
(4, 2, 'fd32h3212', '1234321567', 'Kalpataru', 'h4l7852', 'ad1', 'ad2', 'Poha', 3215555, 20, 2, 536, 3, 57, '2022-05-19 13:20:48'),
(5, 2, 'fd32h3212', '1234321567', 'Kalpataru', 'h4l7852', 'ad1', 'ad2', 'Poha', 3215555, 20, 2, 536, 3, 57, '2022-05-19 13:21:11'),
(6, 2, 'fd32h3212', '1234321567', 'Kalpataru', 'h4l7852', 'ad1', 'ad2', 'Poha', 3215555, 20, 2, 536, 3, 57, '2022-05-19 13:23:06'),
(7, 2, 'fd32h3212', '1234321567', 'Kalpataru', 'h4l7852', 'ad1', 'ad2', 'Poha', 3215555, 20, 2, 536, 3, 57, '2022-05-19 13:23:26'),
(8, 5, 'fd32h3212', '9337237678', 'kk', 'h4l7852', 'ad1', 'ad2', 'Rice', 160000, 60, 2, 535, 8, 64, '2022-05-19 14:18:01'),
(9, 2, 'fd32h3212', '9337237678', 'kedia', 'h4l7852', 'ad1', 'ad2', 'Rice', 160000, 40, 2, 536, 3, 64, '2022-05-23 13:38:00'),
(10, 5, 'fd32h3212', '9337231111', 'kedia', 'jh1478', 'ad1', 'ad2', 'Rice', 160000, 175, 2, 535, 9, 70, '2022-05-24 12:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `amc`
--

DROP TABLE IF EXISTS `amc`;
CREATE TABLE IF NOT EXISTS `amc` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `district_id` int(55) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amc`
--

INSERT INTO `amc` (`id`, `name`, `created_at`, `updated_at`, `district_id`, `address`) VALUES
(2, 'Guntur1', '2022-04-18 18:09:48', '2022-04-18 18:10:23', 536, 'Guntur District Address - 751023'),
(3, 'Mangasamudram', NULL, NULL, 534, NULL),
(4, 'Tirupathi', NULL, NULL, 534, NULL),
(5, 'Ramachandrapuram', NULL, NULL, 535, NULL),
(6, 'Gaddiannaram', NULL, NULL, 536, NULL),
(7, 'Bowenpally', NULL, NULL, 536, NULL),
(8, 'Kadapa', NULL, NULL, 537, NULL),
(9, 'Mydukar', NULL, NULL, 537, NULL),
(10, 'Dharmapuri', NULL, NULL, 537, NULL),
(11, 'Dharmapuri', NULL, NULL, 538, NULL),
(12, 'Dharmaram', NULL, NULL, 538, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ca_apply`
--

DROP TABLE IF EXISTS `ca_apply`;
CREATE TABLE IF NOT EXISTS `ca_apply` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `isfamilymemberholdca` int(1) DEFAULT '0',
  `familymemberholdcafile` varchar(255) DEFAULT NULL,
  `isotherfirm` int(1) DEFAULT '0',
  `upladedotherfirmfile` varchar(255) DEFAULT NULL,
  `aadhar_no` varchar(20) DEFAULT NULL,
  `name` varchar(155) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `fathersname` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `is_minor` int(1) DEFAULT '0',
  `address` text,
  `mobile` varchar(55) DEFAULT NULL,
  `pan_no` varchar(55) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `marketname` text,
  `state_id` int(55) DEFAULT NULL,
  `district_id` int(55) DEFAULT NULL,
  `gstin` text,
  `liscencetype_id` int(55) DEFAULT NULL,
  `amc_id` int(55) DEFAULT NULL,
  `power_attorney` text,
  `updated_at` datetime DEFAULT NULL,
  `user_temp_id` text,
  `created_at` datetime DEFAULT NULL,
  `is_reg_pay` int(1) DEFAULT '0',
  `reg_pay_desc` text,
  `is_final_pay` int(2) NOT NULL DEFAULT '0',
  `final_pay_desc` text,
  `is_submit` int(1) DEFAULT '0',
  `is_amc_approval` int(1) DEFAULT '0',
  `is_ad_approval` int(1) DEFAULT '0',
  `is_commisioner_approval` int(1) DEFAULT '0',
  `user_id` int(55) DEFAULT NULL,
  `application_id` varchar(255) DEFAULT NULL,
  `is_sign_upload` int(1) NOT NULL DEFAULT '0',
  `signature_file` varchar(255) DEFAULT NULL,
  `aadhar_file` varchar(255) DEFAULT NULL,
  `pan_file` varchar(255) DEFAULT NULL,
  `traderlicense` int(1) DEFAULT '0',
  `is_commissioner_comply` int(1) DEFAULT '0',
  `is_amc_comply` int(1) DEFAULT '0',
  `is_ad_comply` int(1) DEFAULT '0',
  `pincode` varchar(22) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  `traderlicensefile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ca_apply`
--

INSERT INTO `ca_apply` (`id`, `isfamilymemberholdca`, `familymemberholdcafile`, `isotherfirm`, `upladedotherfirmfile`, `aadhar_no`, `name`, `age`, `fathersname`, `dob`, `is_minor`, `address`, `mobile`, `pan_no`, `email`, `marketname`, `state_id`, `district_id`, `gstin`, `liscencetype_id`, `amc_id`, `power_attorney`, `updated_at`, `user_temp_id`, `created_at`, `is_reg_pay`, `reg_pay_desc`, `is_final_pay`, `final_pay_desc`, `is_submit`, `is_amc_approval`, `is_ad_approval`, `is_commisioner_approval`, `user_id`, `application_id`, `is_sign_upload`, `signature_file`, `aadhar_file`, `pan_file`, `traderlicense`, `is_commissioner_comply`, `is_amc_comply`, `is_ad_comply`, `pincode`, `expiry_date`, `status`, `traderlicensefile`) VALUES
(1, 1, '185391021720220501161919pan (5).png', 1, '594575740720220501161919pan (6).png', '789890898978', 'aman singh', NULL, 'raj singh', '1994-05-18', 1, 'pune, banglore', '9989797989', 'fghyj6767g', 'ca@gmail.com', 'Ariana Parsons', 15, 12, '988989898989898', NULL, 2, 'kjkjfjfkjfklj', '2022-05-01 17:06:19', 'usSVXJ5rKSkE1jai9gAnkUBkjZX3ItETUSvSDwv04h8jw7nDhcguu0v3jjoHRERNEqbMUe6F9uaptnzlyxdgbmr7kOjowZaxhacY8R0CIhMt6BeBIjqrBlpcq8VI7QQtVhirwwMDcCfCRU3rvSc7WeDoWqoheXVJ1j4ElwZJEprA9R4Cj8XCdPfuyMj3SRSXG0y7prSOSxEuxzCDSYG', NULL, 1, NULL, 1, NULL, 1, 1, 1, 1, 19, 'EVNQ5pNuaNdwB53jTX6v1ZxvChpSoUfmTzBdRlkvKbrPdF2nSLZk96IGBjxl3Uy2ohqqfpeL6XkqOnZ6CjG3lMCejAIU8QVqtt7U0vov00I6VWgDiqJyKZJ2nlXj6X374FOZS3df7Gsr8N5dSgdySfnyc9OlkUCqvZuEgVxgSfuiSsRK7nr2G2IEZV074d4wa1Xm6Hl3YXbTV4SrW5e', 1, '294684476420220501170619pan (5).png', '60194837120220501161919pan (4).png', NULL, 0, 0, 0, 0, NULL, '2024-05-01', 9, NULL),
(2, 1, '508206849020220501211335pan (8).png', 1, '722750573220220501211335pan (8).png', '897979797989', 'Vikash singh', NULL, 'vishal', '1992-05-07', 0, 'ass', '8799978979', 'gshsg6767j', 'Vikash@gmail.com', 'Martha Bean', 6, 15, 'nj9889898989898', NULL, 2, 'jhjhjhj', '2022-05-01 22:13:27', 'fmZbgnWCvyswRP3r8KmFwuRPXQwF7ultu3HYkEYAywJFBgTN6jtj3FPaMqX12yuPux4JIisAXq6h1zv6Wi0wh5sYrfMKH5zjrX6pHUNNtdO3Y0By4p3nnV5pEzSZWXapPDN2YcoHucxBgVIEgdMBG78X8WFapoZlU5l48Keyx6AzVoHwye4lP41rTv78LpXnR5etw9LOHHtMZS99mgv', NULL, 1, NULL, 1, NULL, 1, 1, 1, 1, 21, 'mByT284fIi2qhOCKzmhaobEFZQLljDRZTK3nPWXoNEXQz9t32OoWvDcy7oZJMvGUGjpSuW2qit7kjNx9pAK51A3jVemC0B7POj6AqQcvsm3GQJHjkGMq4Jb0b8tFDrQIR0LmaGNELCzl2AotB4xAANfEkNN2vTiNKh4vK5w3biX3Xxx336qxyXfwS7frZxah4hf1kbgCmmJWo5YDA40', 1, '939825845920220501221327pan (8).png', '296492020220501211335pan (8).png', NULL, 1, 0, 0, 0, NULL, '2024-05-01', 9, '937292207220220501211335pan (8).png');

-- --------------------------------------------------------

--
-- Table structure for table `commodity`
--

DROP TABLE IF EXISTS `commodity`;
CREATE TABLE IF NOT EXISTS `commodity` (
  `com_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `com_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amt` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `q_id` int(11) NOT NULL,
  `df` date DEFAULT NULL,
  `dt` date DEFAULT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commodity`
--

INSERT INTO `commodity` (`com_id`, `com_name`, `com_description`, `amt`, `status`, `created_at`, `updated_at`, `q_id`, `df`, `dt`) VALUES
(1, 'WHEAT', 'Punjab', 100, 1, '2022-05-10 06:59:02', '2022-05-21 01:35:05', 1, '2022-05-11', '2022-05-22'),
(2, 'RICE', 'West Bengal', 150, 1, '2022-05-13 06:59:02', '2022-06-01 04:36:47', 1, '2022-05-11', '2022-07-31'),
(9, 'Eel', 'indian', 1000, 1, '2022-05-16 06:59:02', '2022-06-01 04:36:03', 2, '2022-05-03', '2022-06-05'),
(8, 'corn', 'american', 300, 1, '2022-05-12 06:59:02', '2022-06-01 04:36:28', 1, '2022-05-04', '2022-07-10'),
(10, 'Poha', 'From rice', 50, 1, '2022-05-18 06:59:02', '2022-06-01 05:36:04', 1, '2022-05-12', '2022-06-30'),
(12, 'WHEAT', 'punjab', 102, 1, '2022-05-21 07:05:26', '2022-05-21 01:35:53', 1, '2022-05-10', '2022-05-13'),
(21, 'WHEAT', 'punjab', 70, 1, '2022-05-21 12:07:46', '2022-05-21 12:07:46', 1, '2022-05-19', '2022-05-20'),
(22, 'WHEAT', 'punjab', 700, 1, '2022-05-21 12:11:54', '2022-05-21 12:11:54', 1, '2022-05-19', '2022-05-29'),
(23, 'WHEAT', 'punjab', 70, 1, '2022-05-21 12:14:08', '2022-05-21 12:14:08', 1, '2022-05-18', '2022-05-29'),
(24, 'WHEAT', 'punjab', 17000, 1, '2022-05-26 12:12:11', '2022-05-31 06:35:04', 4, '2022-05-26', '2022-06-04'),
(25, 'WHEAT', 'punjab', 35, 1, '2022-05-31 12:15:52', '2022-05-31 12:15:52', 1, '2022-05-11', '2022-07-03'),
(26, 'DALIYA', 'wheat', 102, 1, '2022-05-31 12:18:11', '2022-05-31 12:18:11', 1, '2022-05-30', '2022-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(55) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=642 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `state_id`, `created_at`, `updated_at`, `code`) VALUES
(2, 'Bandipore', '15', NULL, NULL, NULL),
(3, 'Baramulla', '15', NULL, NULL, NULL),
(4, 'Budgam', '15', NULL, NULL, NULL),
(5, 'Doda', '15', NULL, NULL, NULL),
(6, 'Ganderbal', '15', NULL, NULL, NULL),
(7, 'Jammu', '15', NULL, NULL, NULL),
(8, 'Kargil', '15', NULL, NULL, NULL),
(9, 'Kathua', '15', NULL, NULL, NULL),
(10, 'Kishtwar', '15', NULL, NULL, NULL),
(11, 'Kulgam', '15', NULL, NULL, NULL),
(12, 'Kupwara', '15', NULL, NULL, NULL),
(13, 'Leh (Ladakh)', '15', NULL, NULL, NULL),
(14, 'Poonch', '15', NULL, NULL, NULL),
(15, 'Pulwama', '15', NULL, NULL, NULL),
(16, 'Rajouri', '15', NULL, NULL, NULL),
(17, 'Ramban', '15', NULL, NULL, NULL),
(18, 'Reasi', '15', NULL, NULL, NULL),
(19, 'Samba', '15', NULL, NULL, NULL),
(20, 'Shopian', '15', NULL, NULL, NULL),
(21, 'Srinagar', '15', NULL, NULL, NULL),
(22, 'Udhampur', '15', NULL, NULL, NULL),
(23, 'Bilaspur (Himachal Pradesh)', '14', NULL, NULL, NULL),
(24, 'Chamba', '14', NULL, NULL, NULL),
(25, 'Hamirpur (Himachal Pradesh)', '14', NULL, NULL, NULL),
(26, 'Kangra', '14', NULL, NULL, NULL),
(27, 'Kinnaur', '14', NULL, NULL, NULL),
(28, 'Kullu', '14', NULL, NULL, NULL),
(29, 'Lahul & Spiti', '14', NULL, NULL, NULL),
(30, 'Mandi', '14', NULL, NULL, NULL),
(31, 'Shimla', '14', NULL, NULL, NULL),
(32, 'Sirmaur', '14', NULL, NULL, NULL),
(33, 'Solan', '14', NULL, NULL, NULL),
(34, 'Una', '14', NULL, NULL, NULL),
(35, 'Amritsar', '28', NULL, NULL, NULL),
(36, 'Barnala', '28', NULL, NULL, NULL),
(37, 'Bathinda', '28', NULL, NULL, NULL),
(38, 'Faridkot', '28', NULL, NULL, NULL),
(39, 'Fatehgarh Sahib', '28', NULL, NULL, NULL),
(40, 'Firozpur', '28', NULL, NULL, NULL),
(41, 'Gurdaspur', '28', NULL, NULL, NULL),
(42, 'Hoshiarpur', '28', NULL, NULL, NULL),
(43, 'Jalandhar', '28', NULL, NULL, NULL),
(44, 'Kapurthala', '28', NULL, NULL, NULL),
(45, 'Ludhiana', '28', NULL, NULL, NULL),
(46, 'Mansa', '28', NULL, NULL, NULL),
(47, 'Moga', '28', NULL, NULL, NULL),
(48, 'Muktsar', '28', NULL, NULL, NULL),
(49, 'Patiala', '28', NULL, NULL, NULL),
(50, 'Rupnagar (Ropar)', '28', NULL, NULL, NULL),
(51, 'Sahibzada Ajit Singh Nagar (Mohali)', '28', NULL, NULL, NULL),
(52, 'Sangrur', '28', NULL, NULL, NULL),
(53, 'Shahid Bhagat Singh Nagar (Nawanshahr)', '28', NULL, NULL, NULL),
(54, 'Tarn Taran', '28', NULL, NULL, NULL),
(55, 'Chandigarh', '6', NULL, NULL, NULL),
(56, 'Almora', '34', NULL, NULL, NULL),
(57, 'Bageshwar', '34', NULL, NULL, NULL),
(58, 'Chamoli', '34', NULL, NULL, NULL),
(59, 'Champawat', '34', NULL, NULL, NULL),
(60, 'Dehradun', '34', NULL, NULL, NULL),
(61, 'Haridwar', '34', NULL, NULL, NULL),
(62, 'Nainital', '34', NULL, NULL, NULL),
(63, 'Pauri Garhwal', '34', NULL, NULL, NULL),
(64, 'Pithoragarh', '34', NULL, NULL, NULL),
(65, 'Rudraprayag', '34', NULL, NULL, NULL),
(66, 'Tehri Garhwal', '34', NULL, NULL, NULL),
(67, 'Udham Singh Nagar', '34', NULL, NULL, NULL),
(68, 'Uttarkashi', '34', NULL, NULL, NULL),
(69, 'Ambala', '13', NULL, NULL, NULL),
(70, 'Bhiwani', '13', NULL, NULL, NULL),
(71, 'Faridabad', '13', NULL, NULL, NULL),
(72, 'Fatehabad', '13', NULL, NULL, NULL),
(73, 'Gurgaon', '13', NULL, NULL, NULL),
(74, 'Hisar', '13', NULL, NULL, NULL),
(75, 'Jhajjar', '13', NULL, NULL, NULL),
(76, 'Jind', '13', NULL, NULL, NULL),
(77, 'Kaithal', '13', NULL, NULL, NULL),
(78, 'Karnal', '13', NULL, NULL, NULL),
(79, 'Kurukshetra', '13', NULL, NULL, NULL),
(80, 'Mahendragarh', '13', NULL, NULL, NULL),
(81, 'Mewat', '13', NULL, NULL, NULL),
(82, 'Palwal', '13', NULL, NULL, NULL),
(83, 'Panchkula', '13', NULL, NULL, NULL),
(84, 'Panipat', '13', NULL, NULL, NULL),
(85, 'Rewari', '13', NULL, NULL, NULL),
(86, 'Rohtak', '13', NULL, NULL, NULL),
(87, 'Sirsa', '13', NULL, NULL, NULL),
(88, 'Sonipat', '13', NULL, NULL, NULL),
(89, 'Yamuna Nagar', '13', NULL, NULL, NULL),
(90, 'Central Delhi', '10', NULL, NULL, NULL),
(91, 'East Delhi', '10', NULL, NULL, NULL),
(92, 'New Delhi', '10', NULL, NULL, NULL),
(93, 'North Delhi', '10', NULL, NULL, NULL),
(94, 'North East Delhi', '10', NULL, NULL, NULL),
(95, 'North West Delhi', '10', NULL, NULL, NULL),
(96, 'South Delhi', '10', NULL, NULL, NULL),
(97, 'South West Delhi', '10', NULL, NULL, NULL),
(98, 'West Delhi', '10', NULL, NULL, NULL),
(99, 'Ajmer', '29', NULL, NULL, NULL),
(100, 'Alwar', '29', NULL, NULL, NULL),
(101, 'Banswara', '29', NULL, NULL, NULL),
(102, 'Baran', '29', NULL, NULL, NULL),
(103, 'Barmer', '29', NULL, NULL, NULL),
(104, 'Bharatpur', '29', NULL, NULL, NULL),
(105, 'Bhilwara', '29', NULL, NULL, NULL),
(106, 'Bikaner', '29', NULL, NULL, NULL),
(107, 'Bundi', '29', NULL, NULL, NULL),
(108, 'Chittorgarh', '29', NULL, NULL, NULL),
(109, 'Churu', '29', NULL, NULL, NULL),
(110, 'Dausa', '29', NULL, NULL, NULL),
(111, 'Dholpur', '29', NULL, NULL, NULL),
(112, 'Dungarpur', '29', NULL, NULL, NULL),
(113, 'Ganganagar', '29', NULL, NULL, NULL),
(114, 'Hanumangarh', '29', NULL, NULL, NULL),
(115, 'Jaipur', '29', NULL, NULL, NULL),
(116, 'Jaisalmer', '29', NULL, NULL, NULL),
(117, 'Jalor', '29', NULL, NULL, NULL),
(118, 'Jhalawar', '29', NULL, NULL, NULL),
(119, 'Jhunjhunu', '29', NULL, NULL, NULL),
(120, 'Jodhpur', '29', NULL, NULL, NULL),
(121, 'Karauli', '29', NULL, NULL, NULL),
(122, 'Kota', '29', NULL, NULL, NULL),
(123, 'Nagaur', '29', NULL, NULL, NULL),
(124, 'Pali', '29', NULL, NULL, NULL),
(125, 'Pratapgarh (Rajasthan)', '29', NULL, NULL, NULL),
(126, 'Rajsamand', '29', NULL, NULL, NULL),
(127, 'Sawai Madhopur', '29', NULL, NULL, NULL),
(128, 'Sikar', '29', NULL, NULL, NULL),
(129, 'Sirohi', '29', NULL, NULL, NULL),
(130, 'Tonk', '29', NULL, NULL, NULL),
(131, 'Udaipur', '29', NULL, NULL, NULL),
(132, 'Agra', '33', NULL, NULL, NULL),
(133, 'Aligarh', '33', NULL, NULL, NULL),
(134, 'Allahabad', '33', NULL, NULL, NULL),
(135, 'Ambedkar Nagar', '33', NULL, NULL, NULL),
(136, 'Auraiya', '33', NULL, NULL, NULL),
(137, 'Azamgarh', '33', NULL, NULL, NULL),
(138, 'Bagpat', '33', NULL, NULL, NULL),
(139, 'Bahraich', '33', NULL, NULL, NULL),
(140, 'Ballia', '33', NULL, NULL, NULL),
(141, 'Balrampur', '33', NULL, NULL, NULL),
(142, 'Banda', '33', NULL, NULL, NULL),
(143, 'Barabanki', '33', NULL, NULL, NULL),
(144, 'Bareilly', '33', NULL, NULL, NULL),
(145, 'Basti', '33', NULL, NULL, NULL),
(146, 'Bijnor', '33', NULL, NULL, NULL),
(147, 'Budaun', '33', NULL, NULL, NULL),
(148, 'Bulandshahr', '33', NULL, NULL, NULL),
(149, 'Chandauli', '33', NULL, NULL, NULL),
(150, 'Chitrakoot', '33', NULL, NULL, NULL),
(151, 'Deoria', '33', NULL, NULL, NULL),
(152, 'Etah', '33', NULL, NULL, NULL),
(153, 'Etawah', '33', NULL, NULL, NULL),
(154, 'Faizabad', '33', NULL, NULL, NULL),
(155, 'Farrukhabad', '33', NULL, NULL, NULL),
(156, 'Fatehpur', '33', NULL, NULL, NULL),
(157, 'Firozabad', '33', NULL, NULL, NULL),
(158, 'Gautam Buddha Nagar', '33', NULL, NULL, NULL),
(159, 'Ghaziabad', '33', NULL, NULL, NULL),
(160, 'Ghazipur', '33', NULL, NULL, NULL),
(161, 'Gonda', '33', NULL, NULL, NULL),
(162, 'Gorakhpur', '33', NULL, NULL, NULL),
(163, 'Hamirpur', '33', NULL, NULL, NULL),
(164, 'Hardoi', '33', NULL, NULL, NULL),
(165, 'Hathras', '33', NULL, NULL, NULL),
(166, 'Jalaun', '33', NULL, NULL, NULL),
(167, 'Jaunpur', '33', NULL, NULL, NULL),
(168, 'Jhansi', '33', NULL, NULL, NULL),
(169, 'Jyotiba Phule Nagar', '33', NULL, NULL, NULL),
(170, 'Kannauj', '33', NULL, NULL, NULL),
(171, 'Kanpur Dehat', '33', NULL, NULL, NULL),
(172, 'Kanpur Nagar', '33', NULL, NULL, NULL),
(173, 'Kanshiram Nagar', '33', NULL, NULL, NULL),
(174, 'Kaushambi', '33', NULL, NULL, NULL),
(175, 'Kheri', '33', NULL, NULL, NULL),
(176, 'Kushinagar', '33', NULL, NULL, NULL),
(177, 'Lalitpur', '33', NULL, NULL, NULL),
(178, 'Lucknow', '33', NULL, NULL, NULL),
(179, 'Maharajganj', '33', NULL, NULL, NULL),
(180, 'Mahoba', '33', NULL, NULL, NULL),
(181, 'Mainpuri', '33', NULL, NULL, NULL),
(182, 'Mathura', '33', NULL, NULL, NULL),
(183, 'Mau', '33', NULL, NULL, NULL),
(184, 'Meerut', '33', NULL, NULL, NULL),
(185, 'Mirzapur', '33', NULL, NULL, NULL),
(186, 'Moradabad', '33', NULL, NULL, NULL),
(187, 'Muzaffarnagar', '33', NULL, NULL, NULL),
(188, 'Pilibhit', '33', NULL, NULL, NULL),
(189, 'Pratapgarh', '33', NULL, NULL, NULL),
(190, 'Rae Bareli', '33', NULL, NULL, NULL),
(191, 'Rampur', '33', NULL, NULL, NULL),
(192, 'Saharanpur', '33', NULL, NULL, NULL),
(193, 'Sant Kabir Nagar', '33', NULL, NULL, NULL),
(194, 'Sant Ravidas Nagar (Bhadohi)', '33', NULL, NULL, NULL),
(195, 'Shahjahanpur', '33', NULL, NULL, NULL),
(196, 'Shrawasti', '33', NULL, NULL, NULL),
(197, 'Siddharthnagar', '33', NULL, NULL, NULL),
(198, 'Sitapur', '33', NULL, NULL, NULL),
(199, 'Sonbhadra', '33', NULL, NULL, NULL),
(200, 'Sultanpur', '33', NULL, NULL, NULL),
(201, 'Unnao', '33', NULL, NULL, NULL),
(202, 'Varanasi', '33', NULL, NULL, NULL),
(203, 'Araria', '5', NULL, NULL, NULL),
(204, 'Arwal', '5', NULL, NULL, NULL),
(205, 'Aurangabad (Bihar)', '5', NULL, NULL, NULL),
(206, 'Banka', '5', NULL, NULL, NULL),
(207, 'Begusarai', '5', NULL, NULL, NULL),
(208, 'Bhagalpur', '5', NULL, NULL, NULL),
(209, 'Bhojpur', '5', NULL, NULL, NULL),
(210, 'Buxar', '5', NULL, NULL, NULL),
(211, 'Darbhanga', '5', NULL, NULL, NULL),
(212, 'East Champaran', '5', NULL, NULL, NULL),
(213, 'Gaya', '5', NULL, NULL, NULL),
(214, 'Gopalganj', '5', NULL, NULL, NULL),
(215, 'Jamui', '5', NULL, NULL, NULL),
(216, 'Jehanabad', '5', NULL, NULL, NULL),
(217, 'Kaimur (Bhabua)', '5', NULL, NULL, NULL),
(218, 'Katihar', '5', NULL, NULL, NULL),
(219, 'Khagaria', '5', NULL, NULL, NULL),
(220, 'Kishanganj', '5', NULL, NULL, NULL),
(221, 'Lakhisarai', '5', NULL, NULL, NULL),
(222, 'Madhepura', '5', NULL, NULL, NULL),
(223, 'Madhubani', '5', NULL, NULL, NULL),
(224, 'Munger', '5', NULL, NULL, NULL),
(225, 'Muzaffarpur', '5', NULL, NULL, NULL),
(226, 'Nalanda', '5', NULL, NULL, NULL),
(227, 'Nawada', '5', NULL, NULL, NULL),
(228, 'Patna', '5', NULL, NULL, NULL),
(229, 'Purnia', '5', NULL, NULL, NULL),
(230, 'Rohtas', '5', NULL, NULL, NULL),
(231, 'Saharsa', '5', NULL, NULL, NULL),
(232, 'Samastipur', '5', NULL, NULL, NULL),
(233, 'Saran', '5', NULL, NULL, NULL),
(234, 'Sheikhpura', '5', NULL, NULL, NULL),
(235, 'Sheohar', '5', NULL, NULL, NULL),
(236, 'Sitamarhi', '5', NULL, NULL, NULL),
(237, 'Siwan', '5', NULL, NULL, NULL),
(238, 'Supaul', '5', NULL, NULL, NULL),
(239, 'Vaishali', '5', NULL, NULL, NULL),
(240, 'West Champaran', '5', NULL, NULL, NULL),
(241, 'East Sikkim', '30', NULL, NULL, NULL),
(242, 'North Sikkim', '30', NULL, NULL, NULL),
(243, 'South Sikkim', '30', NULL, NULL, NULL),
(244, 'West Sikkim', '30', NULL, NULL, NULL),
(245, 'Anjaw', '3', NULL, NULL, NULL),
(246, 'Changlang', '3', NULL, NULL, NULL),
(247, 'Dibang Valley', '3', NULL, NULL, NULL),
(248, 'East Kameng', '3', NULL, NULL, NULL),
(249, 'East Siang', '3', NULL, NULL, NULL),
(250, 'Kurung Kumey', '3', NULL, NULL, NULL),
(251, 'Lohit', '3', NULL, NULL, NULL),
(252, 'Lower Dibang Valley', '3', NULL, NULL, NULL),
(253, 'Lower Subansiri', '3', NULL, NULL, NULL),
(254, 'Papum Pare', '3', NULL, NULL, NULL),
(255, 'Tawang', '3', NULL, NULL, NULL),
(256, 'Tirap', '3', NULL, NULL, NULL),
(257, 'Upper Siang', '3', NULL, NULL, NULL),
(258, 'Upper Subansiri', '3', NULL, NULL, NULL),
(259, 'West Kameng', '3', NULL, NULL, NULL),
(260, 'West Siang', '3', NULL, NULL, NULL),
(261, 'Dimapur', '25', NULL, NULL, NULL),
(262, 'Kiphire', '25', NULL, NULL, NULL),
(263, 'Kohima', '25', NULL, NULL, NULL),
(264, 'Longleng', '25', NULL, NULL, NULL),
(265, 'Mokokchung', '25', NULL, NULL, NULL),
(266, 'Mon', '25', NULL, NULL, NULL),
(267, 'Peren', '25', NULL, NULL, NULL),
(268, 'Phek', '25', NULL, NULL, NULL),
(269, 'Tuensang', '25', NULL, NULL, NULL),
(270, 'Wokha', '25', NULL, NULL, NULL),
(271, 'Zunheboto', '25', NULL, NULL, NULL),
(272, 'Bishnupur', '22', NULL, NULL, NULL),
(273, 'Chandel', '22', NULL, NULL, NULL),
(274, 'Churachandpur', '22', NULL, NULL, NULL),
(275, 'Imphal East', '22', NULL, NULL, NULL),
(276, 'Imphal West', '22', NULL, NULL, NULL),
(277, 'Senapati', '22', NULL, NULL, NULL),
(278, 'Tamenglong', '22', NULL, NULL, NULL),
(279, 'Thoubal', '22', NULL, NULL, NULL),
(280, 'Ukhrul', '22', NULL, NULL, NULL),
(281, 'Aizawl', '24', NULL, NULL, NULL),
(282, 'Champhai', '24', NULL, NULL, NULL),
(283, 'Kolasib', '24', NULL, NULL, NULL),
(284, 'Lawngtlai', '24', NULL, NULL, NULL),
(285, 'Lunglei', '24', NULL, NULL, NULL),
(286, 'Mamit', '24', NULL, NULL, NULL),
(287, 'Saiha', '24', NULL, NULL, NULL),
(288, 'Serchhip', '24', NULL, NULL, NULL),
(289, 'Dhalai', '32', NULL, NULL, NULL),
(290, 'North Tripura', '32', NULL, NULL, NULL),
(291, 'South Tripura', '32', NULL, NULL, NULL),
(292, 'West Tripura', '32', NULL, NULL, NULL),
(293, 'East Garo Hills', '23', NULL, NULL, NULL),
(294, 'East Khasi Hills', '23', NULL, NULL, NULL),
(295, 'Jaintia Hills', '23', NULL, NULL, NULL),
(296, 'Ri Bhoi', '23', NULL, NULL, NULL),
(297, 'South Garo Hills', '23', NULL, NULL, NULL),
(298, 'West Garo Hills', '23', NULL, NULL, NULL),
(299, 'West Khasi Hills', '23', NULL, NULL, NULL),
(300, 'Baksa', '4', NULL, NULL, NULL),
(301, 'Barpeta', '4', NULL, NULL, NULL),
(302, 'Bongaigaon', '4', NULL, NULL, NULL),
(303, 'Cachar', '4', NULL, NULL, NULL),
(304, 'Chirang', '4', NULL, NULL, NULL),
(305, 'Darrang', '4', NULL, NULL, NULL),
(306, 'Dhemaji', '4', NULL, NULL, NULL),
(307, 'Dhubri', '4', NULL, NULL, NULL),
(308, 'Dibrugarh', '4', NULL, NULL, NULL),
(309, 'Dima Hasao (North Cachar Hills)', '4', NULL, NULL, NULL),
(310, 'Goalpara', '4', NULL, NULL, NULL),
(311, 'Golaghat', '4', NULL, NULL, NULL),
(312, 'Hailakandi', '4', NULL, NULL, NULL),
(313, 'Jorhat', '4', NULL, NULL, NULL),
(314, 'Kamrup', '4', NULL, NULL, NULL),
(315, 'Kamrup Metropolitan', '4', NULL, NULL, NULL),
(316, 'Karbi Anglong', '4', NULL, NULL, NULL),
(317, 'Karimganj', '4', NULL, NULL, NULL),
(318, 'Kokrajhar', '4', NULL, NULL, NULL),
(319, 'Lakhimpur', '4', NULL, NULL, NULL),
(320, 'Morigaon', '4', NULL, NULL, NULL),
(321, 'Nagaon', '4', NULL, NULL, NULL),
(322, 'Nalbari', '4', NULL, NULL, NULL),
(323, 'Sivasagar', '4', NULL, NULL, NULL),
(324, 'Sonitpur', '4', NULL, NULL, NULL),
(325, 'Tinsukia', '4', NULL, NULL, NULL),
(326, 'Udalguri', '4', NULL, NULL, NULL),
(327, 'Bankura', '35', NULL, NULL, NULL),
(328, 'Bardhaman', '35', NULL, NULL, NULL),
(329, 'Birbhum', '35', NULL, NULL, NULL),
(330, 'Cooch Behar', '35', NULL, NULL, NULL),
(331, 'Dakshin Dinajpur (South Dinajpur)', '35', NULL, NULL, NULL),
(332, 'Darjiling', '35', NULL, NULL, NULL),
(333, 'Hooghly', '35', NULL, NULL, NULL),
(334, 'Howrah', '35', NULL, NULL, NULL),
(335, 'Jalpaiguri', '35', NULL, NULL, NULL),
(336, 'Kolkata', '35', NULL, NULL, NULL),
(337, 'Maldah', '35', NULL, NULL, NULL),
(338, 'Murshidabad', '35', NULL, NULL, NULL),
(339, 'Nadia', '35', NULL, NULL, NULL),
(340, 'North 24 Parganas', '35', NULL, NULL, NULL),
(341, 'Paschim Medinipur (West Midnapore)', '35', NULL, NULL, NULL),
(342, 'Purba Medinipur (East Midnapore)', '35', NULL, NULL, NULL),
(343, 'Puruliya', '35', NULL, NULL, NULL),
(344, 'South 24 Parganas', '35', NULL, NULL, NULL),
(345, 'Uttar Dinajpur (North Dinajpur)', '35', NULL, NULL, NULL),
(346, 'Bokaro', '16', NULL, NULL, NULL),
(347, 'Chatra', '16', NULL, NULL, NULL),
(348, 'Deoghar', '16', NULL, NULL, NULL),
(349, 'Dhanbad', '16', NULL, NULL, NULL),
(350, 'Dumka', '16', NULL, NULL, NULL),
(351, 'East Singhbhum', '16', NULL, NULL, NULL),
(352, 'Garhwa', '16', NULL, NULL, NULL),
(353, 'Giridih', '16', NULL, NULL, NULL),
(354, 'Godda', '16', NULL, NULL, NULL),
(355, 'Gumla', '16', NULL, NULL, NULL),
(356, 'Hazaribagh', '16', NULL, NULL, NULL),
(357, 'Jamtara', '16', NULL, NULL, NULL),
(358, 'Khunti', '16', NULL, NULL, NULL),
(359, 'Koderma', '16', NULL, NULL, NULL),
(360, 'Latehar', '16', NULL, NULL, NULL),
(361, 'Lohardaga', '16', NULL, NULL, NULL),
(362, 'Pakur', '16', NULL, NULL, NULL),
(363, 'Palamu', '16', NULL, NULL, NULL),
(364, 'Ramgarh', '16', NULL, NULL, NULL),
(365, 'Ranchi', '16', NULL, NULL, NULL),
(366, 'Sahibganj', '16', NULL, NULL, NULL),
(367, 'Seraikela-Kharsawan', '16', NULL, NULL, NULL),
(368, 'Simdega', '16', NULL, NULL, NULL),
(369, 'West Singhbhum', '16', NULL, NULL, NULL),
(370, 'Angul', '26', NULL, NULL, NULL),
(371, 'Balangir', '26', NULL, NULL, NULL),
(372, 'Baleswar', '26', NULL, NULL, NULL),
(373, 'Bargarh', '26', NULL, NULL, NULL),
(374, 'Bhadrak', '26', NULL, NULL, NULL),
(375, 'Boudh', '26', NULL, NULL, NULL),
(376, 'Cuttack', '26', NULL, NULL, NULL),
(377, 'Debagarh', '26', NULL, NULL, NULL),
(378, 'Dhenkanal', '26', NULL, NULL, NULL),
(379, 'Gajapati', '26', NULL, NULL, NULL),
(380, 'Ganjam', '26', NULL, NULL, NULL),
(381, 'Jagatsinghapur', '26', NULL, NULL, NULL),
(382, 'Jajapur', '26', NULL, NULL, NULL),
(383, 'Jharsuguda', '26', NULL, NULL, NULL),
(384, 'Kalahandi', '26', NULL, NULL, NULL),
(385, 'Kandhamal', '26', NULL, NULL, NULL),
(386, 'Kendrapara', '26', NULL, NULL, NULL),
(387, 'Kendujhar', '26', NULL, NULL, NULL),
(388, 'Khordha', '26', NULL, NULL, NULL),
(389, 'Koraput', '26', NULL, NULL, NULL),
(390, 'Malkangiri', '26', NULL, NULL, NULL),
(391, 'Mayurbhanj', '26', NULL, NULL, NULL),
(392, 'Nabarangapur', '26', NULL, NULL, NULL),
(393, 'Nayagarh', '26', NULL, NULL, NULL),
(394, 'Nuapada', '26', NULL, NULL, NULL),
(395, 'Puri', '26', NULL, NULL, NULL),
(396, 'Rayagada', '26', NULL, NULL, NULL),
(397, 'Sambalpur', '26', NULL, NULL, NULL),
(398, 'Subarnapur (Sonapur)', '26', NULL, NULL, NULL),
(399, 'Sundergarh', '26', NULL, NULL, NULL),
(400, 'Bastar', '7', NULL, NULL, NULL),
(401, 'Bijapur (Chhattisgarh)', '7', NULL, NULL, NULL),
(402, 'Bilaspur (Chhattisgarh)', '7', NULL, NULL, NULL),
(403, 'Dakshin Bastar Dantewada', '7', NULL, NULL, NULL),
(404, 'Dhamtari', '7', NULL, NULL, NULL),
(405, 'Durg', '7', NULL, NULL, NULL),
(406, 'Janjgir-Champa', '7', NULL, NULL, NULL),
(407, 'Jashpur', '7', NULL, NULL, NULL),
(408, 'Kabirdham (Kawardha)', '7', NULL, NULL, NULL),
(409, 'Korba', '7', NULL, NULL, NULL),
(410, 'Koriya', '7', NULL, NULL, NULL),
(411, 'Mahasamund', '7', NULL, NULL, NULL),
(412, 'Narayanpur', '7', NULL, NULL, NULL),
(413, 'Raigarh (Chhattisgarh)', '7', NULL, NULL, NULL),
(414, 'Raipur', '7', NULL, NULL, NULL),
(415, 'Rajnandgaon', '7', NULL, NULL, NULL),
(416, 'Surguja', '7', NULL, NULL, NULL),
(417, 'Uttar Bastar Kanker', '7', NULL, NULL, NULL),
(418, 'Alirajpur', '20', NULL, NULL, NULL),
(419, 'Anuppur', '20', NULL, NULL, NULL),
(420, 'Ashok Nagar', '20', NULL, NULL, NULL),
(421, 'Balaghat', '20', NULL, NULL, NULL),
(422, 'Barwani', '20', NULL, NULL, NULL),
(423, 'Betul', '20', NULL, NULL, NULL),
(424, 'Bhind', '20', NULL, NULL, NULL),
(425, 'Bhopal', '20', NULL, NULL, NULL),
(426, 'Burhanpur', '20', NULL, NULL, NULL),
(427, 'Chhatarpur', '20', NULL, NULL, NULL),
(428, 'Chhindwara', '20', NULL, NULL, NULL),
(429, 'Damoh', '20', NULL, NULL, NULL),
(430, 'Datia', '20', NULL, NULL, NULL),
(431, 'Dewas', '20', NULL, NULL, NULL),
(432, 'Dhar', '20', NULL, NULL, NULL),
(433, 'Dindori', '20', NULL, NULL, NULL),
(434, 'Guna', '20', NULL, NULL, NULL),
(435, 'Gwalior', '20', NULL, NULL, NULL),
(436, 'Harda', '20', NULL, NULL, NULL),
(437, 'Hoshangabad', '20', NULL, NULL, NULL),
(438, 'Indore', '20', NULL, NULL, NULL),
(439, 'Jabalpur', '20', NULL, NULL, NULL),
(440, 'Jhabua', '20', NULL, NULL, NULL),
(441, 'Katni', '20', NULL, NULL, NULL),
(442, 'Khandwa (East Nimar)', '20', NULL, NULL, NULL),
(443, 'Khargone (West Nimar)', '20', NULL, NULL, NULL),
(444, 'Mandla', '20', NULL, NULL, NULL),
(445, 'Mandsaur', '20', NULL, NULL, NULL),
(446, 'Morena', '20', NULL, NULL, NULL),
(447, 'Narsinghpur', '20', NULL, NULL, NULL),
(448, 'Neemuch', '20', NULL, NULL, NULL),
(449, 'Panna', '20', NULL, NULL, NULL),
(450, 'Raisen', '20', NULL, NULL, NULL),
(451, 'Rajgarh', '20', NULL, NULL, NULL),
(452, 'Ratlam', '20', NULL, NULL, NULL),
(453, 'Rewa', '20', NULL, NULL, NULL),
(454, 'Sagar', '20', NULL, NULL, NULL),
(455, 'Satna', '20', NULL, NULL, NULL),
(456, 'Sehore', '20', NULL, NULL, NULL),
(457, 'Seoni', '20', NULL, NULL, NULL),
(458, 'Shahdol', '20', NULL, NULL, NULL),
(459, 'Shajapur', '20', NULL, NULL, NULL),
(460, 'Sheopur', '20', NULL, NULL, NULL),
(461, 'Shivpuri', '20', NULL, NULL, NULL),
(462, 'Sidhi', '20', NULL, NULL, NULL),
(463, 'Singrauli', '20', NULL, NULL, NULL),
(464, 'Tikamgarh', '20', NULL, NULL, NULL),
(465, 'Ujjain', '20', NULL, NULL, NULL),
(466, 'Umaria', '20', NULL, NULL, NULL),
(467, 'Vidisha', '20', NULL, NULL, NULL),
(468, 'Ahmedabad', '12', NULL, NULL, NULL),
(469, 'Amreli', '12', NULL, NULL, NULL),
(470, 'Anand', '12', NULL, NULL, NULL),
(471, 'Banaskantha', '12', NULL, NULL, NULL),
(472, 'Bharuch', '12', NULL, NULL, NULL),
(473, 'Bhavnagar', '12', NULL, NULL, NULL),
(474, 'Dahod', '12', NULL, NULL, NULL),
(475, 'Gandhi Nagar', '12', NULL, NULL, NULL),
(476, 'Jamnagar', '12', NULL, NULL, NULL),
(477, 'Junagadh', '12', NULL, NULL, NULL),
(478, 'Kachchh', '12', NULL, NULL, NULL),
(479, 'Kheda', '12', NULL, NULL, NULL),
(480, 'Mahesana', '12', NULL, NULL, NULL),
(481, 'Narmada', '12', NULL, NULL, NULL),
(482, 'Navsari', '12', NULL, NULL, NULL),
(483, 'Panch Mahals', '12', NULL, NULL, NULL),
(484, 'Patan', '12', NULL, NULL, NULL),
(485, 'Porbandar', '12', NULL, NULL, NULL),
(486, 'Rajkot', '12', NULL, NULL, NULL),
(487, 'Sabarkantha', '12', NULL, NULL, NULL),
(488, 'Surat', '12', NULL, NULL, NULL),
(489, 'Surendra Nagar', '12', NULL, NULL, NULL),
(490, 'Tapi', '12', NULL, NULL, NULL),
(491, 'The Dangs', '12', NULL, NULL, NULL),
(492, 'Vadodara', '12', NULL, NULL, NULL),
(493, 'Valsad', '12', NULL, NULL, NULL),
(494, 'Daman', '9', NULL, NULL, NULL),
(495, 'Diu', '9', NULL, NULL, NULL),
(496, 'Dadra & Nagar Haveli', '8', NULL, NULL, NULL),
(497, 'Ahmed Nagar', '21', NULL, NULL, NULL),
(498, 'Akola', '21', NULL, NULL, NULL),
(499, 'Amravati', '21', NULL, NULL, NULL),
(500, 'Aurangabad', '21', NULL, NULL, NULL),
(501, 'Beed', '21', NULL, NULL, NULL),
(502, 'Bhandara', '21', NULL, NULL, NULL),
(503, 'Buldhana', '21', NULL, NULL, NULL),
(504, 'Chandrapur', '21', NULL, NULL, NULL),
(505, 'Dhule', '21', NULL, NULL, NULL),
(506, 'Gadchiroli', '21', NULL, NULL, NULL),
(507, 'Gondia', '21', NULL, NULL, NULL),
(508, 'Hingoli', '21', NULL, NULL, NULL),
(509, 'Jalgaon', '21', NULL, NULL, NULL),
(510, 'Jalna', '21', NULL, NULL, NULL),
(511, 'Kolhapur', '21', NULL, NULL, NULL),
(512, 'Latur', '21', NULL, NULL, NULL),
(513, 'Mumbai', '21', NULL, NULL, NULL),
(514, 'Mumbai Suburban', '21', NULL, NULL, NULL),
(515, 'Nagpur', '21', NULL, NULL, NULL),
(516, 'Nanded', '21', NULL, NULL, NULL),
(517, 'Nandurbar', '21', NULL, NULL, NULL),
(518, 'Nashik', '21', NULL, NULL, NULL),
(519, 'Osmanabad', '21', NULL, NULL, NULL),
(520, 'Parbhani', '21', NULL, NULL, NULL),
(521, 'Pune', '21', NULL, NULL, NULL),
(522, 'Raigarh (Maharashtra)', '21', NULL, NULL, NULL),
(523, 'Ratnagiri', '21', NULL, NULL, NULL),
(524, 'Sangli', '21', NULL, NULL, NULL),
(525, 'Satara', '21', NULL, NULL, NULL),
(526, 'Sindhudurg', '21', NULL, NULL, NULL),
(527, 'Solapur', '21', NULL, NULL, NULL),
(528, 'Thane', '21', NULL, NULL, NULL),
(529, 'Wardha', '21', NULL, NULL, NULL),
(530, 'Washim', '21', NULL, NULL, NULL),
(531, 'Yavatmal', '21', NULL, NULL, NULL),
(532, 'Adilabad', '2', NULL, NULL, NULL),
(533, 'Anantapur', '2', NULL, NULL, NULL),
(534, 'Chittoor', '2', NULL, NULL, NULL),
(535, 'East Godavari', '2', NULL, NULL, NULL),
(536, 'Guntur', '2', NULL, NULL, NULL),
(537, 'Hyderabad', '2', NULL, NULL, NULL),
(538, 'Kadapa (Cuddapah)', '2', NULL, NULL, NULL),
(539, 'Karim Nagar', '2', NULL, NULL, NULL),
(540, 'Khammam', '2', NULL, NULL, NULL),
(541, 'Krishna', '2', NULL, NULL, NULL),
(542, 'Kurnool', '2', NULL, NULL, NULL),
(543, 'Mahbubnagar', '2', NULL, NULL, NULL),
(544, 'Medak', '2', NULL, NULL, NULL),
(545, 'Nalgonda', '2', NULL, NULL, NULL),
(546, 'Nellore', '2', NULL, NULL, NULL),
(547, 'Nizamabad', '2', NULL, NULL, NULL),
(548, 'Prakasam', '2', NULL, NULL, NULL),
(549, 'Rangareddy', '2', NULL, NULL, NULL),
(550, 'Srikakulam', '2', NULL, NULL, NULL),
(551, 'Visakhapatnam', '2', NULL, NULL, NULL),
(552, 'Vizianagaram', '2', NULL, NULL, NULL),
(553, 'Warangal', '2', NULL, NULL, NULL),
(554, 'West Godavari', '2', NULL, NULL, NULL),
(555, 'Bagalkot', '17', NULL, NULL, NULL),
(556, 'Bangalore', '17', NULL, NULL, NULL),
(557, 'Bangalore Rural', '17', NULL, NULL, NULL),
(558, 'Belgaum', '17', NULL, NULL, NULL),
(559, 'Bellary', '17', NULL, NULL, NULL),
(560, 'Bidar', '17', NULL, NULL, NULL),
(561, 'Bijapur (Karnataka)', '17', NULL, NULL, NULL),
(562, 'Chamrajnagar', '17', NULL, NULL, NULL),
(563, 'Chickmagalur', '17', NULL, NULL, NULL),
(564, 'Chikkaballapur', '17', NULL, NULL, NULL),
(565, 'Chitradurga', '17', NULL, NULL, NULL),
(566, 'Dakshina Kannada', '17', NULL, NULL, NULL),
(567, 'Davanagere', '17', NULL, NULL, NULL),
(568, 'Dharwad', '17', NULL, NULL, NULL),
(569, 'Gadag', '17', NULL, NULL, NULL),
(570, 'Gulbarga', '17', NULL, NULL, NULL),
(571, 'Hassan', '17', NULL, NULL, NULL),
(572, 'Haveri', '17', NULL, NULL, NULL),
(573, 'Kodagu', '17', NULL, NULL, NULL),
(574, 'Kolar', '17', NULL, NULL, NULL),
(575, 'Koppal', '17', NULL, NULL, NULL),
(576, 'Mandya', '17', NULL, NULL, NULL),
(577, 'Mysore', '17', NULL, NULL, NULL),
(578, 'Raichur', '17', NULL, NULL, NULL),
(579, 'Ramanagara', '17', NULL, NULL, NULL),
(580, 'Shimoga', '17', NULL, NULL, NULL),
(581, 'Tumkur', '17', NULL, NULL, NULL),
(582, 'Udupi', '17', NULL, NULL, NULL),
(583, 'Uttara Kannada', '17', NULL, NULL, NULL),
(584, 'Yadgir', '17', NULL, NULL, NULL),
(585, 'North Goa', '11', NULL, NULL, NULL),
(586, 'South Goa', '11', NULL, NULL, NULL),
(587, 'Lakshadweep', '19', NULL, NULL, NULL),
(588, 'Alappuzha', '18', NULL, NULL, NULL),
(589, 'Ernakulam', '18', NULL, NULL, NULL),
(590, 'Idukki', '18', NULL, NULL, NULL),
(591, 'Kannur', '18', NULL, NULL, NULL),
(592, 'Kasaragod', '18', NULL, NULL, NULL),
(593, 'Kollam', '18', NULL, NULL, NULL),
(594, 'Kottayam', '18', NULL, NULL, NULL),
(595, 'Kozhikode', '18', NULL, NULL, NULL),
(596, 'Malappuram', '18', NULL, NULL, NULL),
(597, 'Palakkad', '18', NULL, NULL, NULL),
(598, 'Pathanamthitta', '18', NULL, NULL, NULL),
(599, 'Thiruvananthapuram', '18', NULL, NULL, NULL),
(600, 'Thrissur', '18', NULL, NULL, NULL),
(601, 'Wayanad', '18', NULL, NULL, NULL),
(602, 'Ariyalur', '31', NULL, NULL, NULL),
(603, 'Chennai', '31', NULL, NULL, NULL),
(604, 'Coimbatore', '31', NULL, NULL, NULL),
(605, 'Cuddalore', '31', NULL, NULL, NULL),
(606, 'Dharmapuri', '31', NULL, NULL, NULL),
(607, 'Dindigul', '31', NULL, NULL, NULL),
(608, 'Erode', '31', NULL, NULL, NULL),
(609, 'Kanchipuram', '31', NULL, NULL, NULL),
(610, 'Kanyakumari', '31', NULL, NULL, NULL),
(611, 'Karur', '31', NULL, NULL, NULL),
(612, 'Krishnagiri', '31', NULL, NULL, NULL),
(613, 'Madurai', '31', NULL, NULL, NULL),
(614, 'Nagapattinam', '31', NULL, NULL, NULL),
(615, 'Namakkal', '31', NULL, NULL, NULL),
(616, 'Nilgiris', '31', NULL, NULL, NULL),
(617, 'Perambalur', '31', NULL, NULL, NULL),
(618, 'Pudukkottai', '31', NULL, NULL, NULL),
(619, 'Ramanathapuram', '31', NULL, NULL, NULL),
(620, 'Salem', '31', NULL, NULL, NULL),
(621, 'Sivaganga', '31', NULL, NULL, NULL),
(622, 'Thanjavur', '31', NULL, NULL, NULL),
(623, 'Theni', '31', NULL, NULL, NULL),
(624, 'Thoothukudi (Tuticorin)', '31', NULL, NULL, NULL),
(625, 'Tiruchirappalli', '31', NULL, NULL, NULL),
(626, 'Tirunelveli', '31', NULL, NULL, NULL),
(627, 'Tiruppur', '31', NULL, NULL, NULL),
(628, 'Tiruvallur', '31', NULL, NULL, NULL),
(629, 'Tiruvannamalai', '31', NULL, NULL, NULL),
(630, 'Tiruvarur', '31', NULL, NULL, NULL),
(631, 'Vellore', '31', NULL, NULL, NULL),
(632, 'Viluppuram', '31', NULL, NULL, NULL),
(633, 'Virudhunagar', '31', NULL, NULL, NULL),
(634, 'Karaikal', '27', NULL, NULL, NULL),
(635, 'Mahe', '27', NULL, NULL, NULL),
(636, 'Puducherry (Pondicherry)', '27', NULL, NULL, NULL),
(637, 'Yanam', '27', NULL, NULL, NULL),
(638, 'Nicobar', '1', NULL, NULL, NULL),
(639, 'North And Middle Andaman', '1', NULL, NULL, NULL),
(640, 'South Andaman', '1', NULL, NULL, NULL),
(641, 'yrtyrtyrt', '3', '2022-04-15 06:31:47', '2022-04-15 06:31:47', 'yrtyrtu');

-- --------------------------------------------------------

--
-- Table structure for table `mandals`
--

DROP TABLE IF EXISTS `mandals`;
CREATE TABLE IF NOT EXISTS `mandals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `district_id` int(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mandals`
--

INSERT INTO `mandals` (`id`, `name`, `created_at`, `updated_at`, `district_id`) VALUES
(2, 'vcxb', '2022-04-15 16:31:59', '2022-04-15 16:31:59', 4),
(3, 'Guntur Mondal', '2022-04-25 20:59:39', '2022-04-25 20:59:39', 536),
(4, 'Raj Mandri', '2022-04-25 21:00:39', '2022-04-25 21:00:39', 536),
(5, 'Nelure', '2022-04-25 21:01:35', '2022-04-25 21:01:35', 536),
(6, 'Chittoor', NULL, NULL, 534),
(7, 'Tirupathi', NULL, NULL, 534),
(8, 'Alamuru', NULL, NULL, 535),
(9, 'Ramachandrapuram', NULL, NULL, 535),
(10, 'Gaddiannaram', NULL, NULL, 536),
(11, 'Bowenpally', NULL, NULL, 536),
(12, 'Kadapa', NULL, NULL, 537),
(13, 'Mydukar', NULL, NULL, 537),
(14, 'Dharmapuri', NULL, NULL, 538),
(15, 'Dharmaram', NULL, NULL, 538);

-- --------------------------------------------------------

--
-- Table structure for table `mfee`
--

DROP TABLE IF EXISTS `mfee`;
CREATE TABLE IF NOT EXISTS `mfee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percent` float NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uptated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfee`
--

INSERT INTO `mfee` (`id`, `percent`, `from_date`, `to_date`, `created_on`, `uptated_on`) VALUES
(1, 2.15, '2022-05-16 00:00:00', '2022-05-24 00:00:00', '2022-05-23 07:52:18', '2022-05-23 07:52:18'),
(6, 3, '2022-05-25 00:00:00', '2022-06-25 00:00:00', '2022-05-31 11:52:36', '2022-05-31 11:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_05_04_070614_create_commodities_table', 1),
(2, '2022_05_04_070637_create_quantities_table', 2),
(3, '2022_05_04_115704_create_tradelist_models_table', 3),
(4, '2022_05_05_102331_permit', 4),
(5, '2022_05_05_104729_permit', 5);

-- --------------------------------------------------------

--
-- Table structure for table `permit`
--

DROP TABLE IF EXISTS `permit`;
CREATE TABLE IF NOT EXISTS `permit` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_id` int(11) NOT NULL,
  `dis_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `mdl_id` int(11) NOT NULL,
  `a_weight` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `q_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `veh_detail` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_from` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valid_to` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `t_id` int(11) DEFAULT NULL,
  `trader_id` int(11) NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_status` int(11) NOT NULL DEFAULT '1',
  `c_qty` int(11) NOT NULL DEFAULT '0',
  `c_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permit`
--

INSERT INTO `permit` (`id`, `name`, `invoice`, `ad1`, `ad2`, `com_id`, `dis_id`, `state_id`, `mdl_id`, `a_weight`, `value`, `q_details`, `source`, `destination`, `veh_detail`, `valid_from`, `valid_to`, `created_at`, `updated_at`, `t_id`, `trader_id`, `mobile`, `c_status`, `c_qty`, `c_reason`) VALUES
(7, 'temp', '', 'sq', 'dw', 1, 536, 2, 3, 100, 0, 'wq', 'de', 'gtr', 'q1', '2021-11-11 05:41:00', '2022-11-09 05:41:00', '2022-05-09 09:18:11', '2022-05-09 09:18:11', NULL, 4, '', 1, 0, NULL),
(6, 'kk', '', 'ad11', 'adw2', 2, 536, 2, 3, 1500, 0, 'all', 'cuttack', 'kolkata', 'or12 mf1478', '2021-11-11 05:41:00', '2022-05-07 05:41:00', '2022-05-07 05:31:03', '2022-05-07 05:31:03', NULL, 4, '', 1, 0, NULL),
(8, 'kk', '', 'aa', 'aa', 2, 536, 2, 3, 100, 0, 'aa', 'aa', 'aa', 'aa', '2021-11-11 05:41:00', '2022-11-11 05:41:00', '2022-05-09 09:47:36', '2022-05-09 09:47:36', NULL, 4, '', 1, 0, NULL),
(9, 'temp', '', '1gt road', 'howrah', 2, 536, 2, 5, 28, 0, 'safe', 'guntur', 'kolkata', 'or14g1478', '2021-11-11 05:41:00', '2022-11-05 08:45:00', '2022-05-09 13:59:04', '2022-05-09 13:59:04', NULL, 4, '', 1, 0, NULL),
(10, 'hj', '147852', 'ggdg', 'cvcv', 2, 536, 2, 3, 1000, 0, 'kkhjjkk', 'matura', 'hh', 'or12 mf1478', '2022-05-10 12:37:00', '2022-05-11 12:36:00', '2022-05-10 12:32:07', '2022-05-10 12:32:07', NULL, 4, '', 1, 0, NULL),
(11, 'KRISHNA', '', 'BHUBHANESWAR', 'Odisha', 1, 536, 2, 3, 800, 0, 'ok', 'kolkata', 'Cuttack', 'Or14Y1452', '2022-05-06 09:52:00', '2022-05-13 07:54:00', '2022-05-11 07:52:45', '2022-05-11 07:52:45', NULL, 4, '', 1, 0, NULL),
(12, 'krishna', '1452', 'tennn', 'jhghjg', 2, 536, 2, 3, 1000, 10000000, 'temp', 'hgh', 'kjjk', 'ap15h7539', '2022-05-11 09:00:00', '2022-05-20 08:04:00', '2022-05-11 08:00:56', '2022-05-11 08:00:56', NULL, 4, '1478523690', 1, 0, NULL),
(13, 'ghhg', '', 'fff', 'hhh', 1, 536, 2, 5, 5, 0, 'ted', 'bhubhaneswar', 'rachi', 'or5d6551', '2022-05-10 05:42:00', '2022-05-19 17:45:00', '2022-05-13 11:39:15', '2022-05-13 11:39:15', NULL, 4, '', 1, 0, NULL),
(17, 'fcg', 'gf43', 'dd', 'pop', 10, 537, 2, 12, 100, 5000, 'temp', 'matura', 'kashi', 'or12 mf1478', '2022-05-20 10:25:00', '2022-05-27 13:22:00', '2022-05-19 10:23:13', '2022-05-19 10:23:13', NULL, 4, '1478523690', 1, 0, NULL),
(16, 'kk', 'h4l7852', 'dd11', 'ss', 10, 534, 2, 7, 510, 150000, 'sold', 'hwh', 'kashi', 'or12 mf1478', '2022-05-19 07:55:00', '2022-05-21 07:57:00', '2022-05-19 06:55:58', '2022-05-19 06:55:58', 43, 4, '1478523690', 1, 0, NULL),
(21, 'kk', 'h4l7852', 'dd', 'ss', 8, 536, 2, 3, 1, 3100, 'kkhjjkk', 'tycg', 'hbj', 'or12 mf1478', '2022-05-23 20:12:00', '2022-05-26 20:13:00', '2022-05-24 06:13:18', '2022-05-24 06:13:18', NULL, 4, '1478523690', 1, 0, NULL),
(19, 'kk', 'h4l7852', 'dd', 'ss', 8, 535, 2, 8, 100, 30000, 'kkhjjkk', 'matura', 'varanasi', 'or12 mf1478', '2022-05-20 13:13:00', '2022-05-22 15:10:00', '2022-05-19 13:10:17', '2022-05-19 13:10:17', NULL, 4, '1478523690', 1, 0, NULL),
(22, 'kk', 'h4l7852', 'dd', 'ss', 8, 536, 2, 3, 1, 3100, 'kkhjjkk', 'tycg', 'hbj', 'or12 mf1478', '2022-05-23 20:12:00', '2022-05-26 20:13:00', '2022-05-24 06:15:46', '2022-05-24 06:15:46', NULL, 4, '1478523690', 1, 0, NULL),
(23, 'kk', 'h4l7852', 'wwww', 'ss', 8, 536, 2, 3, 100, 5000, 'temp', 'matura', 'kashi', 'or12 mf1478', '2022-05-25 05:30:00', '2022-05-25 19:33:00', '2022-05-24 06:29:10', '2022-05-24 06:29:10', NULL, 4, '1478523690', 1, 0, NULL),
(25, 'kk', 'gf43', 'dd', 'ss', 8, 534, 2, 6, 100, 30300, 'ok', '1', 'hbj', 'or12 mf1478', '2022-05-25 06:54:00', '2022-05-26 06:53:00', '2022-05-24 06:48:51', '2022-05-24 06:48:51', NULL, 4, '1478523690', 1, 0, NULL),
(26, 'kk', 'k147', 'dd', 'ss', 2, 534, 2, 6, 125, 18750, 'ok', 'tycg', 'destination', 'or12 mf1478', '2022-05-26 11:30:00', '2022-05-27 11:33:00', '2022-05-24 12:28:41', '2022-05-24 12:28:41', 70, 4, '1478523690', 0, 125, 'qqq'),
(27, 'kk', 'k1496', 'dd', 'ss', 2, 534, 2, 6, 1000, 150000, 'temp', 'matura', 'kashi', 'or12 mf1478', '2022-05-24 12:53:00', '2022-05-27 12:54:00', '2022-05-24 12:48:21', '2022-05-24 12:48:21', 73, 4, '1478523690', 0, 0, NULL),
(28, 'ff', 'ht5543', 'ad1', 'ad2', 22, 535, 2, 8, 100, 12121212, 'dd', '12', 'dd', 'ot14we1478', '2022-05-27 19:31:00', '2022-11-23 05:41:00', '2022-05-28 07:16:39', '2022-05-28 07:16:39', 74, 4, '2132132133', 2, 0, 'accident'),
(29, 'kk', 'k147', 'dd', 'ss', 2, 534, 2, 6, 10, 15001, 'sold', 'kk', 'hh', 'or12 mf1478', '2022-06-01 11:25:00', '2022-07-03 11:27:00', '2022-05-31 11:22:04', '2022-05-31 11:22:04', 73, 4, '1478523690', 2, 0, NULL),
(30, 'kk', 'h4l7852', 'dd', 'ss', 24, 535, 2, 8, 1, 15000, '11564', 'matura', 'kashi', 'or12 mf1478', '2022-05-31 00:59:00', '2022-05-31 12:03:00', '2022-05-31 12:00:01', '2022-05-31 12:00:01', 77, 4, '1478523111', 0, 1, NULL),
(31, 'kedia', 'h4l7852', 'dd', 'ss', 22, 534, 2, 6, 4, 2800, 'temp', 'matura', 'kashi', 'or12 mf1478', '2022-06-02 15:08:00', '2022-06-05 12:13:00', '2022-05-31 12:08:45', '2022-05-31 12:08:45', NULL, 4, '1478523690', 0, 1, 'damaged'),
(32, 'krishna', 'ept14785', '1,mg. road', 'kolkata', 2, 534, 2, 6, 30, 14500, '2kg*15pc', 'AP', 'West Bengal(W.B)', 'ap15h7539', '2022-05-31 22:57:00', '2022-06-18 11:00:00', '2022-06-01 10:56:13', '2022-06-01 10:56:13', 80, 4, '9822656963', 0, 4, 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `p_permit`
--

DROP TABLE IF EXISTS `p_permit`;
CREATE TABLE IF NOT EXISTS `p_permit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `b_qty` int(11) NOT NULL,
  `a_qty` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `mfee` int(11) NOT NULL,
  `trade_val` int(11) NOT NULL,
  `ad1` varchar(255) NOT NULL,
  `ad2` varchar(255) NOT NULL,
  `veh_no` varchar(10) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `from_date` varchar(55) NOT NULL,
  `to_date` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_permit`
--

INSERT INTO `p_permit` (`id`, `c_id`, `q_id`, `b_qty`, `a_qty`, `t_id`, `mfee`, `trade_val`, `ad1`, `ad2`, `veh_no`, `mobile`, `from_date`, `to_date`) VALUES
(1, 10, 1, 234, 200, 63, 215, 5000, 'wwww', 'qqqqq', 'fd32h3212', '9337237678', '2022-05-24 19:52', '2022-05-25 19:52'),
(2, 10, 1, 1000, 800, 69, 5160, 120000, 'dd', 'ss', 'fd32h3212', '9337237678', '2022-05-25 17:59', '2022-05-28 17:59'),
(3, 10, 1, 350, 300, 73, 215, 5000, 'wwww', 'ss', 'fd32h3212', '9337237678', '2022-05-29 18:24', '2022-06-05 18:24'),
(4, 8, 1, 350, 200, 73, 4300, 100000, 'dd', 'ss', 'fd32h3212', '9337237678', '2022-05-25 17:00', '2022-05-27 17:00'),
(5, 26, 4, 1, 12, 78, 1118, 26000, 'dd', 'jjjj', 'fd32h3212', '9337237678', '2022-05-31 17:52', '2022-06-04 17:52'),
(6, 26, 4, 1, 12, 78, 1118, 26000, 'dd', 'jjjj', 'fd32h3212', '9337237678', '2022-05-31 17:52', '2022-06-04 17:52'),
(7, 26, 4, 1, 12, 78, 1118, 26000, 'dd', 'jjjj', 'fd32h3212', '9337237678', '2022-05-31 17:52', '2022-06-04 17:52'),
(8, 26, 1, 5, 1, 79, 215, 5000, 'dd', 'ss', 'fd32h3212', '9337237678', '2022-06-01 18:06', '2022-06-04 18:06'),
(9, 10, 1, 40, 35, 81, 1290, 30000, 'wwww', 'pop', 'fd32h3212', '9337237678', '2022-06-01 16:44', '2022-06-08 16:44');

-- --------------------------------------------------------

--
-- Table structure for table `quantity`
--

DROP TABLE IF EXISTS `quantity`;
CREATE TABLE IF NOT EXISTS `quantity` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `qty_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quantity`
--

INSERT INTO `quantity` (`id`, `qty_name`, `qty_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kg', 'kg', 1, NULL, NULL),
(2, 'pc', '', 1, NULL, NULL),
(4, 'tn', 'tone', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `retail`
--

DROP TABLE IF EXISTS `retail`;
CREATE TABLE IF NOT EXISTS `retail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trade_id` int(11) DEFAULT NULL,
  `ad1` varchar(255) NOT NULL,
  `ad2` varchar(255) NOT NULL,
  `a_qty` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `rad1` varchar(255) NOT NULL,
  `rad2` varchar(255) NOT NULL,
  `st_id` int(11) NOT NULL,
  `dis_id` int(11) NOT NULL,
  `mdl_id` int(11) NOT NULL,
  `amc_id` int(11) NOT NULL,
  `invoice` varchar(55) NOT NULL,
  `trader_id` int(11) NOT NULL,
  `trade_value` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `com_name` varchar(55) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `veh_detail` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retail`
--

INSERT INTO `retail` (`id`, `trade_id`, `ad1`, `ad2`, `a_qty`, `name`, `rad1`, `rad2`, `st_id`, `dis_id`, `mdl_id`, `amc_id`, `invoice`, `trader_id`, `trade_value`, `created`, `com_name`, `mobile`, `veh_detail`) VALUES
(3, 55, 'aa', 'www', 10, 'KEDIA', 'dd', 'dsa', 2, 536, 3, 2, 'h4l7852', 4, 3000, '2022-05-19 12:25:08', 'poha', '1047852036', 'qw12er2525'),
(2, 51, 'wwww', 'pop', 4, 'kedia', 'dd', 'ff', 2, 536, 3, 2, 'h4l7852', 4, 600, '2022-05-19 12:25:08', 'poha', '9876543210', 'or54re1478'),
(4, 64, 'dd', 'ss', 10, 'kedia', 'dd', 'dsa', 2, 537, 12, 8, 'h4l7852', 4, 1500, '2022-05-19 14:23:42', 'Rice', '1478523690', 'or12 mf1478'),
(5, 64, 'dd', 'pop', 140, 'kedia', 'dd', 'dsa', 2, 532, 3, 2, 'h4l7852', 4, 210000, '2022-05-23 13:39:38', 'Rice', '1478523690', 'or12 mf1478'),
(6, 70, 'dd', 'pop', 100, 'kedia', 'dd', 'ff', 2, 534, 7, 4, 'h4l7852', 4, 15000, '2022-05-24 12:42:49', 'Rice', '1478523690', 'or12 mf1478');

-- --------------------------------------------------------

--
-- Table structure for table `spermit`
--

DROP TABLE IF EXISTS `spermit`;
CREATE TABLE IF NOT EXISTS `spermit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `invoice` varchar(55) DEFAULT NULL,
  `ad1` varchar(255) NOT NULL,
  `ad2` varchar(255) NOT NULL,
  `stt_id` int(11) NOT NULL,
  `dis_id` int(11) NOT NULL,
  `mdl_id` int(11) NOT NULL,
  `t_id` varchar(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `a_weight` int(11) NOT NULL,
  `veh_id` varchar(55) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `q_details` varchar(255) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `c_status` int(11) NOT NULL DEFAULT '1',
  `c_reason` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spermit`
--

INSERT INTO `spermit` (`id`, `name`, `invoice`, `ad1`, `ad2`, `stt_id`, `dis_id`, `mdl_id`, `t_id`, `c_id`, `a_weight`, `veh_id`, `mobile`, `q_details`, `from_date`, `to_date`, `c_status`, `c_reason`) VALUES
(13, 'kk', NULL, 'sdad', 'fg', 2, 534, 6, '43', 9, 10, 'ysas43', '1478523690', 'kkhjjkk', '2022-05-18 11:11', '2022-05-20 23:11', 1, ''),
(14, 'kedia', NULL, 'dd', 'pop', 2, 536, 3, '56', 10, 100, 'ysas43', '1111111111', 'temp', '2022-05-19 16:31', '2022-05-20 16:32', 1, ''),
(15, 'kedia', NULL, 'dd', 'pop', 2, 535, 8, '56', 10, 100, 'ysas', '1478523690', 'ok', '2022-05-19 16:33', '2022-05-27 16:34', 1, ''),
(16, 'dsf', NULL, 'fds', 'cvx', 2, 538, 14, '62', 8, 800, 'cvcxv34', '1478523690', 'ok', '2022-05-21 18:45', '2022-05-24 23:41', 1, ''),
(17, 'kedia', NULL, 'dd', 'ss', 2, 535, 8, '64', 2, 510, 'ysas43', '1478523690', 'kkhjjkk', '2022-05-20 21:32', '2022-05-21 19:37', 1, ''),
(29, 'dsf', NULL, 'fds', 'cvx', 2, 538, 14, '62', 8, 1, 'cvcxv34', '1478523690', 'ok', '2022-05-21 18:45', '2022-05-24 23:41', 1, ''),
(28, 'dsf', NULL, 'fds', 'cvx', 2, 538, 14, '62', 8, 700, 'cvcxv34', '1478523690', 'ok', '2022-05-21 18:45', '2022-05-24 23:41', 1, ''),
(30, 'dsf', NULL, 'fds', 'cvx', 2, 538, 14, '62', 8, 70, 'cvcxv34', '1478523690', 'ok', '2022-05-21 18:45', '2022-05-24 23:41', 1, ''),
(33, 'kedia', NULL, 'dd', 'ss', 2, 534, 6, '43', 9, 510, 'd12w1563', '1478523690', '101', '2022-05-27 17:49', '2022-05-28 17:51', 1, ''),
(34, 'kedia', NULL, 'ad1', 'ad2', 2, 535, 8, '62', 8, 681, 'ds44', '147', 'sss', '2022-05-30 11:11', '2022-06-09 11:11', 1, ''),
(35, 'kedia', NULL, 'dd', 'ss', 2, 534, 6, '73', 2, 40, 'd12w1563', '1478523690', 'temp', '2022-05-31 17:11', '2022-06-05 17:12', 1, ''),
(36, 'kedia', NULL, 'aa', 'aaww', 2, 534, 6, '73', 2, 13, 'd12w1563', '1478523690', 'temp', '2022-05-31 18:35', '2022-06-05 18:37', 1, NULL),
(37, 'kedia', 'uuuuuuuu', 'dd', 'ss', 2, 537, 12, '75', 22, 1, 'ysas', '1478523690', 'temp', '2022-06-01 19:06', '2022-06-05 19:06', 1, NULL),
(38, 'kk', 'h4l7852', 'dd', 'ss', 2, 538, 15, '80', 2, 14, 'd12w1563', '9821111111', '2kg *7 pkt', '2022-06-01 16:39', '2022-06-23 16:40', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `state_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_title`, `state_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Andaman & Nicobar Islands', '', 'Active', NULL, NULL),
(2, 'Andhra Pradesh', '', 'Active', NULL, NULL),
(3, 'Arunachal Pradesh', '', 'Active', NULL, NULL),
(4, 'Assam', '', 'Active', NULL, NULL),
(5, 'Bihar', '', 'Active', NULL, NULL),
(6, 'Chandigarh', '', 'Active', NULL, NULL),
(7, 'Chhattisgarh', '', 'Active', NULL, NULL),
(8, 'Dadra & Nagar Haveli', '', 'Active', NULL, NULL),
(9, 'Daman & Diu', '', 'Active', NULL, NULL),
(10, 'Delhi', '', 'Active', NULL, NULL),
(11, 'Goa', '', 'Active', NULL, NULL),
(12, 'Gujarat', '', 'Active', NULL, NULL),
(13, 'Haryana', '', 'Active', NULL, NULL),
(14, 'Himachal Pradesh', '', 'Active', NULL, NULL),
(15, 'Jammu & Kashmir', '', 'Active', NULL, NULL),
(16, 'Jharkhand', '', 'Active', NULL, NULL),
(17, 'Karnataka', '', 'Active', NULL, NULL),
(18, 'Kerala', '', 'Active', NULL, NULL),
(19, 'Lakshadweep', '', 'Active', NULL, NULL),
(20, 'Madhya Pradesh', '', 'Active', NULL, NULL),
(21, 'Maharashtra', '', 'Active', NULL, NULL),
(22, 'Manipur', '', 'Active', NULL, NULL),
(23, 'Meghalaya', '', 'Active', NULL, NULL),
(24, 'Mizoram', '', 'Active', NULL, NULL),
(25, 'Nagaland', '', 'Active', NULL, NULL),
(26, 'Odisha', '', 'Active', NULL, NULL),
(27, 'Puducherry', '', 'Active', NULL, NULL),
(28, 'Punjab', '', 'Active', NULL, NULL),
(29, 'Rajasthan', '', 'Active', NULL, NULL),
(30, 'Sikkim', '', 'Active', NULL, NULL),
(31, 'Tamil Nadu', '', 'Active', NULL, NULL),
(32, 'Tripura', '', 'Active', NULL, NULL),
(33, 'Uttar Pradesh', '', 'Active', NULL, NULL),
(34, 'Uttarakhand', '', 'Active', NULL, NULL),
(35, 'West Bengal', '', 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

DROP TABLE IF EXISTS `trade`;
CREATE TABLE IF NOT EXISTS `trade` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `mandal_id` int(11) NOT NULL,
  `commodity_id` int(11) DEFAULT NULL,
  `quantity_id` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `a_weight` int(11) DEFAULT NULL,
  `ad1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_value` int(11) DEFAULT NULL,
  `m_fee` int(11) DEFAULT NULL,
  `p_status` tinyint(4) NOT NULL DEFAULT '0',
  `amc_id` int(11) NOT NULL,
  `trade_type` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permit_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `trader_id` int(11) NOT NULL,
  `tc_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trade`
--

INSERT INTO `trade` (`id`, `seller_name`, `state_id`, `district_id`, `mandal_id`, `commodity_id`, `quantity_id`, `weight`, `a_weight`, `ad1`, `ad2`, `trade_value`, `m_fee`, `p_status`, `amc_id`, `trade_type`, `permit_id`, `created_at`, `updated_at`, `trader_id`, `tc_id`) VALUES
(68, 'kk', 2, 536, 3, 8, 1, 100, 0, NULL, NULL, 30000, 645, 3, 2, 'Sales', 25, '2022-05-24 05:34:22', '2022-05-24 05:34:22', 4, '1'),
(78, 'kk', 2, 534, 6, 24, 1, 1, 1, NULL, NULL, 70000, 1400, 3, 3, 'Stock', NULL, '2022-05-31 12:13:00', '2022-05-31 12:13:00', 4, '2'),
(75, 'kedia', 2, 536, 3, 22, 1, 35, 13, 'dd', 'ss', 24500, 490, 3, 2, 'Sales', 31, '2022-05-26 12:14:13', '2022-05-26 12:14:13', 4, '3'),
(62, 'kk', 2, 536, 3, 8, 1, 1000, 0, NULL, NULL, 300000, 6000, 3, 2, 'Sales', 19, '2022-05-19 13:09:02', '2022-05-19 13:09:02', 4, '4'),
(63, 'kk', 2, 536, 3, 10, 1, 234, 234, 'dd', 'ss', 300000, 6000, 1, 2, 'Stock', NULL, '2022-05-19 13:55:25', '2022-05-19 13:55:25', 4, '5'),
(74, 'ff', 2, 536, 4, 22, 1, 100, 0, NULL, NULL, 70000, 1505, 3, 2, 'Sales', 28, '2022-05-26 11:31:06', '2022-05-26 11:31:06', 4, '6'),
(73, 'kk', 2, 536, 3, 2, 1, 1350, 1287, NULL, NULL, 202500, 4050, 5, 2, 'Sales', 29, '2022-05-24 12:47:31', '2022-05-24 12:47:31', 4, '7'),
(56, 'fcg', 2, 534, 6, 10, 1, 480, 180, 'wwww', 'qqqqq', 300000, 1290, 1, 3, 'Sales', 17, '2022-05-19 10:15:18', '2022-05-19 10:15:18', 4, '8'),
(70, 'kk', 2, 537, 12, 2, 1, 1000, 0, 'kkk', 'jj', 50000, 1000, 3, 8, 'Sales', 26, '2022-05-24 12:27:14', '2022-05-24 12:27:14', 4, '9'),
(54, 'fcg', 2, 534, 6, 2, 1, 1352, 1352, NULL, NULL, 202800, 4056, 1, 3, 'Stock', NULL, '2022-05-19 10:10:43', '2022-05-19 10:10:43', 4, '10'),
(51, 'KEDIA', 2, 536, 3, 2, 1, 4, 0, 'wwww', 'qqqqq', 600, 12, 1, 2, 'Stock', NULL, '2022-05-18 12:48:59', '2022-05-18 12:48:59', 4, '11'),
(52, 'kk', 2, 534, 7, 10, 1, 10, 10, 'dd', 'ss', 500, 10, 1, 4, 'Sales', NULL, '2022-05-19 05:55:19', '2022-05-19 05:55:19', 4, '12'),
(53, 'kk', 2, 535, 8, 2, 1, 1500, 1500, NULL, NULL, 225000, 4500, 1, 5, 'Stock', NULL, '2022-05-19 09:30:31', '2022-05-19 09:30:31', 4, '13'),
(49, 'kk', 2, 534, 7, 2, 1, 10, 10, NULL, NULL, 1500, 30, 1, 4, 'Stock', NULL, '2022-05-18 10:38:40', '2022-05-18 10:38:40', 4, '14'),
(44, 'kk', 2, 534, 7, 2, 1, 40, 40, NULL, NULL, 6000, 120, 1, 4, 'Stock', NULL, '2022-05-18 10:26:31', '2022-05-18 10:26:31', 4, '15'),
(43, 'kk', 2, 536, 3, 9, 2, 1350, 0, NULL, NULL, 1350000, 27000, 3, 2, 'Sale', 16, '2022-05-18 10:24:08', '2022-05-18 10:24:08', 4, '16'),
(42, 'kk', 2, 534, 7, 2, 1, 1400, 1400, NULL, NULL, 210000, 4200, 1, 4, 'Stock', NULL, '2022-05-18 10:21:41', '2022-05-18 10:21:41', 4, '17'),
(79, 'kedia', 2, 536, 3, 22, 1, 5, 5, NULL, NULL, 3500, 70, 3, 2, 'Sales', NULL, '2022-05-31 12:30:49', '2022-05-31 12:30:49', 4, '18'),
(80, 'krishna', 2, 537, 12, 2, 1, 60, 20, NULL, NULL, 3000, 68, 3, 9, 'Sales', 32, '2022-06-01 10:51:30', '2022-06-01 10:51:30', 4, '19'),
(81, 'krishna', 2, 537, 12, 2, 1, 40, 40, NULL, NULL, 2000, 40, 3, 9, 'Stock', NULL, '2022-06-01 11:08:20', '2022-06-01 11:08:20', 4, '20'),
(82, 'kk', 2, 534, 6, 2, 1, 1350, 1350, NULL, NULL, 202500, 4354, 1, 3, 'Sales', NULL, '2022-06-06 07:18:46', '2022-06-06 07:18:46', 4, '21'),
(109, 'kk', 2, 535, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, NULL, NULL, '2022-06-13 11:57:14', '2022-06-13 11:57:14', 4, '95,96,97'),
(107, 'kk', 2, 535, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, NULL, NULL, '2022-06-13 09:35:45', '2022-06-13 09:35:45', 4, '91'),
(106, 'kk', 2, 535, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, NULL, NULL, '2022-06-13 09:35:34', '2022-06-13 09:35:34', 4, '86,87,88,89,90'),
(108, 'kk', 2, 535, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, NULL, NULL, '2022-06-13 11:56:20', '2022-06-13 11:56:20', 4, '92,93,94');

-- --------------------------------------------------------

--
-- Table structure for table `trader`
--

DROP TABLE IF EXISTS `trader`;
CREATE TABLE IF NOT EXISTS `trader` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(155) NOT NULL,
  `number` varchar(15) NOT NULL,
  `lic_no` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trader`
--

INSERT INTO `trader` (`id`, `name`, `number`, `lic_no`) VALUES
(1, 'asas gfgdf', '1236547890', '123654789654123'),
(2, 'ash godfin', '9876547890', '9874563214569878');

-- --------------------------------------------------------

--
-- Table structure for table `trader_apply`
--

DROP TABLE IF EXISTS `trader_apply`;
CREATE TABLE IF NOT EXISTS `trader_apply` (
  `id` int(155) NOT NULL AUTO_INCREMENT,
  `typeoffirm` varchar(255) DEFAULT NULL,
  `tname` varchar(255) DEFAULT NULL,
  `fathersname` varchar(255) DEFAULT NULL,
  `gender` varchar(55) DEFAULT NULL,
  `address` text,
  `dob` varchar(155) DEFAULT NULL,
  `pincode` varchar(55) DEFAULT NULL,
  `state_id` varchar(55) DEFAULT NULL,
  `district_id` varchar(55) DEFAULT NULL,
  `mandal_id` varchar(55) DEFAULT NULL,
  `aadhar_no` varchar(20) DEFAULT NULL,
  `aadhar_file` varchar(255) DEFAULT NULL,
  `pan_no` varchar(20) DEFAULT NULL,
  `pan_file` varchar(255) DEFAULT NULL,
  `mobile` varchar(55) DEFAULT NULL,
  `alternate_mobile` varchar(55) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firmname` varchar(255) DEFAULT NULL,
  `firmaddress` text,
  `firmpincode` varchar(255) DEFAULT NULL,
  `firm_state_id` varchar(255) DEFAULT NULL,
  `firmdistrict_id` varchar(255) DEFAULT NULL,
  `amc_id` varchar(255) DEFAULT NULL,
  `firmregisteration_no` varchar(255) DEFAULT NULL,
  `gstin` varchar(255) DEFAULT NULL,
  `firmpanno` varchar(255) DEFAULT NULL,
  `firmpan_file` varchar(255) DEFAULT NULL,
  `gstin_file` varchar(255) DEFAULT NULL,
  `declarationofsolvency` varchar(255) DEFAULT NULL,
  `uploadedbankguaranteetype` varchar(255) DEFAULT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `account_holder` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `c_account_no` varchar(255) DEFAULT NULL,
  `ifsc` varchar(255) DEFAULT NULL,
  `c_ifsc` varchar(255) DEFAULT NULL,
  `account_file` text,
  `user_temp_id` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `is_reg_pay` int(2) DEFAULT '0',
  `reg_pay_desc` text,
  `is_final_pay` int(2) NOT NULL DEFAULT '0',
  `final_pay_desc` varchar(255) DEFAULT NULL,
  `is_submit` int(2) DEFAULT '0',
  `is_amc_approval` int(2) DEFAULT '0',
  `is_ad_approval` int(2) DEFAULT '0',
  `is_commisioner_approval` int(2) DEFAULT '0',
  `user_id` int(55) DEFAULT NULL,
  `application_id` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_sign_upload` int(1) DEFAULT '0',
  `signature_file` varchar(255) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `is_commissioner_comply` int(2) DEFAULT '0',
  `is_amc_comply` int(1) DEFAULT '0',
  `is_ad_comply` int(1) DEFAULT '0',
  `status` int(2) DEFAULT '0',
  `expiry_date` date DEFAULT NULL,
  `lic_no` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trader_apply`
--

INSERT INTO `trader_apply` (`id`, `typeoffirm`, `tname`, `fathersname`, `gender`, `address`, `dob`, `pincode`, `state_id`, `district_id`, `mandal_id`, `aadhar_no`, `aadhar_file`, `pan_no`, `pan_file`, `mobile`, `alternate_mobile`, `email`, `firmname`, `firmaddress`, `firmpincode`, `firm_state_id`, `firmdistrict_id`, `amc_id`, `firmregisteration_no`, `gstin`, `firmpanno`, `firmpan_file`, `gstin_file`, `declarationofsolvency`, `uploadedbankguaranteetype`, `bankname`, `account_holder`, `account_no`, `c_account_no`, `ifsc`, `c_ifsc`, `account_file`, `user_temp_id`, `created_at`, `is_reg_pay`, `reg_pay_desc`, `is_final_pay`, `final_pay_desc`, `is_submit`, `is_amc_approval`, `is_ad_approval`, `is_commisioner_approval`, `user_id`, `application_id`, `updated_at`, `is_sign_upload`, `signature_file`, `age`, `is_commissioner_comply`, `is_amc_comply`, `is_ad_comply`, `status`, `expiry_date`, `lic_no`) VALUES
(4, 'Limited Liability', 'Rosalyn Dickson', 'Angela Duffy', 'M', 'Reprehenderit maior', '1970-01-01', '989898', '26', '375', '2', '989898989899', '478981729320220501010723pan (3).png', 'ASESH8989S', '805246980220220501010723pan (5).png', '2343423442', '2432425252', 'dumepop@mailinator.com', 'Alisa Humphrey', 'Consectetur laboris', '332323', '28', '47', '2', 'Accusantium iure rec', 'Ea dolores null', 'Iusto anim', '9733976920220501010723pan (5).png', '295860274120220501010723pan (7).png', '110607399420220501010723pan (3).png', '738419366420220501010723pan (6).png', 'pnb', 'Exercitati', '9394339489', '0902909302', 'sbin0001126', 'Est eum des', '342800950120220501010723pan (6).png', 'A3i91KV7UHHeOyGYK3ZF1Z5UtEZaJYnysLafECH50tQzi6Q2Bf32vhLBzPu0fnITHiW2pfEfGniDvGJvmyWTKl4XypxyXOnMOxuTUUvQdX75kPfot2WR2MQuxS0HNz1WB4Fg8FzH6nySgELFrB6TuBELJIJGp1HKZNcqbVVWOytldv7NPwfoE5uB3eOQEPZbZcTpcjcQRaSbNeCufR4', NULL, 1, NULL, 0, NULL, 1, 0, 0, 0, 18, 'fJvVuxUqY4xVsw72XnmkFB4I0cRhgqc60eHamwqhIpE1aq9n6bucCMA6RL4rx96BBpklb1n5h54oEbo1P1xNXRYFz5mmYXdSmlSu7BxrdHtfaV50BLmGCMlGnEoIVOGjDXFfTL07zkQKpYq8FbPXATnepHvBJRQLQoanZVvbpvy4UQuSjXUk0AuwXXJjPsE1O1JlwYeLWtjjOfIjpLY', NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, '20220315000266'),
(5, 'Sole Proprietorship', 'Vivek Singh', 'vivek singh', 'M', 'uk', '1970-01-01', '778797', '13', '82', '2', '979797897887', '85169071120220501195515pan (8).png', 'asdfg8787h', '265605806520220501195515pan (8).png', '8787879090', '8989898989', 'vivek@gmail.com', 'Vivek singh', 'uk', '433744', '14', '29', '2', '78789789vnv', '4344r3rr4554545', 'fgfgr4545g', '346411874320220501195515pan (8).png', '730177050520220501195515pan (8).png', '270588462920220501195515pan (4).png', '945303998920220501195515pan (6).png', 'sbi', 'vivek sing', '8989898989', '8989898989', 'sbin0001123', 'sbin000126', '21211440020220501195515pan (8).png', 'iSZ6KxMPU1h3ZvwklMTUUY7PNPgA2K9diUDGYuKGoWZliejGiojghmU8rrsSZuU7KUFPlfoqBwtY5DK8QbpmQhgAhWGo0Xf5asWyigrr1l8Bee25zvN6eMoHFSeSEFRJh9bCi2noYixBTpMceVskoNCavJkUMmTqKfc4jiz3l1BAeEMt8GJXAnuPBndNeCMm9fAKaHJmOs2WQlmG0U3', NULL, 1, NULL, 1, NULL, 1, 1, 1, 1, 20, 'GKIx9k8MEwlk6ccHZil3tI3CvQMhmEzjn2y6LeiDUo1JEEeHmx3GyitaWIv4lC6GzqQ8W2Vmao2Btm96HwvX1Axkmz32bK9D826aLtyt9Xr707mGIZdxqJ22GRghEntiPPMlrH11bPeAcdpajANqytqecIQ1HoAsVLQuR97kXePp7Fv2l4AJkFuDAhEPxwJW2qCigl8Z85Da815MPoL', '2022-05-01 20:43:28', 1, '468241420420220501204328pan (8).png', 24, 0, 0, 0, 9, '2024-05-01', '20220314814266');

-- --------------------------------------------------------

--
-- Table structure for table `trade_com`
--

DROP TABLE IF EXISTS `trade_com`;
CREATE TABLE IF NOT EXISTS `trade_com` (
  `tc_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` int(11) DEFAULT NULL,
  `com_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `a_weight` int(11) NOT NULL,
  `trade_value` int(11) NOT NULL,
  `m_fee` int(11) NOT NULL,
  `trade_type` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`tc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trade_com`
--

INSERT INTO `trade_com` (`tc_id`, `t_id`, `com_id`, `q_id`, `weight`, `a_weight`, `trade_value`, `m_fee`, `trade_type`) VALUES
(1, 68, 8, 1, 100, 0, 30000, 645, 'Sales'),
(2, 78, 24, 1, 1, 1, 70000, 1400, 'Stock'),
(3, 75, 22, 1, 35, 13, 24500, 490, 'Sales'),
(4, 62, 8, 1, 1000, 0, 300000, 6000, 'Sales'),
(5, 63, 10, 1, 234, 234, 300000, 6000, 'Stock'),
(6, 74, 22, 1, 100, 0, 70000, 1505, 'Sales'),
(7, 73, 2, 1, 1350, 1287, 202500, 4050, 'Sales'),
(8, 56, 10, 1, 480, 180, 300000, 1290, 'Sales'),
(9, 70, 2, 1, 1000, 0, 50000, 1000, 'Sales'),
(10, 54, 2, 1, 1352, 1352, 202800, 4056, 'Stock'),
(11, 51, 2, 1, 4, 0, 600, 12, 'Stock'),
(12, 52, 10, 1, 10, 10, 500, 10, 'Sales'),
(13, 53, 2, 1, 1500, 1500, 225000, 4500, 'Stock'),
(14, 49, 2, 1, 10, 10, 1500, 30, 'Stock'),
(15, 44, 2, 1, 40, 40, 6000, 120, 'Stock'),
(16, 43, 9, 2, 1350, 0, 1350000, 27000, 'Sale'),
(17, 42, 2, 1, 1400, 1400, 210000, 4200, 'Stock'),
(18, 79, 22, 1, 5, 5, 3500, 70, 'Sales'),
(19, 80, 2, 1, 60, 20, 3000, 68, 'Sales'),
(20, 81, 2, 1, 40, 40, 2000, 40, 'Stock'),
(21, 82, 2, 1, 1350, 1350, 202500, 4354, 'Sales'),
(88, 106, 10, 1, 100, 100, 5000, 150, 'Stock'),
(89, 106, 25, 1, 100, 100, 10000, 300, 'Stock'),
(90, 106, 25, 4, 100, 100, 1700000, 51000, 'Stock'),
(93, 108, 8, 1, 70, 70, 21000, 630, 'Stock'),
(94, 108, 10, 1, 30, 30, 1500, 45, 'Stock'),
(95, 109, 2, 1, 50, 50, 7500, 225, 'Stock'),
(96, 109, 8, 1, 30, 30, 9000, 270, 'Sales'),
(92, 108, 2, 1, 50, 50, 7500, 225, 'Stock'),
(91, 107, 2, 1, 99, 99, 14850, 446, 'Stock'),
(86, 106, 2, 1, 1, 1, 150, 5, 'Stock'),
(87, 106, 8, 1, 100, 100, 30000, 900, 'Stock'),
(97, 109, 10, 1, 70, 70, 3500, 105, 'Stock');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(11) DEFAULT NULL COMMENT '1 >active 2 deactive	',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `email`, `phone`, `employee_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(2, 'a@gmail.com', '0', 'admin@gmail.com', '', NULL, NULL, '$2y$10$QyYaSukD/h5lU3jN/EPGFeGxS423doQVxsq9WAJXU3lckG.NIV1Se', NULL, '2022-04-15 16:12:41', '2022-04-15 16:12:41', 0),
(4, 'AMC', '3', 'amc@gmail.com', NULL, NULL, NULL, '$2y$10$wlWQhD.C.n.MNMIFo3U5w.mMfnX/Bfr1UQ/Xt.99bBMZtQ.LYHpNe', NULL, '2022-04-18 23:15:56', '2022-04-18 23:15:56', 1),
(5, 'AD', '4', 'ad@gmail.com', NULL, NULL, NULL, '$2y$10$bkUt62SaUfBU6wZZaShf6u4mPgFmpC2z1n99pl9GuQf0fitUh3.F2', NULL, '2022-04-18 23:16:31', '2022-04-18 23:16:31', 1),
(6, 'commissioner', '5', 'com@gmail.com', NULL, NULL, NULL, '$2y$10$Qe0TaJhes9nPDMTSrttRHe6gxE8MLtRDIq1KTWXPwTtPBwx.uuCmu', NULL, '2022-04-18 23:17:46', '2022-04-18 23:17:46', 1),
(16, 'Deepak Monarana', '1', 'dip@gmail.com', '7001356898', NULL, NULL, '$2y$10$ERuNZ.NZcLwrR2pfAjcnD.1RkaFDmJKzI/5hmpXAvB2mVDeQO6Z0i', NULL, '2022-04-28 22:29:58', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
