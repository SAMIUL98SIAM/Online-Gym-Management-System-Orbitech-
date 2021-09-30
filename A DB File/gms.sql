-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 06:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gms`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(222) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(222) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(100) NOT NULL,
  `trainer_id` int(100) DEFAULT NULL,
  `password` varchar(222) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_name` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_counter` int(11) DEFAULT NULL,
  `package_id` int(222) DEFAULT NULL,
  `payment_type` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(222) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `email`, `phone`, `trainer_id`, `password`, `package_name`, `package_counter`, `package_id`, `payment_type`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Mohammad Nazmul', 'Hoque', 'nazmul34@gmail.com', 1780882914, NULL, '$2y$10$b8BEHGKhVLZc6JlZ67Za3e9NlHE6B41roxt.bKdUeZimFeEV2NGdC', NULL, NULL, NULL, '', NULL, '2021-09-19 08:16:59', '2021-09-21 04:22:55'),
(2, 'Sharman akter', 'Mumu', 'mumucute9@gmail.com', 1780882914, 14, '$2y$10$nvVUTp8EM/h6IcLuQETZF.iaN8gVZbwAzdW.4IVFxzyblFUXr9T.2', NULL, NULL, NULL, '', NULL, '2021-09-19 08:17:27', '2021-09-21 00:37:37'),
(3, 'Samiul', 'Hoque', 'samiulsiam59@gmail.com', 1325435, NULL, '$2y$10$kc71CZGj2SCAxlULTgMKyeYoXxmWYGCYUCNgbFLHMypf0JgmOyB1G', NULL, 1, 5, '', NULL, '2021-09-19 08:48:56', '2021-09-22 04:07:30'),
(4, 'Mohmmad, Aminul', 'Hoque', 'Amnul121@gmail.com', 1111, NULL, '$2y$10$cTU2IwxSK6N0X1jkkWsr5ecfXOoGjLuevSOQHuKYuT5JKID0/2dVe', NULL, 1, 3, '', NULL, '2021-09-19 08:49:18', '2021-09-21 00:40:17'),
(5, 'Md Al amin', 'Hossain', 'anamul145@gmail.com', 1780882914, NULL, '$2y$10$EAWln3i7CdmGIQJQj5Truud/ZLdIc141wWxL6DrG4VdATZpjQXa02', NULL, 1, 2, '', NULL, '2021-09-19 08:49:41', '2021-09-20 22:30:22'),
(6, 'Raihan', 'Hoque', 'raihan54@gmail.com', 9909779, NULL, '$2y$10$hxnP/IBCCpZ72A44uErTIOa/EKYFf1DnqurtazrE9gbWbKNEYWMZC', NULL, NULL, NULL, '', NULL, '2021-09-19 08:50:00', '2021-09-23 14:04:05'),
(7, 'Rafiur', 'Hoque', 'Rafiur12@gmail.com', 1780882914, NULL, '$2y$10$ijEBsFOV9ifrM5VTuDxiPu2/A4HDg9jcPJXsfDk2uH.2U/DGhT3l6', NULL, 1, 1, '', NULL, '2021-09-19 08:50:14', '2021-09-21 21:48:56'),
(8, 'Mohammad Shariful', 'Khan', 'Shariful69@gmail.com', 1992569682, NULL, '$2y$10$ww2Y1tLOq0xJixmQY29mfe1ULf8ISEEmyOrfVFcG5OnwDPklt1yya', NULL, NULL, NULL, NULL, NULL, '2021-09-21 00:31:12', '2021-09-21 04:43:47'),
(9, 'Anik', 'vii', 'Atowar14@gmail.com', 12314253, NULL, '$2y$10$77ySe89WG6nZd/mmfwAmh.ccUckIc2Pn3oNAnE/yJk9uehmE3EFUW', NULL, NULL, NULL, NULL, NULL, '2021-09-21 04:14:55', '2021-09-21 04:18:05'),
(10, 'Mohammad Nazmul', 'Khan', 'samiulsm19@gmail.com', 123, NULL, '$2y$10$esJYBB0yviiKDAkXd/fMbeAfn/r2UCcsYaFZHbYav71jBdSUB42La', NULL, 1, 1, NULL, NULL, '2021-09-23 13:34:08', '2021-09-23 13:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_09_06_054316_create_users_table', 3),
(7, '2021_09_07_184306_create_trainers_table', 4),
(8, '2021_09_08_105408_create_payments_table', 5),
(9, '2021_09_08_223004_create_packages_table', 6),
(10, '2021_09_19_140317_create_members_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(222) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `amount`, `created_at`, `updated_at`) VALUES
(1, '90% discount', 123, '2021-09-21 12:28:59', '2021-09-21 12:28:59'),
(2, '50% discount', 432, '2021-09-21 12:29:13', '2021-09-21 12:29:13'),
(3, 'Alesha Card Offer', 900, '2021-09-21 12:29:27', '2021-09-21 12:29:27'),
(4, 'Hot Offer', 111, '2021-09-21 12:29:51', '2021-09-21 12:29:51'),
(5, 'Alesha Card Offer', 980, '2021-09-22 04:06:45', '2021-09-22 04:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `package_name` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `member_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(222) DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `package_id`, `package_name`, `member_id`, `member_name`, `amount`, `payment_type`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 4, NULL, NULL, 'Bkash', '2021-09-21 21:42:00', '2021-09-21 21:42:00'),
(2, NULL, NULL, 5, NULL, NULL, 'Card', '2021-09-21 21:46:48', '2021-09-21 21:46:48'),
(3, NULL, NULL, 7, NULL, NULL, 'card', '2021-09-21 21:49:06', '2021-09-21 21:49:06'),
(4, NULL, NULL, 3, NULL, NULL, 'cash', '2021-09-21 23:35:15', '2021-09-21 23:35:15'),
(5, NULL, NULL, 4, NULL, NULL, 'Bkash', '2021-09-22 04:08:27', '2021-09-22 04:08:27'),
(7, NULL, NULL, 10, NULL, NULL, 'Bkash', '2021-09-23 13:51:55', '2021-09-23 13:51:55'),
(8, NULL, NULL, 3, NULL, NULL, 'cash', '2021-09-23 14:01:56', '2021-09-23 14:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trainer_name` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(222) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(222) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `trainer_name`, `email`, `password`, `phone`, `created_at`, `updated_at`) VALUES
(14, 'Alimullah', 'anikvi@gmail.com', '$2y$10$VT0Ujp1m9weA58eSxZXqiunWvXuhNDf9dfBW65ownRgxRWWGE5bQ2', 1780882914, '2021-09-18 10:52:04', '2021-09-18 10:52:04'),
(27, 'tashfiq Zahid', '18-38844-3@student.aiub.edu', '$2y$10$k0PTzlSSJ/zIPQxTa92yduKGpLzK6A1RmxXMZNp.g5KNQOsb07pNW', 1111, '2021-09-22 03:22:05', '2021-09-22 03:22:05'),
(28, 'Eaffat', 'rajib113@student.aiub.edu', '$2y$10$Wg82QFIsFKQRwVFf4DkQouWVvUPRVBUBt1qU4.4aa6SQOX29IusQm', 1780882914, '2021-09-22 03:22:11', '2021-09-22 03:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `member_id`, `trainer_id`, `password`, `type`, `created_at`, `updated_at`) VALUES
(6, 'MD. SAMIUL', 'HOQUE', 'samiul89@gmail.com', 1780882914, 4, 4, '$2y$10$omF3d6lUCO//j96yslIycOgonHRsQtpbU0yoVUp/IEOmp5y5XjPqy', 'admin', '2021-09-07 11:32:24', '2021-09-07 11:32:24'),
(7, 'Ziaul', 'Hoque', 'Ziaul54@gmailcom', 1780882914, 5, 5, '$2y$10$cduZIywxiTxULNyBdnvWCeJ715XO3SC6Seh0E0XhR/zrGPps/jd5q', 'member', '2021-09-07 11:49:10', '2021-09-07 11:49:10'),
(8, 'Jubaer', 'Ahmad', 'jubaer90@gmail.com', 1780882914, 6, 6, '$2y$10$s7vD5Byg3Fjlf9wASCqGzuxqtxPOGDmsfOs.9OV/mvwHUqWmMCe9W', 'admin', '2021-09-07 12:16:19', '2021-09-07 12:16:19'),
(9, 'Raihan', 'Ferdous', 'rabbi456@yahoo.com', 1780882914, 15, 15, '$2y$10$xh3Q4fUeGNsobqX.dpvQwu9AcM.al8WpOwRA0whY9qzITYM8DtQLq', 'member', '2021-09-07 13:20:25', '2021-09-07 13:20:25'),
(10, 'Anik', 'Vii', 'anikvi@gmail.com', 1780882914, 20, 20, '$2y$10$/MqDWCfh9bMb6O6GKxuPuuuqkD1vn1hu7QjMjvcdBr0zii6zGRQ4K', 'member', '2021-09-08 11:01:12', '2021-09-08 11:01:12'),
(11, 'Raihan', 'Uddin', 'raihanudding54@gmail.com', 1780882914, 13, 0, '$2y$10$CFY5YjaHbEB5Qu.4J7U6kOehlwC.wRgLmSOLzAXqznpD2JcO4379i', 'member', '2021-09-11 11:11:54', '2021-09-11 11:11:54'),
(12, 'Sharman akter', 'Mumu', 'mumi45@gmail.com', 1780882914, 14, 0, '$2y$10$cl697mO6lYjt2PTXOAbZD.eVXB4lNY0egPvyoKNzjj1L76eXt83sW', 'member', '2021-09-11 11:23:40', '2021-09-11 11:23:40'),
(13, 'Md Nazmul', 'Hoque', 'namzul121@gmail.com', 1780882914, 21, 0, '$2y$10$x6keKIsI4/imupVEi68b4OmFwplT6P/KC1hzqvEaTy8BhJHa7PCd.', 'member', '2021-09-11 11:50:47', '2021-09-11 11:50:47'),
(14, 'Lionel', 'Messi', 'messi@gmail.com', 1780882914, 19, 0, '$2y$10$rBK0xP6ZQDQ/X9hz/1dU8u5H7RUrwFr8oU7KFFJQAUKBjV6NW7Lli', 'member', '2021-09-11 13:06:16', '2021-09-11 13:06:16');

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
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_id` (`member_id`,`trainer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
