-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 03:35 PM
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
  `lokasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('belum terverifikasi','menunggu verifikasi','terverifikasi') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum terverifikasi',
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensis`
--

INSERT INTO `absensis` (`id`, `id_peserta`, `tanggal_pertemuan`, `no_pertemuan`, `jam`, `lokasi`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-08-23', 1205, '11:56:48', 'Dinas Komunikasi Informasi dan Stastik', 'belum terverifikasi', 'Menanyakan perkembangan diri selama PKL dan perkembangan project yang sedang dilakukan', '2022-08-23 04:56:48', '2022-08-23 04:56:48');

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
(1, 'Membangun Aplikasi Management Kinerja Peserta Magang Berbasis Web', 'Melakukan pembangunan aplikasi untuk memanagement kinerja peserta magang yang berada di dinas komunikasi, informasi, dan statistik kabupaten soreang agar pembimbing lebih mudah melakukan pengawasan para peserta magang', '2022-08-23 05:00:29', '2022-08-23 05:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `kinerjas`
--

CREATE TABLE `kinerjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_peserta` bigint(20) UNSIGNED NOT NULL,
  `id_kegiatan` bigint(20) UNSIGNED NOT NULL,
  `mulai_kinerja` time DEFAULT NULL,
  `selesai_kinerja` time DEFAULT NULL,
  `status_kegiatan` enum('melakukan aktivitas','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'melakukan aktivitas',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(20, '2022_08_23_112034_create_admin_table', 3);

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
(1, 'pembimbing1@pembimbing.com', '$2y$10$4EgWJPW8W3HKbAzkjrxAj.a.h8TfnhzUJw6g210iF4WPkJZMKuMpG', 'Jono Setiawan', NULL, 'Frontend Developer', 'Lead Frontend Developer', 'pembimbing', '2022-08-23 04:43:44', '2022-08-23 04:43:44');

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
  `id_pembimbing` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_peserta` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_peserta` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instansi_pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('peserta','pembimbing','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'peserta',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesertas`
--

INSERT INTO `pesertas` (`id`, `id_pembimbing`, `email`, `password`, `nama_peserta`, `gambar_peserta`, `instansi_pendidikan`, `jurusan`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 'peserta@peserta', '$2y$10$FT5kqaYkJTd2alw4L7j58uuCuR4SSHLrwxfRYSTZTB8a4kGeX9.4K', 'Nabil Wafi', NULL, 'Universitas Komputer Indonesia', 'Sistem Informasi', 'peserta', '2022-08-23 04:48:40', '2022-08-23 04:48:40');

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
(9, 1, 'Test Website', '2022-08-23 05:29:21', '2022-08-23 05:29:21');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kinerjas`
--
ALTER TABLE `kinerjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pembimbings`
--
ALTER TABLE `pembimbings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesertas`
--
ALTER TABLE `pesertas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_kegiatans`
--
ALTER TABLE `sub_kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
