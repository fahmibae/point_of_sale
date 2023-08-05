-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 09:51 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kasir_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kode_barang` varchar(8) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `harga_beli` double NOT NULL,
  `tahun_kadaluarsa` date NOT NULL,
  `keuntungan` double NOT NULL,
  `potongan_harga` double NOT NULL,
  `harga_jual` double NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `kategori`, `nama_barang`, `keterangan`, `harga_beli`, `tahun_kadaluarsa`, `keuntungan`, `potongan_harga`, `harga_jual`, `stok`) VALUES
('BRG00001', 'Sabun Cuci Baju', 'Rinso Cair 250ml', 'PCS', 15000, '2019-10-31', 2000, 1000, 16000, 1000),
('BRG00002', 'Sabun Cuci Baju', 'Daia 250ml', 'PCS', 13000, '2019-09-29', 2000, 1000, 14000, 997),
('BRG00003', 'Sabun Cuci Muka', 'Ponds Men 230ml', 'Botol', 25000, '2019-10-26', 1500, 1000, 25500, 999),
('BRG00004', 'Sabun Cuci Tangan', 'Lifebouy Handwash 230ml', 'botol', 12500, '2019-10-24', 1500, 1000, 13000, 0),
('BRG00005', 'Permen', 'Kopiko White Coffie', 'Bungkus', 15000, '2019-10-22', 1200, 1000, 15200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `d_pembelian`
--

CREATE TABLE IF NOT EXISTS `d_pembelian` (
`id_pembelian` int(11) NOT NULL,
  `faktur_pembelian` varchar(100) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `harga_beli` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `id_pembelian_detail` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_pembelian`
--

INSERT INTO `d_pembelian` (`id_pembelian`, `faktur_pembelian`, `kode_barang`, `harga_beli`, `jumlah`, `total`, `id_pembelian_detail`) VALUES
(36, 'PB-20190230001', 'BRG00001', 15000, 1000, 15000000, 5),
(37, 'PB-20190230001', 'BRG00002', 13000, 1000, 13000000, 6),
(39, 'PB-20190230002', 'BRG00001', 15000, 2, 30000, 7),
(40, 'PB-20190230003', 'BRG00003', 25000, 1000, 25000000, 8);

--
-- Triggers `d_pembelian`
--
DELIMITER //
CREATE TRIGGER `beli` AFTER INSERT ON `d_pembelian`
 FOR EACH ROW BEGIN
UPDATE barang
SET stok = stok + NEW.jumlah
WHERE 
kode_barang = NEW.kode_barang;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `d_penjualan`
--

CREATE TABLE IF NOT EXISTS `d_penjualan` (
`id_penjualan` int(11) NOT NULL,
  `faktur_penjualan` varchar(100) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `harga_jual` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` double NOT NULL,
  `id_penjualan_detail` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_penjualan`
--

INSERT INTO `d_penjualan` (`id_penjualan`, `faktur_penjualan`, `kode_barang`, `harga_jual`, `jumlah`, `total`, `id_penjualan_detail`) VALUES
(14, 'PJ-20190230001', 'BRG00001', 16000, 2, 32000, 1),
(15, 'PJ-20190230001', 'BRG00002', 14000, 1, 14000, 2),
(16, 'PJ-20190230001', 'BRG00003', 25500, 1, 25500, 3),
(17, 'PJ-201902300002', 'BRG00002', 14000, 2, 28000, 4);

--
-- Triggers `d_penjualan`
--
DELIMITER //
CREATE TRIGGER `jual` AFTER INSERT ON `d_penjualan`
 FOR EACH ROW BEGIN
UPDATE barang
SET stok = stok - NEW.jumlah
WHERE 
kode_barang = NEW.kode_barang;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hutang_detail`
--

CREATE TABLE IF NOT EXISTS `hutang_detail` (
`id_hutang_detail` int(11) NOT NULL,
  `id_hutang` int(11) NOT NULL,
  `faktur_pembelian` varchar(100) NOT NULL,
  `nota_order` varchar(100) NOT NULL,
  `nomor_transfer` varchar(100) NOT NULL,
  `tanggal_pencatatan` date NOT NULL,
  `cicilan` int(11) NOT NULL,
  `jumlah_cicilan` double NOT NULL,
  `sisa_hutang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hutang_pembelian`
--

CREATE TABLE IF NOT EXISTS `hutang_pembelian` (
`id_hutang` int(11) NOT NULL,
  `faktur_pembelian` varchar(100) NOT NULL,
  `nota_order` varchar(100) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `kode_supplier` varchar(6) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `tanggal_jatuh_tempo` date NOT NULL,
  `jumlah_hutang` double NOT NULL,
  `sisa_hutang` double NOT NULL,
  `keterangan_hutang` enum('Lunas','Belum Lunas') NOT NULL DEFAULT 'Belum Lunas'
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hutang_pembelian`
--

INSERT INTO `hutang_pembelian` (`id_hutang`, `faktur_pembelian`, `nota_order`, `tanggal_pembelian`, `kode_supplier`, `id_user`, `tanggal_jatuh_tempo`, `jumlah_hutang`, `sisa_hutang`, `keterangan_hutang`) VALUES
(42, 'PB-20190230001', '12003888465352', '2019-10-23', 'SP0002', 'adm', '2019-10-23', 28000000, 28000000, 'Belum Lunas'),
(43, 'PB-20190230002', '783783783445', '2019-10-23', 'SP0001', 'adm', '2019-10-23', 30000, 30000, 'Belum Lunas'),
(44, 'PB-20190230003', '35546655554732', '2019-10-23', 'SP0003', 'adm', '2019-10-23', 25000000, 25000000, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `faktur_pembelian` varchar(100) NOT NULL,
  `nota_order` varchar(100) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `kode_supplier` varchar(6) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `tanggal_jatuh_tempo` date NOT NULL,
  `total_muatan` int(11) NOT NULL,
  `total_pembelian` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`faktur_pembelian`, `nota_order`, `tanggal_pembelian`, `kode_supplier`, `id_user`, `tanggal_jatuh_tempo`, `total_muatan`, `total_pembelian`) VALUES
('PB-20190230001', '12003888465352', '2019-10-23', 'SP0002', 'adm', '2019-10-23', 2000, 28000000),
('PB-20190230002', '783783783445', '2019-10-23', 'SP0001', 'adm', '2019-10-23', 2, 30000),
('PB-20190230003', '35546655554732', '2019-10-23', 'SP0003', 'adm', '2019-10-23', 1000, 25000000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE IF NOT EXISTS `pembelian_detail` (
`id_pembelian_detail` int(11) NOT NULL,
  `faktur_pembelian` varchar(100) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `harga_beli` double NOT NULL,
  `item` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `id_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
`id_pemesanan` int(11) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `harga_beli` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `kode_barang`, `nama_barang`, `keterangan`, `harga_beli`) VALUES
(64, 'BRG00003', 'Ponds Men 230ml', 'Botol', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `faktur_penjualan` varchar(100) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `pelanggan` varchar(100) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `total_penjualan` double NOT NULL,
  `total_muatan` int(11) NOT NULL,
  `uang_pembayaran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`faktur_penjualan`, `tanggal_penjualan`, `pelanggan`, `id_user`, `total_penjualan`, `total_muatan`, `uang_pembayaran`) VALUES
('PJ-201902300002', '2019-10-23', 'riska', 'ksr01', 28000, 2, 28000),
('PJ-20190230001', '2019-10-23', 'Bayu', 'adm', 71500, 4, 72000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE IF NOT EXISTS `penjualan_detail` (
`id_penjualan_detail` int(11) NOT NULL,
  `faktur_penjualan` varchar(100) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `harga_jual` double NOT NULL,
  `item` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_penjualan_detail`, `faktur_penjualan`, `kode_barang`, `nama_barang`, `keterangan`, `harga_jual`, `item`, `subtotal`) VALUES
(1, 'PJ-20190270002', 'BRG00001', 'Rinso Cair 250ml', 'PCS', 16000, 1, 16000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `kode_supplier` varchar(6) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `alamat`, `telepon`) VALUES
('SP0001', 'firman', 'awn                              ', '08923411234'),
('SP0002', 'Jumadi', 'brebes          ', '082113234678'),
('SP0003', 'Samsul', 'Cirebon          ', '0892235421552'),
('SP0004', 'dadang', 'awn          ', '098332321443');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(10) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_pengguna`, `username`, `password`, `level`) VALUES
('adm', 'fahmi', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('gdg01', 'gudang', 'gudang', '202446dd1d6028084426867365b0c7a1', 'gudang'),
('ksr01', 'kasir1', 'kasir1', '29c748d4d8f4bd5cbc0f3f60cb7ed3d0', 'kasir'),
('ksr02', 'kasir2', 'kasir2', '8c86013d8ba23d9b5ade4d6463f81c45', 'kasir'),
('ksr03', 'kasir3', 'kasir3', '8e757e8a93a1318a78985a0f1ddcd062', 'kasir'),
('ksr04', 'kasir4', 'kasir4', '2fed33c088a7ad3bf24044b2f039c028', 'kasir'),
('ksr05', 'kasir5', 'kasir5', '1bbfd6470567433f11e25839e16c0bb5', 'kasir'),
('ksr06', 'suti', 'kasir6', '2fcb8e519aee16a76f712f42cf31bd8a', 'kasir'),
('ksr07', 'sanjaya', 'sanjaya', 'd9dba78b00e9b6a5bd72d66b9321b63f', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `d_pembelian`
--
ALTER TABLE `d_pembelian`
 ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `d_penjualan`
--
ALTER TABLE `d_penjualan`
 ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `hutang_detail`
--
ALTER TABLE `hutang_detail`
 ADD PRIMARY KEY (`id_hutang_detail`);

--
-- Indexes for table `hutang_pembelian`
--
ALTER TABLE `hutang_pembelian`
 ADD PRIMARY KEY (`id_hutang`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
 ADD PRIMARY KEY (`faktur_pembelian`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
 ADD PRIMARY KEY (`id_pembelian_detail`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
 ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
 ADD PRIMARY KEY (`faktur_penjualan`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
 ADD PRIMARY KEY (`id_penjualan_detail`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d_pembelian`
--
ALTER TABLE `d_pembelian`
MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `d_penjualan`
--
ALTER TABLE `d_penjualan`
MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `hutang_detail`
--
ALTER TABLE `hutang_detail`
MODIFY `id_hutang_detail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hutang_pembelian`
--
ALTER TABLE `hutang_pembelian`
MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
MODIFY `id_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
MODIFY `id_penjualan_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
