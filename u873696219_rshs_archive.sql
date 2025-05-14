-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 13, 2025 at 09:37 PM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u873696219_rshs_archive`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowed_admins`
--

CREATE TABLE `allowed_admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allowed_admins`
--

INSERT INTO `allowed_admins` (`id`, `email`) VALUES
(11, '202110045@gordoncollege.edu.ph'),
(10, '202110064@gordoncollege.edu.ph'),
(12, '202110209@gordoncollege.edu.ph'),
(4, 'aguilarlyorhick@gmail.com'),
(3, 'andradejp182@gmail.com'),
(7, 'austinjames.dilioc20@gmail.com'),
(9, 'balmoresxander@gmail.com'),
(2, 'chrissuyom235@gmail.com'),
(8, 'fpsmallari@gmail.com'),
(6, 'jrucho.19@gmail.com'),
(5, 'kresiadeyabastillas@gmail.com'),
(1, 'nuhjnalrobanal@gmail.com ');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_items`
--

CREATE TABLE `borrowed_items` (
  `b_item_id` int(11) NOT NULL,
  `lrn_or_email` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date_borrowed` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `date_approved` datetime DEFAULT NULL,
  `date_rejected` datetime DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `date_returned` timestamp NULL DEFAULT NULL,
  `return_image` varchar(255) DEFAULT NULL,
  `return_request` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowed_items`
--

INSERT INTO `borrowed_items` (`b_item_id`, `lrn_or_email`, `item_id`, `date_borrowed`, `status`, `date_approved`, `date_rejected`, `quantity`, `date_returned`, `return_image`, `return_request`) VALUES
(1, 'annedreaorca@gmail.com', 1, '2025-02-25 11:16:30', 'Returned', '2025-02-25 11:17:00', NULL, 1, '2025-02-25 03:37:38', NULL, NULL),
(2, 'annedreaorca@gmail.com', 2, '2025-02-25 11:42:02', 'Returned', '2025-02-25 11:42:49', NULL, 2, '2025-02-25 11:43:01', NULL, NULL),
(3, 'annedreaorca@gmail.com', 1, '2025-02-25 12:01:48', 'Returned', '2025-02-25 12:02:05', NULL, 1, '2025-02-25 13:30:58', NULL, NULL),
(4, '104572130023@r3-2.deped.gov.ph', 8, '2025-02-25 14:01:23', 'Returned', '2025-02-25 14:01:43', NULL, 2, '2025-02-25 14:02:00', NULL, NULL),
(5, '202110890@gordoncollege.edu.ph', 2, '2025-02-26 18:28:22', 'Rejected', NULL, '2025-02-26 18:29:27', 1, NULL, NULL, NULL),
(6, 'annedreaorca@gmail.com', 1, '2025-02-27 12:05:33', 'Returned', '2025-02-27 12:06:31', NULL, 1, '2025-02-27 12:14:19', NULL, NULL),
(7, 'annedreaorca@gmail.com', 1, '2025-02-27 12:34:15', 'Returned', '2025-02-27 12:34:23', NULL, 1, '2025-02-27 12:34:50', '1740630890_Stafify HRIS Flowchart for Basic End-User Accounts.png', NULL),
(8, 'annedreaorca@gmail.com', 1, '2025-02-27 12:55:39', 'Returned', '2025-02-27 12:55:51', NULL, 1, '2025-02-27 12:56:32', '1740632192_Stafify HRIS Flowchart for Creator Accounts.png', NULL),
(9, 'annedreaorca@gmail.com', 2, '2025-02-27 13:14:02', 'Returned', '2025-02-27 13:14:08', NULL, 1, '2025-02-27 13:15:09', '1740633261_Stafify HRIS Flowchart for Client Accounts.png', NULL),
(10, 'annedreaorca@gmail.com', 2, '2025-02-27 13:22:05', 'Rejected Return', '2025-02-27 13:22:13', NULL, 1, NULL, '1740633755_Stafify HRIS Flowchart for Basic End-User Accounts.png', NULL),
(11, 'annedreaorca@gmail.com', 1, '2025-02-27 13:26:24', 'Rejected Return', '2025-02-27 13:26:33', NULL, 1, NULL, '1740634009_Stafify HRIS Flowchart for Creator Accounts.png', '2025-02-27 13:26:49'),
(12, 'annedreaorca@gmail.com', 1, '2025-02-27 13:32:59', 'Returned', '2025-02-27 13:33:05', NULL, 1, '2025-02-27 13:33:48', '1740634413_Stafify HRIS Flowchart for Basic End-User Accounts.png', '2025-02-27 13:33:33'),
(13, 'annedreaorca@gmail.com', 2, '2025-02-27 13:36:47', 'Returned', '2025-02-27 13:36:52', NULL, 2, '2025-02-27 13:37:20', '1740634626_Stafify HRIS Flowchart for Client Accounts.png', '2025-02-27 13:37:06'),
(14, 'annedreaorca@gmail.com', 1, '2025-03-10 10:40:27', 'Rejected', NULL, '2025-03-26 13:48:50', 1, NULL, NULL, NULL),
(15, 'kuma.kuma.1071@gmail.com', 239, '2025-03-19 07:38:31', 'Returned', '2025-03-19 07:38:49', NULL, 1, '2025-03-19 07:39:58', '1742341161_cinna.jpg', '2025-03-19 07:39:21'),
(16, 'kuma.kuma.1071@gmail.com', 2, '2025-03-19 07:49:40', 'Rejected', NULL, '2025-03-26 13:48:53', 1, NULL, NULL, NULL),
(17, 'kuma.kuma.1071@gmail.com', 62, '2025-03-19 09:45:12', 'Rejected Return', '2025-03-19 09:46:55', NULL, 1, NULL, '1742349540_mui.jpg', '2025-03-19 09:59:00'),
(18, 'kuma.kuma.1071@gmail.com', 1, '2025-03-19 09:55:21', 'Returned', '2025-03-19 09:55:36', NULL, 7, '2025-03-19 09:58:19', '1742349411_chocky.jpg', '2025-03-19 09:56:51'),
(19, 'itsviktor777@gmail.com', 10, '2025-03-20 15:48:32', 'Rejected', NULL, '2025-03-26 13:48:55', 2, NULL, NULL, NULL),
(20, '107139120157@r3-2.gov.ph', 54, '2025-03-20 15:49:04', 'Rejected', NULL, '2025-03-26 13:48:57', 1, NULL, NULL, NULL),
(21, 'itsviktor777@gmail.com', 54, '2025-03-20 16:02:11', 'Rejected', NULL, '2025-03-26 13:48:59', 1, NULL, NULL, NULL),
(22, '420511150021@r3-2.deped.gov.ph', 54, '2025-03-20 16:02:12', 'Rejected', NULL, '2025-03-26 13:49:02', 1, NULL, NULL, NULL),
(23, 'itsviktor777@gmail.com', 54, '2025-03-20 16:02:31', 'Rejected', NULL, '2025-03-26 13:49:04', 1, NULL, NULL, NULL),
(24, '401381150346@r3-2.deped.gov.ph', 54, '2025-03-20 16:02:37', 'Rejected', NULL, '2025-03-26 13:49:06', 1, NULL, NULL, NULL),
(25, '401381150346@r3-2.deped.gov.ph', 54, '2025-03-20 16:02:37', 'Rejected', NULL, '2025-03-26 13:49:13', 1, NULL, NULL, NULL),
(26, '401381150346@r3-2.deped.gov.ph', 54, '2025-03-20 16:02:37', 'Rejected', NULL, '2025-03-26 13:49:16', 1, NULL, NULL, NULL),
(27, '401381150346@r3-2.deped.gov.ph', 54, '2025-03-20 16:02:37', 'Rejected', NULL, '2025-03-26 13:49:20', 1, NULL, NULL, NULL),
(28, 'argelroshe.cerezo.rshs3@gmail.com', 54, '2025-03-20 16:02:49', 'Rejected', NULL, '2025-03-26 13:49:22', 1, NULL, NULL, NULL),
(29, '420511150021@r3-2.deped.gov.ph', 41, '2025-03-20 16:03:12', 'Rejected', NULL, '2025-03-26 13:49:30', 1, NULL, NULL, NULL),
(30, '107139120157@r3-2.gov.ph', 41, '2025-03-20 16:03:17', 'Rejected', NULL, '2025-03-26 13:49:33', 1, NULL, NULL, NULL),
(31, 'itsviktor777@gmail.com', 41, '2025-03-20 16:03:18', 'Rejected', NULL, '2025-03-26 13:49:35', 1, NULL, NULL, NULL),
(32, '401381150346@r3-2.deped.gov.ph', 41, '2025-03-20 16:03:19', 'Rejected', NULL, '2025-03-26 13:49:40', 1, NULL, NULL, NULL),
(33, 'itsviktor777@gmail.com', 10, '2025-03-20 16:03:54', 'Rejected', NULL, '2025-03-26 13:49:44', 2, NULL, NULL, NULL),
(34, '401381150346@r3-2.deped.gov.ph', 10, '2025-03-20 16:03:57', 'Rejected', NULL, '2025-03-26 13:49:48', 1, NULL, NULL, NULL),
(35, '420511150021@r3-2.deped.gov.ph', 10, '2025-03-20 16:03:57', 'Rejected', NULL, '2025-03-26 13:49:58', 1, NULL, NULL, NULL),
(36, 'itsviktor777@gmail.com', 17, '2025-03-20 16:05:06', 'Rejected', NULL, '2025-03-26 13:51:02', 2, NULL, NULL, NULL),
(37, '107139120157@r3-2.gov.ph', 17, '2025-03-20 16:06:45', 'Rejected', NULL, '2025-03-26 13:51:04', 1, NULL, NULL, NULL),
(38, '420511150021@r3-2.deped.gov.ph', 17, '2025-03-20 16:06:47', 'Rejected', NULL, '2025-03-26 13:51:06', 1, NULL, NULL, NULL),
(39, 'balmoresxander@gmail.com', 17, '2025-03-20 16:06:47', 'Rejected', NULL, '2025-03-26 13:51:08', 1, NULL, NULL, NULL),
(40, '401381150346@r3-2.deped.gov.ph', 17, '2025-03-20 16:06:48', 'Rejected', NULL, '2025-03-26 13:51:15', 2, NULL, NULL, NULL),
(41, '401381150346@r3-2.deped.gov.ph', 17, '2025-03-20 16:06:48', 'Rejected', NULL, '2025-03-26 13:51:17', 2, NULL, NULL, NULL),
(42, '401381150346@r3-2.deped.gov.ph', 17, '2025-03-20 16:06:49', 'Rejected', NULL, '2025-03-26 13:51:19', 2, NULL, NULL, NULL),
(43, '401381150346@r3-2.deped.gov.ph', 17, '2025-03-20 16:06:49', 'Rejected', NULL, '2025-03-26 13:51:22', 2, NULL, NULL, NULL),
(44, '401381150346@r3-2.deped.gov.ph', 17, '2025-03-20 16:06:49', 'Rejected', NULL, '2025-03-26 13:51:25', 2, NULL, NULL, NULL),
(45, '401381150346@r3-2.deped.gov.ph', 17, '2025-03-20 16:06:49', 'Rejected', NULL, '2025-03-26 13:51:27', 2, NULL, NULL, NULL),
(46, '401381150346@r3-2.deped.gov.ph', 17, '2025-03-20 16:06:49', 'Rejected', NULL, '2025-03-26 13:51:32', 2, NULL, NULL, NULL),
(47, '401381150346@r3-2.deped.gov.ph', 17, '2025-03-20 16:06:50', 'Rejected', NULL, '2025-03-26 13:51:34', 2, NULL, NULL, NULL),
(48, '401381150346@r3-2.deped.gov.ph', 17, '2025-03-20 16:06:50', 'Rejected', NULL, '2025-03-26 13:51:36', 2, NULL, NULL, NULL),
(49, '401381150346@r3-2.deped.gov.ph', 17, '2025-03-20 16:06:50', 'Rejected', NULL, '2025-03-26 13:51:42', 2, NULL, NULL, NULL),
(50, 'balmoresxander@gmail.com', 17, '2025-03-20 16:06:56', 'Rejected', NULL, '2025-03-26 13:51:44', 1, NULL, NULL, NULL),
(51, 'argelroshe.cerezo.rshs3@gmail.com', 17, '2025-03-20 16:07:01', 'Rejected', NULL, '2025-03-26 13:58:43', 1, NULL, NULL, NULL),
(52, 'itsviktor777@gmail.com', 140, '2025-03-20 16:08:07', 'Rejected', NULL, '2025-03-26 13:58:46', 1, NULL, NULL, NULL),
(53, 'argelroshe.cerezo.rshs3@gmail.com', 18, '2025-03-20 16:09:15', 'Rejected', NULL, '2025-03-26 13:58:49', 1, NULL, NULL, NULL),
(54, '420511150021@r3-2.deped.gov.ph', 18, '2025-03-20 16:09:17', 'Rejected', NULL, '2025-03-26 13:58:52', 1, NULL, NULL, NULL),
(55, 'itsviktor777@gmail.com', 18, '2025-03-20 16:09:19', 'Rejected', NULL, '2025-03-26 13:58:54', 1, NULL, NULL, NULL),
(56, '107139120157@r3-2.gov.ph', 18, '2025-03-20 16:09:20', 'Rejected', NULL, '2025-03-26 13:58:57', 1, NULL, NULL, NULL),
(57, '401381150346@r3-2.deped.gov.ph', 83, '2025-03-20 16:09:59', 'Rejected', NULL, '2025-03-26 13:59:01', 1, NULL, NULL, NULL),
(58, '401381150346@r3-2.deped.gov.ph', 83, '2025-03-20 16:09:59', 'Rejected', NULL, '2025-03-26 13:59:04', 1, NULL, NULL, NULL),
(59, '401381150346@r3-2.deped.gov.ph', 197, '2025-03-20 16:10:30', 'Rejected', NULL, '2025-03-26 13:59:09', 1, NULL, NULL, NULL),
(60, '420511150021@r3-2.deped.gov.ph', 197, '2025-03-20 16:10:32', 'Rejected', NULL, '2025-03-26 13:59:12', 1, NULL, NULL, NULL),
(61, '107139120157@r3-2.gov.ph', 154, '2025-03-20 16:11:20', 'Rejected', NULL, '2025-03-26 13:59:15', 1, NULL, NULL, NULL),
(62, '401381150346@r3-2.deped.gov.ph', 154, '2025-03-20 16:11:21', 'Rejected', NULL, '2025-03-26 13:59:19', 1, NULL, NULL, NULL),
(63, '420511150021@r3-2.deped.gov.ph', 138, '2025-03-20 16:11:59', 'Rejected', NULL, '2025-03-26 13:59:26', 1, NULL, NULL, NULL),
(64, 'itsviktor777@gmail.com', 138, '2025-03-20 16:12:00', 'Rejected', NULL, '2025-03-26 13:59:29', 1, NULL, NULL, NULL),
(65, '401381150346@r3-2.deped.gov.ph', 138, '2025-03-20 16:12:03', 'Rejected', NULL, '2025-03-26 14:00:06', 1, NULL, NULL, NULL),
(66, '401381150346@r3-2.deped.gov.ph', 119, '2025-03-20 16:13:59', 'Rejected', NULL, '2025-03-26 14:00:08', 1, NULL, NULL, NULL),
(67, 'itsviktor777@gmail.com', 119, '2025-03-20 16:14:00', 'Rejected', NULL, '2025-03-26 14:00:14', 3, NULL, NULL, NULL),
(68, '107139120157@r3-2.gov.ph', 42, '2025-03-20 16:15:38', 'Rejected', NULL, '2025-03-26 14:00:25', 1, NULL, NULL, NULL),
(69, '401381150346@r3-2.deped.gov.ph', 105, '2025-03-20 16:15:38', 'Rejected', NULL, '2025-03-26 14:00:30', 1, NULL, NULL, NULL),
(70, 'itsviktor777@gmail.com', 42, '2025-03-20 16:15:39', 'Rejected', NULL, '2025-03-26 14:00:32', 3, NULL, NULL, NULL),
(71, '107139120157@r3-2.gov.ph', 42, '2025-03-20 16:16:30', 'Rejected', NULL, '2025-03-26 14:00:34', 1, NULL, NULL, NULL),
(72, '401381150346@r3-2.deped.gov.ph', 42, '2025-03-20 16:16:31', 'Rejected', NULL, '2025-03-26 14:01:16', 1, NULL, NULL, NULL),
(73, '420511150021@r3-2.deped.gov.ph', 42, '2025-03-20 16:16:34', 'Rejected', NULL, '2025-03-26 14:01:20', 1, NULL, NULL, NULL),
(74, 'itsviktor777@gmail.com', 42, '2025-03-20 16:16:35', 'Rejected', NULL, '2025-03-26 14:01:23', 3, NULL, NULL, NULL),
(75, 'itsviktor777@gmail.com', 78, '2025-03-20 16:17:21', 'Rejected', NULL, '2025-03-20 19:06:13', 3, NULL, NULL, NULL),
(76, '401381150346@r3-2.deped.gov.ph', 78, '2025-03-20 16:17:28', 'Rejected', NULL, '2025-03-26 14:01:26', 1, NULL, NULL, NULL),
(77, '420511150021@r3-2.deped.gov.ph', 244, '2025-03-20 16:17:32', 'Rejected', NULL, '2025-03-26 14:01:28', 1, NULL, NULL, NULL),
(78, 'datboiph9@gmail.com', 41, '2025-03-26 14:04:49', 'Rejected', NULL, '2025-03-26 14:05:12', 1, NULL, NULL, NULL),
(79, 'datboiph9@gmail.com', 54, '2025-03-26 14:05:39', 'Pending Return', '2025-03-26 15:12:03', NULL, 1, NULL, '1742973348_WIN_20250326_15_14_13_Pro.jpg', '2025-03-26 15:15:48'),
(80, 'cdcdch90@gmail.com', 54, '2025-03-26 14:05:57', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(81, 'datboiph9@gmail.com', 41, '2025-03-26 14:06:23', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(82, 'andradejp1324@gmail.com', 41, '2025-03-26 14:06:25', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(83, 'andradejapee1524@gmail.com', 41, '2025-03-26 14:06:29', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(84, 'cdcdch90@gmail.com', 41, '2025-03-26 14:06:33', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(85, 'cdcdch90@gmail.com', 41, '2025-03-26 14:06:39', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(86, 'andradejapee1524@gmail.com', 47, '2025-03-26 14:07:56', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(87, 'cdcdch90@gmail.com', 59, '2025-03-26 14:08:43', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(88, 'cdcdch90@gmail.com', 59, '2025-03-26 14:08:43', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(89, 'andradejp1324@gmail.com', 59, '2025-03-26 14:08:54', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(90, 'datboiph9@gmail.com', 10, '2025-03-26 14:09:11', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(91, 'datboiph9@gmail.com', 25, '2025-03-26 14:09:51', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(92, 'andradejapee1524@gmail.com', 17, '2025-03-26 14:10:31', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(93, 'andradejp1324@gmail.com', 17, '2025-03-26 14:10:35', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(94, 'cdcdch90@gmail.com', 140, '2025-03-26 14:11:04', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(95, 'datboiph9@gmail.com', 140, '2025-03-26 14:11:08', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(96, 'andradejp1324@gmail.com', 18, '2025-03-26 14:11:51', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(97, 'cdcdch90@gmail.com', 18, '2025-03-26 14:11:53', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(98, 'andradejapee1524@gmail.com', 18, '2025-03-26 14:11:54', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(99, 'andradejp1324@gmail.com', 83, '2025-03-26 14:12:31', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(100, 'datboiph9@gmail.com', 197, '2025-03-26 14:12:58', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(101, 'datboiph9@gmail.com', 197, '2025-03-26 14:12:59', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(102, 'datboiph9@gmail.com', 197, '2025-03-26 14:12:59', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(103, 'andradejp1324@gmail.com', 197, '2025-03-26 14:13:00', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(104, 'andradejapee1524@gmail.com', 197, '2025-03-26 14:13:09', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(105, 'andradejp1324@gmail.com', 154, '2025-03-26 14:14:08', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(106, 'datboiph9@gmail.com', 138, '2025-03-26 14:15:01', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(107, 'andradejp1324@gmail.com', 138, '2025-03-26 14:15:02', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(108, 'andradejapee1524@gmail.com', 104, '2025-03-26 14:15:02', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(109, 'andradejp1324@gmail.com', 129, '2025-03-26 14:15:40', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(110, 'datboiph9@gmail.com', 131, '2025-03-26 14:15:40', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(111, 'andradejapee1524@gmail.com', 131, '2025-03-26 14:15:55', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(112, 'andradejp1324@gmail.com', 193, '2025-03-26 14:16:01', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(113, 'datboiph9@gmail.com', 193, '2025-03-26 14:16:28', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(114, 'andradejapee1524@gmail.com', 193, '2025-03-26 14:16:31', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(115, 'andradejapee1524@gmail.com', 131, '2025-03-26 14:16:57', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(116, 'andradejapee1524@gmail.com', 129, '2025-03-26 14:17:14', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(117, 'andradejp1324@gmail.com', 119, '2025-03-26 14:17:18', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(118, 'datboiph9@gmail.com', 115, '2025-03-26 14:17:18', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(119, 'andradejp1324@gmail.com', 42, '2025-03-26 14:17:57', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(120, 'andradejapee1524@gmail.com', 42, '2025-03-26 14:17:58', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(121, 'cdcdch90@gmail.com', 42, '2025-03-26 14:18:01', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(122, 'datboiph9@gmail.com', 42, '2025-03-26 14:18:01', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(123, 'datboiph9@gmail.com', 243, '2025-03-26 14:18:32', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(124, 'datboiph9@gmail.com', 244, '2025-03-26 14:18:41', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(125, 'datboiph9@gmail.com', 244, '2025-03-26 14:18:41', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(126, 'cdcdch90@gmail.com', 78, '2025-03-26 14:18:42', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(127, 'cdcdch90@gmail.com', 78, '2025-03-26 14:18:43', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(128, 'cdcdch90@gmail.com', 78, '2025-03-26 14:18:43', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(129, 'cdcdch90@gmail.com', 78, '2025-03-26 14:18:44', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(130, 'cdcdch90@gmail.com', 78, '2025-03-26 14:18:44', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(131, 'cdcdch90@gmail.com', 78, '2025-03-26 14:18:44', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(132, 'cdcdch90@gmail.com', 78, '2025-03-26 14:18:46', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(133, 'andradejapee1524@gmail.com', 243, '2025-03-26 14:18:46', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(134, 'datboiph9@gmail.com', 105, '2025-03-26 14:20:32', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(135, 'andradejapee1524@gmail.com', 250, '2025-03-26 14:20:32', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(136, 'andradejapee1524@gmail.com', 250, '2025-03-26 14:20:45', 'Pending', NULL, NULL, 8, NULL, NULL, NULL),
(137, '107139120152@r3-2.deped.gov.ph', 11, '2025-03-27 09:09:13', 'Approved', '2025-03-27 09:11:58', NULL, 1, NULL, NULL, NULL),
(138, 'dntlyro16@gmail.com', 2, '2025-03-30 10:54:44', 'Pending', NULL, NULL, 10, NULL, NULL, NULL),
(139, 'dntlyro16@gmail.com', 5, '2025-03-30 10:55:33', 'Pending', NULL, NULL, 1, NULL, NULL, NULL),
(140, 'dntlyro16@gmail.com', 73, '2025-03-30 10:57:01', 'Pending', NULL, NULL, 5, NULL, NULL, NULL),
(141, 'annedreaorca@gmail.com', 1, '2025-03-31 09:39:55', 'Approved', '2025-03-31 09:40:32', NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lab_equipments`
--

CREATE TABLE `lab_equipments` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `uploader` varchar(255) NOT NULL,
  `file_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `temp_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `item_status` varchar(255) NOT NULL,
  `total_available` int(11) NOT NULL,
  `is_archived` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_equipments`
--

INSERT INTO `lab_equipments` (`item_id`, `item_name`, `item_description`, `uploader`, `file_name`, `temp_name`, `item_status`, `total_available`, `is_archived`) VALUES
(1, 'AC/DC Adapter', 'A device that converts alternating current from a wall outlet into direct current.', '', 'AC_DC Adapter.jpg', 'AC_DC Adapter.jpg', '', 13, 0),
(2, 'Acceleration Recording Timer', 'Demonstrates increase in velocity and precisely calculate acceleration, drag and friction by measuring the interval between a series of dots. ', '', 'Acceleration Recording Timer.jpg', 'Acceleration Recording Timer.jpg', '', 12, 0),
(3, 'Acetate Film Projector', 'A device that projects an enlarged image onto a screen.', 'Admin', '', '', 'Available', 2, 0),
(4, 'Acid Burette ', 'A long glass tube with markings on it for accurate measurement and dispense liquid.', '', 'Acid Burette_2.jpg', '20250309190150_Acid Burette.jpg', '', 8, 0),
(5, 'Acrylic Contianer', 'Clear and durable storage boxes that are used for storage and displays.', '', 'Acrylic Container.jpg', '20250309190203_Acrylic Container.jpg', '', 1, 0),
(6, 'Advanced Electromagnetism Kit', 'A kit designed to introduce and educate users about the principles of electromagnetism.', 'Admin', 'ADVANCED ELECTROMAGNETIX KIT.jpg', 'ADVANCED ELECTROMAGNETIX KIT.jpg', 'Available', 7, 0),
(7, 'Airflow Box', 'A ventilated enclosure that provides a sterile or fume-free workspace by directing clean air over the work area and safely exhausting contaminants.', 'Admin', 'Airflow Box.jpg', 'Airflow Box.jpg', 'Available', 2, 0),
(8, 'Alcohol Lamp', 'Used for heating, sterilization, and combustion that uses alchool as fuel.', 'Admin', 'Alcohol Lamp.jpg', 'Alcohol Lamp.jpg', 'Available', 8, 0),
(9, 'Aluminum (Different Volumes)', 'Demonstrating different densities of aluminum.', 'Admin', 'Aluminum (Different Volumes).jpg', 'Aluminum (Different Volumes).jpg', 'Available', 12, 0),
(10, 'Aluminum Foil', 'Used in the laboratory for covering equipments such as bottles and tubes', 'Admin', 'Aluminum Foil.jpg', 'Aluminum Foil.jpg', 'Available', 2, 0),
(11, 'Aluminum Rod', 'Used as sample holders, reaction vessels, or support structures.', 'Admin', 'Aluminum Rod.jpg', 'Aluminum Rod.jpg', 'Available', 3, 0),
(12, 'Analog Multimeter (Model YX-1000A)', 'Has an analog display that uses the deflection of a pointer on the scale to indicate the level of measurement of such like voltage, current, and resistance', 'Admin', 'Analog Multimeter (Model YX-1000A).jpg', 'Analog Multimeter (Model YX-1000A).jpg', 'Available', 8, 0),
(13, 'Anemometer Logger Sensor', 'A device that measues the wind speed.', 'Admin', 'Anemometer Logger Sensor.jpg', 'Anemometer Logger Sensor.jpg', 'Available', 1, 0),
(14, 'Aneroid Barometer', 'A weather instrument that measures air pressure using a sealed metal chambled that expands and contracts', 'Admin', 'Aneroid Barometer.jpg', 'Aneroid Barometer.jpg', 'Available', 4, 0),
(15, 'Aneroid Barometer (Wall type)', 'Also a weather instrument that measures air pressure but is a wall type', 'Admin', 'Aneroid Barometer (Wall Type).jpg', 'Aneroid Barometer (Wall Type).jpg', 'Available', 1, 0),
(16, 'Archimedes Set-up', 'A container with water, spring balance, and a solid object for calculati ng the volume of an object with irregular shape.', 'Admin', 'Archimedes Set-up.jpg', 'Archimedes Set-up.jpg', 'Available', 1, 0),
(17, 'Balance Balls', 'Swinging balls that collide with each other that demonstrates the conservation of momentum and energy.', 'Admin', 'Balance Balls.jpg', 'Balance Balls.jpg', 'Available', 6, 0),
(18, 'Bar Magnet', 'Ferromagnetic object that attracts material like iron and certain steel.', 'Admin', 'Bar Magnet.jpg', 'Bar Magnet.jpg', 'Available', 5, 0),
(19, 'Bar Magnet (Mini)', 'Ferromagnetic object that attracts material like iron and certain steel.', 'Admin', '', '', 'Available', 1, 0),
(20, 'Bar Magnet (Mini, Thick)', 'Ferromagnetic object that attracts material like iron and certain steel.', 'Admin', 'Bar Magnet (Mini,Thick).jpg', 'Bar Magnet (Mini,Thick).jpg', 'Available', 1, 0),
(21, 'Barometer Logger Sensor', 'Device that can measure the atmospheric pressure and record the data.', 'Admin', 'Barometer Logger Sensor.jpg', 'Barometer Logger Sensor.jpg', 'Available', 1, 0),
(22, 'Basic Electronics Kit', 'A collection of electrical parts that can be used to build electronic devices.', 'Admin', 'Basic Electronics Kit.jpg', 'Basic Electronics Kit.jpg', 'Available', 8, 0),
(23, 'Battery Holder', 'Keeps cells securely fixed in place while providing power for an application.', 'Admin', 'Battery Holder.jpg', 'Battery Holder.jpg', 'Available', 20, 0),
(24, 'Battery Module', 'A combination of multiple battery cells that provide higher voltage and capacity', 'Admin', '', '', 'Available', 1, 0),
(25, 'Batteries (AA)', 'A device that stores chemical energy and converts it to electrical energy.', 'Admin', 'Batteries.jpg', 'Batteries.jpg', 'Available', 3, 0),
(26, 'Battery Holder (with Selector)', 'A device for holding and managing batteries with a selector switch to control the power source for experiments', 'Admin', '', '', 'Available', 22, 0),
(27, 'Beaker (Plastic, 500 mL)', 'A 500 mL plastic container used to hold liquids in lab experiments.', 'Admin', 'Beaker (Plastic, 500 mL).jpg', 'Beaker (Plastic, 500 mL).jpg', 'Available', 4, 0),
(28, 'Beaker (Pyrex, 100 mL) ', 'A 100 mL heat-resistant glass beaker for precise measurements of liquids in chemical experiments.', 'Admin', 'Beaker (Pyrex, 100 mL).jpg', 'Beaker (Pyrex, 100 mL).jpg', 'Available', 13, 0),
(29, 'Beaker (Pyrex, 1000 mL)', 'A 1000 mL glass beaker, often used for mixing larger volumes of substances in lab setups.', 'Admin', 'Beaker (Pyrex, 1000 mL).jpg', 'Beaker (Pyrex, 1000 mL).jpg', 'Available', 1, 0),
(30, 'Beaker (Pyrex, 200 mL)', 'A 200 mL glass beaker, perfect for smaller liquid quantities in chemical tests.', 'Admin', 'Beaker (Pyrex, 250 mL).jpg', 'Beaker (Pyrex, 250 mL).jpg', 'Available', 1, 0),
(31, 'Beaker (Pyrex, 400 mL)', 'A 400 mL Pyrex glass beaker for holding and mixing liquids with moderate volumes.', 'Admin', 'Beaker (Pyrex, 400 mL).jpg', 'Beaker (Pyrex, 400 mL).jpg', 'Available', 1, 0),
(32, 'Beaker (Pyrex, 500 mL)', 'A 500 mL glass beaker, commonly used for holding and heating liquids in chemical labs.', 'Admin', 'Beaker (Pyrex, 500 mL).jpg', 'Beaker (Pyrex, 500 mL).jpg', 'Available', 13, 0),
(33, 'Blank Paper Discs (6 mm)', 'Small, 6 mm paper discs used in filtration or other scientific tests.', 'Admin', 'Blank Paper Disc (6 mm).jpg', 'Blank Paper Disc (6 mm).jpg', 'Available', 1, 0),
(34, 'Boiling flask (1000 mL)', 'A 1000 mL round-bottom flask used for boiling liquids in laboratory distillation or heating processes.', 'Admin', 'Boiling Flask (1000 mL).jpg', 'Boiling Flask (1000 mL).jpg', 'Available', 1, 0),
(35, 'Boiling flask (250 mL)', 'A smaller 250 mL round-bottom flask for heating or boiling smaller amounts of liquids.', 'Admin', 'Boiling Flask (250 mL).jpg', 'Boiling Flask (250 mL).jpg', 'Available', 10, 0),
(36, 'Boiling flask (500 mL)', 'A 500 mL round-bottom flask ideal for medium-sized boiling or distillation procedures.', 'Admin', 'Boiling Flask (500 mL).jpg', 'Boiling Flask (500 mL).jpg', 'Available', 4, 0),
(37, 'Bong (2h)', 'An apparatus used in chemical processes involving vaporization or filtration.', 'Admin', '', '', 'Available', 1, 0),
(38, 'Bong (3h)', 'An apparatus used in chemical processes involving vaporization or filtration of larger volume.', 'Admin', '', '', 'Available', 1, 0),
(39, 'Borosilicate Glass (10 mL)', 'A 10 mL glass container made from borosilicate material, used for precise measurements and resistant to thermal shock.', 'Admin', '', '', 'Available', 67, 0),
(40, 'Borosilicate Glass (100 mL)', 'A 100 mL borosilicate glass container used for chemical mixing or measurement.', 'Admin', '', '', 'Available', 29, 0),
(41, 'Bulbous Glass Apparatus ', 'A glass device with a bulbous shape, typically used in distillation or other chemical processes.', 'Admin', 'Bulbous Apparatus.jpg', 'Bulbous Apparatus.jpg', 'Available', 1, 0),
(42, 'Bunsen Burner', 'A laboratory burner used to create a controlled flame for heating or sterilizing substances.', 'Admin', 'Bunsen Burner.jpg', 'Bunsen Burner.jpg', 'Available', 8, 0),
(43, 'Burette Glass with Rotaflow Stopclock (Class B)', 'A precision glass burette with a rotating stopcock, used for titration and controlled liquid dispensing.', 'Admin', 'Burette Glass with Rotaflow Stopclock (Class B).jpg', 'Burette Glass with Rotaflow Stopclock (Class B).jpg', 'Available', 16, 0),
(44, 'Calorimeter (Big)', 'A large device used to measure the heat of chemical reactions, typically in combustion or thermodynamics experiments.', 'Admin', 'Calorimeter (Big).jpg', 'Calorimeter (Big).jpg', 'Available', 16, 0),
(45, 'Calorimeter (Small)', 'A smaller version of a calorimeter, designed for more contained and smaller-scale reactions.', 'Admin', 'Calorimeter (Small).jpg', 'Calorimeter (Small).jpg', 'Available', 12, 0),
(46, 'Candles', 'Used for lighting or generating heat in experiments.', 'Admin', 'Candle.jpg', 'Candle.jpg', 'Available', 2, 0),
(47, 'Cap', 'A covering or stopper used for sealing containers, such as beakers or flasks, during experiments.', 'Admin', '', '', 'Available', 1, 0),
(48, 'Celestron Travel Scope', 'A portable telescope for observing distant objects, often used in astronomy-related experiments.', 'Admin', 'Celestron Travel Scope.jpg', 'Celestron Travel Scope.jpg', 'Available', 1, 0),
(49, 'Chemistry Lecture Demonstration Series B', 'A series of chemistry demonstrations or educational tools for lectures and experiments.', 'Admin', 'Chemistry Lecture Demonstrations Series B.jpg', 'Chemistry Lecture Demonstrations Series B.jpg', 'Available', 1, 0),
(50, 'Chemistry Lecture Demonstration Series C', 'Another series of demonstrations for teaching chemistry concepts in a lab or classroom setting.', 'Admin', 'Chemistry Lecture Demonstration Series C.jpg', 'Chemistry Lecture Demonstration Series C.jpg', 'Available', 1, 0),
(51, 'Co2 Logger Sensor', 'A sensor used to monitor and log carbon dioxide levels in an environment.', 'Admin', 'Co2 Logger Sensor.jpg', 'Co2 Logger Sensor.jpg', 'Available', 1, 0),
(52, 'Compact Telescope', 'A smaller, portable telescope used for observation, often in astronomy or outdoor settings.', 'Admin', 'Compact Telescope.jpg', 'Compact Telescope.jpg', 'Available', 2, 0),
(53, 'Compass', 'A device used for navigation or measuring direction in experiments requiring orientation.', 'Admin', 'Compass.jpg', 'Compass.jpg', 'Available', 6, 0),
(54, 'Condenser', 'A laboratory apparatus used to cool and condense vapors back into liquids, often used in distillation.', 'Admin', 'Condenser.jpg', 'Condenser.jpg', 'Available', 8, 0),
(55, 'Conductivity Logger Sensor', 'A sensor that measures the electrical conductivity of a solution, used in various chemistry and environmental tests.', 'Admin', 'Conductivity Logger Sensor.jpg', 'Conductivity Logger Sensor.jpg', 'Available', 1, 0),
(56, 'Constel Physics in Everyday Life, A Telecourse for High School', 'An educational program designed to bring physics concepts into the everyday experience of high school students.', 'Admin', 'Constel Physics in Everyday Life, A Telecourse for High School.jpg', 'Constel Physics in Everyday Life, A Telecourse for High School.jpg', 'Available', 9, 0),
(57, 'Convection Apparatus', 'An instrument that demonstrates convection, which is the transfer of heat through liquids and gases.', 'Admin', 'Convection Apparatus.jpg', 'Convection Apparatus.jpg', 'Available', 4, 0),
(58, 'Copper (Different Volumes)', 'Demonstrating differen densities of copper.', 'Admin', 'Copper (Different Volumes).jpg', 'Copper (Different Volumes).jpg', 'Available', 8, 0),
(59, 'Cork  ', 'Used in laboratories as stoppers to seal containers like test tubes and flasks.', 'Admin', 'Cork.jpg', 'Cork.jpg', 'Available', 27, 0),
(60, 'Cork (Rubber)', 'Used in laboratories as stoppers to seal containers like test tubes and flasks.', 'Admin', 'Cork (Rubber).jpg', 'Cork (Rubber).jpg', 'Available', 39, 0),
(61, 'Cork Borer Set', 'Metal tool used for cutting a hole in a rubber or cork stopper to insert the glass tubing.', 'Admin', 'Cork Borer Set.jpg', 'Cork Borer Set.jpg', 'Available', 10, 0),
(62, 'Cover Glass', 'Used to protect specimens mounted on microscopes', 'Admin', 'Cover Glass.jpg', 'Cover Glass.jpg', 'Available', 5, 0),
(63, 'Current Logger Sensor', 'A sensor that detects and measures the electric current passing through.', 'Admin', 'Current Logger Sensor .jpg', 'Current Logger Sensor .jpg', 'Available', 1, 0),
(64, 'DC Power Supply', 'A device that converts alternating current from an outlet into direct current voltage.', 'Admin', 'DC Power Supply.jpg', 'DC Power Supply.jpg', 'Available', 6, 0),
(65, 'DC String Vibrator', 'Drives a string to produce a standing wave and is used to study frequency, wavelength, and resonance.', 'Admin', 'DC String Vibrator.jpg', 'DC String Vibrator.jpg', 'Available', 5, 0),
(66, 'Demonstration Model 4-Stroke Cycle Gasoline Engine', 'Showcases the four-stroke cycle of intake, compression, power, and exhaust.', 'Admin', 'Demonstration Model 4-Stroke Cycle Gasoline Engine..jpg', 'Demonstration Model 4-Stroke Cycle Gasoline Engine..jpg', 'Available', 1, 0),
(67, 'Denatured Alcohol (350 mL)', 'Used as a solvent for cleaning and disinfecting equipment, glasswares, and surfaces.', 'Admin', 'Denatured Alcohol (350 mL).jpg', 'Denatured Alcohol (350 mL).jpg', 'Available', 3, 0),
(68, 'DepED-NSTIC Spring Balance (10N)', 'Device used for measuring weight or force when an object is hung from its hook', 'Admin', 'DepED-NSTIC Spring Balance (10N).jpg', 'DepED-NSTIC Spring Balance (10N).jpg', 'Available', 2, 0),
(69, 'DepED-NSTIC Spring Balance (2N)', 'Device used for measuring weight or force when an object is hung from its hook', 'Admin', 'DepED-NSTIC Spring Balance (2N).jpg', 'DepED-NSTIC Spring Balance (2N).jpg', 'Available', 1, 0),
(70, 'DepED-NSTIC Spring Balance (5N)', 'Device used for measuring weight or force when an object is hung from its hook', 'Admin', 'DepED-NSTIC Spring Balance (5N).jpg', 'DepED-NSTIC Spring Balance (5N).jpg', 'Available', 2, 0),
(71, 'Dew Point Logger Sensor', 'Device that measures and records the dew point temperature of air over time.', 'Admin', 'Dew Point Logger Sensor.jpg', 'Dew Point Logger Sensor.jpg', 'Available', 1, 0),
(72, 'Digital Multimeter (DT830B)', 'Model DT830B electronic device used to measure various electrical properties like voltage, current, and resistance.', 'Admin', 'Digital Multimeter (DT830B).jpg', 'Digital Multimeter (DT830B).jpg', 'Available', 7, 0),
(73, 'Digital Multimeter (DT9205M)', 'Model DT9205M electronic device used to measure various electrical properties like voltage, current, and resistance.', 'Admin', 'Digital Multimeter (DT9205M).jpg', 'Digital Multimeter (DT9205M).jpg', 'Available', 10, 0),
(74, 'Digital pH Meter', 'A hardwood rod used to strike drums and create rhythmic sounds.', 'Admin', 'Digital pH Meter.jpg', 'Digital pH Meter.jpg', 'Available', 5, 0),
(75, 'Disposable Syringe', 'Used in laboratory to accurately measure and transfer volumes of liquids.', 'Admin', 'Disposable Syringe.jpg', 'Disposable Syringe.jpg', 'Available', 12, 0),
(76, 'Distillation Tube', 'Used to purify liquids by separating impurities and desired products based on their boiling points.', 'Admin', 'Distillation Tube.jpg', 'Distillation Tube.jpg', 'Available', 1, 0),
(77, 'Distilling Flask (with side tube)', 'Separates lilquids with different boiling points through evaporation and condensation.', 'Admin', 'Distilling Flask (with side tube).jpg', 'Distilling Flask (with side tube).jpg', 'Available', 6, 0),
(78, 'Double Beam Balance', 'Used for measuring the mass of an object with high precision.', 'Admin', 'Double Beam Balance.jpg', 'Double Beam Balance.jpg', 'Available', 5, 0),
(79, 'Drop Counter Logger Sensor', 'A device that accurately counts and logs the number of drops in a given experiment.', 'Admin', '', '', 'Available', 1, 0),
(80, 'Dropper (DM)', 'A dropper designed for precise liquid measurements and transfers in experiments.', 'Admin', '', '', 'Available', 10, 0),
(81, 'Dropper (DS)', 'Similar to the DM dropper but might have a different size or material composition.', 'Admin', '', '', 'Available', 16, 0),
(82, 'Drumstick', 'A drumstick is a percussion instrument implement composed of a solid cylindrical rod, typically crafted from hardwood, designed to strike a drum or similar resonant surface, producing a desired rhythmic sound.', 'Admin', 'Drumstick.jpg', 'Drumstick.jpg', 'Available', 19, 0),
(83, 'Electric Blower ', 'Utilized for drying or cooling samples quickly using forced air.', 'Admin', '', '', 'Available', 1, 0),
(84, 'Electrolysis Apparatus', 'Equipment used to carry out electrolysis for chemical separation.', 'Admin', 'Electrolysis Apparatus.jpg', 'Electrolysis Apparatus.jpg', 'Available', 13, 0),
(85, 'Electronic Balance', 'A digital scale for precise weight measurements in the laboratory.', 'Admin', 'Electronic Balance.jpg', 'Electronic Balance.jpg', 'Available', 4, 0),
(86, 'Electroscope ', 'An instrument for detecting and measuring electric charges.', 'Admin', 'Electroscope.jpg', 'Electroscope.jpg', 'Available', 29, 0),
(87, 'Empty Gelatin Capsule', 'Used to encapsulate substances for controlled-release experiments.', 'Admin', 'Empty Gelatine Capsule.jpg', 'Empty Gelatine Capsule.jpg', 'Available', 1, 0),
(88, 'Erlenmeyer Flask (1000 mL)', 'A conical flask used for mixing and heating large volumes of liquid.', 'Admin', 'Erlenmeyer Flask (1000 mL).jpg', 'Erlenmeyer Flask (1000 mL).jpg', 'Available', 10, 0),
(89, 'Erlenmeyer Flask (250 mL)', 'A smaller conical flask for precise liquid measurements and reactions.', 'Admin', '', '', 'Available', 9, 0),
(90, 'Erlenmeyer Flask (500 mL)', 'A medium-sized conical flask for various laboratory experiments.', 'Admin', 'Erlenmeyer Flask (500 mL).jpg', 'Erlenmeyer Flask (500 mL).jpg', 'Available', 7, 0),
(91, 'Ferrite Block', 'A magnetic block often used in physics experiments involving magnetism.', 'Admin', 'Ferrite Block.jpg', 'Ferrite Block.jpg', 'Available', 1, 0),
(92, 'Filter and Tie', 'Equipment used for filtering solutions and securing filter media.', 'Admin', 'Filter and Tie.jpg', 'Filter and Tie.jpg', 'Available', 7, 0),
(93, 'Filter Paper', 'Porous paper used for separating solids from liquids.', 'Admin', 'Filter Paper.jpg', 'Filter Paper.jpg', 'Available', 2, 0),
(94, 'Filter Tube', 'A tube designed to hold filter media for fluid separation.', 'Admin', '', '', 'Available', 1, 0),
(95, 'Filtering Flask', 'A flask used in conjunction with a vacuum to facilitate filtration.', 'Admin', 'Filtering Flask.jpg', 'Filtering Flask.jpg', 'Available', 5, 0),
(96, 'Fine Grater', 'A tool for finely shredding or grating substances, often in sample preparation', 'Admin', 'Fine Grater.jpg', 'Fine Grater.jpg', 'Available', 2, 0),
(97, 'Free Fall Apparatus', 'Equipment to study the motion of objects under free fall conditions.', 'Admin', 'Free Fall Apparatus.jpg', 'Free Fall Apparatus.jpg', 'Available', 4, 0),
(98, 'Fuse Holder', 'A device that secures fuses in electrical circuits for safety.', 'Admin', 'Fuse Holder.jpg', 'Fuse Holder.jpg', 'Available', 7, 0),
(99, 'Glass Bottle (100 mL)', 'A small container for storing and handling liquid samples.', 'Admin', 'Glass Bottle (100 mL).jpg', 'Glass Bottle (100 mL).jpg', 'Available', 2, 0),
(100, 'Glass Tube', 'A cylindrical glass object used in various laboratory procedures.', 'Admin', 'Glass Tube.jpg', 'Glass Tube.jpg', 'Available', 35, 0),
(101, 'Glycerin (60 mL)', 'A viscous liquid used as a solvent, in preservation, or in other chemical reactions.', 'Admin', 'Glycerin (60 mL).jpg', 'Glycerin (60 mL).jpg', 'Available', 13, 0),
(102, 'GPS Logger Sensor', 'A device that logs geographic location data for experiments involving movement or location tracking.', 'Admin', 'GPS Logger Sensor.jpg', 'GPS Logger Sensor.jpg', 'Available', 1, 0),
(103, 'Handypette Pipette', 'A handheld device for accurately dispensing small volumes of liquid.', 'Admin', 'Handypette Pipette.jpg', 'Handypette Pipette.jpg', 'Available', 1, 0),
(104, 'Horseshoe Magnet', 'A magnet shaped like a horseshoe for studying magnetic fields and forces.', 'Admin', 'Horseshoe Magnet.jpg', 'Horseshoe Magnet.jpg', 'Available', 14, 0),
(105, 'Hotplate', 'A flat surface that heats samples or solutions during experiments.', 'Admin', 'Hotplate.jpg', 'Hotplate.jpg', 'Available', 11, 0),
(106, 'Humidity Logger Sensor', 'An instrument for recording and monitoring humidity levels in the laboratory.', 'Admin', 'humidity logger sensor.jpg', 'humidity logger sensor.jpg', 'Available', 2, 0),
(107, 'Hydrometer', 'A device that measures the specific gravity or density of liquids.', 'Admin', 'hydrometer.jpg', 'hydrometer.jpg', 'Available', 21, 0),
(108, 'Inoculating Loops', 'Tools for transferring microbiological samples in culture experiments.', 'Admin', 'Inoculating Loops.jpg', 'Inoculating Loops.jpg', 'Available', 25, 0),
(109, 'Insulin Syringe', 'A syringe specifically designed for precise administration of insulin or small-volume liquids.', 'Admin', 'Insulin Syringe.jpg', 'Insulin Syringe.jpg', 'Available', 4, 0),
(110, 'Iron Fillings (500g)', 'Small pieces of iron used to visualize magnetic fields.', 'Admin', 'Iron Fillings.jpg', 'Iron Fillings.jpg', 'Available', 9, 0),
(111, 'Iron Wire Gauze', 'A mesh used to support containers during heating to distribute heat evenly.', 'Admin', 'Iron Wire Gauze.jpg', 'Iron Wire Gauze.jpg', 'Available', 12, 0),
(112, 'KADIO Professioal Quartz Timer', 'A precision timer used to track time accurately during experiments. ', 'Admin', 'KADIO professional quartz timer.jpg', 'KADIO professional quartz timer.jpg', 'Available', 5, 0),
(113, 'Kelsun Lab Basic Lens Set', 'A set of essential optical lenses for laboratory experiments in light refraction, magnification, and image formation, helping to analyze light behavior in various scientific studies.', 'Admin', 'Kelsun Lab Basic Lens Set.jpg', 'Kelsun Lab Basic Lens Set.jpg', 'Available', 6, 0),
(114, 'Knife Switch', 'Used in laboratory electrical circuits, this switch manually opens or closes a circuit, ideal for demonstrating the flow of electricity in physics and engineering experiments.', 'Admin', 'knife switch.jpg', 'knife switch.jpg', 'Available', 9, 0),
(115, 'Lamp  ', 'Provides illumination for lab experiments; holders securely position the lamp.', 'Admin', '', '', 'Available', 1, 0),
(116, 'Lamp Holder', 'Provides illumination for lab experiments; holders securely position the lamp.', 'Admin', 'lamp holder.jpg', 'lamp holder.jpg', 'Available', 24, 0),
(117, 'Lamp Holder', 'Provides illumination for lab experiments; holders securely position the lamp.', 'Admin', 'lamp holder.jpg', 'lamp holder.jpg', 'Available', 24, 0),
(118, 'Laser Refraction Tank', 'Used to study light refraction through various mediums.', 'Admin', 'Laser Refraction Tank.jpg', 'Laser Refraction Tank.jpg', 'Available', 5, 0),
(119, 'Lasers', 'Light sources for studying properties like reflection and refraction.', 'Admin', 'Lasers.jpg', 'Lasers.jpg', 'Available', 19, 0),
(120, 'Lead (Different Volumes)', 'Used for shielding or as weights in mechanics or electromagnetic experiments.', 'Admin', 'Lead (Different Volumes).jpg', 'Lead (Different Volumes).jpg', 'Available', 11, 0),
(121, 'Lens (Big Double Convex)', 'Focuses light to a point; used in experiments involving magnification and image formation.', 'Admin', 'Lens (Big Double Convex).jpg', 'Lens (Big Double Convex).jpg', 'Available', 3, 0),
(122, 'Lens (Double Convex)', 'Used to converge light in optical experiments and demonstrate focal length', 'Admin', 'Lens (Double Convex).jpg', 'Lens (Double Convex).jpg', 'Available', 3, 0),
(123, 'Lens (Medium Concave)', 'Diverges light rays; used in image formation and lens combination studies.', 'Admin', 'Lens (Medium Concave).jpg', 'Lens (Medium Concave).jpg', 'Available', 4, 0),
(124, 'Lens (Optically True Concave)', 'A precise concave lens used for accurate optical experiments and light divergence.', 'Admin', 'Lens (Optically True Concave).jpg', 'Lens (Optically True Concave).jpg', 'Available', 16, 0),
(125, 'Lens (Optically True Double Concave)', 'Specially designed for accurate light divergence in optical setups.', 'Admin', 'Lens (Optically True Double Concave).jpg', 'Lens (Optically True Double Concave).jpg', 'Available', 6, 0),
(126, 'Lens (Thick Concave)', 'Used to diverge light with a thicker, stronger curvature for specialized optics experiments.', 'Admin', '', '', 'Available', 1, 0),
(127, 'Lens (Thick Double Concave)', 'A thicker version of the concave lens, used for diverging light in more intense setups.', 'Admin', 'Lens (Thick Double Concave).jpg', 'Lens (Thick Double Concave).jpg', 'Available', 1, 0),
(128, 'Lens Set (Set of 6)', 'A collection of lenses (convex and concave) for a variety of optical experiments.', 'Admin', 'Lens (Set of 6).jpg', 'Lens (Set of 6).jpg', 'Available', 10, 0),
(129, 'Light Bulb (Small)', 'Provides light for experiments in optics, electrical circuits, and energy conversion.', 'Admin', 'Light Bulb (Small).jpg', 'Light Bulb (Small).jpg', 'Available', 99, 0),
(130, 'Light Bulb Sockets (Small)', 'Holds small light bulbs securely for use in experimental setups.', 'Admin', 'Light Bulb Sockets (Small).jpg', 'Light Bulb Sockets (Small).jpg', 'Available', 102, 0),
(131, 'Light-emitting Diode', 'A light source used in physics experiments focusing on electronics and light-emitting properties.', 'Admin', 'Light Emitting Diode.jpg', 'Light Emitting Diode.jpg', 'Available', 4, 0),
(132, 'Litmus Paper (Blue)', 'Used to test the pH in experiments involving acids, bases, and chemical reactions.', 'Admin', 'Litmus Paper (Blue).jpg', 'Litmus Paper (Blue).jpg', 'Available', 4, 0),
(133, 'Litmus Paper (Red)', 'Used to test for bases, changing color in alkaline solutions during chemistry experiments.', 'Admin', 'Litmus Paper (Red).jpg', 'Litmus Paper (Red).jpg', 'Available', 44, 0),
(134, 'Loud Speaker', 'Converts electrical signals to sound, used in acoustics and resonance experiments.', 'Admin', 'Loud Speaker.jpg', 'Loud Speaker.jpg', 'Available', 12, 0),
(135, 'LW Scientific E8 Centrifuge', 'Spins samples at high speeds to separate materials in physics and chemistry experiments.', 'Admin', 'LW scientific e8 centrifuge.jpg', 'LW scientific e8 centrifuge.jpg', 'Available', 2, 0),
(136, 'Magnetic Field (Iron Fillings with Glycerin)', 'Demonstrates magnetic field lines for experiments in electromagnetism.', 'Admin', 'Magnetic Field (Iron Fillings with Glycerin.jpg', 'Magnetic Field (Iron Fillings with Glycerin.jpg', 'Available', 1, 0),
(137, 'Magnetic Field Container', 'Holds materials used to visualize or measure magnetic fields.', 'Admin', 'Magnetic Field Container.jpg', 'Magnetic Field Container.jpg', 'Available', 8, 0),
(138, 'Magnetic Field Logger Sensor', 'Records magnetic field strength for analysis in physics experiments.', 'Admin', 'magnetic field logger sensor.jpg', 'magnetic field logger sensor.jpg', 'Available', 1, 0),
(139, 'Magnetic Stirrer', 'Records magnetic field strength for analysis in physics experiments.', 'Admin', 'magnetic stirrer.jpg', 'magnetic stirrer.jpg', 'Available', 2, 0),
(140, 'Magnifying Glass (Big)', 'Enlarges objects for closer inspection in optical and material science experiments.', 'Admin', 'Magnifying Glass (Big).jpg', 'Magnifying Glass (Big).jpg', 'Available', 1, 0),
(141, 'Magnifying Glass (Extra Small)', 'Used for detailed inspection of very small objects in experimental setups.', 'Admin', 'Magnifying Glass (Xtra Small).jpg', 'Magnifying Glass (Xtra Small).jpg', 'Available', 8, 0),
(142, 'Magnifying Glass (Medium)', 'Provides moderate magnification for general inspection of experimental materials.', 'Admin', 'Magnifying Glass (Medium).jpg', 'Magnifying Glass (Medium).jpg', 'Available', 2, 0),
(143, 'Magnifying Glass (Small)', 'Ideal for close examination of small experimental subjects or apparatus.', 'Admin', 'Magnifying Glass (Small).jpg', 'Magnifying Glass (Small).jpg', 'Available', 3, 0),
(144, 'Maintenance Lead Acid Battery', 'Powers equipment and tools for experiments in electrical circuits and energy.', 'Admin', 'Maintenance Lead Acid Battery.jpg', 'Maintenance Lead Acid Battery.jpg', 'Available', 2, 0),
(145, 'Manometer (Large)', 'Measures large pressure differences in experiments related to fluids and gases', 'Admin', 'Manometer (Large).jpg', 'Manometer (Large).jpg', 'Available', 17, 0),
(146, 'Manometer (Small)', 'A smaller version of the manometer, used for measuring pressure in smaller systems.', 'Admin', 'Manometer (Small).jpg', 'Manometer (Small).jpg', 'Available', 2, 0),
(147, 'Mercury Thermometer ', 'Used for measuring temperature in various thermodynamic experiments.', 'Admin', 'Mercury Thermometer.jpg', 'Mercury Thermometer.jpg', 'Available', 42, 0),
(148, 'Meter Stick', 'Provides accurate measurement of length, critical for precision in physics experiments.', 'Admin', 'meter sticks.jpg', 'meter sticks.jpg', 'Available', 16, 0),
(149, 'Micrometer', 'Measures small dimensions with high accuracy, used in material and mechanical experiments.', 'Admin', 'Micrometer.jpg', 'Micrometer.jpg', 'Available', 5, 0),
(150, 'Mini Bulb', 'A compact light source for small-scale lighting and energy experiments.', 'Admin', '', '', 'Available', 43, 0),
(151, 'Mirror (75mm Optically True Concave)', 'Used for studying reflection and image formation in optical experiments.', 'Admin', 'Mirror (75 mm, Optically True Concave).jpg', 'Mirror (75 mm, Optically True Concave).jpg', 'Available', 6, 0),
(152, 'Mirror (75 mm Optically True Convex)', 'Used for focusing light in optics experiments and demonstrating reflection.', 'Admin', '', '', 'Available', 12, 0),
(153, 'Mirror Set', 'A collection of mirrors used for a variety of optical experiments involving reflection and refraction.', 'Admin', 'Mirror Set.jpg', 'Mirror Set.jpg', 'Available', 7, 0),
(154, 'Molecular Geometry', 'Models used to understand the structure and behavior of molecules in physics experiments.', 'Admin', 'Molecular Geometry.jpg', 'Molecular Geometry.jpg', 'Available', 24, 0),
(155, 'Mortar (Big)', 'Used to grind materials for experiments in solid-state physics or material science', 'Admin', 'Mortar (Big).jpg', 'Mortar (Big).jpg', 'Available', 5, 0),
(156, 'Mortar (Small)', ': A smaller grinding tool used for precision in material preparation for experiments.', 'Admin', 'Mortar (Small).jpg', 'Mortar (Small).jpg', 'Available', 2, 0),
(157, 'Motion Logger Sensor', 'Records the movement of objects for studying kinematics, velocity, and acceleration.', 'Admin', 'motion logger sensor.jpg', 'motion logger sensor.jpg', 'Available', 1, 0),
(158, 'Motor Generator Model', 'Demonstrates the conversion of mechanical energy into electrical energy in physics experiments.', 'Admin', 'Motor Generator Model.jpg', 'Motor Generator Model.jpg', 'Available', 13, 0),
(159, 'Neodymium Magnet (1 set - 30 pieces)', 'Strong magnets used for studying magnetic fields and forces in electromagnetism experiments.', 'Admin', '', '', 'Available', 1, 0),
(160, 'U-Tube Manometer ', 'Measures the pressure difference between two points in fluid systems, useful in fluid dynamics experiments.', 'Admin', 'U-Tube Manometer.jpg', 'U-Tube Manometer.jpg', 'Available', 1, 0),
(161, 'Oxygen Logger Sensor', 'Measures the oxygen levels in experiments, useful in thermodynamics and energy studies.', 'Admin', 'oxygen logger sensor.jpg', 'oxygen logger sensor.jpg', 'Available', 1, 0),
(162, 'Pack of Balloons', 'Used in experiments related to gas laws, air pressure, and buoyancy.', 'Admin', 'Pack of Balloons.jpg', 'Pack of Balloons.jpg', 'Available', 2, 0),
(163, 'Pestle (Big)', 'Used to crush and mix materials for experiments in physics, chemistry, or material science.', 'Admin', 'Pestle (Big).jpg', 'Pestle (Big).jpg', 'Available', 6, 0),
(164, 'Pestle (Small)', 'A smaller pestle for more precise mixing and grinding in experimental work.', 'Admin', 'Pestle (Small).jpg', 'Pestle (Small).jpg', 'Available', 3, 0),
(165, 'pH Logger Sensor', 'Measures the acidity or alkalinity of solutions, essential for experiments in chemistry and fluid dynamics.', 'Admin', 'ph logger sensor.jpg', 'ph logger sensor.jpg', 'Available', 1, 0),
(166, 'Plane Magnetic Line of Force', 'Used in studies of magnetic fields and forces in physics experiments.', 'Admin', '', '', 'Available', 1, 0),
(167, 'Plastic Cups', 'Used to hold liquids or other substances in experiments involving light, heat, and pressure.', 'Admin', 'Plastic Cups.jpg', 'Plastic Cups.jpg', 'Available', 45, 0),
(168, 'Plastic Gloves', 'Used to protect hands during experiments involving chemicals or potentially hazardous materials.', 'Admin', 'Plastic Gloves.jpg', 'Plastic Gloves.jpg', 'Available', 31, 0),
(169, 'Power Sonic Rechargeable Battery', 'Provides power to lab equipment and tools for energy-related experiments.', 'Admin', 'power sonic rechargeable battery.jpg', 'power sonic rechargeable battery.jpg', 'Available', 4, 0),
(170, 'Pressure Logger Sensor', 'Monitors and records pressure in experimental setups, useful in thermodynamics and fluid studies.', 'Admin', 'pressure logger sensor.jpg', 'pressure logger sensor.jpg', 'Available', 1, 0),
(171, 'Pressure Tester (Broken)', ': A non-functioning unit, used as a spare or for parts in pressure-related experiments.', 'Admin', '', '', 'Available', 1, 0),
(172, 'Prisms (Equilateral)', 'Used to study light dispersion, color separation, and refraction in optics experiments.', 'Admin', 'Prisms (Equilateral).jpg', 'Prisms (Equilateral).jpg', 'Available', 2, 0),
(173, 'Prisms (with Handle)', 'Used to study light dispersion and refraction, with a handle for easy manipulation during experiments.', 'Admin', '', '', 'Available', 4, 0),
(174, 'Prisms (Flat Equilateral)', 'Similar to the equilateral prism, used for studying light behavior and refraction in optical experiments.', 'Admin', 'Prisms (Flat Equilateral).jpg', 'Prisms (Flat Equilateral).jpg', 'Available', 6, 0),
(175, 'Protractor (Large)', 'Measures large angles in mechanics and optics experiments involving angles of incidence and reflection.', 'Admin', 'Protractor (Large).jpg', 'Protractor (Large).jpg', 'Available', 1, 0),
(176, 'Refraction Block', 'Demonstrates how light bends as it passes through different materials in optical experiments.', 'Admin', 'Refraction Block.jpg', 'Refraction Block.jpg', 'Available', 3, 0),
(177, 'Resistance Box', 'Used to vary the resistance in electrical circuits for studying Ohm’s law and electrical properties.', 'Admin', 'Resistance Box.jpg', 'Resistance Box.jpg', 'Available', 5, 0),
(178, 'Resonance Tube (Close End)', 'Studies sound waves and resonance frequencies, particularly in acoustics experiments.', 'Admin', 'Resonance Tube (Close End).jpg', 'Resonance Tube (Close End).jpg', 'Available', 14, 0),
(179, 'RF Communication Model', 'Demonstrates the principles of radio frequency communication in physics and electrical engineering.', 'Admin', 'Rubber Hose.jpg', 'Rubber Hose.jpg', 'Available', 2, 0),
(180, 'Rubber Hose ', 'Used in fluid mechanics and other experiments involving the flow of liquids or gases.', 'Admin', 'Rubber Pipette.jpg', 'Rubber Pipette.jpg', 'Available', 1, 0),
(181, 'Rubber Pipette', 'Transfers small amounts of liquids in experiments requiring precise liquid handling.', 'Admin', 'Rubber Pipette.jpg', 'Rubber Pipette.jpg', 'Available', 12, 0),
(182, 'Salinity Logger Sensor', 'Measures the salinity of liquids in experiments related to oceanography and fluid dynamics.', 'Admin', 'salinity logger sensor.jpg', 'salinity logger sensor.jpg', 'Available', 1, 0),
(183, 'Scalpel Handle', 'Holds scalpel blades for precision cutting in biological or material science experiments.', 'Admin', 'Scalpel Handle.jpg', 'Scalpel Handle.jpg', 'Available', 14, 0),
(184, 'SciKit Mechanics: Case 001', 'A kit with components for building and studying mechanical systems.', 'Admin', '', '', 'Available', 8, 0),
(185, 'SciKit Mechanics: Case 002', 'A kit with additional components for exploring mechanical principles in physics.', 'Admin', '', '', 'Available', 5, 0),
(186, 'SciKit Mechanics: Case 003', 'An advanced kit for in-depth exploration of mechanical systems and their behavior.', 'Admin', '', '', 'Available', 7, 0),
(187, 'Semi-circle Ruler', 'Measures angles in mechanics and optics experiments, useful for studies involving curved motion.', 'Admin', 'semi circle ruler.jpg', 'semi circle ruler.jpg', 'Available', 6, 0),
(188, 'Serological Pipette', 'Transfers accurate volumes of liquid for experiments in biology, chemistry, and physics.', 'Admin', 'Serological Pipette.jpg', 'Serological Pipette.jpg', 'Available', 4, 0),
(189, 'Sets of Mirrors (Plain, Concave, Concave)', 'sed for studying light reflection, focusing, and image formation in optics experiments.', 'Admin', '', '', 'Available', 7, 0),
(190, 'Signal Generator', 'Produces various electrical signals for experiments in waveforms, resonance, and frequency analysis.', 'Admin', '', '', 'Available', 12, 0),
(191, 'Slingshot', 'Demonstrates principles of force, motion, and projectile trajectory in mechanics experiments.', 'Admin', 'Slingshot.jpg', 'Slingshot.jpg', 'Available', 1, 0),
(192, 'Slinky Spring', ': Used to study wave propagation, force, and energy transfer in spring and wave mechanics experiments.', 'Admin', 'Slinky Spring.jpg', 'Slinky Spring.jpg', 'Available', 9, 0),
(193, 'Slit Light Source with Lamp', 'Produces narrow light beams for studying diffraction and wave behavior.', 'Admin', 'Slit Light Source with Lamp.jpg', 'Slit Light Source with Lamp.jpg', 'Available', 3, 0),
(194, 'Soap Chips', 'Used in experiments on surface tension, emulsions, and material interactions in fluid dynamics.', 'Admin', 'soap chips .jpg', 'soap chips .jpg', 'Available', 1, 0),
(195, 'Sodium Chloride (NaCL)', 'Used in experiments on ionic interactions, solubility, and electrochemistry.', 'Admin', 'Sodium Chloride.jpg', 'Sodium Chloride.jpg', 'Available', 1, 0),
(196, 'Soil Moistute Logger Sensor', 'Measures the moisture level in soil, useful in environmental physics studies and fluid dynamics.', 'Admin', 'Soil Moisture Logger Sensor.jpg', 'Soil Moisture Logger Sensor.jpg', 'Available', 1, 0),
(197, 'Solar Panel', 'Converts sunlight into electrical energy, used in experiments on renewable energy and energy conversion.', 'Admin', 'solar panel.jpg', 'solar panel.jpg', 'Available', 18, 0),
(198, 'Solid Copper Wires (2mm - 30m)', 'Used in electrical circuits, magnetism experiments, and energy transfer studies.', 'Admin', 'Solid Copper Wires (2mm - 30m).jpg', 'Solid Copper Wires (2mm - 30m).jpg', 'Available', 60, 0),
(199, 'Spare Parts', 'Components for replacing or repairing damaged items in lab experiments.', 'Admin', 'Spare Parts.jpg', 'Spare Parts.jpg', 'Available', 1, 0),
(200, 'Spatula (Big)', 'Used for handling materials during experiments, especially in solid-state physics or chemical experiments', 'Admin', 'Spatula (Big.jpg', 'Spatula (Big.jpg', 'Available', 14, 0),
(201, 'Spatula (Medium)', 'A medium-sized spatula for general use in handling material', 'Admin', 'Spatula (Medium).jpg', 'Spatula (Medium).jpg', 'Available', 43, 0),
(202, 'Spatula (Small)', 'A smaller spatula used for precision handling of materials.', 'Admin', 'Spatula (Small).jpg', 'Spatula (Small).jpg', 'Available', 7, 0),
(203, 'Spring Balance', 'Measures force or weight, crucial in studying gravitational force, mechanics, and material properties.', 'Admin', 'Spring Balance.jpg', 'Spring Balance.jpg', 'Available', 15, 0),
(204, 'Static-Safe-Deluxe Desoldering Tool', 'Safely removes solder in electronics experiments, preventing damage to components.', 'Admin', 'Static-Safe-Deluxe Desoldering Tool.jpg', 'Static-Safe-Deluxe Desoldering Tool.jpg', 'Available', 6, 0),
(205, 'Stirring Rod (250mmx6mm)', 'Used for mixing liquids or substances in experiments that require uniformity.', 'Admin', 'Stirring Rod (250mmx6mm).jpg', 'Stirring Rod (250mmx6mm).jpg', 'Available', 21, 0),
(206, 'Stirring Rod (8mmx300mm)', 'A longer stirring rod used for larger volumes of liquids.', 'Admin', 'Stirring Rod (8mmx300mm).jpg', 'Stirring Rod (8mmx300mm).jpg', 'Available', 67, 0),
(207, 'Student Optical Bench Set', 'A set of components for conducting experiments on light, lenses, and optical phenomena.', 'Admin', 'Student Optical Bench Set.jpg', 'Student Optical Bench Set.jpg', 'Available', 5, 0),
(208, 'Surface Temperature Logger Sensor', 'A set of components for conducting experiments on light, lenses, and optical phenomena.', 'Admin', 'surface temp logger sensor.jpg', 'surface temp logger sensor.jpg', 'Available', 1, 0),
(209, 'Temperature Logger Sensor', 'Records temperature fluctuations over time, useful in thermodynamic and heat transfer experiments.', 'Admin', 'temperature logger sensor.jpg', 'temperature logger sensor.jpg', 'Available', 2, 0),
(210, 'Temperature Sensor for Hotplates (230 mm)', 'Measures temperature in hotplates for controlling heating during experiments.', 'Admin', 'temperature sensor for digital hotplate models, length of 230mm.jpg', 'temperature sensor for digital hotplate models, length of 230mm.jpg', 'Available', 1, 0),
(211, 'Tennis Balls', 'Used in mechanics experiments to study motion, impact, and force.', 'Admin', 'Tennis Balls.jpg', 'Tennis Balls.jpg', 'Available', 3, 0),
(212, 'Terumo Syringe (10 cc mL)', 'Measures and transfers small volumes of liquids for experimental precision.', 'Admin', 'Terumo 10cc Syringe.jpg', 'Terumo 10cc Syringe.jpg', 'Available', 2, 0),
(213, 'Terumo Syringe (30 cc mL)', 'A larger syringe for transferring or measuring fluids.', 'Admin', 'Terumi 30 cc Syringe.jpg', 'Terumi 30 cc Syringe.jpg', 'Available', 5, 0),
(214, 'Terumo Syringe (60 cc mL)', 'A larger capacity syringe for handling larger volumes of liquid', 'Admin', 'Terumo 60cc Syringe.jpg', 'Terumo 60cc Syringe.jpg', 'Available', 79, 0),
(215, 'Test Tube (10x75)', 'A small tube used for holding liquids in various experimental setups.', 'Admin', 'Test Tube (10x75mm).jpg', 'Test Tube (10x75mm).jpg', 'Available', 80, 0),
(216, 'Test Tube (12x75)', 'A standard test tube for handling small quantities of liquids and substances.', 'Admin', 'Test Tube (12x75.jpg', 'Test Tube (12x75.jpg', 'Available', 274, 0),
(217, 'Test Tube (16x150)', 'A larger test tube for holding more substantial volumes of liquids.', 'Admin', 'Test Tube (16x150).jpg', 'Test Tube (16x150).jpg', 'Available', 184, 0),
(218, 'Test Tube (18x150)', 'A large test tube used for holding larger volumes of liquid samples.', 'Admin', 'Test Tube (18x150).jpg', 'Test Tube (18x150).jpg', 'Available', 6, 0),
(219, 'Test Tube (V-Shape)', ': A V-shaped test tube used for precise mixing and heating of small volumes', 'Admin', 'Test Tube (V-Shape).jpg', 'Test Tube (V-Shape).jpg', 'Available', 5, 0),
(220, 'Test Tube Brushes (Large)', 'Used for cleaning larger test tubes between experiments', 'Admin', 'Test Tube Brushes.jpg', 'Test Tube Brushes.jpg', 'Available', 7, 0),
(221, 'Test Tube Brushes (Medium)', 'A medium-sized brush for cleaning standard test tubes.', 'Admin', 'Test Tube Brushes.jpg', 'Test Tube Brushes.jpg', 'Available', 10, 0),
(222, 'Test Tube Brushes (Small)', 'Small brushes for cleaning test tubes with narrow openings.', 'Admin', 'Test Tube Brushes.jpg', 'Test Tube Brushes.jpg', 'Available', 6, 0),
(223, 'Test Tube Rack', 'Holds test tubes in place during experiments or storage.', 'Admin', 'Test Tube Rack.jpg', 'Test Tube Rack.jpg', 'Available', 1, 0),
(224, 'Test Tube Stopper (27)', 'A stopper used to seal test tubes during experiments.', 'Admin', '', '', 'Available', 27, 0),
(225, 'Test Tube Stopper (Red)', 'A red stopper used for sealing test tubes, typically with specific substances.', 'Admin', 'Test Tube Stopper (Red)..jpg', 'Test Tube Stopper (Red)..jpg', 'Available', 90, 0),
(226, 'The Mechanical Universe (Highschool Adaptation)', 'A resource for learning about mechanical principles in a visual format for students.', 'Admin', 'The Mechanical Universe (Highschool Adaptation).jpg', 'The Mechanical Universe (Highschool Adaptation).jpg', 'Available', 2, 0),
(227, 'Transformer Set', 'A set of components for studying electrical transformers and energy conversion.', 'Admin', 'Transformer Kit.jpg', 'Transformer Kit.jpg', 'Available', 1, 0),
(228, 'Triple Beam Balance', 'A precision scale for measuring the mass of objects in mechanics experiments.', 'Admin', 'Triple Beam Balance.jpg', 'Triple Beam Balance.jpg', 'Available', 37, 0),
(229, 'Tripod', 'A three-legged stand used to support equipment such as a Bunsen burner or test tubes.', 'Admin', 'Tripod.jpg', 'Tripod.jpg', 'Available', 2, 0),
(230, 'Tuning Forks', 'Used to demonstrate sound waves and frequency resonance in acoustics experiments.', 'Admin', 'Tuning Forks.jpg', 'Tuning Forks.jpg', 'Available', 28, 0),
(231, 'Turbidity Logger Sensor', 'Measures the clarity or turbidity of liquids for fluid dynamics experiments.', 'Admin', 'turbidity logger sensor.jpg', 'turbidity logger sensor.jpg', 'Available', 1, 0),
(232, 'Turmeric Paper Indicator ', 'Used for testing pH levels, particularly in acidic or basic substances.', 'Admin', '', '', 'Available', 1, 0),
(233, 'Universal Test Paper ', 'Used to test for various chemical properties, including acidity or alkalinity', 'Admin', 'Universal Test Paper.jpg', 'Universal Test Paper.jpg', 'Available', 3, 0),
(234, 'U.S.A. Standard Testing Sieve', 'A sieve used for sorting particles by size, important in material science experiments.', 'Admin', 'U.S.A. Standard Testing Sieve.jpg', 'U.S.A. Standard Testing Sieve.jpg', 'Available', 12, 0),
(235, 'U-Shape Magnet (Big)', 'A large U-shaped magnet for studying magnetic fields and forces', 'Admin', 'U-Shape Magnet (Big).jpg', 'U-Shape Magnet (Big).jpg', 'Available', 1, 0),
(236, 'U-Shape Magnet (Small)', 'A smaller U-shaped magnet for hands-on magnetism experiments.', 'Admin', 'U-Shape Magnet (Small).jpg', 'U-Shape Magnet (Small).jpg', 'Available', 27, 0),
(237, 'U-Tube', 'Used for measuring liquid flow, pressure differences, and other fluid dynamics studies', 'Admin', 'U-Tube.jpg', 'U-Tube.jpg', 'Available', 20, 0),
(238, 'Vernier Calipers', 'Precision instrument used to measure internal, external dimensions, and depths of objects.', 'Admin', '', '', 'Available', 5, 0),
(239, 'VGR', 'A tool used for graphical representation of physics data.', 'Admin', 'VGR.jpg', 'VGR.jpg', 'Available', 1, 0),
(240, 'Viewer Graphic Color Display', 'A display unit for showing data and graphs in visual format for analysis.', 'Admin', 'viewer graphic color display.jpg', 'viewer graphic color display.jpg', 'Available', 1, 0),
(241, 'Voltage Logger Sensor', 'Records voltage changes in circuits during electrical experiments.', 'Admin', 'voltage logger sensor.jpg', 'voltage logger sensor.jpg', 'Available', 1, 0),
(242, 'Water Testing Kit', 'Used for testing water quality and analyzing various water properties.', 'Admin', 'Water Testing Kit.jpg', 'Water Testing Kit.jpg', 'Available', 10, 0),
(243, 'Weighing Scale', 'Measures the weight of objects for studies involving mass and gravitational force.', 'Admin', 'Weighing Scale.jpg', 'Weighing Scale.jpg', 'Available', 6, 0),
(244, 'Weighing Scale', 'A secondary scale for use in high precision mass measurements', 'Admin', 'Weighing Scale.jpg', 'Weighing Scale.jpg', 'Available', 6, 0),
(245, 'Weights (1kg)', 'Used for calibrating equipment, measuring force, or conducting experiments involving mass.', 'Admin', 'Weights (1kg).jpg', 'Weights (1kg).jpg', 'Available', 66, 0),
(246, 'Weights (500g)', 'Used for calibrating equipment, measuring force, or conducting experiments involving mass.', 'Admin', '', '', 'Available', 36, 0),
(247, 'Weights (in Blue Container)', 'Used for calibrating equipment, measuring force, or conducting experiments involving mass.', '', '4.jpg', '20250310022842_4.jpg', '', 16, 0),
(248, 'Weights (in Green Container)', 'Used for calibrating equipment, measuring force, or conducting experiments involving mass.', '', '3.jpg', '20250310022857_3.jpg', '', 1, 0),
(249, 'Weights (in Red Container)', 'Used for calibrating equipment, measuring force, or conducting experiments involving mass.', '', '2.jpg', '20250310022920_2.jpg', '', 2, 0),
(250, 'Shot Glass', 'Yum!!', 'Chris Daniel Suyom', 'shott.webp', '20250319014904_shott.webp', 'Available', 8, 0);

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
(1, '202110064@gordoncollege.edu.ph', 'Christian Jay A. Cuya', 'Male', '', '$2y$10$DIxcGaIpPNYatWpU4Yp6xesr0MlN5mslLKvDCgL3wvkYpIyLkF5Wu', 0, 1),
(3, 'fpsmallari@gmail.com', 'Francisco Paolo S. Mallari', 'Male', 'Grade 12', '$2y$10$OXNGE7wpYp3j9QCUxGkTMOOOkZI6IekzeanKhfvOj4VkMFLn6cWXO', 0, 2),
(4, '104572130023@r3-2.deped.gov.ph', 'Austin James R. Dilioc', 'Male', 'Grade 12', '$2y$10$wpcIIpzTt3.rRhRDGI79DuVSDVeFDCszUe9nLW5ENg3qDgBQieiLS', 0, 1),
(5, 'andradejp182@gmail.com', 'John Patrick Andrade', 'Male', '', '$2y$10$d8B/ixLriBAerosiVhw3aud/GYNFUM4WTUl4mSJnXqWI3YmNvKDJi', 0, 1),
(6, 'chrissuyom235@gmail.com', 'Chris Daniel Suyom', 'Male', 'Grade 12', '$2y$10$BB5lgMfclgEtyDKxhLOgt.K7GUqMd48xw8KWyNYgWjVVYJuINFiyy', 0, 1),
(7, 'jrucho.19@gmail.com', 'John Rich C. Naval', 'Male', '', '$2y$10$y/DJVu7J02ai5rzMTtAwiuxb4Wptxs0VZ6n/Q.9XbLF6G7FQkMKPG', 0, 1),
(8, '202110209@gordoncollege.edu.ph', 'Andrea Orca', 'Female', '', '$2y$10$R7CWDgtauoJTMb5lzacaK.1oUNtXHDe.L0AErtuNVuyDKUmYLq/6W', 0, 1),
(9, 'annedreaorca@gmail.com', 'Andrea Orca', 'Female', 'Grade 12', '$2y$10$D.OmAOOhi.DQrJ0LfYI2Iux.uQ/.2qzZglsHGBVkuQVOJTpun.Az2', 0, 1),
(10, '202110890@gordoncollege.edu.ph', 'Marielle Corpuz', 'Female', 'Grade 7', '$2y$10$oNRDo5ymJXFm2c8eATQoZuqDaaJ1uNx4YwZ6OCu8L3WJtjbrFqPHi', 0, 2),
(11, 'balmoresxander@gmail.com', 'Xander S. Balmores', 'Male', '', '$2y$10$ozi/j0G..bvyHhfwakLKUePD6VgopU1d8XGE4tJZDcQykoMwO7efS', 0, 2),
(12, '107139120152@r3-2.deped.gov.ph', 'Jhon Lyorhick L. Aguilar', 'Male', 'Grade 12', '$2y$10$d0z7G5VXIV.mnV.DLswW9emXq4iZWGcqQ1oGojkVZVulXwwOMYSUi', 0, 1),
(13, 'dntlyro16@gmail.com', 'Dainty', 'Female', 'Grade 12', '$2y$10$ElvUMM0ng.k5jIxldPz7ZuPQSKH9JonQ1JijrQo3XANlmHFiP3wqi', 0, 2),
(14, '202110045@gordoncollege.edu.ph', 'Siah Bautista', 'Male', 'Grade 12', '$2y$10$7x7oLhhCaZ9R8pnz6J6epuGGBsyrJRaa5NcJjN5RIlqMnWFdMCYDq', 0, 1),
(15, 'kuma.kuma.1071@gmail.com', 'Kresia Dey L. Abastillas', 'Female', 'Grade 12', '$2y$10$vXfkPgeJu3.u5hx96ofZ1O.QD2tvzMSpNBE4o6NrUuU1ve36GfZZ6', 0, 2),
(16, '401381150346@r3-2.deped.gov.ph', 'Lovely Jewel Diche', 'Female', 'Grade 11', '$2y$10$4eUVvprHMXeean4BObRL9OzSjhlNIjxpNDJE0CIVdajTZdWFKL0Qa', 0, 2),
(17, 'itsviktor777@gmail.com', 'Viktor Mendoza', 'Male', 'Grade 12', '$2y$10$HeVzY76vXEwnVlt2WJriPOHr.l.72yDfcBmYa57AwzlxRPMYShmf2', 0, 2),
(18, '107139120157@r3-2.gov.ph', 'Elaika', 'Female', 'Grade 12', '$2y$10$Th.I3S9GFkGuh3v4ssQIde1qFfI/S7rLSejBwu.chAQZRAbA1r.Ru', 0, 2),
(20, '420511150021@r3-2.deped.gov.ph', 'Marriane Espejon', 'Female', 'Grade 11', '$2y$10$D1PaOmkqqMF.MIbvE2UJbefhZd4lCDxFghlcZkjUi26nbO7I/kVpq', 0, 2),
(21, 'kelliaiyannah@gmail.com', 'Aiyannah', 'Female', 'Grade 11', '$2y$10$z7a2zn9GvzLAPI.rfbv/QOBtRTQQfO8Zj4hsD0hzZ.NB95z8vt41q', 0, 2),
(22, 'argelroshe.cerezo.rshs3@gmail.com', '11-NH', 'Female', 'Grade 11', '$2y$10$u5c1GoMeiS1Sx0bZauS2pOXR4f8IY.TsG6YLKC0aWkpI3bRf2rcuO', 0, 2),
(23, 'cdcdch90@gmail.com', 'Copper', 'Male', 'Grade 10', '$2y$10$w/eHRo.NP1OQPppxBLUhxeYNOa4K71A.XLRLDft6nE3E3RyIk0QsC', 0, 2),
(24, 'datboiph9@gmail.com', '10-Gold', 'Female', 'Grade 10', '$2y$10$dZbX1AQ5UOuzsSUc6DQp4.l4PE.hRCJKnrB4yBpOeRlObMh9XyW7u', 0, 2),
(25, 'andradejapee1524@gmail.com', '10-Platinum', 'Male', 'Grade 10', '$2y$10$FKS7Czi2qvH.PBHJePAT0.X1NZLkh5I5NpD20wAa0eDA8yP/3.4ZC', 0, 2),
(26, 'andradejp1324@gmail.com', '10-Silver', 'Female', 'Grade 10', '$2y$10$W4uCotA2W8R0tOJHHCRan.2eQvt0NZWSrwiJ.f7bzTTyV6Fn9p4Sm', 0, 2),
(27, 'aguilarlyorhick@gmail.com', 'Jhon Lyorhick Aguilar', 'Male', '', '$2y$10$6dJDafw/CBAaDqRUp2OKIugmJKAh.OS/XsoqmBfeg4NBrRwHDQcbi', 0, 1),
(28, 'nuhjnalrobanal@gmail.com', 'RSHS ADMIN', 'Other', '', '$2y$10$m5ZS/Z5crOK9pARfIki46.PLRPhair8N5kcoy9l7R5sgEMph7wQM2', 0, 1),
(29, 'austinjames.dilioc20@gmail.com', 'Austin Dilioc', 'Male', 'Grade 12', '$2y$10$AOIHPUzsoG7PQUAY.uf4.u69DQaywL.aOE.jw7z2MMX7sqqaKsGVi', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowed_admins`
--
ALTER TABLE `allowed_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
-- AUTO_INCREMENT for table `allowed_admins`
--
ALTER TABLE `allowed_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `borrowed_items`
--
ALTER TABLE `borrowed_items`
  MODIFY `b_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `lab_equipments`
--
ALTER TABLE `lab_equipments`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
