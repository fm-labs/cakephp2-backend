

DROP TABLE IF EXISTS `cnt_local`.`cnt_acos`;
DROP TABLE IF EXISTS `cnt_local`.`cnt_aros`;
DROP TABLE IF EXISTS `cnt_local`.`cnt_aros_acos`;
DROP TABLE IF EXISTS `cnt_local`.`cnt_backend_user_groups`;
DROP TABLE IF EXISTS `cnt_local`.`cnt_backend_users`;


CREATE TABLE `cnt_local`.`cnt_acos` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`parent_id` int(10) DEFAULT NULL,
	`model` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`foreign_key` int(10) DEFAULT NULL,
	`alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`lft` int(10) DEFAULT NULL,
	`rght` int(10) DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `cnt_local`.`cnt_aros` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`parent_id` int(10) DEFAULT NULL,
	`model` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`foreign_key` int(10) DEFAULT NULL,
	`alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`lft` int(10) DEFAULT NULL,
	`rght` int(10) DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `cnt_local`.`cnt_aros_acos` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`aro_id` int(10) NOT NULL,
	`aco_id` int(10) NOT NULL,
	`_create` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0' NOT NULL,
	`_read` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0' NOT NULL,
	`_update` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0' NOT NULL,
	`_delete` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0' NOT NULL,	PRIMARY KEY  (`id`),
	UNIQUE KEY `ARO_ACO_KEY` (`aro_id`, `aco_id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `cnt_local`.`cnt_backend_user_groups` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `cnt_local`.`cnt_backend_users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`backend_user_group_id` int(11) DEFAULT NULL,
	`username` varchar(127) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`mail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`last_login` datetime DEFAULT NULL,
	`published` tinyint(1) DEFAULT '0' NOT NULL,
	`created` datetime DEFAULT NULL,	PRIMARY KEY  (`id`),
	UNIQUE KEY `username` (`username`),
	UNIQUE KEY `mail` (`mail`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

