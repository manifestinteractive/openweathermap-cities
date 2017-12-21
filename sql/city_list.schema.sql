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
  `owm_latitude` decimal(10,8) NOT NULL,
  `owm_longitude` decimal(11,8) NOT NULL,
  `owm_country` char(2) NOT NULL,
  `locality_short` varchar(100) DEFAULT NULL,
  `locality_long` varchar(100) DEFAULT NULL,
  `admin_level_1_short` varchar(100) DEFAULT NULL,
  `admin_level_1_long` varchar(100) DEFAULT NULL,
  `admin_level_2_short` varchar(100) DEFAULT NULL,
  `admin_level_2_long` varchar(100) DEFAULT NULL,
  `admin_level_3_short` varchar(100) DEFAULT NULL,
  `admin_level_3_long` varchar(100) DEFAULT NULL,
  `admin_level_4_short` varchar(100) DEFAULT NULL,
  `admin_level_4_long` varchar(100) DEFAULT NULL,
  `admin_level_5_short` varchar(100) DEFAULT NULL,
  `admin_level_5_long` varchar(100) DEFAULT NULL,
  `country_short` char(2) DEFAULT NULL,
  `country_long` varchar(100) DEFAULT NULL,
  `postal_code` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `owm_city_id_idx` (`owm_city_id`),
  KEY `owm_country_idx` (`owm_country`),
  KEY `locality_short_idx` (`locality_short`),
  KEY `locality_long_idx` (`locality_long`),
  KEY `admin_level_1_short_idx` (`admin_level_1_short`),
  KEY `admin_level_1_long_idx` (`admin_level_1_long`),
  KEY `admin_level_2_short_idx` (`admin_level_2_short`),
  KEY `admin_level_2_long_idx` (`admin_level_2_long`),
  KEY `country_short` (`country_short`),
  KEY `country_long` (`country_long`),
  KEY `postal_code` (`postal_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;
