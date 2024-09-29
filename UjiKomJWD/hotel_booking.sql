-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Sep 2024 pada 05.10
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_booking`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_kamar`
--

CREATE TABLE `pemesanan_kamar` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `nomor_identitas` char(16) NOT NULL,
  `tipe_kamar` enum('Standar','Deluxe','Exclusive') NOT NULL,
  `harga_kamar` decimal(10,2) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `durasi_menginap` int(11) NOT NULL,
  `termasuk_breakfast` tinyint(1) NOT NULL DEFAULT 0,
  `discount` decimal(5,2) NOT NULL DEFAULT 0.00,
  `total_bayar` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan_kamar`
--

INSERT INTO `pemesanan_kamar` (`id`, `nama_pemesan`, `jenis_kelamin`, `nomor_identitas`, `tipe_kamar`, `harga_kamar`, `tanggal_pesan`, `durasi_menginap`, `termasuk_breakfast`, `discount`, `total_bayar`) VALUES
(6, 'cici', 'Perempuan', '1111111111111111', 'Standar', '1000000.00', '2024-09-21', 4, 1, '10.00', '3600000.00'),
(7, 'sese', 'Laki-laki', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 1, 0, '0.00', '2000000.00'),
(8, 'jeno', 'Laki-laki', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 4, 1, '10.00', '7488000.00'),
(9, 'rere', 'Laki-laki', '1111111111111111', 'Standar', '1000000.00', '2024-09-21', 1, 0, '10.00', '1000000.00'),
(10, 'rere', 'Laki-laki', '1111111111111111', 'Standar', '1000000.00', '2024-09-21', 1, 0, '10.00', '1000000.00'),
(11, 'bobi', 'Laki-laki', '1111111111111111', 'Standar', '1000000.00', '2024-09-21', 1, 0, '10.00', '1000000.00'),
(12, 'bobi', 'Laki-laki', '1111111111111111', 'Standar', '1000000.00', '2024-09-21', 1, 0, '10.00', '1000000.00'),
(13, 'bobi', 'Laki-laki', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 1, 0, '10.00', '2000000.00'),
(14, 'bobi', 'Laki-laki', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 1, 0, '10.00', '2000000.00'),
(15, 'bobi', 'Laki-laki', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 1, 0, '10.00', '2000000.00'),
(16, 'bobi', 'Laki-laki', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 1, 0, '10.00', '2000000.00'),
(17, 'bobi', 'Perempuan', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 1, 1, '0.00', '2000000.00'),
(18, 'bobi', 'Perempuan', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 4, 1, '10.00', '7200000.00'),
(19, 'bobi', 'Perempuan', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 4, 1, '10.00', '7488000.00'),
(20, 'kaka', 'Laki-laki', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 4, 0, '10.00', '7200000.00'),
(21, 'kiki', 'Laki-laki', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 1, 0, '0.00', '2000000.00'),
(22, 'sena', 'Perempuan', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 4, 1, '10.00', '7488000.00'),
(23, 'sisil', 'Perempuan', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 4, 1, '10.00', '7488000.00'),
(24, 'sisil', 'Perempuan', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 4, 1, '10.00', '7488000.00'),
(29, 'haha', 'Laki-laki', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 4, 1, '10.00', '7488000.00'),
(30, 'haha', 'Laki-laki', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 4, 1, '10.00', '7488000.00'),
(31, 'tata', 'Perempuan', '1111111111111111', 'Exclusive', '2000000.00', '2024-09-21', 1, 0, '0.00', '2000000.00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemesanan_kamar`
--
ALTER TABLE `pemesanan_kamar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemesanan_kamar`
--
ALTER TABLE `pemesanan_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
