-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 02:47 PM
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
-- Database: `likpon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahans`
--

CREATE TABLE `bahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_bahan` varchar(255) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `minimum_stok` int(11) NOT NULL,
  `harga_terakhir` decimal(8,2) NOT NULL,
  `tanggal_terakhir_stok` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahans`
--

INSERT INTO `bahans` (`id`, `nama_bahan`, `jumlah_stok`, `satuan`, `minimum_stok`, `harga_terakhir`, `tanggal_terakhir_stok`, `created_at`, `updated_at`) VALUES
(1, 'Beras', 100, 'kg', 10, 15000.00, '2024-12-03', '2024-12-03 05:30:13', '2024-12-03 05:30:13'),
(2, 'Ayam', 50, 'ekor', 5, 30000.00, '2024-12-03', '2024-12-03 05:30:13', '2024-12-03 05:30:13'),
(3, 'Bebek', 30, 'ekor', 3, 60000.00, '2024-12-03', '2024-12-03 05:30:13', '2024-12-03 05:30:13'),
(4, 'Ikan Nila', 40, 'ekor', 4, 25000.00, '2024-12-03', '2024-12-03 05:30:13', '2024-12-03 05:30:13'),
(5, 'Burung Puyuh', 25, 'ekor', 2, 20000.00, '2024-12-03', '2024-12-03 05:30:13', '2024-12-03 05:30:13'),
(6, 'Tomat', 50, 'kg', 5, 12000.00, '2024-12-03', '2024-12-03 05:30:13', '2024-12-03 05:30:13'),
(7, 'Cabai', 30, 'kg', 5, 25000.00, '2024-12-03', '2024-12-03 05:30:13', '2024-12-03 05:30:13'),
(8, 'Minyak Goreng', 20, 'liter', 5, 14000.00, '2024-12-03', '2024-12-03 05:30:13', '2024-12-03 05:30:13'),
(9, 'Garam', 10, 'kg', 2, 5000.00, '2024-12-03', '2024-12-03 05:30:13', '2024-12-03 05:30:13'),
(10, 'Gula', 15, 'kg', 3, 14000.00, '2024-12-03', '2024-12-03 05:30:13', '2024-12-03 05:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1733233649),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1733233649;', 1733233649),
('82597532b2c3036496531b98a3d6eb22d1f9d97f', 'i:1;', 1733233277),
('82597532b2c3036496531b98a3d6eb22d1f9d97f:timer', 'i:1733233277;', 1733233277);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `kategori` enum('Makanan','Minuman') NOT NULL,
  `tipe` enum('Ala Carte','Paket') NOT NULL,
  `extra` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `slug`, `price`, `thumbnail`, `kategori`, `tipe`, `extra`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Wader Goreng', 'wader-goreng', 25000.00, '01JE6C0W8WC534Q4G4H714FMS1.jpeg', 'Makanan', 'Ala Carte', 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi', 'Ikan wader goreng renyah tanpa nasi.', '2024-12-03 05:30:13', '2024-12-03 05:40:42'),
(2, 'Ikan Nila Goreng', 'ikan-nila-goreng', 35000.00, '01JE6C2CCT7FHXWCKB0TTF5Q4P.jpeg', 'Makanan', 'Ala Carte', 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi', 'Ikan nila goreng renyah tanpa nasi.', '2024-12-03 05:30:13', '2024-12-03 05:41:31'),
(3, 'Ikan Nila Bakar', 'ikan-nila-bakar', 35000.00, '01JE6C38JVQSG5CEBN8R2QQ5HD.jpeg', 'Makanan', 'Ala Carte', 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi', 'Ikan nila bakar tanpa nasi.', '2024-12-03 05:30:13', '2024-12-03 05:42:00'),
(4, 'Ayam Goreng', 'ayam-goreng', 23000.00, '01JE6C46DEBAZEVVQR9BRHJQ96.jpg', 'Makanan', 'Ala Carte', 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi', 'Ayam goreng tanpa nasi.', '2024-12-03 05:30:13', '2024-12-03 05:42:31'),
(5, 'Ayam Bakar', 'ayam-bakar', 23000.00, '01JE6C53CGEG1ZY9H0HVFC83K5.jpg', 'Makanan', 'Ala Carte', 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi', 'Ayam bakar tanpa nasi.', '2024-12-03 05:30:13', '2024-12-03 05:43:00'),
(6, 'Bebek Goreng', 'bebek-goreng', 35000.00, '01JE6C5WZZJWQG8WQ194V3MDK9.jpg', 'Makanan', 'Ala Carte', 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi', 'Bebek goreng tanpa nasi.', '2024-12-03 05:30:13', '2024-12-03 05:43:26'),
(7, 'Bebek Bakar', 'bebek-bakar', 35000.00, '01JE6C6GJ9Q87MVSGDMSFV1RRZ.jpg', 'Makanan', 'Ala Carte', 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi', 'Bebek bakar tanpa nasi.', '2024-12-03 05:30:13', '2024-12-03 05:43:47'),
(8, 'Kepala Bebek', 'kepala-bebek', 5000.00, '01JE6C7EYK3T42KJT22CRSMDA6.jpeg', 'Makanan', 'Ala Carte', NULL, 'Kepala bebek goreng nikmat.', '2024-12-03 05:30:13', '2024-12-03 05:44:18'),
(9, 'Burung Puyuh Goreng', 'burung-puyuh-goreng', 25000.00, '01JE6C851K17T7TN7KTYEGXXST.jpg', 'Makanan', 'Ala Carte', NULL, 'Burung puyuh goreng dengan rasa nikmat.', '2024-12-03 05:30:13', '2024-12-03 05:44:40'),
(10, 'Es Teh', 'es-teh', 5000.00, '01JE6C8ZN22ZSPZJH67QER9GKT.jpg', 'Minuman', 'Ala Carte', NULL, 'Es teh segar.', '2024-12-03 05:30:13', '2024-12-03 05:45:08'),
(11, 'Teh Hangat', 'teh-hangat', 5000.00, '01JE6C9QMRN138NBPRANAEC1AR.webp', 'Minuman', 'Ala Carte', NULL, 'Teh hangat nikmat.', '2024-12-03 05:30:13', '2024-12-03 05:45:32'),
(12, 'Es Jeruk', 'es-jeruk', 6000.00, '01JE6CA8XGC29FG31JTHPCS1ER.jpg', 'Minuman', 'Ala Carte', NULL, 'Es jeruk segar.', '2024-12-03 05:30:13', '2024-12-03 05:45:50'),
(13, 'Jeruk Hangat', 'jeruk-hangat', 6000.00, '01JE6CAZNEX18CXXYX32EKBXCY.jpg', 'Minuman', 'Ala Carte', NULL, 'Jeruk hangat nikmat.', '2024-12-03 05:30:13', '2024-12-03 05:46:13'),
(14, 'Paket A', 'paket-a', 20000.00, '01JE6CBHYH9H9HPGSSQMN1001K.jpeg', 'Makanan', 'Paket', 'Nasi, Sambal, Lalapan, Ayam Goreng/Bakar', 'Paket lengkap untuk makan siang Anda.', '2024-12-03 05:30:13', '2024-12-03 05:46:32');

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
(33, '0001_01_01_000000_create_users_table', 1),
(34, '0001_01_01_000001_create_cache_table', 1),
(35, '0001_01_01_000002_create_jobs_table', 1),
(36, '2024_09_25_030330_create_menus_table', 1),
(37, '2024_10_29_125829_create_bahans_table', 1),
(38, '2024_10_29_130123_create_pemesanans_table', 1),
(39, '2024_11_05_220303_create_pemesanan_items_table', 1),
(40, '2024_11_19_115231_create_carts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanans`
--

CREATE TABLE `pemesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','completed','canceled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_items`
--

CREATE TABLE `pemesanan_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LN4JVHf4Kos3oHu7mahBheIKPonH2piwrmu6YlXD', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTWl2d1BLVERqaVJyckp1c3pNQzZCUzRrWnlYcVozcG5GODByaXFXTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9tZW51cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRLcDkwUTl1QXVlbWd4enRSVVpGeGhlc0VxMndjRnRWZ1JjZUUvZk01b2lRWFdjeUh1Wm8wZSI7czo4OiJmaWxhbWVudCI7YTowOnt9fQ==', 1733233600);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_code`, `name`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '4CTTBVPE', 'Admin', 'Admin', 'admin@mail.com', '$2y$12$Kp90Q9uAuemgxztRUZFxhesEq2wcFtVgRceE/fM5oiQXWcyHuZo0e', 'xEh8rM3IQw', '2024-12-03 05:30:13', '2024-12-03 05:30:13'),
(2, 'LW5LOSOZ', 'SuperAdmin', 'SuperAdmin', 'superadmin@mail.com', '$2y$12$Kp90Q9uAuemgxztRUZFxhesEq2wcFtVgRceE/fM5oiQXWcyHuZo0e', 'mv5gyTV5E1', '2024-12-03 05:30:13', '2024-12-03 05:30:13'),
(3, 'YPIYFFPB', 'Pelanggan', 'User', 'pelanggan@mail.com', '$2y$12$Kp90Q9uAuemgxztRUZFxhesEq2wcFtVgRceE/fM5oiQXWcyHuZo0e', 'LbitzkQVB4', '2024-12-03 05:30:13', '2024-12-03 05:30:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahans`
--
ALTER TABLE `bahans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanans_user_id_foreign` (`user_id`);

--
-- Indexes for table `pemesanan_items`
--
ALTER TABLE `pemesanan_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanan_items_pemesanan_id_foreign` (`pemesanan_id`),
  ADD KEY `pemesanan_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_unique_code_unique` (`unique_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahans`
--
ALTER TABLE `bahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pemesanans`
--
ALTER TABLE `pemesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan_items`
--
ALTER TABLE `pemesanan_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD CONSTRAINT `pemesanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanan_items`
--
ALTER TABLE `pemesanan_items`
  ADD CONSTRAINT `pemesanan_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_items_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
