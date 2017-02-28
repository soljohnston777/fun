-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2011 at 10:04 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `joombo`
--

-- --------------------------------------------------------

--
-- Table structure for table `j_categories`
--

CREATE TABLE IF NOT EXISTS `j_categories` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` text NOT NULL,
  `category_slug` longtext NOT NULL,
  `category_description` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `j_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `j_cat_relationships`
--

CREATE TABLE IF NOT EXISTS `j_cat_relationships` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `j_cat_relationships`
--


-- --------------------------------------------------------

--
-- Table structure for table `j_comparisons`
--

CREATE TABLE IF NOT EXISTS `j_comparisons` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `merchant_id` bigint(20) unsigned NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `j_comparisons`
--


-- --------------------------------------------------------

--
-- Table structure for table `j_locations`
--

CREATE TABLE IF NOT EXISTS `j_locations` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `merchant_id` bigint(20) unsigned NOT NULL,
  `address` text NOT NULL,
  `address_two` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` bigint(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `j_locations`
--


-- --------------------------------------------------------

--
-- Table structure for table `j_merchants`
--

CREATE TABLE IF NOT EXISTS `j_merchants` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `merchant_name` text NOT NULL,
  `merchant_image` varchar(255) NOT NULL,
  `merchant_phone` text NOT NULL,
  `merchant_contact` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `j_merchants`
--


-- --------------------------------------------------------

--
-- Table structure for table `j_products`
--

CREATE TABLE IF NOT EXISTS `j_products` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_type` text NOT NULL,
  `product_name` text NOT NULL,
  `product_description` longtext NOT NULL,
  `product_category` text,
  `product_image` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `j_products`
--


-- --------------------------------------------------------

--
-- Table structure for table `j_users`
--

CREATE TABLE IF NOT EXISTS `j_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_login` varchar(60) CHARACTER SET utf8 NOT NULL,
  `user_pass` varchar(128) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_registered` bigint(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `j_users`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
