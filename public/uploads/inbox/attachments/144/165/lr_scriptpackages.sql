-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2015 at 09:44 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scriptreader`
--

-- --------------------------------------------------------

--
-- Table structure for table `lr_scriptpackages`
--

CREATE TABLE IF NOT EXISTS `lr_scriptpackages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `logline` varchar(255) NOT NULL,
  `synopsis` varchar(255) NOT NULL,
  `include_docs` varchar(255) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `lr_scriptpackages`
--

INSERT INTO `lr_scriptpackages` (`id`, `created_by`, `title`, `logline`, `synopsis`, `include_docs`, `created_at`, `updated_at`) VALUES
(20, 69, 'last testing', 'logline', 'synopsis', 'a:3:{s:10:"beat_sheet";s:10:"beat_sheet";s:14:"Character_list";s:14:"Character_list";s:5:"other";a:1:{i:0;s:10:"dsdsdsdssd";}}', '2015-03-24 08:07:32', '2015-03-24 08:08:20'),
(21, 69, 'dsds', '', '', 'a:1:{s:5:"other";a:1:{i:0;s:27:"dffdfffffffffffffffffffffff";}}', '2015-03-24 08:08:54', '2015-03-24 08:08:54'),
(22, 81, 'package title', '', '', '', '2015-03-27 10:27:20', '2015-03-27 10:27:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
