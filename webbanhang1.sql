-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2023 lúc 02:11 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `cate_id`, `brand_name`, `status`) VALUES
(11, 1, 'Alpha Bounce', 1),
(12, 7, 'Air Force', 1),
(13, 1, 'EQT', 1),
(14, 1, 'Super star', 1),
(15, 1, 'Ultra boost', 1),
(16, 1, 'Adidas Fashion', 1),
(17, 7, 'Jordan', 1),
(18, 7, 'Nike Fashion', 1),
(19, 12, 'LV', 1),
(20, 12, 'Fila', 1),
(21, 12, 'Dép', 1),
(22, 8, 'Era', 1),
(23, 8, 'caro', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`cate_id`, `cate_name`, `status`) VALUES
(1, 'ADIDAS', 1),
(7, 'NIKE', 1),
(8, 'VANS', 1),
(9, 'MLB', 1),
(10, 'CONVERSE', 1),
(11, 'NEW BALANCE', 1),
(12, 'HÃNG KHÁC', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_price_new` float DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `cate_id`, `brand_id`, `product_name`, `product_price`, `product_price_new`, `img`, `status`) VALUES
(7, 1, 11, 'Adidas Alphabounce Beyond Full Trắng', 600, 550, 'uploads/Adidas Alphabounce Beyond Full Trắng.jpg', 1),
(8, 1, 11, 'Adidas Alphabounce Beyond Full Xám', 600, 550, 'uploads/Adidas Alphabounce Beyond Full Xám.jpg', 1),
(9, 1, 11, 'Adidas Alphabounce Beyond Kem Tím', 600, 550, 'uploads/Adidas Alphabounce Beyond REP Kem Tím.jpg', 1),
(10, 1, 11, 'Adidas Alphabounce Beyond Đen Kem', 600, 550, 'uploads/Adidas Alphabounce Beyond REP Đen Kem.jpg', 1),
(11, 1, 11, 'Adidas Alphabounce Beyond Đen REP', 60, 55, 'uploads/Adidas Alphabounce Beyond REP Đen.jpg', 1),
(12, 1, 13, 'Giày Adidas EQT Plus Đen Trắng Xanh', 600, 550, 'uploads/Giày Adidas EQT Plus Đen Trắng Xanh.jpg', 1),
(13, 7, 17, 'Nike Jordan 1 High Đen Trắng', 600, 550, 'uploads/Nike Jordan 1 High Đen Trắng.jpg', 1),
(14, 1, 14, 'Adidas Superstar André Saraiva Kem Đen Mũi Sò', 600, 550, 'uploads/Adidas Superstar André Saraiva Kem Đen Mũi Sò.jpg', 1),
(16, 1, 11, 'Adidas Alphabounce Beyond Navy Xanh', 600, 550, 'uploads/Adidas Alphabounce Beyond REP Navy Xanh.jpg', 1),
(17, 1, 11, 'Adidas Alphabounce New 22 Ghi Trắng', 600, 550, 'uploads/Adidas Alphabounce New 22 Ghi Trắng.jpg', 1),
(18, 1, 11, 'Adidas Alphabounce New 22 Trắng Navy', 600, 550, 'uploads/Adidas Alphabounce New 22 Trắng Navy.jpg', 1),
(19, 1, 13, 'Giày Adidas EQT Plus Đen Trắng', 600, 550, 'uploads/Giày Adidas EQT Plus Đen Trắng.jpg', 1),
(20, 1, 13, 'Giày Adidas EQT Plus Trắng Navy', 600, 550, 'uploads/Giày Adidas EQT Plus Trắng Navy.jpg', 1),
(23, 8, 22, 'Vans Era Đen Trắng', 20, 15, 'uploads/Vans Era Đen Trắng.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `password`, `status`) VALUES
(1, 'admin', 'admin', 1),
(3, 'phong', '123', 1),
(4, '', '', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `fk_cate_brand` (`cate_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_cate_pro` (`cate_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD CONSTRAINT `fk_cate_brand` FOREIGN KEY (`cate_id`) REFERENCES `tbl_category` (`cate_id`);

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `fk_cate_pro` FOREIGN KEY (`cate_id`) REFERENCES `tbl_category` (`cate_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
