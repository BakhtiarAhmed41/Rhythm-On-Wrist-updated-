-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 06:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rhythm_on_wrist`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `User id` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `Message` varchar(400) NOT NULL,
  `Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`User id`, `Name`, `Email`, `PhoneNo`, `Message`, `Time`) VALUES
(4, 'Bakhtiar Ahmed', 'ahmedbakhtiar41@gmail.com', '03459393938', 'hi how are you', '2023-07-18 07:48:44'),
(5, 'Ahmed', 'a03331320622@gmail.com', '1575 7888331', 'thanks', '2023-07-18 07:49:06'),
(8, 'Ali', 'ali@email.com', '3248778888', 'I have some queries, plz answer\r\n', '2024-10-25 18:17:41'),
(9, 'ahmed', 'ahmedbakhtiar41@gmail.com', '3248778888', 'Thanks for an amazing experience!', '2024-10-25 18:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `User id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`User id`, `username`, `password`, `time`) VALUES
(25, 'abc', '$2y$10$xlPzb0V9v5N6W1wA751Jxu8JQs8pnrFa3fxatmO0qFuIcElqH1h16', '2023-07-18 10:51:53'),
(26, 'saqlain', '$2y$10$j.jtiZIf95t2j/3hjV2GRudgh6HbMtdCh.lf6nWNkZyFes/01sAoe', '2023-07-18 12:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `username`, `product_name`, `product_price`, `product_image`) VALUES
(40, 'the_bakhtiar_ah', 'TISSOT T TOUCH', 333, './upload/PXL_20230618_140507664.PORTRAIT.jpg'),
(41, 'the_bakhtiar_ah', 'SEIKO DIAMOND', 99, './upload/WhatsApp Image 2023-05-06 at 11.24.36.jpeg'),
(42, 'abc', 'TISSOT T TOUCH', 333, './upload/PXL_20230618_140507664.PORTRAIT.jpg'),
(43, 'abc', 'SEIKO DIAMOND', 99, './upload/WhatsApp Image 2023-05-06 at 11.24.36.jpeg'),
(45, 'abc', 'TISSOT T TOUCH', 333, './upload/PXL_20230618_140507664.PORTRAIT.jpg'),
(46, 'abc', 'SEIKO DIAMOND', 99, './upload/WhatsApp Image 2023-05-06 at 11.24.36.jpeg'),
(47, 'abc', 'SEIKOO', 765, './upload/PXL_20230630_141732579.PORTRAIT.jpg'),
(48, 'abc', 'SEIKO DIAMOND', 99, './upload/WhatsApp Image 2023-05-06 at 11.24.36.jpeg'),
(49, 'abc', 'SEIKOO', 765, './upload/PXL_20230630_141732579.PORTRAIT.jpg'),
(50, 'abc', 'SEIKO DIAMOND', 99, './upload/WhatsApp Image 2023-05-06 at 11.24.36.jpeg'),
(51, 'abc', 'SEIKOO', 765, './upload/PXL_20230630_141732579.PORTRAIT.jpg'),
(52, 'abc', 'SEIKO DIAMOND', 99, './upload/WhatsApp Image 2023-05-06 at 11.24.36.jpeg'),
(53, 'abc', 'SEIKOO', 765, './upload/PXL_20230630_141732579.PORTRAIT.jpg'),
(54, 'abc', 'SEIKO DIAMOND', 99, './upload/WhatsApp Image 2023-05-06 at 11.24.36.jpeg'),
(55, 'abc', 'SEIKOO', 765, './upload/PXL_20230630_141732579.PORTRAIT.jpg'),
(56, 'saqlain', 'seikoo', 345, '.uploadPXL_20230615_134950896.jpg'),
(57, 'fawad', 'SEIKOO', 765, './upload/PXL_20230630_141732579.PORTRAIT.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `producttb`
--

CREATE TABLE `producttb` (
  `id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producttb`
--

INSERT INTO `producttb` (`id`, `product_name`, `product_price`, `product_image`) VALUES
(1, 'ROLEX 1952', 1799, './upload/PXL_20230526_045313342.jpg'),
(2, 'TISSOT T TOUCH', 333, './upload/PXL_20230618_140507664.PORTRAIT.jpg'),
(3, 'SEIKO DIAMOND', 99, './upload/WhatsApp Image 2023-05-06 at 11.24.36.jpeg'),
(4, 'SEIKOO', 765, './upload/PXL_20230630_141732579.PORTRAIT.jpg'),
(5, 'seikoo', 345, '.\\upload\\PXL_20230615_134950896.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`User id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`User id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `producttb`
--
ALTER TABLE `producttb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `User id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `User id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `producttb`
--
ALTER TABLE `producttb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
