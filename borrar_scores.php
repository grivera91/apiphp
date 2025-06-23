<?php
// Habilita CORS y responde a preflight (OPTIONS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Access-Control-Allow-Methods: DELETE, OPTIONS');
    http_response_code(200);
    exit;
}

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Ruta del archivo
$scoresFile = 'scores.json';

// Solo permite DELETE
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if (file_exists($scoresFile)) {
        file_put_contents($scoresFile, json_encode([])); // Vacía el archivo
        echo json_encode(['status' => 'ok', 'message' => 'Puntajes eliminados.']);
    } else {
        echo json_encode(['status' => 'ok', 'message' => 'No hay archivo para borrar.']);
    }
} else {
    http_response_code(405); // Método no permitido
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
}
