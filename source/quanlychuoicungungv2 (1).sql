-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 17, 2025 lúc 03:56 AM
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
  `gia` decimal(15,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `id_don_hang`, `id_chi_tiet_san_pham`, `so_luong`, `gia`, `created_at`, `updated_at`) VALUES
(28, 26, 27, 2.00, 180000.00, '2025-06-04 15:03:47', '2025-06-04 15:03:47'),
(34, 31, 27, 3.00, 180000.00, '2025-06-11 12:47:15', '2025-06-11 12:47:15'),
(35, 32, 27, 5.00, 180000.00, '2025-06-12 19:28:27', '2025-06-12 19:28:27'),
(36, 33, 18, 5.00, 149000.00, '2025-06-12 22:48:29', '2025-06-12 22:48:29'),
(37, 33, 21, 1.00, 150000.00, '2025-06-12 22:48:29', '2025-06-12 22:48:29'),
(38, 34, 27, 2.00, 180000.00, '2025-06-14 17:23:49', '2025-06-14 17:23:49'),
(39, 35, 27, 1.00, 180000.00, '2025-06-14 17:28:59', '2025-06-14 17:28:59'),
(42, 37, 21, 2.00, 150000.00, '2025-06-15 23:45:41', '2025-06-15 23:45:41'),
(43, 38, 27, 4.00, 180000.00, '2025-06-16 08:04:40', '2025-06-16 08:04:40'),
(44, 38, 21, 1.00, 150000.00, '2025-06-16 08:04:40', '2025-06-16 08:04:40');

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
(46, 34, 29, 100, '2025-06-15 22:59:44', '2025-06-15 22:59:44');

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
(62, 25, 11, 100.00, 2000.00, '2025-06-15 22:49:17', '2025-06-15 22:49:17');

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
(15, 44, 'Màu Xanh Biển', 'Size S', 66, '2025-06-03 20:29:16', '2025-06-14 20:45:00'),
(16, 44, 'Màu Xanh Biển', 'Size M', 58, '2025-06-03 20:29:39', '2025-06-04 15:02:14'),
(17, 44, 'Màu Xanh Biển', 'Size L', 60, '2025-06-03 20:29:50', '2025-06-04 14:03:08'),
(18, 45, 'Màu Hồng', 'Size S', 15, '2025-06-03 20:34:46', '2025-06-12 22:48:29'),
(19, 45, 'Màu Hồng', 'Size M', 20, '2025-06-03 20:35:00', '2025-06-03 20:35:00'),
(20, 45, 'Màu Hồng', 'Size L', 20, '2025-06-03 20:35:10', '2025-06-03 20:35:10'),
(21, 46, 'Màu Trắng', 'Size S', 146, '2025-06-03 20:39:50', '2025-06-16 08:04:40'),
(22, 46, 'Màu Trắng', 'Size M', 40, '2025-06-03 20:40:16', '2025-06-04 08:02:39'),
(23, 46, 'Màu Trắng', 'Size L', 40, '2025-06-03 20:40:25', '2025-06-04 08:02:39'),
(24, 47, 'Màu Trắng', 'Size S', 20, '2025-06-03 20:43:37', '2025-06-03 20:43:37'),
(25, 47, 'Màu Trắng', 'Size M', 20, '2025-06-03 20:43:45', '2025-06-03 20:43:45'),
(26, 47, 'Màu Trắng', 'Size L', 20, '2025-06-03 20:45:32', '2025-06-03 20:45:32'),
(27, 53, 'Màu đen', 'size S', 277, '2025-06-04 00:14:57', '2025-06-16 08:04:40'),
(28, 53, 'Màu đen', 'size M', 250, '2025-06-04 11:09:18', '2025-06-15 23:06:19'),
(29, 53, 'Màu đen', 'Size L', 250, '2025-06-04 11:09:31', '2025-06-15 23:06:19'),
(30, 48, 'Màu cam', 'S', 20, '2025-06-12 17:23:43', '2025-06-12 17:23:43');

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
(10, 1, 44, 5, 'Tốt', '2025-06-07 23:06:44', '2025-06-07 23:06:44'),
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
(4, 'Phụ kiện thời trang', 'Phụ kiện như kính, nón, thắt lưng và trang sức', 1, '2025-05-22 23:14:27', '2025-05-24 20:23:57'),
(5, 'Sản phẩm xu hướng', 'Các sản phẩm nổi bật và được yêu thích nhất hiện nay', 1, '2025-05-22 23:14:27', '2025-05-24 20:23:57');

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
(31, 'AQLV9S7A', 30, 1, '2025-06-07', 'Đã giao', '2025-06-07 15:04:12', '2025-06-07 15:06:34'),
(32, 'Q0SDTZJL', 32, 2, '2025-06-12', 'Đã giao', '2025-06-12 12:29:07', '2025-06-12 13:45:14'),
(34, 'DUF7SBW1', 35, 1, '2025-06-15', 'Đang giao', '2025-06-15 16:33:30', '2025-06-15 16:34:32'),
(35, 'VWYNLUMX', 33, 2, '2025-06-15', 'Đã giao', '2025-06-15 16:43:07', '2025-06-15 16:47:00'),
(36, 'JBSNXMLU', 37, 2, '2025-06-16', 'Đang giao', '2025-06-16 14:39:05', '2025-06-16 14:42:24');

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
  `tong_tien` decimal(15,2) DEFAULT NULL,
  `trang_thai` enum('Chờ duyệt','Đã duyệt','Đang giao','Hoàn thành','Hủy') DEFAULT NULL,
  `thanh_toan` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `ma`, `id_khach_hang`, `ten_nguoi_nhan`, `dia_chi_nhan`, `sdt`, `ngay_dat`, `tong_tien`, `trang_thai`, `thanh_toan`, `created_at`, `updated_at`) VALUES
(26, 'ZMBIRL6W', 1, 'Nguyễn Quốc Cường', 'Trà Vinh', '0969898713', '2025-06-04', 360000.00, 'Hoàn thành', 'Thanh toán khi nhận hàng', '2025-06-04 15:03:47', '2025-06-04 15:59:21'),
(31, 'HNNMVGUB', 1, 'Nguyễn Quốc Cường', 'Hanoi', '0399403073', '2025-06-11', 540000.00, 'Hủy', 'Thanh toán khi nhận hàng', '2025-06-11 12:47:15', '2025-06-14 17:22:27'),
(32, 'Q0SDTZJL', 7, 'Nguyễn Thị Cẩm Tiên', 'Thành Phố Trà Vinh', '0969898713', '2025-06-12', 900000.00, 'Hoàn thành', 'Thanh toán khi nhận hàng', '2025-06-12 19:28:27', '2025-06-12 20:45:14'),
(33, 'VWYNLUMX', 7, 'Nguyễn Thị Cẩm Tiên', 'Thành Phố Trà Vinh', '0969898713', '2025-06-12', 895000.00, 'Hoàn thành', 'Thanh toán khi nhận hàng', '2025-06-12 22:48:29', '2025-06-15 23:47:00'),
(34, 'UIGQY9VN', 1, 'Nguyễn Quốc Cường', 'Hanoi', '0399403073', '2025-06-14', 360000.00, 'Hủy', 'Thanh toán khi nhận hàng', '2025-06-14 17:23:49', '2025-06-14 17:24:13'),
(35, 'DUF7SBW1', 1, 'Nguyễn Quốc Cường', 'Hanoi', '0399403073', '2025-06-14', 180000.00, 'Đang giao', 'Thanh toán khi nhận hàng', '2025-06-14 17:28:59', '2025-06-15 23:34:32'),
(37, 'JBSNXMLU', 1, 'Nguyễn Quốc Cường', 'Hanoi', '0399403073', '2025-06-15', 300000.00, 'Đang giao', 'Thanh toán khi nhận hàng', '2025-06-15 23:45:41', '2025-06-16 21:42:24'),
(38, 'QDYD9MPL', 7, 'Nguyễn Thị Cẩm Tiên', 'Thành Phố Trà Vinh', '0969898713', '2025-06-16', 870000.00, 'Chờ duyệt', 'Thanh toán khi nhận hàng', '2025-06-16 08:04:40', '2025-06-16 08:04:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_nhap_nguyen_lieu`
--

CREATE TABLE `don_nhap_nguyen_lieu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma` varchar(50) DEFAULT NULL,
  `id_nha_cung_cap` bigint(20) UNSIGNED NOT NULL,
  `ngay_nhap` date DEFAULT NULL,
  `tong_tien` decimal(15,2) DEFAULT NULL,
  `trang_thai` enum('Chờ duyệt','Đã duyệt','Hoàn thành','Hủy') DEFAULT 'Chờ duyệt',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_nhap_nguyen_lieu`
--

INSERT INTO `don_nhap_nguyen_lieu` (`id`, `ma`, `id_nha_cung_cap`, `ngay_nhap`, `tong_tien`, `trang_thai`, `created_at`, `updated_at`) VALUES
(18, 'NLSXAO1', 1, '2025-06-04', 20600000.00, 'Hoàn thành', '2025-06-04 11:49:47', '2025-06-04 12:27:25'),
(19, 'NLSXAO2', 2, '2025-06-04', 32250000.00, 'Hoàn thành', '2025-06-04 13:40:37', '2025-06-04 13:58:25'),
(23, NULL, 1, '2025-06-15', NULL, 'Chờ duyệt', '2025-06-15 22:18:37', '2025-06-15 22:18:37'),
(25, NULL, 2, '2025-06-15', 11730000.00, 'Hoàn thành', '2025-06-15 22:44:55', '2025-06-15 22:57:15');

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
(32, 44, NULL, '2025-06-09', '2025-06-19', 'Chờ duyệt', '2025-06-15 00:14:42', '2025-06-15 00:14:42'),
(33, 53, NULL, '2025-06-15', '2025-06-26', 'Chờ duyệt', '2025-06-15 21:59:46', '2025-06-15 21:59:46'),
(34, 53, NULL, '2025-06-15', '2025-06-27', 'Hoàn thành', '2025-06-15 22:58:27', '2025-06-15 23:06:19');

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
(27, 18, 8, 500.00, 300.00, NULL, '2025-06-04 11:55:54', '2025-06-08 21:04:00'),
(28, 18, 9, 300.00, 180.00, NULL, '2025-06-04 11:56:16', '2025-06-14 19:36:17'),
(29, 19, 4, 500.00, 50.00, NULL, '2025-06-04 13:54:34', '2025-06-04 14:00:54'),
(30, 19, 2, 500.00, 120.00, NULL, '2025-06-04 13:54:50', '2025-06-14 19:35:10'),
(31, 19, 5, 500.00, 200.00, NULL, '2025-06-04 13:55:04', '2025-06-15 23:01:37'),
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
(60, 25, 11, 100.00, 98.00, NULL, '2025-06-15 22:49:17', '2025-06-16 00:48:16');

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
(73, 30, '2025-06-05 08:41:06', 'Khởi tạo đơn', 'Đơn hàng đã được tạo và chuyển sang đơn giao hàng.', NULL, '2025-06-05 08:41:06', '2025-06-05 08:41:06'),
(74, 30, '2025-06-05 08:45:58', 'Đã phân công', 'Đơn đã được phân công cho nhân viên.', 5, '2025-06-05 08:45:58', '2025-06-05 08:45:58'),
(75, 30, '2025-06-05 08:47:00', 'Đang giao', 'Đang đến kho HCM', 5, '2025-06-05 08:51:46', '2025-06-05 08:51:46'),
(76, 30, '2025-06-05 08:52:00', 'Đang giao', 'Đang đến Bến Tre', 5, '2025-06-05 08:52:30', '2025-06-05 08:52:30'),
(77, 30, '2025-06-05 08:56:00', 'Đã giao', 'Đã đến Trà Vinh', 5, '2025-06-05 08:56:40', '2025-06-05 08:56:40'),
(78, 30, '2025-06-05 08:57:05', 'Đang chuyển', 'Chuyển giao cho nhân viên khác', 1, '2025-06-05 08:57:05', '2025-06-05 08:57:05'),
(79, 30, '2025-06-05 09:00:00', 'Đang giao', 'Đang đến kho Châu  Thành', 1, '2025-06-05 09:01:33', '2025-06-05 09:01:33'),
(80, 30, '2025-06-05 09:15:00', 'Đã giao', 'Hoàn tất', 1, '2025-06-05 09:15:49', '2025-06-05 09:15:49'),
(81, 31, '2025-06-07 22:04:12', 'Khởi tạo đơn', 'Đơn hàng đã được tạo và chuyển sang đơn giao hàng.', NULL, '2025-06-07 22:04:12', '2025-06-07 22:04:12'),
(82, 31, '2025-06-07 22:05:34', 'Đã phân công', 'Đơn đã được phân công cho nhân viên.', 1, '2025-06-07 22:05:34', '2025-06-07 22:05:34'),
(83, 31, '2025-06-07 22:06:00', 'Đã giao', 'Giao thành công', 1, '2025-06-07 22:06:34', '2025-06-07 22:06:34'),
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
(100, 36, '2025-06-16 21:42:24', 'Đã phân công', 'Đơn đã được phân công cho nhân viên.', 3, '2025-06-16 21:42:24', '2025-06-16 21:42:24');

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
(43, 32, 60, 48.00, '2025-06-16 00:30:07', '2025-06-16 00:30:07');

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
  `gia` decimal(15,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyen_lieu_nha_cung_cap`
--

INSERT INTO `nguyen_lieu_nha_cung_cap` (`id`, `id_nha_cung_cap`, `ten`, `loai_nguyen_lieu`, `don_vi_tinh`, `xuat_xu`, `gia`, `created_at`, `updated_at`) VALUES
(2, 2, 'Vải Cotton', 'Vải', 'Mét', 'Mỹ', 20000.00, '2025-05-27 22:53:48', '2025-06-11 13:02:26'),
(4, 2, 'Vải Kaki', 'Vải', 'mét', 'Việt Nam', 44000.00, '2025-05-28 10:24:53', '2025-06-11 13:02:12'),
(5, 2, 'Vải thun cotton', 'Vải', 'Mét', 'Việt Nam', 60000.00, '2025-06-01 21:37:53', '2025-06-11 13:05:55'),
(8, 1, 'Dây kéo', 'Phụ liệu may mặc', 'Cái', 'Đài Loan', 1500.00, '2025-06-04 11:53:54', '2025-06-11 13:37:59'),
(9, 1, 'Nút áo', 'Phụ liệu may mặc', 'Cái', 'Việt Nam', 200.00, '2025-06-04 11:55:24', '2025-06-11 13:38:14'),
(11, 2, 'Chỉ may công nghiệp', 'Chỉ', 'Cuộn', 'Việt Nam', 2000.00, '2025-06-11 13:04:30', '2025-06-11 13:04:30'),
(12, 2, 'Vải polyester', 'Vải', 'Mét', 'Việt Nam', 50000.00, '2025-06-11 13:05:05', '2025-06-11 13:05:05'),
(13, 2, 'Vải thời trang cao cấp', 'Vải', 'Mét', 'Mỹ', 500000.00, '2025-06-11 13:05:42', '2025-06-11 13:06:50'),
(14, 2, 'Vải jean', 'Vải', 'Mét', 'Việt Nam', 70000.00, '2025-06-11 13:06:40', '2025-06-11 13:06:40'),
(15, 1, 'Chỉ may', 'Phụ liệu may mặc', 'Cuộn', 'Đài', 5000.00, '2025-06-11 13:38:59', '2025-06-11 13:38:59'),
(16, 1, 'Ren', 'Phụ liệu trang trí', 'Mét', 'Việt Nam', 3000.00, '2025-06-11 13:39:44', '2025-06-11 13:39:44'),
(17, 1, 'Khóa', 'Phụ liệu may mặc', 'Cái', 'Trungd Quốc', 2000.00, '2025-06-11 13:40:32', '2025-06-11 13:40:32'),
(19, 2, 'Bo cỏ', 'vải bo', 'Mét', 'Việt Nam', 55000.00, '2025-06-15 22:13:00', '2025-06-15 22:13:00'),
(20, 2, 'Nhãn size', 'Size/in chuyển nhiệt', 'Cái', 'Việt Nam', 300.00, '2025-06-15 22:15:30', '2025-06-15 22:15:30');

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
(8, 30, 7, 'thuc_thi', '2025-06-12 10:10:43', '2025-06-12 10:10:43');

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
(2, 'Tổng CTCP Dệt May Hà Nội', 'tongcongtydetmayhanoi@example.com', '0910000002', 'Tầng 8 - Tòa nhà Nam Hải LakeView  Khu đô thị Vĩnh Hoàng, Phường Hoàng Văn Thụ, Quận Hoàng Mai, Hà Nội', '2025-05-20 02:31:33', '2025-06-11 07:06:36');

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
(18, 30, 5, 'Nhận hàng giao nhé!', '2025-06-05 08:45:58', '2025-06-05 08:45:58', '2025-06-05 08:45:58'),
(19, 31, 1, 'Giao nhanh nha mày', '2025-06-07 22:05:34', '2025-06-07 22:05:34', '2025-06-07 22:05:34'),
(20, 32, 3, NULL, '2025-06-12 20:27:03', '2025-06-12 20:27:03', '2025-06-12 20:27:03'),
(21, 34, 1, 'Đang chuyển đến kho Hà Nội', '2025-06-15 23:34:32', '2025-06-15 23:34:32', '2025-06-15 23:34:32'),
(22, 35, 3, 'Đang chuyển đến kho Hà Nội', '2025-06-15 23:43:57', '2025-06-15 23:43:57', '2025-06-15 23:43:57'),
(23, 36, 3, 'Đang chuyển đến kho Hà Nội', '2025-06-16 21:42:24', '2025-06-16 21:42:24', '2025-06-16 21:42:24');

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
  `gia` decimal(15,2) DEFAULT NULL,
  `giamgia` int(11) NOT NULL,
  `trang_thai` tinyint(4) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `id_danh_muc`, `ma`, `ten`, `mo_ta`, `gia`, `giamgia`, `trang_thai`, `created_at`, `updated_at`) VALUES
(44, 1, 'ATN2', 'Áo Thun Nữ Cổ Tròn Màu Xanh Biển', 'Áo thun nữ cổ tròn màu xanh biển, chất liệu cotton co giãn, mềm mại, thoáng mát. Thiết kế đơn giản, năng động, dễ phối đồ cho mọi dịp.', 209000.00, 0, 1, '2025-06-03 20:15:34', '2025-06-04 14:08:35'),
(45, 1, 'ATN3', 'Áo thun nữ LOREN Regular hóa học A21097', NULL, 229000.00, 80000, 0, '2025-06-03 20:33:58', '2025-06-12 16:49:32'),
(46, 1, 'ATN4', 'Áo thun nữ LOREN Regular hóa học - Màu trắng', NULL, 200000.00, 50000, 1, '2025-06-03 20:37:23', '2025-06-04 10:34:39'),
(47, 1, 'ATN5', 'Áo thun nữ LOREN ban nhạc - Màu trắng', NULL, 250000.00, 100000, 0, '2025-06-03 20:43:06', '2025-06-12 16:49:53'),
(48, 1, 'ATN6', 'Áo thun nữ LOREN ban nhạc', NULL, 250000.00, 100000, 0, '2025-06-03 20:48:08', '2025-06-12 16:51:14'),
(49, 1, 'ATN7', 'Áo thun nữ họa tiết thêu-chất đẹp màu trắng', NULL, 190000.00, 0, 0, '2025-06-03 20:51:13', '2025-06-12 16:50:44'),
(50, 1, 'ATN8', 'Áo thun xốp polo Official 1ESS - áo thun nữ polo chất thun xốp màu trắng họa tiết thêu chữ SIÊU HOT', NULL, 180000.00, 0, 0, '2025-06-03 20:52:56', '2025-06-12 16:50:59'),
(51, 1, 'ATN9', 'Áo Thun Nữ Họa Tiết Hoạt Hình Họa Tiết Tom-Soul', NULL, 140000.00, 40000, 0, '2025-06-03 20:54:43', '2025-06-14 23:56:21'),
(52, 2, 'GTT1', 'Giày Thể Thao Nam cao cấp Lakinta giày nam sneaker tập gym chạy bộ', NULL, 199000.00, 0, 0, '2025-06-03 20:58:05', '2025-06-14 23:56:32'),
(53, 1, 'ATN1', 'Áo thun nữ LOREN Regular hóa học - Màu đen', 'LOREN là nhãn hiệu thời trang hàng đầu tại Việt Nam được sản xuất tại nhiều nhà máy trên toàn thế giới như Trung Quốc, Hàn Quốc, Indonesia, Việt Nam… Dù được sản xuất ở đâu, các sản phẩm đều tuân theo quy trình kiểm soát chất lượng nghiêm ngặt và đồng đều của LOREN. Các sản phẩm chính hãng đều có tem nhãn tiếng Việt phía sau và nhập khẩu hoặc sản xuất trực tiếp từ LOREN JSC nên các bạn hoàn toàn yên tâm về chất lượng sản phẩm.', 180000.00, 0, 1, '2025-06-03 20:59:43', '2025-06-15 23:06:19'),
(54, 2, 'GTT2', 'Giày Thể Thao Nam Tập Gym Chạy Bộ Thể Dục Lakinta giày sneaker nam hàn quốc cổ thấp 2 màu đen trắng giá rẻ đẹp', NULL, 169000.00, 0, 0, '2025-06-03 21:08:35', '2025-06-14 23:56:45'),
(55, 2, 'GTT3', 'Giày thể thao nam LAKINTA, giày sneakers kẻ caro cá tính', NULL, 199000.00, 0, 1, '2025-06-03 21:10:18', '2025-06-03 21:10:18'),
(56, 2, 'GTT4', 'Giày thể thao nam Lakinta, giày sneakers nam độn đế tăng chiều cao màu trắng', NULL, 189000.00, 0, 1, '2025-06-03 21:12:55', '2025-06-03 21:12:55'),
(57, 2, 'GTT5', 'Giày thể thao nam LAKINTA, giày sneakers nam hình gấu trẻ trung năng động', NULL, 200000.00, 50000, 0, '2025-06-03 21:14:35', '2025-06-16 11:14:43'),
(58, 2, 'GTT7', 'Giày Thể Thao Nam Tập Gym Chạy Bộ Thể Dục Lakinta Giày Sneaker Nam Hàn Quốc giá rẻ đẹp', NULL, 250000.00, 50000, 1, '2025-06-03 21:16:41', '2025-06-03 21:16:41'),
(59, 2, 'GTT8', 'Giày thể thao nam Lakinta, giày sneakers nam màu xám basic', NULL, 199000.00, 0, 1, '2025-06-03 21:18:24', '2025-06-03 21:18:24'),
(60, 2, 'GTT9', 'Giày thể thao nam Lakinta, giày sneakers nam thổ cẩm mẫu mới', NULL, 199000.00, 0, 1, '2025-06-03 21:20:58', '2025-06-03 21:20:58'),
(61, 3, 'TXN1', 'TOT Tag Tim Sz 33 - Hồng', NULL, 1113000.00, 0, 1, '2025-06-03 21:24:06', '2025-06-03 21:24:06'),
(62, 3, 'TXN2', 'TDV Hobo Dập Nổi Line Embossed Sz 23 - Trắng', NULL, 779000.00, 0, 1, '2025-06-03 21:25:50', '2025-06-03 21:25:50'),
(63, 3, 'TXN3', 'TÚI XÁCH NỮ CROSS BODY 99155', NULL, 650000.00, 30000, 1, '2025-06-03 21:27:23', '2025-06-03 21:27:23'),
(64, 3, 'TXN4', 'Túi Gucci Horsebit 1955– Biểu tượng thời trang sang trọng và đẳng cấp', NULL, 1390000.00, 390000, 1, '2025-06-03 21:29:29', '2025-06-03 21:29:29'),
(65, 3, 'TXN5', 'Túi xách / đeo chéo Nữ Chauxunel Doris 9010K Chính Hãng', NULL, 850000.00, 250000, 1, '2025-06-03 21:31:23', '2025-06-03 21:31:23'),
(66, 3, 'TXN6', 'Túi xách / đeo chéo Nữ Hermès Constance 2024 - 20cm', NULL, 950000.00, 230000, 1, '2025-06-03 21:33:03', '2025-06-03 21:33:03'),
(67, 3, 'TXN7', 'Túi xách nữ hàng hiệu đeo chéo Velisa H1333', NULL, 750000.00, 300000, 1, '2025-06-03 21:35:09', '2025-06-03 21:37:14'),
(68, 3, 'TXN8', 'TDV Hobo Đáy Vuông Love Charm Sz 23 - Jean', NULL, 983000.00, 0, 1, '2025-06-03 21:37:00', '2025-06-03 21:37:00'),
(69, 4, 'PKTT', 'Mũ Bucket Vành Tròn Nam, Nữ Phong Cách Hàn Quốc', NULL, 1000000.00, 0, 0, '2025-06-03 21:41:34', '2025-06-16 11:14:33'),
(70, 4, 'PKTT2', 'Kính Mát Nam Nữ Gentle Monster Palette Cao Cấp', NULL, 1500000.00, 600000, 0, '2025-06-03 21:46:03', '2025-06-16 11:14:18'),
(71, 4, 'PKTT3', 'Mắt kính râm GM nam nữ vuông lớn tràn viền 623', NULL, 119000.00, 0, 0, '2025-06-03 21:48:18', '2025-06-14 23:57:15'),
(72, 4, 'PKTT4', 'Mũ Lưỡi Trai M190 Phong Cách Hàn Quốc Cho Nam, Nữ', NULL, 350000.00, 250000, 0, '2025-06-03 21:53:02', '2025-06-14 23:56:58'),
(73, 4, 'PKTT5', 'Thắt lưng da phối khóa vuông', NULL, 4450000.00, 2225000, 0, '2025-06-03 22:07:16', '2025-06-16 11:14:05');

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
('k8QyH6YX04oAqhj8GQ4wAnyjP6uKDdkgrJry6gwX', 29, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaW4wWmdYZzdEUWFXVVNhUDB6aEFURlk2UzBJSWNlc2NBaExhYXUxaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb25ndHkvZG9uaGFuZyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI5O30=', 1750085291),
('Pqwg1XqVTs13SEJMKm6lLSzo8mBZgB4JyQSnRkav', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNlM4MllOVkNJenZnV2J5b2dNbjBpakNPc0NvN3pEcmllTGRacmdpQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb25ndHkvZG9uaGFuZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1750116530);

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
(27, 'tien', 'Nguyễn Thị Cẩm Tiên', '849999451245', 'nguyenthicamtien16102001@gmail.com', '$2y$12$sDyiD7ej0.dOxfhDrqo/6O0kCcJQ2S8PXce1rd6keXgdqYSQRSaky', '0969898713', 'Thành Phố Trà Vinh', 'khach_hang', 1, NULL, '2025-06-07 14:59:45', '2025-06-12 16:24:33'),
(29, 'thanh', 'Lý Hồng Thanh', '849999451233', 'hongthanh@gmail.com', '$2y$12$C1oy1bpWgjvXCc0IN1gjhO5eqIey8GCKimJ2ZhV18ZsBpITB3JVHe', '0976543213', 'Thành Phố Hồ Chí Minh', 'nhan_vien_cong_ty', 1, NULL, '2025-06-11 05:25:19', '2025-06-12 09:59:54');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_san_xuat`
--
ALTER TABLE `chi_tiet_don_san_xuat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_nhap_nguyen_lieu`
--
ALTER TABLE `chi_tiet_nhap_nguyen_lieu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `don_giao_hang`
--
ALTER TABLE `don_giao_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `don_nhap_nguyen_lieu`
--
ALTER TABLE `don_nhap_nguyen_lieu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `don_san_xuat`
--
ALTER TABLE `don_san_xuat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hinh_anh_san_pham`
--
ALTER TABLE `hinh_anh_san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `lo_trinh_don`
--
ALTER TABLE `lo_trinh_don`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nguyen_lieu_don_san_xuat`
--
ALTER TABLE `nguyen_lieu_don_san_xuat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `nguyen_lieu_nha_cung_cap`
--
ALTER TABLE `nguyen_lieu_nha_cung_cap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `phan_cong_giao_hang`
--
ALTER TABLE `phan_cong_giao_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
