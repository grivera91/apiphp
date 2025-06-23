<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Opcionalmente manejar OPTIONS también
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$scoresFile = 'scores.json';

if (file_exists($scoresFile)) {
    echo file_get_contents($scoresFile);
} else {
    echo json_encode([]);
}
