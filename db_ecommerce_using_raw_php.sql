-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 04:04 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce_using_raw_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Abc', 'abc@mail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(3) NOT NULL,
  `product_id` int(6) NOT NULL,
  `session_id` varchar(150) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_image` text NOT NULL,
  `product_quantity` int(4) NOT NULL,
  `product_price` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `category_description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `deletion_status`) VALUES
(2, 'Mens Wear', 'Exclusive mens wear.<br>', 1, 1),
(3, 'Womens Wear', 'Exclusive womens wear.<br>', 1, 1),
(4, 'Babies Dress', 'Exclusive babies dresses.<br>', 1, 1),
(5, 'Electronics', 'Electronics products.<br>', 1, 1),
(6, 'TV and Home Appliance', 'TV and Home Appliance products.<br>', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(8) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `first_name`, `last_name`, `email`, `password`, `address`, `phone_number`, `city`, `country`) VALUES
(1, 'Md', 'Rahim', 'md.rarim@mail.com', 'a8f628cdaf5573e013679839c0c5e86b', 'dsfadsfads', '5165165', 'fsdfa', 'Bangladesh'),
(2, 'aa', 'dd', 'md.karim@mail.com', 'a8f628cdaf5573e013679839c0c5e86b', 'dsfsdafsd sdfsda f sad f sd', '123456', 'dsfsdafdsf', 'Bangladesh'),
(3, 'Mehedi', 'Hasan', 'mehedi.hasan@mail.com', 'a8f628cdaf5573e013679839c0c5e86b', '1/1, New road, New city. ', '12345678910', 'New city', 'Bangladesh'),
(4, 'Mehedi', 'Hasan', 'mehedi.hasan@mail.com', 'a8f628cdaf5573e013679839c0c5e86b', 'fdsaf sdaf asdf sadf ', '51615', 'fdsfa', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(6) NOT NULL,
  `customer_id` int(8) NOT NULL,
  `shipping_id` int(6) NOT NULL,
  `order_total` float(8,2) NOT NULL,
  `order_status` varchar(25) NOT NULL DEFAULT 'Pending',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `order_total`, `order_status`, `order_date`) VALUES
(1, 2, 1, 1575.00, 'Pending', '2021-05-26 16:59:23'),
(2, 3, 2, 105000.00, 'Pending', '2021-05-28 15:33:53'),
(3, 4, 3, 1575.00, 'Pending', '2021-05-28 15:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(6) NOT NULL,
  `order_id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`) VALUES
(1, 1, 5, 'formal shirt for men', 1500.00, 1),
(2, 2, 19, 'Television', 50000.00, 2),
(3, 3, 5, 'formal shirt for men', 1500.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(6) NOT NULL,
  `order_id` int(6) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `payment_status` varchar(12) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `order_id`, `payment_type`, `payment_status`, `payment_date`) VALUES
(1, 1, 'cash_on_delivery', '', '2021-05-26 16:59:23'),
(2, 2, 'cash_on_delivery', '', '2021-05-28 15:33:53'),
(3, 3, 'cash_on_delivery', '', '2021-05-28 15:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(6) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category_id` int(3) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_quantity` int(4) NOT NULL,
  `product_sku` varchar(50) NOT NULL,
  `product_short_description` text NOT NULL,
  `product_long_description` text NOT NULL,
  `product_image` text NOT NULL,
  `product_publication_status` tinyint(1) NOT NULL,
  `product_deletion_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `product_price`, `product_quantity`, `product_sku`, `product_short_description`, `product_long_description`, `product_image`, `product_publication_status`, `product_deletion_status`) VALUES
(4, 'Baby dress 1', 4, 750.00, 5, '2', 'Nice baby dress.<br>', 'This product comes from Dress Shop. This is a very reputed shop. Nice baby dress. This product comes from Dress Shop. This is a very reputed shop. Nice baby dress.This product comes from Dress Shop. This is a very reputed shop. Nice baby dress.This product comes from Dress Shop. This is a very reputed shop. Nice baby dress.This product comes from Dress Shop. This is a very reputed shop. Nice baby dress.This product comes from Dress Shop. This is a very reputed shop. Nice baby dress.', '../images/product_images/Baby dress.jpg', 1, 1),
(5, 'formal shirt for men', 2, 1500.00, 4, '1', 'Formal shirt for men.<br>', 'Nice and exclusive formal shirt for men. Nice and exclusive formal shirt for men.Nice and exclusive formal shirt for men.Nice and exclusive formal shirt for men.Nice and exclusive formal shirt for men.Nice and exclusive formal shirt for men.Nice and exclusive formal shirt for men.Nice and exclusive formal shirt for men.Nice and exclusive formal shirt for men.Nice and exclusive formal shirt for men.<br>', '../images/product_images/White Men formal shirt.jpg', 1, 1),
(7, 'Mens Shirt 2', 2, 2000.00, 6, '2', 'This shirt comes from Dress Shop.<br>', 'Formal shirt for men. This shirt comes from Dress Shop. Formal shirt for men. This shirt comes from Dress Shop. Formal shirt for men. This shirt comes from Dress Shop. Formal shirt for men. This shirt comes from Dress Shop. Formal shirt for men. This shirt comes from Dress Shop. Formal shirt for men. This shirt comes from Dress Shop. Formal shirt for men. This shirt comes from Dress Shop.  ', '../images/product_images/formal shirt for men.jpg', 1, 1),
(8, 'Baby dress 2', 4, 550.00, 4, '1', 'This Baby comes from Epic Design.<br>', 'Nice baby dress. This Baby comes from Epic Design. Nice baby dress. This Baby comes from Epic Design.Nice baby dress. This Baby comes from Epic Design.Nice baby dress. This Baby comes from Epic Design.Nice baby dress. This Baby comes from Epic Design.Nice baby dress. This Baby comes from Epic Design.Nice baby dress. This Baby comes from Epic Design.', '../images/product_images/Baby dress 2.jpg', 1, 1),
(9, 'Baby dress 3', 4, 600.00, 5, '2', 'Nice Baby dress.<br>', 'This baby dress comes from Epic Design. This is a very nice Baby dress. This baby dress comes from Epic Design. This is a very nice Baby dress.This baby dress comes from Epic Design. This is a very nice Baby dress.This baby dress comes from Epic Design. This is a very nice Baby dress.This baby dress comes from Epic Design. This is a very nice Baby dress.This baby dress comes from Epic Design. This is a very nice Baby dress.', '../images/product_images/Baby dress 4.jpg', 1, 1),
(11, 'Mens tshirt', 2, 3000.00, 6, '2', 'Exclusive tshirt for men. <br>', 'Dress from Epic Design. Exclusive tshirt for men. Dress from Epic Design. Exclusive tshirt for men. Dress from Epic Design. Exclusive tshirt for men. Dress from Epic Design. Exclusive tshirt for men. Dress from Epic Design. Exclusive tshirt for men. Dress from Epic Design. Exclusive tshirt for men. Dress from Epic Design. Exclusive tshirt for men. Dress from Epic Design. Exclusive tshirt for men.  ', '../images/product_images/men t shirt.jpg', 1, 1),
(12, 'Tshirt for men', 2, 700.00, 7, '2', 'Nice and exclusive mens tshirt.<br>', 'Nice and exclusive mens tshirt. This tshirt comes from Dress Shop. Nice and exclusive mens tshirt. This tshirt comes from Dress Shop.Nice and exclusive mens tshirt. This tshirt comes from Dress Shop.Nice and exclusive mens tshirt. This tshirt comes from Dress Shop.Nice and exclusive mens tshirt. This tshirt comes from Dress Shop.Nice and exclusive mens tshirt. This tshirt comes from Dress Shop.', '../images/product_images/T shirt for men.jpg', 1, 1),
(13, 'Baby dress 4', 4, 550.00, 4, '1', 'Baby dress from Epic Design.<br>', 'This is an exclusive baby dress. And baby dress comes from Epic Design. This is an exclusive baby dress. And baby dress comes from Epic Design.This is an exclusive baby dress. And baby dress comes from Epic Design.This is an exclusive baby dress. And baby dress comes from Epic Design.This is an exclusive baby dress. And baby dress comes from Epic Design.This is an exclusive baby dress. And baby dress comes from Epic Design.This is an exclusive baby dress. And baby dress comes from Epic Design.', '../images/product_images/Baby dress 3.jpg', 1, 1),
(15, 'Womens Sharee', 3, 2000.00, 4, '1', 'This womens Sharee comes from Dress Shop.<br>', 'Exclusive Shree. This womens Sharee comes from Dress Shop.', '../images/product_images/Womens exclusive sharee.jpg', 1, 1),
(16, 'Womens Shree 2', 3, 2500.00, 4, '1', 'Exclusive designed shree for women.<br>', 'This exclusive shree comes from Dress Shop. Exclusive designed shree for women. This exclusive shree comes from Dress Shop. Exclusive designed shree for women.This exclusive shree comes from Dress Shop. Exclusive designed shree for women.This exclusive shree comes from Dress Shop. Exclusive designed shree for women.This exclusive shree comes from Dress Shop. Exclusive designed shree for women.', '../images/product_images/Womens sharee.jpg', 1, 1),
(17, 'Smartphone 1', 5, 30000.00, 5, '1', 'This is a new model smartphone.<br>', 'New Smart phone from New Electronics shop. This is a new model smartphone. New Smart phone from New Electronics shop. This is a new model smartphone.New Smart phone from New Electronics shop. This is a new model smartphone.New Smart phone from New Electronics shop. This is a new model smartphone.New Smart phone from New Electronics shop. This is a new model smartphone.', '../images/product_images/Mobile 2.jpg', 1, 1),
(18, 'Laptop', 5, 45000.00, 7, '2', 'Laptop from from New Electronics.<br>', 'This is a new model laptop. Laptop from from New Electronics. his is a new model laptop. Laptop from from New Electronics.his is a new model laptop. Laptop from from New Electronics.his is a new model laptop. Laptop from from New Electronics.his is a new model laptop. Laptop from from New Electronics.his is a new model laptop. Laptop from from New Electronics.his is a new model laptop. Laptop from from New Electronics.', '../images/product_images/Laptop.jpg', 1, 1),
(19, 'Television', 6, 50000.00, 6, '1', 'This is a new model TV.<br>', 'This TV is from New Electronics. This is a new model TV. This TV is from New Electronics. This is a new model TV.This TV is from New Electronics. This is a new model TV.This TV is from New Electronics. This is a new model TV.This TV is from New Electronics. This is a new model TV.This TV is from New Electronics. This is a new model TV.', '../images/product_images/Television.jpg', 1, 1),
(20, 'Microwave Oven', 6, 25000.00, 5, '1', 'This microwave oven comes from Home Appliance shop.<br>', 'Microwave oven. This microwave oven comes from Home Appliance shop. Microwave oven. This microwave oven comes from Home Appliance shop.Microwave oven. This microwave oven comes from Home Appliance shop.Microwave oven. This microwave oven comes from Home Appliance shop.Microwave oven. This microwave oven comes from Home Appliance shop.Microwave oven. This microwave oven comes from Home Appliance shop.', '../images/product_images/Oven.jpg', 1, 1),
(21, 'Blender', 6, 3000.00, 4, '1', 'New model blender.<br>', 'This oven comes from Home Appliance shop. New model blender. This oven comes from Home Appliance shop. New model blender.This oven comes from Home Appliance shop. New model blender.This oven comes from Home Appliance shop. New model blender.This oven comes from Home Appliance shop. New model blender.This oven comes from Home Appliance shop. New model blender.<br>', '../images/product_images/Blender.jpg', 1, 1),
(24, 'Smartphone 2', 5, 20000.00, 5, '1', 'This is a new model smartphone from New Electronics.<br>', 'This is a new model smartphone from New Electronics. This is a new model smartphone from New Electronics.This is a new model smartphone from New Electronics.This is a new model smartphone from New Electronics.This is a new model smartphone from New Electronics.', '../images/product_images/Mobile 1.jpg', 1, 1),
(26, 'Womens Sharee 4', 3, 3000.00, 4, '1', 'Exclusive and nice sharee.<br>', 'This sharee comes from Dress Shop. This is an exclusive and nice sharee. This sharee comes from Dress Shop. This is an exclusive and nice sharee.This sharee comes from Dress Shop. This is an exclusive and nice sharee.This sharee comes from Dress Shop. This is an exclusive and nice sharee.', '../images/product_images/Womens Sharee 2.jpg', 1, 1),
(27, 'Women dress', 3, 3000.00, 5, '1', 'Exclusive dress.<br>', 'This is an exclusive and nice dress. This dress comes from Epic Design. This is an exclusive and nice dress. This dress comes from Epic Design.This is an exclusive and nice dress. This dress comes from Epic Design.This is an exclusive and nice dress. This dress comes from Epic Design.', '../images/product_images/Womens dress.jpg', 1, 1),
(28, 'Women dress 2', 3, 2000.00, 4, '1', 'This dress is from Epic Design shop.<br>', 'Nice and exclusive women dress. This dress is from Epic Design shop. Nice and exclusive women dress. This dress is from Epic Design shop.Nice and exclusive women dress. This dress is from Epic Design shop.Nice and exclusive women dress. This dress is from Epic Design shop.', '../images/product_images/Womesns dress 2.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(6) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `shipping_address` text NOT NULL,
  `receiver_phone_no` varchar(16) NOT NULL,
  `shipping_city` varchar(50) NOT NULL,
  `shipping_country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `receiver_name`, `email`, `shipping_address`, `receiver_phone_no`, `shipping_city`, `shipping_country`) VALUES
(1, 'dsfdsaf dsf sdf', 'md.karim@mail.com', 'dsafsdf sdf asdf ', '316515', 'sdfsad ffd', 'Bangladesh'),
(2, 'Mehedi Hasan', 'mehedi.hasan@mail.com', '1/1, New road, New city.', '123456789', 'New city', 'Bangladesh'),
(3, 'sdfsd', 'mehedi.hasan@mail.com', 'dasfsdf', '51651', 'dfasdf', 'Bangladesh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
