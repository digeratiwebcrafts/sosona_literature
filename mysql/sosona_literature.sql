-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 02:14 PM
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
(10, 'Amit', 'Group', 'kolkata', 6000.00, '2023-02-22', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(12, 'Avik', 'Area', 'kolkata', 7899.00, '2023-02-13', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(13, 'Joy', 'Area', 'kolkata', 5999.00, '2023-02-24', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(14, 'Sahoo', 'Group', 'Newtown ', 12899.00, '2023-02-22', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(15, 'Suprio', 'Area', 'Salt Lake', 4958.00, '2023-02-13', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(16, 'Rakesh', 'Group', 'Newtown ', 2000.00, '2023-02-09', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(17, 'Afridi', 'Area', 'Newtown ', 7899.00, '2023-02-05', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(18, 'Reyansh', 'Area', 'Bardhaman', 9854.00, '2023-02-03', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(19, 'Darsh', 'Group', 'Malda', 2354.00, '2023-02-25', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(20, 'Viraj', 'Area', 'Haldia', 9854.00, '2023-02-26', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(21, 'Chakdaha', 'Group', 'Purulia', 3245.00, '2023-01-03', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(22, 'Riya', 'Area', 'Bardhaman', 3548.00, '2023-02-06', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(23, 'Aanya', 'Group', 'Ranaghat', 79521.00, '2023-01-10', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(24, 'Advika', 'Area', 'Malda', 3654.00, '2023-02-09', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(25, 'Abhay', 'Group', 'Hooghly', 6245.00, '2023-01-31', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(26, 'Madhav', 'Group', 'Malda', 2146.00, '2023-02-08', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(27, 'Pari', 'Area', 'Siliguri', 5549.00, '2023-01-11', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(28, 'Aarna', 'Area', 'Salt Lake', 3699.00, '2023-01-15', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');

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
(16, 5, 'order-001', '2023-02-22', 1000.00, 66.70, 933.30, 200.00, 733.30, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(17, 10, 'order-002', '2023-02-06', 65788.00, 0.00, 65788.00, 17545.66, 48242.34, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(18, 5, 'order-003', '2022-01-04', 6599.00, 440.15, 6158.85, 1319.80, 4839.05, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(19, 10, 'order-004', '2021-11-24', 6987.00, 0.00, 6987.00, 1863.43, 5123.57, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(20, 12, 'order-005', '2022-06-07', 89752.00, 5986.46, 83765.54, 17950.40, 65815.14, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(21, 12, 'order-006', '2023-02-22', 98722.00, 6584.76, 92137.24, 19744.40, 72392.84, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(22, 12, 'order-007', '2023-02-23', 6522.00, 435.02, 6086.98, 1304.40, 4782.58, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(23, 13, 'order-008', '2022-08-23', 6524.00, 435.15, 6088.85, 1304.80, 4784.05, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(24, 13, 'order-009', '2023-02-07', 2577.00, 171.89, 2405.11, 515.40, 1889.71, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(25, 14, 'order-010', '2023-02-10', 7985.00, 0.00, 7985.00, 2129.60, 5855.40, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(26, 14, 'order-011', '2023-02-15', 4596.00, 0.00, 4596.00, 1225.75, 3370.25, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(27, 14, 'order-012', '2023-02-21', 2699.00, 0.00, 2699.00, 719.82, 1979.18, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(28, 15, 'order-013', '2022-01-13', 2388.00, 159.28, 2228.72, 477.60, 1751.12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(29, 14, 'order-014', '2023-02-02', 6578.00, 0.00, 6578.00, 1754.35, 4823.65, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(30, 16, 'order-015', '2023-02-14', 7869.00, 0.00, 7869.00, 2098.66, 5770.34, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(31, 16, 'order-016', '2023-02-12', 3216.00, 0.00, 3216.00, 857.71, 2358.29, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(32, 17, 'order-017', '2022-01-11', 3265.00, 217.78, 3047.22, 653.00, 2394.22, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(33, 17, 'order-018', '2023-01-16', 3244.00, 216.37, 3027.63, 648.80, 2378.83, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(34, 17, 'order-019', '2023-02-17', 5462.00, 364.32, 5097.68, 1092.40, 4005.28, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(35, 18, 'order-020', '2023-06-13', 3652.00, 243.59, 3408.41, 730.40, 2678.01, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(36, 18, 'order-021', '2023-02-10', 3542.00, 236.25, 3305.75, 708.40, 2597.35, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(37, 19, 'order-022', '2022-12-20', 5211.00, 0.00, 5211.00, 1389.77, 3821.23, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(38, 19, 'order-023', '2023-01-04', 7895.00, 0.00, 7895.00, 2105.60, 5789.40, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(39, 20, 'order-024', '2023-02-07', 3256.00, 217.18, 3038.82, 651.20, 2387.62, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(40, 21, 'order-025', '2023-01-30', 3621.00, 0.00, 3621.00, 965.72, 2655.28, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(41, 20, 'order-026', '2023-02-17', 6999.00, 466.83, 6532.17, 1399.80, 5132.37, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(42, 21, 'order-027', '2022-12-27', 5099.00, 0.00, 5099.00, 1359.90, 3739.10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(43, 22, 'order-028', '2022-08-19', 5846.00, 389.93, 5456.07, 1169.20, 4286.87, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(44, 22, 'order-029', '2023-02-09', 2563.00, 170.95, 2392.05, 512.60, 1879.45, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(45, 23, 'order-030', '2023-02-01', 5477.00, 0.00, 5477.00, 1460.72, 4016.28, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(46, 23, 'order-031', '2023-02-06', 3698.00, 0.00, 3698.00, 986.26, 2711.74, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(47, 24, 'order-032', '2021-10-13', 5999.00, 400.13, 5598.87, 1199.80, 4399.07, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(48, 24, 'order-033', '2023-02-01', 5644.00, 376.45, 5267.55, 1128.80, 4138.75, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(49, 25, 'order-034', '2023-01-31', 2574.00, 0.00, 2574.00, 686.49, 1887.51, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(50, 25, 'order-035', '2022-06-13', 6533.00, 0.00, 6533.00, 1742.35, 4790.65, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(51, 26, 'order-036', '2022-09-07', 4651.00, 0.00, 4651.00, 1240.42, 3410.58, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(52, 25, 'order-036', '2023-02-14', 2360.00, 0.00, 2360.00, 629.41, 1730.59, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(53, 26, 'order-037', '2023-02-12', 10799.00, 0.00, 10799.00, 2880.09, 7918.91, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(54, 26, 'order-039', '2023-02-13', 63204.00, 0.00, 63204.00, 16856.51, 46347.49, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(55, 27, 'order-040', '2022-10-12', 45987.00, 3067.33, 42919.67, 9197.40, 33722.27, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(56, 27, 'order-041', '2023-01-31', 99985.00, 6669.00, 93316.00, 19997.00, 73319.00, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(57, 28, 'order-042', '2023-02-06', 23651.00, 1577.52, 22073.48, 4730.20, 17343.28, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(58, 28, 'order-042', '2021-12-16', 6523.00, 435.08, 6087.92, 1304.60, 4783.32, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(59, 28, 'order-043', '2023-02-07', 4178.00, 278.67, 3899.33, 835.60, 3063.73, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(60, 13, 'order-045', '2023-02-10', 6524.00, 435.15, 6088.85, 1304.80, 4784.05, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(61, 20, 'order-046', '2023-02-21', 36521.00, 2435.95, 34085.05, 7304.20, 26780.85, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(62, 27, 'order-047', '2023-02-12', 6352.00, 423.68, 5928.32, 1270.40, 4657.92, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(63, 15, 'order-048', '2023-02-16', 6322.00, 421.68, 5900.32, 1264.40, 4635.92, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(64, 16, 'order-049', '2023-02-06', 6523.00, 0.00, 6523.00, 1739.68, 4783.32, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(65, 22, 'order-050', '2023-02-23', 6523.00, 435.08, 6087.92, 1304.60, 4783.32, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');

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
(17, 5, '2023-02-07', 4299.00, 'Cash Deposit', 'cash-05-01', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(18, 5, '2023-02-21', 2524.00, 'Bank Transfer', 'bank-05-02', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(19, 10, '2023-02-14', 6952.00, 'Cash Deposit', 'cash-002', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(20, 12, '2023-02-15', 89746.00, 'Cash Deposit', 'payment-001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(21, 14, '2023-01-31', 7965.00, 'Cash Deposit', 'payment-002', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(22, 14, '2023-02-22', 2699.00, 'Cash Deposit', 'payment-003', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(23, 15, '2023-02-20', 3788.00, 'Bank Transfer', 'payment-005', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(24, 15, '2023-02-20', 4299.00, 'Cash Deposit', 'payment-007', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(25, 17, '2023-02-21', 6492.00, 'Bank Transfer', 'test008', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(26, 16, '2023-02-21', 3652.00, 'Bank Transfer', 'payment-008', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(27, 18, '2023-01-30', 36521.00, 'Bank Transfer', 'test009', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(28, 27, '2023-02-14', 4299.00, 'Bank Transfer', 'payment-010', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(29, 28, '2023-02-08', 78965.00, 'Bank Transfer', 'payment-0011', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(30, 19, '2023-02-22', 6542.00, 'Bank Transfer', 'test012', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
