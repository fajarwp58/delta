-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2020 pada 15.50
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `booking_id` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_hewan` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_booking_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_booking` date NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`booking_id`, `kode_hewan`, `waktu_booking_id`, `tanggal_booking`, `status`) VALUES
('BKG-579A7', 'REG3527882', 'WB-T16', '2020-10-25', 3),
('BKG-70C43', 'REG1735808', 'WB-79S', '2020-10-02', 3),
('BKG-7Z899', 'REG9780652', 'WB-34A', '2020-10-03', 3),
('BKG-966R3', 'REG3562384', 'WB-T16', '2020-10-24', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hewan`
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
-- Dumping data untuk tabel `hewan`
--

INSERT INTO `hewan` (`kode`, `user_id`, `jenis_hewan_id`, `nama_hewan`, `jenis_kelamin`, `ket`) VALUES
('REG1735808', 'US-45X73', 'JH001', 'Candice', 2, 'Persia'),
('REG3527882', 'US-69F97', 'JH003', 'rose', 2, 'mixdom'),
('REG3562384', 'US-249A6', 'JH002', 'bagong', 1, NULL),
('REG9780652', 'US-8L867', 'JH001', 'Tity', 2, 'Persia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_hewan`
--

CREATE TABLE `jenis_hewan` (
  `jenis_hewan_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_hewan`
--

INSERT INTO `jenis_hewan` (`jenis_hewan_id`, `nama`) VALUES
('JH001', 'Kucing'),
('JH002', 'Anjing'),
('JH003', 'Orang Hutan'),
('JH004', 'Kelinci');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_penyakit`
--

CREATE TABLE `jenis_penyakit` (
  `jenis_penyakit_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_penyakit`
--

INSERT INTO `jenis_penyakit` (`jenis_penyakit_id`, `nama`) VALUES
('JP001', 'Kulit'),
('JP002', 'Virus'),
('JP003', 'Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `kode_layanan` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_penyakit` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`kode_layanan`, `kode_penyakit`, `nama`, `harga`) VALUES
('LYN-07N0', 'PNY-42X9', 'Pasang Kateter', 85000),
('LYN-1B11', 'PNY-42X9', 'CheckUp', 50000),
('LYN-2M24', 'PNY-7R48', 'Operasi Kastrasi', 235000),
('LYN-357K', 'PNY-42X9', 'Konsultasi KB', 50000),
('LYN-742L', 'PNY-K765', 'Vaksinasi', 200000),
('LYN-91V7', 'PNY-R068', 'Vaksinasi', 180000),
('LYN-92P8', 'PNY-51D9', 'Operasi O.H', 220000),
('LYN-96R5', 'PNY-2J90', 'Vaksinasi', 200000),
('LYN-995N', 'PNY-29F7', 'Vaksinasi', 200000),
('LYN-E343', 'PNY-6F78', 'Vaksinasi', 200000),
('LYN-K159', 'PNY-42X9', 'Konsultasi Kebuntingan', 50000),
('LYN-S505', 'PNY-42X9', 'Pemberian Multivitamin', 35000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) DEFAULT 0,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `kode_obat` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama`, `jenis`, `jumlah`, `harga`) VALUES
('OBT-046H', 'Biosalamin', 'Vitamin & Mineral', '50ml', 54000),
('OBT-04E0', 'Ivomec Super', 'Antiparasit', '50ml', 435000),
('OBT-0S89', 'Potahormon', 'Hormon', '20ml', 150000),
('OBT-1M68', 'Rabisin', 'Vaksin', '10 dosis', 89000),
('OBT-1W21', 'Roxine inj', 'Antibiotik', '50ml', 36500),
('OBT-21E0', 'Colibact inj', 'Antibiotik', '100ml', 140000),
('OBT-21E9', 'Penstrep 4:0,5', 'Antibiotik', '4,5gr', 135000),
('OBT-2H19', 'Calcidex Plus', 'Vitamin & Mineral', '100ml', 61500),
('OBT-2K73', 'Biocan R', 'Vaksin', '10 dosis', 34500),
('OBT-31O2', 'Dovenix', 'Antiparasit', '50ml', 250000),
('OBT-369N', 'VET-OXY SB', 'Antibiotik', '50ml', 40000),
('OBT-44P0', 'Vitamin B 12', 'Vitamin & Mineral', '100ml', 115000),
('OBT-4S61', 'Oxytocin', 'Hormon', '50ml', 74500),
('OBT-517B', 'VET-OXY SB', 'Antibiotik', '100ml', 80000),
('OBT-539S', 'Vitamin B 6', 'Vitamin & Mineral', '50ml', 63000),
('OBT-582T', 'Introvit-E-Selen', 'Vitamin & Mineral', '100ml', 77000),
('OBT-58K6', 'Testohormon', 'Hormon', '30ml', 149000),
('OBT-59B6', 'Primadex', 'Lain-lain', '10ml', 17500),
('OBT-65R3', 'Injectamin', 'Vitamin & Mineral', '50ml', 63000),
('OBT-79Q2', 'XYLA', 'Anastesi', '50ml', 350000),
('OBT-7V16', 'Provestin', 'Hormon', '50ml', 95000),
('OBT-849C', 'Genta-100', 'Antibiotik', '100ml', 118000),
('OBT-93P3', 'Aquaprim', 'Antibiotik', '100ml', 37500),
('OBT-957Y', 'B-Sanplex', 'Vitamin & Mineral', '50ml', 23000),
('OBT-A684', 'Ovalumon', 'Hormon', '20ml', 85000),
('OBT-E098', 'Hematopan B 12', 'Vitamin & Mineral', '50ml', 137500),
('OBT-I546', 'Ketamine 10% Inj', 'Anastesi', '50ml', 40000),
('OBT-K783', 'Folgen Ascarex', 'Antiparasit', '1dosis', 37000),
('OBT-M956', 'Defensor 3', 'Vaksin', '1 dosis', 140000),
('OBT-R744', 'Caprivac AI-K', 'Vaksin', '100 dosis', 256000),
('OBT-W409', 'FEL-O-CELL 3', 'Vaksin', '1 dosis', 175000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_penyakit_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `jenis_penyakit_id`, `nama`) VALUES
('PNY-0G69', 'JP003', 'Hepatitis'),
('PNY-1J25', 'JP003', 'Konjungtur'),
('PNY-20O8', 'JP001', 'Dermatitis'),
('PNY-24Z8', 'JP003', 'Abses'),
('PNY-29F7', 'JP002', 'Rhinotracheitis'),
('PNY-2J90', 'JP002', 'Panleukopenia'),
('PNY-42X9', 'JP003', 'lainnya'),
('PNY-4S03', 'JP003', 'Pneumonia'),
('PNY-51D9', 'JP003', 'Steril Kucing Betina'),
('PNY-65T1', 'JP003', 'Cat Flu'),
('PNY-6F78', 'JP002', 'Calicivirus'),
('PNY-7R48', 'JP003', 'Steril Kucing Jantan'),
('PNY-933Q', 'JP003', 'Helminthiasis'),
('PNY-9F84', 'JP003', 'Enteritis'),
('PNY-9L85', 'JP001', 'Alergi Pakan'),
('PNY-A463', 'JP003', 'Ear Mites / Otitis'),
('PNY-E745', 'JP003', 'Skabies'),
('PNY-G012', 'JP003', 'Bronchitis'),
('PNY-H529', 'JP001', 'Ringworm'),
('PNY-J587', 'JP001', 'Jamur'),
('PNY-K765', 'JP002', 'Distemper'),
('PNY-R068', 'JP002', 'Leptospirosis'),
('PNY-U313', 'JP003', 'Ascites');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `nama`) VALUES
('R01', 'Admin'),
('R02', 'Dokter'),
('R03', 'Pasien');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_lainnya`
--

CREATE TABLE `transaksi_lainnya` (
  `kode_lainnya` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_transaksi` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_lainnya`
--

INSERT INTO `transaksi_lainnya` (`kode_lainnya`, `kode_transaksi`, `nama`, `harga`) VALUES
('TLAIN-56T82', 'INV-2N195P8', 'kateter', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_layanan`
--

CREATE TABLE `transaksi_layanan` (
  `kode_transaksi` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_layanan` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_layanan`
--

INSERT INTO `transaksi_layanan` (`kode_transaksi`, `kode_layanan`) VALUES
('INV-E9W9353', 'LYN-1B11'),
('INV-1S57M14', 'LYN-1B11'),
('INV-2N195P8', 'LYN-1B11'),
('INV-Z4721I5', 'LYN-1B11'),
('INV-Z4721I5', 'LYN-742L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_obat`
--

CREATE TABLE `transaksi_obat` (
  `kode_transaksi` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_obat` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cara_pakai` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_obat`
--

INSERT INTO `transaksi_obat` (`kode_transaksi`, `kode_obat`, `cara_pakai`) VALUES
('INV-E9W9353', 'OBT-93P3', 'suntik'),
('INV-E9W9353', 'OBT-2K73', 'suntik'),
('INV-1S57M14', 'OBT-K783', '1x minum'),
('INV-1S57M14', 'OBT-59B6', 'suntik'),
('INV-2N195P8', 'OBT-21E9', '1x minum'),
('INV-Z4721I5', 'OBT-04E0', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pemeriksaan`
--

CREATE TABLE `transaksi_pemeriksaan` (
  `transaksi_pemeriksaan_id` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokter_id` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_hewan` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suhu` float NOT NULL,
  `berat_badan` float NOT NULL,
  `anamnesa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinical_sign` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `diagnosa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pragnosa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terapi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_harga` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_pemeriksaan`
--

INSERT INTO `transaksi_pemeriksaan` (`transaksi_pemeriksaan_id`, `dokter_id`, `kode_hewan`, `suhu`, `berat_badan`, `anamnesa`, `clinical_sign`, `diagnosa`, `pragnosa`, `terapi`, `total_harga`) VALUES
('INV-1S57M14', 'US-533A7', 'REG9780652', 40, 0.8, 'Diare, nafsu makan berkurang,alopecia pada telinga, lesu', '2020-10-03 07:09:08', 'Enteritis', '1 obat cacing folgen dan primadex 10 ml', NULL, 104500),
('INV-2N195P8', 'US-533A7', 'REG3527882', 30, 1.2, 'bersin bersin', '2020-10-25 14:35:07', 'flu', 'obat flu', 'terapi pernafasan', 215000),
('INV-E9W9353', 'US-533A7', 'REG1735808', 38.6, 2.9, '1 minggu mencret, ada jamur sering garuk bulu rontok, dan 2 hari muntah', '2020-10-02 03:15:03', 'Endoparasit + Enteriris', 'Inj Aquaprim, Inj Biocan', NULL, 122000),
('INV-Z4721I5', 'US-533A7', 'REG3562384', 29, 4.6, 'lesu, tidak bergerak', '2020-10-24 14:46:46', 'virus', 'suntik imun', NULL, 685000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `nama`, `phone`, `alamat`, `username`, `password`) VALUES
('US-249A6', 'R03', 'sri sardina', '087795173363', 'parupuk tabing no 58a', 'sri58', '$2y$10$.MHkAyXm9EdSeMOMjdRqD.8TpjmfVzFW8Q/uuyKAk3RoQhaTttVc2'),
('US-43L93', 'R01', 'Kurnia Fitri Yanti', '081334152778', 'jl. patenggangan no 128 air tawar', 'admin', '$2y$10$glvkxczmgB0ygVbvLFkjO..Gm1b9YfvfdjnKUIniaeFx46IVMCJPe'),
('US-45X73', 'R03', 'Rosliani', '087712345613', 'jl. puruih kabun rt01/011', 'pasien', '$2y$10$BcOY9X3F.Ro4HCCYRZtRT.JRpk2sHjZJkl0i5b/aDsNdAZuhdXWpe'),
('US-533A7', 'R02', 'Drh. Rara', '085263600516', 'jl. veteran no.34', 'dokter', '$2y$10$C1pMwDWL/L5DPq2it.dnG.PEGPYIYN0QCDiPLXYbXn5azHRGzc/Oe'),
('US-69F97', 'R03', 'fajrul hadi', '082289407515', 'bungo mas tahap 1', 'fajrul58', '$2y$10$k6qsw.Yxw0VgwomCO0Ud7.ROVt3erfctYITNuFmxgYHXxueBMLasS'),
('US-8L867', 'R03', 'Rhisma', '083898517711', 'Jl. Taman Siswa no.A11', 'pasien2', '$2y$10$rc7WzbPyywClM13FSnL0TeTvV2D.3M1QpMWjFFtlBHsSgtZ56vHJu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_booking`
--

CREATE TABLE `waktu_booking` (
  `waktu_booking_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_awal` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `status_waktu` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `waktu_booking`
--

INSERT INTO `waktu_booking` (`waktu_booking_id`, `jam_awal`, `jam_akhir`, `status_waktu`) VALUES
('WB-34A', '14:00:00', '15:00:00', 1),
('WB-3Z3', '09:00:00', '10:00:00', 1),
('WB-41M', '20:00:00', '21:00:00', 1),
('WB-44I', '19:00:00', '20:00:00', 1),
('WB-79S', '10:00:00', '11:00:00', 1),
('WB-R39', '15:00:00', '16:00:00', 1),
('WB-T16', '21:00:00', '22:00:00', 1),
('WB-T81', '16:00:00', '17:00:00', 1),
('WB-V92', '11:00:00', '12:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `kode_hewan` (`kode_hewan`),
  ADD KEY `waktu_booking_id` (`waktu_booking_id`);

--
-- Indeks untuk tabel `hewan`
--
ALTER TABLE `hewan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `jenis_hewan_id` (`jenis_hewan_id`);

--
-- Indeks untuk tabel `jenis_hewan`
--
ALTER TABLE `jenis_hewan`
  ADD PRIMARY KEY (`jenis_hewan_id`);

--
-- Indeks untuk tabel `jenis_penyakit`
--
ALTER TABLE `jenis_penyakit`
  ADD PRIMARY KEY (`jenis_penyakit_id`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`kode_layanan`),
  ADD KEY `kode_penyakit` (`kode_penyakit`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengirim_id` (`from`),
  ADD KEY `penerima_id` (`to`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`),
  ADD KEY `jenis_penyakit_id` (`jenis_penyakit_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `transaksi_lainnya`
--
ALTER TABLE `transaksi_lainnya`
  ADD PRIMARY KEY (`kode_lainnya`),
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indeks untuk tabel `transaksi_layanan`
--
ALTER TABLE `transaksi_layanan`
  ADD KEY `kode_transaksi` (`kode_transaksi`) USING BTREE,
  ADD KEY `kode_layanan` (`kode_layanan`);

--
-- Indeks untuk tabel `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indeks untuk tabel `transaksi_pemeriksaan`
--
ALTER TABLE `transaksi_pemeriksaan`
  ADD PRIMARY KEY (`transaksi_pemeriksaan_id`),
  ADD KEY `no_reg` (`kode_hewan`),
  ADD KEY `dokter_id` (`dokter_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `waktu_booking`
--
ALTER TABLE `waktu_booking`
  ADD PRIMARY KEY (`waktu_booking_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `constraint_booking_hewan` FOREIGN KEY (`kode_hewan`) REFERENCES `hewan` (`kode`),
  ADD CONSTRAINT `constraint_waktu_booking` FOREIGN KEY (`waktu_booking_id`) REFERENCES `waktu_booking` (`waktu_booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hewan`
--
ALTER TABLE `hewan`
  ADD CONSTRAINT `constraint_hewan_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `constraint_jenis_hewan` FOREIGN KEY (`jenis_hewan_id`) REFERENCES `jenis_hewan` (`jenis_hewan_id`);

--
-- Ketidakleluasaan untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `constraint_layanan_penyakit` FOREIGN KEY (`kode_penyakit`) REFERENCES `penyakit` (`kode_penyakit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `constraint_chat_penerima` FOREIGN KEY (`to`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `constraint_chat_pengirim` FOREIGN KEY (`from`) REFERENCES `users` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD CONSTRAINT `constraint_penyakit_jenis` FOREIGN KEY (`jenis_penyakit_id`) REFERENCES `jenis_penyakit` (`jenis_penyakit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `transaksi_lainnya`
--
ALTER TABLE `transaksi_lainnya`
  ADD CONSTRAINT `constraint_transaksi` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi_pemeriksaan` (`transaksi_pemeriksaan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_layanan`
--
ALTER TABLE `transaksi_layanan`
  ADD CONSTRAINT `constrain_transaksi_layanan` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi_pemeriksaan` (`transaksi_pemeriksaan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_layanan` FOREIGN KEY (`kode_layanan`) REFERENCES `layanan` (`kode_layanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD CONSTRAINT `constrain_transaksi_obat` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi_pemeriksaan` (`transaksi_pemeriksaan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_transaksi_obat` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_pemeriksaan`
--
ALTER TABLE `transaksi_pemeriksaan`
  ADD CONSTRAINT `constrain_dokter` FOREIGN KEY (`dokter_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `constrain_noreg` FOREIGN KEY (`kode_hewan`) REFERENCES `hewan` (`kode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `constraint_users_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
