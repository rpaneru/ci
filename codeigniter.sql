-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2018 at 04:27 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 5.6.32-1+ubuntu16.04.1+deb.sury.org+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `emailLog`
--

CREATE TABLE `emailLog` (
  `id` int(11) NOT NULL,
  `smtpRelayerId` int(11) NOT NULL,
  `emailOrigin` enum('Website','Cron') NOT NULL DEFAULT 'Website',
  `messageId` varchar(50) NOT NULL,
  `controllerFunction` varchar(100) NOT NULL,
  `userIdFrom` int(11) NOT NULL,
  `emailFrom` varchar(50) NOT NULL,
  `userIdTo` int(11) NOT NULL,
  `emailTo` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `dateTime` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `rejectReason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emailLog`
--

INSERT INTO `emailLog` (`id`, `smtpRelayerId`, `emailOrigin`, `messageId`, `controllerFunction`, `userIdFrom`, `emailFrom`, `userIdTo`, `emailTo`, `subject`, `body`, `dateTime`, `status`, `rejectReason`) VALUES
(1, 1, 'Website', '6cb6953f9dd14f4390bdb9d57b30ede8', 'Auth/forgotPassword', 0, 'rajeshpaneru@myworkforce.org', 1, 'rpaneru1986@gmail.com', 'Reset Password', 'Click here you reset your password', '2018-01-06 14:27:05', 'queued', ''),
(2, 1, 'Website', '55308bdb8a914867aa06f1d9d03f237b', 'Auth/forgotPassword', 0, 'rajeshpaneru@myworkforce.org', 1, 'rpaneru1986@gmail.com', 'Reset Password', 'Click here you reset your password', '2018-01-06 22:16:27', 'queued', '');

-- --------------------------------------------------------

--
-- Table structure for table `profileTypes`
--

CREATE TABLE `profileTypes` (
  `profileTypeId` int(11) NOT NULL,
  `profileType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profileTypes`
--

INSERT INTO `profileTypes` (`profileTypeId`, `profileType`) VALUES
(1, 'Guest'),
(2, 'Admin'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `profileTypeServices`
--

CREATE TABLE `profileTypeServices` (
  `profileTypeServiceId` int(11) NOT NULL,
  `profileTypeId` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profileTypeServices`
--

INSERT INTO `profileTypeServices` (`profileTypeServiceId`, `profileTypeId`, `serviceId`) VALUES
(1, 3, 2),
(2, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceId` int(11) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `function` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceId`, `controller`, `function`) VALUES
(1, 'Welcome', 'index'),
(2, 'Admin', 'dashboard'),
(3, 'Profile', 'listProfiles');

-- --------------------------------------------------------

--
-- Table structure for table `smtpRelayer`
--

CREATE TABLE `smtpRelayer` (
  `id` int(11) NOT NULL,
  `host` varchar(50) NOT NULL,
  `port` int(3) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fromName` varchar(50) NOT NULL,
  `fromEmail` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smtpRelayer`
--

INSERT INTO `smtpRelayer` (`id`, `host`, `port`, `userName`, `password`, `fromName`, `fromEmail`, `status`) VALUES
(1, 'smtp.mandrillapp.com', 587, 'Myworkforce Technologies', 'bXSinsd_xFc6_-QTfT5xCA', 'Rajesh Paneru', 'rajeshpaneru@myworkforce.org', '0');

-- --------------------------------------------------------

--
-- Table structure for table `userProfileTypes`
--

CREATE TABLE `userProfileTypes` (
  `userProfileTypeId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `profileTypeId` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userProfileTypes`
--

INSERT INTO `userProfileTypes` (`userProfileTypeId`, `userId`, `profileTypeId`, `status`) VALUES
(1, 1, 3, '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `profilePic` varchar(50) NOT NULL,
  `sessionId` varchar(30) DEFAULT NULL,
  `createdByUserId` int(11) DEFAULT NULL,
  `createdDateTime` datetime DEFAULT NULL,
  `updatedByUserId` int(11) DEFAULT NULL,
  `updatedDateTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `mobile`, `password`, `status`, `profilePic`, `sessionId`, `createdByUserId`, `createdDateTime`, `updatedByUserId`, `updatedDateTime`) VALUES
(1, 'Rajesh Paneru', 'rpaneru1986@gmail.com', 8130654757, '014d6931fd1ed69b3054ce1e725e2b82', '0', 'rajeshpaneru.jpg', NULL, NULL, '2018-01-01 00:00:00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emailLog`
--
ALTER TABLE `emailLog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profileTypes`
--
ALTER TABLE `profileTypes`
  ADD PRIMARY KEY (`profileTypeId`);

--
-- Indexes for table `profileTypeServices`
--
ALTER TABLE `profileTypeServices`
  ADD PRIMARY KEY (`profileTypeServiceId`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `smtpRelayer`
--
ALTER TABLE `smtpRelayer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userProfileTypes`
--
ALTER TABLE `userProfileTypes`
  ADD PRIMARY KEY (`userProfileTypeId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emailLog`
--
ALTER TABLE `emailLog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `profileTypes`
--
ALTER TABLE `profileTypes`
  MODIFY `profileTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `profileTypeServices`
--
ALTER TABLE `profileTypeServices`
  MODIFY `profileTypeServiceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `smtpRelayer`
--
ALTER TABLE `smtpRelayer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userProfileTypes`
--
ALTER TABLE `userProfileTypes`
  MODIFY `userProfileTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
