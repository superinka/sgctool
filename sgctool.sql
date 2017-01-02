-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2017 at 03:30 PM
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
(45, 51, 'Minh Hòa', 'inkavn03@gmail.com', '0979030879', '', '', '2016-12-29', 2, '');

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
  `update_by` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_mission`
--

INSERT INTO `tb_mission` (`id`, `name`, `description`, `create_by`, `create_date`, `update_time`, `progress`, `project_id`, `status`, `start_date`, `end_date`, `code`, `update_by`) VALUES
(12, 'Vẽ con gà', 'ahihi', 46, '2016-12-30', '2017-01-02 17:56:11.000000', 70, 20, 1, '2016-12-30', '2016-12-30', '20596f932feb74cd842311e6b26dd5d09f', 1),
(13, 'Vẽ con chó', 'Dự án vườn treo', 46, '2016-12-30', '2017-01-02 20:41:40.000000', 50, 20, 1, '2016-12-30', '2016-12-30', '20bd2bc19194002ef15f767fa9f989ff9c', 1),
(14, 'Vẽ con trâu', '', 1, '2017-01-02', '2017-01-02 20:45:43.000000', 0, 20, 1, '2017-01-02', '2017-01-02', '201350fa0e60b5f469f67d6b47f38aa42ab1eb', 1);

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
(2, 12, 51, '2017-01-02 15:00:05.000000'),
(3, 13, 47, '2017-01-02 20:41:40.000000'),
(4, 14, 47, '2017-01-02 20:45:43.000000');

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
(20, 'Babylon', 'Dự án vườn treo', '2016-12-30', 1, '2016-12-30', '2016-12-30', '1', NULL, 10, 1, '2017-01-02 20:40:38.000000', 'B');

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
(101, NULL, 20, 48, '2016-12-30 09:27:30.000000'),
(102, NULL, 20, 49, '2016-12-30 09:27:30.000000'),
(103, NULL, 20, 51, '2016-12-30 09:27:30.000000'),
(104, NULL, 20, 47, '2017-01-02 20:40:38.000000');

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
(36, 12, 20, 10, '2016-12-30 09:27:30.000000'),
(37, 8, 20, 40, '2016-12-30 09:27:30.000000'),
(38, 9, 20, 50, '2017-01-02 20:40:38.000000');

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
(71, 51, 8, '');

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
(1, 'Móng con gà', 'Vẽ móng con gà', 51, '2017-01-02', '2017-01-02', '2017-01-02', 100, 12, '20120366e97d601bfae7442743f0880c2b55', 20),
(2, 'Đầu con gà', 'Vẽ đầu con gà', 51, '2017-01-02', '2017-01-02', '2017-01-02', 100, 12, '201226dc3ca8b3f76c1aacc7aa64fd9d7ea0', 20),
(3, 'Vẽ cánh con gà', 'Vẽ cánh con gà', 51, '2017-01-02', '2017-01-02', '2017-01-03', 0, 12, '2012aca3ed1458b1b0ad68b0f0ba69a545f5', 20),
(4, 'Vẽ đùi con gà', 'Vẽ đùi gà', 51, '2017-01-02', '2017-01-02', '2017-01-02', 100, 12, '201270b5e1750de1e3ac8fea9428859e8ace', 20),
(5, 'Vẽ đuôi con gà', 'Vẽ đuôi gà', 51, '2017-01-02', '2017-01-02', '2017-01-02', 0, 12, '2012a9ba291fdf14597b1b6a4e12136acfbe', 20),
(6, 'Vẽ mỏ con gà', 'Vẽ mỏ gà', 51, '2017-01-02', '2017-01-02', '2017-01-02', 0, 12, '2012c855020442a6d26ae4f1e7a98c560c8f', 20),
(7, 'Đầu con gà', 'Dự án babylon', 51, '2017-01-02', '2017-01-02', '2017-01-02', 100, 12, '2012d4e1111c77dabb8e17e05890b5b5e92d', 20),
(8, 'Móng con gà', 'Dự án babylon', 51, '2017-01-02', '2017-01-02', '2017-01-02', 100, 12, '2012f246ef536f660d27172e7cb9834f9af3', 20),
(9, 'Vẽ lại con gà', 'Vẽ móng con gà', 51, '2017-01-02', '2017-01-02', '2017-01-02', 100, 12, '2012e5c3e53011bb768c24eac4602096a063', 20),
(10, 'Vẽ bụng con gà', 'vẽ bụng gà', 51, '2017-01-02', '2017-01-02', '2017-01-02', 100, 12, '20128fe13fef504c55842aaffb31088c4f47', 20),
(11, 'Vẽ đầu con chó', 'Vẽ đầu chó', 47, '2017-01-02', '2017-01-02', '2017-01-02', 100, 13, '20135dd40edef059a5d93f4ad7c209267fda', 20),
(12, 'Vẽ chân chó', 'Vẽ chân chó', 47, '2017-01-02', '2017-01-02', '2017-01-02', 0, 13, '2013d909a02739aca3a41965e9a5b828fb6a', 20);

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
(51, 'minhhoa', '25d55ad283aa400af464c76d713c07ad', '2016-12-29', 1, 4, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `tb_department`
--
ALTER TABLE `tb_department`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tb_mission`
--
ALTER TABLE `tb_mission`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_mission_user`
--
ALTER TABLE `tb_mission_user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tb_project_user`
--
ALTER TABLE `tb_project_user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `tb_proportion_department`
--
ALTER TABLE `tb_proportion_department`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `tb_task`
--
ALTER TABLE `tb_task`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
