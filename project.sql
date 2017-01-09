-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2016 at 01:38 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(11) NOT NULL,
  `v_id` int(11) DEFAULT NULL,
  `hr_id` int(11) DEFAULT NULL,
  `check_in` varchar(255) DEFAULT NULL,
  `check_out` varchar(255) DEFAULT NULL,
  `total_rent` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `v_id`, `hr_id`, `check_in`, `check_out`, `total_rent`) VALUES
(1, 1, 1, '2016-10-22', '2016-10-22', 2500),
(2, 1, 2, '12/17/2016', '12/18/2016', 3000),
(3, 2, 2, '12/17/2016', '12/18/2016', 3000),
(4, 1, 3, '12/15/2016', '12/17/2016', 2300),
(5, 2, 3, '12/15/2016', '12/17/2016', 2300);

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `path` varchar(220) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`f_id`, `f_name`, `path`) VALUES
(1, 'Armani Hotel', '../images/r1.jpg'),
(2, 'Tong Thai', '../images/r2.jpg'),
(3, 'Dubai Fish Hut', '../images/r3.jpg'),
(4, 'Ravi\'s', '../images/r4.jpg'),
(5, 'Spa Cordon', '../images/spa1.jpg'),
(6, 'Willow Stream', '../images/spa3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `g_id` int(11) NOT NULL,
  `g_name` varchar(255) DEFAULT NULL,
  `exp` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `descrip` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`g_id`, `g_name`, `exp`, `age`, `img`, `descrip`) VALUES
(1, 'me', 2, 32, '../images/user.png', 'honest and hardworking'),
(2, 'you', 3, 35, '../images/user.png', 'hardworking and loyal ');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `h_id` int(11) NOT NULL,
  `h_name` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `path` varchar(220) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`h_id`, `h_name`, `address`, `description`, `path`) VALUES
(1, 'Atlantis The Palm', 'Crescent Rd - Dubai - United Arab Emirates', 'Set on the iconic Palm Jumeirah island with views of the Arabian Gulf, this luxurious resort is 14 km from Wild Wadi Water Park and 15 km from Mall of the Emirates', '../images/atl.jpg'),
(2, 'Park Inn Al Rigga', 'Rigga Al Buteen street, Dubai 126012 - Dubai - United Arab Emirates', 'Centrally located in Dubai’s bustling district of Deira, Park Inn by Radisson Hotel Apartments Al Rigga provides spacious, classy accommodation just a 10-minute walk from Dubai Creek', '../images/Park Inn.jpg'),
(3, 'Monaco Hotel', 'Al Muraqqabat Rd - Dubai - United Arab Emirates', 'Monaco Hotel in Dubai’s Deira district is 4 km away from Dubai World Trade Centre and boasts free Wi-Fi in all areas. The hotel offers an outdoor pool, a fitness centre with sauna and free parking.', '../images/monaco.jpg'),
(4, 'Ramada Deira', 'Salahudin Road Deira. - Dubai - United Arab Emirates', 'Located within a walking distance from Salahuddin Metro Station, Ramada Deira LLC features an outdoor swimming pool, a gym and a restaurant that serves breakfast buffet.', '../images/rama.jpg'),
(5, 'Movenpick Apartments', '19th Street, Oud Metha Area - Dubai - United Arab Emirates', 'In the heart of Dubai, the Mövenpick Apartments Bur Dubai is a 10-minute drive from Dubai International Airport. These self-catering apartments have free Wi-Fi and some include a private balcony.', '../images/moven.jpg'),
(6, 'Jumeirah Lakes Tower', 'Jumeirah Beach Road, Umm Suqeim, Dubai, United Arab Emirates', 'Located in Jumeirah Lake Towers, Dubai Apartments - Jumeirah Lakes Towers - Lake Terrace Tower offers an outdoor pool and a fitness centre. Free Wi-Fi is available in the apartment.', '../images/lakes.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_fac`
--

CREATE TABLE `hotel_fac` (
  `f_id` int(11) DEFAULT NULL,
  `h_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_fac`
--

INSERT INTO `hotel_fac` (`f_id`, `h_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room`
--

CREATE TABLE `hotel_room` (
  `hr_id` int(11) NOT NULL,
  `h_id` int(11) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL,
  `rent` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `in_use` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_room`
--

INSERT INTO `hotel_room` (`hr_id`, `h_id`, `r_id`, `rent`, `total`, `in_use`) VALUES
(1, 1, 1, 2500, 3, 0),
(2, 1, 2, 3000, 2, 0),
(3, 2, 2, 2300, 3, 2),
(4, 3, 1, 1500, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `i_id` int(11) NOT NULL,
  `h_id` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`i_id`, `h_id`, `path`) VALUES
(1, 1, '../images/user.png'),
(2, 1, '../images/al%20murooj.jpg'),
(3, 1, '../images/3840x2160-hotel-room-bed-furniture.jpg'),
(4, 1, '../images/arabian.jpg'),
(5, 1, '../images/spa3.jpg'),
(6, 2, '../images/al murooj.jpg'),
(8, 1, '../images/b1.jpg'),
(9, 1, '../images/b.jpg'),
(10, 1, '../images/d.jpg'),
(11, 1, '../images/download (3).jpg'),
(12, 1, '../images/e.jpg'),
(13, 1, '../images/f.jpg'),
(14, 1, '../images/g.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rev_id` int(11) NOT NULL,
  `v_id` int(11) DEFAULT NULL,
  `h_id` int(11) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rev_id`, `v_id`, `h_id`, `des`) VALUES
(1, 1, 1, 'good services');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(255) DEFAULT NULL,
  `adults` int(11) DEFAULT NULL,
  `child` int(11) DEFAULT NULL,
  `king` int(11) DEFAULT NULL,
  `queen` int(11) DEFAULT NULL,
  `twin` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`r_id`, `r_name`, `adults`, `child`, `king`, `queen`, `twin`) VALUES
(1, 'double', 2, 1, 1, 0, 0),
(2, 'twin', 2, 2, 1, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `v_id` int(11) NOT NULL,
  `Name` varchar(220) DEFAULT NULL,
  `Email` varchar(220) DEFAULT NULL,
  `Password` varchar(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`v_id`, `Name`, `Email`, `Password`) VALUES
(1, 'Visitor', 'email123@gmail.com', '123'),
(2, 'New user', 'example1@gmail.com', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `special_occ`
--

CREATE TABLE `special_occ` (
  `occ` varchar(255) NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `special_occ`
--

INSERT INTO `special_occ` (`occ`, `duration`, `image`, `link`) VALUES
('Dubai Shopping Festival', 'Jan-Feb', 'https://www.dubai.com/media/public/waleed/dubai_shopping_festival___.jpg', 'http://www.dubaishoppingfestival2013.com/'),
('Dubai Marathon', 'Jan-Feb', 'https://www.dubai.com/media/public/waleed/Dubai-Marathon_.jpg', 'http://www.dubaimarathon.org/'),
('Dubai Desert Classic', 'Feb-Mar', 'https://www.dubai.com/media/public/waleed/dubai-dessert-classic_.jpg', 'https://dubaidesertclassic.com/'),
('International Jazz Festival', 'Feb-Mar', 'https://www.dubai.com/media/public/waleed/Dubai-International-Jazz-Festival_.jpg', 'http://www.dubaijazzfest.com/'),
('Tennis Championships', 'Feb-Mar', 'https://www.dubai.com/media/public/waleed/Dubai_Tennis_Open_2014_Semi_Final_.JPG', 'https://www.google.com/search?q=Dubai+Tennis+Championships'),
('Desert Challenge', 'Mar-April', 'https://www.dubai.com/media/public/waleed/1654864_600_.jpg', 'http://abudhabidesertchallenge.com/'),
('Art Dubai', 'Mar-April', 'https://www.dubai.com/media/public/waleed/Art-Dubai_.jpg', 'http://artdubai.ae/'),
('Dubai World Cup', 'Mar-April', 'https://www.dubai.com/media/public/waleed/Dubai-World-Cup_.jpg', 'http://www.dubaiworldcup.com/'),
('The Bride Show', 'April-May', 'https://www.dubai.com/media/public/waleed/The-Bride-Show_.jpg', 'http://www.thebrideshow.com/Dubai/'),
('Festival of Taste', 'April-May', 'https://www.dubai.com/media/public/waleed/Festival-of-Taste_.jpg', 'http://www.tasteofdubaifestival.com/'),
('Dubai Summer Surprises', 'June-Aug', 'https://www.dubai.com/media/public/waleed/dubai-summer-surprises_.jpg', 'https://www.google.com/search?q=Dubai+Summer+Surprise'),
('Motexha Textile Show', 'Sep-Oct', 'https://www.dubai.com/media/public/waleed/Motexha-Textile-Show-Dubai_.jpg', 'https://www.google.com/search?q=Motexha+Textile+show'),
('Dubai Ruby Sevens', 'Nov-Dec', 'https://www.dubai.com/media/public/waleed/dubai-rugby-sevens_.jpg', 'http://www.dubairugby7s.com/'),
('International Film Festival', 'Nov-Dec', 'https://www.dubai.com/media/public/waleed/Dubai-International-Film-Festival_.jpg', 'http://www.dubaifilmfest.com/'),
('National Day Festival', 'Nov-Dec', 'https://www.dubai.com/media/public/waleed/National-Day-Festival_.jpg', 'https://www.google.com/search?q=National+Day+Festival');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `v_id` (`v_id`),
  ADD KEY `hr_id` (`hr_id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `hotel_fac`
--
ALTER TABLE `hotel_fac`
  ADD KEY `h_id` (`h_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `hotel_room`
--
ALTER TABLE `hotel_room`
  ADD PRIMARY KEY (`hr_id`),
  ADD KEY `h_id` (`h_id`),
  ADD KEY `r_id` (`r_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`i_id`),
  ADD KEY `h_id` (`h_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rev_id`),
  ADD KEY `v_id` (`v_id`),
  ADD KEY `h_id` (`h_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `special_occ`
--
ALTER TABLE `special_occ`
  ADD PRIMARY KEY (`occ`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
