<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$scoresFile = 'scores.json';

if (file_exists($scoresFile)) {
    echo file_get_contents($scoresFile);
} else {
    echo json_encode([]);
}
?>
