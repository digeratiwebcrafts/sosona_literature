-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 08:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sosona_literature`
--

-- --------------------------------------------------------

--
-- Table structure for table `consignee`
--

DROP TABLE IF EXISTS `consignee`;
CREATE TABLE `consignee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `entry_type` varchar(255) NOT NULL COMMENT '1=sosona,2=area,3=group',
  `city` varchar(255) NOT NULL,
  `opening_bal_amt` float(9,2) NOT NULL,
  `as_on_date` date NOT NULL,
  `comments` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consignee`
--

INSERT INTO `consignee` (`id`, `name`, `entry_type`, `city`, `opening_bal_amt`, `as_on_date`, `comments`) VALUES
(1, 'Sosona', 'Region', 'Kolkata', 6000.00, '2023-02-21', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(5, 'Abu', 'Area', 'kolkata', 200000.00, '2023-02-22', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(10, 'Amit', 'Group', 'kolkata', 6000.00, '2023-02-22', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_address_1` varchar(255) NOT NULL,
  `cust_address_2` varchar(255) NOT NULL,
  `cust_state` varchar(255) NOT NULL,
  `cust_country` varchar(255) NOT NULL,
  `cust_pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `cust_name`, `cust_email`, `cust_address_1`, `cust_address_2`, `cust_state`, `cust_country`, `cust_pincode`) VALUES
(1, 'Samir', 'samir@gmail.com', 'Ek Ford Road', 'Sukchar Girja', 'W.B', 'India', 700115),
(4, 'Amit', 'amit@gmail.com', 'BT Road', '', 'West Bengal', 'India', 700120),
(6, 'Sushant', 'sushant@gmail.com', 'sdf', 'refdt', 'West Bengal', 'India', 700115);

-- --------------------------------------------------------

--
-- Table structure for table `customer_accounts`
--

DROP TABLE IF EXISTS `customer_accounts`;
CREATE TABLE `customer_accounts` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `entry_type` int(11) NOT NULL COMMENT '1=opening bal,2=order,3=payment',
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_total` float(9,2) NOT NULL,
  `payment_amt` float(9,2) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_ref_number` varchar(255) NOT NULL,
  `payment_mode` int(11) NOT NULL COMMENT '1=cash deposit,2=bank transfer',
  `opening_bal_amt` float(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lds_share`
--

DROP TABLE IF EXISTS `lds_share`;
CREATE TABLE `lds_share` (
  `id` int(11) NOT NULL,
  `sosona_share_pct` float(9,2) NOT NULL,
  `area_share_pct` float(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lds_share`
--

INSERT INTO `lds_share` (`id`, `sosona_share_pct`, `area_share_pct`) VALUES
(3, 20.00, 6.67);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `naws_order_id` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` float(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_new`
--

DROP TABLE IF EXISTS `order_new`;
CREATE TABLE `order_new` (
  `id` int(11) NOT NULL,
  `consignee_id` int(11) NOT NULL,
  `naws_order_id` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_total` float(9,2) NOT NULL,
  `area_share_amt` float(9,2) NOT NULL,
  `area_billing_amt` float(9,2) NOT NULL,
  `sosona_share_amt` float(9,2) NOT NULL,
  `sosona_billing_amt` float(9,2) NOT NULL,
  `comments` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_new`
--

INSERT INTO `order_new` (`id`, `consignee_id`, `naws_order_id`, `order_date`, `order_total`, `area_share_amt`, `area_billing_amt`, `sosona_share_amt`, `sosona_billing_amt`, `comments`) VALUES
(16, 5, 'order-001', '2023-02-22', 1000.00, 66.70, 933.30, 200.00, 733.30, 'test area');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `payment_by` int(11) NOT NULL COMMENT '1=sosona,2=area,3=group',
  `payment_date` date NOT NULL,
  `payment_amt` float(9,2) NOT NULL,
  `payment_mode` varchar(255) NOT NULL COMMENT '1=cash deposit,2=bank transfer',
  `payment_ref_number` varchar(255) NOT NULL,
  `comments` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_by`, `payment_date`, `payment_amt`, `payment_mode`, `payment_ref_number`, `comments`) VALUES
(4, 5, '2023-02-23', 5000.00, 'Cash Deposit', 'test001', 'test'),
(6, 10, '2023-02-23', 4000.00, 'Bank Transfer', 'test001', ''),
(7, 5, '2023-02-22', 2500.00, 'Bank Transfer', 'test002', ''),
(8, 5, '2023-02-23', 500.00, 'Cash Deposit', 'test001', ''),
(9, 10, '2023-02-24', 5000.00, 'Bank Transfer', 'test002', ''),
(10, 5, '2023-02-24', 5000.00, 'Cash Deposit', 'test002', ''),
(11, 10, '2023-02-23', 500.00, 'Cash Deposit', 'test003', ''),
(12, 5, '2023-02-24', 500.00, 'Cash Deposit', 'test002', ''),
(13, 10, '2023-02-24', 5000.00, 'Bank Transfer', 'test003', ''),
(14, 5, '2023-02-22', 500.00, 'Cash Deposit', 'test002', ''),
(15, 5, '2023-02-23', 5000.00, 'Bank Transfer', 'test004', ''),
(16, 10, '2023-02-24', 5000.00, 'Bank Transfer', 'test004', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_price` float(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `sku`, `product_title`, `category_id`, `product_price`) VALUES
(1, 'ups1', 'Ups', 6, 1200.00),
(3, 'mb1', 'Mother Board', 6, 4599.50),
(4, 'key1', 'Keyboard', 6, 100.00),
(5, 'key2', 'Keyboard', 0, 120.00),
(6, 'asdas', 'afsdf', 0, 0.00),
(7, 'key3', 'Keyboard', 6, 150.00),
(8, 'ups2', 'Ups', 6, 1200.80);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `category_name`) VALUES
(3, 'Watch111'),
(4, 'Mobile'),
(7, 'Mobile 2'),
(8, 'Text book'),
(9, 'Mouse'),
(13, 'Charger');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_type`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'Super Admin', 'amit', 'amit@digeratiwebcrafts.com', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(2, 'Admin', 'abubakr', 'abubakr@digeratiwebcrafts.com', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(3, 'Admin', 'admin', 'anindya@digeratiwebcrafts.com', '5ebe2294ecd0e0f08eab7690d2a6ee69');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consignee`
--
ALTER TABLE `consignee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lds_share`
--
ALTER TABLE `lds_share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_new`
--
ALTER TABLE `order_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consignee`
--
ALTER TABLE `consignee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lds_share`
--
ALTER TABLE `lds_share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_new`
--
ALTER TABLE `order_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
