<?php
header("Content-Type: application/xml");

// Replace with your Environment Canada feed URL
$url = "https://weather.gc.ca/rss/weather/44.567_-64.683_e.xml";

echo file_get_contents($url);
