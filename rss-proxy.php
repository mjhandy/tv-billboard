<?php
header("Content-Type: application/xml");

// External RSS feed URL
$url = "https://www.cbc.ca/webfeed/rss/rss-canada-novascotia";

// Fetch and output the feed
echo file_get_contents($url);
