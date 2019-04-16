-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2019 at 04:02 AM
-- Server version: 8.0.11
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `sr` int(11) NOT NULL AUTO_INCREMENT,
  `username` text,
  `password` text,
  `type` text,
  `s_branch` text NOT NULL,
  PRIMARY KEY (`sr`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`sr`, `username`, `password`, `type`, `s_branch`) VALUES
(11, 'hi', 'wow', 't', 'CSE'),
(16, 'syed', 'peera', 's', 'CSE'),
(17, 'm', 'm', 's', 'MECH'),
(18, 'e', 'e', 's', 'EEE'),
(19, 'm2', 'm2', 's', 'MECH'),
(20, 'c', 'c', 's', 'CSE'),
(21, 'xyz', 'abc', 's', 'CSE'),
(22, 'x', 'x', 's', 'CSE'),
(23, 'y', 'y', 's', 'CSE'),
(24, 'z', 'z', 's', 'CSE'),
(25, 'q', 'q', 's', 'CSE'),
(26, 'g', 'g', 's', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `sr_q` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `options` text NOT NULL,
  `answer` text NOT NULL,
  `branch` text NOT NULL,
  `test_no` int(11) NOT NULL,
  PRIMARY KEY (`sr_q`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`sr_q`, `question`, `options`, `answer`, `branch`, `test_no`) VALUES
(21, 'Q)asdkfhasdfoiweelasdflkasjdflkj', 'lkasjdflkj,lkjsadflkj,lkjdlksfjlk,lkjasdfl', '2', 'ECE', 16),
(20, 'Q)zxcvn,mansdf', 'jasdflkjasdlfj,asdfjlkasdjfl,lkajsdflkj,lkjsdfsdaf', '1', 'ECE', 16),
(18, 'Q)what is (1111) binary = ? decimal', '11,12,15,16', '3', 'CSE', 15),
(19, 'Q) asdjflkasjdflkj', 'lkjlaksdfjlk,lkasjfdlkj,lkjlksafdjlklk,sdfasdf', '3', 'ECE', 16),
(17, 'Q)What is 1 byte = ?', '2 bits,4 bits,6 bits,8bits', '4', 'CSE', 15),
(22, 'Q)skfjasdlkfjlksdj', 'kjasdjflkj,lkasjdflk,jlkjfadl,lkjsadflkjsdlf', '4', 'MECH', 17),
(23, 'Q)asdfjlksjflksajdflksj', 'klasjdflk,nxvcjfdl,lkasdjfe,alksdjfl', '1', 'EEE', 18),
(24, 'Q)sadfsdfkljsadlkfjlksjdlfkdsjlk', 'lkasjdflkj,lkasjdflk,jlkasjdflkj,lkjdlksajflasdjf', '2', 'EEE', 18),
(25, 'Q)asdkjasldfjlk', 'jlkjasdlfkjalsdfj,jaldsj,cxvxcvdsadf,kjnckjk', '1', 'CSE', 19),
(26, 'Q)sadfsdfsadfjlksadjfklasjdflk', 'lkjalksdjf,askljdflkjasdf,sldjflkasdkjf,dlkdsjflasjf', '4', 'CSE', 19),
(27, 'Q)asdfasdfasdfasdfasdf', 'zxcsadfsd,asdfasd,asdfas,asdf', '4', 'CSE', 19),
(28, 'Q)asdkfjasldfjlk', 'lkjasldkfj,lkasjdflkj,kljasdlfkj,kljasdfkj', '4', 'CSE', 20),
(29, 'Q)1 byte = ? bits', '2,4,6,8', '4', 'CSE', 21),
(30, 'Q) 1 nibble is = ? bits', '2,4,8,16', '2', 'CSE', 21),
(31, 'Q)asdkfjlsajdflksadjf', 'klsdjflkasjd,lkjsdlfkj,laskdjfl,lksdjf', '4', 'CSE', 21),
(32, 'Q)jsajdlfjaslkdfjlaksdjflkjlkjasfdlkjaslkdjflk', 'lkasjdflksdjflj,lkasjdflkj,lkajdfslkj,lkajsdflkj', '1', 'CSE', 23),
(33, 'Q)asdfasdflkjasdlfkjaslkdjf', 'lkajsdflkj,ljlakdfjslk,jlkajdsflkjl,lkdjsaflkajsdf', '2', 'CSE', 23),
(34, 'Q)asdlkfjasdlkfjalksdjflksajdflkj', 'asldjldsalskdfj,lkajsdflkjsdaflkasj,lkajsdflkjalsdf,lkjasdlfkjlas', '3', 'CSE', 23),
(35, 'Q)asdksajdflkjasdlfjsldkajflk', 'lkjlkasdjflkj,lkjsdlkfj,lkjdsaflkj,lkjdsfjlkasdf', '4', 'CSE', 23),
(36, 'Q)asdafskdjflsajdflkj', 'lkjasdlkfjaslkdj,lkjasldkfjl,lkasjdflk,jlkasdjfl', '1', 'CSE', 24),
(37, 'Q)what is 1 byte = ? bits', '2,4,8,16', '3', 'CSE', 25),
(38, 'Q)xyz', 'x,y,z,dummy', '4', 'CSE', 26),
(39, 'Q)testing the app', 'test1,test2,test3,test4', '4', 'CSE', 27),
(40, 'Q)testing t1 test', 'dfl,jsdlkfj,lkjsdfal,lkjdf', '4', 'CSE', 28),
(41, 'Q)another sample test case ', 'xyz,abc ,uvw,mno', '4', 'CSE', 29),
(42, 'Q)final test application', 'test1,test2,test3,test4', '4', 'CSE', 30),
(43, 'Q)sldkjfkasjdflkj', 'jlasjdfl,lkjdfljsdl,klajdsfl,lkjasfl', '4', 'CSE', 31),
(44, 'Q)sifoisdjfjjj', 'oijoidfj,jojdoi,oijdfoij,osfij', '4', 'CSE', 32),
(45, 'Q)xyz', 'sadjflskjfdl,lkjsafd,lkjsfdlkj,lkjdfl', '3', 'CSE', 33),
(46, 'Q)asdfkljsldkjf', 'laskdjfl,ljasfdlkj,adsfjlkj,dasdlfkjlasdfj', '4', 'CSE', 33);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `sr_r` int(11) NOT NULL AUTO_INCREMENT,
  `rollnumber` varchar(100) NOT NULL,
  `marks` int(11) NOT NULL,
  `test_no` int(11) NOT NULL,
  PRIMARY KEY (`sr_r`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`sr_r`, `rollnumber`, `marks`, `test_no`) VALUES
(16, '16', 2, 15),
(17, '18', 0, 18),
(18, '17', 1, 17),
(19, '16', 1, 19),
(20, '16', 0, 20),
(21, '20', 0, 19),
(22, '20', 1, 20),
(23, '22', 1, 25),
(24, '23', 1, 25),
(25, '22', 1, 26),
(26, '25', 1, 30),
(27, '22', 1, 31),
(28, '26', 2, 33);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `test_no` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` text NOT NULL,
  `faculty_sr` int(11) NOT NULL,
  `student_taken_test` text,
  `branch` text NOT NULL,
  `date_of_start_test` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `timer` int(11) NOT NULL DEFAULT '30',
  `date_of_end_test` text NOT NULL,
  PRIMARY KEY (`test_no`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_no`, `test_name`, `faculty_sr`, `student_taken_test`, `branch`, `date_of_start_test`, `timer`, `date_of_end_test`) VALUES
(17, 'mechatronics', 11, ',17', 'MECH', '', 30, '0'),
(18, 'electrical', 11, ',18', 'EEE', '', 30, '0'),
(19, 'computer', 11, ',16,20', 'CSE', '', 30, '0'),
(20, 'computerq', 11, ',16,20', 'CSE', '', 30, '0'),
(21, 'Fundamental', 11, NULL, 'CSE', '', 30, '0'),
(22, 'demo', 11, NULL, 'CSE', '1554768000', 30, '0'),
(23, 'Final', 11, NULL, 'CSE', '1554940800', 30, '0'),
(24, 'demo1', 11, NULL, 'CSE', '1554940800', 30, '0'),
(25, 'xyz', 11, ',22,23', 'CSE', '1555286400', 30, '0'),
(26, 'v', 11, ',22', 'CSE', '1555286400', 45, '0'),
(27, 'check_test', 11, NULL, 'CSE', '1555372800', 30, '0'),
(28, 't1', 11, NULL, 'CSE', '1555372800', 35, '1555459200'),
(29, 'sampletestcase', 11, NULL, 'CSE', '1555286400', 35, '1555286400'),
(30, 'final test', 11, ',25', 'CSE', '1555286400', 45, '1555372800'),
(31, 'e', 11, ',22', 'CSE', '1555286400', 45, '1555372800'),
(32, 'sample', 11, NULL, 'CSE', '1555286400', 45, '1555372800'),
(33, 'Automata', 11, ',26', 'CSE', '1555286400', 45, '1555372800');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
