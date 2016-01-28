-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2016 at 04:03 PM
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
-- Table structure for table `presences`
--

CREATE TABLE IF NOT EXISTS `presences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pertemuan_ke` int(11) NOT NULL,
  `kode_seksi` int(10) unsigned NOT NULL,
  `tanggal` datetime NOT NULL,
  `Noreg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Kehadiran` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_composite` (`pertemuan_ke`,`kode_seksi`),
  KEY `presences_noreg_foreign` (`Noreg`),
  KEY `presences_kode_matkul_foreign` (`kode_seksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `presences`
--

INSERT INTO `presences` (`id`, `pertemuan_ke`, `kode_seksi`, `tanggal`, `Noreg`, `Kehadiran`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2016-01-05 00:00:00', '1231', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 2, '2016-01-05 00:00:00', '1231', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 3, '0000-00-00 00:00:00', '1231', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 3, 2, '2016-01-28 15:26:14', '1231', 1, '2016-01-28 08:26:18', '2016-01-28 08:26:18');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `presences`
--
ALTER TABLE `presences`
  ADD CONSTRAINT `constraint_presence_course_foreign` FOREIGN KEY (`kode_seksi`) REFERENCES `courses` (`seksi`),
  ADD CONSTRAINT `presences_noreg_foreign` FOREIGN KEY (`Noreg`) REFERENCES `students` (`Noreg`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
