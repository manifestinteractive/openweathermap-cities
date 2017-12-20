SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `owm_city_list`
-- ----------------------------
DROP TABLE IF EXISTS `owm_city_list`;
CREATE TABLE `owm_city_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owm_city_id` int(11) NOT NULL,
  `owm_city_name` varchar(255) NOT NULL,
  `owm_lat` decimal(10,8) NOT NULL,
  `owm_lon` decimal(11,8) NOT NULL,
  `owm_country` char(2) NOT NULL,
  `geocoded` int(1) unsigned NOT NULL DEFAULT '0',
  `locality` varchar(100) DEFAULT NULL,
  `sublocality` varchar(100) DEFAULT NULL,
  `admin_level_1` varchar(100) DEFAULT NULL,
  `admin_level_2` varchar(100) DEFAULT NULL,
  `admin_level_3` varchar(100) DEFAULT NULL,
  `admin_level_4` varchar(100) DEFAULT NULL,
  `admin_level_5` varchar(100) DEFAULT NULL,
  `country_code` char(2) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `postal_code` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `owm_city_id` (`owm_city_id`),
  KEY `owm_country` (`owm_country`),
  KEY `geocoded` (`geocoded`),
  KEY `locality` (`locality`),
  KEY `sublocality` (`sublocality`),
  KEY `admin_level_1` (`admin_level_1`),
  KEY `admin_level_2` (`admin_level_2`),
  KEY `admin_level_3` (`admin_level_3`),
  KEY `admin_level_4` (`admin_level_4`),
  KEY `admin_level_5` (`admin_level_5`),
  KEY `country_code` (`country_code`),
  KEY `country_name` (`country_name`),
  KEY `postal_code` (`postal_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;
