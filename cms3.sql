-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 03:29 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms3`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 10, 'rana', 'gh@.com', 'nnnnnnnnnnnnnnnnnnnnnn', 'unapproved', '2019-07-04'),
(4, 13, 'dipa', 'bbn@h.con ', 'bbbbbbbbbbbb', 'unapproved', '2019-07-27'),
(5, 13, 'dipa', 'bbn@h.con ', 'bbbbbbbbbbbb', 'approved', '2019-07-27'),
(6, 13, 'ramu', 'er@gmail.com ', 'rrrrrrrrr', 'approved', '2019-07-27'),
(7, 13, 'dabu', 'er@gmail.com ', 'kkkkkkkkkk', 'unapproved', '2019-07-27'),
(8, 13, 'dabu', 'er@gmail.com ', 'kkkkkkkkkk', 'approved', '2019-07-27'),
(9, 10, 'arpa', 'a@gmail.com ', 'jjjjjjjj', 'unapproved', '2019-08-21'),
(10, 10, 'ami', 'hhny@gmail.com ', 'qqqqqqqq', 'approved', '2019-08-21'),
(11, 10, 'arpa', 'a@gmail.com ', 'joss', 'approved', '2019-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `nav_items`
--

CREATE TABLE `nav_items` (
  `nav_item_id` int(3) NOT NULL,
  `nav_item_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nav_items`
--

INSERT INTO `nav_items` (`nav_item_id`, `nav_item_title`) VALUES
(25, 'mysql'),
(26, 'python'),
(27, 'php'),
(28, 'java'),
(29, 'react.js'),
(30, 'laravel'),
(32, 'codenither'),
(33, 'mongodb');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_category` int(3) NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `post_tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_date`, `post_category`, `post_image`, `post_content`, `post_status`, `post_tags`) VALUES
(10, 'aaaaaa', '2026-07-19', 26, 'portfolio.jpg', 'aaaaaaaaaaaaaaaaa', 'published', 'aaaaaaaa'),
(11, 'eeeeeeee', '2021-08-19', 25, 'Screenshot_5.jpg', '            fffffffffff        mmmmmmm', 'draft', 'fffffffff'),
(12, 'aaaaaa', '2026-07-19', 31, 'Screenshot_4.jpg', 'hhhhhhhhhhhhh', 'published', 'ggggggg'),
(13, 'kkkkkkkk', '2021-08-19', 25, 'Screenshot_5.jpg', '            kkkkkkkkkk        ', 'published', 'kkkkkkk'),
(14, 'hhhhhhhhhh', '2021-08-19', 25, 'rrr.jpg', '      hhhhhhhh    ', 'published', 'hhhhhhh'),
(15, 'aaaaaa', '2001-08-19', 26, 'rrr.jpg', 'zzzzzzzzzzzzzzzzzzzzzz', 'draft', 'zzz'),
(17, 'ffffffffffffffghh', '2021-08-19', 25, 'Screenshot_4.jpg', '            hhhhhhhhhhhtg        ', 'published', ''),
(18, 'ghosh', '2021-08-19', 25, 'Screenshot_4.jpg', '            lllllllllll        bb', 'draft', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_date` date NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_fname`, `user_date`, `user_email`, `user_image`, `user_password`, `user_role`) VALUES
(7, 'admin', 'rana', '2019-08-02', 'fgg@gmail.com', '', 'admin', 'admin'),
(8, 'das', 'das', '2019-08-02', 'g@gmail.com', '', '111', 'subscriber'),
(9, 'admin', 'Rana', '2019-08-21', 'fgg@gmail.com', '', '000', 'subscriber'),
(10, 'rul', 'rul', '2019-08-03', 'a@gmail.comggggg', '', '555', 'admin'),
(11, 'adil', 'rrr', '2019-08-21', 'hagu@gmail.com', '', '222', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `nav_items`
--
ALTER TABLE `nav_items`
  ADD PRIMARY KEY (`nav_item_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nav_items`
--
ALTER TABLE `nav_items`
  MODIFY `nav_item_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
