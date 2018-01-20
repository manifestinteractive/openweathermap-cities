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

  // @NOTE: I needed to use the next two lines of code to get about 400 results
  // that could not be found.  I stepped the number format's decimal place down
  // from 4 > 3 > 2 > 1 > 0 to try to find missing results.
  // $latitude = number_format($latitude, 0, '.', ',');
  // $longitude = number_format($longitude, 0, '.', ',');

  $city_name = trim($city_name);
  $country_code = trim($country_code);

  $city_name = str_replace('%0A', '', $city_name);
  $country_code = str_replace('%0A', '', $country_code);

  if (!file_exists($file)) {
    $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$latitude},{$longitude}&key=" . GOOGLE_API_KEY;
    // $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$city_name},{$country_code}&key=" . GOOGLE_API_KEY;
    $json = file_get_contents($url);
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

function process_json () {
  // Connect to Database
  $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname='.DB_NAME, DB_USER, DB_PASS);

  foreach (glob('archive/*.json') as $city) {
    $json = file_get_contents($city);
    $data = json_decode($json, true);
    $owm_city_id = intval(str_replace('.json', '', basename($city)));

    if (count($data['results']) > 0 && isset($data['results'][0]['address_components'])) {
      $address_components = $data['results'][0]['address_components'];

      $sql_set = [];

      foreach ($address_components as $address) {
        // set locality
        if (isset($address['types']) && $address['types'][0] == 'locality') {
          $locality_short = addslashes($address['short_name']);
          $locality_long = addslashes($address['long_name']);

          $sql_set[] = "`locality_short` = '{$locality_short}'";
          $sql_set[] = "`locality_long` = '{$locality_long}'";
        }

        // set administrative_area_level_1
        if (isset($address['types']) && $address['types'][0] == 'administrative_area_level_1') {
          $admin_level_1_short = addslashes($address['short_name']);
          $admin_level_1_long = addslashes($address['long_name']);

          $sql_set[] = "`admin_level_1_short` = '{$admin_level_1_short}'";
          $sql_set[] = "`admin_level_1_long` = '{$admin_level_1_long}'";
        }

        // set administrative_area_level_2
        if (isset($address['types']) && $address['types'][0] == 'administrative_area_level_2') {
          $admin_level_2_short = addslashes($address['short_name']);
          $admin_level_2_long = addslashes($address['long_name']);

          $sql_set[] = "`admin_level_2_short` = '{$admin_level_2_short}'";
          $sql_set[] = "`admin_level_2_long` = '{$admin_level_2_long}'";
        }

        // set administrative_area_level_3
        if (isset($address['types']) && $address['types'][0] == 'administrative_area_level_3') {
          $admin_level_3_short = addslashes($address['short_name']);
          $admin_level_3_long = addslashes($address['long_name']);

          $sql_set[] = "`admin_level_3_short` = '{$admin_level_3_short}'";
          $sql_set[] = "`admin_level_3_long` = '{$admin_level_3_long}'";
        }

        // set administrative_area_level_4
        if (isset($address['types']) && $address['types'][0] == 'administrative_area_level_4') {
          $admin_level_4_short = addslashes($address['short_name']);
          $admin_level_4_long = addslashes($address['long_name']);

          $sql_set[] = "`admin_level_4_short` = '{$admin_level_4_short}'";
          $sql_set[] = "`admin_level_4_long` = '{$admin_level_4_long}'";
        }

        // set administrative_area_level_5
        if (isset($address['types']) && $address['types'][0] == 'administrative_area_level_5') {
          $admin_level_5_short = addslashes($address['short_name']);
          $admin_level_5_long = addslashes($address['long_name']);

          $sql_set[] = "`admin_level_5_short` = '{$admin_level_5_short}'";
          $sql_set[] = "`admin_level_5_long` = '{$admin_level_5_long}'";
        }

        // set locality
        if (isset($address['types']) && $address['types'][0] == 'country') {
          $country_short = addslashes($address['short_name']);
          $country_long = addslashes($address['long_name']);

          $sql_set[] = "`country_short` = '{$country_short}'";
          $sql_set[] = "`country_long` = '{$country_long}'";
        }

        // set postal_code
        if (isset($address['types']) && $address['types'][0] == 'postal_code') {
          $postal_code = addslashes($address['long_name']);
          $sql_set[] = "`postal_code` = '{$postal_code}'";
        }
      }

      if (count($sql_set) > 0) {
        $update = join(', ', $sql_set);
        $query = "UPDATE `owm_city_list` SET {$update} WHERE `owm_city_id` = $owm_city_id";

        try {
          $pdo->query($query);
          echo "✔ {$owm_city_id} updated\n";
          flush();
        } catch (Exception $e) {
          echo "✕ {$owm_city_id} {$e->getMessage()}\n";
          flush();
        }
      }
    }
  }
}
