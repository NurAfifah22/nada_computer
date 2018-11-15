-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Nov 2018 pada 06.17
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nada_komputer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `ID_Barang` int(11) UNSIGNED NOT NULL,
  `Nama_Barang` varchar(30) NOT NULL,
  `Kategori` varchar(20) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Harga_Beli` int(11) NOT NULL,
  `Harga_Jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID_Barang`, `Nama_Barang`, `Kategori`, `Stok`, `Harga_Beli`, `Harga_Jual`) VALUES
(1, 'abc', 'barang', 12, 1000, 1500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `ID_jual` int(11) UNSIGNED NOT NULL,
  `ID_Servis` int(11) UNSIGNED NOT NULL,
  `Tanggal_Jual` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_Barang` int(11) UNSIGNED NOT NULL,
  `Harga_Satuan` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Harga_Total` int(11) NOT NULL,
  `id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`ID_jual`, `ID_Servis`, `Tanggal_Jual`, `ID_Barang`, `Harga_Satuan`, `Jumlah`, `Harga_Total`, `id`) VALUES
(1, 1, '2018-11-15 11:39:18', 1, 10000, 2, 20000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penservisan`
--

CREATE TABLE `penservisan` (
  `ID_Servis` int(11) UNSIGNED NOT NULL,
  `Tanggal_Servis` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Unit` varchar(20) NOT NULL,
  `Keluhan` text NOT NULL,
  `Kelengkapan` varchar(50) NOT NULL,
  `Status` enum('Dalam Antrian','Pengerjaan','Selesai') NOT NULL DEFAULT 'Dalam Antrian',
  `Waktu_Servis` int(11) NOT NULL,
  `Tanggal_Selesai` date NOT NULL,
  `id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penservisan`
--

INSERT INTO `penservisan` (`ID_Servis`, `Tanggal_Servis`, `Unit`, `Keluhan`, `Kelengkapan`, `Status`, `Waktu_Servis`, `Tanggal_Selesai`, `id`) VALUES
(1, '2018-11-14 15:16:22', 'laptop Asus', 'Mati total', 'unit, charger', 'Dalam Antrian', 14, '2018-11-28', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `role` enum('admin','staff','pemilik') NOT NULL DEFAULT 'staff',
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `No_hp` varchar(13) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `role`, `username`, `password`, `full_name`, `No_hp`, `Alamat`, `active`) VALUES
(1, 'admin', 'admin', '$2y$10$5Ckk.kPJyZeJ368XvIfLC.Sns4MqOueMOASIqk0oGZB9zlQgIi34S', 'Administrator', '089332145654', 'Sumbersari Jember\r\n', 1),
(2, 'staff', 'staff', '$2y$10$uvx0ySA7s2GZDsKcrlv40.Wev5q9xkjVg.pirwZOH9n2K4lPrIOvC', 'Staff', '085233654345', 'Patrang, Jember\r\n', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_Barang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`ID_jual`),
  ADD UNIQUE KEY `ID_Servis` (`ID_Servis`),
  ADD KEY `ID_barang` (`ID_Barang`),
  ADD KEY `ID_Servis_2` (`ID_Servis`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `penservisan`
--
ALTER TABLE `penservisan`
  ADD PRIMARY KEY (`ID_Servis`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_Barang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `ID_jual` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penservisan`
--
ALTER TABLE `penservisan`
  MODIFY `ID_Servis` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`ID_Servis`) REFERENCES `penservisan` (`ID_Servis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`ID_Barang`) REFERENCES `barang` (`ID_Barang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `penservisan`
--
ALTER TABLE `penservisan`
  ADD CONSTRAINT `penservisan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
