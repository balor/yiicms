-- phpMyAdmin SQL Dump
-- version 3.3.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2010 at 12:20 PM
-- Server version: 5.1.47
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `balor_yiicms`
--

-- --------------------------------------------------------

--
-- Table structure for table `Content`
--

CREATE TABLE IF NOT EXISTS `Content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `html` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `modified` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Content`
--

INSERT INTO `Content` (`id`, `html`, `author`, `created`, `modified`, `name`) VALUES
(2, '<p><strong><span style="color: #ff0000;">Witaj!</span></strong></p>\r\n<p><span style="color: #ff0000;"><span style="color: #000000;">Oto testowa strona poświęcona moim ulubionym herbatom, jest to rooibos i yerba. Najpierw zachęcam do zapoznania się z istotnymi informacjami odnośnie tych herbat, a następnie do obejrzenia zdjec.</span></span></p>\r\n<hr />\r\n<p>Rooibos (czyt. Rojbos) z języka afrikaans: "rooi" (czerwony) i "bos" (krzew) - czerwonokrzew Aspalathus linearis, uprawiany w RPA (g&oacute;ry Cedarberg).</p>\r\n<p>Z liści, kt&oacute;re po dojrzeniu i ususzeniu tnie się na drobne, 1-2 milimetrowe kawałki, otrzymuje się napar ziołowy, zwany najczęściej rooibos tea. Inne nazwy: bush tea, redbush tea (Wielka Brytania), South African red tea (USA) lub w jezyku afrikaans rooi tee. Bywa też nazywana czerwoną herbatą, jednak czerwonokrzew nie jest spokrewniony z krzewem herbacianym.</p>\r\n<hr />\r\n<p>Yerba mate, herba mate, mate, erva mate, indiańskie ca&aacute; mati, ca&aacute; mate &ndash; wysuszone, zmielone liście ostrokrzewu paragwajskiego, niekiedy r&oacute;wnież świeże, przygotowane do robienia naparu popularnego gł&oacute;wnie w krajach Ameryki Południowej (Argentynie, Paragwaju, Urugwaju, Brazylii), także w niekt&oacute;rych krajach Bliskiego Wschodu, gł&oacute;wnie w Syrii i Libanie.</p>\r\n<p>Nazwa yerba mate, wymyślona najprawdopodobniej przez jezuit&oacute;w, pochodzi od przekształconego łacińskiego słowa herba &ndash; zioło i mati co w języku keczua oznacza tykwę, w kt&oacute;rej parzy się zioło. Indiańska nazwa naparu to ca&aacute;.</p>', 'Michal Thoma', 1269182366, 1271744575, 'Przyklad');

-- --------------------------------------------------------

--
-- Table structure for table `Gallery`
--

CREATE TABLE IF NOT EXISTS `Gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Gallery`
--

INSERT INTO `Gallery` (`id`, `name`, `created`) VALUES
(1, 'Moje kochane herbaty na codzien', 1271457889);

-- --------------------------------------------------------

--
-- Table structure for table `GalleryFolder`
--

CREATE TABLE IF NOT EXISTS `GalleryFolder` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gallery_id` int(10) unsigned NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `GalleryFolder`
--

INSERT INTO `GalleryFolder` (`id`, `name`, `gallery_id`, `icon`, `created`) VALUES
(12, 'Rooibos', 1, 'galleryfolder_12', 1271699996),
(11, 'Yerba Mate', 1, 'galleryfolder_11', 1271699916);

-- --------------------------------------------------------

--
-- Table structure for table `GalleryImage`
--

CREATE TABLE IF NOT EXISTS `GalleryImage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_folder_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `image_dimensions` varchar(40) DEFAULT NULL,
  `image_size` int(20) unsigned NOT NULL DEFAULT '0',
  `image_filename` varchar(255) NOT NULL,
  `created` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `GalleryImage`
--

INSERT INTO `GalleryImage` (`id`, `gallery_folder_id`, `name`, `author`, `image_dimensions`, `image_size`, `image_filename`, `created`) VALUES
(4, 11, 'Dziad z yerba', 'Balores', '549x699', 111067, 'galleryimage_4', 1271711224),
(5, 11, 'Naczynko do parzenia yerby', 'Michal Thoma', '400x403', 14839, 'galleryimage_5', 1271711514),
(6, 11, 'Tradycyjnie i pieknie zaparzona yerba :)', 'Michal Thoma', '355x355', 129419, 'galleryimage_6', 1271711542),
(7, 12, 'Ziarenka herbaty roobios', 'Michal Thoma', '617x376', 66413, 'galleryimage_7', 1271711651),
(8, 12, 'Typowe pole uprawne', 'Michal Thoma', '480x360', 100784, 'galleryimage_8', 1271711725),
(9, 11, 'Instrukcja parzenia yerby', 'General Bonkers', '309x532', 42151, 'galleryimage_9', 1271742991),
(10, 11, 'Rysunek lisci yerby', 'Michal Thoma', '200x286', 39356, 'galleryimage_10', 1271743014),
(11, 11, 'Ultra rare gatunek yerby', 'Michal Thoma', '800x600', 232716, 'galleryimage_11', 1271743031);

-- --------------------------------------------------------

--
-- Table structure for table `Taksonomy`
--

CREATE TABLE IF NOT EXISTS `Taksonomy` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Taksonomy`
--

INSERT INTO `Taksonomy` (`id`, `name`, `parent_id`) VALUES
(1, 'Moje yerby', 0),
(2, 'Charakterystyka', 1),
(3, 'Zastosowanie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `TaksonomyLinker`
--

CREATE TABLE IF NOT EXISTS `TaksonomyLinker` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `taksonomy_id` int(5) unsigned NOT NULL,
  `content_id` int(10) unsigned NOT NULL,
  `content_model` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `TaksonomyLinker`
--


-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(124) NOT NULL,
  `password` varchar(124) NOT NULL,
  `last_login_time` int(10) unsigned NOT NULL,
  `registration_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `email`, `password`, `last_login_time`, `registration_time`) VALUES
(1, 'admin', '1fcdc7a5d2761799a5b301aba096e636', 0, 1269086287),
(2, 'michal@balor.pl', 'b2b45efb5e1e7ecbba229d9f0934cfa7', 0, 1269181785);
