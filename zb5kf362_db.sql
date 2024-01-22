-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 22, 2024 lúc 04:03 PM
-- Phiên bản máy phục vụ: 5.6.44-cll-lve
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `zb5kf362_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `ma_tk` int(50) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `password` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `loai_tk` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`ma_tk`, `name`, `user_name`, `password`, `loai_tk`) VALUES
(11, 'huy', 'huytran', '202cb962ac59075b964b07152d234b70', 1),
(12, 'Huy Trần', '123', '202cb962ac59075b964b07152d234b70', 1),
(14, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `MS` int(20) NOT NULL,
  `TEN_LOAI` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `meta` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `parent` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`MS`, `TEN_LOAI`, `meta`, `parent`) VALUES
(1, 'Đồ Chơi Theo Phim', 'Do-Choi-Theo-Phim', 0),
(2, 'Siêu Anh Hùng', 'Sieu-Anh-Hung', 1),
(3, 'Siêu RoBot', 'Sieu-RoBot', 1),
(4, 'Siêu Thú', 'Sieu-Thu', 1),
(5, 'Đồ Chơi Lắp Ghép', 'Do-Choi-Lap-Ghep', 0),
(6, 'LEGO', 'LEGO', 5),
(7, 'Đồ Dùng Học Tập', 'Do-Dung-Hoc-Tap', 0),
(8, 'Ba Lô Đi Học', 'Ba-Lo-Di-Hoc', 7),
(9, 'Ba Lô Mầm Non', 'Ba-Lo-Mam-Non', 7),
(10, 'Hộp Viết', 'Hop-Viet', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp`
--

CREATE TABLE `sp` (
  `ma_sp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `ten_sp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `gia` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `img_sp` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `img_sp2` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `ms` int(50) NOT NULL,
  `parent` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sp`
--

INSERT INTO `sp` (`ma_sp`, `ten_sp`, `gia`, `img_sp`, `img_sp2`, `ms`, `parent`) VALUES
('SP01', 'Mô hình khiên chiến đấu tấn công Iron man dòng Mec', '228000', 'mykingdom-f0266_1_', 'mykingdom-f0266_6_', 1, 2),
('SP02', 'Máy bay trực thăng Justice Defender (đỏ)', '319000', 'yd-218rd_1', 'yd-218rd_2', 0, 0),
('SP03', 'Chuồng Ngựa', '33000', '21171_1_', '21171_2_', 5, 6),
('SP04', 'Ba lô Fancy - Boba Dễ Thương Hồng', '', 'mykingdom-balo-di-hoc-bc1208_1_', 'mykingdom-balo-di-hoc-bc1208_2_', 0, 0),
('SP05', 'Ba lô Classy - L.O.L Surprise Glee Club Hồng', '', 'bl1212_-1', 'bl1212_-2', 0, 0),
('SP06', 'Ba lô Easy Go - Boba Sành Điệu Hồng', '', 'mykingdom-balo-di-hoc-bc0105_1_', 'mykingdom-balo-di-hoc-bc0105_2_', 0, 0),
('SP07', 'Mô hình Black Panther dòng Mech Strike 6 inch', '', 'f1667_2_', 'f1667_5_', 1, 2),
('SP08', 'Mô hình Bumblebee dòng Studio Deluxe TF6', '', 'f0784_2_', 'f0784_3_', 1, 3),
('SP09', 'Robot Biến hình Cỡ lớn Donnie Xây dựng và thú cưng', '', 'mykingdom-750942_1_', 'mykingdom-750942_2_', 1, 3),
('SP10', 'mykingdom-750942_2_', '', 'yw750321_1_', 'yw750321_4_', 1, 3),
('SP11', 'Xe cứu hộ biến hình quyền năng', '', '1_15_1', '4_12_1', 1, 4),
('SP12', 'Lớp Học Môn Biến Hình', '', '09_71', '02_70', 5, 6),
('SP13', 'Tòa Tháp Chọc Trời', '', '21173_1_', '21173_8_', 5, 6),
('SP14', 'Bộ đôi cứu hộ quyền năng 2 trong 1 Tuck và Ella', '', '1_16_1', '3_15', 1, 4),
('SP15', 'Đồ Chơi Trẻ Em', '100000', '47a03c9a3ba2ebfcb2b3', '47a03c9a3ba2ebfcb2b3', 7, 8);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ma_tk`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MS`);

--
-- Chỉ mục cho bảng `sp`
--
ALTER TABLE `sp`
  ADD PRIMARY KEY (`ma_sp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `ma_tk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `MS` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
