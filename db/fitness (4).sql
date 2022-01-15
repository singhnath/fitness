-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2022 at 10:52 AM
-- Server version: 5.7.36-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `vg_admin`
--

CREATE TABLE `vg_admin` (
  `id` int(65) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(11) NOT NULL DEFAULT '0',
  `UserType` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vg_admin`
--

INSERT INTO `vg_admin` (`id`, `name`, `email`, `password`, `status`, `UserType`) VALUES
(1, 'Admin', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vg_booking`
--

CREATE TABLE `vg_booking` (
  `bookingID` int(50) NOT NULL,
  `userID` varchar(50) DEFAULT NULL,
  `trainerID` varchar(50) DEFAULT NULL,
  `bookedDate` date DEFAULT NULL,
  `bookedTime` time DEFAULT NULL,
  `bookedHours` int(50) DEFAULT NULL,
  `bookingStatus` varchar(5) DEFAULT NULL COMMENT '(1-booking,2- payment, 3-complete)',
  `bookingDate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vg_booking`
--

INSERT INTO `vg_booking` (`bookingID`, `userID`, `trainerID`, `bookedDate`, `bookedTime`, `bookedHours`, `bookingStatus`, `bookingDate`) VALUES
(1, '3', '4', '2018-05-08', '10:50:00', 2, '1', '2018-05-08 06:05:54'),
(2, '3', '4', '2018-05-08', '10:50:00', 2, '3', '2018-05-09 08:05:52'),
(3, '11', '5', '2018-05-10', '14:00:00', 2, '1', '2018-05-09 08:05:46'),
(4, '11', '19', '2018-05-11', '18:02:00', 2, '1', '2018-05-10 12:05:17'),
(5, '20', '19', '2018-05-11', '18:16:00', 3, '3', '2018-05-10 12:05:11'),
(6, '22', '19', '2018-05-25', '12:16:00', 2, '1', '2018-05-11 06:05:46'),
(12, '12', '4', '2018-05-19', '17:01:00', 2, '1', '2018-05-16 10:05:23'),
(11, '12', '4', '2018-05-16', '12:39:00', 1, '1', '2018-05-16 07:05:21'),
(10, '12', '4', '2018-05-15', '21:27:00', 2, '1', '2018-05-15 02:05:19'),
(13, '26', '19', '2018-05-16', '19:07:00', 1, '1', '2018-05-16 01:05:27'),
(14, '26', '25', '2018-05-16', '19:13:00', 3, '1', '2018-05-16 01:05:35'),
(15, '26', '25', '2018-05-18', '20:18:00', 5, '1', '2018-05-16 01:05:49'),
(16, '26', '25', '2018-05-24', '19:20:00', 5, '1', '2018-05-16 01:05:03'),
(17, '26', '25', '2018-05-17', '19:25:00', 5, '2', '2018-05-16 01:05:56'),
(18, '23', '34', '2018-05-16', '22:42:00', 1, '1', '2018-05-17 01:05:28'),
(19, '23', '34', '2018-05-16', '00:46:00', 2, '1', '2018-05-17 01:05:48'),
(20, '35', '34', '2018-05-18', '15:35:00', 1, '3', '2018-05-17 02:05:17'),
(21, '12', '21', '2018-05-18', '16:56:00', 1, '2', '2018-05-17 11:05:32'),
(22, '20', '19', '2018-05-11', '18:16:00', 3, '3', '2018-05-10 12:05:11'),
(23, '12', '19', '2018-05-21', '10:25:00', 5, '3', '2018-05-19 05:05:39'),
(28, '12', '19', '2018-05-24', '11:37:00', 1, '3', '2018-05-19 06:05:54'),
(27, '3', '4', '2018-05-20', '12:23:00', 2, '2', '2018-05-19 05:05:51'),
(26, '12', '19', '2018-05-25', '11:00:00', 2, '1', '2018-05-19 05:05:46'),
(29, '12', '19', '2018-05-20', '12:50:00', 2, '3', '2018-05-19 07:05:38'),
(30, '23', '34', '2018-05-19', '11:42:00', 1, '1', '2018-05-19 01:05:08'),
(31, '39', '5', '2018-05-20', '16:20:00', 1, '1', '2018-05-20 10:05:15'),
(32, '39', '5', '2018-05-20', '22:15:00', 2, '1', '2018-05-20 04:05:38'),
(33, '35', '34', '2018-05-21', '18:22:00', 1, '1', '2018-05-20 10:05:14'),
(34, '35', '34', '2018-05-21', '19:03:00', 1, '1', '2018-05-20 11:05:02'),
(35, '40', '34', '2018-05-23', '12:25:00', 1, '1', '2018-05-22 01:05:23'),
(36, '19', '25', '2018-05-26', '17:36:00', 1, '2', '2018-05-25 11:05:57'),
(37, '43', '24', '2018-05-26', '16:03:00', 1, '1', '2018-05-26 02:05:36'),
(38, '45', '25', '2018-05-28', '11:34:00', 2, '2', '2018-05-28 06:05:42'),
(39, '47', '19', '2018-05-30', '18:31:00', 2, '1', '2018-05-28 01:05:23'),
(40, '47', '19', '2018-05-30', '18:31:00', 2, '1', '2018-05-28 01:05:52'),
(41, '47', '19', '2018-05-30', '18:34:00', 2, '1', '2018-05-28 01:05:17'),
(42, '47', '19', '2018-05-30', '18:36:00', 1, '3', '2018-05-28 01:05:09'),
(43, '19', '25', '2018-05-29', '14:37:00', 1, '1', '2018-05-29 09:05:19'),
(44, '19', '25', '2018-05-30', '15:20:00', 1, '2', '2018-05-29 09:05:28'),
(45, '19', '25', '2018-05-29', '15:55:00', 2, '1', '2018-05-29 10:05:47'),
(46, '19', '19', '2018-05-29', '17:57:00', 2, '1', '2018-05-29 12:05:25'),
(47, '19', '19', '2018-05-29', '18:03:00', 2, '3', '2018-05-29 12:05:55'),
(48, '19', '19', '2018-05-29', '18:06:00', 2, '1', '2018-05-29 12:05:52'),
(49, '19', '19', '2018-05-29', '18:21:00', 2, '1', '2018-05-29 12:05:22'),
(50, '19', '19', '2018-05-29', '18:35:00', 2, '1', '2018-05-29 01:05:16'),
(51, '19', '19', '2018-05-29', '18:39:00', 2, '3', '2018-05-29 01:05:08'),
(52, '19', '19', '2018-05-31', '10:00:00', 1, '2', '2018-05-30 06:05:30'),
(53, '52', '52', '2018-06-01', '11:00:00', 3, '3', '2018-05-30 06:05:00'),
(54, '52', '52', '2018-06-02', '12:05:00', 1, '3', '2018-05-30 06:05:38'),
(55, '52', '52', '2018-06-05', '12:30:00', 2, '3', '2018-05-30 06:05:16'),
(56, '52', '52', '2018-06-06', '12:49:00', 5, '3', '2018-05-30 07:05:27'),
(57, '52', '52', '2018-06-14', '13:13:00', 6, '3', '2018-05-30 07:05:16'),
(58, '52', '52', '2018-05-30', '14:25:00', 1, '3', '2018-05-30 07:05:50'),
(59, '23', '34', '2018-05-30', '11:08:00', 1, '1', '2018-05-30 03:05:12'),
(60, '43', '34', '2018-05-31', '17:36:00', 1, '1', '2018-05-30 09:05:33'),
(61, '51', '51', '2018-06-01', '10:00:00', 1, '3', '2018-05-31 06:05:18'),
(62, '51', '51', '2018-06-05', '18:18:00', 1, '3', '2018-05-31 12:05:21'),
(63, '43', '34', '2018-05-31', '13:24:00', 1, '1', '2018-06-01 03:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `vg_chat`
--

CREATE TABLE `vg_chat` (
  `chatID` int(100) NOT NULL,
  `messageBy` varchar(50) DEFAULT NULL,
  `messageFor` varchar(50) DEFAULT NULL,
  `message` varchar(300) DEFAULT NULL,
  `messageStatus` varchar(10) DEFAULT NULL,
  `messageDate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vg_chat`
--

INSERT INTO `vg_chat` (`chatID`, `messageBy`, `messageFor`, `message`, `messageStatus`, `messageDate`) VALUES
(1, '4', '3', 'Hi', NULL, '2018-05-11 04:05:35'),
(2, '4', '3', 'Hi', NULL, '2018-05-11 04:05:51'),
(3, '4', '3', 'Hi', NULL, '2018-05-11 04:05:14'),
(4, '4', '3', 'Hi', NULL, '2018-05-19 04:05:36'),
(5, '4', '3', 'Hello', NULL, '2018-05-19 04:05:48'),
(6, '3', '4', 'Hello', NULL, '2018-05-19 04:05:59'),
(7, '12', '21', 'hello', NULL, '2018-05-19 04:05:00'),
(8, '12', '21', 'how are you', NULL, '2018-05-19 04:05:04'),
(9, '12', '21', '??', NULL, '2018-05-19 05:05:35'),
(10, '12', '19', 'hey', NULL, '2018-05-19 05:05:10'),
(11, '12', '19', 'trainer', NULL, '2018-05-19 05:05:15'),
(12, '19', '12', 'hello', NULL, '2018-05-19 05:05:37'),
(13, '19', '12', 'trainee', NULL, '2018-05-19 05:05:40'),
(14, '19', '12', 'how are you', NULL, '2018-05-19 05:05:44'),
(15, '12', '19', 'f9 n u', NULL, '2018-05-19 05:05:14'),
(16, '12', '19', '?', NULL, '2018-05-19 05:05:17'),
(17, '13', '4', 'Hi', NULL, '2018-05-19 05:05:45'),
(18, '12', '19', 'hey', NULL, '2018-05-19 05:05:16'),
(19, '12', '19', 'replying', NULL, '2018-05-19 05:05:21'),
(20, '12', '19', '????', NULL, '2018-05-19 05:05:33'),
(21, '12', '19', 'hello', NULL, '2018-05-19 05:05:07'),
(22, '12', '19', 'hiii', NULL, '2018-05-19 05:05:10'),
(23, '19', '12', 'hello', NULL, '2018-05-19 05:05:34'),
(24, '19', '12', 'hiii', NULL, '2018-05-19 05:05:48'),
(25, '13', '4', 'Hi', NULL, '2018-05-19 05:05:51'),
(26, '13', '4', 'Hi', NULL, '2018-05-19 05:05:57'),
(27, '13', '4', 'Hi', NULL, '2018-05-19 05:05:06'),
(28, '13', '4', 'Hi', NULL, '2018-05-19 05:05:43'),
(29, '19', '12', 'hello', NULL, '2018-05-19 06:05:50'),
(30, '19', '12', 'hshhss', NULL, '2018-05-19 06:05:51'),
(31, '19', '12', 'hshshshshe', NULL, '2018-05-19 06:05:53'),
(32, '19', '12', 'hwhwhwhwhwhwhshshw', NULL, '2018-05-19 06:05:55'),
(33, '19', '12', 'hfghv', NULL, '2018-05-19 07:05:21'),
(34, '12', '19', 'hello', NULL, '2018-05-19 07:05:48'),
(35, '12', '19', 'what are you doing', NULL, '2018-05-19 07:05:54'),
(36, '12', '19', 'here', NULL, '2018-05-19 07:05:55'),
(37, '12', '19', 'do your wokr', NULL, '2018-05-19 07:05:58'),
(38, '12', '19', 'dont disturb me', NULL, '2018-05-19 07:05:11'),
(39, '12', '19', 'bsbs', NULL, '2018-05-19 07:05:15'),
(40, '12', '19', 'sjsjjw', NULL, '2018-05-19 07:05:15'),
(41, '3', '4', 'hi', NULL, '2018-05-19 12:05:25'),
(42, '3', '4', 'how are you ???', NULL, '2018-05-19 01:05:46'),
(43, '4', '3', 'I\'m goof', NULL, '2018-05-19 01:05:57'),
(44, '3', '4', 'its called good ', NULL, '2018-05-19 01:05:32'),
(45, '4', '3', 'okay', NULL, '2018-05-19 01:05:41'),
(46, '3', '4', 'jahshhs', NULL, '2018-05-19 01:05:43'),
(47, '4', '3', 'gh', NULL, '2018-05-19 01:05:45'),
(48, '4', '3', 'hjj', NULL, '2018-05-19 01:05:47'),
(49, '4', '3', 'fff', NULL, '2018-05-19 01:05:49'),
(50, '4', '3', 'sfh', NULL, '2018-05-19 01:05:52'),
(51, '3', '4', '2jzjs', NULL, '2018-05-19 01:05:00'),
(52, '3', '4', 'hzjahw', NULL, '2018-05-19 01:05:04'),
(53, '4', '3', 'hh', NULL, '2018-05-19 01:05:07'),
(54, '3', '4', 'gshsha', NULL, '2018-05-19 01:05:11'),
(55, '3', '4', 'vsgsgaa', NULL, '2018-05-19 01:05:17'),
(56, '3', '4', 'gggg', NULL, '2018-05-19 01:05:32'),
(57, '12', '19', 'Hello ', NULL, '2018-05-24 09:05:14'),
(58, '12', '19', 'Hello  jjj', NULL, '2018-05-24 09:05:32'),
(59, '12', '19', 'Hello  jjj', NULL, '2018-05-24 09:05:48'),
(60, '12', '19', 'Hello  hi', NULL, '2018-05-24 09:05:58'),
(61, '12', '19', 'Hello  hi', NULL, '2018-05-24 09:05:04'),
(62, '12', '19', 'Hello  hi', NULL, '2018-05-24 09:05:20'),
(63, '12', '19', 'Hello ', NULL, '2018-05-24 09:05:29'),
(64, '12', '19', 'Hello ', NULL, '2018-05-24 09:05:32'),
(65, '12', '19', 'Hello ', NULL, '2018-05-24 09:05:42'),
(66, '12', '19', 'Hello6545', NULL, '2018-05-24 09:05:51'),
(67, '12', '19', 'Hello6545', NULL, '2018-05-24 09:05:57'),
(68, '19', '12', 'hshshs', NULL, '2018-05-24 09:05:12'),
(69, '12', '19', 'Hello6545', NULL, '2018-05-24 09:05:15'),
(70, '12', '19', 'Hello6545', NULL, '2018-05-24 09:05:21'),
(71, '12', '19', 'Hello6545', NULL, '2018-05-24 09:05:29'),
(72, '12', '19', 'Hello6545', NULL, '2018-05-24 09:05:25'),
(73, '12', '19', 'Hello6545', NULL, '2018-05-24 09:05:28'),
(74, '12', '19', '8799879879879', NULL, '2018-05-24 09:05:35'),
(75, '12', '19', '54564564564', NULL, '2018-05-24 09:05:41'),
(76, '12', '19', 'jhghhjhhj', NULL, '2018-05-24 09:05:46'),
(77, '12', '19', 'jhghhjhhj', NULL, '2018-05-24 09:05:33'),
(78, '12', '19', 'kkkk', NULL, '2018-05-24 09:05:39'),
(79, '12', '19', 'kkkk', NULL, '2018-05-24 09:05:34'),
(80, '12', '19', 'hjhjkjkjhk', NULL, '2018-05-24 09:05:40'),
(81, '19', '12', 'hahsjs', NULL, '2018-05-24 09:05:45'),
(82, '12', '19', 'hjhjkjkjhk', NULL, '2018-05-24 09:05:50'),
(83, '12', '19', 'hjhjkjkjhk', NULL, '2018-05-24 09:05:51'),
(84, '12', '19', 'hjhjkjkjhk', NULL, '2018-05-24 09:05:52'),
(85, '12', '19', 'hjhjkjkjhk', NULL, '2018-05-24 09:05:53'),
(86, '12', '19', 'hjhjkjkjhk', NULL, '2018-05-24 09:05:53'),
(87, '12', '19', 'hjhjkjkjhk', NULL, '2018-05-24 09:05:54'),
(88, '12', '19', 'hjhjkjkjhk', NULL, '2018-05-24 09:05:05'),
(89, '19', '12', 'hshshss', NULL, '2018-05-24 09:05:08'),
(90, '12', '19', 'hjhjkjkjhk', NULL, '2018-05-24 09:05:12'),
(91, '12', '19', 'hjhjkjkjhk', NULL, '2018-05-24 09:05:15'),
(92, '12', '19', 'hjhjkjkjhk', NULL, '2018-05-24 09:05:15'),
(93, '12', '19', 'hjhjkjkjhk', NULL, '2018-05-24 09:05:16'),
(94, '19', '12', 'heh', NULL, '2018-05-24 09:05:19'),
(95, '19', '12', 'geh', NULL, '2018-05-24 09:05:21'),
(96, '19', '12', 'hdhd', NULL, '2018-05-24 09:05:24'),
(97, '19', '12', 'ddgdg', NULL, '2018-05-24 09:05:28'),
(98, '12', '19', 'hjhjkjkjhk', NULL, '2018-05-24 09:05:01'),
(99, '19', '25', 'hello', NULL, '2018-05-25 11:05:06'),
(100, '47', '19', 'hello', NULL, '2018-05-28 01:05:42'),
(101, '47', '19', 'hdhd', NULL, '2018-05-28 01:05:45'),
(102, '47', '19', 'shshs', NULL, '2018-05-28 01:05:48'),
(103, '47', '19', 'uhgg', NULL, '2018-05-28 01:05:55'),
(104, '19', '25', 'hjdjdn', NULL, '2018-05-28 01:05:49'),
(105, '3', '4', 'hh', NULL, '2018-05-28 01:05:08'),
(106, '3', '4', 'hh', NULL, '2018-05-28 01:05:20'),
(107, '51', '51', 'hey', NULL, '2018-05-31 06:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `vg_payment`
--

CREATE TABLE `vg_payment` (
  `paymentID` int(50) NOT NULL,
  `customerID` varchar(50) DEFAULT NULL,
  `bookingID` varchar(50) DEFAULT NULL,
  `paymentAmount` varchar(100) DEFAULT NULL,
  `admin_commission` int(65) NOT NULL DEFAULT '10',
  `tokanID` varchar(300) DEFAULT NULL,
  `transactionID` varchar(300) DEFAULT NULL,
  `chargeID` varchar(300) DEFAULT NULL,
  `paymentDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentStatus` enum('false','true') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vg_payment`
--

INSERT INTO `vg_payment` (`paymentID`, `customerID`, `bookingID`, `paymentAmount`, `admin_commission`, `tokanID`, `transactionID`, `chargeID`, `paymentDate`, `paymentStatus`) VALUES
(1, '3', '5', '4', 10, 'tok_1CS1YmB5ByCirRwKzM5PO8mX', 'txn_1CS1YnB5ByCirRwKuADNItCp', NULL, '2018-05-15 04:43:18', 'true'),
(2, '3', '5', '4', 10, 'tok_1CS1cUB5ByCirRwKB5QNA0QC', 'txn_1CS1cVB5ByCirRwKdlQ537xK', 'ch_1CS1cUB5ByCirRwK73FZhNMn', '2018-05-15 04:47:08', 'true'),
(3, '26', '17', '50', 10, 'tok_1CSQ8yB5ByCirRwKZMlKXQ0N', 'txn_1CSQ90B5ByCirRwKPdfpIK8Z', 'ch_1CSQ8zB5ByCirRwKmPdnwS6z', '2018-05-16 06:58:19', 'true'),
(4, '26', '17', '50', 10, 'tok_1CSQ9KB5ByCirRwKr7W4VCTO', 'txn_1CSQ9NB5ByCirRwKSPpcaGAw', 'ch_1CSQ9NB5ByCirRwKT7EjlfXc', '2018-05-16 06:58:41', 'true'),
(5, '12', '21', '14', 10, 'tok_1CSkG0B5ByCirRwKnpFYXwPl', 'txn_1CSkG1B5ByCirRwKxKYhuHEN', 'ch_1CSkG1B5ByCirRwKzsk1YUpy', '2018-05-17 04:26:54', 'true'),
(6, '12', '12', '50', 10, 'tok_1CTNFYB5ByCirRwK4z3vfMjf', 'txn_1CTNFZB5ByCirRwKfBpQX5eD', 'ch_1CTNFZB5ByCirRwKixmLN1hb', '2018-05-18 22:05:01', 'true'),
(21, '19', '44', '10', 10, 'tok_1CX4TZB5ByCirRwKcIxiiEjI', 'txn_1CX4TaB5ByCirRwKrVLGkhh9', 'ch_1CX4TaB5ByCirRwKjrn9cbqe', '2018-05-29 02:50:46', 'true'),
(20, '47', '42', '10', 10, 'tok_1CWl3LB5ByCirRwKCZWK5e6F', 'txn_1CWl3MB5ByCirRwKqjjIyzSH', 'ch_1CWl3MB5ByCirRwKx8ZAVULw', '2018-05-28 06:06:24', 'true'),
(19, '45', '38', '20', 10, 'tok_1CWeTTB5ByCirRwK3lusyOLs', 'txn_1CWeTUB5ByCirRwKI3z98dAo', 'ch_1CWeTUB5ByCirRwKMZ8CGlD8', '2018-05-27 23:04:57', 'true'),
(18, '19', '36', '10', 10, 'tok_1CVdkUB5ByCirRwKKXWgBFZC', 'txn_1CVdkVB5ByCirRwKhpLguYL4', 'ch_1CVdkUB5ByCirRwKwVvs2zYq', '2018-05-25 04:06:19', 'true'),
(17, '12', '29', '20', 10, 'tok_1CTPN9B5ByCirRwKUyD0qWLY', 'txn_1CTPNAB5ByCirRwKBrHVxVzL', 'ch_1CTPNAB5ByCirRwK4DZ4Gvxx', '2018-05-19 00:21:01', 'true'),
(16, '12', '18', '10', 10, 'tok_1CTOEsB5ByCirRwKQsH4ZQOM', 'txn_1CTOEtB5ByCirRwKwLPQaGSZ', 'ch_1CTOEtB5ByCirRwKPDhfpVKR', '2018-05-18 23:08:23', 'true'),
(15, '3', '27', '40', 10, 'tok_1CTO1TB5ByCirRwKQ2Ek0JKt', 'txn_1CTO1UB5ByCirRwKaw3lmYxT', 'ch_1CTO1TB5ByCirRwKqqUVVsef', '2018-05-18 22:54:32', 'true'),
(22, '19', '51', '36', 10, 'tok_1CX7aaB5ByCirRwKlWFw6KzL', 'txn_1CX7acB5ByCirRwKCJwmTdC1', 'ch_1CX7abB5ByCirRwKqUIAtF4y', '2018-05-29 06:10:14', 'true'),
(23, '19', '52', '17', 10, 'tok_1CXNhpB5ByCirRwK0tLXKJDr', 'txn_1CXNhqB5ByCirRwKIuQBcuNq', 'ch_1CXNhqB5ByCirRwK3tb8k68H', '2018-05-29 23:22:47', 'true'),
(24, '52', '53', '54', 10, 'tok_1CXNq2B5ByCirRwK38PImHWS', 'txn_1CXNq3B5ByCirRwKvn2C875l', 'ch_1CXNq3B5ByCirRwKXMADwGKS', '2018-05-29 23:31:16', 'true'),
(25, '52', '54', '18', 10, 'tok_1CXNuUB5ByCirRwK7dJ2RuLz', 'txn_1CXNuVB5ByCirRwKG6jCIybt', 'ch_1CXNuVB5ByCirRwKYU3G80yB', '2018-05-29 23:35:51', 'true'),
(26, '52', '55', '36', 10, 'tok_1CXOCWB5ByCirRwKtzXlCk8U', 'txn_1CXOCYB5ByCirRwK3cFP55EN', 'ch_1CXOCXB5ByCirRwKr4J3NNoo', '2018-05-29 23:54:30', 'true'),
(27, '52', '56', '90', 10, 'tok_1CXOasB5ByCirRwK4FDqdOxm', 'txn_1CXOauB5ByCirRwKWuxBPBi6', 'ch_1CXOatB5ByCirRwK9RnBImne', '2018-05-30 00:19:40', 'true'),
(28, '52', '57', '108', 10, 'tok_1CXOxuB5ByCirRwK0aEKlgrs', 'txn_1CXOxwB5ByCirRwKajPsX9hM', 'ch_1CXOxvB5ByCirRwK7mVKAl0c', '2018-05-30 00:43:28', 'true'),
(29, '52', '58', '18', 10, 'tok_1CXPA6B5ByCirRwKqp1yUwP7', 'txn_1CXPA7B5ByCirRwKruYWBp7e', 'ch_1CXPA7B5ByCirRwKnlMaWkgq', '2018-05-30 00:56:03', 'true'),
(30, '51', '61', '19', 10, 'tok_1CXkGxB5ByCirRwK00FTtcVp', 'txn_1CXkGyB5ByCirRwKmtXCcOHK', 'ch_1CXkGyB5ByCirRwKkjAHp1fQ', '2018-05-30 23:28:32', 'true'),
(31, '51', '62', '19', 10, 'tok_1CXqClB5ByCirRwKV8OBsr0Y', 'txn_1CXqCmB5ByCirRwKXmNDUztI', 'ch_1CXqCmB5ByCirRwKVYGFNro0', '2018-05-31 05:48:36', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `vg_payment_release`
--

CREATE TABLE `vg_payment_release` (
  `releaseID` int(50) NOT NULL,
  `bookingID` varchar(50) DEFAULT NULL,
  `trainerID` varchar(50) DEFAULT NULL,
  `releaseRequestDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `releaseDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `releaseStatus` enum('0','1','2','3') NOT NULL COMMENT '0=''No By Customer'', 1= ''Requested'', 2=''Yes By Customer'', 3=''Release By Admin'''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vg_payment_release`
--

INSERT INTO `vg_payment_release` (`releaseID`, `bookingID`, `trainerID`, `releaseRequestDate`, `releaseDate`, `releaseStatus`) VALUES
(1, '20', '34', '2018-05-17 02:13:02', '2018-05-01 00:00:00', '0'),
(2, '12', '4', '2018-05-17 05:21:34', '2018-05-31 05:05:15', '3'),
(3, '21', '21', '2018-05-17 05:27:17', '2018-05-21 07:05:31', '3'),
(4, '19', '34', '2018-05-18 05:49:08', '2018-05-01 00:00:00', '1'),
(5, '18', '34', '2018-05-18 05:49:17', '2018-05-19 02:05:33', '2'),
(6, '35', '34', '2018-05-23 20:46:44', '2018-05-23 20:46:44', '1'),
(7, '47', '19', '2018-05-29 23:17:41', '2018-05-29 23:17:41', '2'),
(8, '42', '19', '2018-05-29 23:19:05', '2018-05-29 23:19:05', '1'),
(9, '22', '19', '2018-05-29 23:20:23', '2018-05-29 23:20:23', '1'),
(10, '51', '19', '2018-05-29 23:21:57', '2018-05-29 23:21:57', '1'),
(11, '29', '19', '2018-05-29 23:21:59', '2018-05-29 23:21:59', '1'),
(12, '28', '19', '2018-05-29 23:22:02', '2018-05-29 23:22:02', '1'),
(13, '23', '19', '2018-05-29 23:22:04', '2018-05-29 23:22:04', '1'),
(14, '5', '19', '2018-05-29 23:22:06', '2018-05-29 23:22:06', '1'),
(15, '53', '52', '2018-05-29 23:31:43', '2018-05-29 23:31:43', '2'),
(16, '54', '52', '2018-05-29 23:49:47', '2018-05-29 23:49:47', '3'),
(17, '55', '52', '2018-05-29 23:55:14', '2018-05-29 23:55:14', '2'),
(18, '57', '52', '2018-05-30 00:48:01', '2018-05-30 00:48:01', '2'),
(19, '56', '52', '2018-05-30 00:54:45', '2018-05-30 00:54:45', '2'),
(20, '58', '52', '2018-05-30 00:56:22', '2018-05-30 00:56:22', '2'),
(21, '61', '51', '2018-05-30 23:33:16', '2018-05-30 23:33:16', '2'),
(22, '62', '51', '2018-05-31 05:48:51', '2018-05-31 05:48:51', '2');

-- --------------------------------------------------------

--
-- Table structure for table `vg_review`
--

CREATE TABLE `vg_review` (
  `reviewID` int(11) NOT NULL,
  `bookingID` varchar(50) DEFAULT NULL,
  `reviewBy` varchar(11) DEFAULT NULL,
  `reviewFor` varchar(11) DEFAULT NULL,
  `comment` varchar(300) DEFAULT NULL,
  `ratingNumber` varchar(50) DEFAULT NULL,
  `reviewDate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vg_review`
--

INSERT INTO `vg_review` (`reviewID`, `bookingID`, `reviewBy`, `reviewFor`, `comment`, `ratingNumber`, `reviewDate`) VALUES
(1, '3', '11', '5', 'Good Knowledge ', '3', '2018-05-09 08:05:15'),
(2, '3', '11', '5', 'Good Knowledge ', '5', '2018-05-11 06:05:07'),
(3, '56', '52', '52', 'good', '4.0', '2018-05-30 07:05:46'),
(4, '56', '52', '52', 'god', '5.0', '2018-05-30 07:05:37'),
(5, '56', '52', '52', 'bss', '2.0', '2018-05-30 07:05:33'),
(6, '56', '52', '52', 'bsbs', '1.0', '2018-05-30 07:05:26'),
(7, '57', '52', '52', 'yy', '5.0', '2018-05-30 07:05:55'),
(8, '57', '52', '52', 'sbsbs', '5.0', '2018-05-30 07:05:06'),
(9, '57', '52', '52', 'bb', '5.0', '2018-05-30 07:05:04'),
(10, '58', '52', '52', 'good service\n', '4.0', '2018-05-30 07:05:30'),
(11, '61', '51', '51', 'good', '5.0', '2018-05-31 06:05:22'),
(12, '62', '51', '51', 'good', '5.0', '2018-05-31 12:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `vg_setting`
--

CREATE TABLE `vg_setting` (
  `ID` int(50) NOT NULL,
  `fieldName` varchar(300) DEFAULT NULL,
  `fieldValue` varchar(300) DEFAULT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vg_setting`
--

INSERT INTO `vg_setting` (`ID`, `fieldName`, `fieldValue`, `Date`) VALUES
(1, 'site_logo', 'gjgg', '2018-05-20 23:23:19'),
(2, 'app_logo', 'app_loogo.png', '2018-05-20 23:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `vg_trainerProfile`
--

CREATE TABLE `vg_trainerProfile` (
  `ID` int(50) NOT NULL,
  `userID` varchar(50) DEFAULT NULL,
  `skills` varchar(300) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `cost_hours` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `trainerLat` varchar(50) DEFAULT NULL,
  `trainerLong` varchar(50) DEFAULT NULL,
  `availableHoursStart` varchar(100) DEFAULT NULL,
  `availableHoursEnd` varchar(100) DEFAULT NULL,
  `availableMon` enum('false','true') DEFAULT NULL COMMENT 'false=not,true=Yes',
  `availableThe` enum('false','true') DEFAULT NULL COMMENT '0=not,1=Yes',
  `availableWed` enum('false','true') DEFAULT NULL COMMENT '0=not,1=Yes',
  `availableThu` enum('false','true') DEFAULT NULL COMMENT '0=not,1=Yes',
  `availableFri` enum('false','true') DEFAULT NULL COMMENT '0=not,1=Yes',
  `availableSat` enum('false','true') DEFAULT NULL COMMENT '0=not,1=Yes',
  `availableSun` enum('false','true') DEFAULT NULL COMMENT '0=not,1=Yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vg_trainerProfile`
--

INSERT INTO `vg_trainerProfile` (`ID`, `userID`, `skills`, `experience`, `cost_hours`, `address`, `trainerLat`, `trainerLong`, `availableHoursStart`, `availableHoursEnd`, `availableMon`, `availableThe`, `availableWed`, `availableThu`, `availableFri`, `availableSat`, `availableSun`) VALUES
(18, '5', 'Weight Gain', '5', '20', 'indore', '22.7533', '75.8937', '10:25', '06:55', 'false', 'true', 'true', 'false', 'false', 'true', 'true'),
(17, '4', 'Weight Gain,jjj', '9', '20', 'indore', '25.66', '75.8596829', '10:25', '06:55', 'false', 'true', 'true', 'false', 'false', 'true', 'true'),
(19, '19', 'yoga', '3', '17', 'Vijay Nagar, Indore, Madhya Pradesh, India', '22.6857667', '75.8596602', '10:40', '18:0', 'true', 'true', 'true', 'true', 'true', 'true', 'true'),
(20, '21', 'yoga', '3', '14', 'indore', '22.6863731', '75.8604761', '18:0', '22:0', 'true', 'true', 'true', 'true', 'true', 'true', 'false'),
(21, '25', 'habs,hsha,hwhe,henw', '3', '10', 'indorr', '22.6857697', '75.8596828', '18:57', '18:57', 'true', 'true', 'false', 'false', 'false', 'true', 'true'),
(30, '34', 'basketball', '10', '1', '150 forestglade cres ottaw on', '45.3796556', '-75.6633305', '1:32', '23:40', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(29, '33', 'Weight Gain', '5', '20', 'indore', '25.66', '-156', '10:25', '06:55', 'false', 'true', 'true', 'false', 'false', 'true', 'true'),
(31, '38', 'test, test2', '10', '10', 'Indore Junction, Chhoti Gwaltoli, Indore, Madhya Pradesh, India', '22.7169994', '75.8684639', '0:20', '12:30', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(32, '24', '1', '1', '1', '150 Forestglade Crescent, Ottawa, ON, Canada', '45.3796556', '-75.6633305', '3:1', '23:1', 'true', 'true', 'true', 'true', 'true', 'true', 'true'),
(38, '3', NULL, NULL, NULL, 'indore', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '42', NULL, NULL, NULL, 'indore', NULL, NULL, NULL, NULL, 'false', 'true', 'true', NULL, 'false', 'true', 'true'),
(39, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false', NULL, NULL, NULL, NULL, NULL, NULL),
(40, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'true', NULL, NULL, NULL, NULL, NULL),
(41, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'true', NULL, NULL, NULL, NULL),
(42, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'false', NULL, NULL),
(43, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'true', NULL),
(44, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'true'),
(45, '23', 'deadlifts ', '5', '1', '12 Riverside Drive, Ottawa, ON, Canada', '45.3817161', '-75.6843863', NULL, NULL, 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(46, '52', 'Gym, Yoga', '5', '18', 'Palasia, Indore, Madhya Pradesh, India', '22.724355', '75.8838944', '10:0', '18:0', 'true', 'true', 'true', 'true', 'true', 'true', 'true'),
(47, '51', 'GYM, Yoga', '6', '19', 'Sai Ram Plaza, Mangal Nagar Road, Mangal Nagar, Indore, Madhya Pradesh, India', '22.685712', '75.85970449999999', '10:0', '20:0', 'true', 'true', 'true', 'true', 'true', 'true', 'true'),
(48, '54', 'hhh', '2', '2', 'Asda Hulme Superstore, Princess Road, Manchester, UK', '53.4610596', '-2.2461294', '19:16', '1:21', 'true', 'true', 'true', 'true', 'true', 'false', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `vg_trainer_account`
--

CREATE TABLE `vg_trainer_account` (
  `ID` int(50) NOT NULL,
  `trainerID` varchar(100) DEFAULT NULL,
  `transitNumber` varchar(100) DEFAULT NULL,
  `institutionNumber` varchar(100) DEFAULT NULL,
  `accountNumber` varchar(100) DEFAULT NULL,
  `agreement` enum('0','1') DEFAULT NULL,
  `approved` enum('false','true') DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vg_trainer_account`
--

INSERT INTO `vg_trainer_account` (`ID`, `trainerID`, `transitNumber`, `institutionNumber`, `accountNumber`, `agreement`, `approved`, `dateTime`) VALUES
(1, '4', '1234', '12345', '1233232626656', '1', 'true', '2018-05-11 04:05:51'),
(5, '25', '817171', '71717', '161616161616', '1', 'false', '2018-05-16 02:05:31'),
(4, '19', '882', '7277277', '727272727277272', '1', 'false', '2018-05-16 09:05:17'),
(6, '52', '123456', '1234567890', '1234567890', '1', 'false', '2018-05-30 07:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `vg_users`
--

CREATE TABLE `vg_users` (
  `ID` int(50) NOT NULL,
  `trainersID` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `UserPhone` varchar(20) DEFAULT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `UserProfile` varchar(300) DEFAULT NULL,
  `UserType` varchar(100) DEFAULT NULL,
  `UserPassword` varchar(300) DEFAULT NULL,
  `UserAddress` varchar(100) DEFAULT NULL,
  `UserLat` varchar(100) DEFAULT NULL,
  `UserLong` varchar(100) DEFAULT NULL,
  `UserfirbaseID` varchar(600) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_status` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vg_users`
--

INSERT INTO `vg_users` (`ID`, `trainersID`, `UserName`, `UserPhone`, `UserEmail`, `UserProfile`, `UserType`, `UserPassword`, `UserAddress`, `UserLat`, `UserLong`, `UserfirbaseID`, `registration_date`, `user_status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 0, 'Trainers1', '7894567458', 'trainers@gmail.com', 'photo-1535713875002-d1d0cf377fde1.jpg', '1', '81dc9bdb52d04dc20036dbd8313ed055', 'i\'m train................', NULL, NULL, NULL, '2022-01-13 04:52:11', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Trainee', '9638527410', 'trainee@gmail.com', 'pngtree-user-vector-avatar-png-image_15419626.jpg', '2', '81dc9bdb52d04dc20036dbd8313ed055', 'xzy road 1234', NULL, NULL, NULL, '2022-01-09 13:24:51', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 4, 'Trainee4', '7897897458', 'Trainee4@gmail.com', 'pngtree-user-vector-avatar-png-image_15419627.jpg', '2', '81dc9bdb52d04dc20036dbd8313ed055', 'trainee4 shfg', NULL, NULL, NULL, '2022-01-13 04:57:45', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 0, 'Ralf S', '9876678888', 'ralf@yopmail.com', '0', '1', 'e10adc3949ba59abbe56e057f20f883e', 'jdjkdjjdd', NULL, NULL, NULL, '2022-01-10 05:22:11', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 3, 'Trainee2', '8529637410', 'trainee2@gmail.com', 'bg.png', '2', '81dc9bdb52d04dc20036dbd8313ed055', 'AB road indore', NULL, NULL, NULL, '2022-01-13 05:16:56', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 3, 'tranee3', '1234567890', 'tranee3@mail.com', '0', '2', '25d55ad283aa400af464c76d713c07ad', 'Huston Texas', NULL, NULL, NULL, '2022-01-13 05:08:20', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 4, 'Trainee5', '7894567458', 'trainee5@gmail.com', 'icon-5359553_12801.png', '2', 'e10adc3949ba59abbe56e057f20f883e', 'test jhgsf', NULL, NULL, NULL, '2022-01-13 05:18:07', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 0, 'trainer2 111', '7897897897', 'trainers2@gmail.com', 'pngtree-user-vector-avatar-png-image_154196211.jpg', '2', '81dc9bdb52d04dc20036dbd8313ed055', 'sdffsdfsfd  sdfsdf', NULL, NULL, NULL, '2022-01-14 13:00:15', 0, 0, '0000-00-00 00:00:00', '2022-01-14 12:16:46'),
(10, 9, 'tranee11', '9874563210', 'tranee11@gmail.com', 'icon-5359553_12804.png', '2', '81dc9bdb52d04dc20036dbd8313ed055', 'test', NULL, NULL, NULL, '2022-01-14 08:18:51', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 9, 'tranee12', '987456985', 'tranee12@gmail.com', 'icon-5359553_12805.png', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'test', NULL, NULL, NULL, '2022-01-14 11:58:09', 0, 0, '0000-00-00 00:00:00', '2022-01-14 11:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `vg_wallet`
--

CREATE TABLE `vg_wallet` (
  `walletID` int(50) NOT NULL,
  `walletUserID` varchar(50) DEFAULT NULL,
  `walletCredit` int(100) DEFAULT NULL,
  `walletDebit` int(100) DEFAULT NULL,
  `activityDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vg_wallet`
--

INSERT INTO `vg_wallet` (`walletID`, `walletUserID`, `walletCredit`, `walletDebit`, `activityDate`) VALUES
(1, '21', 14, NULL, '2018-05-20 23:58:43'),
(2, '21', 14, NULL, '2018-05-20 23:59:57'),
(3, '21', 10, NULL, '2018-05-21 00:02:28'),
(4, '4', 50, NULL, '2018-05-30 22:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `vg_workout`
--

CREATE TABLE `vg_workout` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `UserType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vg_workout`
--

INSERT INTO `vg_workout` (`id`, `name`, `img`, `description`, `is_deleted`, `user_id`, `created_at`, `updated_at`, `UserType`) VALUES
(2, 'solders', 'icon-5359553_1280.png', 'solders solderssolders 111111111111', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'chest', 'Screenshot_(9)2.png', 'ggggggggggg - 00000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 'thai', 'pngtree-user-vector-avatar-png-image_15419623.jpg', 'test workout test workout', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 'leg', 'pngtree-user-vector-avatar-png-image_15419625.jpg', 'sdafasfd', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(9, 'Fingers ', 'terrorist-g44277eae4_640.jpg', 'Workout for bikerhands ', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(19, 'leg', 'leg.jpg', 'leg workout ', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(20, 'test sfsdf', 'leg1.jpg', 'testsdfsdfvsd dfgdfdfg', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vg_workout_plan`
--

CREATE TABLE `vg_workout_plan` (
  `id` int(11) NOT NULL,
  `traineeID` int(11) NOT NULL,
  `trainersID` int(11) DEFAULT NULL,
  `workoutID` varchar(255) NOT NULL,
  `day` int(11) NOT NULL,
  `repetition` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `UserType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vg_workout_plan`
--

INSERT INTO `vg_workout_plan` (`id`, `traineeID`, `trainersID`, `workoutID`, `day`, `repetition`, `is_deleted`, `user_id`, `created_at`, `updated_at`, `UserType`) VALUES
(1, 1, 0, '5,2,2', 2, '23,25,25', 0, 9, '0000-00-00 00:00:00', '2022-01-14 08:16:49', 1),
(2, 10, 9, '5,5,5', 2, '20,20,20', 1, 9, '0000-00-00 00:00:00', '2022-01-14 09:49:51', 1),
(3, 5, 1, '6,5,6,8', 2, '23,25,25,25', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 1, 0, '2,6,5,8', 1, '20,20,51,20', 0, 9, '0000-00-00 00:00:00', '2022-01-14 08:07:58', 1),
(6, 7, 4, '2', 1, '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 7, 4, '2,2,2,2', 1, '23,,,', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 7, 4, '2', 1, '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(9, 7, 4, '2', 1, '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(10, 7, 4, '2', 1, '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(11, 7, 4, '6,2,5', 1, '22,23,26', 1, 1, '2022-01-13 11:34:47', '2022-01-13 11:35:48', 0),
(12, 0, 9, '5,5,5', 1, '20,20,20', 0, 9, '2022-01-14 06:53:03', '0000-00-00 00:00:00', 1),
(13, 0, 9, '2,5,6', 1, '22,21,20', 0, 9, '2022-01-14 06:55:24', '0000-00-00 00:00:00', 1),
(14, 0, 9, '5,6,8', 1, '20,20,20', 0, 9, '2022-01-14 07:05:32', '0000-00-00 00:00:00', 1),
(15, 1, 0, '6,6,5', 1, '20,20,20', 0, 9, '2022-01-14 07:41:18', '2022-01-14 08:06:35', 1),
(16, 1, 9, '5,2,6,8', 1, '20,20,20,20', 0, 9, '2022-01-14 08:15:22', '0000-00-00 00:00:00', 1),
(17, 17, 9, '2,5,2', 1, '25,23,20', 0, 9, '2022-01-14 08:22:57', '2022-01-14 08:25:18', 1),
(18, 10, 9, '5,6,8', 4, '25,20,20', 0, 9, '2022-01-14 09:46:00', '2022-01-14 09:49:36', 1),
(19, 11, 9, '5,5,5', 1, '20,20,20', 0, 9, '2022-01-14 09:46:25', '0000-00-00 00:00:00', 1),
(20, 10, 9, '5,5,2', 1, '25,25,21', 0, 9, '2022-01-14 09:51:31', '0000-00-00 00:00:00', 1),
(21, 10, 9, '2,5,6,9', 1, '25,23,25,23', 1, 9, '2022-01-14 09:52:18', '0000-00-00 00:00:00', 1),
(22, 10, 9, '2,2,2', 1, '25,25,25', 1, 9, '2022-01-14 13:37:27', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vg_admin`
--
ALTER TABLE `vg_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vg_booking`
--
ALTER TABLE `vg_booking`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `vg_chat`
--
ALTER TABLE `vg_chat`
  ADD PRIMARY KEY (`chatID`);

--
-- Indexes for table `vg_payment`
--
ALTER TABLE `vg_payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `vg_payment_release`
--
ALTER TABLE `vg_payment_release`
  ADD PRIMARY KEY (`releaseID`);

--
-- Indexes for table `vg_review`
--
ALTER TABLE `vg_review`
  ADD PRIMARY KEY (`reviewID`);

--
-- Indexes for table `vg_setting`
--
ALTER TABLE `vg_setting`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vg_trainerProfile`
--
ALTER TABLE `vg_trainerProfile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vg_trainer_account`
--
ALTER TABLE `vg_trainer_account`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vg_users`
--
ALTER TABLE `vg_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vg_wallet`
--
ALTER TABLE `vg_wallet`
  ADD PRIMARY KEY (`walletID`);

--
-- Indexes for table `vg_workout`
--
ALTER TABLE `vg_workout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vg_workout_plan`
--
ALTER TABLE `vg_workout_plan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vg_admin`
--
ALTER TABLE `vg_admin`
  MODIFY `id` int(65) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vg_booking`
--
ALTER TABLE `vg_booking`
  MODIFY `bookingID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `vg_chat`
--
ALTER TABLE `vg_chat`
  MODIFY `chatID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `vg_payment`
--
ALTER TABLE `vg_payment`
  MODIFY `paymentID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `vg_payment_release`
--
ALTER TABLE `vg_payment_release`
  MODIFY `releaseID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vg_review`
--
ALTER TABLE `vg_review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vg_setting`
--
ALTER TABLE `vg_setting`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vg_trainerProfile`
--
ALTER TABLE `vg_trainerProfile`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `vg_trainer_account`
--
ALTER TABLE `vg_trainer_account`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vg_users`
--
ALTER TABLE `vg_users`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vg_wallet`
--
ALTER TABLE `vg_wallet`
  MODIFY `walletID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vg_workout`
--
ALTER TABLE `vg_workout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vg_workout_plan`
--
ALTER TABLE `vg_workout_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
