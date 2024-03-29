-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2023 at 11:22 PM
-- Server version: 5.7.44-cll-lve
-- PHP Version: 8.1.16

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
(1, 'Sosona', 'Region', 'Kolkata', 546670.00, '2022-11-23', 'Closing report of Sibashis at the end of sikkim table 2022'),
(29, 'Delhi', 'Area', 'Delhi', 101279.00, '2022-11-23', ''),
(30, 'Mumbai ', 'Area', 'Mumbai', 217076.00, '2022-11-23', ''),
(31, 'Hyderabad ', 'Group', 'Twin cities ', 38212.00, '2022-11-23', ''),
(32, 'South Mumbai ', 'Area', '', 35443.00, '2022-11-23', ''),
(33, 'Kolkata ', 'Area', '', 149489.00, '2022-11-23', ''),
(34, 'Darjeeling ', 'Area', '', 100389.00, '2022-11-23', ''),
(35, 'Punjab ', 'Area', '', 200582.00, '2022-11-23', ''),
(36, 'Sikkim ', 'Area', '', 72961.00, '2022-11-23', ''),
(37, 'Chandigarh ', 'Area', '', 50607.00, '2022-11-23', ''),
(38, 'Odhisa', 'Area', '', -4283.00, '2022-11-23', ''),
(39, 'Bangalore ', 'Area', '', 19487.00, '2022-11-23', ''),
(40, 'Pune', 'Area', '', 0.00, '2022-11-23', ''),
(41, 'Jammu', 'Area', '', 12005.00, '2022-11-23', ''),
(42, 'Bengal', 'Area', '', 101155.00, '2022-11-23', ''),
(43, 'Dehradun 1', 'Group', '', -149.00, '2022-11-23', ''),
(44, 'Shimla', 'Group', '', 10509.00, '2022-11-23', ''),
(45, 'Balasore ', 'Group', '', 14700.00, '2022-11-23', ''),
(46, 'Bhubaneswar ', 'Group', '', 13320.00, '2022-11-23', ''),
(47, 'Goa', 'Group', '', 2240.00, '2022-11-23', ''),
(48, 'Indore', 'Group', '', 29326.00, '2022-11-23', ''),
(49, 'SS (Mumbai)', 'Group', '', 2147.00, '2022-11-23', ''),
(50, 'Dehradun 2', 'Group', '', 454.00, '2022-11-23', ''),
(51, 'Jharkhand ', 'Group', '', 215.00, '2022-11-23', ''),
(52, 'Tamil Nadu ', 'Area', '', 190258.00, '2022-11-23', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

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
(66, 31, 'order-0011233', '2022-12-15', 4400.00, 0.00, 4400.00, 1173.48, 3226.52, 'dfgh'),
(68, 29, 'order-002', '2023-01-18', 215980.00, 14405.87, 201574.12, 43196.00, 158378.12, 'gjgjjk'),
(69, 33, '', '2023-01-23', 17080.00, 1139.24, 15940.76, 3416.00, 12524.76, ''),
(70, 34, '', '2023-01-16', 23740.00, 1583.46, 22156.54, 4748.00, 17408.54, ''),
(71, 38, '', '2023-01-16', 61320.00, 4090.04, 57229.96, 12264.00, 44965.96, ''),
(73, 52, '', '2023-01-16', 7420.00, 494.91, 6925.09, 1484.00, 5441.09, ''),
(74, 33, 'order-008', '2023-03-09', 6524.36, 435.18, 6089.19, 1304.87, 4784.32, ''),
(75, 33, 'order-009', '2023-05-05', 78965.02, 5266.97, 73698.05, 15793.00, 57905.05, 'rgfffg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

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
(31, 29, '2022-12-01', 101279.00, 'Bank Transfer', '', ''),
(32, 1, '2023-03-01', 330000.00, 'Bank Transfer', '', ''),
(33, 30, '2023-02-01', 52690.00, 'Bank Transfer', '', ''),
(34, 33, '2022-03-21', 100000.00, 'Cash Deposit', '', ''),
(35, 35, '2022-11-21', 30000.00, 'Cash Deposit', '', ''),
(36, 39, '2022-11-21', 49729.00, 'Bank Transfer', '', ''),
(37, 33, '2023-03-19', 50000.00, 'Cash Deposit', '', ''),
(38, 36, '2023-03-01', 72961.00, 'Bank Transfer', '', ''),
(39, 1, '2023-06-15', 5000.00, 'Bank Transfer', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

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
(3, 'Admin', 'admin', 'anindya@digeratiwebcrafts.com', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(4, 'Admin', 'treasurer', 'treasurer@naindia.in', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(5, 'Admin', 'treasurer', 'treasurer@naindia.in', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(6, 'Member', 'member', 'member@naindia.in', '25f9e794323b453885f5181f1b624d0b');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
