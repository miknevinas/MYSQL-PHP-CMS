-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2016 at 09:35 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap'),
(2, 'Javascript'),
(3, 'PHP'),
(4, 'JAVA/C++');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(2, 1, 'adam', 'mik@g.com', 'sss', 'Rejected', '0000-00-00'),
(4, 7, 'Jimmy', 'j@j.com', 'Whatup', 'Rejected', '2016-04-06'),
(5, 2, 'gimme', 'g@g.g', 'qweqweqwe', 'Rejected', '2016-04-06'),
(6, 2, 'adam', 'mik@mik.mo', 'nicmo', 'Approved', '2016-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(2, 1, 'First Post', 'Adam', '2016-04-07', 'mypicccc.PNG', '7      ''''''                  ', 'PHP', 1, 'published'),
(7, 1, 'The Official Test', 'Adam', '2016-04-07', 'us.jpg', 'Pork belly roof party tofu, hashtag hella yr shabby chic ethical authentic. Dreamcatcher gluten-free pug, banjo shoreditch raw denim offal 8-bit. Green juice kickstarter williamsburg, brooklyn flexitarian fashion axe typewriter lomo offal hoodie mlkshk chartreuse gluten-free fingerstache. Chicharrones poutine wayfarers, put a bird on it salvia listicle microdosing pickled aesthetic viral everyday carry. Try-hard fixie single-origin coffee vegan, craft beer chillwave pop-up occupy echo park YOLO food truck asymmetrical man bun venmo. Lumbersexual paleo portland tote bag food truck church-key. Photo booth franzen 8-bit, affogato lo-fi humblebrag stumptown scenester truffaut wolf organic poutine.        ', 'PHP', 4, 'published'),
(8, 3, 'A new post', 'Adam', '2016-04-07', 'IMG_1433.JPG', 'Hella skateboard vegan hammock crucifix aesthetic, portland yr tofu health goth leggings. Chillwave 3 wolf moon yr, slow-carb occupy gentrify shoreditch artisan. Forage swag cornhole, distillery thundercats vegan gochujang post-ironic trust fund disrupt. Man bun 90''s flexitarian austin messenger bag chambray. Banjo XOXO kombucha mlkshk jean shorts tofu. Forage craft beer williamsburg, tumblr ethical blue bottle bitters. Mixtape thundercats ennui banjo, offal retro tumblr echo park drinking vinegar meditation typewriter single-origin coffee YOLO microdosing salvia.', 'PHP', 0, 'published'),
(10, 1, 'Testing', 'Adam', '2016-04-08', 'IMG_1526.JPG', '<p>Whatup</p>', 'PHP', 0, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$ansjdmrleotnrjeljenrt'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(4, 'rico', 'suave', 'ricos', 'suaves', 'rico@suave', '', 'Admin', ''),
(5, 'miknevinas', 'miknevinas', 'Adam', 'McNevin', 'miknevinas@gmail.com', '', 'Subscriber', ''),
(6, 'robo', 'robo', 'ro', 'bo', 'robo@robo.robo', '', 'Subscriber', ''),
(7, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe@qwe.qwe', '', 'Admin', '$2y$10$ansjdmrleotnrjeljenrt'),
(11, 'demo', '$1$He..Ef5.$8OiMFfPRXN1dSrsYi6HM61', '', '', 'demo@demo', '', 'Subscriber', '$2y$10$ansjdmrleotnrjeljenrt'),
(12, 'qwe', '$1$7W/.C04.$BEkKpMdwtDsA5.rzttnDk/', 'qwe', 'qwe', 'qwe@qwe', '', 'Subscriber', '$2y$10$ansjdmrleotnrjeljenrt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
