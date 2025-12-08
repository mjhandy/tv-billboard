<?php
$folder = "assets/images";

// Allowed extensions
$allowed = ['jpg', 'jpeg', 'png', 'webp'];

$files = array_diff(scandir($folder), ['.', '..']);

$result = [];

foreach ($files as $file) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (in_array($ext, $allowed)) {
        $result[] = $file;
    }
}

// Randomize order each time
shuffle($result);

// First image for slide-0
$firstImage = $result[0];

header('Content-Type: application/json');
// echo json_encode($result);

echo json_encode([
    'slide-0' => $firstImage,
    'images' => $result
]);
