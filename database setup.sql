SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE `assets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `asset_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` tinytext NOT NULL,
  `object_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `first_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `description` tinytext NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `primary_email_id` int(11) DEFAULT NULL,
  `primary_phone_id` int(11) DEFAULT NULL,
  `cover_image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `contact_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `list_owner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `category` varchar(16) NOT NULL,
  `object_id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `allday` int(11) NOT NULL,
  `description` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `creation_date` datetime NOT NULL,
  `category` varchar(30) NOT NULL,
  `file_type` varchar(30) NOT NULL,
  `object_id` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `visibility` varchar(30) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `file_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL,
  `description` tinytext,
  `owner_asset_id` int(11) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `state` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `adress` tinytext,
  `zipcode` varchar(32) DEFAULT NULL,
  `logintude` varchar(256) DEFAULT NULL,
  `latitude` varchar(256) DEFAULT NULL,
  `altitude` varchar(256) DEFAULT NULL,
  `cover_image_id` int(11) DEFAULT NULL,
  `public_space` int(11) DEFAULT NULL,
  `outdoor_indoor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_date` datetime NOT NULL,
  `log_type` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `script_id` int(11) DEFAULT NULL,
  `scene_id` int(11) DEFAULT NULL,
  `element_id` int(11) DEFAULT NULL,
  `asset_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `send_date` datetime NOT NULL,
  `sender_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` tinytext NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `objects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) CHARACTER SET latin1 NOT NULL,
  `type` varchar(30) CHARACTER SET latin1 NOT NULL,
  `description` tinytext CHARACTER SET latin1 NOT NULL,
  `owner_asset_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `serial` varchar(128) CHARACTER SET latin1 NOT NULL,
  `fabrication_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `owner_id` int(255) DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `reference_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_type` varchar(255) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `reference_object_type` varchar(255) NOT NULL,
  `reference_object_id` int(11) DEFAULT NULL,
  `reference_file_id` int(11) NOT NULL,
  `reference_url` varchar(255) NOT NULL,
  `script_id` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `scenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scene` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `script_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `ext_int` smallint(1) NOT NULL,
  `day_night` smallint(1) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `script` varchar(5000) NOT NULL,
  `location` varchar(500) NOT NULL,
  `equipe` varchar(1000) NOT NULL,
  `cast` varchar(1000) NOT NULL,
  `equipment` varchar(1000) NOT NULL,
  `objects` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `scene` (`scene`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `scripts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `owner_id` int(11) NOT NULL,
  `fountain_script` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `registration_date` datetime NOT NULL,
  `bio` tinytext,
  `avatar` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
