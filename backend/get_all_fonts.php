<?php
// backend/get_all_fonts.php
header('Content-Type: application/json');
require_once 'db.php';

try {
    $stmt = $pdo->query("SELECT name FROM fonts ORDER BY name ASC");
    $fonts = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo json_encode($fonts);
} catch (\PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
