-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2015 at 01:00 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_absenv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `Id_Admin` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nama_Admin` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Id_Admin`)
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
  PRIMARY KEY (`Kode_Matkul`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Kode_Matkul`, `Nama_Matkul`, `SKS`) VALUES
('3901', 'Perancangan Sistem', '3');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE IF NOT EXISTS `lecturers` (
  `Kode_Dosen` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Nama_Dosen` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Telepon` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Kode_Dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`Kode_Dosen`, `Nama_Dosen`, `Telepon`, `created_at`, `updated_at`) VALUES
('1098', 'Drs.Mulyono,M.Kom', '1234567', '2015-11-26 06:52:14', '2015-11-26 06:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `macaddrs`
--

CREATE TABLE IF NOT EXISTS `macaddrs` (
  `MAC_Addr` bigint(20) NOT NULL,
  `Noreg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`MAC_Addr`),
  KEY `macaddrs_noreg_foreign` (`Noreg`)
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
('2015_12_21_080530_create_articles_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presences`
--

CREATE TABLE IF NOT EXISTS `presences` (
  `id_temu` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `Noreg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Kode_Dosen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Kode_Matkul` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_ruang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Kehadiran` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_temu`),
  KEY `presences_noreg_foreign` (`Noreg`),
  KEY `presences_kode_dosen_foreign` (`Kode_Dosen`),
  KEY `presences_kode_matkul_foreign` (`Kode_Matkul`),
  KEY `presences_id_ruang_foreign` (`id_ruang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `presences`
--

INSERT INTO `presences` (`id_temu`, `tanggal`, `Noreg`, `Kode_Dosen`, `Kode_Matkul`, `id_ruang`, `Kehadiran`, `created_at`, `updated_at`) VALUES
('1', '2015-11-20 10:00:00', '3135136204', '1098', '3901', '513', 'Hadir', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id_ruang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lokasi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_ruang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id_ruang`, `lokasi`, `created_at`, `updated_at`) VALUES
('513', 'Gd. Dewi Sartika Lt.5', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `Noreg` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nama_Mhs` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Prodi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Alamat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Telepon` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Semester` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Noreg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Noreg`, `Nama_Mhs`, `Prodi`, `Alamat`, `Telepon`, `Semester`, `created_at`, `updated_at`) VALUES
('3135136204', 'Dinda Kharisma', 'Sistem Komputer', '', '6256972', '103', '2015-11-26 06:59:56', '2015-11-26 06:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id_topik` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_topik` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pertemuan_ke` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah_mhs` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Kode_Matkul` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_temu` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Kode_Dosen` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_topik`),
  KEY `topics_kode_matkul_foreign` (`Kode_Matkul`),
  KEY `topics_id_temu_foreign` (`id_temu`),
  KEY `topics_kode_dosen_foreign` (`Kode_Dosen`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id_topik`, `nama_topik`, `pertemuan_ke`, `tanggal`, `jumlah_mhs`, `keterangan`, `Kode_Matkul`, `id_temu`, `Kode_Dosen`, `created_at`, `updated_at`) VALUES
(1, 'Sistem Secara Umum', '1', '2015-11-20 10:00:00', '23', '-', '3901', '1', '1098', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'eka', 'eka.suryana@gmail.com', NULL, '$2y$10$j4t2awUnuMBjwQBARMJBlOnTMlRJRptXejwZu6qXkcyQHza7gQDWC', 'xZlYRkzcu4IOCLnDFS8dHSgVQaqvfJCfDKrThH4RrQhNPi7FfHeD8JDu4qTu', '2015-12-21 14:03:52', '2015-12-21 14:05:07');

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
  ADD CONSTRAINT `topics_id_temu_foreign` FOREIGN KEY (`id_temu`) REFERENCES `presences` (`id_temu`),
  ADD CONSTRAINT `topics_kode_dosen_foreign` FOREIGN KEY (`Kode_Dosen`) REFERENCES `lecturers` (`Kode_Dosen`),
  ADD CONSTRAINT `topics_kode_matkul_foreign` FOREIGN KEY (`Kode_Matkul`) REFERENCES `courses` (`Kode_Matkul`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
