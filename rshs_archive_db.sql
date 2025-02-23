-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2025 at 04:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rshs_archive_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_items`
--

CREATE TABLE `borrowed_items` (
  `b_item_id` int(11) NOT NULL,
  `lrn_or_email` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date_borrowed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_equipments`
--

CREATE TABLE `lab_equipments` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `uploader` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `file_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `temp_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `item_status` varchar(255) NOT NULL,
  `total_available` int(11) NOT NULL,
  `is_archived` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `lrn_or_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `grade_level` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `is_archived` int(11) NOT NULL,
  `access_level` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `lrn_or_email`, `user_name`, `user_gender`, `grade_level`, `user_password`, `is_archived`, `access_level`) VALUES
(91, 'annedreaorca@gmail.com', 'Andrea Anne Orca', 'Female', 'Grade 12', '$2y$10$/pHdm8hVaF/6/D7sSwvI6OeRNpESehH/P7TJo86mq4qCxcjtk3i7S', 0, 2),
(92, 'cjapaycuya16@gmail.com', 'Christian Jay Cuya', 'Male', '', '$2y$10$4D4I/WETS.JCAugvh/OyeOe5MqdNRP8qS4mwfWNg4qSHft91FaZoS', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowed_items`
--
ALTER TABLE `borrowed_items`
  ADD PRIMARY KEY (`b_item_id`);

--
-- Indexes for table `lab_equipments`
--
ALTER TABLE `lab_equipments`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `student_id` (`lrn_or_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowed_items`
--
ALTER TABLE `borrowed_items`
  MODIFY `b_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lab_equipments`
--
ALTER TABLE `lab_equipments`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
