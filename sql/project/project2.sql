-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	5.7.20-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `commentid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `kolid` int(5) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`commentid`),
  UNIQUE KEY `commentid_UNIQUE` (`commentid`),
  KEY `userid_idx` (`userid`),
  KEY `comment_kolid` (`kolid`),
  CONSTRAINT `comment_kolid` FOREIGN KEY (`kolid`) REFERENCES `kol` (`kolid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kol`
--

DROP TABLE IF EXISTS `kol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kol` (
  `kolid` int(5) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `follower` int(10) unsigned NOT NULL,
  `category` varchar(20) NOT NULL,
  `img_url` text NOT NULL,
  `intro` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`kolid`),
  UNIQUE KEY `kolid_UNIQUE` (`kolid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kolcontact`
--

DROP TABLE IF EXISTS `kolcontact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kolcontact` (
  `kolid` int(5) NOT NULL,
  `phonenumber` int(8) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` text,
  PRIMARY KEY (`kolid`),
  UNIQUE KEY `kolid_UNIQUE` (`kolid`),
  CONSTRAINT `contact_kolid` FOREIGN KEY (`kolid`) REFERENCES `kol` (`kolid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kolwiki`
--

DROP TABLE IF EXISTS `kolwiki`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kolwiki` (
  `kolid` int(5) NOT NULL,
  `subtitle` text NOT NULL,
  `titleordering` int(3) NOT NULL,
  `content` text,
  PRIMARY KEY (`titleordering`,`kolid`),
  KEY `kolid_idx` (`kolid`),
  CONSTRAINT `kolid` FOREIGN KEY (`kolid`) REFERENCES `kol` (`kolid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userid` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `userid_UNIQUE` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'project'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-01 22:07:41
