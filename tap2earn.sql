-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 10:54 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surveybounce`
--
-- CREATE DATABASE IF NOT EXISTS `surveybounce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
-- USE `surveybounce`;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_02_14_155629_create_referral_table', 2),
(6, '2020_02_16_025148_create_user_trans_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

DROP TABLE IF EXISTS `referral`;
CREATE TABLE `referral` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referral` int(11) NOT NULL,
  `referral_by` int(11) NOT NULL,
  `referral_amount` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_platform` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `extra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`id`, `referral`, `referral_by`, `referral_amount`, `status`, `from_platform`, `created_at`, `updated_at`, `extra`) VALUES
(1, 4, 3, 5, 'complete', NULL, '2020-02-16 09:14:07', '2020-02-16 09:14:07', ''),
(2, 5, 4, 5, 'complete', NULL, '2020-02-16 09:25:53', '2020-02-16 09:25:53', '');

-- --------------------------------------------------------

--
-- Table structure for table `trial_balances`
--

DROP TABLE IF EXISTS `trial_balances`;
CREATE TABLE `trial_balances` (
  `id` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `debit_balance` int(11) NOT NULL,
  `credit_balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('client','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'ahmed', 'ahmedshabbirawan', 'ahmedshabbirawan@gmail.com', NULL, '$2y$10$XZURQc65GnBeeTEY1DMhOeW2m223wDoXT8pSkfxTq0Xc9B2IL32BK', 'client', NULL, '2020-02-16 09:13:06', '2020-02-16 09:13:06'),
(4, 'qasim', 'qasim', 'qasim@gmail.com', NULL, '$2y$10$7NDIH6KHSvWWNcDybxq.S.vIBVaZT5t5VVbshlVKe65nJpZOgHp7i', 'client', NULL, '2020-02-16 09:14:07', '2020-02-16 09:14:07'),
(5, 'bilal', 'bilal', 'bilal@gmail.com', NULL, '$2y$10$Z6IOx0oARXDoI9yTxUpueObd0TP6b.UjVvyBq/VTMLXtlkV.lqea6', 'client', NULL, '2020-02-16 09:25:53', '2020-02-16 09:25:53'),
(6, 'ahmedawan', 'ahmedawan', 'ahmedawan@gmail.com', NULL, '$2y$10$smcCy4ZI56p2HUUQb.i8QOC2o3LMl21B.75qKTbxdkULnE6s3uXfO', 'client', NULL, '2020-02-17 09:30:27', '2020-02-17 09:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_trans`
--

DROP TABLE IF EXISTS `user_trans`;
CREATE TABLE `user_trans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `purpose` enum('user_account_create','refer_user','share_post') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('','send','receive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `extra` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_trans`
--

INSERT INTO `user_trans` (`id`, `user_id`, `purpose`, `type`, `status`, `title`, `description`, `amount`, `extra`, `created_at`, `updated_at`) VALUES
(2, 3, 'user_account_create', '', '', 'Create Account', 'You have create account with the referral', 5.00, '', '2020-02-16 09:13:06', '2020-02-16 09:13:06'),
(3, 4, 'user_account_create', '', '', 'Create Account', 'You have create account with the referral', 5.00, 'Referral ID is 3', '2020-02-16 09:14:07', '2020-02-16 09:14:07'),
(4, 3, 'refer_user', '', '', 'Refer User', 'You have refer the User', 10.00, 'Referral ID is 4', '2020-02-16 09:14:07', '2020-02-16 09:14:07'),
(5, 5, 'user_account_create', '', '', 'Create Account', 'You have create account with the referral', 5.00, 'Referral ID is 4', '2020-02-16 09:25:53', '2020-02-16 09:25:53'),
(6, 4, 'refer_user', '', '', 'Refer User', 'You have refer the User', 10.00, 'Referral ID is 5', '2020-02-16 09:25:53', '2020-02-16 09:25:53'),
(7, 6, 'user_account_create', '', '', 'Create Account', 'You have create account with the referral', 5.00, '', '2020-02-17 09:30:27', '2020-02-17 09:30:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trial_balances`
--
ALTER TABLE `trial_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_trans`
--
ALTER TABLE `user_trans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trial_balances`
--
ALTER TABLE `trial_balances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_trans`
--
ALTER TABLE `user_trans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
