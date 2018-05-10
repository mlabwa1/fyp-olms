-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2017 at 09:23 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olms`
--
CREATE DATABASE IF NOT EXISTS `olms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `olms`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `admin_image` varchar(100) NOT NULL,
  `admin_type` varchar(100) NOT NULL,
  `admin_added` datetime NOT NULL,
  `secQ` varchar(100) DEFAULT NULL,
  `secA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `confirm_password`, `email`, `admin_image`, `admin_type`, `admin_added`, `secQ`, `secA`) VALUES
(1, 'Daniel', 'A.', 'Mlabwa', 'admin', '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', '', '', 'Admin', '2017-01-30 11:40:50', '2', 'Blue'),
(2, 'Ditram', 'C.', 'Lipingu', 'lipingu', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'ditram@outlook.com', '', 'Admin', '2017-01-31 11:40:50', '2', 'blue'),
(7, 'Frank', '', 'Lessen', 'frank', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'frankgilbert911@gmail.com', 'PhotoGrid_1434797765556.jpg', 'Admin', '2017-02-09 09:31:10', NULL, NULL),
(8, 'Nancy', '', 'Victor', 'navish', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'navish45@gmail.com', '', 'Admin', '2017-05-11 12:18:03', NULL, NULL),
(9, 'Daniel', '', 'Andy', 'mlabwa1', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'mlabwa@hotmail.com', '', 'Admin', '2017-05-31 13:42:18', NULL, NULL),
(10, 'Daniel', '', 'Anderson', 'mlabwa', '2a5f5a381c25d90209cba2e3950a40dff00b977025c690ac4931c49143acad7a', '2a5f5a381c25d90209cba2e3950a40dff00b977025c690ac4931c49143acad7a', '', '', 'Admin', '2017-06-01 11:03:38', NULL, NULL),
(13, 'Ditmar', '', 'Lipingu', 'Ditmar', '9c60ed79f8f7f126f2ec73de556264c91ddf45fb7b687ecf7a7ac27a56d9d38b', '02a0a8f7c0a4dc88f7f16a4e345e652f8115bca87c65e0b90ca6141a72b0677d', 'ditmarlipingu@gmail.com', '', 'Admin', '2017-07-22 20:17:47', '2', 'Blue'),
(14, 'Panga', 'L', 'Boy', 'Panga', '9c60ed79f8f7f126f2ec73de556264c91ddf45fb7b687ecf7a7ac27a56d9d38b', '9c60ed79f8f7f126f2ec73de556264c91ddf45fb7b687ecf7a7ac27a56d9d38b', 'ditram@outlook.com', 'Koala.jpg', 'SuperUser', '2017-07-23 19:12:41', '5', 'alteza');

-- --------------------------------------------------------

--
-- Table structure for table `allowed_book`
--

DROP TABLE IF EXISTS `allowed_book`;
CREATE TABLE `allowed_book` (
  `allowed_book_id` int(11) NOT NULL,
  `qntty_books` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowed_book`
--

INSERT INTO `allowed_book` (`allowed_book_id`, `qntty_books`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `allowed_days`
--

DROP TABLE IF EXISTS `allowed_days`;
CREATE TABLE `allowed_days` (
  `allowed_days_id` int(11) NOT NULL,
  `no_of_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowed_days`
--

INSERT INTO `allowed_days` (`allowed_days_id`, `no_of_days`) VALUES
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

DROP TABLE IF EXISTS `barcode`;
CREATE TABLE `barcode` (
  `barcode_id` int(11) NOT NULL,
  `pre_barcode` varchar(100) NOT NULL,
  `mid_barcode` int(100) NOT NULL,
  `suf_barcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`barcode_id`, `pre_barcode`, `mid_barcode`, `suf_barcode`) VALUES
(1, 'VNHS', 1, 'LMS'),
(2, 'VNHS', 2, 'LMS'),
(3, 'VNHS', 3, 'LMS'),
(4, 'VNHS', 4, 'LMS'),
(5, 'VNHS', 5, 'LMS'),
(6, 'VNHS', 6, 'LMS'),
(7, 'VNHS', 7, 'LMS'),
(8, 'VNHS', 8, 'LMS'),
(9, 'VNHS', 8, 'LMS'),
(10, 'VNHS', 9, 'LMS'),
(11, 'VNHS', 10, 'LMS'),
(12, 'VNHS', 11, 'LMS'),
(13, 'SJUCET', 12, 'LMS'),
(14, 'SJUCET', 13, 'LMS'),
(15, 'SJUCET', 14, 'LMS'),
(16, 'SJUCET', 15, 'LMS');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `category_id` int(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `author_2` varchar(100) NOT NULL,
  `author_3` varchar(100) NOT NULL,
  `author_4` varchar(100) NOT NULL,
  `author_5` varchar(100) NOT NULL,
  `book_copies` int(11) NOT NULL,
  `book_pub` varchar(100) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `copyright_year` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `book_barcode` varchar(100) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `category_id`, `author`, `author_2`, `author_3`, `author_4`, `author_5`, `book_copies`, `book_pub`, `publisher_name`, `isbn`, `copyright_year`, `status`, `book_barcode`, `book_image`, `date_added`, `remarks`) VALUES
(1, 'English Expressways : Second Year', 1, 'Virginia F. Bermudez', 'Remedios F. Nery', 'Josephine M. Cruz', 'Milagrosa A. San Juan', '', 15, '2010', 'SD Publications, INC.', '978-971-0315-72-7', 2010, 'Old', 'VNHS1LMS', 'IMG_0019.JPG', '2015-12-14 01:06:46', 'Available'),
(2, 'DAYBOOK of Critical Reading and Writing', 8, 'Fran Claggett', 'Louann Reid', 'Ruth Vinz', '', '', 20, '1978', 'Doubleday Canada Limited', '0-669-46432-5', 1978, 'Old', 'VNHS2LMS', 'IMG_0006 - Copy.JPG', '2015-12-14 01:11:06', 'Available'),
(3, 'Getting to Know-Puerto Rico', 2, 'Frances Robins', '', '', '', '', 1, 'Coward-McCann', '1967', '', 0, 'Old', 'VNHS3LMS', '', '2015-12-14 01:21:47', 'Available'),
(4, 'Lotta on Troublemaker Street', 2, 'Astrid Lindgren', '', '', '', '', 0, 'Aladdin Paperbacks', '2001', '0-689-84673-8', 1962, 'Replacement', 'VNHS4LMS', '', '2015-12-14 01:43:06', 'Not Available'),
(5, 'Great Days of Whailing', 8, 'Henry Beetle Hough', '', '', '', '', 1, '', '', '', 0, 'Damaged', 'VNHS5LMS', '', '2015-12-14 02:05:16', 'Not Available'),
(6, 'Even Big Guys Cry', 2, 'Alex Karras', '', '', '', '', 1, '', '', '', 0, 'Lost', 'VNHS6LMS', '', '2015-12-14 02:05:47', 'Not Available'),
(7, 'Gintong Pamana Wika at Panitikan - Ikalawang Taon', 6, 'Lolita R. Nakpil', 'Leticia F. Dominguez', '', '', '', 4, '2000', 'SD Publications, INC.', '971-07-1885-1', 2000, 'Old', 'VNHS7LMS', 'IMG_0029 - Copy.JPG', '2015-12-14 02:20:36', 'Available'),
(8, 'WEB TECHNOLOGIES', 1, 'Brian', 'Erick', '', '', '', 50, '2010', 'Dprints', '34534', 2011, 'Old', 'VNHS8LMS', '', '2017-02-28 06:50:35', 'Available'),
(10, 'Mech', 8, 'Danny', 'Danny', '', '', '', 20, '', '', '12233', 2012, 'New', 'VNHS9LMS', '', '2017-02-28 08:00:30', 'Available'),
(11, 'Computer', 13, 'Danny', '', '', '', '', 19, '', '', '324324', 2011, 'New', 'VNHS10LMS', '', '2017-03-15 05:23:54', 'Available'),
(12, 'Edu', 3, 'Frank', '', '', '', '', 20, '', '', '1234', 2008, 'New', 'VNHS11LMS', '', '2017-03-15 09:34:38', 'Available'),
(13, 'Home', 1, 'Daniel', '12', 'Computer', 'First', '20', 6, '1929', 'Masumin', '1827', 1992, '', 'SJUCET12LMS', '', '2017-06-01 08:53:38', 'Available'),
(14, 'Civil', 1, 'Gandhi', '12', 'Civil', 'First', '200', 29, '1928', 'Masumin', '12434', 1994, '', 'SJUCET13LMS', '', '2017-06-01 12:20:55', 'Available'),
(15, 'Advanced Database', 3, 'J.r Smith', '12343556', 'Database', '2nd', '700', 30, '2012', 'DPrints', '12233', 2010, '', 'SJUCET14LMS', '', '2017-07-24 22:07:43', 'Available'),
(16, 'Hisabati', 12, 'Nyambari', '1234355445', 'Maths', '2nd', '700', 20, '2010', 'DPrints', '1223356', 2008, '', 'SJUCET15LMS', '', '2017-07-27 00:44:12', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_book`
--

DROP TABLE IF EXISTS `borrow_book`;
CREATE TABLE `borrow_book` (
  `borrow_book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `date_returned` datetime NOT NULL,
  `borrowed_status` varchar(100) NOT NULL,
  `book_penalty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_book`
--

INSERT INTO `borrow_book` (`borrow_book_id`, `user_id`, `book_id`, `date_borrowed`, `due_date`, `date_returned`, `borrowed_status`, `book_penalty`) VALUES
(1, 2, 7, '2017-01-10 02:50:27', '2017-01-17 02:50:27', '2017-01-24 02:57:34', 'returned', '27'),
(2, 1, 7, '2017-01-14 02:50:58', '2017-01-17 02:50:58', '2017-02-04 02:57:37', 'returned', '27'),
(3, 4, 7, '2015-12-14 02:51:59', '2015-12-17 02:51:59', '2015-12-14 02:57:45', 'returned', 'No Penalty'),
(4, 1, 7, '2017-02-15 17:43:07', '2017-02-20 17:43:07', '2017-02-15 17:45:17', 'returned', 'No Penalty'),
(5, 3, 7, '2017-02-15 17:48:02', '2017-02-20 17:48:02', '2017-02-15 17:48:07', 'returned', 'No Penalty'),
(6, 3, 7, '2017-02-15 17:48:18', '2017-02-20 17:48:18', '2017-02-15 13:36:55', 'returned', 'No Penalty'),
(7, 3, 7, '2017-02-15 13:36:59', '2017-02-20 13:36:59', '2017-02-15 13:37:07', 'returned', 'No Penalty'),
(8, 1, 7, '2017-02-15 15:43:37', '2017-02-20 15:43:37', '2017-02-15 15:43:48', 'returned', 'No Penalty'),
(9, 1, 7, '2017-02-15 15:44:06', '2017-02-20 15:44:06', '2017-02-15 15:44:34', 'returned', 'No Penalty'),
(10, 1, 7, '2017-02-28 08:55:31', '2017-03-05 08:55:31', '2017-02-28 11:42:25', 'returned', 'No Penalty'),
(11, 1, 2, '2017-02-28 11:43:26', '2017-03-03 11:43:26', '2017-02-28 11:43:47', 'returned', 'No Penalty'),
(12, 2, 2, '2017-02-28 11:46:08', '2017-03-03 11:46:08', '2017-06-28 22:06:55', 'returned', '5872'),
(13, 3, 2, '2017-02-28 11:46:22', '2017-03-03 11:46:22', '2017-05-11 11:55:40', 'returned', '3450'),
(14, 4, 3, '2017-03-15 07:37:31', '2017-03-18 07:37:31', '2017-05-31 14:24:17', 'returned', '3714'),
(15, 1, 2, '2017-03-15 09:32:54', '2017-03-21 09:32:54', '2017-06-30 08:37:57', 'returned', '5048'),
(16, 2, 7, '2017-03-15 10:03:07', '2017-03-21 10:03:07', '2017-03-15 10:03:14', 'returned', 'No Penalty'),
(17, 2, 7, '2017-03-15 10:03:24', '2017-03-21 10:03:24', '2017-07-25 13:16:10', 'returned', '6307'),
(18, 3, 13, '2017-06-01 09:28:37', '2017-06-07 09:28:37', '2017-06-01 09:32:02', 'returned', 'No Penalty'),
(19, 3, 12, '2017-06-01 09:30:41', '2017-06-07 09:30:41', '2017-06-01 09:32:01', 'returned', 'No Penalty'),
(20, 3, 7, '2017-06-01 09:31:02', '2017-06-07 09:31:02', '2017-06-01 09:32:04', 'returned', 'No Penalty'),
(21, 2, 3, '2017-06-01 09:42:42', '2017-06-07 09:42:42', '2017-07-25 13:16:12', 'returned', '2407'),
(22, 30, 7, '2017-06-01 09:45:06', '2017-06-07 09:45:06', '0000-00-00 00:00:00', 'borrowed', ''),
(23, 1, 13, '2017-06-01 12:07:55', '2017-06-07 12:07:55', '2017-06-01 12:09:15', 'returned', 'No Penalty'),
(24, 4, 13, '2017-06-01 12:10:00', '2017-06-04 12:10:00', '0000-00-00 00:00:00', 'borrowed', ''),
(25, 35, 13, '2017-06-01 12:18:51', '2017-06-04 12:18:51', '2017-06-01 12:19:07', 'returned', 'No Penalty'),
(26, 2, 14, '2017-06-28 22:07:03', '2017-07-01 22:07:03', '2017-06-28 22:09:01', 'returned', 'No Penalty'),
(27, 2, 14, '2017-06-28 22:09:31', '2017-07-01 22:09:31', '2017-07-25 10:59:09', 'returned', '1177'),
(28, 1, 14, '2017-06-30 08:30:06', '2017-07-03 08:30:06', '2017-06-30 08:43:10', 'returned', 'No Penalty'),
(29, 1, 13, '2017-06-30 08:38:26', '2017-07-03 08:38:26', '2017-06-30 08:44:52', 'returned', 'No Penalty'),
(30, 1, 8, '2017-06-30 08:43:38', '2017-07-03 08:43:38', '2017-06-30 08:47:20', 'returned', 'No Penalty'),
(31, 1, 11, '2017-06-30 08:45:10', '2017-07-03 08:45:10', '0000-00-00 00:00:00', 'borrowed', ''),
(32, 1, 8, '2017-06-30 08:47:32', '2017-07-03 08:47:32', '2017-07-27 21:16:00', 'returned', '4904'),
(33, 1, 13, '2017-06-30 08:55:08', '2017-07-03 08:55:08', '2017-07-25 17:32:26', 'returned', '4472'),
(34, 2, 13, '2017-07-25 11:12:40', '2017-07-28 11:12:40', '2017-07-25 11:15:11', 'returned', 'No Penalty'),
(35, 2, 13, '2017-07-25 11:15:23', '2017-07-28 11:15:23', '2017-07-25 11:16:15', 'returned', 'No Penalty'),
(36, 2, 13, '2017-07-25 11:16:24', '2017-07-28 11:16:24', '2017-07-25 13:15:28', 'returned', 'No Penalty'),
(37, 2, 13, '2017-07-25 13:23:31', '2017-07-28 13:23:31', '2017-07-25 13:24:26', 'returned', 'No Penalty'),
(38, 2, 13, '2017-07-25 13:26:01', '2017-08-01 13:26:01', '0000-00-00 00:00:00', 'borrowed', ''),
(39, 3, 13, '2017-07-25 13:27:22', '2017-08-01 13:27:22', '2017-07-25 14:03:50', 'returned', 'No Penalty'),
(40, 3, 13, '2017-07-25 14:03:57', '2017-08-01 14:03:57', '2017-07-25 16:57:05', 'returned', 'No Penalty'),
(41, 3, 14, '2017-07-25 16:26:35', '2017-08-01 16:26:35', '2017-07-25 16:34:46', 'returned', 'No Penalty'),
(42, 3, 14, '2017-07-25 16:34:59', '2017-08-01 16:34:59', '2017-07-25 16:57:08', 'returned', 'No Penalty'),
(43, 3, 13, '2017-07-25 16:57:15', '2017-08-01 16:57:15', '2017-07-25 17:09:14', 'returned', 'No Penalty'),
(44, 3, 14, '2017-07-25 16:57:31', '2017-08-01 16:57:31', '2017-07-25 17:09:17', 'returned', 'No Penalty'),
(45, 3, 13, '2017-07-25 17:09:26', '2017-08-01 17:09:26', '2017-07-25 17:28:25', 'returned', 'No Penalty'),
(46, 3, 14, '2017-07-25 17:09:46', '2017-08-01 17:09:46', '2017-07-25 17:28:29', 'returned', 'No Penalty'),
(47, 3, 13, '2017-07-25 17:28:36', '2017-08-01 17:28:36', '0000-00-00 00:00:00', 'borrowed', ''),
(48, 3, 14, '2017-07-25 17:28:49', '2017-08-01 17:28:49', '2017-07-25 19:54:26', 'returned', 'No Penalty'),
(49, 1, 13, '2017-07-25 17:32:33', '2017-08-01 17:32:33', '0000-00-00 00:00:00', 'borrowed', ''),
(50, 3, 14, '2017-07-25 19:54:32', '2017-08-01 19:54:32', '2017-07-25 20:15:40', 'returned', 'No Penalty'),
(51, 3, 14, '2017-07-25 20:15:49', '2017-08-01 20:15:49', '2017-07-27 20:21:24', 'returned', 'No Penalty'),
(52, 3, 14, '2017-07-27 20:21:49', '2017-08-03 20:21:49', '2017-07-27 20:56:46', 'returned', 'No Penalty'),
(53, 3, 14, '2017-07-27 20:56:56', '2017-08-03 20:56:56', '0000-00-00 00:00:00', 'borrowed', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `classname` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `classname`) VALUES
(1, 'General Engineering'),
(2, 'Civil Engineering'),
(3, 'CSE'),
(4, 'ECE'),
(6, 'EEE'),
(7, 'ISNE'),
(8, 'Mechanical Engineering'),
(9, 'Education - Physics'),
(10, 'Education - Chemistry'),
(11, 'Education - Biology'),
(12, 'Education - Mathematics'),
(13, 'Education - Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

DROP TABLE IF EXISTS `penalty`;
CREATE TABLE `penalty` (
  `penalty_id` int(11) NOT NULL,
  `penalty_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penalty`
--

INSERT INTO `penalty` (`penalty_id`, `penalty_amount`) VALUES
(1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `recoveryemails_enc`
--

DROP TABLE IF EXISTS `recoveryemails_enc`;
CREATE TABLE `recoveryemails_enc` (
  `ID` bigint(20) UNSIGNED ZEROFILL NOT NULL,
  `UserID` bigint(20) NOT NULL,
  `Key` varchar(32) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recoveryemails_enc`
--

INSERT INTO `recoveryemails_enc` (`ID`, `UserID`, `Key`, `expDate`) VALUES
(00000000000000000001, 2, '83096f5c476af44416d0b8eda018a785', '2017-07-27 09:18:31'),
(00000000000000000002, 2, '64f01f5fb8fdfbb3c72dd1fb3ae27fdd', '2017-07-27 09:21:57'),
(00000000000000000003, 2, 'bf3046865f64f26e6452a160f5ffe8c7', '2017-07-27 11:04:01'),
(00000000000000000004, 2, 'f59e09e8c0424298eb686dec4321567b', '2017-07-27 16:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `detail_action` varchar(100) NOT NULL,
  `date_transaction` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `book_id`, `user_id`, `admin_name`, `detail_action`, `date_transaction`) VALUES
(1, 7, 2, 'Frank Lessen', 'Borrowed Book', '2017-01-14 02:50:30'),
(2, 7, 1, 'Frank Lessen', 'Borrowed Book', '2017-01-16 02:51:00'),
(5, 7, 2, 'Ditram Lipingu', 'Returned Book', '2017-01-18 02:57:34'),
(6, 7, 1, 'Daniel Mlabwa', 'Returned Book', '2017-01-19 02:57:37'),
(7, 7, 1, 'Daniel A. Mlabwa', 'Borrowed Book', '2017-02-15 12:45:03'),
(8, 7, 1, 'Daniel A. Mlabwa', 'Returned Book', '2017-02-15 12:45:17'),
(9, 7, 3, 'Daniel A. Mlabwa', 'Borrowed Book', '2017-02-15 12:48:04'),
(10, 7, 3, 'Daniel A. Mlabwa', 'Returned Book', '2017-02-15 12:48:07'),
(11, 7, 3, 'Daniel A. Mlabwa', 'Borrowed Book', '2017-02-15 12:48:21'),
(12, 7, 3, 'Daniel A. Mlabwa', 'Returned Book', '2017-02-15 13:36:55'),
(13, 7, 3, 'Daniel A. Mlabwa', 'Borrowed Book', '2017-02-15 13:37:01'),
(14, 7, 3, 'Daniel A. Mlabwa', 'Returned Book', '2017-02-15 13:37:07'),
(15, 7, 1, 'Daniel A. Mlabwa', 'Borrowed Book', '2017-02-15 15:43:42'),
(16, 7, 1, 'Daniel A. Mlabwa', 'Returned Book', '2017-02-15 15:43:48'),
(17, 7, 1, 'Daniel A. Mlabwa', 'Borrowed Book', '2017-02-15 15:44:08'),
(18, 7, 1, 'Daniel A. Mlabwa', 'Returned Book', '2017-02-15 15:44:34'),
(19, 7, 1, 'Daniel A. Mlabwa', 'Borrowed Book', '2017-02-28 08:55:34'),
(20, 7, 1, 'Daniel A. Mlabwa', 'Returned Book', '2017-02-28 11:42:25'),
(21, 2, 1, 'Daniel A. Mlabwa', 'Borrowed Book', '2017-02-28 11:43:30'),
(22, 2, 1, 'Daniel A. Mlabwa', 'Returned Book', '2017-02-28 11:43:47'),
(23, 2, 2, 'Daniel A. Mlabwa', 'Borrowed Book', '2017-02-28 11:46:11'),
(24, 2, 3, 'Daniel A. Mlabwa', 'Borrowed Book', '2017-02-28 11:46:24'),
(25, 3, 4, 'Daniel A. Mlabwa', 'Borrowed Book', '2017-03-15 07:37:33'),
(26, 2, 1, 'Daniel A. Mlabwa', 'Borrowed Book', '2017-03-15 09:32:56'),
(27, 7, 2, 'Daniel A. Mlabwa', 'Borrowed Book', '2017-03-15 10:03:09'),
(28, 7, 2, 'Daniel A. Mlabwa', 'Returned Book', '2017-03-15 10:03:14'),
(29, 7, 2, 'Daniel A. Mlabwa', 'Borrowed Book', '2017-03-15 10:03:29'),
(30, 2, 3, 'Daniel A. Mlabwa', 'Returned Book', '2017-05-11 11:55:40'),
(31, 3, 4, 'Nancy  Victor', 'Returned Book', '2017-05-31 14:24:17'),
(32, 13, 3, 'Nancy  Victor', 'Borrowed Book', '2017-06-01 09:28:39'),
(33, 12, 3, 'Nancy  Victor', 'Borrowed Book', '2017-06-01 09:30:43'),
(34, 7, 3, 'Nancy  Victor', 'Borrowed Book', '2017-06-01 09:31:04'),
(35, 12, 3, 'Nancy  Victor', 'Returned Book', '2017-06-01 09:32:01'),
(36, 13, 3, 'Nancy  Victor', 'Returned Book', '2017-06-01 09:32:02'),
(37, 7, 3, 'Nancy  Victor', 'Returned Book', '2017-06-01 09:32:04'),
(38, 3, 2, 'Nancy  Victor', 'Borrowed Book', '2017-06-01 09:42:44'),
(39, 7, 30, 'Nancy  Victor', 'Borrowed Book', '2017-06-01 09:45:08'),
(40, 13, 1, 'Daniel  Andy', 'Borrowed Book', '2017-06-01 12:08:44'),
(41, 13, 1, 'Daniel  Andy', 'Returned Book', '2017-06-01 12:09:15'),
(42, 13, 4, 'Daniel  Andy', 'Borrowed Book', '2017-06-01 12:10:02'),
(43, 13, 35, 'Daniel  Andy', 'Borrowed Book', '2017-06-01 12:18:53'),
(44, 13, 35, 'Daniel  Andy', 'Returned Book', '2017-06-01 12:19:07'),
(45, 2, 2, 'Nancy  Victor', 'Returned Book', '2017-06-28 22:06:55'),
(46, 14, 2, 'Nancy  Victor', 'Borrowed Book', '2017-06-28 22:07:05'),
(47, 14, 2, 'Nancy  Victor', 'Returned Book', '2017-06-28 22:09:02'),
(48, 14, 2, 'Nancy  Victor', 'Borrowed Book', '2017-06-28 22:09:33'),
(49, 14, 1, 'Nancy  Victor', 'Borrowed Book', '2017-06-30 08:30:10'),
(50, 2, 1, 'Nancy  Victor', 'Returned Book', '2017-06-30 08:37:58'),
(51, 13, 1, 'Nancy  Victor', 'Borrowed Book', '2017-06-30 08:41:45'),
(52, 14, 1, 'Nancy  Victor', 'Returned Book', '2017-06-30 08:43:10'),
(53, 8, 1, 'Nancy  Victor', 'Borrowed Book', '2017-06-30 08:43:40'),
(54, 13, 1, 'Nancy  Victor', 'Returned Book', '2017-06-30 08:44:52'),
(55, 11, 1, 'Nancy  Victor', 'Borrowed Book', '2017-06-30 08:45:13'),
(56, 8, 1, 'Nancy  Victor', 'Returned Book', '2017-06-30 08:47:20'),
(57, 8, 1, 'Nancy  Victor', 'Borrowed Book', '2017-06-30 08:47:36'),
(58, 13, 1, 'Nancy  Victor', 'Borrowed Book', '2017-06-30 08:55:10'),
(59, 14, 2, 'Daniel  Andy', 'Returned Book', '2017-07-25 10:59:09'),
(60, 13, 2, 'Daniel  Andy', 'Borrowed Book', '2017-07-25 11:12:46'),
(61, 13, 2, 'Daniel  Andy', 'Returned Book', '2017-07-25 11:15:12'),
(62, 13, 2, 'Daniel  Andy', 'Borrowed Book', '2017-07-25 11:15:26'),
(63, 13, 2, 'Daniel  Andy', 'Returned Book', '2017-07-25 11:16:16'),
(64, 13, 2, 'Daniel  Andy', 'Borrowed Book', '2017-07-25 11:16:27'),
(65, 13, 2, 'Daniel  Andy', 'Returned Book', '2017-07-25 13:15:28'),
(66, 7, 2, 'Daniel  Andy', 'Returned Book', '2017-07-25 13:16:10'),
(67, 3, 2, 'Daniel  Andy', 'Returned Book', '2017-07-25 13:16:13'),
(68, 13, 2, 'Daniel  Andy', 'Borrowed Book', '2017-07-25 13:23:43'),
(69, 13, 2, 'Daniel  Andy', 'Returned Book', '2017-07-25 13:24:26'),
(70, 13, 2, 'Daniel  Andy', 'Borrowed Book', '2017-07-25 13:26:22'),
(71, 13, 3, 'Daniel  Andy', 'Borrowed Book', '2017-07-25 13:28:04'),
(72, 13, 3, 'Daniel  Andy', 'Returned Book', '2017-07-25 14:03:50'),
(73, 13, 3, 'Daniel  Andy', 'Borrowed Book', '2017-07-25 14:04:00'),
(74, 14, 3, 'Frank  Lessen', 'Borrowed Book', '2017-07-25 16:26:38'),
(75, 14, 3, 'Frank  Lessen', 'Returned Book', '2017-07-25 16:34:46'),
(76, 14, 3, 'Frank  Lessen', 'Borrowed Book', '2017-07-25 16:35:02'),
(77, 13, 3, 'Frank  Lessen', 'Returned Book', '2017-07-25 16:57:05'),
(78, 14, 3, 'Frank  Lessen', 'Returned Book', '2017-07-25 16:57:08'),
(79, 13, 3, 'Frank  Lessen', 'Borrowed Book', '2017-07-25 16:57:19'),
(80, 14, 3, 'Frank  Lessen', 'Borrowed Book', '2017-07-25 16:57:34'),
(81, 13, 3, 'Frank  Lessen', 'Returned Book', '2017-07-25 17:09:14'),
(82, 14, 3, 'Frank  Lessen', 'Returned Book', '2017-07-25 17:09:18'),
(83, 13, 3, 'Frank  Lessen', 'Borrowed Book', '2017-07-25 17:09:29'),
(84, 14, 3, 'Frank  Lessen', 'Borrowed Book', '2017-07-25 17:09:49'),
(85, 13, 3, 'Frank  Lessen', 'Returned Book', '2017-07-25 17:28:26'),
(86, 14, 3, 'Frank  Lessen', 'Returned Book', '2017-07-25 17:28:29'),
(87, 13, 3, 'Frank  Lessen', 'Borrowed Book', '2017-07-25 17:28:39'),
(88, 14, 3, 'Frank  Lessen', 'Borrowed Book', '2017-07-25 17:28:53'),
(89, 13, 1, 'Frank  Lessen', 'Returned Book', '2017-07-25 17:32:26'),
(90, 13, 1, 'Frank  Lessen', 'Borrowed Book', '2017-07-25 17:32:37'),
(91, 14, 3, 'Frank  Lessen', 'Returned Book', '2017-07-25 19:54:26'),
(92, 14, 3, 'Frank  Lessen', 'Borrowed Book', '2017-07-25 19:54:35'),
(93, 14, 3, 'Frank  Lessen', 'Returned Book', '2017-07-25 20:15:40'),
(94, 14, 3, 'Frank  Lessen', 'Borrowed Book', '2017-07-25 20:15:53'),
(95, 14, 3, 'Ditram C. Lipingu', 'Returned Book', '2017-07-27 20:21:24'),
(96, 14, 3, 'Ditram C. Lipingu', 'Borrowed Book', '2017-07-27 20:22:10'),
(97, 14, 3, 'Ditram C. Lipingu', 'Returned Book', '2017-07-27 20:56:46'),
(98, 14, 3, 'Ditram C. Lipingu', 'Borrowed Book', '2017-07-27 20:57:00'),
(99, 8, 1, 'Ditram C. Lipingu', 'Returned Book', '2017-07-27 21:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `return_book`
--

DROP TABLE IF EXISTS `return_book`;
CREATE TABLE `return_book` (
  `return_book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `date_returned` datetime NOT NULL,
  `book_penalty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_book`
--

INSERT INTO `return_book` (`return_book_id`, `user_id`, `book_id`, `date_borrowed`, `due_date`, `date_returned`, `book_penalty`) VALUES
(1, 2, 7, '2017-01-14 02:50:27', '2017-01-17 02:50:27', '2017-02-14 02:57:31', '27'),
(2, 1, 7, '2017-01-14 02:50:58', '2017-01-17 02:50:58', '2017-01-24 02:57:30', '27'),
(3, 3, 7, '2017-01-14 02:51:59', '2017-01-17 02:51:59', '2017-01-16 02:57:29', 'No Penalty'),
(4, 2, 3, '2017-01-10 02:50:27', '2017-01-12 02:53:15', '2017-01-11 02:57:45', 'No Penalty'),
(5, 1, 7, '2017-02-15 17:43:07', '2017-02-20 17:43:07', '2017-02-15 17:45:03', 'No Penalty'),
(6, 3, 7, '2017-02-15 17:48:02', '2017-02-20 17:48:02', '2017-02-15 17:48:04', 'No Penalty'),
(7, 3, 7, '2017-02-15 17:48:18', '2017-02-20 17:48:18', '2017-02-15 13:36:51', 'No Penalty'),
(8, 3, 7, '2017-02-15 13:36:59', '2017-02-20 13:36:59', '2017-02-15 13:37:02', 'No Penalty'),
(9, 1, 7, '2017-02-15 15:43:37', '2017-02-20 15:43:37', '2017-02-15 15:43:42', 'No Penalty'),
(10, 1, 7, '2017-02-15 15:44:06', '2017-02-20 15:44:06', '2017-02-15 15:44:31', 'No Penalty'),
(11, 1, 7, '2017-02-28 08:55:31', '2017-03-05 08:55:31', '2017-02-28 11:42:20', 'No Penalty'),
(12, 1, 2, '2017-02-28 11:43:26', '2017-03-03 11:43:26', '2017-02-28 11:43:43', 'No Penalty'),
(13, 2, 7, '2017-03-15 10:03:07', '2017-03-21 10:03:07', '2017-03-15 10:03:10', 'No Penalty'),
(14, 3, 2, '2017-02-28 11:46:22', '2017-03-03 11:46:22', '2017-05-11 11:55:35', '3450'),
(15, 4, 3, '2017-03-15 07:37:31', '2017-03-18 07:37:31', '2017-05-31 14:24:09', '3714'),
(16, 3, 12, '2017-06-01 09:30:41', '2017-06-07 09:30:41', '2017-06-01 09:31:49', 'No Penalty'),
(17, 3, 13, '2017-06-01 09:28:37', '2017-06-07 09:28:37', '2017-06-01 09:32:01', 'No Penalty'),
(18, 3, 7, '2017-06-01 09:31:02', '2017-06-07 09:31:02', '2017-06-01 09:32:03', 'No Penalty'),
(19, 1, 13, '2017-06-01 12:07:55', '2017-06-07 12:07:55', '2017-06-01 12:08:44', 'No Penalty'),
(20, 35, 13, '2017-06-01 12:18:51', '2017-06-04 12:18:51', '2017-06-01 12:19:05', 'No Penalty'),
(21, 2, 2, '2017-02-28 11:46:08', '2017-03-03 11:46:08', '2017-06-28 22:06:53', '5872'),
(22, 2, 14, '2017-06-28 22:07:03', '2017-07-01 22:07:03', '2017-06-28 22:07:05', 'No Penalty'),
(23, 1, 2, '2017-03-15 09:32:54', '2017-03-21 09:32:54', '2017-06-30 08:30:47', '5048'),
(24, 1, 14, '2017-06-30 08:30:06', '2017-07-03 08:30:06', '2017-06-30 08:42:20', 'No Penalty'),
(25, 1, 13, '2017-06-30 08:38:26', '2017-07-03 08:38:26', '2017-06-30 08:44:49', 'No Penalty'),
(26, 1, 8, '2017-06-30 08:43:38', '2017-07-03 08:43:38', '2017-06-30 08:45:19', 'No Penalty'),
(27, 2, 14, '2017-06-28 22:09:31', '2017-07-01 22:09:31', '2017-07-25 10:59:05', '1177'),
(28, 2, 13, '2017-07-25 11:12:40', '2017-07-28 11:12:40', '2017-07-25 11:12:54', 'No Penalty'),
(29, 2, 13, '2017-07-25 11:15:23', '2017-07-28 11:15:23', '2017-07-25 11:15:31', 'No Penalty'),
(30, 2, 13, '2017-07-25 11:16:24', '2017-07-28 11:16:24', '2017-07-25 11:16:32', 'No Penalty'),
(31, 2, 7, '2017-03-15 10:03:24', '2017-03-21 10:03:24', '2017-07-25 13:15:29', '6307'),
(32, 2, 3, '2017-06-01 09:42:42', '2017-06-07 09:42:42', '2017-07-25 13:16:10', '2407'),
(33, 2, 13, '2017-07-25 13:23:31', '2017-07-28 13:23:31', '2017-07-25 13:23:49', 'No Penalty'),
(34, 3, 13, '2017-07-25 13:27:22', '2017-08-01 13:27:22', '2017-07-25 14:03:47', 'No Penalty'),
(35, 3, 14, '2017-07-25 16:26:35', '2017-08-01 16:26:35', '2017-07-25 16:34:42', 'No Penalty'),
(36, 3, 13, '2017-07-25 14:03:57', '2017-08-01 14:03:57', '2017-07-25 16:57:02', 'No Penalty'),
(37, 3, 14, '2017-07-25 16:34:59', '2017-08-01 16:34:59', '2017-07-25 16:57:05', 'No Penalty'),
(38, 3, 13, '2017-07-25 16:57:15', '2017-08-01 16:57:15', '2017-07-25 17:09:11', 'No Penalty'),
(39, 3, 14, '2017-07-25 16:57:31', '2017-08-01 16:57:31', '2017-07-25 17:09:15', 'No Penalty'),
(40, 3, 13, '2017-07-25 17:09:26', '2017-08-01 17:09:26', '2017-07-25 17:28:23', 'No Penalty'),
(41, 3, 14, '2017-07-25 17:09:46', '2017-08-01 17:09:46', '2017-07-25 17:28:26', 'No Penalty'),
(42, 1, 13, '2017-06-30 08:55:08', '2017-07-03 08:55:08', '2017-07-25 17:32:22', '4472'),
(43, 3, 14, '2017-07-25 17:28:49', '2017-08-01 17:28:49', '2017-07-25 19:54:22', 'No Penalty'),
(44, 3, 14, '2017-07-25 19:54:32', '2017-08-01 19:54:32', '2017-07-25 20:15:37', 'No Penalty'),
(45, 3, 14, '2017-07-25 20:15:49', '2017-08-01 20:15:49', '2017-07-27 20:21:16', 'No Penalty'),
(46, 3, 14, '2017-07-27 20:21:49', '2017-08-03 20:21:49', '2017-07-27 20:22:18', 'No Penalty'),
(47, 1, 8, '2017-06-30 08:47:32', '2017-07-03 08:47:32', '2017-07-27 21:15:01', '4904');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `school_number` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `user_image` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `user_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `school_number`, `firstname`, `middlename`, `lastname`, `contact`, `gender`, `email`, `address`, `type`, `level`, `section`, `user_image`, `status`, `user_added`) VALUES
(1, '13171055009', 'Daniel', 'Anderson', 'Mlabwa', '+255784393988', 'Male', 'mlabwa@hotmail.com', 'MBEZI BEACH', 'Degree', 'Fourth year', 'CSE', '', 'Active', '2017-01-14 02:47:56'),
(2, '13171055012', 'Ditram', 'Chrisostom', 'Lipingu', '+255679247155', 'Male', 'ditram@outlook.com', 'POSTA DAR CITY', 'Degree', 'Fourth year', 'CSE', '', 'Active', '2017-01-14 02:47:56'),
(3, '13171055041', 'Frank', 'Gilbert', 'Lessen', '+255715755223', 'Male', 'frankgilbert911@gmail.com', 'TABATA DAR', 'Degree', 'Fourth year', 'CSE', '', 'Active', '2017-07-14 02:47:56'),
(4, '13171055007', 'Baraka', 'Adam', 'Mkuna', '+255712345678', 'Male', '', 'Moshi', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-04 12:08:55'),
(30, '13171055003', 'Andrew', 'D', 'Makonda', '718543212', 'Male', '', 'Dar', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-04 13:21:11'),
(31, '13171055013', 'Edgar', '', 'Mligo', '718543213', 'Male', '', 'Dar', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-09 22:26:44'),
(32, '13171055014', 'Edward', '', 'Tresphory', '718543214', 'Male', '', 'Dar', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-09 22:26:44'),
(33, '13171055015', 'Edwin ', 'Paul', 'Bax', '718543215', 'Male', '', 'Dar', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-09 22:26:44'),
(35, '13171055017', 'Emanuel', '', 'Mwajombe', '718543217', 'Male', '', 'Dar', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-09 22:26:44'),
(36, '13171055018', 'Emmanuek', 'Malekela', 'Madahalu', '718543218', 'Male', '', 'Dar', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-09 22:26:44'),
(37, '13171055019', 'Eric', 'M', 'Musa', '718543219', 'Male', '', 'Dar', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-09 22:26:44'),
(38, '13171055021', 'Habakuki', '', 'Lulandala', '718543220', 'Male', '', 'Dar', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-09 22:26:44'),
(39, '13171055023', 'Hosseana', '', 'Nyingi', '712345678', 'Male', '', 'Dar', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-09 22:37:14'),
(40, '13171055043', 'Steven', '', 'Ruhi', '', 'Male', '', 'Dar City', 'Degree', 'First Year', 'CSE', NULL, 'Active', '2017-03-14 22:32:41'),
(41, '13171055004', 'Arnold', 'Bartholomew', 'Gonelimali', '', 'Male', '', 'Dar', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-14 23:42:39'),
(42, '13171055005', 'Arnold', '', 'Mkiza', '', 'Male', '', 'Dar', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-14 23:43:31'),
(43, '13171055008', 'Catherine', 'A', 'Rweshabula', '', 'Female', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-14 23:45:33'),
(44, '13171055010', 'Daniel', 'Peter', 'Kipiki', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-14 23:46:07'),
(45, '13171055025', 'Jackson', '', 'Karume', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-14 23:48:31'),
(46, '13171055026', 'Michael', '', 'Jonathan', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-14 23:49:11'),
(47, '13171055028', 'Nadra', 'I', 'Ramadhan', '', 'Female', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-14 23:49:56'),
(889, '13171055027', 'MOHAMED', 'A', 'ALI', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(890, '13171055030', 'NOAH', 'ANGETILE', 'KASUNGA', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(891, '13171055031', 'NOELY', 'E', 'MWALONGO', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(892, '13171055032', 'SALEHE', '', 'MAKINDI', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(893, '13171055033', 'SALUM', 'S', 'ALI', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(894, '13171055034', 'SAMSON', 'S', 'KOBO', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(895, '13171055035', 'SHEDRACK', 'ABIAS', 'MKUDE', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(896, '13171055038', 'WALTER', 'ALPHONCE', 'CHAMECHA', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(897, '13171055039', 'WASSIM', '', 'SALIM', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(898, '13171055044', 'AISHA', 'RAMADHAN', 'SEMAUYA', '', 'Female', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(899, '14173055045', 'ABDALLAH', '', 'ZAURU', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(900, '14173055046', 'AGAPE', 'ANYELWISYE', 'JENGELA', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(901, '14173055047', 'ARISTIDES', 'CHRISTOM', 'MANYOLOGA', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(902, '14173055048', 'BRIAN', 'M', 'HARRY', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(903, '14173055050', 'DAUDI', '', 'AKIM', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(904, '14173055051', 'DAVID', 'A', 'LYENGI', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(905, '14173055053', 'EDMUND', 'EMMANUEL', 'LUGAKINGIRA', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(906, '14173055054', 'EMMANUEL', '', 'SENZOTA', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(907, '14173055055', 'ERIC', 'JOSEPH', 'KAIKA', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(908, '14173055056', 'ERIC', 'MELKIORY', 'MASATU', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(909, '14173055057', 'ERICK', '', 'KESSY', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(910, '14173055058', 'FELISTAS', 'ALFONSE', 'MAKENE', '', 'Female', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(911, '14173055059', 'FRANK', '', 'OMARI', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(912, '14173055063', 'LYIDIA', 'P', 'ASSENGA', '', 'Female', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(913, '14173055064', 'MAGDALENA', 'KIONDO', 'LUCAS', '', 'Female', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(914, '14173055066', 'RUTH', 'ISSACK', 'MOSHI', '', 'Female', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(915, '14173055067', 'SAMUEL', 'MBUA', 'MBEZI', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(916, '14173055068', 'SARAH', '', 'DANIEL', '', 'Female', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(917, '14173055069', 'SILAS', '', 'LAWI', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(918, '14173055070', 'STEPHENE', 'M', 'MALIMA', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(919, '14173055071', 'THERESINA', 'WILLIAM', 'NYONDO', '', 'Female', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(920, '14173055072', 'CHRISTOPHER', 'KIMARYO', 'SALUTARI', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(921, '14173055073', 'KULUTHUMU', 'I', 'NCHIRA', '', 'Female', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(922, '12171055003', 'AUGUSTINO', '', 'CHONYA', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(923, '13173055045', 'BONIFACE', 'ANTHONY', 'NGOWO', '', 'Male', '', '', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-05-11 13:29:31'),
(924, '11171055007', 'Kelvin', '', 'Kimambo', '0784393988', 'Male', '', '', 'Degree', 'Fourth Year', 'Civil', NULL, 'Active', '2017-05-31 13:56:35'),
(925, '18171055008', 'Ditram', '', 'Lipingu', '0679247155', 'Male', 'ditram@outlook.com', '', 'Degree', 'Second Year', 'Civil', NULL, 'Active', '2017-05-31 14:06:50'),
(926, '123456789', 'John', '', 'Barnabas', '0712123456', 'Male', '', '', 'Degree', 'First Year', 'CSE', NULL, 'Active', '2017-05-31 14:09:43'),
(927, '121256789', 'Devotha', '', 'Gabriel', '0789898989', 'Female', 'devotha@gmail.com', '', 'Degree', 'First Year', 'EEE', NULL, 'Active', '2017-05-31 14:10:32'),
(928, '131256789', 'Martin', '', 'John', '0656123456', 'Male', '', '', 'Degree', 'First Year', 'ECE', NULL, 'Active', '2017-05-31 14:11:21'),
(929, '141256789', 'Mwalimu', '', 'Teacher', '0765432156', 'Male', '', '', 'Degree', 'First Year', 'Education', NULL, 'Active', '2017-05-31 14:12:13'),
(930, '151256789', 'Information', '', 'Systems', '0761234567', 'Male', '', '', 'Degree', 'First Year', 'ISNE', NULL, 'Active', '2017-05-31 14:12:48'),
(931, '161256789', 'Mechanical', '', 'Engineer', '0798675865', 'Male', '', '', 'Degree', 'First Year', 'Mechanical Engineering', NULL, 'Active', '2017-05-31 14:13:14'),
(932, '13171055099', 'Enock', '', 'Nkaina', '0712991689', 'Male', '', '', 'Diploma', 'Third Year', 'Mechanical Engineering', NULL, 'Active', '2017-05-31 19:22:12'),
(933, '1317105501212', 'Ditmar', '', 'Lipingu', '+255743390202', 'Male', 'ditmarlipingu@gmail.com', 'Posta', 'Degree', 'Fourth Year', 'CSE', NULL, 'Active', '2017-07-22 21:26:05'),
(934, '13171001096', 'George', '', 'Malyambale', '+255712765489', 'Male', 'goergemaro@gmail.com', 'Masaki', 'Degree', 'Fourth Year', 'Civil', NULL, 'Active', '2017-07-24 22:38:56'),
(935, '13171055016', 'Emmanuel', '', 'Mdahalu', '718543216', 'Male', NULL, 'Dar', 'Student', 'Fourth Year', 'CSE', NULL, 'Active', '2017-07-24 22:53:16'),
(936, '132124324', 'John', '', 'Kilangu', '+255738676543', 'Male', 'john@gmai.com', 'POSTA', 'Staff', 'First Year', 'Civil', NULL, 'Active', '2017-07-24 23:36:05'),
(937, '23432423', 'Said', '', 'Juma', '+255782345684', 'Male', 'juma@gmail.com', '', 'Staff', 'First Year', 'CSE', NULL, 'Active', '2017-07-25 00:51:07'),
(938, '325435634', 'James', '', 'Kitila', '255678543453', 'Male', 'james@gmail.com', '', 'Diploma', 'First Year', 'Civil', NULL, 'Active', '2017-07-26 17:21:42'),
(939, '345334', 'Jimmy', '', 'Dimson', '255654384896', 'Male', 'dim@gmail.com', '', 'Diploma', 'First Year', 'CSE', NULL, 'Active', '2017-07-26 17:23:23'),
(940, '12342342', 'Goodluck', '', 'James', '255678543212', 'Male', 'good@gmail.com', '', 'Diploma', 'First Year', 'ECE', NULL, 'Active', '2017-07-26 17:26:20'),
(941, '124324234', 'Clara', '', 'Joseph', '255678543294', 'Female', 'clara.joseph@gmail.com', '', 'Diploma', 'First Year', 'Education', NULL, 'Active', '2017-07-26 17:28:25'),
(942, '13432423', 'Frank', 'Johnie', 'Shau', '255786549320', 'Male', 'frank@gmail.com', '', 'Diploma', 'First Year', 'ISNE', NULL, 'Active', '2017-07-26 17:29:27'),
(943, '53453423', 'Bula', '', 'Ausonius', '+255768456432', 'Female', 'bula@gmail.com', '', 'Diploma', 'First Year', 'EEE', NULL, 'Active', '2017-07-26 17:33:46'),
(944, '32423', 'Christine', '', 'Clarence', '+255768435685', 'Female', 'chris@gmail.com', '', 'Staff', 'First Year', 'EEE', NULL, 'Active', '2017-07-26 18:32:47'),
(945, '21335435', 'Anna', '', 'Benson', '+255765485321', 'Female', 'ann@gmail.com', '', 'Staff', 'First Year', 'Education', NULL, 'Active', '2017-07-26 18:34:06'),
(946, '3453453453', 'Aneth', '', 'John', '+255678485321', 'Female', 'anteh@gmail.com', '', 'Staff', 'First Year', 'ISNE', NULL, 'Active', '2017-07-26 18:36:15'),
(947, '4353453', 'Deodatus', '', 'Gindu', '+255678965432', 'Male', 'deodatus@gmail.com', '', 'Staff', 'First Year', 'CSE', NULL, 'Active', '2017-07-26 18:41:55'),
(948, '1232331212', 'Mwakatuka', '', 'Jamwa', '+255786456432', 'Male', 'mwai@gmail.com', '', 'Staff', 'First Year', 'ECE', NULL, 'Active', '2017-07-26 20:04:26'),
(949, '12312312311', 'Aisha', '', 'Ramadhan', '+255678543458', 'Female', 'aisha@gmail.com', '', 'Staff', 'First Year', 'Mechanical Engineering', NULL, 'Active', '2017-07-26 20:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

DROP TABLE IF EXISTS `user_log`;
CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `date_log` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `user_id`, `user_name`, `date_log`) VALUES
(2, 2, 'DITRAM LIPINGU', '2017-01-14 08:39:11'),
(92, 3, 'FRANK LESSEN', '2017-01-14 14:25:56'),
(93, 1, 'DANIEL MLABWA', '2017-01-16 14:26:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `allowed_book`
--
ALTER TABLE `allowed_book`
  ADD PRIMARY KEY (`allowed_book_id`);

--
-- Indexes for table `allowed_days`
--
ALTER TABLE `allowed_days`
  ADD PRIMARY KEY (`allowed_days_id`);

--
-- Indexes for table `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`barcode_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrow_book`
--
ALTER TABLE `borrow_book`
  ADD PRIMARY KEY (`borrow_book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_id` (`category_id`),
  ADD KEY `classid` (`category_id`);

--
-- Indexes for table `penalty`
--
ALTER TABLE `penalty`
  ADD PRIMARY KEY (`penalty_id`);

--
-- Indexes for table `recoveryemails_enc`
--
ALTER TABLE `recoveryemails_enc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `return_book`
--
ALTER TABLE `return_book`
  ADD PRIMARY KEY (`return_book_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `allowed_book`
--
ALTER TABLE `allowed_book`
  MODIFY `allowed_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `allowed_days`
--
ALTER TABLE `allowed_days`
  MODIFY `allowed_days_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `barcode`
--
ALTER TABLE `barcode`
  MODIFY `barcode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `borrow_book`
--
ALTER TABLE `borrow_book`
  MODIFY `borrow_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=801;
--
-- AUTO_INCREMENT for table `penalty`
--
ALTER TABLE `penalty`
  MODIFY `penalty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `recoveryemails_enc`
--
ALTER TABLE `recoveryemails_enc`
  MODIFY `ID` bigint(20) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `return_book`
--
ALTER TABLE `return_book`
  MODIFY `return_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=950;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
