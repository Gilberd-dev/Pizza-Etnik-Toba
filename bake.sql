-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307:3307
-- Generation Time: Jun 17, 2023 at 09:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bake`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `nomor_telepon_admin` varchar(13) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `foto_admin` varchar(200) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `kode` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `nomor_telepon_admin`, `username`, `password`, `foto_admin`, `email_admin`, `kode`, `status`) VALUES
(1, 'Helena J.Pakpahan', '6282164304676', 'helena_j_pakpahan', '$2y$10$58O/MCc5K.s0k45f0r2Fj.lzXoboyf3V6eqYSqLLDR2QkmHqoF/ve', 'admin.jpg', 'helenajpakpahan@gmail.com', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id_carousel` int(11) NOT NULL,
  `judul_carousel` varchar(100) DEFAULT NULL,
  `deskripsi_carousel` text DEFAULT NULL,
  `gambar_carousel` varchar(255) NOT NULL,
  `id_admin` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id_carousel`, `judul_carousel`, `deskripsi_carousel`, `gambar_carousel`, `id_admin`) VALUES
(1, '', '', 'banner1.jpg', 1),
(2, '', '', 'banner2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `status`) VALUES
(1, 'Makanan', 'Aktif'),
(2, 'Minuman', 'Aktif'),
(3, 'Roti dan Kue', 'Aktif'),
(4, 'ice cream', 'Aktif'),
(6, 'ice creamm', 'Nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `masukan`
--

CREATE TABLE `masukan` (
  `id_masukan` int(11) NOT NULL,
  `nama_pengunjung` varchar(100) NOT NULL,
  `email_pengunjung` varchar(200) NOT NULL,
  `teks_masukan` text NOT NULL,
  `tanggal_post_masukan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gambar_video_masukan` varchar(255) NOT NULL,
  `status_masukan` enum('Diizinkan','Diblokir') NOT NULL DEFAULT 'Diizinkan',
  `id_admin` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masukan`
--

INSERT INTO `masukan` (`id_masukan`, `nama_pengunjung`, `email_pengunjung`, `teks_masukan`, `tanggal_post_masukan`, `gambar_video_masukan`, `status_masukan`, `id_admin`) VALUES
(1, 'Aldv', 'Alvind7@gmail.com', 'Pizzanya enakk andalimannya berasa khas banget. Keju mozzarella mereka nggak pelit. Minumannya juga enak dengan package bisa dibawa sambil jalan. ', '2023-06-06 10:13:58', 'aldv.png', 'Diizinkan', 1),
(2, 'Roela Amri', 'Roelaamri15@gmail.com', 'Banana green smoothies  nya cakep . Dekat dari kota Balige', '2023-05-03 09:05:08', 'roela_amri.jpg', 'Diizinkan', 1),
(14, 'Adolf Hitler', 'schlachten@gmail.com', 'Die Rindfleisch-Rendang-Pizza ist großartig', '2023-06-07 02:58:00', 'rensapi.jpg', 'Diizinkan', 1),
(15, 'Abraham Lincoln', 'lincoln@gmail.com', 'wowww.. so good', '2023-06-07 03:01:15', 'cap.jpg', 'Diizinkan', 1),
(16, 'Willem Daendels', 'daendels@gmail.com', 'I love the kebab, so good, i like it', '2023-06-07 03:06:56', 'kebbbbbb.jpg', 'Diizinkan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `petunjuk`
--

CREATE TABLE `petunjuk` (
  `id_petunjuk` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petunjuk`
--

INSERT INTO `petunjuk` (`id_petunjuk`, `deskripsi`) VALUES
(1, 'Tekan tombol Pesan Sekarang'),
(2, 'Pilih produk yang ingin dipesan'),
(3, 'Isi formulir pemesanan dengan data asli'),
(4, 'Tekan tombol Periksa untuk memeriksa pesanan'),
(6, 'Pastikan Daftar Pesanan dan Informasi Pembeli sudah sesuai\r\n'),
(9, 'Tekan tombol kirim, maka pesanan anda akan dilanjutkan di aplikasi WhatsApp');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `judul_prestasi` varchar(255) NOT NULL,
  `deskripsi_prestasi` varchar(255) NOT NULL,
  `gambar_prestasi` varchar(255) NOT NULL,
  `id_admin` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `judul_prestasi`, `deskripsi_prestasi`, `gambar_prestasi`, `id_admin`) VALUES
(1, 'Festival Danau Toba', 'Peserta dan pemenang kategori makanan unik dalam Festival Danau Toba tahun 2016, yang diadakan di Muara - Tapanuli Utara', 'prestasi1.jpg', 1),
(2, 'Pelatihan Tata Boga', 'Sebagai instruktur pelatihan tata boga kegiatan pendidikan dan pelatihan keterampilan bagi pencari kerja program peningkatan kualitas tenaga kerja', 'pres2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` float NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `status_produk` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif',
  `id_kategori` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL DEFAULT 1,
  `deskripsi_produk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `gambar_produk`, `status_produk`, `id_kategori`, `id_admin`, `deskripsi_produk`) VALUES
(1, 'Donat Coklat Kacang', 3000, 'peanut.jpg', 'Aktif', 3, 1, 'Donat lezat yang terbuat dari kacang serta cokelat yang berkualitas.'),
(3, 'Lemon Tea', 12000, 'lemon.jpg', 'Aktif', 2, 1, 'Teh Lemon dengan kesegeran lemon alami yang dipetik sendiri dari pohon. Dengan campuran teh yang membuat terasa semakin menyegarkan.'),
(6, 'Kebab', 18000, 'kebab.jpg', 'Aktif', 1, 1, 'Kebab adalah hidangan yang berasal dari Timur Tengah yang terdiri dari daging panggang yang dipotong kecil-kecil dan disajikan di dalam roti pipih.'),
(7, 'French Fries', 18000, 'fries.jpg', 'Aktif', 1, 1, 'Kentang goreng yang terbuat dari kentang pilihan yang berkualitas dan diolah dengan profesional.'),
(8, 'Nasi Goreng', 25000, 'nasgor.jpg', 'Aktif', 1, 1, 'Nasi Goreng dari beras pilihan dan diolah dengan baik, menghasilkan nasi yang berkualitas.'),
(9, 'Nugget', 18000, 'nugget.jpg', 'Aktif', 1, 1, 'Nugget yang dibuat dari daging ayam pilihan, diolah dengan minyak yang sehat.'),
(10, 'Pizza Rendang Sapi', 80000, 'rendang.jpg', 'Aktif', 3, 1, ' Rendang sapi adalah hidangan daging sapi yang dimasak dengan rempah-rempah khas Indonesia.'),
(11, 'Dimsum Ayam', 20000, 'chickdim.jpg', 'Aktif', 1, 1, 'Dimsum ayam sering disajikan sebagai hidangan pembuka. Hidangan ini biasanya disajikan dengan saus yang menggugah selera.'),
(12, 'Pizza Ayam', 70000, 'chickpiz.jpg', 'Aktif', 3, 1, 'Pizza dengan perpaduan rasa gurih dan lezat dari ayam yang dimasak dengan berbagai bumbu, dan kelezatan adonan pizza yang renyah.'),
(13, 'Dimsum Udang', 20000, 'shrimpdim.jpg', 'Aktif', 1, 1, 'Dimsum udang memiliki kulit yang tipis dan transparan, memberikan tampilan yang menarik saat disajikan.'),
(14, 'Pizza Sapi', 80000, 'beefpiz.jpg', 'Aktif', 3, 1, 'Pizza sapi adalah variasi pizza yang menggunakan daging sapi sebagai bahan utamanya. '),
(15, 'Pizza Ikan Tuna', 75000, 'tunapiz.jpg', 'Aktif', 3, 1, 'Pizza ikan tuna adalah variasi pizza yang menggunakan ikan tuna sebagai bahan utamanya. '),
(16, 'Pizza Jamur', 65000, 'mushpiz.jpg', 'Aktif', 3, 1, 'Pizza jamur adalah variasi pizza yang memiliki jamur sebagai bahan utamanya. Jamur segar dipotong atau diiris dan dijadikan topping pada pizza.'),
(17, 'Pizza Sosis', 65000, 'sospiz.jpg', 'Aktif', 3, 1, 'Pizza sosis adalah variasi pizza yang menggunakan sosis sebagai salah satu bahan utamanya.'),
(18, 'Pizza Sayuran', 60000, 'vegpiz.jpg', 'Aktif', 3, 1, 'Pizza sayuran memberikan rasa yang segar, tekstur yang renyah, dan kelezatan dari kombinasi berbagai jenis sayuran.'),
(19, 'Jus Jeruk', 10000, 'orgjc.jpg', 'Aktif', 2, 1, 'Jus jeruk adalah minuman yang terbuat dari perasan buah jeruk segar.'),
(20, 'Green Tea', 10000, 'greentea.jpg', 'Aktif', 2, 1, 'Green tea, atau dikenal juga sebagai Camellia sinensis, adalah jenis teh yang dibuat dari daun tanaman teh.'),
(21, 'Black Coffee', 10000, 'coffee.jpg', 'Aktif', 2, 1, 'Kopi hitam adalah minuman yang terbuat dari biji kopi yang telah digiling dan diseduh dalam air panas tanpa penambahan susu atau gula. '),
(22, 'Milo', 12000, 'milo.jpg', 'Aktif', 2, 1, 'Minuman susu Milo adalah minuman yang terbuat dari campuran serbuk Milo dengan susu. '),
(23, 'Chocolate', 12000, 'cokelat.jpg', 'Aktif', 2, 1, 'Minuman cokelat merupakan favorit di berbagai usia. Rasanya yang lezat dan kenikmatan dari rasa cokelat yang khas.'),
(24, 'Cappucino', 12000, 'cappucino.jpg', 'Aktif', 2, 1, 'Cappuccino memiliki rasa yang kaya, dengan kombinasi antara cita rasa kuat dari espresso dan kelembutan dari susu.'),
(25, 'Capcay', 25000, 'capcay.jpg', 'Aktif', 1, 1, 'Capcay adalah masakan Tionghoa-Indonesia yang terdiri dari campuran sayuran yang diolah dengan cara tumis.'),
(26, 'Pancake Durian', 25000, 'durian.jpg', 'Aktif', 1, 1, 'Pancake durian dibuat dengan mencampurkan daging durian yang matang dengan adonan pancake.'),
(27, 'Ayam Penyet', 25000, 'penyet.jpg', 'Aktif', 1, 1, 'Ayam penyet adalah hidangan khas Indonesia yang terdiri dari ayam yang dimasak dengan bumbu rempah-rempah khas.'),
(30, 'Ice cream choco', 5000, 'ice cream.jpeg', 'Aktif', 4, 1, 'wuenak');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `judul_sertifikat` varchar(100) NOT NULL,
  `deskripsi_sertifikat` varchar(255) NOT NULL,
  `gambar_sertifikat` varchar(255) NOT NULL,
  `id_admin` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id_sertifikat`, `judul_sertifikat`, `deskripsi_sertifikat`, `gambar_sertifikat`, `id_admin`) VALUES
(2, 'Sertifikat Produksi Pangan Industri Rumah Tangga', 'Sertifikat PIRT atau yang lebih dikenal dengan Sertifikat Produksi Pangan Industri Rumah Tangga (SPP-IRT) merupakan jaminan tertulis yang diberikan oleh Bupati atau Walikota terhadap hasil produksi IRT yang memenuhi syarat dan standar.', 'pirt.jpg', 1),
(5, 'Sertifikat Halal', 'sertifikat halal dalam 5 tahun kedepan ( 2023-2028)', 'halal2.jpeg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id_carousel`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `masukan`
--
ALTER TABLE `masukan`
  ADD PRIMARY KEY (`id_masukan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `petunjuk`
--
ALTER TABLE `petunjuk`
  ADD PRIMARY KEY (`id_petunjuk`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `masukan`
--
ALTER TABLE `masukan`
  MODIFY `id_masukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `petunjuk`
--
ALTER TABLE `petunjuk`
  MODIFY `id_petunjuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carousel`
--
ALTER TABLE `carousel`
  ADD CONSTRAINT `carousel_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `masukan`
--
ALTER TABLE `masukan`
  ADD CONSTRAINT `masukan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `id_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `sertifikat_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
