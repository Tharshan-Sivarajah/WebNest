-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 12:19 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webnest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_image`
--

CREATE TABLE `admin_image` (
  `a_pic_id` int(11) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_image`
--

INSERT INTO `admin_image` (`a_pic_id`, `u_email`, `pic`) VALUES
(1, 'admin@gmail.com', 'c4.jpg'),
(2, 'admin2@gmail.com', '1668406284m1.png');

-- --------------------------------------------------------

--
-- Table structure for table `com`
--

CREATE TABLE `com` (
  `com_id` int(11) NOT NULL,
  `c_user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `comments` text,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com`
--

INSERT INTO `com` (`com_id`, `c_user_id`, `p_id`, `comments`, `comment_time`) VALUES
(24, 31, 35, 'hi', '2023-02-06 05:16:13'),
(25, 42, 36, 'nice', '2023-02-06 04:32:19'),
(26, 31, 36, 'nice', '2023-02-07 08:38:37'),
(27, 31, 35, 'wooo...', '2023-05-09 07:39:25'),
(28, 27, 36, 'its nice', '2023-05-13 07:09:34'),
(29, 31, 37, 'woow looking good', '2023-05-15 04:01:54'),
(30, 31, 37, 'super\r\n', '2023-05-24 05:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `delete_user`
--

CREATE TABLE `delete_user` (
  `del_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `suggestion` text NOT NULL,
  `d_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `feedback_t` text NOT NULL,
  `date` datetime NOT NULL,
  `f_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `email`, `feedback_t`, `date`, `f_status`) VALUES
(1, 'raja', 'raja@gmail.com', 'good', '2023-02-06 06:33:37', 1),
(2, 'thaya', 'thaya@gmail.com', 'nice', '2023-02-06 06:38:00', 1),
(3, 'ranika sulakshi', 'gayu@gmail.com', 'nice work', '2023-05-15 04:02:24', 0),
(4, 'ranika sulakshi', 'gayu@gmail.com', 'ccccc', '2023-05-15 04:43:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `F_Id` int(11) NOT NULL,
  `f_user_id` int(11) NOT NULL,
  `frd_id` int(11) NOT NULL,
  `add_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`F_Id`, `f_user_id`, `frd_id`, `add_date`) VALUES
(11, 30, 29, '2023-02-05 11:22:01'),
(12, 31, 0, '2023-02-07 12:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 27, 31, 'nhgjm'),
(2, 31, 27, 'bgfhbfgh'),
(3, 31, 27, 'kjkh'),
(4, 27, 31, 'vfgfbhgf'),
(5, 27, 31, 'nhnhgn'),
(6, 27, 31, 'hii d '),
(7, 31, 27, 'sollu d'),
(12, 27, 31, ':(     ahh ok d ok '),
(13, 27, 31, 'hhh'),
(14, 27, 31, 'hhh'),
(15, 27, 31, 'hhh'),
(16, 27, 31, 'hi hhi nayanthara'),
(17, 38, 31, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `N_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `notif` varchar(20) NOT NULL,
  `N_date` datetime NOT NULL,
  `notif_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`N_id`, `user_id`, `res_id`, `notif`, `N_date`, `notif_status`) VALUES
(1, 29, 29, '0', '2023-01-05 01:30:18', 0),
(2, 29, 30, '0', '2023-01-09 21:56:10', 0),
(3, 29, 29, 'Friend Request', '2023-01-09 21:58:06', 0),
(4, 29, 29, 'Friend Request', '2023-01-09 22:11:32', 0),
(5, 29, 29, 'Friend Request', '2023-01-09 22:11:35', 0),
(6, 29, 29, 'Friend Request', '2023-01-11 20:32:42', 0),
(7, 29, 29, 'Comment', '2023-01-11 20:34:00', 0),
(8, 42, 27, 'Friend Request', '2023-02-06 10:00:05', 0),
(9, 42, 31, 'Comment', '2023-02-06 10:02:19', 0),
(10, 31, 27, 'Friend Request', '2023-02-06 15:13:52', 0),
(11, 31, 31, 'Friend Request', '2023-02-06 15:15:57', 0),
(12, 31, 27, 'Friend Request', '2023-02-07 08:33:04', 0),
(13, 31, 31, 'Friend Request', '2023-02-07 08:48:58', 0),
(14, 31, 31, 'Friend Request', '2023-02-07 13:01:29', 0),
(15, 31, 27, 'Friend Request', '2023-02-07 14:07:08', 0),
(16, 31, 31, 'Friend Request', '2023-02-07 14:07:13', 0),
(17, 31, 31, 'Comment', '2023-02-07 14:08:37', 0),
(18, 31, 31, 'Comment', '2023-05-09 07:39:25', 0),
(19, 27, 31, 'Comment', '2023-05-13 07:09:34', 0),
(20, 31, 31, 'Comment', '2023-05-15 04:01:54', 0),
(21, 31, 27, 'Friend Request', '2023-05-24 05:23:30', 0),
(22, 31, 31, 'Comment', '2023-05-24 05:24:37', 0),
(23, 31, 27, 'Friend Request', '2023-05-29 15:38:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_img` text NOT NULL,
  `post_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `like_count` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `post_img`, `post_text`, `created_at`, `like_count`, `comment`) VALUES
(35, 31, '1675660397326051-1024.jpg', '', '2023-02-06 05:13:17', 0, ''),
(36, 31, '16836180591669102725dance.png', 'hi guys\r\n', '2023-05-09 07:40:59', 0, ''),
(37, 31, '1683962572duck.jpg', 'it is my duck', '2023-05-13 07:22:52', 0, ''),
(39, 31, '1685354456n_C4vBfAV3O9RfkGjfduaZoxjAs.jpg', '', '2023-05-29 10:00:56', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `post_id` int(11) NOT NULL,
  `L_user_id` int(11) NOT NULL,
  `rating_action` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`post_id`, `L_user_id`, `rating_action`) VALUES
(1, 3, 'like'),
(24, 29, 'like'),
(36, 31, 'like'),
(35, 31, 'like'),
(37, 27, 'like'),
(36, 27, 'like'),
(35, 27, 'like'),
(37, 31, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `r_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `report_uid` int(11) NOT NULL,
  `r_email` varchar(50) NOT NULL,
  `report` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `r_date` datetime NOT NULL,
  `r_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`r_id`, `user_id`, `report_uid`, `r_email`, `report`, `post_id`, `r_date`, `r_status`) VALUES
(1, 27, 29, 'R@gmail.com', 'not bad', 30, '2023-02-06 09:11:46', 1),
(2, 0, 0, '', 'haaaaaaa', 0, '2023-02-07 12:04:54', 1),
(3, 0, 27, 'naya@gmail.com', '', 0, '2023-02-07 12:11:39', 1),
(4, 31, 27, 'naya@gmail.com', 'ftp', 0, '2023-02-07 12:15:31', 1),
(5, 31, 27, 'naya@gmail.com', 'fdgdf', 0, '2023-02-07 12:18:03', 1),
(6, 31, 27, 'naya@gmail.com', 'ghgfh', 0, '2023-02-07 12:21:32', 1),
(7, 31, 27, 'naya@gmail.com', 'fgfgf', 0, '2023-02-07 12:27:16', 1),
(8, 31, 31, 'gayu@gmail.com', 'ghghg', 0, '2023-02-07 12:36:38', 1),
(9, 31, 31, 'gayu@gmail.com', 'mbhjvhbm', 0, '2023-02-07 12:46:29', 1),
(10, 31, 31, 'gayu@gmail.com', 'ggvgvhgc', 0, '2023-02-07 12:48:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `r_id` int(11) NOT NULL,
  `Sender_acc` int(11) NOT NULL,
  `reseiver_acc` int(11) NOT NULL,
  `r_time` datetime NOT NULL,
  `r_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`r_id`, `Sender_acc`, `reseiver_acc`, `r_time`, `r_status`) VALUES
(48, 29, 0, '2022-12-25 18:06:08', 0),
(49, 29, 0, '2022-12-25 18:07:59', 0),
(50, 29, 0, '2022-12-25 18:12:05', 0),
(51, 29, 1, '2022-12-25 18:12:41', 0),
(52, 29, 0, '2022-12-25 18:16:15', 0),
(53, 29, 0, '2022-12-25 18:17:16', 0),
(54, 29, 29, '2022-12-25 18:17:23', 1),
(55, 29, 8, '2022-12-25 18:37:03', 0),
(56, 29, 27, '2022-12-25 18:37:30', 1),
(57, 29, 8, '2022-12-25 18:42:31', 0),
(58, 29, 8, '2022-12-26 06:54:15', 0),
(59, 29, 29, '2022-12-26 06:58:24', 1),
(60, 29, 29, '2022-12-26 06:58:47', 1),
(61, 29, 8, '2023-01-05 00:38:53', 0),
(62, 29, 27, '2023-01-05 00:54:05', 1),
(63, 29, 8, '2023-01-05 00:54:15', 0),
(65, 29, 30, '2023-01-09 21:56:10', 1),
(69, 29, 29, '2023-01-11 20:32:42', 0),
(70, 42, 27, '2023-02-06 10:00:05', 0),
(71, 31, 27, '2023-02-06 15:13:52', 0),
(72, 31, 27, '2023-02-07 08:33:04', 0),
(73, 31, 31, '2023-02-07 08:48:58', 1),
(74, 31, 27, '2023-02-07 14:07:08', 0),
(75, 31, 27, '2023-05-24 05:23:30', 0),
(76, 31, 27, '2023-05-29 15:38:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(5) NOT NULL,
  `stName` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `telNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `stName`, `address`, `sex`, `telNo`) VALUES
(1, 'Rajah', 'Batticaloa', 'male', '0771234567'),
(3, 'Rani', 'Batticaloa', 'female', '0771234567'),
(5, 'Tharz', 'Colombo', 'Male', '0987654321'),
(6, 'Aman', 'Kattankudy', 'Male', '0771982345'),
(7, 'Aman', 'Kattankudy', 'Male', '0753432167'),
(8, 'Aman', 'Kattankudy', 'Male', '0773425132'),
(9, 'Aman', 'Kattankudy', 'Male', '0773425132'),
(10, 'Suji', 'Arayampathy ', 'Female', '0775643214'),
(11, 'Sukry', 'Batticaloa', 'M', '0776082420'),
(12, 'Suji', 'Arayampathy ', 'Female', '0775643214'),
(13, 'Suji', 'Arayampathy ', 'Female', '0775643214'),
(14, 'Suji', 'Arayampathy ', 'Female', '0775643214'),
(15, 'tharz', 'Arayampathy ', 'Male', '0756644332'),
(16, 'tharz', 'Arayampathy ', 'Male', '0775643214'),
(17, 'tharz', 'Arayampathy ', 'Female', '0756644332'),
(18, 'tharz', 'Arayampathy ', 'Male', '077'),
(19, 'Christiya ', 'Batticaloa ', 'Female', '0778342102'),
(20, 'Christiya ', 'Batticaloa ', 'Female', '0778342102'),
(21, 'Summa', 'Summa', 'Summa', 'Summa'),
(22, 'Summa', 'Summa', 'Summa', 'Summa'),
(23, 'Keerthana', 'Batticalo ', 'Female', '0756998654'),
(24, 'Aman', 'Kattankudy', 'Male', '0773425132');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(7) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Birthday_Date` varchar(10) NOT NULL,
  `FB_Join_Date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `Name`, `Email`, `Password`, `Gender`, `Birthday_Date`, `FB_Join_Date`) VALUES
(27, 'nayan thara', 'naya@gmail.com', 'nayan123', 'Female', '2022-12-27', '2022-12-19 14:19:44'),
(31, 'ranika sulakshi', 'gayu@gmail.com', '12345678', 'Female', '1990-09-17', '2023-02-05 18:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_pic`
--

CREATE TABLE `user_profile_pic` (
  `profile_id` int(7) NOT NULL,
  `user_id` int(7) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile_pic`
--

INSERT INTO `user_profile_pic` (`profile_id`, `user_id`, `image`) VALUES
(24, 27, '1457b163a561eb4.jpg'),
(28, 31, '1668504133846406.png'),
(29, 34, 'images (1).jfif'),
(30, 36, 'images (13).jfif'),
(31, 37, 'images (12).jfif'),
(32, 38, 'images (2).jfif'),
(33, 39, 'n1U5gwBiwMo7s-fWOh2kSe3Kils.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wnadmin`
--

CREATE TABLE `wnadmin` (
  `a_id` int(11) NOT NULL,
  `F_Name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `a_address` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `ad_pw` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `admin_type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wnadmin`
--

INSERT INTO `wnadmin` (`a_id`, `F_Name`, `last_name`, `city`, `country`, `a_address`, `email`, `mobile`, `ad_pw`, `gender`, `dob`, `admin_type`) VALUES
(8, 'admin', 'admin', 'colombo1', 'srilanka1', 'colombo 5,srilanka.1', 'admin@gmail.com', '54545454', 'admin', 'Female', '2013-01-15', 'S'),
(13, 'admin2', 'admin2', 'Batticaloa', 'Sri Lanka', 'Main Street', ' admin2@gmail.com', ' 076075077', 'admin2', 'Male', '1999-12-11', 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_image`
--
ALTER TABLE `admin_image`
  ADD PRIMARY KEY (`a_pic_id`);

--
-- Indexes for table `com`
--
ALTER TABLE `com`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`F_Id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`N_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_profile_pic`
--
ALTER TABLE `user_profile_pic`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wnadmin`
--
ALTER TABLE `wnadmin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_image`
--
ALTER TABLE `admin_image`
  MODIFY `a_pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `com`
--
ALTER TABLE `com`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `F_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `N_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `user_profile_pic`
--
ALTER TABLE `user_profile_pic`
  MODIFY `profile_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `wnadmin`
--
ALTER TABLE `wnadmin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
