-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: sdb-q.hosting.stackcp.net
-- Generation Time: Feb 26, 2022 at 12:51 PM
-- Server version: 10.4.22-MariaDB-log
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darwish-3230350c48`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactid` int(100) NOT NULL,
  `contactname` tinytext DEFAULT NULL,
  `contactaddress` tinytext DEFAULT NULL,
  `contactphone` tinytext DEFAULT NULL,
  `contactphome` tinytext DEFAULT NULL,
  `contactemail` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactid`, `contactname`, `contactaddress`, `contactphone`, `contactphome`, `contactemail`) VALUES
(1, 'Darwish Mat Zain', 'Kampung Bukit Berangan,<br>17610 Kuala Balah,<br>Kelantan, Malaysia', '01137535178', '0179024771', 'darwish@darwishzain.com');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `linkid` int(100) NOT NULL,
  `linkname` tinytext DEFAULT NULL,
  `linklink` tinytext DEFAULT NULL,
  `linkcolor` varchar(10) DEFAULT NULL,
  `linkdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`linkid`, `linkname`, `linklink`, `linkcolor`, `linkdate`) VALUES
(1, 'Just started in affiliate networking? Try Accesstrade', 'https://pub.accesstrade.global/#/sign-up?country=my&referral_id=peCEX2qcRRCcSpw5RbapzA%3D%3D', '#ea7b10', '2022-01-29'),
(2, 'Citizen of Jeli, Kelantan? Check out Jeli.my', 'https://jeli.darwishzain.com', NULL, '2022-01-29'),
(3, 'Venturing graphic design work? Try Canva', 'https://accesstra.de/004n3n000rs9', '#09b7d0', '2022-01-29'),
(4, 'Working on website hosting? Try Shezawebhost', 'https://shezawebhost.com/cms/aff.php?aff=11', NULL, '2022-01-29'),
(6, 'Checking out crypto trading? Try Luno', 'https://www.luno.com/invite/AE8932', '#12326b', '2022-01-29'),
(7, 'Upgrading your Youtube journey? Try Tubebuddy', 'https://www.tubebuddy.com/darwishzain', NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectid` int(100) NOT NULL,
  `projecttitle` tinytext DEFAULT NULL,
  `projectdes` mediumtext DEFAULT NULL,
  `projectlink` tinytext DEFAULT NULL,
  `projectstart` year(4) DEFAULT NULL,
  `projectcomplete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectid`, `projecttitle`, `projectdes`, `projectlink`, `projectstart`, `projectcomplete`) VALUES
(1, 'Jeli.my Website', 'The main focus of the project is to develop a centralized website that will provide information related to Jeli state of Kelantan. The aim of the project is to give more exposure on what is happening in Jeli. It is possible that the success in this project will inspire tourism activity, economy growth and development for Jeli. For more information, you can reach me <a href=\'./index.php?contact=true\'>[here]</a> ', 'https://jeli.darwishzain.com', 2021, 0),
(2, 'UMP-link', 'The application provides a fast access to UMP\'s website for students and lecturers. You can open said website just by a click of a button. Future feature will be initiate other application by a click of a button', 'https://github.com/darwishzain/ump-link', 2022, 1),
(3, 'Inventory System (SDW Subject)', 'This project was developed for Software Development Workshop (SDW) of the university. The project revolve around certain faculty\'s administration office', 'https://github.com/start-up-tech/FKIS-Project', 2020, 0),
(4, 'Python Calculator', 'The calculator was developed with python programming language. There are three types of calculator which are basic calculator, advance calculator and scientific calculator', 'https://github.com/darwishzain/calculator-py', 2021, 0),
(5, 'UMP FYP (WE Subject)', 'The project was developed for one of the subject in the university. The project aspire to assist students, lecturer and industry personnel to undergo final year project processes for the university', 'https://github.com/web-1A4-2021/ump-fyp', 2021, 0);

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `socialid` int(100) NOT NULL,
  `socialname` varchar(100) DEFAULT NULL,
  `socialuser` tinytext DEFAULT NULL,
  `sociallink` tinytext DEFAULT NULL,
  `socialfa` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`socialid`, `socialname`, `socialuser`, `sociallink`, `socialfa`) VALUES
(1, 'Tik Tok', ' Darwish Zain (boyrecluse)', 'https://www.tiktok.com/@boyrecluse', 'fab fa-tiktok'),
(2, 'Facebook', 'Darwish Zain boyrecluse', 'https://www.facebook.com/darwishzainstd', 'fab fa-facebook'),
(3, 'Instagram', 'Darwish Zain (boyrecluse)', 'https://www.instagram.com/darwishzainstd', 'fab fa-instagram'),
(4, 'Linked In', 'Darwish Mat Zain', 'https://www.linkedin.com/in/darwishzainstd', 'fab fa-linkedin'),
(5, 'Twitch', 'boyrecluse', 'https://www.twitch.tv/boyrecluse', 'fab fa-twitch'),
(6, 'Github', 'darwishzain', 'https://github.com/darwishzain', 'fab fa-github'),
(7, 'Itch IO', 'darwishzainstd', 'https://darwishzainstd.itch.io', 'fab fa-itch-io'),
(8, 'Youtube', 'Darwish Zain (boyrecluse)', 'https://www.youtube.com/channel/UCS3PMx-k6Osp6oQWEUROHzg', 'fab fa-youtube'),
(9, 'Twitter', 'Darwish Zain (boyrecluse)', 'https://twitter.com/darwishzainstd', 'fa fa-twitter'),
(10, 'Email', 'darwish@darwishzain.com', 'mailto:darwish@darwishzain.com', 'fa fa-envelope'),
(11, 'Store', 'Jeli.my', 'jeli.darwishzain.com', 'fas fa-store');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactid`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`linkid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectid`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`socialid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `linkid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `socialid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
