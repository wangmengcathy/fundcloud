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

 Date: 04/21/2017 15:48:21 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
INSERT INTO `project_tag` VALUES ('8', '2', '2017-04-19 23:51:00', '2017-04-19 23:51:00'), ('9', '2', '2017-04-20 00:09:22', '2017-04-20 00:09:22'), ('9', '3', '2017-04-20 00:09:22', '2017-04-20 00:09:22'), ('8', '4', '2017-04-21 19:25:24', '2017-04-21 19:25:24');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `projects`
-- ----------------------------
BEGIN;
INSERT INTO `projects` VALUES ('1', '1', 'Project Music', 'this is a music project', '10000.00', '20000.00', '2017-04-23 16:44:49', '2017-05-12 16:44:54', '10001.00'), ('2', '2', 'jiaxiang\'s project', 'This is a project created by jiaxiang', '111.00', '222.00', '2017-05-19 00:00:00', '2017-06-19 00:00:00', '0.00'), ('3', '1', 'cathy\'s project', 'cathy\'s project', '100.00', '200.00', '2017-06-19 00:00:00', '2017-07-19 00:00:00', '0.00'), ('4', '1', 'test tag', 'test tag', '10000.00', '50000.00', '2017-06-21 00:00:00', '2017-04-19 00:00:00', '5000.00'), ('5', '1', 'request project', 'this is a test', '20000.00', '30000.00', '2017-04-22 00:00:00', '2017-04-26 00:00:00', '0.00'), ('8', '1', 'test tags array', 'test a tags array', '100.00', '200.00', '2017-04-21 00:00:00', '2017-04-21 00:00:00', '0.00'), ('9', '1', '4 project', '4project', '11100.00', '222000.00', '2017-04-22 00:00:00', '2017-05-20 00:00:00', '5000.00');
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
INSERT INTO `users` VALUES ('1', 'cathy', 'cathy@gmail.com', '$2y$10$RFjU.e3X/jNQqymcDr4jaejK1tVyCvGKzz8AOQr577kxrttTzlOby', 'mRDMDD0yOQP7hol9V4Dc2VpIF1lO3HU2HYv8JGMUTwCS0Zmq9f6bszohIu4A', '2017-04-19 20:45:56', '2017-04-19 20:45:56'), ('2', 'Jiaxiang Lin', 'jiaxiang.lin@nyu.edu', '$2y$10$a2zUhrRAxKHgCIYT2.u/3OKG.rpJcgOEfYBgj6fyaBXC9i.0V3tGG', 'FMGSFVeaMepfwTwn5xAiYbVeXE1xnJVnetBIx2ujhOgDeGDJduDZEtBKHzl3', '2017-04-19 20:50:57', '2017-04-19 20:50:57');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
