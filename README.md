OpenWeatherMap Cities
===

[OpenWeatherMap](http://OpenWeatherMap.org) Cities run through a GeoCoding Service to get additional location details.

SQL Files
---

FILE                                                                 | SUMMARY
---------------------------------------------------------------------|--------------------------------
[./sql/city_list.schema.sql](sql/city_list.schema.sql)               | MySQL Database Schema
[./sql/city_list.schema.sqlite.sql](sql/city_list.schema.sqlite.sql) | SQLite Database Schema
[./sql/city_list.data.sql](sql/city_list.data.sql)                   | SQL Data ( for MySQL & SQLite )

Data Exports
---

FILE                                                 | SUMMARY
-----------------------------------------------------|---------------------------------------
[./data/owm_city_list.csv](data/owm_city_list.csv)   | ( CSV ) GeoCoded OpenWeatherMap Cities
[./data/owm_city_list.json](data/owm_city_list.json) | ( JSON ) GeoCoded OpenWeatherMap Cities
[./data/owm_city_list.txt](data/owm_city_list.txt)   | ( TXT ) GeoCoded OpenWeatherMap Cities
[./data/owm_city_list.xls](data/owm_city_list.xls)   | ( XLS ) GeoCoded OpenWeatherMap Cities
[./data/owm_city_list.xlsx](data/owm_city_list.xlsx) | ( XLSX ) GeoCoded OpenWeatherMap Cities
[./data/owm_city_list.xml](data/owm_city_list.xml)   | ( XML ) GeoCoded OpenWeatherMap Cities
[./data/owm_city_list.yml](data/owm_city_list.csv)   | ( YML ) GeoCoded OpenWeatherMap Cities

Data Overview
---

Each city contains the following data:

KEY                   | SUMMARY
----------------------|--------------------------------------------------
`owm_city_id`         | Open Weather Map's City ID
`owm_city_name`       | Open Weather Map's City Name
`owm_latitude`        | Open Weather Map's City Latitude
`owm_longitude`       | Open Weather Map's City Longitude
`owm_country`         | Open Weather Map's Country Code
`locality_short`      | Google GeoCoded `locality` ( Short Name )
`locality_long`       | Google GeoCoded `locality` ( Long Name )
`admin_level_1_short` | Google GeoCoded `administrative_area_level_1` ( Short Name )
`admin_level_1_long`  | Google GeoCoded `administrative_area_level_1` ( Long Name )
`admin_level_2_short` | Google GeoCoded `administrative_area_level_2` ( Short Name )
`admin_level_2_long`  | Google GeoCoded `administrative_area_level_2` ( Long Name )
`admin_level_3_short` | Google GeoCoded `administrative_area_level_3` ( Short Name )
`admin_level_3_long`  | Google GeoCoded `administrative_area_level_3` ( Long Name )
`admin_level_4_short` | Google GeoCoded `administrative_area_level_4` ( Short Name )
`admin_level_4_long`  | Google GeoCoded `administrative_area_level_4` ( Long Name )
`admin_level_5_short` | Google GeoCoded `administrative_area_level_5` ( Short Name )
`admin_level_5_long`  | Google GeoCoded `administrative_area_level_5` ( Long Name )
`country_short`       | Google GeoCoded `country` ( Short Name )
`country_long`        | Google GeoCoded `country` ( Long Name )
`postal_code`         | Google GeoCoded `postal_code`

See [Googles GeoCoding Service](https://developers.google.com/maps/documentation/geocoding/intro) for details on what each piece of data means.
