-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2022 at 10:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management_kinerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_peserta` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pertemuan` date NOT NULL,
  `no_pertemuan` int(10) UNSIGNED NOT NULL,
  `jam` time NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('belum terverifikasi','menunggu verifikasi','terverifikasi') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum terverifikasi',
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensis`
--

INSERT INTO `absensis` (`id`, `id_peserta`, `tanggal_pertemuan`, `no_pertemuan`, `jam`, `latitude`, `longitude`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 1, '2022-09-04', 1, '18:04:04', '-6.9092572', '107.6277549', 'terverifikasi', 'Hadir', NULL, '2022-09-04 11:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('peserta','pembimbing','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin', '$2y$10$yXGaABfpS0BHoJ2xmeWENuPr8iTjWpshnMF8yc.iPJNrRblsfGaFu', 'admin', '2022-08-23 04:35:45', '2022-08-23 04:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kinerjas`
--

CREATE TABLE `detail_kinerjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kinerja` bigint(20) UNSIGNED NOT NULL,
  `status_kegiatan` enum('belum mengambil','melakukan aktivitas','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'melakukan aktivitas',
  `mulai_kinerja` datetime DEFAULT NULL,
  `selesai_kinerja` datetime DEFAULT NULL,
  `sub_kegiatan_diambil` int(11) DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_kinerjas`
--

INSERT INTO `detail_kinerjas` (`id`, `id_kinerja`, `status_kegiatan`, `mulai_kinerja`, `selesai_kinerja`, `sub_kegiatan_diambil`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 1, 'selesai', '2022-08-26 14:31:47', '2022-08-26 14:40:39', 8, '<p>saya tidak melakukan apa2</p>', '2022-08-26 07:31:47', '2022-08-26 07:40:39'),
(3, 1, 'selesai', '2022-08-26 15:18:28', '2022-08-26 15:38:57', 6, '<p>merancang aja dlu</p>', '2022-08-26 08:18:28', '2022-08-26 08:38:57'),
(5, 1, 'selesai', '2022-08-26 19:01:25', '2022-08-27 11:56:32', 8, '<p>test</p>', '2022-08-26 12:01:25', '2022-08-27 04:56:32'),
(6, 1, 'selesai', '2022-08-29 00:10:30', '2022-08-29 15:34:59', 9, 'dawdawdaw', '2022-08-28 17:10:30', '2022-08-29 08:34:59'),
(7, 1, 'selesai', '2022-08-29 16:50:29', '2022-08-29 16:50:40', 8, 'fljdliwdjlawjldjalwdjliaw', '2022-08-29 09:50:29', '2022-08-29 09:50:40'),
(8, 1, 'selesai', '2022-08-29 17:03:19', '2022-08-29 17:03:24', 9, 'dwdadawdawdawdawdawdawd', '2022-08-29 10:03:19', '2022-08-29 10:03:24'),
(9, 1, 'selesai', '2022-08-29 19:38:55', '2022-09-04 16:25:58', 8, 'saya tidak melakukan sesuatu', '2022-08-29 12:38:55', '2022-09-04 09:25:58'),
(10, 1, 'melakukan aktivitas', '2022-09-04 17:18:28', NULL, 8, NULL, '2022-09-04 10:18:28', '2022-09-04 10:18:28'),
(11, 1, 'melakukan aktivitas', '2022-09-04 17:19:04', NULL, 8, NULL, '2022-09-04 10:19:04', '2022-09-04 10:19:04'),
(12, 1, 'melakukan aktivitas', '2022-09-04 17:23:10', NULL, 8, NULL, '2022-09-04 10:23:10', '2022-09-04 10:23:10'),
(13, 1, 'selesai', '2022-09-04 17:23:49', '2022-09-04 17:30:08', 8, 'awdawdadawd', '2022-09-04 10:23:49', '2022-09-04 10:30:08'),
(14, 1, 'selesai', '2022-09-04 17:31:02', '2022-09-04 17:31:11', 8, 'dawdawdawdawdawdadawdawda', '2022-09-04 10:31:02', '2022-09-04 10:31:11'),
(15, 1, 'selesai', '2022-09-05 11:32:45', '2022-09-05 11:33:05', 7, 'adwkodwaodkwao', '2022-09-05 04:32:45', '2022-09-05 04:33:05'),
(16, 1, 'selesai', '2022-09-05 11:34:22', '2022-09-05 11:36:11', 8, 'dawodkaowkodawkodawk;odawo;', '2022-09-05 04:34:22', '2022-09-05 04:36:11');

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
-- Table structure for table `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `kegiatan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Membangun Aplikasi Management Kinerja Peserta Magang Berbasis Web', 'Melakukan pembangunan aplikasi untuk memanagement kinerja peserta magang yang berada di dinas komunikasi, informasi, dan statistik kabupaten soreang agar pembimbing lebih mudah melakukan pengawasan para peserta magang', '2022-08-23 05:00:29', '2022-08-23 05:00:29'),
(2, 'kegiatan1', 'kegiatan11', '2022-09-05 04:43:09', '2022-09-05 04:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `kinerjas`
--

CREATE TABLE `kinerjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_peserta` bigint(20) UNSIGNED DEFAULT NULL,
  `id_kegiatan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kinerjas`
--

INSERT INTO `kinerjas` (`id`, `id_peserta`, `id_kegiatan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-08-24 12:44:31', '2022-08-25 13:08:59');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2022_08_23_102427_create_pembimbings_table', 1),
(14, '2022_08_23_102434_create_pesertas_table', 1),
(15, '2022_08_23_102449_create_kegiatans_table', 1),
(16, '2022_08_23_102459_create_sub_kegiatans_table', 1),
(17, '2022_08_23_104831_create_absensi_table', 1),
(19, '2022_08_23_105750_create_kinerjas_table', 2),
(20, '2022_08_23_112034_create_admin_table', 3),
(23, '2022_08_25_203347_create_detail_kinerjas_table', 4);

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
-- Table structure for table `pembimbings`
--

CREATE TABLE `pembimbings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pembimbing` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_pembimbing` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `divisi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('peserta','pembimbing','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pembimbing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembimbings`
--

INSERT INTO `pembimbings` (`id`, `email`, `password`, `nama_pembimbing`, `gambar_pembimbing`, `divisi`, `jabatan`, `role`, `created_at`, `updated_at`) VALUES
(1, 'pembimbing1@pembimbing.com', '$2y$10$4EgWJPW8W3HKbAzkjrxAj.a.h8TfnhzUJw6g210iF4WPkJZMKuMpG', 'Jono Setiawan', NULL, 'Frontend Developer', 'Lead Frontend Developer', 'pembimbing', '2022-08-23 04:43:44', '2022-08-23 04:43:44'),
(2, 'pembimbingdua@pembimbing', '12345678', 'pembimbing', 'avatar-2.png', 'satu', 'dua', 'pembimbing', '2022-09-05 04:44:22', '2022-09-05 04:44:22');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesertas`
--

CREATE TABLE `pesertas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pembimbing` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_peserta` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_peserta` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instansi_pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('peserta','pembimbing','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'peserta',
  `type` enum('terverifikasi','belum terverifikasi') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum terverifikasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesertas`
--

INSERT INTO `pesertas` (`id`, `id_pembimbing`, `email`, `password`, `nama_peserta`, `gambar_peserta`, `instansi_pendidikan`, `jurusan`, `role`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'peserta@peserta', '$2y$10$FT5kqaYkJTd2alw4L7j58uuCuR4SSHLrwxfRYSTZTB8a4kGeX9.4K', 'Nabil Wafii', 'default.png', 'Universitas Komputer Indonesia', 'Sistem Informasi', 'peserta', 'terverifikasi', '2022-08-23 04:48:40', '2022-09-05 04:42:34'),
(2, NULL, 'peserta2@peserta', '$2y$10$XkRzda/w/WJLSCpOwpSUgeq3WbOBosgHWlpZhshMrjOo5sPKE2GDq', 'Rizki Hudan', NULL, 'DAWDAWD', 'Baranangsiang', 'peserta', 'belum terverifikasi', '2022-09-05 04:46:37', '2022-09-05 04:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kegiatans`
--

CREATE TABLE `sub_kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kegiatan` bigint(20) UNSIGNED NOT NULL,
  `sub_kegiatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_kegiatans`
--

INSERT INTO `sub_kegiatans` (`id`, `id_kegiatan`, `sub_kegiatan`, `created_at`, `updated_at`) VALUES
(6, 1, 'Merancang Sistem', '2022-08-23 05:29:21', '2022-08-23 05:29:21'),
(7, 1, 'Merancang Tampilan User', '2022-08-23 05:29:21', '2022-08-23 05:29:21'),
(8, 1, 'Coding', '2022-08-23 05:29:21', '2022-08-23 05:29:21'),
(9, 1, 'Test Website', '2022-08-23 05:29:21', '2022-08-23 05:29:21'),
(10, 2, 'satu', '2022-09-05 04:43:22', '2022-09-05 04:43:38'),
(11, 2, 'dua', '2022-09-05 04:43:22', '2022-09-05 04:43:22');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensis_id_peserta_foreign` (`id_peserta`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_kinerjas`
--
ALTER TABLE `detail_kinerjas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_kinerjas_id_kinerja_foreign` (`id_kinerja`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kinerjas`
--
ALTER TABLE `kinerjas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kinerjas_id_peserta_foreign` (`id_peserta`),
  ADD KEY `kinerjas_id_kegiatan_foreign` (`id_kegiatan`);

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
-- Indexes for table `pembimbings`
--
ALTER TABLE `pembimbings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesertas`
--
ALTER TABLE `pesertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesertas_user_id_foreign` (`id_pembimbing`);

--
-- Indexes for table `sub_kegiatans`
--
ALTER TABLE `sub_kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_kegiatans_id_kegiatan_foreign` (`id_kegiatan`);

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
-- AUTO_INCREMENT for table `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_kinerjas`
--
ALTER TABLE `detail_kinerjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kinerjas`
--
ALTER TABLE `kinerjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pembimbings`
--
ALTER TABLE `pembimbings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesertas`
--
ALTER TABLE `pesertas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_kegiatans`
--
ALTER TABLE `sub_kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensis`
--
ALTER TABLE `absensis`
  ADD CONSTRAINT `absensis_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `pesertas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_kinerjas`
--
ALTER TABLE `detail_kinerjas`
  ADD CONSTRAINT `detail_kinerjas_id_kinerja_foreign` FOREIGN KEY (`id_kinerja`) REFERENCES `kinerjas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kinerjas`
--
ALTER TABLE `kinerjas`
  ADD CONSTRAINT `kinerjas_id_kegiatan_foreign` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatans` (`id`),
  ADD CONSTRAINT `kinerjas_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `pesertas` (`id`);

--
-- Constraints for table `pesertas`
--
ALTER TABLE `pesertas`
  ADD CONSTRAINT `pesertas_user_id_foreign` FOREIGN KEY (`id_pembimbing`) REFERENCES `pembimbings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kegiatans`
--
ALTER TABLE `sub_kegiatans`
  ADD CONSTRAINT `sub_kegiatans_id_kegiatan_foreign` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
