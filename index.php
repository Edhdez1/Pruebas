<?php
$currentPage = 'index';
$pageTitle = 'CSS Helper: herramientas visuales de CSS';
require_once 'includes/palettes_data.php';

// Cifras calculadas a partir de los datos reales (antes estaban escritas a mano y eran incorrectas)
$toolCount = 7; // Herramientas en herramientas.php
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
        <section class="home-hero-centered">
            <div class="hero-content-centered">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    <span>Herramientas CSS para frontend</span>
                </div>

                <h1 class="hero-title">
                    Diseña, ajusta y copia <span class="text-gradient">código CSS en segundos</span>
                </h1>

                <p class="hero-description">
                    Ajusta colores, márgenes, layouts y efectos de forma visual, mira el resultado al momento y copia el CSS listo para pegar en tu proyecto.
                </p>

                <div class="hero-cta-group">
                    <a href="herramientas.php" class="btn-cta btn-primary-cta">
                        <svg class="cta-icon" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                        </svg>
                        <span>Abrir herramientas</span>
                    </a>
                    <a href="paletas.php" class="btn-cta btn-secondary-cta">
                        <svg class="cta-icon" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="13.5" cy="6.5" r=".5" fill="currentColor"></circle>
                            <circle cx="17.5" cy="10.5" r=".5" fill="currentColor"></circle>
                            <circle cx="8.5" cy="7.5" r=".5" fill="currentColor"></circle>
                            <circle cx="6.5" cy="12.5" r=".5" fill="currentColor"></circle>
                            <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.563-2.512 5.563-5.563C21.438 6.5 17.5 2 12 2z"></path>
                        </svg>
                        <span>Ver paletas</span>
                    </a>
                </div>

                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number"><?= $toolCount ?></span>
                        <span class="stat-label">Herramientas interactivas</span>
                    </div>
                    <div class="stat-divider" aria-hidden="true"></div>
                    <div class="stat-item">
                        <span class="stat-number"><?= $subpaletteCount ?></span>
                        <span class="stat-label">Paletas listas para exportar</span>
                    </div>
                    <div class="stat-divider" aria-hidden="true"></div>
                    <div class="stat-item">
                        <span class="stat-number"><?= $colorCount ?></span>
                        <span class="stat-label">Colores con HEX, RGB y HSL</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- PARTE B: NUESTRAS HERRAMIENTAS             -->
        <!-- ========================================== -->
        <section class="quick-access-section">
            <div class="section-title-wrap">
                <h2 class="section-heading">
                    ¿Qué quieres <span class="text-gradient">hacer hoy?</span>
                </h2>
                <p class="section-subheading">
                    Elige una herramienta. Cada una genera el código CSS mientras ajustas los controles.
                </p>
            </div>

            <div class="feature-cards-grid">
                <!-- TARJETA 1: Selector de Color -->
                <div class="interactive-preview-card feature-card">
                    <div class="card-glass-header" aria-hidden="true">
                        <div class="window-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                        </div>
                        <span class="window-title">color-picker.css</span>
                        <span class="badge-live">COLOR</span>
                    </div>

                    <div class="feature-card-body">
                        <div class="feature-card-header">
                            <div class="feature-icon-box" aria-hidden="true" style="color: #2196f3; background: #e3f2fd; border-color: #bbdefb;">
                                🎨
                            </div>
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
                    <div class="card-glass-header" aria-hidden="true">
                        <div class="window-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                        </div>
                        <span class="window-title">box-model.css</span>
                        <span class="badge-live">LAYOUT</span>
                    </div>

                    <div class="feature-card-body">
                        <div class="feature-card-header">
                            <div class="feature-icon-box" aria-hidden="true" style="color: #ea580c; background: #ffedd5; border-color: #fed7aa;">
                                📐
                            </div>
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
                    <div class="card-glass-header" aria-hidden="true">
                        <div class="window-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                        </div>
                        <span class="window-title">google-fonts.css</span>
                        <span class="badge-live">FONTS</span>
                    </div>

                    <div class="feature-card-body">
                        <div class="feature-card-header">
                            <div class="feature-icon-box" aria-hidden="true" style="color: #0284c7; background: #e0f2fe; border-color: #bae6fd;">
                                🔤
                            </div>
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
                    <div class="card-glass-header" aria-hidden="true">
                        <div class="window-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                        </div>
                        <span class="window-title">effects-presets.css</span>
                        <span class="badge-live">EFECTOS</span>
                    </div>

                    <div class="feature-card-body">
                        <div class="feature-card-header">
                            <div class="feature-icon-box" aria-hidden="true" style="color: #7c3aed; background: #ede9fe; border-color: #ddd6fe;">
                                ✨
                            </div>
                            <h3 class="feature-card-title">Efectos visuales</h3>
                        </div>

                        <!-- Gráfico Visual Ilustrativo: Cuadrícula de 4 Efectos -->
                        <div class="card-visual-graphic">
                            <div class="visual-effects-quad">
                                <div class="quad-item quad-glow">
                                    <span>✨ Neón</span>
                                </div>
                                <div class="quad-item quad-glass">
                                    <span>🧊 Glass</span>
                                </div>
                                <div class="quad-item quad-gradient">
                                    <span>🎨 Gradiente</span>
                                </div>
                                <div class="quad-item quad-float">
                                    <span>🚀 Flotante</span>
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
                    <div class="card-glass-header" aria-hidden="true">
                        <div class="window-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                        </div>
                        <span class="window-title">color-palettes.css</span>
                        <span class="badge-live">PALETAS</span>
                    </div>

                    <div class="feature-card-body">
                        <div class="feature-card-header">
                            <div class="feature-icon-box" aria-hidden="true" style="color: #059669; background: #d1fae5; border-color: #a7f3d0;">
                                🎭
                            </div>
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
                    <div class="card-glass-header" aria-hidden="true">
                        <div class="window-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                        </div>
                        <span class="window-title">modern-snippets.css</span>
                        <span class="badge-live">SNIPPETS</span>
                    </div>

                    <div class="feature-card-body">
                        <div class="feature-card-header">
                            <div class="feature-icon-box" aria-hidden="true" style="color: #f59e0b; background: #fef3c7; border-color: #fde68a;">
                                ⚡
                            </div>
                            <h3 class="feature-card-title">Snippets rápidos</h3>
                        </div>

                        <!-- Gráfico Visual Ilustrativo: Código y Chips -->
                        <div class="card-visual-graphic">
                            <div style="background: #0f172a; border-radius: var(--radius-md); padding: 14px 18px; border: 1px solid #1e293b; display: flex; flex-direction: column; gap: 8px;">
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
