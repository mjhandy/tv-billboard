<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// -------------------------------
// 1. API URL
// -------------------------------
$apiUrl = "https://api.open-meteo.com/v1/forecast?latitude=44.5665&longitude=-64.681&daily=temperature_2m_max,temperature_2m_min,weather_code&current=temperature_2m,relative_humidity_2m,precipitation,weather_code,apparent_temperature&timezone=auto";

// -------------------------------
// 2. Fetch API
// -------------------------------
$response = file_get_contents($apiUrl);

if (!$response) {
    echo json_encode(["error" => "Unable to fetch weather data"]);
    exit;
}

$data = json_decode($response, true);

// -------------------------------
// 3. Format JSON (icons = weather_code.png)
// -------------------------------
$formatted = [
    "current" => [
        "temperature"   => $data["current"]["temperature_2m"] ?? null,
        "apparent"      => $data["current"]["apparent_temperature"] ?? null,
        "humidity"      => $data["current"]["relative_humidity_2m"] ?? null,
        "precipitation" => $data["current"]["precipitation"] ?? null,
        "weather_code"  => $data["current"]["weather_code"] ?? null,
        "icon"          => $data["current"]["weather_code"] . ".png"
    ],
    "daily" => []
];

// -------------------------------
// 4. Build daily forecast
// -------------------------------
if (isset($data["daily"]["time"])) {
    $days = count($data["daily"]["time"]);
    for ($i = 0; $i < $days; $i++) {

        $code = $data["daily"]["weather_code"][$i];

        $formatted["daily"][] = [
            "date"        => $data["daily"]["time"][$i],
            "temp_max"    => $data["daily"]["temperature_2m_max"][$i],
            "temp_min"    => $data["daily"]["temperature_2m_min"][$i],
            "weather_code"=> $code,
            "icon"        => $code . ".png"
        ];
    }
}

// -------------------------------
// 5. Output JSON
// -------------------------------
echo json_encode($formatted, JSON_PRETTY_PRINT);
