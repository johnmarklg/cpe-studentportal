-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2016 at 01:25 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgrading`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `Lastname` text NOT NULL,
  `Firstname` text NOT NULL,
  `MI` text NOT NULL,
  `first` text NOT NULL,
  `second` text NOT NULL,
  `third` text NOT NULL,
  `fourth` text NOT NULL,
  `Final` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `Lastname`, `Firstname`, `MI`, `first`, `second`, `third`, `fourth`, `Final`) VALUES
(11, 'Marcellana', 'Dave', 'Rapsing', '87', '81', '91', '76', '91'),
(13, 'Pomperada', 'Jake', 'Rodriguez', '89', '91', '87', '89', '98'),
(14, 'Pomperada', 'Ma. Junallie', 'Fuetebella', '89', '91', '88', '86', '100'),
(15, 'Pomperada', 'Jacob Samuel', 'Fuentebella', '98', '87', '76', '82', '85'),
(16, 'Pomperada', 'Julianna Rae', 'Fuentebella', '87', '91', '92', '88', '84'),
(17, 'Pomperada', 'Frankie', 'Rodriguez', '87', '78', '89', '83', '75'),
(18, 'Pomperada', 'Lydia', 'Rodriguez', '87', '82', '91', '94', '100'),
(19, 'Pomperada', 'Bill', 'Rodriguez', '98', '87', '85', '97', '91');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
