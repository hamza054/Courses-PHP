-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2018 at 04:15 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator_table`
--

CREATE TABLE `administrator_table` (
  `admin_id` int(25) NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_password` varchar(40) COLLATE utf8_bin NOT NULL,
  `admin_role` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_phone` int(11) NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_image` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `administrator_table`
--

INSERT INTO `administrator_table` (`admin_id`, `admin_name`, `admin_password`, `admin_role`, `admin_phone`, `admin_email`, `admin_image`) VALUES
(3, 'yakov', '310dcbbf4cce62f762a2aaa148d556bd', 'sales', 123456, 'yakov@gmail.com', 'style/image/'),
(5, 'sales', '15de21c670ae7c3f6f3f1f37029303c9', 'sales', 1234567, 'sales@gmail.com', 'style/image/'),
(30, 'system_owner', '698d51a19d8a121ce581499d7b701668', 'owner', 0, 'owner@gmail.com', 'style/image/image1.png'),
(33, 'hamza', 'bcbe3365e6ac95ea2c0343a2395834dd', 'manger', 0, 'hamza@gmail.com', 'style/image/image1.png'),
(35, 'b', 'bcbe3365e6ac95ea2c0343a2395834dd', 'manger', 0, 'bbb@walla.com', 'style/image/');

-- --------------------------------------------------------

--
-- Table structure for table `course_table`
--

CREATE TABLE `course_table` (
  `course_id` int(25) NOT NULL,
  `course_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `course_desc` varchar(255) COLLATE utf8_bin NOT NULL,
  `course_image` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `course_table`
--

INSERT INTO `course_table` (`course_id`, `course_name`, `course_desc`, `course_image`) VALUES
(1, 'HTML course', 'php course', 'style/image/2000px-HTML5_logo_and_wordmark.svg.png'),
(4, 'Css Course', 'its course 4', 'style/image/CSS.3.svg.png'),
(86, 'php course', '...........', 'style/image/php-logo-ADE513E748-seeklogo.com.png'),
(89, 'javascript', '.................', 'style/image/download.png'),
(90, 'Angular 4 ', 'a', 'style/image/angular-logo-B76B1CDE98-seeklogo.com.png');

-- --------------------------------------------------------

--
-- Table structure for table `student_in_course`
--

CREATE TABLE `student_in_course` (
  `course_id` int(25) NOT NULL,
  `student_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `student_in_course`
--

INSERT INTO `student_in_course` (`course_id`, `student_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 6),
(1, 34),
(4, 0),
(4, 3),
(4, 5),
(86, 0),
(86, 1),
(86, 3),
(86, 28),
(86, 37),
(89, 1),
(89, 3),
(89, 37),
(90, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `student_phone` int(11) NOT NULL,
  `student_email` varchar(2555) COLLATE utf8_bin NOT NULL,
  `student_image` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`student_id`, `student_name`, `student_phone`, `student_email`, `student_image`) VALUES
(1, 'student a', 12345678, 'aaa@gmail.com', 'style/image/image1.png'),
(2, 'student b', 12345678, 'bbb@gmail.com', 'style/image/image1.png'),
(3, 'student c ', 12345678, 'ccc@gmail.com', 'style/image/image4.png'),
(4, 'student d', 12345678, 'ddd@gmail.com', 'style/image/image4.png'),
(5, 'student e', 12345678, 'eee@gmail.com', 'style/image/image1.png'),
(37, 'student f', 26768880, 'fff@walla.com', 'style/image/image4.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator_table`
--
ALTER TABLE `administrator_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course_table`
--
ALTER TABLE `course_table`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `student_in_course`
--
ALTER TABLE `student_in_course`
  ADD PRIMARY KEY (`course_id`,`student_id`),
  ADD KEY `only_one_studnt` (`student_id`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator_table`
--
ALTER TABLE `administrator_table`
  MODIFY `admin_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `course_table`
--
ALTER TABLE `course_table`
  MODIFY `course_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
