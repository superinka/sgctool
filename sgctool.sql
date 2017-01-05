-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2017 at 05:42 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sgctool`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_daily_report`
--

CREATE TABLE `tb_daily_report` (
  `id` int(32) NOT NULL,
  `create_by` int(8) NOT NULL,
  `create_time` datetime(6) NOT NULL,
  `status` int(8) NOT NULL DEFAULT '1',
  `task_id` int(8) NOT NULL,
  `update_time` datetime(6) NOT NULL,
  `description` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `code` text COLLATE utf8_unicode_ci NOT NULL,
  `time_spend` int(8) NOT NULL,
  `progress` int(8) NOT NULL,
  `review_by` int(8) DEFAULT NULL,
  `review_status` int(8) DEFAULT NULL,
  `create_date` date NOT NULL,
  `note` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_daily_report`
--

INSERT INTO `tb_daily_report` (`id`, `create_by`, `create_time`, `status`, `task_id`, `update_time`, `description`, `code`, `time_spend`, `progress`, `review_by`, `review_status`, `create_date`, `note`) VALUES
(1, 47, '2017-01-03 00:00:00.000000', 1, 3, '2017-01-03 00:00:00.000000', 'report hôm nay', '1', 8, 0, 46, 1, '2017-01-03', NULL),
(2, 47, '2017-01-03 00:00:00.000000', 1, 3, '2017-01-03 00:00:00.000000', 'report hôm nay', '1', 8, 100, 46, 0, '2017-01-03', NULL),
(3, 47, '2017-01-04 00:00:00.000000', 1, 3, '2017-01-03 00:00:00.000000', 'report hôm nay', '1', 8, 100, 46, 1, '2017-01-04', NULL),
(4, 47, '2017-01-04 00:00:00.000000', 1, 3, '2017-01-04 00:00:00.000000', 'report hôm nay', '1', 8, 0, 46, 0, '2017-01-04', NULL),
(5, 47, '2017-01-04 00:00:00.000000', 1, 3, '2017-01-04 00:00:00.000000', 'report hôm nay', '1', 8, 0, 46, 0, '2017-01-04', NULL),
(6, 47, '2017-01-04 21:15:04.000000', 2, 15, '2017-01-04 21:15:04.000000', 'Vẽ mỏ gà', '331894169bf31c7ff062936a96d3c8bd1f8f2ff3', 8, 0, 52, 1, '2017-01-04', 'Hoàn thành 50%'),
(7, 52, '2017-01-04 23:02:25.000000', 1, 17, '2017-01-04 23:02:25.000000', 'giám sát vẽ chân gà', '3319467670efdf2ec9b086079795c442636b55fb', 3, 0, 52, 0, '2017-01-04', 'giám sát vẽ chân gà'),
(8, 52, '2017-01-05 08:32:35.000000', 1, 16, '2017-01-05 08:32:35.000000', 'giám sát vẽ gà 2', '33199834c74d97b01eae257e44aa9d5bade97baf', 8, 100, 53, 0, '2017-01-05', 'giám sát vẽ đầu gà'),
(10, 52, '2017-01-05 22:35:47.000000', 1, 18, '2017-01-05 22:35:47.000000', 'Giám sát Hưng vẽ', '332091846f4922f45568161a8cdf4ad2299f6d23', 6, 100, 53, 1, '2017-01-05', 'Giám sát');

-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE `tb_department` (
  `id` int(8) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manager` int(32) DEFAULT NULL,
  `vicemanager` int(32) DEFAULT NULL,
  `parent_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`id`, `name`, `description`, `manager`, `vicemanager`, `parent_id`) VALUES
(1, 'Ban Lãnh Đạo', 'Giám đốc, phó giám đốc', 0, NULL, 0),
(2, 'Trung Tâm Nghiên Cứu Và Phát Triển', NULL, NULL, NULL, 1),
(3, 'Trung Tâm Vận Hành Và Khai Thác', NULL, NULL, NULL, 1),
(4, 'Phòng Kinh Doanh', NULL, NULL, NULL, 1),
(5, 'Kế Toán Và Hành Chính Nhân Sự', NULL, NULL, NULL, 1),
(6, 'Phòng Lập Trình', NULL, NULL, NULL, 2),
(7, 'Phòng Hệ Thống', NULL, NULL, NULL, 2),
(8, 'Phòng Web', NULL, NULL, NULL, 2),
(9, 'Phòng Đồ Họa', NULL, NULL, NULL, 2),
(10, 'Phòng Vận Hành', NULL, NULL, NULL, 3),
(11, 'Phòng Test', NULL, NULL, NULL, 3),
(12, 'Phòng CSKH', 'Phòng chăm sóc khách hàng', NULL, NULL, 3),
(13, 'Phòng Kế Toán', NULL, NULL, NULL, 5),
(14, 'Phòng Hành Chính và Nhân Sự', NULL, NULL, NULL, 5),
(15, 'Phòng Kinh Doanh', NULL, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `fullname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` int(8) NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`id`, `user_id`, `fullname`, `email`, `phone`, `skype`, `facebook`, `birthday`, `sex`, `address`) VALUES
(38, 44, 'Hoàng', 'inkavn03@gmail.com', '0979030879', 'hoangskype', 'hoang@gmail.com', '1992-12-27', 1, 'Hà Nội'),
(40, 46, 'Hoa', 'inkavn03@gmail.com', '0979030879', '', '', '2016-12-27', 2, 'Hà Nội'),
(41, 47, 'Bùi Ngọc Mai', 'inkavn03@gmail.com', '0979030879', '', '', '1993-03-31', 1, 'Hà Nội'),
(42, 48, 'Nguyễn Huy Hoàng', 'inkavn03@gmail.com', '0979030879', '', '', '1991-12-28', 2, 'Hà Nội'),
(43, 49, 'Hoàng yến', 'inkavn03@gmail.com', '0979030879', '', '', '1990-12-29', 1, ''),
(44, 50, 'Hoàng Phương', 'inkavn03@gmail.com', '0979030879', '', '', '1991-12-29', 1, ''),
(45, 51, 'Minh Hòa', 'inkavn03@gmail.com', '0979030879', '', '', '2016-12-29', 2, ''),
(46, 52, 'Hiền Đệ', 'inka@gmail.com', '1', '', '', '2017-01-03', 2, 'số 18 xóm mới thôn cương ngô xã tứ hiệp huyện thanh trì hà nội'),
(47, 53, 'Ban lãnh đạo', 'inkavn03@gmail.com', '0979030879', '', '', '2017-01-05', 1, 'Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mission`
--

CREATE TABLE `tb_mission` (
  `id` int(8) NOT NULL,
  `name` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `create_by` int(8) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_time` datetime(6) DEFAULT NULL,
  `progress` int(8) DEFAULT NULL,
  `project_id` int(8) NOT NULL,
  `status` int(8) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `code` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `update_by` int(8) DEFAULT NULL,
  `department_id` int(8) DEFAULT NULL,
  `level` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_mission`
--

INSERT INTO `tb_mission` (`id`, `name`, `description`, `create_by`, `create_date`, `update_time`, `progress`, `project_id`, `status`, `start_date`, `end_date`, `code`, `update_by`, `department_id`, `level`) VALUES
(18, 'Vẽ con gà', 'Vẽ con gà dự án babylon', 1, '2017-01-04', '2017-01-04 20:34:57.000000', 50, 33, 1, '2017-01-04', '2017-01-04', '331060596f932feb74cd842311e6b26dd5d09f', 1, 9, 4),
(19, 'Giám sát vẽ gà', 'Giám sát vẽ gà', 52, '2017-01-04', '2017-01-04 22:57:22.000000', 50, 33, 1, '2017-01-04', '2017-01-24', '336070ef335472c8353c861aa4d3b555d253f9', 52, 9, 3),
(20, 'Giám sát vẽ chó', 'Giám sát vẽ chó', 52, '2017-01-05', '2017-01-05 09:35:48.000000', 0, 33, 1, '2017-01-05', '2017-01-07', '3324545ce1f1193382c749f25b1742b6298857', 52, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mission_user`
--

CREATE TABLE `tb_mission_user` (
  `id` int(8) NOT NULL,
  `mission_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `update_time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mission_user`
--

INSERT INTO `tb_mission_user` (`id`, `mission_id`, `user_id`, `update_time`) VALUES
(8, 18, 47, '2017-01-04 20:34:57.000000'),
(9, 19, 52, '2017-01-04 22:57:22.000000'),
(10, 20, 52, '2017-01-05 09:35:48.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_project`
--

CREATE TABLE `tb_project` (
  `id` int(8) NOT NULL,
  `project_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_date` date NOT NULL,
  `create_by` int(8) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department_id` int(8) DEFAULT NULL,
  `progress` int(8) DEFAULT NULL,
  `update_by` int(8) DEFAULT NULL,
  `update_time` datetime(6) DEFAULT NULL,
  `short_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_project`
--

INSERT INTO `tb_project` (`id`, `project_name`, `description`, `create_date`, `create_by`, `start_date`, `end_date`, `status`, `department_id`, `progress`, `update_by`, `update_time`, `short_name`) VALUES
(33, 'Babylon', 'Dự án babylon', '2017-01-04', 1, '2017-01-04', '2017-01-04', '1', NULL, 7, 1, '2017-01-04 20:33:03.000000', 'BBL');

-- --------------------------------------------------------

--
-- Table structure for table `tb_project_user`
--

CREATE TABLE `tb_project_user` (
  `id` int(8) NOT NULL,
  `des` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `update_time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_project_user`
--

INSERT INTO `tb_project_user` (`id`, `des`, `project_id`, `user_id`, `update_time`) VALUES
(194, NULL, 33, 48, '2017-01-04 20:33:03.000000'),
(195, NULL, 33, 47, '2017-01-04 20:33:03.000000'),
(196, NULL, 33, 50, '2017-01-04 20:33:03.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_proportion_department`
--

CREATE TABLE `tb_proportion_department` (
  `id` int(8) NOT NULL,
  `department_id` int(8) DEFAULT NULL,
  `project_id` int(8) DEFAULT NULL,
  `proportion` int(8) DEFAULT NULL,
  `update_time` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_proportion_department`
--

INSERT INTO `tb_proportion_department` (`id`, `department_id`, `project_id`, `proportion`, `update_time`) VALUES
(104, 12, 33, 50, '2017-01-04 20:33:03.000000'),
(105, 9, 33, 20, '2017-01-04 20:33:03.000000'),
(106, 10, 33, 30, '2017-01-04 20:33:03.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `department_id` int(8) NOT NULL,
  `desciption` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `user_id`, `department_id`, `desciption`) VALUES
(46, 44, 12, ''),
(47, 44, 14, ''),
(65, 47, 9, ''),
(66, 48, 12, ''),
(67, 46, 7, ''),
(68, 46, 8, ''),
(69, 49, 8, ''),
(70, 50, 10, ''),
(71, 51, 8, ''),
(72, 52, 9, ''),
(73, 52, 10, ''),
(74, 53, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_task`
--

CREATE TABLE `tb_task` (
  `id` int(32) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_by` int(8) NOT NULL,
  `create_date` date NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(8) NOT NULL,
  `mission_id` int(11) NOT NULL,
  `code` text COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_task`
--

INSERT INTO `tb_task` (`id`, `name`, `description`, `create_by`, `create_date`, `start_date`, `end_date`, `status`, `mission_id`, `code`, `project_id`) VALUES
(14, 'Vẽ cánh con gà', 'Vẽ cánh con gà', 47, '2017-01-04', '2017-01-04', '2017-01-04', 100, 18, '3318cc6f4b1aa59effce18bfa11b26cb5e1d', 33),
(15, 'Vẽ đầu con gà', 'Dự án babylon', 47, '2017-01-04', '2017-01-04', '2017-01-11', 0, 18, '3318f2fe69ef0dbbf4fc2498e26c5fc1d369', 33),
(16, 'Giám sát vẽ đầu gà', 'Giám sát vẽ đầu gà', 52, '2017-01-04', '2017-01-04', '2017-01-07', 0, 19, '33195103f5160e4746f8192f8951ca548403', 33),
(17, 'Giám sát vẽ chân gà', 'Giám sát vẽ chân gà', 52, '2017-01-04', '2017-01-04', '2017-01-07', 0, 19, '3319befbf305c3428396db22ba947c87d981', 33),
(18, 'Giám sát vẽ chân chó', 'Giám sát vẽ chân chó', 52, '2017-01-05', '2017-01-05', '2017-01-06', 0, 20, '33206921b933d14b7ed37e006c7bb9c5b1f7', 33);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(8) NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` date DEFAULT NULL,
  `status` int(8) DEFAULT NULL,
  `account_type` int(8) NOT NULL,
  `update_time` datetime(6) DEFAULT NULL,
  `update_by` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `create_date`, `status`, `account_type`, `update_time`, `update_by`) VALUES
(1, 'superadmin', 'c20ad4d76fe97759aa27a0c99bff6710', '2016-12-23', 1, 1, NULL, NULL),
(2, 'admin', 'c20ad4d76fe97759aa27a0c99bff6710', '2016-12-23', 1, 2, NULL, NULL),
(44, 'Hoang', '25d55ad283aa400af464c76d713c07ad', '2016-12-27', 1, 3, '2016-12-27 09:38:55.000000', 1),
(46, 'hoa', '25d55ad283aa400af464c76d713c07ad', '2016-12-27', 1, 3, '2016-12-28 16:29:05.000000', 1),
(47, 'ngocmai', '25d55ad283aa400af464c76d713c07ad', '2016-12-28', 1, 4, NULL, NULL),
(48, 'hoangnguyen', '25d55ad283aa400af464c76d713c07ad', '2016-12-28', 1, 4, NULL, NULL),
(49, 'yenhoang', '25d55ad283aa400af464c76d713c07ad', '2016-12-29', 1, 4, NULL, NULL),
(50, 'phuonghoang', '25d55ad283aa400af464c76d713c07ad', '2016-12-29', 1, 4, NULL, NULL),
(51, 'minhhoa', '25d55ad283aa400af464c76d713c07ad', '2016-12-29', 1, 4, NULL, NULL),
(52, 'hiende', '25d55ad283aa400af464c76d713c07ad', '2017-01-03', 1, 3, NULL, NULL),
(53, 'banlanhdao', '25d55ad283aa400af464c76d713c07ad', '2017-01-05', 1, 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_daily_report`
--
ALTER TABLE `tb_daily_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_department`
--
ALTER TABLE `tb_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mission`
--
ALTER TABLE `tb_mission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mission_user`
--
ALTER TABLE `tb_mission_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_project_user`
--
ALTER TABLE `tb_project_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_proportion_department`
--
ALTER TABLE `tb_proportion_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_task`
--
ALTER TABLE `tb_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daily_report`
--
ALTER TABLE `tb_daily_report`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_department`
--
ALTER TABLE `tb_department`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tb_mission`
--
ALTER TABLE `tb_mission`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tb_mission_user`
--
ALTER TABLE `tb_mission_user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tb_project_user`
--
ALTER TABLE `tb_project_user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;
--
-- AUTO_INCREMENT for table `tb_proportion_department`
--
ALTER TABLE `tb_proportion_department`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `tb_task`
--
ALTER TABLE `tb_task`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
