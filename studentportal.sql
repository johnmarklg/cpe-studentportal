-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2018 at 11:32 PM
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
(1, 0, '2deb4f3f', '09-5381', '09', 'Padaoang', 'Arnel', 'C.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0, '0013321f', '10-2278', '10', 'Almo', 'Jorge', 'T', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0, '5e150a9c', '10-3133', '10', 'Baliscao', 'Krizel', 'De La Cruz', 'Female', 'Single', 'Filipino', '1993-12-11', 'Laoag City', '09179700186', 'Tanap, Burgos, I.N.', 'Dominador G. Baliscao', 'Retired Forester', 'Nicandra C. Baliscao', 'Teacher', NULL, NULL, NULL, NULL, NULL, NULL, 'Tanap Elementary School', 'Tanap, Burgos, I.N.', 2006, 'Ilocos Norte College of Arts and Trades', 'Laoag City', 2010, NULL, NULL, NULL),
(4, 0, 'cf5e18a0', '11-5095', '11', 'Laeno', 'Jerie May', 'Guieb', 'Female', 'Single', 'Filipino', '1995-05-27', 'Laoag City', '09157534848', 'Buyon, Bacarra, Ilocos Norte', 'Jerry V. Laeno', 'Teacher', 'Jesusa G. Laeno', 'Teacher', NULL, NULL, NULL, NULL, NULL, NULL, 'Buyon Elementary School', 'Buyon, Bacarra, Ilocos Norte', 2007, 'Bacarra Nation Comprehensive HS', 'Sta. Rita, Bacarra, Ilocos Norte', 2011, NULL, NULL, NULL),
(5, 0, '822db369', '11-5099', '11', 'Supnet', 'Dexter', 'Pascual', 'Male', 'Single', 'Filipino', '1994-11-14', 'Laoag City', '09485553067', 'Sta. Maria, Laoag City', 'Emilio L. Supnet', 'Farmer', 'Merlyn P. Supnet', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Suyo Elementary School', '30-A Suyo, Laoag City', 2007, 'Ilocos Norte College of Arts and Trades', 'Laoag City', 2011, NULL, NULL, NULL),
(6, 0, '054b93e2', '11-5167', '11', 'Tabian', 'France Kevin', 'C.', 'Male', 'Single', NULL, '2017-04-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 0, '803eee8b', '11-5210', '11', 'Cudiamat', 'Rizalie', 'Pimano', 'Male', 'Single', 'Filipino', '1994-12-30', 'Piddig, Ilocos Norte', '09216425141', 'Libnaoan, Piddig, I.N.', 'Juan I. Cudiamat', 'Security Guard', 'Herminian Cudiamat', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Libnaoan Elementary School', 'Libanaoan, Piddig, I.N.', 2007, 'Don Salustiano Aquino Memorial National High School', 'Tonoton, Piddig, I.N.', 2011, NULL, NULL, NULL),
(8, 0, '86f02f44', '11-5253', '11', 'Acang', 'Joseph Christian', 'Apostol', 'Male', 'Single', 'Filipino', '1994-12-29', 'Dingras, I.N.', '', 'Purugawan, Dingras, I.N.', 'Joseph Acang', 'Gov\'t. Employee', 'Guada Acang', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Peralta Elementary School', 'Peralta, Dingras, I.N.', 2007, 'Dingras National High School', 'Madamba, Dingras I.N.', 2011, NULL, NULL, NULL),
(9, 0, 'd8e10734', '11-5275', '11', 'Palanggoy', 'Marie Joy', 'Tantiado', 'Female', 'Single', 'Filipino', '1995-03-11', 'Sagpatan, Dingras, Ilocos Norte', '09488173473', 'Sagpatan, Dingras, Ilocos Norte', NULL, NULL, 'Francia T. Palanggoy', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Sagpatan Elementary School', 'Dingras, Ilocos Norte', 2007, 'Sarrat National High School', 'Sarrat, Ilocos Norte', 2011, NULL, NULL, NULL),
(10, 0, '1ab779d2', '11-5300', '11', 'Ortal', 'Claren Iveth', 'Aninag', 'Female', 'Single', 'Filipino', '1992-09-24', 'Batac, I.N.', '09154132137', 'Fortuna, Marcos, I.N.', 'Rolando Albornoz Jr.', 'Employee', 'Carolina Albornoz', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Fortuna Elementary School', 'Fortuna, Marcos, I.N.', 2006, 'Edgarpos Campus-Dingras National High School', 'Dingras, I.N.', 2009, NULL, NULL, NULL),
(11, 0, '743bce46', '11-5308', '11', 'Ranay', 'Arman', 'B.', 'Male', 'Single', NULL, '2017-04-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 0, 'a8dc3e49', '11-5343', '11', 'Yadao', 'Arvin John', ' ', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 0, '83c856a6', '11-5386', '11', 'Miguel', 'Benny John', 'R.', 'Male', 'Single', NULL, '2017-04-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 0, '4a57b891', '11-5429', '11', 'Damaso', 'Danilo Jr.', 'B', 'Male', 'Single', 'Filipino', '1995-01-31', 'Manila', '09772133881', 'Caoacan, Laoag City', 'Danilo R. Damaso Sr.', 'Driver', 'Cardidad B. Damaso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Caoacan Elementary School', 'Caoacan, Laoag City', 2007, 'INCAT', 'Laoag City', 2011, NULL, NULL, NULL),
(15, 0, '1c160ddb', '11-5433', '11', 'Gubac', 'Carl Joshua', 'P', 'Male', 'Single', 'Filipino', '1995-05-25', 'Pinili, I.N.', '09168753054', 'Pugwan, Pinili, I.N.', 'Joel Gubac', 'Businessman', 'Cherri Ann', 'Rolendal', 'Housewife', NULL, NULL, NULL, NULL, NULL, 'Pugwan Elementary School', 'Pugwan, Pinili, I.N.', 2007, 'Ilocos Norte College of Arts and Trades', 'Laoag City', 2011, NULL, NULL, NULL),
(16, 0, 'f765b617', '11-5558', '11', 'Albornoz', 'James Paul', 'Enaje', 'Male', 'Single', 'Filipino', '1992-09-24', 'Batac, I.N.', '09154132137', 'Fortuna, Marcos, I.N.', 'Rolando Albornoz Jr.', 'Employee', 'Carolina Albornoz', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Fortuna Elementary School', 'Formtuna, Marcos, I.N.', 2006, 'Edgarpos Campus-Dingras National High School', 'Dingras, I.N.', 2009, NULL, NULL, NULL),
(17, 0, '3adaecf7', '11-5642', '11', 'Bueno', 'Kevin Jade', 'B.', 'Male', 'Single', NULL, '2017-04-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 0, '8ec1e65f', '11-5644', '11', 'Maruquin', 'Mark Jonnel', 'I.', 'Male', 'Single', NULL, '2017-04-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 0, '45668b5e', '11-5705', '11', 'Caraang', 'Hazel', 'Coloma', 'Female', 'Single', 'Filipino', '1995-01-26', 'San Nicolas, IN', NULL, '22, San Nicolas, Ilocos Norte', 'Jaime Caraang', 'Housekeeper', 'Mildred Caraang ', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 0, '8d25f788', '11-5707', '11', 'Arpe', 'Kristine Mae', 'Galantes', 'Female', 'Single', 'Filipino', '1994-08-21', 'Lubnac, Vintar, I.N.', '09486363217', 'Lubnac, Vintar, I.N.', 'Emmanuel L. Mateo Sr.', 'Carpenter', 'Wilma C. Mateo', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Lubnac Elementary School', 'Lubnac, Vintar, I.N.', 2007, 'Saint Nicholas Academy', 'San Nicholas, Vintar, I.N.', 2011, NULL, NULL, NULL),
(21, 0, '7842be31', '11-5730', '11', 'Duque', 'Randolf Arvin', 'Gampong', 'Male', 'Single', 'Filipino', '1995-04-23', 'Badoc, I.N.', '09473383534', 'Garreta, Badoc, I.N.', 'Rogel Duque', '', 'Evelyn Agnes Duque', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Badoc South Central Elementary School', 'Badoc, Ilocos Norte', 2007, 'Pinili National High School', 'Pinili, I.N.', 2011, NULL, NULL, NULL),
(22, 0, 'fce609ca', '11-5738', '11', 'Bulong', 'Gerald Jake', 'L.', 'Male', 'Single', NULL, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 0, '32bc1c37', '11-8031', '11', 'Tan', 'Kent Ram Roisce', 'O.', 'Male', 'Single', NULL, '2017-04-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 0, '10188695', '11-8335', '11', 'Agpalo', 'Jasmin Joi', 'Sonajo', 'Female', 'Single', NULL, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 0, 'cba31cb9', '12-5007', '12', 'Mario ', 'Karen Joy', 'Balalio', 'Female', 'Single', 'Filipino', '1995-08-10', 'Sta. Lucia, Ilocos Sur', '09391326818', 'C-1, Claveria, Cag.', 'George Mario', 'Driver', 'Evangelene Mario', 'Housekeeper', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'Claveria East Central Elem. School', 'C-5, Claveria, Cag.', 2008, 'Claveria School of Arts and Trades', 'C-1, Claveria, Cag.', 2012, 'NULL', 'NULL', NULL),
(26, 0, '2b7f0738', '12-5044', '12', 'Hernaez', 'Christopher', 'Maruquin', 'Male', 'Single', 'Filipino', '1996-05-18', 'Piddig, Ilocos Norte', '09952742485', 'Brgy. 2, Anao, Piddig, Ilocos Norte', 'Zaldy B. Hernaez', 'Construction Worker', 'Edna M. Hernaez', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Piddig South Central Elementary School', 'Piddig, Ilocos Norte', 2012, 'INNHS', 'Laoag City', 2012, NULL, NULL, NULL),
(27, 0, 'b4d5a98d', '12-5101', '12', 'Arimbuyoten', 'April Angel', 'P.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 0, '69c790ea', '12-5156', '12', 'Barrios', 'Jan Desiree', 'Doctor', 'Female', 'Single', 'FIlipino', '1996-01-13', 'Sinait, Ilocos Sur', '09161722213', 'Jordan, Sinait, Ilocos Sur', 'Edgar Barrios Sr.', 'Farmer', 'Alicia Doctor Barrios', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Sinait West Central School', 'Macabiag, Sinait, Ilocos Sur', 2008, 'Sibait National High School', 'Ricudo, Sinait, Ilocos Sur', 2012, NULL, NULL, NULL),
(29, 0, '99c19bb0', '12-5157', '12', 'Tonzo', 'Glenn Mark', 'Abella', 'Male', 'Single', 'Filipino', '1996-03-11', 'Sinait, Ilocos Sur', '09351798423', 'Brgy. Sta. Cruz, Sinait, Ilocosw Norte', 'Sonie G. Tonzo', 'Farmer', 'Jeanette A. Tonzo', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Sta. Cruz Elementary School', 'Sinait, Ilocos Sur', 2008, 'Sinait National High School', 'Sinait, Ilocos Sur', 2012, NULL, NULL, NULL),
(30, 0, 'f9a76cac', '12-5158', '12', 'Tubera', 'Leanne Aubrey', '-', 'Female', 'Single', 'Filipino', '1996-03-27', 'Sinait, ilocos Sur', '09272975886', 'Teppeng, Sinait, I.S.', NULL, NULL, 'Ledwin P. Tubea', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Teppeng Elementary School', 'Teepeng, Sinait, I.S.', 2008, 'Sinait national High School', 'Ricudo, Sinaiot, I.S.', 2012, NULL, NULL, NULL),
(31, 0, 'e3f05760', '12-5160', '12', 'Sabado', 'Mark Darwin', 'Corpuz', 'Male', 'Single', 'Filipino', '1996-01-24', 'Clav., Cag.', '09159785472', 'Cadcadir East, Clav., Cag.', 'Jesus Sabado', 'Farmer', 'Sinamar Sabado', 'Midwife', NULL, NULL, NULL, NULL, NULL, NULL, 'Cadcadir East Elementary School', 'CAdcadir East, Clav., Cag.', 2008, 'Academy of St. Joseph', 'C-1, Clav., Cag.', 2012, NULL, NULL, NULL),
(32, 0, '23789641', '12-5176', '12', 'Esteban', 'Harold', 'C.', 'Male', 'Single', NULL, '2017-04-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 0, '04f7c467', '12-5192', '12', 'Costales', 'Christine Joy', 'Velasco', 'Female', 'Single', 'Filipino', '1996-07-08', 'Danay Niorte, Magsingal, I.S.', '09176170424', 'Danay Niorte, Magsingal, I.S.', 'Saturnino Costales', 'Farming', 'Babette Costales', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Danay Elementary School', 'Danay Niorte, Magsingal, I.S.', 2008, 'St. William Institute', 'San Ramon, MNagsingal, I.S.', 2012, NULL, NULL, NULL),
(34, 0, 'e8e0526f', '12-5204', '12', 'Mandac', 'Lea Marianne', 'Castillo', 'Female', 'Single', 'Filipino', '1995-08-20', 'Quezon City', '09125103321', '21, San Marcos, Sarrat, Ilocos Norte', 'Mario O. Mandac (deceased)', '', 'Annabel C. Mandac', 'Customer Service Attendant', NULL, NULL, NULL, NULL, NULL, NULL, 'Cabuloan Elementaryy School', 'Brgy. 21, Sarrat, Ilocos Norte', 2008, 'Sarrat National High School - Special Science Class', 'Brgy. 4, Sarrat, Ilocos Norte', 2012, NULL, NULL, NULL),
(35, 0, 'b0989d8b', '12-5287', '12', 'Simeon', 'Rolan Benandrew', 'Parugrug', 'Male', 'Single', 'Filipino', '1996-06-05', 'Laoag City', '09758094493', '#60-B, Laoag City', 'Robert Simeon', 'Store Owner', 'Lani Simeon', 'Gov\'t. Employee', NULL, NULL, NULL, NULL, NULL, NULL, 'Kid\'s Kollege Inc.', 'Laoag City', 2008, 'Ilocos Norte National high School', 'Laoag City', 2012, NULL, NULL, NULL),
(36, 0, '3509e844', '12-5304', '12', 'Macni', 'Charlie', 'Molina', 'Male', 'Single', 'Filipino', '1995-07-12', 'Sarrat, Ilocos Norte', '09273732871', 'San Joaquin, Sarrat, Ilocos Norte', 'Aero S. Macni', '', 'Rosario M. Macni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sarrat Central School', 'Sarrat, Ilocos Norte', 2008, 'Sarrat National High School', 'Sarrat, Ilocos Norte', 2012, NULL, NULL, NULL),
(37, 0, 'e80370d1', '12-5326', '12', 'Gabay', 'Ericka', 'Yagyagan', 'Female', 'Single', 'Filipino', '1996-10-26', 'Batac, Ilocos Norte', '09126798079', 'Pias Norte, Currimao, Ilocos Norte', 'Virgilio Agapito R. Gabay', 'Utility Worrker', 'Virginia Y. Gabay', 'Sellf-Employed', NULL, NULL, NULL, NULL, NULL, NULL, 'Pias Gaang Elementary School', 'Currimao, Ilocos Notre', 2008, 'Currimao National High School', 'Currimao, Ilocos Norte', 2012, NULL, NULL, NULL),
(38, 0, 'b9b76580', '12-5327', '12', 'Racpan', 'Jaymar', 'G.', 'Male', 'Single', NULL, '2017-04-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 0, '675ebb87', '12-5355', '12', 'Batangan', 'Femarie', 'Clemente', 'Female', 'Single', 'Filipino', '1995-12-01', 'Batac, ilocos Norte', '09166460638', 'San Agustin, San Nicolas, Ilocos Norte', 'Ferdianand A. Batangan', 'Farmer', 'Margarette C. Batangan', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Bugnay Elementary School', '#21, San Nicolas, ilocos Norte', 2008, 'San Nicolas national High School', '#18, San Nicolas, Ilocos Norte', 2012, NULL, NULL, NULL),
(40, 0, '4384e42f', '12-5364', '12', 'Allado', 'Demy', 'Mantemayor', 'Male', 'Single', 'Filipino', '1995-01-30', 'Brgy. 18, San Nicolas, I.N.', '09155484450', 'Brgy. 18, San Nicolas, I.N.', 'Ronald Allado', 'Farmer', 'Imelda Allado', 'Domestic Helper', NULL, NULL, NULL, NULL, NULL, NULL, 'Bingao, Elementary School', 'Brgy. 18, San Nicolas, I.N.', 2008, 'San Nicolas, National High School', 'Brgy. 18, San Nicolas, I.N.', 2012, NULL, NULL, NULL),
(41, 0, '04abbd5b', '12-5372', '12', 'Pascual', 'Rosemarie', 'Pablo', 'Female', 'Single', 'Filipino', '1995-09-08', 'Lipay, Solsona', '09104194414', 'Lipay, Solsona, Ilocos Norte', 'Ruben Pascual', 'Farmer', 'Lelissa Psacual (deceased)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lipay, Elementary School', 'Solsona, I.N.', 2008, 'Solsona National High School - Talugtog Campus', 'Brgy. Talugtog, Ilocos Norte', 2012, NULL, NULL, NULL),
(42, 0, 'e274a407', '12-5384', '12', 'Agudong', 'Nympha', 'Jane', 'Female', 'Single', 'Filipino', '1995-10-20', 'Marcos, I.N.', '09279224778', 'Calog Sur, Abulog, Cagayan', 'Nestor b. Agudong', '', 'Julie S. Agudong', 'Teaching', NULL, NULL, NULL, NULL, NULL, NULL, 'Calog Sur Ele. School', 'Calug Sur, Abulog, Cag.', 2008, 'Sanchez Mira School of Arts and Trades', 'Sanchez mira, Cag.', 2012, NULL, NULL, NULL),
(43, 0, '8e1bb379', '12-5386', '12', 'Bistayan', 'Shera Mae', 'Tolentino', 'Female', 'Single', 'Filipino', '1995-06-24', 'Curva, Pamplona, Cagayan', '09355730990', 'Curva, Pamplona, Cagayan', 'Sherwin P. Bistayan', 'Farmer', 'Maria Bella T. Bistyan', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Curva Elementary School', 'Curva, Pamplona, Cagayan', 2008, 'Sanchez Mira School of Arts and Trades', 'Santor, Sanchez Mira, Cagayan', 2012, NULL, NULL, NULL),
(44, 0, 'a73bc2c7', '12-5397', '12', 'Madrid', 'Jon Vincent', 'Casimiro', 'Male', 'Single', 'Filipino', '1995-07-18', 'Dingras, Ilocos Norte', '09276757607', 'Brgy. San Marcelino, Dingras, Ilocos Norte', 'Randy S. Madrid', 'Farmer', 'Shirley C. Madrid', 'Engineer', NULL, NULL, NULL, NULL, NULL, NULL, 'San Marcelino Elementary School', 'Dingras, Ilocos Norte', 2008, 'Ilocos Norte National High School', 'Brgy. 4, Laoag City', 2012, NULL, NULL, NULL),
(45, 0, '9edbec04', '12-5401', '12', 'Dela Cruz', 'Dan Marte', 'Acosta', 'Male', 'Single', 'Filipino', '1996-04-05', 'Laoag City', '09053536878', '16, San Marcos, San Nicolas, Ilocos Norte', 'Dante Dela Cruz', '', 'Marjorie Dela Cruz', 'Food Vendor', NULL, NULL, NULL, NULL, NULL, NULL, 'San Nicolas Elementary School', 'Brgy. 2, San Nicolas, Ilocos Norte', 2008, 'Bingao National High School', 'Brgy. 18, San Nicolas, Ilocos Norte', 2012, NULL, NULL, NULL),
(46, 0, '2e49dd15', '12-5403', '12', 'Suniga ', 'Marden Dave ', 'Pascual', 'Male', 'Single', 'Filipno', '1995-09-19', 'San Nicolas, I.N.', '09182894987', 'Lanao, Bangui, I.N.', 'Charles A. Suniga(Deceased)', '', 'Grace Pascual', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Lanao, ElementarySchool', 'Lanao, Bangui, I.N.', 2008, 'Bangui National High School', 'Lanao, Bangui, I.N.', 2012, NULL, NULL, NULL),
(47, 0, '9ca8dac2', '12-5406', '12', 'De Ocampoo', 'Gwyneth', 'Maltizo', 'Female', 'Single', 'Filipino', '1996-03-27', 'Pagudpud, I.N.', '09303922147', 'Dampig, Pagudpud, I.N.', 'Alex B. De Ocampo', 'Jeepney Driver', 'Mercelina M. De Ocampo', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Dampig, Elem. School', 'Dampig, Pagudpud, I.N.', 2008, 'Bangui National High School', 'Bangui, I.N.', 2012, NULL, NULL, NULL),
(48, 0, '4f91b754', '12-5419', '12', 'Ibon', 'Dana Erika', 'Bumanglag', 'Female', 'Single', 'Filipino', '1995-11-07', 'Laoag City', '092080143007', 'Brgy. 21, Laoag City, Ilocos Norte', 'Rodante A. Ibon', 'Jeepney Driver', 'Magdalena B. Ibon', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Ilocos Norte Adventist School', 'Brgy. 19, Laoag City', 2008, 'Ilocos Norte National High School', 'Brgy. 4, Laoag City', 2012, NULL, NULL, NULL),
(49, 0, 'e1e4fba5', '12-5423', '12', 'Padayao', 'Jethro James', 'Acosta', 'Male', 'Single', 'Filipino', '1995-12-10', 'Batac, Ilocos Norte', '', '#15, Suba, Paoay, Ilocos Norte', 'James P. Padayao', 'Security Guard', 'Marissa A. Padayao', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Suba Elementary School', 'Suba, Paoay, Ilocos Norte', 2008, 'Paoay Lake National Hiogh School', 'Nagbacalan, Paoay, Ilocos Norte', 2012, NULL, NULL, NULL),
(50, 0, 'cf64602f', '12-5427', '12', 'Pagdilao', 'Jason Alexander', '-', 'Male', 'Single', NULL, '2017-04-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 0, '3e78ebb3', '12-5439', '12', 'Alutaya', 'Mark valen', 'C.', 'Male', 'Single', 'Filipino', '2017-04-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 0, 'e95d0a06', '12-5445', '12', 'Lazaro', 'Kriezel Ann', 'Pascua', 'Female', 'Single', 'Filipino', '1996-09-01', 'San Lorenzo, San Nicolas, I.N.', '09177448076', 'San Lorenzo, San Nicolas, I.N.', 'Isabelo P. Lazaro Jr.', 'Construction Worker', 'Edna P. lazaro', 'Businesswoman', NULL, NULL, NULL, NULL, NULL, NULL, 'Bingao Elementary School', 'Bingao, San Nicolas, I.N', 2008, 'Bingao national High School', 'Bingap, San Nicolas. I.N.', 2012, NULL, NULL, NULL),
(53, 0, 'ed6e1c06', '12-5455', '12', 'Arcartado', 'Edizon Eddie', 'Cbacungan', 'Male', 'Single', 'Filipino', '1996-07-11', 'Laoag City', '09953574603', 'M.A. Del Pilar 18, Laoag City', 'Edwardo P. Arcartado', 'Businessman', 'Sonia P. Arcartado', 'Businesswoman', NULL, NULL, NULL, NULL, NULL, NULL, 'Laoag Central Elementary School', 'Laoag City', 2008, 'Ilocos Norte College of Arts and Trades', 'Laoag City', 2012, NULL, NULL, NULL),
(54, 0, '2f4701a1', '12-5456', '12', 'Raynon', 'John Patrick', 'Pastor', 'Male', 'Single', 'Filipino', '1995-12-13', 'Batac, Ilocos Norte', '09279257122', 'Brgy. 26, San Mauricio, LAoag City, Ilocos Norte', 'Armon P. Raynon', 'Government Employee', 'Cleofe Flavinia P. Raynon', 'Pahrmacist', NULL, NULL, NULL, NULL, NULL, NULL, 'Padre Annibale Integrated Schools', 'Vintar Rd., Laoag City', 2008, 'Mariano Marcos State University - LHS', 'Castro Ave., Laoag City', 2012, NULL, NULL, NULL),
(55, 0, '185f4834', '12-5458', '12', 'Gaoat', 'Helen Grace', 'D.', 'Female', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 0, '8fec8f51', '12-5484', '12', 'Esposo', 'Jea PAtrish', 'Eclipse', 'Female', 'Single', 'Filipino', '1992-09-06', 'Batac, Ilocos Norte', '09265089458', '#2, San Roque, Paoay, Ilocos Norte', 'Jessie M. Esposo', 'Tricycle Driver', 'Aniselle E. Esposo', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Paoay Elementary School', '#18, Veronica, Paoay, Ilocos Norte', 2005, 'Paoay Lake National High School', '#18, Pannaratan, Paoay, Ilocos Norte', 2009, NULL, NULL, NULL),
(57, 0, '6ddac17c', '12-5498', '12', 'De Guzman', 'John Patrick', 'Acantilado', 'Male', 'Single', 'Filipino', '1993-04-13', 'Hongkong', '09075165398', 'Pambaran, Paoay, Ilocos Norte', 'Charlin De Guzman', 'Music/Artist', 'Janet De Guzman', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Paoay Central Elementary School', 'Paoay, Ilocos Norte', 2007, 'Paoay North Institute', 'Paoay, Ilocos Norte', 2011, NULL, NULL, NULL),
(58, 0, '7dc193e1', '12-5512', '12', 'Gamboa', 'Rojelio Jr.', 'Fernandez', 'Male', 'Single', 'Filipino', '1994-11-28', 'Linao, Pura, Tarlac', '09261456764', 'Mabusag Norte, Badoc, I.N.', 'Rogelio D. Gamboa Sr.', 'Security Guard', 'Edna F. Gamboa', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Mabusag Norte Elementary School', 'Mabusag Norte, Badoc, I.N.', 2008, 'Juan Luna Mem. Academy Inc.', 'Alogoog, badoc, I.N.', 2012, NULL, NULL, NULL),
(59, 0, 'e3661be6', '12-552', '12', 'Jose', 'Roevi Angelli', 'Pinol', 'Female', 'Single', 'Filipino', '1995-09-16', 'Laoag City', '09270451832', 'Brgy. 19, Laoag City', 'Rodelio L. Jose', 'Driver', 'Evelinyn P. Jose', 'Privater Employee', NULL, NULL, NULL, NULL, NULL, NULL, 'MMSU-LES', 'Laoag City', 2008, 'Holy Spirit Academy of Laoag', 'Laoag City', 2012, NULL, NULL, NULL),
(60, 0, '7397c32d', '12-5522', '12', 'Jose', 'Roevie Angelli', 'P.', 'Female', 'Single', NULL, '2017-05-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 0, '9ad2dd36', '12-5523', '12', 'Pante', 'Ramil', 'C.', 'Male', 'Single', NULL, '2017-04-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 0, '4df1ef4e', '12-5525', '12', 'Real', 'Mark', 'Macalma', 'Male', 'Single', 'Filipino', '1996-01-30', 'Batac City', '09167395021', 'San Agustin, Paoay, I.N.', 'Nestor U. Real', 'Farmer', 'Normlita Real', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Salbang Elementary School', '', 2008, 'Paoay Lake National High School', 'Paoay, Ilocos Norte', 2012, NULL, NULL, NULL),
(63, 0, '816a5613', '12-5529', '12', 'Cabarloc', 'Johanne Carlou', 'R', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 0, '482615d8', '12-5536', '12', 'Sales', 'Jesther', 'S.', 'Male', 'Single', NULL, '2017-04-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 0, 'a2613b0e', '12-5541', '12', 'Domingo', 'Sharine Kate', 'Vejiga', 'Female', 'Single', 'Filipino', '1996-08-29', 'Burgos, I.N.', '09275023654', 'Ablan, Burgos, I.N.', 'Oscar A. Domingo Jr.', 'Teacher', 'Mary Ann V. Domingo', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Ablan Community School', 'Ablan, Burgos, I.N.', 2008, 'Burgos-Agro industrial School', 'Poblaciojn, Burgos, I.N.', 2012, NULL, NULL, NULL),
(66, 0, 'ef3d067c', '12-5544', '12', 'Paturay', 'Darlyn', 'Tumali', 'Female', 'Single', 'Filipino', '1996-09-12', 'Apayao', '09087110312', 'Sta Filomena, Calanasan, Apayao', 'Alejandro Paturay', 'Tricycle Driver', 'Nora Paturay', 'Vendor', NULL, NULL, NULL, NULL, NULL, NULL, 'Sta Filomena Elem. School', 'Sta Filomena, Calamasan, Apayao', 2008, 'Caveria Rural and Vocational School', 'Calveria, Cagayan', 2012, NULL, NULL, NULL),
(67, 0, 'f9db5170', '12-5547', '12', 'Pablo', 'Emily', 'Tolentino', 'Female', 'Single', 'Filipino', '1995-10-15', 'Marcos, I.N.', '09464765626', 'Tabucbuc, Marcos, I.N.', 'Antonio Pablo', 'Framer', 'Marlene Pablo', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Escoda Elementary School', 'Brgy. Escoda, MArcos, I.N.', 2008, 'MArcos National High School', 'Brgy. Lydia, marcos, I.N.', 2012, NULL, NULL, NULL),
(68, 0, '0d9c3e42', '12-5548', '12', 'Palomares', 'Richmond Jhon', 'Valencia', 'Male', 'Single', 'Filipino', '1996-01-04', 'Parado, Dingras, I.N.', '09279582512', 'Francisco, Dingras, I.N.', 'Rosito Palomares Jr.', 'Farmer', 'Robelina Palomares', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Francisco Elementary School', 'Francisco, Dingras, I.N.', 2008, 'San Marcelino National High School', 'San Marcelino, Dingras, I.N.', 2012, NULL, NULL, NULL),
(69, 0, '83d271dc', '12-5568', '12', 'Costes', 'Alfredo Jr.', 'Leano', 'Male', 'Single', 'Filipino', '1995-07-14', 'Laoag City', '09465137296', 'Balacad, Laoag City', 'Alfredo Costes Sr.', 'Labor', 'Mariel Costes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Balacad Elementary School', 'Balacad, Laoag City', 2008, 'Ilocos Norte College of Arts and Trades', 'Laoag City', 2012, NULL, NULL, NULL),
(70, 0, '3a6f9bdb', '12-5577', '12', 'Villena', 'Raymart', 'Oquingap', 'Male', 'Single', 'Filipino', '1995-09-19', 'Batac, Ilocosa Norte', '09128066924', 'Tabug, Batac City, Ilocos Norte', 'Edmar C. Villena', 'Farmer', 'Nelly O. Villena (deceased)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tabug Elementary School', 'Batac City, Ilocos Norte', 2008, 'Batac National High School', 'Batac City, Ilocos Norte', 2012, NULL, NULL, NULL),
(71, 0, 'a99b7455', '12-5579', '12', 'Singson', 'Novelyn', 'de la Cruz', 'Female', 'Single', 'Filipino', '1996-01-03', 'Laoag City', '09303616630', '#46, Nalbo, Laoag City', 'Noel E. Singson', 'Retired Phil. Navy', 'Evelyn C. Singson', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Buttong Elementary School', '#50, Buttong, Laoag City', 2008, 'Nortwestern University', 'Airport Avenue, Laoag City', 2012, NULL, NULL, NULL),
(72, 0, '5fa6c14c', '12-5581', '12', 'Bartolome', 'Lyka Marizze', 'Dvalos', 'Female', 'Single', 'Filipino', '1996-06-15', 'MMMH- Batac City', '09275037133', 'Baraburan, Laoag City', 'Aurelio S. Bartolome', 'Carpenterr', 'Maria Rebecca D. Bartolome', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Buttong Elementary School', 'Buttong, Laog City', 2008, 'Ilocos Norte National High School', 'Laoag City', 2012, NULL, NULL, NULL),
(73, 0, 'c7d477cf', '12-5587', '12', 'Angel', 'Juistine Kenneth Hsu', 'Udarbe', 'Male', 'Single', 'Filipino', '1995-10-27', 'Victoria, Currimao, I.N', '09063836690', 'Victoria, Currimao, I.N.', 'Bonifacio A. Angel', 'Laborer', 'Ma. Consolacion Angel', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Dona Josefa Edralin E.S.', 'Pob. 2, Currimao I.N.', 2008, 'Currimao', 'Pob.2, Currimao, I.N.', 2012, NULL, NULL, NULL),
(74, 0, '51892b26', '12-5589', '12', 'Nogoy', 'Mae Vince ', 'Raval', 'Female', 'Single', 'Filipino', '1992-11-20', 'Laoag City', '09465491811', 'Brgy. 6, Laoag City, Ilocos Norte', 'Vincent Nogoy', 'Tricycle Driver', 'Vivian Nogoy', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Northern Christian College', 'Brgy. 5, Laoag City', 2008, 'Ilocos Norte College of Arts and Trades', 'Brgy. 6, Laoag City', 2012, NULL, NULL, NULL),
(75, 0, '4da9946e', '12-5595', '12', 'Rosales', 'Camille Keith', 'Ventura', 'Female', 'Single', 'Filipino', '1996-05-30', 'Batac, Ilocos Norte', '09203187005', 'Brgy. 30-B, Laoag City, Ilocos Norte', 'Felicisimo J. Rosales', 'Barangay Kagawad', 'Carmelita V. Rosales', 'Self-Employed', NULL, NULL, NULL, NULL, NULL, NULL, 'Sta. Maria Elementary School', 'Brgy. 1, Laoag City', 2008, 'Ilocos Norte National High School - Special Science Class', 'Brgy. 4, Laoag City', 2012, NULL, NULL, NULL),
(76, 0, '479226ab', '12-5596', '12', 'Malabayabas', 'Vina Denise', 'Ildefonso', 'Female', 'Single', 'Filipino', '1996-01-30', 'Laoag City', '09260315079', 'Brgy. 19, Laoag City, Ilocos Norte', 'Virgilio G. Malabayabas (deceased)', '', 'Emelina I. Malabayabas', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Laoag Central Elementary School', 'Brgy. 14, City', 2008, 'Ilocos Norte National High School - Special Science Class', 'Brgy. 4, Laoag City', 2012, NULL, NULL, NULL),
(77, 0, 'd15cb8c6', '12-5600', '12', 'Dumlao', 'Jimwel', 'Daban', 'Male', 'Single', 'Filipino', '1996-02-02', 'Manila', '09567309650', 'Brgy. 6, San Nicolas, I.N', 'Ernesto Dumlao', 'CSU', 'Janette Dumlao', 'Chef', NULL, NULL, NULL, NULL, NULL, NULL, 'San Nicolas Elementary School', 'San Nicolas, Ilocos Norte', 2008, 'Ilocos Norte National High School', NULL, 2012, NULL, NULL, NULL),
(78, 0, '3936b942', '12-5624', '12', 'Olalo', 'Camille Joyce', 'Bensan', 'Female', 'Single', 'Filipino', '1996-03-18', 'Batac, Ilocos Norte', '09972630687', 'Magnuang, Batac City, Ilocos Norte', 'winston M. Olalo', 'Farmer', 'Evalyn B.Bensan', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Catalino Acosta Memorial Elementary School', 'Tabug, BAtac City', 2008, 'Batac National High School - Pob. Campus', 'Tabug, Batac City', 2012, NULL, NULL, NULL),
(79, 0, '8a52addd', '12-5625', '12', 'Obligar ', 'Anthony', 'M.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 0, '1583b971', '12-5646', '12', 'Ulit', 'James Phillip', 'Lavalle', 'Male', 'Single', 'Filipino', '1995-07-02', 'Sta. Mesa, Manila', '09275834751', 'Billoa, Batac City', 'Benjamin I. Ulit', 'Driver', 'Rosanna L. Ulit', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Billoca Elementary School', 'Billoca, Batac City', 2008, 'Batac National High School', 'Tabug, Batac City', 2012, NULL, NULL, NULL),
(81, 0, 'd024ef5d', '12-5658', '12', 'Bagasol', 'John Jerick', 'Daniel', 'Male', 'Single', 'Filipino', '1995-06-03', 'Paoay, I.N.', '09187309246', 'Mumulaan, Paoay, I.N.', 'Edgar B. Bagasol', 'Farmer', 'Vilma D. Bagasol', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Nagbacalan Elem. School', 'Nagbacalan, Paoay, I.N.', 2008, 'Paoay Lake National High School', 'Nagbacalan, Paoay, I.N.', 2012, NULL, NULL, NULL),
(82, 0, 'b4fcc5c4', '12-5660', '12', 'Bangsil', 'Jan Mark Anthony', 'Blanco', 'Male', 'Single', 'Filipino', '1996-01-22', 'Batac, I.N.\r\n', '09056602903', 'Sungadan, Paoay, I.N.', 'Reytnaldo C. Bangsil', 'Farmer', 'Joselline B. Bangsil', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Pasil Elementary School', 'Pasil. Paoay, I.N.', 2008, 'Paoay Lake National High School', 'Nagbacalan, paoay, I.n.', 2012, NULL, NULL, NULL),
(83, 0, '4b493a1b', '12-5661', '12', 'Padayao', 'Jun Clifford', 'M.', 'Male', 'Single', NULL, '2017-04-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 0, '5e363fe0', '12-5662', '12', 'Buduan', 'Jasper', 'Castillo', 'Male', 'Single', 'Filipino', '1995-11-25', 'Batac City', '09121189604', 'Nagbacalan, Paoay, I.N.', 'Nathaniel Nuduan', 'Self-employed', 'Nenita C. Buduan', 'Medical Technologist', NULL, NULL, NULL, NULL, NULL, NULL, 'Nagbacalan, Paoay, I.N.', 'Bagbacalan, Paoay, I.N.', 2008, 'Ilocos Norte National High School', 'Laoag City', 2012, NULL, NULL, NULL),
(85, 0, '1196fe9d', '12-5664', '12', 'Felix', 'Jomel', 'Carolino', 'Male', 'Single', 'Filipino', '1995-04-08', 'Bulacan', '0912113480', 'Brgy. 15, Sarat, I.N.', 'Precidio S. Felix', '', 'Carolina C. Felix', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'San Bernabe Elementary School', 'Brgy. 12, Sarrat, I.N.', 2007, 'Sta. Rosa National High School)', 'Brgy. 10, Sarrat, I.N.', 2011, NULL, NULL, NULL),
(86, 0, 'ef609e24', '12-5667', '12', 'Albano', 'MAe Joyce', 'Pambio', 'Female', 'Single', 'Filipino', '1996-05-15', 'Laoag City', '09499273330', 'Balatong, Laoag City', 'Jay D. Albano', 'Tricycle Driver', 'Pamela P. Albano', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Balatong Integrated School', 'Balatong, Laoag City', 2008, 'Ilocos Norte College of Arts and trades', 'Laoag City', 2012, NULL, NULL, NULL),
(87, 0, '5dd272fa', '12-5701', '12', 'Sadang', 'Rhenamae', 'Macalma', 'Female', 'Single', 'Filipino', '1995-10-30', 'MMMHC MC', '09095958238', 'Salbang, Paoay, I.N.', 'Renato M. Sadang', 'Framer', 'Myrna M. Sadang', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Salbang Elementary School', 'Salbang, Paoay, I.N.', 2008, 'Paoay Lake National High School', 'Pannaratan, Paoay, I.N.', 2012, NULL, NULL, NULL),
(88, 0, '39c03f50', '12-5707', '12', 'Sambot ', 'Christian Jomarie', 'Sugui', 'Male', 'Single', 'Filipino', '1995-12-20', 'Batac City', '09551758290', 'Magnuang, Batrac City', 'Redentor P. Sambot', 'Farming', 'Teresita S. Sambot', 'Housekeeping', NULL, NULL, NULL, NULL, NULL, NULL, 'Magnuang Elem. School', 'Magnuang, Batac City', 2008, 'MMSU-LHS-SC', 'Caunayan, Batac City', 2012, NULL, NULL, NULL),
(89, 0, 'c0cd41cd', '12-5723', '12', 'Bumanglag', 'Joseph Edward', 'Martin', 'Male', 'Single', 'Filipino', '1995-11-01', 'Laoag City', NULL, 'Laoag City', 'Mario Bumanglag', NULL, 'Milagros Bumanglag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shamrock Elementary School', 'Laoag City', 2008, 'Ilocos Norte College of Arts and Trades', 'Laoag City', 2012, NULL, NULL, NULL),
(90, 0, 'f1e0d9c5', '12-5729', '12', 'Cabang', 'Joselito II', 'Cruz', 'Male', 'Single', 'Filipino', '1996-07-10', 'Solsona, I.N.', '09959906919', 'Juan, Solsona, I.N.', 'Joselito Cabang', 'Nusiness Owner', 'Hazel Cabang', 'Business Manager', NULL, NULL, NULL, NULL, NULL, NULL, 'SolSona Central Elemetary School', '', 2008, 'Ilocos Norte College of Arts and Trades', 'Laoag City', 2012, NULL, NULL, NULL),
(91, 0, '0671f2c1', '12-5736', '12', 'Santos', 'Ebenezzer', 'Crisostomo', 'Male', 'Single', 'Filipino', '1995-11-22', 'Banban, Bangui, I.N.', '09297768486', 'Banban, Bangui, I.N.', 'Rodelio V. Santos', 'Business Man', 'Ma. Liza C. Santos', 'Business Woman', NULL, NULL, NULL, NULL, NULL, NULL, 'Banban Elementary School', 'Banban, Bangui, I.N.', 2008, 'Banban National High School', 'Banban, Bangui, I.N.', 2012, NULL, NULL, NULL),
(92, 0, '4a99df57', '13-5069', '13', 'Fernandez', 'Oliver David', 'G.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 0, 'fd78648c', '13-5119', '13', 'Mateo', 'Vanessa', 'Del Rosario', 'Female', NULL, 'Filipino', '1996-08-20', 'Laoag City', '09306648679', 'Brgy. 31, Laoag City, Ilocos Norte', 'Julio R. Mateo Jr.', 'Carpenter', 'Cristeta R. Mateo', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Suyo Elementary School', 'Brgy. 30, Suyo, Laoag City', 2009, 'Ilocos Norte College of Arts and Trades', 'P. Gomez St., Laoag City', 2013, NULL, NULL, NULL),
(94, 0, '88719746', '13-5135', '13', 'Gamayo', 'Alyssa Kamille', 'L.', 'Female', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 0, 'fbac3311', '13-5146', '13', 'Luis', 'Albert Reiner', 'Quime', 'Male', 'Single', 'Filipino', '1996-11-10', 'Laoag City', '09484056475', 'Brgy. 21 Laoag City, Ilocos Norte', 'Rey Felix Luis', ' Private Employee', 'Nerissa Luis', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Shamrock Elementary School', 'Brgy 7 Laoag City, Ilocos Norte', 2009, 'Ilocos Norte College of Arts And Trades', 'Brgy 7 Laoag City, Ilocos Norte', 2013, NULL, NULL, NULL),
(96, 0, '428fb705', '13-5177', '13', 'Domingo', 'Mark Kevin', 'Ramones', 'Male', 'Single', 'Filipino', '1997-05-15', 'Isabela', '09277389497', 'Brgy. Calioet, Bacarra, Ilocos Norte', 'Germani Domingo', 'Farmer', 'Mary Ann Domingo', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Cadaratan Elementary School', 'Brgy. 30 Bacarra, Ilocos Norte', 2009, 'Cadaratan National High School', 'Brgy. 30, Bacarra, Ilocos Norte', 2013, NULL, NULL, NULL),
(97, 0, 'd9c65316', '13-5202', '13', 'Hernando', 'Genghis Albert', 'Bernabe', 'Male', 'Single', 'Filipino', '1997-08-31', 'Laoag City', '09777639608', 'Brgy. 3, San Nicolas, I.N.', 'Robert T. Hernando', 'Tricycle Driver', 'Neneth B. Hernando', 'Dressmaker', NULL, NULL, NULL, NULL, NULL, NULL, 'San Nicolas Elementary School', 'Brgy 3, San Nicolas, I.N.', 2009, 'Ilocos Norte College of Arts and Trades', 'Laoag City', 2013, NULL, NULL, NULL),
(98, 0, '8d80e7be', '13-5225', '13', 'Carullo', 'John Ryan', 'Galapia', 'Male', 'Single', 'Filipino', '1996-07-21', 'Laoag City', '09069569308', 'Rolls Street, Brgy. Cangrunaan, Batac City, Ilocos Norte', 'Amado Carullo Jr.', 'Government Employee', 'Rebecca Carullo', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Catalino Acosta Memorial Elementary School', 'Batac City, Ilocos Norte', 2009, 'Batac Junior College', 'Batac City, Ilocos Norte', 2013, NULL, NULL, NULL),
(99, 0, '132c284e', '13-5230', '13', 'Saladino', 'Justine Gregory', 'Cuanang', 'Male', 'Single', 'Filipino', '1997-02-10', 'Batac City', '09758075244', 'Roll St. Ablan, Batac City', 'Ernesto Saladino', 'Gov\'t. Employee-Retired', 'Josephine Saladino', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'MMMES', 'Batac City', 2009, 'Batac Junior College', 'Batac City', 2013, NULL, NULL, NULL),
(100, 0, '03d89867', '13-5261', '13', 'Dela Cruz', 'Sandrex', 'M.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 0, '385fb19b', '13-5263', '13', 'Damo', 'Tristan Jay', 'G.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 0, '081c533d', '13-5264', '13', 'Pascua', 'Reymar', 'Simon', 'Male', 'Single', 'Filipino', '1996-12-09', 'Piddig, Ilocos Norte', '09062592943', 'Dupitac, Piddig, Ilocos Norte', 'Raymundo L. Pascua (deceased)', NULL, 'Violeta S. Pascua', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Dupitac Elementary School', 'Dupitac, Piddig, Ilocos Norte', 2009, 'Roosevelt High School', 'Loing, Piddig, Ilocos Norte', 2013, NULL, NULL, NULL),
(103, 0, '34533e4b', '13-5265', '13', 'Manalo', 'John Paul', 'D.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 0, '94c88b73', '13-5277', '13', 'Rapada', 'Joshua Ryan', 'Bayle', 'Male', 'Single', 'Filipino', '1997-02-21', 'Candon City', '09556054697', 'Brgy. Darapidap, Candon City, Ilocos Sur', 'Giovani P. Rapada', 'Utility', 'Love Joy B. Rapada', 'LGU', NULL, NULL, NULL, NULL, NULL, NULL, 'Darapidap Elementary School', 'Candon City, Ilocos Sur', 2009, 'Teodoro Hernaez National High School', 'Sta. Lucia, Ilocos Sur', 2013, NULL, NULL, NULL),
(105, 0, '610b68b1', '13-5285', '13', 'Anthonio', 'Celiza', 'Felix', 'Female', 'Single', 'Filipino', '1994-10-30', 'Piddig, I.N.', '09056769942', 'Brgy. Ab-Abut, Piddig, I.N.', 'Fernando B. Anthonio Sr.(Deceased)', NULL, 'Isabelita F. Anthonio', 'DCW', NULL, NULL, NULL, NULL, NULL, NULL, 'Ab-Abut Elementary School', 'Brgy. Ab-Abut, Piddig, I.N.', 2007, 'DSAMNHS', 'Brgy. Tonoton, Piddig, I.N.', 2011, NULL, NULL, NULL),
(106, 0, '1b462a4b', '13-5287', '13', 'Sebastian ', 'Rochelle', 'P.', 'Female', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 0, '236541dd', '13-5302', '13', 'Manuel', 'Jenna Ross', 'B', 'Female', 'Single', 'Filipino', '1997-07-14', 'Laoag City', NULL, '47, Bengcag, Laoag City', 'Ferdinand M. Manuel', 'Jeepney Driver', 'Janeth B. Manuel', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Cabeza Elementary School', 'Cabungaan, Laoag City', 2009, 'Caloocan High School', 'Caloocan City', 2013, NULL, NULL, NULL),
(108, 0, 'f72c9276', '13-5308', '13', 'flordeliza', 'Clark Dan', 'L.', 'Male', NULL, NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 0, '32e5644b', '13-5320', '13', 'Rosete', 'Arvin Jay', 'I.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 0, '150556a4', '13-5372', '13', 'Tabili', 'Allen Joy', 'Rivera', 'Male', 'Single', 'Filipino', '1996-09-24', 'Batac City', '09069571118', 'Brgy. Nagbacalan, Paoay, Ilocos Norte', 'Romeo B. Tabili', 'Farmer', 'Melva R. Tabili', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Nagbacalan Elementary School', 'Brgy. 22 Paoay, Ilocos Norte', 2009, 'Paoay Lake National High School', 'Brgy.22 Paoay, Ilocos Norte', 2013, NULL, NULL, NULL),
(111, 0, '54bdf1f5', '13-5374', '13', 'Davalos', 'Esther Melanie', 'L.', 'Female', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 117, 'ef17108e', '13-5393', '13', 'Leaño', 'John Mark', 'Gutierrez', 'Male', 'Single', 'Filipino', '1997-06-28', 'Taysan, Batangas', '09269473110', 'Brgy. 7-B, Laoag City, Ilocos Norte', 'Ronnie A. Leano', 'Construction Worker', 'Mena G. Leano', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Shamrock Elementary School', 'P. Gomez St., Laoag City', 2009, 'Ilocos Norte College of Arts and Trades', 'P. Gomez St., Laoag City', 2013, NULL, NULL, NULL),
(113, 0, '3cba0751', '13-5406', '13', 'Pondoc', 'Donna Lyn Joy', 'Santos', 'Female', 'Single', 'Filipino', '1997-04-29', 'Batac, I.N.', '09777639611', '#7, Caunayan, Batac City, I.N.', 'Dionesio Pondoc', 'Instructor', 'Rovilyn Pondoc', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Catalino Acosta Memorial Elementary School', 'Tabug, Batac City', 2009, 'Batac National High School', 'Tabug, Batac City', 2013, NULL, NULL, NULL),
(114, 0, 'f5bbffe2', '13-5410', '13', 'Cudal', 'Roselyn', 'Miguel', 'Female', 'Single', 'Filipino', '1997-04-13', 'Laoag City', '09212851672', '39, Sta. Rosa, Laoag City', 'Marlon F. Cudal', '', 'Emyrose M. Cudal', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Apaya Elementary School', 'Brgy. 39, Sta. Rosa, Laoag City', 2009, 'Ilocos Norte College of Arts and Trades', 'P. Gomez St., Laoag City', 2013, NULL, NULL, NULL),
(115, 0, 'b4e794a8', '13-5450', '13', 'Duppayan', 'Kristine Ann', 'Ringor', 'Female', 'Single', 'Filipino', '2009-04-01', 'Pamplona, Cagayan', '09758578310', 'Bidduang, Pamplona, Cagayan', 'Santiago Duppayan', 'Lineman', 'Benita Duppayan', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Bidduang Elementary School', 'Bidduang, Pamplona, Cagayan', 2009, 'Sanchex Mira School of Arts and Trades', 'Santor, Sanchez Mira Cagayan', 2013, NULL, NULL, NULL),
(116, 0, 'bd91083c', '13-5455', '13', 'Callo', 'Bryan James', 'M.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 0, '44961fc0', '13-5459', '13', 'Galat', 'John Marwin', 'Mateo', 'Male', 'Single', 'Filipino', '1996-10-11', 'Batac City, Ilocos Norte', '09165840427', 'Brgy 50 Buttong, Laoag City, Ilocos Norte', 'Joey Galat', 'Government Employee', 'Marilou Galat', 'Government Employee', NULL, NULL, NULL, NULL, NULL, NULL, 'Kids Kollege Inc.', 'Laoag City', 2009, 'Saviours Christian Academy', 'Laoag City', 2013, NULL, NULL, NULL),
(118, 0, 'a43bbb3f', '13-5469', '13', 'Acar', 'Dan Emil', 'C.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 0, '731783fd', '13-5479', '13', 'Bayani', 'Remalyn', 'Guillermo', 'Female', 'Single', 'Filipino', '1997-06-11', 'Claveria, Cagayan', '09285819502', '#026, Pinas, Claveria, Cagayan', 'Renato Bayani Jr.', 'Carpenter', 'Marilou Bayani', 'Vendor', NULL, NULL, NULL, NULL, NULL, NULL, 'Pinas Elementary School', 'Pinas, Claveria, Cagayan', 2009, 'Claveria Rural Vocational School', 'Dibalio, Claveria, Cagayan', 2013, NULL, NULL, NULL),
(120, 0, '2456c462', '13-5485', '13', 'Carnate', 'Mark Genesis', 'M.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 0, 'd0692f32', '13-5497', '13', 'Azcueta', 'Francess Geraldine', 'D.', 'Female', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 0, 'aafd1755', '13-5509', '13', 'Ganoy', 'Joanamarie', 'Dela Cruz', 'Female', 'Single', 'Filipino', '1997-01-02', 'Batac, Ilocos Norte', '09506249657', 'Brgy. 2, Laoag City', 'Eusebio Ganoy Jr.', 'Driver', 'Nenita Ganoy', 'Dressmaker', NULL, NULL, NULL, NULL, NULL, NULL, 'Mariano Marcos State University - LES', 'Brgy. 12, Laoag City', 2009, 'Mariano Marcos State University - LHS', 'Brgy. 12, Laoag City', 2013, NULL, NULL, NULL),
(123, 0, '2dc294bf', '13-5512', '13', 'Rodriguez', 'Oliver John', 'S.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 0, '02d034cf', '13-5513', '13', 'Cariaga', 'Kharlo', 'Ulit', 'Male', 'Single', 'Filipino', '1995-09-25', 'Batac City', '792-21-09', 'Brgy. Aglipay, Batac City, Ilocos Norte', 'Florente Cariaga', 'Mechanic', 'Elvira Cecille Ulit', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'MMMES', '1-S Valdez, Batac City', 2009, 'ICA', '1-S Valdez, Batac City', 2013, NULL, NULL, NULL),
(125, 0, '46e01680', '13-5514', '13', 'Ibuyat', 'Rolex Ian', 'Bolo', 'Male', 'Single', 'Filipino', '1996-12-13', 'Batac City', '09752787557', 'Brgy. Dariwdiw, Batac City, Ilocos Norte', 'Lorenzo Ibuyat', 'Farmer', 'Jenie Ibuyat', 'Market Vendor', NULL, NULL, NULL, NULL, NULL, NULL, 'Dariwdiw Elementary School', 'Dariwdiw, Batac City', 2009, 'ICA', 'Valdez, Batac City', 2013, NULL, NULL, NULL),
(126, 0, '752d5cce', '13-5522', '13', 'Bal-ut', 'Janelle Imee', 'Balderama', 'Female', 'Single', 'Filipino', '1996-10-17', 'Batac, Ilocos Norte', '09958737924', 'Tartarabang, Pinili, Ilocos Norte', 'Igmedio M. Bal-ut Jr.', 'OFW', 'Christine Jane P. Balderama', 'Nurse', NULL, NULL, NULL, NULL, NULL, NULL, 'Cabaritan Elementary School', 'Cabaritan, San Manuel, Isabela', 2009, 'Pinili National High School', 'Darat, Pinili, Ilocos Norte', 2013, NULL, NULL, NULL),
(127, 0, '0e75b547', '13-5524', '13', 'Gapuzan', 'Marinel', 'O.', 'Female', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 0, 'eb7eb001', '13-5529', '13', 'Donato', 'John Christler', 'D.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 0, 'dd82b892', '13-5530', '13', 'Sebastian ', 'Justin Moises ', 'L.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 0, 'b456e35f', '13-5540', '13', 'Alipio', 'Jan Bryan', 'Vidad', 'Male', 'Single', 'Filipino', '1993-07-02', 'Batac, Ilocos Norte', '09207101032', 'Baay, Batac City, Ilocos Norte', 'Ferdinand P. Alipio Jr.', 'Farmer', 'Estrellia V. Alipio', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Baay Elementary School', 'Baay, Batac City', 2006, 'Batac National High School', 'Bungon, Batac City', 2010, NULL, NULL, NULL),
(131, 0, 'd74756d6', '13-5546', '13', 'Sibucao', 'Elijah', 'R.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 0, '7ad709a6', '13-5548', '13', 'Calacal', 'Carla Nina', 'S', 'Female', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 0, '1404fcfb', '13-5549', '13', 'Daepo', 'Cliff Cyruz', 'Sagsagat', 'Male', 'Single', 'Filipino', '1996-09-12', 'Batac, Ilocos Norte', '09778855556', 'Caunayan, Batac City, Ilocos Norte', 'Clifford P. Daepo', 'Construction Worker', 'Flordeliza S. Daepo', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Mariano Marcos Memorial Elementary School', 'Valdez, Batac City', 2009, 'Batac National High School - Pob. Campus', 'Tabug, Batac City', 2013, NULL, NULL, NULL),
(134, 0, '7c9a92ea', '13-5572', '13', 'Adzuara', 'Anne Charina', 'Pamisan', 'Female', 'Single', 'Filipino', '1997-05-04', 'Manila', '09263813275', '#9, Aglipay, Batac City', 'Allan D. Adzuara', 'Government Employee', 'Annalyn P. Adzuara', 'INEC Employee', NULL, NULL, NULL, NULL, NULL, NULL, 'St. Elizabeth Elementary School', 'Badoc, Ilocos Norte', 2009, 'Mariano Marcos State Universiy', 'Batac City, Ilocos Norte', 2013, NULL, NULL, NULL),
(135, 0, '451a1b37', '13-5579', '13', 'Obado', 'Kristine Cazandra', 'U.', 'Female', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `students` (`id`, `cfatscore`, `passcode`, `studnum`, `yearstarted`, `surname`, `firstname`, `middlename`, `gender`, `status`, `citizenship`, `dateofbirth`, `placeofbirth`, `contactnum`, `address`, `father`, `fatheroccupation`, `mother`, `motheroccupation`, `spouse`, `spouseoccupation`, `houseaddress`, `employer`, `businessaddress`, `telnum`, `elementary`, `elemaddress`, `elemgraduate`, `secondary`, `secaddress`, `secgraduate`, `college`, `coladdress`, `colgraduate`) VALUES
(136, 0, '65ebb636', '13-5585', '13', 'Kallego', 'Kerwin Rean', 'G.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 0, '92af2c20', '13-5610', '13', 'Pama', 'Jhasmine', 'Bistayan', 'Female', 'Single', 'Filipino', '1997-02-22', 'Pamplona, Cagayan', '09366520424', 'Brgy. Curva, Pamplona, Cagayan', 'Eugene Pama', 'Farmer', 'Mavia Luisa Pama', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Curva Elementary School', ' Curva, Pamplona, Cagayan', 2009, 'Sanchez Mira Sched of Arts and Trades', 'Santor, Sanchez, Mira, Cagayan', 2013, NULL, NULL, NULL),
(138, 0, '2759abef', '13-5616', '13', 'Baradi', 'Khenette Demic', 'Sacoco', 'Male', 'Single', 'Filipino', '1996-11-15', 'Marcos, Ilocos Norte', '09953963568', 'Brgy. Imelda, Marcos, Ilocos Norte', 'Medi C. Baradi', ' Farmer', 'Remedios S. Baradi', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Delfin Albano Central School', 'DElfin Albano, Isabela', 2008, 'Ragan Sur Nationnal High School', 'Delfin Albano, Isabela', 2013, NULL, NULL, NULL),
(139, 0, 'b2285f61', '14-3067', '14', 'Acosta', 'Xena Suerte', 'Valdez', 'Female', 'Single', 'Filipino', '1998-04-04', 'Batac City', '09300112222', 'Brgy 21, San agustin, San nicholas, Ilocos Norte', 'Domindor Acosta', 'Farmer', 'Eufemia Acosta', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Bingao elementary School', 'San Nicholas, Ilocos Norte', 2010, 'San niocholas National high School', 'Brgy. 18 San Nicholas, ilocos Norte', 2014, NULL, NULL, NULL),
(140, 0, 'c89d6401', '14-3277', '14', 'Casil', 'Alexandra', ' ', 'Female', 'Single', NULL, '1998-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 0, '834c50e8', '14-3665', '14', 'Avila', 'Sunshine Lase', 'Gaoat', 'Female', 'Single', 'Filipino', '1997-10-06', 'Batac City', '09778427558', 'Caunayan, Batac City, Ilocos Norte', 'Nasser Che B. Avila', 'Businessman', 'Benilyn G. Avila', 'Businesswoman', NULL, NULL, NULL, NULL, NULL, NULL, 'Mmsu', 'Valdes, Batac City, Ilocos Norte', 2010, 'Batac Nation High School', 'Tabug, Batac City, Ilocos Norte', 2014, NULL, NULL, NULL),
(142, 0, 'db042a2a', '14-4218', '14', 'Bay', 'Johann Paul', 'Pascua', 'Male', 'Single', 'Filipino', '1998-04-28', 'Laoag City', '09778049819', 'Brgy. 5, Laoag City', 'Leonardo B. Bay', NULL, 'Vilma P. Bay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Divine Word College of Laoag', 'Gen. Segundo Ave., Laoag City', 2010, 'Divine Word College of Laoag', 'Gen. Segundo Ave., Laoag City', 2014, NULL, NULL, NULL),
(143, 0, '17c57947', '14-5025', '14', 'Aguilar', 'Dion Tristen', 'Orofino', 'Male', 'Single', 'Filipino', '1997-08-08', 'Laoag City, Ilocos Norte', '09263070108', 'Brgy.26,Laoag City, Ilocos Norte', 'Dino Rossano Aguilar', 'Business Man', 'Lirio Laura Aguilar', 'N/A', NULL, NULL, NULL, NULL, NULL, NULL, 'MMSU-LES', 'A.Castro Ave., Laoag City', 2010, 'MMSU-LHS', 'A.Castro Ave., Laoag City', 2014, '', '', NULL),
(144, 0, '21e6a0ac', '14-5039', '14', 'Talamayan', 'Ian Michael', 'Gabriana', 'Male', 'Single', 'Filipino', '1997-11-27', 'Laoag City, Ilocos Norte', '09087379601', 'Brgy.2 Laoag City,Ilocos Norte', 'Michael Bart Talamayan', NULL, 'Valerie Talamayan', 'Teacher', NULL, NULL, NULL, NULL, NULL, NULL, 'MMSU-LES', 'A.Castro Ave.,Laoag City', 2010, 'MMSU-LHS', 'A.Castro Ave.,LAoag City', 2014, NULL, NULL, NULL),
(145, 0, 'a1410e6a', '14-5050', '14', 'Oalog', 'Arzan May', 'Dela Cruz', 'Female', 'Single', 'Filipino', '1997-12-19', 'Batac, I.N.', '09073824669', 'Madamba, Dingras, I.N.', 'Domingo Maldriem G. Oalog', 'Construction Worker', 'Luzviminda D. Oalog', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Dingras west Central Elemenary School', 'Madamba, Dingras, I.N.', 2010, 'Lt. Edgar Foz Memorial National High School', 'Madamba, Dingras, I.N.', 2014, NULL, NULL, NULL),
(146, 0, '1712bec0', '14-5051', '14', 'Agulay', 'Rhea', 'Calibuyot', 'Female', 'Single', 'Filipino', '1997-12-05', 'Dingras, I.N.', NULL, 'Sitio Uno, Albano, Dingras, I.N.', 'Romy R. Agulay', 'Seaman', 'Phelga C. Agulay', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Dingras West Central Elementary School', 'Brgy. Madamba, Dingras, I.N.', 2010, 'Dingras National High School Lt. EFMNHS', 'Brgy. Madamba, Dingras, I.N.', 2014, NULL, NULL, NULL),
(147, 0, 'e7e4e422', '14-5056', '14', 'Agcanas', 'Dianne Marie', 'Gudoy', 'Female', 'Single', 'Filipino', '1997-08-11', 'Batac, I.N.', '09758076678', 'Quiling Sur, Batac City', 'Russel Agcanas', 'OFW', 'Emely Agcanas', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Cainta Elementary School', 'Cainta, Rizal', 2010, 'Francisco P. Felix Memorial National High School', 'Cainta, Rizal', 2014, NULL, NULL, NULL),
(148, 0, 'b37a314a', '14-5058', '14', 'Agcaoili', 'Grazielle', 'Saguirre', 'Female', 'Single', 'Filipino', '1998-03-26', 'Claveria, Cagayan', '09369665113', 'Brgy. Kilkiling, Claveria, Cagayan', 'Edmund Agcaoili', 'Businessman', 'Salve Agcaoili', 'Teacher', NULL, NULL, NULL, NULL, NULL, NULL, 'Bilibigao Elementary School', 'Brgy. Bilibigao, Claveria, Cagayan', 2010, 'Academy Of St. Joseph', 'C-1,Claveria, Cagayan', 2014, NULL, NULL, NULL),
(149, 0, '8da0f3e6', '14-5092', '14', 'Basilio', 'Christian Louis', 'F', 'Male', 'Single', 'Filipino', '1997-10-14', 'Batac City, Ilocos Norte', '09129779335', 'Brgy.11 Sta.Rosa,Sarrat, Ilocos Norte', 'Jaime Basilio', 'Farmer', 'Luzminda Basilio', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Sta. Rosa Elementary School', 'Brgy. 11 Sarrat, Ilocos Norte', 2010, 'Sta.Rosa National High School', 'Brgy. 10 Sarrat Ilocos Norte', 2014, NULL, NULL, NULL),
(150, 0, 'b8a434c5', '14-5109', '14', 'Ibarra', 'Bryan', 'Cortado', 'Male', 'Single', 'Filipino', '1997-09-15', 'Mandaluyong City', '09055446805', 'Brgy. Sta. Cruz, Sinait, Ilocos Sur', 'Nixon Ibarra', 'Farmer', 'Carmela Ibarra', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Sta.Cruz Elementary School', 'Brgy. Sta.cruz, Sinait, Ilocos Sur', 2010, 'Sinait NAtional High School', 'Ricudo, Sinait, Ilocos Sur', 2014, '', '', NULL),
(151, 0, '54f132cf', '14-5113', '14', 'Ramos', 'Frank John ', 'F.', 'Male', 'Single', NULL, '1998-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 0, 'a00e9823', '14-5118', '14', 'Arenzana', 'Naphia Mae', 'Punay', 'Female', 'Single', 'Filipino', '1992-04-02', 'Baguio City', '09092640575', 'Brgy. 10 Sarrat, Ilocos Norte', 'Napoleon n Arenzana', 'Farmer', 'Myra Arenzana', 'Sales Representative', NULL, NULL, NULL, NULL, NULL, NULL, 'Sta. Rosa Elementary School', 'Brgy 11 Sarrat, Ilocos Norte', 2010, 'Sta. Rosa national High School', 'Brgy 10 Sarrat,Ilocos Norte', 2014, '', '', NULL),
(153, 0, '14692e10', '14-5124', '14', 'Basilio', 'Jhan Leo', 'Diza', 'Male', 'Single', 'Filipino', '2017-04-18', 'Vintar', '09306674862', 'Vintar, Ilocos Norte', 'Jonathan Basilio', 'Carpenter/farmer', 'Ligaya D. Basilio', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Lubnac Elem. School', 'Vintar, Ilocos Norte', 2008, 'Vintar Academy Inc.', 'Vintar, Ilocos Norte', 2014, NULL, NULL, NULL),
(154, 0, '898c2c48', '14-5150', '14', 'Tolentino', 'Janeth', 'Manuel', 'Female', 'Single', 'Filipino', '1998-02-06', 'Dingras, Ilocos Norte', '09485025873', 'Brgy. Bacsil, Dingras, Ilocos norte', 'James Tolentinp', 'Farmer', 'Maria Andrea Tolentino', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Suyo Elementary School', 'Brgy. Suyo,Dingras, ILocos Norte', 2010, 'Suyo National High School', 'Suyo, Dingras Ilocos Norte', 2014, '', '', NULL),
(155, 0, '62c11525', '14-5159', '14', 'Gaston', 'Jezzah Mane', 'Sario', 'Female', 'Single', 'Filipino', '1997-12-31', 'Laoag City', '09759712100', 'Brgy. 25, Laoag City', 'Marlon B. Gaston', 'Government Employee', 'Darlene Joy S. Gaston', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Gabaldon Elementary School', 'Brgy. 23, Laoag City', 2010, 'Mariano Marcos State University-LHS', 'Brgy. 10, Laoag City', 2014, NULL, NULL, NULL),
(156, 0, 'd15d39ec', '14-5184', '14', 'Ballaco', 'Ar-jay', 'Aguedan', 'Male', 'Single', 'Filipino', '1997-06-24', 'Bangui, Ilocos Norte', NULL, 'Brgy. Bacsil,Bangui, Ilocos Norte', 'Remigio Ballaco', 'OFW', 'Joseline Ballaco', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Bangui Central Elementary School', 'San Lorenzo, Bangui, Ilocos Norte', 2010, 'Bangui National High School-Main', 'San Lorenzo, Bangui, Ilocos Norte', 2014, NULL, NULL, NULL),
(157, 0, 'c37b0359', '14-5186', '14', 'Rosete', 'Ronie', 'Pasion', 'Male', 'Single', 'Filipino', '1998-03-19', 'San Nicholas, Ilocos Norte', '0995826674', 'Brgy. Bingao,San Nicholas,Ilocos Norte', 'Roger Rosete', 'Farmer', 'Melanie Rosete', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Nauguyudan Elementary School', ' Brgy.24 Nauguyudan, Paoay, Ilocos Norte', 2010, 'Bingao National High School', 'Brgy 18 Bingao, San Nicholas, Ilocos Norte', 2014, NULL, NULL, NULL),
(158, 0, '072dc858', '14-5218', '14', 'Bay', 'Johann Paul', 'P', 'Male', NULL, NULL, '1998-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 0, 'aee26b99', '14-5238', '14', 'Decretales', 'Kristian', 'Decretales', 'Male', 'Single', 'Filipino', '1997-12-15', 'Manila', '09471814882', 'Bacarra, I.N.', 'Eddie Decretales', 'OFW', 'Vilma Decretales', 'Business', NULL, NULL, NULL, NULL, NULL, NULL, 'Padre Annibale Integraed Schools', 'Vintar Rd.,I.N.', 2010, 'INCAT', 'Laoag City', 2014, NULL, NULL, NULL),
(160, 0, '3468fff3', '14-5243', '14', 'Ulabo', 'Mckleene Allen Joy', 'Vertido', 'Female', 'Single', 'Filipino', '1997-10-03', 'Carasi, Ilocos Norte', '09757543413', 'Brgy.1 Barbaquezo, Carasi, Ilocos Norte', 'Peralta Ulabo', NULL, 'Geraldine Ulabo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Carasi Elementary School', 'Carasi, Ilocos Norte', 2010, 'Carasi National High School', 'Carasi National High School', 2014, NULL, NULL, NULL),
(161, 0, '0c7e6005', '14-5246', '14', 'Villanueva', 'Kathleen Mae', 'Alipio', 'Female', 'Single', 'Filipino', '1997-12-03', 'Claveria, Cagayan', '09102382055', 'Brgy.23 Barabar, San Nicholas, Ilocos Norte', 'Reynaldo Villanueva', 'Deceased', 'Jeoan Villanueva', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Luzon Elementary School', 'Brgy. Luzon, Claveria, Cagayan', 2010, 'San Nicholas National High School', 'Brgy. Sta. Monica, San Nicholas, Ilocos Norte', 2014, '', '', NULL),
(162, 0, '8146cd28', '14-5247', '14', 'Mamaclay', 'Carla Jones', '-', 'Female', 'Single', 'Filipino', '1998-01-16', 'Batac City', '09104705176', 'Brgy. 3, San NicHolas, Ilocos Norte\'', 'Joseph Hilo', NULL, 'Cleofe Mamaclay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'San Nicholas Elementary School', 'Brgy.3, San Nicholas, Ilocos Norte', 2010, 'San Nicholas National High School', 'Brgy.24 San Nicholas, Ilocos Norte', 2014, NULL, NULL, NULL),
(163, 0, 'b08c96ad', '14-5254', '14', 'Casimiro', 'Jasper', 'Villa', 'Male', 'Single', 'Filipino', '1997-07-21', 'San Nicolas, I.N.', '09211884323', 'Brgy. 16, San Nicolas, I.N.', 'Oscar Casimiro', 'Farmer', 'Carmelita Casimiro', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Cayetano Bumanglag Elementary School', 'San Nicolas, I.N.', 2010, 'San Nicolas National High School', 'San Nicolas, I.N.', 2014, NULL, NULL, NULL),
(164, 0, 'ae7f0064', '14-5265', '14', 'Cacacho', 'Edmhar', 'Sagun', 'Male', 'Single', 'Filipino', '1997-06-24', 'Paoay, I.N.', '09161987563', 'Brgy. Nalasin, Paoay, I.N.', 'Edgar Cacacho', 'Farmer', 'Melyrose Cacacho', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Paoay Central Elementary School', 'Paoay, I.N.', 2010, 'Paoay National High School', 'Paoay, I.N.', 2014, NULL, NULL, NULL),
(165, 0, 'a750eee3', '14-5297', '14', 'Flores', 'Aristotle', 'Pardo', 'Male', 'Single', 'Filipino', '1997-09-16', 'QMMC', '09359508852', 'Libertad, Abulug, Cagayan', 'Rudy Flores', NULL, 'Melony Flores', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Libertad Elementary School', 'Libertad, Abulig, Cagayan', 2010, 'Apayao Science High School', 'San Isidro Sur, Luna, Cagayan', 2014, NULL, NULL, NULL),
(166, 0, 'd9952f59', '14-5319', '14', 'Merlas', 'Murff Angel', 'Adriano', 'Male', 'Single', 'Filipino', '1998-08-04', 'Laoag City', '09163016139', 'Brgy.54 Lagui-sail, Laoag City, Ilocos Norte', 'Meddy Merlas', 'Farmer', 'Adelaida Merlas', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Ilocos Norte Adventist School', 'Brgy. 19 Laoag City', 2010, 'St. Joseph High School', 'Brgy. 28 Laoag City', 2014, '', '', NULL),
(167, 0, '646fbe6d', '14-5375', '14', 'Tenorio', 'Carmela', 'Ortega', 'Female', 'Single', 'Filipino', '1997-11-06', 'Pancian Ext-Hospital', '09461670805', 'Brgy.Pancian,Pagudpud,Ilocos Norte', 'Melanio Tenorio', 'Farmer', 'Blanca Tenorio', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Pancian Elementary School', 'Pancian Pagudpud, Ilocos Norte', 2010, 'Pasaleng National High School', 'Pasaleng, Pagudpud, Ilocos Norte', 2014, '', '', NULL),
(168, 0, '9bce6ea9', '14-5379', '14', 'Calautit', 'Clint', 'Cedrick', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 0, '08f71bea', '14-5381', '14', 'Baynosa', 'Kevin', 'Valente', 'Male', 'Single', 'Filipino', '1997-11-28', 'Currimao, Ilocos Norte', '09959683360', 'Brgy. Surgui, Paoay, Ilocos Norte', 'William Baynosa', 'OFW', 'Rosalia Baynosa', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Salbang Elementary School', 'Salbang, Paoay, Ilocos Norte', 2010, 'Paoay National High School', 'Paratong, Paoay, Ilocos Norte', 2014, '', '', NULL),
(170, 0, 'f20802aa', '14-5386', '14', 'Nagun', 'Jan Chester', 'Banririg', 'Male', 'Single', 'Filipino', '1997-08-26', 'Isabela', '09052242345', 'Darasdas, Solsona, I.N.', 'Jimmy A. Nagun', 'Farmer', 'Emma B. Nagun', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Darasdas Elementary School', 'Darasdas, Solsona, I.N.', 2010, 'Solsona National High School', 'Talugtog, Solsona, I.N.', 2014, NULL, NULL, NULL),
(171, 0, '63debf55', '14-5394', '14', 'Gabriel', 'John Michael', 'M.', 'Male', NULL, NULL, '2008-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 0, 'c6840098', '14-5421', '14', 'Agarpao', 'Cherry Mae', 'Pornobe', 'Female', 'Single', 'Filipino', '1998-05-29', 'Laguna', '09464762566', 'Pias Sur, Currimao, I.N.', 'Arnold Agarpao Sr.', 'Driver', 'Gladys Agarpao', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Dona Josefa Edralin Marcos Elementary School', 'Pob. 2, Currimao, I.N.', 2010, 'Currimao National High School', 'Pias Norte, Currimao, I.N.', 2014, NULL, NULL, NULL),
(173, 0, 'd7d921c9', '14-5422', '14', 'Daenos', 'Michelle', 'Nino', 'Female', 'Single', 'Filipino', '1998-03-10', 'Currimao, I.N.', '09195591026', 'Anggapang Norte, Currimao, I.N.', 'Wilfredo Daenos', NULL, 'Vangie Daenos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P.Q. Pimentel Elementary School', 'Batac City', 2010, 'Currimao National High School', 'Pias Norte, Currimao, I.N.', 2014, NULL, NULL, NULL),
(174, 0, '397f5778', '14-5447', '14', 'Galicinao', 'John Mico', 'Sagayadoro', 'Male', 'Single', 'Filipino', '1998-04-13', 'Isabela', '', 'Brgy. 21 Libtong, Bacarra, Ilocos Norte', 'Nestor Galicinao', 'Farmer', 'Trinidad Galicinao', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pulangi Elementary School', 'Brgy. 20 Bacarra, ilocos Norte', 2010, 'Bacarra Natinaol High High School', 'Brgy.1 Bacarra, Ilocos Norte', 2014, '', '', NULL),
(175, 0, '27d6c071', '14-5477', '14', 'Mangilot', 'Germaine Rey', 'Califlores', 'Male', 'Single', 'Filipino', '1997-07-22', 'Batac, I.N.', '09069374232', 'Bungon, Batac City', 'Gerardo Mario B. Mangilot', 'Teacher', 'Jusaine C. Mangilot', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Baay Elementary School', 'Baay, Batac City', 2010, 'Batac National High School', 'Bungon, Batac City', 2014, NULL, NULL, NULL),
(176, 0, '14fee91e', '14-5499', '14', 'Delos Santos', 'Diether', 'Pascua', 'Male', 'Single', 'Filipino', '1998-05-25', 'Bacarra, I.N.', '09501682052', 'Paslocan, Bacarra, I.N.', 'Odante Delos Santos', 'Engineer', 'Melchora Delos Santos', 'Teacher', NULL, NULL, NULL, NULL, NULL, NULL, 'Paslocan Elementary School', 'Sta. Rita, Bacarra, I.N.', 2010, 'Bacarra National Comprehensive High School', 'Sta. Rita, Bacarra, I.N.', 2014, NULL, NULL, NULL),
(177, 0, 'c38e404c', '14-5521', '14', 'Malvar', 'Reynah Cindy', 'De Leon', 'Female', 'Single', 'Filipino', '1997-11-17', 'Laoag City, Ilocos Norte', '09092602962', 'Brgy.2 Sarrat, Ilocos Norte', 'Apolinar Malvar', '', 'Francisca Malvar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sarrat North Central School', 'Brgy.4 Sarrat, Ilocos Norte', 2010, 'Sarrat National High School', 'Brgy.4 Sarrat, Ilocos Norte', 2014, '', '', NULL),
(178, 0, '7dd92258', '14-5545', '14', 'Baloaloa', 'Wilmalyn', 'Sallutan', 'Female', 'Single', 'Filipino', '1997-09-14', 'Burgos, I.N.', '09506851228', 'Buduan, Burgos, I.N.', 'William R. Baloaloa', 'Farmer', 'Madelin S. Baloaloa', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Burgos Central Elementary School', 'Poblacion, Burgos, I.N.', 2010, 'Burgos Agro-Industrial School', 'Poblacion, Burgos, I.N.', 2014, NULL, NULL, NULL),
(179, 0, '39aeb2d1', '14-5584', '14', 'Acosta', 'Mark Anthony', 'R', 'Male', 'Single', NULL, '1998-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 0, '5a678297', '14-5585', '14', 'Abal', 'Harold Jake', 'Ramos', 'Male', 'Single', 'Filipino', '1998-06-23', 'Carasi, Ilocos Norte', '09563900261', 'Brgy. Barbaquezo Carasi, Ilocos Norte', 'Nestor Abal', ' Driver', 'Gudella Abal', 'Treasurer', NULL, NULL, NULL, NULL, NULL, NULL, 'Carasi Elementary School', 'Carasi, Ilocos Norte', 2010, 'INNHS', 'Ablan Ave., Laoag City, Ilocos Norte', 2014, NULL, NULL, NULL),
(181, 0, '7eac4313', '14-5614', '14', 'Pasion', 'Glenn Anne', 'Tapia', 'Female', 'Single', 'Filipino', '1998-04-05', 'Sanchez, Mira', '09488600775', 'Brgy. San Andres, Sanchez Mira, Cagayan', 'Glenmite Anthony Pasion', 'NONE', 'Elisa Tapia Pasion', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Namuac-San Andres Elementary School', 'San Andres, Sanchez Mira, Cagayan', 2010, 'Namuac Academy', 'Namuac, Sanchez Mira, Cagayan', 2014, '', '', NULL),
(182, 0, '782dc20c', '14-5622', '14', 'Valdez', 'Winmhar', 'Gantala', 'Male', 'Single', 'Filipino', '1997-11-14', 'Batac, I.N.', '09123096214', 'Brgy. 9, Sarrat, I.N.', 'Wenceslao Valdez', 'Barangay Chairman', 'Mariza Vladez', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'San Antonio Elementary School', 'Brgy, 8, Sarrat, ki.N.', 2010, 'Ilocos Norte College of Arts and Trades', 'Brgy. 5, Laoag City', 2014, NULL, NULL, NULL),
(183, 0, 'bc80ce79', '14-5634', '14', 'Matias', 'Reggienald', 'Arellano', 'Male', 'Single', 'Filipino', '1997-07-17', 'Solsona, I.N.', '09396540698', 'Gamben, Juan, Solsona, I.N.', 'Simon A. Matias', 'Farmer', 'Gregoria A. Matias', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Solsona Central Elementary School', 'Brgy. Laureta, Solsona, I.N. ', 2010, 'Solsona National High School', 'Brgy. Manalpac, Solsona, I.N.', 2014, NULL, NULL, NULL),
(184, 0, 'dd115375', '14-5667', '14', 'Hedia', 'Jenny', 'Germudo', 'Female', 'Single', 'Filipino', '1996-01-03', 'Brgy. San Marcos, Sarrat, Ilocos Norte', '09351488554', 'Brgy. 21 San Marcos, Sarrat, Ilocos Norte', 'Jeferson Agustin', 'Carpenter', 'Maria Theresa Agustin', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Cabuloan Elementary School', 'San Marcos, Sarrat, Ilocos Norte', 2009, 'Sarrat National High School', 'San Francisco, Sarrat, ilocos Norte', 2013, '', '', NULL),
(185, 0, '02004584', '14-5696', '14', 'Lagoc', 'Rio Van', 'R.', 'Male', NULL, NULL, '1998-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 0, 'a24dea65', '14-5697', '14', 'Balbag', 'Fred Anthony ', 'G.', 'Male', NULL, NULL, '1998-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 0, '1f06ac43', '14-5741', '14', 'Sagun', 'Edward Gordon', 'Guillermo', 'Male', 'Single', 'Filipino', '1997-09-14', 'Pasuquin, I.N.', '09303604265', 'Bugayon, Pasuquin, I.N.', 'Edward Gordon Sagun Sr.', 'Farmer', 'Nancy Lydia Sagun', 'Midwife', NULL, NULL, NULL, NULL, NULL, NULL, 'PCES', 'Brgy. 1, Pasuquin, I.N.', 2010, 'INAC', 'Brgy. 18, Pasuquin, I.N.', 2014, NULL, NULL, NULL),
(188, 0, '88322160', '14-5766', '14', 'Fondeo', 'Avedon', 'Ortal', 'Male', 'Single', 'Filipino', '1998-02-22', 'Pasay City', '09755245807', 'Baay, Batac City', 'Florencio Fondeo', 'Driver', 'Rommelia Fondeo', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Namuccayan Elementary School', 'Sto. Nino, Cagayan', 2010, 'Sto. Nino National High School', 'Sto. Nino, Cagayan', 2014, NULL, NULL, NULL),
(189, 0, '031c4195', '14-5782', '14', 'Padaca', 'John Paul', 'Quelnat', 'Male', 'Single', 'Filipino', '1997-08-22', 'Piddig, I.N.', '09094511949', 'Loing, Piddig, I.N.', 'Michael Padaca (deceased)', NULL, 'Eileen Quelnat', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Piddig South Central Elementary School', 'Cbaroan, Piddig, I.N.', 2010, 'Piddig National High School', 'Tonoton, Piddig, I.N.', 2014, NULL, NULL, NULL),
(190, 0, '9562832e', '14-5790', '14', 'Garma', 'Mark Jurene', 'A', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, 0, 'fe56fc6b', '14-5799', '14', 'Abrogena', 'Gerino', 'Lipon', 'Male', 'Single', 'Filipino', '1997-10-02', 'Pinili, I.N.', '09100745778', 'Piritac, Pnili, I.N.', 'Julio Abrogena', 'Farmer', 'Rosalinda Abrogena', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Don Mariano Marcos Memorial School', 'Pagdilao, Pinili, I.N.', 2010, 'Pinili National High School', 'Capangdanan, Pinili, I.N.', 2014, NULL, NULL, NULL),
(192, 0, 'cd6cbd04', '14-5800', '14', 'Andag', 'Robertson', 'Arquero', 'Male', 'Single', 'Filipino', '1998-04-29', 'Laoag City', '09265344196', 'Brgy. Valbuena, Pinili, I.N.', 'Robert A. Andag', 'Farmer', 'Rebecca A. Andag', 'Farmer', NULL, NULL, NULL, NULL, NULL, NULL, 'Don Mariano Marcos Memorial School', 'Pinili, I.N.', 2010, 'Pinili National High School', 'Pinili, I.N.', 2014, NULL, NULL, NULL),
(193, 0, '9cce74ea', '14-5804', '14', 'Castillo', 'Mark Mauen', 'Reyes', 'Male', 'Single', 'Filipino', '1998-01-15', 'Laoag City', '09267205984', 'Brgy. 25,Laoag City,Ilocos Norte', 'Marlon Castillo', 'Self-Employed', 'Yolanda Florence Castillo', 'Self-Employed', NULL, NULL, NULL, NULL, NULL, NULL, 'Ilocos Norte Adventist School', '', 2010, 'Ilocos Norte National High School', 'Brgy. 4 ablan, Laoag City, Ilocos Norte', 2014, '', '', NULL),
(194, 0, '51e1e202', '14-5807', '14', 'Coloma', 'Kristoffer Lee', 'R.', 'Male', NULL, NULL, '1998-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, 0, '40a28197', '14-5850', '14', 'Gagarin', 'Van Zeus', 'C.', 'Male', NULL, NULL, '2017-04-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 0, 'f923310c', '14-7102', '14', 'Gracias', 'Jhun Garry', 'Rasay', 'Male', 'Single', 'Filipino', '1996-09-28', 'Agoo City, La Union', '09165257562', 'Brgy. 22 San Cristobal, Sarrat, Ilocos Norte', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Fernan Elementary School', 'Fernando, Sto.tomas,La Union', 2009, 'Sarrat National High School', 'Sarrat, ilocos Norte', 2013, NULL, NULL, NULL),
(197, 0, 'd9b15c7a', '14-8140', '14', 'Crisologo', 'Arnie', 'Panoringan', 'Male', 'Single', 'Filipino', '1997-11-12', 'Baguio City', '09102679426', 'San Joaquin, Sarrat, I.N.', 'Armin Crisologo', 'Butcher', 'Espirita Crisologo', 'Vendor', NULL, NULL, NULL, NULL, NULL, NULL, 'Sarrat Central School', 'Brgy. 6, Sarrat, I.N.', 2010, 'Sarrat National High School', 'Brgy. 4, Sarrat, I.N.', 2014, NULL, NULL, NULL),
(198, 0, '3d2d7e62', '14-8179', '14', 'Daoang', 'Apple Grace', 'Balino', 'Female', 'Single', 'Filipino', '1997-07-04', 'Solsona, I.N.', '0907734027', 'Sta. Ana, Solsona, I.N.', 'Gabriel Daoang', 'Farmer', 'Apolonia Daoang', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Sta. Ana Elementary School', 'Sta. Ana, Solsona, I.N.', 2010, 'Solsona National High School', 'Brgy. Manalpac, Solsona, I.N.', 2014, NULL, NULL, NULL),
(199, 0, 'e4f3ff61', '15-030117', '15', 'Corpuz', 'Joana Marie', 'Tabbada', 'Female', 'Single', 'Filipino', '1999-01-15', 'Batac City', '09959739082', '1 Ricarte Batac City, Ilocos Norte', 'Lorinel A. Corpuz', 'Seaman', 'Marte T. Cabinong', 'Nurse', NULL, NULL, NULL, NULL, NULL, NULL, 'Sumader Elem. School', 'Batac City, Ilocos Norte', 2011, 'BJC', 'Valdez, Batac City, Ilocos Norte', 2015, 'CBEA', NULL, 2016),
(200, 0, '1053cd71', '15-030430', '15', 'Ramos', 'Kaye Anne', 'Marcos', 'Female', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, 0, '7069af09', '15-030437', '15', 'Villa', 'Weena', 'Tonelada', 'Female', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 0, 'cb55ba9d', '15-030456', '15', 'Agpalasin', 'Nerissa mae', 'Magdaong', 'Female', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, 0, '2bf440f2', '15-030496', '15', 'Lacap', 'Justine Paul', 'Castro', 'Male', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 0, 'ce7979b6', '15-030650', '15', 'Calina', 'Ma. Krizza Erica', 'Ramos', 'Female', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, 0, 'c7d56d4f', '15-0486', '15', 'Bonoan', 'Grashiela', 'Soloevilla', 'Female', 'Single', 'Filipino', '1999-05-01', 'Manila Doctors Hospital', '09300718782', 'Brgy. 4, Bacarra, Ilocos Norte', 'Bobby Bonoan', 'Retire Soldier', 'Grace Bonoan', 'Housewife', '', '', '', '', '', '', 'Bacarra Central Elem. School', 'Sta. Rita, Bacarra, Ilocos Norte', 2011, 'Bnchs', 'Sta. Rita, Bacarra, Ilocos Norte', 2015, '', '', 0),
(206, 0, '48604cf9', '15-050020', '15', 'Rumbaoa', 'Yna Nicole', 'Pagarigan', 'Female', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, 0, 'e11b0d95', '15-050027', '15', 'Batara', 'Florie mae ', 'Vidad', 'Female', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, 0, '4effc8c4', '15-050040', '15', 'Apostol', 'Eivans Gabriel', 'Ganotice', 'Male', NULL, 'Filipino', '1999-04-25', 'Sanchez Mira', '0977308599', 'Centro 2, Sanchez Mira, Cagayan', 'Noel Apostol', NULL, 'Nancy Apostol', 'Teacher', NULL, NULL, NULL, NULL, NULL, NULL, 'West Central Elem. School', 'Centro 2, Sanchez Mira, Cagayan', 2011, 'Sanchez Mira School Of Arts And Trades', 'Sanchez Mira, Cagayan', 2015, NULL, NULL, NULL),
(209, 0, '9641ebc1', '15-050045', '15', 'Batara', 'Charm Olive', 'Campa?Ano', 'Female', 'Single', 'Filipino', '1998-09-17', 'Batac City', '09223878756', 'Mabini St. Brgy. 6, Sarrat, Ilocos Norte', 'Marck C. Batara', 'Office Clerkarts The Languagee', 'Catherine C. Batara', 'Admin Officer', '', '', '', '', '', '', 'International School Of The Arts The Languages And The Academe', 'Brgy. 18, Laoag City Ilocs Norte', 2011, 'Saviours Christian Academe', 'Brgy. 2, Laoag City, Ilocos Norte', 2015, '', '', 0),
(210, 0, '3a3010c0', '15-050051', '15', 'Palafox', 'Mattheau Luke', '-', 'Male', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, 0, '7515f572', '15-050082', '15', 'Salvador', 'Wrenzie Claire', 'Noguerra', 'Female', 'Single', 'Filipino', '1999-05-01', 'Lipa Batangas', '09461210113', 'Lang-Ayan, Currimao, Ilocos Norte', 'Arnel C. Salvador', 'Ofw', 'Rema N. Salvador', 'Housekeeper', '', '', '', '', '', '', 'Pias-Gaang Elem. School', 'Pias-Norte, Currimao, Ilocos Norte', 2012, 'Batac Junior College', 'Valdez, Batac City, Ilocos Norte', 2015, '', '', 0),
(212, 0, '53e5aac5', '15-050083', '15', 'Manago', 'Fhiel', 'Macadangdang', 'Male', 'Single', 'Filipino', '1998-11-06', 'Mmmh Batac', '09998090962', 'San Andres Ii, Bacarra, Ilocos Norte', 'Melquiades C. Manago', 'Driver', 'Fe M. Manago', 'None', NULL, NULL, NULL, NULL, NULL, NULL, 'Sped Em', 'Sta. Rita, Bacarra, Ilocos Norte', 2011, 'Bnchs', 'Sta. Rita, Bacarra, Ilocos Norte', 2015, NULL, NULL, NULL),
(213, 0, '8ed847f1', '15-050094', '15', 'Iglesia', 'Devin Joshua', 'Taylan', 'Male', 'Single', 'Filipino', '1998-09-03', 'Badoc, Ilocos Norte', '09488032764', 'Brgy. Paltit, Badoc, Ilocos Norte', 'Benjamin T. Iglesia', ' Tricycle Driver', ' Janeth T. Iglesia', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Igama College Foundation', ' Brgy. 2 Garreta, Badoc, Ilocos Norte', 2011, 'Igama College Foundation', 'Brgy. 2 Garreta, Badoc, Ilocos Norte', 2015, NULL, NULL, NULL),
(214, 0, 'd3c766eb', '15-050096', '15', 'Marcelino', 'Ian Abraham', 'Frez', 'Male', 'Single', 'Filipino', '1998-09-09', 'Laoag City', '772-1291', 'Primo Lazaro, Laoag City, Ilocos Norte', 'Wilfredo S. Marcelino', 'Retired Bank Manager', 'Nadine B. Frez', 'Coa Auditor', '', '', '', '', '', '', 'Padre Annibale School', '', 0, 'Saviors Christian Academy', '', 0, '', '', 0),
(215, 0, '9dba5a84', '15-050100', '15', 'Tabangcura', 'Wendy Rae', '-', 'Female', 'Single', 'Filipino', '1998-08-05', 'Vintar', '09753355832', 'San Ramon, Vintar, Ilocos Notte', 'Restituto Pascua', 'Skilled Carpenter', 'Purificacion Tabangcura', 'House Wife', NULL, NULL, NULL, NULL, NULL, NULL, 'Florentino Caamaquin Elem. School', 'Sta. Maria, Vintar, Ilocos Norte', 2011, 'Sarrat National High School', 'Sn Francisco, Sarrat, Ilocos Norte', 2015, NULL, NULL, NULL),
(216, 0, 'd2db102f', '15-050102', '15', 'Benito', 'Vernadeth', 'Botin', 'Female', 'Single', 'Filipino', '1999-06-26', 'Banna', '09306662481', 'Sinamar, Banna, Ilocos Norte', 'Virgilio E. Benito', 'Farmer', 'Catherine B. Benito', 'Housekeeper', '', '', '', '', '', '', 'Sinamar Elem. School', 'Sinamar, Banna, Ilocos Norte', 2011, 'Caestebanan Nhs', 'Sinamar, Banna, Ilocos Norte', 2015, '', '', 0),
(217, 0, '8fcbb47b', '15-050117', '15', 'Fernandez', 'Jamaica', 'Felix', 'Female', 'Single', 'Filipino', '1998-09-30', 'Vintar', '09061695992', 'Bago, Vintar, Ilocos Norte', 'Peter D. Fernandez', 'Farmer', 'Marilou Fernandez', 'Housekeeper', '', '', '', '', '', '', 'Bago Elem. School', 'Bago, Vintar, Ilocos Norte', 2011, 'Vintar National High School', 'Tamdagan, Vintar, Ilocos Norte', 2015, '', '', 0),
(218, 0, '3b9a777f', '15-050119', '15', 'Ignacio', 'Jamaica Aina', 'Campa?Ano', 'Female', 'Single', 'Filipino', '1999-03-13', 'Burgos, Ilocos Norte', '09255041399', 'Poblacion, Burgos, Ilocos Norte', 'Ruperto Erwin B. Ignacio Iii', 'Farmer', 'Maribel C. Ignacio', 'Teacher', '', '', '', '', '', '', 'Burgos Central Elem School', 'Pub. Burgos, Ilocos Norte', 2011, 'Burgos Agro-Industrial School', 'Pub. Burgos, Ilocos Norte', 2015, '', '', 0),
(219, 0, '2e3341c0', '15-050120', '15', 'Collado', 'Antonette', 'Lazaro', 'Female', 'Single', 'Filipino', '1998-07-31', 'Rosales Pangasinan', '09158530025', 'Baruyen, Bangui, Ilocos Norte', '', '', 'Imelda L. Saqui', 'Housekeeper', '', '', '', '', '', '', 'Carmen Elem. School', 'Carmen Rosales Pangasinan', 2011, 'Burgos-Agro-Industrial School', 'Burgos, Ilocos Norte', 2015, '', '', 0),
(220, 0, '16e392bf', '15-050128', '15', 'Villanueva', 'Joel Brian', 'Yamongan', 'Male', 'Single', 'Filipino', '1998-08-07', 'Currimao', '09061695992', 'Paguludan, Currimao, Ilocos Norte', 'Joelito P. Villanuaeva', 'Farmer', 'Vilma Y. Villanueva', 'Housekeeper', '', '', '', '', '', '', 'Bimmanga Ele. School', 'Bimmanga, Currimao, Ilocos Norte', 2011, 'Paoay National High School', 'Paratong, Paoay, Ilocos Norte', 2014, '', '', 0),
(221, 0, '5da140ef', '15-050146', '15', 'Agustin', 'Brandon', 'Manuel', 'Male', 'Single', 'Filipino', '1998-07-11', 'Batac City', '09506158838', 'Darasdas, Solsona, Ilocos Norte', 'Eleuterio P. Agustin', 'Farmer', 'Tessie M. Agustin', 'Housekeeper', '', '', '', '', '', '', 'Darasdas Elem. School', 'Darasdas Solsona, Ilocos Norte', 2011, 'Grbasma 1', 'Juan Solsona, Ilocos Norte', 2015, '', '', 0),
(222, 0, '1a85bb85', '15-050151', '15', 'Llanes', 'Jan Maye', 'Baclig', 'Female', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, 0, '926cc8b5', '15-050152', '15', 'Baclig', 'Laica Jessah', 'Abellera', 'Female', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, 0, '19516057', '15-050154', '15', 'Ulabo', 'Aldrich Johne', 'Ramos', 'Female', 'Single', 'Filipino', '1999-07-21', 'Carasi, Ilocos Norte', '09094853993', 'Carasi, Laoag City, Ilocos Norte', 'Johne Ulano', 'None', 'Mary Anne Ulabo', 'Ofw', NULL, NULL, NULL, NULL, NULL, NULL, 'Carasi Elem. School', 'Carasi, Laoag City, Ilocos Norte', 2011, 'Carasi National High School', 'Carasi, Laoag City, Ilocos Norte', 2015, NULL, NULL, NULL),
(225, 0, '015334d9', '15-050161', '15', 'Ramos', 'Ryan Christian', '', 'Male', 'Single', 'Filipino', '1999-10-17', 'Dingras', '09266595487', 'San Marcos, Dingras, Ilocos Norte', 'Ambrocio Ildefonso', 'Farmer', 'Ernesta S. Ramos', 'Farmer', '', '', '', '', '', '', 'Sagdatan Elem. School', 'Sagpatan, Dingras, Ilocos Norte', 2011, 'Dnhs San Marcos Campus', 'San Esteben, Dingras, Ilocos Norte', 2015, '', '', 0),
(226, 0, '8dcdff2f', '15-050162', '15', 'Dela Cruz', 'Marc Aldrin', 'Mahayag', 'Male', 'Single', 'Filipino', '1998-07-17', 'Piddig', '09300560720', 'Loing, Piddig, Ilocos Norte', '', '', 'Hilda Dela Cruz', '', '', '', '', '', '', '', 'Piddig South', 'Brgy. 1, Cabaroan, Piddig, Ilocos Norte', 2011, 'Saint Anne Academy', 'Brgy. 1, Cabaroan, Piddig, Ilocos Norte', 2015, '', '', 0),
(227, 0, 'f3fe1108', '15-050165', '15', 'Pascua', 'John Francis', 'Laguyo', 'Male', 'Single', 'Filipino', '1999-03-24', 'Laoag City', '09272216592', 'Nagbalagan, Bangui, Ilocos Norte', 'Danny B. Pascua', 'Self Employed', 'Sherry Ann L. Pascua', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Nagbalagan Elem. School', 'Nagbalagan, Bangui, Ilocos Norte', 2011, 'BNHS-Main Campus', 'San Lorenzo, Bangui, Ilocos Norte', 2015, NULL, NULL, NULL),
(228, 0, '5f6c5b03', '15-050189', '15', 'Jimenez', 'Jessica Lei', 'Jamias', 'Female', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(229, 0, 'c5e31ffd', '15-050197', '15', 'Adarne', 'Luigi Alec', 'Ribucan', 'Male', 'Single', 'Filipino', '1999-06-29', 'Ilocos Sur', '09266595487', 'Bacsil, San Juan, Ilocos Sur', 'Anthony Adarne', 'Ofw', 'Alicia Adarne', 'House Wife', '', '', '', '', '', '', 'Bacsil Community School', 'Bacsil, San Juan, Ilocos Sur', 2011, 'Divine Word College Of Vigan', 'Burgos St., Vigan City', 2015, '', '', 0),
(230, 0, 'a0f6b2c3', '15-050203', '15', 'Filarca', 'Christza Fei', 'Porte', 'Female', 'Single', 'Filipino', '1998-12-17', 'Vigan City', '09262896469', 'San Jose, Vigan City, Ilocos Sur', 'Ruben P. Filarca', 'Ofw', 'Ma. Emerlina P. Filarca', 'Business Women', '', '', '', '', '', '', 'Janefa Scholastica', 'Bantay, Ilocos Sur', 2011, 'Vigan National High School', 'Vigan, Ilocos Sur', 2015, '', '', 0),
(231, 0, '5d96d71d', '15-050208', '15', 'Ingel', 'Ni?A Belle', 'P', 'Female', 'Single', 'Filipino', '1999-11-08', 'Mmmh', '09264715957', 'Magnuang, Batac City, Ilocos Norte', 'Juan Y. Ingel', 'Farmer', 'Aida P. Ingel', 'Kasambahay', '', '', '', '', '', '', 'Sinait West Central School', 'Rang-Ay, Sinait, Ilocos Sur', 2011, 'Immaculate Conception Academy', 'Valdez, Batac City, Ilocos Norte', 2015, '', '', 0),
(232, 0, '95713bd2', '15-050219', '15', 'Bungcayao', 'Hazel', 'Guittap', 'Female', 'Single', 'Filipino', '1999-03-02', 'Paoay, Ilocos Norte', '09369517371', 'Nagbacalan, Paoay, Ilocos Norte', 'Pacito L. Bungcayao', 'Private Employee', 'Rosalinda G. Bungcayao', 'Housekeeper', '', '', '', '', '', '', 'Nagbacalan Elem. School', 'Paoay, Ilocos Norte', 2011, 'Paoay Lake National High School', 'Paoay, Ilocos Norte', 2015, '', '', 0),
(233, 0, 'b5a0174c', '15-050231', '15', 'Cudapas', 'Mark Justine', 'Sario', 'Male', 'Single', 'Filipino', '1998-09-09', 'Sta. Cruz, Manila', '09772123324', 'Foz, Dingras, Ilocos Norte', 'Marlon Cudapas', 'Farmer', 'Marilyn Cudapas', 'Housewife', '', '', '', '', '', '', 'Hilaria Salvaterra Mem. Elem. School', 'Foz, Dingras, Ilocos Norte', 2011, 'Dingras National High School', 'Madamba, Dingras, Ilocos Norte', 2015, '', '', 0),
(234, 0, '4f415e55', '15-050244', '15', 'Dacanay', 'Aira Shane', 'Bautista', 'Female', 'Single', 'Filipino', '1999-06-10', 'Batac City', '09069670904', 'Colo, Batac City, Ilocos Norte', 'Rannie S. Dacanay', 'Farmer', 'Agnes B. Dacanay', 'Private Employee', '', '', '', '', '', '', 'Mariano Marcos Mem. Elem. School', 'Valdez, Batac City, Ilocos Norte', 2011, 'Batac National High School-Ssc', 'Tabug, Batac City, Ilocos Norte', 2015, '', '', 0),
(235, 0, '26c627b4', '15-050250', '15', 'Pungtilan', 'Joseph Bill', 'Domingo', 'Male', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(236, 0, 'd7809e36', '15-050253', '15', 'Argel', 'Kristine Philippe', 'Malto', 'Female', 'Single', 'Filipino', '1998-09-16', 'Ncr 2', '09983775452', 'Centro-5, Claveria, Cagayan', 'Anthony H. Argel', 'Electrician', 'Aynthia M. Argel', 'Housewife', '', '', '', '', '', '', 'Claveria East Central', 'C-5, Claveria, Cagayan', 2011, 'Academy Of St. Joseph', 'C-1, Claveria, Cagayan', 2015, '', '', 0),
(237, 0, '3847c942', '15-050259', '15', 'Tano', 'Guilla Denise', 'Ancheta', 'Female', 'Single', 'Filipino', '1998-06-29', 'Laoag City', '09063768310', 'Brgy. 7-B, Laoag City, Ilocos Norte', 'Alexander U. Tano', 'Entreprenuer', 'Maritess J. Ancheta', 'Bussiness Woman', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint Santiago School Foundation', 'Brgy. 13, Laoag City, Ilocos Norte', 2011, 'DWCL', 'Brgy. 13, Laoag City, Ilocos Norte', 2015, NULL, NULL, NULL),
(238, 0, 'da424e67', '15-050261', '15', 'Dumalag', 'Rick John', 'Domingo', 'Male', 'Single', 'Filipino', '1998-12-28', 'Claveria', '09273272454', 'Balaan St. Cadcadir East, Claveria, Cagayan', 'Ruel Dumalag', 'Teacher', 'Josefina Dumalag', 'House Wife', '', '', '', '', '', '', 'Cadcadir Elem. School', 'Cadcadir West, Claveria, Cagayan', 2011, 'Academy Of St. Joseph', 'C-1, Claveria Cagayan', 2015, '', '', 0),
(239, 0, '005e643e', '15-050274', '15', 'Manzano', 'Ronald Einstine', 'Tejada', 'Male', 'Single', 'Filipino', '1999-04-11', 'Batac City', '09466515228', 'Anao, Piddig, Ilocos Norte', 'Ronald Manzano', 'Brgy. Kagawad', 'Rizalina Manzano', 'Prinsipal', '', '', '', '', '', '', 'Piddig South Central Elem. School', 'Brgy. 1 Cabaraoan, Ilocos Norte', 2011, 'Piddig Nation High School', 'Brgy. 6 Tonoton, Ilocos Norte', 2015, '', '', 0),
(240, 0, '7ce56d07', '15-050278', '15', 'Endrino', 'Zacary Laurence', 'Palpallatoc', 'Male', 'Single', 'Filipino', '1998-09-19', 'Bangui', '09128067471', 'San Lorenzo, Bangui, Ilocos Norte', 'Arnel Endrino', 'Farmer', 'Ernaendrino', 'House Wife', '', '', '', '', '', '', 'Bangui Central Elem. School', 'San Lorenzo, Bangui, Ilocos Norte', 2011, 'Saint Lawrence Academy', 'San Lorenzon, Bangui, Ilocos Norte', 2015, '', '', 0),
(241, 0, 'cc587c54', '15-050297', '15', 'Isla', 'Jay Lauren', 'Bumagat', 'Male', 'Single', 'Filipino', '1999-06-23', 'Bacarra', '09127371863', 'Brgy. 5 Bacarra, Ilocos Norte', 'Romel B. Isla', 'Construction Worker', 'Imelda  B. Isla', 'House Wife', '', '', '', '', '', '', 'San Agustine Elem. School', 'Brgy. 9 Bacarra, Ilocos Norte', 2011, 'Bacarra National Comprehensive Hign School', 'Brgy. 1 Bacarra, Ilocos Norte', 2015, '', '', 0),
(242, 0, 'b0736494', '15-050299', '15', 'Saniatan', 'Saniatan', 'Subia', 'Male', 'Single', 'Filipino', '1999-02-22', 'Laoag City', '09204243279', 'Bbrgy. 10, Bacarra, Ilocos Norte', 'Jimmy Saniatan', 'Deceased', 'Amelia Saniatan', 'Teacher', '', '', '', '', '', '', 'San Agustine Elem. School', 'Brgy. 9 Bacarra, Ilocos Norte', 2011, 'Bacarra National Comprehensive Hign School', 'Brgy. 1 Bacarra, Ilocos Norte', 2015, '', '', 0),
(243, 0, '75fd898c', '15-050307', '15', 'Macalma', 'Jojo', 'Bagasol', 'Male', 'Single', 'Filoipino', '1999-02-11', 'Nagbacalan, Paoay, Ilocos Norte', '09166752608', 'Sungadon, Paoay, Ilocos Norte', 'John E. Macalma', 'Farmer/Carpenter', 'Joan B. Macalma', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Pasil Elem. School', 'Pasil, Paoay, Ilocos Norte', 2011, 'Paoay Lake Nhs', 'Nagbacalan, Paoay, Ilocso Norte', 2015, NULL, NULL, NULL),
(244, 0, 'd543c2d6', '15-050324', '15', 'Cachapero', 'McLouie', 'Agbayani', 'Male', 'Single', 'Filipino', '1998-10-31', 'Sanchez Mira', '09261031206', 'C-2, Sanchez Mira, Cagayan', 'Joseph J. Cachapero', 'Brgy. Kagawad', 'Estrella A. Cachapero', 'Teacher', NULL, NULL, NULL, NULL, NULL, NULL, 'SMWCES', 'C-2, Sanchez Mira, Cagayan', 2011, 'CSU-SHS', 'C-2, Sanchez Mira, Cagayan', 2015, NULL, NULL, NULL),
(245, 0, '7f50be48', '15-050325', '15', 'Galiza', 'Brian Victor', 'Lampitoc', 'Male', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(246, 0, '3626244d', '15-050339', '15', 'Bautista', 'Owen James', 'Juan', 'Male', 'Single', 'Filipino', '1998-10-29', 'Banna', '09461222652', 'Marcos, Banna, Ilocos Norte', 'Anselmo Bautista', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Banna Central Elem. School', 'Marcos, Banna, Ilocos Norte', 2011, 'Banna National High School', 'Lorenzo, Banna, Ilocos Norte', 2015, NULL, NULL, NULL),
(247, 0, '96d7f4b4', '15-050365', '15', 'Villanueva', 'Michael John', 'Umandac', 'Male', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(248, 0, '42b6e20c', '15-050366', '15', 'Valencia', 'Jonina Kaye', 'Pagtama', 'Female', 'Single', 'Filipino', '1997-12-11', 'Batac City', '09152487185', 'Cabungaan, Laoag City, Ilocos Norte', 'Marco Matias Valencia', 'Ofw', 'Carol Pagtama Valencia', 'Ofw', '', '', '', '', '', '', 'Cabeza Elem. School', 'Cabungaan, Laoag City, Ilocos Norte', 2009, 'St. John\'s School', 'Kuala Belait, Brunei', 2014, '', '', 0),
(249, 0, '9fb938ff', '15-050367', '15', 'Usman', 'Mohamadnor', 'G', 'Male', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(250, 0, 'ff5be829', '15-050372', '15', 'Castillo', 'Reina Mae', 'Cadaba', 'Female', 'Single', 'Filipino', '1999-05-11', 'Poblacion, Luna, Apayao', '09991318455', 'Capagaypayan, Luna, Apayao', 'Rogelio A. Castillo', 'Farmer', 'Marvelyn C. Castillo', 'House Wife', '', '', '', '', '', '', 'Luna Central School', 'Poblacion, Luna, Apayao', 2012, 'Luna National High School', 'Poblacion, Luna, Apayao', 2015, '', '', 0),
(251, 0, 'ad8dacc3', '15-050380', '15', 'Osalvo', 'Camille Anne', 'Quilates', 'Female', 'Single', 'Filipino', '1999-07-22', 'Vigan City', '09555643992', 'Bulag East, Bantay. Ilocos Sur', 'Aldwin P. Osalvo', 'Driver', 'Concepcion Q. Osalvo', 'Office Clerk', NULL, NULL, NULL, NULL, NULL, NULL, 'Bulag Elem. School', 'Bulag West, Bantay, Ilocos Sur', 2011, 'Ilocos Sur, National High School', 'Brgy. 7, Vigan City, Ilocos Sur', 2015, NULL, NULL, NULL),
(252, 0, 'daace14c', '15-050391', '15', 'Cuenca', 'Daryll', 'Mata', 'Male', 'Single', 'Filipino', '1999-01-23', 'Laoag City', '09306680625', 'Brgy. 5, Laoag City, Ilocos Norte', 'Rodel Cuenca', 'Tricycle Driver', 'Myrna Cuenca', 'Nurse', '', '', '', '', '', '', 'Shamrock Elem. School', 'Bbrgy. 7b P. Gomez St. Laoag City, Ilocos Norte', 2011, 'Incat', 'Brgy. 5 P. Gomez St. Laoag City, Ilocos Norte', 2015, '', '', 0),
(253, 0, 'aec12849', '15-050395', '15', 'Rabang', 'Kay Christian', 'Remular', 'Male', 'Single', 'Filipino', '1999-05-05', 'Vigan City', '09306743276', 'Tamorong. Sta. Catalina, Ilocos Sur', 'Francisco Rabang Jr.', 'Ofw', 'Ginie Rabang', 'Teacher', '', '', '', '', '', '', 'Calawaan Elem. School', 'Calawaan, Sta. Catalina', 2011, 'Ilocos Sur National High School', 'Vigan City, Ilocos Sur', 2015, '', '', 0),
(254, 0, '0fa24d0f', '15-050417', '15', 'Agas', 'Drexler', 'Tadlas', 'Male', 'Single', 'Filipino', '1999-04-17', 'Bacarra', '09187309741', 'Pipias, Bacarra, Ilocos Norte', 'Rodrigo E. Agas', 'Ofw', 'Nora T. Agas', 'Housekeeper', '', '', '', '', '', '', 'Cabulalaan Elem. School', 'Cabulalaan, Bacarra, Ilocos Norte', 2011, 'Bacarra National Comprehensive High School', 'Sta. Rita, Bacarra, Ilocos Norte', 2015, '', '', 0),
(255, 0, 'aa0e960f', '15-050439', '15', 'Simon', 'Jude Michael', 'Gano', 'Male', 'Single', 'Filipino', '1999-06-19', 'Laoag City', '09461167917', 'San Marcelino, Dingras, Ilcos Norte', 'Jehu M. Simon', 'Farmer', 'Evangeline G. Simon', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'San Marcelino Elem. School', 'San Marcelino, Dingras, Ilocos Norte', 2011, 'San Marcelino Nhs', 'San Marcelino, Dingras, Ilocos Norte', 2015, NULL, NULL, NULL),
(256, 0, '13e18293', '15-050464', '15', 'Zafaralla', 'Shareigne Szei Wai', 'Raguirag', 'Female', 'Single', 'Filipino', '1999-06-25', 'Currimao', '09750021772', 'Paguludan, Curimmao, Ilocso Norte', 'Renato Zafaralla', 'Farmer/Musician', 'Marilou Zafaralla', 'Treasurer', '', '', '', '', '', '', 'Bimmanga Elem. School', 'Bimmanga, Curimmao, Ilocos Norte', 2011, 'Paoay National High School', 'Paratong, Paoay, Ilocos Norte', 2015, '', '', 0),
(257, 0, '906445be', '15-050474', '15', 'Antonio', 'Dave', 'Boc', 'Male', 'Single', 'Filipino', '1998-08-06', 'Laoag', '09102817263', 'Darasdas, Solsona, Ilocos Norte', 'Dionicio V. Antonio', 'Seaman', 'Salvacion F. Antonio', 'House Wife', NULL, NULL, NULL, NULL, NULL, NULL, 'Faith Bible Baptist Academy', 'Juan, Solsona, Ilocos Norte', 2011, 'Solsona National High School-Talugtog Campus', 'Talugtog, Solsona, Ilocos Norte', 2015, NULL, NULL, NULL),
(258, 0, '5e9c26fa', '15-050481', '15', 'Gapas', 'Jezrel Vhicent', 'Vizcarra', 'Male', 'Single', 'Filipino', '1998-12-15', 'Claveria', '09184129398', 'Pinas, Claveria, Cagayan', 'Vincent D. Gapas', 'Farming', 'Noraline V. Gapas', 'Teaching', '', '', '', '', '', '', 'Pinas Elem. School', 'Pinas, Claveria, Cagayan', 2011, 'Claveria School Of Arts And Trades', 'C-1, Claveria, Cagayan', 0, '', '', 0),
(259, 0, '7aaefcd2', '15-050483', '15', 'Ona', 'Dan Ley', 'Carrasca', 'Male', 'Single', 'Filipino', '1998-08-01', 'Batac City', '09078574955', 'Baligat Batac City, Ilocos Norte', 'Flaviano Ona', 'Farmer', 'Emelita Ona', 'House Keeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Baligat Elem. School', 'Baligat Batac City, Ilocos Norte', 2011, 'Batac National High School', 'Bungon Batac City, Ilocos Norte', 2015, NULL, NULL, NULL),
(260, 0, '5a486550', '15-050484', '15', 'Bonoan', 'John Michael', 'Jacob', 'Male', 'Single', 'Filipino', '1999-03-10', 'Laoag', '09951611690', 'Brgy. 4, Bacarra, Ilocos Norte', 'Edison M. Banoan Jr.', 'Electronic Technician', 'Romely J. Bonoan', 'Housewife', '', '', '', '', '', '', 'Mmsu-Les', 'Brgy. 14, Laoag City, Ilocos Norte', 2011, 'Incat', 'Brgy. 7, Laoag City, Ilocos Norte', 2015, '', '', 0),
(261, 0, 'd4480c38', '15-050487', '15', 'Oamil', 'Quim Michael Malori', 'Cabuyadao', 'Male', 'Single', 'Filipino', '1998-01-03', 'Batac City', '09061871492', 'Malto St. Namuac, Sanchez Mira, Cagayan', 'Marlo Oamil', 'Teacher', 'Michelle Oamil', 'Teacher', '', '', '', '', '', '', 'Namuac San Andres Elem. School', 'San Andres, Sanchez Mira, Cagayan', 2011, 'Sanchez Mira School Of Arts And Trades', 'Santor, Sanchez Mira, Cagayan', 2014, '', '', 0),
(262, 0, '4051b0cf', '15-050492', '15', 'Saymo', 'Ma. Christina', 'Biteranta', 'Female', 'Single', 'Filipino', '1998-11-07', 'Angono Rizal', '09106506976', 'Balioeg Banna, Ilocos Norte', 'Robert Saymo', 'None', 'Emma B. Saymo', 'Brgy. Secretary', '', '', '', '', '', '', 'Lading Elem. School', 'Balideg, Banna, Ilocos Norte', 2011, 'Caeste Banan National High School', 'Sinamar, Banna, Ilocos Norte', 2015, '', '', 0);
INSERT INTO `students` (`id`, `cfatscore`, `passcode`, `studnum`, `yearstarted`, `surname`, `firstname`, `middlename`, `gender`, `status`, `citizenship`, `dateofbirth`, `placeofbirth`, `contactnum`, `address`, `father`, `fatheroccupation`, `mother`, `motheroccupation`, `spouse`, `spouseoccupation`, `houseaddress`, `employer`, `businessaddress`, `telnum`, `elementary`, `elemaddress`, `elemgraduate`, `secondary`, `secaddress`, `secgraduate`, `college`, `coladdress`, `colgraduate`) VALUES
(263, 0, '213019f6', '15-050496', '15', 'Rovira', 'Bernadette Ann', 'Barandoc', 'Female', 'Single', 'Filipino', '1999-03-10', 'Claveria, Cagayan', '09065588635', 'Mapulapula, Claveria, Cagayan', 'Benson Rovira', 'Farmer', 'Senieflor Rovira', 'Housewife', '', '', '', '', '', '', 'Santiago Elem. School', 'Santiago Claveria, Cagayan', 2011, 'Claveria Rural And Vocational Scshool', 'Dibalio Claveria, Cagayan', 2015, '', '', 0),
(264, 0, '28fd16f7', '15-050504', '15', 'Sinfuego', 'Ma. Claire', 'yarcia', 'Female', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(265, 0, '781f6925', '15-050507', '15', 'Japitan', 'Christian Angelo', 'Mabuti', 'Male', 'Single', 'Filipino', '1997-10-04', 'Sarrat', '09983672865', 'Brgy. 10, Sarrat, Ilocos Norte', 'Bernardino W. Japitan', 'Salesman', 'Leilanie M. Japitan', 'Vegetable Vendor', NULL, NULL, NULL, NULL, NULL, NULL, 'Sta. Rosa Elem. School', 'Brgy. 11, Sarrar, Ilocos Norte', 2010, 'Sta. Rosa National High School', 'Brgy. 11, Sarrat, Ilocos Norte', 2014, NULL, NULL, NULL),
(266, 0, '84f75807', '15-050508', '15', 'Cudal', 'Rizza Mae', 'Miguel', 'Female', 'Single', 'Filipino', '1998-12-30', 'Laoag City', '09172596120', 'Sta. Rosa, Laoag City, Ilocos Norte', 'Marlon F. Cudal', 'Driver', 'Emyrose M. Cudal', 'Housewife', '', '', '', '', '', '', 'Araya Elem. School', 'Sta. Rosa, Laoag City, Ilocos Norte', 2011, 'Incat', 'Brgy. 9, Laoag City, Ilocos Norte', 2015, '', '', 0),
(267, 0, 'ea2f2edc', '15-050510', '15', 'Lawaan', 'Sherleen Mae', 'Ganal', 'Female', 'Single', 'Filipino', '1997-07-28', 'Dingras, Ilocos Norte', '09096642655', 'San Marcelino, Dingras, Ilocos Norte', 'Severino S. Lawaan', 'Farmer', 'Marites G. Lawaan', 'House Wife', '', '', '', '', '', '', 'San Marcelino Elem. School', 'San Marcelino, Dingras, Ilocos Norte', 2010, 'San Marcelino National High School', 'San Marcelino, Dingras, Ilocos Norte', 2014, '', '', 0),
(268, 0, '11a11736', '15-050516', '15', 'De Los Santos', 'Joenel', 'Bautista', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(269, 0, '587d8f31', '15-050523', '15', 'Burgos', 'Marc', 'Toledo', 'Male', 'Single', 'Filipino', '1999-11-23', 'Manila', '09154301784', 'Brgy. 23, Laoag City, Ilocos Norte', 'James V. Burgos', 'Tricycle Driver/Tanod', 'Nelita T. Burgos', 'House Wife', NULL, NULL, NULL, NULL, NULL, NULL, 'Gabaldon', 'Paterno, Laoag City, Ilocos Norte', 2010, 'Incat', 'Gomez, Laoag City, Ilocos Norte', 2014, NULL, NULL, NULL),
(270, 0, '9c40f87c', '15-050524', '15', 'Yago', 'Nancy', 'Castillo', 'Female', 'Single', 'Filipino', '1999-01-17', 'Sanchez Mira, Cagayan', '09262088147', 'Pinili, Abulug, Cagayan', 'Rogelio Yago', 'Farmer', 'Ermelinda Yago', 'Housekeeper', '', '', '', '', '', '', 'Pinili Elem. School', 'Pinili, Abulug, Cagayan', 2011, 'Dmpmnhs', 'Curva, Pamplona, Cagayan', 2015, '', '', 0),
(271, 0, 'd59c60f4', '15-050528', '15', 'Calpo', 'Ma. Eloisa', 'Padaoang', 'Female', 'Single', 'Filipino', '1999-02-07', 'Burgos, Ilocos Norte', '09067692286', 'Ablan, Burgos, Ilocos Norte', 'Elpidio V. Calpo', 'Ofw', 'Marites Padaoang', 'House Wife', '', '', '', '', '', '', 'Ablan Community School', 'Ablan, Burgos, Ilocos Norte', 2011, 'Saint James Academy', 'Brgy. 2 Pasuquin, Ilocos Norte', 2015, '', '', 0),
(272, 0, 'a8a1cafb', '15-050533', '15', 'Ramos', 'Jansen Jay', ' Castillo', 'Male', 'Single', 'Filipino', '1999-05-21', 'laoag City', '0909788429', 'Brgy. Teppang, Bacarra, Ilocos NOrte', 'Joel Ramos', 'Security Guard', 'Feliza Ramos', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Parang Elementary School', 'Duripas, Ilocos Norte', 2011, 'Bacarra National Comprehensive High School', 'Sta.Rita, Bacarra, Ilocos Norte', 2015, NULL, NULL, NULL),
(273, 0, 'd360235c', '15-050544', '15', 'Cruz', 'Jomarie', 'Chaves', 'Male', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(274, 0, '87f7bea5', '15-050552', '15', 'Matias', 'Mary Grace', 'Domingo', 'Female', 'Single', 'Filipino', '1998-07-04', 'Batac', '09072954678', 'Talugtog, Solsona, Ilocos Norte', '', '', 'Mary Jane D. Matias', 'Housewife', '', '', '', '', '', '', 'Talugtog Elem. School', 'Talugtog, Solsona, Ilocos Norte', 2011, 'Solsona Nhs-Talugtog Campus', 'Talugtog, Solsona, Ilocos Norte', 2015, '', '', 0),
(275, 0, '1644108d', '15-050565', '15', 'Balalio', 'Kent Herbert', 'Descalzo', 'Male', 'Single', 'Filipino', '1999-04-19', 'Santiago', '09261037416', 'Langagan, Sanchez Mira, Cagayan', 'Rogelio P. Balalio', 'Ofw', 'Lolita D. Balalio', 'Teacher', '', '', '', '', '', '', 'Langagan Elem School', 'Langagan, Sanchez Mira, Cagayan', 2011, 'Sanchez Mira School Of Arts And Trades', 'Dabueray, Sanchez Mira, Cagaya', 2015, '', '', 0),
(276, 0, 'dac17f7c', '15-050571', '15', 'Java', 'Jethro Marc', 'Guitap', 'Male', 'Single', 'Filipino', '1999-03-11', 'Meycauayan, Bulacan', '09164558709', 'Brgy. Acosta, Batac City, Ilocos Norte', 'Bernie M. Java', 'Farmer', 'Lemelyn G. Java', 'House Wife', '', '', '', '', '', '', 'Basak Elem. School', 'Basak, Mandaue City', 2011, 'Batac National High School', 'Brgy. Tabug, Batac City, Ilocos Norte', 2015, '', '', 0),
(277, 0, 'eeebb52b', '15-050572', '15', 'Java', 'Jasser Jan', 'Guitap', 'Male', 'Single', 'Filipino', '1998-01-20', 'Agdao, Davao City', '09061744727', 'Brgy. Acosta, Batac City, Ilocos Norte', 'Bernie M. Java', 'Ofw', 'Lemelyn G. Java', 'House Wife', '', '', '', '', '', '', 'Basak Elem. School', 'Basak, Mandaue City', 2010, 'Mandaue City Comprehensive National High School', 'Plaredel St. Reclamation Area Mandaue City', 2015, '', '', 0),
(278, 0, '9e5056a8', '15-050574', '15', 'Rayoan', 'John Richmond', 'Trinidad', 'Male', 'Single', 'filipino', '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(279, 0, '462aa34e', '15-050594', '15', 'Corpuz', 'Reyvie', 'Rosales', 'Female', 'Single', 'Filipino', '1999-05-03', 'Sanchez, Mira, Cagayan', '09094221854', 'Darasdas, Solsona, Ilocos Norte', 'Reylie T. Corpuz', 'Seaman', 'Vicky B. Corpuz', 'House Wife', NULL, NULL, NULL, NULL, NULL, NULL, 'Talugtog Elem.  School', 'Talugtog, Solsona, Ilocos Norte', 2011, 'Solsona National High School-Talugtog Campus', 'Talugtog, Solsona, Ilocos Norte', 2015, NULL, NULL, NULL),
(280, 0, '38ed5b67', '15-050622', '15', 'Manzanillo', 'Patrick', 'Jabay', 'Male', 'Single', 'Filipino', '1998-03-03', 'Sanchez Mira, Cagayan', '09355920894', 'Tabug, Batac City, Ilocos Norte', 'Roger Manzanillo', 'Farmer', 'Edna Manzanillo', 'Domestic Helper', '', '', '', '', '', '', 'Pippila Elem. School', 'Sta. Cruz Pamplona, Cagayan', 2011, 'Pamplona National School Of Fisheries', 'Abbangkenan Pamplona, Cagayan', 2015, '', '', 0),
(281, 0, '46572f04', '15-050627', '15', 'Soh', 'Vivien', 'B', 'Female', 'Single', 'Filipino', '1998-09-17', 'Piddig District Hospital', '09120303788', 'Abucay, Piddig, Ilocos Norte', 'Philip Soh', 'Salesman', 'Alma Soh', 'Housewife', '', '', '', '', '', '', 'Abucay Elem. School', 'Abucay, Piddig, Ilocos Norte', 2011, 'Saint Anne Academy', 'Cabarian, Piddig, Ilocos Norte', 2015, '', '', 0),
(282, 0, '65ae7e27', '15-050630', '15', 'Bagaoisan', 'Noel Jr.', 'Mirasol', 'Male', 'Single', 'Filipino', '1998-09-07', 'Batac City', '09075968156', 'Baay, City Of Batac, Ilocos Norte', 'Noel A. Bagaoisan', 'Farmer', 'Teresa M. Bagoisan', 'Housekeeper', '', '', '', '', '', '', 'Baay Elem. School', 'Baay, City Of Batac, Ilocos Norte ', 2011, 'Batac National High School', 'Bungon, City Of Batac, Ilocos Norte', 2015, '', '', 0),
(283, 0, 'ebb60631', '15-050634', '15', 'Salvador', 'Abigail', 'Bineda', 'Female', 'Single', 'Filipino', '1999-02-20', 'San Nicolas, Ilocos Norte', '09108206561', 'San Lorenzo, San Nicolas, Ilocos Norte', 'Ferdinand C. Salvador Sr.', 'Foreman', 'Cristina B. Salvador', 'Housewife', '', '', '', '', '', '', 'Bingao Elem. School', 'San Perdro, San Nicolas, Ilocos Norte', 2011, 'San Nicolas National High School-Bingao Campus', 'San Pedro, San Nicolas, Ilocos Norte', 2015, '', '', 0),
(284, 0, '2dc91ddd', '15-050638', '15', 'Yagyagan', 'Raymond', 'Baudin', 'Male', 'Single', 'Filipino', '1998-09-26', 'Bicol', '09156789370', 'Saoit, Burgos, Ilocos Norte', 'Rogelio R. Yagyagan Jr.', 'Farmer', 'Neda B. Yagyagan', 'Housewife', '', '', '', '', '', '', 'Saoit Elem. School', 'Saoit, Burgos, Ilocos Nnorte', 2011, 'Burgos Agro. Industrial School', 'Poblacion, Burgos, Ilocos Norte', 2015, '', '', 0),
(285, 0, 'a06d408c', '15-050643', '15', 'Lorenzo', 'Nelmy Ruth', 'Cudal', 'Female', 'Single', 'Filipino', '1998-02-28', 'Batac City', '09095914654', 'Sta. Rosa, Laoag City, Ilocos Norte', 'Jimmy R. Lorenzo', 'Driver', 'Nely C. Lorenzo', 'Housewife', '', '', '', '', '', '', 'Apaya Elem. School', 'Sta. Rosa, Laoag City, Ilocos Norte', 2010, 'Incat', 'Brgy.4, Laoag City, Ilocos Norte', 2014, '', '', 0),
(286, 0, '594d0d72', '15-050646', '15', 'Abanilla', 'Rheyna Jhoy', 'Pambid', 'Female', 'Single', 'Filipino', '1999-05-12', 'Batac City', '09273584769', 'Magnuang, Batac City, Ilocos Norte', 'Reynaldo Abanilla', 'Farmer', 'Joyce Abanilla', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Magnuang Elem. School', 'Magnuang, Batac City, Ilocos Norte', 2011, 'Batac Nation High School', 'Tabug, Batac City, Ilocos Norte', 2015, NULL, NULL, NULL),
(287, 0, '620947be', '15-050647', '15', 'Vicente', 'Ma. Elena', 'Pitpit', 'Female', 'Single', 'Filipino', '1997-12-23', 'Banna, Ilocos Norte', '09486298223', 'Pila, Laoag City, Ilocos Norte', 'Alfredo P. Vicente', 'Farmer', 'Margarita P. Vicente', 'Housewife', '', '', '', '', '', '', 'Pila Elem. School', 'Pila, Laoag City, Ilocos Norte', 2011, 'Innhs', 'Ablan, Laoag City, Ilocos Norte', 2015, '', '', 0),
(288, 0, '9e6b646b', '15-050652', '15', 'Javier', 'Jude Michael', 'Galano', 'Male', 'Single', 'Filipino', '1998-09-19', 'Laoag City', '09075053026', 'Lagasca Laoag City, Ilocos Norte', 'John Javer', 'Fire Man', 'Valentina Javer', 'Teacher', NULL, NULL, NULL, NULL, NULL, NULL, 'Shamrock Elem. School', 'Brgy. 7b P.Gomez, Laoag City, Ilocos Norte', 2011, 'Incat', 'Brgy. 7b P.Gomez, Laoag City, Ilocos Norte', 2015, NULL, NULL, NULL),
(289, 0, '89240854', '15-050660', '15', 'Puringue', 'Jaina Paula', 'Delacruz', 'Female', 'Single', 'Filipino', '1998-02-13', 'Batac City', '09369331643', 'Bil-Loca, Batac City, Ilocos Norte', 'Petronilo A. Puringue Jr.', 'Laborer', 'Aida C. Puringue', 'Laborer', '', '', '', '', '', '', 'Hilario Valdez Mem. Elem. School', 'Nalupta, Batac City, Ilocos Norte', 2011, 'Batac National High School', 'Tabug, Batac City, Ilocos Norte', 2015, '', '', 0),
(290, 0, '2d2bab69', '15-050669', '15', 'Viernes', 'Philip Gary', 'Bedana', 'Male', 'Single', 'Filipino', '1999-05-26', 'Bacarra', '09091092354', 'Brgy. 6, Bacarra, Ilocos Norte', 'Rustico Gary A. Viernes', 'Tricycle Driver', 'Chita B. Viernes', 'Dressmaker', '', '', '', '', '', '', 'Special Education Center', 'Sta. Rita, Bacarra, Ilocos Norte', 2011, 'Bnchs', 'Sta. Rita, Bacarra, Ilocos Norte', 2015, '', '', 0),
(291, 0, '9d49125a', '15-050670', '15', 'Andres', 'Lerissa', 'Gaoiran', 'Female', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(292, 0, '26464a7d', '15-050678', '15', 'Concepcion', 'Joseph Paulo', 'Simbe', 'Male', 'Single', 'Filipino', '1998-04-04', 'Vigan, Ilocos Sur', '09981840036', 'Quezon Cabugao, Ilocos Sur', 'Joseph Pekke Conception', 'Factory Worker', 'Sylvia Paula Conception', 'Rural Bancker', '', '', '', '', '', '', 'Cabugao North Central School', 'Quezon Cabugao, Ilocos Sur', 2011, 'Cabugao Institute', 'Bonifacio Cabugao, Ilocos Sur', 2015, '', '', 0),
(293, 0, 'ab95a455', '15-050687', '15', 'Bawat', 'Reyna Joy', '', 'Female', 'Single', 'Filipino', '1999-05-25', 'Dingras Hospital', '09366331140', 'Talugtog, Solsona, Ilocos Norte', '', '', 'Susan Buiaan Bawat', 'House Wife', '', '', '', '', '', '', 'Solsona Central Elem. School', 'Laureta, Solsona, Ilocos Norte', 2011, 'Solsona National High School-Talugtog Campus', 'Talugtog, Solsosna, Ilocos Norte', 2015, '', '', 0),
(294, 0, '2a2b941b', '15-050689', '15', 'Moreno', 'Carl Francis', 'Medrano', 'Male', 'Single', 'Filipino', '1998-10-16', 'Pagudpud', '09350919416', 'Brgy. Aggasi, Pagudpud, Ilocos Norte', 'Francisco G. Moreno', 'Farmer', 'Catherine M. Moreno', 'Housewife', '', '', '', '', '', '', 'Pagudpud Central Elementary School', 'Pagudpud, Ilocos Norte', 2010, 'Luzong National High School', '', 2014, '', '', 0),
(295, 0, '7b7c216d', '15-050700', '15', 'Mamala', 'Robina', 'Sacatani', 'Female', 'Single', 'Filipino', '1998-10-04', 'Dingras, Ilocos Norte', '09121820685', 'Elizabeth, Dingras, Ilocos Norte', 'Rosendo C. Mamala Sr.', 'Farmer', 'Lorna S. Mamala', 'House Wife', '', '', '', '', '', '', 'Elizabeth Elem. School', 'Elizabeth, Dingras, Ilocos Norte', 2011, 'Dingras National High School', 'Barong, Dingras, Ilocos Norte', 2015, '', '', 0),
(296, 0, 'b6bae60c', '15-050709', '15', 'Basilio', 'Aira', 'Sina', 'Female', 'Single', 'Filipino', '1998-09-19', 'Grasmh Laoag City', '09129734552', 'San Pedro, Vintar, Ilocos Norte', 'Antonio B. Basilio', 'Nurse', 'Jacqueline', 'S. Basilio', 'Dcw', '', '', '', '', '', 'F. Camaquin Elem. School', 'Vintar, Ilocos Norte', 2011, 'Innhs', 'Ablan Ave., Laoag City, Ilocos Norte', 2015, '', '', 0),
(297, 0, 'c890bdd9', '15-050714', '15', 'Robuelto', 'Joefrey', 'A', 'Male', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(298, 0, '218518fc', '15-050715', '15', 'Malata', 'Joshua Nepatali', 'Licudine', 'Male', 'Single', 'Filipino', '1999-01-06', 'Pagudpud', '09157692582', 'Pob.2, Pagudpud, Ilocos Norte', 'Roger G. Malata', 'Tricycle Driver', 'Riza L. Malata', 'Ofw', '', '', '', '', '', '', 'Pagudpud Central Elem. School', 'Pob.2, Pagudpud, Ilocos Norte', 2011, 'Saint Jude High School', 'Pob.2, Pagudpud, Ilocos Norte', 2015, '', '', 0),
(299, 0, '9bfe9c6e', '15-050716', '15', 'Catura', 'Phaula Louisse', 'Domingo', 'Female', 'Single', 'Filipino', '1999-08-30', 'Laoag City', '09359952051', 'Grfy. 5, Vigan City, Ilocos Sur ', 'Pristo T. Catura', 'Self-Employed', 'Janet D. Catura', 'Self-Employed', '', '', '', '', '', '', 'Burgos Mem. School West', 'Brgy. 7, Vigan City, Ilocos Sur', 2011, 'Ilocos Sur National High School', 'Brgy. 7, Vigan City, Ilocos Sur', 2015, '', '', 0),
(300, 0, '3577c906', '15-050720', '15', 'Pacis', 'Edimar', 'Asuncion', 'Male', 'Single', 'Filipino', '1998-09-28', 'Claveria, Cagayan', '09101121576', 'Centro-6, Claveria, Cagayan', 'Edison Pacis', 'Opperator', 'Emma Pacis', 'House Wife', '', '', '', '', '', '', 'Claveria East Central', 'Centro-6, Cagayan', 2011, 'Academy Of St. Joseph', 'Centro-1, Cagayan', 2015, '', '', 0),
(301, 0, 'bce85e77', '15-050739', '15', 'Garrido', 'Wendhel', 'Mariano', 'Male', 'Single', 'Filipino', '1998-04-13', 'Tarlac, Tarlac', '09777191636', 'Tabug, Batac City, Ilocos Norte', 'Ernesto Garrido', 'Laborer', 'Helena Garrido', 'None', '', '', '', '', '', '', 'Pamplona Central School', 'Centro, Pamplona, Cagayan', 2011, 'Pamplona National School Of Fisheries', 'Abbangkeruan, Pamplona, Cagayan', 2015, '', '', 0),
(302, 0, '8b250a96', '15-050741', '15', 'Addu', 'Jay-Son', 'Rodriguez', 'Male', 'Single', 'Filipino', '1998-04-26', 'Caloocan City', '09461657486', 'San Gregorio, Luna, Apayao', 'Joel B. Addu', 'Farming', 'Evangeline R. Addu', 'Housekeeper', '', '', '', '', '', '', 'Bacsay Elem. School', 'Bacsay, Luna, Apayao', 2011, 'Bac-Da National High School', 'Bacsay, Luna, Apayao', 2015, '', '', 0),
(303, 0, 'a81f0b97', '15-050745', '15', 'Libungan', 'Christian', 'Mangosing', 'Male', 'Single', 'Filipino', '1998-09-14', 'Cagayan', '09975377637', 'Centro-2, Sanchez Mira, Cagayan', 'Virgilio B. Libungan', 'Farming', 'Delia M. Libungan', 'Ofw', '', '', '', '', '', '', 'Sanchez Mira West Central Elem. School', 'Centro-2, Sanchez Mira, Cagayan', 2011, 'Sanchez Mira School Of Arts And Trades', 'Santro, Sanchez Mira, Cagayan', 2015, '', '', 0),
(304, 0, '981ca257', '15-050753', '15', 'Mandac', 'Christalyn', 'Basilio', 'Female', 'Single', 'Filipino', '1999-03-31', 'Batac City', '09461642477', 'Anao, Piddig, Ilocso Norte', 'Norman Mandac', '', 'Marina Mandac', '', '', '', '', '', '', '', 'Piddig South Central Elem. School', 'Cabaroan, Piddig, Ilocos Norte', 2011, 'Piddig National Hs', 'Tonoton, Piddig, Ilocos Noret', 2015, '', '', 0),
(305, 0, '1396a5c3', '15-050754', '15', 'Ancheta', 'Jezzane Jamaica', 'Moncillo', 'Female', 'Single', 'Filipino', '1999-06-24', ' Batac City', '09950267904', 'Brgy. 50,Buttong, Laoag City', 'Jesus Ancheta', 'Goldsmith', 'Glorybeth Ancheta', 'Bookkeeper', '', '', '', '', '', '', 'Baay Elementary School', 'Brgy. 13, Baay, Batac City', 2011, 'INNHS', 'Brgy. 17, Ablan Ave, Laoag City', 2014, '', '', 0),
(306, 0, 'e3b62689', '15-050757', '15', 'Curammeng', 'Mark Kenneth', 'Tinay', 'Male', 'Single', 'Filipino', '1998-08-05', 'Pagugpud', '09058847434', 'Saud, Pagudpud, Ilocos Norte', 'Ronel V. Curammeng', 'Baker', 'Madelyn T. Curameng', 'House Wife', '', '', '', '', '', '', 'Saud Elem. School', 'Saud, Pagudpud, Ilocos Norte', 2011, 'Pagudpud National High School', 'Pob. 2, Pagudpud, Ilocos Norte', 2015, '', '', 0),
(307, 0, '65da1694', '15-050759', '15', 'Pumaras', 'Jessie Julito Jr', 'Ribao', 'Male', 'Single', 'Filipino', '1999-02-18', 'Laoag City', '09108184189', 'Bonoan San Nicolas, Ilocos Norte', 'Jessie Pumaras Sr.', 'Civil Engineer', 'Anabelle Pumaras', 'Teacher', '', '', '', '', '', '', 'San Nicolas Elem. School', 'Brgy. 3 San Nicolas, Ilocs Norte', 2011, 'Sta. Rosa Academe', 'Brgy. 3 San Nicolas, Ilocs Norte', 2015, '', '', 0),
(308, 0, '9e54f48c', '15-050760', '15', 'Tongson', 'Jayson ', 'Bartolome', 'Male', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(309, 0, 'eb01e1c3', '15-050769', '15', 'Peros', 'Janine', 'Ilacas', 'Female', 'Single', 'Filipino', '1999-07-20', 'Laoag City', '09464762126', 'San Lorenzo, San Nicolas, Ilocos Norte', 'Wilson Peros', 'Service Man', 'Naida Peros', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Buttong Elem. School', 'Buttong, Laoag City, Ilocos Norte', 2011, 'Bingao National High School', 'San Pedro, San Nicolas, Ilocos Norte', 2015, NULL, NULL, NULL),
(310, 0, 'b222531d', '15-050780', '15', 'Estavillo', 'Minette', 'Lived', 'Female', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(311, 0, 'a94d7a11', '15-050796', '15', 'Ludia', 'Darius', 'Castillo', 'Male', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(312, 0, '7339bba0', '15-050811', '15', 'Quiboyen', 'Kenneth Ryan', 'Labugrn', 'Male', 'Single', 'Filipino', '1999-04-14', 'Claveria, Cagayan', '09054372844', 'Alinuan, Claveria, Cagayan', 'Cornelio Quiboyen', 'Farmer', 'Carmencita Quiboyen', 'House Wife', NULL, NULL, NULL, NULL, NULL, NULL, 'Alimoan Elem. School', 'Alimoan, Claveria, Cagayan', 2011, 'Claveria Rural And Vocational School', 'Dibalio, Claveria, Cagayan', 2015, NULL, NULL, NULL),
(313, 0, '4c6d6b21', '15-050813', '15', 'Gamayon', 'Marisol', 'Simeon', 'Female', 'Single', 'Filipino', '1998-06-27', 'Marcos', '09469191531', 'Elizabeth, Marcos, Ilocos Norte', 'Serapio Gamayon', 'Janitor', 'Magdalena Gamayon', 'House Wife', '', '', '', '', '', '', 'Elizabeth Elem. School', 'Elizabeth, Marcos, Ilocos Norte', 2011, 'Mnhs-Santiago Campus', 'Santiago, Marcos, Ilocos Norte', 2015, '', '', 0),
(314, 0, '8574f96a', '15-050826', '15', 'Galope', 'Wilmar', 'Agustine', 'Male', 'Single', 'Filipino', '1998-10-29', 'Tondo, Manila', '09486360418', 'Navotas, Laoag City, Ilocos Norte', 'Mario D. Galope', 'Farmer', 'Wilma A. Galope', 'Housewife', '', '', '', '', '', '', 'Dagat-Dagatan Elem. School', 'Navotas City', 2011, 'Incat', 'Brgy.4, Laoag City, Ilocos Norte', 2015, '', '', 0),
(315, 0, '83514673', '15-050829', '15', 'Castro', 'Dahney', 'Yadao', 'Female', 'Single', 'Filipino', '1999-04-06', 'Sinait, Ilocos Sur', '09487272032', 'Cuancabal, Cabugao, Ilocos Sur', 'Filemon Edmund S. Castro', 'Farming', 'Genalyn Y. Castro', 'Housekeeper', '', '', '', '', '', '', 'Lipiit-Cuancabal Elem. School', 'Cuancabal, Cabugao, Ilocos Sur', 2011, 'Sinaiit National High School', 'Ricudo, Sinait, Ilocos Sur', 2015, '', '', 0),
(316, 0, '73f7bd5b', '15-050830', '15', 'Yadao', 'Labelene', 'Tangonan', 'Female', 'Single', 'Filipino', '1999-02-02', 'Sinait, Ilocos Sur', '09487273436', 'Dadalaquiten Norte, Sinait, Ilocos Sur', 'Larry R. Yadao', 'Construction Worker', 'Brendalyn T. Yadao', 'Dressmaker', '', '', '', '', '', '', 'Dadalaquiten Elem. School', 'Dadaliquiten Sur, Sinait, Ilocos Sur', 2011, 'Sinait National High School', 'Ricudo, Sinait, Ilocos Sur', 2015, '', '', 0),
(317, 0, '8d062faf', '15-050835', '15', 'Sapaden', 'Spencer Alden', 'Molina', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(318, 0, '93e7890a', '15-050836', '15', 'Abanilla', 'Brix Laurence', 'Ricardos', 'Male', 'Single', 'Filipino', '1998-10-11', 'San Juan, Ilocos Sur', '09296141989', 'Bannuar, San Juan, Ilocos Sur', 'Leonardo S. Abanilla', 'Baker', 'Bambi R. Abanilla', 'Housekeeper', '', '', '', '', '', '', 'San Juan South Central School', 'San Juan, Ilocod Sur', 2011, 'San Juan National High School', 'San Juan, Ilocos Sur', 2015, '', '', 0),
(319, 0, 'dc40b47e', '15-050843', '15', 'Coloma', 'Ian Wensner', 'Ganotisi', 'Male', 'Single', 'Filipino', '1998-10-02', 'Sarrat', '', 'Brgy. 17, San Nicolas, Ilocos Norte', 'Joseph G. Coloma', '', 'Evelyn G. Coloma', '', '', '', '', '', '', '', 'Sta Asuncion Elem. School', 'Brgy. 17, San Nicolas, Ilocos Norte', 0, 'Bingao National Hs', 'Brgy. 18, San Nicolas, Ilocos Norte', 0, '', '', 0),
(320, 0, '24947f9b', '15-052017', '15', 'Baldovi', 'Jennylyn', 'Pablo', 'Female', 'Single', 'Filipino', '1998-01-16', 'Tarlac', '09973770619', 'Pasuc, Badoc, Ilocos Norte', 'Noel T. Baldovi', 'Factory Worker', 'Wennie P. Baldovi', 'Factory Worker', NULL, NULL, NULL, NULL, NULL, NULL, 'Malinta Elem. School', NULL, 2010, 'St. Louis College Valenzuela', NULL, 2014, NULL, NULL, NULL),
(321, 0, 'a00ae130', '15-052019', '15', 'Ramiro', 'Shainalyn Cherish', 'Caliw-Caliw', 'Female', 'Single', 'Filipino', '1998-09-01', 'Bangui, Ilocos Norte', '09306726831', 'Pob. 2, Pagudpud, Ilocos Norte', 'Dante D. Ramiro', 'Welder', 'Cherry C. Ramiro', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Pagudpud Central Elem. School', 'Pob. 2, Pagudpud, Ilocos Norte', 2011, 'Saint Jude High School', 'Pob. 2, Pagudpud, Ilocos Norte', 2015, 'DATA CENTER', 'Laoag City', 2015),
(322, 0, '98ded52b', '15-080114', '15', 'Valera', 'Armin jannielle', 'Garcia', 'Male', 'Single', NULL, '2017-04-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(323, 0, '90670d27', '16-052001', '16', 'Basig', 'Roldan', 'T', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(324, 0, '1c145dea', '16-052002', '16', 'Basig', 'Mark Bien', 'T', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(325, 0, '8335eb86', '16-052003', '16', 'Bala', 'Arnol John', 'P', 'Male', 'Single', 'Filipino', '1992-04-03', 'Banna, Ilocos Norte', '09212198237', 'Tanquigan, Nagpalayan, Banna, Ilocos Norte', 'Arnol R. Bala', 'Farmer', 'Aniceta P. Bala', 'Housewife', '', '', '', '', '', '', 'Nagpalayan Elem. School', 'Brgy. Nagpalayan, Banna, Ilocos Norte', 2004, 'Catagtaguen National High School', 'Brgy. Catagtaguen', 2008, 'STI College Makati', 'Makati', 2011),
(326, 0, '9e956688', '16-052004', '16', 'Abalos', 'Zyvern', 'Y', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(327, 0, 'fed613f6', '16-052005', '16', 'Agravante', 'Prince Zander', 'A', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(328, 0, 'c5640bb3', '16-052006', '16', 'Velasco', 'Kayle Mar', 'Solar', 'Male', 'Single', 'Filipino', '1998-10-02', 'Sinait, Ilocos Sur', '09155934850', 'Brgy. Madupayas, Badoc, Ilocos Norte', 'Rollet velasco', 'Farmer', 'Asuncion Velasco', 'Housewife', NULL, NULL, NULL, NULL, NULL, NULL, 'Madupayas Elementary School', 'Badoc, Ilocos Norte', 2010, 'Sinait National High School', 'Sinait, Ilocos Sur', 2014, NULL, NULL, NULL),
(329, 0, 'a3be34c9', '16-052007', '16', 'Luis', 'April Mon', 'Oamil', 'Male', 'Single', 'Filipino', '1999-04-09', 'Bacarra, Ilocos Norte', '09091316612', 'Brgy 40 Buyon, Bacarra,Ilocos Norte', 'Edmundo Luis', 'Farmer', 'Aizel luis', 'Housekeeper', NULL, NULL, NULL, NULL, NULL, NULL, 'Buyon elementary School', 'Buyon, Bacarra, ilocos Norte', 2011, 'Bacarra National Comprehensive High School', 'Sta. Rita, Bacarra, Ilocos Norte', 2015, NULL, NULL, NULL),
(330, 0, 'f95986a8', '16-052008', '16', 'Bautista', 'Fhebee Lovelaine', 'Doctor', 'Female', 'Single', 'Filipino', '1999-02-18', 'Isabela', '09061774847', 'Brgy. Nagrebcan, Badoc, Ilocos Norte', 'Ladislao Bautista Jr.', 'Farmer', ' Anita Bautista', 'Farmer', '', '', '', '', '', '', ' Tambac Elementary School', 'Tambac, Dagupan City', 2012, 'Nagrebcan National High School', 'Nagrebcan, Badoc, Ilocos Norte', 2015, '', '', 0),
(331, 0, '57127b75', '16-052009', '16', 'Orteza', 'Katherine Kaith', 'Tapiru', 'Female', 'Single', 'Filipino', '1998-09-18', 'Cagayan', '09058996451', 'Bagu, Pamplona, Cagayan', 'Benedick L. Orteza', 'Farmer', 'Rhia D. Tapiru', 'Dh', '', '', '', '', '', '', 'Tupanna Elem. School', 'Pamplona, Cagayan', 2011, 'Pamplona National School Of Fisheries', 'Pamplona, Cagayan', 201, 'University Of Cagayan Valley', 'Tuguegarao City', 2016),
(332, 0, 'c76a13bd', '16-052010', '16', 'Llaguno', 'Conrad Jerico', 'M', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(333, 0, '5e7180eb', '16-052012', '16', 'Tajas', 'James Jhon', 'A', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(334, 0, '3061b2d8', '16-052013', '16', 'Gorospe', 'Venice', 'A', 'Female', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(335, 0, 'a9044d31', '16-052014', '16', 'Valete', 'Kyle David', 'F', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(336, 0, '3f2e48c5', '16-052015', '16', 'Butay', 'Joshua Lawrenz', 'R', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(337, 0, 'a504a3e7', '16-052016', '16', 'Baldonado', 'Gian Jones', 'Y', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(338, 0, 'e57ef2fd', '16-052017', '16', 'Mapugay', 'Michael Angelo', 'C', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(339, 0, '77070fed', '16-052018', '16', 'Layugan', 'Jay-Jay', 'Arizabal', 'Male', 'Single', 'Filipino', '1994-07-12', 'Badoc, Ilocos Norte', '09752181164', 'Brgy. Paltit, Badoc, Ilocos Norte', 'Geofrey Layugan,', 'Farmer', 'Jane Layugan', 'Housekeeper', '', '', '', '', '', '', 'Paltit Elementary School', ' Paltit, Badoc, Ilocos Norte', 0, 'Badoc Junior College Inc.', 'Canaan, Badoc, Ilocos Norte', 0, '', '', 0),
(340, 0, '646a9e3f', '16-052019', '16', 'Domingo Jr.', 'Stephen', 'Estreller', 'Male', 'Single', 'Filipino', '1996-06-11', 'Sta.Rosa, Laguna', '09499252178', '#9,Hacienda Lubnac, Vintar, Ilocos Norte', 'Stephen C. Domingo Sr', 'Butcher', 'Indaliza E. Domingo', 'Housewife', '', '', '', '', '', '', 'Lubnac Elem. School', 'Brgy. #9, Lubnac,Vintar,Ilocos Norte', 2009, 'Saint Nicholas Academy', 'Brgy. #2, San Nicholas', 2013, '', '', NULL),
(341, 0, 'c3bfc447', '16-052021', '16', 'Adolfo', 'Leo Aries', 'Ganitano', 'Male', 'Single', 'Filipino', '1989-11-16', 'Cabuyao, Laguna', '09973943841', 'Sacro,Brgy.Caunayan, Batac,Ilocos Norte', 'Norme Adolfo', 'Chef', 'Angelita Ganitano', 'Deceased', '', '', '', '', '', '', ' MMMES', 'Beu-agan', 0, 'Batac Junior College', 'Ricarte, Batac, Ilocos Norte', 0, '', '', NULL),
(342, 0, 'fc843aab', '16-052022', '16', 'Abadilla', 'Reymark', 'O', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(343, 0, '95438d29', '16-052023', '16', 'Canlas', 'Cyn James', 'L', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(344, 0, 'f562e0db', '16-052024', '16', 'Abad', 'Ardean Kate', 'R', 'Female', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(345, 0, 'd8bb7d25', '16-052025', '16', 'Alada', 'Romelyn', 'Agamanos', 'Female', 'Single', 'Filipino', '1997-08-01', 'Aparri, Cagayan', '09108067181', 'Brgy. Lubnac, Vintar, Ilocos Norte', 'Romeo Alada', 'Deceased', 'Lemelyn Alada', 'Housekeeper', '', '', '', '', '', '', 'Dodan Elementary School', 'Dodan Aparri, Cagayan', 2010, 'Aparri East National', 'Mara, Aparri, Cagayan', 2014, '', '', 0),
(346, 0, 'a4c312e1', '16-052026', '16', 'Clemente', 'Emmanuel Christian', 'U', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(347, 0, '6361ed42', '16-052027', '16', 'Fernandez', 'Chayanne Jules', 'Karagatan', 'Male', 'Single', 'Filipino', '1998-12-16', 'Laoag City', '09163325570', 'Brgy. 55-B, Bulangon, Laoag City', 'Michael P. Fernandez', 'Max Intl.', 'Regina K. Fernandez', 'Max Intl.', '', '', '', '', '', '', 'Laoag Central Elem. School', 'Brgy. 16, Laoag City', 2011, 'Ilocos Norte College of Arts And Trades', 'Brgy. 7-B, Laoag City', 2015, '', '', NULL),
(348, 0, '23e1494b', '16-052029', '16', 'Sagayadoro', 'Maria Isabel', 'A', 'Female', 'Single', 'Filipino', '1997-02-28', 'Bacarra, Ilocos Norte', '09096596074', 'Brgy. 31 Bacarra, Ilocos Norte', 'Elmer Sagayadoro', 'Farmer', 'Letty Sagayadoro', 'Housekeeper', '', '', '', '', '', '', 'Cadaratan Elem. School', 'Brgy. 30, Bacarra, Ilocos Norte', 2009, ' Cadarata national High School', 'Brgy. 30, Bacarra, Ilocos Norte', 2013, '', '', 0),
(349, 0, '85178cc8', '16-052030', '16', 'Bangi', 'Allan Jay', 'B', 'Male', 'Single', 'Filipino', '1997-03-17', 'Marcos, Ilocos Norte', '', 'Cacafean, Marcos, Ilocos Norte', 'Quirino Bangi', 'Farmer', 'Marilou Bangi', 'Housewife', '', '', '', '', '', '', 'Cacafean Elementary School', 'Brgy. Cacafean, Marcos, Ilocos Norte', 2010, 'Marcos National High School-Santiago Campus', 'Brgy. Santiago, Marcos, Ilocos Norte', 2013, '', '', 0),
(350, 0, '2fbb17e6', '16-052031', '16', 'Bangi', 'Jenny Beth', 'B', 'Female', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(351, 0, '18586a55', '16-052036', '16', 'Guittap', 'Ferdinand Jr.', 'C', 'Male', 'Single', NULL, '2017-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(352, 0, 'f45cae15', '16-052037', '16', 'Clavillas', 'Rhey Jhun', 'Tuscano', 'Male', 'Single', 'Filipino', '1994-02-27', 'Buhi, Camarines Sur', NULL, 'Brgy. Namnama, Sinait, Ilocos Sur', 'Delfin Clavillas', 'Carpenter', 'Conception Clavillas', 'OFW', NULL, NULL, NULL, NULL, NULL, NULL, 'Sinait East Central School', 'Rang-ay, Sinait, Ilocos Sur', 2007, 'Sinait Nationnal High School', 'Ricudo, Sinait, Ilocos Sur', 2011, 'System Technology Institute', 'Vigan, Ilocos Sur', 2015),
(353, 0, '', '00-0000', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;--
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
-- Table structure for table `13-5119`
--

CREATE TABLE `13-5119` (
  `courseid` int(11) NOT NULL,
  `1st` varchar(5) NOT NULL,
  `2nd` varchar(5) NOT NULL,
  `3rd` varchar(5) NOT NULL,
  `code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='default blank table';

--
-- Dumping data for table `13-5119`
--

INSERT INTO `13-5119` (`courseid`, `1st`, `2nd`, `3rd`, `code`) VALUES
(1, '1.0', '', '', 'CHEM 10'),
(2, '1.0', '', '', 'ENGL 1'),
(3, '1.0', '', '', 'FIL 1'),
(4, '1.0', '', '', 'MATH  12'),
(5, '1.0', '', '', 'MATH 15'),
(6, '1.0', '', '', 'NSTP 1'),
(7, 'INC', '1.0', '', 'PE 1'),
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
-- Table structure for table `13-5393`
--

CREATE TABLE `13-5393` (
  `courseid` int(11) NOT NULL,
  `1st` varchar(5) NOT NULL,
  `2nd` varchar(5) NOT NULL,
  `3rd` varchar(5) NOT NULL,
  `code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='default blank table';

--
-- Dumping data for table `13-5393`
--

INSERT INTO `13-5393` (`courseid`, `1st`, `2nd`, `3rd`, `code`) VALUES
(1, '1.75', '', '', 'CHEM 10'),
(2, '2.0', '', '', 'ENGL 1'),
(3, '2.0', '', '', 'FIL 1'),
(4, '1.0', '', '', 'MATH  12'),
(5, '1.0', '', '', 'MATH 15'),
(6, '1.0', '', '', 'NSTP 1'),
(7, '1.0', '', '', 'PE 1'),
(8, '1.0', '', '', 'CPE 100'),
(9, '1.5', '', '', 'DRAW 11'),
(10, '1.25', '', '', 'ENGL 2'),
(11, '', '', '', 'FIL 2'),
(12, '', '', '', 'MATH 13'),
(13, '', '', '', 'MATH 18'),
(14, '', '', '', 'MATH 27'),
(15, '', '', '', 'NSTP 2'),
(16, '', '', '', 'PE 2'),
(17, '2.0', '', '', 'COMP 11'),
(18, '1.75', '', '', 'CPE 130'),
(19, '', '', '', 'ECON 1'),
(20, '2.5', '', '', 'ENGL 5'),
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
(34, '1.0', '', '', 'EE 101'),
(35, '', '', '', 'IE 101'),
(36, '1.0', '', '', 'MATH 40'),
(37, '', '', '', 'MECH 101'),
(38, '', '', '', 'CPE 101'),
(39, '', '', '', 'CPE 121'),
(40, '', '', '', 'CPE 132E'),
(41, '', '', '', 'ECE 134'),
(42, '2.0', '', '', 'EE 103'),
(43, '', '', '', 'MECH 102'),
(44, '', '', '', 'MECH 103'),
(45, '', '', '', 'CPE 103'),
(46, '2.25', '', '', 'CPE 103'),
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
(60, '1.25', '', '', 'CPE 113'),
(61, '', '', '', 'CPE 151'),
(62, '', '', '', 'CPE 190'),
(63, '', '', '', 'ELECT 2'),
(64, '', '', '', 'HUM 1'),
(65, '', '', '', 'LIT 1'),
(66, '', '', '', 'CPE 145'),
(67, '', '', '', 'CPE 192'),
(68, '1.25', '', '', 'CPE 197'),
(69, '', '', '', 'CPE 199'),
(70, '', '', '', 'ELECT 3'),
(71, '', '', '', 'ENTREP 1'),
(72, '', '', '', 'PI 1'),
(73, '', '', '', 'POL SCI 1');

-- --------------------------------------------------------

--
-- Table structure for table `17-1234`
--

CREATE TABLE `17-1234` (
  `courseid` int(11) NOT NULL,
  `1st` varchar(5) NOT NULL,
  `2nd` varchar(5) NOT NULL,
  `3rd` varchar(5) NOT NULL,
  `code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='default blank table';

--
-- Dumping data for table `17-1234`
--

INSERT INTO `17-1234` (`courseid`, `1st`, `2nd`, `3rd`, `code`) VALUES
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
-- Table structure for table `17-1243`
--

CREATE TABLE `17-1243` (
  `courseid` int(11) NOT NULL,
  `1st` varchar(5) NOT NULL,
  `2nd` varchar(5) NOT NULL,
  `3rd` varchar(5) NOT NULL,
  `code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='default blank table';

--
-- Dumping data for table `17-1243`
--

INSERT INTO `17-1243` (`courseid`, `1st`, `2nd`, `3rd`, `code`) VALUES
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
-- Indexes for table `13-5119`
--
ALTER TABLE `13-5119`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `13-5393`
--
ALTER TABLE `13-5393`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `17-1234`
--
ALTER TABLE `17-1234`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `17-1243`
--
ALTER TABLE `17-1243`
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
-- AUTO_INCREMENT for table `13-5119`
--
ALTER TABLE `13-5119`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `13-5393`
--
ALTER TABLE `13-5393`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `17-1234`
--
ALTER TABLE `17-1234`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `17-1243`
--
ALTER TABLE `17-1243`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
