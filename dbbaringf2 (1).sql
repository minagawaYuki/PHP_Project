-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 02:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbaringf2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblplaylist`
--

CREATE TABLE `tblplaylist` (
  `playlistid` int(20) NOT NULL,
  `userid` int(20) NOT NULL,
  `playlistname` varchar(50) NOT NULL,
  `songs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblplaylist`
--

INSERT INTO `tblplaylist` (`playlistid`, `userid`, `playlistname`, `songs`) VALUES
(1, 1, 'A new playlist', 'asd'),
(11, 0, 'playlist1', 'playlist1'),
(12, 0, 'playlist1', 'playlist1'),
(13, 0, 'playlist1', 'playlist1'),
(14, 0, 'as', 'as'),
(15, 18, 'as', 'as'),
(16, 18, 'asdaa', 'asdaa'),
(17, 18, 'asdadaa', 'asdadaa');

-- --------------------------------------------------------

--
-- Table structure for table `tblplaylistsongs`
--

CREATE TABLE `tblplaylistsongs` (
  `id` int(11) NOT NULL,
  `playlistid` int(255) NOT NULL,
  `songid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblplaylistsongs`
--

INSERT INTO `tblplaylistsongs` (`id`, `playlistid`, `songid`) VALUES
(1, 15, 1),
(2, 15, 2),
(3, 15, 3),
(4, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsongs`
--

CREATE TABLE `tblsongs` (
  `songid` int(11) NOT NULL,
  `songname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsongs`
--

INSERT INTO `tblsongs` (`songid`, `songname`) VALUES
(1, 'song1'),
(2, 'song2'),
(3, 'song3'),
(4, 'song4'),
(5, 'song5');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `accountid` int(20) NOT NULL,
  `emailadd` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` int(20) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`accountid`, `emailadd`, `username`, `password`, `usertype`) VALUES
(18, 'johndoe@gmail.com', 'johndoe', 123, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccountplaylist`
--

CREATE TABLE `tbluseraccountplaylist` (
  `id` int(11) NOT NULL,
  `accountid` int(255) NOT NULL,
  `playlistid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbluserprofile`
--

CREATE TABLE `tbluserprofile` (
  `userid` int(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluserprofile`
--

INSERT INTO `tbluserprofile` (`userid`, `firstname`, `lastname`, `gender`) VALUES
(12, 'john', 'doe', 'male'),
(13, 'john', 'doe', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblplaylist`
--
ALTER TABLE `tblplaylist`
  ADD PRIMARY KEY (`playlistid`);

--
-- Indexes for table `tblplaylistsongs`
--
ALTER TABLE `tblplaylistsongs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlistid` (`playlistid`),
  ADD KEY `songid` (`songid`);

--
-- Indexes for table `tblsongs`
--
ALTER TABLE `tblsongs`
  ADD PRIMARY KEY (`songid`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`accountid`);

--
-- Indexes for table `tbluseraccountplaylist`
--
ALTER TABLE `tbluseraccountplaylist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accountid` (`accountid`),
  ADD KEY `playlistid` (`playlistid`);

--
-- Indexes for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblplaylist`
--
ALTER TABLE `tblplaylist`
  MODIFY `playlistid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblplaylistsongs`
--
ALTER TABLE `tblplaylistsongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblsongs`
--
ALTER TABLE `tblsongs`
  MODIFY `songid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `accountid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbluseraccountplaylist`
--
ALTER TABLE `tbluseraccountplaylist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `userid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblplaylistsongs`
--
ALTER TABLE `tblplaylistsongs`
  ADD CONSTRAINT `tblplaylistsongs_ibfk_1` FOREIGN KEY (`playlistid`) REFERENCES `tblplaylist` (`playlistid`),
  ADD CONSTRAINT `tblplaylistsongs_ibfk_2` FOREIGN KEY (`songid`) REFERENCES `tblsongs` (`songid`);

--
-- Constraints for table `tbluseraccountplaylist`
--
ALTER TABLE `tbluseraccountplaylist`
  ADD CONSTRAINT `tbluseraccountplaylist_ibfk_1` FOREIGN KEY (`accountid`) REFERENCES `tbluseraccount` (`accountid`),
  ADD CONSTRAINT `tbluseraccountplaylist_ibfk_2` FOREIGN KEY (`playlistid`) REFERENCES `tblplaylist` (`playlistid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
