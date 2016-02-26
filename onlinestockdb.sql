-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2015 at 10:27 AM
-- Server version: 5.5.25a
-- PHP Version: 5.6.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlinestockdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `os_address`
--

CREATE TABLE IF NOT EXISTS `os_address` (
  `userId` tinytext NOT NULL,
  `address1` tinytext NOT NULL,
  `address2` tinytext NOT NULL,
  `state` tinytext NOT NULL,
  `PIN` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `os_address`
--

INSERT INTO `os_address` (`userId`, `address1`, `address2`, `state`, `PIN`) VALUES
('sandalblack19@gmail.com', '37/e, Vaiganallur Agraharam', 'Kulithalai, Karur', 'Tamil Nadu', '639104');

-- --------------------------------------------------------

--
-- Table structure for table `os_cards`
--

CREATE TABLE IF NOT EXISTS `os_cards` (
  `method` varchar(10) COLLATE utf8_bin NOT NULL,
  `accno` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `cardno` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `code` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `os_cards`
--

INSERT INTO `os_cards` (`method`, `accno`, `cardno`, `code`, `mobile`, `amount`) VALUES
('bank', '12345678901234567890', NULL, NULL, NULL, 9980),
('credvisa', NULL, '1234567890123456', NULL, NULL, 10000),
('debvisa', NULL, '1234567890123456', NULL, NULL, 10000),
('credamex', NULL, '123456789012345', '1234', NULL, 1205),
('debmaes', NULL, '123456789012345', '123', NULL, 10000),
('debmast', NULL, '123456789012345', '123', NULL, 10000),
('mdone', NULL, '1234567890123456', '12345', NULL, 9591),
('mmobi', NULL, NULL, NULL, '9876543210', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `os_category`
--

CREATE TABLE IF NOT EXISTS `os_category` (
  `catId` varchar(8) COLLATE utf8_bin NOT NULL,
  `catDesc` text COLLATE utf8_bin NOT NULL,
  `catLink` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `os_category`
--

INSERT INTO `os_category` (`catId`, `catDesc`, `catLink`) VALUES
('cat_book', 'Books', 'Book'),
('cat_coac', 'Computer & Accessories', 'CompAcc'),
('cat_entr', 'Entertainment', 'Entertain'),
('cat_game', 'Gaming', 'Game'),
('cat_home', 'Home & Kitchen', 'HomeKit'),
('cat_kids', 'Kids Zone', 'KidZone'),
('cat_moac', 'Mobile & Accessories', 'MobAcc'),
('cat_stat', 'Stationary', 'Stationary'),
('cat_trav', 'Travel', 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `os_comments`
--

CREATE TABLE IF NOT EXISTS `os_comments` (
  `Id` tinytext COLLATE utf8_bin NOT NULL,
  `productId` varchar(8) COLLATE utf8_bin NOT NULL,
  `userId` tinytext COLLATE utf8_bin NOT NULL,
  `dName` tinytext COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text COLLATE utf8_bin NOT NULL,
  `viewed` int(11) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `os_comments`
--

INSERT INTO `os_comments` (`Id`, `productId`, `userId`, `dName`, `date`, `comment`, `viewed`, `rating`) VALUES
('5f676ef221da6b5cb6fc92b149abecfe', 'p_000004', 'sandalblack19@gmail.com', 'Gopikrishna S', '2012-09-30 07:25:58', 'Amish Tripathi weaves a splendid but totally fictional & fantasised account of Shiva''s traivails.', 1, 3),
('0c3dec70083736777b3fb2ca7c4b2837', 'p_000004', 'Administrator', 'Administrator', '2012-09-30 08:32:58', 'This is a fabricated, but very well conceptualised story, weaving together the history(Indus Valley Civilization), geaography ( North Indian plains above the Vindhayas) & mythology; it still is a fantasy neverthless! The publishers should have added an asterix with a disclaimer somewhere, else many readers might feel cheated, like me.', 1, 5),
('4007d9acb9de3751dc7127d268adf44c', 'p_000004', 'vipranarayan14@gmail.com', 'Prasanna Venkatesh', '2012-09-30 12:54:25', '<p>Nice book to read. You should buy its sequel "The Secret of Nagas" to continue the journey.\n</p><p>\nNice one from Mr. Amish\n<p></p>\nExpecting the third to be more interesting ...\n</p>', 1, 4.5),
('25a0a9d26cc772cb347cd7e2b8c3e7ab', 'p_000003', 'sandalblack19@gmail.com', 'Gopikrishna S', '2012-10-04 23:53:09', 'This is nice Computer\n<p>XPS L502x has lots of features\n<li>Sub Woofers</li>\n<li>2gig NV processor</li>\n</p>\nReally worth the price', 1, 4.5),
('96be2eb2f44a8aa5327a7cd13d2a14a8', 'p_000008', 'vipranarayan14@gmail.com', 'Prasanna Venkatesh', '2012-10-05 05:51:22', 'nice quality', 1, 4.5),
('211c1c0237aa8923e6c3d38fe6c11d52', 'p_000007', 'sandalblack19@gmail.com', 'Gopikrishna S', '2012-10-30 07:11:18', 'The product is very good and in excellent condition', 1, 5),
('584945418818c655d04f5bb7544227ef', 'p_000008', 'sandalblack19@gmail.com', 'Gopikrishna S', '2012-10-31 02:05:24', 'it is really big', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `os_inbox`
--

CREATE TABLE IF NOT EXISTS `os_inbox` (
  `Id` tinytext COLLATE utf8_bin NOT NULL,
  `uname` tinytext COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text COLLATE utf8_bin NOT NULL,
  `viewed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `os_inbox`
--

INSERT INTO `os_inbox` (`Id`, `uname`, `date`, `content`, `viewed`) VALUES
('6d4717efa4aacecee13a72446dafa5f5', 'sandalblack19@gmail.com', '2013-06-02 03:31:21', 'Hello ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `os_orders`
--

CREATE TABLE IF NOT EXISTS `os_orders` (
  `orderId` tinytext NOT NULL,
  `productId` varchar(8) NOT NULL,
  `userId` tinytext NOT NULL,
  `date` date NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(2) NOT NULL,
  `mode` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `os_orders`
--

INSERT INTO `os_orders` (`orderId`, `productId`, `userId`, `date`, `price`, `quantity`, `status`, `mode`) VALUES
('6c86556a3d02a28f79b8adda41a9487ff0473ad7', 'p_000008', 'vipranarayan14@gmail.com', '2012-10-05', 1960, 1, 'D', 'CD'),
('e13039730ebe0d8dbf7ab0cee6f8ad4d363457cb', 'p_000004', 'vipranarayan14@gmail.com', '2012-10-13', 409.5, 3, 'R', 'MP'),
('72c315b9b6da1f6fc2318dc707ad172f4f6d7cdd', 'p_000007', 'sandalblack19@gmail.com', '2012-10-30', 1299, 1, 'D', 'MP'),
('8bbc8e5db74b568c868d5f7ef2248ed705c8c8dc', 'p_000007', 'sandalblack19@gmail.com', '2012-10-31', 2598, 2, 'R', 'MP'),
('a87dd16ea87009ef060cc1fa58872d2337bc1d8e', 'p_000002', 'ramakrishnan219@gmail.com', '2012-10-31', 3599.99, 1, 'O', 'MP'),
('b105446545f0a255483d74e961961f4cc3c17208', 'p_000007', 'ramakrishnan219@gmail.com', '2012-10-31', 1299, 1, 'O', 'MP');

-- --------------------------------------------------------

--
-- Table structure for table `os_products`
--

CREATE TABLE IF NOT EXISTS `os_products` (
  `Id` varchar(8) COLLATE utf8_bin NOT NULL,
  `Name` text COLLATE utf8_bin NOT NULL,
  `Category` varchar(8) COLLATE utf8_bin NOT NULL,
  `Desc` text COLLATE utf8_bin,
  `Spec` longtext COLLATE utf8_bin,
  `Image` text COLLATE utf8_bin,
  `Stock` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Price` float NOT NULL,
  `Discount` int(11) NOT NULL,
  `Delivery` int(11) NOT NULL,
  `Available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `os_products`
--

INSERT INTO `os_products` (`Id`, `Name`, `Category`, `Desc`, `Spec`, `Image`, `Stock`, `Date`, `Price`, `Discount`, `Delivery`, `Available`) VALUES
('p_000000', 'Pencil', 'cat_stat', 'Nice set of HB6 pencils for students', 'Point : HB6', 'p_000000.jpg', 0, '2012-07-03 02:17:58', 2, 0, 3, 1),
('p_000001', 'Pencil', 'cat_stat', 'Nice set of HB6 pencils for students', 'Point : HB6<br>\r\nColor : Black', 'p_000001.jpg', 20, '2012-07-03 02:22:12', 2.15, 0, 3, 1),
('p_000002', 'Harry Potter Series', 'cat_book', 'Contains all the seven adventurous series by J K Rowling ', 'Book 1 : Sorcerer Stone<br>\r\nBook 2 : Chamber of Secrets<br>\r\nBook 3 : Prisoner of Azkabhan<br>\r\nBook 4 : Goblet of Fire<br>\r\nBook 5 : Order of Pheonix<br>\r\nBook 6 : Half Blood Prince<br>\r\nBook 7 : Deathly Hallows<br>', 'p_000002.png', 3, '2012-07-03 03:47:09', 3999.99, 10, 5, 1),
('p_000003', 'Dell XPS L502', 'cat_coac', 'A 15" Laptop', 'Processor : Intel Core i5<br>\r\nRAM : 6 GB<br>\r\nGraphics Card : Nvidia 2GB<br>\r\nHDD : 500GB<br>\r\n<br>\r\nOptional : Genuine Windows<br>', 'p_000003.png', 2, '2012-07-05 04:17:51', 60000, 5, 7, 1),
('p_000004', 'Immortals of Meluha', 'cat_book', 'Amish Tripathi is an Indian author who resides in the city of Mumbai.\r\n<br><br>\r\nAfter his initial novel, The Immortals of Meluha, Tripathi followed it up with a sequel and another bestseller, The Secret of the Nagas.\r\n<br><br>\r\nAs a writer, Tripathi explains the concept of Karma and reincarnation in his books with succinct ease. He''s often commended for his meticulous research, which contributes to making his books very interesting.\r\n\r\nAmish hails from Mumbai, and is an alumnus of IIM Kolkata. He was employed in the financial service industry for 14 years before he took up writing.', 'The Immortals of Meluha is the first novel of the Shiva trilogy series by Amish Tripathi. The story is set in the land of Meluha and begins with the arrival of the Tibetan tribal Shiva. The Meluhan belief that Shiva is their fabled saviour Neelkanth, is confirmed when he consumes the Somras, a legendary healing potion, which turns his throat blue. Shiva decides to help the Meluhans in their war against the Chandravanshis, who had joined forces with a cursed group called Nagas.', 'p_000004.jpg', 4, '2012-07-06 10:06:27', 195, 30, 4, 1),
('p_000005', 'Samsung Monte - S5620', 'cat_moac', 'There are so many affordable touch phones on the market right now that itâ€™s getting very hard to choose. We present to you the Samsung S5620, which brings high-end connectivity to the table in a modern, compact package.', '<table><tr><td class="ttl">Features</td><td class="nfo">- Social networking integration with live updates<br>\r\n- Google Maps 3.0<br>\r\n- Image editor<br>\r\n- MP3/WMA/eAAC+ player<br>\r\n- MP4/H.263/H.264 player<br>\r\n- Organizer<br>\r\n- Voice memo<br>\r\n- Predictive text input</td></tr></table>', 'p_000005.jpg', 1, '2012-07-06 10:38:24', 7200, 0, 5, 1),
('p_000006', 'Avatar [TV Series]', 'cat_entr', 'Contains all three seasons from an exciting story of the last air bender: AVATAR', 'Book 1 : Water<br>\r\nBook 2 : Earth<br>\r\nBook 3 : Fire<br>', 'p_000006.png', 2, '2012-07-12 04:03:41', 800, 10, 3, 1),
('p_000007', 'Eveready Emergengency Light', 'cat_home', '<li>40 LEDs</li>\r\n<li>Overcharge Protection</li>\r\n<li>Over Discharge Protection</li>\r\n<li>Auto Start</li>\r\n<li>Charging Indicator</li>', '<table>\n<tr><td colspan=''2''><b>GENERAL</b></td></tr>\n<tr><td>Type</td><td>LED</td></tr>\n<tr><td colspan=''2''><b>PERFORMANCE FEATURES</b></td></tr>\n<tr><td>Indicators</td><td>Charging Indicator</td></tr>\n<tr><td>Number of LEDs</td><td>40 LEDs</td></tr>\n<tr><td colspan=''2''><b>CONVENIENCE FEATURES</b></td></tr>\n<tr><td>Auto Start</td><td>Yes</td></tr>\n<tr><td colspan=''2''><b>POWER</b></td></tr>\n<tr><td>Overcharge Protection</td><td>Yes</td></tr>\n<tr><td>Over Discharge Protection</td><td>Yes</td></tr>\n<tr><td>Rechargeable Battery</td><td>Yes</td></tr>\n<tr><td colspan=''2''><b>ADDITIONAL FEATURES</b></td></tr>\n<tr><td>Other Features</td><td>Maintenance-free Light, Two Levels of Bright White Light\n<tr><td colspan=''2''><b>WARRANTY</b></td></tr>\n<tr><td>Domestic Term</td><td>6 Months</td></tr>\n<tr><td>Warranty Summary</td><td>with 6 Months Eveready Warranty</td></tr>\n</table>', 'p_000007.jpeg', 3, '2012-09-30 22:27:12', 1299, 0, 3, 1),
('p_000008', 'Fantasy Wallpaper', 'cat_home', 'Nice Wallpaper', '', 'p_000008.jpg', 9, '2012-10-05 05:50:14', 2000, 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `os_sold`
--

CREATE TABLE IF NOT EXISTS `os_sold` (
  `productId` varchar(8) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `os_sold`
--

INSERT INTO `os_sold` (`productId`, `quantity`) VALUES
('p_000000', 10),
('p_000001', 0),
('p_000002', 2),
('p_000003', 0),
('p_000004', 6),
('p_000005', 0),
('p_000006', 0),
('p_000007', 4),
('p_000008', 1),
('p_000009', 0),
('p_000010', 0),
('p_000007', 4),
('p_000008', 1);

-- --------------------------------------------------------

--
-- Table structure for table `os_usercart`
--

CREATE TABLE IF NOT EXISTS `os_usercart` (
  `userId` tinytext NOT NULL,
  `productId` varchar(8) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `os_users`
--

CREATE TABLE IF NOT EXISTS `os_users` (
  `dName` tinytext COLLATE utf8_bin NOT NULL,
  `uName` tinytext COLLATE utf8_bin NOT NULL,
  `uPass` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `os_users`
--

INSERT INTO `os_users` (`dName`, `uName`, `uPass`) VALUES
('Gopikrishna S', 'sandalblack19@gmail.com', '29d43616152a018e7b23b51104d25b0d'),
('Administrator', 'Administrator', '31111a181174ef264a929d112cbdb506'),
('Prasanna Venkatesh', 'vipranarayan14@gmail.com', '297de114fc129a2115b8f013f3eea089'),
('Ram', 'ramakrishnan219@gmail.com', '4641999a7679fcaef2df0e26d11e3c72'),
('Gopi', 'san19@g.c', '29d43616152a018e7b23b51104d25b0d');

-- --------------------------------------------------------

--
-- Table structure for table `os_visited`
--

CREATE TABLE IF NOT EXISTS `os_visited` (
  `productId` varchar(8) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `os_visited`
--

INSERT INTO `os_visited` (`productId`, `count`) VALUES
('p_000000', 13),
('p_000001', 5),
('p_000002', 7),
('p_000003', 10),
('p_000004', 89),
('p_000005', 20),
('p_000006', 7),
('p_000007', 15),
('p_000008', 5),
('p_000009', 0),
('p_000010', 0),
('p_000007', 15),
('p_000008', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `os_category`
--
ALTER TABLE `os_category`
 ADD PRIMARY KEY (`catId`), ADD UNIQUE KEY `catId` (`catId`), ADD KEY `catId_2` (`catId`);

--
-- Indexes for table `os_products`
--
ALTER TABLE `os_products`
 ADD PRIMARY KEY (`Id`), ADD UNIQUE KEY `Id` (`Id`), ADD KEY `Category` (`Category`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `os_products`
--
ALTER TABLE `os_products`
ADD CONSTRAINT `os_products_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `os_category` (`catId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
