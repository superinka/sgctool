-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2017 at 11:42 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baocao`
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
(10, 52, '2017-01-05 22:35:47.000000', 1, 18, '2017-01-05 22:35:47.000000', 'Giám sát Hưng vẽ', '332091846f4922f45568161a8cdf4ad2299f6d23', 6, 100, 53, 1, '2017-01-05', 'Giám sát'),
(11, 72, '2017-01-09 17:36:09.000000', 1, 38, '2017-01-09 17:36:09.000000', 'duyệt đổi thưởng', '38333089a5771bce93e200c36f7cd9dfd0e5deaa', 2, 100, 72, 0, '2017-01-09', 'tỉ lệ: 35.5%'),
(12, 72, '2017-01-10 08:24:42.000000', 1, 38, '2017-01-10 08:24:42.000000', 'aa', '38339955a5771bce93e200c36f7cd9dfd0e5deaa', 3, 100, 60, 0, '2017-01-10', 'aaa'),
(13, 68, '2017-01-10 14:33:42.000000', 1, 37, '2017-01-10 14:33:42.000000', '12', '37291034a5bfc9e07964f8dddeb95fc584cd965d', 3, 0, 62, 1, '2017-01-10', '12'),
(14, 62, '2017-01-10 16:11:23.000000', 1, 43, '2017-01-10 16:11:23.000000', 'Dự án vườn treo', '37379704eff214691f4555b48fe2ce6ddec0a6e7', 6, 100, 62, 1, '2017-01-10', '123'),
(15, 68, '2017-01-10 16:19:59.000000', 1, 37, '2017-01-10 16:19:59.000000', 'ahihi', '3729776607c723d69c9d9dbd8017490b4cbe3ff2', 4, 100, 68, 0, '2017-01-10', '1'),
(16, 65, '2017-01-10 16:26:17.000000', 1, 42, '2017-01-10 16:26:17.000000', 'báo cáo của tuân', '3729318729385e12de464e5ad1a03c68433e4f81', 3, 100, 62, 1, '2017-01-10', '4567890');

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
(47, 53, 'Ban lãnh đạo', 'inkavn03@gmail.com', '0979030879', '', '', '2017-01-05', 1, 'Hà Nội'),
(54, 60, 'Nguyễn Văn Cương', 'cuongnv@sdcmedia.com.vn', '12345678', '', '', '2017-01-09', 1, ''),
(55, 61, 'Nguyễn Minh Quang', 'quangnm@sdcmedia.com.vn', '', '', '', '1987-05-08', 1, ''),
(56, 62, 'Nguyễn Bá Thành', 'thanhnb@sdcmedia.com.vn', '12345678', '', '', '2017-01-09', 1, ''),
(57, 63, 'Lưu Văn Thinh', 'thinhlv@sdcmedia.com.vn', '', '', '', '2017-01-09', 1, ''),
(58, 64, 'Vũ Mạnh Huân', 'huanvm@sdcmedia.com.vn', '', '', '', '2017-01-09', 1, ''),
(59, 65, 'Vũ Ngọc Tuân', 'tuanvn@sdcmedia.com.vn', '', '', '', '2017-01-09', 1, ''),
(60, 66, 'Nguyễn Đình Khoa', 'khoand@sdcmedia.com.vn', '', '', '', '2017-01-09', 1, ''),
(61, 67, 'Phạm Ngọc Tuấn', 'tuanpn@sdcmedia.com.vn', '', '', '', '2017-01-09', 1, ''),
(62, 68, 'Nguyễn Trung Kiên', 'kiennt@sdcmedia.com.vn', '01234567892', '', '', '2017-01-09', 1, ''),
(63, 69, 'Nguyễn Văn Huy', 'huynv@sdcmedia.com.vn', '', '', '', '2017-01-09', 1, ''),
(64, 70, 'Trần Thị Hưng', 'hungtt@sdcmedia.com.vn', '12345678', '', '', '2017-01-09', 2, ''),
(65, 71, 'Nguyễn Huy Hoang', 'hoangnh@sdcmedia.com.vn', '', '', '', '2017-01-09', 1, ''),
(66, 72, 'Lê Thị Phương', 'phuonglt@sdcmedia.com.vn', '12345678', '', '', '2017-01-09', 2, ''),
(67, 73, 'Hoàng Thị Thu Hương', 'huonghtt@sdcmedia.com.vn', '', '', '', '2017-01-09', 2, ''),
(68, 74, 'Lê Danh Thành', 'thanhld@sdcmedia.com.vn', '', '', '', '2017-01-09', 1, '');

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
(18, 'Vẽ con gà', 'Vẽ con gà dự án babylon', 1, '2017-01-04', '2017-01-04 20:34:57.000000', 50, 33, 1, '2017-01-04', '2017-01-04', '331060596f932feb74cd842311e6b26dd5d00f', 1, 9, 4),
(19, 'Giám sát vẽ gà', 'Giám sát vẽ gà', 52, '2017-01-04', '2017-01-04 22:57:22.000000', 50, 33, 1, '2017-01-04', '2017-01-24', '336070ef335472c8353c861aa4d3b555d253f9', 52, 9, 3),
(20, 'Giám sát vẽ chó', 'Giám sát vẽ chó', 52, '2017-01-05', '2017-01-05 09:35:48.000000', 0, 33, 1, '2017-01-05', '2017-01-07', '3324545ce1f1193382c749f25b1742b6298857', 52, 9, 3),
(21, 'Vẽ Gà', 'vẽ gà', 1, '2017-01-06', '2017-01-06 14:55:44.000000', 0, 35, 1, '2017-01-01', '2017-01-10', '35614e03bfc35dfb8c73dc0bc785e12cab8e1', 1, 9, 4),
(22, 'Vẽ sân thi đấu', 'vẽ sân thi đấu', 1, '2017-01-06', '2017-01-06 14:56:52.000000', 0, 35, 1, '2017-01-11', '2017-01-15', '3545715c5d835407049e5aa0c72d2343510d54', 1, 9, 4),
(23, 'Dựng web quảng bá game c', '', 1, '2017-01-06', '2017-01-06 14:57:55.000000', 25, 35, 1, '2017-01-01', '2017-01-09', '355682a77396b5611b1b1dfd6b163ae5cc9fa8', 1, 8, 4),
(24, 'Code Mobile Client', 'code mobile client', 54, '2017-01-09', '2017-01-09 09:15:46.000000', 0, 36, 1, '2016-12-15', '2017-02-10', '36111062d1e961229754af5fed59b131840962', 54, 6, 4),
(25, 'Vẽ đồ họa Mobile', 'vẽ đồ họa mobile', 56, '2017-01-09', '2017-01-09 09:18:47.000000', 0, 36, 1, '2017-01-02', '2017-01-24', '361648395e3ec9f430a9efd4b914ceab4a165', 56, 9, 3),
(26, 'Vẽ đồ họa webgame', 'vẽ đồ họa webgame', 56, '2017-01-09', '2017-01-09 09:19:26.000000', 0, 36, 1, '2017-01-02', '2017-01-24', '3615688e83532a4014eccf4493ea875d885f68', 56, 9, 3),
(27, 'Vẽ đồ họa web quảng bá', 'vẽ đồ họa web quảng bá', 56, '2017-01-09', '2017-01-09 09:20:06.000000', 100, 36, 1, '2017-01-02', '2017-01-07', '3647333ce321fd7222d94de984440854156d12', 56, 9, 3),
(28, 'Code Mobile Client', 'code mobile client', 62, '2017-01-09', '2017-01-09 22:21:56.000000', 0, 37, 1, '2016-12-15', '2017-02-10', '37828262d1e961229754af5fed59b131840962', 1, 6, 4),
(29, 'Code Webgame Client', 'Code Webgame Client', 62, '2017-01-09', '2017-01-10 15:53:47.000000', 0, 37, 1, '2017-01-03', '2017-04-30', '371478724362c1ed24db97c13c6c32e215e04b', 62, 6, 4),
(30, 'Vẽ đồ họa Mobile', '', 70, '2017-01-09', '2017-01-09 11:38:33.000000', 0, 37, 1, '2017-01-02', '2017-01-24', '3771498395e3ec9f430a9efd4b914ceab4a165', 70, 9, 3),
(31, 'Vẽ đồ họa webgame', '', 70, '2017-01-09', '2017-01-09 11:38:48.000000', 0, 37, 1, '2017-01-03', '2017-01-24', '3768408e83532a4014eccf4493ea875d885f68', 70, 9, 3),
(32, 'Dựng server game VKing', '', 60, '2017-01-09', '2017-01-09 11:40:01.000000', 0, 37, 1, '2017-01-01', '2017-02-10', '37219166ac93d6a582c14b97817137698d5206', 60, 7, 4),
(33, 'Chăm sóc khách hàng', '', 1, '2017-01-09', '2017-01-09 17:25:47.000000', 0, 38, 1, '2017-01-01', '2017-12-31', '381082f583f38b1c5b60e483daa817d948046a', 1, 10, 4),
(34, 'Chăm sóc khách hàng', '', 1, '2017-01-09', '2017-01-09 17:26:13.000000', 0, 38, 1, '2017-01-01', '2017-12-31', '382300f583f38b1c5b60e483daa817d948046a', 1, 7, 3),
(35, 'Chăm sóc khách hàng', '', 1, '2017-01-09', '2017-01-09 17:26:30.000000', 0, 38, 1, '2017-01-01', '2017-12-31', '384072f583f38b1c5b60e483daa817d948046a', 1, 10, 4),
(36, 'Chăm sóc khách hàng', '', 1, '2017-01-09', '2017-01-09 17:26:47.000000', 0, 38, 1, '2017-01-01', '2017-12-31', '3867f583f38b1c5b60e483daa817d948046a', 1, 10, 4),
(37, 'Vẽ con gà', 'Dự án vườn treo', 62, '2017-01-10', '2017-01-10 16:10:10.000000', 0, 37, 1, '2017-01-10', '2017-01-12', '373500596f932feb74cd842311e6b26dd5d09f', 62, 6, 3);

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
(10, 20, 52, '2017-01-05 09:35:48.000000'),
(11, 21, 47, '2017-01-06 14:55:44.000000'),
(12, 22, 47, '2017-01-06 14:56:52.000000'),
(13, 23, 51, '2017-01-06 14:57:55.000000'),
(14, 24, 55, '2017-01-09 09:15:46.000000'),
(15, 25, 56, '2017-01-09 09:18:47.000000'),
(16, 26, 56, '2017-01-09 09:19:26.000000'),
(17, 27, 56, '2017-01-09 09:20:06.000000'),
(18, 28, 65, '2017-01-09 22:21:56.000000'),
(19, 29, 65, '2017-01-10 15:53:47.000000'),
(20, 30, 70, '2017-01-09 11:38:33.000000'),
(21, 31, 70, '2017-01-09 11:38:48.000000'),
(22, 32, 61, '2017-01-09 11:40:01.000000'),
(23, 33, 72, '2017-01-09 17:25:47.000000'),
(24, 34, 60, '2017-01-09 17:26:13.000000'),
(25, 35, 73, '2017-01-09 17:26:30.000000'),
(26, 36, 74, '2017-01-09 17:26:47.000000'),
(27, 37, 62, '2017-01-10 16:10:10.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notification`
--

CREATE TABLE `tb_notification` (
  `id` int(64) NOT NULL,
  `code` text COLLATE utf8_unicode_ci,
  `create_by` int(8) DEFAULT NULL,
  `review_by` int(8) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `department_id` int(8) DEFAULT NULL,
  `review_status` int(8) DEFAULT NULL,
  `level_creater` int(8) DEFAULT NULL,
  `type` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `review_time` datetime DEFAULT NULL,
  `content_old` text COLLATE utf8_unicode_ci,
  `content_new` text COLLATE utf8_unicode_ci,
  `status` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_notification`
--

INSERT INTO `tb_notification` (`id`, `code`, `create_by`, `review_by`, `note`, `department_id`, `review_status`, `level_creater`, `type`, `create_time`, `review_time`, `content_old`, `content_new`, `status`) VALUES
(1, '3318f2fe69ef0dbbf4fc2498e26c5fc1d369', 47, 53, 'Bị ốm nên xin thêm thời gian làm', 9, 0, 4, 'c101', '2017-01-06 22:56:36', '2017-01-06 22:56:36', '2017-01-04^2017-01-11^eof', '2017-01-04^2017-01-15^Bị ốm nên xin thêm thời gian làm', 0),
(2, '33206921b933d14b7ed37e006c7bb9c5b1f7', 52, 53, 'Nghỉ ốm 1 ngày', 9, 0, 3, 'c102', '2017-01-07 22:04:18', '2017-01-07 22:04:18', '2017-01-05^2017-01-06^eof', '2017-01-05^2017-01-08^Nghỉ ốm 1 ngày', 0),
(3, '3422f9e88d0da1322d0cc370c863f8267849', 49, 53, 'Code khó', 8, 0, 4, 'c101', '2017-01-07 22:40:15', '2017-01-07 22:40:15', '2017-01-07^2017-01-08^eof', '2017-01-07^2017-01-09^Code khó', 0),
(4, '3319befbf305c3428396db22ba947c87d981', 52, 53, 'Cần thêm thời gian', 9, 0, 3, 'c102', '2017-01-07 23:22:20', '2017-01-07 23:22:20', '2017-01-04^2017-01-06^eof', '2017-01-04^2017-01-07^Cần thêm thời gian', 0),
(5, '33195103f5160e4746f8192f8951ca548403', 52, 53, 'Code khó', 9, 0, 3, 'c102', '2017-01-07 23:33:50', '2017-01-07 23:33:50', '2017-01-04^2017-01-07^eof', '2017-01-04^2017-01-08^Code khó', 0),
(6, '3729af9f334d0a10da9a8a14ae276aa6a18a', 68, 53, 'test', 6, 2, 4, 'c101', '2017-01-10 08:16:53', '2017-01-10 08:16:53', '2017-01-03^2017-01-07^eof', '2017-01-03^2017-01-10^test', 0),
(7, '3729f43fa261e41d422e231576ae2ed1e0ba', 68, 53, 'Em làm xong rồi', 6, 2, 4, 'c201', '2017-01-10 09:35:31', '2017-01-10 09:35:31', '2017-01-03^2017-01-05^eof', '1970-01-01^1970-01-01^Em làm xong rồi', 0),
(8, '3729f43fa261e41d422e231576ae2ed1e0ba', 68, 53, 'Em làm xong rồi', 6, 2, 4, 'c201', '2017-01-10 09:35:31', '2017-01-10 09:35:31', '2017-01-03^2017-01-05^eof', '1970-01-01^1970-01-01^Em làm xong rồi', 0),
(9, '3729f43fa261e41d422e231576ae2ed1e0ba', 68, 53, 'Em làm xong rồi', 6, 2, 4, 'c201', '2017-01-10 10:42:36', '2017-01-10 10:42:36', '0', '100^Em làm xong rồi', 0),
(10, '3729f43fa261e41d422e231576ae2ed1e0ba', 62, 62, 'Em làm xong rồi', 6, 2, 3, 'c201', '2017-01-10 13:05:03', '2017-01-10 13:05:03', '0', '100^Em làm xong rồi', 2),
(11, '3729f43fa261e41d422e231576ae2ed1e0ba', 62, 62, 'Em làm xong rồi', 6, 2, 3, 'c201', '2017-01-10 13:05:08', '2017-01-10 13:05:08', '0', '100^Em làm xong rồi', 2),
(12, '3729f43fa261e41d422e231576ae2ed1e0ba', 62, 62, 'Em làm xong rồi', 6, 2, 3, 'c201', '2017-01-10 13:07:31', '2017-01-10 13:07:31', '0', '100^Em làm xong rồi', 2),
(13, '3729f43fa261e41d422e231576ae2ed1e0ba', 62, 62, 'Em làm xong rồi', 6, 2, 3, 'c201', '2017-01-10 13:08:29', '2017-01-10 13:08:29', '0', '100^Em làm xong rồi', 2),
(14, '3729f43fa261e41d422e231576ae2ed1e0ba', 62, 62, 'Em làm xong rồi', 6, 2, 3, 'c201', '2017-01-10 13:08:34', '2017-01-10 13:08:34', '0', '100^Em làm xong rồi', 2),
(15, '3729f43fa261e41d422e231576ae2ed1e0ba', 62, 62, 'Em làm xong rồi', 6, 2, 3, 'c201', '2017-01-10 13:11:38', '2017-01-10 13:11:38', '0', '100^Em làm xong rồi', 2),
(16, '3729af9f334d0a10da9a8a14ae276aa6a18a', 68, 53, 'Em làm xong rồi', 6, 2, 4, 'c201', '2017-01-10 13:12:26', '2017-01-10 13:12:26', '0', '100^Em làm xong rồi', 0),
(17, '3729af9f334d0a10da9a8a14ae276aa6a18a', 62, 62, 'Em làm xong rồi', 6, 2, 3, 'c201', '2017-01-10 13:12:40', '2017-01-10 13:12:40', '0', '100^Em làm xong rồi', 2),
(18, '3729f43fa261e41d422e231576ae2ed1e0ba', 68, 53, 'Nhầm', 9, 2, 4, 'c201', '2017-01-10 13:22:10', '2017-01-10 13:22:10', '100', '0^Nhầm', 0),
(19, '3729f43fa261e41d422e231576ae2ed1e0ba', 68, 53, 'Nhầm', 6, 2, 4, 'c201', '2017-01-10 13:50:32', '2017-01-10 13:50:32', '100', '0^Nhầm', 0),
(20, '3729f43fa261e41d422e231576ae2ed1e0ba', 62, 62, 'Nhầm', 6, 2, 3, 'c201', '2017-01-10 13:50:54', '2017-01-10 13:50:54', '100', '0^Nhầm', 2),
(21, '3729f43fa261e41d422e231576ae2ed1e0ba', 68, 53, 'Em làm xong rồi', 6, 2, 4, 'c201', '2017-01-10 13:51:45', '2017-01-10 13:51:45', '0', '100^Em làm xong rồi', 0),
(22, '3729f43fa261e41d422e231576ae2ed1e0ba', 62, 62, 'Em làm xong rồi', 6, 2, 3, 'c201', '2017-01-10 13:52:03', '2017-01-10 13:52:03', '0', '100^Em làm xong rồi', 2),
(23, '3729f43fa261e41d422e231576ae2ed1e0ba', 68, 53, 'Nhầm', 6, 2, 4, 'c101', '2017-01-10 13:54:42', '2017-01-10 13:54:42', '2017-01-03^2017-01-05^eof', '2017-01-03^2017-01-06^Nhầm', 0),
(24, '37290e617ac8488794d9425400e3790e4e89', 68, 53, 'Code khó', 6, 2, 4, 'c101', '2017-01-10 13:55:00', '2017-01-10 13:55:00', '2017-01-09^2017-01-14^eof', '2017-01-09^2017-01-15^Code khó', 0),
(25, '37290e617ac8488794d9425400e3790e4e89', 68, 53, 'Em làm xong rồi', 6, 2, 4, 'c201', '2017-01-10 13:55:47', '2017-01-10 13:55:47', '0', '100^Em làm xong rồi', 0),
(26, '37290e617ac8488794d9425400e3790e4e89', 62, 62, 'Em làm xong rồi', 6, 2, 3, 'c201', '2017-01-10 13:56:01', '2017-01-10 13:56:01', '0', '100^Em làm xong rồi', 2),
(27, '37290e617ac8488794d9425400e3790e4e89', 62, 62, 'Code khó', 6, 2, 3, 'c101', '2017-01-10 14:56:04', '2017-01-10 14:56:04', '2017-01-09^2017-01-14^eof', '2017-01-09^2017-01-15^Code khó', 2),
(28, '3729f43fa261e41d422e231576ae2ed1e0ba', 62, 62, 'Nhầm', 6, 2, 3, 'c101', '2017-01-10 14:56:15', '2017-01-10 14:56:15', '2017-01-03^2017-01-05^eof', '2017-01-03^2017-01-06^Nhầm', 2),
(29, '3729f43fa261e41d422e231576ae2ed1e0ba', 68, 53, 'Em làm xong rồi', 6, 2, 4, 'c201', '2017-01-10 15:35:02', '2017-01-10 15:35:02', '100', '0^Em làm xong rồi', 0),
(30, '3729f43fa261e41d422e231576ae2ed1e0ba', 62, 62, 'Em làm xong rồi', 6, 2, 3, 'c201', '2017-01-10 15:35:30', '2017-01-10 15:35:30', '100', '0^Em làm xong rồi', 2),
(31, '3729f43fa261e41d422e231576ae2ed1e0ba', 68, 53, 'Em làm xong rồi', 6, 2, 4, 'c201', '2017-01-10 15:38:34', '2017-01-10 15:38:34', '0', '100^Em làm xong rồi', 0),
(32, '3729f43fa261e41d422e231576ae2ed1e0ba', 62, 62, 'Em làm xong rồi', 6, 2, 3, 'c201', '2017-01-10 15:38:48', '2017-01-10 15:38:48', '0', '100^Em làm xong rồi', 2),
(33, '37296e61dc39c627b2dccc8d6eab43db1b8e', 68, 53, 'Em làm xong rồi', 6, 2, 4, 'c201', '2017-01-10 15:40:03', '2017-01-10 15:40:03', '0', '100^Em làm xong rồi', 0),
(34, '37296e61dc39c627b2dccc8d6eab43db1b8e', 62, 62, 'Em làm xong rồi', 6, 2, 3, 'c201', '2017-01-10 15:40:14', '2017-01-10 15:40:14', '0', '100^Em làm xong rồi', 2),
(35, '3729924fa302f08df2ced4b0d2cdd8b5580b', 65, 53, 'Em làm xong rồi', 6, 2, 4, 'c201', '2017-01-10 16:01:25', '2017-01-10 16:01:25', '0', '100^Em làm xong rồi', 0),
(36, '3729924fa302f08df2ced4b0d2cdd8b5580b', 62, 62, 'Em làm xong rồi', 6, 2, 3, 'c201', '2017-01-10 16:01:47', '2017-01-10 16:01:47', '0', '100^Em làm xong rồi', 2);

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
(37, 'Game Bài VKing', 'Game bài VKing', '2017-01-09', 1, '2016-12-15', '2017-02-15', '1', NULL, 3, 1, '2017-01-09 22:17:05.000000', 'vking'),
(38, 'Vua bài', 'Vận hành game Vua bài', '2017-01-09', 1, '2017-01-09', '2017-12-31', '1', NULL, 0, 1, '2017-01-09 22:16:50.000000', 'vb88');

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
(196, NULL, 33, 50, '2017-01-04 20:33:03.000000'),
(197, NULL, 34, 47, '2017-01-06 14:36:32.000000'),
(198, NULL, 34, 51, '2017-01-06 14:36:32.000000'),
(199, NULL, 34, 50, '2017-01-06 14:36:32.000000'),
(200, NULL, 35, 47, '2017-01-06 14:47:59.000000'),
(201, NULL, 35, 51, '2017-01-06 14:47:59.000000'),
(202, NULL, 35, 50, '2017-01-06 14:47:59.000000'),
(203, NULL, 36, 56, '2017-01-09 09:00:07.000000'),
(204, NULL, 36, 54, '2017-01-09 09:00:07.000000'),
(218, NULL, 38, 61, '2017-01-09 22:16:50.000000'),
(219, NULL, 38, 62, '2017-01-09 22:16:50.000000'),
(220, NULL, 38, 73, '2017-01-09 22:16:50.000000'),
(221, NULL, 38, 72, '2017-01-09 22:16:50.000000'),
(222, NULL, 38, 74, '2017-01-09 22:16:50.000000'),
(223, NULL, 37, 61, '2017-01-09 22:17:05.000000'),
(224, NULL, 37, 62, '2017-01-09 22:17:05.000000'),
(225, NULL, 37, 65, '2017-01-09 22:17:05.000000'),
(226, NULL, 37, 68, '2017-01-09 22:17:05.000000'),
(227, NULL, 37, 63, '2017-01-09 22:17:05.000000'),
(228, NULL, 37, 71, '2017-01-09 22:17:05.000000');

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
(106, 10, 33, 30, '2017-01-04 20:33:03.000000'),
(107, 9, 34, 0, '2017-01-06 14:36:32.000000'),
(108, 8, 34, 0, '2017-01-06 14:36:32.000000'),
(109, 10, 34, 0, '2017-01-06 14:36:32.000000'),
(110, 9, 35, 0, '2017-01-06 14:47:59.000000'),
(111, 8, 35, 0, '2017-01-06 14:47:59.000000'),
(112, 10, 35, 0, '2017-01-06 14:47:59.000000'),
(113, 9, 36, 0, '2017-01-09 09:00:07.000000'),
(114, 6, 36, 0, '2017-01-09 09:00:07.000000'),
(159, 7, 37, 25, '2017-01-09 22:24:22.000000'),
(160, 6, 37, 25, '2017-01-09 22:24:22.000000'),
(161, 8, 37, 25, '2017-01-09 22:24:22.000000'),
(162, 9, 37, 25, '2017-01-09 22:24:22.000000'),
(163, 7, 38, 30, '2017-01-10 08:25:28.000000'),
(164, 6, 38, 40, '2017-01-10 08:25:28.000000'),
(165, 10, 38, 30, '2017-01-10 08:25:28.000000');

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
(74, 53, 1, ''),
(88, 61, 7, ''),
(93, 62, 6, ''),
(94, 63, 8, ''),
(95, 64, 8, ''),
(96, 65, 6, ''),
(97, 66, 6, ''),
(98, 67, 6, ''),
(100, 69, 6, ''),
(102, 71, 9, ''),
(104, 70, 9, ''),
(105, 60, 7, ''),
(106, 60, 10, ''),
(107, 73, 10, ''),
(108, 72, 10, ''),
(109, 74, 10, ''),
(110, 68, 6, '');

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
(14, 'Vẽ cánh con gà', 'Vẽ cánh con gà', 47, '2017-01-04', '2017-01-04', '2017-01-04', 100, 18, '3729f43fa261e41d422e231576ae2ed1e0b1', 33),
(15, 'Vẽ đầu con gà', 'Dự án babylon', 47, '2017-01-04', '2017-01-04', '2017-01-11', 0, 18, '3318f2fe69ef0dbbf4fc2498e26c5fc1d369', 33),
(16, 'Giám sát vẽ đầu gà', 'Giám sát vẽ đầu gà', 52, '2017-01-04', '2017-01-04', '2017-01-07', 0, 19, '33195103f5160e4746f8192f8951ca548403', 33),
(17, 'Giám sát vẽ chân gà', 'Giám sát vẽ chân gà', 52, '2017-01-04', '2017-01-04', '2017-01-07', 0, 19, '3319befbf305c3428396db22ba947c87d981', 33),
(18, 'Giám sát vẽ chân chó', 'Giám sát vẽ chân chó', 52, '2017-01-05', '2017-01-05', '2017-01-06', 0, 20, '33206921b933d14b7ed37e006c7bb9c5b1f7', 33),
(19, 'Dựng DB', 'test', 51, '2017-01-06', '2017-01-01', '2017-01-10', 0, 23, '3523e85a23b1901a9e8de1727e860f4347ef', 35),
(20, 'Dựng web', '', 51, '2017-01-06', '2017-01-03', '2017-01-07', 0, 23, '3523a9c19a57038abac45cf7229b9122b08a', 35),
(21, 'a', 'a', 51, '2017-01-06', '2017-01-06', '2017-01-06', 100, 23, '3729f43fa261e41d422e231576ae2ed1e0b2', 35),
(22, 'Làm giao diện', 'ahihi', 51, '2017-01-06', '2017-01-06', '2017-01-09', 0, 23, '3523c3d88c51e1488941c33d83cae13e3736', 35),
(23, 'Vẽ giao diện web', '', 56, '2017-01-09', '2017-01-02', '2017-01-07', 100, 27, '3729f43fa261e41d422e231576ae2ed1e0b4', 36),
(24, 'Code màn login', '', 68, '2017-01-09', '2017-01-03', '2017-01-06', 100, 29, '3729f43fa261e41d422e231576ae2ed1e0ba', 37),
(25, 'Code game TLMN', '', 68, '2017-01-09', '2017-01-03', '2017-01-07', 100, 29, '3729af9f334d0a10da9a8a14ae276aa6a18a', 37),
(26, 'Code game TLMN Solo', '', 68, '2017-01-09', '2017-01-09', '2017-01-15', 100, 29, '37290e617ac8488794d9425400e3790e4e89', 37),
(27, 'Code game Phỏm', '', 68, '2017-01-09', '2017-01-16', '2017-01-21', 100, 29, '37296e61dc39c627b2dccc8d6eab43db1b8e', 37),
(28, 'Code game Xóc đĩa', '', 68, '2017-01-09', '2017-01-23', '2017-01-28', 0, 29, '3729989c15037f95dd15e858becad6f10ed2', 37),
(29, 'Code game Poker', '', 68, '2017-01-09', '2017-01-30', '2017-02-04', 0, 29, '3729016013817c6e803297eb3e106259f110', 37),
(30, 'Code game Sâm', '', 68, '2017-01-09', '2017-02-06', '2017-02-11', 0, 29, '3729ff22fc64c7689191f5ab91f2503deddf', 37),
(31, 'Code game Mậu Binh', '', 68, '2017-01-09', '2017-02-13', '2017-02-18', 0, 29, '3729e671296914b8df3c13bebb01dfb2808d', 37),
(32, 'Code game Xì tố', '', 68, '2017-01-09', '2017-02-20', '2017-02-25', 0, 29, '372992e5c9b9d102998288eac6ed6e1ad116', 37),
(33, 'Code game Liêng', '', 68, '2017-01-09', '2017-02-27', '2017-03-04', 0, 29, '3729694ddd04d5d247f17c77f85dbafcbcba', 37),
(34, 'Code minigame Tài Xỉu', '', 68, '2017-01-09', '2017-03-06', '2017-03-11', 0, 29, '3729cd30a8b7c9b58986f027caad3a17907e', 37),
(35, 'Code minigame Xèng', '', 68, '2017-01-09', '2017-03-13', '2017-03-18', 0, 29, '37295547163f4739d0e8b1ae4f5e6d55dc8b', 37),
(36, 'Code minigame Bầu cua', '', 68, '2017-01-09', '2017-03-20', '2017-03-25', 0, 29, '37298b23c1716ecfd95ba62a3d3e7d1cdc47', 37),
(37, 'Code minigame Poker mini', '', 68, '2017-01-09', '2017-03-27', '2017-04-01', 0, 29, '37295c279bb4e4bab0d5792db8dfb139af21', 37),
(38, 'duyệt thưởng', 'trgdfbhdfh', 72, '2017-01-09', '2017-01-01', '2017-12-31', 0, 33, '3833b84676c15dad64d9e427b2f725d2c349', 38),
(39, 'Code game srv', 'Dự án vườn treo', 65, '2017-01-10', '2017-01-10', '2017-01-19', 100, 29, '3729924fa302f08df2ced4b0d2cdd8b5580b', 37),
(40, 'Vẽ mỏ gà', 'ahihi', 65, '2017-01-10', '2017-01-10', '2017-01-12', 0, 29, '3729d23b57de5a4983a0f7ac8469392fada4', 37),
(41, 'Vẽ mỏ gà', 'ahihi', 65, '2017-01-10', '2017-01-10', '2017-01-12', 0, 29, '3729d23b57de5a4983a0f7ac8469392fada4', 37),
(42, 'Vẽ mỏ gà', 'Dự án vườn treo', 65, '2017-01-10', '2017-01-10', '2017-01-10', 0, 29, '372940ec161ce3374c375a7c63115950cffa', 37),
(43, 'Vẽ mỏ gà', 'Dự án vườn treo', 62, '2017-01-10', '2017-01-10', '2017-01-12', 0, 37, '37371531945d14d89b753e464489bd6e8b81', 37);

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
(53, 'banlanhdao', '25d55ad283aa400af464c76d713c07ad', '2017-01-05', 1, 2, NULL, NULL),
(60, 'cuongnv', '25d55ad283aa400af464c76d713c07ad', '2017-01-09', 1, 3, '2017-01-09 16:45:58.000000', 1),
(61, 'quangnm', '25d55ad283aa400af464c76d713c07ad', '2017-01-09', 1, 4, NULL, NULL),
(62, 'thanhnb', '25d55ad283aa400af464c76d713c07ad', '2017-01-09', 1, 3, '2017-01-09 09:54:24.000000', 1),
(63, 'thinhlv', '25d55ad283aa400af464c76d713c07ad', '2017-01-09', 1, 4, NULL, NULL),
(64, 'huanvm', '25d55ad283aa400af464c76d713c07ad', '2017-01-09', 1, 4, NULL, NULL),
(65, 'tuanvn', '25d55ad283aa400af464c76d713c07ad', '2017-01-09', 1, 4, NULL, NULL),
(66, 'khoand', '25d55ad283aa400af464c76d713c07ad', '2017-01-09', 1, 4, NULL, NULL),
(67, 'tuanpn', '25d55ad283aa400af464c76d713c07ad', '2017-01-09', 1, 4, NULL, NULL),
(68, 'kiennt', '25d55ad283aa400af464c76d713c07ad', '2017-01-09', 0, 4, '2017-01-10 15:56:15.000000', 1),
(69, 'huynv', '25d55ad283aa400af464c76d713c07ad', '2017-01-09', 1, 4, NULL, NULL),
(70, 'hungtt', '25d55ad283aa400af464c76d713c07ad', '2017-01-09', 1, 3, '2017-01-09 16:41:50.000000', 1),
(71, 'hoangnh', '25d55ad283aa400af464c76d713c07ad', '2017-01-09', 1, 4, NULL, NULL),
(72, 'phuonglt', '25d55ad283aa400af464c76d713c07ad', '2017-01-09', 1, 4, '2017-01-09 16:51:10.000000', 1),
(73, 'huonghtt', '25d55ad283aa400af464c76d713c07ad', '2017-01-09', 1, 4, NULL, NULL),
(74, 'thanhld', '25d55ad283aa400af464c76d713c07ad', '2017-01-09', 1, 4, NULL, NULL);

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
-- Indexes for table `tb_notification`
--
ALTER TABLE `tb_notification`
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
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_department`
--
ALTER TABLE `tb_department`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `tb_mission`
--
ALTER TABLE `tb_mission`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tb_mission_user`
--
ALTER TABLE `tb_mission_user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_notification`
--
ALTER TABLE `tb_notification`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tb_project_user`
--
ALTER TABLE `tb_project_user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;
--
-- AUTO_INCREMENT for table `tb_proportion_department`
--
ALTER TABLE `tb_proportion_department`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `tb_task`
--
ALTER TABLE `tb_task`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
