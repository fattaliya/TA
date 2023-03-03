-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2022 at 08:09 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pustaka`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nib` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terima_tanggal` date DEFAULT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengarang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal_buku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_terbit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketersedian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bukus`
--

INSERT INTO `bukus` (`id`, `nib`, `terima_tanggal`, `judul`, `id_kategori`, `pengarang`, `penerbit`, `lokasi`, `exp`, `cnb`, `asal_buku`, `tempat_terbit`, `stok`, `ketersedian`, `foto`, `created_at`, `updated_at`) VALUES
(1, '053921-053970', '2022-10-12', 'Produk Kreatif & KWU Bid Otomotif', '2', 'Hari Subowo', 'Kitto Book', 'Rak 1 Baris 2', '170', '380.13', 'Dana Bos', 'Jatim', '20', '19', '1662040958.jpg', NULL, '2022-09-01 15:08:47'),
(2, '054007', '2022-08-07', 'Traveler Tale', '1', 'yaya', 'yaya', 'Rak 2 Baris 2', '170', '530', 'Sumbangan', 'jatim', '19', '18', '1662040597.jpg', NULL, '2022-09-01 15:13:25'),
(3, '053971-053995', '2018-12-08', 'Fisika C1  Bid Informasi & Komunikasi  X', '2', 'Pistiadi Utomo', 'Erlangga', 'Rak 3 Baris 1', '350', '530', 'Dana Bos', 'Jakarta', '25', '24', '1662041067.jpg', NULL, '2022-09-01 15:13:40'),
(4, '053996-053997', '2018-12-08', 'Kamus  Indonesia  Inggris', '2', 'Jhon M. Echools', 'Gramedia', 'Rak 2  Baris 2', '618', '423', 'Sumbangan', 'Jakarta', '2', '2', '1662041192.jpg', NULL, '2022-09-01 15:13:53'),
(5, 'Khadijjah', '2018-12-08', 'Khadijjah', '1', 'Siber Eruslan', 'Karya Media', 'RAk 1 Baris 1', '388', '813', 'Sumbangan', 'Jakarta', '1', '0', '1662041497.jpg', NULL, '2022-09-01 15:05:07'),
(6, '054006', '2018-12-10', 'Shaidan', '1', 'Radexn Harum', 'Romancus', 'Rak 2 Baris 3', '188', '813', 'Sumbangan', 'Jaksel', '1', '0', '1662054859.jpg', NULL, '2022-09-02 07:04:51'),
(7, '054057', '2018-12-10', 'Seni Budaya  Kelas   XI semester  1', '2', 'kemdikbud', 'kemdikbud', 'Rak 1 Baris 2', '200', '790.07', 'Dana Bos', 'Jakarta', '1', '0', '1662102138.gif', NULL, '2022-09-02 07:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswas`
--

CREATE TABLE `data_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_wa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_siswas`
--

INSERT INTO `data_siswas` (`id`, `nis`, `nama_siswa`, `jenis_kelamin`, `status_akun`, `no_wa`, `id_jurusan`, `kelas`, `foto`, `created_at`, `updated_at`) VALUES
(6, '04967', 'ADIB AKHAIR', 'Laki-Laki', 'aktif', '083193336863', '10', 'XII', 'tidak ada file.png', '2022-09-01 14:21:49', '2022-09-01 14:21:49'),
(7, '04968', 'AKHDANUL IKHSAN', 'Laki-Laki', 'aktif', '083193336863', '10', 'XII', 'tidak ada file.png', '2022-09-01 14:28:21', '2022-09-01 14:28:21'),
(8, '04566', 'AMINA ANLI SAFITRI', 'Laki-Laki', 'aktif', '085232360531', '10', 'XII', 'tidak ada file.png', '2022-09-01 14:28:43', '2022-09-01 14:28:43'),
(9, '05001', 'ADITYA SUHENDRA', 'Laki-Laki', 'aktif', '083193336863', '10', 'XII', 'tidak ada file.png', '2022-09-01 14:29:25', '2022-09-01 14:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `dendas`
--

CREATE TABLE `dendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_denda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_denda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terlambat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dendas`
--

INSERT INTO `dendas` (`id`, `id_peminjaman`, `jumlah_denda`, `total_denda`, `terlambat`, `created_at`, `updated_at`) VALUES
(1, '1', '0', '7000', '7 Hari', NULL, NULL),
(2, '3', '0', '72000', '72 Hari', NULL, NULL),
(3, '2', '0', '38000', '38 Hari', NULL, NULL),
(4, '4', '0', '0', '0 Hari', NULL, NULL),
(5, '5', '0', '17000', '17 Hari', NULL, NULL),
(6, '6', '0', '1000', '1 Hari', NULL, NULL),
(7, '7', '0', '1000', '1 Hari', NULL, NULL),
(8, '13', '0', '8000', '8 Hari', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'Multimedia 1', NULL, NULL),
(2, 'Multimedia 2', NULL, NULL),
(3, 'Teknik Sepeda Motor', NULL, NULL),
(4, 'Teknik Elektronika (TAV) 1', NULL, NULL),
(5, 'Teknik Elektronika (TAV) 2', NULL, NULL),
(6, 'Jurusan Teknik Otomotif (TKR) 1', NULL, NULL),
(7, 'Jurusan Teknik Otomotif (TKR) 2', NULL, NULL),
(8, 'Teknik Pemesinan (TP)', NULL, NULL),
(9, 'Teknik Elektro (Listrik) 1', NULL, NULL),
(10, 'Teknik Gambar Bangunan', NULL, NULL),
(11, 'Teknik Elektro (Listrik) 2', NULL, NULL),
(12, 'BKP', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `denda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan_denda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kehilangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `denda`, `satuan_denda`, `nominal`, `kehilangan`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 'Buku Cerita', 'Uang', 'Per hari', '1000', 'Uang', '30000', NULL, NULL),
(2, 'Buku Pelajaran Umum', 'Barang', 'Per Tahun', '1', 'Buku', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kehilangans`
--

CREATE TABLE `kehilangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `informasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_penganti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kehilangans`
--

INSERT INTO `kehilangans` (`id`, `keterangan`, `informasi`, `id_penganti`, `id_peminjaman`, `created_at`, `updated_at`) VALUES
(1, 'dsgse', '', '1', '1', NULL, NULL),
(2, 'karena liladjls', '20000', '0', '7', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2022_08_28_122536_create_bukus_table', 1),
(4, '2022_08_28_122615_create_data_siswas_table', 1),
(5, '2022_08_28_122636_create_dendas_table', 1),
(6, '2022_08_28_122745_create_kategoris_table', 1),
(7, '2022_08_28_122815_create_kehilangans_table', 1),
(8, '2022_08_28_122910_create_peminjamen_table', 1),
(9, '2022_08_28_161402_create_jurusans_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 2),
(11, '2022_08_31_022602_create_roles_table', 3),
(12, '2022_08_31_022914_add_role_id_to_users_table', 3),
(13, '2022_09_01_143951_add_role_to_users_table', 4);

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
-- Table structure for table `peminjamen`
--

CREATE TABLE `peminjamen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `id_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjamen`
--

INSERT INTO `peminjamen` (`id`, `id_siswa`, `tanggal_pinjam`, `tanggal_kembali`, `tanggal_pengembalian`, `id_buku`, `status_buku`, `status_peminjaman`, `created_at`, `updated_at`) VALUES
(10, '6', '2022-09-01', '2022-09-08', NULL, '1', '-', '-', '2022-09-01 15:08:47', '2022-09-01 15:08:47'),
(11, '7', '2022-09-02', '2022-09-02', NULL, '2', '-', '-', '2022-09-01 15:13:25', '2022-09-01 15:13:25'),
(12, '8', '2022-09-04', '2022-09-11', NULL, '3', '-', '-', '2022-09-01 15:13:40', '2022-09-01 15:13:40'),
(13, '9', '2022-09-04', '2022-09-11', '2022-09-02', '4', 'Telat', 'Telah Dikembalikan', '2022-09-01 15:13:53', '2022-09-01 15:13:53'),
(14, '6', '2022-09-05', '2022-09-12', NULL, '7', '-', '-', '2022-09-02 07:03:36', '2022-09-02 07:03:36'),
(15, '9', '2022-09-05', '2022-09-12', NULL, '6', '-', '-', '2022-09-02 07:04:51', '2022-09-02 07:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `redirect_to`, `created_at`, `updated_at`) VALUES
(1, 'admin', '/administrator', NULL, NULL),
(2, 'user', '/home', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `tgl_tamu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`, `role_id`, `role`) VALUES
(1, 'admin', 'admin@gmail', NULL, '$2y$10$oSwsFPSlvifyG4LqhsNfcuJf4dUQU6e2n.0Z3vnEFxfCwoRRR4ki6', NULL, '2022-08-29 21:19:40', '2022-08-29 21:19:40', 1, NULL, 'admin'),
(2, 'petugas', 'petugas@gmail.com', NULL, '$2y$10$BT8p3wbiwHrWcCN/mxR/Q.bC9p1pybG8PO.WoMdJY7k0Wm93mAcfm', NULL, '2022-08-30 20:29:22', '2022-08-30 20:29:22', 2, NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_siswas`
--
ALTER TABLE `data_siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dendas`
--
ALTER TABLE `dendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehilangans`
--
ALTER TABLE `kehilangans`
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
-- Indexes for table `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_siswas`
--
ALTER TABLE `data_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dendas`
--
ALTER TABLE `dendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kehilangans`
--
ALTER TABLE `kehilangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `peminjamen`
--
ALTER TABLE `peminjamen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
