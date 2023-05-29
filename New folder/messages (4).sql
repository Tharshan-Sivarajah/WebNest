-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 11:25 AM
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
(0, 31, 8, 'gghjghj'),
(1, 103262442, 551128424, 'hi'),
(2, 551128424, 103262442, 'gfg'),
(3, 551128424, 410076500, 'fgdgdg'),
(4, 103262442, 551128424, 'hiiiiiiiiiiiiiiii'),
(5, 410076500, 103262442, 'cfff'),
(6, 551128424, 103262442, 'vfdfd'),
(7, 410076500, 551128424, 'vvcb'),
(8, 551128424, 103262442, 'heyyyyyyyyyyyyyyy'),
(9, 103262442, 551128424, 'jjjjjjjjjj'),
(10, 103262442, 551128424, 'hyyjy'),
(11, 551128424, 103262442, 'gf'),
(12, 551128424, 103262442, 'Hi I''m Thamya'),
(13, 103262442, 551128424, 'bghhg'),
(14, 103262442, 551128424, 'ranveer'),
(15, 551128424, 103262442, 'vfg'),
(16, 103262442, 551128424, 'fgfg'),
(17, 551128424, 103262442, 'iuiui'),
(18, 103262442, 551128424, 'hjjh'),
(19, 103262442, 551128424, 'heeeeeeeeeeeeeeeeeeeeeeeeee'),
(20, 551128424, 194372296, 'ujkyuk'),
(21, 194372296, 551128424, 'dfcdv'),
(22, 194372296, 103262442, 'gggggggggggggg'),
(23, 103262442, 194372296, 'aaaaaaaaaaaa'),
(24, 103262442, 194372296, 'cxc'),
(25, 194372296, 103262442, 'gv'),
(26, 194372296, 103262442, 'f'),
(27, 194372296, 103262442, 'f'),
(28, 194372296, 103262442, 'kkkkkkkkkkkkkkkkkkkkkkkkk'),
(29, 194372296, 103262442, 'ggfd'),
(30, 194372296, 103262442, 'gfg'),
(31, 194372296, 103262442, 'gfgfff'),
(32, 194372296, 103262442, 'cfbvb'),
(33, 194372296, 103262442, 'aaaaaaaaaaaaaaaaaaaaaaaaaa'),
(34, 194372296, 103262442, 'qqqqqqqqqqqqqqqqqqqqq'),
(35, 194372296, 103262442, 'gfhfh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
