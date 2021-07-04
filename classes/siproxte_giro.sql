-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2021 at 06:15 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `siproxte_giro`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(10) UNSIGNED NOT NULL,
  `cert_name` varchar(45) COLLATE utf8_bin NOT NULL,
  `rec_name` varchar(128) COLLATE utf8_bin NOT NULL,
  `date` varchar(45) COLLATE utf8_bin NOT NULL,
  `language` varchar(45) COLLATE utf8_bin NOT NULL,
  `level` varchar(45) COLLATE utf8_bin NOT NULL,
  `FK_user_id_cert_user` int(10) UNSIGNED NOT NULL,
  `FK_product_id_cert_product` int(10) UNSIGNED NOT NULL,
  `price` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `cert_name`, `rec_name`, `date`, `language`, `level`, `FK_user_id_cert_user`, `FK_product_id_cert_product`, `price`) VALUES
(3, 'General English', 'Mehran Zahedi', '3/12/2020', 'English', 'A1', 129, 101, '50'),
(4, 'Tourist translation', 'Mehran Zahedi', '5/11/2019', 'English', '1', 129, 104, '50');

-- --------------------------------------------------------

--
-- Table structure for table `cert_req_list`
--

CREATE TABLE `cert_req_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `FK_cert_id_list_cert` int(10) UNSIGNED NOT NULL,
  `fee` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '50',
  `status` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cert_req_list`
--

INSERT INTO `cert_req_list` (`id`, `FK_cert_id_list_cert`, `fee`, `status`) VALUES
(12, 4, '50', 'pending'),
(13, 4, '50', 'pending'),
(14, 4, '50', 'pending'),
(19, 3, '50', 'pending'),
(20, 4, '50', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(128) COLLATE utf8_bin NOT NULL,
  `language` varchar(45) COLLATE utf8_bin NOT NULL,
  `language_level` varchar(45) COLLATE utf8_bin NOT NULL,
  `type` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT 'public',
  `tuition` varchar(45) COLLATE utf8_bin NOT NULL,
  `student_capacity` int(10) DEFAULT NULL,
  `FK_Product_id_course_product` int(10) UNSIGNED NOT NULL,
  `teacher_name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `language`, `language_level`, `type`, `tuition`, `student_capacity`, `FK_Product_id_course_product`, `teacher_name`) VALUES
(1011, 'General English for Adults', 'English', 'GE1', 'public', '350', 30, 101, 'John Doe'),
(1012, 'General English for Adults', 'English', 'GE2', 'public', '350', 25, 101, 'John Doe'),
(1013, 'General English for Adults', 'English', 'GE3', 'public', '350', 20, 101, 'John Doe'),
(1014, 'General English for Adults', 'English', 'GE4', 'public', '350', 20, 101, 'John Doe'),
(1015, 'General English for Adults', 'English', 'open-private', 'Private', '500', 2, 101, 'John Doe'),
(1016, 'General English for Kids', 'English', 'GE1', 'public', '250', 10, 101, 'John Doe'),
(1017, 'General English for Kids', 'English', 'GE2', 'public', '250', 10, 101, 'John Doe'),
(1018, 'General English for Kids', 'English', 'GE3', 'public', '250', 10, 101, 'John Doe'),
(1019, 'General English for Kids', 'English', 'GE4', 'public', '250', 10, 101, 'John Doe'),
(1021, 'IELTS Prep ', 'English', 'IE1', 'public', '500', 15, 102, 'Jacke Masito'),
(1022, 'IELTS Prep ', 'English', 'IE2', 'public', '500', 15, 102, 'Jacke Masito'),
(1023, 'IELTS Prep ', 'English', 'IE3', 'public', '500', 15, 102, 'Jacke Masito'),
(1024, 'IELTS Prep ', 'English', 'IE4', 'public', '500', 15, 102, 'Jacke Masito'),
(1025, 'IELTS Prep ', 'English', 'open-private', 'private', '750', 2, 102, 'Jacke Masito'),
(1031, 'TOEFL Prep', 'English', 'TOF1', 'public', '550', 15, 103, 'Clark Malik'),
(1032, 'TOEFL Prep', 'English', 'TOF2', 'public', '550', 15, 103, 'Clark Malik'),
(1033, 'TOEFL Prep', 'English', 'TOF3', 'public', '550', 15, 103, 'Clark Malik'),
(1034, 'TOEFL Prep', 'English', 'TOF4', 'public', '550', 15, 103, 'Clark Malik'),
(1035, 'TOEFL Prep', 'English', 'open-private', 'private', '700', 2, 103, 'Clark Malik'),
(1041, 'Specialised English for tourism', 'English', 'SET1', 'public', '150', 10, 104, 'Alex Rook'),
(1042, 'Specialised English for tourism', 'English', 'SET2', 'public', '150', 10, 104, 'Alex Rook'),
(1043, 'Specialised English for tourism', 'English', 'open-private', 'public', '400', 2, 104, 'Alex Rook'),
(1044, 'Specialised English for business', 'English', 'SEB1', 'public', '150', 10, 104, 'Alex Rook'),
(1045, 'Specialised English for business', 'English', 'SEB2', 'public', '150', 10, 104, 'Alex Rook'),
(1046, 'Specialised English for business', 'English', 'open-private', 'private', '400', 2, 104, 'Alex Rook'),
(10110, 'General English for Kids', 'English', 'open-private', 'private', '500', 2, 101, 'John Doe');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `course_title` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `last_four_digit` varchar(4) COLLATE utf8_bin NOT NULL,
  `nameOnCard` varchar(45) COLLATE utf8_bin NOT NULL,
  `Date` varchar(45) COLLATE utf8_bin NOT NULL,
  `time` varchar(45) COLLATE utf8_bin NOT NULL,
  `Amount` int(11) UNSIGNED NOT NULL,
  `reference_num` varchar(45) COLLATE utf8_bin NOT NULL,
  `test_id` int(10) DEFAULT NULL,
  `cert_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `course_title`, `last_four_digit`, `nameOnCard`, `Date`, `time`, `Amount`, `reference_num`, `test_id`, `cert_id`) VALUES
(206, 129, 'General English for Kids', '1121', 'Soroosh Modarresi', '2020-03-09', '10:53:58am', 250, '707426', NULL, NULL),
(207, 129, 'General English for Kids', '1121', 'Soroosh Modarresi', '2020-03-09', '10:55:05am', 250, '423342', NULL, NULL),
(208, 129, 'General English for Kids', '1121', 'Soroosh Modarresi', '2020-03-09', '10:57:25am', 250, '573373', NULL, NULL),
(209, 129, 'General English for Kids', '1121', 'Soroosh Modarresi', '2020-03-09', '10:58:08am', 250, '195319', NULL, NULL),
(210, 129, 'General English for Kids', '1121', 'Soroosh Modarresi', '2020-03-09', '04:12:51pm', 250, '201367', NULL, NULL),
(235, 134, 'TOFLE Prep Listening', '1121', 'Soroosh Modarresi', '2020-03-15', '08:20:39am', 550, '427378', NULL, NULL),
(236, 134, NULL, '1121', 'Soroosh Modarresi', '2020-03-15', '08:22:31am', 70, '261130', 1, NULL),
(238, 132, NULL, '1121', 'Soroosh Modarresi', '2020-03-15', '08:53:13am', 70, '397336', 1, NULL),
(239, 132, 'Business English writing', '1121', 'Soroosh Modarresi', '2020-03-15', '08:54:28am', 300, '956780', NULL, NULL),
(240, 129, NULL, '1121', 'Soroosh Modarresi', '2020-03-17', '03:29:53pm', 70, '276746', 1, NULL),
(241, 129, NULL, '1121', 'Soroosh Modarresi', '2020-03-17', '03:30:12pm', 50, '582649', 2, NULL),
(242, 129, 'General English for Adults', '1121', 'Soroosh Modarresi', '2020-03-29', '09:00:34am', 350, '591883', NULL, NULL),
(243, 129, 'TOFLE Prep Speaking', '1121', 'Soroosh Modarresi', '2020-03-29', '09:01:22am', 550, '879412', NULL, NULL),
(244, 129, NULL, '1121', 'Soroosh Modarresi', '2020-03-29', '09:03:30am', 50, '541209', NULL, 4),
(245, 129, NULL, '1121', 'Soroosh Modarresi', '2020-04-05', '02:06:17pm', 50, '707496', NULL, 4),
(246, 129, 'IELTS Prep Listening-private', '1121', 'Soroosh Modarresi', '2020-04-06', '09:16:00am', 1500, '591214', NULL, NULL),
(247, 129, NULL, '1121', 'Soroosh Modarresi', '2020-04-06', '09:26:55am', 50, '962849', 3, NULL),
(248, 129, NULL, '1121', 'Soroosh Modarresi', '2020-04-06', '09:29:12am', 50, '611446', NULL, 4),
(249, 141, 'General English for Adults', '1121', 'Soroosh Modarresi', '2020-12-10', '10:51:33am', 350, '458996', NULL, NULL),
(250, 129, 'General English for Adults', '1121', 'Soroosh Modarresi', '2020-12-10', '02:16:05pm', 350, '541428', NULL, NULL),
(251, 129, NULL, '1121', 'Soroosh Modarresi', '2020-12-10', '02:31:11pm', 55, '356350', 10, NULL),
(252, 129, 'IELTS Prep', '1121', 'Soroosh Modarresi', '2020-12-10', '03:13:43pm', 500, '729712', NULL, NULL),
(253, 129, 'Specialised English for tourism', '1121', 'Soroosh Modarresi', '2020-12-10', '03:15:30pm', 150, '266548', NULL, NULL),
(254, 129, NULL, '1121', 'Soroosh Modarresi', '2020-12-10', '03:16:24pm', 55, '706317', 9, NULL),
(255, 129, NULL, '1121', 'Soroosh Modarresi', '2020-12-12', '03:58:54pm', 55, '409150', 8, NULL),
(256, 143, NULL, '1121', 'Soroosh Modarresi', '2020-12-13', '10:07:32am', 55, '196327', NULL, 5),
(257, 143, NULL, '1121', 'Soroosh Modarresi', '2020-12-13', '10:09:33am', 55, '262085', NULL, 5),
(258, 143, NULL, '1121', 'Soroosh Modarresi', '2020-12-13', '10:14:26am', 55, '492713', NULL, 5),
(259, 143, NULL, '1121', 'Soroosh Modarresi', '2020-12-13', '10:16:03am', 55, '531495', NULL, 5),
(260, 145, 'General English for Adults', '1121', 'Soroosh Modarresi', '2020-12-13', '06:04:26pm', 350, '832468', NULL, NULL),
(261, 145, NULL, '1121', 'Soroosh Modarresi', '2020-12-13', '06:06:11pm', 55, '237106', 9, NULL),
(262, 145, NULL, '1121', 'Soroosh Modarresi', '2020-12-13', '06:08:44pm', 55, '808816', 9, NULL),
(263, 129, NULL, '1121', 'Soroosh Modarresi', '2020-12-13', '06:13:43pm', 50, '508974', NULL, 3),
(264, 129, NULL, '1121', 'Soroosh Modarresi', '2020-12-13', '06:14:25pm', 50, '546084', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`) VALUES
(101, 'General English course'),
(102, 'IELTS course'),
(103, 'TOFLE course'),
(104, 'Specialised English course'),
(105, 'Language Evaluation'),
(106, 'test'),
(107, 'certificate');

-- --------------------------------------------------------

--
-- Table structure for table `signed_up_course`
--

CREATE TABLE `signed_up_course` (
  `id` int(10) UNSIGNED NOT NULL,
  `FK_course_id_signed_course` int(10) UNSIGNED NOT NULL,
  `FK_user_id_signed_user` int(10) UNSIGNED NOT NULL,
  `status` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `grade` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `signed_up_course`
--

INSERT INTO `signed_up_course` (`id`, `FK_course_id_signed_course`, `FK_user_id_signed_user`, `status`, `grade`) VALUES
(175, 1011, 141, '1', '75'),
(176, 1012, 129, '1', '65'),
(177, 1022, 129, '0', 'pending'),
(178, 1042, 129, '0', 'pending'),
(179, 1012, 145, '1', '55');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `type` varchar(45) COLLATE utf8_bin NOT NULL,
  `level` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT 'Normal',
  `fee` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT 'Free',
  `capacity` varchar(10) COLLATE utf8_bin NOT NULL,
  `date` varchar(45) CHARACTER SET armscii8 NOT NULL,
  `time` varchar(45) COLLATE utf8_bin NOT NULL,
  `address` varchar(120) COLLATE utf8_bin NOT NULL,
  `result_status` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT 'pending',
  `FK_product_id_test_product` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `type`, `level`, `fee`, `capacity`, `date`, `time`, `address`, `result_status`, `FK_product_id_test_product`) VALUES
(1, 'IELTS Mock test', 'International Exam', 'Normal', '70', '2', '3/13/2020', '08:00', '13 Street', 'Published', 106),
(2, 'TOEFL Mock test', 'International Exam', 'Normal', '50', '60', '3/20/2020', '08:00', '52 street', 'Published', 106),
(3, 'TOEFL Mock test', 'International Exam', 'Normal', '50', '60', '3/27/2020', '08:00', '52 street', 'Published', 106),
(4, 'IELTS Mock test', 'International Exam', 'Normal', '55', '10', '12/12/2020', '08:00', '13 Street', 'pending', 106),
(5, 'IELTS Mock test', 'International Exam', 'Hard', '55', '15', '12/19/2020', '08:00', '13 Street', 'pending', 106),
(6, 'IELTS Mock test', 'International Exam', 'Beginner', '55', '15', '1/15/2021', '08:00', '13 Street', 'pending', 106),
(7, 'IELTS Mock test', 'International Exam', 'Hard', '55', '15', '1/23/2021', '08:00', '52 street', 'pending', 106),
(8, 'IELTS Mock test', 'International Exam', 'Hard', '55', '15', '1/30/2021', '08:00', '52 street', 'pending', 106),
(9, 'TOEFL Mock test', 'International Exam', 'Beginner', '55', '15', '2/05/2021', '08:00', '52 street', 'pending', 106),
(10, 'TOEFL Mock test', 'International Exam', 'Normal', '55', '15', '2/15/2021', '08:00', '52 street', 'pending', 106);

-- --------------------------------------------------------

--
-- Table structure for table `test_student_list`
--

CREATE TABLE `test_student_list` (
  `id` int(11) NOT NULL,
  `FK_test_id_list_test` int(10) UNSIGNED NOT NULL,
  `FK_user_id_test_list_user` int(10) UNSIGNED NOT NULL,
  `result` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `test_student_list`
--

INSERT INTO `test_student_list` (`id`, `FK_test_id_list_test`, `FK_user_id_test_list_user`, `result`) VALUES
(44, 1, 129, '7.5'),
(45, 2, 129, '55'),
(46, 3, 129, '60'),
(47, 10, 129, 'pending'),
(48, 9, 129, 'pending'),
(49, 8, 129, 'pending'),
(51, 9, 145, '86');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `FK_course_id_timetable_course` int(10) UNSIGNED NOT NULL,
  `duration` varchar(45) COLLATE utf8_bin NOT NULL,
  `day` varchar(45) COLLATE utf8_bin NOT NULL,
  `time` varchar(45) COLLATE utf8_bin NOT NULL,
  `start_date` varchar(45) COLLATE utf8_bin NOT NULL,
  `room_no` varchar(5) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `FK_course_id_timetable_course`, `duration`, `day`, `time`, `start_date`, `room_no`) VALUES
(1, 1011, '6 weeks', 'Sat-Wed', '8:00-9:30', 'Dec 06 2020', '101'),
(2, 1012, '6 weeks', 'Sat-Wed', '9:30-11:00', 'Dec 06 2020', '101'),
(3, 1013, '6 weeks', 'Sun-Thu', '8:00-9:30', 'Dec 07 2020', '101'),
(4, 1014, '6 weeks', 'Sun-Thu', '9:30-11:00', 'Dec 07 2020', '101'),
(5, 1016, '6 weeks', 'Sat-Wed', '11:00-12:30', 'Dec 06 2020', '101'),
(6, 1017, '6 weeks', 'Sat-Wed', '15:00-16:30', 'Dec 06 2020', '101'),
(7, 1018, '6 weeks', 'Sun-Thu', '11:00-12:30', 'Dec 07 2020', '101'),
(8, 1019, '6 weeks', 'Sun-Thu', '15:00-16:30', 'Dec 07 2020', '101'),
(9, 1021, '6-month', 'Sat-Wed', '8:00-9:30', 'Dec 06 2020', '102'),
(10, 1022, '6-month', 'Sat-Wed', '9:30-11:00', 'Dec 06 2020', '102'),
(11, 1023, '6-month', 'Sun-Thu', '8:00-9:30', 'Dec 07 2020', '102'),
(12, 1024, '6-month', 'Sun-Thu', '9:30-11:00', 'Dec 07 2020', '102'),
(13, 1031, '6-month', 'Sat-Wed', '8:00-9:30', 'Dec 06 2020', '103'),
(14, 1032, '6-month', 'Sat-Wed', '9:30-11:00', 'Dec 06 2020', '103'),
(15, 1033, '6-month', 'Sun-Thu', '8:00-9:30', 'Dec 07 2020', '103'),
(16, 1034, '6-month', 'Sun-Thu', '9:30-11:00', 'Dec 07 2020', '103'),
(17, 1041, '6-month', 'Sat-Wed', '8:00-9:30', 'Dec 06 2020', '104'),
(18, 1042, '6-month', 'Sat-Wed', '9:30-11:00', 'Dec 06 2020', '104'),
(19, 1044, '6-month', 'Sun-Thu', '8:00-9:30', 'Dec 07 2020', '104'),
(20, 1045, '6-month', 'Sun-Thu', '9:30-11:00', 'Dec 07 2020', '104');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `Pass` varchar(512) COLLATE utf8_bin NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `tell` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(90) COLLATE utf8_bin NOT NULL,
  `address` varchar(128) COLLATE utf8_bin NOT NULL,
  `active_status` varchar(4) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `act_code` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Pass`, `name`, `tell`, `email`, `address`, `active_status`, `act_code`) VALUES
(129, '$2y$10$Nfq4RY.bRwaJZO.J9CI0FeA4/9DQv1N9xWHRIlzeZp1yENNyyGJkq', 'Mehran Zahedi', '+989371373930', 'frog.orange.shk@gmail.com', '13 Daneshjoo Germany', '1', 'activated'),
(141, '$2y$10$J7nHbkjgF1bitDaisjjbQuDIV7U6j6In1TT78oPaIsviKBzUeikpC', 'Amir Fakouri', '+989371373900', 'per.sor.ml@gmail.com', 'No 85 Farhad St clifton UK', '1', 'activated'),
(145, '$2y$10$vlzLIm4VnfgX62j6gz0fP.QYzzvG4nSaMJQ8yeFADEEMOxB3aWhdi', 'Ali Ahmadi', '+989371373900', 'soroosh_66m@yahoo.com', 'No 85 Farhad St clifton UK', '1', 'activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_id_cert_user` (`FK_user_id_cert_user`),
  ADD KEY `FK_product_id_cert_product` (`FK_product_id_cert_product`);

--
-- Indexes for table `cert_req_list`
--
ALTER TABLE `cert_req_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cert_id_list_cert` (`FK_cert_id_list_cert`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Product_id_course_product` (`FK_Product_id_course_product`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signed_up_course`
--
ALTER TABLE `signed_up_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_course_id_signed_course` (`FK_course_id_signed_course`),
  ADD KEY `FK_user_id_signed_user` (`FK_user_id_signed_user`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_id_test_product` (`FK_product_id_test_product`);

--
-- Indexes for table `test_student_list`
--
ALTER TABLE `test_student_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_test_id_list_test` (`FK_test_id_list_test`),
  ADD KEY `FK_user_id_test_list_user` (`FK_user_id_test_list_user`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_course_id_timetable_course` (`FK_course_id_timetable_course`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cert_req_list`
--
ALTER TABLE `cert_req_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `signed_up_course`
--
ALTER TABLE `signed_up_course`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `test_student_list`
--
ALTER TABLE `test_student_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `FK_product_id_cert_product` FOREIGN KEY (`FK_product_id_cert_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_id_cert_user` FOREIGN KEY (`FK_user_id_cert_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cert_req_list`
--
ALTER TABLE `cert_req_list`
  ADD CONSTRAINT `FK_cert_id_list_cert` FOREIGN KEY (`FK_cert_id_list_cert`) REFERENCES `certificate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `FK_Product_id_course_product` FOREIGN KEY (`FK_Product_id_course_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `signed_up_course`
--
ALTER TABLE `signed_up_course`
  ADD CONSTRAINT `FK_course_id_signed_course` FOREIGN KEY (`FK_course_id_signed_course`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_id_signed_user` FOREIGN KEY (`FK_user_id_signed_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `FK_product_id_test_product` FOREIGN KEY (`FK_product_id_test_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_student_list`
--
ALTER TABLE `test_student_list`
  ADD CONSTRAINT `FK_test_id_list_test` FOREIGN KEY (`FK_test_id_list_test`) REFERENCES `test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_id_test_list_user` FOREIGN KEY (`FK_user_id_test_list_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `FK_course_id_timetable_course` FOREIGN KEY (`FK_course_id_timetable_course`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

