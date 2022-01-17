-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 12:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

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
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_name`, `description`, `amount`, `trainer_id`, `created_at`, `updated_at`) VALUES
(4, 'Khair', 'daf', 13, 40, '2021-10-16 13:43:37', '2021-10-16 15:53:45'),
(5, 'Cost', 'adasf', 1342, 38, '2021-10-16 15:34:24', '2021-10-30 12:23:54');

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
  `payment_counter` int(11) DEFAULT NULL,
  `package_id` int(222) DEFAULT NULL,
  `payment_type` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `amount` int(222) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `email`, `phone`, `trainer_id`, `password`, `package_name`, `package_counter`, `payment_counter`, `package_id`, `payment_type`, `payment_date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Anikur', 'farrakh', 'samiul819@gmail.com', 2435, NULL, '$2y$10$p5mLOdBTYc5F2a0aXTux6eguU1yUXGaZgTvzQV.OdghFWl9GhCxFq', NULL, 1, 1, 19, 'cash', '2021-10-04 20:12:00', NULL, '2021-10-22 07:57:06', '2021-10-22 08:12:29'),
(2, 'Ayon', 'Roy', 'ayom@aiub.edu', 132452, NULL, '$2y$10$ClI8kcOsSP/tUqWvsKAMVezh8/psTPrOmiILk7aIlv7.CPhGzn7Ae', NULL, 1, 1, 12, 'Bkash', '2021-10-02 16:25:00', NULL, '2021-10-22 07:57:22', '2021-10-29 04:25:28'),
(3, 'Essat', '1as', 'anikaq9@aiub.edu113', 54356, NULL, '$2y$10$kO.4.vSZXz/zGdtgWsNw6ec6XRxd7.Xp1oxy3dZWHY/cF8bNMDzuC', NULL, 1, 1, 12, 'Bkash', '2021-10-06 20:03:00', NULL, '2021-10-22 07:57:35', '2021-10-22 08:03:32'),
(5, 'Anikur', 'farrakh', 'samiul89@gmail.com123', 325423, NULL, '$2y$10$07DtVlIsCUDLEM0p00vIVOPaVIZY8nQL0nkGXwL4eB/GZ3Lmd2QIW', NULL, 1, 1, 16, 'Card', '2021-10-31 00:19:00', NULL, '2021-10-30 12:17:43', '2021-10-30 12:19:21');

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
(10, '2021_09_19_140317_create_members_table', 7),
(11, '2021_10_07_182252_create_expenses_table', 8);

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
(7, '120% discount', 70, '2021-10-05 03:52:02', '2021-10-10 05:24:34'),
(12, '70% discount', 211, '2021-10-10 04:11:16', '2021-10-10 05:24:06'),
(16, 'Buy One Get one', 99, '2021-10-10 07:25:36', '2021-10-13 02:02:51'),
(19, 'Hot Offer', 300, '2021-10-10 07:41:58', '2021-10-13 02:02:30');

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
  `payment_counter` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `package_id`, `package_name`, `member_id`, `member_name`, `amount`, `payment_type`, `payment_counter`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 2, NULL, NULL, 'Bkash', NULL, '2021-10-10 20:42:46', '2021-10-10 20:42:46');

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
  `salary` int(11) DEFAULT NULL,
  `password` varchar(222) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `trainer_name`, `email`, `salary`, `password`, `phone`, `created_at`, `updated_at`) VALUES
(36, 'defini', 'samiul89@gmail.com', NULL, '$2y$10$1CHXyCjKPuGJ8PIvHMhPWeVCOgc.SgJRNlVhidU740PK5iUpleYcm', 76869, '2021-10-07 06:51:42', '2021-10-10 14:44:46'),
(38, 'Helal Uddin', 'helal12@gmail.com', NULL, '$2y$10$HekuZ73GfupOeW3Q7uLKfOERgB/YSVwjp1i6bcvn4Vy3ICvklDINq', 199213, '2021-10-10 12:46:21', '2021-10-10 12:46:21'),
(40, 'daf Guard', 'samiulsiam89@gmail.com', NULL, '$2y$10$FA0suC/c8tpHwgbj5JE8VeWsEIhzGROyUGdksCtst/wqS5hfjG9iC', 425, '2021-10-11 09:47:43', '2021-10-11 09:47:43');

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
(6, 'MD. SAMIUL', 'HOQUE', 'samiulsiam59@gmail.com', 1780882914, 4, 4, '$2y$10$G5g7hFaIZ/8FhIknkw5SCeYyHDsME0fMRPFP2nJnwojIm9SNR8ZRm', 'admin', '2021-09-07 11:32:24', '2021-09-07 11:32:24'),
(7, 'Ziaul', 'Hoque', 'Ziaul54@gmailcom', 1780882914, 5, 5, '$2y$10$cduZIywxiTxULNyBdnvWCeJ715XO3SC6Seh0E0XhR/zrGPps/jd5q', 'member', '2021-09-07 11:49:10', '2021-09-07 11:49:10'),
(8, 'Jubaer', 'Ahmad', 'jubaer90@gmail.com', 1780882914, 6, 6, '$2y$10$s7vD5Byg3Fjlf9wASCqGzuxqtxPOGDmsfOs.9OV/mvwHUqWmMCe9W', 'admin', '2021-09-07 12:16:19', '2021-09-07 12:16:19'),
(9, 'Raihan', 'Ferdous', 'rabbi456@yahoo.com', 1780882914, 15, 15, '$2y$10$xh3Q4fUeGNsobqX.dpvQwu9AcM.al8WpOwRA0whY9qzITYM8DtQLq', 'member', '2021-09-07 13:20:25', '2021-09-07 13:20:25'),
(10, 'Anik', 'Vii', 'anikvi@gmail.com', 1780882914, 20, 20, '$2y$10$/MqDWCfh9bMb6O6GKxuPuuuqkD1vn1hu7QjMjvcdBr0zii6zGRQ4K', 'member', '2021-09-08 11:01:12', '2021-09-08 11:01:12'),
(11, 'Raihan', 'Uddin', 'raihanudding54@gmail.com', 1780882914, 13, 0, '$2y$10$CFY5YjaHbEB5Qu.4J7U6kOehlwC.wRgLmSOLzAXqznpD2JcO4379i', 'member', '2021-09-11 11:11:54', '2021-09-11 11:11:54'),
(12, 'Sharman akter', 'Mumu', 'mumi45@gmail.com', 1780882914, 14, 0, '$2y$10$cl697mO6lYjt2PTXOAbZD.eVXB4lNY0egPvyoKNzjj1L76eXt83sW', 'member', '2021-09-11 11:23:40', '2021-09-11 11:23:40'),
(13, 'Md Nazmul', 'Hoque', 'namzul121@gmail.com', 1780882914, 21, 0, '$2y$10$x6keKIsI4/imupVEi68b4OmFwplT6P/KC1hzqvEaTy8BhJHa7PCd.', 'member', '2021-09-11 11:50:47', '2021-09-11 11:50:47'),
(14, 'Lionel', 'Messi', 'messi@gmail.com', 1780882914, 19, 0, '$2y$10$rBK0xP6ZQDQ/X9hz/1dU8u5H7RUrwFr8oU7KFFJQAUKBjV6NW7Lli', 'member', '2021-09-11 13:06:16', '2021-09-11 13:06:16'),
(15, 'adada', 'dsafs', 'samiul89@gmail.com1231', 324, 21111222, 0, '$2y$10$KHIw/91KlejAb6vM3n/04eACYULe6GuJIkCml8Mcxm2eiduVAgXb2', 'member', '2021-10-04 12:00:29', '2021-10-04 12:00:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
