-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2022 pada 13.31
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpesanans`
--

CREATE TABLE `detailpesanans` (
  `id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` int(11) NOT NULL,
  `namaKategori` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `namaKategori`, `created_at`, `updated_at`) VALUES
(1, 'Coffee', NULL, NULL),
(2, 'Non Coffee', NULL, NULL),
(3, 'Snack', NULL, NULL),
(4, 'Traditional Coffee', '2022-11-13 01:13:07', '2022-11-13 01:13:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mejas`
--

CREATE TABLE `mejas` (
  `id` int(11) NOT NULL,
  `kodeMeja` char(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mejas`
--

INSERT INTO `mejas` (`id`, `kodeMeja`, `created_at`, `updated_at`) VALUES
(1, 'A01', NULL, NULL),
(2, 'A02', NULL, NULL),
(3, 'B01', NULL, NULL),
(4, 'B02', NULL, NULL),
(5, 'C01', '2022-11-13 01:34:23', '2022-11-13 01:34:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `namaMenu` varchar(100) NOT NULL,
  `status` varchar(45) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `kategori_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `namaMenu`, `status`, `harga`, `stok`, `foto`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, 'Coffee Latte', 'Ready', 15000, 25, 'coffe_late.jpg', 1, NULL, NULL),
(2, 'Lemon Tea', 'Ready', 12000, 50, 'lemon.jpg', 2, NULL, NULL),
(3, 'Kentang Goreng', 'Ready', 10000, 22, 'kentang.jpg', 3, NULL, NULL),
(4, 'Coffee Tubruk', 'Ready', 7000, 12, 'coffe_tubruk.jpg', 2, '2022-11-13 01:30:34', '2022-11-13 01:30:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metodepembayarans`
--

CREATE TABLE `metodepembayarans` (
  `id` int(11) NOT NULL,
  `metodePembayaran` varchar(245) NOT NULL,
  `pembayaran_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` int(11) NOT NULL,
  `metodePembayaran` varchar(245) NOT NULL,
  `statusPembayaran` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `metodePembayaran`, `statusPembayaran`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 'Lunas', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` int(11) NOT NULL,
  `kodePesanan` char(4) NOT NULL,
  `waktuPesan` datetime NOT NULL,
  `TotalPesan` varchar(45) NOT NULL,
  `TotalHarga` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meja_id` int(11) NOT NULL,
  `pembayaran_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id`, `kodePesanan`, `waktuPesan`, `TotalPesan`, `TotalHarga`, `user_id`, `meja_id`, `pembayaran_id`, `created_at`, `updated_at`) VALUES
(1, 'P001', '2022-11-13 12:44:39', '2', '30000', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(40) NOT NULL,
  `namaLengkap` varchar(60) NOT NULL,
  `noHP` int(11) NOT NULL,
  `role` enum('Admin','Kasir','Customer') NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `namaLengkap`, `noHP`, `role`, `alamat`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'ryan@gmail.com', 'ryan', 'ryan', 'Ryan Ramadhan', 123456001, 'Admin', 'Karawang', 'ryan.jpg', NULL, NULL),
(2, 'alfian@gmail.com', 'alfian', 'alfian', 'Andika Alfian', 123456002, 'Kasir', 'Jakarta', 'alfian.jpg', '2022-11-13 01:17:35', '2022-11-13 01:17:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailpesanans`
--
ALTER TABLE `detailpesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detailPesanan_pesanan1` (`pesanan_id`),
  ADD KEY `fk_detailPesanan_menu1` (`menu_id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mejas`
--
ALTER TABLE `mejas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_kategori1` (`kategori_id`);

--
-- Indeks untuk tabel `metodepembayarans`
--
ALTER TABLE `metodepembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_metodePembayaran_pembayaran1` (`pembayaran_id`);

--
-- Indeks untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kodePesanan_UNIQUE` (`kodePesanan`),
  ADD KEY `fk_pesanan_user1` (`user_id`),
  ADD KEY `fk_pesanan_meja1` (`meja_id`),
  ADD KEY `fk_pesanan_pembayaran1` (`pembayaran_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailpesanans`
--
ALTER TABLE `detailpesanans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mejas`
--
ALTER TABLE `mejas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `metodepembayarans`
--
ALTER TABLE `metodepembayarans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailpesanans`
--
ALTER TABLE `detailpesanans`
  ADD CONSTRAINT `fk_detailPesanan_menu1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detailPesanan_pesanan1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `fk_menu_kategori1` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `metodepembayarans`
--
ALTER TABLE `metodepembayarans`
  ADD CONSTRAINT `fk_metodePembayaran_pembayaran1` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayarans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `fk_pesanan_meja1` FOREIGN KEY (`meja_id`) REFERENCES `mejas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pesanan_pembayaran1` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayarans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pesanan_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
