-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 03:23 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `telemonitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
`id` int(11) NOT NULL,
  `doctor_id` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `doctor_id`, `name`, `gender`, `phone_no`, `email`, `address`, `specialization`, `password`, `added_date`) VALUES
(1, 'DOC-247213', 'Fasasi Faiz', 'Male', '08064902317', 'faizfasasi@gmail.com', 'Araromi Area, Igboho', 'Ortho Specialist', '111', '2017-11-25 14:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
`notification_id` int(11) NOT NULL,
  `patient_id` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `video_name` varchar(250) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `patient_id`, `subject`, `description`, `video_name`, `status`, `created_date`) VALUES
(1, 'PAT-296202', 'Headache', 'I have malaria', '43252-visualization-in-r-part-1.mp4', 'No-reply', '2017-11-27 10:16:23'),
(2, 'PAT-296202', 'mmm', 'hhhhh', '62552-mother-s-love-2.mp4', 'Replied', '2017-11-30 14:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `noti_response`
--

CREATE TABLE IF NOT EXISTS `noti_response` (
`response_id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `doctor_id` varchar(100) NOT NULL,
  `response` varchar(1000) DEFAULT NULL,
  `video_name` varchar(250) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noti_response`
--

INSERT INTO `noti_response` (`response_id`, `notification_id`, `doctor_id`, `response`, `video_name`, `added_date`) VALUES
(1, 1, 'DOC-247213', 'good', '42914-how-to-install-angular-4.mp4', '2017-11-27 22:05:05'),
(2, 1, 'DOC-247213', 'gg', '38965-how-to-install-angular-4.mp4', '2017-11-27 22:12:07'),
(3, 1, 'DOC-247213', 'rrrtreewww', '58691-how-to-install-angular-4.mp4', '2017-11-27 22:17:09'),
(4, 2, 'DOC-247213', 'eat very well', '6456-setting-up-a-mean4--app--mongodb--express.js--nodejs--angular-.mp4', '2017-12-05 14:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
`id` int(11) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `temperature` varchar(50) DEFAULT NULL,
  `pulse` varchar(50) DEFAULT NULL,
  `blood_group` varchar(50) DEFAULT NULL,
  `blood_pressure` varchar(50) DEFAULT NULL,
  `height` varchar(50) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `doctor_id` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patient_id`, `name`, `gender`, `phone_no`, `email`, `address`, `password`, `temperature`, `pulse`, `blood_group`, `blood_pressure`, `height`, `weight`, `dob`, `doctor_id`, `created_date`) VALUES
(1, 'PAT-296202', 'Adelabu Adedoyin Ibironke', 'Female', 'hgyyyty', 'tytytyt', 'Ibadan', '1111', '55C', '50 20', 'O+', '888mmHg', '175m', '69m', '10/29/2017 4:10 PM', 'DOC-247213', '2017-11-26 00:19:41'),
(2, 'PAT-186191', 'gygy', 'Male', 'jhuuyy9878888', 'hjhhhhhhh', 'ghgfyftyrfrtfftyftyfty', 'F2LxhlrD', 'y67', '50 20', 'O+', '888mmHg', 'hghjgvhjv', '69m', '12/10/2017 4:11 PM', 'DOC-247213', '2017-11-26 13:17:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
 ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `noti_response`
--
ALTER TABLE `noti_response`
 ADD PRIMARY KEY (`response_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `noti_response`
--
ALTER TABLE `noti_response`
MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
