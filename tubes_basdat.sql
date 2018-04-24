-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2018 at 11:11 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_basdat`
--

-- --------------------------------------------------------

--
-- Table structure for table `asprak`
--

CREATE TABLE `asprak` (
  `nim` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `prodi` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_praktikum`
--

CREATE TABLE `jadwal_praktikum` (
  `id` int(4) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_awal` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `kd_ruangan` varchar(4) NOT NULL,
  `kd_matkul` varchar(6) NOT NULL,
  `nim` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laboran`
--

CREATE TABLE `laboran` (
  `nip` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboran`
--

INSERT INTO `laboran` (`nip`, `nama`, `alamat`, `no_hp`, `username`, `password`) VALUES
(997102, 'Ari', 'Puri Kencana No.50', '0855779911732', 'ari', 'fc292bd7df071858c2d0f955545673c1'),
(997103, 'Bambang', 'Puri Cendana No.23', '085111111111', 'bambang', 'a9711cbb2e3c2d5fc97a63e45bbe5076');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `kd_matkul` varchar(6) NOT NULL,
  `nama_matkul` varchar(25) NOT NULL,
  `dosen_pengampu` varchar(30) NOT NULL,
  `sks` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `kd_ruangan` varchar(4) NOT NULL,
  `nama_ruangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asprak`
--
ALTER TABLE `asprak`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `jadwal_praktikum`
--
ALTER TABLE `jadwal_praktikum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_ruangan` (`kd_ruangan`),
  ADD KEY `kd_matkul` (`kd_matkul`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `laboran`
--
ALTER TABLE `laboran`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kd_matkul`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`kd_ruangan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_praktikum`
--
ALTER TABLE `jadwal_praktikum`
  ADD CONSTRAINT `jadwal_praktikum_ibfk_1` FOREIGN KEY (`kd_ruangan`) REFERENCES `ruangan` (`kd_ruangan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_praktikum_ibfk_2` FOREIGN KEY (`kd_matkul`) REFERENCES `matkul` (`kd_matkul`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_praktikum_ibfk_3` FOREIGN KEY (`nim`) REFERENCES `asprak` (`nim`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
