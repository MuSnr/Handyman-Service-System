-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 10:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- Database: `fundisdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL,
  `userimage` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `userimage`) VALUES
(1, 'Admin', 'fundis@gmail.com', '654321', '');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `bookdate` date NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `userlocation` varchar(255) NOT NULL,
  `fundiemail` varchar(255) NOT NULL,
  `fundiname` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `username`, `bookdate`, `useremail`, `userlocation`, `fundiemail`, `fundiname`, `service`, `price`, `status`) VALUES
(20, 'Ghost', '2023-03-27', 'ghostie@gmail.com', 'Nairobi', 'von@gmail.com', '0', 'Mechanic', 0, 0),
(23, 'Stano', '2023-03-27', 'andahi@gmail.com', 'Westlands', 'durk@gmail.com', 'Lil Durk', 'Electrician', 500, 0),
(24, 'Stano', '2023-03-29', 'andahi@gmail.com', 'Westlands', 'munity@gmail.com', 'CodeMunity', 'Electrician', 1200, 0),
(25, 'Jay', '2023-03-30', 'jay@gmail.com', 'Nairobi', 'munity@gmail.com', 'CodeMunity', 'Electrician', 1200, 1),
(27, 'Stano', '2023-03-30', 'andahi@gmail.com', 'Westlands', 'von@gmail.com', 'King Von', 'Mechanic', 3000, 1),
(28, 'Jay', '2023-03-31', 'jay@gmail.com', 'Nairobi', 'munity@gmail.com', 'CodeMunity', 'Electrician', 1200, 0),
(29, 'Lil Baby', '2023-03-28', 'lil@gmail.com', 'Juja', 'ian@gmail.com', 'Ian', 'Mechanic', 3200, 1),
(30, 'Stano', '2023-04-01', 'andahi@gmail.com', 'Westlands', 'von@gmail.com', 'King Von', 'Mechanic', 3000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `regnumber` int(10) NOT NULL,
  `userimage` varchar(60) NOT NULL DEFAULT '0',
  `experience` int(11) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `location`, `password`, `regnumber`, `userimage`, `experience`, `status`) VALUES
(5, 'Ghost', 'ghostie@gmail.com', '0114096557', 'Nairobi', 'e10adc3949ba59abbe56e057f20f883e', 39491223, '544408631.jpg', 0, '1'),
(7, 'Phenny', 'atieno@gmail.com', '0145487855', 'Nairobi', '25d55ad283aa400af464c76d713c07ad', 101010, '1075304337.jpg', 3, '1'),
(8, 'Stano', 'andahi@gmail.com', '0114068776', 'Westlands', 'e3ceb5881a0a1fdaad01296d7554868d', 326598, '341478682.jpg', 5, '1'),
(9, 'Lewis', 'lewis@gmail.com', '012457878', 'Burnt Forest', 'e3ceb5881a0a1fdaad01296d7554868d', 0, '0', 0, '1'),
(10, 'Jay', 'jay@gmail.com', '0114068776', 'Nairobi', '96e79218965eb72c92a549dd5a330112', 12121212, '929579999.png', 0, '1'),
(11, 'Lil Baby', 'lil@gmail.com', '0115139654', 'Juja', 'e10adc3949ba59abbe56e057f20f883e', 326598, '1537174965.png', 5, '1'),
(12, 'Joan', 'joan@gmail.com', '0725441010', 'Kimbo', 'e10adc3949ba59abbe56e057f20f883e', 3949123, '2012029673.jpg', 5, '1');

-- --------------------------------------------------------

--
-- Table structure for table `fundis`
--

CREATE TABLE `fundis` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `regnumber` int(11) NOT NULL,
  `userimage` varchar(60) NOT NULL,
  `service` varchar(255) NOT NULL,
  `experience` int(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `payment` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fundis`
--

INSERT INTO `fundis` (`id`, `name`, `email`, `phone`, `location`, `password`, `regnumber`, `userimage`, `service`, `experience`, `status`, `payment`) VALUES
(4, 'King Von', 'von@gmail.com', '0764646464', 'Chicago', '0259d654a535f8c2ac7dbcd3c630ec2d', 202020, '60769480.jpg', 'Mechanic', 7, 1, 3000),
(6, 'Ian', 'ian@gmail.com', '0745112145', 'Thika', '25d55ad283aa400af464c76d713c07ad', 121212, '1396065397.jpg', 'Plumber', 9, 1, 13450),
(9, 'Lil Durk', 'durk@gmail.com', '0145487855', 'Juja', 'e10adc3949ba59abbe56e057f20f883e', 326598, '1655662872.jpg', 'Electrician', 9, 1, 500),
(10, 'CodeMunity', 'munity@gmail.com', '0725441010', 'Kitengela', 'e10adc3949ba59abbe56e057f20f883e', 394912, '1092626125.jpg', 'Electrician', 9, 1, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `profilepics` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `profilepics`) VALUES
(1, '855456655.png');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(255) NOT NULL,
  `servicename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `servicename`) VALUES
(1, 'Electrician'),
(2, 'Plumber'),
(3, 'Mechanic'),
(4, 'System/Hadware Specialist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fundis`
--
ALTER TABLE `fundis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fundis`
--
ALTER TABLE `fundis`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
