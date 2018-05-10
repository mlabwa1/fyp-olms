-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2017 at 09:57 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `admin_image` varchar(100) NOT NULL,
  `admin_type` varchar(100) NOT NULL,
  `admin_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `confirm_password`, `admin_image`, `admin_type`, `admin_added`) VALUES
(1, 'Daniel', 'A.', 'Mlabwa', 'admin', 'admin', 'admin', '', 'Admin', '2017-01-30 11:40:50'),
(2, 'Ditram', 'C.', 'Lipingu', 'lipingu', 'lipingu', 'lipingu', '', 'Admin', '2017-01-31 11:40:50'),
(7, 'Frank', '', 'Lessen', 'frank', 'frank', 'frank', 'PhotoGrid_1434797765556.jpg', 'Admin', '2017-02-09 09:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `allowed_book`
--

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

CREATE TABLE `allowed_days` (
  `allowed_days_id` int(11) NOT NULL,
  `no_of_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowed_days`
--

INSERT INTO `allowed_days` (`allowed_days_id`, `no_of_days`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

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
(10, 'VNHS', 9, 'LMS');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

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
(2, 'DAYBOOK of Critical Reading and Writing', 8, 'Fran Claggett', 'Louann Reid', 'Ruth Vinz', '', '', 18, '1978', 'Doubleday Canada Limited', '0-669-46432-5', 1978, 'Old', 'VNHS2LMS', 'IMG_0006 - Copy.JPG', '2015-12-14 01:11:06', 'Available'),
(3, 'Getting to Know-Puerto Rico', 2, 'Frances Robins', '', '', '', '', 1, 'Coward-McCann', '1967', '', 0, 'Old', 'VNHS3LMS', '', '2015-12-14 01:21:47', 'Available'),
(4, 'Lotta on Troublemaker Street', 2, 'Astrid Lindgren', '', '', '', '', 0, 'Aladdin Paperbacks', '2001', '0-689-84673-8', 1962, 'Replacement', 'VNHS4LMS', '', '2015-12-14 01:43:06', 'Not Available'),
(5, 'Great Days of Whailing', 8, 'Henry Beetle Hough', '', '', '', '', 1, '', '', '', 0, 'Damaged', 'VNHS5LMS', '', '2015-12-14 02:05:16', 'Not Available'),
(6, 'Even Big Guys Cry', 2, 'Alex Karras', '', '', '', '', 1, '', '', '', 0, 'Lost', 'VNHS6LMS', '', '2015-12-14 02:05:47', 'Not Available'),
(7, 'Gintong Pamana Wika at Panitikan - Ikalawang Taon', 6, 'Lolita R. Nakpil', 'Leticia F. Dominguez', '', '', '', 5, '2000', 'SD Publications, INC.', '971-07-1885-1', 2000, 'Old', 'VNHS7LMS', 'IMG_0029 - Copy.JPG', '2015-12-14 02:20:36', 'Available'),
(8, 'WEB TECHNOLOGIES', 1, 'Brian', 'Erick', '', '', '', 50, '2010', 'Dprints', '34534', 2011, 'Old', 'VNHS8LMS', '', '2017-02-28 06:50:35', 'Available'),
(10, 'Mech', 8, 'Danny', 'Danny', '', '', '', 20, '', '', '12233', 2012, 'New', 'VNHS9LMS', '', '2017-02-28 08:00:30', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_book`
--

CREATE TABLE `borrow_book` (
  `borrow_book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `date_returned` datetime DEFAULT NULL,
  `borrowed_status` varchar(100) NOT NULL,
  `book_penalty` varchar(100) DEFAULT NULL
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
(12, 2, 2, '2017-02-28 11:46:08', '2017-03-03 11:46:08', NULL, 'borrowed', NULL),
(13, 3, 2, '2017-02-28 11:46:22', '2017-03-03 11:46:22', NULL, 'borrowed', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

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
(5, 'Education'),
(6, 'EEE'),
(7, 'ISNE'),
(8, 'Mechanical Engineering'),
(9, '');

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

CREATE TABLE `penalty` (
  `penalty_id` int(11) NOT NULL,
  `penalty_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penalty`
--

INSERT INTO `penalty` (`penalty_id`, `penalty_amount`) VALUES
(1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

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
(24, 2, 3, 'Daniel A. Mlabwa', 'Borrowed Book', '2017-02-28 11:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `return_book`
--

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
(12, 1, 2, '2017-02-28 11:43:26', '2017-03-03 11:43:26', '2017-02-28 11:43:43', 'No Penalty');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `school_number` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
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

INSERT INTO `user` (`user_id`, `school_number`, `firstname`, `middlename`, `lastname`, `contact`, `gender`, `address`, `type`, `level`, `section`, `user_image`, `status`, `user_added`) VALUES
(1, '13171055009', 'DANIEL', 'ANDERSON', 'MLABWA', '', 'Male', 'MBEZI BEACH', 'Student', 'Fourth year', 'CSE', '', 'Active', '2017-01-14 02:47:56'),
(2, '13171055012', 'DITRAM', 'CHRISOSTOM', 'LIPINGU', '', 'Male', 'POSTA DAR CITY', 'Student', 'Fourth year', 'CSE', '', 'Active', '2017-01-14 02:47:56'),
(3, '13171055041', 'FRNK', 'GILBERT', 'LESSEN', '', 'Male', 'TABATA DAR', 'Student', 'Fourth year', 'CSE', '', 'Active', '2017-07-14 02:47:56'),
(4, '13171055007', 'Baraka', 'Adam', 'Mkuna', '0712345678', 'Male', 'Moshi', 'Student', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-04 12:08:55'),
(30, '13171055003', 'Andrew', 'D', 'Makonda', '718543212', 'Male', 'Dar', 'Student', 'Fourth Year', 'CSE', NULL, 'Active', '2017-03-04 13:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `barcode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `borrow_book`
--
ALTER TABLE `borrow_book`
  MODIFY `borrow_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `return_book`
--
ALTER TABLE `return_book`
  MODIFY `return_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
