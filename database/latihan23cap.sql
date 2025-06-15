-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2025 at 12:07 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan23cap`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `idberita` int(11) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `headline` varchar(20) NOT NULL,
  `isi_berita` text NOT NULL,
  `pengirim` varchar(20) NOT NULL,
  `tanggal_publish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`idberita`, `judul`, `kategori`, `headline`, `isi_berita`, `pengirim`, `tanggal_publish`) VALUES
(2, 'indonesia minim lite', 'pendidikan', 'kurang membaca', '<p>Minimnya literasi di masyarakat <span style=\"color: rgb(0, 0, 255);\">menyebabkan</span> miss komunikasi dalam informasi yang di sampaikan </p>', 'triono', '2025-03-02'),
(3, 'dd', 'dd', 'dd', '<p>dddd</p>', 'dd', '2025-04-02'),
(4, 'Bek Timnas Indonesia', 'Olah Raga', 'Bek Timnas Indonesia', '<p>Bek Timnas Indonesia Jay Idzes menjadi salah satu pemain paling diburu jelang bursa transfer musim panas.</p><p><span style=\"font-size: 1rem;\">Jay Idzes saat ini jadi incaran banyak klub papan atas Serie A Italia, dari Inter Milan, Juventus hingga AC Milan.</span></p><p><span style=\"font-size: 1rem;\">Tak hanya klub papan atas, Jay Idzes juga dibidik oleh klub papan tengah seperti Bologna dan Torino.</span></p><p><span style=\"font-size: 1rem;\">Salah satu media lokal Turin, Toro.it melaporkan Torino juga kepincut dengan permainan Jay Idzes bersama Venezia musim ini.</span></p><p><span style=\"font-size: 1rem;\">Bek timnas Indonesia, Jay Idzes tidak masuk dalam daftar pemain yang ingin dibeli AC Milan. (Instagram/@jayidzes)</span></p><p>Bek timnas Indonesia, Jay Idzes tidak masuk dalam daftar pemain yang ingin dibeli AC Milan. (Instagram/@jayidzes)</p><p>\"Siapakah Jay Idzes, bek Venezia yang disukai Torino,\" tulis media Italia tersebut.</p><p><span style=\"font-size: 1rem;\">Ketertarikan Torino kepada Jay Idzes bahkan sejak musim lalu. Menurut media lokal Turin itu, gaya bermain Jay Idze sangat dibutuhkan Torino.</span></p><p><span style=\"font-size: 1rem;\">\"Idzes merupakan pemain bertahan yang kekuatannya ada pada keserbabisaannya. Ia dapat bermain di posisi mana saja,\"</span></p><p><span style=\"font-size: 1rem;\">\"Dari menjadi seorang bek sayap hingga bek tengah, bahkan bila diperlukan mengisi peran sebagai gelandang,\"</span></p><p><span style=\"font-size: 1rem;\">\"Dalam hal ini, gaya permainannya mengingatkan kita pada Adrien Tameze yang bermain di lini tengah dan bertahan\"</span></p>', 'Triono', '2025-04-07'),
(5, 'lagi lagi', 'olah raga', 'pindah pemain', '<p>adfadfadsfadfadfadsfadsfadf</p>', 'triono', '2025-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama_dokter`, `spesialis`) VALUES
(2, 'dr.Suseno Sumanta', 'Dokter Bedah'),
(3, 'dr.Arsa', 'Dokter Umum'),
(4, 'dr boyke', 'jantung');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `idkategori` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`idkategori`, `kategori`) VALUES
(1, 'olah raga');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `tanggal_lahir`, `alamat`, `no_telp`) VALUES
(1, 'bisaa', '2000-10-10', 'nndsjkjksa', '98892998'),
(2, 'jsjfkjk', '2000-10-10', 'sjkdskl', '989932'),
(3, 'gagal', '2000-02-01', 'kjsdjj', '2389893289'),
(4, 'yusak', '2000-12-07', 'pati', '72838278837289398');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `pasien_id` int(11) DEFAULT NULL,
  `dokter_id` int(11) DEFAULT NULL,
  `keluhan` text,
  `tanggal_kunjungan` date DEFAULT NULL,
  `jam_kunjungan` time DEFAULT NULL,
  `status` enum('dalam proses','disetujui','ditolak') DEFAULT 'dalam proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `pasien_id`, `dokter_id`, `keluhan`, `tanggal_kunjungan`, `jam_kunjungan`, `status`) VALUES
(1, 1, 2, 'bnnsns', '2025-06-18', '10:00:00', 'dalam proses'),
(2, 2, 2, 'jkkjfdjk', '2025-06-19', '10:00:00', 'dalam proses'),
(3, 3, 2, 'jjkjks', '2025-06-20', '10:00:00', 'disetujui'),
(4, 4, 3, 'Dijotosin totot', '2025-06-22', '10:00:00', 'disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','','') NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `create_at`) VALUES
(5, 'admin123', '$2y$10$b5HOcBtkcKJa0ud5OOgeAOrNwLvAeFJWVYG8e86MsSBMdHAhCO0B.', 'admin', '2025-06-11 15:20:26'),
(6, 'user123', '$2y$10$QmziPFEwORzIrxDGAmk59OJy7xr.r.WGFUjwhP3LGjej3b7.ALnQy', 'user', '2025-06-13 10:28:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`idberita`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasien_id` (`pasien_id`),
  ADD KEY `dokter_id` (`dokter_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `idberita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
