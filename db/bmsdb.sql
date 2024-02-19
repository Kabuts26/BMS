-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 12:03 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbrgy_info`
--

CREATE TABLE `tblbrgy_info` (
  `id` int(11) NOT NULL,
  `province` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `brgy_name` varchar(50) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `city_logo` varchar(100) DEFAULT NULL,
  `brgy_logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbrgy_info`
--

INSERT INTO `tblbrgy_info` (`id`, `province`, `town`, `brgy_name`, `number`, `text`, `image`, `city_logo`, `brgy_logo`) VALUES
(1, 'Laguna', 'Magdalena', 'Barangay Salasad', '0919-1234567', '', '09052021075440182970012_615550183178722_2776607156578360582_n.jpg', '08022022173902sword.png', '22012022020740salasad.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblchairmanship`
--

CREATE TABLE `tblchairmanship` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblchairmanship`
--

INSERT INTO `tblchairmanship` (`id`, `title`) VALUES
(2, 'Presiding Officer'),
(3, 'Committee on Appropriation'),
(4, 'Committee on Peace & Order'),
(5, 'Committee on Health'),
(6, 'Committee on Education'),
(7, 'Committee on Rules'),
(8, 'Committee on Infra'),
(9, 'Committee on Solid Waste'),
(10, 'Committee on Sports'),
(11, 'No Chairmanship');

-- --------------------------------------------------------

--
-- Table structure for table `tblofficials`
--

CREATE TABLE `tblofficials` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `chairmanship` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblofficials`
--

INSERT INTO `tblofficials` (`id`, `name`, `chairmanship`, `position`, `contact`) VALUES
(5, 'Charles William Badulis Pogi', '4', '8', '123'),
(16, 'Allysa', '3', '9', '124'),
(17, 'Allysa', '4', '9', '123'),
(18, 'Kian', '2', '7', '09364049844'),
(19, 'Allysa Rubiales', '7', '14', '123123'),
(20, 'Charles William Badulis', '3', '8', '92747758'),
(21, 'Jericho', '8', '10', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayments`
--

CREATE TABLE `tblpayments` (
  `id` int(11) NOT NULL,
  `details` varchar(100) DEFAULT NULL,
  `amounts` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpayments`
--

INSERT INTO `tblpayments` (`id`, `details`, `amounts`, `date`, `user`, `name`) VALUES
(12, 'Barangay Clearance Payment', '50.00', '2022-02-10', 'admin', ' Kian Dela Pena Badulis'),
(13, 'Barangay Clearance Payment', '50.00', '2022-02-10', 'admin', ' Rose Dawa Dawat'),
(14, 'Barangay Clearance Payment', '20.00', '2022-02-10', 'admin', ' Kian Dela Pena Badulis'),
(15, 'Certificate of Indigency Payment', '21.00', '2022-02-10', 'admin', ' Kian Dela Pena Badulis'),
(16, 'Certificate of Indigency Payment', '12.00', '2022-02-10', 'admin', ' Kian Dela Pena Badulis'),
(17, 'Certificate of Indigency Payment', '20.00', '2022-02-10', 'admin', ' Kian Dela Pena Badulis'),
(18, 'Certificate of Residency Payment', '20.00', '2022-02-10', 'admin', ' Rose Dawa Dawat'),
(19, 'Solo Parent Certificate Payment', '50.00', '2022-02-10', 'admin', ' Kian Dela Pena Badulis'),
(20, 'Certificate of Cohabilitation Payment', '100.00', '2022-02-10', 'admin', ' Pogi Echo Jeko');

-- --------------------------------------------------------

--
-- Table structure for table `tblposition`
--

CREATE TABLE `tblposition` (
  `id` int(11) NOT NULL,
  `position` varchar(50) DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblposition`
--

INSERT INTO `tblposition` (`id`, `position`, `order`) VALUES
(4, 'Captain', 1),
(7, 'Councilor 1', 2),
(8, 'Councilor 2', 3),
(9, 'Councilor 3', 4),
(10, 'Councilor 4', 5),
(11, 'Councilor 5', 6),
(12, 'Councilor 6', 7),
(13, 'Councilor 7', 8),
(14, 'SK Chairman', 9),
(15, 'Secretary', 10),
(16, 'Treasurer', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tblresident`
--

CREATE TABLE `tblresident` (
  `id` int(11) NOT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `citizenship` varchar(50) DEFAULT NULL,
  `picture` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `middlename` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `birthplace` varchar(80) CHARACTER SET utf8mb4 DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `civilstatus` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `gender` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `purok` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresident`
--

INSERT INTO `tblresident` (`id`, `contact`, `citizenship`, `picture`, `firstname`, `middlename`, `lastname`, `birthplace`, `birthdate`, `age`, `civilstatus`, `gender`, `purok`, `email`, `occupation`, `address`) VALUES
(171, '', 'Filipino', '18052021113447Screenshot2021-05-06183815.png', 'Jecko', 'Poe', 'Coe', 'Metro  Manila', '2021-04-05', 1, 'Single', 'Male', 'Purok 2', 'cajanr02rtrt22@gmail.com', 'IT', '310 W Las Colinas Blvd'),
(187, '123123', 'Filipino', '01022022065501Axiebg.jpg', 'Pogi', 'Echo', 'Jeko', 'asdasdasd', '2022-01-18', 12, 'Single', 'Male', 'Purok 2', 'asd@gmail.com', 'dasdas', 'asdasdas'),
(196, '', 'Filipino', '10022022080753111.png', 'Kianss', 'William', 'Badulis', 'Bahay', '2022-02-15', 12, 'Single', 'Female', 'Purok 5', 'kianbadulis33@gmail.com', 'none', '4P Zamora, Magdalena Laguna'),
(195, '123123', 'Filipino', '01022022064426Pudge.png', 'kian', 'Dela Pena', 'Pogi', 'Sta Cruz laguna', '2022-02-01', 12, 'Single', 'Male', 'Purok 2', 'kayasakamoto@yahoo.com', 'none', '4P Zamora, Magdalena Laguna'),
(197, '', 'Taiwanese', '10022022080435dawat.jpg', 'Rose', 'Dawa', 'Dawat', 'Sta Cruz laguna', '2022-02-10', 21, 'Single', 'Male', 'Purok 4', 'dawatroseann@gmail.com', 'none', '4P Zamora, Magdalena Laguna'),
(198, '', 'Taiwanese', '10022022092556Vanguard_icon.png', 'kian', 'Dela Pena', 'Badulis', 'asdasdas', '2022-02-10', 23, 'Widow', 'Female', 'Purok 3', 'kiankian@gmail.com', 'asdas', '4P Zamora, Magdalena Laguna');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `user_type`, `avatar`, `created_at`) VALUES
(10, 'staff', '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', 'staff', '03052021043218user.jpg', '2021-05-03 02:32:18'),
(11, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'administrator', '22012022143349person.png', '2021-05-03 02:33:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbrgy_info`
--
ALTER TABLE `tblbrgy_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblchairmanship`
--
ALTER TABLE `tblchairmanship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblofficials`
--
ALTER TABLE `tblofficials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpayments`
--
ALTER TABLE `tblpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposition`
--
ALTER TABLE `tblposition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresident`
--
ALTER TABLE `tblresident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbrgy_info`
--
ALTER TABLE `tblbrgy_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblchairmanship`
--
ALTER TABLE `tblchairmanship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblofficials`
--
ALTER TABLE `tblofficials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblpayments`
--
ALTER TABLE `tblpayments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblposition`
--
ALTER TABLE `tblposition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblresident`
--
ALTER TABLE `tblresident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
