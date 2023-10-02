-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230519.412835eeb4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 10:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `amil`
--

CREATE TABLE `amil` (
  `id_amil` int(2) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `img` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amil`
--

INSERT INTO `amil` (`id_amil`, `uname`, `pass`, `img`) VALUES
(4, 'yovie', 'admin', 'amil.jpg'),
(5, 'admin', 'admin', 'amil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bayarzakat`
--

CREATE TABLE `bayarzakat` (
  `id_zakat` int(4) NOT NULL,
  `nama_kk` varchar(50) NOT NULL,
  `jml_tanggungan` int(2) NOT NULL,
  `besar_bayar` int(10) NOT NULL,
  `beras` tinyint(1) DEFAULT NULL,
  `uang` tinyint(1) DEFAULT NULL,
  `no_kk` varchar(16) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayarzakat`
--

INSERT INTO `bayarzakat` (`id_zakat`, `nama_kk`, `jml_tanggungan`, `besar_bayar`, `beras`, `uang`, `no_kk`, `waktu`) VALUES
(5, 'Yovie', 4, 150000, 0, 1, '3201012345678901', '2023-05-20 07:12:38'),
(6, 'Sandiana', 8, 20, 1, 0, '3201012345678903', '2023-05-20 07:12:56'),
(7, 'Spongebob', 4, 150000, 0, 1, '3201012345678904', '2023-05-20 07:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `distribusi`
--

CREATE TABLE `distribusi` (
  `id_penerimaan` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `jml_tanggungan` int(2) NOT NULL,
  `besar` float NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distribusi`
--

INSERT INTO `distribusi` (`id_penerimaan`, `nama`, `kategori`, `jml_tanggungan`, `besar`, `no_kk`, `waktu`) VALUES
(7, 'Patrick', 'Fakir', 1, 4.44444, '3201012345678953', '2023-05-20 14:30:17'),
(8, 'Dan Heng', 'Ibnu Sabil', 4, 17.7778, '3201012345678951', '2023-05-20 14:30:28'),
(9, 'Gepard', 'Fi Sabilillah', 2, 8.88889, '3201012345678952', '2023-05-20 14:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `mustahik`
--

CREATE TABLE `mustahik` (
  `no_kk` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `jml_tanggungan` int(2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mustahik`
--

INSERT INTO `mustahik` (`no_kk`, `nama`, `kategori`, `jml_tanggungan`, `status`) VALUES
('3201012345678951', 'Dan Heng', 'Ibnu Sabil', 4, 1),
('3201012345678952', 'Gepard', 'Fi Sabilillah', 2, 1),
('3201012345678953', 'Patrick', 'Fakir', 1, 1),
('3201012345678954', 'Plankton', 'Gharim', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `muzakki`
--

CREATE TABLE `muzakki` (
  `no_kk` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jml_tanggungan` int(2) NOT NULL,
  `beras` int(10) NOT NULL,
  `uang` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `muzakki`
--

INSERT INTO `muzakki` (`no_kk`, `nama`, `jml_tanggungan`, `beras`, `uang`, `status`) VALUES
('217006081', 'C', 4, 10, 150000, 0),
('3201012345678901', 'Yovie', 4, 10, 150000, 1),
('3201012345678902', 'Pradea', 2, 5, 75000, 0),
('3201012345678903', 'Sandiana', 8, 20, 300000, 1),
('3201012345678904', 'Spongebob', 4, 10, 150000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amil`
--
ALTER TABLE `amil`
  ADD PRIMARY KEY (`id_amil`);

--
-- Indexes for table `bayarzakat`
--
ALTER TABLE `bayarzakat`
  ADD PRIMARY KEY (`id_zakat`);

--
-- Indexes for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `mustahik`
--
ALTER TABLE `mustahik`
  ADD PRIMARY KEY (`no_kk`);

--
-- Indexes for table `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`no_kk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amil`
--
ALTER TABLE `amil`
  MODIFY `id_amil` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bayarzakat`
--
ALTER TABLE `bayarzakat`
  MODIFY `id_zakat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `distribusi`
--
ALTER TABLE `distribusi`
  MODIFY `id_penerimaan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
