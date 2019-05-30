-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2015 at 09:43 AM
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
-- Table structure for table `lr_submission`
--

CREATE TABLE IF NOT EXISTS `lr_submission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stand_script_pack` tinyint(2) NOT NULL,
  `additional_docs` varchar(255) NOT NULL,
  `guideline_desc` varchar(255) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lr_submission`
--

INSERT INTO `lr_submission` (`id`, `stand_script_pack`, `additional_docs`, `guideline_desc`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 1, 'a:3:{i:0;s:11:"releaseform";i:1;s:14:"coveragereport";i:2;s:9:"treatment";}', '<p>sunny kashyap</p>', '2015-03-17 07:28:33', '2015-03-17 07:28:33', 69),
(2, 1, 'a:2:{i:0;s:11:"releaseform";i:1;s:5:"sunny";}', '<p>sunny akshyap i my nams</p>', '2015-03-17 09:52:45', '2015-03-17 09:52:45', 69);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
