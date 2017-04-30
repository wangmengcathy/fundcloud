-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: 127.0.0.1    Database: finalproject
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_pid` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `replied_id` int(11) DEFAULT NULL,
  `replied_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,18,1,'my first comment','2017-04-25 19:42:21','2017-04-25 19:42:26',NULL,NULL),(2,18,1,'here is my comment','2017-04-26 00:21:50','2017-04-26 00:21:50',NULL,NULL),(4,10,1,'I\'m commenting the 5th project','2017-04-26 00:38:45','2017-04-26 00:38:45',NULL,NULL),(5,10,1,'another comments','2017-04-26 00:43:26','2017-04-26 00:43:26',NULL,NULL),(6,10,1,'another try!','2017-04-26 00:49:09','2017-04-26 00:49:09',NULL,NULL),(7,18,1,'cathy leaves a comment here.','2017-04-26 00:49:44','2017-04-26 00:49:44',NULL,NULL),(8,19,1,'cathy leaves a comment here','2017-04-29 00:56:58','2017-04-29 00:56:58',NULL,NULL),(9,19,2,'Jiaxiang leaves a comment here','2017-04-29 02:06:38','2017-04-29 02:06:38',1,NULL),(10,19,2,'hi!','2017-04-29 02:07:06','2017-04-29 02:07:06',2,'Jiaxiang Lin'),(11,4,1,'hi','2017-04-28 22:10:18','2017-04-28 22:10:20',NULL,NULL),(12,20,3,'hi','2017-04-28 23:02:02','2017-04-28 23:02:04',NULL,NULL);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `followers`
--

DROP TABLE IF EXISTS `followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `followers` (
  `user_id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`following_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followers`
--

LOCK TABLES `followers` WRITE;
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;
INSERT INTO `followers` VALUES (3,2,'2017-04-28 23:34:24','2017-04-28 23:34:24'),(6,1,'2017-04-30 02:55:12','2017-04-30 02:55:12'),(6,2,'2017-04-29 21:48:33','2017-04-29 21:48:33');
/*!40000 ALTER TABLE `followers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `user_id` int(10) unsigned DEFAULT NULL,
  `project_id` int(10) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  KEY `user_id_idx` (`user_id`),
  KEY `project_id_idx` (`project_id`),
  CONSTRAINT `project_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,19,'2017-04-28 22:37:22','2017-04-28 22:37:22');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (26,'2014_10_12_000000_create_users_table',1),(27,'2014_10_12_100000_create_password_resets_table',1),(28,'2017_04_19_195041_create_table_projects',1),(29,'2017_04_19_230010_create_tags_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_tag`
--

DROP TABLE IF EXISTS `project_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_tag` (
  `project_pid` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `project_tag_project_id_index` (`project_pid`),
  KEY `project_tag_tag_id_index` (`tag_id`),
  CONSTRAINT `project_tag_project_id_foreign` FOREIGN KEY (`project_pid`) REFERENCES `projects` (`pid`) ON DELETE CASCADE,
  CONSTRAINT `project_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_tag`
--

LOCK TABLES `project_tag` WRITE;
/*!40000 ALTER TABLE `project_tag` DISABLE KEYS */;
INSERT INTO `project_tag` VALUES (8,2,'2017-04-20 03:51:00','2017-04-20 03:51:00'),(9,2,'2017-04-20 04:09:22','2017-04-20 04:09:22'),(9,3,'2017-04-20 04:09:22','2017-04-20 04:09:22'),(8,4,'2017-04-21 23:25:24','2017-04-21 23:25:24'),(10,1,'2017-04-22 05:35:42','2017-04-22 05:35:42'),(10,2,'2017-04-22 05:35:42','2017-04-22 05:35:42'),(18,4,'2017-04-25 23:32:11','2017-04-25 23:32:11'),(19,1,'2017-04-27 04:07:09','2017-04-27 04:07:09'),(20,1,'2017-04-29 03:01:27','2017-04-29 03:01:27'),(20,3,'2017-04-29 03:01:27','2017-04-29 03:01:27'),(21,3,'2017-04-30 05:09:54','2017-04-30 05:09:54'),(22,3,'2017-04-30 06:37:59','2017-04-30 06:37:59');
/*!40000 ALTER TABLE `project_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_user`
--

DROP TABLE IF EXISTS `project_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_user` (
  `user_id` int(11) NOT NULL,
  `project_pid` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `transaction_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`project_pid`,`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_user`
--

LOCK TABLES `project_user` WRITE;
/*!40000 ALTER TABLE `project_user` DISABLE KEYS */;
INSERT INTO `project_user` VALUES (1,3,'2017-04-27 23:03:32','2017-04-27 23:03:32',10.00,'posted'),(1,3,'2017-04-27 23:31:20','2017-04-27 23:31:20',40.00,'posted'),(3,4,'2017-04-28 23:15:20','2017-04-28 23:15:20',100.00,'pending'),(3,4,'2017-04-28 23:30:07','2017-04-28 23:30:07',34.00,'pending'),(3,19,'2017-04-28 23:29:58','2017-04-28 23:29:58',52.00,'pending'),(3,20,'2017-04-28 23:12:59','2017-04-28 23:12:59',20.00,'pending');
/*!40000 ALTER TABLE `project_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `pname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `minmoney` double(10,2) NOT NULL,
  `maxmoney` double(10,2) NOT NULL,
  `endtime` datetime NOT NULL,
  `release_time` datetime NOT NULL,
  `raisedmoney` double(10,2) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `projects_user_id_foreign` (`user_id`),
  CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,1,'project music','this is a music project',10000.00,20000.00,'2017-04-18 16:51:09','2017-04-27 16:51:13',10001.00),(2,2,'jiaxiang\'s project','This is a project created by jiaxiang',111.00,222.00,'2017-05-19 00:00:00','2017-06-19 00:00:00',0.00),(3,1,'cathy\'s project','cathy\'s project',100.00,200.00,'2017-06-19 00:00:00','2017-07-19 00:00:00',200.00),(4,1,'test tag','test tag',10000.00,50000.00,'2017-06-21 00:00:00','2017-04-19 00:00:00',6004.00),(5,1,'request project','this is a test',20000.00,30000.00,'2017-04-22 00:00:00','2017-04-26 00:00:00',0.00),(8,1,'test tags array','test a tags array',100.00,200.00,'2017-04-21 00:00:00','2017-04-21 00:00:00',0.00),(9,1,'4 project','4project',11100.00,222000.00,'2017-04-22 00:00:00','2017-05-20 00:00:00',5000.00),(10,1,'project 5','5th project',3300.00,4400.00,'2017-05-22 00:00:00','2017-06-22 00:00:00',4540.00),(18,1,'6th project','this is the 6th project!',8000.00,9000.00,'2017-04-27 00:00:00','2017-05-25 00:00:00',9030.00),(19,2,'project jazz','this is a jazz project',30000.00,40000.00,'2017-05-27 00:00:00','2017-06-27 00:00:00',2869.00),(20,3,'mengmeng\'s project','this is my first updated project!',10000.00,20000.00,'2017-05-28 00:00:00','2017-06-28 00:00:00',330.00),(21,6,'test the search','testaaaa',100.00,1000.00,'2017-04-30 00:00:00','2018-04-30 00:00:00',0.00),(22,6,'test111','wwwwww',100.00,1000.00,'2018-04-30 00:00:00','2018-04-30 00:00:00',0.00);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `published_projects`
--

DROP TABLE IF EXISTS `published_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `published_projects` (
  `pid` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `materials` varchar(255) DEFAULT NULL,
  `fundmoney` float(10,2) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `published_projects`
--

LOCK TABLES `published_projects` WRITE;
/*!40000 ALTER TABLE `published_projects` DISABLE KEYS */;
INSERT INTO `published_projects` VALUES (1,'2017-04-28 23:25:16','2017-04-28 23:25:16','xxx',10001.00,'pending'),(3,'2017-04-28 23:25:16','2017-04-28 23:25:16','xxx',200.00,'pending'),(10,'2017-04-28 23:25:16','2017-04-28 23:25:16','xxx',4540.00,'pending'),(18,'2017-04-28 23:25:16','2017-04-28 23:25:16','xxx',9030.00,'pending');
/*!40000 ALTER TABLE `published_projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rates`
--

DROP TABLE IF EXISTS `rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rates` (
  `user_id` int(11) NOT NULL,
  `project_pid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`project_pid`,`rating`,`created_at`),
  KEY `project_pid` (`project_pid`),
  KEY `project_pid_2` (`project_pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rates`
--

LOCK TABLES `rates` WRITE;
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
INSERT INTO `rates` VALUES (1,3,3,'2017-04-29 01:28:19','2017-04-29 01:28:19'),(1,3,4,'2017-04-29 01:25:40','2017-04-29 01:25:40'),(1,4,4,'2017-04-28 04:39:14','2017-04-28 04:39:14'),(1,4,5,'2017-04-28 20:26:17','2017-04-28 20:26:20'),(1,19,4,'2017-04-28 04:40:39','2017-04-28 04:40:39');
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sample`
--

DROP TABLE IF EXISTS `sample`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sample` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `sample1` varchar(45) DEFAULT NULL,
  `sample2` varchar(45) DEFAULT NULL,
  `sample3` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sample`
--

LOCK TABLES `sample` WRITE;
/*!40000 ALTER TABLE `sample` DISABLE KEYS */;
INSERT INTO `sample` VALUES (1,22,'user6sample1.png',NULL,NULL);
/*!40000 ALTER TABLE `sample` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'jazz','2017-04-19 23:13:55','2017-04-19 23:13:59'),(2,'music','2017-04-19 23:14:07','2017-04-19 23:14:10'),(3,'people','2017-04-19 23:14:18','2017-04-19 23:14:21'),(4,'photos','2017-04-19 23:14:31','2017-04-19 23:14:33');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_logs`
--

DROP TABLE IF EXISTS `user_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_logs` (
  `user_id` int(10) unsigned NOT NULL,
  `project_pid` int(10) unsigned NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`project_pid`),
  KEY `project_pid_idx` (`project_pid`),
  CONSTRAINT `project_pid_cons` FOREIGN KEY (`project_pid`) REFERENCES `projects` (`pid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `user_id_cons` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logs`
--

LOCK TABLES `user_logs` WRITE;
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
INSERT INTO `user_logs` VALUES (6,1,1,'2017-04-30 02:55:12','2017-04-30 02:55:12'),(6,3,1,'2017-04-30 02:55:12','2017-04-30 02:55:12'),(6,4,5,'2017-04-30 02:14:50','2017-04-30 02:14:50'),(6,5,3,'2017-04-30 02:14:50','2017-04-30 02:14:50'),(6,8,3,'2017-04-30 02:14:50','2017-04-30 02:14:50'),(6,9,1,'2017-04-30 02:55:12','2017-04-30 02:55:12'),(6,10,1,'2017-04-30 02:55:12','2017-04-30 02:55:12'),(6,18,1,'2017-04-30 02:55:12','2017-04-30 02:55:12'),(6,19,1,'2017-04-30 02:54:54','2017-04-30 02:54:54'),(6,20,1,'2017-04-30 02:54:26','2017-04-30 02:54:26'),(6,21,2,'2017-04-30 02:14:50','2017-04-30 02:14:50'),(6,22,2,'2017-04-30 02:54:14','2017-04-30 02:54:14');
/*!40000 ALTER TABLE `user_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `interest` varchar(255) DEFAULT NULL,
  `creditcard` varchar(255) DEFAULT NULL,
  `legalname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` VALUES (1,'Shenzhen','1993-10-08 00:00:00','gym','123456','cathy wang'),(2,'Harbin','1992-11-06 00:00:00','movie','234567','Jiaxiang Lin'),(3,'new york','2017-04-28 00:00:00','reading','456789','meng wang');
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'cathy','cathy@gmail.com','$2y$10$RFjU.e3X/jNQqymcDr4jaejK1tVyCvGKzz8AOQr577kxrttTzlOby','739wGsM90JA0SKnMuFKhw43S20YsnE4a62SuvbJNisdhDgEc6RGhRzfoX0ov','2017-04-20 00:45:56','2017-04-20 00:45:56'),(2,'Jiaxiang Lin','jiaxiang.lin@nyu.edu','$2y$10$a2zUhrRAxKHgCIYT2.u/3OKG.rpJcgOEfYBgj6fyaBXC9i.0V3tGG','s6t1KrXYGh7aBCI4Q1g1JMZEuEsQYHuQWNLeqD1ZikLsy7OIp1M8J2BWQOc3','2017-04-20 00:50:57','2017-04-20 00:50:57'),(3,'mengmeng','mengmeng@gmail.com','$2y$10$AVa/oUD2iovbjzdYyfSPJ.s/A2iFLjKtTsFSa4qW1GF22vUOqrKIi','wgd77g0hhgpljxfxcaYS7uhp5IzWt2u2JeI0i92jO9HRAVmerE1trnT9LoJi','2017-04-29 03:00:51','2017-04-29 03:00:51'),(4,'Yi Qin','yq468@nyu.edu','$2y$10$WY8tOjt8casHEy4yepmyKOTyQFNiQYX4kFT3uTY0trUg4XSgNJhIS','tfyW4fDipHoMuAN836XTEUWLlxxb3sU9aUiW0bgQ26c64AiWQd23YhLxuZjU','2017-04-29 19:00:22','2017-04-29 19:00:22'),(5,'Katelyn','qinyi468@gmail.com','$2y$10$TXJrsGghFbSz9OOnmPlZvevIex.4z8c.3mEw7Yf0YIUvdz7MO6WDu','EIstCNfsFrPpGiSNBHfVhjCcl0JQ1Jf7gVpCaEr6vo8CUIzi3tazEWgwbqXj','2017-04-29 19:02:39','2017-04-29 19:02:39'),(6,'katelyn1','qinyi4681@gmail.com','$2y$10$F8O8clgRrEKYM2IWjdhlqOqxaWm1HcNZRT9hVM7Ss5hCSSS9cdS8S','IrxaD0tq2bs9502WYF3QKhJc0rMDENi29EDX78WZX3fagrHX4qmeRheXO2ac','2017-04-29 19:05:15','2017-04-29 19:05:15');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-29 22:59:56
