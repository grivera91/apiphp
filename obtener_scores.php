<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Headers: Content-Type');
    header('Access-Control-Allow-Methods: GET, OPTIONS');
    http_response_code(200);
    exit;
}

$scoresFile = 'scores.json';

if (!file_exists($scoresFile)) {
    echo json_encode([]);
    exit;
}

$contenido = file_get_contents($scoresFile);
$scores = json_decode($contenido, true) ?? [];

usort($scores, fn($a, $b) => strtotime($b['fecha']) <=> strtotime($a['fecha']));

echo json_encode($scores);
