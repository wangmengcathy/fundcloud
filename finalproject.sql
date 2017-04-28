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
  `project_pid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `replied_id` int(11) unsigned DEFAULT NULL,
  `replied_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `replied_id_idx` (`replied_id`),
  CONSTRAINT `replied_id` FOREIGN KEY (`replied_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,18,1,NULL,NULL,'my first comment','2017-04-25 19:42:21','2017-04-25 19:42:26'),(2,18,1,NULL,NULL,'here is my comment','2017-04-26 00:21:50','2017-04-26 00:21:50'),(4,10,1,NULL,NULL,'I\'m commenting the 5th project','2017-04-26 00:38:45','2017-04-26 00:38:45'),(5,10,1,NULL,NULL,'another comments','2017-04-26 00:43:26','2017-04-26 00:43:26'),(6,10,1,NULL,NULL,'another try!','2017-04-26 00:49:09','2017-04-26 00:49:09'),(7,18,1,NULL,NULL,'cathy leaves a comment here.','2017-04-26 00:49:44','2017-04-26 00:49:44'),(8,3,3,NULL,NULL,'good','2017-04-28 00:40:42','2017-04-28 00:40:42'),(28,19,3,NULL,NULL,'add','2017-04-28 23:19:23','2017-04-28 23:19:23'),(29,19,3,NULL,NULL,'reply','2017-04-28 23:19:30','2017-04-28 23:19:30'),(30,19,3,NULL,NULL,'qqqq','2017-04-28 23:29:24','2017-04-28 23:29:24'),(31,19,3,NULL,NULL,'1111','2017-04-28 23:29:50','2017-04-28 23:29:50'),(32,19,3,1,NULL,'222','2017-04-28 23:30:10','2017-04-28 23:30:10'),(33,19,3,3,NULL,'3333','2017-04-28 23:32:13','2017-04-28 23:32:13'),(34,19,3,3,NULL,'ssss','2017-04-28 23:38:56','2017-04-28 23:38:56'),(35,19,3,3,'yiqin','qqqq','2017-04-28 23:52:41','2017-04-28 23:52:41'),(36,19,3,3,'yiqin','aaaaa','2017-04-29 00:36:04','2017-04-29 00:36:04'),(37,19,3,3,'yiqin','44444','2017-04-29 01:29:10','2017-04-29 01:29:10');
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`following_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followers`
--

LOCK TABLES `followers` WRITE;
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;
INSERT INTO `followers` VALUES (2,1,'2017-04-26 23:12:19','2017-04-26 23:12:19');
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
INSERT INTO `likes` VALUES (3,4,'2017-04-27 20:16:25','2017-04-27 20:16:25'),(3,19,'2017-04-28 20:36:22','2017-04-28 20:36:22');
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
INSERT INTO `migrations` VALUES (26,'2014_10_12_000000_create_users_table',1),(27,'2014_10_12_100000_create_password_resets_table',1),(28,'2017_04_19_195041_create_table_projects',1),(29,'2017_04_19_230010_create_tags_table',2),(34,'2017_04_25_220706_create_followers_table',3),(36,'2017_04_26_210251_create_published_projects_table',4);
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
INSERT INTO `project_tag` VALUES (8,2,'2017-04-20 03:51:00','2017-04-20 03:51:00'),(9,2,'2017-04-20 04:09:22','2017-04-20 04:09:22'),(9,3,'2017-04-20 04:09:22','2017-04-20 04:09:22'),(8,4,'2017-04-21 23:25:24','2017-04-21 23:25:24'),(10,1,'2017-04-22 05:35:42','2017-04-22 05:35:42'),(10,2,'2017-04-22 05:35:42','2017-04-22 05:35:42'),(18,4,'2017-04-25 23:32:11','2017-04-25 23:32:11'),(19,2,'2017-04-28 00:34:49','2017-04-28 00:34:49');
/*!40000 ALTER TABLE `project_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_user`
--

DROP TABLE IF EXISTS `project_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_user` (
  `user_id` int(10) unsigned NOT NULL,
  `project_pid` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`created_at`,`project_pid`,`user_id`),
  KEY `project_user_user_id_foreign` (`user_id`),
  KEY `project_user_project_id_foreign` (`project_pid`),
  CONSTRAINT `project_user_project_id_foreign` FOREIGN KEY (`project_pid`) REFERENCES `projects` (`pid`) ON DELETE CASCADE,
  CONSTRAINT `project_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_user`
--

LOCK TABLES `project_user` WRITE;
/*!40000 ALTER TABLE `project_user` DISABLE KEYS */;
INSERT INTO `project_user` VALUES (1,10,'2017-04-25 04:30:34','2017-04-25 04:30:34',67.00,'pending'),(1,10,'2017-04-25 04:46:13','2017-04-25 04:46:13',40.00,'pending'),(1,10,'2017-04-26 19:21:10','2017-04-26 19:21:13',12.00,'pending'),(2,10,'2017-04-26 23:22:06','2017-04-26 23:22:06',50.00,'pending'),(2,10,'2017-04-26 23:44:02','2017-04-26 23:44:02',400.00,'pending'),(2,10,'2017-04-26 23:48:27','2017-04-26 23:48:27',4000.00,'pending'),(2,10,'2017-04-27 01:10:36','2017-04-27 01:10:36',10.00,'pending'),(3,3,'2017-04-28 00:43:36','2017-04-28 00:43:36',1.00,'pending'),(3,4,'2017-04-28 00:46:48','2017-04-28 00:46:48',10.00,'pending'),(3,4,'2017-04-28 00:47:51','2017-04-28 00:47:51',20.00,'pending'),(3,19,'2017-04-28 01:55:08','2017-04-28 01:55:08',2.00,'pending');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,1,'project music','this is a music project',10000.00,20000.00,'2017-04-18 16:51:09','2017-04-27 16:51:13',10001.00),(2,2,'jiaxiang\'s project','This is a project created by jiaxiang',111.00,222.00,'2017-05-19 00:00:00','2017-06-19 00:00:00',0.00),(3,1,'cathy\'s project','cathy\'s project',100.00,200.00,'2017-06-19 00:00:00','2017-07-19 00:00:00',1.00),(4,1,'test tag','test tag',10000.00,50000.00,'2017-06-21 00:00:00','2017-04-19 00:00:00',5030.00),(5,1,'request project','this is a test',20000.00,30000.00,'2017-04-22 00:00:00','2017-04-26 00:00:00',0.00),(8,1,'test tags array','test a tags array',100.00,200.00,'2017-04-21 00:00:00','2017-04-21 00:00:00',0.00),(9,1,'4 project','4project',11100.00,222000.00,'2017-04-22 00:00:00','2017-05-20 00:00:00',5000.00),(10,1,'project 5','5th project',3300.00,4400.00,'2017-05-22 00:00:00','2017-06-22 00:00:00',4473.00),(18,1,'6th project','this is the 6th project!',8000.00,9000.00,'2017-04-27 00:00:00','2017-05-25 00:00:00',0.00),(19,3,'Yi\'s project','hahaha',500.00,700.00,'2017-05-27 00:00:00','2017-05-27 00:00:00',2.00);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `published_projects`
--

DROP TABLE IF EXISTS `published_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `published_projects` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `materials` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fundmoney` double(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `published_projects`
--

LOCK TABLES `published_projects` WRITE;
/*!40000 ALTER TABLE `published_projects` DISABLE KEYS */;
INSERT INTO `published_projects` VALUES (1,'2017-04-27 01:16:14','2017-04-27 01:16:14','xxx',10001.00,'pending'),(10,'2017-04-26 21:10:36','2017-04-26 21:10:36','xxx',4579.00,'pending');
/*!40000 ALTER TABLE `published_projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rates`
--

DROP TABLE IF EXISTS `rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rates` (
  `user_id` int(11) DEFAULT NULL,
  `project_pid` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rates`
--

LOCK TABLES `rates` WRITE;
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;
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
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `hometown` varchar(45) DEFAULT NULL,
  `interest` varchar(45) DEFAULT NULL,
  `creditcard` varchar(45) DEFAULT NULL,
  `legalname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'cathy','cathy@gmail.com','$2y$10$RFjU.e3X/jNQqymcDr4jaejK1tVyCvGKzz8AOQr577kxrttTzlOby','0v4UvTsKpQFzqlkcobHNT9zUNCX4DqVnks0pDwnMBLdJCUZv6V8RE9Cku3lo','2017-04-20 00:45:56','2017-04-20 00:45:56'),(2,'Jiaxiang Lin','jiaxiang.lin@nyu.edu','$2y$10$a2zUhrRAxKHgCIYT2.u/3OKG.rpJcgOEfYBgj6fyaBXC9i.0V3tGG','FMGSFVeaMepfwTwn5xAiYbVeXE1xnJVnetBIx2ujhOgDeGDJduDZEtBKHzl3','2017-04-20 00:50:57','2017-04-20 00:50:57'),(3,'yiqin','qinyi468@gmail.com','$2y$10$b25h0JLlb5ITw9NGzYC.XeMkwohIGWQ2fdAK0uIDDqr4ms1Bzse76',NULL,'2017-04-28 00:11:39','2017-04-28 00:11:39');
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

-- Dump completed on 2017-04-28 17:43:00
