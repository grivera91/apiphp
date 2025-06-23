<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$nombre = trim($input['nombre'] ?? '');
$puntaje = intval($input['puntaje'] ?? 0);

if ($nombre === '' || $puntaje <= 0) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Nombre o puntaje inválido.']);
    exit;
}

$registro = [
    'nombre' => $nombre,
    'puntaje' => $puntaje,
    'fecha' => date('Y-m-d H:i:s')
];

$scoresFile = 'scores.json';
$scores = [];

if (file_exists($scoresFile)) {
    $contenido = file_get_contents($scoresFile);
    $scores = json_decode($contenido, true) ?? [];
}

$scores[] = $registro;

file_put_contents($scoresFile, json_encode($scores, JSON_PRETTY_PRINT));

echo json_encode(['status' => 'ok']);
?>
