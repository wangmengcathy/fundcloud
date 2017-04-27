/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50717
 Source Host           : localhost
 Source Database       : finalproject

 Target Server Type    : MySQL
 Target Server Version : 50717
 File Encoding         : utf-8

 Date: 04/26/2017 17:19:41 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_pid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `comments`
-- ----------------------------
BEGIN;
INSERT INTO `comments` VALUES ('1', '18', '1', 'my first comment', '2017-04-25 15:42:21', '2017-04-25 15:42:26'), ('2', '18', '1', 'here is my comment', '2017-04-25 20:21:50', '2017-04-25 20:21:50'), ('4', '10', '1', 'I\'m commenting the 5th project', '2017-04-25 20:38:45', '2017-04-25 20:38:45'), ('5', '10', '1', 'another comments', '2017-04-25 20:43:26', '2017-04-25 20:43:26'), ('6', '10', '1', 'another try!', '2017-04-25 20:49:09', '2017-04-25 20:49:09'), ('7', '18', '1', 'cathy leaves a comment here.', '2017-04-25 20:49:44', '2017-04-25 20:49:44');
COMMIT;

-- ----------------------------
--  Table structure for `followers`
-- ----------------------------
DROP TABLE IF EXISTS `followers`;
CREATE TABLE `followers` (
  `user_id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`following_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `followers`
-- ----------------------------
BEGIN;
INSERT INTO `followers` VALUES ('2', '1', '2017-04-26 19:12:19', '2017-04-26 19:12:19');
COMMIT;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('26', '2014_10_12_000000_create_users_table', '1'), ('27', '2014_10_12_100000_create_password_resets_table', '1'), ('28', '2017_04_19_195041_create_table_projects', '1'), ('29', '2017_04_19_230010_create_tags_table', '2'), ('34', '2017_04_25_220706_create_followers_table', '3'), ('36', '2017_04_26_210251_create_published_projects_table', '4');
COMMIT;

-- ----------------------------
--  Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `project_tag`
-- ----------------------------
DROP TABLE IF EXISTS `project_tag`;
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

-- ----------------------------
--  Records of `project_tag`
-- ----------------------------
BEGIN;
INSERT INTO `project_tag` VALUES ('8', '2', '2017-04-19 23:51:00', '2017-04-19 23:51:00'), ('9', '2', '2017-04-20 00:09:22', '2017-04-20 00:09:22'), ('9', '3', '2017-04-20 00:09:22', '2017-04-20 00:09:22'), ('8', '4', '2017-04-21 19:25:24', '2017-04-21 19:25:24'), ('10', '1', '2017-04-22 01:35:42', '2017-04-22 01:35:42'), ('10', '2', '2017-04-22 01:35:42', '2017-04-22 01:35:42'), ('18', '4', '2017-04-25 19:32:11', '2017-04-25 19:32:11');
COMMIT;

-- ----------------------------
--  Table structure for `project_user`
-- ----------------------------
DROP TABLE IF EXISTS `project_user`;
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

-- ----------------------------
--  Records of `project_user`
-- ----------------------------
BEGIN;
INSERT INTO `project_user` VALUES ('1', '10', '2017-04-25 00:30:34', '2017-04-25 00:30:34', '67.00', 'pending'), ('1', '10', '2017-04-25 00:46:13', '2017-04-25 00:46:13', '40.00', 'pending'), ('1', '10', '2017-04-26 15:21:10', '2017-04-26 15:21:13', '12.00', 'pending'), ('2', '10', '2017-04-26 19:22:06', '2017-04-26 19:22:06', '50.00', 'pending'), ('2', '10', '2017-04-26 19:44:02', '2017-04-26 19:44:02', '400.00', 'pending'), ('2', '10', '2017-04-26 19:48:27', '2017-04-26 19:48:27', '4000.00', 'pending'), ('2', '10', '2017-04-26 21:10:36', '2017-04-26 21:10:36', '10.00', 'pending');
COMMIT;

-- ----------------------------
--  Table structure for `projects`
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `projects`
-- ----------------------------
BEGIN;
INSERT INTO `projects` VALUES ('1', '1', 'project music', 'this is a music project', '10000.00', '20000.00', '2017-04-18 16:51:09', '2017-04-27 16:51:13', '10001.00'), ('2', '2', 'jiaxiang\'s project', 'This is a project created by jiaxiang', '111.00', '222.00', '2017-05-19 00:00:00', '2017-06-19 00:00:00', '0.00'), ('3', '1', 'cathy\'s project', 'cathy\'s project', '100.00', '200.00', '2017-06-19 00:00:00', '2017-07-19 00:00:00', '0.00'), ('4', '1', 'test tag', 'test tag', '10000.00', '50000.00', '2017-06-21 00:00:00', '2017-04-19 00:00:00', '5000.00'), ('5', '1', 'request project', 'this is a test', '20000.00', '30000.00', '2017-04-22 00:00:00', '2017-04-26 00:00:00', '0.00'), ('8', '1', 'test tags array', 'test a tags array', '100.00', '200.00', '2017-04-21 00:00:00', '2017-04-21 00:00:00', '0.00'), ('9', '1', '4 project', '4project', '11100.00', '222000.00', '2017-04-22 00:00:00', '2017-05-20 00:00:00', '5000.00'), ('10', '1', 'project 5', '5th project', '3300.00', '4400.00', '2017-05-22 00:00:00', '2017-06-22 00:00:00', '4473.00'), ('18', '1', '6th project', 'this is the 6th project!', '8000.00', '9000.00', '2017-04-27 00:00:00', '2017-05-25 00:00:00', '0.00');
COMMIT;

-- ----------------------------
--  Table structure for `published_projects`
-- ----------------------------
DROP TABLE IF EXISTS `published_projects`;
CREATE TABLE `published_projects` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `materials` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fundmoney` double(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `published_projects`
-- ----------------------------
BEGIN;
INSERT INTO `published_projects` VALUES ('1', '2017-04-26 21:16:14', '2017-04-26 21:16:14', 'xxx', '10001.00', 'pending'), ('10', '2017-04-26 17:10:36', '2017-04-26 17:10:36', 'xxx', '4579.00', 'pending');
COMMIT;

-- ----------------------------
--  Table structure for `tags`
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `tags`
-- ----------------------------
BEGIN;
INSERT INTO `tags` VALUES ('1', 'jazz', '2017-04-19 19:13:55', '2017-04-19 19:13:59'), ('2', 'music', '2017-04-19 19:14:07', '2017-04-19 19:14:10'), ('3', 'people', '2017-04-19 19:14:18', '2017-04-19 19:14:21'), ('4', 'photos', '2017-04-19 19:14:31', '2017-04-19 19:14:33');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'cathy', 'cathy@gmail.com', '$2y$10$RFjU.e3X/jNQqymcDr4jaejK1tVyCvGKzz8AOQr577kxrttTzlOby', '0v4UvTsKpQFzqlkcobHNT9zUNCX4DqVnks0pDwnMBLdJCUZv6V8RE9Cku3lo', '2017-04-19 20:45:56', '2017-04-19 20:45:56'), ('2', 'Jiaxiang Lin', 'jiaxiang.lin@nyu.edu', '$2y$10$a2zUhrRAxKHgCIYT2.u/3OKG.rpJcgOEfYBgj6fyaBXC9i.0V3tGG', 'FMGSFVeaMepfwTwn5xAiYbVeXE1xnJVnetBIx2ujhOgDeGDJduDZEtBKHzl3', '2017-04-19 20:50:57', '2017-04-19 20:50:57');
COMMIT;

-- ----------------------------
--  Triggers structure for table project_user
-- ----------------------------
DROP TRIGGER IF EXISTS `update_raisedmoney`;
delimiter ;;
CREATE TRIGGER `update_raisedmoney` AFTER INSERT ON `project_user` FOR EACH ROW UPDATE projects
     SET raisedmoney = raisedmoney+NEW.amount
   WHERE pid = NEW.project_pid
 ;;
delimiter ;
DROP TRIGGER IF EXISTS `check_reach_maxmoney`;
delimiter ;;
CREATE TRIGGER `check_reach_maxmoney` AFTER INSERT ON `project_user` FOR EACH ROW BEGIN
	IF EXISTS(SELECT pid from projects natural join
	(SELECT project_pid,sum(amount) as sum_amt from project_user
	 where project_pid = NEW.project_pid
	 group by project_pid)as B
	where sum_amt >=maxmoney)
	THEN INSERT INTO published_projects values (NEW.project_pid,now(),now(),'xxx',
	(select sum(amount) as sum_amt from project_user where project_pid = NEW.project_pid),'pending');
	END IF;
	END
 ;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
