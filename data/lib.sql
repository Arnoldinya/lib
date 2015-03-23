-- phpMyAdmin SQL Dump
-- version 4.2.3deb1.trusty~ppa.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2015 at 10:25 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lib`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL COMMENT 'Имя',
  `date_create` datetime DEFAULT NULL COMMENT 'Дата создания',
  `date_update` datetime DEFAULT NULL COMMENT 'Дата изменения'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
`id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL COMMENT 'Название',
  `date_create` datetime DEFAULT NULL COMMENT 'Дата создания',
  `date_update` datetime DEFAULT NULL COMMENT 'Дата изменения'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `book_x_author`
--

CREATE TABLE IF NOT EXISTS `book_x_author` (
  `book_id` int(11) NOT NULL COMMENT 'Книга',
  `author_id` int(11) NOT NULL COMMENT 'Автор'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book_x_reader`
--

CREATE TABLE IF NOT EXISTS `book_x_reader` (
  `book_id` int(11) NOT NULL COMMENT 'Книга',
  `reader_id` int(11) NOT NULL COMMENT 'Читатель'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reader`
--

CREATE TABLE IF NOT EXISTS `reader` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL COMMENT 'Имя',
  `date_create` datetime NOT NULL COMMENT 'Дата создания',
  `date_update` datetime NOT NULL COMMENT 'Дата изменения'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE IF NOT EXISTS `searches` (
`id` int(11) NOT NULL,
  `search` text NOT NULL,
  `date_create` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_x_author`
--
ALTER TABLE `book_x_author`
 ADD PRIMARY KEY (`book_id`,`author_id`), ADD KEY `author_id` (`author_id`), ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book_x_reader`
--
ALTER TABLE `book_x_reader`
 ADD PRIMARY KEY (`book_id`,`reader_id`), ADD KEY `reader_id` (`reader_id`), ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `reader`
--
ALTER TABLE `reader`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searches`
--
ALTER TABLE `searches`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `reader`
--
ALTER TABLE `reader`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `searches`
--
ALTER TABLE `searches`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_x_author`
--
ALTER TABLE `book_x_author`
ADD CONSTRAINT `book_x_author_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `book_x_author_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_x_reader`
--
ALTER TABLE `book_x_reader`
ADD CONSTRAINT `book_x_reader_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `book_x_reader_ibfk_2` FOREIGN KEY (`reader_id`) REFERENCES `reader` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
