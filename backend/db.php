<?php
// backend/db.php
// Conexión PDO. Crea la base de datos y la tabla de fuentes en el primer acceso.
// Si MySQL no está disponible, $pdo queda en null y la API usa la lista de respaldo.
require_once __DIR__ . '/fonts_data.php';

// Valores por defecto de XAMPP; se pueden cambiar con variables de entorno.
$host = getenv('CSSHELPER_DB_HOST') ?: 'localhost';
$user = getenv('CSSHELPER_DB_USER') ?: 'root';
$pass = getenv('CSSHELPER_DB_PASS') ?: '';
$charset = 'utf8mb4';

$pdo = null;

try {
    $pdo = new PDO("mysql:host=$host;charset=$charset", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 2,
    ]);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS css_helper CHARACTER SET utf8mb4");
    $pdo->exec("USE css_helper");

    $pdo->exec("CREATE TABLE IF NOT EXISTS fonts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL UNIQUE,
        link_code TEXT NOT NULL,
        import_code TEXT NOT NULL,
        css_rule VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Insertar datos iniciales si la tabla está vacía
    if ((int) $pdo->query("SELECT COUNT(*) FROM fonts")->fetchColumn() === 0) {
        $insert = $pdo->prepare("INSERT INTO fonts (name, link_code, import_code, css_rule) VALUES (?, ?, ?, ?)");
        foreach (cssHelperDefaultFonts() as $font) {
            $insert->execute([$font['name'], $font['link_code'], $font['import_code'], $font['css_rule']]);
        }
    }
} catch (\Throwable $e) {
    // El detalle técnico va al registro del servidor, nunca al navegador.
    error_log('CSS Helper: base de datos no disponible, se usa la lista de respaldo. ' . $e->getMessage());
    $pdo = null;
}
