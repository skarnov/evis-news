-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2019 at 04:19 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

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
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `ad_id` int(11) NOT NULL,
  `ad_image` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'জাতীয়'),
(2, 'আন্তর্জাতিক'),
(3, 'শোবিজ'),
(4, 'খেলা-ধূলা'),
(5, 'দেশান্তর'),
(6, 'আমাদের ক্যাম্পাস'),
(7, 'গুনীজন'),
(8, 'বীর বাঙালী'),
(9, 'জনতার মঞ্চ'),
(10, 'জব মার্কেট'),
(11, 'হ্যান্ডকাফ'),
(12, 'লাভবার্ড'),
(14, 'নগরের কথা'),
(15, 'প্রেক্ষাপট'),
(16, 'স্বাস্থ্যবার্তা');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_image` text NOT NULL,
  `post_video` text,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `slide_id` int(11) NOT NULL,
  `slide_post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'pf2ovmbhtdn7dtrli83rjetlv6', 1525603889),
(2, 'g4eaojs9lup5uoi9clh0a7dlj2', 1525600070),
(3, 'u5b26mae8k9upvdf0loiv4qh80', 1525600816),
(4, '7dg0jaipc161dirait3omf4fk0', 1525603284),
(5, 'p9e0jf3ama3n4hvbp6eknime52', 1525603543),
(6, 'hqhn3mcl82dg0t12i01do5gkp2', 1525753912),
(7, 'krkd2v356t3jv5k5d2v6sa4om6', 1525837122),
(8, '04nli9lc34bfm8qnnbn0s47t63', 1525861608),
(9, 'drpe2pej7n3glgdkgltdu59ft1', 1525925780),
(10, 'nvqkpc95pdac56qmctcrm89jh0', 1526038120),
(11, '66isnml6mnu741n3r5q9s5m956', 1526200326),
(12, 'jdicp9b8bbek3opi4b7970lo02', 1526219068),
(13, '8o8u5o0gglhrok5fjobnrll0s0', 1526268404),
(14, 'ins7sdp4b5gbb079c4kv5hd734', 1526273159),
(15, 'rmtl5qd6uo6nadc4ql7fifcr47', 1526306904),
(16, '7d1vov1qav2kgbi18hrcgtcmd2', 1526312831),
(17, '7sjflm0u8i7qonakjs6341jdl1', 1526355967),
(18, '32hpoav8ksrhvi4qd7f5iisdh7', 1526395857),
(19, 'b51ki4eoffu1a3suqagcjcb662', 1526441933),
(20, 'h8sa7ctme041hopv7a75vce5s9', 1567878927),
(21, 'dn61ntbe2j0rflea66k8ofe9vd', 1568448453),
(22, 'pjibahul94bcvjsenp7s0oma5k', 1570204989),
(23, '6h9idhcqseqh8f57tcmcpv3oa1', 1570252446),
(24, 'k0uhib7gqjjhcc986odrjrk50d', 1570356477),
(25, 'fsciaoqd5hvd9dgpkad2olnslh', 1570466588),
(26, 'jclr49nsa1ki3dfeuj1a28k59d', 1570618685),
(27, 'c2b1hgoacbp13p190s28gol206', 1570639989),
(28, 'en90v4i7ieje2leqa0ejavcg92', 1570686784),
(29, 'jjkdorvpr3llgtrjrpvg6h21hf', 1570988454),
(30, 'h39uec0rpaj05tb1rak3kujc25', 1571035379),
(31, 'd3302ft14fsu1uoufn3c3a9vng', 1571047486),
(32, '56fnvl9tf8mvc586det9l7t4fl', 1571170475),
(33, 'hj4u5m6b2f88bf5m15u31g372e', 1571246928),
(34, 'acnsbsscecos35fje85914a933', 1571256925),
(35, 'kq9h7b5jlgf5sctsic3b5u7vhe', 1571344414),
(36, 'uqdskj1i7023fll5cf8gltomiu', 1571382152),
(37, '8iuopi3b32d6irapovpie5r9c8', 1571467027),
(38, '24bc64hvl735cdf8eg021mr0op', 1571462684),
(39, 'ddq6c04acg2mjsol3s6ihcp1nc', 1571483930),
(40, '34tkght69g45conedjsk9n1rne', 1571498247);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`ad_id`);

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
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
