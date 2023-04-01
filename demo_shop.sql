-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 10:39 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kennomej_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `photo`) VALUES
(11, 'Phones', 'uploads/cat-phone.png'),
(12, 'Laptops', 'uploads/cat-laptop.png'),
(15, 'Tablets', 'uploads/cat-tablet.png'),
(16, 'Games', 'uploads/cat-game.png'),
(17, 'Watches', 'uploads/cat-watch.png'),
(18, 'Fairly Used', 'uploads/cat-failyused.png'),
(19, 'Accessory', 'uploads/accesorries.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `memory` varchar(10) NOT NULL,
  `price` varchar(11) NOT NULL,
  `feature` varchar(10) NOT NULL,
  `details` varchar(500) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_name`, `name`, `brand`, `memory`, `price`, `feature`, `details`, `photo`, `date`) VALUES
(28, 'Phones', 'iphone 8', 'Apple', '128 GB', '17000000', 'No', '<p>This product is affordable.</p>', 'uploads/iphone-8.jpg', '2023-04-01 13:01:24'),
(30, 'Laptops', 'Macbook air', 'Apple', '1 TB', '70,000', 'Yes', '<p>This laptop is superb!</p>', 'uploads/macbook-air-13.jpg', '2023-04-01 13:10:09'),
(31, 'Phones', 'Samsung Galaxy X Fold 4', 'Samsung', '128 GB', '2750000', 'Yes', '<p>Released - August 25, 2022&nbsp;</p>', 'uploads/samsung-galaxy-z-fold-4.png', '2023-04-01 12:50:54'),
(33, 'Games', 'Play Station 5', 'Sony', '1 TB', '50,000', 'Yes', '<p>This is new testing!!!</p>', 'uploads/ps-5-2-2.png', '2023-04-01 13:08:23'),
(34, 'Phones', 'Huawei-P20 Pro', 'Huawei', '512 GB', '250,000', 'Yes', '<p>This is awesome handheld gadget.</p>', 'uploads/huawei-p20-pro-1.jpg', '2023-01-05 15:03:39'),
(35, 'Watches', 'Apple Watch 4 Series', 'Apple', '128 GB', '160,000', 'Yes', '<p>This is also awesome!</p>', 'uploads/apple-series-4.png', '2023-01-05 15:12:30'),
(36, 'Phones', 'Google pixel 5', 'Google', '512 GB', '50,000', 'Yes', '<p>This is superb!</p>', 'uploads/google-pixel-5-5g.jpg', '2023-04-01 13:10:24'),
(37, 'Laptops', 'Macbook pro m1', 'Apple', '1 TB', '50,000', 'Yes', '<p>Awesome!!!</p>', 'uploads/macbook-pro-m1.jpg', '2023-04-01 13:08:07'),
(38, 'Fairly used', 'Samsung galaxy A71', 'Samsung', '256 GB', '50,000', 'Yes', '<p>Awesome</p>', 'uploads/samsung-galaxy-a71 (1).jpg', '2023-04-01 13:04:11'),
(39, 'Phones', 'Samsung galaxy A71', 'Samsung', '256 GB', '250,000', 'No', '<p>Awesome</p>', 'uploads/samsung-galaxy-a71 (1).jpg', '2023-01-05 23:33:05'),
(40, 'Phones', 'Samsung galaxy S10E', 'Samsung', '128 GB', '160,000', 'No', '<p>Fantastic!!!</p>', 'uploads/galaxy-s10e.jpg', '2023-01-05 23:47:57'),
(41, 'Phones', 'Tecno Pouvoir 3+', 'Tecno', '64 GB', '150,000', 'No', '<p>Awesome</p>', 'uploads/pouvoir3+.jpg', '2023-01-05 23:56:32'),
(42, 'Phones', 'Camon X-12-Pro', 'Tecno', '64 GB', '150,000', 'No', '<p>Awesome!</p>', 'uploads/camon-x-12-pro.png', '2023-01-06 00:14:10'),
(43, 'Phones', 'Tecno Camon X', 'Tecno', '64 GB', '150,000', 'No', '<p>This phone is still good</p>', 'uploads/camon-x.png', '2023-01-07 07:12:03'),
(44, 'Tablets', 'iPad Pro ', 'Apple', '256 GB', '20,000', 'No', '<p>This product is still fantastic in functionality.</p>', 'uploads/apple-ipad-pro-11-2020.jpg', '2023-04-01 13:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image_path`) VALUES
(10, 'uploads/1.jpg'),
(11, 'uploads/2.jpg'),
(12, 'uploads/3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `usertype`) VALUES
(1, 'Kennomej', 'info@kennomej.com', '1234', 'admin'),
(2, 'abuchi', 'abuchiogbodo@gmail.com', '', 'admin'),
(3, 'abuchi', 'abuchiogbodo@gmail.com', '$2y$10$BbwNLQhxjZ3oP', 'admin'),
(4, 'kennomej', 'info@kennomej.com', '$2y$10$YmaeR9ErDS0Ns', 'admin'),
(5, 'oliver', 'oliver@gmail.com', '$2y$10$7.UsTU4Qk.9X9', 'admin'),
(6, 'test', 'test@mail.com', '$2y$10$ImRsiWY5T9/c1', 'admin'),
(7, 'test2', 'test2@mail.com', '1234', 'admin'),
(8, 'test3', 'test3@mail.com', '7110eda4d09e062aa5e4', 'admin'),
(9, 'test4', 'test4@mail.com', '7110eda4d09e062aa5e4', 'admin'),
(10, 'test5', 'test5@mail.com', '$2y$10$O8tTsQN7Z.un.', 'admin'),
(11, 'test6', 'test6@mail.com', '', 'admin'),
(12, 'test7', 'test7@mail.com', '', 'admin'),
(13, 'test8', 'admin8@mail.com', '', 'admin'),
(14, 'test9', 'test9@mail.com', '$2y$10$0QIVa9AiwUXt3', 'admin'),
(15, 'test10', 'test10@mail.com', '1234', 'admin'),
(16, 'test11', 'test11@mail.com', '', 'admin'),
(17, 'test12', 'test12@mail.com', '$2y$10$0IcI3/WLdiPYe', 'admin'),
(18, 'test13', 'test13@mail.com', '', 'admin'),
(19, 'test13', 'test13@mail.com', '1234', 'admin'),
(20, 'test13', 'test13@mail.com', '$2y$10$eX.UhJdpPjruo', 'admin'),
(21, 'demo-shop', 'test@demo-shop.com', '', 'admin'),
(22, 'demo-shop', 'test@demo-shop.com', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
