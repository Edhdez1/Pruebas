<?php
// includes/navbar.php
$currentPage = $currentPage ?? '';
?>
<header class="page-header">
    <div class="header-container">
        <a href="index.php" class="brand-logo" aria-label="CSS Helper, ir al inicio">
            <span class="logo-symbol" aria-hidden="true">&lt;/&gt;</span>
            <span class="logo-text">CSS Helper</span>
        </a>
        <div class="nav-right-actions">
            <nav class="main-nav" aria-label="Navegación principal">
                <a href="index.php" class="nav-link <?= ($currentPage === 'index') ? 'active' : '' ?>" <?= ($currentPage === 'index') ? 'aria-current="page"' : '' ?>>Inicio</a>
                <a href="paletas.php" class="nav-link <?= ($currentPage === 'paletas') ? 'active' : '' ?>" <?= ($currentPage === 'paletas') ? 'aria-current="page"' : '' ?>>Paletas</a>
                <a href="herramientas.php" class="nav-link <?= ($currentPage === 'herramientas') ? 'active' : '' ?>" <?= ($currentPage === 'herramientas') ? 'aria-current="page"' : '' ?>>Herramientas</a>
                <a href="snipets.php" class="nav-link <?= ($currentPage === 'snipets') ? 'active' : '' ?>" <?= ($currentPage === 'snipets') ? 'aria-current="page"' : '' ?>>Snippets</a>
            </nav>
            <button type="button" id="themeToggleBtn" class="theme-toggle-btn" aria-label="Cambiar a modo oscuro" title="Cambiar a modo oscuro">
                <span class="theme-icon icon-sun" aria-hidden="true">☀️</span>
                <span class="theme-icon icon-moon" aria-hidden="true">🌙</span>
            </button>
        </div>
    </div>
</header>
