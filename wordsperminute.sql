-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 02:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wordsperminute`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_03_26_084304_tests', 1),
(10, '2023_03_26_084304_create_tests_table', 2),
(11, '2023_03_31_105809_create_tests_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `accuracy` double(8,2) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`user_id`, `score`, `accuracy`, `time`) VALUES
(4, 40, 100.00, '2023-04-04 04:09:38'),
(4, 43, 99.59, '2023-04-04 04:11:00'),
(4, 27, 93.92, '2023-04-04 04:12:15'),
(5, 36, 96.48, '2023-04-04 09:48:40'),
(2, 39, 97.41, '2023-04-04 09:54:06'),
(9, 32, 100.00, '2023-04-04 09:55:31'),
(9, 41, 96.76, '2023-04-04 09:59:35'),
(8, 19, 97.14, '2023-04-04 10:01:38'),
(3, 32, 100.00, '2023-04-04 10:07:04'),
(6, 41, 6.23, '2023-04-04 10:08:47'),
(7, 38, 66.38, '2023-04-04 10:10:54'),
(1, 38, 99.62, '2023-04-09 12:21:17'),
(1, 37, 97.57, '2023-04-09 12:23:35'),
(1, 33, 97.70, '2023-04-09 12:25:32'),
(1, 44, 98.54, '2023-04-10 01:02:03'),
(1, 41, 100.00, '2023-04-10 01:05:07'),
(1, 43, 100.00, '2023-04-10 01:22:34'),
(3, 14, 96.15, '2023-04-10 16:48:00'),
(1, 27, 95.98, '2023-04-12 01:09:21'),
(1, 40, 93.90, '2023-04-12 01:12:28'),
(1, 34, 94.42, '2023-04-12 01:22:47'),
(1, 47, 98.29, '2023-04-12 01:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `highscore` int(11) NOT NULL,
  `high_acc` double(8,2) NOT NULL,
  `lastscore` int(11) NOT NULL,
  `last_acc` double(8,2) NOT NULL,
  `avgscore` int(11) NOT NULL,
  `tests_completed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `highscore`, `high_acc`, `lastscore`, `last_acc`, `avgscore`, `tests_completed`) VALUES
(1, 'heyharshal', 'heyharshal@gmail.com', '$2y$10$MbZm22ua07eLdy5tL7kgzut9Az7iu3IQruZGwb1ZI94PRB2HCDXu.', 'JZJvcwsMvQQz6kbie0CuMIwutPzK6Kjo88nwHQC1F5Bw1zInMmSM1FcFf2lT', '2023-03-26 03:15:57', '2023-04-12 01:29:43', 47, 98.29, 47, 98.29, 38, 24),
(2, 'John', 'john@gmail.com', '$2y$10$SxQDTYcdXJcd2EGq2EZ64OzxZ7SxeBJlAn1ahMeNYiZHj.2i2Rdxa', 'ZduNQECNPHNIyCI4GPXAGmeNviXZ7mU7oUSGx6nuguePI58ZmfVpjS1CdzDO', '2023-03-31 09:15:59', '2023-04-04 09:54:07', 39, 97.41, 39, 97.41, 39, 1),
(3, 'bob', 'bob@gmail.com', '$2y$10$o/qrtzkBg4E9jdRArIlPcOGK6X2pbqHy1hl4m3RQI8Pc3/1fxFU.O', '4pkCLy0J6UWMUrsNUC3qvlRVDWxM8ypRZzHC8efltsaARwuiZNNyJbRWuAPg', '2023-04-04 03:34:04', '2023-04-10 16:48:01', 32, 100.00, 14, 96.15, 23, 2),
(4, 'alice', 'alice@gmail.com', '$2y$10$Lkr8FqwRFC.i7JeixyqJcOUTIEY2Xs0a9LtoGyDiEayU5g3YUJe26', 'jXZBnzJtDxggJtf56HJWCQt8WxFsxDud84m2qQRu6sWzBcY7JX2VZJFZaw24', '2023-04-04 03:34:40', '2023-04-04 04:12:16', 43, 99.59, 27, 93.92, 37, 3),
(5, 'charlie', 'charlie@gmail.com', '$2y$10$NXWjLfxdFrtDTYD3Ud3B2.puxt90Hw5gw6tvlK.ziIOuGcCK73JwK', 'CmBzcisy2iW6nky8cdJrHWerWc5gyDxxnV5LKszFBjhjpXgz1rdYuUMiVntR', '2023-04-04 09:27:46', '2023-04-04 09:48:41', 36, 96.48, 36, 96.48, 36, 1),
(6, 'Mark', 'mark@gmail.com', '$2y$10$uiJm9RCsEh8fI20E3gvGV.ROyC6GqpN69D7hk0rX/x/ca73AUeSwC', '850ch3kiXyM1vXAn28cSZXFSTfI82kf94iTIVzbGpcZz0xC73IZBPrVl0vbp', '2023-04-04 09:28:23', '2023-04-04 10:08:48', 41, 6.23, 41, 6.23, 41, 1),
(7, 'Johan', 'johan@gmail.com', '$2y$10$PnWZD5ut5GW2L7eeJltDTODI1vzFZL774OeZiH6eoLBvNBNA2ovsq', '4xOWRY2VOY72tbaDhBB9SjPx13FWQnssi10A6bz55XjdjkzOXFELLUkpw4f7', '2023-04-04 09:29:01', '2023-04-04 10:10:55', 38, 66.38, 38, 66.38, 38, 1),
(8, 'peter', 'peter@gmail.com', '$2y$10$Rq5PbLYRM9IX5tMS3zsVzuSr9rEzI8pSegU5uD3B39WssKwsToKa.', '1SEoM1vMgyIvMTTFcKv9UxKCk3XUVKGkpmiISouUtqB850RICjmQxUMCovLk', '2023-04-04 09:30:14', '2023-04-04 10:01:39', 19, 97.14, 19, 97.14, 19, 1),
(9, 'George', 'george@gmail.com', '$2y$10$1SnbUAkLF0B33IVP//AzhuvOGUnTR3E3zbjHon57s/NVpXsT69GMe', 'XJbZXbSDGpyMnJedPnx90oJWaIaT2kILbkQ4nVGbPey1CP8FlvJgAQR5IBHX', '2023-04-04 09:31:06', '2023-04-04 09:59:36', 41, 96.76, 41, 96.76, 37, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD KEY `tests_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
