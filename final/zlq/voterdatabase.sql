-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2024 at 10:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voterdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcandidate`
--

CREATE TABLE `addcandidate` (
  `id` int(20) NOT NULL,
  `cname` text NOT NULL,
  `symbol` varchar(200) NOT NULL,
  `cparty` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `votes` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addcandidate`
--

INSERT INTO `addcandidate` (`id`, `cname`, `symbol`, `cparty`, `photo`, `votes`) VALUES
(1, 'Rahil Gandhi', 'WhatsApp Image 2023-03-21 at 11.02.44 PM.jpeg', 'Congress', 'WhatsApp Image 2023-03-21 at 11.02.44 PM.jpeg', 3),
(4, 'Uddhav Tackrey', '44.jpg', 'Shiv Sena', '293896_417785301600923_1313159027_n.jpg', 1),
(12, 'sdkjfk', 'saad.jpeg', 'lksdjfk', 'saad.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(20) NOT NULL,
  `name` text NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `name`, `password`) VALUES
(1, 'Admin', 'Admin@1122');

-- --------------------------------------------------------

--
-- Table structure for table `voterregistration`
--

CREATE TABLE `voterregistration` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `dob` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `gender` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `idtype` text NOT NULL,
  `cnic` varchar(100) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `expire` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `cpass` varchar(100) NOT NULL,
  `status` int(100) NOT NULL,
  `votes` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voterregistration`
--

INSERT INTO `voterregistration` (`id`, `name`, `dob`, `email`, `mobile`, `gender`, `photo`, `idtype`, `cnic`, `issue`, `expire`, `pass`, `cpass`, `status`, `votes`) VALUES
(2, 'ui', '2002-02-06', 'skdjfkl@gmail.com', '2147483647', 'Female', 'Screenshot (3).png', '1', '334', '2000-11-21', '', '123', '123', 0, 0),
(3, 'zishan sjdfhjkh shaikh', '2001-08-09', '', '09090909090', 'Others', 'Screenshot 2023-11-11 114051.png', '', '111', '2000-08-09', '', 'y', 'y', -1, 0),
(4, 'zishan sjdfhjkh shaikh', '2001-08-09', '', '09090909090', 'Others', 'Screenshot 2023-11-11 114051.png', '', '111', '2000-08-09', '', 'ui', 'ui', 0, 0),
(5, 'zishan sjdfhjkh shaikh', '2001-08-09', '', '09090909090', 'Others', 'Screenshot 2023-11-11 114051.png', '', '111', '2000-08-09', '', '112', '112', 0, 0),
(6, 'zishan sjdfhjkh shaikh', '2000-12-11', 'sdkjflkj@gmail.com', '09090909090', 'Female', 'WhatsApp Image 2023-03-21 at 11.02.44 PM.jpeg', '', '122', '2012-12-12', '', '122', '122', -1, 0),
(7, 'Random', '2000-06-07', '', '8989898989', 'Others', 'WhatsApp Image 2023-03-21 at 11.02.44 PM.jpeg', '', '101', '2009-09-09', '', 'abc', 'abc', -1, 0),
(8, 'Random', '2000-06-07', '', '8989898989', 'Others', 'WhatsApp Image 2023-03-21 at 11.02.44 PM.jpeg', '', '100', '2009-09-09', '', '89', '89', -1, 0),
(9, 'sdljflks', '2001-09-09', '', '9090909090', 'Male', '2012-10-13 16.37.13.jpg', '', '10', '2000-09-09', '', '10', '10', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcandidate`
--
ALTER TABLE `addcandidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voterregistration`
--
ALTER TABLE `voterregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcandidate`
--
ALTER TABLE `addcandidate`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voterregistration`
--
ALTER TABLE `voterregistration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
