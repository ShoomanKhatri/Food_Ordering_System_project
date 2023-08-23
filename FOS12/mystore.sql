-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 09:19 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'suman', 'suman@gmail.com', '$2y$10$7ogbSa4WFNlylWneMcdBZOzrt7nFtxDyfjwEB8Qy260wyDufkcYr6'),
(9, '1', '1@123', '$2y$10$L/YBUY36F/dRMI9c8.UP5.gNgx2mPhSKqrnEg9rQlYyDBSgyCFz4W');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Nestle'),
(2, 'E Khaja'),
(3, 'COCA COLA'),
(4, 'Pepsi'),
(5, 'Cadbury');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(2, 'Cookies 1'),
(3, 'Beverages1'),
(5, 'Milk prdoucts'),
(6, 'veg'),
(7, 'Non Veg'),
(8, 'Momos'),
(9, 'Pizza'),
(10, 'drinks'),
(11, 'Briyani');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `user_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `user_status`) VALUES
(1, 4, 1504838585, 2, 1, 'pending'),
(2, 4, 961276309, 2, 1, 'pending'),
(3, 4, 834004794, 2, 1, 'pending'),
(4, 4, 389638531, 2, 1, 'pending'),
(5, 4, 2064264935, 3, 1, 'pending'),
(6, 4, 432918979, 4, 5, 'pending'),
(7, 4, 477841757, 2, 5, 'pending'),
(8, 4, 1189757132, 4, 1, 'pending'),
(9, 4, 167607398, 3, 5, 'pending'),
(10, 4, 1669298622, 8, 1, 'pending'),
(11, 4, 1343564800, 9, 1, 'pending'),
(12, 4, 1808921034, 5, 5, 'pending'),
(13, 4, 630669309, 8, 1, 'pending'),
(14, 4, 463007958, 7, 5, 'pending'),
(15, 4, 1784640122, 5, 5, 'pending'),
(16, 4, 488718093, 7, 1, 'pending'),
(17, 4, 1170831439, 3, 5, 'pending'),
(18, 4, 1400854362, 9, 1, 'pending'),
(19, 4, 2028303047, 7, 1, 'pending'),
(20, 4, 572299198, 10, 5, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(3, 'C Momo', 'One bite of momos will attract you.', 'momos c momo spicy', 8, 2, 'cmomo.webp', 'cmomo1.jpg', 'cmomo2.jpg', '400', '2023-08-06 12:56:01', 'true'),
(4, 'Pizza', 'Good for taste.', 'pizza tasty', 9, 2, 'pizzar.jpg', 'pizza5.jpg', 'pizza 9.jpg', '500', '2023-08-01 03:28:29', 'true'),
(5, 'Hyderabadi Briyani', 'The perfect blend of tradition, culture, and taste.', 'briyani hyderabadi', 11, 2, 'briyani2.jpg', 'briyani1.jpg', 'briyani.jpg', '500', '2023-08-05 10:11:15', 'true'),
(6, 'coke', 'Open happiness with a bottle of Coke.', 'coke coca cola', 10, 3, 'cocacola.webp', 'cocacola1.webp', 'cocacola.webp', '100', '2023-08-05 10:12:55', 'true'),
(7, 'Jhol Momo', 'In a world full of flavors, momos are a delightful surprise.', 'momo jhol momos', 8, 2, 'jholmomo2.png', 'jholmomo.jpg', 'jholmomo1.jpg', '120', '2023-08-05 10:15:32', 'true'),
(8, 'Fried Momo', 'Love at first bite.', 'fried momo momos ', 8, 2, 'friedmomo1.jpg', 'friedmomo.jpg', 'fried momo2.jpg', '120', '2023-08-05 10:18:52', 'true'),
(9, 'Momo', 'Life is better with momos and a side of spicy dipping sauce.', 'momo momos', 8, 2, 'Normalmomo.jpg', 'Normal momo1.jpg', 'momo2.webp', '150', '2023-08-05 10:21:24', 'true'),
(10, 'Burger', 'A balanced diet is a burger in each hand.', 'burger', 6, 1, 'burger.jpg', 'menu-burger.jpg', 'burger.jpg', '120', '2023-08-19 04:14:32', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(8, 4, 0, 591456058, 0, '2023-08-06 01:05:50', 'Complete'),
(10, 4, 1500, 167607398, 1, '2023-08-09 02:04:18', 'Complete'),
(11, 4, 620, 1669298622, 2, '2023-08-09 15:32:41', 'Complete'),
(12, 4, 150, 1343564800, 1, '2023-08-09 15:34:24', 'Complete'),
(13, 4, 2500, 1808921034, 1, '2023-08-09 16:51:47', 'Complete'),
(14, 4, 120, 630669309, 1, '2023-08-09 16:52:13', 'Complete'),
(15, 4, 2600, 463007958, 2, '2023-08-16 00:56:28', 'Complete'),
(16, 4, 2500, 1784640122, 1, '2023-08-15 09:25:50', 'pending'),
(17, 4, 1020, 488718093, 3, '2023-08-16 01:09:38', 'Complete'),
(18, 4, 2000, 1170831439, 1, '2023-08-16 02:27:58', 'pending'),
(19, 4, 270, 1400854362, 2, '2023-08-20 02:01:58', 'pending'),
(20, 4, 120, 2028303047, 1, '2023-08-20 02:03:30', 'pending'),
(21, 4, 600, 572299198, 1, '2023-08-20 02:05:07', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(11, 8, 591456058, 50, 'Cash on Delivery', '2023-08-06 01:05:50'),
(12, 10, 167607398, 1500, 'Pay Offline', '2023-08-09 02:04:18'),
(13, 11, 1669298622, 620, 'Pay Offline', '2023-08-09 15:32:41'),
(14, 12, 1343564800, 150, 'Cash on Delivery', '2023-08-09 15:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(60) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(4, 'suman', 'shoomankhatri@gmail.com', '$2y$10$ghhWnnESivpaEvlcby9KP.b6LM8hRua7Hk1BJP7YCQm82GsTkwQIS', 'IMG_20221031_161334_1.jpg', '::1', 'Gulmi', '981156781'),
(15, 'shooman', 'suman@1.com', '$2y$10$buNLXNGudAHlod3oJzSCT.wspIBKSex27D.7xz6N/wJjFyvlPCjHm', '', '::1', '123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
