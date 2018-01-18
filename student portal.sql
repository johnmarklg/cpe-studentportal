-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2018 at 02:56 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpe-studentportal`
--
CREATE DATABASE IF NOT EXISTS `cpe-studentportal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cpe-studentportal`;

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `position` varchar(32) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `name`, `position`, `email`, `username`, `password`) VALUES
(1, 'System Administrator', 'Administrator (Elevated)', 'sysadmin', 'sysadmin', '1234'),
(2, 'Vladimir Ibañez', 'Administrator (Elevated)', 'test@gmail.com', 'vladimir', '1234'),
(3, 'Aljay Santos', 'Administrator', 'test@gmail.com', 'aljay', '1234'),
(4, 'Lovina Agbayani', 'Administrator', '1234', 'lovina', '1234'),
(5, 'Marifaye Flores', 'Administrator', '4321', 'marifaye', '1234'),
(6, 'Willen Mark Manzanas', 'Administrator', '213123', 'willen', '1234'),
(7, 'Sunshine Ramos', 'Administrator', 'asdasd', 'sunshine', '1234'),
(8, 'Diana Rose Tambogon', 'Administrator', 'sdasddsa', 'diana', '1234'),
(9, 'ACES (ICpEP.se)', 'Limited', 'aces@gmail.com', 'aces', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `title` text CHARACTER SET utf8,
  `description` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `start`, `end`, `title`, `description`) VALUES
(1, '2018-01-06', '2018-01-06', 'Foundation Day', 'MMSU'),
(2, '2018-01-29', '2018-01-29', 'OKAY?', 'another 1'),
(3, '2018-01-16', '2018-01-16', 'event this week', 'event');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(11) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `title` text CHARACTER SET utf8,
  `description` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `start`, `end`, `title`, `description`) VALUES
(2, '2018-01-18', '2018-01-18', 'holiday this week', 'okay');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `amount` float NOT NULL,
  `columnname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `status` varchar(2) NOT NULL COMMENT 'PN for pending, AP for approved, DP for disapproved, CL for closed',
  `posterid` int(11) NOT NULL,
  `poster` varchar(30) NOT NULL,
  `post` varchar(1000) NOT NULL,
  `fileurl` varchar(1000) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `status`, `posterid`, `poster`, `post`, `fileurl`, `datetime`) VALUES
(10, '', 1, 'System Administrator', '123', '', '2018-01-15 06:20:31'),
(11, '', 1, 'System Administrator', '234', '', '2018-01-15 06:20:34'),
(12, '', 1, 'System Administrator', '345', '', '2018-01-15 06:20:37'),
(13, '', 1, 'System Administrator', '456', '', '2018-01-15 06:20:40'),
(14, '', 1, 'System Administrator', '567', '', '2018-01-15 06:20:44'),
(15, '', 1, 'System Administrator', '678', '', '2018-01-15 06:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(15) NOT NULL,
  `year` int(11) NOT NULL,
  `section` varchar(15) NOT NULL,
  `code` varchar(15) NOT NULL,
  `subjectsection` varchar(15) NOT NULL,
  `starttime` varchar(15) NOT NULL,
  `endtime` varchar(15) NOT NULL,
  `days` varchar(15) NOT NULL,
  `building` varchar(15) NOT NULL,
  `roomnumber` varchar(15) NOT NULL,
  `instructor` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='list of subjects per year';

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `year`, `section`, `code`, `subjectsection`, `starttime`, `endtime`, `days`, `building`, `roomnumber`, `instructor`) VALUES
(1, 1, 'A', 'CHdasdsadEM 10', '1E', '8:00', '9:00', 'M,W,F', 'COE', '215', 'XYZ'),
(2, 1, 'B', 'CHEM 10', '1F', '9:00', '10:00', 'M,W,F', 'COE', '214', 'ZXY'),
(3, 2, '12321', '12312312', '321312123', '31231', '21321', '321321', '23123', '213', '21'),
(4, 2, 'A', '123123', '312321', '12', '', '', '', '', ''),
(5, 3, '2131', '2131', '12', '', '', '', '', '', ''),
(6, 3, 'A', 'sad', 'asdasd', '', '', '', '', '', ''),
(7, 4, 'asd', '', '', '', '', '', '', '', ''),
(8, 4, 'A', 'sda', 'asd', '', '', '', '', '', ''),
(9, 4, 'B', 'dsad', 'sada', '', '', '', '', '', ''),
(10, 4, 'C', 'dasda', 'sdas', 'asda', '', '', '', '', ''),
(11, 5, 'dsad', '', '', '', '', '', '', '', ''),
(12, 5, 'dsad', '', '', '', '', '', '', '', ''),
(13, 5, 'D', 'asdasdas', 'dsa', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `cfatscore` int(11) NOT NULL,
  `passcode` varchar(8) CHARACTER SET latin1 NOT NULL,
  `studnum` varchar(15) CHARACTER SET latin1 NOT NULL,
  `yearstarted` varchar(10) NOT NULL,
  `surname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `firstname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `middlename` varchar(50) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(10) CHARACTER SET latin1 NOT NULL,
  `status` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `citizenship` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `placeofbirth` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `contactnum` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `father` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `fatheroccupation` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `mother` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `motheroccupation` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `spouse` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `spouseoccupation` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `houseaddress` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `employer` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `businessaddress` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `telnum` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `elementary` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `elemaddress` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `elemgraduate` int(11) DEFAULT NULL,
  `secondary` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `secaddress` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `secgraduate` int(11) DEFAULT NULL,
  `college` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `coladdress` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `colgraduate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `cfatscore`, `passcode`, `studnum`, `yearstarted`, `surname`, `firstname`, `middlename`, `gender`, `status`, `citizenship`, `dateofbirth`, `placeofbirth`, `contactnum`, `address`, `father`, `fatheroccupation`, `mother`, `motheroccupation`, `spouse`, `spouseoccupation`, `houseaddress`, `employer`, `businessaddress`, `telnum`, `elementary`, `elemaddress`, `elemgraduate`, `secondary`, `secaddress`, `secgraduate`, `college`, `coladdress`, `colgraduate`) VALUES
(1, 0, '', '00-0000', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;--
-- Database: `cpe-studentrecords`
--
CREATE DATABASE IF NOT EXISTS `cpe-studentrecords` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cpe-studentrecords`;

-- --------------------------------------------------------

--
-- Table structure for table `00-0000`
--

CREATE TABLE `00-0000` (
  `courseid` int(11) NOT NULL,
  `1st` varchar(5) NOT NULL,
  `2nd` varchar(5) NOT NULL,
  `3rd` varchar(5) NOT NULL,
  `code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='default blank table';

--
-- Dumping data for table `00-0000`
--

INSERT INTO `00-0000` (`courseid`, `1st`, `2nd`, `3rd`, `code`) VALUES
(1, '', '', '', 'CHEM 10'),
(2, '', '', '', 'ENGL 1'),
(3, '', '', '', 'FIL 1'),
(4, '', '', '', 'MATH  12'),
(5, '', '', '', 'MATH 15'),
(6, '', '', '', 'NSTP 1'),
(7, '', '', '', 'PE 1'),
(8, '', '', '', 'CPE 100'),
(9, '', '', '', 'DRAW 11'),
(10, '', '', '', 'ENGL 2'),
(11, '', '', '', 'FIL 2'),
(12, '', '', '', 'MATH 13'),
(13, '', '', '', 'MATH 18'),
(14, '', '', '', 'MATH 27'),
(15, '', '', '', 'NSTP 2'),
(16, '', '', '', 'PE 2'),
(17, '', '', '', 'COMP 11'),
(18, '', '', '', 'CPE 130'),
(19, '', '', '', 'ECON 1'),
(20, '', '', '', 'ENGL 5'),
(21, '', '', '', 'MATH 28'),
(22, '', '', '', 'PE 3'),
(23, '', '', '', 'PHY 31'),
(24, '', '', '', 'CPE 111'),
(25, '', '', '', 'MATH 29'),
(26, '', '', '', 'MATH 60'),
(27, '', '', '', 'PE 4'),
(28, '', '', '', 'PHILO 3'),
(29, '', '', '', 'PHY 32'),
(30, '', '', '', 'SOCIO 1'),
(31, '', '', '', 'CPE 131'),
(32, '', '', '', 'DRAW 21'),
(33, '', '', '', 'ECE 132'),
(34, '', '', '', 'EE 101'),
(35, '', '', '', 'IE 101'),
(36, '', '', '', 'MATH 40'),
(37, '', '', '', 'MECH 101'),
(38, '', '', '', 'CPE 101'),
(39, '', '', '', 'CPE 121'),
(40, '', '', '', 'CPE 132E'),
(41, '', '', '', 'ECE 134'),
(42, '', '', '', 'EE 103'),
(43, '', '', '', 'MECH 102'),
(44, '', '', '', 'MECH 103'),
(45, '', '', '', 'CPE 103'),
(46, '', '', '', 'CPE 103'),
(47, '', '', '', 'CPE 172'),
(48, '', '', '', 'ECE 140'),
(49, '', '', '', 'ES 101'),
(50, '', '', '', 'IE 102'),
(51, '', '', '', 'IE 103'),
(52, '', '', '', 'CPE 114'),
(53, '', '', '', 'CPE 134'),
(54, '', '', '', 'CPE 136'),
(55, '', '', '', 'CPE 150'),
(56, '', '', '', 'ELECT 1'),
(57, '', '', '', 'PSYCH 1'),
(58, '', '', '', 'CPE 194'),
(59, '', '', '', 'CPE 112'),
(60, '', '', '', 'CPE 113'),
(61, '', '', '', 'CPE 151'),
(62, '', '', '', 'CPE 190'),
(63, '', '', '', 'ELECT 2'),
(64, '', '', '', 'HUM 1'),
(65, '', '', '', 'LIT 1'),
(66, '', '', '', 'CPE 145'),
(67, '', '', '', 'CPE 192'),
(68, '', '', '', 'CPE 197'),
(69, '', '', '', 'CPE 199'),
(70, '', '', '', 'ELECT 3'),
(71, '', '', '', 'ENTREP 1'),
(72, '', '', '', 'PI 1'),
(73, '', '', '', 'POL SCI 1');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `coursetitle` varchar(99) NOT NULL,
  `units` varchar(5) NOT NULL,
  `prerequisite` varchar(99) NOT NULL,
  `corequisite` varchar(99) NOT NULL,
  `year` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this is the list of subjects in the cpe curriculum';

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `code`, `coursetitle`, `units`, `prerequisite`, `corequisite`, `year`) VALUES
(1, 'CHEM 10', 'General Chemistry I', '4.0', '', '', ''),
(2, 'ENGL 1', 'Study and Thinking Skills in English', '3.0', '', '', ''),
(3, 'FIL 1', 'Komunikasyon sa Akademikong Filipino', '3.0', '', '', ''),
(4, 'MATH 12', 'College Algebra', '3.0', '', '', ''),
(5, 'MATH 15', 'Plane and Spherical Trigonometry', '3.0', '', '', ''),
(6, 'NSTP 1', 'National Service Training Program I', '3.0', '', '', ''),
(7, 'PE 1', 'Physical Fitness', '2.0', '', '', ''),
(8, 'CPE 100', 'Computer Hardware Fundamentals', '1.0', '', '', ''),
(9, 'DRAW 11', 'Engineering Drawing I', '1.0', '', '', ''),
(10, 'ENGL 2', 'Writing in the Discipline', '3.0', 'ENGL 1', '', ''),
(11, 'FIL 2', 'Pagbasa at Pagsulat sa Iba\'t-ibang Disiplina', '3.0', '', '', ''),
(12, 'MATH 13', 'Advanced Algebra', '2.0', 'MATH 12', '', ''),
(13, 'MATH 18', 'Solid Mensuration', '2.0', 'MATH 15 MATH 12', 'MATH 27', ''),
(14, 'MATH 27', 'Analytic Geometry', '2.0', 'MATH 15 MATH 12', '', ''),
(15, 'NSTP 2', 'National Service Training Program II', '3.0', 'NSTP 1', '', ''),
(16, 'PE 2', 'Dances', '2.0', '', '', ''),
(17, 'COMP 11', 'Computer Fundamentals and Programming', '3.0', 'MATH 13 MATH 15', '', '2nd'),
(18, 'CPE 130', 'Discrete Math', '3.0', 'MATH 12', '', ''),
(19, 'ECON 1', 'Principles of Economics with Agrarian Reform', '3.0', '', '', ''),
(20, 'ENGL 5', 'Scientific and Technical Writing and Report', '3.0', 'ENGL 2', '', ''),
(21, 'MATH 28', 'Differential Calculus', '4.0', 'MATH 27 MATH 13 MATH 18', '', ''),
(22, 'PE 3', 'Recreational Activities', '2.0', '', '', ''),
(23, 'PHY 31', 'General Physics', '4.0', 'MATH 27', 'MATH 28', ''),
(24, 'CPE 111', 'Data Structures and Algorithm Analysis', '4.0', 'COMP 11', '', '2nd'),
(25, 'MATH 29', 'Integral Calculus', '4.0', 'MATH 28 MATH 18', '', ''),
(26, 'MATH 60', 'Probability and Statistics for Engineers', '3.0', 'MATH 12', '', ''),
(27, 'PE 4', 'Team Sports', '2.0', '', '', ''),
(28, 'PHILO 3', 'Logic', '2.0', '', '', ''),
(29, 'PHY 32', 'General Physics II', '4.0', 'PHY 31', 'MATH 29', ''),
(30, 'SOCIO 1', 'Society and Culture with Family Planning', '3.0', '', '', ''),
(31, 'CPE 131', 'Computer System Organization with Assembly', '4.0', 'CPE 111', '', ''),
(32, 'DRAW 21', 'Computer Aided Drawing', '1.0', 'COMP 11 DRAW 11', '', '3rd'),
(33, 'ECE 132', 'Electronic Devices and Circuits', '4.0', 'MATH 29 PHY 32', '', ''),
(34, 'EE 101', 'Electrical Circuits I', '4.0', 'MATH 29 PHY 32', '', ''),
(35, 'IE 101', 'Engineering Economy and Accounting', '3.0', 'ECON 1 MATH 12', '', '3rd'),
(36, 'MATH 40', 'Differential Equations', '3.0', 'MATH 29', '', ''),
(37, 'MECH 101', 'Statics of Rigid Bodies', '3.0', 'MATH 29 PHY 31', '', ''),
(38, 'CPE 101', 'Advanced Engineering Math for CPE', '3.0', 'MATH 40', '', ''),
(39, 'CPE 121', 'Computer Engineering Drafting and Design', '1.0', '', '', '3rd'),
(40, 'CPE 132E', 'Logic Circuits and Switching Theories', '4.0', 'ECE 132', '', ''),
(41, 'ECE 134', 'Electronics Circuits Analysis and Design', '4.0', 'ECE 132', '', ''),
(42, 'EE 103', 'Electrical Circuits II', '4.0', 'EE 101', '', ''),
(43, 'MECH 102', 'Dynamics of Rigid Bodies', '2.0', 'MECH 101', '', ''),
(44, 'MECH 103', 'Mechanics of Deformable Bodies', '3.0', 'MECH 101', '', ''),
(45, 'CPE 103', 'Digital Signal Processing', '4.0', 'CPE 101', '', ''),
(46, 'CPE 133', 'Advanced Logic Circuits Design', '4.0', 'CPE 132E', '', ''),
(47, 'CPE 172', 'Control Systems for CPE', '4.0', 'ECE 134 EE 103', '', ''),
(48, 'ECE 140', 'Principles of Communication for CPE', '3.0', 'ECE 134 EE 103', '', ''),
(49, 'ES 101', 'Environmental Engineering', '2.0', 'CHEM 10', '', '4th'),
(50, 'IE 102', 'Engineering Management', '3.0', 'IE 101', '', '3rd'),
(51, 'IE 103', 'Safety Management', '1.0', '', '', '3rd'),
(52, 'CPE 114', 'Operating Systems', '4.0', 'CPE 131', '', '4th'),
(53, 'CPE 134', 'Computer Systems Architecture', '4.0', 'CPE 131 CPE 132E', '', ''),
(54, 'CPE 136', 'Microprocessor System', '4.0', 'CPE 131 CPE 133', '', ''),
(55, 'CPE 150', 'Data Communications for CPE', '3.0', 'ECE 140', '', ''),
(56, 'ELECT 1', 'CpE Technical Elective 1', '3.0', '', '', ''),
(57, 'PSYCH 1', 'General Psychology', '3.0', '', '', ''),
(58, 'CPE 194', 'On the Job Training (240 Hours)', '2.0', 'CPE 134 CPE 150', '', '4th'),
(59, 'CPE 112', 'Object Oriented Programming', '3.0', 'CPE 111', '', ''),
(60, 'CPE 113', 'Software Engineering', '3.0', 'CPE 111', '', ''),
(61, 'CPE 151', 'Computer Networks', '4.0', 'CPE 150', '', ''),
(62, 'CPE 190', 'Methods of Research', '2.0', 'CPE 136', '', ''),
(63, 'ELECT 2', 'CpE Technical Elective 2', '3.0', '', '', ''),
(64, 'HUM 1', 'Fundamental of the Arts', '3.0', '', '', ''),
(65, 'LIT 1', 'Literature of the Philippines', '3.0', '', '', ''),
(66, 'CPE 145', 'System Analysis and Design', '3.0', 'CPE 111 CPE 112', '', ''),
(67, 'CPE 192', 'Engineering Ethics and Computer Laws', '2.0', '', '', '5th'),
(68, 'CPE 197', 'CPE Design Project', '2.0', 'CPE 190', '', ''),
(69, 'CPE 199', 'Plant Visits and Seminars', '1.0', '', '', '5th'),
(70, 'ELECT 3', 'CpE Technical Elective 3', '3.0', '', '', ''),
(71, 'ENTREP 1', 'Entrepreneurship', '3.0', '', '', '5th'),
(72, 'PI 1', 'Life, Works, and Writings of Rizal', '3.0', '', '', ''),
(73, 'POL SCI', 'Politics and Governance with Constitution', '3.0', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `00-0000`
--
ALTER TABLE `00-0000`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `00-0000`
--
ALTER TABLE `00-0000`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
