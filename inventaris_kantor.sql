-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2026 at 10:22 PM
-- Server version: 8.4.3
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_kantor`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `harga` bigint NOT NULL,
  `sumber_dana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `kode_barang`, `nama_barang`, `kategori`, `stok`, `harga`, `sumber_dana`, `created_at`, `updated_at`) VALUES
(1, '001', 'Meja Kantor(Minimalist)', 'Peralatan kantor', 5, 150000, 'Operasional', '2026-01-07 12:36:46', '2026-01-07 12:36:46'),
(2, '002', 'Laptop ASUS Vivobook Go 14', 'Elektronik', 3, 6200000, 'Sponsor', '2026-01-07 21:39:50', '2026-01-07 14:53:59'),
(3, '003', 'Monitor LG 24 Inch IPS', 'Elektronik', 10, 1450000, 'Operasional', '2026-01-07 21:39:50', '2026-01-07 21:39:50'),
(4, '004', 'Printer Epson L3210 EcoTank', 'Elektronik', 4, 2350000, 'Sponsor', '2026-01-07 21:39:50', '2026-01-07 14:49:24'),
(5, '005', 'Proyektor Epson EB-E500', 'Elektronik', 2, 5100000, 'Modal', '2026-01-07 21:39:50', '2026-01-07 14:48:52'),
(6, '006', 'UPS APC 700VA', 'Elektronik', 4, 950000, 'Operasional', '2026-01-07 21:39:50', '2026-01-07 21:39:50'),
(7, '007', 'Router TP-Link Archer AX12', 'Elektronik', 5, 550000, 'Operasional', '2026-01-07 21:39:50', '2026-01-07 21:39:50'),
(8, '008', 'Scanner Canon DR-C225', 'Elektronik', 2, 4800000, 'Laba Perusahaan', '2026-01-07 21:39:50', '2026-01-07 14:48:38'),
(9, '009', 'Kursi Kantor Hidrolik Jaring', 'Peralatan kantor', 15, 850000, 'Operasional', '2026-01-07 21:39:50', '2026-01-07 21:39:50'),
(10, '010', 'Meja Kerja Kayu 120cm', 'Peralatan kantor', 10, 700000, 'Operasional', '2026-01-07 21:39:50', '2026-01-07 21:39:50'),
(11, '011', 'Filling Cabinet Besi 4 Laci', 'Peralatan kantor', 5, 1600000, 'Operasional', '2026-01-07 21:39:50', '2026-01-07 14:48:24'),
(12, '012', 'Whiteboard Gantung 120x90', 'Peralatan kantor', 4, 350000, 'Operasional', '2026-01-07 21:39:50', '2026-01-07 21:39:50'),
(13, '013', 'AC Sharp 1/2 PK', 'Elektronik', 3, 3200000, 'Laba Perusahaan', '2026-01-07 21:39:50', '2026-01-07 14:48:12'),
(14, '014', 'Kertas HVS A4 80gr', 'Konsumsi', 50, 55000, 'Operasional', '2026-01-07 21:39:50', '2026-01-07 21:39:50'),
(15, '015', 'Tinta Printer Epson Black', 'Konsumsi', 20, 95000, 'Operasional', '2026-01-07 21:39:50', '2026-01-07 21:39:50'),
(16, '016', 'Stapler Kangaro HD-10', 'Konsumsi', 12, 45000, 'Operasional', '2026-01-07 21:39:50', '2026-01-07 21:39:50'),
(17, '017', 'Mesin Penghancur Kertas', 'Peralatan kantor', 2, 1200000, 'Sponsor', '2026-01-07 21:39:50', '2026-01-07 14:47:56'),
(18, '018', 'Dispenser Galon Bawah', 'Keperluan kantor', 2, 1850000, 'Operasional', '2026-01-07 21:39:50', '2026-01-07 21:39:50'),
(19, '019', 'Coffee Maker Drip', 'Keperluan kantor', 1, 450000, 'Operasional', '2026-01-07 21:39:50', '2026-01-07 21:39:50'),
(21, '021', 'Kotak P3K Lengkap Isi', 'Keperluan kantor', 5, 250000, 'Operasional', '2026-01-07 21:39:50', '2026-01-07 21:39:50'),
(22, '022', 'jajanan', 'konsumsi', 100, 300000, 'Operasional', '2026-01-07 14:47:01', '2026-01-07 14:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `barang_ctrollers`
--

CREATE TABLE `barang_ctrollers` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_01_07_151718_add_role_to_users_table', 1),
(6, '2026_01_07_152701_create_barangs_table', 1),
(7, '2026_01_07_153032_create_barang_ctrollers_table', 1),
(8, '2026_01_07_190716_create_suppliers_table', 1),
(9, '2026_01_07_195217_create_transaksis_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama_supplier`, `kontak`, `alamat`, `perusahaan`, `created_at`, `updated_at`) VALUES
(1, 'Agus Hendra', '085634124905', 'Puri indah No.E39, Suko, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61224', 'Pt. Iparna Mandiri', '2026-01-07 12:31:14', '2026-01-07 12:31:14'),
(2, 'Bambang Setiadi', '081234567890', 'Jl. Sudirman No. 45, Jakarta Pusat', 'PT. Global Teknologi Nusantara', '2026-01-07 21:52:32', '2026-01-07 21:52:32'),
(3, 'Siti Aminah', '085777888999', 'Jl. Merdeka No. 12, Surabaya', 'CV. ATK Jaya Abadi', '2026-01-07 21:52:32', '2026-01-07 21:52:32'),
(4, 'Hendra Wijaya', '0213334445', 'Mangga Dua Mall Lt. 3 No. 15, Jakarta', 'Toko Komputer Citra Mandiri', '2026-01-07 21:52:32', '2026-01-07 21:52:32'),
(5, 'Dewi Lestari', '081122233344', 'Kawasan Industri Jababeka Blok C-10', 'PT. Furnitur Kantor Elegan', '2026-01-07 21:52:32', '2026-01-07 21:52:32'),
(6, 'Eko Prasetyo', '082244455566', 'Jl. Diponegoro No. 88, Bandung', 'CV. Sumber Berkah ATK', '2026-01-07 21:52:32', '2026-01-07 21:52:32'),
(7, 'Rina Permata', '081366677788', 'Jl. Gatot Subroto No. 101, Semarang', 'PT. Media Grafika Indonesia', '2026-01-07 21:52:32', '2026-01-07 21:52:32'),
(8, 'Guntur Saputra', '085222333444', 'Glodok Plaza Lantai Dasar No. 22', 'Toko Elektronik Surya Kencana', '2026-01-07 21:52:32', '2026-01-07 21:52:32'),
(9, 'Maya Indah', '081255566677', 'Jl. Pahlawan No. 56, Yogyakarta', 'CV. Makmur Jaya Abadi', '2026-01-07 21:52:32', '2026-01-07 21:52:32'),
(10, 'Fajar Ramadhan', '0219990001', 'Kawasan Mega Kuningan Lot 5.1, Jakarta', 'PT. Prima Sarana Kantor', '2026-01-07 21:52:32', '2026-01-07 21:52:32'),
(11, 'Larasati Putri', '081144477788', 'Jl. Ahmad Yani No. 150, Medan', 'Toko Buku & ATK Sejahtera', '2026-01-07 21:52:32', '2026-01-07 21:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `jenis` enum('masuk','keluar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `barang_id`, `jenis`, `jumlah`, `tanggal`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 4, 'masuk', 1, '2026-01-07', 'Tambahan Dari Sposnsorship', '2026-01-07 14:43:23', '2026-01-07 14:43:23'),
(2, 2, 'keluar', 2, '2026-01-07', 'Anak IT sedang butuh, untuk meeting dan bertemu client', '2026-01-07 14:53:59', '2026-01-07 14:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Farizal Athallah Ranur', 'farizalathallah@gmail.com', NULL, '$2y$12$6kBEsRgUh7MwkI5G9t6gjuAQVde3QIIscqdupgXzuRpJhZtExh3aC', NULL, '2026-01-07 12:25:15', '2026-01-07 12:25:15', 'admin'),
(2, 'Andi Jufia Putra', 'user1@inventaris.com', NULL, '$2y$12$dv/70KLLSMnU2W1dRlTGmOti8NYEKnQkJuSMTCPzdtLPCBp1b2cLa', NULL, '2026-01-07 13:52:16', '2026-01-07 13:52:16', 'user'),
(3, 'Darmawan Praditya', 'darmawan.admin@inventaris.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2026-01-07 21:41:42', '2026-01-07 21:41:42', 'admin'),
(4, 'Arisandi Kusuma', 'arisandi@inventaris.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2026-01-07 21:41:42', '2026-01-07 21:41:42', 'user'),
(5, 'Maulana Malik Ibrahim', 'maulana@inventaris.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2026-01-07 21:41:42', '2026-01-07 21:41:42', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_ctrollers`
--
ALTER TABLE `barang_ctrollers`
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
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_barang_id_foreign` (`barang_id`);

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
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `barang_ctrollers`
--
ALTER TABLE `barang_ctrollers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
