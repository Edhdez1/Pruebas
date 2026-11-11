<?php
// backend/db.php
$host = 'localhost';
$user = 'root';
$pass = ''; // Por defecto XAMPP no tiene contraseña
$charset = 'utf8mb4';

try {
    // 1. Conectamos sin seleccionar base de datos para poder crearla
    $pdo = new PDO("mysql:host=$host;charset=$charset", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // 2. Crear base de datos (por si no existe)
    $pdo->exec("CREATE DATABASE IF NOT EXISTS css_helper");
    $pdo->exec("USE css_helper");
    
    // 3. Crear tabla
    $sql = "CREATE TABLE IF NOT EXISTS fonts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL UNIQUE,
        link_code TEXT NOT NULL,
        import_code TEXT NOT NULL,
        css_rule VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
    
    // 4. Insertar datos de prueba si la tabla está vacía
    $stmt = $pdo->query("SELECT COUNT(*) FROM fonts");
    if ($stmt->fetchColumn() == 0) {
        $insert = $pdo->prepare("INSERT INTO fonts (name, link_code, import_code, css_rule) VALUES (?, ?, ?, ?)");
        
        $fonts = [
            [
                'Roboto',
                '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n" . '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n" . '<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">',
                "@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');",
                "font-family: 'Roboto', sans-serif;"
            ],
            [
                'Open Sans',
                '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n" . '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n" . '<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">',
                "@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');",
                "font-family: 'Open Sans', sans-serif;"
            ],
            [
                'Lato',
                '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n" . '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n" . '<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">',
                "@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap');",
                "font-family: 'Lato', sans-serif;"
            ],
            [
                'Montserrat',
                '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n" . '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n" . '<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">',
                "@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap');",
                "font-family: 'Montserrat', sans-serif;"
            ],
            [
                'Poppins',
                '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n" . '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n" . '<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">',
                "@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');",
                "font-family: 'Poppins', sans-serif;"
            ]
        ];

        foreach ($fonts as $font) {
            $insert->execute($font);
        }
    }
} catch (\PDOException $e) {
    // Si falla la conexión o alguna query, devolvemos JSON con error
    header('Content-Type: application/json');
    echo json_encode(["error" => "Error de Base de Datos: " . $e->getMessage()]);
    exit;
}
?>
