-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 08:53 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estates`
--

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cladding_level` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sold` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `area`, `user_id`, `rooms`, `floor`, `address`, `cladding_level`, `price`, `sold`) VALUES
(61, 111, 21, 333, 33, 'port huron', 3333, 4444, 1),
(62, 111, 21, 333, 33, 'port huron', 3333, 4444, 0),
(63, 111, 21, 333, 33, 'port huron', 232323, 4444, 0),
(64, 111, 21, 333, 33, 'port huron', 3333, 4444, 0);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `house` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `house`) VALUES
(15, 'WhatsApp Image 2021-04-22 at 14.58.18.jpeg', 61),
(16, 'WhatsApp Image 2021-04-22 at 14.58.22.jpeg', 61),
(17, 'WhatsApp Image 2021-04-22 at 14.58.24.jpeg', 61),
(18, 'WhatsApp Image 2021-04-22 at 14.58.24.jpeg', 62),
(19, 'WhatsApp Image 2021-04-22 at 14.58.18.jpeg', 63),
(20, 'WhatsApp Image 2021-04-22 at 14.58.22.jpeg', 63),
(21, 'WhatsApp Image 2021-04-22 at 14.58.24.jpeg', 63),
(22, 'WhatsApp Image 2021-04-22 at 14.58.18.jpeg', 64);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `username` varchar(50) NOT NULL,
  `secure` varchar(255) NOT NULL,
  `skills` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `username`, `secure`, `skills`, `phone`, `address`, `facebook`, `instagram`, `twitter`, `linkedin`) VALUES
(21, 'test', 'test@gmail.com', '$2y$10$wA9zzeejfM8pmXcyUm6YVOf3ceMKh0PFs9I6VYRjzPLdICJH4Mjve', '2021-01-16 15:47:37', 'test', '', 'no skills', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_fk` (`house`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `house_fk` FOREIGN KEY (`house`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
