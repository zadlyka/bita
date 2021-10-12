-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2021 pada 06.38
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bita_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ajuan`
--

CREATE TABLE `ajuan` (
  `ajuanid` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  `nip_dosen` varchar(30) NOT NULL,
  `nama_mhs` varchar(30) NOT NULL,
  `nim_mhs` varchar(30) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `tanggal_bim` date DEFAULT NULL,
  `jam_bim` time DEFAULT NULL,
  `pilihan_tgl_mulai` date NOT NULL,
  `pilihan_tgl_akhir` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ajuan`
--
ALTER TABLE `ajuan`
  ADD PRIMARY KEY (`ajuanid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ajuan`
--
ALTER TABLE `ajuan`
  MODIFY `ajuanid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ajuan`
--
ALTER TABLE `ajuan`
  ADD CONSTRAINT `ajuan_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
