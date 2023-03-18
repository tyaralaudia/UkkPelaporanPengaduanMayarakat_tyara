-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2023 at 03:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengaduan_masyarakat`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`'root' `@` 'localhost'` PROCEDURE `deletemasyarakat` (IN `nik_masy` VARCHAR(10))  DELETE from masyarakat WHERE nik = nik_masy$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletetanggapan` (IN `id_tang` CHAR(10))  DELETE from tanggapan WHERE id_tanggapan = id_tang$$

CREATE DEFINER=`'root' `@` 'localhost'` PROCEDURE `insertmasyarakat` (IN `nik_masyarakat` CHAR(16), IN `nama_masyarakat` VARCHAR(36), IN `username` VARCHAR(25), IN `password` VARCHAR(25), IN `telp_masyarakat` CHAR(13))  INSERT INTO masyarakat (NIK, nama, username, password, telp) VALUES (nik_masyarakat, nama_masyarakat, username, password, telp_masyarakat)$$

CREATE DEFINER=`'root' `@` 'localhost'` PROCEDURE `selectmasyarakat` ()  BEGIN
SELECT NIK, nama FROM masyarakat;
END$$

CREATE DEFINER=`'root' `@` 'localhost'` PROCEDURE `updatemasyarakat` (IN `nik_masy` CHAR(10), IN `username_masy` VARCHAR(20))  update masyarakat SET username = username_masy WHERE nik = nik_masy$$

CREATE DEFINER=`'root' `@` 'localhost'` PROCEDURE `updatepengaduan` (IN `id_peng` CHAR(16), IN `tgl_peng` DATE)  update pengaduan SET tgl_pengaduan = tgl_peng WHERE id_pengaduan = id_peng$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_pengaduan`
-- (See below for the actual view)
--
CREATE TABLE `data_pengaduan` (
`nik` char(16)
,`nama` varchar(35)
,`tgl_pengaduan` datetime
,`isi_laporan` text
);

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('202110065001', 'Tyara Laudia', 'tyara', '202cb962ac59075b964b07152d234b70', '083824471828'),
('202110065002', 'Ara Cantikara', 'ara', '202cb962ac59075b964b07152d234b70', '089854376214'),
('202110065003', 'Putri Utama', 'putri', '4093fed663717c843bea100d17fb67c8', '085432765910'),
('202110065004', 'Raja Mahardika', 'raja', '81dc9bdb52d04dc20036dbd8313ed055', '087654321022'),
('202110065005', 'Nazra Farsyah', 'nazra', '97c6e036332015b73744ebcb3de68688', '081241765027'),
('202110065006', 'Jelsa Oktavia', 'jelsa', '202cb962ac59075b964b07152d234b70', '087654298711'),
('202110065007', 'Steven Alvero', 'steven', '202cb962ac59075b964b07152d234b70', '085643210944'),
('202110065008', 'Aurel Oktavia', 'aurel', '289dff07669d7a23de0ef88d2f7129e7', '081675123984'),
('202110065009', 'Aca ', 'aca', '2671eb6e9150cf9b53eb39752a1fb21c', '087546329810'),
('202110065010', 'Devano Danendra', 'devano', '227edf7c86c02a44d17eec9aa5b30cd1', '085435612987');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` datetime NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`, `updated_at`) VALUES
(69, '2023-03-14 18:35:02', '202110065001', 'Pipa air saya bocor, saya butuh bantuan', '1678793734_a5a5786d71cba5a2c1f5.jpg', 'selesai', '2023-03-17 15:24:58'),
(73, '2023-03-14 18:40:37', '202110065001', 'Longsor di kuningan menyebabkan 2 orang tewas, mohon bantuannyaa', '1678794037_af54ed4bef911c37cb34.jpeg', '0', '2023-03-14 18:40:37'),
(75, '2023-03-14 18:46:17', '202110065001', 'Hewan ini terjebak di pemukiman warga', '1678794377_d6ebde10021a1cd7a22a.jpg', '0', '2023-03-14 18:46:17'),
(76, '2023-03-16 10:09:01', '202110065002', 'tolongg', '1678936141_433f98dfcb5dacda6550.jpg', 'selesai', '2023-03-17 20:57:07'),
(77, '2023-03-16 10:09:33', '202110065002', 'bantu saya', '1678936173_5fd2826fed237b3b6c58.jpeg', 'selesai', '2023-03-17 19:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(10, 'Ilham Joe', 'ilham', 'd41d8cd98f00b204e9800998ecf8427e', '089347683099', 'petugas'),
(111, 'Petugas', 'petugas', '81dc9bdb52d04dc20036dbd8313ed055', '08367542910', 'petugas'),
(222, 'Aditiya Eka Pratama', 'adit', '486b6c6b267bc61677367eb6b6458764', '087543278943', 'petugas'),
(333, 'Ayu Muhafilah', 'ayu', '81dc9bdb52d04dc20036dbd8313ed055', '089547821033', 'petugas'),
(444, 'Karin Aulia', 'karin', '87c2bb2e46e63ecc018b7bb6eb2f5057', '083487113029', 'petugas'),
(555, 'Rika', 'rika', '25d55ad283aa400af464c76d713c07ad', '081435998320', 'petugas'),
(666, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', '088543287654', 'admin'),
(888, 'Fahmi', 'fahmi', '202cb962ac59075b964b07152d234b70', '087732879334', 'petugas'),
(999, 'Nisa Amanda', 'nisa', 'c1aae165bc91698aa6f7fe3a36fb8bd2', '086453210987', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`, `updated_at`) VALUES
(33, 69, '2023-03-17', 'baik, akan saya perbaiki', 666, '2023-03-17 15:24:58'),
(35, 77, '2023-03-17', 'baikk', 666, '2023-03-17 19:06:35'),
(39, 76, '2023-03-17', 'njjjj', 666, '2023-03-17 20:57:08');

-- --------------------------------------------------------

--
-- Structure for view `data_pengaduan`
--
DROP TABLE IF EXISTS `data_pengaduan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_pengaduan`  AS   (select `masyarakat`.`nik` AS `nik`,`masyarakat`.`nama` AS `nama`,`pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`,`pengaduan`.`isi_laporan` AS `isi_laporan` from (`masyarakat` join `pengaduan`) where `masyarakat`.`nik` = `pengaduan`.`nik`)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6666572;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
