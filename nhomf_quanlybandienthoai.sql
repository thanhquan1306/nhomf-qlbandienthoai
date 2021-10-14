-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 13, 2021 lúc 09:14 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhomf_quanlybandienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'SamSung'),
(2, 'Iphone'),
(3, 'Xiaomi'),
(4, 'Oppo'),
(5, 'Vivo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_view` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_price`, `product_photo`, `product_view`) VALUES
(1, 'Điện thoại iPhone 12 64GB', 'Trong những tháng cuối năm 2020, Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bứt phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 64GB.\r\nVới CPU Apple A14 Bionic, bạn có thể dễ dàng trải nghiệm mọi tựa game với những pha chuyển cảnh mượt mà hay hàng loạt hiệu ứng đồ họa tuyệt đẹp ở mức đồ họa cao mà không lo tình trạng giật lag.', 20490000, 'iphone-12-xanh-duong-new-2-600x600.jpg', 4),
(2, 'Điện thoại Samsung Galaxy Z Fold3 5G 512GB', 'Đầu tiên, khung viền Galaxy Z Fold3 được hoàn thiện bằng chất liệu Armor Aluminum cao cấp nhất từ trước đến giờ nhằm tăng cường được độ bền, mà vẫn đảm bảo được trọng lượng cân đối đem tới cảm giác vô cùng chắc chắn và cao cấp. \r\nNhờ đó, tổng thể máy cũng đã mỏng nhẹ hơn khi trọng lượng giảm xuống còn 271 g, độ dày phần bản lề khi gập lại còn 16 mm cho cảm giác cầm nắm, sử dụng điện thoại Z Fold3 giờ đây đã thoải mái và dễ chịu hơn rất nhiều.\r\n\r\nKhi không dùng có thể gấp gọn như một cuốn sổ ghi chú nhỏ dễ dàng bỏ túi mang theo bên mình mọi lúc mọi nơi.\r\n\r\nSamsung Galaxy Z Fold3 5G | Trạng thái khi gập\r\n\r\nĐồng thời, Samsung còn tăng cường khả năng kháng nước trên Galaxy Fold3 chuẩn IPX8 khả dụng ở độ sâu 1.5 mét tối đa trong 30 phút, người dùng có thể an tâm sử dụng tại hồ bơi, thậm chí là dưới trời mưa.\r\n\r\nSamsung Galaxy Z Fold3 5G | Khả năng kháng nước chuẩn IPX8\r\n\r\nNgoài ra, với cảm biến vân tay ở cạnh bên, người dùng có thể nhanh chóng mở khóa và sử dụng chỉ bằng thao tác chạm nhẹ.\r\n\r\nSamsung Galaxy Z Fold3 5G | Cảm biến vân tay ở cạnh viền\r\n', 43990000, 'samsung-galaxy-z-fold-3-green-1-600x600.jpg', 5),
(3, 'Điện thoại Xiaomi Mi 11 5G', 'Xiaomi Mi 11 một siêu phẩm đến từ Xiaomi, máy cho trải nghiệm hiệu năng hàng đầu với vi xử lý Qualcomm Snapdragon 888, cùng loạt công nghệ đỉnh cao, khiến bất kỳ ai cũng sẽ choáng ngợp về smartphone này.\r\nThiết kế nổi bật với cụm camera độc nhất\r\nCó thể thấy, điểm sáng trong thiết kế của Mi 11 đến từ cụm 3 camera mặt sau được đặt trong mô-đun hình vuông, được phân tầng với 2 lớp kính tạo nên sự khác biệt và nổi bật ngay từ cái nhìn đầu tiên.', 16990000, 'xiaomi-mi-11-xanhduong-600x600-600x600.jpg', 4),
(4, 'Điện thoại OPPO Reno6 Z 5G', 'Reno6 Z 5G đến từ nhà OPPO với hàng loạt sự nâng cấp và cải tiến không chỉ ngoại hình bên ngoài mà còn sức mạnh bên trong. Đặc biệt, chiếc điện thoại được hãng đánh giá “chuyên gia chân dung bắt trọn mọi cảm xúc chân thật nhất”, đây chắc chắn sẽ là một “siêu phẩm\" mà bạn không thể bỏ qua.\r\nHệ thống camera sau được trang bị tối tân, trong đó có camera chính 64 MP, camera góc siêu rộng 8 MP và camera macro 2 MP cùng camera trước 32 MP luôn sẵn sàng bắt trọn mọi cảm xúc trong khung hình, giúp người dùng thoải mái ghi lại những khoảnh khắc trong cuộc sống một cách ấn tượng nhất.', 9490000, 'oppo-reno6-z-5g-aurora-1-600x600.jpg', 1),
(5, 'Điện thoại Samsung Galaxy S20 FE (8GB/256GB)', 'Samsung đã giới thiệu đến người dùng thành viên mới của dòng điện thoại thông minh S20 Series đó chính là Samsung Galaxy S20 FE. Đây là mẫu flagship cao cấp quy tụ nhiều tính năng mà Samfan yêu thích, hứa hẹn sẽ mang lại trải nghiệm cao cấp của dòng Galaxy S với mức giá dễ tiếp cận hơn.\r\n\r\nNhiếp ảnh chuyên nghiệp với cụm camera đẳng cấp.\r\n\r\nCamera trên S20 FE là 3 cảm biến chất lượng nằm gọn trong mô đun chữ nhật độc đáo ở mặt lưng bao gồm: Camera chính 12 MP cho chất lượng ảnh sắc nét, camera góc siêu rộng 12 MP cung cấp góc chụp tối đa và cuối cùng camera tele 8 MP hỗ trợ zoom quang 3X.', 12990000, 'samsung-galaxy-s20-fan-edition-090320-040338-600x600.jpg', 1),
(8, 'Điện thoại Vivo X70 Pro 5G ', 'Vivo cho ra mắt Vivo X70 Pro, một sản phẩm cao cấp ấn tượng với kiểu dáng lẫn hiệu năng tuyệt vời. Đặc biệt, camera còn được nâng cấp hàng loạt các tính năng thông minh, cùng bạn sáng tạo nên những kiệt tác đầy nghệ thuật.\r\n\r\nNgoại hình sang trọng, cao cấp hàng đầu.\r\n\r\nVivo X70 Pro sở hữu ngoại hình bắt mắt, sang trọng của một chiếc smartphone cao cấp với  khung kim loại cứng cáp và các góc cạnh được bo cong mềm mại nhẹ trông khá nam tính và mạnh mẽ.', 18990000, 'vivo-x70-pro-xanh-hong-1-600x600.jpg', 1),
(6, 'Điện thoại OPPO Find X3 Pro 5G', 'OPPO đã làm khuynh đảo thị trường smartphone khi cho ra đời chiếc điện thoại OPPO Find X3 Pro 5G. Đây là một sản phẩm có thiết kế độc đáo, sở hữu cụm camera khủng, cấu hình thuộc top đầu trong thế giới Android.\r\n\r\nKết quả của sự sáng tạo không ngừng.\r\n\r\nNếu nhìn qua mặt lưng của OPPO Find X3 Pro 5G thì bạn sẽ bất ngờ ngay với cụm camera sau, được tạo hình giống như miệng núi lửa, thiết kế này đã ngốn rất nhiều thời gian và công sức của nhà sản xuất để mang đến cho người dùng sự khác biệt mới lạ.', 23990000, 'oppo-find-x3-pro-black-001-1-600x600.jpg', 0),
(7, 'Điện thoại Xiaomi 11 Lite 5G NEc', 'Xiaomi 11 Lite 5G NE một phiên bản có ngoại hình rất giống với Mi 11 Lite được ra mắt trước đây. Chiếc smartphone này của Xiaomi mang trong mình một hiệu năng ổn định, thiết kế sang trọng và màn hình lớn đáp ứng tốt các tác vụ hằng ngày của bạn một cách dễ dàng.\r\n\r\nThiết kế mỏng nhẹ, mang đến sự nổi bật cho người dùng.\r\n\r\nMáy được chế tác nguyên khối, sở hữu một thân hình siêu mỏng nhẹ chỉ có trọng lượng 158 g và mỏng 6.8 mm, tạo cảm giác cầm nắm thoải mái, để vào túi quần hay túi áo cũng không quá nặng nề. ', 8490000, 'xiaomi-11-lite-5g-ne-pink-600x600.jpg', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_categories`
--

DROP TABLE IF EXISTS `products_categories`;
CREATE TABLE IF NOT EXISTS `products_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_categories`
--

INSERT INTO `products_categories` (`product_id`, `category_id`) VALUES
(1, 2),
(2, 1),
(3, 3),
(4, 4),
(5, 1),
(6, 4),
(7, 3),
(8, 5);
COMMIT;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `admin_level` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `photo`) VALUES
(1, 'ardianta', 'ardianta_pargo@yahoo.co.id', '$2y$10$HIEq2w.8Et9RsJmY4TMKye4aVCxOd9xJTOtG4vyOEmo.GIBxaPQHK', 'Ardianta Pargo', 'default.svg'),
(3, 'petanikode', 'info@petanikode.com', '$2y$10$uXa.Hz9rr8gkv4ztaqf6FO84iW64gXHbeyEOy1tIQ5wmqMjTk0yQa', 'Petani Kode', 'default.svg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
