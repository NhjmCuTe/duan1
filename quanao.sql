-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: sql307.byetcluster.com
-- Thời gian đã tạo: Th10 17, 2023 lúc 02:02 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `b7_35022016_shopquanao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anh`
--

CREATE TABLE `anh` (
  `id_anh` int(11) NOT NULL,
  `img_anh` varchar(255) NOT NULL,
  `id_mau` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `anh`
--

INSERT INTO `anh` (`id_anh`, `img_anh`, `id_mau`) VALUES
(1, '8ts23w005-sn187-xl-1-u.png', 1),
(2, '8ts23w005-sn187-xl-2.png', 1),
(3, '8ts23w005-sn187-xl-3.png', 1),
(4, '8ts23w005-sn187-xl-4.png', 1),
(5, '8ts23w005-sk010-xl-1-u.png', 2),
(6, '8ts23w005-sk010-xl-2.png', 2),
(7, '8ts23w005-sk010-xl-3.png', 2),
(8, '8ts23w005-sk010-xl-4.png', 2),
(9, '8ts23w005-sw001-xl-1-u.png', 3),
(10, '8ts23w005-sw001-xl-2.png', 3),
(11, '8ts23w005-sw001-xl-3.png', 3),
(12, '8ts23w005-sw001-xl-5.png', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id_danhmuc`, `ten_danhmuc`) VALUES
(1, 'Áo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc_con`
--

CREATE TABLE `danh_muc_con` (
  `id_danhmuc_con` int(11) NOT NULL,
  `ten_danhmuc_con` varchar(255) DEFAULT NULL,
  `id_danhmuc` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danh_muc_con`
--

INSERT INTO `danh_muc_con` (`id_danhmuc_con`, `ten_danhmuc_con`, `id_danhmuc`) VALUES
(1, 'Áo phông', 1),
(2, 'Áo polo', 1),
(3, 'Áo sơ mi', 1),
(4, 'Áo ba lỗ', 1),
(5, 'Áo len', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id_donhang` int(11) NOT NULL,
  `id_sanpham_chitiet` int(11) DEFAULT NULL,
  `so_luong_mua` int(11) DEFAULT NULL,
  `ten_khachhang` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `sdt` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id_giohang` int(11) NOT NULL,
  `id_sanpham_chitiet` int(11) DEFAULT NULL,
  `so_luong_mua` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kich_thuoc`
--

CREATE TABLE `kich_thuoc` (
  `id_kichthuoc` int(11) NOT NULL,
  `ten_kichthuoc` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `kich_thuoc`
--

INSERT INTO `kich_thuoc` (`id_kichthuoc`, `ten_kichthuoc`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau`
--

CREATE TABLE `mau` (
  `id_mau` int(11) NOT NULL,
  `ten_mau` varchar(255) DEFAULT NULL,
  `img_mau` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mau`
--

INSERT INTO `mau` (`id_mau`, `ten_mau`, `img_mau`) VALUES
(1, 'SN187', '8ts23w005-sn187-xl-1-u.png'),
(2, 'SK010', '8ts23w005-sk010-xl-1-u.png'),
(3, 'SW001', '8ts23w005-sw001-xl-1-u.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham_chitiet`
--

CREATE TABLE `sanpham_chitiet` (
  `id_sanpham_chitiet` int(11) NOT NULL,
  `id_sanpham` int(11) DEFAULT NULL,
  `id_kichthuoc` int(11) DEFAULT NULL,
  `id_mau` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham_chitiet`
--

INSERT INTO `sanpham_chitiet` (`id_sanpham_chitiet`, `id_sanpham`, `id_kichthuoc`, `id_mau`, `gia`, `so_luong`) VALUES
(1, 1, 1, 1, 299000, 10),
(2, 1, 1, 2, 299000, 10),
(3, 1, 1, 3, 299000, 10),
(4, 1, 2, 1, 299000, 10),
(5, 1, 2, 2, 299000, 10),
(6, 1, 2, 3, 299000, 10),
(7, 1, 3, 1, 299000, 10),
(8, 1, 3, 2, 299000, 10),
(9, 1, 3, 3, 299000, 10),
(10, 1, 4, 1, 299000, 10),
(11, 1, 4, 2, 299000, 10),
(12, 1, 4, 3, 299000, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id_sanpham` int(11) NOT NULL,
  `ten_sanpham` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `id_danhmuc_con` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id_sanpham`, `ten_sanpham`, `mo_ta`, `id_danhmuc_con`) VALUES
(1, 'Áo phông nam cotton dáng rộng có hình in', 'Áo được may từ chất liệu cotton với form relax, có đường cắt rộng rãi, tạo cảm giác thoải mái và tự nhiên khi mặc. Hình in ở ngực áo mang phong cách hiện đại, bền, đẹp, không nứt trong quá trình sử dụng.\r\nChất liệu cotton USA:\r\n- Ưu điểm nguyên liệu: Thân thiện với môi trường. Độ bền tốt. Thấm hút tốt, thoáng mát, không gây hại cho sức khỏe. Thoáng mát khi mặc.', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id_taikhoan` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sdt` varchar(255) DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anh`
--
ALTER TABLE `anh`
  ADD PRIMARY KEY (`id_anh`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `danh_muc_con`
--
ALTER TABLE `danh_muc_con`
  ADD PRIMARY KEY (`id_danhmuc_con`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id_donhang`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id_giohang`);

--
-- Chỉ mục cho bảng `kich_thuoc`
--
ALTER TABLE `kich_thuoc`
  ADD PRIMARY KEY (`id_kichthuoc`);

--
-- Chỉ mục cho bảng `mau`
--
ALTER TABLE `mau`
  ADD PRIMARY KEY (`id_mau`);

--
-- Chỉ mục cho bảng `sanpham_chitiet`
--
ALTER TABLE `sanpham_chitiet`
  ADD PRIMARY KEY (`id_sanpham_chitiet`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `anh`
--
ALTER TABLE `anh`
  MODIFY `id_anh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `danh_muc_con`
--
ALTER TABLE `danh_muc_con`
  MODIFY `id_danhmuc_con` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id_giohang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `kich_thuoc`
--
ALTER TABLE `kich_thuoc`
  MODIFY `id_kichthuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `mau`
--
ALTER TABLE `mau`
  MODIFY `id_mau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham_chitiet`
--
ALTER TABLE `sanpham_chitiet`
  MODIFY `id_sanpham_chitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
