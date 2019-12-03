-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2019 pada 06.07
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naura_farm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jual`
--

CREATE TABLE `detail_jual` (
  `ID_DETAIL` int(5) NOT NULL,
  `ID_TRANSAKSI` int(5) NOT NULL,
  `ID_PRODUK` int(5) NOT NULL,
  `JUMLAH_BELI` int(3) NOT NULL,
  `SUB_TOTAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `ID_PRODUK` varchar(3) NOT NULL,
  `NAMA_PRODUK` varchar(30) DEFAULT NULL,
  `STOK_PRODUK` int(11) DEFAULT NULL,
  `HARGA_BELI` int(11) NOT NULL,
  `HARGA_JUAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` varchar(5) NOT NULL,
  `ID_USER` int(5) NOT NULL,
  `TANGGAL_TRANSAKSI` datetime DEFAULT NULL,
  `STATUS_BAYAR` int(3) DEFAULT NULL COMMENT '1. Sudah Bayar, 2. Belum Bayar',
  `GRAND_TOTAL` int(11) DEFAULT NULL,
  `ALAMAT_PENGIRIMAN` varchar(100) DEFAULT NULL,
  `OPSI_PEMBAYARAN` int(1) NOT NULL COMMENT '1. Transfer, 2. Cash',
  `TUJUAN_PEMBAYARAN` varchar(50) NOT NULL COMMENT 'Aun bank dll'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_USER` int(5) NOT NULL,
  `ID_STATUS` int(2) NOT NULL DEFAULT '2',
  `NAMA` varchar(100) DEFAULT NULL,
  `NOMOR_TELEPON` varchar(13) DEFAULT NULL,
  `ALAMAT` varchar(150) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `LEVEL` int(3) NOT NULL COMMENT '1. Admin, 2. Karyawan, 3. User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `ID_STATUS`, `NAMA`, `NOMOR_TELEPON`, `ALAMAT`, `EMAIL`, `USERNAME`, `PASSWORD`, `LEVEL`) VALUES
(5, 1, 'yudha', '123456789012', 'Patrang', 'yudhamahendra@gmail.com', 'yudha', 'mahendrayudha', 0),
(6, 1, 'andrea', '098765432123', 'mastrip', 'andrea.santana986@gmail.com', 'andre', 'qwerty123', 0),
(7, 2, 'dicky', '1234555554321', 'tidar', 'dicky@gmail.com', 'dicky', '1234', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD PRIMARY KEY (`ID_DETAIL`),
  ADD UNIQUE KEY `ID_TRANSAKSI` (`ID_TRANSAKSI`),
  ADD UNIQUE KEY `ID_PRODUK` (`ID_PRODUK`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ID_PRODUK`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`),
  ADD KEY `ID_STATUS` (`ID_STATUS`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_jual`
--
ALTER TABLE `detail_jual`
  MODIFY `ID_DETAIL` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
