<?php
// includes/navbar.php
$currentPage = $currentPage ?? '';
?>
<header class="page-header">
    <div class="header-container">
        <a href="index.php" class="brand-logo">
            <span class="logo-symbol">&lt;/&gt;</span>
            <span class="logo-text">CSS Helper</span>
        </a>
        <div class="nav-right-actions">
            <nav class="main-nav" aria-label="Navegación principal">
                <a href="index.php" class="nav-link <?= ($currentPage === 'index') ? 'active' : '' ?>" <?= ($currentPage === 'index') ? 'aria-current="page"' : '' ?>>Principal</a>
                <a href="paletas.php" class="nav-link <?= ($currentPage === 'paletas') ? 'active' : '' ?>" <?= ($currentPage === 'paletas') ? 'aria-current="page"' : '' ?>>Paletas</a>
                <a href="herramientas.php" class="nav-link <?= ($currentPage === 'herramientas') ? 'active' : '' ?>" <?= ($currentPage === 'herramientas') ? 'aria-current="page"' : '' ?>>Herramientas</a>
                <a href="snipets.php" class="nav-link <?= ($currentPage === 'snipets') ? 'active' : '' ?>" <?= ($currentPage === 'snipets') ? 'aria-current="page"' : '' ?>>Snippets</a>
            </nav>
            <button type="button" id="themeToggleBtn" class="theme-toggle-btn" aria-label="Cambiar modo de color" title="Alternar modo oscuro / claro">
                <span class="theme-icon icon-sun">☀️</span>
                <span class="theme-icon icon-moon">🌙</span>
            </button>
        </div>
    </div>
</header>
<script src="js/theme-toggle.js"></script>
