-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 06:45 AM
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
-- Database: `kfk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('3d696547-744b-4849-95f7-9429c458f6ea', 'Jevan', 'jevan@gmail.com', NULL, '$2y$10$Tof7a4Q7s9RbqmmkFQs67OAuLJN3zTk0QzCcfAOpn0Lf/4fzS2eBm', NULL, '2024-07-21 17:10:06', '2024-07-21 17:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` char(36) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kalimat` varchar(1500) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bakumpul`
--

CREATE TABLE `bakumpul` (
  `id` bigint(36) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kalimat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bakumpul`
--

INSERT INTO `bakumpul` (`id`, `foto`, `kalimat`, `tanggal`, `created_at`, `updated_at`) VALUES
(7, '1721719257_wAh7iOkMFs.jpg', 'tes bakumpul 1', '2024-08-08', '2024-07-22 23:20:57', '2024-07-22 23:20:57'),
(8, '1721719269_jPNj3MwZYX.jpg', 'tes bakumpul 2', '2024-07-27', '2024-07-22 23:21:09', '2024-07-22 23:21:09'),
(10, '1721719296_RG3Tn6a5mH.png', 'tes bakumpul 4', '2024-08-06', '2024-07-22 23:21:36', '2024-07-22 23:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kalimat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `baomong`
--

CREATE TABLE `baomong` (
  `id` bigint(36) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kalimat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `baomong`
--

INSERT INTO `baomong` (`id`, `foto`, `kalimat`, `tanggal`, `created_at`, `updated_at`) VALUES
(2, '1721720190_kc3ULo8Fyu.jpg', 'tes ba omong 2', '2024-07-11', '2024-07-22 23:36:30', '2024-07-22 23:36:30'),
(3, '1721720295_tlZtwUhMEV.jpg', 'tes ba omong 31', '2011-01-03', '2024-07-22 23:36:42', '2024-07-22 23:38:16'),
(4, '1721720218_PH8W5Otyf3.png', 'tes ba omong 4', '2024-11-26', '2024-07-22 23:36:58', '2024-07-22 23:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `bioskop`
--

CREATE TABLE `bioskop` (
  `id` bigint(36) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kalimat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bioskop`
--

INSERT INTO `bioskop` (`id`, `foto`, `kalimat`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, '1721721758_ldiiTIZlQ9.jpg', 'tes bioskop 21', '2007-02-06', '2024-07-22 23:56:48', '2024-07-23 00:02:50'),
(4, '1721734576_C6uiZkT462.png', 'tes bioskop 51', '2024-08-06', '2024-07-22 23:58:04', '2024-07-23 03:36:16');

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
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(36) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `sinopsis` varchar(255) NOT NULL,
  `sutradara` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `rating_usia` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `judul`, `foto`, `sinopsis`, `sutradara`, `genre`, `durasi`, `rating_usia`, `created_at`, `updated_at`) VALUES
(2, 'Tes film judul2', '1721787672_MCjX7pNtbO.png', 'Tes film sinopsis2', 'tes film sutradara2', 'tes film genre2', 'tes film durasi2', 'tes film rating usia2', '2024-07-23 18:21:12', '2024-07-23 18:21:12'),
(3, 'Tes film judul3112', '1721789072_BkUOQktMwk.png', 'Tes film sinopsis312241', 'tes film sutradara33423', 'tes film genre343452', 'tes film durasi33532435', 'tes film rating usia3545346', '2024-07-23 18:21:41', '2024-07-23 18:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `internasional`
--

CREATE TABLE `internasional` (
  `id` bigint(36) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kalimat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `internasional`
--

INSERT INTO `internasional` (`id`, `foto`, `kalimat`, `tanggal`, `created_at`, `updated_at`) VALUES
(2, '1721735303_VcUsE9gNKB.jpg', 'tes layar internasional 21', '2015-01-05', '2024-07-23 03:46:09', '2024-07-23 03:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(36) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kalimat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `judul`, `kalimat`, `created_at`, `updated_at`) VALUES
(1, 'tes judul 1123314', 'tes kalimat 12478154', NULL, '2024-07-23 20:39:20'),
(3, 'Tes film judul2', 'tes kalimat judul3', '2024-07-23 20:25:23', '2024-07-23 20:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `kfk`
--

CREATE TABLE `kfk` (
  `id` bigint(36) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kalimat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kfk`
--

INSERT INTO `kfk` (`id`, `foto`, `kalimat`, `tanggal`, `created_at`, `updated_at`) VALUES
(2, '1721737703_LNK4gZwLl5.jpg', 'tes kfk 456', '2008-06-09', '2024-07-23 03:53:38', '2024-07-23 04:28:23'),
(3, '1721735630_yRwvTRVFKf.jpg', 'tes kfk 3', '2024-08-07', '2024-07-23 03:53:50', '2024-07-23 03:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `kompetisi`
--

CREATE TABLE `kompetisi` (
  `id` bigint(36) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kalimat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kompetisi`
--

INSERT INTO `kompetisi` (`id`, `foto`, `kalimat`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, '1721736485_31iG3peiMJ.jpg', 'tes kompetisi 1120', '2007-08-16', '2024-07-23 04:02:22', '2024-07-23 04:08:05'),
(2, '1721736183_91QheFaj7f.jpg', 'tes kompetisi 2', '2024-08-02', '2024-07-23 04:03:03', '2024-07-23 04:03:03'),
(3, '1721736197_qd7mkW8nZe.jpg', 'tes kompetisi 3', '2024-08-06', '2024-07-23 04:03:17', '2024-07-23 04:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id` char(36) NOT NULL DEFAULT '604dae34-f892-4108-a260-541ea1b4625b',
  `judul` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `isi_konten` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layar`
--

CREATE TABLE `layar` (
  `id` bigint(36) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kalimat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layar`
--

INSERT INTO `layar` (`id`, `foto`, `kalimat`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, '1721736795_PPenpYeMIe.jpg', 'tes layar 1102', '2006-05-22', '2024-07-23 04:11:16', '2024-07-23 04:13:15'),
(2, '1721736708_Tm5voBuNYF.png', 'tes layar 2', '2024-08-06', '2024-07-23 04:11:48', '2024-07-23 04:11:48'),
(3, '1721736720_FaJhHnkhwZ.jpg', 'tes layar 3', '2024-07-31', '2024-07-23 04:12:00', '2024-07-23 04:12:00');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_20_053922_create_admin_table', 2),
(6, '2024_05_13_150610_create_admin_table', 3),
(7, '2024_05_18_155053_create_konten_table', 3),
(8, '2024_06_24_160625_create_banner_table', 3),
(9, '2024_06_25_004658_create_artikel_table', 3),
(10, '2024_07_05_232343_increase_kalimat_length_in_artikel_table', 3),
(11, '2024_07_21_233141_create_bioskop_table', 3),
(12, '2024_07_21_233707_create_kompetisi_table', 3),
(13, '2024_07_21_233855_create_layar_table', 3),
(14, '2024_07_21_233946_create_bakumpul_table', 3),
(15, '2024_07_21_234008_create_kfk_table', 3),
(16, '2024_07_21_234038_create_pelajar_table', 3),
(17, '2024_07_21_234135_create_internasional_table', 3),
(18, '2024_07_21_234208_create_baomong_table', 3),
(19, '2024_07_24_015059_create_film_table', 4),
(20, '2024_07_24_031807_create_penghargaan_table', 5),
(21, '2024_07_24_040617_create_jadwal_table', 6);

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
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `id` bigint(36) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kalimat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`id`, `foto`, `kalimat`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, '1721737547_1SOaMAjALF.png', 'tes pelajar 12132', '2002-06-11', '2024-07-23 04:22:12', '2024-07-23 04:25:47'),
(2, '1721737360_LkkHVWtIcq.jpg', 'tes pelajar 2', '2024-08-02', '2024-07-23 04:22:40', '2024-07-23 04:22:40'),
(3, '1721737377_NUnzKuEite.jpg', 'tes pelajar 3', '2024-08-10', '2024-07-23 04:22:57', '2024-07-23 04:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `penghargaan`
--

CREATE TABLE `penghargaan` (
  `id` int(36) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penghargaan`
--

INSERT INTO `penghargaan` (`id`, `foto`, `nama`, `posisi`, `bio`, `created_at`, `updated_at`) VALUES
(2, '1721793765_z78m7MxTKu.jpeg', 'tes nama penghargaan1', 'tes posisi penghargaan2', 'Tes Bio penghargaan2', '2024-07-23 20:02:45', '2024-07-23 20:02:45'),
(3, '1721793886_qvAECe8ytU.png', 'tes nama penghargaan3324324', 'tes posisi penghargaan355476', 'Tes Bio penghargaan3678574', '2024-07-23 20:02:59', '2024-07-23 20:04:46');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Suarez', 'dominggusmartins@gmail.com', '2024-07-18 22:55:31', '$2y$10$CzGxSWmKJDZ1ahg2RzlbbeHJi8CU6GPIK8cGS/QHPjEHH6SxVe81K', '2emZ4sTcro3zqg7myO63rCVjn0VoSg41ojRL8qLujZXh3oPn4fBrPjLTzWQg', '2024-07-18 22:23:50', '2024-07-18 22:55:31'),
(2, 'Jevan', 'arthuramabi22@gmail.com', NULL, '$2y$10$c90SW5WknW17r9mojlH3nOnbCs/sdMaZB1sokxk4ULiCB74Lm4jum', NULL, '2024-07-18 22:37:28', '2024-07-18 22:37:28'),
(3, 'Jevan', 'ujicoba1909@gmail.com', NULL, '$2y$10$cnkMyzqQgoCGNokWydMDbejRXE046yHCdyRNznsCMBxIv7kwjIO2G', NULL, '2024-07-18 22:41:22', '2024-07-18 22:41:22'),
(4, 'ficco', 'nttluculucu9@gmail.com', NULL, '$2y$10$3G.6M.WmcPTC9xRtlGmhDO1A4yOe3g90kLda7hRfSF1ClB7tBXBD2', NULL, '2024-07-18 22:56:56', '2024-07-18 22:56:56'),
(5, 'sevon', 'sevon@gmail.com', NULL, '$2y$10$7BzcWvFkqkYSLqgNSX7lteVrRWgTr5bUN6KvWZ.mlppQuYQc7DpXy', NULL, '2024-07-18 23:01:51', '2024-07-18 23:01:51'),
(6, 'sevon12', 'karbunerofarm@gmail.com', NULL, '$2y$10$tIO9X0ywUwpok2XaQwPyeulW/RdC.ltUGlNypj4qvVN1HpCURqS/e', NULL, '2024-07-19 19:12:26', '2024-07-19 19:12:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bakumpul`
--
ALTER TABLE `bakumpul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baomong`
--
ALTER TABLE `baomong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bioskop`
--
ALTER TABLE `bioskop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internasional`
--
ALTER TABLE `internasional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kfk`
--
ALTER TABLE `kfk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kompetisi`
--
ALTER TABLE `kompetisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layar`
--
ALTER TABLE `layar`
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
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penghargaan`
--
ALTER TABLE `penghargaan`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bakumpul`
--
ALTER TABLE `bakumpul`
  MODIFY `id` bigint(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `baomong`
--
ALTER TABLE `baomong`
  MODIFY `id` bigint(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bioskop`
--
ALTER TABLE `bioskop`
  MODIFY `id` bigint(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `internasional`
--
ALTER TABLE `internasional`
  MODIFY `id` bigint(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kfk`
--
ALTER TABLE `kfk`
  MODIFY `id` bigint(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kompetisi`
--
ALTER TABLE `kompetisi`
  MODIFY `id` bigint(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `layar`
--
ALTER TABLE `layar`
  MODIFY `id` bigint(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pelajar`
--
ALTER TABLE `pelajar`
  MODIFY `id` bigint(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penghargaan`
--
ALTER TABLE `penghargaan`
  MODIFY `id` int(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
