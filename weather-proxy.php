<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$lat = "44.567";
$lon = "-64.683";

$url = "https://weather.gc.ca/api/app/v3/en/Location/$lat,$lon?type=city";

// Fetch from Environment Canada
echo file_get_contents($url);
