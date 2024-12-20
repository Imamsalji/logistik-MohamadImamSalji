-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 09:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_logistik_mohamadimamsalji`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `deskripsi_barang` text DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `deskripsi_barang`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Laptop Asus', 'Laptop Asus dengan spesifikasi tinggi, cocok untuk kebutuhan kerja dan gaming.', 90, NULL, '2024-12-20 01:56:17'),
(2, 'Printer Epson', 'Printer Epson multifungsi dengan kemampuan cetak warna dan hitam putih.', 0, NULL, '2024-12-19 15:39:17'),
(3, 'Monitor LG', 'Monitor LG dengan resolusi Full HD, ideal untuk produktivitas dan hiburan.', 35, NULL, '2024-12-20 06:26:42'),
(4, 'Keyboard Logitech', 'Keyboard Logitech ergonomis dengan fitur wireless untuk kenyamanan mengetik.', 100, NULL, NULL),
(5, 'Mouse Razer', 'Mouse gaming Razer dengan sensor presisi tinggi dan desain ergonomis.', 96, NULL, '2024-12-20 07:32:37'),
(6, 'Laptop', 'Laptop dengan spek tinggi', 10, NULL, NULL),
(7, 'Kulkas', 'Kulkas 2 pintu', 5, NULL, NULL),
(8, 'Smartphone', 'Smartphone dengan kamera 108 MP', 15, NULL, NULL),
(9, 'Televisi', 'Televisi LED 50 inci', 8, NULL, NULL),
(10, 'Kamera', 'Kamera mirrorless dengan lensa kit', 3, NULL, NULL),
(11, 'AC', 'AC 1 PK', 6, NULL, NULL),
(12, 'Microwave', 'Microwave dengan 20 liter kapasitas', 12, NULL, NULL),
(13, 'Mesin Cuci', 'Mesin cuci 1 tabung', 7, NULL, NULL),
(14, 'Blender', 'Blender 3 in 1', 20, NULL, NULL),
(15, 'Rice Cooker', 'Rice cooker 1 liter', 5, NULL, NULL),
(16, 'Fan', 'Kipas angin berdiri', 25, NULL, NULL),
(17, 'Jam Tangan', 'Jam tangan digital', 30, NULL, NULL),
(18, 'Mouse', 'Mouse wireless', 18, NULL, NULL),
(19, 'Keyboard', 'Keyboard mekanik', 14, NULL, NULL),
(20, 'Speaker', 'Speaker bluetooth', 10, NULL, NULL),
(21, 'Power Bank', 'Power bank 10000mAh', 50, NULL, NULL),
(22, 'Tas Ransel', 'Tas ransel multifungsi', 22, NULL, NULL),
(23, 'Sepatu', 'Sepatu olahraga', 28, NULL, NULL),
(24, 'Baju', 'Baju kaos lengan panjang', 33, NULL, NULL),
(25, 'Celana', 'Celana panjang jeans', 19, NULL, NULL),
(26, 'Sandal', 'Sandal casual', 25, NULL, NULL),
(27, 'Kacamata', 'Kacamata hitam', 15, NULL, NULL),
(28, 'Payung', 'Payung lipat', 50, NULL, NULL),
(29, 'Sarung Tangan', 'Sarung tangan winter', 40, NULL, NULL),
(30, 'Dompet', 'Dompet kulit', 15, NULL, '2024-12-20 08:30:34'),
(31, 'Parfum', 'Parfum pria 50ml', 20, NULL, NULL),
(32, 'Shampoo', 'Shampoo anti ketombe', 50, NULL, NULL),
(33, 'Sabun', 'Sabun mandi wangi', 45, NULL, NULL),
(34, 'Lilin', 'Lilin aromaterapi', 60, NULL, NULL),
(35, 'Peralatan Dapur', 'Peralatan dapur set lengkap', 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` bigint(20) UNSIGNED NOT NULL,
  `no_barang_keluar` varchar(150) NOT NULL,
  `kode_barang` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `destination` varchar(150) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `no_barang_keluar`, `kode_barang`, `quantity`, `destination`, `tanggal_keluar`, `created_at`, `updated_at`) VALUES
(1, '40', 2, 30, 'ciawi', '2024-12-12', '2024-12-19 15:39:17', '2024-12-19 15:39:17'),
(3, 'D001', 30, 20, 'ciawi', '2024-12-27', '2024-12-20 08:30:34', '2024-12-20 08:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` bigint(20) UNSIGNED NOT NULL,
  `no_barang_masuk` varchar(150) NOT NULL,
  `kode_barang` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `origin` varchar(150) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `no_barang_masuk`, `kode_barang`, `quantity`, `origin`, `tanggal_masuk`, `created_at`, `updated_at`) VALUES
(1, 'b001', 1, 10, 'Bogor', '2024-12-19', '2024-12-19 15:36:00', '2024-12-19 15:36:00'),
(2, 'b002', 1, 30, 'ciawi', '2023-01-19', '2024-12-20 01:56:16', '2024-12-20 01:56:16'),
(4, 'b003', 3, 15, 'Bogor', '2024-12-25', '2024-12-20 06:26:42', '2024-12-20 06:26:42'),
(5, 'b004', 5, 21, 'kalimantan', '2022-07-16', '2024-12-20 07:32:37', '2024-12-20 07:32:37');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_19_063530_create_barang_table', 1),
(6, '2024_12_19_063608_create_barang_masuk_table', 1),
(7, '2024_12_19_063620_create_barang_keluar_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD UNIQUE KEY `barang_keluar_no_barang_keluar_unique` (`no_barang_keluar`),
  ADD KEY `barang_keluar_kode_barang_foreign` (`kode_barang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD UNIQUE KEY `barang_masuk_no_barang_masuk_unique` (`no_barang_masuk`),
  ADD KEY `barang_masuk_kode_barang_foreign` (`kode_barang`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_kode_barang_foreign` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_kode_barang_foreign` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
