-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 05:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shops`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `parent` int(11) NOT NULL,
  `ordering` int(11) DEFAULT NULL,
  `visibility` tinyint(4) NOT NULL DEFAULT 0,
  `allow_comment` tinyint(4) NOT NULL DEFAULT 0,
  `allow_ads` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `name`, `description`, `parent`, `ordering`, `visibility`, `allow_comment`, `allow_ads`) VALUES
(14, 'hand made', 'hand made items by local business', 0, 1, 0, 0, 0),
(15, 'computers', 'computers  & computer accessories ', 0, 2, 0, 1, 0),
(16, 'PC parts', 'You can find all PC related parts', 0, 3, 0, 0, 0),
(17, 'Electronics', 'We sell all household appliances', 0, 4, 0, 0, 1),
(18, 'Fashion', 'Looking for pretty cloth? You can find everything here.', 0, 5, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comment_date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `status`, `comment_date`, `item_id`, `user_id`) VALUES
(9, 'yo this shit is so coool man', 1, '2021-04-01', 14, 62),
(10, 'totally worth buying yo ahmadTest', 1, '2021-04-03', 10, 59),
(12, 'such a wonderful item to buy', 1, '2021-04-06', 13, 62),
(13, 'lovely item i totally want to buy it ahmadTest', 1, '2021-04-12', 14, 59),
(16, 'lovely item i totally want to buy it ahmadTest', 1, '2021-04-12', 14, 59),
(17, 'cool item test', 1, '2021-04-12', 14, 62),
(22, 'Ahmad test comment', 0, '2021-04-12', 14, 62),
(24, 'electronics  PS vita\r\n', 1, '2021-04-12', 15, 62),
(25, 'ggd da ', 1, '2021-04-14', 19, 35),
(26, 'hi how are you doing ', 1, '2021-04-16', 19, 35),
(27, 'hi am testing new comment', 1, '2021-04-19', 15, 63),
(28, 'yo sasa this is a great item from pc parts admin', 1, '2021-04-20', 19, 1),
(29, 'testing comment on my item sasa', 1, '2021-04-20', 19, 62),
(31, 'testing redirect after comment', 1, '2021-04-20', 19, 63),
(32, 'Hi am testing new comment from sasa account', 1, '2021-04-22', 19, 62);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `add_date` date NOT NULL,
  `made_in` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL COMMENT 'image link',
  `status` varchar(255) NOT NULL,
  `rating` smallint(6) NOT NULL,
  `approve` tinyint(4) NOT NULL DEFAULT 0,
  `cate_id` int(11) NOT NULL COMMENT 'foreign key to link category ',
  `user_id` int(11) NOT NULL COMMENT 'foreign key to link users'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `description`, `price`, `add_date`, `made_in`, `image`, `status`, `rating`, `approve`, `cate_id`, `user_id`) VALUES
(10, 'Graphic card', 'GTX 1660TI 6GB', '399', '2021-04-05', 'China', '', '1', 0, 1, 16, 33),
(11, 'HP gaming laptop', 'best gaming laptop of 2020', '1200', '2021-04-05', 'USA', '', '2', 0, 0, 15, 46),
(12, 'kettle', 'boiling water in mater of seconds', '59', '2021-04-05', 'Japan', '', '1', 0, 1, 17, 46),
(13, 'Gaming Mouse', 'MSI best gaming mouse of 2021 with 3ms response time', '129', '2021-04-05', 'China', '', '1', 0, 1, 16, 35),
(14, 'MSI GL65 Leopard ', '10SFK-062 15.6\" FHD 144Hz 3ms Thin Bezel Gaming Laptop Intel Core i7-10750H RTX2070 16GB 512GB NVMe SSD Win 10\r\n\r\n15.6\" FHD IPS-Level 144Hz 72%NTSC Thin Bezel close to 100%Srgb NVIDIA GeForce RTX 2070 8G GDDR6\r\nIntel Core i7-10750H 2.6-5.0GHz Intel Wi-Fi 6 AX201(2 x 2 ax)\r\n512GB NVMe SSD 16GB (8G*2) DDR4 2666MHz 2 Sockets Max Memory 64GB\r\nUSB 3.1 Gen2 Type C 1 USB 3.2 Gen1 3 Steel Series per-Key RGB with Anti-Ghost key+ silver lining 720p HD Webcam\r\nWin10 Multi-language Giant Speakers 3W x 2 6 cell (51Wh) Li-Ion 230W', '1600', '2021-04-05', 'China', '', '1', 0, 1, 16, 59),
(15, 'PS vita', 'the best handheld ever!! you can not buy it or play its game now lol.', '299', '2021-04-07', 'Japan', '', '2', 0, 1, 17, 1),
(17, 'MSI GL65 PRO', 'MSI GL65 PRO Is the Best laptop ever dude!!! no way', '1200', '2021-04-11', 'China', '', '3', 0, 1, 15, 62),
(18, 'Mechanical keyboard 2', 'Mechanical keyboard with 10ms response time ', '35', '2021-04-13', 'China', '', '1', 0, 0, 16, 62),
(19, 'Mechanical keyboard', 'Mechanical keyboard with 2ms response time ', '49', '2021-04-13', 'China', '', '1', 0, 1, 16, 62),
(20, 'hidden category', 'adding item in the hidden category', '30', '2021-04-16', 'Japan', '', '3', 0, 1, 18, 1),
(21, 'intel CPU', 'intel core-i 9-9900K 4.5GHz top speed 5GHz', '60', '2021-04-19', 'China', '', '2', 0, 1, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `groupID` int(11) NOT NULL DEFAULT 0,
  `trust_status` int(11) NOT NULL DEFAULT 0,
  `register_status` int(11) NOT NULL DEFAULT 0,
  `Date` date DEFAULT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `fullName`, `groupID`, `trust_status`, `register_status`, `Date`, `gender`) VALUES
(1, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ahmod@gmail.com', 'Ahmad Dalao', 1, 0, 1, '2021-02-01', 'male'),
(33, 'SoSo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123@123', 'SoSo', 2, 0, 1, '2021-03-07', 'male'),
(35, 'Sami', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123@1325', 'Sami Dalao', 2, 0, 1, '2021-03-02', 'male'),
(46, 'lolo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'lololo@lolo.com', 'Leen Dalao', 2, 0, 1, '2021-03-01', 'female'),
(59, 'AhmadTest', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'AhmadTest@AhmadTest.com', 'AhmadTest', 2, 0, 1, '2021-03-28', ''),
(61, 'testEdit', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'AhmadTest', 'AhmadTest', 0, 0, 1, '2021-04-02', ''),
(62, 'sasa', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sa2sa@sasa.com', 'sasa lola', 2, 0, 0, '2021-04-06', ''),
(63, 'ahmod123', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'ahmod@gmail.com', '', 0, 0, 0, '2021-04-09', ''),
(64, 'sellerTest', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'sellerTest@sellerTest.com', '', 2, 0, 1, '2021-04-14', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `member_id` (`user_id`),
  ADD KEY `category_id` (`cate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
