-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2022 at 02:06 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(14, 'cat1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

CREATE TABLE `designs` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`id`, `user_id`, `image`) VALUES
(44, 2, '757236541_360087803.jpg'),
(45, 2, '215070817_images (1).jpg'),
(46, 2, '635340897_download (2).jpg'),
(47, 2, '343468401_1400952295299.jpeg'),
(48, 2, '599120262_1483637335980.jpeg'),
(49, 2, '568797485_1428458553235.jpeg'),
(67, 2, '239565612_packageimg3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `design_orders`
--

CREATE TABLE `design_orders` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `design_orders`
--

INSERT INTO `design_orders` (`id`, `user_id`, `name`, `email`, `phone_no`, `message`) VALUES
(1, 2, 'waruna pradeep', 'warunapradeep407@gmail.com', '', 'This is a test order message'),
(3, 5, 'waruna pradeep', 'warunapradeep407@gmail.com', '0769610260', 'fdsafasdfdas');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(35, 6, 7, 'hi'),
(36, 7, 6, 'hello'),
(37, 7, 6, 'How are you'),
(38, 6, 7, 'fine!'),
(39, 7, 6, 'so what about your job'),
(40, 6, 7, 'it\'s nice');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address_one` varchar(255) NOT NULL,
  `address_two` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `first_name`, `last_name`, `company`, `country`, `address_one`, `address_two`, `city`, `state`, `phone`, `email`, `payment_type`, `total_price`, `payment_status`, `order_status`, `added_on`) VALUES
(11, 1, 'nimal', 'ekanayaka', 'waruna designs', 'Sri Lanka', 'trincomale', 'nilaweli', 'trincomale', '', 2147483647, 'warunahello@gmail.com', 'COD', 45, 'success', 'pending', '2022-03-26 07:00:35'),
(12, 1, 'waruna', 'pradeep', 'waruna designs', 'Sri Lanka', 'mahagirilla', 'mahagirilla', 'nikaweratiya', '', 2147483647, 'warunapradeep407@gmail.com', 'COD', 23, 'success', 'pending', '2022-03-26 07:04:36'),
(13, 1, 'ajith', 'herath', 'arawinda welada sela', 'Sri Lanka', 'mahakirinda', 'mahagirilla', 'nikaweratiya', '', 769610260, 'ajithherath@gmail.com', 'COD', 23, 'success', 'pending', '2022-03-26 09:20:26'),
(14, 3, 'nimal', 'ekanayaka', 'clapde', 'Sri Lanka', 'trincomale', 'nilaweli', 'trincomale', '', 2147483647, 'warunapradeep407@gmail.com', 'COD', 23, 'success', 'pending', '2022-03-30 08:42:32'),
(15, 3, 'nimal', 'ekanayaka', 'waruna designs', 'Sri Lanka', 'trincomale', 'mahagirilla', 'trincomale', '', 2147483647, 'warunapradeep407@gmail.com', 'COD', 23, 'success', 'pending', '2022-04-04 07:32:51'),
(16, 5, '', '', '', '', '', '', '', '', 0, '', 'paypal', 22, 'pending', 'pending', '2022-04-29 11:03:21'),
(17, 5, '', '', '', '', '', '', '', '', 0, '', 'paypal', 22, 'pending', 'pending', '2022-04-29 11:04:33'),
(18, 5, '', '', '', '', '', '', '', '', 0, '', 'paypal', 23, 'pending', 'pending', '2022-04-29 11:13:57'),
(19, 5, '', '', '', '', '', '', '', '', 0, '', 'paypal', 22, 'pending', 'pending', '2022-04-29 11:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`, `added_on`) VALUES
(1, 9, 14, 1, 23, '2022-03-26 06:57:31'),
(2, 10, 14, 1, 23, '2022-03-26 06:58:51'),
(3, 10, 13, 1, 22, '2022-03-26 06:58:51'),
(4, 11, 14, 1, 23, '2022-03-26 07:00:35'),
(5, 11, 13, 1, 22, '2022-03-26 07:00:35'),
(6, 12, 14, 1, 23, '2022-03-26 07:04:36'),
(7, 13, 14, 1, 23, '2022-03-26 09:20:26'),
(8, 14, 14, 1, 23, '2022-03-30 08:42:32'),
(9, 15, 14, 1, 23, '2022-04-04 07:32:51'),
(10, 16, 18, 1, 22, '2022-04-29 11:03:21'),
(11, 17, 18, 1, 22, '2022-04-29 11:04:33'),
(12, 18, 16, 1, 23, '2022-04-29 11:13:57'),
(13, 19, 18, 1, 22, '2022-04-29 11:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `product_id` float(10,2) NOT NULL,
  `transaction_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_amount` float(10,2) NOT NULL,
  `currency_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createdtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `product_id`, `transaction_id`, `payment_amount`, `currency_code`, `payment_status`, `invoice_id`, `product_name`, `createdtime`) VALUES
(4, 1.00, 'PAYID-MGBX2DI5UK19838ER824952P', 1.00, 'USD', 'approved', '61837d07e4251', 'HP Laptop', '2021-11-04 07:26:45'),
(5, 3.00, 'PAYID-MGBX2RQ38228855H94885305', 3.00, 'USD', 'approved', '61837d40862de', 'Dell Laptop', '2021-11-04 07:27:25'),
(6, 2.00, 'PAYID-MGBX5CY0DR70480PX2276315', 2.00, 'USD', 'approved', '61837e8624ec4', 'Lenovo Laptop', '2021-11-04 07:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float(10,2) NOT NULL,
  `price` float(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(16, 14, 'test', 23.00, 36.00, 50, '703834191_productbig1.webp', 'fdsa', 'dfs', 'fdas', 'fds', 'fdsa', 1),
(17, 14, 'test2', 23.00, 32.00, 15, '846052199_productbig3.webp', 'fdsa', 'fsda', 'fsa', 'fas', 'fsda', 1),
(18, 14, 'test3', 22.00, 32.00, 20, '938754459_productbig3.webp', 'fsda', 'fdsa', 'fsda', 'fs', 'fsad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `status`) VALUES
(1, 'HP Laptop', '', 1.00, 1),
(2, 'Lenovo Laptop', '', 2.00, 1),
(3, 'Dell Laptop', '', 3.00, 1),
(4, 'Acer Laptop', '', 4.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promo_products`
--

CREATE TABLE `promo_products` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo_products`
--

INSERT INTO `promo_products` (`id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`) VALUES
(15, 11, 'promo1', 23, 32, 15, '711671150_productbig3.webp', 'fdsf', 'fdsaf');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `pid` int(10) NOT NULL,
  `review` varchar(2000) NOT NULL,
  `rate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `pid`, `review`, `rate`) VALUES
(23, 16, 'Amazing', 1),
(24, 16, 'This is product Nice', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(15) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `about` varchar(2000) DEFAULT NULL,
  `added_on` datetime NOT NULL,
  `type` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `location`, `about`, `added_on`, `type`, `password`, `status`, `image`) VALUES
(1, 'ajith herath', 'ajithherath@gmail.com', 704172200, 'colombo', 'colombo', '2022-03-10 07:38:03', 'Plant distributor', '', 'Active now', '222597862_51998032_2239357256339483_8681405657259180032_n.jpg'),
(2, 'waruna pradeep', 'warunapradeep407@gmail.com', 769610260, 'colombo', 'kurunegala', '2022-03-10 07:38:45', 'Garden designer', '', 'Active now', '272651879_IMG-2168.JPG'),
(3, 'nimal ekanayaka', 'nimal@gmail.com', 777123456, 'matara', '', '2022-03-30 08:40:06', 'Customer', '', '', NULL),
(4, 'saman perera', 'saman@gmail.com', 777325693, 'quer', NULL, '2022-04-21 08:56:28', 'Plant distributor', '', 'Active now', NULL),
(5, 'priyanga yapa', 'priyanga@gmail.com', 777325963, NULL, NULL, '2022-04-29 07:16:14', 'Customer', 'e10adc3949ba59abbe56e057f20f883e', 'Active now', NULL),
(6, 'waruna', 'warunahello@gmail.com', 769610260, NULL, NULL, '2022-04-30 06:20:39', 'Garden designer', '6c0995742cf056a58062a4c0f572d669', 'Active now', NULL),
(7, 'kavinda', 'kavinda@gmail.com', 769610260, NULL, NULL, '2022-04-30 11:22:59', 'Landscape architecture', 'e10adc3949ba59abbe56e057f20f883e', 'Active now', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designs`
--
ALTER TABLE `designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_orders`
--
ALTER TABLE `design_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_products`
--
ALTER TABLE `promo_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `designs`
--
ALTER TABLE `designs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `design_orders`
--
ALTER TABLE `design_orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promo_products`
--
ALTER TABLE `promo_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
