-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 03:56 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `kol`
--

CREATE TABLE `kol` (
  `id` int(3) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `follower` int(10) UNSIGNED NOT NULL,
  `category` varchar(20) NOT NULL,
  `img_url` text NOT NULL,
  `intro` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kol`
--

INSERT INTO `kol` (`id`, `name`, `gender`, `platform`, `follower`, `category`, `img_url`, `intro`) VALUES
(1, 'PewDiePie', 'Male', 'Youtube', 57969214, 'Gaming', '/img/Kol/PewDiePie/01.jpg', 'Most subscribed person on Youtube '),
(2, 'Juke Paul', 'Male', 'Youtube', 0, '', '', 'Somehow he is famous'),
(3, 'summit1g', 'Male', 'Twitch', 0, '', '', 'One of the twitch most  followed personality'),
(4, 'shourd', 'Male', 'Twitch', 0, '', '', 'Have the most subscriber on twitch');

-- --------------------------------------------------------

--
-- Table structure for table `kol_data`
--

CREATE TABLE `kol_data` (
  `id` int(3) NOT NULL,
  `pid` int(3) NOT NULL COMMENT 'Connect to kol ->id',
  `type` varchar(20) NOT NULL COMMENT 'Sub header',
  `context1` text NOT NULL,
  `context2` text NOT NULL,
  `context3` text NOT NULL,
  `context4` text NOT NULL,
  `context5` text NOT NULL,
  `context6` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kol_data`
--

INSERT INTO `kol_data` (`id`, `pid`, `type`, `context1`, `context2`, `context3`, `context4`, `context5`, `context6`) VALUES
(1, 1, 'Biology', 'Felix Arvid Ulf Kjellberg born 24 October 1989), known online as PewDiePie is a Swedish web-based comedian and video producer. He is known for his Let\'s Play commentaries and vlogs on YouTube.', 'Born in Gothenburg, Sweden, PewDiePie originally pursued a degree in industrial economics and technology management at Chalmers University of Technology. In 2010, during his time at the university, he registered a YouTube account under the name PewDiePie. The following year, he dropped out of Chalmers after becoming disinterested with his degree field, much to the dismay of his parents. After failing to earn an apprenticeship with an advertising agency in Scandinavia, he then decided to focus on creating content for his YouTube channel. In order to fund his videos, PewDiePie began selling prints of his Photoshop art projects and working at a hot dog stand. PewDiePie soon gathered a rapidly increasing online following, and in July 2012, his channel surpassed one million subscribers.', 'Since 15 August 2013, PewDiePie has been the most subscribed user on YouTube, being surpassed for a total of 46 days in late 2013 by YouTube Spotlight channel. Holding the position since 22 December 2013, the channel has over 57 million subscribers as of November 2017.[8] From 29 December 2014 to 14 February 2017, PewDiePie\'s channel held the distinction of being the most viewed of all time, and as of November 2017, the channel has received over 16 billion video views.[8]', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kol`
--
ALTER TABLE `kol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kol_data`
--
ALTER TABLE `kol_data`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
