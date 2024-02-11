-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 06:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycart`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `published` tinyint(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`, `published`) VALUES
(1, 1, 2, 1, '2024-02-05 14:20:54', '2024-02-06 03:00:56', 0),
(4, 2, 3, 1, '2024-02-05 17:34:37', '2024-02-06 04:55:07', 0),
(5, 1, 3, 1, '2024-02-06 03:02:54', '2024-02-06 03:03:03', 0),
(6, 1, 1, 1, '2024-02-06 03:02:58', '2024-02-06 03:03:03', 0),
(7, 1, 1, 1, '2024-02-06 03:21:56', '2024-02-06 03:21:58', 0),
(8, 1, 3, 1, '2024-02-06 03:29:09', '2024-02-06 03:29:11', 0),
(9, 1, 2, 1, '2024-02-06 03:49:51', '2024-02-06 03:49:53', 0),
(10, 1, 1, 1, '2024-02-06 03:51:02', '2024-02-06 03:51:03', 0),
(11, 1, 2, 2, '2024-02-06 03:56:57', '2024-02-06 03:57:03', 0),
(12, 1, 2, 2, '2024-02-06 04:02:58', '2024-02-09 11:36:48', 0),
(13, 1, 3, 1, '2024-02-06 04:24:51', '2024-02-09 11:39:00', 0),
(14, 2, 2, 1, '2024-02-06 04:59:35', '2024-02-07 12:30:19', 0),
(16, 2, 3, 1, '2024-02-08 05:02:50', '2024-02-08 05:02:56', 0),
(17, 2, 1, 1, '2024-02-08 05:03:04', '2024-02-08 05:03:08', 0),
(18, 2, 2, 3, '2024-02-08 05:03:13', '2024-02-08 05:04:01', 0),
(19, 2, 3, 2, '2024-02-08 05:04:05', '2024-02-08 05:04:11', 0),
(20, 2, 1, 1, '2024-02-08 05:04:16', '2024-02-08 05:04:18', 0),
(21, 2, 2, 2, '2024-02-08 05:23:30', '2024-02-08 05:23:32', 1),
(22, 2, 3, 1, '2024-02-08 08:14:52', '2024-02-08 08:14:52', 1),
(23, 1, 1, 1, '2024-02-08 08:16:01', '2024-02-09 11:40:27', 0),
(24, 1, 3, 2, '2024-02-09 11:48:09', '2024-02-09 11:49:17', 0),
(25, 1, 2, 2, '2024-02-09 11:49:59', '2024-02-09 11:50:07', 0),
(26, 1, 3, 1, '2024-02-10 16:24:34', '2024-02-11 17:02:05', 0),
(27, 10, 1, 2, '2024-02-11 15:55:29', '2024-02-11 15:56:02', 0),
(29, 11, 1, 1, '2024-02-11 16:00:57', '2024-02-11 16:01:32', 0),
(30, 11, 3, 2, '2024-02-11 16:01:05', '2024-02-11 16:01:32', 0);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Preparing',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 'Shipped', '2024-02-05 19:21:58', '2024-02-06 23:27:02'),
(2, 1, 3, 0, 'Shipped', '2024-02-05 19:29:11', '2024-02-06 23:22:46'),
(3, 1, 2, 1, 'Shipped', '2024-02-05 19:49:53', '2024-02-07 04:23:00'),
(4, 1, 1, 1, 'Shipped', '2024-02-05 19:51:04', '2024-02-06 23:22:46'),
(5, 1, 2, 2, 'Shipped', '2024-02-05 19:57:03', '2024-02-06 23:22:46'),
(6, 2, 3, 1, 'Shipped', '2024-02-05 20:55:07', '2024-02-07 04:27:22'),
(7, 2, 2, 1, 'Shipped', '2024-02-07 04:30:19', '2024-02-07 04:32:16'),
(8, 2, 3, 1, 'Shipped', '2024-02-07 21:02:56', '2024-02-11 04:25:59'),
(9, 2, 1, 1, 'Preparing', '2024-02-07 21:03:08', '2024-02-07 21:03:08'),
(10, 2, 2, 3, 'Preparing', '2024-02-07 21:04:01', '2024-02-07 21:04:01'),
(11, 2, 3, 2, 'Shipped', '2024-02-07 21:04:11', '2024-02-08 01:43:52'),
(12, 2, 1, 1, 'Preparing', '2024-02-07 21:04:18', '2024-02-07 21:04:18'),
(13, 1, 2, 2, 'Preparing', '2024-02-09 03:36:48', '2024-02-09 03:36:48'),
(14, 1, 3, 1, 'Preparing', '2024-02-09 03:39:00', '2024-02-09 03:39:00'),
(15, 1, 1, 1, 'Preparing', '2024-02-09 03:40:27', '2024-02-09 03:40:27'),
(16, 1, 3, 2, 'Preparing', '2024-02-09 03:49:17', '2024-02-09 03:49:17'),
(17, 1, 2, 2, 'Preparing', '2024-02-09 03:50:07', '2024-02-09 03:50:07'),
(18, 10, 1, 2, 'Preparing', '2024-02-11 07:56:02', '2024-02-11 07:56:02'),
(19, 11, 1, 1, 'Shipped', '2024-02-11 08:01:32', '2024-02-11 08:04:04'),
(20, 11, 3, 2, 'Preparing', '2024-02-11 08:01:32', '2024-02-11 08:01:32'),
(21, 1, 3, 1, 'Preparing', '2024-02-11 09:02:05', '2024-02-11 09:02:05');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('dinisani.alt@gmail.com', '$2y$12$rCMDI06RopWL1fMtxTVwLutP5WmmDdN2Q/YFNQG.kXsavfgFYz1DK', '2024-02-10 08:37:31');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'The Catcher In The Rye', 200.00, 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1398034300i/5107.jpg', 'By J. D. Salinger', 47, 1, '2024-02-05 08:27:14', '2024-02-11 08:01:32'),
(2, 'The Ballad of Reading Gaol', 300.00, 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1371918695i/1329726.jpg', 'By Oscar Wilde', 98, 1, '2024-02-05 08:27:14', '2024-02-09 03:50:07'),
(3, 'Salina', 250.00, 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1352265287i/1672275.jpg', 'By A. Samad Said', 95, 1, '2024-02-05 08:27:14', '2024-02-11 09:02:05'),
(5, 'Fantastic Mr. Fox', 50.00, 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1390097292i/6693.jpg', 'By Roald Dahl', 151, 1, '2024-02-11 04:28:30', '2024-02-11 04:28:30'),
(6, 'Oliver Twist', 75.00, 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1347416373i/2638397.jpg', 'By Charles Dickens', 67, 1, '2024-02-11 04:46:15', '2024-02-11 04:46:15'),
(8, 'The Snow Queen', 320.00, 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1575320573i/4410849.jpg', 'By Hans Christian Andersen', 34, 1, '2024-02-11 08:03:02', '2024-02-11 08:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'customer',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'customer', 'Nur Dini', 'dinisani.alt@gmail.com', NULL, '$2y$12$Vn53B.U2QPWjwa7iW.ebiu4MnHZs1K.qQEvu4WBBau.El2VyEOyQm', 'Jopyaj0oJk6CC9KcL5dJKk6Y7lUu4Km9VN1ZbTd1Thu4jLZJ8a9SSd82Qmux', '2024-02-05 00:01:33', '2024-02-05 00:01:33'),
(2, 'customer', 'Nazhif', 'nazhif@gmail.com', NULL, '$2y$12$AUYNI0sHt47jUCkcfpHdR.pAPEpAGbO19T8eC4.a8oCuZY6UtNtTC', NULL, '2024-02-05 09:34:15', '2024-02-05 09:34:15'),
(6, 'admin', 'dini', 'dini@localuser', NULL, '$2y$12$KargiLtTzusV6hNSSjIMSOBYlVsF8i9nvwxjsThxypnHZAh8Beg1K', NULL, '2024-02-07 19:45:03', '2024-02-07 19:45:03'),
(8, 'admin', 'nana', 'nana@localuser', NULL, '$2y$12$cTEPIgrzByigVHka8N6fJ.pEFJHu1ot1qmRbuzJk7GxzSujo1diRG', NULL, '2024-02-08 01:41:50', '2024-02-08 01:41:50'),
(10, 'customer', 'nur', 'nur@gmail.com', NULL, '$2y$12$zsAmb7QJRDVwitFjdHAPGeudOatO.pYPXsFbk.E7CQRD1Hr1odSEm', NULL, '2024-02-11 07:55:10', '2024-02-11 07:55:10'),
(11, 'customer', 'hana', 'hana@gmail.com', NULL, '$2y$12$qeCqlLLn9KF7OxBEFF8Uz.U1xMIpPpVTidX6D6l9p6vxlyP7zql4m', NULL, '2024-02-11 08:00:48', '2024-02-11 08:00:48'),
(12, 'admin', 'nini', 'nini@gmail.com', NULL, '$2y$12$EnZO5w8CKP7rP3Phbh6j8.1p21ohFd0HgpNL5InN8w81PaiByIQk2', NULL, '2024-02-11 08:05:02', '2024-02-11 08:05:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
