-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 15 feb 2013 kl 18:50
-- Serverversion: 5.5.24-log
-- PHP-version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `kbk_boardstuff`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `economic_alterations`
--

CREATE TABLE IF NOT EXISTS `economic_alterations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(65) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT 'Expense = 0, income = 1',
  `date` date NOT NULL,
  `receipt` tinyint(1) NOT NULL,
  `accountant_approved` tinyint(1) NOT NULL COMMENT '0 = no, 1 = yes, 2 = not reviewed',
  `remaining_money` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumpning av Data i tabell `economic_alterations`
--

INSERT INTO `economic_alterations` (`id`, `title`, `description`, `money`, `type`, `date`, `receipt`, `accountant_approved`, `remaining_money`) VALUES
(1, '1', 'Test', '6817.00', 1, '2013-02-14', 1, 2, '6817.00'),
(2, '2', '', '500.00', 1, '2013-02-12', 1, 2, '500.00'),
(3, '3', '', '400.00', 1, '2013-02-15', 1, 2, '7217.00'),
(4, 'Test', '', '200.00', 0, '2013-02-13', 1, 2, '300.00'),
(6, 'Test2', '', '200.00', 0, '2013-02-13', 1, 2, '100.00'),
(8, 'Test3', 'TestTest', '222.00', 1, '2013-02-14', 1, 2, '7039.00');

-- --------------------------------------------------------

--
-- Tabellstruktur `operations`
--

CREATE TABLE IF NOT EXISTS `operations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operation` varchar(65) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `is_planned` tinyint(1) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `ongoing` tinyint(1) NOT NULL,
  `done` tinyint(1) NOT NULL,
  `category` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `total_sum_money` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
