-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2020 at 07:08 PM
-- Server version: 10.3.21-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketgripe_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `before_order_table`
--

CREATE TABLE `before_order_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `before_order_table`
--

INSERT INTO `before_order_table` (`id`, `request_name`, `request_value`, `event_id`, `ticket_id`, `transaction_id`, `created_at`, `updated_at`) VALUES
(15, '_token', 'kxme8rN4o9cl4d4tRKtb9viLEjNZQfMYnSix8DUK', 3, 8, 'TGRIPE-5E1C58738E9A8', '2020-01-13 05:45:55', NULL),
(16, 'ticket_id', '8', 3, 8, 'TGRIPE-5E1C58738E9A8', '2020-01-13 05:45:55', NULL),
(17, 'ticket_count', '1', 3, 8, 'TGRIPE-5E1C58738E9A8', '2020-01-13 05:45:55', NULL),
(18, 'question_10', 'shuvo Mukherjee', 3, 8, 'TGRIPE-5E1C58738E9A8', '2020-01-13 05:45:55', NULL),
(19, 'question_11', 'shuvo.ezzyr@gmail.com', 3, 8, 'TGRIPE-5E1C58738E9A8', '2020-01-13 05:45:55', NULL),
(20, 'question_12', '01624389711', 3, 8, 'TGRIPE-5E1C58738E9A8', '2020-01-13 05:45:55', NULL),
(21, 'question_13', 'XL', 3, 8, 'TGRIPE-5E1C58738E9A8', '2020-01-13 05:45:55', NULL),
(22, 'address', 'BDBL Bhabon Karawan Bazar', 3, 8, 'TGRIPE-5E1C58738E9A8', '2020-01-13 05:45:55', NULL),
(23, '_token', 'kxme8rN4o9cl4d4tRKtb9viLEjNZQfMYnSix8DUK', 3, 8, 'TGRIPE-5E1C58BDAF526', '2020-01-13 05:47:09', NULL),
(24, 'ticket_id', '8', 3, 8, 'TGRIPE-5E1C58BDAF526', '2020-01-13 05:47:09', NULL),
(25, 'ticket_count', '1', 3, 8, 'TGRIPE-5E1C58BDAF526', '2020-01-13 05:47:09', NULL),
(26, 'question_10', 'shuvo Mukherjee', 3, 8, 'TGRIPE-5E1C58BDAF526', '2020-01-13 05:47:09', NULL),
(27, 'question_11', 'shuvo.ezzyr@gmail.com', 3, 8, 'TGRIPE-5E1C58BDAF526', '2020-01-13 05:47:09', NULL),
(28, 'question_12', '01624389711', 3, 8, 'TGRIPE-5E1C58BDAF526', '2020-01-13 05:47:09', NULL),
(29, 'question_13', 'XL', 3, 8, 'TGRIPE-5E1C58BDAF526', '2020-01-13 05:47:09', NULL),
(30, 'address', 'BDBL Bhabon Karawan Bazar', 3, 8, 'TGRIPE-5E1C58BDAF526', '2020-01-13 05:47:10', NULL),
(31, '_token', 'kxme8rN4o9cl4d4tRKtb9viLEjNZQfMYnSix8DUK', 3, 8, 'TGRIPE-5E1C6198F40B0', '2020-01-13 06:24:56', NULL),
(32, 'ticket_id', '8', 3, 8, 'TGRIPE-5E1C6198F40B0', '2020-01-13 06:24:57', NULL),
(33, 'ticket_count', '1', 3, 8, 'TGRIPE-5E1C6198F40B0', '2020-01-13 06:24:57', NULL),
(34, 'Full_name', 'safdsdf', 3, 8, 'TGRIPE-5E1C6198F40B0', '2020-01-13 06:24:57', NULL),
(35, 'Email', 'shuvo@gmail.com', 3, 8, 'TGRIPE-5E1C6198F40B0', '2020-01-13 06:24:57', NULL),
(36, 'Mobile', '0154477', 3, 8, 'TGRIPE-5E1C6198F40B0', '2020-01-13 06:24:57', NULL),
(37, 'T-Shirt_Size', 'XL', 3, 8, 'TGRIPE-5E1C6198F40B0', '2020-01-13 06:24:57', NULL),
(38, '_token', 'kxme8rN4o9cl4d4tRKtb9viLEjNZQfMYnSix8DUK', 3, 8, 'TGRIPE-5E1C625EF14D8', '2020-01-13 06:28:14', NULL),
(39, 'ticket_id', '8', 3, 8, 'TGRIPE-5E1C625EF14D8', '2020-01-13 06:28:15', NULL),
(40, 'ticket_count', '1', 3, 8, 'TGRIPE-5E1C625EF14D8', '2020-01-13 06:28:15', NULL),
(41, 'Full_name', 'safdsdf', 3, 8, 'TGRIPE-5E1C625EF14D8', '2020-01-13 06:28:15', NULL),
(42, 'Email', 'shuvo@gmail.com', 3, 8, 'TGRIPE-5E1C625EF14D8', '2020-01-13 06:28:15', NULL),
(43, 'Mobile', '0154477', 3, 8, 'TGRIPE-5E1C625EF14D8', '2020-01-13 06:28:15', NULL),
(44, 'T-Shirt_Size', 'XL', 3, 8, 'TGRIPE-5E1C625EF14D8', '2020-01-13 06:28:15', NULL),
(45, 'address', 'sfgdsg', 3, 8, 'TGRIPE-5E1C625EF14D8', '2020-01-13 06:28:15', NULL),
(46, '_token', 'kxme8rN4o9cl4d4tRKtb9viLEjNZQfMYnSix8DUK', 3, 8, 'TGRIPE-5E1C6270071A9', '2020-01-13 06:28:32', NULL),
(47, 'ticket_id', '8', 3, 8, 'TGRIPE-5E1C6270071A9', '2020-01-13 06:28:32', NULL),
(48, 'ticket_count', '1', 3, 8, 'TGRIPE-5E1C6270071A9', '2020-01-13 06:28:32', NULL),
(49, 'Full_name', 'safdsdf', 3, 8, 'TGRIPE-5E1C6270071A9', '2020-01-13 06:28:32', NULL),
(50, 'Email', 'shuvo@gmail.com', 3, 8, 'TGRIPE-5E1C6270071A9', '2020-01-13 06:28:32', NULL),
(51, 'Mobile', '0154477', 3, 8, 'TGRIPE-5E1C6270071A9', '2020-01-13 06:28:32', NULL),
(52, 'T-Shirt_Size', 'XL', 3, 8, 'TGRIPE-5E1C6270071A9', '2020-01-13 06:28:32', NULL),
(53, 'address', 'sfgdsg', 3, 8, 'TGRIPE-5E1C6270071A9', '2020-01-13 06:28:32', NULL),
(54, '_token', 'DdsOW8LL8fuWrAsNixi3x8SiIintCH9SGH4ltKEj', 3, 8, 'TGRIPE-5E1D62FBA0BC1', '2020-01-14 00:43:07', NULL),
(55, 'ticket_id', '8', 3, 8, 'TGRIPE-5E1D62FBA0BC1', '2020-01-14 00:43:07', NULL),
(56, 'ticket_count', '1', 3, 8, 'TGRIPE-5E1D62FBA0BC1', '2020-01-14 00:43:07', NULL),
(57, 'Full_name', 'safdsdf', 3, 8, 'TGRIPE-5E1D62FBA0BC1', '2020-01-14 00:43:07', NULL),
(58, 'Email', 'shuvo@gmail.com', 3, 8, 'TGRIPE-5E1D62FBA0BC1', '2020-01-14 00:43:07', NULL),
(59, 'Mobile', '0154477', 3, 8, 'TGRIPE-5E1D62FBA0BC1', '2020-01-14 00:43:07', NULL),
(60, 'T-Shirt_Size', 'XL', 3, 8, 'TGRIPE-5E1D62FBA0BC1', '2020-01-14 00:43:07', NULL),
(61, 'address', 'BDBL Bhabon Karawan Bazar', 3, 8, 'TGRIPE-5E1D62FBA0BC1', '2020-01-14 00:43:07', NULL),
(62, '_token', 'F4AGtKyareaglncmBclIc57EdAW5M5clgE81U1dC', 6, 11, 'TGRIPE-5E1DBE85B2E29', '2020-01-14 01:13:41', NULL),
(63, 'ticket_id', '11', 6, 11, 'TGRIPE-5E1DBE85B2E29', '2020-01-14 01:13:41', NULL),
(64, 'ticket_count', '1', 6, 11, 'TGRIPE-5E1DBE85B2E29', '2020-01-14 01:13:41', NULL),
(65, 'University', 'NSU', 6, 11, 'TGRIPE-5E1DBE85B2E29', '2020-01-14 01:13:41', NULL),
(66, 'Full_name', 'Khan Swadhin', 6, 11, 'TGRIPE-5E1DBE85B2E29', '2020-01-14 01:13:41', NULL),
(67, 'Email', 'khan.swadhin@gmail.com', 6, 11, 'TGRIPE-5E1DBE85B2E29', '2020-01-14 01:13:41', NULL),
(68, 'Mobile', '01823662233', 6, 11, 'TGRIPE-5E1DBE85B2E29', '2020-01-14 01:13:41', NULL),
(69, 'address', 'Madhukhali, Faridpur', 6, 11, 'TGRIPE-5E1DBE85B2E29', '2020-01-14 01:13:41', NULL),
(70, '_token', 'F4AGtKyareaglncmBclIc57EdAW5M5clgE81U1dC', 6, 11, 'TGRIPE-5E1DBE9F57DD0', '2020-01-14 01:14:07', NULL),
(71, 'ticket_id', '11', 6, 11, 'TGRIPE-5E1DBE9F57DD0', '2020-01-14 01:14:07', NULL),
(72, 'ticket_count', '1', 6, 11, 'TGRIPE-5E1DBE9F57DD0', '2020-01-14 01:14:07', NULL),
(73, 'University', 'UIU', 6, 11, 'TGRIPE-5E1DBE9F57DD0', '2020-01-14 01:14:07', NULL),
(74, 'Full_name', 'Khan Mohammad Nakib', 6, 11, 'TGRIPE-5E1DBE9F57DD0', '2020-01-14 01:14:07', NULL),
(75, 'Email', 'litonphone@gmail.com', 6, 11, 'TGRIPE-5E1DBE9F57DD0', '2020-01-14 01:14:07', NULL),
(76, 'Mobile', '+8801823662233', 6, 11, 'TGRIPE-5E1DBE9F57DD0', '2020-01-14 01:14:07', NULL),
(77, 'address', 'Madhukhali, Faridpur', 6, 11, 'TGRIPE-5E1DBE9F57DD0', '2020-01-14 01:14:07', NULL),
(78, '_token', 'D5A2HCfVFkw86QaoYIbC6vQhKj4f2g5LuR4oAodk', 8, 12, 'TGRIPE-5E1ECBF8C8303', '2020-01-14 20:23:20', NULL),
(79, 'ticket_id', '12', 8, 12, 'TGRIPE-5E1ECBF8C8303', '2020-01-14 20:23:20', NULL),
(80, 'ticket_count', '1', 8, 12, 'TGRIPE-5E1ECBF8C8303', '2020-01-14 20:23:20', NULL),
(81, 'Name', 'md kamal', 8, 12, 'TGRIPE-5E1ECBF8C8303', '2020-01-14 20:23:20', NULL),
(82, 'Email', 'kamal@ipl.com', 8, 12, 'TGRIPE-5E1ECBF8C8303', '2020-01-14 20:23:20', NULL),
(83, 'Mobile', '1234567890', 8, 12, 'TGRIPE-5E1ECBF8C8303', '2020-01-14 20:23:20', NULL),
(84, 'address', 'dfhakjlfhasdfha', 8, 12, 'TGRIPE-5E1ECBF8C8303', '2020-01-14 20:23:20', NULL),
(85, '_token', 'D5A2HCfVFkw86QaoYIbC6vQhKj4f2g5LuR4oAodk', 8, 12, 'TGRIPE-5E1ED25FE94D1', '2020-01-14 20:50:39', NULL),
(86, 'ticket_id', '12', 8, 12, 'TGRIPE-5E1ED25FE94D1', '2020-01-14 20:50:39', NULL),
(87, 'ticket_count', '1', 8, 12, 'TGRIPE-5E1ED25FE94D1', '2020-01-14 20:50:39', NULL),
(88, 'Name', 'md kamal', 8, 12, 'TGRIPE-5E1ED25FE94D1', '2020-01-14 20:50:39', NULL),
(89, 'Email', 'kamal@ipl.com', 8, 12, 'TGRIPE-5E1ED25FE94D1', '2020-01-14 20:50:39', NULL),
(90, 'Mobile', '1234567890', 8, 12, 'TGRIPE-5E1ED25FE94D1', '2020-01-14 20:50:39', NULL),
(91, 'address', 'dfhakjlfhasdfha', 8, 12, 'TGRIPE-5E1ED25FE94D1', '2020-01-14 20:50:39', NULL),
(92, '_token', 'D5A2HCfVFkw86QaoYIbC6vQhKj4f2g5LuR4oAodk', 8, 12, 'TGRIPE-5E1ED286005F5', '2020-01-14 20:51:18', NULL),
(93, 'ticket_id', '12', 8, 12, 'TGRIPE-5E1ED286005F5', '2020-01-14 20:51:18', NULL),
(94, 'ticket_count', '1', 8, 12, 'TGRIPE-5E1ED286005F5', '2020-01-14 20:51:18', NULL),
(95, 'Name', 'md kamal', 8, 12, 'TGRIPE-5E1ED286005F5', '2020-01-14 20:51:18', NULL),
(96, 'Email', 'kamal@ipl.com', 8, 12, 'TGRIPE-5E1ED286005F5', '2020-01-14 20:51:18', NULL),
(97, 'Mobile', '1234567890', 8, 12, 'TGRIPE-5E1ED286005F5', '2020-01-14 20:51:18', NULL),
(98, 'address', 'dfhakjlfhasdfha', 8, 12, 'TGRIPE-5E1ED286005F5', '2020-01-14 20:51:18', NULL),
(99, '_token', 'C9kvYk2GxSmjI7PDEtx0XJJYu4n2JDDxsdPZQDgZ', 5, 10, 'TGRIPE-5E1ED2E7DB560', '2020-01-14 20:52:55', NULL),
(100, 'ticket_id', '10', 5, 10, 'TGRIPE-5E1ED2E7DB560', '2020-01-14 20:52:55', NULL),
(101, 'ticket_count', '1', 5, 10, 'TGRIPE-5E1ED2E7DB560', '2020-01-14 20:52:55', NULL),
(102, 'Full_name', 'sifat', 5, 10, 'TGRIPE-5E1ED2E7DB560', '2020-01-14 20:52:55', NULL),
(103, 'Email', 'ahnafshanto2@gmail.com', 5, 10, 'TGRIPE-5E1ED2E7DB560', '2020-01-14 20:52:55', NULL),
(104, 'Mobile', '11111111111', 5, 10, 'TGRIPE-5E1ED2E7DB560', '2020-01-14 20:52:55', NULL),
(105, 'address', '12 Kazi Nazrul Islam Ave', 5, 10, 'TGRIPE-5E1ED2E7DB560', '2020-01-14 20:52:55', NULL),
(106, '_token', 'C9kvYk2GxSmjI7PDEtx0XJJYu4n2JDDxsdPZQDgZ', 5, 10, 'TGRIPE-5E1ED2F5BCC03', '2020-01-14 20:53:09', NULL),
(107, 'ticket_id', '10', 5, 10, 'TGRIPE-5E1ED2F5BCC03', '2020-01-14 20:53:09', NULL),
(108, 'ticket_count', '1', 5, 10, 'TGRIPE-5E1ED2F5BCC03', '2020-01-14 20:53:09', NULL),
(109, 'Full_name', 'sifat', 5, 10, 'TGRIPE-5E1ED2F5BCC03', '2020-01-14 20:53:09', NULL),
(110, 'Email', 'ahnafshanto2@gmail.com', 5, 10, 'TGRIPE-5E1ED2F5BCC03', '2020-01-14 20:53:09', NULL),
(111, 'Mobile', '11111111111', 5, 10, 'TGRIPE-5E1ED2F5BCC03', '2020-01-14 20:53:09', NULL),
(112, 'address', '12 Kazi Nazrul Islam Ave', 5, 10, 'TGRIPE-5E1ED2F5BCC03', '2020-01-14 20:53:09', NULL),
(113, '_token', 'D5A2HCfVFkw86QaoYIbC6vQhKj4f2g5LuR4oAodk', 6, 11, 'TGRIPE-5E1ED30015DBB', '2020-01-14 20:53:20', NULL),
(114, 'ticket_id', '11', 6, 11, 'TGRIPE-5E1ED30015DBB', '2020-01-14 20:53:20', NULL),
(115, 'ticket_count', '1', 6, 11, 'TGRIPE-5E1ED30015DBB', '2020-01-14 20:53:20', NULL),
(116, 'University', 'UIU', 6, 11, 'TGRIPE-5E1ED30015DBB', '2020-01-14 20:53:20', NULL),
(117, 'Full_name', 'fasdfa', 6, 11, 'TGRIPE-5E1ED30015DBB', '2020-01-14 20:53:20', NULL),
(118, 'Email', 'adf@a.com', 6, 11, 'TGRIPE-5E1ED30015DBB', '2020-01-14 20:53:20', NULL),
(119, 'Mobile', '1234560', 6, 11, 'TGRIPE-5E1ED30015DBB', '2020-01-14 20:53:20', NULL),
(120, 'address', 'fadfa', 6, 11, 'TGRIPE-5E1ED30015DBB', '2020-01-14 20:53:20', NULL),
(121, '_token', 'D5A2HCfVFkw86QaoYIbC6vQhKj4f2g5LuR4oAodk', 8, 12, 'TGRIPE-5E1ED3168F6C4', '2020-01-14 20:53:42', NULL),
(122, 'ticket_id', '12', 8, 12, 'TGRIPE-5E1ED3168F6C4', '2020-01-14 20:53:42', NULL),
(123, 'ticket_count', '1', 8, 12, 'TGRIPE-5E1ED3168F6C4', '2020-01-14 20:53:42', NULL),
(124, 'Name', 'dfaf', 8, 12, 'TGRIPE-5E1ED3168F6C4', '2020-01-14 20:53:42', NULL),
(125, 'Email', 'kamal@ipl.com', 8, 12, 'TGRIPE-5E1ED3168F6C4', '2020-01-14 20:53:42', NULL),
(126, 'Mobile', '1234567890', 8, 12, 'TGRIPE-5E1ED3168F6C4', '2020-01-14 20:53:42', NULL),
(127, 'address', 'dfhakjlfhasdfha', 8, 12, 'TGRIPE-5E1ED3168F6C4', '2020-01-14 20:53:42', NULL),
(128, '_token', 'C9kvYk2GxSmjI7PDEtx0XJJYu4n2JDDxsdPZQDgZ', 5, 10, 'TGRIPE-5E1ED3684A273', '2020-01-14 20:55:04', NULL),
(129, 'ticket_id', '10', 5, 10, 'TGRIPE-5E1ED3684A273', '2020-01-14 20:55:04', NULL),
(130, 'ticket_count', '1', 5, 10, 'TGRIPE-5E1ED3684A273', '2020-01-14 20:55:04', NULL),
(131, 'Full_name', 'sifat', 5, 10, 'TGRIPE-5E1ED3684A273', '2020-01-14 20:55:04', NULL),
(132, 'Email', 'ahnafshanto2@gmail.com', 5, 10, 'TGRIPE-5E1ED3684A273', '2020-01-14 20:55:04', NULL),
(133, 'Mobile', '11111111111', 5, 10, 'TGRIPE-5E1ED3684A273', '2020-01-14 20:55:04', NULL),
(134, 'address', '12 Kazi Nazrul Islam Ave', 5, 10, 'TGRIPE-5E1ED3684A273', '2020-01-14 20:55:04', NULL),
(135, '_token', 'C9kvYk2GxSmjI7PDEtx0XJJYu4n2JDDxsdPZQDgZ', 5, 10, 'TGRIPE-5E1ED40A9893A', '2020-01-14 20:57:46', NULL),
(136, 'ticket_id', '10', 5, 10, 'TGRIPE-5E1ED40A9893A', '2020-01-14 20:57:46', NULL),
(137, 'ticket_count', '1', 5, 10, 'TGRIPE-5E1ED40A9893A', '2020-01-14 20:57:46', NULL),
(138, 'Full_name', 'sifat', 5, 10, 'TGRIPE-5E1ED40A9893A', '2020-01-14 20:57:46', NULL),
(139, 'Email', 'ahnafshanto2@gmail.com', 5, 10, 'TGRIPE-5E1ED40A9893A', '2020-01-14 20:57:46', NULL),
(140, 'Mobile', '11111111111', 5, 10, 'TGRIPE-5E1ED40A9893A', '2020-01-14 20:57:46', NULL),
(141, 'address', '12 Kazi Nazrul Islam Ave', 5, 10, 'TGRIPE-5E1ED40A9893A', '2020-01-14 20:57:46', NULL),
(142, '_token', 'C9kvYk2GxSmjI7PDEtx0XJJYu4n2JDDxsdPZQDgZ', 5, 13, 'TGRIPE-5E1ED44807202', '2020-01-14 20:58:48', NULL),
(143, 'ticket_id', '13', 5, 13, 'TGRIPE-5E1ED44807202', '2020-01-14 20:58:48', NULL),
(144, 'ticket_count', '1', 5, 13, 'TGRIPE-5E1ED44807202', '2020-01-14 20:58:48', NULL),
(145, 'Name', 'demo', 5, 13, 'TGRIPE-5E1ED44807202', '2020-01-14 20:58:48', NULL),
(146, 'Email', 'ahnafshanto2@gmail.com', 5, 13, 'TGRIPE-5E1ED44807202', '2020-01-14 20:58:48', NULL),
(147, 'Mobile', '123456', 5, 13, 'TGRIPE-5E1ED44807202', '2020-01-14 20:58:48', NULL),
(148, 'address', '12 Kazi Nazrul Islam Ave', 5, 13, 'TGRIPE-5E1ED44807202', '2020-01-14 20:58:48', NULL),
(149, '_token', 'ib9mzG3zokul8GGvyxqazg69pgMRs4BMgx8faHkX', 5, 10, 'TGRIPE-5E1ED47A1E15D', '2020-01-14 20:59:38', NULL),
(150, 'ticket_id', '10', 5, 10, 'TGRIPE-5E1ED47A1E15D', '2020-01-14 20:59:38', NULL),
(151, 'ticket_count', '1', 5, 10, 'TGRIPE-5E1ED47A1E15D', '2020-01-14 20:59:38', NULL),
(152, 'Full_name', 'sifat', 5, 10, 'TGRIPE-5E1ED47A1E15D', '2020-01-14 20:59:38', NULL),
(153, 'Email', 'ahnafshanto2@gmail.com', 5, 10, 'TGRIPE-5E1ED47A1E15D', '2020-01-14 20:59:38', NULL),
(154, 'Mobile', '123456', 5, 10, 'TGRIPE-5E1ED47A1E15D', '2020-01-14 20:59:38', NULL),
(155, 'address', '12 Kazi Nazrul Islam Ave', 5, 10, 'TGRIPE-5E1ED47A1E15D', '2020-01-14 20:59:38', NULL),
(156, '_token', 'ib9mzG3zokul8GGvyxqazg69pgMRs4BMgx8faHkX', 5, 10, 'TGRIPE-5E1ED48438480', '2020-01-14 20:59:48', NULL),
(157, 'ticket_id', '10', 5, 10, 'TGRIPE-5E1ED48438480', '2020-01-14 20:59:48', NULL),
(158, 'ticket_count', '1', 5, 10, 'TGRIPE-5E1ED48438480', '2020-01-14 20:59:48', NULL),
(159, 'Full_name', 'sifat', 5, 10, 'TGRIPE-5E1ED48438480', '2020-01-14 20:59:48', NULL),
(160, 'Email', 'ahnafshanto2@gmail.com', 5, 10, 'TGRIPE-5E1ED48438480', '2020-01-14 20:59:48', NULL),
(161, 'Mobile', '123456', 5, 10, 'TGRIPE-5E1ED48438480', '2020-01-14 20:59:48', NULL),
(162, 'address', '12 Kazi Nazrul Islam Ave', 5, 10, 'TGRIPE-5E1ED48438480', '2020-01-14 20:59:48', NULL),
(163, '_token', 'ib9mzG3zokul8GGvyxqazg69pgMRs4BMgx8faHkX', 5, 13, 'TGRIPE-5E1ED49792F42', '2020-01-14 21:00:07', NULL),
(164, 'ticket_id', '13', 5, 13, 'TGRIPE-5E1ED49792F42', '2020-01-14 21:00:07', NULL),
(165, 'ticket_count', '1', 5, 13, 'TGRIPE-5E1ED49792F42', '2020-01-14 21:00:07', NULL),
(166, 'Name', 'demo', 5, 13, 'TGRIPE-5E1ED49792F42', '2020-01-14 21:00:07', NULL),
(167, 'Email', 'ahnafshanto2@gmail.com', 5, 13, 'TGRIPE-5E1ED49792F42', '2020-01-14 21:00:07', NULL),
(168, 'Mobile', '21345', 5, 13, 'TGRIPE-5E1ED49792F42', '2020-01-14 21:00:07', NULL),
(169, 'address', '12 Kazi Nazrul Islam Ave', 5, 13, 'TGRIPE-5E1ED49792F42', '2020-01-14 21:00:07', NULL),
(170, '_token', 'C9kvYk2GxSmjI7PDEtx0XJJYu4n2JDDxsdPZQDgZ', 5, 13, 'TGRIPE-5E1ED4DD30480', '2020-01-14 21:01:17', NULL),
(171, 'ticket_id', '13', 5, 13, 'TGRIPE-5E1ED4DD30480', '2020-01-14 21:01:17', NULL),
(172, 'ticket_count', '1', 5, 13, 'TGRIPE-5E1ED4DD30480', '2020-01-14 21:01:17', NULL),
(173, 'Name', 'demo', 5, 13, 'TGRIPE-5E1ED4DD30480', '2020-01-14 21:01:17', NULL),
(174, 'Email', 'sifat.ezzyr@gmail.com', 5, 13, 'TGRIPE-5E1ED4DD30480', '2020-01-14 21:01:17', NULL),
(175, 'Mobile', '123456', 5, 13, 'TGRIPE-5E1ED4DD30480', '2020-01-14 21:01:17', NULL),
(176, 'address', '12 Kazi Nazrul Islam Ave', 5, 13, 'TGRIPE-5E1ED4DD30480', '2020-01-14 21:01:17', NULL),
(177, '_token', 'D5A2HCfVFkw86QaoYIbC6vQhKj4f2g5LuR4oAodk', 8, 14, 'TGRIPE-5E1ED4FC11C96', '2020-01-14 21:01:48', NULL),
(178, 'ticket_id', '14', 8, 14, 'TGRIPE-5E1ED4FC11C96', '2020-01-14 21:01:48', NULL),
(179, 'ticket_count', '1', 8, 14, 'TGRIPE-5E1ED4FC11C96', '2020-01-14 21:01:48', NULL),
(180, 'Name', 'md kamal', 8, 14, 'TGRIPE-5E1ED4FC11C96', '2020-01-14 21:01:48', NULL),
(181, 'Email', 'kamal@ipl.com', 8, 14, 'TGRIPE-5E1ED4FC11C96', '2020-01-14 21:01:48', NULL),
(182, 'Mobile', '1234567890', 8, 14, 'TGRIPE-5E1ED4FC11C96', '2020-01-14 21:01:48', NULL),
(183, 'address', 'dfhakjlfhasdfha', 8, 14, 'TGRIPE-5E1ED4FC11C96', '2020-01-14 21:01:48', NULL),
(184, '_token', 'EJTNhEJzGeTrg1G4QtxdDgJsOsD8ADI5HfUJrkir', 9, 16, 'TGRIPE-5E1EE92355EE5', '2020-01-14 22:27:47', NULL),
(185, 'ticket_id', '16', 9, 16, 'TGRIPE-5E1EE92355EE5', '2020-01-14 22:27:47', NULL),
(186, 'ticket_count', '3', 9, 16, 'TGRIPE-5E1EE92355EE5', '2020-01-14 22:27:47', NULL),
(187, 'Name', 'sifat', 9, 16, 'TGRIPE-5E1EE92355EE5', '2020-01-14 22:27:47', NULL),
(188, 'Email', 'ahnafshanto2@gmail.com', 9, 16, 'TGRIPE-5E1EE92355EE5', '2020-01-14 22:27:47', NULL),
(189, 'Mobile', '123456', 9, 16, 'TGRIPE-5E1EE92355EE5', '2020-01-14 22:27:47', NULL),
(190, 'address', '12 Kazi Nazrul Islam Ave', 9, 16, 'TGRIPE-5E1EE92355EE5', '2020-01-14 22:27:47', NULL),
(191, '_token', 'EJTNhEJzGeTrg1G4QtxdDgJsOsD8ADI5HfUJrkir', 9, 16, 'TGRIPE-5E1EE933C13EA', '2020-01-14 22:28:03', NULL),
(192, 'ticket_id', '16', 9, 16, 'TGRIPE-5E1EE933C13EA', '2020-01-14 22:28:03', NULL),
(193, 'ticket_count', '1', 9, 16, 'TGRIPE-5E1EE933C13EA', '2020-01-14 22:28:03', NULL),
(194, 'Name', 'sifat', 9, 16, 'TGRIPE-5E1EE933C13EA', '2020-01-14 22:28:03', NULL),
(195, 'Email', 'ahnafshanto2@gmail.com', 9, 16, 'TGRIPE-5E1EE933C13EA', '2020-01-14 22:28:03', NULL),
(196, 'Mobile', '123456', 9, 16, 'TGRIPE-5E1EE933C13EA', '2020-01-14 22:28:03', NULL),
(197, 'address', '12 Kazi Nazrul Islam Ave', 9, 16, 'TGRIPE-5E1EE933C13EA', '2020-01-14 22:28:03', NULL),
(198, '_token', 'EJTNhEJzGeTrg1G4QtxdDgJsOsD8ADI5HfUJrkir', 9, 16, 'TGRIPE-5E1EE9FF3D9E2', '2020-01-14 22:31:27', NULL),
(199, 'ticket_id', '16', 9, 16, 'TGRIPE-5E1EE9FF3D9E2', '2020-01-14 22:31:27', NULL),
(200, 'ticket_count', '1', 9, 16, 'TGRIPE-5E1EE9FF3D9E2', '2020-01-14 22:31:27', NULL),
(201, 'Name', 'sifat', 9, 16, 'TGRIPE-5E1EE9FF3D9E2', '2020-01-14 22:31:27', NULL),
(202, 'Email', 'sdas@sdf.com', 9, 16, 'TGRIPE-5E1EE9FF3D9E2', '2020-01-14 22:31:27', NULL),
(203, 'Mobile', '11111111111', 9, 16, 'TGRIPE-5E1EE9FF3D9E2', '2020-01-14 22:31:27', NULL),
(204, 'address', '12 Kazi Nazrul Islam Ave', 9, 16, 'TGRIPE-5E1EE9FF3D9E2', '2020-01-14 22:31:27', NULL),
(205, '_token', 'EJTNhEJzGeTrg1G4QtxdDgJsOsD8ADI5HfUJrkir', 9, 19, 'TGRIPE-5E1EF5C949AE7', '2020-01-14 23:21:45', NULL),
(206, 'ticket_id', '19', 9, 19, 'TGRIPE-5E1EF5C949AE7', '2020-01-14 23:21:45', NULL),
(207, 'ticket_count', '1', 9, 19, 'TGRIPE-5E1EF5C949AE7', '2020-01-14 23:21:45', NULL),
(208, 'Name', 'sifat', 9, 19, 'TGRIPE-5E1EF5C949AE7', '2020-01-14 23:21:45', NULL),
(209, 'Email', 'sifat.ezzyr@gmail.com', 9, 19, 'TGRIPE-5E1EF5C949AE7', '2020-01-14 23:21:45', NULL),
(210, 'Mobile', '123456', 9, 19, 'TGRIPE-5E1EF5C949AE7', '2020-01-14 23:21:45', NULL),
(211, 'address', '12 Kazi Nazrul Islam Ave', 9, 19, 'TGRIPE-5E1EF5C949AE7', '2020-01-14 23:21:45', NULL),
(212, '_token', 'EJTNhEJzGeTrg1G4QtxdDgJsOsD8ADI5HfUJrkir', 9, 20, 'TG-5E1EFAC2015E8', '2020-01-14 23:42:58', NULL),
(213, 'ticket_id', '20', 9, 20, 'TG-5E1EFAC2015E8', '2020-01-14 23:42:58', NULL),
(214, 'ticket_count', '3', 9, 20, 'TG-5E1EFAC2015E8', '2020-01-14 23:42:58', NULL),
(215, 'Name', 'sifat', 9, 20, 'TG-5E1EFAC2015E8', '2020-01-14 23:42:58', NULL),
(216, 'Email', 'sifat.ezzyr@gmail.com', 9, 20, 'TG-5E1EFAC2015E8', '2020-01-14 23:42:58', NULL),
(217, 'Mobile', '11111111111', 9, 20, 'TG-5E1EFAC2015E8', '2020-01-14 23:42:58', NULL),
(218, 'address', '12 Kazi Nazrul Islam Ave', 9, 20, 'TG-5E1EFAC2015E8', '2020-01-14 23:42:58', NULL),
(219, '_token', 'EJTNhEJzGeTrg1G4QtxdDgJsOsD8ADI5HfUJrkir', 9, 20, 'TG-5E1EFC2CAD537', '2020-01-14 23:49:00', NULL),
(220, 'ticket_id', '20', 9, 20, 'TG-5E1EFC2CAD537', '2020-01-14 23:49:00', NULL),
(221, 'ticket_count', '1', 9, 20, 'TG-5E1EFC2CAD537', '2020-01-14 23:49:00', NULL),
(222, 'Name', 'sifat', 9, 20, 'TG-5E1EFC2CAD537', '2020-01-14 23:49:00', NULL),
(223, 'Email', 'sifat.ezzyr@gmail.com', 9, 20, 'TG-5E1EFC2CAD537', '2020-01-14 23:49:00', NULL),
(224, 'Mobile', '123456', 9, 20, 'TG-5E1EFC2CAD537', '2020-01-14 23:49:00', NULL),
(225, 'address', '12 Kazi Nazrul Islam Ave', 9, 20, 'TG-5E1EFC2CAD537', '2020-01-14 23:49:00', NULL),
(226, '_token', 'yLf5OrmWnIKEztvHBvN2SjEL0cqdzLUS9zVLeGNe', 9, 22, 'TG-5E1FFB394C861', '2020-01-16 05:57:13', NULL),
(227, 'ticket_id', '22', 9, 22, 'TG-5E1FFB394C861', '2020-01-16 05:57:13', NULL),
(228, 'ticket_count', '1', 9, 22, 'TG-5E1FFB394C861', '2020-01-16 05:57:13', NULL),
(229, 'Name', 'sifat', 9, 22, 'TG-5E1FFB394C861', '2020-01-16 05:57:13', NULL),
(230, 'Email', 'ahnafshanto2@gmail.com', 9, 22, 'TG-5E1FFB394C861', '2020-01-16 05:57:13', NULL),
(231, 'Mobile', '123456', 9, 22, 'TG-5E1FFB394C861', '2020-01-16 05:57:13', NULL),
(232, 'address', '12 Kazi Nazrul Islam Ave', 9, 22, 'TG-5E1FFB394C861', '2020-01-16 05:57:13', NULL),
(233, '_token', 'FnRQbWaZ2XLFcNqEdNr46QwqG5c9K37jF1Qwl7gJ', 10, 25, 'TG-5E2060DDAF88A', '2020-01-16 01:10:53', NULL),
(234, 'ticket_id', '25', 10, 25, 'TG-5E2060DDAF88A', '2020-01-16 01:10:53', NULL),
(235, 'ticket_count', '1', 10, 25, 'TG-5E2060DDAF88A', '2020-01-16 01:10:53', NULL),
(236, 'Name', 'Arafatul Islam Akib', 10, 25, 'TG-5E2060DDAF88A', '2020-01-16 01:10:53', NULL),
(237, 'Email', 'akib96am@gmail.com', 10, 25, 'TG-5E2060DDAF88A', '2020-01-16 01:10:53', NULL),
(238, 'Mobile', '0378714667874', 10, 25, 'TG-5E2060DDAF88A', '2020-01-16 01:10:53', NULL),
(239, 'address', 'Fhjmfgjkdfjj', 10, 25, 'TG-5E2060DDAF88A', '2020-01-16 01:10:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `custom_form`
--

CREATE TABLE `custom_form` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_options` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `question_instruction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Active` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer_required` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `select_specific_ticket` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `custom_form`
--

INSERT INTO `custom_form` (`id`, `question_title`, `question_type`, `question_options`, `question_instruction`, `Active`, `answer_required`, `select_specific_ticket`, `user_id`, `event_id`, `created_at`, `updated_at`) VALUES
(7, 'Full name', 'Text', NULL, NULL, NULL, 'on', '7', 1, 3, '2020-01-13 05:10:04', NULL),
(8, 'Email', 'Email', NULL, NULL, NULL, 'on', '7', 1, 3, '2020-01-13 05:10:04', NULL),
(9, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '7', 1, 3, '2020-01-13 05:10:04', NULL),
(10, 'Full name', 'Text', NULL, NULL, NULL, 'on', '8', 1, 3, '2020-01-13 05:10:24', NULL),
(11, 'Email', 'Email', NULL, NULL, NULL, 'on', '8', 1, 3, '2020-01-13 05:10:24', NULL),
(12, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '8', 1, 3, '2020-01-13 05:10:24', NULL),
(13, 'T-Shirt Size', 'Radio Buttons', 'L~XL~XXL', 'uogiog', NULL, 'on', '8', 1, 3, '2020-01-13 05:10:56', NULL),
(14, 'Full name', 'Text', NULL, NULL, NULL, 'on', '9', 4, 6, '2020-01-14 06:20:06', NULL),
(15, 'Email', 'Email', NULL, NULL, NULL, 'on', '9', 4, 6, '2020-01-14 06:20:06', NULL),
(16, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '9', 4, 6, '2020-01-14 06:20:06', NULL),
(17, 'University', 'Dropdown', 'UIU~NSU~AIUB~SEU', NULL, NULL, 'on', '9~11', 4, 6, '2020-01-14 06:24:05', '2020-01-13 19:12:57'),
(18, 'Full name', 'Text', NULL, NULL, NULL, 'on', '10', 2, 5, '2020-01-14 06:26:33', NULL),
(19, 'Email', 'Email', NULL, NULL, NULL, 'on', '10', 2, 5, '2020-01-14 06:26:33', NULL),
(20, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '10', 2, 5, '2020-01-14 06:26:33', NULL),
(21, 'Full name', 'Text', NULL, NULL, NULL, 'on', '11', 4, 6, '2020-01-13 19:12:47', NULL),
(22, 'Email', 'Email', NULL, NULL, NULL, 'on', '11', 4, 6, '2020-01-13 19:12:47', NULL),
(23, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '11', 4, 6, '2020-01-13 19:12:47', NULL),
(24, 'Name', 'Text', NULL, NULL, NULL, 'on', '12', 4, 8, '2020-01-15 02:19:18', NULL),
(25, 'Email', 'Email', NULL, NULL, NULL, 'on', '12', 4, 8, '2020-01-15 02:19:18', NULL),
(26, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '12', 4, 8, '2020-01-15 02:19:18', NULL),
(27, 'Name', 'Text', NULL, NULL, NULL, 'on', '13', 2, 5, '2020-01-15 02:58:27', NULL),
(28, 'Email', 'Email', NULL, NULL, NULL, 'on', '13', 2, 5, '2020-01-15 02:58:27', NULL),
(29, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '13', 2, 5, '2020-01-15 02:58:27', NULL),
(30, 'Name', 'Text', NULL, NULL, NULL, 'on', '14', 4, 8, '2020-01-15 03:01:12', NULL),
(31, 'Email', 'Email', NULL, NULL, NULL, 'on', '14', 4, 8, '2020-01-15 03:01:12', NULL),
(32, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '14', 4, 8, '2020-01-15 03:01:12', NULL),
(33, 'Name', 'Text', NULL, NULL, NULL, 'on', '15', 2, 9, '2020-01-15 04:21:51', NULL),
(34, 'Email', 'Email', NULL, NULL, NULL, 'on', '15', 2, 9, '2020-01-15 04:21:51', NULL),
(35, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '15', 2, 9, '2020-01-15 04:21:51', NULL),
(36, 'Name', 'Text', NULL, NULL, NULL, 'on', '16', 2, 9, '2020-01-15 04:22:17', NULL),
(37, 'Email', 'Email', NULL, NULL, NULL, 'on', '16', 2, 9, '2020-01-15 04:22:17', NULL),
(38, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '16', 2, 9, '2020-01-15 04:22:17', NULL),
(39, 'Name', 'Text', NULL, NULL, NULL, 'on', '17', 5, 7, '2020-01-15 04:32:12', NULL),
(40, 'Email', 'Email', NULL, NULL, NULL, 'on', '17', 5, 7, '2020-01-15 04:32:12', NULL),
(41, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '17', 5, 7, '2020-01-15 04:32:13', NULL),
(42, 'Name', 'Text', NULL, NULL, NULL, 'on', '18', 5, 7, '2020-01-15 04:37:13', NULL),
(43, 'Email', 'Email', NULL, NULL, NULL, 'on', '18', 5, 7, '2020-01-15 04:37:13', NULL),
(44, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '18', 5, 7, '2020-01-15 04:37:13', NULL),
(45, 'University Name', 'Text', '', NULL, NULL, 'on', '17', 5, 7, '2020-01-15 04:39:35', '2020-01-15 04:52:50'),
(46, 'Name', 'Text', NULL, NULL, NULL, 'on', '19', 2, 9, '2020-01-15 05:10:26', NULL),
(47, 'Email', 'Email', NULL, NULL, NULL, 'on', '19', 2, 9, '2020-01-15 05:10:26', NULL),
(48, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '19', 2, 9, '2020-01-15 05:10:26', NULL),
(49, 'Name', 'Text', NULL, NULL, NULL, 'on', '20', 2, 9, '2020-01-15 05:19:32', NULL),
(50, 'Email', 'Email', NULL, NULL, NULL, 'on', '20', 2, 9, '2020-01-15 05:19:32', NULL),
(51, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '20', 2, 9, '2020-01-15 05:19:32', NULL),
(52, 'Name', 'Text', NULL, NULL, NULL, 'on', '21', 2, 9, '2020-01-15 00:42:35', NULL),
(53, 'Email', 'Email', NULL, NULL, NULL, 'on', '21', 2, 9, '2020-01-15 00:42:35', NULL),
(54, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '21', 2, 9, '2020-01-15 00:42:35', NULL),
(55, 'Name', 'Text', NULL, NULL, NULL, 'on', '22', 2, 9, '2020-01-15 01:26:11', NULL),
(56, 'Email', 'Email', NULL, NULL, NULL, 'on', '22', 2, 9, '2020-01-15 01:26:11', NULL),
(57, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '22', 2, 9, '2020-01-15 01:26:11', NULL),
(58, 'Name', 'Text', NULL, NULL, NULL, 'on', '23', 2, 9, '2020-01-15 01:27:42', NULL),
(59, 'Email', 'Email', NULL, NULL, NULL, 'on', '23', 2, 9, '2020-01-15 01:27:42', NULL),
(60, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '23', 2, 9, '2020-01-15 01:27:42', NULL),
(61, 'Name', 'Text', NULL, NULL, NULL, 'on', '24', 2, 9, '2020-01-15 19:44:25', NULL),
(62, 'Email', 'Email', NULL, NULL, NULL, 'on', '24', 2, 9, '2020-01-15 19:44:25', NULL),
(63, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '24', 2, 9, '2020-01-15 19:44:25', NULL),
(64, 'demo title3', 'Radio Buttons', 'demo check1~demo check 2', 'sdfghj', NULL, 'on', '24', 2, 9, '2020-01-15 19:44:48', NULL),
(65, 'Name', 'Text', NULL, NULL, NULL, 'on', '25', 7, 10, '2020-01-16 01:07:11', NULL),
(66, 'Email', 'Email', NULL, NULL, NULL, 'on', '25', 7, 10, '2020-01-16 01:07:11', NULL),
(67, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '25', 7, 10, '2020-01-16 01:07:11', NULL),
(68, 'Name', 'Text', NULL, NULL, NULL, 'on', '26', 7, 10, '2020-01-16 01:08:10', NULL),
(69, 'Email', 'Email', NULL, NULL, NULL, 'on', '26', 7, 10, '2020-01-16 01:08:10', NULL),
(70, 'Mobile', 'Text', NULL, NULL, NULL, 'on', '26', 7, 10, '2020-01-16 01:08:10', NULL),
(71, 'University', 'Text', NULL, NULL, NULL, 'off', '25', 7, 10, '2020-01-16 01:09:13', NULL),
(72, 'University', 'Text', NULL, NULL, NULL, 'off', '26', 7, 10, '2020-01-16 01:09:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `seat_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hide_date_event_page` int(11) DEFAULT 0,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_visitor` int(11) DEFAULT NULL,
  `event_credit` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `category`, `description`, `seat_number`, `user_id`, `image_path`, `custom_link`, `hide_date_event_page`, `country`, `address`, `city`, `state`, `zip`, `event_status`, `event_logo`, `page_visitor`, `event_credit`, `created_at`, `updated_at`) VALUES
(3, 'Dab event for ticket sell', '2020-01-05 22:30:09', '2020-01-05 22:30:09', 'Promotion', '<p>sdfaffdsdfgdf</p>', '200', 1, 'event_flayer/20200109_163810-blurred-background-coffee-cup-contemporary-908284.jpg', NULL, 0, 'Bangladesh', 'BDBL Bhabon Karawan Bazar', 'dhaka', 'dfgdsg', '121515', 'Active', 'event_logo/20200111_135629-IMG_201901.jpeg', NULL, NULL, '2020-01-05 22:30:57', '2020-01-10 19:56:29'),
(5, 'asdfghj', '2020-01-12 21:31:12', '2020-01-16 21:17:05', 'Promotion', '<p>asdfgasdcfbnm,.d</p>', '1234', 2, NULL, '55', 0, 'sdfg', 'sdfg', 'werty', 'qwert', '123', 'Active', NULL, NULL, NULL, '2020-01-14 00:06:59', '2020-01-14 21:34:51'),
(6, 'UIU Career Fair', '2020-01-15 22:10:34', '2020-01-16 01:30:42', 'Others', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '5', 4, NULL, 'uiucareerfair', 0, 'Bangladesh', 'BDBL Bhaban (Level 15 - East),', 'KawranBazar', 'Dhaka', '1215', 'Active', NULL, NULL, NULL, '2020-01-14 00:16:30', '2020-01-15 00:53:22'),
(7, 'UAP Career Fair 2020', '2020-01-15 04:00:38', '2020-01-28 00:00:43', 'Others', '<p><strong>UAP Career Fair 2020</strong><br />\r\n<br />\r\nDate: 27-28 January 2020<br />\r\nTime: 10 AM- 6 PM<br />\r\nVenue: UAP<br />\r\n<br />\r\nOrganized by<br />\r\nDirectorate of Students&#39; Welfare, UAP<br />\r\n<br />\r\nIn association with<br />\r\nNRB Jobs Ltd.<br />\r\n<br />\r\nMedia Partner:<br />\r\nDhaka Tribune</p>', '0', 5, 'event_flayer/20200115_163539-UAP 925 468-01-01.png', 'careerfair', 0, 'Bangladesh', 'UAP PLaza', 'Dhaka', 'Dhaka', '1208', 'Active', NULL, NULL, NULL, '2020-01-15 04:38:41', '2020-01-15 23:10:13'),
(8, 'event burger eating in ipl', '2020-01-16 20:16:14', '2020-01-17 20:16:19', 'Others', '<p>dfadfa</p>', '4', 4, NULL, 'iplbur', 0, 'Bangladesh', 'BDBL Bhaban (Level 15 - East) 12, Kawran Bazar', 'Dhaka', 'Dhaka', '1215', 'Active', NULL, NULL, NULL, '2020-01-14 20:16:34', '2020-01-14 20:51:42'),
(9, 'demo title for event hghg hghg hghgh hghg hghg hghg', '2020-01-05 13:06:08', '2020-01-18 11:30:10', 'Promotion', '<p>asdfghjkxcfvgh</p>', '33', 2, NULL, '99', 0, 'Bangladesh', '12 Kazi Nazrul Islam Ave', 'dhaka', 'dhaka', '1205', 'Active', NULL, NULL, NULL, '2020-01-14 22:13:59', '2020-01-16 20:01:05'),
(10, 'Startup Chattogram Bootcamp 2020', '2020-02-22 13:03:44', '2020-02-23 13:03:50', 'Others', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '150', 7, NULL, 'startupctg', 0, 'Bangladesh', 'Hotel Agrabad', 'Agrabad,', 'Chittagong', '1205', 'Active', NULL, NULL, NULL, '2020-01-16 01:04:23', '2020-01-16 01:05:52'),
(11, 'sdfghjkl', '2020-01-16 13:03:55', '2020-01-16 13:03:56', 'Promotion', '<p>sdfgh</p>', '7', 2, NULL, NULL, 0, 'sdfghwerftgh', 'ss', 'xcfvgbhn', 'cxvbn', '123', 'Active', NULL, NULL, NULL, '2020-01-16 01:04:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_sponsers`
--

CREATE TABLE `event_sponsers` (
  `id` int(10) UNSIGNED NOT NULL,
  `sopnser_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponser_image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_28_122029_add_fullname_column_to_user', 1),
(4, '2019_12_29_132305_create_events_table', 1),
(5, '2019_12_30_073413_create_tickets_table', 1),
(10, '2020_01_05_110607_create_custom_form_table', 3),
(11, '2020_01_05_111038_create_paymnet_table', 3),
(12, '2020_01_07_090937_create_event_sponsers_table', 3),
(13, '2020_01_08_072130_create_sponser_table', 4),
(15, '2020_01_05_103733_create_order_table', 6),
(18, '2020_01_13_093107_create_before_order_table', 7),
(19, '2020_01_09_105500_create__question_answer_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_confirm_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attende_confirm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sold_tickets` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `ssl_charge` float NOT NULL,
  `system_charge` float NOT NULL,
  `sold_amount` float NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_confirm_id`, `attende_confirm`, `sold_tickets`, `order_amount`, `ssl_charge`, `system_charge`, `sold_amount`, `payment_id`, `user_id`, `event_id`, `ticket_id`, `transaction_id`, `created_at`, `updated_at`) VALUES
(2, 'TGripe-38-6161', '1', 1, 200, 5, 15, 180, 6, 1, 3, 8, NULL, '2020-01-13 12:28:38', NULL),
(3, 'TGripe-38-8570', '1', 1, 200, 5, 15, 180, 7, 1, 3, 8, NULL, '2020-01-13 01:23:08', NULL),
(4, 'TGripe-38-9399', '1', 1, 200, 5, 15, 180, 8, 1, 3, 8, NULL, '2020-01-13 01:23:44', NULL),
(5, 'TGripe-38-7602', '1', 1, 200, 5, 15, 180, 9, 1, 3, 8, NULL, '2020-01-13 01:24:04', NULL),
(6, 'TGripe-38-8041', '1', 1, 200, 5, 15, 180, 10, 1, 3, 8, NULL, '2020-01-13 01:24:58', NULL),
(7, 'TGripe-38-6989', '1', 1, 200, 5, 15, 180, 11, 1, 3, 8, NULL, '2020-01-13 01:25:20', NULL),
(8, 'TGripe-38-8791', '1', 1, 200, 5, 15, 180, 12, 1, 3, 8, NULL, '2020-01-13 01:26:38', NULL),
(9, 'TGripe-38-4175', '1', 1, 200, 5, 15, 180, 13, 1, 3, 8, NULL, '2020-01-13 01:26:56', NULL),
(10, 'TGripe-38-7704', '1', 1, 200, 5, 15, 180, 14, 1, 3, 8, NULL, '2020-01-13 01:27:20', NULL),
(11, 'TGripe-38-3284', '1', 1, 200, 5, 15, 180, 15, 1, 3, 8, NULL, '2020-01-13 01:28:07', NULL),
(12, 'TGripe-38-2831', '1', 1, 200, 5, 15, 180, 16, 1, 3, 8, NULL, '2020-01-13 01:28:22', NULL),
(13, 'TGripe-38-4148', '1', 1, 200, 5, 15, 180, 17, 1, 3, 8, NULL, '2020-01-13 01:30:38', NULL),
(14, 'TGripe-38-1554', '1', 1, 200, 5, 15, 180, 18, 1, 3, 8, NULL, '2020-01-13 01:30:52', NULL),
(15, 'TGripe-38-2896', '1', 1, 200, 5, 15, 180, 19, 1, 3, 8, NULL, '2020-01-13 01:38:42', NULL),
(16, 'TGripe-38-1249', '1', 1, 200, 5, 15, 180, 20, 1, 3, 8, NULL, '2020-01-13 01:39:09', NULL),
(17, 'TGripe-38-5055', '1', 1, 200, 5, 15, 180, 21, 1, 3, 8, NULL, '2020-01-13 01:39:49', NULL),
(18, 'TGripe-9924', '1', 1, 200, 5, 15, 180, 22, 1, 3, 8, NULL, '2020-01-14 06:43:13', NULL),
(19, 'TGripe-8409', '1', 1, 0, 0, 0, 0, NULL, 2, 5, 10, NULL, '2020-01-14 06:26:48', NULL),
(20, 'TGripe-3099', '1', 1, 0, 0, 0, 0, NULL, 4, 6, 9, NULL, '2020-01-14 06:28:15', NULL),
(21, 'TGripe-2003', '1', 1, 0, 0, 0, 0, NULL, 4, 6, 9, NULL, '2020-01-14 07:09:31', NULL),
(22, 'TGripe-1823', '1', 1, 0, 0, 0, 0, NULL, 4, 6, 9, NULL, '2020-01-14 07:11:29', NULL),
(23, 'TGripe-1721', '1', 1, 0, 0, 0, 0, NULL, 2, 5, 10, NULL, '2020-01-15 02:38:39', NULL),
(24, 'TGripe-2556', '1', 1, 0, 0, 0, 0, NULL, 2, 5, 10, NULL, '2020-01-15 02:41:05', NULL),
(25, 'TGripe-1179', '1', 1, 0, 0, 0, 0, NULL, NULL, 5, 10, NULL, '2020-01-15 02:52:04', NULL),
(26, 'TGripe-1993', '1', 1, 0, 0, 0, 0, NULL, NULL, 8, 12, NULL, '2020-01-15 02:55:13', NULL),
(27, 'TGripe-3818', '1', 1, 6, 0.15, 0.45, 5.4, 23, 2, 5, 13, NULL, '2020-01-15 03:00:11', NULL),
(28, 'TGripe-8262', '1', 1, 6, 0.15, 0.45, 5.4, 24, NULL, 5, 13, NULL, '2020-01-15 03:01:21', NULL),
(29, 'TGripe-7583', '1', 1, 100, 2.5, 7.5, 90, 25, NULL, 8, 14, NULL, '2020-01-15 03:01:52', NULL),
(35, 'TGripe-7917', '1', 1, 0, 0, 0, 0, NULL, NULL, 7, 17, NULL, '2020-01-15 04:45:05', NULL),
(36, 'TGripe-2202', '1', 1, 0, 0, 0, 0, NULL, NULL, 7, 17, NULL, '2020-01-15 04:50:23', NULL),
(37, 'TGripe-2394', '1', 1, 0, 0, 0, 0, NULL, NULL, 7, 17, NULL, '2020-01-15 04:51:57', NULL),
(38, 'TGripe-6626', '1', 1, 0, 0, 0, 0, NULL, NULL, 7, 17, NULL, '2020-01-15 04:52:31', NULL),
(39, 'TGripe-5049', '1', 1, 0, 0, 0, 0, NULL, NULL, 7, 17, NULL, '2020-01-15 05:07:15', NULL),
(53, 'TG-288042', '0', 1, 0, 0, 0, 0, NULL, 2, 9, 23, 'TG-5E1FFAC16D389', '2020-01-16 11:55:13', NULL),
(54, 'TG-899920', '1', 1, 100, 2.5, 7.5, 90, 31, 2, 9, 22, 'TG-5E1FFB394C861', '2020-01-16 11:57:18', NULL),
(55, 'TG-339633', '0', 3, 0, 0, 0, 0, NULL, 2, 9, 23, 'TG-5E2011A960BA6', '2020-01-16 13:32:57', NULL),
(56, 'TG-888485', '1', 2, 0, 0, 0, 0, NULL, 2, 9, 23, 'TG-5E20161F25215', '2020-01-16 13:51:59', NULL),
(57, 'TG-109395', '1', 1, 0, 0, 0, 0, NULL, 2, 9, 23, 'TG-5E202573DB58A', '2020-01-16 14:57:23', NULL),
(58, 'TG-688145', '1', 1, 110, 2.75, 8.25, 99, 32, NULL, 10, 25, 'TG-5E2060DDAF88A', '2020-01-16 19:11:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_tickets` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tran_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `val_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `store_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_tran_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_issuer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_issuer_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_rate` float NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `tran_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `product`, `total_tickets`, `card_type`, `tran_id`, `val_id`, `total_amount`, `store_amount`, `bank_tran_id`, `card_no`, `card_brand`, `card_issuer`, `card_issuer_country`, `currency`, `currency_rate`, `user_id`, `event_id`, `ticket_id`, `tran_date`) VALUES
(6, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(7, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(8, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(9, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(10, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(11, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(12, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(13, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(14, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(15, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(16, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(17, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(18, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(19, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(20, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(21, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1C6270071A9', '2001131809151Hk1wgNtkYQ9NA9', '200.00', '195.00', '200113180915oNB3gjfTM8rOBpV', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-13 18:09:10'),
(22, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1D62FBA0BC1', '2001141223491rqfx7xhNFJnPBW', '200.00', '195.00', '2001141223493hRjBbsYEdZufqQ', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 1, 3, 8, '2020-01-14 12:23:45'),
(23, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1ED49792F42', '200115144046HbXO6YV1XJQ9HMU', '6.00', '5.85', '200115144046ey0o3UWV6qa56VC', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 2, 5, 13, '2020-01-15 14:40:43'),
(24, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1ED4DD30480', '20011514415701YZSHGYmzNsNtP', '6.00', '5.85', '2001151441571K074dzgAaub8ev', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, NULL, 5, 13, '2020-01-15 14:41:53'),
(25, 'Event Ticket', '1', 'QCASH-ITCL', 'TGRIPE-5E1ED4FC11C96', '2001151442271WPxyYCYBC8oBhB', '100.00', '97.50', '2001151442271IjK563vBLg4IzG', 'none', 'QCASH', 'QCASH', 'Bangladesh', 'BDT', 1, NULL, 8, 14, '2020-01-15 14:42:24'),
(26, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1EE933C13EA', '2001151608421ojEO3FbxZPQz9j', '17.00', '16.58', '200115160842LX63ZLREcSSSx9r', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 2, 9, 16, '2020-01-15 16:08:40'),
(27, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1EE9FF3D9E2', '2001151612051zGngANXxiNWf7G', '17.00', '16.58', '200115161205QFliPVTMoO0iuvH', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 2, 9, 16, '2020-01-15 16:12:03'),
(28, 'Event Ticket', '1', 'BKASH-BKash', 'TGRIPE-5E1EF5C949AE7', '2001151702241MWLmNLkHZpTa4t', '10.00', '9.75', '2001151702248y78SigvXrq91Ig', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 2, 9, 19, '2020-01-15 17:02:21'),
(29, 'Event Ticket', '3', 'BKASH-BKash', 'TG-5E1EFAC2015E8', '200115172336zrU86HFMerW7YV9', '24.00', '23.40', '200115172336RL6C6k2w4xExhhl', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 2, 9, 20, '2020-01-15 17:23:34'),
(30, 'Event Ticket', '1', 'BKASH-BKash', 'TG-5E1EFC2CAD537', '2001151729396nUHl1B1FCvpa9s', '8.00', '7.80', '2001151729397Ck61nn9B5iVHOT', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, NULL, 9, 20, '2020-01-15 17:29:36'),
(31, 'Event Ticket', '1', 'BKASH-BKash', 'TG-5E1FFB394C861', '200116113753wXcMnt5VMH7Jgks', '100.00', '97.50', '2001161137530snexuDU0K5156i', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, 2, 9, 22, '2020-01-16 11:37:49'),
(32, 'Event Ticket', '1', 'BKASH-BKash', 'TG-5E2060DDAF88A', '200116185144jzZxloLy1fF97NQ', '110.00', '107.25', '200116185144kP5FZgzvTMByVKX', 'none', 'MOBILEBANKING', 'BKash Mobile Banking', 'Bangladesh', 'BDT', 1, NULL, 10, 25, '2020-01-16 18:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `questionanswer`
--

CREATE TABLE `questionanswer` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_ans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questionanswer`
--

INSERT INTO `questionanswer` (`id`, `question_title`, `question_ans`, `transaction_id`, `event_id`, `ticket_id`, `created_at`, `updated_at`) VALUES
(1, 'Full_name', 'safdsdf', 'TGRIPE-5E1C6270071A9', 3, 8, '2020-01-12 19:39:49', NULL),
(2, 'Email', 'shuvo@gmail.com', 'TGRIPE-5E1C6270071A9', 3, 8, '2020-01-12 19:39:49', NULL),
(3, 'Mobile', '0154477', 'TGRIPE-5E1C6270071A9', 3, 8, '2020-01-12 19:39:49', NULL),
(4, 'T-Shirt_Size', 'XL', 'TGRIPE-5E1C6270071A9', 3, 8, '2020-01-12 19:39:49', NULL),
(5, 'address', 'sfgdsg', 'TGRIPE-5E1C6270071A9', 3, 8, '2020-01-12 19:39:49', NULL),
(6, 'Full_name', 'safdsdf', 'TGRIPE-5E1D62FBA0BC1', 3, 8, '2020-01-14 00:43:13', NULL),
(7, 'Email', 'shuvo@gmail.com', 'TGRIPE-5E1D62FBA0BC1', 3, 8, '2020-01-14 00:43:13', NULL),
(8, 'Mobile', '0154477', 'TGRIPE-5E1D62FBA0BC1', 3, 8, '2020-01-14 00:43:13', NULL),
(9, 'T-Shirt_Size', 'XL', 'TGRIPE-5E1D62FBA0BC1', 3, 8, '2020-01-14 00:43:13', NULL),
(10, 'address', 'BDBL Bhabon Karawan Bazar', 'TGRIPE-5E1D62FBA0BC1', 3, 8, '2020-01-14 00:43:13', NULL),
(11, 'Full_name', 'sdfgh', 'TGRIPE-5E1DB3889863F', 5, 10, '2020-01-14 00:26:48', NULL),
(12, 'Email', 'ahnafshanto2@gmail.com', 'TGRIPE-5E1DB3889863F', 5, 10, '2020-01-14 00:26:48', NULL),
(13, 'Mobile', '21345', 'TGRIPE-5E1DB3889863F', 5, 10, '2020-01-14 00:26:48', NULL),
(14, 'address', 'asdfghj', 'TGRIPE-5E1DB3889863F', 5, 10, '2020-01-14 00:26:48', NULL),
(15, 'Full_name', 'swadhin', 'TGRIPE-5E1DB3DF027EB', 6, 9, '2020-01-14 00:28:15', NULL),
(16, 'Email', 'nakib@dianahost.com', 'TGRIPE-5E1DB3DF027EB', 6, 9, '2020-01-14 00:28:15', NULL),
(17, 'Mobile', '01823662233', 'TGRIPE-5E1DB3DF027EB', 6, 9, '2020-01-14 00:28:15', NULL),
(18, 'Your_University_Name', 'UIU', 'TGRIPE-5E1DB3DF027EB', 6, 9, '2020-01-14 00:28:15', NULL),
(19, 'address', 'BDBL 15 floor', 'TGRIPE-5E1DB3DF027EB', 6, 9, '2020-01-14 00:28:15', NULL),
(20, 'Full_name', 'M E Chowdhry', 'TGRIPE-5E1DBD8B61EDE', 6, 9, '2020-01-14 01:09:31', NULL),
(21, 'Email', 'marsitltd@gmail.com', 'TGRIPE-5E1DBD8B61EDE', 6, 9, '2020-01-14 01:09:31', NULL),
(22, 'Mobile', '01847268077', 'TGRIPE-5E1DBD8B61EDE', 6, 9, '2020-01-14 01:09:31', NULL),
(23, 'Your_University_Name', 'UIU', 'TGRIPE-5E1DBD8B61EDE', 6, 9, '2020-01-14 01:09:31', NULL),
(24, 'address', 'BDBL Bhaban (Level 15 - East) 12, Kawran Bazar', 'TGRIPE-5E1DBD8B61EDE', 6, 9, '2020-01-14 01:09:31', NULL),
(25, 'Full_name', 'Khan Swadhin', 'TGRIPE-5E1DBE0193583', 6, 9, '2020-01-14 01:11:29', NULL),
(26, 'Email', 'khan.swadhin@gmail.com', 'TGRIPE-5E1DBE0193583', 6, 9, '2020-01-14 01:11:29', NULL),
(27, 'Mobile', '01823662233', 'TGRIPE-5E1DBE0193583', 6, 9, '2020-01-14 01:11:29', NULL),
(28, 'University_Name', 'UIU', 'TGRIPE-5E1DBE0193583', 6, 9, '2020-01-14 01:11:29', NULL),
(29, 'address', 'Madhukhali, Faridpur', 'TGRIPE-5E1DBE0193583', 6, 9, '2020-01-14 01:11:29', NULL),
(30, 'Full_name', 'sifat rahman', 'TGRIPE-5E1ECF8F06B1C', 5, 10, '2020-01-14 20:38:39', NULL),
(31, 'Email', 'ahnafshanto2@gmail.com', 'TGRIPE-5E1ECF8F06B1C', 5, 10, '2020-01-14 20:38:39', NULL),
(32, 'Mobile', '123456', 'TGRIPE-5E1ECF8F06B1C', 5, 10, '2020-01-14 20:38:39', NULL),
(33, 'address', '12 Kazi Nazrul Islam Ave', 'TGRIPE-5E1ECF8F06B1C', 5, 10, '2020-01-14 20:38:39', NULL),
(34, 'Full_name', 'sifat rahman', 'TGRIPE-5E1ED021AD366', 5, 10, '2020-01-14 20:41:05', NULL),
(35, 'Email', 'ahnafshanto2@gmail.com', 'TGRIPE-5E1ED021AD366', 5, 10, '2020-01-14 20:41:05', NULL),
(36, 'Mobile', '123456', 'TGRIPE-5E1ED021AD366', 5, 10, '2020-01-14 20:41:05', NULL),
(37, 'address', '12 Kazi Nazrul Islam Ave', 'TGRIPE-5E1ED021AD366', 5, 10, '2020-01-14 20:41:05', NULL),
(38, 'Full_name', 'sifat', 'TGRIPE-5E1ED2B468533', 5, 10, '2020-01-14 20:52:04', NULL),
(39, 'Email', 'ahnafshanto2@gmail.com', 'TGRIPE-5E1ED2B468533', 5, 10, '2020-01-14 20:52:04', NULL),
(40, 'Mobile', '11111111111', 'TGRIPE-5E1ED2B468533', 5, 10, '2020-01-14 20:52:04', NULL),
(41, 'address', 'sdfghjk', 'TGRIPE-5E1ED2B468533', 5, 10, '2020-01-14 20:52:04', NULL),
(42, 'Name', 'md kamal', 'TGRIPE-5E1ED371811E3', 8, 12, '2020-01-14 20:55:13', NULL),
(43, 'Email', 'kamal@ipl.com', 'TGRIPE-5E1ED371811E3', 8, 12, '2020-01-14 20:55:13', NULL),
(44, 'Mobile', '1234567890', 'TGRIPE-5E1ED371811E3', 8, 12, '2020-01-14 20:55:13', NULL),
(45, 'address', 'dfhakjlfhasdfha', 'TGRIPE-5E1ED371811E3', 8, 12, '2020-01-14 20:55:13', NULL),
(46, 'Name', 'demo', 'TGRIPE-5E1ED49792F42', 5, 13, '2020-01-14 21:00:11', NULL),
(47, 'Email', 'ahnafshanto2@gmail.com', 'TGRIPE-5E1ED49792F42', 5, 13, '2020-01-14 21:00:11', NULL),
(48, 'Mobile', '21345', 'TGRIPE-5E1ED49792F42', 5, 13, '2020-01-14 21:00:11', NULL),
(49, 'address', '12 Kazi Nazrul Islam Ave', 'TGRIPE-5E1ED49792F42', 5, 13, '2020-01-14 21:00:11', NULL),
(50, 'Name', 'demo', 'TGRIPE-5E1ED4DD30480', 5, 13, '2020-01-14 21:01:21', NULL),
(51, 'Email', 'sifat.ezzyr@gmail.com', 'TGRIPE-5E1ED4DD30480', 5, 13, '2020-01-14 21:01:21', NULL),
(52, 'Mobile', '123456', 'TGRIPE-5E1ED4DD30480', 5, 13, '2020-01-14 21:01:21', NULL),
(53, 'address', '12 Kazi Nazrul Islam Ave', 'TGRIPE-5E1ED4DD30480', 5, 13, '2020-01-14 21:01:21', NULL),
(54, 'Name', 'md kamal', 'TGRIPE-5E1ED4FC11C96', 8, 14, '2020-01-14 21:01:52', NULL),
(55, 'Email', 'kamal@ipl.com', 'TGRIPE-5E1ED4FC11C96', 8, 14, '2020-01-14 21:01:52', NULL),
(56, 'Mobile', '1234567890', 'TGRIPE-5E1ED4FC11C96', 8, 14, '2020-01-14 21:01:52', NULL),
(57, 'address', 'dfhakjlfhasdfha', 'TGRIPE-5E1ED4FC11C96', 8, 14, '2020-01-14 21:01:52', NULL),
(58, 'Name', 'sifat', 'TGRIPE-5E1EE933C13EA', 9, 16, '2020-01-14 22:28:07', NULL),
(59, 'Email', 'ahnafshanto2@gmail.com', 'TGRIPE-5E1EE933C13EA', 9, 16, '2020-01-14 22:28:07', NULL),
(60, 'Mobile', '123456', 'TGRIPE-5E1EE933C13EA', 9, 16, '2020-01-14 22:28:07', NULL),
(61, 'address', '12 Kazi Nazrul Islam Ave', 'TGRIPE-5E1EE933C13EA', 9, 16, '2020-01-14 22:28:07', NULL),
(62, 'Name', 'sifat', 'TGRIPE-5E1EE9FF3D9E2', 9, 16, '2020-01-14 22:31:30', NULL),
(63, 'Email', 'sdas@sdf.com', 'TGRIPE-5E1EE9FF3D9E2', 9, 16, '2020-01-14 22:31:30', NULL),
(64, 'Mobile', '11111111111', 'TGRIPE-5E1EE9FF3D9E2', 9, 16, '2020-01-14 22:31:30', NULL),
(65, 'address', '12 Kazi Nazrul Islam Ave', 'TGRIPE-5E1EE9FF3D9E2', 9, 16, '2020-01-14 22:31:30', NULL),
(66, 'Name', 'sifat', 'TGRIPE-5E1EEAD8F18F6', 9, 15, '2020-01-14 22:35:04', NULL),
(67, 'Email', 'sifat.ezzyr@gmail.com', 'TGRIPE-5E1EEAD8F18F6', 9, 15, '2020-01-14 22:35:04', NULL),
(68, 'Mobile', '123456', 'TGRIPE-5E1EEAD8F18F6', 9, 15, '2020-01-14 22:35:04', NULL),
(69, 'address', '12 Kazi Nazrul Islam Ave', 'TGRIPE-5E1EEAD8F18F6', 9, 15, '2020-01-14 22:35:04', NULL),
(70, 'Name', 'sifat', 'TGRIPE-5E1EEAFBAF897', 9, 15, '2020-01-14 22:35:39', NULL),
(71, 'Email', 'sifat.ezzyr@gmail.com', 'TGRIPE-5E1EEAFBAF897', 9, 15, '2020-01-14 22:35:39', NULL),
(72, 'Mobile', '123456', 'TGRIPE-5E1EEAFBAF897', 9, 15, '2020-01-14 22:35:39', NULL),
(73, 'address', '12 Kazi Nazrul Islam Ave', 'TGRIPE-5E1EEAFBAF897', 9, 15, '2020-01-14 22:35:39', NULL),
(74, 'Name', 'sifat', 'TGRIPE-5E1EEB49EFD06', 9, 15, '2020-01-14 22:36:57', NULL),
(75, 'Email', 'sifat.ezzyr@gmail.com', 'TGRIPE-5E1EEB49EFD06', 9, 15, '2020-01-14 22:36:57', NULL),
(76, 'Mobile', '123456', 'TGRIPE-5E1EEB49EFD06', 9, 15, '2020-01-14 22:36:57', NULL),
(77, 'address', '12 Kazi Nazrul Islam Ave', 'TGRIPE-5E1EEB49EFD06', 9, 15, '2020-01-14 22:36:57', NULL),
(78, 'Name', 'Suraia Sultana', 'TGRIPE-5E1EED31AE5EB', 7, 17, '2020-01-14 22:45:05', NULL),
(79, 'Email', 'suraiashormi26@gmail.com', 'TGRIPE-5E1EED31AE5EB', 7, 17, '2020-01-14 22:45:05', NULL),
(80, 'Mobile', '01771431858', 'TGRIPE-5E1EED31AE5EB', 7, 17, '2020-01-14 22:45:05', NULL),
(81, 'University_Name', 'UIU', 'TGRIPE-5E1EED31AE5EB', 7, 17, '2020-01-14 22:45:05', NULL),
(82, 'address', 'Dhanmondi', 'TGRIPE-5E1EED31AE5EB', 7, 17, '2020-01-14 22:45:05', NULL),
(83, 'Name', 'Tawhidur Rahman', 'TGRIPE-5E1EEE6FD001A', 7, 17, '2020-01-14 22:50:23', NULL),
(84, 'Email', 'tawhid@nrbjobs.com', 'TGRIPE-5E1EEE6FD001A', 7, 17, '2020-01-14 22:50:23', NULL),
(85, 'Mobile', '01958669256', 'TGRIPE-5E1EEE6FD001A', 7, 17, '2020-01-14 22:50:23', NULL),
(86, 'University_Name', 'JU', 'TGRIPE-5E1EEE6FD001A', 7, 17, '2020-01-14 22:50:23', NULL),
(87, 'address', 'Kawranbazar', 'TGRIPE-5E1EEE6FD001A', 7, 17, '2020-01-14 22:50:23', NULL),
(88, 'Name', 'Tawhidur Rahman', 'TGRIPE-5E1EEECD7D064', 7, 17, '2020-01-14 22:51:57', NULL),
(89, 'Email', 'tawhid@nrbjobs.com', 'TGRIPE-5E1EEECD7D064', 7, 17, '2020-01-14 22:51:57', NULL),
(90, 'Mobile', '01958669256', 'TGRIPE-5E1EEECD7D064', 7, 17, '2020-01-14 22:51:57', NULL),
(91, 'University_Name', 'JU', 'TGRIPE-5E1EEECD7D064', 7, 17, '2020-01-14 22:51:57', NULL),
(92, 'address', 'Kawranbazar', 'TGRIPE-5E1EEECD7D064', 7, 17, '2020-01-14 22:51:57', NULL),
(93, 'Name', 'Tawhidur Rahman', 'TGRIPE-5E1EEEEFF2128', 7, 17, '2020-01-14 22:52:31', NULL),
(94, 'Email', 'tawhid@nrbjobs.com', 'TGRIPE-5E1EEEEFF2128', 7, 17, '2020-01-14 22:52:31', NULL),
(95, 'Mobile', '01958669256', 'TGRIPE-5E1EEEEFF2128', 7, 17, '2020-01-14 22:52:31', NULL),
(96, 'University_Name', 'JU', 'TGRIPE-5E1EEEEFF2128', 7, 17, '2020-01-14 22:52:31', NULL),
(97, 'address', 'Kawranbazar', 'TGRIPE-5E1EEEEFF2128', 7, 17, '2020-01-14 22:52:31', NULL),
(98, 'Name', 'Nahid Ferdous Auny', 'TGRIPE-5E1EF263A8655', 7, 17, '2020-01-14 23:07:15', NULL),
(99, 'Email', 'onlyauny@gmail.com', 'TGRIPE-5E1EF263A8655', 7, 17, '2020-01-14 23:07:15', NULL),
(100, 'Mobile', '01911389594', 'TGRIPE-5E1EF263A8655', 7, 17, '2020-01-14 23:07:15', NULL),
(101, 'University_Name', 'University of Asia Pacific', 'TGRIPE-5E1EF263A8655', 7, 17, '2020-01-14 23:07:15', NULL),
(102, 'address', 'House 7, Road 4, Block D, Banasree', 'TGRIPE-5E1EF263A8655', 7, 17, '2020-01-14 23:07:15', NULL),
(103, 'Name', 'sifat', 'TGRIPE-5E1EF5C949AE7', 9, 19, '2020-01-14 23:21:49', NULL),
(104, 'Email', 'sifat.ezzyr@gmail.com', 'TGRIPE-5E1EF5C949AE7', 9, 19, '2020-01-14 23:21:49', NULL),
(105, 'Mobile', '123456', 'TGRIPE-5E1EF5C949AE7', 9, 19, '2020-01-14 23:21:49', NULL),
(106, 'address', '12 Kazi Nazrul Islam Ave', 'TGRIPE-5E1EF5C949AE7', 9, 19, '2020-01-14 23:21:49', NULL),
(107, 'Name', 'sifat', 'TGRIPE-5E1EF79DC8DCA', 9, 19, '2020-01-14 23:29:33', NULL),
(108, 'Email', 'ahnafshanto2@gmail.com', 'TGRIPE-5E1EF79DC8DCA', 9, 19, '2020-01-14 23:29:33', NULL),
(109, 'Mobile', '123456', 'TGRIPE-5E1EF79DC8DCA', 9, 19, '2020-01-14 23:29:33', NULL),
(110, 'address', '12 Kazi Nazrul Islam Ave', 'TGRIPE-5E1EF79DC8DCA', 9, 19, '2020-01-14 23:29:33', NULL),
(111, 'Name', 'sifataaaaaaaaaa', 'TGRIPE-5E1EF7D3AFC55', 9, 19, '2020-01-15 11:30:27', NULL),
(112, 'Email', 'ahnafshanto2@gmail.com', 'TGRIPE-5E1EF7D3AFC55', 9, 19, '2020-01-15 11:30:27', NULL),
(113, 'Mobile', '123456', 'TGRIPE-5E1EF7D3AFC55', 9, 19, '2020-01-15 11:30:27', NULL),
(114, 'address', '12 Kazi Nazrul Islam Ave', 'TGRIPE-5E1EF7D3AFC55', 9, 19, '2020-01-15 11:30:27', NULL),
(115, 'Name', 'sifataaaaaaaaaa', 'TGRIPE-5E1EF8D229885', 9, 19, '2020-01-15 11:34:42', NULL),
(116, 'Email', 'ahnafshanto2@gmail.com', 'TGRIPE-5E1EF8D229885', 9, 19, '2020-01-15 11:34:42', NULL),
(117, 'Mobile', '123456', 'TGRIPE-5E1EF8D229885', 9, 19, '2020-01-15 11:34:42', NULL),
(118, 'address', '12 Kazi Nazrul Islam Ave', 'TGRIPE-5E1EF8D229885', 9, 19, '2020-01-15 11:34:42', NULL),
(119, 'Name', 'sifat rahman', 'TG-5E1EF9F995E6B', 9, 19, '2020-01-15 11:39:37', NULL),
(120, 'Email', 'ahnafshanto2@gmail.com', 'TG-5E1EF9F995E6B', 9, 19, '2020-01-15 11:39:37', NULL),
(121, 'Mobile', '123456', 'TG-5E1EF9F995E6B', 9, 19, '2020-01-15 11:39:37', NULL),
(122, 'address', '12 Kazi Nazrul Islam Ave', 'TG-5E1EF9F995E6B', 9, 19, '2020-01-15 11:39:37', NULL),
(123, 'Name', 'sifat rahman', 'TG-5E1EFA1B81DC5', 9, 19, '2020-01-15 11:40:11', NULL),
(124, 'Email', 'ahnafshanto2@gmail.com', 'TG-5E1EFA1B81DC5', 9, 19, '2020-01-15 11:40:11', NULL),
(125, 'Mobile', '123456', 'TG-5E1EFA1B81DC5', 9, 19, '2020-01-15 11:40:11', NULL),
(126, 'address', '12 Kazi Nazrul Islam Ave', 'TG-5E1EFA1B81DC5', 9, 19, '2020-01-15 11:40:11', NULL),
(127, 'Name', 'sifat', 'TG-5E1EFAC2015E8', 9, 20, '2020-01-15 11:43:01', NULL),
(128, 'Email', 'sifat.ezzyr@gmail.com', 'TG-5E1EFAC2015E8', 9, 20, '2020-01-15 11:43:01', NULL),
(129, 'Mobile', '11111111111', 'TG-5E1EFAC2015E8', 9, 20, '2020-01-15 11:43:01', NULL),
(130, 'address', '12 Kazi Nazrul Islam Ave', 'TG-5E1EFAC2015E8', 9, 20, '2020-01-15 11:43:01', NULL),
(131, 'Name', 'sifat', 'TG-5E1EFC2CAD537', 9, 20, '2020-01-15 11:49:04', NULL),
(132, 'Email', 'sifat.ezzyr@gmail.com', 'TG-5E1EFC2CAD537', 9, 20, '2020-01-15 11:49:04', NULL),
(133, 'Mobile', '123456', 'TG-5E1EFC2CAD537', 9, 20, '2020-01-15 11:49:04', NULL),
(134, 'address', '12 Kazi Nazrul Islam Ave', 'TG-5E1EFC2CAD537', 9, 20, '2020-01-15 11:49:04', NULL),
(135, 'Name', 'demodfgh', 'TG-5E1F02B8CEE9E', 9, 19, '2020-01-15 12:16:56', NULL),
(136, 'Email', 'ahnafshanedrfghto2@gmail.com', 'TG-5E1F02B8CEE9E', 9, 19, '2020-01-15 12:16:56', NULL),
(137, 'Mobile', '11111111111', 'TG-5E1F02B8CEE9E', 9, 19, '2020-01-15 12:16:56', NULL),
(138, 'address', '12 Kazi Nazrul Islam Ave', 'TG-5E1F02B8CEE9E', 9, 19, '2020-01-15 12:16:56', NULL),
(139, 'Name', 'sifat', 'TG-5E1F13E20C24B', 9, 22, '2020-01-15 13:30:10', NULL),
(140, 'Email', 'ahnafshanto2@gmail.com', 'TG-5E1F13E20C24B', 9, 22, '2020-01-15 13:30:10', NULL),
(141, 'Mobile', '123456', 'TG-5E1F13E20C24B', 9, 22, '2020-01-15 13:30:10', NULL),
(142, 'address', '12 Kazi Nazrul Islam Ave', 'TG-5E1F13E20C24B', 9, 22, '2020-01-15 13:30:10', NULL),
(143, 'Name', 'sifat', 'TG-5E1F1403AB272', 9, 23, '2020-01-15 13:30:43', NULL),
(144, 'Email', 'sifat.ezzyr@gmail.com', 'TG-5E1F1403AB272', 9, 23, '2020-01-15 13:30:43', NULL),
(145, 'Mobile', '123456', 'TG-5E1F1403AB272', 9, 23, '2020-01-15 13:30:43', NULL),
(146, 'address', '12 Kazi Nazrul Islam Ave', 'TG-5E1F1403AB272', 9, 23, '2020-01-15 13:30:43', NULL),
(147, 'Name', 'sifat', 'TG-5E1F1417A1BF2', 9, 23, '2020-01-15 13:31:03', NULL),
(148, 'Email', 'ahnafshanto2@gmail.com', 'TG-5E1F1417A1BF2', 9, 23, '2020-01-15 13:31:03', NULL),
(149, 'Mobile', '11111111111', 'TG-5E1F1417A1BF2', 9, 23, '2020-01-15 13:31:03', NULL),
(150, 'address', '12 Kazi Nazrul Islam Ave', 'TG-5E1F1417A1BF2', 9, 23, '2020-01-15 13:31:03', NULL),
(151, 'Name', 'demo', 'TG-5E1F14F5D9E26', 9, 22, '2020-01-15 13:34:45', NULL),
(152, 'Email', 'sifat.ezzyr@gmail.com', 'TG-5E1F14F5D9E26', 9, 22, '2020-01-15 13:34:45', NULL),
(153, 'Mobile', '11111111111', 'TG-5E1F14F5D9E26', 9, 22, '2020-01-15 13:34:45', NULL),
(154, 'address', '12 Kazi Nazrul Islam Ave', 'TG-5E1F14F5D9E26', 9, 22, '2020-01-15 13:34:45', NULL),
(155, 'Name', 'sifat', 'TG-5E1FFAC16D389', 9, 23, '2020-01-16 05:55:13', NULL),
(156, 'Email', 'ahnafshanto2@gmail.com', 'TG-5E1FFAC16D389', 9, 23, '2020-01-16 05:55:13', NULL),
(157, 'Mobile', '123456', 'TG-5E1FFAC16D389', 9, 23, '2020-01-16 05:55:13', NULL),
(158, 'address', '12 Kazi Nazrul Islam Ave', 'TG-5E1FFAC16D389', 9, 23, '2020-01-16 05:55:13', NULL),
(159, 'Name', 'sifat', 'TG-5E1FFB394C861', 9, 22, '2020-01-16 05:57:18', NULL),
(160, 'Email', 'ahnafshanto2@gmail.com', 'TG-5E1FFB394C861', 9, 22, '2020-01-16 05:57:18', NULL),
(161, 'Mobile', '123456', 'TG-5E1FFB394C861', 9, 22, '2020-01-16 05:57:18', NULL),
(162, 'address', '12 Kazi Nazrul Islam Ave', 'TG-5E1FFB394C861', 9, 22, '2020-01-16 05:57:18', NULL),
(163, 'Name', 'demo', 'TG-5E2011A960BA6', 9, 23, '2020-01-16 07:32:57', NULL),
(164, 'Email', 'sifat.ezzyr@gmail.com', 'TG-5E2011A960BA6', 9, 23, '2020-01-16 07:32:57', NULL),
(165, 'Mobile', '01990523166', 'TG-5E2011A960BA6', 9, 23, '2020-01-16 07:32:57', NULL),
(166, 'address', '12 Kazi Nazrul Islam Aveaaa', 'TG-5E2011A960BA6', 9, 23, '2020-01-16 07:32:57', NULL),
(167, 'Name', 'demo', 'TG-5E20161F25215', 9, 23, '2020-01-16 07:51:59', NULL),
(168, 'Email', 'ahnafshanto2@gmail.com', 'TG-5E20161F25215', 9, 23, '2020-01-16 07:51:59', NULL),
(169, 'Mobile', '11111111111', 'TG-5E20161F25215', 9, 23, '2020-01-16 07:51:59', NULL),
(170, 'address', '12 Kazi Nazrul Islam Ave', 'TG-5E20161F25215', 9, 23, '2020-01-16 07:51:59', NULL),
(171, 'Name', 'sifat', 'TG-5E202573DB58A', 9, 23, '2020-01-16 08:57:23', NULL),
(172, 'Email', 'sifat.ezzyr@gmail.com', 'TG-5E202573DB58A', 9, 23, '2020-01-16 08:57:23', NULL),
(173, 'Mobile', '11111111111', 'TG-5E202573DB58A', 9, 23, '2020-01-16 08:57:23', NULL),
(174, 'address', '12 Kazi Nazrul Islam Ave', 'TG-5E202573DB58A', 9, 23, '2020-01-16 08:57:23', NULL),
(175, 'Name', 'Arafatul Islam Akib', 'TG-5E2060DDAF88A', 10, 25, '2020-01-16 13:11:13', NULL),
(176, 'Email', 'akib96am@gmail.com', 'TG-5E2060DDAF88A', 10, 25, '2020-01-16 13:11:13', NULL),
(177, 'Mobile', '0378714667874', 'TG-5E2060DDAF88A', 10, 25, '2020-01-16 13:11:13', NULL),
(178, 'address', 'Fhjmfgjkdfjj', 'TG-5E2060DDAF88A', 10, 25, '2020-01-16 13:11:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponser`
--

CREATE TABLE `sponser` (
  `id` int(10) UNSIGNED NOT NULL,
  `sponser_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponser_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponser`
--

INSERT INTO `sponser` (`id`, `sponser_name`, `sponser_logo`, `user_id`, `event_id`, `created_at`, `updated_at`) VALUES
(1, 'ticketgrip', 'event_sponser/20200108_104208-1.jpg', 1, 3, '2020-01-08 04:42:08', NULL),
(4, 'dab events', 'event_sponser/20200108_112742-man-with-moleskine.png', 1, 3, '2020-01-08 05:27:42', NULL),
(7, 'sdf', 'event_sponser/20200115_130024-logo2.png', 2, 9, '2020-01-14 19:00:24', NULL),
(8, 'xcvbn', 'event_sponser/20200117_100458-logo2.png', 2, 9, '2020-01-17 04:04:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ticket_price` float NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_note` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `selling_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `untill_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `show_sell_untill_date` int(11) NOT NULL,
  `fees_consume` int(11) DEFAULT 0,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `hide_ticket` int(11) DEFAULT 0,
  `max_ticket_per_order` int(11) DEFAULT NULL,
  `min_ticket_per_order` int(11) DEFAULT NULL,
  `selling_currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'BDT',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticket_type`, `ticket_price`, `quantity`, `short_note`, `selling_date`, `untill_date`, `show_sell_untill_date`, `fees_consume`, `event_id`, `user_id`, `hide_ticket`, `max_ticket_per_order`, `min_ticket_per_order`, `selling_currency`, `created_at`, `updated_at`) VALUES
(7, 'genarel', 100, '100', 'klgki', '2020-01-12 23:09:54', '2020-01-12 23:09:55', 1, 0, 3, 1, 0, 10, 1, 'BDT', '2020-01-13 05:10:04', NULL),
(8, 'Vip Ticket', 200, '50', 'ogoi', '2020-01-12 23:10:16', '2020-01-12 23:10:17', 1, 0, 3, 1, 0, 5, 1, 'BDT', '2020-01-13 05:10:24', NULL),
(9, 'Career Fair', 0, '10', 'hello this is a ticket', '2020-01-14 00:19:07', '2020-01-15 04:19:12', 1, 1, 6, 4, 0, 1, 1, 'BDT', '2020-01-14 06:20:06', NULL),
(10, 'sdfgh', 496, '6', 'asdfg', '2020-01-14 00:26:25', '2020-01-17 00:26:26', 0, 0, 5, 2, 0, 12, 1, 'BDT', '2020-01-14 06:26:33', '2020-01-15 02:52:43'),
(11, 'VIP Seats', 500, '2', 'faf', '2020-01-14 01:12:12', '2020-01-15 01:12:16', 0, 0, 6, 4, 0, 1, 1, 'BDT', '2020-01-13 19:12:47', NULL),
(13, 'Generalsdfghj', 6, '8', 'asdfghjkl', '2020-01-14 20:58:06', '2020-01-15 20:58:07', 0, 0, 5, 2, 0, 5, 1, 'BDT', '2020-01-15 02:58:27', NULL),
(14, 'Attandee', 100, '2', 'dfkjlahdskjfhak', '2020-01-14 21:00:55', '2020-01-15 21:00:58', 0, 0, 8, 4, 0, 1, 1, 'BDT', '2020-01-15 03:01:12', NULL),
(17, 'Applicant', 0, '50000', 'afdfafadfa', '2020-01-14 10:31:58', '2020-01-27 10:32:00', 1, 0, 7, 5, 1, 1, 1, 'BDT', '2020-01-15 04:32:12', '2020-01-15 04:53:50'),
(22, 'General', 100, '32', 'sdfgyuio', '2020-01-15 13:25:51', '2020-01-18 13:25:51', 0, 0, 9, 2, 0, 5, 1, 'BDT', '2020-01-15 01:26:11', '2020-01-15 19:40:14'),
(23, 'ticket type 11', 0, '25', 'dfgthu', '2020-01-15 13:26:42', '2020-01-17 13:26:42', 0, 0, 9, 2, 0, 10, 1, 'BDT', '2020-01-15 01:27:42', '2020-01-15 01:31:45'),
(24, 'demo tickjet for id 9', 0, '10', 'sdfghj', '2020-01-16 07:44:13', '2020-01-17 07:44:14', 0, 0, 9, 2, 0, 5, 1, 'BDT', '2020-01-15 19:44:25', NULL),
(25, 'Participant', 110, '100', 'dsdhfajlshfdjkahsdjfklhasdf', '2020-01-16 13:06:33', '2020-02-20 13:06:36', 0, 0, 10, 7, 0, 4, 1, 'BDT', '2020-01-16 01:07:11', NULL),
(26, 'Team', 0, '10', 'dfadfadfa', '2020-01-16 13:07:39', '2020-01-25 13:07:43', 0, 0, 10, 7, 0, 1, 1, 'BDT', '2020-01-16 01:08:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cover_pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `balance` double(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `mobile`, `user_type`, `country`, `organization`, `address`, `image`, `cover_pic`, `balance`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shuvo', 'shuvo mukherjee', 'shuvo.ezzyr@gmail.com', '$2y$10$A8mUj954MOdWGELnceD2pOn5Ch6A9Ef4KDITJ/nmrANpbAWF4gxEi', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, '1', '8qp3otzVVenf2nCS0Lav37fTPQVSYIdyi5drSxiX5ih4Ykeim8bWlCzXHnZi', '2019-12-31 19:40:54', NULL),
(2, 'sifat', 'Sifat Rahman', 'sifat.ezzyr@gmail.com', '$2y$10$eGP7t0EE2iPzrTCkN//f..wMO83SfY35S5lqCqM0..x0Lb27CSag.', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'R82S4pLImJlCGmd5A518Ag2f75fJJfl79X1TEbtvqCoQt8RqTe2rz9sGek9y', '2020-01-14 00:48:16', NULL),
(3, 'swadhin', 'Swadhin', 'nakib@dianahost.com', '$2y$10$1/zKo03ZrV58cvFyJpMzEeDXwBzoj0BWfsszRbztzp.yO4z5M4.Ci', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'rEDYv5DluC365vqRJchL88VazFySvqPXSJAINvAgtyZOjjN8a8WWcyLG0TQI', '2020-01-14 05:12:29', NULL),
(4, 'nrbjobs', 'NRB Jobs', 'auny@nrbjobs.com', '$2y$10$zAV.ZrtAcgaPYyc8XRAOk.rNob6emTz74npBZ72Npi4xz4FpmURta', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2020-01-14 06:13:29', NULL),
(5, 'jobfair@nrbjobs', 'NRB Jobs Ltd.', 'tawhid@nrbjobs.com', '$2y$10$VcafwfdKit0borcE/FjpM.4t9JigCGQiMBM7.FDOC/c8y8idyn59u', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'GuPwzxw7RQ8X807iCye2rKMu8AmvhKfNKvBKEk3jtOdxpF0rjWZ6wvSEjrb6', '2020-01-14 22:32:29', NULL),
(6, 'Rimon', 'Sheikh RImon', 'rimonnokro@gmail.com', '$2y$10$YQvM8tSIVdE72yMqLZNuru0.boMzwzKXO11e4HlJkirLYQzCt3KQ6', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, '1', '3XkVa8rvu2U7F03RMXL0w7LsHVSQGyoUOau6XC0d6rEBL4JZfpHKwlzbh7Ki', '2020-01-15 00:54:03', NULL),
(7, 'startupctg', 'startup ctg', 'startupctg@gmail.com', '$2y$10$ujLhVSEWSJLHpnH2K1t3gOQTupgI8iK9uwhrTdKr4tHw7tnlnINca', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2020-01-16 06:58:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `before_order_table`
--
ALTER TABLE `before_order_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_form`
--
ALTER TABLE `custom_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_custom_link_unique` (`custom_link`);

--
-- Indexes for table `event_sponsers`
--
ALTER TABLE `event_sponsers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionanswer`
--
ALTER TABLE `questionanswer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponser`
--
ALTER TABLE `sponser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_index` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `before_order_table`
--
ALTER TABLE `before_order_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `custom_form`
--
ALTER TABLE `custom_form`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event_sponsers`
--
ALTER TABLE `event_sponsers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `questionanswer`
--
ALTER TABLE `questionanswer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `sponser`
--
ALTER TABLE `sponser`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
