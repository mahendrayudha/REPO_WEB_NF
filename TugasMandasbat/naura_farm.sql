-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2019 pada 02.38
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
-- Struktur dari tabel `opsi_pembayaran`
--

CREATE TABLE `opsi_pembayaran` (
  `ID_OPSI_PEMBAYARAN` varchar(3) NOT NULL,
  `PEMBAYARAN` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `opsi_pengiriman`
--

CREATE TABLE `opsi_pengiriman` (
  `ID_OPSI_PENGIRIMAN` varchar(3) NOT NULL,
  `PENGIRIMAN` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_buah`
--

CREATE TABLE `produk_buah` (
  `ID_PRODUK_BUAH` varchar(3) NOT NULL,
  `NAMA_PRODUK_BUAH` varchar(30) DEFAULT NULL,
  `STOK_PRODUK_BUAH` int(11) DEFAULT NULL,
  `HARGA_PRODUK_BUAH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_olahan`
--

CREATE TABLE `produk_olahan` (
  `ID_PRODUK_OLAHAN` varchar(3) NOT NULL,
  `NAMA_PRODUK_OLAHAN` varchar(30) DEFAULT NULL,
  `STOK_PRODUK_OLAHAN` int(11) DEFAULT NULL,
  `HARGA_PRODUK_OLAHAN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `ID_STATUS` int(2) NOT NULL,
  `STATUS` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`ID_STATUS`, `STATUS`) VALUES
(1, 'ADMIN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` varchar(5) NOT NULL,
  `ID_OPSI_PEMBAYARAN` varchar(3) DEFAULT NULL,
  `ID_OPSI_PENGIRIMAN` varchar(3) DEFAULT NULL,
  `ID_USER` varchar(5) DEFAULT NULL,
  `ID_PRODUK_BUAH` varchar(3) DEFAULT NULL,
  `ID_PRODUK_OLAHAN` varchar(3) DEFAULT NULL,
  `TANGGAL_TRANSAKSI` datetime DEFAULT NULL,
  `JUMLAH_PRODUK` int(11) DEFAULT NULL,
  `GRAND_TOTAL` int(11) DEFAULT NULL,
  `ALAMAT_PENGIRIMAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_USER` varchar(5) NOT NULL,
  `ID_STATUS` int(2) DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `NOMOR_TELEPON` varchar(13) DEFAULT NULL,
  `ALAMAT` varchar(150) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `ID_STATUS`, `NAMA`, `NOMOR_TELEPON`, `ALAMAT`, `EMAIL`, `USERNAME`, `PASSWORD`) VALUES
('U001', 1, 'andrea', '123456789098', 'Mastrip', 'ajonathansterben@gmail.com', 'andre', '1234');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `opsi_pembayaran`
--
ALTER TABLE `opsi_pembayaran`
  ADD PRIMARY KEY (`ID_OPSI_PEMBAYARAN`);

--
-- Indeks untuk tabel `opsi_pengiriman`
--
ALTER TABLE `opsi_pengiriman`
  ADD PRIMARY KEY (`ID_OPSI_PENGIRIMAN`);

--
-- Indeks untuk tabel `produk_buah`
--
ALTER TABLE `produk_buah`
  ADD PRIMARY KEY (`ID_PRODUK_BUAH`);

--
-- Indeks untuk tabel `produk_olahan`
--
ALTER TABLE `produk_olahan`
  ADD PRIMARY KEY (`ID_PRODUK_OLAHAN`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID_STATUS`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`),
  ADD KEY `FK_MEMBAYAR` (`ID_OPSI_PEMBAYARAN`),
  ADD KEY `FK_MEMBUAT` (`ID_USER`),
  ADD KEY `FK_MENGIRIM` (`ID_OPSI_PENGIRIMAN`),
  ADD KEY `FK_REFERENCE_7` (`ID_PRODUK_BUAH`),
  ADD KEY `FK_REFERENCE_8` (`ID_PRODUK_OLAHAN`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`),
  ADD KEY `FK_MEMILIKI` (`ID_STATUS`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `ID_STATUS` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`ID_STATUS`) REFERENCES `user` (`ID_STATUS`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_MEMBAYAR` FOREIGN KEY (`ID_OPSI_PEMBAYARAN`) REFERENCES `opsi_pembayaran` (`ID_OPSI_PEMBAYARAN`),
  ADD CONSTRAINT `FK_MEMBUAT` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `FK_MENGIRIM` FOREIGN KEY (`ID_OPSI_PENGIRIMAN`) REFERENCES `opsi_pengiriman` (`ID_OPSI_PENGIRIMAN`),
  ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`ID_PRODUK_BUAH`) REFERENCES `produk_buah` (`ID_PRODUK_BUAH`),
  ADD CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`ID_PRODUK_OLAHAN`) REFERENCES `produk_olahan` (`ID_PRODUK_OLAHAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
