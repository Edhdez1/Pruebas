<?php
// backend/get_font.php
// API: busca una fuente por nombre (coincidencia parcial) y devuelve sus códigos (JSON).
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/db.php';

$fontName = isset($_GET['name']) ? trim((string) $_GET['name']) : '';

if ($fontName === '') {
    http_response_code(400);
    echo json_encode(["error" => "Escribe el nombre de una fuente para buscarla."], JSON_UNESCAPED_UNICODE);
    exit;
}

$font = null;
if ($pdo) {
    try {
        // Se escapan los comodines de LIKE para que "%" o "_" se busquen literalmente
        $escaped = addcslashes($fontName, '%_\\');
        $stmt = $pdo->prepare("SELECT name, link_code, import_code, css_rule FROM fonts WHERE name LIKE :name LIMIT 1");
        $stmt->execute(['name' => "%$escaped%"]);
        $font = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    } catch (\Throwable $e) {
        error_log('CSS Helper: ' . $e->getMessage());
    }
}

if (!$font) {
    foreach (cssHelperDefaultFonts() as $candidate) {
        if (stripos($candidate['name'], $fontName) !== false) {
            $font = $candidate;
            break;
        }
    }
}

if ($font) {
    echo json_encode($font, JSON_UNESCAPED_UNICODE);
} else {
    http_response_code(404);
    echo json_encode(["error" => "No encontramos «{$fontName}». Prueba con otra fuente de la lista."], JSON_UNESCAPED_UNICODE);
}
