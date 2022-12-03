-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 15, 2022 lúc 07:17 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `agile_coffee_system`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` int(10) UNSIGNED ZEROFILL NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `fullname`, `gender`, `date_of_birth`, `phone_number`, `password_hash`, `email`, `created_at`) VALUES
(1, 'Hạnh', 'Trần Lê Chánh Hạnh', 'Male', '2001-10-14', 0363049071, '$2y$10$35luutORpMr1nkFqgxV2FednKZGX047dvnQ/XowUCBpTOTUU2SCkK', 'hanhtlc1410@gmail.com', '2022-03-17 00:20:36'),
(2, 'mandat110', 'Huỳnh Mẫn Đạt', 'Male', '2000-01-01', 0877755703, '$2y$10$Y4tmQSItvcApyO7lB1BtD.ulo9BnlrSJU4lGRs4LwLgvIJ30QpRzG', 'JuniorKevin110@gmail.com', '2022-04-10 12:50:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `account` int(11) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`id`, `account`, `address`) VALUES
(14, 2, 'Đại học Sư Phạm TPHCM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_item`
--

CREATE TABLE `cart_item` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(1) NOT NULL,
  `sweetness` int(11) NOT NULL,
  `milk` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart_item`
--

INSERT INTO `cart_item` (`id`, `user_id`, `product_id`, `quantity`, `size`, `sweetness`, `milk`, `total_amount`) VALUES
(12, 1, 1, 1, 'S', 0, 0, '5.25'),
(13, 1, 1, 1, 'S', 1, 2, '5.25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coffee_list`
--

CREATE TABLE `coffee_list` (
  `id` int(11) NOT NULL,
  `coffee_name` varchar(50) NOT NULL,
  `coffee_type` varchar(50) NOT NULL,
  `price_s` decimal(10,2) NOT NULL,
  `price_m` decimal(10,2) NOT NULL,
  `price_l` decimal(10,2) NOT NULL,
  `sold_out` tinyint(1) NOT NULL,
  `amount_bought` int(11) NOT NULL,
  `seasonal_special` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `coffee_list`
--

INSERT INTO `coffee_list` (`id`, `coffee_name`, `coffee_type`, `price_s`, `price_m`, `price_l`, `sold_out`, `amount_bought`, `seasonal_special`) VALUES
(1, 'Iced White Mocha', 'Espresso ', '5.25', '5.50', '5.75', 0, 0, 1),
(2, 'Pink Drink', 'Refresher', '3.25', '3.50', '3.75', 1, 0, 1),
(3, 'Java Chip Frappuccino', 'Frappuccino', '5.75', '6.00', '6.25', 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_delivery`
--

CREATE TABLE `order_delivery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_payment_id` int(11) DEFAULT NULL,
  `address_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL,
  `ordered_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_delivery`
--

INSERT INTO `order_delivery` (`id`, `user_id`, `user_payment_id`, `address_id`, `total_amount`, `status`, `ordered_at`) VALUES
(10, 2, NULL, 14, '11.00', 0, '0000-00-00 00:00:00'),
(11, 2, NULL, 14, '5.50', 0, '0000-00-00 00:00:00'),
(13, 2, NULL, 14, '6.00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_item_delivery`
--

CREATE TABLE `order_item_delivery` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(1) NOT NULL,
  `sweetness` int(11) NOT NULL,
  `milk` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_item_delivery`
--

INSERT INTO `order_item_delivery` (`id`, `order_id`, `product_id`, `quantity`, `size`, `sweetness`, `milk`, `total_amount`) VALUES
(6, 10, 1, 1, 'S', 1, 1, '5.25'),
(7, 10, 3, 1, 'S', 1, 1, '5.75'),
(8, 10, 1, 1, 'M', 1, 1, '5.50'),
(9, 13, 3, 1, 'M', 1, 1, '6.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_item_pickup`
--

CREATE TABLE `order_item_pickup` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(1) NOT NULL,
  `sweetness` int(11) NOT NULL,
  `milk` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_pickup`
--

CREATE TABLE `order_pickup` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `pickup_time` datetime DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `ordered_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `store_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_payment`
--

CREATE TABLE `user_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_account_address` (`account`);

--
-- Chỉ mục cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `fk_product` (`product_id`);

--
-- Chỉ mục cho bảng `coffee_list`
--
ALTER TABLE `coffee_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_delivery`
--
ALTER TABLE `order_delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ordered_by` (`user_id`),
  ADD KEY `fk_delivery_payment` (`user_payment_id`),
  ADD KEY `fk_delivery_address` (`address_id`);

--
-- Chỉ mục cho bảng `order_item_delivery`
--
ALTER TABLE `order_item_delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order` (`order_id`),
  ADD KEY `fk_product_order` (`product_id`);

--
-- Chỉ mục cho bảng `order_item_pickup`
--
ALTER TABLE `order_item_pickup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_pickup` (`user_id`),
  ADD KEY `fk_product_pickup` (`product_id`);

--
-- Chỉ mục cho bảng `order_pickup`
--
ALTER TABLE `order_pickup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_account` (`order_id`),
  ADD KEY `fk_store` (`store_id`);

--
-- Chỉ mục cho bảng `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_payment` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `coffee_list`
--
ALTER TABLE `coffee_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order_delivery`
--
ALTER TABLE `order_delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `order_item_delivery`
--
ALTER TABLE `order_item_delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `order_item_pickup`
--
ALTER TABLE `order_item_pickup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_pickup`
--
ALTER TABLE `order_pickup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_account_address` FOREIGN KEY (`account`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `coffee_list` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `order_delivery`
--
ALTER TABLE `order_delivery`
  ADD CONSTRAINT `fk_delivery_address` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `fk_delivery_payment` FOREIGN KEY (`user_payment_id`) REFERENCES `user_payment` (`id`),
  ADD CONSTRAINT `fk_ordered_by` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `order_item_delivery`
--
ALTER TABLE `order_item_delivery`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`order_id`) REFERENCES `order_delivery` (`id`),
  ADD CONSTRAINT `fk_product_order` FOREIGN KEY (`product_id`) REFERENCES `coffee_list` (`id`);

--
-- Các ràng buộc cho bảng `order_item_pickup`
--
ALTER TABLE `order_item_pickup`
  ADD CONSTRAINT `fk_product_pickup` FOREIGN KEY (`product_id`) REFERENCES `coffee_list` (`id`),
  ADD CONSTRAINT `fk_user_pickup` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `order_pickup`
--
ALTER TABLE `order_pickup`
  ADD CONSTRAINT `fk_account` FOREIGN KEY (`order_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `fk_order_pickup` FOREIGN KEY (`order_id`) REFERENCES `order_item_pickup` (`id`),
  ADD CONSTRAINT `fk_store` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);

--
-- Các ràng buộc cho bảng `user_payment`
--
ALTER TABLE `user_payment`
  ADD CONSTRAINT `fk_user_payment` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
