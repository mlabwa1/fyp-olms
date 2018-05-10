-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2015 at 09:30 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lms`
--
CREATE DATABASE IF NOT EXISTS `lms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lms`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `admin_image` varchar(100) NOT NULL,
  `admin_type` varchar(100) NOT NULL,
  `admin_added` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `lastname`, `username`, `password`, `confirm_password`, `admin_image`, `admin_type`, `admin_added`) VALUES
(1, 'Jane', 'Doe', 'admin', 'admin', 'admin', 'picture2.jpg', 'Admin', '2015-09-05 11:40:50'),
(2, 'John', 'Doe', 'Encoder', 'encoder', 'encoder', 'artwork-pr.jpg', 'Encoder', '2015-09-29 11:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE IF NOT EXISTS `barcode` (
  `barcode_id` int(11) NOT NULL AUTO_INCREMENT,
  `pre_barcode` varchar(100) NOT NULL,
  `mid_barcode` int(100) NOT NULL,
  `suf_barcode` varchar(100) NOT NULL,
  PRIMARY KEY (`barcode_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`barcode_id`, `pre_barcode`, `mid_barcode`, `suf_barcode`) VALUES
(1, 'VNHS', 294913, 'LMS'),
(2, 'VNHS', 589826, 'LMS'),
(3, 'VNHS', 884739, 'LMS'),
(4, 'VNHS', 1179652, 'LMS'),
(5, 'VNHS', 1474565, 'LMS'),
(6, 'VNHS', 1769478, 'LMS');

-- --------------------------------------------------------

--
-- Table structure for table `barcode_image`
--

CREATE TABLE IF NOT EXISTS `barcode_image` (
  `barcode_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_barcode` varchar(100) NOT NULL,
  PRIMARY KEY (`barcode_image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `barcode_image`
--

INSERT INTO `barcode_image` (`barcode_image_id`, `image_barcode`) VALUES
(1, 'user1.png'),
(2, ''),
(3, '');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(100) NOT NULL,
  `category_id` int(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `book_copies` int(11) NOT NULL,
  `book_pub` varchar(100) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `copyright_year` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `book_barcode` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `category_id`, `author`, `book_copies`, `book_pub`, `publisher_name`, `isbn`, `copyright_year`, `status`, `book_barcode`, `date_added`) VALUES
(1, 'a', 1, 'a', 5, 'a', 'a', '8', 8, 'Replacement', 'VNHS294913LMS', '2015-09-23 19:32:07'),
(2, 'b', 2, 'b', 44, 'b', 'b', '9', 9, 'Old', 'VNHS589826LMS', '2015-09-23 19:32:51'),
(3, 'c', 7, 'c', 59, 'c', 'c', '5', 5, 'Damage', 'VNHS884739LMS', '2015-09-23 19:34:16'),
(4, 'd', 6, 'd', 28, 'd', 'd', '6', 6, 'Damage', 'VNHS1179652LMS', '2015-09-23 23:22:31'),
(5, 'e', 8, 'e', 78, 'e', 'e', '65', 65, 'Lost', 'VNHS1474565LMS', '2015-09-28 13:44:37'),
(6, 'f', 1, 'f', 86, 'f', 'f', '8', 8, 'Old', 'VNHS1769478LMS', '2015-09-28 17:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_book`
--

CREATE TABLE IF NOT EXISTS `borrow_book` (
  `borrow_book_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `date_returned` datetime NOT NULL,
  `borrowed_status` varchar(100) NOT NULL,
  `book_penalty` varchar(100) NOT NULL,
  PRIMARY KEY (`borrow_book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `borrow_book`
--

INSERT INTO `borrow_book` (`borrow_book_id`, `user_id`, `book_id`, `date_borrowed`, `due_date`, `date_returned`, `borrowed_status`, `book_penalty`) VALUES
(1, 1, 6, '2015-09-30 05:08:19', '2015-10-03 05:08:19', '2015-09-30 05:08:22', 'returned', 'No Penalty'),
(2, 1, 6, '2015-09-01 05:08:52', '2015-09-04 05:08:52', '2015-09-30 05:13:58', 'returned', '26'),
(3, 1, 2, '2015-09-30 05:09:08', '2015-10-03 05:09:08', '0000-00-00 00:00:00', 'borrowed', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_id` (`category_id`),
  KEY `classid` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=801 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `classname`) VALUES
(1, 'Periodical'),
(2, 'English'),
(3, 'Math'),
(4, 'Science'),
(5, 'Encyclopedia'),
(6, 'Filipiniana'),
(7, 'Newspaper'),
(8, 'General'),
(9, 'References');

-- --------------------------------------------------------

--
-- Table structure for table `return_book`
--

CREATE TABLE IF NOT EXISTS `return_book` (
  `return_book_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `date_returned` datetime NOT NULL,
  `book_penalty` varchar(100) NOT NULL,
  PRIMARY KEY (`return_book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `return_book`
--

INSERT INTO `return_book` (`return_book_id`, `user_id`, `book_id`, `date_borrowed`, `due_date`, `date_returned`, `book_penalty`) VALUES
(1, 1, 6, '2015-09-30 05:08:19', '2015-10-03 05:08:19', '2015-09-30 05:08:20', 'No Penalty'),
(2, 1, 6, '2015-09-01 05:08:52', '2015-09-04 05:08:52', '2015-09-30 05:13:52', '26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_number` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user_added` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `school_number`, `firstname`, `lastname`, `contact`, `gender`, `address`, `type`, `level`, `user_image`, `status`, `user_added`) VALUES
(1, '21200547', 'Rolyn Jasper', 'Demerin', '09213882780', 'Male', 'Valladolid', 'Student', 'Senior High', 'rolyn.jpg', 'Active', '2015-09-05 17:31:09'),
(2, '21200545', 'Mark Anthony', 'Monaya', '09989781348', 'Male', 'Silay City', 'Student', 'Senior High', 'img.jpg', 'Active', '2015-09-05 17:31:09'),
(3, '21200546', 'Ruby Mae', 'Morante', '09989781348', 'Female', 'Silay City', 'Teacher', 'Faculty', 'picture.jpg', 'Active', '2015-09-05 17:31:09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
