<?php
$currentPage = 'index';
$pageTitle = 'CSS Helper: herramientas visuales de CSS';
require_once 'includes/palettes_data.php';

// Cifras calculadas a partir de los datos reales (antes estaban escritas a mano y eran incorrectas)
$toolCount = substr_count(file_get_contents(__DIR__ . '/herramientas.php'), 'tool-module-card');
$colorCount = 0;
$subpaletteCount = 0;
foreach ($palettes as $palette) {
    foreach ($palette['subpalettes'] as $sub) {
        $subpaletteCount++;
        $colorCount += count($sub['colors']);
    }
}

include 'includes/header.php';
?>

    <main class="container" id="main-content">
        <!-- ========================================== -->
        <!-- PARTE A: SECCIÓN HERO PRINCIPAL            -->
        <!-- ========================================== -->
        <section class="home-hero" aria-labelledby="heroTitle">
            <h1 class="hero-title" id="heroTitle">Diseña, ajusta y copia código CSS en segundos</h1>

            <p class="hero-description">
                Ajusta colores, márgenes, layouts y efectos de forma visual, mira el resultado al momento y copia el CSS listo para pegar en tu proyecto.
            </p>

            <div class="hero-cta-group">
                <a href="herramientas.php" class="btn-cta btn-primary-cta">Abrir herramientas</a>
                <a href="paletas.php" class="btn-cta btn-secondary-cta">Ver paletas</a>
            </div>

            <p class="hero-facts">
                <?= $toolCount ?> herramientas, <?= $subpaletteCount ?> paletas y <?= $colorCount ?> colores con su código HEX, RGB y HSL.
            </p>

            <!-- Barra de control de color, como la de los pliegos de imprenta.
                 Usa colores reales de las paletas del catálogo. -->
            <div class="color-control-bar" aria-hidden="true">
                <?php
                $barColors = [];
                foreach ($palettes as $palette) {
                    foreach ($palette['subpalettes'] as $sub) {
                        foreach ($sub['colors'] as $c) { $barColors[] = $c['hex']; }
                    }
                }
                $barColors = array_values(array_unique($barColors));
                $step = max(1, (int) floor(count($barColors) / 24));
                for ($i = 0, $n = 0; $i < count($barColors) && $n < 24; $i += $step, $n++):
                ?>
                    <span style="background: <?= htmlspecialchars($barColors[$i]) ?>;"></span>
                <?php endfor; ?>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- PARTE B: NUESTRAS HERRAMIENTAS             -->
        <!-- ========================================== -->
        <section class="quick-access-section">
            <div class="section-title-wrap">
                <h2 class="section-heading">¿Qué quieres hacer hoy?</h2>
                <p class="section-subheading">
                    Elige una herramienta. Cada una genera el código CSS mientras ajustas los controles.
                </p>
            </div>

            <div class="feature-cards-grid">
                <!-- TARJETA 1: Selector de Color -->
                <div class="interactive-preview-card feature-card">

                    <div class="feature-card-body">
                        <div class="feature-card-header">
                            <h3 class="feature-card-title">Selector de color</h3>
                        </div>

                        <!-- Gráfico Visual Ilustrativo -->
                        <div class="card-visual-graphic">
                            <div class="visual-picker-mockup">
                                <div class="visual-color-map">
                                    <div class="visual-map-dot"></div>
                                </div>
                                <div class="visual-hue-bar"></div>
                                <div class="visual-color-pills">
                                    <span class="color-badge-glow"><span class="glow-indicator"></span> #2196F3</span>
                                    <span class="color-badge-sub">rgb(33, 150, 243)</span>
                                </div>
                            </div>
                        </div>

                        <div class="feature-card-footer">
                            <a href="herramientas.php#colorPickerCard" class="card-action-link">
                                <span>Elegir un color</span>
                                <svg class="action-arrow" aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- TARJETA 2: Modelo de Caja CSS (Box Model) -->
                <div class="interactive-preview-card feature-card">

                    <div class="feature-card-body">
                        <div class="feature-card-header">
                            <h3 class="feature-card-title">Modelo de caja</h3>
                        </div>

                        <!-- Gráfico Visual Ilustrativo: Diagrama de Caja -->
                        <div class="card-visual-graphic">
                            <div class="visual-box-model-diagram">
                                <div class="vbm-layer vbm-margin">
                                    <span class="vbm-label">margin</span>
                                    <div class="vbm-layer vbm-border">
                                        <span class="vbm-label">border</span>
                                        <div class="vbm-layer vbm-padding">
                                            <span class="vbm-label">padding</span>
                                            <div class="vbm-content">
                                                <span>150 &times; 80</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="feature-card-footer">
                            <a href="herramientas.php#boxModelCard" class="card-action-link">
                                <span>Ajustar margin y padding</span>
                                <svg class="action-arrow" aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- TARJETA 3: Buscador de Fuentes Google Fonts -->
                <div class="interactive-preview-card feature-card">

                    <div class="feature-card-body">
                        <div class="feature-card-header">
                            <h3 class="feature-card-title">Fuentes de Google</h3>
                        </div>

                        <!-- Gráfico Visual Ilustrativo: Muestra Tipográfica -->
                        <div class="card-visual-graphic">
                            <div class="visual-fonts-specimen">
                                <div class="specimen-hero">
                                    <span class="specimen-letter">Aa</span>
                                    <div class="specimen-meta">
                                        <span class="specimen-name">Google Fonts</span>
                                        <span class="specimen-sample">&lt;link&gt; &amp; @import</span>
                                    </div>
                                </div>
                                <div class="specimen-tags">
                                    <span class="font-chip">Roboto</span>
                                    <span class="font-chip">Montserrat</span>
                                    <span class="font-chip">Poppins</span>
                                </div>
                            </div>
                        </div>

                        <div class="feature-card-footer">
                            <a href="herramientas.php#fontSearchCard" class="card-action-link">
                                <span>Probar fuentes</span>
                                <svg class="action-arrow" aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- TARJETA 4: Efectos Visuales CSS -->
                <div class="interactive-preview-card feature-card">

                    <div class="feature-card-body">
                        <div class="feature-card-header">
                            <h3 class="feature-card-title">Efectos visuales</h3>
                        </div>

                        <!-- Gráfico Visual Ilustrativo: Cuadrícula de 4 Efectos -->
                        <div class="card-visual-graphic">
                            <div class="visual-effects-quad">
                                <div class="quad-item quad-glow">
                                    <span>Neón</span>
                                </div>
                                <div class="quad-item quad-glass">
                                    <span>Vidrio</span>
                                </div>
                                <div class="quad-item quad-gradient">
                                    <span>Degradado</span>
                                </div>
                                <div class="quad-item quad-float">
                                    <span>Flotante</span>
                                </div>
                            </div>
                        </div>

                        <div class="feature-card-footer">
                            <a href="herramientas.php#toolsInteractiveCard" class="card-action-link">
                                <span>Probar efectos</span>
                                <svg class="action-arrow" aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- TARJETA 5: Catálogo de Paletas de Colores -->
                <div class="interactive-preview-card feature-card feature-card-wide">

                    <div class="feature-card-body">
                        <div class="feature-card-header">
                            <h3 class="feature-card-title">Paletas de colores</h3>
                        </div>

                        <!-- Gráfico Visual Ilustrativo: Barras Cromáticas -->
                        <div class="card-visual-graphic">
                            <div class="visual-palettes-showcase">
                                <div class="palette-strip-row">
                                    <span class="palette-strip-title">Dracula</span>
                                    <div class="palette-swatch-bar">
                                        <span class="ps-swatch" style="background:#282a36;" title="#282a36"></span>
                                        <span class="ps-swatch" style="background:#bd93f9;" title="#bd93f9"></span>
                                        <span class="ps-swatch" style="background:#ff79c6;" title="#ff79c6"></span>
                                        <span class="ps-swatch" style="background:#50fa7b;" title="#50fa7b"></span>
                                        <span class="ps-swatch" style="background:#8be9fd;" title="#8be9fd"></span>
                                        <span class="ps-swatch" style="background:#ffb86c;" title="#ffb86c"></span>
                                    </div>
                                </div>
                                <div class="palette-strip-row">
                                    <span class="palette-strip-title">Catppuccin</span>
                                    <div class="palette-swatch-bar">
                                        <span class="ps-swatch" style="background:#1e1e2e;" title="#1e1e2e"></span>
                                        <span class="ps-swatch" style="background:#cba6f7;" title="#cba6f7"></span>
                                        <span class="ps-swatch" style="background:#89b4fa;" title="#89b4fa"></span>
                                        <span class="ps-swatch" style="background:#a6e3a1;" title="#a6e3a1"></span>
                                        <span class="ps-swatch" style="background:#fab387;" title="#fab387"></span>
                                        <span class="ps-swatch" style="background:#f38ba8;" title="#f38ba8"></span>
                                    </div>
                                </div>
                                <div class="palette-strip-row">
                                    <span class="palette-strip-title">Slate</span>
                                    <div class="palette-swatch-bar">
                                        <span class="ps-swatch" style="background:#f8fafc;" title="#f8fafc"></span>
                                        <span class="ps-swatch" style="background:#cbd5e1;" title="#cbd5e1"></span>
                                        <span class="ps-swatch" style="background:#64748b;" title="#64748b"></span>
                                        <span class="ps-swatch" style="background:#334155;" title="#334155"></span>
                                        <span class="ps-swatch" style="background:#0f172a;" title="#0f172a"></span>
                                        <span class="ps-swatch" style="background:#020617;" title="#020617"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="feature-card-footer">
                            <a href="paletas.php" class="card-action-link">
                                <span>Ver todas las paletas</span>
                                <svg class="action-arrow" aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- TARJETA 6: Snippets Rápidos de CSS Moderno -->
                <div class="interactive-preview-card feature-card feature-card-wide">

                    <div class="feature-card-body">
                        <div class="feature-card-header">
                            <h3 class="feature-card-title">Snippets rápidos</h3>
                        </div>

                        <!-- Gráfico Visual Ilustrativo: Código y Chips -->
                        <div class="card-visual-graphic">
                            <div style="background: #1b1b1e; border-radius: var(--radius-md); padding: 14px 18px; border: 1px solid #2e2f33; display: flex; flex-direction: column; gap: 8px;">
                                <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                                    <span style="background: rgba(37,99,235,0.2); color: #93c5fd; padding: 3px 10px; border-radius: var(--radius-full); font-size: 0.72rem; font-weight: 600;">Grid Center</span>
                                    <span style="background: rgba(147,51,234,0.2); color: #d8b4fe; padding: 3px 10px; border-radius: var(--radius-full); font-size: 0.72rem; font-weight: 600;">Line Clamp</span>
                                    <span style="background: rgba(16,185,129,0.2); color: #6ee7b7; padding: 3px 10px; border-radius: var(--radius-full); font-size: 0.72rem; font-weight: 600;">Hide Scroll</span>
                                    <span style="background: rgba(245,158,11,0.2); color: #fde68a; padding: 3px 10px; border-radius: var(--radius-full); font-size: 0.72rem; font-weight: 600;">Modern Reset</span>
                                </div>
                                <code style="font-family: 'Consolas', monospace; font-size: 0.8rem; color: #7dd3fc; display: block;">display: grid; place-items: center;</code>
                            </div>
                        </div>

                        <div class="feature-card-footer">
                            <a href="snipets.php" class="card-action-link">
                                <span>Ver todos los snippets</span>
                                <svg class="action-arrow" aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php include 'includes/footer.php'; ?>
