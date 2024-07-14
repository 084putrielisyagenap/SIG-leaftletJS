-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 06:57 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_muna`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `latlng` varchar(100) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `marker` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `latlng`, `nama_lokasi`, `kategori`, `gambar`, `marker`) VALUES
(22, '-4.841345, 122.723872', 'Tk perwanida 1 raha', 'Taman Kanak-Kanak', 'Tk perwanida 1 raha.jpg', 'gold'),
(23, '-4.841120, 122.723754', 'TK Perwanida 2', 'Taman Kanak-Kanak', 'TK Perwanida 2.jpg', 'gold'),
(24, '-4.848011, 122.720594', 'TK Aiman', 'Taman Kanak-Kanak', 'TK Aiman.jpeg', 'gold'),
(25, '-4.837724, 122.716631', 'TK/SD Ibnu Abbas Raha', 'Taman Kanak-Kanak', 'TK Ibnu Abbas Raha.jpg', 'gold'),
(26, '-4.837617, 122.728251', 'TK / PAUD AL MARKAZ AL MUNAJAT', 'Taman Kanak-Kanak', 'TK PAUD AL MARKAZ AL MUNAJAT.jpg', 'gold'),
(27, '-4.839451, 122.715263', 'SMA NEGERI 2 RAHA', 'Sekolah Menengah Atas', 'SMA 2 RAHA.jpeg', 'grey'),
(28, '-4.834963, 122.720131', 'SD Negeri 4 Katobu', 'Sekolah Dasar', 'SDN 4 Katobu.jpeg', 'red'),
(29, '-4.819854, 122.724887', 'TK-IT Al Ilmu Raha', 'Taman Kanak-Kanak', 'TK-IT Al Ilmu Raha.jpeg', 'gold'),
(30, '-4.861248, 122.720424', 'TK Dharmawanita Wapunto', 'Taman Kanak-Kanak', 'TK Dharmawanita Wapunto.jpeg', 'gold'),
(31, '-4.824472, 122.719051', 'TK Perwanida III', 'Taman Kanak-Kanak', 'TK Perwanida III.jpg', 'gold'),
(32, '-4.858955, 122.727648', 'TK Lagasa', 'Taman Kanak-Kanak', 'TK Lagasa.jpeg', 'gold'),
(33, '-4.825589, 122.716099', 'TK PEMBINA NEGERI RAHA', 'Taman Kanak-Kanak', 'TK PEMBINA NEGERI RAHA.jpeg', 'gold'),
(34, '-4.829040, 122.719915', 'SD Negeri 5 Katobu', 'Sekolah Dasar', 'SD Negeri 5 Katobu.jpg', 'red'),
(35, '-4.832162, 122.717554', 'SD Negeri 10 Katobu', 'Sekolah Dasar', 'SD Negeri 10 Katobu.jpeg', 'red'),
(36, '-4.807868, 122.704163', 'SD NEGERI 3 BATALAIWORU', 'Sekolah Dasar', 'SD NEGERI 3 BATALAIWORU.jpeg', 'red'),
(37, '-4.829108, 122.724443', 'SD Negeri 15 Raha', 'Sekolah Dasar', 'SD Negeri 15 Raha.jpg', 'red'),
(38, '-4.857738, 122.721154', 'SD Negeri 1 Duruka', 'Sekolah Dasar', 'SD Negeri 1 Duruka.jpeg', 'red'),
(39, '-4.829713, 122.720607', 'Sd 9 lohia', 'Sekolah Dasar', 'Sd 9 lohia.jpeg', 'red'),
(40, '-4.826661, 122.715960', 'SD Bertingkat Raha III', 'Sekolah Dasar', 'SD Bertingkat Raha III.jpeg', 'red'),
(41, '-4.836124, 122.715436', 'SD Negeri 20 Katobu', 'Sekolah Dasar', 'SD Negeri 20 Katobu.jpeg', 'red'),
(42, '-4.822034, 122.720444', 'SD Negeri 6 Katobu', 'Sekolah Dasar', 'SD Negeri 6 Katobu.jpg', 'red'),
(43, '-4.813182, 122.723319', 'SMP IT Insan Cendekia', 'Sekolah Menengah Pertama', 'SMP IT Insan Cendekia.jpg', 'blue'),
(44, '-4.819126, 122.721474', 'SMP Negeri 2 Raha', 'Sekolah Menengah Pertama', 'SMP Negeri 2 Raha.jpg', 'blue'),
(45, '-4.836943, 122.714856', 'SMP Negeri 3 Raha', 'Sekolah Menengah Pertama', 'SMP Negeri 3 Raha.jpg', 'blue'),
(46, '-4.839864, 122.715838', 'SMP Negeri 1 Raha', 'Sekolah Menengah Pertama', 'SMP Negeri 1 Raha.jpg', 'blue'),
(47, '-4.847470, 122.721564', 'UPTD SMP Negeri 4 Raha', 'Sekolah Menengah Pertama', 'UPTD SMP Negeri 4 Raha.jpg', 'blue'),
(48, '-4.837398, 122.716737', 'SMPS Ibnu ABBAS MUNA', 'Sekolah Menengah Pertama', 'SMPS Ibnu ABBAS MUNA.jpg', 'blue'),
(49, '-4.809321, 122.721003', 'SMP LB ABC Raha', 'Sekolah Menengah Pertama', 'SMP LB ABC Raha.jpeg', 'blue'),
(50, '-4.827871, 122.718202', 'SMP PGRI Raha', 'Sekolah Menengah Pertama', 'SMP PGRI Raha.jpeg', 'blue'),
(51, '-4.812226, 122.732385', 'SMP 6 Raha', 'Sekolah Menengah Pertama', 'SMP 6 Raha.jpeg', 'blue'),
(52, '-4.845148, 122.721695', 'SMP Frater Raha', 'Sekolah Menengah Pertama', 'SMP Frater Raha.jpg', 'blue'),
(53, '-4.829123, 122.720058', 'Smp Muhammadiyah Raha', 'Sekolah Menengah Pertama', 'Smp Muhammadiyah Raha.jpeg', 'blue'),
(54, '-4.821597, 122.718298', 'SMA Negeri 1 Raha', 'Sekolah Menengah Atas', 'SMA Negeri 1 Raha.jpg', 'grey'),
(55, '-4.829897, 122.717200', 'SMA Muhammadiyah Raha', 'Sekolah Menengah Atas', 'SMA Muhammadiyah Raha.jpeg', 'grey'),
(56, '-4.828065, 122.716649', 'SMA PGRI Raha', 'Sekolah Menengah Atas', 'SMA PGRI Raha.jpeg', 'grey'),
(57, '-4.837840, 122.716555', 'SMA SWASTA IBNU ABBAS', 'Sekolah Menengah Atas', 'SMA SWASTA IBNU ABBAS.jpeg', 'grey'),
(58, '-4.842066, 122.722832', 'SMA Swasta YAPRIS Raha', 'Sekolah Menengah Atas', 'SMA Swasta YAPRIS Raha.jpg', 'grey'),
(59, '-4.786881, 122.720405', 'SMA Negeri 4 Raha', 'Sekolah Menengah Atas', 'SMA Negeri 4 Raha.jpg', 'grey'),
(60, '-4.802687, 122.719213', 'SMA Negeri 3 Raha', 'Sekolah Menengah Atas', 'SMA Negeri 3 Raha.jpg', 'grey'),
(61, '-4.816136, 122.717471', 'SMAS Nurun Nahdlatain Raha IBS', 'Sekolah Menengah Atas', 'SMAS Nurun Nahdlatain Raha IBS.jpeg', 'grey'),
(62, '-4.821430, 122.718258', 'Extension', 'Sekolah Menengah Atas', 'Extension.jpg', 'grey'),
(63, '-4.805665, 122.720617', 'PONPES NURUN NAHDLATAIN NW RAHA', 'Pesantren', 'PONPES NURUN NAHDLATAIN NW RAHA.jpeg', 'violet'),
(64, '-4.840047, 122.723364', 'Pondok Pesantren Nahdlatul Ummah', 'Pesantren', 'Pondok Pesantren Nahdlatul Ummah.jpeg', 'violet'),
(65, '-4.810112, 122.724394', 'Pondok pesantren INSAN CENDEKIA MUNA', 'Pesantren', 'Pondok pesantren INSAN CENDEKIA MUNA.jpeg', 'violet'),
(66, '-4.794095, 122.710773', 'Pesantren Hidayatullah Raha', 'Pesantren', 'Pesantren Hidayatullah Raha.jpg', 'violet');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`) VALUES
('admin', '$2y$10$y52WTE2gF.bq9qRdBH2DxuqeOuOuWMe.mYQBNhk2ZaepqHWol5Rya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
