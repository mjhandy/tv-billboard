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

header('Content-Type: application/json');
echo json_encode($result);
