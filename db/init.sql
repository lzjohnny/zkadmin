CREATE DATABASE IF NOT EXISTS `db_shepher`;
USE `db_shepher`;

CREATE TABLE IF NOT EXISTS `tb_cluster` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '',
  `config` varchar(255) NOT NULL DEFAULT '',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tb_need_review` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cluster` varchar(255) NOT NULL DEFAULT '',
  `reviewer_list` varchar(1024) NOT NULL DEFAULT '',
  `path_prefix` varchar(255) NOT NULL DEFAULT '',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_path_prefix_cluster` (`path_prefix`,`cluster`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tb_permission` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cluster` varchar(32) NOT NULL DEFAULT '',
  `path` varchar(192) NOT NULL DEFAULT '',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_path_cluster` (`path`,`cluster`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tb_permission_team` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) unsigned NOT NULL DEFAULT '0',
  `team_id` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_permission_team` (`permission_id`,`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tb_review_request` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cluster` varchar(32) NOT NULL DEFAULT '',
  `path` varchar(192) NOT NULL DEFAULT '',
  `snapshot` int(11) unsigned NOT NULL DEFAULT '0',
  `new_snapshot` int(11) unsigned NOT NULL DEFAULT '0',
  `review_status` tinyint(3) NOT NULL DEFAULT '0',
  `creator` varchar(64) NOT NULL DEFAULT '',
  `reviewer` varchar(64) NOT NULL DEFAULT '',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '1970-01-01 08:00:01',
  `action` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_path_cluster` (`path`,`cluster`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tb_snapshot` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cluster` varchar(32) NOT NULL DEFAULT '',
  `path` varchar(192) NOT NULL DEFAULT '',
  `content` mediumtext DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action` tinyint(3) NOT NULL DEFAULT '0',
  `zk_mtime` timestamp NOT NULL DEFAULT '1970-01-01 08:00:01',
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `zk_version` int(11) NOT NULL DEFAULT '-1',
  `creator` varchar(64) NOT NULL DEFAULT '',
  `reviewer` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_path_cluster_zkmtime_zkversion` (`path`,`cluster`,`zk_mtime`,`zk_version`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tb_team` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '',
  `owner` int(11) unsigned NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tb_user_team` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `team_id` int(11) unsigned NOT NULL DEFAULT '0',
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_team_user` (`team_id`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `cluster` VALUES (1,'local_test','zookeeper:2181',now());

INSERT INTO `team` VALUES (1,'admin',1,now());

INSERT INTO `user` VALUES (1,'youradmin',now());

INSERT INTO `user_team` VALUES (1,1,1,100,10,now());