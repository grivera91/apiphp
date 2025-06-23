<?php
// Manejo de CORS completo
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Access-Control-Allow-Methods: GET, OPTIONS');
    http_response_code(200);
    exit;
}

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$scoresFile = 'scores.json';

if (file_exists($scoresFile)) {
    echo file_get_contents($scoresFile);
} else {
    echo json_encode([]);
}
