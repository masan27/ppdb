-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2020 pada 17.18
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `murid`
--

CREATE TABLE `murid` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `umur` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `alamat_asal_sekolah` text NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_ayah` varchar(25) NOT NULL,
  `nama_ibu` varchar(25) NOT NULL,
  `gaji_ayah` varchar(20) NOT NULL,
  `gaji_ibu` varchar(20) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `bukti` varchar(225) DEFAULT NULL,
  `waktu` timestamp NULL DEFAULT NULL,
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `murid`
--

INSERT INTO `murid` (`id`, `nama`, `umur`, `tanggal`, `tempat`, `alamat`, `agama`, `email`, `telp`, `asal_sekolah`, `alamat_asal_sekolah`, `nisn`, `nama_ayah`, `nama_ibu`, `gaji_ayah`, `gaji_ibu`, `alamat_ortu`, `bukti`, `waktu`, `admin`) VALUES
(1, 'Achmad Naufal', 18, '1999-01-27', 'Jakarta', 'Jl. Letjend Sutoyo RT/RW 05/007 No. 7, Kelurahan Kebon Pala, Kecamatan Makasar, Jakarta Timur, 13650', '', 'achmad.naufal39@yahoo.com', '083819192912', 'SMPN 31 Jakarta Pusat', 'Jakarta Pusat', '1268162182', 'Secret', 'Tetep Secret', '2.000.000 - 4.000.00', 'Lebih dari 4.000.000', 'Cawang III', NULL, '2020-06-19 13:52:19', 1),
(5, 'pdf tester', 18, '2019-12-31', 'ja', 'ja', 'islam', 'skasak', '1210921', 'dad', 'adas', '12324354', 'dwd', 'dwd', '1', '2', 'hbn ', 'HTU IRS.pdf', '2020-06-19 10:52:29', NULL),
(6, 'shhds', 16, '2020-06-02', 'jkjakd', 'ndakjdna', 'isisai', 'jaoaish@gmail.com', '17319631', 'ldshdls', 'skjhdkjshd', '973293792', 'ldkjal', 'kwjkds', '91291', '297923', 'bskbkdsb', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(10) NOT NULL,
  `opsi` varchar(50) NOT NULL,
  `nilai` varchar(250) DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `opsi`, `nilai`, `aktif`, `urutan`) VALUES
(1, 'nama_perusahaan', 'PPDB SMA PGRI', 'Y', 1),
(2, 'harga_pendaftaran', '2800000', 'Y', NULL),
(3, 'rekening', '7372323228', 'Y', NULL),
(4, 'telepon', NULL, 'Y', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD KEY `admin` (`admin`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `murid`
--
ALTER TABLE `murid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `murid_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
