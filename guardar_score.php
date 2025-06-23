<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    http_response_code(200);
    exit;
}

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Content-Type: application/json');

// Leer datos JSON del body
$input = json_decode(file_get_contents('php://input'), true);
$nombre = trim($input['nombre'] ?? '');
$puntaje = $input['puntaje'] ?? null;

// Validación mejorada
if ($nombre === '' || !is_numeric($puntaje) || $puntaje < 0) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Nombre o puntaje inválido.']);
    exit;
}

// Registro
$registro = [
    'nombre' => $nombre,
    'puntaje' => intval($puntaje),
    'fecha' => date('Y-m-d H:i:s')
];

// Guardar en scores.json
$scoresFile = 'scores.json';
$scores = [];

if (file_exists($scoresFile)) {
    $contenido = file_get_contents($scoresFile);
    $scores = json_decode($contenido, true) ?? [];
}

$scores[] = $registro;

// Guardar ordenado por puntaje descendente
usort($scores, fn($a, $b) => $b['puntaje'] <=> $a['puntaje']);

file_put_contents($scoresFile, json_encode($scores, JSON_PRETTY_PRINT));

// Respuesta
echo json_encode(['status' => 'ok']);
