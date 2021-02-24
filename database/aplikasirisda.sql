-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 06:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasirisda`
--

-- --------------------------------------------------------

--
-- Table structure for table `nasabahlunas`
--

CREATE TABLE `nasabahlunas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `norekening` varchar(255) NOT NULL,
  `pinjaman` varchar(255) NOT NULL,
  `jangkawaktu` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nasabahlunas`
--

INSERT INTO `nasabahlunas` (`id`, `nama`, `nohp`, `alamat`, `norekening`, `pinjaman`, `jangkawaktu`, `status`) VALUES
(1, 'Risda Roosy', '987654321', '987654321', '987654321', '987654312', '5 Tahun', 'Lunas'),
(2, 'diannnn', '0564231563', 'jalan bumi mas', '05445123841', '68794561321', '6 Bulan', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `nasabahmenunggak`
--

CREATE TABLE `nasabahmenunggak` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `norekening` varchar(255) NOT NULL,
  `pinjaman` varchar(255) NOT NULL,
  `tgljatuhtempo` date NOT NULL,
  `jumlahmenunggak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nasabahmenunggak`
--

INSERT INTO `nasabahmenunggak` (`id`, `nama`, `nohp`, `alamat`, `norekening`, `pinjaman`, `tgljatuhtempo`, `jumlahmenunggak`) VALUES
(1, 'Dian', '132456789', '123456789', '123456879', '123456789', '2021-04-15', '987654321'),
(2, 'risdaaaa', '0312654987', 'asdfghjkl', '123456789', '321654978', '2021-03-13', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `peminjamperbulan`
--

CREATE TABLE `peminjamperbulan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `norekening` varchar(255) NOT NULL,
  `angsuran` varchar(255) NOT NULL,
  `pinjaman` varchar(255) NOT NULL,
  `tglpencairan` date NOT NULL,
  `jangkawaktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjamperbulan`
--

INSERT INTO `peminjamperbulan` (`id`, `nama`, `nohp`, `alamat`, `norekening`, `angsuran`, `pinjaman`, `tglpencairan`, `jangkawaktu`) VALUES
(2, 'Risda', '987654321', 'lkjhgfdsa', '987654321', '987654321', '987654321', '2021-01-10', '5 Tahun'),
(4, 'As Achry', '3215649871', 'jalan pramuka1', '3216549781', '1234567891', '1324567891231', '2021-02-16', '4 Tahun1');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `username`, `email`, `password`) VALUES
(1, 'Risda Roosyantie', 'risdaroosy', 'risdaroosy@gmail.com', '$2y$10$axYi/7CseJV/6R1D0Ue/ruf3IoAPnhVxB/xs1NpTXG2a/nTpIw5EO');

-- --------------------------------------------------------

--
-- Table structure for table `struk`
--

CREATE TABLE `struk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `norekening` varchar(255) NOT NULL,
  `pinjaman` varchar(255) NOT NULL,
  `jangkawaktu` varchar(255) NOT NULL,
  `tgljatuhtempo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `struk`
--

INSERT INTO `struk` (`id`, `nama`, `alamat`, `norekening`, `pinjaman`, `jangkawaktu`, `tgljatuhtempo`) VALUES
(1, 'sadfsadfsadf', 'sdfsdfsdfsdfsfd', '2343243242', '124214241', 'asdfasdsada', '2021-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `tandaterimaagunan`
--

CREATE TABLE `tandaterimaagunan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `keterangansurat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tandaterimaagunan`
--

INSERT INTO `tandaterimaagunan` (`id`, `nama`, `nohp`, `alamat`, `images`, `keterangansurat`) VALUES
(4, 'Risda Roosyantie', '082256964453', 'Banjarmasin', '1375614878_Diagram Konteks.png', 'Surat Menikah'),
(5, 'Dian Rahmadani', '0822316855423', 'Banjarmasin', '857-Rancangan Antarmuka.png', 'Surat Kawin'),
(7, 'testing', '1234567890', 'testing', '831-Antarmuka Tables.png', 'testing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nasabahlunas`
--
ALTER TABLE `nasabahlunas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nasabahmenunggak`
--
ALTER TABLE `nasabahmenunggak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjamperbulan`
--
ALTER TABLE `peminjamperbulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `struk`
--
ALTER TABLE `struk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tandaterimaagunan`
--
ALTER TABLE `tandaterimaagunan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nasabahlunas`
--
ALTER TABLE `nasabahlunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nasabahmenunggak`
--
ALTER TABLE `nasabahmenunggak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjamperbulan`
--
ALTER TABLE `peminjamperbulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `struk`
--
ALTER TABLE `struk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tandaterimaagunan`
--
ALTER TABLE `tandaterimaagunan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
