-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 08:58 AM
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
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  `bid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cid`, `uid`, `sid`, `date`, `comment`, `bid`) VALUES
(97, 42, 80, '2017-10-02', 'i need it urgent', '70$'),
(98, 52, 80, '2017-10-04', 'i dont want it', '$0.00'),
(99, 50, 84, '2017-10-04', 'WOW', '$10'),
(100, 53, 82, '2017-10-07', 'i dont want this deal ', '0'),
(101, 53, 82, '2017-10-07', 'i dont want this deal ', '0'),
(102, 42, 88, '2017-10-11', '', ''),
(103, 57, 88, '2017-10-21', 'My tap broken', '$20/hr');

-- --------------------------------------------------------

--
-- Stand-in structure for view `comment_view`
-- (See below for the actual view)
--
CREATE TABLE `comment_view` (
`cid` int(11)
,`uid` int(11)
,`sid` int(11)
,`date` date
,`comment` varchar(100)
,`bid` varchar(50)
,`firstname` varchar(100)
,`surname` varchar(40)
);

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `userid` int(11) NOT NULL,
  `friendid` int(11) DEFAULT NULL,
  `request` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mid` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message_date` date DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mid`, `sender_id`, `receiver_id`, `message_date`, `message`) VALUES
(31, 42, 42, '2017-10-02', 'Hi arbind'),
(34, 45, 44, '2017-10-03', 'hi dinesh i am sanjay'),
(39, 42, 48, '2017-10-03', 'hi whats up'),
(40, 47, 42, '2017-10-03', 'Hi'),
(43, 42, 49, '2017-10-03', 'hello'),
(44, 49, 42, '2017-10-03', 'hi'),
(45, 49, 42, '2017-10-03', 'what are you doing?'),
(46, 42, 49, '2017-10-03', 'nothing'),
(47, 42, 49, '2017-10-04', 'https://semantic-ui.com/modules/dropdown.html##multiple-selection'),
(48, 50, 42, '2017-10-06', 'Hi bro'),
(49, 53, 42, '2017-10-07', 'hello arbind whats up '),
(50, 42, 53, '2017-10-07', 'hi vishwajeet i am ceo of this site'),
(51, 42, 54, '2017-10-09', 'welcome niwash to this site'),
(52, 42, 55, '2017-10-15', 'Yo, i am arbind'),
(53, 42, 42, '2017-10-25', 'yoyo'),
(57, 42, 47, '2017-11-23', 'hhi'),
(58, 42, 47, '2017-11-23', 'ko'),
(59, 42, 47, '2017-11-23', 'hi aman'),
(60, 42, 49, '2017-11-23', 'hi'),
(61, 42, 50, '2017-11-23', 'hi naveen'),
(62, 61, 49, '2017-11-23', 'hi'),
(63, 59, 58, '2017-11-24', 'hi'),
(64, 59, 61, '2017-11-24', 'hi'),
(65, 61, 59, '2017-11-24', 'hello there');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `pid` int(11) NOT NULL,
  `education` varchar(100) DEFAULT NULL,
  `phoneno` varchar(16) DEFAULT NULL,
  `bio` varchar(200) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`pid`, `education`, `phoneno`, `bio`, `occupation`) VALUES
(42, 'BE-CSE', '91080000000', 'i like gaming', 'CEO of this Site'),
(44, '.....', '......', '......', '......'),
(45, '.....', '......', '......', '......'),
(46, 'BE-cse', '99999', 'aLEAN', 'sTUDENT'),
(47, 'BE-CSE', '7759852104', 'i like cricket', 'Business Man'),
(48, '.....', '......', '......', '......'),
(49, '.....', '......', '......', '......'),
(50, 'CSE', '......', '......', '......'),
(51, '.....', '......', '......', '......'),
(52, '.....', '......', '......', '......'),
(53, 'cse', '7795363485', '......', 'student'),
(54, '.....', '......', '......', '......'),
(55, '.....', '......', '......', '......'),
(56, '.....', '......', '......', '......'),
(57, 'BE', '......', '......', '......'),
(58, 'BE-CSE', '......', '......', '......'),
(59, 'BE-CSE', '910800000', 'i like gaming', 'CEO of this Site'),
(61, '.....', '......', '......', '......'),
(62, 'BE-CSE', '......', '......', '......'),
(64, '.....', '......', '......', '......');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) DEFAULT NULL,
  `sid` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `bid` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `time_date` date DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `sid`, `status`, `image`, `bid`, `location`, `time_date`, `category`) VALUES
(42, 80, 'Learn Java', 'posts/K85ZWV2F_400x400.png', '$100/month', 'Bangalore', '2017-10-02', 'services'),
(42, 82, 'Toshiva Pendrive', 'posts/toshiba-hayabusa-16gb-original-imadsucszj2q3r8g.jpeg', '$70', 'Mega More', '2017-10-02', 'product'),
(49, 84, 'Emoji Pillow', 'posts/IMG-20170902-WA0008.jpg', '$4', 'Birgunj', '2017-10-03', 'product'),
(49, 85, 'Huge Teedy', 'posts/IMG-20170921-WA0002.jpg', '$60', 'Birgunj', '2017-10-03', 'product'),
(50, 86, 'Moto G5s Plus', 'posts/71hLfPtWi4L._SL1200_.jpg', '$200', 'America', '2017-10-06', 'product'),
(50, 87, 'Pigeon Handy mini Chopper ', 'posts/51zKHerTqQL._SL1000_.jpg', '$20', 'Marathalli', '2017-10-06', 'product'),
(50, 88, 'Plumber', 'posts/services.png', '$80 per hr', 'All Over Banglore', '2017-10-06', 'services'),
(42, 93, 'Painting', 'posts/original.jpg', '$30', 'NHCE', '2017-11-23', 'product'),
(42, 94, 'Painting', 'posts/original.jpg', '$50', 'NHCE', '2017-11-23', 'product'),
(42, 95, 'Projecter', 'posts/service-1.jpg', '$30', 'NHCE', '2017-11-24', 'product');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `surname` varchar(40) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `email`, `password`, `avatar`, `surname`, `gender`) VALUES
(42, 'newhorizon', 'arbind@gmail.com', 'newhorizon', 'images/Male-Avatar-3.png', '', 'male'),
(44, 'dinesh', 'dinesh@gmail.com', '9c9f1c65b1dc1f79498c9f09eb610e1a', 'images/150700238062823682308.jpg', 'r', 'male'),
(45, 'sanjay', 'sanjay@gmail.com', '5f1c5342818bf8c161d8ff4e18ff1720', 'images/Male-Avatar-3.png', 't', 'male'),
(46, 'Allen', 'allen@gmail.com', 'a34c3d45b6018d3fd5560b103c2a00e2', 'images/391c5fb.jpg', 'Clement', 'male'),
(47, 'Aman ', 'aman@gmail.com', 'ccda1683d8c97f8f2dff2ea7d649b42c', 'images/17796635_767901146701629_3770817291331757372_n.jpg', 'pandey', 'male'),
(48, 'Sanjay ', 'Sanjayamazed@gmail.com', '69c6320490cc59148a85dd6215a87d8c', 'images/1507038716518-1318206853.jpg', 'Tharanath ', 'male'),
(49, 'Aakash', 'skywap.aks.257@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'images/20170829_185923.jpg', 'Sarraf', 'male'),
(50, 'Naveen', 'naveen@gmail.com', 'e691cb702f5d25642aa87009ef1948f8', 'images/naveen.jpg', 'Saikanth', 'male'),
(51, 'Logan', 'logan@gmail.com', '3447adfd742cdfb9048a3b29baf1ae7d', 'images/Logan.gif', 'Paul', 'male'),
(52, 'willi ', 'bDASKDJASDS@GMAIL.COM', 'c74ae3e68f82b6bdebf102507692f3b0', 'images/amoled smartphone wallpapers 03.jpg', 'rai', 'male'),
(53, 'vishwajeet', 'b.sah71@yahoo.com', '71530b6a9b00e66c69c3d9ad0cf2493c', 'images/P.jpg', 'sah', 'male'),
(54, 'nwsh', 'fysywi@duck2.club', '79cfeb94595de33b3326c06ab1c7dbda', 'images/Lighthouse.jpg', 'nwsh', 'male'),
(55, 'Abhishek', 'abhishek.karnwal01@gmail.com', 'fbade675985a85604a76512be1bf19eb', 'images/12813968_1660718257524379_7955642291291827907_n.jpg', 'Karnwal', 'male'),
(56, 'muttu', 'muttu.gouda75@gmail.com', 'd99bf3e31a67adcdd07b9f510931eb84', 'images/IMG-20170923-WA0097.jpg', 'gouda', 'male'),
(57, 'Manoj', 'manoj.chaurasiya5504@gmail.com', '5e81f9859d223ea420aca993c647b839', 'images/IMG_1598.JPG', 'Chaurasiya', 'male'),
(58, 'test ', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'images/no-photo-male.png', 'second_test', 'male'),
(59, 'Arbind', 'sarafarbind@gmail.com', 'a66295410c9c7855b27011cc534c384c', 'images/DSC_0334.jpg', 'Saraf', 'male'),
(60, 'Ram', 'ram@gmail.com', 'ram', NULL, 'Kumar', 'male'),
(61, 'arbind', 'arbindtechguy@gmail.com', 'a66295410c9c7855b27011cc534c384c', 'images/CROPPED-ArbindSaraf.jpg', 'saraf', 'male'),
(62, 'sanjay', 'sanjay@gmail.com', '5f1c5342818bf8c161d8ff4e18ff1720', 'images/Untitled.png', 'sa', 'male'),
(63, 'newhorizon', 'newhorizon@gmail.com', 'newhorizon', 'images/no-photo-male.png', 'newhorizon', 'male'),
(64, 'qwe', 'we@mail.com', 'a66295410c9c7855b27011cc534c384c', 'images/3074966-graphic-illustration-of-man-in-business-suit-as-user-icon-avatar.jpg', 'qwe', 'male');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `t1` AFTER INSERT ON `users` FOR EACH ROW BEGIN
	DELETE FROM users_count;
    INSERT INTO users_count SELECT COUNT(id) FROM users;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users_count`
--

CREATE TABLE `users_count` (
  `total_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_count`
--

INSERT INTO `users_count` (`total_users`) VALUES
(22);

-- --------------------------------------------------------

--
-- Structure for view `comment_view`
--
DROP TABLE IF EXISTS `comment_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `comment_view`  AS  select `c`.`cid` AS `cid`,`c`.`uid` AS `uid`,`c`.`sid` AS `sid`,`c`.`date` AS `date`,`c`.`comment` AS `comment`,`c`.`bid` AS `bid`,`u`.`firstname` AS `firstname`,`u`.`surname` AS `surname` from (`comment` `c` join `users` `u`) where (`c`.`uid` = `u`.`id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `friendid` (`friendid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `status` (`sid`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `friend_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friend_ibfk_2` FOREIGN KEY (`friendid`) REFERENCES `users` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `users` (`id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
