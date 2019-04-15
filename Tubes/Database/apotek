-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2019 pada 12.23
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_obat`
--

CREATE TABLE `data_obat` (
  `kode_obat` varchar(5) NOT NULL,
  `nama_obat` varchar(25) NOT NULL,
  `harga_obat` char(11) NOT NULL,
  `stok_obat` int(5) NOT NULL,
  `date` date NOT NULL,
  `status` enum('Ada','Habis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_obat`
--

INSERT INTO `data_obat` (`kode_obat`, `nama_obat`, `harga_obat`, `stok_obat`, `date`, `status`) VALUES
('B001', 'Bodrex', '3000', 12, '2019-03-18', 'Ada'),
('B002', 'Migranex', '4000', 12, '2019-03-18', 'Ada'),
('B003', 'Panadol', '4000', 12, '2019-03-18', 'Ada'),
('B01', 'Panadol1w', '4000', 12, '2019-03-18', 'Ada'),
('B01a', 'Panadol1waa', '4000', 12, '2019-03-18', 'Ada'),
('xxxx', 'xxxx', 'xxxx', 0, '2019-03-18', 'Ada'),
('xxxxx', 'xxxxx', 'xxxx', 0, '2019-03-18', 'Ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_terjual`
--

CREATE TABLE `data_terjual` (
  `kode_transaksi` varchar(10) NOT NULL,
  `kode_obat` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga_obat` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_terjual`
--

INSERT INTO `data_terjual` (`kode_transaksi`, `kode_obat`, `tanggal`, `waktu`, `jumlah`, `harga_obat`) VALUES
('102', 'xsdc', '2019-03-18', '01:42:31', 1, '3000'),
('111', 'B001', '2019-03-18', '01:59:25', 0, 'ee'),
('123', 'B001', '2019-03-18', '02:00:37', 1, '111'),
('1234', 'B002', '2019-03-18', '02:11:01', 2, '2000'),
('T001', 'B00', '2019-03-18', '01:42:07', 2, '6000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('Kasir','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `status`) VALUES
(1, 'karlota', 'karlota@gmail.com', 'karlota1234', 'Admin'),
(2, 'jerome', 'jj@gmail.com', 'jerome123', 'Kasir'),
(3, 'Rudi', 'rudi@gmail.com', 'rudi1234', 'Kasir'),
(4, 'Milan', 'milan@gmail.com', 'milan1234', 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indeks untuk tabel `data_terjual`
--
ALTER TABLE `data_terjual`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
