-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2024 pada 05.56
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moni`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kode_toko` varchar(50) NOT NULL,
  `nama_store` varchar(100) NOT NULL,
  `tgl_kunjungan` date NOT NULL,
  `foto_before` varchar(255) NOT NULL,
  `foto_after` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`id`, `nama`, `kode_toko`, `nama_store`, `tgl_kunjungan`, `foto_before`, `foto_after`, `created_at`, `catatan`) VALUES
(24, 'SKSKS23', '6A1U', 'RS PELNI', '2024-06-27', 'uploads/poto (4).png', 'uploads/poto (4).png', '2024-06-26 17:03:27', 'test'),
(25, 'MALIK MAK', '6A1U', 'RS PELNI', '2024-06-27', 'uploads/poto (4).png', 'uploads/poto (4).png', '2024-06-26 17:03:39', 'test'),
(26, 'MALIK MAK1', '6A1U', 'RS PELNI', '2024-06-27', 'uploads/logo-kd.png', 'uploads/poto (4).png', '2024-06-26 17:04:02', 'test'),
(27, 'ELOY', 'JSS', 'RSku', '2024-06-28', 'uploads/WhatsApp Image 2024-06-20 at 10.59.10.jpeg', 'uploads/poto adirana.png', '2024-06-26 17:20:37', 'tes2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
