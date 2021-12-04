/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL_HOME
 Source Server Type    : MySQL
 Source Server Version : 80025
 Source Host           : localhost:3306
 Source Schema         : qlbandienthoai

 Target Server Type    : MySQL
 Target Server Version : 80025
 File Encoding         : 65001

 Date: 25/11/2021 21:52:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'SamSung');
INSERT INTO `categories` VALUES (2, 'Iphone');
INSERT INTO `categories` VALUES (3, 'Xiaomi');
INSERT INTO `categories` VALUES (4, 'Oppo');
INSERT INTO `categories` VALUES (5, 'Vivo');
INSERT INTO `categories` VALUES (6, 'Phụ kiện SS');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int NOT NULL,
  `product_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_view` int NOT NULL,
  `product_type` int NULL DEFAULT NULL COMMENT '0: dt, 1: phu kien',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Điện thoại iPhone 12 64GB', 'Trong những tháng cuối năm 2020, Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bứt phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 64GB.\r\nVới CPU Apple A14 Bionic, bạn có thể dễ dàng trải nghiệm mọi tựa game với những pha chuyển cảnh mượt mà hay hàng loạt hiệu ứng đồ họa tuyệt đẹp ở mức đồ họa cao mà không lo tình trạng giật lag.', 20490000, 'iphone-12-xanh-duong-new-2-600x600.jpg', 4, 0);
INSERT INTO `products` VALUES (2, 'Điện thoại Samsung Galaxy Z Fold3 5G 512GB', 'Đầu tiên, khung viền Galaxy Z Fold3 được hoàn thiện bằng chất liệu Armor Aluminum cao cấp nhất từ trước đến giờ nhằm tăng cường được độ bền, mà vẫn đảm bảo được trọng lượng cân đối đem tới cảm giác vô cùng chắc chắn và cao cấp. \r\nNhờ đó, tổng thể máy cũng đã mỏng nhẹ hơn khi trọng lượng giảm xuống còn 271 g, độ dày phần bản lề khi gập lại còn 16 mm cho cảm giác cầm nắm, sử dụng điện thoại Z Fold3 giờ đây đã thoải mái và dễ chịu hơn rất nhiều.\r\n\r\nKhi không dùng có thể gấp gọn như một cuốn sổ ghi chú nhỏ dễ dàng bỏ túi mang theo bên mình mọi lúc mọi nơi.\r\n\r\nSamsung Galaxy Z Fold3 5G | Trạng thái khi gập\r\n\r\nĐồng thời, Samsung còn tăng cường khả năng kháng nước trên Galaxy Fold3 chuẩn IPX8 khả dụng ở độ sâu 1.5 mét tối đa trong 30 phút, người dùng có thể an tâm sử dụng tại hồ bơi, thậm chí là dưới trời mưa.\r\n\r\nSamsung Galaxy Z Fold3 5G | Khả năng kháng nước chuẩn IPX8\r\n\r\nNgoài ra, với cảm biến vân tay ở cạnh bên, người dùng có thể nhanh chóng mở khóa và sử dụng chỉ bằng thao tác chạm nhẹ.\r\n\r\nSamsung Galaxy Z Fold3 5G | Cảm biến vân tay ở cạnh viền\r\n', 43990000, 'samsung-galaxy-z-fold-3-green-1-600x600.jpg', 6, 0);
INSERT INTO `products` VALUES (3, 'Điện thoại Xiaomi Mi 11 5G', 'Xiaomi Mi 11 một siêu phẩm đến từ Xiaomi, máy cho trải nghiệm hiệu năng hàng đầu với vi xử lý Qualcomm Snapdragon 888, cùng loạt công nghệ đỉnh cao, khiến bất kỳ ai cũng sẽ choáng ngợp về smartphone này.\r\nThiết kế nổi bật với cụm camera độc nhất\r\nCó thể thấy, điểm sáng trong thiết kế của Mi 11 đến từ cụm 3 camera mặt sau được đặt trong mô-đun hình vuông, được phân tầng với 2 lớp kính tạo nên sự khác biệt và nổi bật ngay từ cái nhìn đầu tiên.', 16990000, 'xiaomi-mi-11-xanhduong-600x600-600x600.jpg', 4, 0);
INSERT INTO `products` VALUES (4, 'Điện thoại OPPO Reno6 Z 5G', 'Reno6 Z 5G đến từ nhà OPPO với hàng loạt sự nâng cấp và cải tiến không chỉ ngoại hình bên ngoài mà còn sức mạnh bên trong. Đặc biệt, chiếc điện thoại được hãng đánh giá “chuyên gia chân dung bắt trọn mọi cảm xúc chân thật nhất”, đây chắc chắn sẽ là một “siêu phẩm\" mà bạn không thể bỏ qua.\r\nHệ thống camera sau được trang bị tối tân, trong đó có camera chính 64 MP, camera góc siêu rộng 8 MP và camera macro 2 MP cùng camera trước 32 MP luôn sẵn sàng bắt trọn mọi cảm xúc trong khung hình, giúp người dùng thoải mái ghi lại những khoảnh khắc trong cuộc sống một cách ấn tượng nhất.', 9490000, 'oppo-reno6-z-5g-aurora-1-600x600.jpg', 1, 0);
INSERT INTO `products` VALUES (5, 'Điện thoại Samsung Galaxy S20 FE (8GB/256GB)', 'Samsung đã giới thiệu đến người dùng thành viên mới của dòng điện thoại thông minh S20 Series đó chính là Samsung Galaxy S20 FE. Đây là mẫu flagship cao cấp quy tụ nhiều tính năng mà Samfan yêu thích, hứa hẹn sẽ mang lại trải nghiệm cao cấp của dòng Galaxy S với mức giá dễ tiếp cận hơn.\r\n\r\nNhiếp ảnh chuyên nghiệp với cụm camera đẳng cấp.\r\n\r\nCamera trên S20 FE là 3 cảm biến chất lượng nằm gọn trong mô đun chữ nhật độc đáo ở mặt lưng bao gồm: Camera chính 12 MP cho chất lượng ảnh sắc nét, camera góc siêu rộng 12 MP cung cấp góc chụp tối đa và cuối cùng camera tele 8 MP hỗ trợ zoom quang 3X.', 12990000, 'samsung-galaxy-s20-fan-edition-090320-040338-600x600.jpg', 1, 0);
INSERT INTO `products` VALUES (8, 'Điện thoại Vivo X70 Pro 5G ', 'Vivo cho ra mắt Vivo X70 Pro, một sản phẩm cao cấp ấn tượng với kiểu dáng lẫn hiệu năng tuyệt vời. Đặc biệt, camera còn được nâng cấp hàng loạt các tính năng thông minh, cùng bạn sáng tạo nên những kiệt tác đầy nghệ thuật.\r\n\r\nNgoại hình sang trọng, cao cấp hàng đầu.\r\n\r\nVivo X70 Pro sở hữu ngoại hình bắt mắt, sang trọng của một chiếc smartphone cao cấp với  khung kim loại cứng cáp và các góc cạnh được bo cong mềm mại nhẹ trông khá nam tính và mạnh mẽ.', 18990000, 'vivo-x70-pro-xanh-hong-1-600x600.jpg', 1, 0);
INSERT INTO `products` VALUES (6, 'Điện thoại OPPO Find X3 Pro 5G', 'OPPO đã làm khuynh đảo thị trường smartphone khi cho ra đời chiếc điện thoại OPPO Find X3 Pro 5G. Đây là một sản phẩm có thiết kế độc đáo, sở hữu cụm camera khủng, cấu hình thuộc top đầu trong thế giới Android.\r\n\r\nKết quả của sự sáng tạo không ngừng.\r\n\r\nNếu nhìn qua mặt lưng của OPPO Find X3 Pro 5G thì bạn sẽ bất ngờ ngay với cụm camera sau, được tạo hình giống như miệng núi lửa, thiết kế này đã ngốn rất nhiều thời gian và công sức của nhà sản xuất để mang đến cho người dùng sự khác biệt mới lạ.', 23990000, 'oppo-find-x3-pro-black-001-1-600x600.jpg', 0, 0);
INSERT INTO `products` VALUES (7, 'Điện thoại Xiaomi 11 Lite 5G NEc', 'Xiaomi 11 Lite 5G NE một phiên bản có ngoại hình rất giống với Mi 11 Lite được ra mắt trước đây. Chiếc smartphone này của Xiaomi mang trong mình một hiệu năng ổn định, thiết kế sang trọng và màn hình lớn đáp ứng tốt các tác vụ hằng ngày của bạn một cách dễ dàng.\r\n\r\nThiết kế mỏng nhẹ, mang đến sự nổi bật cho người dùng.\r\n\r\nMáy được chế tác nguyên khối, sở hữu một thân hình siêu mỏng nhẹ chỉ có trọng lượng 158 g và mỏng 6.8 mm, tạo cảm giác cầm nắm thoải mái, để vào túi quần hay túi áo cũng không quá nặng nề. ', 8490000, 'xiaomi-11-lite-5g-ne-pink-600x600.jpg', 2, 0);
INSERT INTO `products` VALUES (10, 'Tai nghe', 'Tai nghe mô tả', 100000, 'tai-nghe.jpg', 1, 1);
INSERT INTO `products` VALUES (11, 'Sạc không dây', 'Sạc không dây', 5000, 'sac-khong-day-3-1.jpg', 2, 1);
INSERT INTO `products` VALUES (12, 'Pin', 'Pin', 3000, 'pin.jpg', 3, 1);

-- ----------------------------
-- Table structure for products_categories
-- ----------------------------
DROP TABLE IF EXISTS `products_categories`;
CREATE TABLE `products_categories`  (
  `product_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`product_id`, `category_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of products_categories
-- ----------------------------
INSERT INTO `products_categories` VALUES (1, 2);
INSERT INTO `products_categories` VALUES (2, 1);
INSERT INTO `products_categories` VALUES (3, 3);
INSERT INTO `products_categories` VALUES (4, 4);
INSERT INTO `products_categories` VALUES (5, 1);
INSERT INTO `products_categories` VALUES (6, 4);
INSERT INTO `products_categories` VALUES (7, 3);
INSERT INTO `products_categories` VALUES (8, 5);
INSERT INTO `products_categories` VALUES (10, 6);
INSERT INTO `products_categories` VALUES (11, 6);
INSERT INTO `products_categories` VALUES (12, 6);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admin_level` int NOT NULL DEFAULT 0,
  `photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'default.svg',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'ardianta', 'ardianta_pargo@yahoo.co.id', '$2y$10$HIEq2w.8Et9RsJmY4TMKye4aVCxOd9xJTOtG4vyOEmo.GIBxaPQHK', 'Ardianta Pargo', 0, 'default.svg');
INSERT INTO `users` VALUES (3, 'petanikode', 'info@petanikode.com', '$2y$10$uXa.Hz9rr8gkv4ztaqf6FO84iW64gXHbeyEOy1tIQ5wmqMjTk0yQa', 'Petani Kode', 0, 'default.svg');
INSERT INTO `users` VALUES (4, 'tungnx', 'tungnx@gmail.com', '$2y$10$Lk3KM1qdXd/PHBJHJNhDAu1BopjiO.HHt9teoicJaLnS.uwn1ZsXO', 'N X T', 0, 'default.svg');

SET FOREIGN_KEY_CHECKS = 1;
