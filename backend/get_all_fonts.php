<?php
// backend/get_all_fonts.php
// API: devuelve la lista de nombres de fuentes (JSON).
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/db.php';

$fonts = null;
if ($pdo) {
    try {
        $fonts = $pdo->query("SELECT name FROM fonts ORDER BY name ASC")->fetchAll(PDO::FETCH_COLUMN);
    } catch (\Throwable $e) {
        error_log('CSS Helper: ' . $e->getMessage());
    }
}
if (!$fonts) {
    $fonts = array_column(cssHelperDefaultFonts(), 'name');
    sort($fonts);
}

echo json_encode($fonts, JSON_UNESCAPED_UNICODE);
