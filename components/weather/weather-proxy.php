<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// -------------------------------
// 1. API URL
// -------------------------------
$apiUrl = "https://api.open-meteo.com/v1/forecast?latitude=44.5665&longitude=-64.681&daily=temperature_2m_max,temperature_2m_min,weather_code&current=temperature_2m,relative_humidity_2m,precipitation,weather_code,apparent_temperature&timezone=auto";

// -------------------------------
// 2. Fetch API using cURL (safer)
// -------------------------------
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$response = curl_exec($ch);
$curlError = curl_error($ch);
curl_close($ch);

if (!$response) {
    echo json_encode(["error" => "API request failed", "details" => $curlError]);
    exit;
}

$data = json_decode($response, true);

if (!$data) {
    echo json_encode(["error" => "Invalid JSON from API"]);
    exit;
}

// -------------------------------
// 3. Weather Code → Verbose Labels
// -------------------------------
$weatherLabels = [
    0  => "Clear sky",
    1  => "Mainly clear",
    2  => "Partly cloudy",
    3  => "Overcast",

    45 => "Fog",
    48 => "Depositing rime fog",

    51 => "Light drizzle",
    53 => "Moderate drizzle",
    55 => "Dense drizzle",

    56 => "Light freezing drizzle",
    57 => "Dense freezing drizzle",

    61 => "Slight rain",
    63 => "Moderate rain",
    65 => "Heavy rain",

    66 => "Light freezing rain",
    67 => "Heavy freezing rain",

    71 => "Slight snowfall",
    73 => "Moderate snowfall",
    75 => "Heavy snowfall",

    77 => "Snow grains",

    80 => "Slight rain showers",
    81 => "Moderate rain showers",
    82 => "Violent rain showers",

    85 => "Slight snow showers",
    86 => "Heavy snow showers",

    95 => "Thunderstorm",
    96 => "Thunderstorm with slight hail",
    99 => "Thunderstorm with heavy hail"
];

// -------------------------------
// 4. Format JSON
// -------------------------------
$currentCode = $data["current"]["weather_code"] ?? null;

$formatted = [
    "current" => [
        "temperature"    => $data["current"]["temperature_2m"] ?? null,
        "apparent"       => $data["current"]["apparent_temperature"] ?? null,
        "humidity"       => $data["current"]["relative_humidity_2m"] ?? null,
        "precipitation"  => $data["current"]["precipitation"] ?? null,
        "weather_code"   => $currentCode,
        "weather_label"  => $weatherLabels[$currentCode] ?? "Unknown",
        "icon"           => $currentCode . ".png"
    ],
    "daily" => []
];

// -------------------------------
// 5. Build daily forecast
// -------------------------------
if (isset($data["daily"]["time"])) {
    $days = count($data["daily"]["time"]);
    for ($i = 0; $i < $days; $i++) {

        $code = $data["daily"]["weather_code"][$i];

        $formatted["daily"][] = [
            "date"          => $data["daily"]["time"][$i],
            "temp_max"      => $data["daily"]["temperature_2m_max"][$i],
            "temp_min"      => $data["daily"]["temperature_2m_min"][$i],
            "weather_code"  => $code,
            "weather_label" => $weatherLabels[$code] ?? "Unknown",
            "icon"          => $code . ".png"
        ];
    }
}

// -------------------------------
// 6. Output JSON
// -------------------------------
echo json_encode($formatted, JSON_PRETTY_PRINT);
