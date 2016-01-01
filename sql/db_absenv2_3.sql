-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2016 at 01:57 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_absenv2_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `Id_Admin` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nama_Admin` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Id_Admin`, `Nama_Admin`, `created_at`, `updated_at`) VALUES
('admin123', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `Kode_Matkul` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nama_Matkul` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `SKS` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `prodi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `day` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `course_start_day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Kode_Matkul`, `Nama_Matkul`, `SKS`, `prodi`, `day`, `time`, `course_start_day`) VALUES
('3901', 'Perancangan Sistem', '3', '', '', '', '0000-00-00'),
('3902', 'Pengolahan Citra', '3', 'Sistem Komputer', 'Selasa', '2+', '2016-01-04'),
('3903', 'Jaringan Komputer', '3', 'Sistem Komputer', 'Senin', '3-4', '2016-01-04'),
('3904', 'Cryptography', '3', 'Sistem Komputer', 'Jumat', '2+', '2016-01-01'),
('3905', 'Interaksi Komputer', '3', 'Sistem Komputer', 'Kamis', '3-4', '2016-01-07'),
('3906', 'Computer Security', '3', 'Sistem Komputer', 'Kamis', '2+', '2016-01-07'),
('3907', 'Metode Penelitian', '2', 'Sistem Komputer', 'Selasa', '1', '2016-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE IF NOT EXISTS `lecturers` (
  `Kode_Dosen` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Nama_Dosen` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Telepon` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`Kode_Dosen`, `Nama_Dosen`, `Telepon`, `created_at`, `updated_at`) VALUES
('12345', 'Mulyono', '7654321', '2015-12-27 13:50:28', '2015-12-27 13:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `macaddrs`
--

CREATE TABLE IF NOT EXISTS `macaddrs` (
  `MAC_Addr` bigint(20) NOT NULL,
  `Noreg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_11_10_104559_create_students_table', 1),
('2015_11_10_110044_create_lecturers_table', 1),
('2015_11_10_111859_create_courses_table', 1),
('2015_11_10_112331_create_admins_table', 1),
('2015_11_10_112848_create_rooms_table', 1),
('2015_11_10_112951_create_presences_table', 1),
('2015_11_10_113201_create_topics_table', 1),
('2015_11_22_150651_create_MACaddrs_table', 1),
('2015_12_21_080530_create_articles_table', 2),
('2015_12_25_220754_create_sessions_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presences`
--

CREATE TABLE IF NOT EXISTS `presences` (
  `id_temu` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pertemuan_ke` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `Noreg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Kode_Dosen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Kode_Matkul` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_ruang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Kehadiran` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id_ruang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lokasi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id_ruang`, `lokasi`, `created_at`, `updated_at`) VALUES
('513', 'Gd. Dewi Sartika Lt.5', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `Noreg` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nama_Mhs` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Prodi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Alamat` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Telepon` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Semester` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Noreg`, `Nama_Mhs`, `Prodi`, `Alamat`, `Telepon`, `Semester`, `created_at`, `updated_at`) VALUES
('1002330', 'admin', 'sistem komputer', '', NULL, '100', '2015-12-26 00:37:52', '2015-12-26 00:37:52'),
('3135136204', 'dinda', 'Sistem Komputer', '', '000', '103', '2015-12-28 15:55:48', '2015-12-28 15:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id_topik` int(10) unsigned NOT NULL,
  `pertemuan_ke` int(11) NOT NULL,
  `Kode_Matkul` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `nama_topik` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_mhs` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id_topik`, `pertemuan_ke`, `Kode_Matkul`, `tanggal`, `nama_topik`, `jumlah_mhs`, `created_at`, `updated_at`) VALUES
(1, 1, '3901', '0000-00-00 00:00:00', 'apaajaaa', '22', '2016-01-01 05:24:20', '2016-01-01 05:24:20'),
(3, 2, '3902', '0000-00-00 00:00:00', 'trial 2', '20', '2016-01-01 11:04:03', '2016-01-01 11:04:03'),
(4, 3, '3902', '0000-00-00 00:00:00', 'Transformasi Fourier', '22', '2016-01-01 12:55:27', '2016-01-01 12:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'eka', 'eka.suryana@gmail.com', NULL, '$2y$10$j4t2awUnuMBjwQBARMJBlOnTMlRJRptXejwZu6qXkcyQHza7gQDWC', 'xZlYRkzcu4IOCLnDFS8dHSgVQaqvfJCfDKrThH4RrQhNPi7FfHeD8JDu4qTu', '2015-12-21 14:03:52', '2015-12-21 14:05:07'),
(10, 'admin', 'admin@unj.ac.id', 'student', '$2y$10$fmkg.KY63ItSWj2jzXj4l.9rlwBIzaecWFJs6ojResv/DX5ZEs0RK', NULL, '2015-12-26 00:37:52', '2015-12-26 00:37:52'),
(13, 'Mulyono', 'mulyono@gmail.com', 'dosen', '$2y$10$CzZWf126s.RYwH04HFnYAuI1KRIYj0ZEX/w7Gpel5/Gt0/SLQucCm', '8JsFIN41rCXykC5AYIcWKggztplexwKusvd2QtfmTq1bLQhp4Ow9VWakIVeE', '2015-12-27 13:50:28', '2015-12-30 07:30:09'),
(16, 'dinda', 'dindakhrsm@gmail.com', 'student', '$2y$10$j3DmkGmfBTrTnHZOoRDl3.EpsZx/isCHyWcDaGuCQjd3d2N7K459y', 'ecZpYa8FgpJQqPaHPlwCvFDKYFuuY5dWbpuSMII0Iivu9nRD1KgLUdVIcfMO', '2015-12-28 15:55:48', '2015-12-30 09:52:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Id_Admin`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Kode_Matkul`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`Kode_Dosen`);

--
-- Indexes for table `macaddrs`
--
ALTER TABLE `macaddrs`
  ADD PRIMARY KEY (`MAC_Addr`), ADD KEY `macaddrs_noreg_foreign` (`Noreg`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `presences`
--
ALTER TABLE `presences`
  ADD PRIMARY KEY (`id_temu`), ADD KEY `presences_noreg_foreign` (`Noreg`), ADD KEY `presences_kode_dosen_foreign` (`Kode_Dosen`), ADD KEY `presences_kode_matkul_foreign` (`Kode_Matkul`), ADD KEY `presences_id_ruang_foreign` (`id_ruang`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Noreg`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id_topik`), ADD UNIQUE KEY `pertemuan_ke` (`pertemuan_ke`), ADD KEY `topics_kode_matkul_foreign` (`Kode_Matkul`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id_topik` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `macaddrs`
--
ALTER TABLE `macaddrs`
ADD CONSTRAINT `macaddrs_noreg_foreign` FOREIGN KEY (`Noreg`) REFERENCES `students` (`Noreg`);

--
-- Constraints for table `presences`
--
ALTER TABLE `presences`
ADD CONSTRAINT `presences_id_ruang_foreign` FOREIGN KEY (`id_ruang`) REFERENCES `rooms` (`id_ruang`),
ADD CONSTRAINT `presences_kode_dosen_foreign` FOREIGN KEY (`Kode_Dosen`) REFERENCES `lecturers` (`Kode_Dosen`),
ADD CONSTRAINT `presences_kode_matkul_foreign` FOREIGN KEY (`Kode_Matkul`) REFERENCES `courses` (`Kode_Matkul`),
ADD CONSTRAINT `presences_noreg_foreign` FOREIGN KEY (`Noreg`) REFERENCES `students` (`Noreg`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
ADD CONSTRAINT `topics_kode_matkul_foreign` FOREIGN KEY (`Kode_Matkul`) REFERENCES `courses` (`Kode_Matkul`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
