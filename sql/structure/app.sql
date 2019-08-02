-- Adminer 4.7.2 MySQL dump

DROP DATABASE IF EXISTS `app`;
CREATE DATABASE `app`;

USE `app`;

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `classification`;
CREATE TABLE `classification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `concert`;
CREATE TABLE `concert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `genre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `genre` (`genre`),
  CONSTRAINT `concert_ibfk_1` FOREIGN KEY (`genre`) REFERENCES `genre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `family`;
CREATE TABLE `family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `classification` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classification` (`classification`),
  CONSTRAINT `family_ibfk_1` FOREIGN KEY (`classification`) REFERENCES `classification` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `concert` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `concert` (`concert`),
  CONSTRAINT `group_ibfk_1` FOREIGN KEY (`concert`) REFERENCES `concert` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `instrument`;
CREATE TABLE `instrument` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `classification` int(11) NOT NULL,
  `family` int(11) NOT NULL,
  `subfamily` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classification` (`classification`),
  KEY `family` (`family`),
  KEY `subfamily` (`subfamily`),
  KEY `genre` (`genre`),
  CONSTRAINT `instrument_ibfk_1` FOREIGN KEY (`classification`) REFERENCES `classification` (`id`),
  CONSTRAINT `instrument_ibfk_2` FOREIGN KEY (`family`) REFERENCES `family` (`id`),
  CONSTRAINT `instrument_ibfk_3` FOREIGN KEY (`subfamily`) REFERENCES `subfamily` (`id`),
  CONSTRAINT `instrument_ibfk_4` FOREIGN KEY (`genre`) REFERENCES `genre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `musician`;
CREATE TABLE `musician` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `group` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group` (`group`),
  CONSTRAINT `musician_ibfk_1` FOREIGN KEY (`group`) REFERENCES `group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `subfamily`;
CREATE TABLE `subfamily` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `family` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `family` (`family`),
  CONSTRAINT `subfamily_ibfk_1` FOREIGN KEY (`family`) REFERENCES `family` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2019-07-31 09:50:41
