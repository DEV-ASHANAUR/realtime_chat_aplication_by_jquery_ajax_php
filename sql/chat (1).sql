-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 07:34 PM
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
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `status`, `created_at`) VALUES
(1, 1, 2, 'Hi Ashanur...', 0, '2020-04-22 18:52:05'),
(2, 1, 2, 'How Are you\n', 0, '2020-04-22 18:52:47'),
(3, 1, 2, 'hgh', 0, '2020-04-22 18:53:33'),
(4, 1, 2, 'hello', 0, '2020-04-22 19:37:51'),
(5, 1, 2, 'ki khobor', 0, '2020-04-22 19:38:16'),
(6, 1, 2, 'vlo achis', 0, '2020-04-22 19:38:35'),
(7, 2, 1, 'hmm Vlo aci', 0, '2020-04-22 19:39:16'),
(8, 1, 2, 'kire', 0, '2020-04-22 19:48:57'),
(9, 2, 1, 'hmm', 0, '2020-04-22 19:49:11'),
(10, 1, 2, 'ki koros', 0, '2020-04-22 19:49:19'),
(11, 2, 1, 'bose aci', 0, '2020-04-22 19:49:56'),
(12, 1, 2, 'kire', 0, '2020-04-22 20:22:17'),
(13, 1, 2, 'ki obosta', 0, '2020-04-22 20:24:57'),
(14, 2, 1, 'alhamdulilah vlo', 0, '2020-04-22 20:25:51'),
(15, 1, 2, 'kihh', 0, '2020-04-22 20:26:16'),
(16, 1, 2, 'svcxvcx', 0, '2020-04-22 20:28:55'),
(17, 2, 1, 'vccv', 0, '2020-04-22 20:29:37'),
(18, 2, 1, 'gfcbcvbv', 0, '2020-04-22 20:30:00'),
(19, 2, 1, 'dfcvd', 0, '2020-04-22 20:30:11'),
(20, 2, 1, 'wsvxcvderfxvv', 0, '2020-04-22 20:30:21'),
(21, 1, 2, 'jufhsdfbjrd', 0, '2020-04-22 20:30:45'),
(22, 1, 2, 'skdjfsj', 0, '2020-04-22 20:30:52'),
(23, 1, 2, 'sdfsdfdf', 0, '2020-04-22 20:31:05'),
(24, 1, 2, 'sfdsfds', 0, '2020-04-22 20:31:14'),
(25, 1, 2, 'sfsdf', 0, '2020-04-22 20:31:28'),
(26, 2, 1, 'ergdfdf', 0, '2020-04-22 20:32:27'),
(27, 2, 1, 'sddvdcv', 0, '2020-04-22 20:32:45'),
(28, 2, 1, 'sdscxzcdcsd', 0, '2020-04-22 20:33:03'),
(29, 3, 2, 'Kire Nasim', 0, '2020-04-22 20:33:51'),
(30, 3, 2, 'Ki obosta..', 0, '2020-04-22 20:34:06'),
(31, 2, 3, 'Alhamdulilah vlo.\n', 0, '2020-04-22 20:34:32'),
(32, 2, 3, 'ki obosta', 0, '2020-04-22 21:24:46'),
(33, 2, 3, 'vlo achis', 0, '2020-04-22 21:25:10'),
(34, 3, 2, 'fhvn', 0, '2020-04-22 21:25:31'),
(35, 3, 2, 'fhgbh', 0, '2020-04-22 21:25:56'),
(36, 1, 3, 'ki obosta', 0, '2020-04-22 21:27:03'),
(37, 1, 3, 'kire kichu bol..', 0, '2020-04-22 21:27:45'),
(38, 1, 3, 'dur', 0, '2020-04-22 21:28:12'),
(39, 3, 1, 'hmm\n', 0, '2020-04-22 21:28:52'),
(40, 3, 2, 'erhdjf', 0, '2020-04-23 07:04:43'),
(41, 4, 2, 'ssdgfdgðŸ˜ƒðŸ˜ƒ', 0, '2020-04-23 07:18:42'),
(42, 1, 2, 'hmmðŸ˜ƒðŸ˜ƒ', 0, '2020-04-23 07:22:21'),
(43, 2, 3, 'ðŸ˜‹ðŸ˜‹ ki\n', 0, '2020-04-23 07:23:44'),
(44, 3, 2, 'hghgujðŸ˜‡ðŸ˜‡', 0, '2020-04-23 07:24:09'),
(45, 2, 3, 'yfhbðŸ˜‹ðŸ˜‹\n', 0, '2020-04-23 07:24:43'),
(46, 2, 1, 'Alhamdulilahâ¤ï¸â¤ï¸', 0, '2020-04-23 07:32:30'),
(47, 3, 1, 'ki obostaðŸ˜‰', 0, '2020-04-23 08:05:25'),
(48, 3, 1, 'kdaskdfkdðŸ˜ðŸ˜', 0, '2020-04-23 08:44:31'),
(49, 3, 1, 'dgdfgdfðŸ˜ðŸ˜', 0, '2020-04-23 08:45:43'),
(50, 1, 3, 'hmmðŸ˜ðŸ˜', 0, '2020-04-23 08:46:17'),
(51, 3, 2, 'kire\n\n', 0, '2020-04-23 10:06:07'),
(52, 3, 2, 'gfh', 0, '2020-04-23 10:09:45'),
(53, 3, 2, 'fdsfsd', 0, '2020-04-23 10:10:27'),
(54, 3, 2, 'dsfsdf', 0, '2020-04-23 10:10:42'),
(55, 2, 3, 'fdsff', 0, '2020-04-23 10:36:37'),
(56, 2, 3, 'ssdfsdfd', 0, '2020-04-23 10:37:59'),
(57, 2, 3, 'sdgsdfsd', 0, '2020-04-23 10:38:36'),
(58, 3, 2, 'sdjjdc', 0, '2020-04-23 10:46:31'),
(59, 3, 2, 'hdsfndðŸ˜‰ðŸ˜‰', 0, '2020-04-23 10:46:47'),
(60, 2, 3, 'jefndjsfddsvxv', 0, '2020-04-23 10:47:05'),
(61, 3, 2, 'jcmc', 0, '2020-04-23 10:47:31'),
(62, 3, 2, 'kjfksd', 0, '2020-04-23 10:50:01'),
(63, 2, 3, 'hgjhj', 0, '2020-04-23 10:54:19'),
(64, 2, 3, 'jiekfksd', 0, '2020-04-23 10:54:43'),
(65, 2, 3, 'dsfssdfs', 0, '2020-04-23 10:54:47'),
(66, 1, 2, 'sdgdfg', 0, '2020-04-23 11:00:06'),
(67, 2, 1, 'dxvxc', 0, '2020-04-23 11:03:12'),
(68, 1, 2, 'helloðŸ˜†ðŸ˜†', 0, '2020-04-23 11:09:03'),
(69, 1, 2, 'hh', 0, '2020-04-23 11:18:12'),
(70, 1, 2, 'hh', 0, '2020-04-23 11:18:17'),
(71, 1, 2, 'hhj', 0, '2020-04-23 11:18:53'),
(72, 1, 2, 'hh', 0, '2020-04-23 11:18:58'),
(73, 1, 2, 'ðŸ˜‰ðŸ˜‰ðŸ˜‰ðŸ˜‰', 0, '2020-04-23 11:19:07'),
(74, 2, 1, 'gghh', 0, '2020-04-23 11:19:31'),
(75, 4, 1, 'hiðŸ˜ðŸ˜', 0, '2020-04-28 09:40:27'),
(76, 1, 4, 'HelloðŸ˜‹ðŸ˜‹', 0, '2020-04-28 09:41:23'),
(82, 2, 1, 'dskjvcnncx,nxcmnvcvbxbczm', 0, '2020-04-28 10:14:33'),
(83, 2, 1, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam', 0, '2020-04-28 10:17:52'),
(84, 1, 2, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam', 0, '2020-04-28 10:24:55'),
(85, 2, 1, ' inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam', 0, '2020-04-28 10:31:17'),
(86, 2, 1, 'helloâ¤ï¸â¤ï¸â¤ï¸', 0, '2020-04-28 10:43:44'),
(87, 2, 1, 'sgvdfgdfvcx', 0, '2020-04-28 10:49:48'),
(88, 2, 1, 'dgdfhf', 0, '2020-04-28 10:49:57'),
(89, 2, 1, 'helloâ¤ï¸â¤ï¸â¤ï¸', 0, '2020-04-28 10:59:24'),
(90, 1, 2, 'hiðŸ˜€ðŸ˜€', 0, '2020-04-28 10:59:54'),
(91, 4, 2, 'Kire', 1, '2020-05-01 11:40:39'),
(92, 4, 2, 'kire\nðŸ˜ðŸ˜ðŸ˜\n', 1, '2020-05-01 12:08:00'),
(93, 3, 1, 'â¤ðŸ˜ gd job', 0, '2020-05-01 21:06:19'),
(94, 2, 1, 'kire', 1, '2020-05-02 17:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_photo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `user_photo`, `password`, `created_at`) VALUES
(1, 'Md.Ashanur Rahman', '1588367106.png', 'admin', '2020-04-20 18:35:28'),
(2, 'Md.Nasim', '1588413993.png', 'admin', '2020-04-20 18:35:28'),
(3, 'Md.Rasel', '1588409528.png', 'admin', '2020-04-20 18:36:11'),
(4, 'Gm.Zesan', '1588409696.png', 'admin', '2020-04-20 18:36:11'),
(5, 'Md.akash', '', 'admin', '2020-05-02 10:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 1, '2020-04-20 19:14:51', 'no'),
(2, 1, '2020-04-20 19:26:30', 'no'),
(3, 1, '2020-04-20 19:44:50', 'no'),
(4, 4, '2020-04-20 19:45:09', 'no'),
(5, 1, '2020-04-20 19:50:51', 'no'),
(6, 1, '2020-04-20 19:51:27', 'no'),
(7, 1, '2020-04-20 20:13:12', 'no'),
(8, 4, '2020-04-20 20:16:29', 'no'),
(9, 1, '2020-04-21 11:12:47', 'no'),
(10, 4, '2020-04-21 11:12:44', 'no'),
(11, 3, '2020-04-21 11:10:48', 'no'),
(12, 3, '2020-04-21 11:11:30', 'no'),
(13, 2, '2020-04-21 16:51:56', 'no'),
(14, 3, '2020-04-21 19:24:24', 'no'),
(15, 2, '2020-04-21 20:11:32', 'no'),
(16, 1, '2020-04-21 19:29:55', 'no'),
(17, 1, '2020-04-21 19:58:51', 'no'),
(18, 1, '2020-04-21 20:11:28', 'no'),
(19, 1, '2020-04-21 20:20:13', 'no'),
(20, 2, '2020-04-21 20:20:14', 'no'),
(21, 2, '2020-04-22 19:07:53', 'no'),
(22, 3, '2020-04-22 17:16:11', 'no'),
(23, 2, '2020-04-22 19:08:37', 'no'),
(24, 2, '2020-04-22 21:27:14', 'no'),
(25, 1, '2020-04-22 20:33:26', 'no'),
(26, 3, '2020-04-22 21:26:04', 'no'),
(27, 3, '2020-04-22 21:29:51', 'no'),
(28, 1, '2020-04-22 21:32:42', 'no'),
(29, 2, '2020-04-23 06:57:58', 'no'),
(30, 2, '2020-04-23 07:26:09', 'no'),
(31, 3, '2020-04-23 07:26:03', 'no'),
(32, 1, '2020-04-23 07:31:37', 'no'),
(33, 1, '2020-04-23 08:46:47', 'no'),
(34, 3, '2020-04-23 08:46:45', 'no'),
(35, 3, '2020-04-23 10:55:01', 'no'),
(36, 2, '2020-04-23 11:19:36', 'no'),
(37, 1, '2020-04-23 11:19:41', 'no'),
(38, 2, '2020-04-24 10:57:46', 'no'),
(39, 1, '2020-04-28 11:00:38', 'no'),
(40, 4, '2020-04-28 09:54:34', 'no'),
(41, 2, '2020-04-28 11:00:47', 'no'),
(42, 1, '2020-05-01 10:56:13', 'no'),
(43, 2, '2020-05-01 12:10:33', 'no'),
(44, 2, '2020-05-01 21:03:04', 'no'),
(45, 3, '2020-05-01 21:08:20', 'no'),
(46, 1, '2020-05-01 21:11:34', 'no'),
(47, 1, '2020-05-02 08:48:07', 'no'),
(48, 3, '2020-05-02 08:53:31', 'no'),
(49, 4, '2020-05-02 08:54:56', 'no'),
(50, 1, '2020-05-02 10:04:29', 'no'),
(51, 2, '2020-05-02 10:08:30', 'no'),
(52, 5, '2020-05-02 10:56:38', 'no'),
(53, 1, '2020-05-02 17:34:31', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
