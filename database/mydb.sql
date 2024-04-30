-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2024-04-30 17:04:26
-- 服务器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `mydb`
--

-- --------------------------------------------------------

--
-- 表的结构 `cart_table`
--

CREATE TABLE `cart_table` (
  `cart_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `cart_table`
--

INSERT INTO `cart_table` (`cart_ID`, `user_ID`, `product_ID`, `quantity`) VALUES
(62, 5, 101, 1);

-- --------------------------------------------------------

--
-- 表的结构 `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderdetailid` int(10) NOT NULL,
  `orderid` int(50) DEFAULT NULL,
  `goodsid` int(10) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `orderdetail`
--

INSERT INTO `orderdetail` (`orderdetailid`, `orderid`, `goodsid`, `amount`) VALUES
(49, 42980010, 106, 2),
(50, 42980010, 109, 1),
(51, 38, 107, 1),
(52, 38, 106, 1),
(53, 39, 101, 1),
(54, 40, 104, 1);

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `orderid` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 0,
  `time` datetime DEFAULT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`orderid`, `username`, `flag`, `time`, `sname`, `tel`, `address`) VALUES
(39, '3', 0, '2024-04-30 05:50:55', 'Shengqi', '91427816', 'JIuad1'),
(40, '3', 0, '2024-04-30 06:01:03', 'Shengqi', '91427816', 'JIuad1');

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

CREATE TABLE `products` (
  `product_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `specifications` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `products`
--

INSERT INTO `products` (`product_ID`, `name`, `brand`, `model`, `category`, `price`, `specifications`, `description`, `stock`) VALUES
(101, 'Intel Core i9-11900K', 'Intel', 'i9-11900K', 'CPU', 539.99, '8 Cores, 16 Threads, up to 5.3 GHz', 'High-end desktop processor, unlocked for overclocking, with thermal velocity boost.', 10),
(102, 'AMD Ryzen 9 5900X', 'AMD', 'Ryzen 9 5900X', 'CPU', 549.99, '12 Cores, 24 Threads, up to 4.8 GHz', 'High-performance gaming and creative processor with new AMD Zen 3 architecture.', 15),
(103, 'Intel Core i5-11600K', 'Intel', 'i5-11600K', 'CPU', 262.99, '6 Cores, 12 Threads, up to 4.9 GHz', 'Mid-range desktop processor suitable for gaming and multitasking.', 0),
(104, 'AMD Ryzen 5 5600X', 'AMD', 'Ryzen 5 5600X', 'CPU', 299.99, '6 Cores, 12 Threads, up to 4.6 GHz', 'Value for money gaming processor offering great performance at a lower cost.', 5),
(105, 'Intel Core i7-11700K', 'Intel', 'i7-11700K', 'CPU', 399.99, '8 Cores, 16 Threads, up to 5.0 GHz', 'High-performance processor with Intel Turbo Boost technology for better gaming and content creation.', 8),
(106, 'NVIDIA GeForce RTX 3080', 'NVIDIA', 'RTX 3080', 'GPU', 699.00, '10 GB GDDR6X, 8704 CUDA Cores, 1.71 GHz Boost Clock', 'High-end graphics card for gaming and content creation, with real-time ray tracing and AI features.', 20),
(108, 'Samsung 970 EVO Plus', 'Samsung', '970 EVO Plus', 'SSD', 189.99, '1TB, NVMe M.2, up to 3500 MB/s read speeds', 'High-speed storage solution with NVMe interface for faster data access and reliability.', 0),
(109, 'Corsair Vengeance LPX', 'Corsair', 'Vengeance LPX', 'RAM', 79.99, '16GB (2x8GB), DDR4, 3200 MHz', 'High-performance memory kit designed for overclocking in high-stress gaming scenarios.', 30),
(110, 'WD Blue SN550', 'Western Digital', 'SN550', 'SSD', 99.99, '500GB, NVMe M.2, up to 2400 MB/s read speeds', 'Cost-effective NVMe storage option for upgrading from traditional HDDs or older SSDs.', 25),
(111, 'ASUS ROG Strix Z490-E Gaming', 'ASUS', 'ROG Strix Z490-E', 'Motherboard', 299.99, 'Intel Z490 chipset, LGA 1200 socket, DDR4, PCIe 3.0', 'Feature-rich motherboard with advanced cooling and maximum connectivity options for gaming enthusiasts.', 12),
(112, 'G.Skill Trident Z RGB', 'G.Skill', 'Trident Z RGB', 'RAM', 109.99, '16GB (2x8GB), DDR4, 3600 MHz', 'Memory with RGB lighting, providing both aesthetic appeal and top-tier performance for gamers and professionals.', 0),
(113, 'Seagate Barracuda', 'Seagate', 'Barracuda', 'HDD', 49.99, '2TB, 7200 RPM, SATA 6Gb/s', 'Reliable hard disk drive with ample storage for various computing needs, from gaming to data archiving.', 35),
(115, 'NVIDIA GeForce RTX 3080', 'NVIDIA', 'RTX 3080', 'GPU', 699.99, '10 GB GDDR6X, Ray Tracing, 8704 CUDA Cores', 'High-end graphics card for gaming and professional applications, supports 4K gaming.', 20),
(116, 'AMD Radeon RX 6800 XT', 'AMD', 'RX 6800 XT', 'GPU', 649.99, '16 GB GDDR6, Ray Tracing, 4608 Stream Processors', 'Powerful gaming graphics card with high bandwidth memory and support for advanced gaming technologies.', 10);

-- --------------------------------------------------------

--
-- 表的结构 `reviews`
--

CREATE TABLE `reviews` (
  `review_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `reviews`
--

INSERT INTO `reviews` (`review_ID`, `product_ID`, `user_ID`, `rating`, `comment`, `Date`) VALUES
(3, 102, 3, 4, 'Powerful CPU with excellent performance for creative tasks.', '2024-04-30'),
(4, 106, 3, 5, 'Great processor for gaming and multitasking.', '2024-04-30');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `phone`, `address`, `is_admin`) VALUES
(3, 'shengqigui', '$2y$10$LgpJ1pMgjMkjSb1fCIdyuOWOmn312r1zfgfRRMvatTngtYdgwAIyO', 'asjdiiw@koad.com', '91427806', 'JIuad1', 1),
(5, '123123', '$2y$10$h6J5I8YOvdOKivGS6cv1TOCcszseIGiEAUU6nkSrtY9f4hPNDpoX6', 'asjdiiw@koad.com', '91427806', 'JIuad1', 0),
(6, 'TONYtony123', '$2y$10$.KFOZqlMVyWxYj0vNdkuh.Ih7Zm/QF.8dfgmoyTAOKrJ9pDxbOz9u', 'tony@koad.com', '91427802', 'Lingnan University', 0),
(7, 'BOBbob321', '$2y$10$fuY4kVTeedDtlIDhp4uOGuZn2vALpedpn3JAba8Q8Ehfwwgthy9Hi', '1160@qq.com', '91427855', 'Lingnan University', 1);

--
-- 转储表的索引
--

--
-- 表的索引 `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`cart_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `product_ID` (`product_ID`);

--
-- 表的索引 `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderdetailid`);

--
-- 表的索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- 表的索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_ID`);

--
-- 表的索引 `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_ID`),
  ADD KEY `product_ID` (`product_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `cart_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- 使用表AUTO_INCREMENT `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `orderdetailid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- 使用表AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 使用表AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- 使用表AUTO_INCREMENT `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 限制导出的表
--

--
-- 限制表 `cart_table`
--
ALTER TABLE `cart_table`
  ADD CONSTRAINT `cart_table_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_table_ibfk_2` FOREIGN KEY (`product_ID`) REFERENCES `products` (`product_ID`);

--
-- 限制表 `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `products` (`product_ID`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
