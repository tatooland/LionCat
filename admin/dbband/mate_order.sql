-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-12-04 08:21:10
-- 服务器版本： 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mini`
--

-- --------------------------------------------------------

--
-- 表的结构 `mate_order`
--

CREATE TABLE IF NOT EXISTS `mate_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `idcard` varchar(20) NOT NULL,
  `address` varchar(128) NOT NULL,
  `order_time` varchar(16) NOT NULL,
  `order_status` varchar(64) NOT NULL,
  `deal_info` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `mate_order`
--

INSERT INTO `mate_order` (`id`, `name`, `phone`, `idcard`, `address`, `order_time`, `order_status`, `deal_info`) VALUES
(1, '张三', '13320507999', '530101198503011826', '昆明市西山区兴苑路电信长途枢纽大楼', '2015-12-04 14:40', '未处理', '<无>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
