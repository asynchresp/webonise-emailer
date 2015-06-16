-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2015 at 01:45 PM
-- Server version: 5.5.37
-- PHP Version: 5.3.10-1ubuntu3.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emailer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `emailer`
--

CREATE TABLE IF NOT EXISTS `emailer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `skype_id` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `email_body` longtext NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `emailer`
--

INSERT INTO `emailer` (`id`, `first_name`, `last_name`, `email`, `skype_id`, `profile_img`, `email_body`, `created`) VALUES
(1, 'Madhavi', 'Ghadge', 'madhavi@weboniselab.com', 'madhavi.webonise', 'demo_files/banner/banner_1434460327.png', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspWe have a new Weboniser &lt;strong&gt;Mr. Sameer Behere&lt;/strong&gt; who has joined us as a &#39;Senior Consultant&#39; in Design team effective 26th March 2015.</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Let us welcome &amp;amp; celebrate his new endeavor with Webonise.</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; He has earned Bachelor of Commerce from Pune University. He has over 10 years of vast experience in core Design skills and has performed various roles from User Interface Designer to Senior Associate. Previously he worked with Cognizant Technology Solutions, Ajel Limited &amp;amp; Marcura FZE. He is Certified Content Management Practitioner</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; He is a native of Pune and his interests are listening to music, cricket &amp; photography.</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We believe that teaming up with Sameer would be an enriching experience for all of us. Please join us in welcoming and wishing him a long and rewarding career at Webonise!</p><p>&nbsp;</p>', '2015-06-16 13:11:24'),
(2, 'Richa', 'Sharma', 'richa@weboniselab.com', 'richa.webonise', 'demo_files/banner/banner_1434461774.png', '<p>Hi All, We have a new Weboniser <strong>Mr. Sameer Behere</strong> who has joined us as a &#39;Senior Consultant&#39; in Design team effective 26th March 2015.</p>\r\n\r\n<p>Let us welcome &amp; celebrate his new endeavor with Webonise.</p>\r\n\r\n<p>He has earned Bachelor of Commerce from Pune University. He has over 10 years of vast experience in core Design skills and has performed various roles from User Interface Designer to Senior Associate. Previously he worked with Cognizant Technology Solutions, Ajel Limited &amp; Marcura FZE. He is Certified Content Management Practitioner</p>\r\n\r\n<p>He is a native of Pune and his interests are listening to music, cricket &amp; photography.</p>\r\n\r\n<p>We believe that teaming up with Sameer would be an enriching experience for all of us. Please join us in welcoming and wishing him a long and rewarding career at Webonise!</p>\r\n', '2015-06-16 13:35:56'),
(3, 'Akash', 'Badiyani', 'akash@weboniselab.com', 'akash.webonise', 'demo_files/banner/banner_1434462223.png', '<p>We have a new Weboniser <strong>Mr. Sameer Behere</strong> who has joined us as a &#39;Senior Consultant&#39; in Design team effective 26th March 2015.</p>\r\n\r\n<p>Let us welcome &amp; celebrate his new endeavor with Webonise.</p>\r\n\r\n<p>He has earned Bachelor of Commerce from Pune University. He has over 10 years of vast experience in core Design skills and has performed various roles from User Interface Designer to Senior Associate. Previously he worked with Cognizant Technology Solutions, Ajel Limited &amp; Marcura FZE. He is Certified Content Management Practitioner</p>\r\n\r\n<p>He is a native of Pune and his interests are listening to music, cricket &amp; photography.</p>\r\n\r\n<p>We believe that teaming up with Sameer would be an enriching experience for all of us. Please join us in welcoming and wishing him a long and rewarding career at Webonise!</p>\r\n', '2015-06-16 13:43:34');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
