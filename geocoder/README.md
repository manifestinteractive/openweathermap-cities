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

The following 12 City ID's failed to GeoCode and had to be manually entered:

```
700019, 1430991, 284890, 1439622, 281227, 281675, 281790, 282140, 283971, 284524, 285161, 7890119
```
