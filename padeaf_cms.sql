-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2020 at 11:56 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `padeaf_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_history`
--

CREATE TABLE `action_history` (
  `id` bigint(21) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `action_history`
--

INSERT INTO `action_history` (`id`, `user_id`, `menu_id`, `permission_id`, `user_name`, `menu_name`, `permission_name`, `datetime`) VALUES
(1, 1, 2, 2, NULL, NULL, NULL, '2018-06-29 06:05:47'),
(2, 1, 2, 1, NULL, NULL, NULL, '2018-06-29 06:06:40'),
(3, 1, 2, 3, NULL, NULL, NULL, '2018-06-29 06:06:47'),
(4, 1, 2, 4, NULL, NULL, NULL, '2018-06-29 06:47:02'),
(5, 1, 3, 10, NULL, NULL, NULL, '2018-07-02 00:23:36'),
(6, 1, 3, 10, NULL, NULL, NULL, '2018-07-02 00:24:58'),
(7, 1, 3, 10, NULL, NULL, NULL, '2018-07-02 00:25:03'),
(8, 1, 2, 1, NULL, NULL, NULL, '2018-07-02 03:40:23'),
(9, 1, 2, 1, NULL, NULL, NULL, '2018-07-02 05:06:27'),
(10, 1, 2, 1, NULL, NULL, NULL, '2018-07-02 05:08:50'),
(11, 1, 3, 10, NULL, NULL, NULL, '2018-07-02 05:47:17'),
(12, 1, 2, 3, NULL, NULL, NULL, '2018-07-02 05:49:26'),
(13, 1, 2, 3, NULL, NULL, NULL, '2018-07-02 05:49:30'),
(14, 1, 5, 16, NULL, NULL, NULL, '2018-07-02 06:12:38'),
(15, 1, 5, 16, NULL, NULL, NULL, '2018-07-02 06:13:37'),
(16, 1, 5, 16, NULL, NULL, NULL, '2018-07-02 06:13:40'),
(17, 1, 5, 16, NULL, NULL, NULL, '2018-07-02 06:13:45'),
(18, 1, 5, 16, NULL, NULL, NULL, '2018-07-02 06:13:46'),
(19, 1, 2, 4, NULL, NULL, NULL, '2018-07-02 06:14:28'),
(20, 1, 2, 1, NULL, NULL, NULL, '2018-07-02 06:17:45'),
(21, 1, 5, 15, NULL, NULL, NULL, '2018-07-02 06:19:03'),
(22, 1, 3, 10, NULL, NULL, NULL, '2018-07-02 06:20:45'),
(23, 1, 3, 10, NULL, NULL, NULL, '2018-07-02 06:21:20'),
(24, 1, 5, 13, NULL, NULL, NULL, '2018-07-02 06:27:54'),
(25, 1, 7, 17, NULL, NULL, NULL, '2018-07-02 12:20:08'),
(26, 1, 7, 17, NULL, NULL, NULL, '2018-07-02 12:22:13'),
(27, 1, 7, 17, NULL, NULL, NULL, '2018-07-02 12:25:38'),
(28, 1, 7, 19, NULL, NULL, NULL, '2018-07-02 12:30:08'),
(29, 1, 3, 10, NULL, NULL, NULL, '2018-07-03 09:09:32'),
(30, 1, 3, 10, NULL, NULL, NULL, '2018-07-03 09:16:57'),
(31, 1, 7, 17, NULL, NULL, NULL, '2018-07-03 09:20:21'),
(32, 1, 12, 24, NULL, NULL, NULL, '2018-07-03 09:51:00'),
(33, 1, 3, 10, NULL, NULL, NULL, '2018-07-03 09:53:45'),
(34, 1, 3, 10, NULL, NULL, NULL, '2018-07-03 12:46:34'),
(35, 1, 5, 13, NULL, NULL, NULL, '2018-07-04 07:11:13'),
(36, 1, 5, 13, NULL, NULL, NULL, '2018-07-04 07:11:19'),
(37, 1, 5, 13, NULL, NULL, NULL, '2018-07-04 07:11:22'),
(38, 1, 5, 13, NULL, NULL, NULL, '2018-07-04 07:11:29'),
(39, 1, 5, 13, NULL, NULL, NULL, '2018-07-04 07:11:32'),
(40, 1, 5, 13, NULL, NULL, NULL, '2018-07-04 07:11:42'),
(41, 1, 5, 13, NULL, NULL, NULL, '2018-07-04 07:11:46'),
(42, 1, 5, 13, NULL, NULL, NULL, '2018-07-04 07:13:23'),
(43, 1, 5, 13, NULL, NULL, NULL, '2018-07-04 07:16:16'),
(44, 1, 2, 3, 'Usaid Raees', 'Users', 'status', '2018-07-06 05:12:29'),
(45, 1, 2, 3, 'Usaid Raees', 'Users', 'status', '2018-07-06 05:17:22'),
(46, 3, 2, 2, 'Azhar Ahmed Saifi', 'Users', 'edit', '2018-11-26 12:50:39'),
(47, 5, 2, 2, 'ahmed Ali', 'Users', 'edit', '2018-11-26 12:51:27'),
(48, 5, 2, 1, 'ahmed Ali', 'Users', 'add', '2018-11-26 12:52:02'),
(49, 3, 2, 4, 'Azhar Ahmed Saifi', 'Users', 'delete', '2018-11-26 12:53:06'),
(50, 3, 3, 10, 'Azhar Ahmed Saifi', 'Roles', 'edit', '2018-11-26 12:53:13'),
(51, 1, 23, 25, 'Usaid Raees', 'Clients', 'add', '2018-12-04 12:25:08'),
(52, 1, 23, 26, 'Usaid Raees', 'Clients', 'edit', '2018-12-04 12:48:04'),
(53, 1, 23, 26, 'Usaid Raees', 'Clients', 'edit', '2018-12-04 12:48:10'),
(54, 1, 2, 3, 'Usaid Raees', 'Users', 'status', '2018-12-04 12:48:13'),
(55, 1, 23, 27, 'Usaid Raees', 'Clients', 'status', '2018-12-04 12:49:45'),
(56, 1, 23, 28, 'Usaid Raees', 'Clients', 'delete', '2018-12-04 12:49:50'),
(57, 1, 23, 25, 'Usaid Raees', 'Clients', 'add', '2018-12-04 12:50:53'),
(58, 1, 23, 28, 'Usaid Raees', 'Clients', 'delete', '2018-12-04 12:51:02'),
(59, 1, 23, 25, 'Usaid Raees', 'Clients', 'add', '2018-12-04 12:51:48'),
(60, 1, 23, 28, 'Usaid Raees', 'Clients', 'delete', '2018-12-04 12:51:59'),
(61, 1, 23, 25, 'Usaid Raees', 'Clients', 'add', '2018-12-04 12:52:20'),
(62, 1, 23, 28, 'Usaid Raees', 'Clients', 'delete', '2018-12-04 12:52:24'),
(63, 1, 23, 25, 'Usaid Raees', 'Clients', 'add', '2018-12-04 12:53:05'),
(64, 1, 23, 28, 'Usaid Raees', 'Clients', 'delete', '2018-12-04 12:53:08'),
(65, 1, 23, 25, 'Usaid Raees', 'Clients', 'add', '2018-12-04 12:53:42'),
(66, 1, 23, 28, 'Usaid Raees', 'Clients', 'delete', '2018-12-04 12:53:54'),
(67, 1, 23, 27, 'Usaid Raees', 'Clients', 'status', '2018-12-10 09:36:01'),
(68, 1, 23, 27, 'Usaid Raees', 'Clients', 'status', '2018-12-10 09:36:02'),
(69, 1, 23, 28, 'Usaid Raees', 'Clients', 'delete', '2018-12-10 09:36:05'),
(70, 1, 23, 27, 'Usaid Raees', 'Clients', 'status', '2018-12-10 09:39:14'),
(71, 1, 23, 27, 'Usaid Raees', 'Clients', 'status', '2018-12-10 09:39:16'),
(72, 1, 23, 25, 'Usaid Raees', 'Clients', 'add', '2018-12-10 09:39:28'),
(73, 1, 2, 2, 'Usaid Raees', 'Users', 'edit', '2018-12-10 10:08:13'),
(74, 5, 3, 10, 'ahmed Ali', 'Roles', 'edit', '2018-12-10 10:10:10'),
(75, 1, 2, 2, 'Usaid Raees', 'Users', 'edit', '2018-12-11 09:44:19'),
(76, 1, 2, 2, 'Usaid Raees', 'Users', 'edit', '2018-12-11 09:44:23'),
(77, 1, 2, 2, 'Usaid Raees', 'Users', 'edit', '2018-12-11 09:44:38'),
(78, 1, 3, 10, 'Usaid Raees', 'Roles', 'edit', '2018-12-11 10:01:25'),
(79, 1, 5, 13, 'Usaid Raees', 'Networks', 'add', '2018-12-11 10:04:48'),
(80, 1, 5, 15, 'Usaid Raees', 'Networks', 'delete', '2018-12-11 10:05:05'),
(81, 1, 5, 14, 'Usaid Raees', 'Networks', 'edit', '2018-12-11 10:05:38'),
(82, 1, 3, 10, 'Usaid Raees', 'Roles', 'edit', '2018-12-12 11:31:58'),
(83, 5, 3, 10, 'ahmed Ali', 'Roles', 'edit', '2018-12-12 11:33:24'),
(84, 5, 3, 10, 'ahmed Ali', 'Roles', 'edit', '2018-12-12 11:44:38'),
(85, 5, 30, 47, 'ahmed Ali', 'Post', 'featured', '2018-12-12 11:45:34'),
(86, 5, 30, 47, 'ahmed Ali', 'Post', 'featured', '2018-12-12 11:45:36'),
(87, 1, 2, 4, 'Usaid Raees', 'Users', 'delete', '2018-12-13 07:39:01'),
(88, 1, 3, 10, 'Usaid Raees', 'Roles', 'edit', '2019-01-08 09:26:52'),
(89, 1, 3, 10, 'Usaid Raees', 'Roles', 'edit', '2019-01-08 09:27:49'),
(90, 1, 3, 10, 'Usaid Raees', 'Roles', 'edit', '2019-01-08 09:28:49'),
(91, 5, 3, 10, 'ahmed Ali', 'Roles', 'edit', '2019-01-08 09:31:23'),
(92, 1, 2, 1, 'Usaid Raees', 'Users', 'add', '2019-02-08 06:33:40'),
(93, 11, 3, 9, 'shehryar', 'Roles', 'add', '2019-02-08 06:40:54'),
(94, 11, 3, 12, 'shehryar', 'Roles', 'delete', '2019-02-08 06:41:24'),
(95, 11, 3, 10, 'shehryar', 'Roles', 'edit', '2019-02-08 12:46:11'),
(96, 11, 2, 3, 'shehryar', 'Users', 'status', '2019-02-09 06:25:45'),
(97, 11, 2, 3, 'shehryar', 'Users', 'status', '2019-02-09 06:25:45'),
(98, 11, 2, 1, 'shehryar', 'Users', 'add', '2019-02-11 11:03:56'),
(99, 11, 2, 4, 'shehryar', 'Users', 'delete', '2019-02-11 11:04:12'),
(100, 5, 2, 1, 'ahmed Ali', 'Users', 'add', '2019-02-19 13:13:10'),
(101, 5, 2, 3, 'ahmed Ali', 'Users', 'status', '2019-02-19 13:13:24'),
(102, 11, 3, 9, 'shehryar', 'Roles', 'add', '2019-02-23 10:34:20'),
(103, 11, 2, 3, 'shehryar', 'Users', 'status', '2019-02-23 10:35:12'),
(104, 11, 2, 2, 'shehryar', 'Users', 'edit', '2019-02-23 10:35:44'),
(105, 11, 2, 3, 'shehryar', 'Users', 'status', '2019-02-27 09:16:59'),
(106, 4, 2, 3, 'Adiministrator', 'Users', 'status', '2019-02-27 09:18:58'),
(107, 11, 3, 10, 'shehryar', 'Roles', 'edit', '2019-03-05 10:16:29'),
(108, 11, 2, 2, 'shehryar', 'Users', 'edit', '2019-03-05 10:16:58'),
(109, 4, 2, 2, 'Adiministrator', 'Users', 'edit', '2019-03-05 10:17:59'),
(110, 4, 3, 10, 'Adiministrator', 'Roles', 'edit', '2019-03-05 10:44:45'),
(111, 11, 3, 9, 'shehryar', 'Roles', 'add', '2019-03-06 06:00:51'),
(112, 11, 3, 12, 'shehryar', 'Roles', 'delete', '2019-03-06 06:00:55'),
(113, 11, 3, 9, 'shehryar', 'Roles', 'add', '2019-03-07 08:19:13'),
(114, 11, 2, 1, 'shehryar', 'Users', 'add', '2019-03-07 08:53:05'),
(115, 11, 2, 1, 'shehryar', 'Users', 'add', '2019-03-12 10:22:38'),
(116, 14, 5, 16, 'Arsalan Ahmed', 'Networks', 'status', '2019-03-12 10:26:58'),
(117, 11, 2, 3, 'shehryar', 'Users', 'status', '2019-03-12 12:18:07'),
(118, 11, 2, 3, 'shehryar', 'Users', 'status', '2019-03-12 12:25:57'),
(119, 11, 2, 3, 'shehryar', 'Users', 'status', '2019-03-12 12:26:00'),
(120, 11, 2, 3, 'shehryar', 'Users', 'status', '2019-03-12 12:26:01'),
(121, 11, 2, 3, 'shehryar', 'Users', 'status', '2019-03-12 12:26:05'),
(122, 11, 2, 3, 'shehryar', 'Users', 'status', '2019-03-12 12:26:07'),
(123, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:25'),
(124, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:25'),
(125, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:26'),
(126, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:27'),
(127, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:28'),
(128, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:28'),
(129, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:29'),
(130, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:29'),
(131, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:30'),
(132, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:30'),
(133, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:31'),
(134, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:31'),
(135, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:31'),
(136, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:32'),
(137, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:32'),
(138, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:33'),
(139, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:33'),
(140, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:34'),
(141, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:34'),
(142, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:35'),
(143, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:35'),
(144, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:35'),
(145, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:36'),
(146, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:37'),
(147, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:38'),
(148, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:38'),
(149, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:38'),
(150, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:39'),
(151, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:40'),
(152, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:40'),
(153, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:40'),
(154, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:41'),
(155, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:41'),
(156, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:41'),
(157, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:41'),
(158, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:41'),
(159, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:42'),
(160, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:42'),
(161, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:42'),
(162, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:42'),
(163, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:42'),
(164, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:42'),
(165, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:43'),
(166, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:43'),
(167, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:43'),
(168, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:43'),
(169, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:43'),
(170, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:44'),
(171, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:44'),
(172, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:44'),
(173, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:44'),
(174, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:44'),
(175, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:44'),
(176, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:45'),
(177, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:45'),
(178, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:45'),
(179, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:45'),
(180, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:45'),
(181, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:46'),
(182, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:46'),
(183, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:46'),
(184, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:46'),
(185, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:46'),
(186, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:46'),
(187, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:47'),
(188, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:47'),
(189, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:47'),
(190, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:47'),
(191, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:47'),
(192, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:48'),
(193, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:48'),
(194, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:48'),
(195, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:48'),
(196, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:48'),
(197, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:48'),
(198, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:49'),
(199, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:49'),
(200, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:49'),
(201, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:49'),
(202, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:49'),
(203, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:50'),
(204, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:50'),
(205, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:50'),
(206, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:50'),
(207, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:50'),
(208, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:56'),
(209, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:56'),
(210, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:57'),
(211, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:57'),
(212, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:02:57'),
(213, 11, 2, 3, 'shehryar', 'Users', 'status', '2019-03-13 10:10:48'),
(214, 11, 2, 3, 'shehryar', 'Users', 'status', '2019-03-13 10:10:49'),
(215, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:23:18'),
(216, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:23:19'),
(217, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:23:19'),
(218, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:23:19'),
(219, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:23:19'),
(220, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:23:20'),
(221, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:23:20'),
(222, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:23:20'),
(223, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:23:20'),
(224, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:23:21'),
(225, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:29:52'),
(226, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:29:52'),
(227, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:30:29'),
(228, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:30:29'),
(229, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:30:29'),
(230, 14, 2, 3, 'Arsalan Ahmed', 'Users', 'status', '2019-03-13 10:30:30'),
(231, 11, 2, 1, 'shehryar', 'Users', 'add', '2019-03-18 09:08:35'),
(232, 11, 2, 3, 'shehryar', 'Users', 'status', '2019-03-18 09:08:43'),
(233, 11, 2, 3, 'shehryar', 'Users', 'status', '2019-03-18 09:08:45'),
(234, 11, 2, 4, 'shehryar', 'Users', 'delete', '2019-03-18 09:09:07'),
(235, 11, 29, 39, 'shehryar', 'FAQ', 'status', '2019-03-18 09:50:48'),
(236, 11, 29, 39, 'shehryar', 'FAQ', 'status', '2019-03-18 09:50:48'),
(237, 11, 29, 39, 'shehryar', 'FAQ', 'status', '2019-03-18 09:50:49'),
(238, 11, 29, 39, 'shehryar', 'FAQ', 'status', '2019-03-18 09:50:50'),
(239, 11, 2, 2, 'shehryar', 'Users', 'edit', '2019-03-25 07:58:38'),
(240, 11, 3, 9, 'shehryar', 'Roles', 'add', '2019-04-01 10:05:11'),
(241, 11, 3, 9, 'shehryar', 'Roles', 'add', '2019-04-01 10:05:20'),
(242, 11, 3, 9, 'shehryar', 'Roles', 'add', '2019-04-01 10:05:27'),
(243, 11, 3, 9, 'shehryar', 'Roles', 'add', '2019-04-01 10:05:34'),
(244, 11, 3, 9, 'shehryar', 'Roles', 'add', '2019-04-01 10:05:40'),
(245, 11, 3, 9, 'shehryar', 'Roles', 'add', '2019-04-01 10:05:46'),
(246, 11, 3, 9, 'shehryar', 'Roles', 'add', '2019-04-01 10:05:54'),
(247, 11, 3, 9, 'shehryar', 'Roles', 'add', '2019-04-01 10:06:01'),
(248, 3, 23, 25, 'Azhar Ahmed Saifi', 'Clients', 'add', '2019-04-04 14:06:13'),
(249, 1, 2, 1, 'Usaid Raees', 'Users', 'add', '2019-04-05 11:34:29'),
(250, 5, 2, 3, 'ahmed Ali', 'Users', 'status', '2019-04-06 10:07:18'),
(251, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:18'),
(252, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:18'),
(253, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:19'),
(254, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:19'),
(255, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:20'),
(256, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:21'),
(257, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:21'),
(258, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:21'),
(259, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:22'),
(260, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:22'),
(261, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:23'),
(262, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:23'),
(263, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:24'),
(264, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:24'),
(265, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:25'),
(266, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:25'),
(267, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:26'),
(268, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:26'),
(269, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:27'),
(270, 1, 29, 39, 'Usaid Raees', 'FAQ', 'status', '2019-04-06 12:03:28'),
(271, 1, 28, 43, 'Usaid Raees', 'Category', 'status', '2019-04-06 12:03:32'),
(272, 1, 28, 43, 'Usaid Raees', 'Category', 'status', '2019-04-06 12:03:33'),
(273, 1, 28, 43, 'Usaid Raees', 'Category', 'status', '2019-04-06 12:03:33'),
(274, 1, 28, 43, 'Usaid Raees', 'Category', 'status', '2019-04-06 12:03:34'),
(275, 1, 23, 27, 'Usaid Raees', 'Clients', 'status', '2019-04-06 12:07:08'),
(276, 1, 23, 27, 'Usaid Raees', 'Clients', 'status', '2019-04-06 12:07:08'),
(277, 1, 2, 3, 'Usaid Raees', 'Users', 'status', '2019-04-06 12:20:32'),
(278, 1, 2, 3, 'Usaid Raees', 'Users', 'status', '2019-04-06 12:20:33'),
(279, 1, 2, 3, 'Usaid Raees', 'Users', 'status', '2019-04-06 12:20:33'),
(280, 5, 2, 3, 'ahmed Ali', 'Users', 'status', '2019-04-09 11:25:48'),
(281, 9, 3, 12, 'Umair Ansar', 'Roles', 'delete', '2019-04-25 06:48:39'),
(282, 9, 5, 13, 'Umair Ansar', 'Networks', 'add', '2019-04-25 06:52:39'),
(283, 9, 5, 14, 'Umair Ansar', 'Networks', 'edit', '2019-04-25 06:52:46'),
(284, 9, 5, 15, 'Umair Ansar', 'Networks', 'delete', '2019-04-25 06:52:51'),
(285, 9, 26, 33, 'Umair Ansar', 'FAQ Category', 'add', '2019-04-25 06:53:00'),
(286, 9, 26, 36, 'Umair Ansar', 'FAQ Category', 'delete', '2019-04-25 06:53:02'),
(287, 9, 29, 37, 'Umair Ansar', 'FAQ', 'add', '2019-04-25 06:53:11'),
(288, 9, 29, 40, 'Umair Ansar', 'FAQ', 'delete', '2019-04-25 06:53:16'),
(289, 9, 3, 9, 'Umair Ansar', 'Roles', 'add', '2019-04-25 06:55:23'),
(290, 9, 3, 12, 'Umair Ansar', 'Roles', 'delete', '2019-04-25 06:55:33'),
(291, 9, 23, 25, 'Umair Ansar', 'Clients', 'add', '2019-04-25 06:55:53'),
(292, 9, 23, 26, 'Umair Ansar', 'Clients', 'edit', '2019-04-25 06:56:09'),
(293, 9, 23, 28, 'Umair Ansar', 'Clients', 'delete', '2019-04-25 06:56:14'),
(294, 9, 28, 41, 'Umair Ansar', 'Category', 'add', '2019-04-25 06:56:24'),
(295, 9, 28, 42, 'Umair Ansar', 'Category', 'edit', '2019-04-25 06:56:29'),
(296, 9, 28, 44, 'Umair Ansar', 'Category', 'delete', '2019-04-25 06:56:32'),
(297, 9, 30, 45, 'Umair Ansar', 'Post', 'add', '2019-04-25 06:57:13'),
(298, 9, 30, 45, 'Umair Ansar', 'Post', 'add', '2019-04-25 06:58:46'),
(299, 9, 30, 47, 'Umair Ansar', 'Post', 'featured', '2019-04-25 06:59:10'),
(300, 9, 30, 47, 'Umair Ansar', 'Post', 'featured', '2019-04-25 06:59:18'),
(301, 9, 5, 13, 'Umair Ansar', 'Networks', 'add', '2019-04-25 08:09:06'),
(302, 9, 5, 16, 'Umair Ansar', 'Networks', 'status', '2019-04-26 04:51:01'),
(303, 9, 5, 16, 'Umair Ansar', 'Networks', 'status', '2019-04-26 04:51:02'),
(304, 10, 30, 48, 'Nauman Tasleem', 'Post', 'status', '2019-05-07 06:35:57'),
(305, 10, 30, 48, 'Nauman Tasleem', 'Post', 'status', '2019-05-07 06:35:58'),
(306, 10, 30, 48, 'Nauman Tasleem', 'Post', 'status', '2019-05-07 06:35:58'),
(307, 10, 30, 48, 'Nauman Tasleem', 'Post', 'status', '2019-05-07 06:35:59'),
(308, 10, 30, 48, 'Nauman Tasleem', 'Post', 'status', '2019-05-07 06:35:59'),
(309, 10, 30, 48, 'Nauman Tasleem', 'Post', 'status', '2019-05-07 06:36:00'),
(310, 1, 2, 50, 'Shehryar Haider', 'settings', 'settings', '2020-07-22 07:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'blog first', 1, '2018-07-02 11:02:17', '2019-04-06 17:03:33'),
(14, 'blog second', 1, '2018-12-11 16:57:23', '2019-04-06 17:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(21) NOT NULL,
  `client_files_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_files_id`, `name`, `email`, `number`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'ahmed', 'ahmed@hotmail.com', '3443899483', 1, '2018-12-05 11:49:54', '2019-04-06 12:07:08'),
(3, 1, 'ali', 'ali@hotmail.com', '3443899483', 1, '2018-12-05 11:49:54', '2018-12-05 11:49:54'),
(4, 1, 'afzal', 'afzal@hotmail.com', '3443899483', 1, '2018-12-05 11:49:54', '2018-12-05 11:49:54'),
(5, 1, 'zubair', 'zubair@hotmail.com', '3443899483', 1, '2018-12-05 11:49:54', '2018-12-05 11:49:54'),
(6, 1, 'zahid', 'zahid@hotmail.com', '3443899483', 1, '2018-12-05 11:49:54', '2018-12-05 11:49:54'),
(7, 1, 'shabnum', 'shabnum@hotmail.com', '3443899483', 1, '2018-12-05 11:49:54', '2018-12-05 11:49:54'),
(8, 1, 'shabana', 'shabana@hotmail.com', '3443899483', 1, '2018-12-05 11:49:54', '2018-12-05 11:49:54'),
(9, 1, 'Zulfiqar', 'zulfiqar@hotmail.com', '3443899483', 1, '2018-12-05 11:49:54', '2018-12-05 11:49:54'),
(10, 1, 'Zaibunnisa', 'zaibunnissa@hotmail.com', '3443899483', 1, '2018-12-05 11:49:54', '2018-12-05 11:49:54'),
(11, 2, 'usaid', 'usaid@hotmail.com', '3443899483', 1, '2018-12-05 12:08:52', '2018-12-05 12:08:52'),
(12, 2, 'ahmed', 'ahmed@hotmail.com', '3443899483', 1, '2018-12-05 12:08:52', '2018-12-05 12:08:52'),
(13, 2, 'ali', 'ali@hotmail.com', '3443899483', 1, '2018-12-05 12:08:52', '2018-12-05 12:08:52'),
(14, 2, 'afzal', 'afzal@hotmail.com', '3443899483', 1, '2018-12-05 12:08:52', '2018-12-05 12:08:52'),
(15, 2, 'zubair', 'zubair@hotmail.com', '3443899483', 1, '2018-12-05 12:08:52', '2018-12-05 12:08:52'),
(16, 2, 'zahid', 'zahid@hotmail.com', '3443899483', 1, '2018-12-05 12:08:52', '2018-12-05 12:08:52'),
(17, 2, 'shabnum', 'shabnum@hotmail.com', '3443899483', 1, '2018-12-05 12:08:52', '2018-12-05 12:08:52'),
(18, 2, 'shabana', 'shabana@hotmail.com', '3443899483', 1, '2018-12-05 12:08:52', '2018-12-05 12:08:52'),
(19, 2, 'Zulfiqar', 'zulfiqar@hotmail.com', '3443899483', 1, '2018-12-05 12:08:52', '2018-12-05 12:08:52'),
(20, 2, 'Zaibunnisa', 'zaibunnissa@hotmail.com', '3443899483', 1, '2018-12-05 12:08:52', '2018-12-05 12:08:52'),
(21, NULL, 'test', 'test@test.com', '123', 1, '2018-12-10 09:39:28', '2018-12-10 09:39:28'),
(22, NULL, 'Utility Bill', 'fahim@horizontech.biz', '123', 1, '2019-04-04 14:06:13', '2019-04-04 14:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `client_files`
--

CREATE TABLE `client_files` (
  `id` bigint(20) NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_files`
--

INSERT INTO `client_files` (`id`, `file_name`, `file`, `created_at`, `updated_at`) VALUES
(1, 'test', 'LXNJu96nnhqOJOHtIqdJweypu9TY9EQ6rDlnTaa9.txt', '2018-12-05 10:40:49', '2018-12-05 10:40:49'),
(2, 'test', 'QoXsII0XRAmQ72s7ywFIiBgJClM3JYK8UPric1ip.txt', '2018-12-05 10:41:50', '2018-12-05 10:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `contact_person` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `region` varchar(50) NOT NULL,
  `sub_region` varchar(50) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `st_reg_no` varchar(50) NOT NULL,
  `cnic` varchar(13) NOT NULL,
  `business_sector` varchar(50) NOT NULL,
  `acc_manager` varchar(50) NOT NULL,
  `credit_limit` varchar(20) NOT NULL,
  `credit_terms` varchar(50) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `customer_type` tinyint(4) NOT NULL COMMENT '0 is cash customer | 1 is credit customer',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `account_name`, `contact_person`, `address`, `region`, `sub_region`, `telephone`, `mobile`, `fax`, `email`, `website`, `st_reg_no`, `cnic`, `business_sector`, `acc_manager`, `credit_limit`, `credit_terms`, `remarks`, `customer_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Umair', '03162525211', 'landhi krachi', 'Sindh', 'Landhi', '0215544225', '03332312521', 'fax temp', 'shehryar@email.com', 'shehryar.com', '25', '420173070953', 'karachi', 'shehryar', '15', '2256125', 'remairkakasdfa asdjfklasjflaksd', 0, 1, '2020-07-30 09:32:58', '2020-07-30 09:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `list_of_accounts`
--

CREATE TABLE `list_of_accounts` (
  `id` int(11) NOT NULL,
  `sub_account_type_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_of_accounts`
--

INSERT INTO `list_of_accounts` (`id`, `sub_account_type_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'list of account', 1, '2020-07-29 06:57:28', '2020-07-22 04:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mt_chart_of_accounts`
--

CREATE TABLE `mt_chart_of_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mt_chart_of_accounts`
--

INSERT INTO `mt_chart_of_accounts` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(19, 'Cash', 1, '2020-07-22 16:47:52', '2020-07-22 16:47:52'),
(21, 'Customers', 1, '2020-07-22 16:48:08', '2020-07-22 16:48:08'),
(22, 'Inventories', 1, '2020-07-22 16:48:22', '2020-07-22 16:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `mt_sub_accounts_types`
--

CREATE TABLE `mt_sub_accounts_types` (
  `id` int(11) NOT NULL,
  `chart_of_account_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mt_sub_accounts_types`
--

INSERT INTO `mt_sub_accounts_types` (`id`, `chart_of_account_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 19, 'Cash', 1, '2020-07-22 12:05:20', '2020-07-22 12:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('usaidraees@horizontech.biz', '$2y$10$zW.y4dnnca8S7ST8ev4VVOjx9KcTdSAaFZWaYpAsDPXbRleRMF/aK', '2018-06-28 00:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `blog_category_id` int(11) UNSIGNED NOT NULL,
  `featured_image` varchar(191) NOT NULL,
  `heading` text NOT NULL,
  `text` text NOT NULL,
  `views` bigint(21) NOT NULL DEFAULT 0,
  `tags` text NOT NULL,
  `description` text NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `slug` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `blog_category_id`, `featured_image`, `heading`, `text`, `views`, `tags`, `description`, `featured`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'hyFY7R7C3EHW1HDC5QVwbEuG4XI46Etcxo4fPgvM.png', 'asda', 'asdasd', 0, 'asdasd', 'adasd', 1, 'asdad', 1, '2018-12-12 10:34:51', '2019-05-07 06:36:00'),
(2, 14, 'PiNlhJSp2ziinVIlWJ88xOh6Gk8cGVXhdv0suMRO.png', 'qweqwe', 'qweqweqweqwe', 0, 'eqweq', 'eqwe', 0, 'sdasdwqe', 1, '2018-12-12 10:39:06', '2019-05-07 06:35:59'),
(3, 1, 'gPPqeEWHBXvC0zUKJAFMiPBk0ceB5aUui5WTCfyr.png', 'asdsd', 'asdsdasd', 0, 'ass', 'asdas', 0, 'asdasd', 1, '2019-04-25 06:57:13', '2019-05-07 06:35:59'),
(4, 14, 'AvZhIJxeqBi7zbpsWLpPfvWB7sWVGkJ3QQjI0IKz.png', 'asdasd', 'asdasd', 0, 'asd', 'asdasd', 0, 'wwwwwwwww', 1, '2019-04-25 06:58:46', '2019-04-25 06:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_bin NOT NULL,
  `value` text COLLATE utf8mb4_bin NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `updated_at`, `created_at`) VALUES
(3, 'site_name', 'POS', '2020-07-22 06:46:28', '0000-00-00 00:00:00'),
(4, 'site_logo', 'EN8qs9Gvqnbpk7u35Hi7UkSHx7sJQVYzze7tEFd3.png', '2019-04-29 10:33:56', '0000-00-00 00:00:00'),
(5, 'site_email', 'pad@cyber.net.pk', '2019-04-25 10:47:35', '0000-00-00 00:00:00'),
(6, 'no_reply_email', 'info@padeaf.org', '2019-04-25 10:47:35', '0000-00-00 00:00:00'),
(7, 'contact_number', '+92 (21) 34387140, +92 (21) 34387150', '2019-04-25 10:47:35', '0000-00-00 00:00:00'),
(8, 'contact_email', 'pad@cyber.net.pk', '2019-04-25 10:47:35', '0000-00-00 00:00:00'),
(9, 'address', '23/A, PECHS, Block 6, M-1 Shaheen Tower, Shahrah-e-Faisal, Karachi – Pakistan.', '2019-04-25 10:42:50', '0000-00-00 00:00:00'),
(10, 'google_source', 'https://www.google.com/maps/place/Pakistan+Association+of+the+Deaf/@24.861677,67.069878,18z/data=!4m5!3m4!1s0x0:0xdc82b431024ed8f6!8m2!3d24.861677!4d67.0698779?hl=en', '2019-04-25 10:47:35', '0000-00-00 00:00:00'),
(13, 'social_facebook', 'www.facebook.com/padeaf.biz/', '2019-04-25 10:47:35', '0000-00-00 00:00:00'),
(14, 'social_twitter', 'www.facebook.com/padeaf.biz/', '2019-04-25 10:47:35', '0000-00-00 00:00:00'),
(15, 'social_linkedin', 'www.facebook.com/padeaf.biz/', '2019-04-25 10:47:35', '0000-00-00 00:00:00'),
(16, 'social_googleplus', 'www.facebook.com/padeaf.biz/', '2019-04-25 10:47:35', '0000-00-00 00:00:00'),
(17, 'social_instagram', 'www.facebook.com/padeaf.biz/', '2019-04-25 10:47:35', '0000-00-00 00:00:00'),
(18, 'website', 'www.padeaf.org', '2019-04-25 10:47:35', '2018-05-17 08:52:13'),
(19, 'timmings', 'Mon - Sat 9:00am - 6:00 pm', '2018-08-11 11:32:48', '2018-05-17 08:52:13'),
(20, 'info', 'Member of World Federation of the Deaf and Asia-Pacific Development Center on Disability\r\n', '2019-05-06 05:18:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sm_faq`
--

CREATE TABLE `sm_faq` (
  `id` int(11) NOT NULL,
  `sm_faq_category_id` int(11) NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sm_faq`
--

INSERT INTO `sm_faq` (`id`, `sm_faq_category_id`, `heading`, `text`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, 'wead', 'asdasd', 1, '2018-12-12 12:59:00', '2019-04-06 17:03:28'),
(2, 1, 'sdas', 'dasd', 1, '2018-12-12 13:00:05', '2019-04-06 17:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `sm_faq_categories`
--

CREATE TABLE `sm_faq_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sm_faq_categories`
--

INSERT INTO `sm_faq_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'first', 1, '2018-07-02 11:02:17', '2018-12-12 11:51:30'),
(14, 'second', 1, '2018-12-11 16:57:23', '2018-12-11 16:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `um_menus`
--

CREATE TABLE `um_menus` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'menus that will host children will have a route of null',
  `is_seo` tinyint(1) NOT NULL DEFAULT 0,
  `is_content` tinyint(1) NOT NULL DEFAULT 0,
  `content_route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `um_menus`
--

INSERT INTO `um_menus` (`id`, `parent_id`, `icon`, `name`, `route`, `is_seo`, `is_content`, `content_route`, `seo_tags`, `seo_description`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'ti-user', 'Administration', NULL, 0, 0, NULL, NULL, NULL, 2, 1, '2018-06-28 06:07:05', '2020-07-22 06:57:39'),
(3, 1, NULL, 'Roles', 'roles', 0, 0, NULL, NULL, NULL, 2, 1, '2018-06-28 06:07:05', '2019-02-27 04:46:27'),
(4, 0, 'ti-files', 'Maintain', NULL, 0, 0, NULL, NULL, NULL, 3, 1, '2018-06-28 06:09:46', '2020-07-22 07:52:42'),
(5, 4, NULL, 'Chart Of Account', 'chart_of_account', 0, 0, NULL, NULL, NULL, 1, 1, '2018-06-28 06:09:46', '2020-07-22 08:07:43'),
(9, 0, 'ti-bar-chart', 'Reports', NULL, 0, 0, NULL, NULL, NULL, 7, 1, '2018-06-28 06:14:16', '2018-12-11 11:04:56'),
(10, 9, NULL, 'Report', 'reports', 0, 0, NULL, NULL, NULL, 1, 1, '2018-06-28 06:14:16', '2018-06-29 10:13:25'),
(11, 0, 'ti-pencil-alt', 'Content Pages', 'content', 0, 0, NULL, NULL, NULL, 6, 1, '2018-06-28 06:15:23', '2018-12-11 11:04:48'),
(13, 0, 'ti-home', 'Dashboard', 'dashboard', 0, 0, NULL, NULL, NULL, 1, 1, '2018-06-28 06:16:12', '2019-02-27 04:46:22'),
(14, 0, 'ion-android-note', 'Logs', NULL, 0, 0, NULL, NULL, NULL, 6, 1, '2018-06-29 11:31:55', '2018-06-29 11:31:55'),
(15, 14, NULL, 'Users Logins', 'log.user', 0, 0, NULL, NULL, NULL, 1, 1, '2018-06-29 11:31:55', '2018-11-22 12:26:59'),
(16, 14, NULL, 'User Actions', 'log.action', 0, 0, NULL, NULL, NULL, 2, 1, '2018-06-29 11:31:55', '2018-06-29 11:33:47'),
(21, 0, 'ti-settings', 'Settings', 'settings', 0, 0, NULL, NULL, NULL, 7, 1, '2018-08-16 10:26:35', '2018-11-22 12:27:01'),
(22, 0, 'fa fa-google', 'SEO', 'seo', 0, 0, NULL, NULL, NULL, 8, 1, '2018-08-17 07:51:24', '2018-11-22 12:27:01'),
(23, 0, 'fa fa-id-card', 'Clients', 'clients', 0, 0, NULL, NULL, NULL, 5, 1, '2018-11-28 07:52:56', '2018-12-11 11:04:19'),
(25, 0, 'ti-layout', 'Site Management', NULL, 0, 0, NULL, NULL, NULL, 5, 1, '2018-12-11 11:11:32', '2018-12-11 11:11:38'),
(26, 25, NULL, 'FAQ Category', 'faq.category', 0, 0, NULL, NULL, NULL, 1, 0, '2018-12-11 11:11:54', '2019-04-26 06:12:23'),
(27, 0, 'fa fa-comment', 'Blogs', NULL, 0, 0, NULL, NULL, NULL, 5, 1, '2018-12-11 12:32:29', '2018-12-11 12:36:39'),
(28, 27, NULL, 'Category', 'blog.category', 0, 0, NULL, NULL, NULL, 1, 1, '2018-12-11 12:36:54', '2018-12-11 12:36:54'),
(29, 25, NULL, 'Donor', 'donor', 0, 0, NULL, NULL, NULL, 2, 1, '2018-12-12 07:48:33', '2019-04-25 12:29:13'),
(30, 27, NULL, 'Post', 'blog.post', 0, 0, NULL, NULL, NULL, 2, 1, '2018-12-12 10:01:40', '2018-12-12 10:01:40'),
(32, 1, NULL, 'Users', 'users', 0, 0, NULL, NULL, NULL, 1, 1, '2019-04-25 07:34:26', '2019-04-25 07:37:52'),
(33, 25, NULL, 'Slider Images', 'slider_image', 0, 0, NULL, NULL, NULL, 2, 1, '2019-04-26 06:38:02', '2019-04-26 07:09:58'),
(35, 25, NULL, 'Media Videos', 'media_videos', 0, 0, NULL, NULL, NULL, 3, 1, '2019-04-29 07:51:38', '2019-04-29 07:51:38'),
(42, 4, NULL, 'Event Categories', 'customers', 0, 0, NULL, NULL, NULL, 3, 1, '2019-04-30 12:22:50', '2020-07-22 04:52:05'),
(43, 25, NULL, 'Gallery', 'gallery', 0, 0, NULL, NULL, NULL, 5, 1, '2019-05-02 06:04:57', '2019-05-02 06:04:57'),
(44, 25, NULL, 'News', 'news', 0, 0, NULL, NULL, NULL, 5, 1, '2019-05-02 07:37:14', '2019-05-02 07:37:14'),
(45, 25, NULL, 'Patrons', 'patrons', 0, 0, NULL, NULL, NULL, 6, 1, '2019-05-02 09:27:45', '2019-05-07 06:35:33'),
(46, 4, NULL, 'Donate Now Category', 'donate_now_categories', 0, 0, NULL, NULL, NULL, 4, 1, '2019-05-02 09:50:53', '2020-07-22 04:50:22'),
(47, 25, NULL, 'Donate Now', 'donate_now', 0, 0, NULL, NULL, NULL, 7, 1, '2019-05-02 10:23:29', '2019-05-07 06:35:34'),
(48, 5, NULL, 'Sub Account Types', 'sub_account_type', 0, 0, NULL, NULL, NULL, 2, 1, '2020-07-22 09:40:45', '2020-07-22 09:44:06'),
(49, 48, NULL, 'List of Account', 'list_of_account', 0, 0, NULL, NULL, NULL, 1, 1, '2020-07-29 07:15:32', '2020-07-29 07:15:32'),
(50, 4, NULL, 'Customers', 'customers', 0, 0, NULL, NULL, NULL, 2, 1, '2020-07-22 04:49:58', '2020-07-22 04:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `um_permissions`
--

CREATE TABLE `um_permissions` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `um_permissions`
--

INSERT INTO `um_permissions` (`id`, `menu_id`, `name`, `route`, `created_at`, `updated_at`) VALUES
(1, 2, 'add', 'users.create', '2018-06-29 08:16:39', '2018-07-05 07:43:54'),
(2, 2, 'edit', 'users.edit', '2018-06-29 08:16:39', '2018-06-29 08:16:39'),
(3, 2, 'status', 'users.status', '2018-06-29 08:16:39', '2018-06-29 08:16:39'),
(4, 2, 'delete', 'users.destroy', '2018-06-29 08:16:39', '2018-06-29 08:16:39'),
(9, 3, 'add', 'roles.create', '2018-06-29 08:16:39', '2018-06-29 08:16:39'),
(10, 3, 'edit', 'roles.edit', '2018-06-29 08:16:39', '2018-06-29 08:16:39'),
(12, 3, 'delete', 'roles.destroy', '2018-06-29 08:16:39', '2018-06-29 08:16:39'),
(13, 5, 'add', 'network.create', '2018-06-29 08:16:39', '2018-06-29 08:16:39'),
(14, 5, 'edit', 'network.edit', '2018-06-29 08:16:39', '2018-06-29 08:16:39'),
(15, 5, 'delete', 'network.destroy', '2018-06-29 08:16:39', '2018-06-29 08:16:39'),
(16, 5, 'status', 'network.status', '2018-06-29 08:16:39', '2018-06-29 08:16:39'),
(20, 12, 'home-update', 'home.update', '2018-07-03 09:16:01', '2018-07-03 09:16:01'),
(21, 12, 'highlight-add', 'highlight.create', '2018-07-03 09:16:01', '2018-07-03 09:16:01'),
(22, 12, 'highlight-edit', 'highlight-edit', '2018-07-03 09:16:01', '2018-07-03 09:16:01'),
(23, 12, 'highlight-status', 'highlight.status', '2018-07-03 09:16:01', '2018-07-03 09:16:01'),
(24, 12, 'highlight-delete', 'highlight.destroy', '2018-07-03 09:16:01', '2018-07-03 09:16:01'),
(25, 23, 'add', 'clients.create', '2018-11-28 07:59:58', '2018-11-28 07:59:58'),
(26, 23, 'edit', 'clients.edit', '2018-11-28 08:00:14', '2018-11-28 08:00:14'),
(27, 23, 'status', 'clients.status', '2018-11-28 08:00:26', '2018-11-28 08:00:26'),
(28, 23, 'delete', 'clients.destroy', '2018-11-28 08:00:41', '2018-11-28 08:00:41'),
(29, 23, 'import', 'import.clients', '2018-12-10 10:03:50', '2018-12-10 10:03:50'),
(30, 23, 'import-add', 'import.clients.create', '2018-12-10 10:06:16', '2018-12-10 10:06:16'),
(31, 23, 'import-edit', 'import.clients.edit', '2018-12-10 10:07:46', '2018-12-10 10:07:46'),
(32, 23, 'import-delete', 'import.clients.destroy', '2018-12-10 10:08:01', '2018-12-10 10:08:01'),
(33, 26, 'add', 'faq.category.create', '2018-12-12 11:18:26', '2018-12-12 11:18:26'),
(34, 26, 'edit', 'faq.category.edit', '2018-12-12 11:18:36', '2018-12-12 11:18:36'),
(35, 26, 'status', 'faq.category.status', '2018-12-12 11:18:48', '2018-12-12 11:18:48'),
(36, 26, 'delete', 'faq.category.destroy', '2018-12-12 11:18:59', '2018-12-12 11:18:59'),
(37, 29, 'add', 'faq.create', '2018-12-12 11:19:09', '2018-12-12 11:19:09'),
(38, 29, 'edit', 'faq.edit', '2018-12-12 11:19:17', '2018-12-12 11:19:17'),
(39, 29, 'status', 'faq.status', '2018-12-12 11:19:26', '2018-12-12 11:19:26'),
(40, 29, 'delete', 'faq.destroy', '2018-12-12 11:19:36', '2018-12-12 11:19:49'),
(41, 28, 'add', 'blog.category.create', '2018-12-12 11:23:27', '2018-12-12 11:23:27'),
(42, 28, 'edit', 'blog.category.edit', '2018-12-12 11:23:34', '2019-01-15 11:30:32'),
(43, 28, 'status', 'blog.category.status', '2018-12-12 11:24:52', '2018-12-12 11:24:52'),
(44, 28, 'delete', 'blog.category.destroy', '2018-12-12 11:25:02', '2018-12-12 11:25:02'),
(45, 30, 'add', 'blog.post.create', '2018-12-12 11:26:02', '2018-12-12 11:26:02'),
(46, 30, 'edit', 'blog.post.edit', '2018-12-12 11:26:11', '2018-12-12 11:26:11'),
(47, 30, 'featured', 'blog.post.featured', '2018-12-12 11:26:21', '2018-12-12 11:26:21'),
(48, 30, 'status', 'blog.post.status', '2018-12-12 11:26:34', '2018-12-12 11:26:34'),
(49, 30, 'delete', 'blog.post.destroy', '2018-12-12 11:26:45', '2018-12-12 11:26:45'),
(50, 2, 'settings', 'users.settings', '2019-01-08 09:28:36', '2019-01-08 09:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `um_roles`
--

CREATE TABLE `um_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `um_roles`
--

INSERT INTO `um_roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'The Administrators of the website', '2018-06-28 15:36:57', '2018-11-26 17:53:13'),
(2, 'Yetryetye', 'tyetryertyerty', '2019-02-23 15:34:20', '2019-02-23 15:34:20'),
(3, 'Abc', 'fadsfasdf', '2019-03-07 13:19:13', '2019-03-07 13:19:13'),
(4, 'Asdfasdf', 'fasfsd', '2019-04-01 15:05:11', '2019-04-01 15:05:11'),
(5, 'Dfsdfsd', 'fasdfasdf', '2019-04-01 15:05:20', '2019-04-01 15:05:20'),
(6, 'Dfasdfsdfa', 'sdfasdf', '2019-04-01 15:05:27', '2019-04-01 15:05:27'),
(7, 'Adfsdfd', 'fasdf', '2019-04-01 15:05:34', '2019-04-01 15:05:34'),
(8, 'Asdfdf', 'asdfasd', '2019-04-01 15:05:40', '2019-04-01 15:05:40'),
(9, 'Asdfsd', 'fasdf', '2019-04-01 15:05:46', '2019-04-01 15:05:46'),
(10, 'Adsfasdf', 'asdfasf', '2019-04-01 15:05:54', '2019-04-01 15:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `um_role_menus`
--

CREATE TABLE `um_role_menus` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `um_role_menus`
--

INSERT INTO `um_role_menus` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(274, 1, 13, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(275, 1, 1, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(276, 1, 2, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(277, 1, 3, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(278, 1, 4, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(279, 1, 5, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(280, 1, 23, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(281, 1, 25, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(282, 1, 26, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(283, 1, 29, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(284, 1, 27, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(285, 1, 28, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(286, 1, 30, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(287, 1, 14, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(288, 1, 15, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(289, 1, 16, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(290, 1, 11, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(291, 1, 21, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(292, 1, 9, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(293, 1, 10, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(294, 1, 22, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(301, 2, 13, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(302, 2, 1, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(303, 2, 2, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(304, 2, 3, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(305, 2, 4, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(306, 2, 5, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(307, 2, 23, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(308, 2, 25, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(309, 2, 26, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(310, 2, 29, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(311, 2, 27, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(312, 2, 28, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(313, 2, 30, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(314, 2, 14, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(315, 2, 15, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(316, 2, 16, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(317, 2, 11, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(318, 2, 21, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(319, 3, 1, '2019-03-07 08:19:13', '2019-03-07 08:19:13'),
(320, 3, 2, '2019-03-07 08:19:13', '2019-03-07 08:19:13'),
(321, 4, 13, '2019-04-01 10:05:11', '2019-04-01 10:05:11'),
(322, 5, 13, '2019-04-01 10:05:20', '2019-04-01 10:05:20'),
(323, 6, 1, '2019-04-01 10:05:27', '2019-04-01 10:05:27'),
(324, 6, 2, '2019-04-01 10:05:27', '2019-04-01 10:05:27'),
(325, 6, 3, '2019-04-01 10:05:27', '2019-04-01 10:05:27'),
(326, 7, 1, '2019-04-01 10:05:34', '2019-04-01 10:05:34'),
(327, 7, 2, '2019-04-01 10:05:34', '2019-04-01 10:05:34'),
(328, 7, 3, '2019-04-01 10:05:34', '2019-04-01 10:05:34'),
(329, 8, 1, '2019-04-01 10:05:40', '2019-04-01 10:05:40'),
(330, 8, 2, '2019-04-01 10:05:40', '2019-04-01 10:05:40'),
(331, 8, 3, '2019-04-01 10:05:40', '2019-04-01 10:05:40'),
(332, 9, 1, '2019-04-01 10:05:46', '2019-04-01 10:05:46'),
(333, 9, 2, '2019-04-01 10:05:46', '2019-04-01 10:05:46'),
(334, 9, 3, '2019-04-01 10:05:46', '2019-04-01 10:05:46'),
(335, 10, 1, '2019-04-01 10:05:54', '2019-04-01 10:05:54'),
(336, 10, 2, '2019-04-01 10:05:54', '2019-04-01 10:05:54'),
(337, 10, 3, '2019-04-01 10:05:54', '2019-04-01 10:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `um_role_permissions`
--

CREATE TABLE `um_role_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `permission_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `um_role_permissions`
--

INSERT INTO `um_role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(361, 1, 1, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(362, 1, 2, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(363, 1, 3, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(364, 1, 4, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(365, 1, 50, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(366, 1, 9, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(367, 1, 10, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(368, 1, 12, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(369, 1, 13, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(370, 1, 14, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(371, 1, 15, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(372, 1, 16, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(373, 1, 25, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(374, 1, 26, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(375, 1, 27, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(376, 1, 28, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(377, 1, 29, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(378, 1, 30, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(379, 1, 31, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(380, 1, 32, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(381, 1, 33, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(382, 1, 34, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(383, 1, 35, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(384, 1, 36, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(385, 1, 37, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(386, 1, 38, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(387, 1, 39, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(388, 1, 40, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(389, 1, 41, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(390, 1, 42, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(391, 1, 43, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(392, 1, 44, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(393, 1, 45, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(394, 1, 46, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(395, 1, 47, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(396, 1, 48, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(397, 1, 49, '2019-02-08 12:46:11', '2019-02-08 12:46:11'),
(402, 2, 1, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(403, 2, 2, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(404, 2, 3, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(405, 2, 4, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(406, 2, 50, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(407, 2, 9, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(408, 2, 10, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(409, 2, 12, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(410, 2, 13, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(411, 2, 14, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(412, 2, 15, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(413, 2, 16, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(414, 2, 25, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(415, 2, 26, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(416, 2, 27, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(417, 2, 28, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(418, 2, 29, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(419, 2, 30, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(420, 2, 31, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(421, 2, 32, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(422, 2, 33, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(423, 2, 37, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(424, 2, 38, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(425, 2, 39, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(426, 2, 40, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(427, 2, 41, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(428, 2, 45, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(429, 2, 46, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(430, 2, 47, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(431, 2, 48, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(432, 2, 49, '2019-03-05 10:44:45', '2019-03-05 10:44:45'),
(433, 3, 1, '2019-03-07 08:19:13', '2019-03-07 08:19:13'),
(434, 6, 1, '2019-04-01 10:05:27', '2019-04-01 10:05:27'),
(435, 6, 2, '2019-04-01 10:05:27', '2019-04-01 10:05:27'),
(436, 6, 3, '2019-04-01 10:05:27', '2019-04-01 10:05:27'),
(437, 6, 4, '2019-04-01 10:05:27', '2019-04-01 10:05:27'),
(438, 6, 50, '2019-04-01 10:05:27', '2019-04-01 10:05:27'),
(439, 6, 9, '2019-04-01 10:05:27', '2019-04-01 10:05:27'),
(440, 6, 10, '2019-04-01 10:05:27', '2019-04-01 10:05:27'),
(441, 6, 12, '2019-04-01 10:05:27', '2019-04-01 10:05:27'),
(442, 7, 1, '2019-04-01 10:05:34', '2019-04-01 10:05:34'),
(443, 7, 2, '2019-04-01 10:05:34', '2019-04-01 10:05:34'),
(444, 7, 3, '2019-04-01 10:05:34', '2019-04-01 10:05:34'),
(445, 7, 4, '2019-04-01 10:05:34', '2019-04-01 10:05:34'),
(446, 7, 50, '2019-04-01 10:05:34', '2019-04-01 10:05:34'),
(447, 7, 9, '2019-04-01 10:05:34', '2019-04-01 10:05:34'),
(448, 7, 10, '2019-04-01 10:05:34', '2019-04-01 10:05:34'),
(449, 7, 12, '2019-04-01 10:05:34', '2019-04-01 10:05:34'),
(450, 8, 1, '2019-04-01 10:05:40', '2019-04-01 10:05:40'),
(451, 8, 2, '2019-04-01 10:05:40', '2019-04-01 10:05:40'),
(452, 8, 3, '2019-04-01 10:05:40', '2019-04-01 10:05:40'),
(453, 8, 4, '2019-04-01 10:05:40', '2019-04-01 10:05:40'),
(454, 8, 50, '2019-04-01 10:05:40', '2019-04-01 10:05:40'),
(455, 8, 9, '2019-04-01 10:05:40', '2019-04-01 10:05:40'),
(456, 8, 10, '2019-04-01 10:05:40', '2019-04-01 10:05:40'),
(457, 8, 12, '2019-04-01 10:05:40', '2019-04-01 10:05:40'),
(458, 9, 1, '2019-04-01 10:05:46', '2019-04-01 10:05:46'),
(459, 9, 2, '2019-04-01 10:05:46', '2019-04-01 10:05:46'),
(460, 9, 3, '2019-04-01 10:05:46', '2019-04-01 10:05:46'),
(461, 9, 4, '2019-04-01 10:05:46', '2019-04-01 10:05:46'),
(462, 9, 50, '2019-04-01 10:05:46', '2019-04-01 10:05:46'),
(463, 9, 9, '2019-04-01 10:05:46', '2019-04-01 10:05:46'),
(464, 9, 10, '2019-04-01 10:05:46', '2019-04-01 10:05:46'),
(465, 9, 12, '2019-04-01 10:05:46', '2019-04-01 10:05:46'),
(466, 10, 1, '2019-04-01 10:05:54', '2019-04-01 10:05:54'),
(467, 10, 2, '2019-04-01 10:05:54', '2019-04-01 10:05:54'),
(468, 10, 3, '2019-04-01 10:05:54', '2019-04-01 10:05:54'),
(469, 10, 4, '2019-04-01 10:05:54', '2019-04-01 10:05:54'),
(470, 10, 50, '2019-04-01 10:05:54', '2019-04-01 10:05:54'),
(471, 10, 9, '2019-04-01 10:05:54', '2019-04-01 10:05:54'),
(472, 10, 10, '2019-04-01 10:05:54', '2019-04-01 10:05:54'),
(473, 10, 12, '2019-04-01 10:05:54', '2019-04-01 10:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `um_users`
--

CREATE TABLE `um_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` int(11) UNSIGNED NOT NULL DEFAULT 1 COMMENT '0 is admin 1 is normal 2 is vendor admin',
  `role_id` int(11) UNSIGNED NOT NULL,
  `last_session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_session_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `um_users`
--

INSERT INTO `um_users` (`id`, `avatar`, `name`, `email`, `password`, `user_type`, `role_id`, `last_session_id`, `last_session_data`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'usaid.jpeg', 'Shehryar Haider', 'shehryar@live.biz', '$2y$10$jkBUZGCy4n2hGSl1YP6Rie0cDkhjPgxO8xCfo7x/28DjR3bx7A4ia', 2, 1, 'wZJV3e3u0Iob48543VPjBolH0zRy2HuoAvvNWPpU', '{\"ip\":\"27.255.34.156\",\"city\":\"Karachi\",\"region\":\"Sindh\",\"region_code\":\"SD\",\"country\":\"PK\",\"country_name\":\"Pakistan\",\"continent_code\":\"AS\",\"in_eu\":false,\"postal\":\"12311\",\"latitude\":24.9043,\"longitude\":67.0817,\"timezone\":\"Asia/Karachi\",\"utc_offset\":\"+0500\",\"country_calling_code\":\"+92\",\"currency\":\"PKR\",\"languages\":\"ur-PK,en-PK,pa,sd,ps,brh\",\"asn\":\"AS55714\",\"org\":\"Fiberlink Pvt.Ltd\"}', 1, 'aFZ1UTSjvLEQOdMjjZwkWfd2y8w7uUU0DXerB8srKV1KfBQ67Sdn2uvJyrxB', '2018-06-26 19:00:00', '2020-07-22 07:00:07'),
(3, 'P3nYfD9zyTvn7iOSSHAZbmpNWIir0gZVpSvB8Wah.png', 'Azhar Ahmed Saifi', 'azhar@horizontech.biz', '$2y$10$dIGKNH8IfVXSDcuw0GivUe5R8cDiWUTaJlzeHZqKRHTeaZBRSFoyW', 2, 1, 'wV8DO6uDFAyDq9ILaR6YcFliezMDhmr1Ct9ujN8h', '{\"ip\":\"27.255.34.156\",\"city\":\"Karachi\",\"region\":\"Sindh\",\"region_code\":\"SD\",\"country\":\"PK\",\"country_name\":\"Pakistan\",\"continent_code\":\"AS\",\"in_eu\":false,\"postal\":\"12311\",\"latitude\":24.9043,\"longitude\":67.0817,\"timezone\":\"Asia/Karachi\",\"utc_offset\":\"+0500\",\"country_calling_code\":\"+92\",\"currency\":\"PKR\",\"languages\":\"ur-PK,en-PK,pa,sd,ps,brh\",\"asn\":\"AS55714\",\"org\":\"Fiberlink Pvt.Ltd\"}', 1, 'ZhjgX9oscXF36NWPQW7yhWB4qEJGKx7T42sf8FklODQjx40PoKaXdtzWOfKU', '2018-06-26 19:00:00', '2019-04-05 11:47:50'),
(4, NULL, 'Adiministrator', 'admin@horizontech.biz', '$2y$10$OeIAHM4NsL8XRIeAUwvr8eHi6bsOsu.ML9SRs5LUSZZE7JV2fqJXO', 0, 1, NULL, NULL, 1, 'ivcP9G9fWuOYJJu2PwKUequcoOkb4XlSxSNMzlMnqGPFJJRaMcwB1bZZcg8d', '2018-06-26 19:00:00', '2019-04-25 05:58:32'),
(8, 'atif.jpeg', 'Atif', 'atif@horizontech.biz', '$2y$10$9BCD/rLHXUo0LfIZ0BId1eFd6taWqaabO8d//qRULJ34a3jd.TSlW', 2, 1, NULL, NULL, 1, '0aY18r4udDWaTHUHUtrCanf8acAnBlsbSSkpoJk4gBazjEDVIRJ3FgFTbaQz', '2018-07-02 06:17:45', '2018-11-26 10:38:27'),
(9, 'umair.jpeg', 'Umair Ansar', 'umairansar@horizontech.biz', '$2y$10$OeIAHM4NsL8XRIeAUwvr8eHi6bsOsu.ML9SRs5LUSZZE7JV2fqJXO', 2, 1, NULL, '{\"ip\":\"27.255.34.156\",\"city\":\"Karachi\",\"region\":\"Sindh\",\"region_code\":\"SD\",\"country\":\"PK\",\"country_name\":\"Pakistan\",\"continent_code\":\"AS\",\"in_eu\":false,\"postal\":\"12311\",\"latitude\":24.9043,\"longitude\":67.0817,\"timezone\":\"Asia/Karachi\",\"utc_offset\":\"+0500\",\"country_calling_code\":\"+92\",\"currency\":\"PKR\",\"languages\":\"ur-PK,en-PK,pa,sd,ps,brh\",\"asn\":\"AS55714\",\"org\":\"Fiberlink Pvt.Ltd\"}', 1, 'pSyprODrwNSLC0ALR4v8srfzpIcGktYCa5RhkatzMakStqrLtPRqgZ0WXrwh', '2018-08-11 08:01:47', '2019-05-07 07:53:00'),
(10, 'nauman.jpg', 'Nauman Tasleem', 'naumantasleem@horizontech.biz', '$2y$10$OeIAHM4NsL8XRIeAUwvr8eHi6bsOsu.ML9SRs5LUSZZE7JV2fqJXO', 2, 1, NULL, NULL, 1, 'ooNv130oZszElnCu4ewLaokXWRqaSTfgofd0IGrKPxitE1oXNSXU7vFLHJTM', '2018-11-08 19:00:00', '2019-05-07 06:39:47'),
(11, NULL, 'shehryar', 'shehryar1@horizontech.biz', '$2y$10$ArUvLJk/FicwAdoehos8.OfNEeuwANXo.7s2RIyR6h2yDP0ebJCXu', 1, 1, 'SFPKHd9fe1xVAAu8YgTTuK0LyDnSfEC4pFMzGwBg', '{\"ip\":\"27.255.34.156\",\"city\":\"Karachi\",\"region\":\"Sindh\",\"region_code\":\"SD\",\"country\":\"PK\",\"country_name\":\"Pakistan\",\"continent_code\":\"AS\",\"in_eu\":false,\"postal\":\"12311\",\"latitude\":24.9043,\"longitude\":67.0817,\"timezone\":\"Asia/Karachi\",\"utc_offset\":\"+0500\",\"country_calling_code\":\"+92\",\"currency\":\"PKR\",\"languages\":\"ur-PK,en-PK,pa,sd,ps,brh\",\"asn\":\"AS55714\",\"org\":\"Fiberlink Pvt.Ltd\"}', 1, 'KmAFfL0W5CzsN1BT9ws3MCklA5R6mEPXpG0WL64eOw26ITydRypyYIg9ywnt', '2019-02-08 06:33:40', '2019-04-01 10:04:53'),
(12, NULL, 'test', 'test@gmail.com', '$2y$10$zEvo3GzFswFdbYZvk3cSFu8y60.a3mcyeW0G05/NvGysCm1o3jeIS', 1, 3, 'GsoeOWCrsiS2yQXW3mBRtkRGio0VZprXjQeKUfsY', '{\"ip\":\"27.255.34.156\",\"city\":\"Karachi\",\"region\":\"Sindh\",\"region_code\":\"SD\",\"country\":\"PK\",\"country_name\":\"Pakistan\",\"continent_code\":\"AS\",\"in_eu\":false,\"postal\":\"12311\",\"latitude\":24.9043,\"longitude\":67.0817,\"timezone\":\"Asia/Karachi\",\"utc_offset\":\"+0500\",\"country_calling_code\":\"+92\",\"currency\":\"PKR\",\"languages\":\"ur-PK,en-PK,pa,sd,ps,brh\",\"asn\":\"AS55714\",\"org\":\"Fiberlink Pvt.Ltd\"}', 1, NULL, '2019-02-19 13:13:10', '2019-03-25 07:58:48'),
(13, NULL, 'asd', 'shehrayr@email.com', '$2y$10$Rkdbv9atj2qVCosZ/Iz0o.gFJTAHTSAFb/Ix3riE3dr9Yd.oLf3mu', 1, 3, NULL, NULL, 1, 'IsxeDjOL8TWx1kRjFHFXv4aZmlzVfSrKD8FqjrI0UttAIaH01JVYn0B8aupZ', '2019-03-07 08:53:05', '2019-03-07 08:55:56'),
(14, NULL, 'Arsalan Ahmed', 'arsalan@horizon.biz', '$2y$10$WeV4hKEjMfZlqH15Etp.HeT91zk1pa.xOK/yuTdZOR.XAQc5OUmOe', 1, 1, 'xd7dg43Okx3ffk8hY6c5rsvMN640PBh0fScfVsU6', '{\"ip\":\"124.29.238.15\",\"city\":\"Karachi\",\"region\":\"Sindh\",\"region_code\":\"SD\",\"country\":\"PK\",\"country_name\":\"Pakistan\",\"continent_code\":\"AS\",\"in_eu\":false,\"postal\":\"12311\",\"latitude\":24.9043,\"longitude\":67.0817,\"timezone\":\"Asia/Karachi\",\"utc_offset\":\"+0500\",\"country_calling_code\":\"+92\",\"currency\":\"PKR\",\"languages\":\"ur-PK,en-PK,pa,sd,ps,brh\",\"asn\":\"AS9541\",\"org\":\"Cyber Internet Services (Pvt) Ltd.\"}', 1, NULL, '2019-03-12 10:22:38', '2019-03-22 06:14:56'),
(15, NULL, 'Ebad Yar Khan', 'ebad@horizontech.biz', '$2y$10$y7ymj6wIFYZ4l86BAM/D9Oc6AxClawIHta3C8o7ezPIFfekxzOxg.', 1, 1, 'wi7QDiLyfpHYHeYCF7Zami7Rncw4jybqWslD9CiS', '{\"ip\":\"27.255.34.156\",\"city\":\"Karachi\",\"region\":\"Sindh\",\"region_code\":\"SD\",\"country\":\"PK\",\"country_name\":\"Pakistan\",\"continent_code\":\"AS\",\"in_eu\":false,\"postal\":\"12311\",\"latitude\":24.9043,\"longitude\":67.0817,\"timezone\":\"Asia/Karachi\",\"utc_offset\":\"+0500\",\"country_calling_code\":\"+92\",\"currency\":\"PKR\",\"languages\":\"ur-PK,en-PK,pa,sd,ps,brh\",\"asn\":\"AS55714\",\"org\":\"Fiberlink Pvt.Ltd\"}', 1, NULL, '2019-04-05 11:34:29', '2019-04-05 11:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `users_login_history`
--

CREATE TABLE `users_login_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_login_history`
--

INSERT INTO `users_login_history` (`id`, `user_id`, `user_name`, `type`, `datetime`) VALUES
(1, 1, '0', 'Login', '2018-06-29 06:33:39'),
(2, 1, '0', 'Login', '2018-06-29 11:08:01'),
(3, 1, '0', 'Login', '2018-06-29 11:22:56'),
(4, 1, '0', 'Login', '2018-06-29 11:23:14'),
(5, 2, '0', 'Login', '2018-06-29 16:43:13'),
(6, 2, '0', 'Login', '2018-06-29 17:35:50'),
(7, 1, '0', 'Login', '2018-07-02 05:09:52'),
(8, 2, '0', 'Login', '2018-07-02 12:40:21'),
(9, 1, '0', 'Login', '2018-07-02 10:50:00'),
(10, 1, '0', 'Logout', '2018-07-02 17:44:13'),
(11, 1, '0', 'Login', '2018-07-02 17:44:48'),
(12, 1, '0', 'Logout', '2018-07-02 17:45:30'),
(13, 1, '0', 'Login', '2018-07-02 17:45:37'),
(14, 1, '0', 'Logout', '2018-07-02 17:45:58'),
(15, 1, '0', 'Login', '2018-07-02 17:46:21'),
(16, 1, '0', 'Logout', '2018-07-02 17:46:28'),
(17, 1, '0', 'Login', '2018-07-02 17:47:21'),
(18, 1, '0', 'Logout', '2018-07-02 17:47:31'),
(19, 1, '0', 'Login', '2018-07-02 17:49:22'),
(20, 8, '0', 'Login', '2018-07-02 17:59:14'),
(21, 1, '0', 'Login', '2018-07-03 09:33:41'),
(22, 1, '0', 'Logout', '2018-07-03 15:40:12'),
(23, 1, '0', 'Login', '2018-07-03 15:44:26'),
(24, 1, '0', 'Logout', '2018-07-03 15:44:53'),
(25, 1, '0', 'Login', '2018-07-03 15:53:28'),
(26, 1, '0', 'Logout', '2018-07-03 15:53:46'),
(27, 1, '0', 'Login', '2018-07-03 16:36:24'),
(28, 1, '0', 'Logout', '2018-07-03 16:38:26'),
(29, 1, '0', 'Logout', '2018-07-03 16:40:10'),
(30, 1, '0', 'Logout', '2018-07-03 16:54:54'),
(31, 1, '0', 'Logout', '2018-07-03 17:00:12'),
(32, 1, '0', 'Logout', '2018-07-03 17:02:27'),
(33, 1, '0', 'Logout', '2018-07-03 17:03:22'),
(34, 1, '0', 'Logout', '2018-07-03 17:04:34'),
(35, 1, '0', 'Logout', '2018-07-03 17:08:48'),
(36, 1, '0', 'Logout', '2018-07-03 17:10:31'),
(37, 1, '0', 'Logout', '2018-07-03 17:10:50'),
(38, 4, '0', 'Login', '2018-07-04 10:35:23'),
(39, 4, '0', 'Logout', '2018-07-04 10:35:31'),
(40, 1, '0', 'Logout', '2018-07-04 10:35:42'),
(41, 1, '0', 'Logout', '2018-07-04 10:36:48'),
(42, 1, '0', 'Logout', '2018-07-04 10:40:11'),
(43, 8, '0', 'Login', '2018-07-04 15:54:28'),
(44, 1, '0', 'Logout', '2018-07-04 16:10:24'),
(45, 1, '0', 'Login', '2018-07-04 16:10:34'),
(46, 1, '0', 'Logout', '2018-07-04 16:10:52'),
(47, 1, '0', 'Logout', '2018-07-04 16:11:44'),
(48, 1, '0', 'Logout', '2018-07-05 16:39:53'),
(49, 1, '0', 'Login', '2018-07-05 16:43:01'),
(50, 1, 'Usaid Raees', 'Logout', '2018-07-05 18:02:09'),
(51, 1, 'Usaid Raees', 'Login', '2018-07-05 18:02:24'),
(52, 1, 'Usaid Raees', 'Login', '2018-07-06 10:09:55'),
(53, 1, 'Usaid Raees', 'Logout', '2018-07-06 10:17:24'),
(54, 1, 'Usaid Raees', 'Logout', '2018-07-06 14:21:49'),
(55, 1, 'Usaid Raees', 'Login', '2018-07-11 10:25:40'),
(56, 4, 'Adiministrator', 'Login', '2018-07-16 15:36:24'),
(57, 4, 'Adiministrator', 'Logout', '2018-07-16 15:36:30'),
(58, 1, 'Usaid Raees', 'Login', '2018-07-16 15:36:35'),
(59, 1, 'Usaid Raees', 'Login', '2018-07-20 10:03:50'),
(60, 1, 'Usaid Raees', 'Login', '2018-07-23 09:28:14'),
(61, 1, 'Usaid Raees', 'Login', '2018-07-23 11:51:33'),
(62, 1, 'Usaid Raees', 'Login', '2018-08-11 12:57:47'),
(63, 9, 'Umair Ansar', 'Login', '2018-08-11 13:02:47'),
(64, 1, 'Usaid Raees', 'Login', '2018-08-16 11:39:51'),
(65, 1, 'Usaid Raees', 'Login', '2018-08-16 11:39:53'),
(66, 1, 'Usaid Raees', 'Login', '2018-08-16 15:02:24'),
(67, 1, 'Usaid Raees', 'Login', '2018-08-17 12:50:38'),
(68, 1, 'Usaid Raees', 'Login', '2018-08-29 09:59:35'),
(69, 1, 'Usaid Raees', 'Login', '2018-09-08 14:57:01'),
(70, 1, 'Usaid Raees', 'Login', '2018-11-20 17:12:52'),
(71, 1, 'Usaid Raees', 'Login', '2018-11-22 12:56:07'),
(72, 1, 'Usaid Raees', 'Login', '2018-11-22 15:53:53'),
(73, 1, 'Usaid Raees', 'Login', '2018-11-23 09:20:54'),
(74, 1, 'Usaid Raees', 'Login', '2018-11-23 10:09:08'),
(75, 1, 'Usaid Raees', 'Logout', '2018-11-23 10:22:01'),
(76, 1, 'Usaid Raees', 'Logout', '2018-11-23 10:29:27'),
(77, 1, 'Usaid Raees', 'Login', '2018-11-23 11:34:55'),
(78, 1, 'Usaid Raees', 'Logout', '2018-11-23 11:35:06'),
(79, 1, 'Usaid Raees', 'Login', '2018-11-23 12:03:52'),
(80, 1, 'Usaid Raees', 'Login', '2018-11-23 12:04:21'),
(81, 1, 'Usaid Raees', 'Logout', '2018-11-23 12:05:44'),
(82, 1, 'Usaid Raees', 'Login', '2018-11-23 12:06:24'),
(83, 1, 'Usaid Raees', 'Login', '2018-11-23 12:07:37'),
(84, 1, 'Usaid Raees', 'Logout', '2018-11-23 12:07:48'),
(85, 1, 'Usaid Raees', 'Login', '2018-11-23 12:07:52'),
(86, 1, 'Usaid Raees', 'Logout', '2018-11-23 12:07:55'),
(87, 1, 'Usaid Raees', 'Login', '2018-11-23 12:08:07'),
(88, 1, 'Usaid Raees', 'Logout', '2018-11-23 12:08:12'),
(89, 1, 'Usaid Raees', 'Login', '2018-11-23 12:11:46'),
(90, 1, 'Usaid Raees', 'Login', '2018-11-23 12:11:54'),
(91, 1, 'Usaid Raees', 'Login', '2018-11-23 12:15:41'),
(92, 1, 'Usaid Raees', 'Login', '2018-11-23 12:15:50'),
(93, 1, 'Usaid Raees', 'Login', '2018-11-23 12:18:08'),
(94, 1, 'Usaid Raees', 'Login', '2018-11-26 09:51:38'),
(95, 1, 'Usaid Raees', 'Login', '2018-11-26 12:11:43'),
(96, 1, 'Usaid Raees', 'Logout', '2018-11-26 15:38:15'),
(97, 8, 'Atif', 'Login', '2018-11-26 15:38:24'),
(98, 8, 'Atif', 'Logout', '2018-11-26 15:38:27'),
(99, 4, 'Adiministrator', 'Login', '2018-11-26 15:38:32'),
(100, 4, 'Adiministrator', 'Logout', '2018-11-26 15:44:55'),
(101, 5, 'ahmed Ali', 'Login', '2018-11-26 15:45:01'),
(102, 5, 'ahmed Ali', 'Logout', '2018-11-26 15:46:08'),
(103, 1, 'Usaid Raees', 'Login', '2018-11-26 15:46:13'),
(104, 5, 'ahmed Ali', 'Login', '2018-11-26 15:47:17'),
(105, 5, 'ahmed Ali', 'Logout', '2018-11-26 15:57:12'),
(106, 3, 'Azhar Ahmed Saifi ', 'Login', '2018-11-26 15:57:18'),
(107, 3, 'Azhar Ahmed Saifi', 'Logout', '2018-11-26 17:50:41'),
(108, 5, 'ahmed Ali', 'Login', '2018-11-26 17:50:45'),
(109, 5, 'ahmed Ali', 'Logout', '2018-11-26 17:52:08'),
(110, 11, 'test', 'Login', '2018-11-26 17:52:12'),
(111, 11, 'test', 'Logout', '2018-11-26 17:52:56'),
(112, 3, 'Azhar Ahmed Saifi', 'Login', '2018-11-26 17:53:01'),
(113, 1, 'Usaid Raees', 'Login', '2018-11-27 12:24:39'),
(114, 1, 'Usaid Raees', 'Login', '2018-11-27 15:21:41'),
(115, 1, 'Usaid Raees', 'Login', '2018-11-28 11:03:31'),
(116, 1, 'Usaid Raees', 'Logout', '2018-12-04 14:58:39'),
(117, 1, 'Usaid Raees', 'Login', '2018-12-04 14:58:55'),
(118, 1, 'Usaid Raees', 'Login', '2018-12-04 15:02:25'),
(119, 1, 'Usaid Raees', 'Login', '2018-12-04 15:02:44'),
(120, 1, 'Usaid Raees', 'Login', '2018-12-04 17:48:56'),
(121, 1, 'Usaid Raees', 'Logout', '2018-12-10 15:08:15'),
(122, 5, 'ahmed Ali', 'Login', '2018-12-10 15:08:20'),
(123, 5, 'ahmed Ali', 'Logout', '2018-12-10 15:31:00'),
(124, 1, 'Usaid Raees', 'Login', '2018-12-10 15:31:05'),
(125, 1, 'Usaid Raees', 'Logout', '2018-12-10 15:35:23'),
(126, 1, 'Usaid Raees', 'Login', '2018-12-10 15:35:29'),
(127, 1, 'Usaid Raees', 'Login', '2018-12-11 12:10:06'),
(128, 1, 'Usaid Raees', 'Login', '2018-12-11 12:13:11'),
(129, 1, 'Usaid Raees', 'Logout', '2018-12-11 12:18:04'),
(130, 1, 'Usaid Raees', 'Login', '2018-12-11 12:18:08'),
(131, 1, 'Usaid Raees', 'Login', '2018-12-11 12:18:35'),
(132, 1, 'Usaid Raees', 'Login', '2018-12-11 12:40:35'),
(133, 1, 'Usaid Raees', 'Logout', '2018-12-11 12:42:30'),
(134, 1, 'Usaid Raees', 'Login', '2018-12-12 10:46:31'),
(135, 1, 'Usaid Raees', 'Logout', '2018-12-12 10:47:54'),
(136, 1, 'Usaid Raees', 'Login', '2018-12-12 10:48:16'),
(137, 1, 'Usaid Raees', 'Logout', '2018-12-12 16:32:06'),
(138, 5, 'ahmed Ali', 'Login', '2018-12-12 16:32:18'),
(139, 5, 'ahmed Ali', 'Logout', '2018-12-12 16:45:41'),
(140, 1, 'Usaid Raees', 'Login', '2018-12-12 16:45:52'),
(141, 1, 'Usaid Raees', 'Login', '2018-12-12 17:31:32'),
(142, 10, 'Nauman Tasleem', 'Login', '2018-12-12 17:39:02'),
(143, 10, 'Nauman Tasleem', 'Login', '2018-12-12 17:42:28'),
(144, 10, 'Nauman Tasleem', 'Session Destroy', '2018-12-12 17:42:57'),
(145, 10, 'Nauman Tasleem', 'Login', '2018-12-12 17:43:15'),
(146, 10, 'Nauman Tasleem', 'Session Destroy', '2018-12-12 17:43:40'),
(147, 1, 'Usaid Raees', 'Login', '2018-12-13 11:10:31'),
(148, 1, 'Usaid Raees', 'Login', '2019-01-01 16:53:22'),
(149, 1, 'Usaid Raees', 'Login', '2019-01-02 09:57:29'),
(150, 1, 'Usaid Raees', 'Login', '2019-01-07 11:05:34'),
(151, 1, 'Usaid Raees', 'Login', '2019-01-07 11:31:05'),
(152, 1, 'Usaid Raees', 'Login', '2019-01-07 16:15:35'),
(153, 1, 'Usaid Raees', 'Login', '2019-01-08 09:58:51'),
(154, 1, 'Usaid Raees', 'Login', '2019-01-08 13:56:46'),
(155, 1, 'Usaid Raees', 'Logout', '2019-01-08 14:26:59'),
(156, 5, 'ahmed Ali', 'Login', '2019-01-08 14:27:06'),
(157, 5, 'ahmed Ali', 'Logout', '2019-01-08 14:27:32'),
(158, 1, 'Usaid Raees', 'Login', '2019-01-08 14:27:40'),
(159, 1, 'Usaid Raees', 'Logout', '2019-01-08 14:27:50'),
(160, 5, 'ahmed Ali', 'Login', '2019-01-08 14:27:54'),
(161, 5, 'ahmed Ali', 'Logout', '2019-01-08 14:28:00'),
(162, 1, 'Usaid Raees', 'Login', '2019-01-08 14:28:09'),
(163, 1, 'Usaid Raees', 'Logout', '2019-01-08 14:28:51'),
(164, 5, 'ahmed Ali', 'Login', '2019-01-08 14:28:56'),
(165, 5, 'ahmed Ali', 'Logout', '2019-01-08 14:31:26'),
(166, 5, 'ahmed Ali', 'Login', '2019-01-08 14:31:30'),
(167, 5, 'ahmed Ali', 'Logout', '2019-01-08 14:48:12'),
(168, 1, 'Usaid Raees', 'Login', '2019-01-08 14:48:21'),
(169, 1, 'Usaid Raees', 'Login', '2019-01-09 16:13:06'),
(170, 1, 'Usaid Raees', 'Login', '2019-01-14 11:59:46'),
(171, 1, 'Usaid Raees', 'Login', '2019-01-15 15:21:45'),
(172, 1, 'Usaid Raees', 'Login', '2019-01-21 09:14:08'),
(173, 1, 'Usaid Raees', 'Login', '2019-02-08 11:33:06'),
(174, 11, 'shehryar', 'Login', '2019-02-08 11:34:23'),
(175, 11, 'shehryar', 'Login', '2019-02-08 16:14:10'),
(176, 11, 'shehryar', 'Session Destroy', '2019-02-08 16:14:18'),
(177, 11, 'shehryar', 'Login', '2019-02-09 09:35:57'),
(178, 11, 'shehryar', 'Session Destroy', '2019-02-09 09:36:06'),
(179, 11, 'shehryar', 'Login', '2019-02-09 10:09:36'),
(180, 11, 'shehryar', 'Session Destroy', '2019-02-09 10:09:38'),
(181, 11, 'shehryar', 'Login', '2019-02-11 15:30:31'),
(182, 11, 'shehryar', 'Session Destroy', '2019-02-11 15:30:35'),
(183, 11, 'shehryar', 'Login', '2019-02-12 09:50:11'),
(184, 11, 'shehryar', 'Session Destroy', '2019-02-12 09:50:13'),
(185, 11, 'shehryar', 'Login', '2019-02-13 17:38:07'),
(186, 11, 'shehryar', 'Session Destroy', '2019-02-13 17:38:09'),
(187, 11, 'shehryar', 'Login', '2019-02-14 09:28:15'),
(188, 11, 'shehryar', 'Session Destroy', '2019-02-14 09:31:02'),
(189, 11, 'shehryar', 'Login', '2019-02-14 14:30:02'),
(190, 11, 'shehryar', 'Session Destroy', '2019-02-14 14:30:08'),
(191, 5, 'ahmed Ali', 'Login', '2019-02-19 18:08:53'),
(192, 5, 'ahmed Ali', 'Login', '2019-02-19 18:14:19'),
(193, 5, 'ahmed Ali', 'Login', '2019-02-19 18:14:35'),
(194, 5, 'ahmed Ali', 'Login', '2019-02-19 18:15:18'),
(195, 5, 'ahmed Ali', 'Login', '2019-02-19 18:20:06'),
(196, 5, 'ahmed Ali', 'Login', '2019-02-20 09:11:27'),
(197, 11, 'shehryar', 'Login', '2019-02-22 12:12:48'),
(198, 11, 'shehryar', 'Session Destroy', '2019-02-22 12:12:54'),
(199, 11, 'shehryar', 'Login', '2019-02-23 15:33:20'),
(200, 11, 'shehryar', 'Session Destroy', '2019-02-23 15:33:22'),
(201, 11, 'shehryar', 'Login', '2019-02-27 09:35:44'),
(202, 11, 'shehryar', 'Session Destroy', '2019-02-27 09:35:46'),
(203, 1, 'Usaid Raees', 'Session Destroy', '2019-02-27 09:41:49'),
(204, 11, 'shehryar', 'Login', '2019-02-27 14:16:34'),
(205, 11, 'shehryar', 'Session Destroy', '2019-02-27 14:16:42'),
(206, 11, 'shehryar', 'Login', '2019-02-27 14:17:19'),
(207, 11, 'shehryar', 'Login', '2019-02-27 14:17:44'),
(208, 4, 'Adiministrator', 'Login', '2019-02-27 14:18:36'),
(209, 11, 'shehryar', 'Login', '2019-02-28 17:51:35'),
(210, 11, 'shehryar', 'Session Destroy', '2019-02-28 17:51:37'),
(211, 11, 'shehryar', 'Login', '2019-03-04 10:05:09'),
(212, 11, 'shehryar', 'Session Destroy', '2019-03-04 10:05:11'),
(213, 11, 'shehryar', 'Login', '2019-03-05 15:16:08'),
(214, 11, 'shehryar', 'Session Destroy', '2019-03-05 15:16:11'),
(215, 11, 'shehryar', 'Logout', '2019-03-05 15:17:27'),
(216, 4, 'Adiministrator', 'Login', '2019-03-05 15:17:36'),
(217, 4, 'Adiministrator', 'Session Destroy', '2019-03-05 15:17:39'),
(218, 11, 'shehryar', 'Login', '2019-03-06 11:00:11'),
(219, 11, 'shehryar', 'Login', '2019-03-07 13:18:27'),
(220, 11, 'shehryar', 'Session Destroy', '2019-03-07 13:18:29'),
(221, 11, 'shehryar', 'Logout', '2019-03-07 13:52:11'),
(222, 11, 'shehryar', 'Login', '2019-03-07 13:52:22'),
(223, 11, 'shehryar', 'Logout', '2019-03-07 13:52:27'),
(224, 11, 'shehryar', 'Login', '2019-03-07 13:52:42'),
(225, 11, 'shehryar', 'Logout', '2019-03-07 13:53:13'),
(226, 13, 'asd', 'Login', '2019-03-07 13:53:19'),
(227, 13, 'asd', 'Logout', '2019-03-07 13:55:56'),
(228, 11, 'shehryar', 'Login', '2019-03-07 13:56:03'),
(229, 11, 'shehryar', 'Login', '2019-03-12 15:21:39'),
(230, 11, 'shehryar', 'Session Destroy', '2019-03-12 15:21:42'),
(231, 14, 'Arsalan Ahmed', 'Login', '2019-03-12 15:22:50'),
(232, 14, 'Arsalan Ahmed', 'Login', '2019-03-12 17:23:54'),
(233, 14, 'Arsalan Ahmed', 'Login', '2019-03-12 17:23:58'),
(234, 14, 'Arsalan Ahmed', 'Login', '2019-03-12 17:25:17'),
(235, 14, 'Arsalan Ahmed', 'Login', '2019-03-12 17:25:47'),
(236, 14, 'Arsalan Ahmed', 'Login', '2019-03-12 17:26:10'),
(237, 14, 'Arsalan Ahmed', 'Session Destroy', '2019-03-12 17:26:16'),
(238, 14, 'Arsalan Ahmed', 'Login', '2019-03-13 09:31:54'),
(239, 14, 'Arsalan Ahmed', 'Session Destroy', '2019-03-13 09:31:59'),
(240, 11, 'shehryar', 'Login', '2019-03-13 10:19:44'),
(241, 11, 'shehryar', 'Session Destroy', '2019-03-13 10:19:46'),
(242, 14, 'Arsalan Ahmed', 'Login', '2019-03-14 09:48:19'),
(243, 14, 'Arsalan Ahmed', 'Session Destroy', '2019-03-14 09:48:22'),
(244, 11, 'shehryar', 'Login', '2019-03-18 14:07:51'),
(245, 11, 'shehryar', 'Session Destroy', '2019-03-18 14:07:53'),
(246, 1, 'Usaid Raees', 'Login', '2019-03-19 14:53:42'),
(247, 14, 'Arsalan Ahmed', 'Login', '2019-03-22 11:14:53'),
(248, 14, 'Arsalan Ahmed', 'Session Destroy', '2019-03-22 11:14:56'),
(249, 11, 'shehryar', 'Login', '2019-03-22 15:05:23'),
(250, 11, 'shehryar', 'Session Destroy', '2019-03-22 15:05:25'),
(251, 11, 'shehryar', 'Login', '2019-03-25 12:57:33'),
(252, 11, 'shehryar', 'Session Destroy', '2019-03-25 12:57:35'),
(253, 11, 'shehryar', 'Logout', '2019-03-25 12:58:42'),
(254, 12, 'test', 'Login', '2019-03-25 12:58:48'),
(255, 11, 'shehryar', 'Login', '2019-04-01 15:04:52'),
(256, 1, 'Usaid Raees', 'Login', '2019-04-03 14:54:13'),
(257, 3, 'Azhar Ahmed Saifi', 'Login', '2019-04-04 19:04:39'),
(258, 3, 'Azhar Ahmed Saifi', 'Session Destroy', '2019-04-04 19:05:11'),
(259, 1, 'Usaid Raees', 'Login', '2019-04-05 16:33:40'),
(260, 15, 'Ebad Yar Khan', 'Login', '2019-04-05 16:35:13'),
(261, 3, 'Azhar Ahmed Saifi', 'Login', '2019-04-05 16:37:32'),
(262, 3, 'Azhar Ahmed Saifi', 'Session Destroy', '2019-04-05 16:37:34'),
(263, 3, 'Azhar Ahmed Saifi', 'Logout', '2019-04-05 16:42:55'),
(264, 3, 'Azhar Ahmed Saifi', 'Login', '2019-04-05 16:47:50'),
(265, 5, 'ahmed Ali', 'Login', '2019-04-06 14:12:43'),
(266, 5, 'ahmed Ali', 'Login', '2019-04-06 14:13:23'),
(267, 5, 'ahmed Ali', 'Session Destroy', '2019-04-06 14:13:30'),
(268, 5, 'ahmed Ali', 'Login', '2019-04-06 16:14:25'),
(269, 5, 'ahmed Ali', 'Login', '2019-04-06 16:14:51'),
(270, 5, 'ahmed Ali', 'Login', '2019-04-06 16:15:06'),
(271, 5, 'ahmed Ali', 'Login', '2019-04-06 16:15:24'),
(272, 5, 'ahmed Ali', 'Login', '2019-04-06 16:15:47'),
(273, 1, 'Usaid Raees', 'Login', '2019-04-06 16:16:29'),
(274, 1, 'Usaid Raees', 'Session Destroy', '2019-04-06 16:16:32'),
(275, 5, 'ahmed Ali', 'Login', '2019-04-08 10:05:53'),
(276, 5, 'ahmed Ali', 'Session Destroy', '2019-04-08 10:05:55'),
(277, 5, 'ahmed Ali', 'Login', '2019-04-08 14:46:01'),
(278, 5, 'ahmed Ali', 'Session Destroy', '2019-04-08 14:46:04'),
(279, 5, 'ahmed Ali', 'Login', '2019-04-09 10:21:40'),
(280, 5, 'ahmed Ali', 'Session Destroy', '2019-04-09 10:21:43'),
(281, 5, 'ahmed Ali', 'Login', '2019-04-09 17:00:08'),
(282, 5, 'ahmed Ali', 'Login', '2019-04-09 17:00:24'),
(283, 5, 'ahmed Ali', 'Login', '2019-04-10 09:47:35'),
(284, 1, 'Usaid Raees', 'Login', '2019-04-10 09:47:52'),
(285, 1, 'Usaid Raees', 'Session Destroy', '2019-04-10 09:47:54'),
(286, 1, 'Usaid Raees', 'Login', '2019-04-10 11:48:48'),
(287, 1, 'Usaid Raees', 'Session Destroy', '2019-04-10 11:48:50'),
(288, 1, 'Usaid Raees', 'Login', '2019-04-12 11:41:27'),
(289, 1, 'Usaid Raees', 'Session Destroy', '2019-04-12 11:41:29'),
(290, 1, 'Usaid Raees', 'Login', '2019-04-12 17:09:51'),
(291, 1, 'Usaid Raees', 'Session Destroy', '2019-04-12 17:09:53'),
(292, 1, 'Usaid Raees', 'Login', '2019-04-13 09:12:05'),
(293, 1, 'Usaid Raees', 'Session Destroy', '2019-04-13 09:12:08'),
(294, 1, 'Usaid Raees', 'Login', '2019-04-13 14:59:56'),
(295, 1, 'Usaid Raees', 'Session Destroy', '2019-04-13 14:59:58'),
(296, 1, 'Usaid Raees', 'Login', '2019-04-17 14:16:20'),
(297, 1, 'Usaid Raees', 'Session Destroy', '2019-04-17 14:16:22'),
(298, 4, 'Adiministrator', 'Login', '2019-04-25 10:58:16'),
(299, 4, 'Adiministrator', 'Session Destroy', '2019-04-25 10:58:20'),
(300, 4, 'Adiministrator', 'Logout', '2019-04-25 10:58:32'),
(301, 1, 'Usaid Raees', 'Login', '2019-04-25 10:58:41'),
(302, 1, 'Usaid Raees', 'Session Destroy', '2019-04-25 10:58:45'),
(303, 9, 'Umair Ansar', 'Login', '2019-04-25 11:23:15'),
(304, 1, 'Usaid Raees', 'Login', '2019-04-25 16:11:29'),
(305, 9, 'Umair Ansar', 'Login', '2019-04-26 09:04:30'),
(306, 9, 'Umair Ansar', 'Login', '2019-04-26 09:04:32'),
(307, 9, 'Umair Ansar', 'Login', '2019-04-26 09:04:33'),
(308, 1, 'Usaid Raees', 'Login', '2019-04-26 09:20:33'),
(309, 1, 'Usaid Raees', 'Login', '2019-04-27 09:20:24'),
(310, 1, 'Usaid Raees', 'Login', '2019-04-29 09:19:59'),
(311, 9, 'Umair Ansar', 'Login', '2019-04-29 09:31:20'),
(312, 1, 'Usaid Raees', 'Login', '2019-04-30 09:09:54'),
(313, 9, 'Umair Ansar', 'Login', '2019-04-30 12:00:25'),
(314, 9, 'Umair Ansar', 'Login', '2019-05-02 09:24:40'),
(315, 1, 'Usaid Raees', 'Login', '2019-05-02 09:27:02'),
(316, 9, 'Umair Ansar', 'Logout', '2019-05-02 15:42:16'),
(317, 9, 'Umair Ansar', 'Login', '2019-05-02 15:42:24'),
(318, 1, 'Usaid Raees', 'Login', '2019-05-03 09:24:51'),
(319, 1, 'Usaid Raees', 'Login', '2019-05-03 15:42:36'),
(320, 1, 'Usaid Raees', 'Login', '2019-05-06 09:17:00'),
(321, 9, 'Umair Ansar', 'Login', '2019-05-06 09:21:03'),
(322, 10, 'Nauman Tasleem', 'Login', '2019-05-06 14:23:11'),
(323, 10, 'Nauman Tasleem', 'Logout', '2019-05-06 14:29:14'),
(324, 10, 'Nauman Tasleem', 'Login', '2019-05-06 14:39:27'),
(325, 10, 'Nauman Tasleem', 'Logout', '2019-05-06 14:40:38'),
(326, 10, 'Nauman Tasleem', 'Login', '2019-05-06 14:41:42'),
(327, 9, 'Umair Ansar', 'Login', '2019-05-06 16:00:19'),
(328, 1, 'Usaid Raees', 'Login', '2019-05-07 10:49:16'),
(329, 10, 'Nauman Tasleem', 'Login', '2019-05-07 11:09:11'),
(330, 9, 'Umair Ansar', 'Login', '2019-05-07 11:11:15'),
(331, 10, 'Nauman Tasleem', 'Logout', '2019-05-07 11:29:32'),
(332, 10, 'Nauman Tasleem', 'Login', '2019-05-07 11:29:40'),
(333, 10, 'Nauman Tasleem', 'Logout', '2019-05-07 11:39:47'),
(334, 9, 'Umair Ansar', 'Login', '2019-05-07 12:46:31'),
(335, 9, 'Umair Ansar', 'Logout', '2019-05-07 12:51:36'),
(336, 9, 'Umair Ansar', 'Login', '2019-05-07 12:51:59'),
(337, 9, 'Umair Ansar', 'Logout', '2019-05-07 12:52:47'),
(338, 9, 'Umair Ansar', 'Login', '2019-05-07 12:53:00'),
(339, 1, 'Usaid Raees', 'Login', '2020-07-22 10:38:06'),
(340, 1, 'Usaid Raees', 'Login', '2020-07-22 11:26:32'),
(341, 1, 'Shehryar Haider', 'Login', '2020-07-22 14:28:32'),
(342, 1, 'Shehryar Haider', 'Login', '2020-07-22 14:28:56'),
(343, 1, 'Shehryar Haider', 'Login', '2020-07-22 14:29:14'),
(344, 1, 'Shehryar Haider', 'Login', '2020-07-22 14:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `ven_configurations`
--

CREATE TABLE `ven_configurations` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ven_configurations`
--

INSERT INTO `ven_configurations` (`id`, `key`, `value`, `updated_at`) VALUES
(1, 'two_factor_authentication', '0', '2018-12-11 07:12:58'),
(3, 'site_logo_desktop', 'jBbHdbjvsnQ9C4y7kN5u5x86fFtE1Woc8igJ35k5.png', '2019-05-06 09:47:40'),
(6, 'site_name', 'POS', '2020-07-22 06:46:08'),
(7, 'mail_host', 'hos.hostht.pk', '2018-06-25 07:02:15'),
(8, 'mail_port', '465', '2018-06-25 07:02:15'),
(9, 'mail_username', 'announcements@clientdemo.horizontech.biz', '2018-06-25 07:02:15'),
(10, 'mail_password', 'pk321#', '2018-06-25 07:02:15'),
(11, 'from_address', 'no-reply@horizontech.biz', '2018-07-02 12:34:35'),
(12, 'from_name', 'CMS', '2018-07-02 12:34:24'),
(13, 'mail_encryption', 'ssl', '2018-06-25 08:02:54'),
(14, 'mail_driver', 'smtp', '2018-06-25 08:03:25'),
(15, 'single_user_session', '0', '2019-01-07 06:31:17'),
(16, 'site_logo_smartphone', 'pOjQeb7b2NKHG3kuoUGoJsEvi5p4L4wmXYYEGp86.png', '2019-05-07 06:28:35'),
(17, 'text_graphic_logo', '1', '2019-05-06 09:47:40'),
(18, 'files_link', 'http://localhost/padeaf.org/cms/public/uploads/padeaf/', '2019-04-26 11:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `web_menus`
--

CREATE TABLE `web_menus` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'menus that will host children will have a route of null',
  `is_seo` tinyint(1) NOT NULL DEFAULT 0,
  `is_content` tinyint(1) NOT NULL DEFAULT 0,
  `content_route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_menus`
--

INSERT INTO `web_menus` (`id`, `parent_id`, `icon`, `name`, `route`, `is_seo`, `is_content`, `content_route`, `seo_tags`, `seo_description`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(46, 0, NULL, 'Home', 'home', 1, 1, 'padeaf.home', 'home', 'home', 1, 1, '2019-04-25 09:38:45', '2019-04-25 12:02:16'),
(47, 0, NULL, 'About', NULL, 0, 0, NULL, NULL, NULL, 2, 1, '2019-04-25 09:40:47', '2019-04-25 09:40:47'),
(48, 47, NULL, 'Introduction', 'introduction', 1, 1, 'padeaf.introduction', NULL, NULL, 1, 1, '2019-04-25 09:41:57', '2019-05-02 04:57:18'),
(52, 47, NULL, 'Vision', 'vision', 1, 1, 'padeaf.vision', NULL, NULL, 2, 1, '2019-04-25 09:46:17', '2019-04-25 09:46:17'),
(53, 47, NULL, 'mission', 'mission', 1, 1, 'padeaf.mission', NULL, NULL, 3, 1, '2019-04-25 09:48:09', '2019-04-25 09:48:09'),
(54, 47, NULL, 'Values', 'values', 1, 1, 'padeaf.values', NULL, NULL, 4, 1, '2019-04-25 09:50:11', '2019-04-25 09:50:11'),
(56, 47, NULL, 'Managing Committee', 'managing_committee', 1, 0, 'padeaf.managing_committee', NULL, NULL, 6, 1, '2019-04-25 09:54:20', '2019-05-07 06:40:56'),
(57, 47, NULL, 'Executive Member', 'executive_member', 1, 0, 'padeaf.executive_member', NULL, NULL, 7, 1, '2019-04-25 09:55:00', '2019-05-07 06:41:16'),
(58, 47, NULL, 'Sub Committee', 'sub_committee', 1, 0, 'padeaf.sub_committee', NULL, NULL, 8, 1, '2019-04-25 09:55:51', '2019-05-07 06:41:20'),
(59, 47, NULL, 'Chief Patron\'s Message', 'chief_patrons_message', 1, 1, 'padeaf.chief_patrons_message', NULL, NULL, 9, 1, '2019-04-25 09:56:55', '2019-04-25 09:56:55'),
(60, 47, NULL, 'National network', 'national_network', 1, 1, 'padeaf.national_network', NULL, NULL, 10, 1, '2019-04-25 09:57:40', '2019-04-25 09:57:40'),
(61, 47, NULL, 'International Network', 'international_network', 1, 1, 'padeaf.international_network', NULL, NULL, 11, 1, '2019-04-25 09:58:36', '2019-04-25 12:27:43'),
(62, 0, NULL, 'News & EVENTS', NULL, 0, 0, NULL, NULL, NULL, 3, 1, '2019-04-25 10:01:35', '2019-04-25 10:01:35'),
(63, 62, NULL, 'News', 'news', 1, 0, 'padeaf.news', NULL, NULL, 1, 1, '2019-04-25 10:02:23', '2019-05-02 07:07:35'),
(64, 62, NULL, 'Inauguration', 'inauguration', 1, 1, 'padeaf.inauguration', NULL, NULL, 2, 1, '2019-04-25 10:03:02', '2019-04-27 05:59:02'),
(65, 62, NULL, 'Finding & Survey Reports', 'finding_survey_report', 1, 1, 'padeaf.finding_survey_report', NULL, NULL, 3, 1, '2019-04-25 10:04:06', '2019-04-25 10:04:06'),
(66, 0, NULL, 'PADS EDUCATION', NULL, 0, 0, NULL, NULL, NULL, 4, 1, '2019-04-25 10:04:49', '2019-04-25 10:04:49'),
(67, 66, NULL, 'Deaf Empowerment & Education Center', 'deaf_empowerment_education_center', 1, 1, 'padeaf.deaf_empowerment_education_center', NULL, NULL, 1, 1, '2019-04-25 10:08:31', '2019-04-25 10:08:31'),
(68, 66, NULL, 'English Class', 'english_class', 1, 1, 'padeaf.english_class', NULL, NULL, 2, 1, '2019-04-25 10:09:36', '2019-04-25 10:09:36'),
(69, 66, NULL, 'Computer Class', 'computer_class', 1, 1, 'padeaf.computer_class', NULL, NULL, 3, 1, '2019-04-25 10:10:11', '2019-04-25 10:10:11'),
(70, 66, NULL, 'Cooking Class', 'cooking_class', 1, 1, 'padeaf.cooking_class', NULL, NULL, 4, 1, '2019-04-25 10:10:46', '2019-04-25 10:10:46'),
(71, 66, NULL, 'Pakistan Sign Language Class', 'language_class', 1, 1, 'padeaf.language_class', NULL, NULL, 5, 1, '2019-04-25 10:12:47', '2019-04-25 10:12:47'),
(72, 66, NULL, 'Basic Literacy Class', 'literacy_class', 1, 1, 'padeaf.literacy_class', NULL, NULL, 6, 1, '2019-04-25 10:14:00', '2019-04-25 10:14:00'),
(73, 66, NULL, 'Sign Language Interpreter Class', 'interpreter_class', 1, 1, 'padeaf.interpreter_class', NULL, NULL, 7, 1, '2019-04-25 10:15:01', '2019-04-25 10:15:01'),
(74, 66, NULL, 'Leadership & Education Training', 'education_training', 1, 1, 'padeaf.education_training', NULL, NULL, 8, 1, '2019-04-25 10:16:54', '2019-04-25 10:16:54'),
(75, 66, NULL, 'Brilliant Students', 'brilliant_students', 1, 1, 'padeaf.brilliant_students', NULL, NULL, 9, 1, '2019-04-25 10:17:52', '2019-04-25 10:17:52'),
(76, 0, NULL, 'Donors', 'donors', 1, 0, 'padeaf.donors', NULL, NULL, 5, 1, '2019-04-25 10:19:01', '2019-05-07 06:43:21'),
(77, 0, NULL, 'Projects', 'projects', 1, 1, 'padeaf.projects', NULL, NULL, 6, 1, '2019-04-25 10:19:44', '2019-04-25 10:19:44'),
(78, 0, NULL, 'Media Center', NULL, 0, 0, NULL, NULL, NULL, 7, 1, '2019-04-25 10:20:35', '2019-04-25 10:20:35'),
(79, 80, NULL, 'Gallery', 'marriage_ceremony', 0, 0, NULL, NULL, NULL, 1, 1, '2019-04-25 10:21:32', '2019-05-06 07:20:57'),
(80, 79, NULL, 'Combined Marriage Ceremony', 'marriage_ceremony', 1, 0, 'padeaf.marriage_ceremony', NULL, NULL, 1, 0, '2019-04-25 10:24:06', '2019-05-07 06:45:08'),
(81, 79, NULL, 'First international Forum for Deaf Muslim', 'deaf_muslim', 1, 0, 'padeaf.deaf_muslim', NULL, NULL, 2, 0, '2019-04-25 10:25:27', '2019-05-07 07:21:59'),
(83, 78, NULL, 'Video', 'videos', 1, 0, 'padeaf.video', NULL, NULL, 2, 1, '2019-04-25 10:26:50', '2019-05-07 06:45:28'),
(84, 0, NULL, 'Donate Now', 'donate_now', 1, 0, 'padeaf.donate_now', NULL, NULL, 8, 1, '2019-04-25 10:27:40', '2019-05-07 06:45:31'),
(85, 0, NULL, 'Contact Us', 'contact_us', 1, 0, 'padeaf.contact_us', NULL, NULL, 9, 1, '2019-04-25 10:28:16', '2019-05-07 06:45:33'),
(86, 78, NULL, 'Gallery', NULL, 0, 0, NULL, NULL, NULL, 0, 1, '2019-05-06 07:22:01', '2019-05-06 07:22:01'),
(87, 86, NULL, 'Combined Marriage Ceremony', 'marriage_ceremony', 0, 0, NULL, NULL, NULL, 1, 0, '2019-05-06 07:22:23', '2019-05-06 10:15:40'),
(88, 86, NULL, 'First International Forum for the Deaf Muslims', 'deaf_muslim', 0, 0, NULL, NULL, NULL, 2, 0, '2019-05-06 07:23:29', '2019-05-06 10:15:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_history`
--
ALTER TABLE `action_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_files_id` (`client_files_id`);

--
-- Indexes for table `client_files`
--
ALTER TABLE `client_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_of_accounts`
--
ALTER TABLE `list_of_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_chart_of_accounts`
--
ALTER TABLE `mt_chart_of_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_sub_accounts_types`
--
ALTER TABLE `mt_sub_accounts_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `views` (`views`),
  ADD KEY `created_at` (`created_at`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key` (`key`);

--
-- Indexes for table `sm_faq`
--
ALTER TABLE `sm_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_faq_categories`
--
ALTER TABLE `sm_faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `um_menus`
--
ALTER TABLE `um_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `um_permissions`
--
ALTER TABLE `um_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `um_roles`
--
ALTER TABLE `um_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `um_role_menus`
--
ALTER TABLE `um_role_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `um_role_permissions`
--
ALTER TABLE `um_role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `um_users`
--
ALTER TABLE `um_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_login_history`
--
ALTER TABLE `users_login_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ven_configurations`
--
ALTER TABLE `ven_configurations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key` (`key`,`value`);

--
-- Indexes for table `web_menus`
--
ALTER TABLE `web_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_history`
--
ALTER TABLE `action_history`
  MODIFY `id` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `client_files`
--
ALTER TABLE `client_files`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `list_of_accounts`
--
ALTER TABLE `list_of_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mt_chart_of_accounts`
--
ALTER TABLE `mt_chart_of_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `mt_sub_accounts_types`
--
ALTER TABLE `mt_sub_accounts_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sm_faq`
--
ALTER TABLE `sm_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sm_faq_categories`
--
ALTER TABLE `sm_faq_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `um_menus`
--
ALTER TABLE `um_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `um_permissions`
--
ALTER TABLE `um_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `um_roles`
--
ALTER TABLE `um_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `um_role_menus`
--
ALTER TABLE `um_role_menus`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `um_role_permissions`
--
ALTER TABLE `um_role_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=474;

--
-- AUTO_INCREMENT for table `um_users`
--
ALTER TABLE `um_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users_login_history`
--
ALTER TABLE `users_login_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `ven_configurations`
--
ALTER TABLE `ven_configurations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `web_menus`
--
ALTER TABLE `web_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`client_files_id`) REFERENCES `client_files` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
