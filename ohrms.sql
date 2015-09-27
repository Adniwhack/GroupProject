-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2015 at 09:00 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ohrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('kayman@gmail.com', '$2y$10$gr5CKBtD/eNtsG.RKZQ/2e2HvDkzeLhh1dMeCANs98HTibVpT3tka');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `Customer_ID` varchar(60) NOT NULL DEFAULT '',
  `Customer_address` text NOT NULL,
  `Customer_FirstName` varchar(60) DEFAULT NULL,
  `Customer_Contact` int(11) NOT NULL,
  `Customer_LastName` varchar(60) NOT NULL,
  `Customer_Country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `email` varchar(60) NOT NULL DEFAULT '',
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `address` text NOT NULL,
  `Hotel_Name` varchar(60) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Hotel_ID` varchar(60) NOT NULL,
  `telephone_number` varchar(20) NOT NULL,
  `Hotel_Lat` float DEFAULT NULL,
  `Hotel_Lng` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`email`, `username`, `password`, `address`, `Hotel_Name`, `City`, `Country`, `Hotel_ID`, `telephone_number`, `Hotel_Lat`, `Hotel_Lng`) VALUES
('Dathotel@gmail.com', 'datxhotel', '$2y$10$CYT41dpYbHUXe67dRlCfHOmZdIdHyx8yKovPGzHkBV2VpPygunPxi', 'jhkjashkh', 'Hotel Datx', 'hkjhjkh', 'Sri Lanka', 'c805630119fa38439ead474848d7dab9', '123456789', NULL, NULL),
('hoteldeniro@gmail.com', 'hoteldeniro', '$2y$10$/A9LJovOJKAE4NYlCX4vb.w7zKZNcKL/dILo3AlbTxTgP5qHaIoyq', 'No. 20, Park Lane, Negombo', 'Hotel De Niro', 'Negombo', 'Sri Lanka', '301ebc3561e5ac8eb505882f5cf984fd', '00947852146', NULL, NULL),
('kayman@gmail.com', 'kayman', '$2y$10$/8PwTr7gB7BuHp.hKEMdyOrKFiHbuUSnDd1Mu8gNsKOZWIRlxuBUW', 'jkjl', 'The Best Hotel', 'hlasjl', 'hjhkh', '$2y$10$bXnSXgZ.QWrdA7HJpTbQlOgoZarU5bbYk2eh0UCkSh90p3Mg6q26.', 'kljlkjl', NULL, NULL),
('kjsaldjl@gamil.com', 'helldrive123', '$2y$10$9MnFA1B9r5.rF3iW7Uev6.NaHFCe1E1fhpcifVDzrblGrn7OA.oea', 'Add', 'Hotel De Hell', 'alsdjkl', 'Sri Lanka', '03fc6c88823d1a9150461e70ef547218', '13545630', NULL, NULL),
('kk@kk.kk', 'Kayman', '$2y$10$cO8yta/B0inJYXdIMtC44.GpcBWrLfoGd1nQOjqqFNLBzhXez7HYy', 'KKK', 'Dat Hotel', 'hksah', 'hkhs', 'd41d8cd98f00b204e9800998ecf8427e', '011462.', NULL, NULL),
('neelasguest@gmail.com', 'neelasguesthouse', '$2y$10$WK9ZBCYhOf7XsRWWkq0aNue8Y8Wdyh/oDI1RMQWfKB5iR0wYOVjXe', 'Hikkaduwa', 'Neelas Guesthouse and Beach Restaurant', 'Hikkaduwa', 'Sri Lanka', 'b17a084137b364d1ad164fcf2d97496a', '07155234560', NULL, NULL),
('oneemail@oneDomain.c', 'onehotel', '$2y$10$dIUePTJmYKZiZsNMPqL2W.JSoVlYkJd88a972n8Hl5pnPDb1A4Bla', 'Array', 'One Hotel', 'One City', 'One Country', '64e4e7b23cf7125c242188a7783de889', '011523610', NULL, NULL),
('Oneemail@onedomain.com', 'onetwohotel', '$2y$10$4rH5r1SlWig3XZU56zjmdOXECFR7EdqkJjrgQ.2aUxyTFhDyCsRsG', 'One Place', 'My Hotel', 'One City', 'Sri Lanka', 'f6a795e15b1e961a07ebd28b6d2027bc', '09156231526', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_photo`
--

CREATE TABLE IF NOT EXISTS `hotel_photo` (
  `email` varchar(60) NOT NULL,
  `photo_id` varchar(20) NOT NULL,
  `photo_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room`
--

CREATE TABLE IF NOT EXISTS `hotel_room` (
  `Hotel_email` varchar(60) NOT NULL DEFAULT '',
  `Room_id` varchar(60) NOT NULL DEFAULT '',
  `Room_type` char(20) NOT NULL,
  `Room_AC` varchar(10) DEFAULT NULL,
  `Room_description` text NOT NULL,
  `Cost_per_unit` float NOT NULL,
  `Room_photo_id` varchar(60) DEFAULT NULL,
  `Room_photo_location` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_room`
--

INSERT INTO `hotel_room` (`Hotel_email`, `Room_id`, `Room_type`, `Room_AC`, `Room_description`, `Cost_per_unit`, `Room_photo_id`, `Room_photo_location`) VALUES
('neelasguest@gmail.com', 'Room one', 'Single', 'A', 'Sea view', 2500, 'background.jpg', 'images/background.jpg'),
('neelasguest@gmail.com', 'Seaside Room', 'Double', 'A', 'Has A good Seaside View', 1500, 'neela2.jpg', 'images/neela2.jpg'),
('Oneemail@onedomain.c', 'Daffodil Room', 'Triple', 'on', 'Triple Room', 3000, 'background.jpg', 'images/background.jpg'),
('Oneemail@onedomain.c', 'Daisy Room', 'Double', 'on', 'Seaside ROom', 123456, 'back.jpg', 'images/back.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registered_customer`
--

CREATE TABLE IF NOT EXISTS `registered_customer` (
  `Customer_ID` varchar(60) NOT NULL DEFAULT '',
  `Customer_email` varchar(60) NOT NULL DEFAULT '',
  `Customer_password` varchar(60) NOT NULL,
  `Customer_username` varchar(20) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Customer_DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `ReservationID` int(20) NOT NULL,
  `UserID` varchar(60) DEFAULT NULL,
  `HotelID` varchar(60) DEFAULT NULL,
  `RoomID` varchar(20) NOT NULL,
  `Checkin` date NOT NULL,
  `Checkout` date NOT NULL,
  `Status` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `hotel_photo`
--
ALTER TABLE `hotel_photo`
  ADD PRIMARY KEY (`email`,`photo_id`);

--
-- Indexes for table `hotel_room`
--
ALTER TABLE `hotel_room`
  ADD PRIMARY KEY (`Hotel_email`,`Room_id`);

--
-- Indexes for table `registered_customer`
--
ALTER TABLE `registered_customer`
  ADD PRIMARY KEY (`Customer_ID`,`Customer_email`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ReservationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationID` int(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel_room`
--
ALTER TABLE `hotel_room`
  ADD CONSTRAINT `hotel_room_ibfk_1` FOREIGN KEY (`Hotel_email`) REFERENCES `hotel` (`email`);

--
-- Constraints for table `registered_customer`
--
ALTER TABLE `registered_customer`
  ADD CONSTRAINT `registered_customer_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
