-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 14, 2020 at 02:10 AM
-- Server version: 5.7.31-log
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
-- Database: `banksam4_banksampah_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_menu`
--

CREATE TABLE `access_menu` (
  `access_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_menu`
--

INSERT INTO `access_menu` (`access_id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 5),
(4, 1, 4),
(5, 2, 3),
(6, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `active_quest`
--

CREATE TABLE `active_quest` (
  `active_quest_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quest_name` varchar(128) NOT NULL,
  `quest_points` int(11) NOT NULL,
  `trash_size` float NOT NULL,
  `date_started` int(12) NOT NULL,
  `date_ended` int(12) NOT NULL,
  `stat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_quest`
--

INSERT INTO `active_quest` (`active_quest_id`, `quest_id`, `user_id`, `quest_name`, `quest_points`, `trash_size`, `date_started`, `date_ended`, `stat`) VALUES
(1, 1, 3, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596989217, 0, '');

--
-- Triggers `active_quest`
--
DELIMITER $$
CREATE TRIGGER `logquest_trigger` BEFORE DELETE ON `active_quest` FOR EACH ROW BEGIN
 INSERT INTO log_quest
 SET active_quest_id = OLD.active_quest_id,
 quest_id = OLD.quest_id,
 user_id = OLD.user_id,
 quest_name = OLD.quest_name,
 quest_points = OLD.quest_points,
 date_started = OLD.date_started,
 date_ended = OLD.date_ended,
 stat = OLD.stat,
 trash_size = OLD.trash_size;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_quest`
--

CREATE TABLE `log_quest` (
  `log_quest_id` int(11) NOT NULL,
  `active_quest_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quest_name` varchar(128) NOT NULL,
  `quest_points` int(11) NOT NULL,
  `trash_size` float NOT NULL,
  `date_started` int(12) NOT NULL,
  `date_ended` int(12) NOT NULL,
  `stat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_quest`
--

INSERT INTO `log_quest` (`log_quest_id`, `active_quest_id`, `quest_id`, `user_id`, `quest_name`, `quest_points`, `trash_size`, `date_started`, `date_ended`, `stat`) VALUES
(1, 2, 1, 9, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1595583647, 1596213647, 'Selesai'),
(2, 3, 2, 9, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1595584647, 1596213847, 'Selesai'),
(3, 5, 2, 9, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596280847, 1596813847, 'Selesai'),
(4, 4, 1, 9, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596280947, 1596813977, 'Selesai'),
(5, 6, 1, 10, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596996293, 1596996326, 'Selesai'),
(6, 7, 2, 10, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596996297, 1596996333, 'Selesai'),
(7, 8, 1, 10, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596996372, 1596996405, 'Selesai'),
(8, 9, 2, 10, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596996379, 1596996414, 'Selesai'),
(9, 10, 2, 10, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596996464, 1596996477, 'Selesai'),
(10, 13, 1, 11, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596996516, 1596996531, 'Selesai'),
(11, 12, 2, 11, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596996513, 1596996537, 'Selesai'),
(12, 11, 1, 11, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596996509, 1596996546, 'Selesai'),
(13, 14, 1, 12, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596996677, 1596996712, 'Selesai'),
(14, 15, 2, 12, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596996681, 1596996717, 'Selesai'),
(15, 16, 1, 12, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596996686, 1596996727, 'Selesai'),
(16, 17, 2, 12, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596996690, 1596996732, 'Selesai'),
(17, 18, 1, 13, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596996792, 1596996875, 'Selesai'),
(18, 19, 2, 13, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596996797, 1596996880, 'Selesai'),
(19, 20, 1, 13, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596996806, 1596996887, 'Selesai'),
(20, 21, 2, 13, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596996809, 1596996892, 'Selesai'),
(21, 22, 1, 14, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596996959, 1596996988, 'Gagal'),
(22, 23, 2, 14, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596996963, 1596997019, 'Selesai'),
(23, 24, 1, 14, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596996968, 1596997035, 'Selesai'),
(24, 25, 2, 14, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596996972, 1596997057, 'Selesai'),
(25, 26, 1, 15, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596997134, 1596997162, 'Selesai'),
(26, 27, 2, 15, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596997138, 1596997167, 'Selesai'),
(27, 28, 1, 15, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596997142, 1596997172, 'Selesai'),
(28, 29, 1, 15, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596997153, 1596997177, 'Selesai'),
(29, 30, 1, 16, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596997309, 1596997328, 'Selesai'),
(30, 31, 2, 16, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596997313, 1596997334, 'Selesai'),
(31, 32, 2, 16, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596997317, 1596997339, 'Selesai'),
(32, 35, 1, 17, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596997420, 1596997435, 'Selesai'),
(33, 34, 2, 17, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596997403, 1596997440, 'Selesai'),
(34, 33, 1, 17, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596997400, 1596997454, 'Selesai'),
(35, 39, 2, 18, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596997489, 1596997504, 'Selesai'),
(36, 38, 1, 18, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596997486, 1596997515, 'Selesai'),
(37, 37, 2, 18, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596997482, 1596997531, 'Selesai'),
(38, 36, 1, 18, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596997479, 1596997537, 'Selesai'),
(39, 40, 1, 19, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596997631, 1596997659, 'Selesai'),
(40, 41, 2, 19, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596997635, 1596997673, 'Selesai'),
(41, 42, 1, 19, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596997638, 1596997679, 'Selesai'),
(42, 43, 2, 19, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596997642, 1596997687, 'Selesai'),
(43, 44, 1, 20, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596997840, 1596997873, 'Selesai'),
(44, 45, 2, 20, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596997845, 1596997898, 'Selesai'),
(45, 47, 2, 20, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596997863, 1596997911, 'Selesai'),
(46, 46, 1, 20, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596997859, 1596997921, 'Selesai'),
(47, 48, 1, 21, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998000, 1596998021, 'Selesai'),
(48, 49, 2, 21, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998004, 1596998027, 'Selesai'),
(49, 50, 1, 21, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998007, 1596998033, 'Selesai'),
(50, 51, 1, 21, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998011, 1596998040, 'Selesai'),
(51, 52, 1, 22, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998086, 1596998129, 'Selesai'),
(52, 53, 2, 22, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998090, 1596998134, 'Selesai'),
(53, 54, 2, 22, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998096, 1596998140, 'Selesai'),
(54, 55, 1, 23, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998203, 1596998236, 'Selesai'),
(55, 56, 2, 23, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998207, 1596998243, 'Selesai'),
(56, 57, 1, 23, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998213, 1596998247, 'Selesai'),
(57, 58, 2, 23, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998216, 1596998257, 'Selesai'),
(58, 59, 1, 24, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998302, 1596998320, 'Selesai'),
(59, 60, 2, 24, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998305, 1596998326, 'Selesai'),
(60, 61, 1, 24, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998308, 1596998332, 'Selesai'),
(61, 62, 2, 24, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998312, 1596998337, 'Selesai'),
(62, 63, 1, 25, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998358, 1596998385, 'Selesai'),
(63, 64, 2, 25, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998362, 1596998390, 'Selesai'),
(64, 65, 1, 25, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998365, 1596998396, 'Selesai'),
(65, 66, 2, 25, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998368, 1596998404, 'Selesai'),
(66, 67, 1, 26, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998449, 1596998500, 'Selesai'),
(67, 68, 2, 26, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998452, 1596998505, 'Selesai'),
(68, 69, 1, 26, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998455, 1596998509, 'Selesai'),
(69, 70, 2, 26, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998458, 1596998514, 'Selesai'),
(70, 71, 2, 26, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998463, 1596998519, 'Selesai'),
(71, 72, 1, 27, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998565, 1596998584, 'Selesai'),
(72, 73, 2, 27, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998569, 1596998589, 'Selesai'),
(73, 74, 2, 27, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998574, 1596998594, 'Selesai'),
(74, 75, 1, 28, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998679, 1596998697, 'Selesai'),
(75, 76, 2, 28, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998683, 1596998702, 'Selesai'),
(76, 77, 1, 28, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998688, 1596998707, 'Selesai'),
(77, 78, 1, 29, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998771, 1596998791, 'Selesai'),
(78, 79, 2, 29, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998775, 1596998796, 'Selesai'),
(79, 80, 2, 29, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998778, 1596998801, 'Selesai'),
(80, 81, 2, 29, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998782, 1596998812, 'Selesai'),
(81, 82, 1, 30, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998870, 1596998892, 'Selesai'),
(82, 83, 2, 30, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998874, 1596998898, 'Selesai'),
(83, 84, 1, 30, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998880, 1596998907, 'Selesai'),
(84, 85, 1, 31, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998942, 1596999001, 'Selesai'),
(85, 86, 2, 31, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998946, 1596999006, 'Selesai'),
(86, 87, 1, 31, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596998950, 1596999011, 'Selesai'),
(87, 88, 2, 31, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596998953, 1596999016, 'Selesai'),
(88, 89, 1, 32, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596999066, 1596999128, 'Selesai'),
(89, 90, 2, 32, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596999070, 1596999134, 'Selesai'),
(90, 91, 1, 32, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596999074, 1596999140, 'Selesai'),
(91, 92, 2, 32, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596999078, 1596999145, 'Selesai'),
(92, 93, 1, 33, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596999183, 1596999217, 'Selesai'),
(93, 94, 2, 33, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596999187, 1596999222, 'Selesai'),
(94, 95, 1, 33, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596999190, 1596999227, 'Selesai'),
(95, 96, 2, 33, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596999197, 1596999231, 'Selesai'),
(96, 97, 1, 34, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596999258, 1596999280, 'Selesai'),
(97, 98, 2, 34, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596999261, 1596999284, 'Selesai'),
(98, 99, 2, 34, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596999264, 1596999288, 'Selesai'),
(99, 100, 2, 34, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596999268, 1596999297, 'Selesai'),
(100, 101, 1, 35, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596999318, 1596999378, 'Selesai'),
(101, 102, 2, 35, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596999322, 1596999384, 'Selesai'),
(102, 103, 1, 35, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596999326, 1596999389, 'Selesai'),
(103, 104, 2, 35, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596999332, 1596999393, 'Selesai'),
(104, 105, 1, 35, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596999369, 1596999399, 'Selesai'),
(105, 106, 1, 36, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596999453, 1596999481, 'Selesai'),
(106, 107, 2, 36, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596999456, 1596999486, 'Selesai'),
(107, 108, 1, 37, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596999534, 1596999556, 'Selesai'),
(108, 109, 2, 37, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596999538, 1596999561, 'Selesai'),
(109, 110, 1, 37, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596999542, 1596999566, 'Selesai'),
(110, 111, 2, 37, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596999546, 1596999571, 'Selesai'),
(111, 112, 1, 38, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596999597, 1596999624, 'Selesai'),
(112, 113, 2, 38, 'Kumpulkan 0,2 Kg Botol Plastik', 3, 0.2, 1596999601, 1596999638, 'Selesai'),
(113, 114, 1, 38, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1596999609, 1596999643, 'Selesai'),
(114, 115, 1, 3, 'Kumpulkan 0,2 Kg Sampah Kaleng', 5, 0.2, 1597029792, 1597030221, 'Selesai'),
(115, 116, 12, 3, 'Kumpulkan 10 Kg botol plastik', 100, 5, 1597030458, 1597030481, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_code` varchar(8) NOT NULL,
  `menu_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_code`, `menu_name`) VALUES
(1, 'MENU01', 'Developer'),
(2, 'MENU02', 'Admin'),
(3, 'MENU03', 'Manage Data'),
(4, 'MENU04', 'Menu Management'),
(5, 'MENU05', 'Menu Nasabah'),
(6, 'MENU06', 'Transaction');

-- --------------------------------------------------------

--
-- Table structure for table `quest`
--

CREATE TABLE `quest` (
  `quest_id` int(11) NOT NULL,
  `quest_code` varchar(8) NOT NULL,
  `quest_name` varchar(128) NOT NULL,
  `points` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  `min_level` int(11) NOT NULL,
  `info` varchar(128) NOT NULL,
  `trash_name` varchar(50) NOT NULL,
  `quest_trash_size` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quest`
--

INSERT INTO `quest` (`quest_id`, `quest_code`, `quest_name`, `points`, `image`, `date_created`, `min_level`, `info`, `trash_name`, `quest_trash_size`) VALUES
(1, 'Q01', 'Kumpulkan 0,2 Kg Sampah Kaleng', 3, 'kaleng.jpg', 0, 1, '', 'Kaleng', 0.2),
(2, 'Q02', 'Kumpulkan 0,2 Kg Botol Plastik', 6, 'botol.jpg', 0, 1, '', 'Botol Plastik', 0.2),
(3, 'Q03', 'Kumpulkan 1 Kg Besi', 5, 'besi.jpg', 0, 2, '', 'Besi', 1),
(4, 'Q04', 'Kumpulkan 0,8 Kg Koran Bekas', 5, 'koranbekas.jpg', 0, 2, '', 'Koran Bekas', 0.8),
(5, 'Q05', 'Kumpulkan 2 Kg Kaleng', 6, 'kaleng.jpg', 0, 3, '', 'Kaleng', 2),
(6, 'Q06', 'Kumpulkan 1,5 Kg Botol Plastik', 7, 'botol.jpg', 0, 3, '', 'Botol Plastik', 1.5),
(7, 'Q07', 'Kumpulkan 2 Kg Besi', 7, 'besi.jpg', 0, 3, '', 'Besi', 2),
(8, 'Q08', 'Kumpulkan 4 Kg Kaleng', 8, 'kaleng.jpg', 0, 4, '', 'Kaleng', 4),
(9, 'Q09', 'Kumpulkan 5 Kg Besi', 9, 'besi.jpg', 0, 4, '', 'Besi', 5),
(10, 'Q10', 'Kumpulkan 8 Kg Kaleng', 11, 'kaleng.jpg', 0, 5, '', 'Kaleng', 8),
(11, 'Q11', 'Kumpulkan 7 Kg Botol Plastik', 12, 'botol.jpg', 0, 5, '', 'Botol Plastik', 7),
(12, 'Q12', 'Kumpulkan 10 Kg botol plastik', 100, '', 0, 1, '', 'Botol Plastik', 5);

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `submenu_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`submenu_id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'developer', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(3, 3, 'Nasabah', 'nasabah', 'fas fa-fw fa-tachometer-alt', 1),
(4, 4, 'Manage Menu', 'menu', 'fas fa-fw fa-folder', 1),
(5, 4, 'Manage Submenu', 'menu/submenu', 'fas fa-fw fa-folder', 1),
(6, 3, 'Sampah', 'sampah', 'fas fa-fw fa-folder', 1),
(7, 3, 'Quest', 'quest', 'fas fa-fw fa-folder', 1),
(8, 5, 'Quests', 'quests', 'fa fa-tasks', 1),
(9, 5, 'Leaderboards', 'leaderboards', 'fa fa-trophy', 1),
(10, 2, 'Quest Verification', 'verification', 'fas fa-fw fa-folder', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trash`
--

CREATE TABLE `trash` (
  `trash_id` int(11) NOT NULL,
  `trash_code` varchar(8) NOT NULL,
  `trash_name` varchar(128) NOT NULL,
  `trash_type` varchar(50) NOT NULL,
  `image` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `size` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trash`
--

INSERT INTO `trash` (`trash_id`, `trash_code`, `trash_name`, `trash_type`, `image`, `date_created`, `price`, `size`) VALUES
(1, 'S01', 'Kaleng', 'Besi', 'kaleng.jpg', 0, 250, 88.3),
(2, 'S02', 'Botol Plastik', 'Plastik', 'botol.jpg', 0, 4500, 103.7),
(3, 'S03', 'Koran Bekas', 'Kertas', 'koranbekas.jpg', 0, 1300, 0),
(4, 'S04', 'Besi', 'Besi', 'besi.jpg', 0, 2000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `date_created` int(12) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL,
  `rekening_id` varchar(8) NOT NULL,
  `user_points` int(11) NOT NULL,
  `address` varchar(128) NOT NULL,
  `balance` int(11) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `user_level` int(11) NOT NULL,
  `user_trash_size` float NOT NULL,
  `user_dummy_points` int(11) NOT NULL,
  `user_progress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `image`, `date_created`, `fullname`, `role_id`, `rekening_id`, `user_points`, `address`, `balance`, `phone_number`, `user_level`, `user_trash_size`, `user_dummy_points`, `user_progress`) VALUES
(1, 'developer', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.jpg', 1595553647, 'Master', 1, '', 0, '', 0, '', 1, 0, 100, 0),
(2, 'dwicky', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.jpg', 1595553647, 'Dwicky', 2, '', 0, '', 0, '', 1, 0, 100, 0),
(3, 'randakurniadi', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Randa Kurniadi', 3, '00000001', 105, 'Jl. Dipatiukur', 49750, '081394105086', 2, 12, 200, 5),
(4, 'aisyah', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default1.png', 1595553647, 'Aisyah', 3, '00000002', 100, 'Cisitu lama', 24200, '082192038123', 2, 6, 200, 0),
(9, 'rizki', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Rizki Akbar Raditya', 3, '00000003', 16, 'Jl. Cisitu Lama VIII No.7, Dago, Kecamatan Coblong, Kota Bandung', 13525, '082288412163', 1, 6.5, 100, 16),
(10, 'nasabah4', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Adi Sumito', 3, '00000004', 19, 'Gg. Cisitu Lama VII No.31/154b, Dago, Kecamatan Coblong', 21475, '087779426540', 1, 7.7, 100, 19),
(11, 'nasabah5', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Effi Hidayaningsih', 3, '00000005', 13, 'Jl. Cisitu Indah 2 No.17, Dago, Kecamatan Coblong, Kota Bandung', 6825, '089663247298', 1, 3.5, 100, 13),
(12, 'nasabah6', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Hendra Kusnadi', 3, '00000006', 16, 'Jl. Bukit Dago Selatan No.29, Dago, Kecamatan Coblong, Kota Bandung', 10425, '081371931232', 1, 4.3, 100, 16),
(13, 'nasabah7', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Rizal Lasmana', 3, '00000007', 16, 'Jl. Cisitu Indah VI No.18, Dago, Kecamatan Coblong, Kota Bandung', 8600, '082113064873', 1, 3.8, 100, 16),
(14, 'nasabah8', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Diyah Puspita Sari', 3, '00000008', 11, 'Jl. Cisitu Lama No.45, Dago, Kecamatan Coblong, Kota Bandung', 13725, '082299253457', 1, 3.9, 100, 11),
(15, 'nasabah9', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Muhamad Rian Syahputra', 3, '00000009', 18, 'Jl. Cisitu Indah Baru No.6, Dago, Kecamatan Coblong, Kota Bandung', 6025, '081223990566', 1, 5.4, 100, 18),
(16, 'nasabah10', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Endang Kamil', 3, '00000010', 11, 'Jl. Cisitu Lama No.10, Dago, Kecamatan Coblong, Kota Bandung', 21000, '082217638081', 1, 7.5, 100, 11),
(17, 'nasabah11', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Maman Suryaman', 3, '00000011', 13, 'Jl. Dago Asri Raya No.15, Dago, Kecamatan Coblong, Kota Bandung', 4275, '085317621469', 1, 3.5, 100, 13),
(18, 'nasabah12', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Abdul Aziz', 3, '00000012', 16, 'Jl. Sangkuriang No.7, Dago, Kecamatan Coblong, Kota Bandung', 23475, '081931250977', 1, 8.9, 100, 16),
(19, 'nasabah13', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Rahmat Basuki', 3, '00000013', 16, 'JL. Cisitu Lama, No. 11 B, Dago, Coblong', 14000, '082311178401', 1, 6.7, 100, 16),
(20, 'nasabah14', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Irawan Widjaja', 3, '00000014', 16, 'Jl. Ir. H. Juanda No.193, Lebakgede, Kecamatan Coblong', 10050, '088971531923', 1, 4.5, 100, 16),
(21, 'nasabah15', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Bayu Prabowo', 3, '00000015', 18, 'Jl. Cisitu Baru No.46, Dago, Kecamatan Coblong, Kota Bandung', 5075, '082177086428', 1, 5, 100, 18),
(22, 'nasabah16', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Adi Yusuf', 3, '00000016', 11, 'Jl. Cisitu Lama No.86, Dago, Kecamatan Coblong, Kota Bandung', 16500, '089680843261', 1, 4.8, 100, 11),
(23, 'nasabah17', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Maria Karmila', 3, '00000017', 16, 'Jl. Ir. H. Juanda No.374 A, Dago, Kecamatan Coblong, Kota Bandung', 16925, '087800086675', 1, 6.5, 100, 16),
(24, 'nasabah18', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Nuryana', 3, '00000018', 16, 'Jl. Cisitu Lama No.27, Dago, Kecamatan Coblong, Kota Bandung', 18050, '081220068031', 1, 7.6, 100, 16),
(25, 'nasabah19', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Nurdin Hasim', 3, '00000019', 16, 'Jl. Cisitu Indah VI No.186, Dago, Kecamatan Coblong, Kota Bandung', 20025, '089614332579', 1, 8.7, 100, 16),
(26, 'nasabah20', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Edy Susanto', 3, '00000020', 19, 'Jl. Dago Asri No.8, Dago, Kecamatan Coblong, Kota Bandung', 32125, '081313648605', 1, 11.2, 100, 19),
(27, 'nasabah21', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Ria Indah Cahyani', 3, '00000021', 11, 'Gg. Cisitu Lama IV No.154C, Dago, Kecamatan Coblong, Kota Bandung', 15600, '082283167143', 1, 4.6, 100, 11),
(28, 'nasabah22', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Ferri Nugraha', 3, '00000022', 13, 'Jl. Cisitu Baru No.27, Dago, Kecamatan Coblong, Kota Bandung', 6925, '089653754225', 1, 3.9, 100, 13),
(29, 'nasabah23', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Rian Fernandi', 3, '00000023', 14, 'Jl. Cisitu Lama No.10, Dago, Kecamatan Coblong, Kota Bandung', 33100, '081539542012', 1, 8.3, 100, 14),
(30, 'nasabah24', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Eko Budi hartono', 3, '00000024', 13, 'Jl. Cisitu Indah 2 No.16, Dago, Kecamatan Coblong, Kota Bandung', 9750, '089620099772', 1, 5, 100, 13),
(31, 'nasabah25', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Petrus Siahaan', 3, '00000025', 16, 'Jl. Cisitu Lama No.10, Dago, Kecamatan Coblong, Kota Bandung', 13375, '087839758843', 1, 5.9, 100, 16),
(32, 'nasabah26', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Febriyanti', 3, '00000026', 16, 'Jalan Dago Barat No. 49 RT. 3 / RW. 4, Dago, Coblong, Dago, Kecamatan Coblong, Kota Bandung', 17500, '081398764412', 1, 7.1, 100, 16),
(33, 'nasabah27', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Candra Iskandar', 3, '00000027', 16, 'Jl. Cisitu Lama VIII No.7, Dago, Kecamatan Coblong, Kota Bandung', 14875, '087764012758', 1, 6.8, 100, 16),
(34, 'nasabah28', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Fendi Santoso', 3, '00000028', 14, 'Jl. Cisitu Indah VII, Dago, Kecamatan Coblong, Kota Bandung', 29375, '081371931232', 1, 8.7, 100, 14),
(35, 'nasabah29', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Dadang Sudrajat', 3, '00000029', 21, 'Jl. Cisitu Lama No.12, Dago, Kecamatan Coblong, Kota Bandung', 10500, '085377152478', 1, 8, 100, 21),
(36, 'nasabah30', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Acep Jamaludin', 3, '00000030', 8, 'Jl. Sangkuriang No.33, RT.02/RW.13, Dago, Kecamatan Coblong, Kota Bandung', 4400, '081320078988', 1, 2.3, 100, 8),
(37, 'nasabah31', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Dhika Lesmana', 3, '00000031', 16, 'Jl. Cisitu Indah 2 No.14, Dago, Kecamatan Coblong, Kota Bandung', 11900, '085222240098', 1, 5.1, 100, 16),
(38, 'nasabah32', '$2y$10$A.Mq8v/cr9wU08qEiCQ/M.5Sm.rBmqkajWZvj/ACBBjpGDVObwiw6', 'default.png', 1595553647, 'Wawan Heryanto', 3, '00000032', 13, 'Jl. Dago Asri Blok B No.18, Dago, Kecamatan Coblong, Kota Bandung', 9575, '089636543223', 1, 4.3, 100, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'Developer'),
(2, 'Admin'),
(3, 'Nasabah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_menu`
--
ALTER TABLE `access_menu`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `active_quest`
--
ALTER TABLE `active_quest`
  ADD PRIMARY KEY (`active_quest_id`);

--
-- Indexes for table `log_quest`
--
ALTER TABLE `log_quest`
  ADD PRIMARY KEY (`log_quest_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `quest`
--
ALTER TABLE `quest`
  ADD PRIMARY KEY (`quest_id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- Indexes for table `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`trash_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_menu`
--
ALTER TABLE `access_menu`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `active_quest`
--
ALTER TABLE `active_quest`
  MODIFY `active_quest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_quest`
--
ALTER TABLE `log_quest`
  MODIFY `log_quest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quest`
--
ALTER TABLE `quest`
  MODIFY `quest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trash`
--
ALTER TABLE `trash`
  MODIFY `trash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
