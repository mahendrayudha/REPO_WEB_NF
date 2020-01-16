-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2020 pada 13.28
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

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

--
-- Dumping data untuk tabel `detail_jual`
--

INSERT INTO `detail_jual` (`ID_TRANSAKSI`, `ID_PRODUK`, `JUMLAH_BELI`) VALUES
('T001', 'P001', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `ID_TRANSAKSI` varchar(5) NOT NULL,
  `ID_PRODUK` varchar(5) NOT NULL,
  `NAMA_PRODUK` varchar(20) NOT NULL,
  `ID_USER` varchar(5) NOT NULL,
  `NAMA_USER` varchar(100) NOT NULL,
  `JUMLAH_BELI` int(3) NOT NULL,
  `TGL_TRANSAKSI` varchar(15) NOT NULL,
  `ALAMAT` varchar(150) NOT NULL,
  `OPSI_PEMBAYARAN` int(2) NOT NULL COMMENT '1. Transfer, 2. Bayar tunai',
  `GRAND_TOTAL` int(11) NOT NULL,
  `STATUS_ACC` enum('1','2') NOT NULL COMMENT '1. blm ACC 2. Sudah DI Acc'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`ID_TRANSAKSI`, `ID_PRODUK`, `NAMA_PRODUK`, `ID_USER`, `NAMA_USER`, `JUMLAH_BELI`, `TGL_TRANSAKSI`, `ALAMAT`, `OPSI_PEMBAYARAN`, `GRAND_TOTAL`, `STATUS_ACC`) VALUES
('T001', 'P001', 'Buah Naga Merah', 'U006', 'Agung Wahyu Gunawan', 5, '2019-12-31 12:2', 'Jl. Semeru, Sumbersari, Jember', 1, 50000, '2'),
('T002', 'P001', 'Buah Naga Merah', 'U006', 'Agung Wahyu Gunawan', 3, '2019-12-31 12:2', 'Jl. Semeru, Sumbersari, Jember', 1, 30000, '1'),
('T003', 'P001', 'Buah Naga Merah', 'U006', 'Agung Wahyu Gunawan', 12, '2020-01-01 12:3', 'Jl. Semeru, Sumbersari, Jember', 2, 120000, '1');

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
('P001', 'Buah Naga Merah', 'buah_merah.jpg', 295, 0, 10000),
('P002', 'Buah Naga Putih', 'buah_putih.jpg', 0, 0, 25000),
('P003', 'Jus Buah Naga', 'Jus.jpg', 0, 0, 5000),
('P004', 'Keripik Buah Naga', 'Kripik.jpg', 0, 0, 5000),
('P005', 'Selai Buah Naga', 'Selai.jpg', 0, 0, 18000),
('P006', 'Buah Naga Kuning', 'PDM.png', 100, 0, 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` varchar(5) NOT NULL,
  `ID_USER` varchar(5) NOT NULL,
  `TANGGAL_TRANSAKSI` datetime DEFAULT NULL,
  `STATUS_BAYAR` int(3) DEFAULT NULL COMMENT '1. Lunas, 2. Belum lunas',
  `GRAND_TOTAL` int(11) DEFAULT NULL,
  `ALAMAT_PENGIRIMAN` varchar(100) DEFAULT NULL,
  `OPSI_PEMBAYARAN` int(1) NOT NULL COMMENT '1. Transfer, 2. Bayar tunai'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ID_TRANSAKSI`, `ID_USER`, `TANGGAL_TRANSAKSI`, `STATUS_BAYAR`, `GRAND_TOTAL`, `ALAMAT_PENGIRIMAN`, `OPSI_PEMBAYARAN`) VALUES
('T001', 'U006', '2019-12-31 12:27:46', 1, 50000, 'Jl. Semeru, Sumbersari, Jember', 1);

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
  `LEVEL` int(3) NOT NULL COMMENT '0. Super Admin, 1. Admin, 2. Karyawan, 3. User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA`, `NOMOR_TELEPON`, `ALAMAT`, `EMAIL`, `USERNAME`, `PASSWORD`, `LEVEL`) VALUES
('U001', 'Andrea Santana A', '085257423236', 'Jl. Mastrip 2 Gang 2 No.29', 'andrea.santana986@gmail.com', 'AndreaSantana', 'sagitarius', 0),
('U002', 'Octavian Yudha Mahendra', '081252989930', 'Jl. Nangka 4/9 Perumnas Patrang, Jember', 'yudhaoctavian01@gmail.com', 'mahendrayudha', 'yudha12345', 1),
('U003', 'Dicky Irqi Z', '082312408105', 'Sumbersari Perumahan Taman Kampus C5/8 jember', 'dickyirqi11@gmail.com', 'Dickyzulkarnaen', 'dicky12345', 2),
('U004', 'Maulidia Priswanti', '0895395671103', 'Jl. Mastrip 3/89 Kel. Tegal Gede, Sumbersari', 'lidiapriswanti2000@gmail.com', 'Maulidiapriswanti', 'maul1506', 2),
('U006', 'Agung Wahyu Gunawan', '085816908859', 'Jl. Semeru, Sumbersari, Jember', 'agungwahyu@gmail.com', 'agungwahyu', 'agung12345', 3),
('U007', 'Jonathan Sterben', '098765432123', 'Jl. Mastrip 9 no 96', 'jonathansterben@gmail.com', 'Jonathan', 'sterben12345', 3),
('U008', 'Raditya Dinantara Y', '085257423236', 'Jl. Sagitarius No. 34 Perum Satelit Permai', 'lyrawahyudi@gmail.com', 'Raditya ', 'radit12345', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD UNIQUE KEY `ID_TRANSAKSI` (`ID_TRANSAKSI`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`ID_TRANSAKSI`);

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
