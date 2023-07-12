/* khởi tạo database và kết nối đến database đó ở file config/database.php */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 11, 2023 lúc 06:37 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_ban_dt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `create_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`account_id`, `fullname`, `address`, `email`, `city`, `phone`, `gender`, `username`, `password`, `role`, `create_at`, `updated_at`) VALUES
(1, 'nguyen viet', 'yen nghia-ha dong', 'viet11@gmail.com', 'hanoi', '096822311', 0, 'user', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2023-06-26', '2023-07-07'),
(3, 'nguyen vu', 'bình dương', 'nguyenvu20@gmail.com', '34', '0981211221', 0, 'user1', 'ee11cbb19052e40b07aac0ca060c23ee', 0, '2023-07-09', '2023-07-09'),
(5, 'nguyễn quốc việt', 'văn quán - hà đông', 'nguyenviet212002@gmail.com', '1', '0968893421', 0, 'admin', 'd9e9bc0a9e53769f067a115037c03a6f', 1, '2023-07-09', '2023-07-09'),
(7, 'Sơn Tùng', 'không có', 'user2@gmail.com', '06', '0968422442', 0, 'user2', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2023-07-09', '2023-07-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `photo_banner` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`banner_id`, `photo_banner`) VALUES
(1, '/public/acssets/storage/banner/Banner0.png'),
(2, '/public/acssets/storage/banner/Banner1.png'),
(3, '/public/acssets/storage/banner/Banner2.png'),
(4, '/public/acssets/storage/banner/Banner3.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `category_id` int(11) NOT NULL,
  `name_category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`category_id`, `name_category`) VALUES
(1, 'Iphone'),
(2, 'Samsung'),
(10, 'Xiaomi'),
(11, 'Oppo'),
(12, 'Huawei');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `code_order` int(11) NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`product_id`, `quantity`, `id`, `code_order`, `purchase_date`, `create_at`, `updated_at`) VALUES
(21, 2, 2, 5074, '2023-07-07', '2023-07-07', '2023-07-07'),
(22, 1, 13, 5074, '2023-07-07', '2023-07-07', '2023-07-07'),
(23, 1, 13, 4238, '2023-07-09', '2023-07-09', '2023-07-09'),
(24, 1, 3, 4238, '2023-07-09', '2023-07-09', '2023-07-09'),
(25, 1, 13, 5592, '2023-07-11', '2023-07-11', '2023-07-11'),
(26, 1, 16, 920, '2023-07-11', '2023-07-11', '2023-07-11'),
(27, 1, 16, 4042, '2023-07-11', '2023-07-11', '2023-07-11'),
(28, 1, 32, 5495, '2023-07-11', '2023-07-11', '2023-07-11'),
(29, 1, 32, 2595, '2023-07-11', '2023-07-11', '2023-07-11'),
(30, 1, 41, 5912, '2023-07-11', '2023-07-11', '2023-07-11'),
(31, 1, 2, 5912, '2023-07-11', '2023-07-11', '2023-07-11'),
(32, 1, 3, 2260, '2023-07-11', '2023-07-11', '2023-07-11'),
(33, 1, 2, 7657, '2023-07-11', '2023-07-11', '2023-07-11'),
(34, 1, 3, 7657, '2023-07-11', '2023-07-11', '2023-07-11'),
(35, 1, 16, 7657, '2023-07-11', '2023-07-11', '2023-07-11'),
(36, 2, 3, 7681, '2023-07-11', '2023-07-11', '2023-07-11'),
(37, 1, 41, 3337, '2023-07-11', '2023-07-11', '2023-07-11'),
(38, 1, 16, 5198, '2023-07-11', '2023-07-11', '2023-07-11'),
(39, 1, 3, 2272, '2023-07-11', '2023-07-11', '2023-07-11'),
(40, 1, 16, 2272, '2023-07-11', '2023-07-11', '2023-07-11'),
(41, 1, 3, 9918, '2023-07-11', '2023-07-11', '2023-07-11'),
(42, 3, 16, 9918, '2023-07-11', '2023-07-11', '2023-07-11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `code_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`payment_id`, `fullname`, `address`, `phone`, `email`, `description`, `city`, `code_order`) VALUES
(15, 'nguyen viet', 'thái bình', '0968893421', 'nguyenviet212002@gmail.com', 'giao hang nhanh cho tui nha', '34', 5074),
(16, 'Sơn Tùng', 'yên nghĩa', '0968422442', 'sontung@gmail.com', 'giao nhanh giup tui voi', '01', 4238),
(17, 'nguyen viet', 'thái bình', '0968893421', 'nguyenviet212002@gmail.com', 'asasa', '34', 5592),
(18, 'nguyen viet', 'thái bình', '0968893421', 'nguyenviet212002@gmail.com', 'asasa', '34', 920),
(19, 'nguyen viet', 'thái bình', '0968893421', 'nguyenviet212002@gmail.com', 'dsds', '34', 4042),
(20, 'nguyen viet', 'thái bình', '0968893421', 'nguyenviet212002@gmail.com', 'asa', '34', 5495),
(21, 'nguyen viet', 'thái bình', '0968893421', 'nguyenviet212002@gmail.com', 'dsds', '34', 2595),
(22, 'Hoàng công quang', 'ha noi', '0968893421', 'quang211@gmail.com', 'giao hang nhanh cho tui nha', '01', 5912),
(23, 'Đặng văn lâm', 'hà giang', '0584844511', 'lam343@gmail.com', 'giao hang nhanh cho tui nha', '02', 2260),
(24, 'Hoàng vũ', 'văn quán - hà đông', '0644545121', 'vu1221@gmail.com', 'giao hang nhanh cho tui nha', '01', 7657),
(25, 'nguyen viet', 'thái bình', '0968893421', 'nguyenviet212002@gmail.com', 'giao hang nhanh cho tui nha', '34', 7681),
(26, 'nguyen viet', 'thái bình', '0968893421', 'nguyenviet212002@gmail.com', 'giao hang nhanh cho tui nha', '34', 3337),
(27, 'nguyen viet', 'thái bình', '0968893421', 'nguyenviet212002@gmail.com', 'giao hang nhanh cho tui nha', '34', 5198),
(28, 'nguyen viet', 'thái bình', '0968893421', 'nguyenviet212002@gmail.com', 'sdsd', '34', 2272),
(29, 'nguyen viet', 'thái bình', '0968893421', 'nguyenviet212002@gmail.com', 'giao hang nhanh cho tui nha', '34', 9918);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name_product` varchar(250) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `product_avatar` varchar(150) DEFAULT NULL,
  `description` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name_product`, `price`, `discount`, `product_avatar`, `description`, `category_id`, `create_at`, `update_at`) VALUES
(2, 'Iphone 14 Pro max', 32000000, 20, '/public/acssets/storage/productphotos/IMG-64aad98ddab131.79471665.jpg', 'Như các bạn cũng đã biết thì đã 4 năm kể từ chiếc điện thoạiiPhone 6 và iPhone 6 Plus thì Apple vẫn chưa có thay đổi nào đáng kể trong thiết kế của mình. Nhưng với iPhone X thì đó lại là 1 câu chuyện hoàn toàn khác, máy chuyển qua sử dụng màn hình tỉ lệ 19.5:9 mới mẻ với phần diện tích hiển thị mặt trước cực lớn. Mặt lưng kính hỗ trợ sạc nhanh khôn...', 1, '2023-07-07', '2023-07-09'),
(3, 'Iphone X ', 5000000, 20, '/public/acssets/storage/productphotos/IMG-64aa9e4e405b16.68499274.jpeg', 'Như các bạn cũng đã biết thì đã 4 năm kể từ chiếc điện thoạiiPhone 6 và iPhone 6 Plus thì Apple vẫn chưa có thay đổi nào đáng kể trong thiết kế của mình. Nhưng với iPhone X thì đó lại là 1 câu chuyện hoàn toàn khác, máy chuyển qua sử dụng màn hình tỉ lệ 19.5:9 mới mẻ với phần diện tích hiển thị mặt trước cực lớn. Mặt lưng kính hỗ trợ sạc nhanh khôn...', 1, '2023-07-07', '2023-07-09'),
(13, 'Samsung A21', 4200000, 40, '/public/acssets/storage/productphotos/IMG-64aad80dc4def9.68717839.jpg', 'Điện thoại A34 là một phiên bản Samsung tầm trung được ra mắt đầu năm 2023. Máy mang tới một thiết kế mới mang đầy đặc trưng dòng Galaxy A và cấu hình toàn diện trong tầm giá. Bạn có thể tham khảo cấu hình A34 dưới đây:  Màn hình: 6.6 inch, Super AMOLED, 120Hz, 1000 nits Hiệu năng: Dimensity 1080 (6 nm) Camera: 48 MP, 8 MP, 5 MP Pin, sạc: 5000mAh, 25W Tính năng: Vân tay trên màn, IP67', 2, '2023-06-08', '2023-07-09'),
(16, 'Samsung A42', 5200000, 0, '/public/acssets/storage/productphotos/IMG-64aad91b9c9a47.21431730.jpg', 'Điện thoại A31 là một phiên bản Samsung tầm trung được ra mắt đầu năm 2023. Máy mang tới một thiết kế mới mang đầy đặc trưng dòng Galaxy A và cấu hình toàn diện trong tầm giá. Bạn có thể tham khảo cấu hình A34 dưới đây:  Màn hình: 6.6 inch, Super AMOLED, 120Hz, 1000 nits Hiệu năng: Dimensity 1080 (6 nm) Camera: 48 MP, 8 MP, 5 MP Pin, sạc: 5000mAh, 25W Tính năng: Vân tay trên màn, IP67', 2, '2023-07-08', '2023-07-09'),
(32, 'Samsung A31', 6000000, 20, '/public/acssets/storage/productphotos/IMG-64aad8c0646961.13090624.jpg', 'Điện thoại A31 là một phiên bản Samsung tầm trung được ra mắt đầu năm 2023. Máy mang tới một thiết kế mới mang đầy đặc trưng dòng Galaxy A và cấu hình toàn diện trong tầm giá. Bạn có thể tham khảo cấu hình A34 dưới đây:  Màn hình: 6.6 inch, Super AMOLED, 120Hz, 1000 nits Hiệu năng: Dimensity 1080 (6 nm) Camera: 48 MP, 8 MP, 5 MP Pin, sạc: 5000mAh, 25W Tính năng: Vân tay trên màn, IP67', 2, '2023-07-08', '2023-07-09'),
(36, 'Xiaomi Redmi Note 20', 8000000, 20, '/public/acssets/storage/productphotos/IMG-64aad88245a8b2.32573670.jpg', 'Ngay từ khi xuất hiện những thông tin rò rỉ đầu tiên Xiaomi note 20 đã thu hút được đông đảo người dùng. Được thiết kế với vẻ ngoài sang trọng cùng hiệu năng mạnh mẽ hơn thế giá thành lại vô cùng ấn tượng. Chắc chắn đây sẽ là đối thủ đáng gờm của rất nhiều cái tên khác trên thị trường.', 10, '2023-07-09', '2023-07-09'),
(38, 'Oppo K3 ', 4530000, 20, '/public/acssets/storage/productphotos/IMG-64aada2876b8a3.47004671.jpg', 'OPPO K3 là một chiếc smartphone tầm trung với khá nhiều tính năng cao cấp như màn hình không \"tai thỏ\" hay cảm biến vân tay bên trong màn hình.', 11, '2023-07-09', '2023-07-09'),
(40, 'Huawei P30 Pro', 12000000, 20, '/public/acssets/storage/productphotos/IMG-64aadaff70a5b4.05130279.jpg', 'Huawei P30 Pro là một bước đột phá của Huawei cũng như camera trên smartphone khi đem lại khả năng zoom như một \"kính viễn vọng\".', 12, '2023-07-09', '2023-07-09'),
(41, 'Iphone 13 ProMax', 21000000, 20, '/public/acssets/storage/productphotos/IMG-64aadcb842b6a1.46474886.jpg', 'Như các bạn cũng đã biết thì đã 4 năm kể từ chiếc điện thoạiiPhone 6 và iPhone 6 Plus thì Apple vẫn chưa có thay đổi nào đáng kể trong thiết kế của mình. Nhưng với iPhone X thì đó lại là 1 câu chuyện hoàn toàn khác, máy chuyển qua sử dụng màn hình tỉ lệ 19.5:9 mới mẻ với phần diện tích hiển thị mặt trước cực lớn. Mặt lưng kính hỗ trợ sạc nhanh khôn...', 1, '2023-07-09', '2023-07-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `review` text NOT NULL,
  `account_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `create_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`review_id`, `start`, `review`, `account_id`, `id`, `create_at`, `updated_at`) VALUES
(14, 5, 'điện thoại rất đẹp giá ổn nữa vote 5 sao cho shop luôn', 5, 2, '2023-07-10', '2023-07-10'),
(15, 3, 'điện thoại rất đẹp giá ổn nữa vote 5 sao cho shop luôn', 1, 13, '2023-07-10', '2023-07-10'),
(22, 5, 'san pham chat luong qua', 5, 16, '2023-07-10', '2023-07-10'),
(24, 4, 'san pham chat luong qua', 5, 13, '2023-07-10', '2023-07-10'),
(25, 5, 'san pham chat luong qua', 5, 13, '2023-07-10', '2023-07-10'),
(26, 5, 'san pham chat luong qua', 5, 13, '2023-07-10', '2023-07-10'),
(27, 5, 'tôi rất thích sản phẩm.Rất đẹp', 5, 36, '2023-07-10', '2023-07-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sell_products`
--

CREATE TABLE `sell_products` (
  `sell_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sell_products`
--

INSERT INTO `sell_products` (`sell_id`, `qty`, `id`, `created_at`, `updated_at`) VALUES
(20, 50, 2, '2023-07-11', '2023-07-11'),
(21, 30, 3, '2023-07-11', '2023-07-11'),
(23, 15, 16, '2023-07-11', '2023-07-11'),
(100, 100, 41, '2023-07-11', '2023-07-11'),
(101, 200, 13, '2023-07-11', '2023-07-11'),
(102, 45, 38, '2023-07-11', '2023-07-11');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Chỉ mục cho bảng `sell_products`
--
ALTER TABLE `sell_products`
  ADD PRIMARY KEY (`sell_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `sell_products`
--
ALTER TABLE `sell_products`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
