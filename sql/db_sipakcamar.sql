-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 09:57 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipakcamar`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kondisi` enum('BAIK','RUSAK') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('TETAP','BERGERAK') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `nama_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satker_id` int(10) UNSIGNED NOT NULL,
  `nilai_perolehan` int(11) NOT NULL,
  `tgl_terima` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ms_barang`
--

CREATE TABLE `ms_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `kondisi` enum('BAIK','RUSAK') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `jenisbarang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_barang`
--

INSERT INTO `ms_barang` (`id`, `nama_barang`, `foto`, `jumlah`, `kondisi`, `created_at`, `updated_at`, `jenisbarang_id`) VALUES
(1, 'KURSI PLASTIK', NULL, 200, 'BAIK', '2021-05-11 04:27:42', '2021-05-11 04:27:42', 1),
(2, 'KURSI LIPAT', NULL, 50, 'BAIK', '2021-05-11 04:28:41', '2021-05-11 04:28:41', 1),
(3, 'KURSI RAPAT', 'barang//PCbTPswmFegHs2HCFYdl0IrtFDbZiohqeeptsGk5.jpeg', 7, 'BAIK', '2021-05-11 04:32:39', '2021-05-11 04:32:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ms_peminjam`
--

CREATE TABLE `ms_peminjam` (
  `id` int(11) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `kategori_peminjam_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_peminjam`
--

INSERT INTO `ms_peminjam` (`id`, `nama_peminjam`, `alamat`, `no_hp`, `kategori_peminjam_id`, `created_at`, `updated_at`) VALUES
(1, 'AYUMEI', 'Dsn. Cemara 1', '0818815145', 1, '2021-05-11 07:43:30', '2021-05-11 07:54:52'),
(2, 'AYU', 'Desa Baru', '0819999999', 1, '2021-05-27 04:34:50', '2021-05-27 04:34:50');

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
-- Table structure for table `ref_jenis_barang`
--

CREATE TABLE `ref_jenis_barang` (
  `id` int(11) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_jenis_barang`
--

INSERT INTO `ref_jenis_barang` (`id`, `jenis_barang`, `created_at`, `updated_at`) VALUES
(1, 'KURSI', '2021-05-11 04:16:43', '2021-05-11 04:16:43'),
(2, 'SOUND SYSTEM', '2021-05-11 04:17:15', '2021-05-11 04:17:15'),
(3, 'MEJA', '2021-05-11 04:17:31', '2021-05-11 04:17:31'),
(4, 'SOFA', '2021-05-11 04:17:46', '2021-05-11 04:17:46'),
(5, 'GEDUNG', '2021-05-11 04:18:07', '2021-05-11 04:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `ref_peminjam`
--

CREATE TABLE `ref_peminjam` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_peminjam`
--

INSERT INTO `ref_peminjam` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'MASYARAKAT UMUM', '2021-05-11 07:41:36', '2021-05-11 07:41:36'),
(2, 'INSTANSI PEMERINTAH / OPD', '2021-05-11 07:42:04', '2021-05-11 07:42:04'),
(3, 'PIHAK SWASTA', '2021-05-11 07:42:15', '2021-05-11 07:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `satker`
--

CREATE TABLE `satker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_satker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tr_peminjaman_barang`
--

CREATE TABLE `tr_peminjaman_barang` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jml_pinjam` int(11) DEFAULT NULL,
  `tgl_mulai_pakai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `deskripsi_kegiatan` varchar(255) NOT NULL,
  `peminjam_id` int(11) NOT NULL,
  `waktu_pemakaian` enum('SIANG','MALAM') NOT NULL,
  `bulan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_peminjaman_barang`
--

INSERT INTO `tr_peminjaman_barang` (`id`, `barang_id`, `jml_pinjam`, `tgl_mulai_pakai`, `tgl_selesai`, `deskripsi_kegiatan`, `peminjam_id`, `waktu_pemakaian`, `bulan`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-05-24 00:00:00', '2021-05-25 00:00:00', 'Untuk Sosialiasasi', 1, 'SIANG', 'Mei', '2021-05-19 03:57:54', '2021-05-19 03:57:54'),
(2, 2, 2, '2021-06-01 00:00:00', '2021-06-01 00:00:00', 'Acara Keagamaan', 1, 'SIANG', 'Juni', '2021-05-19 08:12:57', '2021-05-19 08:12:57'),
(3, 3, 2, '2021-05-05 00:00:00', '2021-05-05 00:00:00', 'Untuk Sosialiasasi', 1, 'SIANG', 'Mei', '2021-05-19 08:13:55', '2021-05-19 08:13:55'),
(4, 3, 2, '2021-05-30 00:00:00', '0010-01-01 00:00:00', 'Untuk Sosialiasasi', 1, 'MALAM', 'Mei', '2021-05-20 02:17:49', '2021-05-20 02:17:49'),
(5, 1, 20, '2021-06-10 00:00:00', '2021-06-04 00:00:00', 'Acara Keagamaan', 1, 'SIANG', 'Juni', '2021-05-20 02:30:23', '2021-05-20 02:30:23'),
(6, 1, 1, '2021-05-01 00:00:00', '2021-05-01 00:00:00', 'Acara Keagamaan', 1, 'SIANG', 'Mei', '2021-05-20 03:35:21', '2021-05-20 03:35:21'),
(7, 2, 1, '2021-06-17 00:00:00', '2021-06-17 00:00:00', 'Untuk acara perayaan', 1, 'MALAM', 'Juni', '2021-05-27 02:32:34', '2021-05-27 02:32:34'),
(8, 3, 1, '2021-05-29 00:00:00', '2021-05-29 00:00:00', 'Untuk acara perayaan', 2, 'SIANG', NULL, '2021-05-27 04:34:50', '2021-05-27 04:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `tr_permohonan_peminjaman`
--

CREATE TABLE `tr_permohonan_peminjaman` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `refpeminjam_id` int(11) NOT NULL,
  `tgl_mulai_pakai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `deskripsi_kegiatan` varchar(255) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `waktu_pemakaian` enum('SIANG','MALAM') NOT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tr_permohonan_peminjaman`
--

INSERT INTO `tr_permohonan_peminjaman` (`id`, `barang_id`, `refpeminjam_id`, `tgl_mulai_pakai`, `tgl_selesai`, `deskripsi_kegiatan`, `nama_peminjam`, `no_telp`, `email`, `alamat`, `jumlah_barang`, `waktu_pemakaian`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2021-05-29 00:00:00', '2021-05-29 00:00:00', 'Untuk acara perayaan', 'AYU', '0819999999', 'ayu@email.com', 'Desa Baru', 1, 'SIANG', 1, '2021-05-27 02:47:50', '2021-05-27 04:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('OPERATOR','ADMINISTRATOR') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'ayu', 'ayu@email.com', NULL, '$2y$10$ujil9n00a5KxBTJLrD4E/.WkO9G63WN.6rwuWzGKgOwsQvOVklOP.', NULL, '2019-08-19 10:42:33', '2019-08-19 10:42:33', 'OPERATOR'),
(2, 'administrator', 'adm@email.com', NULL, '$2y$10$Fp1SQqK9p873M5kZNV83Kefxq40zN7vpm7K3DFhV8gaRRZOWuUm9G', NULL, '2019-08-20 07:37:07', '2019-08-20 07:37:07', 'ADMINISTRATOR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_barang`
--
ALTER TABLE `ms_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_peminjam`
--
ALTER TABLE `ms_peminjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `ref_jenis_barang`
--
ALTER TABLE `ref_jenis_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_peminjam`
--
ALTER TABLE `ref_peminjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satker`
--
ALTER TABLE `satker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_peminjaman_barang`
--
ALTER TABLE `tr_peminjaman_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_permohonan_peminjaman`
--
ALTER TABLE `tr_permohonan_peminjaman`
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
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ms_barang`
--
ALTER TABLE `ms_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ms_peminjam`
--
ALTER TABLE `ms_peminjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_jenis_barang`
--
ALTER TABLE `ref_jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ref_peminjam`
--
ALTER TABLE `ref_peminjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satker`
--
ALTER TABLE `satker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_peminjaman_barang`
--
ALTER TABLE `tr_peminjaman_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tr_permohonan_peminjaman`
--
ALTER TABLE `tr_permohonan_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
