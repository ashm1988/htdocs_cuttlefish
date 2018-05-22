-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2017 at 10:47 PM
-- Server version: 5.6.32-78.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sgcfundn_teams`
--

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `displayName` varchar(25) NOT NULL COMMENT 'Display Name',
  `croppedName` varchar(25) NOT NULL COMMENT 'Cropped Name for vars',
  `badge` varchar(25) NOT NULL COMMENT 'Badge Image'
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `displayName`, `croppedName`, `badge`) VALUES
(1, 'Arsenal', 'arsenal', 'http://goo.gl/2XcmfX'),
(2, 'Aston Villa', 'astonvilla', 'http://goo.gl/eO3FGq'),
(3, 'Bournemouth', 'bournemouth', 'http://goo.gl/jJ4XIF'),
(4, 'Chelsea', 'chelsea', 'http://goo.gl/sQXlrw'),
(5, 'Crystal Palace', 'crystalpalace', 'http://goo.gl/KS6EJM'),
(6, 'Everton', 'everton', 'http://goo.gl/QeBftb'),
(7, 'Leicester', 'leicester', 'http://goo.gl/foTrhQ'),
(8, 'Liverpool', 'liverpool', 'http://goo.gl/ZLQ2zc'),
(9, 'Man City', 'mancity', 'http://goo.gl/CR7TgK'),
(10, 'Man Utd', 'manutd', 'http://goo.gl/UX3Ol0'),
(11, 'Newcastle', 'newcastle', 'http://goo.gl/GaZNOQ'),
(12, 'Norwich', 'norwich', 'http://goo.gl/44m6OR'),
(13, 'Southampton', 'southampton', 'http://goo.gl/N2a7Rq'),
(14, 'Stoke', 'stoke', 'http://goo.gl/vFWZ8i'),
(15, 'Sunderland', 'sunderland', 'http://goo.gl/eNKfV8'),
(16, 'Swansea', 'swansea', 'http://goo.gl/4ECdw7'),
(17, 'Tottenham', 'tottenham', 'http://goo.gl/7YGudy'),
(18, 'Watford', 'watford', 'http://goo.gl/PVm7dj'),
(19, 'West Brom', 'westbrom', 'http://goo.gl/RmBCyl'),
(20, 'West Ham', 'westham', 'http://goo.gl/Fs1wt4'),
(21, 'Burnley', 'burnley', 'http://goo.gl/QONkDP'),
(22, 'Hull', 'hull', 'http://goo.gl/HRfkb6'),
(23, 'Middlesbrough', 'middlesbrough', 'http://goo.gl/aWCaKh'),
(24, 'Brighton and Hove', 'brighton', 'https://goo.gl/LuS4S3'),
(25, 'Huddersfield Town', 'huddersfield', 'https://goo.gl/GKNxFP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
