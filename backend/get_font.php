<?php
// backend/get_font.php
header('Content-Type: application/json');
require_once 'db.php';

// Obtener el nombre de la fuente buscada
$fontName = isset($_GET['name']) ? trim($_GET['name']) : '';

if (empty($fontName)) {
    echo json_encode(["error" => "Ingresa un nombre de fuente para buscar."]);
    exit;
}

// Buscar la fuente en la base de datos (búsqueda parcial)
$stmt = $pdo->prepare("SELECT * FROM fonts WHERE name LIKE :name LIMIT 1");
$stmt->execute(['name' => "%$fontName%"]);
$font = $stmt->fetch(PDO::FETCH_ASSOC);

if ($font) {
    echo json_encode($font);
} else {
    echo json_encode(["error" => "Fuente no encontrada en la base de datos local."]);
}
?>
