-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 07 Okt 2020 pada 18.32
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
-- Database: `course_backend_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `game_tbl`
--

CREATE TABLE `game_tbl` (
  `game_id` int(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tipe_leaderboard` int(2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `game_tbl`
--

INSERT INTO `game_tbl` (`game_id`, `nama`, `tipe_leaderboard`, `status`) VALUES
(1, 'Flappy Bird', 1, 1),
(2, 'Angry Bird', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota_tbl`
--

CREATE TABLE `kota_tbl` (
  `kota_id` int(255) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `provinsi_id` int(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kota_tbl`
--

INSERT INTO `kota_tbl` (`kota_id`, `nama_kota`, `provinsi_id`, `status`) VALUES
(1, 'Cibinong', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `period_tbl`
--

CREATE TABLE `period_tbl` (
  `period_id` int(11) NOT NULL,
  `game_id` int(255) NOT NULL,
  `level` int(11) NOT NULL,
  `period_start` date NOT NULL,
  `period_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `period_tbl`
--

INSERT INTO `period_tbl` (`period_id`, `game_id`, `level`, `period_start`, `period_end`) VALUES
(1, 1, 1, '2020-10-06', '2020-10-08'),
(2, 1, 2, '2020-10-06', '2020-10-10'),
(3, 2, 1, '2020-10-05', '2020-10-10'),
(4, 2, 2, '2020-10-05', '2020-10-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi_tbl`
--

CREATE TABLE `provinsi_tbl` (
  `provinsi_id` int(255) NOT NULL,
  `nama_provinsi` varchar(199) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `provinsi_tbl`
--

INSERT INTO `provinsi_tbl` (`provinsi_id`, `nama_provinsi`, `status`) VALUES
(1, 'Jawa Barat', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_game_data_tbl`
--

CREATE TABLE `user_game_data_tbl` (
  `user_game_data_id` int(255) NOT NULL,
  `ktp` varchar(16) NOT NULL,
  `game_id` int(255) NOT NULL,
  `level` int(11) NOT NULL,
  `score` int(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_game_data_tbl`
--

INSERT INTO `user_game_data_tbl` (`user_game_data_id`, `ktp`, `game_id`, `level`, `score`, `status`) VALUES
(1, '4511210022', 1, 1, 120, 1),
(2, '4511210022', 1, 2, 200, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tbl`
--

CREATE TABLE `user_tbl` (
  `ktp` varchar(16) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` int(6) NOT NULL,
  `kota_id` int(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_tbl`
--

INSERT INTO `user_tbl` (`ktp`, `nama_depan`, `nama_belakang`, `no_handphone`, `tempat_lahir`, `tanggal_lahir`, `email`, `password`, `alamat`, `kode_pos`, `kota_id`, `status`) VALUES
('32010102002', 'Fandy', 'Muhammad', '08124567788', 'Bogor', '1994-09-16', 'fandy.zea@gmail.com', 'a2ba4e823a73b9c21656532f40b52707', 'Nirwana', 19610, 1, 1),
('4511210022', 'Fajar', 'Muhammad', '081385543902', 'Kuningan', '1992-09-09', 'fajarmuhf@gmail.com', '7bedc9fd30769590c992b8f7f23738f7', 'Nirwana Estate Blok FF 22', 16910, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `game_tbl`
--
ALTER TABLE `game_tbl`
  ADD PRIMARY KEY (`game_id`);

--
-- Indeks untuk tabel `kota_tbl`
--
ALTER TABLE `kota_tbl`
  ADD PRIMARY KEY (`kota_id`),
  ADD KEY `provinsi_id` (`provinsi_id`);

--
-- Indeks untuk tabel `period_tbl`
--
ALTER TABLE `period_tbl`
  ADD PRIMARY KEY (`period_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indeks untuk tabel `provinsi_tbl`
--
ALTER TABLE `provinsi_tbl`
  ADD PRIMARY KEY (`provinsi_id`);

--
-- Indeks untuk tabel `user_game_data_tbl`
--
ALTER TABLE `user_game_data_tbl`
  ADD PRIMARY KEY (`user_game_data_id`),
  ADD KEY `user_game_data_id` (`user_game_data_id`),
  ADD KEY `ktp` (`ktp`),
  ADD KEY `game_id` (`game_id`);

--
-- Indeks untuk tabel `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`ktp`),
  ADD KEY `kota_id` (`kota_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `game_tbl`
--
ALTER TABLE `game_tbl`
  MODIFY `game_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_game_data_tbl`
--
ALTER TABLE `user_game_data_tbl`
  MODIFY `user_game_data_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kota_tbl`
--
ALTER TABLE `kota_tbl`
  ADD CONSTRAINT `kota_tbl_ibfk_1` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi_tbl` (`provinsi_id`);

--
-- Ketidakleluasaan untuk tabel `period_tbl`
--
ALTER TABLE `period_tbl`
  ADD CONSTRAINT `period_tbl_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game_tbl` (`game_id`);

--
-- Ketidakleluasaan untuk tabel `user_game_data_tbl`
--
ALTER TABLE `user_game_data_tbl`
  ADD CONSTRAINT `user_game_data_tbl_ibfk_1` FOREIGN KEY (`ktp`) REFERENCES `user_tbl` (`ktp`),
  ADD CONSTRAINT `user_game_data_tbl_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `game_tbl` (`game_id`);

--
-- Ketidakleluasaan untuk tabel `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `user_tbl_ibfk_1` FOREIGN KEY (`kota_id`) REFERENCES `kota_tbl` (`kota_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
