-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 10:44 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delta`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_hewan` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_booking_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_booking` date NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `kode_hewan`, `waktu_booking_id`, `tanggal_booking`, `status`) VALUES
('BKG-O2516', 'REG9553846', 'WB-6Y2', '2020-06-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `pengirim_id` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `pengirim_id`, `pengirim_nama`, `pesan`, `created_at`, `updated_at`) VALUES
(2, 'US-43L93', 'fajar', 'halo', '2020-05-15 07:10:59', '2020-05-15 07:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `hewan`
--

CREATE TABLE `hewan` (
  `kode` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_hewan_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_hewan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` tinyint(4) NOT NULL,
  `ket` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hewan`
--

INSERT INTO `hewan` (`kode`, `user_id`, `jenis_hewan_id`, `nama_hewan`, `jenis_kelamin`, `ket`) VALUES
('REG9553846', 'US-45X73', 'JH001', 'miu', 1, 'persia himalaya'),
('REG9597541', 'US-45X73', 'JH002', 'adung', 2, 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_hewan`
--

CREATE TABLE `jenis_hewan` (
  `jenis_hewan_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_hewan`
--

INSERT INTO `jenis_hewan` (`jenis_hewan_id`, `nama`) VALUES
('JH001', 'Kucing'),
('JH002', 'Anjing'),
('JH003', 'Orang Hutan'),
('JH004', 'Kelinci');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_penyakit`
--

CREATE TABLE `jenis_penyakit` (
  `jenis_penyakit_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_penyakit`
--

INSERT INTO `jenis_penyakit` (`jenis_penyakit_id`, `nama`) VALUES
('JP01', 'Kulit'),
('JP02', 'Virus'),
('JP03', 'Bakteri'),
('JP04', 'Fungi'),
('JP05', 'Cacing'),
('JP06', 'Protozoa'),
('JP07', 'Artropoda');

-- --------------------------------------------------------

--
-- Table structure for table `kandang`
--

CREATE TABLE `kandang` (
  `id` int(11) NOT NULL,
  `kode_kandang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kandang`
--

INSERT INTO `kandang` (`id`, `kode_kandang`) VALUES
(4, 'KANDANG-5W0119I'),
(5, 'KANDANG-2P22P46'),
(6, 'KANDANG-2P22P46'),
(7, 'KANDANG-520VI77'),
(8, 'KANDANG-520VI77');

-- --------------------------------------------------------

--
-- Table structure for table `kandang_hewan`
--

CREATE TABLE `kandang_hewan` (
  `id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kandang_id` int(11) NOT NULL,
  `kode_hewan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `kode_layanan` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_penyakit` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`kode_layanan`, `kode_penyakit`, `nama`, `harga`) VALUES
('LYN-6Q51', 'PNY-5L34', 'potong', 2000),
('LYN-9Y61', 'PNY-5L34', 'operasi', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_04_22_152241_role', 1),
(2, '2020_04_22_162241_create_users_table', 1),
(3, '2020_04_23_135747_jenis_hewan', 1),
(4, '2020_04_23_135943_chat', 1),
(5, '2020_04_23_140029_kandang_hewan', 1),
(6, '2020_04_23_140109_hewan', 1),
(7, '2020_04_23_140146_booking', 1),
(8, '2020_04_23_140241_waktu_booking', 1),
(9, '2020_04_23_140402_kandang', 1),
(10, '2020_04_23_140441_medical_hewan', 1),
(11, '2020_04_23_140524_riwayat_pemeriksaan', 1),
(12, '2020_04_23_140607_layanan', 1),
(13, '2020_04_23_140700_transaksi_lainnya', 1),
(14, '2020_04_23_140741_transaksi', 1),
(15, '2020_04_23_140812_transaksi_layanan', 1),
(16, '2020_04_23_140850_transaksi_obat', 1),
(17, '2020_04_23_140922_obat', 1),
(18, '2020_04_23_140956_jenis_penyakit', 1),
(19, '2020_04_23_141048_penyakit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode_obat` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama`, `harga`) VALUES
('OBT-31H3', 'amoxilin', 20001);

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_penyakit_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `jenis_penyakit_id`, `nama`) VALUES
('PNY-5L34', 'JP01', 'jamur');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pemeriksaan`
--

CREATE TABLE `riwayat_pemeriksaan` (
  `riwayat_pemeriksaan_id` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_reg` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suhu` float NOT NULL,
  `berat_badan` float NOT NULL,
  `anamnesa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinical_sign` date NOT NULL,
  `diagnosa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pragnosa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terapi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_pemeriksaan`
--

INSERT INTO `riwayat_pemeriksaan` (`riwayat_pemeriksaan_id`, `no_reg`, `suhu`, `berat_badan`, `anamnesa`, `clinical_sign`, `diagnosa`, `pragnosa`, `terapi`) VALUES
('RM-Z25G544', 'REG9597541', 17, 22, 'asd', '2020-06-21', 'dsa', 'aaa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `nama`) VALUES
('R01', 'Admin'),
('R02', 'Dokter'),
('R03', 'Pasien');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokter_id` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_hewan` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `dokter_id`, `kode_hewan`, `waktu`, `total_harga`) VALUES
('INV-09935', 'US-533A7', 'REG9597541', '2020-06-21 01:15:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_lainnya`
--

CREATE TABLE `transaksi_lainnya` (
  `kode_lainnya` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_transaksi` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_layanan`
--

CREATE TABLE `transaksi_layanan` (
  `kode_transaksi` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_layanan` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_layanan`
--

INSERT INTO `transaksi_layanan` (`kode_transaksi`, `kode_layanan`) VALUES
('INV-09935', 'LYN-6Q51');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_obat`
--

CREATE TABLE `transaksi_obat` (
  `kode_transaksi` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_obat` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_obat`
--

INSERT INTO `transaksi_obat` (`kode_transaksi`, `kode_obat`) VALUES
('INV-09935', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcm_token` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `nama`, `phone`, `alamat`, `username`, `password`, `fcm_token`) VALUES
('US-43L93', 'R01', 'fajar wp', '082289407515', 'tunggul hitam', 'admin', '$2y$10$glvkxczmgB0ygVbvLFkjO..Gm1b9YfvfdjnKUIniaeFx46IVMCJPe', NULL),
('US-45X73', 'R03', 'samif', '087712345613', 'ulu gadut', 'pasien', '$2y$10$BcOY9X3F.Ro4HCCYRZtRT.JRpk2sHjZJkl0i5b/aDsNdAZuhdXWpe', NULL),
('US-533A7', 'R02', 'dipa', '082289407515', 'sdsddsds', 'dokter', '$2y$10$C1pMwDWL/L5DPq2it.dnG.PEGPYIYN0QCDiPLXYbXn5azHRGzc/Oe', NULL),
('US-82M95', 'R03', 'fajar wirya putra', '082289407515', 'asddsadsa', 'fajarwp588', '$2y$10$7XJIUEelsIgRABriKNw3jee05eeLi3MZsJsQ0S3q7jeQgGH0rcnNa', NULL),
('US-J1792', 'R02', 'asaa', '087712345613', 'sdsss', 'ijay123', '$2y$10$fBpEg/94OsGx91Q1QVYcOeL.SvtvpuFEZ22vTN7djA68/r7hZWhgC', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `waktu_booking`
--

CREATE TABLE `waktu_booking` (
  `waktu_booking_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` time NOT NULL,
  `status_waktu` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waktu_booking`
--

INSERT INTO `waktu_booking` (`waktu_booking_id`, `jam`, `status_waktu`) VALUES
('WB-18B', '18:00:00', 1),
('WB-34M', '09:00:00', 1),
('WB-3B7', '10:30:00', 1),
('WB-62A', '10:00:00', 1),
('WB-6Y2', '08:00:00', 2),
('WB-J23', '11:30:00', 1),
('WB-Z20', '11:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `kode_hewan` (`kode_hewan`),
  ADD KEY `waktu_booking_id` (`waktu_booking_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengirim_id` (`pengirim_id`);

--
-- Indexes for table `hewan`
--
ALTER TABLE `hewan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `jenis_hewan_id` (`jenis_hewan_id`);

--
-- Indexes for table `jenis_hewan`
--
ALTER TABLE `jenis_hewan`
  ADD PRIMARY KEY (`jenis_hewan_id`);

--
-- Indexes for table `jenis_penyakit`
--
ALTER TABLE `jenis_penyakit`
  ADD PRIMARY KEY (`jenis_penyakit_id`);

--
-- Indexes for table `kandang`
--
ALTER TABLE `kandang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kandang_hewan`
--
ALTER TABLE `kandang_hewan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_hewan` (`kode_hewan`),
  ADD KEY `kandang_id` (`kandang_id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`kode_layanan`),
  ADD KEY `kode_penyakit` (`kode_penyakit`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`),
  ADD KEY `jenis_penyakit_id` (`jenis_penyakit_id`);

--
-- Indexes for table `riwayat_pemeriksaan`
--
ALTER TABLE `riwayat_pemeriksaan`
  ADD PRIMARY KEY (`riwayat_pemeriksaan_id`),
  ADD KEY `no_reg` (`no_reg`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `dokter_id` (`dokter_id`),
  ADD KEY `kode_hewan` (`kode_hewan`);

--
-- Indexes for table `transaksi_lainnya`
--
ALTER TABLE `transaksi_lainnya`
  ADD PRIMARY KEY (`kode_lainnya`),
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `transaksi_layanan`
--
ALTER TABLE `transaksi_layanan`
  ADD KEY `kode_transaksi` (`kode_transaksi`) USING BTREE,
  ADD KEY `kode_layanan` (`kode_layanan`);

--
-- Indexes for table `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `waktu_booking`
--
ALTER TABLE `waktu_booking`
  ADD PRIMARY KEY (`waktu_booking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kandang`
--
ALTER TABLE `kandang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `constraint_booking_hewan` FOREIGN KEY (`kode_hewan`) REFERENCES `hewan` (`kode`),
  ADD CONSTRAINT `constraint_waktu_booking` FOREIGN KEY (`waktu_booking_id`) REFERENCES `waktu_booking` (`waktu_booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `constraint_chat_pengirim` FOREIGN KEY (`pengirim_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `hewan`
--
ALTER TABLE `hewan`
  ADD CONSTRAINT `constraint_hewan_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `constraint_jenis_hewan` FOREIGN KEY (`jenis_hewan_id`) REFERENCES `jenis_hewan` (`jenis_hewan_id`);

--
-- Constraints for table `kandang_hewan`
--
ALTER TABLE `kandang_hewan`
  ADD CONSTRAINT `constraint_hewan_kandang` FOREIGN KEY (`kode_hewan`) REFERENCES `hewan` (`kode`),
  ADD CONSTRAINT `constraint_kandang` FOREIGN KEY (`kandang_id`) REFERENCES `kandang` (`id`);

--
-- Constraints for table `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `constraint_layanan_penyakit` FOREIGN KEY (`kode_penyakit`) REFERENCES `penyakit` (`kode_penyakit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD CONSTRAINT `constraint_penyakit_jenis` FOREIGN KEY (`jenis_penyakit_id`) REFERENCES `jenis_penyakit` (`jenis_penyakit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `riwayat_pemeriksaan`
--
ALTER TABLE `riwayat_pemeriksaan`
  ADD CONSTRAINT `constrain_noreg` FOREIGN KEY (`no_reg`) REFERENCES `hewan` (`kode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `constraint_kodehewan` FOREIGN KEY (`kode_hewan`) REFERENCES `hewan` (`kode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `constraint_transaksi_dokter` FOREIGN KEY (`dokter_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi_lainnya`
--
ALTER TABLE `transaksi_lainnya`
  ADD CONSTRAINT `constraint_lainnya_transaksi` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_layanan`
--
ALTER TABLE `transaksi_layanan`
  ADD CONSTRAINT `constraint_layanan` FOREIGN KEY (`kode_layanan`) REFERENCES `layanan` (`kode_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_layanan_transaksi` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD CONSTRAINT `constraint_obat_transaksi` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_transaksi_obat` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `constraint_users_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
