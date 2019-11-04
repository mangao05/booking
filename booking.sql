-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 04:26 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(98, 'Enan', 'updated', 2, 'App\\User', 2, 'App\\User', '{\"attributes\":{\"updated_at\":\"2019-10-14 05:32:02\",\"last_login_at\":\"2019-10-14 13:32:02\"},\"old\":{\"updated_at\":\"2019-10-11 01:23:40\",\"last_login_at\":\"2019-10-11 09:26:34\"}}', '2019-10-13 21:32:02', '2019-10-13 21:32:02'),
(99, 'Enan', 'updated', 2, 'App\\User', 2, 'App\\User', '{\"attributes\":{\"updated_at\":\"2019-10-15 00:39:21\",\"last_login_at\":\"2019-10-15 08:39:21\"},\"old\":{\"updated_at\":\"2019-10-14 05:32:02\",\"last_login_at\":\"2019-10-14 13:32:02\"}}', '2019-10-14 16:39:21', '2019-10-14 16:39:21'),
(100, 'Enan', 'updated', 2, 'App\\User', 2, 'App\\User', '{\"attributes\":{\"updated_at\":\"2019-10-15 00:40:21\",\"last_login_at\":\"2019-10-15 08:40:21\"},\"old\":{\"updated_at\":\"2019-10-15 00:39:21\",\"last_login_at\":\"2019-10-15 08:39:21\"}}', '2019-10-14 16:40:21', '2019-10-14 16:40:21'),
(101, 'Enan', 'updated', 2, 'App\\User', 2, 'App\\User', '{\"attributes\":{\"updated_at\":\"2019-10-16 00:13:20\",\"last_login_at\":\"2019-10-16 08:13:20\"},\"old\":{\"updated_at\":\"2019-10-15 00:40:21\",\"last_login_at\":\"2019-10-15 08:40:21\"}}', '2019-10-15 16:13:20', '2019-10-15 16:13:20'),
(102, 'Enan', 'updated', 2, 'App\\User', 2, 'App\\User', '{\"attributes\":{\"updated_at\":\"2019-10-16 05:10:34\",\"last_login_at\":\"2019-10-16 13:10:34\"},\"old\":{\"updated_at\":\"2019-10-16 00:13:20\",\"last_login_at\":\"2019-10-16 08:13:20\"}}', '2019-10-15 21:10:34', '2019-10-15 21:10:34'),
(103, 'Enan', 'updated', 2, 'App\\User', 2, 'App\\User', '{\"attributes\":{\"updated_at\":\"2019-10-17 01:32:48\",\"last_login_at\":\"2019-10-17 09:32:48\"},\"old\":{\"updated_at\":\"2019-10-16 05:10:34\",\"last_login_at\":\"2019-10-16 13:10:34\"}}', '2019-10-16 17:32:48', '2019-10-16 17:32:48'),
(104, 'User', 'updated', 4, 'App\\Room', NULL, NULL, '{\"attributes\":{\"type\":\"samples 2\",\"updated_at\":\"2019-10-17 01:33:25\"},\"old\":{\"type\":\"sample 2\",\"updated_at\":\"2019-10-10 08:47:45\"}}', '2019-10-16 17:33:25', '2019-10-16 17:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amenities` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `amenities`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'wifi', 'fa-wifi', 'Activated', '2019-09-17 17:45:57', '2019-09-17 17:50:08'),
(2, 'kama', 'fa-bed', 'Activated', '2019-09-17 17:50:05', '2019-09-17 17:50:07'),
(3, 'tv', 'fa-tv', 'Activated', '2019-10-09 17:13:50', '2019-10-09 18:58:46'),
(4, 'shower', 'fa-shower', 'Activated', '2019-10-09 22:05:22', '2019-10-09 22:06:47'),
(5, 'picture', 'fa-image', 'Deactivated', '2019-10-09 22:21:12', '2019-10-10 00:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `contact_number`, `message`, `status`, `created_at`, `updated_at`) VALUES
(14, 'enan', 'fsiapco@gmail.com', '3423', '23423432434', '1', '2019-09-26 19:53:07', '2019-09-27 00:37:07'),
(24, 'enan', 'khenneth.aliza@gmail.com', '0453453524234', '2342424324879080989', '1', '2019-09-29 16:21:50', '2019-09-30 18:03:08'),
(25, 'enan', 'khenneth.aliza@gmail.com', '2222222231312', 'WQEQEQWEQEQEQWEQEQWE', '1', '2019-09-29 16:24:20', '2019-09-30 18:04:05'),
(26, 'asdasd', 'khenneth.aliza@gmail.com', '23424242', '424243423424', '1', '2019-09-29 17:24:06', '2019-09-29 18:40:11'),
(27, 'enan', 'fsiapcos@gmail.com', '23423443', 'e3434234', '1', '2019-09-29 17:24:45', '2019-09-30 18:03:42'),
(28, 'asd', 'bradfordsem@happybee.com', '2423423423423', '234234242424', '1', '2019-09-29 17:25:10', '2019-09-30 18:02:56'),
(29, 'enan', 'fsiapco@gmail.com', '23424242', '424234234', '1', '2019-09-29 17:30:31', '2019-09-29 23:29:41'),
(30, 'enan', 'fsiapco@gmail.com', '23424242', '424234234', '1', '2019-09-29 17:30:32', '2019-09-30 00:57:49'),
(31, 'enan', 'fsiapco@gmail.com', '23424242', '424234234', '1', '2019-09-29 17:30:33', '2019-09-29 22:30:53'),
(32, 'enan', 'fsiapco@gmail.com', '23424242', '424234234', '1', '2019-09-29 17:30:33', '2019-09-30 00:57:28'),
(33, 'enan', 'fsiapco@gmail.com', '34242342', '44242424', '1', '2019-09-29 17:30:57', '2019-09-29 22:30:39'),
(34, 'enan', 'fsiapco@gmail.com', '21313131312', '33131321', '1', '2019-09-29 17:31:09', '2019-09-29 17:41:25'),
(35, 'khenneth', 'fsiapco@gmail.com', '2342342434234', '24234243424', '1', '2019-10-07 23:00:24', '2019-10-10 23:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `contact_no`, `created_at`, `updated_at`) VALUES
(1, 'jeric mangao', 'mangao_jeric@yahoo.com', '09280637616', '2019-09-17 18:41:51', '2019-09-17 18:41:51'),
(2, 'Fernandog', 'fsiapco@gmail.com', '032154567', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_05_09_070111_create_rooms_table', 1),
(9, '2019_05_09_070225_create_room_details_table', 1),
(10, '2019_05_09_072318_create_reservations_table', 1),
(11, '2019_05_09_072332_create_customers_table', 1),
(12, '2019_05_28_055031_create_paypal_payment_table', 1),
(13, '2019_05_31_040027_create_room_amenities_table', 1),
(14, '2019_06_13_060802_create_amenities_table', 1),
(15, '2019_07_04_051527_create_other_room_photos_table', 1),
(16, '2019_09_18_022740_add_room_details_id_to_reservations', 2),
(17, '2019_09_18_024442_add_room_no_to_reservations', 3),
(18, '2019_09_26_051828_create_contact_us_table', 4),
(19, '2019_10_01_050518_create_room_images_table', 5),
(20, '2019_10_10_005228_create_activity_log_table', 6),
(21, '2019_10_11_004133_add_login_fields_to_users_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'JoUSgqqlpQKUqDw0wY6UGk9mRCm0jQX225H0NIJ1', 'home', 0, 0, 1, '2019-09-18 16:43:30', '2019-09-18 16:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_room_photos`
--

CREATE TABLE `other_room_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `paypal_payment`
--

CREATE TABLE `paypal_payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'express',
  `amount` double NOT NULL,
  `paypal_fee` double NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paypal_payment`
--

INSERT INTO `paypal_payment` (`id`, `reservation_id`, `status`, `invoice_id`, `type`, `amount`, `paypal_fee`, `transaction_id`, `token`, `created_at`, `updated_at`) VALUES
(2, 9, 'Completed', '5d81db1d83300', 'instant', 824, 24.2, '8S210679V1540170N', 'EC-0EU63248KA857715U', '2019-09-17 23:22:09', '2019-09-17 23:22:09'),
(3, 10, 'Completed', '5d96a5b54a1f3', 'instant', 515, 15.24, '1K724950HP303124R', 'EC-1M4026830S1821832', '2019-10-03 17:51:53', '2019-10-03 17:51:53'),
(4, 11, 'Completed', '5d9a9c88aec3e', 'instant', 824, 24.2, '71D36774NW873262F', 'EC-34200269AE897533Y', '2019-10-06 18:01:48', '2019-10-06 18:01:48'),
(6, 8, 'Completed', '5d9a9db335af7', 'instant', 206, 6.27, '9GK050754Y8523444', 'EC-7RA49209E2684891F', '2019-10-06 18:06:47', '2019-10-06 18:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_no` int(11) NOT NULL,
  `room_details_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Reserved',
  `arrival` timestamp NULL DEFAULT NULL,
  `departure` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `room_no`, `room_details_id`, `customer_id`, `check_in`, `check_out`, `status`, `arrival`, `departure`, `created_at`, `updated_at`) VALUES
(8, 104, 3, 1, '2019-10-08', '2019-10-10', 'Reserved', '2019-10-09 05:44:32', '2019-10-09 05:44:44', '2019-10-06 18:06:47', '2019-10-09 05:44:44'),
(9, 103, 2, 1, '2019-10-08', '2019-10-10', 'Done', '2019-10-09 05:44:33', '2019-10-09 05:44:55', '2019-10-06 18:06:47', '2019-10-09 05:44:55'),
(10, 102, 1, 1, '2019-10-08', '2019-10-10', 'Done', '2019-10-09 05:44:34', '2019-10-09 05:45:00', '2019-10-06 18:06:47', '2019-10-09 05:45:00'),
(11, 103, 2, 1, '2019-10-08', '2019-10-10', 'Done', '2019-10-09 05:44:36', '2019-10-09 05:45:04', '2019-10-06 18:06:47', '2019-10-09 05:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `guests` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_booking` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `photo`, `type`, `price`, `guests`, `description`, `total_booking`, `created_at`, `updated_at`) VALUES
(1, '1570172563.jpeg', 'sample', 100, '1', 'SDASDAS', 1, '2019-09-17 17:48:10', '2019-10-03 23:02:43'),
(2, '1569987826.jpeg', 'sample 2', 100, '2', 'SDASDAS', 2, '2019-09-17 17:49:25', '2019-10-01 19:43:46'),
(3, '1570524788.jpeg', 'sample 3', 1000, '3', 'mahal po ito', 3, '2019-10-08 00:53:08', '2019-10-09 17:12:16'),
(4, '1570694169.jpeg', 'samples 2', 100, '5', 'asasdd', 4, '2019-10-09 22:04:30', '2019-10-16 17:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `room_amenities`
--

CREATE TABLE `room_amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amenities` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amenities_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_amenities`
--

INSERT INTO `room_amenities` (`id`, `amenities`, `amenities_id`, `room_id`, `created_at`, `updated_at`) VALUES
(6, 'wifi', '1', 2, '2019-10-01 22:58:20', '2019-10-01 22:58:20'),
(7, 'kama', '2', 2, '2019-10-01 22:58:20', '2019-10-01 22:58:20'),
(12, 'wifi', '1', 3, '2019-10-09 17:12:16', '2019-10-09 17:12:16'),
(13, 'kama', '2', 3, '2019-10-09 17:12:16', '2019-10-09 17:12:16'),
(73, 'tv', '3', 4, '2019-10-16 17:33:25', '2019-10-16 17:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE `room_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`id`, `room_id`, `room_no`, `created_at`, `updated_at`) VALUES
(1, 1, 102, NULL, '2019-10-09 05:45:00'),
(2, 2, 103, NULL, '2019-10-09 05:45:04'),
(3, 3, 104, NULL, '2019-10-09 05:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`id`, `room_id`, `image`, `created_at`, `updated_at`) VALUES
(107, '2', '1570072159_5d95665fc5d4d.jpeg', '2019-10-02 19:09:19', '2019-10-02 19:09:19'),
(108, '2', '1570072159_5d95665fd47ec.jpeg', '2019-10-02 19:09:19', '2019-10-02 19:09:19'),
(109, '2', '1570072159_5d95665ff1e04.jpeg', '2019-10-02 19:09:20', '2019-10-02 19:09:20'),
(110, '2', '1570072160_5d956660154f1.jpeg', '2019-10-02 19:09:20', '2019-10-02 19:09:20'),
(111, '2', '1570072160_5d9566602b7dc.jpeg', '2019-10-02 19:09:20', '2019-10-02 19:09:20'),
(112, '2', '1570072160_5d956660465e6.jpeg', '2019-10-02 19:09:20', '2019-10-02 19:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `lastname`, `email`, `photo`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `last_login_at`) VALUES
(1, 'enan', 'khenneth', 'alaizas', 'khenneth.aliza@gmail.com', '1569204869.jpeg', NULL, '$2y$10$6NtZHmVlUe3nSEH7PBhZI.ztLAzlCH6rswkXVilUQ6z0gzzqwdG4G', 'Activated', NULL, '2019-09-17 17:03:58', '2019-09-22 18:24:20', NULL),
(2, 'Enan', 'enan', 'siapco', 'fsiapco@gmail.com', '1569832254.jpeg', NULL, '$2y$10$6NtZHmVlUe3nSEH7PBhZI.ztLAzlCH6rswkXVilUQ6z0gzzqwdG4G', 'Activated', NULL, '2019-09-19 00:06:06', '2019-10-16 17:32:48', '2019-10-17 09:32:48'),
(3, 'irish', 'irish', 'Gorospe', 'irish.gorospe@gmail.com', '1569198852.jpeg', NULL, '$2y$10$tRZCD/UhARtSV97uKopgYeWEO39hXhOzdKJECZ3ULOqyLgLw1Mpru', 'Activated', NULL, '2019-09-22 16:34:12', '2019-10-09 23:31:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `other_room_photos`
--
ALTER TABLE `other_room_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paypal_payment`
--
ALTER TABLE `paypal_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_amenities`
--
ALTER TABLE `room_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_details`
--
ALTER TABLE `room_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
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
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_room_photos`
--
ALTER TABLE `other_room_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paypal_payment`
--
ALTER TABLE `paypal_payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_amenities`
--
ALTER TABLE `room_amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `room_details`
--
ALTER TABLE `room_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
