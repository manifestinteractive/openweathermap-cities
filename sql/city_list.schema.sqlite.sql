PRAGMA foreign_keys = false;

-- ----------------------------
--  Table structure for owm_city_list
-- ----------------------------
DROP TABLE IF EXISTS "owm_city_list";
CREATE TABLE "owm_city_list" (
	 "id" INTEGER PRIMARY KEY AUTOINCREMENT,
	 "owm_city_id" int(11,0) NOT NULL,
	 "owm_city_name" varchar(255,0) NOT NULL,
	 "owm_latitude" decimal(10,8) NOT NULL,
	 "owm_longitude" decimal(11,8) NOT NULL,
	 "owm_country" char(2,0) NOT NULL,
	 "locality_short" varchar(100,0) DEFAULT NULL,
	 "locality_long" varchar(100,0) DEFAULT NULL,
	 "admin_level_1_short" varchar(100,0) DEFAULT NULL,
	 "admin_level_1_long" varchar(100,0) DEFAULT NULL,
	 "admin_level_2_short" varchar(100,0) DEFAULT NULL,
	 "admin_level_2_long" varchar(100,0) DEFAULT NULL,
	 "admin_level_3_short" varchar(100,0) DEFAULT NULL,
	 "admin_level_3_long" varchar(100,0) DEFAULT NULL,
	 "admin_level_4_short" varchar(100,0) DEFAULT NULL,
	 "admin_level_4_long" varchar(100,0) DEFAULT NULL,
	 "admin_level_5_short" varchar(100,0) DEFAULT NULL,
	 "admin_level_5_long" varchar(100,0) DEFAULT NULL,
	 "country_short" char(2,0) DEFAULT NULL,
	 "country_long" varchar(100,0) DEFAULT NULL,
	 "postal_code" varchar(25,0) DEFAULT NULL,
	UNIQUE (owm_city_id)
);

-- ----------------------------
--  Indexes structure for table owm_city_list
-- ----------------------------
CREATE UNIQUE INDEX owm_city_id_idx ON owm_city_list ("owm_city_id");

CREATE INDEX owm_country_idx ON owm_city_list ("owm_country");
CREATE INDEX locality_short_idx ON owm_city_list ("locality_short");
CREATE INDEX locality_long_idx ON owm_city_list ("locality_long");
CREATE INDEX admin_level_1_short_idx ON owm_city_list ("admin_level_1_short");
CREATE INDEX admin_level_1_long_idx ON owm_city_list ("admin_level_1_long");
CREATE INDEX admin_level_2_short_idx ON owm_city_list ("admin_level_2_short");
CREATE INDEX admin_level_2_long_idx ON owm_city_list ("admin_level_2_long");
CREATE INDEX country_short_idx ON owm_city_list ("country_short");
CREATE INDEX country_long_idx ON owm_city_list ("country_long");
CREATE INDEX postal_code_idx ON owm_city_list ("postal_code");

PRAGMA foreign_keys = true;
