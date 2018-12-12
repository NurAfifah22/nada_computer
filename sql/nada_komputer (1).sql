-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Des 2018 pada 16.27
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
  `Nama_Barang` varchar(50) NOT NULL,
  `Harga_Jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID_Barang`, `Nama_Barang`, `Harga_Jual`) VALUES
(1, 'Ganti keyboard ', 250000),
(2, 'Ganti ram 2 gb', 250000),
(3, 'Ganti ram 4gb', 425000),
(4, 'Ganti layar led 14" tebal', 800000),
(5, 'ganti layar led 14" slim pin 40', 900000),
(6, 'ganti layar led slim pin 30', 950000),
(7, 'mati total kerusakan sedang  (no chip)', 500000),
(8, 'mati total kerusakan berat (ganti chip)', 800000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `ID_jual` int(11) UNSIGNED NOT NULL,
  `ID_Servis` int(11) UNSIGNED NOT NULL,
  `Tanggal_Jual` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_Barang` int(11) UNSIGNED NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Harga_Total` int(11) NOT NULL,
  `id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`ID_jual`, `ID_Servis`, `Tanggal_Jual`, `ID_Barang`, `Jumlah`, `Harga_Total`, `id`) VALUES
(1, 1, '2018-11-29 22:57:09', 1, 1, 50000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penservisan`
--

CREATE TABLE `penservisan` (
  `ID_Servis` int(11) UNSIGNED NOT NULL,
  `Tanggal_Servis` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Unit` varchar(20) NOT NULL,
  `SNID` varchar(25) NOT NULL,
  `Keluhan` varchar(100) NOT NULL,
  `Kelengkapan` varchar(50) NOT NULL,
  `ID_Barang` int(11) UNSIGNED NOT NULL,
  `id` int(11) UNSIGNED NOT NULL,
  `Tanggal_Selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penservisan`
--

INSERT INTO `penservisan` (`ID_Servis`, `Tanggal_Servis`, `Unit`, `SNID`, `Keluhan`, `Kelengkapan`, `ID_Barang`, `id`, `Tanggal_Selesai`) VALUES
(1, '2018-11-29 22:49:31', 'Laptop Asus ROG', '12345ab', 'LCD Rusak', 'Charger, Unit', 1, 1, '2018-12-07'),
(2, '2018-11-29 22:49:31', 'Acer', '12345bc', 'Keyboard rusak', 'Charger, Unit', 1, 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `role` enum('teknisi','admin','marketing','pemilik') NOT NULL DEFAULT 'teknisi',
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `No_hp` varchar(13) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `role`, `username`, `password`, `full_name`, `No_hp`, `Alamat`) VALUES
(1, 'marketing', 'ifan', '$2y$10$2iZxy9Ge087/y7XwNnb/7uf8NcHUtMsarO6lqprls6dCGngj/3qlm', 'Ifan Budi Kurniawan', '081249109170', 'Balung Kulon, Kecamatan Balung'),
(5, 'pemilik', 'fajar', 'fajar', 'Fajar Supriyadi', '085232484419', 'Perumahan Kebonsari'),
(6, 'teknisi', NULL, NULL, 'Dwi Bayu Widodo', '085330468844', 'Perum Bumirejo Permai, Sukodono, Lumajang');

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
  ADD KEY `ID_barang` (`ID_Barang`),
  ADD KEY `id` (`id`),
  ADD KEY `ID_Servis` (`ID_Servis`);

--
-- Indexes for table `penservisan`
--
ALTER TABLE `penservisan`
  ADD PRIMARY KEY (`ID_Servis`),
  ADD KEY `id` (`id`),
  ADD KEY `ID_Barang` (`ID_Barang`);

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
  MODIFY `ID_Barang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `ID_jual` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penservisan`
--
ALTER TABLE `penservisan`
  MODIFY `ID_Servis` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`ID_Barang`) REFERENCES `barang` (`ID_Barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `penjualan_ibfk_3` FOREIGN KEY (`ID_Servis`) REFERENCES `penservisan` (`ID_Servis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `penjualan_ibfk_4` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `penservisan`
--
ALTER TABLE `penservisan`
  ADD CONSTRAINT `penservisan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `penservisan_ibfk_2` FOREIGN KEY (`ID_Barang`) REFERENCES `barang` (`ID_Barang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
