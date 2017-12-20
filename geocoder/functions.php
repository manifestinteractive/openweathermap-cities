<?php

// Load Config File
if (!file_exists('config.php')) {
  exit('Missing config.php');
}

require 'config.php';

/**
 * Get Cities from OpenWeatherMap.org if it's not already saved
 */
function get_cities () {
  $file = 'archive/city_list.txt';

  if (!file_exists($file)) {
    $city_list = file_get_contents('http://openweathermap.org/help/city_list.txt');
    file_put_contents($file, $city_list);

    echo "✔ {$file} downloaded\n";
    flush();
  }
}

/**
 * Parse Cities - Loop through each line of OpenWeatherMap's cities text file
 * and use Google's GeoCoding Service to convert the lat/lon data into data
 * we can later add to a database.
 */
function parse_cities () {
  get_cities();

  $file = 'archive/city_list.txt';
  $handle = fopen($file, 'r');

  if ($handle) {
    $current = 0;
    while (($line = fgets($handle)) !== false) {

      $current++;

      // skip first line with headers
      if ($current === 1) {
        continue;
      }

      $city = explode("\t", $line, 5);

      if (count($city) === 5) {
        $city_id = $city[0];
        $city_name = urlencode($city[1]);
        $latitude = $city[2];
        $longitude = $city[3];
        $country_code = $city[4];

        $response = geocode_city($city_id, $latitude, $longitude, $city_name, $country_code);

        if ($response) {
          if ($response['status'] !== 'CACHED') {
            echo "{$response['message']}\n";
            flush();

            usleep(TIME_BETWEEN_CALLS);
          }
        }
      }
    }

    echo "\nALL DONE !!!\n\n";
    flush();

    fclose($handle);
  }
}

/**
 * Save GeoCoded City ID to Archive Folder
 * @param  int $city_id OpenWeatherMap City ID
 * @param  float $latitude OpenWeatherMap Geo Location
 * @param  float $longitude OpenWeatherMap Geo Location
 * @param  float $city_name OpenWeatherMap City Name
 * @param  float $country_code OpenWeatherMap Country Code
 */
function geocode_city ($city_id, $latitude, $longitude, $city_name, $country_code) {
  $file = "archive/{$city_id}.json";

  if (!file_exists($file)) {
    $json = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$city_name},{$country_code}&latlng={$latitude},{$longitude}&result_type=street_address&key=" . GOOGLE_API_KEY);
    $decoded = json_decode($json, true);

    if ($decoded && $decoded['status'] === 'OK') {
      file_put_contents($file, $json);

      return array(
        'status' => 'OK',
        'message' => "✔ {$file} downloaded"
      );
    } else {
      return array(
        'status' => 'ERRROR',
        'message' => "✕ {$file} {$decoded['status']}"
      );
    }


  } else {
    return array(
      'status' => 'CACHED',
      'message' => "✔ {$file} cached"
    );
  }
}
