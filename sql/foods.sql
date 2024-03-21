-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 03:53 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foods`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL COMMENT 'คีย์หลัก pk',
  `shop_id` int(11) NOT NULL COMMENT 'คีย์นอกอ้างถึง shop',
  `food_id` int(11) NOT NULL COMMENT 'คีย์นอก fk อ้างภึง food',
  `uid` int(11) NOT NULL COMMENT 'คีย์นอก fk อ้างถึง users',
  `foodname` varchar(255) NOT NULL COMMENT 'ชื่อรายการอาหาร',
  `qty` int(11) NOT NULL COMMENT 'จำนวน',
  `price` varchar(12) NOT NULL COMMENT 'ราคา',
  `t_price` int(11) NOT NULL COMMENT 'ราคารวม',
  `discount` int(11) NOT NULL COMMENT 'ส่วนลด',
  `t_discount` int(11) NOT NULL COMMENT 'รวมส่วนลด',
  `total_price` varchar(20) NOT NULL COMMENT 'ราคาหักส่วนลด',
  `foodimg` varchar(255) NOT NULL COMMENT 'รูปภาพอาหาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `ftype_id` int(11) NOT NULL COMMENT 'คีย์นอกอ้างถึง food_type',
  `food_name` varchar(255) NOT NULL COMMENT 'ชื่ออาหาร',
  `price` int(11) NOT NULL COMMENT 'ราคา',
  `discount` int(11) NOT NULL COMMENT 'ส่วนลด',
  `foodimg` varchar(255) NOT NULL COMMENT 'รุปภาพอาหาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE `food_type` (
  `ftype_id` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `shop_id` int(11) NOT NULL COMMENT 'คีย์นอกอ้างถึง shop',
  `ftype_name` varchar(255) NOT NULL COMMENT 'ชื่อประเภทอาหาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `user_id` int(11) DEFAULT NULL COMMENT 'คีย์นอก fk อ้างถึง user ผู้สั่ง',
  `ordate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่สั่งอาหาร',
  `price_total` int(11) DEFAULT NULL COMMENT 'ราคารวมทั้งสิ้น'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `orid` int(11) NOT NULL COMMENT 'คีย์หลัก pk',
  `shop_id` int(11) NOT NULL COMMENT 'คีย์นอกอ้างถึง shop',
  `order_id` int(11) NOT NULL COMMENT 'คีย์นอก อ้างถึง orders',
  `food_id` int(11) DEFAULT NULL COMMENT 'คีย์นอก fk อ้างถึง food',
  `sen_uid` int(11) DEFAULT 0 COMMENT 'คีย์นอก อ้างถึง ผู้ส่ง users',
  `qty` varchar(10) NOT NULL COMMENT 'จำนวน',
  `price` int(11) DEFAULT NULL COMMENT 'ราคารวม',
  `discount` int(11) NOT NULL COMMENT 'ส่วนลด',
  `sen_status` enum('ยังไม่ส่ง','ส่งเรียบร้อย') NOT NULL COMMENT 'สถานะการส่ง',
  `pay_status` enum('ยังไม่ชำระเงิน','ชำระเงิน') NOT NULL COMMENT 'สถานะการชำระเงิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rwid` tinyint(4) NOT NULL COMMENT 'คีย์หลัก',
  `food_id` int(11) NOT NULL COMMENT 'คีย์นอกอ้างถึง food',
  `uid` int(11) NOT NULL COMMENT 'คีย์นอกอ้างถึง  users',
  `comment` varchar(300) NOT NULL COMMENT 'ข้อความรีวิว'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `shtype_id` int(11) DEFAULT NULL COMMENT 'คีย์นอกอ้างถึง shop_type',
  `uid` int(11) DEFAULT NULL COMMENT 'คีย์นอกอ้างถึง users',
  `shop_name` varchar(300) DEFAULT NULL COMMENT 'ชื่อร้านอาหาร',
  `shop_address` varchar(250) DEFAULT NULL COMMENT 'ที่อยู้ร้านอาหาร',
  `shop_phone` varchar(21) DEFAULT NULL COMMENT 'เบอร์โทรร้าน',
  `approve` enum('ไม่อนุมัติ','อนุมัติ') DEFAULT 'ไม่อนุมัติ' COMMENT 'สถานะการอนุมัติ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shop_type`
--

CREATE TABLE `shop_type` (
  `shtype_id` int(11) NOT NULL COMMENT 'คย์หลัก',
  `shtype_name` varchar(100) NOT NULL COMMENT 'ชื่อประเภทร้านอาหาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `fname` varchar(40) DEFAULT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `lname` varchar(40) DEFAULT NULL COMMENT 'สกุลผู้ใช้งาน',
  `username` varchar(40) DEFAULT NULL COMMENT 'ชื่อ username',
  `passwd` varchar(40) DEFAULT NULL COMMENT 'รหัสผ่าน',
  `email` varchar(35) DEFAULT NULL COMMENT 'อีเมล',
  `address` varchar(300) DEFAULT NULL COMMENT 'ที่อยู่',
  `phone` varchar(12) DEFAULT NULL COMMENT 'เบอร์โทร',
  `status` enum('ไม่อนุมัติ','อนุมัติ') NOT NULL COMMENT 'สถานะการอนุมัติใช้งาน',
  `userimg` varchar(255) DEFAULT NULL COMMENT 'รูปภาพผู้ใช้งาน',
  `role` enum('ผู้ดูแลระบบ','ผู้ดูแลร้านอาหาร','ลูกค้าหรือสมาชิก','ผู้ส่งอาหาร') DEFAULT NULL COMMENT 'ประเภทผู้ใช้งานระบบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `username`, `passwd`, `email`, `address`, `phone`, `status`, `userimg`, `role`) VALUES
(1, 'สมชาย', 'ระบบ', 'admin', '1234', 'admin@localhost', 'วิทยาลัยการอาชีพนวมินทราชินีมุกดาาหาร', '042612965', 'อนุมัติ', '../images/dd68f68a905d907ad314441ee7824f64.jpg', 'ผู้ดูแลระบบ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `ftype_id` (`ftype_id`);

--
-- Indexes for table `food_type`
--
ALTER TABLE `food_type`
  ADD PRIMARY KEY (`ftype_id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`orid`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `sen_uid` (`sen_uid`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rwid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`),
  ADD KEY `shtype_id` (`shtype_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `shop_type`
--
ALTER TABLE `shop_type`
  ADD PRIMARY KEY (`shtype_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก pk';

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก';

--
-- AUTO_INCREMENT for table `food_type`
--
ALTER TABLE `food_type`
  MODIFY `ftype_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก';

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก';

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `orid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก pk';

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `rwid` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก';

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก';

--
-- AUTO_INCREMENT for table `shop_type`
--
ALTER TABLE `shop_type`
  MODIFY `shtype_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คย์หลัก';

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
