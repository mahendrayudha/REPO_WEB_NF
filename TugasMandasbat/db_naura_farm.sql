-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2019 pada 15.51
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

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
  `ID_TRANSAKSI` varchar(5) NOT NULL,
  `ID_PRODUK` varchar(5) NOT NULL,
  `JUMLAH_BELI` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `ID_TRANSAKSI` varchar(5) NOT NULL,
  `ID_PRODUK` varchar(5) NOT NULL,
  `ID_USER` varchar(5) NOT NULL,
  `JUMLAH_BELI` int(3) NOT NULL,
  `TGL_TRANSAKSI` varchar(15) NOT NULL,
  `ALAMAT` varchar(150) NOT NULL,
  `OPSI_PEMBAYARAN` int(2) NOT NULL COMMENT '1. Transaksi, 2. Cash',
  `GRAND_TOTAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`ID_TRANSAKSI`, `ID_PRODUK`, `ID_USER`, `JUMLAH_BELI`, `TGL_TRANSAKSI`, `ALAMAT`, `OPSI_PEMBAYARAN`, `GRAND_TOTAL`) VALUES
('100', '9', '8', 2, ' 12/12/2019 ', 'sdfghj', 1, 0),
('100', '9', '8', 2, ' 12/12/2019 ', 'asdfg', 1, 0),
('100', '9', '8', 2, ' 12/12/2019 ', 'asdfg', 1, 0),
('100', '9', '8', 5, ' 12/12/2019 ', 'qwerty', 1, 20000),
('100', '9', '8', 5, ' 12/12/2019 ', 'qwerty', 1, 20000),
('T001', '9', '8', 5, ' 12/12/2019 ', 'ytrew', 1, 20000),
('T002', 'P003', 'U001', 3, ' 13/12/2019 ', 'Jl. Mastrip 2 Gang 2 No.29', 1, 21000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `ID_PRODUK` varchar(5) NOT NULL,
  `NAMA_PRODUK` varchar(30) DEFAULT NULL,
  `FOTO_PRODUK` varchar(100) NOT NULL,
  `STOK_PRODUK` int(11) DEFAULT NULL,
  `HARGA_BELI` int(11) NOT NULL,
  `HARGA_JUAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`ID_PRODUK`, `NAMA_PRODUK`, `FOTO_PRODUK`, `STOK_PRODUK`, `HARGA_BELI`, `HARGA_JUAL`) VALUES
('P001', 'Buah Naga Merah', 'buah_merah.jpg', 100, 0, 10000),
('P002', 'Buah Naga Putih', 'buah_putih.jpg', 100, 0, 13000),
('P003', 'Jus Buah Naga', 'Jus.jpg', 100, 0, 7000),
('P004', 'Keripik Buah Naga', 'Kripik.jpg', 100, 0, 5000),
('P005', 'Selai Buah Naga', 'Selai.jpg', 100, 0, 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` varchar(5) NOT NULL,
  `ID_USER` varchar(5) NOT NULL,
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
  `ID_USER` varchar(5) NOT NULL,
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

INSERT INTO `user` (`ID_USER`, `NAMA`, `NOMOR_TELEPON`, `ALAMAT`, `EMAIL`, `USERNAME`, `PASSWORD`, `LEVEL`) VALUES
('U001', 'Andrea Santana A', '085257423236', 'Jl. Mastrip 2 Gang 2 No.29', 'andrea.santana986@gmail.com', 'Andreasantana', 'sagitarius34', 1),
('U002', 'Octavian Yudha M', '081252989930', 'Jl. Nangka 4/9 Perumnas Patrang', 'yudhaoctavian@gmail.com', 'Mahendrayudha', 'yudha12345', 1),
('U003', 'Dicky Irqi Z', '082312408105', 'Sumbersari Perum Taman Kampus C5/8', 'dickyirqi11@gmail.com', 'Dickyzulkarnaen', 'dicky12345', 3),
('U004', 'Maulidia Priswanti', '0895395671103', 'Jl. Mastrip 3/89 Kel. Tegal Gede, Sumbersari', 'lidiapriswanti2000@gmail.com', 'Maulidiapriswanti', 'maul1506', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_jual`
--
ALTER TABLE `detail_jual`
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
  ADD PRIMARY KEY (`ID_USER`);

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
