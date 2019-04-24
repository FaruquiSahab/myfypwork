-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 09:26 PM
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

INSERT INTO `batsmen_scores` (`id`, `match_id`, `inning_no`, `batsmen_id`, `out_how`, `out_by`, `runs`, `balls`, `dots`, `ones`, `twos`, `threes`, `fours`, `sixes`, `checknotout`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, 1, 15, 'b', 9, 100, 51, 12, 17, 7, 1, 9, 5, 0, '2019-04-24 09:41:37', '2019-04-24 17:07:22', 0),
(2, 1, 1, 16, 'b', 3, 6, 12, 11, 0, 0, 0, 0, 1, 0, '2019-04-24 09:41:37', '2019-04-24 16:39:04', 0),
(3, 1, 1, 17, 'nt', NULL, 84, 45, 12, 12, 10, 0, 7, 4, 1, '2019-04-24 09:41:37', '2019-04-24 16:45:49', 0),
(4, 1, 1, 18, 'nt', NULL, 47, 12, 0, 0, 2, 5, 1, 4, 1, '2019-04-24 09:41:37', '2019-04-24 16:46:22', 0),
(5, 1, 1, 19, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 09:41:37', '2019-04-24 16:45:25', 0),
(6, 1, 1, 20, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 09:41:38', '2019-04-24 16:45:26', 0),
(7, 1, 1, 21, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 09:41:38', '2019-04-24 16:45:27', 0),
(8, 1, 1, 22, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 09:41:38', '2019-04-24 16:45:27', 0),
(9, 1, 1, 23, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 09:41:38', '2019-04-24 16:45:28', 0),
(10, 1, 1, 24, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 09:41:38', '2019-04-24 16:45:29', 0),
(11, 1, 1, 27, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 09:41:38', '2019-04-24 16:45:29', 0),
(12, 1, 2, 1, 'nt', NULL, 101, 57, 10, 21, 17, 0, 4, 5, 1, '2019-04-24 12:07:53', '2019-04-24 17:31:41', 0),
(13, 1, 2, 2, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 12:07:54', '2019-04-24 17:33:22', 0),
(14, 1, 2, 3, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 12:07:54', '2019-04-24 17:33:22', 0),
(15, 1, 2, 4, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 12:07:54', '2019-04-24 17:33:23', 0),
(16, 1, 2, 5, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 12:07:54', '2019-04-24 17:33:24', 0),
(17, 1, 2, 6, 'nt', NULL, 137, 63, 13, 14, 12, 7, 12, 5, 1, '2019-04-24 12:07:54', '2019-04-24 17:32:44', 0),
(18, 1, 2, 7, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 12:07:54', '2019-04-24 17:33:16', 0),
(19, 1, 2, 8, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 12:07:54', '2019-04-24 17:33:15', 0),
(20, 1, 2, 9, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 12:07:54', '2019-04-24 17:33:09', 0),
(21, 1, 2, 10, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 12:07:54', '2019-04-24 17:33:08', 0),
(22, 1, 2, 12, 'dnb', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 12:07:54', '2019-04-24 17:33:08', 0);

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

INSERT INTO `bowler_scores` (`id`, `match_id`, `inning_no`, `bowler_id`, `overs`, `balls`, `maidens`, `runs`, `wickets`, `economy`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, 2, 3, 4.0, 24, 0, 51, 1, 12.75, '2019-04-24 09:41:38', '2019-04-24 11:47:11', 0),
(2, 1, 2, 7, 4.0, 24, 0, 34, 0, 8.50, '2019-04-24 09:41:38', '2019-04-24 11:47:21', 0),
(3, 1, 2, 8, 4.0, 24, 0, 57, 0, 14.25, '2019-04-24 09:41:38', '2019-04-24 11:47:30', 0),
(4, 1, 2, 9, 4.0, 24, 0, 24, 1, 6.00, '2019-04-24 09:41:38', '2019-04-24 12:07:38', 0),
(5, 1, 2, 10, 4.0, 24, 0, 71, 0, 17.75, '2019-04-24 09:41:38', '2019-04-24 11:48:07', 0),
(6, 1, 1, 16, 3.0, 18, 0, 23, 0, 7.67, '2019-04-24 12:07:54', '2019-04-24 12:35:26', 0),
(7, 1, 1, 17, 3.0, 18, 0, 50, 0, 16.67, '2019-04-24 12:07:54', '2019-04-24 12:36:53', 0),
(8, 1, 1, 18, 3.0, 18, 0, 47, 0, 15.67, '2019-04-24 12:07:54', '2019-04-24 12:36:35', 0),
(9, 1, 1, 21, 2.0, 12, 0, 37, 0, 18.50, '2019-04-24 12:07:54', '2019-04-24 12:36:18', 0),
(10, 1, 1, 22, 4.0, 24, 0, 48, 0, 12.00, '2019-04-24 12:07:54', '2019-04-24 12:35:07', 0),
(11, 1, 1, 24, 3.0, 18, 0, 15, 0, 5.00, '2019-04-24 12:07:54', '2019-04-24 12:36:00', 0),
(12, 1, 1, 27, 2.0, 12, 0, 18, 0, 9.00, '2019-04-24 12:07:55', '2019-04-24 12:36:42', 0);

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

INSERT INTO `extras` (`id`, `match_id`, `inning_no`, `no_balls`, `wides`, `byes`, `leg_byes`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, 1, 0, 0, 0, 0, '2019-04-24 09:41:38', '2019-04-24 11:48:29', 0),
(2, 1, 2, 0, 0, 0, 0, '2019-04-24 12:07:55', '2019-04-24 12:37:04', 0);

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
  `club_id_1` int(11) NOT NULL,
  `club_id_2` int(11) DEFAULT NULL,
  `match_date` date DEFAULT NULL,
  `match_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ground_id` int(11) DEFAULT NULL,
  `tournament_id` int(11) DEFAULT NULL,
  `refer_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`id`, `club_id_1`, `club_id_2`, `match_date`, `match_time`, `ground_id`, `tournament_id`, `refer_id`, `status`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, 2, '2019-04-24', '10 AM', 1, 1, 1, 1, '2019-04-23 16:14:11', '2019-04-24 09:23:49', 0),
(2, 1, 3, '2019-04-28', '10 AM', 1, 1, 1, 0, '2019-04-23 16:14:11', '2019-04-23 16:14:11', 0),
(3, 1, 4, '2019-04-30', '10 AM', 1, 1, 1, 0, '2019-04-23 16:14:12', '2019-04-23 16:14:12', 0),
(4, 2, 1, '2019-05-02', '10 AM', 1, 1, 1, 0, '2019-04-23 16:14:12', '2019-04-23 16:14:12', 0),
(5, 2, 3, '2019-05-04', '10 AM', 1, 1, 1, 0, '2019-04-23 16:14:12', '2019-04-23 16:14:12', 0),
(6, 2, 4, '2019-05-06', '10 AM', 1, 1, 1, 0, '2019-04-23 16:14:12', '2019-04-23 16:14:12', 0),
(7, 3, 1, '2019-05-08', '10 AM', 1, 1, 1, 0, '2019-04-23 16:14:12', '2019-04-23 16:14:12', 0),
(8, 3, 2, '2019-05-10', '10 AM', 1, 1, 1, 0, '2019-04-23 16:14:12', '2019-04-23 16:14:12', 0),
(9, 3, 4, '2019-05-12', '10 AM', 1, 1, 1, 0, '2019-04-23 16:14:12', '2019-04-23 16:14:12', 0),
(10, 4, 1, '2019-05-14', '10 AM', 1, 1, 1, 0, '2019-04-23 16:14:12', '2019-04-23 16:14:12', 0),
(11, 4, 2, '2019-05-16', '10 AM', 1, 1, 1, 0, '2019-04-23 16:14:12', '2019-04-23 16:14:12', 0),
(12, 4, 3, '2019-05-18', '10 AM', 1, 1, 1, 0, '2019-04-23 16:14:12', '2019-04-23 16:14:12', 0);

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
(1, 'Sheikh Zayid Stadium', '2019-04-23 13:45:08', '2019-04-23 13:45:08', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `innings_score`
--

CREATE TABLE `innings_score` (
  `id` int(11) NOT NULL,
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

INSERT INTO `innings_score` (`id`, `match_id`, `inning_no`, `club_id`, `runs`, `wickets`, `overs`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, 1, 2, 237, 2, 20.0, '2019-04-24 12:07:53', '2019-04-24 12:07:53', 0),
(2, 1, 2, 1, 238, 0, 20.0, '2019-04-24 12:37:12', '2019-04-24 12:37:12', 0);

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
(1, 1, 1, 1, 2, 0),
(2, 1, 2, 1, 2, 0),
(3, 1, 3, 1, 2, 0),
(4, 1, 4, 1, 2, 0),
(5, 1, 5, 1, 2, 0),
(6, 1, 6, 1, 2, 0),
(7, 1, 7, 1, 2, 0),
(8, 1, 8, 1, 2, 0),
(9, 1, 9, 1, 2, 0),
(10, 1, 10, 1, 2, 0),
(11, 1, 12, 1, 2, 0),
(12, 1, 15, 2, 1, 0),
(13, 1, 16, 2, 1, 0),
(14, 1, 17, 2, 1, 0),
(15, 1, 18, 2, 1, 0),
(16, 1, 19, 2, 1, 0),
(17, 1, 20, 2, 1, 0),
(18, 1, 21, 2, 1, 0),
(19, 1, 22, 2, 1, 0),
(20, 1, 23, 2, 1, 0),
(21, 1, 24, 2, 1, 0),
(22, 1, 27, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(10) UNSIGNED NOT NULL,
  `fixture_id` int(11) DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `fixture_id`, `club_id_1`, `club_id_2`, `ground_id`, `pitch_id`, `mom_player_id`, `umpire_id`, `tournament_id`, `match_date`, `status`, `winner_club_id`, `match_type_id`, `toss`, `choose_to`, `result`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, 1, 2, 1, NULL, 0, 1, 1, '2019-04-24', 2, 1, 1, 1, '2', '\"Karachi Kings\" Won By 10 Wickets', NULL, '2019-04-24 13:14:13', 0);

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
(1, '1556045964Jellyfish.jpg', '2019-04-23 13:59:24', '2019-04-23 13:59:24', 0),
(2, '1556054036Koala.jpg', '2019-04-23 16:13:56', '2019-04-23 16:13:56', 0),
(3, '1556117613myImage.jpg', '2019-04-24 09:53:33', '2019-04-24 09:53:33', 0);

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
(1, 39, 'Sikandar Raza', '1981-04-21', 1, 1, '2019-04-23 15:21:10', '2019-04-23 15:21:10', NULL, 2, 7, 38, 0),
(2, 51, 'Awais Zia', '1987-03-05', 1, 1, '2019-04-23 15:21:10', '2019-04-23 15:21:10', NULL, 1, 5, 32, 0),
(3, 8, 'Imad Wasim', '1988-04-17', 1, 3, '2019-04-23 15:21:10', '2019-04-23 15:21:10', NULL, 2, 7, 31, 0),
(4, 18, 'Colin Munro', '1988-04-17', 1, 1, '2019-04-23 15:21:10', '2019-04-23 15:21:10', NULL, 1, 2, 31, 0),
(5, 26, 'Mohammad Rizwan', '1988-04-17', 1, 4, '2019-04-23 15:21:10', '2019-04-23 15:21:10', NULL, 1, 5, 31, 0),
(6, 96, 'Babar Azam', '1988-04-17', 1, 1, '2019-04-23 15:21:10', '2019-04-23 15:21:10', NULL, 1, 5, 31, 0),
(7, 17, 'Osama Mir', '1988-04-17', 1, 3, '2019-04-23 15:21:10', '2019-04-23 15:21:10', NULL, 1, 6, 31, 0),
(8, 33, 'Aamer Yamin', '1988-04-17', 1, 3, '2019-04-23 15:21:10', '2019-04-23 15:21:10', NULL, 2, 4, 31, 0),
(9, 5, 'Muhammad Aamir', '1988-04-17', 1, 2, '2019-04-23 15:21:10', '2019-04-23 15:21:10', NULL, 2, 3, 31, 0),
(10, 83, 'Sohail Khan', '1988-04-17', 1, 2, '2019-04-23 15:21:10', '2019-04-23 15:21:10', NULL, 2, 3, 31, 0),
(11, 36, 'Usman Khan', '1988-04-17', 1, 2, '2019-04-23 15:21:10', '2019-04-23 15:21:10', NULL, 2, 3, 31, 0),
(12, 88, 'Colin Ingram', '1988-04-17', 1, 1, '2019-04-23 15:21:10', '2019-04-23 15:21:10', NULL, 2, 7, 31, 0),
(13, 73, 'Ravi Bopara', '1988-04-17', 1, 3, '2019-04-23 15:21:10', '2019-04-23 15:21:10', NULL, 1, 1, 31, 0),
(14, 51, 'Liam Livingstone', '1988-04-17', 1, 1, '2019-04-23 15:21:10', '2019-04-23 15:21:10', NULL, 2, 7, 31, 0),
(15, 39, 'AB De Villiers', '1981-04-21', 2, 1, '2019-04-23 15:30:28', '2019-04-23 15:30:28', NULL, 1, 7, 38, 0),
(16, 51, 'Muhammad Hafeez', '1987-03-05', 2, 3, '2019-04-23 15:30:28', '2019-04-23 15:30:28', NULL, 1, 5, 32, 0),
(17, 8, 'Carlos Braithwaite', '1988-04-17', 2, 3, '2019-04-23 15:30:28', '2019-04-23 15:30:28', NULL, 2, 5, 31, 0),
(18, 18, 'Corey Anderson', '1988-04-17', 2, 3, '2019-04-23 15:30:28', '2019-04-23 15:30:28', NULL, 1, 2, 31, 0),
(19, 26, 'Agha Salman', '1988-04-17', 2, 4, '2019-04-23 15:30:28', '2019-04-23 15:30:28', NULL, 1, 5, 31, 0),
(20, 96, 'Haris Sohail', '1988-04-17', 2, 1, '2019-04-23 15:30:28', '2019-04-23 15:30:28', NULL, 1, 5, 31, 0),
(21, 17, 'Sandeep Lamichhane', '1988-04-17', 2, 2, '2019-04-23 15:30:28', '2019-04-23 15:30:28', NULL, 1, 6, 31, 0),
(22, 33, 'Harris Rauf', '1988-04-17', 2, 2, '2019-04-23 15:30:28', '2019-04-23 15:30:28', NULL, 2, 4, 31, 0),
(23, 5, 'Fakhar Zaman', '1988-04-17', 2, 1, '2019-04-23 15:30:28', '2019-04-23 15:30:28', NULL, 2, 3, 31, 0),
(24, 83, 'Sohail Khan', '1988-04-17', 2, 2, '2019-04-23 15:30:28', '2019-04-23 15:30:28', NULL, 2, 3, 31, 0),
(25, 36, 'Anton Devcich', '1988-04-17', 2, 1, '2019-04-23 15:30:28', '2019-04-23 15:30:28', NULL, 2, 3, 31, 0),
(26, 88, 'Sohail Akhtar', '1988-04-17', 2, 1, '2019-04-23 15:30:28', '2019-04-23 15:30:28', NULL, 2, 7, 31, 0),
(27, 73, 'Shaheen Shah Afridi', '1988-04-17', 2, 2, '2019-04-23 15:30:28', '2019-04-23 15:30:28', NULL, 1, 1, 31, 0),
(28, 51, 'Mohammad Imran', '1988-04-17', 2, 1, '2019-04-23 15:30:29', '2019-04-23 15:30:29', NULL, 2, 7, 31, 0),
(29, 39, 'RILEE ROSSOUW', '1981-04-21', 5, 1, '2019-04-23 15:39:04', '2019-04-23 15:39:04', NULL, 1, 7, 38, 0),
(30, 51, 'SHANE WATSON', '1987-03-05', 5, 3, '2019-04-23 15:39:04', '2019-04-23 15:39:04', NULL, 1, 2, 32, 0),
(31, 8, 'ANWAR ALI', '1988-04-17', 5, 3, '2019-04-23 15:39:04', '2019-04-23 15:39:04', NULL, 2, 2, 31, 0),
(32, 18, 'SAUD SHAKEEL', '1988-04-17', 5, 3, '2019-04-23 15:39:04', '2019-04-23 15:39:04', NULL, 1, 5, 31, 0),
(33, 26, 'SARFRAZ AHMED', '1988-04-17', 5, 4, '2019-04-23 15:39:05', '2019-04-23 15:39:05', NULL, 1, 5, 31, 0),
(34, 96, 'Dwayne Bravo', '1988-04-17', 5, 3, '2019-04-23 15:39:05', '2019-04-23 15:39:05', NULL, 1, 2, 31, 0),
(35, 17, 'Fawad Ahmed', '1988-04-17', 5, 3, '2019-04-23 15:39:05', '2019-04-23 15:39:05', NULL, 1, 6, 31, 0),
(36, 33, 'Harris Rauf', '1988-04-17', 5, 2, '2019-04-23 15:39:05', '2019-04-23 15:39:05', NULL, 2, 4, 31, 0),
(37, 5, 'Mohammad Asghar', '1988-04-17', 5, 2, '2019-04-23 15:39:05', '2019-04-23 15:39:05', NULL, 2, 7, 31, 0),
(38, 83, 'SOHAIL TANVIR', '1988-04-17', 5, 2, '2019-04-23 15:39:05', '2019-04-23 15:39:05', NULL, 2, 3, 31, 0),
(39, 36, 'UMAR AKMAL', '1988-04-17', 5, 1, '2019-04-23 15:39:05', '2019-04-23 15:39:05', NULL, 2, 3, 31, 0),
(40, 88, 'RILEE ROSSOUW', '1988-04-17', 5, 1, '2019-04-23 15:39:05', '2019-04-23 15:39:05', NULL, 2, 7, 31, 0),
(41, 73, 'Ghulam Musaddasir', '1988-04-17', 5, 2, '2019-04-23 15:39:05', '2019-04-23 15:39:05', NULL, 1, 1, 31, 0),
(42, 51, 'Ahmed Shahzad', '1988-04-17', 5, 1, '2019-04-23 15:39:05', '2019-04-23 15:39:05', NULL, 1, 7, 31, 0),
(43, 39, 'Samiullah', '1981-04-21', 3, 1, '2019-04-23 15:44:11', '2019-04-23 15:44:11', NULL, 1, 7, 38, 0),
(44, 51, 'Daren Sammy', '1987-03-05', 3, 3, '2019-04-23 15:44:12', '2019-04-23 15:44:12', NULL, 1, 2, 32, 0),
(45, 8, 'Kieron Pollard', '1988-04-17', 3, 3, '2019-04-23 15:44:12', '2019-04-23 15:44:12', NULL, 2, 2, 31, 0),
(46, 18, 'Sohaib Maqsood', '1988-04-17', 3, 3, '2019-04-23 15:44:12', '2019-04-23 15:44:12', NULL, 1, 5, 31, 0),
(47, 26, 'Kamran Akmal', '1988-04-17', 3, 4, '2019-04-23 15:44:12', '2019-04-23 15:44:12', NULL, 1, 5, 31, 0),
(48, 96, 'Ibtisam Sheikh', '1988-04-17', 3, 3, '2019-04-23 15:44:12', '2019-04-23 15:44:12', NULL, 1, 8, 31, 0),
(49, 17, 'Liam Dawson', '1988-04-17', 3, 3, '2019-04-23 15:44:12', '2019-04-23 15:44:12', NULL, 1, 6, 31, 0),
(50, 33, 'Chris Jordan', '1988-04-17', 3, 2, '2019-04-23 15:44:12', '2019-04-23 15:44:12', NULL, 2, 4, 31, 0),
(51, 5, 'Wahab Riaz', '1988-04-17', 3, 2, '2019-04-23 15:44:12', '2019-04-23 15:44:12', NULL, 2, 3, 31, 0),
(52, 83, 'Hasan Ali', '1988-04-17', 3, 2, '2019-04-23 15:44:12', '2019-04-23 15:44:12', NULL, 2, 3, 31, 0),
(53, 36, 'Dawid Malan', '1988-04-17', 3, 1, '2019-04-23 15:44:12', '2019-04-23 15:44:12', NULL, 2, 3, 31, 0),
(54, 88, 'Umar Amin', '1988-04-17', 3, 1, '2019-04-23 15:44:12', '2019-04-23 15:44:12', NULL, 2, 7, 31, 0),
(55, 73, 'Nabi Gul', '1988-04-17', 3, 2, '2019-04-23 15:44:12', '2019-04-23 15:44:12', NULL, 1, 1, 31, 0),
(56, 51, 'Misbah ul Haq', '1988-04-17', 3, 1, '2019-04-23 15:44:12', '2019-04-23 15:44:12', NULL, 1, 7, 31, 0),
(57, 39, 'Steve Smith', '1981-04-21', 4, 1, '2019-04-23 15:50:06', '2019-04-23 15:50:06', NULL, 1, 7, 38, 0),
(58, 51, 'Shahid Afridi', '1987-03-05', 4, 3, '2019-04-23 15:50:06', '2019-04-23 15:50:06', NULL, 1, 6, 32, 0),
(59, 8, 'Shoaib Malik', '1988-04-17', 4, 3, '2019-04-23 15:50:06', '2019-04-23 15:50:06', NULL, 2, 6, 31, 0),
(60, 18, 'Shan Masood', '1988-04-17', 4, 1, '2019-04-23 15:50:06', '2019-04-23 15:50:06', NULL, 1, 5, 31, 0),
(61, 26, 'Shakeel Ansar', '1988-04-17', 4, 4, '2019-04-23 15:50:06', '2019-04-23 15:50:06', NULL, 1, 5, 31, 0),
(62, 96, 'Nicholas Pooran', '1988-04-17', 4, 3, '2019-04-23 15:50:06', '2019-04-23 15:50:06', NULL, 1, 8, 31, 0),
(63, 17, 'Laurie Evans', '1988-04-17', 4, 3, '2019-04-23 15:50:06', '2019-04-23 15:50:06', NULL, 1, 6, 31, 0),
(64, 33, 'Mohammad Irfan', '1988-04-17', 4, 2, '2019-04-23 15:50:06', '2019-04-23 15:50:06', NULL, 2, 4, 31, 0),
(65, 5, 'Mohammad Abbas', '1988-04-17', 4, 2, '2019-04-23 15:50:07', '2019-04-23 15:50:07', NULL, 2, 3, 31, 0),
(66, 83, 'Tom Moores', '1988-04-17', 4, 2, '2019-04-23 15:50:07', '2019-04-23 15:50:07', NULL, 2, 3, 31, 0),
(67, 36, 'Joe Denly', '1988-04-17', 4, 1, '2019-04-23 15:50:07', '2019-04-23 15:50:07', NULL, 2, 3, 31, 0),
(68, 88, 'Nauman Ali', '1988-04-17', 4, 1, '2019-04-23 15:50:07', '2019-04-23 15:50:07', NULL, 2, 7, 31, 0),
(69, 73, 'Umar Siddiq', '1988-04-17', 4, 1, '2019-04-23 15:50:07', '2019-04-23 15:50:07', NULL, 1, 1, 31, 0),
(70, 51, 'Qais Ahmed', '1988-04-17', 4, 1, '2019-04-23 15:50:07', '2019-04-23 15:50:07', NULL, 1, 7, 31, 0),
(71, 39, 'Ian Bell', '1981-04-21', 6, 1, '2019-04-23 16:02:22', '2019-04-23 16:02:22', NULL, 1, 7, 38, 0),
(72, 51, 'Samit Patel', '1987-03-05', 6, 3, '2019-04-23 16:02:22', '2019-04-23 16:02:22', NULL, 1, 6, 32, 0),
(73, 8, 'Shadab Khan', '1988-04-17', 6, 3, '2019-04-23 16:02:22', '2019-04-23 16:02:22', NULL, 2, 6, 31, 0),
(74, 18, 'Amad Butt', '1988-04-17', 6, 1, '2019-04-23 16:02:22', '2019-04-23 16:02:22', NULL, 1, 5, 31, 0),
(75, 26, 'Luke Ronchi', '1988-04-17', 6, 4, '2019-04-23 16:02:22', '2019-04-23 16:02:22', NULL, 1, 5, 31, 0),
(76, 96, 'Faheem Ashraf', '1988-04-17', 6, 3, '2019-04-23 16:02:22', '2019-04-23 16:02:22', NULL, 1, 2, 31, 0),
(77, 17, 'Laurie Evans', '1988-04-17', 6, 3, '2019-04-23 16:02:22', '2019-04-23 16:02:22', NULL, 1, 6, 31, 0),
(78, 33, 'Wayne Parnell', '1988-04-17', 6, 2, '2019-04-23 16:02:22', '2019-04-23 16:02:22', NULL, 2, 4, 31, 0),
(79, 5, 'Rumman Raees', '1988-04-17', 6, 2, '2019-04-23 16:02:22', '2019-04-23 16:02:22', NULL, 2, 3, 31, 0),
(80, 83, 'Mohammad Sami', '1988-04-17', 6, 2, '2019-04-23 16:02:23', '2019-04-23 16:02:23', NULL, 2, 3, 31, 0),
(81, 36, 'Cameron Delport', '1988-04-17', 6, 1, '2019-04-23 16:02:23', '2019-04-23 16:02:23', NULL, 2, 3, 31, 0),
(82, 88, 'Sahibzada Farhan', '1988-04-17', 6, 1, '2019-04-23 16:02:23', '2019-04-23 16:02:23', NULL, 2, 7, 31, 0),
(83, 73, 'Hussain Talat', '1988-04-17', 6, 1, '2019-04-23 16:02:23', '2019-04-23 16:02:23', NULL, 1, 1, 31, 0),
(84, 51, 'Asif Ali', '1988-04-17', 6, 1, '2019-04-23 16:02:23', '2019-04-23 16:02:23', NULL, 1, 7, 31, 0);

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

INSERT INTO `player_stats` (`id`, `format`, `player_id`, `matches`, `innings`, `notouts`, `ducks`, `runs`, `highscore`, `average_bat`, `balls_played`, `strikerate`, `centuries`, `halfcenturies`, `catches`, `stumping`, `fours`, `sixes`, `points`, `innings_bowl`, `overs`, `runs_ball`, `wickets`, `average_ball`, `best_ball`, `economy`, `five_wickets`, `wides`, `noballs`, `points_ball`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, 15, 1, 1, 0, NULL, 100, '100', 100.00, 51, 196.08, 1, 0, 0, 0, 9, 5, NULL, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, NULL, '2019-04-24 13:14:11', '2019-04-24 13:14:11', 0),
(2, 1, 16, 1, 1, 0, NULL, 6, '6', 6.00, 12, 50.00, 0, 0, 0, 0, 0, 1, NULL, 1, 3.0, 23, 0, 0.00, '0/0', 7.67, 0, 5, 1, NULL, '2019-04-24 13:14:11', '2019-04-24 13:14:13', 0),
(3, 1, 17, 1, 0, 1, NULL, 84, '84', 0.00, 45, 186.67, 0, 1, 0, 0, 7, 4, NULL, 1, 3.0, 50, 0, 0.00, '0/0', 16.67, 0, 1, 1, NULL, '2019-04-24 13:14:11', '2019-04-24 13:14:13', 0),
(4, 1, 18, 1, 0, 1, NULL, 47, '47', 0.00, 12, 391.67, 0, 0, 0, 0, 1, 4, NULL, 1, 3.0, 47, 0, 0.00, '0/0', 15.67, 0, 5, 0, NULL, '2019-04-24 13:14:11', '2019-04-24 13:14:13', 0),
(5, 1, 19, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, NULL, '2019-04-24 13:14:11', '2019-04-24 13:14:11', 0),
(6, 1, 20, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, NULL, '2019-04-24 13:14:11', '2019-04-24 13:14:11', 0),
(7, 1, 21, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 1, 2.0, 37, 0, 0.00, '0/0', 18.50, 0, 2, 3, NULL, '2019-04-24 13:14:11', '2019-04-24 13:14:13', 0),
(8, 1, 22, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 1, 4.0, 48, 0, 0.00, '0/0', 12.00, 0, 1, 2, NULL, '2019-04-24 13:14:12', '2019-04-24 13:14:13', 0),
(9, 1, 23, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, NULL, '2019-04-24 13:14:12', '2019-04-24 13:14:12', 0),
(10, 1, 24, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 1, 3.0, 15, 0, 0.00, '0/0', 5.00, 0, 4, 1, NULL, '2019-04-24 13:14:12', '2019-04-24 13:14:13', 0),
(11, 1, 27, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 1, 2.0, 18, 0, 0.00, '0/0', 9.00, 0, 3, 1, NULL, '2019-04-24 13:14:12', '2019-04-24 13:14:13', 0),
(12, 1, 1, 1, 0, 1, NULL, 101, '101', 0.00, 57, 177.19, 1, 0, 0, 0, 4, 5, NULL, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, NULL, '2019-04-24 13:14:12', '2019-04-24 13:14:12', 0),
(13, 1, 2, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, NULL, '2019-04-24 13:14:12', '2019-04-24 13:14:12', 0),
(14, 1, 3, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 1, 4.0, 51, 1, 51.00, '1/51', 12.75, 0, 2, 2, NULL, '2019-04-24 13:14:12', '2019-04-24 13:14:13', 0),
(15, 1, 4, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, NULL, '2019-04-24 13:14:12', '2019-04-24 13:14:12', 0),
(16, 1, 5, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, NULL, '2019-04-24 13:14:12', '2019-04-24 13:14:12', 0),
(17, 1, 6, 1, 0, 1, NULL, 137, '137', 0.00, 63, 217.46, 1, 0, 0, 0, 12, 5, NULL, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, NULL, '2019-04-24 13:14:12', '2019-04-24 13:14:12', 0),
(18, 1, 7, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 1, 4.0, 34, 0, 0.00, '0/0', 8.50, 0, 4, 1, NULL, '2019-04-24 13:14:12', '2019-04-24 13:14:13', 0),
(19, 1, 8, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 1, 4.0, 57, 0, 0.00, '0/0', 14.25, 0, 0, 1, NULL, '2019-04-24 13:14:13', '2019-04-24 13:14:13', 0),
(20, 1, 9, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 1, 4.0, 24, 1, 24.00, '1/24', 6.00, 0, 4, 1, NULL, '2019-04-24 13:14:13', '2019-04-24 13:14:13', 0),
(21, 1, 10, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 1, 4.0, 71, 0, 0.00, '0/0', 17.75, 0, 4, 1, NULL, '2019-04-24 13:14:13', '2019-04-24 13:14:13', 0),
(22, 1, 12, 1, 0, 0, NULL, 0, '0', 0.00, 0, 0.00, 0, 0, 0, 0, 0, 0, NULL, 0, 0.0, 0, 0, 0.00, '0/0', 0.00, 0, NULL, NULL, NULL, '2019-04-24 13:14:13', '2019-04-24 13:14:13', 0);

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
  `rr_matches` float NOT NULL DEFAULT '0',
  `active_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roundrobin_tournament`
--

INSERT INTO `roundrobin_tournament` (`id`, `tournament_id`, `refer_id`, `club_id`, `total_matches`, `win_matches`, `loss_matches`, `tie_matches`, `points_matches`, `rr_matches`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, '2019-04-24 17:50:14', '2019-04-24 13:14:14'),
(2, 1, 1, 2, 1, 0, 1, 0, 0, 0, 0, '2019-04-24 17:50:14', '2019-04-24 13:14:14'),
(3, 1, 1, 3, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 17:50:14', '2019-04-24 17:50:14'),
(4, 1, 1, 4, 0, 0, 0, 0, 0, 0, 0, '2019-04-24 17:50:14', '2019-04-24 17:50:14');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `name`, `club_id_1`, `club_id_2`, `series_type_id`, `series_days`, `ground_id`, `time`, `starting_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PSL', 1, 2, 1, '3', 1, NULL, '2019-04-23', 0, NULL, NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `series_fixtures`
--

INSERT INTO `series_fixtures` (`id`, `refer_id`, `club_id_1`, `club_id_2`, `name`, `series_type_id`, `starting_date`, `series_days`, `ground_id`, `time`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 'PSL', 1, '2019-04-25', 3, 1, '10 AM', '2019-04-23 13:47:59', '2019-04-23 13:47:59'),
(2, 1, 1, 2, 'PSL', 1, '2019-04-27', 3, 1, '10 AM', '2019-04-23 13:47:59', '2019-04-23 13:47:59'),
(3, 1, 1, 2, 'PSL', 1, '2019-04-29', 3, 1, '10 AM', '2019-04-23 13:47:59', '2019-04-23 13:47:59');

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
  `choose_to` int(11) NOT NULL
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
(1, 1, 1, 1, 0, 0, 0, 0.05, 238, 20.0, 237, 20.0, '2019-04-24 17:57:32', '2019-04-24 19:06:28'),
(2, 2, 1, 0, 1, 0, 0, -0.05, 237, 20.0, 238, 20.0, '2019-04-24 17:57:32', '2019-04-24 19:06:11'),
(3, 3, 0, 0, 0, 0, 0, 0.00, 0, 0.0, 0, 0.0, '2019-04-24 17:57:37', '2019-04-24 17:58:02'),
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
(1, 'PSL', '2019-04-23 13:59:24', '2019-04-23 13:59:24', 1, 0);

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
(1, 1, 2, '2019', 1, 1, 1, 4, NULL, 1, NULL, '04/24/2019', NULL, NULL, '2019-04-23 16:13:57', '2019-04-23 16:14:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tournament_clubs`
--

CREATE TABLE `tournament_clubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `tournament_id` int(11) DEFAULT NULL,
  `club_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournament_clubs`
--

INSERT INTO `tournament_clubs` (`id`, `tournament_id`, `club_id`, `refer_id`, `created_at`, `updated_at`, `active_status`) VALUES
(1, 1, '[\"1\",\"2\",\"3\",\"4\"]', 1, NULL, NULL, 0);

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
(6, 'Zohaib', 'zohaibfaruqui@gmail.com', '$2y$10$Nlc3QJGAtbjHxFSgb1Oqn.lVxx8rN91UCgrOFZ6lenVlycSrakpA6', '5e9abxjfAktaSMlkkvr5hoJpDhn9muazgIRmEuk2vHab4KB6Vre8JQXtqgFC', '2018-11-03 07:43:02', '2019-04-22 11:04:55');

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
  ADD KEY `club_id_1` (`club_id_1`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `series_fixtures`
--
ALTER TABLE `series_fixtures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refer_id` (`refer_id`),
  ADD KEY `club_id_1` (`club_id_1`),
  ADD KEY `club_id_2` (`club_id_2`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `batting_styles`
--
ALTER TABLE `batting_styles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bowler_scores`
--
ALTER TABLE `bowler_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fall_of_wickets`
--
ALTER TABLE `fall_of_wickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fixtures`
--
ALTER TABLE `fixtures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `grounds`
--
ALTER TABLE `grounds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `innings_score`
--
ALTER TABLE `innings_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lineups`
--
ALTER TABLE `lineups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pitches`
--
ALTER TABLE `pitches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scorecards`
--
ALTER TABLE `scorecards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `series_fixtures`
--
ALTER TABLE `series_fixtures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tournaments_references`
--
ALTER TABLE `tournaments_references`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
