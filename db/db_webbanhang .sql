-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2020 lúc 03:21 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_webbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_hd`
--

CREATE TABLE `chi_tiet_hd` (
  `id_chi_tiet_HD` int(10) UNSIGNED NOT NULL,
  `id_hoa_don` int(10) UNSIGNED NOT NULL,
  `id_chi_tiet_sp` int(10) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_hd`
--

INSERT INTO `chi_tiet_hd` (`id_chi_tiet_HD`, `id_hoa_don`, `id_chi_tiet_sp`, `so_luong`, `don_gia`, `created_at`, `updated_at`) VALUES
(8, 22, 53, 4, 162000, '2020-11-04 07:51:13', NULL),
(9, 22, 52, 1, 162000, '2020-11-04 07:51:13', NULL),
(10, 23, 85, 1, 208000, '2020-11-04 08:54:23', NULL),
(11, 23, 63, 1, 370000, '2020-11-04 08:54:23', NULL),
(12, 23, 79, 1, 208000, '2020-11-04 08:54:23', NULL),
(13, 24, 97, 1, 440000, '2020-11-04 08:55:32', NULL),
(14, 24, 91, 1, 393000, '2020-11-04 08:55:32', NULL),
(15, 25, 49, 1, 533000, '2020-11-04 08:59:58', NULL),
(16, 26, 70, 1, 162000, '2020-11-05 13:06:11', NULL),
(17, 26, 60, 1, 370000, '2020-11-05 13:06:11', NULL),
(18, 26, 48, 1, 533000, '2020-11-05 13:06:11', NULL),
(19, 27, 48, 1, 533000, '2020-11-05 14:20:49', NULL),
(20, 27, 60, 1, 370000, '2020-11-05 14:20:49', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_sp`
--

CREATE TABLE `chi_tiet_sp` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_san_pham` int(10) UNSIGNED NOT NULL,
  `id_mau` int(10) UNSIGNED NOT NULL,
  `id_size` int(10) UNSIGNED NOT NULL,
  `soluong` varchar(45) DEFAULT NULL,
  `da_ban` int(10) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_sp`
--

INSERT INTO `chi_tiet_sp` (`id`, `id_san_pham`, `id_mau`, `id_size`, `soluong`, `da_ban`, `created_at`, `updated_at`) VALUES
(47, 259, 6, 1, '200', 0, NULL, NULL),
(48, 259, 6, 2, '200', 2, NULL, '2020-11-05 14:20:49'),
(49, 259, 6, 3, '50', 1, NULL, '2020-11-04 08:59:58'),
(50, 258, 7, 2, '200', 0, NULL, NULL),
(51, 258, 7, 3, '200', 0, NULL, NULL),
(52, 260, 4, 1, '200', 1, NULL, '2020-11-04 07:51:13'),
(53, 260, 4, 4, '200', 4, NULL, '2020-11-04 07:51:13'),
(54, 260, 1, 1, '0', 0, NULL, NULL),
(55, 260, 1, 4, '200', 0, NULL, NULL),
(56, 260, 1, 2, '200', 0, NULL, NULL),
(57, 260, 7, 2, '20', 0, NULL, NULL),
(58, 260, 7, 1, '200', 0, NULL, NULL),
(59, 262, 8, 1, '222', 0, NULL, NULL),
(60, 262, 8, 2, '222', 2, NULL, '2020-11-05 14:20:49'),
(61, 262, 1, 2, '222', 0, NULL, NULL),
(62, 262, 7, 1, '212', 0, NULL, NULL),
(63, 262, 7, 2, '213', 1, NULL, '2020-11-04 08:54:23'),
(64, 263, 9, 1, '222', 0, NULL, NULL),
(65, 263, 9, 2, '222', 0, NULL, NULL),
(66, 263, 9, 3, '222', 0, NULL, NULL),
(67, 263, 10, 3, '222', 0, NULL, NULL),
(68, 263, 11, 1, '12', 0, NULL, NULL),
(69, 264, 6, 1, '222', 0, NULL, NULL),
(70, 264, 6, 3, '2222', 1, NULL, '2020-11-05 13:06:11'),
(71, 265, 5, 1, '222', 0, NULL, NULL),
(72, 265, 5, 2, '222', 0, NULL, NULL),
(73, 265, 10, 1, '23', 0, NULL, NULL),
(74, 265, 10, 2, '233', 0, NULL, NULL),
(75, 266, 11, 1, '21', 0, NULL, NULL),
(76, 266, 11, 2, '21', 0, NULL, NULL),
(77, 266, 11, 3, '21', 0, NULL, NULL),
(78, 267, 8, 1, '123', 0, NULL, NULL),
(79, 267, 8, 2, '123', 1, NULL, '2020-11-04 08:54:23'),
(80, 268, 8, 1, '2222', 0, NULL, NULL),
(81, 268, 4, 1, '2222', 0, NULL, NULL),
(82, 268, 4, 7, '222', 0, NULL, NULL),
(83, 269, 11, 1, '22', 0, NULL, NULL),
(85, 269, 11, 3, '231', 1, NULL, '2020-11-04 08:54:23'),
(86, 270, 12, 1, '213', 0, NULL, NULL),
(87, 270, 12, 3, '213', 0, NULL, NULL),
(88, 271, 4, 1, '213', 0, NULL, NULL),
(89, 271, 4, 2, '213', 0, NULL, NULL),
(90, 272, 5, 3, '21', 0, NULL, NULL),
(91, 272, 5, 2, '21', 1, NULL, '2020-11-04 08:55:32'),
(92, 272, 13, 1, '213', 0, NULL, NULL),
(93, 273, 6, 1, '123', 0, NULL, NULL),
(94, 273, 6, 2, '123', 0, NULL, NULL),
(95, 274, 14, 1, '213', 0, NULL, NULL),
(96, 274, 14, 2, '123', 0, NULL, NULL),
(97, 274, 14, 3, '123', 1, NULL, '2020-11-04 08:55:32'),
(98, 275, 7, 1, '123', 0, NULL, NULL),
(99, 276, 11, 1, '123', 0, NULL, NULL),
(100, 276, 11, 2, '123', 0, NULL, NULL),
(101, 276, 10, 2, '123', 0, NULL, NULL),
(102, 277, 11, 1, '132', 0, NULL, NULL),
(103, 278, 11, 1, '123', 0, NULL, NULL),
(104, 278, 11, 3, '123', 0, NULL, NULL),
(105, 279, 10, 1, '123', 0, NULL, NULL),
(106, 279, 10, 2, '123', 0, NULL, NULL),
(107, 280, 4, 1, '123', 0, NULL, NULL),
(108, 280, 4, 2, '123', 0, NULL, NULL),
(109, 280, 4, 3, '123', 0, NULL, NULL),
(110, 281, 1, 1, '123', 0, NULL, NULL),
(111, 281, 1, 2, '123', 0, NULL, NULL),
(112, 282, 6, 1, '213', 0, NULL, NULL),
(113, 282, 6, 3, '213', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dong_gia`
--

CREATE TABLE `dong_gia` (
  `id` int(11) UNSIGNED NOT NULL,
  `ten_donggia` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id_hoa_don` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `ngay_mua` date DEFAULT NULL,
  `tong_tien` float DEFAULT NULL,
  `thanh_toan` varchar(200) DEFAULT NULL,
  `ghi_chu` varchar(500) DEFAULT NULL,
  `trang_thai` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`id_hoa_don`, `id_user`, `ngay_mua`, `tong_tien`, `thanh_toan`, `ghi_chu`, `trang_thai`, `created_at`, `updated_at`) VALUES
(22, 1, '2020-11-04', 830000, 'COD', 'Giao hang vào giờ hành chính', 'Đang chờ xử lý', '2020-11-04 07:51:13', '2020-11-04 07:51:13'),
(23, 4, '2020-11-04', 786000, 'COD', 'Giao Sớm', 'Đã xác nhận giao hàng', '2020-11-04 08:56:09', '2020-11-04 08:56:09'),
(24, 4, '2020-11-04', 853000, 'COD', 'Giao vào buổi chiều', 'Đang chờ xử lý', '2020-11-04 08:55:32', '2020-11-04 08:55:32'),
(25, 5, '2020-11-04', 553000, 'COD', 'Giao hàng Sớm', 'Đang chờ xử lý', '2020-11-04 08:59:58', '2020-11-04 08:59:58'),
(26, 1, '2020-11-05', 1085000, 'COD', 'Giao hang vào giờ hành chính', 'Đang chờ xử lý', '2020-11-05 13:06:11', '2020-11-05 13:06:11'),
(27, 6, '2020-11-05', 923000, 'COD', 'Giao hang vào giờ hành chính', 'Đang chờ xử lý', '2020-11-05 14:20:49', '2020-11-05 14:20:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `id_loai_san_pham` int(10) UNSIGNED NOT NULL,
  `ten_LSP` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mo_ta` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `trang_thai` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id_loai_san_pham`, `ten_LSP`, `mo_ta`, `trang_thai`, `created_at`, `updated_at`) VALUES
(11, 'Váy', 'Những chiếc đầm váy nữ đẹp luôn được biến hóa với nhiều kiểu cách và màu sắc khác nhau.', 1, '2020-09-26 13:59:45', '2020-10-21 06:09:06'),
(12, 'Áo thun ', 'Thiết kế mẫu mã cùng chất liệu áo thun nữ đẹp cao cấp nhất để chinh phục những người khó tính nhất về thời trang', 1, '2020-09-26 14:00:45', NULL),
(13, 'Áo sơ mi', 'Mỗi một mẫu áo mang một nét khác biệt và có thể phối được với nhiều loại quần và chân váy.', 1, '2020-09-26 14:07:12', '2020-10-23 05:43:23'),
(14, 'Áo Vest', 'Đa dạng mẫu mã như áo Vest dù nữ, áo Vestkaki nữ, áo Vestjean nữ.', 1, '2020-09-26 14:07:12', '2020-11-04 08:40:23'),
(15, 'Quần jean', 'Nàng diện đơn giản thì chọn áo thun form trơn, diện điệu đà thì chọn áo thun form rộng.', 0, '2020-09-26 14:11:13', '2020-11-04 08:43:12'),
(16, 'Đầm', 'Váy đầm ngắn và dài, kiểu bút chì, kiểu buổi tối, dự tiệc, dự tiệc cocktail,', 1, '2020-09-26 14:11:13', NULL),
(18, 'Quần', 'Nàng diện đơn giản thì chọn áo thun form trơn, diện điệu đà thì chọn áo thun form rộng.', 1, '2020-10-09 03:06:15', '2020-11-04 08:11:28'),
(46, 'Áo bra', 'Thời trang trẻ trung', 0, NULL, NULL),
(47, 'Đồng giá 99k', 'Đồng giá 99k', 0, NULL, NULL),
(48, 'Đồng giá 199k', 'Đồng giá 199k', 0, NULL, NULL),
(49, 'Đồng giá 149k', 'Đồng giá 149k', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau_sp`
--

CREATE TABLE `mau_sp` (
  `id` int(10) UNSIGNED NOT NULL,
  `mau` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mau_sp`
--

INSERT INTO `mau_sp` (`id`, `mau`, `created_at`, `updated_at`) VALUES
(1, 'Xanh lá', '2020-09-30 06:20:55', '2020-09-30 06:20:55'),
(2, 'Xanh Bạc hà', '2020-09-30 06:20:55', '2020-09-30 06:20:55'),
(3, 'Trắng chấm bi', '2020-10-27 02:57:27', '2020-10-27 02:57:27'),
(4, 'Trắng đen', '2020-10-27 03:28:38', '2020-10-27 03:28:38'),
(5, 'Loang Hồng', '2020-10-30 06:14:14', '2020-10-30 06:14:14'),
(6, 'Màu be', '2020-11-04 06:57:49', '2020-11-04 06:57:49'),
(7, 'Màu tím Violet', '2020-11-04 06:59:05', '2020-11-04 06:59:05'),
(8, 'Nhiều màu', '2020-11-04 07:31:51', '2020-11-04 07:31:51'),
(9, 'Trắng', '2020-11-04 07:36:32', '2020-11-04 07:36:32'),
(10, 'Xám', '2020-11-04 07:36:38', '2020-11-04 07:36:38'),
(11, 'Đen', '2020-11-04 07:36:44', '2020-11-04 07:36:44'),
(12, 'Xanh đen', '2020-11-04 08:06:19', '2020-11-04 08:06:19'),
(13, 'Loang xanh', '2020-11-04 08:17:00', '2020-11-04 08:17:00'),
(14, 'Cam', '2020-11-04 08:23:30', '2020-11-04 08:23:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`, `updated_at`) VALUES
('t01685732770@gmail.com', 'aK6MOA0szpzNbMGamIlNjQJzZxvTXtQ0QRl3Hdwyfap2XY6d8iqHGfWKJjYc', '2020-11-05 01:50:04', '2020-11-05 01:50:04'),
('t01685732770@gmail.com', 'JF7XeecFp0ulhxcspXDdJ7Ovp9PwWHBGIjXqFndpot7UVmmsdatYTHLkD7zA', '2020-11-05 01:58:56', '2020-11-05 01:58:56'),
('t01685732770@gmail.com', 'OKPgDhOl2voqWc7xWDGQkDGuVZtYJLWqXf5HIB6h1euww0edSUcURRaQ8OcG', '2020-11-05 09:33:39', '2020-11-05 09:33:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_san_pham` varchar(100) DEFAULT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `id_loai_san_pham` int(10) UNSIGNED DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `phong_cach` varchar(100) DEFAULT NULL,
  `kieu_mau` varchar(100) DEFAULT NULL,
  `thanh_phan` varchar(100) DEFAULT NULL,
  `gia` float DEFAULT NULL,
  `gia_khuyen_mai` float DEFAULT NULL,
  `moi` tinyint(4) DEFAULT 0,
  `da_ban` int(10) DEFAULT 0,
  `ten_file` varchar(100) DEFAULT NULL,
  `h1` varchar(100) DEFAULT NULL,
  `h2` varchar(100) DEFAULT NULL,
  `h3` varchar(100) DEFAULT NULL,
  `h4` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_san_pham`, `hinh`, `id_loai_san_pham`, `mo_ta`, `phong_cach`, `kieu_mau`, `thanh_phan`, `gia`, `gia_khuyen_mai`, `moi`, `da_ban`, `ten_file`, `h1`, `h2`, `h3`, `h4`, `created_at`, `updated_at`) VALUES
(258, 'Đầm Nút Sọc ca rô Giải trí', 'Dam-Nut-Soc-ca-ro-Giai-tri2801_51_52.png', 16, 'Đầm Nút Sọc ca rô Giải trí	Nút, Nút phía trước\r\nChiều dài tay:	Tay áo dài\r\nLoại tay áo:	Thả vai', 'Giải trí', 'Sọc ca rô', '100% Polyester', 370000, 259000, 0, 0, 'Dam-Nut-Soc-ca-ro-Giai-tri/', 'Dam-Nut-Soc-ca-ro-Giai-tri2201_51_52.jpg', 'Dam-Nut-Soc-ca-ro-Giai-tri1501_51_52.png', 'Dam-Nut-Soc-ca-ro-Giai-tri501_51_52.jpg', 'Dam-Nut-Soc-ca-ro-Giai-tri8601_51_52.jpg', NULL, '2020-11-05 03:45:25'),
(259, 'Đầm Dây kéo màu trơn Hấp dẫn', 'Dam-Day-keo-mau-tron-Hap-dan6001_55_34.jpg', 16, 'Đầm Dây kéo màu trơn Hấp dẫn \r\nKiểu mẫu:	màu trơn \r\nViền :	Vòng cổ \r\nChiều dài:	Ngắn', 'Hấp dẫn', 'Phù hợp', '100% Polyester', 533000, 0, 0, 2, 'Dam-Day-keo-mau-tron-Hap-dan/', 'Dam-Day-keo-mau-tron-Hap-dan7301_55_34.jpg', 'Dam-Day-keo-mau-tron-Hap-dan3201_55_34.jpg', 'Dam-Day-keo-mau-tron-Hap-dan7401_55_34.jpg', 'Dam-Day-keo-mau-tron-Hap-dan5501_55_34.jpg', NULL, '2020-11-05 14:20:06'),
(260, 'Đầm Chia Sọc ca rô Thanh lịch', 'Dam-Chia-Soc-ca-ro-Thanh-lich7002_02_58.jpg', 16, 'Đầm Chia Sọc ca rô Thanh lịch \r\nKiểu:	eo hẹp \r\nChi tiết:	Chia \r\nChiều dài tay:	Không tay \r\nMùa:	Mùa Hè', 'Thanh lịch', 'Eo hẹp', '5% Spandex, 95% Polyester', 162000, 0, 1, 5, 'Dam-Chia-Soc-ca-ro-Thanh-lich/', 'Dam-Chia-Soc-ca-ro-Thanh-lich4702_02_58.jpg', 'Dam-Chia-Soc-ca-ro-Thanh-lich7302_02_58.jpg', 'Dam-Chia-Soc-ca-ro-Thanh-lich1102_02_58.jpg', 'Dam-Chia-Soc-ca-ro-Thanh-lich3902_02_58.jpg', NULL, '2020-11-05 14:20:06'),
(262, 'Đầm Dây kéo Hoa Nhiều màu Boho', 'Dam-Day-keo-Hoa-Nhieu-mau-Boho5202_31_22.jpg', 16, 'Đầm Dây kéo Hoa Nhiều màu Boho', 'Boho', 'Hoa, Tất cả  in', '100% Polyester', 370000, 0, 1, 2, 'Dam-Day-keo-Hoa-Nhieu-mau-Boho/', 'Dam-Day-keo-Hoa-Nhieu-mau-Boho202_31_22.jpg', 'Dam-Day-keo-Hoa-Nhieu-mau-Boho5402_31_22.jpg', 'Dam-Day-keo-Hoa-Nhieu-mau-Boho8302_31_22.jpg', 'Dam-Day-keo-Hoa-Nhieu-mau-Boho802_31_22.jpg', NULL, '2020-11-05 14:20:06'),
(263, 'BASICS Áo thun màu trơn Cơ bản', 'BASICS-Ao-thun-mau-tron-Co-ban6102_36_01.jpg', 12, 'BASICS Áo thun màu trơn Cơ bản', 'Cơ bản', 'Màu trơn', '5% Spandex, 95% Bông', 289000, 231000, 1, 0, 'BASICS-Ao-thun-mau-tron-Co-ban/', 'BASICS-Ao-thun-mau-tron-Co-ban6102_36_01.jpg', 'BASICS-Ao-thun-mau-tron-Co-ban3902_36_01.jpg', 'BASICS-Ao-thun-mau-tron-Co-ban6902_36_01.jpg', 'BASICS-Ao-thun-mau-tron-Co-ban8302_36_01.jpg', NULL, '2020-11-05 03:45:25'),
(264, 'Áo thun Xù màu trơn Giải trí', 'Ao-thun-Xu-mau-tron-Giai-tri8802_40_37.jpg', 12, 'Áo thun Xù màu trơn Giải trí', 'Giải trí', 'Màu trơn', '34.5% Bông, 3.5% Spandex, 62% Polyester', 162000, 0, 0, 1, 'Ao-thun-Xu-mau-tron-Giai-tri/', 'Ao-thun-Xu-mau-tron-Giai-tri9702_40_37.jpg', 'Ao-thun-Xu-mau-tron-Giai-tri4202_40_37.jpg', 'Ao-thun-Xu-mau-tron-Giai-tri4502_40_37.jpg', 'Ao-thun-Xu-mau-tron-Giai-tri3402_40_37.jpg', NULL, '2020-11-05 14:20:06'),
(265, 'Áo thun màu trơn Thanh lịch', 'Ao-thun-mau-tron-Thanh-lich4202_45_18.jpg', 12, 'Áo thun màu trơn Thanh lịch', 'Thanh lịch', 'Màu trơn', '100% Polyester', 255000, 199000, 0, 0, 'Ao-thun-mau-tron-Thanh-lich/', 'Ao-thun-mau-tron-Thanh-lich9702_45_18.jpg', 'Ao-thun-mau-tron-Thanh-lich4602_45_18.jpg', 'Ao-thun-mau-tron-Thanh-lich4202_45_18.jpg', 'Ao-thun-mau-tron-Thanh-lich5202_45_18.jpg', NULL, '2020-11-05 03:45:25'),
(266, 'Áo thun Cắt ra màu trơn Gợi cảm', 'Ao-thun-Cat-ra-mau-tron-Goi-cam1302_48_50.jpg', 12, 'Áo thun Cắt ra màu trơn Gợi cảm', 'Gợi cảm', 'Màu trơn', '11% Bông, 3% Spandex, 86% Polyester', 324000, 0, 1, 0, 'Ao-thun-Cat-ra-mau-tron-Goi-cam/', 'Ao-thun-Cat-ra-mau-tron-Goi-cam5502_48_50.jpg', 'Ao-thun-Cat-ra-mau-tron-Goi-cam5202_48_50.jpg', 'Ao-thun-Cat-ra-mau-tron-Goi-cam6502_48_50.jpg', 'Ao-thun-Cat-ra-mau-tron-Goi-cam2802_48_50.jpg', NULL, '2020-11-05 03:45:25'),
(267, 'Áo sơ mi Hoa Giải trí', 'Ao-so-mi-Hoa-Giai-tri3702_54_04.jpg', 13, 'Áo sơ mi Hoa Giải trí', 'Giải trí', 'Hoa, Tất cả  in', '100% Polyester', 208000, 0, 1, 1, 'Ao-so-mi-Hoa-Giai-tri/', 'Ao-so-mi-Hoa-Giai-tri2202_54_04.jpg', 'Ao-so-mi-Hoa-Giai-tri6102_54_04.jpg', 'Ao-so-mi-Hoa-Giai-tri1702_54_04.jpg', 'Ao-so-mi-Hoa-Giai-tri9302_54_04.jpg', NULL, '2020-11-05 14:20:06'),
(268, 'Áo sơ mi Xù Tất cả trên in Giải trí', 'Ao-so-mi-Xu-Tat-ca-tren-in-Giai-tri4402_58_31.jpg', 13, 'Áo sơ mi Xù Tất cả trên in Giải trí', 'Giải trí', 'Beo', '100% Polyester', 260000, 199000, 0, 0, 'Ao-so-mi-Xu-Tat-ca-tren-in-Giai-tri/', 'Ao-so-mi-Xu-Tat-ca-tren-in-Giai-tri6902_58_31.jpg', 'Ao-so-mi-Xu-Tat-ca-tren-in-Giai-tri4302_58_31.jpg', 'Ao-so-mi-Xu-Tat-ca-tren-in-Giai-tri7002_58_31.jpg', 'Ao-so-mi-Xu-Tat-ca-tren-in-Giai-tri6902_58_31.jpg', NULL, '2020-11-05 03:45:25'),
(269, 'Áo sơ mi Tương phản màu đen Thanh lịch', 'Ao-so-mi-Tuong-phan-mau-den-Thanh-lich5003_01_42.jpg', 13, 'Áo sơ mi Tương phản màu đen Thanh lịch', 'Thanh lịch', 'Màu trơn', '100% Polyester', 208000, 0, 1, 1, 'Ao-so-mi-Tuong-phan-mau-den-Thanh-lich/', 'Ao-so-mi-Tuong-phan-mau-den-Thanh-lich2603_01_42.jpg', 'Ao-so-mi-Tuong-phan-mau-den-Thanh-lich7603_01_42.jpg', 'Ao-so-mi-Tuong-phan-mau-den-Thanh-lich6803_01_42.jpg', 'Ao-so-mi-Tuong-phan-mau-den-Thanh-lich6403_01_42.jpg', NULL, '2020-11-05 14:20:06'),
(270, 'Áo sơ mi Pha lê kim cương Thanh lịch', 'Ao-so-mi-Pha-le-kim-cuong-Thanh-lich803_05_54.jpg', 13, 'Áo sơ mi Pha lê kim cương Thanh lịch', 'Thanh lịch', 'Màu trơn', '100% Polyester', 242000, 241000, 0, 0, 'Ao-so-mi-Pha-le-kim-cuong-Thanh-lich/', 'Ao-so-mi-Pha-le-kim-cuong-Thanh-lich7703_05_54.jpg', 'Ao-so-mi-Pha-le-kim-cuong-Thanh-lich4503_05_54.jpg', 'Ao-so-mi-Pha-le-kim-cuong-Thanh-lich2603_05_54.jpg', 'Ao-so-mi-Pha-le-kim-cuong-Thanh-lich1303_05_54.jpg', NULL, '2020-11-05 03:45:25'),
(271, 'Quần đóm  Giải trí', 'Quan-dom--Giai-tri7403_11_03.jpg', 18, 'Quần đóm  Giải trí', 'Giải trí', 'Hoa, Tất cả  in', '100% Polyester', 347000, 215000, 0, 0, 'Quan-dom--Giai-tri/', 'Quan-dom--Giai-tri6703_11_03.jpg', 'Quan-dom--Giai-tri3903_11_03.jpg', 'Quan-dom--Giai-tri5403_11_03.jpg', 'Quan-dom--Giai-tri2703_11_03.jpg', NULL, '2020-11-05 03:45:25'),
(272, 'Quần Hoa Nhiều màu Giải trí', 'Quan-Hoa-Nhieu-mau-Giai-tri1703_16_19.jpg', 18, 'Quần Hoa Nhiều màu Giải trí', 'Giải trí', 'Hoa, Cà vạt nhuộm', '100% Polyester', 393000, 0, 1, 1, 'Quan-Hoa-Nhieu-mau-Giai-tri/', 'Quan-Hoa-Nhieu-mau-Giai-tri6103_16_19.jpg', 'Quan-Hoa-Nhieu-mau-Giai-tri3703_16_19.jpg', 'Quan-Hoa-Nhieu-mau-Giai-tri1103_16_19.jpg', 'Quan-Hoa-Nhieu-mau-Giai-tri7303_16_19.jpg', NULL, '2020-11-05 14:20:06'),
(273, 'Quần Dây kéo màu trơn Giải trí', 'Quan-Day-keo-mau-tron-Giai-tri1703_20_39.jpg', 18, 'Quần Dây kéo màu trơn Giải trí', 'Giải trí', 'Màu trơn', '100% Polyester', 394000, 393000, 0, 0, 'Quan-Day-keo-mau-tron-Giai-tri/', 'Quan-Day-keo-mau-tron-Giai-tri4803_20_39.jpg', 'Quan-Day-keo-mau-tron-Giai-tri6003_20_39.jpg', 'Quan-Day-keo-mau-tron-Giai-tri7503_20_39.jpg', 'Quan-Day-keo-mau-tron-Giai-tri2103_20_39.jpg', NULL, '2020-11-05 03:45:25'),
(274, 'Quần Túi màu trơn Thể thao', 'Quan-Tui-mau-tron-The-thao4603_23_12.jpg', 18, 'Quần Túi màu trơn Thể thao', 'Giải trí', 'Ông bo', '100% Polyester', 440000, 0, 1, 1, 'Quan-Tui-mau-tron-The-thao/', 'Quan-Tui-mau-tron-The-thao2003_23_12.jpg', 'Quan-Tui-mau-tron-The-thao303_23_12.jpg', 'Quan-Tui-mau-tron-The-thao7403_23_12.jpg', 'Quan-Tui-mau-tron-The-thao7203_23_12.jpg', NULL, '2020-11-05 14:20:06'),
(275, 'Váy Dây kéo màu trơn Thanh lịch', 'Vay-Day-keo-mau-tron-Thanh-lich9503_27_02.jpg', 11, 'Váy Dây kéo màu trơn Thanh lịch', 'Thanh lịch', 'Màu trơn', '100% Polyester', 373000, 0, 0, 0, 'Vay-Day-keo-mau-tron-Thanh-lich/', 'Vay-Day-keo-mau-tron-Thanh-lich4403_27_02.jpg', 'Vay-Day-keo-mau-tron-Thanh-lich203_27_02.jpg', 'Vay-Day-keo-mau-tron-Thanh-lich1503_27_02.jpg', 'Vay-Day-keo-mau-tron-Thanh-lich203_27_02.jpg', NULL, '2020-11-05 03:45:25'),
(276, 'Váy Dây kéo màu trơn Hấp dẫn', 'Vay-Day-keo-mau-tron-Hap-dan3103_29_16.jpg', 11, 'Váy Dây kéo màu trơn Hấp dẫn', 'Thanh lịch', 'Màu trơn', '100% Polyester', 324000, 0, 0, 0, 'Vay-Day-keo-mau-tron-Hap-dan/', 'Vay-Day-keo-mau-tron-Hap-dan7503_29_16.jpg', 'Vay-Day-keo-mau-tron-Hap-dan3903_29_16.jpg', 'Vay-Day-keo-mau-tron-Hap-dan9603_29_16.jpg', 'Vay-Day-keo-mau-tron-Hap-dan703_29_16.jpg', NULL, '2020-11-05 03:45:25'),
(277, 'Váy Tương phản Mesh Báo Thanh lịch', 'Vay-Tuong-phan-Mesh-Bao-Thanh-lich8503_31_27.jpg', 11, 'Váy Tương phản Mesh Báo Thanh lịch', 'Thanh lịch', 'Hoa, Tất cả  in', '100% Polyester', 440000, 0, 0, 0, 'Vay-Tuong-phan-Mesh-Bao-Thanh-lich/', 'Vay-Tuong-phan-Mesh-Bao-Thanh-lich8703_31_27.jpg', 'Vay-Tuong-phan-Mesh-Bao-Thanh-lich5903_31_27.jpg', 'Vay-Tuong-phan-Mesh-Bao-Thanh-lich5503_31_27.jpg', 'Vay-Tuong-phan-Mesh-Bao-Thanh-lich903_31_27.jpg', NULL, '2020-11-05 03:45:25'),
(278, 'Váy Dây kéo ngắn màu trơn Thanh lịch', 'Vay-Day-keo-ngan-mau-tron-Thanh-lich6903_34_05.jpg', 11, 'Váy Dây kéo ngắn màu trơn Thanh lịch', 'Thanh lịch', 'Màu trơn', '100% Polyester', 324000, 0, 0, 0, 'Vay-Day-keo-ngan-mau-tron-Thanh-lich/', 'Vay-Day-keo-ngan-mau-tron-Thanh-lich6103_34_05.jpg', 'Vay-Day-keo-ngan-mau-tron-Thanh-lich1803_34_05.jpg', 'Vay-Day-keo-ngan-mau-tron-Thanh-lich2203_34_05.jpg', 'Vay-Day-keo-ngan-mau-tron-Thanh-lich9603_34_05.jpg', NULL, '2020-11-05 03:45:25'),
(279, 'Áo vest Cắt màu trơn Thanh lịch', 'Ao-vest-Cat-mau-tron-Thanh-lich9003_38_41.jpg', 14, 'Áo vest Cắt màu trơn Thanh lịch', 'Thanh lịch', 'Màu trơn', '100% Polyester', 486000, 0, 1, 0, 'Ao-vest-Cat-mau-tron-Thanh-lich/', 'Ao-vest-Cat-mau-tron-Thanh-lich2503_38_41.jpg', 'Ao-vest-Cat-mau-tron-Thanh-lich7503_38_41.jpg', 'Ao-vest-Cat-mau-tron-Thanh-lich303_38_41.jpg', 'Ao-vest-Cat-mau-tron-Thanh-lich2303_38_41.jpg', NULL, '2020-11-05 03:45:25'),
(280, 'Áo vest Nút Sọc ca rô Thanh lịch', 'Ao-vest-Nut-Soc-ca-ro-Thanh-lich1203_41_05.jpg', 14, 'Áo vest Nút Sọc ca rô Thanh lịch', 'Thanh lịch', 'Caro', '100% Polyester', 585000, 548000, 0, 0, 'Ao-vest-Nut-Soc-ca-ro-Thanh-lich/', 'Ao-vest-Nut-Soc-ca-ro-Thanh-lich2703_41_05.jpg', 'Ao-vest-Nut-Soc-ca-ro-Thanh-lich4303_41_05.jpg', 'Ao-vest-Nut-Soc-ca-ro-Thanh-lich6603_41_05.jpg', 'Ao-vest-Nut-Soc-ca-ro-Thanh-lich203_41_05.jpg', NULL, '2020-11-05 03:45:25'),
(281, 'Áo vest Thắt lưng màu trơn Thanh lịch', 'Ao-vest-That-lung-mau-tron-Thanh-lich6203_44_45.jpg', 14, 'Áo vest Thắt lưng màu trơn Thanh lịch', 'Thanh lịch', 'Màu trơn', '100% Polyester', 486000, 0, 0, 0, 'Ao-vest-That-lung-mau-tron-Thanh-lich/', 'Ao-vest-That-lung-mau-tron-Thanh-lich9503_44_45.jpg', 'Ao-vest-That-lung-mau-tron-Thanh-lich5203_44_45.jpg', 'Ao-vest-That-lung-mau-tron-Thanh-lich1403_44_45.jpg', 'Ao-vest-That-lung-mau-tron-Thanh-lich3503_44_45.jpg', NULL, '2020-11-05 03:45:25'),
(282, 'Áo vest Nút phía trước màu trơn Thanh lịch', 'Ao-vest-Nut-phia-truoc-mau-tron-Thanh-lich7303_46_21.jpg', 14, 'Áo vest Nút phía trước màu trơn Thanh lịch', 'Thanh lịch', 'Màu trơn', '100% Polyester', 509000, 0, 1, 0, 'Ao-vest-Nut-phia-truoc-mau-tron-Thanh-lich/', 'Ao-vest-Nut-phia-truoc-mau-tron-Thanh-lich7603_46_21.jpg', 'Ao-vest-Nut-phia-truoc-mau-tron-Thanh-lich2903_46_21.jpg', 'Ao-vest-Nut-phia-truoc-mau-tron-Thanh-lich3603_46_21.jpg', 'Ao-vest-Nut-phia-truoc-mau-tron-Thanh-lich7803_46_21.jpg', NULL, '2020-11-05 03:45:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size_sp`
--

CREATE TABLE `size_sp` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_size` varchar(45) DEFAULT NULL,
  `ghi chu` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `size_sp`
--

INSERT INTO `size_sp` (`id`, `ten_size`, `ghi chu`, `created_at`, `updated_at`) VALUES
(1, 'S', 'Kích thước Sản phẩm\r\nVai : 62 cmNgực : 116.5 cmKích thước vòng eo : 64 cmKích thước mông : 110 cmChiều dài tay : 23 cmChiều dài : 92.5 cm', '2020-09-30 06:16:55', '2020-09-30 06:16:53'),
(2, 'M', 'Kích thước Sản phẩm\r\nVai : 64 cmNgực : 120.5 cmKích thước vòng eo : 68 cmKích thước mông : 114 cmChiều dài tay : 24 cmChiều dài : 94.5 cm', '2020-09-30 06:15:24', '2020-09-30 06:16:33'),
(3, 'L', 'Kích thước Sản phẩm\r\nVai : 67 cmNgực : 126.5 cmKích thước vòng eo : 74 cmKích thước mông : 120 cmChiều dài tay : 25.5 cmChiều dài : 96.5 cm', '2020-09-30 06:18:31', '2020-09-30 06:18:31'),
(4, 'XL', NULL, '2020-09-30 06:18:31', '2020-09-30 06:18:31'),
(7, 'XXL', NULL, '2020-10-27 02:58:54', '2020-10-27 02:58:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `trang_thai` int(10) NOT NULL DEFAULT 0,
  `ten_slide` varchar(50) NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 NOT NULL,
  `tieu_de` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `noi_dung` text CHARACTER SET utf8 DEFAULT NULL,
  `link_product_id` varchar(10) DEFAULT '0',
  `link_catelory_id` varchar(10) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `trang_thai`, `ten_slide`, `img`, `tieu_de`, `noi_dung`, `link_product_id`, `link_catelory_id`, `created_at`, `updated_at`) VALUES
(2, 0, 'Áo denim jacket', 'bg-2.jpg', 'denim jackets', 'Vốn được biết đến như một trang phục cho những dịp quan trọng, quần tây gắn với hình ảnh quý ông cổ điển, lịch thiệp và hào hoa. Thế nhưng, những quần tây ngày nay còn được sử dụng  để làm tôn lên chất cá tính, bụi bặm của áo khoác denim một cách khéo léo. Bộ đôi quần tây & denim jacket mang đến cho người mặc những phong cách smart-casual  đời thường  mà mới mẻ, ngẫu hứng.', '0', '14', NULL, '2020-11-04 09:09:27'),
(3, 1, 'Thời trang model', 'bg-3.jpg', NULL, NULL, '0', '16', NULL, '2020-11-04 09:09:16'),
(7, 1, '1000 Sản Phẩm mới', '1000-Sản-Phảm-mói8104_04_50.jpg', NULL, NULL, '0', '12', NULL, NULL),
(8, 1, 'PREMIUM', 'PREMIUM2604_09_00.jpg', 'PREMIUM', NULL, '0', '13', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(5) DEFAULT 0,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `level`, `address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'thanh2107', 'tyn01685732770@gmail.com', NULL, '999999999', 0, 'Ấp thới đông hòa châu thành Tiền Giang', '$2y$10$G77rTBiKAC1mKJcytqm2ru4BHPAyE8diCb4s1ILHkI0Osniml2FFO', NULL, '2020-10-17 14:38:46', '2020-11-05 13:06:11'),
(2, 'admin123', 'admin@gmail.com', NULL, '123123', 3, '', '$2y$10$HScfYUDs18Jw1VfIZ8wDe.4/aO/qtmOcoXGU7RLN9HY74cwC0anEW', NULL, '2020-10-19 15:15:59', '2020-10-19 15:15:59'),
(3, 'thanh123', 't01685732770@gmail.com', NULL, '433926658', 0, '', '$2y$10$Mb9br/9AySwtsf7kleOeYuHACOH1PIZ7LVmKbRo7oaG/YmI6kY4b.', NULL, '2020-10-19 15:17:40', '2020-11-05 03:06:55'),
(4, 'test123', 'test1@gmail.com', NULL, '0999999', 0, 'Số 04 đường Phan Đình Phùng, phường 3, TP.Bạc Liêu, tỉnh Bạc Liêu', '$2y$10$CyRQOrGFSM0/g9J4NKNs4uK58kWrfoI2dDQxE9iCK3tUHMWG/9BD2', NULL, '2020-11-04 08:52:58', '2020-11-04 08:55:32'),
(5, 'NguyenVanA', 'test2@gmail.com', NULL, '2132133', 0, 'Số 82  đường Hùng Vương, TP. Bắc Giang, tỉnh Bắc Giang', '$2y$10$/wqt2aR9TQ1hMor6J8cNuOX5cKHSRhRKsLfnAuAuW/ufgi6DzjK5O', NULL, '2020-11-04 08:59:06', '2020-11-04 08:59:58'),
(6, 'test321', 'test321@gmail.com', NULL, '2132133', 0, 'Ấp thới đông hòa châu thành Tiền Giang', '$2y$10$cK96OGa5HYfPSSVt7Tc0K.oenbGEXGdIj9rEeh0WsRyali8IE4OqO', NULL, '2020-11-05 14:18:52', '2020-11-05 14:20:49');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_hd`
--
ALTER TABLE `chi_tiet_hd`
  ADD PRIMARY KEY (`id_chi_tiet_HD`),
  ADD KEY `fk_chitethd_hoadon_idx` (`id_hoa_don`),
  ADD KEY `fk_chitethd_chitietsp_idx` (`id_chi_tiet_sp`);

--
-- Chỉ mục cho bảng `chi_tiet_sp`
--
ALTER TABLE `chi_tiet_sp`
  ADD PRIMARY KEY (`id`,`id_size`,`id_mau`,`id_san_pham`) USING BTREE,
  ADD KEY `fk_chitietsp_sanpham_idx` (`id_san_pham`),
  ADD KEY `fk_chitietsp_mausp_idx` (`id_mau`),
  ADD KEY `fk_chitietsp_size_idx` (`id_size`);

--
-- Chỉ mục cho bảng `dong_gia`
--
ALTER TABLE `dong_gia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id_hoa_don`),
  ADD KEY `id_khach_hang` (`id_user`);

--
-- Chỉ mục cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`id_loai_san_pham`);

--
-- Chỉ mục cho bảng `mau_sp`
--
ALTER TABLE `mau_sp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_loaisanpham_idx` (`id_loai_san_pham`);

--
-- Chỉ mục cho bảng `size_sp`
--
ALTER TABLE `size_sp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chi_tiet_hd`
--
ALTER TABLE `chi_tiet_hd`
  MODIFY `id_chi_tiet_HD` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_sp`
--
ALTER TABLE `chi_tiet_sp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id_hoa_don` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  MODIFY `id_loai_san_pham` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `mau_sp`
--
ALTER TABLE `mau_sp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT cho bảng `size_sp`
--
ALTER TABLE `size_sp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_hd`
--
ALTER TABLE `chi_tiet_hd`
  ADD CONSTRAINT `fk_chitethd_chitietsp` FOREIGN KEY (`id_chi_tiet_sp`) REFERENCES `chi_tiet_sp` (`id`),
  ADD CONSTRAINT `fk_chitethd_hoadon` FOREIGN KEY (`id_hoa_don`) REFERENCES `hoa_don` (`id_hoa_don`);

--
-- Các ràng buộc cho bảng `chi_tiet_sp`
--
ALTER TABLE `chi_tiet_sp`
  ADD CONSTRAINT `fk_chitietsp_mau` FOREIGN KEY (`id_mau`) REFERENCES `mau_sp` (`id`),
  ADD CONSTRAINT `fk_chitietsp_sanpham` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`),
  ADD CONSTRAINT `fk_chitietsp_size` FOREIGN KEY (`id_size`) REFERENCES `size_sp` (`id`);

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `fk_hoadon_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `fk_sanpham_loaisanpham` FOREIGN KEY (`id_loai_san_pham`) REFERENCES `loai_san_pham` (`id_loai_san_pham`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
