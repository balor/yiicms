-- phpMyAdmin SQL Dump
-- version 3.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 19 Kwi 2010, 21:32
-- Wersja serwera: 5.1.45
-- Wersja PHP: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Baza danych: `balor_cmsmod`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `Content`
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
-- Zrzut danych tabeli `Content`
--

INSERT INTO `Content` (`id`, `html`, `author`, `created`, `modified`, `name`) VALUES
(2, '<p>Hej, jestem fajny</p>\r\n<p>:D<br /><span style="font-size: x-large;">:D</span>&nbsp;</p>\r\n<p style="text-align: center;"><strong><span style="font-size: large;"><span style="color: #ff0000;">CHUJ CI W DUPE</span></span></strong></p>', 'Michal Thoma', 1269182366, 1271462129, 'Przyklad');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `Gallery`
--

CREATE TABLE IF NOT EXISTS `Gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `Gallery`
--

INSERT INTO `Gallery` (`id`, `name`, `created`) VALUES
(1, 'Przykladowa galeria', 1271457889);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `GalleryFolder`
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
-- Zrzut danych tabeli `GalleryFolder`
--

INSERT INTO `GalleryFolder` (`id`, `name`, `gallery_id`, `icon`, `created`) VALUES
(12, 'Rooibos', 1, 'galleryfolder_12', 1271699996),
(11, 'Yerba Mate', 1, 'galleryfolder_11', 1271699916);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `GalleryImage`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `GalleryImage`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `User`
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
-- Zrzut danych tabeli `User`
--

INSERT INTO `User` (`id`, `email`, `password`, `last_login_time`, `registration_time`) VALUES
(1, 'admin', '1fcdc7a5d2761799a5b301aba096e636', 0, 1269086287),
(2, 'michal@balor.pl', 'b2b45efb5e1e7ecbba229d9f0934cfa7', 0, 1269181785);

