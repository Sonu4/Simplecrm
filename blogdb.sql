-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2018 at 07:38 PM
-- Server version: 5.5.54
-- PHP Version: 5.3.10-1ubuntu3.26

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id_b` int(10) NOT NULL AUTO_INCREMENT,
  `blog_name` varchar(255) NOT NULL,
  `blog_body` text NOT NULL,
  `img_one` varchar(255) NOT NULL,
  `img_two` varchar(255) NOT NULL,
  `img_three` varchar(255) NOT NULL,
  `img_four` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `access` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_b`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id_b`, `blog_name`, `blog_body`, `img_one`, `img_two`, `img_three`, `img_four`, `id`, `access`) VALUES
(1, 'Morning Blog', 'Hello Morninng', '5_BLOG_images (1).jpg', '5_BLOG_circle-profile-image-003-1-e1478563591958.png', '5_BLOG_images.png', '5_BLOG_circle+profile+pic.png', 5, 1),
(2, 'Hello World', 'Hello world Is a first program.', '5_BLOG_avatar_0.png', '5_BLOG_header.jpg', '5_BLOG_KKEL_Home_page', '5_BLOG_images.png', 5, 1),
(4, 'Git Hub Sold', 'In the official announcement at the Microsoft News web site, the company said they are to reach agreement with GitHub by the end of the year. They said the agreement would allow them to deliver Microsoft development services to GitHub users, and "accelerate enterprise use of GitHub". GitHub had been financially struggling recently and is expected to get a new CEO.\r\n\r\nIn 2016, according to financial news and media company Bloomberg L.P., through three quarters GitHub lost USD 66 million, while in nine months of that year GitHub had revenue of USD 98 million. In August 2017 Github said they were seeking a new CEO. According to the announcements by GitHub and Microsoft, the Microsoft Corporate Vice President Nat Friedman would become the new CEO of GitHub. He had created app creation platform company Xamarin and was "an open-source veteran", Microsoft said.\r\n\r\nGitHub confirmed the acquisition plans on its blog. In this announcement they alluded to concerns about past friction between Microsoft and open-source software, however they said "things are different. [...] Microsoft is the most active organization on GitHub in the world", mentioning VS Code as an example. In the announcement, GitHub also referred to its several years collaboration with Microsoft on Git LFS and Electron. GitHub also mentioned the Azure development platform run by Microsoft.', '5_BLOG_logo-fillesd.png', '5_BLOG_Screenshot from 2017-07-26 16:50:39.png', '5_BLOG_PHP version - 2017-11-04 17:41:35.png', '5_BLOG_telesales1:16.png', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) NOT NULL,
  `blog_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `blog_id`) VALUES
(1, 'Thisisgood  ', 0),
(2, 'Thisisgood  ', 1),
(3, '', 0),
(4, 'Hello Is', 5),
(5, 'Great Blog', 5),
(6, 'nice ....................', 5),
(7, 'sfsdfs', 4),
(8, 'Nice...............', 4);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `type_of_user` varchar(10) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `email`, `password`, `gender`, `type_of_user`, `profile_img`) VALUES
(1, 'shubham', 'kotheshubham4@gmail.com', 'a7619495e7889ef44802620bb9bf7a7a', 'Male', 'Admin', 'logo-fillesd.png'),
(2, 'Aditya', 'Aditya@gmail.com', '3667dfe4a66089c51620ee63ed2db0c3', 'Male', 'Admin', '2_logo-fillesd.png'),
(3, 'Shrikant', 'shri@fmail.com', '3667dfe4a66089c51620ee63ed2db0c3', 'Male', 'Admin', '3_images (3).jpg'),
(4, 'Pratik', 'pratik@gmail.com', 'shubh', 'Male', 'Auther', 'logo-fillesd.png'),
(5, 'Karan', 'karan@gmail.com', 'a7619495e7889ef44802620bb9bf7a7a', 'Male', 'Auther', '5_profile_Tammy_Hawley_-_circle.png'),
(6, 'Akash', 'akash@gmail.com', '3667dfe4a66089c51620ee63ed2db0c3', 'Male', 'Reader', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
