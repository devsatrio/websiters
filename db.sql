-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for podomoro
DROP DATABASE IF EXISTS `podomoro`;
CREATE DATABASE IF NOT EXISTS `podomoro` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `podomoro`;

-- Dumping structure for table podomoro.admins
DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idroles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.admins: ~4 rows (approximately)
DELETE FROM `admins`;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `username`, `nama`, `password`, `email`, `alamat`, `telp`, `idroles`, `created_at`, `updated_at`) VALUES
	(1, 'taufiq90', 'Moch Taufiq Perdana', '$2y$10$GbsdqyxvpivhmEjW10PsZua9cv42QNf9.PlEpqCah/W7upWim69p.', 'anakmbarep999@gmail.com', NULL, NULL, '1', NULL, '2019-12-11 15:23:15'),
	(2, '', 'Rido', '$2y$10$2mn3//dIzFrc/3I1I7lT8ut5NEqYp/gIz8sdDOgan2ZFgVywJXtby', 'joy.it.official@gmail.com', NULL, NULL, '3', '2019-12-02 07:20:55', '2019-12-11 15:19:54'),
	(3, '', 'Rahmad', '$2y$10$Tqun3mqHVVZGfID25BpuHeAJbxmgAaKRIUAJwqI2YwVygt2u720ZS', 'rahmad@gmail.com', NULL, NULL, '4', '2019-12-02 07:22:38', '2019-12-02 07:36:31'),
	(5, '', 'Doni', '$2y$10$bZbGjtVL.1ZcR3A4izVe4Om72mxuGrlG47aHLf7tqPe46/3hzFck.', 'ridho.rezky.07@gmail.com', NULL, NULL, '3', '2019-12-11 15:21:35', '2019-12-11 15:21:35');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table podomoro.artikels
DROP TABLE IF EXISTS `artikels`;
CREATE TABLE IF NOT EXISTS `artikels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idsk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif` enum('y','n') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'y',
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.artikels: ~0 rows (approximately)
DELETE FROM `artikels`;
/*!40000 ALTER TABLE `artikels` DISABLE KEYS */;
/*!40000 ALTER TABLE `artikels` ENABLE KEYS */;

-- Dumping structure for table podomoro.barangs
DROP TABLE IF EXISTS `barangs`;
CREATE TABLE IF NOT EXISTS `barangs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keunggulan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penggunaan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harg_pcs` int(11) DEFAULT NULL,
  `harg_pack` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.barangs: ~0 rows (approximately)
DELETE FROM `barangs`;
/*!40000 ALTER TABLE `barangs` DISABLE KEYS */;
INSERT INTO `barangs` (`id`, `kode`, `idk`, `produk`, `deskripsi`, `keunggulan`, `penggunaan`, `harg_pcs`, `harg_pack`, `stok`, `diskon`, `created_at`, `updated_at`) VALUES
	(1, 'SNTART099', '1', 'SENTRAT SUper', '<p>ew</p>', '<p>ew</p>', '<p>w</p>', 300000, 1000000, 300, 0, '2020-01-15 20:21:28', '2020-01-15 20:21:28'),
	(2, 'SNTART09', '1', 'SENTRAT SSP3', '<p>ew</p>', '<p>ew</p>', '<p>w</p>', 300000, 1000000, 10000, 0, '2020-01-15 20:21:28', '2020-01-15 20:21:28');
/*!40000 ALTER TABLE `barangs` ENABLE KEYS */;

-- Dumping structure for table podomoro.barang_kategoris
DROP TABLE IF EXISTS `barang_kategoris`;
CREATE TABLE IF NOT EXISTS `barang_kategoris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` int(11) DEFAULT NULL,
  `paket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_berat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.barang_kategoris: ~0 rows (approximately)
DELETE FROM `barang_kategoris`;
/*!40000 ALTER TABLE `barang_kategoris` DISABLE KEYS */;
INSERT INTO `barang_kategoris` (`id`, `kategori`, `isi`, `paket`, `jenis_berat`, `created_at`, `updated_at`) VALUES
	(1, 'Sentrat', 80, 'Kg', 'Ton', '2020-01-15 05:12:21', '2020-01-15 05:12:21');
/*!40000 ALTER TABLE `barang_kategoris` ENABLE KEYS */;

-- Dumping structure for table podomoro.customers
DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.customers: ~1 rows (approximately)
DELETE FROM `customers`;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `nama`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
	(1, 'Din Joni G', '08623645763', 'jln Pandan aran dsn kletak, Kecamatan mojosari', NULL, '2020-01-24 17:38:40'),
	(3, 'Darmono', '086288322333', 'Jln Mauni', '2020-01-24 17:42:12', '2020-01-24 17:42:12');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table podomoro.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table podomoro.galeris
DROP TABLE IF EXISTS `galeris`;
CREATE TABLE IF NOT EXISTS `galeris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT 'y',
  `disable` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT 'n',
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.galeris: ~0 rows (approximately)
DELETE FROM `galeris`;
/*!40000 ALTER TABLE `galeris` DISABLE KEYS */;
/*!40000 ALTER TABLE `galeris` ENABLE KEYS */;

-- Dumping structure for table podomoro.imgbarangs
DROP TABLE IF EXISTS `imgbarangs`;
CREATE TABLE IF NOT EXISTS `imgbarangs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.imgbarangs: ~2 rows (approximately)
DELETE FROM `imgbarangs`;
/*!40000 ALTER TABLE `imgbarangs` DISABLE KEYS */;
INSERT INTO `imgbarangs` (`id`, `idb`, `nama`, `token`, `created_at`, `updated_at`) VALUES
	(1, '1', '20200115img_coporate.png', NULL, '2020-01-15 20:21:28', '2020-01-15 20:21:28'),
	(2, '1', '20200115WhatsApp Image 2020-01-08 at 15.01.47.jpeg', NULL, '2020-01-15 20:21:28', '2020-01-15 20:21:28'),
	(3, '1', '20200115paint-2985569_1920.jpg', NULL, '2020-01-15 20:21:28', '2020-01-15 20:21:28');
/*!40000 ALTER TABLE `imgbarangs` ENABLE KEYS */;

-- Dumping structure for table podomoro.jabatans
DROP TABLE IF EXISTS `jabatans`;
CREATE TABLE IF NOT EXISTS `jabatans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.jabatans: ~0 rows (approximately)
DELETE FROM `jabatans`;
/*!40000 ALTER TABLE `jabatans` DISABLE KEYS */;
/*!40000 ALTER TABLE `jabatans` ENABLE KEYS */;

-- Dumping structure for table podomoro.karyawans
DROP TABLE IF EXISTS `karyawans`;
CREATE TABLE IF NOT EXISTS `karyawans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `kot_kab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `api_token` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `status` enum('baru','lama','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `tgl_kotrak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `tgl_kotrak_habis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.karyawans: ~0 rows (approximately)
DELETE FROM `karyawans`;
/*!40000 ALTER TABLE `karyawans` DISABLE KEYS */;
/*!40000 ALTER TABLE `karyawans` ENABLE KEYS */;

-- Dumping structure for table podomoro.kategoris
DROP TABLE IF EXISTS `kategoris`;
CREATE TABLE IF NOT EXISTS `kategoris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.kategoris: ~0 rows (approximately)
DELETE FROM `kategoris`;
/*!40000 ALTER TABLE `kategoris` DISABLE KEYS */;
/*!40000 ALTER TABLE `kategoris` ENABLE KEYS */;

-- Dumping structure for table podomoro.laporan_tracks
DROP TABLE IF EXISTS `laporan_tracks`;
CREATE TABLE IF NOT EXISTS `laporan_tracks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tgl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konsumen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.laporan_tracks: ~0 rows (approximately)
DELETE FROM `laporan_tracks`;
/*!40000 ALTER TABLE `laporan_tracks` DISABLE KEYS */;
/*!40000 ALTER TABLE `laporan_tracks` ENABLE KEYS */;

-- Dumping structure for table podomoro.mdetail_trxes
DROP TABLE IF EXISTS `mdetail_trxes`;
CREATE TABLE IF NOT EXISTS `mdetail_trxes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tgl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idTrx` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.mdetail_trxes: ~1 rows (approximately)
DELETE FROM `mdetail_trxes`;
/*!40000 ALTER TABLE `mdetail_trxes` DISABLE KEYS */;
INSERT INTO `mdetail_trxes` (`id`, `tgl`, `idTrx`, `kode_barang`, `barang`, `jenis`, `qty`, `harga`, `subtotal`, `diskon`, `total`, `status`, `admin`, `created_at`, `updated_at`) VALUES
	(9, '2020-01-26 17:52:19', 'PM26012020-1-00001', 'SNTART09', 'SENTRAT SSP3', 'Suplemen', 1, 300000, 300000, 0, 300000, '0', '1', '2020-01-26 17:52:19', '2020-01-26 17:52:19');
/*!40000 ALTER TABLE `mdetail_trxes` ENABLE KEYS */;

-- Dumping structure for table podomoro.mdetail_trx_pakans
DROP TABLE IF EXISTS `mdetail_trx_pakans`;
CREATE TABLE IF NOT EXISTS `mdetail_trx_pakans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tgl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idTrx` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `potongan` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.mdetail_trx_pakans: ~0 rows (approximately)
DELETE FROM `mdetail_trx_pakans`;
/*!40000 ALTER TABLE `mdetail_trx_pakans` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdetail_trx_pakans` ENABLE KEYS */;

-- Dumping structure for table podomoro.menuses
DROP TABLE IF EXISTS `menuses`;
CREATE TABLE IF NOT EXISTS `menuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.menuses: ~7 rows (approximately)
DELETE FROM `menuses`;
/*!40000 ALTER TABLE `menuses` DISABLE KEYS */;
INSERT INTO `menuses` (`id`, `menu`, `created_at`, `updated_at`) VALUES
	(1, 'Role', NULL, NULL),
	(2, 'user', NULL, NULL),
	(3, 'kategori', NULL, NULL),
	(4, 'data', NULL, NULL),
	(5, 'laporan', NULL, NULL),
	(6, 'blog', NULL, NULL),
	(7, 'setting', NULL, NULL),
	(8, 'transaksi', NULL, NULL);
/*!40000 ALTER TABLE `menuses` ENABLE KEYS */;

-- Dumping structure for table podomoro.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.migrations: ~24 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_02_024629_create_admins_table', 1),
	(5, '2019_12_02_045325_create_mroles_table', 1),
	(6, '2019_12_02_045422_create_moduls_table', 1),
	(7, '2019_12_02_045438_create_menuses_table', 1),
	(8, '2019_12_03_031240_create_kategoris_table', 1),
	(9, '2019_12_03_031322_create_artikels_table', 1),
	(10, '2019_12_03_031440_create_sub_kategoris_table', 1),
	(11, '2019_12_07_140621_create_vidtubes_table', 1),
	(12, '2019_12_09_083800_create_galeris_table', 1),
	(13, '2019_12_09_085322_create_settings_table', 1),
	(14, '2019_12_10_115908_create_sliders_table', 1),
	(15, '2019_12_13_135537_create_barang_kategoris_table', 1),
	(16, '2019_12_13_135955_create_barangs_table', 1),
	(17, '2019_12_13_142002_imgbarang', 1),
	(18, '2019_12_20_091209_create_karyawans_table', 1),
	(19, '2019_12_20_185757_create_laporan_tracks_table', 1),
	(20, '2019_12_20_190619_jabatan', 1),
	(21, '2020_01_12_145053_create_m_trxes_table', 2),
	(22, '2020_01_12_145131_create_mdetail_trxes_table', 3),
	(23, '2020_01_12_151631_create_pakans_table', 3),
	(24, '2020_01_12_152218_create_mdetail_trx_pakans_table', 3),
	(25, '2020_01_23_052234_create_customers_table', 4),
	(26, '2020_01_28_132947_create_m_pengeluarans_table', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table podomoro.moduls
DROP TABLE IF EXISTS `moduls`;
CREATE TABLE IF NOT EXISTS `moduls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idrole` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `idmodul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.moduls: ~26 rows (approximately)
DELETE FROM `moduls`;
/*!40000 ALTER TABLE `moduls` DISABLE KEYS */;
INSERT INTO `moduls` (`id`, `idrole`, `idmodul`, `view`, `c`, `r`, `u`, `d`, `created_at`, `updated_at`) VALUES
	(1, '1', '1', 'y', 'y', 'n', 'y', 'y', '2019-12-02 07:54:21', '2019-12-03 02:14:40'),
	(2, '3', '1', 'y', 'y', 'y', 'n', 'n', '2019-12-02 07:55:08', '2019-12-02 08:01:27'),
	(3, '4', '1', 'y', 'y', 'y', 'n', 'n', '2019-12-02 07:55:18', '2019-12-02 08:01:34'),
	(4, '1', '2', 'y', 'y', 'y', 'y', 'y', '2019-12-02 08:48:06', '2019-12-03 03:03:10'),
	(5, '3', '2', 'y', 'n', 'y', 'n', 'n', '2019-12-03 03:05:30', '2019-12-03 03:05:30'),
	(6, '4', '2', 'n', 'n', 'n', 'n', 'n', '2019-12-03 03:05:41', '2019-12-03 03:05:41'),
	(7, '5', '1', 'y', 'n', 'y', 'n', 'n', '2020-01-09 11:00:28', '2020-01-09 11:00:28'),
	(8, '5', '2', 'n', 'n', 'n', 'n', 'n', '2020-01-09 11:00:56', '2020-01-09 11:00:56'),
	(9, '1', '3', 'y', 'y', 'y', 'y', 'y', '2020-01-09 11:01:12', '2020-01-09 11:01:12'),
	(10, '1', '3', 'y', 'y', 'y', 'y', 'y', '2020-01-09 18:41:01', '2020-01-09 18:41:01'),
	(11, '1', '4', 'y', 'y', 'y', 'y', 'y', '2020-01-09 18:41:35', '2020-01-24 19:00:27'),
	(12, '1', '5', 'y', 'y', 'y', 'y', 'y', '2020-01-09 18:41:56', '2020-01-15 05:17:07'),
	(13, '1', '6', 'y', 'y', 'y', 'y', 'y', '2020-01-09 18:42:17', '2020-01-12 14:38:29'),
	(14, '1', '7', 'y', 'y', 'y', 'y', 'y', '2020-01-09 18:42:36', '2020-01-11 21:51:26'),
	(15, '4', '3', 'y', 'n', 'y', 'n', 'n', '2020-01-09 18:42:58', '2020-01-09 18:42:58'),
	(16, '5', '3', 'y', 'y', 'y', 'n', 'n', '2020-01-09 18:43:17', '2020-01-09 18:43:17'),
	(17, '3', '4', 'y', 'n', 'y', 'n', 'n', '2020-01-09 18:43:33', '2020-01-09 18:43:33'),
	(18, '4', '4', 'y', 'n', 'y', 'n', 'n', '2020-01-09 18:43:55', '2020-01-09 18:43:55'),
	(19, '5', '4', 'n', 'n', 'n', 'n', 'n', '2020-01-09 18:44:11', '2020-01-09 18:44:11'),
	(20, '3', '5', 'y', 'n', 'y', 'n', 'n', '2020-01-09 18:45:14', '2020-01-09 18:45:14'),
	(21, '4', '5', 'n', 'n', 'n', 'n', 'n', '2020-01-09 18:45:31', '2020-01-09 18:45:31'),
	(22, '5', '5', 'n', 'n', 'n', 'n', 'n', '2020-01-09 18:45:44', '2020-01-09 18:45:44'),
	(23, '3', '6', 'y', 'y', 'y', 'n', 'n', '2020-01-09 18:46:04', '2020-01-09 18:46:04'),
	(24, '4', '6', 'n', 'n', 'n', 'n', 'n', '2020-01-09 18:46:30', '2020-01-09 18:46:30'),
	(25, '5', '6', 'n', 'n', 'n', 'n', 'n', '2020-01-09 18:46:40', '2020-01-09 18:46:40'),
	(26, '3', '7', 'y', 'n', 'y', 'n', 'n', '2020-01-09 18:47:00', '2020-01-09 18:47:00'),
	(27, '4', '7', 'n', 'n', 'n', 'n', 'n', '2020-01-09 18:47:14', '2020-01-09 18:47:14'),
	(28, '5', '7', 'y', 'y', 'y', 'n', 'n', '2020-01-09 18:47:42', '2020-01-09 18:47:50'),
	(29, '1', '8', 'y', 'y', 'y', 'y', 'y', '2020-01-11 05:16:20', '2020-01-12 14:42:52'),
	(30, '3', '8', 'y', 'y', 'y', 'y', 'y', '2020-01-11 05:16:36', '2020-01-11 05:17:35'),
	(31, '4', '8', 'n', 'n', 'n', 'n', 'n', '2020-01-11 05:16:49', '2020-01-11 05:16:49'),
	(32, '5', '8', 'n', 'n', 'n', 'n', 'n', '2020-01-11 05:17:05', '2020-01-11 05:17:05');
/*!40000 ALTER TABLE `moduls` ENABLE KEYS */;

-- Dumping structure for table podomoro.mroles
DROP TABLE IF EXISTS `mroles`;
CREATE TABLE IF NOT EXISTS `mroles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.mroles: ~3 rows (approximately)
DELETE FROM `mroles`;
/*!40000 ALTER TABLE `mroles` DISABLE KEYS */;
INSERT INTO `mroles` (`id`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', '2019-12-02 06:45:10', '2019-12-02 06:45:10'),
	(3, 'Admin', '2019-12-02 07:18:25', '2019-12-02 07:18:25'),
	(4, 'Editor', '2019-12-02 07:35:58', '2019-12-02 07:35:58'),
	(5, 'owner', '2020-01-09 11:00:13', '2020-01-09 11:00:13');
/*!40000 ALTER TABLE `mroles` ENABLE KEYS */;

-- Dumping structure for table podomoro.m_pengeluarans
DROP TABLE IF EXISTS `m_pengeluarans`;
CREATE TABLE IF NOT EXISTS `m_pengeluarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tgl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penjab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.m_pengeluarans: ~0 rows (approximately)
DELETE FROM `m_pengeluarans`;
/*!40000 ALTER TABLE `m_pengeluarans` DISABLE KEYS */;
INSERT INTO `m_pengeluarans` (`id`, `tgl`, `admin`, `keterangan`, `jumlah`, `penjab`, `created_at`, `updated_at`) VALUES
	(2, '2020-01-28', 'Moch Taufiq Perdana', 'Remak', '400000', 'doni', '2020-01-28 22:26:27', '2020-01-28 22:26:27'),
	(3, '2020-01-29', 'Moch Taufiq Perdana', 'Beli makanan', '500000', 'reni', '2020-01-29 08:56:40', '2020-01-29 08:56:40');
/*!40000 ALTER TABLE `m_pengeluarans` ENABLE KEYS */;

-- Dumping structure for table podomoro.m_trxes
DROP TABLE IF EXISTS `m_trxes`;
CREATE TABLE IF NOT EXISTS `m_trxes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `inv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembeli` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerima` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` int(11) NOT NULL DEFAULT 0,
  `potongan` int(11) NOT NULL DEFAULT 0,
  `diskon` int(11) NOT NULL DEFAULT 0,
  `Total` int(11) NOT NULL DEFAULT 0,
  `Bayar` int(11) NOT NULL DEFAULT 0,
  `Kurang` int(11) NOT NULL DEFAULT 0,
  `Kembali` int(11) NOT NULL DEFAULT 0,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('lunas','belum') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.m_trxes: ~0 rows (approximately)
DELETE FROM `m_trxes`;
/*!40000 ALTER TABLE `m_trxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_trxes` ENABLE KEYS */;

-- Dumping structure for table podomoro.pakans
DROP TABLE IF EXISTS `pakans`;
CREATE TABLE IF NOT EXISTS `pakans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keunggulan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penggunaan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harg_kg` int(11) DEFAULT NULL,
  `harg_ton` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.pakans: ~0 rows (approximately)
DELETE FROM `pakans`;
/*!40000 ALTER TABLE `pakans` DISABLE KEYS */;
/*!40000 ALTER TABLE `pakans` ENABLE KEYS */;

-- Dumping structure for table podomoro.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table podomoro.settings
DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ico` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kokab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `informasi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.settings: ~0 rows (approximately)
DELETE FROM `settings`;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `web`, `ico`, `logo`, `telp1`, `telp2`, `email`, `yt`, `fb`, `ig`, `twitter`, `alamat`, `kokab`, `provinsi`, `motto`, `keterangan`, `informasi`, `map`, `admin`, `created_at`, `updated_at`) VALUES
	(1, 'Podomoro Feedmill', 'ico.svg', 'logo.png', '0863432423423', '0853624732234', 'anakmbarep999@gmail.com', 'https://www.youtube.com/', 'fb', 'ig', 'tw', 'jln pandan aran', 'kediri', 'jawatimur', '<p><span style="font-size: 10pt;">sukses</span></p>', '<p>oke</p>', '<p>osdihfs</p>', '<iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Podomoro%20Feed%20Mill%2C%20Jalan%20Sumber%20Gundi%2C%20RT.01%2FRW.01%2C%20Balekambang%2C%20Tanjung%2C%20Kediri%2C%20Jawa%20Timur&t=&z=13&ie=UTF8&iwloc=&output=embed" fr', NULL, NULL, '2019-12-13 13:46:44');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table podomoro.sliders
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selected` enum('y','n') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n',
  `aktif` enum('y','n') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.sliders: ~0 rows (approximately)
DELETE FROM `sliders`;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;

-- Dumping structure for table podomoro.sub_kategoris
DROP TABLE IF EXISTS `sub_kategoris`;
CREATE TABLE IF NOT EXISTS `sub_kategoris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `subkategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.sub_kategoris: ~0 rows (approximately)
DELETE FROM `sub_kategoris`;
/*!40000 ALTER TABLE `sub_kategoris` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_kategoris` ENABLE KEYS */;

-- Dumping structure for table podomoro.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bisnis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agen` enum('y','n') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `telp`, `alamat`, `kota`, `provinsi`, `foto`, `bisnis`, `agen`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Moch Taufiq Perdana', 'anakmbarep999@gmail.com', NULL, '$2y$10$mSWL47IAIFPNcIUvCOdUE.1E5eBYJ5JKzmga6AmEChha1134O0raC', NULL, NULL, NULL, NULL, NULL, NULL, 'n', NULL, '2019-12-02 03:59:42', '2019-12-02 03:59:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table podomoro.vidtubes
DROP TABLE IF EXISTS `vidtubes`;
CREATE TABLE IF NOT EXISTS `vidtubes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table podomoro.vidtubes: ~0 rows (approximately)
DELETE FROM `vidtubes`;
/*!40000 ALTER TABLE `vidtubes` DISABLE KEYS */;
/*!40000 ALTER TABLE `vidtubes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
