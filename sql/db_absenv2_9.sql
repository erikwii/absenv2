-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2016 at 04:56 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
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
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `seksi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Kode_Matkul` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Nama_Matkul` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `SKS` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `prodi_id` int(10) unsigned NOT NULL,
  `day` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(10) unsigned NOT NULL,
  `course_start_day` date NOT NULL,
  `Kode_Dosen` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_ruang` int(10) unsigned NOT NULL,
  `id_semester` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`seksi`),
  UNIQUE KEY `composite_unique` (`Kode_Matkul`,`id_semester`),
  KEY `prodi` (`prodi_id`),
  KEY `Kode_Dosen` (`Kode_Dosen`),
  KEY `id_ruang` (`id_ruang`),
  KEY `id_semester` (`id_semester`),
  KEY `time` (`time`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`seksi`, `Kode_Matkul`, `Nama_Matkul`, `SKS`, `prodi_id`, `day`, `time`, `course_start_day`, `Kode_Dosen`, `id_ruang`, `id_semester`, `created_at`, `updated_at`) VALUES
(1, '11234', 'Pemrograman', '4', 3, 'Selasa', 1, '0000-00-00', '1111', 1, 1, '2016-01-25 03:44:25', '2016-01-25 07:46:25'),
(2, '3901', 'Perancangan Sistem', '3', 3, 'Rabu', 4, '0000-00-00', '1111', 2, 1, '2016-01-25 03:44:25', '2016-01-19 12:29:50'),
(3, '3902', 'Pengolahan Citra', '3', 3, 'Selasa', 3, '2016-01-04', '1111', 3, 1, '2016-01-25 03:44:25', '0000-00-00 00:00:00'),
(4, '3903', 'Jaringan Komputer', '3', 3, 'Senin', 1, '2016-01-04', '1111', 2, 1, '2016-01-25 03:44:25', '0000-00-00 00:00:00'),
(5, '3904', 'Cryptography', '3', 3, 'Jumat', 1, '2016-01-01', '1111', 1, 1, '2016-01-25 03:44:25', '0000-00-00 00:00:00'),
(6, '3905', 'Interaksi Komputer', '3', 3, 'Kamis', 2, '2016-01-07', '1111', 3, 1, '2016-01-25 03:44:25', '0000-00-00 00:00:00'),
(7, '3906', 'Computer Security', '3', 3, 'Kamis', 3, '2016-01-07', '1111', 1, 1, '2016-01-25 03:44:25', '0000-00-00 00:00:00'),
(8, '3907', 'Metode Penelitian', '2', 3, 'Selasa', 1, '2016-01-05', '1111', 2, 1, '2016-01-25 03:44:25', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `constraint_course_kd_foreign` FOREIGN KEY (`Kode_Dosen`) REFERENCES `lecturers` (`Kode_Dosen`),
  ADD CONSTRAINT `constraint_course_prodi_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`),
  ADD CONSTRAINT `constraint_course_semester_foreign` FOREIGN KEY (`id_semester`) REFERENCES `kalender_akademik` (`id`),
  ADD CONSTRAINT `constraint_course_waktu_foreign` FOREIGN KEY (`time`) REFERENCES `waktu_kuliah` (`id`),
  ADD CONSTRAINT `courses_id_ruang_foreign` FOREIGN KEY (`id_ruang`) REFERENCES `prodi` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
