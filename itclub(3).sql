-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 10 Bulan Mei 2021 pada 00.07
-- Versi server: 8.0.23-0ubuntu0.20.04.1
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itclub`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_user_menu`
--

CREATE TABLE `access_user_menu` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `access_user_menu`
--

INSERT INTO `access_user_menu` (`id`, `user_id`, `menu_id`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(20, 1, 1, 1, NULL, '2021-03-20 22:33:32', '2021-03-20 22:33:32'),
(21, 1, 2, 1, NULL, '2021-03-20 22:33:32', '2021-03-20 22:33:32'),
(22, 1, 3, 1, NULL, '2021-03-20 22:33:32', '2021-03-20 22:33:32'),
(23, 1, 6, 1, NULL, '2021-03-20 22:33:32', '2021-03-20 22:33:32'),
(24, 1, 7, 1, NULL, '2021-03-20 22:33:32', '2021-03-20 22:33:32'),
(25, 5, 1, 1, NULL, '2021-03-21 01:36:08', '2021-03-21 01:36:08'),
(26, 5, 2, 1, NULL, '2021-03-21 01:36:08', '2021-03-21 01:36:08'),
(27, 5, 3, 1, NULL, '2021-03-21 01:36:08', '2021-03-21 01:36:08'),
(28, 5, 6, 1, NULL, '2021-03-21 01:36:08', '2021-03-21 01:36:08'),
(29, 5, 7, 1, NULL, '2021-03-21 01:36:08', '2021-03-21 01:36:08'),
(30, 21, 1, 1, NULL, '2021-03-22 23:47:18', '2021-03-22 23:47:18'),
(31, 21, 2, 1, NULL, '2021-03-22 23:47:18', '2021-03-22 23:47:18'),
(32, 21, 3, 1, NULL, '2021-03-22 23:47:18', '2021-03-22 23:47:18'),
(33, 21, 6, 1, NULL, '2021-03-22 23:47:18', '2021-03-22 23:47:18'),
(34, 21, 7, 1, NULL, '2021-03-22 23:47:18', '2021-03-22 23:47:18'),
(35, 1, 8, 1, NULL, '2021-03-23 07:28:15', '2021-03-23 07:28:15'),
(36, 1, 10, 1, NULL, '2021-03-23 23:42:45', '2021-03-23 23:42:45'),
(37, 1, 11, 1, NULL, '2021-03-25 03:00:56', '2021-03-25 03:00:56'),
(38, 1, 12, 1, NULL, '2021-03-25 23:30:55', '2021-03-25 23:30:55'),
(39, 1, 13, 1, NULL, '2021-03-26 01:57:59', '2021-03-26 01:57:59'),
(40, 1, 14, 1, NULL, '2021-03-27 07:28:11', '2021-03-27 07:28:11'),
(41, 1, 15, 1, NULL, '2021-04-01 08:56:08', '2021-04-01 08:56:08'),
(42, 1, 16, 1, NULL, '2021-04-12 11:58:49', '2021-04-12 11:58:49'),
(43, 1, 17, 1, NULL, '2021-05-09 05:37:52', '2021-05-09 05:37:52'),
(44, 1, 18, 1, NULL, '2021-05-09 06:11:08', '2021-05-09 06:11:08'),
(45, 1, 21, 1, NULL, '2021-05-09 06:24:51', '2021-05-09 06:24:51'),
(46, 1, 22, 1, NULL, '2021-05-09 06:24:54', '2021-05-09 06:24:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_user_section`
--

CREATE TABLE `access_user_section` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `section_id` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `access_user_section`
--

INSERT INTO `access_user_section` (`id`, `user_id`, `section_id`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(17, 1, 2, 1, '2021-03-21 00:42:10', '2021-03-20 22:33:32', '2021-03-21 00:42:10'),
(18, 1, 3, 1, NULL, '2021-03-20 22:33:32', '2021-03-20 22:33:32'),
(19, 1, 6, 1, NULL, '2021-03-20 22:33:32', '2021-03-20 22:33:32'),
(20, 1, 2, 1, '2021-03-21 00:42:18', '2021-03-21 00:42:16', '2021-03-21 00:42:18'),
(21, 1, 2, 1, NULL, '2021-03-21 00:42:24', '2021-03-21 00:42:24'),
(22, 5, 2, 1, '2021-03-21 01:36:08', '2021-03-21 01:36:05', '2021-03-21 01:36:08'),
(23, 5, 2, 1, NULL, '2021-03-21 01:36:08', '2021-03-21 01:36:08'),
(24, 5, 3, 1, NULL, '2021-03-21 01:36:08', '2021-03-21 01:36:08'),
(25, 5, 6, 1, NULL, '2021-03-21 01:36:08', '2021-03-21 01:36:08'),
(26, 21, 3, 1, NULL, '2021-03-22 23:47:18', '2021-03-22 23:47:18'),
(27, 21, 6, 1, NULL, '2021-03-22 23:47:18', '2021-03-22 23:47:18'),
(28, 21, 2, 1, NULL, '2021-03-22 23:47:18', '2021-03-22 23:47:18'),
(29, 22, 2, 1, NULL, '2021-03-23 23:49:31', '2021-03-23 23:49:31'),
(30, 1, 7, 1, NULL, '2021-04-01 08:56:03', '2021-04-01 08:56:03'),
(31, 1, 8, 1, NULL, '2021-05-09 06:24:46', '2021-05-09 06:24:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_user_submenu`
--

CREATE TABLE `access_user_submenu` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `submenu_id` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `access_user_submenu`
--

INSERT INTO `access_user_submenu` (`id`, `user_id`, `submenu_id`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(19, 1, 1, 1, NULL, '2021-03-20 22:33:32', '2021-03-20 22:33:32'),
(20, 1, 2, 1, NULL, '2021-03-20 22:33:32', '2021-03-20 22:33:32'),
(21, 1, 3, 1, NULL, '2021-03-20 22:33:32', '2021-03-20 22:33:32'),
(22, 1, 4, 1, NULL, '2021-03-20 22:33:32', '2021-03-20 22:33:32'),
(23, 1, 6, 1, NULL, '2021-03-20 22:33:32', '2021-03-20 22:33:32'),
(24, 1, 7, 1, NULL, '2021-03-20 22:33:32', '2021-03-20 22:33:32'),
(25, 5, 1, 1, NULL, '2021-03-21 01:36:08', '2021-03-21 01:36:08'),
(26, 5, 2, 1, NULL, '2021-03-21 01:36:08', '2021-03-21 01:36:08'),
(27, 5, 3, 1, NULL, '2021-03-21 01:36:08', '2021-03-21 01:36:08'),
(28, 5, 4, 1, NULL, '2021-03-21 01:36:08', '2021-03-21 01:36:08'),
(29, 5, 6, 1, NULL, '2021-03-21 01:36:08', '2021-03-21 01:36:08'),
(30, 5, 7, 1, NULL, '2021-03-21 01:36:08', '2021-03-21 01:36:08'),
(31, 21, 1, 1, NULL, '2021-03-22 23:47:18', '2021-03-22 23:47:18'),
(32, 21, 2, 1, NULL, '2021-03-22 23:47:18', '2021-03-22 23:47:18'),
(33, 21, 3, 1, NULL, '2021-03-22 23:47:18', '2021-03-22 23:47:18'),
(34, 21, 4, 1, NULL, '2021-03-22 23:47:18', '2021-03-22 23:47:18'),
(35, 21, 6, 1, NULL, '2021-03-22 23:47:18', '2021-03-22 23:47:18'),
(36, 21, 7, 1, NULL, '2021-03-22 23:47:18', '2021-03-22 23:47:18'),
(37, 1, 8, 1, NULL, '2021-03-23 23:44:54', '2021-03-23 23:44:54'),
(38, 1, 9, 1, NULL, '2021-03-24 23:37:27', '2021-03-24 23:37:27'),
(39, 1, 10, 1, NULL, '2021-03-25 03:03:21', '2021-03-25 03:03:21'),
(40, 1, 11, 1, NULL, '2021-03-25 07:04:50', '2021-03-25 07:04:50'),
(41, 1, 12, 1, NULL, '2021-03-27 00:11:39', '2021-03-27 00:11:39'),
(42, 1, 13, 1, NULL, '2021-03-27 00:39:01', '2021-03-27 00:39:01'),
(43, 1, 14, 1, NULL, '2021-04-01 08:58:44', '2021-04-01 08:58:44'),
(44, 1, 15, 1, NULL, '2021-04-12 12:01:12', '2021-04-12 12:01:12'),
(45, 1, 16, 1, NULL, '2021-04-12 12:32:13', '2021-04-12 12:32:13'),
(46, 1, 17, 1, NULL, '2021-04-12 13:28:46', '2021-04-12 13:28:46'),
(47, 1, 18, 1, NULL, '2021-04-14 06:23:46', '2021-04-14 06:23:46'),
(48, 1, 19, 1, NULL, '2021-04-14 07:45:25', '2021-04-14 07:45:25'),
(49, 1, 21, 1, NULL, '2021-04-14 07:51:28', '2021-04-14 07:51:28'),
(50, 1, 23, 1, NULL, '2021-04-14 08:27:17', '2021-04-14 08:27:17'),
(51, 1, 22, 1, NULL, '2021-04-14 08:27:21', '2021-04-14 08:27:21'),
(52, 1, 24, 1, NULL, '2021-04-16 08:16:48', '2021-04-16 08:16:48'),
(53, 1, 25, 1, NULL, '2021-05-09 05:37:57', '2021-05-09 05:37:57'),
(54, 1, 26, 1, NULL, '2021-05-09 06:24:59', '2021-05-09 06:24:59'),
(55, 1, 27, 1, NULL, '2021-05-09 06:25:03', '2021-05-09 06:25:03'),
(56, 1, 28, 1, NULL, '2021-05-09 09:40:01', '2021-05-09 09:40:01'),
(57, 1, 29, 1, NULL, '2021-05-09 14:32:35', '2021-05-09 14:32:35'),
(58, 1, 30, 1, NULL, '2021-05-09 14:58:19', '2021-05-09 14:58:19'),
(59, 1, 31, 1, NULL, '2021-05-09 15:27:57', '2021-05-09 15:27:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `activities`
--

CREATE TABLE `activities` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `url_access` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `browser` char(25) NOT NULL,
  `code_activity` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `url_access`, `description`, `browser`, `code_activity`, `created_at`, `deleted_at`) VALUES
(1, 1, '/api/v1/alumni/delete', 'menghapus data alumni', 'Mozilla Firefox', '104102137167', '2021-04-10 07:27:57', NULL),
(2, 1, '/api/v1/gallery/delete', 'menghapus data gallery', 'Mozilla Firefox', '104102140313', '2021-04-10 07:37:15', NULL),
(3, 1, '/api/v1/gallery/insert', 'menambah data gallery', 'Mozilla Firefox', '104102141510', '2021-04-10 07:38:06', NULL),
(4, 1, '/api/v1/imageDivision/delete', 'menghapus data image Division', 'Mozilla Firefox', '10410211982', '2021-04-10 07:41:49', NULL),
(5, 1, '/api/v1/prestation/delete', 'menghapus data prestasi', 'Mozilla Firefox', '104102129571', '2021-04-10 08:06:05', NULL),
(6, 1, '/api/v1/prestation/insert', 'menambah data prestasi', 'Mozilla Firefox', '104102141391', '2021-04-10 08:06:35', NULL),
(7, 1, '/api/v1/prestation/update', 'mengedit data prestasi', 'Mozilla Firefox', '10410214655', '2021-04-10 08:06:47', NULL),
(8, 1, '/api/v1/division/update', 'mengedit data divisi', 'Mozilla Firefox', '104102132731', '2021-04-10 08:07:17', NULL),
(9, 1, '/api/v1/division/update', 'mengedit data divisi', 'Mozilla Firefox', '104102134363', '2021-04-10 08:07:27', NULL),
(10, 1, '/api/v1/alumni/insert', 'menambah data alumni', 'Mozilla Firefox', '104102112503', '2021-04-10 08:32:50', NULL),
(11, 1, '/api/v1/alumni/update', 'mengedit data alumni', 'Mozilla Firefox', '10410217946', '2021-04-10 08:46:20', NULL),
(12, 1, '/api/v1/alumni/delete', 'menghapus data alumni', 'Mozilla Firefox', '10411212654', '2021-04-11 05:01:41', NULL),
(13, 1, '/api/v1/member/delete', 'menghapus data member', 'Mozilla Firefox', '104112110890', '2021-04-11 05:23:31', NULL),
(14, 1, '/api/v1/division/delete', 'menghapus data divisi', 'Mozilla Firefox', '104112129665', '2021-04-11 05:51:17', NULL),
(15, 1, '/api/v1/member/update', 'mengedit data member', 'Mozilla Firefox', '104112124297', '2021-04-11 07:50:21', NULL),
(16, 1, '/api/v1/gallery/delete', 'menghapus data gallery', 'Mozilla Firefox', '104112137887', '2021-04-11 08:10:46', NULL),
(17, 1, '/api/v1/imageGallery/insert', 'menambah data image Gallery', 'Mozilla Firefox', '104112121019', '2021-04-11 08:18:33', NULL),
(18, 1, '/api/v1/imageGallery/delete', 'menghapus data image Gallery', 'Mozilla Firefox', '104112134753', '2021-04-11 08:18:49', NULL),
(19, 1, '/api/v1/prestation/delete', 'menghapus data prestasi', 'Mozilla Firefox', '10411212685', '2021-04-11 08:29:06', NULL),
(20, 1, '/api/v1/member/insert', 'menambah data member', 'Mozilla Firefox', '10411214235', '2021-04-11 08:29:47', NULL),
(21, 1, '/api/v1/member/delete', 'menghapus data member', 'Mozilla Firefox', '104112111624', '2021-04-11 08:29:55', NULL),
(22, 1, '/api/v1/trash/prestation/recovery', 'merecovery data sampah prestation', 'Mozilla Firefox', '10412219364', '2021-04-12 12:03:47', NULL),
(23, 1, '/api/v1/trash/prestation/delete', 'menghapus data sampah prestation', 'Mozilla Firefox', '104122137203', '2021-04-12 12:03:52', NULL),
(24, 1, '/api/v1/prestation/delete', 'menghapus data prestasi', 'Mozilla Firefox', '104122110003', '2021-04-12 12:11:28', NULL),
(25, 1, '/api/v1/trash/prestation/delete', 'menghapus data sampah prestation', 'Mozilla Firefox', '104122116566', '2021-04-12 12:11:51', NULL),
(26, 1, '/api/v1/trash/division/recovery', 'merecovery data sampah divisi', 'Mozilla Firefox', '104122112653', '2021-04-12 12:49:44', NULL),
(27, 1, '/api/v1/trash/imageDivision/recovery', 'merecovery data sampah image divisi', 'Mozilla Firefox', '10412216360', '2021-04-12 13:51:42', NULL),
(28, 1, '/api/v1/division/delete', 'menghapus data divisi', 'Mozilla Firefox', '104122134862', '2021-04-12 13:52:14', NULL),
(29, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104122121298', '2021-04-12 13:52:51', NULL),
(30, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '10412211796', '2021-04-12 13:52:54', NULL),
(31, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104122138815', '2021-04-12 13:55:15', NULL),
(32, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104122132726', '2021-04-12 13:56:16', NULL),
(33, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104122131732', '2021-04-12 13:57:20', NULL),
(34, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104122136653', '2021-04-12 13:58:44', NULL),
(35, 1, '/api/v1/trash/division/recovery', 'merecovery data sampah divisi', 'Mozilla Firefox', '104122121696', '2021-04-12 13:59:31', NULL),
(36, 1, '/api/v1/trash/imageDivision/recovery', 'merecovery data sampah image divisi', 'Mozilla Firefox', '104122138854', '2021-04-12 13:59:58', NULL),
(37, 1, '/api/v1/trash/imageDivision/delete', 'menghapus data sampah image divisi', 'Mozilla Firefox', '104122139292', '2021-04-12 14:00:01', NULL),
(38, 1, '/api/v1/division/delete', 'menghapus data divisi', 'Mozilla Firefox', '104132138199', '2021-04-13 09:10:25', NULL),
(39, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '10413217674', '2021-04-13 09:10:37', NULL),
(40, 1, '/api/v1/imageDivision/insert', 'menambah data image Division', 'Mozilla Firefox', '10414211793', '2021-04-14 03:19:39', NULL),
(41, 1, '/api/v1/division/delete', 'menghapus data divisi', 'Mozilla Firefox', '104142141252', '2021-04-14 03:19:55', NULL),
(42, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104142139350', '2021-04-14 03:20:45', NULL),
(43, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104142126601', '2021-04-14 03:21:32', NULL),
(44, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104142112812', '2021-04-14 03:24:00', NULL),
(45, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104142141893', '2021-04-14 03:29:49', NULL),
(46, 1, '/api/v1/division/insert', 'menambah data divisi', 'Mozilla Firefox', '104142131093', '2021-04-14 03:50:58', NULL),
(47, 1, '/api/v1/division/insert', 'menambah data divisi', 'Mozilla Firefox', '10414218985', '2021-04-14 03:51:19', NULL),
(48, 1, '/api/v1/division/delete', 'menghapus data divisi', 'Mozilla Firefox', '104142134562', '2021-04-14 03:51:59', NULL),
(49, 1, '/api/v1/division/delete', 'menghapus data divisi', 'Mozilla Firefox', '104142133953', '2021-04-14 03:52:07', NULL),
(50, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104142126208', '2021-04-14 03:54:14', NULL),
(51, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '10414213594', '2021-04-14 03:58:22', NULL),
(52, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104142136871', '2021-04-14 04:13:25', NULL),
(53, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104142111212', '2021-04-14 04:14:32', NULL),
(54, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '10414217641', '2021-04-14 04:15:09', NULL),
(55, 1, '/api/v1/trash/division/recovery', 'merecovery data sampah divisi', 'Mozilla Firefox', '104142114578', '2021-04-14 04:16:12', NULL),
(56, 1, '/api/v1/division/delete', 'menghapus data divisi', 'Mozilla Firefox', '104142131947', '2021-04-14 04:21:03', NULL),
(57, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104142130713', '2021-04-14 04:22:12', NULL),
(58, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104142113372', '2021-04-14 04:25:01', NULL),
(59, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104142112523', '2021-04-14 04:26:26', NULL),
(60, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '10414217927', '2021-04-14 04:26:51', NULL),
(61, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104142134018', '2021-04-14 04:38:07', NULL),
(62, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104142113154', '2021-04-14 04:41:54', NULL),
(63, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104142121080', '2021-04-14 04:42:15', NULL),
(64, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104142135462', '2021-04-14 04:44:41', NULL),
(65, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104142131971', '2021-04-14 04:48:10', NULL),
(66, 1, '/api/v1/alumni/insert', 'menambah data alumni', 'Mozilla Firefox', '104142124943', '2021-04-14 05:37:02', NULL),
(67, 1, '/api/v1/trash/alumni/delete', 'menghapus data sampah image divisi', 'Mozilla Firefox', '104142114041', '2021-04-14 06:27:57', NULL),
(68, 1, '/api/v1/trash/alumni/recovery', 'merecovery data sampah image divisi', 'Mozilla Firefox', '104142137154', '2021-04-14 06:28:31', NULL),
(69, 1, '/api/v1/trash/division/recovery', 'merecovery data sampah divisi', 'Mozilla Firefox', '104142112723', '2021-04-14 06:36:20', NULL),
(70, 1, '/api/v1/trash/gallery/delete', 'menghapus data sampah gallery', 'Mozilla Firefox', '10414212759', '2021-04-14 07:47:50', NULL),
(71, 1, '/api/v1/trash/gallery/recovery', 'merecovery data sampah gallery', 'Mozilla Firefox', '104142129889', '2021-04-14 07:47:53', NULL),
(72, 1, '/api/v1/trash/imageGallery/recovery', 'merecovery data sampah image gallery', 'Mozilla Firefox', '104142115178', '2021-04-14 08:05:24', NULL),
(73, 1, '/api/v1/trash/imageGallery/recovery', 'merecovery data sampah image gallery', 'Mozilla Firefox', '104142137194', '2021-04-14 08:05:33', NULL),
(74, 1, '/api/v1/trash/imageGallery/delete', 'menghapus data sampah image gallery', 'Mozilla Firefox', '104142117112', '2021-04-14 08:05:37', NULL),
(75, 1, '/api/v1/trash/category/recovery', 'merecovery data sampah category', 'Mozilla Firefox', '10414216011', '2021-04-14 08:34:53', NULL),
(76, 1, '/api/v1/trash/member/delete', 'menghapus data sampah member', 'Mozilla Firefox', '104142122817', '2021-04-14 08:39:55', NULL),
(77, 1, '/api/v1/trash/member/recovery', 'merecovery data sampah member', 'Mozilla Firefox', '104142119369', '2021-04-14 08:40:02', NULL),
(78, 1, '/api/v1/trash/imageDivision/recovery', 'merecovery data sampah image divisi', 'Mozilla Firefox', '104152113680', '2021-04-15 07:13:10', NULL),
(79, 1, '/api/v1/division/update', 'mengedit data divisi', 'Mozilla Firefox', '104152121131', '2021-04-15 07:14:25', NULL),
(80, 1, '/api/v1/division/delete', 'menghapus data divisi', 'Mozilla Firefox', '10415215266', '2021-04-15 07:53:39', NULL),
(81, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104152126524', '2021-04-15 07:53:54', NULL),
(82, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104152131985', '2021-04-15 07:54:06', NULL),
(83, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104152110803', '2021-04-15 07:54:30', NULL),
(84, 1, '/api/v1/division/insert', 'menambah data divisi', 'Mozilla Firefox', '104152136713', '2021-04-15 07:56:58', NULL),
(85, 1, '/api/v1/imageDivision/insert', 'menambah data image Division', 'Mozilla Firefox', '10415212530', '2021-04-15 07:57:23', NULL),
(86, 1, '/api/v1/division/delete', 'menghapus data divisi', 'Mozilla Firefox', '10415217239', '2021-04-15 07:57:35', NULL),
(87, 1, '/api/v1/trash/imageDivision/delete', 'menghapus data sampah image divisi', 'Mozilla Firefox', '104152134588', '2021-04-15 07:58:06', NULL),
(88, 1, '/api/v1/division/insert', 'menambah data divisi', 'Mozilla Firefox', '10415217443', '2021-04-15 07:59:26', NULL),
(89, 1, '/api/v1/imageDivision/insert', 'menambah data image Division', 'Mozilla Firefox', '104152135732', '2021-04-15 07:59:41', NULL),
(90, 1, '/api/v1/division/delete', 'menghapus data divisi', 'Mozilla Firefox', '104152140545', '2021-04-15 07:59:54', NULL),
(91, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104152122192', '2021-04-15 08:00:19', NULL),
(92, 1, '/api/v1/trash/division/recovery', 'merecovery data sampah divisi', 'Mozilla Firefox', '104152138239', '2021-04-15 08:11:29', NULL),
(93, 1, '/api/v1/division/delete', 'menghapus data divisi', 'Mozilla Firefox', '104152113633', '2021-04-15 08:13:35', NULL),
(94, 1, '/api/v1/division/delete', 'menghapus data divisi', 'Mozilla Firefox', '104152136503', '2021-04-15 08:13:41', NULL),
(95, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104152124738', '2021-04-15 08:13:58', NULL),
(96, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104152132164', '2021-04-15 08:16:28', NULL),
(97, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104152126157', '2021-04-15 08:16:40', NULL),
(98, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104152125039', '2021-04-15 08:23:17', NULL),
(99, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104152110394', '2021-04-15 08:23:53', NULL),
(100, 1, '/api/v1/trash/division/recovery', 'merecovery data sampah divisi', 'Mozilla Firefox', '10415216030', '2021-04-15 08:26:01', NULL),
(101, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104152132557', '2021-04-15 08:39:39', NULL),
(102, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104152116242', '2021-04-15 08:40:26', NULL),
(103, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104152136536', '2021-04-15 08:44:11', NULL),
(104, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104152116233', '2021-04-15 08:54:44', NULL),
(105, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104152129200', '2021-04-15 09:29:09', NULL),
(106, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104152120169', '2021-04-15 09:29:53', NULL),
(107, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104162121186', '2021-04-16 07:00:44', NULL),
(108, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104162114620', '2021-04-16 07:10:04', NULL),
(109, 1, '/api/v1/imageDivision/insert', 'menambah data image Division', 'Mozilla Firefox', '104162115741', '2021-04-16 07:36:20', NULL),
(110, 1, '/api/v1/division/delete', 'menghapus data divisi', 'Mozilla Firefox', '104162136948', '2021-04-16 07:36:38', NULL),
(111, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104162136309', '2021-04-16 07:36:57', NULL),
(112, 1, '/api/v1/trash/user/delete', 'menghapus data sampah user', 'Mozilla Firefox', '104162114658', '2021-04-16 08:27:36', NULL),
(113, 1, '/api/v1/trash/user/recovery', 'merecovery data sampah user', 'Mozilla Firefox', '104162126108', '2021-04-16 08:31:09', NULL),
(114, 1, '/api/v1/division/insert', 'menambah data divisi', 'Mozilla Firefox', '104162136604', '2021-04-16 09:10:53', NULL),
(115, 1, '/api/v1/member/insert', 'menambah data member', 'Mozilla Firefox', '104162120438', '2021-04-16 09:18:22', NULL),
(116, 1, '/api/v1/imageDivision/insert', 'menambah data image Division', 'Mozilla Firefox', '10417212155', '2021-04-17 03:14:40', NULL),
(117, 1, '/api/v1/imageDivision/insert', 'menambah data image Division', 'Mozilla Firefox', '104172141330', '2021-04-17 03:14:47', NULL),
(118, 1, '/api/v1/division/delete', 'menghapus data divisi', 'Mozilla Firefox', '104172116686', '2021-04-17 03:15:00', NULL),
(119, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104172129814', '2021-04-17 03:15:38', NULL),
(120, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104172123235', '2021-04-17 03:16:02', NULL),
(121, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104172114031', '2021-04-17 03:17:53', NULL),
(122, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104172114107', '2021-04-17 03:18:12', NULL),
(123, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104172130094', '2021-04-17 03:18:56', NULL),
(124, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '10417213789', '2021-04-17 03:20:44', NULL),
(125, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '104172127837', '2021-04-17 03:27:05', NULL),
(126, 1, '/api/v1/division/insert', 'menambah data divisi', 'Mozilla Firefox', '104172136569', '2021-04-17 03:35:46', NULL),
(127, 1, '/api/v1/imageDivision/insert', 'menambah data image Division', 'Mozilla Firefox', '104172123179', '2021-04-17 03:36:05', NULL),
(128, 1, '/api/v1/imageDivision/insert', 'menambah data image Division', 'Mozilla Firefox', '10417215907', '2021-04-17 03:36:11', NULL),
(129, 1, '/api/v1/division/delete', 'menghapus data divisi', 'Mozilla Firefox', '10417219318', '2021-04-17 03:36:29', NULL),
(130, 1, '/api/v1/trash/division/delete', 'menghapus data sampah divisi', 'Mozilla Firefox', '10417219398', '2021-04-17 03:36:54', NULL),
(131, 1, '/api/v1/division/insert', 'menambah data divisi', 'Mozilla Firefox', '104252135051', '2021-04-24 22:27:12', NULL),
(132, 1, '/api/v1/member/delete', 'menghapus data member', 'Mozilla Firefox', '10425217659', '2021-04-24 22:27:44', NULL),
(133, 1, '/api/v1/member/delete', 'menghapus data member', 'Mozilla Firefox', '10425217989', '2021-04-24 22:30:23', NULL),
(134, 1, '/api/v1/member/delete', 'menghapus data member', 'Mozilla Firefox', '104252120088', '2021-04-24 22:42:21', NULL),
(135, 1, '/api/v1/alumni/insert', 'menambah data alumni', 'Mozilla Firefox', '104252121509', '2021-04-24 23:16:28', NULL),
(136, 1, '/api/v1/alumni/delete', 'menghapus data alumni', 'Mozilla Firefox', '104252122227', '2021-04-24 23:18:12', NULL),
(137, 1, '/api/v1/alumni/update', 'mengedit data alumni', 'Mozilla Firefox', '104252138602', '2021-04-24 23:31:20', NULL),
(138, 1, '/api/v1/member/update', 'mengedit data member', 'Mozilla Firefox', '104252139828', '2021-04-24 23:32:41', NULL),
(139, 1, '/api/v1/imageGallery/delete', 'menghapus data image Gallery', 'Google Chrome', '105032132596', '2021-05-03 12:40:58', NULL),
(140, 1, '/api/v1/imageGallery/delete', 'menghapus data image Gallery', 'Google Chrome', '105032121498', '2021-05-03 12:41:01', NULL),
(141, 1, '/api/v1/imageGallery/delete', 'menghapus data image Gallery', 'Google Chrome', '105032117388', '2021-05-03 12:42:32', NULL),
(142, 1, '/api/v1/gallery/insert', 'menambah data gallery', 'Google Chrome', '10503213985', '2021-05-03 12:43:41', NULL),
(143, 1, '/api/v1/imageGallery/insert', 'menambah data image Gallery', 'Google Chrome', '105032110948', '2021-05-03 12:44:00', NULL),
(144, 1, '/api/v1/imageGallery/insert', 'menambah data image Gallery', 'Google Chrome', '10503211642', '2021-05-03 12:44:05', NULL),
(145, 1, '/api/v1/imageGallery/insert', 'menambah data image Gallery', 'Google Chrome', '105032141889', '2021-05-03 12:44:12', NULL),
(146, 1, '/api/v1/imageGallery/insert', 'menambah data image Gallery', 'Google Chrome', '105032145980', '2021-05-03 12:44:18', NULL),
(147, 1, '/api/v1/imageGallery/insert', 'menambah data image Gallery', 'Google Chrome', '105032140958', '2021-05-03 12:44:25', NULL),
(148, 1, '/api/v1/imageGallery/insert', 'menambah data image Gallery', 'Google Chrome', '105032117991', '2021-05-03 12:44:30', NULL),
(149, 1, '/api/v1/imageGallery/delete', 'menghapus data image gallery', 'Mozilla Firefox', '10505211013', '2021-05-05 03:38:34', NULL),
(150, 1, '/api/v1/imageGallery/delete', 'menghapus data image gallery', 'Mozilla Firefox', '105052122289', '2021-05-05 03:38:43', NULL),
(151, 1, '/api/v1/imageDivision/delete', 'menghapus data image divisi', 'Mozilla Firefox', '105052138983', '2021-05-05 03:39:42', NULL),
(152, 1, '/api/v1/menu/insert', 'Menambah data menu', 'Mozilla Firefox', '10509217345', '2021-05-09 05:36:28', NULL),
(153, 1, '/api/v1/submenu/insert', 'Menambah data submenu', 'Mozilla Firefox', '10509218515', '2021-05-09 05:37:33', NULL),
(154, 1, '/api/v1/access/users/change/menu', 'Menambah access menu users', 'Mozilla Firefox', '105092132718', '2021-05-09 05:37:52', NULL),
(155, 1, '/api/v1/access/users/change/submenu', 'Menambah access submenu users', 'Mozilla Firefox', '105092134560', '2021-05-09 05:37:57', NULL),
(156, 1, '/api/v1/menu/insert', 'Menambah data menu', 'Mozilla Firefox', '105092122894', '2021-05-09 06:10:25', NULL),
(157, 1, '/api/v1/menu/insert', 'Menambah data menu', 'Mozilla Firefox', '105092120931', '2021-05-09 06:10:26', NULL),
(158, 1, '/api/v1/menu/insert', 'Menambah data menu', 'Mozilla Firefox', '105092133511', '2021-05-09 06:10:26', NULL),
(159, 1, '/api/v1/menu/delete', 'Menghapus data menu', 'Mozilla Firefox', '10509219521', '2021-05-09 06:10:44', NULL),
(160, 1, '/api/v1/access/users/change/menu', 'Menambah access menu users', 'Mozilla Firefox', '105092135298', '2021-05-09 06:11:08', NULL),
(161, 1, '/api/v1/section/insert', 'Menambah data section', 'Mozilla Firefox', '105092113769', '2021-05-09 06:20:10', NULL),
(162, 1, '/api/v1/menu/insert', 'Menambah data menu', 'Mozilla Firefox', '105092123919', '2021-05-09 06:21:34', NULL),
(163, 1, '/api/v1/menu/insert', 'Menambah data menu', 'Mozilla Firefox', '105092141389', '2021-05-09 06:22:54', NULL),
(164, 1, '/api/v1/submenu/insert', 'Menambah data submenu', 'Mozilla Firefox', '10509217239', '2021-05-09 06:23:51', NULL),
(165, 1, '/api/v1/submenu/insert', 'Menambah data submenu', 'Mozilla Firefox', '10509218105', '2021-05-09 06:24:26', NULL),
(166, 1, '/api/v1/access/users/change/section', 'Menambah access section users', 'Mozilla Firefox', '105092140029', '2021-05-09 06:24:46', NULL),
(167, 1, '/api/v1/access/users/change/menu', 'Menambah access menu users', 'Mozilla Firefox', '10509219940', '2021-05-09 06:24:51', NULL),
(168, 1, '/api/v1/access/users/change/menu', 'Menambah access menu users', 'Mozilla Firefox', '105092132701', '2021-05-09 06:24:54', NULL),
(169, 1, '/api/v1/access/users/change/submenu', 'Menambah access submenu users', 'Mozilla Firefox', '105092112957', '2021-05-09 06:24:59', NULL),
(170, 1, '/api/v1/access/users/change/submenu', 'Menambah access submenu users', 'Mozilla Firefox', '105092133020', '2021-05-09 06:25:03', NULL),
(171, 1, '/api/v1/menu/update', 'Memperbaharui data menu', 'Mozilla Firefox', '10509219975', '2021-05-09 06:29:59', NULL),
(172, 1, '/api/v1/menu/update', 'Memperbaharui data menu', 'Mozilla Firefox', '105092136159', '2021-05-09 06:31:04', NULL),
(173, 1, '/api/v1/menu/update', 'Memperbaharui data menu', 'Mozilla Firefox', '105092120128', '2021-05-09 06:32:02', NULL),
(174, 1, '/api/v1/menu/update', 'Memperbaharui data menu', 'Mozilla Firefox', '105092139579', '2021-05-09 06:33:13', NULL),
(175, 1, '/api/v1/menu/update', 'Memperbaharui data menu', 'Mozilla Firefox', '105092121778', '2021-05-09 06:33:25', NULL),
(176, 1, '/api/v1/menu/update', 'Memperbaharui data menu', 'Mozilla Firefox', '105092126726', '2021-05-09 06:33:34', NULL),
(177, 1, '/api/v1/menu/update', 'Memperbaharui data menu', 'Mozilla Firefox', '105092142046', '2021-05-09 06:34:10', NULL),
(178, 1, '/api/v1/menu/update', 'Memperbaharui data menu', 'Mozilla Firefox', '105092147968', '2021-05-09 06:34:41', NULL),
(179, 1, '/api/v1/menu/update', 'Memperbaharui data menu', 'Mozilla Firefox', '10509211464', '2021-05-09 06:35:16', NULL),
(180, 1, '/api/v1/menu/update', 'Memperbaharui data menu', 'Mozilla Firefox', '105092117609', '2021-05-09 06:35:35', NULL),
(181, 1, '/api/v1/menu/update', 'Memperbaharui data menu', 'Mozilla Firefox', '105092112062', '2021-05-09 06:36:29', NULL),
(182, 1, '/api/v1/submenu/insert', 'Menambah data submenu', 'Mozilla Firefox', '105092137848', '2021-05-09 09:39:39', NULL),
(183, 1, '/api/v1/access/users/change/submenu', 'Menambah access submenu users', 'Mozilla Firefox', '105092138454', '2021-05-09 09:40:01', NULL),
(184, 1, '/api/v1/member/schedule/insert', 'Menambahkan jadwal member', 'Mozilla Firefox', '105092117158', '2021-05-09 14:14:14', NULL),
(185, 1, '/api/v1/submenu/insert', 'Menambah data submenu', 'Mozilla Firefox', '105092136254', '2021-05-09 14:32:15', NULL),
(186, 1, '/api/v1/access/users/change/submenu', 'Menambah access submenu users', 'Mozilla Firefox', '105092146652', '2021-05-09 14:32:35', NULL),
(187, 1, '/api/v1/member/schedule/delete', 'Menghapus jadwal member', 'Mozilla Firefox', '105092115033', '2021-05-09 14:32:50', NULL),
(188, 1, '/api/v1/submenu/update', 'Memperbaharui data submenu', 'Mozilla Firefox', '10509219519', '2021-05-09 14:33:50', NULL),
(189, 1, '/api/v1/trash/schedule/recovery', 'merecovery data sampah schedule', 'Mozilla Firefox', '105092140409', '2021-05-09 14:34:18', NULL),
(190, 1, '/api/v1/member/precentages/test/insert', 'Menambah data test member', 'Mozilla Firefox', '10509216954', '2021-05-09 14:57:17', NULL),
(191, 1, '/api/v1/submenu/insert', 'Menambah data submenu', 'Mozilla Firefox', '10509212483', '2021-05-09 14:58:02', NULL),
(192, 1, '/api/v1/access/users/change/submenu', 'Menambah access submenu users', 'Mozilla Firefox', '105092133223', '2021-05-09 14:58:19', NULL),
(193, 1, '/api/v1/member/precentages/test/update', 'Memperbaharui data test member', 'Mozilla Firefox', '105092116314', '2021-05-09 14:58:46', NULL),
(194, 1, '/api/v1/member/precentages/test/delete', 'Menghapus data test member', 'Mozilla Firefox', '105092124328', '2021-05-09 14:58:50', NULL),
(195, 1, '/api/v1/submenu/update', 'Memperbaharui data submenu', 'Mozilla Firefox', '105092127407', '2021-05-09 14:59:23', NULL),
(196, 1, '/api/v1/trash/tests/recovery', 'merecovery data sampah test', 'Mozilla Firefox', '10509216866', '2021-05-09 15:00:35', NULL),
(197, 1, '/api/v1/member/schedule/delete', 'Menghapus jadwal member', 'Mozilla Firefox', '105092151558', '2021-05-09 15:02:52', NULL),
(198, 1, '/api/v1/member/precentages/test/delete', 'Menghapus data test member', 'Mozilla Firefox', '10509219223', '2021-05-09 15:03:08', NULL),
(199, 1, '/api/v1/submenu/insert', 'Menambah data submenu', 'Mozilla Firefox', '10509218414', '2021-05-09 15:27:27', NULL),
(200, 1, '/api/v1/access/users/change/submenu', 'Menambah access submenu users', 'Mozilla Firefox', '1050921999', '2021-05-09 15:27:57', NULL),
(201, 1, '/api/v1/member/precentages/test/insert', 'Menambah data test member', 'Mozilla Firefox', '105092117655', '2021-05-09 15:29:44', NULL),
(202, 1, '/api/v1/member/precentages/score/insert', 'Menambah data score member', 'Mozilla Firefox', '105092147729', '2021-05-09 15:32:43', NULL),
(203, 1, '/api/v1/category/insert', 'menambah data category', 'Mozilla Firefox', '105092113154', '2021-05-09 16:29:15', NULL),
(204, 1, '/api/v1/member/insert/profile', 'memperbarui data profile', 'Mozilla Firefox', '105102134773', '2021-05-09 17:06:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumnies`
--

CREATE TABLE `alumnies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `work` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `study` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alumnies`
--

INSERT INTO `alumnies` (`id`, `name`, `work`, `study`, `place`, `created_by`, `created_at`, `image`, `updated_at`, `deleted_at`) VALUES
(88, 'Guh Teguh', 'IT Developer', NULL, 'e', 1, '2021-04-14 05:37:02', 'images/alumni/Adi_Sani.jpg', '2021-04-24 23:31:20', NULL),
(89, 'Yeahh', 'Developer', NULL, 'Indo', 1, '2021-04-24 23:16:28', 'images/alumni/Riezkan_Aprianda.jpg', '2021-04-24 23:18:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('100','200','300') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '100',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `content`, `thumbnail`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'SMKN 5', '<p>Webinar hari ini kita akan membahas topik tentang dunia kerja dan kuliah, pemateri nya adalah\r\n                                    alumni IT Club yaitu kang rival dan kang Yusuf yang insyallah akan memberikan ilmu nya sebaik\r\n                                    mungkin kepada teman-teman semua agar siap di dunia kerja dan perkuliahan agar tidak kaget pada\r\n                                    saat lulus nanti, banyak materi yang didapatkan pada saat seminar.\r\n                                    Seminar ini di adakan karena masih banyaknya siswa/siswi SMK yang masih bingung arah untuk\r\n                                    menentukan pilihannya setelah lulus, apakah harus bekerja, harus berkuliah atau bahkan harus\r\n                                    kuliah sambil kerja, mana sih pilihan terbaik yang harus diambil? agar tidak bingung maka kita\r\n                                    datangkan para narasumber yang tentunya bisa membuat anak-anak IT Club menjadi paham mana\r\n                                    tujuan yang harus diambil nanti ketika lulus.\r\n                                    Kesimpulan dari seminar hari ini adalah kita boleh bekerja tapi jangan lupakan cita-cita untuk\r\n                                    berkuliah, karena kuliah sangatlah penting untuk nanti prospek kerja, agar bisa mendapatkan jenjang\r\n                                    karir yang lebih baik lagi, \"Investasi terbaik adalah Ilmu\".</p>', NULL, 'SMKN-5', '200', '2021-04-01 09:04:48', '2021-04-02 09:05:25', NULL),
(2, 1, 'ertrt', NULL, NULL, 'ertrt', '100', '2021-04-02 09:44:47', '2021-04-02 09:44:47', NULL),
(3, 1, 'test', NULL, NULL, 'test', '100', '2021-04-02 09:46:51', '2021-04-02 09:46:51', NULL),
(4, 1, 'test123', NULL, NULL, 'test123', '100', '2021-04-02 09:47:45', '2021-04-02 09:59:10', '2021-04-02 09:59:10'),
(5, 1, 'test123', NULL, NULL, 'test123', '100', '2021-04-02 09:55:01', '2021-04-02 09:55:01', NULL),
(6, 1, 'test123', NULL, NULL, 'test123', '100', '2021-04-02 09:56:00', '2021-04-02 09:59:02', '2021-04-02 09:59:02'),
(7, 1, 'hayoooloo', '<p>Webinar hari ini kita akan membahas topik tentang dunia kerja dan kuliah, pemateri nya adalah\r\n                                    alumni IT Club yaitu kang rival dan kang Yusuf yang insyallah akan memberikan ilmu nya sebaik\r\n                                    mungkin kepada teman-teman semua agar siap di dunia kerja dan perkuliahan agar tidak kaget pada\r\n                                    saat lulus nanti, banyak materi yang didapatkan pada saat seminar.\r\n                                    Seminar ini di adakan karena masih banyaknya siswa/siswi SMK yang masih bingung arah untuk\r\n                                    menentukan pilihannya setelah lulus, apakah harus bekerja, harus berkuliah atau bahkan harus\r\n                                    kuliah sambil kerja, mana sih pilihan terbaik yang harus diambil? agar tidak bingung maka kita\r\n                                    datangkan para narasumber yang tentunya bisa membuat anak-anak IT Club menjadi paham mana\r\n                                    tujuan yang harus diambil nanti ketika lulus.\r\n                                    Kesimpulan dari seminar hari ini adalah kita boleh bekerja tapi jangan lupakan cita-cita untuk\r\n                                    berkuliah, karena kuliah sangatlah penting untuk nanti prospek kerja, agar bisa mendapatkan jenjang\r\n                                    karir yang lebih baik lagi, \"Investasi terbaik adalah Ilmu\".</p>', 'images/article/admin-202104021817-0.jpg', 'hayoooloo', '200', '2021-04-02 09:59:30', '2021-04-02 11:19:49', NULL),
(8, 1, 'zzzzz', NULL, NULL, 'zzzzz', '100', '2021-04-02 10:01:09', '2021-04-02 11:14:46', '2021-04-02 11:14:46'),
(9, 1, 'Woww Indonesia', '<p>Webinar hari ini kita akan membahas topik tentang dunia kerja dan kuliah, pemateri nya adalah\r\n                                    alumni IT Club yaitu kang rival dan kang Yusuf yang insyallah akan memberikan ilmu nya sebaik\r\n                                    mungkin kepada teman-teman semua agar siap di dunia kerja dan perkuliahan agar tidak kaget pada\r\n                                    saat lulus nanti, banyak materi yang didapatkan pada saat seminar.\r\n                                    Seminar ini di adakan karena masih banyaknya siswa/siswi SMK yang masih bingung arah untuk\r\n                                    menentukan pilihannya setelah lulus, apakah harus bekerja, harus berkuliah atau bahkan harus\r\n                                    kuliah sambil kerja, mana sih pilihan terbaik yang harus diambil? agar tidak bingung maka kita\r\n                                    datangkan para narasumber yang tentunya bisa membuat anak-anak IT Club menjadi paham mana\r\n                                    tujuan yang harus diambil nanti ketika lulus.\r\n                                    Kesimpulan dari seminar hari ini adalah kita boleh bekerja tapi jangan lupakan cita-cita untuk\r\n                                    berkuliah, karena kuliah sangatlah penting untuk nanti prospek kerja, agar bisa mendapatkan jenjang\r\n                                    karir yang lebih baik lagi, \"Investasi terbaik adalah Ilmu\".</p>', 'images/article/admin-202104021703-0.png', 'woww-indonesia', '200', '2021-04-02 10:03:43', '2021-04-02 11:12:01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_category`
--

CREATE TABLE `blog_category` (
  `blog_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blog_category`
--

INSERT INTO `blog_category` (`blog_id`, `category_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_suspended`
--

CREATE TABLE `blog_suspended` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` int NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suspended` timestamp NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lomba', 1, '2021-05-09 16:29:14', '2021-05-09 16:29:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint UNSIGNED NOT NULL,
  `created_by` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisions`
--

INSERT INTO `divisions` (`id`, `created_by`, `name`, `content`, `image`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 1, 'Programming', '<p>Divisi Programming adalah suatu satu divisi yang ada IT CLUB yeng mempelajari\r\n                                  tentang desain, perfilman dan masih banyak lagi. Divisi Multimedia adalah suatu\r\n                                  sarana (media) yand didalamnya terdapat perpaduan materi seperti Design Graphics, Design 3D, Design Characther, UI/UX, Editing video, dan Games 2D.\r\n                                  keuntungan bergabung di Divisi Multimedia ialah kita bisa menjadi seorang\r\n                                  desainer, editor, lalu kiga juga bisa terjun di dunia perfilman. Dan satu hal lagi,\r\n                                  dalam mempelajari multimedia kita bisa membuka lapangan kerja sendiri.\r\n                                  So buat teman-teman yang tertarik di bidang Desain, Editing Video dan\r\n                                  Pembuatan Game langsung sajah join ke Divisi Multimedia yah.</p>', 'images/division/7ECcKJb1Y6hQ1Zy0ujTKzURoBj7PesNIickAGPMn.png', 'programming', '2021-04-24 22:27:12', '2021-04-24 22:27:12', NULL),
(17, 1, 'Networking', '<p>Divisi Programming adalah suatu satu divisi yang ada IT CLUB yeng mempelajari\r\n                                  tentang desain, perfilman dan masih banyak lagi. Divisi Multimedia adalah suatu\r\n                                  sarana (media) yand didalamnya terdapat perpaduan materi seperti Design Graphics, Design 3D, Design Characther, UI/UX, Editing video, dan Games 2D.\r\n                                  keuntungan bergabung di Divisi Multimedia ialah kita bisa menjadi seorang\r\n                                  desainer, editor, lalu kiga juga bisa terjun di dunia perfilman. Dan satu hal lagi,\r\n                                  dalam mempelajari multimedia kita bisa membuka lapangan kerja sendiri.\r\n                                  So buat teman-teman yang tertarik di bidang Desain, Editing Video dan\r\n                                  Pembuatan Game langsung sajah join ke Divisi Multimedia yah.</p>', 'images/division/network.png', 'networking', '2021-04-24 22:27:12', '2021-04-24 22:27:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `exception_error`
--

CREATE TABLE `exception_error` (
  `id` bigint UNSIGNED NOT NULL,
  `error_code` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `content`, `image`, `slug`, `created_at`, `created_by`, `updated_at`, `deleted_at`) VALUES
(4, 'tetest', '<p>ds</p>', 'images/gallery/Galeri_kegiatan_4.jpg', 'tetest', '2021-03-25 06:30:14', 1, '2021-04-14 07:47:53', NULL),
(7, 'Aboga Boga', '<p>est</p>', 'images/gallery/G8i2AbvRv8z6bDNge5l4DFUDV8xcychtVqSxUShC.jpg', 'aboga-boga', '2021-04-10 07:38:06', 1, '2021-04-10 07:38:06', NULL),
(8, 'prakterk networking', '<p>est</p>', 'images/gallery/perkenalan_ekskul.png', 'prakterk-networking', '2021-04-10 07:38:06', 1, '2021-04-10 07:38:06', NULL),
(9, 'ujian eskul', '<p>test test</p>', 'images/gallery/SkNRxueLiUH9tlo7RyjXADTgBOXsrEdSkSHnDFy4.jpg', 'ujian-eskul', '2021-05-03 12:43:41', 1, '2021-05-03 12:43:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `image_division`
--

CREATE TABLE `image_division` (
  `id` bigint UNSIGNED NOT NULL,
  `division_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `image_division`
--

INSERT INTO `image_division` (`id`, `division_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 14, 'images/ImageDivision/codeigniter_logo.png', '2021-05-03 09:14:13', '2021-05-05 03:39:42', '2021-05-05 03:39:42'),
(16, 14, 'images/ImageDivision/laravel-logo.png', '2021-05-03 09:14:13', '2021-05-05 03:39:42', '2021-05-05 03:39:42'),
(17, 14, 'images/ImageDivision/Mikrotik-logo.png', '2021-05-03 09:14:13', NULL, NULL),
(18, 14, 'images/ImageDivision/php-logo.png', '2021-05-03 09:14:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `image_gallery`
--

CREATE TABLE `image_gallery` (
  `id` bigint UNSIGNED NOT NULL,
  `gallery_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `image_gallery`
--

INSERT INTO `image_gallery` (`id`, `gallery_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'images/ImageGalleries/C626PuNqJhaDkSZTMBrjPexpJR04TJzRPxPxGhkF.png', '2021-03-25 07:08:25', '2021-05-03 12:40:58', '2021-05-03 12:40:58'),
(3, 4, 'images/ImageGalleries/u9in0ZNnFaXQKuyMYFgCwPFWZxXgVjBYnksEJkUL.jpg', '2021-04-01 11:23:27', '2021-05-03 12:41:01', '2021-05-03 12:41:01'),
(4, 4, 'images/ImageGalleries/NuoQEHIPLAkcPTDcCx5Nl35AZV39HP11UziNGfCK.png', '2021-04-01 11:23:48', '2021-05-03 12:42:32', '2021-05-03 12:42:32'),
(6, 8, 'images/ImageGalleries/0KDSf6PaSqE10010I55YyJrw9IFoEy0g3UBUfLEE.jpg', '2021-05-03 12:44:00', '2021-05-05 03:38:34', '2021-05-05 03:38:34'),
(7, 8, 'images/ImageGalleries/F6oGrX2wIm1tc3ayEdLtMEEIqmEecruKzP4KyA0A.jpg', '2021-05-03 12:44:05', '2021-05-05 03:38:34', '2021-05-05 03:38:34'),
(8, 8, 'images/ImageGalleries/lq6VBXG12oKZYPCZGZhg7HfcEYsDzu6jKNCtn3X9.jpg', '2021-05-03 12:44:12', '2021-05-05 03:38:43', '2021-05-05 03:38:43'),
(9, 8, 'images/ImageGalleries/3NOdFU2KgFXnFwv5fn4b8QrkTzNfl1ewvKfrsaLq.jpg', '2021-05-03 12:44:18', '2021-05-05 03:38:43', '2021-05-05 03:38:43'),
(10, 8, 'images/ImageGalleries/xXzNgCgCKdE6iJnwI43z5oFF9LyDQreUUwbEeryG.jpg', '2021-05-03 12:44:25', '2021-05-03 12:44:25', NULL),
(11, 8, 'images/ImageGalleries/Bfv09BpLhFeef2fnU8frbbJ3vXe3UedJgtJADh6E.jpg', '2021-05-03 12:44:30', '2021-05-03 12:44:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_score`
--

CREATE TABLE `list_score` (
  `id` bigint UNSIGNED NOT NULL,
  `test_id` int NOT NULL,
  `user_id` int NOT NULL,
  `score` int NOT NULL,
  `created_by` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `list_score`
--

INSERT INTO `list_score` (`id`, `test_id`, `user_id`, `score`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 100, 1, NULL, '2021-05-09 15:32:43', '2021-05-09 15:32:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_test`
--

CREATE TABLE `list_test` (
  `id` bigint UNSIGNED NOT NULL,
  `division_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `list_test`
--

INSERT INTO `list_test` (`id`, `division_id`, `name`, `deskripsi`, `value`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 14, 'Ngoding gan', 'ngoding dasar', '75', 1, '2021-05-09 15:03:08', '2021-05-09 14:57:17', '2021-05-09 15:03:08'),
(2, 14, 'Membuat if else sederhana', 'lorem', '70', 1, NULL, '2021-05-09 15:29:43', '2021-05-09 15:29:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `division_id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `majors` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `entry_year` date DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `user_id`, `division_id`, `name`, `class`, `majors`, `position`, `status`, `entry_year`, `image`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 14, 'test', '11', 'TKJ', 'sdf', 1, '2021-03-10', 'images/member/KIoonq9pv6Ul014BRUbGSlEeEfuqBUfjZPJvOS72.png', 1, '2021-03-26 03:16:49', '2021-04-24 23:32:41', NULL),
(15, 3, 17, 'rachman', '11', 'TKJ', 'Seksi Olahraga', 1, '2021-03-10', 'images/member/img_rahman.png', 1, '2021-03-26 03:16:49', '2021-04-24 23:32:41', NULL),
(16, 4, 17, 'hengky', '12', 'TKJ', 'Anggota', 1, '2021-03-10', 'images/member/img_hengky.png', 1, '2021-03-26 03:16:49', '2021-04-24 23:32:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_reg`
--

CREATE TABLE `member_reg` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `division_id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `majors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_year` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` bigint UNSIGNED NOT NULL,
  `section_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('static','dynamic') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'static',
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `section_id`, `name`, `url`, `icon`, `type`, `comments`, `status`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Dashboard', NULL, 'fas fa-fire', 'dynamic', 'Menu untuk menampung rincian website', '1', 1, NULL, '2021-03-18 04:31:28', '2021-03-18 18:40:09'),
(2, 3, 'Preferences Web ', '', 'fas fa-columns', 'dynamic', 'Menu yang menyimpan preferences web', '1', 1, NULL, '2021-03-18 04:16:01', '2021-03-18 04:29:59'),
(3, 3, 'Data User', '/master/user', 'fas fa-user', 'static', 'Data untuk menampung user', '1', 1, NULL, '2021-03-17 22:05:48', '2021-03-19 05:05:26'),
(4, 3, 'Data User', NULL, 'fas fa-user', 'dynamic', 'Data untuk menampung user', '1', 1, '2021-03-17 22:41:50', '2021-03-17 22:41:46', '2021-03-17 22:41:50'),
(5, 6, 'Menu Baru', '/menu/baru', 'fas fa-clipboard-list', 'dynamic', 'contoh menu dynamic oke!', '1', 1, '2021-03-18 07:01:26', '2021-03-18 06:56:26', '2021-03-18 07:01:26'),
(6, 3, 'Data Role', '/master/role', 'fas fa-user-cog', 'static', 'menu untuk menyimpan role', '1', 1, NULL, '2021-03-19 07:13:46', '2021-03-19 07:13:46'),
(7, 6, 'Menu Access', NULL, 'fas fa-server', 'dynamic', 'Menu yang berisi pengaturan untuk mengatur akses menu pada user', '1', 1, NULL, '2021-03-20 03:06:48', '2021-03-20 03:06:48'),
(10, 3, 'Divisions', NULL, 'fas fa-people-carry', 'dynamic', 'data untuk menampung division dan image division', '1', 1, NULL, '2021-03-23 23:42:28', '2021-05-09 06:33:13'),
(11, 3, 'Galleries', NULL, 'fas fa-images', 'dynamic', 'menampung data gallery dan image gallery', '1', 1, NULL, '2021-03-25 03:00:38', '2021-05-09 06:33:34'),
(12, 3, 'Data Prestation', '/master/prestation', 'fas fa-medal', 'static', 'Menu untuk menampung data prestati IT Club', '1', 1, NULL, '2021-03-25 23:30:41', '2021-05-09 06:32:02'),
(13, 3, 'Data Member', NULL, 'fas fa-users', 'dynamic', 'Menu untuk menampung member', '1', 1, NULL, '2021-03-26 01:57:44', '2021-05-09 06:29:59'),
(14, 3, 'Data Category', '/master/category', 'fas fa-clipboard-list', 'static', 'menu untuk menampung data category', '1', 1, NULL, '2021-03-27 07:26:46', '2021-05-09 06:31:04'),
(15, 7, 'Article', NULL, 'fas fa-newspaper', 'dynamic', 'untuk menampung article', '1', 1, NULL, '2021-04-01 08:55:47', '2021-05-09 06:34:10'),
(16, 6, 'Trash', NULL, 'fas fa-trash', 'dynamic', 'Menu untuk menampung data sampah yang ingin di kembalikan', '1', 1, NULL, '2021-04-12 11:58:21', '2021-04-12 11:58:21'),
(17, 6, 'Error', NULL, 'fas fa-exclamation-triangle', 'dynamic', 'Menu untuk menampung error', '1', 1, NULL, '2021-05-09 05:36:27', '2021-05-09 06:34:41'),
(18, 7, 'User Guides', '/features/user_guides', 'fas fa-book', 'static', 'Menu untuk menampung user guide', '1', 1, NULL, '2021-05-09 06:10:25', '2021-05-09 06:10:25'),
(19, 7, 'User Guides', '/features/user_guides', 'fas fa-book', 'static', 'Menu untuk menampung user guide', '1', 1, '2021-05-09 06:10:44', '2021-05-09 06:10:25', '2021-05-09 06:10:44'),
(20, 7, 'User Guides', '/features/user_guides', 'fas fa-book', 'static', 'Menu untuk menampung user guide', '1', 1, '2021-05-09 06:10:44', '2021-05-09 06:10:26', '2021-05-09 06:10:44'),
(21, 8, 'Schedule', '/members/schedule', 'fas fa-calendar-alt', 'static', 'Menu untuk menampung schedule member', '1', 1, NULL, '2021-05-09 06:21:34', '2021-05-09 06:35:16'),
(22, 8, 'Precentages', NULL, 'fas fa-percentage', 'dynamic', 'Menu untuk menampung data nilai user', '1', 1, NULL, '2021-05-09 06:22:54', '2021-05-09 06:36:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_17_071616_create_members_table', 1),
(5, '2021_03_17_071735_create_divisions_table', 1),
(6, '2021_03_17_071802_create_prestations_table', 1),
(7, '2021_03_17_071830_create_blogs_table', 1),
(8, '2021_03_17_072021_create_galleries_table', 1),
(9, '2021_03_17_072057_create_categories_table', 1),
(10, '2021_03_17_072337_create_roles_table', 1),
(11, '2021_03_17_072454_create_alumnies_table', 1),
(12, '2021_03_17_081430_create_blog_category_table', 1),
(13, '2021_03_17_151502_master_section', 1),
(14, '2021_03_18_034330_master_menu', 1),
(15, '2021_03_18_071709_create_image_division_table', 1),
(16, '2021_03_18_072103_create_image_gallery_table', 1),
(17, '2021_03_18_103911_master_submenu', 1),
(18, '2021_03_20_150904_set_access_section', 1),
(19, '2021_03_20_150922_set_access_menu', 1),
(20, '2021_03_20_150934_set_access_submenu', 1),
(21, '2021_03_21_031332_access_user_section', 1),
(22, '2021_03_21_031342_access_user_menu', 1),
(23, '2021_03_21_031348_access_user_submenu', 1),
(24, '2021_03_21_155449_create_user_profile', 1),
(25, '2021_03_24_114831_suspended_blog_list', 1),
(26, '2021_03_26_123845_table_error_exception', 1),
(27, '2021_03_27_101205_table_activities_user', 1),
(28, '2021_03_28_013728_create_users_activation', 1),
(29, '2021_04_10_045627_create_register_member', 1),
(30, '2021_04_11_225926_create_schedule', 1),
(31, '2021_04_15_092729_create_list_test', 1),
(32, '2021_04_15_092733_create_list_score', 1),
(33, '2021_04_20_205720_create_user_guides', 1),
(34, '2021_04_20_205737_create_user_guides_decs', 1);

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
-- Struktur dari tabel `prestations`
--

CREATE TABLE `prestations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prestations`
--

INSERT INTO `prestations` (`id`, `name`, `content`, `image`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Juara 1 Lomba yr', '<p>test</p>', 'images/prestation/247knliDK2aWYZhYC7u7jpwwiMUig3hd4zKjXYiv.png', 1, '2021-03-25 23:37:21', '2021-03-25 23:37:21', NULL),
(5, 'Holaa', '<p>test</p>', 'images/prestation/I3k4A0ZhnworNCIraPwE4sgbvUHa8y583VovPr5O.png', 1, '2021-04-10 08:06:35', '2021-04-11 08:29:06', NULL),
(6, 'juara 3', '<p>test</p>', 'images/prestation/I3k4A0ZhnworNCIraPwE4sgbvUHa8y583VovPr5O.png', 1, '2021-04-10 08:06:35', '2021-04-11 08:29:06', NULL),
(7, 'juara 4', '<p>test</p>', 'images/prestation/SR0iHWFG3lHj349DyJLCdEHPSOzU8AnIho7AKoao.png', 1, '2021-04-10 08:06:35', '2021-04-11 08:29:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `id_role` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `id_role`, `name`, `created_at`, `deleted_at`, `updated_at`, `created_by`) VALUES
(1, 'A1', 'Admin', '2021-03-19 13:22:20', NULL, '2021-03-19 14:22:15', 1),
(2, 'A2', 'User', '2021-03-19 20:59:49', NULL, '2021-03-19 20:59:49', 1),
(3, 'A3', 'Member', '2021-03-19 21:00:51', NULL, '2021-03-19 21:00:51', 1),
(4, 'A4', 'customer', '2021-03-19 21:01:37', '2021-03-19 21:05:51', '2021-03-19 21:05:51', 1),
(5, 'A4', 'customer', '2021-03-19 21:01:40', '2021-03-19 21:05:46', '2021-03-19 21:05:46', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule`
--

CREATE TABLE `schedule` (
  `id` bigint UNSIGNED NOT NULL,
  `division` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `come_in` time NOT NULL,
  `come_out` time NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `schedule`
--

INSERT INTO `schedule` (`id`, `division`, `date`, `come_in`, `come_out`, `desc`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '14', '2021-05-05', '12:03:00', '02:01:00', 'test', 1, '2021-05-09 15:02:52', '2021-05-09 14:14:14', '2021-05-09 15:02:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `section`
--

CREATE TABLE `section` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_by` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `section`
--

INSERT INTO `section` (`id`, `name`, `comments`, `status`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Dashboard', 'Myeimpan data menyeluruh', 1, 1, NULL, '2021-03-17 16:16:35', '2021-03-18 18:49:20'),
(3, 'Master', 'Master yang berisi setting admin maintanance', 1, 1, NULL, '2021-03-17 19:33:22', '2021-03-18 11:49:49'),
(4, 'Contoh', 'section contoh', 1, 1, '2021-03-17 20:03:01', '2021-03-17 19:55:03', '2021-03-18 11:49:26'),
(5, 'Data Akun', 'Section yang menyimpan data akun', 1, 1, '2021-03-17 20:18:39', '2021-03-17 20:18:31', '2021-03-18 11:49:27'),
(6, 'Setting', 'Section pengaturan oleh admin root / master', 1, 1, NULL, '2021-03-18 06:55:37', '2021-03-20 03:05:07'),
(7, 'features', 'menu untuk fitur fitur', 1, 1, NULL, '2021-04-01 08:55:07', '2021-04-01 08:55:07'),
(8, 'Member', 'Section untuk member', 1, 1, NULL, '2021-05-09 06:20:10', '2021-05-09 06:20:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_access_menu`
--

CREATE TABLE `set_access_menu` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `created_by` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `set_access_menu`
--

INSERT INTO `set_access_menu` (`id`, `role_id`, `menu_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-03-20 16:08:05', NULL),
(2, 1, 2, 1, '2021-03-20 16:08:14', NULL),
(3, 1, 3, 1, '2021-03-21 04:06:26', NULL),
(4, 1, 6, 1, '2021-03-21 04:06:28', NULL),
(5, 1, 7, 1, '2021-03-21 04:06:31', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_access_section`
--

CREATE TABLE `set_access_section` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` int NOT NULL,
  `section_id` int NOT NULL,
  `created_by` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `set_access_section`
--

INSERT INTO `set_access_section` (`id`, `role_id`, `section_id`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 1, '2021-03-20 16:07:02', NULL),
(4, 2, 2, 1, '2021-03-21 03:05:01', NULL),
(5, 1, 6, 1, '2021-03-21 04:06:22', NULL),
(6, 1, 2, 1, '2021-03-21 11:34:56', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_access_submenu`
--

CREATE TABLE `set_access_submenu` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` int NOT NULL,
  `submenu_id` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `set_access_submenu`
--

INSERT INTO `set_access_submenu` (`id`, `role_id`, `submenu_id`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 1, '2021-03-21 04:06:34', NULL),
(5, 1, 2, 1, '2021-03-21 04:06:36', NULL),
(6, 1, 3, 1, '2021-03-21 04:06:38', NULL),
(7, 1, 4, 1, '2021-03-21 04:06:38', NULL),
(8, 1, 6, 1, '2021-03-21 04:06:40', NULL),
(9, 1, 7, 1, '2021-03-21 04:06:42', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id` bigint UNSIGNED NOT NULL,
  `menu_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id`, `menu_id`, `name`, `url`, `comments`, `status`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'section', '/master/preferences/section', 'Menampung data section web', '1', 1, NULL, '2021-03-18 04:03:36', '2021-03-20 03:14:34'),
(2, 2, 'menu', '/master/preferences/menu', 'Menampun data menu web', '1', 1, NULL, '2021-03-18 04:14:15', '2021-03-18 18:35:46'),
(3, 2, 'submenu', '/master/preferences/submenu', 'Menampun data submenu web', '1', 1, NULL, '2021-03-18 04:14:27', '2021-03-18 18:35:43'),
(4, 1, 'general dashboard', '/dashboard/general/index', 'Menampung data index web', '1', 1, NULL, '2021-03-18 04:21:43', '2021-03-18 18:35:34'),
(5, 5, 'submenu baru', '/section/menu/submenu', 'ini adalah submenu baru', '1', 1, '2021-03-18 07:01:05', '2021-03-18 07:00:48', '2021-03-18 07:01:05'),
(6, 7, 'Roles', '/setting/menu/role', 'Berfungsi untuk mengatur menu pada role', '1', 1, NULL, '2021-03-20 03:10:32', '2021-03-20 03:11:30'),
(7, 7, 'Users', '/setting/menu/user', 'Berfungsi untuk mengatur menu pada user', '1', 1, NULL, '2021-03-20 03:11:23', '2021-03-20 21:08:27'),
(8, 10, 'Data Division', '/master/divisions/division', 'data untuk menampung divisi', '1', 1, NULL, '2021-03-23 23:44:22', '2021-03-24 23:39:28'),
(9, 10, 'Image Division', '/master/divisions/imagedivision', 'menampung image learning division', '1', 1, NULL, '2021-03-24 23:37:12', '2021-03-24 23:39:41'),
(10, 11, 'Data Gallery', '/master/galleries/gallery', 'menu untuk menampung data gallery', '1', 1, NULL, '2021-03-25 03:03:08', '2021-03-25 03:03:08'),
(11, 11, 'Image Gallery', '/master/galleries/imagegallery', 'menu untuk menampung images gallery', '1', 1, NULL, '2021-03-25 07:04:32', '2021-03-25 07:04:32'),
(12, 13, 'Member', '/master/members/member', 'menu untuk menampung data member aktif', '1', 1, NULL, '2021-03-27 00:11:06', '2021-03-27 00:12:18'),
(13, 13, 'Alumni', '/master/members/alumni', 'Menu untuk menampung data Alumni', '1', 1, NULL, '2021-03-27 00:38:27', '2021-03-27 00:38:27'),
(14, 15, 'List Article', '/features/article/list_article', 'menu untuk data article', '1', 1, NULL, '2021-04-01 08:58:25', '2021-04-01 08:58:25'),
(15, 16, 'Prestation', '/setting/trash/prestation', 'Sub menu untuk menampung data prestation yang belum terhapus', '1', 1, NULL, '2021-04-12 12:00:54', '2021-04-12 12:00:54'),
(16, 16, 'Division', '/setting/trash/division', 'Submenu untuk menampung data divisi yang telah dihapus', '1', 1, NULL, '2021-04-12 12:31:45', '2021-04-12 12:31:45'),
(17, 16, 'Image Division', '/setting/trash/imagedivision', 'Submenu untuk menampung data image learning division', '1', 1, NULL, '2021-04-12 13:28:31', '2021-04-12 13:28:31'),
(18, 16, 'Alumni', '/setting/trash/alumni', 'Sub menu untuk menampung sampah data alumni', '1', 1, NULL, '2021-04-14 06:23:24', '2021-04-14 06:23:24'),
(19, 16, 'Gallery', '/setting/trash/gallery', 'Sub menu untuk menampung sampah data gallery', '1', 1, NULL, '2021-04-14 07:41:13', '2021-04-14 07:41:13'),
(21, 16, 'Image Gallery', '/setting/trash/imagegallery', 'Sub Menu untuk menampung sampah data images  Gallery', '1', 1, NULL, '2021-04-14 07:51:10', '2021-04-14 07:51:10'),
(22, 16, 'Member', '/setting/trash/member', 'Sub menu untuk menampung sampah data member', '1', 1, NULL, '2021-04-14 08:26:39', '2021-04-14 08:26:39'),
(23, 16, 'Category', '/setting/trash/category', 'Sub menu untuk menampung sampah data category', '1', 1, NULL, '2021-04-14 08:26:59', '2021-04-14 08:26:59'),
(24, 16, 'User', '/setting/trash/user', 'Sub Menu untuk menampung sampah data user', '1', 1, NULL, '2021-04-16 08:16:27', '2021-04-16 08:16:27'),
(25, 17, 'Page', '/setting/error/page', 'Submenu untuk menampung page error', '1', 1, NULL, '2021-05-09 05:37:33', '2021-05-09 05:37:33'),
(26, 22, 'Test', '/members/precentages/test', 'Submenu untuk menampung data test member', '1', 1, NULL, '2021-05-09 06:23:51', '2021-05-09 06:23:51'),
(27, 22, 'Score', '/members/precentages/score', 'Submenu untuk menampung data score member', '1', 1, NULL, '2021-05-09 06:24:26', '2021-05-09 06:24:26'),
(28, 16, 'Activity', '/setting/trash/activity', 'Submenu untuk menampung sampah data activity', '1', 1, NULL, '2021-05-09 09:39:39', '2021-05-09 09:39:39'),
(29, 16, 'Schedule', '/setting/trash/schedule', 'Submenu untuk menampung sampah data schedule', '1', 1, NULL, '2021-05-09 14:32:15', '2021-05-09 14:33:50'),
(30, 16, 'Test List', '/setting/trash/tests', 'Submenu untuk menampung sampah data test', '1', 1, NULL, '2021-05-09 14:58:02', '2021-05-09 14:59:23'),
(31, 16, 'Score', '/setting/trash/score', 'Submenu untuk menampung data sampah score', '1', 1, NULL, '2021-05-09 15:27:27', '2021-05-09 15:27:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'admin', 'admin@admin.com', '2021-03-17 11:44:23', '$2y$10$K0xKH2pxUbh/6tEXV7mC2OzIn3dH.egrzitrUM5ItB/cOr0fCAbzm', NULL, 1, '2021-03-17 03:58:06', '2021-03-21 11:16:50', NULL),
(2, 1, 'rizkan', 'rizkanitclub@gmail.com', NULL, '$2y$10$8V2oQX1.h5QFqm6q98MGfu0FCfGN11gsOtifVDv3K2c0lA6clsA9q', NULL, 1, '2021-03-17 04:08:16', '2021-03-17 04:08:16', NULL),
(3, 2, 'firmansyah', 'rizkanfirmansyah9@gmail.com', '2021-03-17 13:40:54', '$2y$10$R5E7OAfpeI3dgiugmhsBA.7o9Z2/CheIlT6qN545owYuQRdzIBvze', NULL, 1, '2021-03-17 06:40:29', '2021-05-03 07:49:24', NULL),
(4, 3, 'customer', 'rizkanitclub111@gmail.com', NULL, '$2y$10$6rHggxqcjKF9wpJZ6Y5YH.1J9x2NwwzwAUSSSrlpv6H6AVyH5STAm', NULL, 1, '2021-03-20 00:39:17', '2021-04-16 08:31:09', NULL),
(5, 1, 'test', 'anakbaik@mungkin.net', NULL, '$2y$10$Q7Cxs4LJ/Hklu8vBOY407Ofdh/A1gFnrsns3QEzXTRmFiYJ9085MO', NULL, 1, '2021-03-20 03:29:58', '2021-03-24 00:53:49', NULL),
(21, 1, 'rizkanfirmansyah', 'rizkan@gmail.com', NULL, '$2y$10$3P7iOY3ATTBBlL1jsg30IeN19YBo3MBeHciensNVebA0Ec0AxenYi', NULL, 1, '2021-03-22 23:47:18', '2021-03-22 23:47:18', NULL),
(23, 2, 'Tamuuuu', 'tamu@tamu.com', '2021-03-17 11:44:23', '$2y$10$K0xKH2pxUbh/6tEXV7mC2OzIn3dH.egrzitrUM5ItB/cOr0fCAbzm', NULL, 1, '2021-03-17 03:58:06', '2021-03-21 11:16:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_activation`
--

CREATE TABLE `users_activation` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('activation','forgotpassword','blocked','message','unknown') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_profile`
--

CREATE TABLE `users_profile` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `facebook_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users_profile`
--

INSERT INTO `users_profile` (`id`, `user_id`, `first_name`, `last_name`, `telepon`, `status`, `thumbnail`, `bio`, `facebook_name`, `facebook_url`, `instagram_name`, `instagram_url`, `linkedin_name`, `linkedin_url`, `twitter_name`, `twitter_url`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', '123', '07875', 'pelajar', 'admin-202105100006-0.png', '<p>test</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-09 17:06:05', '2021-05-09 17:06:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_guides`
--

CREATE TABLE `user_guides` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_guides_decs`
--

CREATE TABLE `user_guides_decs` (
  `id` bigint UNSIGNED NOT NULL,
  `guide_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access_user_menu`
--
ALTER TABLE `access_user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `access_user_section`
--
ALTER TABLE `access_user_section`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `access_user_submenu`
--
ALTER TABLE `access_user_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `alumnies`
--
ALTER TABLE `alumnies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`blog_id`,`category_id`);

--
-- Indeks untuk tabel `blog_suspended`
--
ALTER TABLE `blog_suspended`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `exception_error`
--
ALTER TABLE `exception_error`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `image_division`
--
ALTER TABLE `image_division`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `image_gallery`
--
ALTER TABLE `image_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_score`
--
ALTER TABLE `list_score`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_test`
--
ALTER TABLE `list_test`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `member_reg`
--
ALTER TABLE `member_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `prestations`
--
ALTER TABLE `prestations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `set_access_menu`
--
ALTER TABLE `set_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `set_access_section`
--
ALTER TABLE `set_access_section`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `set_access_submenu`
--
ALTER TABLE `set_access_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `users_activation`
--
ALTER TABLE `users_activation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_guides`
--
ALTER TABLE `user_guides`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_guides_decs`
--
ALTER TABLE `user_guides_decs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `access_user_menu`
--
ALTER TABLE `access_user_menu`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `access_user_section`
--
ALTER TABLE `access_user_section`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `access_user_submenu`
--
ALTER TABLE `access_user_submenu`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT untuk tabel `alumnies`
--
ALTER TABLE `alumnies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `blog_suspended`
--
ALTER TABLE `blog_suspended`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `exception_error`
--
ALTER TABLE `exception_error`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `image_division`
--
ALTER TABLE `image_division`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `image_gallery`
--
ALTER TABLE `image_gallery`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `list_score`
--
ALTER TABLE `list_score`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `list_test`
--
ALTER TABLE `list_test`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `member_reg`
--
ALTER TABLE `member_reg`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `prestations`
--
ALTER TABLE `prestations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `section`
--
ALTER TABLE `section`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `set_access_menu`
--
ALTER TABLE `set_access_menu`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `set_access_section`
--
ALTER TABLE `set_access_section`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `set_access_submenu`
--
ALTER TABLE `set_access_submenu`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users_activation`
--
ALTER TABLE `users_activation`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_guides`
--
ALTER TABLE `user_guides`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_guides_decs`
--
ALTER TABLE `user_guides_decs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
