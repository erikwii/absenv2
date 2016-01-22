-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2016 at 02:15 PM
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
  `id_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Id_Admin`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `Kode_Matkul` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nama_Matkul` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `SKS` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `prodi_id` int(10) unsigned NOT NULL,
  `day` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `course_start_day` date NOT NULL,
  `Kode_Dosen` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Kode_Matkul`),
  KEY `prodi` (`prodi_id`),
  KEY `Kode_Dosen` (`Kode_Dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Kode_Matkul`, `Nama_Matkul`, `SKS`, `prodi_id`, `day`, `time`, `course_start_day`, `Kode_Dosen`, `created_at`, `updated_at`) VALUES
('11234', 'Pemrograman', '3', 3, 'Selasa', '2+', '2016-01-20', '1111', '2016-01-19 11:52:01', '2016-01-19 09:38:59'),
('3901', 'Perancangan Sistem', '3', 3, 'Selasa', '2+', '0000-00-00', '1111', '2016-01-19 12:29:50', '2016-01-19 12:29:50'),
('3902', 'Pengolahan Citra', '3', 3, 'Selasa', '2+', '2016-01-04', '1111', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('3903', 'Jaringan Komputer', '3', 3, 'Senin', '3-4', '2016-01-04', '1111', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('3904', 'Cryptography', '3', 3, 'Jumat', '2+', '2016-01-01', '1111', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('3905', 'Interaksi Komputer', '3', 3, 'Kamis', '3-4', '2016-01-07', '1111', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('3906', 'Computer Security', '3', 3, 'Kamis', '2+', '2016-01-07', '1111', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('3907', 'Metode Penelitian', '2', 3, 'Selasa', '1', '2016-01-05', '1111', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE IF NOT EXISTS `lecturers` (
  `Kode_Dosen` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Nama_Dosen` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Telepon` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Kode_Dosen`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`Kode_Dosen`, `Nama_Dosen`, `Telepon`, `id_user`, `created_at`, `updated_at`) VALUES
('1111', 'dosen2', '', 28, '2016-01-18 23:47:05', '2016-01-18 23:47:05'),
('1134', 'dosen', '', 17, '2016-01-02 04:04:20', '2016-01-02 04:04:20');

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
('2015_12_21_080530_create_articles_table', 2),
('2015_12_25_220754_create_sessions_table', 3);

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
  `pertemuan_ke` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `Noreg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Kode_Dosen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Kode_Matkul` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_ruang` int(10) unsigned NOT NULL,
  `Kehadiran` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_temu`),
  KEY `presences_noreg_foreign` (`Noreg`),
  KEY `presences_kode_dosen_foreign` (`Kode_Dosen`),
  KEY `presences_kode_matkul_foreign` (`Kode_Matkul`),
  KEY `presences_id_ruang_foreign` (`id_ruang`),
  KEY `id_ruang` (`id_ruang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `presences`
--

INSERT INTO `presences` (`id_temu`, `pertemuan_ke`, `tanggal`, `Noreg`, `Kode_Dosen`, `Kode_Matkul`, `id_ruang`, `Kehadiran`, `created_at`, `updated_at`) VALUES
('0', 1, '2016-01-05 00:00:00', '3135136204', '1134', '3901', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('3', 2, '0000-00-00 00:00:00', '3135136204', '1134', '3901', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('4', 2, '2016-01-04 00:00:00', '3135136204', '1134', '3901', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `id` int(10) unsigned NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `prodi`, `created_at`, `updated_at`) VALUES
(1, 'Pendidikan Matematika', '0000-00-00 00:00:00', 0),
(2, 'Matematika', '0000-00-00 00:00:00', 0),
(3, 'Sistem Komputer', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id_ruang` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_ruang` int(11) NOT NULL,
  `lokasi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_ruang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id_ruang`, `nama_ruang`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 513, 'Gd. Dewi Sartika Lt.5', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `Noreg` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nama_Mhs` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Prodi_Id` int(10) unsigned NOT NULL,
  `Alamat` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Telepon` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Semester` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Noreg`),
  KEY `id_user` (`id_user`),
  KEY `Prodi_Id` (`Prodi_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Noreg`, `Nama_Mhs`, `Prodi_Id`, `Alamat`, `Telepon`, `Semester`, `id_user`, `created_at`, `updated_at`) VALUES
('1002330', 'admin', 3, '', NULL, '100', 10, '2015-12-26 00:37:52', '2015-12-26 00:37:52'),
('1221', 'student', 3, '', '', '100', 25, '2016-01-18 09:46:58', '2016-01-18 09:46:58'),
('1231', 'student2', 1, '', '', '100', 27, '2016-01-18 11:08:44', '2016-01-18 11:08:44'),
('3135136204', 'dinda', 3, '', '000', '103', 16, '2015-12-28 15:55:48', '2015-12-28 15:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id_topik` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pertemuan_ke` int(11) NOT NULL,
  `Kode_Matkul` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `nama_topik` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_mhs` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_topik`),
  UNIQUE KEY `unique_index` (`pertemuan_ke`,`Kode_Matkul`),
  KEY `topics_kode_matkul_foreign` (`Kode_Matkul`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id_topik`, `pertemuan_ke`, `Kode_Matkul`, `tanggal`, `nama_topik`, `jumlah_mhs`, `created_at`, `updated_at`) VALUES
(1, 1, '3901', '0000-00-00', 'apaajaaa', '22', '2016-01-01 05:24:20', '2016-01-22 03:22:19'),
(3, 2, '3902', '0000-00-00', 'trial 2', '20', '2016-01-01 11:04:03', '2016-01-01 11:04:03');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'eka', 'eka.suryana@gmail.com', NULL, '$2y$10$j4t2awUnuMBjwQBARMJBlOnTMlRJRptXejwZu6qXkcyQHza7gQDWC', 'xZlYRkzcu4IOCLnDFS8dHSgVQaqvfJCfDKrThH4RrQhNPi7FfHeD8JDu4qTu', '2015-12-21 14:03:52', '2015-12-21 14:05:07'),
(10, 'admin', 'admin@unj.ac.id', 'student', '$2y$10$fmkg.KY63ItSWj2jzXj4l.9rlwBIzaecWFJs6ojResv/DX5ZEs0RK', 'ajq8yR53TZsiF2CE9c5OBn6uwtDWq0SScHWjlpmhunP7uES97CseSH1XsZxF', '2015-12-26 00:37:52', '2016-01-11 03:59:13'),
(16, 'dinda', 'dindakhrsm@gmail.com', 'student', '$2y$10$j3DmkGmfBTrTnHZOoRDl3.EpsZx/isCHyWcDaGuCQjd3d2N7K459y', 'ecZpYa8FgpJQqPaHPlwCvFDKYFuuY5dWbpuSMII0Iivu9nRD1KgLUdVIcfMO', '2015-12-28 15:55:48', '2015-12-30 09:52:32'),
(17, 'dosen', 'dosen@unj.ac.id', 'dosen', '$2y$10$ed1ljWSLHKUIgEo26i/upeI4XRlQWGTLGTfVfAng5ityV1Dfx7ET.', 'AZ40d2wkNXxsMLAHTzrfPcHJM4nHJoO2YjxXhhKTvMqYpsoLdmkkJLwUl3v7', '2016-01-02 04:04:20', '2016-01-11 03:21:35'),
(25, 'student', 'student@unj.ac.id', 'student', '$2y$10$kIjP.1Vgnx8bk66BlSKya.VxP3U3yFwd2cJo3W/pu7/X54UqzZANq', '5lHtTHMtW8FaVYXMMEZoPrZJbv73AexxeIp02LbDd3VsxUxje1R8cR49dEtD', '2016-01-18 09:46:58', '2016-01-18 16:56:44'),
(27, 'student2', 'student2@unj.ac.id', 'student', '$2y$10$1vEcPcYgoZAwSaKSkt5NHeDHdGkQbRmb7tUQDnVzKG2pzmN/IGyJO', NULL, '2016-01-18 11:08:44', '2016-01-18 11:08:44'),
(28, 'dosen2', 'dosen2@unj.ac.id', 'dosen', '$2y$10$g1Hr2kiyVbfNPAMQ19FMz.CKQigXs9rvYWOhwzEmewJWXnCIQ.lQ6', '3HZ7UK8FSAUaLT4i5dywidWReihsNmWqo0w1JgLUahGabDjz01zekjNAxOFt', '2016-01-18 23:47:05', '2016-01-21 16:09:20');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `constraint_admin_id_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `constraint_course_kd_foreign` FOREIGN KEY (`Kode_Dosen`) REFERENCES `lecturers` (`Kode_Dosen`),
  ADD CONSTRAINT `constraint_course_prodi_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `constraint_user_id_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

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
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `constraid_user_id_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `constraint_student_prodi_foreign` FOREIGN KEY (`Prodi_Id`) REFERENCES `prodi` (`id`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_kode_matkul_foreign` FOREIGN KEY (`Kode_Matkul`) REFERENCES `courses` (`Kode_Matkul`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
