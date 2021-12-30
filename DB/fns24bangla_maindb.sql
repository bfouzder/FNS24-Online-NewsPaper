-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2021 at 07:13 PM
-- Server version: 10.2.41-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fns24bangla_maindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `admin_name` varchar(32) NOT NULL DEFAULT '',
  `admin_email` varchar(96) NOT NULL DEFAULT '',
  `admin_phone` varchar(200) DEFAULT NULL,
  `admin_pass` varchar(40) NOT NULL DEFAULT '',
  `admin_level` tinyint(1) NOT NULL DEFAULT 1,
  `admin_created` datetime DEFAULT NULL,
  `admin_lastupdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_lastlogin` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `admin_name`, `admin_email`, `admin_phone`, `admin_pass`, `admin_level`, `admin_created`, `admin_lastupdate`, `admin_lastlogin`) VALUES
(1, 'Mr. Admin', '', '@dmin', 'bfouzder@gmail.com', '01912527479', 'f1dbecd2250ed5140ed9c6aacd4a4421', 1, '2009-05-14 00:00:00', '2021-12-30 11:56:36', '2021-12-30 17:56:36'),
(6, 'Aditya', '', 'aditya', 'bfouzder@yahoo.com', '01912537479', 'b7ee7cf8da3f9a69cf007da4d32b3986', 4, '2015-11-08 09:49:54', '2021-02-28 19:26:49', '2021-03-01 01:26:49'),
(14, 'FNS admin', '', 'fnsadmin', 'fns@image.com', '098098098908', 'f1dbecd2250ed5140ed9c6aacd4a4421', 1, '2016-01-22 09:03:57', '2021-11-11 07:50:57', '2021-11-11 13:50:57'),
(15, 'Abdur Rahim', '', 'abdurrahim', 'intejar1c@gmail.com', '01923 598686', '94bed6b20396c415a9a7602998d2d77f', 3, '0000-00-00 00:00:00', '2021-06-09 12:47:21', '2021-06-09 18:16:16'),
(16, 'Rabbi Islam', '', 'rabbiislam', 'rabbiislam301@gmail.com', '01799 491966', '97f9789be23a10b32722594c1e9dade5', 3, '0000-00-00 00:00:00', '2021-12-30 08:07:01', '2021-12-30 14:07:01'),
(17, 'Jack Klinton', '', 'klinton', 'klintonmalacor@gmail.com', '01682 331436', '27de7000063e25db231f81450c749c94', 3, '0000-00-00 00:00:00', '2021-12-23 05:02:07', '2021-12-23 11:02:07'),
(19, 'Alif Hasan', NULL, 'saykat', 'alifhasan.bd@gmail.com', '01671 587898', 'ce9002daaf051cd7233775d69a254220', 1, NULL, '2021-12-30 11:20:26', '2021-12-30 17:20:26'),
(20, 'Rupa Akter Pakhi', NULL, 'rupaakterpakhi', 'rupaakterpakhi@gmail.com', '01920 132827', 'db3fb4d0ccb220dd34a169742ba3f20c', 3, NULL, '2021-12-30 09:41:41', '2021-12-30 15:41:41'),
(21, 'Nishad Ahmed', NULL, 'nishad', 'nishad.bd19@gmail.com', '01736238809', '01bee3608f5a894639f51d27fcb194e6', 3, NULL, '2021-12-30 09:38:28', '2021-12-30 15:38:28'),
(22, 'Selim Ahmed', NULL, 'selim', 'selimulselim@gmail.com', '01911040497', '94bed6b20396c415a9a7602998d2d77f', 3, NULL, '2021-06-09 12:47:51', '2021-05-26 18:44:26'),
(26, 'Fardin Radoan', NULL, 'fardin', 'fardinradoan25@gmail.com', '01971 466164', 'b64d127efdf616a680ad0009412cbd64', 3, NULL, '2021-12-30 09:18:01', '2021-12-30 15:18:01'),
(28, 'Tahsinul Islam', NULL, 'tahsin', 'tahsin@gmail.com', '0177 021215', '0de5e969b4db01d04f5a97e163f2622f', 3, NULL, '2021-12-06 11:09:20', '2021-12-06 17:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

DROP TABLE IF EXISTS `admin_log`;
CREATE TABLE `admin_log` (
  `id` bigint(20) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_ip` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `all_news`
--

DROP TABLE IF EXISTS `all_news`;
CREATE TABLE `all_news` (
  `news_id` bigint(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `uploaded_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `cat_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `TopHome` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1-NONE,2-MainStory,3-Top1,4-Top2,5-Top3,6-Top4,7-Top5,8-Top6',
  `TopInner` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1-NONE,2-Top1,3-Top2,4-Top3,5-Top4,6-Top5,7-Top6,8-Top7',
  `SubCategoryID` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `SubCategoryIDPos` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `SpecialCategoryID` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `SpecialCategoryIDPos` tinyint(3) UNSIGNED DEFAULT 1,
  `DistrictID` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'FK - bas_district(DistrictID)',
  `news_id_temp` int(11) UNSIGNED DEFAULT NULL,
  `news_subheading` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Writers` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Initial` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_video` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_details` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ImageSMPath` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_url_caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `big_image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `big_image_url_caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `DateTimeUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ShowContent` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1-ShowContent, 2-DontShowContent',
  `ShowInScroll` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT '1-ShowInScroll 2-Dont ShowInScroll',
  `PrevContentID` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EncryptedValue` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_read` int(11) NOT NULL DEFAULT 0,
  `top_news` int(11) NOT NULL,
  `slider_news` int(11) NOT NULL,
  `spot_light` int(11) NOT NULL,
  `breaking` tinyint(4) NOT NULL DEFAULT 0,
  `footer_news` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `all_news_temp`
--

DROP TABLE IF EXISTS `all_news_temp`;
CREATE TABLE `all_news_temp` (
  `news_id_temp` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `TopHome` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1-NONE,2-MainStory,3-Top1,4-Top2,5-Top3,6-Top4,7-Top5,8-Top6',
  `TopInner` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1-NONE,2-Top1,3-Top2,4-Top3,5-Top4,6-Top5,7-Top6,8-Top7',
  `SubCategoryID` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `SubCategoryIDPos` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `SpecialCategoryID` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `SpecialCategoryIDPos` tinyint(3) UNSIGNED DEFAULT 1,
  `DistrictID` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'FK - bas_district(DistrictID)',
  `news_subheading` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Writers` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Initial` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_video` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_details` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ImageSMPath` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_url_caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `big_image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `big_image_url_caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `DateTimeUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ShowContent` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1-ShowContent, 2-DontShowContent',
  `ShowInScroll` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT '1-ShowInScroll 2-Dont ShowInScroll',
  `Deletable` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1-Not Deleted, 2-Deleted',
  `Editable` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `PrevContentID` bigint(20) UNSIGNED DEFAULT NULL,
  `EncryptedValue` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_read` int(11) NOT NULL DEFAULT 0,
  `top_news` int(11) DEFAULT 0,
  `slider_news` int(11) DEFAULT 0,
  `spot_light` int(11) NOT NULL DEFAULT 0,
  `breaking` tinyint(4) NOT NULL DEFAULT 0,
  `footer_news` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:pending;id:publised_id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ref_no` varchar(200) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL DEFAULT 0,
  `menu_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `article_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `specifications` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) NOT NULL,
  `fec_image` varchar(255) NOT NULL,
  `meta_kw` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `viewed` int(11) NOT NULL DEFAULT 0,
  `dl` bigint(20) NOT NULL,
  `buyable` tinyint(4) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `open_date` datetime NOT NULL,
  `expire_date` date NOT NULL,
  `cmt` tinyint(2) NOT NULL DEFAULT 1,
  `delicious` tinyint(4) NOT NULL DEFAULT 0,
  `active` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

DROP TABLE IF EXISTS `article_categories`;
CREATE TABLE `article_categories` (
  `cat_id` int(11) NOT NULL,
  `menu_text` varchar(255) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_kw` varchar(255) NOT NULL,
  `meta_desc` text NOT NULL,
  `viewed` int(11) NOT NULL DEFAULT 0,
  `parent` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `topbanner` tinyint(4) NOT NULL DEFAULT 0,
  `middle_topbanner` tinyint(2) NOT NULL DEFAULT 1,
  `middlebanner` tinyint(2) NOT NULL DEFAULT 1,
  `rightbanner` tinyint(4) NOT NULL DEFAULT 0,
  `show_img` enum('Left','Right','None') NOT NULL DEFAULT 'Right',
  `img_link` varchar(255) NOT NULL,
  `make_link` tinyint(2) NOT NULL DEFAULT 1,
  `rm_href` tinyint(2) NOT NULL DEFAULT 1,
  `rm_meta_desc` tinyint(4) NOT NULL DEFAULT 0,
  `active` int(2) NOT NULL DEFAULT 1,
  `no_index` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bas_district`
--

DROP TABLE IF EXISTS `bas_district`;
CREATE TABLE `bas_district` (
  `DistrictID` tinyint(3) UNSIGNED NOT NULL,
  `DivisionID` tinyint(3) UNSIGNED NOT NULL DEFAULT 6 COMMENT 'FK (t_division - DivisionID)',
  `DistrictName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `DistrictNameBN` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) NOT NULL,
  `image_url` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bas_district`
--

INSERT INTO `bas_district` (`DistrictID`, `DivisionID`, `DistrictName`, `DistrictNameBN`, `parent`, `image_url`, `date_added`, `status`) VALUES
(1, 1, '-- NONE --', '-- অন্য খবর --', 0, '', '2019-02-20 07:36:18', 1),
(2, 2, 'Barguna', 'বরগুনা', 0, 'http://www.fns24.com/resources/images/zone/2_image_url_barguna.jpg', '2019-02-20 07:36:18', 1),
(3, 2, 'Barisal', 'বরিশাল', 0, 'http://www.fns24.com/resources/images/zone/3_image_url_Barisal.jpg', '2019-02-20 07:36:18', 1),
(4, 2, 'Bhola', 'ভোলা', 0, 'http://www.fns24.com/resources/images/zone/4_image_url_bhola.jpg', '2019-02-20 07:36:18', 1),
(5, 2, 'Jhalokati', 'ঝালকাঠী', 0, 'http://www.fns24.com/resources/images/zone/5_image_url_jhalakathi.jpg', '2019-02-20 07:36:18', 1),
(6, 2, 'Pirojpur', 'পিরোজপুর', 0, 'http://www.fns24.com/resources/images/zone/6_image_url_pirojpur.jpg', '2019-02-20 07:36:18', 1),
(7, 2, 'Patuakhali', 'পটুয়াখালি', 0, 'http://www.fns24.com/resources/images/zone/7_image_url_Patuakhali.jpg', '2019-02-20 07:36:18', 1),
(8, 3, 'Bandarban', 'বান্দরবান', 0, 'http://www.fns24.com/resources/images/zone/8_image_url_Bardarban.jpg', '2019-02-20 07:36:18', 1),
(9, 3, 'Rangamati', 'রাঙামাটি', 0, 'http://www.fns24.com/resources/images/zone/9_image_url_Rangamati.jpg', '2019-02-20 07:36:18', 1),
(10, 3, 'Khagrachhari', 'খাগড়াছড়ি', 0, 'http://www.fns24.com/resources/images/zone/10_image_url_KHAGRASORI.jpg', '2019-02-20 07:36:18', 1),
(11, 3, 'Coxs-Bazar', 'কক্সবাজার', 0, 'http://www.fns24.com/resources/images/zone/11_image_url_COXBAZAR.jpg', '2019-02-20 07:36:18', 1),
(12, 3, 'Chittagong', 'চট্টগ্রাম', 0, 'http://www.fns24.com/resources/images/zone/12_image_url_Chittagong.jpg', '2019-02-20 07:36:18', 1),
(13, 3, 'Feni', 'ফেনী', 0, 'http://www.fns24.com/resources/images/zone/13_image_url_feni.jpg', '2019-02-20 07:36:18', 1),
(14, 3, 'Noakhali', 'নোয়াখালী', 0, 'http://www.fns24.com/resources/images/zone/14_image_url_noakhali.jpg', '2019-02-20 07:36:18', 1),
(15, 3, 'Lakshmipur', 'লক্ষ্মীপুর', 0, 'http://www.fns24.com/resources/images/zone/15_image_url_Lakshmipur.jpg', '2019-02-20 07:36:18', 1),
(16, 3, 'Comilla', 'কুমিল্লা', 0, 'http://www.fns24.com/resources/images/zone/16_image_url_comilla.jpg', '2019-02-20 07:36:18', 1),
(17, 3, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', 0, 'http://www.fns24.com/resources/images/zone/17_image_url_Brahmonbaria.jpg', '2019-02-20 07:36:18', 1),
(18, 3, 'Chandpur', 'চাঁদপুর', 0, 'http://www.fns24.com/resources/images/zone/18_image_url_Chandpur.jpg', '2019-02-20 07:36:18', 1),
(19, 4, 'Dhaka', 'ঢাকা', 0, 'http://www.fns24.com/resources/images/zone/19_image_url_Dhaka.jpg', '2019-02-20 07:36:18', 1),
(20, 4, 'Manikganj', 'মানিকগঞ্জ', 0, 'http://www.fns24.com/resources/images/zone/20_image_url_manikganj.jpg', '2019-02-20 07:36:18', 1),
(21, 4, 'Gazipur', 'গাজীপুর', 0, 'http://www.fns24.com/resources/images/zone/21_image_url_gazipur.jpg', '2019-02-20 07:36:18', 1),
(22, 9, 'Mymensingh', 'ময়মনসিংহ', 0, 'http://www.fns24.com/resources/images/zone/22_image_url_Mymansingh.jpg', '2019-02-20 07:36:18', 1),
(23, 4, 'Narayanganj', 'নারায়ণগঞ্জ', 0, 'http://www.fns24.com/resources/images/zone/23_image_url_Narayangonj.jpg', '2019-02-20 07:36:18', 1),
(24, 4, 'Tangail', 'টাঙ্গাইল', 0, 'http://www.fns24.com/resources/images/zone/24_image_url_Tangail.jpg', '2019-02-20 07:36:18', 1),
(25, 4, 'Madaripur', 'মাদারীপুর', 0, 'http://www.fns24.com/resources/images/zone/25_image_url_Madaripur.jpg', '2019-02-20 07:36:18', 1),
(26, 9, 'Jamalpur', 'জামালপুর', 0, 'http://www.fns24.com/resources/images/zone/26_image_url_jamalpur.jpg', '2019-02-20 07:36:18', 1),
(27, 4, 'Munshiganj', 'মুন্সিগঞ্জ', 0, 'http://www.fns24.com/resources/images/zone/27_image_url_Munsiganj.jpg', '2019-02-20 07:36:18', 1),
(28, 4, 'Gopalganj', 'গোপালগঞ্জ', 0, 'http://www.fns24.com/resources/images/zone/28_image_url_gopalgong.jpg', '2019-02-20 07:36:18', 1),
(29, 9, 'Sherpur', 'শেরপুর', 0, 'http://www.fns24.com/resources/images/zone/29_image_url_sherpur.jpeg', '2019-02-20 07:36:18', 1),
(30, 4, 'Kishoreganj', 'কিশোরগঞ্জ', 0, 'http://www.fns24.com/resources/images/zone/30_image_url_Kishorgonj.jpg', '2019-02-20 07:36:18', 1),
(31, 4, 'Narsingdi', 'নরসিংদী', 0, 'http://www.fns24.com/resources/images/zone/31_image_url_Norshingdi.jpg', '2019-02-20 07:36:18', 1),
(32, 4, 'Shariatpur', 'শরীয়তপুর', 0, 'http://www.fns24.com/resources/images/zone/32_image_url_Shariatpur.jpg', '2019-02-20 07:36:18', 1),
(33, 9, 'Netrokona', 'নেত্রকোনা', 0, 'http://www.fns24.com/resources/images/zone/33_image_url_netrocona.jpg', '2019-02-20 07:36:18', 1),
(34, 4, 'Rajbari', 'রাজবাড়ী', 0, 'http://www.fns24.com/resources/images/zone/34_image_url_Rajbari.jpg', '2019-02-20 07:36:18', 1),
(35, 4, 'Faridpur', 'ফরিদপুর', 0, 'http://www.fns24.com/resources/images/zone/35_image_url_Faridpur.jpg', '2019-02-20 07:36:18', 1),
(36, 5, 'Bagerhat', 'বাগেরহাট', 0, 'http://www.fns24.com/resources/images/zone/36_image_url_Bagerhat.jpg', '2019-02-20 07:36:18', 1),
(37, 5, 'Chuadanga', 'চুয়াডাঙা', 0, 'http://www.fns24.com/resources/images/zone/37_image_url_Chuadanga.jpg', '2019-02-20 07:36:18', 1),
(38, 5, 'Jessore', 'যশোর', 0, 'http://www.fns24.com/resources/images/zone/38_image_url_Jessore.jpg', '2019-02-20 07:36:18', 1),
(39, 5, 'Jhenaidah', 'ঝিনাইদহ', 0, 'http://www.fns24.com/resources/images/zone/39_image_url_Jhenaidah.jpg', '2019-02-20 07:36:18', 1),
(40, 5, 'Khulna', 'খুলনা', 0, 'http://www.fns24.com/resources/images/zone/40_image_url_Khulna.jpg', '2019-02-20 07:36:18', 1),
(41, 5, 'Kushtia', 'কুষ্টিয়া', 0, 'http://www.fns24.com/resources/images/zone/41_image_url_Kushtia.jpg', '2019-02-20 07:36:18', 1),
(42, 5, 'Magura', 'মাগুরা', 0, 'http://www.fns24.com/resources/images/zone/42_image_url_magura.jpg', '2019-02-20 07:36:18', 1),
(43, 5, 'Meherpur', 'মেহেরপুর', 0, 'http://www.fns24.com/resources/images/zone/43_image_url_Meherpur.jpg', '2019-02-20 07:36:18', 1),
(44, 5, 'Narail', 'নড়াইল', 0, 'http://www.fns24.com/resources/images/zone/44_image_url_narail.jpg', '2019-02-20 07:36:18', 1),
(45, 5, 'Satkhira', 'সাতক্ষীরা', 0, 'http://www.fns24.com/resources/images/zone/45_image_url_Satkhira.jpg', '2019-02-20 07:36:18', 1),
(46, 6, 'Bogra', 'বগুড়া', 0, 'http://www.fns24.com/resources/images/zone/46_image_url_bogra.jpg', '2019-02-20 07:36:18', 1),
(47, 6, 'Joypurhat', 'জয়পুরহাট', 0, 'http://www.fns24.com/resources/images/zone/47_image_url_Joypurhat.jpg', '2019-02-20 07:36:18', 1),
(48, 6, 'Naogaon', 'নওগাঁ', 0, 'http://www.fns24.com/resources/images/zone/48_image_url_Naoga.jpg', '2019-02-20 07:36:18', 1),
(49, 6, 'Natore', 'নাটোর', 0, 'http://www.fns24.com/resources/images/zone/49_image_url_Natore.jpg', '2019-02-20 07:36:18', 1),
(51, 6, 'Pabna', 'পাবনা', 0, 'http://www.fns24.com/resources/images/zone/51_image_url_Pabna.jpg', '2019-02-20 07:36:18', 1),
(52, 6, 'Rajshahi', 'রাজশাহী', 0, 'http://www.fns24.com/resources/images/zone/52_image_url_Rajsahi.jpg', '2019-02-20 07:36:18', 1),
(53, 6, 'Sirajganj', 'সিরাজগঞ্জ', 0, 'http://www.fns24.com/resources/images/zone/53_image_url_shirajgonj.jpg', '2019-02-20 07:36:18', 1),
(54, 8, 'Dinajpur', 'দিনাজপুর', 0, 'http://www.fns24.com/resources/images/zone/54_image_url_Dinajpur.jpg', '2019-02-20 07:36:18', 1),
(55, 8, 'Gaibandha', 'গাইবান্ধা', 0, 'http://www.fns24.com/resources/images/zone/55_image_url_Gaibandha.jpg', '2019-02-20 07:36:18', 1),
(56, 8, 'Kurigram', 'কুড়িগ্রাম', 0, 'http://www.fns24.com/resources/images/zone/56_image_url_Kurigram.jpg', '2019-02-20 07:36:18', 1),
(57, 8, 'Lalmonirhat', 'লালমনিরহাট', 0, 'http://www.fns24.com/resources/images/zone/57_image_url_lalmonirhat.jpg', '2019-02-20 07:36:18', 1),
(58, 8, 'Nilphamari', 'নীলফামারী', 0, 'http://www.fns24.com/resources/images/zone/58_image_url_nilfamari.jpg', '2019-02-20 07:36:18', 1),
(59, 8, 'Panchagarh', 'পঞ্চগড়', 0, 'http://www.fns24.com/resources/images/zone/59_image_url_Panchagar.jpg', '2019-02-20 07:36:18', 1),
(60, 8, 'Rangpur', 'রংপুর', 0, 'http://www.fns24.com/resources/images/zone/60_image_url_rangpur.jpg', '2019-02-20 07:36:18', 1),
(61, 8, 'Thakurgaon', 'ঠাকুরগাঁও', 0, 'http://www.fns24.com/resources/images/zone/61_image_url_Thakurgaon.jpg', '2019-02-20 07:36:18', 1),
(62, 7, 'Habiganj', 'হবিগঞ্জ', 0, 'http://www.fns24.com/resources/images/zone/62_image_url_Hobiganj.jpg', '2019-02-20 07:36:18', 1),
(63, 7, 'Moulvibazar', 'মৌলভীবাজার', 0, 'http://www.fns24.com/resources/images/zone/63_image_url_Moulvibazar.jpg', '2019-02-20 07:36:18', 1),
(64, 7, 'Sunamganj', 'সুনামগঞ্জ', 0, 'http://www.fns24.com/resources/images/zone/64_image_url_Sunamganj.jpg', '2019-02-20 07:36:18', 1),
(65, 7, 'Sylhet', 'সিলেট', 0, 'http://www.fns24.com/resources/images/zone/65_image_url_Sylhet.jpg', '2019-02-20 07:36:18', 1),
(66, 6, 'Chapai-Nawabganj', 'চাঁপাইনবাবগঞ্জ', 0, 'http://www.fns24.com/resources/images/zone/66_image_url_chapai-nawabganj.jpg', '2019-02-20 07:36:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bas_division`
--

DROP TABLE IF EXISTS `bas_division`;
CREATE TABLE `bas_division` (
  `DivisionID` tinyint(3) UNSIGNED NOT NULL,
  `DivisionName` varchar(12) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `DivisionNameBN` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bas_division`
--

INSERT INTO `bas_division` (`DivisionID`, `DivisionName`, `DivisionNameBN`) VALUES
(1, 'NONE', 'অন্য খবর'),
(2, 'Barisal', 'বরিশাল'),
(3, 'Chittagong', 'চট্টগ্রাম'),
(4, 'Dhaka', 'ঢাকা'),
(5, 'Khulna', 'খুলনা'),
(6, 'Rajshahi', 'রাজশাহী'),
(7, 'Sylhet', 'সিলেট'),
(8, 'Rangpur', 'রংপুর'),
(9, 'Mymensingh', 'ময়মনসিংহ');

-- --------------------------------------------------------

--
-- Table structure for table `bn_bas_category`
--

DROP TABLE IF EXISTS `bn_bas_category`;
CREATE TABLE `bn_bas_category` (
  `CategoryID` int(3) UNSIGNED NOT NULL,
  `CategoryName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `CatRemarks` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT 0,
  `Priority` int(3) UNSIGNED NOT NULL DEFAULT 1,
  `ImagePathIcon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ImagePathMenu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ImagePathCoverHome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ImagePathCoverInner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ShowData` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1-Show, 2-Hide',
  `Deletable` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1-Not Deleted, 2-Deleted',
  `image_url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bn_bas_category`
--

INSERT INTO `bn_bas_category` (`CategoryID`, `CategoryName`, `CatRemarks`, `parent`, `Priority`, `ImagePathIcon`, `ImagePathMenu`, `ImagePathCoverHome`, `ImagePathCoverInner`, `ShowData`, `Deletable`, `image_url`, `status`) VALUES
(1, 'জাতীয়', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(2, 'রাজনীতি', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(10, 'মুক্তমত', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(11, 'প্রবাস', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(12, 'শিক্ষা', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(13, 'প্রেসরিলিজ', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(14, 'জেলার খবর', '', 0, 1, '', '', '', '', 0, 1, '', 1),
(15, 'সাহিত্য', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(3, 'অর্থনীতি', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(4, 'বিদেশ', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(5, 'খেলা', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(6, 'বিনোদন', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(7, 'লাইফস্টাইল', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(8, 'তথ্য-প্রযুক্তি', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(9, 'স্বাস্থ্য', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(16, 'ফিচার', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(17, 'প্রকৃতি ও পরিবেশ', '', 0, 1, '', '', '', '', 1, 1, '', 1),
(18, 'সম্পাদকীয়', 'sddsdf', 0, 1, NULL, NULL, '', NULL, 1, 1, 'http://www.fns24.com/resources/images/catimage/18_image_url_fns editorial_logo.jpg', 1),
(19, 'বিশেষ সংবাদ', 'বিশেষ সংবাদ', 0, 20, NULL, NULL, NULL, NULL, 1, 1, '', 1),
(20, 'ধর্ম', 'ধর্ম', 0, 21, NULL, NULL, NULL, NULL, 1, 1, '', 1),
(21, 'USA News', 'as', 0, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bn_breaking`
--

DROP TABLE IF EXISTS `bn_breaking`;
CREATE TABLE `bn_breaking` (
  `BreakingID` bigint(20) UNSIGNED NOT NULL,
  `BreakingHead` text COLLATE utf8_unicode_ci NOT NULL,
  `DateTimeInserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Deletable` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1-Not Deleted, 2-Deleted'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `breaking_news`
--

DROP TABLE IF EXISTS `breaking_news`;
CREATE TABLE `breaking_news` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `comment_type` varchar(255) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `type_id` int(11) NOT NULL,
  `album_cover` tinyint(2) NOT NULL DEFAULT 0,
  `slider_image` tinyint(2) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_caption` mediumtext DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `image_ext` varchar(200) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image_albums`
--

DROP TABLE IF EXISTS `image_albums`;
CREATE TABLE `image_albums` (
  `album_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cat_id` varchar(100) NOT NULL DEFAULT '0',
  `album_title` varchar(255) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `reporter` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `album_images` text DEFAULT NULL,
  `fec_image` varchar(255) DEFAULT NULL,
  `meta_kw` varchar(255) DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `viewed` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `cmt` tinyint(2) NOT NULL DEFAULT 1,
  `delicious` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image_categories`
--

DROP TABLE IF EXISTS `image_categories`;
CREATE TABLE `image_categories` (
  `cat_id` int(11) NOT NULL,
  `menu_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_order` int(11) NOT NULL,
  `image_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_kw` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `viewed` int(11) NOT NULL DEFAULT 0,
  `parent` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `show_img` enum('Left','Right','None') NOT NULL DEFAULT 'Right',
  `active` int(2) NOT NULL DEFAULT 1,
  `no_index` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `image_categories`
--

INSERT INTO `image_categories` (`cat_id`, `menu_text`, `menu_order`, `image_title`, `seo_title`, `description`, `title`, `meta_kw`, `meta_desc`, `viewed`, `parent`, `created`, `show_img`, `active`, `no_index`) VALUES
(1, 'ফিচার', 1, 'ফিচার', 'featuredphoto', '', '', '', '', 0, 0, '2019-03-01 19:06:19', 'Right', 1, 0),
(2, 'ঢাকার বাইরে', 2, 'ঢাকার বাইরে', 'outsidedhaka', '', '', '', '', 0, 0, '2019-03-01 19:08:44', 'Right', 1, 0),
(3, 'ভ্রমণ', 3, 'ভ্রমণ', 'tourphoto', '', '', '', '', 0, 0, '2019-03-01 19:09:02', 'Right', 1, 0),
(4, 'বিনোদন', 5, 'বিনোদন', 'binodonphoto', '', '', '', '', 0, 0, '2019-03-01 19:10:48', 'Right', 1, 0),
(5, 'ফিচার - 2', 6, 'ফিচার - 2', 'feature2', '', '', '', '', 0, 0, '2019-03-01 19:11:36', 'Right', 1, 0),
(6, 'ওয়ার্ল্ড', 7, 'ওয়ার্ল্ড', 'worldphoto', '', '', '', '', 0, 0, '2019-03-01 19:12:35', 'Right', 1, 0),
(7, 'দর্শনীয় স্থান', 7, 'দর্শনীয় স্থান', 'touristplacephoto', '', '', '', '', 0, 0, '2019-03-02 17:28:57', 'Right', 1, 0),
(8, 'ডেইলি ফটো', 8, 'ডেইলি ফটো', 'dailyphoto', '', '', '', '', 0, 0, '2019-03-03 14:38:31', 'Right', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `np_ad_newsportal`
--

DROP TABLE IF EXISTS `np_ad_newsportal`;
CREATE TABLE `np_ad_newsportal` (
  `user_id` int(10) NOT NULL,
  `url_name` varchar(300) NOT NULL,
  `editor_name` varchar(300) NOT NULL,
  `mobile` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `address` varchar(400) NOT NULL,
  `dat` varchar(10) NOT NULL,
  `mon` varchar(10) NOT NULL,
  `yer` varchar(10) NOT NULL,
  `adat` varchar(300) NOT NULL,
  `pic` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `np_menuname`
--

DROP TABLE IF EXISTS `np_menuname`;
CREATE TABLE `np_menuname` (
  `menu_id` int(10) NOT NULL,
  `menuname` varchar(140) NOT NULL,
  `parent` tinyint(4) NOT NULL DEFAULT 0,
  `Priority` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `np_news`
--

DROP TABLE IF EXISTS `np_news`;
CREATE TABLE `np_news` (
  `paper_id` int(10) NOT NULL,
  `dat` varchar(100) DEFAULT NULL,
  `mon` varchar(100) DEFAULT NULL,
  `yer` varchar(100) DEFAULT NULL,
  `categories` varchar(100) DEFAULT NULL,
  `addpicture` varchar(100) DEFAULT NULL,
  `newstitle` text DEFAULT NULL,
  `news` text DEFAULT NULL,
  `add1` varchar(100) DEFAULT NULL,
  `add2` varchar(100) DEFAULT NULL,
  `add3` varchar(100) DEFAULT NULL,
  `add4` varchar(100) DEFAULT NULL,
  `reporter` varchar(200) DEFAULT NULL,
  `w1` varchar(200) DEFAULT NULL,
  `w2` varchar(200) DEFAULT NULL,
  `w3` varchar(200) DEFAULT NULL,
  `w4` varchar(200) DEFAULT NULL,
  `w5` varchar(200) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `news_count` int(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gallery` varchar(10) DEFAULT NULL,
  `exclusive` varchar(10) DEFAULT NULL,
  `t10` text DEFAULT NULL,
  `mom1` varchar(10) DEFAULT NULL,
  `mom2` varchar(10) DEFAULT NULL,
  `serial` int(100) NOT NULL,
  `paper_name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `np_passcreate`
--

DROP TABLE IF EXISTS `np_passcreate`;
CREATE TABLE `np_passcreate` (
  `user_id` int(10) NOT NULL,
  `pic` varchar(300) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `comments` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pagemanager`
--

DROP TABLE IF EXISTS `pagemanager`;
CREATE TABLE `pagemanager` (
  `page_id` tinyint(4) NOT NULL,
  `lang` varchar(255) NOT NULL DEFAULT 'en',
  `parent` int(11) NOT NULL DEFAULT 0,
  `page_name` varchar(255) NOT NULL,
  `page_title` text NOT NULL,
  `page_subtitle` varchar(255) NOT NULL,
  `page_browser_title` varchar(255) NOT NULL,
  `meta_kw` varchar(255) NOT NULL,
  `meta_desc` text NOT NULL,
  `fec_image` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `page_content` mediumtext NOT NULL,
  `topbanner` tinyint(2) NOT NULL DEFAULT 1,
  `middle_topbanner` tinyint(2) NOT NULL DEFAULT 1,
  `middlebanner` tinyint(2) NOT NULL DEFAULT 1,
  `rightbanner` tinyint(2) NOT NULL DEFAULT 1,
  `show_img` enum('Left','Right','None') NOT NULL DEFAULT 'None',
  `img_link` varchar(255) NOT NULL,
  `make_link` tinyint(2) NOT NULL DEFAULT 1,
  `rm_href` tinyint(2) NOT NULL DEFAULT 1,
  `rm_meta_desc` tinyint(4) NOT NULL DEFAULT 0,
  `short` int(11) NOT NULL,
  `active` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pagemanager`
--

INSERT INTO `pagemanager` (`page_id`, `lang`, `parent`, `page_name`, `page_title`, `page_subtitle`, `page_browser_title`, `meta_kw`, `meta_desc`, `fec_image`, `banner_image`, `page_content`, `topbanner`, `middle_topbanner`, `middlebanner`, `rightbanner`, `show_img`, `img_link`, `make_link`, `rm_href`, `rm_meta_desc`, `short`, `active`) VALUES
(4, 'en', 0, 'notices', 'Notices', 'Notices', 'Notices', 'df', 'asd', '', '', 'Notice board related content goes here asdsadddd ssss', 1, 1, 1, 1, 'None', '', 1, 1, 0, 0, 0),
(3, 'en', 0, 'privacy-policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy,Privacy Policy,Privacy Policy', 'Privacy Policy,Privacy Policy,Privacy Policy,Privacy Policy', '', '', '<p>Privacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Policy</p>\r\n<p>Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy</p>\r\n<p>PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy</p>\r\n<p>PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy Privacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPrivacy PolicyPolicyPrivacy PolicyPrivacy PolicyPrivacy Policy</p>\r\n<p>&nbsp;</p>', 1, 1, 1, 1, 'Right', '', 1, 1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `script_log`
--

DROP TABLE IF EXISTS `script_log`;
CREATE TABLE `script_log` (
  `id` bigint(20) NOT NULL,
  `type` varchar(200) NOT NULL,
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_text` mediumtext NOT NULL,
  `log_link` varchar(200) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `opt_group` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `title` varchar(255) NOT NULL,
  `params` mediumtext NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `opt_group`, `key`, `value`, `title`, `params`, `created`) VALUES
(120, 'basic', 'ENABLE_RSS_FEED', 'yes', 'Active RSS Feeds', '', '2019-04-16 09:02:36'),
(5, 'info', 'CONTACT_EMAIL', 'fnsbangla@gmail.com', 'Contact Email', '', '2020-03-26 19:48:27'),
(6, 'basic', 'PAGING_PER_PAGE', '10', 'Paging Per Page', '', '2010-05-11 10:14:01'),
(7, 'basic', 'CAPTCHA_MODE', '0', 'Captcha Mode', '', '2015-11-08 12:22:00'),
(8, 'info', 'EMAIL_SIGNATURE', 'FNS24', 'Signature', '', '2020-03-26 19:48:38'),
(9, 'info', 'SITE_ADMIN_EMAIL', 'bfouzder@gmail.com', 'Site Admin Email', '', '2019-04-16 09:02:11'),
(10, 'info', 'SITE_ADMIN_NAME', 'Fardin Radoan', 'Site Admin Name', '', '2021-10-26 08:07:56'),
(14, 'basic', 'REGISTER_VALIDATION', '0', 'User Verification', '', '2015-11-08 12:21:12'),
(119, 'meta', 'SCRIPT_META_KEYWORD', 'about, this, that, same, with, is, by', 'Common Meta Keywords', '', '2010-08-06 20:08:40'),
(130, 'adsense', 'AR_GOOGL_ADS_1', '', 'Ads 1 (Home Page)', '', '2021-01-03 07:24:20'),
(131, 'adsense', 'AR_GOOGL_ADS_2', '', 'Ads 2 (Home Page)', '', '2021-01-03 07:24:14'),
(132, 'adsense', 'AR_GOOGL_ADS_3', 'Ads here..', 'Ads 3 (Home Page)', '', '2020-03-28 19:00:12'),
(133, 'adsense', 'AR_GOOGL_ADS_4', 'Ads here..', 'Ads 4 (Home Page)', '', '2020-03-28 19:01:18'),
(134, 'adsense', 'AR_GOOGL_ADS_5', 'Ads here..', 'Ads 5 (Home Page)', '', '2020-03-28 19:01:26'),
(135, 'adsense', 'AR_GOOGL_ADS_6', 'Ads here..', 'Ads 6 (Home Page)', '', '2020-03-28 19:01:32'),
(136, 'adsense', 'AR_GOOGL_ADS_7', 'Ads here..', 'Ads 7 (Home Page)', '', '2020-03-28 19:13:52'),
(137, 'adsense', 'AR_GOOGL_ADS_8', 'Ads here..', 'Ads 8 (Home Page)', '', '2020-03-28 19:14:06'),
(138, 'adsense', 'AR_GOOGL_ADS_9', '', 'Ads 9 (Category Page)', '', '2021-01-03 07:25:35'),
(139, 'adsense', 'AR_GOOGL_ADS_10', '', 'Ads 10 (Category Page)', '', '2021-01-03 07:24:35'),
(140, 'adsense', 'AR_GOOGL_ADS_11', '', 'Ads 11 (Detail Page)', '', '2021-01-03 07:24:07'),
(141, 'adsense', 'AR_GOOGL_ADS_12', '', 'Ads 12 (Detail Page)', '', '2021-01-03 07:23:40'),
(142, 'meta', 'AR_HEAD_CODE', '<!-- Global site tag (gtag.js) - Google Analytics -->\r\n<script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-155225535-1\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n  gtag(\'config\', \'UA-155225535-1\');\r\n</script>\r\n<script data-ad-client=\"ca-pub-9495128235289454\" async src=\"https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>', 'Google Analytics', '', '2020-08-30 17:37:16'),
(143, 'meta', 'AR_AFTER_BODY_CODE', '', 'After body tag', '', '2020-03-28 18:35:37'),
(144, 'meta', 'AR_FOOTER_CODE', '', 'Code on footer', '', '2020-03-28 18:35:37'),
(145, 'address', 'AR_FOOTER_ADDRESS', 'ফেয়ার নিউজ সার্ভিস লিমিটেড।<br/>\r\nআয়েশা আক্তার ভবন.<br/>\r\n১০ম তলা, ফ্ল্যাট নং: ১০এ,<br/>\r\n২৪/ডি তোপখানা রোড,<br/>\r\nসেগুন বাগিচা \r\nঢাকা - ১০০০।<br/>\r\nমোবাইল: ০১৭৮১৯০৬০৫২, ০১৭৯৭৫৬৯৬০৬। ফোন : ০২ ৪৭১২০৭৭৯-৮৩ <br/>\r\nইমেইল: <a href=\"mailto:fnspress@gmail.com\">fnspress@gmail.com</a>', 'অফিসের ঠিকানা', '', '2021-03-10 08:19:39'),
(146, 'show-hide', 'AR_SHOW_TOP_16_NEWS', 'ON', 'Show Top 16 News', '', '2021-08-26 11:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` mediumint(11) UNSIGNED NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_rawpass` varchar(200) DEFAULT NULL,
  `viewed` int(11) NOT NULL DEFAULT 0,
  `user_email` varchar(200) NOT NULL,
  `user_public_email` varchar(100) DEFAULT NULL,
  `user_fname` varchar(100) DEFAULT NULL,
  `user_lname` varchar(100) DEFAULT NULL,
  `user_designation` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `user_gender` varchar(100) DEFAULT NULL,
  `user_birthdate` date DEFAULT NULL,
  `user_picture` varchar(200) DEFAULT NULL,
  `user_address` longtext DEFAULT NULL,
  `user_fax` varchar(200) DEFAULT NULL,
  `user_mobile` varchar(100) DEFAULT NULL,
  `user_web` varchar(255) DEFAULT NULL,
  `user_country` varchar(100) DEFAULT NULL,
  `user_state` varchar(100) DEFAULT NULL,
  `user_city` varchar(100) DEFAULT NULL,
  `user_nid` varchar(200) DEFAULT NULL,
  `user_ip` bigint(20) UNSIGNED DEFAULT NULL,
  `user_role` varchar(200) DEFAULT NULL,
  `user_status` tinyint(3) NOT NULL DEFAULT 1,
  `user_banned` int(11) DEFAULT NULL,
  `user_banned_reason` longtext DEFAULT NULL,
  `validate_code` varchar(50) DEFAULT NULL,
  `user_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_lastlogin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_lastupdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `newsletter` tinyint(2) NOT NULL DEFAULT 0,
  `login` tinyint(4) DEFAULT NULL,
  `theme` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_rawpass`, `viewed`, `user_email`, `user_public_email`, `user_fname`, `user_lname`, `user_designation`, `company_name`, `user_gender`, `user_birthdate`, `user_picture`, `user_address`, `user_fax`, `user_mobile`, `user_web`, `user_country`, `user_state`, `user_city`, `user_nid`, `user_ip`, `user_role`, `user_status`, `user_banned`, `user_banned_reason`, `validate_code`, `user_created`, `user_lastlogin`, `user_lastupdate`, `newsletter`, `login`, `theme`) VALUES
(1, 'aditya', '21b8a85727224af6ae96bc60c4c15b5a', 'aditya', 13, 'aditya.fouzder@link3.net', '', 'Aditya Fouzder', '', 'Deputy Manager', '', 'Male', '1982-01-26', '1_user_picture_aditya_profile.jpg', '', '', '01912527479', '', '', '', '', '', 0, '', 1, 0, '', '', '2015-12-27 11:25:51', '2016-01-20 06:36:12', '0000-00-00 00:00:00', 0, 0, ''),
(3, 'saykat', 'ce9002daaf051cd7233775d69a254220', 'saykat', 1, 'ahsaykat@gmail.com', '', 'Saykat', '', 'Head of online', '', 'Female', '1988-02-10', '3_user_picture_Diamond_eye_1280 x 800 widescreen.jpg', '', '', '01916323536', '', '', '', '', '', 0, 'Environmental', 1, 0, '', '', '2016-02-12 11:46:17', '2016-02-12 12:47:29', '0000-00-00 00:00:00', 0, 0, ''),
(4, 'Aditya', '365a24cdead87c0a05e9ede4919cd172', 'CcITS', 0, 'bfouzder@yahoo.com', '', '', '', '', '', '', '0000-00-00', NULL, '', '', '01787667449', '', '', '', '', '', 0, '', 1, 0, '', '', '2020-01-02 11:25:30', '2020-02-12 11:13:45', '0000-00-00 00:00:00', 0, 1, ''),
(5, 'Jahangir Alam Babu', 'ce9002daaf051cd7233775d69a254220', 'saykat', 0, 'fnsbangla@gmail.com', '', '', '', '', '', '', '0000-00-00', NULL, '', '', '01984 300575', '', '', '', '', '', 0, '', 1, 0, '', '', '2020-01-02 12:28:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, ''),
(6, 'ফেয়ার নিউজ সার্ভিস লি:', 'ce9002daaf051cd7233775d69a254220', 'saykat', 0, 'fnsltd@dhaka.net', '', '', '', '', '', '', '0000-00-00', NULL, '', '', '০১৭৮১৯০৬০৫০', '', '', '', '', '', 0, '', 1, 0, '', '', '2020-01-03 06:35:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, ''),
(8, 'MKFouzder', 'cb64ecd01d10fd260b5051d132209209', 'mkfouzder', 0, 'mkfouzder@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01717327466', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-01-04 19:02:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(9, 'Abu Shahed Sharkar', 'bb5f5009db3dbb5cf059083053704b45', 'shahed1993', 0, 'shahed.internet@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01815794720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-01-08 09:40:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(10, 'ফেয়ার নিউজ সার্ভিস লি:', 'cec345c79fa7668e97ff4b1cd6aad177', '@fns20021#', 0, 'fnsinfo.bd@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01781906052', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-01-11 07:59:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(11, 'masudrana', '0950cf7e188f84e28a6c922a40ddb3c6', '968294', 0, 'masudbaliakandi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01711049035', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-01-14 11:58:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(12, 'মেহেদী হাসান', 'a2fd4f0f271e4d50cc6c11f57c0bdb10', 'mdmeheditt14', 0, 'mdmeheditt14@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01305739808', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-02-25 12:29:11', '2021-05-08 13:44:57', '0000-00-00 00:00:00', 0, 1, NULL),
(13, 'Alime Khan', 'ca5c951abb2c652185b3fb19992ed42e', '01920368444', 0, 'mdalime61@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01794036173', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-03-18 10:24:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(14, 'Mkbr', '4ae5d5950ddab334fe04a7b84a3d7c42', 'mkbr@01', 0, 'mkbrashes@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01643743569', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-04-12 16:09:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(15, 'Rajoan Ahmed Fahim', '7d867ebb6563103c95968b1b1a5a7909', 'PLAYBOY123', 0, 'rajoan.ahmed.fahim@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01791823830', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-04-23 04:39:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(16, 'Belal hosen', '7d867ebb6563103c95968b1b1a5a7909', 'PLAYBOY123', 0, 'raf77.official@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01760571569', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-04-24 10:00:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(17, 'Ishtiaque', '0c8450c0a4dc7834a4994d112db6ca50', '01717603998', 0, 'hasan489948@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01515232996', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-05-17 13:32:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(18, 'মোঃ হালিমুল ইসলাম হালিম', '73cd9a1ec5e7c4192d8c4f37b88fea9a', 'halimulhalim', 0, 'halimulhalim@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01712819179', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-05-20 09:32:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(19, 'chip', 'd7242138a1452a48c2d61c54d835c4b2', 'chipdebios', 0, 'chipdebios@yopmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'chip', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-06-07 07:46:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(20, 'admin', 'c00caaa2423a97e1e15cad4f4c3226d8', 'admin', 0, 'admin@yopmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-06-07 07:58:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(21, 'test', 'da4956b1449a38f90ff1723a554eb873', 'test', 0, 'test@yopmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-06-07 08:05:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(22, 'মো. নিয়ামুল হাসান নিয়াজ', '496185f6d6c35f94835f6ab8b0aad545', '01751124030', 0, 'neaz2016@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01751124030', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-06-15 05:44:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(23, 'Md Nahid Al Malek', '1649039d63cffa7e136663201a01d5ba', 'nahid3344', 0, 'nahidal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01712266374', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-06-17 10:15:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(24, 'শেখ জাহিদুল ইসলাম', '82bd35a516c3b2e343e267b149b572f9', '01711059824', 0, 'jbcjahidislam@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '০১৯২০০৯৯১২২', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-07-08 14:18:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(25, 'মোঃ বাবুল হোসেন', 'a7cb3b30c6fc9c76d32fc4424ea00b64', '01902301050', 0, 'babul01713@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01713722720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-09-24 14:26:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(26, 'মুহাম্মদ মতিন', '11a7caf79269d8799f6ed1f9d37543bd', '01797781999', 0, 'btitu94@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01797781999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-10-01 15:19:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(27, 'Mohib Khan', '0e1c00142611da8b99084fe93c5342a1', 'm0543697606', 0, 'mohib.bsl@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01711260888', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-11-23 19:00:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(28, 'yousuf ali bachchu', 'c9506dbe69207c03d8721a3bb275891a', 'bachchu123', 0, 'joymahamud728@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01715334293', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-12-30 12:33:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(29, '', 'ad8accab243225af8fce9a7348d7c26c', '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-01-04 01:41:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(30, 'saiful49inf@gmail.com', 'c12e8c1eda3ced9d05583e56c608b715', 'Saiful5673', 0, 'saiful49inf@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01303899619', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-02-18 13:43:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(31, 'মোঃ সজীব মিয়া', 'cef3d33dca939ac96f991ed2af5baa55', 'sajib68sajib57', 0, 'mdsajibmiah535@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01857727968', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-02-22 05:58:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(32, 'এস, এম আকাশ', '2c00085218666417a734f86872f480f5', '66642', 0, 'udcalikadam@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01827499583', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-02-25 13:08:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(33, 'Md. Mynuddin Uzzal', 'b775b1424f4a35881747aab51086ef4f', 'uzzal1981', 0, 'md.mynuddinuzzal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01730182939', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-03-06 09:27:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(34, 'pmgvmbrjov', '6cd12c303b25183315c4ae4ee5b40256', 'a9Tb4Hd2Ts', 0, '64ba677820adf824b323fd61a5993da5.roopert@ssemarketing.net', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'zwrqgmiacj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-03-15 07:34:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(35, 'MD BORHAN UDDIN', 'dd5840a4bd57812a1a193ce9180a1de6', 'borhanuddin2022', 0, 'mdborhanuddin2022@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01318-183309', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-04-18 08:27:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(36, 'Taher', '2c30f2ca8aaad640c1b1914e2eeb3c53', 'Taher01955232990', 0, 'rjmtaherkhan@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01955232990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-04-28 08:16:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(37, 'Shafiqul Islam', 'ad8accab243225af8fce9a7348d7c26c', '', 0, 'shafiqul1960@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01711397126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-04-29 10:45:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(39, 'Tuly', 'f9c142018d6a920cf153d10ff193779e', 'nishtifa707', 0, 'tulisnb@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01764215808', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-06-07 21:04:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(40, 'Mosaddek', '59d2f6681803d6ebeed22c80e663ee6a', 'dhakametro@124658', 0, 'saamok@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01755652423', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-06-08 01:08:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(41, 'Sajid', 'd8e67747827677d4f79c399748db66c4', 'sajid786', 0, 'sajidislampathan@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01625999646', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-08-01 21:10:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(42, 'মোঃ কাওছার আহাম্মেদ কনক', 'f8dca7c6f10f263bd7899846a0fde856', 'kawsar1234', 0, 'konokahmed999@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '০১৩১৫৭২০০০৩', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-08-08 18:56:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(43, 'Md. Jobaydul Hasan Howlader', '6e41c2b386643fce9d3aca6b17534ea0', '*01711857590jobaydul', 0, 'hasanmdjobaydul@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+8801711857590', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-08-13 07:44:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(44, 'মাহমুদুল হাসান', '9bf54e1327901af0f5d95a30fbc237e3', 'fdgjhyu23freA', 0, 'sourob1234514@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01773671424', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-09-23 17:48:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(45, 'Faysal', 'c7fb8eca46435f08598ff012bdf48d9d', '370242aa', 0, 'ahmmedfaysal235@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01402025848', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-10-05 21:33:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(46, 'মোঃ আসাদুল হক সবুজ', '2ddfc7f94f7e7e9c6d400e326c9847e9', 'Asads01911992568a', 0, 'mdahsabuj@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01911992568', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-10-09 20:36:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(47, 'md abul hasan', '723a7aceb518145ccfa7d774ff3c490c', 'thakurgaon#24', 0, 'thakurgaon24newspaper@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+8801860003666', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-10-14 13:56:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(48, 'মোঃ আনাস মোল্লা', 'e2cd1db1bfde8f3a38492a39c30c43e3', 'T@snimaramim', 0, 'mollaanas2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01976919804', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-12-10 19:24:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `youtube_videos`
--

DROP TABLE IF EXISTS `youtube_videos`;
CREATE TABLE `youtube_videos` (
  `id` int(11) NOT NULL,
  `video_id` varchar(100) DEFAULT NULL,
  `video_title` varchar(200) DEFAULT NULL,
  `video_description` varchar(100) DEFAULT NULL,
  `video_thumbnails` varchar(200) DEFAULT NULL COMMENT 'default.jpg,mqdefault.jpg,hqdefault.jpg',
  `publishedAt` varchar(200) DEFAULT NULL,
  `channelId` varchar(100) DEFAULT NULL,
  `video_embeded` mediumtext DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `youtube_videos`
--

INSERT INTO `youtube_videos` (`id`, `video_id`, `video_title`, `video_description`, `video_thumbnails`, `publishedAt`, `channelId`, `video_embeded`, `date_added`) VALUES
(545609, 'AlgUd1JkRQ0', 'টয়লেট উদ্বোধন করলেন রেলমন্ত্রী', 'নারী, শিশু ও বিশেষ চাহিদাসম্পন্ন ব্যক্তিসহ সব যাত্রীর সুবিধার্থে ২৮...', 'https://i.ytimg.com/vi/AlgUd1JkRQ0/default.jpg', '2021-12-28T21:30:29Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/AlgUd1JkRQ0', '2021-12-30 13:00:07'),
(545610, '68PrEdjiVt4', 'হয়রত শাহজালাল আন্তর্জাতিক বিমানবন্দরে ভোগান্তির অভিযোগ যাত্রীদের', 'হয়রত শাহজালাল আন্তর্জাতিক বিমানবন্দরে ফ্লাইট শিডিউলে বিপর্যয়, করোনা...', 'https://i.ytimg.com/vi/68PrEdjiVt4/default.jpg', '2021-12-22T05:46:25Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/68PrEdjiVt4', '2021-12-30 13:00:07'),
(545611, 'K96Ri78Sac8', 'স্বাধীনতার সুবর্ণজয়ন্তী উপলক্ষে ঢাকায় আওয়ামী লীগের বিজয় শোভাযাত্রা', 'স্বাধীনতার সুবর্ণজয়ন্তী উপলক্ষে ঢাকায় বাংলাদেশ আওয়ামী লীগের বিজয়...', 'https://i.ytimg.com/vi/K96Ri78Sac8/default.jpg', '2021-12-18T19:57:46Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/K96Ri78Sac8', '2021-12-30 13:00:07'),
(545612, 'gTpo5Um5XBI', 'মেট্রোরেল পৌঁছাল উত্তরা থেকে আগারগাঁও', 'মেট্রোরেল পৌঁছাল উত্তরা থেকে আগারগাঁও মেট্রোরেল ১২ ডিসেম্বর রোববার...', 'https://i.ytimg.com/vi/gTpo5Um5XBI/default.jpg', '2021-12-13T07:43:05Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/gTpo5Um5XBI', '2021-12-30 13:00:07'),
(545613, '5EQiDH4VZLM', 'জোড়া লাগানো শিশু লাবিবা লামিসার অস্ত্রোপচার ১৩ ডিসেম্বর', 'জোড়া লাগানো শিশু লাবিবা-লামিসার অস্ত্রোপচার ১৩ ডিসেম্বর ঢাকা মেডিকেল...', 'https://i.ytimg.com/vi/5EQiDH4VZLM/default.jpg', '2021-12-11T20:09:00Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/5EQiDH4VZLM', '2021-12-30 13:00:07'),
(545614, 'O31fPPQErCA', 'ঢাকায় আন্তর্জাতিক দুর্নীতিবিরোধী দিবস পালিত', 'দুর্নীতি দমন কমিশন নানা আয়োজনের মধ্য দিয়ে ৮ ই ডিসেম্বর আন্তর্জাতিক...', 'https://i.ytimg.com/vi/O31fPPQErCA/default.jpg', '2021-12-09T17:22:24Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/O31fPPQErCA', '2021-12-30 13:00:07'),
(545615, 'V2My7-qeYlQ', 'প্রধানমন্ত্রীকে নিয়ে কটুক্তি করার প্রতিবাদে বিএনপির নেতা আলালের কুশপুত্তলিকা দাহ', 'প্রধানমন্ত্রীকে নিয়ে কটুক্তি করার প্রতিবাদে বিএনপির নেতা আলালের...', 'https://i.ytimg.com/vi/V2My7-qeYlQ/default.jpg', '2021-12-09T17:23:18Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/V2My7-qeYlQ', '2021-12-30 13:00:07'),
(545616, 'tQ3CM_VHJ8E', 'রাজশাহীতে ছাত্রলীগ নেতা শাহিন হত্যা মামলায় ৯ জনের মৃত্যুদণ্ড | ২২ জনের যাবজ্জীবন', 'রাজশাহীতে ছাত্রলীগ নেতা শাহিন হত্যা মামলায় ৯ জনের মৃত্যুদণ্ড | ২২ জনের...', 'https://i.ytimg.com/vi/tQ3CM_VHJ8E/default.jpg', '2021-12-09T15:08:52Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/tQ3CM_VHJ8E', '2021-12-30 13:00:07'),
(545617, 'Lbc0tgVQfsc', 'আবরার হত্যা মামলায় ২০ আসামির মৃত্যুদণ্ড', 'আবরার হত্যা মামলায় ২০ আসামির মৃত্যুদণ্ড, ৫ জনের যাবজ্জীবন বাংলাদেশ...', 'https://i.ytimg.com/vi/Lbc0tgVQfsc/default.jpg', '2021-12-08T14:14:14Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/Lbc0tgVQfsc', '2021-12-30 13:00:07'),
(545618, 'P3-AUChwGGg', 'গণপরিবহনে অর্ধেক ভাড়ার শর্তহীন প্রজ্ঞাপন জারির দাবিতে শিক্ষার্থীদের প্রতীকী লাশের মিছিল', 'পুলিশি বাধা উপেক্ষা করে শিক্ষার্থীদের প্রতীকী লাশের মিছিল। সড়কে...', 'https://i.ytimg.com/vi/P3-AUChwGGg/default.jpg', '2021-12-06T15:59:47Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/P3-AUChwGGg', '2021-12-30 13:00:07'),
(545619, 'MLe9uR0wO7A', 'রাজশাহীতে শীতের দাপট', '', 'https://i.ytimg.com/vi/MLe9uR0wO7A/default.jpg', '2021-12-05T14:29:24Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/MLe9uR0wO7A', '2021-12-30 13:00:07'),
(545620, 'pt36DI6vIxY', 'হাফ ভাড়ার দাবিতে শিক্ষার্থীদের সড়ক অবরোধ', '', 'https://i.ytimg.com/vi/pt36DI6vIxY/default.jpg', '2021-11-29T11:58:09Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/pt36DI6vIxY', '2021-12-30 13:00:07'),
(545621, '658oqDamXC0', 'শিক্ষার্থীদের অান্দোলনে উত্তাল রাজপথ', 'শিক্ষার্থীদের অান্দোলনে উত্তাল রাজপথ নটর ডেম কলেজের শিক্ষার্থী নাঈম...', 'https://i.ytimg.com/vi/658oqDamXC0/default.jpg', '2021-11-25T19:31:55Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/658oqDamXC0', '2021-12-30 13:00:07'),
(545622, 'V_TlY_CP5lA', 'গাড়ির ধাক্কায় নটর ডেম কলেজ ছাত্রের মৃত্যু | গুলিস্তানে  সহপাঠীদের রাস্তা অবরোধ', 'গাড়ির ধাক্কায় নটর ডেম কলেজ ছাত্রের মৃত্যু | গুলিস্তানে সহপাঠীদের রাস্তা...', 'https://i.ytimg.com/vi/V_TlY_CP5lA/default.jpg', '2021-11-25T05:04:33Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/V_TlY_CP5lA', '2021-12-30 13:00:07'),
(545623, 'OVQQ3PSwUYo', 'গণপরিবহনে হাফ ভাড়ার দাবিতে সায়েন্স ল্যাব মোড়ে শিক্ষার্থীদের সড়ক অবরোধ', 'গণপরিবহনে হাফ ভাড়ার দাবিতে সায়েন্স ল্যাব মোড়ে শিক্ষার্থীদের সড়ক...', 'https://i.ytimg.com/vi/OVQQ3PSwUYo/default.jpg', '2021-11-23T06:58:16Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/OVQQ3PSwUYo', '2021-12-30 13:00:07'),
(545624, 'xpmdRzAq9_Q', 'খালেদা জিয়াকে সুচিকিৎসার জন্য বিদেশে প্রেরণের দাবিতে বিএনপির সমাবেশ', 'খালেদা জিয়াকে সুচিকিৎসার জন্য বিদেশে প্রেরণের দাবিতে বিএনপির সমাবেশ...', 'https://i.ytimg.com/vi/xpmdRzAq9_Q/default.jpg', '2021-11-22T12:21:32Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/xpmdRzAq9_Q', '2021-12-30 13:00:07'),
(545625, 'L9GIX9BNuQY', 'খালেদা জিয়ার মুক্তি ও সুচিকিৎসার জন্য বিদেশে প্রেরণের দাবিতে বিএনপির গণ অনশন', 'বাংলাদেশ জাতীয়তাবাদী দল-বিএনপি\'র চেয়ারপার্সন এবং সাবেক প্রধানমন্ত্রী...', 'https://i.ytimg.com/vi/L9GIX9BNuQY/default.jpg', '2021-11-20T12:17:31Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/L9GIX9BNuQY', '2021-12-30 13:00:07'),
(545626, 'cEqUAz4E91Q', 'চির নিদ্রায় কথা সাহিত্যিক হাসান আজিজুল হক', 'চির নিদ্রায় কথা সাহিত্যিক হাসান আজিজুল হক কথাসাহিত্যিক অধ্যাপক হাসান...', 'https://i.ytimg.com/vi/cEqUAz4E91Q/default.jpg', '2021-11-17T16:01:31Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/cEqUAz4E91Q', '2021-12-30 13:00:07'),
(545627, 'ku65EsPe26I', 'এসএসসি ও সমমানের পরীক্ষা শুরু', 'করোনাভাইরাসের সংক্রমণের কারণে নির্ধারিত সময়ের সাড়ে আট মাস পর রোববার ১৪...', 'https://i.ytimg.com/vi/ku65EsPe26I/default.jpg', '2021-11-14T09:04:56Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/ku65EsPe26I', '2021-12-30 13:00:07'),
(545628, 'asZARaXPM54', 'রাজশাহীতে নদীর তীরে সূর্যপূজা উৎসব', 'রাজশাহীতে নদীর তীরে সূর্যপূজা উৎসব রাজশাহী মহানগরীর শ্রীরামপুর নদীর...', 'https://i.ytimg.com/vi/asZARaXPM54/default.jpg', '2021-11-11T06:33:26Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/asZARaXPM54', '2021-12-30 13:00:07'),
(545629, 'iMVJ9nIVGHo', 'রাজশাহীতে যুবকের আত্মহত্যার ঘটনায় দুই তরুণী আটক', 'রাজশাহীতে যুবকের আত্মহত্যার ঘটনায় দুই তরুণী আটক রাজশাহী মহানগরীতে...', 'https://i.ytimg.com/vi/iMVJ9nIVGHo/default.jpg', '2021-11-10T13:07:23Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/iMVJ9nIVGHo', '2021-12-30 13:00:07'),
(545630, 'xSF45xTygPE', 'অতিরিক্ত ভাড়া আদায়ের বিরুদ্ধে মোবাইল কোর্ট পরিচালনা', 'যাত্রীদের কাছ থেকে অতিরিক্ত ভাড়া আদায়ের দায়ে বিভিন্ন পরিবহনের বাসকে...', 'https://i.ytimg.com/vi/xSF45xTygPE/default.jpg', '2021-11-09T11:37:01Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/xSF45xTygPE', '2021-12-30 13:00:07'),
(545631, 'wdWztvCXH1s', 'বকেয়া বেতনের দাবিতে পোশাক শ্রমিকদের বিক্ষোভ', 'বকেয়া বেতনের দাবিতে পোশাক শ্রমিকদের বিক্ষোভ বকেয়া বেতনের দাবিতে...', 'https://i.ytimg.com/vi/wdWztvCXH1s/default.jpg', '2021-11-09T02:47:04Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/wdWztvCXH1s', '2021-12-30 13:00:07'),
(545632, 'wLP-vei551s', 'বাস ভাড়া বাড়ল ২৭ শতাংশ', 'বাস ভাড়া বাড়ল ২৭ শতাংশ ডিজেলের দাম বাড়ায় বাস ভাড়া ২৭ শতাংশ বাড়ানোর...', 'https://i.ytimg.com/vi/wLP-vei551s/default.jpg', '2021-11-07T13:15:46Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/wLP-vei551s', '2021-12-30 13:00:07'),
(545633, 'H6WlBfcoSrQ', 'পরিবহন ধর্মঘটে চরম ভোগান্তিতে সাধারণ মানুষ', 'পরিবহন ধর্মঘটে চরম ভোগান্তিতে সাধারণ মানুষ.', 'https://i.ytimg.com/vi/H6WlBfcoSrQ/default.jpg', '2021-11-07T05:33:00Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/H6WlBfcoSrQ', '2021-12-30 13:00:07'),
(545634, 'UFN_b9cCZO8', 'সাম্প্রদায়িক হামলার প্রতিবাদে ঢাকেশ্বরী মন্দিরে ১৫ মিনিট নীরবতা পালন', 'সাম্প্রদায়িক হামলার প্রতিবাদে ঢাকেশ্বরী মন্দিরে ১৫ মিনিট নীরবতা পালন...', 'https://i.ytimg.com/vi/UFN_b9cCZO8/default.jpg', '2021-11-04T17:03:38Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/UFN_b9cCZO8', '2021-12-30 13:00:07'),
(545635, '81z9dFr51-M', '১২ থেকে ১৭ বছর বয়সী শিক্ষার্থীদের টিকা দেওয়া শুরু', '১২ থেকে ১৭ বছর বয়সী শিক্ষার্থীদের টিকা দেওয়া শুরু রাজধানী ঢাকার...', 'https://i.ytimg.com/vi/81z9dFr51-M/default.jpg', '2021-11-01T08:37:33Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/81z9dFr51-M', '2021-12-30 13:00:07'),
(545636, 'z80HjdaveWQ', 'অপসাংবাদিকতার বিরুদ্ধে রাজশাহীতে পেশাদার সাংবাদিকদের সড়ক অবরোধ', 'অপসাংবাদিকতার বিরুদ্ধে রাজশাহীতে পেশাদার সাংবাদিকদের সড়ক অবরোধ কেউ...', 'https://i.ytimg.com/vi/z80HjdaveWQ/default.jpg', '2021-11-01T07:59:52Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/z80HjdaveWQ', '2021-12-30 13:00:07'),
(545637, '1lhIKVtyrbY', 'সাম্প্রদায়িক হামলার প্রতিবাদে শিল্পী কলাকুশলীদের সম্প্রীতি সমাবেশ', 'সাম্প্রদায়িক হামলার প্রতিবাদে শিল্পী কলাকুশলীদের সম্প্রীতি সমাবেশ...', 'https://i.ytimg.com/vi/1lhIKVtyrbY/default.jpg', '2021-10-30T19:11:12Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/1lhIKVtyrbY', '2021-12-30 13:00:07'),
(545638, 'ATs4EXWpNoA', 'দৃষ্টি প্রতিবন্ধীদের বই পড়তে মারাক্কাশ চুক্তি অনুসাক্ষর করার দাবি', 'দৃষ্টি প্রতিবন্ধীদের বই পড়তে মারাক্কাশ চুক্তি অনুসাক্ষর করার দাবিতে...', 'https://i.ytimg.com/vi/ATs4EXWpNoA/default.jpg', '2021-10-30T12:07:45Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/ATs4EXWpNoA', '2021-12-30 13:00:07'),
(545639, 'JvhoHXvavy8', 'মুগদা হাসপাতালে বিস্ফোরণের পর অগ্নিকাণ্ড', 'মুগদা হাসপাতালে বিস্ফোরণের পর অগ্নিকাণ্ড | আহত ৯ বৃহসপতিবার রাজধানীর...', 'https://i.ytimg.com/vi/JvhoHXvavy8/default.jpg', '2021-10-21T12:10:59Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/JvhoHXvavy8', '2021-12-30 13:00:07'),
(545640, 'sQYfPPJvVsk', 'সাম্প্রদায়িক সন্ত্রাসের বিরুদ্ধে বিক্ষোভ সমাবেশ', 'সাম্প্রদায়িক সন্ত্রাসের বিরুদ্ধে ১৯ অক্টোর ২০২১ মঙ্গলবার জাতীয়...', 'https://i.ytimg.com/vi/sQYfPPJvVsk/default.jpg', '2021-10-19T17:58:39Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/sQYfPPJvVsk', '2021-12-30 13:00:07'),
(545641, 'pf4OOkbYguc', 'সাম্প্রদায়িক হামলার প্রতিবাদে শাহবাগে অবরোধ', 'দেশের বিভিন্ন স্থানে পূজামণ্ডপ, মন্দিরসহ হিন্দুদের ঘরবাড়ি ও...', 'https://i.ytimg.com/vi/pf4OOkbYguc/default.jpg', '2021-10-18T18:30:46Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/pf4OOkbYguc', '2021-12-30 13:00:07'),
(545642, 'gKpHbnGN-A8', 'দেড় বছর পর মুখোমুখি ছাত্রদল ও ছাত্রলীগ', 'দেড় বছর পর ১৭ অক্টোবর ২০২১, রোববার ঢাকা বিশ্ববিদ্যালয়ের মধুর ক্যানটিনে...', 'https://i.ytimg.com/vi/gKpHbnGN-A8/default.jpg', '2021-10-17T12:37:47Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/gKpHbnGN-A8', '2021-12-30 13:00:07'),
(545643, 'wuQBWQs4nXU', 'স্কুল শিক্ষার্থীদের পরীক্ষামূলক টিকাদান', 'এবার শিশুদেরও টিকাদান শুরু হয়েছে। পরীক্ষামূলকভাবে ১২০ শিশুকে ফাইজারের...', 'https://i.ytimg.com/vi/wuQBWQs4nXU/default.jpg', '2021-10-16T21:12:19Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/wuQBWQs4nXU', '2021-12-30 13:00:07'),
(545644, 'uK_obdcm8V4', 'রাজধানীর কাকরাইলে পুলিশের সঙ্গে বিক্ষোভকারীদের সংঘর্ষ', 'কুমিল্লার ​ঘটনার জেরে জাতীয় মসজিদ বাইতুল মোকাররম থেকে বের হওয়া মিছিলে...', 'https://i.ytimg.com/vi/uK_obdcm8V4/default.jpg', '2021-10-16T20:20:27Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/uK_obdcm8V4', '2021-12-30 13:00:07'),
(545645, 'n18J_GK5Kbw', 'খালে পড়ে নিখোঁজ ব্যক্তিকে ৬ ঘণ্টা পর জীবিত উদ্ধার', 'রাজধানীর মিরপুরের কালশী এলাকায় সুয়ারেজের খালে পড়ে নিখোঁজ হওয়ার ছয়...', 'https://i.ytimg.com/vi/n18J_GK5Kbw/default.jpg', '2021-10-16T15:02:58Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/n18J_GK5Kbw', '2021-12-30 13:00:07'),
(545646, 'qDdSoyldfu8', 'প্রতিমা বিসর্জনের মধ্য দিয়ে শেষ হল শারদীয় দুর্গোৎসব', 'প্রতিমা বিসর্জনের মধ্য দিয়ে শেষ হল শারদীয় দুর্গোৎসব.', 'https://i.ytimg.com/vi/qDdSoyldfu8/default.jpg', '2021-10-16T09:20:04Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/qDdSoyldfu8', '2021-12-30 13:00:07'),
(545647, 'MJnX8BF_Ulk', 'শারদীয় দুর্গাউৎসব', 'রাজধানীর মন্দির গুলোতে পালিত হচ্ছে হিন্দু ধর্মাবলম্বীদের প্রধান ধর্মীয়...', 'https://i.ytimg.com/vi/MJnX8BF_Ulk/default.jpg', '2021-10-13T12:27:20Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/MJnX8BF_Ulk', '2021-12-30 13:00:07'),
(545648, 'O4hBGsz7r2s', '৬ দফা ​দাবিতে ২৪ঘন্টা কর্মবিরতি', '৬ দফা দাবিতে ২৪ঘন্টা কর্মবিরতে পালন করেছে রাইড শেয়ারিং ড্রাইভারস...', 'https://i.ytimg.com/vi/O4hBGsz7r2s/default.jpg', '2021-10-13T11:43:01Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/O4hBGsz7r2s', '2021-12-30 13:00:07'),
(545649, 'XpUTC4CN0Io', 'এনজিওকর্মী ধর্ষণ ও হত্যার দায়ে একজনের যাবজ্জীবন', 'ফরিদপুরের বোয়ালমারীর উপজেলার এনজিও কর্মী শিউলি আক্তারকে ধর্ষণ ও হত্যা...', 'https://i.ytimg.com/vi/XpUTC4CN0Io/default.jpg', '2021-10-12T18:28:05Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/XpUTC4CN0Io', '2021-12-30 13:00:07'),
(545650, '8UCxe_IeCFk', 'রাজশাহীতে চাঞ্চল্যকর রাজু হত্যা মামলায় পাঁচজনের ফাঁসি', 'রাজশাহী নগরীর নিউমার্কেট এলাকায় চাঞ্চল্যকর রাজু হত্যা মামলা পাঁচজনের...', 'https://i.ytimg.com/vi/8UCxe_IeCFk/default.jpg', '2021-10-12T09:37:03Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/8UCxe_IeCFk', '2021-12-30 13:00:07'),
(545651, 'JY8P6ftqgdM', 'শুরু হচ্ছে দুর্গাপূজা | রাজশাহীতে প্রতিমা তৈরিতে ব্যস্ত কারিগররা', 'শুরু হচ্ছে দুর্গাপূজা। রাজশাহীতে প্রতিমা তৈরিতে ব্যস্ত সময় কাটাচ্ছেন...', 'https://i.ytimg.com/vi/JY8P6ftqgdM/default.jpg', '2021-10-09T03:09:58Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/JY8P6ftqgdM', '2021-12-30 13:00:07'),
(545652, 'Au1FQRm1XUU', 'আবরার ফাহাদ হত্যার বিচারের দাবিতে বুয়েটে শিক্ষার্থীদের প্রতিবাদ কর্মসূচী পালন', 'বুয়েট শিক্ষার্থী আবরার ফাহাদ হত্যার বিচারের দাবিতে বৃহস্পতিবার বুয়েট...', 'https://i.ytimg.com/vi/Au1FQRm1XUU/default.jpg', '2021-10-07T14:16:03Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/Au1FQRm1XUU', '2021-12-30 13:00:07'),
(545653, 'fcvu6viSCSo', 'নারী দিয়ে ফাঁসানো চক্র গ্রেফতার', 'রাজশাহীতে নারী দিয়ে পরিকল্পিতভাবে ফাঁসিয়ে অপহরণ ও চাঁদা আদায়ের চক্রের...', 'https://i.ytimg.com/vi/fcvu6viSCSo/default.jpg', '2021-10-07T03:04:09Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/fcvu6viSCSo', '2021-12-30 13:00:07'),
(545654, 'iTaSFIYQTUw', '৪৭ দিন পর স্বল্প পরিসরে শিমুলিয়া বাংলাবাজার নৌরুটে ফেরি চলাচল শুরু', '৪৭ দিন পর স্বল্প পরিসরে শিমুলিয়া বাংলাবাজার নৌরুটে ফেরি চলাচল শুরু.', 'https://i.ytimg.com/vi/iTaSFIYQTUw/default.jpg', '2021-10-06T12:15:57Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/iTaSFIYQTUw', '2021-12-30 13:00:07'),
(545655, 'GXFJcAE6Tdg', '৪ অক্টোবর থেকে ২৫ অক্টোবর পর্যন্ত ২২ দিন মা ইলিশ ধরা নিষিদ্ধ', '৪ অক্টোবর থেকে ২৫ অক্টোবর পর্যন্ত ২২ দিন মা ইলিশ ধরা নিষিদ্ধ.', 'https://i.ytimg.com/vi/GXFJcAE6Tdg/default.jpg', '2021-10-06T09:03:45Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/GXFJcAE6Tdg', '2021-12-30 13:00:07'),
(545656, 'Pk6Glqy96Ko', 'হলে ফিরছেন শিক্ষার্থীরা।। দীর্ঘ ১৮ মাস পর খুলেছে ঢাকা বিশ্ববিদ্যালয়ের হলগুলো', 'হলে ফিরছেন শিক্ষার্থীরা।। দীর্ঘ ১৮ মাস পর খুলেছে ঢাকা বিশ্ববিদ্যালয়ের...', 'https://i.ytimg.com/vi/Pk6Glqy96Ko/default.jpg', '2021-10-06T07:11:27Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/Pk6Glqy96Ko', '2021-12-30 13:00:07'),
(545657, 'xaaXo5LkvnE', 'ঢাকা বিশ্বিবদ্যালয়ের ভর্তি পরীক্ষা এবার রাজশাহী বিশ্ববিদ্যালয়ে অনুষ্ঠিত  হয়েছে', 'ঢাকা বিশ্ববিদ্যালয়ের ভর্তি পরীক্ষা এবার রাজশাহী বিশ্ববিদ্যালয়ে...', 'https://i.ytimg.com/vi/xaaXo5LkvnE/default.jpg', '2021-10-02T06:41:30Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/xaaXo5LkvnE', '2021-12-30 13:00:07'),
(545658, 'HBWeaowz4as', 'বুড়িগঙ্গা নদীতে নৌকাবাইচ প্রতিযোগিতা', 'প্রধানমন্ত্রী শেখ হাসিনার ৭৫তম জন্মদিন উপলক্ষে বুড়িগঙ্গা নদীতে...', 'https://i.ytimg.com/vi/HBWeaowz4as/default.jpg', '2021-09-30T20:59:47Z', 'UCeqsFQ1CbE46xOdeG8_S8Bg', 'https://www.youtube.com/embed/HBWeaowz4as', '2021-12-30 13:00:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_news`
--
ALTER TABLE `all_news`
  ADD PRIMARY KEY (`news_id`),
  ADD UNIQUE KEY `INX_ContentBN` (`news_id`),
  ADD KEY `spot_light` (`spot_light`),
  ADD KEY `top_news` (`top_news`),
  ADD KEY `footer_news` (`footer_news`),
  ADD KEY `ShowInScroll` (`ShowInScroll`),
  ADD KEY `DistrictID` (`DistrictID`),
  ADD KEY `date_added` (`date_added`),
  ADD KEY `news_tag` (`news_tag`),
  ADD KEY `uploaded_by` (`uploaded_by`),
  ADD KEY `news_title` (`news_title`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `all_news_temp`
--
ALTER TABLE `all_news_temp`
  ADD PRIMARY KEY (`news_id_temp`),
  ADD UNIQUE KEY `INX_ContentBN` (`news_id_temp`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `article_categories`
--
ALTER TABLE `article_categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `seo_title` (`seo_title`,`parent`);

--
-- Indexes for table `bas_district`
--
ALTER TABLE `bas_district`
  ADD PRIMARY KEY (`DistrictID`),
  ADD KEY `FK_Division` (`DivisionID`),
  ADD KEY `INX_District` (`DistrictID`,`DistrictName`,`DistrictNameBN`);

--
-- Indexes for table `bas_division`
--
ALTER TABLE `bas_division`
  ADD PRIMARY KEY (`DivisionID`),
  ADD UNIQUE KEY `INX_Division` (`DivisionID`,`DivisionName`,`DivisionNameBN`);

--
-- Indexes for table `bn_bas_category`
--
ALTER TABLE `bn_bas_category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `breaking_news`
--
ALTER TABLE `breaking_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_albums`
--
ALTER TABLE `image_albums`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `image_categories`
--
ALTER TABLE `image_categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `seo_title` (`seo_title`,`parent`);

--
-- Indexes for table `np_ad_newsportal`
--
ALTER TABLE `np_ad_newsportal`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `np_menuname`
--
ALTER TABLE `np_menuname`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `np_news`
--
ALTER TABLE `np_news`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `np_passcreate`
--
ALTER TABLE `np_passcreate`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `pagemanager`
--
ALTER TABLE `pagemanager`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `script_log`
--
ALTER TABLE `script_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `youtube_videos`
--
ALTER TABLE `youtube_videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `video_id` (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `all_news`
--
ALTER TABLE `all_news`
  MODIFY `news_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `all_news_temp`
--
ALTER TABLE `all_news_temp`
  MODIFY `news_id_temp` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bas_district`
--
ALTER TABLE `bas_district`
  MODIFY `DistrictID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `bas_division`
--
ALTER TABLE `bas_division`
  MODIFY `DivisionID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bn_bas_category`
--
ALTER TABLE `bn_bas_category`
  MODIFY `CategoryID` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `breaking_news`
--
ALTER TABLE `breaking_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_albums`
--
ALTER TABLE `image_albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_categories`
--
ALTER TABLE `image_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `np_ad_newsportal`
--
ALTER TABLE `np_ad_newsportal`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `np_menuname`
--
ALTER TABLE `np_menuname`
  MODIFY `menu_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `np_news`
--
ALTER TABLE `np_news`
  MODIFY `paper_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `np_passcreate`
--
ALTER TABLE `np_passcreate`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagemanager`
--
ALTER TABLE `pagemanager`
  MODIFY `page_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `script_log`
--
ALTER TABLE `script_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `youtube_videos`
--
ALTER TABLE `youtube_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=545659;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bas_district`
--
ALTER TABLE `bas_district`
  ADD CONSTRAINT `FK_Division` FOREIGN KEY (`DivisionID`) REFERENCES `bas_division` (`DivisionID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
