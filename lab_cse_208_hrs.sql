-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 07:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_cse_208_hrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_services`
--

CREATE TABLE `additional_services` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `additional_services`
--

INSERT INTO `additional_services` (`id`, `title`, `price`) VALUES
(1, 'Breakfast', 500),
(3, 'Dinner', 1000),
(2, 'Lunch', 800),
(8, 'Spa/Massage', 300),
(9, 'Order an extra bed', 0),
(10, 'NetFlix', 400);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `title` varchar(99) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `title`) VALUES
(1, 'Free parking'),
(2, 'Elevator'),
(17, 'Balcony'),
(4, 'Wi-Fi'),
(5, 'Cable TV'),
(6, 'Conditioning'),
(7, 'Hair dryer'),
(9, 'Washer'),
(10, 'LCD Television'),
(11, 'Safe'),
(12, 'Free video on demand'),
(13, 'Terrace'),
(14, 'Fireplace'),
(15, 'Mini-Bar'),
(16, 'Coffee Machine'),
(19, 'Dress Room'),
(20, 'Air Conditaions');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `comment` varchar(999) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `comment`, `user_id`, `created_on`) VALUES
(1, 'Thanks! Your product descriptions are amazing and your service is wonderful .', 8, '2021-11-10 01:23:57'),
(2, 'Hotel is worth much more than I paid', 6, '2021-11-10 01:23:57'),
(3, 'The size, the fitting and the style of the little black dress is amazing!', 3, '2021-11-10 01:23:57'),
(4, 'Pictures, abstract symbols, materials, and colors are among the ingredients with which a designer or engineer works.', 8, '2021-11-10 02:14:58'),
(5, 'This is good services', 8, '2021-11-11 12:06:41'),
(6, 'If you use a browser with WebSQL support (Chrome, Safari, or Opera)', 8, '2021-11-17 20:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `suite_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_no` int(11) DEFAULT NULL,
  `aditional_id` varchar(555) NOT NULL,
  `guest` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `payment_method` varchar(25) NOT NULL,
  `account_no` bigint(20) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `order_no`, `suite_id`, `user_id`, `room_no`, `aditional_id`, `guest`, `total_cost`, `check_in`, `check_out`, `payment_method`, `account_no`, `status`) VALUES
(14, '389317391', 1, 6, 2, 'a:2:{i:0;s:1:', 3, 58500, '2021-11-18', '2021-11-21', 'Card', 9223372036854775807, 1),
(2, '908084856', 1, 1, 0, 'a:1:{i:0;s:1:', 5, 2525, '0000-00-00', '0000-00-00', 'Card', 2147483647, 0),
(3, '832760688', 1, 1, 0, 'a:1:{i:0;s:1:', 5, 2525, '0000-00-00', '0000-00-00', 'Card', 2147483647, 1),
(4, '694192990', 1, 1, 0, 'a:1:{i:0;s:1:', 5, 2525, '0000-00-00', '0000-00-00', 'Rocket', 1234678912, 0),
(5, '251424489', 1, 1, 0, 'a:1:{i:0;s:1:', 5, 2525, '0000-00-00', '0000-00-00', 'Rocket', 1234678912, 1),
(6, '857545774', 1, 1, 0, 'a:1:{i:0;s:1:', 5, 2525, '0000-00-00', '0000-00-00', 'Nagad', 1234678912, 1),
(7, '1999946933', 3, 8, 0, 'a:1:{i:0;s:1:', 1, 2010, '2021-11-10', '2021-11-11', 'Card', 2147483647, 1),
(11, '1528540256', 8, 3, 0, 'a:4:{i:0;s:1:', 8, 653800, '2021-11-17', '2021-11-24', 'Cash', 0, 0),
(9, '1416785274', 3, 8, 0, 'a:2:{i:0;s:1:', 3, 71500, '2021-11-12', '2021-11-23', 'bKash', 1234678912, 0),
(12, '1311169957', 5, 3, 0, 'a:2:{i:0;s:1:', 2, 62798, '2021-11-18', '2021-11-20', 'Cash', 0, 0),
(13, '1622243929', 1, 3, 0, 'a:1:{i:0;s:1:', 2, 17000, '2021-11-17', '2021-11-18', 'Cash', 1231, 1),
(15, '49144462', 1, 6, 1, 'a:2:{i:0;s:1:', 2, 37200, '2021-11-18', '2021-11-20', 'Card', 2313563456345634563, 1),
(16, '220073121', 3, 6, 2, 'a:3:{i:0;s:1:', 4, 139495, '2021-11-18', '2021-11-23', 'Card', 2313563456345634563, 0),
(17, '1070534795', 8, 14, 5, 'a:1:{i:0;s:1:', 2, 152000, '2022-11-10', '2022-11-12', 'Cash', 1, 0),
(18, '256151380', 8, 1, 5, 'a:1:{i:0;s:1:', 2, 229800, '2023-08-29', '2023-09-01', 'Cash', 0, 0),
(19, '920007569', 9, 16, 6, 'a:4:{i:0;s:1:', 5, 147000, '2023-08-29', '2023-08-31', 'Card', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `comment` varchar(999) NOT NULL,
  `star` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `comment`, `star`, `user_id`, `created_on`) VALUES
(1, 'Your suite is amazing!', 5, 1, '2021-11-17 21:57:53'),
(2, 'You service is good but need some improvement.', 4, 8, '2021-11-17 22:03:36'),
(3, 'Some Review Text', 1, 1, '2021-11-17 22:15:19'),
(4, 'Your  Services is awesome', 4, 1, '2021-11-18 12:49:16'),
(5, 'a/sldfhasbli fgawliufgh asetlighqwef', 4, 1, '2023-09-06 14:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_no` varchar(99) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`, `type`, `status`) VALUES
(1, 'A-201', 1, 1),
(2, 'B-201', 3, 0),
(5, 'A303', 8, 1),
(6, 'A-205', 9, 0),
(8, 'B-301', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suite`
--

CREATE TABLE `suite` (
  `id` int(11) NOT NULL,
  `title` varchar(99) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `area` int(11) NOT NULL,
  `beads` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `facilities` varchar(999) DEFAULT NULL,
  `image` varchar(999) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suite`
--

INSERT INTO `suite` (`id`, `title`, `price`, `description`, `area`, `beads`, `bathroom`, `facilities`, `image`) VALUES
(1, 'Junior Suite', 15000, 'Spacious and elegant, the Foreo Junior Suite is unique. The lounge corner with its bronze-clad fireplace offers the perfect space for a moment of relaxation. The materials feature solid wood, bronze, marble and thick wools and furs. Colors feature soft shades such as ivory, taupe and cream.\r\n\r\nA perfect, snug cocoon for an equally perfect stay. The private balcony provides stunning views over legendary landscapes. The marble bathroom and fitted walk-in wardrobe offer optimal comfort.', 430, 2, 2, 'a:6:{i:0;s:1:\"1\";i:1;s:1:\"4\";i:2;s:2:\"10\";i:3;s:2:\"11\";i:4;s:2:\"12\";i:5;s:2:\"13\";}', ''),
(2, 'Satin Suite', 18999, 'Spacious and elegant, the Foreo Junior Suite is unique. The lounge corner with its bronze-clad fireplace offers the perfect space for a moment of relaxation. The materials feature solid wood, bronze, marble and thick wools and furs. Colors feature soft shades such as ivory, taupe and cream.\r\n\r\nA perfect, snug cocoon for an equally perfect stay. The private balcony provides stunning views over legendary landscapes. The marble bathroom and fitted walk-in wardrobe offer optimal comfort.', 560, 2, 1, 'a:7:{i:0;s:1:\"4\";i:1;s:1:\"7\";i:2;s:1:\"9\";i:3;s:2:\"10\";i:4;s:2:\"14\";i:5;s:2:\"15\";i:6;s:2:\"16\";}', ''),
(3, 'Pearl Suite', 22699, 'Guests who love to enjoy views on mountains will gaze from the balcony which gives the perfect view on the Bernese Alps and the infamous Gstaad village.', 830, 3, 2, 'a:8:{i:0;s:1:\"1\";i:1;s:1:\"4\";i:2;s:1:\"7\";i:3;s:1:\"9\";i:4;s:2:\"10\";i:5;s:2:\"12\";i:6;s:2:\"14\";i:7;s:2:\"16\";}', ''),
(5, 'Prestige Suite', 27799, 'Our magnificent Prestige Suite, with its unique signature and large lounge area, offers the atmosphere of a private chalet with all the comfort of the hotel’s services.', 956, 4, 2, 'a:10:{i:0;s:1:\"1\";i:1;s:2:\"17\";i:2;s:1:\"4\";i:3;s:1:\"7\";i:4;s:2:\"10\";i:5;s:2:\"12\";i:6;s:2:\"13\";i:7;s:2:\"14\";i:8;s:2:\"15\";i:9;s:2:\"16\";}', ''),
(4, 'Signature Suite', 26000, 'With a beautiful lounge area, featuring a superb fireplace and private balcony, the Signature Suite offers a spacious interior in which to enjoy precious moments.', 845, 3, 2, 'a:9:{i:0;s:1:\"1\";i:1;s:2:\"17\";i:2;s:1:\"4\";i:3;s:1:\"7\";i:4;s:2:\"10\";i:5;s:2:\"12\";i:6;s:2:\"14\";i:7;s:2:\"15\";i:8;s:2:\"16\";}', ''),
(6, 'Presidental Suite', 39999, 'Spacious and elegant, the Foreo Junior Suite is unique. The lounge corner with its bronze-clad fireplace offers the perfect space for a moment of relaxation.', 1023, 3, 3, 'a:10:{i:0;s:1:\"1\";i:1;s:2:\"17\";i:2;s:1:\"4\";i:3;s:1:\"7\";i:4;s:1:\"9\";i:5;s:2:\"10\";i:6;s:2:\"12\";i:7;s:2:\"14\";i:8;s:2:\"15\";i:9;s:2:\"18\";}', ''),
(7, 'Family Suite', 32999, 'Spacious and elegant, the Foreo Junior Suite is unique. The lounge corner with its bronze-clad fireplace offers the perfect space for a moment of relaxation.', 1010, 4, 2, 'a:10:{i:0;s:1:\"1\";i:1;s:2:\"17\";i:2;s:1:\"4\";i:3;s:1:\"7\";i:4;s:1:\"9\";i:5;s:2:\"10\";i:6;s:2:\"12\";i:7;s:2:\"14\";i:8;s:2:\"18\";i:9;s:2:\"19\";}', ''),
(8, 'Platinum Suite', 75000, 'Spacious and elegant, the Foreo Junior Suite is unique. The lounge corner with its bronze-clad fireplace offers the perfect space for a moment of relaxation.', 1250, 6, 4, 'a:13:{i:0;s:1:\"1\";i:1;s:2:\"17\";i:2;s:1:\"4\";i:3;s:1:\"6\";i:4;s:1:\"7\";i:5;s:1:\"9\";i:6;s:2:\"10\";i:7;s:2:\"12\";i:8;s:2:\"14\";i:9;s:2:\"15\";i:10;s:2:\"16\";i:11;s:2:\"19\";i:12;s:2:\"20\";}', ''),
(9, 'Silver Plus', 62000, 'Spacious and elegant, the Foreo Junior Suite is unique. The lounge corner with its bronze-clad fireplace offers the perfect space for a moment of relaxation. The materials feature solid wood, bronze, marble and thick wools and furs. Colors feature soft shades such as ivory, taupe and cream.\r\n\r\nA perfect, snug cocoon for an equally perfect stay. The private balcony provides stunning views over legendary landscapes. The marble bathroom and fitted walk-in wardrobe offer optimal comfort.', 1325, 3, 2, 'a:8:{i:0;s:1:\"1\";i:1;s:1:\"4\";i:2;s:1:\"7\";i:3;s:2:\"10\";i:4;s:2:\"12\";i:5;s:2:\"14\";i:6;s:2:\"15\";i:7;s:2:\"16\";}', ''),
(10, 'mdgold', 10000, '\r\nit is a best of services by rooms ', 5, 3, 2, 'a:17:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:2:\"17\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"9\";i:8;s:2:\"10\";i:9;s:2:\"11\";i:10;s:2:\"12\";i:11;s:2:\"13\";i:12;s:2:\"14\";i:13;s:2:\"15\";i:14;s:2:\"16\";i:15;s:2:\"19\";i:16;s:2:\"20\";}', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(900) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `password`, `phone`, `address`, `country`, `postal`, `created_on`) VALUES
(1, 'admin@admin.com', 'Super Admin', '21232f297a57a5a743894a0e4a801fc3', '+8801758860911', 'Mirpur, Dhaka-1216', 'BD', 1226, '2021-10-20 21:35:09'),
(2, 'ex@ex.com', 'User 1', '202cb962ac59075b964b07152d234b70', '', '', NULL, NULL, '2021-10-20 23:57:19'),
(3, 'ex2@ex.com', 'User 2', '202cb962ac59075b964b07152d234b70', '', '', NULL, NULL, '2021-10-21 00:16:57'),
(4, 'ex3@ex.com', 'User 3', '9b04d152845ec0a378394003c96da594', '', '', NULL, NULL, '2021-10-21 00:18:35'),
(6, 'ex4@ex.com', 'User 4', '202cb962ac59075b964b07152d234b70', '', '', NULL, NULL, '2021-10-21 13:53:22'),
(8, 'ex5@ex.com', 'User 5', '202cb962ac59075b964b07152d234b70', '+8801900000000', 'Rupnagar R/A, Mirpur-2', NULL, NULL, '2021-10-28 13:09:50'),
(10, 'ibrahimgoodboy555@gmail.com', 'Ibrahim Khalil', '827ccb0eea8a706c4c34a16891f84e7b', '+8801876437358', 'comilla,Bangladesh', NULL, NULL, '2022-09-05 09:03:26'),
(12, 'jubayerhossain235600@gmail.com', 'Jubayer', '827ccb0eea8a706c4c34a16891f84e7b', '01745789632444', 'dhaka mirpur', NULL, NULL, '2022-10-30 13:47:03'),
(13, 'tanimtt210@gmail.com', 'Tanim ', '827ccb0eea8a706c4c34a16891f84e7b', '01723654987', 'Mirpur', NULL, NULL, '2022-10-30 13:51:48'),
(14, 'tanim@gmail.com', 'Tanim', '81dc9bdb52d04dc20036dbd8313ed055', '01732145614', 'mirpur', NULL, NULL, '2022-11-06 14:11:47'),
(15, 'jubayer@gmail.com', 'Jubayer', '827ccb0eea8a706c4c34a16891f84e7b', '01758860911', 'pabna', NULL, NULL, '2022-11-16 10:59:34'),
(16, 'suraiyapurnima@gmail.com', 'Purnima', '827ccb0eea8a706c4c34a16891f84e7b', '01313531133', 'Mirpur-01', NULL, NULL, '2023-08-29 14:14:09'),
(17, 'jubayer.trodev@gmail.com', 'Jubayer Hossain', '827ccb0eea8a706c4c34a16891f84e7b', '758860911', 'Dhaka, mirpur-02', NULL, NULL, '2023-09-06 14:06:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_services`
--
ALTER TABLE `additional_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `title_2` (`title`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`,`room_no`),
  ADD UNIQUE KEY `room_no` (`room_no`);

--
-- Indexes for table `suite`
--
ALTER TABLE `suite`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Title` (`title`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_services`
--
ALTER TABLE `additional_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `suite`
--
ALTER TABLE `suite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
