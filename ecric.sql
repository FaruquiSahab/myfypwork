-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2018 at 08:07 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecric`
--

-- --------------------------------------------------------

--
-- Table structure for table `balls`
--

CREATE TABLE `balls` (
  `id` int(10) UNSIGNED NOT NULL,
  `runs` int(11) NOT NULL,
  `player` int(11) NOT NULL,
  `legal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batting_styles`
--

CREATE TABLE `batting_styles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batting_styles`
--

INSERT INTO `batting_styles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Right-hand bat', NULL, NULL),
(2, 'Left-hand bat', NULL, NULL);

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
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `photo_id`, `name`, `created_at`, `updated_at`, `level_id`) VALUES
(1, '15', 'Karachi Tigers', '2018-09-27 14:44:11', '2018-09-27 15:09:44', 3),
(4, '16', 'Quetta Shaheen', '2018-09-27 15:10:02', '2018-09-27 15:10:02', 1),
(7, '26', 'Kashimiri Lions', '2018-09-27 16:10:17', '2018-09-27 16:10:17', 3),
(8, '28', 'Balochi Hawks', '2018-09-28 07:05:00', '2018-09-28 07:05:00', 3),
(9, '29', 'Lahore Sultans', '2018-09-28 07:06:06', '2018-09-28 07:06:06', 2);

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
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `name`, `nationality`, `club_id`, `created_at`, `updated_at`, `photo_id`) VALUES
(1, 'Mikey Mouse', 'Britain', 4, '2018-09-27 16:01:17', '2018-09-27 16:06:27', 22),
(4, 'Richard', 'West Indies', 4, '2018-09-28 07:06:52', '2018-10-14 15:56:26', 32),
(6, 'Zeeshan Khan', 'Pakistan', 7, '2018-09-28 07:17:52', '2018-09-28 07:17:52', 33);

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_balls` int(11) NOT NULL,
  `wides` int(11) NOT NULL,
  `byes` int(11) NOT NULL,
  `leg_byes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grounds`
--

CREATE TABLE `grounds` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grounds`
--

INSERT INTO `grounds` (`id`, `name`, `created_at`, `updated_at`, `photo_id`) VALUES
(1, 'Afridi Stadium', '2018-10-15 05:47:22', '2018-10-15 05:47:22', 66);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Easy', NULL, NULL),
(2, 'Moderate', NULL, NULL),
(3, 'Hard\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(10) UNSIGNED NOT NULL,
  `club_id_1` int(11) NOT NULL,
  `club_id_2` int(11) NOT NULL,
  `ground_id` int(11) NOT NULL,
  `pitch_id` int(11) NOT NULL,
  `mom_player_id` int(11) NOT NULL DEFAULT '0',
  `umpire_id` int(11) DEFAULT NULL,
  `tournament_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(191) NOT NULL DEFAULT '0',
  `winner_club_id` int(11) NOT NULL DEFAULT '0',
  `match_type_id` int(11) NOT NULL,
  `toss` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `match_types`
--

CREATE TABLE `match_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `match_types`
--

INSERT INTO `match_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'T20', NULL, NULL),
(2, 'One-Day', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2018_09_27_190429_create_levels_table', 2),
(52, '2014_10_12_000000_create_users_table', 3),
(53, '2014_10_12_100000_create_password_resets_table', 3),
(54, '2018_09_26_074554_create_clubs_table', 3),
(55, '2018_09_26_075240_create_players_table', 3),
(56, '2018_09_26_075604_create_coaches_table', 3),
(57, '2018_09_26_075839_create_grounds_table', 3),
(58, '2018_09_26_080206_create_tournaments_table', 3),
(59, '2018_09_26_080305_create_umpires_table', 3),
(60, '2018_09_26_080405_create_pitches_table', 3),
(61, '2018_09_26_080540_create_overs_table', 3),
(62, '2018_09_26_080805_create_balls_table', 3),
(63, '2018_09_26_083850_create_extras_table', 3),
(64, '2018_09_26_084209_create_ground_types_table', 3),
(65, '2018_09_26_084407_create_player_roles_table', 3),
(66, '2018_09_26_085014_create_notices_table', 3),
(67, '2018_09_26_093011_create_matches_table', 3),
(68, '2018_09_26_094007_create_match_types_table', 3),
(69, '2018_09_26_095608_create_scorecards_table', 3),
(70, '2018_09_26_100110_create_series_table', 3),
(71, '2018_09_26_101052_create_players_ranking_o_ds_table', 3),
(72, '2018_09_26_101543_create_players_ranking_t20s_table', 3),
(73, '2018_09_26_101917_create_teams_ranking_o_ds_table', 3),
(74, '2018_09_26_102014_create_teams_ranking_t20s_table', 3),
(75, '2018_09_26_130902_create_photos_table', 3),
(76, '2018_09_27_191407_add_level_id_to_clubs', 3),
(77, '2018_09_27_193458_create_levels_table', 4),
(78, '2018_09_27_205154_add_photo_id_to_coaches', 5),
(79, '2018_09_28_123146_add_photo_id_to_grounds', 6),
(80, '2018_09_28_190712_add_photo_id_to_players', 7),
(81, '2018_09_28_191521_create_batting_styles_table', 7),
(82, '2018_09_28_191550_create_bowling_styles_table', 7),
(83, '2018_09_28_191909_add_bowling_style_id_to_players', 7),
(84, '2018_09_28_191924_add_batting_style_id_to_players', 7),
(85, '2018_09_28_192939_add_age_to_players', 8),
(86, '2018_09_29_084539_add_photo_id_to_tournaments', 9),
(87, '2018_09_29_085629_add_photo_id_to_umpires', 10),
(88, '2018_09_29_085654_add_nationality_to_umpires', 10),
(89, '2018_09_29_110111_create_posts_table', 11),
(90, '2018_09_29_120008_add_role_id_to_players_ranking_o_ds', 12),
(91, '2018_10_05_181327_add_role_id_to_players_ranking_t20s_table', 13),
(92, '2018_10_14_075015_add_photo_id_to_teams_ranking_o_ds', 14),
(93, '2018_10_14_114613_add_photo_id_to_teams_ranking_t20s', 15),
(94, '2018_10_15_105814_create_tournaments_references_table', 16),
(95, '2018_10_15_110849_create_tournament_formats_table', 16);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `overs`
--

CREATE TABLE `overs` (
  `id` int(10) UNSIGNED NOT NULL,
  `runs` int(11) NOT NULL,
  `ball` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, '15380772181.png', '2018-09-27 14:40:18', '2018-09-27 14:40:18'),
(2, '15380773121.png', '2018-09-27 14:41:52', '2018-09-27 14:41:52'),
(3, '15380773391.png', '2018-09-27 14:42:19', '2018-09-27 14:42:19'),
(4, '15380773421.png', '2018-09-27 14:42:22', '2018-09-27 14:42:22'),
(5, '15380773431.png', '2018-09-27 14:42:23', '2018-09-27 14:42:23'),
(6, '15380773451.png', '2018-09-27 14:42:25', '2018-09-27 14:42:25'),
(7, '15380774511.png', '2018-09-27 14:44:11', '2018-09-27 14:44:11'),
(8, '15380779551.png', '2018-09-27 14:52:35', '2018-09-27 14:52:35'),
(9, '15380781351.png', '2018-09-27 14:55:35', '2018-09-27 14:55:35'),
(10, '15380781721.png', '2018-09-27 14:56:12', '2018-09-27 14:56:12'),
(11, '15380782051.png', '2018-09-27 14:56:45', '2018-09-27 14:56:45'),
(12, '15380788911.png', '2018-09-27 15:08:11', '2018-09-27 15:08:11'),
(13, '15380789221.png', '2018-09-27 15:08:42', '2018-09-27 15:08:42'),
(14, '15380789341.png', '2018-09-27 15:08:54', '2018-09-27 15:08:54'),
(15, '1538078983crown1.png', '2018-09-27 15:09:44', '2018-09-27 15:09:44'),
(16, '1538079002571.jpg', '2018-09-27 15:10:02', '2018-09-27 15:10:02'),
(17, '15380790121.png', '2018-09-27 15:10:12', '2018-09-27 15:10:12'),
(18, '15380792271.png', '2018-09-27 15:13:47', '2018-09-27 15:13:47'),
(19, '15380792411.png', '2018-09-27 15:14:01', '2018-09-27 15:14:01'),
(20, '15380820261.png', '2018-09-27 16:00:26', '2018-09-27 16:00:26'),
(21, '15380820771.png', '2018-09-27 16:01:17', '2018-09-27 16:01:17'),
(22, '15380823871.png', '2018-09-27 16:06:27', '2018-09-27 16:06:27'),
(23, '15380824061.png', '2018-09-27 16:06:46', '2018-09-27 16:06:46'),
(24, '15380824221.png', '2018-09-27 16:07:02', '2018-09-27 16:07:02'),
(25, '15380825381.png', '2018-09-27 16:08:58', '2018-09-27 16:08:58'),
(26, '1538082617240_F_97709039_iyf9O0ST2OmuLRLZe0ziyDgwuOWXeaXC.jpg', '2018-09-27 16:10:17', '2018-09-27 16:10:17'),
(27, '15380826451.png', '2018-09-27 16:10:45', '2018-09-27 16:10:45'),
(28, '15381363001.png', '2018-09-28 07:05:00', '2018-09-28 07:05:00'),
(29, '1538136366571.jpg', '2018-09-28 07:06:06', '2018-09-28 07:06:06'),
(30, '1538136411crown2.jpg', '2018-09-28 07:06:51', '2018-09-28 07:06:51'),
(31, '153813645413754378_10206684772014097_415284927275744271_n.jpg', '2018-09-28 07:07:34', '2018-09-28 07:07:34'),
(32, '15381364871.png', '2018-09-28 07:08:07', '2018-09-28 07:08:07'),
(33, '15381370721.png', '2018-09-28 07:17:52', '2018-09-28 07:17:52'),
(34, '15381419611.png', '2018-09-28 08:39:21', '2018-09-28 08:39:21'),
(35, '15381421161.png', '2018-09-28 08:41:56', '2018-09-28 08:41:56'),
(36, '15381421791.png', '2018-09-28 08:42:59', '2018-09-28 08:42:59'),
(37, '15381587561.png', '2018-09-28 13:19:16', '2018-09-28 13:19:16'),
(38, '15381587691.png', '2018-09-28 13:19:29', '2018-09-28 13:19:29'),
(39, '15381675381.png', '2018-09-28 15:45:38', '2018-09-28 15:45:38'),
(40, '153817121113754378_10206684772014097_415284927275744271_n.jpg', '2018-09-28 16:46:51', '2018-09-28 16:46:51'),
(41, '15381730281.png', '2018-09-28 17:17:08', '2018-09-28 17:17:08'),
(42, '15382081081.png', '2018-09-29 03:01:48', '2018-09-29 03:01:48'),
(43, '153820854213754378_10206684772014097_415284927275744271_n.jpg', '2018-09-29 03:09:02', '2018-09-29 03:09:02'),
(44, '15382089431.png', '2018-09-29 03:15:43', '2018-09-29 03:15:43'),
(45, '15382090001.png', '2018-09-29 03:16:40', '2018-09-29 03:16:40'),
(46, '15382090381.png', '2018-09-29 03:17:18', '2018-09-29 03:17:18'),
(47, '15382104311.png', '2018-09-29 03:40:31', '2018-09-29 03:40:31'),
(48, '15382104501.png', '2018-09-29 03:40:50', '2018-09-29 03:40:50'),
(49, '15382104981.png', '2018-09-29 03:41:38', '2018-09-29 03:41:38'),
(50, '1538210562571.jpg', '2018-09-29 03:42:42', '2018-09-29 03:42:42'),
(51, '15382108701.png', '2018-09-29 03:47:50', '2018-09-29 03:47:50'),
(52, '15382111281.png', '2018-09-29 03:52:08', '2018-09-29 03:52:08'),
(53, '15382111351.png', '2018-09-29 03:52:15', '2018-09-29 03:52:15'),
(54, '1538211206571.jpg', '2018-09-29 03:53:26', '2018-09-29 03:53:26'),
(55, '15382112161.png', '2018-09-29 03:53:36', '2018-09-29 03:53:36'),
(56, '15382112311.png', '2018-09-29 03:53:51', '2018-09-29 03:53:51'),
(57, '15382129651.png', '2018-09-29 04:22:45', '2018-09-29 04:22:45'),
(58, '1538213027571.jpg', '2018-09-29 04:23:47', '2018-09-29 04:23:47'),
(59, '15382130511.png', '2018-09-29 04:24:11', '2018-09-29 04:24:11'),
(60, '15382200911.png', '2018-09-29 06:21:31', '2018-09-29 06:21:31'),
(61, '15382202361.png', '2018-09-29 06:23:56', '2018-09-29 06:23:56'),
(62, '15382202491.png', '2018-09-29 06:24:09', '2018-09-29 06:24:09'),
(63, '15382204231.png', '2018-09-29 06:27:03', '2018-09-29 06:27:03'),
(64, '153822388932887310_1828230437237368_6970187341029703680_n.jpg', '2018-09-29 07:24:49', '2018-09-29 07:24:49'),
(65, '15382498471.png', '2018-09-29 14:37:27', '2018-09-29 14:37:27'),
(66, '15396004421538069870crown1.png', '2018-10-15 05:47:22', '2018-10-15 05:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `pitches`
--

CREATE TABLE `pitches` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `club_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_id` int(11) NOT NULL,
  `batting_style_id` int(11) DEFAULT NULL,
  `bowling_style_id` int(11) DEFAULT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `date_of_birth`, `club_id`, `role_id`, `created_at`, `updated_at`, `photo_id`, `batting_style_id`, `bowling_style_id`, `age`) VALUES
(1, 'Zahid', '1994-10-24', 7, 3, '2018-09-28 15:45:38', '2018-09-28 15:45:38', 39, 2, 2, 18),
(2, 'Aijaz', '1994-09-19', 8, 2, '2018-09-28 16:46:51', '2018-09-29 03:15:43', 44, NULL, 4, 22),
(4, 'Amir', '1998-10-23', 4, 2, '2018-09-29 03:16:40', '2018-09-29 03:16:40', 45, NULL, 5, 18),
(5, 'Junaid', '1997-08-28', 4, 1, '2018-09-29 03:17:18', '2018-09-29 03:17:18', 46, 2, NULL, 34),
(7, 'Muzammil', '1998-12-26', 9, 3, '2018-09-29 07:24:49', '2018-09-29 14:37:27', 65, 1, 7, 18);

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
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players_ranking_o_ds`
--

INSERT INTO `players_ranking_o_ds` (`id`, `club_id`, `points`, `player_id`, `created_at`, `updated_at`, `role_id`) VALUES
(3, 8, '200.00', 7, '2018-10-14 16:02:09', '2018-10-14 16:02:09', 2),
(4, 7, '600.00', 4, '2018-10-14 16:14:15', '2018-10-14 16:48:20', 1),
(5, 4, '300.00', 1, '2018-10-14 19:43:52', '2018-10-14 19:43:52', 3);

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
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players_ranking_t20s`
--

INSERT INTO `players_ranking_t20s` (`id`, `club_id`, `points`, `player_id`, `created_at`, `updated_at`, `role_id`) VALUES
(2, NULL, '300.00', 5, '2018-10-14 19:08:31', '2018-10-14 19:08:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `player_roles`
--

CREATE TABLE `player_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_roles`
--

INSERT INTO `player_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Batsman', NULL, NULL),
(2, 'Bowler', NULL, NULL),
(3, 'All-Rounder', NULL, NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `photo_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 61, 'New post', 'adddddddddddasdasdsaddddasdasdasdasdsadasdasd', '2018-09-29 06:21:31', '2018-09-29 06:23:56');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(10) UNSIGNED NOT NULL,
  `club_id_1` int(11) NOT NULL,
  `club_id_2` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `photo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams_ranking_o_ds`
--

INSERT INTO `teams_ranking_o_ds` (`id`, `club_id`, `points`, `created_at`, `updated_at`, `photo_id`) VALUES
(3, 9, '400.00', '2018-10-14 15:46:53', '2018-10-14 15:46:53', 5),
(4, 3, '500.00', '2018-10-14 15:53:56', '2018-10-14 16:00:01', 4);

-- --------------------------------------------------------

--
-- Table structure for table `teams_ranking_t20s`
--

CREATE TABLE `teams_ranking_t20s` (
  `id` int(10) UNSIGNED NOT NULL,
  `club_id` int(11) NOT NULL,
  `points` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams_ranking_t20s`
--

INSERT INTO `teams_ranking_t20s` (`id`, `club_id`, `points`, `created_at`, `updated_at`) VALUES
(1, 4, '356.00', '2018-10-14 19:19:21', '2018-10-14 21:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `created_at`, `updated_at`, `photo_id`) VALUES
(1, 'Quaid-e-Azam Cup', '2018-09-29 03:40:31', '2018-09-29 03:53:26', 54),
(4, 'Cool & Cool Cup', '2018-09-29 03:53:51', '2018-09-29 03:53:51', 56);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments_references`
--

CREATE TABLE `tournaments_references` (
  `id` int(10) UNSIGNED NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `tournament_type_id` int(11) NOT NULL,
  `tournament_format_id` int(11) NOT NULL,
  `number_of_teams` int(11) NOT NULL,
  `winner_club_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tournament_formats`
--

CREATE TABLE `tournament_formats` (
  `id` int(10) UNSIGNED NOT NULL,
  `format_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `umpires`
--

CREATE TABLE `umpires` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_id` int(11) NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `umpires`
--

INSERT INTO `umpires` (`id`, `name`, `created_at`, `updated_at`, `photo_id`, `nationality`) VALUES
(1, 'Aleem Dar Sahab', '2018-09-29 04:22:45', '2018-09-29 04:23:47', 58, 'Pakistan');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@ecric.com', '$2y$10$MQ4OVGWkuY3oxAK0rKIGQ.nE3lNfAI8zO/3EWXxbUeGaZzlTtdqTS', NULL, '2018-09-27 14:37:15', '2018-09-27 14:37:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balls`
--
ALTER TABLE `balls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batting_styles`
--
ALTER TABLE `batting_styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bowling_styles`
--
ALTER TABLE `bowling_styles`
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
-- Indexes for table `grounds`
--
ALTER TABLE `grounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments_references`
--
ALTER TABLE `tournaments_references`
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
-- AUTO_INCREMENT for table `batting_styles`
--
ALTER TABLE `batting_styles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bowling_styles`
--
ALTER TABLE `bowling_styles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grounds`
--
ALTER TABLE `grounds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `match_types`
--
ALTER TABLE `match_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `overs`
--
ALTER TABLE `overs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `pitches`
--
ALTER TABLE `pitches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `players_ranking_o_ds`
--
ALTER TABLE `players_ranking_o_ds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `players_ranking_t20s`
--
ALTER TABLE `players_ranking_t20s`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `player_roles`
--
ALTER TABLE `player_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `teams_ranking_o_ds`
--
ALTER TABLE `teams_ranking_o_ds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teams_ranking_t20s`
--
ALTER TABLE `teams_ranking_t20s`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tournaments_references`
--
ALTER TABLE `tournaments_references`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tournament_formats`
--
ALTER TABLE `tournament_formats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `umpires`
--
ALTER TABLE `umpires`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
