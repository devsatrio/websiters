-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jan 2020 pada 07.37
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `podomoro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idroles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `username`, `nama`, `password`, `email`, `alamat`, `telp`, `idroles`, `created_at`, `updated_at`) VALUES
(1, 'taufiq90', 'Moch Taufiq Perdana', '$2y$10$GbsdqyxvpivhmEjW10PsZua9cv42QNf9.PlEpqCah/W7upWim69p.', 'anakmbarep999@gmail.com', NULL, NULL, '1', NULL, '2019-12-11 08:23:15'),
(2, '', 'Rido', '$2y$10$2mn3//dIzFrc/3I1I7lT8ut5NEqYp/gIz8sdDOgan2ZFgVywJXtby', 'joy.it.official@gmail.com', NULL, NULL, '3', '2019-12-02 00:20:55', '2019-12-11 08:19:54'),
(3, '', 'Rahmad', '$2y$10$Tqun3mqHVVZGfID25BpuHeAJbxmgAaKRIUAJwqI2YwVygt2u720ZS', 'rahmad@gmail.com', NULL, NULL, '4', '2019-12-02 00:22:38', '2019-12-02 00:36:31'),
(5, '', 'Doni', '$2y$10$bZbGjtVL.1ZcR3A4izVe4Om72mxuGrlG47aHLf7tqPe46/3hzFck.', 'ridho.rezky.07@gmail.com', NULL, NULL, '3', '2019-12-11 08:21:35', '2019-12-11 08:21:35'),
(6, NULL, 'satrio', '$2y$10$i/e2V0XdzfM74JbTAL6DE.ttRqgmn9Me1DwppLJvvD3RmmZWfza6y', 'satriosuklun@gmail.com', NULL, NULL, '3', '2020-01-29 11:36:01', '2020-01-29 11:36:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idsk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif` enum('y','n') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'y',
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `artikels`
--

INSERT INTO `artikels` (`id`, `judul`, `link`, `deskripsi`, `isi`, `tgl`, `foto`, `idsk`, `aktif`, `admin`, `counter`, `created_at`, `updated_at`) VALUES
(1, 'artikel satu', 'artikel-satu', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturiLorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturiLorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturiLorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturiLorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturiLorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturiLorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturiLorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</p>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</p>', '2020-01-29 08:20:25', '2020-01-29-6.jpg', '1', 'y', NULL, 12, '2020-01-29 13:21:27', '2020-01-31 06:13:59'),
(2, 'artikel dua', 'artikel-dua', '<p><span style=\"color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center; background-color: #ffffff;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span></p>', '<p><span style=\"color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center; background-color: #ffffff;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center; background-color: #ffffff;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span></p>', '2020-01-30 01:59:57', '2020-01-30-1.jpg', '2', 'y', NULL, 9, '2020-01-30 07:01:43', '2020-01-31 06:04:37'),
(3, 'artikel tiga', 'artikel-tiga', '<p><span style=\"color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center; background-color: #ffffff;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span></p>', '<p><span style=\"color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center; background-color: #ffffff;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center; background-color: #ffffff;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span></p>\r\n<p><span style=\"color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center; background-color: #ffffff;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span></p>\r\n<p><span style=\"color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center; background-color: #ffffff;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span></p>', '2020-01-30 02:01:44', '2020-01-30-2.jpg', '1', 'y', NULL, 4, '2020-01-30 07:02:51', '2020-01-31 06:12:52'),
(4, 'artikel empat', 'artikel-empat', '<p><span style=\"color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center; background-color: #ffffff;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span></p>', '<p><span style=\"color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center; background-color: #ffffff;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span></p>\r\n<p><span style=\"color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center; background-color: #ffffff;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span></p>\r\n<p><span style=\"color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center; background-color: #ffffff;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span></p>\r\n<p><span style=\"color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center; background-color: #ffffff;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span><span style=\"background-color: #ffffff; color: #141414; font-family: Montserrat, sans-serif; font-size: 13px; text-align: center;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi</span></p>', '2020-01-30 02:02:52', '2020-01-30-young-man-searching-for-jobs-vector.jpg', '1', 'y', NULL, 22, '2020-01-30 07:03:36', '2020-01-31 06:04:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `kode`, `idk`, `produk`, `deskripsi`, `keunggulan`, `penggunaan`, `harg_pcs`, `harg_pack`, `stok`, `diskon`, `created_at`, `updated_at`) VALUES
(1, 'SNTART099', '1', 'SENTRAT SUper', '<p>ew</p>', '<p>ew</p>', '<p>w</p>', 300000, 1000000, 300, 0, '2020-01-15 13:21:28', '2020-01-15 13:21:28'),
(2, 'SNTART09', '1', 'SENTRAT SSP3', '<p>ew</p>', '<p>ew</p>', '<p>w</p>', 300000, 1000000, 10000, 0, '2020-01-15 13:21:28', '2020-01-15 13:21:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_kategoris`
--

CREATE TABLE `barang_kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` int(11) DEFAULT NULL,
  `paket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_berat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `nama`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Din Joni G', '08623645763', 'jln Pandan aran dsn kletak, Kecamatan mojosari', NULL, '2020-01-24 10:38:40'),
(3, 'Darmono', '086288322333', 'Jln Mauni', '2020-01-24 10:42:12', '2020-01-24 10:42:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT 'y',
  `disable` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT 'n',
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeris`
--

INSERT INTO `galeris` (`id`, `token`, `nama`, `aktif`, `disable`, `admin`, `created_at`, `updated_at`) VALUES
(5, '0.6979031972061902', '2020-01-29-1.jpg', 'y', 'n', '1', '2020-01-29 13:19:03', '2020-01-29 13:19:03'),
(6, '0.2987292531300241', '2020-01-29-2.jpg', 'y', 'n', '1', '2020-01-29 13:19:03', '2020-01-29 13:19:03'),
(7, '0.6572111057736143', '2020-01-29-3.jpg', 'y', 'n', '1', '2020-01-29 13:19:03', '2020-01-29 13:19:03'),
(8, '0.5886436044062537', '2020-01-29-4.jpg', 'y', 'n', '1', '2020-01-29 13:19:04', '2020-01-29 13:19:04'),
(9, '0.9443020593361999', '2020-01-29-11.jpg', 'y', 'n', '1', '2020-01-29 13:19:04', '2020-01-29 13:19:04'),
(10, '0.9287024383798315', '2020-01-29-12.jpg', 'y', 'n', '1', '2020-01-29 13:19:05', '2020-01-29 13:19:05'),
(11, '0.3399117313123978', '2020-01-30-8.jpg', 'y', 'n', '1', '2020-01-30 06:28:47', '2020-01-30 06:28:47'),
(12, '0.3712168359864514', '2020-01-30-5.jpg', 'y', 'n', '1', '2020-01-30 06:28:47', '2020-01-30 06:28:47'),
(13, '0.024438507065465354', '2020-01-30-13.png', 'y', 'n', '1', '2020-01-30 06:28:47', '2020-01-30 06:28:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `imgbarangs`
--

CREATE TABLE `imgbarangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `imgbarangs`
--

INSERT INTO `imgbarangs` (`id`, `idb`, `nama`, `token`, `created_at`, `updated_at`) VALUES
(1, '1', '20200115img_coporate.png', NULL, '2020-01-15 13:21:28', '2020-01-15 13:21:28'),
(2, '1', '20200115WhatsApp Image 2020-01-08 at 15.01.47.jpeg', NULL, '2020-01-15 13:21:28', '2020-01-15 13:21:28'),
(3, '1', '20200115paint-2985569_1920.jpg', NULL, '2020-01-15 13:21:28', '2020-01-15 13:21:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Layanan', '2020-01-29 12:54:17', '2020-01-31 05:30:00'),
(2, 'Informasi', '2020-01-29 12:55:47', '2020-01-31 05:31:47'),
(3, 'Artikel', '2020-01-29 12:56:52', '2020-01-29 12:56:52'),
(4, 'Fasilitas', '2020-01-29 13:33:33', '2020-01-29 13:33:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_tracks`
--

CREATE TABLE `laporan_tracks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konsumen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mdetail_trxes`
--

CREATE TABLE `mdetail_trxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mdetail_trxes`
--

INSERT INTO `mdetail_trxes` (`id`, `tgl`, `idTrx`, `kode_barang`, `barang`, `jenis`, `qty`, `harga`, `subtotal`, `diskon`, `total`, `status`, `admin`, `created_at`, `updated_at`) VALUES
(9, '2020-01-26 17:52:19', 'PM26012020-1-00001', 'SNTART09', 'SENTRAT SSP3', 'Suplemen', 1, 300000, 300000, 0, 300000, '0', '1', '2020-01-26 10:52:19', '2020-01-26 10:52:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mdetail_trx_pakans`
--

CREATE TABLE `mdetail_trx_pakans` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menuses`
--

CREATE TABLE `menuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menuses`
--

INSERT INTO `menuses` (`id`, `menu`, `created_at`, `updated_at`) VALUES
(1, 'Role', NULL, NULL),
(2, 'user', NULL, NULL),
(3, 'kategori', NULL, NULL),
(4, 'data', NULL, NULL),
(5, 'laporan', NULL, NULL),
(6, 'blog', NULL, NULL),
(7, 'setting', NULL, NULL),
(8, 'transaksi', NULL, NULL);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `moduls`
--

CREATE TABLE `moduls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idrole` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `idmodul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `moduls`
--

INSERT INTO `moduls` (`id`, `idrole`, `idmodul`, `view`, `c`, `r`, `u`, `d`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'y', 'y', 'n', 'y', 'y', '2019-12-02 00:54:21', '2019-12-02 19:14:40'),
(2, '3', '1', 'y', 'n', 'y', 'n', 'n', '2019-12-02 00:55:08', '2020-01-29 11:37:23'),
(3, '4', '1', 'y', 'n', 'y', 'n', 'n', '2019-12-02 00:55:18', '2020-01-29 11:37:18'),
(4, '1', '2', 'y', 'y', 'y', 'y', 'y', '2019-12-02 01:48:06', '2019-12-02 20:03:10'),
(5, '3', '2', 'y', 'n', 'y', 'n', 'n', '2019-12-02 20:05:30', '2019-12-02 20:05:30'),
(6, '4', '2', 'n', 'n', 'n', 'n', 'n', '2019-12-02 20:05:41', '2019-12-02 20:05:41'),
(7, '5', '1', 'y', 'n', 'y', 'n', 'n', '2020-01-09 04:00:28', '2020-01-29 11:37:12'),
(8, '5', '2', 'y', 'n', 'y', 'n', 'n', '2020-01-09 04:00:56', '2020-01-29 11:37:40'),
(9, '1', '3', 'y', 'y', 'y', 'y', 'y', '2020-01-09 04:01:12', '2020-01-09 04:01:12'),
(10, '1', '3', 'y', 'y', 'y', 'y', 'y', '2020-01-09 11:41:01', '2020-01-09 11:41:01'),
(11, '1', '4', 'y', 'y', 'y', 'y', 'y', '2020-01-09 11:41:35', '2020-01-24 12:00:27'),
(12, '1', '5', 'y', 'y', 'y', 'y', 'y', '2020-01-09 11:41:56', '2020-01-14 22:17:07'),
(13, '1', '6', 'y', 'y', 'y', 'y', 'y', '2020-01-09 11:42:17', '2020-01-12 07:38:29'),
(14, '1', '7', 'y', 'y', 'y', 'y', 'y', '2020-01-09 11:42:36', '2020-01-11 14:51:26'),
(15, '4', '3', 'y', 'n', 'y', 'n', 'n', '2020-01-09 11:42:58', '2020-01-09 11:42:58'),
(16, '5', '3', 'y', 'y', 'y', 'n', 'n', '2020-01-09 11:43:17', '2020-01-09 11:43:17'),
(17, '3', '4', 'y', 'n', 'y', 'n', 'n', '2020-01-09 11:43:33', '2020-01-09 11:43:33'),
(18, '4', '4', 'y', 'n', 'y', 'n', 'n', '2020-01-09 11:43:55', '2020-01-09 11:43:55'),
(19, '5', '4', 'n', 'n', 'n', 'n', 'n', '2020-01-09 11:44:11', '2020-01-09 11:44:11'),
(20, '3', '5', 'y', 'n', 'y', 'n', 'n', '2020-01-09 11:45:14', '2020-01-09 11:45:14'),
(21, '4', '5', 'n', 'n', 'n', 'n', 'n', '2020-01-09 11:45:31', '2020-01-09 11:45:31'),
(22, '5', '5', 'n', 'n', 'n', 'n', 'n', '2020-01-09 11:45:44', '2020-01-09 11:45:44'),
(23, '3', '6', 'y', 'y', 'y', 'n', 'n', '2020-01-09 11:46:04', '2020-01-09 11:46:04'),
(24, '4', '6', 'n', 'n', 'n', 'n', 'n', '2020-01-09 11:46:30', '2020-01-09 11:46:30'),
(25, '5', '6', 'n', 'n', 'n', 'n', 'n', '2020-01-09 11:46:40', '2020-01-09 11:46:40'),
(26, '3', '7', 'y', 'n', 'y', 'n', 'n', '2020-01-09 11:47:00', '2020-01-09 11:47:00'),
(27, '4', '7', 'n', 'n', 'n', 'n', 'n', '2020-01-09 11:47:14', '2020-01-09 11:47:14'),
(28, '5', '7', 'y', 'y', 'y', 'n', 'n', '2020-01-09 11:47:42', '2020-01-09 11:47:50'),
(29, '1', '8', 'y', 'y', 'y', 'y', 'y', '2020-01-10 22:16:20', '2020-01-12 07:42:52'),
(30, '3', '8', 'y', 'y', 'y', 'y', 'y', '2020-01-10 22:16:36', '2020-01-10 22:17:35'),
(31, '4', '8', 'n', 'n', 'n', 'n', 'n', '2020-01-10 22:16:49', '2020-01-10 22:16:49'),
(32, '5', '8', 'n', 'n', 'n', 'n', 'n', '2020-01-10 22:17:05', '2020-01-10 22:17:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mroles`
--

CREATE TABLE `mroles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mroles`
--

INSERT INTO `mroles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2019-12-01 23:45:10', '2019-12-01 23:45:10'),
(3, 'Admin', '2019-12-02 00:18:25', '2019-12-02 00:18:25'),
(4, 'Editor', '2019-12-02 00:35:58', '2019-12-02 00:35:58'),
(5, 'owner', '2020-01-09 04:00:13', '2020-01-09 04:00:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pengeluarans`
--

CREATE TABLE `m_pengeluarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penjab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_pengeluarans`
--

INSERT INTO `m_pengeluarans` (`id`, `tgl`, `admin`, `keterangan`, `jumlah`, `penjab`, `created_at`, `updated_at`) VALUES
(2, '2020-01-28', 'Moch Taufiq Perdana', 'Remak', '400000', 'doni', '2020-01-28 15:26:27', '2020-01-28 15:26:27'),
(3, '2020-01-29', 'Moch Taufiq Perdana', 'Beli makanan', '500000', 'reni', '2020-01-29 01:56:40', '2020-01-29 01:56:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_trxes`
--

CREATE TABLE `m_trxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pakans`
--

CREATE TABLE `pakans` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `web`, `ico`, `logo`, `telp1`, `telp2`, `email`, `yt`, `fb`, `ig`, `twitter`, `alamat`, `kokab`, `provinsi`, `motto`, `keterangan`, `informasi`, `map`, `admin`, `created_at`, `updated_at`) VALUES
(1, 'RS Abu Bakar', 'ico.svg', 'logo.png', '0863432423423', '0853624732234', 'anakmbarep999@gmail.com', 'https://www.youtube.com/', 'fb', 'ig', 'tw', 'jln pandan aran', 'kediri', 'jawatimur', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi.</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi.</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam impedit atque molestiae inventore repudiandae ducimus fuga error nisi. Sed reiciendis quos obcaecati mollitia, quae unde doloribus nobis accusamus excepturi.</p>', '<iframe width=\"100%\" height=\"600\" sytle=\"max-width:100%\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=Podomoro%20Feed%20Mill%2C%20Jalan%20Sumber%20Gundi%2C%20RT.01%2FRW.01%2C%20Balekambang%2C%20Tanjung%2C%20Kediri%2C%20Jawa%20Timur&t=&z=13&ie=UTF8&iwloc=&output=embed\"></iframe>', NULL, NULL, '2020-01-30 06:47:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selected` enum('y','n') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n',
  `aktif` enum('y','n') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sliders`
--

INSERT INTO `sliders` (`id`, `token`, `nama`, `deskripsi`, `link`, `selected`, `aktif`, `created_at`, `updated_at`) VALUES
(5, '0.5355582918790673', '2020-01-30-rs1.jpg', '<p>Visit Us</p>', '#', 'n', 'y', '2020-01-30 06:53:35', '2020-01-30 06:54:17'),
(6, '0.7027000250417588', '2020-01-30-rs2.jpg', '<p>RS Abu Bakar</p>', NULL, 'y', 'y', '2020-01-30 06:53:36', '2020-01-30 06:54:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kategoris`
--

CREATE TABLE `sub_kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `subkategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sub_kategoris`
--

INSERT INTO `sub_kategoris` (`id`, `idk`, `subkategori`, `created_at`, `updated_at`) VALUES
(1, '1', 'Pendaftaran Online WA', '2020-01-29 13:01:51', '2020-01-31 05:30:52'),
(2, '1', 'Jasa Raharja', '2020-01-29 13:02:09', '2020-01-31 05:31:31'),
(3, '2', 'Jadwal Dokter', '2020-01-31 05:32:07', '2020-01-31 05:32:07'),
(4, '2', 'Kamar & Ruangan', '2020-01-31 05:33:15', '2020-01-31 05:33:15'),
(5, '3', 'Kabar Terbaru', '2020-01-31 05:34:21', '2020-01-31 05:34:21'),
(6, '3', 'Info Khusus', '2020-01-31 05:34:33', '2020-01-31 05:34:33'),
(8, '4', 'IGD', '2020-01-31 05:35:06', '2020-01-31 05:35:06'),
(9, '4', 'Rawat Jalan', '2020-01-31 05:35:20', '2020-01-31 05:35:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `telp`, `alamat`, `kota`, `provinsi`, `foto`, `bisnis`, `agen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Moch Taufiq Perdana', 'anakmbarep999@gmail.com', NULL, '$2y$10$mSWL47IAIFPNcIUvCOdUE.1E5eBYJ5JKzmga6AmEChha1134O0raC', NULL, NULL, NULL, NULL, NULL, NULL, 'n', NULL, '2019-12-01 20:59:42', '2019-12-01 20:59:42'),
(2, 'deva', 'satriosuklun@gmail.com', NULL, '$2y$10$fzfM30kerX7lVOLOgNXlxOt/A/BKD.JOk1oGvESnJnH58xeMl2v3m', NULL, NULL, NULL, NULL, NULL, NULL, 'n', NULL, '2020-01-29 07:51:08', '2020-01-29 07:51:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vidtubes`
--

CREATE TABLE `vidtubes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vidtubes`
--

INSERT INTO `vidtubes` (`id`, `judul`, `url`, `created_at`, `updated_at`) VALUES
(1, 'vidio pertama', 'https://www.youtube.com/embed/k8Sc1AktaZk', '2020-01-30 03:06:37', '2020-01-30 06:56:09'),
(2, 'vidio kedua', 'https://www.youtube.com/embed/3q5ugWncrHM', '2020-01-30 06:56:59', '2020-01-30 06:56:59'),
(3, 'vidio ketiga', 'https://www.youtube.com/embed/NBrhF77Hqag', '2020-01-30 06:57:41', '2020-01-30 06:57:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_kategoris`
--
ALTER TABLE `barang_kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `imgbarangs`
--
ALTER TABLE `imgbarangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_tracks`
--
ALTER TABLE `laporan_tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mdetail_trxes`
--
ALTER TABLE `mdetail_trxes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mdetail_trx_pakans`
--
ALTER TABLE `mdetail_trx_pakans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menuses`
--
ALTER TABLE `menuses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `moduls`
--
ALTER TABLE `moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mroles`
--
ALTER TABLE `mroles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_pengeluarans`
--
ALTER TABLE `m_pengeluarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_trxes`
--
ALTER TABLE `m_trxes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pakans`
--
ALTER TABLE `pakans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_kategoris`
--
ALTER TABLE `sub_kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `vidtubes`
--
ALTER TABLE `vidtubes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barang_kategoris`
--
ALTER TABLE `barang_kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `imgbarangs`
--
ALTER TABLE `imgbarangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `laporan_tracks`
--
ALTER TABLE `laporan_tracks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mdetail_trxes`
--
ALTER TABLE `mdetail_trxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mdetail_trx_pakans`
--
ALTER TABLE `mdetail_trx_pakans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menuses`
--
ALTER TABLE `menuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `moduls`
--
ALTER TABLE `moduls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `mroles`
--
ALTER TABLE `mroles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `m_pengeluarans`
--
ALTER TABLE `m_pengeluarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `m_trxes`
--
ALTER TABLE `m_trxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pakans`
--
ALTER TABLE `pakans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sub_kategoris`
--
ALTER TABLE `sub_kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `vidtubes`
--
ALTER TABLE `vidtubes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
