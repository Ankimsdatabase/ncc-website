-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2024 at 01:58 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `admin_email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `admin_pass` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'Admin Kumar', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cadet`
--

CREATE TABLE `cadet` (
  `regimental_no` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('pending','active','blocked') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cadet`
--

INSERT INTO `cadet` (`regimental_no`, `name`, `phone_number`, `email`, `photo`, `password`, `status`) VALUES
('12345', 'ahg', NULL, NULL, NULL, 'ahg', 'pending'),
('124AB', 'Ankit Bhattarai', '8451230125', 'ankita@gmail.com', NULL, '123456', 'pending'),
('255445', 'Ankit Chor', '6033092540', 'ankitchor@gmnail.com', 'cadets/2024/05/IMG-20240320-WA0012-1715847644.jpg', '123456', 'active'),
('ML21SDA104642', 'Rahul Sunar', '9774557278', 'rahul@gmail.com', 'cadets/2024/05/activity 1-1715855624.jpg', '123456', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `location` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `description`, `location`, `start_date`, `end_date`, `image`, `created_at`, `updated_at`) VALUES
(3, 'ek Bharat Shrest Bharat', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'goalpara', '2024-05-03', '2024-05-13', 'events/2024/05/edblazon_pic1-1715849465.jpg', '2024-05-14 00:04:06', '2024-05-16 08:51:05'),
(4, 'CATC CAMP', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'MH hospital, Shillong', '2024-12-03', '2024-12-13', 'events/2024/05/edblazon_pic1-1715849476.jpg', '2024-05-14 00:06:18', '2024-05-16 08:51:16'),
(5, 'event', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'shillong', '2024-05-12', '2024-05-12', 'events/2024/05/activity 2-1715849484.jpg', '2024-05-14 02:53:37', '2024-05-16 08:51:24'),
(6, 'blood Donation', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'shillong', '2024-06-03', '2024-06-03', 'events/2024/05/edblazon_pic1-1715849511.jpg', '2024-05-14 00:01:41', '2024-05-16 08:51:51'),
(7, 'All India shooting Camp as', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'kohima', '2024-05-13', '2024-05-30', 'events/2024/05/activity 1-1715849519.jpg', '2024-05-14 00:02:58', '2024-05-16 08:51:59'),
(8, 'Eek Bharat Shrest Bharat', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'goalpara', '2024-05-03', '2024-05-13', 'events/2024/05/nccrankceremony-1715849528.jpg', '2024-05-14 00:04:06', '2024-05-16 08:52:08'),
(9, 'CATC CAMP', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'MH hospital, Shillong', '2024-12-03', '2024-12-13', 'events/2024/05/edblazon_pic1-1715849537.jpg', '2024-05-14 00:06:18', '2024-05-16 08:52:17'),
(10, 'Event a', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'shillong', '2024-05-12', '2024-05-12', 'events/2024/05/edblazon_pic1-1715849547.jpg', '2024-05-14 02:53:37', '2024-05-16 08:52:27'),
(11, 'blood Donation 5555', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Shillong', '2024-06-03', '2024-06-03', 'events/2024/05/activity 1-1715849560.jpg', '2024-05-14 00:01:41', '2024-05-16 08:52:40'),
(12, 'All India shooting Camp', 'shooting camp, cadet good in firing are required.', 'kohima', '2024-05-13', '2024-05-30', 'events/2024/05/blood donation-1715849567.jpg', '2024-05-14 00:02:58', '2024-05-16 08:52:47'),
(13, 'ek Bharat Shrest Bharat blog', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'goalpara', '2024-05-03', '2024-05-13', 'events/2024/05/edblazon_pic1-1715849578.jpg', '2024-05-14 00:04:06', '2024-05-16 08:52:58'),
(14, 'CATC CAMP', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'MH hospital, Shillong', '2024-12-03', '2024-12-13', 'events/2024/05/nccrankceremony-1715849586.jpg', '2024-05-14 00:06:18', '2024-05-16 08:53:06'),
(15, 'Event', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'shillong', '2024-05-12', '2024-05-12', 'events/2024/05/WhatsApp Image 2024-05-13 at 20.21.20_41ec2be6-1715849595.jpg', '2024-05-14 02:53:37', '2024-05-16 08:53:15'),
(16, 'blood Donation', 'raqt daan jeevan daan', 'shillong', '2024-06-03', '2024-06-03', 'events/2024/05/edblazon_pic1-1715865837.jpg', '2024-05-14 00:01:41', '2024-05-16 13:23:57'),
(17, 'All India shooting Camp', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'kohima', '2024-05-13', '2024-05-30', 'events/2024/05/ncc-logo-1715849610.png', '2024-05-14 00:02:58', '2024-05-16 08:53:30'),
(18, 'ek Bharat Shrest Bharat', 'unity in diversity', 'goalpara', '2024-05-03', '2024-05-13', 'events/2024/05/activity 2-1715849614.jpg', '2024-05-14 00:04:06', '2024-05-16 08:53:34'),
(19, 'CATC CAMP', 'combine Annual Training Camp.', 'MH hospital, Shillong', '2024-12-03', '2024-12-13', 'events/2024/05/blood donation-1715849618.jpg', '2024-05-14 00:06:18', '2024-05-16 08:53:38'),
(20, 'event', 'event is good', 'shillong', '2024-05-12', '2024-05-12', 'events/2024/05/blood donation-1715861884.jpg', '2024-05-14 02:53:37', '2024-05-16 12:18:04'),
(21, 'blood Donation', 'raqt daan jeevan daan', 'shillong', '2024-06-03', '2024-06-03', 'events/2024/05/edblazon_pic1-1715849626.jpg', '2024-05-14 00:01:41', '2024-05-16 08:53:46'),
(22, 'All India shooting Camp', 'shooting camp, cadet good in firing are required.', 'kohima', '2024-05-13', '2024-05-30', 'events/2024/05/nccrankceremony-1715849631.jpg', '2024-05-14 00:02:58', '2024-05-16 08:53:51'),
(23, 'ek Bharat Shrest Bharat', 'unity in diversity', 'goalpara', '2024-05-03', '2024-05-13', 'events/2024/05/activity 3-1715849634.jpg', '2024-05-14 00:04:06', '2024-05-16 08:53:54'),
(24, 'CATC CAMP', 'combine Annual Training Camp.', 'MH hospital, Shillong', '2024-12-03', '2024-12-13', 'events/2024/05/activity 1-1715849638.jpg', '2024-05-14 00:06:18', '2024-05-16 08:53:58'),
(25, 'event', 'event is good', 'shillong', '2024-05-12', '2024-05-12', 'events/2024/05/edblazon_pic1-1715849643.jpg', '2024-05-14 02:53:37', '2024-05-16 08:54:03'),
(26, 'Event created by Ankit ', 'To check if there is a file uploaded is you need to check the size of the file.\r\n\r\nThen to check if its an image or not is you need to use the getimagesize() function. See my script below:', 'Barapathar', '2024-05-08', '2024-05-23', 'events/2024/05/nccrankceremony-1715855185.jpg', '2024-05-16 10:26:25', '2024-05-16 10:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `feedback_text` mediumtext NOT NULL,
  `regimental_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback_text`, `regimental_no`, `created_at`) VALUES
(8, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:18:57'),
(9, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:18:58'),
(10, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:18:58'),
(11, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:18:59'),
(12, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:18:59'),
(13, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:00'),
(14, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:00'),
(15, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:01'),
(16, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:01'),
(17, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:01'),
(18, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:02'),
(19, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:03'),
(20, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:03'),
(21, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:03'),
(22, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:04'),
(23, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:04'),
(24, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:05'),
(25, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:05'),
(26, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:05'),
(27, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:06'),
(28, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:06'),
(29, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:07'),
(30, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:07'),
(31, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'ML21SDA104642', '2024-05-16 11:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `testimony`
--

CREATE TABLE `testimony` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimony`
--

INSERT INTO `testimony` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Rynjah', 'I just wanted to share a quick note and let you know that you guys do a really good job. I\'m glad', 'testimonies/2024/05/blood donation-1715863767.jpg', '2024-05-16 12:40:37', '2024-05-16 12:49:27'),
(2, 'Rynjah', 'I just wanted to share a quick note and let you know that you guys do a really good job. I\'m glad	', 'testimonies/2024/05/edblazon_pic1-1715864533.jpg', '2024-05-16 13:02:13', '2024-05-16 13:02:13'),
(3, 'Bootstrap', 'As usual, we also snuck in some bug fixes to existing icons and ours docs. After this release, we’re back to focusing on shipping updates to Bootstrap v5 and v4. More on that soon, and in the mean time, enjoy the new icons!', 'testimonies/2024/05/activity 3-1715864555.jpg', '2024-05-16 13:02:35', '2024-05-16 13:02:35'),
(4, 'Tailwind', 'Since we added icon fonts in v1.2.0, it’s been possible to use a CDN to deliver and use Bootstrap Icons in seconds. Include the stylesheet, place short HTML snippets where you want icons, and you’re done! If you want to include it yourself, here’s how.', 'testimonies/2024/05/activity 1-1715864599.jpg', '2024-05-16 13:03:19', '2024-05-16 13:03:19'),
(5, 'Blood Donations', 'ProTip: Most browsers do not allow SVG sprites to be used across domains, which is why having icon fonts (when SVGs are the preferable and more accessible method of delivering icons) are so useful. Whenever possible, please use SVGs over icon fonts.', 'testimonies/2024/05/0ca706a82af29ac5c7e6801c3b7892b0-1715864664.jpg', '2024-05-16 13:04:24', '2024-05-16 13:04:24'),
(6, 'Event a', 'ProTip: Most browsers do not allow SVG sprites to be used across domains, which is why having icon fonts (when SVGs are the preferable and more accessible method of delivering icons) are so useful. Whenever possible, please use SVGs over icon fonts.', 'testimonies/2024/05/shillong group-1715864676.jpeg', '2024-05-16 13:04:36', '2024-05-16 13:04:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cadet`
--
ALTER TABLE `cadet`
  ADD PRIMARY KEY (`regimental_no`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regimental_no` (`regimental_no`);

--
-- Indexes for table `testimony`
--
ALTER TABLE `testimony`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `testimony`
--
ALTER TABLE `testimony`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`regimental_no`) REFERENCES `cadet` (`regimental_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
