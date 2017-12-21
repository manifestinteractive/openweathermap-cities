Overview:
---

This is just a quick tool a put together using PHP to:

1. Download OpenWeatherMap's [city_list.txt](http://openweathermap.org/help/city_list.txt)
2. Loop through each line of the `city_list.txt` file and use Google's GeoCoding service on the `lat` & `lon`
3. Store GeoCoding Response for parsing into a database

Database is using [GeoCoding Types](https://developers.google.com/maps/documentation/geocoding/intro#Types)

Update Instructions:
---

Before doing this, it should be noted that you are going to need a PAID Google API Key to perform this task, as there are tens of thousands of API calls you are going to be performing with the following commands.

```bash
cd ./geocoder/
cp config.dist.php config.php
nano config.php
php -f index.php
```

Known Issues
---

The following 30 City ID's failed to GeoCode and had to be manually entered:

```
281227, 281675, 281790, 282108, 282140, 282438, 282740, 282783, 283129, 283385, 283444, 283547, 283971, 284046, 284065, 284270, 284405, 284426, 284524, 284597, 284904, 285103, 285161, 688904, 689307, 700019, 791161, 1430991, 1439622, 6967895
```
