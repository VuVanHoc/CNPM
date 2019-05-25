-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 24, 2019 lúc 06:41 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `_user`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone` char(15) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `sex` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `address`, `phone`, `sex`, `birthday`) VALUES
(3, 'Trịnh Xuân Đinh', 'trinhdinh0210@gmail.com', '0c9f71c3b008a35a9b8a8e915d84079e', 'Kim Bảng , Hà Nam', '0961314556', 'Nam', '1999-10-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangluong`
--

CREATE TABLE `bangluong` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `congviec` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `tienthuong` int(20) DEFAULT NULL,
  `tienphat` int(20) DEFAULT NULL,
  `congmotgio` int(20) DEFAULT NULL,
  `tonggiolam` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `madon` varchar(255) NOT NULL,
  `masp` varchar(255) NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluongban` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `ngayban` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`madon`, `masp`, `tensp`, `soluongban`, `dongia`, `tongtien`, `ngayban`) VALUES
('AF1', 'AF', 'Aquafina', 10, 6000, 60000, '2019-05-01'),
('AF5', 'AF', 'Aquafina', 2, 6000, 12000, '2019-05-13'),
('BQ1', 'BQ', 'Bánh quy', 2, 25000, 50000, '2019-05-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giolam`
--

CREATE TABLE `giolam` (
  `id` int(11) NOT NULL,
  `ngaylam` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `giolam` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `gionghi` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `tonggiolam` double DEFAULT NULL,
  `luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `giolam`
--

INSERT INTO `giolam` (`id`, `ngaylam`, `giolam`, `gionghi`, `tonggiolam`, `luong`) VALUES
(8, '23.5.2019', '00:19:50', '00:20:19', 0.02, 15000),
(8, '24.5.2019', '18:29:43', '', NULL, 15000),
(9, '23.5.2019', '00:24:01', '00:25:19', 0.04, 15000),
(10, '23.5.2019', '00:25:26', '00:25:49', 0.02, 15000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `masp` varchar(255) NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`masp`, `tensp`, `soluong`) VALUES
('A', 'Áo', 50),
('AF', 'Aquafina', 138),
('BQ', 'Bánh quy', 48),
('DA', 'Dầu ăn', 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone` char(15) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `gioitinh` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `congviec` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `name`, `email`, `phone`, `address`, `password`, `gioitinh`, `birthday`, `congviec`) VALUES
(8, 'Phạm Văn Hoàng', 'phamvanhoang@gmail.com', '0982284416', 'Nghệ An', '123456', 'Nam', '1999-12-17', 'Bán Hàng'),
(9, 'Đinh', 'dinh@gmail.com', '0987654321', 'Hà Nam', '123456', 'Nam\r\n', '2019-05-23', 'Bảo Vệ'),
(10, 'Hà', 'ha@gmail.com', '0987654321', 'Bắc Ninh', '123456', 'Nam', '2019-05-24', 'Bảo Vệ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhapkho`
--

CREATE TABLE `nhapkho` (
  `manhap` varchar(255) NOT NULL,
  `masp` varchar(255) NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `ngaynhap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nhapkho`
--

INSERT INTO `nhapkho` (`manhap`, `masp`, `tensp`, `gia`, `soluong`, `ngaynhap`) VALUES
('NA', 'A', 'Áo', 18000, 50, '2019-05-13'),
('NAF1', 'AF', 'Aquafina', 4000, 100, '2019-05-01'),
('NAF2', 'AF', 'Aquafina', 4000, 50, '2019-05-01'),
('NBQ1', 'BQ', 'Bánh quy', 20000, 50, '2019-05-01'),
('NDA1', 'DA', 'Dầu ăn', 35000, 50, '2019-05-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tongnhap`
--

CREATE TABLE `tongnhap` (
  `masp` varchar(255) NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluongnhap` int(11) NOT NULL,
  `gianhap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tongnhap`
--

INSERT INTO `tongnhap` (`masp`, `tensp`, `soluongnhap`, `gianhap`) VALUES
('A', 'Áo', 50, 18000),
('AF', 'Aquafina', 150, 4000),
('BQ', 'Bánh quy', 50, 20000),
('DA', 'Dầu ăn', 50, 35000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xuatkho`
--

CREATE TABLE `xuatkho` (
  `masp` varchar(255) NOT NULL,
  `tensp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluongxuat` int(11) NOT NULL,
  `giaban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `xuatkho`
--

INSERT INTO `xuatkho` (`masp`, `tensp`, `soluongxuat`, `giaban`) VALUES
('AF', 'Aquafina', 12, 0),
('BQ', 'Bánh quy', 2, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bangluong`
--
ALTER TABLE `bangluong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madon`);

--
-- Chỉ mục cho bảng `giolam`
--
ALTER TABLE `giolam`
  ADD PRIMARY KEY (`id`,`giolam`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`masp`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Chỉ mục cho bảng `nhapkho`
--
ALTER TABLE `nhapkho`
  ADD PRIMARY KEY (`manhap`);

--
-- Chỉ mục cho bảng `tongnhap`
--
ALTER TABLE `tongnhap`
  ADD PRIMARY KEY (`masp`);

--
-- Chỉ mục cho bảng `xuatkho`
--
ALTER TABLE `xuatkho`
  ADD PRIMARY KEY (`masp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `bangluong`
--
ALTER TABLE `bangluong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bangluong`
--
ALTER TABLE `bangluong`
  ADD CONSTRAINT `bangluong_ibfk_1` FOREIGN KEY (`id`) REFERENCES `nhanvien` (`id`);

--
-- Các ràng buộc cho bảng `xuatkho`
--
ALTER TABLE `xuatkho`
  ADD CONSTRAINT `xuatkho_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `tongnhap` (`masp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
