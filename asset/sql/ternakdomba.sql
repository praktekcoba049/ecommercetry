-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 03:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ternakdomba`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `ID_DOMBA` char(5) NOT NULL,
  `ID_PEMESANAN` char(5) NOT NULL,
  `JML_PESAN` decimal(5,0) NOT NULL,
  `HARGA_PER_DOMBA` decimal(12,0) NOT NULL,
  `BERAT_BELI` decimal(5,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `domba`
--

CREATE TABLE `domba` (
  `ID_DOMBA` char(5) NOT NULL,
  `ID_JENIS` char(5) NOT NULL,
  `JENIS_KELAMIN` tinyint(1) NOT NULL,
  `HARGA` decimal(12,0) NOT NULL,
  `BERAT` decimal(5,0) NOT NULL,
  `STATUS_DOMBA` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `domba`
--

INSERT INTO `domba` (`ID_DOMBA`, `ID_JENIS`, `JENIS_KELAMIN`, `HARGA`, `BERAT`, `STATUS_DOMBA`) VALUES
('DAG1', 'DAGRS', 0, '12000000', '24', '0'),
('DAG11', 'DAGRS', 0, '1200000', '29', '1'),
('DAG7', 'DAGRS', 1, '12400000', '24', '0'),
('DEG3', 'DEGES', 1, '9000000', '20', '0'),
('DFK13', 'DMSFK', 1, '14000000', '29', '0'),
('DFK6', 'DMSFK', 1, '12300000', '23', '0'),
('DRG10', 'DREGR', 0, '6700000', '15', '0'),
('DRG13', 'DREGR', 0, '5600000', '18', '0'),
('DRG8', 'DREGR', 0, '9000000', '21', '0'),
('DRG9', 'DREGR', 1, '12000000', '25', '0'),
('DRN5', 'DMRNO', 0, '7900000', '21', '0'),
('DTP12', 'DETPS', 1, '1200000', '12', '1'),
('DTP4', 'DETPS', 0, '8000000', '16', '0');

--
-- Triggers `domba`
--
DELIMITER $$
CREATE TRIGGER `before_insert_domba` BEFORE INSERT ON `domba` FOR EACH ROW BEGIN
	DECLARE IDDMB VARCHAR(10);
	DECLARE numer INT;
	select count(*) into numer from domba;
	
    
	IF (NEW.id_jenis='DAGRS') THEN
	SET NEW.id_domba=CONCAT('DAG',numer+1);
	     ELSEIF(NEW.id_jenis='DEGES') THEN
		SET NEW.id_domba=CONCAT('DEG',numer+1);
       		 ELSEIF(NEW.id_jenis='DETPS') THEN
			SET NEW.id_domba=CONCAT('DTP',numer+1);
       			 ELSEIF(NEW.id_jenis='DMRNO') THEN
				SET NEW.id_domba=CONCAT('DRN',numer+1);
       				 ELSEIF(NEW.id_jenis='DMSFK') THEN
					SET NEW.id_domba=CONCAT('DFK',numer+1);
        ELSE 
             	SET NEW.id_domba=CONCAT('DRG',numer+1);
        		SET NEW.id_jenis=('DREGR');
   
	END IF;
	END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `ID_JABATAN` char(5) NOT NULL,
  `NAMA_JABATAN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`ID_JABATAN`, `NAMA_JABATAN`) VALUES
('ADMIN', 'Administrasi'),
('CASHR', 'Kasir'),
('KYRWN', 'Karyawan'),
('MNGER', 'Manajer');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_domba`
--

CREATE TABLE `jenis_domba` (
  `ID_JENIS` char(5) NOT NULL,
  `JENIS_DOMBA` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_domba`
--

INSERT INTO `jenis_domba` (`ID_JENIS`, `JENIS_DOMBA`) VALUES
('DAGRS', 'Domba Garut Super'),
('DEGES', 'Domba Ekor Gemuk'),
('DETPS', 'Domba Ekor Tipis'),
('DMRNO', 'Domba Merino'),
('DMSFK', 'Domba Suffolk'),
('DREGR', 'Domba Reguler/Biasa');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `ID_KOTA` char(5) NOT NULL,
  `ID_PROV` char(5) DEFAULT NULL,
  `NAMA_KOTA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menjabat`
--

CREATE TABLE `menjabat` (
  `ID_PEGAWAI` char(5) NOT NULL,
  `ID_JABATAN` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `ID_PEGAWAI` char(5) NOT NULL,
  `NAMA_PEGAWAI` varchar(30) NOT NULL,
  `ALAMAT_PEGAWAI` varchar(30) NOT NULL,
  `KODEPOS_PEGAWAI` char(5) NOT NULL,
  `USERNAMEPEG` varchar(15) NOT NULL,
  `PASSWORDPEG` varchar(18) NOT NULL,
  `STATUS_PEGAWAI` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID_PELANGGAN` char(5) NOT NULL,
  `ID_PEMESANAN` char(5) NOT NULL,
  `ID_PEGAWAI` char(5) NOT NULL,
  `NAMA_PELANGGAN` varchar(30) NOT NULL,
  `TELP_PELANGGAN` varchar(13) NOT NULL,
  `ALAMAT_PELANGGAN` varchar(30) NOT NULL,
  `KODE_POS_PELANGGAN` char(5) NOT NULL,
  `STATUS_PELANGGAN` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_PEMBAYARAN` char(5) NOT NULL,
  `ID_PEGAWAI` char(5) NOT NULL,
  `ID_PEMESANAN` char(5) NOT NULL,
  `NO_RESI` char(15) NOT NULL,
  `TGL_PEMBAYARAN` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TOTAL_PEMBAYARAN` decimal(12,0) NOT NULL,
  `STATUS_PEMBAYARAN` varchar(50) NOT NULL,
  `NAMA_BANK` varchar(20) DEFAULT NULL,
  `ATAS_NAMA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID_PEMESANAN` char(5) NOT NULL,
  `ID_PEGAWAI` char(5) NOT NULL,
  `ID_KOTA` char(5) NOT NULL,
  `NAMA_PENERIMA` varchar(30) NOT NULL,
  `ALAMAT_PENERIMA` varchar(30) NOT NULL,
  `KODE_POS_PENERIMA` char(5) NOT NULL,
  `JASA_KURIR` varchar(15) NOT NULL,
  `LAYANAN_KURIR` varchar(50) NOT NULL,
  `TGL_PESAN` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `JENIS_BAYAR` varchar(50) NOT NULL,
  `ONGKOS_KIRIM` decimal(12,0) NOT NULL,
  `TOTAL_HARGA` decimal(12,0) NOT NULL,
  `STATUS_TRANSAKSI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `NO_RESI` char(15) NOT NULL,
  `ID_PEGAWAI` char(5) NOT NULL,
  `TGL_PENGIRIMAN` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `STATUS_PENGIRMAN` decimal(1,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `ID_PROV` char(5) NOT NULL,
  `NAMA_PROV` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`ID_DOMBA`,`ID_PEMESANAN`),
  ADD KEY `FK_TERDIRI2` (`ID_PEMESANAN`);

--
-- Indexes for table `domba`
--
ALTER TABLE `domba`
  ADD PRIMARY KEY (`ID_DOMBA`),
  ADD KEY `FK_TERDIRI` (`ID_JENIS`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_JABATAN`);

--
-- Indexes for table `jenis_domba`
--
ALTER TABLE `jenis_domba`
  ADD PRIMARY KEY (`ID_JENIS`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`ID_KOTA`),
  ADD KEY `FK_DIMILIKI` (`ID_PROV`);

--
-- Indexes for table `menjabat`
--
ALTER TABLE `menjabat`
  ADD PRIMARY KEY (`ID_PEGAWAI`,`ID_JABATAN`),
  ADD KEY `FK_MENJABAT2` (`ID_JABATAN`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`ID_PEGAWAI`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_PELANGGAN`),
  ADD KEY `FK_MELAKUKAN` (`ID_PEMESANAN`),
  ADD KEY `FK_MEMILIKI` (`ID_PEGAWAI`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_PEMBAYARAN`),
  ADD KEY `FK_MELAKUKAN2` (`ID_PEMESANAN`),
  ADD KEY `FK_MELAKUKAN3` (`NO_RESI`),
  ADD KEY `FK_MENANGANI2` (`ID_PEGAWAI`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`ID_PEMESANAN`),
  ADD KEY `FK_MEMILIKI2` (`ID_KOTA`),
  ADD KEY `FK_MENANGANI` (`ID_PEGAWAI`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`NO_RESI`),
  ADD KEY `FK_MENANGANI3` (`ID_PEGAWAI`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`ID_PROV`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `FK_TERDAPAT` FOREIGN KEY (`ID_DOMBA`) REFERENCES `domba` (`ID_DOMBA`),
  ADD CONSTRAINT `FK_TERDIRI2` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `pemesanan` (`ID_PEMESANAN`);

--
-- Constraints for table `domba`
--
ALTER TABLE `domba`
  ADD CONSTRAINT `FK_TERDIRI` FOREIGN KEY (`ID_JENIS`) REFERENCES `jenis_domba` (`ID_JENIS`);

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `FK_DIMILIKI` FOREIGN KEY (`ID_PROV`) REFERENCES `provinsi` (`ID_PROV`);

--
-- Constraints for table `menjabat`
--
ALTER TABLE `menjabat`
  ADD CONSTRAINT `FK_MENJABAT` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`),
  ADD CONSTRAINT `FK_MENJABAT2` FOREIGN KEY (`ID_JABATAN`) REFERENCES `jabatan` (`ID_JABATAN`);

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `pemesanan` (`ID_PEMESANAN`),
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `FK_MELAKUKAN2` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `pemesanan` (`ID_PEMESANAN`),
  ADD CONSTRAINT `FK_MELAKUKAN3` FOREIGN KEY (`NO_RESI`) REFERENCES `pengiriman` (`NO_RESI`),
  ADD CONSTRAINT `FK_MENANGANI2` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `FK_MEMILIKI2` FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`),
  ADD CONSTRAINT `FK_MENANGANI` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `FK_MENANGANI3` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
