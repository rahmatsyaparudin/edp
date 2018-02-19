-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2018 at 08:31 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fileupload`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_list`
--

CREATE TABLE `file_list` (
  `file_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `file_desc` text,
  `location` tinytext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `username` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_list`
--

INSERT INTO `file_list` (`file_id`, `name`, `file_name`, `file_desc`, `location`, `status`, `username`, `timestamp`) VALUES
(2, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-17 13:53:20'),
(22, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-01 13:53:20'),
(23, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-02 13:53:20'),
(24, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-03 13:53:20'),
(25, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-04 13:53:20'),
(26, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-05 13:53:20'),
(27, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-06 13:53:20'),
(28, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-07 13:53:20'),
(29, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-08 13:53:20'),
(30, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-09 13:53:20'),
(31, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-10 13:53:20'),
(32, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-12 13:53:20'),
(34, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-13 13:53:20'),
(35, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-14 13:53:20'),
(36, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-15 13:53:20'),
(37, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-16 13:53:20'),
(38, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-18 13:53:20'),
(39, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-19 13:53:20'),
(40, 'File Percobaan', 'pdf.pdf', 'Description lists A description list is perfect for defining terms. Euismod Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Malesuada porta Etiam porta sem malesuada magna mollis euismod.', 'uploads/pdf.pdf', 1, 'admin', '2018-02-11 13:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `file_format` varchar(255) NOT NULL,
  `path_to_upload` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `file_format`, `path_to_upload`, `status`, `timestamp`) VALUES
(1, 'pdf', 'uploads', 1, '2018-02-19 17:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `isAdmin` tinyint(4) DEFAULT NULL,
  `isDeleted` tinyint(4) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `name`, `email`, `status`, `isAdmin`, `isDeleted`, `timestamp`) VALUES
('admin', '3iiFB9hctlVe_xAR9L-dxf1k5p_XMpoJwjemqgRoya4', 'Administrator', 'gmail@gmail.com', 1, 1, NULL, '2018-02-19 17:47:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_list`
--
ALTER TABLE `file_list`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_list`
--
ALTER TABLE `file_list`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
