-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2016 at 02:37 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absenv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `Nama_Admin` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `Telepon` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `Nama_Admin`, `Alamat`, `Telepon`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 'admin2', 'aaa', '111', 34, '2016-02-10 15:55:59', '2016-02-10 16:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `seksi` int(10) UNSIGNED NOT NULL,
  `Kode_Matkul` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nama_Matkul` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `SKS` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `prodi_id` int(10) UNSIGNED NOT NULL,
  `day` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(10) UNSIGNED NOT NULL,
  `course_start_day` date NOT NULL,
  `Kode_Dosen` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_ruang` int(10) UNSIGNED NOT NULL,
  `id_semester` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`seksi`, `Kode_Matkul`, `Nama_Matkul`, `SKS`, `prodi_id`, `day`, `time`, `course_start_day`, `Kode_Dosen`, `id_ruang`, `id_semester`, `created_at`, `updated_at`) VALUES
(1, '11234', 'Pemrograman', '4', 3, 'Selasa', 1, '0000-00-00', '1111', 1, 1, '2016-01-25 03:44:25', '2016-01-25 07:46:25'),
(2, '3901', 'Perancangan Sistem', '3', 3, 'Kamis', 3, '0000-00-00', '1111', 2, 1, '2016-01-25 03:44:25', '2016-01-19 12:29:50'),
(3, '3902', 'Pengolahan Citra', '3', 3, 'Senin', 2, '2016-01-04', '1111', 3, 1, '2016-01-25 03:44:25', '0000-00-00 00:00:00'),
(4, '3903', 'Jaringan Komputer', '3', 3, 'Senin', 1, '2016-01-04', '1111', 2, 1, '2016-01-25 03:44:25', '0000-00-00 00:00:00'),
(5, '3904', 'Cryptography', '3', 3, 'Senin', 1, '2016-01-01', '1111', 1, 1, '2016-01-25 03:44:25', '0000-00-00 00:00:00'),
(6, '3905', 'Interaksi Komputer', '3', 3, 'Kamis', 2, '2016-01-07', '1111', 3, 1, '2016-01-25 03:44:25', '0000-00-00 00:00:00'),
(7, '3906', 'Computer Security', '3', 3, 'Kamis', 3, '2016-01-07', '1111', 1, 1, '2016-01-25 03:44:25', '0000-00-00 00:00:00'),
(8, '3907', 'Metode Penelitian', '2', 3, 'Selasa', 1, '2016-01-05', '1111', 2, 1, '2016-01-25 03:44:25', '0000-00-00 00:00:00'),
(9, '3214', 'Course Test', '3', 3, 'Kamis', 3, '0000-00-00', '1233', 1, 2, '2016-03-10 06:07:56', '2016-03-10 06:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_seksi` int(10) UNSIGNED NOT NULL,
  `noreg` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `kode_seksi`, `noreg`, `created_at`, `updated_at`) VALUES
(1, 2, '1231', '2016-01-25 04:52:11', '2016-01-25 04:52:11'),
(2, 3, '1231', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, '1221', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 5, '1231', '2016-02-29 02:24:27', '2016-02-29 02:24:27'),
(5, 9, '1112231', '2016-03-10 06:10:27', '2016-03-10 06:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `kalender_akademik`
--

CREATE TABLE `kalender_akademik` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester` int(11) NOT NULL,
  `start_period` date NOT NULL,
  `end_period` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kalender_akademik`
--

INSERT INTO `kalender_akademik` (`id`, `semester`, `start_period`, `end_period`, `created_at`, `updated_at`) VALUES
(1, 103, '2015-09-01', '2016-02-01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 104, '2016-02-02', '2016-06-10', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `Kode_Dosen` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Nama_Dosen` text COLLATE utf8_unicode_ci NOT NULL,
  `Telepon` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`Kode_Dosen`, `Nama_Dosen`, `Telepon`, `id_user`, `created_at`, `updated_at`) VALUES
('1111', 'dosen2', '088210355252', 28, '2016-01-18 23:47:05', '2016-01-30 09:27:05'),
('1134', 'dosen', '', 17, '2016-01-02 04:04:20', '2016-01-02 04:04:20'),
('1233', 'dosen3', '', 35, '2016-03-10 06:06:45', '2016-03-10 06:06:45'),
('2233', 'dosen4 22', '', 37, '2016-03-10 06:19:59', '2016-03-10 06:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `macaddrs`
--

CREATE TABLE `macaddrs` (
  `MAC_Addr` bigint(20) NOT NULL,
  `Noreg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
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

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presences`
--

CREATE TABLE `presences` (
  `id` int(10) UNSIGNED NOT NULL,
  `pertemuan_ke` int(11) NOT NULL,
  `kode_seksi` int(10) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `Noreg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Kehadiran` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `presences`
--

INSERT INTO `presences` (`id`, `pertemuan_ke`, `kode_seksi`, `tanggal`, `Noreg`, `Kehadiran`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2016-01-05 00:00:00', '1231', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 2, '2016-01-05 00:00:00', '1231', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 3, '0000-00-00 00:00:00', '1231', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 3, 2, '2016-01-28 15:26:14', '1231', 1, '2016-01-28 08:26:18', '2016-01-28 08:26:18'),
(12, 1, 5, '2016-02-29 10:51:01', '1231', 1, '2016-02-29 03:51:01', '2016-02-29 03:51:01'),
(13, 2, 5, '2016-03-07 09:16:28', '1231', 1, '2016-03-07 02:16:28', '2016-03-07 02:16:28'),
(17, 2, 3, '2016-03-07 10:33:05', '1231', 1, '2016-03-07 03:33:05', '2016-03-07 03:33:05'),
(18, 1, 9, '2016-03-10 13:10:51', '1112231', 1, '2016-03-10 06:10:51', '2016-03-10 06:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(10) UNSIGNED NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` int(11) DEFAULT NULL
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

CREATE TABLE `rooms` (
  `id_ruang` int(10) UNSIGNED NOT NULL,
  `nama_ruang` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `lokasi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `daya_tampung` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id_ruang`, `nama_ruang`, `lokasi`, `daya_tampung`, `created_at`, `updated_at`) VALUES
(1, '513', 'IDB 2 Lt 5', 0, '0000-00-00 00:00:00', '2016-02-12 14:43:16'),
(2, '511', 'IDB 2', 0, '0000-00-00 00:00:00', '2016-02-12 14:43:56'),
(3, '501', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Noreg` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nama_Mhs` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Prodi_Id` int(10) UNSIGNED NOT NULL,
  `Alamat` text COLLATE utf8_unicode_ci,
  `Telepon` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Semester` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Mac` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Noreg`, `Nama_Mhs`, `Prodi_Id`, `Alamat`, `Telepon`, `Semester`, `Mac`, `id_user`, `created_at`, `updated_at`) VALUES
('1002330', 'admin', 3, '', NULL, '100', '', 10, '2015-12-26 00:37:52', '2015-12-26 00:37:52'),
('1112231', 'student4', 3, '', '', '99', '', 36, '2016-03-10 06:08:59', '2016-03-10 06:08:59'),
('1221', 'student', 1, '', '1234', '100', '', 25, '2016-01-18 09:46:58', '2016-02-29 01:02:12'),
('1231', 'student2', 3, '', '', '99', '', 27, '2016-01-18 11:08:44', '2016-01-30 08:58:55'),
('3135136204', 'dinda', 3, '', '000', '103', '', 16, '2015-12-28 15:55:48', '2015-12-28 15:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id_topik` int(10) UNSIGNED NOT NULL,
  `pertemuan_ke` int(11) NOT NULL,
  `kode_seksi` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `nama_topik` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_mhs` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id_topik`, `pertemuan_ke`, `kode_seksi`, `tanggal`, `nama_topik`, `jumlah_mhs`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '0000-00-00', 'apaajaaa', '22', '2016-01-01 05:24:20', '2016-01-22 03:22:19'),
(3, 2, 3, '2016-01-11', 'trial 2b', '20', '2016-01-01 11:04:03', '2016-01-25 10:46:53'),
(6, 2, 2, '2016-01-18', 'aa', '11', '2016-01-25 10:27:45', '2016-01-25 10:27:45'),
(7, 1, 1, '0000-00-00', 'intro', '30', '2016-02-29 00:17:32', '2016-02-29 00:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'admin', 'admin@unj.ac.id', 'student', '$2y$10$fmkg.KY63ItSWj2jzXj4l.9rlwBIzaecWFJs6ojResv/DX5ZEs0RK', 'ajq8yR53TZsiF2CE9c5OBn6uwtDWq0SScHWjlpmhunP7uES97CseSH1XsZxF', '2015-12-26 00:37:52', '2016-01-11 03:59:13'),
(16, 'dinda', 'dindakhrsm@gmail.com', 'student', '$2y$10$j3DmkGmfBTrTnHZOoRDl3.EpsZx/isCHyWcDaGuCQjd3d2N7K459y', 'ecZpYa8FgpJQqPaHPlwCvFDKYFuuY5dWbpuSMII0Iivu9nRD1KgLUdVIcfMO', '2015-12-28 15:55:48', '2015-12-30 09:52:32'),
(17, 'dosen', 'dosen@unj.ac.id', 'dosen', '$2y$10$ed1ljWSLHKUIgEo26i/upeI4XRlQWGTLGTfVfAng5ityV1Dfx7ET.', 'AZ40d2wkNXxsMLAHTzrfPcHJM4nHJoO2YjxXhhKTvMqYpsoLdmkkJLwUl3v7', '2016-01-02 04:04:20', '2016-01-11 03:21:35'),
(25, 'student', 'student@unj.ac.id', 'student', '$2y$10$ae.wpNLN1u9rswkBjMjDFuks482N0v4v45Pb7j4.euxKWNbC7AmcG', 'PZKMqcrgSa4irve9ywEeqBajg4NaKYc8m6mb4uOoGyQL9w5WF64V2lAr0s3I', '2016-01-18 09:46:58', '2016-02-29 01:08:31'),
(27, 'student2', 'student2@unj.ac.id', 'student', '$2y$10$1vEcPcYgoZAwSaKSkt5NHeDHdGkQbRmb7tUQDnVzKG2pzmN/IGyJO', 'BZyZWBEeiInTNZ9Qa8rN6gYYJMOo899IS7lY2rhZXQ5bxLkgilE5gi1ze2TG', '2016-01-18 11:08:44', '2016-03-07 03:45:34'),
(28, 'dosen2', 'dosen2@unj.ac.id', 'dosen', '$2y$10$g1Hr2kiyVbfNPAMQ19FMz.CKQigXs9rvYWOhwzEmewJWXnCIQ.lQ6', 'pxqtZhXgWYyOt9vw5GseO1ttA4XuGBGy1L4cEFOJh6L1wkAEkwJSBL0A8f1U', '2016-01-18 23:47:05', '2016-02-29 02:11:46'),
(34, 'admin2', 'admin2@unj.ac.id', 'admin', '$2y$10$h2yLnDPuMmt3cvqlDzFp3.ew6IZGrWGyJA0UtkkBYtkgvTSP0zmQ.', 'hIOUflQPYJV9tZV2QYenTaP4535WSB7tq3cgy0uaif9ftmcHzSVltGPV1gBP', '2016-02-10 15:55:59', '2016-02-29 00:33:04'),
(35, 'dosen3', 'dosen3@unj.ac.id', 'dosen', '$2y$10$vuiNqdLdh.n8FQ3LnGDG4.OFIQLBqHx1QUdd2EwPcQjdhMRy84/X2', 'ORTH5LhWyfGcJCeyqW0v0uaf53oebwsAk2Q70hEITIX1RwJ2PjqBDGEJIKAy', '2016-03-10 06:06:44', '2016-03-10 06:08:10'),
(36, 'student4', 'student4@unj.ac.id', 'student', '$2y$10$d3txDPeKSUjeN.rdV65/5eCsqqLhz9muUoF8kjKBs7yJTLpUB93NC', 'Q6AVf7OhB6LtMZk9rXYPgQJGYWLqunZhatHwxpvhK6oFNhsZBQCSx5BwUrW5', '2016-03-10 06:08:59', '2016-03-10 06:15:11'),
(37, 'dosen4 22', 'dosen4@unj.ac.id', 'dosen', '$2y$10$JUZhmHWYl2RrZvEssMdv/OpvF.Ms8ykNKZkDhKQa5XXMB08yIuj8m', NULL, '2016-03-10 06:19:59', '2016-03-10 06:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `waktu_kuliah`
--

CREATE TABLE `waktu_kuliah` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_waktu` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `waktu_start` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `waktu_end` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waktu_kuliah`
--

INSERT INTO `waktu_kuliah` (`id`, `kode_waktu`, `waktu_start`, `waktu_end`) VALUES
(1, '0-1', '07:30', '10:00'),
(2, '2+', '10:00', '12:30'),
(3, '3-4', '13:00', '15:30'),
(4, '5+', '16:00', '18:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`seksi`),
  ADD UNIQUE KEY `composite_unique` (`Kode_Matkul`,`id_semester`),
  ADD KEY `prodi` (`prodi_id`),
  ADD KEY `Kode_Dosen` (`Kode_Dosen`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_semester` (`id_semester`),
  ADD KEY `time` (`time`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_index` (`kode_seksi`,`noreg`),
  ADD KEY `course_id` (`kode_seksi`),
  ADD KEY `student_id` (`noreg`);

--
-- Indexes for table `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semester` (`semester`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`Kode_Dosen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `macaddrs`
--
ALTER TABLE `macaddrs`
  ADD PRIMARY KEY (`MAC_Addr`),
  ADD KEY `macaddrs_noreg_foreign` (`Noreg`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `presences`
--
ALTER TABLE `presences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_composite` (`pertemuan_ke`,`kode_seksi`),
  ADD KEY `presences_noreg_foreign` (`Noreg`),
  ADD KEY `presences_kode_matkul_foreign` (`kode_seksi`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`Noreg`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `Prodi_Id` (`Prodi_Id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id_topik`),
  ADD UNIQUE KEY `unique_index` (`pertemuan_ke`,`kode_seksi`),
  ADD KEY `kode_seksi` (`kode_seksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `waktu_kuliah`
--
ALTER TABLE `waktu_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `seksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `presences`
--
ALTER TABLE `presences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id_ruang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id_topik` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `waktu_kuliah`
--
ALTER TABLE `waktu_kuliah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  ADD CONSTRAINT `constraint_course_prodi_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`),
  ADD CONSTRAINT `constraint_course_semester_foreign` FOREIGN KEY (`id_semester`) REFERENCES `kalender_akademik` (`id`),
  ADD CONSTRAINT `constraint_course_waktu_foreign` FOREIGN KEY (`time`) REFERENCES `waktu_kuliah` (`id`),
  ADD CONSTRAINT `courses_id_ruang_foreign` FOREIGN KEY (`id_ruang`) REFERENCES `prodi` (`id`);

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `constraint_enroll_course_foreign` FOREIGN KEY (`kode_seksi`) REFERENCES `courses` (`seksi`),
  ADD CONSTRAINT `constraint_enroll_student_foreign` FOREIGN KEY (`noreg`) REFERENCES `students` (`Noreg`);

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
  ADD CONSTRAINT `constraint_presence_course_foreign` FOREIGN KEY (`kode_seksi`) REFERENCES `courses` (`seksi`),
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
  ADD CONSTRAINT `constraint_topic_course_foreign` FOREIGN KEY (`kode_seksi`) REFERENCES `courses` (`seksi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
