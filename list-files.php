<?php
$folder = "assets/slides";
$allowed = ['jpg', 'jpeg', 'png', 'webp', 'mp4'];

$files = array_diff(scandir($folder), ['.', '..']);
$result = [];

foreach ($files as $file) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (in_array($ext, $allowed)) {
        $result[] = $file;
    }
}

// Define your cover image
$coverImage = 'slide-0.webp';

// Remove cover from the list if present
$result = array_diff($result, [$coverImage]);

// Shuffle the rest
shuffle($result);

// Put cover at the front
array_unshift($result, $coverImage);

header('Content-Type: application/json');
echo json_encode([
    'slide-0' => $coverImage,
    'images' => $result
]);

