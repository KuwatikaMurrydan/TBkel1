-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2024 pada 11.17
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_abxy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(10) NOT NULL,
  `id_user` char(10) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `id_kategori` char(10) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `gambar_barang` varchar(100) NOT NULL,
  `tanggal_masuk` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_user`, `nama_barang`, `id_kategori`, `harga`, `gambar_barang`, `tanggal_masuk`) VALUES
('BR00000002', 'US00000001', 'tendaaaaa', 'TDK4DL0001', '2000', 'curug.png', '2024-06-09 09:23:36'),
('BR00000003', 'US00000001', 'chacha', 'TDK4DL0001', '1500', 'curug.png', '2024-06-09 01:05:33'),
('BR00000004', 'US00000001', 'chacha', 'TDK4DL0001', '1500', 'curug.png', '2024-06-09 01:06:48'),
('BR00000005', 'US00000001', 'chanis', 'TDK4DL0001', '2000', 'pantai.png', '2024-06-09 01:07:10'),
('BR00000006', 'US00000001', 'caca', 'TDK4DL0001', '2000', 'pantai.png', '2024-06-09 01:07:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` char(10) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `jumlah` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `jumlah`) VALUES
('0000000002', 'jaket', 3),
('baju', '0000000001', 1),
('TD00000002', 'carrier', 1),
('TDK4DL0001', 'Tenda', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_user` char(10) NOT NULL,
  `id_barang` char(10) NOT NULL,
  `tindakan` varchar(20) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_user`, `id_barang`, `tindakan`, `waktu`) VALUES
(3, 'US00000001', 'BR00000002', 'Edit', '2024-06-09 01:01:48'),
(4, 'US00000001', 'BR00000002', 'Edit', '2024-06-09 02:23:36'),
(21, 'US00000001', 'BR00000002', 'Hapus', '2024-06-09 02:33:45'),
(22, 'US00000001', 'BR00000002', 'Hapus', '2024-06-09 02:35:34'),
(23, 'US00000001', 'BR00000002', 'Hapus', '2024-06-09 02:36:44'),
(24, 'US00000001', 'BR00000002', 'Hapus', '2024-06-09 02:37:27'),
(27, 'US00000001', 'BR00000002', 'Hapus', '2024-06-09 02:49:31'),
(28, 'US00000001', 'BR00000003', 'Hapus', '2024-06-09 02:49:39'),
(29, 'US00000001', 'BR00000002', 'Hapus', '2024-06-09 02:50:17'),
(31, 'US00000001', 'BR00000002', 'Hapus', '2024-06-09 02:54:02'),
(32, 'US00000001', 'BR00000002', 'Hapus', '2024-06-09 02:57:00'),
(33, 'US00000001', 'BR00000002', 'Hapus', '2024-06-09 02:58:24'),
(35, 'US00000001', 'BR00000002', 'Hapus', '2024-06-09 03:03:30'),
(36, 'US00000001', 'BR00000002', 'Hapus', '2024-06-09 03:07:49'),
(37, 'US00000001', 'BR00000002', 'Hapus', '2024-06-09 03:10:50'),
(38, 'US00000001', 'BR00000002', 'Hapus', '2024-06-09 03:11:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_user`
--

CREATE TABLE `tipe_user` (
  `id_tipe_user` char(10) NOT NULL,
  `tipe_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tipe_user`
--

INSERT INTO `tipe_user` (`id_tipe_user`, `tipe_user`) VALUES
('TPADMINNNA', 'admin'),
('TPOPERATOR', 'operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` char(10) NOT NULL,
  `id_tipe_user` char(10) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  `gambar_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_tipe_user`, `nama_user`, `email`, `password`, `alamat`, `no_hp`, `tgl_daftar`, `gambar_user`) VALUES
('', 'TPADMINNNA', 'Cha Cha Nisya Asyah', 'chacanisya48@gmail.com', '123', 'Kp. Cileungsing ', '0853233010772', '0000-00-00 00:00:00', 'curug.png'),
('US00000001', 'TPADMINNNA', 'cha cha nisya asyah', '2206168@itg.ac.id', '$2y$10$b7dusozsCp44jeAf1xXLr.xair93ri9wDCWBRaWFxFqhUPu9h5qDq', 'kp. cileungsing ', '0853233010772', '2024-06-08 15:40:48', 'default.jpg'),
('US00000002', 'TPADMINNNA', 'akubodeng', 'zaentampan7@gmail.com', '12', 'Kp. Cileungsing ', '0853233010772', '2024-06-08 16:12:00', 'curug.png'),
('US00000003', 'TPADMINNNA', 'chanis', 'atton.tuna@gmail.com', '12', 'Kp. Cileungsing ', '0853233010772', '2024-06-08 16:12:34', 'curug.png'),
('US00000004', 'TPADMINNNA', 'Cha Cha Nisya Asyah', 'caca@itg.ac.id', '$2y$10$MHFHB7fm0PoIIkXhGovSse/5EiuLgEfk9mVxNGSiSkA8HFu0nYpJe', 'Kp. Cileungsing ', '0853233010772', '2024-06-08 18:03:06', 'curug.png'),
('US00000005', 'TPOPERATOR', 'cha cha nisya asyah', 'cacacantik@gmail.com', '$2y$10$hlsFC9AltK8kdTxUeU32ru0aEpyGiZHXSNMi8fCcTbA2qKpwIplsC', 'kp. cileungsing ', '0853233010772', '2024-06-09 14:20:24', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tipe_user`
--
ALTER TABLE `tipe_user`
  ADD PRIMARY KEY (`id_tipe_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_tipe_user` (`id_tipe_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `fk_id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_tipe_user` FOREIGN KEY (`id_tipe_user`) REFERENCES `tipe_user` (`id_tipe_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
