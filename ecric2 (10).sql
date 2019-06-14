-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2019 at 12:24 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecric2`
--

-- --------------------------------------------------------

--
-- Table structure for table `balls`
--

CREATE TABLE `balls` (
  `id` int(10) UNSIGNED NOT NULL,
  `match_id` int(11) NOT NULL,
  `innings_no` int(11) NOT NULL,
  `batsmen_id` int(11) NOT NULL,
  `bowler_id` int(11) NOT NULL,
  `runs` int(11) NOT NULL,
  `legal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ball_overs`
--

CREATE TABLE `ball_overs` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `inning_no` int(11) NOT NULL,
  `over_id` int(11) NOT NULL,
  `ball_id` int(11) NOT NULL,
  `run` int(11) NOT NULL,
  `legal` int(11) NOT NULL,
  `batsmen_id` int(11) NOT NULL,
  `bowler_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `batsmen_scores`
--

CREATE TABLE `batsmen_scores` (
  `id` int(11) NOT NULL,
  `refer_id` int(11) DEFAULT NULL,
  `match_id` int(11) NOT NULL,
  `inning_no` int(11) NOT NULL,
  `batsmen_id` int(11) NOT NULL,
  `out_how` varchar(11) DEFAULT NULL,
  `out_by` int(11) DEFAULT NULL,
  `runs` int(11) DEFAULT NULL,
  `balls` int(11) DEFAULT NULL,
  `dots` int(11) DEFAULT NULL,
  `ones` int(11) DEFAULT NULL,
  `twos` int(11) DEFAULT NULL,
  `threes` int(11) DEFAULT NULL,
  `fours` int(11) DEFAULT NULL,
  `sixes` int(11) DEFAULT NULL,
  `checknotout` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batsmen_scores`
--

INSERT INTO `batsmen_scores` (`id`, `refer_id`, `match_id`, `inning_no`, `batsmen_id`, `out_how`, `out_by`, `runs`, `balls`, `dots`, `ones`, `twos`, `threes`, `fours`, `sixes`, `checknotout`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, 1, 1, 1, 'b', 17, 23, 20, 8, 6, 3, 1, 2, 0, 0, '2019-05-24 14:03:21', '2019-05-24 19:06:28', 0),
(2, 1, 1, 1, 3, 'ct', 16, 4, 2, 1, 0, 0, 0, 1, 0, 0, '2019-05-24 14:03:21', '2019-05-24 19:10:05', 0),
(3, 1, 1, 1, 4, 'ct', 18, 20, 9, 1, 3, 2, 1, 1, 1, 0, '2019-05-24 14:03:21', '2019-05-24 19:07:22', 0),
(4, 1, 1, 1, 5, 'ct', 17, 18, 20, 7, 10, 2, 0, 1, 0, 0, '2019-05-24 14:03:22', '2019-05-24 19:07:37', 0),
(5, 1, 1, 1, 6, 'b', 17, 63, 34, 10, 7, 7, 2, 6, 2, 0, '2019-05-24 14:03:22', '2019-05-24 19:08:12', 0),
(6, 1, 1, 1, 7, 'ro', 22, 7, 4, 1, 1, 1, 0, 1, 0, 0, '2019-05-24 14:03:22', '2019-05-24 19:09:57', 0),
(7, 1, 1, 1, 8, 'ct', 22, 16, 12, 7, 1, 1, 1, 1, 1, 0, '2019-05-24 14:03:22', '2019-05-24 19:08:40', 0),
(8, 1, 1, 1, 9, 'nt', NULL, 14, 7, 1, 2, 2, 0, 2, 0, 1, '2019-05-24 14:03:22', '2019-05-24 19:08:52', 0),
(9, 1, 1, 1, 11, 'nt', NULL, 14, 6, 0, 2, 2, 0, 2, 0, 1, '2019-05-24 14:03:22', '2019-05-24 19:09:37', 0),
(10, 1, 1, 1, 12, 'b', 21, 7, 4, 2, 1, 0, 0, 0, 1, 0, '2019-05-24 14:03:22', '2019-05-24 19:09:20', 0),
(11, 1, 1, 1, 14, 'b', 20, 0, 2, 2, 0, 0, 0, 0, 0, 0, '2019-05-24 14:03:22', '2019-05-24 19:09:15', 0),
(12, 1, 1, 2, 15, 'b', 9, 0, 1, 1, 0, 0, 0, 0, 0, 0, '2019-05-24 14:17:16', '2019-05-24 19:20:41', 0),
(13, 1, 1, 2, 16, 'b', 9, 0, 1, 1, 0, 0, 0, 0, 0, 0, '2019-05-24 14:17:16', '2019-05-24 19:20:40', 0),
(14, 1, 1, 2, 17, 'b', 11, 50, 23, 8, 4, 2, 2, 3, 4, 0, '2019-05-24 14:17:17', '2019-05-24 19:21:32', 0),
(15, 1, 1, 2, 18, 'b', 7, 50, 26, 9, 4, 4, 2, 5, 2, 0, '2019-05-24 14:17:17', '2019-05-24 19:21:22', 0),
(16, 1, 1, 2, 19, 'b', 9, 0, 1, 1, 0, 0, 0, 0, 0, 0, '2019-05-24 14:17:17', '2019-05-24 19:20:49', 0),
(17, 1, 1, 2, 20, 'b', 8, 11, 11, 7, 1, 2, 0, 0, 1, 0, '2019-05-24 14:17:17', '2019-05-24 19:22:00', 0),
(18, 1, 1, 2, 21, 'b', 8, 0, 1, 1, 0, 0, 0, 0, 0, 0, '2019-05-24 14:17:17', '2019-05-24 19:22:08', 0),
(19, 1, 1, 2, 22, 'nt', NULL, 0, 7, 7, 0, 0, 0, 0, 0, 1, '2019-05-24 14:17:17', '2019-05-24 19:22:15', 0),
(20, 1, 1, 2, 23, 'b', 9, 9, 4, 1, 1, 1, 0, 0, 1, 0, '2019-05-24 14:17:17', '2019-05-24 19:23:55', 0),
(21, 1, 1, 2, 25, 'b', 3, 14, 23, 11, 11, 0, 1, 0, 0, 0, '2019-05-24 14:17:17', '2019-05-24 19:23:23', 0),
(22, 1, 1, 2, 28, 'b', 3, 5, 10, 7, 1, 2, 0, 0, 0, 0, '2019-05-24 14:17:17', '2019-05-24 19:22:43', 0),
(23, 1, 2, 1, 29, 'b', 9, 20, 23, 10, 8, 4, 0, 1, 0, 0, '2019-05-28 13:22:06', '2019-05-28 18:30:30', 0),
(24, 1, 2, 1, 30, 'b', 9, 0, 1, 1, 0, 0, 0, 0, 0, 0, '2019-05-28 13:22:06', '2019-05-28 18:26:10', 0),
(25, 1, 2, 1, 31, 'b', 9, 0, 1, 1, 0, 0, 0, 0, 0, 0, '2019-05-28 13:22:06', '2019-05-28 18:26:09', 0),
(26, 1, 2, 1, 32, 'b', 9, 0, 1, 1, 0, 0, 0, 0, 0, 0, '2019-05-28 13:22:06', '2019-05-28 18:26:08', 0),
(27, 1, 2, 1, 33, 'lbw', 3, 62, 30, 7, 9, 4, 1, 6, 3, 0, '2019-05-28 13:22:06', '2019-05-28 18:30:05', 0),
(28, 1, 2, 1, 34, 'b', 3, 33, 26, 7, 12, 3, 1, 3, 0, 0, '2019-05-28 13:22:06', '2019-05-28 18:27:28', 0),
(29, 1, 2, 1, 35, 'nt', NULL, 13, 13, 5, 7, 0, 0, 0, 1, 1, '2019-05-28 13:22:06', '2019-05-28 18:28:48', 0),
(30, 1, 2, 1, 37, 'nt', NULL, 24, 22, 6, 8, 8, 0, 0, 0, 1, '2019-05-28 13:22:06', '2019-05-28 18:30:15', 0),
(31, 1, 2, 1, 39, 'b', 7, 0, 1, 1, 0, 0, 0, 0, 0, 0, '2019-05-28 13:22:06', '2019-05-28 18:29:53', 0),
(32, 1, 2, 1, 40, 'lbw', 7, 0, 1, 1, 0, 0, 0, 0, 0, 0, '2019-05-28 13:22:06', '2019-05-28 18:29:52', 0),
(33, 1, 2, 1, 42, 'ct', 11, 0, 1, 1, 0, 0, 0, 0, 0, 0, '2019-05-28 13:22:06', '2019-05-28 18:29:52', 0),
(34, 1, 2, 2, 1, 'nt', NULL, 63, 40, 17, 8, 5, 1, 6, 3, 1, '2019-05-28 13:34:59', '2019-05-28 18:36:16', 0),
(35, 1, 2, 2, 2, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-05-28 13:34:59', '2019-05-28 18:36:54', 0),
(36, 1, 2, 2, 3, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-05-28 13:34:59', '2019-05-28 18:36:53', 0),
(37, 1, 2, 2, 4, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-05-28 13:34:59', '2019-05-28 18:36:53', 0),
(38, 1, 2, 2, 5, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-05-28 13:34:59', '2019-05-28 18:36:52', 0),
(39, 1, 2, 2, 6, 'nt', NULL, 95, 60, 25, 12, 6, 3, 11, 3, 1, '2019-05-28 13:34:59', '2019-05-28 18:37:20', 0),
(40, 1, 2, 2, 7, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-05-28 13:34:59', '2019-05-28 18:36:49', 0),
(41, 1, 2, 2, 8, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-05-28 13:34:59', '2019-05-28 18:36:46', 0),
(42, 1, 2, 2, 9, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-05-28 13:34:59', '2019-05-28 18:36:46', 0),
(43, 1, 2, 2, 11, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-05-28 13:34:59', '2019-05-28 18:36:45', 0),
(44, 1, 2, 2, 12, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-05-28 13:34:59', '2019-05-28 18:36:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `batting_styles`
--

CREATE TABLE `batting_styles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batting_styles`
--

INSERT INTO `batting_styles` (`id`, `name`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 'Right-hand bat', NULL, NULL, 0),
(2, 'Left-hand bat', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bowler_scores`
--

CREATE TABLE `bowler_scores` (
  `id` int(11) NOT NULL,
  `refer_id` int(11) DEFAULT NULL,
  `match_id` int(11) NOT NULL,
  `inning_no` int(11) NOT NULL,
  `bowler_id` int(11) NOT NULL,
  `overs` float(100,1) DEFAULT NULL,
  `balls` int(11) DEFAULT NULL,
  `maidens` int(11) DEFAULT NULL,
  `runs` int(11) DEFAULT NULL,
  `wickets` int(11) DEFAULT NULL,
  `economy` float(100,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bowler_scores`
--

INSERT INTO `bowler_scores` (`id`, `refer_id`, `match_id`, `inning_no`, `bowler_id`, `overs`, `balls`, `maidens`, `runs`, `wickets`, `economy`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, 1, 2, 16, 4.0, 24, 0, 35, 1, 8.75, '2019-05-24 14:03:22', '2019-05-24 14:10:35', 0),
(2, 1, 1, 2, 17, 4.0, 24, 0, 45, 3, 11.25, '2019-05-24 14:03:22', '2019-05-24 14:15:37', 0),
(3, 1, 1, 2, 18, 3.0, 18, 0, 36, 1, 12.00, '2019-05-24 14:03:22', '2019-05-24 14:17:06', 0),
(4, 1, 1, 2, 20, 3.0, 18, 0, 19, 1, 6.33, '2019-05-24 14:03:22', '2019-05-24 14:15:46', 0),
(5, 1, 1, 2, 21, 4.0, 24, 0, 39, 1, 9.75, '2019-05-24 14:03:22', '2019-05-24 14:16:34', 0),
(6, 1, 1, 2, 22, 2.0, 12, 0, 19, 1, 9.50, '2019-05-24 14:03:22', '2019-05-24 14:16:29', 0),
(7, 1, 1, 1, 3, 4.0, 24, 0, 31, 2, 7.75, '2019-05-24 14:17:17', '2019-05-24 14:26:16', 0),
(8, 1, 1, 1, 7, 3.0, 18, 0, 31, 1, 10.33, '2019-05-24 14:17:17', '2019-05-24 14:26:48', 0),
(9, 1, 1, 1, 8, 4.0, 24, 0, 31, 2, 7.75, '2019-05-24 14:17:17', '2019-05-24 14:26:21', 0),
(10, 1, 1, 1, 9, 3.0, 18, 1, 18, 4, 6.00, '2019-05-24 14:17:17', '2019-05-24 14:26:49', 0),
(11, 1, 1, 1, 11, 4.0, 24, 0, 32, 1, 8.00, '2019-05-24 14:17:17', '2019-05-24 14:26:12', 0),
(12, 1, 2, 2, 3, 4.0, 24, 0, 33, 2, 8.25, '2019-05-28 13:22:06', '2019-05-28 13:34:45', 0),
(13, 1, 2, 2, 7, 4.0, 24, 0, 33, 2, 8.25, '2019-05-28 13:22:06', '2019-05-28 13:34:16', 0),
(14, 1, 2, 2, 8, 4.0, 24, 0, 33, 0, 8.25, '2019-05-28 13:22:06', '2019-05-28 13:34:13', 0),
(15, 1, 2, 2, 9, 4.0, 24, 0, 27, 4, 6.75, '2019-05-28 13:22:06', '2019-05-28 13:32:57', 0),
(16, 1, 2, 2, 11, 4.0, 24, 0, 28, 1, 7.00, '2019-05-28 13:22:06', '2019-05-28 13:32:57', 0),
(17, 1, 2, 1, 30, 4.0, 24, 0, 33, 0, 8.25, '2019-05-28 13:34:59', '2019-05-28 13:39:12', 0),
(18, 1, 2, 1, 31, 3.0, 18, 0, 33, 0, 11.00, '2019-05-28 13:34:59', '2019-05-28 13:40:06', 0),
(19, 1, 2, 1, 32, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 13:34:59', '2019-05-28 13:34:59', 0),
(20, 1, 2, 1, 34, 3.0, 18, 0, 33, 0, 11.00, '2019-05-28 13:34:59', '2019-05-28 13:40:07', 0),
(21, 1, 2, 1, 35, 2.4, 16, 0, 32, 0, 13.33, '2019-05-28 13:34:59', '2019-05-28 13:40:14', 0),
(22, 1, 2, 1, 37, 4.0, 24, 0, 30, 0, 7.50, '2019-05-28 13:34:59', '2019-05-28 13:39:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bowling_styles`
--

CREATE TABLE `bowling_styles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bowling_styles`
--

INSERT INTO `bowling_styles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Right Arm Fast', NULL, NULL),
(2, 'Right Arm Fast Medium', NULL, NULL),
(3, 'Left Arm Fast', NULL, NULL),
(4, 'Left Arm Fast Medium', NULL, NULL),
(5, 'Right Arm off-break', NULL, NULL),
(6, 'Right Arm Leg-break', NULL, NULL),
(7, 'Left Arm Orthodox', NULL, NULL),
(8, 'Left Arm Chinaman', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checknotout`
--

CREATE TABLE `checknotout` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `inning_no` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checknotout`
--

INSERT INTO `checknotout` (`id`, `match_id`, `inning_no`, `count`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, '2019-04-24 11:20:16', '2019-04-24 11:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `check_users`
--

CREATE TABLE `check_users` (
  `id` int(11) NOT NULL,
  `title` varchar(11) NOT NULL,
  `post` varchar(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `user` varchar(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `photo_id`, `level_id`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 'Karachi Kings', NULL, 2, '2019-04-23 12:49:19', '2019-04-23 12:50:54', 0),
(2, 'Lahore Qalandars', NULL, 1, '2019-04-23 12:49:28', '2019-04-23 12:49:28', 0),
(3, 'Peshawar Zalmi', NULL, 3, '2019-04-23 12:49:35', '2019-04-23 12:51:00', 0),
(4, 'Multan Sultans', NULL, 1, '2019-04-23 12:49:49', '2019-04-23 12:49:49', 0),
(5, 'Queeta Gladiators', NULL, 3, '2019-04-23 12:49:58', '2019-04-23 12:51:05', 0),
(6, 'Islamabad United', NULL, 2, '2019-04-23 12:50:34', '2019-04-23 12:50:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0',
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `name`, `nationality`, `club_id`, `created_at`, `updated_at`, `active_status`, `photo_id`) VALUES
(1, 'Mickey Aurthor', 'South African', 1, '2019-04-24 09:53:33', '2019-04-24 09:53:33', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `id` int(10) UNSIGNED NOT NULL,
  `refer_id` int(11) DEFAULT NULL,
  `match_id` int(11) NOT NULL,
  `inning_no` int(11) NOT NULL,
  `no_balls` int(11) DEFAULT NULL,
  `wides` int(11) DEFAULT NULL,
  `byes` int(11) DEFAULT NULL,
  `leg_byes` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `refer_id`, `match_id`, `inning_no`, `no_balls`, `wides`, `byes`, `leg_byes`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, 1, 1, 1, 6, 4, 8, '2019-05-24 14:03:22', '2019-05-24 14:15:28', 0),
(2, 1, 1, 2, 0, 4, 1, 4, '2019-05-24 14:17:17', '2019-05-24 14:24:11', 0),
(3, 1, 2, 1, 0, 2, 1, 4, '2019-05-28 13:22:06', '2019-05-28 13:33:58', 0),
(4, 1, 2, 2, 2, 1, 0, 4, '2019-05-28 13:34:59', '2019-05-28 13:37:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fall_of_wickets`
--

CREATE TABLE `fall_of_wickets` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `innings no` int(11) NOT NULL,
  `wicket_no` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `batsmen_id` int(11) NOT NULL,
  `bowler_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE `fixtures` (
  `id` int(10) UNSIGNED NOT NULL,
  `refer_id` int(11) NOT NULL,
  `club_id_1` int(11) NOT NULL,
  `club_id_2` int(11) DEFAULT NULL,
  `match_date` date DEFAULT NULL,
  `match_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ground_id` int(11) DEFAULT NULL,
  `tournament_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0',
  `final_check` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`id`, `refer_id`, `club_id_1`, `club_id_2`, `match_date`, `match_time`, `ground_id`, `tournament_id`, `status`, `created_at`, `updated_at`, `active_status`, `final_check`) VALUES
(1, 1, 1, 2, '2019-05-24', '10 AM', 1, 1, 1, '2019-05-24 13:59:22', '2019-05-24 14:03:20', 0, 0),
(2, 1, 1, 3, '2019-05-28', '10 AM', 1, 1, 1, '2019-05-24 13:59:22', '2019-05-28 13:22:04', 0, 0),
(3, 1, 1, 4, '2019-05-30', '10 AM', 1, 1, 0, '2019-05-24 13:59:22', '2019-05-24 13:59:22', 0, 0),
(4, 1, 1, 5, '2019-06-01', '10 AM', 1, 1, 0, '2019-05-24 13:59:22', '2019-05-24 13:59:22', 0, 0),
(5, 1, 1, 6, '2019-06-03', '10 AM', 1, 1, 0, '2019-05-24 13:59:22', '2019-05-24 13:59:22', 0, 0),
(6, 1, 2, 1, '2019-06-05', '10 AM', 1, 1, 0, '2019-05-24 13:59:22', '2019-05-24 13:59:22', 0, 0),
(7, 1, 2, 3, '2019-06-07', '10 AM', 1, 1, 0, '2019-05-24 13:59:22', '2019-05-24 13:59:22', 0, 0),
(8, 1, 2, 4, '2019-06-09', '10 AM', 1, 1, 0, '2019-05-24 13:59:22', '2019-05-24 13:59:22', 0, 0),
(9, 1, 2, 5, '2019-06-11', '10 AM', 1, 1, 0, '2019-05-24 13:59:22', '2019-05-24 13:59:22', 0, 0),
(10, 1, 2, 6, '2019-06-13', '10 AM', 1, 1, 0, '2019-05-24 13:59:22', '2019-05-24 13:59:22', 0, 0),
(11, 1, 3, 1, '2019-06-15', '10 AM', 1, 1, 0, '2019-05-24 13:59:22', '2019-05-24 13:59:22', 0, 0),
(12, 1, 3, 2, '2019-06-17', '10 AM', 1, 1, 0, '2019-05-24 13:59:22', '2019-05-24 13:59:22', 0, 0),
(13, 1, 3, 4, '2019-06-19', '10 AM', 1, 1, 0, '2019-05-24 13:59:22', '2019-05-24 13:59:22', 0, 0),
(14, 1, 3, 5, '2019-06-21', '10 AM', 1, 1, 0, '2019-05-24 13:59:22', '2019-05-24 13:59:22', 0, 0),
(15, 1, 3, 6, '2019-06-23', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0),
(16, 1, 4, 1, '2019-06-25', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0),
(17, 1, 4, 2, '2019-06-27', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0),
(18, 1, 4, 3, '2019-06-29', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0),
(19, 1, 4, 5, '2019-07-01', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0),
(20, 1, 4, 6, '2019-07-03', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0),
(21, 1, 5, 1, '2019-07-05', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0),
(22, 1, 5, 2, '2019-07-07', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0),
(23, 1, 5, 3, '2019-07-09', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0),
(24, 1, 5, 4, '2019-07-11', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0),
(25, 1, 5, 6, '2019-07-13', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0),
(26, 1, 6, 1, '2019-07-15', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0),
(27, 1, 6, 2, '2019-07-17', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0),
(28, 1, 6, 3, '2019-07-19', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0),
(29, 1, 6, 4, '2019-07-21', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0),
(30, 1, 6, 5, '2019-07-23', '10 AM', 1, 1, 0, '2019-05-24 13:59:23', '2019-05-24 13:59:23', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `grounds`
--

CREATE TABLE `grounds` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0',
  `photo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grounds`
--

INSERT INTO `grounds` (`id`, `name`, `created_at`, `updated_at`, `active_status`, `photo_id`) VALUES
(1, 'Sheikh Zayid Stadium', '2019-04-23 13:45:08', '2019-04-23 13:45:08', 0, NULL),
(2, 'UBL Sports Complex', '2019-05-29 13:21:42', '2019-05-29 13:21:42', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `innings_score`
--

CREATE TABLE `innings_score` (
  `id` int(11) NOT NULL,
  `refer_id` int(11) DEFAULT NULL,
  `match_id` int(11) NOT NULL,
  `inning_no` int(11) NOT NULL,
  `club_id` int(11) DEFAULT NULL,
  `runs` int(11) NOT NULL,
  `wickets` int(11) NOT NULL,
  `overs` float(10,1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `innings_score`
--

INSERT INTO `innings_score` (`id`, `refer_id`, `match_id`, `inning_no`, `club_id`, `runs`, `wickets`, `overs`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, 1, 1, 1, 205, 9, 20.0, '2019-05-24 14:17:16', '2019-05-24 14:17:16', 0),
(2, 1, 1, 2, 2, 148, 10, 18.0, '2019-05-24 14:27:12', '2019-05-24 14:27:12', 0),
(3, 1, 2, 1, 3, 159, 9, 20.0, '2019-05-28 13:34:58', '2019-05-28 13:34:58', 0),
(4, 1, 2, 2, 1, 165, 0, 16.4, '2019-05-28 13:40:20', '2019-05-28 13:40:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 'Easy', NULL, NULL, 0),
(2, 'Moderate', NULL, NULL, 0),
(3, 'Hard\r\n', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lineups`
--

CREATE TABLE `lineups` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `innings_no` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lineups`
--

INSERT INTO `lineups` (`id`, `match_id`, `player_id`, `club_id`, `innings_no`, `active_status`) VALUES
(1, 1, 1, 1, 1, 0),
(2, 1, 3, 1, 1, 0),
(3, 1, 4, 1, 1, 0),
(4, 1, 5, 1, 1, 0),
(5, 1, 6, 1, 1, 0),
(6, 1, 7, 1, 1, 0),
(7, 1, 8, 1, 1, 0),
(8, 1, 9, 1, 1, 0),
(9, 1, 11, 1, 1, 0),
(10, 1, 12, 1, 1, 0),
(11, 1, 14, 1, 1, 0),
(12, 1, 15, 2, 2, 0),
(13, 1, 16, 2, 2, 0),
(14, 1, 17, 2, 2, 0),
(15, 1, 18, 2, 2, 0),
(16, 1, 19, 2, 2, 0),
(17, 1, 20, 2, 2, 0),
(18, 1, 21, 2, 2, 0),
(19, 1, 22, 2, 2, 0),
(20, 1, 23, 2, 2, 0),
(21, 1, 25, 2, 2, 0),
(22, 1, 28, 2, 2, 0),
(23, 2, 1, 1, 2, 0),
(24, 2, 2, 1, 2, 0),
(25, 2, 3, 1, 2, 0),
(26, 2, 4, 1, 2, 0),
(27, 2, 5, 1, 2, 0),
(28, 2, 6, 1, 2, 0),
(29, 2, 7, 1, 2, 0),
(30, 2, 8, 1, 2, 0),
(31, 2, 9, 1, 2, 0),
(32, 2, 11, 1, 2, 0),
(33, 2, 12, 1, 2, 0),
(34, 2, 29, 3, 1, 0),
(35, 2, 30, 3, 1, 0),
(36, 2, 31, 3, 1, 0),
(37, 2, 32, 3, 1, 0),
(38, 2, 33, 3, 1, 0),
(39, 2, 34, 3, 1, 0),
(40, 2, 35, 3, 1, 0),
(41, 2, 37, 3, 1, 0),
(42, 2, 39, 3, 1, 0),
(43, 2, 40, 3, 1, 0),
(44, 2, 42, 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(10) UNSIGNED NOT NULL,
  `fixture_id` int(11) DEFAULT NULL,
  `refer_id` int(11) DEFAULT NULL,
  `club_id_1` int(11) NOT NULL,
  `club_id_2` int(11) NOT NULL,
  `ground_id` int(11) NOT NULL,
  `pitch_id` int(11) DEFAULT NULL,
  `mom_player_id` int(11) NOT NULL DEFAULT '0',
  `umpire_id` int(11) DEFAULT NULL,
  `tournament_id` int(11) NOT NULL,
  `match_date` date NOT NULL,
  `status` int(191) NOT NULL DEFAULT '0',
  `winner_club_id` int(11) NOT NULL DEFAULT '0',
  `match_type_id` int(11) NOT NULL,
  `toss` int(11) DEFAULT '0',
  `choose_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `fixture_id`, `refer_id`, `club_id_1`, `club_id_2`, `ground_id`, `pitch_id`, `mom_player_id`, `umpire_id`, `tournament_id`, `match_date`, `status`, `winner_club_id`, `match_type_id`, `toss`, `choose_to`, `result`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, 1, 1, 2, 1, NULL, 0, 1, 1, '2019-05-24', 2, 1, 1, 1, '1', '\"Karachi Kings\" Won By 57 Runs', '2019-05-24 19:03:20', '2019-05-24 14:30:26', 0),
(2, 2, 1, 1, 3, 1, NULL, 0, 1, 1, '2019-05-28', 2, 1, 1, 1, '2', '\"Karachi Kings\" Won By 10 Wickets', '2019-05-28 18:22:04', '2019-05-28 13:40:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `match_types`
--

CREATE TABLE `match_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `match_types`
--

INSERT INTO `match_types` (`id`, `type_name`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 'T20', NULL, NULL, 0),
(2, 'One-Day', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`, `active_status`) VALUES
(25, '2018_09_27_190429_create_levels_table', 2, 0),
(52, '2014_10_12_000000_create_users_table', 3, 0),
(53, '2014_10_12_100000_create_password_resets_table', 3, 0),
(54, '2018_09_26_074554_create_clubs_table', 3, 0),
(55, '2018_09_26_075240_create_players_table', 3, 0),
(56, '2018_09_26_075604_create_coaches_table', 3, 0),
(57, '2018_09_26_075839_create_grounds_table', 3, 0),
(58, '2018_09_26_080206_create_tournaments_table', 3, 0),
(59, '2018_09_26_080305_create_umpires_table', 3, 0),
(60, '2018_09_26_080405_create_pitches_table', 3, 0),
(61, '2018_09_26_080540_create_overs_table', 3, 0),
(62, '2018_09_26_080805_create_balls_table', 3, 0),
(63, '2018_09_26_083850_create_extras_table', 3, 0),
(64, '2018_09_26_084209_create_ground_types_table', 3, 0),
(65, '2018_09_26_084407_create_player_roles_table', 3, 0),
(66, '2018_09_26_085014_create_notices_table', 3, 0),
(67, '2018_09_26_093011_create_matches_table', 3, 0),
(68, '2018_09_26_094007_create_match_types_table', 3, 0),
(69, '2018_09_26_095608_create_scorecards_table', 3, 0),
(70, '2018_09_26_100110_create_series_table', 3, 0),
(71, '2018_09_26_101052_create_players_ranking_o_ds_table', 3, 0),
(72, '2018_09_26_101543_create_players_ranking_t20s_table', 3, 0),
(73, '2018_09_26_101917_create_teams_ranking_o_ds_table', 3, 0),
(74, '2018_09_26_102014_create_teams_ranking_t20s_table', 3, 0),
(75, '2018_09_26_130902_create_photos_table', 3, 0),
(76, '2018_09_27_191407_add_level_id_to_clubs', 3, 0),
(77, '2018_09_27_193458_create_levels_table', 4, 0),
(78, '2018_09_27_205154_add_photo_id_to_coaches', 5, 0),
(79, '2018_09_28_123146_add_photo_id_to_grounds', 6, 0),
(80, '2018_09_28_190712_add_photo_id_to_players', 7, 0),
(81, '2018_09_28_191521_create_batting_styles_table', 7, 0),
(82, '2018_09_28_191550_create_bowling_styles_table', 7, 0),
(83, '2018_09_28_191909_add_bowling_style_id_to_players', 7, 0),
(84, '2018_09_28_191924_add_batting_style_id_to_players', 7, 0),
(85, '2018_09_28_192939_add_age_to_players', 8, 0),
(86, '2018_09_29_084539_add_photo_id_to_tournaments', 9, 0),
(87, '2018_09_29_085629_add_photo_id_to_umpires', 10, 0),
(88, '2018_09_29_085654_add_nationality_to_umpires', 10, 0),
(89, '2018_09_29_110111_create_posts_table', 11, 0),
(90, '2018_09_29_120008_add_role_id_to_players_ranking_o_ds', 12, 0),
(91, '2018_10_05_181327_add_role_id_to_players_ranking_t20s_table', 13, 0),
(92, '2018_10_14_075015_add_photo_id_to_teams_ranking_o_ds', 14, 0),
(93, '2018_10_14_114613_add_photo_id_to_teams_ranking_t20s', 15, 0),
(94, '2018_10_15_105814_create_tournaments_references_table', 16, 0),
(95, '2018_10_15_110849_create_tournament_formats_table', 16, 0),
(96, '2018_10_27_125348_create_fixtures_table', 17, 0),
(97, '2018_10_27_152029_add_photo_id_coloumn_table_tournaments_references', 17, 0),
(99, '2018_10_27_155106_add_edition_coloumn_table_tournaments_references', 18, 0),
(100, '2018_10_27_163026_add_status_coloumn_table_tournaments_references', 19, 0),
(101, '2018_10_28_105834_add_starting_date_coloumn_table_tournaments_references', 20, 0),
(102, '2018_10_28_105855_add_ending_date_coloumn_table_tournaments_references', 20, 0),
(103, '2018_11_01_092540_add_role_idcoloumn_users_table', 21, 0),
(104, '2018_11_01_092832_create_roles_table', 21, 0),
(105, '2018_11_03_114706_add_permission_coloumn_in_table_roles', 22, 0),
(106, '2018_11_03_114816_create_role_users_table', 22, 0),
(107, '2018_11_03_122200_drop_coloumn_role_id_from_users', 22, 0),
(108, '2018_11_21_102842_create_tournament_clubs_table', 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `club_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `value` varchar(11) NOT NULL,
  `legal` int(11) NOT NULL,
  `extra_runs` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `value`, `legal`, `extra_runs`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 'Six', '6', 1, 0, '2018-12-10 08:05:13', '2018-12-10 08:05:13', 0),
(2, 'Five', '5', 1, 0, '2018-12-10 08:05:13', '2018-12-10 08:05:13', 0),
(3, 'Four', '4', 1, 0, '2018-12-10 08:05:54', '2018-12-10 08:05:54', 0),
(4, 'Three', '3', 1, 0, '2018-12-10 08:05:54', '2018-12-10 08:05:54', 0),
(5, 'Two', '2', 1, 0, '2018-12-10 08:06:20', '2018-12-10 08:06:20', 0),
(6, 'One', '1', 1, 0, '2018-12-10 08:06:20', '2018-12-10 08:06:20', 0),
(7, 'Dot', '0', 1, 0, '2018-12-10 08:07:24', '2018-12-10 08:07:24', 0),
(8, 'Wide', 'wd', 0, 1, '2018-12-10 08:07:24', '2018-12-24 09:02:21', 0),
(9, 'No Ball', 'nb', 0, 1, '2018-12-10 08:08:45', '2018-12-24 09:02:28', 0),
(10, 'Leg Bye', 'lb', 0, 0, '2018-12-10 08:08:45', '2018-12-10 08:11:31', 0),
(11, 'Bye', 'b', 0, 0, '2018-12-10 08:10:13', '2018-12-10 08:11:38', 0),
(12, 'Out', 'w', 1, 0, '2018-12-10 08:10:13', '2018-12-10 08:11:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `outs`
--

CREATE TABLE `outs` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `value` varchar(11) DEFAULT NULL,
  `depended` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outs`
--

INSERT INTO `outs` (`id`, `name`, `value`, `depended`, `active_status`) VALUES
(1, 'Bowled', 'b', 0, 0),
(2, 'Caught', 'ct', 1, 0),
(3, 'Leg Bfr Wkt', 'lbw', 0, 0),
(4, 'Obs T Fld', 'otf', 0, 0),
(5, 'Hit Wkt', 'hw', 0, 0),
(6, 'Handle Ball', 'hb', 0, 0),
(7, 'Hit Twice', 'ht', 0, 0),
(8, 'Time Out', 'to', 0, 0),
(9, 'Run Out', 'ro', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `overs`
--

CREATE TABLE `overs` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `inning_no` int(11) NOT NULL,
  `bowler_id` int(11) NOT NULL,
  `runs` int(11) NOT NULL,
  `balls` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `file`, `created_at`, `updated_at`, `active_status`) VALUES
(1, '15587224661544099254logo-inverted.png', '2019-05-24 13:27:46', '2019-05-24 13:27:46', 0),
(2, '15587228891544099254logo-inverted.png', '2019-05-24 13:34:49', '2019-05-24 13:34:49', 0),
(3, '15587238691544099254logo-inverted.png', '2019-05-24 13:51:09', '2019-05-24 13:51:09', 0),
(4, '15587243471544099254logo-inverted.png', '2019-05-24 13:59:07', '2019-05-24 13:59:07', 0),
(5, '15591529401544434265admin-960028.png', '2019-05-29 13:02:20', '2019-05-29 13:02:20', 0),
(6, '155915415115547455651f60d.png', '2019-05-29 13:22:31', '2019-05-29 13:22:31', 0),
(7, '15605427131538136411crown2.jpg', '2019-06-14 15:05:13', '2019-06-14 15:05:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pitches`
--

CREATE TABLE `pitches` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(10) UNSIGNED NOT NULL,
  `shirt_no` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `club_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `batting_style_id` int(11) DEFAULT NULL,
  `bowling_style_id` int(11) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `shirt_no`, `name`, `date_of_birth`, `club_id`, `role_id`, `created_at`, `updated_at`, `photo_id`, `batting_style_id`, `bowling_style_id`, `age`, `active_status`) VALUES
(1, 39, 'Sikandar Raza', '1981-04-21', 1, 1, '2019-05-24 13:24:41', '2019-05-24 13:24:41', NULL, 2, 7, 38, 0),
(2, 51, 'Awais Zia', '1987-03-05', 1, 1, '2019-05-24 13:24:41', '2019-05-24 13:24:41', NULL, 1, 5, 32, 0),
(3, 8, 'Imad Wasim', '1988-04-17', 1, 3, '2019-05-24 13:24:41', '2019-05-24 13:24:41', NULL, 2, 7, 31, 0),
(4, 18, 'Colin Munro', '1988-04-17', 1, 1, '2019-05-24 13:24:41', '2019-05-24 13:24:41', NULL, 1, 2, 31, 0),
(5, 26, 'Mohammad Rizwan', '1988-04-17', 1, 4, '2019-05-24 13:24:42', '2019-05-24 13:24:42', NULL, 1, 5, 31, 0),
(6, 96, 'Babar Azam', '1988-04-17', 1, 1, '2019-05-24 13:24:42', '2019-05-24 13:24:42', NULL, 1, 5, 31, 0),
(7, 17, 'Osama Mir', '1988-04-17', 1, 3, '2019-05-24 13:24:42', '2019-05-24 13:24:42', NULL, 1, 6, 31, 0),
(8, 33, 'Aamer Yamin ', '1988-04-17', 1, 3, '2019-05-24 13:24:42', '2019-05-24 13:24:42', NULL, 2, 4, 31, 0),
(9, 5, 'Muhammad Aamir', '1988-04-17', 1, 2, '2019-05-24 13:24:42', '2019-05-24 13:24:42', NULL, 2, 3, 31, 0),
(10, 83, 'Sohail Khan ', '1988-04-17', 1, 2, '2019-05-24 13:24:42', '2019-05-24 13:24:42', NULL, 2, 3, 31, 0),
(11, 36, 'Usman Khan', '1988-04-17', 1, 2, '2019-05-24 13:24:42', '2019-05-24 13:24:42', NULL, 2, 3, 31, 0),
(12, 88, 'Colin Ingram', '1988-04-17', 1, 1, '2019-05-24 13:24:42', '2019-05-24 13:24:42', NULL, 2, 7, 31, 0),
(13, 73, 'Ravi Bopara', '1988-04-17', 1, 3, '2019-05-24 13:24:42', '2019-05-24 13:24:42', NULL, 1, 1, 31, 0),
(14, 51, 'Liam Livingstone', '1988-04-17', 1, 1, '2019-05-24 13:24:43', '2019-05-24 13:24:43', NULL, 2, 7, 31, 0),
(15, 39, 'RILEE ROSSOUW', '1981-04-21', 2, 1, '2019-05-24 13:24:51', '2019-05-24 13:24:51', NULL, 1, 7, 38, 0),
(19, 26, 'UMAR AKMAL', '1988-04-17', 2, 4, '2019-05-24 13:24:52', '2019-05-24 13:24:52', NULL, 1, 5, 31, 0),
(21, 17, 'Sandeep Lamichhane', '1988-04-17', 2, 2, '2019-05-24 13:24:52', '2019-05-24 13:24:52', NULL, 1, 6, 31, 0),
(22, 33, 'Harris Rauf', '1988-04-17', 2, 2, '2019-05-24 13:24:52', '2019-05-24 13:24:52', NULL, 2, 4, 31, 0),
(23, 5, 'Fakhar Zaman', '1988-04-17', 2, 1, '2019-05-24 13:24:52', '2019-05-24 13:24:52', NULL, 2, 3, 31, 0),
(25, 36, 'Anton Devcich', '1988-04-17', 2, 1, '2019-05-24 13:24:52', '2019-05-24 13:24:52', NULL, 2, 3, 31, 0),
(26, 88, 'Sohail Akhtar', '1988-04-17', 2, 1, '2019-05-24 13:24:53', '2019-05-24 13:24:53', NULL, 2, 7, 31, 0),
(27, 73, 'Shaheen Shah Afridi', '1988-04-17', 2, 2, '2019-05-24 13:24:53', '2019-05-24 13:24:53', NULL, 1, 1, 31, 0),
(28, 51, 'Mohammad Imran', '1988-04-17', 2, 1, '2019-05-24 13:24:53', '2019-05-24 13:24:53', NULL, 2, 7, 31, 0),
(29, 39, 'Samiullah', '1981-04-21', 3, 1, '2019-05-24 13:25:04', '2019-05-24 13:25:04', NULL, 1, 7, 38, 0),
(30, 51, 'Daren Sammy', '1987-03-05', 3, 3, '2019-05-24 13:25:04', '2019-05-24 13:25:04', NULL, 1, 2, 32, 0),
(31, 8, 'Kieron Pollard', '1988-04-17', 3, 3, '2019-05-24 13:25:04', '2019-05-24 13:25:04', NULL, 2, 2, 31, 0),
(32, 18, 'Sohaib Maqsood', '1988-04-17', 3, 3, '2019-05-24 13:25:04', '2019-05-24 13:25:04', NULL, 1, 5, 31, 0),
(33, 26, 'Kamran Akmal', '1988-04-17', 3, 4, '2019-05-24 13:25:04', '2019-05-24 13:25:04', NULL, 1, 5, 31, 0),
(34, 96, 'Ibtisam Sheikh', '1988-04-17', 3, 3, '2019-05-24 13:25:04', '2019-05-24 13:25:04', NULL, 1, 8, 31, 0),
(35, 17, 'Liam Dawson', '1988-04-17', 3, 3, '2019-05-24 13:25:04', '2019-05-24 13:25:04', NULL, 1, 6, 31, 0),
(36, 33, 'Chris Jordan', '1988-04-17', 3, 2, '2019-05-24 13:25:04', '2019-05-24 13:25:04', NULL, 2, 4, 31, 0),
(37, 5, 'Wahab Riaz', '1988-04-17', 3, 2, '2019-05-24 13:25:04', '2019-05-24 13:25:04', NULL, 2, 3, 31, 0),
(38, 83, 'Hasan Ali', '1988-04-17', 3, 2, '2019-05-24 13:25:05', '2019-05-24 13:25:05', NULL, 2, 3, 31, 0),
(39, 36, 'Dawid Malan', '1988-04-17', 3, 1, '2019-05-24 13:25:05', '2019-05-24 13:25:05', NULL, 2, 3, 31, 0),
(40, 88, 'Umar Amin', '1988-04-17', 3, 1, '2019-05-24 13:25:05', '2019-05-24 13:25:05', NULL, 2, 7, 31, 0),
(41, 73, 'Nabi Gul', '1988-04-17', 3, 2, '2019-05-24 13:25:05', '2019-05-24 13:25:05', NULL, 1, 1, 31, 0),
(42, 51, 'Misbah ul Haq', '1988-04-17', 3, 1, '2019-05-24 13:25:05', '2019-05-24 13:25:05', NULL, 1, 7, 31, 0),
(43, 39, 'Steve Smith', '1981-04-21', 4, 1, '2019-05-24 13:25:12', '2019-05-24 13:25:12', NULL, 1, 7, 38, 0),
(44, 51, 'Shahid Afridi', '1987-03-05', 4, 3, '2019-05-24 13:25:12', '2019-05-24 13:25:12', NULL, 1, 6, 32, 0),
(45, 8, 'Shoaib Malik', '1988-04-17', 4, 3, '2019-05-24 13:25:12', '2019-05-24 13:25:12', NULL, 2, 6, 31, 0),
(46, 18, 'Shan Masood', '1988-04-17', 4, 1, '2019-05-24 13:25:12', '2019-05-24 13:25:12', NULL, 1, 5, 31, 0),
(47, 26, 'Shakeel Ansar', '1988-04-17', 4, 4, '2019-05-24 13:25:12', '2019-05-24 13:25:12', NULL, 1, 5, 31, 0),
(48, 96, 'Nicholas Pooran', '1988-04-17', 4, 3, '2019-05-24 13:25:12', '2019-05-24 13:25:12', NULL, 1, 8, 31, 0),
(49, 17, 'Laurie Evans', '1988-04-17', 4, 3, '2019-05-24 13:25:12', '2019-05-24 13:25:12', NULL, 1, 6, 31, 0),
(50, 33, 'Mohammad Irfan', '1988-04-17', 4, 2, '2019-05-24 13:25:12', '2019-05-24 13:25:12', NULL, 2, 4, 31, 0),
(51, 5, 'Mohammad Abbas', '1988-04-17', 4, 2, '2019-05-24 13:25:12', '2019-05-24 13:25:12', NULL, 2, 3, 31, 0),
(52, 83, 'Tom Moores', '1988-04-17', 4, 2, '2019-05-24 13:25:12', '2019-05-24 13:25:12', NULL, 2, 3, 31, 0),
(53, 36, 'Joe Denly', '1988-04-17', 4, 1, '2019-05-24 13:25:12', '2019-05-24 13:25:12', NULL, 2, 3, 31, 0),
(54, 88, 'Nauman Ali', '1988-04-17', 4, 1, '2019-05-24 13:25:13', '2019-05-24 13:25:13', NULL, 2, 7, 31, 0),
(55, 73, 'Umar Siddiq', '1988-04-17', 4, 1, '2019-05-24 13:25:13', '2019-05-24 13:25:13', NULL, 1, 1, 31, 0),
(56, 51, 'Qais Ahmed', '1988-04-17', 4, 1, '2019-05-24 13:25:13', '2019-05-24 13:25:13', NULL, 1, 7, 31, 0),
(57, 39, 'RILEE ROSSOUW', '1981-04-21', 5, 1, '2019-05-24 13:25:21', '2019-05-24 13:25:21', NULL, 1, 7, 38, 0),
(58, 51, 'SHANE WATSON', '1987-03-05', 5, 3, '2019-05-24 13:25:21', '2019-05-24 13:25:21', NULL, 1, 2, 32, 0),
(59, 8, 'ANWAR ALI', '1988-04-17', 5, 3, '2019-05-24 13:25:21', '2019-05-24 13:25:21', NULL, 2, 2, 31, 0),
(60, 18, 'SAUD SHAKEEL', '1988-04-17', 5, 3, '2019-05-24 13:25:21', '2019-05-24 13:25:21', NULL, 1, 5, 31, 0),
(61, 26, 'SARFRAZ AHMED', '1988-04-17', 5, 4, '2019-05-24 13:25:21', '2019-05-24 13:25:21', NULL, 1, 5, 31, 0),
(62, 96, 'Dwayne Bravo', '1988-04-17', 5, 3, '2019-05-24 13:25:21', '2019-05-24 13:25:21', NULL, 1, 2, 31, 0),
(63, 17, 'Fawad Ahmed', '1988-04-17', 5, 3, '2019-05-24 13:25:22', '2019-05-24 13:25:22', NULL, 1, 6, 31, 0),
(65, 5, 'Mohammad Asghar', '1988-04-17', 5, 2, '2019-05-24 13:25:22', '2019-05-24 13:25:22', NULL, 2, 7, 31, 0),
(66, 83, 'SOHAIL TANVIR', '1988-04-17', 5, 2, '2019-05-24 13:25:22', '2019-05-24 13:25:22', NULL, 2, 3, 31, 0),
(67, 36, 'UMAR AKMAL', '1988-04-17', 5, 1, '2019-05-24 13:25:22', '2019-05-24 13:25:22', NULL, 2, 3, 31, 0),
(68, 88, 'RILEE ROSSOUW', '1988-04-17', 5, 1, '2019-05-24 13:25:22', '2019-05-24 13:25:22', NULL, 2, 7, 31, 0),
(69, 73, 'Ghulam Musaddasir', '1988-04-17', 5, 2, '2019-05-24 13:25:22', '2019-05-24 13:25:22', NULL, 1, 1, 31, 0),
(70, 51, 'Ahmed Shahzad', '1988-04-17', 5, 1, '2019-05-24 13:25:22', '2019-05-24 13:25:22', NULL, 1, 7, 31, 0),
(71, 39, 'Ian Bell', '1981-04-21', 6, 1, '2019-05-24 13:25:30', '2019-05-24 13:25:30', NULL, 1, 7, 38, 0),
(72, 51, 'Samit Patel', '1987-03-05', 6, 3, '2019-05-24 13:25:30', '2019-05-24 13:25:30', NULL, 1, 6, 32, 0),
(73, 8, 'Shadab Khan', '1988-04-17', 6, 3, '2019-05-24 13:25:30', '2019-05-24 13:25:30', NULL, 2, 6, 31, 0),
(74, 18, 'Amad Butt', '1988-04-17', 6, 1, '2019-05-24 13:25:30', '2019-05-24 13:25:30', NULL, 1, 5, 31, 0),
(75, 26, 'Luke Ronchi', '1988-04-17', 6, 4, '2019-05-24 13:25:30', '2019-05-24 13:25:30', NULL, 1, 5, 31, 0),
(76, 96, 'Faheem Ashraf', '1988-04-17', 6, 3, '2019-05-24 13:25:30', '2019-05-24 13:25:30', NULL, 1, 2, 31, 0),
(78, 33, 'Wayne Parnell', '1988-04-17', 6, 2, '2019-05-24 13:25:30', '2019-05-24 13:25:30', NULL, 2, 4, 31, 0),
(79, 5, 'Rumman Raees', '1988-04-17', 6, 2, '2019-05-24 13:25:31', '2019-05-24 13:25:31', NULL, 2, 3, 31, 0),
(80, 83, 'Mohammad Sami', '1988-04-17', 6, 2, '2019-05-24 13:25:31', '2019-05-24 13:25:31', NULL, 2, 3, 31, 0),
(81, 36, 'Cameron Delport', '1988-04-17', 6, 1, '2019-05-24 13:25:31', '2019-05-24 13:25:31', NULL, 2, 3, 31, 0),
(82, 88, 'Sahibzada Farhan', '1988-04-17', 6, 1, '2019-05-24 13:25:31', '2019-05-24 13:25:31', NULL, 2, 7, 31, 0),
(83, 73, 'Hussain Talat', '1988-04-17', 6, 1, '2019-05-24 13:25:31', '2019-05-24 13:25:31', NULL, 1, 1, 31, 0),
(84, 51, 'Asif Ali', '1988-04-17', 6, 1, '2019-05-24 13:25:31', '2019-05-24 13:25:31', NULL, 1, 7, 31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `players_ranking_o_ds`
--

CREATE TABLE `players_ranking_o_ds` (
  `id` int(10) UNSIGNED NOT NULL,
  `club_id` int(11) DEFAULT NULL,
  `points` decimal(8,2) NOT NULL,
  `player_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players_ranking_t20s`
--

CREATE TABLE `players_ranking_t20s` (
  `id` int(10) UNSIGNED NOT NULL,
  `club_id` int(11) DEFAULT NULL,
  `points` decimal(8,2) NOT NULL,
  `player_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `player_roles`
--

CREATE TABLE `player_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_roles`
--

INSERT INTO `player_roles` (`id`, `name`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 'Batsman', NULL, NULL, 0),
(2, 'Bowler', NULL, NULL, 0),
(3, 'All-Rounder', NULL, NULL, 0),
(4, 'Wicket-Keeper', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `player_stats`
--

CREATE TABLE `player_stats` (
  `id` int(11) NOT NULL,
  `format` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `matches` int(11) NOT NULL DEFAULT '0',
  `innings` int(11) NOT NULL DEFAULT '0',
  `notouts` int(11) NOT NULL DEFAULT '0',
  `ducks` int(11) DEFAULT NULL,
  `runs` int(11) NOT NULL DEFAULT '0',
  `highscore` varchar(191) NOT NULL DEFAULT '0',
  `average_bat` float(100,2) DEFAULT '0.00',
  `balls_played` int(11) NOT NULL DEFAULT '0',
  `strikerate` float(100,2) NOT NULL DEFAULT '0.00',
  `centuries` int(11) NOT NULL DEFAULT '0',
  `halfcenturies` int(11) NOT NULL DEFAULT '0',
  `catches` int(11) NOT NULL DEFAULT '0',
  `stumping` int(11) NOT NULL DEFAULT '0',
  `fours` int(11) NOT NULL DEFAULT '0',
  `sixes` int(11) NOT NULL DEFAULT '0',
  `points` float(100,2) DEFAULT NULL,
  `innings_bowl` int(11) NOT NULL DEFAULT '0',
  `overs` float(100,1) NOT NULL DEFAULT '0.0',
  `runs_ball` int(11) NOT NULL DEFAULT '0',
  `wickets` int(11) NOT NULL DEFAULT '0',
  `average_ball` float(100,2) NOT NULL DEFAULT '0.00',
  `best_ball` varchar(191) NOT NULL DEFAULT '0/0',
  `economy` float(100,2) DEFAULT '0.00',
  `five_wickets` int(11) NOT NULL DEFAULT '0',
  `wides` int(11) DEFAULT NULL,
  `noballs` int(11) DEFAULT NULL,
  `points_ball` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player_stats`
--

INSERT INTO `player_stats` (`id`, `format`, `player_id`, `role_id`, `matches`, `innings`, `notouts`, `ducks`, `runs`, `highscore`, `average_bat`, `balls_played`, `strikerate`, `centuries`, `halfcenturies`, `catches`, `stumping`, `fours`, `sixes`, `points`, `innings_bowl`, `overs`, `runs_ball`, `wickets`, `average_ball`, `best_ball`, `economy`, `five_wickets`, `wides`, `noballs`, `points_ball`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, 1, 1, 3, 2, 1, NULL, 109, '63', 54.50, 80, 136.25, 0, 1, 0, 0, 10, 3, 175.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:41', '2019-05-28 13:40:36', 0),
(2, 2, 1, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:41', '2019-05-27 12:07:44', 0),
(3, 1, 2, 1, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:41', '2019-05-28 13:40:21', 0),
(4, 2, 2, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:41', '2019-05-27 12:07:44', 0),
(5, 1, 3, 3, 3, 2, 0, NULL, 8, '4', 4.00, 4, 400.00, 0, 0, 0, 0, 2, 0, 10.00, 3, 12.0, 95, 6, 15.83, '2/31', 7.92, 0, 7, 3, 57, '2019-05-24 13:24:41', '2019-05-28 13:40:41', 0),
(6, 2, 3, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:41', '2019-05-27 11:53:22', 0),
(7, 1, 4, 1, 3, 2, 0, NULL, 40, '20', 20.00, 18, 444.44, 0, 0, 0, 0, 2, 2, 46.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:41', '2019-05-28 13:40:21', 0),
(8, 2, 4, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:41', '2019-05-27 12:07:44', 0),
(9, 1, 5, 4, 3, 2, 0, NULL, 36, '18', 18.00, 40, 180.00, 0, 0, 0, 0, 2, 0, 38.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:42', '2019-05-28 13:40:21', 0),
(10, 2, 5, 4, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:42', '2019-05-27 12:07:44', 0),
(11, 1, 6, 1, 3, 2, 1, NULL, 221, '95', 110.50, 128, 172.66, 0, 3, 0, 0, 23, 7, 408.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:42', '2019-05-28 13:40:37', 0),
(12, 2, 6, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:42', '2019-05-27 12:07:44', 0),
(13, 1, 7, 3, 3, 2, 0, NULL, 14, '7', 7.00, 8, 350.00, 0, 0, 0, 0, 2, 0, 16.00, 3, 10.0, 95, 4, 23.75, '2/33', 9.50, 0, 9, 4, 32, '2019-05-24 13:24:42', '2019-05-28 13:40:41', 0),
(14, 2, 7, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:42', '2019-05-27 11:53:22', 0),
(15, 1, 8, 3, 3, 2, 0, NULL, 32, '16', 16.00, 24, 266.67, 0, 0, 0, 0, 2, 2, 38.00, 3, 12.0, 95, 4, 23.75, '2/31', 7.92, 0, 13, 6, 30, '2019-05-24 13:24:42', '2019-05-28 13:40:41', 0),
(16, 2, 8, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:42', '2019-05-27 11:53:22', 0),
(17, 1, 9, 2, 3, 0, 2, NULL, 28, '14', 0.00, 14, 200.00, 0, 0, 0, 0, 4, 0, 32.00, 3, 10.0, 63, 12, 5.25, '4/18', 6.30, 0, 7, 5, 51, '2019-05-24 13:24:42', '2019-05-28 13:40:41', 0),
(18, 2, 9, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:42', '2019-05-27 11:53:22', 0),
(19, 1, 10, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:42', '2019-05-27 14:19:52', 0),
(20, 2, 10, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:42', '2019-05-27 11:53:22', 0),
(21, 1, 11, 2, 3, 0, 2, NULL, 28, '14', 0.00, 12, 233.33, 0, 0, 0, 0, 4, 0, 32.00, 3, 12.0, 92, 3, 30.67, '1/28', 7.67, 0, 7, 4, 22, '2019-05-24 13:24:42', '2019-05-28 13:40:41', 0),
(22, 2, 11, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:42', '2019-05-27 11:53:22', 0),
(23, 1, 12, 1, 3, 2, 0, NULL, 14, '7', 7.00, 8, 350.00, 0, 0, 0, 0, 0, 2, 18.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:42', '2019-05-28 13:40:21', 0),
(24, 2, 12, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:42', '2019-05-27 12:07:44', 0),
(25, 1, 13, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:42', '2019-05-27 14:19:52', 0),
(26, 2, 13, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:43', '2019-05-27 11:53:22', 0),
(27, 1, 14, 1, 2, 2, 0, 2, 0, '0', 0.00, 4, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:43', '2019-05-27 12:07:44', 0),
(28, 2, 14, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:43', '2019-05-27 12:07:44', 0),
(29, 1, 15, 1, 2, 2, 0, 2, 0, '0', 0.00, 2, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:51', '2019-05-27 12:07:44', 0),
(30, 2, 15, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:51', '2019-05-27 12:07:44', 0),
(37, 1, 19, 4, 2, 2, 0, 2, 0, '0', 0.00, 2, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:52', '2019-05-27 12:07:44', 0),
(38, 2, 19, 4, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:52', '2019-05-27 12:07:44', 0),
(41, 1, 21, 2, 2, 2, 0, 2, 0, '0', 0.00, 2, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 2, 8.0, 78, 2, 39.00, '1/39', 9.75, 0, 4, 3, 16, '2019-05-24 13:24:52', '2019-05-27 14:24:30', 0),
(42, 2, 21, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:52', '2019-05-27 11:53:22', 0),
(43, 1, 22, 2, 2, 0, 2, NULL, 0, '0', 0.00, 14, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 2, 4.0, 38, 2, 19.00, '1/19', 9.50, 0, 7, 3, 33, '2019-05-24 13:24:52', '2019-05-27 14:23:39', 0),
(44, 2, 22, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:52', '2019-05-27 11:53:22', 0),
(45, 1, 23, 1, 2, 2, 0, NULL, 18, '9', 9.00, 8, 450.00, 0, 0, 0, 0, 0, 2, 22.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:52', '2019-05-27 12:30:45', 0),
(46, 2, 23, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:52', '2019-05-27 12:07:45', 0),
(49, 1, 25, 1, 2, 2, 0, NULL, 28, '14', 14.00, 46, 121.74, 0, 0, 0, 0, 0, 0, 28.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:53', '2019-05-27 12:30:45', 0),
(50, 2, 25, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:53', '2019-05-27 12:07:45', 0),
(51, 1, 26, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:53', '2019-05-27 12:07:45', 0),
(52, 2, 26, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:53', '2019-05-27 12:07:45', 0),
(53, 1, 27, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:53', '2019-05-27 14:19:52', 0),
(54, 2, 27, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:53', '2019-05-27 11:53:23', 0),
(55, 1, 28, 1, 2, 2, 0, NULL, 10, '5', 5.00, 20, 100.00, 0, 0, 0, 0, 0, 0, 10.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:53', '2019-05-27 12:30:45', 0),
(56, 2, 28, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:24:53', '2019-05-27 12:07:45', 0),
(57, 1, 29, 1, 1, 1, 0, NULL, 20, '20', 20.00, 23, 86.96, 0, 0, 0, 0, 1, 0, 21.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:04', '2019-05-28 13:40:37', 0),
(58, 2, 29, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:04', '2019-05-27 12:07:45', 0),
(59, 1, 30, 3, 1, 1, 0, 1, 0, '0', 0.00, 1, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 1, 4.0, 33, 0, 0.00, '0/0', 8.25, 0, 5, 2, 37, '2019-05-24 13:25:04', '2019-05-28 13:40:41', 0),
(60, 2, 30, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:04', '2019-05-27 11:53:23', 0),
(61, 1, 31, 3, 1, 1, 0, 1, 0, '0', 0.00, 1, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 1, 3.0, 33, 0, 0.00, '0/0', 11.00, 0, 0, 2, 44, '2019-05-24 13:25:04', '2019-05-28 13:40:41', 0),
(62, 2, 31, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:04', '2019-05-27 11:53:23', 0),
(63, 1, 32, 3, 1, 1, 0, 1, 0, '0', 0.00, 1, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 50, '2019-05-24 13:25:04', '2019-05-28 13:40:41', 0),
(64, 2, 32, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:04', '2019-05-27 11:53:23', 0),
(65, 1, 33, 4, 1, 1, 0, NULL, 62, '62', 62.00, 30, 206.67, 0, 1, 0, 0, 6, 3, 124.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:04', '2019-05-28 13:40:37', 0),
(66, 2, 33, 4, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:04', '2019-05-27 12:07:45', 0),
(67, 1, 34, 3, 1, 1, 0, NULL, 33, '33', 33.00, 26, 126.92, 0, 0, 0, 0, 3, 0, 36.00, 1, 3.0, 33, 0, 0.00, '0/0', 11.00, 0, 2, 0, 40, '2019-05-24 13:25:04', '2019-05-28 13:40:41', 0),
(68, 2, 34, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:04', '2019-05-27 11:53:23', 0),
(69, 1, 35, 3, 1, 0, 1, NULL, 13, '13', 0.00, 13, 100.00, 0, 0, 0, 0, 0, 1, 15.00, 1, 2.4, 32, 0, 0.00, '0/0', 13.33, 0, 5, 0, 32, '2019-05-24 13:25:04', '2019-06-10 12:27:29', 0),
(70, 2, 35, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:04', '2019-05-27 11:53:23', 0),
(71, 1, 36, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:04', '2019-05-27 14:19:52', 0),
(72, 2, 36, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:04', '2019-05-27 11:53:23', 0),
(73, 1, 37, 2, 1, 0, 1, NULL, 24, '24', 0.00, 22, 109.09, 0, 0, 0, 0, 0, 0, 24.00, 1, 4.0, 30, 0, 0.00, '0/0', 7.50, 0, 4, 0, 39, '2019-05-24 13:25:04', '2019-05-28 13:40:41', 0),
(74, 2, 37, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:04', '2019-05-27 11:53:23', 0),
(75, 1, 38, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:05', '2019-05-27 14:19:53', 0),
(76, 2, 38, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:05', '2019-05-27 11:53:23', 0),
(77, 1, 39, 1, 1, 1, 0, 1, 0, '0', 0.00, 1, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:05', '2019-05-28 13:40:20', 0),
(78, 2, 39, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:05', '2019-05-27 12:07:45', 0),
(79, 1, 40, 1, 1, 1, 0, 1, 0, '0', 0.00, 1, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:05', '2019-05-28 13:40:21', 0),
(80, 2, 40, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:05', '2019-05-27 12:07:45', 0),
(81, 1, 41, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:05', '2019-05-27 14:19:53', 0),
(82, 2, 41, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:05', '2019-05-27 11:53:24', 0),
(83, 1, 42, 1, 1, 1, 0, 1, 0, '0', 0.00, 1, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:05', '2019-05-28 13:40:21', 0),
(84, 2, 42, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:05', '2019-05-27 12:07:45', 0),
(85, 1, 43, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 12:07:45', 0),
(86, 2, 43, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 12:07:46', 0),
(87, 1, 44, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 14:19:53', 0),
(88, 2, 44, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 11:53:24', 0),
(89, 1, 45, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 14:19:53', 0),
(90, 2, 45, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 11:53:24', 0),
(91, 1, 46, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 12:07:46', 0),
(92, 2, 46, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 12:07:46', 0),
(93, 1, 47, 4, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 12:07:46', 0),
(94, 2, 47, 4, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 12:07:46', 0),
(95, 1, 48, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 14:19:53', 0),
(96, 2, 48, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 11:53:24', 0),
(97, 1, 49, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 14:19:53', 0),
(98, 2, 49, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 11:53:24', 0),
(99, 1, 50, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 14:19:53', 0),
(100, 2, 50, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 11:53:24', 0),
(101, 1, 51, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 14:19:53', 0),
(102, 2, 51, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 11:53:24', 0),
(103, 1, 52, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 14:19:53', 0),
(104, 2, 52, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:12', '2019-05-27 11:53:24', 0),
(105, 1, 53, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:13', '2019-05-27 12:07:46', 0),
(106, 2, 53, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:13', '2019-05-27 12:07:46', 0),
(107, 1, 54, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:13', '2019-05-27 12:07:46', 0),
(108, 2, 54, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:13', '2019-05-27 12:07:46', 0),
(109, 1, 55, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:13', '2019-05-27 12:07:46', 0),
(110, 2, 55, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:13', '2019-05-27 12:07:46', 0),
(111, 1, 56, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:13', '2019-05-27 12:07:46', 0),
(112, 2, 56, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:13', '2019-05-27 12:07:46', 0),
(113, 1, 57, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:21', '2019-05-27 12:07:46', 0),
(114, 2, 57, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:21', '2019-05-27 12:07:46', 0),
(115, 1, 58, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:21', '2019-05-27 14:19:53', 0),
(116, 2, 58, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:21', '2019-05-27 11:53:24', 0),
(117, 1, 59, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:21', '2019-05-27 14:19:53', 0),
(118, 2, 59, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:21', '2019-05-27 11:53:24', 0),
(119, 1, 60, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:21', '2019-05-27 14:19:53', 0),
(120, 2, 60, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:21', '2019-05-27 11:53:24', 0),
(121, 1, 61, 4, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:21', '2019-05-27 12:07:46', 0),
(122, 2, 61, 4, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:21', '2019-05-27 12:07:46', 0),
(123, 1, 62, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:21', '2019-05-27 14:19:53', 0),
(124, 2, 62, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:22', '2019-05-27 11:53:24', 0),
(125, 1, 63, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:22', '2019-05-27 14:19:53', 0),
(126, 2, 63, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:22', '2019-05-27 11:53:25', 0),
(129, 1, 65, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:22', '2019-05-27 14:19:53', 0),
(130, 2, 65, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:22', '2019-05-27 11:53:25', 0),
(131, 1, 66, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:22', '2019-05-27 14:19:53', 0),
(132, 2, 66, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:22', '2019-05-27 11:53:25', 0),
(133, 1, 67, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:22', '2019-05-27 12:07:46', 0),
(134, 2, 67, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:22', '2019-05-27 12:07:46', 0),
(135, 1, 68, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:22', '2019-05-27 12:07:46', 0),
(136, 2, 68, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:22', '2019-05-27 12:07:47', 0),
(137, 1, 69, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:22', '2019-05-27 14:19:53', 0),
(138, 2, 69, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:22', '2019-05-27 11:53:25', 0),
(139, 1, 70, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:22', '2019-05-27 12:07:47', 0),
(140, 2, 70, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:22', '2019-05-27 12:07:47', 0),
(141, 1, 71, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:30', '2019-05-27 12:07:47', 0),
(142, 2, 71, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:30', '2019-05-27 12:07:47', 0),
(143, 1, 72, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:30', '2019-05-27 14:19:53', 0),
(144, 2, 72, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:30', '2019-05-27 11:53:25', 0),
(145, 1, 73, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:30', '2019-05-27 14:19:53', 0),
(146, 2, 73, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:30', '2019-05-27 11:53:25', 0),
(147, 1, 74, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:30', '2019-05-27 12:07:47', 0),
(148, 2, 74, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:30', '2019-05-27 12:07:47', 0),
(149, 1, 75, 4, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:30', '2019-05-27 12:07:47', 0),
(150, 2, 75, 4, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:30', '2019-05-27 12:07:47', 0),
(151, 1, 76, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:30', '2019-05-27 14:19:53', 0),
(152, 2, 76, 3, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:30', '2019-05-27 11:53:25', 0),
(155, 1, 78, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:31', '2019-05-27 14:19:54', 0),
(156, 2, 78, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:31', '2019-05-27 11:53:25', 0),
(157, 1, 79, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:31', '2019-05-27 14:19:54', 0),
(158, 2, 79, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:31', '2019-05-27 11:53:25', 0),
(159, 1, 80, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:31', '2019-05-27 14:19:54', 0),
(160, 2, 80, 2, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:31', '2019-05-27 11:53:25', 0),
(161, 1, 81, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:31', '2019-05-27 12:07:47', 0),
(162, 2, 81, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:31', '2019-05-27 12:07:47', 0),
(163, 1, 82, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:31', '2019-05-27 12:07:47', 0),
(164, 2, 82, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:31', '2019-05-27 12:07:47', 0),
(165, 1, 83, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:31', '2019-05-27 12:07:47', 0),
(166, 2, 83, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:31', '2019-05-27 12:07:47', 0),
(167, 1, 84, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:31', '2019-05-27 12:07:47', 0),
(168, 2, 84, 1, 0, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, 0, '2019-05-24 13:25:31', '2019-05-27 12:07:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 'SuperAdmin', '{\"create\":true,\"read\":true,\"update\":true,\"delete\":true}', '2018-11-01 09:34:24', '2018-11-03 12:35:46', 0),
(2, 'Admin', '{\"create\":true,\"read\":true,\"update\":true}', '2018-11-01 09:34:24', '2018-11-03 12:37:27', 0),
(3, 'Editor', '{\"read\":true,\"update\":true}', '2018-11-01 09:34:42', '2018-11-03 12:37:49', 0),
(4, 'Author', '{\"create\":true,\"read\":true}', '2018-11-01 09:34:42', '2018-11-03 12:38:04', 0),
(5, 'Subscriber', '{\"read\":true}', '2018-11-01 09:44:31', '2018-11-03 12:38:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, '2018-11-03 12:40:14', '2018-11-03 12:40:14', 0),
(2, 2, '2018-11-03 12:40:14', '2018-11-03 12:40:14', 0),
(3, 3, '2018-11-03 12:40:27', '2018-11-03 12:40:27', 0),
(4, 4, '2018-11-03 12:40:27', '2018-11-03 12:40:27', 0),
(5, 5, '2018-11-03 12:40:34', '2018-11-03 12:40:34', 0),
(6, 1, '2018-11-03 12:43:02', '2019-03-18 15:25:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roundrobin_tournament`
--

CREATE TABLE `roundrobin_tournament` (
  `id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `refer_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `total_matches` int(11) NOT NULL DEFAULT '0',
  `win_matches` int(11) NOT NULL DEFAULT '0',
  `loss_matches` int(11) NOT NULL DEFAULT '0',
  `tie_matches` int(11) NOT NULL DEFAULT '0',
  `points_matches` int(11) NOT NULL DEFAULT '0',
  `rr_matches` float(100,4) NOT NULL DEFAULT '0.0000',
  `active_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roundrobin_tournament`
--

INSERT INTO `roundrobin_tournament` (`id`, `tournament_id`, `refer_id`, `club_id`, `total_matches`, `win_matches`, `loss_matches`, `tie_matches`, `points_matches`, `rr_matches`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2, 2, 0, 0, 4, 2.0715, 0, '2019-05-24 18:59:21', '2019-05-29 15:42:14'),
(2, 1, 1, 2, 1, 0, 1, 0, 0, -2.0323, 0, '2019-05-24 18:59:21', '2019-05-24 21:06:52'),
(3, 1, 1, 3, 1, 0, 1, 0, 0, -2.1110, 0, '2019-05-24 18:59:21', '2019-05-28 13:40:22'),
(4, 1, 1, 4, 0, 0, 0, 0, 0, 0.0000, 0, '2019-05-24 18:59:22', '2019-05-24 18:59:22'),
(5, 1, 1, 5, 0, 0, 0, 0, 0, 0.0000, 0, '2019-05-24 18:59:22', '2019-05-24 18:59:22'),
(6, 1, 1, 6, 0, 0, 0, 0, 0, 0.0000, 0, '2019-05-24 18:59:22', '2019-05-24 18:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `scorecards`
--

CREATE TABLE `scorecards` (
  `id` int(10) UNSIGNED NOT NULL,
  `match_id` int(11) NOT NULL,
  `ball_score` int(11) NOT NULL,
  `bat_score` int(11) NOT NULL,
  `extra` int(11) NOT NULL,
  `innings` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_id_1` int(11) NOT NULL,
  `club_id_2` int(11) DEFAULT NULL,
  `series_type_id` int(11) DEFAULT NULL,
  `series_days` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ground_id` int(11) NOT NULL,
  `time` varchar(121) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `series_batsmen_scores`
--

CREATE TABLE `series_batsmen_scores` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `inning_no` int(11) NOT NULL,
  `batsmen_id` int(11) NOT NULL,
  `out_how` varchar(11) DEFAULT NULL,
  `out_by` int(11) DEFAULT NULL,
  `runs` int(11) DEFAULT NULL,
  `balls` int(11) DEFAULT NULL,
  `dots` int(11) DEFAULT NULL,
  `ones` int(11) DEFAULT NULL,
  `twos` int(11) DEFAULT NULL,
  `threes` int(11) DEFAULT NULL,
  `fours` int(11) DEFAULT NULL,
  `sixes` int(11) DEFAULT NULL,
  `checknotout` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0',
  `refer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `series_bowler_scores`
--

CREATE TABLE `series_bowler_scores` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `inning_no` int(11) NOT NULL,
  `bowler_id` int(11) NOT NULL,
  `overs` float(100,1) DEFAULT NULL,
  `balls` int(11) DEFAULT NULL,
  `maidens` int(11) DEFAULT NULL,
  `runs` int(11) DEFAULT NULL,
  `wickets` int(11) DEFAULT NULL,
  `economy` float(100,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0',
  `refer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `series_extras`
--

CREATE TABLE `series_extras` (
  `id` int(10) UNSIGNED NOT NULL,
  `match_id` int(11) NOT NULL,
  `inning_no` int(11) NOT NULL,
  `no_balls` int(11) DEFAULT NULL,
  `wides` int(11) DEFAULT NULL,
  `byes` int(11) DEFAULT NULL,
  `leg_byes` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0',
  `refer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `series_fixtures`
--

CREATE TABLE `series_fixtures` (
  `id` int(11) NOT NULL,
  `refer_id` int(11) DEFAULT NULL,
  `club_id_1` int(11) DEFAULT NULL,
  `club_id_2` int(11) DEFAULT NULL,
  `name` text NOT NULL,
  `series_type_id` int(11) NOT NULL,
  `starting_date` date NOT NULL,
  `series_days` int(11) NOT NULL,
  `ground_id` int(11) NOT NULL,
  `time` text,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `series_innings_score`
--

CREATE TABLE `series_innings_score` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `inning_no` int(11) NOT NULL,
  `club_id` int(11) DEFAULT NULL,
  `runs` int(11) NOT NULL,
  `wickets` int(11) NOT NULL,
  `overs` float(10,1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0',
  `refer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `series_lineups`
--

CREATE TABLE `series_lineups` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `innings_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `series_matches`
--

CREATE TABLE `series_matches` (
  `id` int(11) NOT NULL,
  `fixture_id` int(11) DEFAULT NULL,
  `club_id_1` int(11) NOT NULL,
  `club_id_2` int(11) NOT NULL,
  `ground_id` int(11) NOT NULL,
  `mom_player_id` int(11) NOT NULL DEFAULT '0',
  `umpire_id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `starting_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `winner_club_id` int(11) NOT NULL DEFAULT '0',
  `series_type_id` int(11) NOT NULL,
  `toss` int(11) NOT NULL DEFAULT '0',
  `choose_to` int(11) NOT NULL,
  `result` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0',
  `refer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams_ranking_o_ds`
--

CREATE TABLE `teams_ranking_o_ds` (
  `id` int(10) UNSIGNED NOT NULL,
  `club_id` int(11) DEFAULT NULL,
  `points` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams_ranking_t20s`
--

CREATE TABLE `teams_ranking_t20s` (
  `id` int(10) UNSIGNED NOT NULL,
  `club_id` int(11) NOT NULL,
  `points` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams_stats`
--

CREATE TABLE `teams_stats` (
  `id` int(11) NOT NULL,
  `club_id` int(11) DEFAULT NULL,
  `matches` int(11) DEFAULT '0',
  `win` int(11) DEFAULT '0',
  `loss` int(11) DEFAULT '0',
  `nr` int(11) DEFAULT '0',
  `points` int(11) DEFAULT '0',
  `nrr` float(100,2) DEFAULT '0.00',
  `total_runs_scored` int(11) DEFAULT '0',
  `total_overs_faced` float(100,1) DEFAULT '0.0',
  `total_runs_conceded` int(11) DEFAULT '0',
  `total_overs_bowled` float(100,1) DEFAULT '0.0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams_stats`
--

INSERT INTO `teams_stats` (`id`, `club_id`, `matches`, `win`, `loss`, `nr`, `points`, `nrr`, `total_runs_scored`, `total_overs_faced`, `total_runs_conceded`, `total_overs_bowled`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 0, 0, 4, 2.09, 370, 36.4, 307, 38.0, '2019-04-24 17:57:32', '2019-05-28 13:40:22'),
(2, 2, 1, 0, 1, 0, -2, -2.03, 148, 18.0, 205, 20.0, '2019-04-24 17:57:32', '2019-05-27 12:34:01'),
(3, 3, 1, 0, 1, 0, -2, -2.11, 159, 20.0, 165, 16.4, '2019-04-24 17:57:37', '2019-06-10 12:27:59'),
(4, 4, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0.0, '2019-04-24 18:01:47', '2019-04-24 18:01:47'),
(5, 5, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0.0, '2019-04-24 18:01:59', '2019-04-24 18:01:59'),
(6, 6, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0.0, '2019-04-24 18:02:09', '2019-04-24 18:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `created_at`, `updated_at`, `photo_id`, `active_status`) VALUES
(1, 'PSL', '2019-05-24 13:27:46', '2019-05-24 13:27:46', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments_references`
--

CREATE TABLE `tournaments_references` (
  `id` int(10) UNSIGNED NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `edition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tournament_type_id` int(11) NOT NULL,
  `tournament_format_id` int(11) NOT NULL,
  `ground_id` int(11) NOT NULL,
  `number_of_teams` int(11) NOT NULL,
  `rounds` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `winner_club_id` int(11) DEFAULT NULL,
  `starting_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ending_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments_references`
--

INSERT INTO `tournaments_references` (`id`, `tournament_id`, `photo_id`, `edition`, `tournament_type_id`, `tournament_format_id`, `ground_id`, `number_of_teams`, `rounds`, `status`, `winner_club_id`, `starting_date`, `ending_date`, `time`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, 4, '2019', 1, 1, 1, 6, NULL, 1, NULL, '2019-05-24', NULL, NULL, '2019-05-24 13:59:07', '2019-05-24 13:59:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tournament_clubs`
--

CREATE TABLE `tournament_clubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `tournament_id` int(11) DEFAULT NULL,
  `club_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournament_clubs`
--

INSERT INTO `tournament_clubs` (`id`, `tournament_id`, `club_id`, `refer_id`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]', 1, '2019-05-24 18:59:21', '2019-05-24 18:59:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tournament_formats`
--

CREATE TABLE `tournament_formats` (
  `id` int(10) UNSIGNED NOT NULL,
  `format_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournament_formats`
--

INSERT INTO `tournament_formats` (`id`, `format_name`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 'Round Robin', '2018-10-27 14:38:54', '2018-10-27 14:38:54', 0),
(2, 'Knockout', '2018-10-27 14:38:54', '2018-10-27 14:38:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `umpires`
--

CREATE TABLE `umpires` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `umpires`
--

INSERT INTO `umpires` (`id`, `name`, `photo_id`, `nationality`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'Aleem Dar', NULL, 'Pakistani', 0, '2019-04-24 09:19:52', '2019-04-24 09:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'superadmin@ecric.com', '$2y$10$MQ4OVGWkuY3oxAK0rKIGQ.nE3lNfAI8zO/3EWXxbUeGaZzlTtdqTS', 'Egzcdr8Q7SDbMO9yYGomlc5OI6kENrxnQN1JwzUSn97naHkAi2CgkQ4utRLY', '2018-09-27 14:37:15', '2019-02-14 09:04:52'),
(2, 'Admin', 'admin@ecric.com', '$2y$10$LO6188QPzudWMIJegxfV2uxQ6rH7znOKUASGvxkYDNDXe8Knqqf9S', '7JUNdvjwwDm8m2LoV4FDnkaySX03fvYuHBpOvuyp9xWwiS6FNPvc955IRViJ', '2018-11-01 05:02:34', '2019-01-07 17:23:05'),
(3, 'Editor', 'editor@ecric.com', '$2y$10$LO6188QPzudWMIJegxfV2uxQ6rH7znOKUASGvxkYDNDXe8Knqqf9S', NULL, '2018-11-01 16:44:55', '2018-11-01 22:10:23'),
(4, 'Author', 'author@ecric.com', '$2y$10$LO6188QPzudWMIJegxfV2uxQ6rH7znOKUASGvxkYDNDXe8Knqqf9S', 'VoyfCJ7TuJqipN7JPMJUQGOPFNEwcNbZ68Fwrm9XYwAP0B0YzlyoYWvoexQ2', '2018-11-01 16:45:16', '2018-11-03 09:34:44'),
(5, 'Subscriber', 'subscriber@ecric.com', '$2y$10$LO6188QPzudWMIJegxfV2uxQ6rH7znOKUASGvxkYDNDXe8Knqqf9S', 'mOWRDGGPVXF3p4xJ5EeqH375mmUI9oKfUTbEnhk9fJZQrYNkNhQcti4fQ7kR', '2018-11-01 16:45:40', '2019-04-22 11:05:33'),
(6, 'Zohaib Faruqui', 'zohaibfaruqui@gmail.com', '$2y$10$Nlc3QJGAtbjHxFSgb1Oqn.lVxx8rN91UCgrOFZ6lenVlycSrakpA6', 'rBIWWyoqcaeTnMlm4U2nVGPnaZ8XCjhs1vdjGij24qacStPKk28HsVeJgm7L', '2018-11-03 07:43:02', '2019-05-27 15:34:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balls`
--
ALTER TABLE `balls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ball_overs`
--
ALTER TABLE `ball_overs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batsmen_scores`
--
ALTER TABLE `batsmen_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batting_styles`
--
ALTER TABLE `batting_styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bowler_scores`
--
ALTER TABLE `bowler_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bowling_styles`
--
ALTER TABLE `bowling_styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checknotout`
--
ALTER TABLE `checknotout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_id` (`match_id`),
  ADD KEY `inning_no` (`inning_no`);

--
-- Indexes for table `check_users`
--
ALTER TABLE `check_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fall_of_wickets`
--
ALTER TABLE `fall_of_wickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixtures`
--
ALTER TABLE `fixtures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refer_id` (`refer_id`),
  ADD KEY `club_id_1` (`club_id_1`),
  ADD KEY `club_id_2` (`club_id_2`),
  ADD KEY `ground_id` (`ground_id`),
  ADD KEY `tournament_id` (`tournament_id`);

--
-- Indexes for table `grounds`
--
ALTER TABLE `grounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `innings_score`
--
ALTER TABLE `innings_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lineups`
--
ALTER TABLE `lineups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_types`
--
ALTER TABLE `match_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outs`
--
ALTER TABLE `outs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overs`
--
ALTER TABLE `overs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pitches`
--
ALTER TABLE `pitches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players_ranking_o_ds`
--
ALTER TABLE `players_ranking_o_ds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players_ranking_t20s`
--
ALTER TABLE `players_ranking_t20s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_roles`
--
ALTER TABLE `player_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_stats`
--
ALTER TABLE `player_stats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD UNIQUE KEY `role_users_user_id_role_id_unique` (`user_id`,`role_id`);

--
-- Indexes for table `roundrobin_tournament`
--
ALTER TABLE `roundrobin_tournament`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tournament_id` (`tournament_id`),
  ADD KEY `refer_id` (`refer_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `scorecards`
--
ALTER TABLE `scorecards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `series_type_id` (`series_type_id`),
  ADD KEY `ground_type_id` (`ground_id`);

--
-- Indexes for table `series_batsmen_scores`
--
ALTER TABLE `series_batsmen_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series_bowler_scores`
--
ALTER TABLE `series_bowler_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series_extras`
--
ALTER TABLE `series_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series_fixtures`
--
ALTER TABLE `series_fixtures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refer_id` (`refer_id`),
  ADD KEY `club_id_1` (`club_id_1`),
  ADD KEY `club_id_2` (`club_id_2`);

--
-- Indexes for table `series_innings_score`
--
ALTER TABLE `series_innings_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series_lineups`
--
ALTER TABLE `series_lineups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series_matches`
--
ALTER TABLE `series_matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams_ranking_o_ds`
--
ALTER TABLE `teams_ranking_o_ds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams_ranking_t20s`
--
ALTER TABLE `teams_ranking_t20s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams_stats`
--
ALTER TABLE `teams_stats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments_references`
--
ALTER TABLE `tournaments_references`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tournament_id` (`tournament_id`),
  ADD KEY `photo_id` (`photo_id`),
  ADD KEY `tournament_type_id` (`tournament_type_id`),
  ADD KEY `tournament_format_id` (`tournament_format_id`),
  ADD KEY `winner_club_id` (`winner_club_id`);

--
-- Indexes for table `tournament_clubs`
--
ALTER TABLE `tournament_clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournament_formats`
--
ALTER TABLE `tournament_formats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `umpires`
--
ALTER TABLE `umpires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balls`
--
ALTER TABLE `balls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ball_overs`
--
ALTER TABLE `ball_overs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batsmen_scores`
--
ALTER TABLE `batsmen_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `batting_styles`
--
ALTER TABLE `batting_styles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bowler_scores`
--
ALTER TABLE `bowler_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `bowling_styles`
--
ALTER TABLE `bowling_styles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `checknotout`
--
ALTER TABLE `checknotout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `check_users`
--
ALTER TABLE `check_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fall_of_wickets`
--
ALTER TABLE `fall_of_wickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fixtures`
--
ALTER TABLE `fixtures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `grounds`
--
ALTER TABLE `grounds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `innings_score`
--
ALTER TABLE `innings_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lineups`
--
ALTER TABLE `lineups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `match_types`
--
ALTER TABLE `match_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `outs`
--
ALTER TABLE `outs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `overs`
--
ALTER TABLE `overs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pitches`
--
ALTER TABLE `pitches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `players_ranking_o_ds`
--
ALTER TABLE `players_ranking_o_ds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players_ranking_t20s`
--
ALTER TABLE `players_ranking_t20s`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `player_roles`
--
ALTER TABLE `player_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `player_stats`
--
ALTER TABLE `player_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roundrobin_tournament`
--
ALTER TABLE `roundrobin_tournament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `scorecards`
--
ALTER TABLE `scorecards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `series_batsmen_scores`
--
ALTER TABLE `series_batsmen_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `series_bowler_scores`
--
ALTER TABLE `series_bowler_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `series_extras`
--
ALTER TABLE `series_extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `series_fixtures`
--
ALTER TABLE `series_fixtures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `series_innings_score`
--
ALTER TABLE `series_innings_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `series_lineups`
--
ALTER TABLE `series_lineups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `series_matches`
--
ALTER TABLE `series_matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams_ranking_o_ds`
--
ALTER TABLE `teams_ranking_o_ds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams_ranking_t20s`
--
ALTER TABLE `teams_ranking_t20s`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams_stats`
--
ALTER TABLE `teams_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tournaments_references`
--
ALTER TABLE `tournaments_references`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tournament_clubs`
--
ALTER TABLE `tournament_clubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tournament_formats`
--
ALTER TABLE `tournament_formats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `umpires`
--
ALTER TABLE `umpires`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
