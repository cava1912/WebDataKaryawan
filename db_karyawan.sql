-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2026 at 05:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL COMMENT 'ID Unik',
  `nama` varchar(100) NOT NULL COMMENT 'Nama Karyawan',
  `jabatan` varchar(100) NOT NULL COMMENT 'Jabatan',
  `alamat` text NOT NULL COMMENT 'Alamat',
  `foto` varchar(255) NOT NULL COMMENT 'Nama file foto',
  `statuss` enum('Aktif','Inaktif') NOT NULL COMMENT 'Status kerja',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Insert Otomatis'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `jabatan`, `alamat`, `foto`, `statuss`, `created_at`) VALUES
(9, 'Achmad Kahlil Gibran', 'Staff Programmer', 'Jalan Darmosugondo Gang Kedondong', '', 'Inaktif', '2026-03-03 14:26:10'),
(14, 'Adi Kristianto', 'Teknisi', 'Jalan Kalimantan', '', 'Aktif', '2026-03-03 14:35:04'),
(15, 'Akhmad Aditya Rachman', 'Teknisi', 'Jalan Pinus', '', 'Aktif', '2026-03-03 14:35:46'),
(17, 'Andika Fikri Maulanaa', 'Staff Programmerr', 'Jalan Kiwii', '', 'Inaktif', '2026-03-03 15:30:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Unik', AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
