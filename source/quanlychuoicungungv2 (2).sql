-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 21, 2025 lúc 03:39 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlychuoicungungv2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_don_hang` bigint(20) UNSIGNED NOT NULL,
  `id_chi_tiet_san_pham` bigint(20) UNSIGNED NOT NULL,
  `so_luong` decimal(10,2) DEFAULT NULL,
  `gia` decimal(15,0) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `id_don_hang`, `id_chi_tiet_san_pham`, `so_luong`, `gia`, `created_at`, `updated_at`) VALUES
(28, 26, 27, 2.00, 180000, '2025-06-04 15:03:47', '2025-06-04 15:03:47'),
(34, 31, 27, 3.00, 180000, '2025-06-11 12:47:15', '2025-06-11 12:47:15'),
(35, 32, 27, 5.00, 180000, '2025-06-12 19:28:27', '2025-06-12 19:28:27'),
(36, 33, 18, 5.00, 149000, '2025-06-12 22:48:29', '2025-06-12 22:48:29'),
(37, 33, 21, 1.00, 150000, '2025-06-12 22:48:29', '2025-06-12 22:48:29'),
(38, 34, 27, 2.00, 180000, '2025-06-14 17:23:49', '2025-06-14 17:23:49'),
(39, 35, 27, 1.00, 180000, '2025-06-14 17:28:59', '2025-06-14 17:28:59'),
(42, 37, 21, 2.00, 150000, '2025-06-15 23:45:41', '2025-06-15 23:45:41'),
(43, 38, 27, 4.00, 180000, '2025-06-16 08:04:40', '2025-06-16 08:04:40'),
(44, 38, 21, 1.00, 150000, '2025-06-16 08:04:40', '2025-06-16 08:04:40'),
(45, 39, 27, 2.00, 180000, '2025-06-30 10:39:07', '2025-06-30 10:39:07'),
(46, 40, 31, 70.00, 199000, '2025-06-30 21:12:24', '2025-06-30 21:12:24'),
(47, 41, 27, 1.00, 180000, '2025-06-30 21:45:19', '2025-06-30 21:45:19'),
(48, 41, 31, 1.00, 199000, '2025-06-30 21:45:19', '2025-06-30 21:45:19'),
(49, 42, 18, 1.00, 149000, '2025-06-30 22:36:03', '2025-06-30 22:36:03'),
(50, 42, 31, 1.00, 199000, '2025-06-30 22:36:03', '2025-06-30 22:36:03'),
(51, 42, 15, 1.00, 209000, '2025-06-30 22:36:03', '2025-06-30 22:36:03'),
(52, 43, 57, 1.00, 200000, '2025-07-07 09:20:41', '2025-07-07 09:20:41'),
(53, 43, 76, 1.00, 119000, '2025-07-07 09:20:41', '2025-07-07 09:20:41'),
(54, 43, 72, 1.00, 1000000, '2025-07-07 09:20:41', '2025-07-07 09:20:41'),
(55, 44, 27, 1.00, 180000, '2025-07-08 09:52:42', '2025-07-08 09:52:42'),
(56, 44, 31, 1.00, 199000, '2025-07-08 09:52:42', '2025-07-08 09:52:42'),
(57, 45, 53, 1.00, 189000, '2025-07-08 11:10:26', '2025-07-08 11:10:26'),
(58, 46, 15, 3.00, 209000, '2025-07-08 15:10:56', '2025-07-08 15:10:56'),
(59, 47, 27, 1.00, 180000, '2025-07-11 20:37:29', '2025-07-11 20:37:29'),
(60, 48, 15, 1.00, 209000, '2025-07-11 20:38:24', '2025-07-11 20:38:24'),
(61, 48, 53, 1.00, 189000, '2025-07-11 20:38:24', '2025-07-11 20:38:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_san_xuat`
--

CREATE TABLE `chi_tiet_don_san_xuat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_don_san_xuat` bigint(20) UNSIGNED NOT NULL,
  `id_chi_tiet_san_pham` bigint(20) UNSIGNED NOT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_san_xuat`
--

INSERT INTO `chi_tiet_don_san_xuat` (`id`, `id_don_san_xuat`, `id_chi_tiet_san_pham`, `so_luong`, `created_at`, `updated_at`) VALUES
(21, 16, 27, 100, '2025-06-04 11:07:00', '2025-06-04 11:07:00'),
(22, 16, 28, 100, '2025-06-04 11:10:01', '2025-06-04 11:10:01'),
(23, 16, 29, 50, '2025-06-04 11:10:17', '2025-06-04 11:10:17'),
(24, 17, 27, 100, '2025-06-04 11:30:40', '2025-06-04 11:30:40'),
(25, 17, 28, 50, '2025-06-04 11:31:42', '2025-06-04 11:31:42'),
(26, 17, 29, 50, '2025-06-04 11:40:59', '2025-06-04 11:40:59'),
(27, 18, 21, 100, '2025-06-04 12:42:00', '2025-06-04 12:42:00'),
(28, 18, 22, 200, '2025-06-04 12:42:18', '2025-06-04 12:42:18'),
(29, 18, 23, 100, '2025-06-04 12:42:33', '2025-06-04 12:42:33'),
(30, 19, 15, 50, '2025-06-04 13:38:22', '2025-06-04 13:38:22'),
(31, 19, 16, 30, '2025-06-04 13:38:30', '2025-06-04 13:38:30'),
(32, 19, 17, 50, '2025-06-04 13:38:38', '2025-06-04 13:38:38'),
(33, 21, 15, 50, '2025-06-04 14:00:13', '2025-06-04 14:00:13'),
(34, 21, 16, 50, '2025-06-04 14:00:22', '2025-06-04 14:00:22'),
(35, 21, 17, 50, '2025-06-04 14:00:30', '2025-06-04 14:00:30'),
(36, 22, 15, 10, '2025-06-06 10:45:11', '2025-06-06 10:45:11'),
(37, 23, 21, 100, '2025-06-08 21:03:50', '2025-06-08 21:03:50'),
(39, 28, 30, 20, '2025-06-12 17:26:08', '2025-06-12 17:26:08'),
(40, 30, 15, 20, '2025-06-14 19:34:06', '2025-06-14 19:34:06'),
(41, 32, 15, 50, '2025-06-15 22:00:15', '2025-06-15 22:00:15'),
(42, 32, 16, 50, '2025-06-15 22:00:27', '2025-06-15 22:00:27'),
(43, 32, 17, 50, '2025-06-15 22:00:35', '2025-06-15 22:00:35'),
(44, 34, 27, 100, '2025-06-15 22:59:25', '2025-06-15 22:59:25'),
(45, 34, 28, 100, '2025-06-15 22:59:34', '2025-06-15 22:59:34'),
(46, 34, 29, 100, '2025-06-15 22:59:44', '2025-06-15 22:59:44'),
(47, 35, 18, 35, '2025-06-30 10:43:32', '2025-06-30 10:43:32'),
(48, 33, 27, 25, '2025-06-30 20:54:23', '2025-06-30 20:54:23'),
(50, 36, 31, 50, '2025-06-30 21:02:02', '2025-06-30 21:02:02'),
(51, 37, 31, 50, '2025-06-30 21:27:16', '2025-06-30 21:27:16'),
(52, 39, 32, 50, '2025-06-30 23:40:22', '2025-06-30 23:40:22'),
(53, 39, 33, 50, '2025-06-30 23:41:22', '2025-06-30 23:41:22'),
(54, 39, 34, 50, '2025-06-30 23:41:31', '2025-06-30 23:41:31'),
(55, 42, 45, 100, '2025-07-01 00:08:12', '2025-07-01 00:08:12'),
(56, 42, 46, 100, '2025-07-01 00:08:20', '2025-07-01 00:08:20'),
(57, 42, 47, 100, '2025-07-01 00:08:28', '2025-07-01 00:08:28'),
(58, 42, 48, 100, '2025-07-01 00:08:36', '2025-07-01 00:08:36'),
(59, 43, 49, 20, '2025-07-01 00:30:01', '2025-07-01 00:30:01'),
(60, 43, 50, 20, '2025-07-01 00:30:11', '2025-07-01 00:30:11'),
(61, 43, 51, 20, '2025-07-01 00:30:19', '2025-07-01 00:30:19'),
(62, 43, 52, 20, '2025-07-01 00:30:30', '2025-07-01 00:30:30'),
(63, 44, 53, 20, '2025-07-01 00:37:42', '2025-07-01 00:37:42'),
(64, 44, 54, 20, '2025-07-01 00:37:50', '2025-07-01 00:37:50'),
(65, 44, 55, 40, '2025-07-01 00:38:00', '2025-07-01 00:38:00'),
(66, 44, 56, 40, '2025-07-01 00:38:08', '2025-07-01 00:38:08'),
(67, 45, 57, 10, '2025-07-01 00:45:38', '2025-07-01 00:45:38'),
(68, 45, 58, 10, '2025-07-01 00:45:44', '2025-07-01 00:45:44'),
(69, 45, 59, 10, '2025-07-01 00:45:52', '2025-07-01 00:45:52'),
(70, 45, 60, 10, '2025-07-01 00:46:00', '2025-07-01 00:46:00'),
(71, 46, 68, 10, '2025-07-01 00:56:53', '2025-07-01 00:56:53'),
(72, 47, 71, 30, '2025-07-01 01:06:31', '2025-07-01 01:06:31'),
(73, 48, 72, 10, '2025-07-01 01:13:24', '2025-07-01 01:13:24'),
(74, 48, 73, 5, '2025-07-01 01:13:31', '2025-07-01 01:13:31'),
(75, 48, 74, 5, '2025-07-01 01:13:41', '2025-07-01 01:13:41'),
(76, 49, 75, 20, '2025-07-01 01:18:08', '2025-07-01 01:18:08'),
(77, 50, 76, 10, '2025-07-03 16:29:10', '2025-07-03 16:29:10'),
(78, 51, 83, 20, '2025-07-03 22:06:40', '2025-07-03 22:06:40'),
(79, 52, 83, 20, '2025-07-07 07:13:58', '2025-07-07 07:13:58'),
(80, 40, 53, 10, '2025-07-07 07:19:07', '2025-07-07 07:19:07'),
(81, 40, 54, 10, '2025-07-07 07:19:15', '2025-07-07 07:19:15'),
(82, 40, 55, 10, '2025-07-07 07:19:24', '2025-07-07 07:19:24'),
(83, 40, 56, 10, '2025-07-07 07:19:36', '2025-07-07 07:19:36'),
(84, 53, 85, 20, '2025-07-07 07:54:55', '2025-07-07 07:58:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_nhap_nguyen_lieu`
--

CREATE TABLE `chi_tiet_nhap_nguyen_lieu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_don_nhap` bigint(20) UNSIGNED NOT NULL,
  `id_nguyen_lieu_ncc` bigint(20) UNSIGNED DEFAULT NULL,
  `so_luong` decimal(10,2) DEFAULT NULL,
  `gia` decimal(15,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_nhap_nguyen_lieu`
--

INSERT INTO `chi_tiet_nhap_nguyen_lieu` (`id`, `id_don_nhap`, `id_nguyen_lieu_ncc`, `so_luong`, `gia`, `created_at`, `updated_at`) VALUES
(29, 18, 8, 500.00, 40000.00, '2025-06-04 11:55:54', '2025-06-04 11:55:54'),
(30, 18, 9, 300.00, 2000.00, '2025-06-04 11:56:16', '2025-06-04 11:56:16'),
(31, 19, 4, 500.00, 44000.00, '2025-06-04 13:54:34', '2025-06-04 13:54:34'),
(33, 19, 5, 500.00, 500.00, '2025-06-04 13:55:04', '2025-06-04 13:55:04'),
(37, 24, 19, 100.00, 55000.00, '2025-06-15 22:28:48', '2025-06-15 22:28:48'),
(39, 24, 20, 100.00, 300.00, '2025-06-15 22:29:03', '2025-06-15 22:29:03'),
(47, 24, 11, 3.00, 2000.00, '2025-06-15 22:39:01', '2025-06-15 22:39:01'),
(48, 24, 11, 3.00, 2000.00, '2025-06-15 22:42:37', '2025-06-15 22:42:37'),
(50, 24, 11, 4.00, 2000.00, '2025-06-15 22:42:58', '2025-06-15 22:42:58'),
(51, 24, 11, 3.00, 2000.00, '2025-06-15 22:43:07', '2025-06-15 22:43:07'),
(52, 24, 4, 3.00, 44000.00, '2025-06-15 22:43:14', '2025-06-15 22:43:14'),
(54, 24, 4, 3.00, 44000.00, '2025-06-15 22:43:30', '2025-06-15 22:43:30'),
(55, 25, 5, 100.00, 60000.00, '2025-06-15 22:45:11', '2025-06-15 22:45:11'),
(57, 25, 19, 100.00, 55000.00, '2025-06-15 22:45:27', '2025-06-15 22:45:27'),
(58, 25, 20, 100.00, 300.00, '2025-06-15 22:48:04', '2025-06-15 22:48:04'),
(62, 25, 11, 100.00, 2000.00, '2025-06-15 22:49:17', '2025-06-15 22:49:17'),
(63, 26, 19, 100.00, 55000.00, '2025-06-30 10:54:05', '2025-06-30 10:54:05'),
(64, 26, 11, 100.00, 2000.00, '2025-06-30 10:54:23', '2025-06-30 10:54:23'),
(65, 26, 13, 100.00, 500000.00, '2025-06-30 11:04:26', '2025-06-30 11:04:26'),
(66, 27, 20, 1000.00, 300.00, '2025-06-30 11:09:59', '2025-06-30 11:09:59'),
(67, 28, 21, 1000.00, 35000.00, '2025-06-30 23:36:43', '2025-06-30 23:36:43'),
(68, 28, 23, 1000.00, 33000.00, '2025-06-30 23:36:56', '2025-06-30 23:36:56'),
(69, 28, 22, 1000.00, 33000.00, '2025-06-30 23:37:08', '2025-06-30 23:37:08'),
(70, 28, 24, 1000.00, 30000.00, '2025-06-30 23:37:28', '2025-06-30 23:37:28'),
(71, 28, 25, 1000.00, 30000.00, '2025-06-30 23:37:38', '2025-06-30 23:37:38'),
(72, 28, 26, 1000.00, 20000.00, '2025-06-30 23:37:46', '2025-06-30 23:37:46'),
(73, 28, 27, 1000.00, 18000.00, '2025-06-30 23:37:59', '2025-06-30 23:37:59'),
(74, 28, 28, 1000.00, 7000.00, '2025-06-30 23:38:09', '2025-06-30 23:38:09'),
(75, 28, 29, 1000.00, 18000.00, '2025-06-30 23:38:19', '2025-06-30 23:38:19'),
(76, 28, 30, 1000.00, 28000.00, '2025-06-30 23:38:26', '2025-06-30 23:38:26'),
(77, 28, 31, 1000.00, 27000.00, '2025-06-30 23:38:32', '2025-06-30 23:38:32'),
(78, 29, 15, 2000.00, 5000.00, '2025-07-01 00:11:33', '2025-07-01 00:11:33'),
(80, 29, 16, 1000.00, 3000.00, '2025-07-01 00:12:46', '2025-07-01 00:12:46'),
(81, 29, 17, 1000.00, 2000.00, '2025-07-01 00:12:53', '2025-07-01 00:12:53'),
(82, 30, 32, 1000.00, 30000.00, '2025-07-03 21:48:12', '2025-07-03 21:48:12'),
(83, 30, 33, 1000.00, 20000.00, '2025-07-03 21:48:23', '2025-07-03 21:48:23'),
(84, 30, 34, 1000.00, 40000.00, '2025-07-03 21:48:29', '2025-07-03 21:48:29'),
(85, 30, 35, 1000.00, 25000.00, '2025-07-03 21:48:37', '2025-07-03 21:48:37'),
(86, 30, 36, 1000.00, 6000.00, '2025-07-03 21:48:42', '2025-07-03 21:48:42'),
(87, 30, 37, 1000.00, 90000.00, '2025-07-03 21:48:49', '2025-07-03 21:48:49'),
(88, 32, 2, 1000.00, 20000.00, '2025-07-07 11:09:03', '2025-07-07 11:09:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_san_pham`
--

CREATE TABLE `chi_tiet_san_pham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_san_pham` bigint(20) UNSIGNED NOT NULL,
  `mau_sac` varchar(100) DEFAULT NULL,
  `kich_co` varchar(20) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_san_pham`
--

INSERT INTO `chi_tiet_san_pham` (`id`, `id_san_pham`, `mau_sac`, `kich_co`, `so_luong`, `created_at`, `updated_at`) VALUES
(3, 3, 'Trắng', 'Standard', 100, '2025-05-23 16:45:17', '2025-05-23 16:45:17'),
(4, 4, 'Xám', '2L', 1020, '2025-05-23 16:45:17', '2025-05-24 10:52:04'),
(5, 5, 'Xanh', 'L', 1200, '2025-05-23 16:45:17', '2025-05-24 10:31:04'),
(7, 6, 'Vàng', 'L', 100, '2025-05-23 19:42:55', '2025-05-23 19:45:55'),
(8, 6, 'Đỏ', 'L', 20, '2025-05-23 19:46:12', '2025-05-23 19:46:12'),
(15, 44, 'Màu Xanh Biển', 'Size S', 111, '2025-06-03 20:29:16', '2025-07-11 20:38:24'),
(16, 44, 'Màu Xanh Biển', 'Size M', 108, '2025-06-03 20:29:39', '2025-06-30 22:55:04'),
(17, 44, 'Màu Xanh Biển', 'Size L', 110, '2025-06-03 20:29:50', '2025-06-30 22:55:04'),
(18, 45, 'Màu Hồng', 'Size S', 49, '2025-06-03 20:34:46', '2025-06-30 22:36:03'),
(19, 45, 'Màu Hồng', 'Size M', 20, '2025-06-03 20:35:00', '2025-06-03 20:35:00'),
(20, 45, 'Màu Hồng', 'Size L', 20, '2025-06-03 20:35:10', '2025-06-03 20:35:10'),
(21, 46, 'Màu Trắng', 'Size S', 146, '2025-06-03 20:39:50', '2025-06-16 08:04:40'),
(22, 46, 'Màu Trắng', 'Size M', 40, '2025-06-03 20:40:16', '2025-06-04 08:02:39'),
(23, 46, 'Màu Trắng', 'Size L', 40, '2025-06-03 20:40:25', '2025-06-04 08:02:39'),
(24, 47, 'Màu Trắng', 'Size S', 20, '2025-06-03 20:43:37', '2025-06-03 20:43:37'),
(25, 47, 'Màu Trắng', 'Size M', 20, '2025-06-03 20:43:45', '2025-06-03 20:43:45'),
(26, 47, 'Màu Trắng', 'Size L', 20, '2025-06-03 20:45:32', '2025-06-03 20:45:32'),
(27, 53, 'Màu đen', 'size S', 199, '2025-06-04 00:14:57', '2025-07-11 20:37:57'),
(28, 53, 'Màu đen', 'size M', 100, '2025-06-04 11:09:18', '2025-07-01 22:09:32'),
(29, 53, 'Màu đen', 'Size L', 0, '2025-06-04 11:09:31', '2025-07-01 22:09:01'),
(30, 48, 'Màu cam', 'S', 20, '2025-06-12 17:23:43', '2025-06-12 17:23:43'),
(31, 60, 'Be', '39', 117, '2025-06-30 20:59:14', '2025-07-08 09:52:42'),
(32, 59, 'Xám', '39', 50, '2025-06-30 22:59:20', '2025-07-01 00:01:10'),
(33, 59, 'Xám', '40', 50, '2025-06-30 22:59:42', '2025-07-01 00:01:18'),
(34, 59, 'Xám', '41', 50, '2025-06-30 23:00:03', '2025-07-01 00:01:25'),
(35, 48, 'Cam', 'M', 0, '2025-06-30 23:52:30', '2025-06-30 23:52:30'),
(36, 48, 'Cam', 'L', 0, '2025-06-30 23:52:43', '2025-06-30 23:52:43'),
(37, 49, 'Trắng', 'S', 0, '2025-06-30 23:53:21', '2025-06-30 23:53:21'),
(38, 49, 'Trắng', 'M', 0, '2025-06-30 23:53:33', '2025-06-30 23:53:33'),
(39, 49, 'Trắng', 'L', 0, '2025-06-30 23:53:47', '2025-06-30 23:53:47'),
(40, 50, 'Trắng', 'S', 0, '2025-06-30 23:54:13', '2025-06-30 23:54:13'),
(41, 50, 'Trắng', 'M', 0, '2025-06-30 23:54:30', '2025-06-30 23:54:30'),
(42, 50, 'Trắng', 'L', 0, '2025-06-30 23:54:40', '2025-06-30 23:54:40'),
(43, 51, 'Họa tiết tom soul', 'Free size', 0, '2025-06-30 23:56:23', '2025-06-30 23:56:23'),
(44, 52, 'Trắng', '39', 0, '2025-06-30 23:59:11', '2025-06-30 23:59:11'),
(45, 54, 'Xanh Trắng', '39', 100, '2025-07-01 00:05:07', '2025-07-01 00:18:43'),
(46, 54, 'Xanh Trắng', '40', 100, '2025-07-01 00:05:23', '2025-07-01 00:18:43'),
(47, 54, 'Xanh Trắng', '41', 100, '2025-07-01 00:05:36', '2025-07-01 00:18:43'),
(48, 54, 'Xanh Trắng', '42', 100, '2025-07-01 00:05:50', '2025-07-01 00:18:43'),
(49, 55, 'Trắng Đen', '39', 20, '2025-07-01 00:27:39', '2025-07-01 00:33:31'),
(50, 55, 'Trắng Đen', '40', 20, '2025-07-01 00:27:50', '2025-07-01 00:33:31'),
(51, 55, 'Trắng Đen', '41', 20, '2025-07-01 00:28:03', '2025-07-01 00:33:31'),
(52, 55, 'Trắng Đen', '42', 20, '2025-07-01 00:28:16', '2025-07-01 00:33:31'),
(53, 56, 'Trắng Gót  Đen', '39', 29, '2025-07-01 00:35:55', '2025-07-11 20:38:24'),
(54, 56, 'Trắng Gót  Đen', '40', 30, '2025-07-01 00:36:07', '2025-07-08 14:59:47'),
(55, 56, 'Trắng Gót  Đen', '41', 50, '2025-07-01 00:36:24', '2025-07-08 14:59:47'),
(56, 56, 'Trắng Gót  Đen', '42', 50, '2025-07-01 00:36:44', '2025-07-08 14:59:47'),
(57, 58, 'Đen Xanh', '39', 10, '2025-07-01 00:44:12', '2025-07-08 15:11:38'),
(58, 58, 'Đen Xanh', '40', 10, '2025-07-01 00:44:25', '2025-07-01 00:47:51'),
(59, 58, 'Đen Xanh', '41', 10, '2025-07-01 00:44:37', '2025-07-01 00:47:51'),
(60, 58, 'Đen Xanh', '42', 10, '2025-07-01 00:44:51', '2025-07-01 00:47:51'),
(61, 57, 'Trắng', '39', 0, '2025-07-01 00:49:53', '2025-07-01 00:49:53'),
(62, 57, 'Trắng', '40', 0, '2025-07-01 00:50:03', '2025-07-01 00:50:03'),
(63, 57, 'Trắng', '41', 0, '2025-07-01 00:50:12', '2025-07-01 00:50:12'),
(64, 52, 'Trắng', '40', 0, '2025-07-01 00:50:52', '2025-07-01 00:50:52'),
(65, 52, 'Xám', '41', 0, '2025-07-01 00:51:01', '2025-07-01 00:51:01'),
(66, 52, 'Trắng', '42', 0, '2025-07-01 00:51:11', '2025-07-01 00:51:11'),
(67, 52, 'Trắng', '43', 0, '2025-07-01 00:51:21', '2025-07-01 00:51:21'),
(68, 63, 'Mã 01', '23 X 14,5 X 9cm', 10, '2025-07-01 00:54:07', '2025-07-01 00:59:16'),
(69, 63, 'Mã 02', '23 X 14,5 X 9cm', 0, '2025-07-01 00:54:42', '2025-07-01 00:54:42'),
(70, 63, 'Mã 03', '23 X 14,5 X 9cm', 0, '2025-07-01 00:55:03', '2025-07-01 00:55:03'),
(71, 64, 'Mã 01', '23 X 6 X 13cm', 30, '2025-07-01 01:05:07', '2025-07-01 01:09:51'),
(72, 69, 'Trắng', '56-58 cm', 10, '2025-07-01 01:12:19', '2025-07-08 15:11:38'),
(73, 69, 'Đen', '56-58 cm', 5, '2025-07-01 01:12:33', '2025-07-01 01:14:51'),
(74, 69, 'Be', '56-58 cm', 5, '2025-07-01 01:12:49', '2025-07-01 01:14:51'),
(75, 70, 'Đen', '63 - 17 - 143 mm', 20, '2025-07-01 01:17:16', '2025-07-01 01:18:45'),
(76, 71, 'Đen Bóng', '145–150 mm', 10, '2025-07-03 16:28:00', '2025-07-08 15:11:38'),
(77, 72, 'Be', 'Vòng đầu 55-60 cm', 20, '2025-07-03 21:54:41', '2025-07-03 21:54:41'),
(78, 73, 'Đen', '1', 10, '2025-07-03 21:56:14', '2025-07-03 21:56:14'),
(79, 73, 'Đen', '2', 10, '2025-07-03 21:56:32', '2025-07-03 21:56:32'),
(80, 73, 'Đen', '3', 10, '2025-07-03 21:56:47', '2025-07-03 21:56:47'),
(81, 61, 'Màu Hồng', '0', 20, '2025-07-03 22:00:16', '2025-07-03 22:00:16'),
(82, 62, 'Trắng', '22 x 6 x 12 cm', 20, '2025-07-03 22:01:20', '2025-07-03 22:01:20'),
(83, 65, 'Mã 01', '28-11-20', 20, '2025-07-03 22:03:56', '2025-07-07 07:18:35'),
(85, 66, 'Hồng', '1', 20, '2025-07-03 22:10:29', '2025-07-07 08:00:22'),
(86, 67, 'Da trăn', '19cm  x 5.5cm x 16cm', 0, '2025-07-03 22:12:09', '2025-07-03 22:12:09'),
(87, 68, 'Xanh', '23 x 7 x 16 cm', 0, '2025-07-03 22:13:21', '2025-07-03 22:13:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cong_ty_giao_hang`
--

CREATE TABLE `cong_ty_giao_hang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) NOT NULL,
  `dia_chi` text DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cong_ty_giao_hang`
--

INSERT INTO `cong_ty_giao_hang` (`id`, `ten`, `dia_chi`, `so_dien_thoai`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Công Ty VNPost', 'Số 5 Phạm Hùng, Mỹ Đình 2, Nam Từ Liêm, Hà Nội,  Việt Nam', '1900545481', 'congtyvnpost@example.com', '2025-05-20 02:32:00', '2025-06-11 04:19:24'),
(2, 'Công Ty Viettel Post', 'Km2. Đại lộ Thăng Long, phường Mễ Trì, quận Nam Từ Liêm, TP. Hà Nội', '0920445321', 'cty_viettel_post@example.com', '2025-05-20 02:32:00', '2025-06-11 05:12:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_khach_hang` bigint(20) UNSIGNED NOT NULL,
  `id_san_pham` bigint(20) UNSIGNED NOT NULL,
  `so_sao` tinyint(4) NOT NULL CHECK (`so_sao` between 1 and 5),
  `noi_dung` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`id`, `id_khach_hang`, `id_san_pham`, `so_sao`, `noi_dung`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 'Sản phẩm rất đẹp và chất lượng!', '2025-05-25 08:27:59', '2025-05-25 08:27:59'),
(2, 1, 2, 4, 'MacBook chạy nhanh, rất hài lòng.', '2025-05-25 08:27:59', '2025-05-25 08:27:59'),
(3, 2, 1, 4, 'Váy khá vừa nhưng màu không như hình.', '2025-05-25 08:27:59', '2025-05-25 08:27:59'),
(4, 2, 3, 3, 'Tai nghe nghe ổn nhưng pin yếu.', '2025-05-25 08:27:59', '2025-05-25 08:27:59'),
(5, 1, 5, 5, 'Áo thun mềm, form chuẩn.', '2025-05-25 08:27:59', '2025-05-25 08:27:59'),
(9, 1, 53, 3, 'Oke', '2025-06-07 23:06:09', '2025-06-07 23:06:09'),
(11, 7, 45, 3, NULL, '2025-06-16 07:41:16', '2025-06-16 07:41:16'),
(12, 7, 46, 4, 'Áo đẹp, giao đúng mẫu', '2025-06-16 07:43:36', '2025-06-16 07:43:36'),
(13, 7, 53, 4, 'Áo thun đẹp, giao hàng nhanh', '2025-06-16 08:25:29', '2025-06-16 08:25:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten`, `mo_ta`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Áo Thun Nữ', 'Danh mục các loại  áo thun nữ', 1, '2025-05-22 23:14:27', '2025-06-03 15:29:31'),
(2, 'Giày thể thao nam', 'Danh mục giày thể thao năng động cho mọi phong cách', 1, '2025-05-22 23:14:27', '2025-06-03 20:57:27'),
(3, 'Túi xách nữ', 'Túi xách nữ thời trang, hợp xu hướng', 1, '2025-05-22 23:14:27', '2025-05-24 20:23:57'),
(4, 'Phụ kiện thời trang', 'Phụ kiện như kính, nón, thắt lưng và trang sức', 1, '2025-05-22 23:14:27', '2025-05-24 20:23:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_giao_hang`
--

CREATE TABLE `don_giao_hang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma` varchar(50) DEFAULT NULL,
  `id_don_hang` bigint(20) UNSIGNED NOT NULL,
  `id_cong_ty_giao_hang` bigint(20) UNSIGNED DEFAULT NULL,
  `ngay_giao` date DEFAULT NULL,
  `trang_thai` enum('Chờ duyệt','Đang giao','Đã giao','Hủy') DEFAULT 'Chờ duyệt',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_giao_hang`
--

INSERT INTO `don_giao_hang` (`id`, `ma`, `id_don_hang`, `id_cong_ty_giao_hang`, `ngay_giao`, `trang_thai`, `created_at`, `updated_at`) VALUES
(29, 'ZMBIRL6W', 26, 1, '2025-06-04', 'Đang giao', '2025-06-04 08:04:00', '2025-06-04 08:58:30'),
(32, 'Q0SDTZJL', 32, 2, '2025-06-12', 'Đã giao', '2025-06-12 12:29:07', '2025-06-12 13:45:14'),
(34, 'DUF7SBW1', 35, 1, '2025-06-15', 'Đang giao', '2025-06-15 16:33:30', '2025-06-15 16:34:32'),
(35, 'VWYNLUMX', 33, 2, '2025-06-15', 'Đã giao', '2025-06-15 16:43:07', '2025-06-15 16:47:00'),
(36, 'JBSNXMLU', 37, 2, '2025-06-16', 'Đang giao', '2025-06-16 14:39:05', '2025-06-16 14:42:24'),
(37, 'KVYMPNY7', 41, 1, '2025-06-30', 'Đã giao', '2025-06-30 14:50:13', '2025-06-30 15:29:21'),
(38, 'K4T4LYP7', 39, 2, '2025-06-30', 'Đã giao', '2025-06-30 15:37:17', '2025-06-30 15:39:41'),
(39, 'P0DZHIBW', 42, 2, '2025-06-30', 'Đã giao', '2025-06-30 15:40:41', '2025-06-30 15:42:22'),
(40, 'MIFFL7XC', 44, 1, '2025-07-08', 'Đã giao', '2025-07-08 03:25:47', '2025-07-08 03:27:47'),
(41, 'QDYD9MPL', 38, 1, '2025-07-08', 'Đang giao', '2025-07-08 08:00:19', '2025-07-08 08:06:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma` varchar(50) DEFAULT NULL,
  `id_khach_hang` bigint(20) UNSIGNED NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `dia_chi_nhan` text NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `ngay_dat` date DEFAULT NULL,
  `tong_tien` decimal(15,0) DEFAULT NULL,
  `trang_thai` enum('Chờ duyệt','Đã duyệt','Đang giao','Hoàn thành','Hủy') DEFAULT NULL,
  `thanh_toan` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `ma`, `id_khach_hang`, `ten_nguoi_nhan`, `dia_chi_nhan`, `sdt`, `ngay_dat`, `tong_tien`, `trang_thai`, `thanh_toan`, `created_at`, `updated_at`) VALUES
(26, 'ZMBIRL6W', 1, 'Nguyễn Quốc Cường', 'Trà Vinh', '0969898713', '2025-06-04', 360000, 'Hoàn thành', 'Thanh toán khi nhận hàng', '2025-06-04 15:03:47', '2025-06-04 15:59:21'),
(31, 'HNNMVGUB', 1, 'Nguyễn Quốc Cường', 'Hanoi', '0399403073', '2025-06-11', 540000, 'Hủy', 'Thanh toán khi nhận hàng', '2025-06-11 12:47:15', '2025-06-14 17:22:27'),
(32, 'Q0SDTZJL', 7, 'Nguyễn Thị Cẩm Tiên', 'Thành Phố Trà Vinh', '0969898713', '2025-06-12', 900000, 'Hoàn thành', 'Thanh toán khi nhận hàng', '2025-06-12 19:28:27', '2025-06-12 20:45:14'),
(33, 'VWYNLUMX', 7, 'Nguyễn Thị Cẩm Tiên', 'Thành Phố Trà Vinh', '0969898713', '2025-06-12', 895000, 'Hoàn thành', 'Thanh toán khi nhận hàng', '2025-06-12 22:48:29', '2025-06-15 23:47:00'),
(34, 'UIGQY9VN', 1, 'Nguyễn Quốc Cường', 'Hanoi', '0399403073', '2025-06-14', 360000, 'Hủy', 'Thanh toán khi nhận hàng', '2025-06-14 17:23:49', '2025-06-14 17:24:13'),
(35, 'DUF7SBW1', 1, 'Nguyễn Quốc Cường', 'Hanoi', '0399403073', '2025-06-14', 180000, 'Đang giao', 'Thanh toán khi nhận hàng', '2025-06-14 17:28:59', '2025-06-15 23:34:32'),
(37, 'JBSNXMLU', 1, 'Nguyễn Quốc Cường', 'Hanoi', '0399403073', '2025-06-15', 300000, 'Đang giao', 'Thanh toán khi nhận hàng', '2025-06-15 23:45:41', '2025-06-16 21:42:24'),
(38, 'QDYD9MPL', 7, 'Nguyễn Thị Cẩm Tiên', 'Thành Phố Trà Vinh', '0969898713', '2025-06-16', 870000, 'Đang giao', 'Thanh toán khi nhận hàng', '2025-06-16 08:04:40', '2025-07-08 15:06:10'),
(39, 'K4T4LYP7', 1, 'Nguyễn Quốc Cường', 'Hanoi', '0399403073', '2025-06-30', 360000, 'Hoàn thành', 'Thanh toán khi nhận hàng', '2025-06-30 10:39:07', '2025-06-30 22:39:41'),
(40, 'JCPB9PQQ', 1, 'Nguyễn Quốc Cường', 'Hanoi', '0399403073', '2025-06-30', 13930000, 'Hủy', 'Thanh toán khi nhận hàng', '2025-06-30 21:12:23', '2025-06-30 21:44:02'),
(41, 'KVYMPNY7', 1, 'Nguyễn Quốc Cường', 'Hanoi', '0399403073', '2025-06-30', 379000, 'Hoàn thành', 'Thanh toán khi nhận hàng', '2025-06-30 21:45:19', '2025-06-30 22:29:21'),
(42, 'P0DZHIBW', 1, 'Nguyễn Quốc Cường', 'Hanoi', '0399403073', '2025-06-30', 557000, 'Hoàn thành', 'Thanh toán khi nhận hàng', '2025-06-30 22:36:03', '2025-06-30 22:42:22'),
(43, 'RNDURCLP', 7, 'Nguyễn Thị Cẩm Tiên', 'Thành Phố Trà Vinh', '0969898713', '2025-07-07', 1319000, 'Hủy', 'Thanh toán khi nhận hàng', '2025-07-07 09:20:41', '2025-07-08 15:11:38'),
(44, 'MIFFL7XC', 5, 'Dương Ngọc Sơn', 'Bắc Giang', '0348521001', '2025-07-08', 379000, 'Hoàn thành', 'Thanh toán khi nhận hàng', '2025-07-08 09:52:42', '2025-07-08 10:27:47'),
(45, 'T7JJS9KI', 5, 'Dương Ngọc Sơn', 'Bắc Giang', '0348521001', '2025-07-08', 189000, 'Hủy', 'Thanh toán khi nhận hàng', '2025-07-08 11:10:26', '2025-07-08 11:10:40'),
(46, '396PNZAV', 7, 'Nguyễn Thị Cẩm Tiên', 'Thành Phố Trà Vinh', '0969898713', '2025-07-08', 627000, 'Chờ duyệt', 'Thanh toán khi nhận hàng', '2025-07-08 15:10:56', '2025-07-08 15:10:56'),
(47, 'RS6PIZ1F', 5, 'Dương Ngọc Sơn', 'Bắc Giang', '0348521001', '2025-07-11', 180000, 'Hủy', 'Thanh toán khi nhận hàng', '2025-07-11 20:37:29', '2025-07-11 20:37:57'),
(48, 'FQL5EFF7', 5, 'Dương Ngọc Sơn', 'Bắc Giang', '0348521001', '2025-07-11', 398000, 'Chờ duyệt', 'Thanh toán khi nhận hàng', '2025-07-11 20:38:24', '2025-07-11 20:38:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_nhap_nguyen_lieu`
--

CREATE TABLE `don_nhap_nguyen_lieu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma` varchar(50) DEFAULT NULL,
  `id_nha_cung_cap` bigint(20) UNSIGNED NOT NULL,
  `ngay_nhap` date DEFAULT NULL,
  `tong_tien` decimal(15,0) DEFAULT NULL,
  `trang_thai` enum('Chờ duyệt','Đã duyệt','Hoàn thành','Hủy') DEFAULT 'Chờ duyệt',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_nhap_nguyen_lieu`
--

INSERT INTO `don_nhap_nguyen_lieu` (`id`, `ma`, `id_nha_cung_cap`, `ngay_nhap`, `tong_tien`, `trang_thai`, `created_at`, `updated_at`) VALUES
(18, 'NLSXAO1', 1, '2025-06-04', 20600000, 'Hoàn thành', '2025-06-04 11:49:47', '2025-06-04 12:27:25'),
(19, 'NLSXAO2', 2, '2025-06-04', 32250000, 'Hoàn thành', '2025-06-04 13:40:37', '2025-06-04 13:58:25'),
(25, NULL, 2, '2025-06-15', 11730000, 'Hoàn thành', '2025-06-15 22:44:55', '2025-06-15 22:57:15'),
(26, NULL, 2, '2025-06-30', 55700000, 'Hoàn thành', '2025-06-30 10:52:50', '2025-06-30 11:04:38'),
(27, NULL, 2, '2025-07-01', 300000, 'Hoàn thành', '2025-06-30 11:09:40', '2025-06-30 11:11:06'),
(28, NULL, 10, '2025-06-30', 279000000, 'Hoàn thành', '2025-06-30 23:36:14', '2025-06-30 23:39:41'),
(29, NULL, 1, '2025-07-02', 15000000, 'Hoàn thành', '2025-07-01 00:11:17', '2025-07-01 00:13:02'),
(30, NULL, 11, '2025-07-03', 211000000, 'Hoàn thành', '2025-07-03 21:47:58', '2025-07-03 21:49:26'),
(32, NULL, 2, '2025-07-07', 20000000, 'Chờ duyệt', '2025-07-07 11:08:38', '2025-07-07 11:09:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_san_xuat`
--

CREATE TABLE `don_san_xuat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_san_pham` bigint(20) UNSIGNED DEFAULT NULL,
  `ma` varchar(50) DEFAULT NULL,
  `ngay_bat_dau` date DEFAULT NULL,
  `ngay_ket_thuc` date DEFAULT NULL,
  `trang_thai` enum('Chờ duyệt','Đang sản xuất','Hoàn thành','Hủy') DEFAULT 'Chờ duyệt',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_san_xuat`
--

INSERT INTO `don_san_xuat` (`id`, `id_san_pham`, `ma`, `ngay_bat_dau`, `ngay_ket_thuc`, `trang_thai`, `created_at`, `updated_at`) VALUES
(32, 44, NULL, '2025-06-09', '2025-06-19', 'Hoàn thành', '2025-06-15 00:14:42', '2025-06-30 22:55:04'),
(33, 53, NULL, '2025-06-15', '2025-06-26', 'Đang sản xuất', '2025-06-15 21:59:46', '2025-07-07 10:16:52'),
(34, 53, NULL, '2025-06-15', '2025-06-27', 'Hoàn thành', '2025-06-15 22:58:27', '2025-06-15 23:06:19'),
(35, 45, NULL, '2025-06-30', '2025-07-12', 'Hoàn thành', '2025-06-30 10:42:17', '2025-06-30 11:16:53'),
(36, 60, NULL, '2025-07-01', '2025-07-11', 'Hoàn thành', '2025-06-30 20:57:27', '2025-06-30 21:02:18'),
(37, 60, NULL, '2025-07-01', '2025-07-19', 'Hoàn thành', '2025-06-30 21:25:43', '2025-06-30 21:29:04'),
(39, 59, NULL, '2025-07-05', '2025-07-12', 'Hoàn thành', '2025-06-30 23:00:35', '2025-06-30 23:44:55'),
(40, 56, NULL, '2025-07-01', '2025-07-16', 'Hoàn thành', '2025-06-30 23:48:24', '2025-07-08 14:59:47'),
(41, 58, NULL, '2025-07-02', '2025-08-09', 'Chờ duyệt', '2025-07-01 00:06:21', '2025-07-01 00:06:21'),
(42, 54, NULL, '2025-07-10', '2025-07-16', 'Hoàn thành', '2025-07-01 00:08:01', '2025-07-01 00:18:43'),
(43, 55, NULL, '2025-07-01', '2025-07-31', 'Hoàn thành', '2025-07-01 00:29:39', '2025-07-01 00:33:31'),
(44, 56, NULL, '2025-07-01', '2025-07-23', 'Hoàn thành', '2025-07-01 00:37:25', '2025-07-01 00:39:56'),
(45, 58, NULL, '2025-07-03', '2025-07-22', 'Hoàn thành', '2025-07-01 00:45:22', '2025-07-01 00:47:51'),
(46, 63, NULL, '2025-07-02', '2025-07-25', 'Hoàn thành', '2025-07-01 00:56:36', '2025-07-01 00:59:16'),
(47, 64, NULL, '2025-07-19', '2025-07-29', 'Hoàn thành', '2025-07-01 01:06:07', '2025-07-01 01:09:51'),
(48, 69, NULL, '2025-07-23', '2025-07-26', 'Hoàn thành', '2025-07-01 01:13:07', '2025-07-01 01:14:51'),
(49, 70, NULL, '2025-07-15', '2025-07-25', 'Hoàn thành', '2025-07-01 01:17:44', '2025-07-01 01:18:45'),
(50, 71, NULL, '2025-07-03', '2025-07-23', 'Hoàn thành', '2025-07-03 16:28:45', '2025-07-03 21:52:01'),
(52, 65, NULL, '2025-07-07', '2025-07-29', 'Hoàn thành', '2025-07-07 07:13:31', '2025-07-07 07:18:35'),
(53, 66, NULL, '2025-07-07', '2025-07-19', 'Hoàn thành', '2025-07-07 07:53:50', '2025-07-07 08:00:22'),
(54, 44, NULL, '2025-07-09', '2025-07-17', 'Chờ duyệt', '2025-07-08 11:07:56', '2025-07-08 11:07:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `hinh_anh_san_pham`
--

CREATE TABLE `hinh_anh_san_pham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_san_pham` bigint(20) UNSIGNED NOT NULL,
  `duong_dan_hinh` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_anh_san_pham`
--

INSERT INTO `hinh_anh_san_pham` (`id`, `id_san_pham`, `duong_dan_hinh`, `created_at`, `updated_at`) VALUES
(4, 4, 'images/mayhutbui.jpg', '2025-05-20 02:32:53', '2025-05-20 02:32:53'),
(5, 5, 'images/aothun.jpg', '2025-05-20 02:32:53', '2025-05-20 02:32:53'),
(7, 6, 'hinh_san_pham/yUGMvW9s3Mlk3tP2v42GFElYyoaT5lksAsuktAxD.png', '2025-05-23 12:42:45', '2025-05-23 12:42:45'),
(8, 6, 'hinh_san_pham/Az8kSfYYQHpi8nkXPLL5YCC3MR9MqWZzqDj7Ign5.png', '2025-05-23 12:46:32', '2025-05-23 12:46:32'),
(10, 3, 'hinh_san_pham/Agih2GP5FhYPAYvtpOvodeztbzPRM96QU8C66aee.jpg', '2025-05-24 13:19:20', '2025-05-24 13:19:20'),
(23, 44, 'hinh_san_pham/yBT4HofB7XE14tGaPyoy9mPqmTWGXjMyxASCmvji.jpg', '2025-06-03 13:24:29', '2025-06-03 13:24:29'),
(24, 45, 'hinh_san_pham/TJwJ9JjIOnADnF7TincZh0nA5N0jg24WRYqCdFL3.jpg', '2025-06-03 13:34:19', '2025-06-03 13:34:19'),
(25, 46, 'hinh_san_pham/n9QElcJRTCDrbm3w41J6kMUNfvbYWOJOHWDtNgzu.jpg', '2025-06-03 13:37:55', '2025-06-03 13:37:55'),
(26, 47, 'hinh_san_pham/2Yj99jqUBSOQ8ydPmoK6joGHeVs5ALYochOy55kh.jpg', '2025-06-03 13:43:26', '2025-06-03 13:43:26'),
(27, 48, 'hinh_san_pham/PpTELgFub2F1aQFRG5sUYgc3Q03nlS8b9nT8sRKE.jpg', '2025-06-03 13:48:51', '2025-06-03 13:48:51'),
(28, 49, 'hinh_san_pham/dShTX8W2hYpftDVj15xlD7ZYWlU5kNj7qhnYVzp9.jpg', '2025-06-03 13:51:38', '2025-06-03 13:51:38'),
(29, 50, 'hinh_san_pham/6HIJaKeeTby7iFIxsSw8GfSoOqLAFYrRdABZN6UY.jpg', '2025-06-03 13:53:08', '2025-06-03 13:53:08'),
(30, 51, 'hinh_san_pham/obkxCa0ZaTLb53DYN22r2ScjtnMIjklPXP3Z1Fnl.jpg', '2025-06-03 13:54:56', '2025-06-03 13:54:56'),
(31, 52, 'hinh_san_pham/aGKU4xXzncVsTWsgkEB7Ioy9BgLLiLQjdOtZVMla.jpg', '2025-06-03 13:58:25', '2025-06-03 13:58:25'),
(32, 53, 'hinh_san_pham/qG0C5VIZhpRDSnurtSVy5qqI0vHmN4SZTJ72nXGQ.jpg', '2025-06-03 14:01:22', '2025-06-03 14:01:22'),
(33, 54, 'hinh_san_pham/81EJH1Q5eq4wb6lfi82JtypjFk2W4DdI2fMzICHU.jpg', '2025-06-03 14:08:50', '2025-06-03 14:08:50'),
(34, 55, 'hinh_san_pham/TpP9Docn320rnHyrHEhr55et9IU3LWVDIyPoAdf4.jpg', '2025-06-03 14:10:34', '2025-06-03 14:10:34'),
(35, 56, 'hinh_san_pham/CRzGIWlaNE9oBiN91NsFGmtJLqfe9B6gZSvQjRqX.jpg', '2025-06-03 14:13:13', '2025-06-03 14:13:13'),
(36, 57, 'hinh_san_pham/VDVxyYM3bIrSAPD8SYPYaRiJ45UwWlgnUJb7OKE6.jpg', '2025-06-03 14:14:51', '2025-06-03 14:14:51'),
(37, 58, 'hinh_san_pham/UglQp1eWGn3OGE3P6rc629ZhtfM0bDb2OFDvudQZ.jpg', '2025-06-03 14:17:11', '2025-06-03 14:17:11'),
(38, 59, 'hinh_san_pham/SVlfsYQFePgG0ZF4YLcWAEGHRKXAgXJgaxI81PsC.jpg', '2025-06-03 14:18:39', '2025-06-03 14:18:39'),
(39, 60, 'hinh_san_pham/h5agdaDK0LbsuFW5gPN3h0e9phF27vAryrc679rD.jpg', '2025-06-03 14:21:13', '2025-06-03 14:21:13'),
(40, 61, 'hinh_san_pham/ijfyTccQ71Va29DT0M9FiAbEmkpTc8h18PYcSDFm.jpg', '2025-06-03 14:24:20', '2025-06-03 14:24:20'),
(41, 62, 'hinh_san_pham/V44brOW4gAXZ9e0KtO2408hLtHMBiOwU3f0Y6uLm.jpg', '2025-06-03 14:26:04', '2025-06-03 14:26:04'),
(42, 63, 'hinh_san_pham/NCLNxqTKq6izcvbWDcTISWX3bD2PsaGy6X2j9H8C.jpg', '2025-06-03 14:27:36', '2025-06-03 14:27:36'),
(43, 64, 'hinh_san_pham/A6TSy8OqT5ofWAVOEbOdiy4DU9PvfJlqIxWTNXZj.jpg', '2025-06-03 14:29:46', '2025-06-03 14:29:46'),
(44, 65, 'hinh_san_pham/7zzEtxBbzVkoPSJv3LKI3XZ2v6ZLzP4xMzD7kJW7.jpg', '2025-06-03 14:31:39', '2025-06-03 14:31:39'),
(45, 66, 'hinh_san_pham/wKqkIS0LnF9OnCncH9SxKbhvcS0y7StLG3rVKFnK.jpg', '2025-06-03 14:33:17', '2025-06-03 14:33:17'),
(46, 67, 'hinh_san_pham/CJs1zKGAxXufZ78XT9lV0RUowNR6vGySNvajtOR7.jpg', '2025-06-03 14:35:23', '2025-06-03 14:35:23'),
(47, 68, 'hinh_san_pham/DVUoqyLlmb2VigPp90wJgXdhMQjXqj12gaBC4nvm.jpg', '2025-06-03 14:37:37', '2025-06-03 14:37:37'),
(48, 69, 'hinh_san_pham/2D2Dtp2aZldBLPe8LSiQ5teyHk0t8mZgRiLHll06.jpg', '2025-06-03 14:43:30', '2025-06-03 14:43:30'),
(49, 70, 'hinh_san_pham/awJvThwKgDV8X8hBTP6yZoAgLL4kh9gFeHObap3N.jpg', '2025-06-03 14:46:31', '2025-06-03 14:46:31'),
(50, 71, 'hinh_san_pham/wFMEM28GrUBJu2D4miax9PC3Ix7BrESGIyeeemQQ.jpg', '2025-06-03 14:48:39', '2025-06-03 14:48:39'),
(51, 72, 'hinh_san_pham/BeHp0znliTwNPmNRkjaCKa0LABFEqu5GR9D3c87X.jpg', '2025-06-03 14:54:18', '2025-06-03 14:54:18'),
(52, 73, 'hinh_san_pham/EpoxKVOYpHUllHrPfDqviOpXzUD5tVran8SGX3RE.jpg', '2025-06-03 15:07:34', '2025-06-03 15:07:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_nguoi_dung` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `id_nguoi_dung`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-06-02 07:47:10', '2025-06-02 07:47:10'),
(2, 5, '2025-06-02 07:47:10', '2025-06-02 07:47:10'),
(5, 25, '2025-06-02 13:50:37', '2025-06-02 13:50:37'),
(6, 26, '2025-06-05 08:16:16', '2025-06-05 08:16:16'),
(7, 27, '2025-06-07 21:59:45', '2025-06-07 21:59:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lo_nguyen_lieu`
--

CREATE TABLE `lo_nguyen_lieu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_don_nhap` bigint(20) UNSIGNED NOT NULL,
  `id_nguyen_lieu_ncc` bigint(20) UNSIGNED DEFAULT NULL,
  `so_luong_nhap` decimal(10,2) DEFAULT NULL,
  `so_luong_su_dung` decimal(10,2) DEFAULT 0.00,
  `ngay_nhap` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lo_nguyen_lieu`
--

INSERT INTO `lo_nguyen_lieu` (`id`, `id_don_nhap`, `id_nguyen_lieu_ncc`, `so_luong_nhap`, `so_luong_su_dung`, `ngay_nhap`, `created_at`, `updated_at`) VALUES
(27, 18, 8, 500.00, 330.00, NULL, '2025-06-04 11:55:54', '2025-07-01 01:09:26'),
(28, 18, 9, 300.00, 180.00, NULL, '2025-06-04 11:56:16', '2025-06-14 19:36:17'),
(29, 19, 4, 500.00, 100.00, NULL, '2025-06-04 13:54:34', '2025-07-01 01:14:00'),
(30, 19, 2, 500.00, 120.00, NULL, '2025-06-04 13:54:50', '2025-06-14 19:35:10'),
(31, 19, 5, 500.00, 260.00, NULL, '2025-06-04 13:55:04', '2025-06-30 21:00:31'),
(32, 22, 15, 100.00, 0.00, NULL, '2025-06-15 22:02:44', '2025-06-16 00:30:33'),
(35, 24, 19, 100.00, 0.00, NULL, '2025-06-15 22:28:48', '2025-06-15 22:28:48'),
(37, 24, 20, 100.00, 0.00, NULL, '2025-06-15 22:29:03', '2025-06-15 22:29:03'),
(45, 24, 11, 3.00, 0.00, NULL, '2025-06-15 22:39:01', '2025-06-15 22:39:01'),
(46, 24, 11, 3.00, 0.00, NULL, '2025-06-15 22:42:37', '2025-06-15 22:42:37'),
(48, 24, 11, 4.00, 0.00, NULL, '2025-06-15 22:42:58', '2025-06-15 22:42:58'),
(49, 24, 11, 3.00, 0.00, NULL, '2025-06-15 22:43:07', '2025-06-15 22:43:07'),
(50, 24, 4, 3.00, 0.00, NULL, '2025-06-15 22:43:14', '2025-06-15 22:43:14'),
(52, 24, 4, 3.00, 0.00, NULL, '2025-06-15 22:43:30', '2025-06-15 22:43:30'),
(53, 25, 5, 100.00, 0.00, NULL, '2025-06-15 22:45:11', '2025-06-15 23:01:55'),
(55, 25, 19, 100.00, 100.00, NULL, '2025-06-15 22:45:27', '2025-06-15 23:03:57'),
(56, 25, 20, 100.00, 100.00, NULL, '2025-06-15 22:48:04', '2025-06-15 23:04:45'),
(60, 25, 11, 100.00, 98.00, NULL, '2025-06-15 22:49:17', '2025-06-16 00:48:16'),
(61, 26, 19, 100.00, 65.00, NULL, '2025-06-30 10:54:05', '2025-06-30 22:53:55'),
(62, 26, 11, 100.00, 90.00, NULL, '2025-06-30 10:54:23', '2025-07-07 07:17:07'),
(63, 26, 13, 100.00, 80.00, NULL, '2025-06-30 11:04:26', '2025-07-01 00:57:30'),
(64, 27, 20, 1000.00, 460.00, NULL, '2025-06-30 11:09:59', '2025-07-07 07:20:27'),
(65, 28, 21, 1000.00, 0.00, NULL, '2025-06-30 23:36:43', '2025-06-30 23:36:43'),
(66, 28, 23, 1000.00, 610.00, NULL, '2025-06-30 23:36:56', '2025-07-07 07:59:25'),
(67, 28, 22, 1000.00, 80.00, NULL, '2025-06-30 23:37:08', '2025-07-07 07:16:01'),
(68, 28, 24, 1000.00, 120.00, NULL, '2025-06-30 23:37:28', '2025-07-01 00:46:21'),
(69, 28, 25, 1000.00, 0.00, NULL, '2025-06-30 23:37:39', '2025-06-30 23:37:39'),
(70, 28, 26, 1000.00, 290.00, NULL, '2025-06-30 23:37:46', '2025-07-07 07:20:47'),
(71, 28, 27, 1000.00, 400.00, NULL, '2025-06-30 23:37:59', '2025-07-01 00:16:18'),
(72, 28, 28, 1000.00, 520.00, NULL, '2025-06-30 23:38:09', '2025-07-01 00:46:55'),
(73, 28, 29, 1000.00, 130.00, NULL, '2025-06-30 23:38:19', '2025-07-01 00:39:16'),
(74, 28, 30, 1000.00, 30.00, NULL, '2025-06-30 23:38:26', '2025-07-07 07:17:39'),
(75, 28, 31, 1000.00, 10.00, NULL, '2025-06-30 23:38:32', '2025-07-07 07:59:42'),
(76, 29, 15, 2000.00, 400.00, NULL, '2025-07-01 00:11:33', '2025-07-07 07:59:57'),
(78, 29, 16, 1000.00, 60.00, NULL, '2025-07-01 00:12:46', '2025-07-01 00:57:50'),
(79, 29, 17, 1000.00, 60.00, NULL, '2025-07-01 00:12:53', '2025-07-01 00:58:34'),
(80, 30, 32, 1000.00, 10.00, NULL, '2025-07-03 21:48:12', '2025-07-03 21:50:17'),
(81, 30, 33, 1000.00, 0.00, NULL, '2025-07-03 21:48:23', '2025-07-03 21:48:23'),
(82, 30, 34, 1000.00, 10.00, NULL, '2025-07-03 21:48:29', '2025-07-03 21:49:54'),
(83, 30, 35, 1000.00, 0.00, NULL, '2025-07-03 21:48:37', '2025-07-03 21:48:37'),
(84, 30, 36, 1000.00, 10.00, NULL, '2025-07-03 21:48:42', '2025-07-03 21:51:16'),
(85, 30, 37, 1000.00, 10.00, NULL, '2025-07-03 21:48:49', '2025-07-03 21:51:28'),
(86, 32, 2, 1000.00, 0.00, NULL, '2025-07-07 11:09:03', '2025-07-07 11:09:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lo_trinh_don`
--

CREATE TABLE `lo_trinh_don` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_don_giao_hang` bigint(20) UNSIGNED NOT NULL,
  `thoi_gian` datetime NOT NULL DEFAULT current_timestamp(),
  `trang_thai` varchar(100) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `id_nhan_vien_giao_hang` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lo_trinh_don`
--

INSERT INTO `lo_trinh_don` (`id`, `id_don_giao_hang`, `thoi_gian`, `trang_thai`, `mo_ta`, `id_nhan_vien_giao_hang`, `created_at`, `updated_at`) VALUES
(68, 28, '2025-06-04 15:02:29', 'Khởi tạo đơn', 'Đơn hàng đã được tạo và chuyển sang đơn giao hàng.', NULL, '2025-06-04 15:02:29', '2025-06-04 15:02:29'),
(69, 29, '2025-06-04 15:04:00', 'Khởi tạo đơn', 'Đơn hàng đã được tạo và chuyển sang đơn giao hàng.', NULL, '2025-06-04 15:04:00', '2025-06-04 15:04:00'),
(70, 29, '2025-06-04 15:58:30', 'Đã phân công', 'Đơn đã được phân công cho nhân viên.', 1, '2025-06-04 15:58:30', '2025-06-04 15:58:30'),
(71, 29, '2025-06-04 15:59:00', 'Đã giao', 'adghh', 1, '2025-06-04 15:59:21', '2025-06-04 15:59:21'),
(72, 29, '2025-06-04 15:59:35', 'Đang chuyển', 'Chuyển giao cho nhân viên khác', 5, '2025-06-04 15:59:35', '2025-06-04 15:59:35'),
(84, 32, '2025-06-12 19:29:07', 'Khởi tạo đơn', 'Đơn hàng đã được tạo và chuyển sang đơn giao hàng.', NULL, '2025-06-12 19:29:07', '2025-06-12 19:29:07'),
(85, 32, '2025-06-12 20:27:03', 'Đã phân công', 'Đơn đã được phân công cho nhân viên.', 3, '2025-06-12 20:27:03', '2025-06-12 20:27:03'),
(86, 32, '2025-06-12 20:43:00', 'Đang giao', 'Đơn hàng đang đến kho TP HCM', 3, '2025-06-12 20:44:41', '2025-06-12 20:44:41'),
(87, 32, '2025-06-12 20:44:00', 'Đã giao', 'Đơn hàng đã giao cho kho trung chuyển HCM', 3, '2025-06-12 20:45:14', '2025-06-12 20:45:14'),
(88, 32, '2025-06-12 20:46:24', 'Đang chuyển', 'Chuyển giao cho nhân viên khác', 6, '2025-06-12 20:46:24', '2025-06-12 20:46:24'),
(89, 33, '2025-06-14 20:50:37', 'Khởi tạo đơn', 'Đơn hàng đã được tạo và chuyển sang đơn giao hàng.', NULL, '2025-06-14 20:50:37', '2025-06-14 20:50:37'),
(90, 34, '2025-06-15 23:33:30', 'Khởi tạo đơn', 'Đơn hàng đã được tạo và chuyển sang đơn giao hàng.', NULL, '2025-06-15 23:33:30', '2025-06-15 23:33:30'),
(91, 34, '2025-06-15 23:34:32', 'Đã phân công', 'Đơn đã được phân công cho nhân viên.', 1, '2025-06-15 23:34:32', '2025-06-15 23:34:32'),
(92, 35, '2025-06-15 23:43:07', 'Khởi tạo đơn', 'Đơn hàng đã được tạo và chuyển sang đơn giao hàng.', NULL, '2025-06-15 23:43:07', '2025-06-15 23:43:07'),
(93, 35, '2025-06-15 23:43:57', 'Đã phân công', 'Đơn đã được phân công cho nhân viên.', 3, '2025-06-15 23:43:57', '2025-06-15 23:43:57'),
(94, 35, '2025-06-15 23:44:00', 'Đang giao', 'Đang đến kho Hồ Chí Minh', 3, '2025-06-15 23:45:03', '2025-06-15 23:45:03'),
(95, 35, '2025-06-15 23:45:00', 'Đã giao', 'Đã đến kho Hồ Chí Minh', 3, '2025-06-15 23:47:00', '2025-06-15 23:47:00'),
(96, 35, '2025-06-15 23:47:11', 'Đang chuyển', 'Chuyển giao cho nhân viên khác', 6, '2025-06-15 23:47:11', '2025-06-15 23:47:11'),
(97, 35, '2025-06-15 23:47:00', 'Đang giao', 'Đang đến kho Trà Vinh', 6, '2025-06-15 23:48:22', '2025-06-15 23:48:22'),
(98, 35, '2025-06-15 23:48:00', 'Đã giao', 'Đã đến kho Trà Vinh', 6, '2025-06-15 23:48:48', '2025-06-15 23:48:48'),
(99, 36, '2025-06-16 21:39:05', 'Khởi tạo đơn', 'Đơn hàng đã được tạo và chuyển sang đơn giao hàng.', NULL, '2025-06-16 21:39:05', '2025-06-16 21:39:05'),
(100, 36, '2025-06-16 21:42:24', 'Đã phân công', 'Đơn đã được phân công cho nhân viên.', 3, '2025-06-16 21:42:24', '2025-06-16 21:42:24'),
(101, 37, '2025-06-30 21:50:13', 'Khởi tạo đơn', 'Đơn hàng đã được tạo và chuyển sang đơn giao hàng.', NULL, '2025-06-30 21:50:13', '2025-06-30 21:50:13'),
(102, 37, '2025-06-30 21:51:02', 'Đã phân công', 'Đơn đã được phân công cho nhân viên.', 1, '2025-06-30 21:51:02', '2025-06-30 21:51:02'),
(103, 37, '2025-06-30 22:27:00', 'Đang giao', 'Đang giao đến kho Hải Phòng', 1, '2025-06-30 22:27:49', '2025-06-30 22:27:49'),
(104, 37, '2025-06-30 22:27:00', 'Đang giao', 'Đang giao đến kho Hồ Chí Minh', 1, '2025-06-30 22:28:30', '2025-06-30 22:28:30'),
(105, 37, '2025-06-30 22:28:00', 'Đã giao', 'Đã giao đến Kho Hồ Chí Minh', 1, '2025-06-30 22:29:21', '2025-06-30 22:29:21'),
(106, 37, '2025-06-30 22:29:33', 'Đang chuyển', 'Chuyển giao cho nhân viên khác', 5, '2025-06-30 22:29:33', '2025-06-30 22:29:33'),
(107, 37, '2025-06-30 22:33:00', 'Đang giao', 'Đang giao đến kho Châu Thành', 5, '2025-06-30 22:33:27', '2025-06-30 22:33:27'),
(108, 37, '2025-06-30 22:33:00', 'Đã giao', 'Đã giao cho kho Châu Thành', 5, '2025-06-30 22:33:53', '2025-06-30 22:33:53'),
(109, 38, '2025-06-30 22:37:17', 'Khởi tạo đơn', 'Đơn hàng đã được tạo và chuyển sang đơn giao hàng.', NULL, '2025-06-30 22:37:17', '2025-06-30 22:37:17'),
(110, 38, '2025-06-30 22:38:09', 'Đã phân công', 'Đơn đã được phân công cho nhân viên.', 3, '2025-06-30 22:38:09', '2025-06-30 22:38:09'),
(111, 38, '2025-06-30 22:38:00', 'Đang giao', 'Đang trung chuyển đến kho Hà Nội', 3, '2025-06-30 22:39:17', '2025-06-30 22:39:17'),
(112, 38, '2025-06-30 22:39:00', 'Đã giao', 'Đã giao cho Kho Hồ Chí Minh', 3, '2025-06-30 22:39:41', '2025-06-30 22:39:41'),
(113, 39, '2025-06-30 22:40:41', 'Khởi tạo đơn', 'Đơn hàng đã được tạo và chuyển sang đơn giao hàng.', NULL, '2025-06-30 22:40:41', '2025-06-30 22:40:41'),
(114, 39, '2025-06-30 22:41:07', 'Đã phân công', 'Đơn đã được phân công cho nhân viên.', 6, '2025-06-30 22:41:07', '2025-06-30 22:41:07'),
(115, 39, '2025-06-30 22:41:00', 'Đang giao', 'Đang trung chuyển đến kho Hồ Chí Minh', 6, '2025-06-30 22:41:58', '2025-06-30 22:41:58'),
(116, 39, '2025-06-30 22:42:00', 'Đã giao', 'Đã Giao cho kho Trà Vinh', 6, '2025-06-30 22:42:22', '2025-06-30 22:42:22'),
(117, 39, '2025-06-30 22:42:33', 'Đang chuyển', 'Chuyển giao cho nhân viên khác', 3, '2025-06-30 22:42:33', '2025-06-30 22:42:33'),
(118, 39, '2025-06-30 22:42:00', 'Đang giao', 'Đang chuyển đến kho Châu Thành', 3, '2025-06-30 22:43:15', '2025-06-30 22:43:15'),
(119, 39, '2025-06-30 22:43:00', 'Đã giao', 'Đã giao cho  kho Châu Thành', 3, '2025-06-30 22:43:33', '2025-06-30 22:43:33'),
(120, 40, '2025-07-08 10:25:47', 'Khởi tạo đơn', 'Đơn hàng đã được tạo và chuyển sang đơn giao hàng.', NULL, '2025-07-08 10:25:47', '2025-07-08 10:25:47'),
(121, 40, '2025-07-08 10:26:31', 'Đã phân công', 'Đơn đã được phân công cho nhân viên.', 1, '2025-07-08 10:26:31', '2025-07-08 10:26:31'),
(122, 40, '2025-07-08 10:26:00', 'Đang giao', 'Đang trung chuyển đến kho HCM', 1, '2025-07-08 10:27:24', '2025-07-08 10:27:24'),
(123, 40, '2025-07-08 10:27:00', 'Đã giao', 'Đã giao đến kho HCM', 1, '2025-07-08 10:27:47', '2025-07-08 10:27:47'),
(124, 40, '2025-07-08 10:27:52', 'Đang chuyển', 'Chuyển giao cho nhân viên khác', 5, '2025-07-08 10:27:52', '2025-07-08 10:27:52'),
(125, 40, '2025-07-08 10:28:00', 'Đang giao', 'Đang đến kho trung chuyển Vĩnh Long', 5, '2025-07-08 10:28:34', '2025-07-08 10:28:34'),
(126, 41, '2025-07-08 15:00:19', 'Khởi tạo đơn', 'Đơn hàng đã được tạo và chuyển sang đơn giao hàng.', NULL, '2025-07-08 15:00:19', '2025-07-08 15:00:19'),
(127, 41, '2025-07-08 15:06:10', 'Đã phân công', 'Đơn đã được phân công cho nhân viên.', 1, '2025-07-08 15:06:10', '2025-07-08 15:06:10'),
(128, 41, '2025-07-08 15:07:00', 'Đang giao', 'Đang đến kho trung chuyển HCM', 1, '2025-07-08 15:07:48', '2025-07-08 15:07:48'),
(129, 41, '2025-07-08 15:08:13', 'Đang chuyển', 'Chuyển giao cho nhân viên khác', 5, '2025-07-08 15:08:13', '2025-07-08 15:08:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_05_20_211647_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyen_lieu_don_san_xuat`
--

CREATE TABLE `nguyen_lieu_don_san_xuat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_don_san_xuat` bigint(20) UNSIGNED NOT NULL,
  `id_lo_nguyen_lieu` bigint(20) UNSIGNED NOT NULL,
  `so_luong` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyen_lieu_don_san_xuat`
--

INSERT INTO `nguyen_lieu_don_san_xuat` (`id`, `id_don_san_xuat`, `id_lo_nguyen_lieu`, `so_luong`, `created_at`, `updated_at`) VALUES
(22, 17, 27, 200.00, '2025-06-04 12:27:54', '2025-06-04 12:27:54'),
(23, 17, 28, 100.00, '2025-06-04 12:30:47', '2025-06-04 12:30:47'),
(24, 18, 27, 50.00, '2025-06-04 12:42:52', '2025-06-04 12:42:52'),
(25, 18, 28, 50.00, '2025-06-04 12:44:09', '2025-06-04 12:44:09'),
(26, 19, 27, 20.00, '2025-06-04 13:39:47', '2025-06-04 13:39:47'),
(27, 19, 28, 10.00, '2025-06-04 13:39:57', '2025-06-04 13:39:57'),
(28, 21, 29, 50.00, '2025-06-04 14:00:54', '2025-06-04 14:00:54'),
(29, 21, 30, 50.00, '2025-06-04 14:01:07', '2025-06-04 14:01:07'),
(30, 21, 31, 50.00, '2025-06-04 14:01:18', '2025-06-04 14:01:18'),
(31, 21, 30, 50.00, '2025-06-04 14:02:41', '2025-06-04 14:02:41'),
(32, 22, 27, 10.00, '2025-06-06 10:45:22', '2025-06-06 10:45:22'),
(33, 23, 27, 20.00, '2025-06-08 21:04:00', '2025-06-08 21:04:00'),
(34, 30, 30, 20.00, '2025-06-14 19:35:10', '2025-06-14 19:35:10'),
(35, 30, 28, 20.00, '2025-06-14 19:36:17', '2025-06-14 19:36:17'),
(36, 32, 31, 50.00, '2025-06-15 22:01:00', '2025-06-15 22:01:00'),
(39, 34, 31, 100.00, '2025-06-15 23:01:37', '2025-06-15 23:01:37'),
(40, 34, 60, 50.00, '2025-06-15 23:03:41', '2025-06-15 23:03:41'),
(41, 34, 55, 100.00, '2025-06-15 23:03:57', '2025-06-15 23:03:57'),
(42, 34, 56, 100.00, '2025-06-15 23:04:45', '2025-06-15 23:04:45'),
(43, 32, 60, 48.00, '2025-06-16 00:30:07', '2025-06-16 00:30:07'),
(45, 35, 31, 35.00, '2025-06-30 10:45:32', '2025-06-30 10:45:32'),
(46, 35, 62, 25.00, '2025-06-30 11:05:12', '2025-06-30 11:05:12'),
(47, 35, 61, 35.00, '2025-06-30 11:06:37', '2025-06-30 11:06:37'),
(48, 35, 64, 35.00, '2025-06-30 11:16:01', '2025-06-30 11:16:01'),
(49, 36, 31, 25.00, '2025-06-30 21:00:31', '2025-06-30 21:00:31'),
(50, 36, 62, 10.00, '2025-06-30 21:00:57', '2025-06-30 21:00:57'),
(51, 36, 64, 25.00, '2025-06-30 21:01:14', '2025-06-30 21:01:14'),
(52, 37, 63, 50.00, '2025-06-30 21:27:36', '2025-06-30 21:27:36'),
(53, 37, 61, 20.00, '2025-06-30 21:27:58', '2025-06-30 21:27:58'),
(54, 37, 62, 10.00, '2025-06-30 21:28:32', '2025-06-30 21:28:32'),
(55, 37, 64, 50.00, '2025-06-30 21:28:47', '2025-06-30 21:28:47'),
(56, 32, 61, 10.00, '2025-06-30 22:53:55', '2025-06-30 22:53:55'),
(57, 32, 64, 150.00, '2025-06-30 22:54:34', '2025-06-30 22:54:34'),
(58, 39, 67, 50.00, '2025-06-30 23:42:16', '2025-06-30 23:42:16'),
(59, 39, 70, 50.00, '2025-06-30 23:42:34', '2025-06-30 23:42:34'),
(60, 39, 73, 50.00, '2025-06-30 23:42:53', '2025-06-30 23:42:53'),
(61, 39, 62, 20.00, '2025-06-30 23:43:16', '2025-06-30 23:43:16'),
(64, 42, 66, 400.00, '2025-07-01 00:14:55', '2025-07-01 00:14:55'),
(65, 42, 76, 200.00, '2025-07-01 00:15:26', '2025-07-01 00:15:26'),
(66, 42, 72, 400.00, '2025-07-01 00:15:46', '2025-07-01 00:15:46'),
(67, 42, 71, 400.00, '2025-07-01 00:16:18', '2025-07-01 00:16:18'),
(68, 43, 66, 80.00, '2025-07-01 00:31:13', '2025-07-01 00:31:13'),
(69, 43, 68, 80.00, '2025-07-01 00:31:57', '2025-07-01 00:31:57'),
(70, 43, 76, 60.00, '2025-07-01 00:32:14', '2025-07-01 00:32:14'),
(71, 43, 72, 80.00, '2025-07-01 00:32:31', '2025-07-01 00:32:31'),
(72, 43, 64, 80.00, '2025-07-01 00:32:44', '2025-07-01 00:32:44'),
(73, 43, 70, 80.00, '2025-07-01 00:33:11', '2025-07-01 00:33:11'),
(74, 44, 66, 80.00, '2025-07-01 00:38:21', '2025-07-01 00:38:21'),
(75, 44, 62, 20.00, '2025-07-01 00:38:39', '2025-07-01 00:38:39'),
(76, 44, 64, 80.00, '2025-07-01 00:38:55', '2025-07-01 00:38:55'),
(77, 44, 73, 80.00, '2025-07-01 00:39:16', '2025-07-01 00:39:16'),
(78, 44, 70, 80.00, '2025-07-01 00:39:32', '2025-07-01 00:39:32'),
(79, 45, 68, 40.00, '2025-07-01 00:46:21', '2025-07-01 00:46:21'),
(80, 45, 76, 35.00, '2025-07-01 00:46:39', '2025-07-01 00:46:39'),
(81, 45, 72, 40.00, '2025-07-01 00:46:55', '2025-07-01 00:46:55'),
(82, 45, 70, 40.00, '2025-07-01 00:47:19', '2025-07-01 00:47:19'),
(83, 46, 63, 30.00, '2025-07-01 00:57:30', '2025-07-01 00:57:30'),
(84, 46, 78, 60.00, '2025-07-01 00:57:50', '2025-07-01 00:57:50'),
(85, 46, 79, 60.00, '2025-07-01 00:58:34', '2025-07-01 00:58:34'),
(86, 46, 76, 30.00, '2025-07-01 00:58:48', '2025-07-01 00:58:48'),
(90, 47, 29, 30.00, '2025-07-01 01:07:27', '2025-07-01 01:07:27'),
(100, 47, 76, 25.00, '2025-07-01 01:09:12', '2025-07-01 01:09:12'),
(101, 47, 27, 30.00, '2025-07-01 01:09:26', '2025-07-01 01:09:26'),
(102, 48, 29, 20.00, '2025-07-01 01:14:00', '2025-07-01 01:14:00'),
(103, 48, 76, 10.00, '2025-07-01 01:14:14', '2025-07-01 01:14:14'),
(104, 50, 82, 10.00, '2025-07-03 21:49:54', '2025-07-03 21:49:54'),
(105, 50, 80, 10.00, '2025-07-03 21:50:17', '2025-07-03 21:50:17'),
(106, 50, 84, 10.00, '2025-07-03 21:51:16', '2025-07-03 21:51:16'),
(107, 50, 85, 10.00, '2025-07-03 21:51:28', '2025-07-03 21:51:28'),
(108, 52, 67, 30.00, '2025-07-07 07:16:01', '2025-07-07 07:16:01'),
(109, 52, 62, 5.00, '2025-07-07 07:17:07', '2025-07-07 07:17:07'),
(110, 52, 74, 30.00, '2025-07-07 07:17:39', '2025-07-07 07:17:39'),
(111, 40, 66, 40.00, '2025-07-07 07:19:59', '2025-07-07 07:19:59'),
(112, 40, 76, 30.00, '2025-07-07 07:20:14', '2025-07-07 07:20:14'),
(113, 40, 64, 40.00, '2025-07-07 07:20:27', '2025-07-07 07:20:27'),
(114, 40, 70, 40.00, '2025-07-07 07:20:47', '2025-07-07 07:20:47'),
(115, 53, 66, 10.00, '2025-07-07 07:59:25', '2025-07-07 07:59:25'),
(116, 53, 75, 10.00, '2025-07-07 07:59:42', '2025-07-07 07:59:42'),
(117, 53, 76, 10.00, '2025-07-07 07:59:57', '2025-07-07 07:59:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyen_lieu_nha_cung_cap`
--

CREATE TABLE `nguyen_lieu_nha_cung_cap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_nha_cung_cap` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) NOT NULL,
  `loai_nguyen_lieu` varchar(250) DEFAULT NULL,
  `don_vi_tinh` varchar(100) DEFAULT NULL,
  `xuat_xu` text DEFAULT NULL,
  `gia` decimal(15,0) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyen_lieu_nha_cung_cap`
--

INSERT INTO `nguyen_lieu_nha_cung_cap` (`id`, `id_nha_cung_cap`, `ten`, `loai_nguyen_lieu`, `don_vi_tinh`, `xuat_xu`, `gia`, `created_at`, `updated_at`) VALUES
(2, 2, 'Vải Cotton', 'Vải', 'm', 'Mỹ', 20000, '2025-05-27 22:53:48', '2025-07-11 20:30:37'),
(4, 2, 'Vải Kaki', 'Vải', 'm', 'Việt Nam', 44000, '2025-05-28 10:24:53', '2025-07-11 20:31:05'),
(5, 2, 'Vải thun cotton', 'Vải', 'm', 'Việt Nam', 60000, '2025-06-01 21:37:53', '2025-07-11 20:31:33'),
(8, 1, 'Dây kéo', 'Phụ liệu may mặc', 'cái', 'Đài Loan', 1500, '2025-06-04 11:53:54', '2025-07-11 20:53:21'),
(9, 1, 'Nút áo', 'Phụ liệu may mặc', 'cái', 'Việt Nam', 200, '2025-06-04 11:55:24', '2025-07-11 20:53:35'),
(11, 2, 'Chỉ may công nghiệp', 'Chỉ', 'cuộn', 'Việt Nam', 2000, '2025-06-11 13:04:30', '2025-07-11 20:29:57'),
(12, 2, 'Vải polyester', 'Vải', 'm', 'Việt Nam', 50000, '2025-06-11 13:05:05', '2025-07-11 20:31:13'),
(13, 2, 'Vải thời trang cao cấp', 'Vải', 'm', 'Mỹ', 500000, '2025-06-11 13:05:42', '2025-07-11 20:30:45'),
(14, 2, 'Vải jean', 'Vải', 'm', 'Việt Nam', 70000, '2025-06-11 13:06:40', '2025-07-11 20:30:53'),
(15, 1, 'Chỉ may', 'Phụ liệu may mặc', 'cuộn', 'Đài', 5000, '2025-06-11 13:38:59', '2025-07-11 20:53:11'),
(16, 1, 'Ren', 'Phụ liệu trang trí', 'm', 'Việt Nam', 3000, '2025-06-11 13:39:44', '2025-07-11 20:53:41'),
(17, 1, 'Khóa', 'Phụ liệu may mặc', 'cái', 'Trung Quốc', 2000, '2025-06-11 13:40:32', '2025-07-11 20:58:58'),
(19, 2, 'Bo cổ', 'vải bo', 'm', 'Việt Nam', 55000, '2025-06-15 22:13:00', '2025-07-11 20:29:47'),
(20, 2, 'Nhãn size', 'Size/in chuyển nhiệt', 'cái', 'Việt Nam', 300, '2025-06-15 22:15:30', '2025-07-11 20:30:11'),
(21, 10, 'PU bóng xanh da trời', 'Da PU', 'm', 'Trung Quốc', 35000, '2025-06-30 23:21:22', '2025-07-11 20:51:05'),
(22, 10, 'PU nỉ màu ghi', 'Da PU', 'm', 'Trung Quốc', 33000, '2025-06-30 23:23:22', '2025-07-11 20:52:00'),
(23, 10, 'PU nỉ màu trắng', 'Da', 'm', 'Trung Quốc', 33000, '2025-06-30 23:24:23', '2025-07-11 20:51:48'),
(24, 10, 'PVC Vân quả trám màu đen', 'Da PVC', 'm', 'Việt Nam', 30000, '2025-06-30 23:26:00', '2025-07-11 20:51:41'),
(25, 10, 'PVC Vân quả trám màu trắng', 'Da PVC', 'm', 'Việt Nam', 30000, '2025-06-30 23:26:51', '2025-07-11 20:51:28'),
(26, 10, 'Vải lót 3 lớp màu nâu', 'Vải Lót', 'm', 'Hàn Quốc', 20000, '2025-06-30 23:28:11', '2025-07-11 20:51:12'),
(27, 10, 'Vải thiên nga màu be nhạt', 'Lót mặt', 'Mét', 'Việt Nam', 18000, '2025-06-30 23:30:47', '2025-06-30 23:30:47'),
(28, 10, 'Pho KP 0.6 JF', 'Pho- Mũi hậu', 'm', 'Trung Quốc', 7000, '2025-06-30 23:31:58', '2025-07-11 20:50:44'),
(29, 10, 'Pho KP 1.3 ZH', 'Pho- Mũi hậu', 'm', 'Đài Loan', 18000, '2025-06-30 23:32:45', '2025-07-11 20:50:59'),
(30, 10, 'Sít da bò', 'Sít', 'm', 'Pakistan', 28000, '2025-06-30 23:33:42', '2025-07-11 20:51:54'),
(31, 10, 'sít vân cát màu trắng', 'Sít', 'm', 'Trung Quốc', 27000, '2025-06-30 23:35:28', '2025-07-11 20:51:35'),
(32, 11, 'Tròng PC (Polycarbonate) chống UV400, chống xước, Polarized.', 'Tròng Kính', 'Cặp', 'Hàn Quốc', 30000, '2025-07-03 21:41:41', '2025-07-03 21:42:33'),
(33, 11, 'Tròng CR-39.', 'Tròng Kính', 'Cặp', 'Nhật', 20000, '2025-07-03 21:42:23', '2025-07-03 21:42:23'),
(34, 11, 'Gọng kính TR90 (Thermoplastic) siêu nhẹ, dẻo.', 'Gọng Kính', 'Khung', 'Thụy Sĩ', 40000, '2025-07-03 21:43:28', '2025-07-03 21:43:28'),
(35, 11, 'Gọng kính Inox', 'Gọng Kính', 'Khung', 'Việt Nam', 25000, '2025-07-03 21:44:43', '2025-07-03 21:44:43'),
(36, 11, 'Bản lề, ốc vít, mũi silicon', 'Phụ Kiện Kính', 'Bộ', 'Đài Loan', 6000, '2025-07-03 21:45:51', '2025-07-03 21:45:51'),
(37, 11, 'Lớp phủ UV400, chống chói, chống trầy', 'Lớp phủ UV Kính', 'Mét', 'Hàn Quốc', 90000, '2025-07-03 21:46:54', '2025-07-03 21:46:54'),
(39, 2, 'Vải thun', 'Vải', 'm', 'Việt Nam', 50000, '2025-07-08 15:04:49', '2025-07-11 20:31:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien_cong_ty`
--

CREATE TABLE `nhan_vien_cong_ty` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_nguoi_dung` bigint(20) UNSIGNED NOT NULL,
  `vai_tro` enum('san_xuat','phe_duyet_giao_hang','phe_duyet_kho','phe_duyet_san_xuat','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien_cong_ty`
--

INSERT INTO `nhan_vien_cong_ty` (`id`, `id_nguoi_dung`, `vai_tro`, `created_at`, `updated_at`) VALUES
(1, 2, 'admin', '2025-05-20 02:31:21', '2025-05-28 08:55:45'),
(2, 19, 'phe_duyet_giao_hang', '2025-05-28 08:31:03', '2025-05-28 09:08:12'),
(3, 20, 'san_xuat', '2025-05-29 13:25:29', '2025-05-29 13:25:29'),
(4, 21, 'phe_duyet_kho', '2025-05-29 13:26:32', '2025-05-29 13:27:10'),
(5, 22, 'phe_duyet_san_xuat', '2025-05-29 13:27:41', '2025-05-29 13:27:51'),
(6, 28, 'admin', '2025-06-11 05:21:08', '2025-06-11 05:21:26'),
(7, 29, 'phe_duyet_giao_hang', '2025-06-11 05:25:19', '2025-06-11 05:25:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien_giao_hang`
--

CREATE TABLE `nhan_vien_giao_hang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_nguoi_dung` bigint(20) UNSIGNED NOT NULL,
  `id_cong_ty_giao_hang` bigint(20) UNSIGNED NOT NULL,
  `vai_tro` enum('giam_doc','thuc_thi') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien_giao_hang`
--

INSERT INTO `nhan_vien_giao_hang` (`id`, `id_nguoi_dung`, `id_cong_ty_giao_hang`, `vai_tro`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'thuc_thi', '2025-05-20 02:32:08', '2025-05-20 02:32:08'),
(2, 9, 2, 'giam_doc', '2025-05-25 13:33:16', '2025-05-25 13:34:54'),
(3, 10, 2, 'thuc_thi', '2025-05-25 13:34:04', '2025-05-25 14:46:48'),
(4, 11, 1, 'giam_doc', '2025-05-26 04:02:32', '2025-06-11 02:37:08'),
(5, 12, 1, 'thuc_thi', '2025-05-26 04:04:45', '2025-05-26 04:04:45'),
(6, 13, 2, 'thuc_thi', '2025-05-26 04:05:45', '2025-05-26 04:05:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien_nha_cung_cap`
--

CREATE TABLE `nhan_vien_nha_cung_cap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_nguoi_dung` bigint(20) UNSIGNED NOT NULL,
  `id_nha_cung_cap` bigint(20) UNSIGNED NOT NULL,
  `vai_tro` enum('giam_doc','thuc_thi') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien_nha_cung_cap`
--

INSERT INTO `nhan_vien_nha_cung_cap` (`id`, `id_nguoi_dung`, `id_nha_cung_cap`, `vai_tro`, `created_at`, `updated_at`) VALUES
(3, 14, 1, 'thuc_thi', '2025-05-27 12:40:17', '2025-06-11 04:07:12'),
(4, 15, 1, 'giam_doc', '2025-05-27 12:40:48', '2025-06-06 13:37:14'),
(5, 16, 2, 'thuc_thi', '2025-05-27 12:41:21', '2025-06-11 02:52:43'),
(7, 18, 2, 'giam_doc', '2025-05-27 12:43:43', '2025-05-27 12:44:25'),
(8, 30, 7, 'thuc_thi', '2025-06-12 10:10:43', '2025-06-12 10:10:43'),
(9, 31, 10, 'giam_doc', '2025-06-30 16:10:47', '2025-06-30 16:10:56'),
(10, 32, 10, 'thuc_thi', '2025-06-30 16:13:33', '2025-06-30 16:13:33'),
(11, 33, 11, 'giam_doc', '2025-07-03 09:55:38', '2025-07-03 09:55:49'),
(12, 34, 11, 'thuc_thi', '2025-07-03 14:40:10', '2025-07-03 14:40:10'),
(13, 35, 10, 'thuc_thi', '2025-07-07 01:16:22', '2025-07-07 01:16:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`id`, `ten`, `email`, `so_dien_thoai`, `dia_chi`, `created_at`, `updated_at`) VALUES
(1, 'TNHH SXTM Nguyên Phát', 'ctynguyenphat@example.com', '0910000001', 'Số 110-112-114, Đường số 44, KDC Bình Phú, P. 10, Q. 6,TP. Hồ Chí Minh', '2025-05-20 02:31:33', '2025-06-11 06:17:19'),
(2, 'Tổng CTCP Dệt May Hà Nội', 'tongcongtydetmayhanoi@example.com', '0910000002', 'Tầng 8 - Tòa nhà Nam Hải LakeView  Khu đô thị Vĩnh Hoàng, Phường Hoàng Văn Thụ, Quận Hoàng Mai, Hà Nội', '2025-05-20 02:31:33', '2025-06-11 07:06:36'),
(10, 'Công ty TNHH Thương Mại Vân Hà', 'ctyvanha@gmail.com', '0333918752', 'Số 293A Đà Nẵng, Phường Vạn Mỹ, Quận Ngô Quyền, Thành phố Hải Phòng, Việt Nam.', '2025-06-30 16:06:03', '2025-06-30 16:06:03'),
(11, 'CÔNG TY TNHH CHEMILENS', 'chemilens@gmail.com', '02862623666', '25, 27 và 29 Tống Văn Trân, P. 5, Q. 11, TP.HCM', '2025-07-03 09:46:43', '2025-07-03 09:46:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phan_cong_giao_hang`
--

CREATE TABLE `phan_cong_giao_hang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_don_giao_hang` bigint(20) UNSIGNED NOT NULL,
  `id_nhan_vien_giao_hang` bigint(20) UNSIGNED NOT NULL,
  `ghi_chu` text DEFAULT NULL,
  `thoi_gian_phan_cong` datetime DEFAULT current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phan_cong_giao_hang`
--

INSERT INTO `phan_cong_giao_hang` (`id`, `id_don_giao_hang`, `id_nhan_vien_giao_hang`, `ghi_chu`, `thoi_gian_phan_cong`, `created_at`, `updated_at`) VALUES
(17, 29, 1, 'Đang chuyển đến kho Hà Nội', '2025-06-04 15:58:30', '2025-06-04 15:58:30', '2025-06-04 15:58:30'),
(20, 32, 3, NULL, '2025-06-12 20:27:03', '2025-06-12 20:27:03', '2025-06-12 20:27:03'),
(21, 34, 1, 'Đang chuyển đến kho Hà Nội', '2025-06-15 23:34:32', '2025-06-15 23:34:32', '2025-06-15 23:34:32'),
(22, 35, 3, 'Đang chuyển đến kho Hà Nội', '2025-06-15 23:43:57', '2025-06-15 23:43:57', '2025-06-15 23:43:57'),
(23, 36, 3, 'Đang chuyển đến kho Hà Nội', '2025-06-16 21:42:24', '2025-06-16 21:42:24', '2025-06-16 21:42:24'),
(24, 37, 1, NULL, '2025-06-30 21:51:02', '2025-06-30 21:51:02', '2025-06-30 21:51:02'),
(25, 38, 3, 'Nhận Hàng', '2025-06-30 22:38:09', '2025-06-30 22:38:09', '2025-06-30 22:38:09'),
(26, 39, 6, 'Nhận Hàng nha', '2025-06-30 22:41:07', '2025-06-30 22:41:07', '2025-06-30 22:41:07'),
(27, 40, 1, 'Nhận Hàng', '2025-07-08 10:26:31', '2025-07-08 10:26:31', '2025-07-08 10:26:31'),
(28, 41, 1, 'Giao hàng', '2025-07-08 15:06:10', '2025-07-08 15:06:10', '2025-07-08 15:06:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_danh_muc` bigint(20) UNSIGNED NOT NULL,
  `ma` varchar(50) DEFAULT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `gia` decimal(15,0) DEFAULT NULL,
  `giamgia` int(11) NOT NULL,
  `trang_thai` tinyint(4) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `id_danh_muc`, `ma`, `ten`, `mo_ta`, `gia`, `giamgia`, `trang_thai`, `created_at`, `updated_at`) VALUES
(44, 1, 'ATN2', 'Áo Thun Nữ Cổ Tròn Màu Xanh Biển', 'Áo thun nữ cổ tròn màu xanh biển, chất liệu cotton co giãn, mềm mại, thoáng mát. Thiết kế đơn giản, năng động, dễ phối đồ cho mọi dịp.', 209000, 0, 1, '2025-06-03 20:15:34', '2025-06-04 14:08:35'),
(45, 1, 'ATN3', 'Áo thun nữ LOREN Regular hóa học A21097', 'LOREN là nhãn hiệu thời trang hàng đầu tại Việt Nam được sản xuất tại nhiều nhà máy trên toàn thế giới như Trung Quốc, Hàn Quốc, Indonesia, Việt Nam… Dù được sản xuất ở đâu, các sản phẩm đều tuân theo quy trình kiểm soát chất lượng nghiêm ngặt và đồng đều của LOREN. Các sản phẩm chính hãng đều có tem nhãn tiếng Việt phía sau và nhập khẩu hoặc sản xuất trực tiếp từ LOREN JSC nên các bạn hoàn toàn yên tâm về chất lượng sản phẩm.', 229000, 80000, 1, '2025-06-03 20:33:58', '2025-06-30 11:32:13'),
(46, 1, 'ATN4', 'Áo thun nữ LOREN Regular hóa học - Màu trắng', NULL, 200000, 50000, 1, '2025-06-03 20:37:23', '2025-06-30 23:50:55'),
(47, 1, 'ATN5', 'Áo thun nữ LOREN ban nhạc - Màu trắng', NULL, 250000, 100000, 0, '2025-06-03 20:43:06', '2025-06-12 16:49:53'),
(48, 1, 'ATN6', 'Áo thun nữ LOREN ban nhạc', NULL, 250000, 100000, 0, '2025-06-03 20:48:08', '2025-06-12 16:51:14'),
(49, 1, 'ATN7', 'Áo thun nữ họa tiết thêu-chất đẹp màu trắng', NULL, 190000, 0, 0, '2025-06-03 20:51:13', '2025-06-12 16:50:44'),
(50, 1, 'ATN8', 'Áo thun xốp polo Official 1ESS - áo thun nữ polo chất thun xốp màu trắng họa tiết thêu chữ SIÊU HOT', NULL, 180000, 0, 0, '2025-06-03 20:52:56', '2025-06-12 16:50:59'),
(51, 1, 'ATN9', 'Áo Thun Nữ Họa Tiết Hoạt Hình Họa Tiết Tom-Soul', NULL, 140000, 40000, 0, '2025-06-03 20:54:43', '2025-06-14 23:56:21'),
(52, 2, 'GTT1', 'Giày Thể Thao Nam cao cấp Lakinta giày nam sneaker tập gym chạy bộ', 'Giày thể thao nam – giày sneaker nam chính hãng Lakinta\r\n\r\nCam kết giá tốt nhất thị trường, chất lượng đặt lên hàng đầu.\r\n\r\nĐổi trả trong vòng 7 ngày nếu hàng lỗi, sai mẫu cho quý khách.', 199000, 0, 0, '2025-06-03 20:58:05', '2025-06-30 23:58:39'),
(53, 1, 'ATN1', 'Áo thun nữ LOREN Regular hóa học - Màu đen', 'LOREN là nhãn hiệu thời trang hàng đầu tại Việt Nam được sản xuất tại nhiều nhà máy trên toàn thế giới như Trung Quốc, Hàn Quốc, Indonesia, Việt Nam… Dù được sản xuất ở đâu, các sản phẩm đều tuân theo quy trình kiểm soát chất lượng nghiêm ngặt và đồng đều của LOREN. Các sản phẩm chính hãng đều có tem nhãn tiếng Việt phía sau và nhập khẩu hoặc sản xuất trực tiếp từ LOREN JSC nên các bạn hoàn toàn yên tâm về chất lượng sản phẩm.', 180000, 0, 1, '2025-06-03 20:59:43', '2025-06-15 23:06:19'),
(54, 2, 'GTT2', 'Giày Thể Thao Nam Tập Gym Chạy Bộ Thể Dục Lakinta giày sneaker nam hàn quốc cổ thấp 2 màu xanh trắng giá rẻ đẹp', 'Giày thể thao nam tập gym chạy bộ thể dục – giày sneaker nam\r\n\r\nChất liệu vải dệt cao cấp khiến giày thoáng khí không gây mùi.\r\n\r\nĐế cao su mang lại sự êm ái khi đi.\r\n\r\nThiết kế phong cách, trẻ trung, năng động, tôn dáng khi đi.\r\n\r\nForm ôm chân thoải mái ngay cả khi mang giày cả ngày dài.\r\n\r\n💖Theo dõi shop để nhận thêm voucher cũng như ưu đãi riêng nhé', 169000, 0, 1, '2025-06-03 21:08:35', '2025-07-01 00:21:18'),
(55, 2, 'GTT3', 'Giày thể thao nam LAKINTA, giày sneakers kẻ caro cá tính', 'Giày thể thao nam G886 , giày thể thao Lakinta\r\n\r\nChất liệu vải dệt cao cấp khiến giày thoáng khí không gây mùi.\r\n\r\nĐế cao su mang lại sự êm ái khi đi.\r\n\r\nThiết kế phong cách, trẻ trung, năng động, tôn dáng khi đi.\r\n\r\nForm ôm chân thoải mái ngay cả khi mang giày cả ngày dài.\r\n\r\nTheo dõi shop để nhận thêm voucher cũng như ưu đãi riêng nhé!', 199000, 0, 1, '2025-06-03 21:10:18', '2025-07-01 00:33:31'),
(56, 2, 'GTT4', 'Giày thể thao nam Lakinta, giày sneakers nam độn đế tăng chiều cao màu trắng', 'Giày thể thao nam tập gym chạy bộ thể dục – giày sneaker nam\r\n\r\nChất liệu vải dệt cao cấp khiến giày thoáng khí không gây mùi.\r\nĐế cao su mang lại sự êm ái khi đi.\r\n\r\nThiết kế phong cách, trẻ trung, năng động, tôn dáng khi đi.\r\n\r\nForm ôm chân thoải mái ngay cả khi mang giày cả ngày dài.\r\n\r\n💖Theo dõi shop để nhận thêm voucher cũng như ưu đãi riêng nhé', 189000, 0, 1, '2025-06-03 21:12:55', '2025-07-01 00:40:55'),
(57, 2, 'GTT5', 'Giày thể thao nam LAKINTA, giày sneakers nam hình gấu trẻ trung năng động', NULL, 200000, 50000, 0, '2025-06-03 21:14:35', '2025-06-16 11:14:43'),
(58, 2, 'GTT7', 'Giày Thể Thao Nam Tập Gym Chạy Bộ Thể Dục Lakinta Giày Sneaker Nam Hàn Quốc giá rẻ đẹp', 'Giày thể thao nam tập gym chạy bộ thể dục – giày sneaker nam\r\n\r\nChất liệu vải dệt cao cấp khiến giày thoáng khí không gây mùi.\r\n\r\nĐế cao su mang lại sự êm ái khi đi.\r\n\r\nThiết kế phong cách, trẻ trung, năng động, tôn dáng khi đi.\r\n\r\nForm ôm chân thoải mái ngay cả khi mang giày cả ngày dài.\r\n\r\n💖Theo dõi shop để nhận thêm voucher cũng như ưu đãi riêng nhé', 250000, 50000, 1, '2025-06-03 21:16:41', '2025-07-01 00:03:40'),
(59, 2, 'GTT8', 'Giày thể thao nam Lakinta, giày sneakers nam màu xám basic', 'Giày thể thao nam G810 , giày thể thao Lakinta\r\nChất liệu vải dệt cao cấp khiến giày thoáng khí không gây mùi.\r\n\r\nĐế cao su mang lại sự êm ái khi đi.\r\n\r\nThiết kế phong cách, trẻ trung, năng động, tôn dáng khi đi.\r\n\r\nForm ôm chân thoải mái ngay cả khi mang giày cả ngày dài.\r\n\r\nTheo dõi shop để nhận thêm voucher cũng như ưu đãi riêng nhé!', 199000, 0, 1, '2025-06-03 21:18:24', '2025-06-30 23:47:05'),
(60, 2, 'GTT9', 'Giày thể thao nam Lakinta, giày sneakers nam thổ cẩm mẫu mới', NULL, 199000, 0, 1, '2025-06-03 21:20:58', '2025-06-03 21:20:58'),
(61, 3, 'TXN1', 'TOT Tag Tim Sz 33 - Hồng', NULL, 1113000, 0, 0, '2025-06-03 21:24:06', '2025-07-01 01:02:12'),
(62, 3, 'TXN2', 'TDV Hobo Dập Nổi Line Embossed Sz 23 - Trắng', NULL, 779000, 0, 0, '2025-06-03 21:25:50', '2025-07-01 01:02:23'),
(63, 3, 'TXN3', 'TÚI XÁCH NỮ CROSS BODY 99155', 'Bước vào thế giới của thời trang và phong cách cùng chiếc túi xách nữ Cross Body 99155 - một sự kết hợp đầy hoàn hảo giữa thiết kế và tiện lợi. Được tạo ra với sự tinh tế và đẳng cấp, sản phẩm này thực sự là một điểm nhấn trong tủ đồ của bạn.', 650000, 30000, 1, '2025-06-03 21:27:23', '2025-07-01 00:56:10'),
(64, 3, 'TXN4', 'Túi Gucci Horsebit 1955– Biểu tượng thời trang sang trọng và đẳng cấp', 'Túi Gucci Horsebit 1955 mang dấu ấn đặc trưng của thương hiệu với thiết kế Horsebit kim loại đầy tinh tế, kết hợp cùng chất liệu da cao cấp. Với kiểu dáng nhỏ gọn và thanh lịch, chiếc túi này là sự lựa chọn hoàn hảo cho mọi dịp, từ đi làm đến dạo phố hay các sự kiện đặc biệt. Sự đa dạng về màu sắc như đen, trắng, nâu, và họa tiết canvas GG kinh điển giúp dễ dàng phối đồ và tạo điểm nhấn hoàn hảo cho phong cách của bạn. Đây không chỉ là phụ kiện thời trang mà còn là biểu tượng của sự đẳng cấp và phong cách.', 1390000, 390000, 1, '2025-06-03 21:29:29', '2025-07-01 01:05:35'),
(65, 3, 'TXN5', 'Túi xách / đeo chéo Nữ Chauxunel Doris 9010K Chính Hãng', 'Điểm nhấn thời trang cho phái đẹp Túi xách nữ không chỉ là một vật dụng tiện lợi để đựng đồ cá nhân mà còn là một biểu tượng thời trang thể hiện phong cách và cá tính của mỗi người phụ nữ.\r\n\r\nTúi xách nữ Chauxunel doris 9010K với chất liệu da tổng hợp bên đẹp mềm mại, size 28-11-20 lý tưởng để bạn thoải mái chữa các vật dụng cá nhân cân thiệt như điện thoại, ví tiên, trang sức, mỹ phâm vv... Túi cũng linh hoạt với dây đeo chéo hoặc xách tay . Mặt trong lót vải polyster chống thấm tốt. Chân túi có đế chống chày', 850000, 250000, 1, '2025-06-03 21:31:23', '2025-07-07 07:18:35'),
(66, 3, 'TXN6', 'Túi xách / đeo chéo Nữ Hermès Constance 2024 - 20cm', NULL, 950000, 230000, 1, '2025-06-03 21:33:03', '2025-07-07 08:00:22'),
(67, 3, 'TXN7', 'Túi xách nữ hàng hiệu đeo chéo Velisa H1333', NULL, 750000, 300000, 0, '2025-06-03 21:35:09', '2025-07-01 01:01:25'),
(68, 3, 'TXN8', 'TDV Hobo Đáy Vuông Love Charm Sz 23 - Jean', NULL, 983000, 0, 0, '2025-06-03 21:37:00', '2025-07-01 01:01:03'),
(69, 4, 'PKTT', 'Mũ Bucket Vành Tròn Nam, Nữ Phong Cách Hàn Quốc', '❤️ Hướng dẫn bảo quản Nón bucket vành tròn\r\n\r\n• Giặt riêng sản phẩm màu sáng và màu tối\r\n\r\n• Giặt sản phẩm với nước ở nhiệt độ thường\r\n\r\n• Nên phơi sản phẩm dưới ánh nắng trực tiếp\r\n\r\n• Không nên sử dụng chất tẩy, không xoắn vắt mạnh', 1000000, 0, 1, '2025-06-03 21:41:34', '2025-07-01 01:14:51'),
(70, 4, 'PKTT2', 'Kính Mát Nam Nữ Gentle Monster Palette Cao Cấp', 'BẢO HÀNH 6 THÁNG - LỖI 1 ĐỔI 1', 1500000, 600000, 1, '2025-06-03 21:46:03', '2025-07-01 01:18:45'),
(71, 4, 'PKTT3', 'Mắt kính râm GM nam nữ vuông lớn tràn viền 623', 'Mắt kính râm GM nam nữ vuông lớn tràn viền 623 với cấu tạo khung kính bằng nhựa Polycarbon sáng bóng không bong tróc do mồ hôi, môi trường. Tròng kính bằng chất liệu TAC 7 lớp chống chói, chống tia UV400 bảo vệ mắt khi đi nắng. Đặc biệt thiết kế tròng kính tràn viền thời thượng phù hợp với mọi phong cách thời trang.', 119000, 0, 1, '2025-06-03 21:48:18', '2025-07-03 21:52:01'),
(72, 4, 'PKTT4', 'Mũ Lưỡi Trai M190 Phong Cách Hàn Quốc Cho Nam, Nữ', NULL, 350000, 250000, 0, '2025-06-03 21:53:02', '2025-06-14 23:56:58'),
(73, 4, 'PKTT5', 'Thắt lưng da phối khóa vuông', 'Thắt lưng da dập nổi hoạ tiết horsebit và lion\r\n\r\nThắt lưng da cá sấu-dập nổi. Biểu tượng Horsebit màu vàng và đầu sư tử. Điều chỉnh ở phía sau. Được đeo ở eo hoặc trên hông.', 4450000, 2225000, 0, '2025-06-03 22:07:16', '2025-07-03 21:57:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('fCGO6IH81NuiDxLtMvMAaPiYOu3825nB5kB1HkAs', 15, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib2JaNnQ3ODFtNEZBWUF6Q1FzSW9BRTJJOGVTR2V5ek1uOFFPcGxoQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9uaGFjdW5nY2FwL25ndXllbmxpZXUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNTt9', 1752242338),
('ZZtfUq839mJAYQG4ItSZg7vWMZwbXKHvviL4dRXl', 25, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNjRIVllNWDlaS1hweEpQS0ZoQVhMeFZTaXdrcDE1dWMyejdxMFdGQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI1O30=', 1752241411);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) NOT NULL,
  `ho_ten` varchar(500) DEFAULT NULL,
  `cccd` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `loai_nguoi_dung` enum('khach_hang','nhan_vien_cong_ty','nhan_vien_nha_cung_cap','nhan_vien_giao_hang') NOT NULL,
  `trang_thai` tinyint(4) DEFAULT 1,
  `token_ghi_nho` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `ten`, `ho_ten`, `cccd`, `email`, `mat_khau`, `so_dien_thoai`, `dia_chi`, `loai_nguoi_dung`, `trang_thai`, `token_ghi_nho`, `created_at`, `updated_at`) VALUES
(1, 'cuong', 'Nguyễn Quốc Cường', '021455487784', 'cuong@gmail.com', '$2y$12$uOfIAGIXl5qAcVNEtbtTQu0XLFcaGAkuQEenrXe1ajD3XKchTWDgm', '0399403073', 'Hanoi', 'khach_hang', 1, NULL, '2025-05-20 02:24:50', '2025-06-11 05:43:34'),
(2, 'admin', 'Quản lý hệ thống', '845554712322', 'admin@gmail.com', '$2y$12$uOfIAGIXl5qAcVNEtbtTQu0XLFcaGAkuQEenrXe1ajD3XKchTWDgm', '0900000002', 'HCM', 'nhan_vien_cong_ty', 1, NULL, '2025-05-20 02:24:50', '2025-06-11 05:26:25'),
(4, 'toan', 'Nguyễn Thanh Toàn', '845698763223', 'thanhtoan@gmail.com', '$2y$12$Yi02y0d4YqI8iukoLvVPseiuybQbdmBOAep.LFtddW8IBhUhe2Ply', '0900887623', 'TP Cần Thơ', 'nhan_vien_giao_hang', 1, NULL, '2025-05-20 02:24:50', '2025-06-11 04:27:39'),
(9, 'ngan', 'Nguyễn Thị Ngân', '849876091254', 'ngan@gmail.com', '$2y$12$Rk4KNf5jnZuSfUryjhGj6OiLkBf9hZkrXpDRLcDcCXGltFJdtjae.', '0348565667', 'Thành Phố Hải Phòng', 'nhan_vien_giao_hang', 1, NULL, '2025-05-25 13:33:16', '2025-06-11 05:08:41'),
(10, 'nghia', 'Vi Thị Nghĩa', '845672342322', 'nghia@gmail.com', '$2y$12$OlKFGhTs/9z3zHoIuGBwqOu27n4F8p8FHySnst4WNFQ7s.VzdBbya', '0348521234', 'Hà Nội', 'nhan_vien_giao_hang', 1, NULL, '2025-05-25 13:34:04', '2025-06-11 05:15:19'),
(11, 'dinh', 'Nguyễn Công Định', '845678932123', 'congdinh@gmail.com', '$2y$12$5esbLzvT0mTDsLnp1WGyMOFrpQKZtI87V//UrGrPBE3VZRU4iY1QG', '03485219999', 'Bắc Giang', 'nhan_vien_giao_hang', 1, NULL, '2025-05-26 04:02:32', '2025-06-11 04:24:47'),
(12, 'thang', 'Trần Quốc Thắng', '845632122343', 'quocthang@gmail.com', '$2y$12$GTvEUxHu9pA0As69ZJsEpO5IqKVEtoDFPOzyfNAka9XS.O5Kpnfey', '0348522341', 'Thành Phố Hà Nội', 'nhan_vien_giao_hang', 1, NULL, '2025-05-26 04:04:45', '2025-06-11 04:26:30'),
(13, 'ngoan', 'Nguyễn Thị Ngoan', '840678883425', 'ngoan@gmail.com', '$2y$12$0mlCMMb9K2DSegGB4ca7L.TnqXNP20S3Atb6qGX1OAuGFOFRjG5IG', '0348525555', 'TP Cần Thơ', 'nhan_vien_giao_hang', 1, NULL, '2025-05-26 04:05:45', '2025-06-11 05:18:06'),
(14, 'quyen', 'Nguyễn Thanh Quyền', '084356789123', 'thanhquyen@gmail.com', '$2y$12$PmIRWZfSzcG1dbI75h8Wi.dNENTAXb0VwfJpfHukJStW9FMM.0Evy', '0348521234', 'Số 110-112-114, Đường số 44, KDC Bình Phú, P. 10, Q. 6,TP. Hồ Chí Minh', 'nhan_vien_nha_cung_cap', 1, NULL, '2025-05-27 12:40:17', '2025-06-11 04:06:01'),
(15, 'tam', 'Lý Mỹ Tâm', '084567891223', 'mytam@gmail.com', '$2y$12$g9FMUoEvx82/REP8Q7Je4.1FKcN2bHgZ331W5psr9N0/LB9.yFUDy', '0348524444', 'Số 110-112-114, Đường số 44, KDC Bình Phú, P. 10, Q. 6,TP. Hồ Chí Minh', 'nhan_vien_nha_cung_cap', 1, NULL, '2025-05-27 12:40:48', '2025-06-11 04:06:20'),
(16, 'my', 'Lý Đức Mỹ', '033765231454', 'ducmy@gmail.com', '$2y$12$XwHStVZcBtdtmQDQBAIanus4fXczmoVapB3UNOq4EwWgk4EW4Bdny', '0331239087', 'TP Cần Thơ', 'nhan_vien_nha_cung_cap', 1, NULL, '2025-05-27 12:41:21', '2025-06-11 02:54:53'),
(18, 'duc', 'Lý Long Đức', '084332156723', 'duc@gmail.com', '$2y$12$ExkXs1TVneLqyS7HSz9zNeCe4QHs/MRdfQKIwiodlbxplb1Y7.4PK', '0348523452', 'TP Cần Thơ', 'nhan_vien_nha_cung_cap', 1, NULL, '2025-05-27 12:43:43', '2025-06-12 06:54:50'),
(20, 'binh', 'Lý Hòa Bình', '844562137804', 'hoabinh@gmail.com', '$2y$12$fd.qOHtLSNLj0QcRFJCdKO2aBRbflIoBciqvxhKFcSRwloVFUCiCS', '0968881423', 'Thành Phố Trà Vinh', 'nhan_vien_cong_ty', 1, NULL, '2025-05-29 13:25:29', '2025-06-11 02:19:39'),
(21, 'phong', 'Lý Thanh Phong', '847896541234', 'phong@gmail.com', '$2y$12$4HI5ObjmuzhvnN8zp/YpG.FNMkI4cDFzkDqcftbQMSfeRRuHSryNu', '0348522351', 'Thành Phố Hồ Chí Minh', 'nhan_vien_cong_ty', 1, NULL, '2025-05-29 13:26:32', '2025-06-11 02:17:36'),
(22, 'thu', 'Lý Hồng Thu', '843456235678', 'hongthu@gmail.com', '$2y$12$GWnbqSK93PrnAXHgkVddb.59tj3Stoa.RJdM3.dk70w4.Y503.GLW', '0348521001', 'Thành Phố Hồ Chí Minh', 'nhan_vien_cong_ty', 1, NULL, '2025-05-29 13:27:41', '2025-06-11 02:17:22'),
(25, 'son', 'Dương Ngọc Sơn', '024093003791', 'sonbgt36@gmail.com', '$2y$12$0CHFryKG8pFNLBbTyB12guq/FDs4qaKCkT.UlDuJdyJFajzDBaE5y', '0348521001', 'Bắc Giang', 'khach_hang', 1, NULL, '2025-06-02 06:50:37', '2025-06-11 06:34:09'),
(27, 'tien', 'Nguyễn Thị Cẩm Tiên', '849999451245', 'nguyenthicamtien16102001@gmail.com', '$2y$12$wEW.Jlqox/1XHj78gRqcv.h3q0FNyGnIdrAq2D0lTh9vqcsMrTVJm', '0969898713', 'Thành Phố Trà Vinh', 'khach_hang', 1, NULL, '2025-06-07 14:59:45', '2025-07-08 02:51:01'),
(29, 'thanh', 'Lý Hồng Thanh', '849999451233', 'hongthanh@gmail.com', '$2y$12$C1oy1bpWgjvXCc0IN1gjhO5eqIey8GCKimJ2ZhV18ZsBpITB3JVHe', '0976543213', 'Thành Phố Hồ Chí Minh', 'nhan_vien_cong_ty', 1, NULL, '2025-06-11 05:25:19', '2025-06-12 09:59:54'),
(31, 'man', 'Nguyễn Xuân Mẫn', '841112233341', 'xuanman@gmail.com', '$2y$12$1xIDWgoU1T/oYhzdIEq.S.9TAnIldhQc8Z5oukH57TAA8R9Slev0u', '0981129872', 'Hà Nội', 'nhan_vien_nha_cung_cap', 1, NULL, '2025-06-30 16:10:47', '2025-06-30 16:10:47'),
(32, 'dung', 'Trần Đắc Dũng', '847769543215', 'dacdung@gmail.com', '$2y$12$.OS.FIfwGnBExv9qDt3jgOuxwBB/jaUCCWn5GBiUudamV9Dw6V31e', '0356223452', 'Thành Phố Hồ Chí Minh', 'nhan_vien_nha_cung_cap', 1, NULL, '2025-06-30 16:13:33', '2025-06-30 16:13:33'),
(33, 'trang', 'Nguyễn Thị Thùy Trang', '847723436512', 'thuytrang@gmail.com', '$2y$12$vH4tpI6RmWWBg.csBD804ubufc3zVQQxatYbKmNDWhd3gebxaKmXm', '0987772511', 'Lương Hòa A - Châu Thành - Trà Vinh', 'nhan_vien_nha_cung_cap', 1, NULL, '2025-07-03 09:55:38', '2025-07-03 09:55:38'),
(34, 'tho', 'Nguyễn Anh Thơ', '843336612334', 'anhtho@gmail.com', '$2y$12$CyYAWa9OyXRmKdTPehlm0unratq1a81PiRBR2FwEQ.outF45W7Wim', '0969898713', 'Lương Hòa A - Châu Thành -  Trà Vinh', 'nhan_vien_nha_cung_cap', 1, NULL, '2025-07-03 14:40:10', '2025-07-03 14:40:10');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_don_hang` (`id_don_hang`),
  ADD KEY `id_chi_tiet_san_pham` (`id_chi_tiet_san_pham`);

--
-- Chỉ mục cho bảng `chi_tiet_don_san_xuat`
--
ALTER TABLE `chi_tiet_don_san_xuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_don_san_xuat` (`id_don_san_xuat`),
  ADD KEY `id_chi_tiet_san_pham` (`id_chi_tiet_san_pham`);

--
-- Chỉ mục cho bảng `chi_tiet_nhap_nguyen_lieu`
--
ALTER TABLE `chi_tiet_nhap_nguyen_lieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_don_nhap` (`id_don_nhap`),
  ADD KEY `fk_ctn_ncc` (`id_nguyen_lieu_ncc`);

--
-- Chỉ mục cho bảng `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_san_pham` (`id_san_pham`);

--
-- Chỉ mục cho bảng `cong_ty_giao_hang`
--
ALTER TABLE `cong_ty_giao_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang` (`id_khach_hang`),
  ADD KEY `id_san_pham` (`id_san_pham`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_giao_hang`
--
ALTER TABLE `don_giao_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_don_hang` (`id_don_hang`),
  ADD KEY `fk_don_giao_hang_cong_ty` (`id_cong_ty_giao_hang`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang` (`id_khach_hang`);

--
-- Chỉ mục cho bảng `don_nhap_nguyen_lieu`
--
ALTER TABLE `don_nhap_nguyen_lieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nha_cung_cap` (`id_nha_cung_cap`);

--
-- Chỉ mục cho bảng `don_san_xuat`
--
ALTER TABLE `don_san_xuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_don_san_xuat_san_pham` (`id_san_pham`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `hinh_anh_san_pham`
--
ALTER TABLE `hinh_anh_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_san_pham` (`id_san_pham`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nguoi_dung` (`id_nguoi_dung`);

--
-- Chỉ mục cho bảng `lo_nguyen_lieu`
--
ALTER TABLE `lo_nguyen_lieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_don_nhap` (`id_don_nhap`),
  ADD KEY `fk_lo_nl_ncc` (`id_nguyen_lieu_ncc`);

--
-- Chỉ mục cho bảng `lo_trinh_don`
--
ALTER TABLE `lo_trinh_don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_don_giao_hang` (`id_don_giao_hang`),
  ADD KEY `id_nhan_vien_giao_hang` (`id_nhan_vien_giao_hang`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguyen_lieu_don_san_xuat`
--
ALTER TABLE `nguyen_lieu_don_san_xuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_don_san_xuat` (`id_don_san_xuat`),
  ADD KEY `id_lo_nguyen_lieu` (`id_lo_nguyen_lieu`);

--
-- Chỉ mục cho bảng `nguyen_lieu_nha_cung_cap`
--
ALTER TABLE `nguyen_lieu_nha_cung_cap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nha_cung_cap` (`id_nha_cung_cap`);

--
-- Chỉ mục cho bảng `nhan_vien_cong_ty`
--
ALTER TABLE `nhan_vien_cong_ty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nguoi_dung` (`id_nguoi_dung`);

--
-- Chỉ mục cho bảng `nhan_vien_giao_hang`
--
ALTER TABLE `nhan_vien_giao_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nguoi_dung` (`id_nguoi_dung`),
  ADD KEY `id_cong_ty_giao_hang` (`id_cong_ty_giao_hang`);

--
-- Chỉ mục cho bảng `nhan_vien_nha_cung_cap`
--
ALTER TABLE `nhan_vien_nha_cung_cap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nguoi_dung` (`id_nguoi_dung`),
  ADD KEY `id_nha_cung_cap` (`id_nha_cung_cap`);

--
-- Chỉ mục cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phan_cong_giao_hang`
--
ALTER TABLE `phan_cong_giao_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_don_giao_hang` (`id_don_giao_hang`),
  ADD KEY `id_nhan_vien_giao_hang` (`id_nhan_vien_giao_hang`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_danh_muc` (`id_danh_muc`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_san_xuat`
--
ALTER TABLE `chi_tiet_don_san_xuat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_nhap_nguyen_lieu`
--
ALTER TABLE `chi_tiet_nhap_nguyen_lieu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `cong_ty_giao_hang`
--
ALTER TABLE `cong_ty_giao_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `don_giao_hang`
--
ALTER TABLE `don_giao_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `don_nhap_nguyen_lieu`
--
ALTER TABLE `don_nhap_nguyen_lieu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `don_san_xuat`
--
ALTER TABLE `don_san_xuat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hinh_anh_san_pham`
--
ALTER TABLE `hinh_anh_san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `lo_nguyen_lieu`
--
ALTER TABLE `lo_nguyen_lieu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `lo_trinh_don`
--
ALTER TABLE `lo_trinh_don`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nguyen_lieu_don_san_xuat`
--
ALTER TABLE `nguyen_lieu_don_san_xuat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `nguyen_lieu_nha_cung_cap`
--
ALTER TABLE `nguyen_lieu_nha_cung_cap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `nhan_vien_cong_ty`
--
ALTER TABLE `nhan_vien_cong_ty`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhan_vien_giao_hang`
--
ALTER TABLE `nhan_vien_giao_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhan_vien_nha_cung_cap`
--
ALTER TABLE `nhan_vien_nha_cung_cap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `phan_cong_giao_hang`
--
ALTER TABLE `phan_cong_giao_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`id_chi_tiet_san_pham`) REFERENCES `chi_tiet_san_pham` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
