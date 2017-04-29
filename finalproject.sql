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

 Date: 04/28/2017 21:34:21 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
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

-- ----------------------------
--  Records of `comments`
-- ----------------------------
BEGIN;
INSERT INTO `comments` VALUES ('1', '18', '1', 'my first comment', '2017-04-25 15:42:21', '2017-04-25 15:42:26', null, null), ('2', '18', '1', 'here is my comment', '2017-04-25 20:21:50', '2017-04-25 20:21:50', null, null), ('4', '10', '1', 'I\'m commenting the 5th project', '2017-04-25 20:38:45', '2017-04-25 20:38:45', null, null), ('5', '10', '1', 'another comments', '2017-04-25 20:43:26', '2017-04-25 20:43:26', null, null), ('6', '10', '1', 'another try!', '2017-04-25 20:49:09', '2017-04-25 20:49:09', null, null), ('7', '18', '1', 'cathy leaves a comment here.', '2017-04-25 20:49:44', '2017-04-25 20:49:44', null, null), ('8', '19', '1', 'cathy leaves a comment here', '2017-04-28 20:56:58', '2017-04-28 20:56:58', null, null), ('9', '19', '2', 'Jiaxiang leaves a comment here', '2017-04-28 22:06:38', '2017-04-28 22:06:38', '1', null), ('10', '19', '2', 'hi!', '2017-04-28 22:07:06', '2017-04-28 22:07:06', '2', 'Jiaxiang Lin'), ('11', '4', '1', 'hi', '2017-04-28 18:10:18', '2017-04-28 18:10:20', null, null), ('12', '20', '3', 'hi', '2017-04-28 19:02:02', '2017-04-28 19:02:04', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `followers`
-- ----------------------------
DROP TABLE IF EXISTS `followers`;
CREATE TABLE `followers` (
  `user_id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`following_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `followers`
-- ----------------------------
BEGIN;
INSERT INTO `followers` VALUES ('3', '2', '2017-04-28 23:34:24', '2017-04-28 23:34:24');
COMMIT;

-- ----------------------------
--  Table structure for `likes`
-- ----------------------------
DROP TABLE IF EXISTS `likes`;
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

-- ----------------------------
--  Records of `likes`
-- ----------------------------
BEGIN;
INSERT INTO `likes` VALUES ('1', '19', '2017-04-28 22:37:22', '2017-04-28 22:37:22');
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
INSERT INTO `migrations` VALUES ('26', '2014_10_12_000000_create_users_table', '1'), ('27', '2014_10_12_100000_create_password_resets_table', '1'), ('28', '2017_04_19_195041_create_table_projects', '1'), ('29', '2017_04_19_230010_create_tags_table', '2');
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
INSERT INTO `project_tag` VALUES ('8', '2', '2017-04-19 23:51:00', '2017-04-19 23:51:00'), ('9', '2', '2017-04-20 00:09:22', '2017-04-20 00:09:22'), ('9', '3', '2017-04-20 00:09:22', '2017-04-20 00:09:22'), ('8', '4', '2017-04-21 19:25:24', '2017-04-21 19:25:24'), ('10', '1', '2017-04-22 01:35:42', '2017-04-22 01:35:42'), ('10', '2', '2017-04-22 01:35:42', '2017-04-22 01:35:42'), ('18', '4', '2017-04-25 19:32:11', '2017-04-25 19:32:11'), ('19', '1', '2017-04-27 00:07:09', '2017-04-27 00:07:09'), ('20', '1', '2017-04-28 23:01:27', '2017-04-28 23:01:27'), ('20', '3', '2017-04-28 23:01:27', '2017-04-28 23:01:27');
COMMIT;

-- ----------------------------
--  Table structure for `project_user`
-- ----------------------------
DROP TABLE IF EXISTS `project_user`;
CREATE TABLE `project_user` (
  `user_id` int(11) NOT NULL,
  `project_pid` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `transaction_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`project_pid`,`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `project_user`
-- ----------------------------
BEGIN;
INSERT INTO `project_user` VALUES ('1', '3', '2017-04-27 23:03:32', '2017-04-27 23:03:32', '10.00', 'posted'), ('1', '3', '2017-04-27 23:31:20', '2017-04-27 23:31:20', '40.00', 'posted'), ('3', '4', '2017-04-28 23:15:20', '2017-04-28 23:15:20', '100.00', 'pending'), ('3', '4', '2017-04-28 23:30:07', '2017-04-28 23:30:07', '34.00', 'pending'), ('3', '19', '2017-04-28 23:29:58', '2017-04-28 23:29:58', '52.00', 'pending'), ('3', '20', '2017-04-28 23:12:59', '2017-04-28 23:12:59', '20.00', 'pending');
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `projects`
-- ----------------------------
BEGIN;
INSERT INTO `projects` VALUES ('1', '1', 'project music', 'this is a music project', '10000.00', '20000.00', '2017-04-18 16:51:09', '2017-04-27 16:51:13', '10001.00'), ('2', '2', 'jiaxiang\'s project', 'This is a project created by jiaxiang', '111.00', '222.00', '2017-05-19 00:00:00', '2017-06-19 00:00:00', '0.00'), ('3', '1', 'cathy\'s project', 'cathy\'s project', '100.00', '200.00', '2017-06-19 00:00:00', '2017-07-19 00:00:00', '200.00'), ('4', '1', 'test tag', 'test tag', '10000.00', '50000.00', '2017-06-21 00:00:00', '2017-04-19 00:00:00', '6004.00'), ('5', '1', 'request project', 'this is a test', '20000.00', '30000.00', '2017-04-22 00:00:00', '2017-04-26 00:00:00', '0.00'), ('8', '1', 'test tags array', 'test a tags array', '100.00', '200.00', '2017-04-21 00:00:00', '2017-04-21 00:00:00', '0.00'), ('9', '1', '4 project', '4project', '11100.00', '222000.00', '2017-04-22 00:00:00', '2017-05-20 00:00:00', '5000.00'), ('10', '1', 'project 5', '5th project', '3300.00', '4400.00', '2017-05-22 00:00:00', '2017-06-22 00:00:00', '4540.00'), ('18', '1', '6th project', 'this is the 6th project!', '8000.00', '9000.00', '2017-04-27 00:00:00', '2017-05-25 00:00:00', '9030.00'), ('19', '2', 'project jazz', 'this is a jazz project', '30000.00', '40000.00', '2017-05-27 00:00:00', '2017-06-27 00:00:00', '2869.00'), ('20', '3', 'mengmeng\'s project', 'this is my first updated project!', '10000.00', '20000.00', '2017-05-28 00:00:00', '2017-06-28 00:00:00', '330.00');
COMMIT;

-- ----------------------------
--  Table structure for `published_projects`
-- ----------------------------
DROP TABLE IF EXISTS `published_projects`;
CREATE TABLE `published_projects` (
  `pid` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `materials` varchar(255) DEFAULT NULL,
  `fundmoney` float(10,2) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `published_projects`
-- ----------------------------
BEGIN;
INSERT INTO `published_projects` VALUES ('1', '2017-04-28 23:25:16', '2017-04-28 23:25:16', 'xxx', '10001.00', 'pending'), ('3', '2017-04-28 23:25:16', '2017-04-28 23:25:16', 'xxx', '200.00', 'pending'), ('10', '2017-04-28 23:25:16', '2017-04-28 23:25:16', 'xxx', '4540.00', 'pending'), ('18', '2017-04-28 23:25:16', '2017-04-28 23:25:16', 'xxx', '9030.00', 'pending');
COMMIT;

-- ----------------------------
--  Table structure for `rates`
-- ----------------------------
DROP TABLE IF EXISTS `rates`;
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

-- ----------------------------
--  Records of `rates`
-- ----------------------------
BEGIN;
INSERT INTO `rates` VALUES ('1', '3', '3', '2017-04-29 01:28:19', '2017-04-29 01:28:19'), ('1', '3', '4', '2017-04-29 01:25:40', '2017-04-29 01:25:40'), ('1', '4', '4', '2017-04-28 04:39:14', '2017-04-28 04:39:14'), ('1', '4', '5', '2017-04-28 20:26:17', '2017-04-28 20:26:20'), ('1', '19', '4', '2017-04-28 04:40:39', '2017-04-28 04:40:39');
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
--  Table structure for `user_profiles`
-- ----------------------------
DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `interest` varchar(255) DEFAULT NULL,
  `creditcard` varchar(255) DEFAULT NULL,
  `legalname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `user_profiles`
-- ----------------------------
BEGIN;
INSERT INTO `user_profiles` VALUES ('1', 'Shenzhen', '1993-10-08 00:00:00', 'gym', '123456', 'cathy wang'), ('2', 'Harbin', '1992-11-06 00:00:00', 'movie', '234567', 'Jiaxiang Lin'), ('3', 'new york', '2017-04-28 00:00:00', 'reading', '456789', 'meng wang');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'cathy', 'cathy@gmail.com', '$2y$10$RFjU.e3X/jNQqymcDr4jaejK1tVyCvGKzz8AOQr577kxrttTzlOby', '739wGsM90JA0SKnMuFKhw43S20YsnE4a62SuvbJNisdhDgEc6RGhRzfoX0ov', '2017-04-19 20:45:56', '2017-04-19 20:45:56'), ('2', 'Jiaxiang Lin', 'jiaxiang.lin@nyu.edu', '$2y$10$a2zUhrRAxKHgCIYT2.u/3OKG.rpJcgOEfYBgj6fyaBXC9i.0V3tGG', 's6t1KrXYGh7aBCI4Q1g1JMZEuEsQYHuQWNLeqD1ZikLsy7OIp1M8J2BWQOc3', '2017-04-19 20:50:57', '2017-04-19 20:50:57'), ('3', 'mengmeng', 'mengmeng@gmail.com', '$2y$10$AVa/oUD2iovbjzdYyfSPJ.s/A2iFLjKtTsFSa4qW1GF22vUOqrKIi', 'wgd77g0hhgpljxfxcaYS7uhp5IzWt2u2JeI0i92jO9HRAVmerE1trnT9LoJi', '2017-04-28 23:00:51', '2017-04-28 23:00:51');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
