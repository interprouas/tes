-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2015 at 12:26 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laboratory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `ID_BARANG` int(11) NOT NULL,
  `NAMA_BARANG` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `NAMA_BARANG`) VALUES
(1, 'KabelVGA'),
(2, 'PC'),
(3, 'LCD'),
(4, 'Speaker'),
(5, 'KabelRol');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE IF NOT EXISTS `inventaris` (
  `ID_INVENTARIS` char(20) NOT NULL,
  `ID_BARANG` int(11) DEFAULT NULL,
  `NIP_PETUGAS` int(11) DEFAULT NULL,
  `POSISI_BARANG` char(20) DEFAULT NULL,
  `KET_BARANG` char(20) DEFAULT NULL,
  `STOCK` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`ID_INVENTARIS`, `ID_BARANG`, `NIP_PETUGAS`, `POSISI_BARANG`, `KET_BARANG`, `STOCK`) VALUES
('1', 1, 1, 'LAB', 'ADA', '2'),
('2', 2, 2, 'Dipinjam', 'ADA', '4'),
('3', 3, 3, 'Dipinjam', 'TidakAda', '1'),
('4', 4, 4, 'LAB', 'ADA', '3'),
('5', 5, 5, 'LAB', 'ADA', '2');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `ID_JADWAL` int(11) NOT NULL,
  `MATKUL` char(20) DEFAULT NULL,
  `JAM_PINJAM` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`ID_JADWAL`, `MATKUL`, `JAM_PINJAM`) VALUES
(1, 'Interpro', '1-2'),
(2, 'Pemvis', '3-4'),
(3, 'Jarkom', '5-6'),
(4, 'RPL', '1-2'),
(5, 'Simbada', '5-6');

-- --------------------------------------------------------

--
-- Stand-in structure for view `kapasitaslabuntukmahasiswa`
--
CREATE TABLE IF NOT EXISTS `kapasitaslabuntukmahasiswa` (
`NAMA_LAB` char(20)
,`KAPASITAS` char(20)
);
-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE IF NOT EXISTS `laboratorium` (
  `ID_LAB` int(11) NOT NULL,
  `NAMA_LAB` char(20) DEFAULT NULL,
  `KAPASITAS` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`ID_LAB`, `NAMA_LAB`, `KAPASITAS`) VALUES
(1, 'Multimedia', '25'),
(2, 'Jaringan', '25'),
(3, 'RPL', '15'),
(4, 'Teknik', '20'),
(5, 'Desain', '30');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `NIM_MAHASISWA` int(11) NOT NULL,
  `NAMA_MAHASISWA` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM_MAHASISWA`, `NAMA_MAHASISWA`) VALUES
(135623001, 'Jaza'),
(135623002, 'Alan'),
(135623003, 'Dimas'),
(135623004, 'Adit'),
(135623005, 'Andi');

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE IF NOT EXISTS `peminjam` (
  `TANGGAL_MEMINJAM` date DEFAULT NULL,
  `TANGGAL_KEMBALI` date DEFAULT NULL,
  `ID_PEMINJAMAN` char(20) NOT NULL,
  `ID_LAB` int(11) DEFAULT NULL,
  `ID_JADWAL` int(11) DEFAULT NULL,
  `ID_BARANG` int(11) DEFAULT NULL,
  `NIM_MAHASISWA` int(11) DEFAULT NULL,
  `NIP_PETUGAS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`TANGGAL_MEMINJAM`, `TANGGAL_KEMBALI`, `ID_PEMINJAMAN`, `ID_LAB`, `ID_JADWAL`, `ID_BARANG`, `NIM_MAHASISWA`, `NIP_PETUGAS`) VALUES
('2015-05-01', '2015-06-06', '1', 1, 1, 1, 135623001, 1),
('2015-05-05', '2015-06-07', '2', 2, 2, 2, 135623002, 2),
('2015-05-10', '2015-06-11', '3', 3, 3, 3, 135623003, 3),
('2015-05-15', '2015-06-16', '4', 4, 4, 4, 135623004, 4),
('2015-05-20', NULL, '5', 5, 5, 5, 135623005, 5);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `NIP_PETUGAS` int(11) NOT NULL,
  `NAMA_PETUGAS` char(20) DEFAULT NULL,
  `TLPN_PETUGAS` char(20) DEFAULT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`NIP_PETUGAS`, `NAMA_PETUGAS`, `TLPN_PETUGAS`, `PASSWORD`) VALUES
(1, 'Ruli', '0321999991', '1'),
(2, 'Yoga', '0321999992', '2'),
(3, 'Taufiq', '0321999993', '3'),
(4, 'Isnan', '0321999994', '4'),
(5, 'Mizan', '0321999995', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpeminjam`
--
CREATE TABLE IF NOT EXISTS `vpeminjam` (
`NIM_MAHASISWA` int(11)
,`NAMA_MAHASISWA` char(20)
,`NAMA_LAB` char(20)
,`NAMA_BARANG` char(20)
,`TANGGAL_MEMINJAM` date
,`TANGGAL_KEMBALI` date
);
-- --------------------------------------------------------

--
-- Structure for view `kapasitaslabuntukmahasiswa`
--
DROP TABLE IF EXISTS `kapasitaslabuntukmahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kapasitaslabuntukmahasiswa` AS select `laboratorium`.`NAMA_LAB` AS `NAMA_LAB`,`laboratorium`.`KAPASITAS` AS `KAPASITAS` from `laboratorium`;

-- --------------------------------------------------------

--
-- Structure for view `vpeminjam`
--
DROP TABLE IF EXISTS `vpeminjam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpeminjam` AS select `mahasiswa`.`NIM_MAHASISWA` AS `NIM_MAHASISWA`,`mahasiswa`.`NAMA_MAHASISWA` AS `NAMA_MAHASISWA`,`laboratorium`.`NAMA_LAB` AS `NAMA_LAB`,`barang`.`NAMA_BARANG` AS `NAMA_BARANG`,`peminjam`.`TANGGAL_MEMINJAM` AS `TANGGAL_MEMINJAM`,`peminjam`.`TANGGAL_KEMBALI` AS `TANGGAL_KEMBALI` from ((((`peminjam` join `mahasiswa` on((`peminjam`.`NIM_MAHASISWA` = `mahasiswa`.`NIM_MAHASISWA`))) join `laboratorium` on((`peminjam`.`ID_LAB` = `laboratorium`.`ID_LAB`))) join `jadwal` on((`peminjam`.`ID_JADWAL` = `jadwal`.`ID_JADWAL`))) join `barang` on((`peminjam`.`ID_BARANG` = `barang`.`ID_BARANG`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`ID_BARANG`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
 ADD PRIMARY KEY (`ID_INVENTARIS`), ADD KEY `FK_RELATIONSHIP_2` (`ID_BARANG`), ADD KEY `FK_RELATIONSHIP_5` (`NIP_PETUGAS`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
 ADD PRIMARY KEY (`ID_JADWAL`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
 ADD PRIMARY KEY (`ID_LAB`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`NIM_MAHASISWA`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
 ADD PRIMARY KEY (`ID_PEMINJAMAN`), ADD KEY `FK_RELATIONSHIP_3` (`ID_BARANG`), ADD KEY `FK_RELATIONSHIP_4` (`ID_LAB`), ADD KEY `FK_RELATIONSHIP_6` (`NIM_MAHASISWA`), ADD KEY `FK_RELATIONSHIP_7` (`NIP_PETUGAS`), ADD KEY `FK_RELATIONSHIP_8` (`ID_JADWAL`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
 ADD PRIMARY KEY (`NIP_PETUGAS`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`),
ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`NIP_PETUGAS`) REFERENCES `petugas` (`NIP_PETUGAS`);

--
-- Constraints for table `peminjam`
--
ALTER TABLE `peminjam`
ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`),
ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_LAB`) REFERENCES `laboratorium` (`ID_LAB`),
ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`NIM_MAHASISWA`) REFERENCES `mahasiswa` (`NIM_MAHASISWA`),
ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`NIP_PETUGAS`) REFERENCES `petugas` (`NIP_PETUGAS`),
ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_JADWAL`) REFERENCES `jadwal` (`ID_JADWAL`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
