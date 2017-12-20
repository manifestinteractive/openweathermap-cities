Overview:
---

This is just a quick tool a put together using PHP to:

1. Download OpenWeatherMap's [city_list.txt](http://openweathermap.org/help/city_list.txt)
2. Loop through each line of the `city_list.txt` file and use Google's GeoCoding service on the `lat` & `lon`
3. Store GeoCoding Response for parsing into a database

Update Instructions:
---

Before doing this, it should be noted that you are going to need a PAID Google API Key to perform this task, as there are tens of thousands of API calls you are going to be performing with the following commands.

```bash
cd ./geocoder/
cp config.dist.php config.php
nano config.php
php -f index.php
```

Once you have run the commands above, you will need to reset do some JSON cleanup:

```bash
cd ./geocoder/archive/
rm -fr *.gz
gzip -r *.json --keep
```

Bulk Unzip Instructions:
---

If you need to unzip all the `.gz` files in one go, here is a command you can use:

```bash
cd ./geocoder/archive/
gunzip -r *.gz --keep
```
