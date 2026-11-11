<?php
// includes/header.php
$currentPage = $currentPage ?? 'index';
$pageTitle = $pageTitle ?? 'CSS Helper';
$pageDescription = $pageDescription ?? 'Herramientas visuales para generar y copiar código CSS: colores, contraste, modelo de caja, Flexbox, Grid, fuentes y efectos.';
$jsVersion = file_exists(dirname(__DIR__) . '/js/theme-toggle.js') ? filemtime(dirname(__DIR__) . '/js/theme-toggle.js') : time();
$cssVersion = file_exists(dirname(__DIR__) . '/styles/styles.css') ? filemtime(dirname(__DIR__) . '/styles/styles.css') : time();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
    <meta name="color-scheme" content="light dark">
    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Crect width='32' height='32' rx='7' fill='%231976d2'/%3E%3Ctext x='16' y='21' font-family='monospace' font-size='13' font-weight='700' fill='white' text-anchor='middle'%3E%3C/%3E%3C/text%3E%3C/svg%3E">
    <!-- Se carga aquí para aplicar el tema antes de pintar la página -->
    <script src="js/theme-toggle.js?v=<?= $jsVersion ?>"></script>
    <link rel="stylesheet" href="styles/styles.css?v=<?= $cssVersion ?>">
    <?php if (isset($extraHead)) echo $extraHead; ?>
</head>
<body>
    <a href="#main-content" class="skip-link">Saltar al contenido</a>
    <!-- Iconos SVG Globales Compartidos -->
    <svg style="display: none;" aria-hidden="true">
        <symbol id="icon-copy" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
        </symbol>
        <symbol id="icon-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="20 6 9 17 4 12"></polyline>
        </symbol>
        <symbol id="icon-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="9 18 15 12 9 6"></polyline>
        </symbol>
        <symbol id="icon-download" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
            <polyline points="7 10 12 15 17 10"></polyline>
            <line x1="12" y1="15" x2="12" y2="3"></line>
        </symbol>
        <symbol id="icon-close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </symbol>
    </svg>

    <?php include __DIR__ . '/navbar.php'; ?>
