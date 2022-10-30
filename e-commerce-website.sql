-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2022 at 01:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce-website`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'computers'),
(2, 'Mobiles'),
(3, 'Clothes'),
(4, 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `img_name`, `product_id`) VALUES
(1, '634c9098076a7.png,634c909807d5a.png,634c909808422.png', 20),
(2, '634c4690c0acf.png,634c4690c1246.png,634c4690c1945.png', 21),
(3, '634c910ce506a.png,634c910ce5a16.jpg,634c910ce610f.png', 22),
(4, '634c4707e6050.png,634c4707e724f.png,634c4707e8d9c.png', 23),
(5, '634c820f9e58b.png,634c820f9ebba.png,634c820f9f2c2.png', 24),
(6, '634c90117232b.png,634c9011729a5.png,634c90117309c.png', 25),
(7, '634d3a5d59f6b.png,634d3a5d5a402.png,634d3a5d5aa44.png', 26);

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` int(11) NOT NULL,
  `priv_name` varchar(255) NOT NULL,
  `priv_id` enum('1','2','3','') NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `priv_name`, `priv_id`) VALUES
(1, 'admin', '2'),
(2, 'owner', '1'),
(3, 'super visor', '3');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `cat_id`) VALUES
(20, 'Laptop', '18000', 1),
(21, 'Mobile', '5000', 2),
(22, 'T-shirt', '300', 3),
(23, 'Black Shoes', '200', 4),
(24, 'Nike Shoes', '400', 4),
(25, 'Dell Computer', '8000', 1),
(26, 'Watch ', '250', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `priv` enum('1','2','3','') NOT NULL DEFAULT '3',
  `gender` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `address`, `phone`, `priv`, `gender`) VALUES
(1, 'mohamed', '202cb962ac59075b964b07152d234b70', 'mohamed@gmail.com ', 'mansoura', '0108480', '1', 0),
(2, 'eman', '202cb962ac59075b964b07152d234b70', 'eman@gmail.com ', 'tanta', '0108480', '2', 1),
(3, '3bsamad', '202cb962ac59075b964b07152d234b70', '3bsamad@gmail.com', 'mansoura', '0108480', '1', 0),
(5, 'mahmoud', '202cb962ac59075b964b07152d234b70', 'mahmoud@gmail.com ', 'cairo', '01097', '3', 0),
(7, 'mohamed abdelsamad', '202cb962ac59075b964b07152d234b70', 'mabdo@gmail.com', 'mansoura', '0018048408', '1', 0),
(16, 'Karen Bolton', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'lizopejut@mailinator.com ', 'Cillum aute soluta l', '+1 (611) 624-2257', '2', 0),
(18, 'mohamed', '202cb962ac59075b964b07152d234b70', 'mohamed@gmail.com', 'Ratione eum nihil ni', '+1 (513) 518-8407', '1', 1),
(19, 'Dalton Lane', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'mumap@mailinator.com', 'Quis accusantium sun', '+1 (882) 719-9026', '2', 0),
(20, 'Kerry Kane', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'dahamo@mailinator.com', 'Ut esse sit ut dolo', '+1 (185) 188-1981', '3', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priv_id` (`priv_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priv` (`priv`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`priv`) REFERENCES `privileges` (`priv_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
