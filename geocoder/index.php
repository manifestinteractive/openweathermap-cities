<?php
set_time_limit(0);

require 'functions.php';

// Download Cities Text File & GeoCode each city
parse_cities();

// Process the JSON files in `archive` and store in database
process_json();
