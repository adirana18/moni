-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2024 pada 10.51
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
-- Struktur dari tabel `report_penjualan`
--

CREATE TABLE `report_penjualan` (
  `KODE_TOKO` varchar(50) DEFAULT NULL,
  `Nama_Store` varchar(255) DEFAULT NULL,
  `Jenis` varchar(50) DEFAULT NULL,
  `Area` varchar(100) DEFAULT NULL,
  `AC` varchar(100) DEFAULT NULL,
  `AM` varchar(100) DEFAULT NULL,
  `SPD` decimal(10,2) DEFAULT NULL,
  `STD` decimal(10,2) DEFAULT NULL,
  `APC` decimal(10,2) DEFAULT NULL,
  `GM` decimal(10,2) DEFAULT NULL,
  `GMPER` decimal(5,2) DEFAULT NULL,
  `INV` decimal(20,0) DEFAULT NULL,
  `OOS_O` decimal(10,2) DEFAULT NULL,
  `OOS_F` decimal(10,2) DEFAULT NULL,
  `OOS_M` decimal(10,2) DEFAULT NULL,
  `OOS_B` decimal(10,2) DEFAULT NULL,
  `RP_MUSNAH` decimal(20,0) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `report_penjualan`
--

INSERT INTO `report_penjualan` (`KODE_TOKO`, `Nama_Store`, `Jenis`, `Area`, `AC`, `AM`, `SPD`, `STD`, `APC`, `GM`, `GMPER`, `INV`, `OOS_O`, `OOS_F`, `OOS_M`, `OOS_B`, `RP_MUSNAH`, `date`, `id`) VALUES
('6A03', 'MERUYA SELATAN', 'REG', 'JAKBAR', 'RACHMAT HARYADI', 'HENDRA SUHENDAR', '12202245.00', '408.00', '29907.00', '5094004.23', '41.75', '203651637', '1.00', '1.00', '1.00', '32.00', '-21438201', '2024-06-21', 28),
('6A05', 'BUNDA MULIA', 'REG', 'JAKUT', 'YUDHA KHARISMA', 'BAYU APRILIANTO', '7122118.00', '296.00', '24061.00', '2842305.32', '39.91', '166201733', '0.00', '8.00', '1.00', '69.00', '-11494079', '2024-06-21', 29),
('6A07', 'REST AREA KM. 57', 'REG', 'KARAWANG', 'PREHATIN', 'RUDY GUNADI', '30768600.00', '700.00', '43955.00', '12611235.13', '40.99', '294529276', '0.00', '2.00', '1.00', '92.00', '-36337404', '2024-06-21', 30),
('6A08', 'RAYA CIPETE', 'REG', 'JAKSEL', 'HARLAN DINATA', 'AFRID RIZAL FIRMANSYAH', '21364946.00', '606.00', '35256.00', '8753180.33', '40.97', '201127689', '2.00', '5.00', '2.00', '86.00', '-27109871', '2024-06-21', 31),
('6A09', 'MANGGA BESAR RAYA', 'REG', 'JAKBAR', 'YUDHA KHARISMA', 'BAYU APRILIANTO', '16771037.00', '500.00', '33542.00', '6145759.29', '36.65', '207618637', '2.00', '3.00', '0.00', '56.00', '-25203913', '2024-06-21', 32),
('6A0A', 'KRAMAT SENTIONG', 'REG', 'JAKPUS', 'TRI MARGONO', 'BAYU APRILIANTO', '4173964.00', '104.00', '40134.00', '1894301.14', '45.38', '190632077', '1.00', '2.00', '0.00', '3.00', '-13000658', '2024-06-21', 33),
('6A0B', 'MAYOR OKING', 'REG', 'BOGOR', 'SETYONINGSIH', 'AFRID RIZAL FIRMANSYAH', '5790527.00', '175.00', '33089.00', '2495302.26', '43.09', '175246444', '0.00', '1.00', '0.00', '17.00', '-15148772', '2024-06-21', 34),
('6A0C', 'SYMPHONY OF THE SEA', 'REG', 'JAKUT', 'YUDHA KHARISMA', 'BAYU APRILIANTO', '4382255.00', '121.00', '36217.00', '2485849.02', '56.73', '86206962', '0.00', '2.00', '0.00', '0.00', '-17701627', '2024-06-21', 35),
('6A0D', 'PANTAI INDAH', 'REG', 'JAKUT', 'YUDHA KHARISMA', 'BAYU APRILIANTO', '9591245.00', '227.00', '42252.00', '5180732.76', '54.02', '149908071', '0.00', '0.00', '0.00', '9.00', '-17072479', '2024-06-21', 36),
('6A0E', 'RSUD SAYANG', 'REG', 'BANDUNG', 'TRI SUSANTO', 'RUDY GUNADI', '6885818.00', '165.00', '41732.00', '3127952.04', '45.43', '187485631', '0.00', '0.00', '0.00', '17.00', '-22531607', '2024-06-21', 37),
('6A0F', 'PABUARAN', 'REG', 'BOGOR', 'SETYONINGSIH', 'AFRID RIZAL FIRMANSYAH', '5043700.00', '159.00', '31721.00', '2233879.62', '44.29', '184428017', '0.00', '0.00', '0.00', '23.00', '-9664079', '2024-06-21', 38),
('6A0G', 'PURI BETA', 'REG', 'TANGERANG', 'MUHAMMAD ALDI', 'AFRID RIZAL FIRMANSYAH', '4869145.00', '123.00', '39587.00', '2215817.37', '45.51', '133628929', '1.00', '5.00', '1.00', '74.00', '-22374238', '2024-06-21', 39),
('6A0H', 'MELAWAI', 'REG', 'JAKSEL', 'HARLAN DINATA', 'AFRID RIZAL FIRMANSYAH', '14727318.00', '383.00', '38453.00', '4663590.28', '31.67', '207460663', '0.00', '3.00', '2.00', '31.00', '-18916016', '2024-06-21', 40),
('6A0I', 'SETRASARI', 'REG', 'BANDUNG', 'BENI HERMAWAN', 'RUDY GUNADI', '3026455.00', '83.00', '36463.00', '1121490.82', '37.06', '124273641', '0.00', '0.00', '0.00', '9.00', '-9924199', '2024-06-21', 41),
('6A0J', 'TANJUNGSARI', 'REG', 'BANDUNG', 'BUDI NORMAN', 'RUDY GUNADI', '3439891.00', '81.00', '42468.00', '1572189.31', '45.07', '159479438', '1.00', '1.00', '0.00', '22.00', '-20368466', '2024-06-21', 42),
('6A0K', 'SETIABUDI 49', 'REG', 'BANDUNG', 'BENI HERMAWAN', 'RUDY GUNADI', '2282509.00', '72.00', '31702.00', '776670.63', '34.03', '112419504', '0.00', '2.00', '0.00', '15.00', '-10565501', '2024-06-21', 43),
('6A0L', 'A DAMYATI', 'REG', 'TANGERANG', 'VIVAL DARMAWAN', 'HERLAMBANG DWI SUSANTO', '3630300.00', '134.00', '27092.00', '1413842.55', '38.95', '159009785', '3.00', '1.00', '0.00', '21.00', '-12617677', '2024-06-21', 44),
('6A0M', 'DAGO SUITES', 'REG', 'BANDUNG', 'BENI HERMAWAN', 'RUDY GUNADI', '4526791.00', '144.00', '31436.00', '1767776.68', '39.05', '91108188', '3.00', '5.00', '1.00', '36.00', '-9221980', '2024-06-21', 45),
('6A0N', 'IBCC', 'REG', 'BANDUNG', 'BENI HERMAWAN', 'RUDY GUNADI', '5114746.00', '169.00', '30265.00', '1618561.76', '31.65', '86751489', '2.00', '0.00', '0.00', '17.00', '-8227919', '2024-06-21', 46),
('6A0O', 'PERJUANGAN', 'REG', 'CIREBON', 'PREHATIN', 'RUDY GUNADI', '10284800.00', '211.00', '48743.00', '4982269.36', '48.44', '166399668', '1.00', '2.00', '0.00', '36.00', '-20245725', '2024-06-21', 47),
('6A0P', 'SAHID SUDIRMAN', 'REG', 'JAKPUS', 'ODI RUSTANDI', 'BAYU APRILIANTO', '12471927.00', '394.00', '31655.00', '4869358.23', '39.04', '108993616', '0.00', '3.00', '0.00', '2.00', '-2793989', '2024-06-21', 48),
('6A0Q', 'DAAN MOGOT BARU', 'REG', 'JAKBAR', 'RACHMAT HARYADI', 'HENDRA SUHENDAR', '7271378.00', '269.00', '27187.00', '3282722.72', '45.15', '188883671', '2.00', '0.00', '0.00', '0.00', '-16860366', '2024-06-21', 49),
('6A0R', 'GATOT SUBROTO', 'REG', 'JAKPUS', 'ODI RUSTANDI', 'BAYU APRILIANTO', '13234217.00', '374.00', '35392.00', '4499250.99', '33.99', '122348854', '0.00', '0.00', '0.00', '16.00', '-24058322', '2024-06-21', 50),
('6A0S', 'CIPUTAT INDAH', 'REG', 'TANGERANG', 'BUDI MUKTI', 'AFRID RIZAL FIRMANSYAH', '3452691.00', '108.00', '31969.00', '1614537.47', '46.77', '110919482', '0.00', '0.00', '0.00', '35.00', '-14824190', '2024-06-21', 51),
('6A0T', 'PENJARINGAN', 'REG', 'JAKUT', 'YUDHA KHARISMA', 'BAYU APRILIANTO', '13041897.00', '316.00', '41309.00', '6301198.50', '48.33', '133598707', '3.00', '1.00', '0.00', '30.00', '-22647471', '2024-06-21', 52),
('6A0U', 'MERUYA ILIR', 'REG', 'JAKBAR', 'TRI MARGONO', 'HENDRA SUHENDAR', '9298500.00', '277.00', '33568.00', '4751394.60', '51.10', '153031965', '2.00', '1.00', '0.00', '30.00', '-15931669', '2024-06-21', 53),
('6A0V', 'TANAH ABANG', 'REG', 'JAKPUS', 'TRI MARGONO', 'BAYU APRILIANTO', '7460414.00', '215.00', '34697.00', '3208520.73', '42.99', '139599387', '1.00', '1.00', '0.00', '9.00', '-24726518', '2024-06-21', 54);

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `toko_id` int(11) NOT NULL,
  `toko_nama` varchar(500) NOT NULL,
  `toko_kota` varchar(250) NOT NULL,
  `toko_alamat` text NOT NULL,
  `toko_tlpn` varchar(250) NOT NULL,
  `toko_wa` varchar(250) NOT NULL,
  `toko_email` varchar(500) NOT NULL,
  `toko_print` int(11) NOT NULL,
  `toko_status` int(11) NOT NULL,
  `toko_ongkir` int(11) NOT NULL,
  `toko_cabang` int(11) NOT NULL,
  `toko_parent` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`toko_id`, `toko_nama`, `toko_kota`, `toko_alamat`, `toko_tlpn`, `toko_wa`, `toko_email`, `toko_print`, `toko_status`, `toko_ongkir`, `toko_cabang`, `toko_parent`) VALUES
(1, 'Laswon', 'Tangerang', 'Gedung Alfa Tower, Lantai 28\r\nJl. Jalur Sutera Barat, Kav. 7-9, Alam Sutera, Tangerang, Indonesia\r\n', '08111012355', '081514678001', 'info@admin.com', 8, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(500) NOT NULL,
  `user_no_hp` varchar(250) NOT NULL,
  `user_alamat` text NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `user_create` varchar(250) NOT NULL,
  `user_level` varchar(250) NOT NULL,
  `user_status` varchar(250) NOT NULL,
  `user_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_no_hp`, `user_alamat`, `user_email`, `user_password`, `user_create`, `user_level`, `user_status`, `user_cabang`) VALUES
(16, 'superadmin', '081223212915', 'Subang', 'data@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '04 February 2023 11:02:03 am', 'super admin', '1', 0),
(32, 'ADMIN', '083816256254', 'ruko puri\r\nruko', 'admin@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '22 June 2024 3:51:08 am', 'admin', '1', 0),
(37, 'Zefi', '083816256254', 'Bogor', 'zefi@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '22 June 2024 1:53:47 pm', 'Petugas', '1', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `report_penjualan`
--
ALTER TABLE `report_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`toko_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `report_penjualan`
--
ALTER TABLE `report_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `toko_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
