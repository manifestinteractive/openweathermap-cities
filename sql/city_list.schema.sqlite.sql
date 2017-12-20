PRAGMA foreign_keys = false;

-- ----------------------------
--  Table structure for owm_city_list
-- ----------------------------
DROP TABLE IF EXISTS "owm_city_list";
CREATE TABLE "owm_city_list" (
	 "id" INTEGER PRIMARY KEY AUTOINCREMENT,
	 "owm_city_id" int(11,0) NOT NULL,
	 "owm_city_name" varchar(255,0) NOT NULL,
	 "owm_lat" decimal(10,8) NOT NULL,
	 "owm_lon" decimal(11,8) NOT NULL,
	 "owm_country" char(2,0) NOT NULL,
	 "geocoded" int(1,0) NOT NULL DEFAULT '0',
	 "locality" varchar(100,0) DEFAULT NULL,
	 "sublocality" varchar(100,0) DEFAULT NULL,
	 "admin_level_1" varchar(100,0) DEFAULT NULL,
	 "admin_level_2" varchar(100,0) DEFAULT NULL,
	 "admin_level_3" varchar(100,0) DEFAULT NULL,
	 "admin_level_4" varchar(100,0) DEFAULT NULL,
	 "admin_level_5" varchar(100,0) DEFAULT NULL,
	 "country_code" char(2,0) DEFAULT NULL,
	 "country_name" varchar(100,0) DEFAULT NULL,
	 "postal_code" varchar(25,0) DEFAULT NULL,
	UNIQUE (owm_city_id)
);

-- ----------------------------
--  Indexes structure for table owm_city_list
-- ----------------------------
CREATE UNIQUE INDEX owm_city_id_idx ON owm_city_list ("owm_city_id");

CREATE INDEX owm_country_idx ON owm_city_list ("owm_country");
CREATE INDEX geocoded_idx ON owm_city_list ("geocoded");
CREATE INDEX locality_idx ON owm_city_list ("locality");
CREATE INDEX sublocality_idx ON owm_city_list ("sublocality");
CREATE INDEX admin_level_1_idx ON owm_city_list ("admin_level_1");
CREATE INDEX admin_level_2_idx ON owm_city_list ("admin_level_2");
CREATE INDEX admin_level_3_idx ON owm_city_list ("admin_level_3");
CREATE INDEX admin_level_4_idx ON owm_city_list ("admin_level_4");
CREATE INDEX admin_level_5_idx ON owm_city_list ("admin_level_5");
CREATE INDEX country_code_idx ON owm_city_list ("country_code");
CREATE INDEX country_name_idx ON owm_city_list ("country_name");
CREATE INDEX postal_code_idx ON owm_city_list ("postal_code");

PRAGMA foreign_keys = true;
