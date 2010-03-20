-- phpMyAdmin SQL Dump
-- version 3.3.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 21 Mar 2010, 00:51
-- Wersja serwera: 5.1.44
-- Wersja PHP: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Baza danych: `cmsmod`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `Content`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `User`
--

INSERT INTO `User` (`id`, `email`, `password`, `last_login_time`, `registration_time`) VALUES
(1, 'admin', '1fcdc7a5d2761799a5b301aba096e636', 0, 1269086287);

