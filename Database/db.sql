-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2018 at 01:49 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `name`, `password`, `address`, `avatar`, `gender`, `dob`, `phoneno`, `type`) VALUES
(1, 'ehtesham@gmail.com', 'Ehtesham', 'eht', 'Satkhira', NULL, 'male', '2011-10-05', '88012313', 'host'),
(2, 'nadu@ass.com', 'Nadu', 'nad', 'Nadmabad', NULL, 'Male', '1991-01-01', '86656776576', 'Host'),
(4, 'nadum@ass.com', 'Nadum', 'nad', 'Nadumabad', NULL, 'Male', '1991-01-01', '96656776576', 'Host');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `userid` int(11) NOT NULL,
  `articleid` int(11) NOT NULL,
  `article` longtext NOT NULL,
  `tourlocationid` int(11) NOT NULL,
  `posteddate` date NOT NULL,
  `varify` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`userid`, `articleid`, `article`, `tourlocationid`, `posteddate`, `varify`) VALUES
(1, 1, 'ba ba black sheep is roaming in sundarbans', 2, '2018-08-23', 'no'),
(1, 2, 'Bisanakandi is wonderful.I like the water and hills', 1, '2018-08-22', 'no'),
(2, 3, 'Sundarbans is a great place.Last year I went there with my friends', 2, '2018-08-22', 'no'),
(1, 4, 'sundarbans is the largest mangrove forest', 2, '2018-08-23', 'no'),
(1, 5, 'Sundarbans is the largest mangrove forest in the world', 2, '2018-08-23', 'no'),
(1, 6, 'Sundarbans is the only one mangrove forest', 2, '2018-08-23', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `articlerating`
--

CREATE TABLE `articlerating` (
  `articleid` int(11) NOT NULL,
  `commentersid` int(11) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `commentdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articlerating`
--

INSERT INTO `articlerating` (`articleid`, `commentersid`, `comment`, `commentdate`) VALUES
(1, 2, 'You are wrong.', '2018-08-21'),
(1, 1, 'Do you know anything', '2018-08-22'),
(2, 1, 'Hey Sundarbans', '2018-08-22'),
(2, 1, 'Hey Bisanakandi', '2018-08-22'),
(2, 1, 'Hey Ehtesham', '2018-08-22'),
(2, 4, 'Nadim is the best', '2018-08-22'),
(2, 4, 'Bisanakandi the best', '2018-08-22'),
(2, 4, 'Sundarbans the besto', '2018-08-22'),
(2, 2, 'Bisanadkandi ganjar akhra', '2018-08-22'),
(2, 2, 'Sunderbans a pirate', '2018-08-22'),
(2, 2, 'Hello world', '2018-08-22'),
(1, 2, 'Hello Bangladesh', '2018-08-22'),
(1, 2, 'johiro', '2018-08-22'),
(1, 2, 'nsa asd sad weqqw qrew lkas.asdasd asdsad\r\nwdw\r\nwr', '2018-08-22'),
(2, 2, 'asd wqrwq qwesad\r\nasdasd qwqwe.\r\nqw qweqwe sdfsdf.', '2018-08-22'),
(3, 2, 'Mangrove forest', '2018-08-22'),
(6, 1, 'No its not', '2018-08-23'),
(3, 2, 'I am the best', '2018-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `tourlocationbyarea`
--

CREATE TABLE `tourlocationbyarea` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `division` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `placetype` varchar(50) NOT NULL,
  `safety` varchar(50) NOT NULL,
  `Accomodation` varchar(50) NOT NULL,
  `travelvia` varchar(50) NOT NULL,
  `Recommendation` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tourlocationbyarea`
--

INSERT INTO `tourlocationbyarea` (`id`, `name`, `division`, `district`, `placetype`, `safety`, `Accomodation`, `travelvia`, `Recommendation`) VALUES
(1, 'Bisanakandi', 'Sylhet', 'Sylhet', 'hill,river', 'safe', 'hotel,motel', 'bus,air,boat', 'Go to hell'),
(2, 'Sundarbans', 'Khulna', 'Satkhira', 'forest,river', 'moderately safe', 'ship,boat,hotel', 'ship,boat,bus', 'Do not go there.Not a good place');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`articleid`);

--
-- Indexes for table `tourlocationbyarea`
--
ALTER TABLE `tourlocationbyarea`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `articleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tourlocationbyarea`
--
ALTER TABLE `tourlocationbyarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
