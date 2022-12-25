-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2022 pada 09.30
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
-- Database: `dbpemesanan_tiket_bioskop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `tiket_id` int(11) NOT NULL,
  `jml_tiket` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id`, `users_id`, `tiket_id`, `jml_tiket`, `tgl`, `total_harga`) VALUES
(1, 1, 1, 2, '2022-10-25', 80000),
(2, 3, 5, 2, '2022-10-31', 60000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal_rilis` date NOT NULL,
  `sinopsis` text NOT NULL,
  `cover` varchar(45) DEFAULT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id`, `judul`, `tanggal_rilis`, `sinopsis`, `cover`, `kategori_id`) VALUES
(1, 'Bumi Manusia', '2019-08-15', ' Novel “Bumi Manusia” adalah novel fiksi dengan genre drama history dan bersetting pada zaman penjajahan Belanda. Novel ini fokus menyoroti kehidupan Tirto Adhi Soerjo atau “Minke”, seorang pemuda Indonesia satu-satunya yang mendapat kesempatan bersekolah di H.B.S atau Hogere Burgerschool , sekolah menengah atas khusus untuk orang Eropa, Belanda, dan elit pribumi.  ', 'bumi.jpg', 1),
(2, 'Warkop DKI Reborn 3', '2019-09-12', '   Film ini bercerita tentang grup pelawak legendaris Warkop DKI yang harus menjalankan misi rahasia. Di bawah arahan Komandan Cok (Indro Warkop) Dono, Kasino dan Indro (Warkop DKI,-red) ditugaskan untuk membongkar kasus money laundry di dunia perfilman Indonesia.\r\n\r\nLewat misinya, Warkop DKI akhirnya bisa masuk dalam dunia film. Mereka terlibat dalam sebuah pembuatan film komedi berpasangan dengan artis sinetron yang hijrah ke dunia film, Inka.\r\n\r\nSaat ada sebuah pesta, Warkop DKI yang sedang menyelidiki malah membuat Inka terjebak bersama mereka di sebuah ruangan. Warkop DKI dan Inka jatuh pingsan.Saat terbangun, Warkop DKI kaget karena berada di padang pasir. \r\n\r\nSementara Inka lenyap. Pencarian Warkop DKI mencari jejak Inka, malah menyeret mereka dalam petualangan seru di padang pasir.   ', 'warkop.jpg', 2),
(3, 'Danur', '2017-03-30', 'Film ini berkisah tentang pertemuan seorang gadis indigo bernama Risa Saraswati dengan sahabat-sahabat hantunya. Risa adalah seorang gadis indigo, dia memiliki kemampuan untuk melihat makhluk gaib. \r\n   Sejak kecil Risa merasa kesepian, ayahnya bekerja di luar negeri dan hanya berkunjung setiap enam bulan sekali, sementara ibunya, Elly, sibuk bekerja sebagai seorang guru. Ketika Risa genap usia delapan tahun, dia berdoa agar mendapatkan teman dan tidak merasa kesepian lagi. \r\n   Namun tak disangka, tiga bocah laki-laki sebayanya bernama Janshen, Peter, dan William hadir secara tiba-tiba. Anehnya, hanya Risa yang dapat melihat mereka. \r\n  Ketiganya akhirnya memberi tahu Risa bahwa mereka adalah hantu yang meninggal pada zaman penjajahan Jepang di Hindia Belanda.\r\n  Sejak itulah, Elly sering melihat anaknya tertawa sendiri dan seolah-olah sedang bermain dengan banyak teman.', 'danur.jpg', 3),
(4, 'Spider-Man: No Way Home', '2021-12-15', 'Pertama kalinya dalam sejarah layar lebar Spider-Man, identitas asli dari pahlawan nan ramah ini terbongkar, sehingga membuat tanggung jawabnya sebagai seorang berkekuatan super berbenturan dengan kehidupan normalnya, dan menempatkan semua orang terdekatnya dalam posisi paling terancam.', 'spiderman.jpg', 4),
(5, 'One Piece Red', '2022-09-21', 'One Piece Film: Red mengisahkan tentang Luffy, seorang Bajak Laut Topi Jerami yang datang ke sebuah festival musik di Pulau Musik Elegia untuk menyaksikan penampilan Uta—penyanyi tersohor dan paling dicintai di dunia. Suaranya digambarkan sebagai ‘dunia lain’.\r\n  Uta terkenal karena menyembunyikan identitasnya sendiri saat tampil. Di festival musik itu, untuk pertama kalinya, Uta mengungkapkan identitas dirinya kepada dunia bahwa ia adalah anak Shanks, kepala bajak laut berambut merah yang menjadi sosok inspirasi Luffy.', 'onepic.jpg', 5),
(6, 'Susah Sinyal', '2017-12-21', 'Ellen (Adinia Wirasti), pengacara yang sukses, adalah seorang single mom yang jarang bisa meluangkan waktu bagi anak tunggalnya Kiara (Aurora Ribero), yang akhirnya tumbuh sebagai remaja pemberontak yang lebih banyak melampiaskan emosinya di media sosial. Mereka tinggal bersama Agatha (Niniek L. Karim), ibunda Ellen yang sangat menyayangi Kiara. Ketika Agatha meninggal terkena serangan jantung, Kiara yang sejak kecil sangat dekat dengan Omanya langsung terguncang. Oleh psikolog, Ellen disarankan untuk mengajak Kiara berlibur, menghabiskan quality time untuk mengobati masa-masa di mana Ellen terlalu sibuk bekerja. Mereka pun pergi ke Sumba, menghabiskan saat-saat menyenangkan berdua. Kiara pulang dengan hati riang. Di Jakarta, Ellen langsung disambut masalah besar di kantor. Proyek besar yang sedang ia tangani bersama Iwan (Ernest Prakasa) terancam berantakan. Akhirnya karna sibuk, Ellen tidak menepati janjinya untuk menonton Kiara tampil di perlombaan talent show antar SMA yang sudah Kiara persiapkan sejak lama. Kiara pun marah dan pergi ke Sumba sendirian, tempat dimana terakhir kali ia bisa merasakan secercah kebahagiaan. ', 'susah_sinyal.jpg', 2),
(7, 'Black Panther: Wakanda Forever ', '2022-11-11', 'Film bergenre action superhero ini secara umum mengisahkan tentang perjalanan kehidupan para pemain lain setelah kepergian Chadwick Aaron Boseman pemeran Black Panther yang meninggal karena kanker usus. Trailer dari film ini dibuka dengan momen Ratu Ramonda (Angela Bassett) dan putrinya Shuri (Letitia Wright) berjalan melalui jalan-jalan Wakanda Mereka, serta warga Wakanda, berpakaian putih.\r\n\r\nShuri juga ditampilkan memegang helm Black Panther di tangannya menandakan kematian saudara laki-lakinya T\'Challa (Chadwick Boseman). Rekan penulis/sutradara Ryan Coogler telah terbuka tentang bagaimana Wakanda Forever dimaksudkan untuk menjadi penghormatan kepada Boseman yang meninggal setelah berjuang dengan penyakitnya.', 'wakanda.jpg', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL,
  `film_id` int(11) NOT NULL,
  `studio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `waktu`, `tanggal`, `film_id`, `studio_id`) VALUES
(1, '14:00:00', '2022-10-26', 1, 1),
(2, '17:00:00', '2022-10-26', 2, 2),
(3, '19:45:00', '2022-10-27', 3, 3),
(4, '11:20:00', '2022-10-28', 4, 4),
(5, '15:00:00', '2022-10-28', 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Drama'),
(2, 'Comedy'),
(3, 'Horror'),
(4, 'Action'),
(5, 'Animation'),
(6, 'Romantis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursi`
--

CREATE TABLE `kursi` (
  `id` int(11) NOT NULL,
  `studio_id` int(11) NOT NULL,
  `nomor` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kursi`
--

INSERT INTO `kursi` (`id`, `studio_id`, `nomor`) VALUES
(1, 1, 'A01'),
(2, 1, 'A02'),
(3, 2, 'B01'),
(4, 2, 'B02'),
(5, 3, 'C01'),
(6, 4, 'D01'),
(7, 5, 'E01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `studio`
--

CREATE TABLE `studio` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `studio`
--

INSERT INTO `studio` (`id`, `nama`, `foto`) VALUES
(1, 'Reguler', 'reguler.jpeg'),
(2, 'Imax', 'imax.jpg'),
(3, 'Premiere', 'premiere.png'),
(4, '3D', '3d.jpg'),
(5, 'Dolby', 'dolby.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `kursi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id`, `harga`, `stok`, `film_id`, `kursi_id`) VALUES
(1, 40000, 50, 1, 1),
(2, 50000, 30, 2, 3),
(3, 45000, 45, 3, 5),
(4, 40000, 30, 4, 6),
(5, 30000, 50, 5, 7),
(6, 35000, 46, 6, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(40) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `role` enum('admin','staff','pembeli') NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `jenis_kelamin`, `email`, `username`, `password`, `no_hp`, `role`, `foto`) VALUES
(1, 'Ryan Ramadhan', 'L', 'ryan@gmail.com', 'ryan', '9ffc5adf87dc5473fe590dd291fefd283b4e4675', 123001002, 'admin', 'ryan.jpg'),
(2, 'Zidan Aushap', 'L', 'zidan@gmail.com', 'zidan', '8918f8be407fdf417a02ff9115259dc5ee5c1d3d', 123001003, 'staff', 'zidan.jpg'),
(3, 'Yulita Apriani', 'P', 'yuli@gmail.com', 'yuli', '091ecaaedb130711db02dd7b3bd5d1023d008a8c', 123001004, 'pembeli', 'yuli.jpg'),
(4, 'Salsa Tiara Salsabila', 'P', 'salsa@gmail.com', 'salsa', 'd3e3cacb17ef9796c475524ae19cd3944134a28a', 123001005, 'pembeli', 'salsa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_has_tiket_users` (`users_id`),
  ADD KEY `fk_users_has_tiket_tiket1` (`tiket_id`);

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_film_kategori1` (`kategori_id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jadwal_studio1` (`studio_id`),
  ADD KEY `fk_jadwal_film1` (`film_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kursi_studio1` (`studio_id`);

--
-- Indeks untuk tabel `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tiket_film1` (`film_id`),
  ADD KEY `fk_tiket_kursi1` (`kursi_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kursi`
--
ALTER TABLE `kursi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `studio`
--
ALTER TABLE `studio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `fk_users_has_tiket_tiket1` FOREIGN KEY (`tiket_id`) REFERENCES `tiket` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_tiket_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fk_film_kategori1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_jadwal_film1` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jadwal_studio1` FOREIGN KEY (`studio_id`) REFERENCES `studio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `kursi`
--
ALTER TABLE `kursi`
  ADD CONSTRAINT `fk_kursi_studio1` FOREIGN KEY (`studio_id`) REFERENCES `studio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `fk_tiket_film1` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tiket_kursi1` FOREIGN KEY (`kursi_id`) REFERENCES `kursi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
