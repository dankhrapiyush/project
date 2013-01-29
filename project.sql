-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2012 at 06:48 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `news_id`, `content`, `username`, `date`) VALUES
(1, 1, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'vedran', '2012-04-30 20:28:44'),
(2, 1, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'vedran', '2012-04-30 20:28:58'),
(3, 1, 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? \r\n\r\nQuis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 'vedran', '2012-04-30 20:29:11'),
(4, 7, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.\r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. \r\n\r\nNeque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?', 'vedran', '2012-04-30 20:29:34'),
(5, 10, 'Best cartoon character ever!', 'vedran', '2012-04-30 22:54:40'),
(6, 1, 'Pure awesomeness <a href="http://www.youtube.com/watch?v=QgpzLUCY0rU " target="_blank">http://www.youtube.com/watch?v=QgpzLUCY0rU</a> !!!', 'vedran', '2012-05-08 17:23:12'),
(7, 10, 'Test!!!!', 'vedran', '2012-05-10 17:20:18'),
(8, 10, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'bishop', '2012-05-11 14:36:03'),
(9, 10, 'hahaha: http://www.youtube.com/watch?v=fTpQOZcNASw', 'bishop', '2012-05-11 16:37:32'),
(10, 12, 'Is nice, I like!!', 'vedran', '2012-10-22 16:36:41'),
(11, 12, 'Must....have....one.....now!!!!', 'vedran', '2012-10-25 17:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `news_id`, `filename`, `type`, `size`, `username`, `date`) VALUES
(1, 1, 'ja.jpg', 'image/jpeg', '28768', 'vedran', '2012-04-30 20:24:39'),
(2, 2, 'P1010456.JPG', 'image/jpeg', '884759', 'vedran', '2012-04-30 20:25:00'),
(3, 3, 'DSC02155.JPG', 'image/jpeg', '59006', 'vedran', '2012-04-30 20:25:13'),
(4, 4, 'P1010460.JPG', 'image/jpeg', '60780', 'vedran', '2012-04-30 20:25:33'),
(5, 5, 'P1010457.JPG', 'image/jpeg', '38812', 'vedran', '2012-04-30 20:26:15'),
(6, 6, 'Picture 1.png', 'image/png', '60458', 'vedran', '2012-04-30 20:26:20'),
(7, 7, 'podloga.JPG', 'image/jpeg', '62848', 'vedran', '2012-04-30 20:26:32'),
(8, 10, 'cartmanslayer1.jpg', 'image/jpeg', '143171', 'vedran', '2012-04-30 20:27:23'),
(9, 11, 'galaxy_note_2.JPG', 'image/jpeg    ', '110773', 'vedran', '2012-10-21 16:30:11'),
(11, 12, 'galaxy_s3.jpg', 'image/jpeg', '127310', 'vedran', '2012-10-21 19:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `caption`, `content`, `username`, `date`) VALUES
(1, 'News 1', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.\r\n \r\n<iframe width="560" height="315" src="http://www.youtube.com/embed/QgpzLUCY0rU" frameborder="0" allowfullscreen></iframe>\r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?\r\n\r\nQuis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 'vedran', '2012-04-30 20:24:39'),
(2, 'News 2', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. \r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? \r\n\r\nQuis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 'vedran', '2012-04-30 20:25:00'),
(3, 'News 3', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. \r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? \r\n\r\nQuis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 'vedran', '2012-04-30 20:25:13'),
(4, 'News 4', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. \r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? \r\n\r\nQuis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 'vedran', '2012-04-30 20:25:33'),
(5, 'News 5', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. \r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? \r\n\r\nQuis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 'vedran', '2012-04-30 20:26:15'),
(6, 'Star Wars', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. \r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? \r\n\r\nQuis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 'vedran', '2012-04-30 20:26:20'),
(7, 'New background', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. \r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? \r\n\r\nQuis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 'vedran', '2012-04-30 20:26:32'),
(8, 'Testing', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. \r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? \r\n\r\nQuis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 'vedran', '2012-04-30 20:26:41'),
(9, 'Testing 4', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. \r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? \r\n\r\nQuis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 'vedran', '2012-04-30 20:26:46'),
(10, 'Cartman - Slayer Edition', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. \r\n \r\n<iframe width="560" height="315" src="http://www.youtube.com/embed/QgpzLUCY0rU" frameborder="0" allowfullscreen></iframe>\r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? \r\n\r\nQuis autem vel eum http://www.portalsatova.com/ iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 'bishop', '2012-04-30 20:27:23'),
(11, 'Samsung Galaxy Note II Review', 'So read the quote that kicked off the ad campaign surrounding the original Galaxy Note, the 5.3-inch hybrid device Samsung unveiled last year. Like many Samsung ad slogans, this one was a tad inaccessible, but at least the first two-thirds of it accurately stated the question a lot of us were asking: was the product a smartphone or was it a tablet? And furthermore, what place did it have in the market? What exactly did â€œitâ€™s Galaxy Noteâ€ mean?\r\n\r\nTo the surprise of some -and the delight of Samsung, no doubt- those questions didnâ€™t keep the original Galaxy Note from skyrocketing to success. As of August, Samsung had sold 10 million units worldwide, proving that â€œphabletsâ€ did indeed have a place in consumersâ€™ hearts and pockets. Before long, the company had single-handedly carved out a new category in mobile computing devices, and went on to expand the Note brand to include devices in other categories as well. A follow-on phablet seemed assured.\r\n\r\nThe Galaxy Note II is that device. We first got our hands on it at this yearâ€™s IFA, and weâ€™ve just wrapped up a solid week of testing our own review unit here in the States. Weâ€™ve editorialized on its hybrid nature, waxed poetic in video demos of its features, and even podcasted at length about this new kid on the phablet block. So, does the new smartphone/tablet live up to the high bar set by its predecessor? Grab your favorite beverage, put your feet up, and read on to find out.', 'vedran', '2012-10-21 16:25:55'),
(12, 'Samsung Galaxy S III Review', 'The international G3 runs on Samsungâ€™s quad-core Exynos 4412 processor, clocked at 1.4GHz. The Verizon version (like the other American variants) instead has a dual-core Qualcomm Snapdragon S4, running at 1.5GHz. Although that may seem like a significant downgrade, the resulting performance isnâ€™t nearly as bad as one might think. In our review of the Sprint version of the SGS3 we went into some detail, about the S4â€²s transistors, its 28nm process, and the fact that itâ€™s built on the Krait architecture which is superior in most metrics to the A9 core of the Exynos.\r\n\r\nLike the Sprint version, the Verizon SGS3 comes packed with 2GB of RAM. Thatâ€™s a fairly understated sentence to describe not only the speed and agility the extra RAM provides, but also the potential future-proofing for Android 4.1 Jelly Bean.\r\n\r\nLastly, the choice of processor brings with it another bonus: support for Verizon LTE. Unlike the Sprint version, the Verizon SGS3 includes a user-accessible microSIM next to the microSD slot. You need a valid SIM in this slot before you power up, otherwise your superphone is a super-paper-weight (which is why our review of this phone took longer than we would have preferred).', 'vedran', '2012-10-21 16:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `privileges` varchar(20) NOT NULL DEFAULT 'user',
  `date` datetime NOT NULL,
  `random` varchar(20) NOT NULL,
  `activated` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `mail`, `privileges`, `date`, `random`, `activated`) VALUES
(1, 'vedran', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Vedran', 'Sola', 'vedransola@gmail.com', 'admin', '2012-04-22 14:20:35', '', 1),
(2, 'bishop', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Ash', 'Bishop', 'ash.bishop@live.com', 'user', '2012-04-30 22:55:11', '', 1),
(3, 'john', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'John', 'Doe', 'john.doe@gmail.com', 'user', '2012-04-30 23:20:35', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
