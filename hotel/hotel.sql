-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2016 at 03:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `h_id` int(11) NOT NULL,
  `h_name` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `path` varchar(220) DEFAULT NULL,
  PRIMARY KEY (`h_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`h_id`, `h_name`, `address`, `description`, `path`) VALUES
(1, 'Atlantis, The Palm', 'Crescent Rd - Dubai - United Arab Emirates', 'Set on the iconic Palm Jumeirah island with views of the Arabian Gulf, this luxurious resort is 14 km from Wild Wadi Water Park and 15 km from Mall of the Emirates', '../images/atl.jpg'),
(2, 'Park Inn Al Rigga', 'Rigga Al Buteen street, Dubai 126012 - Dubai - United Arab Emirates', 'Centrally located in Dubai’s bustling district of Deira, Park Inn by Radisson Hotel Apartments Al Rigga provides spacious, classy accommodation just a 10-minute walk from Dubai Creek', '../images/Park Inn.jpg'),
(3, 'Monaco Hotel', 'Al Muraqqabat Rd - Dubai - United Arab Emirates', 'Monaco Hotel in Dubai’s Deira district is 4 km away from Dubai World Trade Centre and boasts free Wi-Fi in all areas. The hotel offers an outdoor pool, a fitness centre with sauna and free parking.', '../images/monaco.jpg'),
(4, 'Ramada Deira', 'Salahudin Road Deira. - Dubai - United Arab Emirates', 'Located within a walking distance from Salahuddin Metro Station, Ramada Deira LLC features an outdoor swimming pool, a gym and a restaurant that serves breakfast buffet.', '../images/rama.jpg'),
(5, 'Movenpick Apartments', '19th Street, Oud Metha Area - Dubai - United Arab Emirates', 'In the heart of Dubai, the Mövenpick Apartments Bur Dubai is a 10-minute drive from Dubai International Airport. These self-catering apartments have free Wi-Fi and some include a private balcony.', '../images/moven.jpg'),
(6, 'Jumeirah Lakes Tower', 'Jumeirah Beach Road, Umm Suqeim, Dubai, United Arab Emirates', 'Located in Jumeirah Lake Towers, Dubai Apartments - Jumeirah Lakes Towers - Lake Terrace Tower offers an outdoor pool and a fitness centre. Free Wi-Fi is available in the apartment.', '../images/lakes.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
