-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2025 at 06:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asset_gtp`
--

-- --------------------------------------------------------

--
-- Table structure for table `asals`
--

CREATE TABLE `asals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asal_asset` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asals`
--

INSERT INTO `asals` (`id`, `asal_asset`, `created_at`, `updated_at`) VALUES
(1, 'APBD', NULL, NULL),
(2, 'DAK', NULL, NULL),
(3, 'DANAIS', NULL, NULL),
(4, 'HADIAH', NULL, NULL),
(5, 'HIBAH', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(255) DEFAULT NULL,
  `jenis_id` bigint(20) UNSIGNED DEFAULT NULL,
  `objek_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `asal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `img_url` text DEFAULT NULL,
  `no_ba_terima` varchar(255) DEFAULT NULL,
  `tgl_ba_terima` date DEFAULT NULL,
  `no_register` varchar(255) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `bahan` varchar(255) DEFAULT NULL,
  `thn_pmbelian` year(4) DEFAULT NULL,
  `pabrik` varchar(255) DEFAULT NULL,
  `rangka` varchar(255) DEFAULT NULL,
  `mesin` varchar(255) DEFAULT NULL,
  `polisi` varchar(255) DEFAULT NULL,
  `bpkb` varchar(255) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `deskripsi_brg` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `opd` varchar(255) DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_transaksi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `klasifikasi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `nama_barang`, `kode_barang`, `jenis_id`, `objek_id`, `kategori_id`, `asal_id`, `img_url`, `no_ba_terima`, `tgl_ba_terima`, `no_register`, `merk`, `bahan`, `thn_pmbelian`, `pabrik`, `rangka`, `mesin`, `polisi`, `bpkb`, `harga`, `deskripsi_brg`, `keterangan`, `opd`, `unit_id`, `jenis_transaksi_id`, `klasifikasi_id`, `status_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Station Wagon tes update', '01.03.02.02.01.01.003', 1, 1, NULL, 1, 'images/1739170322.png', NULL, NULL, '000001', 'Toyota', 'Besi', '2005', NULL, 'MHF 11 KF7000026788', '7K-0259703', 'AB 1131 UH', 'A 8324093 I', 87465000, NULL, 'Mutasi ke DPAD', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 2, 3, NULL, '2025-01-29 07:20:32', '2025-05-16 08:02:38'),
(2, 'Mini Bus ( Penumpang 14 Orang Kebawah ) 2', '01.03.02.02.01.02.003', 1, 1, NULL, 1, NULL, NULL, NULL, '000001', 'Suzuki GC415V APV SDX AT', 'Besi', '2011', NULL, 'MHYGDN42VAJ345075', 'G15AID-215367', 'AB 1885 UA', 'H06062022 I', 193648500, NULL, 'Mobil Unit Paket Buku', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-07-11 14:31:57'),
(3, 'Sepeda Motor', '01.03.02.02.01.04.001', 1, 1, NULL, 1, 'images/1752234100.jpg', NULL, NULL, '000001', 'Honda', 'besi', '2013', '-', 'MH1JBG112DK144670', 'JBG1E-1144458', 'AB 2384 IS', 'K-08114941 I', 15779500, NULL, 'Operasional bidang Layanan', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', 1, NULL, 1, 6, NULL, '2025-01-29 07:20:32', '2025-07-11 11:44:26'),
(4, 'Sepeda Motor', '01.03.02.02.01.04.001', 1, NULL, NULL, 1, NULL, NULL, NULL, '000002', 'Honda', 'Besi', '2013', '-', 'MH1KC5219DK088697', 'KC52E-1089604', 'AB 2380 IS', 'K-08114940 I', 16476600, NULL, 'Operasional Bidang Layanan', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 6, NULL, '2025-01-29 07:20:32', '2025-07-11 12:52:09'),
(5, 'Mobil Unit Perpustakaan Keliling', '01.03.02.02.01.06.008', 2, 2, NULL, 1, 'images/1738994021.jpg', NULL, NULL, '000001', 'Toyota Kijang KF 60', 'Besi', '2025', NULL, 'MHF31KF60-30027238', '7K-0655734', 'AB 1744 UA', 'C 7056174 G', 82000000, NULL, 'Mobil Layanan keliling', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 5, '2025-05-02 06:44:41', '2025-01-29 07:20:32', '2025-05-02 06:44:41'),
(6, 'Mobil Unit Perpustakaan Keliling', '01.03.02.02.01.06.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000001', 'Isuzu ELF ', 'besi', '2007', '', 'MHCNH55EY7J018080', 'M018080', 'AB 7027 IA', 'E9453772 I', 136700000, '', 'Mobil Layanan Keliling', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-07-11 13:03:01'),
(7, 'Mobil Unit Perpustakaan Keliling', '01.03.02.02.01.06.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000001', 'Mitsubishi Colt L300', 'Besi', '2009', '', 'MHMLOWY399K003901', '4D56CE77356', 'AB 8131 UA', 'F8750378 I', 179613280, '', 'Mobil Layanan Keliling', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 6, NULL, '2025-01-29 07:20:32', '2025-07-11 12:52:49'),
(8, 'Mobil Unit Perpustakaan Keliling', '01.03.02.02.01.06.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000001', 'Isuzu NKR 55 E12A', 'Besi', '2010', '', 'MHCNK55EYAJ032761', 'M032761', 'AB 8189 UA', 'H06053765 I', 301901000, '', 'Mobil Layanan Keliling', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-01-29 07:20:32'),
(9, 'Mobil Unit Perpustakaan Keliling', '01.03.02.02.01.06.008', NULL, NULL, NULL, 5, 'images/1738972038.png', NULL, NULL, '000001', 'Toyota Hilux', 'Besi', '2024', NULL, 'MRDAW126380012028', '1TR-6622502', 'AB 8136 UA', 'F 5608409 G', 220175031, NULL, 'Hibah Perpusnas', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-02-07 23:47:18'),
(10, 'Mobil Unit Perpustakaan Keliling', '01.03.02.02.01.06.008', 1, 1, NULL, 5, NULL, NULL, NULL, '000001', 'TOYOTA HILUX', 'BESI', '2024', '-', 'MR0EW8BBXK0208621', '1TRA653485', 'AB 8516 AI', 'T 03235940', 368400000, 'Lain-lain Kendaraan Bermotor Khusus', 'MOBIL PERPUSTAKAAN KELILING HIBAH PERPUSNAS RI', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-02-05 05:58:16'),
(11, 'Rak Besi', '01.03.02.05.01.04.003', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000001', '', 'besi', '2008', '', '', '', '', '', 786500, '', 'Rak Arsip bidang dinamis', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-01-29 07:20:32'),
(12, 'Rak Besi', '01.03.02.05.01.04.003', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000002', '', 'besi', '2008', '', '', '', '', '', 786500, '', 'Rak Arsip bidang dinamis', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-01-29 07:20:32'),
(13, 'Rak Besi', '01.03.02.05.01.04.003', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000003', '', 'besi', '2008', '', '', '', '', '', 786500, '', 'Rak Arsip bidang dinamis', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-01-29 07:20:32'),
(14, 'Rak Besi', '01.03.02.05.01.04.003', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000004', '', 'besi', '2008', '', '', '', '', '', 786500, '', 'Rak Arsip bidang dinamis', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-01-29 07:20:32'),
(15, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000001', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-01-29 07:20:32'),
(16, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000002', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-01-29 07:20:32'),
(17, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000003', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-01-29 07:20:32'),
(18, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000004', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-01-29 07:20:32'),
(19, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000005', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-01-29 07:20:32'),
(20, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000006', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-01-29 07:20:32'),
(21, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000007', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-07-11 12:59:48'),
(22, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000008', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:32', '2025-01-29 07:20:32'),
(23, 'Meja Rapat', '01.03.02.05.02.01.008', 2, 2, NULL, 1, NULL, NULL, NULL, '000009', NULL, 'kayu/kaca', '2004', NULL, NULL, NULL, NULL, NULL, 285000, NULL, 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-02-05 02:12:37'),
(24, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000010', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(25, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000011', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(26, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000012', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(27, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000013', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(28, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000014', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(29, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000015', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(30, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000016', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(31, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000017', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(32, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000018', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(33, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000019', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(34, 'Meja Rapat', '01.03.02.05.02.01.008', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000020', '', 'kayu/kaca', '2004', '', '', '', '', '', 285000, '', 'Meja Rapat eks BKPMD Belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(35, 'Meja 1/2 Biro', '01.03.02.05.02.01.024', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000001', '', 'Kayu', '2006', '', '', '', '', '', 943800, '', 'Arsip Statis', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(36, 'Meja 1/2 Biro', '01.03.02.05.02.01.024', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000002', '', 'Kayu', '2006', '', '', '', '', '', 943800, '', 'Arsip Statis', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(37, 'Meja 1/2 Biro', '01.03.02.05.02.01.024', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000003', '', 'Kayu', '2006', '', '', '', '', '', 943800, '', 'Arsip Statis', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(38, 'Meja 1/2 Biro', '01.03.02.05.02.01.024', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000004', '', 'Kayu', '2006', '', '', '', '', '', 943800, '', 'Arsip Statis', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(39, 'Meja 1/2 Biro', '01.03.02.05.02.01.024', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000005', '', 'Kayu', '2006', '', '', '', '', '', 943800, '', 'Arsip Statis', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(40, 'Meja 1/2 Biro', '01.03.02.05.02.01.024', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000006', '', 'Kayu', '2006', '', '', '', '', '', 943800, '', 'Arsip Statis', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(41, 'Meja 1/2 Biro', '01.03.02.05.02.01.024', 2, 3, NULL, 1, NULL, NULL, NULL, '000007', NULL, 'Kayu', '2006', NULL, NULL, NULL, NULL, NULL, 943800, NULL, 'Arsip Statis', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-02-05 01:59:54'),
(42, 'Meja 1/2 Biro', '01.03.02.05.02.01.024', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000008', '', 'Kayu', '2006', '', '', '', '', '', 943800, '', 'Arsip Statis', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(43, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000001', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(44, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000002', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(45, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000003', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(46, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000004', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(47, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000005', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(48, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000006', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(49, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000007', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(50, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000008', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(51, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000009', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(52, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000010', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(53, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000011', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(54, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000012', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(55, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000013', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(56, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000014', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(57, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000015', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(58, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000016', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(59, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000017', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(60, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000018', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(61, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000019', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(62, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000020', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(63, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000021', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(64, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000022', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(65, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000023', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(66, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000024', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(67, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000025', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(68, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000026', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(69, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000027', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(70, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000028', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(71, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000029', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(72, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000030', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(73, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000031', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(74, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000032', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(75, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000033', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(76, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000034', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(77, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000035', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(78, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000036', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 5, NULL, '2025-01-29 07:20:33', '2025-07-11 13:05:22'),
(79, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000037', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(80, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000038', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(81, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000039', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(82, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000040', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(83, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000041', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(84, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000042', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(85, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000043', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(86, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000044', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(87, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000045', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(88, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000046', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(89, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000047', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(90, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000048', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(91, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000049', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(92, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000050', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(93, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000051', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(94, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000052', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(95, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000053', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(96, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000054', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(97, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000055', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 5, NULL, '2025-01-29 07:20:33', '2025-07-11 13:07:16'),
(98, 'Kursi Rapat', '01.03.02.05.02.01.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000056', '', 'kayu/rotan', '2004', '', '', '', '', '', 174500, '', 'Eks BKPMD belum tercatat dalam buku inventaris', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(99, 'Rak Kayu', '01.03.02.05.02.01.056', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000001', '-', 'kayu', '2022', '-', '-', '-', '-', '-', 4000000, 'Rak Kayu Display koran ', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(100, 'Jam Elektronik', '01.03.02.05.02.02.003', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000001', '#NA', '#NA', '2023', '#NA', '#NA', '#NA', '#NA', '#NA', 2997000, 'Jam Digital Mushola', 'Belanja Jam Digital Jadwal Sholat Masjid/ Mushola', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(101, 'A.C. Window', '01.03.02.05.02.04.003', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000001', 'Gree', '', '2022', '', '', '', '', '', 22715015, 'AC Window Floor Standing', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(102, 'A.C. Window', '01.03.02.05.02.04.003', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000002', 'Gree', '', '2022', '', '', '', '', '', 22715015, 'AC Window Floor Standing', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-07-11 13:21:55'),
(103, 'A.C. Window', '01.03.02.05.02.04.003', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000003', 'Gree', '', '2022', '', '', '', '', '', 22715015, 'AC Window Floor Standing', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(104, 'A.C. Window', '01.03.02.05.02.04.003', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000004', 'Gree', '', '2022', '', '', '', '', '', 22715015, 'AC Window Floor Standing', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(105, 'A.C. Window', '01.03.02.05.02.04.003', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000005', 'Gree', '', '2022', '', '', '', '', '', 22715015, 'AC Window Floor Standing', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(106, 'A.C. Window', '01.03.02.05.02.04.003', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000006', 'Gree', '', '2022', '', '', '', '', '', 22715015, 'AC Window Floor Standing', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(107, 'A.C. Window', '01.03.02.05.02.04.003', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000007', 'Gree', '', '2022', '', '', '', '', '', 22715015, 'AC Window Floor Standing', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(108, 'A.C. Window', '01.03.02.05.02.04.003', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000008', 'Gree', '', '2022', '', '', '', '', '', 22715015, 'AC Window Floor Standing', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(109, 'A.C. Window', '01.03.02.05.02.04.003', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000009', 'Gree', '', '2022', '', '', '', '', '', 22715015, 'AC Window Floor Standing', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(110, 'A.C. Window', '01.03.02.05.02.04.003', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000010', 'Gree', '', '2022', '', '', '', '', '', 22715015, 'AC Window Floor Standing', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(111, 'A.C. Window', '01.03.02.05.02.04.003', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000011', 'Gree', '', '2022', '', '', '', '', '', 22715015, 'AC Window Floor Standing', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(112, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000001', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(113, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000002', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(114, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000003', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(115, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000004', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(116, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000005', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(117, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000006', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(118, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000007', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(119, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000008', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(120, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000009', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(121, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000010', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(122, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000011', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(123, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000012', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(124, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000013', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-07-11 13:08:23'),
(125, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000014', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(126, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000015', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(127, 'A.C. Split', '01.03.02.05.02.04.004', NULL, NULL, NULL, 2, NULL, NULL, NULL, '000016', 'Gree', '', '2022', '', '', '', '', '', 9027240, 'AC Wall Split', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(128, 'Unit Power Supply', '01.03.02.05.02.06.018', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000001', 'UPS Rack APC', 'Besi / Metalik', '2023', '#NA', '#NA', '#NA', '#NA', '#NA', 21220000, 'Unit Power Supply (UPS)', '1 unit UPS di Ruang Server', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(129, 'Lampu', '01.03.02.05.02.06.069', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000001', 'Starlux', '', '2022', '', '', '', '', '', 5214000, 'Lampu spot LED Minaret', '', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(130, 'Lampu', '01.03.02.05.02.06.069', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000002', 'Starlux', '', '2022', '', '', '', '', '', 5214000, 'Lampu spot LED Minaret', '', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(131, 'Lampu', '01.03.02.05.02.06.069', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000003', 'Starlux', '', '2022', '', '', '', '', '', 5214000, 'Lampu spot LED Minaret', '', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(132, 'Lampu', '01.03.02.05.02.06.069', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000004', 'Starlux', '', '2022', '', '', '', '', '', 5214000, 'Lampu spot LED Minaret', '', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(133, 'Camera Digital', '01.03.02.06.01.02.129', NULL, NULL, NULL, 3, NULL, NULL, NULL, '000001', 'Canon EOS 6D Mark II Kit with 24-105mm', 'Mika', '2022', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 45265999, 'Camera Digital (DSLR)', 'Camera Digital Canon EOS 6D Mark II Kit with 24-105mm f/4L IS II USM Lens Danais Tahun 2022', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(134, 'Camera Conference', '01.03.02.06.01.02.166', NULL, NULL, NULL, 3, NULL, NULL, NULL, '000001', 'Logitech Group Video Conference', 'Mika', '2022', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 19374999, 'Camera Conference', 'Camera Conference Logitech Group Video Conference Danais Tahun 2022', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(135, 'Wireless Amplifier', '01.03.02.06.02.06.002', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000001', 'BareTone Profesional Audio', 'Plastik', '2022', '-', '-', '-', '-', '-', 5624000, 'wireless Portable ', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(136, 'Wireless Amplifier', '01.03.02.06.02.06.002', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000002', 'BareTone Profesional Audio', 'Plastik', '2022', '-', '-', '-', '-', '-', 5624000, 'wireless Portable ', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(137, 'Wireless Amplifier', '01.03.02.06.02.06.002', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000003', 'BareTone Profesional Audio', 'Plastik', '2022', '-', '-', '-', '-', '-', 5624000, 'wireless Portable ', '-', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(138, 'P.C Unit', '01.03.02.10.01.02.001', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000001', 'Ienovo', 'Mika', '2012', '', '', '', '', '', 6820000, '', 'All in One PC', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(139, 'Note Book', '01.03.02.10.01.02.003', NULL, NULL, NULL, 3, NULL, NULL, NULL, '000001', 'Lenovo IdeaPad 5 Pro 14ITL6', 'mika', '2022', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 17926500, 'Laptop', 'Lenovo IdeaPad 5 Pro 14ITL6 Danais Tahun 2022', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(140, 'Thermal Imaging Camera', '01.03.02.15.03.02.017', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000001', 'widya Fatmor', 'mika / stainless.', '2022', '', '', '', '', '', 25208100, 'AI Thermal Face  ', '7 unit thermal face ( 5 unit di Grhatama Pustaka ), 1 Unit di JLC  Maliboro dan 1 Unit Di RBM Sewon .', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-30 02:45:37'),
(141, 'Thermal Imaging Camera', '01.03.02.15.03.02.017', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000002', 'widya Fatmor', 'mika / stainless.', '2022', '', '', '', '', '', 25208100, 'AI Thermal Face  ', '7 unit thermal face ( 5 unit di Grhatama Pustaka ), 1 Unit di JLC  Maliboro dan 1 Unit Di RBM Sewon .', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(142, 'Thermal Imaging Camera', '01.03.02.15.03.02.017', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000003', 'widya Fatmor', 'mika / stainless.', '2022', '', '', '', '', '', 25208100, 'AI Thermal Face  ', '7 unit thermal face ( 5 unit di Grhatama Pustaka ), 1 Unit di JLC  Maliboro dan 1 Unit Di RBM Sewon .', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(143, 'Thermal Imaging Camera', '01.03.02.15.03.02.017', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000004', 'widya Fatmor', 'mika / stainless.', '2022', '', '', '', '', '', 25208100, 'AI Thermal Face  ', '7 unit thermal face ( 5 unit di Grhatama Pustaka ), 1 Unit di JLC  Maliboro dan 1 Unit Di RBM Sewon .', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(144, 'Thermal Imaging Camera', '01.03.02.15.03.02.017', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000005', 'widya Fatmor', 'mika / stainless.', '2022', '', '', '', '', '', 25208100, 'AI Thermal Face  ', '7 unit thermal face ( 5 unit di Grhatama Pustaka ), 1 Unit di JLC  Maliboro dan 1 Unit Di RBM Sewon .', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(145, 'Thermal Imaging Camera', '01.03.02.15.03.02.017', NULL, NULL, NULL, 1, NULL, NULL, NULL, '000006', 'widya Fatmor', 'mika / stainless.', '2022', '', '', '', '', '', 25208100, 'AI Thermal Face  ', '7 unit thermal face ( 5 unit di Grhatama Pustaka ), 1 Unit di JLC  Maliboro dan 1 Unit Di RBM Sewon .', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(146, 'Thermal Imaging Camera', '01.03.02.15.03.02.017', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1213', 'widya Fatmor', 'mika / stainless.', '2022', '', '', '', '', '', 25208100, 'AI Thermal Face  ', '7 unit thermal face ( 5 unit di Grhatama Pustaka ), 1 Unit di JLC  Maliboro dan 1 Unit Di RBM Sewon .', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(147, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.017', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1214', 'widya Fatmor', 'mika / stainless.', '2022', NULL, NULL, NULL, NULL, NULL, 25208100, 'AI Thermal Face  ', '7 unit thermal face ( 5 unit di Grhatama Pustaka ), 1 Unit di JLC  Maliboro dan 1 Unit Di RBM Sewon .', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(148, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.017', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1214', 'widya Fatmor', 'mika / stainless.', '2015', NULL, NULL, NULL, NULL, NULL, 25208100, 'AI Thermal Face  ', '7 unit thermal face ( 5 unit di Grhatama Pustaka ), 1 Unit di JLC  Maliboro dan 1 Unit Di RBM Sewon .', '1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(149, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.017', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1215', 'widya Fatmor', 'mika / stainless.', '2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(150, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.018', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1216', 'widya Fatmor', 'mika / stainless.', '2016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(151, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.019', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1217', 'widya Fatmor', 'mika / stainless.', '2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33'),
(152, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.020', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1218', 'widya Fatmor', 'mika / stainless.', '2018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:33', '2025-01-29 07:20:33');
INSERT INTO `assets` (`id`, `nama_barang`, `kode_barang`, `jenis_id`, `objek_id`, `kategori_id`, `asal_id`, `img_url`, `no_ba_terima`, `tgl_ba_terima`, `no_register`, `merk`, `bahan`, `thn_pmbelian`, `pabrik`, `rangka`, `mesin`, `polisi`, `bpkb`, `harga`, `deskripsi_brg`, `keterangan`, `opd`, `unit_id`, `jenis_transaksi_id`, `klasifikasi_id`, `status_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(153, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.021', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1219', 'widya Fatmor', 'mika / stainless.', '2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-02-06 05:18:20'),
(154, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.022', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1220', 'widya Fatmor', 'mika / stainless.', '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(155, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.023', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1221', 'widya Fatmor', 'mika / stainless.', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(156, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.024', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1222', 'widya Fatmor', 'mika / stainless.', '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-02-05 03:00:31'),
(157, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.025', 1, 1, NULL, 1, NULL, NULL, NULL, '1223', 'widya Fatmor', 'mika / stainless.', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-02-05 02:39:27'),
(158, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.026', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1224', 'widya Fatmor', 'mika / stainless.', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(159, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.027', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1225', 'widya Fatmor', 'mika / stainless.', '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(160, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.028', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1226', 'widya Fatmor', 'mika / stainless.', '2026', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-07-11 13:08:28'),
(161, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.029', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1227', 'widya Fatmor', 'mika / stainless.', '2027', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(162, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.030', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1228', 'widya Fatmor', 'mika / stainless.', '2028', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 6, NULL, '2025-01-29 07:20:34', '2025-07-11 12:53:20'),
(163, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.031', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1229', 'widya Fatmor', 'mika / stainless.', '2029', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(164, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.032', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1230', 'widya Fatmor', 'mika / stainless.', '2030', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(165, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.033', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1231', 'widya Fatmor', 'mika / stainless.', '2031', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(166, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.034', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1232', 'widya Fatmor', 'mika / stainless.', '2032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(167, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.035', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1233', 'widya Fatmor', 'mika / stainless.', '2033', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(168, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.036', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1234', 'widya Fatmor', 'mika / stainless.', '2034', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(169, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.037', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1235', 'widya Fatmor', 'mika / stainless.', '2035', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 5, NULL, '2025-01-29 07:20:34', '2025-07-11 13:22:55'),
(170, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.038', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1236', 'widya Fatmor', 'mika / stainless.', '2036', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(171, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.039', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1237', 'widya Fatmor', 'mika / stainless.', '2037', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(172, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.040', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1238', 'widya Fatmor', 'mika / stainless.', '2038', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(173, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.041', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1239', 'widya Fatmor', 'mika / stainless.', '2039', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(174, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.042', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1240', 'widya Fatmor', 'mika / stainless.', '2040', NULL, NULL, NULL, NULL, NULL, 2354417509, '', '', '', NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(175, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.043', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1241', 'widya Fatmor', 'mika / stainless.', '2041', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(176, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.044', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1242', 'widya Fatmor', 'mika / stainless.', '2042', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(177, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.044', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1242', 'widya Fatmor', 'mika / stainless.', '2043', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(178, 'Thermal Imaging Camera testing', '01.03.02.15.03.02.045', NULL, NULL, NULL, 1, NULL, NULL, NULL, '1243', 'widya Fatmor', 'mika / stainless.', '2044', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, '2025-01-29 07:20:34', '2025-01-29 07:20:34'),
(179, 'reredesdas', '123', NULL, NULL, NULL, 5, 'images/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-01-29 07:27:48', '2025-01-29 07:27:48'),
(180, 'qwq', '123', 1, 1, NULL, 5, 'images/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-01-29 07:28:19', '2025-02-06 00:06:10'),
(181, 'asas', '1234', 2, NULL, NULL, 5, 'images/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-01-29 07:32:39', '2025-02-06 10:18:23'),
(182, 'vega', '123', 2, 2, NULL, 4, 'images/1738835579.png', NULL, NULL, NULL, NULL, NULL, '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, NULL, '2025-01-29 07:40:43', '2025-05-02 06:41:27'),
(183, 'vega2', '123', 2, 3, NULL, 1, 'images/1738136486.png', NULL, NULL, NULL, NULL, NULL, '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 3, 3, NULL, '2025-01-29 07:41:26', '2025-02-06 05:14:37'),
(184, 'tes mutasi edit 2ya', '123', 1, 1, NULL, 5, 'images/1738972064.jpg', NULL, NULL, NULL, NULL, 'kertas', '2005', 'honda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, 1, NULL, '2025-01-29 08:32:52', '2025-02-07 23:47:44'),
(185, 'tes gambar', '123', NULL, NULL, NULL, 2, 'images/1738970806.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-01-31 21:42:13', '2025-02-07 23:26:46'),
(186, '22asan aktiva tes bisa', '1234', 2, 4, NULL, 2, 'images/1738970891.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 1, NULL, '2025-01-31 21:43:15', '2025-02-07 23:28:11'),
(187, 'kaoskaki', '321312', NULL, 25, NULL, 1, 'images/1738971758.jpg', NULL, NULL, '123123', 'elephant', 'kaca', '2001', 'sunchang', 'besi', 'asdads', 'asdads', '123123', 200000, 'mantap', 'hehe', '12', 2, NULL, 2, 1, NULL, '2025-02-01 01:37:36', '2025-02-07 23:42:38'),
(188, 'Laptops', '123123', 2, 10, NULL, 2, 'images/1738971685.png', NULL, NULL, '123123', 'levi', 'katun', NULL, 'msg', 'besi', '2tack', 'wiowio', '123123', 200000, 'sheeessh', 'weww', '123123', 3, NULL, 1, 1, NULL, '2025-02-01 02:08:29', '2025-02-07 23:41:25'),
(189, 'asas', '1245', NULL, NULL, NULL, 1, 'images/1738376565.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-02-01 02:22:45', '2025-02-01 02:22:45'),
(190, 'asas', '121', 1, 1, NULL, 1, 'images/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2025-02-01 02:25:23', '2025-02-03 07:10:04'),
(191, 'testing', '126', 3, 17, NULL, 4, 'images/', NULL, NULL, '343', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, 6, NULL, '2025-02-03 07:33:02', '2025-07-11 12:55:12'),
(192, 'testing alat besar', '2323', 2, 2, NULL, 2, 'images/1738970874.jpg', NULL, NULL, '232', NULL, NULL, '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, 1, NULL, '2025-02-03 07:58:58', '2025-02-07 23:27:54'),
(193, 'tes tahun', '1212', 1, 1, NULL, 1, 'images/', NULL, NULL, '1212', NULL, NULL, '2025', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, NULL, '2025-02-03 08:12:21', '2025-02-06 00:49:00'),
(194, '131231wdqw', '13213', 1, 1, NULL, 5, 'images/', NULL, NULL, '1212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, NULL, '2025-02-03 08:27:57', '2025-02-03 08:27:57'),
(195, 'asas', '121', 1, 1, NULL, 4, 'images/', NULL, NULL, '121', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 1, NULL, '2025-02-03 08:28:22', '2025-02-03 08:28:22'),
(196, 'asas', '121', 1, 1, NULL, 5, 'images/', NULL, NULL, '1212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, NULL, '2025-02-03 08:28:46', '2025-02-03 08:28:46'),
(197, 'sa', '1212', 1, 1, NULL, 4, 'images/1739170157.jpg', NULL, NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, NULL, '2025-02-03 08:29:05', '2025-07-11 12:58:50'),
(198, 'tes baru', '123121', 1, 1, NULL, 1, 'images/1738837243.jpg', NULL, NULL, '1212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, NULL, '2025-02-06 10:20:43', '2025-02-06 10:20:43'),
(199, 'tes baru 2', '2432423', 1, NULL, NULL, 2, 'images/1739170506.png', NULL, NULL, '2423', NULL, NULL, '2001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2025-02-06 10:22:00', '2025-02-10 06:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_asset` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenis_asset`, `created_at`, `updated_at`) VALUES
(1, 'Tanah', NULL, NULL),
(2, 'Peralatan dan Mesin', NULL, NULL),
(3, 'Gedung dan Bangunan', NULL, NULL),
(4, 'Jalan, Jaringan dan Irigasi', NULL, NULL),
(5, 'Aset Tetap Lainnya', NULL, NULL),
(6, 'Aset Lainnya', NULL, NULL),
(7, 'Aset Tidak Berwujud', NULL, NULL),
(8, 'Konstruksi Dalam Pengerjaan', NULL, NULL),
(9, 'Kemitraan Dengan Pihak Ketiga', NULL, NULL),
(10, 'Aset Lain-Lain', NULL, NULL),
(11, 'Bukan Aset Pemda', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_transaksis`
--

CREATE TABLE `jenis_transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_tarnsaksi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_asset` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasis`
--

CREATE TABLE `klasifikasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_klasifikasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klasifikasis`
--

INSERT INTO `klasifikasis` (`id`, `nama_klasifikasi`, `created_at`, `updated_at`) VALUES
(1, 'Intra Countable', NULL, NULL),
(2, 'Aktiva Lainnya', NULL, NULL),
(3, 'Pihak ke 3/Kemitraan', NULL, NULL),
(4, 'Extra Countable', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_12_09_161215_create_assets_table', 1),
(7, '2024_12_09_161911_create_jenis_table', 1),
(8, '2024_12_09_164319_create_objek_table', 1),
(9, '2024_12_09_164534_create_kategori_table', 1),
(10, '2024_12_09_164716_create_asal_table', 1),
(11, '2024_12_09_164815_create_status_table', 1),
(12, '2024_12_09_173343_create_unit_table', 1),
(13, '2024_12_09_173548_create_jenis_transaksi_table', 1),
(14, '2024_12_09_173623_create_klasifikasi_table', 1),
(15, '2024_12_09_174432_add_foreign_key_to_assets_table', 1),
(16, '2025_05_03_204432_create_role_table', 2),
(17, '2025_05_15_160037_add_role_id_to_users_table', 3),
(18, '2025_05_15_160038_add_role_id_to_users_table', 4),
(19, '2025_05_15_160039_add_role_id_to_users_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `objeks`
--

CREATE TABLE `objeks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_objek` varchar(255) NOT NULL,
  `jenis_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `objeks`
--

INSERT INTO `objeks` (`id`, `nama_objek`, `jenis_id`, `created_at`, `updated_at`) VALUES
(1, 'Tanah', 1, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(2, 'Alat Besar', 2, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(3, 'Alat Angkutan', 2, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(4, 'Alat Bengkel & Ukur', 2, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(5, 'Alat Pertanian', 2, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(6, 'Alat Kantor dan Rumah Tangga', 2, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(7, 'Alat Studio, Komunikai & Pemancar', 2, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(8, 'Alat Kedokteran & Kesehatan', 2, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(9, 'Alat Laboratorium', 2, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(10, 'Komputer', 2, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(11, 'Rambu-Rambu', 2, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(12, 'Alat Eksplorasi', 2, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(13, 'Alat Pengeboran', 2, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(14, 'Alat Peraga', 2, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(15, 'Alat Olahraga', 2, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(16, 'Alat Permainan', 2, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(17, 'Bangunan Gedung', 3, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(18, 'Monumen', 3, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(19, 'Bangunan Menara', 3, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(20, 'Tugu', 3, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(21, 'Jalan dan Jembatan', 4, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(22, 'Bangunan Air', 4, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(23, 'Instalansi', 4, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(24, 'Jaringan', 4, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(25, 'Bahan Perpustakaan', 5, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(26, 'Barang Bercorak Kesenian/Kebudayaan/Olahraga', 5, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(27, 'Hewan', 5, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(28, 'Tanaman', 5, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(29, 'Barang Koleksi Non Budaya', 5, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(30, 'Aset Tetap Dalam Renovasi', 5, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(31, 'Konstruksi Dalam Pengerjaan', 8, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(32, 'Aset Lainnya', 6, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(33, 'Kemitraan Dengan Pihak Ketiga', 9, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(34, 'Aset Tidak Berwujud', 7, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(35, 'Aset Lain-Lain', 10, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(36, 'Peralatan dan Mesin', 11, '2025-01-29 07:19:59', '2025-01-29 07:19:59'),
(37, 'Lain-lain', 11, '2025-01-29 07:19:59', '2025-01-29 07:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, NULL),
(2, 'pengelola', NULL, NULL, NULL),
(3, 'balai', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_asset` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status_asset`, `created_at`, `updated_at`) VALUES
(1, 'Asset Terkini', NULL, NULL),
(2, 'Asset Mutasi Masuk', NULL, NULL),
(3, 'Asset Mutasi Keluar', NULL, NULL),
(4, 'Asset Perolehan', NULL, NULL),
(5, 'Asset Penghapusan', NULL, NULL),
(6, 'Asset Rusak', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_unit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `nama_unit`, `created_at`, `updated_at`) VALUES
(1, 'Grhatama Pustaka (GTP)', NULL, NULL),
(2, 'Jogja Library Center (JLC)', NULL, NULL),
(3, 'Rumah Belajar Modern (RBM)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'admin@gmail.com', NULL, '$2y$10$URQSgCqusF/1UZbk3CW98.dYgocSfmXM2fP3CIHKKmCf72/U5i7J6', 1, '2025-05-15 10:16:24', '2025-05-15 10:16:24'),
(5, 'vega', 'vega@gmail.com', NULL, '$2y$10$wswIFJmhwAMVlomm42fb6eEvG20oTMswJHPlsOQnY19qwYh6AA4PK', 2, '2025-05-15 10:59:22', '2025-05-15 10:59:22'),
(6, 'staf1', 'staf1@gmail.com', NULL, '$2y$10$BBvLFfHAMasD8Mpj9vdOQOk4Z2Zw6XCCvAkwg4etsyj1FhA.wmV.a', 3, '2025-07-11 13:57:14', '2025-07-11 13:57:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asals`
--
ALTER TABLE `asals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assets_jenis_id_foreign` (`jenis_id`),
  ADD KEY `assets_objek_id_foreign` (`objek_id`),
  ADD KEY `assets_kategori_id_foreign` (`kategori_id`),
  ADD KEY `assets_asal_id_foreign` (`asal_id`),
  ADD KEY `assets_status_id_foreign` (`status_id`),
  ADD KEY `assets_unit_id_foreign` (`unit_id`),
  ADD KEY `assets_jenis_transaksi_id_foreign` (`jenis_transaksi_id`),
  ADD KEY `assets_klasifikasi_id_foreign` (`klasifikasi_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_transaksis`
--
ALTER TABLE `jenis_transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klasifikasis`
--
ALTER TABLE `klasifikasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objeks`
--
ALTER TABLE `objeks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `objeks_jenis_id_foreign` (`jenis_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asals`
--
ALTER TABLE `asals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_transaksis`
--
ALTER TABLE `jenis_transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klasifikasis`
--
ALTER TABLE `klasifikasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `objeks`
--
ALTER TABLE `objeks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_asal_id_foreign` FOREIGN KEY (`asal_id`) REFERENCES `asals` (`id`),
  ADD CONSTRAINT `assets_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`),
  ADD CONSTRAINT `assets_jenis_transaksi_id_foreign` FOREIGN KEY (`jenis_transaksi_id`) REFERENCES `jenis_transaksis` (`id`),
  ADD CONSTRAINT `assets_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`),
  ADD CONSTRAINT `assets_klasifikasi_id_foreign` FOREIGN KEY (`klasifikasi_id`) REFERENCES `klasifikasis` (`id`),
  ADD CONSTRAINT `assets_objek_id_foreign` FOREIGN KEY (`objek_id`) REFERENCES `objeks` (`id`),
  ADD CONSTRAINT `assets_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `assets_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `objeks`
--
ALTER TABLE `objeks`
  ADD CONSTRAINT `objeks_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
