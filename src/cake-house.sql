-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2024 lúc 12:41 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cake-house`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(10, 'Bánh kem tươi - Socola'),
(11, 'Bánh sự kiện'),
(12, 'Bento Cake'),
(13, 'Cookies - Macaron'),
(14, 'Pana Cotta'),
(15, 'Bánh Mochi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `fullname`, `email`, `phone`, `note`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Vi Thị Thanh Trúc', 'thanh@gmail.com', '0815461456', 'Bánh có độ ngọt vừa phải,  thanh mát, dịu nhẹ', 0, '2024-06-02 08:41:04', '2024-06-02 08:41:04'),
(3, 'thanh', 'thnah@gmail.com', '', 'Bánh có độ ngọt vừa phải', 0, '2024-06-02 08:43:18', '2024-06-02 08:43:18'),
(4, 'nguyen tram', 'tram@email.com', '0548961155', 'Bánh có độ ngọt vừa phải,  thanh mát, dịu nhẹ', 0, '2024-06-02 08:46:08', '2024-06-02 08:46:08'),
(5, 'nguyen', 'nguyen@gmail.com', '', 'banh ngọt', 0, '2024-06-02 08:55:36', '2024-06-02 08:55:36'),
(6, 'nguyen', 'nguyen@gmail.com', '', 'banh ngọt', 0, '2024-06-02 08:57:25', '2024-06-02 08:57:25'),
(7, 'nguyen', 'nguyen@gmail.com', '', 'banh ngọt', 0, '2024-06-02 08:57:52', '2024-06-02 08:57:52'),
(10, 'Nguyễn Thành', 'nguyenthanh@gmail.com', '0857689123', 'bánh quy', 0, '2024-06-04 15:18:20', '2024-06-04 15:18:20'),
(11, 'Thang Nguyen', 'thangnguyenquyet41@gmail.com', '123456789', 'ko ngon', 0, '2024-12-13 18:21:08', '2024-12-13 18:21:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `phone`, `address`, `content`, `order_date`, `status`, `total`) VALUES
(2, NULL, 'Lương Thị Thảo Trang', '0914968501', 'sosoidjisj', 'ddddđ', NULL, NULL, NULL),
(3, NULL, 'Lương Thị Thảo Trang', '0914968501', 'sosoidjisj', 'ddddđ', NULL, NULL, NULL),
(17, 1, '', '', '', '', NULL, 'Đã giao', 108000),
(18, 1, '', '', '', '', '2024-12-13 18:09:40', 'pending', 260000),
(19, 1, 'Thang Nguyen', '123456789', 'Nguyên Xá, Hà Nội', 'aaa', '2024-12-13 18:10:49', 'pending', 620000),
(20, 6, 'Chi', '12123121312', 'Thanh Hoa ', 'dung giờ', '2024-12-13 18:12:15', 'Đã giao', 360000),
(21, 7, 'Long', '4545454544', 'Hà Nội ', 'long ngon', '2024-12-13 18:25:36', 'Đang giao', 714000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `size_price` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `thumbnail`, `description`, `size_price`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 10, 'CHRYSANTH', 300000, 'https://origato.com.vn/wp-content/uploads/2023/10/IMG_9164.jpg', 'Mô tả cốt bánh: size 14 2 lớp, từ size 16 3 lớp, cốt bông lan truyền thống kết hợp với kem tươi vị vani, trang trí hoa kem tươi.\r\nCác size bánh: Size 18 cao ~7cm (5 – 7 người ăn); Size 22 cao ~7cm (9 – 11 người ăn); Size 25 cao ~ 7cm ( 12-15 người ăn)\r\nVới bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để Cake House phục vụ Quý khách chu đáo nhất!', 300000, '2024-05-19 10:00:00', '2024-05-19 10:00:00', 0),
(2, 10, 'KEM TƯƠI CHANH LEO', 290000, 'https://origato.com.vn/wp-content/uploads/2020/08/7-2.jpg', 'Mô tả cốt bánh: 3 lớp bông lan truyền thống kết hợp với kem tươi chanh leo, phủ mứt chanh leo.\r\nCác size bánh: Size 16 cao ~5cm (3 – 4 người ăn); Size 18 cao ~7cm (5 – 7 người ăn); Size 22 cao ~7cm (9 – 11 người ăn); Size 22 cao ~ 7cm ( 12-15 người ăn).\r\nVới bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để Cake House phục vụ Quý khách chu đáo nhất!', 290000, '2024-05-19 10:00:00', '2024-05-19 10:00:00', 0),
(3, 10, 'SOCOLA KEM TƯƠI', 350000, 'https://origato.com.vn/wp-content/uploads/2020/08/2-2.jpg', 'Mô tả cốt bánh: Bông lan truyền thống kết hợp với kem tươi socola, phủ ganache.\r\nCác size bánh: Size 16 cao ~5cm (3 – 4 người ăn); Size 18 cao ~7cm (5 – 7 người ăn); Size 22 cao ~7cm (9 – 11 người ăn); Size 22 cao ~ 7cm ( 12-15 người ăn).\r\nVới bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để Cake House phục vụ Quý khách chu đáo nhất!', 350000, '2024-05-19 10:00:00', '2024-05-19 10:00:00', 0),
(4, 11, 'BÁNH KEM TƯƠI TRANG TRÍ LOGO', 450000, 'https://origato.com.vn/wp-content/uploads/2024/05/IMG_4685-Copy-e1716351250532.jpg', 'Thành phần: Cốt bông lan, trang trí kem tươi. Quý khách có thể lựa chọn các cốt khác như: mousse, tiramisu, red velvet, phomat…\r\nCác size bánh: Size 18 cao ~7cm (5 – 7 người ăn); Size 22 cao ~7cm (9 – 11 người ăn)\r\nVới bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để Cake House phục vụ Quý khách chu đáo nhất!', NULL, '2023-01-20 10:00:00', '2024-05-19 10:00:00', 0),
(5, 11, 'COLOURFUL SUMMER', 590000, 'https://origato.com.vn/wp-content/uploads/2024/03/z5203822351343_29152a900e286c9b126452386c6456c5-removebg-preview-e1709281789599.png', 'Mô tả cốt bánh: Cốt bông lan, trang trí hoa quả theo mùa, bánh macaron và oreo. Quý khách có thể lựa chọn các cốt khác như: mousse, tiramisu, red velvet, phomat…\r\nCác size bánh: Size 18 cao ~7cm (5 – 7 người ăn); Size 22 cao ~7cm (9 – 11 người ăn)\r\nVới bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để Cake House phục vụ Quý khách chu đáo nhất!', NULL, '2023-01-20 10:00:00', '2024-05-19 10:00:00', 0),
(6, 11, 'BÁNH KEM CẮT MIẾNG', 590000, 'https://origato.com.vn/wp-content/uploads/2024/03/z5203834575428_51270f5de236aa9e3862a47d1d10adfa-removebg-preview.png', 'Mô tả cốt bánh: Cốt bông lan, trang trí kem tươi 40 miếng Quý khách có thể lựa chọn các cốt khác như: mousse, tiramisu, red velvet, phomat…\r\nCác size bánh: Size 18 cao ~7cm (5 – 7 người ăn); Size 22 cao ~7cm (9 – 11 người ăn)\r\nVới bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để Cake House phục vụ Quý khách chu đáo nhất!', NULL, '2023-03-29 11:00:00', '2024-05-19 10:00:00', 0),
(7, 12, 'BENTO KEM TƯƠI VÀNG CHANH', 110000, 'https://origato.com.vn/wp-content/uploads/2022/11/bento-1.png', 'Thành phần: Cốt bánh bông lan truyền thống, phủ mứt chanh, trang trí macaron.\r\nQuý khách có thể lựa chọn các cốt bánh khác như: mousse, tiramisu, red velvet…\r\nBánh Bento có đường kính 9~10cm phù hợp cho 1-2 người ăn.\r\nVới bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để Cake House phục vụ Quý khách chu đáo nhất!', NULL, '2023-01-20 10:00:00', '2024-05-19 10:00:00', 0),
(8, 12, 'SX02', 110000, 'https://origato.com.vn/wp-content/uploads/2024/01/ab0e6afe-90f6-49e0-8baa-1a6d825c8297-Copy-e1712544754125.jpg', 'Thành phần: Cốt bánh 2 lớp bông lan truyền thống kết hợp kem tươi vị vani\r\nCác size bánh: Size 18 cao ~7cm (5 – 7 người ăn); Size 22 cao ~7cm (9 – 11 người ăn); Size 25 cao ~ 7cm ( 12-15 người ăn)\r\nVới bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để The Cake House phục vụ Quý khách chu đáo nhất!', NULL, '2023-01-20 10:00:00', '2024-05-19 10:00:00', 0),
(9, 12, 'HEY! BRO TEDDY', 78000, 'https://origato.com.vn/wp-content/uploads/2023/09/2.png', 'Thành phần: Cốt bánh bông lan truyền thống, trang trí kem tươi.\r\nCác size bánh: Size ~10cm phù hợp cho 2-3 người ăn.\r\nVới bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để Cake House phục vụ Quý khách chu đáo nhất!', NULL, '2023-01-20 10:00:00', '2024-05-19 10:00:00', 0),
(10, 13, 'MACARON', 65000, 'https://origato.com.vn/wp-content/uploads/2024/04/6-Copy.jpg', 'Thành phần: đường kính, bột hạnh nhân, trứng gà, muối…\r\nHướng dẫn bảo quản và sử dụng: Bảo quản ở nhiệt độ 4 – 12 độ C và dùng trực tiếp sau khi mua.', NULL, '2023-05-19 18:08:34', '2024-05-15 18:08:34', 0),
(11, 13, 'BÁNH COOKIES HKC LƯỠI MÈO VỊ MATCHA', 45000, 'https://origato.com.vn/wp-content/uploads/2024/03/IMG_1480-Copy.jpg', 'Thành phần: đường kính, bột hạnh nhân, trứng gà, muối…\r\n Hướng dẫn bảo quản và sử dụng: Bảo quản ở nhiệt độ 4 – 12 độ C và dùng trực tiếp sau khi mua.', NULL, '2023-05-19 18:08:34', '2024-05-15 18:08:34', 0),
(12, 13, 'BÁNH COOKIES HKC MÈ ĐEN MINI', 45000, 'https://origato.com.vn/wp-content/uploads/2023/12/IMG_1218.jpg', 'Thành phần: đường kính, bột hạnh nhân, trứng gà, muối…\r\n HDSD: Ăn ngay sau khi mở nắp và bảo quản nơi thoáng mát tránh để bánh bị ẩm, ướt.', NULL, '2023-05-25 18:08:34', '2024-05-15 18:08:34', 0),
(13, 14, 'PANA COTTA CHANH LEO', 29000, 'https://origato.com.vn/wp-content/uploads/2024/05/IMG_3887-Copy.jpg', 'Thành phần: trứng gà, sữa tươi, bột mì, bơ…\r\n Dòng bánh mini cake phù hợp để ăn sáng, ăn tráng miệng, dùng làm bữa nhẹ, dùng cho các sự kiện, tea break hoặc các bữa tiệc lớn…\r\n Origato nhận đặt bánh số lượng lớn theo yêu cầu, Quý khách vui lòng đặt trước 24h – 48h để Origato phục vụ Quý khách chu đáo nhất!', NULL, '2023-05-19 18:08:34', '2024-05-15 18:08:34', 0),
(14, 14, 'PANA COTTA XOÀI', 29000, 'https://origato.com.vn/wp-content/uploads/2024/05/IMG_3893-Copy.jpg', 'Thành phần: trứng gà, sữa tươi, bột mì, bơ…\r\n Dòng bánh mini cake phù hợp để ăn sáng, ăn tráng miệng, dùng làm bữa nhẹ, dùng cho các sự kiện, tea break hoặc các bữa tiệc lớn…\r\n Origato nhận đặt bánh số lượng lớn theo yêu cầu, Quý khách vui lòng đặt trước 24h – 48h để Origato phục vụ Quý khách chu đáo nhất!', NULL, '2024-01-19 18:08:34', '2024-05-15 18:08:34', 0),
(15, 14, 'BÁNH CẮT HOA QUẢ', 14000, 'https://origato.com.vn/wp-content/uploads/2022/06/IMG_6072-Copy.jpg', 'Thành phần: trứng gà, sữa tươi, bột mì, bơ…\r\n Dòng bánh mini cake phù hợp để ăn sáng, ăn tráng miệng, dùng làm bữa nhẹ, dùng cho các sự kiện, tea break hoặc các bữa tiệc lớn…\r\n Origato nhận đặt bánh số lượng lớn theo yêu cầu, Quý khách vui lòng đặt trước 24h – 48h để Origato phục vụ Quý khách chu đáo nhất!', NULL, '2024-01-19 18:08:34', '2024-05-15 18:08:34', 0),
(16, 15, 'MOCHI KEM PHÚC BỒN TỬ', 19000, 'https://product.hstatic.net/1000075078/product/1643102019_mochi-phucbontu_04be2f5b60dc456db9b916839f662855.jpg', 'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân phúc bồn tử ngọt ngào.', NULL, '2023-05-19 18:08:34', '2024-05-15 18:08:34', 0),
(17, 15, 'MOCHI KEM VIỆT QUẤT', 19000, 'https://product.hstatic.net/1000075078/product/1643102034_mochi-vietquat_fa28aa034b39491f9379a3d9e2c3ba43.jpg', 'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân việt quất đặc trưng thơm thơm, ngọt dịu.', NULL, '2024-01-19 18:08:34', '2024-05-15 18:08:34', 0),
(18, 15, 'MOCHI KEM TRÀ XANH', 19000, 'https://product.hstatic.net/1000075078/product/1655348113_mochi-traxanh_c064ca8b2ba64330b0b9d78f391b997f.jpg', 'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân trà xanh đậm vị. Gọi 1 chiếc Mochi cho ngày thật tươi mát.', NULL, '2024-01-19 18:08:34', '2024-05-15 18:08:34', 0),
(19, 15, 'MOCHI KEM XOÀI', 19000, 'https://product.hstatic.net/1000075078/product/1643101968_mochi-xoai_23dc267920a74fb58b8bbf0bd77eea61.jpg', 'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân xoài chua chua ngọt ngọt. Gọi 1 chiếc Mochi cho ngày thật tươi mát.', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(20, 15, 'MOCHI KEM DỪA DỨA', 19000, 'https://product.hstatic.net/1000075078/product/1643101996_mochi-dua_4fff7550829d4ac5a26c608c15b130dd.jpg', 'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân dừa dứa thơm lừng lạ miệng. Gọi 1 chiếc Mochi cho ngày thật tươi mát.', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(21, 10, 'TULIP HỒNG', 230000, 'https://origato.com.vn/wp-content/uploads/2024/02/83.jpg', 'Mô tả cốt bánh: bông lan truyền thống kết hợp kem tươi vani\r\nCác size bánh: Size 18 cao ~7cm (5 – 7 người ăn); Size 22 cao ~7cm (9 – 11 người ăn); Size 25 cao ~ 7cm ( 12-15 người ăn)\r\nVới bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để The Cake House phục vụ Quý khách chu đáo nhất!', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(22, 10, 'TULIP VÀNG', 230000, 'https://origato.com.vn/wp-content/uploads/2024/02/84.jpg', 'Mô tả cốt bánh: bông lan truyền thống kết hợp kem tươi vani.\r\nCác size bánh: Size 18 cao ~7cm (5 – 7 người ăn); Size 22 cao ~7cm (9 – 11 người ăn); Size 25 cao ~ 7cm ( 12-15 người ăn)\r\nVới bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để The Cake House phục vụ Quý khách chu đáo nhất!', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(23, 10, 'ROSE MACARON', 280000, 'https://origato.com.vn/wp-content/uploads/2023/10/IMG_9133.jpg', 'Mô tả cốt bánh: cốt bánh 4 lớp, bông lan truyền thống kết hợp kem tươi vị vani, trang trí kem tươi và bánh macaron.\r\nCác size bánh: Size 18 cao ~7cm (5 – 7 người ăn); Size 22 cao ~7cm (9 – 11 người ăn); Size 25 cao ~ 7cm ( 12-15 người ăn)\r\nVới bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để The Cake House phục vụ Quý khách chu đáo nhất!', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(24, 12, 'BENTO KEM TƯƠI OCEAN', 110000, 'https://origato.com.vn/wp-content/uploads/2022/11/bento-5.png', 'Thành phần: Cốt bánh bông lan truyền thống, trang trí kem tươi.\r\nQuý khách có thể lựa chọn các cốt bánh khác như: mousse, tiramisu, red velvet…\r\nBánh Bento có đường kính 9~10cm phù hợp cho 1-2 người ăn.\r\nVới bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để The Cake House phục vụ Quý khách chu đáo nhất!', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(25, 12, 'BENTO KEM TƯƠI SOCOLA', 110000, 'https://origato.com.vn/wp-content/uploads/2022/11/bento.png', 'Thành phần: Cốt bánh bông lan truyền thống, phủ socola, trang trí macaron.\r\nQuý khách có thể lựa chọn các cốt bánh khác như: mousse, tiramisu, red velvet…\r\nBánh Bento có đường kính 9~10cm phù hợp cho 1-2 người ăn.\r\nVới bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để The Cake House phục vụ Quý khách chu đáo nhất!', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(26, 12, 'BENTO KEM TƯƠI TRÀ XANH', 110000, 'https://origato.com.vn/wp-content/uploads/2022/11/bento-2.png', 'hành phần: Cốt bánh bông lan truyền thống, trang trí kem tươi, macaron\r\nQuý khách có thể lựa chọn các cốt bánh khác như: mousse, tiramisu, red velvet…\r\nBánh Bento có đường kính 9~10cm phù hợp cho 1-2 người ăn.\r\nVới bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để The Cake House phục vụ Quý khách chu đáo nhất!', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(27, 11, 'MOUSSE CHANH LEO CHỮ NHẬT', 590000, 'https://origato.com.vn/wp-content/uploads/2024/05/IMG_4679-Copy-e1716351283671.jpg', 'Thành phần: Cốt mousse chanh leo. Quý khách có thể lựa chọn các cốt khác như: bông lan kem tươi, tiramisu, red velvet, phomat…\r\nVui lòng đặt trước 24h – 48h để The Cake House phục vụ Quý khách chu đáo nhất!\r\nCác size bánh: Size 18 cao ~7cm (5 – 7 người ăn); Size 22 cao ~7cm (9 – 11 người ăn)', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(28, 11, 'BÁNH KEM HOA VÀNG', 590000, 'https://origato.com.vn/wp-content/uploads/2024/03/z4671051681470_2635b226e55e73014125a5feff2e90a6-Copy-1-e1716352004173.jpg', 'Thành phần: Cốt bông lan, trang trí kem tươi. Quý khách có thể lựa chọn các cốt khác như: mousse, tiramisu, red velvet, phomat…\r\nVui lòng đặt trước 24h – 48h để The Cake House phục vụ Quý khách chu đáo nhất!\r\nCác size bánh: Size 18 cao ~7cm (5 – 7 người ăn); Size 22 cao ~7cm (9 – 11 người ăn)', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(29, 13, 'BÁNH QUY HẠNH NHÂN', 42000, 'https://product.hstatic.net/200000411281/product/quy_hanh_nhan_d1ba3f7c70fb43d0b1b129980336a9e3_master.jpeg', 'Thành phần: Bột mỳ, trứng gà, đường, hạnh nhân cắt lát (14%), bơ, sữa bột, chất tạo xốp (E500ii, E450i, E341i), muối, hương vani tổng hợp.', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(30, 13, 'BÁNH QUY SOCOLA CHIP', 42000, 'https://product.hstatic.net/200000411281/product/quy_socola_chip_47f66c2b05924b6aa95949983ab4415a_master.jpeg', 'Thành phần: Bột mỳ, đường, bơ, sô cô la chíp (12 %), trứng gà, chất tạo xốp (E500ii), muối. ', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(31, 13, 'BÁNH QUY BƠ MỨT DÂU', 42000, 'https://product.hstatic.net/200000411281/product/quy_mut_dau_to_a0e6bb6421aa47bda3554f344902a0d4_master.jpeg', 'Thành phần: Bột mỳ, bơ (30,6%), đường, trứng, mứt dâu (5,1%).', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(32, 13, 'LADY FINGER', 42000, 'https://product.hstatic.net/200000411281/product/lady_finger_6bd9609cce084948a182713dbf6ec287_master.jpeg', 'Thành phần: Trứng, bột mì, đường, muối, hương vinilla', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(33, 14, 'PANA COTTA TÁO XANH', 29000, 'https://origato.com.vn/wp-content/uploads/2024/05/IMG_3890-Copy.jpg', 'Thành phần: trứng gà, sữa tươi, bột mì, bơ…\r\nDòng bánh mini cake phù hợp để ăn sáng, ăn tráng miệng, dùng làm bữa nhẹ, dùng cho các sự kiện, tea break hoặc các bữa tiệc lớn…\r\nThe Cake House nhận đặt bánh số lượng lớn theo yêu cầu, Quý khách vui lòng đặt trước 24h – 48h để  The Cake House phục vụ Quý khách chu đáo nhất!', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(34, 14, 'PANA COTTA MÂM XÔI', 29000, 'https://origato.com.vn/wp-content/uploads/2024/05/z5440060426402_ec1ee088a47a158cd76195c5f913c784-Copy.jpg', 'Thành phần: trứng gà, sữa tươi, bột mì, bơ…\r\nDòng bánh mini cake phù hợp để ăn sáng, ăn tráng miệng, dùng làm bữa nhẹ, dùng cho các sự kiện, tea break hoặc các bữa tiệc lớn…\r\nThe Cake House nhận đặt bánh số lượng lớn theo yêu cầu, Quý khách vui lòng đặt trước 24h – 48h để The Cake House phục vụ Quý khách chu đáo nhất!', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(5, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `avatar`, `email`, `phone`, `address`, `password`, `role_id`, `deleted`) VALUES
(1, 'Nguyễn Quyết Thắng', 'demo_avt.jpg', 'thangnguyenquyet41@gmail.com', '0856862001', 'Nguyên Xá, Bắc Từ Liêm, Hà Nội', '202cb962ac59075b964b07152d234b70', 1, 0),
(6, 'Chi', '1.jpg', 'chi1@gmail.com', '1231212121', 'Thanh Hóa', '202cb962ac59075b964b07152d234b70', 1, NULL),
(7, 'Long ', '2.jpg', 'long@gmail.com', '454645465', 'Hà Nội', '250cf8b51c773f3f8dc8b4be867a9a02', 5, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
