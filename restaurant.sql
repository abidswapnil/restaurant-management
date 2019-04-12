-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2019 at 05:47 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` text,
  `image` varchar(355) DEFAULT NULL,
  `phone` bigint(9) DEFAULT NULL,
  `about` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `gender`, `image`, `phone`, `about`) VALUES
(89, 'admin', 'admin@admin.com', '123202cb962ac59075b964b07152d234b7040bd001563085fc35165329ea1ff5c5ecbdbbeef', 'male', 'raba.jpg 5c8222440b9932.88418066.jpg', 3895935893, 'About admin.');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `table_number` int(11) NOT NULL,
  `arrival time` time NOT NULL,
  `advance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(355) NOT NULL,
  `image` varchar(355) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`, `image`) VALUES
(83, 'burger', 'burger.jpg'),
(84, 'pasta', 'chowmeing.jpg'),
(85, 'nachos', 'spaghetti.jpg'),
(86, 'beverage', 'dew.jpg'),
(87, 'rice', 'chicken rice.jpg'),
(88, 'noodles', 'noodles.jpeg'),
(89, 'pizza', 'pizza.jpg'),
(90, 'salad', 'salad.jpg'),
(91, 'fastfood', 'hotdog.jpg'),
(92, 'bevarage', 'sprite.jpg'),
(93, 'noddles', 'noodles.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `companyinfo`
--

CREATE TABLE `companyinfo` (
  `company_id` int(11) NOT NULL,
  `companyname` text NOT NULL,
  `chargeamount` text NOT NULL,
  `vatcharge` text NOT NULL,
  `address` text NOT NULL,
  `phonenumber` text NOT NULL,
  `city` text NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companyinfo`
--

INSERT INTO `companyinfo` (`company_id`, `companyname`, `chargeamount`, `vatcharge`, `address`, `phonenumber`, `city`, `admin_id`) VALUES
(1, 'food factory', '20%', '2%', 'khan jhan ali road', '01678234654', 'NULL', NULL),
(2, 'Mr. Cheese', '20%', '4%', 'beside Khaba hall,KU', '01770005643', 'Khulna', NULL),
(3, 'Mr. Cheese', '20%', '2%', 'Khulna University', '01678234654', 'khulna', NULL),
(4, 'Mr. Cheese', '56%', '2%', 'south central road', '01678234654', 'khulna', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `contact` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `name`, `email`, `password`, `contact`) VALUES
(87, 'Abid shahriar swapnil', 'abid@gmail.com', '123202cb962ac59075b964b07152d234b7040bd001563085fc35165329ea1ff5c5ecbdbbeef', '0679123120'),
(90, 'Kushal ghosh', 'kushal@gmail.com', '123202cb962ac59075b964b07152d234b7040bd001563085fc35165329ea1ff5c5ecbdbbeef', '01711029696'),
(91, 'Cristiano', 'ronaldo@gmail.com', '123202cb962ac59075b964b07152d234b7040bd001563085fc35165329ea1ff5c5ecbdbbeef', '+880-6666'),
(92, 'Lionel messi', 'leo@gmail.com', '123202cb962ac59075b964b07152d234b7040bd001563085fc35165329ea1ff5c5ecbdbbeef', '01234567'),
(93, 'Zlatan ibrahimovic', 'zlatan@gmail.com', '123202cb962ac59075b964b07152d234b7040bd001563085fc35165329ea1ff5c5ecbdbbeef', '06463734'),
(94, 'Sara khan', 'sara@gamil.com', '123202cb962ac59075b964b07152d234b7040bd001563085fc35165329ea1ff5c5ecbdbbeef', '123445654'),
(95, 'Mim', 'mim@gmail.com', '123202cb962ac59075b964b07152d234b7040bd001563085fc35165329ea1ff5c5ecbdbbeef', '7844774'),
(96, 'Moumee Khan', 'moumee@gmail.com', '123202cb962ac59075b964b07152d234b7040bd001563085fc35165329ea1ff5c5ecbdbbeef', '+880-6666'),
(97, 'karan', 'karan@gmail.com', '123202cb962ac59075b964b07152d234b7040bd001563085fc35165329ea1ff5c5ecbdbbeef', '757747477'),
(98, 'Nira jaman', 'nira@gmail.com', '123202cb962ac59075b964b07152d234b7040bd001563085fc35165329ea1ff5c5ecbdbbeef', '083578585');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` text NOT NULL,
  `location` text NOT NULL,
  `start_time` datetime NOT NULL,
  `creator` text NOT NULL,
  `about` longtext NOT NULL,
  `cust_id` int(11) NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `location`, `start_time`, `creator`, `about`, `cust_id`, `end_time`) VALUES
(6, 'Birthday ceremony', 'Mr.Cheese', '2020-01-01 13:02:00', 'Kushal ghosh', 'gfhhj', 90, '00:00:00'),
(7, 'Birthday ceremony', 'Mr.Cheese', '2019-02-01 02:01:00', 'my event', 'Abid shahriar swapnil', 87, '00:00:00'),
(8, 'Birthday ceremony', 'Mr.Cheese', '2019-02-01 02:01:00', 'my event', 'Abid shahriar swapnil', 87, '00:00:00'),
(9, 'Birthday ceremony', 'Mr.Cheese', '2019-02-01 02:01:00', 'my event', 'Abid shahriar swapnil', 87, '00:00:00'),
(10, 'Birthday ceremony', 'Mr.Cheese', '2019-02-01 02:01:00', 'my event', 'Abid shahriar swapnil', 87, '00:00:00'),
(11, 'Birthday ceremony', 'Mr.Cheese', '2019-02-01 02:01:00', 'my event', 'Abid shahriar swapnil', 87, '00:00:00'),
(12, 'Birthday ceremony', 'Mr.Cheese', '2019-02-01 02:01:00', 'my event', 'Abid shahriar swapnil', 87, '00:00:00'),
(13, 'Birthday ceremony', 'Mr.Cheese', '2019-02-01 02:01:00', 'my event', 'Abid shahriar swapnil', 87, '00:00:00'),
(14, 'Birthday ceremony', 'Mr.Cheese', '2019-02-01 02:01:00', 'my event', 'Abid shahriar swapnil', 87, '00:00:00'),
(15, 'Marriage Anniversary', 'Mr.Cheese', '2019-02-01 01:01:00', 'Abid shahriar swapnil', 'my ebent', 87, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_name` text NOT NULL,
  `food_price` int(11) NOT NULL,
  `pieces` bigint(20) NOT NULL,
  `image` varchar(355) NOT NULL,
  `category` text NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_price`, `pieces`, `image`, `category`, `cat_id`) VALUES
(66, 'maxican nachos', 120, 100, 'spaghetti.jpg', 'nachos', 85),
(67, 'chowmeing', 100, 100, 'noodles.jpeg', 'noodles', 88),
(68, 'cocacola', 20, 98, 'cocacola1.jpg', 'bevarage', 92),
(69, 'biriani', 150, 99, 'rice.jpg', 'rice', 87),
(72, 'sprite', 30, 100, 'sprite.jpg', 'bevarage', 92);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `food_id` int(11) NOT NULL,
  `item` text NOT NULL,
  `price` int(11) NOT NULL,
  `size` text NOT NULL,
  `pieces` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`food_id`, `item`, `price`, `size`, `pieces`) VALUES
(148, 'ITALIAN PASTA', 220, 'NONE', 90),
(149, 'GRILL OVEN BAKED PASTA', 240, 'NONE', 90),
(150, 'WHITE PASTA', 180, 'NONE', 90),
(151, 'MR. CHEESE SPECIAL NACHOS', 170, 'NONE', 90),
(152, 'BBQ RICE BOWL', 140, 'NONE', 90),
(153, 'CHICKEN RICE BOWL', 120, 'NONE', 90),
(155, 'DUEL PACKAGE', 399, 'NONE', 0),
(156, 'MEXICAN CHICKEN PIZZA', 330, 'SMALL', 90),
(157, 'MEXICAN CHICKEN PIZZA', 400, 'MEDIUM', 90),
(158, 'MEXICAN CHICKEN PIZZA', 510, 'LARGE', 90),
(159, 'BBQ CHICKEN PIZZA', 380, 'SMALL', 90),
(160, 'BBQ CHICKEN PIZZA', 450, 'MEDIUM', 90),
(161, 'BBQ CHICKEN PIZZA', 560, 'LARGE', 90),
(162, 'MR. CHEESE SPECIAL PIZZA', 310, 'SMALL', 90),
(163, 'MR. CHEESE SPECIAL PIZZA', 400, 'MEDIUM', 90),
(164, 'MR. CHEESE SPECIAL PIZZA', 510, 'LARGE', 30),
(165, 'MEXICAN CHOWMIN', 110, 'REGULAR', 50),
(166, 'MEXICAN CHOWMIN', 300, 'LARGE', 86),
(167, 'EGG CHOWMIN', 120, 'REGULAR', 90),
(168, 'EGG CHOWMIN', 340, 'LARGE', 90),
(169, 'BEEF AND PRAWN', 135, 'REGULAR', 90),
(170, 'BEEF AND PRAWN', 375, 'LARGE', 90),
(171, 'MR. CHEESE SPECIAL CHOWMIN', 150, 'REGULAR', 90),
(172, 'MR. CHEESE SPECIAL CHOWMIN', 435, 'LARGE', 90),
(173, 'REGULAR COLD COFFEE', 70, 'none', 90),
(174, 'CHOCOLATE COLD COFFEE', 80, 'NONE', 90),
(175, 'CARAMEL COLD COFFEE', 85, 'NONE', 90),
(176, 'DARK COLD COFFEE', 90, 'NONE', 90),
(177, 'MR. CHEESE SPECIAL COLD COFFEE', 100, 'NONE', 90),
(178, 'VANILLA SHAKE', 70, 'NONE', 90),
(179, 'CHOCOLATE MILKSHAKE', 75, 'NONE', 90),
(180, 'STRAWBERRY MILKSHAKE', 75, 'NONE', 90),
(181, 'OREO MILKSHAKE', 90, 'NONE', 90),
(182, 'KIT-KAT MILKSHAKE', 95, 'NONE', 90),
(183, 'LACHHI', 60, 'NONE', 89),
(184, 'KACCHI BIRIANI', 140, 'HALF', 90),
(185, 'MOROG POLAO', 130, 'HALF', 90),
(188, 'BEEF POLAO', 140, 'HALF', 100),
(189, 'SHRIMP CHAP', 60, 'SMALL', 90),
(192, 'STUDENT PACKAGE', 150, 'NONE', 10),
(193, 'FRENCH FRY', 40, 'HALF', 90),
(195, 'RICE AND SHRIMP', 170, 'LARGE', 22),
(197, 'MUTTON CHAP', 70, 'SMALL', 0),
(198, 'CHICKEN FINGERS', 180, 'FULL', 20),
(199, 'MUTTON BIRIANI', 140, 'HALF', 42),
(200, 'CHICKEN TANDURI', 180, 'LARGE', 2),
(201, 'CHICKEN DISH', 150, 'FULL', 67),
(202, 'RICE DISH', 120, 'FULL', 0);

-- --------------------------------------------------------

--
-- Table structure for table `newitem`
--

CREATE TABLE `newitem` (
  `food_id` int(11) NOT NULL,
  `item` text NOT NULL,
  `price` int(11) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newitem`
--

INSERT INTO `newitem` (`food_id`, `item`, `price`, `size`) VALUES
(8, 'MUTTON BIRIANI', 140, 'HALF'),
(9, 'CHICKEN TANDURI', 180, 'LARGE'),
(10, 'CHICKEN DISH', 150, 'FULL'),
(11, 'RICE DISH', 120, 'FULL'),
(12, 'new', 12, 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `notification` text NOT NULL,
  `cust_id` int(11) NOT NULL,
  `reserve_status` tinyint(1) NOT NULL,
  `purpose` text NOT NULL,
  `meal_plan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `notification`, `cust_id`, `reserve_status`, `purpose`, `meal_plan`) VALUES
(78, '13', 90, 0, 'Celebration', 'Breakfast'),
(79, '11', 94, 1, 'Celebration', 'Breakfast'),
(80, '11', 94, 0, 'Celebration', 'Breakfast'),
(81, '10', 87, 1, 'Celebration', 'Lunch'),
(82, '12', 87, 1, 'Meeting', 'Breakfast'),
(83, '11', 87, 1, 'Celebration', 'Breakfast'),
(84, '10', 90, 1, 'Meeting', 'Breakfast'),
(85, '11', 94, 1, 'Celebration', 'Breakfast'),
(86, '11', 94, 0, 'Celebration', 'Breakfast'),
(87, '10', 87, 0, 'Celebration', 'Lunch'),
(88, '12', 87, 0, 'Meeting', 'Breakfast'),
(89, '11', 87, 0, 'Celebration', 'Breakfast'),
(90, '10', 90, 0, 'Meeting', 'Breakfast'),
(91, '11', 94, 1, 'Casual', 'Breakfast'),
(92, '11', 94, 0, 'Celebration', 'Breakfast'),
(93, '11', 94, 1, 'Celebration', 'Breakfast'),
(94, '11', 90, 1, 'Celebration', 'Lunch'),
(95, '11', 90, 1, 'Celebration', 'Breakfast'),
(96, '11', 90, 0, 'Celebration', 'Lunch'),
(97, '11', 90, 0, 'Celebration', 'Breakfast'),
(98, '11', 95, 1, 'Meeting', 'Breakfast'),
(99, '11', 95, 0, 'Meeting', 'Breakfast'),
(100, '11', 94, 0, 'Casual', 'Breakfast'),
(101, '11', 94, 0, 'Celebration', 'Breakfast'),
(102, '10', 95, 1, 'Celebration', 'Breakfast'),
(103, '12', 95, 1, 'Celebration', 'Breakfast'),
(104, '13', 95, 1, 'Celebration', 'Breakfast'),
(105, '13', 95, 1, 'Celebration', 'Breakfast'),
(106, '13', 95, 0, 'Celebration', 'Breakfast'),
(107, '13', 95, 0, 'Celebration', 'Breakfast'),
(108, '12', 95, 0, 'Celebration', 'Breakfast'),
(109, '10', 95, 0, 'Celebration', 'Breakfast'),
(110, '10', 91, 1, 'Celebration', 'Breakfast'),
(111, '11', 94, 1, 'Celebration', 'Breakfast');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `item` text NOT NULL,
  `pieces` int(11) NOT NULL,
  `time` time NOT NULL,
  `size` text NOT NULL,
  `contact` varchar(355) NOT NULL,
  `image` varchar(355) NOT NULL,
  `food_id` int(11) DEFAULT NULL,
  `name` text,
  `cust_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `name`, `email`) VALUES
(1, 'hasib', 'hasib@gmail.com'),
(2, 'hasib', 'hasib@gmail.com'),
(3, 'admin', 'admin@admin.com'),
(4, 'swapnil', 'swapnil@gmail.com'),
(5, 'rifat', 'rifat@gmail.com'),
(6, 'jarif', 'jarif@gmail.com'),
(7, 'hasib', 'hasib@gmail.com'),
(8, 'admin', 'admin@admin.com'),
(9, 'rafa', 'rafa@gmail.com'),
(10, 'kabir', 'kabir@gmail.com'),
(11, 'abid', 'abid@gmail.com'),
(12, 'israk', 'israk@gmail.com'),
(13, 'mahmud', 'mahmud@gmail.com'),
(14, 'islam', 'islam@gmail.com'),
(15, 'shahriar', 'shahriar@gmail.com'),
(16, 'hasib', 'hasib@gmail.com'),
(17, 'mahmud', 'mahmud@gmail.com'),
(18, 'maya', 'maya@gmail.com'),
(19, 'rafi', 'rafi@gmail.com'),
(20, 'admin1', 'admin1@gmail.com'),
(21, 'admin2', 'admin2@gmail.com'),
(22, 'swapnil', 'swapnil@gmail.com'),
(23, 'admin', 'admin@admin.com'),
(24, 'swapnil', 'admin@admin.com'),
(25, 'mim', 'mim@gmail.com'),
(26, 'admin3', 'admin3@admin.com'),
(27, 'abid', 'abid@abid.com'),
(28, 'sakib', 'sakib@gmail.com'),
(29, 'shahriar', 'shahriar@gmail.com'),
(30, 'sshopon', 'shopon@gmail.com'),
(31, 'admin', 'admin@admin.com'),
(32, 'swapnil', 'swapnil@gmail.com'),
(33, 'admin', 'admin@admin.com'),
(34, 'swapnil', 'swapnil@gmail.com'),
(35, 'abid', 'abid@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `question` varchar(555) NOT NULL,
  `name` text NOT NULL,
  `time` datetime NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `email` varchar(355) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `question`, `name`, `time`, `cust_id`, `email`) VALUES
(33, 'my question one?', 'Sara khan', '2019-04-09 09:12:39', 94, 'sara@gamil.com'),
(34, 'my question 2', 'Abid shahriar swapnil', '2019-04-09 09:16:29', 87, 'abid@gmail.com'),
(35, 'do you have pizza ?', 'Kushal ghosh', '2019-04-10 10:58:11', 90, 'kushal@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `report` smallint(6) NOT NULL,
  `item` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `report`, `item`) VALUES
(1, 2, 'maxican sub\r\n'),
(2, 3, 'chicken'),
(3, -10, 'pasta'),
(4, 7, 'pizza');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reserve_id` int(11) NOT NULL,
  `purpose` text NOT NULL,
  `meal_plan` text NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `cust_email` varchar(355) NOT NULL,
  `reserve_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reserve_id`, `purpose`, `meal_plan`, `time`, `date`, `cust_id`, `table_id`, `cust_email`, `reserve_status`) VALUES
(64, 'Celebration', 'Breakfast', '01:00:00', '2019-01-01', 91, 10, 'ronaldo@gmail.com', 1),
(65, 'Celebration', 'Breakfast', '01:00:00', '2019-01-01', 94, 11, 'sara@gamil.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` text NOT NULL,
  `staff_email` varchar(255) NOT NULL,
  `staff_image` varchar(355) NOT NULL,
  `staff_phone` bigint(20) NOT NULL,
  `staff_gender` text NOT NULL,
  `staff_about` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_email`, `staff_image`, `staff_phone`, `staff_gender`, `staff_about`) VALUES
(26, 'hasib', 'hasib@gmail.com', 'hasib.jpg', 111, 'male', 'afafea');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(11) NOT NULL,
  `reserve_status` tinyint(1) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `cust_email` varchar(355) DEFAULT NULL,
  `table_info` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `reserve_status`, `cust_id`, `cust_email`, `table_info`, `image`) VALUES
(10, 0, NULL, NULL, 4, ''),
(11, 0, NULL, NULL, 4, ''),
(12, 0, NULL, NULL, 5, ''),
(13, 0, NULL, NULL, 12, ''),
(14, 0, NULL, NULL, 12, ''),
(15, 0, NULL, NULL, 12, ''),
(16, 0, NULL, NULL, 12, ''),
(17, 0, NULL, NULL, 6, ''),
(18, 0, NULL, NULL, 12, ''),
(19, 0, NULL, NULL, 6, ''),
(20, 0, NULL, NULL, 12, ''),
(21, 0, NULL, NULL, 12, ''),
(22, 0, NULL, NULL, 5, ''),
(23, 0, NULL, NULL, 5, ''),
(24, 0, NULL, NULL, 5, ''),
(25, 0, NULL, NULL, 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(6, 'noor@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `companyinfo`
--
ALTER TABLE `companyinfo`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `email_3` (`email`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `newitem`
--
ALTER TABLE `newitem`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reserve_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `companyinfo`
--
ALTER TABLE `companyinfo`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `newitem`
--
ALTER TABLE `newitem`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companyinfo`
--
ALTER TABLE `companyinfo`
  ADD CONSTRAINT `companyinfo_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
